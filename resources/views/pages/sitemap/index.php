<?php
/**
 * Sitemap page
 *
 * This can be made config-driven later; for now the groups/links
 * are defined in a simple PHP array so it’s easy to maintain.
 */

$pageTitle   = 'Our Sitemap';
$pageSummary = 'Quick overview of all key pages on QalbIT – services, industries, technologies, portfolio, careers, insights and legal information.';

$groups = [

    'discover' => [
        'title' => 'Discover QalbIT',
        'description' => 'High-level pages people usually visit first when evaluating us as a software partner.',
        'columns' => [
            [
                ['label' => 'Home',                'href' => '/'],
                ['label' => 'About QalbIT',       'href' => '/about-us/'],
                ['label' => 'Technologies',       'href' => '/technologies/'],
                ['label' => 'Industries',         'href' => '/industries/'],
                ['label' => 'Portfolio',          'href' => '/portfolio/'],
            ],
            [
                ['label' => 'Our Services',       'href' => '/services/'],
                ['label' => 'Careers',            'href' => '/career/'],
                ['label' => 'Contact Us',         'href' => '/contact-us/'],
                ['label' => 'Our Insights / Blog','href' => '/blog/'],
                ['label' => 'Sitemap',            'href' => '/sitemap/'],
            ],
        ],
    ],

    'process' => [
        'title' => 'Our Process',
        'description' => 'How we approach discovery, MVP, scaling and long-term product partnerships.',
        'columns' => [
            [
                ['label' => 'Start-Up MVP',            'href' => '/start-up-mvp/'],
                ['label' => 'Product Scaling',         'href' => '/product-scaling/'],
            ],
            [
                ['label' => 'Digital Transformation',  'href' => '/digital-transformation/'],
                ['label' => 'Engagement Models',       'href' => '/engagement-model/'],
            ],
        ],
    ],

    'services' => [
        'title' => 'Our Services',
        'description' => 'Custom software development services we provide for founders, product teams and enterprises.',
        'columns' => [
            [
                ['label' => 'Custom Web Development',      'href' => '/services/custom-web-development/'],
                ['label' => 'Mobile App Development',      'href' => '/services/mobile-development/'],
                ['label' => 'E-Commerce Solutions',        'href' => '/services/e-commerce/'],
                ['label' => 'Cloud-based Solutions',       'href' => '/services/cloud-based-solutions/'],
            ],
            [
                ['label' => 'Custom Software Development', 'href' => '/services/custom-software-development/'],
                ['label' => 'API Development',             'href' => '/services/api-development/'],
                ['label' => 'SaaS Application Development','href' => '/services/saas/'],
                ['label' => 'UX & Product Design',         'href' => '/services/ui-ux-design-service/'],
            ],
        ],
    ],

    'industries' => [
        'title' => 'Industries We Serve',
        'description' => 'Industries and domains where we have shipped production-ready software.',
        'columns' => [
            [
                ['label' => 'E-commerce & Retail', 'href' => '/industries/e-commerce/'],
                ['label' => 'Fintech',             'href' => '/industries/fintech/'],
                ['label' => 'Healthcare',          'href' => '/industries/healthcare/'],
                ['label' => 'Education',           'href' => '/industries/education/'],
            ],
            [
                ['label' => 'Entertainment & Media', 'href' => '/industries/entertainment/'],
                ['label' => 'Travel & Hospitality',  'href' => '/industries/travel/'],
                ['label' => 'Real Estate & Local',   'href' => '/industries/real-estate/'],
            ],
        ],
    ],

    'technologies' => [
        'title' => 'Technologies & Stacks',
        'description' => 'Core technologies and platforms we use across backend, frontend and mobile.',
        'columns' => [
            [
                ['label' => 'Laravel / PHP',        'href' => '/technologies/laravel/'],
                ['label' => 'Node.js',              'href' => '/technologies/nodejs/'],
                ['label' => 'NestJS',               'href' => '/technologies/nestjs/'],
                ['label' => 'React',                'href' => '/technologies/reactjs/'],
                ['label' => 'Next.js',              'href' => '/technologies/nextjs/'],
                ['label' => 'Tailwind CSS',         'href' => '/technologies/tailwindcss/'],
                ['label' => 'WordPress',            'href' => '/technologies/wordpress/'],
                ['label' => 'CodeIgniter',          'href' => '/technologies/codeigniter/'],
            ],
            [
                ['label' => 'Flutter',              'href' => '/technologies/flutter/'],
                ['label' => 'Native Android',       'href' => '/technologies/android/'],
                ['label' => 'React Native',         'href' => '/technologies/react-native/'],
                ['label' => 'TypeScript',           'href' => '/technologies/typescript/'],
                ['label' => 'PostgreSQL',           'href' => '/technologies/postgresql/'],
                ['label' => 'MySQL',                'href' => '/technologies/mysql/'],
                ['label' => 'AWS Cloud Solutions',  'href' => '/technologies/aws/'],
            ],
        ],
    ],

    'portfolio' => [
        'title' => 'Portfolio & Case Studies',
        'description' => 'Selected projects, internal products and platforms we have shipped with clients.',
        'columns' => [
            [
                ['label' => 'Portfolio Overview', 'href' => '/portfolio/'],
                ['label' => 'Snappystats',        'href' => '/case-studies/snappystats/'],
                ['label' => 'Bloomford',          'href' => '/case-studies/bloomford/'],
            ],
            [
                ['label' => 'Hellory',            'href' => '/case-studies/hellory/'],
            ],
        ],
    ],

    'careers' => [
        'title' => 'Careers & Hiring',
        'description' => 'Information for engineers, designers and product people exploring roles at QalbIT.',
        'columns' => [
            [
                ['label' => 'Careers Overview',    'href' => '/career/'],
                ['label' => 'Open Positions',      'href' => '/career/#careers-openings'],
                ['label' => 'Life at QalbIT',      'href' => '/career/#life-at-qalbit'],
            ],
            [
                ['label' => 'General Application', 'href' => '/career/apply/'],
                ['label' => 'Apply for Laravel Roles', 'href' => '/career/apply/?role=laravel-developer'],
            ],
        ],
    ],

    'resources' => [
        'title' => 'Resources & Insights',
        'description' => 'Content, updates and learning resources related to custom software development.',
        'columns' => [
            [
                ['label' => 'Blog',                'href' => '/blog/'],
            ],
            [
                ['label' => 'Contact for Speaking / Workshops', 'href' => '/contact-us/?topic=speaking'],
            ],
        ],
    ],

    'legal' => [
        'title' => 'Legal & Policies',
        'description' => 'Documents that describe how we handle data, security and website usage.',
        'columns' => [
            [
                ['label' => 'Privacy Policy',       'href' => '/privacy-policy/'],
                ['label' => 'Terms & Conditions',   'href' => '/terms-and-condition/'],
                ['label' => 'Cookie Policy',        'href' => '/cookie-policy/'],
            ],
        ],
    ],
];

?>

<section class="bg-white py-10 sm:py-14 lg:py-16">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">

        <!-- Compact hero -->
        <header class="mb-8 sm:mb-10">
            <nav class="mb-3 text-xs font-medium text-slate-500" aria-label="Breadcrumb">
                <ol class="flex flex-wrap items-center gap-1">
                    <li>
                        <a href="/" class="hover:text-sky-600 transition-colors">Home</a>
                    </li>
                    <li class="text-slate-400">/</li>
                    <li aria-current="page" class="text-slate-900">
                        Sitemap
                    </li>
                </ol>
            </nav>

            <h1 class="text-xl sm:text-2xl md:text-[26px] font-semibold tracking-tight text-slate-900">
                <?= htmlspecialchars($pageTitle, ENT_QUOTES); ?>
            </h1>
            <p class="mt-2 max-w-2xl text-sm text-slate-600">
                <?= htmlspecialchars($pageSummary, ENT_QUOTES); ?>
            </p>
        </header>

        <!-- Sitemap groups -->
        <div class="space-y-8 sm:space-y-10 lg:space-y-12">
            <?php foreach ($groups as $group): ?>
                <section class="border-t border-slate-100 pt-6 sm:pt-7">
                    <div class="flex flex-col gap-2 sm:flex-row sm:items-baseline sm:justify-between">
                        <div>
                            <h2 class="text-xs font-semibold uppercase tracking-[0.16em] text-sky-700">
                                <?= htmlspecialchars($group['title'], ENT_QUOTES); ?>
                            </h2>
                            <?php if (!empty($group['description'])): ?>
                                <p class="mt-1 text-[13px] text-slate-600 max-w-xl">
                                    <?= htmlspecialchars($group['description'], ENT_QUOTES); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="mt-4 grid gap-6 sm:grid-cols-2 lg:grid-cols-3 text-sm">
                        <?php foreach ($group['columns'] as $column): ?>
                            <ul class="space-y-1.5">
                                <?php foreach ($column as $link): ?>
                                    <li>
                                        <a
                                            href="<?= htmlspecialchars($link['href'], ENT_QUOTES); ?>"
                                            class="inline-flex items-center text-[13px] text-slate-700 hover:text-sky-600"
                                        >
                                            <span class="mr-2 h-[3px] w-[3px] rounded-full bg-slate-300"></span>
                                            <span><?= htmlspecialchars($link['label'], ENT_QUOTES); ?></span>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endforeach; ?>
                    </div>
                </section>
            <?php endforeach; ?>
        </div>
    </div>
</section>
