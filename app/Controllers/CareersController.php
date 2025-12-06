<?php

namespace App\Controllers;

use App\Support\View;

class CareersController
{
    public function apply(): string
    {
        $baseUrl = rtrim(config('app.url', 'https://qalbit.com'), '/');

        // Read role slug from query string: /apply/?role=laravel-developer
        $roleSlug = isset($_GET['role']) ? trim((string) $_GET['role']) : null;

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
                    $teamKey  = $selectedRole['team']            ?? null;
                    $locKey   = $selectedRole['location']        ?? null;
                    $expKey   = $selectedRole['experience']      ?? null;
                    $typeKey  = $selectedRole['employment_type'] ?? null;

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
                ?? ucfirst(str_replace('-', ' ', $roleSlug));

            $pageTitle = 'Apply – ' . $roleTitle . ' | Careers at QalbIT';
            $pageDesc  = 'Apply for the ' . $roleTitle . ' role at QalbIT. Share your experience, projects and resume – we will get back to you if there is a strong fit.';
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
}
