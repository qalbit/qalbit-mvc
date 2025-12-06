<?php
// Expecting $process to contain the Start-up MVP config (e.g. config('process.start-up-mvp')).

$proc = $process['process'] ?? [];

// Meta
$id      = $proc['id']      ?? 'mvp-process';
$eyebrow = $proc['eyebrow'] ?? 'How we work';
$title   = $proc['title']   ?? 'Our proven MVP development process';
$intro   = $proc['intro']
    ?? 'A structured, transparent approach from discovery to launch, so you always know what is being built, why it matters and when it will be delivered.';

$timelineNote = $proc['timeline_note']
    ?? 'Typical timelines for a Startup MVP with QalbIT range from 8–16 weeks, depending on scope and integrations. We prefer phased engagement so you can validate each step before committing to the next.';

// Default steps (fallbacks)
$defaultSteps = [
    [
        'step'        => 1,
        'kicker'      => 'Product discovery & scoping',
        'title'       => 'Product discovery and MVP scope',
        'description' => 'We unpack your idea, target users, business model and success metrics, then define a focused MVP scope that fits your budget and timeline.',
        'outputs'     => 'Problem statement, personas, feature list, non-goals and success criteria.',
    ],
    [
        'step'        => 2,
        'kicker'      => 'UX flows & interface design',
        'title'       => 'UX flows and interface design',
        'description' => 'We create end-to-end user journeys, wireframes and clickable prototypes so you can validate the experience with stakeholders, advisors and early users.',
        'outputs'     => 'User flows, low and high-fidelity screens, design system basics and a click-through demo.',
    ],
    [
        'step'        => 3,
        'kicker'      => 'Technical architecture & roadmap',
        'title'       => 'Technical architecture and delivery roadmap',
        'description' => 'We pick the right stack, design the data model and integrations, and define a realistic sprint plan covering build, QA and launch activities.',
        'outputs'     => 'Architecture diagram, tech stack, backlog, sprint plan and release milestones.',
    ],
    [
        'step'        => 4,
        'kicker'      => 'Build sprints & QA',
        'title'       => 'MVP build sprints for back-end, front-end and QA',
        'description' => 'Our engineers ship features in short, focused sprints with regular demos, code reviews and structured QA so that you see progress every week.',
        'outputs'     => 'Working increments of the product, test coverage and access to staging environments.',
    ],
    [
        'step'        => 5,
        'kicker'      => 'User feedback & iteration',
        'title'       => 'User feedback and iteration',
        'description' => 'We help you onboard pilot users, capture feedback and prioritise improvements so the MVP becomes something customers are willing to pay for.',
        'outputs'     => 'Analytics setup, feedback backlog, iteration plan and a refined roadmap.',
    ],
    [
        'step'        => 6,
        'kicker'      => 'Launch & post-launch support',
        'title'       => 'Launch, support and next-phase planning',
        'description' => 'We prepare your infrastructure, monitoring and release checklist, then support the launch and help you plan the roadmap towards product–market fit.',
        'outputs'     => 'Production deployment, runbooks, support window and a post-launch roadmap.',
    ],
];

// Steps from config or fallbacks
$steps = $proc['steps'] ?? $defaultSteps;
if (!is_array($steps) || count($steps) === 0) {
    $steps = $defaultSteps;
}
?>

<section
    id="<?= htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?>"
    data-mvp-section="s4"
    class="bg-white"
>
    <div class="mx-auto max-w-6xl px-4 py-16 sm:px-6 lg:px-8 lg:py-20">
        <div class="grid gap-10 lg:grid-cols-[minmax(0,1.1fr)_minmax(0,1.4fr)] lg:items-start">
            <!-- Intro / summary -->
            <header class="max-w-xl space-y-4">
                <p class="text-xs font-medium uppercase tracking-wide text-primary">
                    <?= htmlspecialchars($eyebrow, ENT_QUOTES, 'UTF-8'); ?>
                </p>
                <h2 class="text-display-md sm:text-display-lg md:text-display-xl font-bold text-slate-900">
                    <?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?>
                </h2>
                <p class="text-sm sm:text-base text-slate-600">
                    <?= htmlspecialchars($intro, ENT_QUOTES, 'UTF-8'); ?>
                </p>
                <div class="mt-4 rounded-xl bg-slate-50 px-4 py-4 text-xs text-slate-600 ring-1 ring-slate-200">
                    <p><?= htmlspecialchars($timelineNote, ENT_QUOTES, 'UTF-8'); ?></p>
                </div>
            </header>

            <!-- Steps timeline -->
            <ol class="space-y-4" aria-label="Startup MVP development process">
                <?php foreach ($steps as $step): ?>
                    <?php
                    $number      = isset($step['step']) ? (int) $step['step'] : null;
                    $kicker      = $step['kicker']      ?? null;
                    $stepTitle   = $step['title']       ?? 'Process step';
                    $description = $step['description'] ?? '';
                    $outputs     = $step['outputs']     ?? '';
                    ?>
                    <li
                        class="relative flex gap-4 rounded-2xl bg-slate-50 p-5 text-sm text-slate-600 shadow-sm ring-1 ring-slate-100"
                        data-mvp-step
                    >
                        <!-- Vertical line for timeline (desktop) -->
                        <div class="absolute inset-y-0 left-9 hidden w-px bg-slate-200 lg:block" aria-hidden="true"></div>

                        <!-- Step number badge -->
                        <div class="relative z-10 mt-0.5 flex flex-none items-center justify-center">
                            <div class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-slate-900 text-xs font-semibold text-slate-50 shadow-sm">
                                <?= $number !== null ? htmlspecialchars((string) $number, ENT_QUOTES, 'UTF-8') : '●'; ?>
                            </div>
                        </div>

                        <!-- Step content -->
                        <div class="space-y-2">
                            <?php if ($kicker): ?>
                                <p class="text-[11px] font-semibold uppercase tracking-wide text-primary">
                                    <?= htmlspecialchars($kicker, ENT_QUOTES, 'UTF-8'); ?>
                                </p>
                            <?php endif; ?>

                            <h3 class="text-base font-semibold text-slate-900">
                                <?= htmlspecialchars($stepTitle, ENT_QUOTES, 'UTF-8'); ?>
                            </h3>

                            <?php if ($description !== ''): ?>
                                <p class="text-sm text-slate-600">
                                    <?= htmlspecialchars($description, ENT_QUOTES, 'UTF-8'); ?>
                                </p>
                            <?php endif; ?>

                            <?php if ($outputs !== ''): ?>
                                <p class="text-xs font-medium text-slate-600">
                                    <span class="uppercase tracking-wide text-slate-400">Key outputs:&nbsp;</span>
                                    <span><?= htmlspecialchars($outputs, ENT_QUOTES, 'UTF-8'); ?></span>
                                </p>
                            <?php endif; ?>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ol>
        </div>
    </div>
</section>
