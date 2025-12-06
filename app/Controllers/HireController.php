<?php

namespace App\Controllers;

use App\Support\Faqs;
use App\Support\Schema;
use App\Support\View;

class HireController
{
    /**
     * Hire index page: /hire-developers/
     *
     * Lists all available "Hire X" roles.
     */
    public function index(): string
    {
        $allRoles = config('hire', []);

        $enabledRoles = array_filter($allRoles, function (array $role): bool {
            return !empty($role['enabled']);
        });

        usort($enabledRoles, function (array $a, array $b): int {
            $orderA = $a['order'] ?? 999;
            $orderB = $b['order'] ?? 999;
            return $orderA <=> $orderB;
        });

        $seo = [
            'title'       => 'Hire Dedicated Developers – QalbIT',
            'description' => 'Hire dedicated Node.js and Laravel developers from QalbIT to extend your team and ship reliable web, mobile and SaaS products.',
        ];

        $content = View::render('pages/hire/index', [
            'seo'   => $seo,
            'roles' => $enabledRoles,
        ]);

        return View::render('layouts/main', [
            'seo'     => $seo,
            'content' => $content,
        ]);
    }

    /**
     * Dedicated route: /hire-nodejs-developers/
     */
    public function nodejs(): string
    {
        return $this->renderRole('nodejs');
    }

    /**
     * Dedicated route: /hire-laravel-developers/
     */
    public function laravel(): string
    {
        return $this->renderRole('laravel');
    }
    
    /**
     * Dedicated route: /hire-php-developers/
     */
    public function php(): string
    {
        return $this->renderRole('php');
    }

    /**
     * Dedicated route: /hire-reactjs-developers/
     */
    public function reactjs(): string
    {
        return $this->renderRole('reactjs');
    }

    /**
     * Dedicated route: /hire-nextjs-developers/
     */
    public function nextjs(): string
    {
        return $this->renderRole('nextjs');
    }

    /**
     * Dedicated route: /hire-flutter-developers/
     */
    public function flutter(): string
    {
        return $this->renderRole('flutter');
    }

    /**
     * Dedicated route: /hire-mvp-developers/
     */
    public function mvp(): string
    {
        return $this->renderRole('mvp');
    }

    /**
     * Dedicated route: /hire-fullstack-developers/
     */
    public function fullstack(): string
    {
        return $this->renderRole('full-stack-javascript');
    }

    /**
     * Generic renderer based on role_key from config/hire.php.
     */
    protected function renderRole(string $roleKey): string
    {
        $allRoles = config('hire', []);
        $role = $this->findBySlug($allRoles, $roleKey);

        if (!$role) {
            http_response_code(404);
            return 'Role not found';
        }

        $baseUrl = rtrim(config('app.url', 'https://qalbit.com'), '/');

        // Derive canonical from configured slug or from URL slug
        $roleSlug   = $role['slug'] ?? ('/hire-'. $roleKey .'-developers/');
        $canonicalPath = '/' . ltrim($roleSlug, '/');
        $canonical     = $baseUrl . rtrim($canonicalPath, '/') . '/';

        $seo = [
            'title'       => $role['meta_title']       ?? ($role['name'] . ' – QalbIT'),
            'description' => $role['meta_description'] ?? '',
            'canonical'   => $canonical,
        ];

        // Load FAQs for this specific service (if configured)
        $faqKey = $role['faq_key'] ?? null;
        $faqs   = $faqKey ? Faqs::for($faqKey) : [];

        // Global Schemas
        $orgSchema     = Schema::organization();
        $websiteSchema = Schema::website();
        $breadcrumbsSchema = Schema::breadcrumbs([
            ['name' => 'Home',     'url' => '/'],
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
            'seo'     => $seo,
            'role'    => $role,
            'faqs'    => $faqs,
            'pageId'  => 'hire-developer',
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
