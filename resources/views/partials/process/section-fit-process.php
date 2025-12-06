<?php
// Expecting $process to contain the Start-up MVP config (e.g. config('process.start-up-mvp')).

$fit = $process['fit'] ?? [];

// Title & intro
$title = $fit['title'] ?? 'Built for founders and product teams who need to move fast';
$intro = $fit['intro']
    ?? 'QalbIT partners with early-stage startups and growing product companies that need a reliable MVP development agency to turn ideas into real products without the chaos of freelancers or a risky in-house build.';

// Default personas (fallbacks)
$defaultPersonas = [
    [
        'key'       => 'non-technical-founder',
        'label'     => 'Non-technical founder',
        'situation' => 'You have a clear problem and market, but you do not have a tech co-founder and you are tired of juggling multiple freelancers or agencies that over-promise and disappear.',
        'help'      => 'We act as your product and tech team — refining scope, suggesting features for a lean MVP, selecting the right stack and guiding you through every decision from prototype to launch.',
    ],
    [
        'key'       => 'product-manager',
        'label'     => 'Product manager or head of product',
        'situation' => 'You are responsible for validating a new product line or feature set and need an execution-focused MVP development company that can work alongside your internal stakeholders.',
        'help'      => 'We convert discovery insights into UX flows, click-through prototypes and a small but robust MVP that can be measured in terms of adoption, retention and revenue impact.',
    ],
    [
        'key'       => 'cto-tech-lead',
        'label'     => 'CTO / tech lead',
        'situation' => 'You own the architecture and long-term roadmap but need an experienced squad of MVP developers to move faster than your internal capacity allows.',
        'help'      => 'We plug in as an extension of your team, aligning to your coding standards, infrastructure and review process while owning delivery of specific MVP modules or streams.',
    ],
    [
        'key'       => 'operations-owner',
        'label'     => 'Operations / business owner',
        'situation' => 'You see inefficiencies in your operations and want an internal tool or SaaS-style MVP to digitise workflows, but you do not want to manage a large in-house tech team.',
        'help'      => 'We map your processes, design simple interfaces for your teams and deliver a secure web or mobile MVP that fits your budget and can be evolved into a full product over time.',
    ],
];

// Personas from config (or fall back)
$personas = $fit['personas'] ?? $defaultPersonas;
if (!is_array($personas) || count($personas) === 0) {
    $personas = $defaultPersonas;
}

// Problems meta and list
$problemsTitle = $fit['problems_title'] ?? 'Common problems we solve for startup MVPs';

$defaultProblems = [
    'Freelancer teams that disappear mid-way or ship poor quality code.',
    'Scope creep and missed timelines that delay your fundraising or go-to-market.',
    'Legacy code bases that are hard to extend, maintain or hand-over to new teams.',
    'Over-engineered architectures that are too expensive for early-stage MVPs.',
    'Disconnected teams where design, development and QA do not talk to each other.',
    'Founders struggling to hire MVP developers they can trust.',
];

$problems = $fit['problems'] ?? $defaultProblems;
if (!is_array($problems) || count($problems) === 0) {
    $problems = $defaultProblems;
}

// Split problems into two columns
$totalProblems = count($problems);
$mid           = (int) ceil($totalProblems / 2);
$problemsLeft  = array_slice($problems, 0, $mid);
$problemsRight = array_slice($problems, $mid);
?>

<section
    id="mvp-fit"
    data-mvp-section="s2"
    class="bg-white"
>
    <div class="mx-auto max-w-6xl px-4 py-16 sm:px-6 lg:px-8 lg:py-20">
        <header class="max-w-3xl space-y-3">
            <h2 class="text-display-md sm:text-display-lg md:text-display-xl font-bold text-slate-900">
                <?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?>
            </h2>
            <p class="text-sm sm:text-base text-slate-600">
                <?= htmlspecialchars($intro, ENT_QUOTES, 'UTF-8'); ?>
            </p>
        </header>

        <div class="mt-10 grid gap-6 md:grid-cols-2">
            <?php foreach ($personas as $persona): ?>
                <?php
                $label     = $persona['label']     ?? 'Founder or product owner';
                $situation = $persona['situation'] ?? '';
                $help      = $persona['help']      ?? '';
                ?>
                <article class="flex h-full flex-col rounded-2xl bg-slate-50 p-5 shadow-sm ring-1 ring-slate-100">
                    <h3 class="text-sm font-semibold uppercase tracking-wide text-primary">
                        <?= htmlspecialchars($label, ENT_QUOTES, 'UTF-8'); ?>
                    </h3>
                    <?php if ($situation !== ''): ?>
                        <p class="mt-2 text-sm text-slate-600">
                            <?= htmlspecialchars($situation, ENT_QUOTES, 'UTF-8'); ?>
                        </p>
                    <?php endif; ?>

                    <?php if ($help !== ''): ?>
                        <p class="mt-3 text-xs uppercase font-medium text-slate-900">
                            How we help
                        </p>
                        <p class="mt-1 text-xs text-slate-600">
                            <?= htmlspecialchars($help, ENT_QUOTES, 'UTF-8'); ?>
                        </p>
                    <?php endif; ?>
                </article>
            <?php endforeach; ?>
        </div>

        <!-- Problems we solve -->
        <div class="mt-10 max-w-4xl rounded-2xl bg-slate-900 px-6 py-6 text-sm text-slate-100 sm:px-8">
            <h3 class="text-base font-semibold text-white">
                <?= htmlspecialchars($problemsTitle, ENT_QUOTES, 'UTF-8'); ?>
            </h3>
            <div class="mt-3 grid gap-3 md:grid-cols-2">
                <ul class="space-y-2">
                    <?php foreach ($problemsLeft as $problem): ?>
                        <li class="flex gap-2">
                            <span class="mt-1.5 inline-flex h-1.5 w-1.5 flex-none rounded-full bg-emerald-400"></span>
                            <span><?= htmlspecialchars($problem, ENT_QUOTES, 'UTF-8'); ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <ul class="space-y-2">
                    <?php foreach ($problemsRight as $problem): ?>
                        <li class="flex gap-2">
                            <span class="mt-1.5 inline-flex h-1.5 w-1.5 flex-none rounded-full bg-emerald-400"></span>
                            <span><?= htmlspecialchars($problem, ENT_QUOTES, 'UTF-8'); ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</section>
