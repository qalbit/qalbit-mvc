<?php

return [

    'legal_name'    => 'QalbIT Infotech Pvt Ltd',
    'short_name'    => 'QalbIT',
    'website'       => 'https://qalbit.com',
    'primary_email' => 'info@qalbit.com',
    'primary_phone' => '+91-9033870071',

    // Brand assets for JSON-LD (adjust logo path if needed)
    'logo_url' => 'https://qalbit.com/assets/images/brand/qalbit-logo-dark.png',

    // Address for main Organization schema
    'schema_address' => [
        'streetAddress'   => 'C109, Siddhi Vinayak Towers, Near Kataria Arcade, Opp. S.G. Highway, Makarba',
        'addressLocality' => 'Ahmedabad',
        'addressRegion'   => 'Gujarat',
        'postalCode'      => '380051',
        'addressCountry'  => 'IN',
    ],

    // Social profiles for Organization.sameAs
    'social_profiles' => [
        'linkedin' => 'https://www.linkedin.com/company/qalbit/',
        'x'        => 'https://x.com/qalb_it',
        'facebook' => 'https://www.facebook.com/qalbitinfotech',
        'instagram'=> 'https://www.instagram.com/qalbitinfotech',
        'github'   => 'https://github.com/qalbit',
    ],

    // Primary locations / offices that we want to show on Contact page
    'locations' => [

        'ahmedabad_hq' => [
            'id'        => 'ahmedabad_hq',
            'label'     => 'India – Ahmedabad (Head Office)',
            'company'   => 'QalbIT Infotech Pvt Ltd',
            'address'   => [
                'C109, Siddhi Vinayak Towers',
                'Near Kataria Arcade, Opp. S.G. Highway',
                'Makarba, Ahmedabad – 380051',
                'Gujarat, India',
            ],
            'phone'     => '+91-9033870071',
            'email'     => 'info@qalbit.com',
            'timezone'  => 'Asia/Kolkata',
            'hours'     => 'Mon–Fri, 10:00 – 19:00 IST',
            'map_embed_url' => null,
            'order'     => 10,
            'enabled'   => true,
        ],

        'international' => [
            'id'        => 'international',
            'label'     => 'International enquiries',
            'company'   => 'QalbIT Infotech Pvt Ltd',
            'address'   => [
                'Serving clients remotely across US, Europe and Middle East',
            ],
            'phone'     => '+91-9033870071',
            'email'     => 'info@qalbit.com',
            'timezone'  => 'Asia/Kolkata',
            'hours'     => 'Overlap calls typically scheduled between 12:00 – 20:00 IST',
            'map_embed_url' => null,
            'order'     => 20,
            'enabled'   => true,
        ],
    ],

    // Contact “channels” – shown as cards on Contact page and used in contactPoint schema.
    'channels' => [

        'sales' => [
            'id'      => 'sales',
            'label'   => 'New projects & sales',
            'summary' => 'For new software projects, MVPs, product extensions and RFPs.',
            'email'   => 'info@qalbit.com',
            'phone'   => '+91-9033870071',
            'cta'     => 'Share your project brief',
        ],

        'support' => [
            'id'      => 'support',
            'label'   => 'Existing clients & support',
            'summary' => 'For current clients who need help with an ongoing project or maintenance.',
            'email'   => 'support@qalbit.com',
            'phone'   => '+91-9033870071',
            'cta'     => 'Raise a support request',
        ],

        'careers' => [
            'id'      => 'careers',
            'label'   => 'Careers & hiring',
            'summary' => 'For candidates and partners who want to explore working with QalbIT.',
            'email'   => 'careers@qalbit.com',
            'phone'   => null,
            'cta'     => 'Share your CV and portfolio',
        ],

        'partnerships' => [
            'id'      => 'partnerships',
            'label'   => 'Partnerships & collaboration',
            'summary' => 'For agencies, consultants and product teams exploring collaboration.',
            'email'   => 'info@qalbit.com',
            'phone'   => null,
            'cta'     => 'Discuss a partnership',
        ],

    ],
];
