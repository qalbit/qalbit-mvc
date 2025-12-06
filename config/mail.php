<?php

return [
    // SMTP host: e.g. for Gmail Workspace / Zoho / your provider
    'host'       => env('SMTP_HOST', ''),

    // 587 for TLS, 465 for SSL, etc.
    'port'       => env('SMTP_PORT', 587),

    // SMTP auth (leave empty if your host doesn’t need auth – rare)
    'username'   => env('SMTP_USERNAME', ''),
    'password'   => env('SMTP_PASSWORD', ''),

    // 'tls' or 'ssl'
    'encryption' => env('SMTP_ENCRYPTION', 'tls'),

    // Sender details
    'from_email' => env('APP_CONTACT_FROM_EMAIL', ''),
    'from_name'  => env('APP_CONTACT_FROM_NAME', 'QalbIT'),

    // Where contact form enquiries should arrive
    'to_email'   => env('APP_CONTACT_TO_EMAIL', 'info@qalbit.com'),
];
