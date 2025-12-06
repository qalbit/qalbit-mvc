<?php
/**
 * Generic Case Study – Project Goals & Success Criteria (CS4)
 *
 * Reusable section for all case studies.
 *
 * Expects:
 * - $caseStudy (array) from config('case_studies')['key']
 *
 * Example structure:
 *
 * 'sections' => [
 *   'goals' => [
 *       'id'    => 'cs4-goals',
 *       'title' => 'Project goals & success criteria',
 *       'business_goals_title' => 'Business goals',
 *       'business_goals' => [
 *           'Eliminate double bookings and scheduling conflicts.',
 *           'Give admins real-time visibility into today’s schedule and upcoming weeks.',
 *           // …
 *       ],
 *       'product_goals_title' => 'Product & technical goals',
 *       'product_goals' => [
 *           'Design an intuitive scheduling interface for non-technical staff.',
 *           'Implement robust role-based access control.',
 *           // …
 *       ],
 *       'note' => 'We agreed on a phased rollout: launch a focused MVP, validate flows, then extend capabilities.',
 *   ],
 * ]
 */

$caseStudy = $caseStudy ?? [];

$goalsConfig = $caseStudy['sections']['goals'] ?? [];

$sectionId = $goalsConfig['id'] ?? 'cs4-goals';

$title = $goalsConfig['title'] ?? 'Project goals & success criteria';

// Column A – business goals
$businessGoalsTitle = $goalsConfig['business_goals_title'] ?? 'Business goals';
$businessGoals = $goalsConfig['business_goals'] ?? [
    'Reduce operational risk and errors in day-to-day workflows.',
    'Improve visibility into key activities and performance.',
    'Free up internal teams from manual, repetitive coordination.',
];

// Column B – product & technical goals
$productGoalsTitle = $goalsConfig['product_goals_title'] ?? 'Product & technical goals';
$productGoals = $goalsConfig['product_goals'] ?? [
    'Design a user experience that matches how the team actually works.',
    'Choose an architecture that is maintainable and ready to scale.',
    'Expose key capabilities via APIs for future integrations.',
];

// Clean up empties
$businessGoals = array_values(array_filter($businessGoals, fn ($g) => is_string($g) && trim($g) !== ''));
$productGoals  = array_values(array_filter($productGoals, fn ($g) => is_string($g) && trim($g) !== ''));

// Note / rollout comment
$note = $goalsConfig['note']
    ?? 'We typically start with a focused MVP, validate it with real users in production-like conditions and then evolve the product based on clear metrics and feedback.';
?>

<section
    id="<?= htmlspecialchars($sectionId, ENT_QUOTES); ?>"
    class="relative bg-slate-950 text-slate-50 py-14 sm:py-18 lg:py-20"
    data-cs-section="goals"
>
    <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-sky-500/0 via-emerald-400/50 to-sky-500/0"></div>

    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 space-y-8">
        <!-- Section header -->
        <header class="max-w-3xl space-y-3" data-cs-goals-el="header">
            <p class="text-[11px] font-semibold uppercase tracking-[0.16em] text-emerald-400">
                Goals & success criteria
            </p>

            <h2 class="text-display-md sm:text-display-lg md:text-display-xl font-bold tracking-tight text-white">
                <?= htmlspecialchars($title, ENT_QUOTES); ?>
            </h2>

            <p class="text-sm sm:text-base text-slate-300 leading-relaxed">
                Clear goals upfront help us make intentional trade-offs during UX and engineering,
                and define what “successful launch” actually means for the client team.
            </p>
        </header>

        <!-- Goals columns -->
        <div
            class="grid gap-6 md:grid-cols-2"
            data-cs-goals-el="columns"
        >
            <!-- Business goals -->
            <div
                class="rounded-3xl border border-slate-800 bg-slate-900/70 p-5 sm:p-6 lg:p-7 space-y-4"
                data-cs-goals-el="business"
            >
                <div class="flex items-center justify-between gap-3">
                    <h3 class="text-sm sm:text-base font-semibold text-slate-50 flex-shrink-0">
                        <?= htmlspecialchars($businessGoalsTitle, ENT_QUOTES); ?>
                    </h3>
                    <span class="hidden text-[10px] font-medium text-slate-500 sm:inline text-end">
                        Why the project matters to the business
                    </span>
                </div>

                <?php if (!empty($businessGoals)): ?>
                    <ul class="space-y-3 text-xs sm:text-sm">
                        <?php foreach ($businessGoals as $goal): ?>
                            <li class="flex gap-3" data-cs-el="business-goal">
                                <span class="mt-1 flex-shrink-0 inline-flex h-5 w-5 items-center justify-center rounded-full border border-emerald-400/60 bg-emerald-500/10">
                                    <span class="h-2 w-2 rounded-full bg-emerald-400"></span>
                                </span>
                                <p class="text-slate-200 leading-relaxed">
                                    <?= htmlspecialchars($goal, ENT_QUOTES); ?>
                                </p>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p class="text-xs text-slate-400">
                        Business goals for this case study will be added soon.
                    </p>
                <?php endif; ?>
            </div>

            <!-- Product & technical goals -->
            <div
                class="rounded-3xl border border-slate-800 bg-slate-900/70 p-5 sm:p-6 lg:p-7 space-y-4"
                data-cs-goals-el="product"
            >
                <div class="flex items-center justify-between gap-3">
                    <h3 class="text-sm sm:text-base font-semibold text-slate-50 flex-shrink-0">
                        <?= htmlspecialchars($productGoalsTitle, ENT_QUOTES); ?>
                    </h3>
                    <span class="hidden text-[10px] font-medium text-slate-500 sm:inline text-end">
                        How we translate goals into product & architecture
                    </span>
                </div>

                <?php if (!empty($productGoals)): ?>
                    <ul class="space-y-3 text-xs sm:text-sm">
                        <?php foreach ($productGoals as $goal): ?>
                            <li class="flex gap-3" data-cs-el="product-goal">
                                <span class="mt-1 flex-shrink-0 inline-flex h-5 w-5 items-center justify-center rounded-full border border-sky-400/60 bg-sky-500/10">
                                    <span class="h-2 w-2 rounded-full bg-sky-400"></span>
                                </span>
                                <p class="text-slate-200 leading-relaxed">
                                    <?= htmlspecialchars($goal, ENT_QUOTES); ?>
                                </p>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p class="text-xs text-slate-400">
                        Product & technical goals for this case study will be added soon.
                    </p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Rollout / note -->
        <?php if (!empty($note)): ?>
            <div
                class="mt-2 rounded-2xl border border-slate-800 bg-slate-900/80 p-4 sm:p-5 flex flex-col gap-2 sm:flex-row sm:items-center"
                data-cs-goals-el="note"
            >
                <div class="flex-shrink-0 mt-0.5 sm:mt-0">
                    <span
                        class="inline-flex items-center justify-center rounded-full bg-slate-800 px-3 py-1
                               text-[10px] font-semibold uppercase tracking-[0.18em] text-slate-300"
                    >
                        Rollout approach
                    </span>
                </div>
                <p class="text-[11px] sm:text-xs text-slate-300 leading-relaxed">
                    <?= nl2br(htmlspecialchars($note, ENT_QUOTES)); ?>
                </p>
            </div>
        <?php endif; ?>
    </div>
</section>
