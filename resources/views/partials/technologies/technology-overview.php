<?php
/**
 * Generic Technology Overview (Section S2)
 *
 * Expects:
 * - $technology (array) from config('technologies')
 *
 * Shape (recommended) in config/technologies.php:
 *
 * 'overview' => [
 *     'id'        => 'saas-overview',             // optional, html id
 *     'eyebrow'   => 'Overview',                  // small label above h2
 *     'title'     => 'Build, launch and scale your SaaS product',
 *     'intro'     => '1–2 sentences describing what this technology covers.',
 *
 *     'left_title'  => 'Where this technology fits best',
 *     'left_items'  => [
 *         'You are planning or rebuilding a SaaS product.',
 *         'You need multi-tenant architecture with clear roles and permissions.',
 *         ...
 *     ],
 *
 *     'right_title' => 'Typical outcomes we aim for',
 *     'right_items' => [
 *         'Reliable releases without breaking existing customers.',
 *         'Clear subscription, billing and invoicing flows.',
 *         ...
 *     ],
 *
 *     'note' => 'We adapt the approach based on your stage – MVP, rebuild or long-term platform.'
 * ]
 */

$technology = $technology ?? [];

$serviceName = $technology['name'] ?? 'Technology';

// Safely read overview config
$overview    = $technology['overview'] ?? [];
$sectionId   = $overview['id']        ?? 'technology-overview';

// Eyebrow + heading
$eyebrow     = $overview['eyebrow']   ?? 'Overview';
$title       = $overview['title']
    ?? ($serviceName . ' – where it fits and what we deliver');
$intro       = $overview['intro']
    ?? 'Here is how this technology fits into your product roadmap, and the kind of outcomes we typically focus on.';

// Columns
$leftTitle   = $overview['left_title']  ?? 'Where this technology fits best';
$leftItems   = $overview['left_items']  ?? [];
$rightTitle  = $overview['right_title'] ?? 'Typical outcomes we aim for';
$rightItems  = $overview['right_items'] ?? [];

// Note / bottom text
$note        = $overview['note']
    ?? 'We adjust the approach based on your product stage, team capacity and budgets.';

// Simple defaults if lists are empty – to avoid empty markup
if (empty($leftItems)) {
    $leftItems = [
        'You want to ship a first version (MVP) with a clear scope.',
        'You have an existing product that needs refactoring or new modules.',
        'You need a partner who can work end-to-end rather than just coding to tickets.',
    ];
}

if (empty($rightItems)) {
    $rightItems = [
        'Clear scope and priorities aligned with business outcomes.',
        'Predictable delivery with frequent, frictionless releases.',
        'Codebase and architecture that are easier to extend over time.',
    ];
}
?>

<section
    id="<?= htmlspecialchars($sectionId, ENT_QUOTES); ?>"
    class="border-t border-slate-100 bg-white py-14 sm:py-18 lg:py-20"
    aria-labelledby="technology-overview-heading"
    data-section-technology-overview
>
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <!-- Heading & intro -->
        <header class="mb-10 max-w-3xl space-y-3">
            <?php if (!empty($eyebrow)): ?>
                <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">
                    <?= htmlspecialchars($eyebrow, ENT_QUOTES); ?>
                </p>
            <?php endif; ?>

            <h2
                id="technology-overview-heading"
                class="text-display-md sm:text-display-lg md:text-display-xl font-bold text-slate-900"
            >
                <?= htmlspecialchars($title, ENT_QUOTES); ?>
            </h2>

            <p class="text-sm sm:text-base text-slate-600">
                <?= htmlspecialchars($intro, ENT_QUOTES); ?>
            </p>
        </header>

        <!-- Two-column lists -->
        <div
            class="grid gap-8 md:grid-cols-2"
            data-technology-overview-columns
        >
            <!-- Left column -->
            <article class="space-y-3" data-technology-overview-left>
                <?php if (!empty($leftTitle)): ?>
                    <h3 class="text-sm sm:text-base font-semibold text-slate-900">
                        <?= htmlspecialchars($leftTitle, ENT_QUOTES); ?>
                    </h3>
                <?php endif; ?>

                <ul class="space-y-2 text-xs sm:text-sm text-slate-700">
                    <?php foreach ($leftItems as $item): ?>
                        <?php if (!is_string($item) || trim($item) === '') continue; ?>
                        <li class="flex gap-2">
                            <span class="mt-1 h-1.5 w-1.5 flex-none rounded-full bg-sky-500"></span>
                            <span><?= htmlspecialchars($item, ENT_QUOTES); ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </article>

            <!-- Right column -->
            <article class="space-y-3" data-technology-overview-right>
                <?php if (!empty($rightTitle)): ?>
                    <h3 class="text-sm sm:text-base font-semibold text-slate-900">
                        <?= htmlspecialchars($rightTitle, ENT_QUOTES); ?>
                    </h3>
                <?php endif; ?>

                <ul class="space-y-2 text-xs sm:text-sm text-slate-700">
                    <?php foreach ($rightItems as $item): ?>
                        <?php if (!is_string($item) || trim($item) === '') continue; ?>
                        <li class="flex gap-2">
                            <span class="mt-1 h-1.5 w-1.5 flex-none rounded-full bg-emerald-500"></span>
                            <span><?= htmlspecialchars($item, ENT_QUOTES); ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </article>
        </div>

        <?php if (!empty($note)): ?>
            <p class="mt-8 text-[11px] text-slate-500 max-w-3xl">
                <?= htmlspecialchars($note, ENT_QUOTES); ?>
            </p>
        <?php endif; ?>
    </div>
</section>
