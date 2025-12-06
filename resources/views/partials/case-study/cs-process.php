<?php
/**
 * Generic Case Study – Delivery Process & Collaboration (CS8)
 *
 * Reusable section for all case studies.
 *
 * Expects:
 * - $caseStudy (array) from config('case_studies')['key']
 *
 * Example structure:
 *
 * 'sections' => [
 *   'process' => [
 *       'id'    => 'cs8-process',
 *       'title' => 'Delivery process & collaboration',
 *       'steps' => [
 *           [
 *               'step'        => '01',
 *               'name'        => 'Discovery & requirements',
 *               'duration'    => '2 weeks',
 *               'description' => 'Stakeholder workshops, review of existing tools…',
 *           ],
 *           // …
 *       ],
 *       'engagement_model' => [
 *           'label'       => 'Engagement model used',
 *           'description' => 'We worked as an extended product team under a Start-up MVP engagement…',
 *           'links' => [
 *               ['label' => 'Start-up MVP approach',       'href' => '/start-up-mvp/'],
 *               ['label' => 'Engagement models at QalbIT', 'href' => '/engagement-model/'],
 *           ],
 *       ],
 *   ],
 * ]
 */

$caseStudy = $caseStudy ?? [];

$processConfig = $caseStudy['sections']['process'] ?? [];

$sectionId = $processConfig['id'] ?? 'cs8-process';

$title = $processConfig['title']
    ?? 'Delivery process & collaboration';

// Steps
$steps = $processConfig['steps'] ?? [
    [
        'step'        => '01',
        'name'        => 'Discovery & alignment',
        'duration'    => '1–2 weeks',
        'description' => 'Clarify goals, map current workflows and align on constraints, risks and success measures.',
    ],
    [
        'step'        => '02',
        'name'        => 'UX flows & interface design',
        'duration'    => '2–3 weeks',
        'description' => 'Translate real-world scenarios into flows, wireframes and interface patterns.',
    ],
    [
        'step'        => '03',
        'name'        => 'MVP development',
        'duration'    => '4–6 weeks',
        'description' => 'Iterative backend and frontend development with frequent demos and feedback loops.',
    ],
    [
        'step'        => '04',
        'name'        => 'Pilot & refinement',
        'duration'    => '2 weeks',
        'description' => 'Launch to a controlled group of users, capture edge cases and refine flows.',
    ],
    [
        'step'        => '05',
        'name'        => 'Rollout & support',
        'duration'    => 'Ongoing',
        'description' => 'Roll out to the wider team and continue improving based on real usage and metrics.',
    ],
];

// Clean steps
$steps = array_values(array_filter($steps, function ($step) {
    if (!is_array($step)) {
        return false;
    }
    $name = trim((string)($step['name'] ?? ''));
    $description = trim((string)($step['description'] ?? ''));
    return $name !== '' || $description !== '';
}));

// Engagement model box
$engagementConfig = $processConfig['engagement_model'] ?? [];
$engagementLabel = $engagementConfig['label'] ?? 'Engagement model used';
$engagementDescription = $engagementConfig['description']
    ?? 'We typically start under a focused MVP-style engagement, then move into a lighter ongoing collaboration model once the initial product is live.';
$engagementLinks = $engagementConfig['links'] ?? [
    [
        'label' => 'Start-up MVP approach',
        'href'  => '/start-up-mvp/',
    ],
    [
        'label' => 'Engagement models at QalbIT',
        'href'  => '/engagement-model/',
    ],
];
$engagementLinks = array_values(array_filter($engagementLinks, function ($link) {
    return !empty($link['label']) && !empty($link['href']);
}));
?>

<section
    id="<?= htmlspecialchars($sectionId, ENT_QUOTES); ?>"
    class="relative bg-slate-950 text-slate-50 py-14 sm:py-18 lg:py-20"
    data-cs-section="process"
>
    <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-sky-500/0 via-sky-500/40 to-emerald-400/0"></div>

    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 space-y-8">
        <!-- Header -->
        <header
            class="max-w-3xl space-y-3"
            data-cs-process-el="header"
        >
            <p class="text-[11px] font-semibold uppercase tracking-[0.16em] text-sky-400">
                Delivery process & collaboration
            </p>

            <h2 class="text-display-md sm:text-display-lg md:text-display-xl font-bold tracking-tight text-white">
                <?= htmlspecialchars($title, ENT_QUOTES); ?>
            </h2>

            <p class="text-sm sm:text-base text-slate-300 leading-relaxed">
                We favour a transparent, iterative delivery model with enough structure to keep momentum,
                and enough flexibility to adjust as we learn from real usage.
            </p>
        </header>

        <!-- Timeline + engagement model -->
        <div
            class="grid gap-8 lg:grid-cols-[minmax(0,3.1fr)_minmax(0,2.1fr)] lg:items-start"
            data-cs-process-el="layout"
        >
            <!-- Timeline -->
            <div class="space-y-5" data-cs-process-el="timeline">
                <?php if (!empty($steps)): ?>
                    <ol class="relative space-y-5 before:absolute before:left-4 before:top-1 before:h-[calc(100%-0.5rem)] before:w-px before:bg-slate-800 sm:before:left-5 lg:before:left-4">
                        <?php foreach ($steps as $index => $step): ?>
                            <?php
                                $stepNumber   = trim((string)($step['step'] ?? ''));
                                $stepLabel    = $stepNumber !== '' ? $stepNumber : sprintf('%02d', $index + 1);
                                $name         = trim((string)($step['name'] ?? ''));
                                $duration     = trim((string)($step['duration'] ?? ''));
                                $description  = trim((string)($step['description'] ?? ''));
                            ?>
                            <li
                                class="relative flex gap-4 sm:gap-5 lg:gap-6"
                                data-cs-el="process-step"
                            >
                                <!-- Timeline dot -->
                                <div class="relative z-10 mt-1.5 flex h-7 w-7 flex-none items-center justify-center sm:h-8 sm:w-8">
                                    <div class="h-full w-full rounded-full bg-slate-900 border border-slate-700 flex items-center justify-center shadow-[0_0_0_4px_rgba(15,23,42,0.9)]">
                                        <span class="text-[11px] font-semibold text-sky-400">
                                            <?= htmlspecialchars($stepLabel, ENT_QUOTES); ?>
                                        </span>
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="flex-1 rounded-2xl border border-slate-800 bg-slate-900/70 p-4 sm:p-5">
                                    <div class="flex flex-wrap items-center justify-between gap-2 mb-1.5">
                                        <?php if ($name !== ''): ?>
                                            <h3 class="text-sm sm:text-[15px] font-semibold text-slate-50">
                                                <?= htmlspecialchars($name, ENT_QUOTES); ?>
                                            </h3>
                                        <?php endif; ?>

                                        <?php if ($duration !== ''): ?>
                                            <span class="text-[10px] sm:text-[11px] font-medium text-slate-400">
                                                <?= htmlspecialchars($duration, ENT_QUOTES); ?>
                                            </span>
                                        <?php endif; ?>
                                    </div>

                                    <?php if ($description !== ''): ?>
                                        <p class="text-xs sm:text-sm text-slate-300 leading-relaxed">
                                            <?= nl2br(htmlspecialchars($description, ENT_QUOTES)); ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ol>
                <?php else: ?>
                    <p class="text-xs sm:text-sm text-slate-400">
                        The project timeline for this case study will be documented here – typically from discovery
                        to pilot and general rollout, highlighting how we collaborated with stakeholders at each step.
                    </p>
                <?php endif; ?>

                <p class="text-[11px] sm:text-xs text-slate-500 leading-relaxed">
                    Each step includes regular demos, async updates and clear ownership so both teams know what is
                    happening, what is blocked and what is coming next.
                </p>
            </div>

            <!-- Engagement model card -->
            <aside
                class="space-y-4 rounded-3xl border border-slate-800 bg-slate-900/80 p-5 sm:p-6 lg:p-7 shadow-[0_18px_45px_rgba(15,23,42,0.85)]"
                data-cs-process-el="engagement"
            >
                <header class="space-y-1">
                    <h3 class="text-xs sm:text-sm font-semibold uppercase tracking-[0.18em] text-slate-300">
                        <?= htmlspecialchars($engagementLabel, ENT_QUOTES); ?>
                    </h3>
                    <p class="text-[11px] sm:text-xs text-slate-400">
                        How we structured pricing, scope and collaboration for this project.
                    </p>
                </header>

                <?php if (!empty($engagementDescription)): ?>
                    <p class="text-xs sm:text-sm text-slate-200 leading-relaxed">
                        <?= nl2br(htmlspecialchars($engagementDescription, ENT_QUOTES)); ?>
                    </p>
                <?php endif; ?>

                <?php if (!empty($engagementLinks)): ?>
                    <div class="mt-3 flex flex-wrap gap-2 text-[11px] sm:text-xs">
                        <?php foreach ($engagementLinks as $link): ?>
                            <a
                                href="<?= htmlspecialchars($link['href'], ENT_QUOTES); ?>"
                                class="inline-flex items-center gap-1 rounded-full border border-slate-700 bg-slate-900 px-3 py-1
                                       text-slate-100 hover:border-sky-400 hover:text-sky-200 hover:bg-slate-900/80
                                       transition-colors"
                            >
                                <span class="font-medium">
                                    <?= htmlspecialchars($link['label'], ENT_QUOTES); ?>
                                </span>
                                <span aria-hidden="true" class="text-[9px]">↗</span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <p class="mt-3 text-[11px] text-slate-500 leading-relaxed">
                    For similar projects, we can adapt the same model or propose a structure that fits your internal
                    team, budget and risk profile — from fixed-scope MVPs to long-term product teams.
                </p>
            </aside>
        </div>
    </div>
</section>
