<?php

return [

    // ------------------------------------------------------------------
    // Page-level configuration
    // ------------------------------------------------------------------
    'page' => [
        'slug'        => '/portfolio/',
        'h1'          => 'Selected projects and case studies in custom software & SaaS development.',
        'enabled'     => true,

        'meta_title'       => 'Custom Software & SaaS Development Portfolio | QalbIT',
        'meta_description' => 'Browse selected projects and case studies from QalbIT – custom software platforms, SaaS products and mobile apps built for clients across sports, healthcare, HR tech, telecom, e-commerce and more.',

        'summary' => 'A curated sample of products, platforms and internal tools we have built and maintained for clients across different industries and technology stacks.',

        'seo' => [
            'primary_keyword'    => 'custom software development portfolio',
            'secondary_keywords' => [
                'software development case studies',
                'web and mobile app portfolio',
                'SaaS development portfolio',
                'Laravel and Node.js project examples',
            ],
            'canonical'          => 'https://www.qalbit.com/portfolio/',
        ],

        'faq_key'      => 'faq_portfolio',
        'faq_title'    => 'Frequently asked questions about our software project portfolio',
        'faq_subtitle' => 'These are the questions founders, CTOs and product leaders usually ask when they review our work and plan a new custom software project with QalbIT.',
        'faq_bullets'  => [
            '✓ Which industries, use-cases and product types we typically work with (SaaS, booking platforms, HR tech, ISP/telecom, internal tools and more).',
            '✓ What level of project detail we can share publicly vs. under NDA, and how we handle confidential or internal systems in case studies.',
            '✓ How to find portfolio examples that are closest to your industry, product stage and tech stack – and how we select which projects become full case studies.',
        ],

        // Content sections used by the Blade view
        'sections' => [

            // P1 – Hero
            'hero' => [
                'id'       => 'portfolio-hero',
                'eyebrow'  => 'Our work · Portfolio & case studies',
                'title'    => 'Selected projects and case studies in <span class="text-gradient-brand-animated">custom software & SaaS development</span>.',
                'subtitle' => 'From first MVPs to long-term product engineering, QalbIT designs and builds web, mobile and cloud software for teams across sports, healthcare, HR tech, telecom, e-commerce and more.',
                'primary_cta' => [
                    'label' => 'Discuss your project',
                    'href'  => '/contact-us/?ref=portfolio-hero',
                ],
                'secondary_cta' => [
                    'label' => 'Browse all case studies',
                    'href'  => '/case-studies/',
                ],
            ],

            // P2 – Filters (industry / technology)
            'filters' => [
                'id'                        => 'portfolio-filters',
                'title'                     => 'Filter by industry and technology',
                'intro'                     => 'Use the filters to quickly find projects similar to what you are building – by industry, use case or technology stack.',
                'industry_filter_label'     => 'Industry',
                'technology_filter_label'   => 'Technology',
                'industry_placeholder'      => 'All industries',
                'technology_placeholder'    => 'All technologies',
                'apply_button_label'        => 'Apply filters',
                'reset_button_label'        => 'Clear filters',
            ],

            // P3 – Featured items (driven by "featured" flag on items)
            'featured' => [
                'id'       => 'portfolio-featured',
                'title'    => 'Featured case studies',
                'subtitle' => 'A small selection of projects that show how we combine product thinking, UX and engineering to solve real business problems.',
            ],

            // P4 – Main portfolio grid
            'grid' => [
                'id'       => 'portfolio-grid',
                'title'    => 'All selected projects',
                'subtitle' => 'Browse the full list of products, platforms and tools we have helped design and build. Use the filters above to narrow by industry or technology.',
                'empty_state' => [
                    'title' => 'No projects match these filters yet.',
                    'text'  => 'Try clearing one of the filters or browsing all projects. If you have a specific use case, we can share additional, NDA-protected examples on a call.',
                ],
            ],

            // P6 – Final CTA
            'final_cta' => [
                'id'      => 'portfolio-final-cta',
                'eyebrow' => 'Have a project that should be on this page next?',
                'title'   => 'Let’s design and ship the next product in your portfolio.',
                'text'    => 'Whether you are planning a new SaaS product, internal tool, booking platform or mobile app, QalbIT can help you move from idea or legacy systems to a production-ready product.',
                'primary_cta' => [
                    'label' => 'Book a 30-minute discovery call',
                    'href'  => '/contact-us/?ref=portfolio-final-cta',
                ],
                'secondary_cta' => [
                    'label' => 'Share your requirements for an estimate',
                    'href'  => '/estimate-project/?ref=portfolio-final-cta',
                ],
            ],
        ],
    ],

    // ------------------------------------------------------------------
    // Filter vocabularies
    // ------------------------------------------------------------------

    'industries' => [
        'saas'       => 'SaaS & Product Companies',
        'healthcare' => 'Healthcare & Wellness',
        'sports'     => 'Sports, Clubs & Scheduling',
        'hr-tech'    => 'HR Tech & Recruitment',
        'ecommerce'  => 'E-Commerce & Retail',
        'fintech'    => 'Fintech & Financial Services',
        'enterprise' => 'Enterprise & Internal Tools',
        'telecom'    => 'ISP & Telecom',
        'consumer'   => 'Consumer Apps & B2C',
        'marketing'  => 'Marketing Tools & Platforms',
    ],

    'technologies' => [
        'laravel'      => 'Laravel / PHP',
        'php'          => 'Core PHP',
        'codeigniter'  => 'PHP / CodeIgniter',
        'nodejs'       => 'Node.js',
        'nestjs'       => 'NestJS',
        'react'        => 'React',
        'nextjs'       => 'Next.js',
        'vuejs'        => 'Vue.js',
        'flutter'      => 'Flutter',
        'mysql'        => 'MySQL',
        'postgres'     => 'PostgreSQL',
        'mongodb'      => 'MongoDB',
        'aws'          => 'AWS',
        'digitalocean' => 'DigitalOcean',
        'firebase'     => 'Firebase / FCM',
        'stripe'       => 'Stripe payments',
        'paypal'       => 'PayPal payments',
    ],

    // ------------------------------------------------------------------
    // Portfolio items (minimal fields only)
    // ------------------------------------------------------------------

    'items' => [

        'snappystats' => [
            'slug'          => 'snappystats',
            'name'          => 'Snappy Stats',
            'client'        => 'Shooting academy (Europe)',
            'summary'       => 'Scheduling management web app that centralises bookings and prevents double-booking of lanes, classes and instructors.',
            'industries'    => ['sports'],
            'technologies'  => ['laravel', 'mysql'],
            'type'          => 'case-study',                 // case-study | product | internal
            'case_study_url'=> '/case-studies/snappy-stats/',
            'external_url'  => null,                         // live product URL if applicable
            'thumbnail'     => '/assets/images/portfolio/snappystats-thumb.jpg',
            'featured'      => true,
            'enabled'       => true,
            'order'         => 10,
        ],

        'bloomford' => [
            'slug'          => 'bloomford',
            'name'          => 'Bloomford',
            'client'        => 'Recruitment brand (Belgium)',
            'summary'       => 'Hiring portal and lightweight ATS that centralises employers, vacancies and candidates for HR professionals.',
            'industries'    => ['hr-tech', 'saas'],
            'technologies'  => ['php', 'mysql'],
            'type'          => 'case-study',
            'case_study_url'=> '/case-studies/bloomford/',
            'external_url'  => null,
            'thumbnail'     => '/assets/images/portfolio/bloomford-thumb.jpg',
            'featured'      => true,
            'enabled'       => true,
            'order'         => 20,
        ],

        'hellory' => [
            'slug'          => 'hellory',
            'name'          => 'Hellory Reminder',
            'client'        => 'Hellory',
            'summary'       => 'Smart reminder app for busy lives, built with Flutter and a Node.js / MongoDB API for reliable cross-platform notifications.',
            'industries'    => ['consumer'],
            'technologies'  => ['flutter', 'nodejs', 'mongodb', 'firebase'],
            'type'          => 'case-study',
            'case_study_url'=> '/case-studies/hellory/',
            'external_url'  => null,
            'thumbnail'     => '/assets/images/portfolio/hellory-thumb.jpg',
            'featured'      => true,
            'enabled'       => true,
            'order'         => 30,
        ],

        'plugin' => [
            'slug'          => 'plugin',
            'name'          => 'Plugn',
            'client'        => 'Tennis club (Switzerland)',
            'summary'       => 'Tennis club management and court booking web app that unifies schedules, memberships, pricing and online payments.',
            'industries'    => ['sports'],
            'technologies'  => ['codeigniter', 'mysql', 'stripe', 'paypal'],
            'type'          => 'case-study',
            'case_study_url'=> '/case-studies/plugin/',
            'external_url'  => null,
            'thumbnail'     => '/assets/images/portfolio/plugin-thumb.jpg',
            'featured'      => false,
            'enabled'       => true,
            'order'         => 40,
        ],

        'netzur' => [
            'slug'          => 'netzur',
            'name'          => 'Netzur ISP',
            'client'        => 'Netzur',
            'summary'       => 'ISP management platform that handles plans, billing, support and analytics for internet service providers.',
            'industries'    => ['telecom', 'enterprise'],
            'technologies'  => ['nestjs', 'react', 'postgres', 'aws'],
            'type'          => 'product',
            'case_study_url'=> null,
            'external_url'  => null,
            'thumbnail'     => '/assets/images/portfolio/netzur-thumb.jpg',
            'featured'      => false,
            'enabled'       => true,
            'order'         => 50,
        ],

        'urlcrop' => [
            'slug'          => 'urlcrop',
            'name'          => 'URLCrop',
            'client'        => 'URLCrop',
            'summary'       => 'Link management and QR platform for campaigns and analytics, built as a multi-tenant SaaS product.',
            'industries'    => ['saas', 'marketing'],
            'technologies'  => ['laravel', 'vuejs', 'mysql', 'digitalocean'],
            'type'          => 'product',
            'case_study_url'=> null,
            'external_url'  => 'https://urlcrop.com/',
            'thumbnail'     => '/assets/images/portfolio/urlcrop-thumb.jpg',
            'featured'      => false,
            'enabled'       => true,
            'order'         => 60,
        ],
    ],
];
