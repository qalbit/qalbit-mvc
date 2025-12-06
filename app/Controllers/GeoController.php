<?php

namespace App\Controllers;

use App\Support\Faqs;
use App\Support\Schema;
use App\Support\View;
use App\Support\PageCache;

class GeoController
{
    private const CACHE_TTL        = 900; // 15 minutes
    private const CACHE_KEY_PREFIX = 'page_geo_';

    /**
     * Individual location page: /{country}/{state}/
     *
     * Example: /usa/new-jersey/ → $country = "usa", $state = "new-jersey"
     */
    public function show(string $country, string $state): string
    {
        // Load all locations from config/geo.php
        $allLocations = config('geo', []);
        $location     = $this->findLocation($allLocations, $country, $state);

        if (!$location || empty($location['enabled'])) {
            http_response_code(404);

            $errorController = new ErrorController();
            return $errorController->notFound();
        }

        // Stable cache key segment (based on config slug if present, otherwise country+state)
        $cacheKeySegment = $this->deriveCacheKeySegment($location, $country, $state);
        $cacheKey        = self::CACHE_KEY_PREFIX . $cacheKeySegment;

        return PageCache::remember(
            $cacheKey,
            self::CACHE_TTL,
            fn (): string => $this->renderLocationPage($location, $country, $state)
        );
    }

    /**
     * Core renderer for a single geo location page.
     * Used by HTTP (via show) and can be used by cron/CLI warmers.
     */
    private function renderLocationPage(array $location, string $country, string $state): string
    {
        $baseUrl = rtrim(config('app.url', 'https://qalbit.com'), '/');

        // Derive canonical from configured slug or from URL params
        $locationSlug  = $location['slug'] ?? ('/' . trim($country, '/') . '/' . trim($state, '/') . '/');
        $canonicalPath = '/' . ltrim($locationSlug, '/');
        $canonical     = $baseUrl . rtrim($canonicalPath, '/') . '/';

        // Prefer the normalised SEO block, but stay backward compatible
        $seoConfig   = $location['seo'] ?? [];
        $defaultName = $location['name'] ?? 'Location';

        $seoTitle = $seoConfig['meta_title']
            ?? ($location['meta_title'] ?? (($location['headline'] ?? $defaultName) . ' – QalbIT'));

        $seoDescription = $seoConfig['meta_description']
            ?? ($location['meta_description'] ?? '');

        $seo = [
            'title'       => $seoTitle,
            'description' => $seoDescription,
            'canonical'   => $canonical,
        ];

        // Load FAQs for this specific location (if configured)
        $faqKey = $location['faq_key'] ?? ($seoConfig['faq_key'] ?? null);
        $faqs   = $faqKey ? Faqs::for($faqKey) : [];

        // Global Schemas
        $orgSchema     = Schema::organization();
        $websiteSchema = Schema::website();

        // Use breadcrumb config from SEO if present, otherwise build a simple fallback
        $breadcrumbsConfig = $seoConfig['breadcrumbs'] ?? null;

        if (is_array($breadcrumbsConfig) && !empty($breadcrumbsConfig)) {
            $breadcrumbsSchema = Schema::breadcrumbsLocation($breadcrumbsConfig);
        } else {
            $breadcrumbsSchema = Schema::breadcrumbsLocation([
                ['name' => 'Home',                        'url' => '/'],
                ['name' => ucfirst($country),             'url' => '/' . urlencode($country) . '/'],
                ['name' => $location['name'] ?? 'Location', 'url' => $canonicalPath],
            ]);
        }

        // FAQ schema only if we actually have FAQs
        $faqSchema = !empty($faqs)
            ? Schema::faq($faqs, $canonical, $seoTitle)
            : null;

        $jsonLd = array_values(array_filter([
            $orgSchema,
            $websiteSchema,
            $breadcrumbsSchema,
            $faqSchema,
        ]));

        // Render the location detail view (config-driven)
        $content = View::render('pages/geo/show', [
            'seo'      => $seo,
            'location' => $location,
            'faqs'     => $faqs,
        ]);

        return View::render('layouts/main', [
            'seo'     => $seo,
            'content' => $content,
            'jsonLd'  => $jsonLd,
            'pageId'  => 'location-detail',
        ]);
    }

    /**
     * Derive a stable cache-key segment.
     * Prefer config slug (normalized), fallback to country_state.
     */
    private function deriveCacheKeySegment(array $location, string $country, string $state): string
    {
        if (!empty($location['slug'])) {
            // e.g. "/usa/new-jersey/" → "usa-new-jersey"
            $normalized = trim((string) $location['slug'], '/');
            $normalized = str_replace('/', '-', $normalized);

            if ($normalized !== '') {
                return $normalized;
            }
        }

        // Fallback: "usa_new-jersey"
        return trim($country, '/') . '_' . trim($state, '/');
    }

    /**
     * Find a location by country_key + state_key.
     *
     * @param array  $locations
     * @param string $country
     * @param string $state
     * @return array|null
     */
    protected function findLocation(array $locations, string $country, string $state): ?array
    {
        foreach ($locations as $location) {
            if (
                !empty($location['enabled']) &&
                ($location['country_key'] ?? null) === $country &&
                ($location['state_key'] ?? null) === $state
            ) {
                return $location;
            }
        }

        return null;
    }
}
