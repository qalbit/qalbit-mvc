<?php

namespace App\Controllers;

use App\Support\CaseStudy;
use App\Support\Client;
use App\Support\Faqs;
use App\Support\Industry;
use App\Support\PageCache;
use App\Support\Reviews;
use App\Support\Schema;
use App\Support\Service;
use App\Support\Session;
use App\Support\Technology;
use App\Support\View;
use App\Support\WordPressClient;

class HomeController 
{
    private const CACHE_KEY = 'page_home';
    private const CACHE_TTL = 900; // 15 Minutes

    /**
     * Core renderer used by both HTTP and cron.
     */
    private function renderPage(
        array $contactErrors = [],
        array $contactOld = [],
        ?string $contactSuccess = null
    ): string {
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

            'contactErrors'   => $contactErrors,
            'contactOld'      => $contactOld,
            'contactSuccess'  => $contactSuccess,
        ]);

        // Wrap it in main layout
        return View::render('layouts/main', [
            'seo'       => $seo,
            'content'   => $content,
            'jsonLd'    => $jsonLd,
            'pageId'    => 'home'
        ]);
    }

    /**
     * Normal HTTP entry point - cached with TTL.
     */
    public function index(): string
    {
        // Read contact flashes once
        $errors  = Session::getFlash('contact_errors', []);
        $old     = Session::getFlash('contact_old', []);
        $success = Session::getFlash('contact_success');

        $hasFlash = !empty($errors) || !empty($old) || !empty($success);

        // If there's any contact flash, do NOT use cache – render personalised page
        if ($hasFlash) {
            return $this->renderPage($errors, $old, $success);
        }

        // No flash data -> safe to use cached canonical home page
        return PageCache::remember(
            self::CACHE_KEY,
            self::CACHE_TTL,
            fn (): string => $this->renderPage()
        );
    }
}