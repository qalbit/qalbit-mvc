<?php

namespace App\Controllers;

use App\Support\Faqs;
use App\Support\PageCache;
use App\Support\Schema;
use App\Support\View;

class CareerController
{
    private const CACHE_KEY = 'page_career';
    private const CACHE_TTL = 900; // 15 Minutes

    /**
     * Core renderer used by both HTTP and cron for the careers index page.
     */
    private function renderPage(): string
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

        // ---------------------------
        // FAQs + schema
        // ---------------------------
        $faqKey    = $page['faq_key'] ?? 'faq_careers_qalbit';
        $faqs      = Faqs::for($faqKey);
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

    /**
     * Core renderer for the Apply page (generic and role-specific).
     * Used by HTTP and can be called from cron/CLI.
     */
    private function renderApplyPage(?string $roleSlug = null): string
    {
        $baseUrl = rtrim(config('app.url', 'https://qalbit.com'), '/');

        $careersConfig = config('careers', []);
        $rolesConfig   = $careersConfig['roles']   ?? [];
        $filters       = $careersConfig['filters'] ?? [];

        // Filters for mapping keys -> labels
        $teams            = $filters['teams']             ?? [];
        $experienceLevels = $filters['experience_levels'] ?? [];
        $locations        = $filters['locations']         ?? [];
        $employmentTypes  = $filters['employment_types']  ?? [];

        $selectedRole = null;

        if ($roleSlug !== null && $roleSlug !== '') {
            foreach ($rolesConfig as $roleId => $role) {
                $slug = $role['slug'] ?? $roleId;

                if ($slug === $roleSlug) {
                    $selectedRole = $role + [
                        'id'   => $roleId,
                        'slug' => $slug,
                    ];

                    // Map keys to human labels for the view
                    $teamKey = $selectedRole['team']            ?? null;
                    $locKey  = $selectedRole['location']        ?? null;
                    $expKey  = $selectedRole['experience']      ?? null;
                    $typeKey = $selectedRole['employment_type'] ?? null;

                    if ($teamKey && isset($teams[$teamKey])) {
                        $selectedRole['team_label'] = $teams[$teamKey];
                    }
                    if ($locKey && isset($locations[$locKey])) {
                        $selectedRole['location_label'] = $locations[$locKey];
                    }
                    if ($expKey && isset($experienceLevels[$expKey])) {
                        $selectedRole['experience_label'] = $experienceLevels[$expKey];
                    }
                    if ($typeKey && isset($employmentTypes[$typeKey])) {
                        $selectedRole['employment_type_label'] = $employmentTypes[$typeKey];
                    }

                    break;
                }
            }
        }

        // SEO defaults
        $pageTitle = 'Apply for a role at QalbIT';
        $pageDesc  = 'Submit your profile, experience and resume to apply for current or future roles at QalbIT.';

        if ($selectedRole) {
            $roleTitle = $selectedRole['title']
                ?? $selectedRole['name']
                ?? ucfirst(str_replace('-', ' ', (string) $roleSlug));

            $pageTitle = 'Apply – ' . $roleTitle . ' | Careers at QalbIT';
            $pageDesc  = 'Apply for the ' . $roleTitle . ' role at QalbIT. '
                . 'Share your experience, projects and resume – we will get back to you if there is a strong fit.';
        }

        $canonical = $baseUrl . '/apply/';
        if ($roleSlug) {
            $canonical .= '?role=' . urlencode($roleSlug);
        }

        $seo = [
            'title'       => $pageTitle,
            'description' => $pageDesc,
            'canonical'   => $canonical,
        ];

        $content = View::render('pages/careers/apply', [
            'seo'          => $seo,
            'selectedRole' => $selectedRole,
            'roleSlug'     => $roleSlug,
            'allRoles'     => $rolesConfig,
        ]);

        return View::render('layouts/main', [
            'seo'     => $seo,
            'content' => $content,
            'pageId'  => 'careers-apply',
        ]);
    }

    /**
     * Careers index – cached with TTL for the canonical /careers/ view.
     * Any filtered views with query params will automatically bypass cache
     * because PageCache::shouldBypass() returns true when $_GET is not empty.
     */
    public function index(): string
    {
        return PageCache::remember(
            self::CACHE_KEY,
            self::CACHE_TTL,
            fn (): string => $this->renderPage()
        );
    }

    /**
     * Apply page – cache ONLY the generic /apply/ page,
     * keep /apply/?role=... dynamic (no HTML cache, because of query params).
     */
    public function apply(): string
    {
        $roleSlug = isset($_GET['role']) ? trim((string) $_GET['role']) : null;

        // No role selected → generic apply page, safe to cache
        if ($roleSlug === null || $roleSlug === '') {
            $cacheKey = self::CACHE_KEY . '_apply';

            return PageCache::remember(
                $cacheKey,
                self::CACHE_TTL,
                fn (): string => $this->renderApplyPage(null)
            );
        }

        // Role-specific apply page – served fresh (cache is bypassed anyway
        // by PageCache::shouldBypass() because of query params).
        return $this->renderApplyPage($roleSlug);
    }
}
