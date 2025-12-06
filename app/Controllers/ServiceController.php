<?php

namespace App\Controllers;

use App\Support\Faqs;
use App\Support\PageCache;
use App\Support\Schema;
use App\Support\Session;
use App\Support\View;

class ServiceController
{
    private const CACHE_TTL        = 900; // 15 minutes
    private const CACHE_KEY_INDEX  = 'page_services_index';
    private const CACHE_KEY_PREFIX = 'page_service_';

    /**
     * Core renderer for the Services index page: /services/
     * Used by HTTP entry point and can be used by cron/CLI.
     */
    private function renderIndexPage(
        array $contactErrors = [],
        array $contactOld = [],
        ?string $contactSuccess = null
    ): string {
        $allServices = config('services', []);

        // Filter to only enabled services
        $enabledServices = array_values(array_filter(
            $allServices,
            static function (array $service): bool {
                return !empty($service['enabled']);
            }
        ));

        // Sort by 'order' if present
        usort($enabledServices, static function (array $a, array $b): int {
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
            ['name' => 'Home',     'url' => '/'],
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

            'contactErrors'  => $contactErrors,
            'contactOld'     => $contactOld,
            'contactSuccess' => $contactSuccess,
        ]);

        return View::render('layouts/main', [
            'seo'     => $seo,
            'content' => $content,
            'jsonLd'  => $jsonLd,
            'pageId'  => 'services',
        ]);
    }

    /**
     * HTTP entry for Services index – cached with TTL.
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
     * HTTP entry for individual service page: /services/{slug}/
     *
     * Example URL: /services/custom-software-development/
     * Here $slug = "custom-software-development"
     *
     * We:
     *  - Resolve the service from config
     *  - Generate a stable cache key from the config slug (or fallback)
     *  - Cache the rendered page via PageCache::remember
     */
    public function show(string $slug): string
    {
        $allServices = config('services', []);

        $service = $this->findServiceBySlugSegment($allServices, $slug);

        if (!$service) {
            http_response_code(404);
            return 'Service not found';
        }

        // Derive a stable slug segment for cache key (prefer config slug).
        $cacheSlugSegment = $this->deriveCacheSlugSegment($service, $slug);
        $cacheKey         = self::CACHE_KEY_PREFIX . $cacheSlugSegment;

        return PageCache::remember(
            $cacheKey,
            self::CACHE_TTL,
            fn (): string => $this->renderServicePage($service, $cacheSlugSegment)
        );
    }

    /**
     * Core renderer for an individual service page.
     * Used by HTTP (via show()) and can be used by cron/CLI.
     *
     * @param array  $service        Service config array
     * @param string $slugSegment    Last path segment used in the URL
     */
    private function renderServicePage(array $service, string $slugSegment): string
    {
        $baseUrl = rtrim(config('app.url', 'https://qalbit.com'), '/');

        // Derive canonical from configured slug or from URL slug
        $serviceSlug   = $service['slug'] ?? ('/services/' . $slugSegment . '/');
        $canonicalPath = '/' . ltrim($serviceSlug, '/');
        $canonical     = $baseUrl . rtrim($canonicalPath, '/') . '/';

        $seo = [
            'title'       => $service['meta_title']       ?? (($service['name'] ?? 'Service') . ' – QalbIT'),
            'description' => $service['meta_description'] ?? '',
            'canonical'   => $canonical,
        ];

        // Load FAQs for this specific service (if configured)
        $faqKey = $service['faq_key'] ?? null;
        $faqs   = $faqKey ? Faqs::for($faqKey) : [];

        // Global Schemas
        $orgSchema         = Schema::organization();
        $websiteSchema     = Schema::website();
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
     * Derive a stable slug segment for cache keys.
     * Prefer last segment of configured slug, fallback to URL slug.
     */
    private function deriveCacheSlugSegment(array $service, string $urlSlug): string
    {
        if (!empty($service['slug'])) {
            $normalized = trim((string) $service['slug'], '/'); // e.g. "services/custom-software-development"
            $parts      = explode('/', $normalized);
            $segment    = end($parts);

            if (!empty($segment)) {
                return $segment;
            }
        }

        return trim($urlSlug, '/');
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
        $slug = trim($slug, '/');

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
