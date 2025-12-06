<?php

return [
    'custom_software' => [
        'slug'     => '/services/custom-software-development/',
        'name'     => 'Custom Software Development',
        'h1'       => 'Custom Software Development Services for Modern Businesses',
        'enabled'  => true,
        'order'    => 10,

        'meta_title'       => 'Custom Software Development Company & Services – QalbIT',
        'meta_description' => 'QalbIT is a custom software development company building secure web, mobile and cloud applications. We help you estimate custom software development costs realistically, then design, build and support platforms for modern teams.',

        'short_description' => 'End-to-end custom software development for web, mobile and cloud – from MVPs to long-term platforms, with clear costs and ongoing support.',
        'category'          => 'core',
        'template'          => 'pages/services/custom-software',

        'icon'    => 'images/services/icon-custom-software-development.svg',
        'iconAlt' => 'Icon representing Custom Software Development',

        // FAQ meta
        'faq_key'      => 'service_custom_software',
        'faq_title'    => 'Frequently asked questions about custom software development with QalbIT',
        'faq_subtitle' => 'These are the questions founders and operations teams usually ask when they explore custom software development, costs and timelines with us.',

        // Hero section
        'hero' => [
            'breadcrumb_label' => 'Custom software development',
            'kicker_prefix'    => 'Services',
            'kicker_label'     => 'Custom software development',
            'kicker_detail'    => 'Web · Mobile · Cloud · Integrations',

            'title'     => 'Custom Software Development Services for <span class="text-gradient-brand-animated">Web, Mobile &amp; Cloud</span>.',
            'highlight' => 'Web, Mobile & Cloud',

            'intro' => 'QalbIT designs, builds and supports custom software that fits your business instead of forcing you to work around generic tools. From replacing spreadsheets to modernising legacy systems, we help you plan realistic scope, understand custom software development costs and launch stable products your team can rely on.',

            'primary_cta_label' => 'Discuss your custom software project',
            'primary_cta_href'  => '/contact-us/?service=custom-software',

            'secondary_cta_label' => 'View related case studies',
            'secondary_cta_href'  => '/case-studies/?tag=custom-software',

            'snapshot_title' => 'Custom software snapshot',
            'snapshot'       => [
                [
                    'label' => 'Core focus',
                    'value' => 'Web, mobile and cloud-based custom applications',
                ],
                [
                    'label' => 'Typical engagements',
                    'value' => 'MVP builds, internal tools, rewrites and long-term product teams',
                ],
                [
                    'label' => 'Industries',
                    'value' => 'Services, SaaS, logistics, healthcare, finance and more',
                ],
                [
                    'label' => 'Delivery model',
                    'value' => 'Fixed-scope projects or dedicated product squads',
                ],
            ],
        ],

        // Overview section
        'overview' => [
            'id'      => 'custom-software-overview',
            'eyebrow' => 'Custom software overview',

            'title' => 'Custom software development services for modern, growing businesses',
            'intro' => 'We help SMEs, mid-market companies and product teams replace spreadsheets and legacy tools with custom software that matches how they actually work. The goal is simple: better control over processes, cleaner data and software that can grow with your business.',

            'left_title' => 'When custom software with QalbIT makes sense',
            'left_items' => [
                'Off-the-shelf tools or SaaS products do not fit your workflows or industry specifics.',
                'You rely heavily on spreadsheets, email and manual steps that slow down operations.',
                'Existing custom software is outdated, hard to maintain or cannot scale further.',
                'You want to centralise data and workflows across departments and systems.',
                'You prefer a partner who can own discovery, development and long-term support – not just a one-off build.',
            ],

            'right_title' => 'Outcomes we typically target for custom software projects',
            'right_items' => [
                'Clear, streamlined workflows that reduce manual effort and mistakes.',
                'A single source of truth for data instead of scattered spreadsheets and tools.',
                'Software that can be extended over time as your business and requirements evolve.',
                'Predictable release cadence so new features and fixes ship regularly.',
                'Well-documented systems that can be understood by your internal team over the long term.',
            ],

            'note' => 'For most custom software projects, we recommend a short discovery phase first. This lets us clarify requirements, outline architecture, estimate custom software development costs and define a realistic first release.',
        ],

        // Capabilities section
        'capabilities' => [
            'id'      => 'custom-software-capabilities',
            'eyebrow' => 'What we build',
            'title'   => 'Custom software development capabilities across web, mobile and cloud',
            'intro'   => 'From internal tools and customer portals to full platforms, we design and build custom software that connects your data, teams and customers.',

            'items' => [
                [
                    'label'       => 'Business applications & internal tools',
                    'description' => 'Line-of-business applications tailored to your processes – for operations, finance, logistics, HR and other internal teams.',
                    'badge'       => 'Applications',
                    'icon'        => '/images/icons/modules.svg',
                ],
                [
                    'label'       => 'Customer portals & self-service dashboards',
                    'description' => 'Secure web portals where customers, partners and vendors can manage accounts, orders, requests and data without manual back-and-forth.',
                    'badge'       => 'Portals',
                    'icon'        => '/images/icons/dashboard.svg',
                ],
                [
                    'label'       => 'System integrations & workflow automation',
                    'description' => 'APIs and integrations that connect CRMs, ERPs, accounting tools and third-party services to remove manual data entry and reduce errors.',
                    'badge'       => 'Integrations',
                    'icon'        => '/images/icons/api.svg',
                ],
                [
                    'label'       => 'Reporting, analytics & dashboards',
                    'description' => 'Custom reporting, KPI dashboards and exports so leaders and teams can see what is happening in real time – not once a month.',
                    'badge'       => 'Analytics',
                    'icon'        => '/images/icons/report.svg',
                ],
                [
                    'label'       => 'Legacy modernisation & re-platforming',
                    'description' => 'Rebuild outdated desktop or on-premise systems into modern web, mobile or cloud-native solutions while keeping data and users safe.',
                    'badge'       => 'Modernisation',
                    'icon'        => '/images/icons/architecture.svg',
                ],
                [
                    'label'       => 'Support, maintenance & enhancements',
                    'description' => 'Ongoing maintenance, small improvements and new modules so your custom software stays healthy and aligned with your business.',
                    'badge'       => 'Support',
                    'icon'        => '/images/icons/ops.svg',
                ],
            ],

            'cta' => [
                'label' => 'Discuss your custom software scope',
                'url'   => '/contact-us/?service=custom-software',
            ],
        ],

        // Process section
        'process' => [
            'id'      => 'custom-software-process',
            'eyebrow' => 'How custom software projects work',
            'title'   => 'A practical custom software development process from idea to production',
            'intro'   => 'We keep the process structured but lightweight, so you can move from idea to working software without surprises on cost, timeline or quality.',

            'items' => [
                [
                    'step'        => 1,
                    'title'       => 'Discovery & requirements mapping',
                    'description' => 'Understand your current workflows, pain points, users and success metrics. Identify what must be in v1 and what can wait.',
                    'duration'    => '1–2 weeks',
                    'outcome'     => 'Documented requirements, user journeys and an initial view of scope and custom software development costs.',
                    'icon'        => '/images/icons/discovery.svg',
                ],
                [
                    'step'        => 2,
                    'title'       => 'Solution design & architecture',
                    'description' => 'Design information architecture, data models, integrations and high-level UX. Decide tech stack and deployment approach.',
                    'duration'    => '1–3 weeks',
                    'outcome'     => 'Architecture and implementation plan that balance flexibility, budget and timelines.',
                    'icon'        => '/images/icons/architecture-design.svg',
                ],
                [
                    'step'        => 3,
                    'title'       => 'Incremental development & QA',
                    'description' => 'Build the system in small, reviewable increments with regular demos, feedback loops and automated plus manual testing.',
                    'duration'    => '4–12+ weeks (scope-dependent)',
                    'outcome'     => 'Working software with prioritised features, tested and ready for user acceptance.',
                    'icon'        => '/images/icons/core-modules.svg',
                ],
                [
                    'step'        => 4,
                    'title'       => 'User acceptance, training & go-live',
                    'description' => 'Support UAT, refine based on feedback, prepare data migration, documentation and training for your team.',
                    'duration'    => '2–4 weeks',
                    'outcome'     => 'Production go-live with trained users and a clear cut-over or phased rollout plan.',
                    'icon'        => '/images/icons/launch.svg',
                ],
                [
                    'step'        => 5,
                    'title'       => 'Post-launch support & roadmap',
                    'description' => 'Monitor behaviour in production, fix issues quickly and continue evolving the product via a structured roadmap.',
                    'duration'    => 'Ongoing, month-to-month',
                    'outcome'     => 'Stable, evolving custom software with predictable improvements over time.',
                    'icon'        => '/images/icons/scale.svg',
                ],
            ],

            'cta' => [
                'label' => 'Walk me through this process for my project',
                'url'   => '/contact-us/?service=custom-software&topic=process',
            ],
        ],

        // Use cases section
        'use_cases' => [
            'id'      => 'custom-software-use-cases',
            'eyebrow' => 'Where custom software fits best',
            'title'   => 'Custom software use cases we most often deliver',
            'intro'   => 'Most of our custom software work focuses on replacing manual processes, consolidating data and giving teams a system they can actually rely on day to day.',

            'items' => [
                [
                    'label'       => 'Line-of-business applications & internal tools',
                    'description' => 'Custom applications that run critical processes such as order management, project tracking, inventory, scheduling or approvals.',
                    'audience'    => 'Operations, finance, HR and logistics teams',
                    'badge'       => 'Operations',
                ],
                [
                    'label'       => 'Customer and partner portals',
                    'description' => 'Self-service portals where customers and partners can submit requests, track status, update details and access key information.',
                    'audience'    => 'B2B and B2C companies with recurring interactions',
                    'badge'       => 'Portals',
                ],
                [
                    'label'       => 'Modernising legacy or on-premise systems',
                    'description' => 'Rebuilding old desktop, access-database or on-premise systems into secure, browser-based software without losing functionality or data.',
                    'audience'    => 'Growing companies limited by outdated tools',
                    'badge'       => 'Modernisation',
                ],
                [
                    'label'       => 'MVPs and prototypes for new products',
                    'description' => 'Launching the smallest viable version of a new product so you can test with real users before committing to a full build.',
                    'audience'    => 'Founders, innovation and product teams',
                    'badge'       => 'MVP',
                    'link'        => [
                        'label' => 'Discuss a custom software MVP',
                        'url'   => '/contact-us/?service=custom-software&topic=mvp',
                    ],
                ],
            ],

            'cta' => [
                'label' => 'Ask if your idea fits these use cases',
                'url'   => '/contact-us/?service=custom-software&topic=use-cases',
            ],
        ],

        // Tech stack section
        'stack' => [
            'id'      => 'custom-software-tech-stack',
            'eyebrow' => 'Tech stack & platforms',
            'title'   => 'Tech stack we typically use for custom software development',
            'intro'   => 'We pick technologies that match your use case, internal skills and long-term plans. These are the stacks we rely on most often for custom software builds.',
            'note'    => 'Already have an existing codebase or preferred stack? We can review what you have and work with it where it makes sense, instead of forcing a complete rewrite.',

            'categories' => [
                [
                    'name'        => 'Backend & APIs',
                    'description' => 'Core application logic, integrations and security.',
                    'items'       => [
                        'Laravel 10/11/12 (PHP 8.x) for modular and maintainable backends.',
                        'NestJS (TypeScript, Node.js 20+) for API-first services and microservices.',
                        'RESTful APIs, webhooks and background workers for integrations and automation.',
                    ],
                ],
                [
                    'name'        => 'Frontend & user experience',
                    'description' => 'Interfaces that make it easy for your team and customers to get work done.',
                    'items'       => [
                        'Next.js (React, App Router) for responsive web apps, dashboards and portals.',
                        'Blade + Tailwind CSS for marketing sites and simpler interfaces.',
                        'Flutter or React Native for cross-platform mobile experiences when required.',
                    ],
                ],
                [
                    'name'        => 'Data, cloud & infrastructure',
                    'description' => 'Secure, scalable foundations for your custom software.',
                    'items'       => [
                        'MySQL and PostgreSQL with sensible indexing, migrations and backups.',
                        'Redis for caching, queues and rate limiting.',
                        'AWS, DigitalOcean, Azure or GCP with CI/CD pipelines for reliable deployments.',
                    ],
                ],
                [
                    'name'        => 'Quality, security & delivery',
                    'description' => 'Practices that keep your system reliable over years, not just at launch.',
                    'items'       => [
                        'Automated tests, code reviews and staging environments for safer releases.',
                        'Role-based access control, audit logs and secure coding practices.',
                        'Monitoring, logging and incident response tuned to your business needs.',
                    ],
                ],
            ],
        ],

        // Bottom CTA
        'cta' => [
            'enabled' => true,

            'eyebrow' => 'Ready to talk custom software?',
            'title'   => 'Let’s plan your next custom software release or MVP.',
            'body'    => 'Share your current challenges, existing tools and goals. We will review your requirements, outline options, estimate custom software development costs and propose a practical roadmap that matches your budget and timelines.',

            'primary_label' => 'Book a custom software discovery call',
            'primary_url'   => '/contact-us/?topic=custom-software-development',
            'primary_aria'  => 'Book a custom software discovery call with QalbIT',

            'secondary_label' => 'Send us your requirements',
            'secondary_url'   => '/contact-us/?topic=custom-software-development&source=requirements',
            'secondary_aria'  => 'Send your custom software requirements to QalbIT',

            'meta' => 'Typically we respond within 24–48 hours with clarifying questions and next steps.',
        ],
    ],

    'ai_solutions' => [
        'slug'      => '/services/ai-solutions/',
        'name'      => 'AI Solutions',
        'h1'        => 'AI Solutions Company – NLP, Computer Vision & Automation',
        'enabled'   => true,
        'order'     => 20,

        'meta_title'        => 'AI Solutions Company – NLP, Computer Vision & Automation',
        'meta_description'  => 'QalbIT delivers AI solutions including NLP, computer vision, and predictive analytics to automate workflows and unlock insights. Build your AI MVP in 90 days with our experts.',

        'short_description' => 'Practical AI solutions using NLP, computer vision, and predictive analytics for real business use cases.',
        'category'          => 'ai',
        'template'          => 'pages/services/ai-solutions',

        'icon'      => 'images/services/icon-ai-solutions.svg',
        'iconAlt'   => 'Icon representing AI Solutions',

        'faq_key'      => 'service_ai_solutions',
        'faq_title'    => 'Frequently asked questions about AI solutions and automation with QalbIT',
        'faq_subtitle' => 'These are the AI-related questions founders and teams usually ask when we discuss copilots, chatbots, automation and intelligent product features.',

        'hero' => [
            'breadcrumb_label' => 'AI solutions',
            'kicker_prefix'    => 'Services',
            'kicker_label'     => 'AI solutions, copilots and automation',
            'kicker_detail'    => 'Applied AI · LLMs · Workflow automation',

            'title'     => 'AI Solutions & Custom AI Development for <span class="text-gradient-brand-animated">SaaS, Products & Internal Tools</span>.',
            'highlight' => 'SaaS, Products & Internal Tools',

            'intro' => 'QalbIT helps you design and ship practical AI solutions – from chatbots and AI copilots to workflow automation and intelligent features embedded into your existing products. We focus on use cases that improve response times, reduce manual work and make your users noticeably happier.',

            'primary_cta_label' => 'Discuss your AI use cases',
            'primary_cta_href'  => '/contact-us/?topic=ai-solutions',

            'secondary_cta_label' => 'See AI-related case studies',
            'secondary_cta_href'  => '/case-studies/?tag=ai',

            'snapshot_title' => 'AI solutions snapshot',
            'snapshot'       => [
                [
                    'label' => 'Core focus',
                    'value' => 'Applied AI, LLM-powered features and automation',
                ],
                [
                    'label' => 'Typical engagements',
                    'value' => 'AI discovery, proofs of concept and product integrations',
                ],
                [
                    'label' => 'AI stack',
                    'value' => 'OpenAI, Anthropic, Google, and selected open-source models',
                ],
                [
                    'label' => 'Use cases',
                    'value' => 'Chatbots, copilots, document Q&A and workflow automation',
                ],
            ],
        ],

        'overview' => [
            'id'      => 'ai-overview',
            'eyebrow' => 'AI solutions overview',

            'title' => 'AI solutions and automation services for real-world products and teams',
            'intro' => 'We help product, operations and support teams use AI in practical ways. Instead of chasing hype, we focus on AI solutions that plug into your existing systems, reduce manual work and improve how customers experience your product.',

            'left_title' => 'When AI solutions with QalbIT make sense',
            'left_items' => [
                'You want to add AI features into an existing SaaS product or internal tool, not rebuild everything from scratch.',
                'You are exploring AI copilots, assistants or chatbots but need a partner to turn ideas into realistic scopes.',
                'Your team spends time on repetitive, rules-based tasks that AI and automation can handle reliably.',
                'You have valuable data in CRMs, ticketing tools or internal systems that could power smarter experiences.',
                'You prefer a senior, founder-led team that treats AI as part of the product, not just a separate experiment.',
            ],

            'right_title' => 'Outcomes we usually target with AI solutions',
            'right_items' => [
                'Shorter response and resolution times for customers and internal teams.',
                'Less manual data entry and copy-paste work across tools and spreadsheets.',
                'Product features that feel more intelligent, personalised and context aware.',
                'Clear AI guardrails so that outputs are traceable, reviewable and monitored.',
                'Documentation and handover so your team can understand and extend the solution.',
            ],

            'note' => 'For AI work we usually start with a discovery and use-case workshop to narrow down to one or two high-impact use cases, align on data and privacy constraints, then design a small proof of concept before scaling further.',
        ],

        'capabilities' => [
            'id'      => 'ai-capabilities',
            'eyebrow' => 'What we build with AI',
            'title'   => 'AI solution capabilities across assistants, automation and product features',
            'intro'   => 'From customer-facing chatbots to internal copilots and workflow automation, we help you design, build and integrate AI into the places where it will actually be used.',

            'items' => [
                [
                    'label'       => 'AI discovery and use-case design',
                    'description' => 'Structure workshops to identify where AI can help in your product or operations, define constraints and prioritise use cases based on impact versus complexity.',
                    'badge'       => 'Strategy',
                    'icon'        => '/images/icons/architecture.svg',
                ],
                [
                    'label'       => 'Chatbots and support assistants',
                    'description' => 'Build AI chatbots and helpdesk assistants that can answer common questions using your documentation, FAQs and historical tickets with clear escalation paths to humans.',
                    'badge'       => 'Support',
                    'icon'        => '/images/icons/chatbot.svg',
                ],
                [
                    'label'       => 'AI copilots inside your product',
                    'description' => 'Design AI-powered assistants directly inside your SaaS or internal tools that help users draft content, configure complex workflows or interpret reports.',
                    'badge'       => 'Product',
                    'icon'        => '/images/icons/modules.svg',
                ],
                [
                    'label'       => 'Workflow automation with AI in the loop',
                    'description' => 'Automate repetitive workflows such as triaging tickets, tagging conversations or enriching leads, while keeping humans in control for edge cases.',
                    'badge'       => 'Automation',
                    'icon'        => '/images/icons/automation.svg',
                ],
                [
                    'label'       => 'Document Q&A and knowledge search',
                    'description' => 'Turn scattered documentation, policies and guides into searchable, conversational knowledge bases your team or customers can query in natural language.',
                    'badge'       => 'Knowledge',
                    'icon'        => '/images/icons/qa.svg',
                ],
                [
                    'label'       => 'Guardrails, monitoring and compliance basics',
                    'description' => 'Set up role-based access, red-teaming, logging and monitoring for AI calls, aligned with your data privacy, security and industry constraints.',
                    'badge'       => 'Safety',
                    'icon'        => '/images/icons/compliance.svg',
                ],
            ],

            'cta' => [
                'label' => 'Discuss your AI solution scope',
                'url'   => '/contact-us/?service=ai-solutions',
            ],
        ],

        'process' => [
            'id'      => 'ai-process',
            'eyebrow' => 'How AI projects work with QalbIT',
            'title'   => 'A structured but lightweight AI project process',
            'intro'   => 'We follow a process that keeps AI experiments grounded in clear goals, real data and production realities, so pilots can grow into reliable long-term solutions.',

            'items' => [
                [
                    'step'        => 1,
                    'title'       => 'AI discovery and scoping',
                    'description' => 'Understand your product, workflows, data sources and constraints, then shortlist one or two high-impact AI use cases with realistic success metrics.',
                    'duration'    => '1–2 weeks',
                    'outcome'     => 'Clear problem statements, success criteria and a scoped initial AI solution or proof of concept.',
                    'icon'        => '/images/icons/discovery.svg',
                ],
                [
                    'step'        => 2,
                    'title'       => 'Prototype and validate',
                    'description' => 'Create a focused prototype using suitable models and tooling, test it with your team or a small user group and refine prompts, flows and guardrails.',
                    'duration'    => '2–4 weeks',
                    'outcome'     => 'Validated prototype that demonstrates value and clarifies technical and data requirements.',
                    'icon'        => '/images/icons/architecture-design.svg',
                ],
                [
                    'step'        => 3,
                    'title'       => 'Integrate with your product and systems',
                    'description' => 'Integrate AI capabilities into your existing backend, frontend and data sources with proper authentication, logging and monitoring.',
                    'duration'    => '3–6+ weeks (scope dependent)',
                    'outcome'     => 'Production-ready AI feature or assistant live in your environment, connected to real data.',
                    'icon'        => '/images/icons/core-modules.svg',
                ],
                [
                    'step'        => 4,
                    'title'       => 'Launch, observe and iterate',
                    'description' => 'Monitor usage, collect feedback, track metrics and refine prompts, flows and UI to improve reliability and perceived quality.',
                    'duration'    => 'First 4–8 weeks after launch',
                    'outcome'     => 'Stable AI solution with measurable impact and a prioritised iteration backlog.',
                    'icon'        => '/images/icons/launch.svg',
                ],
                [
                    'step'        => 5,
                    'title'       => 'Expand to additional use cases',
                    'description' => 'Use the learnings from the first implementation to carefully extend AI into new workflows, teams or segments on a predictable roadmap.',
                    'duration'    => 'Ongoing, month-to-month',
                    'outcome'     => 'A growing set of AI capabilities across your product and operations, managed by a single, coherent team.',
                    'icon'        => '/images/icons/scale.svg',
                ],
            ],

            'cta' => [
                'label' => 'Walk me through this AI process for my product',
                'url'   => '/contact-us/?service=ai-solutions&topic=process',
            ],
        ],

        'use_cases' => [
            'id'      => 'ai-use-cases',
            'eyebrow' => 'Where AI solutions work best',
            'title'   => 'AI solution use cases we most often deliver',
            'intro'   => 'Most of our AI work focuses on enhancing existing SaaS products and internal tools, rather than building standalone AI demos. These are the patterns we see most often.',

            'items' => [
                [
                    'label'       => 'Customer support assistants and chatbots',
                    'description' => 'AI assistants that answer common queries from documentation, policies and historical tickets, hand off to agents when needed and log conversations into your existing tools.',
                    'audience'    => 'Support, success and operations teams',
                    'badge'       => 'Support AI',
                    'link'        => [
                        'label' => 'Ask how this can plug into your helpdesk',
                        'url'   => '/contact-us/?service=ai-solutions&topic=support-ai',
                    ],
                ],
                [
                    'label'       => 'AI copilots for SaaS products',
                    'description' => 'Context-aware assistants inside your SaaS that help users set up complex configurations, draft content, interpret analytics or choose the right options step by step.',
                    'audience'    => 'SaaS founders and product teams',
                    'badge'       => 'In-product AI',
                    'link'        => [
                        'label' => 'Discuss an AI copilot for your app',
                        'url'   => '/contact-us/?service=ai-solutions&topic=copilot',
                    ],
                ],
                [
                    'label'       => 'Document Q&A and internal knowledge search',
                    'description' => 'Solutions that let staff query handbooks, SOPs, contracts and training material in natural language, with clear citations back to original documents.',
                    'audience'    => 'HR, compliance and operations',
                    'badge'       => 'Knowledge AI',
                ],
                [
                    'label'       => 'Workflow triage and automation',
                    'description' => 'Classify, route and enrich tickets, leads and requests automatically, so humans can focus on high-value exceptions instead of manual sorting.',
                    'audience'    => 'Operations and revenue teams',
                    'badge'       => 'Automation',
                ],
            ],

            'cta' => [
                'label' => 'Ask if your AI idea fits these use cases',
                'url'   => '/contact-us/?service=ai-solutions&topic=use-cases',
            ],
        ],

        'stack' => [
            'id'      => 'ai-tech-stack',
            'eyebrow' => 'AI stack and tooling',
            'title'   => 'AI platforms, tooling and stacks we typically use',
            'intro'   => 'We choose AI models and tooling based on your data, risk profile and long-term plans. The goal is to keep solutions maintainable, observable and aligned with your wider architecture.',
            'note'    => 'Already experimenting with AI? We can review your current prototypes, prompts and infrastructure, then suggest improvements rather than replacing everything.',

            'categories' => [
                [
                    'name'        => 'AI platforms and models',
                    'description' => 'Foundation models and APIs for language, chat and embeddings.',
                    'items'       => [
                        'OpenAI GPT models for language, chat and embeddings where SaaS usage is appropriate.',
                        'Anthropic Claude and Google Gemini when they better match compliance or capabilities.',
                        'Selected open-source LLMs where self-hosting or tighter control is required.',
                    ],
                ],
                [
                    'name'        => 'Backend and orchestration',
                    'description' => 'Glue that connects AI capabilities to your product and workflows.',
                    'items'       => [
                        'Laravel and NestJS backends that call AI APIs safely and efficiently.',
                        'Task queues, schedulers and background jobs for reliable processing.',
                        'Prompt and workflow orchestration using established libraries and patterns.',
                    ],
                ],
                [
                    'name'        => 'Data, storage and retrieval',
                    'description' => 'Structured and unstructured data foundations that make AI useful.',
                    'items'       => [
                        'MySQL and PostgreSQL for core product and operational data.',
                        'Vector search using pgvector or dedicated vector stores for document and knowledge search.',
                        'Secure storage and access patterns aligned with your data privacy requirements.',
                    ],
                ],
                [
                    'name'        => 'Product UX and integration',
                    'description' => 'How users actually experience AI in your product or workflows.',
                    'items'       => [
                        'Next.js and Tailwind CSS for in-product assistants and dashboards.',
                        'Chat-style interfaces, guided flows and summarisation views tuned to real tasks.',
                        'Event tracking, logging and analytics to understand how AI features are used.',
                    ],
                ],
            ],
        ],

        'cta' => [
            'enabled' => true,

            'eyebrow' => 'Ready to explore AI for your product?',
            'title'   => 'Let us map out one or two practical AI use cases together.',
            'body'    => 'Share where your product or processes are today and what you want AI to change. We will review your ideas, constraints and data, then suggest a realistic first AI solution that can grow over time.',

            // Primary CTA
            'primary_label' => 'Book an AI discovery call',
            'primary_url'   => '/contact-us/?topic=ai-solutions',
            'primary_aria'  => 'Book an AI discovery call with QalbIT',

            // Secondary CTA (optional)
            'secondary_label' => 'Discuss an AI copilot or chatbot',
            'secondary_url'   => '/contact-us/?topic=ai-copilot-chatbot',
            'secondary_aria'  => 'Discuss an AI copilot or chatbot with QalbIT',

            // Optional small helper text
            'meta' => 'Typically we respond within 24–48 hours with next steps and one or two suggested pilots.',
        ],
    ],

    'saas' => [
        'slug'  => '/services/saas/',
        'name'  => 'SaaS Product Development',
        'h1'    => 'SaaS Application Development Company',
        'enabled' => true,
        'order' => 30,

        'meta_title' => 'SaaS Application Development Company – Launch & Scale Faster',
        'meta_description' => 'QalbIT designs, develops, and scales SaaS products with secure, multi-tenant architecture. Launch your SaaS MVP faster and grow with a team experienced in subscription and product-led models.',

        'short_description' => 'Multi-tenant SaaS products from MVP to scale, with billing, analytics, and secure architectures.',
        'category' => 'core',
        'template' => 'pages/services/saas',

        'icon'      => 'images/services/icon-saas-solutions.svg',
        'iconAlt'   => 'Icon representing SaaS Product Development',

        'faq_key'      => 'service_saas',
        'faq_title'    => 'Frequently asked questions about SaaS development with QalbIT',
        'faq_subtitle' => 'These are the questions founders and product teams usually ask when we discuss new SaaS products or modernising existing platforms.',

        'hero' => [
            'breadcrumb_label'     => 'SaaS',
            'kicker_prefix'        => 'Services',
            'kicker_label'         => 'SaaS product & platform development',
            'kicker_detail'        => 'Multi-tenant · Subscription · Cloud-native',
            'title'                => 'SaaS Application Development Services for <span class="text-gradient-brand-animated">Subscription & B2B Products</span>.',
            'highlight'            => 'Subscription & B2B Products',
            'intro'                => 'QalbIT helps you plan, design, build and scale secure, multi-tenant SaaS products – from first MVP to mature platforms with predictable billing, analytics and integrations.',
            'primary_cta_label'    => 'Discuss your SaaS product',
            'primary_cta_href'     => '/contact-us/?topic=saas-development',
            'secondary_cta_label'  => 'See SaaS-style case studies',
            'secondary_cta_href'   => '/case-studies/',
            'snapshot_title'       => 'SaaS snapshot',
            'snapshot' => [
                ['label' => 'Core focus',        'value' => 'SaaS & subscription platforms'],
                ['label' => 'Typical engagements','value' => 'MVPs, rebuilds, long-term product teams'],
                ['label' => 'Architecture',      'value' => 'Multi-tenant, API-first, cloud-native'],
                ['label' => 'Product areas',     'value' => 'Billing, onboarding, analytics, integrations'],
            ],
        ],

        'overview' => [
            'id'      => 'saas-overview',
            'eyebrow' => 'SaaS overview',

            'title'   => 'SaaS development services for multi-tenant, subscription-based products',
            'intro'   => 'We help founders and product teams build and scale SaaS applications – from first MVP to
                          multi-tenant, subscription-based platforms with reliable billing, onboarding and analytics.',

            'left_title' => 'When SaaS development with QalbIT makes sense',
            'left_items' => [
                'You are planning a new SaaS product and need a practical, MVP-first roadmap.',
                'Your existing SaaS needs refactoring, new modules or better performance.',
                'You want a multi-tenant architecture instead of one-off custom deployments.',
                'You need to streamline subscription plans, billing, invoicing and trials.',
                'You prefer a senior, founder-led team rather than handing work to juniors.',
            ],

            'right_title' => 'Outcomes we typically target for SaaS teams',
            'right_items' => [
                'A stable, multi-tenant SaaS that can onboard new customers without friction.',
                'Subscription and billing flows that reduce churn and support upgrades/downgrades.',
                'Cleaner architecture and APIs that are easier to extend and integrate with.',
                'Release cadence that lets you ship features frequently without breaking production.',
                'Clear monitoring, logging and alerting to catch issues before customers do.',
            ],

            'note' => 'For SaaS, we usually start with a short discovery sprint to align on pricing models,
                       multi-tenant strategy, key modules and integration requirements before locking scope.',
        ],

        'capabilities' => [
            'id'      => 'saas-capabilities',
            'eyebrow' => 'What we build for SaaS teams',
            'title'   => 'SaaS development capabilities across product, platform and billing',
            'intro'   => 'From first MVP to multi-tenant SaaS platforms, we cover architecture, core modules,
                          subscription flows and the APIs that connect everything.',

            'items'   => [
                [
                    'label'       => 'Multi-tenant SaaS architecture',
                    'description' => 'Design tenant models, roles, permissions and data isolation so that one codebase
                                      can safely serve multiple customers.',
                    'badge'       => 'Architecture',
                    'icon'        => '/images/icons/architecture.svg',
                ],
                [
                    'label'       => 'Core SaaS modules & dashboards',
                    'description' => 'Onboarding, account management, admin dashboards, usage tracking and customer-facing
                                      UI built with modern web stacks.',
                    'badge'       => 'Product',
                    'icon'        => '/images/icons/modules.svg',
                ],
                [
                    'label'       => 'Subscriptions, billing & invoicing',
                    'description' => 'Plan management, trials, upgrades/downgrades, payment gateways and invoicing flows
                                      designed around your pricing model.',
                    'badge'       => 'Billing',
                    'icon'        => '/images/icons/billing.svg',
                ],
                [
                    'label'       => 'Integrations & APIs',
                    'description' => 'REST/GraphQL APIs, webhooks and integrations with CRMs, payment providers, analytics
                                      and internal tools.',
                    'badge'       => 'APIs',
                    'icon'        => '/images/icons/api.svg',
                ],
                [
                    'label'       => 'Security, roles & compliance basics',
                    'description' => 'Role-based access control, audit logs and sensible security practices aligned with
                                      your industry requirements.',
                    'badge'       => 'Security',
                    'icon'        => '/images/icons/security.svg',
                ],
                [
                    'label'       => 'Operations, monitoring & support',
                    'description' => 'Error tracking, uptime monitoring and practical support workflows so your SaaS
                                      behaves reliably in production.',
                    'badge'       => 'Ops',
                    'icon'        => '/images/icons/ops.svg',
                ],
            ],

            'cta' => [
                'label' => 'Discuss your SaaS platform scope',
                'url'   => '/contact-us/?service=saas',
            ],
        ],

        'process' => [
            'id'      => 'saas-process',
            'eyebrow' => 'How SaaS development works with QalbIT',
            'title'   => 'A practical SaaS development process from idea to stable platform',
            'intro'   => 'We keep the process lightweight but structured, so you can validate quickly,
                          ship confidently and grow without piling up technical debt.',

            'items'   => [
                [
                    'step'        => 1,
                    'title'       => 'Product discovery & SaaS fit',
                    'description' => 'Clarify problem–solution fit, target users, pricing model and the smallest
                                      version of your SaaS we can ship to learn fast.',
                    'duration'    => '1–2 weeks',
                    'outcome'     => 'Discovery notes, prioritised feature list and a realistic first release scope.',
                    'icon'        => '/images/icons/discovery.svg',
                ],
                [
                    'step'        => 2,
                    'title'       => 'Architecture & experience design',
                    'description' => 'Define multi-tenant architecture, key user flows, dashboards and API strategy
                                      before we write significant code.',
                    'duration'    => '1–3 weeks',
                    'outcome'     => 'Architecture decisions, core UX flows and implementation plan for the MVP.',
                    'icon'        => '/images/icons/architecture-design.svg',
                ],
                [
                    'step'        => 3,
                    'title'       => 'MVP build & iterative releases',
                    'description' => 'Implement core modules, subscriptions, billing and critical integrations in
                                      small, reviewable increments.',
                    'duration'    => '4–10+ weeks (scope-dependent)',
                    'outcome'     => 'Production-ready SaaS MVP running on your cloud environment.',
                    'icon'        => '/images/icons/core-modules.svg',
                ],
                [
                    'step'        => 4,
                    'title'       => 'Launch, monitoring & early improvements',
                    'description' => 'Set up monitoring, error tracking and analytics, then respond quickly to
                                      real usage and early customer feedback.',
                    'duration'    => 'First 4–8 weeks after launch',
                    'outcome'     => 'Stable early-stage product with a prioritised backlog for v2+.',
                    'icon'        => '/images/icons/launch.svg',
                ],
                [
                    'step'        => 5,
                    'title'       => 'Ongoing roadmap & scaling',
                    'description' => 'Continue iterating on features, performance and integrations either through
                                      a dedicated squad or a flexible retainer.',
                    'duration'    => 'Ongoing, month-to-month',
                    'outcome'     => 'Predictable velocity on a roadmap that aligns with your growth targets.',
                    'icon'        => '/images/icons/scale.svg',
                ],
            ],

            'cta' => [
                'label' => 'Walk me through this process for my SaaS',
                'url'   => '/contact-us/?service=saas&topic=process',
            ],
        ],

        'use_cases' => [
            'id'      => 'saas-use-cases',
            'eyebrow' => 'Where SaaS development is usually the best choice',
            'title'   => 'SaaS products and models we most often design and build',
            'intro'   => 'Most of our SaaS work comes from founders and teams building recurring revenue products,
                        modernising legacy tools or launching vertical SaaS in a specific niche.',

            'items'   => [
                [
                    'label'       => 'Subscription-based SaaS platforms',
                    'description' => 'Multi-tenant web apps with sign-up, onboarding, plans, free trials, coupons,
                                    invoicing and recurring billing (Stripe, Razorpay, Paddle, etc.).',
                    'audience'    => 'B2B, B2C, prosumer SaaS founders',
                    'badge'       => 'New build or rebuild',
                    'link'        => [
                        'label' => 'See how we built Tennis club management as a SaaS product',
                        'url'   => '/case-studies/plugin/',
                    ],
                ],
                [
                    'label'       => 'Vertical / niche SaaS products',
                    'description' => 'Industry-focused products (for example ISP management, queue management,
                                    logistics, healthcare workflows) where you digitise a very specific process.',
                    'audience'    => 'Domain experts, agencies, operators',
                    'badge'       => 'Vertical SaaS',
                    'link'        => [
                        'label' => 'View case studies for niche SaaS',
                        'url'   => '/case-studies/#vertical-saas',
                    ],
                ],
                [
                    'label'       => 'Internal tools turned into SaaS',
                    'description' => 'Taking an internal tool or script that already works for your team and turning
                                    it into a polished, multi-tenant SaaS others can pay for.',
                    'audience'    => 'SMEs, productised service founders',
                    'badge'       => 'Productisation',
                ],
                [
                    'label'       => 'Migration from legacy SaaS or no-code',
                    'description' => 'Rebuilding an existing SaaS or no-code app into a more scalable architecture
                                    while keeping your current customers and data safe.',
                    'audience'    => 'Growing teams with real users',
                    'badge'       => 'Modernisation',
                ],
            ],

            'cta' => [
                'label' => 'Ask if your SaaS fits these use cases',
                'url'   => '/contact-us/?service=saas&topic=use-cases',
            ],
        ],

        'stack' => [
            'id'      => 'saas-tech-stack',
            'eyebrow' => 'Tech stack & platforms',
            'title'   => 'SaaS stack we most often use at QalbIT',
            'intro'   => 'We choose stack based on your product, market and internal team. These are the tools
                        we rely on for most SaaS builds across our own products and client work.',
            'note'    => 'Already have a live SaaS? We will review your current stack and only recommend changes
                        where they clearly improve reliability, performance or maintainability.',

            'categories' => [
                [
                    'name'        => 'Backend & APIs',
                    'description' => 'Core application logic, multi-tenant SaaS patterns and integrations.',
                    'items'       => [
                        'Laravel 10/11/12 (PHP 8.x) with modular architecture',
                        'NestJS (TypeScript, Node.js 20+) for API-first builds',
                        'REST, webhooks, background jobs and queues',
                    ],
                ],
                [
                    'name'        => 'Frontend, portals & dashboards',
                    'description' => 'Responsive dashboards for admin, customers, partners and internal teams.',
                    'items'       => [
                        'Next.js (React, App Router) for dashboards and portals',
                        'Blade + Tailwind CSS for marketing, docs and simple flows',
                        'Component-driven UI with accessibility baked in',
                    ],
                ],
                [
                    'name'        => 'Data, multi-tenancy & infrastructure',
                    'description' => 'Secure storage for tenant data with predictable performance as you grow.',
                    'items'       => [
                        'MySQL / PostgreSQL with tenant-aware schemas',
                        'Redis for queues, caching and rate-limiting',
                        'AWS / DigitalOcean or similar managed cloud, CI/CD pipelines',
                    ],
                ],
                [
                    'name'        => 'Billing, auth & observability',
                    'description' => 'Everything around the core product: subscriptions, security, monitoring.',
                    'items'       => [
                        'Stripe, Paddle, Razorpay for subscriptions and payments',
                        'JWT-based APIs, OAuth and SSO where needed',
                        'Centralised logging, monitoring and alerting for uptime',
                    ],
                ],
            ],
        ],

        'cta' => [
            'enabled' => true,

            'eyebrow' => 'Ready to talk SaaS?',
            'title'   => 'Let’s plan your next SaaS release or MVP.',
            'body'    => 'Share where your SaaS product is today and where you want it to be. We will review your goals, current stack and constraints, then suggest a practical roadmap – whether you are validating an idea or scaling an existing platform.',

            // Primary CTA
            'primary_label' => 'Book a SaaS discovery call',
            'primary_url'   => '/contact-us/?topic=saas-development',
            'primary_aria'  => 'Book a SaaS discovery call with QalbIT',

            // Secondary CTA (optional)
            'secondary_label' => 'View SaaS case studies',
            'secondary_url'   => '/case-studies/?tag=saas',
            'secondary_aria'  => 'View SaaS case studies delivered by QalbIT',

            // Optional small helper text
            'meta' => 'Typically we respond within 24–48 hours with next steps.',
        ],
    ],

    'web_applications' => [
        'slug'  => '/services/web-applications/',
        'name'  => 'Web Applications',
        'h1'    => 'Custom Web Application Development Services',
        'enabled' => true,
        'order' => 40,

        'meta_title' => 'Web Application Development Services – Custom Web Apps for Businesses',
        'meta_description' => 'QalbIT offers custom web application development services for portals, dashboards and internal tools. We design and build secure, scalable web apps using Laravel, Next.js and modern stacks to streamline workflows and grow revenue.',

        'short_description' => 'Custom web application development for portals, dashboards and internal tools, built around your workflows and growth goals.',
        'category' => 'core',
        'template' => 'pages/services/web-applications',

        'icon'      => 'images/services/icon-web-applications.svg',
        'iconAlt'   => 'Icon representing Web Applications',

        // FAQ linkage
        'faq_key'      => 'service_web_applications',
        'faq_title'    => 'Frequently asked questions about custom web application development with QalbIT',
        'faq_subtitle' => 'These are the web application development questions founders and teams usually ask when we discuss portals, dashboards and internal tools.',

        // Hero section
        'hero' => [
            'breadcrumb_label' => 'Web applications',
            'kicker_prefix'    => 'Services',
            'kicker_label'     => 'Custom web application development',
            'kicker_detail'    => 'Portals · Dashboards · Internal tools',

            'title'     => 'Web Application Development Services for <span class="text-gradient-brand-animated">Portals, Dashboards & Internal Tools</span>.',
            'highlight' => 'Portals, Dashboards & Internal Tools',

            'intro' => 'QalbIT designs and builds custom web applications that sit at the heart of your business – from customer-facing portals and self-service dashboards to internal tools and workflow automation. We focus on web application development that reduces manual work, centralises data and gives teams faster, more reliable ways to operate.',

            'primary_cta_label' => 'Discuss your web application',
            'primary_cta_href'  => '/contact-us/?service=web-applications',

            'secondary_cta_label' => 'See relevant case studies',
            'secondary_cta_href'  => '/case-studies/?tag=web-app',

            'snapshot_title' => 'Web applications snapshot',
            'snapshot'       => [
                [
                    'label' => 'Core focus',
                    'value' => 'Web applications, portals and internal tools',
                ],
                [
                    'label' => 'Typical engagements',
                    'value' => 'New custom web apps, rebuilds and modernisation',
                ],
                [
                    'label' => 'Tech stack',
                    'value' => 'Laravel, Next.js, REST APIs, modern cloud hosting',
                ],
                [
                    'label' => 'Use cases',
                    'value' => 'Customer portals, admin panels, workflow tools',
                ],
            ],
        ],

        // Overview section
        'overview' => [
            'id'      => 'web-applications-overview',
            'eyebrow' => 'Web application development overview',

            'title' => 'Web application development services for modern, workflow-driven businesses',
            'intro' => 'We help teams replace spreadsheets and fragile legacy tools with secure, scalable web applications. Our web application development services cover everything from discovery and UX to architecture, delivery and long-term support.',

            'left_title' => 'When custom web application development with QalbIT makes sense',
            'left_items' => [
                'You have manual or spreadsheet-based processes that need a centralised web application.',
                'You want a secure web portal for customers, partners or vendors instead of sending endless emails.',
                'Your existing web app is slow, fragile or difficult to maintain and needs a thoughtful rebuild.',
                'You need a web-based dashboard that pulls data from multiple systems into one place.',
                'You prefer a senior, founder-led team that understands both product and engineering trade-offs.',
            ],

            'right_title' => 'Outcomes we usually target with web applications',
            'right_items' => [
                'Clear, reliable workflows that reduce manual work and back-and-forth.',
                'A single source of truth for data instead of scattered spreadsheets and tools.',
                'Faster response times for customers, partners and internal teams.',
                'A web application architecture that is easier to extend, integrate and maintain.',
                'Predictable releases and support so your web app remains stable in production.',
            ],

            'note' => 'For most web application development projects, we start with a short discovery phase to understand processes, data flows and constraints before proposing an implementation plan.',
        ],

        // Capabilities section
        'capabilities' => [
            'id'      => 'web-applications-capabilities',
            'eyebrow' => 'What we build as web applications',
            'title'   => 'Web application development capabilities across portals, tools and dashboards',
            'intro'   => 'From customer portals to internal admin tools, we design and build custom web applications that match how your business actually works.',

            'items' => [
                [
                    'label'       => 'Customer and self-service portals',
                    'description' => 'Web portals where customers can log in, manage profiles, track orders, view documents or submit requests without needing constant human intervention.',
                    'badge'       => 'Customer-facing',
                    'icon'        => '/images/icons/modules.svg',
                ],
                [
                    'label'       => 'Admin panels and back-office tools',
                    'description' => 'Secure admin interfaces for your team to manage data, workflows, approvals and content with fine-grained permissions.',
                    'badge'       => 'Internal tools',
                    'icon'        => '/images/icons/architecture.svg',
                ],
                [
                    'label'       => 'Workflow and process automation',
                    'description' => 'Custom web apps that automate approvals, notifications and hand-offs between teams, reducing manual follow-ups.',
                    'badge'       => 'Automation',
                    'icon'        => '/images/icons/automation.svg',
                ],
                [
                    'label'       => 'Reporting and analytics dashboards',
                    'description' => 'Role-based web dashboards that bring together KPIs, reports and logs from multiple systems into a single view.',
                    'badge'       => 'Analytics',
                    'icon'        => '/images/icons/qa.svg',
                ],
                [
                    'label'       => 'Integrations and API-driven web apps',
                    'description' => 'Web applications that talk to your CRM, ERP, payment gateways or third-party APIs using secure, well-documented integrations.',
                    'badge'       => 'Integrations',
                    'icon'        => '/images/icons/api.svg',
                ],
                [
                    'label'       => 'Modernisation of legacy web applications',
                    'description' => 'Rebuilds of old, slow or framework-locked web apps into modern stacks like Laravel and Next.js with improved UX.',
                    'badge'       => 'Modernisation',
                    'icon'        => '/images/icons/ops.svg',
                ],
            ],

            'cta' => [
                'label' => 'Discuss your web application scope',
                'url'   => '/contact-us/?service=web-applications',
            ],
        ],

        // Process section
        'process' => [
            'id'      => 'web-applications-process',
            'eyebrow' => 'How web app projects work with QalbIT',
            'title'   => 'A practical web application development process from idea to stable release',
            'intro'   => 'We keep the process structured but lightweight, so your web application can move from concept to production without unnecessary complexity.',

            'items' => [
                [
                    'step'        => 1,
                    'title'       => 'Discovery and requirements',
                    'description' => 'Understand your workflows, users, data sources and constraints, then define clear objectives for the web application.',
                    'duration'    => '1–2 weeks',
                    'outcome'     => 'Documented requirements, user types, core modules and a realistic first release scope.',
                    'icon'        => '/images/icons/discovery.svg',
                ],
                [
                    'step'        => 2,
                    'title'       => 'UX, architecture and planning',
                    'description' => 'Design key user journeys, information architecture and a technical approach using suitable web application frameworks.',
                    'duration'    => '1–3 weeks',
                    'outcome'     => 'Wireframes, architecture decisions and a plan that balances speed and maintainability.',
                    'icon'        => '/images/icons/architecture-design.svg',
                ],
                [
                    'step'        => 3,
                    'title'       => 'Implementation and integrations',
                    'description' => 'Build the web application in small increments, integrate required APIs and ensure access control and data validation are solid.',
                    'duration'    => '4–10+ weeks (scope-dependent)',
                    'outcome'     => 'A working web application ready for pilot users or staging review.',
                    'icon'        => '/images/icons/core-modules.svg',
                ],
                [
                    'step'        => 4,
                    'title'       => 'Testing, launch and handover',
                    'description' => 'Perform QA, security checks and performance tuning, then launch the app and hand over documentation and training.',
                    'duration'    => '2–4 weeks',
                    'outcome'     => 'Production-ready web application running on your chosen infrastructure.',
                    'icon'        => '/images/icons/launch.svg',
                ],
                [
                    'step'        => 5,
                    'title'       => 'Support and continuous improvement',
                    'description' => 'Monitor usage, fix issues and add enhancements as your team and customers start relying on the web application.',
                    'duration'    => 'Ongoing, month-to-month',
                    'outcome'     => 'A stable, evolving web app that keeps pace with your business needs.',
                    'icon'        => '/images/icons/scale.svg',
                ],
            ],

            'cta' => [
                'label' => 'Walk me through this process for my web app',
                'url'   => '/contact-us/?service=web-applications&topic=process',
            ],
        ],

        // Use cases section
        'use_cases' => [
            'id'      => 'web-applications-use-cases',
            'eyebrow' => 'Where custom web apps fit best',
            'title'   => 'Web application development use cases we most often deliver',
            'intro'   => 'Most of our web application projects are focused on replacing manual processes or upgrading fragmented tools into a central, browser-based solution.',

            'items' => [
                [
                    'label'       => 'Customer self-service and account management',
                    'description' => 'Portals where customers can view orders, invoices, tickets, subscriptions or project status without needing to contact your team.',
                    'audience'    => 'B2B and B2C businesses with recurring customer interactions',
                    'badge'       => 'Customer portals',
                    'link'        => [
                        'label' => 'Ask how this could work for your customers',
                        'url'   => '/contact-us/?service=web-applications&topic=customer-portal',
                    ],
                ],
                [
                    'label'       => 'Internal admin tools and back-office systems',
                    'description' => 'Web apps that allow operations, finance, HR or support teams to manage records, approvals and workflows in one place.',
                    'audience'    => 'Operations and internal teams',
                    'badge'       => 'Internal tools',
                ],
                [
                    'label'       => 'Partner and vendor portals',
                    'description' => 'Secure portals for vendors, distributors or partners to upload data, track requests and collaborate on shared work.',
                    'audience'    => 'Organisations working with external partners',
                    'badge'       => 'Partner portals',
                ],
                [
                    'label'       => 'Reporting, monitoring and analytics apps',
                    'description' => 'Browser-based dashboards that consolidate metrics and logs from different systems so leadership can make faster decisions.',
                    'audience'    => 'Leadership and analytics teams',
                    'badge'       => 'Analytics',
                ],
            ],

            'cta' => [
                'label' => 'Ask if your idea fits these web app patterns',
                'url'   => '/contact-us/?service=web-applications&topic=use-cases',
            ],
        ],

        // Tech stack section
        'stack' => [
            'id'      => 'web-applications-tech-stack',
            'eyebrow' => 'Tech stack & platforms',
            'title'   => 'Web application development stack we typically use',
            'intro'   => 'We choose frameworks and tools based on your requirements and in-house skills. These are the web application technologies we rely on most often.',
            'note'    => 'If you already have an existing stack, we will review it first and only suggest changes where they clearly improve reliability, performance or maintainability.',

            'categories' => [
                [
                    'name'        => 'Backend & application logic',
                    'description' => 'Foundations for secure, scalable custom web applications.',
                    'items'       => [
                        'Laravel 10/11/12 (PHP 8.x) for structured, maintainable backends.',
                        'NestJS (TypeScript, Node.js) for API-first web application development.',
                        'RESTful APIs, background jobs and queues for robust processing.',
                    ],
                ],
                [
                    'name'        => 'Frontend & UX',
                    'description' => 'Responsive, accessible interfaces that users actually enjoy using.',
                    'items'       => [
                        'Next.js (React) for interactive dashboards and portals.',
                        'Blade + Tailwind CSS for lean, server-rendered web application UIs.',
                        'Component-driven design systems for consistent UI patterns.',
                    ],
                ],
                [
                    'name'        => 'Data & integrations',
                    'description' => 'Persistent storage and connectivity between your core systems.',
                    'items'       => [
                        'MySQL and PostgreSQL for relational data in web applications.',
                        'Redis for caching, queues and rate limiting.',
                        'Secure integrations with CRMs, ERPs, payment gateways and third-party APIs.',
                    ],
                ],
                [
                    'name'        => 'Infrastructure, security & reliability',
                    'description' => 'How your web application runs reliably in the real world.',
                    'items'       => [
                        'AWS, DigitalOcean or similar managed cloud infrastructure.',
                        'CI/CD pipelines for safe, repeatable deployments.',
                        'Logging, monitoring and alerting to catch issues early.',
                    ],
                ],
            ],
        ],

        // CTA section
        'cta' => [
            'enabled' => true,

            'eyebrow' => 'Ready to talk about your web application?',
            'title'   => 'Let’s design and build a web application around your workflows.',
            'body'    => 'Share what you are trying to achieve, what tools you currently use and where they fall short. We will review your goals and propose a practical web application development plan.',

            'primary_label' => 'Book a web application discovery call',
            'primary_url'   => '/contact-us/?topic=web-application-development',
            'primary_aria'  => 'Book a web application development discovery call with QalbIT',

            'secondary_label' => 'Send us your requirements',
            'secondary_url'   => '/contact-us/?topic=web-app-requirements',
            'secondary_aria'  => 'Send your web application requirements to QalbIT',

            'meta' => 'Typically we respond within 24–48 hours with next steps and an initial plan.',
        ],
    ],

    'custom_web' => [
        'slug'  => '/services/custom-web-development/',
        'name'  => 'Custom Web Development',
        'h1'    => 'Custom Web Development Company',
        'enabled' => true,
        'order' => 50,

        'meta_title' => 'Custom Web Development Company – High-Performance Web Apps',
        'meta_description' => 'QalbIT designs and builds custom web applications, portals, and websites that combine UX, performance, and scalability. Launch modern web experiences optimized for conversion and growth.',

        'short_description' => 'High-performance custom web applications, portals, and responsive websites built for conversion and scale.',
        'category' => 'core',
        'template' => 'pages/services/custom-web',

        'icon'      => 'images/services/icon-web-development.svg',
        'iconAlt'   => 'Icon representing Custom Web Development',

        'faq_key'      => 'service_custom_web',
        'faq_title'    => 'Frequently asked questions about custom web development with QalbIT',
        'faq_subtitle' => 'These are the questions founders and teams usually ask when we discuss new websites, portals and web applications.',

        'hero' => [
            'breadcrumb_label' => 'Custom web development',
            'kicker_prefix'    => 'Services',
            'kicker_label'     => 'Custom web development & web applications',
            'kicker_detail'    => 'Web apps · Portals · Websites',

            'title'     => 'Custom Web Development Services for <span class="text-gradient-brand-animated">Modern Websites, Portals & Web Applications</span>.',
            'highlight' => 'Modern Websites, Portals & Web Applications',

            'intro' => 'QalbIT designs and develops custom web experiences that go beyond templates – from marketing websites and customer portals to business-critical web applications. We focus on performance, UX, security and maintainability so your web presence supports growth instead of holding it back.',

            'primary_cta_label' => 'Discuss your web project',
            'primary_cta_href'  => '/contact-us/?topic=custom-web-development',

            'secondary_cta_label' => 'See web development case studies',
            'secondary_cta_href'  => '/case-studies/?tag=web-development',

            'snapshot_title' => 'Custom web snapshot',
            'snapshot'       => [
                [
                    'label' => 'Core focus',
                    'value' => 'Custom web apps, portals and marketing websites',
                ],
                [
                    'label' => 'Typical engagements',
                    'value' => 'Corporate sites, B2B portals, dashboards, redesigns',
                ],
                [
                    'label' => 'Tech stack',
                    'value' => 'Laravel, Next.js, Tailwind, REST APIs',
                ],
                [
                    'label' => 'Delivery model',
                    'value' => 'Project-based or dedicated squads for long-term work',
                ],
            ],
        ],

        'overview' => [
            'id'      => 'custom-web-overview',
            'eyebrow' => 'Custom web development overview',

            'title' => 'Custom web development services for secure, high-performing web experiences',
            'intro' => 'We help businesses build modern web experiences – from marketing sites and content hubs to complex portals and web applications. The goal is simple: fast, reliable, easy-to-manage web platforms that feel good to use and support measurable business outcomes.',

            'left_title' => 'When custom web development with QalbIT makes sense',
            'left_items' => [
                'You have outgrown a template-based website and need something custom that reflects your brand and workflows.',
                'You want a reliable web application or portal that your customers, partners or staff can depend on every day.',
                'Your current site is slow, difficult to update or not aligned with modern UX, SEO and security expectations.',
                'You are connecting multiple tools (CRM, forms, billing, support) and need a clean, unified web experience.',
                'You prefer a senior, founder-led team that treats your web presence as a long-term asset, not a one-off project.',
            ],

            'right_title' => 'Outcomes we usually target for web projects',
            'right_items' => [
                'Faster page loads, better Core Web Vitals and fewer performance-related drop-offs.',
                'Clearer information architecture and UX flows that guide users to the right actions.',
                'Easier content and landing page management for your marketing and sales teams.',
                'A maintainable codebase and stack that your internal or external teams can extend safely.',
                'Instrumentation (analytics, logging, monitoring) that makes ongoing optimisation straightforward.',
            ],

            'note' => 'For custom web projects, we typically start with a short discovery and UX/architecture workshop to align on goals, sitemap, key flows, integrations and constraints before we estimate and lock scope.',
        ],

        'capabilities' => [
            'id'      => 'custom-web-capabilities',
            'eyebrow' => 'What we build on the web',
            'title'   => 'Custom web development capabilities across sites, portals and web applications',
            'intro'   => 'From lean marketing sites to complex portals and internal web applications, we cover planning, design, development and integration so you do not have to juggle multiple vendors.',

            'items' => [
                [
                    'label'       => 'Corporate websites and marketing sites',
                    'description' => 'Brand-aligned, responsive websites built with modern stacks, SEO basics and analytics baked in so your marketing team can launch campaigns with confidence.',
                    'badge'       => 'Websites',
                    'icon'        => '/images/icons/website.svg',
                ],
                [
                    'label'       => 'Customer, partner and vendor portals',
                    'description' => 'Self-service portals where customers, partners or vendors can log in, view data, submit requests and collaborate with your team securely.',
                    'badge'       => 'Portals',
                    'icon'        => '/images/icons/architecture.svg',
                ],
                [
                    'label'       => 'Custom web applications and dashboards',
                    'description' => 'Line-of-business web apps, admin dashboards and internal tools that digitise your workflows and reduce spreadsheet chaos.',
                    'badge'       => 'Web apps',
                    'icon'        => '/images/icons/modules.svg',
                ],
                [
                    'label'       => 'Responsive UX, accessibility and performance',
                    'description' => 'Design systems, component libraries, accessibility considerations and performance tuning tuned for real devices and networks.',
                    'badge'       => 'UX & performance',
                    'icon'        => '/images/icons/qa.svg', // reused
                ],
                [
                    'label'       => 'Integrations, APIs and third-party services',
                    'description' => 'Connections to CRMs, ERPs, payment gateways, marketing tools and other internal systems via secure, documented APIs.',
                    'badge'       => 'Integrations',
                    'icon'        => '/images/icons/api.svg', // reused
                ],
                [
                    'label'       => 'Security, SEO and operational foundations',
                    'description' => 'Sensibly secure authentication, roles and content workflows with technical SEO, logging and monitoring as part of the baseline.',
                    'badge'       => 'Foundations',
                    'icon'        => '/images/icons/compliance.svg', // reused
                ],
            ],

            'cta' => [
                'label' => 'Discuss your web development scope',
                'url'   => '/contact-us/?service=custom-web-development',
            ],
        ],

        'process' => [
            'id'      => 'custom-web-process',
            'eyebrow' => 'How web projects work with QalbIT',
            'title'   => 'A web development process that balances speed and quality',
            'intro'   => 'We keep the process structured but lean so you can move from ideas to a launched website or web application without unnecessary complexity or surprises.',

            'items' => [
                [
                    'step'        => 1,
                    'title'       => 'Discovery, goals and audit',
                    'description' => 'Understand your goals, audience, existing site or systems, content and constraints. Map out key journeys, integrations and technical considerations.',
                    'duration'    => '1–2 weeks',
                    'outcome'     => 'Clear goals, sitemap, key UX flows and a prioritised feature list for the first release.',
                    'icon'        => '/images/icons/discovery.svg', // reused
                ],
                [
                    'step'        => 2,
                    'title'       => 'UX, UI and architecture design',
                    'description' => 'Define information architecture, wireframes, UI components and technical architecture for frontend, backend and integrations.',
                    'duration'    => '1–3 weeks',
                    'outcome'     => 'Approved UX flows, UI directions and an implementation plan your stakeholders understand.',
                    'icon'        => '/images/icons/architecture-design.svg', // reused
                ],
                [
                    'step'        => 3,
                    'title'       => 'Implementation and integrations',
                    'description' => 'Build templates, components, APIs and integrations in small, reviewable increments with regular demos and check-ins.',
                    'duration'    => '3–8+ weeks (scope-dependent)',
                    'outcome'     => 'Production-ready website, portal or web application running in a staging or pre-production environment.',
                    'icon'        => '/images/icons/core-modules.svg', // reused
                ],
                [
                    'step'        => 4,
                    'title'       => 'Testing, launch and optimisation',
                    'description' => 'Functional testing, cross-browser/device checks, performance tuning and SEO basics before launch – followed by early optimisation based on real traffic.',
                    'duration'    => '2–4 weeks',
                    'outcome'     => 'Live web experience with analytics, logging and a shortlist of post-launch improvements.',
                    'icon'        => '/images/icons/launch.svg', // reused
                ],
                [
                    'step'        => 5,
                    'title'       => 'Ongoing improvements and support',
                    'description' => 'Continue iterating on content, UX, features and integrations via a retainer or dedicated squad, depending on your roadmap.',
                    'duration'    => 'Ongoing, month-to-month',
                    'outcome'     => 'A web platform that evolves with your business instead of needing full rebuilds every few years.',
                    'icon'        => '/images/icons/scale.svg', // reused
                ],
            ],

            'cta' => [
                'label' => 'Walk me through this web development process',
                'url'   => '/contact-us/?service=custom-web-development&topic=process',
            ],
        ],

        'use_cases' => [
            'id'      => 'custom-web-use-cases',
            'eyebrow' => 'Where custom web development fits best',
            'title'   => 'Web projects we most often design and build',
            'intro'   => 'Most of our web work sits at the intersection of marketing, operations and product – where a generic template or off-the-shelf tool is not enough.',

            'items' => [
                [
                    'label'       => 'Corporate and marketing websites',
                    'description' => 'Brand and trust-focused websites with clear positioning, service pages, landing pages and lead capture forms.',
                    'audience'    => 'Marketing, leadership and sales teams',
                    'badge'       => 'Websites',
                    'link'        => [
                        'label' => 'View website and marketing site case studies',
                        'url'   => '/case-studies/#websites',
                    ],
                ],
                [
                    'label'       => 'Customer and partner portals',
                    'description' => 'Login-based portals for customers, partners or vendors to view data, track status and collaborate without relying on email.',
                    'audience'    => 'Operations, customer success and account teams',
                    'badge'       => 'Portals',
                    'link'        => [
                        'label' => 'Ask how a portal could work for your business',
                        'url'   => '/contact-us/?service=custom-web-development&topic=portal',
                    ],
                ],
                [
                    'label'       => 'Internal tools, admin panels and dashboards',
                    'description' => 'Web interfaces that consolidate data from multiple systems so your team can manage day-to-day operations more efficiently.',
                    'audience'    => 'Operations, finance and product teams',
                    'badge'       => 'Internal tools',
                ],
                [
                    'label'       => 'Web apps for SaaS and digital products',
                    'description' => 'Customer-facing web apps, onboarding flows and dashboards that sit alongside your core SaaS or product offering.',
                    'audience'    => 'SaaS founders and product teams',
                    'badge'       => 'Product',
                    'link'        => [
                        'label' => 'See how this connects with our SaaS development services',
                        'url'   => '/services/saas/',
                    ],
                ],
            ],

            'cta' => [
                'label' => 'Ask if your project fits these web use cases',
                'url'   => '/contact-us/?service=custom-web-development&topic=use-cases',
            ],
        ],

        'stack' => [
            'id'      => 'custom-web-tech-stack',
            'eyebrow' => 'Web tech stack',
            'title'   => 'Web development stack we typically use at QalbIT',
            'intro'   => 'We choose the web stack based on your goals, in-house capabilities and long-term plans. These are the tools we lean on most for custom websites, portals and web applications.',
            'note'    => 'Already have a site or web app? We can review your current stack and only recommend changes where they clearly improve reliability, performance or maintainability.',

            'categories' => [
                [
                    'name'        => 'Frontend and UI',
                    'description' => 'How your users see and interact with your web experience.',
                    'items'       => [
                        'Next.js (React, App Router) for interactive web applications and dashboards.',
                        'Blade + Tailwind CSS or similar stacks for content-focused, SEO-friendly websites.',
                        'Responsive layouts and components designed with accessibility and Core Web Vitals in mind.',
                    ],
                ],
                [
                    'name'        => 'Backend and APIs',
                    'description' => 'The application logic and integrations behind your website or web app.',
                    'items'       => [
                        'Laravel 10/11/12 (PHP 8.x) and NestJS (TypeScript, Node.js) for structured backends.',
                        'REST APIs, webhooks and background jobs for integrations and asynchronous processing.',
                        'Authentication, roles/permissions and auditing aligned with your security needs.',
                    ],
                ],
                [
                    'name'        => 'Data and infrastructure',
                    'description' => 'Where your data lives and how your application runs in production.',
                    'items'       => [
                        'MySQL / PostgreSQL for structured data, Redis for caching and queues.',
                        'AWS, DigitalOcean and similar clouds with CI/CD pipelines for predictable deployments.',
                        'Automated backups, logging and monitoring for resilience and faster troubleshooting.',
                    ],
                ],
                [
                    'name'        => 'Content, SEO and analytics',
                    'description' => 'Everything that helps you get found, measure and improve.',
                    'items'       => [
                        'Headless or traditional CMS integrations depending on your content workflow.',
                        'Technical SEO basics built into templates: meta tags, structured data and clean URLs.',
                        'GA4, Search Console and event tracking to guide ongoing optimisation decisions.',
                    ],
                ],
            ],
        ],

        'cta' => [
            'enabled' => true,

            'eyebrow' => 'Ready to talk web development?',
            'title'   => 'Let us plan your next website, portal or web application.',
            'body'    => 'Share where your web presence is today and what you want it to achieve. We will review your goals, current site or systems and constraints, then suggest a practical roadmap – whether you are redesigning an existing site or launching a new web application.',

            'primary_label' => 'Book a web development call',
            'primary_url'   => '/contact-us/?topic=custom-web-development',
            'primary_aria'  => 'Book a web development call with QalbIT',

            'secondary_label' => 'View web development case studies',
            'secondary_url'   => '/case-studies/?tag=web-development',
            'secondary_aria'  => 'View web development case studies delivered by QalbIT',

            'meta' => 'Typically we respond within 24–48 hours with next steps and one or two suggested approaches.',
        ],
    ],

    'mobile_development' => [
        'slug'     => '/services/mobile-development/',
        'name'     => 'Mobile App Development',
        'h1'       => 'Mobile App Development Company',
        'enabled'  => true,
        'order'    => 60,

        'meta_title'       => 'Mobile App Development Company – iOS, Android & Flutter Apps',
        'meta_description' => 'QalbIT builds custom mobile apps for iOS, Android and cross-platform (Flutter, React Native). From MVP to scale, we handle UX, APIs, performance and support.',

        'short_description' => 'Native and cross-platform mobile apps with secure backends, analytics and ongoing support.',
        'category'          => 'core',
        'template'          => 'pages/services/mobile-development',

        'icon'    => 'images/services/icon-mobile-app-development.svg',
        'iconAlt' => 'Icon representing Mobile App Development',

        'faq_key'      => 'service_mobile_development',
        'faq_title'    => 'Frequently asked questions about mobile app development with QalbIT',
        'faq_subtitle' => 'These are the mobile app questions founders and teams usually ask when we discuss new apps, rebuilds or ongoing mobile product work.',

        'hero' => [
            'breadcrumb_label'    => 'Mobile apps',
            'kicker_prefix'       => 'Services',
            'kicker_label'        => 'Mobile app design & development',
            'kicker_detail'       => 'iOS · Android · Flutter',

            'title'     => 'Mobile App Development Services for <span class="text-gradient-brand-animated">iOS, Android & Cross-Platform</span>.',
            'highlight' => 'iOS, Android & Cross-Platform',

            'intro' => 'QalbIT designs and builds custom mobile apps that feel fast, reliable and easy to use. We work with founders, product teams and SMEs to launch new apps, rebuild underperforming ones and keep live products stable across iOS and Android.',

            'primary_cta_label' => 'Discuss your mobile app',
            'primary_cta_href'  => '/contact-us/?service=mobile-development',

            'secondary_cta_label' => 'See mobile app case studies',
            'secondary_cta_href'  => '/case-studies/?tag=mobile-apps',

            'snapshot_title' => 'Mobile development snapshot',
            'snapshot'       => [
                [
                    'label' => 'Core focus',
                    'value' => 'Custom iOS, Android and cross-platform apps',
                ],
                [
                    'label' => 'Typical engagements',
                    'value' => 'MVP builds, rebuilds and long-term app teams',
                ],
                [
                    'label' => 'Tech choices',
                    'value' => 'Flutter, native iOS/Android, modern backends',
                ],
                [
                    'label' => 'What we handle',
                    'value' => 'UX, APIs, performance, releases and support',
                ],
            ],
        ],

        'overview' => [
            'id'      => 'mobile-overview',
            'eyebrow' => 'Mobile app development overview',

            'title' => 'Mobile app development services for product-led teams',
            'intro' => 'We help you design, build and maintain mobile apps that users actually want to keep on their phones. From first MVPs to mature products, we balance UX, engineering and release discipline so your mobile app can grow without becoming brittle.',

            'left_title' => 'When mobile development with QalbIT makes sense',
            'left_items' => [
                'You are planning a new mobile app and want practical guidance on scope, UX and choosing between Flutter and native.',
                'You have an existing app with crashes, low ratings or poor performance and need a partner to stabilise and improve it.',
                'You want one team to handle mobile UX, development and the backend/APIs instead of juggling multiple vendors.',
                'You need predictable releases aligned with your marketing or product roadmap, not ad-hoc deployments.',
                'You prefer a senior, founder-led team that has shipped real mobile products instead of handing work to juniors.',
            ],

            'right_title' => 'Outcomes we typically target for mobile apps',
            'right_items' => [
                'A stable mobile app that works well on common devices and current OS versions.',
                'Smooth onboarding and core flows that reduce drop-offs and abandoned sessions.',
                'Crash-free sessions, lower app size where possible and acceptable load times on typical connections.',
                'Analytics, logging and monitoring so you can see how the app is used and where to improve.',
                'Documentation and handover so your internal team understands architecture, releases and how to extend the app.',
            ],

            'note' => 'We usually start with a discovery sprint to clarify app goals, user journeys, backend requirements and store constraints before locking the first release scope.',
        ],

        'capabilities' => [
            'id'      => 'mobile-capabilities',
            'eyebrow' => 'What we build for mobile',
            'title'   => 'Mobile app development capabilities across UX, engineering and operations',
            'intro'   => 'We cover the end-to-end mobile app lifecycle – from UX and architecture to backend APIs, analytics and a repeatable release process for iOS and Android.',

            'items' => [
                [
                    'label'       => 'Product discovery & UX for mobile',
                    'description' => 'Clarify app goals, user journeys, information architecture and core screens. We turn requirements into mobile-first flows and clickable prototypes before committing to full builds.',
                    'badge'       => 'UX',
                    'icon'        => '/images/icons/architecture.svg',
                ],
                [
                    'label'       => 'Native & cross-platform app development',
                    'description' => 'Build performant apps using Flutter or, when needed, native iOS and Android. We focus on clean architecture, testability and patterns that keep future iterations manageable.',
                    'badge'       => 'Engineering',
                    'icon'        => '/images/icons/modules.svg',
                ],
                [
                    'label'       => 'Backend APIs & integrations for mobile apps',
                    'description' => 'Design and implement secure APIs, authentication, push notifications and integrations with CRM, payments, analytics or other systems that your app depends on.',
                    'badge'       => 'APIs',
                    'icon'        => '/images/icons/api.svg',
                ],
                [
                    'label'       => 'Authentication, security & offline patterns',
                    'description' => 'Implement secure login, token handling, role-based access and offline-friendly patterns such as local caching and graceful error states for flaky networks.',
                    'badge'       => 'Security',
                    'icon'        => '/images/icons/security.svg',
                ],
                [
                    'label'       => 'Analytics, events & experimentation',
                    'description' => 'Set up event tracking, funnels and basic experimentation so you can measure how users move through your app and learn which changes actually help.',
                    'badge'       => 'Analytics',
                    'icon'        => '/images/icons/qa.svg',
                ],
                [
                    'label'       => 'Release management & store support',
                    'description' => 'Configure CI/CD, automated builds, signing, test tracks and store submissions so releasing new versions becomes a repeatable process instead of a manual fire drill.',
                    'badge'       => 'Ops',
                    'icon'        => '/images/icons/ops.svg',
                ],
            ],

            'cta' => [
                'label' => 'Discuss your mobile app roadmap',
                'url'   => '/contact-us/?service=mobile-development',
            ],
        ],

        'process' => [
            'id'      => 'mobile-process',
            'eyebrow' => 'How mobile projects work with QalbIT',
            'title'   => 'A practical mobile app development process from idea to live app',
            'intro'   => 'Our process keeps mobile projects moving without losing sight of quality. You get clear milestones, visible progress and a stable app at the end – not just a rushed first release.',

            'items' => [
                [
                    'step'        => 1,
                    'title'       => 'Discovery, scoping & tech choices',
                    'description' => 'Understand your product, target users, required platforms, offline needs and integrations. Decide on Flutter vs native, rough scope and success criteria.',
                    'duration'    => '1–2 weeks',
                    'outcome'     => 'Clear scope for the first release, recommended tech stack and a realistic delivery plan.',
                    'icon'        => '/images/icons/discovery.svg',
                ],
                [
                    'step'        => 2,
                    'title'       => 'UX flows, prototypes & architecture',
                    'description' => 'Design key user journeys, low/high-fidelity prototypes and app architecture, including navigation patterns, state management and backend/API strategy.',
                    'duration'    => '2–4 weeks',
                    'outcome'     => 'Approved UX flows and a technical blueprint that reduces rework during development.',
                    'icon'        => '/images/icons/architecture-design.svg',
                ],
                [
                    'step'        => 3,
                    'title'       => 'App and backend implementation',
                    'description' => 'Build the mobile app and, if needed, backend services in small, reviewable increments. Integrate analytics, logging, authentication and core integrations early.',
                    'duration'    => '4–10+ weeks (scope-dependent)',
                    'outcome'     => 'End-to-end working app connected to real or staging data with core features implemented.',
                    'icon'        => '/images/icons/core-modules.svg',
                ],
                [
                    'step'        => 4,
                    'title'       => 'Testing, launch & store submissions',
                    'description' => 'Run functional, device and basic performance testing, then prepare builds, metadata and screenshots for App Store and Google Play. Support you through review and rollout.',
                    'duration'    => '2–4 weeks including reviews',
                    'outcome'     => 'App live on the App Store and Google Play with monitoring in place for crashes and key events.',
                    'icon'        => '/images/icons/launch.svg',
                ],
                [
                    'step'        => 5,
                    'title'       => 'Ongoing improvements & maintenance',
                    'description' => 'Monitor usage, gather feedback and continue iterating on features, UX and performance. Keep up with OS and device changes on a predictable schedule.',
                    'duration'    => 'Ongoing, month-to-month',
                    'outcome'     => 'A maintained mobile app that improves over time instead of decaying after launch.',
                    'icon'        => '/images/icons/scale.svg',
                ],
            ],

            'cta' => [
                'label' => 'Walk me through this process for my app',
                'url'   => '/contact-us/?service=mobile-development&topic=process',
            ],
        ],

        'use_cases' => [
            'id'      => 'mobile-use-cases',
            'eyebrow' => 'Where mobile apps make the most impact',
            'title'   => 'Mobile app development use cases we most often deliver',
            'intro'   => 'Most of our mobile work focuses on apps that support real workflows and revenue – not just one-off marketing apps. These are the patterns we see most often across clients.',

            'items' => [
                [
                    'label'       => 'Customer-facing mobile apps',
                    'description' => 'Mobile apps that let customers browse, transact, book, track or manage their accounts in a way that complements your web or offline experience.',
                    'audience'    => 'B2B and B2C product teams, founders',
                    'badge'       => 'Customer apps',
                    'link'        => [
                        'label' => 'Ask about customer-facing apps we have built',
                        'url'   => '/contact-us/?service=mobile-development&topic=customer-apps',
                    ],
                ],
                [
                    'label'       => 'Operational & field-force apps',
                    'description' => 'Apps for staff in the field – such as delivery partners, technicians or sales teams – that replace paper, spreadsheets and ad-hoc messaging with structured workflows.',
                    'audience'    => 'Operations and field teams',
                    'badge'       => 'Internal apps',
                    'link'        => [
                        'label' => 'Discuss an operations or field app',
                        'url'   => '/contact-us/?service=mobile-development&topic=field-apps',
                    ],
                ],
                [
                    'label'       => 'Companion apps for SaaS & platforms',
                    'description' => 'Mobile companions to existing SaaS products that let users access critical features, notifications and dashboards on the go without duplicating everything from web.',
                    'audience'    => 'SaaS founders and product teams',
                    'badge'       => 'SaaS companion',
                    'link'        => [
                        'label' => 'See how a mobile companion could work for your SaaS',
                        'url'   => '/contact-us/?service=mobile-development&topic=saas-companion',
                    ],
                ],
                [
                    'label'       => 'Rebuild or modernise existing mobile apps',
                    'description' => 'Taking an existing app with technical debt, outdated UI or poor ratings and modernising it – either via a staged rebuild or a series of targeted refactors.',
                    'audience'    => 'Teams with live but fragile apps',
                    'badge'       => 'Modernisation',
                ],
            ],

            'cta' => [
                'label' => 'Ask if your mobile app idea fits these use cases',
                'url'   => '/contact-us/?service=mobile-development&topic=use-cases',
            ],
        ],

        'stack' => [
            'id'      => 'mobile-tech-stack',
            'eyebrow' => 'Tech stack & platforms',
            'title'   => 'Mobile app development stack we typically use',
            'intro'   => 'We choose our mobile stack based on your product, internal team and long-term plans. The goal is to keep apps maintainable, observable and aligned with your backend and web stack.',
            'note'    => 'If you already have a live app, we review your current stack and only recommend changes that clearly improve reliability, performance or maintainability.',

            'categories' => [
                [
                    'name'        => 'Mobile frameworks & frontends',
                    'description' => 'How we build the app that users actually interact with.',
                    'items'       => [
                        'Flutter for a single codebase across iOS and Android in most new builds.',
                        'Native iOS (Swift) and Android (Kotlin) when deeper platform control is needed.',
                        'React Native maintained in select legacy or ecosystem-specific cases.',
                    ],
                ],
                [
                    'name'        => 'Backend & APIs for mobile',
                    'description' => 'APIs, services and integrations that power your app.',
                    'items'       => [
                        'Laravel 10/11/12 and NestJS backends designed with mobile needs in mind.',
                        'REST APIs, webhooks and background jobs for notifications and scheduled work.',
                        'Integration with payment gateways, CRMs, analytics and third-party services.',
                    ],
                ],
                [
                    'name'        => 'Data, authentication & infrastructure',
                    'description' => 'Secure data storage and infrastructure that keeps the app responsive.',
                    'items'       => [
                        'MySQL or PostgreSQL for core data, Redis for caching and queues.',
                        'OAuth, JWT and session-based auth flows depending on your ecosystem.',
                        'AWS, DigitalOcean or similar managed cloud with CI/CD pipelines.',
                    ],
                ],
                [
                    'name'        => 'Monitoring, analytics & QA',
                    'description' => 'Keeping your app observable and improving over time.',
                    'items'       => [
                        'Crash and performance monitoring via tools such as Sentry or Firebase Crashlytics.',
                        'Analytics and event tracking wired into product dashboards.',
                        'Automated tests where they add clear value, plus real-device and beta testing.',
                    ],
                ],
            ],
        ],

        'cta' => [
            'enabled' => true,

            'eyebrow' => 'Ready to discuss your mobile app?',
            'title'   => 'Let’s plan your next mobile app release or MVP.',
            'body'    => 'Share where your mobile app is today and where you want it to be. We will review your goals, constraints and existing stack, then suggest a practical roadmap – whether you are validating a new idea or improving a live product.',

            'primary_label' => 'Book a mobile app discovery call',
            'primary_url'   => '/contact-us/?topic=mobile-app-development',
            'primary_aria'  => 'Book a mobile app discovery call with QalbIT',

            'secondary_label' => 'Discuss improving an existing app',
            'secondary_url'   => '/contact-us/?topic=mobile-app-rebuild',
            'secondary_aria'  => 'Discuss improving or rebuilding a mobile app with QalbIT',

            'meta' => 'Typically we respond within 24–48 hours with next steps and a suggested starting scope.',
        ],
    ],

    'api_development' => [
        'slug'     => '/services/api-development/',
        'name'     => 'API Development',
        'h1'       => 'API Development & Integration Services',
        'enabled'  => true,
        'order'    => 70,

        'meta_title'       => 'API Development & Integration Services – REST, Webhooks & Microservices',
        'meta_description' => 'QalbIT engineers secure, well-documented REST APIs, webhooks and microservices that connect your web, mobile and SaaS products. We design, build and maintain APIs for long-term reliability and easier integrations.',

        'short_description' => 'Secure, well-documented REST and event-driven APIs that connect your products, mobile apps and third-party platforms.',
        'category'          => 'core',
        'template'          => 'pages/services/api-development',

        'icon'    => 'images/services/icon-api-development.svg',
        'iconAlt' => 'Icon representing API Development',

        'faq_key'      => 'service_api_development',
        'faq_title'    => 'Frequently asked questions about API development with QalbIT',
        'faq_subtitle' => 'These are the API development and integration questions product owners and tech leads usually ask when we discuss new APIs or modernising existing integrations.',

        'hero' => [
            'breadcrumb_label' => 'API development',
            'kicker_prefix'    => 'Services',
            'kicker_label'     => 'API development & integrations',
            'kicker_detail'    => 'REST · Webhooks · Microservices',

            'title'     => 'API Development & Integration Services for <span class="text-gradient-brand-animated">Web, Mobile & SaaS Products</span>.',
            'highlight' => 'Web, Mobile & SaaS Products',

            'intro' => 'QalbIT designs and builds secure, well-documented REST APIs, webhooks and microservices that connect your products, mobile apps and third-party platforms. We focus on reliability, clear contracts and a good developer experience so your teams can move faster.',

            'primary_cta_label' => 'Discuss your API project',
            'primary_cta_href'  => '/contact-us/?topic=api-development',

            'secondary_cta_label' => 'See integration-style case studies',
            'secondary_cta_href'  => '/case-studies/?tag=api',

            'snapshot_title' => 'API development snapshot',
            'snapshot'       => [
                [
                    'label' => 'Core focus',
                    'value' => 'REST and event-driven APIs, webhooks and integrations',
                ],
                [
                    'label' => 'Typical engagements',
                    'value' => 'New API design, refactoring, third-party integrations',
                ],
                [
                    'label' => 'API styles',
                    'value' => 'REST/JSON over HTTP, webhooks, selected GraphQL where needed',
                ],
                [
                    'label' => 'Domains',
                    'value' => 'SaaS, mobile backends, B2B platforms, internal tools',
                ],
            ],
        ],

        'overview' => [
            'id'      => 'api-overview',
            'eyebrow' => 'API development overview',

            'title' => 'API development and integration services for scalable products',
            'intro' => 'We help product and engineering teams design, build and maintain APIs that are secure, consistent and easy to integrate. Whether you need a new REST API, webhooks, or a migration from a legacy integration, we focus on clear contracts and predictable behaviour.',

            'left_title' => 'When API development with QalbIT makes sense',
            'left_items' => [
                'You need a secure REST API or webhooks to power your web, mobile or SaaS product.',
                'You want to replace fragile point-to-point integrations with a cleaner API layer.',
                'You are adding third-party APIs (payments, CRM, logistics, etc.) and need them to work reliably.',
                'Your existing APIs are slow, hard to change or poorly documented, and you want to modernise them.',
                'You prefer a senior, founder-led team that understands both architecture and real-world constraints.',
            ],

            'right_title' => 'Outcomes we usually target with API projects',
            'right_items' => [
                'Consistent, well-versioned APIs that are easier for internal and external teams to adopt.',
                'Faster and more reliable integrations between your products, mobile apps and third-party services.',
                'Improved security with proper authentication, authorisation, validation and rate limiting.',
                'Better observability and logging so API issues can be detected and resolved quickly.',
                'Clear API documentation and examples that reduce onboarding time for developers.',
            ],

            'note' => 'For most API projects we start with a short discovery sprint to map your systems, data contracts and integration points, then define a practical API design and rollout plan.',
        ],

        'capabilities' => [
            'id'      => 'api-capabilities',
            'eyebrow' => 'What we build with APIs',
            'title'   => 'API development capabilities across products and platforms',
            'intro'   => 'From internal APIs powering mobile apps to public-facing developer platforms, we cover the full lifecycle – design, implementation, documentation, security and long-term maintenance.',

            'items' => [
                [
                    'label'       => 'API design & specification',
                    'description' => 'Design clear, consistent REST API contracts with versioning, error formats and pagination, captured in OpenAPI/Swagger specs so teams can integrate with confidence.',
                    'badge'       => 'Design',
                    'icon'        => '/images/icons/architecture.svg',
                ],
                [
                    'label'       => 'REST APIs for web & mobile',
                    'description' => 'Build secure REST/JSON APIs that power your web frontends, mobile apps and third-party clients with proper authentication, rate limiting and performance optimisation.',
                    'badge'       => 'Development',
                    'icon'        => '/images/icons/api.svg',
                ],
                [
                    'label'       => 'Webhooks & event-driven integrations',
                    'description' => 'Implement webhooks and event-driven patterns so your systems can react in real time to changes in payments, orders, tickets and other external events.',
                    'badge'       => 'Events',
                    'icon'        => '/images/icons/modules.svg',
                ],
                [
                    'label'       => 'Third-party API integrations',
                    'description' => 'Integrate with CRMs, ERPs, payment gateways, communication platforms and other APIs using robust error handling, retries and monitoring.',
                    'badge'       => 'Integrations',
                    'icon'        => '/images/icons/third-party-api.svg',
                ],
                [
                    'label'       => 'Security, auth & rate limiting',
                    'description' => 'Implement OAuth2, JWT, API keys, IP whitelisting, throttling and input validation to protect your APIs and the data they expose.',
                    'badge'       => 'Security',
                    'icon'        => '/images/icons/security.svg',
                ],
                [
                    'label'       => 'Monitoring, logging & lifecycle',
                    'description' => 'Set up logging, monitoring, alerting and API lifecycle practices so you can deprecate old versions gracefully and keep integrations stable.',
                    'badge'       => 'Ops',
                    'icon'        => '/images/icons/ops.svg',
                ],
            ],

            'cta' => [
                'label' => 'Discuss your API and integration scope',
                'url'   => '/contact-us/?service=api-development',
            ],
        ],

        'process' => [
            'id'      => 'api-process',
            'eyebrow' => 'How API projects work with QalbIT',
            'title'   => 'A practical API development process from design to stable integrations',
            'intro'   => 'We keep the API process structured but not heavy, so you get a clear contract, reliable implementation and the monitoring needed to support production traffic.',

            'items' => [
                [
                    'step'        => 1,
                    'title'       => 'Discovery & integration mapping',
                    'description' => 'Understand your systems, data flows, consumers and third-party APIs. Identify what needs to be exposed, what should stay internal and how existing integrations behave today.',
                    'duration'    => '1–2 weeks',
                    'outcome'     => 'System and data flow map, list of integration points and a prioritised API backlog.',
                    'icon'        => '/images/icons/discovery.svg',
                ],
                [
                    'step'        => 2,
                    'title'       => 'API design & specification',
                    'description' => 'Define endpoints, resources, authentication, error formats and versioning strategy, documented using OpenAPI/Swagger and practical examples.',
                    'duration'    => '1–3 weeks',
                    'outcome'     => 'Reviewed API specification that product and engineering teams agree on.',
                    'icon'        => '/images/icons/architecture-design.svg',
                ],
                [
                    'step'        => 3,
                    'title'       => 'Implementation & testing',
                    'description' => 'Implement APIs or webhooks with proper validation, security and logging, plus automated tests and integration tests where appropriate.',
                    'duration'    => '3–8+ weeks (scope-dependent)',
                    'outcome'     => 'Production-ready APIs or webhooks deployed in your environment.',
                    'icon'        => '/images/icons/core-modules.svg',
                ],
                [
                    'step'        => 4,
                    'title'       => 'Integration, docs & launch',
                    'description' => 'Support your internal or external teams as they integrate, refine documentation and examples, and roll out the APIs to real consumers.',
                    'duration'    => 'First 2–6 weeks after go-live',
                    'outcome'     => 'Live integrations with clear docs, examples and support channels.',
                    'icon'        => '/images/icons/launch.svg',
                ],
                [
                    'step'        => 5,
                    'title'       => 'Monitoring & evolution',
                    'description' => 'Monitor usage and performance, fix edge cases, plan new versions and gradually evolve the API as your product and ecosystem grow.',
                    'duration'    => 'Ongoing, month-to-month',
                    'outcome'     => 'Stable API layer that can safely support new features and integrations.',
                    'icon'        => '/images/icons/scale.svg',
                ],
            ],

            'cta' => [
                'label' => 'Walk me through this API process for my product',
                'url'   => '/contact-us/?service=api-development&topic=process',
            ],
        ],

        'use_cases' => [
            'id'      => 'api-use-cases',
            'eyebrow' => 'Where APIs make the biggest impact',
            'title'   => 'API development and integration use cases we most often deliver',
            'intro'   => 'Most of our API work connects existing products, mobile apps and third-party services, or replaces fragile legacy integrations with a cleaner, more scalable API layer.',

            'items' => [
                [
                    'label'       => 'APIs for mobile app backends',
                    'description' => 'REST APIs and webhooks that power your iOS and Android apps with authentication, profiles, payments, notifications and more.',
                    'audience'    => 'Product teams and mobile developers',
                    'badge'       => 'Mobile backends',
                    'link'        => [
                        'label' => 'Ask how we structure mobile app APIs',
                        'url'   => '/contact-us/?service=api-development&topic=mobile-backend',
                    ],
                ],
                [
                    'label'       => 'Partner & public APIs for SaaS products',
                    'description' => 'APIs that let partners, agencies or customers integrate your SaaS with their own systems, including keys, rate limiting and usage tracking.',
                    'audience'    => 'SaaS founders and product teams',
                    'badge'       => 'SaaS APIs',
                    'link'        => [
                        'label' => 'Discuss a partner API for your SaaS',
                        'url'   => '/contact-us/?service=api-development&topic=saas-api',
                    ],
                ],
                [
                    'label'       => 'Internal integration layer',
                    'description' => 'APIs and services that sit between legacy systems, ERPs, CRMs and new products, reducing point-to-point complexity.',
                    'audience'    => 'IT, operations and architecture teams',
                    'badge'       => 'Integration',
                ],
                [
                    'label'       => 'Migration from legacy or ad-hoc integrations',
                    'description' => 'Rebuilding brittle integrations into a cleaner REST or event-driven architecture while keeping existing customers and data safe.',
                    'audience'    => 'Growing businesses with legacy systems',
                    'badge'       => 'Modernisation',
                ],
            ],

            'cta' => [
                'label' => 'Ask if your API needs fit these use cases',
                'url'   => '/contact-us/?service=api-development&topic=use-cases',
            ],
        ],

        'stack' => [
            'id'      => 'api-tech-stack',
            'eyebrow' => 'Tech stack & tooling',
            'title'   => 'API stack and tooling we typically use at QalbIT',
            'intro'   => 'We choose API stack and tooling based on your existing systems, team skills and compliance needs. The goal is to keep APIs maintainable, observable and aligned with your wider architecture.',
            'note'    => 'If you already have live APIs, we will review your current stack and only recommend changes where they clearly improve reliability, performance or maintainability.',

            'categories' => [
                [
                    'name'        => 'Backend & API frameworks',
                    'description' => 'Core application logic and REST API implementation.',
                    'items'       => [
                        'Laravel 10/11/12 (PHP 8.x) for modular REST APIs and microservices.',
                        'NestJS (TypeScript, Node.js 20+) for API-first and event-driven architectures.',
                        'Background jobs, queues and schedulers for async processing.',
                    ],
                ],
                [
                    'name'        => 'API design & documentation',
                    'description' => 'Tools for consistent API contracts and developer experience.',
                    'items'       => [
                        'OpenAPI/Swagger specs for REST endpoints and data models.',
                        'Postman collections and examples for faster onboarding.',
                        'Style guides for naming, versioning and error handling.',
                    ],
                ],
                [
                    'name'        => 'Security, auth & access control',
                    'description' => 'Protecting APIs and the data they expose.',
                    'items'       => [
                        'OAuth2, JWT and API key-based authentication patterns.',
                        'Rate limiting, throttling and IP whitelisting where required.',
                        'Validation, sanitisation and secure coding best practices.',
                    ],
                ],
                [
                    'name'        => 'Observability & operations',
                    'description' => 'Keeping APIs healthy in production.',
                    'items'       => [
                        'Structured logging and centralised log aggregation.',
                        'Metrics, uptime monitoring and alerting around key endpoints.',
                        'Deployment pipelines for safe, repeatable releases.',
                    ],
                ],
            ],
        ],

        'cta' => [
            'enabled' => true,

            'eyebrow' => 'Ready to talk APIs & integrations?',
            'title'   => 'Let’s design a secure, reliable API layer for your product.',
            'body'    => 'Share how your systems talk to each other today and where you are running into limits. We will review your goals, current architecture and constraints, then suggest a practical API roadmap that fits your product and team.',

            'primary_label' => 'Book an API discovery call',
            'primary_url'   => '/contact-us/?topic=api-development',
            'primary_aria'  => 'Book an API discovery call with QalbIT',

            'secondary_label' => 'Ask about modernising existing APIs',
            'secondary_url'   => '/contact-us/?topic=api-modernisation',
            'secondary_aria'  => 'Discuss modernising your existing APIs with QalbIT',

            'meta' => 'Typically we respond within 24–48 hours with next steps and an initial API approach.',
        ],
    ],

    'mobile_backend' => [
        'slug'     => '/services/mobile-app-backend/',
        'name'     => 'Mobile App Backend',
        'h1'       => 'Mobile App Backend Development Services',
        'enabled'  => true,
        'order'    => 80,

        'meta_title'       => 'Mobile App Backend Development Services – APIs, Authentication & Microservices',
        'meta_description' => 'QalbIT provides mobile app backend development services including APIs, authentication, and microservices for iOS, Android and web apps. Design, build and scale secure backends that keep your mobile applications fast, reliable and ready to grow.',

        'short_description' => 'Mobile app backend development with secure APIs, authentication and microservices for iOS, Android and web applications.',
        'category'          => 'core',
        'template'          => 'pages/services/mobile-app-backend',

        'icon'    => 'images/services/icon-mobile-app-backend.svg',
        'iconAlt' => 'Icon representing Mobile App Backend',

        'faq_key'      => 'service_mobile_backend',
        'faq_title'    => 'Frequently asked questions about mobile app backend development with QalbIT',
        'faq_subtitle' => 'These are the questions product owners and tech leads usually ask when we discuss APIs, microservices and backends for mobile applications.',

        'hero' => [
            'breadcrumb_label' => 'Mobile app backend',
            'kicker_prefix'    => 'Services',
            'kicker_label'     => 'Mobile app backend & APIs',
            'kicker_detail'    => 'APIs · Microservices · Cloud-native',

            'title'     => 'Mobile App Backend Development for <span class="text-gradient-brand-animated">iOS, Android & Web Apps</span>.',
            'highlight' => 'iOS, Android & Web Apps',

            'intro' => 'QalbIT designs and builds secure mobile app backends – from REST APIs and authentication to microservices, queues and real-time features. We focus on performance, reliability and clean contracts between your mobile apps and the server, so your product team can ship updates without worrying about the backend.',

            'primary_cta_label' => 'Discuss your mobile backend',
            'primary_cta_href'  => '/contact-us/?service=mobile-backend',

            'secondary_cta_label' => 'See backend-related case studies',
            'secondary_cta_href'  => '/case-studies/?tag=backend',

            'snapshot_title' => 'Mobile backend snapshot',
            'snapshot'       => [
                [
                    'label' => 'Core focus',
                    'value' => 'APIs, authentication, microservices for mobile apps',
                ],
                [
                    'label' => 'Typical engagements',
                    'value' => 'New app backends, backend rebuilds, performance fixes',
                ],
                [
                    'label' => 'Platforms',
                    'value' => 'Backends for iOS, Android and web frontends',
                ],
                [
                    'label' => 'Hosting',
                    'value' => 'AWS, DigitalOcean and similar cloud providers',
                ],
            ],
        ],

        'overview' => [
            'id'      => 'mobile-backend-overview',
            'eyebrow' => 'Mobile backend overview',

            'title' => 'Mobile app backend development services for APIs, microservices and real-time features',
            'intro' => 'We help teams design and implement the mobile app backends that sit behind their iOS, Android and web clients. From authentication and REST APIs to push notifications and background processing, we keep the backend predictable, well-documented and ready to scale.',

            'left_title' => 'When a dedicated mobile app backend with QalbIT makes sense',
            'left_items' => [
                'You are planning a new mobile app and need a dedicated backend instead of a quick, hard-to-maintain API.',
                'Your current backend (for example Firebase-only or a legacy API) is limiting new features or performance.',
                'You want a clear separation between mobile client and server with versioned APIs and documentation.',
                'You need secure authentication, roles and permissions across multiple apps or platforms.',
                'You prefer a senior, founder-led team that understands both product constraints and backend complexity.',
            ],

            'right_title' => 'Outcomes we typically target for mobile app backends',
            'right_items' => [
                'Fast, reliable APIs that keep mobile apps responsive even on slow networks.',
                'Secure authentication, authorisation and data access across multiple devices and platforms.',
                'Cleaner backend architecture that is easier for your team to extend and debug.',
                'Observability and logging so you can understand crashes, slow calls and backend errors quickly.',
                'A roadmap for scaling traffic, adding features and supporting additional clients (web, partner apps, etc.).',
            ],

            'note' => 'For mobile backends, we usually start with a short discovery and API design phase – clarifying clients (iOS, Android, web), core resources, authentication and performance requirements before we commit to build scope.',
        ],

        'capabilities' => [
            'id'      => 'mobile-backend-capabilities',
            'eyebrow' => 'What we build for mobile backends',
            'title'   => 'Mobile app backend capabilities across APIs, authentication and microservices',
            'intro'   => 'From greenfield app backends to refactoring existing APIs, we cover architecture, core services and the tooling around them so your mobile applications stay maintainable as you grow.',

            'items' => [
                [
                    'label'       => 'API design and development',
                    'description' => 'Design RESTful APIs and resources that map cleanly to your mobile app screens and flows, with versioning and documentation for future changes.',
                    'badge'       => 'APIs',
                    'icon'        => '/images/icons/api.svg',
                ],
                [
                    'label'       => 'Authentication, users and permissions',
                    'description' => 'Implement secure sign-up, login, social auth, token handling and role-based access for different user types and environments.',
                    'badge'       => 'Security',
                    'icon'        => '/images/icons/security.svg',
                ],
                [
                    'label'       => 'Microservices, jobs and queues',
                    'description' => 'Split heavy or asynchronous work into background jobs and microservices so the mobile app stays responsive even under load.',
                    'badge'       => 'Architecture',
                    'icon'        => '/images/icons/architecture.svg',
                ],
                [
                    'label'       => 'Real-time updates and notifications',
                    'description' => 'Set up push notifications, real-time feeds and event-driven updates tied to your backend and third-party services.',
                    'badge'       => 'Real-time',
                    'icon'        => '/images/icons/modules.svg',
                ],
                [
                    'label'       => 'Integrations and third-party services',
                    'description' => 'Connect your backend to payment gateways, analytics, CRMs, map services and other APIs that your mobile app relies on.',
                    'badge'       => 'Integrations',
                    'icon'        => '/images/icons/automation.svg',
                ],
                [
                    'label'       => 'Admin panels, tooling and observability',
                    'description' => 'Build monitoring dashboards, simple admin panels and operational tooling around the backend so your team can support users effectively.',
                    'badge'       => 'Ops',
                    'icon'        => '/images/icons/ops.svg',
                ],
            ],

            'cta' => [
                'label' => 'Discuss your mobile app backend scope',
                'url'   => '/contact-us/?service=mobile-backend',
            ],
        ],

        'process' => [
            'id'      => 'mobile-backend-process',
            'eyebrow' => 'How mobile backend projects work with QalbIT',
            'title'   => 'A practical mobile backend development process from API design to stable production',
            'intro'   => 'We keep the process structured but lightweight so you can validate quickly, support existing apps and roll out backend improvements without breaking production.',

            'items' => [
                [
                    'step'        => 1,
                    'title'       => 'Discovery, audit and API use cases',
                    'description' => 'Understand your mobile apps, current backend (if any), data model and constraints, then define the key APIs and backend responsibilities.',
                    'duration'    => '1–2 weeks',
                    'outcome'     => 'Clear scope, high-level architecture and prioritised list of endpoints and backend features.',
                    'icon'        => '/images/icons/discovery.svg',
                ],
                [
                    'step'        => 2,
                    'title'       => 'Architecture and schema design',
                    'description' => 'Design database schema, service boundaries, authentication flows and integration points, aligned with your performance and security requirements.',
                    'duration'    => '1–3 weeks',
                    'outcome'     => 'Architecture decisions, ER diagrams where useful and an implementation plan for the first release.',
                    'icon'        => '/images/icons/architecture-design.svg',
                ],
                [
                    'step'        => 3,
                    'title'       => 'Backend implementation and integrations',
                    'description' => 'Implement core APIs, services, background jobs and third-party integrations in small, reviewable increments.',
                    'duration'    => '4–10+ weeks (scope-dependent)',
                    'outcome'     => 'Production-ready mobile backend deployed in your cloud environment.',
                    'icon'        => '/images/icons/core-modules.svg',
                ],
                [
                    'step'        => 4,
                    'title'       => 'Launch, monitoring and optimisation',
                    'description' => 'Set up logging, metrics and error tracking, then tune endpoints and queries based on real usage in your mobile apps.',
                    'duration'    => 'First 4–8 weeks after launch',
                    'outcome'     => 'Stable backend with clear dashboards and alerts, plus a backlog of improvements.',
                    'icon'        => '/images/icons/launch.svg',
                ],
                [
                    'step'        => 5,
                    'title'       => 'Ongoing support and roadmap',
                    'description' => 'Continue iterating on features, performance and integrations via a dedicated squad or flexible retainer model.',
                    'duration'    => 'Ongoing, month-to-month',
                    'outcome'     => 'Predictable delivery on a roadmap that tracks your product and traffic growth.',
                    'icon'        => '/images/icons/scale.svg',
                ],
            ],

            'cta' => [
                'label' => 'Walk me through this process for my app',
                'url'   => '/contact-us/?service=mobile-backend&topic=process',
            ],
        ],

        'use_cases' => [
            'id'      => 'mobile-backend-use-cases',
            'eyebrow' => 'Where dedicated mobile backends work best',
            'title'   => 'Mobile backend use cases we most often deliver',
            'intro'   => 'Most of our mobile backend work is for teams that already have or are planning serious mobile apps – where reliable APIs, authentication and integrations matter more than quick prototypes.',

            'items' => [
                [
                    'label'       => 'New mobile app backend builds',
                    'description' => 'End-to-end backend for new iOS and Android apps, including APIs, authentication, notifications and integrations.',
                    'audience'    => 'Startups, product teams, agencies',
                    'badge'       => 'Greenfield',
                    'link'        => [
                        'label' => 'Ask how we would scope your new app',
                        'url'   => '/contact-us/?service=mobile-backend&topic=new-app',
                    ],
                ],
                [
                    'label'       => 'Rebuild or replace legacy backends',
                    'description' => 'Gradual migration from brittle or slow legacy APIs to a modern backend without breaking existing apps and users.',
                    'audience'    => 'Growing teams with live traffic',
                    'badge'       => 'Modernisation',
                ],
                [
                    'label'       => 'API layer for existing systems',
                    'description' => 'Expose existing ERPs, CRMs or internal tools via a clean API layer that mobile apps can safely consume.',
                    'audience'    => 'SMEs and enterprises with legacy systems',
                    'badge'       => 'Integration',
                ],
                [
                    'label'       => 'Multi-client ecosystems (web + mobile)',
                    'description' => 'Backends serving both mobile apps and web dashboards, keeping logic centralised while presenting different UX per client.',
                    'audience'    => 'SaaS and platform teams',
                    'badge'       => 'Platform',
                ],
            ],

            'cta' => [
                'label' => 'Ask if your app fits these mobile backend use cases',
                'url'   => '/contact-us/?service=mobile-backend&topic=use-cases',
            ],
        ],

        'stack' => [
            'id'      => 'mobile-backend-tech-stack',
            'eyebrow' => 'Tech stack & platforms',
            'title'   => 'Mobile backend stack we most often use at QalbIT',
            'intro'   => 'We choose backend stack and infrastructure based on your app, traffic expectations and in-house skills. These are the tools we rely on for most mobile backends across our own products and client work.',
            'note'    => 'Already have a live backend? We will review your current stack and only suggest changes where they clearly improve reliability, performance or maintainability.',

            'categories' => [
                [
                    'name'        => 'Backend & APIs',
                    'description' => 'Core logic, resources and endpoints that power your mobile apps.',
                    'items'       => [
                        'Laravel 10/11/12 (PHP 8.x) with modular architecture for structured REST APIs.',
                        'NestJS (TypeScript, Node.js 20+) for API-first, event-driven backends.',
                        'REST APIs, webhooks and background workers for predictable client–server contracts.',
                    ],
                ],
                [
                    'name'        => 'Data & real-time',
                    'description' => 'Databases, caching and real-time updates.',
                    'items'       => [
                        'MySQL / PostgreSQL for structured data and reporting.',
                        'Redis for caching, queues and rate limiting.',
                        'Real-time features using WebSockets, event streams or third-party push providers.',
                    ],
                ],
                [
                    'name'        => 'Infrastructure & DevOps',
                    'description' => 'Cloud environments and deployment pipelines.',
                    'items'       => [
                        'AWS, DigitalOcean or similar cloud platforms with auto-scaling where needed.',
                        'Containerised deployments or managed runtimes with CI/CD pipelines.',
                        'Staging and production environments with automated backups and rollbacks.',
                    ],
                ],
                [
                    'name'        => 'Security & observability',
                    'description' => 'Keeping the backend secure, monitored and supportable.',
                    'items'       => [
                        'JWT-based auth, OAuth and secure token handling for mobile clients.',
                        'Centralised logging, metrics and tracing for error and performance insights.',
                        'Basic compliance-friendly practices around access control and data protection.',
                    ],
                ],
            ],
        ],

        'cta' => [
            'enabled' => true,

            'eyebrow' => 'Ready to talk about your mobile backend?',
            'title'   => 'Let us review your existing backend or plan a new one together.',
            'body'    => 'Share where your mobile app is today, how the current backend behaves and what you want to improve. We will review your goals, current stack and constraints, then suggest a realistic plan for your backend – whether that is a fresh build or a careful migration.',

            'primary_label' => 'Book a mobile backend call',
            'primary_url'   => '/contact-us/?topic=mobile-app-backend',
            'primary_aria'  => 'Book a mobile app backend consultation with QalbIT',

            'secondary_label' => 'Ask for a backend audit',
            'secondary_url'   => '/contact-us/?topic=backend-audit',
            'secondary_aria'  => 'Request a backend audit from QalbIT',

            'meta' => 'Typically we respond within 24–48 hours with next steps and a suggested starting point.',
        ],
    ],

    'cloud_solutions' => [
        'slug'    => '/services/cloud-based-solutions/',
        'name'    => 'Cloud-Based Solutions',
        'h1'      => 'Cloud Solutions, Migration & DevOps Services',
        'enabled' => true,
        'order'   => 90,

        'meta_title'       => 'Cloud Solutions & DevOps Services – Migration, Modernisation & Managed Cloud',
        'meta_description' => 'QalbIT helps you design, migrate and optimize cloud solutions on AWS, Azure and Google Cloud. Modernise legacy systems, improve reliability, implement DevOps and keep your cloud costs under control with a senior, hands-on team.',

        'short_description' => 'Cloud migration, modernisation and DevOps services on AWS, Azure and Google Cloud for stable, scalable and cost-efficient infrastructure.',
        'category'          => 'core',
        'template'          => 'pages/services/cloud-based-solutions',

        'icon'    => 'images/services/icon-cloud-solutions.svg',
        'iconAlt' => 'Icon representing Cloud-Based Solutions',

        'faq_key'      => 'service_cloud_solutions',
        'faq_title'    => 'Frequently asked questions about cloud solutions, migration and DevOps with QalbIT',
        'faq_subtitle' => 'These are the questions founders and IT teams usually ask when we discuss cloud migration, DevOps and managed cloud services.',

        'hero' => [
            'breadcrumb_label' => 'Cloud solutions',
            'kicker_prefix'    => 'Services',
            'kicker_label'     => 'Cloud migration, DevOps & managed cloud',
            'kicker_detail'    => 'AWS · Azure · Google Cloud',

            'title'     => 'Cloud Solutions, Migration & DevOps for <span class="text-gradient-brand-animated">Modern Products & Teams</span>.',
            'highlight' => 'Modern Products & Teams',

            'intro' => 'QalbIT helps you plan, migrate and run workloads on AWS, Azure and Google Cloud. From first migration to day-to-day DevOps, we focus on reliability, performance and predictable costs – so your team can ship features instead of fighting servers.',

            'primary_cta_label' => 'Discuss your cloud roadmap',
            'primary_cta_href'  => '/contact-us/?topic=cloud-solutions',

            'secondary_cta_label' => 'Review cloud & DevOps case studies',
            'secondary_cta_href'  => '/case-studies/?tag=cloud',

            'snapshot_title' => 'Cloud solutions snapshot',
            'snapshot'       => [
                [
                    'label' => 'Core focus',
                    'value' => 'Cloud migration, modernisation and DevOps',
                ],
                [
                    'label' => 'Typical engagements',
                    'value' => 'Migrations, re-architecture and managed cloud retainers',
                ],
                [
                    'label' => 'Cloud platforms',
                    'value' => 'AWS, Azure, Google Cloud (GCP)',
                ],
                [
                    'label' => 'Workloads',
                    'value' => 'Web apps, APIs, databases, background workers',
                ],
            ],
        ],

        'overview' => [
            'id'      => 'cloud-overview',
            'eyebrow' => 'Cloud solutions overview',

            'title' => 'Cloud solutions and DevOps services for migration, modernisation and growth',
            'intro' => 'We help technology and operations teams move to the cloud, stabilise existing setups and introduce DevOps practices. The goal is simple: fewer incidents, smoother deployments and cloud bills that make sense for your stage.',

            'left_title' => 'When cloud solutions with QalbIT make sense',
            'left_items' => [
                'You want to migrate from on-premise or shared hosting to AWS, Azure or Google Cloud with minimal disruption.',
                'Your current cloud setup feels fragile, slow or expensive – and you need a structured review and remediation plan.',
                'You are building or running SaaS / web applications and need CI/CD, environments and rollback strategies that just work.',
                'You want to modernise a legacy application, database or monolith without a risky “big bang” rewrite.',
                'You prefer a senior, founder-led team who can talk architecture with technical stakeholders and trade-offs with business owners.',
            ],

            'right_title' => 'Outcomes we usually target with cloud projects',
            'right_items' => [
                'A stable, well-documented cloud environment with clear responsibilities and access controls.',
                'Faster, more predictable deployments through CI/CD and improved release practices.',
                'Better performance and uptime for your applications, APIs and background workers.',
                'Visibility into costs with budgets, alerts and optimisation recommendations.',
                'A practical roadmap for further modernisation, security hardening and automation.',
            ],

            'note' => 'For cloud and DevOps work we typically start with an assessment of your current infrastructure, deployments and costs, then propose a phased roadmap for migration, stabilisation and ongoing improvements.',
        ],

        'capabilities' => [
            'id'      => 'cloud-capabilities',
            'eyebrow' => 'What we build and manage in the cloud',
            'title'   => 'Cloud solution capabilities across migration, DevOps and optimisation',
            'intro'   => 'From first migration to ongoing DevOps and cost optimisation, we design and operate cloud environments that support your product roadmap rather than block it.',

            'items' => [
                [
                    'label'       => 'Cloud migration & re-platforming',
                    'description' => 'Plan and execute migrations from on-premise, shared hosting or other clouds to AWS, Azure or Google Cloud – including lift-and-shift, re-platforming and phased modernisation.',
                    'badge'       => 'Migration',
                    'icon'        => '/images/icons/architecture.svg',
                ],
                [
                    'label'       => 'Cloud-native application architecture',
                    'description' => 'Design cloud-ready architectures for web apps, APIs and background workers using managed services, containers and resilient patterns that fit your stage.',
                    'badge'       => 'Architecture',
                    'icon'        => '/images/icons/modules.svg',
                ],
                [
                    'label'       => 'DevOps, CI/CD & automation',
                    'description' => 'Set up CI/CD pipelines, environment strategies, blue-green or canary deployments and automated rollbacks so your team can ship frequently without fear.',
                    'badge'       => 'DevOps',
                    'icon'        => '/images/icons/automation.svg',
                ],
                [
                    'label'       => 'Infrastructure as Code (IaC)',
                    'description' => 'Codify your infrastructure using tools like Terraform or CloudFormation so environments are reproducible, reviewable and easy to evolve.',
                    'badge'       => 'IaC',
                    'icon'        => '/images/icons/infrastructure.svg',
                ],
                [
                    'label'       => 'Monitoring, logging & reliability',
                    'description' => 'Implement monitoring, alerting and logging across applications and infrastructure so you can detect issues early and respond quickly.',
                    'badge'       => 'Reliability',
                    'icon'        => '/images/icons/ops.svg',
                ],
                [
                    'label'       => 'Security, governance & cost optimisation',
                    'description' => 'Introduce sensible security baselines, access controls, backup strategies and cost reviews that keep your cloud environment safe and cost-effective.',
                    'badge'       => 'Governance',
                    'icon'        => '/images/icons/compliance.svg',
                ],
            ],

            'cta' => [
                'label' => 'Discuss your cloud & DevOps scope',
                'url'   => '/contact-us/?service=cloud-based-solutions',
            ],
        ],

        'process' => [
            'id'      => 'cloud-process',
            'eyebrow' => 'How cloud projects work with QalbIT',
            'title'   => 'A practical cloud migration and DevOps process',
            'intro'   => 'We follow a structured but lightweight process so cloud changes are safe, visible to stakeholders and aligned with your product roadmap.',

            'items' => [
                [
                    'step'        => 1,
                    'title'       => 'Cloud assessment & discovery',
                    'description' => 'Review your current infrastructure, deployments, monitoring and costs. Clarify goals such as stability, speed, compliance or cost reduction.',
                    'duration'    => '1–2 weeks',
                    'outcome'     => 'Assessment report, prioritised issues and a high-level migration or improvement plan.',
                    'icon'        => '/images/icons/discovery.svg',
                ],
                [
                    'step'        => 2,
                    'title'       => 'Architecture & migration planning',
                    'description' => 'Define target cloud architecture, environments, networking, data migration strategy and DevOps approach with a realistic sequence of phases.',
                    'duration'    => '1–3 weeks',
                    'outcome'     => 'Architecture decisions, migration plan and agreed scope for the first implementation phase.',
                    'icon'        => '/images/icons/architecture-design.svg',
                ],
                [
                    'step'        => 3,
                    'title'       => 'Implementation & migration',
                    'description' => 'Set up cloud resources, CI/CD, monitoring and security baselines. Execute migrations in controlled steps with rollbacks defined.',
                    'duration'    => '3–8+ weeks (scope dependent)',
                    'outcome'     => 'Production workloads running on the new or improved cloud environment with minimal disruption.',
                    'icon'        => '/images/icons/core-modules.svg',
                ],
                [
                    'step'        => 4,
                    'title'       => 'Stabilise, observe & optimise',
                    'description' => 'Tune performance, refine alerts, close security gaps and review cloud costs once real traffic flows through the new setup.',
                    'duration'    => 'First 4–8 weeks after go-live',
                    'outcome'     => 'Stable environment with improved visibility, fewer incidents and clearer cost profiles.',
                    'icon'        => '/images/icons/launch.svg',
                ],
                [
                    'step'        => 5,
                    'title'       => 'Ongoing DevOps & managed cloud',
                    'description' => 'Continue with a flexible DevOps or managed cloud engagement to support releases, environments and incremental improvements.',
                    'duration'    => 'Ongoing, month-to-month',
                    'outcome'     => 'Predictable support and evolution of your cloud environment aligned with product priorities.',
                    'icon'        => '/images/icons/scale.svg',
                ],
            ],

            'cta' => [
                'label' => 'Walk me through this cloud process for my setup',
                'url'   => '/contact-us/?service=cloud-based-solutions&topic=process',
            ],
        ],

        'use_cases' => [
            'id'      => 'cloud-use-cases',
            'eyebrow' => 'Where cloud solutions help most',
            'title'   => 'Cloud solution use cases we most often deliver',
            'intro'   => 'Most of our cloud work sits around SaaS products, internal tools and business-critical web applications that need better reliability, performance and deployment practices.',

            'items' => [
                [
                    'label'       => 'Lift-and-shift with structured modernisation',
                    'description' => 'Move from on-premise or shared hosting into the cloud with a clear plan for incremental refactoring instead of a risky big rewrite.',
                    'audience'    => 'SMEs and teams with legacy apps',
                    'badge'       => 'Migration',
                ],
                [
                    'label'       => 'Re-architecting legacy apps for cloud',
                    'description' => 'Break monoliths into better-separated services, adopt managed databases and queues, and introduce clear deployment pipelines.',
                    'audience'    => 'Growing product and engineering teams',
                    'badge'       => 'Modernisation',
                ],
                [
                    'label'       => 'DevOps & managed cloud for SaaS',
                    'description' => 'Provide ongoing DevOps, monitoring and infrastructure changes for SaaS products that need to keep shipping without scaling an in-house ops team.',
                    'audience'    => 'SaaS founders and CTOs',
                    'badge'       => 'Managed cloud',
                    'link'        => [
                        'label' => 'See how we support SaaS products in the cloud',
                        'url'   => '/case-studies/?tag=saas',
                    ],
                ],
                [
                    'label'       => 'Hybrid and multi-cloud environments',
                    'description' => 'Connect on-premise systems with cloud workloads, or operate across more than one provider where it makes sense for resilience or compliance.',
                    'audience'    => 'Enterprises and regulated industries',
                    'badge'       => 'Hybrid / multi-cloud',
                ],
            ],

            'cta' => [
                'label' => 'Ask if your cloud scenario fits these use cases',
                'url'   => '/contact-us/?service=cloud-based-solutions&topic=use-cases',
            ],
        ],

        'stack' => [
            'id'      => 'cloud-tech-stack',
            'eyebrow' => 'Cloud stack & tooling',
            'title'   => 'Cloud platforms, tooling and stacks we typically use',
            'intro'   => 'We work with the major cloud providers and common DevOps tooling. The exact stack depends on your product, traffic profile and internal skills – we avoid over-engineering when simpler options are enough.',
            'note'    => 'Already in the cloud? We can review your current setup, pipelines and costs, then suggest improvements rather than throwing everything away.',

            'categories' => [
                [
                    'name'        => 'Cloud platforms & core services',
                    'description' => 'Foundational services across the main cloud providers.',
                    'items'       => [
                        'AWS (EC2, RDS, S3, CloudFront, ECS/EKS, Lambda) for flexible, battle-tested cloud workloads.',
                        'Microsoft Azure (App Service, AKS, Azure SQL, Storage, Functions) where Microsoft stack or compliance is key.',
                        'Google Cloud Platform (GCE, GKE, Cloud SQL, Cloud Storage) for data-heavy and container-focused workloads.',
                    ],
                ],
                [
                    'name'        => 'Runtime, containers & orchestration',
                    'description' => 'How your applications and services actually run.',
                    'items'       => [
                        'Docker-based containers for consistent packaging and deployment.',
                        'Kubernetes (EKS, AKS, GKE) where orchestration and scaling across services is required.',
                        'Managed PaaS options (Elastic Beanstalk, Azure App Service, etc.) when speed and simplicity beat full control.',
                    ],
                ],
                [
                    'name'        => 'Automation & Infrastructure as Code',
                    'description' => 'Keeping infrastructure reproducible and reviewable.',
                    'items'       => [
                        'Terraform and CloudFormation for Infrastructure as Code across environments.',
                        'GitHub Actions, GitLab CI, Azure DevOps and similar tools for CI/CD pipelines.',
                        'Automated database migrations, backups and environment provisioning.',
                    ],
                ],
                [
                    'name'        => 'Monitoring, logging & security',
                    'description' => 'Observability and security practices around your workloads.',
                    'items'       => [
                        'Cloud-native monitoring (CloudWatch, Azure Monitor, Google Cloud Monitoring) plus tools like Grafana and Prometheus.',
                        'Centralised logging for applications and infrastructure with sensible retention policies.',
                        'Role-based access control, secrets management and backup / recovery strategies aligned with your risk profile.',
                    ],
                ],
            ],
        ],

        'cta' => [
            'enabled' => true,

            'eyebrow' => 'Ready to talk cloud?',
            'title'   => 'Let us review your cloud setup or migration plans together.',
            'body'    => 'Share where your infrastructure is today – on-premise, shared hosting or already in the cloud – and what you want to change. We will review your goals, risks and timelines, then suggest a practical roadmap for migration, stabilisation and DevOps.',

            'primary_label' => 'Book a cloud & DevOps call',
            'primary_url'   => '/contact-us/?topic=cloud-solutions',
            'primary_aria'  => 'Book a cloud and DevOps discovery call with QalbIT',

            'secondary_label' => 'Ask for a cloud assessment',
            'secondary_url'   => '/contact-us/?topic=cloud-assessment',
            'secondary_aria'  => 'Request a cloud assessment from QalbIT',

            'meta' => 'Typically we respond within 24–48 hours with next steps and a suggested assessment or pilot.',
        ],
    ],

    'ecommerce' => [
        'slug'  => '/services/e-commerce/',
        'name'  => 'E-Commerce Development',
        'h1'    => 'E-Commerce Development & Marketplace Solutions',
        'enabled' => true,
        'order' => 100,

        'meta_title'       => 'E-Commerce Development Company & Solutions Provider',
        'meta_description' => 'QalbIT designs and builds cloud-based e-commerce solutions including online stores, B2B portals and multi-vendor marketplaces. We help you launch, migrate or optimise high-performing stores that convert and scale.',
        'short_description'=> 'Custom e-commerce development for online stores, B2B portals and marketplaces that are fast, secure and built to convert.',
        'category'         => 'core',
        'template'         => 'pages/services/e-commerce',

        'icon'    => 'images/services/icon-ecommerce-solutions.svg',
        'iconAlt' => 'Icon representing E-Commerce Solutions',

        'faq_key'      => 'service_ecommerce',
        'faq_title'    => 'Frequently asked questions about e-commerce development with QalbIT',
        'faq_subtitle' => 'These are the questions founders, retailers and B2B teams usually ask when we discuss new e-commerce builds, redesigns or migrations.',

        'hero' => [
            'breadcrumb_label' => 'E-commerce',
            'kicker_prefix'    => 'Services',
            'kicker_label'     => 'E-commerce development and online stores',
            'kicker_detail'    => 'Stores · Marketplaces · B2B portals',

            'title'     => 'E-Commerce Development Services for <span class="text-gradient-brand-animated">Stores, Marketplaces & B2B Commerce</span>.',
            'highlight' => 'Stores, Marketplaces & B2B Commerce',

            'intro' => 'QalbIT delivers cloud-based e-commerce solutions for brands that need reliable online stores, multi-vendor marketplaces and B2B order portals. We focus on performance, SEO and conversion so your store can attract traffic, handle demand and grow revenue.',

            'primary_cta_label' => 'Discuss your e-commerce project',
            'primary_cta_href'  => '/contact-us/?service=e-commerce',

            'secondary_cta_label' => 'View e-commerce case studies',
            'secondary_cta_href'  => '/case-studies/?tag=ecommerce',

            'snapshot_title' => 'E-commerce snapshot',
            'snapshot'       => [
                [
                    'label' => 'Store types',
                    'value' => 'D2C stores, B2B portals, marketplaces',
                ],
                [
                    'label' => 'Typical engagements',
                    'value' => 'New builds, redesigns, platform migrations',
                ],
                [
                    'label' => 'Architecture',
                    'value' => 'Cloud-based, API-first, headless-ready',
                ],
                [
                    'label' => 'Focus areas',
                    'value' => 'Conversion, performance, SEO and operations',
                ],
            ],
        ],

        'overview' => [
            'id'      => 'ecommerce-overview',
            'eyebrow' => 'E-commerce overview',

            'title' => 'E-commerce development services for stores, marketplaces and B2B commerce',
            'intro' => 'We help product, marketing and operations teams launch and optimise e-commerce experiences that feel fast, trustworthy and easy to buy from. Whether you are starting from zero or replacing a legacy store, we design around conversion, SEO and long-term maintainability.',

            'left_title' => 'When e-commerce development with QalbIT makes sense',
            'left_items' => [
                'You want to redesign or rebuild an underperforming online store to improve conversion and lifetime value.',
                'You are planning a new D2C or B2B e-commerce channel and need a practical roadmap, not just a theme.',
                'You want to launch or grow a multi-vendor marketplace with clear roles, commissions and payouts.',
                'You need to migrate from an old platform to a modern, cloud-based e-commerce solution without losing SEO.',
                'You prefer a senior, founder-led team instead of a generic theme customisation agency.',
            ],

            'right_title' => 'Outcomes we usually target for e-commerce teams',
            'right_items' => [
                'Store experiences that load quickly, work smoothly on mobile and build buyer trust.',
                'Simplified buying flows that reduce friction in cart, checkout and account areas.',
                'Scalable architecture and integrations that can handle promotions and seasonal peaks.',
                'Cleaner product, pricing and catalogue structures that support marketing and merchandising.',
                'Clear analytics and reporting so teams can see what drives revenue and where to optimise next.',
            ],

            'note' => 'For most e-commerce projects we start with a short discovery sprint to confirm target customers, product catalogue structure, key user journeys and platform choices before we commit to a build or migration plan.',
        ],

        'capabilities' => [
            'id'      => 'ecommerce-capabilities',
            'eyebrow' => 'What we build for e-commerce teams',
            'title'   => 'E-commerce development capabilities across stores, marketplaces and B2B portals',
            'intro'   => 'From first store launch to complex B2B portals and multi-vendor marketplaces, we cover architecture, UX, integrations and the operational workflows your team depends on.',

            'items' => [
                [
                    'label'       => 'Custom online stores and storefront UX',
                    'description' => 'Design and build product listing pages, product detail pages, carts and checkouts that are optimised for search, speed and conversion rather than just matching a default theme.',
                    'badge'       => 'Stores',
                    'icon'        => '/images/icons/modules.svg',
                ],
                [
                    'label'       => 'Multi-vendor marketplaces',
                    'description' => 'Implement vendor onboarding, catalogues, commissions, payouts and dispute flows so multiple sellers can operate on a single marketplace with clear rules.',
                    'badge'       => 'Marketplaces',
                    'icon'        => '/images/icons/architecture.svg',
                ],
                [
                    'label'       => 'B2B e-commerce portals and self-service',
                    'description' => 'Create account-based buying experiences with custom price lists, quotes, purchase approvals and repeat ordering for distributors, wholesalers and enterprise buyers.',
                    'badge'       => 'B2B commerce',
                    'icon'        => '/images/icons/billing.svg',
                ],
                [
                    'label'       => 'Headless and API-first commerce',
                    'description' => 'Decouple your storefront from the backend using APIs so you can run fast frontends, mobile apps and kiosks on top of a single commerce engine.',
                    'badge'       => 'Architecture',
                    'icon'        => '/images/icons/api.svg',
                ],
                [
                    'label'       => 'Payments, tax and fulfilment integrations',
                    'description' => 'Integrate payment gateways, tax engines, shipping providers and ERPs so orders, inventory and invoices stay in sync across systems.',
                    'badge'       => 'Integrations',
                    'icon'        => '/images/icons/automation.svg',
                ],
                [
                    'label'       => 'Performance, SEO and CRO improvements',
                    'description' => 'Improve page speed, technical SEO, structured data and on-site experiments so your store can regain impressions and convert more of the traffic you already earn.',
                    'badge'       => 'Optimisation',
                    'icon'        => '/images/icons/ops.svg',
                ],
            ],

            'cta' => [
                'label' => 'Discuss your e-commerce scope',
                'url'   => '/contact-us/?service=e-commerce',
            ],
        ],

        'process' => [
            'id'      => 'ecommerce-process',
            'eyebrow' => 'How e-commerce projects work with QalbIT',
            'title'   => 'A practical e-commerce development process from discovery to growth',
            'intro'   => 'We keep the process structured but flexible so that you can launch quickly, protect SEO and iterate based on real store data.',

            'items' => [
                [
                    'step'        => 1,
                    'title'       => 'Discovery, goals and platform choices',
                    'description' => 'Clarify target customers, product catalogue, fulfilment flows and channel mix, then choose a suitable platform and architecture for your e-commerce roadmap.',
                    'duration'    => '1–2 weeks',
                    'outcome'     => 'Documented goals, platform recommendations and a first-release scope that fits budget and deadlines.',
                    'icon'        => '/images/icons/discovery.svg',
                ],
                [
                    'step'        => 2,
                    'title'       => 'Experience design and information architecture',
                    'description' => 'Design navigation, category structure, PDPs, cart and checkout with attention to search behaviour, merchandising and promotions.',
                    'duration'    => '1–3 weeks',
                    'outcome'     => 'Approved UX flows, wireframes and a content plan for key pages and components.',
                    'icon'        => '/images/icons/architecture-design.svg',
                ],
                [
                    'step'        => 3,
                    'title'       => 'Build, integrations and migration',
                    'description' => 'Implement storefronts, back-office workflows and integrations, then prepare and migrate catalogue, customer and order data where needed.',
                    'duration'    => '4–10+ weeks (scope dependent)',
                    'outcome'     => 'Production-ready store or marketplace connected to live systems and payment providers.',
                    'icon'        => '/images/icons/core-modules.svg',
                ],
                [
                    'step'        => 4,
                    'title'       => 'Launch, SEO protection and monitoring',
                    'description' => 'Launch with redirects, tracking and performance monitoring in place so you retain search visibility and can respond quickly to early issues.',
                    'duration'    => 'First 4–8 weeks after launch',
                    'outcome'     => 'Stable live store with preserved or improved SEO and clear post-launch metrics.',
                    'icon'        => '/images/icons/launch.svg',
                ],
                [
                    'step'        => 5,
                    'title'       => 'Ongoing optimisation and roadmap',
                    'description' => 'Continue improving UX, speed, search and on-site experiments on a monthly basis, aligned with campaigns and seasonal peaks.',
                    'duration'    => 'Ongoing, month-to-month',
                    'outcome'     => 'Predictable improvements in conversion rate, average order value and repeat purchases.',
                    'icon'        => '/images/icons/scale.svg',
                ],
            ],

            'cta' => [
                'label' => 'Walk me through this process for my store',
                'url'   => '/contact-us/?service=e-commerce&topic=process',
            ],
        ],

        'use_cases' => [
            'id'      => 'ecommerce-use-cases',
            'eyebrow' => 'Where e-commerce development fits best',
            'title'   => 'E-commerce use cases we most often deliver',
            'intro'   => 'Most of our e-commerce work is for teams that either need a stronger first version of their store or want to modernise and scale an existing channel that has outgrown its original setup.',

            'items' => [
                [
                    'label'       => 'D2C brand and retail stores',
                    'description' => 'Direct-to-consumer stores for brands that want full control over the buying experience, merchandising and promotions.',
                    'audience'    => 'Consumer brands, speciality retailers and subscription products',
                    'badge'       => 'D2C stores',
                    'link'        => [
                        'label' => 'Ask how we can improve your D2C funnel',
                        'url'   => '/contact-us/?service=e-commerce&topic=d2c',
                    ],
                ],
                [
                    'label'       => 'B2B order portals and wholesale commerce',
                    'description' => 'Account-based B2B portals that allow buyers to browse catalogues, request quotes, place repeat orders and view invoices without manual email back-and-forth.',
                    'audience'    => 'Manufacturers, distributors and wholesalers',
                    'badge'       => 'B2B commerce',
                    'link'        => [
                        'label' => 'Discuss a B2B portal for your customers',
                        'url'   => '/contact-us/?service=e-commerce&topic=b2b',
                    ],
                ],
                [
                    'label'       => 'Multi-vendor and niche marketplaces',
                    'description' => 'Vertical marketplaces connecting buyers and multiple sellers with clear onboarding, listing, fees and payout processes.',
                    'audience'    => 'Marketplace operators and niche platforms',
                    'badge'       => 'Marketplaces',
                    'link'        => [
                        'label' => 'Explore a marketplace model for your niche',
                        'url'   => '/contact-us/?service=e-commerce&topic=marketplace',
                    ],
                ],
                [
                    'label'       => 'Replatforming and performance-focused redesigns',
                    'description' => 'Moving from legacy or poorly configured setups to modern, cloud-based e-commerce solutions that improve SEO, speed and management.',
                    'audience'    => 'Growing stores with existing traffic and revenue',
                    'badge'       => 'Replatforming',
                ],
            ],

            'cta' => [
                'label' => 'Ask if your e-commerce idea fits these use cases',
                'url'   => '/contact-us/?service=e-commerce&topic=use-cases',
            ],
        ],

        'stack' => [
            'id'      => 'ecommerce-tech-stack',
            'eyebrow' => 'Tech stack and platforms',
            'title'   => 'E-commerce stack and platforms we typically use',
            'intro'   => 'We select platforms and tools based on catalogue complexity, integration needs, traffic expectations and internal team skills, not just on trends.',
            'note'    => 'Already have a live store or marketplace? We can review your current stack, analytics and SEO before recommending any changes.',

            'categories' => [
                [
                    'name'        => 'E-commerce platforms and engines',
                    'description' => 'Core engines that power product catalogues, carts and orders.',
                    'items'       => [
                        'Custom Laravel or Node.js based e-commerce backends for fully tailored requirements.',
                        'Shopify, WooCommerce or similar engines when they are a good fit for catalogue and operations.',
                        'Headless-friendly setups that expose commerce functions through APIs.',
                    ],
                ],
                [
                    'name'        => 'Storefronts and user experience',
                    'description' => 'Frontends that buyers use every day on web and mobile.',
                    'items'       => [
                        'Next.js frontends for fast, SEO-friendly storefronts and portals.',
                        'Blade or other server-rendered templates for focused marketing and content pages.',
                        'Component-driven UI with accessibility considerations and reusable patterns.',
                    ],
                ],
                [
                    'name'        => 'Data, integrations and operations',
                    'description' => 'How orders, inventory and financial data stay in sync.',
                    'items'       => [
                        'MySQL or PostgreSQL for orders, customers and catalogue data.',
                        'Integrations with ERPs, CRMs, marketing tools and shipping providers.',
                        'Queues, background jobs and webhooks to keep workflows reliable at scale.',
                    ],
                ],
                [
                    'name'        => 'Performance, security and observability',
                    'description' => 'Keeping stores fast, secure and measurable.',
                    'items'       => [
                        'Caching, CDNs and image optimisation for faster page loads.',
                        'Hardened authentication, roles and basic compliance-friendly practices.',
                        'Centralised logging, uptime monitoring and analytics dashboards.',
                    ],
                ],
            ],
        ],

        'cta' => [
            'enabled' => true,

            'eyebrow' => 'Ready to improve your e-commerce channel?',
            'title'   => 'Let us plan your next e-commerce launch or redesign.',
            'body'    => 'Share where your store or marketplace is today and where you want it to be. We will review your goals, current platform and constraints, then suggest a practical roadmap focused on conversion and sustainable growth.',

            'primary_label' => 'Book an e-commerce discovery call',
            'primary_url'   => '/contact-us/?topic=e-commerce-development',
            'primary_aria'  => 'Book an e-commerce discovery call with QalbIT',

            'secondary_label' => 'Discuss a marketplace or B2B portal',
            'secondary_url'   => '/contact-us/?topic=e-commerce-b2b-marketplace',
            'secondary_aria'  => 'Discuss a marketplace or B2B portal with QalbIT',

            'meta' => 'Typically we respond within 24–48 hours with next steps and an initial recommendation.',
        ],
    ],

    'ux_design' => [
        'slug'     => '/services/ui-ux-design-service/',
        'name'     => 'UX Design Services',
        'h1'       => 'UI UX Design & Product Design Services',
        'enabled'  => true,
        'order'    => 110,

        'meta_title'       => 'UI UX Design Services – Product & Interface Design – QalbIT',
        'meta_description' => 'QalbIT’s UI UX design services turn complex requirements into intuitive interfaces for web and mobile apps. We design SaaS dashboards, websites and internal tools that feel clear, fast and conversion-focused.',

        'short_description' => 'User-centric UI UX and product design for SaaS products, web applications and mobile experiences.',
        'category'          => 'support',
        'template'          => 'pages/services/ux-design-services',

        'icon'    => 'images/services/icon-ui-ux-design-service.svg',
        'iconAlt' => 'Icon representing UX Design Services',

        'faq_key'      => 'service_ux_design',
        'faq_title'    => 'Frequently asked questions about UX and product design with QalbIT',
        'faq_subtitle' => 'These are the questions founders and teams usually ask when we discuss UX design, UI refreshes and product experience improvements.',

        'hero' => [
            'breadcrumb_label' => 'UI UX design',
            'kicker_prefix'    => 'Services',
            'kicker_label'     => 'UI UX & product design',
            'kicker_detail'    => 'SaaS · Web apps · Mobile',

            'title'     => 'UI UX Design Services for <span class="text-gradient-brand-animated">SaaS Products, Web Apps & Internal Tools</span>.',
            'highlight' => 'SaaS Products, Web Apps & Internal Tools',

            'intro' => 'QalbIT helps you design product experiences that feel clear, fast and usable – from first-time onboarding screens to complex SaaS dashboards and internal tools. Our UI UX design services focus on flows, clarity and conversion, not just how the interface looks.',

            'primary_cta_label' => 'Discuss your UX & product design needs',
            'primary_cta_href'  => '/contact-us/?topic=ux-design',

            'secondary_cta_label' => 'View design-focused case studies',
            'secondary_cta_href'  => '/case-studies/?tag=design',

            'snapshot_title' => 'UX design snapshot',
            'snapshot'       => [
                [
                    'label' => 'Core focus',
                    'value' => 'UI UX design for SaaS, web apps and internal tools',
                ],
                [
                    'label' => 'Typical engagements',
                    'value' => 'New product UX, redesigns, dashboards, design systems',
                ],
                [
                    'label' => 'Deliverables',
                    'value' => 'User flows, wireframes, UI designs, design systems',
                ],
                [
                    'label' => 'Platforms',
                    'value' => 'Web, responsive web, iOS and Android apps',
                ],
            ],
        ],

        'overview' => [
            'id'      => 'ux-overview',
            'eyebrow' => 'UX design overview',

            'title' => 'UX design services for SaaS products, web applications and mobile apps',
            'intro' => 'We provide UI UX design services for teams who want their products to feel simpler, clearer and more intuitive. From first-time onboarding to complex multi-step flows, we focus on journeys that make sense to users and support your business goals.',

            'left_title' => 'When UX design with QalbIT makes sense',
            'left_items' => [
                'You have a working product but users struggle with key flows such as onboarding, checkout or configuration.',
                'You are planning a new SaaS or web application and want a clear UX foundation before heavy development starts.',
                'You need UI UX design support for dashboards, admin panels or internal tools with complex logic and data.',
                'Your current UI feels dated or inconsistent and you want a modern, systemised design across the product.',
                'You prefer a UX design partner who understands engineering constraints and can work tightly with your dev team.',
            ],

            'right_title' => 'Outcomes we usually target with UX design',
            'right_items' => [
                'Clear user journeys that reduce friction and support higher activation and conversion rates.',
                'Interfaces that feel consistent across pages, modules and devices, backed by a design system.',
                'Dashboards and data-heavy screens that make it easier for users to understand and act on information.',
                'Clickable prototypes that stakeholders can review and validate before committing to development.',
                'Well-documented UX and UI assets so your developers can implement faster with fewer revisions.',
            ],

            'note' => 'For UX and UI work we typically begin with a short discovery and UX audit, then move into prioritised flows and screens so that the most important journeys improve first.',
        ],

        'capabilities' => [
            'id'      => 'ux-capabilities',
            'eyebrow' => 'What we design',
            'title'   => 'UX design capabilities across flows, interfaces and design systems',
            'intro'   => 'Our UI UX design services cover everything from early discovery and flows to high-fidelity UI and design systems that developers can implement reliably.',

            'items' => [
                [
                    'label'       => 'Product discovery & UX strategy',
                    'description' => 'Clarify user goals, map key journeys and prioritise which flows and screens we should design first for maximum impact.',
                    'badge'       => 'Strategy',
                    'icon'        => '/images/icons/discovery-light.svg',
                ],
                [
                    'label'       => 'User flows & information architecture',
                    'description' => 'Design clear user flows, navigation and information hierarchy so users always know where they are and what to do next.',
                    'badge'       => 'Structure',
                    'icon'        => '/images/icons/architecture.svg',
                ],
                [
                    'label'       => 'Wireframes & interaction design',
                    'description' => 'Low- to mid-fidelity wireframes that focus on layout, interactions and edge cases before we invest in detailed UI.',
                    'badge'       => 'UX',
                    'icon'        => '/images/icons/wireframe.svg',
                ],
                [
                    'label'       => 'UI design & visual systems',
                    'description' => 'High-fidelity UI for web and mobile apps, including typography, colour, spacing and states that feel modern and accessible.',
                    'badge'       => 'UI',
                    'icon'        => '/images/icons/design.svg',
                ],
                [
                    'label'       => 'Design systems & component libraries',
                    'description' => 'Reusable components, styles and tokens in tools like Figma so that future screens are faster to design and implement.',
                    'badge'       => 'Design system',
                    'icon'        => '/images/icons/modules.svg',
                ],
                [
                    'label'       => 'Prototypes, specs & developer handoff',
                    'description' => 'Interactive prototypes and detailed specs, with close collaboration between designers and engineers during implementation.',
                    'badge'       => 'Handoff',
                    'icon'        => '/images/icons/ops.svg',
                ],
            ],

            'cta' => [
                'label' => 'Discuss your UX design scope',
                'url'   => '/contact-us/?service=ux-design',
            ],
        ],

        'process' => [
            'id'      => 'ux-process',
            'eyebrow' => 'How UX design projects work with QalbIT',
            'title'   => 'A practical UX design process from audit to implementation',
            'intro'   => 'We follow a UX process that is structured enough to reduce risk but flexible enough to fit your timelines, existing product and engineering roadmap.',

            'items' => [
                [
                    'step'        => 1,
                    'title'       => 'Discovery & UX audit',
                    'description' => 'Review your product, analytics, existing UX issues and goals. Identify key journeys to improve and align on priorities with your team.',
                    'duration'    => '1–2 weeks',
                    'outcome'     => 'UX findings, prioritised flows and a clear UX design plan for the first phase.',
                    'icon'        => '/images/icons/discovery.svg',
                ],
                [
                    'step'        => 2,
                    'title'       => 'User flows & wireframes',
                    'description' => 'Design user flows and low- to mid-fidelity wireframes for the most important screens and paths, including edge cases.',
                    'duration'    => '1–3 weeks',
                    'outcome'     => 'Agreed flows and wireframes that stakeholders and developers can review and sign off on.',
                    'icon'        => '/images/icons/architecture-design.svg',
                ],
                [
                    'step'        => 3,
                    'title'       => 'High-fidelity UI & design system',
                    'description' => 'Apply visual design, states and patterns to the approved wireframes and set up a reusable component library where appropriate.',
                    'duration'    => '2–4+ weeks (scope dependent)',
                    'outcome'     => 'High-fidelity UI screens and a starting design system ready for implementation.',
                    'icon'        => '/images/icons/core-modules.svg',
                ],
                [
                    'step'        => 4,
                    'title'       => 'Prototype, validate & refine',
                    'description' => 'Create clickable prototypes, gather feedback from stakeholders or small user groups and refine flows and UI where needed.',
                    'duration'    => '2–4 weeks',
                    'outcome'     => 'Validated UX with refinements based on real feedback, ready for handoff.',
                    'icon'        => '/images/icons/launch.svg',
                ],
                [
                    'step'        => 5,
                    'title'       => 'Handoff & ongoing design support',
                    'description' => 'Support your developers during implementation and continue improving UX for new modules and features on a roadmap.',
                    'duration'    => 'Ongoing, month-to-month',
                    'outcome'     => 'A living design system and consistent UX as the product grows.',
                    'icon'        => '/images/icons/scale.svg',
                ],
            ],

            'cta' => [
                'label' => 'Walk me through this UX process for my product',
                'url'   => '/contact-us/?service=ux-design&topic=process',
            ],
        ],

        'use_cases' => [
            'id'      => 'ux-use-cases',
            'eyebrow' => 'Where UX design adds the most value',
            'title'   => 'UX design use cases we most often support',
            'intro'   => 'Most of our UX work focuses on digital products that already have or expect real usage: SaaS tools, web applications, internal portals and mobile experiences.',

            'items' => [
                [
                    'label'       => 'SaaS dashboards & B2B products',
                    'description' => 'UX for subscription-based SaaS platforms, admin dashboards and B2B tools where users work with data, settings and workflows every day.',
                    'audience'    => 'SaaS founders and product teams',
                    'badge'       => 'SaaS UX',
                    'link'        => [
                        'label' => 'See how we design SaaS dashboards',
                        'url'   => '/case-studies/?tag=saas',
                    ],
                ],
                [
                    'label'       => 'Web applications & internal tools',
                    'description' => 'Interfaces for internal operational tools, CRMs, queue management, booking systems and portals with complex but routine tasks.',
                    'audience'    => 'Operations, support and internal product teams',
                    'badge'       => 'Web app UX',
                ],
                [
                    'label'       => 'Marketing sites & conversion pages',
                    'description' => 'Landing pages, pricing pages and marketing sites that need a clear narrative, hierarchy and calls to action to support campaigns.',
                    'audience'    => 'Marketing and growth teams',
                    'badge'       => 'Conversion UX',
                ],
                [
                    'label'       => 'Mobile app experiences',
                    'description' => 'Mobile-first UX and UI for iOS and Android apps, with flows and patterns tailored to small screens and on-the-go usage.',
                    'audience'    => 'Product and mobile teams',
                    'badge'       => 'Mobile UX',
                ],
            ],

            'cta' => [
                'label' => 'Ask if your UX needs fit these use cases',
                'url'   => '/contact-us/?service=ux-design&topic=use-cases',
            ],
        ],

        'stack' => [
            'id'      => 'ux-design-stack',
            'eyebrow' => 'Design stack & collaboration',
            'title'   => 'Tools and collaboration stack we use for UX design',
            'intro'   => 'We work in tools that are easy for both designers and developers to collaborate in, keeping UX decisions visible and implementation-ready.',
            'note'    => 'Already using your own design tools or systems? We can adapt to your current setup and evolve it instead of forcing a complete reset.',

            'categories' => [
                [
                    'name'        => 'Research & collaboration',
                    'description' => 'Understanding context and aligning the team around UX decisions.',
                    'items'       => [
                        'Workshops and discovery sessions with stakeholders and product owners.',
                        'Lightweight user interviews or internal SME interviews where needed.',
                        'Shared documentation in tools like Notion, Confluence or similar.',
                    ],
                ],
                [
                    'name'        => 'Design & prototyping',
                    'description' => 'Creating UX flows, wireframes and UI designs.',
                    'items'       => [
                        'Figma for user flows, wireframes and high-fidelity UI screens.',
                        'FigJam or similar tools for mapping journeys and information architecture.',
                        'Clickable prototypes for usability checks and stakeholder reviews.',
                    ],
                ],
                [
                    'name'        => 'Design systems & handoff',
                    'description' => 'Keeping design consistent and implementation-friendly.',
                    'items'       => [
                        'Component libraries and styles in Figma aligned with your brand.',
                        'Design tokens and spacing systems that map cleanly to modern frontends (Tailwind, design systems, etc.).',
                        'Handoff with specs, annotations and dev-ready assets for faster implementation.',
                    ],
                ],
                [
                    'name'        => 'Platforms we design for',
                    'description' => 'UX and UI tailored to the platforms you actually use.',
                    'items'       => [
                        'Responsive web applications and marketing sites.',
                        'SaaS dashboards, admin panels and portals.',
                        'iOS and Android mobile apps in collaboration with your mobile team.',
                    ],
                ],
            ],
        ],

        'cta' => [
            'enabled' => true,

            'eyebrow' => 'Ready to improve your product UX?',
            'title'   => 'Let’s redesign your key flows and interfaces, step by step.',
            'body'    => 'Share where users are getting stuck today and which parts of your product matter most. We will review your current UX, propose practical improvements and outline a phased UX design plan that fits your roadmap.',

            'primary_label' => 'Book a UX design discovery call',
            'primary_url'   => '/contact-us/?topic=ux-design',
            'primary_aria'  => 'Book a UX design discovery call with QalbIT',

            'secondary_label' => 'Talk about a UX audit or redesign',
            'secondary_url'   => '/contact-us/?topic=ux-audit',
            'secondary_aria'  => 'Discuss a UX audit or redesign with QalbIT',

            'meta' => 'Typically we respond within 24–48 hours with next steps and a suggested first UX phase.',
        ],
    ],

    'payment_gateway' => [
        'slug'  => '/services/payment-gateway-services/',
        'name'  => 'Payment Gateway Integration',
        'h1'    => 'Payment Gateway Integration Services for Web, Mobile & SaaS',
        'enabled' => true,
        'order' => 120,

        'meta_title' => 'Payment Gateway Integration Services – Stripe, Razorpay, PayPal & More',
        'meta_description' => 'QalbIT provides secure payment gateway integration services for Stripe, Razorpay, PayPal, Coinbase Commerce and others. We design and implement one-time payments, subscriptions, marketplaces and payout flows for web, mobile and SaaS products.',

        'short_description' => 'Secure payment gateway integration for Stripe, Razorpay, PayPal, Coinbase Commerce and more – covering one-time payments, subscriptions and marketplace payouts.',
        'category' => 'support',
        'template' => 'pages/services/payment-gateway-services',

        'icon'      => 'images/services/icon-payment-gateway.svg',
        'iconAlt'   => 'Icon representing Payment Gateway Integration',

        'faq_key'      => 'service_payment_gateway',
        'faq_title'    => 'Frequently asked questions about payment gateway integration with QalbIT',
        'faq_subtitle' => 'These are the questions founders, finance teams and product owners usually ask when we discuss Stripe, Razorpay, PayPal and other payment gateway integrations.',

        'hero' => [
            'breadcrumb_label' => 'Payment gateway',
            'kicker_prefix'    => 'Services',
            'kicker_label'     => 'Payment gateway integration & billing',
            'kicker_detail'    => 'Stripe · Razorpay · PayPal · Coinbase Commerce',

            'title'     => 'Payment Gateway Integration Services for <span class="text-gradient-brand-animated">Web, Mobile & SaaS Products</span>.',
            'highlight' => 'Web, Mobile & SaaS Products',

            'intro' => 'QalbIT helps you design and implement secure payment gateway integrations so customers can pay you smoothly from anywhere. We work with Stripe, Razorpay, PayPal, Coinbase Commerce and other gateways to support one-time payments, subscriptions, marketplaces, payouts and refunds – all wired cleanly into your product and finance processes.',

            'primary_cta_label' => 'Discuss your payment integration',
            'primary_cta_href'  => '/contact-us/?service=payment-gateway',

            'secondary_cta_label' => 'Share your billing requirements',
            'secondary_cta_href'  => '/contact-us/?topic=billing-payments',

            'snapshot_title' => 'Payment integration snapshot',
            'snapshot'       => [
                [
                    'label' => 'Core focus',
                    'value' => 'Online payments, subscriptions and marketplaces',
                ],
                [
                    'label' => 'Gateways',
                    'value' => 'Stripe, Razorpay, PayPal, Coinbase Commerce & more',
                ],
                [
                    'label' => 'Use cases',
                    'value' => 'Stores, SaaS products, platforms and internal tools',
                ],
                [
                    'label' => 'Typical work',
                    'value' => 'New integrations, migrations and multi-gateway setups',
                ],
            ],
        ],

        'overview' => [
            'id'      => 'payment-gateway-overview',
            'eyebrow' => 'Payment gateway integration overview',

            'title' => 'Payment gateway integration services for secure, reliable online payments',
            'intro' => 'We help you accept online payments confidently by integrating leading payment gateways into your web, mobile and SaaS products. Instead of treating payments as an afterthought, we design flows that work for your users, finance team and long-term product roadmap.',

            'left_title' => 'When payment gateway integration with QalbIT makes sense',
            'left_items' => [
                'You are launching a new product or store and need to accept online payments from day one.',
                'You want to move away from cash-on-delivery or manual bank transfers to card and UPI payments.',
                'You are not satisfied with your current gateway and want to migrate to Stripe, Razorpay, PayPal or others.',
                'You need subscriptions, trials, upgrades and renewals for a SaaS or membership product.',
                'You run a marketplace or platform that needs split payments and payouts to vendors or partners.',
            ],

            'right_title' => 'Outcomes we usually target with payment integrations',
            'right_items' => [
                'Higher checkout conversion through clean, reliable payment flows.',
                'Fewer failed or duplicated payments thanks to proper handling of webhooks and retries.',
                'Clear mapping between payment events and your internal orders, invoices and ledgers.',
                'Support for multiple payment methods, currencies and regions as you grow.',
                'A payment integration that is easier to maintain and extend rather than a fragile script.',
            ],

            'note' => 'Before we write code, we map your payment flows: who pays whom, in which currency, using which methods and with what refund or dispute rules. This reduces surprises later.',
        ],

        'capabilities' => [
            'id'      => 'payment-gateway-capabilities',
            'eyebrow' => 'What we implement',
            'title'   => 'Payment gateway integration capabilities across one-time, subscription and marketplace flows',
            'intro'   => 'From simple one-time payments to complex marketplace and subscription billing, we design payment flows that match your business model and customer expectations.',

            'items' => [
                [
                    'label'       => 'One-time payments and checkout flows',
                    'description' => 'Implement secure one-time payments for products, services, bookings or invoices using Stripe, Razorpay, PayPal or similar gateways.',
                    'badge'       => 'One-time payments',
                    'icon'        => '/images/icons/modules.svg',
                ],
                [
                    'label'       => 'Subscription and membership billing',
                    'description' => 'Set up recurring billing for SaaS, memberships or retainers with trials, coupons, upgrades, downgrades and renewals handled cleanly.',
                    'badge'       => 'Subscriptions',
                    'icon'        => '/images/icons/billing.svg',
                ],
                [
                    'label'       => 'Marketplaces and split payments',
                    'description' => 'Design marketplace flows using features like Stripe Connect or Razorpay Route to route funds between your platform, vendors and partners.',
                    'badge'       => 'Marketplaces',
                    'icon'        => '/images/icons/architecture.svg',
                ],
                [
                    'label'       => 'Multi-currency and regional payments',
                    'description' => 'Configure currencies, local payment methods and tax/VAT logic so you can sell across regions while keeping reporting manageable.',
                    'badge'       => 'Global payments',
                    'icon'        => '/images/icons/api.svg',
                ],
                [
                    'label'       => 'Refunds, disputes and payouts',
                    'description' => 'Wire refund, chargeback and payout events into your orders, wallets or accounting so finance teams are not reconciling manually.',
                    'badge'       => 'Operations',
                    'icon'        => '/images/icons/ops.svg',
                ],
                [
                    'label'       => 'Security, webhooks and compliance basics',
                    'description' => 'Implement secure payment flows, webhook handling, logging and access control aligned with gateway guidelines and good PCI-DSS practices.',
                    'badge'       => 'Security',
                    'icon'        => '/images/icons/security.svg',
                ],
            ],

            'cta' => [
                'label' => 'Discuss your payment gateway integration scope',
                'url'   => '/contact-us/?service=payment-gateway',
            ],
        ],

        'process' => [
            'id'      => 'payment-gateway-process',
            'eyebrow' => 'How payment projects work',
            'title'   => 'A clear process for payment gateway integration and optimisation',
            'intro'   => 'We follow a structured, low-risk process so that payment gateway integration is tested properly, goes live smoothly and remains stable as your volumes grow.',

            'items' => [
                [
                    'step'        => 1,
                    'title'       => 'Payment flows and gateway selection',
                    'description' => 'Understand your business model, target geographies, currencies and user flows, then confirm which gateways and payment methods make the most sense.',
                    'duration'    => '1–2 weeks',
                    'outcome'     => 'Documented payment flows, chosen gateways and a clear list of events to handle.',
                    'icon'        => '/images/icons/discovery.svg',
                ],
                [
                    'step'        => 2,
                    'title'       => 'Architecture and UX design',
                    'description' => 'Design how the frontend, backend and gateways will interact, including checkout UX, tokens, webhooks, retries and mapping to orders or subscriptions.',
                    'duration'    => '1–2 weeks',
                    'outcome'     => 'Payment integration plan and UX flows aligned with product and finance needs.',
                    'icon'        => '/images/icons/architecture-design.svg',
                ],
                [
                    'step'        => 3,
                    'title'       => 'Implementation and integration',
                    'description' => 'Implement the payment gateway integration in your backend and frontend, configure the dashboard and connect it with your existing systems.',
                    'duration'    => '2–6+ weeks (scope-dependent)',
                    'outcome'     => 'Working integration in staging with test cards, flows and events verified.',
                    'icon'        => '/images/icons/core-modules.svg',
                ],
                [
                    'step'        => 4,
                    'title'       => 'Testing, go-live and monitoring',
                    'description' => 'Run business and edge-case tests, help you go live and set up logging and monitoring for payment events, failures and anomalies.',
                    'duration'    => '1–3 weeks',
                    'outcome'     => 'Production-ready payment integration with essential alerts and dashboards.',
                    'icon'        => '/images/icons/launch.svg',
                ],
                [
                    'step'        => 5,
                    'title'       => 'Optimisation and ongoing support',
                    'description' => 'Review conversion, failure reasons and gateway reports periodically, then make iterative improvements to flows, messaging and retry logic.',
                    'duration'    => 'Ongoing, month-to-month',
                    'outcome'     => 'Better payment success rates and cleaner financial operations over time.',
                    'icon'        => '/images/icons/scale.svg',
                ],
            ],

            'cta' => [
                'label' => 'Walk me through this process for my product',
                'url'   => '/contact-us/?service=payment-gateway&topic=process',
            ],
        ],

        'use_cases' => [
            'id'      => 'payment-gateway-use-cases',
            'eyebrow' => 'Where this fits best',
            'title'   => 'Payment gateway integration use cases we usually work on',
            'intro'   => 'Most of our payment gateway projects come from teams who want to stabilise or upgrade how they accept and manage payments across products and regions.',

            'items' => [
                [
                    'label'       => 'E-commerce and D2C stores',
                    'description' => 'Integrate Stripe, Razorpay, PayPal or local gateways into online stores for one-time orders, COD alternatives and partial payments.',
                    'audience'    => 'E-commerce brands and marketplaces',
                    'badge'       => 'E-commerce',
                    'link'        => [
                        'label' => 'Ask how this would work with your store stack',
                        'url'   => '/contact-us/?service=payment-gateway&topic=ecommerce',
                    ],
                ],
                [
                    'label'       => 'SaaS and subscription products',
                    'description' => 'Set up recurring billing, trials, usage-based fees and upgrades/downgrades with clean mapping to your subscription model.',
                    'audience'    => 'SaaS founders and product teams',
                    'badge'       => 'SaaS billing',
                    'link'        => [
                        'label' => 'Discuss subscription billing for your SaaS',
                        'url'   => '/contact-us/?service=payment-gateway&topic=saas-billing',
                    ],
                ],
                [
                    'label'       => 'Marketplaces and multi-vendor platforms',
                    'description' => 'Implement split payments, commissions and payouts so your platform can charge customers once and route funds correctly to vendors.',
                    'audience'    => 'Marketplaces and aggregators',
                    'badge'       => 'Marketplaces',
                ],
                [
                    'label'       => 'Internal tools and invoicing portals',
                    'description' => 'Connect your internal CRM or invoicing system to payment gateways so invoices can be paid online and reconciled automatically.',
                    'audience'    => 'B2B services and internal platforms',
                    'badge'       => 'Internal tools',
                ],
            ],

            'cta' => [
                'label' => 'Ask if your payment use case fits these patterns',
                'url'   => '/contact-us/?service=payment-gateway&topic=use-cases',
            ],
        ],

        'stack' => [
            'id'      => 'payment-gateway-tech-stack',
            'eyebrow' => 'Gateways & tech stack',
            'title'   => 'Payment gateways and technology stack we typically use',
            'intro'   => 'We integrate with leading global and regional gateways and wire them into backends, frontends and internal systems using robust, observable patterns.',
            'note'    => 'If you already have a preferred payment gateway, we will build around it. If not, we can recommend options based on your countries, currencies and business model.',

            'categories' => [
                [
                    'name'        => 'Payment gateways and platforms',
                    'description' => 'Core services that actually process payments and manage billing.',
                    'items'       => [
                        'Stripe for global card payments, subscriptions and marketplaces.',
                        'Razorpay for India-focused payments, UPI and payouts.',
                        'PayPal for wallets and trusted consumer payments.',
                        'Coinbase Commerce and similar services for crypto payments where suitable.',
                    ],
                ],
                [
                    'name'        => 'Backend & APIs',
                    'description' => 'How your application talks to payment gateways securely.',
                    'items'       => [
                        'Laravel and NestJS backends using official or well-maintained gateway SDKs.',
                        'Webhook handlers for payment, subscription, refund and dispute events.',
                        'Queue workers and schedulers for retries, dunning and asynchronous tasks.',
                    ],
                ],
                [
                    'name'        => 'Frontend & UX',
                    'description' => 'Checkout, payment pages and in-app billing experiences.',
                    'items'       => [
                        'Next.js and other modern frontends integrated with hosted or embedded payment forms.',
                        'Secure tokenisation and client-side flows recommended by each gateway.',
                        'UX patterns for clear errors, status updates and retry options.',
                    ],
                ],
                [
                    'name'        => 'Security, monitoring & operations',
                    'description' => 'Keeping payment flows safe, observable and maintainable.',
                    'items'       => [
                        'HTTPS everywhere, secure secrets management and limited data storage.',
                        'Logging and dashboards for payment events, failures and anomalies.',
                        'Processes aligned with PCI-DSS best practices at the application level.',
                    ],
                ],
            ],
        ],

        'cta' => [
            'enabled' => true,

            'eyebrow' => 'Ready to accept payments reliably?',
            'title'   => 'Let’s design a payment gateway integration that fits your product and markets.',
            'body'    => 'Share your target countries, currencies, products and existing systems. We will propose a clear payment gateway integration plan that balances user experience, technical reliability and finance requirements.',

            'primary_label' => 'Book a payment integration call',
            'primary_url'   => '/contact-us/?topic=payment-gateway-integration',
            'primary_aria'  => 'Book a payment gateway integration call with QalbIT',

            'secondary_label' => 'Send your payment requirements',
            'secondary_url'   => '/contact-us/?topic=payments-requirements',
            'secondary_aria'  => 'Send your payment requirements to QalbIT',

            'meta' => 'Typically we respond within 24–48 hours with next steps and suggested gateway options.',
        ],
    ],
];
