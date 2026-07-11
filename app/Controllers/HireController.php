<?php

namespace App\Controllers;

use App\Support\Faqs;
use App\Support\PageCache;
use App\Support\Schema;
use App\Support\View;

class HireController
{
    private const CACHE_TTL           = 900; // 15 minutes
    private const CACHE_KEY_INDEX     = 'page_hire_index';
    private const CACHE_KEY_PREFIX    = 'page_hire_role_';

    /**
     * Core renderer for the Hire index page: /hire-developers/
     * Used by HTTP entry point and can be used by cron/CLI.
     */
    private function renderIndexPage(): string
    {
        $baseUrl = rtrim(config('app.url', 'https://qalbit.com'), '/');

        $allRoles = config('hire', []);

        $enabledRoles = array_filter($allRoles, static function (array $role): bool {
            return !empty($role['enabled']);
        });

        usort($enabledRoles, static function (array $a, array $b): int {
            $orderA = $a['order'] ?? 999;
            $orderB = $b['order'] ?? 999;
            return $orderA <=> $orderB;
        });

        $seo = [
            'title'       => 'Hire Dedicated Developers in India – Laravel & Node | QalbIT',
            'description' => 'Hire dedicated Laravel, Node.js, Next.js, React and Flutter developers in India – onboard in 1–2 weeks, flexible monthly engagement, US/UK/GCC overlap.',
            'canonical'   => $baseUrl . '/hire-developers/',
            'image'       => og_image_url('/hire-developers/'),
        ];

        // FAQs for the hub page (rich results + on-page section)
        $faqs = Faqs::for('service_hire_developers');

        // Global schemas for the index page
        $orgSchema         = Schema::organization();
        $websiteSchema     = Schema::website();
        $breadcrumbsSchema = Schema::breadcrumbs([
            ['name' => 'Home',            'url' => '/'],
            ['name' => 'Hire Developers', 'url' => '/hire-developers/'],
        ]);
        $faqSchema = !empty($faqs)
            ? Schema::faq($faqs, $seo['canonical'], $seo['title'])
            : null;

        // Structured list of hire profiles – the most-extracted format in AI answers
        $itemListSchema = Schema::itemList(
            'Dedicated Developer Profiles at QalbIT',
            array_map(static function (array $role): array {
                return [
                    'name' => $role['name'] ?? '',
                    'url'  => $role['slug'] ?? '',
                ];
            }, $enabledRoles)
        );

        $jsonLd = array_values(array_filter([
            $orgSchema,
            $websiteSchema,
            $breadcrumbsSchema,
            $itemListSchema,
            $faqSchema,
        ]));

        $content = View::render('pages/hire/index', [
            'seo'   => $seo,
            'roles' => $enabledRoles,
            'faqs'  => $faqs,
        ]);

        return View::render('layouts/main', [
            'seo'     => $seo,
            'content' => $content,
            'jsonLd'  => $jsonLd,
            'pageId'  => 'hire-index',
        ]);
    }

    /**
     * HTTP entry: /hire-developers/
     * Cached with TTL.
     */
    public function index(): string
    {
        return PageCache::remember(
            self::CACHE_KEY_INDEX,
            self::CACHE_TTL,
            fn (): string => $this->renderIndexPage()
        );
    }

    /**
     * Dedicated routes – each cached as its own "Hire X" page.
     */

    // /hire-nodejs-developers/
    public function nodejs(): string
    {
        return $this->cachedRolePage('nodejs');
    }

    // /hire-laravel-developers/
    public function laravel(): string
    {
        return $this->cachedRolePage('laravel');
    }

    // /hire-php-developers/
    public function php(): string
    {
        return $this->cachedRolePage('php');
    }

    // /hire-reactjs-developers/
    public function reactjs(): string
    {
        return $this->cachedRolePage('reactjs');
    }

    // /hire-nextjs-developers/
    public function nextjs(): string
    {
        return $this->cachedRolePage('nextjs');
    }

    // /hire-flutter-developers/
    public function flutter(): string
    {
        return $this->cachedRolePage('flutter');
    }

    // /hire-mvp-developers/
    public function mvp(): string
    {
        return $this->cachedRolePage('mvp');
    }

    // /hire-fullstack-developers/
    public function fullstack(): string
    {
        return $this->cachedRolePage('full-stack-javascript');
    }

    /**
     * Shared helper to wrap a role page in PageCache::remember().
     */
    private function cachedRolePage(string $roleKey): string
    {
        $cacheKey = self::CACHE_KEY_PREFIX . $roleKey;

        return PageCache::remember(
            $cacheKey,
            self::CACHE_TTL,
            fn (): string => $this->renderRole($roleKey)
        );
    }

    /**
     * Core renderer for a single "Hire X" page.
     * Used by HTTP (via cachedRolePage) and can be used by cron/CLI.
     */
    protected function renderRole(string $roleKey): string
    {
        $allRoles = config('hire', []);
        $role     = $this->findBySlug($allRoles, $roleKey);

        if (!$role) {
            http_response_code(404);

            $errorController = new ErrorController();
            return $errorController->notFound();
        }

        $baseUrl = rtrim(config('app.url', 'https://qalbit.com'), '/');

        // Derive canonical from configured slug or from URL slug
        $roleSlug       = $role['slug'] ?? ('/hire-' . $roleKey . '-developers/');
        $canonicalPath  = '/' . ltrim($roleSlug, '/');
        $canonicalPath  = rtrim($canonicalPath, '/') . '/';
        $canonical      = $baseUrl . $canonicalPath;

        $seo = [
            'title'       => $role['meta_title']       ?? (($role['name'] ?? 'Hire Developers') . ' – QalbIT'),
            'description' => $role['meta_description'] ?? '',
            'canonical'   => $canonical,
            'image'       => og_image_url($canonicalPath),
        ];

        // Load FAQs for this specific service (if configured)
        $faqKey = $role['faq_key'] ?? null;
        $faqs   = $faqKey ? Faqs::for($faqKey) : [];

        // Global Schemas
        $orgSchema         = Schema::organization();
        $websiteSchema     = Schema::website();
        $breadcrumbsSchema = Schema::breadcrumbs([
            ['name' => 'Home',            'url' => '/'],
            ['name' => 'Hire Developers', 'url' => '/hire-developers/'],
            ['name' => $role['name'] ?? 'Hire Developers', 'url' => $canonicalPath],
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

        $content = View::render('pages/hire/show', [
            'seo'    => $seo,
            'role'   => $role,
            'faqs'   => $faqs,
            'pageId' => 'hire-developer',
        ]);

        return View::render('layouts/main', [
            'seo'     => $seo,
            'content' => $content,
            'jsonLd'  => $jsonLd,
            'pageId'  => 'hire-developer',
        ]);
    }

    /**
     * Find hire config by path segment of its slug.
     *
     * config slug: /hire-nodejs-development/
     * URL:         /hire-nodejs-development/
     * $slug:       "hire-nodejs-development"
     */
    protected function findBySlug(array $services, string $slug): ?array
    {
        $slug = trim($slug, '/');

        foreach ($services as $service) {
            if (empty($service['slug'])) {
                continue;
            }

            $normalized = trim($service['slug'], '/');
            $parts      = explode('/', $normalized);
            $segment    = end($parts);

            if ($segment === $slug) {
                return $service;
            }

            if (preg_match('/^hire-([a-z0-9\-]+)-developers$/i', $segment, $matches)) {
                $techSlug = $matches[1];

                if ($techSlug === $slug) {
                    return $service;
                }
            }
        }

        return null;
    }
}
