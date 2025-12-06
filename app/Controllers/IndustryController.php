<?php

namespace App\Controllers;

use App\Support\Faqs;
use App\Support\PageCache;
use App\Support\Schema;
use App\Support\Session;
use App\Support\View;

class IndustryController
{
    private const CACHE_TTL        = 900; // 15 minutes
    private const CACHE_KEY_INDEX  = 'page_industries_index';
    private const CACHE_KEY_PREFIX = 'page_industry_';

    /**
     * Core renderer for the Industries index page: /industries/
     * Used by HTTP entry point and can be used by cron/CLI.
     */
    private function renderIndexPage(
        array $contactErrors = [],
        array $contactOld = [],
        ?string $contactSuccess = null
    ): string {
        $all = config('industries', []);

        // Filter to only enabled industries
        $enabled = array_filter($all, static function (array $industry): bool {
            return !empty($industry['enabled']);
        });

        // Sort by 'order' if present
        usort($enabled, static function (array $a, array $b): int {
            $orderA = $a['order'] ?? 999;
            $orderB = $b['order'] ?? 999;
            return $orderA <=> $orderB;
        });

        $baseUrl = rtrim(config('app.url', 'https://qalbit.com'), '/');

        $seo = [
            'title'       => 'Industries We Serve – QalbIT',
            'description' => 'QalbIT delivers custom software solutions for e-commerce, fintech, healthcare, education, travel, business operations and more.',
            'canonical'   => $baseUrl . '/industries/',
        ];

        // FAQs for the industries page
        $faqs = Faqs::for('faq_industries');

        // Global Schemas
        $orgSchema         = Schema::organization();
        $websiteSchema     = Schema::website();
        $breadcrumbsSchema = Schema::breadcrumbs([
            ['name' => 'Home',       'url' => '/'],
            ['name' => 'Industries', 'url' => '/industries/'],
        ]);
        $faqSchema         = Schema::faq($faqs, $seo['canonical'], $seo['title']);

        // JSON-LD
        $jsonLd = array_values(array_filter([
            $orgSchema,
            $websiteSchema,
            $breadcrumbsSchema,
            $faqSchema,
        ]));

        $content = View::render('pages/industries/index', [
            'seo'        => $seo,
            'industries' => $enabled,
            'faqs'       => $faqs,
            'contactErrors'  => $contactErrors,
            'contactOld'     => $contactOld,
            'contactSuccess' => $contactSuccess,
        ]);

        return View::render('layouts/main', [
            'seo'     => $seo,
            'content' => $content,
            'jsonLd'  => $jsonLd,
            'pageId'  => 'industries',
        ]);
    }

    /**
     * HTTP entry for Industries index – cached with TTL.
     */
    public function index(): string
    {
        // Read contact flashes (from any contact form posting back to /services/)
        $errors  = Session::getFlash('contact_errors', []);
        $old     = Session::getFlash('contact_old', []);
        $success = Session::getFlash('contact_success');

        $hasFlash = !empty($errors) || !empty($old) || !empty($success);

        if ($hasFlash) {
            return $this->renderIndexPage($errors, $old, $success);
        }

        return PageCache::remember(
            self::CACHE_KEY_INDEX,
            self::CACHE_TTL,
            fn (): string => $this->renderIndexPage()
        );
    }

    /**
     * HTTP entry for individual industry page: /industries/{slug}/
     *
     * Example URL: /industries/fintech/
     * Here $slug = "fintech"
     */
    public function show(string $slug): string
    {
        $allIndustries = config('industries', []);

        $industry = $this->findIndustryBySlugSegment($allIndustries, $slug);

        if (!$industry) {
            http_response_code(404);
            return 'Industry not found';
        }

        // Derive stable slug segment for cache key (prefer config slug).
        $cacheSlugSegment = $this->deriveCacheSlugSegment($industry, $slug);
        $cacheKey         = self::CACHE_KEY_PREFIX . $cacheSlugSegment;

        return PageCache::remember(
            $cacheKey,
            self::CACHE_TTL,
            fn (): string => $this->renderIndustryPage($industry, $cacheSlugSegment)
        );
    }

    /**
     * Core renderer for an individual industry page.
     * Used by HTTP (via show()) and can be used by cron/CLI.
     *
     * @param array  $industry     Industry config array
     * @param string $slugSegment  Last path segment used in the URL
     */
    private function renderIndustryPage(array $industry, string $slugSegment): string
    {
        $baseUrl = rtrim(config('app.url', 'https://qalbit.com'), '/');

        // Derive canonical from configured slug or from URL slug
        $industrySlug  = $industry['slug'] ?? ('/industries/' . $slugSegment . '/');
        $canonicalPath = '/' . ltrim($industrySlug, '/');
        $canonical     = $baseUrl . rtrim($canonicalPath, '/') . '/';

        $seo = [
            'title'       => $industry['meta_title']       ?? (($industry['name'] ?? 'Industry') . ' – QalbIT'),
            'description' => $industry['meta_description'] ?? '',
            'canonical'   => $canonical,
        ];

        $faqKey = $industry['faq_key'] ?? null;
        $faqs   = $faqKey ? Faqs::for($faqKey) : [];

        // Global Schemas
        $orgSchema         = Schema::organization();
        $websiteSchema     = Schema::website();
        $breadcrumbsSchema = Schema::breadcrumbs([
            ['name' => 'Home',       'url' => '/'],
            ['name' => 'Industries', 'url' => '/industries/'],
            ['name' => $industry['name'] ?? 'Industry', 'url' => $canonicalPath],
        ]);

        // FAQ schema only if we actually have FAQs
        $faqSchema = !empty($faqs)
            ? Schema::faq($faqs, $canonical, $seo['title'])
            : null;

        $jsonLd = array_values(array_filter([
            $orgSchema,
            $websiteSchema,
            $breadcrumbsSchema,
            $faqSchema,
        ]));

        $content = View::render('pages/industries/show', [
            'seo'      => $seo,
            'industry' => $industry,
            'faqs'     => $faqs,
        ]);

        return View::render('layouts/main', [
            'seo'     => $seo,
            'content' => $content,
            'jsonLd'  => $jsonLd,
            'pageId'  => 'industry-detail',
        ]);
    }

    /**
     * Derive a stable slug segment for cache keys.
     * Prefer last segment of configured slug, fallback to URL slug.
     */
    private function deriveCacheSlugSegment(array $industry, string $urlSlug): string
    {
        if (!empty($industry['slug'])) {
            $normalized = trim((string) $industry['slug'], '/'); // e.g. "industries/fintech"
            $parts      = explode('/', $normalized);
            $segment    = end($parts); // e.g. "fintech"

            if (!empty($segment)) {
                return $segment;
            }
        }

        return trim($urlSlug, '/');
    }

    /**
     * Find industry by last path segment of its slug.
     *
     * config slug: /industries/fintech/
     * URL:         /industries/fintech/
     * $slug:       "fintech"
     */
    protected function findIndustryBySlugSegment(array $industries, string $slug): ?array
    {
        $slug = trim($slug, '/');

        foreach ($industries as $industry) {
            if (empty($industry['slug'])) {
                continue;
            }

            $normalized = trim($industry['slug'], '/'); // e.g. "industries/fintech"
            $parts      = explode('/', $normalized);
            $segment    = end($parts); // e.g. "fintech"

            if ($segment === $slug) {
                return $industry;
            }
        }

        return null;
    }
}
