<?php

return [

    'start-up-mvp' => [
        'slug'       => 'start-up-mvp',
        'name'       => 'Start-up MVP',
        'label'      => 'Start-up MVP',

        // SEO and template
        'h1'               => 'Startup MVP Development Company',
        'meta_title'       => 'Startup MVP Development Company in India – QalbIT',
        'meta_description' => 'QalbIT is a startup MVP development company helping founders design and build SaaS, web and mobile MVPs in 8–16 weeks. Work with a founder-led MVP development agency for clean, scalable code you own.',
        'template'         => 'pages/process/start-up-mvp',

        // FAQ meta (for schema etc.)
        'faq_key'      => 'faq_process_startup_mvp',
        'faq_title'    => 'Frequently asked questions about Startup MVP development with QalbIT',
        'faq_subtitle' => 'These are the questions founders and product teams usually ask when they explore working with QalbIT as their startup MVP development company.',
        'faq_bullets' => [
            '✓ Timelines and budget ranges for Startup MVPs, from quick prototype sprints to full end-to-end builds.',
            '✓ How we work with founders and product teams (scope, handover, code/IP ownership, NDAs, time zones).',
            '✓ What happens if you already have a half-built MVP, legacy codebase or an internal team we need to collaborate with.',
        ],

        // S1 – Hero
        'hero' => [
            'id'             => 'mvp-hero',
            'eyebrow'        => 'Startup MVP development',
            'breadcrumb'     => 'Startup MVP development',
            'kicker_prefix'  => 'Services',
            'kicker_label'   => 'Startup MVP development',
            'kicker_detail'  => 'SaaS · Web · Mobile',

            'title'          => 'Startup MVP Development Company for <span class="text-gradient-brand-animated">SaaS and product teams</span>.',
            'highlight'      => 'SaaS and product teams',
            'intro'          => 'QalbIT is a product-focused engineering partner helping founders design, build and ship their first MVP in 8–12 weeks across SaaS, web and mobile apps. We turn fuzzy ideas into launch-ready products with clean, scalable code you fully own.',

            'bullets'        => [
                'Non-technical founders who need a reliable MVP development agency.',
                'Product managers validating new ideas with a focused MVP scope.',
                'CTOs and tech leads who want a small, stable squad of MVP developers.',
            ],

            'primary_cta'    => [
                'label' => 'Discuss your MVP',
                'href'  => '#mvp-final-cta',
            ],
            'secondary_cta'  => [
                'label' => 'See MVP case studies',
                'href'  => '#mvp-proof',
            ],

            'internal_links' => [
                [
                    'label' => 'Explore our services',
                    'href'  => '/services/',
                ],
                [
                    'label' => 'View case studies',
                    'href'  => '/case-studies/',
                ],
                [
                    'label' => 'Contact our team',
                    'href'  => '/contact-us/',
                ],
            ],

            'trust'          => [
                'rating_label' => '5.0/5',
                'rating_text'  => 'rating from startup founders',
                'sources'      => ['Clutch', 'Upwork', 'Google Reviews'],
                'location'     => 'Based in Ahmedabad, India, working with founders in the UK, Europe, Middle East and beyond.',
            ],

            'snapshot'       => [
                'title' => 'MVP dashboard snapshot',
                'items' => [
                    [
                        'label' => 'Time to MVP',
                        'value' => '10–12 weeks',
                        'note'  => 'Average for most SaaS and product MVPs.',
                    ],
                    [
                        'label' => 'Launch success',
                        'value' => '96%',
                        'note'  => 'MVPs that go live on the agreed timeline.',
                    ],
                    [
                        'label' => 'Stack',
                        'value' => 'Laravel · React · Flutter',
                        'note'  => null,
                    ],
                    [
                        'label' => 'Engagement model',
                        'value' => 'Prototype sprint → MVP build → Scale-up squad',
                        'note'  => 'Designed for startup budgets with clear milestones and ownership.',
                    ],
                ],
            ],
        ],

        // S2 – Who it is for & problems we solve
        'fit' => [
            'id'       => 'mvp-fit',
            'eyebrow'  => 'Who it is for',
            'title'    => 'Built for founders and product teams who need to move fast',
            'intro'    => 'QalbIT partners with early-stage startups and growing product companies that need a reliable MVP development agency to turn ideas into real products without the chaos of freelancers or a risky in-house build.',

            'personas' => [
                [
                    'key'       => 'non-technical-founder',
                    'label'     => 'Non-technical founder',
                    'situation' => 'You have a clear problem and market, but you do not have a tech co-founder and you are tired of juggling multiple freelancers or agencies that over promise and disappear.',
                    'help'      => 'We act as your product and tech team, refining scope, suggesting features for a lean MVP, selecting the right stack and guiding you through every decision from prototype to launch.',
                ],
                [
                    'key'       => 'product-manager',
                    'label'     => 'Product manager or head of product',
                    'situation' => 'You are responsible for validating a new product line or feature set and you need an execution-focused MVP development company that can work alongside your internal stakeholders.',
                    'help'      => 'We convert discovery insights into UX flows, click-through prototypes and a small but robust MVP that can be measured in terms of adoption, retention and revenue impact.',
                ],
                [
                    'key'       => 'cto-tech-lead',
                    'label'     => 'CTO or tech lead',
                    'situation' => 'You own the architecture and long term roadmap but need an experienced squad of MVP developers to move faster than your internal capacity allows.',
                    'help'      => 'We plug in as an extension of your team, aligning to your coding standards, infrastructure and review process while owning delivery of specific MVP modules or streams.',
                ],
                [
                    'key'       => 'operations-owner',
                    'label'     => 'Operations or business owner',
                    'situation' => 'You see inefficiencies in your operations and want an internal tool or SaaS style MVP to digitise workflows, but you do not want to manage a large in house tech team.',
                    'help'      => 'We map your processes, design simple interfaces for your teams and deliver a secure web or mobile MVP that fits your budget and can be evolved into a full product over time.',
                ],
            ],

            'problems_title' => 'Common problems we solve for startup MVPs',
            'problems'       => [
                'Freelancer teams that disappear mid way or ship poor quality code.',
                'Scope creep and missed timelines that delay your fundraising or go to market.',
                'Legacy code bases that are hard to extend, maintain or hand over to new teams.',
                'Over engineered architectures that are too expensive for early stage MVPs.',
                'Disconnected teams where design, development and QA do not talk to each other.',
                'Founders struggling to hire MVP developers they can rely on.',
            ],
        ],

        // S3 – MVP services we offer
        'services' => [
            'id'      => 'mvp-services',
            'eyebrow' => 'What we build',
            'title'   => 'MVP development services we offer',
            'intro'   => 'From first prototype to launch and early traction, we design and build focused MVPs that validate your riskiest assumptions while keeping the codebase ready for the next phase of growth.',

            'items'   => [
                [
                    'key'         => 'saas-mvp',
                    'label'       => 'SaaS MVP development',
                    'description' => 'Multi tenant web apps, subscriptions, roles and permissions, billing and admin dashboards built with Laravel, React or Next.js and modern infrastructure.',
                    'link_label'  => 'Learn about our custom software services',
                    'link_href'   => '/services/custom-software-development/',
                ],
                [
                    'key'         => 'web-app-mvp',
                    'label'       => 'Web app MVPs',
                    'description' => 'Browser based products and internal tools with responsive UI, authentication, reporting and integrations into CRMs, ERPs or third party APIs.',
                    'link_label'  => 'Explore web application development',
                    'link_href'   => '/services/web-application-development/',
                ],
                [
                    'key'         => 'mobile-app-mvp',
                    'label'       => 'Mobile app MVP (Flutter)',
                    'description' => 'Cross platform mobile MVPs using Flutter with shared codebase, backend APIs and analytics so you can iterate quickly on iOS and Android.',
                    'link_label'  => 'View mobile app development services',
                    'link_href'   => '/services/mobile-app-development/',
                ],
                [
                    'key'         => 'internal-tools',
                    'label'       => 'Internal tools and dashboards',
                    'description' => 'Operational MVPs for sales, support, logistics, finance and operations teams, replacing spreadsheets with reliable, role based applications.',
                    'link_label'  => 'See how we support different industries',
                    'link_href'   => '/industries/',
                ],
                [
                    'key'         => 'prototyping-ux',
                    'label'       => 'Prototyping and clickable UX flows',
                    'description' => 'Low fidelity and high fidelity prototypes, user journeys and interface designs to validate ideas with users and investors before writing full production code.',
                    'link_label'  => 'Learn more about our UX design',
                    'link_href'   => '/services/ux-design-services/',
                ],
                [
                    'key'         => 'api-backend',
                    'label'       => 'API and back-end for existing front ends',
                    'description' => 'Secure, well documented REST and GraphQL APIs, authentication, payment integrations and data pipelines powering your existing web or mobile front ends.',
                    'link_label'  => 'Browse our technology stack',
                    'link_href'   => '/technologies/',
                ],
                [
                    'key'         => 'rescue-modernise',
                    'label'       => 'Modernising or rescuing half built MVPs',
                    'description' => 'If you are stuck with a half finished MVP or legacy code, we audit the existing product, stabilise what can be saved and plan a phased roadmap to get you to a reliable production release.',
                    'note'        => 'Many clients switch to QalbIT after struggling to hire MVP developers who can take ownership of both the technical and product sides of the build.',
                ],
            ],

            'note'    => 'We deliver MVP development services from Ahmedabad, India, partnering with founders and product teams in India, the UK, Europe, the Middle East and beyond.',
        ],

        // S4 – Our MVP development process
        'process' => [
            'id'      => 'mvp-process',
            'eyebrow' => 'How we work',
            'title'   => 'Our proven MVP development process',
            'intro'   => 'A structured, transparent approach from discovery to launch, designed so that you always know what is being built, why it matters and when it will be delivered.',

            'steps'   => [
                [
                    'step'        => 1,
                    'kicker'      => 'Product discovery and scoping',
                    'title'       => 'Product discovery and MVP scope',
                    'description' => 'We unpack your idea, target users, business model and success metrics, then define a focused MVP scope that fits your budget and timeline.',
                    'outputs'     => 'Problem statement, personas, feature list, non goals and success criteria.',
                ],
                [
                    'step'        => 2,
                    'kicker'      => 'UX flows and interface design',
                    'title'       => 'UX flows and interface design',
                    'description' => 'We create end to end user journeys, wireframes and clickable prototypes so you can validate the experience with stakeholders, advisors and early users.',
                    'outputs'     => 'User flows, low and high fidelity screens, design system basics and a click through demo.',
                ],
                [
                    'step'        => 3,
                    'kicker'      => 'Technical architecture and roadmap',
                    'title'       => 'Technical architecture and delivery roadmap',
                    'description' => 'We pick the right stack, design the data model and integrations, and define a realistic sprint plan covering build, QA and launch activities.',
                    'outputs'     => 'Architecture diagram, tech stack, backlog, sprint plan and release milestones.',
                ],
                [
                    'step'        => 4,
                    'kicker'      => 'Build sprints and QA',
                    'title'       => 'MVP build sprints for back-end, front-end and QA',
                    'description' => 'Our engineers ship features in short, focused sprints with regular demos, code reviews and structured QA so that you see progress every week.',
                    'outputs'     => 'Working increments of the product, test coverage and access to staging environments.',
                ],
                [
                    'step'        => 5,
                    'kicker'      => 'User feedback and iteration',
                    'title'       => 'User feedback and iteration',
                    'description' => 'We help you onboard pilot users, capture feedback and prioritise improvements so the MVP becomes something customers are willing to pay for.',
                    'outputs'     => 'Analytics setup, feedback backlog, iteration plan and a refined roadmap.',
                ],
                [
                    'step'        => 6,
                    'kicker'      => 'Launch and post launch support',
                    'title'       => 'Launch, support and next phase planning',
                    'description' => 'We prepare your infrastructure, monitoring and release checklist, then support the launch and help you plan the roadmap towards product market fit.',
                    'outputs'     => 'Production deployment, run books, support window and a post launch roadmap.',
                ],
            ],

            'timeline_note' => 'Typical timelines for a Startup MVP with QalbIT range from 8–16 weeks, depending on scope and integrations. We prefer phased engagement so you can validate each step before committing to the next.',
        ],

        // S5 – Engagement models and budget guidance
        'engagements' => [
            'id'      => 'mvp-engagements',
            'eyebrow' => 'Engagement models',
            'title'   => 'Engagement models and budget guidance',
            'intro'   => 'Whether you are validating a brand new idea or scaling a working MVP, we keep our engagement models transparent so you know what to expect in terms of time, cost and responsibilities.',

            'models'  => [
                [
                    'key'          => 'prototype-sprint',
                    'label'        => 'Prototype Sprint',
                    'badge'        => '2–3 weeks',
                    'duration'     => '2–3 weeks',
                    'description'  => 'A focused design and prototyping engagement to visualise your idea, align stakeholders and test the core experience before committing to full development.',
                    'best_for'     => 'Early stage founders preparing for investor pitches or internal approvals.',
                    'budget_range' => '₹1.5L–₹3L (USD 2–4K), depending on scope and complexity.',
                    'deliverables' => 'UX flows, clickable prototype, high level architecture and a ballpark MVP estimate.',
                ],
                [
                    'key'          => 'full-mvp-build',
                    'label'        => 'Full MVP Build',
                    'badge'        => '8–12+ weeks',
                    'duration'     => '8–12+ weeks',
                    'description'  => 'End to end MVP development with discovery, UX, architecture, engineering and QA handled by a dedicated QalbIT squad.',
                    'best_for'     => 'Funded startups and founders with a clear problem solution fit and roadmap.',
                    'budget_range' => '₹6L–₹18L (USD 8–25K), based on modules, integrations and platforms.',
                    'deliverables' => 'Production ready MVP with staging and production environments, documentation and handover.',
                ],
                [
                    'key'          => 'mvp-scale-retainer',
                    'label'        => 'MVP and scale retainer',
                    'badge'        => '3–9 months',
                    'duration'     => '3–9 months',
                    'description'  => 'A stable product squad that continues after the MVP launch to optimise performance, ship new features and support your growth milestones.',
                    'best_for'     => 'Startups approaching product market fit that need predictable capacity each month.',
                    'budget_range' => 'Monthly retainer starting around one senior and one mid level engineer equivalent.',
                    'deliverables' => 'Continuous delivery, roadmap execution, technical optimisation and support SLAs.',
                ],
                [
                    'key'          => 'dedicated-pod',
                    'label'        => 'Dedicated MVP developer or pod',
                    'badge'        => 'Flexible',
                    'duration'     => 'Flexible',
                    'description'  => 'Embedded engineers or a small pod that works directly with your CTO or product owner using your tools, processes and ceremonies.',
                    'best_for'     => 'Teams that already have a roadmap and want execution support from experienced MVP developers.',
                    'budget_range' => 'Monthly rate per developer or pod, adjusted by seniority and commitment.',
                    'deliverables' => 'Capacity aligned to your sprint plan with shared KPIs and ongoing knowledge transfer.',
                ],
            ],

            'note' => 'We share a clear proposal before any engagement starts, including scope, assumptions, timelines and team composition, so you always understand how your startup MVP development budget will be used.',
        ],

        // S6 – MVP case studies and outcomes
        'proof' => [
            'id'      => 'mvp-proof',
            'eyebrow' => 'Case studies',
            'title'   => 'MVP case studies and outcomes',
            'intro'   => 'We have helped founders across different industries go from idea to working MVP and beyond. These examples show how we approach SaaS, platforms and operational products.',

            'cases'   => [
                [
                    'key'         => 'urlcrop',
                    'label'       => 'URLCrop – Link management and analytics',
                    'badge'       => 'SaaS MVP',
                    'description' => 'From concept to multi tenant SaaS platform for short links, QR codes and campaign analytics, running on a modern Laravel and React stack.',
                    'stack'       => 'Laravel, React, Tailwind, PostgreSQL, Redis.',
                    'outcome'     => 'Deployed to production with subscription billing and team workspaces.',
                    'impact'      => 'Enabled founders to validate pricing and usage patterns across multiple regions.',
                    'link_label'  => 'Read the URLCrop story',
                    'link_href'   => '/case-studies/urlcrop/',
                ],
                [
                    'key'         => 'netzur',
                    'label'       => 'Netzur – ISP operations platform',
                    'badge'       => 'B2B SaaS MVP',
                    'description' => 'End to end MVP for managing internet service providers: customer onboarding, plans, billing, support tickets and network monitoring.',
                    'stack'       => 'Laravel, Vue or React, Tailwind, MySQL.',
                    'outcome'     => 'Deployed to early ISPs with multi tenant architecture and role based access.',
                    'impact'      => 'Significant reduction in manual work and better visibility into revenue and churn.',
                    'link_label'  => 'View Netzur case study',
                    'link_href'   => '/case-studies/netzur/',
                ],
                [
                    'key'         => 'limospro',
                    'label'       => 'LimosPro – Limousine booking platform',
                    'badge'       => 'Web and mobile MVP',
                    'description' => 'MVP for a chauffeur and limousine business, covering fleet management, bookings, driver app and customer communication workflows.',
                    'stack'       => 'Laravel, Flutter, REST APIs, admin dashboards.',
                    'outcome'     => 'Launched production ready MVP used daily by operations teams.',
                    'impact'      => 'Faster booking cycles and better utilisation of fleet resources.',
                    'link_label'  => 'Explore LimosPro details',
                    'link_href'   => '/case-studies/limospro/',
                ],
            ],

            'summary_note' => 'Beyond these flagship products, QalbIT has collaborated with founders on fintech, HR, field operations, education and logistics MVPs. Many of these are under NDA and cannot be named publicly, but they follow the same structured approach and clean engineering practices.',
        ],

        // S7 – Tech stack and delivery capabilities
        'tech' => [
            'id'      => 'mvp-tech',
            'eyebrow' => 'Tech stack',
            'title'   => 'Tech stack and delivery capabilities',
            'intro'   => 'We combine a modern, battle tested technology stack with pragmatic engineering practices so your MVP ships quickly without blocking future scale. Our team is comfortable leading the stack decisions, or aligning fully with your existing architecture.',

            'categories' => [
                [
                    'key'         => 'backend',
                    'label'       => 'Backend and APIs',
                    'description' => 'Robust, secure backends and APIs powering your SaaS, web and mobile MVPs.',
                    'items'       => ['PHP', 'Laravel', 'Node.js', 'REST', 'GraphQL'],
                ],
                [
                    'key'         => 'frontend',
                    'label'       => 'Web frontends',
                    'description' => 'Fast, accessible interfaces with component libraries aligned to your brand.',
                    'items'       => ['React', 'Next.js', 'Vue', 'Tailwind CSS'],
                ],
                [
                    'key'         => 'mobile',
                    'label'       => 'Mobile apps',
                    'description' => 'Cross platform mobile MVPs with shared code and native feeling experiences.',
                    'items'       => ['Flutter', 'Android', 'iOS'],
                ],
                [
                    'key'         => 'infra',
                    'label'       => 'Infrastructure and data',
                    'description' => 'Deployments, observability and storage tuned for the MVP stage and beyond.',
                    'items'       => ['MySQL', 'PostgreSQL', 'Redis', 'AWS', 'DigitalOcean'],
                ],
            ],

            'note' => 'Headquartered in Ahmedabad, India, we deliver MVPs for founders across India, the UK, Europe and the Middle East. You can explore our full technology stack and service lines to see how we support your roadmap.',
        ],

        // S8 – Why QalbIT
        'why' => [
            'id'      => 'mvp-why',
            'eyebrow' => 'Why QalbIT',
            'title'   => 'Why QalbIT for your Startup MVP',
            'intro'   => 'You are not just buying engineering hours. You are partnering with a founder led team that has designed, built and scaled real SaaS and product MVPs. We care about clean execution, long term maintainability and your ability to raise, sell and grow on top of the code we ship.',

            'reasons' => [
                [
                    'key'         => 'product-first',
                    'label'       => 'Product first, not just code first',
                    'description' => 'We think in terms of activation, retention, revenue and operational impact, not only tickets and pull requests.',
                    'points'      => [
                        'We help prioritise your MVP scope by impact and risk, not by wish list.',
                        'We recommend the simplest architecture that can prove your thesis.',
                    ],
                ],
                [
                    'key'         => 'founder-led',
                    'label'       => 'Founder led engagement and clear ownership',
                    'description' => 'As a founder led company, you work directly with decision makers, not a rotating cast of anonymous developers.',
                    'points'      => [
                        'Direct involvement from senior leadership for scope, architecture and critical decisions.',
                        'Stable squads who stay on your account instead of constant resource shuffling.',
                    ],
                ],
                [
                    'key'         => 'clean-code',
                    'label'       => 'Clean code you own from day one',
                    'description' => 'You fully own your IP, code and infrastructure. We set up repositories, environments and documentation so you can continue with us or any other team without lock in.',
                    'points'      => [
                        'IP and source code transfer clearly defined in our agreements.',
                        'Readable, testable code with sensible conventions and documentation.',
                    ],
                ],
                [
                    'key'         => 'communication',
                    'label'       => 'Transparent communication and time zone overlap',
                    'description' => 'We keep you in the loop through weekly demos, async updates and shared tools, with comfortable overlap for the UK, Europe and Middle East.',
                    'points'      => [
                        'Clear sprint plans, progress updates and risk flags.',
                        'Communication via Slack or Teams, Jira or ClickUp and regular video calls.',
                    ],
                ],
                [
                    'key'         => 'long-term',
                    'label'       => 'Long term partnership, NDAs and security',
                    'description' => 'Many of our MVP clients continue with us for years for v2, v3 and new product lines. We sign NDAs, follow secure coding practices and treat your roadmap as confidential.',
                    'points'      => [
                        'Standard NDAs and IP clauses to protect your idea and implementation.',
                        'Secure repositories, access control and environment separation for staging and production.',
                    ],
                ],
            ],

            'testimonials' => [
                [
                    'quote'       => 'QalbIT behaved like an internal product team, not an outsourced vendor. They challenged our ideas, simplified scope and shipped the MVP on the timeline we needed.',
                    'attribution' => 'Founder, SaaS startup in the United Kingdom',
                ],
                [
                    'quote'       => 'We moved to QalbIT after a difficult freelancer experience. They stabilised the codebase, rewrote critical parts and got us to a stable launch.',
                    'attribution' => 'Co founder, operations platform in the Middle East',
                ],
                [
                    'quote'       => 'Their documentation and handover made it easy for our internal team to continue after the MVP phase without surprises.',
                    'attribution' => 'CTO, product company in Europe',
                ],
            ],
        ],

        // S10 – Final CTA band
        'final_cta' => [
            'id'              => 'mvp-final-cta',
            'eyebrow'         => 'Next steps',
            'title'           => 'Ready to talk about your Startup MVP?',
            'body'            => 'Share where you are today, what you want to launch and by when. We will walk you through how QalbIT can support you as your startup MVP development partner, with clear timelines, budget ranges and next steps.',

            'primary_label'   => 'Schedule a discovery call',
            'primary_url'     => 'https://calendly.com/abidhusain-qalbit/discuss-project',
            'primary_aria'    => 'Schedule a Startup MVP discovery call with QalbIT',

            'secondary_label' => 'Or email us at sales@qalbit.com',
            'secondary_url'   => 'mailto:sales@qalbit.com',
            'secondary_aria'  => 'Email the QalbIT team about your Startup MVP',

            'meta'            => 'Typically we respond within 24–48 hours with clarifying questions and next steps.',
        ],
    ],

    'product-scaling' => [
        'slug'  => 'product-scaling',
        'name'  => 'Product Scaling Team',
        'label' => 'Product Scaling Team',

        // SEO and template
        'h1'               => 'Product Scaling Team for SaaS and Software Products',
        'meta_title'       => 'Product Scaling Team for SaaS and Software Products – QalbIT',
        'meta_description' => 'QalbIT provides a dedicated Product Scaling Team to help SaaS and software companies stabilise, optimise and scale existing products. Strengthen your product development practices, increase release velocity and improve reliability with a founder led engineering squad in India.',
        'template'         => 'pages/process/product-scaling',

        // FAQ meta (for schema etc.)
        'faq_key'      => 'faq_process_product_scaling',
        'faq_title'    => 'Frequently asked questions about Product Scaling Teams with QalbIT',
        'faq_subtitle' => 'These are the questions founders, product leaders and CTOs usually ask when they explore QalbIT as their long term product scaling team.',
        'faq_bullets'  => [
            '✓ When it makes sense to bring in a Product Scaling Team and what the first 30–90 days look like.',
            '✓ How we work with your existing engineers, codebase, tools and release processes without disrupting what already works.',
            '✓ Typical engagement lengths, budget ranges and what you can expect in terms of stability, velocity and ownership.',
        ],

        // S1 – Hero
        'hero' => [
            'id'            => 'product-scaling-hero',
            'eyebrow'       => 'Product scaling team',
            'breadcrumb'    => 'Product Scaling Team',
            'kicker_prefix' => 'Process',
            'kicker_label'  => 'Product scaling team',
            'kicker_detail' => 'Scale product development',

            'title'     => 'Product Scaling Team for <span class="text-gradient-brand-animated">SaaS and software products</span>.',
            'highlight' => 'SaaS and software products',
            'intro'     => 'QalbIT provides a dedicated Product Scaling Team that stabilises your existing codebase, increases release velocity and helps you ship reliable features on a predictable cadence. Ideal for SaaS and software products that already have users and now need mature engineering practices to grow further.',

            'bullets' => [
                'SaaS founders with a live product who need a stable engineering squad to scale responsibly.',
                'Product leaders facing long backlogs, slow release cycles and mounting customer expectations.',
                'CTOs and tech leads who want a trusted product development team in India without losing technical control.',
            ],

            'primary_cta' => [
                'label' => 'Discuss your product scaling needs',
                'href'  => '#product-scaling-final-cta',
            ],
            'secondary_cta' => [
                'label' => 'See product scaling case studies',
                'href'  => '#product-scaling-proof',
            ],

            'internal_links' => [
                [
                    'label' => 'Explore our services',
                    'href'  => '/services/',
                ],
                [
                    'label' => 'View case studies',
                    'href'  => '/case-studies/',
                ],
                [
                    'label' => 'Contact our team',
                    'href'  => '/contact-us/',
                ],
            ],

            'trust' => [
                'rating_label' => '5.0/5',
                'rating_text'  => 'rating from SaaS and product leaders',
                'sources'      => ['Clutch', 'Upwork', 'Google Reviews'],
                'location'     => 'Based in Ahmedabad, India, working with SaaS, product and enterprise teams in the UK, Europe, Middle East and beyond.',
            ],

            'snapshot' => [
                'title' => 'Product scaling snapshot',
                'items' => [
                    [
                        'label' => 'Release cadence',
                        'value' => 'Every 2–3 weeks',
                        'note'  => 'Typical after the first stabilisation phase.',
                    ],
                    [
                        'label' => 'Incidents reduced',
                        'value' => '40–60%',
                        'note'  => 'Drop in critical production issues for many teams.',
                    ],
                    [
                        'label' => 'Squad shape',
                        'value' => 'Backend · Frontend · QA · DevOps',
                        'note'  => null,
                    ],
                    [
                        'label' => 'Typical engagement length',
                        'value' => '6–18 months',
                        'note'  => 'Designed for long term product scaling, not one off projects.',
                    ],
                ],
            ],
        ],

        // S2 – Who it is for & signals you need a Product Scaling Team
        'fit' => [
            'id'      => 'product-scaling-fit',
            'eyebrow' => 'Who it is for',
            'title'   => 'Built for teams with a live product that needs to scale',
            'intro'   => 'QalbIT partners with SaaS founders, product leaders and CTOs who already have users in production, but feel that engineering capacity, stability or delivery practices are holding growth back. Our Product Scaling Team plugs into your environment and helps you scale product development without losing control.',

            'personas' => [
                [
                    'key'       => 'saas-founder',
                    'label'     => 'SaaS founder or CEO',
                    'situation' => 'You have paying customers, growing demand and a clear roadmap, but feature delivery is slow, quality issues keep coming back and you are constantly pulled into technical firefighting.',
                    'help'      => 'We provide a small, stable product scaling squad that owns day to day engineering, reduces incidents and ships roadmap items while you focus on customers, sales and strategy.',
                ],
                [
                    'key'       => 'product-leader',
                    'label'     => 'Product manager or head of product',
                    'situation' => 'You look after product strategy and stakeholder expectations, but the backlog keeps growing and the current team cannot deliver at the speed or quality you need.',
                    'help'      => 'We turn your roadmap into a realistic delivery plan, improve collaboration between product and engineering and ensure that each sprint results in usable, measurable increments.',
                ],
                [
                    'key'       => 'cto-tech-lead',
                    'label'     => 'CTO or technical lead',
                    'situation' => 'You own the architecture and internal team, but need additional capacity and disciplined engineering practices from a product development team in India that respects your standards.',
                    'help'      => 'We work inside your repositories and tools, follow your review process and take responsibility for specific modules or streams, from refactoring and performance to new features.',
                ],
                [
                    'key'       => 'ops-owner',
                    'label'     => 'Operations or business owner',
                    'situation' => 'You rely on an internal platform or custom software that is critical to operations, but performance problems, bugs and missing features are limiting growth.',
                    'help'      => 'We stabilise the system, put monitoring and release discipline in place and then work through the roadmap so your teams can rely on the product every day.',
                ],
            ],

            'problems_title' => 'Signals that you are ready for a Product Scaling Team',
            'problems'       => [
                'Frequent production incidents, regressions or performance issues that distract your team from roadmap work.',
                'A growing feature backlog with stakeholders frustrated about slow or unpredictable release cycles.',
                'An existing codebase that only a few people fully understand, making changes risky and stressful.',
                'Limited automated testing, monitoring or CI/CD, so every release feels like a high risk event.',
                'Pressure to expand into new markets, platforms or integrations without enough engineering capacity.',
                'Difficulty hiring and retaining senior engineers who can own both technical and product outcomes.',
            ],
        ],

        // S3 – Product scaling capabilities / services
        'services' => [
            'id'      => 'product-scaling-services',
            'eyebrow' => 'What we take ownership of',
            'title'   => 'Product scaling capabilities our team brings in',
            'intro'   => 'Our Product Scaling Team focuses on the parts of engineering that matter most once you already have a live product: stability, performance, predictable delivery and continuous improvement. We work as an integrated product development team rather than a ticket only vendor.',

            'items' => [
                [
                    'key'         => 'roadmap-delivery',
                    'label'       => 'Feature roadmap delivery',
                    'description' => 'Plan and deliver feature releases in small, reviewable increments with clear acceptance criteria, demos and impact tracking.',
                    'link_label'  => 'See our custom software services',
                    'link_href'   => '/services/custom-software-development/',
                ],
                [
                    'key'         => 'refactoring-debt',
                    'label'       => 'Refactoring and technical debt reduction',
                    'description' => 'Identify and refactor critical parts of the codebase so new features can be added safely without constant regressions.',
                    'link_label'  => 'Learn about legacy modernisation',
                    'link_href'   => '/services/custom-software-development/',
                ],
                [
                    'key'         => 'performance-scale',
                    'label'       => 'Performance and scalability improvements',
                    'description' => 'Optimise queries, caching, queues and infrastructure to handle higher traffic, larger datasets and more demanding workloads.',
                    'link_label'  => 'Browse our technology stack',
                    'link_href'   => '/technologies/',
                ],
                [
                    'key'         => 'reliability-ops',
                    'label'       => 'Reliability, monitoring and incident response',
                    'description' => 'Introduce logging, metrics, alerting and run books so you can detect, respond to and prevent production issues more effectively.',
                    'link_label'  => 'Talk about reliability engineering',
                    'link_href'   => '/contact-us/?topic=reliability',
                ],
                [
                    'key'         => 'devops-ci',
                    'label'       => 'DevOps, CI/CD and release automation',
                    'description' => 'Set up or improve pipelines, environments and deployment strategies so releases are frequent, reversible and less stressful.',
                    'link_label'  => 'See how we handle deployments',
                    'link_href'   => '/services/custom-software-development/',
                ],
                [
                    'key'         => 'integrations-apis',
                    'label'       => 'Integrations and API expansion',
                    'description' => 'Design and extend APIs, webhooks and third party integrations that connect your product to CRMs, billing, analytics and external systems.',
                    'link_label'  => 'Explore API development',
                    'link_href'   => '/services/api-development/',
                ],
                [
                    'key'         => 'frontend-cleanup',
                    'label'       => 'Frontend cleanup and UX refinement',
                    'description' => 'Modernise UI components, improve consistency with your design system and remove friction in key user journeys.',
                    'link_label'  => 'View UX design services',
                    'link_href'   => '/services/ux-design-services/',
                ],
                [
                    'key'         => 'maintenance-enhancements',
                    'label'       => 'Maintenance and small enhancements',
                    'description' => 'Handle bug fixes, small improvements and operational requests so your internal team can focus on strategic initiatives.',
                    'note'        => 'Many clients start with a stabilisation and scaling phase, then continue with us as an ongoing product development team.',
                ],
            ],

            'note' => 'We deliver product scaling work from Ahmedabad, India, partnering with SaaS and software companies across India, the UK, Europe and the Middle East who need a mature engineering team without building a large in house department immediately.',
        ],

        // S4 – Product scaling process
        'process' => [
            'id'      => 'product-scaling-process',
            'eyebrow' => 'How we work together',
            'title'   => 'A practical process for scaling your existing product',
            'intro'   => 'Our process for product scaling starts with understanding your current reality: codebase, team, users and business goals. From there we stabilise the foundation, set up a predictable delivery rhythm and keep improving performance and reliability while shipping new value.',

            'steps' => [
                [
                    'step'        => 1,
                    'kicker'      => 'Codebase and product health review',
                    'title'       => 'Audit your current product, architecture and delivery setup',
                    'description' => 'We review your repositories, environments, deployment process, monitoring and backlog. The goal is to understand what is working, what is fragile and what is blocking faster delivery.',
                    'outputs'     => 'Health report with key risks, quick wins and a prioritised list of technical and product improvements.',
                ],
                [
                    'step'        => 2,
                    'kicker'      => 'Roadmap and priorities alignment',
                    'title'       => 'Align on product goals and a realistic delivery plan',
                    'description' => 'We work with founders, product and technology leaders to align on objectives, must ship initiatives and constraints, then create a roadmap that balances new features with stabilisation work.',
                    'outputs'     => 'Shared roadmap, high level milestones and an initial 6–12 week delivery plan.',
                ],
                [
                    'step'        => 3,
                    'kicker'      => 'Stabilise and harden',
                    'title'       => 'Stabilise the product so you can move faster safely',
                    'description' => 'We tackle critical bugs, improve test coverage, implement monitoring and harden the deployment process so releases become safer and easier to repeat.',
                    'outputs'     => 'Reduced incident volume, clearer observability and a safer path for frequent releases.',
                ],
                [
                    'step'        => 4,
                    'kicker'      => 'Feature delivery sprints',
                    'title'       => 'Deliver roadmap features on a predictable cadence',
                    'description' => 'Once the foundation is stable, our Product Scaling Team runs regular sprints, shipping features, refactors and improvements with demos, release notes and impact tracking.',
                    'outputs'     => 'Regular feature releases, updated documentation and visibility into what shipped and why.',
                ],
                [
                    'step'        => 5,
                    'kicker'      => 'Performance and scalability',
                    'title'       => 'Improve performance, scalability and cost efficiency',
                    'description' => 'We profile the system, optimise queries and caching, adjust infrastructure and address architectural bottlenecks so the product can handle growth without constant fire drills.',
                    'outputs'     => 'Performance benchmarks, optimisation changes and recommendations for future capacity planning.',
                ],
                [
                    'step'        => 6,
                    'kicker'      => 'Continuous improvement and handover',
                    'title'       => 'Keep improving while sharing knowledge with your team',
                    'description' => 'We embed good practices into your workflows, document critical parts of the system and ensure your internal team can operate and extend the product confidently.',
                    'outputs'     => 'Living documentation, handover materials and a roadmap for the next 6–12 months of product scaling.',
                ],
            ],

            'timeline_note' => 'Most Product Scaling Team engagements run for 6–18 months, with visible improvements in stability and delivery speed usually appearing in the first 6–12 weeks.',
        ],

        // S5 – Engagement models and budget guidance
        'engagements' => [
            'id'      => 'product-scaling-engagements',
            'eyebrow' => 'Engagement models',
            'title'   => 'Engagement models and budget guidance for product scaling',
            'intro'   => 'Different products and teams need different levels of support. We structure our Product Scaling Team engagements so you can start with a focused stabilisation phase and then grow into a long term partnership if it makes sense.',

            'models' => [
                [
                    'key'          => 'stabilise-sprint',
                    'label'        => 'Stabilise and refactor sprint',
                    'badge'        => '4–8 weeks',
                    'duration'     => '4–8 weeks',
                    'description'  => 'A focused engagement to review the codebase, fix critical issues, introduce basic monitoring and address high risk areas that block faster delivery.',
                    'best_for'     => 'Teams who feel their product is fragile and want a safer foundation before investing in major features.',
                    'budget_range' => '₹3L–₹7L (USD 4–9K), depending on codebase size and critical issues.',
                    'deliverables' => 'Health report, stabilisation changes, monitoring setup and recommendations for the next phase.',
                ],
                [
                    'key'          => 'core-squad',
                    'label'        => 'Core Product Scaling Squad',
                    'badge'        => '6–18 months',
                    'duration'     => '6–18 months',
                    'description'  => 'A stable squad of backend, frontend, QA and DevOps engineers working as your long term product development team.',
                    'best_for'     => 'SaaS and software products with an active roadmap and the need for predictable feature delivery and improvements.',
                    'budget_range' => 'Monthly retainer tailored to squad size and seniority, often comparable to 2–4 full time engineers in total.',
                    'deliverables' => 'Ongoing feature delivery, refactoring, performance work and shared ownership of product health.',
                ],
                [
                    'key'          => 'feature-pod',
                    'label'        => 'Feature or module pod',
                    'badge'        => '3–9 months',
                    'duration'     => '3–9 months',
                    'description'  => 'A compact pod that owns specific modules, integrations or strategic initiatives while your core team focuses on other priorities.',
                    'best_for'     => 'Teams with a clear roadmap but limited in house capacity to tackle new modules or integrations.',
                    'budget_range' => 'Monthly rate per pod based on scope, typically lighter than a full scaling squad.',
                    'deliverables' => 'Module or feature ownership from design to deployment, with documentation and handover.',
                ],
                [
                    'key'          => 'embedded-devs',
                    'label'        => 'Embedded developers',
                    'badge'        => 'Flexible',
                    'duration'     => 'Flexible',
                    'description'  => 'Experienced engineers embedded directly into your team, following your ceremonies, tools and code standards while still backed by QalbIT processes.',
                    'best_for'     => 'CTOs who want to extend their internal team with senior engineers without long hiring cycles.',
                    'budget_range' => 'Monthly rate per engineer, tuned by seniority and commitment.',
                    'deliverables' => 'Additional capacity aligned to your sprint plan with shared KPIs and continuous knowledge transfer.',
                ],
            ],

            'note' => 'Before any engagement starts we share a clear proposal that covers scope, assumptions, timelines, team composition and commercial terms so you understand exactly how your product scaling budget will be used.',
        ],

        // S6 – Case studies and outcomes
        'proof' => [
            'id'      => 'product-scaling-proof',
            'eyebrow' => 'Case studies',
            'title'   => 'Real products, scaled and hardened with QalbIT',
            'intro'   => 'We are often brought in after an initial launch or a challenging first build. These examples show how our Product Scaling Team helped stabilise, extend and professionalise existing products.',

            'cases' => [
                [
                    'key'         => 'urlcrop',
                    'label'       => 'URLCrop – Link management and analytics',
                    'badge'       => 'SaaS product scaling',
                    'description' => 'Multi tenant link management SaaS covering short links, QR codes and campaign analytics. QalbIT helped move from early MVP to a more robust, scalable platform.',
                    'stack'       => 'Laravel, React, Tailwind, PostgreSQL, Redis.',
                    'outcome'     => 'Improved performance, clearer multi tenant architecture and smoother subscription billing flows.',
                    'impact'      => 'Enabled the founders to grow usage across regions while maintaining a predictable release cadence.',
                    'link_label'  => 'Read the URLCrop story',
                    'link_href'   => '/case-studies/urlcrop/',
                ],
                [
                    'key'         => 'netzur',
                    'label'       => 'Netzur – ISP operations platform',
                    'badge'       => 'B2B SaaS scaling',
                    'description' => 'Operations platform for internet service providers handling onboarding, billing, tickets and network data. QalbIT refined modules and improved reliability as customer count grew.',
                    'stack'       => 'Laravel, Vue or React, Tailwind, MySQL.',
                    'outcome'     => 'Stronger role based access, better reporting and a more resilient deployment process for live ISPs.',
                    'impact'      => 'Reduced manual work and downtime, with clearer visibility into revenue and churn.',
                    'link_label'  => 'View Netzur case study',
                    'link_href'   => '/case-studies/netzur/',
                ],
                [
                    'key'         => 'limospro',
                    'label'       => 'LimosPro – Limousine booking platform',
                    'badge'       => 'Web and mobile product scaling',
                    'description' => 'Platform for limousine bookings with operations dashboards and driver apps. QalbIT continued development after initial launch to improve stability and add features.',
                    'stack'       => 'Laravel, Flutter, REST APIs, admin dashboards.',
                    'outcome'     => 'More reliable booking flows, better driver experience and stronger operational reporting.',
                    'impact'      => 'Helped operations teams handle more bookings with fewer manual interventions.',
                    'link_label'  => 'Explore LimosPro details',
                    'link_href'   => '/case-studies/limospro/',
                ],
            ],

            'summary_note' => 'Alongside these products, our Product Scaling Team has supported fintech, HR, field operations, education and logistics platforms. Many engagements are under NDA, but they follow the same pattern: stabilise, scale and deliver features with clean engineering practices.',
        ],

        // S7 – Tech stack and delivery practices
        'tech' => [
            'id'      => 'product-scaling-tech',
            'eyebrow' => 'Tech stack and delivery',
            'title'   => 'Tech stack and delivery practices for product scaling',
            'intro'   => 'Scaling an existing product is not only about adding more code. It requires the right stack, observability and disciplined delivery practices. We combine modern tools with pragmatic engineering so your team can move faster without losing control.',

            'categories' => [
                [
                    'key'         => 'backend',
                    'label'       => 'Backend and APIs',
                    'description' => 'Strong, maintainable backends that can evolve as your product grows.',
                    'items'       => ['PHP', 'Laravel', 'Node.js', 'REST APIs', 'GraphQL', 'Background workers and queues'],
                ],
                [
                    'key'         => 'frontend',
                    'label'       => 'Web frontends',
                    'description' => 'Responsive, accessible interfaces aligned with your brand and design system.',
                    'items'       => ['React', 'Next.js', 'Vue', 'Blade', 'Tailwind CSS', 'Component', 'Design Systems'],
                ],
                [
                    'key'         => 'mobile',
                    'label'       => 'Mobile and cross platform',
                    'description' => 'Mobile apps where they are part of the product experience or operations.',
                    'items'       => ['Flutter', 'Native Android and iOS integrations', 'REST and GraphQL backends'],
                ],
                [
                    'key'         => 'infra',
                    'label'       => 'Infrastructure, data and observability',
                    'description' => 'Deployment and monitoring setups tuned for production workloads.',
                    'items'       => ['MySQL', 'PostgreSQL', 'Redis', 'AWS', 'DigitalOcean', 'CI/CD pipelines', 'Logging and metrics'],
                ],
                [
                    'key'         => 'quality',
                    'label'       => 'Quality and delivery',
                    'description' => 'Practices that keep your product reliable while you ship frequently.',
                    'items'       => ['Automated tests', 'Code reviews', 'Staging environments', 'Feature flags', 'Gradual rollouts', 'Rollback strategies'],
                ],
            ],

            'note' => 'Headquartered in Ahmedabad, India, we work with your existing stack and tools wherever practical, or introduce improvements step by step instead of forcing a risky full rewrite.',
        ],

        // S8 – Why QalbIT
        'why' => [
            'id'      => 'product-scaling-why',
            'eyebrow' => 'Why QalbIT',
            'title'   => 'Why QalbIT as your Product Scaling Team',
            'intro'   => 'You are not just looking for more hands. You are looking for a Product Scaling Team that understands your users, roadmap and architecture, and that can own delivery while respecting your standards. QalbIT combines product thinking, senior engineering and long term partnership.',

            'reasons' => [
                [
                    'key'         => 'product-first',
                    'label'       => 'Product first, not ticket factory',
                    'description' => 'We measure success in terms of stability, adoption, retention and revenue impact, not just tickets closed.',
                    'points'      => [
                        'We help you prioritise roadmap items, refactors and performance work by business impact.',
                        'We recommend pragmatic solutions that move metrics instead of chasing unnecessary complexity.',
                    ],
                ],
                [
                    'key'         => 'founder-led',
                    'label'       => 'Founder led engagement and stable squads',
                    'description' => 'You work with a founder led team where senior people stay close to the work and decisions.',
                    'points'      => [
                        'Direct involvement from senior leadership on architecture, staffing and critical decisions.',
                        'Small, stable squads assigned to your product rather than constant resource rotation.',
                    ],
                ],
                [
                    'key'         => 'respect-existing',
                    'label'       => 'Respect for your existing team and codebase',
                    'description' => 'We collaborate with your internal team, standards and tooling rather than trying to replace everything on day one.',
                    'points'      => [
                        'We start with a careful audit and propose phased improvements instead of a risky full rewrite.',
                        'We share context, documentation and decision logs so everyone understands why changes are made.',
                    ],
                ],
                [
                    'key'         => 'clean-code',
                    'label'       => 'Clean, documented code you fully own',
                    'description' => 'Your company owns the source code, repositories and infrastructure. We treat your product as a long term asset.',
                    'points'      => [
                        'Clear IP and source code ownership defined in agreements from the start.',
                        'Readable, testable code with conventions and documentation that future engineers can understand.',
                    ],
                ],
                [
                    'key'         => 'communication',
                    'label'       => 'Clear communication and time zone overlap',
                    'description' => 'We are used to working with teams in the UK, Europe and the Middle East with comfortable overlap for collaboration.',
                    'points'      => [
                        'Weekly demos and async updates so stakeholders always know what is in progress and what shipped.',
                        'Use of tools such as Slack or Teams, Jira or ClickUp and regular video calls for decision making.',
                    ],
                ],
                [
                    'key'         => 'long-term',
                    'label'       => 'Long term partnership, NDAs and security',
                    'description' => 'Many clients stay with us through multiple product phases. We treat your roadmap and data as confidential.',
                    'points'      => [
                        'Standard NDAs and IP clauses to protect your product and customer data.',
                        'Secure repositories, access control and environment separation for staging and production.',
                    ],
                ],
            ],

            'testimonials' => [
                [
                    'quote'       => 'QalbIT helped us move from constant firefighting to a predictable release rhythm. The Product Scaling Team behaves like an extension of our in house engineers.',
                    'attribution' => 'CTO, B2B SaaS company in Europe',
                ],
                [
                    'quote'       => 'They joined after our first launch, stabilised the system and then kept delivering new features without breaking what was already working.',
                    'attribution' => 'Founder, operations platform in the Middle East',
                ],
                [
                    'quote'       => 'Their documentation and handover meant that new engineers could join the project and be productive quickly, which was not the case before.',
                    'attribution' => 'Head of Product, SaaS company in the United Kingdom',
                ],
            ],
        ],

        // S10 – Final CTA band
        'final_cta' => [
            'id'      => 'product-scaling-final-cta',
            'eyebrow' => 'Next steps',
            'title'   => 'Ready to talk about scaling your product?',
            'body'    => 'Share where your product is today, what challenges you are facing and what you want the next 6–12 months to look like. We will walk you through how QalbIT can support you with a dedicated Product Scaling Team, including timelines, budget ranges and next steps.',

            'primary_label' => 'Schedule a product scaling call',
            'primary_url'   => 'https://calendly.com/abidhusain-qalbit/discuss-project',
            'primary_aria'  => 'Schedule a Product Scaling Team discovery call with QalbIT',

            'secondary_label' => 'Or email us at sales@qalbit.com',
            'secondary_url'   => 'mailto:sales@qalbit.com',
            'secondary_aria'  => 'Email the QalbIT team about scaling your product',

            'meta' => 'Typically we respond within 24–48 hours with clarifying questions and a suggested starting approach.',
        ],
    ],

    'digital-transformation' => [
        'slug'       => 'digital-transformation',
        'name'       => 'Digital Transformation',
        'label'      => 'Digital Transformation',

        // SEO and template
        'h1'               => 'Digital Transformation Consulting & Software Partner',
        'meta_title'       => 'Digital Transformation Services & Software Partner – QalbIT',
        'meta_description' => 'QalbIT is a digital transformation company helping SMEs and mid-market businesses replace spreadsheets and legacy systems with integrated web, mobile and cloud platforms. From discovery and roadmaps to pilots, rollout and long-term support, we act as your hands-on digital transformation partner.',
        'template'         => 'pages/process/digital-transformation',

        // FAQ meta (for schema etc.)
        'faq_key'      => 'faq_process_digital_transformation',
        'faq_title'    => 'Frequently asked questions about Digital Transformation with QalbIT',
        'faq_subtitle' => 'These are the questions operations leaders, CIOs and business owners usually ask when they explore digital transformation programs and software modernisation with QalbIT.',
        'faq_bullets'  => [
            '✓ How we approach digital transformation in practical phases – discovery, roadmap, pilots and rollout – instead of risky big-bang projects.',
            '✓ Typical timelines, budget ranges and engagement models for digital transformation work, including discovery engagements, pilots and multi-phase programs.',
            '✓ How we handle legacy systems, data migration, integrations, security, NDAs and collaboration with your internal IT or product teams.',
        ],

        // S1 – Hero
        'hero' => [
            'id'            => 'dt-hero',
            'eyebrow'       => 'Digital transformation',
            'breadcrumb'    => 'Digital Transformation',
            'kicker_prefix' => 'Services',
            'kicker_label'  => 'Digital transformation',
            'kicker_detail' => 'Strategy · Software · Change',

            'title'     => 'Digital Transformation Partner for <span class="text-gradient-brand-animated">Modern, Software-Driven Businesses</span>.',
            'highlight' => 'Modern, software-driven businesses',
            'intro'     => 'QalbIT helps SMEs, mid-market companies and business units move from spreadsheets and disconnected tools to integrated web, mobile and cloud platforms. We combine product thinking, operations insight and solid engineering to make digital transformation practical, phased and measurable.',

            'bullets' => [
                'Business owners and MDs who want systems that match how their company actually runs.',
                'COOs and operations leaders who need to eliminate manual work and gain real-time visibility.',
                'CIOs, CTOs and IT leaders who must modernise legacy systems without breaking day-to-day operations.',
            ],

            'primary_cta' => [
                'label' => 'Discuss your transformation roadmap',
                'href'  => '#dt-final-cta',
            ],
            'secondary_cta' => [
                'label' => 'See transformation case studies',
                'href'  => '#dt-proof',
            ],

            'internal_links' => [
                [
                    'label' => 'Explore our services',
                    'href'  => '/services/',
                ],
                [
                    'label' => 'View case studies',
                    'href'  => '/case-studies/',
                ],
                [
                    'label' => 'Contact our team',
                    'href'  => '/contact-us/',
                ],
            ],

            'trust' => [
                'rating_label' => '5.0/5',
                'rating_text'  => 'rating from product and operations leaders',
                'sources'      => ['Clutch', 'Upwork', 'Google Reviews'],
                'location'     => 'Headquartered in Ahmedabad, India, working with clients across India, the UK, Europe and the Middle East.',
            ],

            'snapshot' => [
                'title' => 'Digital transformation snapshot',
                'items' => [
                    [
                        'label' => 'Primary focus',
                        'value' => 'From manual to integrated',
                        'note'  => 'Workflows, data and reporting.',
                    ],
                    [
                        'label' => 'Typical clients',
                        'value' => 'SMEs & mid-market',
                        'note'  => 'Including units inside enterprises.',
                    ],
                    [
                        'label' => 'Core stack',
                        'value' => 'Laravel · React · Integrations',
                        'note'  => null,
                    ],
                    [
                        'label' => 'Engagement pattern',
                        'value' => 'Discovery → pilot → phased rollout',
                        'note'  => 'Designed to reduce risk and keep operations running.',
                    ],
                ],
            ],
        ],

        // S2 – Who it is for & problems we solve
        'fit' => [
            'id'       => 'dt-fit',
            'eyebrow'  => 'Who it is for',
            'title'    => 'For leaders who need software to catch up with the business',
            'intro'    => 'QalbIT supports organisations that have outgrown spreadsheets, legacy tools and manual processes. We partner with business and IT leaders to design and deliver digital transformation programs that people actually adopt.',

            'personas' => [
                [
                    'key'       => 'business-owner',
                    'label'     => 'Business owner or managing director',
                    'situation' => 'You know the business is held back by scattered tools, paperwork and manual approvals, but you do not have the internal product and engineering capacity to fix it.',
                    'help'      => 'We map your current processes, prioritise pain points and design a phased transformation roadmap that fits your budget and risk appetite.',
                ],
                [
                    'key'       => 'operations-lead',
                    'label'     => 'COO or operations lead',
                    'situation' => 'You are responsible for throughput, quality and customer experience, yet data is fragmented across spreadsheets, email and disconnected systems.',
                    'help'      => 'We build internal tools, dashboards and automation that give your team a single source of truth and cut down on repetitive work.',
                ],
                [
                    'key'       => 'it-lead',
                    'label'     => 'CIO, CTO or IT manager',
                    'situation' => 'You own a legacy stack and multiple vendors, and you need a pragmatic engineering partner who can modernise systems without disrupting daily operations.',
                    'help'      => 'We assess your current systems, propose modern architectures and deliver new modules, integrations or full replacements in controlled phases.',
                ],
                [
                    'key'       => 'functional-head',
                    'label'     => 'Functional head (Finance, HR, Sales)',
                    'situation' => 'Your team struggles with manual reporting, double data entry and limited visibility into performance.',
                    'help'      => 'We design and implement software and reporting that streamline your workflows and give you reliable, on-demand data.',
                ],
            ],

            'problems_title' => 'Common digital transformation problems we help solve',
            'problems'       => [
                'Critical processes running on spreadsheets, email threads and shared drives.',
                'Multiple systems that do not talk to each other, forcing manual data entry and reconciliation.',
                'Legacy applications that are slow, fragile and difficult to change or integrate.',
                'Previous “digital transformation” attempts that stalled due to unclear scope or poor adoption.',
                'Limited reporting and analytics, making it hard to see what is happening across the business.',
                'Unclear ownership between business and IT, leading to missed timelines and misaligned expectations.',
            ],
        ],

        // S3 – Digital transformation services & capabilities
        'services' => [
            'id'      => 'dt-services',
            'eyebrow' => 'What we deliver',
            'title'   => 'Digital transformation services and capabilities',
            'intro'   => 'We combine consulting, product thinking and hands-on engineering to design and implement digital transformation programs that turn manual, fragmented workflows into integrated, software-driven operations.',

            'items' => [
                [
                    'key'         => 'process-discovery',
                    'label'       => 'Process discovery and systems audit',
                    'description' => 'Workshops, stakeholder interviews and system reviews to map how work really happens today, where data lives and where the biggest risks and opportunities are.',
                    'link_label'  => 'Discuss a discovery engagement',
                    'link_href'   => '/contact-us/?topic=digital-transformation-discovery',
                ],
                [
                    'key'         => 'roadmap-design',
                    'label'       => 'Transformation roadmap and solution design',
                    'description' => 'Future-state process design, solution architecture and a pragmatic roadmap that sequences pilots, integrations and platform work into manageable phases.',
                    'link_label'  => 'Explore custom software services',
                    'link_href'   => '/services/custom-software-development/',
                ],
                [
                    'key'         => 'internal-tools',
                    'label'       => 'Custom internal tools and platforms',
                    'description' => 'Web applications and internal portals that centralise workflows for operations, finance, logistics, HR and other teams, replacing spreadsheets and ad hoc tools.',
                    'link_label'  => 'See web application development',
                    'link_href'   => '/services/web-application-development/',
                ],
                [
                    'key'         => 'integrations-automation',
                    'label'       => 'System integrations and workflow automation',
                    'description' => 'APIs, webhooks and background jobs that connect CRMs, ERPs, accounting tools and third-party services, reducing manual data entry and errors.',
                    'link_label'  => 'View our technology stack',
                    'link_href'   => '/technologies/',
                ],
                [
                    'key'         => 'analytics-reporting',
                    'label'       => 'Analytics, dashboards and reporting',
                    'description' => 'Role-based dashboards, KPIs and exports that give leaders and teams real-time visibility into operations, revenue and customer experience.',
                    'link_label'  => 'Talk about reporting needs',
                    'link_href'   => '/contact-us/?topic=analytics-reporting',
                ],
                [
                    'key'         => 'legacy-modernisation',
                    'label'       => 'Legacy modernisation and re-platforming',
                    'description' => 'Gradual replacement or refactoring of legacy on-premise or desktop systems into modern web, mobile or cloud-native solutions.',
                    'link_label'  => 'Learn about legacy modernisation',
                    'link_href'   => '/services/custom-software-development/?topic=legacy-modernisation',
                ],
                [
                    'key'         => 'change-support',
                    'label'       => 'Change support, training and handover',
                    'description' => 'Training, documentation and rollout support so teams adopt new systems and internal IT can own and extend them over time.',
                    'note'        => 'We plan change management alongside the software build, not as an afterthought.',
                ],
            ],

            'note' => 'We deliver digital transformation projects from Ahmedabad, India, partnering with organisations across India, the UK, Europe and the Middle East.',
        ],

        // S4 – Our digital transformation process
        'process' => [
            'id'      => 'dt-process',
            'eyebrow' => 'How we work',
            'title'   => 'A practical digital transformation process from mapping to rollout',
            'intro'   => 'Our process breaks digital transformation into clear, reviewable stages so business and IT stay aligned, risks are surfaced early and teams can see progress in working software – not just slide decks.',

            'steps' => [
                [
                    'step'        => 1,
                    'kicker'      => 'Current-state discovery',
                    'title'       => 'Current-state discovery and process mapping',
                    'description' => 'We map key processes, systems, data flows and pain points with stakeholders across the business, capturing both formal and informal ways work happens.',
                    'outputs'     => 'Process maps, system inventory, pain point list and high-level opportunity areas.',
                ],
                [
                    'step'        => 2,
                    'kicker'      => 'Future-state design',
                    'title'       => 'Future-state design and transformation roadmap',
                    'description' => 'We define the target operating model, prioritise use cases and design a transformation roadmap that sequences pilots, platform work and integrations.',
                    'outputs'     => 'Future-state process design, solution concepts, phased roadmap and initial estimates.',
                ],
                [
                    'step'        => 3,
                    'kicker'      => 'Pilot / proof of concept',
                    'title'       => 'Pilot or proof-of-concept build',
                    'description' => 'We build a focused pilot solution – an internal tool, integration or portal – to validate the approach with real users and data.',
                    'outputs'     => 'Working pilot in a controlled environment, feedback backlog and refined roadmap.',
                ],
                [
                    'step'        => 4,
                    'kicker'      => 'Rollout and change',
                    'title'       => 'Phased rollout and change management',
                    'description' => 'We roll out solutions in phases across teams or locations, with training, communication and support tuned to your organisation.',
                    'outputs'     => 'Rollout plan, training materials, go-live checklists and adoption metrics.',
                ],
                [
                    'step'        => 5,
                    'kicker'      => 'Optimisation & automation',
                    'title'       => 'Optimisation, automation and analytics',
                    'description' => 'After initial rollout we streamline workflows further, add automation and improve analytics based on usage data and feedback.',
                    'outputs'     => 'Improved workflows, automation backlog, refined dashboards and reports.',
                ],
                [
                    'step'        => 6,
                    'kicker'      => 'Long-term partnership',
                    'title'       => 'Long-term support and continuous improvement',
                    'description' => 'We can stay on as a product and engineering partner, or hand over cleanly to your internal team with documentation and support options.',
                    'outputs'     => 'Support model, documented systems, knowledge transfer and longer-term roadmap.',
                ],
            ],

            'timeline_note' => 'Digital transformation timelines vary based on scope, but most of our clients start with a 3–6 week discovery and roadmap phase followed by pilots and phased rollouts over several months. We structure each phase so you can validate outcomes before committing to the next.',
        ],

        // S5 – Engagement models and budget guidance
        'engagements' => [
            'id'      => 'dt-engagements',
            'eyebrow' => 'Engagement models',
            'title'   => 'Engagement models and program structure',
            'intro'   => 'We keep our engagement models transparent so you understand scope, responsibilities and budget at each phase of your digital transformation program.',

            'models' => [
                [
                    'key'          => 'discovery-roadmap',
                    'label'        => 'Discovery & roadmap engagement',
                    'badge'        => '3–6 weeks',
                    'duration'     => '3–6 weeks',
                    'description'  => 'A structured engagement to map processes, audit systems and define a practical digital transformation roadmap with prioritised initiatives.',
                    'best_for'     => 'Organisations starting their digital transformation journey or rebooting a stalled initiative.',
                    'budget_range' => '₹2L–₹5L (USD 3–7K), depending on number of processes and locations.',
                    'deliverables' => 'Discovery findings, process maps, future-state design, roadmap and high-level estimates.',
                ],
                [
                    'key'          => 'pilot-project',
                    'label'        => 'Pilot project',
                    'badge'        => '8–12+ weeks',
                    'duration'     => '8–12+ weeks',
                    'description'  => 'A focused build of one high-impact solution – such as an internal tool, portal or integration – to prove value and refine the wider program.',
                    'best_for'     => 'Teams that have a clear priority area and want a working reference implementation before scaling.',
                    'budget_range' => '₹6L–₹18L (USD 8–25K), based on scope and integrations.',
                    'deliverables' => 'Production-ready pilot with staging/production environments, training and rollout plan.',
                ],
                [
                    'key'          => 'multi-phase-program',
                    'label'        => 'Multi-phase transformation program',
                    'badge'        => '6–18 months',
                    'duration'     => '6–18 months',
                    'description'  => 'A structured series of projects covering multiple processes, systems and teams, delivered by a stable QalbIT squad.',
                    'best_for'     => 'Growing companies and business units with a clear transformation mandate and committed sponsorship.',
                    'budget_range' => 'Program-level budget agreed per phase with clear milestones and governance.',
                    'deliverables' => 'Sequenced releases, integrated platforms, adoption metrics and ongoing optimisation.',
                ],
                [
                    'key'          => 'product-squad',
                    'label'        => 'Dedicated product & engineering squad',
                    'badge'        => 'Ongoing',
                    'duration'     => 'Ongoing, month-to-month',
                    'description'  => 'A cross-functional squad that works as an extension of your internal teams to deliver roadmap items, integrations and optimisation work on a continuous basis.',
                    'best_for'     => 'Organisations that want predictable capacity and long-term partnership without building a large in-house team immediately.',
                    'budget_range' => 'Monthly retainer aligned to a blended team of engineers, QA and product capacity.',
                    'deliverables' => 'Continuous delivery against a shared roadmap with agreed KPIs and governance.',
                ],
            ],

            'note' => 'Before any engagement starts, we share a clear proposal covering assumptions, scope boundaries, timelines, team composition and budget so you understand exactly how your digital transformation investment will be used.',
        ],

        // S6 – Digital transformation case studies and outcomes
        'proof' => [
            'id'      => 'dt-proof',
            'eyebrow' => 'Case studies',
            'title'   => 'Digital transformation case studies and outcomes',
            'intro'   => 'We have worked with clients in manufacturing, services and technology to modernise their operations and core systems. These examples highlight how we approach digital transformation with measurable outcomes.',

            'cases' => [
                [
                    'key'         => 'manufacturing-erp',
                    'label'       => 'Manufacturing ERP & inventory platform',
                    'badge'       => 'Digital transformation',
                    'description' => 'Designed and built a browser-based ERP to replace spreadsheets and on-premise tooling for production planning, inventory and dispatch.',
                    'stack'       => 'Laravel, React or Blade, Tailwind, MySQL.',
                    'outcome'     => 'Unified view of orders, stock and production status across departments.',
                    'impact'      => 'Reduced manual reconciliation, fewer stock-outs and faster month-end closing.',
                    'link_label'  => 'View manufacturing case highlights',
                    'link_href'   => '/case-studies/manufacturing-erp/',
                ],
                [
                    'key'         => 'service-operations',
                    'label'       => 'Service operations and field management',
                    'badge'       => 'Operations platform',
                    'description' => 'Built a web and mobile platform for managing service requests, technician visits, SLAs and billing for a growing services company.',
                    'stack'       => 'Laravel, Flutter, REST APIs, admin dashboards.',
                    'outcome'     => 'End-to-end visibility into tickets and field activity with automated notifications and reports.',
                    'impact'      => 'Improved response times, higher first-time fix rates and better customer satisfaction.',
                    'link_label'  => 'Explore service operations story',
                    'link_href'   => '/case-studies/service-operations-platform/',
                ],
                [
                    'key'         => 'finance-automation',
                    'label'       => 'Finance, billing and approvals automation',
                    'badge'       => 'Process automation',
                    'description' => 'Implemented workflows and integrations to streamline invoicing, approvals and collections, replacing manual spreadsheets and email chains.',
                    'stack'       => 'Laravel, integrations with accounting/ERP systems, reporting dashboards.',
                    'outcome'     => 'Faster invoicing cycles, clearer ownership and a real-time view of receivables.',
                    'impact'      => 'Better cash flow predictability and reduced manual workload for finance teams.',
                    'link_label'  => 'See finance automation details',
                    'link_href'   => '/case-studies/finance-automation/',
                ],
            ],

            'summary_note' => 'Alongside these examples, QalbIT has supported digital transformation initiatives in logistics, HR, education and field operations. Many of these are under NDA but follow the same principles: phased delivery, measurable outcomes and maintainable software.',
        ],

        // S7 – Tech stack and delivery capabilities
        'tech' => [
            'id'      => 'dt-tech',
            'eyebrow' => 'Tech stack',
            'title'   => 'Tech stack and platforms for digital transformation',
            'intro'   => 'We choose technologies that fit your existing landscape, internal skills and long-term plans. Our goal is to make your systems more connected, observable and adaptable – not to force a complete rebuild unless it is genuinely needed.',

            'categories' => [
                [
                    'key'         => 'backend-integrations',
                    'label'       => 'Backends, APIs and integrations',
                    'description' => 'Reliable backends and integration layers that connect your core systems, SaaS tools and custom applications.',
                    'items'       => ['PHP', 'Laravel', 'Node.js', 'REST APIs', 'Webhooks', 'Background jobs'],
                ],
                [
                    'key'         => 'frontends-portals',
                    'label'       => 'Web frontends and portals',
                    'description' => 'User-friendly interfaces for staff, partners and customers to work with your systems.',
                    'items'       => ['React', 'Next.js', 'Blade + Tailwind CSS', 'Component libraries'],
                ],
                [
                    'key'         => 'data-analytics',
                    'label'       => 'Data, reporting and analytics',
                    'description' => 'Data models, reporting stores and dashboards that make it easy to understand what is happening in your business.',
                    'items'       => ['MySQL', 'PostgreSQL', 'Reporting databases', 'Custom dashboards'],
                ],
                [
                    'key'         => 'infrastructure-security',
                    'label'       => 'Infrastructure and security',
                    'description' => 'Cloud infrastructure and security practices tuned to your risk profile and compliance needs.',
                    'items'       => ['AWS', 'DigitalOcean', 'CI/CD pipelines', 'Backups', 'Monitoring', 'Access control'],
                ],
            ],

            'note' => 'We are comfortable working in your existing cloud accounts and repositories or setting up greenfield environments that your internal IT team can later own.',
        ],

        // S8 – Why QalbIT
        'why' => [
            'id'      => 'dt-why',
            'eyebrow' => 'Why QalbIT',
            'title'   => 'Why QalbIT for your Digital Transformation',
            'intro'   => 'Digital transformation is not just about new software. It is about changing how work happens day to day. QalbIT combines product thinking, operations understanding and senior engineering so your transformation program stays grounded, adoptable and maintainable.',

            'reasons' => [
                [
                    'key'         => 'ops-product',
                    'label'       => 'Operations and product thinking together',
                    'description' => 'We speak both business and technical language and design solutions around real-world constraints, not idealised process diagrams.',
                    'points'      => [
                        'We involve stakeholders from operations, finance and IT early in discovery and design.',
                        'We measure success with adoption, cycle times and data quality – not just features delivered.',
                    ],
                ],
                [
                    'key'         => 'phased-roadmap',
                    'label'       => 'Phased roadmap instead of big-bang projects',
                    'description' => 'We break large initiatives into pilots and waves so you can validate impact, manage risk and adjust scope as you learn.',
                    'points'      => [
                        'Each phase has clear objectives, metrics and go/no-go gates.',
                        'We prioritise initiatives based on value, complexity and organisational readiness.',
                    ],
                ],
                [
                    'key'         => 'respect-legacy',
                    'label'       => 'Respect for legacy systems and people',
                    'description' => 'We modernise systems thoughtfully, keeping what works and replacing what truly blocks progress.',
                    'points'      => [
                        'We design integrations and migration paths that minimise disruption.',
                        'We involve internal IT and power users so knowledge is preserved and extended.',
                    ],
                ],
                [
                    'key'         => 'transparent-delivery',
                    'label'       => 'Transparent delivery and governance',
                    'description' => 'You get clear visibility into scope, progress and risks through shared tools, demos and structured communication.',
                    'points'      => [
                        'Regular demos, status updates and steering sessions with decision-makers.',
                        'Shared backlog and documentation, with access to code, environments and metrics.',
                    ],
                ],
                [
                    'key'         => 'security-longterm',
                    'label'       => 'Security, NDAs and long-term partnership',
                    'description' => 'We treat your data, processes and roadmap as confidential and design systems for the long term, not just the launch.',
                    'points'      => [
                        'NDAs, IP clauses and access controls aligned with your policies.',
                        'Option to retain QalbIT as a long-term product and engineering partner beyond the first program.',
                    ],
                ],
            ],

            'testimonials' => [
                [
                    'quote'       => 'QalbIT helped us move from manual processes and spreadsheets to a system our teams actually use every day. The phased approach meant there were no surprises.',
                    'attribution' => 'COO, mid-market services company in the Middle East',
                ],
                [
                    'quote'       => 'They understood both our legacy stack and our future goals, and proposed a roadmap that we could execute without overwhelming the organisation.',
                    'attribution' => 'CIO, manufacturing company in India',
                ],
                [
                    'quote'       => 'Their documentation and handover made it easy for our internal IT team to take ownership after the first phase.',
                    'attribution' => 'Head of IT, European business unit',
                ],
            ],
        ],

        // S9 – Final CTA band
        'final_cta' => [
            'id'              => 'dt-final-cta',
            'eyebrow'         => 'Next steps',
            'title'           => 'Ready to talk about Digital Transformation?',
            'body'            => 'Share where your organisation is today, which processes hurt the most and what outcomes you want to see. We will review your situation, outline practical options and propose a phased digital transformation approach that fits your budget and timelines.',

            'primary_label'   => 'Schedule a discovery call',
            'primary_url'     => 'https://calendly.com/abidhusain-qalbit/discuss-project',
            'primary_aria'    => 'Schedule a digital transformation discovery call with QalbIT',

            'secondary_label' => 'Or email us at sales@qalbit.com',
            'secondary_url'   => 'mailto:sales@qalbit.com',
            'secondary_aria'  => 'Email the QalbIT team about your digital transformation project',

            'meta'            => 'Typically we respond within 24–48 hours with clarifying questions and next steps.',
        ],
    ],

    'engagement-model' => [
        'slug'  => 'engagement-model',
        'name'  => 'Engagement Models',
        'label' => 'Engagement models',

        // SEO and template
        'h1'               => 'Software Development Engagement Models',
        'meta_title'       => 'Software Development Engagement Models – Fixed Cost, Time & Material, Dedicated Team',
        'meta_description' => 'Compare QalbIT’s software development engagement models – fixed cost projects, time & material and dedicated product squads. See when to use each engagement model, how budgets work and how we start new engagements.',
        'template'         => 'pages/process/engagement-model',

        // FAQ meta (for schema etc.)
        'faq_key'      => 'faq_process_engagement_models',
        'faq_title'    => 'Frequently asked questions about software development engagement models with QalbIT',
        'faq_subtitle' => 'These are the questions founders, CTOs, operations and procurement teams usually ask when they compare fixed cost, time & material and dedicated team engagement models.',
        'faq_bullets'  => [
            '✓ How fixed cost, time & material and dedicated team models work in practice at QalbIT.',
            '✓ When we recommend each engagement model based on scope clarity, timelines, risk and internal capacity.',
            '✓ How budgets, billing, communication and change requests are handled under each engagement model.',
        ],

        // S1 – Hero
        'hero' => [
            'id'            => 'engagement-hero',
            'eyebrow'       => 'Engagement models',
            'breadcrumb'    => 'Engagement models',
            'kicker_prefix' => 'Process',
            'kicker_label'  => 'Engagement models',
            'kicker_detail' => 'Fixed cost · Time & material · Dedicated team',

            'title'     => 'Software Development Engagement Models for <span class="text-gradient-brand-animated">Custom Software &amp; SaaS Projects</span>.',
            'highlight' => 'Custom Software & SaaS Projects',
            'intro'     => 'QalbIT offers clear, battle tested engagement models for custom software, SaaS and digital transformation work. Whether you prefer fixed scope, flexible capacity or a long term product squad, we shape the engagement around your goals, risk profile and budget.',

            'bullets' => [
                'Founders and business owners who want cost clarity and predictable delivery before committing to a build.',
                'CTOs and product leaders who need reliable capacity but want to keep architectural and technical decisions in their hands.',
                'Procurement and finance teams comparing offshore software development engagement models and vendor options.',
            ],

            'primary_cta' => [
                'label' => 'Talk through the right engagement model',
                'href'  => '#engagement-final-cta',
            ],
            'secondary_cta' => [
                'label' => 'See example projects',
                'href'  => '#engagement-proof',
            ],

            'internal_links' => [
                [
                    'label' => 'View custom software services',
                    'href'  => '/services/custom-software-development/',
                ],
                [
                    'label' => 'Explore Startup MVP development',
                    'href'  => '/process/start-up-mvp/',
                ],
                [
                    'label' => 'See product scaling teams',
                    'href'  => '/process/product-scaling/',
                ],
                [
                    'label' => 'Contact our team',
                    'href'  => '/contact-us/',
                ],
            ],

            'trust' => [
                'rating_label' => '5.0/5',
                'rating_text'  => 'rating from long term software clients',
                'sources'      => ['Clutch', 'Upwork', 'Google Reviews'],
                'location'     => 'Headquartered in Ahmedabad, India, partnering with clients across India, the UK, Europe and the Middle East.',
            ],

            'snapshot' => [
                'title' => 'Engagement snapshot',
                'items' => [
                    [
                        'label' => 'Core models',
                        'value' => '3+',
                        'note'  => 'Fixed cost, time & material, dedicated squads.',
                    ],
                    [
                        'label' => 'Typical initial term',
                        'value' => '8–12 weeks',
                        'note'  => 'For project based engagements.',
                    ],
                    [
                        'label' => 'Retainer duration',
                        'value' => '3–12 months',
                        'note'  => 'For product squads and dedicated teams.',
                    ],
                    [
                        'label' => 'Regions served',
                        'value' => 'India, UK, Europe, Middle East',
                        'note'  => 'Comfortable overlap with your time zone.',
                    ],
                ],
            ],
        ],

        // S2 – Who it is for & problems we solve
        'fit' => [
            'id'      => 'engagement-fit',
            'eyebrow' => 'Who this is for',
            'title'   => 'Designed for teams who care how software work is structured, not just what gets built',
            'intro'   => 'The right engagement model depends on how clear your scope is, how fast you need to move and how much internal capacity you have. This page is for decision makers who want transparency on cost, responsibilities and risk before they commit to a build.',

            'personas' => [
                [
                    'key'       => 'founder-owner',
                    'label'     => 'Founder or business owner',
                    'situation' => 'You are responsible for the outcome and the budget, and you want to avoid open ended engagements or surprise invoices.',
                    'help'      => 'We explain engagement models in plain language, share realistic budget ranges and outline what you can expect at each stage, so you can make confident decisions.',
                ],
                [
                    'key'       => 'cto-product-lead',
                    'label'     => 'CTO, head of engineering or product lead',
                    'situation' => 'You own the roadmap and architecture, but you need reliable external capacity without losing control or compromising quality.',
                    'help'      => 'We align with your stack and standards, use your workflows where needed and agree upfront who owns architecture, reviews and releases under each engagement model.',
                ],
                [
                    'key'       => 'ops-non-technical',
                    'label'     => 'Operations or non technical sponsor',
                    'situation' => 'You need better systems or automation but do not want to manage a large in house engineering team or chase multiple vendors.',
                    'help'      => 'We propose engagement models that fit your internal bandwidth, communication style and reporting needs so you can stay focused on running the business.',
                ],
                [
                    'key'       => 'procurement-finance',
                    'label'     => 'Procurement or finance',
                    'situation' => 'You compare vendors and contracts, and need clarity on risk, billing and how change requests are handled.',
                    'help'      => 'We document how each engagement model works in contracts and SOWs, including assumptions, change control and what is included or excluded in the agreed fees.',
                ],
            ],

            'problems_title' => 'Common engagement problems we help you avoid',
            'problems'       => [
                'Vague proposals and open ended contracts that make it hard to predict total spend.',
                'Engagement models that do not match the clarity of scope – leading to delays or rework.',
                'Vendors saying “yes” to everything without explaining trade offs or risks.',
                'Teams surprised by how change requests, bug fixes or new ideas are billed.',
                'Lack of transparency on who owns what – scope, architecture, QA, releases and support.',
            ],
        ],

        // S3 – Work we typically do under each model
        'services' => [
            'id'      => 'engagement-services',
            'eyebrow' => 'Where engagement models apply',
            'title'   => 'Software work we usually structure through these engagement models',
            'intro'   => 'Each engagement model can support different kinds of work. We help you map your needs to a model that keeps delivery predictable while leaving room for learning and change.',

            'items' => [
                [
                    'key'         => 'project-builds',
                    'label'       => 'End to end project builds',
                    'description' => 'Greenfield products, platform rebuilds or defined modules with clear functional scope and timelines.',
                    'models'      => ['Fixed cost', 'Hybrid fixed + T&amp;M'],
                ],
                [
                    'key'         => 'product-squads',
                    'label'       => 'Ongoing product development',
                    'description' => 'Roadmap execution, iterative feature delivery and technical optimisation for live products.',
                    'models'      => ['Time &amp; material', 'Product squad retainer'],
                ],
                [
                    'key'         => 'support-maintenance',
                    'label'       => 'Support, maintenance & optimisation',
                    'description' => 'Bug fixing, small enhancements, dependency upgrades and performance work for existing systems.',
                    'models'      => ['Time &amp; material', 'Dedicated team'],
                ],
                [
                    'key'         => 'discovery-consulting',
                    'label'       => 'Discovery, audits and proofs of concept',
                    'description' => 'Short, focused engagements to clarify scope, validate ideas or audit existing systems before a larger build.',
                    'models'      => ['Fixed scope discovery', 'Short T&amp;M sprints'],
                ],
            ],

            'note' => 'If your situation spans multiple areas – for example a rebuild plus ongoing product work – we often propose a hybrid engagement, starting with a fixed or semi fixed phase and then moving into a retainer or dedicated team.',
        ],

        // S4 – How we structure an engagement
        'process' => [
            'id'      => 'engagement-process',
            'eyebrow' => 'How we work',
            'title'   => 'A practical engagement process from first call to long term partnership',
            'intro'   => 'Regardless of the model you choose, we follow a clear process so you know what is happening, who is responsible and how decisions are made.',

            'steps' => [
                [
                    'step'        => 1,
                    'kicker'      => 'Discovery & context',
                    'title'       => 'Understand your goals, constraints and current state',
                    'description' => 'We review your product or idea, existing systems, team structure, timelines, risks and budget expectations.',
                    'outputs'     => 'Shared understanding of objectives, constraints and initial scope candidates.',
                ],
                [
                    'step'        => 2,
                    'kicker'      => 'Model recommendation',
                    'title'       => 'Propose the right engagement model or hybrid',
                    'description' => 'We map your needs to fixed cost, time & material, a product squad retainer or a hybrid, explaining pros, cons and cost implications.',
                    'outputs'     => 'Documented recommendation with assumptions, sample team composition and budget ranges.',
                ],
                [
                    'step'        => 3,
                    'kicker'      => 'SOW & onboarding',
                    'title'       => 'Agree scope, responsibilities and cadence',
                    'description' => 'We prepare a statement of work, define roles on both sides, setup tools, repos and environments and confirm communication rhythm.',
                    'outputs'     => 'Signed SOW and MSA, onboarding checklist, kick off call and first sprint or milestone plan.',
                ],
                [
                    'step'        => 4,
                    'kicker'      => 'Delivery & reporting',
                    'title'       => 'Deliver work in sprints or milestones',
                    'description' => 'The team ships features or tasks in small increments, with demos, progress reports and clear visibility into hours, scope and risks.',
                    'outputs'     => 'Completed milestones or sprints, demo recordings, burn down / burn up views and updated backlog.',
                ],
                [
                    'step'        => 5,
                    'kicker'      => 'Review & adjust',
                    'title'       => 'Review outcomes and adjust engagement if needed',
                    'description' => 'We run regular reviews to evaluate delivery, budget burn, roadmap changes and whether the current model is still the best fit.',
                    'outputs'     => 'Agreed improvements, potential scope adjustments and – where useful – a shift to a different or hybrid engagement model.',
                ],
                [
                    'step'        => 6,
                    'kicker'      => 'Long term partnership',
                    'title'       => 'Plan for the next quarter and beyond',
                    'description' => 'For long running engagements, we move into quarterly planning so you have predictable capacity and clear priorities.',
                    'outputs'     => 'Quarterly roadmap, updated team composition and aligned expectations on velocity and outcomes.',
                ],
            ],

            'timeline_note' => 'Short discovery or audit engagements usually run for 1–3 weeks, while project builds and product squads typically run for 8–12 weeks or more depending on scope.',
        ],

        // S5 – Engagement models deep dive
        'engagements' => [
            'id'      => 'engagement-models',
            'eyebrow' => 'Engagement models',
            'title'   => 'Fixed cost, time & material and dedicated team models – the details',
            'intro'   => 'Each engagement model has trade offs around scope flexibility, budget predictability and speed. We help you choose the model that best fits your stage, risk tolerance and internal capacity.',

            'models' => [
                [
                    'key'          => 'fixed-cost',
                    'label'        => 'Fixed Cost (Fixed Scope) Projects',
                    'badge'        => 'Clear scope & deadlines',
                    'duration'     => 'Typically 8–16 weeks',
                    'description'  => 'A defined scope, timeline and price for a project or phase. Best when we can stabilise requirements upfront and the goal is to deliver a specific outcome on a specific date.',
                    'best_for'     => 'Discovery projects, well defined MVPs, clearly bounded modules or redesigns with limited moving parts.',
                    'budget_range' => 'Budget agreed per phase or project based on detailed scope and assumptions.',
                    'billing'      => 'Milestone based billing tied to discovery, design, build and launch checkpoints.',
                    'change_control' => 'Changes are logged, estimated and agreed as additional scope or moved into a later phase.',
                ],
                [
                    'key'          => 'time-material',
                    'label'        => 'Time & Material (T&amp;M)',
                    'badge'        => 'Evolving scope & priorities',
                    'duration'     => 'From 4 weeks to multi quarter',
                    'description'  => 'You pay for the actual time the team spends delivering agreed priorities. Best when scope is evolving or when you want flexibility to re order work based on feedback.',
                    'best_for'     => 'Products in active discovery, roadmaps that change frequently, maintenance and optimisation work.',
                    'budget_range' => 'Monthly or sprint based budgets with agreed capacity and rates per role.',
                    'billing'      => 'Invoiced on actual time spent, with timesheets and reports aligned to sprints or calendar months.',
                    'change_control' => 'Scope is managed through backlog refinement and sprint planning rather than change requests.',
                ],
                [
                    'key'          => 'product-squad',
                    'label'        => 'Product Squad Retainer / Dedicated Team',
                    'badge'        => 'Product squad',
                    'duration'     => '3–12+ months',
                    'description'  => 'A stable cross functional squad (or dedicated engineers) working as an extension of your team on a long term roadmap.',
                    'best_for'     => 'Scaling products, multi quarter initiatives, organisations that want predictable capacity without full in house hiring.',
                    'budget_range' => 'Monthly retainer based on squad size and seniority (for example, a mix of senior and mid level engineers).',
                    'billing'      => 'Fixed monthly fee for an agreed team and availability, reviewed quarterly as needs evolve.',
                    'change_control' => 'Roadmap and priorities are revisited in regular planning sessions; we can scale the squad up or down with notice.',
                ],
            ],

            'note' => 'Hybrid engagements are common – for example, starting with a fixed cost discovery or v1 build, then moving to a time &amp; material or product squad model for ongoing evolution once the product is in market.',
        ],

        // S6 – Case studies & examples
        'proof' => [
            'id'      => 'engagement-proof',
            'eyebrow' => 'Case studies',
            'title'   => 'How engagement models play out in real projects',
            'intro'   => 'These examples show how different engagement models map to real world software initiatives and why we recommended each approach.',

            'cases' => [
                [
                    'key'         => 'fixed-cost-erp',
                    'label'       => 'ERP module rollout on a fixed cost basis',
                    'badge'       => 'Fixed cost project',
                    'description' => 'A manufacturing client needed a defined set of ERP modules delivered before their financial year end. We scoped a fixed price project with clear milestones and a limited change window.',
                    'stack'       => 'Laravel, REST APIs, MySQL, Tailwind.',
                    'outcome'     => 'Modules delivered and accepted on schedule, with a follow up T&amp;M engagement for enhancements.',
                    'impact'      => 'Improved inventory visibility and faster monthly closing without overshooting the original budget.',
                ],
                [
                    'key'         => 'tm-product-roadmap',
                    'label'       => 'Evolving SaaS roadmap on time & material',
                    'badge'       => 'Time &amp; material',
                    'description' => 'A B2B SaaS company needed help executing a changing roadmap driven by customer feedback and sales. Scope changed frequently as new opportunities emerged.',
                    'stack'       => 'Laravel or NestJS backend, React or Next.js frontend, PostgreSQL.',
                    'outcome'     => 'Steady stream of releases every 2–3 weeks, with visibility into hours spent and value delivered per sprint.',
                    'impact'      => 'Higher feature throughput and better alignment between product, sales and engineering without locking into a rigid scope.',
                ],
                [
                    'key'         => 'dedicated-squad',
                    'label'       => 'Dedicated product squad for a growing platform',
                    'badge'       => 'Product squad retainer',
                    'description' => 'A growing platform engaged a dedicated QalbIT squad (backend, frontend and QA) to work alongside their CTO on a multi quarter roadmap.',
                    'stack'       => 'Modern PHP or Node.js backend, React or Vue UI, CI/CD pipelines, cloud infrastructure.',
                    'outcome'     => 'Stable velocity, shared ownership of architecture and a predictable monthly budget.',
                    'impact'      => 'Faster delivery of strategic features and less reliance on ad hoc hiring or short term freelancers.',
                ],
            ],

            'summary_note' => 'Names and some details are simplified for confidentiality, but the engagement patterns and trade offs are typical of how we work with long term clients.',
        ],

        // S7 – Collaboration, tooling & governance
        'tech' => [
            'id'      => 'engagement-tech',
            'eyebrow' => 'Collaboration & tooling',
            'title'   => 'Tooling, communication and governance that support any engagement model',
            'intro'   => 'Good engagement models are backed by clear communication, reliable tooling and sensible governance. We keep our approach lightweight but disciplined so you always know what is happening.',

            'categories' => [
                [
                    'key'         => 'communication',
                    'label'       => 'Communication & ceremonies',
                    'description' => 'Regular calls and async updates tuned to your time zone and team structure.',
                    'items'       => [
                        'Weekly sprints',
                        'Biweekly demos',
                        'Sprint planning',
                        'Slack updates',
                        'Teams updates',
                        'Email updates',
                        'Decision log',
                        'Architecture notes',
                        'Scope changes',
                    ],
                ],
                [
                    'key'         => 'project-tracking',
                    'label'       => 'Project tracking & visibility',
                    'description' => 'Tools that give you real time visibility into status, priorities and effort.',
                    'items'       => [
                        'Jira boards',
                        'ClickUp boards',
                        'Project boards',
                        'Tagged backlog',
                        'Priority tags',
                        'Time tracking',
                        'Sprint reports',
                        'Budget reports',
                        'Milestone tracking',
                    ],
                ],
                [
                    'key'         => 'code-quality',
                    'label'       => 'Code, environments & quality',
                    'description' => 'Healthy engineering practices regardless of how the work is billed.',
                    'items'       => [
                        'Git workflow',
                        'Feature branches',
                        'Pull requests',
                        'Staging envs',
                        'Smoke tests',
                        'Regression tests',
                        'Monitoring',
                        'Error logging',
                        'Uptime alerts',
                    ],
                ],
            ],

            'note' => 'We are happy to work in your existing tools and repos where it makes sense, or we can propose a lightweight stack if you are starting from scratch.',
        ],

        // S8 – Why QalbIT for engagement models
        'why' => [
            'id'      => 'engagement-why',
            'eyebrow' => 'Why QalbIT',
            'title'   => 'Why teams trust QalbIT with long term software engagements',
            'intro'   => 'You are not just choosing an engagement model – you are choosing a partner. Our goal is to make it easy for you to understand how work is structured, where your money goes and how we share responsibility for outcomes.',

            'reasons' => [
                [
                    'key'         => 'transparency',
                    'label'       => 'Transparency on scope, cost and trade offs',
                    'description' => 'We explain the pros and cons of each engagement model in your context instead of pushing a single way of working.',
                    'points'      => [
                        'Clear proposals with assumptions, inclusions and exclusions spelled out.',
                        'Honest conversations when scope, risk or priorities change.',
                    ],
                ],
                [
                    'key'         => 'founder-led',
                    'label'       => 'Founder led oversight & stable squads',
                    'description' => 'You work with a compact, senior team, not a constantly rotating bench of anonymous developers.',
                    'points'      => [
                        'Direct access to decision makers for architecture and engagement questions.',
                        'Squads stay on your account over time so they build deep product context.',
                    ],
                ],
                [
                    'key'         => 'ownership',
                    'label'       => 'IP, code and infrastructure you fully own',
                    'description' => 'Everything we build for you – code, scripts, infrastructure definitions – is yours under the agreement.',
                    'points'      => [
                        'Repositories in your organisation or transferred cleanly at the end of the engagement.',
                        'Documentation and handover so you are never locked in to a single vendor.',
                    ],
                ],
                [
                    'key'         => 'security',
                    'label'       => 'Security, NDAs and data handling',
                    'description' => 'We treat your data, roadmap and customer information as confidential by default.',
                    'points'      => [
                        'Standard NDAs, access control and least privilege principles.',
                        'Separate staging and production environments with restricted access.',
                    ],
                ],
            ],

            'testimonials' => [
                [
                    'quote'       => 'QalbIT helped us choose an engagement model that fit our stage and risk tolerance. We always knew what we were paying for and what was coming next.',
                    'attribution' => 'Founder, SaaS product company in Europe',
                ],
                [
                    'quote'       => 'Their clarity on scope and billing made it easy for our finance and procurement teams to approve a multi quarter product squad.',
                    'attribution' => 'Head of Product, mid market company in the Middle East',
                ],
                [
                    'quote'       => 'We started with a fixed cost phase and later moved into a retainer. The transition was smooth and the squad treated our roadmap as their own.',
                    'attribution' => 'CTO, digital platform in the UK',
                ],
            ],
        ],

        // S9 – Final CTA band
        'final_cta' => [
            'id'      => 'engagement-final-cta',
            'eyebrow' => 'Next steps',
            'title'   => 'Ready to choose the right engagement model for your software work?',
            'body'    => 'Share where your product or project is today, what you want to achieve and your internal capacity. We will walk you through how QalbIT would structure the work, which engagement model fits best and what budget and timelines to expect.',

            'primary_label' => 'Schedule an discovery call',
            'primary_url'   => 'https://calendly.com/abidhusain-qalbit/discuss-project',
            'primary_aria'  => 'Schedule an engagement discovery call with QalbIT',

            'secondary_label' => 'Or email us at sales@qalbit.com',
            'secondary_url'   => 'mailto:sales@qalbit.com',
            'secondary_aria'  => 'Email the QalbIT team about engagement models',

            'meta' => 'Typically we respond within 24–48 hours with clarifying questions and a suggested engagement approach.',
        ],
    ],
];
