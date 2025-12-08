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

        $seo = [
            'title'       => $caseStudy['meta_title']       ?? (($caseStudy['name'] ?? 'Case Study') . ' – Case Study | QalbIT'),
            'description' => $caseStudy['meta_description'] ?? '',
            'canonical'   => $canonical,
        ];

        // Load FAQs for this specific case study (if configured)
        $faqKey = $caseStudy['faq_key'] ?? null;
        $faqs   = $faqKey ? Faqs::for($faqKey) : [];

        // Global Schemas
        $orgSchema         = Schema::organization();
        $websiteSchema     = Schema::website();
        $breadcrumbsSchema = Schema::breadcrumbs([
            ['name' => 'Home', 'url' => '/'],
            // If you later add a /case-studies/ index, you can insert that breadcrumb here.
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
