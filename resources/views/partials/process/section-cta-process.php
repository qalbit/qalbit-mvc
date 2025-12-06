<?php
// Expecting $process to contain the Start-up MVP config (e.g. config('process.start-up-mvp')).

$cta = $process['final_cta'] ?? [];

// Meta
$id      = $cta['id']      ?? 'mvp-final-cta';
$eyebrow = $cta['eyebrow'] ?? 'Next steps';
$title   = $cta['title']   ?? 'Ready to talk about your Startup MVP?';
$body    = $cta['body']
    ?? 'Share where you are today, what you want to launch and by when. We will walk you through how QalbIT can support you as your startup MVP development partner, with clear timelines, budget ranges and next steps.';

// Primary CTA
$primaryLabel = $cta['primary_label'] ?? 'Schedule a discovery call';
$primaryUrl   = $cta['primary_url']   ?? 'https://calendly.com/abidhusain-qalbit/discuss-project';
$primaryAria  = $cta['primary_aria']  ?? 'Schedule a Startup MVP discovery call with QalbIT';

// Secondary CTA
$secondaryLabel = $cta['secondary_label'] ?? 'Or email us at sales@qalbit.com';
$secondaryUrl   = $cta['secondary_url']   ?? 'mailto:sales@qalbit.com';
$secondaryAria  = $cta['secondary_aria']  ?? 'Email the QalbIT team about your Startup MVP';

// Meta / helper text
$meta = $cta['meta']
    ?? 'Typically we respond within 24–48 hours with clarifying questions and next steps.';
?>

<section
    id="<?= htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?>"
    data-mvp-section="s10"
    class="bg-black"
>
    <div class="mx-auto max-w-6xl px-4 py-12 sm:px-6 lg:px-8">
        <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-primary via-primary/90 to-sky-600 px-6 py-10 shadow-lg sm:px-10">
            <div class="absolute -right-24 -top-24 h-56 w-56 rounded-full bg-white/10 blur-3xl" aria-hidden="true"></div>

            <div class="relative flex flex-col items-start justify-between gap-6 md:flex-row md:items-center">
                <div class="max-w-2xl space-y-2 text-white">
                    <?php if (!empty($eyebrow)): ?>
                        <p class="text-xs font-medium uppercase tracking-wide text-white/70">
                            <?= htmlspecialchars($eyebrow, ENT_QUOTES, 'UTF-8'); ?>
                        </p>
                    <?php endif; ?>

                    <h2 class="text-2xl font-semibold tracking-tight sm:text-3xl">
                        <?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?>
                    </h2>

                    <?php if (!empty($body)): ?>
                        <p class="text-sm leading-relaxed text-white/90 sm:text-base">
                            <?= htmlspecialchars($body, ENT_QUOTES, 'UTF-8'); ?>
                        </p>
                    <?php endif; ?>

                    <?php if (!empty($meta)): ?>
                        <p class="pt-1 text-xs text-white/70 sm:text-sm">
                            <?= htmlspecialchars($meta, ENT_QUOTES, 'UTF-8'); ?>
                        </p>
                    <?php endif; ?>
                </div>

                <div class="flex flex-col items-start gap-2 text-sm text-white md:items-end">
                    <a
                        href="<?= htmlspecialchars($primaryUrl, ENT_QUOTES, 'UTF-8'); ?>"
                        aria-label="<?= htmlspecialchars($primaryAria, ENT_QUOTES, 'UTF-8'); ?>"
                        class="inline-flex items-center justify-center rounded-full bg-white px-6 py-3 text-sm font-semibold text-primary shadow-md transition hover:bg-slate-50 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-offset-primary focus-visible:ring-white"
                        data-mvp-final-cta="primary"
                    >
                        <?= htmlspecialchars($primaryLabel, ENT_QUOTES, 'UTF-8'); ?>
                    </a>

                    <?php if (!empty($secondaryLabel) && !empty($secondaryUrl)): ?>
                        <a
                            href="<?= htmlspecialchars($secondaryUrl, ENT_QUOTES, 'UTF-8'); ?>"
                            aria-label="<?= htmlspecialchars($secondaryAria, ENT_QUOTES, 'UTF-8'); ?>"
                            class="inline-flex items-center justify-center text-xs font-medium text-white/90 underline-offset-2 hover:underline"
                            data-mvp-final-cta="secondary"
                        >
                            <?= htmlspecialchars($secondaryLabel, ENT_QUOTES, 'UTF-8'); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
