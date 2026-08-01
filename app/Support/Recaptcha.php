<?php

namespace App\Support;

class Recaptcha
{
    /*
     * Why this sits next to verify() instead of replacing it.
     *
     * verify() answers one question — "may this through?" — and answers it
     * closed: no token is indistinguishable from a rejected token, so a
     * visitor whose corporate proxy blocks google.com is treated as a bot.
     * That is the right trade for the contact form, which is JS-only anyway.
     *
     * The campaign landing page is not that. It renders and submits with
     * JavaScript switched off, it is the destination of paid clicks, and a
     * lead silently dropped there costs real money. It needs to tell the
     * difference between "Google checked this and said no" and "there was
     * nothing to check", and it needs the score for the CRM record.
     *
     * So assess() reports what happened and takes no view on what to do about
     * it. The caller owns the policy.
     *
     * Outcomes:
     *   disabled       reCAPTCHA is switched off in config
     *   misconfigured  enabled, but no secret key is set
     *   skipped        no token was submitted (no-JS, or api.js never loaded)
     *   unreachable    siteverify could not be called or returned nonsense
     *   rejected       Google says the token is invalid or expired
     *   action_mismatch  a valid token, but minted for a different form
     *   low_score      valid token, score below the configured floor
     *   passed         valid token, right action, score at or above the floor
     *
     * @return array{outcome: string, score: float|null}
     */
    public static function assess(?string $token, string $action): array
    {
        $config = config('recaptcha', []);

        if (empty($config['enabled'])) {
            return ['outcome' => 'disabled', 'score' => null];
        }

        $secret = $config['secret_key'] ?? '';
        if (!$secret) {
            return ['outcome' => 'misconfigured', 'score' => null];
        }

        if (!$token) {
            return ['outcome' => 'skipped', 'score' => null];
        }

        $response = self::siteverify($secret, $token);

        if (!is_array($response)) {
            return ['outcome' => 'unreachable', 'score' => null];
        }

        if (empty($response['success'])) {
            return ['outcome' => 'rejected', 'score' => null];
        }

        $score = isset($response['score']) ? (float) $response['score'] : null;

        /*
         * v3 returns the action the token was minted for. Checking it is what
         * stops a token harvested from the contact form being replayed here —
         * without it, any valid token from anywhere on the domain would do.
         * verify() skips this check; every caller of assess() passes an action
         * it actually mints, so it can be enforced.
         */
        $returnedAction = $response['action'] ?? null;
        if (is_string($returnedAction) && $returnedAction !== '' && $returnedAction !== $action) {
            return ['outcome' => 'action_mismatch', 'score' => $score];
        }

        $minScore = (float) ($config['min_score'] ?? 0.5);

        if ($score !== null && $score < $minScore) {
            return ['outcome' => 'low_score', 'score' => $score];
        }

        return ['outcome' => 'passed', 'score' => $score];
    }

    /**
     * @return array<string, mixed>|null  null when the endpoint could not be reached
     */
    private static function siteverify(string $secret, string $token): ?array
    {
        $context = stream_context_create([
            'http' => [
                'method'        => 'POST',
                'header'        => "Content-type: application/x-www-form-urlencoded\r\n",
                'content'       => http_build_query([
                    'secret'   => $secret,
                    'response' => $token,
                    'remoteip' => $_SERVER['REMOTE_ADDR'] ?? null,
                ]),
                'timeout'       => 5,
                // A non-2xx still carries a JSON body worth reading.
                'ignore_errors' => true,
            ],
        ]);

        $raw = @file_get_contents('https://www.google.com/recaptcha/api/siteverify', false, $context);

        if ($raw === false) {
            return null;
        }

        $data = json_decode($raw, true);

        return is_array($data) ? $data : null;
    }

    public static function verify(?string $token, string $action = 'contact'): bool
    {
        $config = config('recaptcha', []);

        if (empty($config['enabled'])) {
            return true; // disabled
        }

        $secret = $config['secret_key'] ?? '';
        if (!$secret || !$token) {
            return false;
        }

        $endpoint = 'https://www.google.com/recaptcha/api/siteverify';

        $postData = http_build_query([
            'secret'   => $secret,
            'response' => $token,
            'remoteip' => $_SERVER['REMOTE_ADDR'] ?? null,
        ]);

        $context = stream_context_create([
            'http' => [
                'method'  => 'POST',
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'content' => $postData,
                'timeout' => 5,
            ],
        ]);

        $result = @file_get_contents($endpoint, false, $context);
        if ($result === false) {
            return false;
        }

        $data = json_decode($result, true);
        if (!is_array($data) || empty($data['success'])) {
            return false;
        }

        // reCAPTCHA v3 score check
        $score    = $data['score']    ?? 0;
        $minScore = (float)($config['min_score'] ?? 0.5);

        return $score >= $minScore;
    }
}
