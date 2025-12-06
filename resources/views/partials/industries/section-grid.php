<section
    id="industry-categories"
    class="border-t border-slate-200 bg-slate-50 py-16 sm:py-20 lg:py-24"
    data-animate="industries-grid"
    itemscope
    itemtype="https://schema.org/ItemList"
>
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <div class="mb-10 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div class="space-y-3 max-w-2xl">
                <h2 class="text-display-md sm:text-display-lg md:text-display-xl font-bold text-slate-900">
                    Explore industries we build software for
                </h2>
                <p class="text-sm sm:text-base text-slate-700">
                    Each industry page goes deeper into typical challenges, solution patterns and QalbIT’s
                    approach to web, mobile and SaaS products in that space – from entertainment and social
                    platforms to food delivery, fintech, real estate, healthcare and education.
                </p>
            </div>
            <p class="max-w-sm text-xs sm:text-[13px] text-slate-600">
                Start with the industry that is closest to your current business model. If your idea spans
                multiple verticals – for example, a SaaS product for home services or a marketplace for
                travel experiences – we can blend patterns from several industries into one roadmap.
            </p>
        </div>

        <?php if (!empty($industries)): ?>
            <div
                class="grid gap-6 sm:gap-7 md:grid-cols-2 lg:grid-cols-3"
                data-industry-cards
            >
                <?php
                    $position = 1;

                    foreach ($industries as $key => $industry):
                        $slug      = $industry['slug'] ?? '#';
                        $name      = $industry['name'] ?? ucfirst((string) $key);
                        $tagline   = $industry['tagline'] ?? '';
                        $summary   = $industry['summary'] ?? '';
                        $category  = $industry['category'] ?? null;
                        $icon      = $industry['icon_dark'] ?? null;
                        $iconAlt   = $industry['iconAlt'] ?? ($name ?: 'Industry icon');

                        // NEW: get label directly from config
                        $categoryLabel = $industry['category_label']
                            ?? ($category ? ucfirst(str_replace('-', ' ', $category)) : '');
                ?>
                    <article
                        class="group relative flex flex-col rounded-2xl border border-slate-200 bg-white/90 p-5 sm:p-6 lg:p-7 shadow-sm shadow-slate-200/80 hover:border-sky-500/70 hover:bg-white transition-colors"
                        data-industry-card
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
                                        class="hover:underline decoration-sky-400/70"
                                    >
                                        <?= htmlspecialchars($name, ENT_QUOTES); ?>
                                    </a>
                                </h3>

                                <?php if (!empty($tagline)): ?>
                                    <p class="text-xs sm:text-sm font-medium text-slate-700">
                                        <?= htmlspecialchars($tagline, ENT_QUOTES); ?>
                                    </p>
                                <?php endif; ?>

                                <?php if (!empty($categoryLabel)): ?>
                                    <p class="mt-1 inline-flex items-center rounded-full bg-slate-100 px-2.5 py-0.5 text-[11px] font-medium uppercase tracking-[0.18em] text-slate-700">
                                        <span class="mr-1.5 h-1.5 w-1.5 rounded-full bg-sky-500"></span>
                                        <?= htmlspecialchars($categoryLabel, ENT_QUOTES); ?>
                                    </p>
                                <?php endif; ?>
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

                        <?php if (!empty($summary)): ?>
                            <p
                                class="mb-3 text-xs sm:text-sm text-slate-700 leading-relaxed"
                                itemprop="description"
                            >
                                <?= htmlspecialchars($summary, ENT_QUOTES); ?>
                            </p>
                        <?php endif; ?>

                        <?php if (!empty($industry['bullets']) && is_array($industry['bullets'])): ?>
                            <ul class="mb-4 flex-1 space-y-1.5 text-[11px] sm:text-xs text-slate-600">
                                <?php foreach ($industry['bullets'] as $bullet): ?>
                                    <li class="flex gap-2">
                                        <span class="mt-1 h-1.5 w-1.5 flex-none rounded-full bg-sky-500"></span>
                                        <span><?= htmlspecialchars($bullet, ENT_QUOTES); ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                        <div class="mt-auto flex items-center justify-between gap-3 pt-3 border-t border-slate-200">
                            <a
                                href="<?= htmlspecialchars($slug, ENT_QUOTES); ?>"
                                class="inline-flex items-center text-xs font-semibold text-sky-700 hover:text-sky-600"
                            >
                                View industry solution details
                                <span class="ml-1 inline-block translate-y-px">→</span>
                            </a>
                            <span class="text-[10px] uppercase tracking-[0.18em] text-slate-500">
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
                Our industry pages are currently being updated. Please check back soon or
                <a href="/contact-us/?topic=industries-enquiry" class="text-sky-700 underline">
                    contact us
                </a>
                with your industry, use case and project details.
            </p>
        <?php endif; ?>
    </div>
</section>
