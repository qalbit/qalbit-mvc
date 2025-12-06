<?php
/**
 * Generic Case Study – The Challenge (CS3)
 *
 * Reusable section for all case studies.
 *
 * Expects:
 * - $caseStudy (array) from config('case_studies')['key']
 *
 * Example structure:
 *
 * 'sections' => [
 *   'challenge' => [
 *       'id'            => 'cs3-challenge',
 *       'title'         => 'The challenge',
 *       'before_title'  => 'Before Snappy Stats',
 *       'before_story'  => 'Narrative describing how things worked before the new product…',
 *       'bullets_title' => 'Key challenges we uncovered',
 *       'challenges'    => [
 *           'Manual scheduling across spreadsheets led to frequent conflicts.',
 *           'No real-time visibility into upcoming capacity.',
 *           // …
 *       ],
 *   ],
 * ]
 */

$caseStudy = $caseStudy ?? [];

$challengeConfig = $caseStudy['sections']['challenge'] ?? [];

$sectionId = $challengeConfig['id'] ?? 'cs3-challenge';

$title = $challengeConfig['title'] ?? 'The challenge';

// "Before product" mini story
$beforeTitle = $challengeConfig['before_title'] ?? 'Before the product existed';

$beforeStory = $challengeConfig['before_story']
    ?? 'Before we designed the custom solution, the team relied on a mix of spreadsheets, email threads and manual coordination. It worked at a small scale, but as volume and complexity increased, the cracks in the process became harder to ignore.';

// Bullets block
$bulletsTitle = $challengeConfig['bullets_title'] ?? 'Key challenges we uncovered';

$challenges = $challengeConfig['challenges'] ?? [
    'Processes relied heavily on spreadsheets and manual updates, increasing the risk of mistakes.',
    'Limited visibility into what was happening today vs. the upcoming weeks or months.',
    'No single source of truth — information was scattered across tools and conversations.',
    'Reporting required manual work, making it difficult to make decisions based on up-to-date data.',
];

// Filter out any empty strings
$challenges = array_values(array_filter($challenges, function ($item) {
    return is_string($item) && trim($item) !== '';
}));
?>

<section
    id="<?= htmlspecialchars($sectionId, ENT_QUOTES); ?>"
    class="relative bg-slate-50 text-slate-900 py-14 sm:py-18 lg:py-20"
    data-cs-section="challenge"
>
    <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-slate-200 via-sky-400/40 to-slate-200"></div>

    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-10 lg:grid-cols-[minmax(0,3fr)_minmax(0,2.2fr)] lg:items-start">
            <!-- Left: Before story / narrative -->
            <div class="space-y-5" data-cs-challenge-el="story">
                <header class="space-y-2">
                    <p class="text-[11px] font-semibold uppercase tracking-[0.16em] text-sky-500">
                        The challenge
                    </p>

                    <h2 class="text-display-md sm:text-display-lg md:text-display-xl font-bold tracking-tight text-slate-950">
                        <?= htmlspecialchars($title, ENT_QUOTES); ?>
                    </h2>
                </header>

                <div class="space-y-3">
                    <h3 class="text-sm sm:text-base font-semibold text-slate-800">
                        <?= htmlspecialchars($beforeTitle, ENT_QUOTES); ?>
                    </h3>

                    <p class="text-sm sm:text-base text-slate-600 leading-relaxed">
                        <?= nl2br(htmlspecialchars($beforeStory, ENT_QUOTES)); ?>
                    </p>
                </div>

                <p class="text-xs sm:text-[13px] text-slate-500 leading-relaxed">
                    This is often the point where generic tools and makeshift processes start to slow down growth.
                    Our first step is to map the real-world workflows and understand where time is lost, where mistakes
                    happen and what is blocking the team from scaling with confidence.
                </p>
            </div>

            <!-- Right: Challenges list -->
            <aside
                class="rounded-3xl border border-slate-200 bg-white/80 p-5 sm:p-6 lg:p-7 shadow-soft-sm"
                data-cs-challenge-el="list"
            >
                <div class="flex flex-col items-start gap-1 mb-6">
                    <h3 class="text-xs sm:text-sm font-semibold uppercase tracking-[0.18em] text-slate-600">
                        <?= htmlspecialchars($bulletsTitle, ENT_QUOTES); ?>
                    </h3>
                    <span class="hidden text-[11px] font-medium text-slate-400 sm:inline">
                        Inputs into the product & architecture decisions
                    </span>
                </div>

                <?php if (!empty($challenges)): ?>
                    <ul class="space-y-2 text-xs sm:text-sm">
                        <?php foreach ($challenges as $index => $challengeText): ?>
                            <li
                                class="flex gap-2"
                                data-cs-el="challenge-item"
                            >
                                <div class="mt-0.5">
                                    <span
                                        class="flex h-5 w-5 items-center justify-center rounded-full bg-sky-50
                                               text-[11px] font-semibold text-sky-600 border border-sky-100"
                                    >
                                        <?= $index + 1; ?>
                                    </span>
                                </div>
                                <p class="text-slate-700 text-xs font-medium leading-relaxed">
                                    <?= htmlspecialchars($challengeText, ENT_QUOTES); ?>
                                </p>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p class="text-xs text-slate-500">
                        Challenges for this case study will be added soon. For now, we focus on understanding the gap
                        between how work is done today and how it needs to operate in the future.
                    </p>
                <?php endif; ?>

                <p class="mt-4 text-[11px] text-slate-500 leading-relaxed">
                    These challenges directly informed the product goals, UX flows and architectural decisions you&apos;ll
                    see in the next sections.
                </p>
            </aside>
        </div>
    </div>
</section>
