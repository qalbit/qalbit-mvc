<?php
/**
 * Sitemap page
 *
 * Groups are built from the same configs that drive the real pages
 * (services, hire, industries, technologies, products, case studies,
 * locations), so new pages appear here automatically.
 *
 * Expects (optional): $blogPosts – recent posts from WordPressClient.
 */

$pageTitle   = 'Our Sitemap';
$pageSummary = 'Quick overview of all key pages on QalbIT – services, industries, technologies, portfolio, careers, insights and legal information.';

$blogPosts = $blogPosts ?? [];

// ---------------------------------------------------------------
// Helpers to build link lists from configs
// ---------------------------------------------------------------
$enabledSorted = static function (array $items): array {
    $items = array_filter($items, static fn ($i) => is_array($i) && !empty($i['enabled']));
    uasort($items, static fn ($a, $b) => ($a['order'] ?? 999) <=> ($b['order'] ?? 999));
    return array_values($items);
};

$serviceLinks = [['label' => 'All Services', 'href' => '/services/']];
foreach ($enabledSorted(config('services', [])) as $service) {
    if (!empty($service['slug'])) {
        $serviceLinks[] = ['label' => $service['name'] ?? 'Service', 'href' => $service['slug']];
    }
}

$hireLinks = [['label' => 'All Developer Profiles', 'href' => '/hire-developers/']];
foreach ($enabledSorted(config('hire', [])) as $role) {
    if (!empty($role['slug'])) {
        $hireLinks[] = ['label' => $role['name'] ?? 'Developers', 'href' => $role['slug']];
    }
}

$industryLinks = [['label' => 'All Industries', 'href' => '/industries/']];
foreach ($enabledSorted(config('industries', [])) as $industry) {
    if (!empty($industry['slug'])) {
        $industryLinks[] = ['label' => $industry['name'] ?? 'Industry', 'href' => $industry['slug']];
    }
}

$technologyLinks = [['label' => 'All Technologies', 'href' => '/technologies/']];
foreach ($enabledSorted(config('technologies', [])) as $technology) {
    if (!empty($technology['slug'])) {
        $technologyLinks[] = ['label' => $technology['name'] ?? 'Technology', 'href' => $technology['slug']];
    }
}

$productLinks = [['label' => 'All Products', 'href' => '/products/']];
foreach ($enabledSorted(config('products.items', [])) as $product) {
    if (!empty($product['slug'])) {
        $productLinks[] = [
            'label' => $product['name'] ?? 'Product',
            'href'  => '/products/' . trim($product['slug'], '/') . '/',
        ];
    }
}

$caseStudyLinks = [
    ['label' => 'Portfolio Overview', 'href' => '/portfolio/'],
    ['label' => 'All Case Studies',   'href' => '/case-studies/'],
];
foreach ($enabledSorted(config('case_studies', [])) as $caseStudy) {
    if (!empty($caseStudy['slug'])) {
        $caseStudyLinks[] = [
            'label' => $caseStudy['client'] ?? $caseStudy['name'] ?? 'Case study',
            'href'  => $caseStudy['slug'],
        ];
    }
}

$locationLinks = [];
foreach (config('geo', []) as $location) {
    if (!empty($location['enabled']) && !empty($location['slug']) && !empty($location['name'])) {
        $locationLinks[] = ['label' => $location['name'], 'href' => $location['slug']];
    }
}

// ---------------------------------------------------------------
// Groups (rendered in this order)
// ---------------------------------------------------------------
$groups = [
    'discover' => [
        'title'       => 'Discover QalbIT',
        'description' => 'High-level pages people usually visit first when evaluating us as a software partner.',
        'links'       => [
            ['label' => 'Home',           'href' => '/'],
            ['label' => 'About QalbIT',   'href' => '/about-us/'],
            ['label' => 'Portfolio',      'href' => '/portfolio/'],
            ['label' => 'Careers',        'href' => '/career/'],
            ['label' => 'Contact Us',     'href' => '/contact-us/'],
            ['label' => 'Blog & Insights','href' => '/blog/'],
            ['label' => 'Sitemap',        'href' => '/sitemap/'],
        ],
    ],
    'services' => [
        'title'       => 'Our Services',
        'description' => 'Custom software development services we provide for founders, product teams and enterprises.',
        'links'       => $serviceLinks,
    ],
    'hire' => [
        'title'       => 'Hire Dedicated Developers',
        'description' => 'Hire dedicated developers in India – remote squads with flexible monthly engagement and time-zone overlap.',
        'links'       => $hireLinks,
    ],
    'process' => [
        'title'       => 'Our Process',
        'description' => 'How we approach discovery, MVP, scaling and long-term product partnerships.',
        'links'       => [
            ['label' => 'Start-Up MVP',           'href' => '/start-up-mvp/'],
            ['label' => 'Product Scaling',        'href' => '/product-scaling/'],
            ['label' => 'Digital Transformation', 'href' => '/digital-transformation/'],
            ['label' => 'Engagement Models',      'href' => '/engagement-model/'],
        ],
    ],
    'industries' => [
        'title'       => 'Industries We Serve',
        'description' => 'Industries and domains where we have shipped production-ready software.',
        'links'       => $industryLinks,
    ],
    'technologies' => [
        'title'       => 'Technologies & Stacks',
        'description' => 'Core technologies and platforms we use across backend, frontend and mobile.',
        'links'       => $technologyLinks,
    ],
    'products' => [
        'title'       => 'Products by QalbIT',
        'description' => 'SaaS products we build, run and operate ourselves.',
        'links'       => $productLinks,
    ],
    'portfolio' => [
        'title'       => 'Portfolio & Case Studies',
        'description' => 'Selected projects, internal products and platforms we have shipped with clients.',
        'links'       => $caseStudyLinks,
    ],
    'tools' => [
        'title'       => 'Free Tools',
        'description' => 'Free calculators and developer utilities built by QalbIT.',
        'links'       => [
            ['label' => 'Software Development Cost Calculator', 'href' => '/tools/software-development-cost-calculator/'],
            ['label' => 'JSON Formatter & Minifier',            'href' => '/tools/json-formatter/'],
        ],
    ],
    'locations' => [
        'title'       => 'Locations We Serve',
        'description' => 'Regional pages for the markets where we deliver custom software, dedicated developers and ongoing support.',
        'links'       => $locationLinks,
    ],
    'careers' => [
        'title'       => 'Careers & Hiring',
        'description' => 'Information for engineers, designers and product people exploring roles at QalbIT.',
        'links'       => [
            ['label' => 'Careers Overview',    'href' => '/career/'],
            ['label' => 'Open Positions',      'href' => '/career/#careers-openings'],
            ['label' => 'Life at QalbIT',      'href' => '/career/#life-at-qalbit'],
            ['label' => 'General Application', 'href' => '/career/apply/'],
        ],
    ],
    'legal' => [
        'title'       => 'Legal & Policies',
        'description' => 'Documents that describe how we handle data, security and website usage.',
        'links'       => [
            ['label' => 'Privacy Policy',     'href' => '/privacy-policy/'],
            ['label' => 'Terms & Conditions', 'href' => '/terms-and-condition/'],
            ['label' => 'Cookie Policy',      'href' => '/cookie-policy/'],
        ],
    ],
];

$totalPages = 0;
foreach ($groups as $group) {
    $totalPages += count($group['links']);
}

$currentPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$currentPath = $currentPath === '/' ? '/' : rtrim($currentPath, '/') . '/';

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
            <p class="mt-2 text-xs font-medium text-slate-500">
                <?= (int) $totalPages ?> pages across <?= count($groups) ?> sections<?= !empty($blogPosts) ? ', plus our latest articles' : '' ?>.
            </p>
        </header>

        <!-- Quick navigation chips -->
        <nav aria-label="Sitemap sections" class="mb-8 sm:mb-10">
            <ul class="flex flex-wrap gap-2">
                <?php foreach ($groups as $key => $group): ?>
                    <li>
                        <a
                            href="#sitemap-<?= htmlspecialchars($key, ENT_QUOTES); ?>"
                            class="inline-flex items-center gap-1.5 rounded-full border border-slate-200 bg-slate-50 px-3 py-1.5 text-xs font-medium text-slate-600 transition-colors hover:border-sky-300 hover:bg-sky-50 hover:text-sky-700"
                        >
                            <?= htmlspecialchars($group['title'], ENT_QUOTES); ?>
                            <span class="rounded-full bg-white px-1.5 text-[10px] font-semibold text-slate-500 ring-1 ring-slate-200">
                                <?= count($group['links']) ?>
                            </span>
                        </a>
                    </li>
                <?php endforeach; ?>
                <?php if (!empty($blogPosts)): ?>
                    <li>
                        <a
                            href="#sitemap-blog"
                            class="inline-flex items-center gap-1.5 rounded-full border border-slate-200 bg-slate-50 px-3 py-1.5 text-xs font-medium text-slate-600 transition-colors hover:border-sky-300 hover:bg-sky-50 hover:text-sky-700"
                        >
                            Latest Articles
                            <span class="rounded-full bg-white px-1.5 text-[10px] font-semibold text-slate-500 ring-1 ring-slate-200">
                                <?= count($blogPosts) ?>
                            </span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>

        <!-- Sitemap groups -->
        <div class="space-y-8 sm:space-y-10">
            <?php foreach ($groups as $key => $group): ?>
                <section
                    id="sitemap-<?= htmlspecialchars($key, ENT_QUOTES); ?>"
                    class="scroll-mt-24 rounded-2xl border border-slate-200 bg-white p-5 shadow-soft sm:p-6"
                >
                    <div class="flex flex-wrap items-baseline gap-x-3 gap-y-1">
                        <h2 class="text-xs font-semibold uppercase tracking-[0.16em] text-sky-700">
                            <?= htmlspecialchars($group['title'], ENT_QUOTES); ?>
                        </h2>
                        <span class="rounded-full bg-slate-100 px-2 py-0.5 text-[10px] font-semibold text-slate-500">
                            <?= count($group['links']) ?> pages
                        </span>
                    </div>

                    <?php if (!empty($group['description'])): ?>
                        <p class="mt-1.5 max-w-xl text-[13px] text-slate-600">
                            <?= htmlspecialchars($group['description'], ENT_QUOTES); ?>
                        </p>
                    <?php endif; ?>

                    <ul class="mt-4 grid gap-x-6 gap-y-2 text-sm sm:grid-cols-2 lg:grid-cols-3">
                        <?php foreach ($group['links'] as $link): ?>
                            <li>
                                <?php
                                $href = $link['href'] ?? '/';
                                $normHref = ($href === '/') ? '/' : rtrim($href, '/') . '/';
                                $isCurrent = ($normHref === $currentPath);
                                ?>

                                <?php if ($isCurrent): ?>
                                    <span class="inline-flex items-center text-[13px] font-semibold text-slate-900" aria-current="page">
                                        <span class="mr-2 h-[3px] w-[3px] flex-none rounded-full bg-sky-600"></span>
                                        <span><?= htmlspecialchars($link['label'], ENT_QUOTES); ?></span>
                                    </span>
                                <?php else: ?>
                                    <a
                                        href="<?= htmlspecialchars($href, ENT_QUOTES); ?>"
                                        class="group inline-flex items-center text-[13px] text-slate-700 transition-colors hover:text-sky-600"
                                    >
                                        <span class="mr-2 h-[3px] w-[3px] flex-none rounded-full bg-slate-300 transition-colors group-hover:bg-sky-500"></span>
                                        <span><?= htmlspecialchars($link['label'], ENT_QUOTES); ?></span>
                                    </a>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </section>
            <?php endforeach; ?>

            <!-- Latest blog articles (from WordPress) -->
            <section
                id="sitemap-blog"
                class="scroll-mt-24 rounded-2xl border border-slate-200 bg-white p-5 shadow-soft sm:p-6"
            >
                <div class="flex flex-wrap items-center justify-between gap-3">
                    <div>
                        <h2 class="text-xs font-semibold uppercase tracking-[0.16em] text-sky-700">
                            Latest from the Blog
                        </h2>
                        <p class="mt-1.5 max-w-xl text-[13px] text-slate-600">
                            Recent articles about custom software, SaaS, costs and product decisions.
                        </p>
                    </div>
                    <a
                        href="/blog/"
                        class="inline-flex flex-none items-center text-[13px] font-semibold text-sky-700 hover:text-sky-600"
                        title="Browse all QalbIT blog articles"
                    >
                        View all articles
                        <span class="ml-1 inline-block" aria-hidden="true">→</span>
                    </a>
                </div>

                <?php if (!empty($blogPosts)): ?>
                    <ul class="mt-4 grid gap-x-6 gap-y-3 text-sm sm:grid-cols-2">
                        <?php foreach ($blogPosts as $post): ?>
                            <?php if (empty($post['url']) || empty($post['title'])) continue; ?>
                            <li>
                                <a
                                    href="<?= htmlspecialchars($post['url'], ENT_QUOTES); ?>"
                                    class="group flex items-baseline gap-2"
                                >
                                    <span class="mt-1 h-[3px] w-[3px] flex-none rounded-full bg-slate-300 transition-colors group-hover:bg-sky-500"></span>
                                    <span class="min-w-0">
                                        <span class="block text-[13px] text-slate-700 transition-colors group-hover:text-sky-600">
                                            <?= htmlspecialchars($post['title'], ENT_QUOTES); ?>
                                        </span>
                                        <?php if (!empty($post['date'])): ?>
                                            <time
                                                datetime="<?= htmlspecialchars(substr($post['date'], 0, 10), ENT_QUOTES); ?>"
                                                class="block text-[11px] text-slate-400"
                                            >
                                                <?= htmlspecialchars(date('M j, Y', strtotime($post['date'])), ENT_QUOTES); ?>
                                            </time>
                                        <?php endif; ?>
                                    </span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p class="mt-4 text-[13px] text-slate-500">
                        Browse all our articles on the
                        <a href="/blog/" class="font-medium text-sky-700 underline underline-offset-4 hover:text-sky-600">QalbIT blog</a>.
                    </p>
                <?php endif; ?>
            </section>
        </div>

        <!-- CTA band -->
        <section class="mt-10 sm:mt-12 rounded-2xl border border-slate-200 bg-gradient-to-br from-white to-slate-50 p-6 sm:p-8">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-[0.16em] text-sky-700">
                        Ready to discuss your project?
                    </p>
                    <h2 class="mt-2 text-lg sm:text-xl font-semibold tracking-tight text-slate-900">
                        Get a project estimate in 24–48 hours
                    </h2>
                    <p class="mt-1 text-sm text-slate-600 max-w-2xl">
                        Share your requirements and we’ll respond with a realistic plan, timeline, and cost range.
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row gap-3 sm:items-center">
                    <a
                        href="/contact-us/"
                        class="inline-flex items-center justify-center rounded-full bg-sky-600 px-5 py-2.5 text-sm font-semibold text-white hover:bg-sky-700 transition-colors"
                    >
                        Get a project estimate
                    </a>
                    <a
                        href="/tools/software-development-cost-calculator/"
                        class="inline-flex items-center justify-center rounded-full border border-slate-300 bg-white px-5 py-2.5 text-sm font-semibold text-slate-900 hover:border-slate-400 transition-colors"
                    >
                        Try the cost calculator
                    </a>
                </div>
            </div>
        </section>
    </div>
</section>
