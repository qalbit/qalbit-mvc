<?php

namespace App\Controllers;

use App\Support\View;

class PageController 
{

    public function sitemap(): string
    {
        // Cached so the WordPress API call for recent posts runs at most
        // once per TTL, not on every request.
        return \App\Support\PageCache::remember(
            'page_sitemap',
            900,
            fn (): string => $this->renderSitemapPage()
        );
    }

    private function renderSitemapPage(): string
    {
        $baseUrl = rtrim(config('app.url', 'https://qalbit.com'), '/');

        $seo = [
            'title'       => 'Sitemap | QalbIT Infotech Pvt Ltd',
            'description' => 'Browse a structured overview of all key QalbIT pages – services, industries, technologies, portfolio, careers, insights and legal information.',
            'canonical'   => $baseUrl . '/sitemap/',
            'image'       => og_image_url('/sitemap/'),
            'noindex'     => false,
        ];

        // Recent blog posts from WordPress (fails silently to [])
        $blogPosts = (new \App\Support\WordPressClient())->fetchRecentPosts(10);

        $content = View::render('pages/sitemap/index', [
            'seo'       => $seo,
            'blogPosts' => $blogPosts,
        ]);

        return View::render('layouts/main', [
            'seo'     => $seo,
            'content' => $content,
        ]);
    }

    /**
     * Software Development Cost Calculator: /tools/software-development-cost-calculator/
     * Client-side estimator with lead capture via the standard contact form.
     */
    public function costCalculator(): string
    {
        $baseUrl = rtrim(config('app.url', 'https://qalbit.com'), '/');

        $seo = [
            'title'       => 'Software Development Cost Calculator 2026 – Free Estimate',
            'description' => 'Estimate your software development cost in 2026 – MVP, CRM, ERP, SaaS, web and mobile apps. Instant free calculator with realistic ranges and timelines.',
            'canonical'   => $baseUrl . '/tools/software-development-cost-calculator/',
            'noindex'     => false,
            'image'       => og_image_url('/tools/software-development-cost-calculator/'),
        ];

        $faqs = \App\Support\Faqs::for('tool_cost_calculator');

        $jsonLd = array_values(array_filter([
            \App\Support\Schema::organization(),
            \App\Support\Schema::website(),
            \App\Support\Schema::breadcrumbs([
                ['name' => 'Home',            'url' => '/'],
                ['name' => 'Cost Calculator', 'url' => '/tools/software-development-cost-calculator/'],
            ]),
            [
                '@context'            => 'https://schema.org',
                '@type'               => 'WebApplication',
                'name'                => 'QalbIT Software Development Cost Calculator',
                'url'                 => $baseUrl . '/tools/software-development-cost-calculator/',
                'applicationCategory' => 'BusinessApplication',
                'operatingSystem'     => 'Any (browser-based)',
                'offers'              => [
                    '@type'         => 'Offer',
                    'price'         => '0',
                    'priceCurrency' => 'USD',
                ],
            ],
            !empty($faqs)
                ? \App\Support\Schema::faq($faqs, $seo['canonical'], $seo['title'])
                : null,
        ]));

        $content = View::render('pages/tools/cost-calculator', [
            'seo'  => $seo,
            'faqs' => $faqs,
        ]);

        return View::render('layouts/main', [
            'seo'     => $seo,
            'content' => $content,
            'jsonLd'  => $jsonLd,
            'pageId'  => 'tool-cost-calculator',
        ]);
    }

    /**
     * Free developer micro-tool: /tools/json-formatter/
     * Client-side only – nothing is uploaded to the server.
     */
    public function jsonFormatter(): string
    {
        $baseUrl = rtrim(config('app.url', 'https://qalbit.com'), '/');

        $seo = [
            'title'       => 'Free JSON Formatter, Validator & Minifier Online – QalbIT',
            'description' => 'Format, validate, minify and compress JSON online for free – find syntax errors with line numbers and reduce file size, all in your browser.',
            'canonical'   => $baseUrl . '/tools/json-formatter/',
            'noindex'     => false,
            'image'       => og_image_url('/tools/json-formatter/'),
        ];

        $jsonLd = array_values(array_filter([
            \App\Support\Schema::organization(),
            \App\Support\Schema::website(),
            \App\Support\Schema::breadcrumbs([
                ['name' => 'Home',           'url' => '/'],
                ['name' => 'JSON Formatter', 'url' => '/tools/json-formatter/'],
            ]),
            [
                '@context'            => 'https://schema.org',
                '@type'               => 'WebApplication',
                'name'                => 'QalbIT JSON Formatter & Minifier',
                'url'                 => $baseUrl . '/tools/json-formatter/',
                'applicationCategory' => 'DeveloperApplication',
                'operatingSystem'     => 'Any (browser-based)',
                'offers'              => [
                    '@type'         => 'Offer',
                    'price'         => '0',
                    'priceCurrency' => 'USD',
                ],
            ],
        ]));

        $content = View::render('pages/tools/json-formatter', [
            'seo' => $seo,
        ]);

        return View::render('layouts/main', [
            'seo'     => $seo,
            'content' => $content,
            'jsonLd'  => $jsonLd,
            'pageId'  => 'tool-json-formatter',
        ]);
    }

}