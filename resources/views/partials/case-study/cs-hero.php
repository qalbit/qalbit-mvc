<?php
/**
 * Generic Case Study Hero (CS1)
 *
 * Reusable hero for all case studies.
 *
 * Expects:
 * - $caseStudy (array) from config('case_studies')['slug']
 *
 * Example structure:
 * [
 *   'slug'     => '/case-studies/snappy-stats/',
 *   'name'     => 'Snappy Stats – Shooting Academy Scheduling App',
 *   'h1'       => 'Snappy Stats – Scheduling Management Web Application (Case Study)',
 *   'summary'  => 'Short summary used in listings…',
 *   'industry' => 'Sports / Training & Education',
 *   'location' => 'Europe (Remote collaboration)',
 *   'banner'   => '/images/case-studies/snappystat-webapp.png',
 *   'bannerAlt'=> 'Snappy Stats dashboard UI',
 *   'sections' => [
 *       'hero' => [
 *           'eyebrow'  => 'Case Study · Sports & Training',
 *           'title'    => 'Snappy Stats – Scheduling management web app for a growing shooting academy',
 *           'subtitle' => 'Replacing spreadsheets and manual coordination with a centralised, real-time scheduling platform…',
 *           'primary_cta' => [
 *               'label' => 'Discuss a similar project',
 *               'href'  => '/contact-us/?ref=cs-snappy-stats',
 *           ],
 *           'secondary_cta' => [
 *               'label' => 'View all case studies',
 *               'href'  => '/case-studies/',
 *           ],
 *           'snapshot_cards' => [
 *               ['label' => 'Industry', 'value' => 'Shooting academy · Sports training'],
 *               // …
 *           ],
 *           'hero_media' => [
 *               'type' => 'image',
 *               'src'  => '/images/case-studies/snappystat-webapp.png',
 *               'alt'  => 'Snappy Stats scheduling board',
 *           ],
 *       ],
 *   ],
 * ]
 */

// Ensure array exists
$caseStudy = $caseStudy ?? [];

// Basic fields
$caseStudyName  = $caseStudy['name'] ?? 'Case study';
$caseStudySlug  = $caseStudy['slug'] ?? '/case-studies/';
$caseStudyH1    = $caseStudy['h1']   ?? $caseStudyName;
$caseStudyShort = $caseStudy['summary'] ?? 'QalbIT helps teams replace spreadsheets with custom web applications tailored to their operations.';

$caseStudyIndustry = $caseStudy['industry'] ?? null;
$caseStudyLocation = $caseStudy['location'] ?? null;
$caseStudyBanner   = $caseStudy['banner'] ?? null;
$caseStudyBannerAlt= $caseStudy['bannerAlt'] ?? ($caseStudyName . ' product UI');

// Hero config
$heroConfig = $caseStudy['sections']['hero'] ?? [];

// Breadcrumb label (from config or slug)
$slugPath  = trim((string) $caseStudySlug, '/');                   // case-studies/snappy-stats
$slugLast  = $slugPath ? basename($slugPath) : 'case-study';       // snappy-stats
$defaultCrumbLabel = ucwords(str_replace(['-', '_'], ' ', $slugLast));

$breadcrumbLabel = $heroConfig['breadcrumb_label'] ?? $caseStudyName ?? $defaultCrumbLabel;

// Eyebrow / kicker
$eyebrow = $heroConfig['eyebrow'] ?? 'Case Study';

// Title (allowing inline HTML, so do not escape)
$title = $heroConfig['title'] ?? $caseStudyH1;

// Subtitle
$subtitle = $heroConfig['subtitle'] ?? $caseStudyShort;

// CTAs
$primaryCtaLabel = $heroConfig['primary_cta']['label'] ?? 'Discuss your project';
$primaryCtaHref  = $heroConfig['primary_cta']['href']  ?? '/contact-us/';

$secondaryCtaLabel = $heroConfig['secondary_cta']['label'] ?? 'View all case studies';
$secondaryCtaHref  = $heroConfig['secondary_cta']['href']  ?? '/case-studies/';

// Hero media (fallback to banner)
$heroMediaConfig = $heroConfig['hero_media'] ?? [];
$heroMediaType   = $heroMediaConfig['type'] ?? 'image';
$heroMediaSrc    = $heroMediaConfig['src']  ?? $caseStudyBanner;
$heroMediaAlt    = $heroMediaConfig['alt']  ?? $caseStudyBannerAlt;

// Snapshot cards – fallback using top-level case study fields
$defaultSnapshot = array_values(array_filter([
    $caseStudyIndustry ? ['label' => 'Industry', 'value' => $caseStudyIndustry] : null,
    $caseStudyLocation ? ['label' => 'Region',  'value' => $caseStudyLocation] : null,
    $caseStudyBanner   ? ['label' => 'Platform','value' => 'Custom web application'] : null,
]));

$snapshotCards = $heroConfig['snapshot_cards'] ?? $defaultSnapshot;

// If still empty, provide minimal defaults
if (empty($snapshotCards)) {
    $snapshotCards = [
        ['label' => 'Industry', 'value' => 'Software & digital products'],
        ['label' => 'Region',   'value' => 'Global'],
    ];
}
?>

<section
    class="relative overflow-hidden bg-slate-50 text-slate-900 py-6 sm:py-10 lg:py-14"
    data-cs-section="hero"
>
    <div class="relative mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 space-y-6 md:space-y-10">
        <!-- Breadcrumbs -->
        <nav class="text-[11px] sm:text-xs font-medium text-slate-600" aria-label="Breadcrumb">
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

        <div class="grid gap-6 lg:grid-cols-[minmax(0,3fr)_minmax(0,2.4fr)] lg:items-center">
            <!-- Left: Main hero copy -->
            <div class="space-y-4" data-cs-hero-el="copy">
                <!-- Eyebrow / kicker -->
                <div class="flex flex-wrap items-center gap-2">
                    <span
                        class="inline-flex items-center rounded-pill border border-slate-200 bg-white/80 px-3 py-1
                               text-[11px] font-semibold uppercase tracking-[0.14em] text-slate-600 shadow-soft"
                    >
                        <?= htmlspecialchars($eyebrow, ENT_QUOTES); ?>
                    </span>

                    <?php if (!empty($caseStudyIndustry)): ?>
                        <span class="hidden text-xs text-slate-500 sm:inline-flex">
                            <?= htmlspecialchars($caseStudyIndustry, ENT_QUOTES); ?>
                        </span>
                    <?php endif; ?>
                </div>

                <!-- H1 -->
                <h1
                    class="text-display-sm sm:text-display-md md:text-display-lg font-bold text-center md:text-left"
                    data-cs-hero-el="title"
                >
                    <?= $title ?>
                </h1>

                <!-- Subtitle -->
                <?php if (!empty($subtitle)): ?>
                    <p
                        class="max-w-2xl text-sm sm:text-md font-medium text-slate-600 text-pretty"
                        data-cs-hero-el="subtitle"
                    >
                        <?= htmlspecialchars($subtitle, ENT_QUOTES); ?>
                    </p>
                <?php endif; ?>

                <!-- Snapshot (stacked on mobile, left column on desktop) -->
                <?php if (!empty($snapshotCards)): ?>
                    <div
                        class="mt-2 grid gap-4 sm:grid-cols-2"
                        data-cs-hero-el="snapshot-inline"
                    >
                        <?php foreach ($snapshotCards as $item): ?>
                            <?php
                                $label = $item['label'] ?? '';
                                $value = $item['value'] ?? '';
                                if ($label === '' && $value === '') {
                                    continue;
                                }
                            ?>
                            <div class="rounded-md border border-slate-200 bg-white/70 p-2 sm:p-4 shadow-soft-sm">
                                <?php if ($label !== ''): ?>
                                    <div class="text-[10px] font-semibold uppercase tracking-[0.16em] text-slate-500">
                                        <?= htmlspecialchars($label, ENT_QUOTES); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ($value !== ''): ?>
                                    <div class="mt-0.5 text-xs font-semibold text-slate-900">
                                        <?= htmlspecialchars($value, ENT_QUOTES); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <!-- CTAs -->
                <div class="pt-2 space-y-2" data-cs-hero-el="ctas">
                    <div class="flex flex-col gap-3 sm:flex-row sm:flex-wrap sm:items-center">
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

                    <p class="text-[11px] text-slate-500">
                        Share your current scheduling, operations or product challenges and we&apos;ll respond
                        within <span class="font-semibold">24–48 hours</span> with practical next steps.
                    </p>
                </div>
            </div>

            <!-- Right: Hero media (screenshot) -->
            <div
                class="relative"
                data-cs-hero-el="media"
            >
                <div
                    class="relative overflow-hidden rounded-3xl border border-slate-200 bg-slate-900/95
                           shadow-xl shadow-slate-900/20"
                >
                    <?php if ($heroMediaType === 'image' && $heroMediaSrc): ?>
                        <img
                            src="<?= asset(htmlspecialchars($heroMediaSrc, ENT_QUOTES)); ?>"
                            alt="<?= htmlspecialchars($heroMediaAlt, ENT_QUOTES); ?>"
                            class="block h-full w-full object-cover"
                            loading="lazy"
                        />
                    <?php else: ?>
                        <!-- Fallback placeholder -->
                        <div class="aspect-video flex items-center justify-center bg-slate-800 text-slate-400 text-xs">
                            Case study hero visual
                        </div>
                    <?php endif; ?>

                    <!-- Optional overlay label -->
                    <div
                        class="pointer-events-none absolute inset-x-4 bottom-4 flex items-center justify-between
                               rounded-sm bg-slate-900/80 px-2 py-2.5 text-[10px] text-slate-100 backdrop-blur"
                    >
                        <span class="font-medium">
                            <?= htmlspecialchars($caseStudyName, ENT_QUOTES); ?>
                        </span>
                        <?php if (!empty($caseStudyLocation)): ?>
                            <span class="hidden sm:inline text-end text-slate-300">
                                <?= htmlspecialchars($caseStudyLocation, ENT_QUOTES); ?>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
