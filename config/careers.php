<?php

return [

    // -------------------------------------------------
    // Page-level meta
    // -------------------------------------------------
    'page' => [
        'slug'    => '/career/',
        'name'    => 'Careers at QalbIT',
        'h1'      => 'Careers at QalbIT – Software developer jobs in Ahmedabad',
        'enabled' => true,
        'order'   => 10,

        'meta_title'       => 'Software Developer Jobs in Ahmedabad – Careers at QalbIT',
        'meta_description' => 'Explore careers at QalbIT in Ahmedabad – Laravel, PHP, Node.js, React, Next.js, Flutter and QA roles. Product-focused work, modern tech stacks, growth paths for junior and senior software developers.',
        'summary'          => 'Join a product-focused software development team in Ahmedabad working on SaaS products, internal tools and mobile apps for startups and businesses worldwide.',

        'faq_key'      => 'faq_careers_qalbit',
        'faq_title'    => 'Frequently asked questions about careers at QalbIT',
        'faq_subtitle' => 'These are the questions developers and candidates usually ask before applying to QalbIT – about roles, locations, interview process and growth.',
        'faq_bullets'  => [
            '✓ Which software developer roles (Laravel, PHP, Node.js, Flutter, React, QA) QalbIT typically hires for in Ahmedabad.',
            '✓ How we handle freshers vs. experienced developers, interview steps and expectations from both sides.',
            '✓ What to expect from our work culture, remote / hybrid options and how career growth is planned at QalbIT.',
        ],
    ],

    // -------------------------------------------------
    // Filters for the UI (used in Open Positions section)
    // -------------------------------------------------
    'filters' => [
        'teams' => [
            'engineering' => 'Engineering (Backend / Full-stack)',
            'frontend'    => 'Frontend (React / Next.js)',
            'mobile'      => 'Mobile (Flutter)',
            'qa'          => 'QA & Testing',
            'devops'      => 'DevOps / Infrastructure',
            'design'      => 'Product Design / UX',
            'pm'          => 'Product Management',
        ],

        'experience_levels' => [
            'intern_fresher' => 'Intern / Fresher',
            'one_two'        => '1–2 years',
            'one_three'      => '1–3 years',
            'two_four'       => '2–4 years',
            'four_plus'      => '4+ years',
        ],

        'locations' => [
            'ahmedabad_onsite' => 'Ahmedabad – Onsite',
            'ahmedabad_hybrid' => 'Ahmedabad – Hybrid',
            'remote_india'     => 'Remote – India',
        ],

        'employment_types' => [
            'full_time' => 'Full-time',
            'contract'  => 'Contract',
            'intern'    => 'Internship',
        ],
    ],

    // -------------------------------------------------
    // Roles (used for open positions + evergreen roles)
    // -------------------------------------------------
    'roles' => [
        'laravel_developer' => [
            'slug'            => 'laravel-developer',
            'title'           => 'Laravel Developer – 1–2 years – Ahmedabad',
            'team'            => 'engineering',
            'experience'      => 'one_two',
            'location'        => 'ahmedabad_onsite',
            'employment_type' => 'full_time',
            'mode'            => 'Onsite',
            'is_open'         => true,
            'tags'            => ['Laravel', 'PHP', 'MySQL', 'REST APIs'],
            'summary'         => 'Work on SaaS products and internal tools built on Laravel, MySQL and modern frontend stacks.',
            'highlights'      => [
                'Build and maintain Laravel-based backends for SaaS products and internal tools.',
                'Collaborate with frontend and mobile teams on API design and performance.',
                'Write clean, testable PHP code and participate in code reviews.',
            ],
            'apply_url'       => '/apply/?role=laravel-developer',
        ],
        'php_developer' => [
            'slug'            => 'php-developer',
            'title'           => 'PHP Developer (Core PHP / Laravel) – 1–3 years – Ahmedabad',
            'team'            => 'engineering',
            'experience'      => 'one_two',
            'location'        => 'ahmedabad_onsite',
            'employment_type' => 'full_time',
            'mode'            => 'Onsite',
            'is_open'         => false,
            'tags'            => ['Core PHP', 'Laravel', 'MySQL'],
            'summary'         => 'Help maintain and modernise existing PHP applications while contributing to new builds.',
            'highlights'      => [
                'Work across Core PHP and Laravel codebases for real-world client projects.',
                'Refactor legacy code into cleaner, testable modules.',
                'Collaborate with senior engineers on architecture decisions.',
            ],
            'apply_url'       => '/apply/?role=php-developer',
        ],
        'nodejs_developer' => [
            'slug'            => 'nodejs-developer',
            'title'           => 'Node.js / NestJS Backend Developer – 1–2 years – Ahmedabad',
            'team'            => 'engineering',
            'experience'      => 'one_two',
            'location'        => 'ahmedabad_onsite',
            'employment_type' => 'full_time',
            'mode'            => 'Onsite',
            'is_open'         => true,
            'tags'            => ['Node.js', 'NestJS', 'REST APIs', 'PostgreSQL'],
            'summary'         => 'Build APIs and backend services for high-traffic SaaS and platform projects.',
            'highlights'      => [
                'Design and implement APIs using Node.js / NestJS and relational databases.',
                'Optimize performance and reliability of backend services.',
                'Collaborate with frontend, mobile and DevOps teams on end-to-end delivery.',
            ],
            'apply_url'       => '/apply/?role=nodejs-developer',
        ],
        'frontend_developer' => [
            'slug'            => 'react-nextjs-developer',
            'title'           => 'React / Next.js Frontend Developer – 1–2 years – Ahmedabad',
            'team'            => 'frontend',
            'experience'      => 'one_two',
            'location'        => 'ahmedabad_onsite',
            'employment_type' => 'full_time',
            'mode'            => 'Onsite',
            'is_open'         => true,
            'tags'            => ['React', 'Next.js', 'TypeScript', 'Tailwind CSS'],
            'summary'         => 'Own modern frontend interfaces for dashboards, marketing sites and SaaS products.',
            'highlights'      => [
                'Build responsive frontends using React / Next.js and Tailwind CSS.',
                'Work closely with designers to implement polished UI/UX.',
                'Integrate with APIs and ensure good performance and accessibility.',
            ],
            'apply_url'       => '/apply/?role=react-nextjs-developer',
        ],
        'flutter_developer' => [
            'slug'            => 'flutter-developer',
            'title'           => 'Flutter Mobile App Developer – 1–3 years – Ahmedabad',
            'team'            => 'mobile',
            'experience'      => 'one_three',
            'location'        => 'ahmedabad_onsite',
            'employment_type' => 'full_time',
            'mode'            => 'Onsite',
            'is_open'         => true,
            'tags'            => ['Flutter', 'Dart', 'Android', 'iOS'],
            'summary'         => 'Develop cross-platform mobile apps for SaaS products and internal tools.',
            'highlights'      => [
                'Implement pixel-perfect Flutter screens from Figma designs.',
                'Integrate REST / GraphQL APIs and handle offline-first behaviour where needed.',
                'Collaborate with backend teams on mobile-first APIs and performance.',
            ],
            'apply_url'       => '/apply/?role=flutter-developer',
        ],
        'qa_engineer' => [
            'slug'            => 'qa-engineer',
            'title'           => 'QA Engineer – Manual / Automation – 2–4 years – Ahmedabad',
            'team'            => 'qa',
            'experience'      => 'two_four',
            'location'        => 'ahmedabad_onsite',
            'employment_type' => 'full_time',
            'mode'            => 'Onsite',
            'is_open'         => false,
            'tags'            => ['QA', 'Test cases', 'Automation'],
            'summary'         => 'Ensure the quality of web and mobile applications before they reach production.',
            'highlights'      => [
                'Create and execute test plans, cases and regression suites.',
                'Work with developers to reproduce, document and close bugs.',
                'Set up basic automation for critical paths where appropriate.',
            ],
            'apply_url'       => '/apply/?role=qa-engineer',
        ],
        'junior_software_engineer' => [
            'slug'            => 'junior-software-developer',
            'title'           => 'Junior Software Developer (Fresher) – Ahmedabad',
            'team'            => 'engineering',
            'experience'      => 'intern_fresher',
            'location'        => 'ahmedabad_onsite',
            'employment_type' => 'intern',
            'mode'            => 'Onsite',
            'is_open'         => false,
            'tags'            => ['Laravel', 'PHP', 'JavaScript'],
            'summary'         => 'A structured entry point into real client projects for recent graduates.',
            'highlights'      => [
                'Learn modern web development under mentorship from senior engineers.',
                'Work on internal tools and smaller features before handling full modules.',
                'Get exposure to code reviews, Git workflows and basic DevOps.',
            ],
            'apply_url'       => '/apply/?role=junior-software-developer',
        ],
    ],

    // -------------------------------------------------
    // Evergreen roles list (used for CR4 section)
    // -------------------------------------------------
    'evergreen_roles' => [
        [
            'key'         => 'laravel_developer',
            'label'       => 'Laravel Developer jobs',
            'description' => 'Backend Laravel developers working on SaaS products, internal tools and APIs.',
            'href'        => '/apply/?role=laravel-developer',
        ],
        [
            'key'         => 'php_developer',
            'label'       => 'PHP Developer jobs',
            'description' => 'Developers comfortable with both legacy PHP and modern Laravel projects.',
            'href'        => '/apply/?role=php-developer',
        ],
        [
            'key'         => 'nodejs_developer',
            'label'       => 'Node.js Developer jobs',
            'description' => 'Engineers building APIs and backend services in Node.js / NestJS.',
            'href'        => '/apply/?role=nodejs-developer',
        ],
        [
            'key'         => 'frontend_developer',
            'label'       => 'React Frontend Developer jobs',
            'description' => 'Frontend developers creating dashboards, portals and marketing sites.',
            'href'        => '/apply/?role=react-nextjs-developer',
        ],
        [
            'key'         => 'flutter_developer',
            'label'       => 'Flutter Mobile App Developer jobs',
            'description' => 'Mobile developers working on cross-platform Flutter apps.',
            'href'        => '/apply/?role=flutter-developer',
        ],
        [
            'key'         => 'qa_engineer',
            'label'       => 'QA Engineer jobs',
            'description' => 'QA engineers responsible for manual and automated testing.',
            'href'        => '/apply/?role=qa-engineer',
        ],
    ],

    // -------------------------------------------------
    // Page sections (copy only; UI will be wired via views)
    // -------------------------------------------------
    'sections' => [
        'hero' => [
            'id'       => 'cr1-hero',
            'eyebrow'  => 'Careers · Software developer jobs in Ahmedabad',
            'title'    => 'Build real products, not just tickets – join the QalbIT engineering team.',
            'subtitle' => 'We work with founders and teams across the world to ship SaaS products, core platforms and internal tools. If you enjoy Laravel, Node.js, React, Next.js or Flutter – and want to grow as a product-minded engineer – this is where you can do your best work.',
            'primary_cta' => [
                'label' => 'View open positions',
                'href'  => '#careers-openings',
            ],
            'secondary_cta' => [
                'label' => 'Share your resume',
                'href'  => '/career/apply/?ref=careers-hero',
            ],
        ],
        'why' => [
            'id'    => 'cr2-why',
            'title' => 'Why build your software career at QalbIT?',
            'intro' => 'We are a compact, product-focused team that cares about clean code, clear communication and long-term relationships with clients. You will see the full lifecycle of products, not just isolated tasks.',
            'bullets' => [
                'Work on SaaS products, booking platforms, internal tools and mobile apps instead of only short-term brochure sites.',
                'Collaborate directly with international founders and product teams from the US, Europe and the Middle East.',
                'Use modern tech stacks – Laravel, Node.js / NestJS, React, Next.js, Flutter, Tailwind CSS and modern DevOps tooling.',
                'Stay close to the product – we encourage engineers to understand the business context and contribute ideas.',
                'Grow from junior to senior roles with mentoring, code reviews and clear expectations for each level.',
            ],
        ],
        'open_positions' => [
            'id'    => 'cr3-open-positions',
            'title' => 'Open positions at QalbIT',
            'intro' => 'These are the roles we are actively hiring for right now. Use the filters to see positions by team, experience level or location. If you do not see an exact match, you can still share your profile – we often open new roles for the right fit.',
        ],
        'evergreen_roles' => [
            'id'    => 'cr4-evergreen-roles',
            'title' => 'Developer roles we frequently hire for',
            'intro' => 'Even if a role is not listed as open today, we regularly hire for these positions in Ahmedabad and remote. You can explore these paths and send us your profile for future opportunities.',
        ],
        'growth' => [
            'id'    => 'cr5-growth',
            'title' => 'How your career grows at QalbIT',
            'intro' => 'We want developers to stay and grow with us. That means clear expectations, regular feedback and opportunities to move from implementation to ownership.',
            'tracks' => [
                [
                    'name'        => 'Backend / Full-stack track',
                    'description' => 'Start as a Junior Laravel / Node.js Developer, grow into a Senior Engineer and eventually lead projects as a Technical Lead or Architect.',
                ],
                [
                    'name'        => 'Frontend track',
                    'description' => 'Move from implementing UI components in React / Next.js to owning entire frontends, design systems and performance budgets.',
                ],
                [
                    'name'        => 'Mobile track',
                    'description' => 'Begin with single-screen Flutter features, then own app modules and later drive end-to-end mobile product delivery.',
                ],
                [
                    'name'        => 'Leadership & product track',
                    'description' => 'Engineers who enjoy ownership can move into roles that combine technical leadership with product planning and client communication.',
                ],
            ],
        ],
        'benefits' => [
            'id'    => 'cr6-benefits',
            'title' => 'Benefits & how we work',
            'intro' => 'We try to balance challenging work with a healthy, transparent environment where you can do deep work and still have a life outside the office.',
            'work_style' => [
                'Small, focused teams per project with direct access to decision makers.',
                'Modern tooling – Git-based workflows, CI/CD, code review culture.',
                'Hybrid options for some roles after an initial onboarding period.',
                'Realistic commitments to clients – we avoid constant “crunch mode”.',
            ],
            'benefits_list' => [
                'Competitive salary with performance-based increments.',
                'Paid leave, festival holidays and occasional team outings.',
                'Learning budget for courses, certifications and conferences.',
                'Opportunities to speak, write or represent QalbIT in community events.',
            ],
        ],
        'life' => [
            'id'    => 'cr7-life',
            'title' => 'Life at QalbIT',
            'intro' => 'We are a small team, so every person has visible impact. We celebrate launches, share learnings and encourage people to experiment.',
            'highlights' => [
                'Regular knowledge-sharing sessions on architecture, testing and performance.',
                'Team celebrations around successful launches and project milestones.',
                'An environment where asking questions and proposing improvements is encouraged.',
            ],
        ],
        'process' => [
            'id'    => 'cr8-process',
            'title' => 'Our hiring process',
            'intro' => 'We keep the hiring process transparent and respectful of your time. You will always know which stage you are in and what to expect next.',
            'steps' => [
                [
                    'step'        => '01',
                    'name'        => 'Share your profile',
                    'description' => 'Submit your CV, portfolio or GitHub profile with a short note about the roles and tech stacks you are interested in.',
                ],
                [
                    'step'        => '02',
                    'name'        => 'Screening & intro call',
                    'description' => 'If there is a potential match, our team will schedule a short call to understand your experience, goals and expectations.',
                ],
                [
                    'step'        => '03',
                    'name'        => 'Technical interview / assignment',
                    'description' => 'Depending on the role, we will either review your past work, pair on a small problem or share a short take-home assignment.',
                ],
                [
                    'step'        => '04',
                    'name'        => 'Culture & fit discussion',
                    'description' => 'You meet more of the team to understand how we work, our values and what a typical week looks like in your role.',
                ],
                [
                    'step'        => '05',
                    'name'        => 'Offer & onboarding',
                    'description' => 'If both sides feel it is a fit, we share a detailed offer and an onboarding plan so your first weeks are smooth and structured.',
                ],
            ],
        ],
        'faq' => [
            'id'    => 'cr9-faq',
            'title' => 'Frequently asked questions',
        ],
        'cta' => [
            'id'      => 'cr10-cta',
            'eyebrow' => 'Not seeing the exact role you are looking for?',
            'title'   => 'Send us your profile for future software developer roles at QalbIT.',
            'body'    => "Tell us about your experience with Laravel, PHP, Node.js, React, Next.js, Flutter or QA – plus the kind of work you would like to do. We will review your profile and reach out when there's a strong match.",
            'primary_label' => 'Share your resume',
            'primary_url'   => '/apply/',
            'secondary_label' => 'View open positions again',
            'secondary_url'   => '#cr3-open-positions',
            'meta'            => 'We usually review new applications within 3–5 working days.',
        ],
    ],
];
