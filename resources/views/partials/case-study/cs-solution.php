<?php
/**
 * Generic Case Study – Solution Overview (CS5)
 *
 * Reusable section for all case studies.
 *
 * Expects:
 * - $caseStudy (array) from config('case_studies')['key']
 *
 * Example structure:
 *
 * 'sections' => [
 *   'solution' => [
 *       'id'    => 'cs5-solution',
 *       'eyebrow' => 'Our solution',
 *       'title' => 'A custom scheduling platform built around how the academy actually works',
 *       'intro' => 'QalbIT partnered with the academy to design and deliver Snappy Stats…',
 *       'body'  => 'We mapped real-world scenarios, designed flows and implemented a Laravel-based web app…',
 *       'highlight_strip' => [
 *           'End-to-end product design & engineering',
 *           'Laravel + MySQL foundation with clean REST APIs',
 *           'Responsive, browser-based UI for admin & on-range use',
 *       ],
 *   ],
 * ]
 */

$caseStudy = $caseStudy ?? [];

$solutionConfig = $caseStudy['sections']['solution'] ?? [];

$sectionId = $solutionConfig['id'] ?? 'cs5-solution';

// Eyebrow, title & text
$eyebrow = $solutionConfig['eyebrow'] ?? 'Our solution';

$title = $solutionConfig['title']
    ?? 'A custom product designed around the real-world workflows';

$intro = $solutionConfig['intro']
    ?? 'We do not start from technology. We start from the day-to-day reality of the people who will use the product, then design a solution that fits how they already work — not the other way around.';

$body = $solutionConfig['body']
    ?? 'For this project, that meant unpacking how work actually moved through the organisation: who needed to see what, when decisions were made, and where mistakes tended to appear. From there, we designed a focused product with clear roles, predictable flows and a technical foundation that could grow with the business.';

// Highlight strip – list of 2–4 short points
$highlightStrip = $solutionConfig['highlight_strip'] ?? [
    'End-to-end product design, frontend and backend engineering.',
    'Built on a modern Laravel / PHP stack with clean APIs.',
    'Responsive web experience designed for daily operational use.',
];

// Clean up empties
$highlightStrip = array_values(array_filter($highlightStrip, fn ($item) => is_string($item) && trim($item) !== ''));

// Optional supporting links (e.g., to services or process pages)
$links = $solutionConfig['links'] ?? [
    [
        'label' => 'See how we approach MVPs',
        'href'  => '/start-up-mvp/',
    ],
    [
        'label' => 'Explore our custom software services',
        'href'  => '/services/custom-software-development/',
    ],
];
$links = array_values(array_filter($links, function ($link) {
    return !empty($link['label']) && !empty($link['href']);
}));
?>

<section
    id="<?= htmlspecialchars($sectionId, ENT_QUOTES); ?>"
    class="relative bg-slate-50 text-slate-900 py-14 sm:py-18 lg:py-20"
    data-cs-section="solution"
>
    <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-slate-200 via-sky-400/40 to-slate-200"></div>

    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 space-y-8">
        <!-- Section header + narrative -->
        <div class="grid gap-8 lg:grid-cols-[minmax(0,3.1fr)_minmax(0,2.2fr)] lg:items-start">
            <div class="space-y-5" data-cs-solution-el="narrative">
                <header class="space-y-2">
                    <p class="text-[11px] font-semibold uppercase tracking-[0.16em] text-sky-500">
                        <?= htmlspecialchars($eyebrow, ENT_QUOTES); ?>
                    </p>

                    <h2 class="text-display-md sm:text-display-lg md:text-display-xl font-bold tracking-tight text-slate-950">
                        <?= htmlspecialchars($title, ENT_QUOTES); ?>
                    </h2>
                </header>

                <?php if (!empty($intro)): ?>
                    <p class="text-sm sm:text-base text-slate-700 leading-relaxed">
                        <?= htmlspecialchars($intro, ENT_QUOTES); ?>
                    </p>
                <?php endif; ?>

                <?php if (!empty($body)): ?>
                    <div class="space-y-3 text-sm sm:text-base text-slate-700 leading-relaxed">
                        <p>
                            <?= nl2br(htmlspecialchars($body, ENT_QUOTES)); ?>
                        </p>
                    </div>
                <?php endif; ?>

                <?php if (!empty($links)): ?>
                    <div
                        class="mt-3 flex flex-wrap gap-3 text-[11px] sm:text-xs"
                        data-cs-solution-el="links"
                    >
                        <?php foreach ($links as $link): ?>
                            <a
                                href="<?= htmlspecialchars($link['href'], ENT_QUOTES); ?>"
                                class="inline-flex items-center gap-1 rounded-full border border-slate-300 bg-white/80 px-3 py-1
                                       text-slate-700 hover:border-sky-400 hover:text-sky-600 hover:bg-sky-50
                                       transition-colors"
                            >
                                <span class="font-medium">
                                    <?= htmlspecialchars($link['label'], ENT_QUOTES); ?>
                                </span>
                                <span aria-hidden="true" class="text-[10px]">↗</span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Highlight strip / key solution points -->
            <aside
                class="rounded-3xl border border-slate-200 bg-white/90 p-5 sm:p-6 lg:p-7 shadow-soft-sm"
                data-cs-solution-el="highlights"
            >
                <div class="flex items-center justify-between gap-4 mb-4">
                    <h3 class="text-xs sm:text-sm flex-shrink-0 font-semibold uppercase tracking-[0.18em] text-slate-600">
                        Key solution pillars
                    </h3>
                    <span class="hidden text-end text-[10px] font-medium text-slate-400 sm:inline">
                        What shaped the product & architecture
                    </span>
                </div>

                <?php if (!empty($highlightStrip)): ?>
                    <ul class="space-y-3 text-xs sm:text-sm">
                        <?php foreach ($highlightStrip as $index => $point): ?>
                            <li
                                class="flex gap-3"
                                data-cs-el="solution-highlight"
                            >
                                <div class="mt-0.5">
                                    <span
                                        class="inline-flex h-6 w-6 items-center justify-center rounded-full
                                               bg-sky-50 border border-sky-100 text-[11px] font-semibold text-sky-600"
                                    >
                                        <?= $index + 1; ?>
                                    </span>
                                </div>
                                <p class="text-slate-700 font-medium leading-relaxed">
                                    <?= htmlspecialchars($point, ENT_QUOTES); ?>
                                </p>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p class="text-xs text-slate-500">
                        We&apos;ll summarise the key pillars of the solution here – usually 3–4 short, scannable points
                        covering product design, engineering and delivery.
                    </p>
                <?php endif; ?>

                <p class="mt-4 text-[11px] text-slate-500 leading-relaxed">
                    Each pillar represents a deliberate choice: where to keep the product simple, where to invest in
                    flexibility and how to ensure the system can evolve as the organisation grows.
                </p>
            </aside>
        </div>
    </div>
</section>
