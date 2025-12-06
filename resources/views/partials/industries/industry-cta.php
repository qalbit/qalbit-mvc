<?php
/**
 * Industry CTA section (S8)
 *
 * Expects:
 * - array $industry with optional 'cta' config
 */

$industry = $industry ?? [];
$cta     = $industry['cta'] ?? [];

// Allow turning CTA off per industry
$ctaEnabled = $cta['enabled'] ?? true;
if (!$ctaEnabled) {
    return;
}

$serviceName = $industry['name'] ?? 'software development';

// Safe access helpers
$eyebrow = $cta['eyebrow'] ?? 'Ready to get started?';
$title   = $cta['title']
    ?? ('Discuss your ' . strtolower($serviceName) . ' roadmap with QalbIT.');
$body    = $cta['body']
    ?? ('Tell us about your goals, timelines and constraints and we will suggest a practical way to move your '
        . strtolower($serviceName) . ' forward.');

$primaryLabel = $cta['primary_label'] ?? 'Book a consultation';
$primaryUrl   = $cta['primary_url']   ?? '/contact-us/';
$primaryAria  = $cta['primary_aria']
    ?? ('Book a consultation about ' . strtolower($serviceName) . ' with QalbIT');

$secondaryLabel = $cta['secondary_label'] ?? null;
$secondaryUrl   = $cta['secondary_url']   ?? null;
$secondaryAria  = $cta['secondary_aria']
    ?? ($secondaryLabel ? $secondaryLabel : '');

$meta = $cta['meta'] ?? 'Typically we respond within 24–48 hours.';
?>

<section
    class="relative overflow-hidden bg-slate-950 py-16 sm:py-20 lg:py-24"
    data-section="industry-cta"
>
    <div class="absolute inset-x-0 -top-32 h-64 bg-gradient-to-b from-sky-500/10 via-sky-500/0 to-transparent pointer-events-none"></div>

    <div class="relative mx-auto max-w-5xl px-4 sm:px-6 lg:px-8 text-center">
        <?php if (!empty($eyebrow)): ?>
            <p class="mb-3 inline-flex items-center rounded-full border border-sky-500/30 bg-sky-500/5 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.18em] text-sky-300">
                <span class="mr-2 h-1.5 w-1.5 rounded-full bg-sky-400"></span>
                <?= htmlspecialchars($eyebrow, ENT_QUOTES); ?>
            </p>
        <?php endif; ?>

        <h2 class="text-display-md sm:text-display-lg md:text-display-xl font-bold text-slate-50 mb-4">
            <?= htmlspecialchars($title, ENT_QUOTES); ?>
        </h2>

        <p class="mx-auto mb-8 max-w-2xl text-sm sm:text-base text-slate-300">
            <?= nl2br(htmlspecialchars($body, ENT_QUOTES)); ?>
        </p>

        <div class="flex flex-col items-center justify-center gap-3 sm:flex-row sm:gap-4">
            <a
                href="<?= htmlspecialchars($primaryUrl, ENT_QUOTES); ?>"
                class="btn btn-accent btn-radius-pill"
                aria-label="<?= htmlspecialchars($primaryAria, ENT_QUOTES); ?>"
            >
                <?= htmlspecialchars($primaryLabel, ENT_QUOTES); ?>
            </a>

            <?php if (!empty($secondaryLabel) && !empty($secondaryUrl)): ?>
                <a
                    href="<?= htmlspecialchars($secondaryUrl, ENT_QUOTES); ?>"
                    class="btn btn-primary-outline btn-radius-pill text-sky-200 border-sky-500/50 hover:bg-slate-900"
                    aria-label="<?= htmlspecialchars($secondaryAria, ENT_QUOTES); ?>"
                >
                    <?= htmlspecialchars($secondaryLabel, ENT_QUOTES); ?>
                </a>
            <?php endif; ?>
        </div>

        <?php if (!empty($meta)): ?>
            <p class="mt-4 text-[11px] text-slate-400">
                <?= htmlspecialchars($meta, ENT_QUOTES); ?>
            </p>
        <?php endif; ?>
    </div>
</section>
