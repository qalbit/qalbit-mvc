<?php

namespace App\Controllers;

/**
 * Read-only health endpoint polled by the LiftUp CRM product sync
 * (Cockpit → Products → Sync health URL). Returns HTTP 200 + JSON;
 * the CRM reads `status` and `server_environment` from the body.
 */
class HealthController
{
    public function show(): string
    {
        header('Content-Type: application/json; charset=UTF-8');
        header('Cache-Control: no-store, no-cache, must-revalidate');
        http_response_code(200);

        return (string) json_encode([
            'status'             => 'ok',
            'service'            => 'qalbit.com',
            'server_environment' => config('app.env', 'production'),
            'time'               => date('c'),
        ], JSON_UNESCAPED_SLASHES);
    }
}
