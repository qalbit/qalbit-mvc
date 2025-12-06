<?php
/**
 * Technologies Hero (Base Technologies Page)
 *
 * Optional:
 * - $hero (array) to override defaults:
 *      [
 *          'breadcrumb_label'     => 'Technologies',
 *          'kicker_prefix'        => 'Technologies',
 *          'kicker_label'         => 'Web, mobile & cloud tech stack',
 *          'kicker_detail'        => 'React · Node.js · Nest.js · Laravel · Flutter · WordPress',
 *          'title'                => 'Web, Mobile & SaaS development tech stack we use at QalbIT.',
 *          'highlight'            => 'Web, Mobile & SaaS',
 *          'intro'                => 'QalbIT focuses on a practical, well-supported set of technologies...',
 *          'primary_cta_label'    => 'Discuss your tech stack',
 *          'primary_cta_href'     => '/contact-us/',
 *          'secondary_cta_label'  => 'View technologies by category',
 *          'secondary_cta_href'   => '#tech-categories',
 *          'snapshot_title'       => 'Tech stack snapshot',
 *          'snapshot'             => [
 *              ['label' => 'Core focus',      'value' => 'Custom web, mobile & SaaS products'],
 *              ['label' => 'Frontend',        'value' => 'React.js, modern JavaScript'],
 *              ['label' => 'Backend & APIs',  'value' => 'Node.js, Nest.js, Laravel'],
 *              ['label' => 'Mobile & CMS',    'value' => 'Flutter, WordPress, headless CMS'],
 *          ],
 *      ]
 */
$technology = $technology ?? [];

// Basic technology-level fields
$technologyName = $technology['name'] ?? 'Technology';
$technologySlug = $technology['slug'] ?? '/technologies/';

// Derive last segment from slug for breadcrumb if label not provided
$slugPath    = trim((string) $technologySlug, '/');
$slugLast    = $slugPath ? basename($slugPath) : 'technology';
$defaultCrumbLabel = ucwords(str_replace('-', ' ', $slugLast));

$heroConfig = $technology['hero'] ?? [];

// Breadcrumb
$breadcrumbLabel = $heroConfig['breadcrumb_label'] ?? $defaultCrumbLabel;

// Kicker / pill
$kickerPrefix = $heroConfig['kicker_prefix'] ?? 'Technologies';
$kickerLabel  = $heroConfig['kicker_label']  ?? 'Web, mobile & cloud tech stack';
$kickerDetail = $heroConfig['kicker_detail'] ?? 'React · Node.js · Nest.js · Laravel · Flutter · WordPress';

// Title & highlight
$title     = $heroConfig['title']     ?? 'Web, Mobile & SaaS development tech stack we use at QalbIT.';
$highlight = $heroConfig['highlight'] ?? 'Web, Mobile & SaaS';

// Intro
$intro = $heroConfig['intro']
    ?? 'QalbIT focuses on a practical, well-supported set of technologies – from React and Node.js to Laravel, Flutter and WordPress – so your product is easier to scale, maintain and hand over to future teams.';

// CTAs
$primaryCtaLabel   = $heroConfig['primary_cta_label']   ?? 'Discuss your tech stack';
$primaryCtaHref    = $heroConfig['primary_cta_href']    ?? '/contact-us/';
$secondaryCtaLabel = $heroConfig['secondary_cta_label'] ?? 'View technologies by category';
$secondaryCtaHref  = $heroConfig['secondary_cta_href']  ?? '#tech-categories';

// Snapshot
$snapshotTitle = $heroConfig['snapshot_title'] ?? 'Tech stack snapshot';

$defaultSnapshot = [
    [
        'label' => 'Core focus',
        'value' => 'Custom web, mobile & SaaS products',
    ],
    [
        'label' => 'Frontend',
        'value' => 'React.js, modern JavaScript',
    ],
    [
        'label' => 'Backend & APIs',
        'value' => 'Node.js, Nest.js, Laravel',
    ],
    [
        'label' => 'Mobile & CMS',
        'value' => 'Flutter, WordPress, headless CMS',
    ],
];

$snapshotItems = $heroConfig['snapshot'] ?? $defaultSnapshot;
?>

<section
    class="relative overflow-hidden bg-slate-50 text-slate-900 py-8 sm:py-20 lg:py-24"
    data-section-technology-hero
>
    <div class="relative mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 space-y-4 md:space-y-10">
        <!-- Breadcrumbs -->
        <nav class="text-xs font-medium text-slate-600" aria-label="Breadcrumb">
            <ol class="flex flex-wrap items-center gap-1">
                <li>
                    <a href="/" class="hover:text-sky-500 transition-colors">Home</a>
                </li>
                <li class="text-slate-400">/</li>
                <li aria-current="page" class="text-slate-900">
                    <?= htmlspecialchars($breadcrumbLabel, ENT_QUOTES); ?>
                </li>
            </ol>
        </nav>

        <div class="grid gap-10 lg:grid-cols-[minmax(0,3fr)_minmax(0,2fr)] lg:items-center">
            <!-- Left: Main hero copy -->
            <div class="space-y-6" data-hero-el>
                <!-- Kicker pill – desktop -->
                <span
                    class="hidden items-center rounded-pill border border-slate-200 bg-white/90 px-3 py-1
                           text-[11px] font-semibold uppercase tracking-[0.14em] text-muted-foreground shadow-soft
                           md:inline-flex"
                >
                    <span class="inline-flex items-center gap-2">
                        <span><?= htmlspecialchars($kickerPrefix, ENT_QUOTES); ?></span>
                        <span class="h-1 w-1 rounded-full bg-sky-400"></span>
                        <span class="opacity-80">
                            <?= htmlspecialchars($kickerLabel, ENT_QUOTES); ?>
                        </span>
                    </span>
                </span>

                <!-- Kicker pill – mobile -->
                <div class="flex justify-center md:justify-start md:hidden">
                    <span
                        class="inline-flex items-center rounded-pill border border-slate-200 bg-white/90 px-3 py-1
                               text-[11px] font-semibold uppercase tracking-[0.14em] text-muted-foreground shadow-soft
                               text-center"
                    >
                        <?= htmlspecialchars($kickerLabel, ENT_QUOTES); ?>
                    </span>
                </div>

                <!-- H1 -->
                <h1 class="text-display-md sm:text-display-lg md:text-display-2xl font-bold text-center md:text-left">
                    <?= $title ?>
                </h1>

                <!-- Intro body -->
                <p class="text-md font-medium text-slate-600 text-center md:text-left px-0 md:px-4 lg:px-2">
                    <?= htmlspecialchars($intro, ENT_QUOTES); ?>
                </p>

                <!-- Optional kicker detail / stack summary -->
                <p class="text-xs text-slate-500 text-center md:text-left">
                    <?= htmlspecialchars($kickerDetail, ENT_QUOTES); ?>
                </p>

                <!-- CTAs -->
                <div class="flex flex-col items-center md:items-start gap-2">
                    <div class="flex flex-col w-full md:flex-row md:flex-wrap items-stretch md:items-center gap-3">
                        <a
                            href="<?= htmlspecialchars($primaryCtaHref, ENT_QUOTES); ?>"
                            class="btn btn-accent btn-radius-pill"
                        >
                            <?= htmlspecialchars($primaryCtaLabel, ENT_QUOTES); ?>
                        </a>

                        <a
                            href="<?= htmlspecialchars($secondaryCtaHref, ENT_QUOTES); ?>"
                            class="btn btn-primary-outline btn-radius-pill"
                        >
                            <?= htmlspecialchars($secondaryCtaLabel, ENT_QUOTES); ?>
                        </a>
                    </div>
                    <p class="text-[11px] text-slate-600 mt-1">
                        Typically responding within <span class="font-semibold">24–48 hours</span>.
                        Share your current tech stack, product stage and timelines.
                    </p>
                </div>
            </div>

            <!-- Right: Snapshot / quick facts -->
            <aside
                class="space-y-4 rounded-3xl border border-slate-300 bg-slate-100/70 p-5 sm:p-6 lg:p-7 backdrop-blur"
                data-hero-el
            >
                <h2 class="text-xs font-semibold uppercase tracking-[0.18em] text-slate-600">
                    <?= htmlspecialchars($snapshotTitle, ENT_QUOTES); ?>
                </h2>

                <dl class="grid grid-cols-2 gap-x-6 gap-y-4 text-xs sm:text-sm">
                    <?php foreach ($snapshotItems as $item): ?>
                        <?php
                            $label = $item['label'] ?? '';
                            $value = $item['value'] ?? '';
                            if ($label === '' && $value === '') {
                                continue;
                            }
                        ?>
                        <div class="space-y-1">
                            <?php if ($label !== ''): ?>
                                <dt class="text-slate-500">
                                    <?= htmlspecialchars($label, ENT_QUOTES); ?>
                                </dt>
                            <?php endif; ?>
                            <?php if ($value !== ''): ?>
                                <dd class="font-medium text-slate-900">
                                    <?= htmlspecialchars($value, ENT_QUOTES); ?>
                                </dd>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </dl>

                <p class="text-[11px] text-slate-500">
                    We start with a short review of your goals, constraints and existing systems,
                    then recommend a practical, future-proof tech stack rather than a one-size-fits-all choice.
                </p>
            </aside>
        </div>
    </div>
</section>
