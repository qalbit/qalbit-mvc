<?php
return [
    'nodejs' => [
        'slug'     => '/hire-nodejs-developers/',
        'name'     => 'Hire Node.js Developers',
        'h1'       => 'Hire Dedicated Node.js Developers for Scalable, Real-Time Applications',
        'enabled'  => true,
        'order'    => 40,

        'meta_title'       => 'Hire Dedicated Node.js Developers – Remote Node.js Development Team | QalbIT',
        'meta_description' => 'Hire dedicated Node.js and TypeScript developers from QalbIT to build and scale real-time applications, APIs and backends. Get a remote Node.js team that understands product, performance and clean architecture.',

        'short_description' => 'Dedicated Node.js developers and product-minded teams to design, build and scale real-time apps, APIs and backends with clean architecture and predictable delivery.',
        'category'          => 'hire',
        'template'          => 'pages/services/hire-nodejs-developers',

        'icon'    => 'images/services/icon-hire-nodejs-developers.svg',
        'iconAlt' => 'Icon representing hiring Node.js developers',

        'faq_key'      => 'service_hire_nodejs_developers',
        'faq_title'    => 'Frequently asked questions about hiring Node.js developers with QalbIT',
        'faq_subtitle' => 'These are the questions founders, CTOs and product leaders usually ask when they consider hiring Node.js developers or a Node.js squad with QalbIT.',
        'faq_bullets'  => [
            '✓ Remote-first Node.js squads with clear overlap for planning, demos and critical releases.',
            '✓ Flexible engagement models – start with a pilot sprint, then grow into a stable squad.',
            '✓ You own the Node.js codebase and IP, with NDAs and contracts aligned to your jurisdiction.',
        ],

        'hero' => [
            'breadcrumb_label' => 'Hire Node.js developers',
            'kicker_prefix'    => 'Hire developers',
            'kicker_label'     => 'Node.js development',
            'kicker_detail'    => 'APIs · Real-time apps · Microservices',

            'title'     => 'Hire Dedicated Node.js Developers for <span class="text-gradient-brand-animated">Real-Time & API-First Products</span>.',
            'highlight' => 'Real-Time & API-First Products',

            'intro' => 'QalbIT provides dedicated Node.js and TypeScript developers who specialise in building API-first, real-time and event-driven applications. We plug in as a remote extension of your product team, focusing on clean architectures, performance and predictable delivery rather than just billable hours.',

            'primary_cta_label' => 'Discuss your Node.js project',
            'primary_cta_href'  => '/contact-us/?topic=hire-nodejs-developers',

            'secondary_cta_label' => 'Book a free consultation',
            'secondary_cta_href'  => 'https://calendly.com/abidhusain-qalbit/discuss-project',

            'snapshot_title' => 'Node.js hiring snapshot',
            'snapshot'       => [
                [
                    'label' => 'Typical engagement',
                    'value' => 'Dedicated Node.js squad or fixed-scope backend project',
                ],
                [
                    'label' => 'Core focus',
                    'value' => 'Real-time dashboards, API backends and integrations',
                ],
                [
                    'label' => 'Time to start',
                    'value' => '1–3 weeks after scope and team fit are aligned',
                ],
                [
                    'label' => 'Delivery model',
                    'value' => 'Pilot sprint, then ongoing sprints with clear KPIs',
                ],
            ],
        ],

        'overview' => [
            'id'      => 'hire-nodejs-overview',
            'eyebrow' => 'Node.js overview',

            'title' => 'When hiring Node.js developers with QalbIT makes sense',
            'intro' => 'We partner with product teams that need Node.js specialists to support growth, performance and reliability – without turning their roadmap into a risky outsourcing experiment.',

            'left_title' => 'When a dedicated Node.js team is the right move',
            'left_items' => [
                'You are building or scaling a real-time product – dashboards, live notifications, chats or streaming experiences.',
                'You want a stable backend/API layer in Node.js and TypeScript to serve web and mobile clients.',
                'Your existing Node.js codebase is hard to extend and you need a senior squad to stabilise and improve it.',
                'You prefer a team that can take ownership of architecture, DevOps and observability – not just writing handlers.',
                'You need predictable capacity for Node.js work without hiring a full in-house team immediately.',
            ],

            'right_title' => 'Outcomes we target for Node.js engagements',
            'right_items' => [
                'Stable, observable Node.js services with clear logging, metrics and alerts.',
                'Improved performance for critical endpoints and workloads under real traffic.',
                'An API-first backend that is easy for frontend and mobile teams to consume.',
                'Reduced operational risk by introducing CI/CD, code review and testing discipline.',
                'Well-documented services so handovers and onboarding new developers stay smooth.',
            ],

            'note' => 'We usually recommend starting with a small pilot or discovery sprint. This allows us to understand your existing architecture, validate collaboration and plan realistic Node.js delivery milestones before scaling up.',
        ],

        'capabilities' => [
            'id'      => 'hire-nodejs-capabilities',
            'eyebrow' => 'What our Node.js developers deliver',
            'title'   => 'Node.js development capabilities for API-first and real-time products',
            'intro'   => 'From backend APIs and microservices to real-time features and integrations, our Node.js teams focus on building reliable foundations that your product can grow on.',

            'items' => [
                [
                    'label'       => 'API-first backends & microservices',
                    'description' => 'Design and build REST and GraphQL APIs, microservices and modular backends using Node.js and TypeScript, structured for long-term maintainability.',
                    'badge'       => 'APIs & services',
                    'icon'        => '/images/icons/api.svg',
                ],
                [
                    'label'       => 'Real-time applications & features',
                    'description' => 'Implement WebSockets, Socket.io or event streams for live dashboards, notifications, chats and in-product collaboration.',
                    'badge'       => 'Real-time',
                    'icon'        => '/images/icons/realtime.svg',
                ],
                [
                    'label'       => 'Backend for web & mobile apps',
                    'description' => 'Secure Node.js backends powering React/Next.js frontends and mobile apps, with proper auth, RBAC and session management.',
                    'badge'       => 'Backends',
                    'icon'        => '/images/icons/backend.svg',
                ],
                [
                    'label'       => 'Integrations, jobs & automation',
                    'description' => 'Background workers, queues and integrations with CRMs, payment gateways, analytics tools and third-party APIs.',
                    'badge'       => 'Integrations',
                    'icon'        => '/images/icons/integrations.svg',
                ],
                [
                    'label'       => 'Modernisation & performance work',
                    'description' => 'Refactor legacy Node.js codebases, split monoliths into services, address N+1 issues and optimise for throughput and latency.',
                    'badge'       => 'Modernisation',
                    'icon'        => '/images/icons/performance.svg',
                ],
                [
                    'label'       => 'Support, monitoring & incident response',
                    'description' => 'Ongoing support, monitoring, logging and on-call routines so your Node.js stack stays healthy in production.',
                    'badge'       => 'Support',
                    'icon'        => '/images/icons/ops.svg',
                ],
            ],

            'cta' => [
                'label' => 'Talk through your Node.js requirements',
                'url'   => '/contact-us/?topic=hire-nodejs-developers',
            ],
        ],

        'process' => [
            'id'      => 'hire-nodejs-process',
            'eyebrow' => 'How it works',
            'title'   => 'A practical process for hiring and working with Node.js developers',
            'intro'   => 'We keep the process simple and transparent so you know who is on your squad, what they are working on and how delivery is measured.',

            'items' => [
                [
                    'step'        => 1,
                    'title'       => 'Discovery & team fit',
                    'description' => 'We review your product, current stack and roadmap, then propose a Node.js squad composition, scope and engagement model that fits your goals.',
                    'duration'    => '1–2 weeks',
                    'outcome'     => 'Clear view of scope, priorities, timelines and required Node.js roles.',
                    'icon'        => '/images/icons/discovery.svg',
                ],
                [
                    'step'        => 2,
                    'title'       => 'Pilot sprint or module',
                    'description' => 'Start with a short, time-boxed sprint focused on a meaningful module or performance improvement to validate collaboration and technical approach.',
                    'duration'    => '2–4 weeks',
                    'outcome'     => 'Working Node.js code in your environment and a shared understanding of how we deliver.',
                    'icon'        => '/images/icons/pilot.svg',
                ],
                [
                    'step'        => 3,
                    'title'       => 'Scale the Node.js squad',
                    'description' => 'Once you are confident in our approach, we scale up to a stable squad and establish regular sprint cycles, demos and reporting.',
                    'duration'    => 'Ongoing',
                    'outcome'     => 'Predictable delivery of Node.js work with clear ownership and communication.',
                    'icon'        => '/images/icons/team.svg',
                ],
                [
                    'step'        => 4,
                    'title'       => 'Optimise & evolve',
                    'description' => 'We proactively identify performance, security and DX improvements while continuing to ship new features and integrations.',
                    'duration'    => 'Ongoing',
                    'outcome'     => 'A Node.js stack that becomes easier, not harder, to maintain as your product grows.',
                    'icon'        => '/images/icons/scale.svg',
                ],
            ],

            'cta' => [
                'label' => 'Walk me through this for my Node.js stack',
                'url'   => '/contact-us/?topic=hire-nodejs-developers',
            ],
        ],

        'use_cases' => [
            'id'      => 'hire-nodejs-use-cases',
            'eyebrow' => 'Where Node.js fits best',
            'title'   => 'Node.js use cases we most often deliver',
            'intro'   => 'Most of our Node.js work focuses on high-interaction, data-rich products where responsiveness and scalability matter.',

            'items' => [
                [
                    'label'       => 'Real-time dashboards & control panels',
                    'description' => 'Monitoring and operations dashboards that need push updates, live charts and streaming data.',
                    'audience'    => 'SaaS products, logistics and operations-heavy businesses',
                    'badge'       => 'Real-time',
                ],
                [
                    'label'       => 'API platforms & integration hubs',
                    'description' => 'Central APIs that connect web, mobile and third-party systems with robust auth and rate limiting.',
                    'audience'    => 'Companies connecting multiple products and services',
                    'badge'       => 'APIs',
                ],
                [
                    'label'       => 'Collaboration and communication tools',
                    'description' => 'Chats, notifications and collaboration features where low latency and concurrency are key.',
                    'audience'    => 'Product, HR, support and customer-facing teams',
                    'badge'       => 'Collaboration',
                ],
                [
                    'label'       => 'Modernising backend services',
                    'description' => 'Re-platforming legacy backends into Node.js services with better performance and developer experience.',
                    'audience'    => 'Teams constrained by slow, monolithic systems',
                    'badge'       => 'Modernisation',
                    'link'        => [
                        'label' => 'Discuss modernising your backend',
                        'url'   => '/contact-us/?topic=hire-nodejs-developers',
                    ],
                ],
            ],

            'cta' => [
                'label' => 'Ask if your use case is a good fit for Node.js',
                'url'   => '/contact-us/?topic=hire-nodejs-developers',
            ],
        ],

        'stack' => [
            'id'      => 'hire-nodejs-tech-stack',
            'eyebrow' => 'Tech stack & ecosystem',
            'title'   => 'Tech stack our Node.js developers typically use',
            'intro'   => 'We pick Node.js libraries and tooling that balance long-term maintainability with your team’s familiarity and your product’s needs.',
            'note'    => 'If you already have a Node.js codebase, we review what you have and improve it where sensible instead of forcing a rewrite.',

            'categories' => [
                [
                    'name'        => 'Backend & services',
                    'description' => 'Core business logic and APIs.',
                    'items'       => [
                        'Node.js (LTS), TypeScript-first implementations.',
                        'NestJS or Express for structured, testable services.',
                        'REST, GraphQL and gRPC for internal and external APIs.',
                    ],
                ],
                [
                    'name'        => 'Real-time & messaging',
                    'description' => 'Features that depend on low latency and concurrency.',
                    'items'       => [
                        'WebSockets, Socket.io and SSE for real-time experiences.',
                        'Message queues and event buses for decoupled architectures.',
                        'Rate limiting, back-pressure and resilience patterns.',
                    ],
                ],
                [
                    'name'        => 'Data & infrastructure',
                    'description' => 'Storage, caching and deployments.',
                    'items'       => [
                        'PostgreSQL and MySQL with proper indexing and migrations.',
                        'Redis for caching, queues and session management.',
                        'Docker, Kubernetes (where needed), AWS/GCP/DO hosting with CI/CD.',
                    ],
                ],
                [
                    'name'        => 'Quality & delivery',
                    'description' => 'Practices that keep Node.js systems healthy.',
                    'items'       => [
                        'Automated tests with Jest and supertest.',
                        'ESLint, Prettier and code review practices.',
                        'Monitoring, logging and tracing using tools like Prometheus, Grafana or vendor platforms.',
                    ],
                ],
            ],
        ],

        'cta' => [
            'enabled' => true,

            'eyebrow' => 'Ready to hire Node.js developers?',
            'title'   => 'Let’s plan your next Node.js release or backend initiative.',
            'body'    => 'Share your product context, current stack and immediate priorities. We will propose a practical Node.js squad setup, outline scope and timelines, and suggest a starting pilot so you can validate our fit quickly.',

            'primary_label' => 'Book a Node.js discovery call',
            'primary_url'   => '/contact-us/?topic=hire-nodejs-developers',
            'primary_aria'  => 'Book a Node.js discovery call with QalbIT',

            'secondary_label' => 'Send us your Node.js requirements',
            'secondary_url'   => '/contact-us/?topic=hire-nodejs-developers&source=requirements',
            'secondary_aria'  => 'Send your Node.js requirements to QalbIT',

            'meta' => 'We typically respond within 24–48 hours with clarifying questions, ballpark ranges and suggested next steps.',
        ],
    ],

    'laravel' => [
        'slug'     => '/hire-laravel-developers/',
        'name'     => 'Hire Laravel Developers',
        'h1'       => 'Hire Expert Laravel Developers for Custom Web Applications & SaaS',
        'enabled'  => true,
        'order'    => 30,

        'meta_title'       => 'Hire Dedicated Laravel Developers – Remote Laravel Development Team | QalbIT',
        'meta_description' => 'Hire dedicated Laravel developers from QalbIT to build and scale custom web applications, SaaS platforms and internal tools. Work with a remote Laravel development team that understands product, performance and long-term maintainability.',

        'short_description' => 'Dedicated Laravel developers and product-minded teams to design, build and maintain custom web apps, SaaS platforms and internal tools with clean architecture and predictable delivery.',
        'category'          => 'hire',
        'template'          => 'pages/services/hire-laravel-developers',

        'icon'    => 'images/services/icon-hire-laravel-developers.svg',
        'iconAlt' => 'Icon representing hiring Laravel developers',

        'faq_key'      => 'service_hire_laravel_developers',
        'faq_title'    => 'Frequently asked questions about hiring Laravel developers with QalbIT',
        'faq_subtitle' => 'These are the questions founders, CTOs and operations leaders usually ask when they consider hiring Laravel developers or a Laravel squad with QalbIT.',
        'faq_bullets'  => [
            '✓ Remote-first Laravel teams with clear overlap for planning, demos and go-lives.',
            '✓ Structured Laravel practices – clean architecture, testing, CI/CD and documentation.',
            '✓ You own the Laravel codebase and IP, protected with NDAs and clear contracts.',
        ],

        'hero' => [
            'breadcrumb_label' => 'Hire Laravel developers',
            'kicker_prefix'    => 'Hire developers',
            'kicker_label'     => 'Laravel development',
            'kicker_detail'    => 'Web apps · SaaS · Internal tools',

            'title'     => 'Hire Expert Laravel Developers for <span class="text-gradient-brand-animated">Custom Web Applications &amp; SaaS</span>.',
            'highlight' => 'Custom Web Applications & SaaS',

            'intro' => 'QalbIT provides dedicated Laravel and PHP developers who specialise in building secure, maintainable business applications, SaaS platforms and internal tools. We plug in as a remote product squad – planning architecture, writing clean Laravel code and keeping your roadmap moving without unpleasant surprises on quality or timelines.',

            'primary_cta_label' => 'Discuss your Laravel project',
            'primary_cta_href'  => '/contact-us/?topic=hire-laravel-developers',

            'secondary_cta_label' => 'Book a free consultation',
            'secondary_cta_href'  => 'https://calendly.com/abidhusain-qalbit/discuss-project',

            'snapshot_title' => 'Laravel hiring snapshot',
            'snapshot'       => [
                [
                    'label' => 'Typical engagement',
                    'value' => 'Dedicated Laravel squad or fixed-scope application project',
                ],
                [
                    'label' => 'Core focus',
                    'value' => 'Business web apps, SaaS platforms and internal tools',
                ],
                [
                    'label' => 'Time to start',
                    'value' => '1–3 weeks after scope and team fit are aligned',
                ],
                [
                    'label' => 'Delivery model',
                    'value' => 'Pilot sprint first, then ongoing sprints with clear KPIs',
                ],
            ],
        ],

        'overview' => [
            'id'      => 'hire-laravel-overview',
            'eyebrow' => 'Laravel overview',

            'title' => 'When hiring Laravel developers with QalbIT makes sense',
            'intro' => 'We work with teams that treat Laravel as the backbone of their business – whether it is powering customer portals, SaaS products or internal workflows – and need a reliable partner to design, build and evolve their applications.',

            'left_title' => 'When a dedicated Laravel team is the right move',
            'left_items' => [
                'You are building or scaling a custom web application or SaaS product using Laravel and PHP.',
                'You want to replace spreadsheets or generic SaaS tools with a tailored Laravel application that matches your workflows.',
                'Your existing Laravel codebase has grown messy and you need a senior team to refactor, improve performance and add new modules safely.',
                'You prefer a Laravel partner who can own architecture, database design and DevOps – not just churn out controllers and views.',
                'You need predictable Laravel capacity without the risk and delay of building a full in-house team immediately.',
            ],

            'right_title' => 'Outcomes we target for Laravel engagements',
            'right_items' => [
                'Stable, testable Laravel applications that are easy to extend and onboard new developers into.',
                'Cleaner domain and database design, so adding new features does not break existing ones.',
                'Secure authentication, authorisation and audit trails appropriate for your industry.',
                'Predictable release cadence with CI/CD, code review and staging environments in place.',
                'Comprehensive documentation and handover so you are never locked into a single vendor.',
            ],

            'note' => 'Most Laravel partnerships start with a focused discovery or codebase review. This lets us understand your current system, uncover risks and define a realistic roadmap before we scale the team or commit to long-term delivery.',
        ],

        'capabilities' => [
            'id'      => 'hire-laravel-capabilities',
            'eyebrow' => 'What our Laravel developers deliver',
            'title'   => 'Laravel development capabilities for product-led teams',
            'intro'   => 'From greenfield builds to refactoring legacy Laravel systems, our teams focus on delivering business-ready applications backed by solid engineering practices.',

            'items' => [
                [
                    'label'       => 'Custom Laravel applications & admin panels',
                    'description' => 'End-to-end Laravel applications tailored to your domain – including admin panels, dashboards, role-based access and reporting.',
                    'badge'       => 'Web apps',
                    'icon'        => '/images/icons/dashboard.svg',
                ],
                [
                    'label'       => 'Multi-tenant SaaS platforms',
                    'description' => 'Design and development of SaaS products on Laravel with proper tenancy, billing, subscriptions and user management.',
                    'badge'       => 'SaaS',
                    'icon'        => '/images/icons/infrastructure.svg',
                ],
                [
                    'label'       => 'APIs & integrations with Laravel',
                    'description' => 'RESTful APIs, webhooks and integration layers that connect Laravel with CRMs, ERPs, payment gateways and third-party services.',
                    'badge'       => 'APIs',
                    'icon'        => '/images/icons/api.svg',
                ],
                [
                    'label'       => 'Upgrades, refactoring & performance tuning',
                    'description' => 'Upgrade Laravel and PHP versions safely, reduce technical debt, optimise queries and introduce caching where it actually matters.',
                    'badge'       => 'Modernisation',
                    'icon'        => '/images/icons/performance.svg',
                ],
                [
                    'label'       => 'Starter MVPs & prototypes with Laravel',
                    'description' => 'Build lean Laravel MVPs that validate your idea quickly, then evolve them into long-term platforms without throwing work away.',
                    'badge'       => 'MVP',
                    'icon'        => '/images/icons/landing-page.svg',
                ],
                [
                    'label'       => 'Support, maintenance & feature extensions',
                    'description' => 'Ongoing care for your Laravel application – bug fixes, minor features and roadmap work planned through structured sprints.',
                    'badge'       => 'Support',
                    'icon'        => '/images/icons/ops.svg',
                ],
            ],

            'cta' => [
                'label' => 'Talk through your Laravel requirements',
                'url'   => '/contact-us/?topic=hire-laravel-developers',
            ],
        ],

        'process' => [
            'id'      => 'hire-laravel-process',
            'eyebrow' => 'How it works',
            'title'   => 'A practical process for hiring and working with Laravel developers',
            'intro'   => 'We keep the process structured but lightweight so you can move from idea or legacy system to a stable Laravel application without losing control over budget or timelines.',

            'items' => [
                [
                    'step'        => 1,
                    'title'       => 'Discovery & Laravel codebase review',
                    'description' => 'Understand your business goals, current tools and – if you have one – your existing Laravel application. Identify quick wins and high-risk areas.',
                    'duration'    => '1–2 weeks',
                    'outcome'     => 'Shared understanding of scope, priorities and technical constraints in your Laravel stack.',
                    'icon'        => '/images/icons/discovery.svg',
                ],
                [
                    'step'        => 2,
                    'title'       => 'Architecture & delivery plan',
                    'description' => 'Design database schemas, module boundaries and integration points. Define an incremental delivery plan that fits your budget and internal capacity.',
                    'duration'    => '1–3 weeks',
                    'outcome'     => 'Architecture and roadmap that balance speed, stability and future extensibility.',
                    'icon'        => '/images/icons/architecture-design.svg',
                ],
                [
                    'step'        => 3,
                    'title'       => 'Incremental Laravel development',
                    'description' => 'Ship features in small, reviewable slices with code reviews, automated tests and demos so stakeholders see progress and can react early.',
                    'duration'    => '4–12+ weeks (scope-dependent)',
                    'outcome'     => 'A working Laravel application or module in staging, ready for UAT.',
                    'icon'        => '/images/icons/core-modules.svg',
                ],
                [
                    'step'        => 4,
                    'title'       => 'UAT, launch & knowledge transfer',
                    'description' => 'Support user acceptance testing, polish the experience, prepare data migration, documentation and deployment runbooks.',
                    'duration'    => '2–4 weeks',
                    'outcome'     => 'Production launch with trained users and clear operational procedures.',
                    'icon'        => '/images/icons/launch.svg',
                ],
                [
                    'step'        => 5,
                    'title'       => 'Continuous improvement & support',
                    'description' => 'Track how your Laravel app behaves in the real world, fix issues quickly and continue iterating on the roadmap with a stable team.',
                    'duration'    => 'Ongoing, month-to-month',
                    'outcome'     => 'A Laravel platform that stays healthy and continues to evolve with your business.',
                    'icon'        => '/images/icons/scale.svg',
                ],
            ],

            'cta' => [
                'label' => 'Walk me through this for my Laravel app',
                'url'   => '/contact-us/?topic=hire-laravel-developers',
            ],
        ],

        'use_cases' => [
            'id'      => 'hire-laravel-use-cases',
            'eyebrow' => 'Where Laravel fits best',
            'title'   => 'Laravel use cases we most often deliver',
            'intro'   => 'Most of our Laravel work focuses on operationally-critical systems where reliability, security and long-term maintainability matter.',

            'items' => [
                [
                    'label'       => 'Line-of-business applications & internal tools',
                    'description' => 'Custom Laravel applications for operations, finance, logistics, HR or support teams, built exactly around your processes.',
                    'audience'    => 'Growing SMEs and mid-market companies',
                    'badge'       => 'Operations',
                ],
                [
                    'label'       => 'Customer portals & self-service dashboards',
                    'description' => 'Laravel-powered portals where customers, partners or vendors can manage requests, accounts and data without manual back-and-forth.',
                    'audience'    => 'B2B and B2C businesses with recurring interactions',
                    'badge'       => 'Portals',
                ],
                [
                    'label'       => 'SaaS products and subscription platforms',
                    'description' => 'Multi-tenant SaaS products with subscription management, billing and role-based access, built on Laravel and PHP best practices.',
                    'audience'    => 'Founders and product teams building new SaaS offerings',
                    'badge'       => 'SaaS',
                ],
                [
                    'label'       => 'Modernising legacy PHP applications',
                    'description' => 'Rebuilding old PHP or framework-less systems into modern Laravel applications, keeping what works while eliminating risky legacy code.',
                    'audience'    => 'Organisations limited by outdated PHP systems',
                    'badge'       => 'Modernisation',
                    'link'        => [
                        'label' => 'Discuss modernising your PHP app with Laravel',
                        'url'   => '/contact-us/?topic=hire-laravel-developers',
                    ],
                ],
            ],

            'cta' => [
                'label' => 'Ask if your use case is a good fit for Laravel',
                'url'   => '/contact-us/?topic=hire-laravel-developers',
            ],
        ],

        'stack' => [
            'id'      => 'hire-laravel-tech-stack',
            'eyebrow' => 'Tech stack & platforms',
            'title'   => 'Tech stack our Laravel developers typically use',
            'intro'   => 'We rely on modern versions of Laravel, PHP and a supporting stack that keeps your application secure, fast and maintainable for years.',
            'note'    => 'Already have a Laravel or PHP application? We can review your current stack and work with it where it makes sense, instead of forcing a full rewrite.',

            'categories' => [
                [
                    'name'        => 'Backend & application layer',
                    'description' => 'Core Laravel business logic and APIs.',
                    'items'       => [
                        'Laravel 10/11 on PHP 8.x with modular, testable architecture.',
                        'RESTful APIs, webhooks and background jobs built with Laravel queues.',
                        'Domain-driven design principles where appropriate for complex systems.',
                    ],
                ],
                [
                    'name'        => 'Frontend & user experience',
                    'description' => 'Interfaces that help teams and customers get work done.',
                    'items'       => [
                        'Blade + Tailwind CSS for fast, consistent Laravel frontends.',
                        'SPA or hybrid approaches with React/Next.js when needed.',
                        'Responsive layouts and accessibility-aware components.',
                    ],
                ],
                [
                    'name'        => 'Data, caching & infrastructure',
                    'description' => 'Storage and hosting tuned for Laravel.',
                    'items'       => [
                        'MySQL or PostgreSQL with migrations, indexing and backups.',
                        'Redis for queues, caching and session storage.',
                        'Docker-based deployments or managed hosting (AWS, DigitalOcean, etc.) with CI/CD.',
                    ],
                ],
                [
                    'name'        => 'Quality, security & operations',
                    'description' => 'Practices that keep your Laravel app healthy.',
                    'items'       => [
                        'Automated tests, static analysis and code reviews as part of regular sprints.',
                        'Role-based access control, validation and secure coding practices.',
                        'Monitoring, logging and alerting tuned to your business SLAs.',
                    ],
                ],
            ],
        ],

        'cta' => [
            'enabled' => true,

            'eyebrow' => 'Ready to hire Laravel developers?',
            'title'   => 'Let’s plan your next Laravel release or application modernisation.',
            'body'    => 'Share your current Laravel or PHP setup, key pain points and roadmap. We will suggest a practical Laravel squad setup, outline near-term milestones and provide ballpark budget and timelines so you can make an informed decision.',

            'primary_label' => 'Book a Laravel discovery call',
            'primary_url'   => '/contact-us/?topic=hire-laravel-developers',
            'primary_aria'  => 'Book a Laravel discovery call with QalbIT',

            'secondary_label' => 'Send us your Laravel requirements',
            'secondary_url'   => '/contact-us/?topic=hire-laravel-developers&source=requirements',
            'secondary_aria'  => 'Send your Laravel requirements to QalbIT',

            'meta' => 'We typically respond within 24–48 hours with clarifying questions, ballpark estimates and recommended next steps.',
        ],
    ],

    'php' => [
        'slug'     => '/hire-php-developers/',
        'name'     => 'Hire PHP Developers',
        'h1'       => 'Hire Dedicated PHP Developers for Secure, Scalable Web Applications',
        'enabled'  => true,
        'order'    => 50,

        'meta_title'       => 'Hire Dedicated PHP Developers – Remote PHP Development Team | QalbIT',
        'meta_description' => 'Hire dedicated PHP developers from QalbIT to build and modernise custom web applications, portals and platforms. Work with a remote PHP development team experienced in PHP 8, Laravel and modernising legacy PHP systems for long-term growth.',

        'short_description' => 'Dedicated PHP developers to build, extend and modernise custom web applications, portals and platforms using modern PHP 8 practices, clean architecture and predictable delivery.',
        'category'          => 'hire',
        'template'          => 'pages/services/hire-php-developers',

        'icon'    => 'images/services/icon-hire-php-developers.svg',
        'iconAlt' => 'Icon representing hiring PHP developers',

        'faq_key'      => 'service_hire_php_developers',
        'faq_title'    => 'Frequently asked questions about hiring PHP developers with QalbIT',
        'faq_subtitle' => 'These are the questions founders, CTOs and operations teams usually ask when they consider hiring PHP developers or a PHP squad with QalbIT.',
        'faq_bullets'  => [
            '✓ Remote-first PHP teams comfortable with both greenfield builds and legacy modernisation.',
            '✓ Strong focus on PHP 8 standards, testing, refactoring and long-term maintainability.',
            '✓ You own the PHP codebase and IP, with NDAs and contracts aligned to your requirements.',
        ],

        'hero' => [
            'breadcrumb_label' => 'Hire PHP developers',
            'kicker_prefix'    => 'Hire developers',
            'kicker_label'     => 'PHP development',
            'kicker_detail'    => 'Custom web apps · Modernisation · Portals',

            'title'     => 'Hire Dedicated PHP Developers for <span class="text-gradient-brand-animated">Custom Web Applications &amp; Platforms</span>.',
            'highlight' => 'Custom Web Applications & Platforms',

            'intro' => 'QalbIT provides dedicated PHP developers who can build new applications on PHP 8 and frameworks like Laravel, as well as modernise legacy PHP systems that your business still relies on. We focus on clean code, secure architectures and a delivery process that keeps stakeholders confident at every release.',

            'primary_cta_label' => 'Discuss your PHP project',
            'primary_cta_href'  => '/contact-us/?topic=hire-php-developers',

            'secondary_cta_label' => 'Book a free consultation',
            'secondary_cta_href'  => 'https://calendly.com/abidhusain-qalbit/discuss-project',

            'snapshot_title' => 'PHP hiring snapshot',
            'snapshot'       => [
                [
                    'label' => 'Typical engagement',
                    'value' => 'Dedicated PHP squad or fixed-scope web application project',
                ],
                [
                    'label' => 'Core focus',
                    'value' => 'Business web apps, portals and legacy PHP modernisation',
                ],
                [
                    'label' => 'Time to start',
                    'value' => '1–3 weeks after scope and team fit are aligned',
                ],
                [
                    'label' => 'Delivery model',
                    'value' => 'Pilot or discovery first, then structured ongoing sprints',
                ],
            ],
        ],

        'overview' => [
            'id'      => 'hire-php-overview',
            'eyebrow' => 'PHP overview',

            'title' => 'When hiring PHP developers with QalbIT makes sense',
            'intro' => 'We partner with teams that use PHP to run critical parts of their business – from customer portals and booking flows to internal systems – and need a dependable partner to build, clean up and extend those applications.',

            'left_title' => 'When a dedicated PHP team is the right move',
            'left_items' => [
                'You are building or scaling a custom PHP-based web application, portal or platform.',
                'You rely on an older PHP application that is hard to change and want to modernise it without breaking the business.',
                'You need a stable PHP team that can handle both new features and day-to-day maintenance, not just one-off fixes.',
                'You prefer a partner who can own architecture, refactoring, testing and deployment instead of only shipping quick patches.',
                'You want predictable PHP capacity but are not ready to hire a full in-house team in every role.',
            ],

            'right_title' => 'Outcomes we target for PHP engagements',
            'right_items' => [
                'Cleaner, more maintainable PHP codebases that are easier to extend.',
                'Improved performance and reliability for business-critical flows and pages.',
                'Safer deployments with proper environments, backups and rollback options.',
                'Reduced technical debt through systematic refactoring and version upgrades.',
                'Documentation and knowledge transfer so your team is never stuck with a black-box system.',
            ],

            'note' => 'Most PHP collaborations start with a short discovery or code review. This allows us to understand your current PHP setup, identify risks and quick wins, and propose a pragmatic roadmap before scaling the team.',
        ],

        'capabilities' => [
            'id'      => 'hire-php-capabilities',
            'eyebrow' => 'What our PHP developers deliver',
            'title'   => 'PHP development capabilities for modern and legacy systems',
            'intro'   => 'Our PHP teams handle both new builds and legacy PHP modernisation, with a strong focus on stable delivery and long-term maintainability.',

            'items' => [
                [
                    'label'       => 'Custom PHP web applications',
                    'description' => 'Business applications and portals built on modern PHP 8 standards, designed around your workflows, users and data model.',
                    'badge'       => 'Web apps',
                    'icon'        => '/images/icons/dashboard.svg',
                ],
                [
                    'label'       => 'Laravel & framework-based development',
                    'description' => 'New modules and full applications using Laravel or other modern PHP frameworks, with attention to testing and architecture.',
                    'badge'       => 'Frameworks',
                    'icon'        => '/images/icons/erp.svg',
                ],
                [
                    'label'       => 'Legacy PHP modernisation',
                    'description' => 'Gradual refactoring and restructuring of older PHP systems into cleaner, more modular code without risky big-bang rewrites.',
                    'badge'       => 'Modernisation',
                    'icon'        => '/images/icons/modernization.svg',
                ],
                [
                    'label'       => 'APIs, integrations & background jobs',
                    'description' => 'RESTful APIs, integrations with third-party tools and background workers for imports, exports and recurring tasks.',
                    'badge'       => 'Integrations',
                    'icon'        => '/images/icons/api.svg',
                ],
                [
                    'label'       => 'Security, performance & hardening',
                    'description' => 'Addressing security gaps, optimising queries and caching, and tightening deployment practices for PHP applications.',
                    'badge'       => 'Security',
                    'icon'        => '/images/icons/security.svg',
                ],
                [
                    'label'       => 'Support, maintenance & enhancements',
                    'description' => 'Ongoing support to keep your PHP application healthy while continuing to deliver small features and improvements.',
                    'badge'       => 'Support',
                    'icon'        => '/images/icons/ops.svg',
                ],
            ],

            'cta' => [
                'label' => 'Talk through your PHP requirements',
                'url'   => '/contact-us/?topic=hire-php-developers',
            ],
        ],

        'process' => [
            'id'      => 'hire-php-process',
            'eyebrow' => 'How it works',
            'title'   => 'A practical process for hiring and working with PHP developers',
            'intro'   => 'We follow a practical, step-by-step process so you always know what is happening with your PHP application and why.',

            'items' => [
                [
                    'step'        => 1,
                    'title'       => 'Discovery & PHP application review',
                    'description' => 'Understand your business goals, current PHP stack and any pain points in the application. If you have an existing codebase, we do a light technical review.',
                    'duration'    => '1–2 weeks',
                    'outcome'     => 'Shared understanding of scope, risks, priorities and where PHP work will create the most impact.',
                    'icon'        => '/images/icons/discovery.svg',
                ],
                [
                    'step'        => 2,
                    'title'       => 'Plan architecture, refactoring and roadmap',
                    'description' => 'Align on how we will structure new features, tackle legacy code and set up environments, testing and deployments.',
                    'duration'    => '1–3 weeks',
                    'outcome'     => 'A realistic roadmap for improvements, new features and technical clean-up tasks.',
                    'icon'        => '/images/icons/architecture-design.svg',
                ],
                [
                    'step'        => 3,
                    'title'       => 'Incremental PHP development & clean-up',
                    'description' => 'Ship features and refactors in small, reviewable increments with code reviews, tests and regular demos.',
                    'duration'    => '4–12+ weeks (scope-dependent)',
                    'outcome'     => 'Improved PHP application in staging, with visible progress on both features and technical health.',
                    'icon'        => '/images/icons/core-modules.svg',
                ],
                [
                    'step'        => 4,
                    'title'       => 'Launch, stabilise & document',
                    'description' => 'Prepare releases to production, monitor behaviour, fix issues quickly and produce documentation and runbooks.',
                    'duration'    => '2–4 weeks',
                    'outcome'     => 'Stable production deployment with better visibility into how your PHP app behaves day to day.',
                    'icon'        => '/images/icons/launch.svg',
                ],
                [
                    'step'        => 5,
                    'title'       => 'Ongoing PHP support & evolution',
                    'description' => 'Continue iterating on your roadmap, improving performance, security and user experience with a consistent team.',
                    'duration'    => 'Ongoing, month-to-month',
                    'outcome'     => 'A PHP application that stays healthy and aligned with your business instead of falling behind again.',
                    'icon'        => '/images/icons/scale.svg',
                ],
            ],

            'cta' => [
                'label' => 'Walk me through this for my PHP app',
                'url'   => '/contact-us/?topic=hire-php-developers',
            ],
        ],

        'use_cases' => [
            'id'      => 'hire-php-use-cases',
            'eyebrow' => 'Where PHP fits best',
            'title'   => 'PHP use cases we most often deliver',
            'intro'   => 'Our PHP work usually centres on applications that are too important to fail – internal tools, customer-facing portals and platforms that run real operations.',

            'items' => [
                [
                    'label'       => 'Customer and partner portals',
                    'description' => 'Secure portals where customers, partners or vendors can manage requests, orders, accounts and documents.',
                    'audience'    => 'B2B and B2C companies with ongoing customer interactions',
                    'badge'       => 'Portals',
                ],
                [
                    'label'       => 'Operational tools & internal systems',
                    'description' => 'PHP applications built around your operations – approvals, tracking, inventory, scheduling or reporting.',
                    'audience'    => 'Operations, finance, HR and logistics teams',
                    'badge'       => 'Operations',
                ],
                [
                    'label'       => 'Extending and cleaning legacy PHP systems',
                    'description' => 'Carefully improving older PHP applications while keeping them running, then gradually introducing better structure and tests.',
                    'audience'    => 'Organizations that cannot risk a full rewrite',
                    'badge'       => 'Legacy',
                ],
                [
                    'label'       => 'MVPs and proof-of-concept web apps',
                    'description' => 'Lean PHP applications to validate new ideas quickly, designed so they can grow into more robust platforms later.',
                    'audience'    => 'Founders and product teams validating new ideas',
                    'badge'       => 'MVP',
                    'link'        => [
                        'label' => 'Discuss a PHP-based MVP or prototype',
                        'url'   => '/contact-us/?topic=hire-php-developers',
                    ],
                ],
            ],

            'cta' => [
                'label' => 'Ask if your use case is a good fit for PHP',
                'url'   => '/contact-us/?topic=hire-php-developers',
            ],
        ],

        'stack' => [
            'id'      => 'hire-php-tech-stack',
            'eyebrow' => 'Tech stack & platforms',
            'title'   => 'Tech stack our PHP developers typically use',
            'intro'   => 'We use modern PHP 8, frameworks and tooling that help keep your application fast, secure and maintainable.',
            'note'    => 'If you are on older PHP versions, we plan upgrades carefully so your system continues running while we improve it.',

            'categories' => [
                [
                    'name'        => 'Core PHP & frameworks',
                    'description' => 'The foundation for your applications.',
                    'items'       => [
                        'PHP 8.x with modern language features and strict coding standards.',
                        'Laravel for new applications and selected refactors where appropriate.',
                        'PSR-compliant libraries and components for reusable architecture.',
                    ],
                ],
                [
                    'name'        => 'Frontend & interfaces',
                    'description' => 'How users interact with your PHP applications.',
                    'items'       => [
                        'Blade + Tailwind CSS or other templating for server-rendered UIs.',
                        'Integration with React/Next.js or other SPAs where needed.',
                        'Responsive layouts and accessibility-conscious components.',
                    ],
                ],
                [
                    'name'        => 'Data, caching & hosting',
                    'description' => 'Where your PHP applications and data live.',
                    'items'       => [
                        'MySQL or PostgreSQL with migrations, indexing and backups.',
                        'Redis or similar caching layers for performance and queues.',
                        'Docker-based deployments or managed hosting (AWS, DigitalOcean, etc.) with CI/CD pipelines.',
                    ],
                ],
                [
                    'name'        => 'Quality, security & operations',
                    'description' => 'Practices that keep your PHP system robust.',
                    'items'       => [
                        'Automated tests, code reviews and static analysis as standard practice.',
                        'OWASP-aware engineering with proper validation and sanitisation.',
                        'Monitoring, logging and alerting to catch issues before users do.',
                    ],
                ],
            ],
        ],

        'cta' => [
            'enabled' => true,

            'eyebrow' => 'Ready to hire PHP developers?',
            'title'   => 'Let’s stabilise and grow your PHP application.',
            'body'    => 'Share your current PHP setup, the problems you are facing and what success would look like. We will review your situation, propose a practical PHP team setup and outline next steps with indicative timelines and budgets.',

            'primary_label' => 'Book a PHP discovery call',
            'primary_url'   => '/contact-us/?topic=hire-php-developers',
            'primary_aria'  => 'Book a PHP discovery call with QalbIT',

            'secondary_label' => 'Send us your PHP requirements',
            'secondary_url'   => '/contact-us/?topic=hire-php-developers&source=requirements',
            'secondary_aria'  => 'Send your PHP requirements to QalbIT',

            'meta' => 'We usually respond within 24–48 hours with clarifying questions, a proposed approach and suggested starting point.',
        ],
    ],

    'reactjs' => [
        'slug'     => '/hire-reactjs-developers/',
        'name'     => 'Hire React.js Developers',
        'h1'       => 'Hire Dedicated React.js Developers for Product-Grade Web Applications',
        'enabled'  => true,
        'order'    => 60,

        'meta_title'       => 'Hire Dedicated React.js Developers – Remote React Frontend Development Team | QalbIT',
        'meta_description' => 'Hire dedicated React.js developers from QalbIT to design and build fast, product-grade frontends, dashboards and SaaS interfaces. Get a remote React development team focused on UX, performance and clean, maintainable code.',

        'short_description' => 'Dedicated React.js developers and front-end squads to design, build and optimise dashboards, portals, SaaS frontends and marketing experiences on top of your APIs.',
        'category'          => 'hire',
        'template'          => 'pages/services/hire-reactjs-developers',

        'icon'    => 'images/services/icon-hire-reactjs-developers.svg',
        'iconAlt' => 'Icon representing hiring React.js developers',

        'faq_key'      => 'service_hire_reactjs_developers',
        'faq_title'    => 'Frequently asked questions about hiring React.js developers with QalbIT',
        'faq_subtitle' => 'These are the questions founders, product leaders and CTOs usually ask when they consider hiring React.js developers or a React frontend squad with QalbIT.',
        'faq_bullets'  => [
            '✓ Remote-first React squads that collaborate closely with your design, product and backend teams.',
            '✓ Strong focus on UX, accessibility, performance and consistency across your React interfaces.',
            '✓ You own the React codebase and UI components, protected by NDAs and clear IP clauses.',
        ],
        
        'hero' => [
            'breadcrumb_label' => 'Hire React.js developers',
            'kicker_prefix'    => 'Hire developers',
            'kicker_label'     => 'React.js development',
            'kicker_detail'    => 'Dashboards · Portals · SaaS frontends',

            'title'     => 'Hire Dedicated React.js Developers for <span class="text-gradient-brand-animated">Product-Grade Web &amp; SaaS Interfaces</span>.',
            'highlight' => 'Product-Grade Web & SaaS Interfaces',

            'intro' => 'QalbIT provides dedicated React.js developers who specialise in building and evolving dashboards, portals and SaaS frontends. We plug in as a remote extension of your product and backend teams, focusing on component-driven architectures, consistency and performance instead of just stitching together screens.',

            'primary_cta_label' => 'Discuss your React frontend needs',
            'primary_cta_href'  => '/contact-us/?topic=hire-reactjs-developers',

            'secondary_cta_label' => 'Book a free consultation',
            'secondary_cta_href'  => 'https://calendly.com/abidhusain-qalbit/discuss-project',

            'snapshot_title' => 'React.js hiring snapshot',
            'snapshot'       => [
                [
                    'label' => 'Typical engagement',
                    'value' => 'Dedicated React squad or fixed-scope frontend project',
                ],
                [
                    'label' => 'Core focus',
                    'value' => 'Dashboards, portals, SaaS UIs and marketing experiences',
                ],
                [
                    'label' => 'Time to start',
                    'value' => '1–3 weeks after scope, design handoff and team fit are aligned',
                ],
                [
                    'label' => 'Delivery model',
                    'value' => 'Pilot slice first, then ongoing sprints with clear UI/UX KPIs',
                ],
            ],
        ],

        'overview' => [
            'id'      => 'hire-reactjs-overview',
            'eyebrow' => 'React.js overview',

            'title' => 'When hiring React.js developers with QalbIT makes sense',
            'intro' => 'We partner with teams that treat the frontend as a core part of their product – not just a skin. Our React.js squads focus on quality of implementation, performance and long-term maintainability, so you can keep shipping without UI debt slowing you down.',

            'left_title' => 'When a dedicated React.js team is the right move',
            'left_items' => [
                'You are building or evolving a SaaS product, dashboard or portal where the frontend experience drives adoption and retention.',
                'Your design team or agency delivers Figma files, but you need a disciplined React squad to turn them into maintainable components and screens.',
                'Your current React codebase has grown messy and you want to standardise patterns, introduce a design system and reduce regressions.',
                'You prefer a frontend partner that thinks about UX states, accessibility and performance budgets – not just pixel-perfect static pages.',
                'You need ongoing React capacity to support a living roadmap, but do not want to fully staff an in-house frontend team yet.',
            ],

            'right_title' => 'Outcomes we target for React.js engagements',
            'right_items' => [
                'Stable, reusable React components that are easy to compose into new features.',
                'Faster, smoother interfaces with clear attention to loading states, errors and edge cases.',
                'Frontends that integrate cleanly with your backend / API layer and analytics tools.',
                'Reduced design and tech debt by aligning UI code with your design system and brand.',
                'Team-level clarity: documentation, Storybook-style examples and patterns new devs can follow.',
            ],

            'note' => 'We usually start with a focused pilot slice – a key flow, dashboard or module – to align on design handoff, coding standards and collaboration before scaling into a larger React engagement.',
        ],

        'capabilities' => [
            'id'      => 'hire-reactjs-capabilities',
            'eyebrow' => 'What our React.js developers deliver',
            'title'   => 'React.js development capabilities for product-led teams',
            'intro'   => 'From complex dashboards and portals to component libraries and marketing experiences, our React.js teams focus on building frontends that are fast, consistent and simple to evolve.',

            'items' => [
                [
                    'label'       => 'SaaS dashboards & admin panels',
                    'description' => 'Data-rich dashboards and admin panels built with React.js, focused on clarity, performance and the realities of day-to-day use.',
                    'badge'       => 'Dashboards',
                    'icon'        => '/images/icons/dashboard.svg',
                ],
                [
                    'label'       => 'Customer & partner portals',
                    'description' => 'React-powered portals where customers, partners or vendors can manage accounts, workflows and data with minimal friction.',
                    'badge'       => 'Portals',
                    'icon'        => '/images/icons/portal.svg',
                ],
                [
                    'label'       => 'Design systems & component libraries',
                    'description' => 'Reusable React component libraries aligned with your design system and brand, making it faster to ship consistent UIs.',
                    'badge'       => 'Design systems',
                    'icon'        => '/images/icons/components.svg',
                ],
                [
                    'label'       => 'Frontends on top of existing APIs',
                    'description' => 'React frontends that sit on top of your existing Node.js, Laravel or other backend APIs with clean data fetching and error handling.',
                    'badge'       => 'API frontends',
                    'icon'        => '/images/icons/api.svg',
                ],
                [
                    'label'       => 'Migration from legacy frontends',
                    'description' => 'Gradual migration from jQuery, server-rendered templates or older SPA setups into modern, component-based React architectures.',
                    'badge'       => 'Modernisation',
                    'icon'        => '/images/icons/modernization.svg',
                ],
                [
                    'label'       => 'Performance, accessibility & UX improvements',
                    'description' => 'Targeted work on performance, Core Web Vitals, accessibility and UX optimisations to improve real user experience.',
                    'badge'       => 'Optimisation',
                    'icon'        => '/images/icons/performance.svg',
                ],
            ],

            'cta' => [
                'label' => 'Talk through your React frontend requirements',
                'url'   => '/contact-us/?topic=hire-reactjs-developers',
            ],
        ],

        'process' => [
            'id'      => 'hire-reactjs-process',
            'eyebrow' => 'How it works',
            'title'   => 'A practical process for hiring and working with React.js developers',
            'intro'   => 'We keep the React collaboration structured but lightweight – you see progress frequently, and your product/design teams stay in control of priorities.',

            'items' => [
                [
                    'step'        => 1,
                    'title'       => 'Product & UX alignment',
                    'description' => 'Understand your product goals, user journeys, existing designs and frontend stack. Review current React code (if any) and identify quick wins.',
                    'duration'    => '1–2 weeks',
                    'outcome'     => 'Clear understanding of your UX priorities, tech context and the React work that will create the most impact early.',
                    'icon'        => '/images/icons/discovery.svg',
                ],
                [
                    'step'        => 2,
                    'title'       => 'Architecture & component strategy',
                    'description' => 'Define how components, state management, routing and theming should work. Align on naming, file structure and design system usage.',
                    'duration'    => '1–3 weeks',
                    'outcome'     => 'A practical plan for React implementation that your team can understand and extend later.',
                    'icon'        => '/images/icons/architecture-design.svg',
                ],
                [
                    'step'        => 3,
                    'title'       => 'Pilot UI slice & feedback loop',
                    'description' => 'Implement a meaningful slice – e.g. a dashboard or core flow – with full UX states, data wiring and tests to validate collaboration and quality.',
                    'duration'    => '2–4 weeks',
                    'outcome'     => 'Working React slice in your environment, with feedback from your stakeholders and users.',
                    'icon'        => '/images/icons/pilot.svg',
                ],
                [
                    'step'        => 4,
                    'title'       => 'Scale the React squad & roadmap delivery',
                    'description' => 'Extend the React team and continue delivering features, refactors and optimisations through regular sprints, demos and releases.',
                    'duration'    => 'Ongoing',
                    'outcome'     => 'Predictable delivery of React work with clear ownership, metrics and communication.',
                    'icon'        => '/images/icons/team.svg',
                ],
                [
                    'step'        => 5,
                    'title'       => 'Optimise, document & handover',
                    'description' => 'Continuously improve performance, UX and developer experience while building documentation, Storybook examples and handover materials.',
                    'duration'    => 'Ongoing, month-to-month',
                    'outcome'     => 'A React frontend that stays fast, understandable and easy to evolve as your product grows.',
                    'icon'        => '/images/icons/scale.svg',
                ],
            ],

            'cta' => [
                'label' => 'Walk me through this for my React frontend',
                'url'   => '/contact-us/?topic=hire-reactjs-developers',
            ],
        ],

        'use_cases' => [
            'id'      => 'hire-reactjs-use-cases',
            'eyebrow' => 'Where React.js fits best',
            'title'   => 'React.js use cases we most often deliver',
            'intro'   => 'Most of our React.js work focuses on product interfaces where usability, responsiveness and data clarity make or break the experience.',

            'items' => [
                [
                    'label'       => 'SaaS dashboards & analytics surfaces',
                    'description' => 'Highly interactive dashboards with charts, filters and complex states, designed for daily use by your customers or internal teams.',
                    'audience'    => 'SaaS products, analytics platforms and internal BI tools',
                    'badge'       => 'Dashboards',
                ],
                [
                    'label'       => 'Customer, partner & vendor portals',
                    'description' => 'Self-service portals where users can manage data, requests, approvals and documents without heavy support overhead.',
                    'audience'    => 'B2B/B2C companies with recurring customer or partner interactions',
                    'badge'       => 'Portals',
                ],
                [
                    'label'       => 'Onboarding flows, wizards & configuration UIs',
                    'description' => 'Step-by-step experiences that help users onboard, configure and adopt your product smoothly.',
                    'audience'    => 'Product and growth teams focused on activation and retention',
                    'badge'       => 'Onboarding',
                ],
                [
                    'label'       => 'Marketing sites & landing pages powered by APIs',
                    'description' => 'React-based marketing sites or micro-sites that pull content from headless CMS and reuse components from your product UI.',
                    'audience'    => 'Marketing and product teams who want brand and product to feel consistent',
                    'badge'       => 'Marketing',
                    'link'        => [
                        'label' => 'Discuss React for your marketing & product surfaces',
                        'url'   => '/contact-us/?topic=hire-reactjs-developers',
                    ],
                ],
            ],

            'cta' => [
                'label' => 'Ask if your use case is a good fit for React.js',
                'url'   => '/contact-us/?topic=hire-reactjs-developers',
            ],
        ],

        'stack' => [
            'id'      => 'hire-reactjs-tech-stack',
            'eyebrow' => 'Tech stack & ecosystem',
            'title'   => 'Tech stack our React.js developers typically use',
            'intro'   => 'We use React.js with a modern, opinionated frontend stack – balancing long-term maintainability, performance and your team’s familiarity.',
            'note'    => 'Already have a React frontend? We can review your current implementation and improve it iteratively instead of forcing a ground-up rebuild.',

            'categories' => [
                [
                    'name'        => 'Core frontend foundations',
                    'description' => 'How we structure and ship React applications.',
                    'items'       => [
                        'React.js with function components and hooks as the baseline.',
                        'TypeScript-first where suitable for safer, self-documenting frontends.',
                        'Modern routing and data-loading patterns aligned with your chosen stack.',
                    ],
                ],
                [
                    'name'        => 'UI, styling & design systems',
                    'description' => 'How interfaces look and feel consistent.',
                    'items'       => [
                        'Tailwind CSS and utility-first styling for fast, consistent implementation.',
                        'Component libraries and design system alignment using Storybook-style tooling.',
                        'Responsive layouts and accessibility-conscious patterns (ARIA, keyboard, contrast).',
                    ],
                ],
                [
                    'name'        => 'State management & data fetching',
                    'description' => 'How data flows through your React app.',
                    'items'       => [
                        'React Query or similar libraries for server state and caching.',
                        'Context, custom hooks and where needed Redux or other store patterns.',
                        'Clear separation between UI components and data-fetching logic.',
                    ],
                ],
                [
                    'name'        => 'Quality, performance & tooling',
                    'description' => 'Practices that keep your React frontend healthy.',
                    'items'       => [
                        'Jest, Testing Library and visual checks for critical components and flows.',
                        'ESLint, Prettier and commit hooks to keep the codebase clean.',
                        'Bundle analysis, performance budgets and monitoring to keep experiences fast over time.',
                    ],
                ],
            ],
        ],

        'cta' => [
            'enabled' => true,

            'eyebrow' => 'Ready to hire React.js developers?',
            'title'   => 'Let’s plan your next React.js interface or frontend modernisation.',
            'body'    => 'Share your product context, existing frontend stack and the outcomes you are aiming for. We will propose a practical React squad setup, outline a pilot slice and suggest realistic timelines and budgets so you can move forward with confidence.',

            'primary_label' => 'Book a React.js discovery call',
            'primary_url'   => '/contact-us/?topic=hire-reactjs-developers',
            'primary_aria'  => 'Book a React.js discovery call with QalbIT',

            'secondary_label' => 'Send us your React requirements',
            'secondary_url'   => '/contact-us/?topic=hire-reactjs-developers&source=requirements',
            'secondary_aria'  => 'Send your React.js requirements to QalbIT',

            'meta' => 'We typically respond within 24–48 hours with clarifying questions, a suggested pilot and next steps.',
        ],
    ],

    'nextjs' => [
        'slug'     => '/hire-nextjs-developers/',
        'name'     => 'Hire Next.js Developers',
        'h1'       => 'Hire Dedicated Next.js Developers for SEO-Friendly, High-Performance Web Apps',
        'enabled'  => true,
        'order'    => 70,

        'meta_title'       => 'Hire Dedicated Next.js Developers – Remote Next.js Development Team | QalbIT',
        'meta_description' => 'Hire dedicated Next.js developers from QalbIT to build SEO-friendly, high-performance web applications, SaaS platforms and marketing sites. Get a remote Next.js development team that understands product, performance and modern React/Next.js patterns.',

        'short_description' => 'Dedicated Next.js developers to design and ship SEO-friendly, fast React-based web apps, SaaS frontends and content-rich sites with modern routing and performance best practices.',
        'category'          => 'hire',
        'template'          => 'pages/services/hire-nextjs-developers',

        'icon'    => 'images/services/icon-hire-nextjs-developers.svg',
        'iconAlt' => 'Icon representing hiring Next.js developers',

        'faq_key'      => 'service_hire_nextjs_developers',
        'faq_title'    => 'Frequently asked questions about hiring Next.js developers with QalbIT',
        'faq_subtitle' => 'These are the questions founders, product leaders and marketing teams usually ask when they consider hiring Next.js developers or a Next.js squad with QalbIT.',
        'faq_bullets'  => [
            '✓ Remote-first Next.js squads comfortable with both product surfaces and marketing sites.',
            '✓ Modern Next.js practices – App Router, server components, data fetching and performance budgets.',
            '✓ You own the Next.js codebase and IP, backed by NDAs and clear commercial agreements.',
        ],

        // HERO
        'hero' => [
            'breadcrumb_label' => 'Hire Next.js developers',
            'kicker_prefix'    => 'Hire developers',
            'kicker_label'     => 'Next.js development',
            'kicker_detail'    => 'App Router · SEO · Performance',

            'title'     => 'Hire Dedicated Next.js Developers for <span class="text-gradient-brand-animated">SEO-Friendly, High-Performance Web Experiences</span>.',
            'highlight' => 'SEO-Friendly, High-Performance Web Experiences',

            'intro' => 'QalbIT provides dedicated Next.js developers who specialise in building SEO-friendly, high-performance web applications and SaaS frontends. We work across product and marketing surfaces – from app dashboards to content hubs – using modern Next.js capabilities to keep your teams fast and your users happy.',

            'primary_cta_label' => 'Discuss your Next.js project',
            'primary_cta_href'  => '/contact-us/?topic=hire-nextjs-developers',

            'secondary_cta_label' => 'Book a free consultation',
            'secondary_cta_href'  => 'https://calendly.com/abidhusain-qalbit/discuss-project',

            'snapshot_title' => 'Next.js hiring snapshot',
            'snapshot'       => [
                [
                    'label' => 'Typical engagement',
                    'value' => 'Dedicated Next.js squad or fixed-scope web app / site project',
                ],
                [
                    'label' => 'Core focus',
                    'value' => 'SaaS frontends, content-driven sites and hybrid apps',
                ],
                [
                    'label' => 'Time to start',
                    'value' => '1–3 weeks after scope, SEO goals and team fit are aligned',
                ],
                [
                    'label' => 'Delivery model',
                    'value' => 'Pilot slice first, then ongoing sprints tied to product/SEO KPIs',
                ],
            ],
        ],

        // OVERVIEW
        'overview' => [
            'id'      => 'hire-nextjs-overview',
            'eyebrow' => 'Next.js overview',

            'title' => 'When hiring Next.js developers with QalbIT makes sense',
            'intro' => 'We work with teams that want the best of both worlds: product-grade React experiences and strong SEO fundamentals. Next.js is often the right choice when your app, site and content all need to work together.',

            'left_title' => 'When a dedicated Next.js team is the right move',
            'left_items' => [
                'You are building or scaling a SaaS product and want SEO-friendly marketing pages and app surfaces in the same stack.',
                'You want to unify multiple sites or apps into one modern Next.js codebase for easier maintenance and consistent UX.',
                'You are migrating from older React or server-rendered setups and want to adopt Next.js App Router and server components safely.',
                'You need a team that understands SEO, Core Web Vitals and content performance, not just React components.',
                'You prefer a partner who can collaborate with your product, design and SEO teams without constant hand-holding.',
            ],

            'right_title' => 'Outcomes we target for Next.js engagements',
            'right_items' => [
                'Faster, more discoverable pages that support your organic acquisition strategy.',
                'A single, coherent Next.js codebase instead of scattered React and legacy projects.',
                'Cleaner data-fetching patterns and caching, improving both performance and reliability.',
                'Predictable release cadence, with clear alignment between product, marketing and development.',
                'Design-system aligned components that can be reused across product and marketing surfaces.',
            ],

            'note' => 'Most Next.js engagements start with a focused slice – a key flow, site section or migration target – so we can align on patterns, performance budgets and SEO goals before rolling the approach out across your entire product or site.',
        ],

        // CAPABILITIES
        'capabilities' => [
            'id'      => 'hire-nextjs-capabilities',
            'eyebrow' => 'What our Next.js developers deliver',
            'title'   => 'Next.js development capabilities for product and marketing teams',
            'intro'   => 'Our Next.js teams handle both app and site surfaces – dashboards, portals, blogs, docs and marketing pages – all aligned to your design system and SEO strategy.',

            'items' => [
                [
                    'label'       => 'SaaS apps and authenticated areas',
                    'description' => 'Secure, responsive Next.js applications with authenticated areas, role-based access and data-rich interfaces.',
                    'badge'       => 'SaaS apps',
                    'icon'        => '/images/icons/dashboard.svg',
                ],
                [
                    'label'       => 'Marketing sites, docs & content hubs',
                    'description' => 'SEO-friendly marketing sites, product pages and documentation hubs built with Next.js and a headless CMS.',
                    'badge'       => 'Marketing & docs',
                    'icon'        => '/images/icons/landing-page.svg',
                ],
                [
                    'label'       => 'App Router & server components adoption',
                    'description' => 'Migration from older Next.js or React setups to App Router, server components and modern data-fetching patterns.',
                    'badge'       => 'Modernisation',
                    'icon'        => '/images/icons/modernization.svg',
                ],
                [
                    'label'       => 'Headless CMS & API integrations',
                    'description' => 'Integrations with headless CMS, analytics tools, CRMs and internal APIs for dynamic content and product data.',
                    'badge'       => 'Integrations',
                    'icon'        => '/images/icons/api.svg',
                ],
                [
                    'label'       => 'Performance & Core Web Vitals improvements',
                    'description' => 'Focused work on LCP, FID/INP, CLS and other Web Vitals to improve search rankings and user experience.',
                    'badge'       => 'Performance',
                    'icon'        => '/images/icons/performance.svg',
                ],
                [
                    'label'       => 'Design system implementation',
                    'description' => 'Next.js implementation of your design system with reusable components, tokens and Storybook-style documentation.',
                    'badge'       => 'Design systems',
                    'icon'        => '/images/icons/components.svg',
                ],
            ],

            'cta' => [
                'label' => 'Talk through your Next.js requirements',
                'url'   => '/contact-us/?topic=hire-nextjs-developers',
            ],
        ],

        // PROCESS
        'process' => [
            'id'      => 'hire-nextjs-process',
            'eyebrow' => 'How it works',
            'title'   => 'A practical process for hiring and working with Next.js developers',
            'intro'   => 'We make sure product, marketing and engineering stay aligned by keeping the Next.js process transparent and outcome-focused.',

            'items' => [
                [
                    'step'        => 1,
                    'title'       => 'Discovery & stack review',
                    'description' => 'Review your existing frontend stack, CMS, SEO goals and design system. Identify which surfaces should move to or extend in Next.js first.',
                    'duration'    => '1–2 weeks',
                    'outcome'     => 'Clear view of priorities and where Next.js will create the fastest impact.',
                    'icon'        => '/images/icons/discovery.svg',
                ],
                [
                    'step'        => 2,
                    'title'       => 'Architecture & migration strategy',
                    'description' => 'Define routing, data-fetching, layout, theming and CMS integration patterns for your Next.js codebase.',
                    'duration'    => '1–3 weeks',
                    'outcome'     => 'A practical architecture and migration plan your team can understand and sustain.',
                    'icon'        => '/images/icons/architecture-design.svg',
                ],
                [
                    'step'        => 3,
                    'title'       => 'Pilot section or feature',
                    'description' => 'Implement a meaningful Next.js slice – a key product flow or high-value marketing area – with full SEO and performance considerations.',
                    'duration'    => '2–4 weeks',
                    'outcome'     => 'Working Next.js implementation in your environment with visible product and SEO benefits.',
                    'icon'        => '/images/icons/pilot.svg',
                ],
                [
                    'step'        => 4,
                    'title'       => 'Scale the Next.js implementation',
                    'description' => 'Roll out Next.js patterns to more pages and modules, with regular demos, QA and performance checks.',
                    'duration'    => 'Ongoing',
                    'outcome'     => 'Consistent Next.js experiences across product and marketing surfaces.',
                    'icon'        => '/images/icons/team.svg',
                ],
                [
                    'step'        => 5,
                    'title'       => 'Optimise, document & transfer',
                    'description' => 'Fine-tune performance, improve DX and document components, patterns and deployment steps for long-term use.',
                    'duration'    => 'Ongoing, month-to-month',
                    'outcome'     => 'A Next.js setup your internal team can easily work with and extend.',
                    'icon'        => '/images/icons/scale.svg',
                ],
            ],

            'cta' => [
                'label' => 'Walk me through this for my Next.js setup',
                'url'   => '/contact-us/?topic=hire-nextjs-developers',
            ],
        ],

        // USE CASES
        'use_cases' => [
            'id'      => 'hire-nextjs-use-cases',
            'eyebrow' => 'Where Next.js fits best',
            'title'   => 'Next.js use cases we most often deliver',
            'intro'   => 'We typically use Next.js when your product and content strategy both matter – and you need speed plus SEO.',

            'items' => [
                [
                    'label'       => 'SaaS apps with integrated marketing surfaces',
                    'description' => 'Products where the app and marketing site need to share components, styling and deployment pipelines.',
                    'audience'    => 'SaaS and product-led companies',
                    'badge'       => 'SaaS',
                ],
                [
                    'label'       => 'Content-heavy sites with product integration',
                    'description' => 'Blogs, resource hubs and docs that pull data from a headless CMS and connect to in-app experiences.',
                    'audience'    => 'Teams investing in SEO and education',
                    'badge'       => 'Content',
                ],
                [
                    'label'       => 'Migrations from legacy React or SSR stacks',
                    'description' => 'Moving from older React, Vue or server-rendered templates to Next.js for better performance and DX.',
                    'audience'    => 'Product teams held back by legacy frontends',
                    'badge'       => 'Modernisation',
                ],
                [
                    'label'       => 'Multi-region or multi-language sites',
                    'description' => 'Next.js solutions for localisation, routing and performance across regions and languages.',
                    'audience'    => 'Global SaaS and multi-country businesses',
                    'badge'       => 'International',
                    'link'        => [
                        'label' => 'Discuss Next.js for your global footprint',
                        'url'   => '/contact-us/?topic=hire-nextjs-developers',
                    ],
                ],
            ],

            'cta' => [
                'label' => 'Ask if your use case is a good fit for Next.js',
                'url'   => '/contact-us/?topic=hire-nextjs-developers',
            ],
        ],

        // TECH STACK
        'stack' => [
            'id'      => 'hire-nextjs-tech-stack',
            'eyebrow' => 'Tech stack & ecosystem',
            'title'   => 'Tech stack our Next.js developers typically use',
            'intro'   => 'We use Next.js with a modern frontend stack built around performance, DX and long-term maintainability.',
            'note'    => 'If you already have a Next.js or React codebase, we can review it and improve it iteratively instead of forcing a full rewrite.',

            'categories' => [
                [
                    'name'        => 'Core framework & language',
                    'description' => 'The foundations of your Next.js app.',
                    'items'       => [
                        'Next.js (App Router) on top of React, preferring TypeScript.',
                        'Server and client components used where they make sense.',
                        'File-based routing, layouts and nested routes configured cleanly.',
                    ],
                ],
                [
                    'name'        => 'Styling & design systems',
                    'description' => 'How your UI stays consistent.',
                    'items'       => [
                        'Tailwind CSS and utility-first patterns for consistent styling.',
                        'Component-level design system implementations with Storybook-style tooling.',
                        'Theming and token-based styling for multiple brands or environments.',
                    ],
                ],
                [
                    'name'        => 'Data, CMS & integrations',
                    'description' => 'Where data comes from and how it flows.',
                    'items'       => [
                        'Headless CMS integrations (Contentful, Sanity, etc.) where appropriate.',
                        'API integration with Node.js, Laravel or other backend services.',
                        'Caching, ISR, SSR and SSG strategies tuned to your performance and SEO needs.',
                    ],
                ],
                [
                    'name'        => 'Quality, performance & operations',
                    'description' => 'Keeping your Next.js deployment healthy.',
                    'items'       => [
                        'Automated tests for critical components and flows.',
                        'ESLint, Prettier and CI pipelines to keep the codebase consistent.',
                        'Monitoring, error tracking and performance metrics wired into your stack.',
                    ],
                ],
            ],
        ],

        // CTA
        'cta' => [
            'enabled' => true,

            'eyebrow' => 'Ready to hire Next.js developers?',
            'title'   => 'Let’s plan your next Next.js release or migration.',
            'body'    => 'Share your current frontend setup, SEO goals and product roadmap. We will suggest a practical Next.js squad setup, outline a pilot scope and provide indicative timelines and budgets so you can make an informed decision.',

            'primary_label' => 'Book a Next.js discovery call',
            'primary_url'   => '/contact-us/?topic=hire-nextjs-developers',
            'primary_aria'  => 'Book a Next.js discovery call with QalbIT',

            'secondary_label' => 'Send us your Next.js requirements',
            'secondary_url'   => '/contact-us/?topic=hire-nextjs-developers&source=requirements',
            'secondary_aria'  => 'Send your Next.js requirements to QalbIT',

            'meta' => 'We typically respond within 24–48 hours with clarifying questions, a suggested pilot slice and next steps.',
        ],
    ],

    'flutter' => [
        'slug'     => '/hire-flutter-developers/',
        'name'     => 'Hire Flutter Developers',
        'h1'       => 'Hire Dedicated Flutter Developers for Cross-Platform Mobile Apps',
        'enabled'  => true,
        'order'    => 80,

        'meta_title'       => 'Hire Dedicated Flutter Developers – Cross-Platform Mobile App Development Team | QalbIT',
        'meta_description' => 'Hire dedicated Flutter developers from QalbIT to build and scale cross-platform mobile apps for iOS and Android. Get a remote Flutter app development team focused on UX, performance and reliable delivery.',

        'short_description' => 'Dedicated Flutter developers to design, build and support cross-platform mobile apps for iOS and Android, with clean architecture, smooth UX and predictable release cycles.',
        'category'          => 'hire',
        'template'          => 'pages/services/hire-flutter-developers',

        'icon'    => 'images/services/icon-hire-flutter-developers.svg',
        'iconAlt' => 'Icon representing hiring Flutter developers',

        'faq_key'      => 'service_hire_flutter_developers',
        'faq_title'    => 'Frequently asked questions about hiring Flutter developers with QalbIT',
        'faq_subtitle' => 'These are the questions founders, product owners and operations teams usually ask when they consider hiring Flutter developers or a Flutter squad with QalbIT.',
        'faq_bullets'  => [
            '✓ Cross-platform mobile squads comfortable with both greenfield apps and existing Flutter codebases.',
            '✓ Strong focus on UX, offline behaviour, app performance and store-compliant releases.',
            '✓ You own the Flutter source code and assets, covered by NDAs and transparent contracts.',
        ],

        'hero' => [
            'breadcrumb_label' => 'Hire Flutter developers',
            'kicker_prefix'    => 'Hire developers',
            'kicker_label'     => 'Flutter app development',
            'kicker_detail'    => 'iOS · Android · Cross-platform',

            'title'     => 'Hire Dedicated Flutter Developers for <span class="text-gradient-brand-animated">Cross-Platform Mobile Applications</span>.',
            'highlight' => 'Cross-Platform Mobile Applications',

            'intro' => 'QalbIT provides Flutter developers who specialise in designing and building cross-platform mobile apps with a single codebase. We focus on solid architecture, smooth user experiences, offline-ready behaviour and release processes that you can trust for the long term.',

            'primary_cta_label' => 'Discuss your Flutter app idea',
            'primary_cta_href'  => '/contact-us/?topic=hire-flutter-developers',

            'secondary_cta_label' => 'Book a free consultation',
            'secondary_cta_href'  => 'https://calendly.com/abidhusain-qalbit/discuss-project',

            'snapshot_title' => 'Flutter hiring snapshot',
            'snapshot'       => [
                [
                    'label' => 'Typical engagement',
                    'value' => 'Dedicated Flutter squad or fixed-scope mobile app project',
                ],
                [
                    'label' => 'Core focus',
                    'value' => 'Product-grade mobile apps for iOS and Android',
                ],
                [
                    'label' => 'Time to start',
                    'value' => '2–4 weeks after scope, priorities and app stores strategy are aligned',
                ],
                [
                    'label' => 'Delivery model',
                    'value' => 'Discovery and pilot release first, then ongoing feature sprints',
                ],
            ],
        ],

        'overview' => [
            'id'      => 'hire-flutter-overview',
            'eyebrow' => 'Flutter overview',

            'title' => 'When hiring Flutter developers with QalbIT makes sense',
            'intro' => 'We work with teams that treat mobile as a first-class channel – whether for customers, partners or internal staff – and need a reliable Flutter squad to deliver and maintain those apps.',

            'left_title' => 'When a dedicated Flutter team is the right move',
            'left_items' => [
                'You want to launch or evolve a cross-platform mobile app without maintaining separate native codebases.',
                'You need to complement an existing web or SaaS platform with mobile apps for key flows and notifications.',
                'Your current Flutter app is unstable, under-documented or hard to extend, and you need a senior squad to stabilise it.',
                'You prefer a mobile partner who considers UX, device constraints and real-world usage patterns instead of just screens.',
                'You need predictable Flutter capacity for roadmap work, not just one-off releases.',
            ],

            'right_title' => 'Outcomes we target for Flutter engagements',
            'right_items' => [
                'Smooth, responsive mobile experiences that feel native on both iOS and Android.',
                'Stable releases with proper QA, crash monitoring and app store compliance.',
                'Architecture that supports modular features, offline modes and background tasks.',
                'Predictable release cycles aligned to marketing or product milestones.',
                'Documentation and knowledge transfer so you are not tied to a single vendor.',
            ],

            'note' => 'Most Flutter engagements start with a short discovery and design review. This helps us clarify scope, prioritise the first release and ensure the architecture can grow with your product.',
        ],

        'capabilities' => [
            'id'      => 'hire-flutter-capabilities',
            'eyebrow' => 'What our Flutter developers deliver',
            'title'   => 'Flutter development capabilities for modern mobile products',
            'intro'   => 'From consumer-facing apps to internal tools, our Flutter teams build mobile experiences that integrate tightly with your existing backend and operations.',

            'items' => [
                [
                    'label'       => 'Greenfield Flutter app development',
                    'description' => 'End-to-end Flutter app design and development, from wireframes and UI to backend integration and app store releases.',
                    'badge'       => 'New apps',
                    'icon'        => '/images/icons/mobile-app.svg',
                ],
                [
                    'label'       => 'Extending existing Flutter apps',
                    'description' => 'New features, refactors and performance work on existing Flutter codebases, with a focus on stability and maintainability.',
                    'badge'       => 'Enhancements',
                    'icon'        => '/images/icons/discovery-light.svg',
                ],
                [
                    'label'       => 'Offline-first and field apps',
                    'description' => 'Flutter apps that handle offline usage, background sync and intermittent connectivity for field teams.',
                    'badge'       => 'Offline-first',
                    'icon'        => '/images/icons/offline.svg',
                ],
                [
                    'label'       => 'Push notifications & engagement',
                    'description' => 'Push notifications, in-app messaging and deep linking integrated into your marketing and product workflows.',
                    'badge'       => 'Engagement',
                    'icon'        => '/images/icons/notification.svg',
                ],
                [
                    'label'       => 'Integration with existing platforms',
                    'description' => 'Integration with your APIs, authentication, payments, analytics and third-party SDKs.',
                    'badge'       => 'Integrations',
                    'icon'        => '/images/icons/api.svg',
                ],
                [
                    'label'       => 'Maintenance, monitoring & support',
                    'description' => 'Ongoing app maintenance, OS updates, crash monitoring and feature iterations.',
                    'badge'       => 'Support',
                    'icon'        => '/images/icons/ops.svg',
                ],
            ],

            'cta' => [
                'label' => 'Talk through your Flutter app requirements',
                'url'   => '/contact-us/?topic=hire-flutter-developers',
            ],
        ],

        'process' => [
            'id'      => 'hire-flutter-process',
            'eyebrow' => 'How it works',
            'title'   => 'A practical process for hiring and working with Flutter developers',
            'intro'   => 'We keep mobile delivery structured: clear milestones, visible builds and realistic expectations around app store approvals.',

            'items' => [
                [
                    'step'        => 1,
                    'title'       => 'Discovery & app definition',
                    'description' => 'Understand your users, use cases, required platforms, integrations and constraints. Clarify what must be in v1 vs later releases.',
                    'duration'    => '1–3 weeks',
                    'outcome'     => 'Documented app scope, user journeys and technical assumptions.',
                    'icon'        => '/images/icons/discovery.svg',
                ],
                [
                    'step'        => 2,
                    'title'       => 'UX, UI & architecture',
                    'description' => 'Create or refine flows, screens and Flutter architecture, aligning with your brand and backend capabilities.',
                    'duration'    => '2–4 weeks',
                    'outcome'     => 'Agreed designs and technical plan for a realistic first release.',
                    'icon'        => '/images/icons/architecture-design.svg',
                ],
                [
                    'step'        => 3,
                    'title'       => 'Incremental Flutter development',
                    'description' => 'Build app features in reviewable increments, with test builds shared to stakeholders regularly.',
                    'duration'    => '4–12+ weeks (scope-dependent)',
                    'outcome'     => 'A working Flutter app ready for pilot users or internal testing.',
                    'icon'        => '/images/icons/core-modules.svg',
                ],
                [
                    'step'        => 4,
                    'title'       => 'Pilot, launch & app stores',
                    'description' => 'Support pilots, refine UX, prepare app store listings and guide submissions through approval.',
                    'duration'    => '2–4 weeks',
                    'outcome'     => 'Apps live on app stores, with monitoring and feedback loops in place.',
                    'icon'        => '/images/icons/launch.svg',
                ],
                [
                    'step'        => 5,
                    'title'       => 'Ongoing improvements & support',
                    'description' => 'Ship new features, handle OS updates, track crashes and continually improve performance and UX.',
                    'duration'    => 'Ongoing, month-to-month',
                    'outcome'     => 'Mobile apps that stay healthy and aligned with your product strategy.',
                    'icon'        => '/images/icons/scale.svg',
                ],
            ],

            'cta' => [
                'label' => 'Walk me through this for my Flutter app',
                'url'   => '/contact-us/?topic=hire-flutter-developers',
            ],
        ],

        'use_cases' => [
            'id'      => 'hire-flutter-use-cases',
            'eyebrow' => 'Where Flutter fits best',
            'title'   => 'Flutter use cases we most often deliver',
            'intro'   => 'We usually recommend Flutter when you want a single codebase for high-quality iOS and Android apps.',

            'items' => [
                [
                    'label'       => 'Customer-facing mobile apps',
                    'description' => 'Apps that give your customers access to accounts, bookings, orders, documents or services on the go.',
                    'audience'    => 'B2B and B2C companies offering mobile self-service',
                    'badge'       => 'Customer apps',
                ],
                [
                    'label'       => 'Internal field & operations apps',
                    'description' => 'Apps for sales teams, field staff or operations teams who need reliable tools outside the office.',
                    'audience'    => 'Logistics, services and operations-heavy businesses',
                    'badge'       => 'Field operations',
                ],
                [
                    'label'       => 'Companion apps for SaaS products',
                    'description' => 'Mobile companions to existing web/SaaS platforms, focused on key flows and notifications.',
                    'audience'    => 'Product teams extending their platforms to mobile',
                    'badge'       => 'Companion',
                ],
                [
                    'label'       => 'MVPs for mobile-first ideas',
                    'description' => 'Lean mobile MVPs to validate new concepts quickly with real users, designed to evolve into long-term apps.',
                    'audience'    => 'Founders and innovation teams',
                    'badge'       => 'MVP',
                    'link'        => [
                        'label' => 'Discuss a Flutter-based MVP',
                        'url'   => '/contact-us/?topic=hire-flutter-developers',
                    ],
                ],
            ],

            'cta' => [
                'label' => 'Ask if your mobile idea is a good fit for Flutter',
                'url'   => '/contact-us/?topic=hire-flutter-developers',
            ],
        ],

        'stack' => [
            'id'      => 'hire-flutter-tech-stack',
            'eyebrow' => 'Tech stack & ecosystem',
            'title'   => 'Tech stack our Flutter developers typically use',
            'intro'   => 'We combine Flutter with solid backend, analytics and CI/CD tooling to keep your mobile apps reliable.',
            'note'    => 'If you already have a backend or existing mobile app, we integrate with what you have instead of forcing a rebuild.',

            'categories' => [
                [
                    'name'        => 'Flutter & language',
                    'description' => 'The core of cross-platform development.',
                    'items'       => [
                        'Flutter with Dart for cross-platform UI and business logic.',
                        'Widget-driven, reactive architecture following Flutter best practices.',
                        'Plugin ecosystem used carefully to avoid unnecessary dependencies.',
                    ],
                ],
                [
                    'name'        => 'Architecture & state management',
                    'description' => 'How your app logic stays organised.',
                    'items'       => [
                        'Clean architecture and layered structure where appropriate.',
                        'State management solutions (Bloc, Riverpod or Provider) chosen to fit complexity.',
                        'Separation between UI, domain logic and data access for testability.',
                    ],
                ],
                [
                    'name'        => 'Backend, APIs & integrations',
                    'description' => 'How your app talks to the rest of your systems.',
                    'items'       => [
                        'RESTful APIs and GraphQL endpoints from Node.js, Laravel or other stacks.',
                        'Integration with authentication, payments, analytics and push providers.',
                        'Offline sync strategies with local storage where needed.',
                    ],
                ],
                [
                    'name'        => 'Quality, stores & operations',
                    'description' => 'Keeping your apps compliant and healthy.',
                    'items'       => [
                        'Automated and manual testing for critical flows and devices.',
                        'App store deployment pipelines and release processes.',
                        'Crash reporting and analytics to understand behaviour in production.',
                    ],
                ],
            ],
        ],

        'cta' => [
            'enabled' => true,

            'eyebrow' => 'Ready to hire Flutter developers?',
            'title'   => 'Let’s plan your next Flutter app or mobile roadmap.',
            'body'    => 'Share your mobile app idea, existing platform and timelines. We will propose a Flutter squad setup, outline realistic releases and give you a clear view of budget and trade-offs.',

            'primary_label' => 'Book a Flutter discovery call',
            'primary_url'   => '/contact-us/?topic=hire-flutter-developers',
            'primary_aria'  => 'Book a Flutter discovery call with QalbIT',

            'secondary_label' => 'Send us your Flutter requirements',
            'secondary_url'   => '/contact-us/?topic=hire-flutter-developers&source=requirements',
            'secondary_aria'  => 'Send your Flutter requirements to QalbIT',

            'meta' => 'We usually respond within 24–48 hours with clarifying questions, starting options and suggested milestones.',
        ],
    ],

    'mvp' => [
        'slug'     => '/hire-mvp-developers/',
        'name'     => 'Hire MVP Developers',
        'h1'       => 'Hire MVP Developers to Launch Your Startup’s First Version Faster',
        'enabled'  => true,
        'order'    => 20,

        'meta_title'       => 'Hire MVP Developers – Startup MVP Development Team | QalbIT',
        'meta_description' => 'Hire a dedicated MVP development team from QalbIT to define, design and launch your startup MVP quickly. Validate your idea with real users using a lean, product-led MVP process before you invest in a full build.',

        'short_description' => 'Dedicated MVP developers and product-minded teams to define scope, design flows and ship the smallest valuable product version so you can learn from real users earlier.',
        'category'          => 'hire',
        'template'          => 'pages/services/hire-mvp-developers',

        'icon'    => 'images/services/icon-hire-mvp-developers.svg',
        'iconAlt' => 'Icon representing hiring MVP developers',

        'faq_key'      => 'service_hire_mvp_developers',
        'faq_title'    => 'Frequently asked questions about hiring MVP developers with QalbIT',
        'faq_subtitle' => 'These are the questions founders and product leaders usually ask when they consider hiring an MVP team to validate a new product idea.',
        'faq_bullets'  => [
            '✓ Product-led MVP approach focused on learning and speed, not just shipping features.',
            '✓ Flexible tech choices – React, Next.js, Laravel, Node.js, Flutter – based on your idea and constraints.',
            '✓ Clear ownership of MVP code and IP, so you can keep building on it after validation.',
        ],

        'hero' => [
            'breadcrumb_label' => 'Hire MVP developers',
            'kicker_prefix'    => 'Hire developers',
            'kicker_label'     => 'Startup MVP development',
            'kicker_detail'    => 'Scope · Build · Validate',

            'title'     => 'Hire MVP Developers to <span class="text-gradient-brand-animated">Validate Your Product Idea Faster</span>.',
            'highlight' => 'Validate Your Product Idea Faster',

            'intro' => 'QalbIT’s MVP developers help you define the smallest version of your product that still delivers real value. We combine product thinking, UX and engineering so you can launch something testable quickly, learn from users and decide where to invest next.',
            'primary_cta_label' => 'Discuss your MVP idea',
            'primary_cta_href'  => '/contact-us/?topic=hire-mvp-developers',

            'secondary_cta_label' => 'See our MVP development approach',
            'secondary_cta_href'  => '/start-up-mvp/',

            'snapshot_title' => 'MVP hiring snapshot',
            'snapshot'       => [
                [
                    'label' => 'Typical engagement',
                    'value' => 'Discovery + MVP build over a few focused sprints',
                ],
                [
                    'label' => 'Core focus',
                    'value' => 'Defining scope, shipping fast and learning from real users',
                ],
                [
                    'label' => 'Time to start',
                    'value' => '1–2 weeks after initial workshops and scope alignment',
                ],
                [
                    'label' => 'Delivery model',
                    'value' => 'Short, intense sprints with clear MVP launch criteria',
                ],
            ],
        ],

        'overview' => [
            'id'      => 'hire-mvp-overview',
            'eyebrow' => 'MVP overview',

            'title' => 'When hiring MVP developers with QalbIT makes sense',
            'intro' => 'We work with founders and teams that want to validate ideas with real users, not just pitch decks – and need a partner who can go from concept to working MVP quickly and pragmatically.',

            'left_title' => 'When a dedicated MVP team is the right move',
            'left_items' => [
                'You have a clear product idea, but need help turning it into user flows, features and technical scope.',
                'You want to test demand and usability before committing to a full build or large internal team.',
                'You have limited runway or budget and need a partner who will prioritise ruthlessly.',
                'You want to avoid building a bloated v1 that is hard to maintain or pivot away from.',
                'You prefer a partner that understands investor expectations, product-market fit and early-stage risks.',
            ],

            'right_title' => 'Outcomes we target for MVP engagements',
            'right_items' => [
                'A live MVP that real users can sign up to, use and give feedback on.',
                'Clear evidence and metrics you can use in fundraising and product decisions.',
                'A technical foundation that can be extended into v2+ without throwing away all work.',
                'A shared understanding of what to build next and what to leave out.',
                'Documentation that helps you onboard future internal or external teams to continue development.',
            ],

            'note' => 'Our MVP work is tightly linked to our broader product development process. In many cases, the same team that ships your MVP stays with you as you grow into v2 and beyond.',
        ],

        'capabilities' => [
            'id'      => 'hire-mvp-capabilities',
            'eyebrow' => 'What our MVP developers deliver',
            'title'   => 'MVP development capabilities from idea to first release',
            'intro'   => 'We combine product discovery, UX and engineering to ship a version of your product that is small, focused and genuinely testable.',

            'items' => [
                [
                    'label'       => 'Product discovery & scope definition',
                    'description' => 'Workshops and interviews to understand users, map journeys and decide which features belong in the first release.',
                    'badge'       => 'Discovery',
                    'icon'        => '/images/icons/discovery-light.svg',
                ],
                [
                    'label'       => 'MVP UX & interface design',
                    'description' => 'Low- and high-fidelity UX for critical flows, focused on clarity and speed rather than heavy design polish.',
                    'badge'       => 'UX & UI',
                    'icon'        => '/images/icons/ux-light.svg',
                ],
                [
                    'label'       => 'Full-stack MVP implementation',
                    'description' => 'End-to-end development using stacks like React + Node.js or Next.js + Laravel APIs, plus Flutter if mobile is required.',
                    'badge'       => 'Full-stack',
                    'icon'        => '/images/icons/stack.svg',
                ],
                [
                    'label'       => 'MVP instrumentation & analytics',
                    'description' => 'Tracking, events and simple dashboards to see how users actually behave in the MVP.',
                    'badge'       => 'Analytics',
                    'icon'        => '/images/icons/report.svg',
                ],
                [
                    'label'       => 'Launch, feedback loops & iteration',
                    'description' => 'Support early adopters, gather feedback and ship quick updates that respond to what users tell you.',
                    'badge'       => 'Iteration',
                    'icon'        => '/images/icons/iteration-light.svg',
                ],
                [
                    'label'       => 'Post-MVP roadmap & next steps',
                    'description' => 'Translate learnings from the MVP into a clear roadmap, including what to keep, drop or rebuild.',
                    'badge'       => 'Roadmap',
                    'icon'        => '/images/icons/roadmap.svg',
                ],
            ],

            'cta' => [
                'label' => 'Talk through your MVP idea and constraints',
                'url'   => '/contact-us/?topic=hire-mvp-developers',
            ],
        ],

        'process' => [
            'id'      => 'hire-mvp-process',
            'eyebrow' => 'How it works',
            'title'   => 'A practical MVP development process from idea to launch',
            'intro'   => 'We keep MVP development focused on learning and speed, not on building every possible feature.',

            'items' => [
                [
                    'step'        => 1,
                    'title'       => 'Idea, users & constraints',
                    'description' => 'Clarify your idea, target users, success metrics, budget and timelines.',
                    'duration'    => '1–2 weeks',
                    'outcome'     => 'Shared understanding of what success looks like for the MVP.',
                    'icon'        => '/images/icons/discovery.svg',
                ],
                [
                    'step'        => 2,
                    'title'       => 'Scope the smallest valuable version',
                    'description' => 'Identify must-have features, nice-to-haves and experiments. Design flows for the first version only.',
                    'duration'    => '1–2 weeks',
                    'outcome'     => 'Clear MVP scope and feature list tied to your goals.',
                    'icon'        => '/images/icons/architecture-design.svg',
                ],
                [
                    'step'        => 3,
                    'title'       => 'Build, integrate & instrument',
                    'description' => 'Implement the MVP with a lean full-stack setup, including basic analytics and admin tools.',
                    'duration'    => '3–8+ weeks (complexity-dependent)',
                    'outcome'     => 'A working MVP ready for early users or pilot customers.',
                    'icon'        => '/images/icons/core-modules.svg',
                ],
                [
                    'step'        => 4,
                    'title'       => 'Launch, measure & learn',
                    'description' => 'Release the MVP to a targeted group, monitor behaviour and gather qualitative feedback.',
                    'duration'    => '2–4 weeks',
                    'outcome'     => 'Evidence-based view of whether the idea resonates and where to adjust.',
                    'icon'        => '/images/icons/launch.svg',
                ],
                [
                    'step'        => 5,
                    'title'       => 'Decide: scale, pivot or pause',
                    'description' => 'Based on data and feedback, decide whether to invest further, pivot the idea or pause.',
                    'duration'    => 'Ongoing',
                    'outcome'     => 'Clear recommendation and roadmap for what to do after the MVP stage.',
                    'icon'        => '/images/icons/scale.svg',
                ],
            ],

            'cta' => [
                'label' => 'Walk me through this for my MVP',
                'url'   => '/contact-us/?topic=hire-mvp-developers',
            ],
        ],

        'use_cases' => [
            'id'      => 'hire-mvp-use-cases',
            'eyebrow' => 'Where MVPs fit best',
            'title'   => 'MVP use cases we most often deliver',
            'intro'   => 'We typically build MVPs where speed of learning matters more than having every feature from day one.',

            'items' => [
                [
                    'label'       => 'New SaaS or B2B product ideas',
                    'description' => 'Simple but usable versions of SaaS products aimed at a specific workflow or niche.',
                    'audience'    => 'Founders and product teams testing new SaaS concepts',
                    'badge'       => 'SaaS MVPs',
                ],
                [
                    'label'       => 'Digitising manual or spreadsheet-heavy workflows',
                    'description' => 'MVP tools that replace the most painful parts of manual processes without rebuilding everything.',
                    'audience'    => 'Operations-heavy teams and services businesses',
                    'badge'       => 'Ops MVPs',
                ],
                [
                    'label'       => 'Marketplace or two-sided platforms',
                    'description' => 'Early versions that connect two sides of a market with minimal but functional workflows.',
                    'audience'    => 'Marketplaces and platform founders',
                    'badge'       => 'Marketplace MVPs',
                ],
                [
                    'label'       => 'Mobile-first experiments',
                    'description' => 'Lean mobile apps that test the viability of new ideas or channels.',
                    'audience'    => 'Teams exploring mobile-first opportunities',
                    'badge'       => 'Mobile MVPs',
                    'link'        => [
                        'label' => 'Discuss whether your idea is right for an MVP',
                        'url'   => '/contact-us/?topic=hire-mvp-developers',
                    ],
                ],
            ],

            'cta' => [
                'label' => 'Ask if your idea is suitable for an MVP',
                'url'   => '/contact-us/?topic=hire-mvp-developers',
            ],
        ],

        'stack' => [
            'id'      => 'hire-mvp-tech-stack',
            'eyebrow' => 'Tech stack & platforms',
            'title'   => 'Tech stack we typically use for MVP development',
            'intro'   => 'We use proven, flexible stacks that let you move quickly now and scale sensibly later.',
            'note'    => 'We choose the stack based on your idea, timelines, budget and any existing systems – not just on trends.',

            'categories' => [
                [
                    'name'        => 'Web frontends',
                    'description' => 'Where users interact with your MVP.',
                    'items'       => [
                        'React and Next.js for responsive web apps and dashboards.',
                        'Blade + Tailwind or simpler setups for lean admin tools and landing pages.',
                        'Component-driven UIs that can grow into a design system later.',
                    ],
                ],
                [
                    'name'        => 'Backends & APIs',
                    'description' => 'Where the business logic lives.',
                    'items'       => [
                        'Node.js/NestJS or Laravel/PHP for API-first MVPs.',
                        'RESTful APIs and webhooks for integrations.',
                        'Simple but robust authentication and access control.',
                    ],
                ],
                [
                    'name'        => 'Mobile & cross-platform',
                    'description' => 'When mobile is part of the MVP.',
                    'items'       => [
                        'Flutter for cross-platform mobile MVPs on iOS and Android.',
                        'Mobile companions connected to existing web platforms.',
                    ],
                ],
                [
                    'name'        => 'Data, analytics & operations',
                    'description' => 'How you learn from your MVP.',
                    'items'       => [
                        'Relational databases (MySQL/PostgreSQL) with clean migrations.',
                        'Analytics, event tracking and dashboards tailored to MVP metrics.',
                        'CI/CD and basic monitoring so releases are fast and safe.',
                    ],
                ],
            ],
        ],

        'cta' => [
            'enabled' => true,

            'eyebrow' => 'Ready to hire MVP developers?',
            'title'   => 'Let’s turn your idea into a testable MVP.',
            'body'    => 'Share your startup idea, target users and runway. We will propose a practical MVP scope, a lean tech stack and a roadmap that helps you maximise learning from your first release.',

            'primary_label' => 'Book an MVP discovery call',
            'primary_url'   => '/contact-us/?topic=hire-mvp-developers',
            'primary_aria'  => 'Book an MVP discovery call with QalbIT',

            'secondary_label' => 'Send us your MVP brief',
            'secondary_url'   => '/contact-us/?topic=hire-mvp-developers&source=requirements',
            'secondary_aria'  => 'Send your MVP requirements to QalbIT',

            'meta' => 'We typically respond within 24–48 hours with clarifying questions, a proposed MVP scope and next steps.',
        ],
    ],

    'full-stack-javascript' => [
        'slug'     => '/hire-full-stack-javascript-developers/',
        'name'     => 'Hire Full-Stack JavaScript Developers',
        'h1'       => 'Hire Full-Stack JavaScript Developers Across React, Next.js & Node.js',
        'enabled'  => true,
        'order'    => 90,

        'meta_title'       => 'Hire Full-Stack JavaScript Developers – React, Next.js & Node.js Team | QalbIT',
        'meta_description' => 'Hire full-stack JavaScript developers from QalbIT to build and scale end-to-end web applications using React, Next.js and Node.js. Get a remote full-stack JS team that can own both frontend and backend delivery.',

        'short_description' => 'Full-stack JavaScript developers who handle both React/Next.js frontends and Node.js/NestJS backends, giving you one team that can own features from UI to database.',
        'category'          => 'hire',
        'template'          => 'pages/services/hire-full-stack-javascript-developers',

        'icon'    => 'images/services/icon-hire-full-stack-javascript-developers.svg',
        'iconAlt' => 'Icon representing hiring full-stack JavaScript developers',

        'faq_key'      => 'service_hire_fullstack_javascript_developers',
        'faq_title'    => 'Frequently asked questions about hiring full-stack JavaScript developers with QalbIT',
        'faq_subtitle' => 'These are the questions founders, CTOs and product teams usually ask when they consider hiring a full-stack JavaScript squad instead of separate frontend and backend teams.',
        'faq_bullets'  => [
            '✓ Full-stack squads comfortable across React/Next.js frontends and Node.js/NestJS backends.',
            '✓ Strong focus on code quality, observability and maintainability across the entire stack.',
            '✓ You own the full-stack JavaScript codebase and IP, with NDAs and contracts tailored to your region.',
        ],

        'hero' => [
            'breadcrumb_label' => 'Hire full-stack JavaScript developers',
            'kicker_prefix'    => 'Hire developers',
            'kicker_label'     => 'Full-stack JavaScript development',
            'kicker_detail'    => 'React · Next.js · Node.js',

            'title'     => 'Hire Full-Stack JavaScript Developers for <span class="text-gradient-brand-animated">End-to-End Web Applications</span>.',
            'highlight' => 'End-to-End Web Applications',

            'intro' => 'QalbIT provides full-stack JavaScript developers who can own features from UI through APIs to the database. We balance frontend polish with backend robustness so you can ship quickly without creating tech debt that slows you down later.',
            'primary_cta_label' => 'Discuss your full-stack JavaScript needs',
            'primary_cta_href'  => '/contact-us/?topic=hire-full-stack-javascript-developers',

            'secondary_cta_label' => 'Book a free consultation',
            'secondary_cta_href'  => 'https://calendly.com/abidhusain-qalbit/discuss-project',

            'snapshot_title' => 'Full-stack JavaScript hiring snapshot',
            'snapshot'       => [
                [
                    'label' => 'Typical engagement',
                    'value' => 'Dedicated full-stack squad or fixed-scope product build',
                ],
                [
                    'label' => 'Core focus',
                    'value' => 'React/Next.js frontends with Node.js/NestJS backends',
                ],
                [
                    'label' => 'Time to start',
                    'value' => '2–4 weeks after stack review and team fit discussions',
                ],
                [
                    'label' => 'Delivery model',
                    'value' => 'Pilot feature/slice first, then stable full-stack sprints',
                ],
            ],
        ],

        'overview' => [
            'id'      => 'hire-fullstack-js-overview',
            'eyebrow' => 'Full-stack JS overview',

            'title' => 'When hiring full-stack JavaScript developers with QalbIT makes sense',
            'intro' => 'We work with teams that want one accountable squad – instead of separate frontend and backend silos – to move faster on features and reduce coordination overhead.',

            'left_title' => 'When a full-stack JavaScript team is the right move',
            'left_items' => [
                'You are building or scaling a product where most of the stack is JavaScript or TypeScript.',
                'You want less back-and-forth between frontend and backend teams and more end-to-end ownership.',
                'You need to deliver full features – UI, APIs and data model – under tight timelines.',
                'You prefer a partner that can choose the right balance between server-rendered and SPA-style experiences.',
                'You want to keep your hiring profile simpler: a strong full-stack JS team plus a smaller internal core.',
            ],

            'right_title' => 'Outcomes we target for full-stack JS engagements',
            'right_items' => [
                'Faster feature delivery because the same team owns UI, API and data changes.',
                'Cleaner boundaries between services and frontends, reducing coupling and regressions.',
                'Better observability – logs, metrics and traces – across the entire stack.',
                'Predictable sprints where scope is aligned to outcomes, not just tickets.',
                'A codebase that is easier for future full-stack JS hires to understand and extend.',
            ],

            'note' => 'We usually recommend using full-stack JS squads alongside clear architectural boundaries – they own vertical slices of the product, not just everything everywhere.',
        ],

        'capabilities' => [
            'id'      => 'hire-fullstack-js-capabilities',
            'eyebrow' => 'What our full-stack JS developers deliver',
            'title'   => 'Full-stack JavaScript capabilities from UI to database',
            'intro'   => 'Our full-stack JavaScript teams deliver complete features, from React/Next.js interfaces through Node.js APIs and data models.',

            'items' => [
                [
                    'label'       => 'End-to-end feature development',
                    'description' => 'Design and implementation of features that span frontend, backend and database changes, owned by one squad.',
                    'badge'       => 'Vertical slices',
                    'icon'        => '/images/icons/modules.svg',
                ],
                [
                    'label'       => 'Greenfield product builds',
                    'description' => 'From initial architecture to v1 launch, using React/Next.js + Node.js/NestJS and a relational database.',
                    'badge'       => 'New products',
                    'icon'        => '/images/icons/stack.svg',
                ],
                [
                    'label'       => 'Modernisation of legacy stacks into JS',
                    'description' => 'Gradual migration from older stacks into a modern JavaScript/TypeScript-based architecture.',
                    'badge'       => 'Modernisation',
                    'icon'        => '/images/icons/modernization.svg',
                ],
                [
                    'label'       => 'API design, integrations & background jobs',
                    'description' => 'REST/GraphQL API design, external integrations and background workers implemented in Node.js.',
                    'badge'       => 'APIs & integrations',
                    'icon'        => '/images/icons/api.svg',
                ],
                [
                    'label'       => 'Performance, caching & scalability',
                    'description' => 'Caching strategies, query optimisation and scaling approaches tuned to your usage patterns.',
                    'badge'       => 'Performance',
                    'icon'        => '/images/icons/performance.svg',
                ],
                [
                    'label'       => 'Support, monitoring & DevOps collaboration',
                    'description' => 'Ongoing support and collaboration with your DevOps team to keep environments and releases stable.',
                    'badge'       => 'Support',
                    'icon'        => '/images/icons/ops.svg',
                ],
            ],

            'cta' => [
                'label' => 'Talk through your full-stack JavaScript requirements',
                'url'   => '/contact-us/?topic=hire-full-stack-javascript-developers',
            ],
        ],

        'process' => [
            'id'      => 'hire-fullstack-js-process',
            'eyebrow' => 'How it works',
            'title'   => 'A practical process for hiring and working with full-stack JavaScript developers',
            'intro'   => 'We align first on architecture and ownership so your full-stack JS squad can move quickly without chaos.',

            'items' => [
                [
                    'step'        => 1,
                    'title'       => 'Architecture & boundaries',
                    'description' => 'Review your current or planned architecture, decide where full-stack squads will own vertical slices.',
                    'duration'    => '1–3 weeks',
                    'outcome'     => 'Clear boundaries for what the full-stack team will own and how they will collaborate with other teams.',
                    'icon'        => '/images/icons/architecture-design.svg',
                ],
                [
                    'step'        => 2,
                    'title'       => 'Team composition & onboarding',
                    'description' => 'Assemble a full-stack JS squad with the right mix of frontend and backend strengths. Onboard them to your domain, tools and rituals.',
                    'duration'    => '1–2 weeks',
                    'outcome'     => 'A full-stack squad that understands your product and is ready to ship.',
                    'icon'        => '/images/icons/team.svg',
                ],
                [
                    'step'        => 3,
                    'title'       => 'Pilot feature or module',
                    'description' => 'Deliver one meaningful vertical slice to validate collaboration, code quality and communication.',
                    'duration'    => '2–4 weeks',
                    'outcome'     => 'A complete feature – UI, API and data – delivered to staging or production.',
                    'icon'        => '/images/icons/pilot.svg',
                ],
                [
                    'step'        => 4,
                    'title'       => 'Stable sprints & roadmap delivery',
                    'description' => 'Move into regular sprints, with the squad taking responsibility for delivering features and addressing tech debt.',
                    'duration'    => 'Ongoing',
                    'outcome'     => 'Predictable full-stack delivery across your roadmap.',
                    'icon'        => '/images/icons/core-modules.svg',
                ],
                [
                    'step'        => 5,
                    'title'       => 'Continuous improvement & knowledge sharing',
                    'description' => 'Improve performance, developer experience and documentation while mentoring any internal hires you add.',
                    'duration'    => 'Ongoing, month-to-month',
                    'outcome'     => 'A healthier full-stack JavaScript codebase and a stronger internal team.',
                    'icon'        => '/images/icons/scale.svg',
                ],
            ],

            'cta' => [
                'label' => 'Walk me through this for my product',
                'url'   => '/contact-us/?topic=hire-full-stack-javascript-developers',
            ],
        ],

        'use_cases' => [
            'id'      => 'hire-fullstack-js-use-cases',
            'eyebrow' => 'Where full-stack JS fits best',
            'title'   => 'Full-stack JavaScript use cases we most often deliver',
            'intro'   => 'We typically see the most impact from full-stack JS squads when they own specific products or verticals end to end.',

            'items' => [
                [
                    'label'       => 'New product initiatives',
                    'description' => 'Launching new products or modules where a full-stack squad can move from idea to production quickly.',
                    'audience'    => 'Product teams spinning up new initiatives',
                    'badge'       => 'New products',
                ],
                [
                    'label'       => 'Rebuilding vertical slices of legacy apps',
                    'description' => 'Replacing specific flows or modules of older systems with modern full-stack JavaScript implementations.',
                    'audience'    => 'Organisations modernising part of a larger platform',
                    'badge'       => 'Partial modernisation',
                ],
                [
                    'label'       => 'Feature delivery for existing JS-based products',
                    'description' => 'Augmenting your internal team with a squad focused on shipping full features faster.',
                    'audience'    => 'Existing JavaScript / TypeScript product teams',
                    'badge'       => 'Feature squads',
                ],
                [
                    'label'       => 'Experimentation & growth engineering',
                    'description' => 'Running experiments and growth projects that require quick end-to-end changes.',
                    'audience'    => 'Growth and experimentation teams',
                    'badge'       => 'Growth',
                    'link'        => [
                        'label' => 'Discuss a full-stack JS squad for your roadmap',
                        'url'   => '/contact-us/?topic=hire-full-stack-javascript-developers',
                    ],
                ],
            ],

            'cta' => [
                'label' => 'Ask if full-stack JavaScript is a good fit for your roadmap',
                'url'   => '/contact-us/?topic=hire-full-stack-javascript-developers',
            ],
        ],

        'stack' => [
            'id'      => 'hire-fullstack-js-tech-stack',
            'eyebrow' => 'Tech stack & ecosystem',
            'title'   => 'Tech stack our full-stack JavaScript developers typically use',
            'intro'   => 'We use a modern JavaScript/TypeScript stack that balances speed of delivery with long-term maintainability.',
            'note'    => 'If you already have preferred tooling or platforms, we adapt to those rather than forcing you onto a specific stack.',

            'categories' => [
                [
                    'name'        => 'Frontends',
                    'description' => 'User interfaces and experiences.',
                    'items'       => [
                        'React and Next.js for product-grade web interfaces.',
                        'Tailwind CSS for consistent, fast implementation of designs.',
                        'Component-driven development aligned with design systems where available.',
                    ],
                ],
                [
                    'name'        => 'Backends & services',
                    'description' => 'APIs and server-side logic.',
                    'items'       => [
                        'Node.js with TypeScript, typically using NestJS or Express.',
                        'REST and GraphQL APIs designed with long-term use in mind.',
                        'Background jobs and workers for asynchronous work.',
                    ],
                ],
                [
                    'name'        => 'Data & infrastructure',
                    'description' => 'Where data is stored and how services run.',
                    'items'       => [
                        'PostgreSQL or MySQL with clean schema design and migrations.',
                        'Redis for caching, queues and rate limiting.',
                        'Docker-based deployments, CI/CD and cloud platforms such as AWS, GCP or DigitalOcean.',
                    ],
                ],
                [
                    'name'        => 'Quality, security & observability',
                    'description' => 'Practices that keep the stack robust.',
                    'items'       => [
                        'Automated tests across critical endpoints and UI flows.',
                        'ESLint, Prettier and code review as standard practice.',
                        'Logging, metrics and tracing wired into the stack from early on.',
                    ],
                ],
            ],
        ],

        'cta' => [
            'enabled' => true,

            'eyebrow' => 'Ready to hire full-stack JavaScript developers?',
            'title'   => 'Let’s plan a full-stack JavaScript squad around your roadmap.',
            'body'    => 'Share your current stack, product roadmap and bottlenecks. We will propose how a full-stack JS squad can plug in, what they should own and what kind of outcomes you can expect in the first 3–6 months.',

            'primary_label' => 'Book a full-stack JavaScript discovery call',
            'primary_url'   => '/contact-us/?topic=hire-full-stack-javascript-developers',
            'primary_aria'  => 'Book a full-stack JavaScript discovery call with QalbIT',

            'secondary_label' => 'Send us your full-stack JS requirements',
            'secondary_url'   => '/contact-us/?topic=hire-full-stack-javascript-developers&source=requirements',
            'secondary_aria'  => 'Send your full-stack JavaScript requirements to QalbIT',

            'meta' => 'We typically respond within 24–48 hours with clarifying questions, team proposals and suggested starting points.',
        ],
    ],
];
