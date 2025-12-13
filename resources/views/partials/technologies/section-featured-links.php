<?php
/**
 * /technologies/ – Featured links (light section, matches hero)
 * Includes required contextual links incl. /sitemap/
 */

$itemsPrimary = [
    ['label' => 'All services',      'href' => '/services/',     'meta' => 'What we deliver'],
    ['label' => 'See our portfolio', 'href' => '/portfolio/',    'meta' => 'Case studies & proof'],
    ['label' => 'Sitemap',           'href' => '/sitemap/',      'meta' => 'Browse all key pages'],
    ['label' => 'Our Insights',       'href' => '/blog/',        'meta' => 'Read our latest blog posts'],
];

$itemsTech = [
    ['label' => 'Laravel',     'href' => '/technologies/laravel/',     'meta' => 'Backend framework'],
    ['label' => 'Node.js',     'href' => '/technologies/nodejs/',      'meta' => 'APIs & real-time'],
    ['label' => 'Next.js',     'href' => '/technologies/nextjs/',      'meta' => 'SSR web apps'],
    ['label' => 'React',       'href' => '/technologies/reactjs/',     'meta' => 'Frontend engineering'],
    ['label' => 'Flutter',     'href' => '/technologies/flutter/',     'meta' => 'Cross-platform mobile'],
    ['label' => 'AWS',         'href' => '/technologies/aws/',         'meta' => 'Cloud & scaling'],
    ['label' => 'PostgreSQL',  'href' => '/technologies/postgresql/',  'meta' => 'Database engineering'],
    ['label' => 'TypeScript',  'href' => '/technologies/typescript/',  'meta' => 'Type-safe JS stack'],
];

$toUrl = function($href) {
    if (function_exists('route_url')) return route_url($href);
    return $href;
};

$cardClass =
    'group relative rounded-full border border-slate-200 bg-white/90 pl-6 pr-4 py-3 shadow-soft transition ' .
    'hover:border-sky-300/70 hover:bg-white';

$techCardClass = 
    'group relative rounded-sm border border-slate-200 bg-white/90 px-4 py-3 shadow-soft transition ' .
    'hover:border-sky-300/70 hover:bg-white';

$titleClass =
    'text-xs font-semibold text-slate-900 group-hover:text-sky-700 transition-colors';

$metaClass =
    'mt-0.5 text-[11px] leading-2 text-slate-600';

$dotClass =
    'mt-1 h-1.5 w-1.5 flex-none rounded-full bg-sky-400';
?>

<section class="bg-slate-50 pb-10 sm:pb-12" data-tech-featured-links>
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">

        <div class="border-t border-slate-200/70 pt-10">
            <div class="space-y-3">
                <span class="inline-flex items-center rounded-pill border border-slate-200 bg-white/90 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-muted-foreground shadow-soft">
                    Featured links
                    <span class="ml-2 h-1 w-1 rounded-full bg-sky-400"></span>
                    <span class="ml-2 opacity-80">Quick navigation</span>
                </span>

                <h2 class="text-display-sm sm:text-display-md font-bold text-slate-900">
                    Explore our stack, services, and proof
                </h2>

                <p class="text-xs sm:text-sm text-slate-600 max-w-2xl">
                    Jump to the most important hubs and the core technologies we use to ship modern web, mobile and SaaS products.
                </p>
            </div>

            <!-- Primary hubs -->
            <div class="mt-6 grid gap-2 sm:grid-cols-2 lg:grid-cols-4">
                <?php foreach ($itemsPrimary as $item): ?>
                    <a href="<?= htmlspecialchars($toUrl($item['href']), ENT_QUOTES); ?>" class="<?= $cardClass; ?>">
                        <div class="flex items-start justify-between gap-3">
                            <div>
                                <div class="<?= $titleClass; ?>">
                                    <?= htmlspecialchars($item['label'], ENT_QUOTES); ?>
                                </div>
                                <?php if (!empty($item['meta'])): ?>
                                    <div class="<?= $metaClass; ?>">
                                        <?= htmlspecialchars($item['meta'], ENT_QUOTES); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <span class="inline-flex h-9 w-9 items-center justify-center rounded-2xl bg-slate-100 text-slate-400 group-hover:bg-sky-50 group-hover:text-sky-600 transition-colors">
                                →
                            </span>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>

            <!-- Popular technologies -->
            <div class="mt-8">
                <div class="flex items-center justify-between gap-4">
                    <h3 class="text-xs font-semibold uppercase tracking-[0.16em] text-slate-700">
                        Popular technologies
                    </h3>
                    <p class="text-[12px] text-slate-500">
                        These pages connect back to services and case studies.
                    </p>
                </div>

                <div class="mt-4 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                    <?php foreach ($itemsTech as $item): ?>
                        <a href="<?= htmlspecialchars($toUrl($item['href']), ENT_QUOTES); ?>" class="<?= $techCardClass; ?>">
                            <div class="flex items-start justify-between gap-3">
                                <div class="flex gap-2">
                                    <span class="<?= $dotClass; ?>"></span>
                                    <div>
                                        <div class="<?= $titleClass; ?>">
                                            <?= htmlspecialchars($item['label'], ENT_QUOTES); ?>
                                        </div>
                                        <?php if (!empty($item['meta'])): ?>
                                            <div class="<?= $metaClass; ?>">
                                                <?= htmlspecialchars($item['meta'], ENT_QUOTES); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <span class="text-slate-300 group-hover:text-sky-300 transition-colors">→</span>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>
</section>
