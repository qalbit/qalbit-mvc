<?php
// ===============================
// S6 – MVP case studies & outcomes
// ===============================

$proof = $process['proof'] ?? [];

$id      = $proof['id']      ?? 'mvp-proof';
$eyebrow = $proof['eyebrow'] ?? 'Case studies';
$title   = $proof['title']   ?? 'MVP case studies & outcomes';
$intro   = $proof['intro']
    ?? 'We have helped founders across different industries go from idea to working MVP — and beyond. Here are a few examples of products our team has designed, built and shipped.';

$defaultCases = [
    [
        'label'       => 'URLCrop – Link management & analytics',
        'badge'       => 'SaaS MVP',
        'description' => 'From concept to multi-tenant SaaS platform for short links, QR codes and campaign analytics, running on a modern Laravel + React stack.',
        'stack'       => 'Laravel, React, Tailwind, PostgreSQL, Redis.',
        'outcome'     => 'Deployed to production with subscription billing and team workspaces.',
        'impact'      => 'Enabled founders to validate pricing and usage patterns across multiple regions.',
        'link_label'  => 'Read the URLCrop story',
        'link_href'   => '/case-studies/urlcrop/',
    ],
];

$cases = $proof['cases'] ?? $defaultCases;
if (!is_array($cases) || count($cases) === 0) {
    $cases = $defaultCases;
}

$summaryNote = $proof['summary_note']
    ?? 'Beyond these flagship products, QalbIT has collaborated with founders on fintech, HR, field operations, education and logistics MVPs. Many of these are built under NDA and cannot be named publicly, but follow the same structured approach and clean engineering practices.';
?>

<section
    id="<?= htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?>"
    data-mvp-section="s6"
    class="bg-slate-50"
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

        <div
            class="mt-8 grid gap-6 md:grid-cols-2 lg:mt-10 lg:grid-cols-3"
            data-mvp-logo-grid
        >
            <?php foreach ($cases as $case): ?>
                <?php
                $label       = $case['label']       ?? 'Startup MVP case study';
                $badge       = $case['badge']       ?? null;
                $description = $case['description'] ?? '';
                $stack       = $case['stack']       ?? '';
                $outcome     = $case['outcome']     ?? '';
                $impact      = $case['impact']      ?? '';
                $linkLabel   = $case['link_label']  ?? null;
                $linkHref    = $case['link_href']   ?? null;
                ?>
                <article
                    class="flex h-full flex-col rounded-2xl bg-white p-5 text-sm text-slate-600 shadow-sm ring-1 ring-slate-100"
                    data-mvp-proof-card
                >
                    <div class="flex items-center justify-between gap-3">
                        <h3 class="text-md font-semibold text-slate-900">
                            <?= htmlspecialchars($label, ENT_QUOTES, 'UTF-8'); ?>
                        </h3>
                        <?php if ($badge): ?>
                            <span class="inline-flex flex-shrink-0 rounded-full bg-sky-200 px-3 py-1 text-[11px] font-medium text-sky-700">
                                <?= htmlspecialchars($badge, ENT_QUOTES, 'UTF-8'); ?>
                            </span>
                        <?php endif; ?>
                    </div>

                    <?php if ($description !== ''): ?>
                        <p class="mt-2 text-sm">
                            <?= htmlspecialchars($description, ENT_QUOTES, 'UTF-8'); ?>
                        </p>
                    <?php endif; ?>

                    <ul class="mt-3 space-y-1 text-xs text-slate-600">
                        <?php if ($stack !== ''): ?>
                            <li>Stack: <?= htmlspecialchars($stack, ENT_QUOTES, 'UTF-8'); ?></li>
                        <?php endif; ?>
                        <?php if ($outcome !== ''): ?>
                            <li>Outcome: <?= htmlspecialchars($outcome, ENT_QUOTES, 'UTF-8'); ?></li>
                        <?php endif; ?>
                        <?php if ($impact !== ''): ?>
                            <li>Impact: <?= htmlspecialchars($impact, ENT_QUOTES, 'UTF-8'); ?></li>
                        <?php endif; ?>
                    </ul>

                    <?php if ($linkLabel && $linkHref): ?>
                        <a
                            href="<?= htmlspecialchars($linkHref, ENT_QUOTES, 'UTF-8'); ?>"
                            class="mt-4 inline-flex text-sm font-medium text-sky-500 hover:underline"
                        >
                            <?= htmlspecialchars($linkLabel, ENT_QUOTES, 'UTF-8'); ?>
                        </a>
                    <?php endif; ?>
                </article>
            <?php endforeach; ?>

            <?php if ($summaryNote): ?>
                <article
                    class="flex h-full flex-col rounded-2xl bg-white p-5 text-sm text-slate-600 shadow-sm ring-1 ring-slate-100 md:col-span-2 lg:col-span-3"
                    data-mvp-proof-card="summary"
                >
                    <h3 class="text-base font-semibold text-slate-900">
                        Other startup MVPs we have partnered on
                    </h3>
                    <p class="mt-2">
                        <?= htmlspecialchars($summaryNote, ENT_QUOTES, 'UTF-8'); ?>
                    </p>
                </article>
            <?php endif; ?>
        </div>
    </div>
</section>