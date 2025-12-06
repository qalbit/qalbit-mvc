<?php
/**
 * Generic Case Study – Architecture & Tech Stack (CS7)
 *
 * Reusable section for all case studies.
 *
 * Expects:
 * - $caseStudy (array) from config('case_studies')['key']
 *
 * Example structure:
 *
 * 'sections' => [
 *   'stack' => [
 *       'id'    => 'cs7-stack',
 *       'title' => 'Architecture & technology stack',
 *       'backend_title' => 'Backend & infrastructure',
 *       'backend' => [
 *           'Laravel / PHP application layer following modular architecture.',
 *           'MySQL database with indexed tables for schedules and resources.',
 *           // …
 *       ],
 *       'frontend_title' => 'Frontend & UX',
 *       'frontend' => [
 *           'Responsive web UI implemented with Tailwind CSS.',
 *           'Reusable components for cards, tables and forms.',
 *           // …
 *       ],
 *       'tech_pills' => [
 *           'Laravel',
 *           'PHP 8',
 *           'MySQL',
 *           'REST APIs',
 *           'Tailwind CSS',
 *           'Git-based workflow',
 *       ],
 *   ],
 * ]
 */

$caseStudy = $caseStudy ?? [];

$stackConfig = $caseStudy['sections']['stack'] ?? [];

$sectionId = $stackConfig['id'] ?? 'cs7-stack';

$title = $stackConfig['title']
    ?? 'Architecture & technology stack';

// Backend column
$backendTitle = $stackConfig['backend_title'] ?? 'Backend & infrastructure';
$backendItems = $stackConfig['backend'] ?? [
    'Modern application stack designed for maintainability and future integrations.',
    'Relational database modelling key entities and relationships.',
    'Security, logging and environment-specific configuration baked into the core.',
];

// Frontend column
$frontendTitle = $stackConfig['frontend_title'] ?? 'Frontend & UX';
$frontendItems = $stackConfig['frontend'] ?? [
    'Responsive, component-based UI implemented with Tailwind CSS.',
    'Layouts designed for clarity, reducing cognitive load in daily use.',
    'Interaction patterns aligned with keyboard and accessibility best practices.',
];

// Clean up empties
$backendItems = array_values(array_filter($backendItems, fn ($item) => is_string($item) && trim($item) !== ''));
$frontendItems = array_values(array_filter($frontendItems, fn ($item) => is_string($item) && trim($item) !== ''));

// Tech pills
$techPills = $stackConfig['tech_pills'] ?? ($caseStudy['tech_stack'] ?? []);
$techPills = array_values(array_filter($techPills, fn ($pill) => is_string($pill) && trim($pill) !== ''));

// If still empty, provide generic defaults
if (empty($techPills)) {
    $techPills = [
        'Laravel / PHP',
        'MySQL',
        'REST APIs',
        'Tailwind CSS',
    ];
}
?>

<section
    id="<?= htmlspecialchars($sectionId, ENT_QUOTES); ?>"
    class="relative bg-slate-50 text-slate-900 py-14 sm:py-18 lg:py-20"
    data-cs-section="stack"
>
    <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-slate-200 via-sky-400/40 to-slate-200"></div>

    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 space-y-8">
        <!-- Header -->
        <header
            class="max-w-3xl space-y-3"
            data-cs-stack-el="header"
        >
            <p class="text-[11px] font-semibold uppercase tracking-[0.16em] text-sky-500">
                Architecture & stack
            </p>

            <h2 class="text-display-md sm:text-display-lg md:text-display-xl font-bold tracking-tight text-slate-950">
                <?= htmlspecialchars($title, ENT_QUOTES); ?>
            </h2>

            <p class="text-sm sm:text-base text-slate-700 leading-relaxed">
                The technology stack is deliberately simple, maintainable and aligned with the team&apos;s long-term
                roadmap — powerful enough for today&apos;s needs without locking the product into unnecessary complexity.
            </p>
        </header>

        <!-- Columns: backend & frontend -->
        <div
            class="grid gap-6 md:grid-cols-2"
            data-cs-stack-el="columns"
        >
            <!-- Backend & infrastructure -->
            <div
                class="rounded-3xl border border-slate-200 bg-white/90 p-5 sm:p-6 lg:p-7 shadow-soft-sm"
                data-cs-stack-el="backend"
            >
                <div class="flex items-center justify-between gap-3 mb-4">
                    <h3 class="text-sm sm:text-base font-semibold text-slate-900">
                        <?= htmlspecialchars($backendTitle, ENT_QUOTES); ?>
                    </h3>
                    <span class="hidden text-[10px] font-medium text-slate-400 sm:inline">
                        Reliability, security & maintainability
                    </span>
                </div>

                <?php if (!empty($backendItems)): ?>
                    <ul class="space-y-3 text-xs sm:text-sm">
                        <?php foreach ($backendItems as $item): ?>
                            <li class="flex gap-3" data-cs-el="backend-item">
                                <span class="mt-1 inline-flex h-5 w-5 flex-none items-center justify-center rounded-full bg-sky-50 border border-sky-100">
                                    <span class="h-2 w-2 rounded-full bg-sky-500"></span>
                                </span>
                                <p class="text-slate-700 leading-relaxed">
                                    <?= htmlspecialchars($item, ENT_QUOTES); ?>
                                </p>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p class="text-xs text-slate-500">
                        Backend details for this case study will be added soon.
                    </p>
                <?php endif; ?>
            </div>

            <!-- Frontend & UX -->
            <div
                class="rounded-3xl border border-slate-200 bg-white/90 p-5 sm:p-6 lg:p-7 shadow-soft-sm"
                data-cs-stack-el="frontend"
            >
                <div class="flex items-center justify-between gap-3 mb-4">
                    <h3 class="text-sm sm:text-base font-semibold text-slate-900">
                        <?= htmlspecialchars($frontendTitle, ENT_QUOTES); ?>
                    </h3>
                    <span class="hidden text-[10px] font-medium text-slate-400 sm:inline">
                        Clarity, speed & accessibility
                    </span>
                </div>

                <?php if (!empty($frontendItems)): ?>
                    <ul class="space-y-3 text-xs sm:text-sm">
                        <?php foreach ($frontendItems as $item): ?>
                            <li class="flex gap-3" data-cs-el="frontend-item">
                                <span class="mt-1 inline-flex h-5 w-5 flex-none items-center justify-center rounded-full bg-emerald-50 border border-emerald-100">
                                    <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                                </span>
                                <p class="text-slate-700 leading-relaxed">
                                    <?= htmlspecialchars($item, ENT_QUOTES); ?>
                                </p>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p class="text-xs text-slate-500">
                        Frontend & UX details for this case study will be added soon.
                    </p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Tech pills -->
        <?php if (!empty($techPills)): ?>
            <div
                class="mt-2 flex flex-wrap gap-2"
                data-cs-stack-el="tech-pills"
            >
                <?php foreach ($techPills as $pill): ?>
                    <span
                        class="inline-flex items-center rounded-full border border-slate-200 bg-white px-3 py-1
                               text-[11px] sm:text-xs font-medium text-slate-700 shadow-soft-sm"
                    >
                        <?= htmlspecialchars($pill, ENT_QUOTES); ?>
                    </span>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <p class="mt-3 text-[11px] sm:text-xs text-slate-500 leading-relaxed">
            We favour stacks that your in-house team or future partners can understand and extend — with clear
            boundaries between frontend, backend and integrations so the product can evolve without constant rewrites.
        </p>
    </div>
</section>
