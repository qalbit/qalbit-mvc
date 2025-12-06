<?php

namespace App\Controllers;

use App\Support\Faqs;
use App\Support\PageCache;
use App\Support\Schema;
use App\Support\View;

class TechnologyController
{
    private const CACHE_TTL        = 900; // 15 minutes
    private const CACHE_KEY_INDEX  = 'page_technologies_index';
    private const CACHE_KEY_PREFIX = 'page_technology_';

    /**
     * Core renderer for Technologies index: /technologies/
     */
    private function renderIndexPage(): string
    {
        $all = config('technologies', []);

        // Filter enabled
        $enabled = array_filter($all, static function (array $tech): bool {
            return !empty($tech['enabled']);
        });

        // Sort by order
        uasort($enabled, static function (array $a, array $b): int {
            $orderA = $a['order'] ?? 999;
            $orderB = $b['order'] ?? 999;
            return $orderA <=> $orderB;
        });

        // Group by category
        $grouped = [];
        foreach ($enabled as $key => $tech) {
            $category = $tech['category'] ?? 'other';
            $grouped[$category][$key] = $tech;
        }

        $baseUrl = rtrim(config('app.url', 'https://qalbit.com'), '/');

        $seo = [
            'title'       => 'Technologies We Use – React, Node.js, Laravel, Flutter & More | QalbIT',
            'description' => 'Explore the core technologies QalbIT uses to build web, mobile and SaaS products: React, Node.js, Nest.js, Laravel, Flutter, WordPress and more.',
            'canonical'   => $baseUrl . '/technologies/',
        ];

        // FAQs for the technology page
        $faqs = Faqs::for('faq_technology');

        // Global Schemas
        $orgSchema         = Schema::organization();
        $websiteSchema     = Schema::website();
        $breadcrumbsSchema = Schema::breadcrumbs([
            ['name' => 'Home',         'url' => '/'],
            ['name' => 'Technologies', 'url' => '/technologies/'],
        ]);
        $faqSchema         = Schema::faq($faqs, $seo['canonical'], $seo['title']);

        // JSON-LD
        $jsonLd = array_values(array_filter([
            $orgSchema,
            $websiteSchema,
            $breadcrumbsSchema,
            $faqSchema,
        ]));

        $content = View::render('pages/technologies/index', [
            'seo'          => $seo,
            'technologies' => $enabled,
            'faqs'         => $faqs,
            'grouped'      => $grouped,
        ]);

        return View::render('layouts/main', [
            'seo'     => $seo,
            'content' => $content,
            'jsonLd'  => $jsonLd,
            'pageId'  => 'technologies',
        ]);
    }

    /**
     * HTTP entry: Technologies index – cached with TTL.
     */
    public function index(): string
    {
        return PageCache::remember(
            self::CACHE_KEY_INDEX,
            self::CACHE_TTL,
            fn (): string => $this->renderIndexPage()
        );
    }

    /**
     * HTTP entry: Individual technology page: /technologies/{slug}/
     *
     * Example: /technologies/reactjs/
     */
    public function show(string $slug): string
    {
        $all = config('technologies', []);

        $technology = $this->findTechnologyBySlugSegment($all, $slug);

        if (!$technology) {
            http_response_code(404);
            return 'Technology not found';
        }

        // Stable slug segment for cache key (prefer config slug).
        $cacheSlugSegment = $this->deriveCacheSlugSegment($technology, $slug);
        $cacheKey         = self::CACHE_KEY_PREFIX . $cacheSlugSegment;

        return PageCache::remember(
            $cacheKey,
            self::CACHE_TTL,
            fn (): string => $this->renderTechnologyPage($technology, $cacheSlugSegment)
        );
    }

    /**
     * Core renderer for individual technology page.
     *
     * @param array  $technology    Technology config
     * @param string $slugSegment   Last path segment used in the URL
     */
    private function renderTechnologyPage(array $technology, string $slugSegment): string
    {
        $baseUrl = rtrim(config('app.url', 'https://qalbit.com'), '/');

        // Derive canonical from configured slug or from URL slug
        $technologySlug  = $technology['slug'] ?? ('/technologies/' . $slugSegment . '/');
        $canonicalPath   = '/' . ltrim($technologySlug, '/');
        $canonical       = $baseUrl . rtrim($canonicalPath, '/') . '/';

        $seo = [
            'title'       => $technology['meta_title']       ?? (($technology['name'] ?? 'Technology') . ' – QalbIT'),
            'description' => $technology['meta_description'] ?? '',
            'canonical'   => $canonical,
        ];

        // Load FAQs for this specific technology (if configured)
        $faqKey = $technology['faq_key'] ?? null;
        $faqs   = $faqKey ? Faqs::for($faqKey) : [];

        // Global Schemas
        $orgSchema         = Schema::organization();
        $websiteSchema     = Schema::website();
        $breadcrumbsSchema = Schema::breadcrumbs([
            ['name' => 'Home',         'url' => '/'],
            ['name' => 'Technologies', 'url' => '/technologies/'],
            ['name' => $technology['name'] ?? 'Technology', 'url' => $canonicalPath],
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

        $content = View::render('pages/technologies/show', [
            'seo'        => $seo,
            'technology' => $technology,
            'faqs'       => $faqs,
        ]);

        return View::render('layouts/main', [
            'seo'     => $seo,
            'content' => $content,
            'jsonLd'  => $jsonLd,
            'pageId'  => 'technology-detail',
        ]);
    }

    /**
     * Derive a stable slug segment for cache keys.
     * Prefer last segment of configured slug, fallback to URL slug.
     */
    private function deriveCacheSlugSegment(array $technology, string $urlSlug): string
    {
        if (!empty($technology['slug'])) {
            $normalized = trim((string) $technology['slug'], '/');
            $parts      = explode('/', $normalized);
            $segment    = end($parts);

            if (!empty($segment)) {
                return $segment;
            }
        }

        return trim($urlSlug, '/');
    }

    /**
     * Find technology config by path segment of its slug.
     *
     * config slug: /technologies/reactjs/
     * URL:         /technologies/reactjs/
     * $slug:       "reactjs"
     */
    protected function findTechnologyBySlugSegment(array $technologies, string $slug): ?array
    {
        $slug = trim($slug, '/');

        foreach ($technologies as $technology) {
            if (empty($technology['slug'])) {
                continue;
            }

            $normalized = trim($technology['slug'], '/');
            $parts      = explode('/', $normalized);
            $segment    = end($parts);

            if ($segment === $slug) {
                return $technology;
            }
        }

        return null;
    }
}
