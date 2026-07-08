<?php
/**
 * Products Hero
 *
 * Expects:
 * - $sections (array) from config('products.page.sections')
 */

$sections   = $sections   ?? [];
$heroConfig = $sections['hero'] ?? [];

$eyebrow  = $heroConfig['eyebrow']  ?? 'Our products';
$title    = $heroConfig['title']    ?? 'Software products we build and run.';
$subtitle = $heroConfig['subtitle'] ?? '';

$primaryCta   = $heroConfig['primary_cta']   ?? [];
$secondaryCta = $heroConfig['secondary_cta'] ?? [];

$primaryCtaLabel   = $primaryCta['label'] ?? 'Build your product with us';
$primaryCtaHref    = $primaryCta['href']  ?? '/contact-us/';
$secondaryCtaLabel = $secondaryCta['label'] ?? 'Explore our services';
$secondaryCtaHref  = $secondaryCta['href']  ?? '/services/';
?>

<section
    id="<?= htmlspecialchars($heroConfig['id'] ?? 'products-hero', ENT_QUOTES); ?>"
    class="relative overflow-hidden bg-slate-50 text-slate-900 py-5 sm:py-6 lg:py-8"
    data-products-section="hero"
>
    <div class="relative mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 space-y-4">

        <!-- Breadcrumbs -->
        <nav class="text-[11px] font-medium text-slate-600" aria-label="Breadcrumb">
            <ol class="flex flex-wrap items-center gap-1">
                <li><a href="/" class="hover:text-sky-500 transition-colors">Home</a></li>
                <li class="text-slate-400">/</li>
                <li aria-current="page" class="text-slate-900">Products</li>
            </ol>
        </nav>

        <div class="max-w-3xl space-y-3">
            <?php if (!empty($eyebrow)): ?>
                <span class="inline-flex items-center rounded-full border border-slate-200 bg-white/90 px-2.5 py-0.5 text-[10px] font-semibold uppercase tracking-[0.16em] text-slate-600">
                    <?= htmlspecialchars($eyebrow, ENT_QUOTES); ?>
                </span>
            <?php endif; ?>

            <h1 class="text-balance text-2xl sm:text-3xl md:text-4xl font-bold leading-snug">
                <?= $title ?>
            </h1>

            <?php if (!empty($subtitle)): ?>
                <p class="max-w-2xl text-sm sm:text-[15px] leading-relaxed text-slate-600">
                    <?= htmlspecialchars($subtitle, ENT_QUOTES); ?>
                </p>
            <?php endif; ?>

            <div class="flex flex-col sm:flex-row sm:flex-wrap items-stretch sm:items-center gap-2.5 pt-1">
                <a href="<?= htmlspecialchars($primaryCtaHref, ENT_QUOTES); ?>" class="btn btn-accent btn-radius-pill text-xs sm:text-[13px] px-4 py-2">
                    <?= htmlspecialchars($primaryCtaLabel, ENT_QUOTES); ?>
                </a>
                <a href="<?= htmlspecialchars($secondaryCtaHref, ENT_QUOTES); ?>" class="btn btn-primary-outline btn-radius-pill text-xs sm:text-[13px] px-4 py-2">
                    <?= htmlspecialchars($secondaryCtaLabel, ENT_QUOTES); ?>
                </a>
            </div>
        </div>
    </div>
</section>
