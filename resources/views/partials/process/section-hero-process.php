<?php
// Expecting $process to contain the Start-up MVP config (e.g. config('process.start-up-mvp')).

$hero    = $process['hero'] ?? [];
$name    = $process['name'] ?? 'Start-up MVP';
$h1      = $process['h1'] ?? 'Startup MVP Development Company';

// Hero text pieces
$eyebrow       = $hero['eyebrow']        ?? 'Startup MVP development';
$kickerPrefix  = $hero['kicker_prefix']  ?? 'Services';
$kickerLabel   = $hero['kicker_label']   ?? $name;
$kickerDetail  = $hero['kicker_detail']  ?? 'SaaS · Web · Mobile';
$title         = $hero['title']          ?? $h1 . ' for <span class="text-gradient-brand-animated">SaaS and product teams</span>.';
$intro         = $hero['intro']          ?? ($process['hero_intro'] ?? 'QalbIT helps founders design, build and ship their first MVP in weeks, not months – across SaaS, web and mobile, with clean, scalable code you fully own.');

// Bullets / who it is for
$bullets = $hero['bullets'] ?? ($process['ideal_for'] ?? [
    'Non-technical founders who need a reliable MVP development agency.',
    'Product managers validating new ideas with a focused MVP scope.',
    'CTOs and tech leads who want a small, stable squad of MVP developers.',
]);

// CTAs with fallbacks
$primaryCtaHref  = $hero['primary_cta']['href']  ?? '#mvp-final-cta';
$primaryCtaLabel = $hero['primary_cta']['label'] ?? 'Discuss your MVP';

$secondaryCtaHref  = $hero['secondary_cta']['href']  ?? '#mvp-proof';
$secondaryCtaLabel = $hero['secondary_cta']['label'] ?? 'See MVP case studies';

// Internal links
$internalLinks = $hero['internal_links'] ?? [
    ['label' => 'Explore our services',  'href' => '/services/'],
    ['label' => 'View case studies',     'href' => '/case-studies/'],
    ['label' => 'Contact our team',      'href' => '/contact-us/'],
];

// Trust strip
$trust          = $hero['trust'] ?? [];
$ratingLabel    = $trust['rating_label'] ?? '5.0/5';
$ratingText     = $trust['rating_text']  ?? 'rating from startup founders';
$trustSources   = $trust['sources']      ?? ['Clutch', 'Upwork', 'Google Reviews'];
$trustLocation  = $trust['location']     ?? 'Based in Ahmedabad, India, working with founders in the UK, Europe, Middle East and beyond.';

// Snapshot / dashboard block
$defaultSnapshotItems = [
    [
        'label' => 'Time to MVP',
        'value' => '10–12',
        'note'  => 'weeks avg.',
    ],
    [
        'label' => 'Launch success',
        'value' => '96%',
        'note'  => 'go live on time',
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
];

$snapshot       = $hero['snapshot'] ?? [];
$snapshotTitle  = $snapshot['title'] ?? 'MVP dashboard snapshot';
$snapshotItems  = $snapshot['items'] ?? $defaultSnapshotItems;

// Ensure we have at least 4 items
if (!is_array($snapshotItems) || count($snapshotItems) < 4) {
    $snapshotItems = $defaultSnapshotItems;
}

// Map snapshot items to layout slots
$metric1 = $snapshotItems[0] ?? $defaultSnapshotItems[0];
$metric2 = $snapshotItems[1] ?? $defaultSnapshotItems[1];
$metric3 = $snapshotItems[2] ?? $defaultSnapshotItems[2];
$engage  = $snapshotItems[3] ?? $defaultSnapshotItems[3];

// Breadcrumbs (align with other service/process pages)
$breadcrumbLabel        = $hero['breadcrumb_label']        ?? $name;
?>

<section
    id="mvp-hero"
    data-mvp-section="s1"
    class="relative overflow-hidden bg-slate-50 text-slate-900 py-8 sm:py-16 lg:py-20"
>
    <div class="relative mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 space-y-4 md:space-y-10">
        <!-- Breadcrumbs -->
        <nav class="text-xs font-medium text-slate-600" aria-label="Breadcrumb">
            <ol class="flex flex-wrap items-center gap-1">
                <li>
                    <a href="/" class="transition-colors hover:text-sky-300">Home</a>
                </li>
                <li class="text-slate-900">/</li>
                <li aria-current="page" class="text-slate-900">
                    <?= htmlspecialchars($breadcrumbLabel, ENT_QUOTES, 'UTF-8'); ?>
                </li>
            </ol>
        </nav>

        <div class="grid gap-10 lg:grid-cols-[minmax(0,3fr)_minmax(0,2fr)] lg:items-center">
            <!-- Copy -->
            <div class="space-y-6" data-mvp-hero-el="copy">
                <!-- Desktop pill -->
                <span
                    class="hidden items-center rounded-pill border border-slate-200 bg-white/90 px-3 py-1
                           text-[11px] font-semibold uppercase tracking-[0.14em] text-muted-foreground shadow-soft
                           md:inline-flex"
                >
                    <?= htmlspecialchars($kickerPrefix, ENT_QUOTES, 'UTF-8'); ?>
                    <span class="ml-2 h-1 w-1 rounded-full bg-sky-400"></span>
                    <span class="ml-2 opacity-80">
                        <?= htmlspecialchars($kickerDetail, ENT_QUOTES, 'UTF-8'); ?>
                    </span>
                </span>

                <!-- Mobile pill (centered) -->
                <div class="flex justify-center md:justify-start md:hidden">
                    <span
                        class="inline-flex items-center rounded-pill border border-slate-200 bg-white/90 px-3 py-1
                               text-[11px] font-semibold uppercase tracking-[0.14em] text-muted-foreground shadow-soft
                               text-center"
                    >
                        <?= htmlspecialchars($kickerDetail, ENT_QUOTES, 'UTF-8'); ?>
                    </span>
                </div>

                <div class="space-y-4">
                    <h1 class="text-display-md sm:text-display-lg md:text-display-2xl font-bold text-center md:text-left">
                        <?= $title; ?>
                    </h1>

                    <p class="text-md font-medium text-slate-600 text-center md:text-left px-0 md:px-4 lg:px-2">
                        <?= htmlspecialchars($intro, ENT_QUOTES, 'UTF-8'); ?>
                    </p>

                    <?php if (!empty($bullets) && is_array($bullets)): ?>
                        <ul class="space-y-1 text-sm text-slate-600">
                            <?php foreach ($bullets as $bullet): ?>
                                <li class="flex gap-2">
                                    <span class="mt-1.5 inline-flex h-1.5 w-1.5 flex-none rounded-full bg-primary"></span>
                                    <span><?= htmlspecialchars($bullet, ENT_QUOTES, 'UTF-8'); ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>

                <!-- CTAs -->
                <div class="flex flex-col items-center md:items-start gap-2">
                    <div class="flex flex-col w-full md:flex-row md:flex-wrap items-stretch md:items-center gap-3">
                        <a
                            href="<?= htmlspecialchars($primaryCtaHref, ENT_QUOTES, 'UTF-8'); ?>"
                            class="btn btn-accent btn-radius-pill"
                            data-mvp-cta="primary"
                        >
                            <?= htmlspecialchars($primaryCtaLabel, ENT_QUOTES, 'UTF-8'); ?>
                        </a>

                        <a
                            href="<?= htmlspecialchars($secondaryCtaHref, ENT_QUOTES, 'UTF-8'); ?>"
                            class="btn btn-primary-outline btn-radius-pill"
                            data-mvp-cta="secondary"
                        >
                            <?= htmlspecialchars($secondaryCtaLabel, ENT_QUOTES, 'UTF-8'); ?>
                        </a>
                    </div>
                    <p class="text-[11px] text-slate-600">
                        Typically responding within <span class="font-semibold">24–48 hours</span>.
                    </p>
                </div>

                <!-- Internal links helper -->
                <?php if (!empty($internalLinks) && is_array($internalLinks)): ?>
                    <p class="pt-1 text-xs text-slate-500 sm:text-sm">
                        Looking for something specific?
                        <?php foreach ($internalLinks as $index => $link): ?>
                            <?php
                            $label = $link['label'] ?? '';
                            $href  = $link['href']  ?? '#';
                            if ($label === '') {
                                continue;
                            }
                            ?>
                            <?php if ($index > 0): ?>, <?php endif; ?>
                            <a
                                href="<?= htmlspecialchars($href, ENT_QUOTES, 'UTF-8'); ?>"
                                class="font-medium text-primary hover:underline"
                            >
                                <?= htmlspecialchars($label, ENT_QUOTES, 'UTF-8'); ?>
                            </a>
                        <?php endforeach; ?>
                        .
                    </p>
                <?php endif; ?>

                <!-- Trust strip -->
                <div
                    class="mt-4 flex flex-wrap items-center gap-4 rounded-2xl bg-white/80 p-4 text-xs text-slate-600 shadow-sm ring-1 ring-slate-200 sm:text-sm"
                    data-mvp-hero-el="trust"
                >
                    <div class="flex items-center gap-2">
                        <div class="flex items-center gap-0.5 text-amber-400" aria-hidden="true">
                            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                        </div>
                        <p>
                            <span class="font-semibold text-slate-900">
                                <?= htmlspecialchars($ratingLabel, ENT_QUOTES, 'UTF-8'); ?>
                            </span>
                            <span class="text-slate-500">
                                <?= htmlspecialchars($ratingText, ENT_QUOTES, 'UTF-8'); ?>
                            </span>
                        </p>
                    </div>

                    <div class="flex flex-wrap items-center gap-3">
                        <p class="text-slate-500">
                            Trusted on
                            <?php if (!empty($trustSources) && is_array($trustSources)): ?>
                                <?php foreach ($trustSources as $i => $source): ?>
                                    <span class="font-medium text-slate-800">
                                        <?= htmlspecialchars($source, ENT_QUOTES, 'UTF-8'); ?>
                                    </span><?= $i < count($trustSources) - 1 ? ',' : '.'; ?>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <span class="font-medium text-slate-800">Clutch</span>,
                                <span class="font-medium text-slate-800">Upwork</span> and
                                <span class="font-medium text-slate-800">Google Reviews</span>.
                            <?php endif; ?>
                        </p>
                    </div>

                    <p class="text-xs text-slate-600">
                        <?= htmlspecialchars($trustLocation, ENT_QUOTES, 'UTF-8'); ?>
                    </p>
                </div>
            </div>

            <!-- Snapshot / visual -->
            <div
                class="space-y-4 rounded-3xl border border-slate-300 bg-slate-100/70 p-5 sm:p-6 lg:p-7 backdrop-blur"
                data-mvp-hero-el="visual"
            >
                <h2 class="text-xs font-semibold uppercase tracking-[0.18em] text-slate-600">
                    <?= htmlspecialchars($snapshotTitle, ENT_QUOTES, 'UTF-8'); ?>
                </h2>
                <dl class="grid grid-cols-2 gap-x-6 gap-y-4 text-xs sm:text-sm">
                    <div class="space-y-1">
                        <dt class="text-slate-500">
                            <?= htmlspecialchars($metric1['label'] ?? 'Time to MVP', ENT_QUOTES, 'UTF-8'); ?>
                        </dt>
                        <dd class="font-medium text-slate-900">
                            <?= htmlspecialchars($metric1['value'] ?? '10–12', ENT_QUOTES, 'UTF-8'); ?>
                            <?php if (!empty($metric1['note'])): ?>
                                <span class="ml-1 text-[11px] text-slate-500">
                                    <?= htmlspecialchars($metric1['note'], ENT_QUOTES, 'UTF-8'); ?>
                                </span>
                            <?php endif; ?>
                        </dd>
                    </div>
                    <div class="space-y-1">
                        <dt class="text-slate-500">
                            <?= htmlspecialchars($metric2['label'] ?? 'Launch success', ENT_QUOTES, 'UTF-8'); ?>
                        </dt>
                        <dd class="font-semibold text-accent-800">
                            <?= htmlspecialchars($metric2['value'] ?? '96%', ENT_QUOTES, 'UTF-8'); ?>
                            <?php if (!empty($metric2['note'])): ?>
                                <span class="ml-1 text-[11px] text-slate-500">
                                    <?= htmlspecialchars($metric2['note'], ENT_QUOTES, 'UTF-8'); ?>
                                </span>
                            <?php endif; ?>
                        </dd>
                    </div>
                    <div class="space-y-1">
                        <dt class="text-slate-500">
                            <?= htmlspecialchars($metric3['label'] ?? 'Stack', ENT_QUOTES, 'UTF-8'); ?>
                        </dt>
                        <dd class="font-medium text-slate-900">
                            <?= htmlspecialchars($metric3['value'] ?? 'Laravel · React · Flutter', ENT_QUOTES, 'UTF-8'); ?>
                        </dd>
                    </div>
                    <div class="space-y-1">
                        <dt class="text-slate-500">
                            <?= htmlspecialchars($engage['label'] ?? 'Engagement model', ENT_QUOTES, 'UTF-8'); ?>
                        </dt>
                        <dd class="font-medium text-slate-900">
                            <?= htmlspecialchars($engage['value'] ?? 'Prototype sprint → MVP build → Scale-up squad', ENT_QUOTES, 'UTF-8'); ?>
                        </dd>
                    </div>
                </dl>
                <p class="text-[11px] text-slate-500">
                    <?php if (!empty($engage['note'])): ?>
                        <?= htmlspecialchars($engage['note'], ENT_QUOTES, 'UTF-8'); ?>
                    <?php else: ?>
                        Designed for startup budgets with clear milestones, ownership and a clean path from MVP to product scaling.
                    <?php endif; ?>
                </p>
            </div>
        </div>
    </div>
</section>
