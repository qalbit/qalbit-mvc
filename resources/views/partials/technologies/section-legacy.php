<?php
/**
 * Technologies – Legacy, Integration & Supporting Technologies (T7)
 *
 * Expects:
 * - $items (array) list of "other" technologies, e.g. $groupedTech['other']
 */

$items = $otherItems ?? [];
?>

<section
    id="tech-legacy"
    class="border-t border-slate-100 bg-white py-16 sm:py-20 lg:py-24"
    data-tech-legacy-section
    itemscope
    itemtype="https://schema.org/ItemList"
>
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <div
            class="mb-10 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between"
            data-tech-legacy-header
        >
            <div class="space-y-3 max-w-xl">
                <h2 class="text-display-md sm:text-display-lg md:text-display-xl font-bold text-center md:text-left text-slate-900">
                    Legacy, integration &amp; supporting technologies
                </h2>
                <p class="text-sm sm:text-base text-slate-600">
                    Beyond core frontend and backend frameworks, we also work with the underlying
                    pieces that keep your product stable – databases, cloud platforms, typed
                    JavaScript and older stacks that still run critical workflows.
                </p>
            </div>
            <p class="max-w-sm text-xs text-slate-500">
                We can stabilise existing applications (for example legacy PHP or CodeIgniter),
                plan gradual migrations to Laravel or modern Node/Nest.js, and at the same time
                look after your PostgreSQL/MySQL databases, AWS infrastructure and integrations.
            </p>
        </div>

        <?php if (!empty($items)): ?>
            <div
                class="grid gap-6 sm:gap-7 md:grid-cols-2 lg:grid-cols-3"
                data-tech-legacy-cards
            >
                <?php
                    $position = 1;
                    foreach ($items as $key => $tech):
                        $slug       = $tech['slug'] ?? '#';
                        $name       = $tech['name'] ?? '';
                        $shortName  = $tech['short_name'] ?? $name;
                        $summary    = $tech['summary'] ?? '';
                        $tagline    = $tech['tagline'] ?? '';
                        $icon       = $tech['icon'] ?? null;
                        $iconAlt    = $shortName ?: 'Supporting technology icon';
                        $useCases   = isset($tech['use_cases']) && is_array($tech['use_cases'])
                            ? array_slice($tech['use_cases'], 0, 3)
                            : [];
                ?>
                    <article
                        class="group relative flex flex-col rounded-2xl border border-slate-200 bg-white p-5 sm:p-6 lg:p-7 shadow-sm hover:border-sky-500/70 hover:shadow-md hover:shadow-sky-100 transition-colors"
                        data-tech-legacy-card
                        itemscope
                        itemprop="itemListElement"
                        itemtype="https://schema.org/Thing"
                    >
                        <meta itemprop="position" content="<?= (int) $position; ?>">
                        <meta itemprop="url" content="<?= htmlspecialchars($slug, ENT_QUOTES); ?>">

                        <div class="mb-4 flex items-start justify-between gap-3">
                            <div class="space-y-1.5">
                                <h3
                                    class="text-base sm:text-lg font-semibold text-slate-900 group-hover:text-sky-700"
                                    itemprop="name"
                                >
                                    <a
                                        href="<?= htmlspecialchars($slug, ENT_QUOTES); ?>"
                                        class="hover:underline decoration-sky-400/60"
                                    >
                                        <?= htmlspecialchars($name, ENT_QUOTES); ?>
                                    </a>
                                </h3>

                                <?php if (!empty($tagline)): ?>
                                    <p class="text-xs sm:text-sm text-slate-600">
                                        <?= htmlspecialchars($tagline, ENT_QUOTES); ?>
                                    </p>
                                <?php elseif (!empty($summary)): ?>
                                    <p
                                        class="text-xs sm:text-sm text-slate-600"
                                        itemprop="description"
                                    >
                                        <?= htmlspecialchars($summary, ENT_QUOTES); ?>
                                    </p>
                                <?php endif; ?>

                                <p class="mt-1 inline-flex items-center rounded-full bg-slate-100 px-2.5 py-0.5 text-[11px] font-medium uppercase tracking-[0.18em] text-slate-600">
                                    <span class="mr-1.5 h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                    Legacy &amp; supporting stack
                                </p>
                            </div>

                            <?php if (!empty($icon)): ?>
                                <div class="flex-none">
                                    <img
                                        src="<?= asset($icon); ?>"
                                        alt="<?= htmlspecialchars($iconAlt, ENT_QUOTES); ?>"
                                        loading="lazy"
                                        width="40"
                                        height="40"
                                        class="h-10 w-10 sm:h-11 sm:w-11 object-contain"
                                    >
                                </div>
                            <?php endif; ?>
                        </div>

                        <?php if (!empty($useCases)): ?>
                            <ul class="mb-4 flex-1 space-y-1.5 text-xs sm:text-sm text-slate-700">
                                <?php foreach ($useCases as $useCase): ?>
                                    <li class="flex gap-2">
                                        <span class="mt-1 h-1.5 w-1.5 flex-none rounded-full bg-emerald-500"></span>
                                        <span><?= htmlspecialchars($useCase, ENT_QUOTES); ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                        <div class="mt-auto space-y-2 pt-3 border-t border-slate-200">
                            <div class="flex items-center justify-between gap-3">
                                <a
                                    href="<?= htmlspecialchars($slug, ENT_QUOTES); ?>"
                                    class="inline-flex items-center text-xs font-semibold text-sky-700 hover:text-sky-600"
                                >
                                    View <?= htmlspecialchars($shortName, ENT_QUOTES); ?> details
                                    <span class="ml-1 inline-block translate-y-px">→</span>
                                </a>
                                <span class="text-[10px] uppercase tracking-[0.18em] text-slate-400">
                                    <?= sprintf('%02d', $position); ?>
                                </span>
                            </div>
                            <p class="text-[11px] text-slate-500">
                                Typical scenarios: keeping critical legacy apps stable, planning
                                migrations, tuning databases, and aligning AWS/cloud setups with how
                                your product actually runs.
                            </p>
                        </div>
                    </article>
                <?php
                    $position++;
                    endforeach;
                ?>
            </div>
        <?php else: ?>
            <p class="text-sm text-slate-600">
                Our supporting technologies list is currently being updated. Please check back soon or
                <a href="/contact-us/" class="text-sky-700 underline">contact us</a>
                with your legacy or migration requirements.
            </p>
        <?php endif; ?>
    </div>
</section>
