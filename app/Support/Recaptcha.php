<?php

namespace App\Support;

class Recaptcha
{
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
