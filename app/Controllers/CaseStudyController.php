<?php

namespace App\Controllers;

use App\Support\Faqs;
use App\Support\Schema;
use App\Support\View;

class CaseStudyController
{
    /**
     * Case studies index: /case-studies/
     */
    public function index(): string
    {
        $all = config('case_studies', []);

        $enabled = array_filter($all, function (array $cs): bool {
            return !empty($cs['enabled']);
        });

        usort($enabled, function (array $a, array $b): int {
            $orderA = $a['order'] ?? 999;
            $orderB = $b['order'] ?? 999;
            return $orderA <=> $orderB;
        });

        $seo = [
            'title'       => 'Software Case Studies & Selected Work – QalbIT',
            'description' => 'Explore selected software projects delivered by QalbIT, including Snappystats, Bloomford and Hellory.',
        ];

        $content = View::render('pages/case-studies/index', [
            'seo'         => $seo,
            'caseStudies' => $enabled,
        ]);

        return View::render('layouts/main', [
            'seo'     => $seo,
            'content' => $content,
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
            return 'Case study not found';
        }

        $baseUrl = rtrim(config('app.url', 'https://qalbit.com'), '/');

        // Derive canonical from configured slug or from URL slug
        $caseStudySlug   = $caseStudy['slug'] ?? ('/case-studies/' . $slug . '/');
        $canonicalPath = '/' . ltrim($caseStudySlug, '/');
        $canonical     = $baseUrl . rtrim($canonicalPath, '/') . '/';

        $seo = [
            'title'       => $caseStudy['meta_title']       ?? ($caseStudy['name'] . ' – Case Study | QalbIT'),
            'description' => $caseStudy['meta_description'] ?? '',
            'canonical'   => $canonical,
        ];

        // Load FAQs for this specific service (if configured)
        $faqKey = $caseStudy['faq_key'] ?? null;
        $faqs   = $faqKey ? Faqs::for($faqKey) : [];

        // Global Schemas
        $orgSchema     = Schema::organization();
        $websiteSchema = Schema::website();
        $breadcrumbsSchema = Schema::breadcrumbs([
            ['name' => 'Home',     'url' => '/'],
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
     * Find a case study by the last segment of its slug.
     *
     * config slug: /case-studies/snappystats/
     * URL path:    /case-studies/snappystats/
     * $slug:       "snappystats"
     */
    protected function findBySlugSegment(array $caseStudies, string $slug): ?array
    {
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
