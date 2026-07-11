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

        $formToken = (string) ($config['forms'][$formKey] ?? '');
        if ($formToken !== '') {
            $lead['form'] = $formToken;
        }

        $baseUrl = $config['base_url'] ?? 'https://crm.qalbit.com/api/v1';
        $timeout = (int) ($config['timeout'] ?? 8);

        return self::post($baseUrl . '/leads', $lead, $apiKey, $timeout);
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
