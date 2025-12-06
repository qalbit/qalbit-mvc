<?php

// config/blog_categories.php
//
// Map internal page contexts to WordPress category IDs.
// Replace the numeric IDs with your real WordPress category IDs.

return [

    // Home – generic blog feed (no category filter needed usually)
    'home' => [
        'category_id' => null, // latest from all categories
    ],

    // Industries
    'industry_healthcare' => [
        'category_id' => 12,   // TODO: replace with real WP cat ID for Healthcare
    ],
    'industry_fintech' => [
        'category_id' => 18,   // TODO
    ],
    'industry_ecommerce' => [
        'category_id' => 21,   // TODO
    ],
    'industry_telecom' => [
        'category_id' => 25,   // TODO
    ],
    'industry_saas' => [
        'category_id' => 27,   // TODO
    ],
];
