<?php

namespace App\Controllers;

use App\Support\Faqs;
use App\Support\Schema;
use App\Support\View;

class ProcessController
{
    /**
     * /our-process/ – overview page listing the 4 child pages.
     * If you truly do not want a base page, you can remove this method + route.
     */
    public function index(): string
    {
        $baseUrl = rtrim(config('app.url', 'https://qalbit.com'), '/');

        $seo = [
            'title'       => 'How We Work With You | Our Process | QalbIT',
            'description' => 'Understand how QalbIT works with founders and teams across Start-up MVPs, product scaling, digital transformation and ongoing engagements.',
            'canonical'   => $baseUrl . '/our-process/',
        ];

        $processPages = config('process', []);

        $content = View::render('pages/process/index', [
            'seo'          => $seo,
            'processPages' => $processPages,
        ]);

        return View::render('layouts/main', [
            'seo'     => $seo,
            'content' => $content,
        ]);
    }

    /**
     * /our-process/{slug}/ – detail page for one child.
     */
    public function show(string $slug): string
    {
        $allProcesses = config('process', []);

        $process = $this->findProcessBySlugSegment($allProcesses, $slug);

        if (!$process) {
            http_response_code(404);
            return 'Process page not found';
        }

        $baseUrl = rtrim(config('app.url', 'https://qalbit.com'), '/');

        // Derive canonical from configured slug or from URL slug
        $processSlug   = $process['slug'] ?? ( $slug . '/');
        $canonicalPath = '/' . ltrim($processSlug, '/');
        $canonical     = $baseUrl . rtrim($canonicalPath, '/') . '/';

        $seo = [
            'title'       => $process['meta_title'] ?? ($process['name'] . ' - QalbIT'),
            'description' => $process['meta_description'] ?? '',
            'canonical'   => $canonical,
        ];

        // FAQs for the process slug
        $faqKey = $process['faq_key'] ?? null;
        $faqs   = $faqKey ? Faqs::for($faqKey) : [];

        // Global Schemas
        $orgSchema     = Schema::organization();
        $websiteSchema = Schema::website();
        $breadcrumbsSchema = Schema::breadcrumbs([
            ['name' => 'Home',     'url' => '/'],
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
            'seo'       => $seo,
            'process'   => $process,
            'faqs'      => $faqs
        ]);

        return View::render('layouts/main', [
            'seo'     => $seo,
            'content' => $content,
            'jsonLd'  => $jsonLd,
            'pageId'  => 'process-detail',
        ]);
    }

    /**
     * Find process config by last path segment of its slug.
     *
     * config slug: /our-process/start-up-mvp/
     * URL:         /our-process/start-up-mvp/
     * $slug:       "start-up-mvp"
     */
    protected function findProcessBySlugSegment(array $processes, string $slug): ?array
    {
        foreach ($processes as $process) {
            if (empty($process['slug'])) {
                continue;
            }

            $normalized = trim($process['slug'], '/'); // e.g. "our-process/start-up-mvp"
            $parts      = explode('/', $normalized);
            $segment    = end($parts); // e.g. "start-up-mvp"

            if ($segment === $slug) {
                return $process;
            }
        }

        return null;
    }
}
