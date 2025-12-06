<?php
/** @var array $location */

$sections  = $location['sections'] ?? [];
$finalCta  = $sections['final_cta'] ?? [];

$stateKey   = $location['state_key']   ?? '';
$stateLabel = $location['short_name']  ?? ($location['name'] ?? '');

$id      = $finalCta['id']      ?? 'location-final-cta';
$eyebrow = $finalCta['eyebrow'] ?? '';
$title   = $finalCta['title']   ?? '';
$body    = $finalCta['body']    ?? '';

$primary = $finalCta['primary_cta']   ?? [];
$secondary = $finalCta['secondary_cta'] ?? [];

$meta   = $finalCta['meta'] ?? [];
$theme  = $meta['theme'] ?? 'light';

$bgClass = $theme === 'dark'
    ? 'bg-slate-950 text-slate-50'
    : 'bg-slate-50 text-slate-900';
?>

<section
    id="<?= htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?>"
    class="<?= $bgClass; ?>"
    data-location-section="final_cta"
    data-location-key="<?= htmlspecialchars($stateKey, ENT_QUOTES, 'UTF-8'); ?>"
>
    <div class="relative mx-auto max-w-6xl px-4 py-16 sm:px-6 lg:px-8 space-y-4 md:space-y-10 lg:py-20">
        <div class="rounded-3xl bg-slate-950 text-slate-50 px-6 py-10 sm:px-10 lg:px-12 lg:py-12">
            <div class="grid gap-8 lg:grid-cols-[minmax(0,1.4fr)_minmax(0,1fr)] lg:items-center">
                <div class="space-y-4" data-location-el="final-cta-text">
                    <?php if ($eyebrow): ?>
                        <p class="text-xs font-semibold uppercase tracking-[0.2em] text-sky-400">
                            <?= htmlspecialchars($eyebrow, ENT_QUOTES, 'UTF-8'); ?>
                        </p>
                    <?php endif; ?>

                    <?php if ($title): ?>
                        <h2 class="text-2xl font-semibold tracking-tight sm:text-3xl">
                            <?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?>
                        </h2>
                    <?php endif; ?>

                    <?php if ($body): ?>
                        <p class="text-sm sm:text-base text-slate-200">
                            <?= nl2br(htmlspecialchars($body, ENT_QUOTES, 'UTF-8')); ?>
                        </p>
                    <?php endif; ?>

                    <?php if ($stateLabel): ?>
                        <p class="text-xs text-slate-400">
                            We typically respond to <?= htmlspecialchars($stateLabel, ENT_QUOTES, 'UTF-8'); ?> enquiries within one business day.
                        </p>
                    <?php endif; ?>

                    <div class="mt-4 flex flex-wrap gap-4" data-location-el="final-cta-buttons">
                        <?php if (!empty($primary['label']) && !empty($primary['url'])): ?>
                            <a
                                href="<?= htmlspecialchars($primary['url'], ENT_QUOTES, 'UTF-8'); ?>"
                                class="inline-flex items-center justify-center rounded-full bg-sky-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-sky-700 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-sky-500 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-950"
                            >
                                <?= htmlspecialchars($primary['label'], ENT_QUOTES, 'UTF-8'); ?>
                            </a>
                        <?php endif; ?>

                        <?php if (!empty($secondary['label']) && !empty($secondary['url'])): ?>
                            <a
                                href="<?= htmlspecialchars($secondary['url'], ENT_QUOTES, 'UTF-8'); ?>"
                                class="inline-flex items-center justify-center rounded-full border border-slate-600 px-5 py-2.5 text-sm font-semibold text-slate-50 transition hover:border-sky-400 hover:text-sky-100 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-sky-500 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-950"
                            >
                                <?= htmlspecialchars($secondary['label'], ENT_QUOTES, 'UTF-8'); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Right side: small reassurance block -->
                <div class="space-y-3 text-xs text-slate-300" data-location-el="final-cta-meta">
                    <div class="rounded-2xl border border-slate-800 bg-slate-900/60 p-4">
                        <p class="font-semibold text-slate-50">
                            What to expect after you contact us
                        </p>
                        <ol class="mt-2 space-y-1.5 list-decimal list-inside">
                            <li>We review your message and, if needed, ask a few clarifying questions.</li>
                            <li>We propose next steps: a short call, ballpark estimate or small discovery.</li>
                            <li>You decide whether and how you would like to move forward.</li>
                        </ol>
                    </div>

                    <p>
                        No spam, no aggressive follow-ups – just an honest conversation about whether QalbIT is the right fit for your
                        <?= htmlspecialchars($stateLabel ?: 'next', ENT_QUOTES, 'UTF-8'); ?> project.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
