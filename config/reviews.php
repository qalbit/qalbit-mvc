<?php

return [

    'bluecircle-web-app' => [
        'id'          => 'bluecircle-web-app',
        'type'        => 'text', // "text" or "video"
        'quote'       => 'QalbIT quickly understood our domain and delivered a stable, scalable web platform. Communication was clear and we always knew what was happening.',
        'author_name' => 'Product Owner',
        'author_role' => 'Founder, BlueCircle',
        'company'     => 'BlueCircle',
        'company_url' => 'https://bluecircle.dk',
        'rating'      => 5,
        'industry'    => 'Healthcare / Wellness',
        'technologies'=> ['Laravel', 'React', 'MySQL'],
        'featured'    => true,

        // Where this review should show up
        'contexts'    => [
            'home',
            'service_custom_software',
            'industry_healthcare',
        ],

        // For type === 'video' only
        'video_url'   => null,
    ],

    'harshiv-erp' => [
        'id'          => 'harshiv-erp',
        'type'        => 'text',
        'quote'       => 'The custom ERP QalbIT built for us removed a lot of manual work. They were flexible with changes and thought through long-term maintainability.',
        'author_name' => 'Director',
        'author_role' => 'Harshiv Enterprise',
        'company'     => 'Harshiv Enterprise',
        'company_url' => null,
        'rating'      => 5,
        'industry'    => 'Manufacturing / Trading',
        'technologies'=> ['Laravel', 'MySQL'],
        'featured'    => true,
        'contexts'    => [
            'home',
            'service_custom_software',
            'industry_manufacturing',
        ],
        'video_url'   => null,
    ],

    'urlcrop-saas' => [
        'id'          => 'urlcrop-saas',
        'type'        => 'text',
        'quote'       => 'URLCrop is a good example of how QalbIT designs SaaS products – clean UX, reliable backend and a clear roadmap for new features.',
        'author_name' => 'Internal Product Note',
        'author_role' => 'QalbIT Product Team',
        'company'     => 'URLCrop',
        'company_url' => 'https://urlcrop.com',
        'rating'      => 5,
        'industry'    => 'SaaS / Marketing',
        'technologies'=> ['Laravel', 'Tailwind CSS'],
        'featured'    => false,
        'contexts'    => [
            'home',
            'products_urlcrop',
            'service_saas_development',
        ],
        'video_url'   => null,
    ],

    'seekly-voice-ai' => [
        'id'          => 'seekly-voice-ai',
        'type'        => 'text',
        'quote'       => 'QalbIT helped us move from idea to a working AI booking prototype faster than expected. The team was hands-on with both tech and product decisions.',
        'author_name' => 'Founder',
        'author_role' => 'Seekly',
        'company'     => 'Seekly',
        'company_url' => null,
        'rating'      => 5,
        'industry'    => 'Services / AI',
        'technologies'=> ['Laravel', 'Voice AI'],
        'featured'    => false,
        'contexts'    => [
            'home',
            'products_seekly',
            'service_ai_solutions',
        ],
        'video_url'   => null,
    ],

    // Example of a video review
    'video-testimonial-sample' => [
        'id'          => 'video-testimonial-sample',
        'type'        => 'video',
        'quote'       => 'In this short video, our client explains how working with QalbIT helped them stabilise their operations and launch on time.',
        'author_name' => 'Client Testimonial',
        'author_role' => null,
        'company'     => 'Confidential',
        'company_url' => null,
        'rating'      => 5,
        'industry'    => 'General',
        'technologies'=> [],
        'featured'    => false,
        'contexts'    => [
            'home',
        ],
        'video_url'   => 'https://www.youtube.com/embed/zRz7dLUKbjg',
    ],

];
