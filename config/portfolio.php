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
                    'label' => 'Talk about your project',
                    'href'  => '/contact-us/',
                ],
                'secondary_cta' => [
                    'label' => 'Book a 30-min discovery call',
                    'href'  => 'https://calendly.com/abidhusain-qalbit/discuss-project?ref=portfolio-hero',
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
        // Existing foundations
        'saas'            => 'SaaS & Product Companies',
        'healthcare'      => 'Healthcare & Wellness',
        'sports'          => 'Sports, Clubs & Scheduling',
        'hr-tech'         => 'HR Tech & Recruitment',
        'ecommerce'       => 'E-Commerce & Retail',
        'fintech'         => 'Fintech & Financial Services',
        'enterprise'      => 'Enterprise & Internal Tools',
        'telecom'         => 'ISP & Telecom',
        'consumer'        => 'Consumer Apps & B2C',
        'marketing'       => 'Marketing Tools & Platforms',

        // New / extended based on portfolio items
        'verification'      => 'Verification & KYC Tools',
        'operations'        => 'Operations & Workflow Platforms',
        'ai'                => 'AI & Machine Learning Products',
        'industrial-automation' => 'Industrial Automation & Technology',
        'b2b'               => 'B2B & Industrial Services',
        'trading'           => 'Trading & Analytics Platforms',

        'real-estate'       => 'Real Estate & Property',
        'hospitality'       => 'Hospitality & Travel',
        'vacation-rentals'  => 'Vacation Rentals & Stays',

        'productivity'      => 'Productivity & Task Management',
        'communication'     => 'Communication & Messaging',

        'hotel'             => 'Hotels & Accommodation',
        'restaurant'        => 'Restaurants & Food Services',
        'travel'            => 'Travel & Tourism',

        'club-management'   => 'Club & Membership Management',

        'construction'      => 'Construction & Contractors',
        'field-services'    => 'Field Services & On-site Operations',

        'public-sector'     => 'Public Sector & Non-Profits',

        'social'            => 'Social & Community Platforms',
        'media'             => 'Media & Content Platforms',

        'recruitment'       => 'Recruitment & Staffing',

        'marketplace'       => 'Online Marketplaces',
        'retail'            => 'Retail & Commerce',
        'local-business'    => 'Local Business Directories',

        'nft'               => 'NFT & Digital Collectibles',
        'web3'              => 'Web3 & Blockchain',

        'hr'                => 'HR & People Operations',
        'career'            => 'Career & Job Portals',
        'corporate'         => 'Corporate & Company Websites',

        'legal'             => 'Legal & Professional Services',
        'compliance'        => 'Regulatory & Compliance',
        'small-business'    => 'Small Business Services',

        'proptech'          => 'PropTech & Real Estate Tech',

        'farming'           => 'Farming & Agriculture',
        'agritech'          => 'AgriTech & Smart Farming',
        'food-production'   => 'Food Production & Processing',

        'events'            => 'Events & Experiences',
        'entertainment'     => 'Entertainment & Leisure',
    ],

    'technologies' => [
        // Existing foundations
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

        // New / extended based on portfolio items
        'vite'                 => 'Vite (JS build tool)',
        'web-admin'            => 'Custom Web Admin Panels',
        'rest-apis'            => 'REST / JSON APIs',

        'python'               => 'Python',
        'openai'               => 'OpenAI / GPT APIs',
        'gemini'               => 'Google Gemini APIs',
        'perplexity'           => 'Perplexity / AI Research APIs',

        'gsap'                 => 'GSAP Animations',

        'wordpress'            => 'WordPress',
        'payment-gateway'      => 'Payment Gateway Integrations',

        'appcelerator-titanium'=> 'Appcelerator Titanium (Mobile)',
        'ios'                  => 'iOS Apps',
        'android'              => 'Android Apps',

        'figma'                => 'Figma (UI/UX Design)',
        'html'                 => 'HTML / Markup',

        'sms-api'              => 'SMS APIs & Gateways',

        'javascript'           => 'JavaScript',
        'chrome-extension'     => 'Chrome Extensions',

        'admin-panel'          => 'Custom Admin Panels',
    ],

    // ------------------------------------------------------------------
    // Portfolio items (minimal fields only)
    // ------------------------------------------------------------------

    'items' => [

        'postcard-otp' => [
            'slug'          => 'postcard-otp',
            'name'          => 'Postcard OTP',
            'client'        => 'Postcard OTP (SaaS product by Justin Smith)',
            'summary'       => 'Branded address verification SaaS with OTP-based validation, admin dashboard, API access and custom pricing, built on a Node.js backend and React Vite frontend.',
            'industries'    => ['saas', 'verification'],
            'technologies'  => ['nodejs', 'react', 'vite'],
            'type'          => 'product',
            'case_study_url'=> null,
            'external_url'  => "https://postcardotp.com/",
            'thumbnail'     => '/images/portfolio/postcard-otp-thumb.png',
            'featured'      => false,
            'enabled'       => true,
            'order'         => 10,
        ],

        'qtamer' => [
            'slug'          => 'qtamer',
            'name'          => 'QTamer – Queue & Order Management',
            'client'        => 'QTamer (USA)',
            'summary'       => 'Queue & order management SaaS that helps businesses manage customer queues, pickup orders, schedule tracking and operational insights via a web admin dashboard and Flutter mobile apps.',
            'industries'    => ['saas', 'operations'],
            'technologies'  => ['flutter', 'web-admin', 'rest-apis'],
            'type'          => 'product',
            'case_study_url'=> null,
            'external_url'  => "https://qtamer.com",
            'thumbnail'     => '/images/portfolio/qtamer-thumb.png',
            'featured'      => false,
            'enabled'       => true,
            'order'         => 20,
        ],

        'seekly-ai' => [
            'slug'          => 'seekly-ai',
            'name'          => 'Seekly AI',
            'client'        => 'Seekly (Australia)',
            'summary'       => 'AI-powered quotation SaaS that generates live service quotes using custom NLP, AI APIs (Gemini, OpenAI) and data scrapers, with a Laravel-powered buyer/seller booking flow.',
            'industries'    => ['saas', 'ai'],
            'technologies'  => ['laravel', 'python', 'openai', 'gemini', 'perplexity'],
            'type'          => 'product',
            'case_study_url'=> null,
            'external_url'  => "https://seekly.com.au",
            'thumbnail'     => '/images/portfolio/seekly-ai-thumb.png',
            'featured'      => true,
            'enabled'       => true,
            'order'         => 30,
        ],

        'blue-circle' => [
            'slug'          => 'blue-circle',
            'name'          => 'Blue-circle',
            'client'        => 'Blue-circle (Denmark)',
            'summary'       => 'Industrial automation & technology solutions website with a responsive, animated frontend built in Next.js and GSAP to closely match the design and deliver smooth motion transitions.',
            'industries'    => ['industrial-automation', 'b2b'],
            'technologies'  => ['nextjs', 'react', 'gsap'],
            'type'          => 'product',
            'case_study_url'=> null,
            'external_url'  => 'https://blue-circle.dk',
            'thumbnail'     => '/images/portfolio/blue-circle-thumb.png',
            'featured'      => false,
            'enabled'       => true,
            'order'         => 40,
        ],

        'albatherium' => [
            'slug'          => 'albatherium',
            'name'          => 'Albatherium',
            'client'        => 'Albatherium',
            'summary'       => 'Trading & analytics SaaS platform with a robust Node.js backend admin panel providing real-time metrics, secure controls and streamlined user management for smooth day-to-day operations.',
            'industries'    => ['fintech', 'trading', 'saas'],
            'technologies'  => ['nodejs'],
            'type'          => 'product',
            'case_study_url'=> null,
            'external_url'  => 'https://albatherium.com/',
            'thumbnail'     => '/images/portfolio/albatherium-thumb.png',
            'featured'      => false,
            'enabled'       => true,
            'order'         => 50,
        ],

        'my-houzzz-management' => [
            'slug'          => 'my-houzzz-management',
            'name'          => 'My Houzzz Management',
            'client'        => 'My Houzzz Management',
            'summary'       => 'Property management & vacation rentals website where we enhanced the UI and integrated a secure payment flow for a premium Florida-based rental and property management service.',
            'industries'    => ['real-estate', 'hospitality', 'vacation-rentals'],
            'technologies'  => ['wordpress', 'payment-gateway', 'php'],
            'type'          => 'product',
            'case_study_url'=> null,
            'external_url'  => 'https://www.myhouzzzmanagement.com/en/',
            'thumbnail'     => '/images/portfolio/my-houzzz-thumb.png',
            'featured'      => false,
            'enabled'       => true,
            'order'         => 60,
        ],

        'hellory' => [
            'slug'          => 'hellory',
            'name'          => 'Hellory Reminder App',
            'client'        => 'Hellory',
            'summary'       => 'Productivity and communication app that helps users stay on top of their busy lives with seamless, flexible and secure reminders across mobile, web and backend tools.',
            'industries'    => ['consumer', 'productivity', 'communication'],
            'technologies'  => [
                'flutter',
                'nodejs',
                'mongodb',
                'firebase',
                'wordpress',
                'codeigniter',
            ],
            'type'          => 'case-study',
            'case_study_url'=> '/case-studies/hellory/',
            'external_url'  => 'https://helloryreminder.com/',
            'thumbnail'     => '/images/portfolio/hellory-thumb.png',
            'featured'      => true,
            'enabled'       => true,
            'order'         => 70,
        ],


        'hotel-satkar' => [
            'slug'          => 'hotel-satkar',
            'name'          => 'Hotel Satkar',
            'client'        => 'Hotel Satkar – Hotel & Restaurant',
            'summary'       => 'Hotel and restaurant website with a modern UI and dynamic booking form so guests can reserve rooms and banquet spaces online.',
            'industries'    => ['hospitality', 'hotel', 'restaurant', 'travel'],
            'technologies'  => ['wordpress', 'php'],
            'type'          => 'project',
            'case_study_url'=> null,
            'external_url'  => 'https://satkarhotel.co.in/',
            'thumbnail'     => '/images/portfolio/hotel-satkar-thumb.png',
            'featured'      => false,
            'enabled'       => true,
            'order'         => 80,
        ],

        'snappystats' => [
            'slug'          => 'snappystats',
            'name'          => 'Snappy Stats',
            'client'        => 'Shooting club (Europe)',
            'summary'       => 'Events, members and club management platform for shooting academies – a Laravel web application that centralises bookings, schedules and range operations in one place.',
            'industries'    => ['sports', 'club-management', 'saas'],
            'technologies'  => ['laravel', 'php', 'mysql'],
            'type'          => 'case-study',
            'case_study_url'=> '/case-studies/snappy-stats/',
            'external_url'  => 'https://snappystats.ch/',
            'thumbnail'     => '/images/portfolio/snappystats-thumb.png',
            'featured'      => true,
            'enabled'       => true,
            'order'         => 90,
        ],

        'plugin' => [
            'slug'          => 'plugin',
            'name'          => 'Plugin – Tennis Club Management',
            'client'        => 'Tennis club (Switzerland)',
            'summary'       => 'Tennis club management web product that lets individuals and teams book courts, manage events and organise club play online.',
            'industries'    => ['sports', 'club-management'],
            'technologies'  => ['codeigniter', 'mysql'],
            'type'          => 'case-study',
            'case_study_url'=> '/case-studies/plugin/',
            'external_url'  => 'https://plugin.ch/en/home/',
            'thumbnail'     => '/images/portfolio/plugin-thumb.png',
            'featured'      => false,
            'enabled'       => true,
            'order'         => 100,
        ],

        'contractorplus' => [
            'slug'          => 'contractorplus',
            'name'          => 'Contractor+',
            'client'        => 'Contractor Plus, Inc.',
            'summary'       => 'CMS and operations portal for contractors to track expenses, generate invoices, assign tasks, and manage multiple payment modes in one place.',
            'industries'    => ['saas', 'construction', 'field-services'],
            'technologies'  => ['codeigniter', 'mysql'],
            'type'          => 'product',
            'case_study_url'=> null,
            'external_url'  => 'https://contractorplus.app/',
            'thumbnail'     => '/images/portfolio/contractorplus-thumb.png',
            'featured'      => false,
            'enabled'       => true,
            'order'         => 110,
        ],

        'londonwide-lmcs' => [
            'slug'          => 'londonwide-lmcs',
            'name'          => 'Hospital Report Management',
            'client'        => 'Londonwide LMCs',
            'summary'       => 'Hospital report management solution with a PHP admin panel and cross-platform mobile apps to capture, track and respond to patient and GP queries efficiently.',
            'industries'    => ['healthcare', 'public-sector'],
            'technologies'  => ['php', 'appcelerator-titanium', 'mysql', 'ios', 'android'],
            'type'          => 'product',
            'case_study_url'=> null,
            'external_url'  => 'https://www.lmc.org.uk/',
            'thumbnail'     => '/images/portfolio/londonwide-lmcs-thumb.png',
            'featured'      => false,
            'enabled'       => true,
            'order'         => 120,
        ],

        'flickstur' => [
            'slug'          => 'flickstur',
            'name'          => 'Flickstur',
            'client'        => 'Flickstur',
            'summary'       => 'Video-sharing social platform with user management, content streaming and Stripe-powered subscription plans built on Laravel.',
            'industries'    => ['social', 'media', 'saas'],
            'technologies'  => ['laravel', 'mysql', 'stripe'],
            'type'          => 'product',
            'case_study_url'=> null,
            'external_url'  => null,
            'thumbnail'     => '/images/portfolio/flickstur-thumb.png',
            'featured'      => false,
            'enabled'       => true,
            'order'         => 130,
        ],

        'bloomford' => [
            'slug'          => 'bloomford',
            'name'          => 'Bloomford Hiring Portal',
            'client'        => 'Bloomford',
            'summary'       => 'HR management and hiring portal that helps recruitment professionals streamline vacancies, candidates, online video interviews and test assessments.',
            'industries'    => ['hr-tech', 'recruitment', 'saas'],
            'technologies'  => ['php', 'vuejs', 'mysql'],
            'type'          => 'case-study',
            'case_study_url'=> '/case-studies/bloomford/',
            'external_url'  => null,
            'thumbnail'     => '/images/portfolio/bloomford-thumb.png',
            'featured'      => true,
            'enabled'       => true,
            'order'         => 140,
        ],

        'hotel-bhagyoday' => [
            'slug'          => 'hotel-bhagyoday',
            'name'          => 'Hotel Bhagyoday',
            'client'        => 'Hotel Bhagyoday',
            'summary'       => 'Hotel & restaurant website with a polished UI and dynamic booking form so guests can book rooms and banquet spaces online.',
            'industries'    => ['hotel', 'restaurant', 'hospitality'],
            'technologies'  => ['wordpress', 'php'],
            'type'          => 'project',
            'case_study_url'=> null,
            'external_url'  => 'https://www.bhagyodayhotel.com/',
            'thumbnail'     => '/images/portfolio/hotel-bhagyoday-thumb.png',
            'featured'      => false,
            'enabled'       => true,
            'order'         => 150,
        ],

        'dalil-al-kuwait' => [
            'slug'          => 'dalil-al-kuwait',
            'name'          => 'Dalil Al Kuwait',
            'client'        => 'Dalil Al Kuwait',
            'summary'       => 'Marketplace platform that centralises vendor locations, online presence links and product information into a single, easy-to-manage channel.',
            'industries'    => ['marketplace', 'retail', 'local-business'],
            'technologies'  => ['php', 'appcelerator-titanium'],
            'type'          => 'project', // web + mobile marketplace implementation
            'case_study_url'=> null,
            'external_url'  => 'https://dalil-alkuwait.com/en/',
            'thumbnail'     => '/images/portfolio/dalil-al-kuwait-thumb.png',
            'featured'      => false,
            'enabled'       => true,
            'order'         => 160,
        ],

        'informatix-healthcare-recruitment' => [
            'slug'          => 'informatix-healthcare-recruitment',
            'name'          => 'Informatix Healthcare – Recruitment Page',
            'client'        => 'Informatix Healthcare',
            'summary'       => 'Fast-loading recruitment landing page to help Informatix Healthcare attract and onboard hospital staff, designed in Figma and implemented as a focused PHP website.',
            'industries'    => ['healthcare', 'recruitment'],
            'technologies'  => ['php', 'figma'],
            'type'          => 'project',
            'case_study_url'=> null,
            'external_url'  => 'https://informatixhealth.com/',
            'thumbnail'     => '/images/portfolio/informatix-healthcare-recruitment-thumb.png',
            'featured'      => false,
            'enabled'       => true,
            'order'         => 170,
        ],

        'gemstools-nft-marketplace' => [
            'slug'          => 'gemstools-nft-marketplace',
            'name'          => 'GemsTools – NFT Marketplace',
            'client'        => 'GemsTools',
            'summary'       => 'NFT marketplace-style web application where users can register and list popular NFTs, built with a Laravel backend and React.js frontend.',
            'industries'    => ['nft', 'marketplace', 'web3'],
            'technologies'  => ['react', 'laravel'],
            'type'          => 'project',
            'case_study_url'=> null,
            'external_url'  => null,
            'thumbnail'     => '/images/portfolio/gemstools-nft-marketplace-thumb.png',
            'featured'      => false,
            'enabled'       => true,
            'order'         => 180,
        ],

        'verolift-career-sites' => [
            'slug'          => 'verolift-career-sites',
            'name'          => 'Verolift Career Sites',
            'client'        => 'Verolift',
            'summary'       => 'Reusable WordPress career-site template that allows HR teams to spin up multi-location or multi-brand career pages with simple content edits.',
            'industries'    => ['hr', 'career', 'corporate'],
            'technologies'  => ['wordpress', 'php', 'html'],
            'type'          => 'project',
            'case_study_url'=> null,
            'external_url'  => null,
            'thumbnail'     => '/images/portfolio/verolift-career-sites-thumb.png',
            'featured'      => false,
            'enabled'       => true,
            'order'         => 190,
        ],

        'utapy-sms-campaign' => [
            'slug'          => 'utapy-sms-campaign',
            'name'          => 'Utapy SMS Campaign Manager',
            'client'        => 'Utapy',
            'summary'       => 'SMS campaign management platform with admin analytics dashboard and built-in landing page builder for higher-converting outbound campaigns.',
            'industries'    => ['marketing', 'saas', 'communication'],
            'technologies'  => ['laravel', 'sms-api'],
            'type'          => 'project',
            'case_study_url'=> null,
            'external_url'  => null,
            'thumbnail'     => '/images/portfolio/utapy-sms-campaign-thumb.png',
            'featured'      => false,
            'enabled'       => true,
            'order'         => 200,
        ],


        'publish-my-llc' => [
            'slug'          => 'publish-my-llc',
            'name'          => 'Publish My LLC',
            'client'        => 'Publish My LLC',
            'summary'       => 'Legal service website that helps individuals complete New York State LLC publication requirements and register their business with confidence.',
            'industries'    => ['legal', 'compliance', 'small-business'],
            'technologies'  => ['php'],
            'type'          => 'project',
            'case_study_url'=> null,
            'external_url'  => 'https://publishmyllc.com/',
            'thumbnail'     => '/images/portfolio/publish-my-llc-thumb.png',
            'featured'      => false,
            'enabled'       => true,
            'order'         => 210,
        ],

        'credifana-chrome-extension' => [
            'slug'          => 'credifana-chrome-extension',
            'name'          => 'Credifana – Real Estate Chrome Extension',
            'client'        => 'Credifana',
            'summary'       => 'Chrome extension that integrates with popular real estate websites to surface real-time investment analysis and decision-ready insights for property investors.',
            'industries'    => ['real-estate', 'proptech', 'saas'],
            'technologies'  => ['javascript', 'laravel', 'html', 'chrome-extension'],
            'type'          => 'project',
            'case_study_url'=> null,
            'external_url'  => null,
            'thumbnail'     => '/images/portfolio/credifana-thumb.png',
            'featured'      => false,
            'enabled'       => true,
            'order'         => 220,
        ],

        'de-ruwenburg' => [
            'slug'          => 'de-ruwenburg',
            'name'          => 'De Ruwenburg',
            'client'        => 'De Ruwenburg Hotel',
            'summary'       => 'Hotel room booking and in-stay services mobile app, allowing guests to reserve rooms and request hotel services that are automatically routed to staff for fulfilment.',
            'industries'    => ['hospitality', 'hotel', 'travel'],
            'technologies'  => ['appcelerator-titanium', 'android', 'ios'],
            'type'          => 'project',
            'case_study_url'=> null,
            'external_url'  => null,
            'thumbnail'     => '/images/portfolio/de-ruwenburg-thumb.png',
            'featured'      => false,
            'enabled'       => true,
            'order'         => 230,
        ],

        'rucheconnect' => [
            'slug'          => 'rucheconnect',
            'name'          => 'RucheConnect',
            'client'        => 'Honey farming & beekeeping business',
            'summary'       => 'IoT-enabled honey management solution with a central admin panel and iOS/Android mobile apps to track hive weight, thickness, colour and other quality metrics in real time.',
            'industries'    => ['farming', 'agritech', 'food-production'],
            'technologies'  => [
                'appcelerator-titanium',
                'php',
                'admin-panel',
                'ios',
                'android',
            ],
            'type'          => 'project',
            'case_study_url'=> null,
            'external_url'  => null,
            'thumbnail'     => '/images/portfolio/rucheconnect-thumb.png',
            'featured'      => false,
            'enabled'       => true,
            'order'         => 240,
        ],

        'feestbeesten' => [
            'slug'          => 'feestbeesten',
            'name'          => 'FeestBeesten',
            'client'        => 'FeestBeesten (Netherlands)',
            'summary'       => 'Mobile companion app for FeestBeesten, built for iOS and Android to support their event and party experiences with on-the-go access for attendees.',
            'industries'    => ['events', 'entertainment'],
            'technologies'  => ['appcelerator-titanium', 'ios', 'android'],
            'type'          => 'product', 
            'case_study_url'=> null,
            'external_url'  => null, 
            'thumbnail'     => '/images/portfolio/feestbeesten-thumb.png',
            'featured'      => false,
            'enabled'       => true,
            'order'         => 250,
        ],


    ],
];
