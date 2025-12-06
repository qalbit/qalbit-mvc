<?php
// =======================================
// S5 – Engagement models & budget guidance
// =======================================

// Expecting $process to contain the Start-up MVP config (e.g. config('process.start-up-mvp')).
$engagements = $process['engagements'] ?? [];

$id      = $engagements['id']      ?? 'mvp-engagements';
$eyebrow = $engagements['eyebrow'] ?? 'Engagement models';
$title   = $engagements['title']   ?? 'Engagement models and budget guidance';
$intro   = $engagements['intro']
    ?? 'Whether you are validating a brand new idea or scaling a working MVP, we keep our engagement models transparent so you know what to expect in terms of time, cost and responsibilities.';

$defaultModels = [
    [
        'key'          => 'prototype-sprint',
        'label'        => 'Prototype Sprint',
        'badge'        => '2–3 weeks',
        'duration'     => '2–3 weeks',
        'description'  => 'A focused design and prototyping engagement to visualise your idea, align stakeholders and test the core experience before committing to full development.',
        'best_for'     => 'Early-stage founders preparing for investor pitches or internal approvals.',
        'budget_range' => '₹1.5L–₹3L (USD 2–4K), depending on scope and complexity.',
        'deliverables' => 'UX flows, clickable prototype, high-level architecture and a ballpark MVP estimate.',
    ],
    [
        'key'          => 'full-mvp-build',
        'label'        => 'Full MVP Build',
        'badge'        => '8–12+ weeks',
        'duration'     => '8–12+ weeks',
        'description'  => 'End-to-end MVP development with discovery, UX, architecture, engineering and QA handled by a dedicated QalbIT squad.',
        'best_for'     => 'Funded startups and founders with a clear problem–solution fit and roadmap.',
        'budget_range' => '₹6L–₹18L (USD 8–25K), based on modules, integrations and platforms.',
        'deliverables' => 'Production-ready MVP with staging and production environments, documentation and handover.',
    ],
    [
        'key'          => 'mvp-scale-retainer',
        'label'        => 'MVP + Scale Retainer',
        'badge'        => '3–9 months',
        'duration'     => '3–9 months',
        'description'  => 'A stable product squad that continues after the MVP launch to optimise performance, ship new features and support your growth milestones.',
        'best_for'     => 'Startups approaching product–market fit that need predictable capacity each month.',
        'budget_range' => 'Monthly retainer starting around one senior + one mid-level engineer equivalent.',
        'deliverables' => 'Continuous delivery, roadmap execution, technical optimisation and support SLAs.',
    ],
    [
        'key'          => 'dedicated-pod',
        'label'        => 'Dedicated MVP developer / pod',
        'badge'        => 'Flexible',
        'duration'     => 'Flexible',
        'description'  => 'Embedded engineers or a small pod that works directly with your CTO or product owner using your tools, processes and ceremonies.',
        'best_for'     => 'Teams that already have a roadmap and want execution support from experienced MVP developers.',
        'budget_range' => 'Monthly rate per developer / pod, adjusted by seniority and commitment.',
        'deliverables' => 'Capacity aligned to your sprint plan with shared KPIs and ongoing knowledge transfer.',
    ],
];

$models = $engagements['models'] ?? $defaultModels;
if (!is_array($models) || count($models) === 0) {
    $models = $defaultModels;
}

$note = $engagements['note']
    ?? 'We share a clear proposal before any engagement starts — including scope, assumptions, timelines and team composition — so you always understand how your startup MVP development budget will be used.';
?>

<section
    id="<?= htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?>"
    data-mvp-section="s5"
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
            <?php foreach ($models as $model): ?>
                <?php
                $label        = $model['label']        ?? 'Engagement model';
                $badge        = $model['badge']        ?? null;
                $description  = $model['description']  ?? '';
                $best_for     = $model['best_for']     ?? '';
                $budget_range = $model['budget_range'] ?? '';
                $deliverables = $model['deliverables'] ?? '';
                ?>
                <article
                    class="flex h-full flex-col rounded-2xl bg-slate-50 p-5 text-sm shadow-sm ring-1 ring-slate-100"
                    data-mvp-engagement-card
                >
                    <div class="flex items-center justify-between gap-3">
                        <h3 class="text-base font-semibold text-slate-900">
                            <?= htmlspecialchars($label, ENT_QUOTES, 'UTF-8'); ?>
                        </h3>
                        <?php if ($badge): ?>
                            <span class="inline-flex items-center rounded-full bg-accent-600/20 px-3 py-1 text-[11px] font-bold text-accent-600">
                                <?= htmlspecialchars($badge, ENT_QUOTES, 'UTF-8'); ?>
                            </span>
                        <?php endif; ?>
                    </div>

                    <?php if ($description !== ''): ?>
                        <p class="mt-2 text-slate-600">
                            <?= htmlspecialchars($description, ENT_QUOTES, 'UTF-8'); ?>
                        </p>
                    <?php endif; ?>

                    <dl class="mt-4 space-y-1 text-xs text-slate-500">
                        <?php if ($best_for !== ''): ?>
                            <div class="flex justify-between gap-4">
                                <dt class="font-medium text-slate-600 flex-shrink-0">Best for</dt>
                                <dd class="text-right">
                                    <?= htmlspecialchars($best_for, ENT_QUOTES, 'UTF-8'); ?>
                                </dd>
                            </div>
                        <?php endif; ?>

                        <?php if ($budget_range !== ''): ?>
                            <div class="flex justify-between gap-4">
                                <dt class="font-medium text-slate-600 flex-shrink-0">Typical budget</dt>
                                <dd class="text-right">
                                    <?= htmlspecialchars($budget_range, ENT_QUOTES, 'UTF-8'); ?>
                                </dd>
                            </div>
                        <?php endif; ?>
                    </dl>

                    <?php if ($deliverables !== ''): ?>
                        <p class="mt-4 text-xs text-slate-500">
                            Deliverables: <?= htmlspecialchars($deliverables, ENT_QUOTES, 'UTF-8'); ?>
                        </p>
                    <?php endif; ?>
                </article>
            <?php endforeach; ?>
        </div>

        <p class="mt-8 max-w-3xl text-sm text-slate-500">
            <?= htmlspecialchars($note, ENT_QUOTES, 'UTF-8'); ?>
        </p>
    </div>
</section>