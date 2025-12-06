<?php
/**
 * Portfolio Filters – Compact
 *
 * Expects:
 * - $sections         (array) from config('portfolio.page.sections')
 * - $allIndustries    (array) from config('portfolio.industries')
 * - $allTechnologies  (array) from config('portfolio.technologies')
 * - $activeIndustry   (string|null)
 * - $activeTechnology (string|null)
 */

$sections         = $sections         ?? [];
$allIndustries    = $allIndustries    ?? [];
$allTechnologies  = $allTechnologies  ?? [];
$activeIndustry   = $activeIndustry   ?? null;
$activeTechnology = $activeTechnology ?? null;

$config    = $sections['filters'] ?? [];
$sectionId = $config['id']        ?? 'portfolio-filters';

$label      = $config['label']       ?? 'Filter by';
$industryLabel = $config['industry_label'] ?? 'Industry';
$techLabel      = $config['tech_label']      ?? 'Tech stack';
$allLabel       = $config['all_label']       ?? 'All';
$submitLabel    = $config['submit_label']    ?? 'Apply';
$resetLabel     = $config['reset_label']     ?? 'Clear filters';
$hint           = $config['hint']           ?? 'Combine industry and tech stack, or use either one on its own.';

// Build reset URL (no industry/tech)
$queryParams = $_GET ?? [];
unset($queryParams['industry'], $queryParams['tech']);
$baseAction = '/portfolio/';
$resetUrl   = $baseAction . ($queryParams ? ('?' . http_build_query($queryParams)) : '');
?>

<section
    id="<?= htmlspecialchars($sectionId, ENT_QUOTES); ?>"
    class="bg-slate-100 text-slate-900 py-3 sm:py-3.5"
    data-portfolio-section="filters"
>
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <form
            method="get"
            action="<?= htmlspecialchars($baseAction, ENT_QUOTES); ?>"
            class="flex flex-col gap-2.5 sm:flex-row sm:items-center sm:justify-between text-[11px] sm:text-xs"
            data-portfolio-el="filters-form"
        >
            <!-- Left: label + hint -->
            <div class="space-y-0.5 max-w-xl">
                <div class="flex items-center gap-2">
                    <span class="font-semibold text-slate-800">
                        <?= htmlspecialchars($label, ENT_QUOTES); ?>
                    </span>
                    <?php if ($activeIndustry || $activeTechnology): ?>
                        <span class="inline-flex items-center rounded-full bg-slate-100 px-2 py-0.5 text-[10px] text-slate-600">
                            Active
                            <?php if ($activeIndustry): ?>
                                · Industry
                            <?php endif; ?>
                            <?php if ($activeTechnology): ?>
                                · Tech
                            <?php endif; ?>
                        </span>
                    <?php endif; ?>
                </div>
                <p class="hidden sm:block text-[10px] text-slate-500">
                    <?= htmlspecialchars($hint, ENT_QUOTES); ?>
                </p>
            </div>

            <!-- Right: controls -->
            <div class="flex flex-wrap items-center gap-2.5 sm:justify-end">
                <!-- Industry select -->
                <label class="inline-flex items-center gap-1 text-[10px] text-slate-600">
                    <span><?= htmlspecialchars($industryLabel, ENT_QUOTES); ?></span>
                    <select
                        name="industry"
                        class="min-w-[140px] rounded-full border border-slate-200 bg-white px-2.5 py-1 text-[11px] text-slate-800
                               focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"
                    >
                        <option value=""><?= htmlspecialchars($allLabel, ENT_QUOTES); ?></option>
                        <?php foreach ($allIndustries as $key => $labelValue): ?>
                            <option
                                value="<?= htmlspecialchars($key, ENT_QUOTES); ?>"
                                <?= $activeIndustry === $key ? 'selected' : ''; ?>
                            >
                                <?= htmlspecialchars($labelValue, ENT_QUOTES); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </label>

                <!-- Tech select -->
                <label class="inline-flex items-center gap-1 text-[10px] text-slate-600">
                    <span><?= htmlspecialchars($techLabel, ENT_QUOTES); ?></span>
                    <select
                        name="tech"
                        class="min-w-[140px] rounded-full border border-slate-200 bg-white px-2.5 py-1 text-[11px] text-slate-800
                               focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"
                    >
                        <option value=""><?= htmlspecialchars($allLabel, ENT_QUOTES); ?></option>
                        <?php foreach ($allTechnologies as $key => $labelValue): ?>
                            <option
                                value="<?= htmlspecialchars($key, ENT_QUOTES); ?>"
                                <?= $activeTechnology === $key ? 'selected' : ''; ?>
                            >
                                <?= htmlspecialchars($labelValue, ENT_QUOTES); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </label>

                <!-- Actions -->
                <div class="flex items-center gap-1.5">
                    <button
                        type="submit"
                        class="inline-flex items-center rounded-full bg-slate-900 px-3 py-1.5 text-[11px] font-medium text-slate-50
                               hover:bg-slate-800 focus:outline-none focus:ring-1 focus:ring-slate-900"
                    >
                        <?= htmlspecialchars($submitLabel, ENT_QUOTES); ?>
                    </button>

                    <?php if ($activeIndustry || $activeTechnology): ?>
                        <a
                            href="<?= htmlspecialchars($resetUrl, ENT_QUOTES); ?>"
                            class="inline-flex items-center rounded-full border border-slate-300 bg-white px-2.5 py-1.5 text-[11px] font-medium text-slate-600
                                   hover:bg-slate-100"
                        >
                            <?= htmlspecialchars($resetLabel, ENT_QUOTES); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </form>
    </div>
</section>
