<?php

/*
 * Campaign landing pages under /go/.
 *
 * Only the parts that must not drift live here: the form's option sets (the
 * view renders them, the controller validates against them, and a mismatch
 * would silently reject real leads), the outbound links, and the placeholders
 * the client still owes. Section copy stays in the view, where it is readable
 * next to the markup it belongs to.
 */

return [

    'saas_teardown' => [

        'path' => '/go/saas-product-development/',

        // CRM form token key — resolved through config('crm.forms').
        'crm_form_key' => 'saas_teardown',

        // Tagged on every lead so CRM reporting can separate campaign traffic
        // from the site's own contact form.
        'lead_from'  => 'lead_go_saas_teardown',
        'lead_topic' => 'saas_teardown',

        // Step 1 — value => label. Order is the render order.
        'stages' => [
            'idea'    => 'Just an idea',
            'spec'    => 'Spec, nothing built',
            'built'   => 'Built, not launched',
            'stalled' => 'Live but stalled',
            'growing' => 'Live and growing',
        ],

        // Step 3
        'budgets' => [
            'under-15k' => 'Under $15k',
            '15-30k'    => '$15–30k',
            '30-60k'    => '$30–60k',
            '60k-plus'  => '$60k+',
        ],

        'timelines' => [
            'asap'         => 'ASAP',
            '1-3-months'   => '1–3 months',
            '3-6-months'   => '3–6 months',
        ],

        // Free-mail domains get a soft hint in the form, never a block — a
        // founder on a personal address is still a lead.
        'free_mail_domains' => [
            'gmail.com', 'yahoo.com', 'yahoo.co.uk', 'outlook.com',
            'hotmail.com', 'live.com', 'icloud.com', 'aol.com', 'proton.me',
            'protonmail.com', 'gmx.com', 'mail.com', 'yandex.com',
        ],

        // Where the teardown itself is sent from — stated in the success state
        // so it clears spam filters in the reader's head before it has to
        // clear them in their inbox.
        'sender_email' => 'abid@qalbit.com',

        'reply_email' => 'sales@qalbit.com',

        // PLACEHOLDER: confirm this booking link is still current before the
        // first campaign goes live.
        'booking_url' => 'https://crm.qalbit.com/book/discuss-project',

        // PLACEHOLDER: client to supply the "See how we price →" destination.
        // Left as '#' until then; the link renders but goes nowhere on purpose
        // rather than pointing somewhere wrong.
        'pricing_url' => '#',

        // PLACEHOLDER: founder photo → /public/assets/images/team/abid-chidi.jpg
        'founder_photo' => '/images/team/abid-chidi.jpg',

        // PLACEHOLDER: QalbIT wordmark → /public/assets/images/brand/qalbit-logo.svg
        'logo' => '/images/brand/qalbit-logo.svg',

        /*
         * Case-study outcome metrics.
         *
         * These are intentionally null. The page renders a visible, dashed
         * "client to supply" box wherever a metric is missing, so an unfilled
         * number can never be mistaken for a real one. Fill `value` and
         * `label` and the box becomes a real metric with no other change.
         */
        'case_studies' => [
            [
                'name'    => 'Hellory',
                'summary' => 'Tennis club management SaaS — a Laravel booking platform that replaced spreadsheets and manual coordination.',
                'stack'   => 'Laravel',
                'metric'  => [
                    'value' => null, // e.g. '-80%'
                    'label' => null, // e.g. 'admin time'
                ],
            ],
            [
                'name'    => 'Cybersecurity B2B SaaS review platform',
                'summary' => 'A B2B software review platform.',
                'stack'   => 'Next.js · Node.js · Python',
                'metric'  => [
                    'value' => null,
                    'label' => null,
                ],
            ],
        ],
    ],
];
