<?php

namespace App\Controllers;

use App\Support\Faqs;
use App\Support\View;
use App\Support\Session;
use App\Support\Mailer;
use App\Support\Schema;

class ContactController
{
    /**
     * Show the Contact Us page with any flashed errors/success.
     */
    public function showForm(): string
    {
        $baseUrl = rtrim(config('app.url', 'https://qalbit.com'), '/');
        
        $seo = [
            'title' => 'Contact QalbIT – Start Your Custom Software Project',
            'description' => 'Get in touch with QalbIT to discuss your custom software, web, mobile, or SaaS project. Share your requirements and we will get back within 24 hours.',
            'canonical' => $baseUrl . '/contact-us/',
        ];

        // Flash data
        $errors  = Session::getFlash('contact_errors', []);
        $old     = Session::getFlash('contact_old', []);
        $success = Session::getFlash('contact_success');

        // Load FAQs for this specific page
        $faqs  = Faqs::for('faq_contactus');
        $faqSchema = Schema::faq($faqs, $seo['canonical'], $seo['title']);

        // Global Schemas
        $orgSchema = Schema::organization();
        $websiteSchema = Schema::website();
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
            'seo'       => $seo,
            'errors'    => $errors,
            'old'       => $old,
            'success'   => $success,
            'faqs'      => $faqs,
        ]);

        return View::render('layouts/main', [
            'seo'     => $seo,
            'content' => $content,
            'jsonLd'  => $jsonLd,
            'pageId'  => 'contactus'
        ]);
    }

    /**
     * Handle Contact form submission (POST).
     */
    public function submit(): void
    {
        $data = [
            'name'    => trim($_POST['name']    ?? ''),
            'email'   => trim($_POST['email']   ?? ''),
            'budget'  => trim($_POST['budget']  ?? ''),
            'message' => trim($_POST['message'] ?? ''),
            'source'  => trim($_POST['source']  ?? ''),
        ];

        $redirectTo = $_POST['redirect_to'] ?? '/contact-us/';

        $errors = [];

        // --- reCAPTCHA ---
        $token = $_POST['recaptcha_token'] ?? null;
        if (!\App\Support\Recaptcha::verify($token, 'contact')) {
            $errors['global'] = 'We could not verify that you are a human. Please try again.';
        }

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

        if (!empty($errors)) {
            \App\Support\Session::flash('contact_errors', $errors);
            \App\Support\Session::flash('contact_old', $data);
            header('Location: ' . $redirectTo);
            exit;
        }

        // Send Email Directly
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
