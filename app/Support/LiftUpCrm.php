<?php

namespace App\Support;

class LiftUpCrm
{
    /**
     * Push a contact-type lead to LiftUp CRM.
     *
     * Never throws — the CRM being unreachable must not break the visitor's
     * submission flow. Returns true only when the CRM accepted the lead.
     *
     * @param array  $lead    Payload matching the CRM's POST /leads contract
     *                        (name, email, phone, message, lead_* fields,
     *                        source_page, metadata).
     * @param string $formKey Key into config('crm.forms') — routes the lead
     *                        into the right embed form in the CRM.
     */
    public static function pushLead(array $lead, string $formKey = 'contact'): bool
    {
        $config = config('crm', []);
        $apiKey = (string) ($config['api_key'] ?? '');

        if (empty($config['enabled']) || $apiKey === '') {
            return false;
        }

        // Fall back to the default contact form when the requested form's
        // token is not configured yet — the lead must never go form-less.
        $formToken = (string) ($config['forms'][$formKey] ?? '');
        if ($formToken === '') {
            $formToken = (string) ($config['forms']['contact'] ?? '');
        }
        if ($formToken !== '') {
            $lead['form'] = $formToken;
        }

        $baseUrl = $config['base_url'] ?? 'https://crm.qalbit.com/api/v1';
        $timeout = (int) ($config['timeout'] ?? 8);

        return self::post($baseUrl . '/leads', $lead, $apiKey, $timeout);
    }

    /**
     * Push a career application (multipart, with optional résumé file) to
     * LiftUp CRM's career endpoint. Same guarantees as pushLead(): never
     * throws, true only when the CRM accepted it.
     *
     * @param array       $lead       Career payload (full_name, email, phone,
     *                                about, role_slug, experience, …).
     * @param string|null $resumePath Absolute path of the stored résumé.
     * @param string|null $resumeName Original client file name for the upload.
     */
    public static function pushCareerLead(array $lead, ?string $resumePath = null, ?string $resumeName = null): bool
    {
        $config = config('crm', []);
        $apiKey = (string) ($config['api_key'] ?? '');

        if (empty($config['enabled']) || $apiKey === '') {
            return false;
        }

        if (!function_exists('curl_init')) {
            error_log('[LiftUpCrm] Career lead push skipped: curl extension unavailable.');

            return false;
        }

        $formToken = (string) ($config['forms']['career'] ?? '');
        if ($formToken !== '') {
            $lead['form'] = $formToken;
        }

        if ($resumePath !== null && is_file($resumePath)) {
            $lead['resume'] = new \CURLFile(
                $resumePath,
                self::mimeFromExtension($resumePath),
                $resumeName ?: basename($resumePath)
            );
        }

        $baseUrl = $config['base_url'] ?? 'https://crm.qalbit.com/api/v1';

        $ch = curl_init($baseUrl . '/leads/career');
        curl_setopt_array($ch, [
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => $lead, // array payload → multipart/form-data
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT        => (int) ($config['timeout'] ?? 8),
            CURLOPT_HTTPHEADER     => [
                'Authorization: Bearer ' . $apiKey,
                'Accept: application/json',
            ],
        ]);

        $response = curl_exec($ch);
        $status   = (int) curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
        curl_close($ch);

        if ($response === false || $status < 200 || $status >= 300) {
            error_log(sprintf(
                '[LiftUpCrm] Career lead push failed (HTTP %d): %s',
                $status,
                substr((string) $response, 0, 500)
            ));

            return false;
        }

        // The CRM confirms whether the résumé actually made it — a dropped
        // file (server upload config, storage failure) must not pass silently.
        if (isset($lead['resume'])) {
            $body = json_decode((string) $response, true);
            if (is_array($body) && (($body['resume_stored'] ?? null) !== true)) {
                error_log(sprintf(
                    '[LiftUpCrm] Career lead accepted but resume NOT stored (received=%s stored=%s) lead_id=%s',
                    var_export($body['resume_received'] ?? 'unknown', true),
                    var_export($body['resume_stored'] ?? 'unknown', true),
                    $body['lead_id'] ?? '?'
                ));
            }
        }

        return true;
    }

    private static function mimeFromExtension(string $path): string
    {
        return match (strtolower(pathinfo($path, PATHINFO_EXTENSION))) {
            'pdf'  => 'application/pdf',
            'doc'  => 'application/msword',
            default => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        };
    }

    private static function post(string $url, array $payload, string $apiKey, int $timeout): bool
    {
        $context = stream_context_create([
            'http' => [
                'method'        => 'POST',
                'timeout'       => $timeout,
                'ignore_errors' => true, // read the body on 4xx/5xx so we can log why
                'header'        => implode("\r\n", [
                    'Content-Type: application/json',
                    'Accept: application/json',
                    'Authorization: Bearer ' . $apiKey,
                ]) . "\r\n",
                'content'       => json_encode($payload),
            ],
        ]);

        $response = @file_get_contents($url, false, $context);

        $status = 0;
        foreach ($http_response_header ?? [] as $headerLine) {
            if (preg_match('#^HTTP/\S+\s+(\d{3})#', $headerLine, $m)) {
                $status = (int) $m[1]; // last status line wins (redirects)
            }
        }

        if ($response === false || $status < 200 || $status >= 300) {
            error_log(sprintf(
                '[LiftUpCrm] Lead push failed (HTTP %d): %s',
                $status,
                substr((string) $response, 0, 500)
            ));

            return false;
        }

        return true;
    }
}
