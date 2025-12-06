<?php
/**
 * Generic Case Study – Results & Impact (CS9)
 *
 * Reusable section for all case studies.
 *
 * Expects:
 * - $caseStudy (array) from config('case_studies')['key']
 *
 * Example structure:
 *
 * 'sections' => [
 *   'results' => [
 *       'id'       => 'cs9-results',
 *       'title'    => 'Results & impact',
 *       'subtitle' => 'From reactive firefighting to proactive, data-informed scheduling.',
 *       'metrics' => [
 *           [
 *               'label' => 'Reduction in scheduling conflicts',
 *               'value' => '80% fewer double bookings',
 *               'note'  => 'Measured after the first three months of using the new scheduling board.',
 *           ],
 *           // …
 *       ],
 *       'narrative' => 'By replacing spreadsheets with a purpose-built web application…',
 *       'testimonial' => [
 *           'quote' => '“With Snappy Stats, our team finally has one reliable place…”',
 *           'name'  => 'Operations Manager',
 *           'role'  => 'Shooting Academy',
 *       ],
 *       'inline_cta' => [
 *           'text'       => 'Planning to modernise scheduling for your academy or training business?',
 *           'link_label' => 'Talk to QalbIT about a custom solution',
 *           'href'       => '/contact-us/?ref=cs-snappy-stats-results',
 *       ],
 *   ],
 * ]
 */

$caseStudy = $caseStudy ?? [];

$resultsConfig = $caseStudy['sections']['results'] ?? [];

$sectionId = $resultsConfig['id'] ?? 'cs9-results';

$title = $resultsConfig['title'] ?? 'Results & impact';

$subtitle = $resultsConfig['subtitle']
    ?? 'What changed after the product went live — for the team, their customers and the business.';

// Metrics
$metrics = $resultsConfig['metrics'] ?? [
    [
        'label' => 'Operational errors',
        'value' => 'Significant reduction',
        'note'  => 'Fewer mistakes and less time spent fixing avoidable issues.',
    ],
    [
        'label' => 'Team efficiency',
        'value' => 'Improved day-to-day productivity',
        'note'  => 'More time available for high-value work instead of manual coordination.',
    ],
    [
        'label' => 'Data visibility',
        'value' => 'Single source of truth',
        'note'  => 'Leadership can rely on up-to-date information to make decisions.',
    ],
];

// Clean metrics
$metrics = array_values(array_filter($metrics, function ($metric) {
    if (!is_array($metric)) {
        return false;
    }
    $label = trim((string)($metric['label'] ?? ''));
    $value = trim((string)($metric['value'] ?? ''));
    $note  = trim((string)($metric['note'] ?? ''));
    return $label !== '' || $value !== '' || $note !== '';
}));

// Narrative
$narrative = $resultsConfig['narrative']
    ?? 'Once the product moved from pilot to daily use, the team quickly felt the difference. Conflicts dropped, visibility improved and conversations shifted from “What went wrong?” to “What do we want to improve next?”.';

// Testimonial
$testimonial = $resultsConfig['testimonial'] ?? [];
$testimonialQuote = trim((string)($testimonial['quote'] ?? ''));
$testimonialName  = trim((string)($testimonial['name'] ?? ''));
$testimonialRole  = trim((string)($testimonial['role'] ?? ''));

// Inline CTA
$inlineCta = $resultsConfig['inline_cta'] ?? [];
$inlineCtaText      = $inlineCta['text']       ?? 'Facing similar scheduling or operations challenges in your organisation?';
$inlineCtaLinkLabel = $inlineCta['link_label'] ?? 'Talk to QalbIT about a custom solution';
$inlineCtaHref      = $inlineCta['href']       ?? '/contact-us/?ref=cs-results';
?>

<section
    id="<?= htmlspecialchars($sectionId, ENT_QUOTES); ?>"
    class="relative bg-slate-50 text-slate-900 py-14 sm:py-18 lg:py-20"
    data-cs-section="results"
>
    <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-slate-200 via-sky-400/40 to-slate-200"></div>

    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 space-y-8">
        <!-- Header -->
        <header
            class="max-w-3xl space-y-3"
            data-cs-results-el="header"
        >
            <p class="text-[11px] font-semibold uppercase tracking-[0.16em] text-sky-500">
                Results & impact
            </p>

            <h2 class="text-display-md sm:text-display-lg md:text-display-xl font-bold tracking-tight text-slate-950">
                <?= htmlspecialchars($title, ENT_QUOTES); ?>
            </h2>

            <?php if (!empty($subtitle)): ?>
                <p class="text-sm sm:text-base text-slate-700 leading-relaxed">
                    <?= htmlspecialchars($subtitle, ENT_QUOTES); ?>
                </p>
            <?php endif; ?>
        </header>

        <!-- Layout: metrics + narrative/testimonial -->
        <div
            class="grid gap-8 lg:grid-cols-[minmax(0,2.2fr)_minmax(0,2.3fr)] lg:items-start"
            data-cs-results-el="layout"
        >
            <!-- Metrics -->
            <div class="space-y-4" data-cs-results-el="metrics">
                <?php if (!empty($metrics)): ?>
                    <div class="grid gap-4 sm:grid-cols-2">
                        <?php foreach ($metrics as $metric): ?>
                            <?php
                                $metricLabel = trim((string)($metric['label'] ?? ''));
                                $metricValue = trim((string)($metric['value'] ?? ''));
                                $metricNote  = trim((string)($metric['note'] ?? ''));
                                if ($metricLabel === '' && $metricValue === '' && $metricNote === '') {
                                    continue;
                                }
                            ?>
                            <article
                                class="relative flex flex-col rounded-md border border-slate-200 bg-white/90
                                       p-4 sm:p-5 shadow-soft-sm"
                                data-cs-el="metric-card"
                            >
                                <?php if ($metricLabel !== ''): ?>
                                    <h3 class="text-[10px] font-bold uppercase tracking-[0.18em] text-slate-500">
                                        <?= htmlspecialchars($metricLabel, ENT_QUOTES); ?>
                                    </h3>
                                <?php endif; ?>

                                <?php if ($metricValue !== ''): ?>
                                    <p class="mt-2 text-sm font-semibold text-slate-900">
                                        <?= htmlspecialchars($metricValue, ENT_QUOTES); ?>
                                    </p>
                                <?php endif; ?>

                                <?php if ($metricNote !== ''): ?>
                                    <p class="mt-1 text-[11px] text-slate-500">
                                        <?= htmlspecialchars($metricNote, ENT_QUOTES); ?>
                                    </p>
                                <?php endif; ?>
                            </article>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <p class="text-xs sm:text-sm text-slate-500">
                        Quantitative results for this case study will be documented here — typically focused on
                        error reduction, time saved, adoption rates or revenue impact.
                    </p>
                <?php endif; ?>

                <p class="text-[11px] sm:text-xs text-slate-500 leading-relaxed">
                    Even when exact numbers are directional, we anchor results to the original project goals
                    so stakeholders can clearly see what changed after launch.
                </p>
            </div>

            <!-- Narrative + testimonial + inline CTA -->
            <div class="space-y-5" data-cs-results-el="right-column">
                <!-- Narrative -->
                <?php if (!empty($narrative)): ?>
                    <div
                        class="rounded-3xl border border-slate-200 bg-white/90 p-5 sm:p-6"
                        data-cs-results-el="narrative"
                    >
                        <h3 class="text-sm sm:text-base font-semibold text-slate-900 mb-1.5">
                            Story behind the numbers
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-700 leading-relaxed">
                            <?= nl2br(htmlspecialchars($narrative, ENT_QUOTES)); ?>
                        </p>
                    </div>
                <?php endif; ?>

                <!-- Testimonial -->
                <?php if ($testimonialQuote !== ''): ?>
                    <figure
                        class="rounded-3xl border border-slate-900/60 bg-slate-950 text-slate-50 p-5 sm:p-6 lg:p-7 shadow-[0_18px_45px_rgba(15,23,42,0.95)]"
                        data-cs-results-el="testimonial"
                    >
                        <div class="mb-3 flex items-center gap-1 text-slate-400">
                            <span class="text-lg">“</span>
                            <span class="text-[11px] font-bold uppercase tracking-[0.18em]">
                                Client perspective
                            </span>
                        </div>

                        <blockquote class="text-sm sm:text-[15px] leading-relaxed">
                            <?= nl2br(htmlspecialchars($testimonialQuote, ENT_QUOTES)); ?>
                        </blockquote>

                        <figcaption class="mt-4 text-[11px] sm:text-xs text-slate-400">
                            <?php if ($testimonialName !== ''): ?>
                                <span class="font-semibold text-slate-100">
                                    <?= htmlspecialchars($testimonialName, ENT_QUOTES); ?>
                                </span>
                            <?php endif; ?>
                            <?php if ($testimonialRole !== ''): ?>
                                <span>
                                    <?= $testimonialName !== '' ? ' · ' : ''; ?>
                                    <?= htmlspecialchars($testimonialRole, ENT_QUOTES); ?>
                                </span>
                            <?php endif; ?>
                        </figcaption>
                    </figure>
                <?php endif; ?>

                <!-- Inline CTA -->
                <div
                    class="rounded-full border border-sky-400 bg-sky-50/80 px-4 py-4 sm:px-5 sm:py-4 flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between"
                    data-cs-results-el="inline-cta"
                >
                    <p class="text-[11px] sm:text-xs text-slate-800 leading-relaxed">
                        <?= htmlspecialchars($inlineCtaText, ENT_QUOTES); ?>
                    </p>
                    <a
                        href="<?= htmlspecialchars($inlineCtaHref, ENT_QUOTES); ?>"
                        class="inline-flex items-center justify-center rounded-full border border-sky-400 bg-sky-500
                               px-3 py-1.5 text-[11px] sm:text-xs font-semibold text-white shadow-soft-sm
                               hover:bg-sky-600 hover:border-sky-500 transition-colors"
                    >
                        <?= htmlspecialchars($inlineCtaLinkLabel, ENT_QUOTES); ?>
                        <span aria-hidden="true" class="ml-1 text-[10px]">↗</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
