<?php

namespace App\Controllers;

use App\Support\LiftUpCrm;
use App\Support\Mailer;
use App\Support\Session;
use App\Support\View;

/**
 * Campaign landing pages served under /go/.
 *
 * These are not site pages: they carry no navigation, are never indexed, and
 * are never linked from the site itself. They exist to be the destination of a
 * paid ad, so the only two things that matter are that the page renders fast
 * and that a submitted lead is never lost.
 */
class LandingController
{
    /**
     * Show the SaaS teardown landing page.
     *
     * Not page-cached: the only dynamic content is the flash from a failed
     * no-JS submit, and the render is a handful of includes with no upstream
     * calls. A clean GET sets no session cookie, so the edge can cache it.
     */
    public function saasTeardown(): string
    {
        $page    = config('landing.saas_teardown', []);
        $baseUrl = rtrim(config('app.url', 'https://qalbit.com'), '/');

        $seo = [
            'title'       => 'Get a real build plan for your SaaS — in 48 hours | QalbIT',
            'description' => 'A free recorded SaaS teardown: the architecture, v1 modules, timeline and price range for your product. From a team that runs four of its own SaaS products.',
            'canonical'   => $baseUrl . $page['path'],
            'image'       => og_image_url($page['path']),
        ];

        // Flash from a no-JS submit — consumed exactly once.
        $errors  = Session::getFlash('teardown_errors', []);
        $old     = Session::getFlash('teardown_old', []);
        $success = Session::getFlash('teardown_success');

        $content = View::render('pages/go/saas-teardown', [
            'page'    => $page,
            'errors'  => $errors,
            'old'     => $old,
            'success' => $success,
        ]);

        return View::render('layouts/landing', [
            'seo'     => $seo,
            'content' => $content,
            'pageId'  => 'go-saas-teardown',
            'pageCss' => '/css/go-teardown.css',
            'pageJs'  => '/js/go-teardown.js',
        ]);
    }

    /**
     * Handle the teardown form (POST).
     *
     * Answers JSON to the page's fetch() and a redirect + flash to a no-JS
     * submit, so the same handler serves both paths.
     */
    public function saasTeardownSubmit(): void
    {
        $page   = config('landing.saas_teardown', []);
        $isAjax = $this->isAjaxRequest();

        $redirectTo = $page['path'];

        $data = [
            'stage'           => trim((string) ($_POST['stage'] ?? '')),
            'name'            => trim((string) ($_POST['name'] ?? '')),
            'email'           => trim((string) ($_POST['email'] ?? '')),
            'product_or_idea' => trim((string) ($_POST['product_or_idea'] ?? '')),
            'budget'          => trim((string) ($_POST['budget'] ?? '')),
            'timeline'        => trim((string) ($_POST['timeline'] ?? '')),
        ];

        /*
         * Honeypot. A person never sees this field, so a value in it means a
         * bot. Answer as if it worked: telling a bot it was filtered just
         * teaches whoever runs it to stop filling the field.
         */
        if (trim((string) ($_POST['website'] ?? '')) !== '') {
            if ($isAjax) {
                $this->json(['ok' => true]);
            }

            Session::flash('teardown_success', true);
            $this->redirect($redirectTo);
        }

        $errors = $this->validate($data, $page);

        if (!empty($errors)) {
            if ($isAjax) {
                $this->json(['ok' => false, 'errors' => $errors], 422);
            }

            Session::flash('teardown_errors', $errors);
            Session::flash('teardown_old', $data);
            $this->redirect($redirectTo);
        }

        $utm      = $this->utm();
        $referrer = $this->referrer();

        $labels = [
            'stage'    => $page['stages'][$data['stage']] ?? $data['stage'],
            'budget'   => $page['budgets'][$data['budget']] ?? $data['budget'],
            'timeline' => $page['timelines'][$data['timeline']] ?? $data['timeline'],
        ];

        // Readable in any CRM view, whether or not custom fields are mapped.
        $message = implode("\n", [
            'Stage: ' . $labels['stage'],
            'Budget: ' . $labels['budget'],
            'Timeline: ' . $labels['timeline'],
            '',
            'Product / idea:',
            $data['product_or_idea'],
        ]);

        $metadata = array_filter([
            'stage'        => $data['stage'],
            'budget'       => $data['budget'],
            'timeline'     => $data['timeline'],
            'utm'          => array_filter($utm, static fn ($v) => $v !== null),
            'referrer'     => $referrer,
            'page_path'    => $page['path'],
            'submitted_at' => gmdate('c'),
            'client_ip'    => $_SERVER['REMOTE_ADDR'] ?? null,
            'user_agent'   => mb_substr((string) ($_SERVER['HTTP_USER_AGENT'] ?? ''), 0, 500),
        ], static fn ($v) => $v !== null && $v !== '' && $v !== []);

        // No UTM source means the visitor arrived without campaign tagging, not
        // that the campaign is unknown — record that plainly.
        $leadSource = $utm['source'] ?? 'direct';

        // CRM first: it is the system of record, and it has to survive an SMTP
        // outage. The API key stays server-side — the browser only ever talks
        // to this route.
        $crmCaptured = LiftUpCrm::pushLead([
            'name'        => mb_substr($data['name'], 0, 200),
            'email'       => mb_substr($data['email'], 0, 200),
            'message'     => mb_substr($message, 0, 5000),
            'lead_from'   => $page['lead_from'],
            'lead_source' => mb_substr($leadSource, 0, 200),
            'lead_topic'  => $page['lead_topic'],
            'source_page' => mb_substr(rtrim(config('app.url', ''), '/') . $page['path'], 0, 500),
            'metadata'    => $metadata,
        ], $page['crm_form_key']);

        $mailer = new Mailer();
        $sent   = $mailer->sendContact([
            'name'         => $data['name'],
            'email'        => $data['email'],
            'phone'        => '',
            'message'      => $message,
            'lead_from'    => $page['lead_from'],
            'lead_source'  => $leadSource,
            'lead_topic'   => $page['lead_topic'],
            'lead_country' => '',
        ]);

        // The lead is safe if either channel took it. Only both failing is an error.
        if (!$crmCaptured && !$sent) {
            $globalError = 'Something went wrong sending that — please try again, or email '
                . ($page['reply_email'] ?? 'sales@qalbit.com') . '.';

            if ($isAjax) {
                $this->json(['ok' => false, 'errors' => ['global' => $globalError]], 502);
            }

            Session::flash('teardown_errors', ['global' => $globalError]);
            Session::flash('teardown_old', $data);
            $this->redirect($redirectTo);
        }

        if ($isAjax) {
            $this->json(['ok' => true]);
        }

        Session::flash('teardown_success', true);
        $this->redirect($redirectTo);
    }

    /**
     * Server-side validation. Mirrors the client rules and re-checks every one
     * of them — the client copy is a courtesy, this is the gate.
     */
    private function validate(array $data, array $page): array
    {
        $errors = [];

        if ($data['stage'] === '') {
            $errors['stage'] = 'Pick the option that fits best — it only takes one click.';
        } elseif (!array_key_exists($data['stage'], $page['stages'] ?? [])) {
            $errors['stage'] = 'Please choose one of the listed options.';
        }

        if ($data['name'] === '') {
            $errors['name'] = 'Please enter your name.';
        } elseif (mb_strlen($data['name']) < 2) {
            $errors['name'] = 'Please enter your full name — at least 2 characters.';
        } elseif (mb_strlen($data['name']) > 100) {
            $errors['name'] = 'Name must be 100 characters or fewer.';
        } elseif (!preg_match('/\p{L}/u', $data['name'])) {
            $errors['name'] = 'Please enter a valid name.';
        }

        if ($data['email'] === '') {
            $errors['email'] = 'Please enter your email address.';
        } elseif (mb_strlen($data['email']) > 200) {
            $errors['email'] = 'Email must be 200 characters or fewer.';
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Enter a valid work email like you@company.com';
        }

        if ($data['product_or_idea'] === '') {
            $errors['product_or_idea'] = 'Add your product URL, or one line on the idea.';
        } elseif (mb_strlen($data['product_or_idea']) < 4) {
            $errors['product_or_idea'] = 'A few more words, please — even one line is enough.';
        } elseif (mb_strlen($data['product_or_idea']) > 2000) {
            $errors['product_or_idea'] = 'Please keep this under 2000 characters.';
        }

        if ($data['budget'] === '') {
            $errors['budget'] = 'Pick the band closest to your budget.';
        } elseif (!array_key_exists($data['budget'], $page['budgets'] ?? [])) {
            $errors['budget'] = 'Please choose one of the listed budget bands.';
        }

        if ($data['timeline'] === '') {
            $errors['timeline'] = 'Let us know roughly when you want to start.';
        } elseif (!array_key_exists($data['timeline'], $page['timelines'] ?? [])) {
            $errors['timeline'] = 'Please choose one of the listed timelines.';
        }

        return $errors;
    }

    /**
     * UTM parameters as submitted by the page's hidden inputs.
     *
     * Bounded and stripped of control characters before they are stored or
     * emailed. An absent parameter stays null rather than being guessed.
     */
    private function utm(): array
    {
        $keys = ['source', 'medium', 'campaign', 'content', 'term'];
        $utm  = [];

        foreach ($keys as $key) {
            $raw = $_POST['utm_' . $key] ?? null;

            if (!is_string($raw)) {
                $utm[$key] = null;
                continue;
            }

            $clean = trim(preg_replace('/[\x00-\x1F\x7F]/u', '', $raw) ?? '');
            $utm[$key] = $clean === '' ? null : mb_substr($clean, 0, 200);
        }

        return $utm;
    }

    private function referrer(): ?string
    {
        $raw = $_POST['referrer'] ?? null;

        if (!is_string($raw)) {
            return null;
        }

        $raw = trim($raw);

        if ($raw === '' || !preg_match('#^https?://#i', $raw)) {
            return null;
        }

        return mb_substr($raw, 0, 500);
    }

    private function isAjaxRequest(): bool
    {
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH'])
            && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
            return true;
        }

        $accept = strtolower((string) ($_SERVER['HTTP_ACCEPT'] ?? ''));

        return str_contains($accept, 'application/json');
    }

    /**
     * @return never
     */
    private function json(array $payload, int $status = 200): void
    {
        http_response_code($status);
        header('Content-Type: application/json; charset=utf-8');
        // Never cache a lead response, at the browser or the edge.
        header('Cache-Control: no-store');
        echo json_encode($payload);
        exit;
    }

    /**
     * @return never
     */
    private function redirect(string $to): void
    {
        header('Location: ' . $to);
        exit;
    }
}
