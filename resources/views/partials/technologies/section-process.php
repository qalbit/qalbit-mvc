<?php
/**
 * Technologies – How we choose the right tech stack (T8)
 *
 * Standalone section, no external data required.
 */

$steps = [
    [
        'label'       => 'Step 01',
        'title'       => 'Understand your product & constraints',
        'description' => 'We start with your business model, users, internal team and current systems – not with a pre-selected framework.',
        'bullets'     => [
            'Clarify goals, domain and key user journeys',
            'Map current stack, integrations and data sources',
            'Capture constraints: budget, timelines, hiring market',
        ],
    ],
    [
        'label'       => 'Step 02',
        'title'       => 'Map architecture & integration needs',
        'description' => 'We shape an architecture that fits how your product actually works today – and how it is likely to evolve.',
        'bullets'     => [
            'Decide on API-first, monolith or modular approach',
            'Identify critical integrations and data flows',
            'Consider security, compliance and scalability needs',
        ],
    ],
    [
        'label'       => 'Step 03',
        'title'       => 'Propose a pragmatic tech stack',
        'description' => 'We recommend a stack based on proven tools we use daily – React/Next.js, Node/Nest.js, Laravel, Flutter, WordPress and more.',
        'bullets'     => [
            'Select frontend, backend, mobile, DB and cloud pieces',
            'Prefer technologies with solid communities & support',
            'Avoid over-engineering for early-stage products',
        ],
    ],
    [
        'label'       => 'Step 04',
        'title'       => 'Validate, iterate & plan handover',
        'description' => 'We validate stack choices against your roadmap, risk profile and internal team capabilities.',
        'bullets'     => [
            'Review trade-offs with you in plain language',
            'Align on roadmap, milestones and non-goals',
            'Plan future hiring and smooth handover from day one',
        ],
    ],
];
?>

<section
    id="tech-process"
    class="border-t border-slate-900 bg-slate-950 py-16 sm:py-20 lg:py-24"
    data-tech-process-section
    itemscope
    itemtype="https://schema.org/HowTo"
>
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <header
            class="mb-10 space-y-4 text-center md:text-left"
            data-tech-process-header
        >
            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-sky-300">
                Approach
            </p>
            <h2
                class="text-display-md sm:text-display-lg md:text-display-xl font-bold text-slate-50"
                itemprop="name"
            >
                How we choose the right tech stack for your product
            </h2>
            <p class="text-sm sm:text-base text-slate-300 max-w-3xl">
                Instead of pushing a trendy framework, we match technologies to your domain, constraints
                and roadmap. The outcome is a stack that is realistic to build, maintain and hire for –
                not just something that looks good on a slide.
            </p>
        </header>

        <meta itemprop="tool" content="React, Next.js, Node.js, Nest.js, Laravel, Flutter, WordPress, PostgreSQL, MySQL, AWS">

        <?php if (!empty($steps)): ?>
            <div
                class="grid gap-6 sm:gap-7 md:grid-cols-2"
                data-tech-process-steps
            >
                <?php
                    $position = 1;
                    foreach ($steps as $step):
                        $label       = $step['label'] ?? '';
                        $title       = $step['title'] ?? '';
                        $description = $step['description'] ?? '';
                        $bullets     = $step['bullets'] ?? [];
                ?>
                    <article
                        class="group relative flex flex-col rounded-2xl border border-slate-800/80 bg-slate-900/70 p-5 sm:p-6 lg:p-7 shadow-sm shadow-black/20 hover:border-sky-400/70 hover:bg-slate-900/90 transition-colors"
                        data-tech-process-step
                        itemprop="step"
                        itemscope
                        itemtype="https://schema.org/HowToStep"
                    >
                        <meta itemprop="position" content="<?= (int) $position; ?>">

                        <div class="mb-4 flex items-start justify-between gap-3">
                            <div class="space-y-2">
                                <?php if ($label !== ''): ?>
                                    <p class="inline-flex items-center rounded-full bg-slate-900 px-2.5 py-0.5 text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-300">
                                        <span class="mr-1.5 h-1.5 w-1.5 rounded-full bg-sky-400"></span>
                                        <?= htmlspecialchars($label, ENT_QUOTES); ?>
                                    </p>
                                <?php endif; ?>

                                <?php if ($title !== ''): ?>
                                    <h3
                                        class="text-base sm:text-lg font-semibold text-slate-50 group-hover:text-sky-300"
                                        itemprop="name"
                                    >
                                        <?= htmlspecialchars($title, ENT_QUOTES); ?>
                                    </h3>
                                <?php endif; ?>

                                <?php if ($description !== ''): ?>
                                    <p
                                        class="text-xs sm:text-sm text-slate-300"
                                        itemprop="text"
                                    >
                                        <?= htmlspecialchars($description, ENT_QUOTES); ?>
                                    </p>
                                <?php endif; ?>
                            </div>

                            <div class="flex-none">
                                <div class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-slate-800/80 ring-1 ring-slate-700/80">
                                    <span class="text-[11px] font-semibold text-slate-200">
                                        <?= sprintf('%02d', $position); ?>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <?php if (!empty($bullets)): ?>
                            <ul class="mb-2 flex-1 space-y-1.5 text-xs sm:text-sm text-slate-200">
                                <?php foreach ($bullets as $bullet): ?>
                                    <li class="flex gap-2">
                                        <span class="mt-1 h-1.5 w-1.5 flex-none rounded-full bg-sky-400"></span>
                                        <span><?= htmlspecialchars($bullet, ENT_QUOTES); ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                        <p class="mt-3 text-[11px] text-slate-500">
                            This step ensures we are aligning technology choices with your
                            roadmap, risk tolerance and team – not just with our internal preferences.
                        </p>
                    </article>
                <?php
                    $position++;
                    endforeach;
                ?>
            </div>
        <?php endif; ?>
    </div>
</section>
