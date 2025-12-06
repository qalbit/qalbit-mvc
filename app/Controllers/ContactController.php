<?php

namespace App\Controllers;

use App\Support\Faqs;
use App\Support\View;
use App\Support\Session;
use App\Support\Mailer;
use App\Support\Schema;
use App\Support\PageCache;
use App\Support\Recaptcha;

class ContactController
{
    private const CACHE_TTL       = 900; // 15 minutes
    private const CACHE_KEY_INDEX = 'page_contact_index';

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

        // Global Schemas
        $orgSchema         = Schema::organization();
        $websiteSchema     = Schema::website();
        $breadcrumbsSchema = Schema::breadcrumbs([
            ['name' => 'Contact Us', 'url' => '/contact-us/'],
        ]);

        // JSON-LD
        $jsonLd = array_values(array_filter([
            $orgSchema,
            $websiteSchema,
            $breadcrumbsSchema,
            $faqSchema,
        ]));

        $content = View::render('pages/contact/index', [
            'seo'     => $seo,
            'errors'  => $errors,
            'old'     => $old,
            'success' => $success,
            'faqs'    => $faqs,
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
            'message'     => trim($_POST['message']     ?? ''),
            'lead_country'=> trim($_POST['country_code']?? ''),
            'lead_from'   => trim($_POST['lead_from']   ?? ''),
            'lead_source' => trim($_POST['lead_source'] ?? ''),
            'lead_topic'  => trim($_POST['lead_topic']  ?? ''),
        ];

        $redirectTo = $_POST['redirect_to'] ?? '/contact-us/';
        $errors = [];
        // --- Field validation ---
        if ($data['name'] === '') {
            $errors['name'] = 'Please enter your name.';
        } elseif (mb_strlen($data['name']) < 2) {
            $errors['name'] = 'Name must be at least 2 characters.';
        }

        if ($data['email'] === '') {
            $errors['email'] = 'Please enter your email address.';
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Please enter a valid email address.';
        }

        if ($data['message'] === '') {
            $errors['message'] = 'Please tell us a bit about your project.';
        } elseif (mb_strlen($data['message']) < 10) {
            $errors['message'] = 'Please provide at least a few sentences so we can understand your needs.';
        }

        $token = $_POST['recaptcha_token'] ?? null;
        if (!Recaptcha::verify($token, 'contact')) {
            $errors['global'] = 'We could not verify that you are a human. Please try again.';
        }
        
        if (!empty($errors)) {
            Session::flash('contact_errors', $errors);
            Session::flash('contact_old', $data);
            header('Location: ' . $redirectTo);
            exit;
        }

        $mailer = new Mailer();
        $sent   = $mailer->sendContact($data);

        if (!$sent) {
            $errors['global'] = 'We could not send your message right now. Please try again later or email us directly at ' . config('app.contact_email', 'info@qalbit.com') . '.';
            Session::flash('contact_errors', $errors);
            Session::flash('contact_old', $data);
            header('Location: ' . $redirectTo);
            exit;
        }

        Session::flash('contact_success', 'Thank you. We have received your enquiry and will respond within 24 hours (business days).');
        header('Location: ' . $redirectTo);
        exit;
    }

}
