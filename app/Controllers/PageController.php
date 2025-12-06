<?php

namespace App\Controllers;

use App\Support\CaseStudy;
use App\Support\Faqs;
use App\Support\Industry;
use App\Support\Portfolio;
use App\Support\Reviews;
use App\Support\Schema;
use App\Support\Service;
use App\Support\Technology;
use App\Support\Client;
use App\Support\View;
use App\Support\WordPressClient;

class PageController 
{
    public function home(): string
    {
        $baseUrl = rtrim(config('app.url', 'https://qalbit.com'), '/');

        $seo = [
            'title' => 'Custom Software Development Company - QalbIT',
            'description' => 'QalbIT builds custom web, mobile, and cloud software for startups and businesses worldwide. 11+ years, 120+ projects, 90+ clients.',
            'canonical'   => $baseUrl . '/',
        ];

        // Fetch all services for the home context
        $services = Service::all();

        // Fetch all industries for the home context
        $industries = Industry::all();

        // Fetch all case studies for the home context
        $caseStudies = CaseStudy::all();

        // Fetch all reviews for the home context
        $reviews = Reviews::find('home');

        // Fetch all technologies for the home context
        $technologies = Technology::allForHome();

        // Fetch All Clients for the home context
        $clients = Client::all();
    
        // FAQs for the home context
        $faqs = Faqs::for('home');
        $faqSchema = Schema::faq($faqs, $seo['canonical'], $seo['title']);

        // Blog posts – latest from all categories
        $wpClient = new WordPressClient();
        $blogPosts = $wpClient->fetchRecentPosts(3, null);


        // Global Schemas
        $orgSchema = Schema::organization();
        $websiteSchema = Schema::website();
        $breadcrumbsSchema = Schema::breadcrumbs([
            ['name' => 'Home', 'url' => '/'],
        ]);

        // JSON-LD
        $jsonLd = array_values(array_filter([
            $orgSchema,
            $websiteSchema,
            $breadcrumbsSchema,
            $faqSchema,
        ]));

        // Render the home page partial
        $content = View::render('pages/home/index', [
            'seo'           => $seo,
            'services'      => $services,
            'industries'    => $industries,
            'caseStudies'   => $caseStudies,
            'reviews'       => $reviews,
            'technologies'  => $technologies,
            'clients'       => $clients,
            'faqs'          => $faqs,
            'blogPosts'     => $blogPosts,
        ]);

        // Wrap it in main layout
        return View::render('layouts/main', [
            'seo'       => $seo,
            'content'   => $content,
            'jsonLd'    => $jsonLd,
            'pageId'    => 'home'
        ]);
    }

    public function about(): string
    {
        $baseUrl = rtrim(config('app.url', 'https://qalbit.com'), '/');

        $seo = [
            'title' => 'About QalbIT – Custom Software Development Company',
            'description' => 'Learn about QalbIT Infotech, a custom software development company helping startups and businesses build reliable web, mobile, and cloud solutions since 2018.',
            'canonical' => $baseUrl . '/about-us/',
        ];

        // FAQs for the home context
        $faqs = Faqs::for('faq_aboutus');
        $faqSchema = Schema::faq($faqs, $seo['canonical'], $seo['title']);

        // Global Schemas
        $orgSchema = Schema::organization();
        $websiteSchema = Schema::website();
        $breadcrumbsSchema = Schema::breadcrumbs([
            ['name' => 'About Us', 'url' => '/about-us/'],
        ]);

        // JSON-LD
        $jsonLd = array_values(array_filter([
            $orgSchema,
            $websiteSchema,
            $breadcrumbsSchema,
            $faqSchema,
        ]));

        $content = View::render('pages/about/index', [
            'seo'  => $seo,
            'faqs' => $faqs
        ]);

        return View::render('layouts/main', [
            'seo'     => $seo,
            'content' => $content,
            'jsonLd'  => $jsonLd,
            'pageId'  => 'aboutus'
        ]);
    }

    public function portfolio(): string
    {
        $baseUrl = rtrim(config('app.url', 'https://qalbit.com'), '/');

        $seo = [
            'title'       => 'Software Project Portfolio | QalbIT',
            'description' => 'Selected projects and case studies delivered by QalbIT across SaaS, healthcare, logistics, telecom and more.',
            'canonical'   => $baseUrl . '/portfolio/',
        ];

        // Read filters from query string: ?industry=healthcare&tech=laravel
        $industry = isset($_GET['industry']) ? trim((string) $_GET['industry']) : null;
        $tech     = isset($_GET['tech']) ? trim((string) $_GET['tech']) : null;

        $allIndustries   = Portfolio::industries();
        $allTechnologies = Portfolio::technologies();

        // Validate filter values against known vocabularies
        if ($industry !== null && $industry !== '' && !array_key_exists($industry, $allIndustries)) {
            $industry = null;
        }

        if ($tech !== null && $tech !== '' && !array_key_exists($tech, $allTechnologies)) {
            $tech = null;
        }

        $items         = Portfolio::filter($industry, $tech);
        $featuredItems = Portfolio::featured();

        // Page + sections config for portfolio
        $pageConfig    = config('portfolio.page', []);
        $sections      = $pageConfig['sections'] ?? [];

        // FAQs for the portfolio page
        $faqs = Faqs::for('portfolio');
        $faqSchema = Schema::faq($faqs, $seo['canonical'], $seo['title']);

        // Global schemas (optional – similar to home)
        $orgSchema        = Schema::organization();
        $websiteSchema    = Schema::website();
        $breadcrumbsSchema = Schema::breadcrumbs([
            ['name' => 'Home', 'url' => '/'],
            ['name' => 'Portfolio', 'url' => '/portfolio/'],
        ]);

        $jsonLd = array_values(array_filter([
            $orgSchema,
            $websiteSchema,
            $breadcrumbsSchema,
            $faqSchema,
        ]));

        $content = View::render('pages/portfolio/index', [
            'seo'              => $seo,
            'page'             => $pageConfig,
            'sections'         => $sections,
            'items'            => $items,
            'featuredItems'    => $featuredItems,
            'allIndustries'    => $allIndustries,
            'allTechnologies'  => $allTechnologies,
            'activeIndustry'   => $industry,
            'activeTechnology' => $tech,
            'faqs'             => $faqs,
        ]);

        return View::render('layouts/main', [
            'seo'     => $seo,
            'content' => $content,
            'jsonLd'  => $jsonLd,
            'pageId'  => 'portfolio',
        ]);
    }

    public function careers(): string
    {
        $baseUrl = rtrim(config('app.url', 'https://qalbit.com'), '/');

        // ---------------------------
        // Page + SEO
        // ---------------------------
        $page      = config('careers.page', []);
        $sections  = config('careers.sections', []);
        $filters   = config('careers.filters', []);
        $roles     = config('careers.roles', []);
        $evergreen = config('careers.evergreen_roles', []);

        $slug = $page['slug'] ?? '/careers/';

        $seo = [
            'title'       => $page['meta_title']
                ?? 'Software Developer Jobs in Ahmedabad – Careers at QalbIT',
            'description' => $page['meta_description']
                ?? ($page['summary'] ?? 'Explore careers at QalbIT in Ahmedabad – engineering, frontend, mobile, QA and product roles.'),
            'canonical'   => $page['canonical'] ?? ($baseUrl . $slug),
        ];

        // ---------------------------
        // Read filters from query
        // ?team=engineering&experience=two_four&location=ahmedabad_onsite&type=full_time
        // ---------------------------
        $team       = isset($_GET['team'])       ? trim((string) $_GET['team'])       : null;
        $experience = isset($_GET['experience']) ? trim((string) $_GET['experience']) : null;
        $location   = isset($_GET['location'])   ? trim((string) $_GET['location'])   : null;
        $type       = isset($_GET['type'])       ? trim((string) $_GET['type'])       : null;

        $teams            = $filters['teams']             ?? [];
        $experienceLevels = $filters['experience_levels'] ?? [];
        $locations        = $filters['locations']         ?? [];
        $employmentTypes  = $filters['employment_types']  ?? [];

        // Validate filter values against known vocabularies
        if ($team !== null && $team !== '' && !array_key_exists($team, $teams)) {
            $team = null;
        }
        if ($experience !== null && $experience !== '' && !array_key_exists($experience, $experienceLevels)) {
            $experience = null;
        }
        if ($location !== null && $location !== '' && !array_key_exists($location, $locations)) {
            $location = null;
        }
        if ($type !== null && $type !== '' && !array_key_exists($type, $employmentTypes)) {
            $type = null;
        }

        // ---------------------------
        // Filter roles – only open positions, then apply filters
        // ---------------------------
        $openRoles = array_filter($roles, static function (array $role): bool {
            return !empty($role['is_open']);
        });

        $filteredOpenRoles = array_filter(
            $openRoles,
            static function (array $role) use ($team, $experience, $location, $type): bool {
                if ($team !== null && ($role['team'] ?? null) !== $team) {
                    return false;
                }
                if ($experience !== null && ($role['experience'] ?? null) !== $experience) {
                    return false;
                }
                if ($location !== null && ($role['location'] ?? null) !== $location) {
                    return false;
                }
                if ($type !== null && ($role['employment_type'] ?? null) !== $type) {
                    return false;
                }

                return true;
            }
        );

        // (Optional) keep config order; if you ever add an 'order' key you can sort here.

        // ---------------------------
        // FAQs + schema
        // ---------------------------
        $faqKey   = $page['faq_key'] ?? 'faq_careers_qalbit';
        $faqs     = Faqs::for($faqKey);
        $faqSchema = Schema::faq($faqs, $seo['canonical'], $page['faq_title'] ?? $seo['title']);

        // Global schemas
        $orgSchema         = Schema::organization();
        $websiteSchema     = Schema::website();
        $breadcrumbsSchema = Schema::breadcrumbs([
            ['name' => 'Home',    'url' => '/'],
            ['name' => 'Careers', 'url' => $slug],
        ]);

        $jsonLd = array_values(array_filter([
            $orgSchema,
            $websiteSchema,
            $breadcrumbsSchema,
            $faqSchema,
        ]));

        // ---------------------------
        // Render careers page partial
        // ---------------------------
        $content = View::render('pages/careers/index', [
            'seo'              => $seo,
            'page'             => $page,
            'sections'         => $sections,
            'filters'          => $filters,

            // roles
            'roles'            => $roles,
            'openRoles'        => $filteredOpenRoles,
            'allOpenRoles'     => $openRoles,
            'evergreenRoles'   => $evergreen,

            // active filters for UI
            'activeTeam'       => $team,
            'activeExperience' => $experience,
            'activeLocation'   => $location,
            'activeType'       => $type,

            // FAQs
            'faqs'             => $faqs,
        ]);

        // ---------------------------
        // Wrap in main layout
        // ---------------------------
        return View::render('layouts/main', [
            'seo'     => $seo,
            'content' => $content,
            'jsonLd'  => $jsonLd,
            'pageId'  => 'careers',
        ]);
    }


    public function privacyPolicy(): string
    {
        $baseUrl = rtrim(config('app.url', 'https://qalbit.com'), '/');

        $seo = [
            'title'       => 'Privacy Policy | QalbIT Infotech Pvt Ltd',
            'description' => 'Read how QalbIT Infotech Pvt Ltd collects, uses and protects your personal data when you interact with qalbit.com and our services.',
            'canonical'   => $baseUrl . '/privacy-policy/',
            'noindex'     => false, // set to true if you prefer to noindex legal pages
        ];

        $content = View::render('pages/legal/privacy-policy', [
            'seo' => $seo,
        ]);

        return View::render('layouts/main', [
            'seo'     => $seo,
            'content' => $content,
        ]);
    }

    public function termsOfService(): string
    {
        $baseUrl = rtrim(config('app.url', 'https://qalbit.com'), '/');

        $seo = [
            'title'       => 'Terms & Conditions | QalbIT Infotech Pvt Ltd',
            'description' => 'Review the terms and conditions that apply when you use qalbit.com, our content and our software development services.',
            'canonical'   => $baseUrl . '/terms-and-conditions/',
            'noindex'     => false,
        ];

        $content = View::render('pages/legal/terms-and-conditions', [
            'seo' => $seo,
        ]);

        return View::render('layouts/main', [
            'seo'     => $seo,
            'content' => $content,
        ]);
    }

    public function cookiePolicy(): string
    {
        $baseUrl = rtrim(config('app.url', 'https://qalbit.com'), '/');

        $seo = [
            'title'       => 'Cookie Policy | QalbIT Infotech Pvt Ltd',
            'description' => 'Learn how QalbIT uses cookies and similar technologies on qalbit.com, including what we collect and how you can control your preferences.',
            'canonical'   => $baseUrl . '/cookie-policy/',
            'noindex'     => false,
        ];

        $content = View::render('pages/legal/cookie-policy', [
            'seo' => $seo,
        ]);

        return View::render('layouts/main', [
            'seo'     => $seo,
            'content' => $content,
        ]);
    }

    public function sitemap(): string
    {
        $baseUrl = rtrim(config('app.url', 'https://qalbit.com'), '/');

        $seo = [
            'title'       => 'Sitemap | QalbIT Infotech Pvt Ltd',
            'description' => 'Browse a structured overview of all key QalbIT pages – services, industries, technologies, portfolio, careers, insights and legal information.',
            'canonical'   => $baseUrl . '/sitemap/',
            'noindex'     => false,
        ];

        $content = View::render('pages/sitemap/index', [
            'seo' => $seo,
        ]);

        return View::render('layouts/main', [
            'seo'     => $seo,
            'content' => $content,
        ]);
    }

}