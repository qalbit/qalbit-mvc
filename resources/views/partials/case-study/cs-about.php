<?php
/**
 * Generic Case Study – About the Client & Context (CS2)
 *
 * Reusable section for all case studies.
 *
 * Expects:
 * - $caseStudy (array) from config('case_studies')['key']
 *
 * Example structure:
 *
 * 'sections' => [
 *   'about' => [
 *       'id'    => 'cs2-about',
 *       'title' => 'About the client',
 *       'intro' => 'Short contextual paragraph…',
 *       'client_story' => 'Longer narrative about the client, their operations, growth stage, etc.',
 *       'at_a_glance_title' => 'Client at a glance',
 *       'at_a_glance' => [
 *           ['label' => 'Business type',   'value' => 'Shooting academy & training centre'],
 *           ['label' => 'Team size',       'value' => '10–20 instructors & admins'],
 *           ['label' => 'Bookings volume', 'value' => 'Hundreds of sessions per month'],
 *           // …
 *       ],
 *   ],
 * ]
 */

$caseStudy = $caseStudy ?? [];

$aboutConfig = $caseStudy['sections']['about'] ?? [];

// Fallbacks using top-level fields
$caseStudyName     = $caseStudy['name']     ?? 'Client';
$caseStudyIndustry = $caseStudy['industry'] ?? null;
$caseStudyLocation = $caseStudy['location'] ?? null;

$sectionId = $aboutConfig['id'] ?? 'cs2-about';

$title = $aboutConfig['title'] ?? 'About the client';
$intro = $aboutConfig['intro']
    ?? 'A brief overview of the client, their business model and why they needed a custom software solution.';

$clientStory = $aboutConfig['client_story']
    ?? 'This section explains who the client is, how they operate today and what triggered the need for a dedicated digital product instead of generic tools or spreadsheets.';

// At a glance
$atAGlanceTitle = $aboutConfig['at_a_glance_title'] ?? 'Client at a glance';

// Build default "at a glance" list if not provided
$defaultAtAGlance = array_values(array_filter([
    $caseStudyIndustry ? ['label' => 'Industry', 'value' => $caseStudyIndustry] : null,
    $caseStudyLocation ? ['label' => 'Location', 'value' => $caseStudyLocation] : null,
]));

$atAGlanceItems = $aboutConfig['at_a_glance'] ?? $defaultAtAGlance;

// Ensure at least one item exists
if (empty($atAGlanceItems)) {
    $atAGlanceItems = [
        ['label' => 'Industry', 'value' => 'Software & digital operations'],
    ];
}
?>

<section
    id="<?= htmlspecialchars($sectionId, ENT_QUOTES); ?>"
    class="relative bg-slate-950 text-slate-50 py-14 sm:py-18 lg:py-20"
    data-cs-section="about"
>
    <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-sky-500/0 via-sky-500/40 to-sky-500/0"></div>

    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-10 lg:grid-cols-[minmax(0,3fr)_minmax(0,2.2fr)] lg:items-start">
            <!-- Left: Narrative about the client -->
            <div class="space-y-5" data-cs-about-el="narrative">
                <header class="space-y-3">
                    <p class="text-[11px] font-semibold uppercase tracking-[0.16em] text-sky-400">
                        About the client & context
                    </p>

                    <h2 class="text-display-md sm:text-display-lg md:text-display-xl font-bold tracking-tight text-white">
                        <?= $title ?>
                    </h2>
                </header>

                <?php if (!empty($intro)): ?>
                    <p class="text-sm sm:text-base text-slate-300 leading-relaxed">
                        <?= htmlspecialchars($intro, ENT_QUOTES); ?>
                    </p>
                <?php endif; ?>

                <?php if (!empty($clientStory)): ?>
                    <div class="space-y-3 text-sm sm:text-base text-slate-300 leading-relaxed">
                        <p>
                            <?= nl2br(htmlspecialchars($clientStory, ENT_QUOTES)); ?>
                        </p>
                    </div>
                <?php endif; ?>

                <!-- Optional extra context from top-level fields -->
                <?php if ($caseStudyIndustry || $caseStudyLocation): ?>
                    <div class="mt-4 flex flex-wrap gap-3 text-[11px] sm:text-xs text-slate-400">
                        <?php if ($caseStudyIndustry): ?>
                            <span class="inline-flex items-center gap-1 rounded-full border border-slate-800 bg-slate-900/60 px-3 py-1">
                                <span class="h-1.5 w-1.5 rounded-full bg-sky-400"></span>
                                <span class="font-medium">
                                    <?= htmlspecialchars($caseStudyIndustry, ENT_QUOTES); ?>
                                </span>
                            </span>
                        <?php endif; ?>
                        <?php if ($caseStudyLocation): ?>
                            <span class="inline-flex items-center gap-1 rounded-full border border-slate-800 bg-slate-900/60 px-3 py-1">
                                <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                                <span class="font-medium">
                                    <?= htmlspecialchars($caseStudyLocation, ENT_QUOTES); ?>
                                </span>
                            </span>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Right: "Client at a glance" card -->
            <aside
                class="rounded-3xl border border-slate-800 bg-slate-900/70 p-5 sm:p-6 lg:p-7 shadow-[0_18px_45px_rgba(15,23,42,0.8)]"
                data-cs-about-el="at-a-glance"
            >
                <div class="flex flex-col items-start gap-1 mb-6">
                    <h3 class="text-xs sm:text-sm font-bold uppercase tracking-[0.18em] text-slate-300">
                        <?= htmlspecialchars($atAGlanceTitle, ENT_QUOTES); ?>
                    </h3>
                    <span class="text-[11px] font-medium text-slate-500">
                        Snapshot of the organisation we built for
                    </span>
                </div>

                <dl class="space-y-4 text-xs sm:text-sm">
                    <?php foreach ($atAGlanceItems as $item): ?>
                        <?php
                            $label = $item['label'] ?? '';
                            $value = $item['value'] ?? '';
                            if ($label === '' && $value === '') {
                                continue;
                            }
                        ?>
                        <div class="flex flex-col gap-1 border-b border-slate-800/80 pb-3 last:border-b-0 last:pb-0">
                            <?php if ($label !== ''): ?>
                                <dt class="text-[11px] font-semibold uppercase tracking-[0.16em] text-slate-500">
                                    <?= htmlspecialchars($label, ENT_QUOTES); ?>
                                </dt>
                            <?php endif; ?>

                            <?php if ($value !== ''): ?>
                                <dd class="text-slate-100">
                                    <?= htmlspecialchars($value, ENT_QUOTES); ?>
                                </dd>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </dl>

                <p class="mt-4 text-[11px] text-slate-500 leading-relaxed">
                    Understanding the client&apos;s operating model, constraints and growth plans helps us
                    design software that fits into the real business — not the other way around.
                </p>
            </aside>
        </div>
    </div>
</section>
