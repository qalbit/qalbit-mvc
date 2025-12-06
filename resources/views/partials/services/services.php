<section
    class="border-t border-slate-50 bg-slate-950 py-16 sm:py-20 lg:py-24"
    data-animate="services-grid"
    itemscope
    itemtype="https://schema.org/ItemList"
>
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <div class="mb-10 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div class="space-y-3 max-w-xl">
                <h2 class="text-display-md sm:text-display-lg md:text-display-xl font-bold text-center md:text-left text-slate-50">
                    Software development services at a glance
                </h2>
                <p class="text-sm sm:text-base text-slate-300">
                    From MVPs to long-term platforms, combine our core and specialised services to
                    design, build and grow products that match how your business really works.
                </p>
            </div>
            <p class="max-w-sm text-xs text-slate-400">
                Each service can be engaged standalone or bundled into a roadmap – with one team
                responsible end-to-end across web, mobile, cloud and integrations.
            </p>
        </div>

        <?php if (!empty($services)): ?>
            <div
                class="grid gap-6 sm:gap-7 md:grid-cols-2 lg:grid-cols-3"
                data-service-cards
            >
                <?php
                    $position = 1;
                    foreach ($services as $service):
                        $slug        = $service['slug'] ?? '#';
                        $name        = $service['name'] ?? '';
                        $shortDesc   = $service['short_description'] ?? '';
                        $category    = $service['category'] ?? null;
                        $icon        = $service['icon'] ?? null;
                        $iconAlt     = $service['iconAlt'] ?? ($name ?: 'Service icon');
                        $categoryMap = [
                            'core'    => 'Core service',
                            'support' => 'Support service',
                            'ai'      => 'AI & automation',
                        ];
                        $categoryLabel = $categoryMap[$category] ?? $category;
                ?>
                    <article
                        class="group relative flex flex-col rounded-2xl border border-slate-800/80 bg-slate-900/70 p-5 sm:p-6 lg:p-7 shadow-sm shadow-black/20 hover:border-sky-500/60 hover:bg-slate-900/90 transition-colors"
                        data-service-card
                        itemscope
                        itemprop="itemListElement"
                        itemtype="https://schema.org/Service"
                    >
                        <meta itemprop="position" content="<?= (int) $position; ?>">
                        <meta itemprop="url" content="<?= htmlspecialchars($slug, ENT_QUOTES); ?>">

                        <div class="mb-4 flex items-start justify-between gap-3">
                            <div class="space-y-1.5">
                                <h2
                                    class="text-base sm:text-lg font-semibold text-slate-50 group-hover:text-sky-300"
                                    itemprop="name"
                                >
                                    <a
                                        href="<?= htmlspecialchars($slug, ENT_QUOTES); ?>"
                                        class="hover:underline decoration-sky-400/60"
                                    >
                                        <?= htmlspecialchars($name, ENT_QUOTES); ?>
                                    </a>
                                </h2>
                                <?php if (!empty($shortDesc)): ?>
                                    <p
                                        class="text-xs sm:text-sm text-slate-300"
                                        itemprop="description"
                                    >
                                        <?= htmlspecialchars($shortDesc, ENT_QUOTES); ?>
                                    </p>
                                <?php endif; ?>

                                <?php if (!empty($categoryLabel)): ?>
                                    <p class="mt-1 inline-flex items-center rounded-full bg-slate-800/80 px-2.5 py-0.5 text-[11px] font-medium uppercase tracking-[0.18em] text-slate-300">
                                        <span class="mr-1.5 h-1.5 w-1.5 rounded-full bg-sky-400"></span>
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

                        <?php if (!empty($service['bullets']) && is_array($service['bullets'])): ?>
                            <ul class="mb-4 flex-1 space-y-1.5 text-xs sm:text-sm text-slate-200">
                                <?php foreach ($service['bullets'] as $bullet): ?>
                                    <li class="flex gap-2">
                                        <span class="mt-1 h-1.5 w-1.5 flex-none rounded-full bg-sky-400"></span>
                                        <span><?= htmlspecialchars($bullet, ENT_QUOTES); ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                        <div class="mt-auto flex items-center justify-between gap-3 pt-3 border-t border-slate-800/80">
                            <a
                                href="<?= htmlspecialchars($slug, ENT_QUOTES); ?>"
                                class="inline-flex items-center text-xs font-semibold text-sky-300 hover:text-sky-200"
                            >
                                View service details
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
            <p class="text-sm text-slate-300">
                Our services are currently being updated. Please check back soon or
                <a href="/contact-us/" class="text-sky-300 underline">contact us</a>
                with your project details.
            </p>
        <?php endif; ?>
    </div>
</section>