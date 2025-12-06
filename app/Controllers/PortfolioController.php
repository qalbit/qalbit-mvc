<?php

namespace App\Controllers;

use App\Support\Faqs;
use App\Support\PageCache;
use App\Support\Portfolio;
use App\Support\Schema;
use App\Support\View;

class PortfolioController
{
    private const CACHE_KEY = 'page_portfolio';
    private const CACHE_TTL = 900; // 15 Minutes

    /**
     * Core renderer used by both HTTP and cron.
     */
    private function renderPage(): string
    {
        $baseUrl = rtrim(config('app.url', 'https://qalbit.com'), '/');

        $seo = [
            'title'       => 'Software Project Portfolio | QalbIT',
            'description' => 'Selected projects and case studies delivered by QalbIT across SaaS, healthcare, logistics, telecom and more.',
            'canonical'   => $baseUrl . '/portfolio/',
        ];

        // Read filters from query string: ?industry=healthcare&tech=laravel
        $industry = isset($_GET['industry']) ? trim((string) $_GET['industry']) : null;
        $tech     = isset($_GET['tech']) ? trim((string) $_GET['tech']) : null;

        $allIndustries   = Portfolio::industries();
        $allTechnologies = Portfolio::technologies();

        // Validate filter values against known vocabularies
        if ($industry !== null && $industry !== '' && !array_key_exists($industry, $allIndustries)) {
            $industry = null;
        }

        if ($tech !== null && $tech !== '' && !array_key_exists($tech, $allTechnologies)) {
            $tech = null;
        }

        $items         = Portfolio::filter($industry, $tech);
        $featuredItems = Portfolio::featured();

        // Page + sections config for portfolio
        $pageConfig    = config('portfolio.page', []);
        $sections      = $pageConfig['sections'] ?? [];

        // FAQs for the portfolio page
        $faqs = Faqs::for('portfolio');
        $faqSchema = Schema::faq($faqs, $seo['canonical'], $seo['title']);

        // Global schemas (optional – similar to home)
        $orgSchema        = Schema::organization();
        $websiteSchema    = Schema::website();
        $breadcrumbsSchema = Schema::breadcrumbs([
            ['name' => 'Home', 'url' => '/'],
            ['name' => 'Portfolio', 'url' => '/portfolio/'],
        ]);

        $jsonLd = array_values(array_filter([
            $orgSchema,
            $websiteSchema,
            $breadcrumbsSchema,
            $faqSchema,
        ]));

        $content = View::render('pages/portfolio/index', [
            'seo'              => $seo,
            'page'             => $pageConfig,
            'sections'         => $sections,
            'items'            => $items,
            'featuredItems'    => $featuredItems,
            'allIndustries'    => $allIndustries,
            'allTechnologies'  => $allTechnologies,
            'activeIndustry'   => $industry,
            'activeTechnology' => $tech,
            'faqs'             => $faqs,
        ]);

        return View::render('layouts/main', [
            'seo'     => $seo,
            'content' => $content,
            'jsonLd'  => $jsonLd,
            'pageId'  => 'portfolio',
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