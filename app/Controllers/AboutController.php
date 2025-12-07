<?php

namespace App\Controllers;

use App\Support\Client;
use App\Support\Faqs;
use App\Support\PageCache;
use App\Support\Schema;
use App\Support\View;

class AboutController
{
    private const CACHE_KEY = 'page_about';
    private const CACHE_TTL = 900; // 15 Minutes

    /**
     * Core renderer used by both HTTP and cron.
     */
    private function renderPage(
        array $contactErrors = [],
        array $contactOld = [],
        ?string $contactSuccess = null
    ): string {
        $baseUrl = rtrim(config('app.url', 'https://qalbit.com'), '/');

        $seo = [
            'title' => 'About QalbIT – Custom Software Development Company',
            'description' => 'Learn about QalbIT Infotech, a custom software development company helping startups and businesses build reliable web, mobile, and cloud solutions since 2018.',
            'canonical' => $baseUrl . '/about-us/',
        ];

        // FAQs for the home context
        $faqs = Faqs::for('faq_aboutus');
        $faqSchema = Schema::faq($faqs, $seo['canonical'], $seo['title']);

        $clients = Client::logos(
            [
                'writesonic',
                'plugin',
                'credifana',
                'utapy',
                'snappystats',
                'heuvelman',
                'flickstur',
                'bloomford',
                'de-ruwenberg',
                'lmc',
            ],
            10
        );

        // Global Schemas
        $orgSchema = Schema::organization();
        $websiteSchema = Schema::website();
        $breadcrumbsSchema = Schema::breadcrumbs([
            ['name' => 'About Us', 'url' => '/about-us/'],
        ]);

        // JSON-LD
        $jsonLd = array_values(array_filter([
            $orgSchema,
            $websiteSchema,
            $breadcrumbsSchema,
            $faqSchema,
        ]));

        $content = View::render('pages/about/index', [
            'seo'     => $seo,
            'faqs'    => $faqs,
            'clients' => $clients,
            'contactErrors'  => $contactErrors,
            'contactOld'     => $contactOld,
            'contactSuccess' => $contactSuccess,
        ]);

        return View::render('layouts/main', [
            'seo'     => $seo,
            'content' => $content,
            'jsonLd'  => $jsonLd,
            'pageId'  => 'aboutus'
        ]);
    }

    /**
     * Normal HTTP entry point - cached with TTL.
     */
    public function index(): string
    {
        return PageCache::remember(
            self::CACHE_KEY,
            self::CACHE_TTL,
            fn (): string => $this->renderPage()
        );
    }
}