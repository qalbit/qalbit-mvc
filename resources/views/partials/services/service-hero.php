<?php
/**
 * Generic Service Hero (Section S1)
 *
 * Expects:
 * - $service (array) from config('services')
 *      [
 *          'name'              => 'SaaS Development',
 *          'slug'              => '/services/saas/',
 *          'category'          => 'core' | 'support' | 'ai' | ...,
 *          'hero' => [
 *              'kicker_prefix' => 'Services',
 *              'kicker_label'  => 'SaaS product & platform development',
 *              'kicker_detail' => 'Multi-tenant · Subscription · Cloud-native',
 *              'title'         => 'SaaS Application Development Services for Subscription & B2B Products.',
 *              'highlight'     => 'Subscription & B2B Products',
 *              'intro'         => 'QalbIT helps you plan, design, build and scale secure, multi-tenant SaaS products...',
 *              'primary_cta_label'   => 'Discuss your SaaS product',
 *              'primary_cta_href'    => '/contact-us/',
 *              'secondary_cta_label' => 'See SaaS-style case studies',
 *              'secondary_cta_href'  => '/case-studies/',
 *              'snapshot_title'      => 'SaaS snapshot',
 *              'snapshot' => [
 *                  ['label' => 'Core focus',        'value' => 'SaaS & subscription platforms'],
 *                  ['label' => 'Typical engagements','value' => 'MVPs, rebuilds, long-term product teams'],
 *                  ['label' => 'Architecture',      'value' => 'Multi-tenant, API-first, cloud-native'],
 *                  ['label' => 'Product areas',     'value' => 'Billing, onboarding, analytics, integrations'],
 *              ],
 *          ],
 *      ]
 */

$service = $service ?? [];

// Basic service-level fields
$serviceName = $service['name'] ?? 'Service';
$serviceSlug = $service['slug'] ?? '/services/';

// Derive last segment from slug for breadcrumb if label not provided
$slugPath    = trim((string) $serviceSlug, '/');              // services/saas
$slugLast    = $slugPath ? basename($slugPath) : 'service';   // saas
$defaultCrumbLabel = ucwords(str_replace('-', ' ', $slugLast)); // SaaS

$heroConfig = $service['hero'] ?? [];

// Breadcrumb label override if provided
$breadcrumbLabel = $heroConfig['breadcrumb_label'] ?? $defaultCrumbLabel;

// Kicker / pill
$kickerPrefix = $heroConfig['kicker_prefix'] ?? 'Services';
$kickerLabel  = $heroConfig['kicker_label']  ?? $serviceName . ' development';
$kickerDetail = $heroConfig['kicker_detail'] ?? 'Custom software, web, mobile & cloud';

// Title & highlight
$title = $heroConfig['title']
    ?? ($serviceName . ' Development Services for Web, Mobile & Cloud.');
$highlight = $heroConfig['highlight'] ?? 'Web, Mobile & Cloud';

// Intro
$intro = $heroConfig['intro']
    ?? 'QalbIT helps you plan, design, build and maintain secure, scalable software – combining architecture, UX, APIs and delivery in one accountable team.';

// CTAs
$primaryCtaLabel   = $heroConfig['primary_cta_label']   ?? 'Book a free consultation';
$primaryCtaHref    = $heroConfig['primary_cta_href']    ?? '/contact-us/';
$secondaryCtaLabel = $heroConfig['secondary_cta_label'] ?? 'View recent work';
$secondaryCtaHref  = $heroConfig['secondary_cta_href']  ?? '/case-studies/';

// Snapshot
$snapshotTitle = $heroConfig['snapshot_title'] ?? $serviceName . ' snapshot';

$defaultSnapshot = [
    ['label' => 'Core focus',        'value' => $serviceName],
    ['label' => 'Typical engagements','value' => 'MVPs, rebuilds, product teams'],
    ['label' => 'Architecture',      'value' => 'API-first, cloud-native, secure'],
    ['label' => 'Product areas',     'value' => 'Core flows, integrations, analytics'],
];

$snapshotItems = $heroConfig['snapshot'] ?? $defaultSnapshot;
?>

<section
    class="relative overflow-hidden bg-slate-50 text-slate-900 py-8 sm:py-20 lg:py-24"
    data-section-service-hero
>
    <div class="relative mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 space-y-4 md:space-y-10">
        <!-- Breadcrumbs -->
        <nav class="text-xs font-medium text-slate-600" aria-label="Breadcrumb">
            <ol class="flex flex-wrap items-center gap-1">
                <li>
                    <a href="/" class="hover:text-sky-500 transition-colors">Home</a>
                </li>
                <li class="text-slate-400">/</li>
                <li>
                    <a href="/services/" class="hover:text-sky-500 transition-colors">Services</a>
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
                        Share your current product stage, tech stack and timelines.
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
                    We typically start with a short discovery to understand your goals, constraints,
                    existing stack and timelines – then propose a practical roadmap across architecture,
                    UX and delivery.
                </p>
            </aside>
        </div>
    </div>
</section>
