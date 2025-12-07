<?php

return [
    'snappystats' => [
        'slug'        => '/case-studies/snappystats/',
        'name'        => 'Snappy Stats – Shooting Academy Scheduling App',
        'h1'          => 'Snappy Stats – Scheduling Management Web Application (Case Study)',
        'enabled'     => true,
        'order'       => 10,

        'meta_title'       => 'Snappy Stats – Shooting Academy Scheduling Web App Case Study | QalbIT',
        'meta_description' => 'How QalbIT designed and built Snappy Stats, a custom Laravel-based scheduling management web application that eliminated double bookings, improved staff utilisation and gave a shooting academy real-time visibility into classes and events.',

        'summary'  => 'How we helped a growing shooting academy replace spreadsheets with a custom scheduling web app that centralises bookings, prevents double scheduling and gives real-time visibility into classes and events.',

        'client'   => 'Snappy Stats',
        'industry' => 'Sports / Training & Education',
        'location' => 'Europe (Remote collaboration)',

        'banner'    => '/images/case-studies/snappystat-webapp.png',
        'bannerAlt' => 'Snappy Stats shooting events scheduling and management dashboard UI',
        'logo'      => '/images/case-studies/clients/snappy.png',
        'logoAlt'   => 'Snappy Stats application logo',

        'services' => [
            'Custom Software Development',
            'Start-up MVP',
            'API Development',
            'Product UX & UI Design',
        ],

        'tech_stack' => [
            'Laravel / PHP',
            'MySQL',
            'REST APIs',
            'Responsive Web UI',
            'Role-based Access Control',
        ],

        'seo' => [
            'primary_keyword'   => 'scheduling management web application case study',
            'secondary_keywords'=> [
                'shooting academy scheduling software',
                'sports academy booking platform',
                'Laravel scheduling web app',
                'custom class management system case study',
            ],
            'canonical'         => 'https://www.qalbit.com/case-studies/snappystats/',
        ],

        'sections' => [
            'hero' => [
                'id'       => 'cs1-hero',
                'eyebrow'  => 'Case Study · Sports & Training',
                'title'    => 'Snappy Stats – <span class="text-gradient-brand-animated">Scheduling management web app</span> for a growing shooting academy',
                'subtitle' => 'Replacing spreadsheets and manual coordination with a centralised, real-time scheduling platform that keeps classes, coaches and ranges perfectly in sync.',
                'primary_cta' => [
                    'label' => 'Discuss a similar project',
                    'href'  => '/contact-us/?topic=cs-snappy-stats',
                ],
                'secondary_cta' => [
                    'label' => 'Book a quick discovery call',
                    'href'  => 'https://calendly.com/abidhusain-qalbit/discuss-project',
                ],
                'snapshot_cards' => [
                    [
                        'label' => 'Industry',
                        'value' => 'Shooting academy · Sports training',
                    ],
                    [
                        'label' => 'Region',
                        'value' => 'Europe (remote delivery)',
                    ],
                    [
                        'label' => 'Platform',
                        'value' => 'Custom Laravel web application',
                    ],
                    [
                        'label' => 'Engagement',
                        'value' => 'Discovery → MVP → Iterative enhancements',
                    ],
                    [
                        'label' => 'Key outcome',
                        'value' => 'Single source of truth for schedules & bookings',
                    ],
                ],
                'hero_media' => [
                    'type' => 'image',
                    'src'  => '/images/case-studies/snappystat-webapp.png',
                    'alt'  => 'Snappy Stats scheduling board with classes, coaches and lanes',
                ],
            ],
            'about' => [
                'id'    => 'cs2-about',
                'title' => 'About the client',
                'intro' => 'The client runs a fast-growing shooting academy offering safety courses, training sessions and events for newcomers and experienced shooters. As bookings increased and new formats were introduced, managing daily schedules using spreadsheets and email threads became risky and time-consuming.',
                'client_story' => 'Multiple instructors, multiple ranges and hundreds of students every month meant the team needed a reliable way to coordinate classes, lanes and equipment. They wanted a solution that would work in multiple languages, respect strict safety rules and still be simple enough for non-technical staff to use every day.',
                'at_a_glance_title' => 'Client at a glance',
                'at_a_glance' => [
                    ['label' => 'Business type',      'value' => 'Shooting academy & training centre'],
                    ['label' => 'Team size',         'value' => '10–20 instructors & admins'],
                    ['label' => 'Bookings volume',   'value' => 'Hundreds of sessions per month'],
                    ['label' => 'Previous tools',    'value' => 'Spreadsheets, email, phone calls'],
                    ['label' => 'Engagement length', 'value' => 'Initial MVP in ~12 weeks + iterations'],
                ],
            ],
            'challenge' => [
                'id'    => 'cs3-challenge',
                'title' => 'The challenge',
                'before_title' => 'Before Snappy Stats',
                'before_story' => 'Before the custom web application, the academy relied on spreadsheets and scattered notes to manage daily schedules. As the business grew, admins were constantly firefighting: checking availability, resolving double bookings and manually notifying instructors and students.',
                'bullets_title' => 'Key challenges we uncovered',
                'challenges' => [
                    'Manual scheduling across spreadsheets led to occasional double bookings of lanes, coaches and classrooms.',
                    'Limited visibility into upcoming capacity – admins could not see at a glance which slots were over- or under-utilised.',
                    'No single source of truth; information was spread across emails, chat messages and printed sheets at the range.',
                    'Difficulty accommodating last-minute changes such as weather issues, equipment maintenance or instructor swaps.',
                    'Lack of structured reports on bookings, cancellations and revenue per class type or instructor.',
                    'Multi-language requirements made communication harder, increasing the risk of misalignment between teams.',
                    'Scaling the academy to new locations or additional ranges would have amplified all of these problems.',
                ],
            ],
            'goals' => [
                'id'    => 'cs4-goals',
                'title' => 'Project goals & success criteria',
                'business_goals_title' => 'Business goals',
                'business_goals' => [
                    'Eliminate double bookings and scheduling conflicts for lanes, instructors and classes.',
                    'Give admins real-time visibility into today’s schedule and upcoming weeks.',
                    'Improve utilisation of instructors and ranges to increase revenue per available slot.',
                    'Reduce time spent on manual coordination and status updates.',
                ],
                'product_goals_title' => 'Product & technical goals',
                'product_goals' => [
                    'Design an intuitive scheduling interface that non-technical staff can learn in a single session.',
                    'Implement a robust, role-based access model for admins, instructors and support staff.',
                    'Support multiple languages and flexible event types without changing core code.',
                    'Build on a scalable Laravel architecture with clean APIs for future mobile apps or integrations.',
                ],
                'note' => 'We agreed on a phased rollout: launch a focused MVP for the primary range, validate the flows with real staff and then extend the system to new use cases and reporting needs.',
            ],
            'solution' => [
                'id'    => 'cs5-solution',
                'title' => 'Our solution',
                'intro' => 'QalbIT partnered with the academy to design and deliver Snappy Stats – a custom scheduling management web application built specifically for how shooting ranges operate.',
                'body'  => 'We started with collaborative discovery workshops, mapping real-world scenarios such as safety courses, private sessions and group events. From these, we designed a central schedule board with role-based views, streamlined booking flows and automated conflict checks. The application is built on Laravel with a modular architecture, making it easy to add new event types, locations and reporting modules over time.',
                'highlight_strip' => [
                    'End-to-end product design, frontend and backend engineering.',
                    'Laravel + MySQL foundation with clean, documented REST APIs.',
                    'Responsive, browser-based UI so staff can manage schedules from desktop or tablet.',
                ],
            ],
            'features' => [
                'id'    => 'cs6-features',
                'title' => 'Key product features & UX highlights',
                'subtitle' => 'Everything the academy team needs to keep classes, lanes and instructors perfectly aligned – in one place.',
                'items' => [
                    [
                        'name' => 'Central schedule board',
                        'description' => 'A calendar-style board showing all classes, lanes and instructors, with filters by date, event type and range.',
                    ],
                    [
                        'name' => 'Role-based access & permissions',
                        'description' => 'Separate views for admins, instructors and support staff with permissions aligned to safety and operational policies.',
                    ],
                    [
                        'name' => 'Smart conflict detection',
                        'description' => 'Automatic checks to prevent double booking of lanes, instructors or equipment when creating or editing events.',
                    ],
                    [
                        'name' => 'Member & booking management',
                        'description' => 'Simple flows to register participants, capture key details and track attendance across sessions.',
                    ],
                    [
                        'name' => 'Reusable event templates',
                        'description' => 'Pre-defined templates for popular course types, making it faster to schedule recurring classes and events.',
                    ],
                    [
                        'name' => 'Reporting & insights',
                        'description' => 'Overview reports for bookings, cancellations and utilisation, giving management better data for planning.',
                    ],
                    [
                        'name' => 'Multi-language support',
                        'description' => 'Configurable labels and content so the system can support staff in multiple languages as the academy grows.',
                    ],
                    [
                        'name' => 'Responsive UX',
                        'description' => 'Optimised layouts for desktop and tablet, ensuring staff can manage schedules from the office or directly on the range.',
                    ],
                ],
                'screenshot' => [
                    'src' => '/images/case-studies/snappy-casestudy-page.png',
                    'alt' => 'Snappy Stats schedule board showing classes and instructors over the week',
                ],
            ],
            'stack' => [
                'id'    => 'cs7-stack',
                'title' => 'Architecture & technology stack',
                'backend_title' => 'Backend & infrastructure',
                'backend' => [
                    'Laravel / PHP application layer following modular architecture.',
                    'MySQL database with well-indexed tables for schedules, resources and activity logs.',
                    'REST APIs prepared for future integrations or mobile apps.',
                    'Role-based access control and audit trails for safety and compliance.',
                    'Environment-based configuration for staging vs. production deployments.',
                ],
                'frontend_title' => 'Frontend & UX',
                'frontend' => [
                    'Responsive web UI, implemented with Tailwind CSS utility-first styling.',
                    'Clear information hierarchy for schedules, resources and filters.',
                    'Reusable components for cards, timelines, tables and forms.',
                    'Accessibility-aware design with high contrast and keyboard-friendly flows.',
                ],
                'tech_pills' => [
                    'Laravel',
                    'PHP 8',
                    'MySQL',
                    'REST APIs',
                    'Tailwind CSS',
                    'Git-based workflow',
                ],
            ],
            'process' => [
                'id'    => 'cs8-process',
                'title' => 'Delivery process & collaboration',
                'steps' => [
                    [
                        'step'        => '01',
                        'name'        => 'Discovery & requirements',
                        'duration'    => '2 weeks',
                        'description' => 'Stakeholder workshops, review of existing spreadsheets and on-range processes, and definition of core scheduling flows.',
                    ],
                    [
                        'step'        => '02',
                        'name'        => 'UX flows & interface design',
                        'duration'    => '2–3 weeks',
                        'description' => 'User journeys for admins and instructors, wireframes for the schedule board and design of key screens using the QalbIT design system.',
                    ],
                    [
                        'step'        => '03',
                        'name'        => 'MVP development',
                        'duration'    => '5–6 weeks',
                        'description' => 'Incremental backend and frontend delivery with regular demos, feedback loops and environment-ready deployments.',
                    ],
                    [
                        'step'        => '04',
                        'name'        => 'Pilot launch',
                        'duration'    => '2 weeks',
                        'description' => 'Rollout to a subset of classes and instructors, close monitoring of edge cases and improvements to conflict resolution logic.',
                    ],
                    [
                        'step'        => '05',
                        'name'        => 'Rollout & ongoing support',
                        'duration'    => 'Continuous',
                        'description' => 'Rollout to all lanes and classes, plus follow-up iterations on reports, templates and multi-language support.',
                    ],
                ],
                'engagement_model' => [
                    'label' => 'Engagement model used',
                    'description' => 'We worked as an extended product team under a Start-up MVP engagement, then shifted into a lightweight continuous improvement model.',
                    'links' => [
                        [
                            'label' => 'Start-up MVP approach',
                            'href'  => '/start-up-mvp/',
                        ],
                        [
                            'label' => 'Engagement models at QalbIT',
                            'href'  => '/engagement-model/',
                        ],
                    ],
                ],
            ],
            'results' => [
                'id'    => 'cs9-results',
                'title' => 'Results & impact',
                'subtitle' => 'From reactive firefighting to proactive, data-informed scheduling.',
                'metrics' => [
                    [
                        'label' => 'Reduction in scheduling conflicts',
                        'value' => '80% fewer double bookings',
                        'note'  => 'Measured after the first three months of using the new scheduling board.',
                    ],
                    [
                        'label' => 'Admin time saved',
                        'value' => '3–4 hours saved per week',
                        'note'  => 'Less time spent manually coordinating changes and confirming availability.',
                    ],
                    [
                        'label' => 'Schedule visibility',
                        'value' => '100% centralised view',
                        'note'  => 'All upcoming sessions, lanes and instructors managed from one system.',
                    ],
                    [
                        'label' => 'Foundation for growth',
                        'value' => 'Ready for multi-location rollout',
                        'note'  => 'Architecture prepared for new ranges and additional reporting modules.',
                    ],
                ],
                'narrative' => 'By replacing spreadsheets with a purpose-built Laravel web application, the academy team gained control over their daily operations. Conflicts dropped, staff had a clear view of their day and management finally had reliable data to plan growth. The same foundation can now support new locations, formats and integrations as the business scales.',
                'testimonial' => [
                    'quote' => '“With Snappy Stats, our team finally has one reliable place to see what is happening today and in the weeks ahead. We spend less time fixing mistakes and more time focusing on safe, high-quality training for our members.”',
                    'name'  => 'Operations Manager',
                    'role'  => 'Shooting Academy',
                ],
                'inline_cta' => [
                    'text' => 'Planning to modernise scheduling for your academy or training business?',
                    'link_label' => 'Talk to QalbIT about a custom solution',
                    'href' => '/contact-us/?topic=cs-snappy-stats-results',
                ],
            ],
            'related' => [
                'id'    => 'cs10-related',
                'title' => 'Related case studies & services',
                'subtitle' => 'Explore more custom software case studies and the services we used on this project.',
                'case_studies' => [
                    [
                        'slug'    => '/case-studies/plugin/',
                        'name'    => 'Plugin – Tennis club management web app',
                        'summary' => 'Custom club management platform that centralises courts, bookings, memberships and payments for a Swiss tennis club.',
                    ],
                    [
                        'slug'    => '/case-studies/bloomford/',
                        'name'    => 'Bloomford – Hiring portal for HR professionals',
                        'summary' => 'Recruitment & talent portal that gives HR teams a single workspace for employers, vacancies and candidates.',
                    ],
                    [
                        'slug'    => '/case-studies/hellory/',
                        'name'    => 'Hellory – Smart reminder app for busy lives',
                        'summary' => 'Cross-platform mobile reminder app with recurring schedules, templates and a robust notification pipeline.',
                    ],
                ],
                'services_used_title' => 'Services used in this project',
                'services_used' => [
                    [
                        'label' => 'Custom Software Development',
                        'href'  => '/services/custom-software-development/',
                    ],
                    [
                        'label' => 'Start-up MVP',
                        'href'  => '/start-up-mvp/',
                    ],
                    [
                        'label' => 'API Development',
                        'href'  => '/services/api-development/',
                    ],
                ],
            ],
            'final_cta' => [
                'id'    => 'cs10-final-cta',
                'eyebrow' => 'Have a similar challenge?',
                'title'   => 'Let’s design a scheduling platform that fits your operations – not the other way around.',
                'text'    => 'Whether you run a sports academy, training centre or operations-heavy business, QalbIT can help you turn manual coordination into a reliable, scalable scheduling platform. We combine product thinking, Laravel expertise and UX design to ship production-ready software, not just prototypes.',
                'primary_cta' => [
                    'label' => 'Book a free consultation',
                    'href'  => '/contact-us/?topic=cta-snappy-stats',
                ],
                'secondary_cta' => [
                    'label' => 'Book a quick discovery call',
                    'href'  => 'https://calendly.com/abidhusain-qalbit/discuss-project',
                ],
            ],
        ],
    ],

    'bloomford' => [
        'slug'        => '/case-studies/bloomford/',
        'name'        => 'Bloomford – Hiring Portal for HR Professionals',
        'h1'          => 'Bloomford – Hiring Portal & Candidate Management Platform (Case Study)',
        'enabled'     => true,
        'order'       => 20,

        'meta_title'       => 'Bloomford – Hiring Portal for HR Professionals | Recruitment Platform Case Study',
        'meta_description' => 'How QalbIT designed and built Bloomford, a custom recruitment platform and hiring portal for HR professionals in Belgium – centralising employers, vacancies and candidates with CV parsing, search and modern HR workflows.',

        'summary'  => 'How we helped Bloomford launch a modern hiring portal for HR professionals – connecting employers and candidates, streamlining vacancy management and turning scattered CVs into one searchable, structured talent pipeline.',

        'client'   => 'Bloomford',
        'industry' => 'Recruitment / HR Tech',
        'location' => 'Belgium (Remote-first collaboration)',

        'banner'    => '/images/case-studies/bloomford-webapp.png',
        'bannerAlt' => 'Bloomford hiring portal UI with job listings and candidate profiles',
        'logo'      => '/images/case-studies/clients/bloomford.png',
        'logoAlt'   => 'Bloomford logo',

        'services' => [
            'Custom Software Development',
            'Start-up MVP',
            'Product UX & UI Design',
            'API Development',
            'Third-party Integrations',
        ],

        'tech_stack' => [
            'PHP (modular MVC)',
            'MySQL',
            'REST / JSON APIs',
            'HTML5 & CSS3',
            'Bootstrap',
            'jQuery',
            'Resume / CV parsing library',
            'Responsive Web UI',
        ],

        'seo' => [
            'primary_keyword'    => 'hiring portal for HR professionals case study',
            'secondary_keywords' => [
                'recruitment platform case study',
                'HR tech candidate management portal',
                'custom applicant tracking system case study',
                'Laravel / PHP recruitment web app',
                'employer and candidate management software',
            ],
            'canonical'          => 'https://www.qalbit.com/case-studies/bloomford/',
        ],

        'sections' => [
            'hero' => [
                'id'       => 'cs1-hero',
                'eyebrow'  => 'Case Study · Recruitment & HR Tech',
                'title'    => 'Bloomford – <span class="text-gradient-brand-animated">Hiring portal for HR professionals</span> connecting talent and business',
                'subtitle' => 'A custom-built recruitment platform that centralises employers, vacancies and candidates, makes CVs searchable and gives HR professionals a single source of truth for every hiring process.',
                'primary_cta' => [
                    'label' => 'Discuss a similar HR tech project',
                    'href'  => '/contact-us/?topic=cs-bloomford',
                ],
                'secondary_cta' => [
                    'label' => 'Book a quick discovery call',
                    'href'  => 'https://calendly.com/abidhusain-qalbit/discuss-project',
                ],
                'snapshot_cards' => [
                    [
                        'label' => 'Industry',
                        'value' => 'Recruitment · HR Tech · Talent marketplace',
                    ],
                    [
                        'label' => 'Region',
                        'value' => 'Belgium (serving employers & candidates)',
                    ],
                    [
                        'label' => 'Platform',
                        'value' => 'Custom PHP/MySQL hiring portal',
                    ],
                    [
                        'label' => 'Engagement',
                        'value' => 'Discovery → MVP → Production rollout',
                    ],
                    [
                        'label' => 'Key outcome',
                        'value' => 'Centralised employer, vacancy and candidate management',
                    ],
                ],
                'hero_media' => [
                    'type' => 'image',
                    'src'  => '/images/case-studies/bloomford-webapp.png',
                    'alt'  => 'Bloomford hiring portal home with featured vacancies and candidate actions',
                ],
            ],

            'about' => [
                'id'    => 'cs2-about',
                'title' => 'About the client',
                'intro' => 'Bloomford is a recruitment brand focused on matching ambitious talent with the right business environment. Working primarily with HR professionals, they help organisations in Belgium find, assess and hire candidates across multiple roles and seniority levels.',
                'client_story' => 'Before launching the Bloomford platform, the team worked through traditional channels: email, spreadsheets, off-the-shelf job boards and manual follow-ups. They wanted to offer HR teams something better – a hiring portal built around recruiters’ workflows, where employers, vacancies and candidates live in one structured workspace instead of scattered across tools.',
                'at_a_glance_title' => 'Client at a glance',
                'at_a_glance' => [
                    ['label' => 'Business type',      'value' => 'Recruitment brand & HR consultancy'],
                    ['label' => 'Primary users',      'value' => 'HR professionals, hiring managers and recruiters'],
                    ['label' => 'Focus region',       'value' => 'Belgium & neighbouring markets'],
                    ['label' => 'Previous tools',     'value' => 'Job boards, email inboxes, spreadsheets and shared drives'],
                    ['label' => 'Engagement length',  'value' => 'Foundational MVP in ~12 weeks, followed by enhancements'],
                ],
            ],

            'challenge' => [
                'id'    => 'cs3-challenge',
                'title' => 'The challenge',
                'before_title' => 'Before Bloomford',
                'before_story' => 'The recruitment team juggled multiple channels – job boards, email, LinkedIn messages and offline referrals. CVs arrived as attachments, got stored in various folders and were hard to search. Employers had little visibility on the status of their vacancies, and candidates did not have a clear, branded portal to follow their applications.',
                'bullets_title' => 'Key challenges we uncovered',
                'challenges' => [
                    'Scattered candidate data across inboxes and spreadsheets, making it difficult to build a long-term talent pool.',
                    'No self-service portal for HR professionals and employers to post vacancies and track their hiring pipeline.',
                    'Manual CV screening and copying data into spreadsheets, consuming time that could be spent with candidates.',
                    'Limited visibility for employers into which profiles were shortlisted, interviewed or rejected.',
                    'No single, branded candidate experience – each hiring process felt different and disconnected.',
                    'Difficult to report on pipeline health (per role, per employer, per recruiter) and improve the hiring process.',
                    'Scaling to more employers and roles would multiply the manual workload and risk of missed candidates.',
                ],
            ],

            'goals' => [
                'id'    => 'cs4-goals',
                'title' => 'Project goals & success criteria',
                'business_goals_title' => 'Business goals',
                'business_goals' => [
                    'Launch a hiring portal that HR professionals trust as their daily workspace for vacancies and candidates.',
                    'Shorten time-to-shortlist by making candidate search, filters and matching much faster.',
                    'Give employers a clear view of their open positions, pipeline stages and shortlisted candidates.',
                    'Create a consistent, branded experience for candidates – from application to placement.',
                ],
                'product_goals_title' => 'Product & technical goals',
                'product_goals' => [
                    'Design role-based dashboards for admins, recruiters, employers and candidates.',
                    'Implement structured candidate profiles with CV parsing to reduce manual data entry.',
                    'Support multi-language vacancies and content for Belgium’s multilingual market.',
                    'Build a modular PHP/MySQL platform with APIs ready for future ATS or HRIS integrations.',
                ],
                'note' => 'We agreed on a phased rollout: first launch an MVP focused on core employer and candidate flows, then extend the platform with advanced search, reporting and integrations once real-world usage validated the approach.',
            ],

            'solution' => [
                'id'    => 'cs5-solution',
                'title' => 'Our solution',
                'intro' => 'QalbIT partnered with Bloomford to design and build a custom hiring portal that acts as a lightweight, ATS-style platform for HR professionals.',
                'body'  => 'We started by mapping the full hiring journey for each user type: recruiters, employers and candidates. From there, we defined the information architecture and UX for dashboards, vacancy management and candidate profiles. The resulting platform combines structured data models, CV parsing and intuitive search so recruiters can move from CV intake to shortlist in a fraction of the time. Built on a PHP/MySQL stack with REST APIs, the application is ready for future integrations with external job boards, HR suites and analytics tools.',
                'highlight_strip' => [
                    'End-to-end product collaboration – from discovery and UX to backend, frontend and rollout.',
                    'Custom PHP/MySQL architecture with REST APIs and clear separation of employer, candidate and admin modules.',
                    'Responsive web UI aligned with Bloomford’s brand, optimised for HR professionals working on laptops and tablets.',
                ],
            ],

            'features' => [
                'id'    => 'cs6-features',
                'title' => 'Key product features & UX highlights',
                'subtitle' => 'Everything HR teams need to centralise vacancies, candidates and hiring workflows in one recruitment platform.',
                'items' => [
                    [
                        'name' => 'Role-based dashboards',
                        'description' => 'Dedicated workspaces for recruiters, employers and candidates – each showing only the information and actions they need.',
                    ],
                    [
                        'name' => 'Vacancy management',
                        'description' => 'Create, publish and manage jobs with structured fields, multi-language support and visibility controls per employer.',
                    ],
                    [
                        'name' => 'Candidate profiles & CV parsing',
                        'description' => 'Convert uploaded CVs into structured profiles with experience, skills and education, reducing manual data entry.',
                    ],
                    [
                        'name' => 'Search & filters',
                        'description' => 'Fast search across the candidate pool with filters by location, skills, experience level and more.',
                    ],
                    [
                        'name' => 'Employer & company management',
                        'description' => 'Store employer details, contacts and past vacancies in one place, giving recruiters full context before every conversation.',
                    ],
                    [
                        'name' => 'Pipeline tracking',
                        'description' => 'Track candidates across stages – applied, shortlisted, interview, offer – with activity logs and status updates.',
                    ],
                    [
                        'name' => 'Notifications & communication',
                        'description' => 'Email notifications and on-platform updates to keep candidates, employers and recruiters aligned on next steps.',
                    ],
                    [
                        'name' => 'Reporting foundation',
                        'description' => 'Baseline reporting for open roles, pipeline stages and recruiter activity, ready to be extended with deeper analytics.',
                    ],
                ],
                'screenshot' => [
                    'src' => '/images/case-studies/bloomford-casestudy-page.png',
                    'alt' => 'Bloomford hiring portal showing recruiter dashboard and candidate list',
                ],
            ],

            'stack' => [
                'id'    => 'cs7-stack',
                'title' => 'Architecture & technology stack',
                'backend_title' => 'Backend & infrastructure',
                'backend' => [
                    'PHP-based modular application layer designed around employer, vacancy and candidate domains.',
                    'MySQL database with normalised schemas for employers, vacancies, candidates and activity logs.',
                    'REST / JSON APIs to power portal flows and support potential integrations with ATS, HRIS or job boards.',
                    'Security best practices including role-based access, input sanitisation and encrypted storage of sensitive data.',
                    'Configurable environments for staging and production with automated deployment scripts.',
                ],
                'frontend_title' => 'Frontend & UX',
                'frontend' => [
                    'Responsive HTML5 templates styled with Bootstrap and custom utility classes.',
                    'Clear typography and information hierarchy to surface key recruitment signals quickly.',
                    'Reusable UI components for cards, tables, filters and forms to keep the experience consistent.',
                    'Progressive enhancement approach so core workflows remain usable on slower connections.',
                ],
                'tech_pills' => [
                    'PHP',
                    'MySQL',
                    'REST APIs',
                    'Bootstrap',
                    'jQuery',
                    'HTML5 & CSS3',
                    'Resume parsing integration',
                    'Git-based workflow',
                ],
            ],

            'process' => [
                'id'    => 'cs8-process',
                'title' => 'Delivery process & collaboration',
                'steps' => [
                    [
                        'step'        => '01',
                        'name'        => 'Discovery & hiring workflow mapping',
                        'duration'    => '2 weeks',
                        'description' => 'Workshops with the Bloomford team to map recruiter, employer and candidate journeys and define the core scope for the first release.',
                    ],
                    [
                        'step'        => '02',
                        'name'        => 'UX flows & interface design',
                        'duration'    => '2–3 weeks',
                        'description' => 'Design of dashboards, vacancy forms, candidate profiles and search results aligned with HR professionals’ daily tasks.',
                    ],
                    [
                        'step'        => '03',
                        'name'        => 'MVP implementation',
                        'duration'    => '5–6 weeks',
                        'description' => 'Backend, frontend and integration work delivered in sprints with regular demos, feedback and refinements.',
                    ],
                    [
                        'step'        => '04',
                        'name'        => 'Pilot with selected employers',
                        'duration'    => '2 weeks',
                        'description' => 'Launch with a subset of employers and roles, capturing real feedback on matching quality, performance and usability.',
                    ],
                    [
                        'step'        => '05',
                        'name'        => 'Rollout & continuous improvements',
                        'duration'    => 'Ongoing',
                        'description' => 'Extension of the platform with additional reports, filters and integrations based on live usage.',
                    ],
                ],
                'engagement_model' => [
                    'label' => 'Engagement model used',
                    'description' => 'We operated as Bloomford’s product and engineering partner under a Start-up MVP engagement, then moved into a lean continuous improvement model as adoption grew.',
                    'links' => [
                        [
                            'label' => 'Start-up MVP approach',
                            'href'  => '/start-up-mvp/',
                        ],
                        [
                            'label' => 'Engagement models at QalbIT',
                            'href'  => '/engagement-model/',
                        ],
                    ],
                ],
            ],

            'results' => [
                'id'    => 'cs9-results',
                'title' => 'Results & impact',
                'subtitle' => 'From scattered CVs to a structured, searchable talent pool for HR professionals.',
                'metrics' => [
                    [
                        'label' => 'Time-to-shortlist',
                        'value' => 'Faster candidate shortlisting',
                        'note'  => 'Recruiters can move from intake to a shortlist in significantly less time thanks to structured profiles and search.',
                    ],
                    [
                        'label' => 'Data centralisation',
                        'value' => 'Single source of truth',
                        'note'  => 'Employers, vacancies and candidates now live in one platform instead of multiple tools and folders.',
                    ],
                    [
                        'label' => 'Recruiter productivity',
                        'value' => 'More time with candidates',
                        'note'  => 'Less manual copying and tracking means more capacity for interviews and relationship-building.',
                    ],
                    [
                        'label' => 'Foundation for HR tech growth',
                        'value' => 'Platform ready for new features',
                        'note'  => 'The architecture can support deeper analytics, integrations and white-labelled employer portals.',
                    ],
                ],
                'narrative' => 'Launching the Bloomford hiring portal turned a fragmented recruitment process into a structured, data-informed workflow. HR professionals gained a workspace where vacancies, candidates and pipelines are always up to date, while employers benefit from clearer visibility and faster shortlists. With the core platform in place, Bloomford can now evolve towards a richer HR tech offering without re-architecting from scratch.',
                'testimonial' => [
                    'quote' => '“With the Bloomford portal, we finally have one place to manage all our vacancies and candidates. Recruiters spend less time digging through inboxes and more time speaking with the right people.”',
                    'name'  => 'Founder',
                    'role'  => 'Bloomford',
                ],
                'inline_cta' => [
                    'text'       => 'Planning to launch or modernise a hiring portal, ATS or HR tech product?',
                    'link_label' => 'Talk to QalbIT about building your recruitment platform',
                    'href'       => '/contact-us/?topic=cs-bloomford-results',
                ],
            ],

            'related' => [
                'id'    => 'cs10-related',
                'title' => 'Related case studies & services',
                'subtitle' => 'Explore more custom software case studies and the services we typically combine for recruitment and operations platforms.',
                'case_studies' => [
                    [
                        'slug'    => '/case-studies/snappystats/',
                        'name'    => 'Snappy Stats – Scheduling management web app',
                        'summary' => 'Laravel-based scheduling platform that replaces spreadsheets with a centralised view of classes, lanes and coaches.',
                    ],
                    [
                        'slug'    => '/case-studies/plugin/',
                        'name'    => 'Plugin – Tennis club management web app',
                        'summary' => 'Tennis club operations platform covering court bookings, memberships, pricing rules and online payments.',
                    ],
                    [
                        'slug'    => '/case-studies/hellory/',
                        'name'    => 'Hellory – Smart reminder app for busy lives',
                        'summary' => 'Consumer productivity app that helps users manage recurring reminders and important life events on mobile.',
                    ],
                ],
                'services_used_title' => 'Services used in this project',
                'services_used' => [
                    [
                        'label' => 'Custom Software Development',
                        'href'  => '/services/custom-software-development/',
                    ],
                    [
                        'label' => 'Start-up MVP',
                        'href'  => '/start-up-mvp/',
                    ],
                    [
                        'label' => 'API Development',
                        'href'  => '/services/api-development/',
                    ],
                ],
            ],

            'final_cta' => [
                'id'      => 'cs10-final-cta',
                'eyebrow' => 'Have a similar HR or recruitment challenge?',
                'title'   => 'Let’s design a hiring portal or HR tech platform tailored to your workflows.',
                'text'    => 'Whether you are an agency, in-house HR team or a founder building a new HR tech product, QalbIT can help you move from scattered tools to a focused recruitment platform. We combine product thinking, UX and engineering to ship production-ready software that supports your hiring process from day one.',
                'primary_cta' => [
                    'label' => 'Book a free consultation',
                    'href'  => '/contact-us/?topic=cta-bloomford',
                ],
                'secondary_cta' => [
                    'label' => 'Book a quick discovery call',
                    'href'  => 'https://calendly.com/abidhusain-qalbit/discuss-project',
                ],
            ],
        ],
    ],

    'hellory' => [
        'slug'        => '/case-studies/hellory/',
        'name'        => 'Hellory – Smart Reminder App for Busy Lives',
        'h1'          => 'Hellory – Smart Reminder & Notification App (Case Study)',
        'enabled'     => true,
        'order'       => 40,

        'meta_title'       => 'Hellory – Smart Reminder App for Busy Lives | Mobile Reminder App Case Study',
        'meta_description' => 'How QalbIT helped design and build Hellory, a smart reminder app for busy lives – a cross-platform mobile reminder application with recurring reminders, custom templates and secure notifications, backed by a modern Node.js / MongoDB API.',

        'summary' => 'How we partnered with the Hellory team to build a smart reminder app for busy lives – combining recurring reminders, custom templates and secure messaging into one cross-platform mobile experience.',

        'client'   => 'Hellory',
        'industry' => 'Consumer Apps / Productivity',
        'location' => 'India (remote-first collaboration)',

        'banner'    => '/images/case-studies/hellory-reminder-app.png',
        'bannerAlt' => 'Hellory smart reminder mobile app screens for recurring reminders and notifications',
        'logo'      => '/images/case-studies/clients/hellory-reminder.png',
        'logoAlt'   => 'Hellory reminder app logo',

        'services' => [
            'Mobile App Development',
            'Custom Software Development',
            'API Development',
            'Product UX & UI Design',
            'Cloud & Backend Engineering',
        ],

        'tech_stack' => [
            'Flutter (Android & iOS)',
            'Node.js / Express backend',
            'MongoDB',
            'REST / JSON APIs',
            'Firebase Cloud Messaging (push notifications)',
            'Responsive marketing website',
        ],

        'seo' => [
            'primary_keyword'    => 'reminder app case study',
            'secondary_keywords' => [
                'hellory reminder app',
                'smart reminder app for busy lives',
                'mobile reminder app development',
                'Flutter reminder app case study',
                'custom reminder application for Android and iOS',
            ],
            'canonical'          => 'https://www.qalbit.com/case-studies/hellory-reminder-app/',
        ],

        'sections' => [
            'hero' => [
                'id'       => 'cs1-hero',
                'eyebrow'  => 'Case Study · Consumer Apps & Productivity',
                'title'    => 'Hellory – <span class="text-gradient-brand-animated">smart reminder app for busy lives</span> that keeps important moments on track',
                'subtitle' => 'A cross-platform reminder and notification app that helps users stay on top of bills, tasks, events and life moments – with recurring reminders, templates and secure, reliable delivery.',
                'primary_cta' => [
                    'label' => 'Discuss a similar mobile app project',
                    'href'  => '/contact-us/?topic=cs-hellory',
                ],
                'secondary_cta' => [
                    'label' => 'Book a quick discovery call',
                    'href'  => 'https://calendly.com/abidhusain-qalbit/discuss-project',
                ],
                'snapshot_cards' => [
                    [
                        'label' => 'Product type',
                        'value' => 'Smart reminder & notification app',
                    ],
                    [
                        'label' => 'Platforms',
                        'value' => 'Flutter mobile app (Android & iOS)',
                    ],
                    [
                        'label' => 'Region',
                        'value' => 'India (global consumer audience)',
                    ],
                    [
                        'label' => 'Engagement',
                        'value' => 'Concept → UX → Mobile app + API',
                    ],
                    [
                        'label' => 'Key outcome',
                        'value' => 'Unified reminder experience for busy users',
                    ],
                ],
                'hero_media' => [
                    'type' => 'image',
                    'src'  => '/images/case-studies/hellory-reminder-app.png',
                    'alt'  => 'Hellory smart reminder mobile app screens on multiple devices',
                ],
            ],

            'about' => [
                'id'    => 'cs2-about',
                'title' => 'About the client',
                'intro' => 'When the client approached us with the Hellory Reminder project, they had a clear vision: create a personal assistant that would help users stay on top of their busy lives by providing seamless, flexible reminders across channels.',
                'client_story' => 'The goal was to build an intelligent reminder application that went beyond one-off alarms. Hellory needed to handle recurring reminders, flexible schedules, and different categories such as bills, events, habits and to-dos. At the same time, the team wanted a delightful mobile experience that felt approachable and trustworthy, especially for users who rely on the app for important life events. QalbIT partnered with the founders to turn this vision into a production-ready cross-platform mobile app backed by a secure API.',
                'at_a_glance_title' => 'Client at a glance',
                'at_a_glance' => [
                    ['label' => 'Business type',      'value' => 'Consumer productivity startup'],
                    ['label' => 'Primary users',      'value' => 'Busy professionals & families managing recurring tasks'],
                    ['label' => 'Platforms',          'value' => 'Android & iOS mobile apps + marketing website'],
                    ['label' => 'Previous state',     'value' => 'Concept & early prototypes, no production app'],
                    ['label' => 'Engagement length',  'value' => 'MVP design & build in ~14 weeks followed by iterations'],
                ],
            ],

            'challenge' => [
                'id'    => 'cs3-challenge',
                'title' => 'The challenge',
                'before_title' => 'Before Hellory',
                'before_story' => 'Most users in the target audience juggled multiple reminder tools – phone alarms, simple to-do apps and ad-hoc notes. None of these provided a unified, context-aware reminder experience. The founders wanted Hellory to become a “single place to remember everything” without overwhelming users with complex settings.',
                'bullets_title' => 'Key challenges we uncovered',
                'challenges' => [
                    'Designing a reminder app that feels powerful yet simple enough for non-technical users to adopt quickly.',
                    'Supporting recurring reminders, flexible schedules and custom templates without creating a confusing UI.',
                    'Ensuring reminders are delivered reliably across time zones and device states, even if users are offline temporarily.',
                    'Handling sensitive personal data (bills, medicines, personal events) with strong privacy and security.',
                    'Providing a cross-platform experience that behaves consistently on both Android and iOS.',
                    'Creating a scalable backend that can support growing numbers of users and reminder events without performance issues.',
                    'Building a foundation that can later expand into richer automation, analytics and integrations.',
                ],
            ],

            'goals' => [
                'id'    => 'cs4-goals',
                'title' => 'Project goals & success criteria',
                'business_goals_title' => 'Business goals',
                'business_goals' => [
                    'Launch Hellory as a flagship consumer app that clearly communicates its “smart reminder for busy lives” positioning.',
                    'Win early adopters through a polished, reliable mobile experience that encourages daily use and positive reviews.',
                    'Create a foundation for future monetisation models such as premium templates, categories or shared reminder spaces.',
                    'Collect anonymised product analytics to inform future roadmap decisions.',
                ],
                'product_goals_title' => 'Product & technical goals',
                'product_goals' => [
                    'Design a reminder UX that makes recurring schedules and categories easy to set up and manage.',
                    'Implement a robust scheduling engine that can handle thousands of reminder events per user without conflicts.',
                    'Support cross-platform mobile delivery using Flutter, backed by a secure Node.js / MongoDB API.',
                    'Integrate push notifications via Firebase Cloud Messaging while keeping battery usage and data consumption low.',
                    'Build an admin console to manage categories, templates, marketing content and feature flags.',
                ],
                'note' => 'We aligned on an MVP scope that focused on core reminder workflows, then reserved more advanced automation and sharing features for later phases after the initial launch.',
            ],

            'solution' => [
                'id'    => 'cs5-solution',
                'title' => 'Our solution',
                'intro' => 'QalbIT designed and shipped Hellory as a cross-platform smart reminder app with a purpose-built scheduling engine and a clean, approachable mobile UX.',
                'body'  => 'We began with user journey mapping, identifying the most common reminder scenarios – paying bills, health check-ups, recurring events and personal habits. These flows informed the information architecture and onboarding experience. On the technical side, we implemented a Node.js / Express API with a MongoDB data model optimised for recurring events and notification queues. The Flutter app communicates with this API through secure REST endpoints, while Firebase Cloud Messaging delivers push notifications across Android and iOS. An internal admin panel allows the team to manage categories, featured templates and in-app content without shipping new builds.',
                'highlight_strip' => [
                    'End-to-end product collaboration from concept and UX to Flutter app, backend API and deployment.',
                    'Smart scheduling engine that handles recurring events, snoozes and time-zone variations.',
                    'Mobile app UX tuned for quick capture of reminders, with templates for common use cases like bills, renewals and appointments.',
                ],
            ],

            'features' => [
                'id'    => 'cs6-features',
                'title' => 'Key product features & UX highlights',
                'subtitle' => 'Everything users need to capture, organise and act on reminders – in one smart reminder app.',
                'items' => [
                    [
                        'name' => 'Quick reminder capture',
                        'description' => 'Create one-off or recurring reminders in a few taps with clear categories and contextual icons.',
                    ],
                    [
                        'name' => 'Recurring reminders & routines',
                        'description' => 'Support for daily, weekly, monthly and custom schedules so users can set and forget regular tasks.',
                    ],
                    [
                        'name' => 'Reminder templates',
                        'description' => 'Pre-built templates for bills, renewals, health check-ups and personal goals that reduce setup time.',
                    ],
                    [
                        'name' => 'Smart notifications & snooze',
                        'description' => 'Push notifications with quick actions to mark done, snooze or reschedule without opening the full app.',
                    ],
                    [
                        'name' => 'Category & tag system',
                        'description' => 'Colour-coded categories and tags so users can group reminders for work, home, finances, health and more.',
                    ],
                    [
                        'name' => 'Secure cloud sync',
                        'description' => 'User data stored securely in the cloud with device-level encryption and protected APIs.',
                    ],
                    [
                        'name' => 'In-app tips & empty states',
                        'description' => 'Guided content that helps new users understand how to get value from the app within the first session.',
                    ],
                    [
                        'name' => 'Marketing website',
                        'description' => 'A supporting marketing site for Hellory with product storytelling, screenshots and app-store links.',
                    ],
                ],
                'screenshot' => [
                    'src' => '/images/case-studies/hellory-casestudy-page.svg',
                    'alt' => 'Screens from the Hellory reminder app showing templates and recurring reminders',
                ],
            ],

            'stack' => [
                'id'    => 'cs7-stack',
                'title' => 'Architecture & technology stack',
                'backend_title' => 'Backend & infrastructure',
                'backend' => [
                    'Node.js / Express application layer modelling users, reminders, schedules and notification queues.',
                    'MongoDB database with schemas optimised for recurring events and efficient querying of upcoming reminders.',
                    'REST / JSON APIs secured with token-based authentication for the mobile apps.',
                    'Scheduling & worker processes that enqueue and dispatch notifications via Firebase Cloud Messaging.',
                    'Environment-specific configuration for staging and production with CI-driven deployments.',
                ],
                'frontend_title' => 'Frontend & UX',
                'frontend' => [
                    'Flutter codebase targeting Android and iOS with a shared component library.',
                    'Design system aligned with Hellory branding for typography, colour and motion.',
                    'Responsive marketing website built with HTML5, CSS and lightweight JavaScript.',
                    'Accessibility-minded layouts, including readable contrast and touch-friendly tap targets.',
                ],
                'tech_pills' => [
                    'Flutter',
                    'Node.js',
                    'Express',
                    'MongoDB',
                    'REST APIs',
                    'Firebase Cloud Messaging',
                    'Git-based workflow',
                ],
            ],

            'process' => [
                'id'    => 'cs8-process',
                'title' => 'Delivery process & collaboration',
                'steps' => [
                    [
                        'step'        => '01',
                        'name'        => 'Discovery & concept refinement',
                        'duration'    => '2 weeks',
                        'description' => 'Clarified the product vision, user personas and priority reminder scenarios; translated ideas into a validated MVP scope.',
                    ],
                    [
                        'step'        => '02',
                        'name'        => 'UX flows & interface design',
                        'duration'    => '3 weeks',
                        'description' => 'Designed onboarding, reminder creation, templates and notification flows using low-fidelity wireframes and high-fidelity screens.',
                    ],
                    [
                        'step'        => '03',
                        'name'        => 'Backend & mobile app development',
                        'duration'    => '6–7 weeks',
                        'description' => 'Implemented the Node.js / MongoDB API and Flutter mobile apps in parallel, with weekly demos and feedback loops.',
                    ],
                    [
                        'step'        => '04',
                        'name'        => 'Beta launch & refinement',
                        'duration'    => '3 weeks',
                        'description' => 'Released a beta to a closed group of users, captured analytics and qualitative feedback, and refined templates and notification tuning.',
                    ],
                    [
                        'step'        => '05',
                        'name'        => 'Public launch & support',
                        'duration'    => 'Ongoing',
                        'description' => 'Prepared the app-store listings, launched publicly and continued improving reliability, performance and feature depth.',
                    ],
                ],
                'engagement_model' => [
                    'label' => 'Engagement model used',
                    'description' => 'We partnered with Hellory as their product and engineering team under a Start-up MVP engagement, then moved into a lean continuous improvement model once the app launched.',
                    'links' => [
                        [
                            'label' => 'Start-up MVP approach',
                            'href'  => '/start-up-mvp/',
                        ],
                        [
                            'label' => 'Engagement models at QalbIT',
                            'href'  => '/engagement-model/',
                        ],
                    ],
                ],
            ],

            'results' => [
                'id'    => 'cs9-results',
                'title' => 'Results & impact',
                'subtitle' => 'From scattered reminders to a single smart assistant for busy lives.',
                'metrics' => [
                    [
                        'label' => 'User adoption',
                        'value' => 'Steady growth in active users after launch',
                        'note'  => 'A clear value proposition and smooth onboarding helped the app win and retain early adopters.',
                    ],
                    [
                        'label' => 'Reminder reliability',
                        'value' => 'High success rate for scheduled notifications',
                        'note'  => 'The scheduling engine and infrastructure delivered reminders consistently across devices and time zones.',
                    ],
                    [
                        'label' => 'Engagement',
                        'value' => 'Frequent repeat usage',
                        'note'  => 'Users returned regularly to manage routines, bills and personal goals through the app.',
                    ],
                    [
                        'label' => 'Product foundation',
                        'value' => 'Platform ready for premium features',
                        'note'  => 'The architecture supports future monetisation, analytics and integrations without major rewrites.',
                    ],
                ],
                'narrative' => 'Launching Hellory as a polished reminder app helped the founders validate their idea with real users and establish a credible presence in the productivity space. With cross-platform apps, a reliable notification pipeline and structured analytics in place, the team now has a solid foundation to iterate on features, positioning and growth experiments.',
                'testimonial' => [
                    'quote' => '“QalbIT helped us turn a broad idea — a reminder app for busy lives — into a focused product we could confidently ship. The team supported us across UX, mobile and backend, and the result feels both robust and user-friendly.”',
                    'name'  => 'Founder',
                    'role'  => 'Hellory',
                ],
                'inline_cta' => [
                    'text'       => 'Planning to build a reminder app, habit tracker or notification-heavy mobile product?',
                    'link_label' => 'Talk to QalbIT about your mobile app idea',
                    'href'       => '/contact-us/?topic=cs-hellory-results',
                ],
            ],

            'related' => [
                'id'    => 'cs10-related',
                'title' => 'Related case studies & services',
                'subtitle' => 'Explore more custom software and mobile app case studies, plus the services we combined for Hellory.',
                'case_studies' => [
                    [
                        'slug'    => '/case-studies/snappystats/',
                        'name'    => 'Snappy Stats – Scheduling management web app',
                        'summary' => 'Custom scheduling system that gives a shooting academy real-time visibility into events and resources.',
                    ],
                    [
                        'slug'    => '/case-studies/plugin/',
                        'name'    => 'Plugin – Tennis club management web app',
                        'summary' => 'Web-based platform for court scheduling, memberships, pricing and payment reconciliation.',
                    ],
                    [
                        'slug'    => '/case-studies/bloomford/',
                        'name'    => 'Bloomford – Hiring portal for HR professionals',
                        'summary' => 'HR tech portal that centralises employers, vacancies and candidates into one searchable talent pool.',
                    ],
                ],
                'services_used_title' => 'Services used in this project',
                'services_used' => [
                    [
                        'label' => 'Mobile App Development',
                        'href'  => '/services/mobile-app-development/',
                    ],
                    [
                        'label' => 'Custom Software Development',
                        'href'  => '/services/custom-software-development/',
                    ],
                    [
                        'label' => 'API Development',
                        'href'  => '/services/api-development/',
                    ],
                    [
                        'label' => 'Start-up MVP',
                        'href'  => '/start-up-mvp/',
                    ],
                ],
            ],


            'final_cta' => [
                'id'      => 'cs10-final-cta',
                'eyebrow' => 'Have a similar idea for a reminder or productivity app?',
                'title'   => 'Let’s design a mobile app that keeps your users ahead of their busy lives.',
                'text'    => 'Whether you are building a smart reminder app, digital planner or notification-heavy SaaS companion, QalbIT can help you move from idea to production-ready product. We bring together product thinking, UX, Flutter development and backend engineering so you ship something your users can rely on every day.',
                'primary_cta' => [
                    'label' => 'Book a free consultation',
                    'href'  => '/contact-us/?topic=cta-hellory',
                ],
                'secondary_cta' => [
                    'label' => 'Book a quick discovery call',
                    'href'  => 'https://calendly.com/abidhusain-qalbit/discuss-project',
                ],
            ],
        ],
    ],

    'plugin' => [
        'slug'        => '/case-studies/plugin/',
        'name'        => 'Plugin – Tennis Club Management Web App',
        'h1'          => 'Plugin – Tennis Club Management & Court Scheduling Web Application (Case Study)',
        'enabled'     => true,
        'order'       => 30,

        'meta_title'       => 'Plugin – Tennis Club Management & Court Booking Web App Case Study | QalbIT',
        'meta_description' => 'How QalbIT designed and built Plugin, a custom tennis club management and court booking web application for a Swiss club – centralising courts, schedules, members, pricing and payments in one platform.',

        'summary' => 'How we helped a tennis club replace manual court bookings and scattered member data with a custom web application that manages schedules, memberships, variable pricing and online payments in one place.',

        'client'   => 'Plugin',
        'industry' => 'Sports / Club & Membership Management',
        'location' => 'Switzerland',

        'banner'    => '/images/case-studies/plugin-webapp.png',
        'bannerAlt' => 'Plugin tennis club management and court booking schedule UI',
        'logo'      => '/images/case-studies/clients/plugin.png',
        'logoAlt'   => 'Plugin tennis club management logo',

        'services' => [
            'Custom Software Development',
            'Start-up MVP',
            'API Development',
            'Payment Gateway Integration',
            'Product UX & UI Design',
        ],

        'tech_stack' => [
            'PHP (CodeIgniter)',
            'MySQL',
            'REST / JSON APIs',
            'HTML5 & CSS3',
            'Bootstrap',
            'jQuery',
            'Stripe & PayPal payment integration',
            'Responsive Web UI',
        ],

        'seo' => [
            'primary_keyword'    => 'tennis club management web app case study',
            'secondary_keywords' => [
                'tennis court booking software case study',
                'sports club membership management platform',
                'custom court scheduling web application',
                'CodeIgniter tennis club management system',
                'online booking system for tennis clubs',
            ],
            'canonical'          => 'https://www.qalbIT.com/case-studies/plugin/',
        ],

        'sections' => [
            'hero' => [
                'id'       => 'cs1-hero',
                'eyebrow'  => 'Case Study · Sports & Club Management',
                'title'    => 'Plugin – <span class="text-gradient-brand-animated">Tennis club management web app</span> for courts, bookings & members',
                'subtitle' => 'A custom-built web application that gives club staff a live view of all courts, lessons and memberships – replacing whiteboards and spreadsheets with a single source of truth for tennis operations.',
                'primary_cta' => [
                    'label' => 'Discuss a similar club management project',
                    'href'  => '/contact-us/?topic=cs-plugin',
                ],
                'secondary_cta' => [
                    'label' => 'Book a quick discovery call',
                    'href'  => 'https://calendly.com/abidhusain-qalbit/discuss-project',
                ],
                'snapshot_cards' => [
                    [
                        'label' => 'Industry',
                        'value' => 'Tennis club · Sports facility management',
                    ],
                    [
                        'label' => 'Region',
                        'value' => 'Switzerland (remote collaboration)',
                    ],
                    [
                        'label' => 'Platform',
                        'value' => 'Custom PHP / CodeIgniter web application',
                    ],
                    [
                        'label' => 'Engagement',
                        'value' => 'Discovery → MVP → Payment integrations',
                    ],
                    [
                        'label' => 'Key outcome',
                        'value' => 'Unified view of courts, bookings, members & payments',
                    ],
                ],
                'hero_media' => [
                    'type' => 'image',
                    'src'  => '/images/case-studies/plugin-webapp.png',
                    'alt'  => 'Plugin court schedule grid and booking interface for a tennis club',
                ],
            ],

            'about' => [
                'id'    => 'cs2-about',
                'title' => 'About the client',
                'intro' => 'The Plugin solution was created for a tennis club that needed a reliable way to manage courts, coaching sessions, tournaments and memberships. As bookings increased and new pricing models were introduced, the existing mix of whiteboards, phone calls and spreadsheets made it hard to keep operations under control.',
                'client_story' => 'Club staff had to juggle daily schedules for multiple courts, coaches and member types. Payments were captured through separate terminals and accounting systems, making reconciliation painful. The organisation wanted a single web-based product that could centralise bookings, handle flexible pricing, support online card payments and still be simple enough for front-desk staff to use throughout the day.',
                'at_a_glance_title' => 'Client at a glance',
                'at_a_glance' => [
                    ['label' => 'Business type',      'value' => 'Tennis club & sports facility'],
                    ['label' => 'Courts & resources', 'value' => 'Multiple indoor and outdoor courts, coaches and lesson types'],
                    ['label' => 'Key operations',     'value' => 'Court bookings, coaching sessions, tournaments & memberships'],
                    ['label' => 'Previous tools',     'value' => 'Whiteboard schedules, phone calls, spreadsheets, card terminals'],
                    ['label' => 'Engagement length',  'value' => 'First MVP in ~10–12 weeks with ongoing enhancements'],
                ],
            ],

            'challenge' => [
                'id'    => 'cs3-challenge',
                'title' => 'The challenge',
                'before_title' => 'Before Plugin',
                'before_story' => 'Before the custom web app, the club relied on manual schedules and phone calls. Staff updated a physical timetable, took bookings over the phone and manually checked which courts and coaches were free. Membership information lived in separate spreadsheets and card statements, making it difficult to understand utilisation or revenue per court.',
                'bullets_title' => 'Key challenges we uncovered',
                'challenges' => [
                    'Court bookings were tracked on whiteboards and spreadsheets, making it easy to double-book courts or coaches.',
                    'Staff had no instant view of availability – checking open slots meant scanning multiple lists and notes.',
                    'Membership details, packages and balances were scattered, so it was hard to see which players were active or overdue.',
                    'Payments were handled separately (at the desk or over the phone), with no automatic link to bookings or membership status.',
                    'Pricing rules for peak / off-peak hours and special events were difficult to apply consistently.',
                    'Reporting on utilisation, revenue per court or coach and membership trends required manual reconciliation.',
                    'Scaling to more courts, coaches or locations would multiply the complexity and risk of errors.',
                ],
            ],

            'goals' => [
                'id'    => 'cs4-goals',
                'title' => 'Project goals & success criteria',
                'business_goals_title' => 'Business goals',
                'business_goals' => [
                    'Give the club a live, accurate schedule for all courts, lessons and events.',
                    'Increase court utilisation and reduce idle time through better visibility and pricing.',
                    'Simplify membership management so staff can quickly see a player’s status, packages and balances.',
                    'Connect bookings and payments so reconciliation is faster and more reliable.',
                ],
                'product_goals_title' => 'Product & technical goals',
                'product_goals' => [
                    'Design an intuitive schedule grid for courts that front-desk staff can update in real time.',
                    'Implement flexible pricing rules for peak / off-peak periods, member vs. non-member rates and special events.',
                    'Integrate with Stripe and PayPal to support secure online payments for bookings and memberships.',
                    'Build on a modular PHP / CodeIgniter architecture that can evolve to support new sports or locations.',
                ],
                'note' => 'We agreed on a phased rollout: first digitise the court schedule and core booking flows, then add payment integration, membership management and more advanced reporting once staff were comfortable with the new system.',
            ],

            'solution' => [
                'id'    => 'cs5-solution',
                'title' => 'Our solution',
                'intro' => 'QalbIT designed and built Plugin as a central hub for the club’s daily operations – from court bookings and coaching sessions to memberships and payments.',
                'body'  => 'We started by analysing how the club actually planned its days: which courts were most in demand, how coaches allocated time and how memberships were used. Based on this, we designed a calendar-style schedule grid with drag-friendly interactions for staff, plus structured forms for bookings and memberships. Behind the UI, we modelled courts, slots, members, packages and payments in a single data layer, and implemented payment gateway integrations so online transactions automatically update booking and membership status.',
                'highlight_strip' => [
                    'End-to-end delivery across discovery, UX, backend, frontend and payment gateway integration.',
                    'Modular PHP / CodeIgniter architecture with MySQL and REST APIs for potential partner integrations.',
                    'Responsive web interface designed for desktop use at the front desk, with tablet-friendly layouts for on-court staff.',
                ],
            ],

            'features' => [
                'id'    => 'cs6-features',
                'title' => 'Key product features & UX highlights',
                'subtitle' => 'Everything club staff need to manage courts, members, pricing and payments in one tennis club management platform.',
                'items' => [
                    [
                        'name' => 'Court schedule grid',
                        'description' => 'A colour-coded grid showing all courts and time slots, with filters for day, coach and event type.',
                    ],
                    [
                        'name' => 'Booking & rescheduling flows',
                        'description' => 'Fast flows to create, move or cancel bookings while automatically checking court and coach availability.',
                    ],
                    [
                        'name' => 'Membership & packages',
                        'description' => 'Structured membership records with package types, validity dates and remaining credits where applicable.',
                    ],
                    [
                        'name' => 'Flexible pricing rules',
                        'description' => 'Configuration for peak / off-peak pricing, member vs. guest rates and special event pricing.',
                    ],
                    [
                        'name' => 'Online payments integration',
                        'description' => 'Secure integration with Stripe and PayPal so players can pay for bookings and memberships online.',
                    ],
                    [
                        'name' => 'Admin dashboards',
                        'description' => 'At-a-glance views of today’s schedule, upcoming busy periods, membership renewals and payment summaries.',
                    ],
                    [
                        'name' => 'Reporting foundation',
                        'description' => 'Baseline reports for court utilisation, revenue per court or coach and membership activity, ready to be extended.',
                    ],
                    [
                        'name' => 'Responsive UX',
                        'description' => 'Layouts tuned for desktop and tablet so staff can manage operations from the front desk or on the move.',
                    ],
                ],
                'screenshot' => [
                    'src' => '/images/case-studies/plugin-casestudy-page.png',
                    'alt' => 'Plugin tennis club schedule and membership management screens',
                ],
            ],

            'stack' => [
                'id'    => 'cs7-stack',
                'title' => 'Architecture & technology stack',
                'backend_title' => 'Backend & infrastructure',
                'backend' => [
                    'PHP / CodeIgniter application layer structured around courts, bookings, memberships and payments.',
                    'MySQL database with indexed tables for courts, time slots, members, transactions and audit logs.',
                    'REST / JSON APIs for booking operations and payment callbacks.',
                    'Role-based access control for admins and front-desk staff with audit trails on key actions.',
                    'Environment-specific configuration for staging and production deployments.',
                ],
                'frontend_title' => 'Frontend & UX',
                'frontend' => [
                    'Responsive HTML5 templates styled with Bootstrap and custom CSS.',
                    'Clear typography and information hierarchy on court schedules and booking forms.',
                    'Reusable components for schedule cells, booking dialogs, lists and reports.',
                    'Progressive enhancement to keep core flows usable even on slower connections.',
                ],
                'tech_pills' => [
                    'PHP (CodeIgniter)',
                    'MySQL',
                    'REST APIs',
                    'Bootstrap',
                    'jQuery',
                    'HTML5 & CSS3',
                    'Stripe & PayPal',
                    'Git-based workflow',
                ],
            ],

            'process' => [
                'id'    => 'cs8-process',
                'title' => 'Delivery process & collaboration',
                'steps' => [
                    [
                        'step'        => '01',
                        'name'        => 'Discovery & operations mapping',
                        'duration'    => '2 weeks',
                        'description' => 'Workshops with club management and front-desk staff to map court booking flows, membership rules and pricing models.',
                    ],
                    [
                        'step'        => '02',
                        'name'        => 'UX flows & interface design',
                        'duration'    => '2–3 weeks',
                        'description' => 'Design of the court schedule grid, booking forms, membership screens and admin dashboards using the QalbIT design system.',
                    ],
                    [
                        'step'        => '03',
                        'name'        => 'MVP implementation',
                        'duration'    => '4–6 weeks',
                        'description' => 'Backend, frontend and database implementation with iterative demos and feedback from club staff.',
                    ],
                    [
                        'step'        => '04',
                        'name'        => 'Payment integration & pilot',
                        'duration'    => '2 weeks',
                        'description' => 'Stripe and PayPal integration, followed by a pilot on selected courts and member groups to validate flows and edge cases.',
                    ],
                    [
                        'step'        => '05',
                        'name'        => 'Rollout & continuous improvements',
                        'duration'    => 'Ongoing',
                        'description' => 'Full rollout to all courts and membership types, plus ongoing enhancements to reporting and configuration.',
                    ],
                ],
                'engagement_model' => [
                    'label' => 'Engagement model used',
                    'description' => 'We operated as the club’s product and engineering partner under a Start-up MVP engagement, then continued with a lean improvement model focused on new features and support.',
                    'links' => [
                        [
                            'label' => 'Start-up MVP approach',
                            'href'  => '/start-up-mvp/',
                        ],
                        [
                            'label' => 'Engagement models at QalbIT',
                            'href'  => '/engagement-model/',
                        ],
                    ],
                ],
            ],

            'results' => [
                'id'    => 'cs9-results',
                'title' => 'Results & impact',
                'subtitle' => 'From manual court charts to a structured, data-informed tennis club management platform.',
                'metrics' => [
                    [
                        'label' => 'Court booking accuracy',
                        'value' => 'Significant reduction in double bookings',
                        'note'  => 'Conflicts between courts and coaches became rare once all bookings were handled through the central schedule.',
                    ],
                    [
                        'label' => 'Staff efficiency',
                        'value' => 'Less time spent on manual coordination',
                        'note'  => 'Front-desk staff can now manage bookings, memberships and payments from one interface.',
                    ],
                    [
                        'label' => 'Payment tracking',
                        'value' => 'Improved link between bookings & payments',
                        'note'  => 'Online transactions are automatically associated with the correct booking or membership.',
                    ],
                    [
                        'label' => 'Foundation for growth',
                        'value' => 'Ready to add new sports & locations',
                        'note'  => 'The platform can extend to additional courts, sports or partner clubs without re-architecting the system.',
                    ],
                ],
                'narrative' => 'By moving from whiteboards and spreadsheets to a purpose-built web application, the club gained real control over its courts and memberships. Staff now work from a live schedule, players enjoy faster bookings and online payments, and management has clearer insight into utilisation and revenue patterns – all powered by a platform that can grow with the club.',
                'testimonial' => [
                    'quote' => '“The new system finally gives us a clear, up-to-date picture of our courts and members. Booking mistakes have dropped, and we no longer have to reconcile bookings and payments across multiple tools.”',
                    'name'  => 'Club Manager',
                    'role'  => 'Tennis Club using Plugin',
                ],
                'inline_cta' => [
                    'text'       => 'Running a tennis club or sports facility and still relying on manual schedules?',
                    'link_label' => 'Talk to QalbIT about a custom club management platform',
                    'href'       => '/contact-us/?topic=cs-plugin-results',
                ],
            ],

            'related' => [
                'id'    => 'cs10-related',
                'title' => 'Related case studies & services',
                'subtitle' => 'Explore more custom software case studies and the services we typically combine for booking, membership and operations platforms.',
                'case_studies' => [
                    [
                        'slug'    => '/case-studies/snappystats/',
                        'name'    => 'Snappy Stats – Scheduling management web app',
                        'summary' => 'Scheduling web app that centralises bookings and prevents double bookings for a growing shooting academy.',
                    ],
                    [
                        'slug'    => '/case-studies/bloomford/',
                        'name'    => 'Bloomford – Hiring portal for HR professionals',
                        'summary' => 'Recruitment platform that streamlines vacancy management and candidate pipelines for HR teams.',
                    ],
                    [
                        'slug'    => '/case-studies/hellory/',
                        'name'    => 'Hellory – Smart reminder app for busy lives',
                        'summary' => 'Cross-platform reminder app that delivers reliable notifications and recurring schedules on mobile.',
                    ],
                ],
                'services_used_title' => 'Services used in this project',
                'services_used' => [
                    [
                        'label' => 'Custom Software Development',
                        'href'  => '/services/custom-software-development/',
                    ],
                    [
                        'label' => 'Start-up MVP',
                        'href'  => '/start-up-mvp/',
                    ],
                    [
                        'label' => 'API Development',
                        'href'  => '/services/api-development/',
                    ],
                    [
                        'label' => 'Payment Gateway Integration',
                        'href'  => '/services/payment-gateway-integration/',
                    ],
                ],
            ],


            'final_cta' => [
                'id'      => 'cs10-final-cta',
                'eyebrow' => 'Have a similar sports or club management challenge?',
                'title'   => 'Let’s design a club management & booking platform around your courts, members and pricing.',
                'text'    => 'Whether you run a tennis club, padel centre or multi-sport facility, QalbIT can help you move from manual schedules to a custom web application that keeps bookings, memberships and payments in sync. We combine product thinking, UX and engineering to ship production-ready platforms – not just prototypes.',
                'primary_cta' => [
                    'label' => 'Book a free consultation',
                    'href'  => '/contact-us/?topic=cta-plugin',
                ],
                'secondary_cta' => [
                    'label' => 'Book a quick discovery call',
                    'href'  => 'https://calendly.com/abidhusain-qalbit/discuss-project',
                ],
            ],
        ],
    ],
];
