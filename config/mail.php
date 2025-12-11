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

    // Where general form enquiries should arrive
    'to_email'   => env('APP_CONTACT_TO_EMAIL', 'info@qalbit.com'),

    // Where career form enquiries should arrive
    'to_career' => env('CAREER_CONTACT_TO_EMAIL', 'hr@qalbit.com'),

    // Where lead from enquiries should arrive
    'to_sales'  => env('LEAD_CONTACT_TO_EMAIL', 'sales@qalbit.com'),
];
