<?php

namespace App\Controllers;

use App\Support\Faqs;
use App\Support\Schema;
use App\Support\View;

class ServiceController
{
    /**
     * Services index page: /services/
     */
    public function index(): string
    {
        $allServices = config('services', []);

        // Filter to only enabled services
        $enabledServices = array_values(array_filter($allServices, function (array $service): bool {
            return !empty($service['enabled']);
        }));

        // Sort by 'order' if present
        usort($enabledServices, function (array $a, array $b): int {
            $orderA = $a['order'] ?? 999;
            $orderB = $b['order'] ?? 999;
            return $orderA <=> $orderB;
        });

        $baseUrl = rtrim(config('app.url', 'https://qalbit.com'), '/');

        $seo = [
            'title'       => 'Custom Software Development Services – QalbIT',
            'description' => 'Explore QalbIT’s custom software, web, mobile, e-commerce, SaaS, API, cloud and AI development services for startups and modern businesses.',
            'canonical'   => $baseUrl . '/services/',
        ];

        // FAQs for the services page (new context)
        $faqs = Faqs::for('faq_service');

        // Global Schemas
        $orgSchema         = Schema::organization();
        $websiteSchema     = Schema::website();
        $breadcrumbsSchema = Schema::breadcrumbs([
            ['name' => 'Home', 'url' => '/'],
            ['name' => 'Services', 'url' => '/services/'],
        ]);
        $faqSchema         = Schema::faq($faqs, $seo['canonical'], $seo['title']);

        // JSON-LD
        $jsonLd = array_values(array_filter([
            $orgSchema,
            $websiteSchema,
            $breadcrumbsSchema,
            $faqSchema,
        ]));

        $content = View::render('pages/services/index', [
            'seo'      => $seo,
            'services' => $enabledServices,
            'faqs'     => $faqs,
        ]);

        return View::render('layouts/main', [
            'seo'     => $seo,
            'content' => $content,
            'jsonLd'  => $jsonLd,
            'pageId'  => 'services',
        ]);
    }


    /**
     * Individual service page: /services/{slug}/
     *
     * Example URL: /services/custom-software-development/
     * Here $slug = "custom-software-development"
     */
    public function show(string $slug): string
    {
        $allServices = config('services', []);

        $service = $this->findServiceBySlugSegment($allServices, $slug);

        if (!$service) {
            http_response_code(404);
            return 'Service not found';
        }

        $baseUrl = rtrim(config('app.url', 'https://qalbit.com'), '/');

        // Derive canonical from configured slug or from URL slug
        $serviceSlug   = $service['slug'] ?? ('/services/' . $slug . '/');
        $canonicalPath = '/' . ltrim($serviceSlug, '/');
        $canonical     = $baseUrl . rtrim($canonicalPath, '/') . '/';

        $seo = [
            'title'       => $service['meta_title']       ?? ($service['name'] . ' – QalbIT'),
            'description' => $service['meta_description'] ?? '',
            'canonical'   => $canonical,
        ];

        // Load FAQs for this specific service (if configured)
        $faqKey = $service['faq_key'] ?? null;
        $faqs   = $faqKey ? Faqs::for($faqKey) : [];

        // Global Schemas
        $orgSchema     = Schema::organization();
        $websiteSchema = Schema::website();
        $breadcrumbsSchema = Schema::breadcrumbs([
            ['name' => 'Home',     'url' => '/'],
            ['name' => 'Services', 'url' => '/services/'],
            ['name' => $service['name'] ?? 'Service', 'url' => $canonicalPath],
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

        $content = View::render('pages/services/show', [
            'seo'     => $seo,
            'service' => $service,
            'faqs'    => $faqs,
        ]);

        return View::render('layouts/main', [
            'seo'     => $seo,
            'content' => $content,
            'jsonLd'  => $jsonLd,
            'pageId'  => 'service-detail',
        ]);
    }

    /**
     * Find service config by last path segment of its slug.
     *
     * config slug: /services/custom-software-development/
     * URL:         /services/custom-software-development/
     * $slug:       "custom-software-development"
     */
    protected function findServiceBySlugSegment(array $services, string $slug): ?array
    {
        foreach ($services as $service) {
            if (empty($service['slug'])) {
                continue;
            }

            $normalized = trim($service['slug'], '/'); // e.g. "services/custom-software-development"
            $parts      = explode('/', $normalized);
            $segment    = end($parts); // e.g. "custom-software-development"

            if ($segment === $slug) {
                return $service;
            }
        }

        return null;
    }
}
