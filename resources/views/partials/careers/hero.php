<?php
/**
 * Careers Hero (C1)
 *
 * Expects:
 * - $page     (array) from config('careers.page')
 * - $sections (array) from config('careers.sections')
 */

$page       = $page       ?? [];
$sections   = $sections   ?? [];
$heroConfig = $sections['hero'] ?? [];

$eyebrow  = $heroConfig['eyebrow']  ?? 'Careers at QalbIT';
$title    = $heroConfig['title']    ?? ($page['h1'] ?? 'Careers at QalbIT – work on real products, not just tickets.');
$subtitle = $heroConfig['subtitle'] ?? ($page['summary'] ?? '');

$primaryCta   = $heroConfig['primary_cta']   ?? [];
$secondaryCta = $heroConfig['secondary_cta'] ?? [];

$primaryCtaLabel   = $primaryCta['label'] ?? 'View open positions';
$primaryCtaHref    = $primaryCta['href']  ?? '#careers-openings';
$secondaryCtaLabel = $secondaryCta['label'] ?? 'Learn about life at QalbIT';
$secondaryCtaHref  = $secondaryCta['href']  ?? '#life-at-qalbit';

$badges = $heroConfig['badges'] ?? [
    '11+ years shipping software',
    '120+ projects',
    'Product-focused small team',
];

$heroMedia = $heroConfig['hero_media'] ?? [
    'type' => 'image',
    'src'  => '/images/careers/hero-illustration.avif',
    'alt'  => 'Developers collaborating on product UI at QalbIT',
];
?>

<section
    id="<?= htmlspecialchars($heroConfig['id'] ?? 'careers-hero', ENT_QUOTES); ?>"
    class="relative overflow-hidden bg-slate-50 text-slate-900 py-8 sm:py-10 lg:py-12"
    data-careers-section="hero"
>
    <div class="relative mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-8 lg:grid-cols-[minmax(0,3fr)_minmax(0,2.4fr)] lg:items-center">

            <!-- Left: copy -->
            <div class="space-y-4" data-careers-el="hero-copy">
                <?php if (!empty($eyebrow)): ?>
                    <p class="inline-flex items-center rounded-full border border-sky-100 bg-sky-50 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.18em] text-sky-700">
                        <span class="mr-2 h-1.5 w-1.5 rounded-full bg-sky-400"></span>
                        <?= htmlspecialchars($eyebrow, ENT_QUOTES); ?>
                    </p>
                <?php endif; ?>

                <h1 class="text-balance text-2xl sm:text-3xl md:text-4xl font-bold leading-tight">
                    <?= $title ?>
                </h1>

                <?php if (!empty($subtitle)): ?>
                    <p class="max-w-xl text-sm sm:text-[15px] text-slate-600 leading-relaxed">
                        <?= htmlspecialchars($subtitle, ENT_QUOTES); ?>
                    </p>
                <?php endif; ?>

                <?php if (!empty($badges)): ?>
                    <div class="flex flex-wrap gap-2 pt-1">
                        <?php foreach ($badges as $badge): ?>
                            <span class="inline-flex items-center rounded-full bg-slate-100 px-3 py-1 text-[11px] font-medium text-slate-700">
                                <?= htmlspecialchars($badge, ENT_QUOTES); ?>
                            </span>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <div class="flex flex-col items-start gap-3 pt-3 sm:flex-row sm:flex-wrap">
                    <a
                        href="<?= htmlspecialchars($primaryCtaHref, ENT_QUOTES); ?>"
                        class="btn btn-accent btn-radius-pill text-sm px-5 py-2.5"
                        data-careers-el="hero-primary-cta"
                    >
                        <?= htmlspecialchars($primaryCtaLabel, ENT_QUOTES); ?>
                    </a>

                    <a
                        href="<?= htmlspecialchars($secondaryCtaHref, ENT_QUOTES); ?>"
                        class="btn btn-primary-outline btn-radius-pill text-sm px-5 py-2.5"
                        data-careers-el="hero-secondary-cta"
                    >
                        <?= htmlspecialchars($secondaryCtaLabel, ENT_QUOTES); ?>
                    </a>
                </div>

                <p class="pt-1 text-[11px] text-slate-500">
                    Share your GitHub, recent projects and the kind of work you want to do – we reply to most relevant profiles
                    within <span class="font-semibold">2–4 working days</span>.
                </p>
            </div>

            <!-- Right: hero visual -->
            <div class="relative flex justify-center lg:justify-end" data-careers-el="hero-media">
                <?php if (($heroMedia['type'] ?? 'image') === 'image'): ?>
                    <div class="relative w-full max-w-md">
                        <div class="absolute -inset-6 rounded-[2.5rem] bg-sky-500/10 blur-2xl"></div>
                        <div class="relative overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-soft">
                            <img
                                src="<?= asset(htmlspecialchars($heroMedia['src'], ENT_QUOTES)); ?>"
                                alt="<?= htmlspecialchars($heroMedia['alt'] ?? 'Careers at QalbIT', ENT_QUOTES); ?>"
                                class="block h-auto w-full object-cover"
                                loading="lazy"
                            >
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
