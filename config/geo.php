<?php

return [
    // -------------------------------------------------
    // Washington, USA
    // -------------------------------------------------
    'washington' => [
        // Core routing / identification
        'slug'         => '/usa/washington/',
        'template'     => 'pages/locations/show',
        'country_key'  => 'usa',
        'country_name' => 'United States',
        'state_key'    => 'washington',

        'name'       => 'Washington, USA',
        'short_name' => 'Washington',
        'enabled'    => true,
        'order'      => 20,

        // Backward-compatible SEO fields
        'meta_title' => 'Custom Software Development in Washington, USA – QalbIT',
        'meta_description' => 'QalbIT provides custom software, web and mobile app development services to startups and enterprises across Washington, USA. Partner with a dedicated remote team to design, build and scale your digital products.',
        'headline' => 'Custom Software Development in Washington, USA',
        'short_description' => 'End-to-end web, mobile and cloud solutions for Washington startups, scale-ups and enterprises.',

        // Optional – used if you still need it somewhere else
        'focus_services' => [
            'Custom Software Development',
            'Web Development',
            'Mobile App Development',
            'SaaS Product Development',
            'Cloud-Based Solutions',
        ],

        // Normalised SEO block for the new template
        'faq_key' => 'faq_location_usa_washington',
        'faq_title' => 'Frequently asked questions from Washington teams',
        'faq_subtitle' => 'Answers to common questions from founders and product leaders across Washington. You can always reach out if you do not see your question here.',
        'faq_bullets' => [
            '✓ Pacific Time–friendly collaboration for teams across Seattle and Washington state.',
            '✓ Practical guidance on shaping MVP scope and phased delivery for your product.',
            '✓ Structured agreements that clarify code ownership, security and long-term support.',
        ],

        'seo' => [
            'h1'               => 'Custom Software Development Company for Washington Businesses',
            'meta_title'       => 'Custom Software Development in Washington, USA – QalbIT',
            'meta_description' => 'QalbIT is a remote-first custom software development company helping Washington businesses build SaaS products, web applications and mobile apps with predictable delivery and product thinking.',
            'canonical'        => '/usa/washington/',
            'faq_key'          => 'location_usa_washington',
            'breadcrumbs'      => [
                ['label' => 'Home',             'url' => '/'],
                ['label' => 'Washington, USA',  'url' => '/usa/washington/'],
            ],
        ],

        // High-level summary (optional convenience for cards, previews, etc.)
        'summary' => [
            'eyebrow' => 'Custom Software Development in Washington, USA',
            'title'   => 'Remote custom software partner for Washington startups and enterprises',
            'intro'   => 'QalbIT helps Washington product teams and founders design, build and scale SaaS products, internal tools and mobile apps with a dedicated remote engineering squad that fits your roadmap, budget and timelines.',
        ],

        // -------------------------------------------------
        // Sections S1–S10
        // -------------------------------------------------

        'sections' => [

            // S1 – Location hero & primary CTA
            'hero' => [
                'id'       => 'location-hero',
                'section'  => 'hero',
                'eyebrow'  => 'Custom Software Development in Washington, USA',
                'title'    => 'Custom Software Development Company for Washington Businesses',
                'subtitle' => 'Build and scale SaaS, web and mobile products with a senior remote team that understands the pace and expectations of Washington\'s tech ecosystem.',
                'body'     => 'From early-stage MVPs in Seattle to enterprise modernization across the wider state, QalbIT partners with Washington founders and product leaders to design, build and iterate software that moves the needle for your customers and stakeholders.',

                'primary_cta' => [
                    'label' => 'Schedule a discovery call',
                    'url'   => '/contact-us/',
                    'style' => 'primary',
                ],
                'secondary_cta' => [
                    'label' => 'See how we work',
                    'url'   => '/engagement-model/',
                    'style' => 'ghost',
                ],

                'trust' => [
                    'label' => 'Trusted by teams in the US, UK and GCC',
                    'items' => [
                        ['label' => '10+ years in custom software',        'icon' => null],
                        ['label' => 'Products used in 15+ countries',      'icon' => null],
                        ['label' => 'Founders & CTOs as core clients',     'icon' => null],
                    ],
                ],
                'meta' => [
                    'theme' => 'light-hero',
                ],
            ],

            // S2 – About QalbIT for Washington businesses
            'about' => [
                'id'      => 'location-about',
                'section' => 'about',
                'eyebrow' => 'About QalbIT',
                'title'   => 'A remote custom software partner for Washington startups & enterprises',
                'intro'   => 'QalbIT is a product-driven engineering studio working with Washington founders, CTOs and business leaders to plan, build and maintain digital products. We plug in as your long-term delivery arm rather than a one-off outsourcing vendor.',

                'highlights' => [
                    [
                        'label'       => '12+ years building products',
                        'description' => 'Experience shipping complex SaaS, marketplaces, internal tools and ERP-style systems for global customers.',
                    ],
                    [
                        'label'       => 'US West Coast–friendly collaboration',
                        'description' => 'Overlap with Pacific time for planning, reviews and critical releases, backed by structured rituals and clear written communication.',
                    ],
                    [
                        'label'       => 'Full-stack product teams',
                        'description' => 'Design, frontend, backend, mobile and QA aligned to your roadmap instead of isolated freelancers.',
                    ],
                    [
                        'label'       => 'Security & compliance aware',
                        'description' => 'Secure architectures, role-based access and stable deployment pipelines from day one.',
                    ],
                ],
            ],

            // S3 – Custom software services for Washington
            'services' => [
                'id'      => 'location-services',
                'section' => 'services',
                'eyebrow' => 'Services',
                'title'   => 'Custom software development services for Washington businesses',
                'intro'   => 'Whether you are validating a new product, modernising a legacy system or scaling an existing platform, QalbIT brings the right mix of architecture, engineering and product thinking for Washington teams.',

                'items' => [
                    [
                        'key'         => 'custom-software',
                        'label'       => 'Custom Software Development',
                        'description' => 'End-to-end web application development tailored to your workflows, roles and security requirements.',
                        'url'         => '/services/custom-software-development/',
                    ],
                    [
                        'key'         => 'saas-mvp',
                        'label'       => 'SaaS & MVP Development',
                        'description' => 'Design and deliver investor-ready MVPs and SaaS platforms with a focus on fast learning and clean architecture.',
                        'url'         => '/start-up-mvp/',
                    ],
                    [
                        'key'         => 'mobile-apps',
                        'label'       => 'Mobile App Development',
                        'description' => 'Flutter and cross-platform mobile apps that integrate with your existing systems and analytics.',
                        'url'         => '/services/mobile-app-development/',
                    ],
                    [
                        'key'         => 'api-backend',
                        'label'       => 'API & Backend Engineering',
                        'description' => 'Secure APIs, integrations and background jobs running on modern PHP/Node stacks and cloud infrastructure.',
                        'url'         => '/services/api-development/',
                    ],
                    [
                        'key'         => 'cloud-devops',
                        'label'       => 'Cloud & DevOps',
                        'description' => 'CI/CD pipelines, environment strategy and observability so releases to your Washington customers stay stable.',
                        'url'         => '/services/cloud-based-solutions/',
                    ],
                    [
                        'key'         => 'dedicated-team',
                        'label'       => 'Dedicated Product Team',
                        'description' => 'Scale with a stable remote squad that works like an extension of your Washington product and engineering team.',
                        'url'         => '/engagement-models/',
                    ],
                ],
            ],

            // S4 – Why QalbIT for custom software in Washington
            'why' => [
                'id'      => 'location-why',
                'section' => 'why',
                'eyebrow' => 'Why QalbIT',
                'title'   => 'Why Washington teams choose QalbIT as their custom software partner',
                'intro'   => 'Washington products operate in a competitive, high-expectation environment. QalbIT is set up to handle that pace with structured delivery, senior oversight and honest communication.',

                'reasons' => [
                    [
                        'label'       => 'Remote, but in sync with Pacific time',
                        'description' => 'Overlap with PT working hours for planning, reviews and critical releases, while leveraging an offshore team for faster throughput.',
                        'bullets'     => [
                            'Regular stand-ups and demos in Washington-friendly hours.',
                            'Asynchronous updates, Loom walkthroughs and clear written docs.',
                        ],
                    ],
                    [
                        'label'       => 'Product mindset, not just billable hours',
                        'description' => 'We think in terms of outcomes, activation metrics and technical debt instead of simply delivering tickets.',
                        'bullets'     => [
                            'Help with scoping, sequencing and launch strategy.',
                            'Balance between speed and long-term maintainability.',
                        ],
                    ],
                    [
                        'label'       => 'Transparent, predictable delivery',
                        'description' => 'You see the roadmap, current work and risks at all times through simple project rituals and tools.',
                        'bullets'     => [
                            'Structured sprints with clear acceptance criteria.',
                            'Access to staging environments and progress dashboards.',
                        ],
                    ],
                    [
                        'label'       => 'Secure, scalable foundations',
                        'description' => 'Architectures ready for compliance, audits and growth as you scale in Washington and beyond.',
                        'bullets'     => [
                            'Role-based access, audit trails and logging by default.',
                            'Cloud-native deployments with backups and monitoring.',
                        ],
                    ],
                ],
            ],

            // S5 – Our product development process (summary)
            'process' => [
                'id'      => 'location-process',
                'section' => 'process',
                'eyebrow' => 'Process',
                'title'   => 'A proven product development process for Washington businesses',
                'intro'   => 'We rely on a clear, battle-tested delivery process that reduces risk, keeps stakeholders aligned and protects your Washington launches from surprise delays.',

                'steps' => [
                    [
                        'label'       => 'Discover & define',
                        'description' => 'We align on goals, constraints, success metrics and scope before anyone writes code.',
                        'related'     => 'start-up-mvp',
                    ],
                    [
                        'label'       => 'Design & validate',
                        'description' => 'User flows, wireframes and UI prototypes so Washington stakeholders can react early and give feedback.',
                        'related'     => 'start-up-mvp',
                    ],
                    [
                        'label'       => 'Build iteratively',
                        'description' => 'We ship in small, reviewable increments using modern practices across frontend, backend and mobile.',
                        'related'     => 'product-scaling',
                    ],
                    [
                        'label'       => 'Launch & stabilise',
                        'description' => 'We help you roll out to customers, stabilise production and capture the right metrics.',
                        'related'     => 'product-scaling',
                    ],
                    [
                        'label'       => 'Improve & extend',
                        'description' => 'Ongoing iterations, new modules and performance work once the first launch is live.',
                        'related'     => 'digital-transformation',
                    ],
                ],

                'links' => [
                    [
                        'label' => 'See our full product development approach',
                        'url'   => '/start-up-mvp/',
                    ],
                    [
                        'label' => 'How we support scaling products',
                        'url'   => '/product-scaling/',
                    ],
                ],
            ],

            // S6 – Engagement models for Washington companies
            'engagements' => [
                'id'      => 'location-engagements',
                'section' => 'engagements',
                'eyebrow' => 'Engagement Models',
                'title'   => 'Flexible engagement options for Washington teams',
                'intro'   => 'Choose an engagement style that fits your product stage, budget and internal capacity. You can always switch as your needs evolve.',

                'models' => [
                    [
                        'key'         => 'fixed-scope',
                        'label'       => 'Fixed-scope project',
                        'description' => 'Well-defined projects with clear timelines, deliverables and pricing – ideal for MVPs and redesigns.',
                        'best_for'    => 'Founders and teams with a clear scope and deadline.',
                        'link'        => '/start-up-mvp/',
                    ],
                    [
                        'key'         => 'dedicated-squad',
                        'label'       => 'Dedicated product squad',
                        'description' => 'A cross-functional team (PM, designers, engineers) that works as an extension of your Washington product organisation.',
                        'best_for'    => 'Scale-ups and enterprises with a continuous roadmap.',
                        'link'        => '/engagement-models/',
                    ],
                    [
                        'key'         => 'continuous-support',
                        'label'       => 'Continuous improvement & support',
                        'description' => 'Lightweight retainer to handle maintenance, small improvements and on-call fixes for your live products.',
                        'best_for'    => 'Teams that want predictable care for existing platforms.',
                        'link'        => '/digital-transformation/',
                    ],
                ],
            ],

            // S7 – Tech stack & capabilities
            'tech' => [
                'id'      => 'location-tech',
                'section' => 'tech',
                'eyebrow' => 'Technologies',
                'title'   => 'Modern tech stack for Washington software projects',
                'intro'   => 'We combine modern frontend frameworks, robust backend platforms and cloud-native infrastructure to build software that can grow with your Washington business.',

                'categories' => [
                    [
                        'label'  => 'Frontend',
                        'items'  => ['React', 'Next.js', 'Vue.js', 'Tailwind CSS'],
                    ],
                    [
                        'label'  => 'Backend & APIs',
                        'items'  => ['Node.js', 'NestJS', 'PHP', 'Laravel'],
                    ],
                    [
                        'label'  => 'Mobile',
                        'items'  => ['Flutter', 'React Native'],
                    ],
                    [
                        'label'  => 'Cloud & Databases',
                        'items'  => ['AWS', 'GCP', 'PostgreSQL', 'MySQL', 'Redis'],
                    ],
                ],

                'links' => [
                    [
                        'label' => 'Explore our full tech stack',
                        'url'   => '/technologies/',
                    ],
                ],
            ],

            // S8 – Selected work & social proof
            'proof' => [
                'id'      => 'location-proof',
                'section' => 'proof',
                'eyebrow' => 'Case Studies',
                'title'   => 'Real products shipped with QalbIT',
                'intro'   => 'Here are a few examples of platforms and tools we have helped design, build and scale. More detailed case studies are available on request.',

                'cases' => [
                    [
                        'label'       => 'B2B SaaS platform',
                        'industry'    => 'SaaS / B2B',
                        'region'      => 'North America & Europe',
                        'headline'    => 'Helped a SaaS team refactor and scale their product used by enterprise clients.',
                        'result'      => 'Improved stability, enabled new modules and reduced deployment friction.',
                        'url'         => '/portfolio/',
                    ],
                    [
                        'label'       => 'Operations & logistics tools',
                        'industry'    => 'Logistics / Operations',
                        'region'      => 'Global',
                        'headline'    => 'Built internal tools to digitise paper-heavy workflows and approvals.',
                        'result'      => '40% faster processing and better visibility for operations teams.',
                        'url'         => '/portfolio/',
                    ],
                ],

                'testimonials' => [
                    [
                        'quote'  => 'QalbIT felt like an extension of our own team – responsive, structured and honest about trade-offs.',
                        'name'   => 'Founder & CEO',
                        'title'  => 'B2B SaaS company',
                        'region' => 'US-based',
                    ],
                ],
            ],

            // S10 – Final CTA band
            'final_cta' => [
                'id'      => 'location-final-cta',
                'section' => 'final_cta',
                'eyebrow' => 'Start your project',
                'title'   => 'Discuss your custom software project in Washington',
                'body'    => 'Share a bit about your product, timelines and goals, and we will come back with next steps and a suggested engagement model within one business day.',

                'primary_cta' => [
                    'label' => 'Request a free consultation',
                    'url'   => '/contact-us/',
                ],
                'secondary_cta' => [
                    'label' => 'Book a call on Calendly',
                    'url'   => 'https://calendly.com/abidhusain-qalbit/discuss-project',
                ],

                'meta' => [
                    'show_form' => true,
                    'theme'     => 'light',
                ],
            ],
        ],
    ],

    // -------------------------------------------------
    // Virginia, USA
    // -------------------------------------------------
    'virginia' => [
        // Core routing / identification
        'slug'         => '/usa/virginia/',
        'template'     => 'pages/locations/show',
        'country_key'  => 'usa',
        'country_name' => 'United States',
        'state_key'    => 'virginia',

        'name'       => 'Virginia, USA',
        'short_name' => 'Virginia',
        'enabled'    => true,
        'order'      => 30,

        // Backward-compatible SEO fields
        'meta_title' => 'Custom Software Development in Virginia, USA – QalbIT',
        'meta_description' => 'QalbIT provides custom software, web and mobile app development services to startups and enterprises across Virginia, USA – from Northern Virginia and the DC metro area to Richmond and Virginia Beach. Partner with a dedicated remote team to design, build and scale your digital products.',
        'headline' => 'Custom Software Development in Virginia, USA',
        'short_description' => 'End-to-end web, mobile and cloud solutions for Virginia startups, scale-ups and enterprises.',

        // Optional – used if you still need it somewhere else
        'focus_services' => [
            'Custom Software Development',
            'Web Development',
            'Mobile App Development',
            'SaaS Product Development',
            'Cloud-Based Solutions',
        ],

        // Normalised SEO block for the new template
        'faq_key' => 'faq_location_usa_virginia',
        'faq_title' => 'Frequently asked questions from Virginia teams',
        'faq_subtitle' => 'Answers to common questions from founders and product leaders across Virginia. You can always reach out if you do not see your question here.',
        'faq_bullets' => [
            '✓ Designed for Virginia organisations that need predictable, low-risk delivery.',
            '✓ Helps modernise legacy systems without disrupting critical day-to-day operations.',
            '✓ Clear contracts around IP, compliance and ongoing maintenance responsibilities.',
        ],

        'seo' => [
            'h1'               => 'Custom Software Development Company for Virginia Businesses',
            'meta_title'       => 'Custom Software Development in Virginia, USA – QalbIT',
            'meta_description' => 'QalbIT is a remote-first custom software development company helping Virginia businesses build SaaS products, web applications and mobile apps with predictable delivery and product thinking.',
            'canonical'        => '/usa/virginia/',
            'faq_key'          => 'location_usa_virginia',
            'breadcrumbs'      => [
                ['label' => 'Home',           'url' => '/'],
                ['label' => 'Virginia, USA',  'url' => '/usa/virginia/'],
            ],
        ],

        // High-level summary (optional convenience for cards, previews, etc.)
        'summary' => [
            'eyebrow' => 'Custom Software Development in Virginia, USA',
            'title'   => 'Remote custom software partner for Virginia startups and enterprises',
            'intro'   => 'QalbIT helps Virginia product teams and founders design, build and scale SaaS products, internal tools and mobile apps with a dedicated remote engineering squad that fits your roadmap, budget and timelines.',
        ],

        // -------------------------------------------------
        // Sections S1–S10
        // -------------------------------------------------

        'sections' => [

            // S1 – Location hero & primary CTA
            'hero' => [
                'id'       => 'location-hero',
                'section'  => 'hero',
                'eyebrow'  => 'Custom Software Development in Virginia, USA',
                'title'    => 'Custom Software Development Company for Virginia Businesses',
                'subtitle' => 'Build and scale SaaS, web and mobile products with a senior remote team that understands the needs of Virginia technology, public sector and services businesses.',
                'body'     => 'From early-stage MVPs in Northern Virginia and the DC metro area to internal tools for Richmond and Virginia Beach based teams, QalbIT partners with Virginia founders and product leaders to design, build and iterate software that moves the needle for customers and stakeholders.',

                'primary_cta' => [
                    'label' => 'Schedule a discovery call',
                    'url'   => '/contact-us/',
                    'style' => 'primary',
                ],
                'secondary_cta' => [
                    'label' => 'See how we work',
                    'url'   => '/engagement-model/',
                    'style' => 'ghost',
                ],

                'trust' => [
                    'label' => 'Trusted by teams in the US, UK and GCC',
                    'items' => [
                        ['label' => '10+ years in custom software',   'icon' => null],
                        ['label' => 'Products used in 15+ countries', 'icon' => null],
                        ['label' => 'Founders and CTOs as core clients', 'icon' => null],
                    ],
                ],
                'meta' => [
                    'theme' => 'light-hero',
                ],
            ],

            // S2 – About QalbIT for Virginia businesses
            'about' => [
                'id'      => 'location-about',
                'section' => 'about',
                'eyebrow' => 'About QalbIT',
                'title'   => 'A remote custom software partner for Virginia startups and enterprises',
                'intro'   => 'QalbIT is a product-driven engineering studio working with Virginia founders, CTOs and business leaders to plan, build and maintain digital products. The goal is to plug in as your long-term delivery arm rather than a one-off outsourcing vendor.',

                'highlights' => [
                    [
                        'label'       => '12+ years building products',
                        'description' => 'Experience shipping complex SaaS, marketplaces, internal tools and ERP-style systems for global customers across multiple industries.',
                    ],
                    [
                        'label'       => 'US East Coast friendly collaboration',
                        'description' => 'Overlap with Eastern time for planning, reviews and critical releases, backed by structured rituals and clear written communication.',
                    ],
                    [
                        'label'       => 'Full-stack product teams',
                        'description' => 'Design, frontend, backend, mobile and QA aligned to your roadmap instead of isolated freelancers.',
                    ],
                    [
                        'label'       => 'Security and compliance aware',
                        'description' => 'Secure architectures, role-based access and stable deployment pipelines from day one, ready for audits as you grow in Virginia and beyond.',
                    ],
                ],
            ],

            // S3 – Custom software services for Virginia
            'services' => [
                'id'      => 'location-services',
                'section' => 'services',
                'eyebrow' => 'Services',
                'title'   => 'Custom software development services for Virginia businesses',
                'intro'   => 'Whether you are validating a new product, modernising a legacy system or scaling an existing platform, QalbIT brings the right mix of architecture, engineering and product thinking for Virginia teams.',

                'items' => [
                    [
                        'key'         => 'custom-software',
                        'label'       => 'Custom Software Development',
                        'description' => 'End-to-end web application development tailored to your workflows, roles and security requirements.',
                        'url'         => '/services/custom-software-development/',
                    ],
                    [
                        'key'         => 'saas-mvp',
                        'label'       => 'SaaS and MVP Development',
                        'description' => 'Design and deliver investor-ready MVPs and SaaS platforms with a focus on fast learning and clean architecture.',
                        'url'         => '/start-up-mvp/',
                    ],
                    [
                        'key'         => 'mobile-apps',
                        'label'       => 'Mobile App Development',
                        'description' => 'Flutter and cross-platform mobile apps that integrate with your existing systems and analytics.',
                        'url'         => '/services/mobile-app-development/',
                    ],
                    [
                        'key'         => 'api-backend',
                        'label'       => 'API and Backend Engineering',
                        'description' => 'Secure APIs, integrations and background jobs running on modern PHP and Node stacks and cloud infrastructure.',
                        'url'         => '/services/api-development/',
                    ],
                    [
                        'key'         => 'cloud-devops',
                        'label'       => 'Cloud and DevOps',
                        'description' => 'CI/CD pipelines, environment strategy and observability so releases to your Virginia customers stay stable.',
                        'url'         => '/services/cloud-based-solutions/',
                    ],
                    [
                        'key'         => 'dedicated-team',
                        'label'       => 'Dedicated Product Team',
                        'description' => 'Scale with a stable remote squad that works like an extension of your Virginia product and engineering team.',
                        'url'         => '/engagement-models/',
                    ],
                ],
            ],

            // S4 – Why QalbIT for custom software in Virginia
            'why' => [
                'id'      => 'location-why',
                'section' => 'why',
                'eyebrow' => 'Why QalbIT',
                'title'   => 'Why Virginia teams choose QalbIT as their custom software partner',
                'intro'   => 'Virginia products operate in a competitive environment that spans technology, public sector, education and logistics. QalbIT is set up to handle that mix with structured delivery, senior oversight and honest communication.',

                'reasons' => [
                    [
                        'label'       => 'Remote, but in sync with Eastern time',
                        'description' => 'Overlap with ET working hours for planning, reviews and critical releases, while leveraging an offshore team for faster throughput.',
                        'bullets'     => [
                            'Regular stand-ups and demos in Virginia friendly hours.',
                            'Asynchronous updates, Loom walkthroughs and clear written documentation.',
                        ],
                    ],
                    [
                        'label'       => 'Product mindset, not just billable hours',
                        'description' => 'The focus is on outcomes, activation metrics and technical debt instead of simply delivering tickets.',
                        'bullets'     => [
                            'Support for scoping, sequencing and launch strategy.',
                            'Balance between speed and long-term maintainability.',
                        ],
                    ],
                    [
                        'label'       => 'Transparent, predictable delivery',
                        'description' => 'You see the roadmap, current work and risks at all times through simple project rituals and tools.',
                        'bullets'     => [
                            'Structured sprints with clear acceptance criteria.',
                            'Access to staging environments and progress dashboards.',
                        ],
                    ],
                    [
                        'label'       => 'Secure, scalable foundations',
                        'description' => 'Architectures ready for compliance, audits and growth as you scale in Virginia and across the wider US.',
                        'bullets'     => [
                            'Role-based access, audit trails and logging by default.',
                            'Cloud-native deployments with backups and monitoring.',
                        ],
                    ],
                ],
            ],

            // S5 – Our product development process (summary)
            'process' => [
                'id'      => 'location-process',
                'section' => 'process',
                'eyebrow' => 'Process',
                'title'   => 'A proven product development process for Virginia businesses',
                'intro'   => 'QalbIT relies on a clear, battle-tested delivery process that reduces risk, keeps stakeholders aligned and protects Virginia launches from surprise delays.',

                'steps' => [
                    [
                        'label'       => 'Discover and define',
                        'description' => 'Align on goals, constraints, success metrics and scope before anyone writes code.',
                        'related'     => 'start-up-mvp',
                    ],
                    [
                        'label'       => 'Design and validate',
                        'description' => 'User flows, wireframes and UI prototypes so Virginia stakeholders can react early and give feedback.',
                        'related'     => 'start-up-mvp',
                    ],
                    [
                        'label'       => 'Build iteratively',
                        'description' => 'Ship in small, reviewable increments using modern practices across frontend, backend and mobile.',
                        'related'     => 'product-scaling',
                    ],
                    [
                        'label'       => 'Launch and stabilise',
                        'description' => 'Roll out to customers, stabilise production and capture the right metrics.',
                        'related'     => 'product-scaling',
                    ],
                    [
                        'label'       => 'Improve and extend',
                        'description' => 'Ongoing iterations, new modules and performance work once the first launch is live.',
                        'related'     => 'digital-transformation',
                    ],
                ],

                'links' => [
                    [
                        'label' => 'See our full product development approach',
                        'url'   => '/start-up-mvp/',
                    ],
                    [
                        'label' => 'How we support scaling products',
                        'url'   => '/product-scaling/',
                    ],
                ],
            ],

            // S6 – Engagement models for Virginia companies
            'engagements' => [
                'id'      => 'location-engagements',
                'section' => 'engagements',
                'eyebrow' => 'Engagement Models',
                'title'   => 'Flexible engagement options for Virginia teams',
                'intro'   => 'Choose an engagement style that fits your product stage, budget and internal capacity. You can always switch as your needs evolve.',

                'models' => [
                    [
                        'key'         => 'fixed-scope',
                        'label'       => 'Fixed scope project',
                        'description' => 'Well-defined projects with clear timelines, deliverables and pricing – ideal for MVPs and redesigns.',
                        'best_for'    => 'Founders and teams with a clear scope and deadline.',
                        'link'        => '/start-up-mvp/',
                    ],
                    [
                        'key'         => 'dedicated-squad',
                        'label'       => 'Dedicated product squad',
                        'description' => 'A cross-functional team (PM, designers, engineers) that works as an extension of your Virginia product organisation.',
                        'best_for'    => 'Scale-ups and enterprises with a continuous roadmap.',
                        'link'        => '/engagement-models/',
                    ],
                    [
                        'key'         => 'continuous-support',
                        'label'       => 'Continuous improvement and support',
                        'description' => 'Lightweight retainer to handle maintenance, small improvements and on-call fixes for your live products.',
                        'best_for'    => 'Teams that want predictable care for existing platforms.',
                        'link'        => '/digital-transformation/',
                    ],
                ],
            ],

            // S7 – Tech stack and capabilities
            'tech' => [
                'id'      => 'location-tech',
                'section' => 'tech',
                'eyebrow' => 'Technologies',
                'title'   => 'Modern tech stack for Virginia software projects',
                'intro'   => 'QalbIT combines modern frontend frameworks, robust backend platforms and cloud-native infrastructure to build software that can grow with your Virginia business.',

                'categories' => [
                    [
                        'label'  => 'Frontend',
                        'items'  => ['React', 'Next.js', 'Vue.js', 'Tailwind CSS'],
                    ],
                    [
                        'label'  => 'Backend and APIs',
                        'items'  => ['Node.js', 'NestJS', 'PHP', 'Laravel'],
                    ],
                    [
                        'label'  => 'Mobile',
                        'items'  => ['Flutter', 'React Native'],
                    ],
                    [
                        'label'  => 'Cloud and Databases',
                        'items'  => ['AWS', 'GCP', 'PostgreSQL', 'MySQL', 'Redis'],
                    ],
                ],

                'links' => [
                    [
                        'label' => 'Explore our full tech stack',
                        'url'   => '/technologies/',
                    ],
                ],
            ],

            // S8 – Selected work and social proof
            'proof' => [
                'id'      => 'location-proof',
                'section' => 'proof',
                'eyebrow' => 'Case Studies',
                'title'   => 'Real products shipped with QalbIT',
                'intro'   => 'Here are a few examples of platforms and tools QalbIT has helped design, build and scale. More detailed case studies are available on request.',

                'cases' => [
                    [
                        'label'       => 'B2B SaaS platform',
                        'industry'    => 'SaaS / B2B',
                        'region'      => 'North America and Europe',
                        'headline'    => 'Helped a SaaS team refactor and scale their product used by enterprise clients.',
                        'result'      => 'Improved stability, enabled new modules and reduced deployment friction.',
                        'url'         => '/portfolio/',
                    ],
                    [
                        'label'       => 'Operations and logistics tools',
                        'industry'    => 'Logistics / Operations',
                        'region'      => 'Global',
                        'headline'    => 'Built internal tools to digitise paper-heavy workflows and approvals.',
                        'result'      => 'Around 40% faster processing and better visibility for operations teams.',
                        'url'         => '/portfolio/',
                    ],
                ],

                'testimonials' => [
                    [
                        'quote'  => 'QalbIT felt like an extension of our own team – responsive, structured and honest about trade-offs.',
                        'name'   => 'Founder and CEO',
                        'title'  => 'B2B SaaS company',
                        'region' => 'US-based',
                    ],
                ],
            ],

            // S10 – Final CTA band
            'final_cta' => [
                'id'      => 'location-final-cta',
                'section' => 'final_cta',
                'eyebrow' => 'Start your project',
                'title'   => 'Discuss your custom software project in Virginia',
                'body'    => 'Share a bit about your product, timelines and goals, and QalbIT will come back with next steps and a suggested engagement model within one business day.',

                'primary_cta' => [
                    'label' => 'Request a free consultation',
                    'url'   => '/contact-us/',
                ],
                'secondary_cta' => [
                    'label' => 'Book a call on Calendly',
                    'url'   => 'https://calendly.com/abidhusain-qalbit/discuss-project',
                ],

                'meta' => [
                    'show_form' => true,
                    'theme'     => 'light',
                ],
            ],
        ],
    ],

    // -------------------------------------------------
    // Texas, USA
    // -------------------------------------------------
    'texas' => [
        // Core routing / identification
        'slug'         => '/usa/texas/',
        'template'     => 'pages/locations/show',
        'country_key'  => 'usa',
        'country_name' => 'United States',
        'state_key'    => 'texas',

        'name'       => 'Texas, USA',
        'short_name' => 'Texas',
        'enabled'    => true,
        'order'      => 40,

        // Backward-compatible SEO fields
        'meta_title' => 'Custom Software Development in Texas, USA – QalbIT',
        'meta_description' => 'QalbIT provides custom software, web and mobile app development services to startups and enterprises across Texas, USA – from Austin and Dallas to Houston and San Antonio. Partner with a dedicated remote team to design, build and scale your digital products.',
        'headline' => 'Custom Software Development in Texas, USA',
        'short_description' => 'End-to-end web, mobile and cloud solutions for Texas startups, scale-ups and enterprises.',

        // Optional – used if you still need it somewhere else
        'focus_services' => [
            'Custom Software Development',
            'Web Development',
            'Mobile App Development',
            'SaaS Product Development',
            'Cloud-Based Solutions',
        ],

        // Normalised SEO block for the new template
        'faq_key'      => 'faq_location_usa_texas',
        'faq_title'    => 'Frequently asked questions from Texas teams',
        'faq_subtitle' => 'Answers to common questions from founders and product leaders across Texas. You can always reach out if you do not see your question here.',
        'faq_bullets' => [
            '✓ Built for fast-moving Texas startups and enterprises that value speed with stability.',
            '✓ Engagement models that work for both fixed MVPs and longer product roadmaps.',
            '✓ Transparent ownership structure so your Texas company controls the code and IP.',
        ],

        'seo' => [
            'h1'               => 'Custom Software Development Company for Texas Businesses',
            'meta_title'       => 'Custom Software Development in Texas, USA – QalbIT',
            'meta_description' => 'QalbIT is a remote-first custom software development company helping Texas businesses build SaaS products, web applications and mobile apps with predictable delivery and product thinking.',
            'canonical'        => '/usa/texas/',
            'faq_key'          => 'location_usa_texas',
            'breadcrumbs'      => [
                ['label' => 'Home',        'url' => '/'],
                ['label' => 'Texas, USA',  'url' => '/usa/texas/'],
            ],
        ],

        // High-level summary
        'summary' => [
            'eyebrow' => 'Custom Software Development in Texas, USA',
            'title'   => 'Remote custom software partner for Texas startups and enterprises',
            'intro'   => 'QalbIT helps Texas product teams and founders in Austin, Dallas, Houston and beyond design, build and scale SaaS products, internal tools and mobile apps with a dedicated remote engineering squad that fits the roadmap, budget and timelines.',
        ],

        // -------------------------------------------------
        // Sections S1–S10
        // -------------------------------------------------

        'sections' => [

            // S1 – Location hero & primary CTA
            'hero' => [
                'id'       => 'location-hero',
                'section'  => 'hero',
                'eyebrow'  => 'Custom Software Development in Texas, USA',
                'title'    => 'Custom Software Development Company for Texas Businesses',
                'subtitle' => 'Build and scale SaaS, web and mobile products with a senior remote team that understands the expectations of Texas technology, energy, logistics and services businesses.',
                'body'     => 'From early-stage MVPs in Austin to internal tools for Dallas, Houston and San Antonio based teams, QalbIT partners with Texas founders and product leaders to design, build and iterate software that moves the needle for customers and stakeholders.',

                'primary_cta' => [
                    'label' => 'Schedule a discovery call',
                    'url'   => '/contact-us/',
                    'style' => 'primary',
                ],
                'secondary_cta' => [
                    'label' => 'See how we work',
                    'url'   => '/engagement-model/',
                    'style' => 'ghost',
                ],

                'trust' => [
                    'label' => 'Trusted by teams in the US, UK and GCC',
                    'items' => [
                        ['label' => '10+ years in custom software',          'icon' => null],
                        ['label' => 'Products used in 15+ countries',        'icon' => null],
                        ['label' => 'Founders and CTOs as core clients',     'icon' => null],
                    ],
                ],
                'meta' => [
                    'theme' => 'light-hero',
                ],
            ],

            // S2 – About QalbIT for Texas businesses
            'about' => [
                'id'      => 'location-about',
                'section' => 'about',
                'eyebrow' => 'About QalbIT',
                'title'   => 'A remote custom software partner for Texas startups and enterprises',
                'intro'   => 'QalbIT is a product-driven engineering studio working with Texas founders, CTOs and business leaders to plan, build and maintain digital products. The focus is on becoming a long-term delivery arm rather than a one-off outsourcing vendor.',

                'highlights' => [
                    [
                        'label'       => '12+ years building products',
                        'description' => 'Experience shipping complex SaaS, marketplaces, internal tools and ERP-style systems for global customers across multiple industries.',
                    ],
                    [
                        'label'       => 'US Central time friendly collaboration',
                        'description' => 'Overlap with Central time for planning, reviews and critical releases, with structured rituals and clear written communication.',
                    ],
                    [
                        'label'       => 'Full-stack product teams',
                        'description' => 'Design, frontend, backend, mobile and QA aligned to the roadmap instead of isolated freelancers.',
                    ],
                    [
                        'label'       => 'Security and compliance aware',
                        'description' => 'Secure architectures, role-based access and stable deployment pipelines from day one, ready for audits as the organisation grows.',
                    ],
                ],
            ],

            // S3 – Custom software services for Texas
            'services' => [
                'id'      => 'location-services',
                'section' => 'services',
                'eyebrow' => 'Services',
                'title'   => 'Custom software development services for Texas businesses',
                'intro'   => 'Whether validating a new product, modernising a legacy system or scaling an existing platform, QalbIT brings the right mix of architecture, engineering and product thinking for Texas teams.',

                'items' => [
                    [
                        'key'         => 'custom-software',
                        'label'       => 'Custom Software Development',
                        'description' => 'End-to-end web application development tailored to specific workflows, roles and security requirements.',
                        'url'         => '/services/custom-software-development/',
                    ],
                    [
                        'key'         => 'saas-mvp',
                        'label'       => 'SaaS and MVP Development',
                        'description' => 'Design and deliver investor-ready MVPs and SaaS platforms with a focus on fast learning and clean architecture.',
                        'url'         => '/start-up-mvp/',
                    ],
                    [
                        'key'         => 'mobile-apps',
                        'label'       => 'Mobile App Development',
                        'description' => 'Flutter and cross-platform mobile apps that integrate with existing systems and analytics.',
                        'url'         => '/services/mobile-app-development/',
                    ],
                    [
                        'key'         => 'api-backend',
                        'label'       => 'API and Backend Engineering',
                        'description' => 'Secure APIs, integrations and background jobs running on modern PHP and Node stacks and cloud infrastructure.',
                        'url'         => '/services/api-development/',
                    ],
                    [
                        'key'         => 'cloud-devops',
                        'label'       => 'Cloud and DevOps',
                        'description' => 'CI/CD pipelines, environment strategy and observability so releases to Texas customers stay stable.',
                        'url'         => '/services/cloud-based-solutions/',
                    ],
                    [
                        'key'         => 'dedicated-team',
                        'label'       => 'Dedicated Product Team',
                        'description' => 'Scale with a stable remote squad that works like an extension of the Texas product and engineering team.',
                        'url'         => '/engagement-models/',
                    ],
                ],
            ],

            // S4 – Why QalbIT for custom software in Texas
            'why' => [
                'id'      => 'location-why',
                'section' => 'why',
                'eyebrow' => 'Why QalbIT',
                'title'   => 'Why Texas teams choose QalbIT as their custom software partner',
                'intro'   => 'Texas companies operate in fast-moving markets across technology, energy, logistics, healthcare and more. QalbIT is set up to support that pace with structured delivery, senior oversight and honest communication.',

                'reasons' => [
                    [
                        'label'       => 'Remote, but in sync with Central time',
                        'description' => 'Overlap with CT working hours for planning, reviews and critical releases, while leveraging an offshore team for faster throughput.',
                        'bullets'     => [
                            'Regular stand-ups and demos in Texas friendly hours.',
                            'Asynchronous updates, Loom walkthroughs and clear written documentation.',
                        ],
                    ],
                    [
                        'label'       => 'Product mindset, not just billable hours',
                        'description' => 'A focus on outcomes, activation metrics and technical debt instead of simply delivering tickets.',
                        'bullets'     => [
                            'Support with scoping, sequencing and launch strategy.',
                            'Balance between speed and long-term maintainability.',
                        ],
                    ],
                    [
                        'label'       => 'Transparent, predictable delivery',
                        'description' => 'Visibility into the roadmap, current work and risks at all times through simple project rituals and tools.',
                        'bullets'     => [
                            'Structured sprints with clear acceptance criteria.',
                            'Access to staging environments and progress dashboards.',
                        ],
                    ],
                    [
                        'label'       => 'Secure, scalable foundations',
                        'description' => 'Architectures ready for compliance, audits and growth as the product scales in Texas and across the wider US.',
                        'bullets'     => [
                            'Role-based access, audit trails and logging by default.',
                            'Cloud-native deployments with backups and monitoring.',
                        ],
                    ],
                ],
            ],

            // S5 – Our product development process (summary)
            'process' => [
                'id'      => 'location-process',
                'section' => 'process',
                'eyebrow' => 'Process',
                'title'   => 'A proven product development process for Texas businesses',
                'intro'   => 'QalbIT relies on a clear, battle-tested delivery process that reduces risk, keeps stakeholders aligned and protects Texas launches from surprise delays.',

                'steps' => [
                    [
                        'label'       => 'Discover and define',
                        'description' => 'Align on goals, constraints, success metrics and scope before anyone writes code.',
                        'related'     => 'start-up-mvp',
                    ],
                    [
                        'label'       => 'Design and validate',
                        'description' => 'User flows, wireframes and UI prototypes so Texas stakeholders can react early and provide feedback.',
                        'related'     => 'start-up-mvp',
                    ],
                    [
                        'label'       => 'Build iteratively',
                        'description' => 'Ship in small, reviewable increments using modern practices across frontend, backend and mobile.',
                        'related'     => 'product-scaling',
                    ],
                    [
                        'label'       => 'Launch and stabilise',
                        'description' => 'Roll out to customers, stabilise production and capture the right metrics.',
                        'related'     => 'product-scaling',
                    ],
                    [
                        'label'       => 'Improve and extend',
                        'description' => 'Ongoing iterations, new modules and performance work once the first launch is live.',
                        'related'     => 'digital-transformation',
                    ],
                ],

                'links' => [
                    [
                        'label' => 'See our full product development approach',
                        'url'   => '/start-up-mvp/',
                    ],
                    [
                        'label' => 'How we support scaling products',
                        'url'   => '/product-scaling/',
                    ],
                ],
            ],

            // S6 – Engagement models for Texas companies
            'engagements' => [
                'id'      => 'location-engagements',
                'section' => 'engagements',
                'eyebrow' => 'Engagement Models',
                'title'   => 'Flexible engagement options for Texas teams',
                'intro'   => 'Choose an engagement style that fits the product stage, budget and internal capacity. It is always possible to adjust as needs evolve.',

                'models' => [
                    [
                        'key'         => 'fixed-scope',
                        'label'       => 'Fixed scope project',
                        'description' => 'Well-defined projects with clear timelines, deliverables and pricing – ideal for MVPs and redesigns.',
                        'best_for'    => 'Founders and teams with a clear scope and deadline.',
                        'link'        => '/start-up-mvp/',
                    ],
                    [
                        'key'         => 'dedicated-squad',
                        'label'       => 'Dedicated product squad',
                        'description' => 'A cross-functional team (PM, designers, engineers) that works as an extension of the Texas product organisation.',
                        'best_for'    => 'Scale-ups and enterprises with a continuous roadmap.',
                        'link'        => '/engagement-models/',
                    ],
                    [
                        'key'         => 'continuous-support',
                        'label'       => 'Continuous improvement and support',
                        'description' => 'Lightweight retainer to handle maintenance, small improvements and on-call fixes for live products.',
                        'best_for'    => 'Teams that want predictable care for existing platforms.',
                        'link'        => '/digital-transformation/',
                    ],
                ],
            ],

            // S7 – Tech stack & capabilities
            'tech' => [
                'id'      => 'location-tech',
                'section' => 'tech',
                'eyebrow' => 'Technologies',
                'title'   => 'Modern tech stack for Texas software projects',
                'intro'   => 'QalbIT combines modern frontend frameworks, robust backend platforms and cloud-native infrastructure to build software that can grow with Texas businesses.',

                'categories' => [
                    [
                        'label'  => 'Frontend',
                        'items'  => ['React', 'Next.js', 'Vue.js', 'Tailwind CSS'],
                    ],
                    [
                        'label'  => 'Backend and APIs',
                        'items'  => ['Node.js', 'NestJS', 'PHP', 'Laravel'],
                    ],
                    [
                        'label'  => 'Mobile',
                        'items'  => ['Flutter', 'React Native'],
                    ],
                    [
                        'label'  => 'Cloud and Databases',
                        'items'  => ['AWS', 'GCP', 'PostgreSQL', 'MySQL', 'Redis'],
                    ],
                ],

                'links' => [
                    [
                        'label' => 'Explore the full tech stack',
                        'url'   => '/technologies/',
                    ],
                ],
            ],

            // S8 – Selected work & social proof
            'proof' => [
                'id'      => 'location-proof',
                'section' => 'proof',
                'eyebrow' => 'Case Studies',
                'title'   => 'Real products shipped with QalbIT',
                'intro'   => 'These examples show the kind of platforms and tools QalbIT has helped design, build and scale. More detailed case studies are available on request.',

                'cases' => [
                    [
                        'label'       => 'B2B SaaS platform',
                        'industry'    => 'SaaS / B2B',
                        'region'      => 'North America and Europe',
                        'headline'    => 'Helped a SaaS team refactor and scale a product used by enterprise clients.',
                        'result'      => 'Improved stability, enabled new modules and reduced deployment friction.',
                        'url'         => '/portfolio/',
                    ],
                    [
                        'label'       => 'Operations and logistics tools',
                        'industry'    => 'Logistics / Operations',
                        'region'      => 'Global',
                        'headline'    => 'Built internal tools to digitise paper-heavy workflows and approvals.',
                        'result'      => 'Around 40% faster processing and better visibility for operations teams.',
                        'url'         => '/portfolio/',
                    ],
                ],

                'testimonials' => [
                    [
                        'quote'  => 'QalbIT felt like an extension of our own team – responsive, structured and honest about trade-offs.',
                        'name'   => 'Founder and CEO',
                        'title'  => 'B2B SaaS company',
                        'region' => 'US-based',
                    ],
                ],
            ],

            // S10 – Final CTA band
            'final_cta' => [
                'id'      => 'location-final-cta',
                'section' => 'final_cta',
                'eyebrow' => 'Start your project',
                'title'   => 'Discuss your custom software project in Texas',
                'body'    => 'Share some details about the product, timelines and goals, and QalbIT will respond with next steps and a suggested engagement model within one business day.',

                'primary_cta' => [
                    'label' => 'Request a free consultation',
                    'url'   => '/contact-us/',
                ],
                'secondary_cta' => [
                    'label' => 'Book a call on Calendly',
                    'url'   => 'https://calendly.com/abidhusain-qalbit/discuss-project',
                ],

                'meta' => [
                    'show_form' => true,
                    'theme'     => 'light',
                ],
            ],
        ],
    ],

    // -------------------------------------------------
    // Pennsylvania, USA
    // -------------------------------------------------
    'pennsylvania' => [
        // Core routing / identification
        'slug'         => '/usa/pennsylvania/',
        'template'     => 'pages/locations/show',
        'country_key'  => 'usa',
        'country_name' => 'United States',
        'state_key'    => 'pennsylvania',

        'name'       => 'Pennsylvania, USA',
        'short_name' => 'Pennsylvania',
        'enabled'    => true,
        'order'      => 50,

        // Backward-compatible SEO fields
        'meta_title' => 'Custom Software Development in Pennsylvania, USA – QalbIT',
        'meta_description' => 'QalbIT provides custom software, web and mobile app development services to startups and enterprises across Pennsylvania, USA – from Philadelphia and Pittsburgh to Harrisburg and beyond. Partner with a dedicated remote team to design, build and scale digital products.',
        'headline' => 'Custom Software Development in Pennsylvania, USA',
        'short_description' => 'End-to-end web, mobile and cloud solutions for Pennsylvania startups, scale-ups and enterprises.',

        'focus_services' => [
            'Custom Software Development',
            'Web Development',
            'Mobile App Development',
            'SaaS Product Development',
            'Cloud-Based Solutions',
        ],

        'faq_key'      => 'faq_location_usa_pennsylvania',
        'faq_title'    => 'Frequently asked questions from Pennsylvania teams',
        'faq_subtitle' => 'Answers to common questions from founders and product leaders across Pennsylvania. It is always possible to reach out directly if a question is not covered here.',
        'faq_bullets' => [
            '✓ Eastern Time alignment for stakeholders across Pennsylvania and the wider region.',
            '✓ Supports both greenfield builds and careful evolution of existing platforms.',
            '✓ Contracts and delivery rituals optimised for clarity, governance and audit trails.',
        ],

        'seo' => [
            'h1'               => 'Custom Software Development Company for Pennsylvania Businesses',
            'meta_title'       => 'Custom Software Development in Pennsylvania, USA – QalbIT',
            'meta_description' => 'QalbIT is a remote-first custom software development company helping Pennsylvania businesses build SaaS products, web applications and mobile apps with predictable delivery and product thinking.',
            'canonical'        => '/usa/pennsylvania/',
            'faq_key'          => 'location_usa_pennsylvania',
            'breadcrumbs'      => [
                ['label' => 'Home',               'url' => '/'],
                ['label' => 'Pennsylvania, USA',  'url' => '/usa/pennsylvania/'],
            ],
        ],

        'summary' => [
            'eyebrow' => 'Custom Software Development in Pennsylvania, USA',
            'title'   => 'Remote custom software partner for Pennsylvania startups and enterprises',
            'intro'   => 'QalbIT helps Pennsylvania product teams and founders in Philadelphia, Pittsburgh and across the state design, build and scale SaaS products, internal tools and mobile apps with a dedicated remote engineering squad.',
        ],

        'sections' => [

            // S1 – Hero
            'hero' => [
                'id'       => 'location-hero',
                'section'  => 'hero',
                'eyebrow'  => 'Custom Software Development in Pennsylvania, USA',
                'title'    => 'Custom Software Development Company for Pennsylvania Businesses',
                'subtitle' => 'Build and scale SaaS, web and mobile products with a senior remote team that understands the needs of Pennsylvania technology, healthcare, manufacturing and services organisations.',
                'body'     => 'From early-stage MVPs in Philadelphia to internal tools for Pittsburgh and Harrisburg based teams, QalbIT partners with Pennsylvania founders and product leaders to design, build and iterate software that supports customers and internal operations.',

                'primary_cta' => [
                    'label' => 'Schedule a discovery call',
                    'url'   => '/contact-us/',
                    'style' => 'primary',
                ],
                'secondary_cta' => [
                    'label' => 'See how we work',
                    'url'   => '/engagement-model/',
                    'style' => 'ghost',
                ],

                'trust' => [
                    'label' => 'Trusted by teams in the US, UK and GCC',
                    'items' => [
                        ['label' => '10+ years in custom software',          'icon' => null],
                        ['label' => 'Products used in 15+ countries',        'icon' => null],
                        ['label' => 'Founders and CTOs as core clients',     'icon' => null],
                    ],
                ],
                'meta' => [
                    'theme' => 'light-hero',
                ],
            ],

            // S2 – About
            'about' => [
                'id'      => 'location-about',
                'section' => 'about',
                'eyebrow' => 'About QalbIT',
                'title'   => 'A remote custom software partner for Pennsylvania startups and enterprises',
                'intro'   => 'QalbIT is a product-driven engineering studio working with Pennsylvania founders, CTOs and business leaders to plan, build and maintain digital products. The engagement is structured as a long-term partnership instead of short, transactional projects.',

                'highlights' => [
                    [
                        'label'       => '12+ years building products',
                        'description' => 'Experience shipping complex SaaS, marketplaces, internal tools and ERP-style systems across multiple industries.',
                    ],
                    [
                        'label'       => 'US East Coast friendly collaboration',
                        'description' => 'Overlap with Eastern time for planning, reviews and critical releases, with structured rituals and clear written communication.',
                    ],
                    [
                        'label'       => 'Full-stack product teams',
                        'description' => 'Design, frontend, backend, mobile and QA aligned to the roadmap rather than isolated freelancers.',
                    ],
                    [
                        'label'       => 'Security and compliance aware',
                        'description' => 'Secure architectures, role-based access and stable deployment pipelines from day one.',
                    ],
                ],
            ],

            // S3 – Services
            'services' => [
                'id'      => 'location-services',
                'section' => 'services',
                'eyebrow' => 'Services',
                'title'   => 'Custom software development services for Pennsylvania businesses',
                'intro'   => 'Whether validating a new product, modernising legacy systems or scaling an existing platform, QalbIT brings architecture, engineering and product thinking tailored for Pennsylvania teams.',

                'items' => [
                    [
                        'key'         => 'custom-software',
                        'label'       => 'Custom Software Development',
                        'description' => 'End-to-end web application development tailored to specific workflows, roles and security requirements.',
                        'url'         => '/services/custom-software-development/',
                    ],
                    [
                        'key'         => 'saas-mvp',
                        'label'       => 'SaaS and MVP Development',
                        'description' => 'Design and deliver investor-ready MVPs and SaaS platforms, with a focus on validating ideas quickly.',
                        'url'         => '/start-up-mvp/',
                    ],
                    [
                        'key'         => 'mobile-apps',
                        'label'       => 'Mobile App Development',
                        'description' => 'Flutter and cross-platform mobile apps integrated with existing systems and analytics.',
                        'url'         => '/services/mobile-app-development/',
                    ],
                    [
                        'key'         => 'api-backend',
                        'label'       => 'API and Backend Engineering',
                        'description' => 'Secure APIs, integrations and background jobs running on modern PHP and Node stacks and cloud infrastructure.',
                        'url'         => '/services/api-development/',
                    ],
                    [
                        'key'         => 'cloud-devops',
                        'label'       => 'Cloud and DevOps',
                        'description' => 'CI/CD pipelines, environment strategy and observability so releases to Pennsylvania customers remain stable.',
                        'url'         => '/services/cloud-based-solutions/',
                    ],
                    [
                        'key'         => 'dedicated-team',
                        'label'       => 'Dedicated Product Team',
                        'description' => 'A stable remote squad that works like an extension of the Pennsylvania product and engineering team.',
                        'url'         => '/engagement-models/',
                    ],
                ],
            ],

            // S4 – Why QalbIT
            'why' => [
                'id'      => 'location-why',
                'section' => 'why',
                'eyebrow' => 'Why QalbIT',
                'title'   => 'Why Pennsylvania teams choose QalbIT as their custom software partner',
                'intro'   => 'Pennsylvania organisations span healthcare, education, manufacturing, logistics and professional services. QalbIT is structured to support this range with clear delivery practices and senior oversight.',

                'reasons' => [
                    [
                        'label'       => 'Remote, but in sync with Eastern time',
                        'description' => 'Overlap with ET working hours for planning, reviews and critical releases, while using an offshore team to maintain throughput.',
                        'bullets'     => [
                            'Regular stand-ups and demos in Pennsylvania friendly hours.',
                            'Asynchronous updates, Loom walkthroughs and clear documentation.',
                        ],
                    ],
                    [
                        'label'       => 'Product mindset, not just billable hours',
                        'description' => 'Focus on outcomes, activation metrics and technical debt instead of only closing tickets.',
                        'bullets'     => [
                            'Support for scoping, sequencing and launch strategy.',
                            'Balance speed with long-term maintainability.',
                        ],
                    ],
                    [
                        'label'       => 'Transparent, predictable delivery',
                        'description' => 'Roadmap, current work and risks stay visible at all times through simple project rituals and tools.',
                        'bullets'     => [
                            'Structured sprints with clear acceptance criteria.',
                            'Access to staging environments and progress dashboards.',
                        ],
                    ],
                    [
                        'label'       => 'Secure, scalable foundations',
                        'description' => 'Architectures ready for compliance, audits and growth as the organisation scales in Pennsylvania and beyond.',
                        'bullets'     => [
                            'Role-based access, audit trails and logging by default.',
                            'Cloud-native deployments with backups and monitoring.',
                        ],
                    ],
                ],
            ],

            // S5 – Process
            'process' => [
                'id'      => 'location-process',
                'section' => 'process',
                'eyebrow' => 'Process',
                'title'   => 'A proven product development process for Pennsylvania businesses',
                'intro'   => 'QalbIT uses a structured delivery process that reduces risk, keeps stakeholders aligned and protects key releases.',

                'steps' => [
                    [
                        'label'       => 'Discover and define',
                        'description' => 'Align on goals, constraints, success metrics and scope before anyone writes code.',
                        'related'     => 'start-up-mvp',
                    ],
                    [
                        'label'       => 'Design and validate',
                        'description' => 'User flows, wireframes and UI prototypes so Pennsylvania stakeholders can react early and adjust priorities.',
                        'related'     => 'start-up-mvp',
                    ],
                    [
                        'label'       => 'Build iteratively',
                        'description' => 'Ship in small, reviewable increments using modern practices across frontend, backend and mobile.',
                        'related'     => 'product-scaling',
                    ],
                    [
                        'label'       => 'Launch and stabilise',
                        'description' => 'Roll out to customers, stabilise production and capture the right metrics.',
                        'related'     => 'product-scaling',
                    ],
                    [
                        'label'       => 'Improve and extend',
                        'description' => 'Ongoing iterations, new modules and performance work once the first launch is live.',
                        'related'     => 'digital-transformation',
                    ],
                ],

                'links' => [
                    [
                        'label' => 'See the full product development approach',
                        'url'   => '/start-up-mvp/',
                    ],
                    [
                        'label' => 'How QalbIT supports scaling products',
                        'url'   => '/product-scaling/',
                    ],
                ],
            ],

            // S6 – Engagements
            'engagements' => [
                'id'      => 'location-engagements',
                'section' => 'engagements',
                'eyebrow' => 'Engagement Models',
                'title'   => 'Flexible engagement options for Pennsylvania teams',
                'intro'   => 'Select an engagement model that fits the stage of the product, the budget and internal capacity. It is always possible to adjust as needs change.',

                'models' => [
                    [
                        'key'         => 'fixed-scope',
                        'label'       => 'Fixed scope project',
                        'description' => 'Well-defined projects with clear timelines, deliverables and pricing – well suited for MVPs and redesigns.',
                        'best_for'    => 'Founders and teams with a clear scope and deadline.',
                        'link'        => '/start-up-mvp/',
                    ],
                    [
                        'key'         => 'dedicated-squad',
                        'label'       => 'Dedicated product squad',
                        'description' => 'A cross-functional team (PM, designers, engineers) acting as an extension of the Pennsylvania product organisation.',
                        'best_for'    => 'Scale-ups and enterprises with a continuous roadmap.',
                        'link'        => '/engagement-models/',
                    ],
                    [
                        'key'         => 'continuous-support',
                        'label'       => 'Continuous improvement and support',
                        'description' => 'Lightweight retainer to handle maintenance, small improvements and on-call fixes.',
                        'best_for'    => 'Teams that need predictable care for existing platforms.',
                        'link'        => '/digital-transformation/',
                    ],
                ],
            ],

            // S7 – Tech
            'tech' => [
                'id'      => 'location-tech',
                'section' => 'tech',
                'eyebrow' => 'Technologies',
                'title'   => 'Modern tech stack for Pennsylvania software projects',
                'intro'   => 'QalbIT combines modern frontend frameworks, robust backend platforms and cloud-native infrastructure to build software that can grow with Pennsylvania organisations.',

                'categories' => [
                    [
                        'label'  => 'Frontend',
                        'items'  => ['React', 'Next.js', 'Vue.js', 'Tailwind CSS'],
                    ],
                    [
                        'label'  => 'Backend and APIs',
                        'items'  => ['Node.js', 'NestJS', 'PHP', 'Laravel'],
                    ],
                    [
                        'label'  => 'Mobile',
                        'items'  => ['Flutter', 'React Native'],
                    ],
                    [
                        'label'  => 'Cloud and Databases',
                        'items'  => ['AWS', 'GCP', 'PostgreSQL', 'MySQL', 'Redis'],
                    ],
                ],

                'links' => [
                    [
                        'label' => 'Explore the full tech stack',
                        'url'   => '/technologies/',
                    ],
                ],
            ],

            // S8 – Proof
            'proof' => [
                'id'      => 'location-proof',
                'section' => 'proof',
                'eyebrow' => 'Case Studies',
                'title'   => 'Real products shipped with QalbIT',
                'intro'   => 'These examples show the kind of platforms and tools QalbIT has helped design, build and scale. More detailed case studies can be shared during discussions.',

                'cases' => [
                    [
                        'label'       => 'B2B SaaS platform',
                        'industry'    => 'SaaS / B2B',
                        'region'      => 'North America and Europe',
                        'headline'    => 'Helped a SaaS team refactor and scale a product used by enterprise clients.',
                        'result'      => 'Improved stability, enabled new modules and reduced deployment friction.',
                        'url'         => '/portfolio/',
                    ],
                    [
                        'label'       => 'Operations and logistics tools',
                        'industry'    => 'Logistics / Operations',
                        'region'      => 'Global',
                        'headline'    => 'Built internal tools to digitise paper-heavy workflows and approvals.',
                        'result'      => 'Around 40% faster processing and better visibility for operations teams.',
                        'url'         => '/portfolio/',
                    ],
                ],

                'testimonials' => [
                    [
                        'quote'  => 'QalbIT integrated with our existing processes and provided a structured, transparent way of working.',
                        'name'   => 'Founder and CEO',
                        'title'  => 'B2B SaaS company',
                        'region' => 'US-based',
                    ],
                ],
            ],

            // S9 is FAQ – driven by faq_key; configured globally, not per-section here if you use global FAQs.

            // S10 – Final CTA
            'final_cta' => [
                'id'      => 'location-final-cta',
                'section' => 'final_cta',
                'eyebrow' => 'Start your project',
                'title'   => 'Discuss your custom software project in Pennsylvania',
                'body'    => 'Share details about the product, timelines and goals, and QalbIT will respond with next steps and a suggested engagement model within one business day.',

                'primary_cta' => [
                    'label' => 'Request a free consultation',
                    'url'   => '/contact-us/',
                ],
                'secondary_cta' => [
                    'label' => 'Book a call on Calendly',
                    'url'   => 'https://calendly.com/abidhusain-qalbit/discuss-project',
                ],

                'meta' => [
                    'show_form' => true,
                    'theme'     => 'light',
                ],
            ],
        ],
    ],

    // -------------------------------------------------
    // Ohio, USA
    // -------------------------------------------------
    'ohio' => [
        // Core routing / identification
        'slug'         => '/usa/ohio/',
        'template'     => 'pages/locations/show',
        'country_key'  => 'usa',
        'country_name' => 'United States',
        'state_key'    => 'ohio',

        'name'       => 'Ohio, USA',
        'short_name' => 'Ohio',
        'enabled'    => true,
        'order'      => 60,

        // Backward-compatible SEO fields
        'meta_title' => 'Custom Software Development in Ohio, USA – QalbIT',
        'meta_description' => 'QalbIT provides custom software, web and mobile app development services to startups and enterprises across Ohio, USA – from Columbus and Cincinnati to Cleveland and beyond. Partner with a dedicated remote team to design, build and scale digital products.',
        'headline' => 'Custom Software Development in Ohio, USA',
        'short_description' => 'End-to-end web, mobile and cloud solutions for Ohio startups, scale-ups and enterprises.',

        'focus_services' => [
            'Custom Software Development',
            'Web Development',
            'Mobile App Development',
            'SaaS Product Development',
            'Cloud-Based Solutions',
        ],

        'faq_key'      => 'faq_location_usa_ohio',
        'faq_title'    => 'Frequently asked questions from Ohio teams',
        'faq_subtitle' => 'Answers to common questions from founders and product leaders across Ohio. Further details can be shared during a call or email exchange.',
        'faq_bullets' => [
            '✓ Built to give Ohio stakeholders consistent visibility into roadmap and progress.',
            '✓ Flexible budgets and phasing so you can start small and scale as confidence grows.',
            '✓ IP and code ownership structured so your Ohio organisation remains in full control.',
        ],

        'seo' => [
            'h1'               => 'Custom Software Development Company for Ohio Businesses',
            'meta_title'       => 'Custom Software Development in Ohio, USA – QalbIT',
            'meta_description' => 'QalbIT is a remote-first custom software development company helping Ohio businesses build SaaS products, web applications and mobile apps with predictable delivery and product thinking.',
            'canonical'        => '/usa/ohio/',
            'faq_key'          => 'location_usa_ohio',
            'breadcrumbs'      => [
                ['label' => 'Home',        'url' => '/'],
                ['label' => 'Ohio, USA',   'url' => '/usa/ohio/'],
            ],
        ],

        'summary' => [
            'eyebrow' => 'Custom Software Development in Ohio, USA',
            'title'   => 'Remote custom software partner for Ohio startups and enterprises',
            'intro'   => 'QalbIT helps Ohio product teams and founders in Columbus, Cincinnati, Cleveland and beyond design, build and scale SaaS products, internal tools and mobile apps with a dedicated remote engineering squad.',
        ],

        'sections' => [

            // S1 – Hero
            'hero' => [
                'id'       => 'location-hero',
                'section'  => 'hero',
                'eyebrow'  => 'Custom Software Development in Ohio, USA',
                'title'    => 'Custom Software Development Company for Ohio Businesses',
                'subtitle' => 'Build and scale SaaS, web and mobile products with a senior remote team that supports Ohio technology, manufacturing, logistics and services organisations.',
                'body'     => 'From early-stage MVPs in Columbus to internal platforms for Cincinnati and Cleveland based teams, QalbIT partners with Ohio founders and product leaders to design, build and iterate software that supports customers and operations.',

                'primary_cta' => [
                    'label' => 'Schedule a discovery call',
                    'url'   => '/contact-us/',
                    'style' => 'primary',
                ],
                'secondary_cta' => [
                    'label' => 'See how we work',
                    'url'   => '/engagement-model/',
                    'style' => 'ghost',
                ],

                'trust' => [
                    'label' => 'Trusted by teams in the US, UK and GCC',
                    'items' => [
                        ['label' => '10+ years in custom software',          'icon' => null],
                        ['label' => 'Products used in 15+ countries',        'icon' => null],
                        ['label' => 'Founders and CTOs as core clients',     'icon' => null],
                    ],
                ],
                'meta' => [
                    'theme' => 'light-hero',
                ],
            ],

            // S2 – About
            'about' => [
                'id'      => 'location-about',
                'section' => 'about',
                'eyebrow' => 'About QalbIT',
                'title'   => 'A remote custom software partner for Ohio startups and enterprises',
                'intro'   => 'QalbIT is a product-driven engineering studio working with Ohio founders, CTOs and business leaders to plan, build and maintain digital products as a long-term technology partner.',

                'highlights' => [
                    [
                        'label'       => '12+ years building products',
                        'description' => 'Experience shipping complex SaaS, marketplaces, internal tools and ERP-style systems for global customers.',
                    ],
                    [
                        'label'       => 'US East time friendly collaboration',
                        'description' => 'Overlap with Eastern time for planning, reviews and critical releases, with structured rituals and clear written communication.',
                    ],
                    [
                        'label'       => 'Full-stack product teams',
                        'description' => 'Design, frontend, backend, mobile and QA resources aligned to the roadmap instead of isolated freelancers.',
                    ],
                    [
                        'label'       => 'Security and compliance aware',
                        'description' => 'Secure architectures, role-based access and stable deployment pipelines from day one.',
                    ],
                ],
            ],

            // S3 – Services
            'services' => [
                'id'      => 'location-services',
                'section' => 'services',
                'eyebrow' => 'Services',
                'title'   => 'Custom software development services for Ohio businesses',
                'intro'   => 'Whether launching a new product, modernising internal tools or scaling existing platforms, QalbIT brings architecture, engineering and product thinking for Ohio teams.',

                'items' => [
                    [
                        'key'         => 'custom-software',
                        'label'       => 'Custom Software Development',
                        'description' => 'End-to-end web application development tailored to specific workflows, roles and security requirements.',
                        'url'         => '/services/custom-software-development/',
                    ],
                    [
                        'key'         => 'saas-mvp',
                        'label'       => 'SaaS and MVP Development',
                        'description' => 'Design and deliver investor-ready MVPs and SaaS platforms with a focus on learning quickly from early users.',
                        'url'         => '/start-up-mvp/',
                    ],
                    [
                        'key'         => 'mobile-apps',
                        'label'       => 'Mobile App Development',
                        'description' => 'Flutter and cross-platform mobile apps that integrate with existing systems and analytics.',
                        'url'         => '/services/mobile-app-development/',
                    ],
                    [
                        'key'         => 'api-backend',
                        'label'       => 'API and Backend Engineering',
                        'description' => 'Secure APIs, integrations and background jobs running on modern PHP and Node stacks and cloud infrastructure.',
                        'url'         => '/services/api-development/',
                    ],
                    [
                        'key'         => 'cloud-devops',
                        'label'       => 'Cloud and DevOps',
                        'description' => 'CI/CD pipelines, environment strategy and observability so releases to Ohio customers remain stable.',
                        'url'         => '/services/cloud-based-solutions/',
                    ],
                    [
                        'key'         => 'dedicated-team',
                        'label'       => 'Dedicated Product Team',
                        'description' => 'A stable remote squad that works like an extension of the Ohio product and engineering team.',
                        'url'         => '/engagement-models/',
                    ],
                ],
            ],

            // S4 – Why QalbIT
            'why' => [
                'id'      => 'location-why',
                'section' => 'why',
                'eyebrow' => 'Why QalbIT',
                'title'   => 'Why Ohio teams choose QalbIT as their custom software partner',
                'intro'   => 'Ohio organisations span manufacturing, healthcare, logistics, fintech and professional services. QalbIT is designed to support this mix with structured delivery and a focus on long-term partnerships.',

                'reasons' => [
                    [
                        'label'       => 'Remote, but in sync with Eastern time',
                        'description' => 'Overlap with ET working hours for planning, reviews and critical releases, while using an offshore team to keep momentum.',
                        'bullets'     => [
                            'Regular stand-ups and demos in Ohio friendly hours.',
                            'Asynchronous updates, Loom walkthroughs and clear documentation.',
                        ],
                    ],
                    [
                        'label'       => 'Product mindset, not just billable hours',
                        'description' => 'Focus on outcomes, activation metrics and technical debt rather than only delivering tickets.',
                        'bullets'     => [
                            'Help with scoping, sequencing and launch strategy.',
                            'Balance between shipping speed and maintainability.',
                        ],
                    ],
                    [
                        'label'       => 'Transparent, predictable delivery',
                        'description' => 'Roadmap, current work and risks stay visible at all times through simple project rituals and tools.',
                        'bullets'     => [
                            'Structured sprints with clear acceptance criteria.',
                            'Access to staging environments and progress dashboards.',
                        ],
                    ],
                    [
                        'label'       => 'Secure, scalable foundations',
                        'description' => 'Architectures ready for compliance, audits and growth as Ohio organisations scale.',
                        'bullets'     => [
                            'Role-based access, audit trails and logging.',
                            'Cloud-native deployments with backups and monitoring.',
                        ],
                    ],
                ],
            ],

            // S5 – Process
            'process' => [
                'id'      => 'location-process',
                'section' => 'process',
                'eyebrow' => 'Process',
                'title'   => 'A proven product development process for Ohio businesses',
                'intro'   => 'QalbIT follows a structured delivery process that reduces risk, keeps stakeholders aligned and protects key launches.',

                'steps' => [
                    [
                        'label'       => 'Discover and define',
                        'description' => 'Align on goals, constraints, success metrics and scope before anyone writes code.',
                        'related'     => 'start-up-mvp',
                    ],
                    [
                        'label'       => 'Design and validate',
                        'description' => 'User flows, wireframes and UI prototypes so Ohio stakeholders can react early and refine priorities.',
                        'related'     => 'start-up-mvp',
                    ],
                    [
                        'label'       => 'Build iteratively',
                        'description' => 'Ship in small, reviewable increments using modern practices across frontend, backend and mobile.',
                        'related'     => 'product-scaling',
                    ],
                    [
                        'label'       => 'Launch and stabilise',
                        'description' => 'Roll out to customers, stabilise production and capture the right metrics.',
                        'related'     => 'product-scaling',
                    ],
                    [
                        'label'       => 'Improve and extend',
                        'description' => 'Ongoing iterations, new modules and performance work once the first launch is live.',
                        'related'     => 'digital-transformation',
                    ],
                ],

                'links' => [
                    [
                        'label' => 'See the full product development approach',
                        'url'   => '/start-up-mvp/',
                    ],
                    [
                        'label' => 'How QalbIT supports scaling products',
                        'url'   => '/product-scaling/',
                    ],
                ],
            ],

            // S6 – Engagements
            'engagements' => [
                'id'      => 'location-engagements',
                'section' => 'engagements',
                'eyebrow' => 'Engagement Models',
                'title'   => 'Flexible engagement options for Ohio teams',
                'intro'   => 'Select an engagement model that fits the stage of the product, the budget and internal capacity, with flexibility to adjust over time.',

                'models' => [
                    [
                        'key'         => 'fixed-scope',
                        'label'       => 'Fixed scope project',
                        'description' => 'Well-defined projects with clear timelines, deliverables and pricing – suitable for MVPs and redesigns.',
                        'best_for'    => 'Founders and teams with a clear scope and deadline.',
                        'link'        => '/start-up-mvp/',
                    ],
                    [
                        'key'         => 'dedicated-squad',
                        'label'       => 'Dedicated product squad',
                        'description' => 'A cross-functional team (PM, designers, engineers) acting as an extension of the Ohio product organisation.',
                        'best_for'    => 'Scale-ups and enterprises with a continuous roadmap.',
                        'link'        => '/engagement-models/',
                    ],
                    [
                        'key'         => 'continuous-support',
                        'label'       => 'Continuous improvement and support',
                        'description' => 'Lightweight retainer to handle maintenance, small improvements and on-call fixes.',
                        'best_for'    => 'Teams that need predictable care for existing platforms.',
                        'link'        => '/digital-transformation/',
                    ],
                ],
            ],

            // S7 – Tech
            'tech' => [
                'id'      => 'location-tech',
                'section' => 'tech',
                'eyebrow' => 'Technologies',
                'title'   => 'Modern tech stack for Ohio software projects',
                'intro'   => 'QalbIT combines modern frontend frameworks, robust backend platforms and cloud-native infrastructure to build software that can grow with Ohio organisations.',

                'categories' => [
                    [
                        'label'  => 'Frontend',
                        'items'  => ['React', 'Next.js', 'Vue.js', 'Tailwind CSS'],
                    ],
                    [
                        'label'  => 'Backend and APIs',
                        'items'  => ['Node.js', 'NestJS', 'PHP', 'Laravel'],
                    ],
                    [
                        'label'  => 'Mobile',
                        'items'  => ['Flutter', 'React Native'],
                    ],
                    [
                        'label'  => 'Cloud and Databases',
                        'items'  => ['AWS', 'GCP', 'PostgreSQL', 'MySQL', 'Redis'],
                    ],
                ],

                'links' => [
                    [
                        'label' => 'Explore the full tech stack',
                        'url'   => '/technologies/',
                    ],
                ],
            ],

            // S8 – Proof
            'proof' => [
                'id'      => 'location-proof',
                'section' => 'proof',
                'eyebrow' => 'Case Studies',
                'title'   => 'Real products shipped with QalbIT',
                'intro'   => 'These examples show the kind of platforms and tools QalbIT has helped design, build and scale. More detailed case studies can be shared during discussions.',

                'cases' => [
                    [
                        'label'       => 'B2B SaaS platform',
                        'industry'    => 'SaaS / B2B',
                        'region'      => 'North America and Europe',
                        'headline'    => 'Helped a SaaS team refactor and scale a product used by enterprise clients.',
                        'result'      => 'Improved stability, enabled new modules and reduced deployment friction.',
                        'url'         => '/portfolio/',
                    ],
                    [
                        'label'       => 'Operations and logistics tools',
                        'industry'    => 'Logistics / Operations',
                        'region'      => 'Global',
                        'headline'    => 'Built internal tools to digitise paper-heavy workflows and approvals.',
                        'result'      => 'Around 40% faster processing and better visibility for operations teams.',
                        'url'         => '/portfolio/',
                    ],
                ],

                'testimonials' => [
                    [
                        'quote'  => 'QalbIT provided a reliable, structured way to keep our product moving while internal teams focused on strategy and customers.',
                        'name'   => 'Founder and CEO',
                        'title'  => 'B2B SaaS company',
                        'region' => 'US-based',
                    ],
                ],
            ],

            // S10 – Final CTA
            'final_cta' => [
                'id'      => 'location-final-cta',
                'section' => 'final_cta',
                'eyebrow' => 'Start your project',
                'title'   => 'Discuss your custom software project in Ohio',
                'body'    => 'Share details about the product, timelines and goals, and QalbIT will respond with next steps and a suggested engagement model within one business day.',

                'primary_cta' => [
                    'label' => 'Request a free consultation',
                    'url'   => '/contact-us/',
                ],
                'secondary_cta' => [
                    'label' => 'Book a call on Calendly',
                    'url'   => 'https://calendly.com/abidhusain-qalbit/discuss-project',
                ],

                'meta' => [
                    'show_form' => true,
                    'theme'     => 'light',
                ],
            ],
        ],
    ],

    // -------------------------------------------------
    // North Carolina, USA
    // -------------------------------------------------
    'north-carolina' => [
        // Core routing / identification
        'slug'         => '/usa/north-carolina/',
        'template'     => 'pages/locations/show',
        'country_key'  => 'usa',
        'country_name' => 'United States',
        'state_key'    => 'north-carolina',

        'name'       => 'North Carolina, USA',
        'short_name' => 'North Carolina',
        'enabled'    => true,
        'order'      => 70,

        // Backward-compatible SEO fields
        'meta_title' => 'Custom Software Development in North Carolina, USA – QalbIT',
        'meta_description' => 'QalbIT provides custom software, web and mobile app development services to startups and enterprises across North Carolina, USA – from the Research Triangle to Charlotte and beyond. Partner with a dedicated remote team to design, build and scale your digital products.',
        'headline' => 'Custom Software Development in North Carolina, USA',
        'short_description' => 'End-to-end web, mobile and cloud solutions for North Carolina startups, scale-ups and enterprises.',

        'focus_services' => [
            'Custom Software Development',
            'Web Development',
            'Mobile App Development',
            'SaaS Product Development',
            'Cloud-Based Solutions',
        ],

        // Normalised SEO block
        'faq_key'      => 'faq_location_usa_north_carolina',
        'faq_title'    => 'Frequently asked questions from North Carolina teams',
        'faq_subtitle' => 'Answers to common questions from founders and product leaders across North Carolina. You can always reach out if you do not see your question here.',
        'faq_bullets' => [
            '✓ Remote workflows tuned for North Carolina teams working across product and IT.',
            '✓ Helps connect new applications with the systems you already rely on day to day.',
            '✓ Clear exit and handover paths so your internal team can own the product long-term.',
        ],

        'seo' => [
            'h1'               => 'Custom Software Development Company for North Carolina Businesses',
            'meta_title'       => 'Custom Software Development in North Carolina, USA – QalbIT',
            'meta_description' => 'QalbIT is a remote-first custom software development company helping North Carolina businesses build SaaS products, web applications and mobile apps with predictable delivery and product thinking.',
            'canonical'        => '/usa/north-carolina/',
            'faq_key'          => 'location_usa_north_carolina',
            'breadcrumbs'      => [
                ['label' => 'Home',                 'url' => '/'],
                ['label' => 'North Carolina, USA',  'url' => '/usa/north-carolina/'],
            ],
        ],

        'summary' => [
            'eyebrow' => 'Custom Software Development in North Carolina, USA',
            'title'   => 'Remote custom software partner for North Carolina startups and enterprises',
            'intro'   => 'QalbIT helps North Carolina product teams and founders in Raleigh, Durham, Charlotte and beyond design, build and scale SaaS products, internal tools and mobile apps with a dedicated remote engineering squad.',
        ],

        'sections' => [
            // S1 – Hero
            'hero' => [
                'id'       => 'location-hero',
                'section'  => 'hero',
                'eyebrow'  => 'Custom Software Development in North Carolina, USA',
                'title'    => 'Custom Software Development Company for North Carolina Businesses',
                'subtitle' => 'Build and scale SaaS, web and mobile products with a senior remote team that understands the expectations of North Carolina’s research, healthcare and technology ecosystem.',
                'body'     => 'From early-stage MVPs in the Research Triangle to internal platforms for Charlotte-based teams, QalbIT partners with North Carolina founders and product leaders to design, build and iterate software that supports customers and operations.',

                'primary_cta' => [
                    'label' => 'Schedule a discovery call',
                    'url'   => '/contact-us/',
                    'style' => 'primary',
                ],
                'secondary_cta' => [
                    'label' => 'See how we work',
                    'url'   => '/engagement-model/',
                    'style' => 'ghost',
                ],

                'trust' => [
                    'label' => 'Trusted by teams in the US, UK and GCC',
                    'items' => [
                        ['label' => '10+ years in custom software',      'icon' => null],
                        ['label' => 'Products used in 15+ countries',    'icon' => null],
                        ['label' => 'Founders and CTOs as core clients', 'icon' => null],
                    ],
                ],
                'meta' => [
                    'theme' => 'light-hero',
                ],
            ],

            // S2 – About
            'about' => [
                'id'      => 'location-about',
                'section' => 'about',
                'eyebrow' => 'About QalbIT',
                'title'   => 'A remote custom software partner for North Carolina startups and enterprises',
                'intro'   => 'QalbIT is a product-driven engineering studio working with North Carolina founders, CTOs and business leaders to plan, build and maintain digital products. The focus is on long-term partnership instead of short, transactional projects.',

                'highlights' => [
                    [
                        'label'       => '12+ years building products',
                        'description' => 'Experience shipping complex SaaS, marketplaces, internal tools and ERP-style systems across multiple industries.',
                    ],
                    [
                        'label'       => 'US East Coast friendly collaboration',
                        'description' => 'Overlap with Eastern time for planning, reviews and critical releases, supported by structured rituals and clear written communication.',
                    ],
                    [
                        'label'       => 'Full-stack product teams',
                        'description' => 'Design, frontend, backend, mobile and QA aligned to your roadmap rather than isolated freelancers.',
                    ],
                    [
                        'label'       => 'Security and compliance aware',
                        'description' => 'Secure architectures, role-based access and stable deployment pipelines from day one.',
                    ],
                ],
            ],

            // S3 – Services
            'services' => [
                'id'      => 'location-services',
                'section' => 'services',
                'eyebrow' => 'Services',
                'title'   => 'Custom software development services for North Carolina businesses',
                'intro'   => 'Whether launching a new product, modernising a legacy system or scaling an existing platform, QalbIT brings architecture, engineering and product thinking tailored for North Carolina teams.',

                'items' => [
                    [
                        'key'         => 'custom-software',
                        'label'       => 'Custom Software Development',
                        'description' => 'End-to-end web application development tailored to specific workflows, roles and security requirements.',
                        'url'         => '/services/custom-software-development/',
                    ],
                    [
                        'key'         => 'saas-mvp',
                        'label'       => 'SaaS and MVP Development',
                        'description' => 'Design and deliver investor-ready MVPs and SaaS platforms, with a focus on validating ideas quickly.',
                        'url'         => '/start-up-mvp/',
                    ],
                    [
                        'key'         => 'mobile-apps',
                        'label'       => 'Mobile App Development',
                        'description' => 'Flutter and cross-platform mobile apps integrated with existing systems and analytics.',
                        'url'         => '/services/mobile-app-development/',
                    ],
                    [
                        'key'         => 'api-backend',
                        'label'       => 'API and Backend Engineering',
                        'description' => 'Secure APIs, integrations and background jobs running on modern PHP and Node stacks and cloud infrastructure.',
                        'url'         => '/services/api-development/',
                    ],
                    [
                        'key'         => 'cloud-devops',
                        'label'       => 'Cloud and DevOps',
                        'description' => 'CI/CD pipelines, environment strategy and observability so releases to North Carolina customers remain stable.',
                        'url'         => '/services/cloud-based-solutions/',
                    ],
                    [
                        'key'         => 'dedicated-team',
                        'label'       => 'Dedicated Product Team',
                        'description' => 'A stable remote squad that works like an extension of your North Carolina product and engineering team.',
                        'url'         => '/engagement-models/',
                    ],
                ],
            ],

            // S4 – Why QalbIT
            'why' => [
                'id'      => 'location-why',
                'section' => 'why',
                'eyebrow' => 'Why QalbIT',
                'title'   => 'Why North Carolina teams choose QalbIT as their custom software partner',
                'intro'   => 'North Carolina organisations span technology, healthcare, education, logistics and professional services. QalbIT is designed to support this mix with structured delivery and senior oversight.',

                'reasons' => [
                    [
                        'label'       => 'Remote, but in sync with Eastern time',
                        'description' => 'Overlap with ET working hours for planning, reviews and critical releases, while using an offshore team to maintain throughput.',
                        'bullets'     => [
                            'Regular stand-ups and demos in North Carolina friendly hours.',
                            'Asynchronous updates, Loom walkthroughs and clear documentation.',
                        ],
                    ],
                    [
                        'label'       => 'Product mindset, not just billable hours',
                        'description' => 'Focus on outcomes, activation metrics and technical debt instead of only closing tickets.',
                        'bullets'     => [
                            'Support for scoping, sequencing and launch strategy.',
                            'Balance speed with long-term maintainability.',
                        ],
                    ],
                    [
                        'label'       => 'Transparent, predictable delivery',
                        'description' => 'Roadmap, current work and risks stay visible at all times through simple project rituals and tools.',
                        'bullets'     => [
                            'Structured sprints with clear acceptance criteria.',
                            'Access to staging environments and progress dashboards.',
                        ],
                    ],
                    [
                        'label'       => 'Secure, scalable foundations',
                        'description' => 'Architectures ready for compliance, audits and growth as your organisation scales in North Carolina and beyond.',
                        'bullets'     => [
                            'Role-based access, audit trails and logging by default.',
                            'Cloud-native deployments with backups and monitoring.',
                        ],
                    ],
                ],
            ],

            // S5 – Process
            'process' => [
                'id'      => 'location-process',
                'section' => 'process',
                'eyebrow' => 'Process',
                'title'   => 'A proven product development process for North Carolina businesses',
                'intro'   => 'QalbIT uses a structured delivery process that reduces risk, keeps stakeholders aligned and protects key releases.',

                'steps' => [
                    [
                        'label'       => 'Discover and define',
                        'description' => 'Align on goals, constraints, success metrics and scope before anyone writes code.',
                        'related'     => 'start-up-mvp',
                    ],
                    [
                        'label'       => 'Design and validate',
                        'description' => 'User flows, wireframes and UI prototypes so North Carolina stakeholders can react early and refine priorities.',
                        'related'     => 'start-up-mvp',
                    ],
                    [
                        'label'       => 'Build iteratively',
                        'description' => 'Ship in small, reviewable increments using modern practices across frontend, backend and mobile.',
                        'related'     => 'product-scaling',
                    ],
                    [
                        'label'       => 'Launch and stabilise',
                        'description' => 'Roll out to customers, stabilise production and capture the right metrics.',
                        'related'     => 'product-scaling',
                    ],
                    [
                        'label'       => 'Improve and extend',
                        'description' => 'Ongoing iterations, new modules and performance work once the first launch is live.',
                        'related'     => 'digital-transformation',
                    ],
                ],

                'links' => [
                    [
                        'label' => 'See our full product development approach',
                        'url'   => '/start-up-mvp/',
                    ],
                    [
                        'label' => 'How we support scaling products',
                        'url'   => '/product-scaling/',
                    ],
                ],
            ],

            // S6 – Engagements
            'engagements' => [
                'id'      => 'location-engagements',
                'section' => 'engagements',
                'eyebrow' => 'Engagement Models',
                'title'   => 'Flexible engagement options for North Carolina teams',
                'intro'   => 'Select an engagement model that fits your product stage, budget and internal capacity, with room to adjust as needs evolve.',

                'models' => [
                    [
                        'key'         => 'fixed-scope',
                        'label'       => 'Fixed scope project',
                        'description' => 'Well-defined projects with clear timelines, deliverables and pricing – ideal for MVPs and redesigns.',
                        'best_for'    => 'Founders and teams with a clear scope and deadline.',
                        'link'        => '/start-up-mvp/',
                    ],
                    [
                        'key'         => 'dedicated-squad',
                        'label'       => 'Dedicated product squad',
                        'description' => 'A cross-functional team (PM, designers, engineers) acting as an extension of your North Carolina product organisation.',
                        'best_for'    => 'Scale-ups and enterprises with a continuous roadmap.',
                        'link'        => '/engagement-models/',
                    ],
                    [
                        'key'         => 'continuous-support',
                        'label'       => 'Continuous improvement and support',
                        'description' => 'Lightweight retainer to handle maintenance, small improvements and on-call fixes.',
                        'best_for'    => 'Teams that need predictable care for existing platforms.',
                        'link'        => '/digital-transformation/',
                    ],
                ],
            ],

            // S7 – Tech
            'tech' => [
                'id'      => 'location-tech',
                'section' => 'tech',
                'eyebrow' => 'Technologies',
                'title'   => 'Modern tech stack for North Carolina software projects',
                'intro'   => 'QalbIT combines modern frontend frameworks, robust backend platforms and cloud-native infrastructure to build software that can grow with North Carolina organisations.',

                'categories' => [
                    [
                        'label'  => 'Frontend',
                        'items'  => ['React', 'Next.js', 'Vue.js', 'Tailwind CSS'],
                    ],
                    [
                        'label'  => 'Backend and APIs',
                        'items'  => ['Node.js', 'NestJS', 'PHP', 'Laravel'],
                    ],
                    [
                        'label'  => 'Mobile',
                        'items'  => ['Flutter', 'React Native'],
                    ],
                    [
                        'label'  => 'Cloud and Databases',
                        'items'  => ['AWS', 'GCP', 'PostgreSQL', 'MySQL', 'Redis'],
                    ],
                ],

                'links' => [
                    [
                        'label' => 'Explore our full tech stack',
                        'url'   => '/technologies/',
                    ],
                ],
            ],

            // S8 – Proof
            'proof' => [
                'id'      => 'location-proof',
                'section' => 'proof',
                'eyebrow' => 'Case Studies',
                'title'   => 'Real products shipped with QalbIT',
                'intro'   => 'These examples show the kind of platforms and tools QalbIT has helped design, build and scale. More detailed case studies can be shared during discussions.',

                'cases' => [
                    [
                        'label'       => 'B2B SaaS platform',
                        'industry'    => 'SaaS / B2B',
                        'region'      => 'North America and Europe',
                        'headline'    => 'Helped a SaaS team refactor and scale a product used by enterprise clients.',
                        'result'      => 'Improved stability, enabled new modules and reduced deployment friction.',
                        'url'         => '/portfolio/',
                    ],
                    [
                        'label'       => 'Operations and logistics tools',
                        'industry'    => 'Logistics / Operations',
                        'region'      => 'Global',
                        'headline'    => 'Built internal tools to digitise paper-heavy workflows and approvals.',
                        'result'      => 'Around 40% faster processing and better visibility for operations teams.',
                        'url'         => '/portfolio/',
                    ],
                ],

                'testimonials' => [
                    [
                        'quote'  => 'QalbIT integrated with our existing processes and helped us keep releases predictable while improving quality.',
                        'name'   => 'Founder and CEO',
                        'title'  => 'B2B SaaS company',
                        'region' => 'US-based',
                    ],
                ],
            ],

            // S10 – Final CTA
            'final_cta' => [
                'id'      => 'location-final-cta',
                'section' => 'final_cta',
                'eyebrow' => 'Start your project',
                'title'   => 'Discuss your custom software project in North Carolina',
                'body'    => 'Share a bit about your product, timelines and goals, and QalbIT will respond with next steps and a suggested engagement model within one business day.',

                'primary_cta' => [
                    'label' => 'Request a free consultation',
                    'url'   => '/contact-us/',
                ],
                'secondary_cta' => [
                    'label' => 'Book a call on Calendly',
                    'url'   => 'https://calendly.com/abidhusain-qalbit/discuss-project',
                ],

                'meta' => [
                    'show_form' => true,
                    'theme'     => 'light',
                ],
            ],
        ],
    ],

    // -------------------------------------------------
    // New Jersey, USA
    // -------------------------------------------------
    'new-jersey' => [
        'slug'         => '/usa/new-jersey/',
        'template'     => 'pages/locations/show',
        'country_key'  => 'usa',
        'country_name' => 'United States',
        'state_key'    => 'new-jersey',

        'name'       => 'New Jersey, USA',
        'short_name' => 'New Jersey',
        'enabled'    => true,
        'order'      => 80,

        'meta_title' => 'Custom Software Development in New Jersey, USA – QalbIT',
        'meta_description' => 'QalbIT provides custom software, web and mobile app development services to startups and enterprises across New Jersey, USA – from Newark and Jersey City to Princeton. Partner with a dedicated remote team to design, build and scale digital products.',
        'headline' => 'Custom Software Development in New Jersey, USA',
        'short_description' => 'End-to-end web, mobile and cloud solutions for New Jersey startups, scale-ups and enterprises.',

        'focus_services' => [
            'Custom Software Development',
            'Web Development',
            'Mobile App Development',
            'SaaS Product Development',
            'Cloud-Based Solutions',
        ],

        'faq_key'      => 'faq_location_usa_new_jersey',
        'faq_title'    => 'Frequently asked questions from New Jersey teams',
        'faq_subtitle' => 'Answers to common questions from founders and product leaders across New Jersey. You can always reach out if you do not see your question here.',
        'faq_bullets' => [
            '✓ Suited to New Jersey companies that want a reliable, long-term remote partner.',
            '✓ Support for both “net-new” products and integrations with your existing tools.',
            '✓ Straightforward legal and IP terms aligned with standard US expectations.',
        ],

        'seo' => [
            'h1'               => 'Custom Software Development Company for New Jersey Businesses',
            'meta_title'       => 'Custom Software Development in New Jersey, USA – QalbIT',
            'meta_description' => 'QalbIT is a remote-first custom software development company helping New Jersey businesses build SaaS products, web applications and mobile apps with predictable delivery and product thinking.',
            'canonical'        => '/usa/new-jersey/',
            'faq_key'          => 'location_usa_new_jersey',
            'breadcrumbs'      => [
                ['label' => 'Home',              'url' => '/'],
                ['label' => 'New Jersey, USA',   'url' => '/usa/new-jersey/'],
            ],
        ],

        'summary' => [
            'eyebrow' => 'Custom Software Development in New Jersey, USA',
            'title'   => 'Remote custom software partner for New Jersey startups and enterprises',
            'intro'   => 'QalbIT helps New Jersey product teams and founders in Newark, Jersey City, Princeton and beyond design, build and scale SaaS products, internal tools and mobile apps with a dedicated remote engineering squad.',
        ],

        'sections' => [
            // S1 – Hero
            'hero' => [
                'id'       => 'location-hero',
                'section'  => 'hero',
                'eyebrow'  => 'Custom Software Development in New Jersey, USA',
                'title'    => 'Custom Software Development Company for New Jersey Businesses',
                'subtitle' => 'Build and scale SaaS, web and mobile products with a senior remote team that understands the expectations of New Jersey’s research, healthcare and technology ecosystem.',
                'body'     => 'From early-stage MVPs in the Research Triangle to internal platforms for Charlotte-based teams, QalbIT partners with New Jersey founders and product leaders to design, build and iterate software that supports customers and operations.',

                'primary_cta' => [
                    'label' => 'Schedule a discovery call',
                    'url'   => '/contact-us/',
                    'style' => 'primary',
                ],
                'secondary_cta' => [
                    'label' => 'See how we work',
                    'url'   => '/engagement-model/',
                    'style' => 'ghost',
                ],

                'trust' => [
                    'label' => 'Trusted by teams in the US, UK and GCC',
                    'items' => [
                        ['label' => '10+ years in custom software',      'icon' => null],
                        ['label' => 'Products used in 15+ countries',    'icon' => null],
                        ['label' => 'Founders and CTOs as core clients', 'icon' => null],
                    ],
                ],
                'meta' => [
                    'theme' => 'light-hero',
                ],
            ],

            // S2 – About
            'about' => [
                'id'      => 'location-about',
                'section' => 'about',
                'eyebrow' => 'About QalbIT',
                'title'   => 'A remote custom software partner for New Jersey startups and enterprises',
                'intro'   => 'QalbIT is a product-driven engineering studio working with New Jersey founders, CTOs and business leaders to plan, build and maintain digital products. The focus is on long-term partnership instead of short, transactional projects.',

                'highlights' => [
                    [
                        'label'       => '12+ years building products',
                        'description' => 'Experience shipping complex SaaS, marketplaces, internal tools and ERP-style systems across multiple industries.',
                    ],
                    [
                        'label'       => 'US East Coast friendly collaboration',
                        'description' => 'Overlap with Eastern time for planning, reviews and critical releases, supported by structured rituals and clear written communication.',
                    ],
                    [
                        'label'       => 'Full-stack product teams',
                        'description' => 'Design, frontend, backend, mobile and QA aligned to your roadmap rather than isolated freelancers.',
                    ],
                    [
                        'label'       => 'Security and compliance aware',
                        'description' => 'Secure architectures, role-based access and stable deployment pipelines from day one.',
                    ],
                ],
            ],

            // S3 – Services
            'services' => [
                'id'      => 'location-services',
                'section' => 'services',
                'eyebrow' => 'Services',
                'title'   => 'Custom software development services for New Jersey businesses',
                'intro'   => 'Whether launching a new product, modernising a legacy system or scaling an existing platform, QalbIT brings architecture, engineering and product thinking tailored for New Jersey teams.',

                'items' => [
                    [
                        'key'         => 'custom-software',
                        'label'       => 'Custom Software Development',
                        'description' => 'End-to-end web application development tailored to specific workflows, roles and security requirements.',
                        'url'         => '/services/custom-software-development/',
                    ],
                    [
                        'key'         => 'saas-mvp',
                        'label'       => 'SaaS and MVP Development',
                        'description' => 'Design and deliver investor-ready MVPs and SaaS platforms, with a focus on validating ideas quickly.',
                        'url'         => '/start-up-mvp/',
                    ],
                    [
                        'key'         => 'mobile-apps',
                        'label'       => 'Mobile App Development',
                        'description' => 'Flutter and cross-platform mobile apps integrated with existing systems and analytics.',
                        'url'         => '/services/mobile-app-development/',
                    ],
                    [
                        'key'         => 'api-backend',
                        'label'       => 'API and Backend Engineering',
                        'description' => 'Secure APIs, integrations and background jobs running on modern PHP and Node stacks and cloud infrastructure.',
                        'url'         => '/services/api-development/',
                    ],
                    [
                        'key'         => 'cloud-devops',
                        'label'       => 'Cloud and DevOps',
                        'description' => 'CI/CD pipelines, environment strategy and observability so releases to New Jersey customers remain stable.',
                        'url'         => '/services/cloud-based-solutions/',
                    ],
                    [
                        'key'         => 'dedicated-team',
                        'label'       => 'Dedicated Product Team',
                        'description' => 'A stable remote squad that works like an extension of your New Jersey product and engineering team.',
                        'url'         => '/engagement-models/',
                    ],
                ],
            ],

            // S4 – Why QalbIT
            'why' => [
                'id'      => 'location-why',
                'section' => 'why',
                'eyebrow' => 'Why QalbIT',
                'title'   => 'Why New Jersey teams choose QalbIT as their custom software partner',
                'intro'   => 'New Jersey organisations span technology, healthcare, education, logistics and professional services. QalbIT is designed to support this mix with structured delivery and senior oversight.',

                'reasons' => [
                    [
                        'label'       => 'Remote, but in sync with Eastern time',
                        'description' => 'Overlap with ET working hours for planning, reviews and critical releases, while using an offshore team to maintain throughput.',
                        'bullets'     => [
                            'Regular stand-ups and demos in New Jersey friendly hours.',
                            'Asynchronous updates, Loom walkthroughs and clear documentation.',
                        ],
                    ],
                    [
                        'label'       => 'Product mindset, not just billable hours',
                        'description' => 'Focus on outcomes, activation metrics and technical debt instead of only closing tickets.',
                        'bullets'     => [
                            'Support for scoping, sequencing and launch strategy.',
                            'Balance speed with long-term maintainability.',
                        ],
                    ],
                    [
                        'label'       => 'Transparent, predictable delivery',
                        'description' => 'Roadmap, current work and risks stay visible at all times through simple project rituals and tools.',
                        'bullets'     => [
                            'Structured sprints with clear acceptance criteria.',
                            'Access to staging environments and progress dashboards.',
                        ],
                    ],
                    [
                        'label'       => 'Secure, scalable foundations',
                        'description' => 'Architectures ready for compliance, audits and growth as your organisation scales in New Jersey and beyond.',
                        'bullets'     => [
                            'Role-based access, audit trails and logging by default.',
                            'Cloud-native deployments with backups and monitoring.',
                        ],
                    ],
                ],
            ],

            // S5 – Process
            'process' => [
                'id'      => 'location-process',
                'section' => 'process',
                'eyebrow' => 'Process',
                'title'   => 'A proven product development process for New Jersey businesses',
                'intro'   => 'QalbIT uses a structured delivery process that reduces risk, keeps stakeholders aligned and protects key releases.',

                'steps' => [
                    [
                        'label'       => 'Discover and define',
                        'description' => 'Align on goals, constraints, success metrics and scope before anyone writes code.',
                        'related'     => 'start-up-mvp',
                    ],
                    [
                        'label'       => 'Design and validate',
                        'description' => 'User flows, wireframes and UI prototypes so New Jersey stakeholders can react early and refine priorities.',
                        'related'     => 'start-up-mvp',
                    ],
                    [
                        'label'       => 'Build iteratively',
                        'description' => 'Ship in small, reviewable increments using modern practices across frontend, backend and mobile.',
                        'related'     => 'product-scaling',
                    ],
                    [
                        'label'       => 'Launch and stabilise',
                        'description' => 'Roll out to customers, stabilise production and capture the right metrics.',
                        'related'     => 'product-scaling',
                    ],
                    [
                        'label'       => 'Improve and extend',
                        'description' => 'Ongoing iterations, new modules and performance work once the first launch is live.',
                        'related'     => 'digital-transformation',
                    ],
                ],

                'links' => [
                    [
                        'label' => 'See our full product development approach',
                        'url'   => '/start-up-mvp/',
                    ],
                    [
                        'label' => 'How we support scaling products',
                        'url'   => '/product-scaling/',
                    ],
                ],
            ],

            // S6 – Engagements
            'engagements' => [
                'id'      => 'location-engagements',
                'section' => 'engagements',
                'eyebrow' => 'Engagement Models',
                'title'   => 'Flexible engagement options for New Jersey teams',
                'intro'   => 'Select an engagement model that fits your product stage, budget and internal capacity, with room to adjust as needs evolve.',

                'models' => [
                    [
                        'key'         => 'fixed-scope',
                        'label'       => 'Fixed scope project',
                        'description' => 'Well-defined projects with clear timelines, deliverables and pricing – ideal for MVPs and redesigns.',
                        'best_for'    => 'Founders and teams with a clear scope and deadline.',
                        'link'        => '/start-up-mvp/',
                    ],
                    [
                        'key'         => 'dedicated-squad',
                        'label'       => 'Dedicated product squad',
                        'description' => 'A cross-functional team (PM, designers, engineers) acting as an extension of your New Jersey product organisation.',
                        'best_for'    => 'Scale-ups and enterprises with a continuous roadmap.',
                        'link'        => '/engagement-models/',
                    ],
                    [
                        'key'         => 'continuous-support',
                        'label'       => 'Continuous improvement and support',
                        'description' => 'Lightweight retainer to handle maintenance, small improvements and on-call fixes.',
                        'best_for'    => 'Teams that need predictable care for existing platforms.',
                        'link'        => '/digital-transformation/',
                    ],
                ],
            ],

            // S7 – Tech
            'tech' => [
                'id'      => 'location-tech',
                'section' => 'tech',
                'eyebrow' => 'Technologies',
                'title'   => 'Modern tech stack for New Jersey software projects',
                'intro'   => 'QalbIT combines modern frontend frameworks, robust backend platforms and cloud-native infrastructure to build software that can grow with New Jersey organisations.',

                'categories' => [
                    [
                        'label'  => 'Frontend',
                        'items'  => ['React', 'Next.js', 'Vue.js', 'Tailwind CSS'],
                    ],
                    [
                        'label'  => 'Backend and APIs',
                        'items'  => ['Node.js', 'NestJS', 'PHP', 'Laravel'],
                    ],
                    [
                        'label'  => 'Mobile',
                        'items'  => ['Flutter', 'React Native'],
                    ],
                    [
                        'label'  => 'Cloud and Databases',
                        'items'  => ['AWS', 'GCP', 'PostgreSQL', 'MySQL', 'Redis'],
                    ],
                ],

                'links' => [
                    [
                        'label' => 'Explore our full tech stack',
                        'url'   => '/technologies/',
                    ],
                ],
            ],

            // S8 – Proof
            'proof' => [
                'id'      => 'location-proof',
                'section' => 'proof',
                'eyebrow' => 'Case Studies',
                'title'   => 'Real products shipped with QalbIT',
                'intro'   => 'These examples show the kind of platforms and tools QalbIT has helped design, build and scale. More detailed case studies can be shared during discussions.',

                'cases' => [
                    [
                        'label'       => 'B2B SaaS platform',
                        'industry'    => 'SaaS / B2B',
                        'region'      => 'North America and Europe',
                        'headline'    => 'Helped a SaaS team refactor and scale a product used by enterprise clients.',
                        'result'      => 'Improved stability, enabled new modules and reduced deployment friction.',
                        'url'         => '/portfolio/',
                    ],
                    [
                        'label'       => 'Operations and logistics tools',
                        'industry'    => 'Logistics / Operations',
                        'region'      => 'Global',
                        'headline'    => 'Built internal tools to digitise paper-heavy workflows and approvals.',
                        'result'      => 'Around 40% faster processing and better visibility for operations teams.',
                        'url'         => '/portfolio/',
                    ],
                ],

                'testimonials' => [
                    [
                        'quote'  => 'QalbIT integrated with our existing processes and helped us keep releases predictable while improving quality.',
                        'name'   => 'Founder and CEO',
                        'title'  => 'B2B SaaS company',
                        'region' => 'US-based',
                    ],
                ],
            ],

            // S10 – Final CTA
            'final_cta' => [
                'id'      => 'location-final-cta',
                'section' => 'final_cta',
                'eyebrow' => 'Start your project',
                'title'   => 'Discuss your custom software project in New Jersey',
                'body'    => 'Share a bit about your product, timelines and goals, and QalbIT will respond with next steps and a suggested engagement model within one business day.',

                'primary_cta' => [
                    'label' => 'Request a free consultation',
                    'url'   => '/contact-us/',
                ],
                'secondary_cta' => [
                    'label' => 'Book a call on Calendly',
                    'url'   => 'https://calendly.com/abidhusain-qalbit/discuss-project',
                ],

                'meta' => [
                    'show_form' => true,
                    'theme'     => 'light',
                ],
            ],
        ],
    ],

    // -------------------------------------------------
    // Michigan, USA
    // -------------------------------------------------
    'michigan' => [
        'slug'         => '/usa/michigan/',
        'template'     => 'pages/locations/show',
        'country_key'  => 'usa',
        'country_name' => 'United States',
        'state_key'    => 'michigan',

        'name'       => 'Michigan, USA',
        'short_name' => 'Michigan',
        'enabled'    => true,
        'order'      => 90,

        'meta_title' => 'Custom Software Development in Michigan, USA – QalbIT',
        'meta_description' => 'QalbIT provides custom software, web and mobile app development services to startups and enterprises across Michigan, USA – from Detroit and Ann Arbor to Grand Rapids. Partner with a dedicated remote team to design, build and scale digital products.',
        'headline' => 'Custom Software Development in Michigan, USA',
        'short_description' => 'End-to-end web, mobile and cloud solutions for Michigan startups, scale-ups and enterprises.',

        'focus_services' => [
            'Custom Software Development',
            'Web Development',
            'Mobile App Development',
            'SaaS Product Development',
            'Cloud-Based Solutions',
        ],

        'faq_key'      => 'faq_location_usa_michigan',
        'faq_title'    => 'Frequently asked questions from Michigan teams',
        'faq_subtitle' => 'Answers to common questions from founders and product leaders across Michigan. You can always reach out if you do not see your question here.',
        'faq_bullets' => [
            '✓ Experience with operational, manufacturing and logistics-style workflows in Michigan.',
            '✓ Balanced approach between rapid delivery and long-term maintainability of the stack.',
            '✓ IP, security and documentation handled to make audits and handovers easier.',
        ],

        'seo' => [
            'h1'               => 'Custom Software Development Company for Michigan Businesses',
            'meta_title'       => 'Custom Software Development in Michigan, USA – QalbIT',
            'meta_description' => 'QalbIT is a remote-first custom software development company helping Michigan businesses build SaaS products, web applications and mobile apps with predictable delivery and product thinking.',
            'canonical'        => '/usa/michigan/',
            'faq_key'          => 'location_usa_michigan',
            'breadcrumbs'      => [
                ['label' => 'Home',          'url' => '/'],
                ['label' => 'Michigan, USA', 'url' => '/usa/michigan/'],
            ],
        ],

        'summary' => [
            'eyebrow' => 'Custom Software Development in Michigan, USA',
            'title'   => 'Remote custom software partner for Michigan startups and enterprises',
            'intro'   => 'QalbIT helps Michigan product teams and founders in Detroit, Ann Arbor, Grand Rapids and beyond design, build and scale SaaS products, internal tools and mobile apps with a dedicated remote engineering squad.',
        ],

        'sections' => [
            // S1 – Hero
            'hero' => [
                'id'       => 'location-hero',
                'section'  => 'hero',
                'eyebrow'  => 'Custom Software Development in Michigan, USA',
                'title'    => 'Custom Software Development Company for Michigan Businesses',
                'subtitle' => 'Build and scale SaaS, web and mobile products with a senior remote team that understands the expectations of Michigan’s research, healthcare and technology ecosystem.',
                'body'     => 'From early-stage MVPs in the Research Triangle to internal platforms for Charlotte-based teams, QalbIT partners with Michigan founders and product leaders to design, build and iterate software that supports customers and operations.',

                'primary_cta' => [
                    'label' => 'Schedule a discovery call',
                    'url'   => '/contact-us/',
                    'style' => 'primary',
                ],
                'secondary_cta' => [
                    'label' => 'See how we work',
                    'url'   => '/engagement-model/',
                    'style' => 'ghost',
                ],

                'trust' => [
                    'label' => 'Trusted by teams in the US, UK and GCC',
                    'items' => [
                        ['label' => '10+ years in custom software',      'icon' => null],
                        ['label' => 'Products used in 15+ countries',    'icon' => null],
                        ['label' => 'Founders and CTOs as core clients', 'icon' => null],
                    ],
                ],
                'meta' => [
                    'theme' => 'light-hero',
                ],
            ],

            // S2 – About
            'about' => [
                'id'      => 'location-about',
                'section' => 'about',
                'eyebrow' => 'About QalbIT',
                'title'   => 'A remote custom software partner for Michigan startups and enterprises',
                'intro'   => 'QalbIT is a product-driven engineering studio working with Michigan founders, CTOs and business leaders to plan, build and maintain digital products. The focus is on long-term partnership instead of short, transactional projects.',

                'highlights' => [
                    [
                        'label'       => '12+ years building products',
                        'description' => 'Experience shipping complex SaaS, marketplaces, internal tools and ERP-style systems across multiple industries.',
                    ],
                    [
                        'label'       => 'US East Coast friendly collaboration',
                        'description' => 'Overlap with Eastern time for planning, reviews and critical releases, supported by structured rituals and clear written communication.',
                    ],
                    [
                        'label'       => 'Full-stack product teams',
                        'description' => 'Design, frontend, backend, mobile and QA aligned to your roadmap rather than isolated freelancers.',
                    ],
                    [
                        'label'       => 'Security and compliance aware',
                        'description' => 'Secure architectures, role-based access and stable deployment pipelines from day one.',
                    ],
                ],
            ],

            // S3 – Services
            'services' => [
                'id'      => 'location-services',
                'section' => 'services',
                'eyebrow' => 'Services',
                'title'   => 'Custom software development services for Michigan businesses',
                'intro'   => 'Whether launching a new product, modernising a legacy system or scaling an existing platform, QalbIT brings architecture, engineering and product thinking tailored for Michigan teams.',

                'items' => [
                    [
                        'key'         => 'custom-software',
                        'label'       => 'Custom Software Development',
                        'description' => 'End-to-end web application development tailored to specific workflows, roles and security requirements.',
                        'url'         => '/services/custom-software-development/',
                    ],
                    [
                        'key'         => 'saas-mvp',
                        'label'       => 'SaaS and MVP Development',
                        'description' => 'Design and deliver investor-ready MVPs and SaaS platforms, with a focus on validating ideas quickly.',
                        'url'         => '/start-up-mvp/',
                    ],
                    [
                        'key'         => 'mobile-apps',
                        'label'       => 'Mobile App Development',
                        'description' => 'Flutter and cross-platform mobile apps integrated with existing systems and analytics.',
                        'url'         => '/services/mobile-app-development/',
                    ],
                    [
                        'key'         => 'api-backend',
                        'label'       => 'API and Backend Engineering',
                        'description' => 'Secure APIs, integrations and background jobs running on modern PHP and Node stacks and cloud infrastructure.',
                        'url'         => '/services/api-development/',
                    ],
                    [
                        'key'         => 'cloud-devops',
                        'label'       => 'Cloud and DevOps',
                        'description' => 'CI/CD pipelines, environment strategy and observability so releases to Michigan customers remain stable.',
                        'url'         => '/services/cloud-based-solutions/',
                    ],
                    [
                        'key'         => 'dedicated-team',
                        'label'       => 'Dedicated Product Team',
                        'description' => 'A stable remote squad that works like an extension of your Michigan product and engineering team.',
                        'url'         => '/engagement-models/',
                    ],
                ],
            ],

            // S4 – Why QalbIT
            'why' => [
                'id'      => 'location-why',
                'section' => 'why',
                'eyebrow' => 'Why QalbIT',
                'title'   => 'Why Michigan teams choose QalbIT as their custom software partner',
                'intro'   => 'Michigan organisations span technology, healthcare, education, logistics and professional services. QalbIT is designed to support this mix with structured delivery and senior oversight.',

                'reasons' => [
                    [
                        'label'       => 'Remote, but in sync with Eastern time',
                        'description' => 'Overlap with ET working hours for planning, reviews and critical releases, while using an offshore team to maintain throughput.',
                        'bullets'     => [
                            'Regular stand-ups and demos in Michigan friendly hours.',
                            'Asynchronous updates, Loom walkthroughs and clear documentation.',
                        ],
                    ],
                    [
                        'label'       => 'Product mindset, not just billable hours',
                        'description' => 'Focus on outcomes, activation metrics and technical debt instead of only closing tickets.',
                        'bullets'     => [
                            'Support for scoping, sequencing and launch strategy.',
                            'Balance speed with long-term maintainability.',
                        ],
                    ],
                    [
                        'label'       => 'Transparent, predictable delivery',
                        'description' => 'Roadmap, current work and risks stay visible at all times through simple project rituals and tools.',
                        'bullets'     => [
                            'Structured sprints with clear acceptance criteria.',
                            'Access to staging environments and progress dashboards.',
                        ],
                    ],
                    [
                        'label'       => 'Secure, scalable foundations',
                        'description' => 'Architectures ready for compliance, audits and growth as your organisation scales in Michigan and beyond.',
                        'bullets'     => [
                            'Role-based access, audit trails and logging by default.',
                            'Cloud-native deployments with backups and monitoring.',
                        ],
                    ],
                ],
            ],

            // S5 – Process
            'process' => [
                'id'      => 'location-process',
                'section' => 'process',
                'eyebrow' => 'Process',
                'title'   => 'A proven product development process for Michigan businesses',
                'intro'   => 'QalbIT uses a structured delivery process that reduces risk, keeps stakeholders aligned and protects key releases.',

                'steps' => [
                    [
                        'label'       => 'Discover and define',
                        'description' => 'Align on goals, constraints, success metrics and scope before anyone writes code.',
                        'related'     => 'start-up-mvp',
                    ],
                    [
                        'label'       => 'Design and validate',
                        'description' => 'User flows, wireframes and UI prototypes so Michigan stakeholders can react early and refine priorities.',
                        'related'     => 'start-up-mvp',
                    ],
                    [
                        'label'       => 'Build iteratively',
                        'description' => 'Ship in small, reviewable increments using modern practices across frontend, backend and mobile.',
                        'related'     => 'product-scaling',
                    ],
                    [
                        'label'       => 'Launch and stabilise',
                        'description' => 'Roll out to customers, stabilise production and capture the right metrics.',
                        'related'     => 'product-scaling',
                    ],
                    [
                        'label'       => 'Improve and extend',
                        'description' => 'Ongoing iterations, new modules and performance work once the first launch is live.',
                        'related'     => 'digital-transformation',
                    ],
                ],

                'links' => [
                    [
                        'label' => 'See our full product development approach',
                        'url'   => '/start-up-mvp/',
                    ],
                    [
                        'label' => 'How we support scaling products',
                        'url'   => '/product-scaling/',
                    ],
                ],
            ],

            // S6 – Engagements
            'engagements' => [
                'id'      => 'location-engagements',
                'section' => 'engagements',
                'eyebrow' => 'Engagement Models',
                'title'   => 'Flexible engagement options for Michigan teams',
                'intro'   => 'Select an engagement model that fits your product stage, budget and internal capacity, with room to adjust as needs evolve.',

                'models' => [
                    [
                        'key'         => 'fixed-scope',
                        'label'       => 'Fixed scope project',
                        'description' => 'Well-defined projects with clear timelines, deliverables and pricing – ideal for MVPs and redesigns.',
                        'best_for'    => 'Founders and teams with a clear scope and deadline.',
                        'link'        => '/start-up-mvp/',
                    ],
                    [
                        'key'         => 'dedicated-squad',
                        'label'       => 'Dedicated product squad',
                        'description' => 'A cross-functional team (PM, designers, engineers) acting as an extension of your Michigan product organisation.',
                        'best_for'    => 'Scale-ups and enterprises with a continuous roadmap.',
                        'link'        => '/engagement-models/',
                    ],
                    [
                        'key'         => 'continuous-support',
                        'label'       => 'Continuous improvement and support',
                        'description' => 'Lightweight retainer to handle maintenance, small improvements and on-call fixes.',
                        'best_for'    => 'Teams that need predictable care for existing platforms.',
                        'link'        => '/digital-transformation/',
                    ],
                ],
            ],

            // S7 – Tech
            'tech' => [
                'id'      => 'location-tech',
                'section' => 'tech',
                'eyebrow' => 'Technologies',
                'title'   => 'Modern tech stack for Michigan software projects',
                'intro'   => 'QalbIT combines modern frontend frameworks, robust backend platforms and cloud-native infrastructure to build software that can grow with Michigan organisations.',

                'categories' => [
                    [
                        'label'  => 'Frontend',
                        'items'  => ['React', 'Next.js', 'Vue.js', 'Tailwind CSS'],
                    ],
                    [
                        'label'  => 'Backend and APIs',
                        'items'  => ['Node.js', 'NestJS', 'PHP', 'Laravel'],
                    ],
                    [
                        'label'  => 'Mobile',
                        'items'  => ['Flutter', 'React Native'],
                    ],
                    [
                        'label'  => 'Cloud and Databases',
                        'items'  => ['AWS', 'GCP', 'PostgreSQL', 'MySQL', 'Redis'],
                    ],
                ],

                'links' => [
                    [
                        'label' => 'Explore our full tech stack',
                        'url'   => '/technologies/',
                    ],
                ],
            ],

            // S8 – Proof
            'proof' => [
                'id'      => 'location-proof',
                'section' => 'proof',
                'eyebrow' => 'Case Studies',
                'title'   => 'Real products shipped with QalbIT',
                'intro'   => 'These examples show the kind of platforms and tools QalbIT has helped design, build and scale. More detailed case studies can be shared during discussions.',

                'cases' => [
                    [
                        'label'       => 'B2B SaaS platform',
                        'industry'    => 'SaaS / B2B',
                        'region'      => 'North America and Europe',
                        'headline'    => 'Helped a SaaS team refactor and scale a product used by enterprise clients.',
                        'result'      => 'Improved stability, enabled new modules and reduced deployment friction.',
                        'url'         => '/portfolio/',
                    ],
                    [
                        'label'       => 'Operations and logistics tools',
                        'industry'    => 'Logistics / Operations',
                        'region'      => 'Global',
                        'headline'    => 'Built internal tools to digitise paper-heavy workflows and approvals.',
                        'result'      => 'Around 40% faster processing and better visibility for operations teams.',
                        'url'         => '/portfolio/',
                    ],
                ],

                'testimonials' => [
                    [
                        'quote'  => 'QalbIT integrated with our existing processes and helped us keep releases predictable while improving quality.',
                        'name'   => 'Founder and CEO',
                        'title'  => 'B2B SaaS company',
                        'region' => 'US-based',
                    ],
                ],
            ],

            // S10 – Final CTA
            'final_cta' => [
                'id'      => 'location-final-cta',
                'section' => 'final_cta',
                'eyebrow' => 'Start your project',
                'title'   => 'Discuss your custom software project in Michigan',
                'body'    => 'Share a bit about your product, timelines and goals, and QalbIT will respond with next steps and a suggested engagement model within one business day.',

                'primary_cta' => [
                    'label' => 'Request a free consultation',
                    'url'   => '/contact-us/',
                ],
                'secondary_cta' => [
                    'label' => 'Book a call on Calendly',
                    'url'   => 'https://calendly.com/abidhusain-qalbit/discuss-project',
                ],

                'meta' => [
                    'show_form' => true,
                    'theme'     => 'light',
                ],
            ],
        ],
    ],

    // -------------------------------------------------
    // Illinois, USA
    // -------------------------------------------------
    'illinois' => [
        'slug'         => '/usa/illinois/',
        'template'     => 'pages/locations/show',
        'country_key'  => 'usa',
        'country_name' => 'United States',
        'state_key'    => 'illinois',

        'name'       => 'Illinois, USA',
        'short_name' => 'Illinois',
        'enabled'    => true,
        'order'      => 100,

        'meta_title' => 'Custom Software Development in Illinois, USA – QalbIT',
        'meta_description' => 'QalbIT provides custom software, web and mobile app development services to startups and enterprises across Illinois, USA – with a focus on Chicago and surrounding regions. Partner with a dedicated remote team to design, build and scale digital products.',
        'headline' => 'Custom Software Development in Illinois, USA',
        'short_description' => 'End-to-end web, mobile and cloud solutions for Illinois startups, scale-ups and enterprises.',

        'focus_services' => [
            'Custom Software Development',
            'Web Development',
            'Mobile App Development',
            'SaaS Product Development',
            'Cloud-Based Solutions',
        ],

        'faq_key'      => 'faq_location_usa_illinois',
        'faq_title'    => 'Frequently asked questions from Illinois teams',
        'faq_subtitle' => 'Answers to common questions from founders and product leaders across Illinois. You can always reach out if you do not see your question here.',
        'faq_bullets' => [
            '✓ Designed for Illinois teams, including Chicago-based startups and enterprises.',
            '✓ Supports data-heavy, B2B and internal tools where reliability really matters.',
            '✓ Contracts that clearly define ownership, responsibilities and support expectations.',
        ],


        'seo' => [
            'h1'               => 'Custom Software Development Company for Illinois Businesses',
            'meta_title'       => 'Custom Software Development in Illinois, USA – QalbIT',
            'meta_description' => 'QalbIT is a remote-first custom software development company helping Illinois businesses build SaaS products, web applications and mobile apps with predictable delivery and product thinking.',
            'canonical'        => '/usa/illinois/',
            'faq_key'          => 'location_usa_illinois',
            'breadcrumbs'      => [
                ['label' => 'Home',          'url' => '/'],
                ['label' => 'Illinois, USA', 'url' => '/usa/illinois/'],
            ],
        ],

        'summary' => [
            'eyebrow' => 'Custom Software Development in Illinois, USA',
            'title'   => 'Remote custom software partner for Illinois startups and enterprises',
            'intro'   => 'QalbIT helps Illinois product teams and founders in Chicago and across the state design, build and scale SaaS products, internal tools and mobile apps with a dedicated remote engineering squad.',
        ],

        'sections' => [
            // S1 – Hero
            'hero' => [
                'id'       => 'location-hero',
                'section'  => 'hero',
                'eyebrow'  => 'Custom Software Development in Illinois, USA',
                'title'    => 'Custom Software Development Company for Illinois Businesses',
                'subtitle' => 'Build and scale SaaS, web and mobile products with a senior remote team that understands the expectations of Illinois’s research, healthcare and technology ecosystem.',
                'body'     => 'From early-stage MVPs in the Research Triangle to internal platforms for Charlotte-based teams, QalbIT partners with Illinois founders and product leaders to design, build and iterate software that supports customers and operations.',

                'primary_cta' => [
                    'label' => 'Schedule a discovery call',
                    'url'   => '/contact-us/',
                    'style' => 'primary',
                ],
                'secondary_cta' => [
                    'label' => 'See how we work',
                    'url'   => '/engagement-model/',
                    'style' => 'ghost',
                ],

                'trust' => [
                    'label' => 'Trusted by teams in the US, UK and GCC',
                    'items' => [
                        ['label' => '10+ years in custom software',      'icon' => null],
                        ['label' => 'Products used in 15+ countries',    'icon' => null],
                        ['label' => 'Founders and CTOs as core clients', 'icon' => null],
                    ],
                ],
                'meta' => [
                    'theme' => 'light-hero',
                ],
            ],

            // S2 – About
            'about' => [
                'id'      => 'location-about',
                'section' => 'about',
                'eyebrow' => 'About QalbIT',
                'title'   => 'A remote custom software partner for Illinois startups and enterprises',
                'intro'   => 'QalbIT is a product-driven engineering studio working with Illinois founders, CTOs and business leaders to plan, build and maintain digital products. The focus is on long-term partnership instead of short, transactional projects.',

                'highlights' => [
                    [
                        'label'       => '12+ years building products',
                        'description' => 'Experience shipping complex SaaS, marketplaces, internal tools and ERP-style systems across multiple industries.',
                    ],
                    [
                        'label'       => 'US East Coast friendly collaboration',
                        'description' => 'Overlap with Eastern time for planning, reviews and critical releases, supported by structured rituals and clear written communication.',
                    ],
                    [
                        'label'       => 'Full-stack product teams',
                        'description' => 'Design, frontend, backend, mobile and QA aligned to your roadmap rather than isolated freelancers.',
                    ],
                    [
                        'label'       => 'Security and compliance aware',
                        'description' => 'Secure architectures, role-based access and stable deployment pipelines from day one.',
                    ],
                ],
            ],

            // S3 – Services
            'services' => [
                'id'      => 'location-services',
                'section' => 'services',
                'eyebrow' => 'Services',
                'title'   => 'Custom software development services for Illinois businesses',
                'intro'   => 'Whether launching a new product, modernising a legacy system or scaling an existing platform, QalbIT brings architecture, engineering and product thinking tailored for Illinois teams.',

                'items' => [
                    [
                        'key'         => 'custom-software',
                        'label'       => 'Custom Software Development',
                        'description' => 'End-to-end web application development tailored to specific workflows, roles and security requirements.',
                        'url'         => '/services/custom-software-development/',
                    ],
                    [
                        'key'         => 'saas-mvp',
                        'label'       => 'SaaS and MVP Development',
                        'description' => 'Design and deliver investor-ready MVPs and SaaS platforms, with a focus on validating ideas quickly.',
                        'url'         => '/start-up-mvp/',
                    ],
                    [
                        'key'         => 'mobile-apps',
                        'label'       => 'Mobile App Development',
                        'description' => 'Flutter and cross-platform mobile apps integrated with existing systems and analytics.',
                        'url'         => '/services/mobile-app-development/',
                    ],
                    [
                        'key'         => 'api-backend',
                        'label'       => 'API and Backend Engineering',
                        'description' => 'Secure APIs, integrations and background jobs running on modern PHP and Node stacks and cloud infrastructure.',
                        'url'         => '/services/api-development/',
                    ],
                    [
                        'key'         => 'cloud-devops',
                        'label'       => 'Cloud and DevOps',
                        'description' => 'CI/CD pipelines, environment strategy and observability so releases to Illinois customers remain stable.',
                        'url'         => '/services/cloud-based-solutions/',
                    ],
                    [
                        'key'         => 'dedicated-team',
                        'label'       => 'Dedicated Product Team',
                        'description' => 'A stable remote squad that works like an extension of your Illinois product and engineering team.',
                        'url'         => '/engagement-models/',
                    ],
                ],
            ],

            // S4 – Why QalbIT
            'why' => [
                'id'      => 'location-why',
                'section' => 'why',
                'eyebrow' => 'Why QalbIT',
                'title'   => 'Why Illinois teams choose QalbIT as their custom software partner',
                'intro'   => 'Illinois organisations span technology, healthcare, education, logistics and professional services. QalbIT is designed to support this mix with structured delivery and senior oversight.',

                'reasons' => [
                    [
                        'label'       => 'Remote, but in sync with Eastern time',
                        'description' => 'Overlap with ET working hours for planning, reviews and critical releases, while using an offshore team to maintain throughput.',
                        'bullets'     => [
                            'Regular stand-ups and demos in Illinois friendly hours.',
                            'Asynchronous updates, Loom walkthroughs and clear documentation.',
                        ],
                    ],
                    [
                        'label'       => 'Product mindset, not just billable hours',
                        'description' => 'Focus on outcomes, activation metrics and technical debt instead of only closing tickets.',
                        'bullets'     => [
                            'Support for scoping, sequencing and launch strategy.',
                            'Balance speed with long-term maintainability.',
                        ],
                    ],
                    [
                        'label'       => 'Transparent, predictable delivery',
                        'description' => 'Roadmap, current work and risks stay visible at all times through simple project rituals and tools.',
                        'bullets'     => [
                            'Structured sprints with clear acceptance criteria.',
                            'Access to staging environments and progress dashboards.',
                        ],
                    ],
                    [
                        'label'       => 'Secure, scalable foundations',
                        'description' => 'Architectures ready for compliance, audits and growth as your organisation scales in Illinois and beyond.',
                        'bullets'     => [
                            'Role-based access, audit trails and logging by default.',
                            'Cloud-native deployments with backups and monitoring.',
                        ],
                    ],
                ],
            ],

            // S5 – Process
            'process' => [
                'id'      => 'location-process',
                'section' => 'process',
                'eyebrow' => 'Process',
                'title'   => 'A proven product development process for Illinois businesses',
                'intro'   => 'QalbIT uses a structured delivery process that reduces risk, keeps stakeholders aligned and protects key releases.',

                'steps' => [
                    [
                        'label'       => 'Discover and define',
                        'description' => 'Align on goals, constraints, success metrics and scope before anyone writes code.',
                        'related'     => 'start-up-mvp',
                    ],
                    [
                        'label'       => 'Design and validate',
                        'description' => 'User flows, wireframes and UI prototypes so Illinois stakeholders can react early and refine priorities.',
                        'related'     => 'start-up-mvp',
                    ],
                    [
                        'label'       => 'Build iteratively',
                        'description' => 'Ship in small, reviewable increments using modern practices across frontend, backend and mobile.',
                        'related'     => 'product-scaling',
                    ],
                    [
                        'label'       => 'Launch and stabilise',
                        'description' => 'Roll out to customers, stabilise production and capture the right metrics.',
                        'related'     => 'product-scaling',
                    ],
                    [
                        'label'       => 'Improve and extend',
                        'description' => 'Ongoing iterations, new modules and performance work once the first launch is live.',
                        'related'     => 'digital-transformation',
                    ],
                ],

                'links' => [
                    [
                        'label' => 'See our full product development approach',
                        'url'   => '/start-up-mvp/',
                    ],
                    [
                        'label' => 'How we support scaling products',
                        'url'   => '/product-scaling/',
                    ],
                ],
            ],

            // S6 – Engagements
            'engagements' => [
                'id'      => 'location-engagements',
                'section' => 'engagements',
                'eyebrow' => 'Engagement Models',
                'title'   => 'Flexible engagement options for Illinois teams',
                'intro'   => 'Select an engagement model that fits your product stage, budget and internal capacity, with room to adjust as needs evolve.',

                'models' => [
                    [
                        'key'         => 'fixed-scope',
                        'label'       => 'Fixed scope project',
                        'description' => 'Well-defined projects with clear timelines, deliverables and pricing – ideal for MVPs and redesigns.',
                        'best_for'    => 'Founders and teams with a clear scope and deadline.',
                        'link'        => '/start-up-mvp/',
                    ],
                    [
                        'key'         => 'dedicated-squad',
                        'label'       => 'Dedicated product squad',
                        'description' => 'A cross-functional team (PM, designers, engineers) acting as an extension of your Illinois product organisation.',
                        'best_for'    => 'Scale-ups and enterprises with a continuous roadmap.',
                        'link'        => '/engagement-models/',
                    ],
                    [
                        'key'         => 'continuous-support',
                        'label'       => 'Continuous improvement and support',
                        'description' => 'Lightweight retainer to handle maintenance, small improvements and on-call fixes.',
                        'best_for'    => 'Teams that need predictable care for existing platforms.',
                        'link'        => '/digital-transformation/',
                    ],
                ],
            ],

            // S7 – Tech
            'tech' => [
                'id'      => 'location-tech',
                'section' => 'tech',
                'eyebrow' => 'Technologies',
                'title'   => 'Modern tech stack for Illinois software projects',
                'intro'   => 'QalbIT combines modern frontend frameworks, robust backend platforms and cloud-native infrastructure to build software that can grow with Illinois organisations.',

                'categories' => [
                    [
                        'label'  => 'Frontend',
                        'items'  => ['React', 'Next.js', 'Vue.js', 'Tailwind CSS'],
                    ],
                    [
                        'label'  => 'Backend and APIs',
                        'items'  => ['Node.js', 'NestJS', 'PHP', 'Laravel'],
                    ],
                    [
                        'label'  => 'Mobile',
                        'items'  => ['Flutter', 'React Native'],
                    ],
                    [
                        'label'  => 'Cloud and Databases',
                        'items'  => ['AWS', 'GCP', 'PostgreSQL', 'MySQL', 'Redis'],
                    ],
                ],

                'links' => [
                    [
                        'label' => 'Explore our full tech stack',
                        'url'   => '/technologies/',
                    ],
                ],
            ],

            // S8 – Proof
            'proof' => [
                'id'      => 'location-proof',
                'section' => 'proof',
                'eyebrow' => 'Case Studies',
                'title'   => 'Real products shipped with QalbIT',
                'intro'   => 'These examples show the kind of platforms and tools QalbIT has helped design, build and scale. More detailed case studies can be shared during discussions.',

                'cases' => [
                    [
                        'label'       => 'B2B SaaS platform',
                        'industry'    => 'SaaS / B2B',
                        'region'      => 'North America and Europe',
                        'headline'    => 'Helped a SaaS team refactor and scale a product used by enterprise clients.',
                        'result'      => 'Improved stability, enabled new modules and reduced deployment friction.',
                        'url'         => '/portfolio/',
                    ],
                    [
                        'label'       => 'Operations and logistics tools',
                        'industry'    => 'Logistics / Operations',
                        'region'      => 'Global',
                        'headline'    => 'Built internal tools to digitise paper-heavy workflows and approvals.',
                        'result'      => 'Around 40% faster processing and better visibility for operations teams.',
                        'url'         => '/portfolio/',
                    ],
                ],

                'testimonials' => [
                    [
                        'quote'  => 'QalbIT integrated with our existing processes and helped us keep releases predictable while improving quality.',
                        'name'   => 'Founder and CEO',
                        'title'  => 'B2B SaaS company',
                        'region' => 'US-based',
                    ],
                ],
            ],

            // S10 – Final CTA
            'final_cta' => [
                'id'      => 'location-final-cta',
                'section' => 'final_cta',
                'eyebrow' => 'Start your project',
                'title'   => 'Discuss your custom software project in Illinois',
                'body'    => 'Share a bit about your product, timelines and goals, and QalbIT will respond with next steps and a suggested engagement model within one business day.',

                'primary_cta' => [
                    'label' => 'Request a free consultation',
                    'url'   => '/contact-us/',
                ],
                'secondary_cta' => [
                    'label' => 'Book a call on Calendly',
                    'url'   => 'https://calendly.com/abidhusain-qalbit/discuss-project',
                ],

                'meta' => [
                    'show_form' => true,
                    'theme'     => 'light',
                ],
            ],
        ],
    ],

    // -------------------------------------------------
    // Georgia, USA
    // -------------------------------------------------
    'georgia' => [
        'slug'         => '/usa/georgia/',
        'template'     => 'pages/locations/show',
        'country_key'  => 'usa',
        'country_name' => 'United States',
        'state_key'    => 'georgia',

        'name'       => 'Georgia, USA',
        'short_name' => 'Georgia',
        'enabled'    => true,
        'order'      => 110,

        'meta_title' => 'Custom Software Development in Georgia, USA – QalbIT',
        'meta_description' => 'QalbIT provides custom software, web and mobile app development services to startups and enterprises across Georgia, USA – with a focus on Atlanta and key logistics and fintech hubs. Partner with a dedicated remote team to design, build and scale digital products.',
        'headline' => 'Custom Software Development in Georgia, USA',
        'short_description' => 'End-to-end web, mobile and cloud solutions for Georgia startups, scale-ups and enterprises.',

        'focus_services' => [
            'Custom Software Development',
            'Web Development',
            'Mobile App Development',
            'SaaS Product Development',
            'Cloud-Based Solutions',
        ],

        'faq_key'      => 'faq_location_usa_georgia',
        'faq_title'    => 'Frequently asked questions from Georgia teams',
        'faq_subtitle' => 'Answers to common questions from founders and product leaders across Georgia. You can always reach out if you do not see your question here.',
        'faq_bullets' => [
            '✓ Built for Georgia companies that need visibility, not black-box outsourcing.',
            '✓ Helps teams move away from spreadsheets and ad-hoc tools into stable platforms.',
            '✓ IP and long-term support structured so you are never locked into a single vendor.',
        ],


        'seo' => [
            'h1'               => 'Custom Software Development Company for Georgia Businesses',
            'meta_title'       => 'Custom Software Development in Georgia, USA – QalbIT',
            'meta_description' => 'QalbIT is a remote-first custom software development company helping Georgia businesses build SaaS products, web applications and mobile apps with predictable delivery and product thinking.',
            'canonical'        => '/usa/georgia/',
            'faq_key'          => 'location_usa_georgia',
            'breadcrumbs'      => [
                ['label' => 'Home',        'url' => '/'],
                ['label' => 'Georgia, USA','url' => '/usa/georgia/'],
            ],
        ],

        'summary' => [
            'eyebrow' => 'Custom Software Development in Georgia, USA',
            'title'   => 'Remote custom software partner for Georgia startups and enterprises',
            'intro'   => 'QalbIT helps Georgia product teams and founders in Atlanta and across the state design, build and scale SaaS products, internal tools and mobile apps with a dedicated remote engineering squad.',
        ],

        'sections' => [
            // S1 – Hero
            'hero' => [
                'id'       => 'location-hero',
                'section'  => 'hero',
                'eyebrow'  => 'Custom Software Development in Georgia, USA',
                'title'    => 'Custom Software Development Company for Georgia Businesses',
                'subtitle' => 'Build and scale SaaS, web and mobile products with a senior remote team that understands the expectations of Georgia’s research, healthcare and technology ecosystem.',
                'body'     => 'From early-stage MVPs in the Research Triangle to internal platforms for Charlotte-based teams, QalbIT partners with Georgia founders and product leaders to design, build and iterate software that supports customers and operations.',

                'primary_cta' => [
                    'label' => 'Schedule a discovery call',
                    'url'   => '/contact-us/',
                    'style' => 'primary',
                ],
                'secondary_cta' => [
                    'label' => 'See how we work',
                    'url'   => '/engagement-model/',
                    'style' => 'ghost',
                ],

                'trust' => [
                    'label' => 'Trusted by teams in the US, UK and GCC',
                    'items' => [
                        ['label' => '10+ years in custom software',      'icon' => null],
                        ['label' => 'Products used in 15+ countries',    'icon' => null],
                        ['label' => 'Founders and CTOs as core clients', 'icon' => null],
                    ],
                ],
                'meta' => [
                    'theme' => 'light-hero',
                ],
            ],

            // S2 – About
            'about' => [
                'id'      => 'location-about',
                'section' => 'about',
                'eyebrow' => 'About QalbIT',
                'title'   => 'A remote custom software partner for Georgia startups and enterprises',
                'intro'   => 'QalbIT is a product-driven engineering studio working with Georgia founders, CTOs and business leaders to plan, build and maintain digital products. The focus is on long-term partnership instead of short, transactional projects.',

                'highlights' => [
                    [
                        'label'       => '12+ years building products',
                        'description' => 'Experience shipping complex SaaS, marketplaces, internal tools and ERP-style systems across multiple industries.',
                    ],
                    [
                        'label'       => 'US East Coast friendly collaboration',
                        'description' => 'Overlap with Eastern time for planning, reviews and critical releases, supported by structured rituals and clear written communication.',
                    ],
                    [
                        'label'       => 'Full-stack product teams',
                        'description' => 'Design, frontend, backend, mobile and QA aligned to your roadmap rather than isolated freelancers.',
                    ],
                    [
                        'label'       => 'Security and compliance aware',
                        'description' => 'Secure architectures, role-based access and stable deployment pipelines from day one.',
                    ],
                ],
            ],

            // S3 – Services
            'services' => [
                'id'      => 'location-services',
                'section' => 'services',
                'eyebrow' => 'Services',
                'title'   => 'Custom software development services for Georgia businesses',
                'intro'   => 'Whether launching a new product, modernising a legacy system or scaling an existing platform, QalbIT brings architecture, engineering and product thinking tailored for Georgia teams.',

                'items' => [
                    [
                        'key'         => 'custom-software',
                        'label'       => 'Custom Software Development',
                        'description' => 'End-to-end web application development tailored to specific workflows, roles and security requirements.',
                        'url'         => '/services/custom-software-development/',
                    ],
                    [
                        'key'         => 'saas-mvp',
                        'label'       => 'SaaS and MVP Development',
                        'description' => 'Design and deliver investor-ready MVPs and SaaS platforms, with a focus on validating ideas quickly.',
                        'url'         => '/start-up-mvp/',
                    ],
                    [
                        'key'         => 'mobile-apps',
                        'label'       => 'Mobile App Development',
                        'description' => 'Flutter and cross-platform mobile apps integrated with existing systems and analytics.',
                        'url'         => '/services/mobile-app-development/',
                    ],
                    [
                        'key'         => 'api-backend',
                        'label'       => 'API and Backend Engineering',
                        'description' => 'Secure APIs, integrations and background jobs running on modern PHP and Node stacks and cloud infrastructure.',
                        'url'         => '/services/api-development/',
                    ],
                    [
                        'key'         => 'cloud-devops',
                        'label'       => 'Cloud and DevOps',
                        'description' => 'CI/CD pipelines, environment strategy and observability so releases to Georgia customers remain stable.',
                        'url'         => '/services/cloud-based-solutions/',
                    ],
                    [
                        'key'         => 'dedicated-team',
                        'label'       => 'Dedicated Product Team',
                        'description' => 'A stable remote squad that works like an extension of your Georgia product and engineering team.',
                        'url'         => '/engagement-models/',
                    ],
                ],
            ],

            // S4 – Why QalbIT
            'why' => [
                'id'      => 'location-why',
                'section' => 'why',
                'eyebrow' => 'Why QalbIT',
                'title'   => 'Why Georgia teams choose QalbIT as their custom software partner',
                'intro'   => 'Georgia organisations span technology, healthcare, education, logistics and professional services. QalbIT is designed to support this mix with structured delivery and senior oversight.',

                'reasons' => [
                    [
                        'label'       => 'Remote, but in sync with Eastern time',
                        'description' => 'Overlap with ET working hours for planning, reviews and critical releases, while using an offshore team to maintain throughput.',
                        'bullets'     => [
                            'Regular stand-ups and demos in Georgia friendly hours.',
                            'Asynchronous updates, Loom walkthroughs and clear documentation.',
                        ],
                    ],
                    [
                        'label'       => 'Product mindset, not just billable hours',
                        'description' => 'Focus on outcomes, activation metrics and technical debt instead of only closing tickets.',
                        'bullets'     => [
                            'Support for scoping, sequencing and launch strategy.',
                            'Balance speed with long-term maintainability.',
                        ],
                    ],
                    [
                        'label'       => 'Transparent, predictable delivery',
                        'description' => 'Roadmap, current work and risks stay visible at all times through simple project rituals and tools.',
                        'bullets'     => [
                            'Structured sprints with clear acceptance criteria.',
                            'Access to staging environments and progress dashboards.',
                        ],
                    ],
                    [
                        'label'       => 'Secure, scalable foundations',
                        'description' => 'Architectures ready for compliance, audits and growth as your organisation scales in Georgia and beyond.',
                        'bullets'     => [
                            'Role-based access, audit trails and logging by default.',
                            'Cloud-native deployments with backups and monitoring.',
                        ],
                    ],
                ],
            ],

            // S5 – Process
            'process' => [
                'id'      => 'location-process',
                'section' => 'process',
                'eyebrow' => 'Process',
                'title'   => 'A proven product development process for Georgia businesses',
                'intro'   => 'QalbIT uses a structured delivery process that reduces risk, keeps stakeholders aligned and protects key releases.',

                'steps' => [
                    [
                        'label'       => 'Discover and define',
                        'description' => 'Align on goals, constraints, success metrics and scope before anyone writes code.',
                        'related'     => 'start-up-mvp',
                    ],
                    [
                        'label'       => 'Design and validate',
                        'description' => 'User flows, wireframes and UI prototypes so Georgia stakeholders can react early and refine priorities.',
                        'related'     => 'start-up-mvp',
                    ],
                    [
                        'label'       => 'Build iteratively',
                        'description' => 'Ship in small, reviewable increments using modern practices across frontend, backend and mobile.',
                        'related'     => 'product-scaling',
                    ],
                    [
                        'label'       => 'Launch and stabilise',
                        'description' => 'Roll out to customers, stabilise production and capture the right metrics.',
                        'related'     => 'product-scaling',
                    ],
                    [
                        'label'       => 'Improve and extend',
                        'description' => 'Ongoing iterations, new modules and performance work once the first launch is live.',
                        'related'     => 'digital-transformation',
                    ],
                ],

                'links' => [
                    [
                        'label' => 'See our full product development approach',
                        'url'   => '/start-up-mvp/',
                    ],
                    [
                        'label' => 'How we support scaling products',
                        'url'   => '/product-scaling/',
                    ],
                ],
            ],

            // S6 – Engagements
            'engagements' => [
                'id'      => 'location-engagements',
                'section' => 'engagements',
                'eyebrow' => 'Engagement Models',
                'title'   => 'Flexible engagement options for Georgia teams',
                'intro'   => 'Select an engagement model that fits your product stage, budget and internal capacity, with room to adjust as needs evolve.',

                'models' => [
                    [
                        'key'         => 'fixed-scope',
                        'label'       => 'Fixed scope project',
                        'description' => 'Well-defined projects with clear timelines, deliverables and pricing – ideal for MVPs and redesigns.',
                        'best_for'    => 'Founders and teams with a clear scope and deadline.',
                        'link'        => '/start-up-mvp/',
                    ],
                    [
                        'key'         => 'dedicated-squad',
                        'label'       => 'Dedicated product squad',
                        'description' => 'A cross-functional team (PM, designers, engineers) acting as an extension of your Georgia product organisation.',
                        'best_for'    => 'Scale-ups and enterprises with a continuous roadmap.',
                        'link'        => '/engagement-models/',
                    ],
                    [
                        'key'         => 'continuous-support',
                        'label'       => 'Continuous improvement and support',
                        'description' => 'Lightweight retainer to handle maintenance, small improvements and on-call fixes.',
                        'best_for'    => 'Teams that need predictable care for existing platforms.',
                        'link'        => '/digital-transformation/',
                    ],
                ],
            ],

            // S7 – Tech
            'tech' => [
                'id'      => 'location-tech',
                'section' => 'tech',
                'eyebrow' => 'Technologies',
                'title'   => 'Modern tech stack for Georgia software projects',
                'intro'   => 'QalbIT combines modern frontend frameworks, robust backend platforms and cloud-native infrastructure to build software that can grow with Georgia organisations.',

                'categories' => [
                    [
                        'label'  => 'Frontend',
                        'items'  => ['React', 'Next.js', 'Vue.js', 'Tailwind CSS'],
                    ],
                    [
                        'label'  => 'Backend and APIs',
                        'items'  => ['Node.js', 'NestJS', 'PHP', 'Laravel'],
                    ],
                    [
                        'label'  => 'Mobile',
                        'items'  => ['Flutter', 'React Native'],
                    ],
                    [
                        'label'  => 'Cloud and Databases',
                        'items'  => ['AWS', 'GCP', 'PostgreSQL', 'MySQL', 'Redis'],
                    ],
                ],

                'links' => [
                    [
                        'label' => 'Explore our full tech stack',
                        'url'   => '/technologies/',
                    ],
                ],
            ],

            // S8 – Proof
            'proof' => [
                'id'      => 'location-proof',
                'section' => 'proof',
                'eyebrow' => 'Case Studies',
                'title'   => 'Real products shipped with QalbIT',
                'intro'   => 'These examples show the kind of platforms and tools QalbIT has helped design, build and scale. More detailed case studies can be shared during discussions.',

                'cases' => [
                    [
                        'label'       => 'B2B SaaS platform',
                        'industry'    => 'SaaS / B2B',
                        'region'      => 'North America and Europe',
                        'headline'    => 'Helped a SaaS team refactor and scale a product used by enterprise clients.',
                        'result'      => 'Improved stability, enabled new modules and reduced deployment friction.',
                        'url'         => '/portfolio/',
                    ],
                    [
                        'label'       => 'Operations and logistics tools',
                        'industry'    => 'Logistics / Operations',
                        'region'      => 'Global',
                        'headline'    => 'Built internal tools to digitise paper-heavy workflows and approvals.',
                        'result'      => 'Around 40% faster processing and better visibility for operations teams.',
                        'url'         => '/portfolio/',
                    ],
                ],

                'testimonials' => [
                    [
                        'quote'  => 'QalbIT integrated with our existing processes and helped us keep releases predictable while improving quality.',
                        'name'   => 'Founder and CEO',
                        'title'  => 'B2B SaaS company',
                        'region' => 'US-based',
                    ],
                ],
            ],

            // S10 – Final CTA
            'final_cta' => [
                'id'      => 'location-final-cta',
                'section' => 'final_cta',
                'eyebrow' => 'Start your project',
                'title'   => 'Discuss your custom software project in Georgia',
                'body'    => 'Share a bit about your product, timelines and goals, and QalbIT will respond with next steps and a suggested engagement model within one business day.',

                'primary_cta' => [
                    'label' => 'Request a free consultation',
                    'url'   => '/contact-us/',
                ],
                'secondary_cta' => [
                    'label' => 'Book a call on Calendly',
                    'url'   => 'https://calendly.com/abidhusain-qalbit/discuss-project',
                ],

                'meta' => [
                    'show_form' => true,
                    'theme'     => 'light',
                ],
            ],
        ],
    ],

    // -------------------------------------------------
    // New York, USA
    // -------------------------------------------------
    'newyork' => [
        // Core routing / identification
        'slug'         => '/usa/newyork/',
        'template'     => 'pages/locations/show',
        'country_key'  => 'usa',
        'country_name' => 'United States',
        'state_key'    => 'newyork',

        'name'       => 'New York, USA',
        'short_name' => 'New York',
        'enabled'    => true,
        'order'      => 10,

        // Backward-compatible SEO fields
        'meta_title' => 'Custom Software Development in New York, USA – QalbIT',
        'meta_description' => 'QalbIT provides custom software, web and mobile app development services to startups and enterprises across New York, USA. Partner with a dedicated remote team to design, build and scale your digital products.',
        'headline' => 'Custom Software Development in New York, USA',
        'short_description' => 'End-to-end web, mobile and cloud solutions for New York startups, scale-ups and enterprises.',

        // Optional – used if you still need it somewhere else
        'focus_services' => [
            'Custom Software Development',
            'Web Development',
            'Mobile App Development',
            'SaaS Product Development',
            'Cloud-Based Solutions',
        ],

        // Normalised SEO block for the new template
        'faq_key' => 'faq_location_usa_new_york',
        'faq_title' => 'Frequently asked questions from New York teams',
        'faq_subtitle' => 'Answers to common questions from founders and product leaders across New York. You can always reach out if you do not see your question here.',
        'faq_bullets' => [
            '✓ Focused on remote collaboration with New York founders and product leaders.',
            '✓ Clear expectations on scope, timelines and budgets before we start building.',
            '✓ IP, code ownership and NDAs handled cleanly under US-friendly contracts.',
        ],

        'seo' => [
            'h1'               => 'Custom Software Development Company for New York Businesses',
            'meta_title'       => 'Custom Software Development in New York, USA – QalbIT',
            'meta_description' => 'QalbIT is a remote-first custom software development company helping New York businesses build SaaS products, web applications and mobile apps with predictable delivery and product thinking.',
            'canonical'        => '/usa/newyork/',
            'faq_key'          => 'location_usa_new_york',
            'breadcrumbs'      => [
                ['label' => 'Home',          'url' => '/'],
                ['label' => 'New York, USA', 'url' => '/usa/newyork/'],
            ],
        ],

        // High-level summary (optional convenience for cards, previews, etc.)
        'summary' => [
            'eyebrow' => 'Custom Software Development in New York, USA',
            'title'   => 'Remote custom software partner for New York startups and enterprises',
            'intro'   => 'QalbIT helps New York product teams and founders design, build and scale SaaS products, internal tools and mobile apps with a dedicated remote engineering squad that fits your roadmap, budget and timelines.',
        ],

        // -------------------------------------------------
        // Sections S1–S10
        // -------------------------------------------------

        'sections' => [

            // S1 – Location hero & primary CTA
            'hero' => [
                'id'       => 'location-hero',
                'section'  => 'hero',
                'eyebrow'  => 'Custom Software Development in New York, USA',
                'title'    => 'Custom Software Development Company for New York Businesses',
                'subtitle' => 'Build and scale SaaS, web and mobile products with a senior remote team that understands New York’s pace and expectations.',
                'body'     => 'From early-stage MVPs to enterprise modernization, QalbIT partners with New York founders and product leaders to design, build and iterate software that moves the needle for your customers and stakeholders.',

                'primary_cta' => [
                    'label' => 'Schedule a discovery call',
                    'url'   => '/contact-us/',
                    'style' => 'primary',
                ],
                'secondary_cta' => [
                    'label' => 'See how we work',
                    'url'   => '/engagement-model/',
                    'style' => 'ghost',
                ],

                'trust' => [
                    'label' => 'Trusted by teams in the US, UK and GCC',
                    'items' => [
                        ['label' => '10+ years in custom software', 'icon' => null],
                        ['label' => 'Products used in 15+ countries', 'icon' => null],
                        ['label' => 'Founders & CTOs as core clients', 'icon' => null],
                    ],
                ],
                'meta' => [
                    'theme' => 'light-hero', // can be used by template to choose bg
                ],
            ],

            // S2 – About QalbIT for New York businesses
            'about' => [
                'id'      => 'location-about',
                'section' => 'about',
                'eyebrow' => 'About QalbIT',
                'title'   => 'A remote custom software partner for New York startups & enterprises',
                'intro'   => 'QalbIT is a product-driven engineering studio working with New York founders, CTOs and business leaders to plan, build and maintain digital products. We plug in as your long-term delivery arm rather than a one-off outsourcing vendor.',

                'highlights' => [
                    [
                        'label'       => '12+ years building products',
                        'description' => 'Experience shipping complex SaaS, marketplaces, internal tools and ERP-style systems for global customers.',
                    ],
                    [
                        'label'       => 'US-friendly collaboration',
                        'description' => 'Overlap with Eastern and Central time zones, structured rituals and clear written communication.',
                    ],
                    [
                        'label'       => 'Full-stack product teams',
                        'description' => 'Design, frontend, backend, mobile and QA aligned to your roadmap instead of isolated freelancers.',
                    ],
                    [
                        'label'       => 'Security & compliance aware',
                        'description' => 'Secure architectures, role-based access and stable deployment pipelines from day one.',
                    ],
                ],
            ],

            // S3 – Custom software services for New York
            'services' => [
                'id'      => 'location-services',
                'section' => 'services',
                'eyebrow' => 'Services',
                'title'   => 'Custom software development services for New York businesses',
                'intro'   => 'Whether you are validating a new product, modernising a legacy system or scaling an existing platform, QalbIT brings the right mix of architecture, engineering and product thinking for New York teams.',

                'items' => [
                    [
                        'key'         => 'custom-software',
                        'label'       => 'Custom Software Development',
                        'description' => 'End-to-end web application development tailored to your workflows, roles and security requirements.',
                        'url'         => '/services/custom-software-development/',
                    ],
                    [
                        'key'         => 'saas-mvp',
                        'label'       => 'SaaS & MVP Development',
                        'description' => 'Design and deliver investor-ready MVPs and SaaS platforms with a focus on fast learning and clean architecture.',
                        'url'         => '/start-up-mvp/',
                    ],
                    [
                        'key'         => 'mobile-apps',
                        'label'       => 'Mobile App Development',
                        'description' => 'Flutter and cross-platform mobile apps that integrate with your existing systems and analytics.',
                        'url'         => '/services/mobile-app-development/',
                    ],
                    [
                        'key'         => 'api-backend',
                        'label'       => 'API & Backend Engineering',
                        'description' => 'Secure APIs, integrations and background jobs running on modern PHP/Node stacks and cloud infrastructure.',
                        'url'         => '/services/api-development/',
                    ],
                    [
                        'key'         => 'cloud-devops',
                        'label'       => 'Cloud & DevOps',
                        'description' => 'CI/CD pipelines, environment strategy and observability so releases to your New York customers stay stable.',
                        'url'         => '/services/cloud-based-solutions/',
                    ],
                    [
                        'key'         => 'dedicated-team',
                        'label'       => 'Dedicated Product Team',
                        'description' => 'Scale with a stable remote squad that works like an extension of your New York product and engineering team.',
                        'url'         => '/engagement-models/',
                    ],
                ],
            ],

            // S4 – Why QalbIT for custom software in New York
            'why' => [
                'id'      => 'location-why',
                'section' => 'why',
                'eyebrow' => 'Why QalbIT',
                'title'   => 'Why New York teams choose QalbIT as their custom software partner',
                'intro'   => 'New York products move fast and expectations are high. QalbIT is set up to handle that pace with structured delivery, senior oversight and honest communication.',

                'reasons' => [
                    [
                        'label'       => 'Remote, but in sync with your time zone',
                        'description' => 'Overlap with EST working hours for planning, reviews and critical releases, while leveraging an offshore team for faster throughput.',
                        'bullets'     => [
                            'Regular stand-ups and demos on New York-friendly hours.',
                            'Asynchronous updates, Loom walkthroughs and clear written docs.',
                        ],
                    ],
                    [
                        'label'       => 'Product mindset, not just billable hours',
                        'description' => 'We think in terms of outcomes, activation metrics and technical debt instead of simply delivering tickets.',
                        'bullets'     => [
                            'Help with scoping, sequencing and launch strategy.',
                            'Balance between speed and long-term maintainability.',
                        ],
                    ],
                    [
                        'label'       => 'Transparent, predictable delivery',
                        'description' => 'You see the roadmap, current work and risks at all times through simple project rituals and tools.',
                        'bullets'     => [
                            'Structured sprints with clear acceptance criteria.',
                            'Access to staging environments and progress dashboards.',
                        ],
                    ],
                    [
                        'label'       => 'Secure, scalable foundations',
                        'description' => 'Architectures ready for compliance, audits and growth as you scale in New York and beyond.',
                        'bullets'     => [
                            'Role-based access, audit trails and logging by default.',
                            'Cloud-native deployments with backups and monitoring.',
                        ],
                    ],
                ],
            ],

            // S5 – Our product development process (summary)
            'process' => [
                'id'      => 'location-process',
                'section' => 'process',
                'eyebrow' => 'Process',
                'title'   => 'A proven product development process for New York businesses',
                'intro'   => 'We rely on a clear, battle-tested delivery process that reduces risk, keeps stakeholders aligned and protects your New York launches from surprise delays.',

                'steps' => [
                    [
                        'label'       => 'Discover & define',
                        'description' => 'We align on goals, constraints, success metrics and scope before anyone writes code.',
                        'related'     => 'start-up-mvp',
                    ],
                    [
                        'label'       => 'Design & validate',
                        'description' => 'User flows, wireframes and UI prototypes so New York stakeholders can react early and give feedback.',
                        'related'     => 'start-up-mvp',
                    ],
                    [
                        'label'       => 'Build iteratively',
                        'description' => 'We ship in small, reviewable increments using modern practices across frontend, backend and mobile.',
                        'related'     => 'product-scaling',
                    ],
                    [
                        'label'       => 'Launch & stabilise',
                        'description' => 'We help you roll out to customers, stabilise production and capture the right metrics.',
                        'related'     => 'product-scaling',
                    ],
                    [
                        'label'       => 'Improve & extend',
                        'description' => 'Ongoing iterations, new modules and performance work once the first launch is live.',
                        'related'     => 'digital-transformation',
                    ],
                ],

                'links' => [
                    [
                        'label' => 'See our full product development approach',
                        'url'   => '/start-up-mvp/',
                    ],
                    [
                        'label' => 'How we support scaling products',
                        'url'   => '/product-scaling/',
                    ],
                ],
            ],

            // S6 – Engagement models for New York companies
            'engagements' => [
                'id'      => 'location-engagements',
                'section' => 'engagements',
                'eyebrow' => 'Engagement Models',
                'title'   => 'Flexible engagement options for New York teams',
                'intro'   => 'Choose an engagement style that fits your product stage, budget and internal capacity. You can always switch as your needs evolve.',

                'models' => [
                    [
                        'key'         => 'fixed-scope',
                        'label'       => 'Fixed-scope project',
                        'description' => 'Well-defined projects with clear timelines, deliverables and pricing – ideal for MVPs and redesigns.',
                        'best_for'    => 'Founders and teams with a clear scope and deadline.',
                        'link'        => '/start-up-mvp/',
                    ],
                    [
                        'key'         => 'dedicated-squad',
                        'label'       => 'Dedicated product squad',
                        'description' => 'A cross-functional team (PM, designers, engineers) that works as an extension of your New York product organisation.',
                        'best_for'    => 'Scale-ups and enterprises with a continuous roadmap.',
                        'link'        => '/engagement-models/',
                    ],
                    [
                        'key'         => 'continuous-support',
                        'label'       => 'Continuous improvement & support',
                        'description' => 'Lightweight retainer to handle maintenance, small improvements and on-call fixes for your live products.',
                        'best_for'    => 'Teams that want predictable care for existing platforms.',
                        'link'        => '/digital-transformation/',
                    ],
                ],
            ],

            // S7 – Tech stack & capabilities
            'tech' => [
                'id'      => 'location-tech',
                'section' => 'tech',
                'eyebrow' => 'Technologies',
                'title'   => 'Modern tech stack for New York software projects',
                'intro'   => 'We combine modern frontend frameworks, robust backend platforms and cloud-native infrastructure to build software that can grow with your New York business.',

                'categories' => [
                    [
                        'label'  => 'Frontend',
                        'items'  => ['React', 'Next.js', 'Vue.js', 'Tailwind CSS'],
                    ],
                    [
                        'label'  => 'Backend & APIs',
                        'items'  => ['Node.js', 'NestJS', 'PHP', 'Laravel'],
                    ],
                    [
                        'label'  => 'Mobile',
                        'items'  => ['Flutter', 'React Native'],
                    ],
                    [
                        'label'  => 'Cloud & Databases',
                        'items'  => ['AWS', 'GCP', 'PostgreSQL', 'MySQL', 'Redis'],
                    ],
                ],

                'links' => [
                    [
                        'label' => 'Explore our full tech stack',
                        'url'   => '/technologies/',
                    ],
                ],
            ],

            // S8 – Selected work & social proof
            'proof' => [
                'id'      => 'location-proof',
                'section' => 'proof',
                'eyebrow' => 'Case Studies',
                'title'   => 'Real products shipped with QalbIT',
                'intro'   => 'Here are a few examples of platforms and tools we have helped design, build and scale. More detailed case studies are available on request.',

                'cases' => [
                    [
                        'label'       => 'B2B SaaS platform',
                        'industry'    => 'SaaS / B2B',
                        'region'      => 'North America & Europe',
                        'headline'    => 'Helped a SaaS team refactor and scale their product used by enterprise clients.',
                        'result'      => 'Improved stability, enabled new modules and reduced deployment friction.',
                        'url'         => '/portfolio/',
                    ],
                    [
                        'label'       => 'Operations & logistics tools',
                        'industry'    => 'Logistics / Operations',
                        'region'      => 'Global',
                        'headline'    => 'Built internal tools to digitise paper-heavy workflows and approvals.',
                        'result'      => '40% faster processing and better visibility for operations teams.',
                        'url'         => '/portfolio/',
                    ],
                ],

                'testimonials' => [
                    [
                        'quote'  => 'QalbIT felt like an extension of our own team – responsive, structured and honest about trade-offs.',
                        'name'   => 'Founder & CEO',
                        'title'  => 'B2B SaaS company',
                        'region' => 'US-based',
                    ],
                ],
            ],

            // S10 – Final CTA band
            'final_cta' => [
                'id'      => 'location-final-cta',
                'section' => 'final_cta',
                'eyebrow' => 'Start your project',
                'title'   => 'Discuss your custom software project in New York',
                'body'    => 'Share a bit about your product, timelines and goals, and we will come back with next steps and a suggested engagement model within one business day.',

                'primary_cta' => [
                    'label' => 'Request a free consultation',
                    'url'   => '/contact-us/',
                ],
                'secondary_cta' => [
                    'label' => 'Book a call on Calendly',
                    'url'   => 'https://calendly.com/abidhusain-qalbit/discuss-project',
                ],

                'meta' => [
                    'show_form' => true,
                    'theme'     => 'light',
                ],
            ],
        ],
    ],

    // -------------------------------------------------
    // Florida, USA
    // -------------------------------------------------
    'florida' => [
        // Core routing / identification
        'slug'         => '/usa/florida/',
        'template'     => 'pages/locations/show',
        'country_key'  => 'usa',
        'country_name' => 'United States',
        'state_key'    => 'florida',

        'name'       => 'Florida, USA',
        'short_name' => 'Florida',
        'enabled'    => true,
        'order'      => 120,

        // Backward-compatible SEO fields
        'meta_title' => 'Custom Software Development in Florida, USA – QalbIT',
        'meta_description' => 'QalbIT provides custom software, web and mobile app development services to startups and enterprises across Florida, USA – from Miami and Orlando to Tampa and Jacksonville. Partner with a dedicated remote team to design, build and scale your digital products.',
        'headline' => 'Custom Software Development in Florida, USA',
        'short_description' => 'End-to-end web, mobile and cloud solutions for Florida startups, scale-ups and enterprises.',

        'focus_services' => [
            'Custom Software Development',
            'Web Development',
            'Mobile App Development',
            'SaaS Product Development',
            'Cloud-Based Solutions',
        ],

        // Normalised SEO block
        'faq_key'      => 'faq_location_usa_florida',
        'faq_title'    => 'Frequently asked questions from Florida teams',
        'faq_subtitle' => 'Answers to common questions from founders and product leaders across Florida. You can always reach out if you do not see your question here.',
        'faq_bullets' => [
            '✓ Good fit for Florida businesses in competitive, customer-facing markets.',
            '✓ Emphasis on performance, UX and reliability for web and mobile front-ends.',
            '✓ Clear ownership of code and data so you can scale or switch vendors if needed.',
        ],

        'seo' => [
            'h1'               => 'Custom Software Development Company for Florida Businesses',
            'meta_title'       => 'Custom Software Development in Florida, USA – QalbIT',
            'meta_description' => 'QalbIT is a remote-first custom software development company helping Florida businesses build SaaS products, web applications and mobile apps with predictable delivery and product thinking.',
            'canonical'        => '/usa/florida/',
            'faq_key'          => 'location_usa_florida',
            'breadcrumbs'      => [
                ['label' => 'Home',          'url' => '/'],
                ['label' => 'Florida, USA',  'url' => '/usa/florida/'],
            ],
        ],

        'summary' => [
            'eyebrow' => 'Custom Software Development in Florida, USA',
            'title'   => 'Remote custom software partner for Florida startups and enterprises',
            'intro'   => 'QalbIT helps Florida product teams and founders in Miami, Orlando, Tampa, Jacksonville and beyond design, build and scale SaaS products, internal tools and mobile apps with a dedicated remote engineering squad.',
        ],

        'sections' => [

            // S1 – Hero
            'hero' => [
                'id'       => 'location-hero',
                'section'  => 'hero',
                'eyebrow'  => 'Custom Software Development in Florida, USA',
                'title'    => 'Custom Software Development Company for Florida Businesses',
                'subtitle' => 'Build and scale SaaS, web and mobile products with a senior remote team that understands the expectations of Florida’s technology, tourism, healthcare and logistics companies.',
                'body'     => 'From early-stage MVPs in Miami and Orlando to internal platforms for Tampa and Jacksonville-based teams, QalbIT partners with Florida founders and product leaders to design, build and iterate software that supports customers and operations.',

                'primary_cta' => [
                    'label' => 'Schedule a discovery call',
                    'url'   => '/contact-us/',
                    'style' => 'primary',
                ],
                'secondary_cta' => [
                    'label' => 'See how we work',
                    'url'   => '/engagement-model/',
                    'style' => 'ghost',
                ],

                'trust' => [
                    'label' => 'Trusted by teams in the US, UK and GCC',
                    'items' => [
                        ['label' => '10+ years in custom software',      'icon' => null],
                        ['label' => 'Products used in 15+ countries',    'icon' => null],
                        ['label' => 'Founders and CTOs as core clients', 'icon' => null],
                    ],
                ],
                'meta' => [
                    'theme' => 'light-hero',
                ],
            ],

            // S2 – About
            'about' => [
                'id'      => 'location-about',
                'section' => 'about',
                'eyebrow' => 'About QalbIT',
                'title'   => 'A remote custom software partner for Florida startups and enterprises',
                'intro'   => 'QalbIT is a product-driven engineering studio working with Florida founders, CTOs and business leaders to plan, build and maintain digital products. The engagement is structured as a long-term partnership rather than a short, transactional project.',

                'highlights' => [
                    [
                        'label'       => '12+ years building products',
                        'description' => 'Experience shipping complex SaaS, marketplaces, internal tools and ERP-style systems for global customers.',
                    ],
                    [
                        'label'       => 'US East time friendly collaboration',
                        'description' => 'Overlap with Eastern time for planning, reviews and critical releases, supported by structured rituals and clear written communication.',
                    ],
                    [
                        'label'       => 'Full-stack product teams',
                        'description' => 'Design, frontend, backend, mobile and QA aligned to your roadmap instead of isolated freelancers.',
                    ],
                    [
                        'label'       => 'Security and compliance aware',
                        'description' => 'Secure architectures, role-based access and stable deployment pipelines from day one.',
                    ],
                ],
            ],

            // S3 – Services
            'services' => [
                'id'      => 'location-services',
                'section' => 'services',
                'eyebrow' => 'Services',
                'title'   => 'Custom software development services for Florida businesses',
                'intro'   => 'Whether you are launching a new product, modernising legacy systems or scaling an existing platform, QalbIT brings architecture, engineering and product thinking tailored for Florida teams.',

                'items' => [
                    [
                        'key'         => 'custom-software',
                        'label'       => 'Custom Software Development',
                        'description' => 'End-to-end web application development tailored to specific workflows, roles and security requirements.',
                        'url'         => '/services/custom-software-development/',
                    ],
                    [
                        'key'         => 'saas-mvp',
                        'label'       => 'SaaS & MVP Development',
                        'description' => 'Design and deliver investor-ready MVPs and SaaS platforms, with a focus on validating ideas quickly.',
                        'url'         => '/start-up-mvp/',
                    ],
                    [
                        'key'         => 'mobile-apps',
                        'label'       => 'Mobile App Development',
                        'description' => 'Flutter and cross-platform mobile apps integrated with existing systems and analytics.',
                        'url'         => '/services/mobile-app-development/',
                    ],
                    [
                        'key'         => 'api-backend',
                        'label'       => 'API & Backend Engineering',
                        'description' => 'Secure APIs, integrations and background jobs running on modern PHP and Node stacks and cloud infrastructure.',
                        'url'         => '/services/api-development/',
                    ],
                    [
                        'key'         => 'cloud-devops',
                        'label'       => 'Cloud & DevOps',
                        'description' => 'CI/CD pipelines, environment strategy and observability so releases to Florida customers remain stable.',
                        'url'         => '/services/cloud-based-solutions/',
                    ],
                    [
                        'key'         => 'dedicated-team',
                        'label'       => 'Dedicated Product Team',
                        'description' => 'A stable remote squad that works like an extension of your Florida product and engineering team.',
                        'url'         => '/engagement-models/',
                    ],
                ],
            ],

            // S4 – Why QalbIT
            'why' => [
                'id'      => 'location-why',
                'section' => 'why',
                'eyebrow' => 'Why QalbIT',
                'title'   => 'Why Florida teams choose QalbIT as their custom software partner',
                'intro'   => 'Florida organisations operate in fast-moving sectors such as tourism, logistics, healthcare, fintech and real estate. QalbIT is structured to support that mix with clear delivery practices and senior oversight.',

                'reasons' => [
                    [
                        'label'       => 'Remote, but in sync with Eastern time',
                        'description' => 'Overlap with ET working hours for planning, reviews and critical releases, while using an offshore team to keep momentum high.',
                        'bullets'     => [
                            'Regular stand-ups and demos in Florida-friendly hours.',
                            'Asynchronous updates, Loom walkthroughs and clear documentation.',
                        ],
                    ],
                    [
                        'label'       => 'Product mindset, not just billable hours',
                        'description' => 'Focus on outcomes, activation metrics and technical debt instead of simply closing tickets.',
                        'bullets'     => [
                            'Support with scoping, sequencing and launch strategy.',
                            'Balance between shipping speed and long-term maintainability.',
                        ],
                    ],
                    [
                        'label'       => 'Transparent, predictable delivery',
                        'description' => 'Roadmap, current work and risks remain visible at all times through simple project rituals and tools.',
                        'bullets'     => [
                            'Structured sprints with clear acceptance criteria.',
                            'Access to staging environments and progress dashboards.',
                        ],
                    ],
                    [
                        'label'       => 'Secure, scalable foundations',
                        'description' => 'Architectures ready for compliance, audits and growth as your products scale across Florida and beyond.',
                        'bullets'     => [
                            'Role-based access, audit trails and logging.',
                            'Cloud-native deployments with backups and monitoring.',
                        ],
                    ],
                ],
            ],

            // S5 – Process
            'process' => [
                'id'      => 'location-process',
                'section' => 'process',
                'eyebrow' => 'Process',
                'title'   => 'A proven product development process for Florida businesses',
                'intro'   => 'QalbIT uses a structured delivery process that reduces risk, keeps stakeholders aligned and protects key launches.',

                'steps' => [
                    [
                        'label'       => 'Discover & define',
                        'description' => 'Align on goals, constraints, success metrics and scope before anyone writes code.',
                        'related'     => 'start-up-mvp',
                    ],
                    [
                        'label'       => 'Design & validate',
                        'description' => 'User flows, wireframes and UI prototypes so Florida stakeholders can react early and refine priorities.',
                        'related'     => 'start-up-mvp',
                    ],
                    [
                        'label'       => 'Build iteratively',
                        'description' => 'Ship in small, reviewable increments using modern practices across frontend, backend and mobile.',
                        'related'     => 'product-scaling',
                    ],
                    [
                        'label'       => 'Launch & stabilise',
                        'description' => 'Roll out to customers, stabilise production and capture the right metrics.',
                        'related'     => 'product-scaling',
                    ],
                    [
                        'label'       => 'Improve & extend',
                        'description' => 'Ongoing iterations, new modules and performance work once the first launch is live.',
                        'related'     => 'digital-transformation',
                    ],
                ],

                'links' => [
                    [
                        'label' => 'See our full product development approach',
                        'url'   => '/start-up-mvp/',
                    ],
                    [
                        'label' => 'How we support scaling products',
                        'url'   => '/product-scaling/',
                    ],
                ],
            ],

            // S6 – Engagements
            'engagements' => [
                'id'      => 'location-engagements',
                'section' => 'engagements',
                'eyebrow' => 'Engagement Models',
                'title'   => 'Flexible engagement options for Florida teams',
                'intro'   => 'Select an engagement model that fits your product stage, budget and internal capacity, with room to adjust as needs evolve.',

                'models' => [
                    [
                        'key'         => 'fixed-scope',
                        'label'       => 'Fixed-scope project',
                        'description' => 'Well-defined projects with clear timelines, deliverables and pricing – ideal for MVPs and redesigns.',
                        'best_for'    => 'Founders and teams with a clear scope and deadline.',
                        'link'        => '/start-up-mvp/',
                    ],
                    [
                        'key'         => 'dedicated-squad',
                        'label'       => 'Dedicated product squad',
                        'description' => 'A cross-functional team (PM, designers, engineers) acting as an extension of your Florida product organisation.',
                        'best_for'    => 'Scale-ups and enterprises with a continuous roadmap.',
                        'link'        => '/engagement-models/',
                    ],
                    [
                        'key'         => 'continuous-support',
                        'label'       => 'Continuous improvement & support',
                        'description' => 'Lightweight retainer to handle maintenance, small improvements and on-call fixes.',
                        'best_for'    => 'Teams that need predictable care for existing platforms.',
                        'link'        => '/digital-transformation/',
                    ],
                ],
            ],

            // S7 – Tech
            'tech' => [
                'id'      => 'location-tech',
                'section' => 'tech',
                'eyebrow' => 'Technologies',
                'title'   => 'Modern tech stack for Florida software projects',
                'intro'   => 'QalbIT combines modern frontend frameworks, robust backend platforms and cloud-native infrastructure to build software that can grow with Florida organisations.',

                'categories' => [
                    [
                        'label'  => 'Frontend',
                        'items'  => ['React', 'Next.js', 'Vue.js', 'Tailwind CSS'],
                    ],
                    [
                        'label'  => 'Backend & APIs',
                        'items'  => ['Node.js', 'NestJS', 'PHP', 'Laravel'],
                    ],
                    [
                        'label'  => 'Mobile',
                        'items'  => ['Flutter', 'React Native'],
                    ],
                    [
                        'label'  => 'Cloud & Databases',
                        'items'  => ['AWS', 'GCP', 'PostgreSQL', 'MySQL', 'Redis'],
                    ],
                ],

                'links' => [
                    [
                        'label' => 'Explore our full tech stack',
                        'url'   => '/technologies/',
                    ],
                ],
            ],

            // S8 – Proof
            'proof' => [
                'id'      => 'location-proof',
                'section' => 'proof',
                'eyebrow' => 'Case Studies',
                'title'   => 'Real products shipped with QalbIT',
                'intro'   => 'These examples show the kind of platforms and tools QalbIT has helped design, build and scale. More detailed case studies can be shared during discussions.',

                'cases' => [
                    [
                        'label'       => 'B2B SaaS platform',
                        'industry'    => 'SaaS / B2B',
                        'region'      => 'North America & Europe',
                        'headline'    => 'Helped a SaaS team refactor and scale a product used by enterprise clients.',
                        'result'      => 'Improved stability, enabled new modules and reduced deployment friction.',
                        'url'         => '/portfolio/',
                    ],
                    [
                        'label'       => 'Operations & logistics tools',
                        'industry'    => 'Logistics / Operations',
                        'region'      => 'Global',
                        'headline'    => 'Built internal tools to digitise paper-heavy workflows and approvals.',
                        'result'      => 'Around 40% faster processing and better visibility for operations teams.',
                        'url'         => '/portfolio/',
                    ],
                ],

                'testimonials' => [
                    [
                        'quote'  => 'QalbIT integrated smoothly with our processes and helped us move from ideas to working software without losing momentum.',
                        'name'   => 'Founder & CEO',
                        'title'  => 'US-based SaaS company',
                        'region' => 'United States',
                    ],
                ],
            ],

            // S10 – Final CTA
            'final_cta' => [
                'id'      => 'location-final-cta',
                'section' => 'final_cta',
                'eyebrow' => 'Start your project',
                'title'   => 'Discuss your custom software project in Florida',
                'body'    => 'Share a bit about your product, timelines and goals, and QalbIT will respond with next steps and a suggested engagement model within one business day.',

                'primary_cta' => [
                    'label' => 'Request a free consultation',
                    'url'   => '/contact-us/',
                ],
                'secondary_cta' => [
                    'label' => 'Book a call on Calendly',
                    'url'   => 'https://calendly.com/abidhusain-qalbit/discuss-project',
                ],

                'meta' => [
                    'show_form' => true,
                    'theme'     => 'light',
                ],
            ],
        ],
    ],

    // -------------------------------------------------
    // California, USA
    // -------------------------------------------------
    'california' => [
        // Core routing / identification
        'slug'         => '/usa/california/',
        'template'     => 'pages/locations/show',
        'country_key'  => 'usa',
        'country_name' => 'United States',
        'state_key'    => 'california',

        'name'       => 'California, USA',
        'short_name' => 'California',
        'enabled'    => true,
        'order'      => 30,

        // Backward-compatible SEO fields
        'meta_title' => 'Custom Software Development in California, USA – QalbIT',
        'meta_description' => 'QalbIT provides custom software, web and mobile app development services to startups and enterprises across California, USA – from San Francisco and the Bay Area to Los Angeles and San Diego. Partner with a dedicated remote team to design, build and scale your digital products.',
        'headline' => 'Custom Software Development in California, USA',
        'short_description' => 'End-to-end web, mobile and cloud solutions for California startups, scale-ups and enterprises.',

        'focus_services' => [
            'Custom Software Development',
            'Web Development',
            'Mobile App Development',
            'SaaS Product Development',
            'Cloud-Based Solutions',
        ],

        // Normalised SEO block
        'faq_key'      => 'faq_location_usa_california',
        'faq_title'    => 'Frequently asked questions from California teams',
        'faq_subtitle' => 'Answers to common questions from founders, product leaders and CTOs across California. You can always reach out if you do not see your question here.',
        'faq_bullets' => [
            '✓ Calibrated for California startups and scale-ups that move quickly.',
            '✓ Strong focus on clean architecture, CI/CD and observability from day one.',
            '✓ Code, IP and contracts structured to support fundraising and due diligence.',
        ],


        'seo' => [
            'h1'               => 'Custom Software Development Company for California Businesses',
            'meta_title'       => 'Custom Software Development in California, USA – QalbIT',
            'meta_description' => 'QalbIT is a remote-first custom software development company helping California businesses build SaaS products, web applications and mobile apps with predictable delivery and product thinking.',
            'canonical'        => '/usa/california/',
            'faq_key'          => 'location_usa_california',
            'breadcrumbs'      => [
                ['label' => 'Home',             'url' => '/'],
                ['label' => 'California, USA',  'url' => '/usa/california/'],
            ],
        ],

        'summary' => [
            'eyebrow' => 'Custom Software Development in California, USA',
            'title'   => 'Remote custom software partner for California startups and enterprises',
            'intro'   => 'QalbIT helps California product teams and founders in San Francisco, the Bay Area, Los Angeles, San Diego and beyond design, build and scale SaaS products, internal tools and mobile apps with a dedicated remote engineering squad.',
        ],

        'sections' => [

            // S1 – Hero
            'hero' => [
                'id'       => 'location-hero',
                'section'  => 'hero',
                'eyebrow'  => 'Custom Software Development in California, USA',
                'title'    => 'Custom Software Development Company for California Businesses',
                'subtitle' => 'Build and scale SaaS, web and mobile products with a senior remote team that understands the pace and expectations of California’s startup and enterprise ecosystem.',
                'body'     => 'From venture-backed SaaS products in the Bay Area to internal platforms for Los Angeles and San Diego-based teams, QalbIT partners with California founders and product leaders to design, build and iterate software that supports aggressive roadmaps and scale.',

                'primary_cta' => [
                    'label' => 'Schedule a discovery call',
                    'url'   => '/contact-us/',
                    'style' => 'primary',
                ],
                'secondary_cta' => [
                    'label' => 'See how we work',
                    'url'   => '/engagement-model/',
                    'style' => 'ghost',
                ],

                'trust' => [
                    'label' => 'Trusted by teams in the US, UK and GCC',
                    'items' => [
                        ['label' => '10+ years in custom software',      'icon' => null],
                        ['label' => 'Products used in 15+ countries',    'icon' => null],
                        ['label' => 'Founders and CTOs as core clients', 'icon' => null],
                    ],
                ],
                'meta' => [
                    'theme' => 'light-hero',
                ],
            ],

            // S2 – About
            'about' => [
                'id'      => 'location-about',
                'section' => 'about',
                'eyebrow' => 'About QalbIT',
                'title'   => 'A remote custom software partner for California startups and enterprises',
                'intro'   => 'QalbIT is a product-driven engineering studio working with California founders, CTOs and product leaders to plan, build and maintain SaaS platforms, internal tools and mobile apps. Engagements are designed as long-term partnerships instead of short bursts of outsourced work.',

                'highlights' => [
                    [
                        'label'       => '12+ years building products',
                        'description' => 'Experience shipping complex SaaS, marketplaces, internal tools and ERP-style systems for global customers.',
                    ],
                    [
                        'label'       => 'Aligned with product-led growth',
                        'description' => 'Comfortable working with PMs, designers and revenue teams to support product-led and sales-assisted motions common in California startups.',
                    ],
                    [
                        'label'       => 'Full-stack product teams',
                        'description' => 'Design, frontend, backend, mobile and QA aligned to your roadmap instead of isolated freelancers.',
                    ],
                    [
                        'label'       => 'Security & compliance aware',
                        'description' => 'Secure architectures, role-based access and stable deployment pipelines from day one, ready to support audits and due diligence.',
                    ],
                ],
            ],

            // S3 – Services
            'services' => [
                'id'      => 'location-services',
                'section' => 'services',
                'eyebrow' => 'Services',
                'title'   => 'Custom software development services for California businesses',
                'intro'   => 'Whether you are shipping a new SaaS product, building internal tools for distributed teams or modernising legacy platforms, QalbIT brings architecture, engineering and product thinking that matches California’s pace.',

                'items' => [
                    [
                        'key'         => 'custom-software',
                        'label'       => 'Custom Software Development',
                        'description' => 'End-to-end web application development tailored to your workflows, roles and security requirements.',
                        'url'         => '/services/custom-software-development/',
                    ],
                    [
                        'key'         => 'saas-mvp',
                        'label'       => 'SaaS & MVP Development',
                        'description' => 'Design and deliver investor-ready MVPs and SaaS platforms with a focus on learning quickly from early users.',
                        'url'         => '/start-up-mvp/',
                    ],
                    [
                        'key'         => 'mobile-apps',
                        'label'       => 'Mobile App Development',
                        'description' => 'Flutter and cross-platform mobile apps integrated with your existing systems and analytics.',
                        'url'         => '/services/mobile-app-development/',
                    ],
                    [
                        'key'         => 'api-backend',
                        'label'       => 'API & Backend Engineering',
                        'description' => 'Secure APIs, integrations and background jobs running on modern PHP and Node stacks and cloud infrastructure.',
                        'url'         => '/services/api-development/',
                    ],
                    [
                        'key'         => 'cloud-devops',
                        'label'       => 'Cloud & DevOps',
                        'description' => 'CI/CD pipelines, environment strategy and observability for products serving customers across California and globally.',
                        'url'         => '/services/cloud-based-solutions/',
                    ],
                    [
                        'key'         => 'dedicated-team',
                        'label'       => 'Dedicated Product Team',
                        'description' => 'A stable remote squad that works like an extension of your California product and engineering team.',
                        'url'         => '/engagement-models/',
                    ],
                ],
            ],

            // S4 – Why QalbIT
            'why' => [
                'id'      => 'location-why',
                'section' => 'why',
                'eyebrow' => 'Why QalbIT',
                'title'   => 'Why California teams choose QalbIT as their custom software partner',
                'intro'   => 'California companies operate with ambitious roadmaps, distributed teams and demanding users. QalbIT is structured to support that environment with clear delivery practices and senior oversight.',

                'reasons' => [
                    [
                        'label'       => 'Remote, but in sync with Pacific and Mountain time',
                        'description' => 'Overlap with PT/MT hours for planning, reviews and critical releases, while using an offshore team to maintain throughput.',
                        'bullets'     => [
                            'Regular stand-ups and demos in California-friendly hours.',
                            'Asynchronous updates, Loom walkthroughs and clear written documentation.',
                        ],
                    ],
                    [
                        'label'       => 'Product mindset first',
                        'description' => 'Focus on outcomes, activation metrics, retention and technical debt instead of only delivering tickets.',
                        'bullets'     => [
                            'Help with scoping and sequencing based on impact and risk.',
                            'Understanding of stakeholder expectations in venture-backed environments.',
                        ],
                    ],
                    [
                        'label'       => 'Transparent, predictable delivery',
                        'description' => 'Roadmap, current work and risks remain visible at all times through simple project rituals and tools.',
                        'bullets'     => [
                            'Structured sprints with clear acceptance criteria.',
                            'Access to staging environments and progress dashboards.',
                        ],
                    ],
                    [
                        'label'       => 'Secure, scalable foundations',
                        'description' => 'Architectures ready for growth, audits and due diligence as you fundraise or expand.',
                        'bullets'     => [
                            'Role-based access, audit trails and logging by default.',
                            'Cloud-native deployments with backups and monitoring.',
                        ],
                    ],
                ],
            ],

            // S5 – Process
            'process' => [
                'id'      => 'location-process',
                'section' => 'process',
                'eyebrow' => 'Process',
                'title'   => 'A proven product development process for California businesses',
                'intro'   => 'QalbIT uses a structured delivery process that reduces risk, keeps stakeholders aligned and ensures launches are predictable even with distributed teams.',

                'steps' => [
                    [
                        'label'       => 'Discover & define',
                        'description' => 'Align on goals, constraints, success metrics and scope before anyone writes code.',
                        'related'     => 'start-up-mvp',
                    ],
                    [
                        'label'       => 'Design & validate',
                        'description' => 'User flows, wireframes and UI prototypes so California stakeholders can react early and adjust priorities.',
                        'related'     => 'start-up-mvp',
                    ],
                    [
                        'label'       => 'Build iteratively',
                        'description' => 'Ship in small, reviewable increments using modern practices across frontend, backend and mobile.',
                        'related'     => 'product-scaling',
                    ],
                    [
                        'label'       => 'Launch & stabilise',
                        'description' => 'Roll out to customers, stabilise production and capture the right metrics.',
                        'related'     => 'product-scaling',
                    ],
                    [
                        'label'       => 'Improve & extend',
                        'description' => 'Ongoing iterations, new modules and performance work once the first launch is live.',
                        'related'     => 'digital-transformation',
                    ],
                ],

                'links' => [
                    [
                        'label' => 'See our full product development approach',
                        'url'   => '/start-up-mvp/',
                    ],
                    [
                        'label' => 'How we support scaling products',
                        'url'   => '/product-scaling/',
                    ],
                ],
            ],

            // S6 – Engagements
            'engagements' => [
                'id'      => 'location-engagements',
                'section' => 'engagements',
                'eyebrow' => 'Engagement Models',
                'title'   => 'Flexible engagement options for California teams',
                'intro'   => 'Select an engagement model that fits your product stage, budget and internal capacity, with room to adjust as your roadmap grows.',

                'models' => [
                    [
                        'key'         => 'fixed-scope',
                        'label'       => 'Fixed-scope project',
                        'description' => 'Well-defined projects with clear timelines, deliverables and pricing – ideal for MVPs and redesigns.',
                        'best_for'    => 'Founders and teams with a clear scope and deadline.',
                        'link'        => '/start-up-mvp/',
                    ],
                    [
                        'key'         => 'dedicated-squad',
                        'label'       => 'Dedicated product squad',
                        'description' => 'A cross-functional team (PM, designers, engineers) acting as an extension of your California product organisation.',
                        'best_for'    => 'Startups and enterprises with an ongoing roadmap.',
                        'link'        => '/engagement-models/',
                    ],
                    [
                        'key'         => 'continuous-support',
                        'label'       => 'Continuous improvement & support',
                        'description' => 'Lightweight retainer to handle maintenance, small improvements and on-call fixes.',
                        'best_for'    => 'Teams that need predictable care for existing platforms.',
                        'link'        => '/digital-transformation/',
                    ],
                ],
            ],

            // S7 – Tech
            'tech' => [
                'id'      => 'location-tech',
                'section' => 'tech',
                'eyebrow' => 'Technologies',
                'title'   => 'Modern tech stack for California software projects',
                'intro'   => 'QalbIT combines modern frontend frameworks, robust backend platforms and cloud-native infrastructure to build software that can grow with California organisations.',

                'categories' => [
                    [
                        'label'  => 'Frontend',
                        'items'  => ['React', 'Next.js', 'Vue.js', 'Tailwind CSS'],
                    ],
                    [
                        'label'  => 'Backend & APIs',
                        'items'  => ['Node.js', 'NestJS', 'PHP', 'Laravel'],
                    ],
                    [
                        'label'  => 'Mobile',
                        'items'  => ['Flutter', 'React Native'],
                    ],
                    [
                        'label'  => 'Cloud & Databases',
                        'items'  => ['AWS', 'GCP', 'PostgreSQL', 'MySQL', 'Redis'],
                    ],
                ],

                'links' => [
                    [
                        'label' => 'Explore our full tech stack',
                        'url'   => '/technologies/',
                    ],
                ],
            ],

            // S8 – Proof
            'proof' => [
                'id'      => 'location-proof',
                'section' => 'proof',
                'eyebrow' => 'Case Studies',
                'title'   => 'Real products shipped with QalbIT',
                'intro'   => 'These examples show the kind of platforms and tools QalbIT has helped design, build and scale. More detailed California-relevant case studies can be shared during discussions.',

                'cases' => [
                    [
                        'label'       => 'B2B SaaS platform',
                        'industry'    => 'SaaS / B2B',
                        'region'      => 'North America & Europe',
                        'headline'    => 'Helped a SaaS team refactor and scale a product used by enterprise clients.',
                        'result'      => 'Improved stability, enabled new modules and reduced deployment friction.',
                        'url'         => '/portfolio/',
                    ],
                    [
                        'label'       => 'Operations & logistics tools',
                        'industry'    => 'Logistics / Operations',
                        'region'      => 'Global',
                        'headline'    => 'Built internal tools to digitise paper-heavy workflows and approvals.',
                        'result'      => 'Around 40% faster processing and better visibility for operations teams.',
                        'url'         => '/portfolio/',
                    ],
                ],

                'testimonials' => [
                    [
                        'quote'  => 'QalbIT worked with us like a true product engineering partner, not just a vendor delivering tickets.',
                        'name'   => 'Founder',
                        'title'  => 'VC-backed SaaS company',
                        'region' => 'US-based',
                    ],
                ],
            ],

            // S10 – Final CTA
            'final_cta' => [
                'id'      => 'location-final-cta',
                'section' => 'final_cta',
                'eyebrow' => 'Start your project',
                'title'   => 'Discuss your custom software project in California',
                'body'    => 'Share a bit about your product, timelines and goals, and QalbIT will respond with next steps and a suggested engagement model within one business day.',

                'primary_cta' => [
                    'label' => 'Request a free consultation',
                    'url'   => '/contact-us/',
                ],
                'secondary_cta' => [
                    'label' => 'Book a call on Calendly',
                    'url'   => 'https://calendly.com/abidhusain-qalbit/discuss-project',
                ],

                'meta' => [
                    'show_form' => true,
                    'theme'     => 'light',
                ],
            ],
        ],
    ],

    // -------------------------------------------------
    // Arizona, USA
    // -------------------------------------------------
    'arizona' => [
        // Core routing / identification
        'slug'         => '/usa/arizona/',
        'template'     => 'pages/locations/show',
        'country_key'  => 'usa',
        'country_name' => 'United States',
        'state_key'    => 'arizona',

        'name'       => 'Arizona, USA',
        'short_name' => 'Arizona',
        'enabled'    => true,
        'order'      => 130,

        // Backward-compatible SEO fields
        'meta_title' => 'Custom Software Development in Arizona, USA – QalbIT',
        'meta_description' => 'QalbIT provides custom software, web and mobile app development services to startups and enterprises across Arizona, USA – from Phoenix and Scottsdale to Tempe and Tucson. Partner with a dedicated remote team to design, build and scale your digital products.',
        'headline' => 'Custom Software Development in Arizona, USA',
        'short_description' => 'End-to-end web, mobile and cloud solutions for Arizona startups, scale-ups and enterprises.',

        'focus_services' => [
            'Custom Software Development',
            'Web Development',
            'Mobile App Development',
            'SaaS Product Development',
            'Cloud-Based Solutions',
        ],

        // Normalised SEO block
        'faq_key'      => 'faq_location_usa_arizona',
        'faq_title'    => 'Frequently asked questions from Arizona teams',
        'faq_subtitle' => 'Answers to common questions from founders and product leaders across Arizona. You can always reach out if you do not see your question here.',
        'faq_bullets' => [
            '✓ Practical remote collaboration model that fits Arizona time zones and workflows.',
            '✓ Suited to both first-time digital projects and second-generation rebuilds.',
            '✓ Ownership, security and support agreements aligned with US business standards.',
        ],


        'seo' => [
            'h1'               => 'Custom Software Development Company for Arizona Businesses',
            'meta_title'       => 'Custom Software Development in Arizona, USA – QalbIT',
            'meta_description' => 'QalbIT is a remote-first custom software development company helping Arizona businesses build SaaS products, web applications and mobile apps with predictable delivery and product thinking.',
            'canonical'        => '/usa/arizona/',
            'faq_key'          => 'location_usa_arizona',
            'breadcrumbs'      => [
                ['label' => 'Home',         'url' => '/'],
                ['label' => 'Arizona, USA', 'url' => '/usa/arizona/'],
            ],
        ],

        'summary' => [
            'eyebrow' => 'Custom Software Development in Arizona, USA',
            'title'   => 'Remote custom software partner for Arizona startups and enterprises',
            'intro'   => 'QalbIT helps Arizona product teams and founders in Phoenix, Scottsdale, Tempe, Tucson and beyond design, build and scale SaaS products, internal tools and mobile apps with a dedicated remote engineering squad.',
        ],

        'sections' => [

            // S1 – Hero
            'hero' => [
                'id'       => 'location-hero',
                'section'  => 'hero',
                'eyebrow'  => 'Custom Software Development in Arizona, USA',
                'title'    => 'Custom Software Development Company for Arizona Businesses',
                'subtitle' => 'Build and scale SaaS, web and mobile products with a senior remote team that understands the needs of Arizona’s technology, logistics and financial services ecosystem.',
                'body'     => 'From SaaS products in Phoenix and Scottsdale to internal tools for Tempe and Tucson-based teams, QalbIT partners with Arizona founders and product leaders to design, build and iterate software that supports customers and internal operations.',

                'primary_cta' => [
                    'label' => 'Schedule a discovery call',
                    'url'   => '/contact-us/',
                    'style' => 'primary',
                ],
                'secondary_cta' => [
                    'label' => 'See how we work',
                    'url'   => '/engagement-model/',
                    'style' => 'ghost',
                ],

                'trust' => [
                    'label' => 'Trusted by teams in the US, UK and GCC',
                    'items' => [
                        ['label' => '10+ years in custom software',      'icon' => null],
                        ['label' => 'Products used in 15+ countries',    'icon' => null],
                        ['label' => 'Founders and CTOs as core clients', 'icon' => null],
                    ],
                ],
                'meta' => [
                    'theme' => 'light-hero',
                ],
            ],

            // S2 – About
            'about' => [
                'id'      => 'location-about',
                'section' => 'about',
                'eyebrow' => 'About QalbIT',
                'title'   => 'A remote custom software partner for Arizona startups and enterprises',
                'intro'   => 'QalbIT is a product-driven engineering studio working with Arizona founders, CTOs and business leaders to plan, build and maintain digital products as a long-term technology partner.',

                'highlights' => [
                    [
                        'label'       => '12+ years building products',
                        'description' => 'Experience shipping complex SaaS, marketplaces, internal tools and ERP-style systems for global customers.',
                    ],
                    [
                        'label'       => 'US time zone overlap',
                        'description' => 'Overlap with Mountain and Pacific time for planning, reviews and critical releases, supported by structured rituals and clear written communication.',
                    ],
                    [
                        'label'       => 'Full-stack product teams',
                        'description' => 'Design, frontend, backend, mobile and QA aligned to your roadmap instead of isolated freelancers.',
                    ],
                    [
                        'label'       => 'Security and compliance aware',
                        'description' => 'Secure architectures, role-based access and stable deployment pipelines from day one.',
                    ],
                ],
            ],

            // S3 – Services
            'services' => [
                'id'      => 'location-services',
                'section' => 'services',
                'eyebrow' => 'Services',
                'title'   => 'Custom software development services for Arizona businesses',
                'intro'   => 'Whether launching a new SaaS product, building tools for distributed teams or modernising legacy platforms, QalbIT brings architecture, engineering and product thinking tailored for Arizona organisations.',

                'items' => [
                    [
                        'key'         => 'custom-software',
                        'label'       => 'Custom Software Development',
                        'description' => 'End-to-end web application development tailored to specific workflows, roles and security requirements.',
                        'url'         => '/services/custom-software-development/',
                    ],
                    [
                        'key'         => 'saas-mvp',
                        'label'       => 'SaaS & MVP Development',
                        'description' => 'Design and deliver investor-ready MVPs and SaaS platforms with a focus on learning quickly from early users.',
                        'url'         => '/start-up-mvp/',
                    ],
                    [
                        'key'         => 'mobile-apps',
                        'label'       => 'Mobile App Development',
                        'description' => 'Flutter and cross-platform mobile apps integrated with your existing systems and analytics.',
                        'url'         => '/services/mobile-app-development/',
                    ],
                    [
                        'key'         => 'api-backend',
                        'label'       => 'API & Backend Engineering',
                        'description' => 'Secure APIs, integrations and background jobs running on modern PHP and Node stacks and cloud infrastructure.',
                        'url'         => '/services/api-development/',
                    ],
                    [
                        'key'         => 'cloud-devops',
                        'label'       => 'Cloud & DevOps',
                        'description' => 'CI/CD pipelines, environment strategy and observability so releases to Arizona customers remain stable.',
                        'url'         => '/services/cloud-based-solutions/',
                    ],
                    [
                        'key'         => 'dedicated-team',
                        'label'       => 'Dedicated Product Team',
                        'description' => 'A stable remote squad that works like an extension of your Arizona product and engineering team.',
                        'url'         => '/engagement-models/',
                    ],
                ],
            ],

            // S4 – Why QalbIT
            'why' => [
                'id'      => 'location-why',
                'section' => 'why',
                'eyebrow' => 'Why QalbIT',
                'title'   => 'Why Arizona teams choose QalbIT as their custom software partner',
                'intro'   => 'Arizona organisations operate in technology, logistics, manufacturing, solar/energy and financial services. QalbIT is structured to support this mix with clear delivery practices and senior oversight.',

                'reasons' => [
                    [
                        'label'       => 'Remote, but in sync with Mountain time',
                        'description' => 'Overlap with MT working hours for planning, reviews and critical releases, while leveraging an offshore team to maintain throughput.',
                        'bullets'     => [
                            'Regular stand-ups and demos in Arizona-friendly hours.',
                            'Asynchronous updates, Loom walkthroughs and clear documentation.',
                        ],
                    ],
                    [
                        'label'       => 'Product mindset, not just billable hours',
                        'description' => 'Focus on outcomes, activation metrics and technical debt instead of simply closing tickets.',
                        'bullets'     => [
                            'Support with scoping, sequencing and launch strategy.',
                            'Balance between shipping speed and long-term maintainability.',
                        ],
                    ],
                    [
                        'label'       => 'Transparent, predictable delivery',
                        'description' => 'Roadmap, current work and risks remain visible at all times through simple project rituals and tools.',
                        'bullets'     => [
                            'Structured sprints with clear acceptance criteria.',
                            'Access to staging environments and progress dashboards.',
                        ],
                    ],
                    [
                        'label'       => 'Secure, scalable foundations',
                        'description' => 'Architectures ready for compliance, audits and growth as your organisation scales in Arizona and beyond.',
                        'bullets'     => [
                            'Role-based access, audit trails and logging.',
                            'Cloud-native deployments with backups and monitoring.',
                        ],
                    ],
                ],
            ],

            // S5 – Process
            'process' => [
                'id'      => 'location-process',
                'section' => 'process',
                'eyebrow' => 'Process',
                'title'   => 'A proven product development process for Arizona businesses',
                'intro'   => 'QalbIT uses a structured delivery process that reduces risk, keeps stakeholders aligned and protects key launches.',

                'steps' => [
                    [
                        'label'       => 'Discover & define',
                        'description' => 'Align on goals, constraints, success metrics and scope before anyone writes code.',
                        'related'     => 'start-up-mvp',
                    ],
                    [
                        'label'       => 'Design & validate',
                        'description' => 'User flows, wireframes and UI prototypes so Arizona stakeholders can react early and refine priorities.',
                        'related'     => 'start-up-mvp',
                    ],
                    [
                        'label'       => 'Build iteratively',
                        'description' => 'Ship in small, reviewable increments using modern practices across frontend, backend and mobile.',
                        'related'     => 'product-scaling',
                    ],
                    [
                        'label'       => 'Launch & stabilise',
                        'description' => 'Roll out to customers, stabilise production and capture the right metrics.',
                        'related'     => 'product-scaling',
                    ],
                    [
                        'label'       => 'Improve & extend',
                        'description' => 'Ongoing iterations, new modules and performance work once the first launch is live.',
                        'related'     => 'digital-transformation',
                    ],
                ],

                'links' => [
                    [
                        'label' => 'See our full product development approach',
                        'url'   => '/start-up-mvp/',
                    ],
                    [
                        'label' => 'How we support scaling products',
                        'url'   => '/product-scaling/',
                    ],
                ],
            ],

            // S6 – Engagements
            'engagements' => [
                'id'      => 'location-engagements',
                'section' => 'engagements',
                'eyebrow' => 'Engagement Models',
                'title'   => 'Flexible engagement options for Arizona teams',
                'intro'   => 'Select an engagement model that fits your product stage, budget and internal capacity, with room to adjust as needs evolve.',

                'models' => [
                    [
                        'key'         => 'fixed-scope',
                        'label'       => 'Fixed-scope project',
                        'description' => 'Well-defined projects with clear timelines, deliverables and pricing – ideal for MVPs and redesigns.',
                        'best_for'    => 'Founders and teams with a clear scope and deadline.',
                        'link'        => '/start-up-mvp/',
                    ],
                    [
                        'key'         => 'dedicated-squad',
                        'label'       => 'Dedicated product squad',
                        'description' => 'A cross-functional team (PM, designers, engineers) acting as an extension of your Arizona product organisation.',
                        'best_for'    => 'Scale-ups and enterprises with a continuous roadmap.',
                        'link'        => '/engagement-models/',
                    ],
                    [
                        'key'         => 'continuous-support',
                        'label'       => 'Continuous improvement & support',
                        'description' => 'Lightweight retainer to handle maintenance, small improvements and on-call fixes.',
                        'best_for'    => 'Teams that need predictable care for existing platforms.',
                        'link'        => '/digital-transformation/',
                    ],
                ],
            ],

            // S7 – Tech
            'tech' => [
                'id'      => 'location-tech',
                'section' => 'tech',
                'eyebrow' => 'Technologies',
                'title'   => 'Modern tech stack for Arizona software projects',
                'intro'   => 'QalbIT combines modern frontend frameworks, robust backend platforms and cloud-native infrastructure to build software that can grow with Arizona organisations.',

                'categories' => [
                    [
                        'label'  => 'Frontend',
                        'items'  => ['React', 'Next.js', 'Vue.js', 'Tailwind CSS'],
                    ],
                    [
                        'label'  => 'Backend & APIs',
                        'items'  => ['Node.js', 'NestJS', 'PHP', 'Laravel'],
                    ],
                    [
                        'label'  => 'Mobile',
                        'items'  => ['Flutter', 'React Native'],
                    ],
                    [
                        'label'  => 'Cloud & Databases',
                        'items'  => ['AWS', 'GCP', 'PostgreSQL', 'MySQL', 'Redis'],
                    ],
                ],

                'links' => [
                    [
                        'label' => 'Explore our full tech stack',
                        'url'   => '/technologies/',
                    ],
                ],
            ],

            // S8 – Proof
            'proof' => [
                'id'      => 'location-proof',
                'section' => 'proof',
                'eyebrow' => 'Case Studies',
                'title'   => 'Real products shipped with QalbIT',
                'intro'   => 'These examples show the kind of platforms and tools QalbIT has helped design, build and scale. More detailed case studies can be shared during discussions.',

                'cases' => [
                    [
                        'label'       => 'B2B SaaS platform',
                        'industry'    => 'SaaS / B2B',
                        'region'      => 'North America & Europe',
                        'headline'    => 'Helped a SaaS team refactor and scale a product used by enterprise clients.',
                        'result'      => 'Improved stability, enabled new modules and reduced deployment friction.',
                        'url'         => '/portfolio/',
                    ],
                    [
                        'label'       => 'Operations & logistics tools',
                        'industry'    => 'Logistics / Operations',
                        'region'      => 'Global',
                        'headline'    => 'Built internal tools to digitise paper-heavy workflows and approvals.',
                        'result'      => 'Around 40% faster processing and better visibility for operations teams.',
                        'url'         => '/portfolio/',
                    ],
                ],

                'testimonials' => [
                    [
                        'quote'  => 'QalbIT provided a structured, transparent way of working that made it easy to keep our Arizona stakeholders aligned.',
                        'name'   => 'Founder & CEO',
                        'title'  => 'US-based SaaS company',
                        'region' => 'United States',
                    ],
                ],
            ],

            // S10 – Final CTA
            'final_cta' => [
                'id'      => 'location-final-cta',
                'section' => 'final_cta',
                'eyebrow' => 'Start your project',
                'title'   => 'Discuss your custom software project in Arizona',
                'body'    => 'Share a bit about your product, timelines and goals, and QalbIT will respond with next steps and a suggested engagement model within one business day.',

                'primary_cta' => [
                    'label' => 'Request a free consultation',
                    'url'   => '/contact-us/',
                ],
                'secondary_cta' => [
                    'label' => 'Book a call on Calendly',
                    'url'   => 'https://calendly.com/abidhusain-qalbit/discuss-project',
                ],

                'meta' => [
                    'show_form' => true,
                    'theme'     => 'light',
                ],
            ],
        ],
    ],



    // -------------------------------------------------
    // Riyadh, Saudi Arabia
    // -------------------------------------------------
    'riyadh' => [
        // Core routing / identification
        'slug'         => '/saudi-arabia/riyadh/',
        'template'     => 'pages/locations/show',
        'country_key'  => 'saudi-arabia',
        'country_name' => 'Saudi Arabia',
        'state_key'    => 'riyadh',

        'name'       => 'Riyadh, Saudi Arabia',
        'short_name' => 'Riyadh',
        'enabled'    => true,
        'order'      => 210,

        // Backward-compatible SEO fields
        'meta_title' => 'Custom Software Development in Riyadh, Saudi Arabia (KSA) – QalbIT',
        'meta_description' => 'QalbIT provides custom software, web and mobile app development services to companies in Riyadh, Saudi Arabia (KSA). Partner with a remote custom software development team for SaaS products, internal tools and enterprise platforms.',
        'headline' => 'Custom Software Development in Riyadh, Saudi Arabia',
        'short_description' => 'End to end web, mobile and cloud solutions for Riyadh startups, enterprises and government backed initiatives.',

        // Optional – used if you still need it somewhere else
        'focus_services' => [
            'Custom Software Development',
            'Web Development',
            'Mobile App Development',
            'SaaS Product Development',
            'Cloud-Based Solutions',
        ],

        // Normalised SEO block for the new template
        'faq_key'      => 'faq_location_saudi_arabia_riyadh',
        'faq_title'    => 'Frequently asked questions from Riyadh teams',
        'faq_subtitle' => 'Answers to common questions from founders, product leaders and IT heads in Riyadh and across Saudi Arabia. You can always reach out if you do not see your question here.',
        'faq_bullets' => [
            '✓ Experience working with GCC-based organisations and their expectations.',
            '✓ Architectures designed with security, access control and audit in mind.',
            '✓ Contracts, NDAs and delivery models that respect local governance needs.',
        ],


        'seo' => [
            'h1'               => 'Custom Software Development Company in Riyadh, Saudi Arabia (KSA)',
            'meta_title'       => 'Custom Software Development in Riyadh, Saudi Arabia (KSA) – QalbIT',
            'meta_description' => 'QalbIT is a remote first custom software development company for Riyadh, Saudi Arabia (KSA). We build custom software, SaaS platforms and mobile apps for companies that search for software development companies and services in Riyadh and across the Kingdom.',
            'canonical'        => '/saudi-arabia/riyadh/',
            'faq_key'          => 'location_saudi_arabia_riyadh',
            'breadcrumbs'      => [
                ['label' => 'Home',                     'url' => '/'],
                ['label' => 'Riyadh, Saudi Arabia',     'url' => '/saudi-arabia/riyadh/'],
            ],
        ],

        // High-level summary (optional convenience for cards, previews, etc.)
        'summary' => [
            'eyebrow' => 'Custom Software Development in Riyadh, Saudi Arabia',
            'title'   => 'Remote custom software partner for Riyadh and Saudi Arabia businesses',
            'intro'   => 'QalbIT helps Riyadh based product teams and founders design, build and scale SaaS products, internal tools and mobile apps with a dedicated engineering squad that understands KSA timelines, approvals and delivery expectations.',
        ],

        // -------------------------------------------------
        // Sections S1–S10
        // -------------------------------------------------

        'sections' => [

            // S1 – Location hero & primary CTA
            'hero' => [
                'id'       => 'location-hero',
                'section'  => 'hero',
                'eyebrow'  => 'Custom Software Development in Riyadh, Saudi Arabia',
                'title'    => 'Custom Software Development Company in Riyadh, Saudi Arabia (KSA)',
                'subtitle' => 'Build and scale custom software, SaaS and mobile apps with a remote team that understands how Riyadh and KSA organisations run projects.',
                'body'     => 'From first product ideas to enterprise modernisation, QalbIT works with Riyadh based founders, IT leaders and business owners to design, build and iterate software that supports customers, internal teams and Vision 2030 goals.',

                'primary_cta' => [
                    'label' => 'Schedule a discovery call',
                    'url'   => '/contact-us/',
                    'style' => 'primary',
                ],
                'secondary_cta' => [
                    'label' => 'See how we work',
                    'url'   => '/engagement-model/',
                    'style' => 'ghost',
                ],

                'trust' => [
                    'label' => 'Trusted by teams in the US, UK, GCC and beyond',
                    'items' => [
                        ['label' => '10+ years in custom software',       'icon' => null],
                        ['label' => 'Products used in 15+ countries',     'icon' => null],
                        ['label' => 'Founders, CTOs and SMEs as clients', 'icon' => null],
                    ],
                ],
                'meta' => [
                    'theme' => 'light-hero', // use light hero section
                ],
            ],

            // S2 – About QalbIT for Riyadh businesses
            'about' => [
                'id'      => 'location-about',
                'section' => 'about',
                'eyebrow' => 'About QalbIT',
                'title'   => 'A remote custom software partner for Riyadh startups and enterprises',
                'intro'   => 'QalbIT is a product driven engineering studio that supports Riyadh based startups, family businesses and enterprises. The goal is to act as a long term product and engineering arm rather than a short term outsourcing vendor.',

                'highlights' => [
                    [
                        'label'       => '12+ years building products',
                        'description' => 'Experience shipping SaaS platforms, internal tools, ERPs and customer apps for global and regional clients.',
                    ],
                    [
                        'label'       => 'Gulf friendly collaboration',
                        'description' => 'Strong overlap with Riyadh business hours, planned communication and clear written updates for all stakeholders.',
                    ],
                    [
                        'label'       => 'Full stack delivery team',
                        'description' => 'Product thinking, UX, frontend, backend, mobile and QA working together on the same roadmap.',
                    ],
                    [
                        'label'       => 'Security and compliance aware',
                        'description' => 'Architectures that consider access control, audit logs and data protection from the first release.',
                    ],
                ],
            ],

            // S3 – Custom software services for Riyadh
            'services' => [
                'id'      => 'location-services',
                'section' => 'services',
                'eyebrow' => 'Services',
                'title'   => 'Custom software development services for Riyadh and Saudi Arabia',
                'intro'   => 'Whether you need a new custom software product, a SaaS platform, a mobile app or an internal business tool, QalbIT provides custom software development services for companies in Riyadh and across Saudi Arabia.',

                'items' => [
                    [
                        'key'         => 'custom-software',
                        'label'       => 'Custom Software Development',
                        'description' => 'End to end web application development shaped around your workflows, roles and approval processes in Riyadh.',
                        'url'         => '/services/custom-software-development/',
                    ],
                    [
                        'key'         => 'saas-mvp',
                        'label'       => 'SaaS and MVP Development',
                        'description' => 'Design and deliver investor ready MVPs and SaaS products for Saudi Arabia markets with a focus on fast learning and clean architecture.',
                        'url'         => '/start-up-mvp/',
                    ],
                    [
                        'key'         => 'mobile-apps',
                        'label'       => 'Mobile App Development',
                        'description' => 'Flutter and cross platform mobile apps that work well for customers and internal teams in Riyadh and the wider region.',
                        'url'         => '/services/mobile-app-development/',
                    ],
                    [
                        'key'         => 'api-backend',
                        'label'       => 'API and Backend Engineering',
                        'description' => 'Secure APIs, integrations and background jobs running on modern PHP and Node stacks and cloud infrastructure.',
                        'url'         => '/services/api-development/',
                    ],
                    [
                        'key'         => 'cloud-devops',
                        'label'       => 'Cloud and DevOps',
                        'description' => 'CI/CD pipelines, environment strategy and observability so releases to users in Riyadh and across KSA stay reliable.',
                        'url'         => '/services/cloud-based-solutions/',
                    ],
                    [
                        'key'         => 'dedicated-team',
                        'label'       => 'Dedicated Product Team',
                        'description' => 'A stable remote squad that works as an extension of your Riyadh based product and technology organisation.',
                        'url'         => '/engagement-models/',
                    ],
                ],
            ],

            // S4 – Why QalbIT for custom software in Riyadh
            'why' => [
                'id'      => 'location-why',
                'section' => 'why',
                'eyebrow' => 'Why QalbIT',
                'title'   => 'Why Riyadh teams choose QalbIT as a custom software partner',
                'intro'   => 'Riyadh organisations work under tight timelines and high expectations. QalbIT is set up to support that with structured delivery, senior oversight and direct access to decision makers.',

                'reasons' => [
                    [
                        'label'       => 'Remote, but aligned with Riyadh time',
                        'description' => 'Working hours overlap with Riyadh for planning, reviews and go live windows while remote execution keeps delivery efficient.',
                        'bullets'     => [
                            'Regular check ins and demos in Riyadh friendly hours.',
                            'Asynchronous Loom walkthroughs and written updates for wider teams.',
                        ],
                    ],
                    [
                        'label'       => 'Product mindset, not task factory',
                        'description' => 'Focus on business outcomes, activation and adoption instead of only closing tickets.',
                        'bullets'     => [
                            'Support with scope, priority and launch planning for KSA markets.',
                            'Balance between speed and long term maintainability of the code base.',
                        ],
                    ],
                    [
                        'label'       => 'Clear and predictable delivery',
                        'description' => 'Simple rituals and tools so you always know what is planned, in progress and at risk.',
                        'bullets'     => [
                            'Structured sprints with clear acceptance criteria.',
                            'Access to staging environments and progress dashboards.',
                        ],
                    ],
                    [
                        'label'       => 'Secure and scalable foundations',
                        'description' => 'Architectures ready for growth in Riyadh and the wider region, and for internal or external audits where needed.',
                        'bullets'     => [
                            'Role based access, audit trails and logging by default.',
                            'Cloud native deployments with monitoring and backups.',
                        ],
                    ],
                ],
            ],

            // S5 – Our product development process (summary)
            'process' => [
                'id'      => 'location-process',
                'section' => 'process',
                'eyebrow' => 'Process',
                'title'   => 'A proven product development process for Riyadh projects',
                'intro'   => 'QalbIT uses a clear delivery process that reduces risk, keeps Riyadh stakeholders aligned and protects important launch dates.',

                'steps' => [
                    [
                        'label'       => 'Discover and define',
                        'description' => 'Align on goals, constraints, regulations and success metrics before anyone writes code.',
                        'related'     => 'start-up-mvp',
                    ],
                    [
                        'label'       => 'Design and validate',
                        'description' => 'User flows, wireframes and UI prototypes so Riyadh decision makers can respond early with feedback.',
                        'related'     => 'start-up-mvp',
                    ],
                    [
                        'label'       => 'Build iteratively',
                        'description' => 'Delivery in small, reviewable increments across frontend, backend and mobile with quality checks.',
                        'related'     => 'product-scaling',
                    ],
                    [
                        'label'       => 'Launch and stabilise',
                        'description' => 'Plan go live windows for Riyadh time, monitor early usage and stabilise production.',
                        'related'     => 'product-scaling',
                    ],
                    [
                        'label'       => 'Improve and extend',
                        'description' => 'Ongoing iterations, new modules and performance work once the first release is live.',
                        'related'     => 'digital-transformation',
                    ],
                ],

                'links' => [
                    [
                        'label' => 'See our full product development approach',
                        'url'   => '/start-up-mvp/',
                    ],
                    [
                        'label' => 'How we support scaling products',
                        'url'   => '/product-scaling/',
                    ],
                ],
            ],

            // S6 – Engagement models for Riyadh companies
            'engagements' => [
                'id'      => 'location-engagements',
                'section' => 'engagements',
                'eyebrow' => 'Engagement Models',
                'title'   => 'Flexible engagement options for Riyadh teams',
                'intro'   => 'Select an engagement model that matches your product stage, budget and internal capacity. It can change as your roadmap grows.',

                'models' => [
                    [
                        'key'         => 'fixed-scope',
                        'label'       => 'Fixed scope project',
                        'description' => 'Well defined projects with clear timelines, deliverables and pricing. Good fit for MVPs, new modules and redesigns.',
                        'best_for'    => 'Founders and teams with a clear scope and launch target.',
                        'link'        => '/start-up-mvp/',
                    ],
                    [
                        'key'         => 'dedicated-squad',
                        'label'       => 'Dedicated product squad',
                        'description' => 'A cross functional team that works as an extension of your Riyadh product and engineering organisation.',
                        'best_for'    => 'Scale ups and enterprises with an ongoing roadmap.',
                        'link'        => '/engagement-models/',
                    ],
                    [
                        'key'         => 'continuous-support',
                        'label'       => 'Continuous improvement and support',
                        'description' => 'Lightweight retainer for maintenance, small improvements and on call fixes for existing platforms.',
                        'best_for'    => 'Teams that want predictable care for live systems.',
                        'link'        => '/digital-transformation/',
                    ],
                ],
            ],

            // S7 – Tech stack & capabilities
            'tech' => [
                'id'      => 'location-tech',
                'section' => 'tech',
                'eyebrow' => 'Technologies',
                'title'   => 'Modern tech stack for Riyadh software projects',
                'intro'   => 'QalbIT combines modern frontend frameworks, robust backend platforms and cloud native infrastructure to build software that can grow with Riyadh and Saudi Arabia organisations.',

                'categories' => [
                    [
                        'label' => 'Frontend',
                        'items' => ['React', 'Next.js', 'Vue.js', 'Tailwind CSS'],
                    ],
                    [
                        'label' => 'Backend and APIs',
                        'items' => ['Node.js', 'NestJS', 'PHP', 'Laravel'],
                    ],
                    [
                        'label' => 'Mobile',
                        'items' => ['Flutter', 'React Native'],
                    ],
                    [
                        'label' => 'Cloud and Databases',
                        'items' => ['AWS', 'GCP', 'PostgreSQL', 'MySQL', 'Redis'],
                    ],
                ],

                'links' => [
                    [
                        'label' => 'Explore our full tech stack',
                        'url'   => '/technologies/',
                    ],
                ],
            ],

            // S8 – Selected work & social proof
            'proof' => [
                'id'      => 'location-proof',
                'section' => 'proof',
                'eyebrow' => 'Case Studies',
                'title'   => 'Real products shipped with QalbIT',
                'intro'   => 'These examples show the type of platforms and tools that QalbIT has helped design, build and scale. More region specific case studies can be shared on request.',

                'cases' => [
                    [
                        'label'       => 'B2B SaaS platform',
                        'industry'    => 'SaaS / B2B',
                        'region'      => 'GCC and global',
                        'headline'    => 'Support for a SaaS team to refactor and scale a product used by enterprise clients.',
                        'result'      => 'Improved stability, new modules and smoother deployments.',
                        'url'         => '/portfolio/',
                    ],
                    [
                        'label'       => 'Operations and logistics tools',
                        'industry'    => 'Logistics / Operations',
                        'region'      => 'GCC and global',
                        'headline'    => 'Internal tools to digitise paper heavy workflows, approvals and reporting.',
                        'result'      => 'Faster processing and better visibility for operations teams.',
                        'url'         => '/portfolio/',
                    ],
                ],

                'testimonials' => [
                    [
                        'quote'  => 'QalbIT worked like a real product partner. Communication was clear, delivery was structured and the team adapted well to our way of working.',
                        'name'   => 'Founder and CEO',
                        'title'  => 'Technology company',
                        'region' => 'Gulf region',
                    ],
                ],
            ],

            // S10 – Final CTA band
            'final_cta' => [
                'id'      => 'location-final-cta',
                'section' => 'final_cta',
                'eyebrow' => 'Start your project',
                'title'   => 'Discuss your custom software project in Riyadh',
                'body'    => 'Share a short brief about your software project, timelines and goals. QalbIT will respond with next steps and a suggested engagement model within one business day.',

                'primary_cta' => [
                    'label' => 'Request a free consultation',
                    'url'   => '/contact-us/',
                ],
                'secondary_cta' => [
                    'label' => 'Book a call on Calendly',
                    'url'   => 'https://calendly.com/abidhusain-qalbit/discuss-project',
                ],

                'meta' => [
                    'show_form' => true,
                    'theme'     => 'light',
                ],
            ],
        ],
    ],

    

    // -------------------------------------------------
    // Ahmedabad, India
    // -------------------------------------------------
    'ahmedabad' => [
        // Core routing / identification
        'slug'         => '/india/ahmedabad/',
        'template'     => 'pages/locations/show',
        'country_key'  => 'india',
        'country_name' => 'India',
        'state_key'    => 'ahmedabad',

        'name'       => 'Ahmedabad, India',
        'short_name' => 'Ahmedabad',
        'enabled'    => true,
        'order'      => 310,

        // Backward-compatible SEO fields
        'meta_title' => 'Custom Software Development in Ahmedabad, India – QalbIT',
        'meta_description' => 'QalbIT is a custom software development company in Ahmedabad, Gujarat, India. We build custom software, web applications and mobile apps for startups, SMEs and enterprises across India and overseas.',
        'headline' => 'Custom Software Development in Ahmedabad, India',
        'short_description' => 'End-to-end web, mobile and cloud solutions for Ahmedabad and Gujarat-based businesses.',

        'focus_services' => [
            'Custom Software Development',
            'Web Development',
            'Mobile App Development',
            'SaaS Product Development',
            'Cloud-Based Solutions',
        ],

        // Normalised SEO block
        'faq_key'      => 'faq_location_india_ahmedabad',
        'faq_title'    => 'Frequently asked questions from Ahmedabad teams',
        'faq_subtitle' => 'Answers to common questions from founders, IT heads and business owners in Ahmedabad and across India.',
        'faq_bullets' => [
            '✓ Close collaboration with Ahmedabad founders, SMEs and IT teams.',
            '✓ Helps move from manual or spreadsheet-driven workflows to proper systems.',
            '✓ Invoices, contracts and compliance structured for Indian entities and GST.',
        ],

        'seo' => [
            'h1'               => 'Custom Software Development Company in Ahmedabad, India',
            'meta_title'       => 'Custom Software Development in Ahmedabad, India – QalbIT',
            'meta_description' => 'If you are searching for a custom software development company in Ahmedabad or a software development company near you, QalbIT builds SaaS products, ERPs, web and mobile apps with predictable delivery and clear communication.',
            'canonical'        => '/india/ahmedabad/',
            'faq_key'          => 'location_india_ahmedabad',
            'breadcrumbs'      => [
                ['label' => 'Home',               'url' => '/'],
                ['label' => 'Ahmedabad, India',   'url' => '/india/ahmedabad/'],
            ],
        ],

        'summary' => [
            'eyebrow' => 'Custom Software Development in Ahmedabad, India',
            'title'   => 'Remote-first custom software partner for Ahmedabad businesses',
            'intro'   => 'QalbIT helps companies in Ahmedabad and Gujarat design, build and scale custom software, SaaS products and internal tools with a dedicated engineering squad that fits their budgets and timelines.',
        ],

        'sections' => [

            // S1 – Hero
            'hero' => [
                'id'       => 'location-hero',
                'section'  => 'hero',
                'eyebrow'  => 'Custom Software Development in Ahmedabad, India',
                'title'    => 'Custom Software Development Company in Ahmedabad, India',
                'subtitle' => 'Build and scale custom software, SaaS and mobile apps with a team that understands how Ahmedabad and Indian businesses operate.',
                'body'     => 'From manufacturing and engineering to SaaS, trading and services, QalbIT works with Ahmedabad-based founders and leaders to design, build and iterate software that supports growth and operations.',

                'primary_cta' => [
                    'label' => 'Schedule a discovery call',
                    'url'   => '/contact-us/',
                    'style' => 'primary',
                ],
                'secondary_cta' => [
                    'label' => 'See how we work',
                    'url'   => '/engagement-model/',
                    'style' => 'ghost',
                ],

                'trust' => [
                    'label' => 'Trusted by teams in India, US, UK and GCC',
                    'items' => [
                        ['label' => '10+ years in custom software',      'icon' => null],
                        ['label' => 'Products used in 15+ countries',    'icon' => null],
                        ['label' => 'Founders & CTOs as core clients',   'icon' => null],
                    ],
                ],
                'meta' => [
                    'theme' => 'light-hero',
                ],
            ],

            // S2 – About
            'about' => [
                'id'      => 'location-about',
                'section' => 'about',
                'eyebrow' => 'About QalbIT',
                'title'   => 'A custom software partner rooted in Ahmedabad, serving India and beyond',
                'intro'   => 'QalbIT is a product-driven engineering studio founded in Ahmedabad. We support local and international clients with long-term software delivery, not just short, transactional projects.',

                'highlights' => [
                    [
                        'label'       => '12+ years building products',
                        'description' => 'Experience in SaaS platforms, internal tools, ERPs and customer-facing apps for global and Indian customers.',
                    ],
                    [
                        'label'       => 'Based in Ahmedabad, working globally',
                        'description' => 'Core team in Ahmedabad with clients across India, the US, UK and GCC.',
                    ],
                    [
                        'label'       => 'Full-stack delivery teams',
                        'description' => 'Product thinking, UX, frontend, backend, mobile and QA aligned to the same roadmap.',
                    ],
                    [
                        'label'       => 'Secure and maintainable by design',
                        'description' => 'Architectures that consider access control, audit logs and maintainability from the first iteration.',
                    ],
                ],
            ],

            // S3 – Services
            'services' => [
                'id'      => 'location-services',
                'section' => 'services',
                'eyebrow' => 'Services',
                'title'   => 'Custom software development services for Ahmedabad and India',
                'intro'   => 'QalbIT provides custom software development services in Ahmedabad for businesses that need stable, long-term engineering support instead of one-off freelancers.',

                'items' => [
                    [
                        'key'         => 'custom-software',
                        'label'       => 'Custom Software Development',
                        'description' => 'End-to-end web application development tailored to your workflows, branches, warehouses and approval flows.',
                        'url'         => '/services/custom-software-development/',
                    ],
                    [
                        'key'         => 'saas-mvp',
                        'label'       => 'SaaS & MVP Development',
                        'description' => 'Design and deliver investor-ready MVPs and SaaS platforms targeting Indian or global customers.',
                        'url'         => '/start-up-mvp/',
                    ],
                    [
                        'key'         => 'mobile-apps',
                        'label'       => 'Mobile App Development',
                        'description' => 'Flutter and cross-platform mobile apps for customers, field staff and internal teams.',
                        'url'         => '/services/mobile-app-development/',
                    ],
                    [
                        'key'         => 'api-backend',
                        'label'       => 'API & Backend Engineering',
                        'description' => 'Secure APIs, integrations and background jobs on modern PHP/Node stacks and cloud infrastructure.',
                        'url'         => '/services/api-development/',
                    ],
                    [
                        'key'         => 'cloud-devops',
                        'label'       => 'Cloud & DevOps',
                        'description' => 'CI/CD pipelines, environment strategy and observability to keep deployments predictable.',
                        'url'         => '/services/cloud-based-solutions/',
                    ],
                    [
                        'key'         => 'dedicated-team',
                        'label'       => 'Dedicated Product Team',
                        'description' => 'A stable remote squad that works as an extension of your Ahmedabad-based product and IT team.',
                        'url'         => '/engagement-models/',
                    ],
                ],
            ],

            // S4 – Why QalbIT
            'why' => [
                'id'      => 'location-why',
                'section' => 'why',
                'eyebrow' => 'Why QalbIT',
                'title'   => 'Why Ahmedabad teams work with QalbIT for custom software',
                'intro'   => 'Ahmedabad organisations want predictable delivery, clear communication and long-term support. QalbIT is structured to deliver exactly that.',

                'reasons' => [
                    [
                        'label'       => 'Local understanding with global experience',
                        'description' => 'Based in Ahmedabad, used to working with Indian SMEs and global startups at the same time.',
                        'bullets'     => [
                            'Comfortable navigating local decision-making and approvals.',
                            'Used to documentation and processes needed for overseas stakeholders.',
                        ],
                    ],
                    [
                        'label'       => 'Product mindset, not just coding',
                        'description' => 'We think in terms of business outcomes, internal adoption and technical debt, not only in tickets closed.',
                        'bullets'     => [
                            'Help with scope, sequencing and prioritisation.',
                            'Balance between speed and long-term maintainability.',
                        ],
                    ],
                    [
                        'label'       => 'Transparent and predictable delivery',
                        'description' => 'Simple rituals and tools so you always know what is planned, in progress and shipped.',
                        'bullets'     => [
                            'Structured sprints with clear acceptance criteria.',
                            'Access to staging environments and progress dashboards.',
                        ],
                    ],
                    [
                        'label'       => 'Secure, scalable foundations',
                        'description' => 'Architectures ready to support more users, more locations and more internal teams as you scale.',
                        'bullets'     => [
                            'Role-based access, audit trails and logging by default.',
                            'Cloud-native deployments with backups and monitoring.',
                        ],
                    ],
                ],
            ],

            // S5 – Process
            'process' => [
                'id'      => 'location-process',
                'section' => 'process',
                'eyebrow' => 'Process',
                'title'   => 'A proven product development process for Ahmedabad projects',
                'intro'   => 'QalbIT uses a clear delivery process that reduces risk, keeps stakeholders aligned and protects important launch dates.',

                'steps' => [
                    [
                        'label'       => 'Discover & define',
                        'description' => 'Align on goals, constraints, pain points and success metrics before writing code.',
                        'related'     => 'start-up-mvp',
                    ],
                    [
                        'label'       => 'Design & validate',
                        'description' => 'User flows, wireframes and UI prototypes so decision makers can react early and refine priorities.',
                        'related'     => 'start-up-mvp',
                    ],
                    [
                        'label'       => 'Build iteratively',
                        'description' => 'Ship in small, reviewable increments across frontend, backend and mobile.',
                        'related'     => 'product-scaling',
                    ],
                    [
                        'label'       => 'Launch & stabilise',
                        'description' => 'Plan go-live, monitor early usage and stabilise production environments.',
                        'related'     => 'product-scaling',
                    ],
                    [
                        'label'       => 'Improve & extend',
                        'description' => 'Iterate on modules, performance and new features once the first release is live.',
                        'related'     => 'digital-transformation',
                    ],
                ],

                'links' => [
                    [
                        'label' => 'See our full product development approach',
                        'url'   => '/start-up-mvp/',
                    ],
                    [
                        'label' => 'How we support scaling products',
                        'url'   => '/product-scaling/',
                    ],
                ],
            ],

            // S6 – Engagements
            'engagements' => [
                'id'      => 'location-engagements',
                'section' => 'engagements',
                'eyebrow' => 'Engagement Models',
                'title'   => 'Flexible engagement options for Ahmedabad teams',
                'intro'   => 'Pick an engagement model that matches your product stage, budget and internal capacity. You can evolve it as your roadmap grows.',

                'models' => [
                    [
                        'key'         => 'fixed-scope',
                        'label'       => 'Fixed-scope project',
                        'description' => 'Clear timelines, deliverables and pricing – ideal for MVPs, new modules and redesigns.',
                        'best_for'    => 'Founders and teams with a defined scope and launch target.',
                        'link'        => '/start-up-mvp/',
                    ],
                    [
                        'key'         => 'dedicated-squad',
                        'label'       => 'Dedicated product squad',
                        'description' => 'A cross-functional team that works like an extension of your Ahmedabad product and IT organisation.',
                        'best_for'    => 'Companies with a continuous roadmap and backlog.',
                        'link'        => '/engagement-models/',
                    ],
                    [
                        'key'         => 'continuous-support',
                        'label'       => 'Continuous improvement & support',
                        'description' => 'A lightweight retainer for maintenance, improvements and on-call fixes for live systems.',
                        'best_for'    => 'Teams that need predictable care for existing platforms.',
                        'link'        => '/digital-transformation/',
                    ],
                ],
            ],

            // S7 – Tech
            'tech' => [
                'id'      => 'location-tech',
                'section' => 'tech',
                'eyebrow' => 'Technologies',
                'title'   => 'Modern tech stack for Ahmedabad software projects',
                'intro'   => 'QalbIT uses modern frontend, backend and cloud technologies to build software that can evolve with your business.',

                'categories' => [
                    [
                        'label' => 'Frontend',
                        'items' => ['React', 'Next.js', 'Vue.js', 'Tailwind CSS'],
                    ],
                    [
                        'label' => 'Backend & APIs',
                        'items' => ['Node.js', 'NestJS', 'PHP', 'Laravel'],
                    ],
                    [
                        'label' => 'Mobile',
                        'items' => ['Flutter', 'React Native'],
                    ],
                    [
                        'label' => 'Cloud & Databases',
                        'items' => ['AWS', 'GCP', 'PostgreSQL', 'MySQL', 'Redis'],
                    ],
                ],

                'links' => [
                    [
                        'label' => 'Explore our full tech stack',
                        'url'   => '/technologies/',
                    ],
                ],
            ],

            // S8 – Proof
            'proof' => [
                'id'      => 'location-proof',
                'section' => 'proof',
                'eyebrow' => 'Case Studies',
                'title'   => 'Real products shipped with QalbIT',
                'intro'   => 'Examples of platforms and tools QalbIT has helped design, build and scale. India and region-specific case studies can be shared during calls.',

                'cases' => [
                    [
                        'label'       => 'B2B SaaS platform',
                        'industry'    => 'SaaS / B2B',
                        'region'      => 'India & global',
                        'headline'    => 'Helped a SaaS team refactor and scale a product used by enterprise clients.',
                        'result'      => 'Improved stability, enabled new modules and reduced deployment friction.',
                        'url'         => '/portfolio/',
                    ],
                    [
                        'label'       => 'Operations & logistics tools',
                        'industry'    => 'Logistics / Operations',
                        'region'      => 'India & global',
                        'headline'    => 'Built internal tools to digitise paper-heavy workflows, approvals and reporting.',
                        'result'      => 'Faster processing and better visibility for operations teams.',
                        'url'         => '/portfolio/',
                    ],
                ],

                'testimonials' => [
                    [
                        'quote'  => 'QalbIT worked like an extension of our own team in Ahmedabad – responsive, structured and clear about trade-offs.',
                        'name'   => 'Founder & Director',
                        'title'  => 'Indian SaaS / services company',
                        'region' => 'India',
                    ],
                ],
            ],

            // S10 – Final CTA
            'final_cta' => [
                'id'      => 'location-final-cta',
                'section' => 'final_cta',
                'eyebrow' => 'Start your project',
                'title'   => 'Discuss your custom software project in Ahmedabad',
                'body'    => 'Share a short brief about your software project, timelines and goals. QalbIT will respond with next steps and a suggested engagement model within one business day.',

                'primary_cta' => [
                    'label' => 'Request a free consultation',
                    'url'   => '/contact-us/',
                ],
                'secondary_cta' => [
                    'label' => 'Book a call on Calendly',
                    'url'   => 'https://calendly.com/abidhusain-qalbit/discuss-project',
                ],

                'meta' => [
                    'show_form' => true,
                    'theme'     => 'light',
                ],
            ],
        ],
    ],

    // -------------------------------------------------
    // Mumbai, India
    // -------------------------------------------------
    'mumbai' => [
        'slug'         => '/india/mumbai/',
        'template'     => 'pages/locations/show',
        'country_key'  => 'india',
        'country_name' => 'India',
        'state_key'    => 'mumbai',

        'name'       => 'Mumbai, India',
        'short_name' => 'Mumbai',
        'enabled'    => true,
        'order'      => 320,

        'meta_title' => 'Custom Software Development in Mumbai, India – QalbIT',
        'meta_description' => 'QalbIT is a custom software development company for businesses in Mumbai, India. We build custom software, web applications and mobile apps for startups, BFSI, media and enterprises.',
        'headline' => 'Custom Software Development in Mumbai, India',
        'short_description' => 'Web, mobile and cloud solutions for Mumbai-based startups, SMEs, BFSI and enterprise teams.',

        'focus_services' => [
            'Custom Software Development',
            'Web Development',
            'Mobile App Development',
            'SaaS Product Development',
            'Cloud-Based Solutions',
        ],

        'faq_key'      => 'faq_location_india_mumbai',
        'faq_title'    => 'Frequently asked questions from Mumbai teams',
        'faq_subtitle' => 'Answers to common questions from founders, product leaders and IT heads in Mumbai and across India.',
        'faq_bullets' => [
            '✓ Set up for fast-moving Mumbai product and business teams.',
            '✓ Supports financial, operations and customer-facing products at scale.',
            '✓ Indian-entity contracts with clear IP ownership and GST-ready billing.',
        ],

        'seo' => [
            'h1'               => 'Custom Software Development Company in Mumbai, India',
            'meta_title'       => 'Custom Software Development in Mumbai, India – QalbIT',
            'meta_description' => 'Looking for a custom software development company in Mumbai? QalbIT helps Mumbai-based businesses build SaaS products, trading platforms, internal tools and mobile apps with predictable delivery.',
            'canonical'        => '/india/mumbai/',
            'faq_key'          => 'location_india_mumbai',
            'breadcrumbs'      => [
                ['label' => 'Home',             'url' => '/'],
                ['label' => 'Mumbai, India',    'url' => '/india/mumbai/'],
            ],
        ],

        'summary' => [
            'eyebrow' => 'Custom Software Development in Mumbai, India',
            'title'   => 'Remote custom software partner for Mumbai startups and enterprises',
            'intro'   => 'QalbIT supports Mumbai-based founders and teams with custom software, SaaS and mobile app development, acting as a stable external product engineering arm.',
        ],

        'sections' => [

            'hero' => [
                'id'       => 'location-hero',
                'section'  => 'hero',
                'eyebrow'  => 'Custom Software Development in Mumbai, India',
                'title'    => 'Custom Software Development Company in Mumbai, India',
                'subtitle' => 'Build and scale software, trading tools and customer apps with a team that understands Mumbai’s speed and expectations.',
                'body'     => 'QalbIT works with Mumbai-based startups, BFSI players, media companies and enterprises to design, build and iterate software that supports growth, compliance and day-to-day operations.',

                'primary_cta' => [
                    'label' => 'Schedule a discovery call',
                    'url'   => '/contact-us/',
                    'style' => 'primary',
                ],
                'secondary_cta' => [
                    'label' => 'See how we work',
                    'url'   => '/engagement-model/',
                    'style' => 'ghost',
                ],

                'trust' => [
                    'label' => 'Trusted by teams in India, US, UK and GCC',
                    'items' => [
                        ['label' => '10+ years in custom software',      'icon' => null],
                        ['label' => 'Products used in 15+ countries',    'icon' => null],
                        ['label' => 'Founders & CTOs as core clients',   'icon' => null],
                    ],
                ],
                'meta' => [
                    'theme' => 'light-hero',
                ],
            ],

            'about' => [
                'id'      => 'location-about',
                'section' => 'about',
                'eyebrow' => 'About QalbIT',
                'title'   => 'A custom software partner for Mumbai’s product and IT teams',
                'intro'   => 'QalbIT works with Mumbai-based startups, financial institutions, media companies and enterprises as a long-term product and engineering partner.',

                'highlights' => [
                    [
                        'label'       => 'Experience with complex domains',
                        'description' => 'Comfortable with workflows in BFSI, logistics, marketplaces and SaaS products.',
                    ],
                    [
                        'label'       => 'IST-friendly collaboration',
                        'description' => 'Tight overlap with Mumbai working hours for planning, reviews and go-lives.',
                    ],
                    [
                        'label'       => 'Full-stack delivery teams',
                        'description' => 'Product, UX, frontend, backend, mobile and QA aligned to the same business goals.',
                    ],
                    [
                        'label'       => 'Audit and compliance aware',
                        'description' => 'Architectures and processes that support regulatory or internal audits.',
                    ],
                ],
            ],

            'services' => [
                'id'      => 'location-services',
                'section' => 'services',
                'eyebrow' => 'Services',
                'title'   => 'Custom software development services for Mumbai businesses',
                'intro'   => 'From new product builds to modernising legacy applications, QalbIT provides custom software development services for Mumbai-based teams.',

                'items' => [
                    [
                        'key'         => 'custom-software',
                        'label'       => 'Custom Software Development',
                        'description' => 'Line-of-business applications, portals and back-office tools built around your workflows.',
                        'url'         => '/services/custom-software-development/',
                    ],
                    [
                        'key'         => 'saas-mvp',
                        'label'       => 'SaaS & MVP Development',
                        'description' => 'Investor-ready MVPs and SaaS platforms targeting Indian and international customers.',
                        'url'         => '/start-up-mvp/',
                    ],
                    [
                        'key'         => 'mobile-apps',
                        'label'       => 'Mobile App Development',
                        'description' => 'Customer apps, partner apps and internal field apps built with Flutter and cross-platform stacks.',
                        'url'         => '/services/mobile-app-development/',
                    ],
                    [
                        'key'         => 'api-backend',
                        'label'       => 'API & Backend Engineering',
                        'description' => 'Stable APIs and integrations for core systems, payment gateways and data feeds.',
                        'url'         => '/services/api-development/',
                    ],
                    [
                        'key'         => 'cloud-devops',
                        'label'       => 'Cloud & DevOps',
                        'description' => 'CI/CD pipelines, monitoring and deployment strategies for high-traffic Mumbai applications.',
                        'url'         => '/services/cloud-based-solutions/',
                    ],
                    [
                        'key'         => 'dedicated-team',
                        'label'       => 'Dedicated Product Team',
                        'description' => 'A remote product squad that behaves like an extension of your Mumbai organisation.',
                        'url'         => '/engagement-models/',
                    ],
                ],
            ],

            'why' => [
                'id'      => 'location-why',
                'section' => 'why',
                'eyebrow' => 'Why QalbIT',
                'title'   => 'Why Mumbai teams choose QalbIT for custom software',
                'intro'   => 'Product and technology teams in Mumbai need partners who can move fast without losing structure. QalbIT is set up for that.',

                'reasons' => [
                    [
                        'label'       => 'Comfortable with demanding environments',
                        'description' => 'Used to working with teams that have aggressive roadmaps and many stakeholders.',
                        'bullets'     => [
                            'Clear expectations and transparent communication.',
                            'Ability to work with product managers and non-technical stakeholders.',
                        ],
                    ],
                    [
                        'label'       => 'Outcome-focused delivery',
                        'description' => 'We track success by adoption, reliability and speed of iteration, not just lines of code.',
                        'bullets'     => [
                            'Support with prioritisation based on impact.',
                            'Balance between experiments and stability.',
                        ],
                    ],
                    [
                        'label'       => 'Predictable execution',
                        'description' => 'Simple processes for planning, reviews, demos and releases.',
                        'bullets'     => [
                            'Sprints with clear scope and acceptance criteria.',
                            'Staging environments and visible progress updates.',
                        ],
                    ],
                    [
                        'label'       => 'Secure & scalable architecture',
                        'description' => 'Designs that can handle growth and meet internal security expectations.',
                        'bullets'     => [
                            'Role-based access and audit trails.',
                            'Cloud-native deployments with monitoring.',
                        ],
                    ],
                ],
            ],

            'process' => [
                'id'      => 'location-process',
                'section' => 'process',
                'eyebrow' => 'Process',
                'title'   => 'A clear product development process for Mumbai projects',
                'intro'   => 'We use a structured process so Mumbai stakeholders can stay aligned on priorities, scope and timelines.',

                'steps' => [
                    [
                        'label'       => 'Discover & define',
                        'description' => 'Clarify goals, constraints and success metrics before development.',
                        'related'     => 'start-up-mvp',
                    ],
                    [
                        'label'       => 'Design & validate',
                        'description' => 'User flows and prototypes to gather early feedback from stakeholders and users.',
                        'related'     => 'start-up-mvp',
                    ],
                    [
                        'label'       => 'Build iteratively',
                        'description' => 'Incremental delivery across frontend, backend and mobile.',
                        'related'     => 'product-scaling',
                    ],
                    [
                        'label'       => 'Launch & stabilise',
                        'description' => 'Coordinate go-live, monitor health and fix issues quickly.',
                        'related'     => 'product-scaling',
                    ],
                    [
                        'label'       => 'Improve & extend',
                        'description' => 'Continuous improvements and new features once the platform is stable.',
                        'related'     => 'digital-transformation',
                    ],
                ],

                'links' => [
                    [
                        'label' => 'See our full product development approach',
                        'url'   => '/start-up-mvp/',
                    ],
                    [
                        'label' => 'How we support scaling products',
                        'url'   => '/product-scaling/',
                    ],
                ],
            ],

            'engagements' => [
                'id'      => 'location-engagements',
                'section' => 'engagements',
                'eyebrow' => 'Engagement Models',
                'title'   => 'Engagement options for Mumbai teams',
                'intro'   => 'Choose the engagement model that fits your roadmap and adjust it as your product evolves.',

                'models' => [
                    [
                        'key'         => 'fixed-scope',
                        'label'       => 'Fixed-scope project',
                        'description' => 'Suitable for well-defined projects with clear timelines and deliverables.',
                        'best_for'    => 'Teams that know exactly what they need to launch.',
                        'link'        => '/start-up-mvp/',
                    ],
                    [
                        'key'         => 'dedicated-squad',
                        'label'       => 'Dedicated product squad',
                        'description' => 'A cross-functional team that works closely with your Mumbai product organisation.',
                        'best_for'    => 'Startups and enterprises with a steady flow of work.',
                        'link'        => '/engagement-models/',
                    ],
                    [
                        'key'         => 'continuous-support',
                        'label'       => 'Continuous improvement & support',
                        'description' => 'Retainer for ongoing maintenance, small improvements and support.',
                        'best_for'    => 'Teams running live products that need predictable support.',
                        'link'        => '/digital-transformation/',
                    ],
                ],
            ],

            'tech' => [
                'id'      => 'location-tech',
                'section' => 'tech',
                'eyebrow' => 'Technologies',
                'title'   => 'Tech stack for Mumbai software projects',
                'intro'   => 'We use modern open-source technologies that are proven for SaaS platforms, internal tools and high-traffic applications.',

                'categories' => [
                    [
                        'label' => 'Frontend',
                        'items' => ['React', 'Next.js', 'Vue.js', 'Tailwind CSS'],
                    ],
                    [
                        'label' => 'Backend & APIs',
                        'items' => ['Node.js', 'NestJS', 'PHP', 'Laravel'],
                    ],
                    [
                        'label' => 'Mobile',
                        'items' => ['Flutter', 'React Native'],
                    ],
                    [
                        'label' => 'Cloud & Databases',
                        'items' => ['AWS', 'GCP', 'PostgreSQL', 'MySQL', 'Redis'],
                    ],
                ],

                'links' => [
                    [
                        'label' => 'Explore our full tech stack',
                        'url'   => '/technologies/',
                    ],
                ],
            ],

            'proof' => [
                'id'      => 'location-proof',
                'section' => 'proof',
                'eyebrow' => 'Case Studies',
                'title'   => 'Products shipped with QalbIT',
                'intro'   => 'A snapshot of the types of software QalbIT has delivered. City-specific examples can be shared during discussions.',

                'cases' => [
                    [
                        'label'       => 'B2B SaaS platform',
                        'industry'    => 'SaaS / B2B',
                        'region'      => 'India & global',
                        'headline'    => 'Refactored and scaled a SaaS product used by enterprise clients.',
                        'result'      => 'Improved uptime, faster releases and cleaner architecture.',
                        'url'         => '/portfolio/',
                    ],
                    [
                        'label'       => 'Operations & analytics dashboards',
                        'industry'    => 'BFSI / Services',
                        'region'      => 'India',
                        'headline'    => 'Dashboards to make operations and reporting more transparent.',
                        'result'      => 'Better visibility for management and operations teams.',
                        'url'         => '/portfolio/',
                    ],
                ],

                'testimonials' => [
                    [
                        'quote'  => 'The QalbIT team gave us a predictable way to move from ideas to working software without losing momentum.',
                        'name'   => 'VP Technology',
                        'title'  => 'Indian SaaS company',
                        'region' => 'India',
                    ],
                ],
            ],

            'final_cta' => [
                'id'      => 'location-final-cta',
                'section' => 'final_cta',
                'eyebrow' => 'Start your project',
                'title'   => 'Discuss your custom software project in Mumbai',
                'body'    => 'Share a brief about your software project, timelines and goals. QalbIT will come back with next steps and a suggested engagement model.',

                'primary_cta' => [
                    'label' => 'Request a free consultation',
                    'url'   => '/contact-us/',
                ],
                'secondary_cta' => [
                    'label' => 'Book a call on Calendly',
                    'url'   => 'https://calendly.com/abidhusain-qalbit/discuss-project',
                ],

                'meta' => [
                    'show_form' => true,
                    'theme'     => 'light',
                ],
            ],
        ],
    ],

    // -------------------------------------------------
    // Delhi, India
    // -------------------------------------------------
    'delhi' => [
        'slug'         => '/india/delhi/',
        'template'     => 'pages/locations/show',
        'country_key'  => 'india',
        'country_name' => 'India',
        'state_key'    => 'delhi',

        'name'       => 'Delhi, India',
        'short_name' => 'Delhi',
        'enabled'    => true,
        'order'      => 330,

        'meta_title' => 'Custom Software Development in Delhi, India – QalbIT',
        'meta_description' => 'QalbIT is a custom software development company for startups, SMEs, enterprises and consultancies in Delhi, India. We build custom software, web applications and mobile apps.',
        'headline' => 'Custom Software Development in Delhi, India',
        'short_description' => 'Software, SaaS and internal tools for Delhi-based startups, enterprises and consulting firms.',

        'focus_services' => [
            'Custom Software Development',
            'Web Development',
            'Mobile App Development',
            'SaaS Product Development',
            'Cloud-Based Solutions',
        ],

        'faq_key'      => 'faq_location_india_delhi',
        'faq_title'    => 'Frequently asked questions from Delhi teams',
        'faq_subtitle' => 'Answers to common questions from founders, CIOs and IT heads in Delhi NCR.',
        'faq_bullets' => [
            '✓ Works well with Delhi NCR organisations that have multiple stakeholders.',
            '✓ Helps bring structure, transparency and traceability into existing processes.',
            '✓ Legal, compliance and documentation handled in line with Indian requirements.',
        ],

        'seo' => [
            'h1'               => 'Custom Software Development Company in Delhi, India',
            'meta_title'       => 'Custom Software Development in Delhi, India – QalbIT',
            'meta_description' => 'QalbIT helps Delhi and NCR organisations design and build custom software, SaaS, internal tools and mobile apps with a structured, transparent delivery model.',
            'canonical'        => '/india/delhi/',
            'faq_key'          => 'location_india_delhi',
            'breadcrumbs'      => [
                ['label' => 'Home',          'url' => '/'],
                ['label' => 'Delhi, India',  'url' => '/india/delhi/'],
            ],
        ],

        'summary' => [
            'eyebrow' => 'Custom Software Development in Delhi, India',
            'title'   => 'Remote custom software partner for Delhi NCR businesses',
            'intro'   => 'QalbIT supports Delhi-based organisations and consulting firms with custom software development across web, mobile and cloud.',
        ],

        'sections' => [

            'hero' => [
                'id'       => 'location-hero',
                'section'  => 'hero',
                'eyebrow'  => 'Custom Software Development in Delhi, India',
                'title'    => 'Custom Software Development Company in Delhi, India',
                'subtitle' => 'Plan, build and scale your software products with a delivery team that understands Delhi NCR stakeholder expectations.',
                'body'     => 'From internal applications for enterprises and PSUs to new SaaS platforms, QalbIT works with Delhi-based teams to design, build and iterate software that supports operations and growth.',

                'primary_cta' => [
                    'label' => 'Schedule a discovery call',
                    'url'   => '/contact-us/',
                    'style' => 'primary',
                ],
                'secondary_cta' => [
                    'label' => 'See how we work',
                    'url'   => '/engagement-model/',
                    'style' => 'ghost',
                ],

                'trust' => [
                    'label' => 'Trusted by teams in India, US, UK and GCC',
                    'items' => [
                        ['label' => '10+ years in custom software',      'icon' => null],
                        ['label' => 'Products used in 15+ countries',    'icon' => null],
                        ['label' => 'Founders & CTOs as core clients',   'icon' => null],
                    ],
                ],
                'meta' => [
                    'theme' => 'light-hero',
                ],
            ],

            'about' => [
                'id'      => 'location-about',
                'section' => 'about',
                'eyebrow' => 'About QalbIT',
                'title'   => 'Custom software partner for Delhi enterprises, startups and consultancies',
                'intro'   => 'QalbIT works with Delhi NCR organisations as an external product engineering team focused on outcomes and stability.',

                'highlights' => [
                    [
                        'label'       => 'Comfortable with enterprise environments',
                        'description' => 'Experience working with layered approvals, security reviews and formal change processes.',
                    ],
                    [
                        'label'       => 'Structured communication',
                        'description' => 'Clear written updates and documentation so large stakeholder groups stay aligned.',
                    ],
                    [
                        'label'       => 'End-to-end teams',
                        'description' => 'From early discovery to post-launch support handled by a single, stable partner.',
                    ],
                    [
                        'label'       => 'Security-aware delivery',
                        'description' => 'Designs that consider access, logging and compliance from the start.',
                    ],
                ],
            ],

            'services' => [
                'id'      => 'location-services',
                'section' => 'services',
                'eyebrow' => 'Services',
                'title'   => 'Custom software development services for Delhi and NCR',
                'intro'   => 'We help Delhi-based organisations build new software as well as replace spreadsheets and legacy tools with stable, maintainable systems.',

                'items' => [
                    [
                        'key'         => 'custom-software',
                        'label'       => 'Custom Software Development',
                        'description' => 'Business applications and internal tools tailored to your processes and reporting needs.',
                        'url'         => '/services/custom-software-development/',
                    ],
                    [
                        'key'         => 'saas-mvp',
                        'label'       => 'SaaS & MVP Development',
                        'description' => 'New SaaS products and MVPs for consulting, education, HR, finance and more.',
                        'url'         => '/start-up-mvp/',
                    ],
                    [
                        'key'         => 'mobile-apps',
                        'label'       => 'Mobile App Development',
                        'description' => 'Android and iOS apps for customers, partners and internal teams.',
                        'url'         => '/services/mobile-app-development/',
                    ],
                    [
                        'key'         => 'api-backend',
                        'label'       => 'API & Backend Engineering',
                        'description' => 'Backends and integrations between existing systems, CRMs and ERPs.',
                        'url'         => '/services/api-development/',
                    ],
                    [
                        'key'         => 'cloud-devops',
                        'label'       => 'Cloud & DevOps',
                        'description' => 'Environment strategy, CI/CD and monitoring for Delhi NCR deployments.',
                        'url'         => '/services/cloud-based-solutions/',
                    ],
                    [
                        'key'         => 'dedicated-team',
                        'label'       => 'Dedicated Product Team',
                        'description' => 'A stable remote squad that acts as your extended product and development team.',
                        'url'         => '/engagement-models/',
                    ],
                ],
            ],

            'why' => [
                'id'      => 'location-why',
                'section' => 'why',
                'eyebrow' => 'Why QalbIT',
                'title'   => 'Why Delhi teams work with QalbIT',
                'intro'   => 'Organisations in Delhi need partners who respect governance while still moving fast enough to deliver.',

                'reasons' => [
                    [
                        'label'       => 'Governance-friendly processes',
                        'description' => 'We can work inside your approval structure, change processes and documentation standards.',
                        'bullets'     => [
                            'Clear acceptance criteria and sign-off checkpoints.',
                            'Documentation that makes internal approvals easier.',
                        ],
                    ],
                    [
                        'label'       => 'Outcome-led projects',
                        'description' => 'Focus on measurable improvements in turnaround time, visibility or revenue, not just delivery dates.',
                        'bullets'     => [
                            'Collaborative scoping of KPIs and metrics.',
                            'Honest conversations about trade-offs.',
                        ],
                    ],
                    [
                        'label'       => 'Predictable execution',
                        'description' => 'Transparent planning, demos and releases aligned with stakeholder calendars.',
                        'bullets'     => [
                            'Sprints with agreed scope and dates.',
                            'Regular demos and steering updates.',
                        ],
                    ],
                    [
                        'label'       => 'Security by default',
                        'description' => 'Attention to access control, logging and environments from the start.',
                        'bullets'     => [
                            'Least-privilege roles and audit logs.',
                            'Cloud-native deployments with monitoring.',
                        ],
                    ],
                ],
            ],

            'process' => [
                'id'      => 'location-process',
                'section' => 'process',
                'eyebrow' => 'Process',
                'title'   => 'Product development process for Delhi projects',
                'intro'   => 'A structured process that fits how Delhi organisations plan and approve software initiatives.',

                'steps' => [
                    [
                        'label'       => 'Discover & define',
                        'description' => 'Clarify scope, stakeholders and non-functional requirements.',
                        'related'     => 'start-up-mvp',
                    ],
                    [
                        'label'       => 'Design & validate',
                        'description' => 'Workflows, wireframes and prototypes validated with key stakeholders.',
                        'related'     => 'start-up-mvp',
                    ],
                    [
                        'label'       => 'Build iteratively',
                        'description' => 'Incremental delivery that fits with review cycles and approvals.',
                        'related'     => 'product-scaling',
                    ],
                    [
                        'label'       => 'Launch & stabilise',
                        'description' => 'Coordinated launches with monitoring and support plans.',
                        'related'     => 'product-scaling',
                    ],
                    [
                        'label'       => 'Improve & extend',
                        'description' => 'Enhancements and new features based on real usage and feedback.',
                        'related'     => 'digital-transformation',
                    ],
                ],

                'links' => [
                    [
                        'label' => 'See our full product development approach',
                        'url'   => '/start-up-mvp/',
                    ],
                    [
                        'label' => 'How we support scaling products',
                        'url'   => '/product-scaling/',
                    ],
                ],
            ],

            'engagements' => [
                'id'      => 'location-engagements',
                'section' => 'engagements',
                'eyebrow' => 'Engagement Models',
                'title'   => 'Engagement options for Delhi organisations',
                'intro'   => 'Engagement models that fit projects with clear scope as well as ongoing product roadmaps.',

                'models' => [
                    [
                        'key'         => 'fixed-scope',
                        'label'       => 'Fixed-scope project',
                        'description' => 'Ideal for initiatives with clear requirements and deadlines.',
                        'best_for'    => 'Departments and teams with approved budgets and scope.',
                        'link'        => '/start-up-mvp/',
                    ],
                    [
                        'key'         => 'dedicated-squad',
                        'label'       => 'Dedicated product squad',
                        'description' => 'External product engineering team aligned with your long-term roadmap.',
                        'best_for'    => 'Organisations building or evolving multiple systems.',
                        'link'        => '/engagement-models/',
                    ],
                    [
                        'key'         => 'continuous-support',
                        'label'       => 'Continuous improvement & support',
                        'description' => 'Retainer for support, enhancement and optimisation of live systems.',
                        'best_for'    => 'Teams that need predictable support for existing platforms.',
                        'link'        => '/digital-transformation/',
                    ],
                ],
            ],

            'tech' => [
                'id'      => 'location-tech',
                'section' => 'tech',
                'eyebrow' => 'Technologies',
                'title'   => 'Tech stack for Delhi software projects',
                'intro'   => 'Modern, proven technologies suitable for enterprise and growth-stage products.',

                'categories' => [
                    [
                        'label' => 'Frontend',
                        'items' => ['React', 'Next.js', 'Vue.js', 'Tailwind CSS'],
                    ],
                    [
                        'label' => 'Backend & APIs',
                        'items' => ['Node.js', 'NestJS', 'PHP', 'Laravel'],
                    ],
                    [
                        'label' => 'Mobile',
                        'items' => ['Flutter', 'React Native'],
                    ],
                    [
                        'label' => 'Cloud & Databases',
                        'items' => ['AWS', 'GCP', 'PostgreSQL', 'MySQL', 'Redis'],
                    ],
                ],

                'links' => [
                    [
                        'label' => 'Explore our full tech stack',
                        'url'   => '/technologies/',
                    ],
                ],
            ],

            'proof' => [
                'id'      => 'location-proof',
                'section' => 'proof',
                'eyebrow' => 'Case Studies',
                'title'   => 'Selected work from QalbIT',
                'intro'   => 'Examples of platforms and tools delivered for Indian and global teams.',

                'cases' => [
                    [
                        'label'       => 'Internal workflow system',
                        'industry'    => 'Services / Consulting',
                        'region'      => 'India',
                        'headline'    => 'Digitised manual approval and reporting workflows across teams.',
                        'result'      => 'Shorter turnaround times and better visibility.',
                        'url'         => '/portfolio/',
                    ],
                    [
                        'label'       => 'SaaS product for B2B',
                        'industry'    => 'SaaS / B2B',
                        'region'      => 'India & global',
                        'headline'    => 'Helped a team scale their SaaS while keeping the platform stable.',
                        'result'      => 'Improved performance and faster feature releases.',
                        'url'         => '/portfolio/',
                    ],
                ],

                'testimonials' => [
                    [
                        'quote'  => 'The team at QalbIT was structured, transparent and easy to work with across multiple stakeholders.',
                        'name'   => 'Project Sponsor',
                        'title'  => 'Enterprise client',
                        'region' => 'India',
                    ],
                ],
            ],

            'final_cta' => [
                'id'      => 'location-final-cta',
                'section' => 'final_cta',
                'eyebrow' => 'Start your project',
                'title'   => 'Discuss your custom software project in Delhi',
                'body'    => 'Share a brief about your software initiative, timelines and goals. QalbIT will respond with a practical next-step plan.',

                'primary_cta' => [
                    'label' => 'Request a free consultation',
                    'url'   => '/contact-us/',
                ],
                'secondary_cta' => [
                    'label' => 'Book a call on Calendly',
                    'url'   => 'https://calendly.com/abidhusain-qalbit/discuss-project',
                ],

                'meta' => [
                    'show_form' => true,
                    'theme'     => 'light',
                ],
            ],
        ],
    ],

    // -------------------------------------------------
    // Bangalore, India
    // -------------------------------------------------
    'bangalore' => [
        'slug'         => '/india/bangalore/',
        'template'     => 'pages/locations/show',
        'country_key'  => 'india',
        'country_name' => 'India',
        'state_key'    => 'bangalore',

        'name'       => 'Bangalore (Bengaluru), India',
        'short_name' => 'Bangalore',
        'enabled'    => true,
        'order'      => 340,

        'meta_title' => 'Custom Software Development in Bangalore (Bengaluru), India – QalbIT',
        'meta_description' => 'QalbIT is a custom software development company for startups and product companies in Bangalore (Bengaluru), India. We build SaaS products, web apps and mobile apps for global markets.',
        'headline' => 'Custom Software Development in Bangalore (Bengaluru), India',
        'short_description' => 'Product-focused software development for Bangalore SaaS teams, startups and tech-enabled businesses.',

        'focus_services' => [
            'Custom Software Development',
            'Web Development',
            'Mobile App Development',
            'SaaS Product Development',
            'Cloud-Based Solutions',
        ],

        'faq_key'      => 'faq_location_india_bangalore',
        'faq_title'    => 'Frequently asked questions from Bangalore teams',
        'faq_subtitle' => 'Answers for founders, CTOs and product leaders building from Bangalore / Bengaluru.',
        'faq_bullets' => [
            '✓ Comfortable integrating into existing product and engineering rituals in Bangalore.',
            '✓ Emphasis on clean APIs, developer experience and long-term extensibility.',
            '✓ Contracts and IP terms designed for tech-focused, often VC-backed teams.',
        ],

        'seo' => [
            'h1'               => 'Custom Software Development Company in Bangalore (Bengaluru), India',
            'meta_title'       => 'Custom Software Development in Bangalore (Bengaluru), India – QalbIT',
            'meta_description' => 'QalbIT works with Bangalore-based startups and SaaS companies as a product-first engineering partner, building and scaling custom software, web and mobile apps.',
            'canonical'        => '/india/bangalore/',
            'faq_key'          => 'location_india_bangalore',
            'breadcrumbs'      => [
                ['label' => 'Home',                      'url' => '/'],
                ['label' => 'Bangalore (Bengaluru), India', 'url' => '/india/bangalore/'],
            ],
        ],

        'summary' => [
            'eyebrow' => 'Custom Software Development in Bangalore (Bengaluru), India',
            'title'   => 'Product-first engineering partner for Bangalore SaaS and startups',
            'intro'   => 'QalbIT supports Bangalore-based founders and product leaders who need a stable remote squad to build and scale their products.',
        ],

        'sections' => [

            'hero' => [
                'id'       => 'location-hero',
                'section'  => 'hero',
                'eyebrow'  => 'Custom Software Development in Bangalore (Bengaluru), India',
                'title'    => 'Custom Software Development Company in Bangalore (Bengaluru), India',
                'subtitle' => 'Build, iterate and scale your SaaS or platform with a product-minded engineering team.',
                'body'     => 'QalbIT partners with Bangalore-based founders and product teams to design, build and evolve SaaS products, platforms and internal tools using modern, scalable architectures.',

                'primary_cta' => [
                    'label' => 'Schedule a discovery call',
                    'url'   => '/contact-us/',
                    'style' => 'primary',
                ],
                'secondary_cta' => [
                    'label' => 'See how we work',
                    'url'   => '/engagement-model/',
                    'style' => 'ghost',
                ],

                'trust' => [
                    'label' => 'Trusted by teams in India, US, UK and GCC',
                    'items' => [
                        ['label' => '10+ years in custom software',      'icon' => null],
                        ['label' => 'Products used in 15+ countries',    'icon' => null],
                        ['label' => 'Founders & CTOs as core clients',   'icon' => null],
                    ],
                ],
                'meta' => [
                    'theme' => 'light-hero',
                ],
            ],

            'about' => [
                'id'      => 'location-about',
                'section' => 'about',
                'eyebrow' => 'About QalbIT',
                'title'   => 'Product-led custom software partner for Bangalore startups',
                'intro'   => 'QalbIT acts as an external product engineering team for Bangalore-based startups, SaaS companies and tech-enabled businesses.',

                'highlights' => [
                    [
                        'label'       => 'Built for SaaS & platforms',
                        'description' => 'Experience designing and scaling SaaS, multi-tenant systems and B2B platforms.',
                    ],
                    [
                        'label'       => 'Founder and PM friendly',
                        'description' => 'Fluent in product metrics, activation, retention and technical debt conversations.',
                    ],
                    [
                        'label'       => 'Full-stack squads',
                        'description' => 'Capability across UX, frontend, backend, mobile and DevOps in a single team.',
                    ],
                    [
                        'label'       => 'Async and remote by design',
                        'description' => 'Processes built for remote collaboration, documentation and continuous delivery.',
                    ],
                ],
            ],

            'services' => [
                'id'      => 'location-services',
                'section' => 'services',
                'eyebrow' => 'Services',
                'title'   => 'Custom software & product development services for Bangalore',
                'intro'   => 'We work best with founders and product teams who want a long-term external product engineering partner.',

                'items' => [
                    [
                        'key'         => 'custom-software',
                        'label'       => 'Custom Software Development',
                        'description' => 'Back-office tools, admin consoles and customer-facing apps tailored to your product strategy.',
                        'url'         => '/services/custom-software-development/',
                    ],
                    [
                        'key'         => 'saas-mvp',
                        'label'       => 'SaaS & MVP Development',
                        'description' => 'Design and build MVPs that investors and customers can actually use and learn from.',
                        'url'         => '/start-up-mvp/',
                    ],
                    [
                        'key'         => 'mobile-apps',
                        'label'       => 'Mobile App Development',
                        'description' => 'Product-aligned mobile apps for iOS and Android built with Flutter and modern tooling.',
                        'url'         => '/services/mobile-app-development/',
                    ],
                    [
                        'key'         => 'api-backend',
                        'label'       => 'API & Backend Engineering',
                        'description' => 'APIs, integrations and services designed for scale and reliability.',
                        'url'         => '/services/api-development/',
                    ],
                    [
                        'key'         => 'cloud-devops',
                        'label'       => 'Cloud & DevOps',
                        'description' => 'Deployment pipelines, observability and environment strategies for fast-moving products.',
                        'url'         => '/services/cloud-based-solutions/',
                    ],
                    [
                        'key'         => 'dedicated-team',
                        'label'       => 'Dedicated Product Team',
                        'description' => 'Long-term remote squad that behaves like your internal product team.',
                        'url'         => '/engagement-models/',
                    ],
                ],
            ],

            'why' => [
                'id'      => 'location-why',
                'section' => 'why',
                'eyebrow' => 'Why QalbIT',
                'title'   => 'Why Bangalore startups and SaaS teams work with QalbIT',
                'intro'   => 'We understand the expectations and constraints of building product companies from Bangalore.',

                'reasons' => [
                    [
                        'label'       => 'Product-first thinking',
                        'description' => 'We work backwards from customer journeys and product metrics, not just feature checklists.',
                        'bullets'     => [
                            'Support with roadmap shaping and sequencing.',
                            'Attention to activation, retention and usability.',
                        ],
                    ],
                    [
                        'label'       => 'Built for iterative delivery',
                        'description' => 'Comfortable with weekly releases, experiments and feedback loops.',
                        'bullets'     => [
                            'Feature flags and safe rollouts.',
                            'Architecture that supports frequent change.',
                        ],
                    ],
                    [
                        'label'       => 'Transparent communication',
                        'description' => 'Async-friendly, written communication plus regular calls whenever needed.',
                        'bullets'     => [
                            'Clear status updates and demo recordings.',
                            'Shared understanding of priorities and trade-offs.',
                        ],
                    ],
                    [
                        'label'       => 'Scale-ready foundations',
                        'description' => 'Designs that can handle more users, data and features without collapsing.',
                        'bullets'     => [
                            'Observability, logging and monitoring in place.',
                            'Cloud-native infrastructure with room to grow.',
                        ],
                    ],
                ],
            ],

            'process' => [
                'id'      => 'location-process',
                'section' => 'process',
                'eyebrow' => 'Process',
                'title'   => 'Product development process for Bangalore startups',
                'intro'   => 'A delivery model that fits how early-stage and growth-stage startups in Bangalore operate.',

                'steps' => [
                    [
                        'label'       => 'Discover & define',
                        'description' => 'Clarify hypotheses, constraints and success metrics before building.',
                        'related'     => 'start-up-mvp',
                    ],
                    [
                        'label'       => 'Design & validate',
                        'description' => 'Flows and prototypes tested with users or internal stakeholders.',
                        'related'     => 'start-up-mvp',
                    ],
                    [
                        'label'       => 'Build iteratively',
                        'description' => 'Incremental delivery that supports experiments and quick changes.',
                        'related'     => 'product-scaling',
                    ],
                    [
                        'label'       => 'Launch & stabilise',
                        'description' => 'Launch management, monitoring and rapid fixes post-release.',
                        'related'     => 'product-scaling',
                    ],
                    [
                        'label'       => 'Improve & extend',
                        'description' => 'Continuous improvements based on real-world usage and metrics.',
                        'related'     => 'digital-transformation',
                    ],
                ],

                'links' => [
                    [
                        'label' => 'See our full product development approach',
                        'url'   => '/start-up-mvp/',
                    ],
                    [
                        'label' => 'How we support scaling products',
                        'url'   => '/product-scaling/',
                    ],
                ],
            ],

            'engagements' => [
                'id'      => 'location-engagements',
                'section' => 'engagements',
                'eyebrow' => 'Engagement Models',
                'title'   => 'Engagement options for Bangalore product teams',
                'intro'   => 'Engagements designed for both early-stage and scaling products.',

                'models' => [
                    [
                        'key'         => 'fixed-scope',
                        'label'       => 'Fixed-scope project',
                        'description' => 'Best when you have a clear MVP definition and timeline.',
                        'best_for'    => 'Founders who want to de-risk their first launch.',
                        'link'        => '/start-up-mvp/',
                    ],
                    [
                        'key'         => 'dedicated-squad',
                        'label'       => 'Dedicated product squad',
                        'description' => 'A long-term remote squad that works hand-in-hand with your core product team.',
                        'best_for'    => 'Startups and SaaS companies with ongoing roadmaps.',
                        'link'        => '/engagement-models/',
                    ],
                    [
                        'key'         => 'continuous-support',
                        'label'       => 'Continuous improvement & support',
                        'description' => 'Retainer covering bug fixes, small improvements and operational support.',
                        'best_for'    => 'Teams with live products that need predictable care.',
                        'link'        => '/digital-transformation/',
                    ],
                ],
            ],

            'tech' => [
                'id'      => 'location-tech',
                'section' => 'tech',
                'eyebrow' => 'Technologies',
                'title'   => 'Tech stack for Bangalore SaaS & product builds',
                'intro'   => 'The same modern stack we use for SaaS, platforms and internal tools across markets.',

                'categories' => [
                    [
                        'label' => 'Frontend',
                        'items' => ['React', 'Next.js', 'Vue.js', 'Tailwind CSS'],
                    ],
                    [
                        'label' => 'Backend & APIs',
                        'items' => ['Node.js', 'NestJS', 'PHP', 'Laravel'],
                    ],
                    [
                        'label' => 'Mobile',
                        'items' => ['Flutter', 'React Native'],
                    ],
                    [
                        'label' => 'Cloud & Databases',
                        'items' => ['AWS', 'GCP', 'PostgreSQL', 'MySQL', 'Redis'],
                    ],
                ],

                'links' => [
                    [
                        'label' => 'Explore our full tech stack',
                        'url'   => '/technologies/',
                    ],
                ],
            ],

            'proof' => [
                'id'      => 'location-proof',
                'section' => 'proof',
                'eyebrow' => 'Case Studies',
                'title'   => 'SaaS & product work from QalbIT',
                'intro'   => 'Representative examples of products we have helped design, build and scale.',

                'cases' => [
                    [
                        'label'       => 'VC-backed SaaS product',
                        'industry'    => 'SaaS / B2B',
                        'region'      => 'India & global',
                        'headline'    => 'Supported a SaaS team with refactors, new modules and performance work.',
                        'result'      => 'Higher stability, improved performance and faster releases.',
                        'url'         => '/portfolio/',
                    ],
                    [
                        'label'       => 'Internal tooling for operations',
                        'industry'    => 'Tech-enabled services',
                        'region'      => 'India',
                        'headline'    => 'Built internal tools replacing spreadsheets and manual reporting.',
                        'result'      => 'Better visibility and fewer manual steps.',
                        'url'         => '/portfolio/',
                    ],
                ],

                'testimonials' => [
                    [
                        'quote'  => 'QalbIT gave us a structured way to move fast without breaking everything for our users.',
                        'name'   => 'Founder',
                        'title'  => 'Bangalore-based SaaS startup',
                        'region' => 'India',
                    ],
                ],
            ],

            'final_cta' => [
                'id'      => 'location-final-cta',
                'section' => 'final_cta',
                'eyebrow' => 'Start your project',
                'title'   => 'Discuss your custom software project in Bangalore',
                'body'    => 'Share your product idea, current challenges and timelines. QalbIT will propose next steps and an engagement model that fits.',

                'primary_cta' => [
                    'label' => 'Request a free consultation',
                    'url'   => '/contact-us/',
                ],
                'secondary_cta' => [
                    'label' => 'Book a call on Calendly',
                    'url'   => 'https://calendly.com/abidhusain-qalbit/discuss-project',
                ],

                'meta' => [
                    'show_form' => true,
                    'theme'     => 'light',
                ],
            ],
        ],
    ],

];
