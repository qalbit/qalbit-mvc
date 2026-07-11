<?php

return [
    'enabled'    => env('RECAPTCHA_ENABLED', true),
    'site_key'   => env('RECAPTCHA_SITE_KEY', ''),
    'secret_key' => env('RECAPTCHA_SECRET_KEY', ''),
    // `RECAPTCHA_MIN_SCORE=` (set but empty) must fall back too, otherwise
    // (float)'' === 0.0 would let every token through.
    'min_score'  => (float) (env('RECAPTCHA_MIN_SCORE') ?: 0.5),
];
