<?php
/**
 * Careers – Final CTA
 *
 * Expects:
 * - $page     (array) from config('careers.page')
 * - $sections (array) from config('careers.sections')
 */

$page     = $page     ?? [];
$sections = $sections ?? [];

$cta = $sections['cta'] ?? [];

// Allow turning CTA off
$enabled = $cta['enabled'] ?? true;
if (!$enabled) {
    return;
}

$id = $cta['id'] ?? 'careers-final-cta';

$eyebrow = $cta['eyebrow'] ?? 'Didn’t find the exact role?';
$title   = $cta['title']
    ?? 'Let’s talk if you want to grow with real product work at QalbIT.';
$body    = $cta['body']
    ?? "If you care about fundamentals, clean code and real product impact,\nwe’re happy to hear from you even if there is no perfect JD listed.";

$primary  = $cta['primary_cta']   ?? [];
$secondary= $cta['secondary_cta'] ?? [];

$primaryLabel = $primary['label'] ?? 'View current openings';
$primaryHref  = $primary['href']  ?? '/careers/?ref=careers-cta-openings';
$primaryAria  = $primary['aria']
    ?? 'View current job openings at QalbIT';

$secondaryLabel = $secondary['label'] ?? 'Share your profile';
$secondaryHref  = $secondary['href']  ?? '/career/apply/';
$secondaryAria  = $secondary['aria']
    ?? 'Share your profile with QalbIT for future roles';

$meta = $cta['meta']
    ?? 'We usually respond to relevant profiles within 2–3 working days.';
?>

<section
    id="<?= htmlspecialchars($id, ENT_QUOTES); ?>"
    class="relative overflow-hidden bg-slate-950 py-12 sm:py-14 lg:py-16"
    data-careers-section="final-cta"
>
    <!-- subtle glow -->
    <div class="pointer-events-none absolute inset-x-0 -top-32 h-40 bg-gradient-to-b from-sky-500/20 via-sky-500/0 to-transparent"></div>

    <div class="relative mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
        <div
            class="relative overflow-hidden rounded-3xl border border-sky-500/30 bg-gradient-to-br from-slate-950 via-slate-950 to-slate-900 px-5 py-7 sm:px-7 sm:py-8 lg:px-10 lg:py-9 shadow-[0_18px_50px_rgba(15,23,42,0.75)]"
            data-careers-el="final-cta-card"
        >
            <!-- background accent -->
            <div class="pointer-events-none absolute -right-10 -top-10 h-40 w-40 rounded-full bg-sky-500/10 blur-3xl"></div>

            <div class="relative flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
                <div class="space-y-3 max-w-xl">
                    <?php if (!empty($eyebrow)): ?>
                        <p class="inline-flex items-center rounded-full bg-sky-500/10 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.18em] text-sky-200 border border-sky-500/40">
                            <span class="mr-2 h-1.5 w-1.5 rounded-full bg-sky-400"></span>
                            <?= htmlspecialchars($eyebrow, ENT_QUOTES); ?>
                        </p>
                    <?php endif; ?>

                    <h2 class="text-[18px] sm:text-[20px] md:text-[22px] font-semibold tracking-tight text-slate-50">
                        <?= nl2br($title); ?>
                    </h2>

                    <p class="text-[13px] sm:text-[14px] text-slate-300">
                        <?= nl2br(htmlspecialchars($body, ENT_QUOTES)); ?>
                    </p>

                    <?php if (!empty($meta)): ?>
                        <p class="text-[11px] text-slate-400">
                            <?= htmlspecialchars($meta, ENT_QUOTES); ?>
                        </p>
                    <?php endif; ?>
                </div>

                <div class="flex flex-col items-stretch justify-center gap-3 sm:flex-row sm:items-center lg:flex-col lg:items-end">
                    <a
                        href="<?= htmlspecialchars($secondaryHref, ENT_QUOTES); ?>"
                        class="inline-flex items-center justify-center rounded-full border border-slate-600 bg-slate-900/60 px-4 py-2 text-[12px] font-medium text-slate-100 hover:border-sky-400 hover:bg-slate-900 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-sky-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-950 transition"
                        aria-label="<?= htmlspecialchars($secondaryAria, ENT_QUOTES); ?>"
                        data-careers-el="final-cta-secondary"
                    >
                        <?= htmlspecialchars($secondaryLabel, ENT_QUOTES); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
