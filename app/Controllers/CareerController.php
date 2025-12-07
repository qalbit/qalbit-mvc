<?php

namespace App\Controllers;

use App\Support\Faqs;
use App\Support\File;
use App\Support\Mailer;
use App\Support\PageCache;
use App\Support\Recaptcha;
use App\Support\Schema;
use App\Support\Session;
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

        $slug = $page['slug'] ?? '/career/';

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
     */
    private function renderApplyPage(
        ?string $roleSlug = null,
        array $errors = [],
        array $old = [],
        ?string $success = null
    ): string {
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

        $canonical = $baseUrl . '/career/apply/';
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

            'errors'       => $errors,
            'old'          => $old,
            'success'      => $success,
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

        // Flash data from previous POST
        $errors  = Session::getFlash('apply_errors', []);
        $old     = Session::getFlash('apply_old', []);
        $success = Session::getFlash('apply_success');

        $hasFlash = !empty($errors) || !empty($old) || !empty($success);

        // Generic apply page (/career/apply/) – cache if no flash
        if ($roleSlug === null || $roleSlug === '') {
            $cacheKey = self::CACHE_KEY . '_apply';

            if ($hasFlash) {
                return $this->renderApplyPage(null, $errors, $old, $success);
            }

            return PageCache::remember(
                $cacheKey,
                self::CACHE_TTL,
                fn (): string => $this->renderApplyPage(null)
            );
        }

        // Role-specific apply page – always fresh due to query params
        if ($hasFlash) {
            return $this->renderApplyPage($roleSlug, $errors, $old, $success);
        }

        return $this->renderApplyPage($roleSlug);
    }

    /**
     * Build redirect URL for apply page (keeps selected role).
     */
    private function buildApplyRedirectUrl(?string $roleSlug): string
    {
        $url = '/career/apply/';
        if ($roleSlug !== null && $roleSlug !== '') {
            $url .= '?role=' . urlencode($roleSlug);
        }
        return $url;
    }

    /**
     * Handle Apply form submission – POST /career/apply/
     */
    public function submit(): void
    {
        $roleSlug = isset($_POST['role_slug']) ? trim((string) $_POST['role_slug']) : null;

        $fullName = trim($_POST['full_name'] ?? '');

        $data = [
            'role_slug'     => $roleSlug,
            'full_name'     => $fullName,
            'name'          => $fullName, // for Mailer
            'email'         => trim($_POST['email']         ?? ''),
            'phone'         => trim($_POST['phone']         ?? ''),
            'location'      => trim($_POST['location']      ?? ''),
            'experience'    => trim($_POST['experience']    ?? ''),
            'current_role'  => trim($_POST['current_role']  ?? ''),
            'notice_period' => trim($_POST['notice_period'] ?? ''),
            'linkedin'      => trim($_POST['linkedin']      ?? ''),
            'github'        => trim($_POST['github']        ?? ''),
            'current_ctc'   => trim($_POST['current_ctc']   ?? ''),
            'expected_ctc'  => trim($_POST['expected_ctc']  ?? ''),
            'about'         => trim($_POST['about']         ?? ''),
        ];

        $redirectTo = $_POST['redirect_to'] ?? $this->buildApplyRedirectUrl($roleSlug);

        $errors = [];

        // --- Validation ---

        if ($data['full_name'] === '') {
            $errors['full_name'] = 'Please enter your full name.';
        } elseif (mb_strlen($data['full_name']) < 2) {
            $errors['full_name'] = 'Name must be at least 2 characters.';
        }

        if ($data['email'] === '') {
            $errors['email'] = 'Please enter your email address.';
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Please enter a valid email address.';
        }

        if ($data['phone'] === '') {
            $errors['phone'] = 'Please enter your phone or WhatsApp number.';
        }

        if ($data['location'] === '') {
            $errors['location'] = 'Please enter your current city and country.';
        }

        if ($data['experience'] === '') {
            $errors['experience'] = 'Please enter your total experience in years.';
        } elseif (!is_numeric($data['experience']) || (float) $data['experience'] < 0) {
            $errors['experience'] = 'Total experience must be a positive number.';
        }

        if ($data['about'] === '') {
            $errors['about'] = 'Please tell us why you want to work at QalbIT.';
        } elseif (mb_strlen($data['about']) < 30) {
            $errors['about'] = 'Please write at least a few sentences about your motivation and background.';
        }

        if ($data['linkedin'] !== '' && !filter_var($data['linkedin'], FILTER_VALIDATE_URL)) {
            $errors['linkedin'] = 'Please enter a valid LinkedIn/portfolio URL or leave this field blank.';
        }

        if ($data['github'] !== '' && !filter_var($data['github'], FILTER_VALIDATE_URL)) {
            $errors['github'] = 'Please enter a valid GitHub/code samples URL or leave this field blank.';
        }

        // Basic resume presence check – detailed handling is in File helper
        if (!isset($_FILES['resume']) || ($_FILES['resume']['error'] ?? UPLOAD_ERR_NO_FILE) === UPLOAD_ERR_NO_FILE) {
            $errors['resume'] = 'Please upload your resume (PDF, DOC, or DOCX).';
        }

        // reCAPTCHA
        $token = $_POST['recaptcha_token'] ?? null;
        if (!Recaptcha::verify($token, 'careers_apply')) {
            $errors['global'] = 'We could not verify that you are a human. Please try again.';
        }

        if (!empty($errors)) {
            Session::flash('apply_errors', $errors);
            Session::flash('apply_old', $data);
            header('Location: ' . $redirectTo);
            exit;
        }

        // --- Store resume via File helper ---

        $resumePath = File::storeCandidateResume(
            $_FILES['resume'],
            $roleSlug,
            $data['full_name'],
            $data['experience'],
            $errors,
            'resume'
        );

        if ($resumePath === null) {
            Session::flash('apply_errors', $errors);
            Session::flash('apply_old', $data);
            header('Location: ' . $redirectTo);
            exit;
        }

        $data['file_path']      = $resumePath;
        $data['resume_file_name'] = $_FILES['resume']['name'] ?? '';

        // --- Send email ---

        $mailer = new Mailer();
        $data['mail_subject'] = 'New career application from ' . ($data['full_name'] ?: 'Candidate');

        $sent = $mailer->sendCareerApplication($data);

        if (!$sent) {
            $errors['global'] = 'We could not submit your application right now. Please try again later or email us directly at '
                . config('app.contact_email', 'info@qalbit.com') . '.';

            Session::flash('apply_errors', $errors);
            Session::flash('apply_old', $data);
            header('Location: ' . $redirectTo);
            exit;
        }

        Session::flash(
            'apply_success',
            'Thank you. We have received your application and will reach out if there is a strong match with current or upcoming roles.'
        );

        header('Location: ' . $redirectTo);
        exit;
    }

}
