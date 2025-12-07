<?php
/**
 * Technologies – Recent work using these stacks (T10)
 *
 * Teaser section for real case studies.
 */

$caseStudies = [
    [
        'label'      => 'Case 01',
        'title'      => 'Plugin – Tennis club management web app',
        'industry'   => 'Sports clubs · Membership & bookings',
        'summary'    => 'Custom tennis club management & court booking web app that centralises courts, schedules, memberships, pricing and payments in one place.',
        'stack_line' => 'CodeIgniter · PHP · MySQL · Stripe & PayPal · Responsive web UI',
        'outcome'    => 'Reduced double bookings, clearer view of courts and members, and faster reconciliation between bookings and payments.',
        'url'        => '/case-studies/plugin/',
    ],
    [
        'label'      => 'Case 02',
        'title'      => 'Snappy Stats – Scheduling management web app',
        'industry'   => 'Sports academies · Training & education',
        'summary'    => 'Laravel-based scheduling management app that replaces spreadsheets with a centralised calendar for classes, coaches and shooting ranges.',
        'stack_line' => 'Laravel · PHP · MySQL · REST APIs · Role-based access control',
        'outcome'    => '80% fewer scheduling conflicts, real-time visibility into sessions and a single source of truth for bookings.',
        'url'        => '/case-studies/snappy-stats/',
    ],
    [
        'label'      => 'Case 03',
        'title'      => 'Hellory – Smart reminder mobile app',
        'industry'   => 'Consumer apps · Productivity',
        'summary'    => 'Cross-platform Flutter reminder app with recurring schedules, templates and secure notifications backed by a Node.js / MongoDB API.',
        'stack_line' => 'Flutter · Dart · Node.js · MongoDB · REST APIs · Firebase Cloud Messaging',
        'outcome'    => 'Consistent Android & iOS UX from a single codebase and a reliable notification pipeline ready for future premium features.',
        'url'        => '/case-studies/hellory/',
    ],
];
?>

<section
    id="tech-case-studies"
    class="border-t border-slate-100 bg-slate-50 py-16 sm:py-20 lg:py-24"
    data-tech-case-studies-section
    itemscope
    itemtype="https://schema.org/ItemList"
>
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <header
            class="mb-10 space-y-4 text-center md:text-left"
            data-tech-case-studies-header
        >
            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-sky-600">
                Recent work
            </p>
            <h2
                class="text-display-md sm:text-display-lg md:text-display-xl font-bold text-slate-900"
                itemprop="name"
            >
                Recent projects using these technologies
            </h2>
            <p class="text-sm sm:text-base text-slate-600 max-w-3xl">
                A few examples of how we have used CodeIgniter, Laravel and Flutter in real products.
                More detailed case studies can be shared under NDA if your domain is similar.
            </p>
        </header>

        <?php if (!empty($caseStudies)): ?>
            <div
                class="grid gap-6 sm:gap-7 md:grid-cols-2"
                data-tech-case-studies-grid
            >
                <?php
                    $position = 1;
                    foreach ($caseStudies as $case):
                        $label      = $case['label'] ?? '';
                        $title      = $case['title'] ?? '';
                        $industry   = $case['industry'] ?? '';
                        $summary    = $case['summary'] ?? '';
                        $stackLine  = $case['stack_line'] ?? '';
                        $outcome    = $case['outcome'] ?? '';
                        $url        = $case['url'] ?? '#';
                ?>
                    <article
                        class="group relative flex flex-col rounded-2xl border border-slate-200 bg-white p-5 sm:p-6 lg:p-7 shadow-sm hover:border-sky-500/70 hover:shadow-md hover:shadow-sky-100 transition-colors"
                        data-tech-case-study-card
                        itemprop="itemListElement"
                        itemscope
                        itemtype="https://schema.org/CaseStudy"
                    >
                        <meta itemprop="position" content="<?= (int) $position; ?>">
                        <meta itemprop="url" content="<?= htmlspecialchars($url, ENT_QUOTES); ?>">

                        <div class="mb-4 flex items-start justify-between gap-3">
                            <div class="space-y-2">
                                <?php if ($label !== ''): ?>
                                    <p class="inline-flex items-center rounded-full bg-slate-100 px-2.5 py-0.5 text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-700">
                                        <span class="mr-1.5 h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                        <?= htmlspecialchars($label, ENT_QUOTES); ?>
                                    </p>
                                <?php endif; ?>

                                <?php if ($title !== ''): ?>
                                    <h3
                                        class="text-base sm:text-lg font-semibold text-slate-900 group-hover:text-sky-700"
                                        itemprop="name"
                                    >
                                        <a
                                            href="<?= htmlspecialchars($url, ENT_QUOTES); ?>"
                                            class="hover:underline decoration-sky-400/60"
                                        >
                                            <?= htmlspecialchars($title, ENT_QUOTES); ?>
                                        </a>
                                    </h3>
                                <?php endif; ?>

                                <?php if ($industry !== ''): ?>
                                    <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">
                                        <?= htmlspecialchars($industry, ENT_QUOTES); ?>
                                    </p>
                                <?php endif; ?>

                                <?php if ($summary !== ''): ?>
                                    <p
                                        class="text-xs sm:text-sm text-slate-600"
                                        itemprop="description"
                                    >
                                        <?= htmlspecialchars($summary, ENT_QUOTES); ?>
                                    </p>
                                <?php endif; ?>
                            </div>

                            <div class="flex-none">
                                <div class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-slate-50 ring-1 ring-slate-200">
                                    <span class="text-[11px] font-semibold text-slate-700">
                                        <?= sprintf('%02d', $position); ?>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <?php if ($stackLine !== ''): ?>
                            <p class="mb-2 text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">
                                Tech stack
                            </p>
                            <p class="mb-4 text-xs sm:text-sm font-medium text-slate-900">
                                <?= htmlspecialchars($stackLine, ENT_QUOTES); ?>
                            </p>
                        <?php endif; ?>

                        <?php if ($outcome !== ''): ?>
                            <p class="mb-4 text-xs sm:text-sm text-slate-700">
                                <span class="font-semibold text-slate-900">Outcome:</span>
                                <?= htmlspecialchars($outcome, ENT_QUOTES); ?>
                            </p>
                        <?php endif; ?>

                        <div class="mt-auto flex items-center justify-between gap-3 pt-3 border-t border-slate-200">
                            <a
                                href="<?= htmlspecialchars($url, ENT_QUOTES); ?>"
                                class="inline-flex items-center text-[11px] font-semibold text-sky-700 hover:text-sky-600"
                            >
                                Read case study
                                <span class="ml-1 inline-block translate-y-px">→</span>
                            </a>
                            <span class="text-[10px] uppercase tracking-[0.18em] text-slate-400">
                                Real-world example
                            </span>
                        </div>
                    </article>
                <?php
                    $position++;
                    endforeach;
                ?>
            </div>
        <?php endif; ?>
    </div>
</section>
