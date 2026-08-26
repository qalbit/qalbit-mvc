<?php

namespace App\Controllers;

use App\Support\LiftUpCrm;
use App\Support\Mailer;
use App\Support\Recaptcha;
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
            'need'            => trim((string) ($_POST['need'] ?? '')),
            'email'           => trim((string) ($_POST['email'] ?? '')),
            'product_or_idea' => trim((string) ($_POST['product_or_idea'] ?? '')),
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

        /*
         * reCAPTCHA v3.
         *
         * Deliberately NOT the contact form's fail-closed rule. This page
         * renders and submits with JavaScript off, api.js is a 374 KB script
         * that plenty of corporate networks refuse to serve, and every visitor
         * here arrived on a click somebody paid for. Rejecting a lead because
         * Google was unreachable would throw away that spend on the visitors
         * least able to do anything about it.
         *
         * So only a token that was actually checked and actually failed blocks
         * the submission. Absent, unreachable and misconfigured all pass, and
         * every outcome is recorded on the lead so the CRM can show which ones
         * were verified and what they scored. The honeypot above is what
         * catches the naive bots either way.
         */
        $recaptcha = Recaptcha::assess(
            isset($_POST['recaptcha_token']) ? (string) $_POST['recaptcha_token'] : null,
            'saas_teardown'
        );

        $errors = $this->validate($data, $page);

        if (in_array($recaptcha['outcome'], ['rejected', 'low_score', 'action_mismatch'], true)) {
            $errors['global'] = 'We could not verify that submission. Please try again, or email '
                . ($page['reply_email'] ?? 'sales@qalbit.com') . ' directly.';
        }

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
            'stage' => $page['stages'][$data['stage']] ?? $data['stage'],
            'need'  => $page['needs'][$data['need']] ?? $data['need'],
        ];

        // Readable in any CRM view, whether or not custom fields are mapped.
        $message = implode("\n", [
            'Stage: ' . $labels['stage'],
            'Needs: ' . $labels['need'],
            '',
            'Product / idea:',
            $data['product_or_idea'],
        ]);

        // Built by hand, not array_filter: a score of 0.0 is the single most
        // interesting value here and array_filter would drop it.
        $recaptchaMeta = ['outcome' => $recaptcha['outcome']];
        if ($recaptcha['score'] !== null) {
            $recaptchaMeta['score'] = $recaptcha['score'];
        }

        $metadata = array_filter([
            'stage'        => $data['stage'],
            'need'         => $data['need'],
            'recaptcha'    => $recaptchaMeta,
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

        /*
         * The form no longer asks for a name — the redesign dropped that field
         * to cut the step-3 form to two inputs. The CRM and the notification
         * email both want one, so it is derived from the address rather than
         * invented: "dana.reyes@acme.io" becomes "Dana Reyes". It is clearly a
         * derivation, not a claim about what they are called, and the real
         * address sits next to it in every view.
         */
        $localPart = strstr($data['email'], '@', true) ?: $data['email'];
        $leadName  = ucwords(trim(preg_replace('/[._+-]+/', ' ', $localPart)));
        if ($leadName === '') {
            $leadName = $data['email'];
        }

        // CRM first: it is the system of record, and it has to survive an SMTP
        // outage. The API key stays server-side — the browser only ever talks
        // to this route.
        $crmCaptured = LiftUpCrm::pushLead([
            'name'        => mb_substr($leadName, 0, 200),
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
            'name'         => $leadName,
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
     * Show the Gulf / GCC SaaS landing page.
     *
     * A clone of saasTeardown() above for a Gulf Countries Google Ads campaign,
     * serving /go/gulf-saas-development/. Same layout, same JS, same CRM
     * destination — different copy, price band, and a WhatsApp path.
     *
     * Its own flash keys, so a failed no-JS submit on one campaign page can
     * never surface on the other.
     */
    public function gulfSaas(): string
    {
        $page    = config('landing.gulf_saas', []);
        $baseUrl = rtrim(config('app.url', 'https://qalbit.com'), '/');

        $seo = [
            'title'       => 'SaaS product development for the Gulf — a real build plan in 48 hours | QalbIT',
            'description' => 'A free recorded SaaS teardown for GCC founders and product teams: the architecture, v1 modules, timeline and price range for your product. From a team that runs four of its own SaaS products.',
            'canonical'   => $baseUrl . $page['path'],
            'image'       => og_image_url($page['path']),
        ];

        $errors  = Session::getFlash('gulf_errors', []);
        $old     = Session::getFlash('gulf_old', []);
        $success = Session::getFlash('gulf_success');

        $content = View::render('pages/go/gulf-saas', [
            'page'    => $page,
            'errors'  => $errors,
            'old'     => $old,
            'success' => $success,
        ]);

        return View::render('layouts/landing', [
            'seo'          => $seo,
            'content'      => $content,
            'pageId'       => 'go-gulf-saas',
            'pageCss'      => '/css/go-gulf.css',
            // Shared with the original page on purpose. go-teardown.js carries
            // no page-specific content — it reads every option out of data
            // attributes and posts to form.action — so a second copy would add
            // nothing but a place for the two to drift. It also mints the
            // reCAPTCHA token, and divergent copies of security-relevant code
            // are a liability, not an isolation win.
            'pageJs'       => '/js/go-teardown.js',
            'pageCampaign' => 'gulf_saas',
        ]);
    }

    /**
     * Handle the Gulf page's form (POST).
     *
     * Deliberately a separate method rather than a refactor of
     * saasTeardownSubmit(): that handler serves a live campaign and was left
     * byte-for-byte untouched. The two can be collapsed into one shared private
     * method once this page has run and proved itself.
     *
     * The lead lands in exactly the same CRM form as the original page's — the
     * inherited 'crm_form_key' sees to that. What separates them is
     * lead_from / lead_topic and the campaign recorded in metadata.
     */
    public function gulfSaasSubmit(): void
    {
        $page   = config('landing.gulf_saas', []);
        $isAjax = $this->isAjaxRequest();

        $redirectTo = $page['path'];

        $data = [
            'stage'           => trim((string) ($_POST['stage'] ?? '')),
            'need'            => trim((string) ($_POST['need'] ?? '')),
            'email'           => trim((string) ($_POST['email'] ?? '')),
            'product_or_idea' => trim((string) ($_POST['product_or_idea'] ?? '')),
        ];

        // Honeypot — answer as if it worked. See saasTeardownSubmit().
        if (trim((string) ($_POST['website'] ?? '')) !== '') {
            if ($isAjax) {
                $this->json(['ok' => true]);
            }

            Session::flash('gulf_success', true);
            $this->redirect($redirectTo);
        }

        /*
         * reCAPTCHA action stays 'saas_teardown', not 'gulf_saas'.
         *
         * The expected action here has to match what the browser actually
         * minted, and this page ships the same go-teardown.js, which asks
         * Google for the 'saas_teardown' action. Naming it anything else here
         * would make every verified submission an action_mismatch and block
         * real leads.
         *
         * The cost is that both campaign pages report under one action in the
         * reCAPTCHA console. Separating them means teaching go-teardown.js to
         * read its action from a data attribute — a change to a file the live
         * page also loads, which is not worth making blind.
         */
        $recaptcha = Recaptcha::assess(
            isset($_POST['recaptcha_token']) ? (string) $_POST['recaptcha_token'] : null,
            'saas_teardown'
        );

        $errors = $this->validate($data, $page);

        if (in_array($recaptcha['outcome'], ['rejected', 'low_score', 'action_mismatch'], true)) {
            $errors['global'] = 'We could not verify that submission. Please try again, or email '
                . ($page['reply_email'] ?? 'sales@qalbit.com') . ' directly.';
        }

        if (!empty($errors)) {
            if ($isAjax) {
                $this->json(['ok' => false, 'errors' => $errors], 422);
            }

            Session::flash('gulf_errors', $errors);
            Session::flash('gulf_old', $data);
            $this->redirect($redirectTo);
        }

        $utm      = $this->utm();
        $referrer = $this->referrer();

        $labels = [
            'stage' => $page['stages'][$data['stage']] ?? $data['stage'],
            'need'  => $page['needs'][$data['need']] ?? $data['need'],
        ];

        $message = implode("\n", [
            'Stage: ' . $labels['stage'],
            'Needs: ' . $labels['need'],
            '',
            'Product / idea:',
            $data['product_or_idea'],
        ]);

        $recaptchaMeta = ['outcome' => $recaptcha['outcome']];
        if ($recaptcha['score'] !== null) {
            $recaptchaMeta['score'] = $recaptcha['score'];
        }

        /*
         * Campaign tag.
         *
         * The form posts a hidden 'campaign' field, but the config value is
         * what is trusted when the field is missing or empty — a hidden input
         * is client-controlled, and a lead that arrives without it is still a
         * Gulf lead. Bounded and stripped the same way UTM values are.
         */
        $campaign = '';
        if (isset($_POST['campaign']) && is_string($_POST['campaign'])) {
            $campaign = trim(preg_replace('/[\x00-\x1F\x7F]/u', '', $_POST['campaign']) ?? '');
        }
        if ($campaign === '') {
            $campaign = (string) ($page['campaign'] ?? '');
        }

        $metadata = array_filter([
            'stage'        => $data['stage'],
            'need'         => $data['need'],
            'campaign'     => $campaign === '' ? null : mb_substr($campaign, 0, 100),
            'recaptcha'    => $recaptchaMeta,
            'utm'          => array_filter($utm, static fn ($v) => $v !== null),
            'referrer'     => $referrer,
            'page_path'    => $page['path'],
            'submitted_at' => gmdate('c'),
            'client_ip'    => $_SERVER['REMOTE_ADDR'] ?? null,
            'user_agent'   => mb_substr((string) ($_SERVER['HTTP_USER_AGENT'] ?? ''), 0, 500),
        ], static fn ($v) => $v !== null && $v !== '' && $v !== []);

        // An untagged visitor on this page still came from the Gulf campaign,
        // so the campaign name is a truer fallback here than 'direct'.
        $leadSource = $utm['source'] ?? ($campaign !== '' ? $campaign : 'direct');

        // The form asks for no name; derive one from the address rather than
        // invent one. See saasTeardownSubmit() for the reasoning.
        $localPart = strstr($data['email'], '@', true) ?: $data['email'];
        $leadName  = ucwords(trim(preg_replace('/[._+-]+/', ' ', $localPart)));
        if ($leadName === '') {
            $leadName = $data['email'];
        }

        $crmCaptured = LiftUpCrm::pushLead([
            'name'        => mb_substr($leadName, 0, 200),
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
            'name'         => $leadName,
            'email'        => $data['email'],
            'phone'        => '',
            'message'      => $message,
            'lead_from'    => $page['lead_from'],
            'lead_source'  => $leadSource,
            'lead_topic'   => $page['lead_topic'],
            'lead_country' => '',
        ]);

        if (!$crmCaptured && !$sent) {
            $globalError = 'Something went wrong sending that — please try again, or email '
                . ($page['reply_email'] ?? 'sales@qalbit.com') . '.';

            if ($isAjax) {
                $this->json(['ok' => false, 'errors' => ['global' => $globalError]], 502);
            }

            Session::flash('gulf_errors', ['global' => $globalError]);
            Session::flash('gulf_old', $data);
            $this->redirect($redirectTo);
        }

        if ($isAjax) {
            $this->json(['ok' => true]);
        }

        Session::flash('gulf_success', true);
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

        if ($data['need'] === '') {
            $errors['need'] = 'Pick whichever is closest — you can change it later.';
        } elseif (!array_key_exists($data['need'], $page['needs'] ?? [])) {
            $errors['need'] = 'Please choose one of the listed options.';
        }

        if ($data['email'] === '') {
            $errors['email'] = 'We need an email to send the teardown to.';
        } elseif (mb_strlen($data['email']) > 200) {
            $errors['email'] = 'Email must be 200 characters or fewer.';
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Enter a valid email like you@company.com';
        }

        if ($data['product_or_idea'] === '') {
            $errors['product_or_idea'] = 'Add your product URL, or one line on the idea.';
        } elseif (mb_strlen($data['product_or_idea']) < 4) {
            $errors['product_or_idea'] = 'A few more words, please — even one line is enough.';
        } elseif (mb_strlen($data['product_or_idea']) > 2000) {
            $errors['product_or_idea'] = 'Please keep this under 2000 characters.';
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
