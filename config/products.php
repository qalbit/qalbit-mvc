<?php

/**
 * Products (owned SaaS) configuration.
 *
 * NOTE ON PORTABILITY:
 * This file intentionally mirrors the `products.json` schema planned for the
 * Next.js migration (lib/data/products.json). Each item's keys map 1:1 so this
 * PHP config can be converted to JSON with `scripts/convert-config.ts` at cutover.
 *
 * Per-product `externalUrl` is nullable — a null value drives the "Coming soon"
 * state (e.g. Emplyft) instead of an outbound "Visit site" link.
 */

return [

    // ------------------------------------------------------------------
    // Products index page (/products/) configuration
    // ------------------------------------------------------------------
    'page' => [
        'slug'    => '/products/',
        'enabled' => true,

        'meta_title'       => 'Products by QalbIT — SaaS we designed, built & run',
        'meta_description' => 'Explore the SaaS products QalbIT built and operates: URLCrop, LiftUp, PocketGST and Emplyft — proof of how we build software for our clients.',

        'seo' => [
            'primary_keyword'    => 'software products by QalbIT',
            'secondary_keywords' => [
                'SaaS built by QalbIT',
                'product studio software company',
                'multi-tenant SaaS development',
            ],
            'canonical' => 'https://www.qalbit.com/products/',
        ],

        'sections' => [
            'hero' => [
                'id'       => 'products-hero',
                'eyebrow'  => 'Our products · Designed, built & operated by QalbIT',
                'title'    => 'Software products we <span class="text-gradient-brand-animated">designed, built and run</span> ourselves.',
                'subtitle' => 'Every product here was conceived, engineered and is operated by the QalbIT team — the same team that ships custom software for our clients. They are how we prove, not just promise, that we can take an idea from zero to a live, scaling product.',
                'primary_cta' => [
                    'label' => 'Build your product with us',
                    'href'  => '/contact-us/?topic=product-studio',
                ],
                'secondary_cta' => [
                    'label' => 'Explore our services',
                    'href'  => '/services/',
                ],
            ],
            'grid' => [
                'id'       => 'products-grid',
                'title'    => 'Products we own and operate',
                'subtitle' => 'Four live SaaS products across link infrastructure, multi-tenant business operations, tax compliance and HR — a deliberately broad surface that shows range across domains and technologies.',
            ],
            'final_cta' => [
                'id'       => 'products-final-cta',
                'title'    => 'Have a product idea of your own?',
                'subtitle' => 'We build our own products the same way we build yours — with product thinking, clean architecture and a team that operates what it ships. Let\'s talk about what you want to launch.',
                'primary_cta' => [
                    'label' => 'Talk to our product team',
                    'href'  => '/contact-us/?topic=product-studio',
                ],
            ],
        ],
    ],

    // ------------------------------------------------------------------
    // Product items
    // ------------------------------------------------------------------
    'items' => [

        // ============================================================
        // URLCrop
        // ============================================================
        'urlcrop' => [
            'slug'        => 'urlcrop',
            'enabled'     => true,
            'featured'    => true,
            'order'       => 10,
            'status'      => 'live', // live | coming_soon
            'externalUrl' => 'https://urlcrop.com',

            'name'        => 'URLCrop',
            'tagline'     => 'Link management, simplified.',
            'valueProp'   => 'Shorten, organise and track links with clean, privacy-friendly analytics.',
            'audienceTag' => 'Marketers & Developers',

            'logo'        => null, // drop a wordmark at /assets/images/products/urlcrop.svg to enable
            'logoAlt'     => 'URLCrop logo',

            'meta_title'       => 'URLCrop Case Study — Link Management Built by QalbIT',
            'meta_description' => 'How QalbIT designed, built and operates URLCrop, a link-management tool with analytics — architecture, stack and outcomes.',

            'role'   => 'Design + Build + Operate',
            'domain' => 'Link management & web infrastructure',

            'tech_stack' => ['Next.js', 'Headless WordPress', 'WPGraphQL', 'MariaDB', 'Docker'],

            'related_service' => [
                'label' => 'Web Application Development',
                'href'  => '/services/custom-web-development/',
            ],

            'sections' => [
                'problem' => 'Teams share links everywhere — campaigns, docs, socials — but lose track of what was shared, where, and how it performed. Off-the-shelf shorteners either bury analytics behind expensive tiers or leak user data. There was room for a fast, clean, privacy-respecting link manager.',
                'built'   => 'URLCrop is a link-management product for shortening, organising and tracking links, paired with a lightweight analytics dashboard. The public marketing and app experience is a Next.js application, with editorial content served from a headless WordPress CMS over WPGraphQL.',
                'architecture' => [
                    ['title' => 'Next.js front end', 'text' => 'The public site and app are rendered with Next.js for fast, SEO-friendly pages and instant navigation.'],
                    ['title' => 'Headless WordPress + WPGraphQL', 'text' => 'The blog/content layer runs on WordPress (PHP 8.3) with WPGraphQL and Yoast SEO, kept noindex and consumed by the Next.js front end — content velocity without coupling the app to a CMS.'],
                    ['title' => 'Containerised infra', 'text' => 'CMS, database (MariaDB 11) and services run via Docker Compose with version-controlled config and webhook-driven revalidation on publish.'],
                ],
                'shipped' => [
                    'Short-link creation and organisation',
                    'Click analytics with a privacy-friendly model',
                    'Headless blog/content pipeline with on-publish revalidation',
                    'SEO-optimised marketing site',
                ],
                'outcomes' => [
                    'Live and operated by QalbIT as a self-funded product',
                    'Decoupled content pipeline lets marketing ship without engineering',
                    'Demonstrates our web-infrastructure and headless-CMS competence',
                ],
            ],
        ],

        // ============================================================
        // LiftUp (flagship case study)
        // ============================================================
        'liftup' => [
            'slug'        => 'liftup',
            'enabled'     => true,
            'featured'    => true,
            'order'       => 20,
            'status'      => 'live',
            'externalUrl' => 'https://www.liftup.sh',

            'name'        => 'LiftUp',
            'tagline'     => 'Your business operations hub.',
            'valueProp'   => 'A multi-tenant SaaS that unifies CRM, blog CMS, AI editorial and analytics in one workspace.',
            'audienceTag' => 'SMBs & Content Teams',

            'logo'        => null,
            'logoAlt'     => 'LiftUp logo',

            'meta_title'       => 'LiftUp Case Study — Multi-Tenant SaaS by QalbIT',
            'meta_description' => 'How QalbIT built LiftUp, a multi-tenant operations hub with CRM, CMS, AI editorial and analytics — architecture, stack and outcomes.',

            'role'   => 'Design + Build + Operate',
            'domain' => 'Multi-tenant SaaS & AI',

            'tech_stack' => ['Next.js 14', 'React 18', 'TypeScript', 'Tailwind CSS', 'AI editorial', 'Multi-tenant architecture'],

            'related_service' => [
                'label' => 'SaaS Product Development',
                'href'  => '/services/saas/',
            ],

            'sections' => [
                'problem' => 'Small and mid-sized businesses run on a patchwork of disconnected tools — one app for CRM, another for their blog, a third for analytics — with data trapped in each. The switching cost and lost context slow the whole team down.',
                'built'   => 'LiftUp is a multi-tenant SaaS that unifies CRM, a blog CMS with AI-assisted editorial, and analytics into a single workspace. Each customer gets an isolated tenant; the AI editorial layer helps content teams draft and refine faster.',
                'architecture' => [
                    ['title' => 'Multi-tenant by design', 'text' => 'Tenant isolation is built into the data model and request lifecycle so every customer\'s workspace and data stay cleanly separated on shared infrastructure.'],
                    ['title' => 'Next.js 14 + React 18 + TypeScript', 'text' => 'A modern App Router front end with a typed component system and Tailwind design tokens for a consistent, fast UI.'],
                    ['title' => 'AI editorial integration', 'text' => 'An AI writing layer is wired into the CMS so content teams can draft, rewrite and refine posts inside the same workspace.'],
                    ['title' => 'Operated in production', 'text' => 'Runs as a managed service (PM2 process management, sitemap and SEO tooling) — QalbIT builds and operates it end to end.'],
                ],
                'shipped' => [
                    'Multi-tenant workspaces with per-tenant isolation',
                    'CRM module',
                    'Blog CMS with AI-assisted editorial',
                    'Analytics dashboards',
                    'Marketing site with pricing, features and compare pages',
                ],
                'outcomes' => [
                    'Live multi-tenant SaaS, designed, built and operated by QalbIT',
                    'Strongest proof of our multi-tenant + AI SaaS engineering capability',
                    'Directly maps to the SaaS product engineering we do for clients',
                ],
            ],
        ],

        // ============================================================
        // PocketGST
        // ============================================================
        'pocketgst' => [
            'slug'        => 'pocketgst',
            'enabled'     => true,
            'featured'    => true,
            'order'       => 30,
            'status'      => 'live',
            'externalUrl' => 'https://www.pocketgst.com',

            'name'        => 'PocketGST',
            'tagline'     => 'GST compliance in your pocket.',
            'valueProp'   => 'Offline GST calculator & invoice app for Indian shops, freelancers and traders.',
            'audienceTag' => 'Indian Businesses & Accountants',

            'logo'        => null,
            'logoAlt'     => 'PocketGST logo',

            'meta_title'       => 'PocketGST Case Study — GST Compliance SaaS by QalbIT',
            'meta_description' => 'How QalbIT built PocketGST to simplify GST filing and tax compliance for Indian businesses — a regulated-domain product.',

            'role'   => 'Design + Build + Operate',
            'domain' => 'Fintech & tax compliance',

            'tech_stack' => ['Android', 'Offline-first', 'GST rules engine', 'PDF invoicing', '12 languages'],

            'related_service' => [
                'label' => 'Mobile App Development',
                'href'  => '/services/mobile-development/',
            ],

            'sections' => [
                'problem' => 'GST filing and ongoing tax compliance are complex, deadline-driven and error-prone for Indian businesses. Getting it wrong carries real financial and legal risk, and generic accounting tools rarely make the workflow simple.',
                'built'   => 'PocketGST is a compliance product that streamlines GST calculation, filing and the surrounding workflows so businesses and accountants can stay compliant without wrestling with the paperwork.',
                'architecture' => [
                    ['title' => 'Regulated-domain workflows', 'text' => 'The product encodes GST rules and filing workflows so users are guided through compliance steps correctly.'],
                    ['title' => 'Secure data handling', 'text' => 'Financial and tax data is treated as sensitive throughout — a core requirement for any product in the compliance space.'],
                ],
                'shipped' => [
                    'GST calculation and filing features',
                    'Compliance workflows and reminders',
                    'Tooling aimed at both businesses and accountants',
                ],
                'outcomes' => [
                    'Live product operating in a regulated fintech/tax domain',
                    'Demonstrates competence with compliance-heavy requirements',
                ],
            ],
        ],

        // ============================================================
        // Emplyft (coming soon — no outbound link)
        // ============================================================
        'emplyft' => [
            'slug'        => 'emplyft',
            'enabled'     => true,
            'featured'    => true,
            'order'       => 40,
            'status'      => 'coming_soon',
            'externalUrl' => null, // null => "Coming soon" state, no outbound traffic

            'name'        => 'Emplyft',
            'tagline'     => 'Modern HR, without the busywork.',
            'valueProp'   => 'Employee management and HR operations for growing teams.',
            'audienceTag' => 'HR & People Teams',

            'logo'        => null,
            'logoAlt'     => 'Emplyft logo',

            'meta_title'       => 'Emplyft Case Study — HR SaaS by QalbIT',
            'meta_description' => 'Emplyft case study – the HR and employee management SaaS QalbIT designed, built and operates for growing teams outgrowing spreadsheets.',

            'role'   => 'Design + Build + Operate',
            'domain' => 'HR SaaS',

            'tech_stack' => ['SaaS web application'],

            'related_service' => [
                'label' => 'SaaS Product Development',
                'href'  => '/services/saas/',
            ],

            'sections' => [
                'problem' => 'Growing teams outgrow spreadsheets for HR fast — employee records, leave, and people operations get messy and manual. They need a lightweight system that removes the busywork without enterprise bloat.',
                'built'   => 'Emplyft is an HR and employee-management SaaS for growing teams. The product is live in use; the public marketing site is being finalised, so we\'re featuring it here as capability proof ahead of its public launch.',
                'architecture' => [
                    ['title' => 'SaaS product engineering', 'text' => 'Built on the same SaaS foundations as our other products — a modern web application designed for day-to-day HR operations.'],
                ],
                'shipped' => [
                    'Employee records and HR operations',
                    'Product live in use ahead of public site launch',
                ],
                'outcomes' => [
                    'Live product; public site launching soon',
                    'Rounds out our SaaS range into HR/people tech',
                ],
            ],
        ],

    ],
];
