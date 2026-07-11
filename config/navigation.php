<?php

return [
    // Top header navigation
    'main' => [
        [
            'label' => 'Services',
            'url'   => '/services/',
            'featured' => [
                'eyebrow'   => 'Product studio',
                'title'     => 'From idea to shipped product',
                'text'      => 'We design, build and operate software end to end — the same way we build our own SaaS products.',
                'cta_label' => 'Start a project',
                'cta_href'  => '/contact-us/',
            ],
            'child' => [
                [
                    'label' => 'Custom Software Development',
                    'url'   => '/services/custom-software-development/',
                    'child' => [],
                ],
                [
                    'label' => 'CRM Development',
                    'url'   => '/services/crm-development/',
                    'child' => [],
                ],
                [
                    'label' => 'ERP Development',
                    'url'   => '/services/erp-development/',
                    'child' => [],
                ],
                [
                    'label' => 'AI Development',
                    'url'   => '/services/ai-solutions/',
                    'child' => [],
                ],
                [
                    'label' => 'SaaS Product Development',
                    'url'   => '/services/saas/',
                    'child' => [],
                ],
                [
                    'label' => 'MVP Development',
                    'url'   => '/services/mvp-development/',
                    'child' => [],
                ],
                [
                    'label' => 'Web Development',
                    'url'   => '/services/custom-web-development/',
                    'child' => [],
                ],
                [
                    'label' => 'Mobile App Development',
                    'url'   => '/services/mobile-development/',
                    'child' => [],
                ],
                [
                    'label' => 'Backend & API Development',
                    'url'   => '/services/backend-development/',
                    'child' => [],
                ],
                [
                    'label' => 'Cloud-Based Solutions',
                    'url'   => '/services/cloud-based-solutions/',
                    'child' => [],
                ],
                [
                    'label' => 'E-Commerce Development',
                    'url'   => '/services/e-commerce/',
                    'child' => [],
                ],
                [
                    'label' => 'UI/UX Design Services',
                    'url'   => '/services/ui-ux-design-service/',
                    'child' => [],
                ],
            ]
        ],
        [
            'label' => 'Technologies',
            'url'   => '/technologies/',
            // Tech icons already carry their own coloured background, so skip the
            // mega-menu icon tile/ring to avoid a box-in-box look.
            'bare_icons' => true,
            'child' => [
                [
                    'label' => 'React.js Development',
                    'url'   => '/technologies/reactjs/',
                    'child' => [],
                ],
                [
                    'label' => 'Next.js Development',
                    'url'   => '/technologies/nextjs/',
                    'child' => [],
                ],
                [
                    'label' => 'Tailwind CSS Development',
                    'url'   => '/technologies/tailwindcss/',
                    'child' => [],
                ],
                [
                    'label' => 'TypeScript Development',
                    'url'   => '/technologies/typescript/',
                    'child' => [],
                ],
                [
                    'label' => 'Node.js Development',
                    'url'   => '/technologies/nodejs/',
                    'child' => [],
                ],
                [
                    'label' => 'PostgreSQL Development',
                    'url'   => '/technologies/postgresql/',
                    'child' => [],
                ],
                [
                    'label' => 'NestJS Development',
                    'url'   => '/technologies/nestjs/',
                    'child' => [],
                ],
                [
                    'label' => 'MySQL Development',
                    'url'   => '/technologies/mysql/',
                    'child' => [],
                ],
                [
                    'label' => 'Laravel Development',
                    'url'   => '/technologies/laravel/',
                    'child' => [],
                ],
                [
                    'label' => 'AWS Cloud & DevOps',
                    'url'   => '/technologies/aws/',
                    'child' => [],
                ],
                [
                    'label' => 'Flutter Development',
                    'url'   => '/technologies/flutter/',
                    'child' => [],
                ],
                [
                    'label' => 'Android Development',
                    'url'   => '/technologies/android/',
                    'child' => [],
                ],
                [
                    'label' => 'React Native Development',
                    'url'   => '/technologies/react-native/',
                    'child' => [],
                ],
                [
                    'label' => 'WordPress Development',
                    'url'   => '/technologies/wordpress/',
                    'child' => [],
                ],
                [
                    'label' => 'CodeIgniter Development',
                    'url'   => '/technologies/codeigniter/',
                    'child' => [],
                ],
            ]
        ],
        [
            'label' => 'Industries',
            'url'   => '/industries/',
            'child' => [
                [
                    'label' => 'Entertainment & Media',
                    'url'   => '/industries/entertainment/',
                    'desc'  => 'Streaming, OTT and media apps with subscriptions and live audience engagement.',
                    'child' => [],
                ],
                [
                    'label' => 'Social Networking',
                    'url'   => '/industries/social-networking/',
                    'desc'  => 'Community and messaging apps with real-time feeds, profiles and moderation.',
                    'child' => [],
                ],
                [
                    'label' => 'Sports & Fitness',
                    'url'   => '/industries/sports/',
                    'desc'  => 'Sports, fitness and wellness apps with tracking, live scores and bookings.',
                    'child' => [],
                ],
                [
                    'label' => 'Travel & Mobility',
                    'url'   => '/industries/travel/',
                    'desc'  => 'Travel booking and mobility platforms with payments and real-time itineraries.',
                    'child' => [],
                ],
                [
                    'label' => 'Food Delivery',
                    'url'   => '/industries/food-delivery/',
                    'desc'  => 'On-demand food ordering and delivery apps with live tracking and multi-vendor support.',
                    'child' => [],
                ],
                [
                    'label' => 'E-Commerce',
                    'url'   => '/industries/e-commerce/',
                    'desc'  => 'Online stores, B2B portals and multi-vendor marketplaces built to convert and scale.',
                    'child' => [],
                ],
                [
                    'label' => 'Fintech & Payments',
                    'url'   => '/industries/fintech/',
                    'desc'  => 'Secure fintech, payments and lending platforms with compliance built in.',
                    'child' => [],
                ],
                [
                    'label' => 'Real Estate & PropTech',
                    'url'   => '/industries/real-estate/',
                    'desc'  => 'PropTech portals with listings, virtual tours, CRM and booking workflows.',
                    'child' => [],
                ],
                [
                    'label' => 'Healthcare & Wellness',
                    'url'   => '/industries/healthcare/',
                    'desc'  => 'HIPAA-ready healthcare apps with telemedicine, appointments and patient portals.',
                    'child' => [],
                ],
                [
                    'label' => 'Education & eLearning',
                    'url'   => '/industries/education/',
                    'desc'  => 'eLearning platforms and LMS with live classes, assessments and progress tracking.',
                    'child' => [],
                ],
                [
                    'label' => 'Business & Corporate',
                    'url'   => '/industries/business/',
                    'desc'  => 'Custom ERPs, CRMs and internal tools that automate business operations.',
                    'child' => [],
                ],
            ]
        ],
        [
            'label' => 'Portfolio',
            'url'   => '/portfolio/',
        ],
        [
            'label' => 'Hire Developers',
            'url'   => '/hire-developers/',
            'featured' => [
                'eyebrow'   => 'Dedicated teams',
                'title'     => 'Your remote squad in India',
                'text'      => 'Hire dedicated developers with flexible monthly engagement, time-zone overlap and a replacement guarantee — no hiring overhead.',
                'cta_label' => 'View all developer profiles',
                'cta_href'  => '/hire-developers/',
            ],
            'child' => [
                [
                    'label' => 'Hire Laravel Developers',
                    'url'   => '/hire-laravel-developers/',
                    'child' => [],
                ],
                [
                    'label' => 'Hire Node.js Developers',
                    'url'   => '/hire-nodejs-developers/',
                    'child' => [],
                ],
                [
                    'label' => 'Hire Next.js Developers',
                    'url'   => '/hire-nextjs-developers/',
                    'child' => [],
                ],
                [
                    'label' => 'Hire React.js Developers',
                    'url'   => '/hire-reactjs-developers/',
                    'child' => [],
                ],
                [
                    'label' => 'Hire Flutter Developers',
                    'url'   => '/hire-flutter-developers/',
                    'child' => [],
                ],
                [
                    'label' => 'Hire MVP Developers',
                    'url'   => '/hire-mvp-developers/',
                    'child' => [],
                ],
                [
                    'label' => 'Hire Full-Stack JS Developers',
                    'url'   => '/hire-full-stack-javascript-developers/',
                    'child' => [],
                ],
                [
                    'label' => 'Hire PHP Developers',
                    'url'   => '/hire-php-developers/',
                    'child' => [],
                ],
            ],
        ],
        [
            'label' => 'Our Process',
            'url'   => '',
            'child' => [
                [
                    'label' => 'Start-up MVP',
                    'url'   => '/start-up-mvp/',
                    'desc'  => 'Validate and launch your first version fast, with a clear scope and budget.',
                    'child' => [],
                ],
                [
                    'label' => 'Product Scaling Team',
                    'url'   => '/product-scaling/',
                    'desc'  => 'A dedicated senior team to grow and harden an existing product.',
                    'child' => [],
                ],
                [
                    'label' => 'Digital Transformation',
                    'url'   => '/digital-transformation/',
                    'desc'  => 'Modernise legacy systems into scalable web, mobile and cloud software.',
                    'child' => [],
                ],
                [
                    'label' => 'Engagement Model',
                    'url'   => '/engagement-model/',
                    'desc'  => 'Flexible, transparent ways to work with us — fixed scope or dedicated team.',
                    'child' => [],
                ],
            ]
        ],
        [
            'label' => 'Products',
            'url'   => '/products/',
            'featured' => [
                'eyebrow'   => 'Our own SaaS',
                'title'     => 'Built, shipped & operated by us',
                'text'      => 'Four live products across link infra, multi-tenant SaaS, tax compliance and HR — proof of how we build.',
                'cta_label' => 'Explore all products',
                'cta_href'  => '/products/',
            ],
            'child' => [
                [
                    'label' => 'URLCrop',
                    'url'   => '/products/urlcrop/',
                    'child' => [],
                ],
                [
                    'label' => 'LiftUp',
                    'url'   => '/products/liftup/',
                    'child' => [],
                ],
                [
                    'label' => 'PocketGST',
                    'url'   => '/products/pocketgst/',
                    'child' => [],
                ],
                [
                    'label' => 'Emplyft',
                    'url'   => '/products/emplyft/',
                    'child' => [],
                ],
            ],
        ],
        [
            'label' => 'Blog',
            'url'   => '/blog/',
        ],
    ],

    // Footer navigation (grouped in columns)
    'footer' => [
        'company' => [
            'label' => 'Company',
            'links' => [
                ['label' => 'About Us',        'url' => '/about-us/'],
                ['label' => 'Case Studies',    'url' => '/case-studies/'],
                ['label' => 'Career',          'url' => '/career/'],
                ['label' => 'Contact Us',      'url' => '/contact-us/'],
            ],
        ],

        'services' => [
            'label' => 'Services',
            'links' => [
                ['label' => 'Custom Software Development', 'url' => '/services/custom-software-development/'],
                ['label' => 'CRM Development',             'url' => '/services/crm-development/'],
                ['label' => 'ERP Development',             'url' => '/services/erp-development/'],
                ['label' => 'MVP Development',             'url' => '/services/mvp-development/'],
                ['label' => 'Web Development',             'url' => '/services/custom-web-development/'],
                ['label' => 'Mobile App Development',      'url' => '/services/mobile-development/'],
            ],
        ],

        'industries' => [
            'label' => 'Industries',
            'links' => [
                ['label' => 'E-Commerce',      'url' => '/industries/e-commerce/'],
                ['label' => 'Fintech',         'url' => '/industries/fintech/'],
                ['label' => 'Healthcare',      'url' => '/industries/healthcare/'],
                ['label' => 'Education',       'url' => '/industries/education/'],
                ['label' => 'Travel',          'url' => '/industries/travel/'],
                ['label' => 'Business',        'url' => '/industries/business/'],
            ],
        ],

        'hire' => [
            'label' => 'Hire Developers',
            'links' => [
                ['label' => 'Hire Laravel Developers',    'url' => '/hire-laravel-developers/'],
                ['label' => 'Hire Node.js Developers',    'url' => '/hire-nodejs-developers/'],
                ['label' => 'Hire Next.js Developers',    'url' => '/hire-nextjs-developers/'],
                ['label' => 'Hire React.js Developers',   'url' => '/hire-reactjs-developers/'],
                ['label' => 'Hire Flutter Developers',    'url' => '/hire-flutter-developers/'],
                ['label' => 'Hire MVP Developers',        'url' => '/hire-mvp-developers/'],
                ['label' => 'All Developer Profiles',     'url' => '/hire-developers/'],
            ],
        ],

        'products' => [
            'label' => 'Products',
            'links' => [
                ['label' => 'URLCrop',   'url' => '/products/urlcrop/'],
                ['label' => 'LiftUp',    'url' => '/products/liftup/'],
                ['label' => 'PocketGST', 'url' => '/products/pocketgst/'],
                ['label' => 'Emplyft',   'url' => '/products/emplyft/'],
            ],
        ],
    ]
];