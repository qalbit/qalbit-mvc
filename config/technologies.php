<?php
return [
    
    'reactjs' => [
        'slug'        => '/technologies/reactjs/',
        'name'        => 'React.js Development',
        'short_name'  => 'React.js',
        'icon'        => '/images/technologies/reactjs.svg',
        'category'    => 'frontend',
        'enabled'     => true,
        'order'       => 10,
        'show_home'   => true,

        'meta_title'       => 'React.js Development Services | QalbIT',
        'meta_description' => 'Build fast, interactive web apps with QalbIT’s React.js development services, from MVPs to complex SaaS frontends.',

        'tagline'   => 'High-performance, component-based frontends built with React.js.',
        'summary'   => 'We use React.js to design and build responsive, high-performance frontends for SaaS, dashboards and product interfaces.',
        
        'faq_key'      => 'reactjs_faq',
        'faq_title'    => 'ReactJS Development – Frequently Asked Questions',
        'faq_subtitle' => 'Clear answers about ReactJS development, migration, performance, and how QalbIT can help.',

        'hero' => [
            'breadcrumb_label' => 'React.js',
            'kicker_prefix'    => 'Technologies',
            'kicker_label'     => 'React.js & Next.js frontends',
            'kicker_detail'    => 'SPAs · Dashboards · Portals',

            'title'     => 'React.js Development for <span class="text-gradient-brand-animated">Dashboards, Portals & SaaS Products</span>.',
            'highlight' => 'Dashboards, Portals & SaaS Products',

            'intro' => 'QalbIT uses React.js and Next.js to build fast, maintainable web interfaces – from customer dashboards and admin portals to multi-tenant SaaS products. We focus on clean state management, predictable data flows and performance so your product feels responsive even as it grows.',

            'primary_cta_label' => 'Discuss your React.js project',
            'primary_cta_href'  => '/contact-us/?topic=reactjs',

            'secondary_cta_label' => 'Book a quick discovery call',
            'secondary_cta_href'  => 'https://calendly.com/abidhusain-qalbit/discuss-project',
        ],

        // Overview (same shape as services)
        'overview' => [
            'id'      => 'react-overview',
            'eyebrow' => 'React.js development overview',

            'title' => 'React.js development services for modern web and SaaS products',
            'intro' => 'We help founders and teams use React.js where it shines – dashboards, portals and web apps that need rich UX, reliable performance and clean integration with your backend.',

            'left_title' => 'When React.js with QalbIT makes sense',
            'left_items' => [
                'You need responsive dashboards, portals or web apps that go beyond basic templates.',
                'Your existing React codebase is hard to maintain and you want to stabilise and refactor it.',
                'You are building or scaling a SaaS product and need a React/Next.js frontend that works well with your APIs.',
                'You prefer a senior, founder-led team that understands both product UX and frontend engineering.',
            ],

            'right_title' => 'Outcomes we typically target with React.js work',
            'right_items' => [
                'Fast, reliable user interfaces that feel responsive on real-world devices and networks.',
                'Cleaner React codebases with better component boundaries and state management.',
                'Frontends that integrate cleanly with REST/GraphQL APIs and existing backends.',
                'A reusable component library and design system that speeds up new features.',
            ],

            'note' => 'For React.js work we usually start with a short discovery and codebase review (if you already have one), then define a practical implementation or refactor plan.',
        ],

        // Capabilities – reusing `service-capabilities` partial is fine
        'capabilities' => [
            'id'      => 'react-capabilities',
            'eyebrow' => 'What we build with React.js',
            'title'   => 'React.js development capabilities across dashboards, portals and SaaS products',
            'intro'   => 'We focus React.js where it provides real leverage – complex UIs, dashboards and web apps that benefit from a rich client-side experience.',

            'items' => [
                [
                    'label'       => 'Product dashboards & admin panels',
                    'description' => 'Operational and admin dashboards with charts, filters and role-based UIs using React.js and modern component libraries.',
                    'badge'       => 'Dashboards',
                    'icon'        => '/images/icons/dashboard.svg',
                ],
                [
                    'label'       => 'Customer & partner portals',
                    'description' => 'Secure login-based portals where customers and partners can manage accounts, data and workflows via React-powered interfaces.',
                    'badge'       => 'Portals',
                    'icon'        => '/images/icons/modules.svg',
                ],
                [
                    'label'       => 'SaaS frontends & onboarding',
                    'description' => 'React.js and Next.js frontends for SaaS products, including onboarding flows, settings pages and subscription/billing screens.',
                    'badge'       => 'SaaS',
                    'icon'        => '/images/icons/api.svg',
                ],
                [
                    'label'       => 'Modernisation of legacy frontends',
                    'description' => 'Rebuild older jQuery or server-rendered interfaces into modern React-based UIs with better performance and maintainability.',
                    'badge'       => 'Modernisation',
                    'icon'        => '/images/icons/architecture.svg',
                ],
            ],

            'cta' => [
                'label' => 'Discuss your React.js frontend scope',
                'url'   => '/contact-us/?topic=reactjs',
            ],
        ],

        // Process (can reuse `service-process.php`)
        'process' => [
            'id'      => 'react-process',
            'eyebrow' => 'How React.js projects work with QalbIT',
            'title'   => 'A practical React.js development process from audit to production',
            'intro'   => 'We keep the React.js process structured but lightweight, so we can stabilise existing UIs or build new ones without surprising you on quality, timeline or budget.',

            'items' => [
                [
                    'step'        => 1,
                    'title'       => 'Discovery & UX/architecture review',
                    'description' => 'Understand your product, current frontend (if any), API layer and goals. Clarify which parts of the UI matter most and where React.js adds the most value.',
                    'duration'    => '1–2 weeks',
                    'outcome'     => 'Documented goals, key screens and a plan for new builds or refactors.',
                    'icon'        => '/images/icons/discovery.svg',
                ],
                [
                    'step'        => 2,
                    'title'       => 'Component & state design',
                    'description' => 'Define component structure, routing and state management patterns (for example React Query, Redux, Zustand) aligned with your API and data needs.',
                    'duration'    => '1–3 weeks',
                    'outcome'     => 'Agreed component architecture and technical blueprint for implementation.',
                    'icon'        => '/images/icons/architecture-design.svg',
                ],
                [
                    'step'        => 3,
                    'title'       => 'Implementation & integration',
                    'description' => 'Build or refactor components, wire them to APIs, handle error/loading states and ensure accessibility and performance basics.',
                    'duration'    => '4–10+ weeks (scope-dependent)',
                    'outcome'     => 'Working React.js frontend in staging or production, integrated with your backend.',
                    'icon'        => '/images/icons/core-modules.svg',
                ],
                [
                    'step'        => 4,
                    'title'       => 'Testing, hardening & rollout',
                    'description' => 'Functional and cross-browser/device testing, performance tuning and gradual rollout to users, with monitoring in place.',
                    'duration'    => '2–4 weeks',
                    'outcome'     => 'Stable frontend with a backlog of improvements based on real usage.',
                    'icon'        => '/images/icons/launch.svg',
                ],
                [
                    'step'        => 5,
                    'title'       => 'Ongoing support & features',
                    'description' => 'Continue iterating on UX, new modules and performance as your product and traffic grow.',
                    'duration'    => 'Ongoing, month-to-month',
                    'outcome'     => 'A React.js UI that stays healthy and evolves with your roadmap.',
                    'icon'        => '/images/icons/scale.svg',
                ],
            ],

            'cta' => [
                'label' => 'Walk me through this process for my React.js app',
                'url'   => '/contact-us/?topic=process-reactjs',
            ],
        ],

        // Use cases – reusing `service-use-cases.php`
        'use_cases' => [
            'id'      => 'react-use-cases',
            'eyebrow' => 'Where React.js is usually the right fit',
            'title'   => 'React.js use cases we most often deliver',
            'intro'   => 'Most of our React.js work is part of full products – SaaS dashboards, admin tools and portals – rather than isolated landing pages.',

            'items' => [
                [
                    'label'       => 'SaaS dashboards and admin areas',
                    'description' => 'Config screens, analytics dashboards and admin interfaces in SaaS products where users spend significant time.',
                    'audience'    => 'SaaS founders and product teams',
                    'badge'       => 'SaaS',
                ],
                [
                    'label'       => 'Customer portals and self-service tools',
                    'description' => 'Login-based web portals where customers can manage accounts, orders, tickets or projects.',
                    'audience'    => 'B2B and B2C businesses',
                    'badge'       => 'Portals',
                ],
                [
                    'label'       => 'Internal tools and operations dashboards',
                    'description' => 'Operational web tools for finance, operations or support teams who need reliable UIs and fast workflows.',
                    'audience'    => 'Internal teams and operations',
                    'badge'       => 'Internal tools',
                ],
                [
                    'label'       => 'Modernisation of older UIs',
                    'description' => 'Rebuilding legacy or jQuery-heavy interfaces into a modern React.js frontend that is easier to extend.',
                    'audience'    => 'Teams with legacy frontends',
                    'badge'       => 'Modernisation',
                ],
            ],

            'cta' => [
                'label' => 'Ask if your product fits these React patterns',
                'url'   => '/contact-us/?topic=use-cases-reactjs',
            ],
        ],

        // Stack – can reuse `service-tech-stack.php`
        'stack' => [
            'id'      => 'react-tech-stack',
            'eyebrow' => 'Tech stack & tooling',
            'title'   => 'React.js stack we typically use at QalbIT',
            'intro'   => 'We usually pair React.js with modern tooling (Next.js, TypeScript, API clients and testing) so your frontend stays maintainable and predictable.',
            'note'    => 'Already have a React.js codebase? We will review your current stack first and only recommend changes where they clearly improve reliability, performance or maintainability.',

            'categories' => [
                [
                    'name'        => 'React.js & frameworks',
                    'description' => 'Core frontend libraries and frameworks.',
                    'items'       => [
                        'React.js with functional components and hooks.',
                        'Next.js (App Router) for SSR, SSG and hybrid rendering where needed.',
                        'TypeScript for safer, more maintainable codebases.',
                    ],
                ],
                [
                    'name'        => 'State, data fetching & forms',
                    'description' => 'Patterns for predictable data flow.',
                    'items'       => [
                        'React Query / TanStack Query for server state management.',
                        'Lightweight global state (Zustand, Context) where appropriate.',
                        'Form handling with libraries like React Hook Form where needed.',
                    ],
                ],
                [
                    'name'        => 'Styling & design systems',
                    'description' => 'How we implement UI consistently.',
                    'items'       => [
                        'Tailwind CSS and component libraries tuned per project.',
                        'Design systems and reusable components shared across screens.',
                        'Responsive layouts with accessibility and performance in mind.',
                    ],
                ],
                [
                    'name'        => 'Tooling, quality & observability',
                    'description' => 'Keeping the frontend healthy in production.',
                    'items'       => [
                        'Linting, formatting and basic automated tests where they add value.',
                        'Error tracking and logging integrated with your wider monitoring.',
                        'CI/CD pipelines for safe, repeatable releases of frontend code.',
                    ],
                ],
            ],
        ],

        // Bottom CTA (can reuse `service-cta.php`)
        'cta' => [
            'enabled' => true,

            'eyebrow' => 'Ready to talk React.js?',
            'title'   => 'Let’s plan your next React.js dashboard, portal or product UI.',
            'body'    => 'Share your current frontend stack, goals and the problems you want to solve. We will review your requirements, look at any existing code and propose a practical React.js plan that matches your stage and budget.',

            'primary_label' => 'Book a React.js discovery call',
            'primary_url'   => '/contact-us/?topic=reactjs-development',
            'primary_aria'  => 'Book a React.js discovery call with QalbIT',

            'secondary_label' => 'Send us your frontend requirements',
            'secondary_url'   => 'https://calendly.com/abidhusain-qalbit/discuss-project',
            'secondary_aria'  => 'Send your React.js frontend requirements to QalbIT',

            'meta' => 'Typically we respond within 24–48 hours with clarifying questions and next steps.',
        ],
    ],

    'nextjs' => [
        'slug'        => '/technologies/nextjs/',
        'name'        => 'Next.js Development',
        'short_name'  => 'Next.js',
        'icon'        => '/images/technologies/nextjs.svg',
        'category'    => 'frontend',
        'enabled'     => true,
        'order'       => 20,
        'show_home'   => true,

        'meta_title'       => 'Next.js Development Services | QalbIT',
        'meta_description' => 'SEO-friendly React and full-stack web apps with QalbIT’s Next.js development services, from high-performing marketing sites to SaaS dashboards.',

        'tagline'   => 'Full-stack React applications with Next.js.',
        'summary'   => 'We use Next.js to build SEO-friendly, performant web applications with hybrid rendering, routing and API integrations for modern products.',

        // FAQ wiring (remember to add `nextjs_faq` in config/faqs.php)
        'faq_key'      => 'nextjs_faq',
        'faq_title'    => 'Next.js Development – Frequently Asked Questions',
        'faq_subtitle' => 'Answers to common questions about Next.js performance, SEO and full-stack app development with QalbIT.',

        'hero' => [
            'breadcrumb_label' => 'Next.js',
            'kicker_prefix'    => 'Technologies',
            'kicker_label'     => 'Next.js & full-stack React',
            'kicker_detail'    => 'SSR · SSG · Hybrid apps',

            'title'     => 'Next.js Development for <span class="text-gradient-brand-animated">SEO-Focused Sites & Full-Stack Apps</span>.',
            'highlight' => 'SEO-Focused Sites & Full-Stack Apps',

            'intro' => 'QalbIT uses Next.js to build fast, SEO-friendly web applications – from marketing sites and content hubs to SaaS dashboards and portals. We combine React with modern Next.js features like App Router, server components and hybrid rendering so your product feels fast and ranks well.',

            'primary_cta_label' => 'Discuss your Next.js project',
            'primary_cta_href'  => '/contact-us/?topic=nextjs',

            'secondary_cta_label' => 'Book a quick discovery call',
            'secondary_cta_href'  => 'https://calendly.com/abidhusain-qalbit/discuss-project',
        ],

        // Overview
        'overview' => [
            'id'      => 'next-overview',
            'eyebrow' => 'Next.js development overview',

            'title' => 'Next.js development services for SEO-driven sites and full-stack products',
            'intro' => 'We help teams use Next.js where it shines – SEO-sensitive websites, content platforms and full-stack React apps that need performance, security and predictable deployments.',

            'left_title' => 'When Next.js with QalbIT makes sense',
            'left_items' => [
                'You want SEO-friendly product or marketing sites that still feel like web apps, not static brochures.',
                'You are building a SaaS product and need a Next.js frontend that works cleanly with your APIs and auth.',
                'You have an existing React/Next.js project that has grown messy and needs structure, performance and DX improvements.',
                'You prefer a team that understands both frontend UX and backend/API constraints, not just “pixel perfect” pages.',
            ],

            'right_title' => 'Outcomes we usually target with Next.js work',
            'right_items' => [
                'Faster page loads, better Core Web Vitals and improved organic search performance.',
                'Clean routing, layouts and data-fetching patterns using modern Next.js (App Router).',
                'Frontends that integrate predictably with REST/GraphQL APIs, headless CMSs and auth providers.',
                'A maintainable codebase that your team can extend without fighting the framework.',
            ],

            'note' => 'For Next.js projects we typically start with a short discovery and, if you already have a codebase, a lightweight audit of routing, data fetching and performance.',
        ],

        // Capabilities
        'capabilities' => [
            'id'      => 'next-capabilities',
            'eyebrow' => 'What we build with Next.js',
            'title'   => 'Next.js development capabilities across sites, portals and SaaS products',
            'intro'   => 'We focus Next.js on projects where SEO, performance and developer experience matter – not just simple one-page sites.',

            'items' => [
                [
                    'label'       => 'SEO-focused marketing & content websites',
                    'description' => 'Product marketing sites, content hubs and documentation portals using hybrid SSG/SSR for strong SEO and fast performance.',
                    'badge'       => 'Marketing & content',
                    'icon'        => '/images/icons/seo.svg',
                ],
                [
                    'label'       => 'SaaS dashboards & web apps with SSR',
                    'description' => 'Next.js-powered SaaS dashboards and applications that use server-side rendering where it makes sense for auth, personalization or SEO.',
                    'badge'       => 'SaaS',
                    'icon'        => '/images/icons/dashboard.svg',
                ],
                [
                    'label'       => 'Headless CMS & API-driven frontends',
                    'description' => 'Frontends for headless CMSs and existing APIs, with clean content modeling and preview flows for marketing teams.',
                    'badge'       => 'Headless CMS',
                    'icon'        => '/images/icons/api.svg',
                ],
                [
                    'label'       => 'Internationalized & multi-region sites',
                    'description' => 'Next.js projects with localisation, regional routing and deployment strategies that keep experiences fast across geographies.',
                    'badge'       => 'Global',
                    'icon'        => '/images/icons/globe.svg',
                ],
            ],

            'cta' => [
                'label' => 'Discuss your Next.js frontend or site',
                'url'   => '/contact-us/?topic=nextjs',
            ],
        ],

        // Process
        'process' => [
            'id'      => 'next-process',
            'eyebrow' => 'How Next.js projects work with QalbIT',
            'title'   => 'A practical Next.js development process from discovery to deployment',
            'intro'   => 'We keep Next.js work structured but pragmatic – so you get the benefits of the framework without over-engineering or surprises on budget and timelines.',

            'items' => [
                [
                    'step'        => 1,
                    'title'       => 'Discovery, SEO & architecture review',
                    'description' => 'Understand your goals, current site or app, traffic patterns and SEO priorities. Map key user journeys, content and integration points.',
                    'duration'    => '1–2 weeks',
                    'outcome'     => 'Agreed goals, high-level architecture and priority pages/flows.',
                    'icon'        => '/images/icons/discovery.svg',
                ],
                [
                    'step'        => 2,
                    'title'       => 'Routing, layouts & data-fetching design',
                    'description' => 'Design the App Router structure, layouts, loading states and data-fetching strategy (SSR, SSG, ISR, client) based on performance and SEO needs.',
                    'duration'    => '1–3 weeks',
                    'outcome'     => 'Documented routing map, component hierarchy and data-loading approach.',
                    'icon'        => '/images/icons/architecture-design.svg',
                ],
                [
                    'step'        => 3,
                    'title'       => 'Implementation & integrations',
                    'description' => 'Build pages, components and API integrations, wire to CMS/auth/providers and handle real-world edge cases like redirects, errors and fallback states.',
                    'duration'    => '4–10+ weeks (scope-dependent)',
                    'outcome'     => 'Working Next.js site or app in staging, integrated with your stack.',
                    'icon'        => '/images/icons/core-modules.svg',
                ],
                [
                    'step'        => 4,
                    'title'       => 'Performance, SEO & launch',
                    'description' => 'Optimise Core Web Vitals, handle redirects, sitemaps and structured data, then coordinate launch with monitoring and analytics in place.',
                    'duration'    => '2–4 weeks',
                    'outcome'     => 'Stable production deployment with SEO and performance baselines.',
                    'icon'        => '/images/icons/launch.svg',
                ],
                [
                    'step'        => 5,
                    'title'       => 'Ongoing optimisation & features',
                    'description' => 'Iterate on content, UX and features as you learn from analytics and user feedback, keeping the Next.js codebase healthy over time.',
                    'duration'    => 'Ongoing, month-to-month',
                    'outcome'     => 'A Next.js app or site that keeps improving as your product and audience grow.',
                    'icon'        => '/images/icons/scale.svg',
                ],
            ],

            'cta' => [
                'label' => 'Walk me through this for my Next.js project',
                'url'   => '/contact-us/?topic=process-nextjs',
            ],
        ],

        // Use cases
        'use_cases' => [
            'id'      => 'next-use-cases',
            'eyebrow' => 'Where Next.js is usually the right fit',
            'title'   => 'Next.js use cases we most often deliver',
            'intro'   => 'Most of our Next.js work is for SEO-sensitive sites and full-stack apps where rendering strategy, performance and developer experience really matter.',

            'items' => [
                [
                    'label'       => 'SEO-focused marketing & product sites',
                    'description' => 'Websites for SaaS products, B2B services and brands where organic traffic and shareable URLs are key acquisition channels.',
                    'audience'    => 'Founders, marketers and product teams',
                    'badge'       => 'Marketing & product',
                ],
                [
                    'label'       => 'SaaS dashboards and authenticated apps',
                    'description' => 'Authenticated Next.js apps with role-based access, dashboards and account areas backed by your APIs and auth provider.',
                    'audience'    => 'SaaS and platform teams',
                    'badge'       => 'SaaS',
                ],
                [
                    'label'       => 'Headless CMS & content platforms',
                    'description' => 'Content sites powered by headless CMSs where editors need flexibility and developers want a clean, modern stack.',
                    'audience'    => 'Marketing and content teams',
                    'badge'       => 'Headless CMS',
                ],
                [
                    'label'       => 'Modernisation of legacy marketing sites',
                    'description' => 'Rebuilding older PHP or monolithic CMS frontends into Next.js, improving performance, SEO and deployment workflows.',
                    'audience'    => 'Teams with legacy sites',
                    'badge'       => 'Modernisation',
                ],
            ],

            'cta' => [
                'label' => 'Ask if Next.js is right for your use case',
                'url'   => '/contact-us/?topic=use-cases-nextjs',
            ],
        ],

        // Tech stack
        'stack' => [
            'id'      => 'next-tech-stack',
            'eyebrow' => 'Tech stack & tooling',
            'title'   => 'Next.js stack we typically use at QalbIT',
            'intro'   => 'We use modern Next.js with a pragmatic stack so your site or app can evolve without painful rewrites.',
            'note'    => 'Already using Next.js? We will review your current version, routing and data-fetching approach and only suggest changes where they clearly help.',

            'categories' => [
                [
                    'name'        => 'Next.js & React',
                    'description' => 'Core framework decisions.',
                    'items'       => [
                        'Next.js (App Router) with React server and client components.',
                        'Incremental Static Regeneration (ISR) where content needs regular refresh.',
                        'TypeScript-first setups for better safety and refactoring.',
                    ],
                ],
                [
                    'name'        => 'Data fetching & backend integration',
                    'description' => 'Connecting to your data sources.',
                    'items'       => [
                        'Next.js route handlers, server actions or BFF patterns where suitable.',
                        'Integration with REST/GraphQL APIs, auth providers and payment gateways.',
                        'Caching strategies for faster responses and lower backend load.',
                    ],
                ],
                [
                    'name'        => 'Styling, components & UX',
                    'description' => 'Front-end implementation details.',
                    'items'       => [
                        'Tailwind CSS and/or component libraries tuned to your brand.',
                        'Reusable layout and UI components for consistent experiences.',
                        'Responsive and accessible UI patterns across devices.',
                    ],
                ],
                [
                    'name'        => 'Tooling, hosting & observability',
                    'description' => 'How we keep things reliable in production.',
                    'items'       => [
                        'Hosting on Vercel, AWS or your preferred platform with CI/CD pipelines.',
                        'Basic automated tests, linting and formatting integrated into the pipeline.',
                        'Monitoring, logging and error tracking tied into your existing stack where possible.',
                    ],
                ],
            ],
        ],

        // Bottom CTA
        'cta' => [
            'enabled' => true,

            'eyebrow' => 'Ready to talk Next.js?',
            'title'   => 'Let’s plan your next Next.js site or full-stack app.',
            'body'    => 'Share your existing stack, SEO goals and the user journeys that matter most. We will review your requirements and propose a practical Next.js plan aligned with your stage and budget.',

            'primary_label' => 'Book a Next.js discovery call',
            'primary_url'   => '/contact-us/?topic=nextjs-development',
            'primary_aria'  => 'Book a Next.js discovery call with QalbIT',

            'secondary_label' => 'Send us your Next.js requirements',
            'secondary_url'   => 'https://calendly.com/abidhusain-qalbit/discuss-project',
            'secondary_aria'  => 'Send your Next.js requirements to QalbIT',

            'meta' => 'Typically we respond within 24–48 hours with clarifying questions and next steps.',
        ],
    ],

    'tailwindcss' => [
        'slug'        => '/technologies/tailwindcss/',
        'name'        => 'Tailwind CSS Development',
        'short_name'  => 'Tailwind CSS',
        'icon'        => '/images/technologies/tailwindcss.svg',
        'category'    => 'frontend',
        'enabled'     => true,
        'order'       => 30,
        'show_home'   => true,

        'meta_title'       => 'Tailwind CSS Frontend Development Services | QalbIT',
        'meta_description' => 'Utility-first Tailwind CSS development services from QalbIT – design systems, SaaS dashboards and marketing sites that stay consistent as you scale.',

        'tagline'   => 'Utility-first UI development for products that need consistency and speed.',
        'summary'   => 'We use Tailwind CSS to build and refactor frontends into clean, consistent design systems – especially for SaaS products, dashboards and modern marketing sites.',

        'faq_key'      => 'tailwindcss_faq',
        'faq_title'    => 'Tailwind CSS Development – Frequently Asked Questions',
        'faq_subtitle' => 'Answers about Tailwind CSS theming, performance and how QalbIT uses it in real projects.',

        // Hero
        'hero' => [
            'breadcrumb_label' => 'Tailwind CSS',
            'kicker_prefix'    => 'Technologies',
            'kicker_label'     => 'Tailwind CSS design systems',
            'kicker_detail'    => 'SaaS · Dashboards · Marketing sites',

            'title'     => 'Tailwind CSS frontends that stay <span class="text-gradient-brand-animated">consistent as your product grows</span>.',
            'highlight' => 'consistent as your product grows',

            'intro' => 'QalbIT uses Tailwind CSS to build and modernise frontends for SaaS products, dashboards and content-heavy marketing sites. We focus on design tokens, reusable components and clean utilities so your UI stays consistent, fast and easy to extend across new modules and screens.',

            'primary_cta_label' => 'Discuss your Tailwind CSS UI',
            'primary_cta_href'  => '/contact-us/?topic=tailwindcss',

            'secondary_cta_label' => 'See Book a quick discovery call',
            'secondary_cta_href'  => 'https://calendly.com/abidhusain-qalbit/discuss-project',
        ],

        // Overview
        'overview' => [
            'id'      => 'tailwind-overview',
            'eyebrow' => 'Tailwind CSS development overview',

            'title' => 'Tailwind CSS development for scalable design systems and frontends',
            'intro' => 'We help teams use Tailwind CSS as more than “just a CSS utility library” – we turn it into a structured design system with clear tokens, components and patterns that scale with your product.',

            'left_title' => 'When Tailwind CSS with QalbIT makes sense',
            'left_items' => [
                'You want a consistent design language across dashboards, portals and marketing pages.',
                'You are rebuilding a SaaS or web app and want to standardise UI using Tailwind CSS.',
                'Your current CSS or Bootstrap setup is hard to maintain and you want a cleaner, utility-first approach.',
                'You prefer a team that understands both product UX and the engineering side of Tailwind CSS.',
            ],

            'right_title' => 'Outcomes we typically target with Tailwind CSS work',
            'right_items' => [
                'Cleaner, more maintainable UI code with fewer one-off styles and overrides.',
                'A reusable set of components and patterns that speeds up new features and pages.',
                'Better visual consistency across teams, modules and future releases.',
                'Faster frontends through optimised builds, purged CSS and sensible Tailwind configuration.',
            ],

            'note' => 'For Tailwind CSS work we often begin with a small audit of your current UI and CSS, then define a practical plan for a new design system, refactor or greenfield build.',
        ],

        // Capabilities
        'capabilities' => [
            'id'      => 'tailwind-capabilities',
            'eyebrow' => 'What we build with Tailwind CSS',
            'title'   => 'Tailwind CSS capabilities across SaaS, dashboards and marketing sites',
            'intro'   => 'We apply Tailwind CSS where it has real impact – multi-screen products, dashboards and content sites that benefit from consistency and rapid iteration.',

            'items' => [
                [
                    'label'       => 'Design systems & component libraries',
                    'description' => 'Define Tailwind CSS tokens, utility conventions and reusable UI components that can be used across your product or multiple apps.',
                    'badge'       => 'Design systems',
                    'icon'        => '/images/icons/modules.svg',
                ],
                [
                    'label'       => 'SaaS dashboards & product interfaces',
                    'description' => 'Implement SaaS dashboards, admin panels and product UIs using Tailwind CSS, tuned for real-world workflows and dense information.',
                    'badge'       => 'SaaS & dashboards',
                    'icon'        => '/images/icons/dashboard.svg',
                ],
                [
                    'label'       => 'Marketing sites & landing pages',
                    'description' => 'Build or rebuild marketing websites and landing pages in Tailwind CSS for better performance, SEO and brand consistency.',
                    'badge'       => 'Marketing sites',
                    'icon'        => '/images/icons/landing-page.svg',
                ],
                [
                    'label'       => 'Legacy CSS & Bootstrap modernisation',
                    'description' => 'Refactor legacy CSS or theme-based frontends into a Tailwind CSS setup that is easier to maintain and extend.',
                    'badge'       => 'Modernisation',
                    'icon'        => '/images/icons/modernization.svg',
                ],
            ],

            'cta' => [
                'label' => 'Discuss your Tailwind CSS frontend scope',
                'url'   => '/contact-us/?topic=tailwindcss',
            ],
        ],

        // Process
        'process' => [
            'id'      => 'tailwind-process',
            'eyebrow' => 'How Tailwind CSS projects work with QalbIT',
            'title'   => 'A structured Tailwind CSS process – from audit to design system roll-out',
            'intro'   => 'We keep Tailwind CSS projects pragmatic: align on UX, define tokens and components, then roll them out gradually so you see improvements without disruption.',

            'items' => [
                [
                    'step'        => 1,
                    'title'       => 'UX & UI audit',
                    'description' => 'Review your current UI, CSS, components and brand guidelines. Identify inconsistencies, problem areas and quick wins for Tailwind CSS.',
                    'duration'    => '1–2 weeks',
                    'outcome'     => 'Audit report and priorities for Tailwind CSS adoption or refactor.',
                    'icon'        => '/images/icons/discovery.svg',
                ],
                [
                    'step'        => 2,
                    'title'       => 'Design tokens & component architecture',
                    'description' => 'Define colour palettes, spacing scales, typography and component patterns in Tailwind configuration and a simple design system.',
                    'duration'    => '1–3 weeks',
                    'outcome'     => 'Tailwind config plus an initial set of reusable components and patterns.',
                    'icon'        => '/images/icons/architecture-design.svg',
                ],
                [
                    'step'        => 3,
                    'title'       => 'Implementation & refactor',
                    'description' => 'Implement new screens or gradually refactor existing ones to Tailwind CSS, cleaning up legacy CSS and reducing one-off styles.',
                    'duration'    => '3–8+ weeks (scope-dependent)',
                    'outcome'     => 'Working Tailwind CSS UI in staging or production, aligned with your design system.',
                    'icon'        => '/images/icons/core-modules.svg',
                ],
                [
                    'step'        => 4,
                    'title'       => 'Testing, accessibility & performance',
                    'description' => 'Test visual regressions, responsiveness and accessibility, and tune the build for minimal CSS bundle size.',
                    'duration'    => '2–4 weeks',
                    'outcome'     => 'Stable, performant UI with Tailwind CSS best practices applied.',
                    'icon'        => '/images/icons/launch.svg',
                ],
                [
                    'step'        => 5,
                    'title'       => 'Ongoing UI evolution',
                    'description' => 'Support your team with new components, page designs and UI improvements as your product and brand evolve.',
                    'duration'    => 'Ongoing, month-to-month',
                    'outcome'     => 'A living design system and Tailwind CSS implementation that keeps pace with your roadmap.',
                    'icon'        => '/images/icons/scale.svg',
                ],
            ],

            'cta' => [
                'label' => 'Walk me through this Tailwind CSS process for my product',
                'url'   => '/contact-us/?topic=tailwindcss',
            ],
        ],

        // Use cases
        'use_cases' => [
            'id'      => 'tailwind-use-cases',
            'eyebrow' => 'Where Tailwind CSS is usually the right fit',
            'title'   => 'Tailwind CSS use cases we most often deliver',
            'intro'   => 'Most Tailwind CSS work we do is tied to larger products and marketing sites, not isolated components – so we focus on patterns that hold up in real usage.',

            'items' => [
                [
                    'label'       => 'Design systems for SaaS and internal tools',
                    'description' => 'Shared Tailwind CSS-based design systems used across multiple modules, apps or teams.',
                    'audience'    => 'SaaS founders and product teams',
                    'badge'       => 'Design systems',
                ],
                [
                    'label'       => 'Dashboard and admin UI implementation',
                    'description' => 'Complex dashboards, admin panels and internal tools with consistent, dense layouts.',
                    'audience'    => 'Operations and product teams',
                    'badge'       => 'Dashboards',
                ],
                [
                    'label'       => 'Marketing site rebuilds',
                    'description' => 'Rebuilding slower or inconsistent marketing sites into Tailwind CSS for better performance and control.',
                    'audience'    => 'Marketing and growth teams',
                    'badge'       => 'Marketing',
                ],
                [
                    'label'       => 'Legacy CSS and theme clean-up',
                    'description' => 'Phased replacement of heavy theme CSS or inline styles with Tailwind utilities and components.',
                    'audience'    => 'Teams with legacy frontends',
                    'badge'       => 'Modernisation',
                ],
            ],

            'cta' => [
                'label' => 'Ask if your UI is a good fit for Tailwind CSS',
                'url'   => '/contact-us/?topic=use-cases-tailwindcss',
            ],
        ],

        // Stack
        'stack' => [
            'id'      => 'tailwind-tech-stack',
            'eyebrow' => 'Tech stack & tooling',
            'title'   => 'Tailwind CSS stack we typically use at QalbIT',
            'intro'   => 'We combine Tailwind CSS with modern frameworks, build tools and design workflows so your UI is both fast and maintainable.',
            'note'    => 'Already using Tailwind CSS? We will review your current configuration, components and build pipeline, then recommend concrete improvements where they have clear impact.',

            'categories' => [
                [
                    'name'        => 'CSS & frameworks',
                    'description' => 'Core styling tools and frameworks.',
                    'items'       => [
                        'Tailwind CSS with project-specific configuration and design tokens.',
                        'PostCSS-based pipelines with CSS purging and minification.',
                        'Integration with React, Next.js and Laravel Blade templates.',
                    ],
                ],
                [
                    'name'        => 'Design systems & components',
                    'description' => 'How we organise reusable UI pieces.',
                    'items'       => [
                        'Component libraries built with Tailwind CSS and your brand guidelines.',
                        'Documentation of components, variants and usage patterns.',
                        'Optional Storybook or similar setups for isolated UI development.',
                    ],
                ],
                [
                    'name'        => 'Tooling & workflow',
                    'description' => 'Dev experience and build tooling around Tailwind.',
                    'items'       => [
                        'Vite, Next.js or Laravel Mix / Vite for efficient builds.',
                        'Linting and formatting rules that keep markup clean and consistent.',
                        'Hot reload workflows for rapid UI iteration with designers and stakeholders.',
                    ],
                ],
                [
                    'name'        => 'Quality & performance',
                    'description' => 'Keeping the frontend healthy in production.',
                    'items'       => [
                        'Tree-shaken, purged CSS bundles tailored to your actual components.',
                        'Responsive design and accessibility checks baked into the process.',
                        'Monitoring and Core Web Vitals focus for high-traffic pages.',
                    ],
                ],
            ],
        ],

        // Bottom CTA
        'cta' => [
            'enabled' => true,

            'eyebrow' => 'Ready to talk Tailwind CSS?',
            'title'   => 'Let’s turn your UI into a clean, scalable Tailwind CSS design system.',
            'body'    => 'Share your current frontend stack, design goals and any existing CSS challenges. We will review your setup and propose a tailored Tailwind CSS plan – from small refactors to full design system roll-outs.',

            'primary_label' => 'Book a Tailwind CSS discovery call',
            'primary_url'   => '/contact-us/?topic=tailwindcss-development',
            'primary_aria'  => 'Book a Tailwind CSS discovery call with QalbIT',

            'secondary_label' => 'Send us your UI requirements',
            'secondary_url'   => 'https://calendly.com/abidhusain-qalbit/discuss-project',
            'secondary_aria'  => 'Send your Tailwind CSS UI requirements to QalbIT',

            'meta' => 'Typically we respond within 24–48 hours with clarifying questions and next steps.',
        ],
    ],

    'nodejs' => [
        'slug'        => '/technologies/nodejs/',
        'name'        => 'Node.js Backend Development',
        'short_name'  => 'Node.js',
        'icon'        => '/images/technologies/nodejs.svg',
        'category'    => 'backend',
        'enabled'     => true,
        'order'       => 40,
        'show_home'   => true,

        'meta_title'       => 'Node.js & NestJS Backend Development Services | QalbIT',
        'meta_description' => 'Scalable Node.js and NestJS backend development from QalbIT – REST/GraphQL APIs, mobile backends, integrations and SaaS platforms built for performance and reliability.',

        'tagline'   => 'API-first Node.js and NestJS backends for SaaS, mobile and web products.',
        'summary'   => 'We design and build Node.js and NestJS backends that power APIs, integrations and real-time features for SaaS products, mobile apps and internal tools.',

        'faq_key'      => 'nodejs_faq',
        'faq_title'    => 'Node.js & NestJS Backend Development – Frequently Asked Questions',
        'faq_subtitle' => 'Answers about Node.js, NestJS, API design, performance and how QalbIT delivers backend projects.',

        // Hero
        'hero' => [
            'breadcrumb_label' => 'Node.js',
            'kicker_prefix'    => 'Technologies',
            'kicker_label'     => 'Node.js & NestJS backends',
            'kicker_detail'    => 'APIs · Integrations · Real-time',

            'title'     => 'Node.js & NestJS backends for <span class="text-gradient-brand-animated">APIs, integrations and real-time products</span>.',
            'highlight' => 'APIs, integrations and real-time products',

            'intro' => 'QalbIT uses Node.js and NestJS to build API-first backends for SaaS products, mobile applications and internal tools. We focus on clean architecture, predictable performance and robust integrations so your backend stays reliable as your product, traffic and team grow.',

            'primary_cta_label' => 'Discuss your Node.js backend',
            'primary_cta_href'  => '/contact-us/?topic=nodejs',

            'secondary_cta_label' => 'Book a quick discovery call',
            'secondary_cta_href'  => 'https://calendly.com/abidhusain-qalbit/discuss-project',
        ],

        // Overview
        'overview' => [
            'id'      => 'nodejs-overview',
            'eyebrow' => 'Node.js backend development overview',

            'title' => 'Node.js & NestJS backend development for modern products and platforms',
            'intro' => 'We help teams use Node.js where it is strongest – API platforms, integration layers, mobile backends and real-time features that benefit from a fast, event-driven runtime.',

            'left_title' => 'When Node.js with QalbIT makes sense',
            'left_items' => [
                'You need a modern API layer for web, mobile and third-party integrations.',
                'Your product benefits from real-time features such as notifications, chats or live data.',
                'You prefer a TypeScript-first stack where frontend and backend can share models.',
                'You want to modernise a legacy backend into a more scalable, maintainable architecture.',
            ],

            'right_title' => 'Outcomes we typically target with Node.js work',
            'right_items' => [
                'Stable, well-documented APIs that are easy for other teams and partners to consume.',
                'Predictable performance and scalability with monitoring and logging in place.',
                'A backend architecture that is easier to extend with new features and integrations.',
                'Clear separation between domains, making refactors and team ownership easier.',
            ],

            'note' => 'For Node.js and NestJS projects we usually start with a short discovery and architecture review, then define a realistic implementation or migration plan for your API layer.',
        ],

        // Capabilities
        'capabilities' => [
            'id'      => 'nodejs-capabilities',
            'eyebrow' => 'What we build with Node.js',
            'title'   => 'Node.js backend capabilities across APIs, integrations and real-time systems',
            'intro'   => 'We focus Node.js and NestJS on backends where performance, integrations and developer experience matter over the long term.',

            'items' => [
                [
                    'label'       => 'REST & GraphQL APIs',
                    'description' => 'Design and implementation of REST/JSON and GraphQL APIs that power web, mobile and partner applications.',
                    'badge'       => 'APIs',
                    'icon'        => '/images/icons/api.svg',
                ],
                [
                    'label'       => 'Mobile & SPA backends',
                    'description' => 'Backends for mobile apps and single-page applications, including authentication, authorisation and business logic.',
                    'badge'       => 'Mobile backends',
                    'icon'        => '/images/icons/mobile-backend.svg',
                ],
                [
                    'label'       => 'Real-time & event-driven systems',
                    'description' => 'WebSocket, notification and event-driven architectures using queues, workers and background jobs.',
                    'badge'       => 'Real-time',
                    'icon'        => '/images/icons/realtime.svg',
                ],
                [
                    'label'       => 'Integration & middleware layers',
                    'description' => 'Node.js-based integration layers between CRMs, ERPs, payment gateways and internal systems.',
                    'badge'       => 'Integrations',
                    'icon'        => '/images/icons/integrations.svg',
                ],
            ],

            'cta' => [
                'label' => 'Discuss your Node.js backend scope',
                'url'   => '/contact-us/?topic=nodejs',
            ],
        ],

        // Process
        'process' => [
            'id'      => 'nodejs-process',
            'eyebrow' => 'How Node.js projects work with QalbIT',
            'title'   => 'A practical Node.js backend process from architecture to operations',
            'intro'   => 'We keep the Node.js process structured but pragmatic: clarify requirements, design the architecture, then build, harden and operate the backend with you.',

            'items' => [
                [
                    'step'        => 1,
                    'title'       => 'Discovery & architecture review',
                    'description' => 'Understand your product, existing systems and integration needs. Review current backends (if any) and define boundaries for the Node.js layer.',
                    'duration'    => '1–2 weeks',
                    'outcome'     => 'Documented goals, constraints and a proposed Node.js/NestJS architecture.',
                    'icon'        => '/images/icons/discovery.svg',
                ],
                [
                    'step'        => 2,
                    'title'       => 'API & domain design',
                    'description' => 'Define domains, modules, endpoints, request/response contracts and data models, using patterns that fit NestJS and your wider stack.',
                    'duration'    => '1–3 weeks',
                    'outcome'     => 'API specification, module boundaries and a technical blueprint for implementation.',
                    'icon'        => '/images/icons/architecture-design.svg',
                ],
                [
                    'step'        => 3,
                    'title'       => 'Implementation & integrations',
                    'description' => 'Implement modules, endpoints, authentication and business logic, wiring in databases, queues and third-party services.',
                    'duration'    => '4–10+ weeks (scope-dependent)',
                    'outcome'     => 'Working Node.js/NestJS backend in staging or production, integrated with your systems.',
                    'icon'        => '/images/icons/core-modules.svg',
                ],
                [
                    'step'        => 4,
                    'title'       => 'Testing, hardening & rollout',
                    'description' => 'Functional tests, performance checks, security review and step-by-step rollout with logging and monitoring.',
                    'duration'    => '2–4 weeks',
                    'outcome'     => 'Stable, observable backend with a clear improvement backlog.',
                    'icon'        => '/images/icons/launch.svg',
                ],
                [
                    'step'        => 5,
                    'title'       => 'Operations & ongoing development',
                    'description' => 'Support, enhancements and new modules as your product evolves, with clear SLAs and release processes.',
                    'duration'    => 'Ongoing, month-to-month',
                    'outcome'     => 'A Node.js backend that stays healthy and aligned with your roadmap.',
                    'icon'        => '/images/icons/scale.svg',
                ],
            ],

            'cta' => [
                'label' => 'Walk me through this Node.js process for my product',
                'url'   => '/contact-us/?topic=process-nodejs',
            ],
        ],

        // Use cases
        'use_cases' => [
            'id'      => 'nodejs-use-cases',
            'eyebrow' => 'Where Node.js is usually the right fit',
            'title'   => 'Node.js use cases we most often deliver',
            'intro'   => 'Most Node.js work we do is at the heart of a product – not side scripts – so we design for long-term stability and growth.',

            'items' => [
                [
                    'label'       => 'SaaS and platform APIs',
                    'description' => 'Core APIs that power SaaS products, partner integrations and public developer ecosystems.',
                    'audience'    => 'SaaS founders and platform teams',
                    'badge'       => 'SaaS APIs',
                ],
                [
                    'label'       => 'Mobile and SPA backends',
                    'description' => 'Backends serving Flutter, React Native and web SPAs with authentication, permissions and business rules.',
                    'audience'    => 'Product and mobile teams',
                    'badge'       => 'App backends',
                ],
                [
                    'label'       => 'Real-time products & notifications',
                    'description' => 'Systems that need live updates, streaming data or notification pipelines.',
                    'audience'    => 'Teams building interactive products',
                    'badge'       => 'Real-time',
                ],
                [
                    'label'       => 'Integration hubs & middleware',
                    'description' => 'Node.js services that connect CRMs, ERPs, payment gateways and internal tools via APIs and queues.',
                    'audience'    => 'Operations and IT teams',
                    'badge'       => 'Integrations',
                ],
            ],

            'cta' => [
                'label' => 'Ask if your backend is a good fit for Node.js',
                'url'   => '/contact-us/?topic=use-cases-nodejs',
            ],
        ],

        // Stack
        'stack' => [
            'id'      => 'nodejs-tech-stack',
            'eyebrow' => 'Tech stack & tooling',
            'title'   => 'Node.js & NestJS stack we typically use at QalbIT',
            'intro'   => 'We pair Node.js with NestJS, TypeScript and proven infrastructure components so your backend is easier to evolve and support.',
            'note'    => 'If you already have a Node.js backend, we start with a review of your codebase, dependencies and infrastructure, then recommend incremental improvements instead of forcing a full rewrite.',

            'categories' => [
                [
                    'name'        => 'Runtime & frameworks',
                    'description' => 'Core backend technologies.',
                    'items'       => [
                        'Node.js LTS with TypeScript for safer, maintainable backends.',
                        'NestJS for modular, structured applications with clear boundaries.',
                        'Express.js and lightweight frameworks where a simpler stack is sufficient.',
                    ],
                ],
                [
                    'name'        => 'Data & persistence',
                    'description' => 'Databases, caching and queues.',
                    'items'       => [
                        'Relational databases such as PostgreSQL and MySQL/MariaDB.',
                        'Redis for caching, sessions and queues.',
                        'Message queues and background workers for heavy or asynchronous workloads.',
                    ],
                ],
                [
                    'name'        => 'APIs & integrations',
                    'description' => 'How we expose and consume services.',
                    'items'       => [
                        'REST/JSON APIs with OpenAPI/Swagger documentation.',
                        'GraphQL where flexible querying is justified.',
                        'Webhooks and third-party API integrations for CRMs, ERPs, payment gateways and more.',
                    ],
                ],
                [
                    'name'        => 'Quality, security & operations',
                    'description' => 'Keeping backends robust in production.',
                    'items'       => [
                        'Automated tests, linting and formatting built into CI.',
                        'Structured logging, metrics and alerting for observability.',
                        'Docker-based deployment pipelines to cloud environments such as AWS or DigitalOcean.',
                    ],
                ],
            ],
        ],

        // Bottom CTA
        'cta' => [
            'enabled' => true,

            'eyebrow' => 'Ready to talk Node.js?',
            'title'   => 'Let’s design a Node.js backend and API layer that can grow with your product.',
            'body'    => 'Share your current architecture, tech stack and backend pain points. We will review your situation and propose a Node.js and NestJS plan focused on stability, performance and long-term maintainability.',

            'primary_label' => 'Book a Node.js backend discovery call',
            'primary_url'   => '/contact-us/?topic=nodejs-backend',
            'primary_aria'  => 'Book a Node.js backend discovery call with QalbIT',

            'secondary_label' => 'Send us your API/backend requirements',
            'secondary_url'   => 'https://calendly.com/abidhusain-qalbit/discuss-project',
            'secondary_aria'  => 'Send your Node.js backend requirements to QalbIT',

            'meta' => 'Typically we respond within 24–48 hours with clarifying questions and next steps.',
        ],
    ],

    'nestjs' => [
        'slug'        => '/technologies/nestjs/',
        'name'        => 'NestJS Backend Development',
        'short_name'  => 'NestJS',
        'icon'        => '/images/technologies/nestjs.svg',
        'category'    => 'backend',
        'enabled'     => true,
        'order'       => 50,
        'show_home'   => false,

        'meta_title'       => 'NestJS Backend Development Services | QalbIT',
        'meta_description' => 'Modular, scalable backends with QalbIT’s NestJS development services – API platforms, microservices and integration layers built on Node.js and TypeScript.',

        'tagline'   => 'Structured, TypeScript-first backends built with NestJS.',
        'summary'   => 'We use NestJS to design modular, scalable backends and API platforms on top of Node.js and TypeScript for SaaS, mobile and internal systems.',

        'faq_key'      => 'nestjs_faq',
        'faq_title'    => 'NestJS Backend Development – Frequently Asked Questions',
        'faq_subtitle' => 'Answers about NestJS architecture, API design, microservices and how QalbIT delivers backend projects.',

        // Hero
        'hero' => [
            'breadcrumb_label' => 'NestJS',
            'kicker_prefix'    => 'Technologies',
            'kicker_label'     => 'NestJS & TypeScript backends',
            'kicker_detail'    => 'APIs · Microservices · Integrations',

            'title'     => 'NestJS backends for <span class="text-gradient-brand-animated">API platforms, microservices and integrations</span>.',
            'highlight' => 'API platforms, microservices and integrations',

            'intro' => 'QalbIT uses NestJS on top of Node.js and TypeScript to build modular, maintainable backends. We design clear module boundaries, domain layers and APIs so your SaaS, mobile apps and internal tools have a stable core that can grow without chaos.',

            'primary_cta_label' => 'Discuss your NestJS backend',
            'primary_cta_href'  => '/contact-us/?topic=nestjs',

            'secondary_cta_label' => 'Book a quick discovery call',
            'secondary_cta_href'  => 'https://calendly.com/abidhusain-qalbit/discuss-project',
        ],

        // Overview
        'overview' => [
            'id'      => 'nestjs-overview',
            'eyebrow' => 'NestJS backend development overview',

            'title' => 'NestJS backend development for scalable products and platforms',
            'intro' => 'We use NestJS when you need a structured, TypeScript-first backend with clear modules, clean architecture and room to grow into microservices or a larger platform.',

            'left_title' => 'When NestJS with QalbIT makes sense',
            'left_items' => [
                'You want a TypeScript-first backend that matches a modern React/Next.js frontend.',
                'Your product needs a clear, modular backend architecture rather than ad-hoc scripts.',
                'You plan to expose APIs to multiple clients – web, mobile, partners or public developers.',
                'You expect the product to grow and want a backend that will not become a bottleneck.',
            ],

            'right_title' => 'Outcomes we typically target with NestJS work',
            'right_items' => [
                'A clean, well-structured codebase that multiple developers can work on safely.',
                'Documented APIs with consistent patterns for authentication, validation and errors.',
                'Improved performance and reliability, with monitoring and logging in place.',
                'A backend that can evolve into microservices or separate modules when needed.',
            ],

            'note' => 'Most NestJS projects start with an architecture and requirements review so we can design modules, domains and APIs that match your product roadmap instead of just your first release.',
        ],

        // Capabilities
        'capabilities' => [
            'id'      => 'nestjs-capabilities',
            'eyebrow' => 'What we build with NestJS',
            'title'   => 'NestJS backend capabilities across APIs, domains and integrations',
            'intro'   => 'We focus NestJS on API layers and backends where structure, modularity and long-term maintainability really matter.',

            'items' => [
                [
                    'label'       => 'Modular API platforms',
                    'description' => 'NestJS-based API platforms with clear modules, routing, DTOs and validation for web, mobile and internal clients.',
                    'badge'       => 'API platforms',
                    'icon'        => '/images/icons/api.svg',
                ],
                [
                    'label'       => 'SaaS & multi-tenant backends',
                    'description' => 'Backends for SaaS products and multi-tenant systems, with tenancy, roles and permissions encoded into the architecture.',
                    'badge'       => 'SaaS backends',
                    'icon'        => '/images/icons/modules.svg',
                ],
                [
                    'label'       => 'Microservices & event-driven systems',
                    'description' => 'Microservices, message-driven workflows and background workers using NestJS modules, queues and event buses.',
                    'badge'       => 'Microservices',
                    'icon'        => '/images/icons/realtime.svg',
                ],
                [
                    'label'       => 'Integration & gateway layers',
                    'description' => 'NestJS gateways that connect CRMs, ERPs, payment gateways and third-party APIs behind a consistent interface.',
                    'badge'       => 'Integrations',
                    'icon'        => '/images/icons/integrations.svg',
                ],
            ],

            'cta' => [
                'label' => 'Discuss your NestJS backend scope',
                'url'   => '/contact-us/?topic=nestjs',
            ],
        ],

        // Process
        'process' => [
            'id'      => 'nestjs-process',
            'eyebrow' => 'How NestJS projects work with QalbIT',
            'title'   => 'A structured NestJS development process from design to operations',
            'intro'   => 'We apply a consistent process to NestJS projects so that modules, domains and APIs are well thought through before heavy coding starts.',

            'items' => [
                [
                    'step'        => 1,
                    'title'       => 'Discovery & domain mapping',
                    'description' => 'Understand your product, users, workflows and existing systems. Identify domains, bounded contexts and integration points for the NestJS backend.',
                    'duration'    => '1–2 weeks',
                    'outcome'     => 'Documented domains, initial module plan and a shared understanding of priorities.',
                    'icon'        => '/images/icons/discovery.svg',
                ],
                [
                    'step'        => 2,
                    'title'       => 'Architecture & module design',
                    'description' => 'Design NestJS modules, controllers, services and data models. Define API contracts, validation rules and error-handling patterns.',
                    'duration'    => '1–3 weeks',
                    'outcome'     => 'Architecture blueprint, API specification and technical plan for implementation.',
                    'icon'        => '/images/icons/architecture-design.svg',
                ],
                [
                    'step'        => 3,
                    'title'       => 'Implementation & integrations',
                    'description' => 'Implement modules, repositories and services in NestJS. Integrate databases, queues and third-party APIs, and wire in authentication and authorisation.',
                    'duration'    => '4–10+ weeks (scope-dependent)',
                    'outcome'     => 'Working NestJS backend in staging or production, aligned to your domains.',
                    'icon'        => '/images/icons/core-modules.svg',
                ],
                [
                    'step'        => 4,
                    'title'       => 'Testing, performance & security',
                    'description' => 'Add tests, run performance checks, review security and harden the system for real-world traffic and usage.',
                    'duration'    => '2–4 weeks',
                    'outcome'     => 'Stable, observable backend with clear SLAs and incident paths.',
                    'icon'        => '/images/icons/launch.svg',
                ],
                [
                    'step'        => 5,
                    'title'       => 'Operations & ongoing evolution',
                    'description' => 'Support, improvements and new modules as your product evolves, with a clear release process and continued architecture guidance.',
                    'duration'    => 'Ongoing, month-to-month',
                    'outcome'     => 'A NestJS backend that remains healthy, maintainable and aligned with your roadmap.',
                    'icon'        => '/images/icons/scale.svg',
                ],
            ],

            'cta' => [
                'label' => 'Walk me through this NestJS process for my backend',
                'url'   => '/contact-us/?topic=process-nestjs',
            ],
        ],

        // Use cases
        'use_cases' => [
            'id'      => 'nestjs-use-cases',
            'eyebrow' => 'Where NestJS is usually the right fit',
            'title'   => 'NestJS use cases we most often deliver',
            'intro'   => 'We recommend NestJS when the backend is a long-term asset that multiple teams will rely on and extend.',

            'items' => [
                [
                    'label'       => 'B2B & B2C SaaS platforms',
                    'description' => 'SaaS products with multiple roles, complex permissions and a roadmap that needs a stable, modular backend.',
                    'audience'    => 'SaaS founders and product teams',
                    'badge'       => 'SaaS',
                ],
                [
                    'label'       => 'Internal tools & line-of-business systems',
                    'description' => 'Backends for internal operations, reporting, approvals and workflows, often replacing spreadsheets or legacy apps.',
                    'audience'    => 'Operations, finance and support teams',
                    'badge'       => 'Internal tools',
                ],
                [
                    'label'       => 'API-first and partner platforms',
                    'description' => 'Products where external partners or third-party developers rely on your APIs and documentation.',
                    'audience'    => 'Platform and integration teams',
                    'badge'       => 'API-first',
                ],
                [
                    'label'       => 'Integration hubs & gateways',
                    'description' => 'NestJS layers sitting between CRMs, ERPs, payment gateways and other systems, providing a single, consistent interface.',
                    'audience'    => 'IT and digital transformation teams',
                    'badge'       => 'Integrations',
                ],
            ],

            'cta' => [
                'label' => 'Ask if NestJS is the right fit for your backend',
                'url'   => '/contact-us/?topic=use-cases-nestjs',
            ],
        ],

        // Stack
        'stack' => [
            'id'      => 'nestjs-tech-stack',
            'eyebrow' => 'Tech stack & tooling',
            'title'   => 'NestJS stack we typically use at QalbIT',
            'intro'   => 'We pair NestJS with TypeScript, relational databases, queues and modern tooling so your backend stays predictable and supportable.',
            'note'    => 'If you already have a NestJS or Node.js backend, we review your current stack first and only introduce changes that clearly improve stability, performance or maintainability.',

            'categories' => [
                [
                    'name'        => 'Runtime & framework',
                    'description' => 'Core backend foundations.',
                    'items'       => [
                        'Node.js LTS as the runtime layer.',
                        'NestJS with modules, controllers, providers and decorators.',
                        'TypeScript for type-safe, maintainable codebases.',
                    ],
                ],
                [
                    'name'        => 'Data, caching & messaging',
                    'description' => 'Persistence and performance tools.',
                    'items'       => [
                        'Relational databases such as PostgreSQL or MySQL/MariaDB.',
                        'Redis for caching, sessions and queues.',
                        'Queues and background workers for heavy, asynchronous tasks.',
                    ],
                ],
                [
                    'name'        => 'APIs & integrations',
                    'description' => 'How we expose and consume services.',
                    'items'       => [
                        'REST/JSON APIs documented with OpenAPI/Swagger.',
                        'GraphQL via NestJS where flexible querying is justified.',
                        'Integrations with CRMs, ERPs, payment gateways and other platforms.',
                    ],
                ],
                [
                    'name'        => 'Quality, security & operations',
                    'description' => 'Keeping NestJS backends healthy in production.',
                    'items'       => [
                        'Automated tests, linting and formatting as part of CI pipelines.',
                        'Structured logging, metrics and alerting for observability.',
                        'Docker-based deployment to cloud providers such as AWS or DigitalOcean.',
                    ],
                ],
            ],
        ],

        // Bottom CTA
        'cta' => [
            'enabled' => true,

            'eyebrow' => 'Ready to talk NestJS?',
            'title'   => 'Let’s design a NestJS backend that can grow with your product and team.',
            'body'    => 'Share your current backend, pain points and roadmap. We will review your context and propose a NestJS-based plan focused on clarity, scalability and long-term maintainability.',

            'primary_label' => 'Book a NestJS backend discovery call',
            'primary_url'   => '/contact-us/?topic=nestjs-backend',
            'primary_aria'  => 'Book a NestJS backend discovery call with QalbIT',

            'secondary_label' => 'Send us your backend/API requirements',
            'secondary_url'   => 'https://calendly.com/abidhusain-qalbit/discuss-project',
            'secondary_aria'  => 'Send your NestJS backend requirements to QalbIT',

            'meta' => 'Typically we respond within 24–48 hours with clarifying questions and next steps.',
        ],
    ],

    'laravel' => [
        'slug'        => '/technologies/laravel/',
        'name'        => 'Laravel Development',
        'short_name'  => 'Laravel',
        'icon'        => '/images/technologies/laravel.svg',
        'category'    => 'backend',
        'enabled'     => true,
        'order'       => 60,
        'show_home'   => true,

        'meta_title'       => 'Laravel Development Services | QalbIT',
        'meta_description' => 'Custom web applications, SaaS platforms and APIs built with QalbIT’s Laravel development services, using modern PHP, robust architecture and cloud-ready deployments.',

        'tagline' => 'Custom web apps, SaaS platforms and APIs built on Laravel.',
        'summary' => 'We use Laravel to build reliable, secure and maintainable backends and full-stack applications – from internal tools and portals to multi-tenant SaaS products and public APIs.',

        'faq_key'      => 'laravel_faq',
        'faq_title'    => 'Laravel Development – Frequently Asked Questions',
        'faq_subtitle' => 'Practical answers about Laravel for custom web apps, SaaS platforms and APIs with QalbIT.',

        // Hero
        'hero' => [
            'breadcrumb_label' => 'Laravel',
            'kicker_prefix'    => 'Technologies',
            'kicker_label'     => 'Laravel & PHP backends',
            'kicker_detail'    => 'Custom web apps · SaaS · APIs',

            'title'     => 'Laravel development for <span class="text-gradient-brand-animated">custom web applications, SaaS platforms and APIs</span>.',
            'highlight' => 'custom web applications, SaaS platforms and APIs',

            'intro' => 'QalbIT uses modern Laravel and PHP to design and build robust backends and full-stack web applications. We focus on clear domain modelling, sensible module boundaries and production-ready infrastructure so your product is easier to evolve, not just launch once.',

            'primary_cta_label' => 'Discuss your Laravel project',
            'primary_cta_href'  => '/contact-us/?topic=laravel',

            'secondary_cta_label' => 'Book a quick discovery call',
            'secondary_cta_href'  => 'https://calendly.com/abidhusain-qalbit/discuss-project',
        ],

        // Overview
        'overview' => [
            'id'      => 'laravel-overview',
            'eyebrow' => 'Laravel development overview',

            'title' => 'Laravel development for long-term custom web and SaaS products',
            'intro' => 'We recommend Laravel when you want a stable, well-understood framework for business-critical web applications, SaaS products and internal tools that will be supported for years.',

            'left_title' => 'When Laravel with QalbIT makes sense',
            'left_items' => [
                'You need a custom web application or SaaS product where off-the-shelf tools are too limiting.',
                'You prefer a mature, stable backend framework with a large ecosystem and talent pool.',
                'You already have PHP/Laravel systems and want a partner who can extend or modernise them.',
                'You want a clear, opinionated framework rather than a collection of ad-hoc libraries.',
            ],

            'right_title' => 'Outcomes we typically target with Laravel work',
            'right_items' => [
                'Reliable, maintainable backends with clear domains, modules and business logic.',
                'Smooth user flows across portals, dashboards and APIs with proper authentication.',
                'A codebase that is easy to onboard new developers to and extend over time.',
                'Production-ready deployments with queues, jobs, monitoring and backup strategies.',
            ],

            'note' => 'For many clients, Laravel becomes the “core system” behind web apps, mobile apps and internal tools. We design it with that long-term role in mind from day one.',
        ],

        // Capabilities
        'capabilities' => [
            'id'      => 'laravel-capabilities',
            'eyebrow' => 'What we build with Laravel',
            'title'   => 'Laravel development capabilities across products and internal systems',
            'intro'   => 'We use Laravel for business-critical systems where stability, security and day-to-day maintainability matter more than chasing hype.',

            'items' => [
                [
                    'label'       => 'Custom web applications & portals',
                    'description' => 'Role-based web applications, customer portals and partner dashboards where users manage data, workflows and approvals.',
                    'badge'       => 'Web apps',
                    'icon'        => '/images/icons/modules.svg',
                ],
                [
                    'label'       => 'SaaS & multi-tenant products',
                    'description' => 'Multi-tenant SaaS platforms built with Laravel, including subscriptions, billing, roles and tenant-aware data access.',
                    'badge'       => 'SaaS',
                    'icon'        => '/images/icons/modules.svg',
                ],
                [
                    'label'       => 'API & integration backends',
                    'description' => 'REST/JSON APIs, webhook handlers and integration layers that connect internal systems, mobile apps and third-party services.',
                    'badge'       => 'APIs',
                    'icon'        => '/images/icons/api.svg',
                ],
                [
                    'label'       => 'Legacy PHP modernisation',
                    'description' => 'Rebuilding or refactoring older PHP/CodeIgniter apps into modern Laravel applications with cleaner architecture and tooling.',
                    'badge'       => 'Modernisation',
                    'icon'        => '/images/icons/architecture.svg',
                ],
            ],

            'cta' => [
                'label' => 'Discuss your Laravel application scope',
                'url'   => '/contact-us/?topic=laravel',
            ],
        ],

        // Process
        'process' => [
            'id'      => 'laravel-process',
            'eyebrow' => 'How Laravel projects work with QalbIT',
            'title'   => 'A practical Laravel development process from discovery to support',
            'intro'   => 'We treat each Laravel application as a long-term asset, not just a one-off build, and our process reflects that.',

            'items' => [
                [
                    'step'        => 1,
                    'title'       => 'Discovery, domain & system review',
                    'description' => 'Understand your business processes, users, existing systems and constraints. For existing apps we review the current Laravel/PHP codebase and infrastructure.',
                    'duration'    => '1–2 weeks',
                    'outcome'     => 'Clear goals, key modules and a realistic first release or stabilisation plan.',
                    'icon'        => '/images/icons/discovery.svg',
                ],
                [
                    'step'        => 2,
                    'title'       => 'Architecture, modules & data design',
                    'description' => 'Design Laravel modules, domain models, relationships, queues and integrations. Decide what lives in the core app vs. separate services.',
                    'duration'    => '1–3 weeks',
                    'outcome'     => 'Architecture blueprint, database design and technical plan signed off.',
                    'icon'        => '/images/icons/architecture-design.svg',
                ],
                [
                    'step'        => 3,
                    'title'       => 'Implementation & integration',
                    'description' => 'Build features using Laravel best practices – controllers, services, jobs, events and policies – and integrate with frontends, mobile apps and external systems.',
                    'duration'    => '4–10+ weeks (scope-dependent)',
                    'outcome'     => 'Working Laravel application in staging or production, covering the agreed scope.',
                    'icon'        => '/images/icons/core-modules.svg',
                ],
                [
                    'step'        => 4,
                    'title'       => 'Testing, performance & hardening',
                    'description' => 'Add tests where they provide leverage, tune performance (queries, caching, queues) and harden security, backup and observability.',
                    'duration'    => '2–4 weeks',
                    'outcome'     => 'Stable, observable Laravel application ready for real-world usage.',
                    'icon'        => '/images/icons/launch.svg',
                ],
                [
                    'step'        => 5,
                    'title'       => 'Ongoing improvements & support',
                    'description' => 'Ongoing maintenance, new features, performance work and technical guidance delivered via retainers or a dedicated team model.',
                    'duration'    => 'Ongoing, month-to-month',
                    'outcome'     => 'A Laravel platform that stays healthy and evolves with your roadmap.',
                    'icon'        => '/images/icons/scale.svg',
                ],
            ],

            'cta' => [
                'label' => 'Walk me through this Laravel process for my project',
                'url'   => '/contact-us/?topic=process-laravel',
            ],
        ],

        // Use cases
        'use_cases' => [
            'id'      => 'laravel-use-cases',
            'eyebrow' => 'Where Laravel is usually the right fit',
            'title'   => 'Laravel use cases we most often deliver',
            'intro'   => 'We reach for Laravel when you need a dependable, well-understood backend for serious products and operations.',

            'items' => [
                [
                    'label'       => 'Custom business applications',
                    'description' => 'Line-of-business tools for finance, operations, HR, logistics and other teams who currently rely on spreadsheets or fragmented systems.',
                    'audience'    => 'SMBs and mid-market businesses',
                    'badge'       => 'Business apps',
                ],
                [
                    'label'       => 'Customer & partner portals',
                    'description' => 'Secure login-based portals where customers and partners interact with your services and data.',
                    'audience'    => 'B2B and B2C organisations',
                    'badge'       => 'Portals',
                ],
                [
                    'label'       => 'SaaS and subscription products',
                    'description' => 'SaaS platforms with multi-tenant architecture, billing, roles and ongoing product roadmaps.',
                    'audience'    => 'SaaS founders and product teams',
                    'badge'       => 'SaaS',
                ],
                [
                    'label'       => 'API-first platforms',
                    'description' => 'Laravel-based APIs that power web, mobile, partner integrations and future channels from a single, consistent backend.',
                    'audience'    => 'Product and platform teams',
                    'badge'       => 'APIs',
                ],
            ],

            'cta' => [
                'label' => 'Ask if your product fits these Laravel patterns',
                'url'   => '/contact-us/?topic=use-cases-laravel',
            ],
        ],

        // Stack
        'stack' => [
            'id'      => 'laravel-tech-stack',
            'eyebrow' => 'Tech stack & tooling',
            'title'   => 'Laravel stack we typically use at QalbIT',
            'intro'   => 'We use modern Laravel, PHP and a proven supporting stack so your application is easy to run and extend over time.',
            'note'    => 'If you already have a Laravel or legacy PHP codebase, we start with a review and only change what clearly improves stability, performance or maintainability.',

            'categories' => [
                [
                    'name'        => 'Runtime & framework',
                    'description' => 'Core backend foundations.',
                    'items'       => [
                        'PHP 8.x with Laravel as the primary framework.',
                        'Laravel features such as Eloquent, queues, events and policies used where they add value.',
                        'Composer-managed dependencies with clear versioning and security updates.',
                    ],
                ],
                [
                    'name'        => 'Data, caching & background work',
                    'description' => 'Persistence, performance and async execution.',
                    'items'       => [
                        'Relational databases such as MySQL/MariaDB or PostgreSQL.',
                        'Redis for caching, sessions and queue backends.',
                        'Queued jobs and scheduled tasks for slow or recurring work.',
                    ],
                ],
                [
                    'name'        => 'Frontends & integrations',
                    'description' => 'How Laravel connects to users and other systems.',
                    'items'       => [
                        'Blade + Tailwind, or APIs consumed by React/Next.js frontends.',
                        'REST/JSON APIs and webhooks for internal and external integrations.',
                        'Payment gateways, CRMs, ERPs and other services wired in through well-defined integration layers.',
                    ],
                ],
                [
                    'name'        => 'Quality, security & operations',
                    'description' => 'Keeping Laravel apps healthy in production.',
                    'items'       => [
                        'Testing (feature/unit where useful), code reviews and CI pipelines.',
                        'Logging, monitoring and error tracking configured per environment.',
                        'Containerised or managed hosting on providers like AWS, DigitalOcean or similar.',
                    ],
                ],
            ],
        ],

        // Bottom CTA
        'cta' => [
            'enabled' => true,

            'eyebrow' => 'Ready to talk Laravel?',
            'title'   => 'Let’s plan your next Laravel web application, SaaS platform or API.',
            'body'    => 'Share your current systems, goals and constraints. We will review your context and propose a Laravel-based approach that fits your budget, timelines and long-term plans.',

            'primary_label' => 'Book a Laravel discovery call',
            'primary_url'   => '/contact-us/?topic=laravel-development',
            'primary_aria'  => 'Book a Laravel discovery call with QalbIT',

            'secondary_label' => 'Send us your Laravel requirements',
            'secondary_url'   => 'https://calendly.com/abidhusain-qalbit/discuss-project',
            'secondary_aria'  => 'Send your Laravel project requirements to QalbIT',

            'meta' => 'Typically we respond within 24–48 hours with clarifying questions and next steps.',
        ],
    ],

    'flutter' => [
        'slug'        => '/technologies/flutter/',
        'name'        => 'Flutter App Development',
        'short_name'  => 'Flutter',
        'icon'        => '/images/technologies/flutter.svg',
        'category'    => 'mobile',
        'enabled'     => true,
        'order'       => 70,
        'show_home'   => true,

        'meta_title'       => 'Flutter App Development Services | QalbIT',
        'meta_description' => 'Cross-platform mobile apps for iOS and Android with QalbIT’s Flutter development services – from MVPs to production-grade customer and internal apps.',

        'tagline' => 'Cross-platform mobile apps with a single Flutter codebase.',
        'summary' => 'We use Flutter to build high-quality mobile apps for iOS and Android from one codebase – for customer-facing products, internal tools and SaaS companion apps.',

        'faq_key'      => 'flutter_faq',
        'faq_title'    => 'Flutter App Development – Frequently Asked Questions',
        'faq_subtitle' => 'Clear answers about Flutter, cross-platform mobile development and working with QalbIT on mobile apps.',

        // Hero
        'hero' => [
            'breadcrumb_label' => 'Flutter',
            'kicker_prefix'    => 'Technologies',
            'kicker_label'     => 'Flutter mobile apps',
            'kicker_detail'    => 'iOS · Android · Tablets',

            'title'     => 'Flutter app development for <span class="text-gradient-brand-animated">iOS and Android products, customer apps and internal tools</span>.',
            'highlight' => 'iOS and Android products, customer apps and internal tools',

            'intro' => 'QalbIT uses Flutter to design and build cross-platform mobile apps that feel close to native on both iOS and Android. We focus on clear user journeys, reliable offline behaviour where needed and clean integration with your backend so the app is maintainable long term.',

            'primary_cta_label' => 'Discuss your Flutter app idea',
            'primary_cta_href'  => '/contact-us/?topic=flutter',

            'secondary_cta_label' => 'Book a quick discovery call',
            'secondary_cta_href'  => 'https://calendly.com/abidhusain-qalbit/discuss-project',
        ],

        // Overview
        'overview' => [
            'id'      => 'flutter-overview',
            'eyebrow' => 'Flutter development overview',

            'title' => 'Flutter development for cross-platform mobile products',
            'intro' => 'We adopt Flutter when you want to deliver high-quality mobile apps for both iOS and Android without running and funding two completely separate codebases.',

            'left_title' => 'When Flutter with QalbIT makes sense',
            'left_items' => [
                'You need to ship on both iOS and Android without duplicating effort across two native teams.',
                'Your product is primarily content, workflows or forms – not heavy 3D graphics or console-level gaming.',
                'You want a stable, long-term mobile stack backed by Google with a strong ecosystem.',
                'You already have a web or backend platform and need a mobile companion app for customers or staff.',
            ],

            'right_title' => 'Outcomes we typically target with Flutter work',
            'right_items' => [
                'Consistent UX and branding across iOS and Android, with platform-appropriate details.',
                'A single, well-structured codebase that is faster and cheaper to maintain than two native apps.',
                'Smooth integrations with your existing APIs, auth and payment flows.',
                'A realistic roadmap for new features, OS updates and store releases over the next 12–24 months.',
            ],

            'note' => 'For some edge cases (for example very device-specific or graphics-heavy apps) we may still recommend native – otherwise Flutter is often a strong default for multi-platform products.',
        ],

        // Capabilities
        'capabilities' => [
            'id'      => 'flutter-capabilities',
            'eyebrow' => 'What we build with Flutter',
            'title'   => 'Flutter development capabilities across customer and internal apps',
            'intro'   => 'We focus Flutter on mobile applications where user experience, performance and long-term maintainability matter.',

            'items' => [
                [
                    'label'       => 'Customer-facing mobile apps',
                    'description' => 'B2B and B2C apps for customers – bookings, orders, accounts, dashboards and self-service workflows on iOS and Android.',
                    'badge'       => 'Customer apps',
                    'icon'        => '/images/icons/mobile.svg',
                ],
                [
                    'label'       => 'Internal & field operations apps',
                    'description' => 'Apps for internal teams or field staff to capture data, manage tasks, inspections, deliveries or service visits on the go.',
                    'badge'       => 'Internal tools',
                    'icon'        => '/images/icons/operations.svg',
                ],
                [
                    'label'       => 'SaaS & web product companion apps',
                    'description' => 'Flutter apps paired with existing SaaS/web platforms to provide mobile access to key features, notifications and dashboards.',
                    'badge'       => 'Companion apps',
                    'icon'        => '/images/icons/integrations.svg',
                ],
                [
                    'label'       => 'MVPs & product experiments',
                    'description' => 'Focused MVPs to validate new ideas with real users quickly, with a clear path to grow into a production-ready mobile product.',
                    'badge'       => 'MVPs',
                    'icon'        => '/images/icons/launch-light.svg',
                ],
            ],

            'cta' => [
                'label' => 'Discuss your Flutter app scope',
                'url'   => '/contact-us/?topic=flutter',
            ],
        ],

        // Process
        'process' => [
            'id'      => 'flutter-process',
            'eyebrow' => 'How Flutter projects work with QalbIT',
            'title'   => 'A structured Flutter app development process from discovery to stores',
            'intro'   => 'Our Flutter process is designed to reduce surprises around UX, integrations, timelines and app store approvals.',

            'items' => [
                [
                    'step'        => 1,
                    'title'       => 'Discovery, flows & technical review',
                    'description' => 'Understand your users, key journeys and backend systems. Map which parts of your product need to be in the app and which can stay on web.',
                    'duration'    => '1–2 weeks',
                    'outcome'     => 'User journeys, high-level information architecture and a realistic first release scope.',
                    'icon'        => '/images/icons/discovery.svg',
                ],
                [
                    'step'        => 2,
                    'title'       => 'UX, UI and app architecture',
                    'description' => 'Define navigation, screen layouts, key components and state management approach, aligned with your brand and backend APIs.',
                    'duration'    => '2–4 weeks',
                    'outcome'     => 'Approved UX/UI flows and a technical blueprint for the Flutter app.',
                    'icon'        => '/images/icons/architecture-design.svg',
                ],
                [
                    'step'        => 3,
                    'title'       => 'Implementation & API integration',
                    'description' => 'Build Flutter screens and components, wire them to your APIs, implement authentication, validation, offline behaviour and error handling.',
                    'duration'    => '4–10+ weeks (scope-dependent)',
                    'outcome'     => 'Working Flutter app builds for iOS and Android in testing or staging environments.',
                    'icon'        => '/images/icons/mobile-dark.svg',
                ],
                [
                    'step'        => 4,
                    'title'       => 'Testing, hardening & store submissions',
                    'description' => 'Functional and device testing, performance tuning, crash monitoring setup and guiding you through App Store and Play Store submission.',
                    'duration'    => '2–4 weeks',
                    'outcome'     => 'Approved app releases in stores or ready for phased rollout and internal distribution.',
                    'icon'        => '/images/icons/launch.svg',
                ],
                [
                    'step'        => 5,
                    'title'       => 'Ongoing support & new features',
                    'description' => 'Support for OS updates, bug fixes, small improvements and new features via retainers or dedicated teams.',
                    'duration'    => 'Ongoing, month-to-month',
                    'outcome'     => 'A Flutter app that keeps pace with your users, roadmap and platform changes.',
                    'icon'        => '/images/icons/scale.svg',
                ],
            ],

            'cta' => [
                'label' => 'Walk me through this Flutter process for my app',
                'url'   => '/contact-us/?topic=process-flutter',
            ],
        ],

        // Use cases
        'use_cases' => [
            'id'      => 'flutter-use-cases',
            'eyebrow' => 'Where Flutter is usually the right fit',
            'title'   => 'Flutter app use cases we most often deliver',
            'intro'   => 'Most of our Flutter projects are tied to serious products – customer apps, internal tools and SaaS platforms – not just brochure apps.',

            'items' => [
                [
                    'label'       => 'Customer apps alongside web portals',
                    'description' => 'When you already have a web portal or SaaS product and want a mobile app so customers can access key features anytime.',
                    'audience'    => 'SaaS and product teams',
                    'badge'       => 'Customer apps',
                ],
                [
                    'label'       => 'Operational and field apps',
                    'description' => 'When on-the-ground teams need reliable mobile tools for data capture, checklists, site visits, deliveries or inspections.',
                    'audience'    => 'Operations, logistics and service teams',
                    'badge'       => 'Field operations',
                ],
                [
                    'label'       => 'New product MVPs',
                    'description' => 'When you are validating a new mobile-first product and want to reach both iOS and Android users with one initial build.',
                    'audience'    => 'Founders and startups',
                    'badge'       => 'MVPs',
                ],
                [
                    'label'       => 'Modernisation of older hybrid apps',
                    'description' => 'When existing hybrid or dated mobile apps feel slow or hard to maintain, and you want a cleaner Flutter replacement.',
                    'audience'    => 'Teams with legacy apps',
                    'badge'       => 'Modernisation',
                ],
            ],

            'cta' => [
                'label' => 'Ask if your use case is a good fit for Flutter',
                'url'   => '/contact-us/?topic=use-cases-flutter',
            ],
        ],

        // Stack
        'stack' => [
            'id'      => 'flutter-tech-stack',
            'eyebrow' => 'Tech stack & tooling',
            'title'   => 'Flutter stack we typically use at QalbIT',
            'intro'   => 'We combine Flutter with proven patterns for state management, backend integrations, testing and release so your mobile app stays stable in production.',
            'note'    => 'If you already have a backend, we integrate with it. If not, we usually pair Flutter with Laravel or NestJS APIs designed specifically for your product.',

            'categories' => [
                [
                    'name'        => 'Framework & app structure',
                    'description' => 'Core Flutter foundations.',
                    'items'       => [
                        'Flutter and Dart for cross-platform mobile development.',
                        'Clean navigation and modular app structure for easier maintenance.',
                        'State management patterns selected based on complexity (for example Provider, Riverpod, Bloc or similar).',
                    ],
                ],
                [
                    'name'        => 'Backends, APIs & integrations',
                    'description' => 'Connecting the app to your systems.',
                    'items'       => [
                        'REST/JSON APIs or GraphQL, often backed by Laravel or NestJS.',
                        'Authentication and authorisation integrated with your existing identity model.',
                        'Push notifications, analytics, payment gateways and other third-party SDKs where required.',
                    ],
                ],
                [
                    'name'        => 'Offline, storage & performance',
                    'description' => 'Making the app reliable in real-world usage.',
                    'items'       => [
                        'Local storage for caching and offline-first flows where needed.',
                        'Careful handling of slow or intermittent networks, retries and error states.',
                        'Performance monitoring, crash reporting and optimisation for key screens.',
                    ],
                ],
                [
                    'name'        => 'Testing, releases & operations',
                    'description' => 'Keeping the app healthy over time.',
                    'items'       => [
                        'Automated builds and basic test coverage where it adds value.',
                        'Release pipelines for Google Play and Apple App Store (including internal testing tracks).',
                        'Crash and analytics dashboards to understand real usage and issues.',
                    ],
                ],
            ],
        ],

        // Bottom CTA
        'cta' => [
            'enabled' => true,

            'eyebrow' => 'Ready to talk Flutter?',
            'title'   => 'Let’s plan your next Flutter mobile app for iOS and Android.',
            'body'    => 'Share your idea, existing platform and target users. We will help you decide if Flutter is the right fit and propose a practical plan for your first release and beyond.',

            'primary_label' => 'Book a Flutter discovery call',
            'primary_url'   => '/contact-us/?topic=flutter-app-development',
            'primary_aria'  => 'Book a Flutter discovery call with QalbIT',

            'secondary_label' => 'Send us your Flutter app requirements',
            'secondary_url'   => 'https://calendly.com/abidhusain-qalbit/discuss-project',
            'secondary_aria'  => 'Send your Flutter app requirements to QalbIT',

            'meta' => 'Typically we respond within 24–48 hours with clarifying questions and next steps.',
        ],
    ],

    'android' => [
        'slug'        => '/technologies/android/',
        'name'        => 'Android App Development',
        'short_name'  => 'Android',
        'icon'        => '/images/technologies/android.svg',
        'category'    => 'mobile',
        'enabled'     => true,
        'order'       => 80,
        'show_home'   => false,

        'meta_title'       => 'Android App Development Services | QalbIT',
        'meta_description' => 'Native Android development with Kotlin for business-critical apps, field tools and consumer products – from MVPs to large-scale deployments.',

        'tagline' => 'Native Android applications built with Kotlin and modern Android tooling.',
        'summary' => 'We use Kotlin and the modern Android stack to build reliable, performant Android apps – from customer-facing products to internal tools and field operations apps.',

        'faq_key'      => 'android_faq',
        'faq_title'    => 'Android App Development – Frequently Asked Questions',
        'faq_subtitle' => 'Practical answers about native Android development, Kotlin, performance and how we work at QalbIT.',

        // Hero
        'hero' => [
            'breadcrumb_label' => 'Android',
            'kicker_prefix'    => 'Technologies',
            'kicker_label'     => 'Native Android apps',
            'kicker_detail'    => 'Kotlin · Jetpack · Play Store',

            'title'     => 'Android app development for <span class="text-gradient-brand-animated">customer products, internal tools and field operations</span>.',
            'highlight' => 'customer products, internal tools and field operations',

            'intro' => 'QalbIT builds native Android apps using Kotlin and the modern Android ecosystem. We focus on stable performance across real devices, robust offline behaviour where needed and tight integration with your backend and internal systems.',

            'primary_cta_label' => 'Discuss your Android app project',
            'primary_cta_href'  => '/contact-us/?topic=android',

            'secondary_cta_label' => 'Book a quick discovery call',
            'secondary_cta_href'  => 'https://calendly.com/abidhusain-qalbit/discuss-project',
        ],

        // Overview
        'overview' => [
            'id'      => 'android-overview',
            'eyebrow' => 'Android development overview',

            'title' => 'Native Android development for serious products and operations',
            'intro' => 'We recommend native Android when your app is business-critical, needs deep device integrations or must perform reliably across a wide range of Android hardware.',

            'left_title' => 'When Android with QalbIT makes sense',
            'left_items' => [
                'You have an Android-heavy user base and need the best possible performance and device support.',
                'Your app depends on deeper device features such as background services, sensors, hardware integrations or complex offline behaviour.',
                'You are modernising an existing Java-based Android app and want to move cleanly to Kotlin and the latest Android guidelines.',
                'You need a partner comfortable with both product UX and the realities of Android fragmentation and deployment.',
            ],

            'right_title' => 'Outcomes we typically target with Android work',
            'right_items' => [
                'Stable, predictable Android apps that work well across common devices and OS versions.',
                'Modern Kotlin codebases that are easier to maintain, extend and test.',
                'Clean integration with backends, APIs, auth systems and analytics.',
                'A clear release and update process for Play Store and private distributions.',
            ],

            'note' => 'Where it makes sense, we may still complement native Android with cross-platform code or shared backends – but the core experience remains tailored to Android.',
        ],

        // Capabilities
        'capabilities' => [
            'id'      => 'android-capabilities',
            'eyebrow' => 'What we build with Android',
            'title'   => 'Android development capabilities across customer and internal apps',
            'intro'   => 'We focus on Android apps that carry real business value – core product experiences, operations tools and companion apps for platforms you already run.',

            'items' => [
                [
                    'label'       => 'Customer-facing Android apps',
                    'description' => 'Consumer and B2B apps for booking, ordering, account management, dashboards and self-service workflows built natively for Android.',
                    'badge'       => 'Customer apps',
                    'icon'        => '/images/icons/mobile.svg',
                ],
                [
                    'label'       => 'Internal & field operations apps',
                    'description' => 'Apps for internal teams or field staff to capture data, manage routes, inspections, deliveries or service visits – often with offline and background sync.',
                    'badge'       => 'Field tools',
                    'icon'        => '/images/icons/operations.svg',
                ],
                [
                    'label'       => 'Companion apps for SaaS & platforms',
                    'description' => 'Android apps that extend your existing SaaS, ERP or web portals with mobile access, push notifications and on-the-go workflows.',
                    'badge'       => 'Companion apps',
                    'icon'        => '/images/icons/integrations.svg',
                ],
                [
                    'label'       => 'Modernisation of legacy Android apps',
                    'description' => 'Reworking older Java or legacy-architecture apps into modern Kotlin-based Android applications that are faster and easier to support.',
                    'badge'       => 'Modernisation',
                    'icon'        => '/images/icons/architecture.svg',
                ],
            ],

            'cta' => [
                'label' => 'Discuss your Android app requirements',
                'url'   => '/contact-us/?topic=android',
            ],
        ],

        // Process
        'process' => [
            'id'      => 'android-process',
            'eyebrow' => 'How Android projects work with QalbIT',
            'title'   => 'A practical Android app development process from idea to Play Store',
            'intro'   => 'Our Android process balances UX, engineering and release constraints, so you can ship and iterate without surprises.',

            'items' => [
                [
                    'step'        => 1,
                    'title'       => 'Discovery, requirements & technical review',
                    'description' => 'Clarify your product goals, user journeys, target devices and OS versions. Audit any existing Android app, backend or APIs if they already exist.',
                    'duration'    => '1–2 weeks',
                    'outcome'     => 'Clear scope for the first version, technical constraints and a shared roadmap.',
                    'icon'        => '/images/icons/discovery.svg',
                ],
                [
                    'step'        => 2,
                    'title'       => 'UX flows, UI design & architecture',
                    'description' => 'Design navigation, screens and user interactions following Android best practices. Define app architecture, modules and key patterns (for example MVVM, Jetpack).',
                    'duration'    => '2–4 weeks',
                    'outcome'     => 'Approved UX/UI design and a practical technical blueprint for the Android app.',
                    'icon'        => '/images/icons/architecture-design.svg',
                ],
                [
                    'step'        => 3,
                    'title'       => 'Development & backend integration',
                    'description' => 'Implement screens and components in Kotlin, integrate with APIs, handle authentication, background tasks, local storage and error states.',
                    'duration'    => '4–10+ weeks (scope-dependent)',
                    'outcome'     => 'Working Android builds ready for internal testing on target devices.',
                    'icon'        => '/images/icons/mobile-dark.svg',
                ],
                [
                    'step'        => 4,
                    'title'       => 'Testing, optimisation & release',
                    'description' => 'Functional and device testing, performance tuning, crash monitoring setup and guidance through Google Play release or alternative distribution.',
                    'duration'    => '2–4 weeks',
                    'outcome'     => 'Stable Android release rolled out via internal tracks, staged rollout or public launch.',
                    'icon'        => '/images/icons/launch.svg',
                ],
                [
                    'step'        => 5,
                    'title'       => 'Support, updates & new features',
                    'description' => 'Ongoing support for OS updates, device changes, bug fixes and feature iterations via retainer or dedicated team models.',
                    'duration'    => 'Ongoing, month-to-month',
                    'outcome'     => 'An Android app that remains compatible, secure and aligned with your roadmap.',
                    'icon'        => '/images/icons/scale.svg',
                ],
            ],

            'cta' => [
                'label' => 'Walk me through this Android process for my app',
                'url'   => '/contact-us/?topic=process-android',
            ],
        ],

        // Use cases
        'use_cases' => [
            'id'      => 'android-use-cases',
            'eyebrow' => 'Where native Android is usually the right fit',
            'title'   => 'Android app use cases we often deliver',
            'intro'   => 'We focus Android on scenarios where device reach, performance or platform-specific behaviour are important to the business.',

            'items' => [
                [
                    'label'       => 'Android-first customer bases',
                    'description' => 'Products where a large portion of your users are on Android, especially in regions where Android dominates.',
                    'audience'    => 'Consumer and B2B products',
                    'badge'       => 'Android-first',
                ],
                [
                    'label'       => 'Field and on-site operations',
                    'description' => 'Logistics, inspections, delivery and service teams using Android phones, tablets or rugged devices in the field.',
                    'audience'    => 'Operations, logistics, field teams',
                    'badge'       => 'Field operations',
                ],
                [
                    'label'       => 'Deep device integrations',
                    'description' => 'Apps requiring advanced use of sensors, background services, system-level integrations or specialised hardware on Android.',
                    'audience'    => 'Specialised and industrial use cases',
                    'badge'       => 'Device-level',
                ],
                [
                    'label'       => 'Legacy Android app rebuilds',
                    'description' => 'Existing Java or legacy apps that are hard to maintain, where a modern Kotlin/Jetpack rebuild reduces long-term risk.',
                    'audience'    => 'Teams with aging apps',
                    'badge'       => 'Modernisation',
                ],
            ],

            'cta' => [
                'label' => 'Ask if your use case needs native Android',
                'url'   => '/contact-us/?topic=use-cases-android',
            ],
        ],

        // Stack
        'stack' => [
            'id'      => 'android-tech-stack',
            'eyebrow' => 'Tech stack & tooling',
            'title'   => 'Android stack we typically use at QalbIT',
            'intro'   => 'We use a modern Android stack built around Kotlin, Jetpack and clean architecture so your app is easier to evolve and support.',
            'note'    => 'We can integrate with your existing backend, or design a new API layer (often with Laravel or NestJS) that serves both Android and other clients.',

            'categories' => [
                [
                    'name'        => 'Language & core frameworks',
                    'description' => 'Modern Android foundations.',
                    'items'       => [
                        'Kotlin as the primary language for new Android app development.',
                        'Jetpack libraries for navigation, lifecycle, ViewModel and other common concerns.',
                        'Jetpack Compose or XML-based UIs depending on project needs and existing code.',
                    ],
                ],
                [
                    'name'        => 'Data, networking & offline support',
                    'description' => 'How we handle data and connectivity.',
                    'items'       => [
                        'Retrofit/OkHttp or similar libraries for robust API communication.',
                        'Room or equivalent for local data persistence and caching.',
                        'WorkManager and background jobs for sync and scheduled tasks.',
                    ],
                ],
                [
                    'name'        => 'Integrations & services',
                    'description' => 'Connecting the app to your systems and third parties.',
                    'items'       => [
                        'REST/JSON or GraphQL APIs integrated with your backend.',
                        'Push notifications, analytics (for example Firebase Analytics) and crash reporting.',
                        'Payment, maps, location, camera and other device/SDK integrations where needed.',
                    ],
                ],
                [
                    'name'        => 'Quality, releases & monitoring',
                    'description' => 'Keeping the app stable in production.',
                    'items'       => [
                        'Unit and instrumentation tests where they add value for critical flows.',
                        'Build and release pipelines integrated with Google Play internal, alpha and production tracks.',
                        'Crash and performance monitoring with tools such as Firebase Crashlytics and similar platforms.',
                    ],
                ],
            ],
        ],

        // Bottom CTA
        'cta' => [
            'enabled' => true,

            'eyebrow' => 'Ready to talk Android?',
            'title'   => 'Let’s plan your next Android app or modernise the one you already have.',
            'body'    => 'Share your idea, current Android app (if any), backend stack and timelines. We will review the details and propose a practical Android plan that matches your stage and risk profile.',

            'primary_label' => 'Book an Android discovery call',
            'primary_url'   => '/contact-us/?topic=android-app-development',
            'primary_aria'  => 'Book an Android app development discovery call with QalbIT',

            'secondary_label' => 'Send us your Android requirements',
            'secondary_url'   => 'https://calendly.com/abidhusain-qalbit/discuss-project',
            'secondary_aria'  => 'Send your Android app requirements to QalbIT',

            'meta' => 'Typically we respond within 24–48 hours with clarifying questions and next steps.',
        ],
    ],

    'react-native' => [
        'slug'        => '/technologies/react-native/',
        'name'        => 'React Native App Development',
        'short_name'  => 'React Native',
        'icon'        => '/images/technologies/reactjs.svg',
        'category'    => 'mobile',
        'enabled'     => true,
        'order'       => 90,
        'show_home'   => false,

        'meta_title'       => 'React Native App Development Services | QalbIT',
        'meta_description' => 'Cross-platform mobile apps for iOS and Android using React Native, built by QalbIT for SaaS products, consumer apps and internal tools.',

        'tagline' => 'Cross-platform iOS and Android apps with React Native.',
        'summary' => 'We use React Native to build and maintain cross-platform mobile apps that share a single codebase for iOS and Android, while still integrating with native capabilities and backends.',

        'faq_key'      => 'reactnative_faq',
        'faq_title'    => 'React Native Development – Frequently Asked Questions',
        'faq_subtitle' => 'Answers about React Native, cross-platform trade-offs and how QalbIT delivers mobile apps with it.',

        // Hero
        'hero' => [
            'breadcrumb_label' => 'React Native',
            'kicker_prefix'    => 'Technologies',
            'kicker_label'     => 'Cross-platform mobile apps',
            'kicker_detail'    => 'iOS · Android · APIs',

            'title'     => 'React Native app development for <span class="text-gradient-brand-animated">modern products, customer apps and internal tools</span>.',
            'highlight' => 'modern products, customer apps and internal tools',

            'intro' => 'QalbIT uses React Native when you want one shared codebase for iOS and Android without sacrificing too much on UX or performance. We design mobile experiences that work smoothly across platforms and integrate cleanly with your APIs, auth and analytics.',

            'primary_cta_label' => 'Discuss your React Native app',
            'primary_cta_href'  => '/contact-us/?topic=reactnative',

            'secondary_cta_label' => 'Book a quick discovery call',
            'secondary_cta_href'  => 'https://calendly.com/abidhusain-qalbit/discuss-project',
        ],

        // Overview
        'overview' => [
            'id'      => 'reactnative-overview',
            'eyebrow' => 'React Native development overview',

            'title' => 'React Native development for cross-platform mobile products',
            'intro' => 'React Native can be a strong fit when you want to launch on both iOS and Android with a shared codebase, while staying close to the React ecosystem you already use on the web.',

            'left_title' => 'When React Native with QalbIT makes sense',
            'left_items' => [
                'You want to support both iOS and Android without maintaining two completely separate native apps.',
                'Your team already uses React/TypeScript on the web and wants to reuse skills and patterns on mobile.',
                'You are building a SaaS, marketplace or operations app where consistent UX across platforms matters more than deep platform-specific UI.',
                'You need a partner who understands both React and mobile platform constraints – performance, offline behaviour and store guidelines.',
            ],

            'right_title' => 'Outcomes we typically target with React Native work',
            'right_items' => [
                'A single, maintainable codebase for iOS and Android that your team can understand.',
                'Good enough performance and UX on real-world devices and networks.',
                'Clean integration with your backend, auth, payments and internal systems.',
                'A pragmatic roadmap for when to use shared components vs platform-specific customisations.',
            ],

            'note' => 'If certain features clearly need native implementation (for example heavy graphics or specialised hardware), we can mix React Native with native modules or, where required, propose native Android/iOS for those parts.',
        ],

        // Capabilities
        'capabilities' => [
            'id'      => 'reactnative-capabilities',
            'eyebrow' => 'What we build with React Native',
            'title'   => 'React Native capabilities across product and internal apps',
            'intro'   => 'We use React Native mainly for product-grade apps that benefit from cross-platform reach – not just simple prototypes.',

            'items' => [
                [
                    'label'       => 'Product and SaaS companion apps',
                    'description' => 'Mobile companion apps for your SaaS or web platforms – account management, dashboards, notifications and key workflows on the go.',
                    'badge'       => 'SaaS & platforms',
                    'icon'        => '/images/icons/mobile.svg',
                ],
                [
                    'label'       => 'Customer-facing mobile apps',
                    'description' => 'Booking, ordering, marketplace or portal apps that run on both iOS and Android with a shared React Native codebase.',
                    'badge'       => 'Customer apps',
                    'icon'        => '/images/icons/customer.svg',
                ],
                [
                    'label'       => 'Internal and field tools',
                    'description' => 'React Native apps for sales, operations or support teams that need access to core workflows, even while travelling.',
                    'badge'       => 'Internal tools',
                    'icon'        => '/images/icons/operations.svg',
                ],
                [
                    'label'       => 'Modernisation of hybrid/legacy apps',
                    'description' => 'Replacing older hybrid or webview-based mobile apps with a cleaner React Native architecture backed by stable APIs.',
                    'badge'       => 'Modernisation',
                    'icon'        => '/images/icons/architecture.svg',
                ],
            ],

            'cta' => [
                'label' => 'Discuss if React Native is right for your app',
                'url'   => '/contact-us/?topic=reactnative',
            ],
        ],

        // Process
        'process' => [
            'id'      => 'reactnative-process',
            'eyebrow' => 'How React Native projects work with QalbIT',
            'title'   => 'A practical React Native process from discovery to app stores',
            'intro'   => 'We treat React Native projects like any serious mobile product – with structured discovery, design, implementation and release.',

            'items' => [
                [
                    'step'        => 1,
                    'title'       => 'Discovery & fit assessment',
                    'description' => 'Understand your product goals, target platforms, existing web or backend stack and constraints. Confirm that React Native is a good fit versus Flutter or fully native.',
                    'duration'    => '1–2 weeks',
                    'outcome'     => 'Clarity on whether React Native is suitable and a scoped first release.',
                    'icon'        => '/images/icons/discovery.svg',
                ],
                [
                    'step'        => 2,
                    'title'       => 'UX flows, UI design & architecture',
                    'description' => 'Design cross-platform UX, navigation and key screens. Define React Native architecture, state management and module boundaries aligned with your APIs.',
                    'duration'    => '2–4 weeks',
                    'outcome'     => 'Approved designs and a technical blueprint for the React Native app.',
                    'icon'        => '/images/icons/architecture-design.svg',
                ],
                [
                    'step'        => 3,
                    'title'       => 'Development & integration',
                    'description' => 'Implement screens and components, integrate with APIs, handle auth, offline states, push notifications and platform-specific behaviours where needed.',
                    'duration'    => '4–10+ weeks (scope-dependent)',
                    'outcome'     => 'Working React Native builds for iOS and Android ready for internal testing.',
                    'icon'        => '/images/icons/mobile-dark.svg',
                ],
                [
                    'step'        => 4,
                    'title'       => 'Testing, optimisation & release',
                    'description' => 'Functional testing on target devices, performance checks, crash/error tracking and guidance through App Store and Google Play releases.',
                    'duration'    => '2–4 weeks',
                    'outcome'     => 'Stable React Native releases published via test tracks and production stores.',
                    'icon'        => '/images/icons/launch.svg',
                ],
                [
                    'step'        => 5,
                    'title'       => 'Support & iterations',
                    'description' => 'Ongoing support for OS updates, library upgrades, bug fixes and new features through retainers or dedicated squads.',
                    'duration'    => 'Ongoing, month-to-month',
                    'outcome'     => 'A React Native app that stays healthy and aligned with your roadmap.',
                    'icon'        => '/images/icons/scale.svg',
                ],
            ],

            'cta' => [
                'label' => 'Walk me through this React Native process',
                'url'   => '/contact-us/?topic=process-reactnative',
            ],
        ],

        // Use cases
        'use_cases' => [
            'id'      => 'reactnative-use-cases',
            'eyebrow' => 'Where React Native is usually the right fit',
            'title'   => 'React Native use cases we commonly see',
            'intro'   => 'We focus React Native on scenarios where you want to move fast across platforms while keeping a clean codebase.',

            'items' => [
                [
                    'label'       => 'Web product with mobile extension',
                    'description' => 'You already have a React/Next.js web product and want a mobile extension for iOS and Android without two fully separate native teams.',
                    'audience'    => 'SaaS and web product teams',
                    'badge'       => 'Companion app',
                ],
                [
                    'label'       => 'Cross-platform MVPs',
                    'description' => 'You want to validate a product with both iOS and Android users quickly, while keeping scope focused and maintainable.',
                    'audience'    => 'Founders and product owners',
                    'badge'       => 'MVP',
                ],
                [
                    'label'       => 'Operational and internal tools',
                    'description' => 'Internal apps for teams that use a mix of iOS and Android devices, where shared logic is more important than pixel-perfect platform-specific UI.',
                    'audience'    => 'Ops, sales, service teams',
                    'badge'       => 'Internal tools',
                ],
                [
                    'label'       => 'Rebuilds of older hybrid apps',
                    'description' => 'Existing Cordova/Ionic or webview-heavy apps that need a more modern, maintainable approach without going fully native on two platforms.',
                    'audience'    => 'Teams with legacy hybrid apps',
                    'badge'       => 'Modernisation',
                ],
            ],

            'cta' => [
                'label' => 'Ask if your use case suits React Native',
                'url'   => '/contact-us/?topic=use-cases-reactnative',
            ],
        ],

        // Stack
        'stack' => [
            'id'      => 'reactnative-tech-stack',
            'eyebrow' => 'Tech stack & tooling',
            'title'   => 'React Native stack we typically use at QalbIT',
            'intro'   => 'We use a modern React Native stack centred on TypeScript, stable libraries and predictable state management.',
            'note'    => 'If you already use React on the web, we will align patterns where it makes sense so your team can work across both codebases.',

            'categories' => [
                [
                    'name'        => 'Core frameworks & language',
                    'description' => 'How we structure React Native apps.',
                    'items'       => [
                        'React Native with functional components and hooks.',
                        'TypeScript for safer, more maintainable code.',
                        'Navigation libraries such as React Navigation for robust routing patterns.',
                    ],
                ],
                [
                    'name'        => 'State, networking & forms',
                    'description' => 'Managing data and app state cleanly.',
                    'items'       => [
                        'React Query / TanStack Query or similar for server state management.',
                        'Lightweight state management (Context, Zustand or Redux where appropriate).',
                        'API integration with fetch/axios and consistent error/loading handling.',
                    ],
                ],
                [
                    'name'        => 'Native modules & integrations',
                    'description' => 'Connecting to device and third-party services.',
                    'items'       => [
                        'Push notifications, deep links and background tasks where needed.',
                        'Integrations with maps, camera, file storage and common SDKs.',
                        'Bridging to native Android/iOS modules when platform-specific behaviour is required.',
                    ],
                ],
                [
                    'name'        => 'Quality, releases & monitoring',
                    'description' => 'Keeping the app stable on both platforms.',
                    'items'       => [
                        'Basic unit and integration tests for critical flows.',
                        'CI/CD pipelines for building and distributing to Android and iOS test tracks.',
                        'Crash and performance monitoring via tools such as Sentry or Firebase Crashlytics.',
                    ],
                ],
            ],
        ],

        // Bottom CTA
        'cta' => [
            'enabled' => true,

            'eyebrow' => 'Ready to talk React Native?',
            'title'   => 'Let’s plan your cross-platform React Native app or review your existing one.',
            'body'    => 'Share your current product, tech stack and mobile goals. We will help you decide whether React Native is the right approach and outline a realistic first release and roadmap.',

            'primary_label' => 'Book a React Native discovery call',
            'primary_url'   => '/contact-us/?topic=react-native-development',
            'primary_aria'  => 'Book a React Native development discovery call with QalbIT',

            'secondary_label' => 'Send us your React Native requirements',
            'secondary_url'   => 'https://calendly.com/abidhusain-qalbit/discuss-project',
            'secondary_aria'  => 'Send your React Native app requirements to QalbIT',

            'meta' => 'Typically we respond within 24–48 hours with clarifying questions and next steps.',
        ],
    ],

    'wordpress' => [
        'slug'        => '/technologies/wordpress/',
        'name'        => 'WordPress Development',
        'short_name'  => 'WordPress',
        'icon'        => '/images/technologies/wordpress.svg',
        'category'    => 'cms',
        'enabled'     => true,
        'order'       => 100,
        'show_home'   => false,

        'meta_title'       => 'WordPress Development Services | QalbIT',
        'meta_description' => 'Custom WordPress development, performance optimisation, WooCommerce and headless WordPress for modern content and marketing websites.',

        'tagline' => 'Custom WordPress and WooCommerce development that goes beyond basic themes.',
        'summary' => 'We use WordPress for content-heavy, SEO-focused and e-commerce sites where you need stability, performance and long-term maintainability instead of quick theme hacks.',

        'faq_key'      => 'wordpress_faq',
        'faq_title'    => 'WordPress Development – Frequently Asked Questions',
        'faq_subtitle' => 'Answers about custom WordPress builds, performance, WooCommerce and headless setups with QalbIT.',

        // Hero
        'hero' => [
            'breadcrumb_label' => 'WordPress',
            'kicker_prefix'    => 'Technologies',
            'kicker_label'     => 'WordPress & WooCommerce',
            'kicker_detail'    => 'Custom themes · Plugins · Headless',

            'title'     => 'WordPress development for <span class="text-gradient-brand-animated">content sites, marketing websites and WooCommerce stores</span>.',
            'highlight' => 'content sites, marketing websites and WooCommerce stores',

            'intro' => 'QalbIT uses WordPress when you need a dependable CMS with strong editorial workflows and SEO capabilities – not just a quick theme. We design custom themes, build plugins, optimise performance and, where needed, connect WordPress to modern frontends such as Next.js.',

            'primary_cta_label' => 'Discuss your WordPress project',
            'primary_cta_href'  => '/contact-us/?topic=wordpress',

            'secondary_cta_label' => 'Book a quick discovery call',
            'secondary_cta_href'  => 'https://calendly.com/abidhusain-qalbit/discuss-project',
        ],

        // Overview
        'overview' => [
            'id'      => 'wordpress-overview',
            'eyebrow' => 'WordPress development overview',

            'title' => 'WordPress development for serious content and e-commerce needs',
            'intro' => 'We treat WordPress as a core CMS and application platform – with proper architecture, performance, security and a roadmap – rather than a collection of random plugins.',

            'left_title' => 'When WordPress with QalbIT makes sense',
            'left_items' => [
                'You need a content-driven or marketing website with strong SEO and easy publishing workflows.',
                'You want a WooCommerce store but with sensible customisation instead of a fragile theme stack.',
                'You are considering headless WordPress as a CMS feeding a modern frontend (for example Next.js).',
                'You want a partner that can stabilise an existing WordPress installation and then improve it step by step.',
            ],

            'right_title' => 'Outcomes we typically target with WordPress work',
            'right_items' => [
                'Clean, fast-loading WordPress sites that perform well on Core Web Vitals.',
                'Reduced plugin bloat and a more maintainable codebase (child theme, custom code where it belongs).',
                'Confident editorial workflows with clear roles, staging environments and backup strategies.',
                'WooCommerce setups that are stable, secure and integrated with your payment and logistics stack.',
            ],

            'note' => 'If your current WordPress setup is fragile or slow, we can start with an audit and stabilisation phase before adding new features or redesigns.',
        ],

        // Capabilities
        'capabilities' => [
            'id'      => 'wordpress-capabilities',
            'eyebrow' => 'What we build with WordPress',
            'title'   => 'WordPress capabilities across content, marketing and commerce',
            'intro'   => 'From corporate websites to high-traffic blogs and WooCommerce stores, we focus on stability, performance and a content workflow that your team can actually use.',

            'items' => [
                [
                    'label'       => 'Corporate & marketing websites',
                    'description' => 'Custom WordPress themes for corporate, B2B and service websites with strong SEO and clear lead-generation flows.',
                    'badge'       => 'Marketing sites',
                    'icon'        => '/images/icons/website.svg',
                ],
                [
                    'label'       => 'Blogs & content hubs',
                    'description' => 'Content-heavy blogs, resources and documentation sites with structured content types, categories and author workflows.',
                    'badge'       => 'Content',
                    'icon'        => '/images/icons/content.svg',
                ],
                [
                    'label'       => 'WooCommerce stores',
                    'description' => 'WooCommerce-based e-commerce stores with custom checkout flows, payment gateway integrations and performance optimisation.',
                    'badge'       => 'E-commerce',
                    'icon'        => '/images/icons/cart.svg',
                ],
                [
                    'label'       => 'Headless WordPress as CMS',
                    'description' => 'Headless WordPress setups exposing content via REST/GraphQL APIs to frontends built in Next.js or other frameworks.',
                    'badge'       => 'Headless CMS',
                    'icon'        => '/images/icons/api.svg',
                ],
            ],

            'cta' => [
                'label' => 'Talk through your WordPress use case',
                'url'   => '/contact-us/?topic=wordpress',
            ],
        ],

        // Process
        'process' => [
            'id'      => 'wordpress-process',
            'eyebrow' => 'How WordPress projects work with QalbIT',
            'title'   => 'A structured WordPress process from audit to launch',
            'intro'   => 'Whether we are improving an existing WordPress site or building a new one, we follow a clear process so you always know what is happening.',

            'items' => [
                [
                    'step'        => 1,
                    'title'       => 'Discovery & audit',
                    'description' => 'Review your goals, content structure, plugins, theme, hosting and performance. Identify risks such as plugin conflicts, security issues and SEO gaps.',
                    'duration'    => '1–2 weeks',
                    'outcome'     => 'Audit report and recommended approach for new build or stabilisation.',
                    'icon'        => '/images/icons/discovery.svg',
                ],
                [
                    'step'        => 2,
                    'title'       => 'Information architecture & design',
                    'description' => 'Define sitemaps, content types, taxonomies and page templates. Create designs or align with your existing brand to ensure a consistent UX.',
                    'duration'    => '2–4 weeks',
                    'outcome'     => 'Agreed sitemaps, wireframes and key page designs.',
                    'icon'        => '/images/icons/architecture-design.svg',
                ],
                [
                    'step'        => 3,
                    'title'       => 'Theme & plugin implementation',
                    'description' => 'Develop custom themes (or child themes), implement required plugins, create custom post types and fields, and configure WooCommerce where relevant.',
                    'duration'    => '3–8+ weeks (scope-dependent)',
                    'outcome'     => 'Working WordPress site on staging with main templates and features in place.',
                    'icon'        => '/images/icons/core-modules.svg',
                ],
                [
                    'step'        => 4,
                    'title'       => 'Content migration, testing & optimisation',
                    'description' => 'Migrate or create content, test across devices, refine performance (caching, images, queries) and harden security and backups.',
                    'duration'    => '2–4 weeks',
                    'outcome'     => 'Optimised site ready to go live with content and SEO basics in place.',
                    'icon'        => '/images/icons/launch.svg',
                ],
                [
                    'step'        => 5,
                    'title'       => 'Launch & ongoing care',
                    'description' => 'Go live with a controlled cutover plan and provide ongoing updates, security patches and small improvements via a maintenance or AMC model.',
                    'duration'    => 'Ongoing, month-to-month',
                    'outcome'     => 'A WordPress site that stays secure, fast and aligned with your content strategy.',
                    'icon'        => '/images/icons/scale.svg',
                ],
            ],

            'cta' => [
                'label' => 'Walk me through this WordPress process',
                'url'   => '/contact-us/?topic=process-wordpress',
            ],
        ],

        // Use cases
        'use_cases' => [
            'id'      => 'wordpress-use-cases',
            'eyebrow' => 'Where WordPress is usually the right fit',
            'title'   => 'WordPress use cases we most often deliver',
            'intro'   => 'We recommend WordPress where content, SEO and editorial workflows are core to the project.',

            'items' => [
                [
                    'label'       => 'Corporate and service websites',
                    'description' => 'Multi-page corporate or services sites where you need strong content structure, case studies and lead generation forms.',
                    'audience'    => 'Service businesses and B2B companies',
                    'badge'       => 'Corporate web',
                ],
                [
                    'label'       => 'Content & SEO-driven blogs',
                    'description' => 'Blogs and content hubs targeting specific markets, where publishing speed and SEO foundations matter.',
                    'audience'    => 'Marketing and content teams',
                    'badge'       => 'Content',
                ],
                [
                    'label'       => 'WooCommerce e-commerce',
                    'description' => 'Stores selling products, services or subscriptions with payment gateways, shipping rules and tax logic.',
                    'audience'    => 'Retail, D2C and B2B sellers',
                    'badge'       => 'E-commerce',
                ],
                [
                    'label'       => 'Headless CMS for web apps',
                    'description' => 'Using WordPress primarily as a content repository feeding a React/Next.js frontend or mobile app.',
                    'audience'    => 'Product and platform teams',
                    'badge'       => 'Headless',
                ],
            ],

            'cta' => [
                'label' => 'Ask if your project is a good fit for WordPress',
                'url'   => '/contact-us/?topic=use-cases-wordpress',
            ],
        ],

        // Stack
        'stack' => [
            'id'      => 'wordpress-tech-stack',
            'eyebrow' => 'Tech stack & tooling',
            'title'   => 'WordPress stack we typically use at QalbIT',
            'intro'   => 'We focus on stable, well-supported WordPress plugins and patterns instead of piling on unnecessary complexity.',
            'note'    => 'If you already have a WordPress stack in place, we will review it and keep what is working before proposing changes.',

            'categories' => [
                [
                    'name'        => 'Core WordPress setup',
                    'description' => 'How we structure the base system.',
                    'items'       => [
                        'Latest stable WordPress versions with properly configured themes and child themes.',
                        'Gutenberg blocks and custom block patterns where they improve editing workflows.',
                        'Custom post types and taxonomies for structured content.',
                    ],
                ],
                [
                    'name'        => 'Custom development & integration',
                    'description' => 'Tailoring WordPress to your needs.',
                    'items'       => [
                        'Custom plugins and integrations for business-specific logic.',
                        'APIs and webhooks to connect with CRMs, ERPs, marketing tools and other systems.',
                        'Headless setups exposing content via REST or GraphQL to modern frontends.',
                    ],
                ],
                [
                    'name'        => 'Performance, security & hosting',
                    'description' => 'Keeping sites fast and secure.',
                    'items'       => [
                        'Caching layers, optimised images and asset pipelines for speed.',
                        'Hardened security, permissions and backup/restore processes.',
                        'Hosting on reliable providers with staging environments and SSL everywhere.',
                    ],
                ],
                [
                    'name'        => 'Workflow, quality & monitoring',
                    'description' => 'Ensuring consistent quality over time.',
                    'items'       => [
                        'Version control for themes/plugins and scripted deployments.',
                        'Basic automated checks for coding standards and key templates.',
                        'Monitoring, uptime checks and analytics integrations for ongoing insight.',
                    ],
                ],
            ],
        ],

        // Bottom CTA
        'cta' => [
            'enabled' => true,

            'eyebrow' => 'Ready to talk WordPress?',
            'title'   => 'Let’s stabilise, improve or rebuild your WordPress site.',
            'body'    => 'Whether you need a new WordPress build, WooCommerce store or a rescue for an existing site, we can review your current setup and propose a pragmatic plan that matches your goals and budget.',

            'primary_label' => 'Book a WordPress consultation',
            'primary_url'   => '/contact-us/?topic=wordpress-development',
            'primary_aria'  => 'Book a WordPress development consultation with QalbIT',

            'secondary_label' => 'Send us your WordPress requirements',
            'secondary_url'   => 'https://calendly.com/abidhusain-qalbit/discuss-project',
            'secondary_aria'  => 'Send your WordPress requirements to QalbIT',

            'meta' => 'Typically we respond within 24–48 hours with clarifying questions and next steps.',
        ],
    ],

    'codeigniter' => [
        'slug'        => '/technologies/codeigniter/',
        'name'        => 'CodeIgniter Development & Modernisation',
        'short_name'  => 'CodeIgniter',
        'icon'        => '/images/technologies/codeigniter.svg',
        'category'    => 'other',
        'enabled'     => true,
        'order'       => 110,
        'show_home'   => false,

        'meta_title'       => 'CodeIgniter Development & Modernisation Services | QalbIT',
        'meta_description' => 'Stabilise, extend or migrate legacy CodeIgniter applications with QalbIT – from quick fixes and performance tuning to full Laravel migrations.',

        'tagline' => 'Stabilise, extend or migrate your legacy CodeIgniter application safely.',
        'summary' => 'We help teams keep business-critical CodeIgniter systems reliable and secure, and when the time is right, plan and execute a safe, phased migration to modern PHP stacks such as Laravel.',

        'faq_key'      => 'codeigniter_faq',
        'faq_title'    => 'CodeIgniter Development & Modernisation – Frequently Asked Questions',
        'faq_subtitle' => 'Practical answers about stabilising, extending and migrating CodeIgniter applications with QalbIT.',

        // Hero
        'hero' => [
            'breadcrumb_label' => 'CodeIgniter',
            'kicker_prefix'    => 'Technologies',
            'kicker_label'     => 'Legacy PHP & CodeIgniter',
            'kicker_detail'    => 'Stabilisation · Refactor · Migration',

            'title'     => 'CodeIgniter development, rescue and migration for <span class="text-gradient-brand-animated">business-critical PHP applications</span>.',
            'highlight' => 'business-critical PHP applications',

            'intro' => 'QalbIT works with teams who still rely on CodeIgniter for core operations. We stabilise existing apps, reduce risk, improve performance and, when appropriate, design a clear path to modern stacks such as Laravel – without risking a big-bang rewrite that breaks everything.',

            'primary_cta_label' => 'Discuss your CodeIgniter system',
            'primary_cta_href'  => '/contact-us/?topic=codeigniter',

            'secondary_cta_label' => 'Request a CodeIgniter audit',
            'secondary_cta_href'  => '/contact-us/?topic=audit-codeigniter',
        ],

        // Overview
        'overview' => [
            'id'      => 'codeigniter-overview',
            'eyebrow' => 'CodeIgniter development overview',

            'title' => 'CodeIgniter modernisation and support for legacy PHP systems',
            'intro' => 'We help you get control over legacy CodeIgniter systems: first by stabilising and documenting what you already have, then by planning new features or a gradual migration to a more modern framework.',

            'left_title' => 'When CodeIgniter with QalbIT makes sense',
            'left_items' => [
                'You have an existing CodeIgniter application that is critical for your business and cannot simply be switched off.',
                'Your current app is slow, fragile or hard to maintain, but a full rewrite feels too risky right now.',
                'You want to gradually move from CodeIgniter to Laravel or a modern PHP stack without disrupting day-to-day operations.',
                'You need a partner comfortable working with older PHP while still thinking in terms of clean architecture and future migration.',
            ],

            'right_title' => 'Outcomes we typically target with CodeIgniter work',
            'right_items' => [
                'A stabilised, monitored and documented CodeIgniter application that you can rely on.',
                'Reduced operational risk through backups, basic tests and clear deployment processes.',
                'A realistic roadmap for introducing new features without breaking legacy behaviour.',
                'A phased migration plan to Laravel or other stacks when the timing, budget and risk profile are right.',
            ],

            'note' => 'For many teams, the right first step is not a rewrite but a focused audit and stabilisation phase that reduces risk and buys time to plan a thoughtful migration.',
        ],

        // Capabilities
        'capabilities' => [
            'id'      => 'codeigniter-capabilities',
            'eyebrow' => 'What we do with CodeIgniter',
            'title'   => 'CodeIgniter capabilities – from rescue and refactor to migration',
            'intro'   => 'We focus on making your existing CodeIgniter system safer and more predictable, while preparing it for the future.',

            'items' => [
                [
                    'label'       => 'Legacy app audit & stabilisation',
                    'description' => 'Health checks for your CodeIgniter app – code, database, hosting and security – with a practical list of risks and quick wins.',
                    'badge'       => 'Audit',
                    'icon'        => '/images/icons/discovery-light.svg',
                ],
                [
                    'label'       => 'Bug fixes & performance improvements',
                    'description' => 'Targeted fixes, query optimisations, caching and housekeeping to make your existing app faster and more stable.',
                    'badge'       => 'Stabilisation',
                    'icon'        => '/images/icons/optimisation.svg',
                ],
                [
                    'label'       => 'New features & API layers',
                    'description' => 'Design and implement new modules, APIs and integrations on top of your current CodeIgniter application.',
                    'badge'       => 'Extension',
                    'icon'        => '/images/icons/api.svg',
                ],
                [
                    'label'       => 'Phased migration to Laravel',
                    'description' => 'Plan and execute a staged migration from CodeIgniter to Laravel or a modern PHP stack, module by module.',
                    'badge'       => 'Migration',
                    'icon'        => '/images/icons/architecture.svg',
                ],
            ],

            'cta' => [
                'label' => 'Talk through your CodeIgniter challenges',
                'url'   => '/contact-us/?topic=codeigniter',
            ],
        ],

        // Process
        'process' => [
            'id'      => 'codeigniter-process',
            'eyebrow' => 'How CodeIgniter projects work with QalbIT',
            'title'   => 'A careful, low-risk process for legacy CodeIgniter systems',
            'intro'   => 'We treat legacy systems with the respect they deserve: change them carefully, in small steps, and always with backups and rollback options.',

            'items' => [
                [
                    'step'        => 1,
                    'title'       => 'Discovery & legacy audit',
                    'description' => 'Understand how the CodeIgniter app fits into your business, review the codebase, database, hosting and dependencies, and highlight critical risks.',
                    'duration'    => '1–3 weeks',
                    'outcome'     => 'Audit report with priority issues, constraints and recommended next steps.',
                    'icon'        => '/images/icons/discovery.svg',
                ],
                [
                    'step'        => 2,
                    'title'       => 'Stabilise & protect',
                    'description' => 'Introduce basic monitoring, backups, environment separation and a minimal deployment process. Address the highest-risk bugs and performance bottlenecks first.',
                    'duration'    => '2–6 weeks',
                    'outcome'     => 'A more stable CodeIgniter system with reduced day-to-day incidents.',
                    'icon'        => '/images/icons/core-modules.svg',
                ],
                [
                    'step'        => 3,
                    'title'       => 'Enhance & expose APIs',
                    'description' => 'Implement agreed enhancements, refactor risky areas and, where useful, add an API layer that makes future migration easier.',
                    'duration'    => '4–10+ weeks (scope-dependent)',
                    'outcome'     => 'Improved functionality and a better structure for future changes or migration.',
                    'icon'        => '/images/icons/api-dark.svg',
                ],
                [
                    'step'        => 4,
                    'title'       => 'Migration planning & pilots',
                    'description' => 'Design a migration path (often to Laravel) including module breakdown, data strategy, coexistence and rollout. Run small pilot migrations to validate the approach.',
                    'duration'    => '2–4 weeks (planning) + phased execution',
                    'outcome'     => 'A realistic migration plan that balances risk, cost and business continuity.',
                    'icon'        => '/images/icons/architecture-design.svg',
                ],
                [
                    'step'        => 5,
                    'title'       => 'Phased migration & long-term support',
                    'description' => 'Execute the migration in stages, retire old modules carefully and provide ongoing support across both the legacy and new stack until the transition is complete.',
                    'duration'    => 'Ongoing, phased',
                    'outcome'     => 'A modernised platform with a clean handover and minimal disruption.',
                    'icon'        => '/images/icons/scale.svg',
                ],
            ],

            'cta' => [
                'label' => 'Walk me through this for my CodeIgniter app',
                'url'   => '/contact-us/?topic=process-codeigniter',
            ],
        ],

        // Use cases
        'use_cases' => [
            'id'      => 'codeigniter-use-cases',
            'eyebrow' => 'Where CodeIgniter shows up most often',
            'title'   => 'CodeIgniter use cases we typically handle',
            'intro'   => 'We are usually brought in when a legacy CodeIgniter application is too important to fail – but too fragile to ignore.',

            'items' => [
                [
                    'label'       => 'Internal tools and line-of-business apps',
                    'description' => 'Legacy internal systems for operations, finance, inventory or support that are still heavily used but have not been updated in years.',
                    'audience'    => 'Operations and IT teams',
                    'badge'       => 'Internal systems',
                ],
                [
                    'label'       => 'Customer and partner portals',
                    'description' => 'Login-based portals, account areas or dealer systems built on older CodeIgniter versions that need security and UX updates.',
                    'audience'    => 'B2B and B2C businesses',
                    'badge'       => 'Portals',
                ],
                [
                    'label'       => 'APIs and integration hubs',
                    'description' => 'APIs or integration layers implemented in CodeIgniter that connect multiple systems and must stay online while being modernised.',
                    'audience'    => 'Product & integration teams',
                    'badge'       => 'APIs',
                ],
                [
                    'label'       => 'Step-by-step migrations',
                    'description' => 'Scenarios where a direct rewrite is too risky, so we migrate modules gradually from CodeIgniter to Laravel or other frameworks.',
                    'audience'    => 'Product owners & CTOs',
                    'badge'       => 'Migration',
                ],
            ],

            'cta' => [
                'label' => 'Ask if your CodeIgniter app fits these patterns',
                'url'   => '/contact-us/?topic=use-cases-codeigniter',
            ],
        ],

        // Stack
        'stack' => [
            'id'      => 'codeigniter-tech-stack',
            'eyebrow' => 'Tech stack & approach',
            'title'   => 'How we approach CodeIgniter and legacy PHP stacks',
            'intro'   => 'We work with the reality of your current CodeIgniter stack while gradually introducing modern PHP and DevOps practices.',
            'note'    => 'If a full migration is on the roadmap, we design today’s improvements so they make that future move easier, not harder.',

            'categories' => [
                [
                    'name'        => 'Core CodeIgniter & PHP setup',
                    'description' => 'Understanding and structuring what you already have.',
                    'items'       => [
                        'Existing CodeIgniter versions (2.x, 3.x or 4.x) with PHP 7.x/8.x where feasible.',
                        'Routing, controllers, models and libraries reviewed for risk and quick improvements.',
                        'Database schemas (MySQL/MariaDB) documented and cleaned up gradually.',
                    ],
                ],
                [
                    'name'        => 'Modernisation & migration',
                    'description' => 'Preparing for and executing a move to a modern stack.',
                    'items'       => [
                        'Strangler-fig patterns to replace modules one by one with Laravel or other frameworks.',
                        'API layers that allow new services to coexist with the legacy CodeIgniter app.',
                        'Data migration strategies that protect integrity and minimise downtime.',
                    ],
                ],
                [
                    'name'        => 'Infrastructure & reliability',
                    'description' => 'Keeping the legacy system healthy in production.',
                    'items'       => [
                        'Environment separation (dev, staging, production) and basic CI/CD where practical.',
                        'Backups, monitoring and logging to detect issues early.',
                        'Performance tuning via caching, query optimisation and sensible resource sizing.',
                    ],
                ],
                [
                    'name'        => 'Quality, security & operations',
                    'description' => 'Raising the floor for a legacy application.',
                    'items'       => [
                        'Targeted automated tests around critical flows before major changes.',
                        'Security hardening, input validation and least-privilege access to data.',
                        'Documentation of key modules, deployment steps and recovery procedures.',
                    ],
                ],
            ],
        ],

        // Bottom CTA
        'cta' => [
            'enabled' => true,

            'eyebrow' => 'Relying on a legacy CodeIgniter app?',
            'title'   => 'Let’s stabilise it now and plan a safe future.',
            'body'    => 'If your CodeIgniter application is important to your business but hard to maintain, we can audit it, reduce immediate risk and outline a realistic roadmap for improvements or migration – without betting everything on a risky big-bang rewrite.',

            'primary_label' => 'Book a CodeIgniter review call',
            'primary_url'   => '/contact-us/?topic=codeigniter-modernisation',
            'primary_aria'  => 'Book a CodeIgniter modernisation call with QalbIT',

            'secondary_label' => 'Send us details of your legacy app',
            'secondary_url'   => 'https://calendly.com/abidhusain-qalbit/discuss-project',
            'secondary_aria'  => 'Send your CodeIgniter legacy app details to QalbIT',

            'meta' => 'Share your current app URL (if applicable), hosting details and main pain points and we will respond with next steps.',
        ],
    ],

    'typescript' => [
        'slug'        => '/technologies/typescript/',
        'name'        => 'TypeScript Development',
        'short_name'  => 'TypeScript',
        'icon'        => '/images/technologies/typescript.svg',
        'category'    => 'other',
        'enabled'     => true,
        'order'       => 35,
        'show_home'   => false,

        'meta_title'       => 'TypeScript Development Services | QalbIT',
        'meta_description' => 'Safer, more maintainable JavaScript applications with QalbIT’s TypeScript development services – from typed APIs and SDKs to React/Next.js frontends.',

        'tagline' => 'Typed JavaScript for safer, more maintainable applications.',
        'summary' => 'We use TypeScript across backends and frontends to reduce bugs, improve refactors and keep complex web and SaaS systems predictable as they scale.',

        'faq_key'      => 'typescript_faq',
        'faq_title'    => 'TypeScript Development – Frequently Asked Questions',
        'faq_subtitle' => 'Practical answers about using TypeScript for APIs, web apps and modernising existing JavaScript codebases.',

        // Hero
        'hero' => [
            'breadcrumb_label' => 'TypeScript',
            'kicker_prefix'    => 'Technologies',
            'kicker_label'     => 'Type-safe JavaScript across stack',
            'kicker_detail'    => 'APIs · Web Apps · SDKs',

            'title'     => 'TypeScript development for <span class="text-gradient-brand-animated">robust APIs, web apps and SaaS platforms</span>.',
            'highlight' => 'robust APIs, web apps and SaaS platforms',

            'intro' => 'QalbIT uses TypeScript as a foundation for Node/NestJS backends, React/Next.js frontends and shared type libraries. Typed contracts between services and UIs make complex products easier to evolve without breaking existing behaviour.',

            'primary_cta_label' => 'Discuss your TypeScript project',
            'primary_cta_href'  => '/contact-us/?topic=typescript',

            'secondary_cta_label' => 'Review my existing JavaScript codebase',
            'secondary_cta_href'  => '/contact-us/?topic=audit-typescript',
        ],

        // Overview
        'overview' => [
            'id'      => 'typescript-overview',
            'eyebrow' => 'TypeScript development overview',

            'title' => 'TypeScript development for reliable web and SaaS products',
            'intro' => 'We help teams adopt or improve TypeScript so their APIs, web apps and internal tools are easier to reason about, refactor and support long term.',

            'left_title' => 'When TypeScript with QalbIT makes sense',
            'left_items' => [
                'You have a growing JavaScript codebase that is becoming hard to maintain and risky to change.',
                'You want clearer contracts between backend APIs and frontend or mobile clients.',
                'You are building a multi-module SaaS or platform and need predictable, refactor-friendly code.',
                'You prefer a team that can introduce TypeScript gradually without blocking current delivery.',
            ],

            'right_title' => 'Outcomes we typically target with TypeScript work',
            'right_items' => [
                'Fewer runtime bugs from simple type mismatches and broken contracts.',
                'Safer refactors and feature work as the product grows in size and complexity.',
                'Shared type definitions across backend, frontend and internal tools.',
                'A codebase that is easier to onboard new developers into and review confidently.',
            ],

            'note' => 'We rarely recommend “rewrite everything in TypeScript” overnight. Instead, we adopt TypeScript incrementally – starting with the highest-value areas and new modules.',
        ],

        // Capabilities
        'capabilities' => [
            'id'      => 'typescript-capabilities',
            'eyebrow' => 'What we build with TypeScript',
            'title'   => 'TypeScript capabilities across APIs, web apps and shared libraries',
            'intro'   => 'We use TypeScript as a core layer across backend and frontend so your product benefits from strong typing end to end.',

            'items' => [
                [
                    'label'       => 'Node/NestJS APIs and services',
                    'description' => 'Type-safe REST and GraphQL APIs using Node.js and NestJS, with shared types for requests, responses and domain models.',
                    'badge'       => 'APIs',
                    'icon'        => '/images/icons/api.svg',
                ],
                [
                    'label'       => 'React & Next.js frontends',
                    'description' => 'Typed React and Next.js applications with strict props, hooks and state definitions to catch issues early in development.',
                    'badge'       => 'Frontends',
                    'icon'        => '/images/icons/dashboard.svg',
                ],
                [
                    'label'       => 'Shared type libraries & SDKs',
                    'description' => 'Central type packages and lightweight SDKs that keep multiple services, apps and integrations aligned.',
                    'badge'       => 'Shared types',
                    'icon'        => '/images/icons/modules.svg',
                ],
                [
                    'label'       => 'JavaScript to TypeScript migration',
                    'description' => 'Incremental migration strategies for existing JavaScript projects, starting with critical modules and new code.',
                    'badge'       => 'Modernisation',
                    'icon'        => '/images/icons/architecture.svg',
                ],
            ],

            'cta' => [
                'label' => 'Talk through your TypeScript requirements',
                'url'   => '/contact-us/?topic=typescript',
            ],
        ],

        // Process
        'process' => [
            'id'      => 'typescript-process',
            'eyebrow' => 'How TypeScript projects work with QalbIT',
            'title'   => 'A pragmatic TypeScript process – from audit to ongoing development',
            'intro'   => 'We design TypeScript adoption around your existing stack, team and roadmap, rather than forcing a one-size-fits-all pattern.',

            'items' => [
                [
                    'step'        => 1,
                    'title'       => 'Codebase & stack review',
                    'description' => 'Review your current JavaScript/TypeScript usage, build tooling, APIs and frontends to understand risks and opportunities.',
                    'duration'    => '1–2 weeks',
                    'outcome'     => 'Clear picture of what should be typed, improved or left as-is for now.',
                    'icon'        => '/images/icons/discovery.svg',
                ],
                [
                    'step'        => 2,
                    'title'       => 'TypeScript strategy & conventions',
                    'description' => 'Define TypeScript configuration, strictness level, project structure and coding guidelines that match your team and roadmap.',
                    'duration'    => '1–2 weeks',
                    'outcome'     => 'Agreed TypeScript setup and patterns to follow across the codebase.',
                    'icon'        => '/images/icons/architecture-design.svg',
                ],
                [
                    'step'        => 3,
                    'title'       => 'Incremental adoption & refactors',
                    'description' => 'Introduce or tighten TypeScript in priority areas – new features, core modules, domain models – while keeping delivery moving.',
                    'duration'    => '4–10+ weeks (scope-dependent)',
                    'outcome'     => 'Key parts of your system using stronger typing and shared contracts.',
                    'icon'        => '/images/icons/core-modules.svg',
                ],
                [
                    'step'        => 4,
                    'title'       => 'Tooling, tests & CI integration',
                    'description' => 'Wire TypeScript checks into your CI, add targeted tests and ensure type errors are caught before they reach production.',
                    'duration'    => '2–4 weeks',
                    'outcome'     => 'TypeScript integrated into your build and review pipelines.',
                    'icon'        => '/images/icons/launch.svg',
                ],
                [
                    'step'        => 5,
                    'title'       => 'Ongoing development & mentoring',
                    'description' => 'Support your team with ongoing TypeScript-based feature work, refactors and coaching so practices stick long term.',
                    'duration'    => 'Ongoing, month-to-month',
                    'outcome'     => 'A team and codebase that use TypeScript confidently and consistently.',
                    'icon'        => '/images/icons/scale.svg',
                ],
            ],

            'cta' => [
                'label' => 'Walk me through this for my codebase',
                'url'   => '/contact-us/?topic=process-typescript',
            ],
        ],

        // Use cases
        'use_cases' => [
            'id'      => 'typescript-use-cases',
            'eyebrow' => 'Where TypeScript adds the most value',
            'title'   => 'TypeScript use cases we most often deliver',
            'intro'   => 'We typically use TypeScript where correctness, collaboration and long-term maintainability matter most.',

            'items' => [
                [
                    'label'       => 'Multi-module SaaS platforms',
                    'description' => 'Products with multiple services, dashboards and roles that depend on shared domain models and clear contracts.',
                    'audience'    => 'SaaS founders and product teams',
                    'badge'       => 'SaaS',
                ],
                [
                    'label'       => 'Internal tools and APIs',
                    'description' => 'Internal web apps and APIs where different teams depend on stable interfaces and predictable behaviour.',
                    'audience'    => 'Operations, data and engineering teams',
                    'badge'       => 'Internal tools',
                ],
                [
                    'label'       => 'Public APIs and client SDKs',
                    'description' => 'Platforms that expose APIs or SDKs to customers or partners, where type safety improves developer experience.',
                    'audience'    => 'Platform and integration teams',
                    'badge'       => 'APIs & SDKs',
                ],
                [
                    'label'       => 'JavaScript modernisation projects',
                    'description' => 'Existing Node or React applications that need to be stabilised, refactored and gradually migrated to TypeScript.',
                    'audience'    => 'Teams with legacy JS',
                    'badge'       => 'Modernisation',
                ],
            ],

            'cta' => [
                'label' => 'Ask if TypeScript is a fit for your product',
                'url'   => '/contact-us/?topic=use-cases-typescript',
            ],
        ],

        // Stack
        'stack' => [
            'id'      => 'typescript-tech-stack',
            'eyebrow' => 'Tech stack & tooling',
            'title'   => 'TypeScript stack we typically use at QalbIT',
            'intro'   => 'We treat TypeScript as a first-class citizen in our Node, React, Next.js and NestJS projects, backed by modern tooling.',
            'note'    => 'Already using JavaScript? We will introduce TypeScript where it clearly improves safety and developer experience, instead of forcing it everywhere on day one.',

            'categories' => [
                [
                    'name'        => 'Core TypeScript setup',
                    'description' => 'How we configure and structure TypeScript projects.',
                    'items'       => [
                        'Strict TypeScript configurations (or a defined path to reach strict mode).',
                        'Clear project structure for domain types, API contracts and shared utilities.',
                        'Gradual typing strategies for legacy JavaScript codebases.',
                    ],
                ],
                [
                    'name'        => 'Backend & APIs with TypeScript',
                    'description' => 'Typed backends and services.',
                    'items'       => [
                        'NestJS or Express-based services in TypeScript for REST and GraphQL APIs.',
                        'Shared type packages between backend and clients for requests and responses.',
                        'Integration with relational databases, queues and external services using typed clients.',
                    ],
                ],
                [
                    'name'        => 'Frontends & web apps',
                    'description' => 'Typed user interfaces with React and Next.js.',
                    'items'       => [
                        'React and Next.js (App Router) projects implemented in TypeScript.',
                        'Typed components, hooks and state management (React Query, Zustand, etc.).',
                        'Design systems and reusable components with typed props and theming.',
                    ],
                ],
                [
                    'name'        => 'Tooling, quality & CI',
                    'description' => 'Keeping TypeScript code healthy over time.',
                    'items'       => [
                        'ESLint and Prettier setups aligned with TypeScript best practices.',
                        'Unit and integration testing with Jest, Vitest or similar frameworks.',
                        'CI pipelines that run type checks, tests and basic quality gates on each change.',
                    ],
                ],
            ],
        ],

        // Bottom CTA
        'cta' => [
            'enabled' => true,

            'eyebrow' => 'Planning to rely more on TypeScript?',
            'title'   => 'Let’s make your TypeScript adoption deliberate and sustainable.',
            'body'    => 'Whether you are starting a new product in TypeScript or modernising an existing JavaScript system, we can help you design the right level of typing, tools and migration steps so your team benefits without being blocked.',

            'primary_label' => 'Book a TypeScript consultation',
            'primary_url'   => '/contact-us/?topic=typescript-development',
            'primary_aria'  => 'Book a TypeScript development consultation with QalbIT',

            'secondary_label' => 'Send us your current JS/TS repo',
            'secondary_url'   => 'https://calendly.com/abidhusain-qalbit/discuss-project',
            'secondary_aria'  => 'Send your current JavaScript/TypeScript repository details to QalbIT',

            'meta' => 'Share your stack, repositories and main pain points, and we will come back with a practical TypeScript plan.',
        ],
    ],

    'postgresql' => [
        'slug'        => '/technologies/postgresql/',
        'name'        => 'PostgreSQL Development & Consulting',
        'short_name'  => 'PostgreSQL',
        'icon'        => '/images/technologies/postgresql.svg',
        'category'    => 'other',
        'enabled'     => true,
        'order'       => 40,
        'show_home'   => true,

        'meta_title'       => 'PostgreSQL Database Development & Optimisation Services | QalbIT',
        'meta_description' => 'Design, optimise and scale your PostgreSQL databases with QalbIT – from SaaS multi-tenant architectures to analytics, migrations and performance tuning.',

        'tagline' => 'Robust relational databases for SaaS, analytics and business-critical systems.',
        'summary' => 'We design, tune and operate PostgreSQL databases for SaaS platforms, internal tools and transactional systems that need reliability, performance and clean data models.',

        'faq_key'      => 'postgresql_faq',
        'faq_title'    => 'PostgreSQL Development – Frequently Asked Questions',
        'faq_subtitle' => 'Answers to common questions about PostgreSQL design, performance, multi-tenant setups and migrations.',

        // Hero
        'hero' => [
            'breadcrumb_label' => 'PostgreSQL',
            'kicker_prefix'    => 'Technologies',
            'kicker_label'     => 'Relational database for serious products',
            'kicker_detail'    => 'SaaS · Analytics · Transactions',

            'title'     => 'PostgreSQL for <span class="text-gradient-brand-animated">SaaS platforms, analytics and business-critical applications</span>.',
            'highlight' => 'SaaS platforms, analytics and business-critical applications',

            'intro' => 'QalbIT uses PostgreSQL as the core data layer for modern SaaS products, internal tools and transactional systems. We focus on clean schema design, predictable performance and resilience, so your application can grow without database surprises.',

            'primary_cta_label' => 'Discuss your PostgreSQL requirements',
            'primary_cta_href'  => '/contact-us/?topic=postgresql',

            'secondary_cta_label' => 'Review my current database setup',
            'secondary_cta_href'  => '/contact-us/?topic=audit-postgresql',
        ],

        // Overview
        'overview' => [
            'id'      => 'postgresql-overview',
            'eyebrow' => 'PostgreSQL development overview',

            'title' => 'PostgreSQL databases built for reliability, scale and clarity',
            'intro' => 'We help teams design new PostgreSQL databases or improve existing ones, with a focus on data integrity, performance and long-term maintainability.',

            'left_title' => 'When PostgreSQL with QalbIT makes sense',
            'left_items' => [
                'You are building or scaling a SaaS product and need a solid multi-tenant relational database.',
                'Your current database struggles with performance, reporting or complex queries as data grows.',
                'You are planning a migration from MySQL, SQL Server or another database to PostgreSQL.',
                'You want a team that understands both application code and database design, not just one side.',
            ],

            'right_title' => 'Outcomes we typically target with PostgreSQL work',
            'right_items' => [
                'Well-structured schemas that reflect your domain and are easier to evolve.',
                'Faster queries and more predictable performance through indexing and query tuning.',
                'Safer data with proper constraints, backups, recovery plans and security practices.',
                'A database that supports analytics, reporting and integrations without becoming a bottleneck.',
            ],

            'note' => 'For existing systems we usually start with a database health check and performance review, then define practical improvements that can be rolled out in phases.',
        ],

        // Capabilities
        'capabilities' => [
            'id'      => 'postgresql-capabilities',
            'eyebrow' => 'What we do with PostgreSQL',
            'title'   => 'PostgreSQL capabilities across design, optimisation and operations',
            'intro'   => 'From initial schema design to migrations, performance tuning and ongoing operations, we treat PostgreSQL as a core part of your product, not just a checkbox.',

            'items' => [
                [
                    'label'       => 'Schema & data model design',
                    'description' => 'Designing relational schemas, constraints and indexes that match your domain and keep data consistent.',
                    'badge'       => 'Design',
                    'icon'        => '/images/icons/architecture.svg',
                ],
                [
                    'label'       => 'SaaS multi-tenant architectures',
                    'description' => 'Structuring PostgreSQL for multi-tenant SaaS products – shared schema or separate databases based on risk and scale.',
                    'badge'       => 'SaaS',
                    'icon'        => '/images/icons/modules.svg',
                ],
                [
                    'label'       => 'Performance tuning & scaling',
                    'description' => 'Query analysis, indexing strategies, connection pooling and caching to keep performance predictable as load grows.',
                    'badge'       => 'Performance',
                    'icon'        => '/images/icons/performance.svg',
                ],
                [
                    'label'       => 'Migrations & modernisation',
                    'description' => 'Planning and executing migrations from legacy databases to PostgreSQL with minimal downtime.',
                    'badge'       => 'Migration',
                    'icon'        => '/images/icons/migration.svg',
                ],
            ],

            'cta' => [
                'label' => 'Talk through your PostgreSQL data layer',
                'url'   => '/contact-us/?topic=postgresql',
            ],
        ],

        // Process
        'process' => [
            'id'      => 'postgresql-process',
            'eyebrow' => 'How PostgreSQL projects work with QalbIT',
            'title'   => 'A practical PostgreSQL process – from audit to stable operations',
            'intro'   => 'We structure PostgreSQL work so that you see quick wins on performance and safety while moving towards a long-term, stable data architecture.',

            'items' => [
                [
                    'step'        => 1,
                    'title'       => 'Assessment & discovery',
                    'description' => 'Review current schemas, queries, infrastructure and growth plans to understand where PostgreSQL can improve things.',
                    'duration'    => '1–3 weeks',
                    'outcome'     => 'Clear picture of risks, quick wins and longer-term database improvements.',
                    'icon'        => '/images/icons/discovery.svg',
                ],
                [
                    'step'        => 2,
                    'title'       => 'Schema & architecture design',
                    'description' => 'Define or refine database schemas, relationships, indexes and multi-tenant strategy aligned with your product roadmap.',
                    'duration'    => '2–4 weeks',
                    'outcome'     => 'Agreed PostgreSQL schema and architecture plan ready for implementation.',
                    'icon'        => '/images/icons/architecture-design.svg',
                ],
                [
                    'step'        => 3,
                    'title'       => 'Implementation & migration',
                    'description' => 'Implement schema changes, data migrations and application-level adjustments with careful rollout and testing.',
                    'duration'    => '4–10+ weeks (scope-dependent)',
                    'outcome'     => 'Updated PostgreSQL database running in staging/production without disrupting users.',
                    'icon'        => '/images/icons/core-modules.svg',
                ],
                [
                    'step'        => 4,
                    'title'       => 'Performance & reliability tuning',
                    'description' => 'Optimise queries, indexes, connection management, backups and monitoring to keep the database healthy.',
                    'duration'    => '2–4 weeks',
                    'outcome'     => 'Faster, more predictable database behaviour with clear observability.',
                    'icon'        => '/images/icons/performance-dark.svg',
                ],
                [
                    'step'        => 5,
                    'title'       => 'Ongoing support & evolution',
                    'description' => 'Support new features, data growth and compliance needs with an evolving PostgreSQL roadmap.',
                    'duration'    => 'Ongoing, month-to-month',
                    'outcome'     => 'A database that grows with your product instead of holding it back.',
                    'icon'        => '/images/icons/scale.svg',
                ],
            ],

            'cta' => [
                'label' => 'Walk me through this for my database',
                'url'   => '/contact-us/?topic=process-postgresql',
            ],
        ],

        // Use cases
        'use_cases' => [
            'id'      => 'postgresql-use-cases',
            'eyebrow' => 'Where PostgreSQL shines',
            'title'   => 'PostgreSQL use cases we most often deliver',
            'intro'   => 'We typically use PostgreSQL where relational integrity, reporting and long-term data growth are important.',

            'items' => [
                [
                    'label'       => 'Multi-tenant SaaS products',
                    'description' => 'Core data layer for subscription products with multiple tenants, roles and modules.',
                    'audience'    => 'SaaS founders and product teams',
                    'badge'       => 'SaaS',
                ],
                [
                    'label'       => 'Operational & transactional systems',
                    'description' => 'Line-of-business applications that depend on consistent transactions and auditability.',
                    'audience'    => 'Operations and business teams',
                    'badge'       => 'Transactions',
                ],
                [
                    'label'       => 'Analytics and reporting backends',
                    'description' => 'PostgreSQL used for mixed workloads – operational plus light analytics, reporting and dashboards.',
                    'audience'    => 'Data and product teams',
                    'badge'       => 'Analytics',
                ],
                [
                    'label'       => 'Legacy database migrations',
                    'description' => 'Moving from older databases (for example MySQL, SQL Server) to PostgreSQL for better features and ecosystem.',
                    'audience'    => 'Teams modernising existing systems',
                    'badge'       => 'Modernisation',
                ],
            ],

            'cta' => [
                'label' => 'Ask if PostgreSQL is right for your product',
                'url'   => '/contact-us/?topic=use-cases-postgresql',
            ],
        ],

        // Stack
        'stack' => [
            'id'      => 'postgresql-tech-stack',
            'eyebrow' => 'Tech stack & tooling',
            'title'   => 'PostgreSQL stack we typically use at QalbIT',
            'intro'   => 'We pair PostgreSQL with modern ORMs, migration tools and cloud services so your database stays reliable and manageable.',
            'note'    => 'Already on another database? We can run PostgreSQL alongside your existing system during migration, then cut over safely once everything is validated.',

            'categories' => [
                [
                    'name'        => 'Core PostgreSQL features',
                    'description' => 'How we use Postgres itself.',
                    'items'       => [
                        'Relational schemas with constraints, foreign keys and check rules for data integrity.',
                        'Indexes, partial indexes and composite keys tuned to real query patterns.',
                        'Views and materialised views for reporting and derived data.',
                    ],
                ],
                [
                    'name'        => 'Scaling & performance',
                    'description' => 'Keeping performance predictable as load grows.',
                    'items'       => [
                        'Connection pooling via PgBouncer or managed equivalents.',
                        'Query analysis, execution plan review and targeted index strategies.',
                        'Caching strategies with Redis and application-level optimisation.',
                    ],
                ],
                [
                    'name'        => 'Backends & data access',
                    'description' => 'How applications talk to PostgreSQL.',
                    'items'       => [
                        'ORMs such as TypeORM, Prisma or Eloquent, configured for PostgreSQL.',
                        'Explicit migrations and versioned schema changes in CI/CD pipelines.',
                        'API-first backends (Laravel, NestJS, Node.js) designed around clean data access layers.',
                    ],
                ],
                [
                    'name'        => 'Operations, backups & observability',
                    'description' => 'Running PostgreSQL safely in production.',
                    'items'       => [
                        'Automated backups, retention policies and recovery testing.',
                        'Monitoring and alerting for performance, errors and storage.',
                        'Managed PostgreSQL services on AWS, DigitalOcean and other clouds where appropriate.',
                    ],
                ],
            ],
        ],

        // Bottom CTA
        'cta' => [
            'enabled' => true,

            'eyebrow' => 'Relying on your database for the long term?',
            'title'   => 'Let’s ensure your PostgreSQL layer can keep up with your product.',
            'body'    => 'Share your current database setup, performance concerns and growth plans. We will review your PostgreSQL usage and propose a practical plan for stabilising, optimising or migrating your data layer.',

            'primary_label' => 'Book a PostgreSQL consultation',
            'primary_url'   => '/contact-us/?topic=postgresql-consulting',
            'primary_aria'  => 'Book a PostgreSQL consulting call with QalbIT',

            'secondary_label' => 'Send us your database details',
            'secondary_url'   => 'https://calendly.com/abidhusain-qalbit/discuss-project',
            'secondary_aria'  => 'Send your PostgreSQL database requirements to QalbIT',

            'meta' => 'We usually start with a short assessment and then outline quick wins plus a longer-term roadmap.',
        ],
    ],

    'mysql' => [
        'slug'        => '/technologies/mysql/',
        'name'        => 'MySQL Development & Optimisation',
        'short_name'  => 'MySQL',
        'icon'        => '/images/technologies/mysql.svg',
        'category'    => 'other',
        'enabled'     => true,
        'order'       => 50,
        'show_home'   => false,

        'meta_title'       => 'MySQL Database Development & Optimisation Services | QalbIT',
        'meta_description' => 'Design, optimise and scale your MySQL databases with QalbIT – from LAMP applications and SaaS platforms to e-commerce and internal systems.',

        'tagline' => 'Reliable relational databases for web, SaaS and e-commerce applications.',
        'summary' => 'We design, tune and maintain MySQL databases for Laravel, PHP and Node.js applications, with a focus on performance, stability and clean data models.',

        'faq_key'      => 'mysql_faq',
        'faq_title'    => 'MySQL Development – Frequently Asked Questions',
        'faq_subtitle' => 'Practical answers about MySQL design, optimisation, migrations and maintenance.',

        // Hero
        'hero' => [
            'breadcrumb_label' => 'MySQL',
            'kicker_prefix'    => 'Technologies',
            'kicker_label'     => 'Relational database for web & SaaS apps',
            'kicker_detail'    => 'LAMP · SaaS · E-commerce',

            'title'     => 'MySQL for <span class="text-gradient-brand-animated">web applications, SaaS products and e-commerce platforms</span>.',
            'highlight' => 'web applications, SaaS products and e-commerce platforms',

            'intro' => 'QalbIT uses MySQL as a stable data layer for Laravel, PHP and Node.js applications. We pay attention to schema design, indexing, queries and backups so your product can grow without running into database bottlenecks early.',

            'primary_cta_label' => 'Discuss your MySQL database',
            'primary_cta_href'  => '/contact-us/?topic=mysql',

            'secondary_cta_label' => 'Ask for a MySQL health check',
            'secondary_cta_href'  => '/contact-us/?topic=audit-mysql',
        ],

        // Overview
        'overview' => [
            'id'      => 'mysql-overview',
            'eyebrow' => 'MySQL development overview',

            'title' => 'MySQL databases designed for stability and growth',
            'intro' => 'We help teams design new MySQL databases or rescue existing ones that are struggling with performance, reporting or reliability.',

            'left_title' => 'When MySQL with QalbIT makes sense',
            'left_items' => [
                'You are building or maintaining Laravel, PHP or Node.js applications that already rely on MySQL.',
                'Your existing MySQL database has slow queries, locking issues or timeouts under load.',
                'You want to refactor an older LAMP stack without rewriting everything at once.',
                'You prefer a team that understands both application code and MySQL internals.',
            ],

            'right_title' => 'Outcomes we typically target with MySQL work',
            'right_items' => [
                'Cleaner schemas and relationships that reflect your real business rules.',
                'Faster, more predictable queries backed by sensible indexes and query design.',
                'Safer data through proper constraints, backups, recovery and security practices.',
                'A database that can support future features, reporting and integrations.',
            ],

            'note' => 'For existing projects we usually begin with a focused MySQL review, then roll out improvements in small, low-risk steps.',
        ],

        // Capabilities
        'capabilities' => [
            'id'      => 'mysql-capabilities',
            'eyebrow' => 'What we do with MySQL',
            'title'   => 'MySQL capabilities across design, optimisation and maintenance',
            'intro'   => 'We treat MySQL as a core part of your product architecture – not just a default choice that is left untouched.',

            'items' => [
                [
                    'label'       => 'Schema & data model design',
                    'description' => 'Designing or refactoring tables, relationships and indexes to match your domain and reduce data issues.',
                    'badge'       => 'Design',
                    'icon'        => '/images/icons/architecture.svg',
                ],
                [
                    'label'       => 'Performance and query tuning',
                    'description' => 'Analysing slow queries, locks and execution plans, then applying indexing and query improvements.',
                    'badge'       => 'Performance',
                    'icon'        => '/images/icons/performance.svg',
                ],
                [
                    'label'       => 'SaaS & multi-tenant setups',
                    'description' => 'Structuring MySQL for multi-tenant SaaS products with the right balance between isolation and manageability.',
                    'badge'       => 'SaaS',
                    'icon'        => '/images/icons/modules.svg',
                ],
                [
                    'label'       => 'Migrations & modernisation',
                    'description' => 'Migrating older databases or restructuring existing MySQL schemas as part of broader modernisation projects.',
                    'badge'       => 'Migration',
                    'icon'        => '/images/icons/migration.svg',
                ],
            ],

            'cta' => [
                'label' => 'Talk through your MySQL challenges',
                'url'   => '/contact-us/?topic=mysql',
            ],
        ],

        // Process
        'process' => [
            'id'      => 'mysql-process',
            'eyebrow' => 'How MySQL projects work with QalbIT',
            'title'   => 'A straightforward process for MySQL audits, fixes and long-term improvements',
            'intro'   => 'We combine quick wins on performance and safety with a realistic plan to keep your MySQL database healthy as you grow.',

            'items' => [
                [
                    'step'        => 1,
                    'title'       => 'Discovery & database review',
                    'description' => 'Review schemas, indexes, key queries and infrastructure to understand current issues and risks.',
                    'duration'    => '1–2 weeks',
                    'outcome'     => 'Clear list of problems, bottlenecks and opportunities for improvement.',
                    'icon'        => '/images/icons/discovery.svg',
                ],
                [
                    'step'        => 2,
                    'title'       => 'Schema & query optimisation plan',
                    'description' => 'Define changes to structure, indexes and critical queries, prioritised by impact and risk.',
                    'duration'    => '1–3 weeks',
                    'outcome'     => 'Agreed set of changes for stabilisation and performance gains.',
                    'icon'        => '/images/icons/architecture-design.svg',
                ],
                [
                    'step'        => 3,
                    'title'       => 'Implementation & rollout',
                    'description' => 'Apply schema changes, adjust queries and deploy updates through staging to production.',
                    'duration'    => '3–8+ weeks (scope-dependent)',
                    'outcome'     => 'Optimised MySQL database live in production, with minimal disruption.',
                    'icon'        => '/images/icons/core-modules.svg',
                ],
                [
                    'step'        => 4,
                    'title'       => 'Backups, monitoring & safeguards',
                    'description' => 'Set up backups, restore procedures, monitoring and alerts so issues are caught early.',
                    'duration'    => '1–3 weeks',
                    'outcome'     => 'Documented backup and monitoring approach aligned with your risk tolerance.',
                    'icon'        => '/images/icons/launch.svg',
                ],
                [
                    'step'        => 5,
                    'title'       => 'Ongoing support & evolution',
                    'description' => 'Support new features, data growth and refactors with regular check-ups and improvements.',
                    'duration'    => 'Ongoing, month-to-month',
                    'outcome'     => 'A MySQL database that stays aligned with your product and traffic.',
                    'icon'        => '/images/icons/scale.svg',
                ],
            ],

            'cta' => [
                'label' => 'Walk me through this for my MySQL setup',
                'url'   => '/contact-us/?topic=process-mysql',
            ],
        ],

        // Use cases
        'use_cases' => [
            'id'      => 'mysql-use-cases',
            'eyebrow' => 'Where MySQL is usually a good fit',
            'title'   => 'MySQL use cases we most often support',
            'intro'   => 'We typically see MySQL at the heart of PHP and Laravel products, e-commerce stores and many long-running web applications.',

            'items' => [
                [
                    'label'       => 'Laravel and PHP web applications',
                    'description' => 'MySQL as the primary database for custom web apps and internal tools built on Laravel or other PHP frameworks.',
                    'audience'    => 'Product and engineering teams',
                    'badge'       => 'Web apps',
                ],
                [
                    'label'       => 'E-commerce and transactional systems',
                    'description' => 'Online stores, booking engines and payment flows that depend on consistent, reliable transactions.',
                    'audience'    => 'E-commerce and operations teams',
                    'badge'       => 'E-commerce',
                ],
                [
                    'label'       => 'Legacy LAMP modernisation',
                    'description' => 'Improving older LAMP stack systems by cleaning up schemas, queries and indexes without full rewrites.',
                    'audience'    => 'Teams with existing LAMP stacks',
                    'badge'       => 'Modernisation',
                ],
                [
                    'label'       => 'Reporting and light analytics',
                    'description' => 'Using MySQL as both the transactional store and source for dashboards, exports and internal reports.',
                    'audience'    => 'Business and analytics teams',
                    'badge'       => 'Reporting',
                ],
            ],

            'cta' => [
                'label' => 'Ask if MySQL is right for your next phase',
                'url'   => '/contact-us/?topic=use-cases-mysql',
            ],
        ],

        // Stack
        'stack' => [
            'id'      => 'mysql-tech-stack',
            'eyebrow' => 'Tech stack & tooling',
            'title'   => 'MySQL stack we typically use at QalbIT',
            'intro'   => 'We pair MySQL with sensible ORMs, migration tools and cloud services so it remains manageable as your product evolves.',
            'note'    => 'If you are already on MySQL, we work with your existing environment first and only suggest changes that clearly improve stability or performance.',

            'categories' => [
                [
                    'name'        => 'Core MySQL design',
                    'description' => 'How we structure data in MySQL.',
                    'items'       => [
                        'Normalised schemas with appropriate use of foreign keys and constraints.',
                        'Sensible indexing strategies based on real query patterns, not guesses.',
                        'Use of engine features such as InnoDB for transactional workloads.',
                    ],
                ],
                [
                    'name'        => 'Scaling & performance',
                    'description' => 'Keeping response times predictable.',
                    'items'       => [
                        'Slow query analysis, execution plan review and targeted refactors.',
                        'Connection pooling and query optimisation in the application layer.',
                        'Caching layers (for example Redis) to reduce unnecessary database load.',
                    ],
                ],
                [
                    'name'        => 'Backends & ORMs',
                    'description' => 'How applications talk to MySQL.',
                    'items'       => [
                        'Laravel Eloquent, query builders and well-structured repositories.',
                        'Node.js / NestJS with ORMs such as TypeORM or Prisma configured for MySQL.',
                        'Strictly versioned migrations integrated into CI/CD pipelines.',
                    ],
                ],
                [
                    'name'        => 'Operations & reliability',
                    'description' => 'Running MySQL safely in production.',
                    'items'       => [
                        'Automated backups, tested restores and clear retention policies.',
                        'Monitoring for slow queries, locks, replication and storage usage.',
                        'Use of managed MySQL (for example AWS RDS) where it fits your environment.',
                    ],
                ],
            ],
        ],

        // Bottom CTA
        'cta' => [
            'enabled' => true,

            'eyebrow' => 'Depending on MySQL for your core product?',
            'title'   => 'Let’s make sure your MySQL database can handle the next stage of growth.',
            'body'    => 'Share your current MySQL setup, performance concerns and roadmap. We will review your database and propose practical improvements that fit your product and budget.',

            'primary_label' => 'Book a MySQL consultation',
            'primary_url'   => '/contact-us/?topic=mysql-consulting',
            'primary_aria'  => 'Book a MySQL consulting call with QalbIT',

            'secondary_label' => 'Send us your database details',
            'secondary_url'   => 'https://calendly.com/abidhusain-qalbit/discuss-project',
            'secondary_aria'  => 'Send your MySQL database requirements to QalbIT',

            'meta' => 'We usually begin with a short audit and highlight both quick wins and longer-term improvements.',
        ],
    ],

    'aws' => [
        'slug'        => '/technologies/aws/',
        'name'        => 'AWS Cloud Solutions & DevOps',
        'short_name'  => 'AWS',
        'icon'        => '/images/technologies/aws.svg',
        'category'    => 'other',
        'enabled'     => true,
        'order'       => 60,
        'show_home'   => true,

        'meta_title'       => 'AWS Cloud Solutions & DevOps Services | QalbIT',
        'meta_description' => 'Plan, migrate and operate your applications on AWS with QalbIT – from first deployments to multi-environment cloud architectures, DevOps and optimisation.',

        'tagline' => 'Practical AWS architectures, migrations and DevOps for web and SaaS products.',
        'summary' => 'We help teams design, migrate and operate applications on AWS, focusing on reliability, security and cost control rather than chasing every new service.',

        'faq_key'      => 'aws_faq',
        'faq_title'    => 'AWS Cloud Solutions – Frequently Asked Questions',
        'faq_subtitle' => 'Straightforward answers about AWS migration, architecture, security and ongoing operations.',

        // Hero
        'hero' => [
            'breadcrumb_label' => 'AWS',
            'kicker_prefix'    => 'Technologies',
            'kicker_label'     => 'AWS cloud & DevOps',
            'kicker_detail'    => 'EC2 · RDS · S3 · Lambda',

            'title'     => 'AWS cloud infrastructure for <span class="text-gradient-brand-animated">web apps, SaaS products and internal systems</span>.',
            'highlight' => 'web apps, SaaS products and internal systems',

            'intro' => 'QalbIT designs and operates AWS environments for Laravel, Node.js, React/Next.js and mobile backends. We focus on clear architectures, automation, security and cost control, so your cloud setup is understandable and maintainable – not a black box.',

            'primary_cta_label' => 'Discuss your AWS environment',
            'primary_cta_href'  => '/contact-us/?topic=aws',

            'secondary_cta_label' => 'Request an AWS architecture review',
            'secondary_cta_href'  => '/contact-us/?topic=audit-aws',
        ],

        // Overview
        'overview' => [
            'id'      => 'aws-overview',
            'eyebrow' => 'AWS cloud overview',

            'title' => 'AWS cloud solutions that match your product stage and team',
            'intro' => 'We help you use AWS in a way that is robust and realistic – from first deployments to more advanced architectures with multiple environments and services.',

            'left_title' => 'When AWS with QalbIT makes sense',
            'left_items' => [
                'You are moving from shared hosting or a single VPS to a more reliable cloud setup.',
                'You already use AWS but lack clear documentation, monitoring or cost control.',
                'You want a stable base for SaaS, APIs or internal tools with room to grow later.',
                'You prefer a partner who explains trade-offs instead of pushing unnecessary complexity.',
            ],

            'right_title' => 'Outcomes we typically target with AWS work',
            'right_items' => [
                'Clear, documented environments for development, staging and production.',
                'Improved uptime and performance for web apps, APIs and background jobs.',
                'Stronger security baselines around access, networking and data protection.',
                'Predictable monthly AWS costs with sensible budgeting and alerts.',
            ],

            'note' => 'We usually start with a short AWS audit, then prioritise practical improvements to stability, security and cost before introducing more advanced services.',
        ],

        // Capabilities
        'capabilities' => [
            'id'      => 'aws-capabilities',
            'eyebrow' => 'What we do on AWS',
            'title'   => 'AWS capabilities across architecture, migration and DevOps',
            'intro'   => 'Our AWS work connects directly to your applications – Laravel, Node.js, Next.js, Flutter backends and more – rather than cloud diagrams for their own sake.',

            'items' => [
                [
                    'label'       => 'Architecture & environment design',
                    'description' => 'Designing AWS environments for web and SaaS products including VPC, subnets, security groups, load balancers and managed databases.',
                    'badge'       => 'Architecture',
                    'icon'        => '/images/icons/architecture.svg',
                ],
                [
                    'label'       => 'Migrations to AWS',
                    'description' => 'Planning and executing migrations from shared hosting or on-premise servers to AWS EC2, RDS and other managed services.',
                    'badge'       => 'Migration',
                    'icon'        => '/images/icons/migration.svg',
                ],
                [
                    'label'       => 'DevOps & CI/CD',
                    'description' => 'Setting up automated deployments, zero-downtime releases and environment management with Git-based workflows.',
                    'badge'       => 'DevOps',
                    'icon'        => '/images/icons/deployment.svg',
                ],
                [
                    'label'       => 'Security, monitoring & cost optimisation',
                    'description' => 'Hardening access, configuring backups and alerts, and tuning AWS usage to keep performance high and waste low.',
                    'badge'       => 'Operations',
                    'icon'        => '/images/icons/security.svg',
                ],
            ],

            'cta' => [
                'label' => 'Talk through your AWS setup',
                'url'   => '/contact-us/?topic=aws',
            ],
        ],

        // Process
        'process' => [
            'id'      => 'aws-process',
            'eyebrow' => 'How AWS projects work with QalbIT',
            'title'   => 'A practical process for AWS migrations and ongoing operations',
            'intro'   => 'We combine architecture, DevOps and day-to-day operations so your AWS environment supports the product instead of slowing it down.',

            'items' => [
                [
                    'step'        => 1,
                    'title'       => 'Discovery & current-state review',
                    'description' => 'Understand your applications, current hosting or AWS usage, traffic patterns, compliance needs and pain points.',
                    'duration'    => '1–2 weeks',
                    'outcome'     => 'Clear picture of what exists today and what must improve first.',
                    'icon'        => '/images/icons/discovery.svg',
                ],
                [
                    'step'        => 2,
                    'title'       => 'AWS architecture & migration plan',
                    'description' => 'Design target AWS architecture, choose appropriate services and define a step-by-step migration or improvement plan.',
                    'duration'    => '1–3 weeks',
                    'outcome'     => 'Documented AWS design with environments, services and rollout approach.',
                    'icon'        => '/images/icons/architecture-design.svg',
                ],
                [
                    'step'        => 3,
                    'title'       => 'Implementation & deployment automation',
                    'description' => 'Set up infrastructure, CI/CD pipelines, environment configs and application deployments to AWS.',
                    'duration'    => '3–8+ weeks (scope-dependent)',
                    'outcome'     => 'Applications running on AWS with repeatable deployments and basic monitoring.',
                    'icon'        => '/images/icons/core-modules.svg',
                ],
                [
                    'step'        => 4,
                    'title'       => 'Hardening, monitoring & cost tuning',
                    'description' => 'Tighten security, configure logging and alerts, and optimise resource sizing and services for cost and performance.',
                    'duration'    => '2–4 weeks',
                    'outcome'     => 'Hardened environments with visibility into health, incidents and spend.',
                    'icon'        => '/images/icons/launch.svg',
                ],
                [
                    'step'        => 5,
                    'title'       => 'Ongoing DevOps & cloud support',
                    'description' => 'Provide ongoing DevOps help for deployments, incidents, scaling events and roadmap changes.',
                    'duration'    => 'Ongoing, month-to-month',
                    'outcome'     => 'A stable AWS platform that evolves alongside your product.',
                    'icon'        => '/images/icons/scale.svg',
                ],
            ],

            'cta' => [
                'label' => 'Walk me through this for my AWS setup',
                'url'   => '/contact-us/?topic=process-aws',
            ],
        ],

        // Use cases
        'use_cases' => [
            'id'      => 'aws-use-cases',
            'eyebrow' => 'Where AWS is usually the right fit',
            'title'   => 'AWS use cases we most often deliver',
            'intro'   => 'Most of our AWS work connects directly to product teams who need stable infrastructure for real applications, not just experiments.',

            'items' => [
                [
                    'label'       => 'SaaS platforms & APIs',
                    'description' => 'Multi-environment setups for SaaS apps, public APIs and internal services with predictable deployments and monitoring.',
                    'audience'    => 'SaaS founders and engineering leads',
                    'badge'       => 'SaaS',
                ],
                [
                    'label'       => 'Modernisation from shared hosting',
                    'description' => 'Moving from cPanel, shared hosting or a single VPS to a structured AWS environment with staging and production.',
                    'audience'    => 'Teams outgrowing shared hosting',
                    'badge'       => 'Modernisation',
                ],
                [
                    'label'       => 'Internal tools & line-of-business apps',
                    'description' => 'Secure AWS deployments for internal portals, admin dashboards and reporting tools.',
                    'audience'    => 'IT and operations teams',
                    'badge'       => 'Internal tools',
                ],
                [
                    'label'       => 'Event-driven and serverless components',
                    'description' => 'Using AWS Lambda, SQS and related services for background jobs, webhooks and integrations where they make sense.',
                    'audience'    => 'Products needing flexible processing',
                    'badge'       => 'Serverless',
                ],
            ],

            'cta' => [
                'label' => 'Ask if AWS is right for your next phase',
                'url'   => '/contact-us/?topic=use-cases-aws',
            ],
        ],

        // Stack
        'stack' => [
            'id'      => 'aws-tech-stack',
            'eyebrow' => 'Cloud stack & tooling',
            'title'   => 'AWS stack we typically use at QalbIT',
            'intro'   => 'We favour a practical subset of AWS – EC2, RDS, S3 and related services – paired with sensible automation and observability.',
            'note'    => 'If you already have an AWS environment, we work with what you have first, then gradually improve structure, security and automation.',

            'categories' => [
                [
                    'name'        => 'Core AWS services',
                    'description' => 'Foundational services for most projects.',
                    'items'       => [
                        'EC2 and Auto Scaling groups for application servers where appropriate.',
                        'RDS (MySQL/PostgreSQL) for managed relational databases.',
                        'S3 for asset storage, backups and static content.',
                    ],
                ],
                [
                    'name'        => 'Networking & security',
                    'description' => 'Keeping environments isolated and secure.',
                    'items'       => [
                        'VPC design with public/private subnets and sensible routing.',
                        'Security groups, NACLs and IAM roles aligned with least privilege.',
                        'HTTPS everywhere, certificate management and secure bastion access.',
                    ],
                ],
                [
                    'name'        => 'DevOps & automation',
                    'description' => 'Making deployments repeatable and safe.',
                    'items'       => [
                        'CI/CD pipelines (for example GitHub Actions) deploying to AWS.',
                        'Infrastructure as code using tools like Terraform or CloudFormation when relevant.',
                        'Blue/green or rolling deployment strategies for critical services.',
                    ],
                ],
                [
                    'name'        => 'Monitoring & cost management',
                    'description' => 'Keeping visibility on health and spend.',
                    'items'       => [
                        'CloudWatch metrics, logs and alarms for applications and infrastructure.',
                        'Error tracking and APM tools integrated with application code.',
                        'Cost monitoring, tagged resources and budget alerts to avoid surprises.',
                    ],
                ],
            ],
        ],

        // Bottom CTA
        'cta' => [
            'enabled' => true,

            'eyebrow' => 'Depending on AWS for your core systems?',
            'title'   => 'Let’s make your AWS environment stable, secure and easier to operate.',
            'body'    => 'Share your current hosting or AWS setup, key applications and concerns. We will review your situation and propose a realistic path to a cleaner, more reliable cloud environment on AWS.',

            'primary_label' => 'Book an AWS consultation',
            'primary_url'   => '/contact-us/?topic=aws-consulting',
            'primary_aria'  => 'Book an AWS consulting call with QalbIT',

            'secondary_label' => 'Send us your AWS details',
            'secondary_url'   => 'https://calendly.com/abidhusain-qalbit/discuss-project',
            'secondary_aria'  => 'Send your AWS environment details to QalbIT',

            'meta' => 'Often we begin with a focused review of your current setup, then phase improvements to reduce risk and downtime.',
        ],
    ],
];
