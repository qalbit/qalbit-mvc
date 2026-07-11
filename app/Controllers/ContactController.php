<?php

namespace App\Controllers;

use App\Support\Client;
use App\Support\Faqs;
use App\Support\View;
use App\Support\Session;
use App\Support\Mailer;
use App\Support\Schema;
use App\Support\PageCache;
use App\Support\Recaptcha;
use App\Support\LiftUpCrm;

class ContactController
{
    private const CACHE_TTL       = 900; // 15 minutes
    private const CACHE_KEY_INDEX = 'page_contact_index';

    /**
     * Detect if the current request is an AJAX / JSON request.
     */
    private function isAjaxRequest(): bool
    {
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
            strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
            return true;
        }

        if (!empty($_SERVER['HTTP_ACCEPT'])) {
            $accept = strtolower($_SERVER['HTTP_ACCEPT']);
            if (strpos($accept, 'application/json') !== false ||
                strpos($accept, 'text/json') !== false) {
                return true;
            }
        }

        if (!empty($_POST['ajax']) && $_POST['ajax'] === '1') {
            return true;
        }

        if (!empty($_GET['ajax']) && $_GET['ajax'] === '1') {
            return true;
        }

        return false;
    }

    /**
     * Send a JSON response and terminate.
     */
    private function jsonResponse(array $payload, int $statusCode = 200): void
    {
        http_response_code($statusCode);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($payload);
        exit;
    }


    /**
     * Show the Contact Us page with any flashed errors/success.
     */
    public function index(): string
    {
        $baseUrl = rtrim(config('app.url', 'https://qalbit.com'), '/');

        $seo = [
            'title'       => 'Contact QalbIT – Start Your Custom Software Project',
            'description' => 'Get in touch with QalbIT to discuss your custom software, web, mobile, or SaaS project. Share your requirements and we will get back within 24 hours.',
            'canonical'   => $baseUrl . '/contact-us/',
            'image'       => og_image_url('/contact-us/'),
        ];

        // Flash data – consumed exactly once
        $errors  = Session::getFlash('contact_errors', []);
        $old     = Session::getFlash('contact_old', []);
        $success = Session::getFlash('contact_success');

        $hasFlash = !empty($errors) || !empty($old) || !empty($success);

        // If there is any flash (validation errors or success),
        // NEVER use cache – render a fresh, personalized page.
        if ($hasFlash) {
            return $this->renderContactPage($seo, $errors, $old, $success);
        }

        // No flash = canonical "clean" contact page → safe to cache
        return PageCache::remember(
            self::CACHE_KEY_INDEX,
            self::CACHE_TTL,
            function (): string {
                $baseUrl = rtrim(config('app.url', 'https://qalbit.com'), '/');

                $seo = [
                    'title'       => 'Contact QalbIT – Start Your Custom Software Project',
                    'description' => 'Get in touch with QalbIT to discuss your custom software, web, mobile, or SaaS project. Share your requirements and we will get back within 24 hours.',
                    'canonical'   => $baseUrl . '/contact-us/',
            'image'       => og_image_url('/contact-us/'),
                ];

                // Blank state (no errors, no old data, no success message)
                return $this->renderContactPage($seo, [], [], null);
            }
        );
    }

    /**
     * Core renderer for Contact page (used by cached + dynamic variants).
     */
    private function renderContactPage(array $seo, array $errors, array $old, ?string $success): string
    {
        // Load FAQs for this specific page
        $faqs      = Faqs::for('faq_contactus');
        $faqSchema = Schema::faq($faqs, $seo['canonical'], $seo['title']);

        // Load Clients 
        $contactLogoIds = [
            'snappystats',
            'bloomford',
            'contractor-plus',
            'plugin',
            'de-ruwenberg',
            'lmc',
        ];

        $clients = Client::logos($contactLogoIds);

        // Global Schemas
        $orgSchema         = Schema::organization();
        $websiteSchema     = Schema::website();
        $breadcrumbsSchema = Schema::breadcrumbs([
            ['name' => 'Contact Us', 'url' => '/contact-us/'],
        ]);
        $localBusinessSchema = Schema::localBusiness();

        // JSON-LD
        $jsonLd = array_values(array_filter([
            $orgSchema,
            $websiteSchema,
            $breadcrumbsSchema,
            $localBusinessSchema,
            $faqSchema,
        ]));

        $content = View::render('pages/contact/index', [
            'seo'     => $seo,
            'errors'  => $errors,
            'old'     => $old,
            'success' => $success,
            'faqs'    => $faqs,
            'clients' => $clients,
        ]);

        return View::render('layouts/main', [
            'seo'     => $seo,
            'content' => $content,
            'jsonLd'  => $jsonLd,
            'pageId'  => 'contactus',
        ]);
    }

    /**
     * Handle Contact form submission (POST).
     */
    public function submit(): void
    {
        $data = [
            'name'        => trim($_POST['name']        ?? ''),
            'email'       => trim($_POST['email']       ?? ''),
            'phone'       => trim($_POST['phone']       ?? ''),
            'phone_full'  => trim($_POST['phone_full']  ?? ''),
            'message'     => trim($_POST['message']     ?? ''),
            'lead_country'=> trim($_POST['country_code']?? ''),
            'lead_from'   => trim($_POST['lead_from']   ?? ''),
            'lead_source' => trim($_POST['lead_source'] ?? ''),
            'lead_topic'  => trim($_POST['lead_topic']  ?? ''),
        ];

        $redirectTo = $_POST['redirect_to'] ?? '/contact-us/';
        $errors = [];

        $isAjax = $this->isAjaxRequest();

        // Honeypot: real visitors never see or fill this field. Pretend
        // success so bots do not learn they were filtered.
        if (trim($_POST['website'] ?? '') !== '') {
            $successMessage = 'Thank you. We have received your enquiry and will respond within 24 hours (business days).';

            if ($isAjax) {
                $this->jsonResponse(['success' => true, 'message' => $successMessage]);
            }

            Session::flash('contact_success', $successMessage);
            header('Location: ' . $redirectTo);
            exit;
        }

        // --- Field validation ---
        if ($data['name'] === '') {
            $errors['name'] = 'Please enter your name.';
        } elseif (mb_strlen($data['name']) < 2) {
            $errors['name'] = 'Name must be at least 2 characters.';
        } elseif (mb_strlen($data['name']) > 100) {
            $errors['name'] = 'Name must be 100 characters or fewer.';
        } elseif (!preg_match('/\p{L}/u', $data['name'])) {
            $errors['name'] = 'Please enter a valid name.';
        }

        if ($data['email'] === '') {
            $errors['email'] = 'Please enter your email address.';
        } elseif (mb_strlen($data['email']) > 200) {
            $errors['email'] = 'Email must be 200 characters or fewer.';
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Please enter a valid email address.';
        }

        // Phone is required on forms that show the field (all of them mark
        // it *), but some variants (exit popup) have no phone input at all.
        if (array_key_exists('phone', $_POST)) {
            $phoneRaw = $data['phone_full'] !== '' ? $data['phone_full'] : $data['phone'];
            $phoneDigits = preg_replace('/[\s().-]/', '', $phoneRaw);

            if ($phoneDigits === '') {
                $errors['phone'] = 'Please enter your phone number.';
            } elseif (!preg_match('/^\+?\d{7,15}$/', $phoneDigits)) {
                $errors['phone'] = 'Please enter a valid phone number (7–15 digits, country code welcome).';
            }
        }

        if ($data['message'] === '') {
            $errors['message'] = 'Please tell us a bit about your project.';
        } elseif (mb_strlen($data['message']) < 10) {
            $errors['message'] = 'Please provide at least a few sentences so we can understand your needs.';
        } elseif (mb_strlen($data['message']) > 5000) {
            $errors['message'] = 'Message must be 5000 characters or fewer.';
        }

        $token = $_POST['recaptcha_token'] ?? null;
        if (!Recaptcha::verify($token, 'contact')) {
            $errors['global'] = 'We could not verify that you are a human. Please try again.';
        }
        
        if (!empty($errors)) {
            if ($isAjax) {
                $this->jsonResponse([
                    'success' => false,
                    'errors'  => $errors,
                    'old'     => $data,
                ], 422);
            }

            Session::flash('contact_errors', $errors);
            Session::flash('contact_old', $data);
            header('Location: ' . $redirectTo);
            exit;
        }

        // Capture the lead in LiftUp CRM first so it survives an SMTP outage.
        $metadata = array_filter([
            'country_code' => $data['lead_country'],
            'client_ip'    => $_SERVER['REMOTE_ADDR'] ?? null,
            'user_agent'   => substr($_SERVER['HTTP_USER_AGENT'] ?? '', 0, 500),
        ]);

        // Route into the CRM form matching the lead's origin.
        $formKey = 'contact';
        if ($data['lead_from'] === 'lead_cost_calculator') {
            $formKey = 'calculator';
        } elseif ($data['lead_from'] === 'lead_exit_popup') {
            $formKey = 'exit_popup';
        } elseif (strpos($data['lead_from'], 'lead_hire') === 0) {
            $formKey = 'hire';
        }

        $crmCaptured = LiftUpCrm::pushLead(array_filter([
            'type'        => $formKey === 'hire' ? 'hire' : null,
            'name'        => mb_substr($data['name'], 0, 200),
            'email'       => mb_substr($data['email'], 0, 200),
            'phone'       => mb_substr($data['phone_full'] !== '' ? $data['phone_full'] : $data['phone'], 0, 50),
            'message'     => mb_substr($data['message'], 0, 5000),
            'lead_from'   => mb_substr($data['lead_from'], 0, 100),
            'lead_source' => mb_substr($data['lead_source'], 0, 200),
            'lead_topic'  => mb_substr($data['lead_topic'], 0, 200),
            'source_page' => mb_substr($_SERVER['HTTP_REFERER'] ?? '', 0, 500),
            'metadata'    => $metadata,
        ], fn ($value) => $value !== '' && $value !== null && $value !== []), $formKey);

        $mailer = new Mailer();
        $sent   = $mailer->sendContact($data);

        // The enquiry is safe if either channel took it; error only when both failed.
        if (!$sent && !$crmCaptured) {
            $errors['global'] = 'We could not send your message right now. Please try again later or email us directly at ' . config('app.contact_email', 'info@qalbit.com') . '.';

            if ($isAjax) {
                $this->jsonResponse([
                    'success' => false,
                    'errors'  => $errors,
                    'old'     => $data,
                ], 500);
            }

            Session::flash('contact_errors', $errors);
            Session::flash('contact_old', $data);
            header('Location: ' . $redirectTo);
            exit;
        }

        $successMessage = 'Thank you. We have received your enquiry and will respond within 24 hours (business days).';

        if ($isAjax) {
            $this->jsonResponse([
                'success' => true,
                'message' => $successMessage,
            ]);
        }

        Session::flash('contact_success', $successMessage);
        header('Location: ' . $redirectTo);
        exit;
    }

}
