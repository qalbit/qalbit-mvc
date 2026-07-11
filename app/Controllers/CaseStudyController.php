<?php

namespace App\Controllers;

use App\Support\Faqs;
use App\Support\PageCache;
use App\Support\Schema;
use App\Support\View;

class CaseStudyController
{
    private const CACHE_TTL        = 900; // 15 minutes
    private const CACHE_KEY_PREFIX = 'page_case_study_';
    private const CACHE_KEY_INDEX  = 'page_case_studies_index';

    /**
     * Case studies index: /case-studies/
     */
    public function index(): string
    {
        return PageCache::remember(
            self::CACHE_KEY_INDEX,
            self::CACHE_TTL,
            fn (): string => $this->renderIndexPage()
        );
    }

    private function renderIndexPage(): string
    {
        $baseUrl = rtrim(config('app.url', 'https://qalbit.com'), '/');

        $all = array_values(array_filter(
            config('case_studies', []),
            static fn ($cs): bool => is_array($cs) && !empty($cs['enabled']) && !empty($cs['slug'])
        ));

        $seo = [
            'title'       => 'Software Development Case Studies & Client Results – QalbIT',
            'description' => 'Real case studies from QalbIT – custom web apps, SaaS platforms, portals and mobile products, with the outcomes they delivered for clients worldwide.',
            'canonical'   => $baseUrl . '/case-studies/',
            'image'       => og_image_url('/case-studies/'),
        ];

        $jsonLd = array_values(array_filter([
            Schema::organization(),
            Schema::website(),
            Schema::breadcrumbs([
                ['name' => 'Home',         'url' => '/'],
                ['name' => 'Case Studies', 'url' => '/case-studies/'],
            ]),
            Schema::itemList(
                'QalbIT Software Development Case Studies',
                array_map(static function (array $cs): array {
                    return [
                        'name' => $cs['name'] ?? '',
                        'url'  => $cs['slug'] ?? '',
                    ];
                }, $all)
            ),
        ]));

        $content = View::render('pages/case-studies/index', [
            'seo'         => $seo,
            'caseStudies' => $all,
        ]);

        return View::render('layouts/main', [
            'seo'     => $seo,
            'content' => $content,
            'jsonLd'  => $jsonLd,
            'pageId'  => 'casestudy-index',
        ]);
    }

    /**
     * Individual case study: /case-studies/{slug}/
     *
     * e.g. /case-studies/snappystats/
     */
    public function show(string $slug): string
    {
        $all = config('case_studies', []);

        $caseStudy = $this->findBySlugSegment($all, $slug);

        if (!$caseStudy) {
            http_response_code(404);

            $errorController = new ErrorController();
            return $errorController->notFound();
        }

        // Derive a stable slug segment for cache key (prefer config slug).
        $cacheSlugSegment = $this->deriveCacheSlugSegment($caseStudy, $slug);
        $cacheKey         = self::CACHE_KEY_PREFIX . $cacheSlugSegment;

        return PageCache::remember(
            $cacheKey,
            self::CACHE_TTL,
            fn (): string => $this->renderCaseStudyPage($caseStudy, $cacheSlugSegment)
        );
    }

    /**
     * Core renderer for an individual case study page.
     * Used by HTTP (via show()) and can be used by cron/CLI.
     *
     * @param array  $caseStudy     Case study config array
     * @param string $slugSegment   Last path segment used in the URL
     */
    private function renderCaseStudyPage(array $caseStudy, string $slugSegment): string
    {
        $baseUrl = rtrim(config('app.url', 'https://qalbit.com'), '/');

        // Derive canonical from configured slug or from URL slug
        $caseStudySlug  = $caseStudy['slug'] ?? ('/case-studies/' . $slugSegment . '/');
        $canonicalPath  = '/' . ltrim($caseStudySlug, '/');
        $canonical      = $baseUrl . rtrim($canonicalPath, '/') . '/';

        // Use the real product banner as the social share image
        $ogImage = !empty($caseStudy['banner'])
            ? $baseUrl . '/assets' . $caseStudy['banner']
            : null;

        $seo = [
            'title'       => $caseStudy['meta_title']       ?? (($caseStudy['name'] ?? 'Case Study') . ' – Case Study | QalbIT'),
            'description' => $caseStudy['meta_description'] ?? '',
            'canonical'   => $canonical,
            'image'       => $ogImage,
        ];

        // Load FAQs for this specific case study (if configured)
        $faqKey = $caseStudy['faq_key'] ?? null;
        $faqs   = $faqKey ? Faqs::for($faqKey) : [];

        // Global Schemas
        $orgSchema         = Schema::organization();
        $websiteSchema     = Schema::website();
        $breadcrumbsSchema = Schema::breadcrumbs([
            ['name' => 'Home',         'url' => '/'],
            ['name' => 'Case Studies', 'url' => '/case-studies/'],
            ['name' => $caseStudy['name'] ?? 'Case Study', 'url' => $canonicalPath],
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

        $content = View::render('pages/case-studies/show', [
            'seo'       => $seo,
            'caseStudy' => $caseStudy,
            'faqs'      => $faqs,
        ]);

        return View::render('layouts/main', [
            'seo'     => $seo,
            'content' => $content,
            'jsonLd'  => $jsonLd,
            'pageId'  => 'casestudy-detail',
        ]);
    }

    /**
     * Derive a stable slug segment for cache keys.
     * Prefer last segment of configured slug, fallback to URL slug.
     */
    private function deriveCacheSlugSegment(array $caseStudy, string $urlSlug): string
    {
        if (!empty($caseStudy['slug'])) {
            $normalized = trim((string) $caseStudy['slug'], '/'); // "case-studies/snappystats"
            $parts      = explode('/', $normalized);
            $segment    = end($parts);                            // "snappystats"

            if (!empty($segment)) {
                return $segment;
            }
        }

        return trim($urlSlug, '/');
    }

    /**
     * Find a case study by the last segment of its slug.
     *
     * config slug: /case-studies/snappystats/
     * URL path:    /case-studies/snappystats/
     * $slug:       "snappystats"
     */
    protected function findBySlugSegment(array $caseStudies, string $slug): ?array
    {
        $slug = trim($slug, '/');

        foreach ($caseStudies as $cs) {
            if (empty($cs['slug'])) {
                continue;
            }

            $normalized = trim($cs['slug'], '/'); // "case-studies/snappystats"
            $parts      = explode('/', $normalized);
            $segment    = end($parts);           // "snappystats"

            if ($segment === $slug) {
                return $cs;
            }
        }

        return null;
    }
}
