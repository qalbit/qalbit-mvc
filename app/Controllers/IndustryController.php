<?php

namespace App\Controllers;

use App\Support\Faqs;
use App\Support\Schema;
use App\Support\View;

class IndustryController
{
    /**
     * Industries index page: /industries/
     */
    public function index(): string
    {
        $all = config('industries', []);

        // Filter to only enabled industries
        $enabled = array_filter($all, function (array $industry): bool {
            return !empty($industry['enabled']);
        });

        // Sort by 'order' if present
        usort($enabled, function (array $a, array $b): int {
            $orderA = $a['order'] ?? 999;
            $orderB = $b['order'] ?? 999;
            return $orderA <=> $orderB;
        });

        $baseUrl = rtrim(config('app.url', 'https://qalbit.com'), '/');

        $seo = [
            'title'       => 'Industries We Serve – QalbIT',
            'description' => 'QalbIT delivers custom software solutions for e-commerce, fintech, healthcare, education, travel, business operations and more.',
            'canonical'   => $baseUrl . '/technologies/',
        ];

        // FAQs for the technology page (new context)
        $faqs = Faqs::for('faq_industries');

        // Global Schemas
        $orgSchema         = Schema::organization();
        $websiteSchema     = Schema::website();
        $breadcrumbsSchema = Schema::breadcrumbs([
            ['name' => 'Home', 'url' => '/'],
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
        ]);

        return View::render('layouts/main', [
            'seo'     => $seo,
            'content' => $content,
            'jsonLd'  => $jsonLd,
            'pageId'  => 'industries',
        ]);
    }

    /**
     * Individual industry page: /industries/{slug}/
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

        $baseUrl = rtrim(config('app.url', 'https://qalbit.com'), '/');

        // Derive canonical from configured slug or from URL slug
        $industrySlug   = $industry['slug'] ?? ('/industries/' . $slug . '/');
        $canonicalPath = '/' . ltrim($industrySlug, '/');
        $canonical     = $baseUrl . rtrim($canonicalPath, '/') . '/';

        $seo = [
            'title'       => $industry['meta_title']       ?? ($industry['name'] . ' – QalbIT'),
            'description' => $industry['meta_description'] ?? '',
            'canonical'   => $canonical,
        ];

        $faqKey = $industry['faq_key'] ?? null;
        $faqs   = $faqKey ? Faqs::for($faqKey) : [];

        // Global Schemas
        $orgSchema     = Schema::organization();
        $websiteSchema = Schema::website();
        $breadcrumbsSchema = Schema::breadcrumbs([
            ['name' => 'Home',     'url' => '/'],
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
     * Find industry by last path segment of its slug.
     *
     * config slug: /industries/fintech/
     * URL:         /industries/fintech/
     * $slug:       "fintech"
     */
    protected function findIndustryBySlugSegment(array $industries, string $slug): ?array
    {
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
