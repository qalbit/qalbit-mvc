<?php

namespace App\Controllers;

use App\Support\Faqs;
use App\Support\PageCache;
use App\Support\Schema;
use App\Support\View;

class ProcessController
{
    private const CACHE_TTL        = 900; // 15 minutes
    private const CACHE_KEY_PREFIX = 'page_process_';

    /**
     * /start-up-mvp/
     */
    public function startUpMvp(): string
    {
        return $this->cachedProcessPage('start-up-mvp');
    }

    /**
     * /product-scaling/
     */
    public function productScaling(): string
    {
        return $this->cachedProcessPage('product-scaling');
    }

    /**
     * /digital-transformation/
     */
    public function digitalTransformation(): string
    {
        return $this->cachedProcessPage('digital-transformation');
    }

    /**
     * /engagement-model/
     */
    public function engagementModel(): string
    {
        return $this->cachedProcessPage('engagement-model');
    }

    /**
     * Shared entry for all process pages – resolves config + wraps in cache.
     */
    private function cachedProcessPage(string $slugSegment): string
    {
        $allProcesses = config('process', []);

        $process = $this->findProcessBySlugSegment($allProcesses, $slugSegment);

        if (!$process) {
            http_response_code(404);
            return 'Process page not found';
        }

        // Derive a stable slug segment for cache key (prefer config slug).
        $cacheSlugSegment = $this->deriveCacheSlugSegment($process, $slugSegment);
        $cacheKey         = self::CACHE_KEY_PREFIX . $cacheSlugSegment;

        return PageCache::remember(
            $cacheKey,
            self::CACHE_TTL,
            fn (): string => $this->renderProcessPage($process, $cacheSlugSegment)
        );
    }

    /**
     * Core renderer for an individual process page.
     *
     * @param array  $process      Process config
     * @param string $slugSegment  Last path segment used in URL
     */
    private function renderProcessPage(array $process, string $slugSegment): string
    {
        $baseUrl = rtrim(config('app.url', 'https://qalbit.com'), '/');

        // Derive canonical from configured slug or from URL slug
        // Example config slug: /start-up-mvp/
        $processSlug  = $process['slug'] ?? ('/our-process/' . $slugSegment . '/');
        $canonicalPath = '/' . ltrim($processSlug, '/');
        $canonical     = $baseUrl . rtrim($canonicalPath, '/') . '/';

        $seo = [
            'title'       => $process['meta_title']       ?? (($process['name'] ?? 'Our Process') . ' - QalbIT'),
            'description' => $process['meta_description'] ?? '',
            'canonical'   => $canonical,
        ];

        // FAQs for the process slug
        $faqKey = $process['faq_key'] ?? null;
        $faqs   = $faqKey ? Faqs::for($faqKey) : [];

        // Global Schemas
        $orgSchema         = Schema::organization();
        $websiteSchema     = Schema::website();
        $breadcrumbsSchema = Schema::breadcrumbs([
            ['name' => 'Home',                     'url' => '/'],
            ['name' => $process['name'] ?? 'Our Process', 'url' => $canonicalPath],
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

        $content = View::render('pages/process/show', [
            'seo'     => $seo,
            'process' => $process,
            'faqs'    => $faqs,
        ]);

        return View::render('layouts/main', [
            'seo'     => $seo,
            'content' => $content,
            'jsonLd'  => $jsonLd,
            'pageId'  => 'process-detail',
        ]);
    }

    /**
     * Derive a stable slug segment for cache keys.
     * Prefer last segment of configured slug, fallback to route slug.
     */
    private function deriveCacheSlugSegment(array $process, string $routeSlug): string
    {
        if (!empty($process['slug'])) {
            $normalized = trim((string) $process['slug'], '/'); // e.g. "our-process/start-up-mvp"
            $parts      = explode('/', $normalized);
            $segment    = end($parts);                          // e.g. "start-up-mvp"

            if (!empty($segment)) {
                return $segment;
            }
        }

        return trim($routeSlug, '/');
    }

    /**
     * Find process config by last path segment of its slug.
     *
     * config slug: /start-up-mvp/
     * URL:         /start-up-mvp/
     * $slug:       "start-up-mvp"
     */
    protected function findProcessBySlugSegment(array $processes, string $slug): ?array
    {
        $slug = trim($slug, '/');

        foreach ($processes as $process) {
            if (empty($process['slug'])) {
                continue;
            }

            $normalized = trim($process['slug'], '/'); // e.g. "start-up-mvp"
            $parts      = explode('/', $normalized);
            $segment    = end($parts);                 // e.g. "start-up-mvp"

            if ($segment === $slug) {
                return $process;
            }
        }

        return null;
    }
}
