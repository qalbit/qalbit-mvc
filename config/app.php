<?php

return [
    'name'          => env('APP_NAME', 'QalbIT'),
    
    'env'           => env('APP_ENV', 'local'), // local | staging | production
    'debug'         => env('APP_DEBUG', true),
    
    'url'           => env('APP_URL', 'http://qalbit.test'),
    'timezone'      => env('APP_TIMEZONE', 'Asia/Kolkata'),
    
    'contact_email' => env('APP_CONTACT_FROM_EMAIL', 'info@qalbit.com'),
    'from_email'    => env('APP_CONTACT_FROM_EMAIL', 'info@qalbit.com'),

    // Global indexing toggle
    'indexing' => [
        'enabled' => env('APP_INDEXING_ENABLED', false),
    ],
];
