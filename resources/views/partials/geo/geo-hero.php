<?php
/** @var array $location */

$sections = $location['sections'] ?? [];
$hero     = $sections['hero'] ?? [];

$seo      = $location['seo'] ?? [];
$summary  = $location['summary'] ?? [];

$stateKey   = $location['state_key']   ?? '';
$stateLabel = $location['short_name']  ?? ($location['name'] ?? '');
$eyebrow    = $hero['eyebrow']        ?? ($summary['eyebrow'] ?? '');
$title      = $hero['title']          ?? ($seo['h1'] ?? ($location['headline'] ?? ''));
$subtitle   = $hero['subtitle']       ?? '';
$body       = $hero['body']           ?? '';

$primaryCta   = $hero['primary_cta']   ?? [];
$secondaryCta = $hero['secondary_cta'] ?? [];
$trust        = $hero['trust']         ?? [];
$theme        = $hero['meta']['theme'] ?? 'light-hero';

// Simple theme-based background classes (extend if needed)
$heroBgClass = $theme === 'dark-hero'
    ? 'bg-slate-950 text-slate-50'
    : 'bg-slate-50 text-slate-900';

$about      = $sections['about'] ?? [];
$highlights = isset($about['highlights']) && is_array($about['highlights'])
    ? $about['highlights']
    : [];

// Take at most 3 highlights with labels
$highlights = array_values(array_filter($highlights, function ($item) {
    return !empty($item['label']);
}));
$highlights = array_slice($highlights, 0, 3);

$countryName = $location['country_name'] ?? 'United States';

$breadcrumbs = isset($seo['breadcrumbs']) && is_array($seo['breadcrumbs'])
    ? $seo['breadcrumbs']
    : [];
?>

<section
    id="<?= htmlspecialchars($hero['id'] ?? 'location-hero', ENT_QUOTES, 'UTF-8') ?>"
    class="relative overflow-hidden bg-slate-50 text-slate-900 py-8 sm:py-20 lg:py-24"
    data-section-location-hero
    data-location-key="<?= htmlspecialchars($stateKey, ENT_QUOTES, 'UTF-8') ?>"
>
    <div class="relative mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 space-y-4 md:space-y-10">
        <?php if (!empty($breadcrumbs)):
            $lastIndex = array_key_last($breadcrumbs);
        ?>
            <!-- Breadcrumbs -->
            <nav class="text-xs font-medium text-slate-600" aria-label="Breadcrumb" data-hero-el>
                <ol class="flex flex-wrap items-center gap-1">
                    <?php foreach ($breadcrumbs as $index => $crumb): ?>
                        <?php
                        $label = $crumb['label'] ?? '';
                        $url   = $crumb['url']   ?? null;

                        if ($label === '') {
                            continue;
                        }
                        ?>

                        <?php if ($index > 0): ?>
                            <li class="text-slate-400">/</li>
                        <?php endif; ?>

                        <li
                            <?php if ($index === $lastIndex): ?>
                                aria-current="page"
                            <?php endif; ?>
                        >
                            <?php if ($index !== $lastIndex && $url): ?>
                                <a
                                    href="<?= htmlspecialchars($url, ENT_QUOTES, 'UTF-8'); ?>"
                                    class="hover:text-sky-500 transition-colors"
                                >
                                    <?= htmlspecialchars($label, ENT_QUOTES, 'UTF-8'); ?>
                                </a>
                            <?php else: ?>
                                <span class="<?= $index === $lastIndex ? 'text-slate-900' : 'text-slate-600'; ?>">
                                    <?= htmlspecialchars($label, ENT_QUOTES, 'UTF-8'); ?>
                                </span>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ol>
            </nav>
        <?php endif; ?>

        <div class="grid gap-12 lg:grid-cols-2 lg:items-center">

            <!-- Text column -->
            <div class="space-y-8">
                <?php if ($eyebrow || $stateLabel): ?>
                    <div class="flex flex-wrap items-center gap-3 text-[11px] font-medium text-sky-700"
                         data-hero-el>
                        <?php if ($eyebrow): ?>
                            <span class="inline-flex items-center rounded-full bg-sky-100 px-3 py-1">
                                <?= htmlspecialchars($eyebrow, ENT_QUOTES, 'UTF-8'); ?>
                            </span>
                        <?php endif; ?>

                        <?php if ($stateLabel): ?>
                            <span class="inline-flex items-center rounded-full border border-sky-200 px-3 py-1 text-[11px] uppercase tracking-wide text-sky-800">
                                <?= htmlspecialchars($stateLabel, ENT_QUOTES, 'UTF-8'); ?>
                            </span>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php if ($title): ?>
                    <h1
                        class="text-display-md sm:text-display-lg md:text-display-2xl font-bold text-center md:text-left"
                        data-hero-el
                    >
                        <?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?>
                    </h1>
                <?php endif; ?>

                <?php if ($subtitle): ?>
                    <p class="text-md font-medium text-slate-600 text-center md:text-left px-0 md:px-4 lg:px-2"
                       data-hero-el>
                        <?= htmlspecialchars($subtitle, ENT_QUOTES, 'UTF-8'); ?>
                    </p>
                <?php endif; ?>

                <?php if ($body): ?>
                    <p class="text-md font-medium text-slate-500 text-center md:text-left px-0 md:px-4 lg:px-2"
                       data-hero-el>
                        <?= nl2br(htmlspecialchars($body, ENT_QUOTES, 'UTF-8')); ?>
                    </p>
                <?php endif; ?>

                <!-- CTAs -->
                <div class="flex flex-wrap items-center gap-4"
                     data-hero-el>
                    <?php if (!empty($primaryCta['url']) && !empty($primaryCta['label'])): ?>
                        <a
                            href="<?= htmlspecialchars($primaryCta['url'], ENT_QUOTES, 'UTF-8'); ?>"
                            class="inline-flex items-center justify-center rounded-full bg-sky-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-sky-700 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-sky-500 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-50"
                        >
                            <?= htmlspecialchars($primaryCta['label'], ENT_QUOTES, 'UTF-8'); ?>
                        </a>
                    <?php endif; ?>

                    <?php if (!empty($secondaryCta['url']) && !empty($secondaryCta['label'])): ?>
                        <a
                            href="<?= htmlspecialchars($secondaryCta['url'], ENT_QUOTES, 'UTF-8'); ?>"
                            class="inline-flex items-center justify-center rounded-full border border-slate-300 px-5 py-2.5 text-sm font-semibold text-slate-900 transition hover:border-sky-400 hover:text-sky-900 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-sky-500 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-50"
                        >
                            <?= htmlspecialchars($secondaryCta['label'], ENT_QUOTES, 'UTF-8'); ?>
                        </a>
                    <?php endif; ?>
                </div>

                <!-- Trust strip -->
                <?php if (!empty($trust['label']) || !empty($trust['items'])): ?>
                    <div class="space-y-3 pt-4"
                         data-hero-el>
                        <?php if (!empty($trust['label'])): ?>
                            <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">
                                <?= htmlspecialchars($trust['label'], ENT_QUOTES, 'UTF-8'); ?>
                            </p>
                        <?php endif; ?>

                        <?php if (!empty($trust['items']) && is_array($trust['items'])): ?>
                            <div class="flex flex-wrap gap-x-6 gap-y-2 text-sm text-slate-600">
                                <?php foreach ($trust['items'] as $item): ?>
                                    <?php if (empty($item['label'])) continue; ?>
                                    <div class="inline-flex items-center gap-2">
                                        <span class="inline-block h-1.5 w-1.5 rounded-full bg-sky-500"></span>
                                        <span><?= htmlspecialchars($item['label'], ENT_QUOTES, 'UTF-8'); ?></span>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="relative lg:justify-self-end"
                data-hero-el>
                <div class="mx-auto max-w-md">
                    <div class="relative overflow-hidden rounded-3xl border border-slate-200 bg-slate-900 text-slate-50 shadow-xl">
                        <!-- Gradient / pattern background -->
                        <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_top,_rgba(56,189,248,0.18),_transparent_55%),_radial-gradient(circle_at_bottom,_rgba(129,140,248,0.22),_transparent_55%)]"
                            aria-hidden="true"></div>

                        <div class="relative flex flex-col gap-6 px-6 py-6 sm:px-8 sm:py-8">
                            <div class="space-y-2">
                                <p data-hero-el class="text-xs font-semibold uppercase tracking-[0.18em] text-sky-300">
                                    Remote partner · <?= htmlspecialchars($countryName, ENT_QUOTES, 'UTF-8'); ?>
                                </p>
                                <h2 data-hero-el class="text-lg font-semibold">
                                    Building software for <?= htmlspecialchars($stateLabel ?: 'US-based', ENT_QUOTES, 'UTF-8'); ?> teams
                                </h2>
                                <p data-hero-el class="text-sm text-slate-200/80">
                                    We align with your time zone, roadmap and stakeholders while leveraging a senior offshore squad for execution.
                                </p>
                            </div>

                            <?php if (!empty($highlights)): ?>
                                <dl data-hero-el class="grid grid-cols-1 gap-3 text-sm sm:grid-cols-2">
                                    <?php foreach ($highlights as $highlight): ?>
                                        <div class="flex items-start gap-2">
                                            <span class="mt-1.5 inline-block flex-shrink-0 h-1.5 w-1.5 rounded-full bg-sky-400"></span>
                                            <div class="space-y-0.5">
                                                <dt class="font-medium text-slate-50">
                                                    <?= htmlspecialchars($highlight['label'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
                                                </dt>
                                                <?php if (!empty($highlight['description'])): ?>
                                                    <dd class="text-xs text-slate-200/75">
                                                        <?= htmlspecialchars($highlight['description'], ENT_QUOTES, 'UTF-8'); ?>
                                                    </dd>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </dl>
                            <?php endif; ?>

                            <div data-hero-el class="flex items-center justify-between pt-1 text-xs text-slate-400">
                                <span>12+ years in custom software</span>
                                <span>US-friendly collaboration</span>
                            </div>
                        </div>
                    </div>

                    <p data-hero-el class="mt-3 text-xs text-slate-500">
                        Planning a project in <?= htmlspecialchars($stateLabel ?: 'the US', ENT_QUOTES, 'UTF-8'); ?>?
                        Let us plug in as your remote product team from day one.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
