<?php

namespace App\Controllers;

use App\Support\PageCache;
use App\Support\View;

class LegalController
{
    private const CACHE_TTL            = 900; // 15 minutes
    private const CACHE_KEY_PRIVACY    = 'page_legal_privacy';
    private const CACHE_KEY_TERMS      = 'page_legal_terms';
    private const CACHE_KEY_COOKIES    = 'page_legal_cookies';

    // -------------------------------------------------
    // PRIVACY POLICY
    // -------------------------------------------------

    /**
     * HTTP entry: /privacy-policy/
     */
    public function privacy(): string
    {
        return PageCache::remember(
            self::CACHE_KEY_PRIVACY,
            self::CACHE_TTL,
            fn (): string => $this->renderPrivacyPage()
        );
    }

    /**
     * Core renderer for Privacy Policy page.
     */
    private function renderPrivacyPage(): string
    {
        $baseUrl = rtrim(config('app.url', 'https://qalbit.com'), '/');

        $seo = [
            'title'       => 'Privacy Policy | QalbIT Infotech Pvt Ltd',
            'description' => 'Read how QalbIT Infotech Pvt Ltd collects, uses and protects your personal data when you interact with qalbit.com and our services.',
            'canonical'   => $baseUrl . '/privacy-policy/',
            'noindex'     => false,
        ];

        $content = View::render('pages/legal/privacy-policy', [
            'seo' => $seo,
        ]);

        return View::render('layouts/main', [
            'seo'     => $seo,
            'content' => $content,
        ]);
    }

    // -------------------------------------------------
    // TERMS & CONDITIONS
    // -------------------------------------------------

    /**
     * HTTP entry: /terms-and-conditions/
     */
    public function terms(): string
    {
        return PageCache::remember(
            self::CACHE_KEY_TERMS,
            self::CACHE_TTL,
            fn (): string => $this->renderTermsPage()
        );
    }

    /**
     * Core renderer for Terms & Conditions page.
     */
    private function renderTermsPage(): string
    {
        $baseUrl = rtrim(config('app.url', 'https://qalbit.com'), '/');

        $seo = [
            'title'       => 'Terms & Conditions | QalbIT Infotech Pvt Ltd',
            'description' => 'Review the terms and conditions that apply when you use qalbit.com, our content and our software development services.',
            'canonical'   => $baseUrl . '/terms-and-condition/',
            'noindex'     => false,
        ];

        $content = View::render('pages/legal/terms-of-service', [
            'seo' => $seo,
        ]);

        return View::render('layouts/main', [
            'seo'     => $seo,
            'content' => $content,
        ]);
    }

    // -------------------------------------------------
    // COOKIE POLICY
    // -------------------------------------------------

    /**
     * HTTP entry: /cookie-policy/
     */
    public function cookies(): string
    {
        return PageCache::remember(
            self::CACHE_KEY_COOKIES,
            self::CACHE_TTL,
            fn (): string => $this->renderCookiesPage()
        );
    }

    /**
     * Core renderer for Cookie Policy page.
     */
    private function renderCookiesPage(): string
    {
        $baseUrl = rtrim(config('app.url', 'https://qalbit.com'), '/');

        $seo = [
            'title'       => 'Cookie Policy | QalbIT Infotech Pvt Ltd',
            'description' => 'Learn how QalbIT uses cookies and similar technologies on qalbit.com, including what we collect and how you can control your preferences.',
            'canonical'   => $baseUrl . '/cookie-policy/',
            'noindex'     => false,
        ];

        $content = View::render('pages/legal/cookie-policy', [
            'seo' => $seo,
        ]);

        return View::render('layouts/main', [
            'seo'     => $seo,
            'content' => $content,
        ]);
    }
}
