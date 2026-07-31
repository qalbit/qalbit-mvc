<?php

// LiftUp CRM (crm.qalbit.com) — server-to-server lead capture.
// The API key authenticates the whole product; each form token routes the
// lead into the right embed form inside the CRM.
return [
    'enabled'  => env('LIFTUP_ENABLED', true),
    'base_url' => rtrim(env('LIFTUP_API_URL', 'https://crm.qalbit.com/api/v1'), '/'),
    'api_key'  => env('LIFTUP_API_KEY', ''),
    'timeout'  => (int) (env('LIFTUP_TIMEOUT') ?: 8),

    'forms' => [
        'contact'    => env('LIFTUP_FORM_CONTACT_ID', ''),
        'hire'       => env('LIFTUP_FORM_HIRE_ID', ''),
        'calculator' => env('LIFTUP_FORM_CALCULATOR_ID', ''),
        'exit_popup' => env('LIFTUP_FORM_EXIT_ID', ''),
        'career'     => env('LIFTUP_FORM_CAREER_ID', ''),
        // Campaign landing page /go/saas-product-development/. Until this is
        // set, LiftUpCrm::pushLead() falls back to the contact form rather
        // than dropping the lead — so leads are never lost, they are just
        // filed in the wrong place until the token is configured.
        'saas_teardown' => env('LIFTUP_FORM_SAAS_TEARDOWN_ID', ''),
    ],
];
