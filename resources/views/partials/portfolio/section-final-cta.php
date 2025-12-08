<?php
/**
 * Portfolio CTA – blue card on dark background
 *
 * Expects:
 * - $page     (array) from config('portfolio.page')
 * - $sections (array) from config('portfolio.page.sections')
 */

$page     = $page     ?? [];
$sections = $sections ?? [];

$cta = $sections['cta'] ?? [];

// Allow turning CTA off
$ctaEnabled = $cta['enabled'] ?? true;
if (!$ctaEnabled) {
    return;
}

$sectionId = $cta['id'] ?? 'portfolio-cta';

// Copy
$eyebrow = $cta['eyebrow'] ?? 'Have a similar project in mind?';

$title = $cta['title']
    ?? 'Let’s design the next project that belongs in this portfolio.';

$body  = $cta['body']
    ?? 'Whether you need a new SaaS product, a scheduling platform or an internal tool, QalbIT can help you move from scattered workflows to a production-ready solution.';

// Primary CTA
$primaryLabel = $cta['primary_label'] ?? 'Book a free consultation';
$primaryUrl   = $cta['primary_url']   ?? '/contact-us/?ref=portfolio-cta';
$primaryAria  = $cta['primary_aria']
    ?? 'Book a consultation about your software project with QalbIT';

// Secondary CTA (optional)
$secondaryLabel = $cta['secondary_label'] ?? 'Browse our recent work';
$secondaryUrl   = $cta['secondary_url']   ?? '/portfolio/';
$secondaryAria  = $cta['secondary_aria']
    ?? 'Browse QalbIT software case studies';

// Meta line
$meta = $cta['meta'] ?? 'Typically we respond within 24–48 hours.';
?>

<section
    id="<?= htmlspecialchars($sectionId, ENT_QUOTES); ?>"
    class="relative overflow-hidden bg-slate-950 py-14 sm:py-16 lg:py-18"
    data-portfolio-section="cta"
>
    <div class="absolute inset-x-0 -top-40 h-72 bg-gradient-to-b from-sky-500/15 via-sky-500/0 to-transparent pointer-events-none"></div>

    <div class="relative mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <div
            class="relative flex flex-col gap-6 rounded-[32px] bg-gradient-to-r from-sky-600 via-sky-500 to-sky-600
                       px-6 py-7 sm:px-10 sm:py-9 lg:flex-row lg:items-center lg:justify-between lg:px-12 lg:py-10
                       shadow-[0_30px_80px_rgba(15,23,42,0.7)]"
        >
            <!-- subtle inner glow -->
            <div class="pointer-events-none absolute inset-0 rounded-[32px] bg-gradient-to-br from-white/10 via-transparent to-sky-900/20 mix-blend-soft-light"></div>

            <!-- Left: text -->
            <div class="relative max-w-2xl space-y-3 lg:space-y-4">
                <?php if (!empty($eyebrow)): ?>
                    <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-sky-100/90">
                        <?= htmlspecialchars($eyebrow, ENT_QUOTES); ?>
                    </p>
                <?php endif; ?>

                <h2 class="text-lg sm:text-xl md:text-2xl lg:text-[26px] font-bold leading-snug text-white">
                    <?= htmlspecialchars($title, ENT_QUOTES); ?>
                </h2>

                <p class="text-xs sm:text-sm md:text-[13px] leading-relaxed text-sky-50/90">
                    <?= nl2br(htmlspecialchars($body, ENT_QUOTES)); ?>
                </p>

                <?php if (!empty($meta)): ?>
                    <p class="pt-1 text-[11px] text-sky-100/80">
                        <?= htmlspecialchars($meta, ENT_QUOTES); ?>
                    </p>
                <?php endif; ?>
            </div>

            <!-- Right: CTAs -->
            <div class="relative flex flex-col items-stretch gap-3 sm:flex-row sm:items-center lg:flex-col lg:items-end lg:gap-3">
                <a
                    href="<?= htmlspecialchars($primaryUrl, ENT_QUOTES); ?>"
                    aria-label="<?= htmlspecialchars($primaryAria, ENT_QUOTES); ?>"
                    class="inline-flex items-center justify-center rounded-full bg-white px-5 py-2.5
                           text-[12px] font-semibold text-sky-700 shadow-sm
                           hover:bg-slate-50 hover:text-sky-800 transition-colors"
                >
                    <?= htmlspecialchars($primaryLabel, ENT_QUOTES); ?>
                    <span class="ml-1.5 text-xs">↗</span>
                </a>

                <?php if (!empty($secondaryLabel) && !empty($secondaryUrl)): ?>
                    <a
                        href="<?= htmlspecialchars($secondaryUrl, ENT_QUOTES); ?>"
                        aria-label="<?= htmlspecialchars($secondaryAria, ENT_QUOTES); ?>"
                        class="inline-flex items-center justify-center rounded-full border border-white/70
                               bg-transparent px-5 py-2.5 text-[12px] font-semibold text-sky-50
                               hover:bg-white/10 hover:border-white transition-colors"
                    >
                        <?= htmlspecialchars($secondaryLabel, ENT_QUOTES); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
