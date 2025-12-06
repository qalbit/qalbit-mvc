<?php

return [
    // SMTP host: e.g. for Gmail Workspace / Zoho / your provider
    'host'       => 'smtp.your-provider.com',

    // 587 for TLS, 465 for SSL, etc.
    'port'       => 587,

    // SMTP auth (leave empty if your host doesn’t need auth – rare)
    'username'   => 'your-smtp-username',
    'password'   => 'your-smtp-password',

    // 'tls' or 'ssl'
    'encryption' => 'tls',

    // Sender details
    'from_email' => 'no-reply@qalbit.com',
    'from_name'  => 'QalbIT',

    // Where contact form enquiries should arrive
    'to_email'   => 'info@qalbit.com',
];
