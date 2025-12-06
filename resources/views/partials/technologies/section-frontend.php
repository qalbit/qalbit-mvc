<?php
/**
 * Technologies – Frontend section (T3)
 *
 * Expects:
 * - $items (array) list of frontend technologies, e.g. $groupedTech['frontend']
 */

$items = $frontendItems ?? [];
?>

<section
    id="tech-frontend"
    class="border-t border-slate-100 bg-white py-16 sm:py-20 lg:py-24"
    data-tech-frontend-section
    itemscope
    itemtype="https://schema.org/ItemList"
>
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <div
            class="mb-10 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between"
            data-tech-frontend-header
        >
            <div class="space-y-3 max-w-xl">
                <h2 class="text-display-md sm:text-display-lg md:text-display-xl font-bold text-center md:text-left text-slate-900">
                    Frontend technologies for modern web apps
                </h2>
                <p class="text-sm sm:text-base text-slate-600">
                    We use React.js and a modern frontend toolchain to build fast, accessible interfaces
                    for SaaS dashboards, internal tools and marketing sites. Component-driven UI makes
                    it easier to iterate without breaking core flows.
                </p>
            </div>
            <p class="max-w-sm text-xs text-slate-500">
                Frontend work is typically paired with our backend and API development services,
                so UX, performance and data models stay aligned – from design system tokens to
                the API responses your UI consumes.
            </p>
        </div>

        <?php if (!empty($items)): ?>
            <div
                class="grid gap-6 sm:gap-7 md:grid-cols-2 lg:grid-cols-3"
                data-tech-frontend-cards
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
                        $iconAlt    = $shortName ?: 'Frontend technology icon';
                        $useCases   = isset($tech['use_cases']) && is_array($tech['use_cases'])
                            ? array_slice($tech['use_cases'], 0, 3)
                            : [];
                ?>
                    <article
                        class="group relative flex flex-col rounded-2xl border border-slate-200 bg-white p-5 sm:p-6 lg:p-7 shadow-sm hover:border-sky-400/70 hover:shadow-md hover:shadow-sky-100 transition-colors"
                        data-tech-frontend-card
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
                                    <span class="mr-1.5 h-1.5 w-1.5 rounded-full bg-sky-400"></span>
                                    Frontend &amp; UI
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
                                        <span class="mt-1 h-1.5 w-1.5 flex-none rounded-full bg-sky-400"></span>
                                        <span><?= htmlspecialchars($useCase, ENT_QUOTES); ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                        <div class="mt-auto flex items-center justify-between gap-3 pt-3 border-t border-slate-200">
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
                    </article>
                <?php
                    $position++;
                    endforeach;
                ?>
            </div>
        <?php else: ?>
            <p class="text-sm text-slate-600">
                Our frontend technology list is currently being updated. Please check back soon or
                <a href="/contact-us/" class="text-sky-700 underline">contact us</a>
                with your project details.
            </p>
        <?php endif; ?>
    </div>
</section>
