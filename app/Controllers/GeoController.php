<?php

namespace App\Controllers;

use App\Support\Faqs;
use App\Support\Schema;
use App\Support\View;

class GeoController
{
    /**
     * Country-specific index: /{country}/
     *
     * Example: /usa/ → list all USA locations.
     */
    public function indexCountry(string $country): string
    {
        $allLocations = config('geo', []);

        // Filter by country_key
        $countryLocations = array_filter($allLocations, function (array $loc) use ($country): bool {
            return !empty($loc['enabled']) && ($loc['country_key'] ?? null) === $country;
        });

        if (empty($countryLocations)) {
            http_response_code(404);
            return 'Country not found';
        }

        // Sort by 'order'
        usort($countryLocations, function (array $a, array $b): int {
            $orderA = $a['order'] ?? 999;
            $orderB = $b['order'] ?? 999;
            return $orderA <=> $orderB;
        });

        // Take country_name from first result
        $first      = reset($countryLocations);
        $countryKey = $country;
        $countryName = $first['country_name'] ?? strtoupper($countryKey);

        $seo = [
            'title'       => 'Custom Software Development in ' . $countryName . ' – QalbIT',
            'description' => 'Discover QalbIT’s custom software development services for clients in ' . $countryName . '.',
        ];

        $content = View::render('pages/geo/index', [
            'seo'          => $seo,
            'locations'    => $countryLocations,
            'countryKey'   => $countryKey,
            'countryName'  => $countryName,
        ]);

        return View::render('layouts/main', [
            'seo'     => $seo,
            'content' => $content,
        ]);
    }

    /**
     * Individual location page: /{country}/{state}/
     *
     * Example: /usa/new-jersey/ → $country = "usa", $state = "new-jersey"
     */
    public function show(string $country, string $state): string
    {
        // Load all locations from config/geo.php
        $allLocations = config('geo', []);
        $location = $this->findLocation($allLocations, $country, $state);

        if (!$location || empty($location['enabled'])) {
            http_response_code(404);
            return 'Location not found';
        }

        $baseUrl = rtrim(config('app.url', 'https://qalbit.com'), '/');

        // Derive canonical from configured slug or from URL params
        $locationSlug  = $location['slug'] ?? ('/' . trim($country, '/') . '/' . trim($state, '/') . '/');
        $canonicalPath = '/' . ltrim($locationSlug, '/');
        $canonical     = $baseUrl . rtrim($canonicalPath, '/') . '/';

        // Prefer the normalised SEO block, but stay backward compatible
        $seoConfig   = $location['seo'] ?? [];
        $defaultName = $location['name'] ?? 'Location';

        $seoTitle = $seoConfig['meta_title']
            ?? $location['meta_title']
            ?? (($location['headline'] ?? $defaultName) . ' – QalbIT');

        $seoDescription = $seoConfig['meta_description']
            ?? $location['meta_description']
            ?? '';

        $seo = [
            'title'       => $seoTitle,
            'description' => $seoDescription,
            'canonical'   => $canonical,
        ];

        // Load FAQs for this specific location (if configured)
        $faqKey = $location['faq_key']
            ?? ($seoConfig['faq_key'] ?? null);

        $faqs = $faqKey ? Faqs::for($faqKey) : [];

        // Global Schemas
        $orgSchema        = Schema::organization();
        $websiteSchema    = Schema::website();

        // Use breadcrumb config from SEO if present, otherwise build a simple fallback
        $breadcrumbsConfig = $seoConfig['breadcrumbs'] ?? null;

        if (is_array($breadcrumbsConfig) && !empty($breadcrumbsConfig)) {
            $breadcrumbsSchema = Schema::breadcrumbsLocation($breadcrumbsConfig);
        } else {
            $breadcrumbsSchema = Schema::breadcrumbsLocation([
                ['name' => 'Home',                         'url' => '/'],
                ['name' => ucfirst($country),              'url' => '/' . urlencode($country) . '/'],
                ['name' => $location['name'] ?? 'Location','url' => $canonicalPath],
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
