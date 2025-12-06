<?php
/**
 * @var array       $services
 * @var string|null $title
 * @var string|null $subtitle 
 */

$title      = $title ?? 'Custom <span class="text-gradient-brand">Software Development</span> services that power real-world growth.';
$subtitle   = $subtitle ?? 'Partner with our dedicated team of software professionals, mastering 100+ technologies to build scalable solutions that grow with your business.';
?>

<?php if (!empty($services)): ?>
<section
    id="home-services"
    class="py-18 bg-slate-50"
    aria-labelledby="home-services-heading"
    data-services-section
>
    <div class="max-w-6xl mx-auto px-4">
        <!-- Section heading -->
        <header class="max-w-3xl space-y-3">
            <span class="inline-flex items-center rounded-pill border border-slate-200 bg-white/90 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-muted-foreground shadow-soft">
                What makes us <span class="font-semibold pl-1">unique</span>
            </span>

            <h2
                id="home-services-heading"
                class="text-display-sm sm:text-display-md md:text-display-lg font-bold"
            >
                <?= $title ?>
            </h2>

            <p class="text-md font-medium text-slate-600">
                <?= htmlspecialchars($subtitle) ?>
            </p>
        </header>

        <!-- Services grid -->
        <div class="mt-8 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            <?php foreach ($services as $service):  ?>
                <?php
                $icon = $service['icon'] ?? '';
                $iconAlt = $service['iconAlt'] ?? '';
                $title = $service['name'] ?? '';
                $description = $service['short_description'] ?? '';
                $slug = $service['slug'] ?? '';
                ?>
                <?php if (!empty($title)): ?>
                    <article
                        itemscope
                        itemtype="https://schema.org/Service"
                        class="service-card group flex flex-col rounded-2xl border border-slate-200 bg-white p-6 shadow-soft transition-transform duration-200 hover:-translate-y-1.5 hover:shadow-lg"
                        data-service-card
                    >
                        <?php if (!empty($icon)): ?>
                            <div class="mb-4 flex h-10 w-10 items-center justify-center rounded-lg border border-accent-100 bg-accent-50">
                                <img
                                    loading="lazy"
                                    decoding="async"
                                    src="<?= asset($icon) ?>"
                                    alt="<?= htmlspecialchars($iconAlt) ?>"
                                    class="h-6 w-6"
                                    itemprop="image"
                                    data-service-icon
                                />
                        </div>
                        <?php endif; ?>

                        <?php if (!empty($title)): ?>
                            <h3
                                itemprop="serviceType"
                                class="text-lg font-semibold text-slate-900"
                            >
                                <?= htmlspecialchars($title) ?>
                            </h3>
                        <?php endif; ?>

                        <?php if (!empty($description)): ?>
                        <p
                            itemprop="description"
                            class="mt-2 text-sm text-slate-600"
                        >
                            <?= htmlspecialchars($description) ?>
                        </p>
                        <?php endif; ?>

                        <?php if (!empty($slug)): ?>
                            <div class="mt-4">
                                <a
                                    itemprop="url"
                                    href="<?= route_url($slug) ?>"
                                    class="inline-flex items-center text-sm font-semibold text-primary-800 hover:text-primary-900"
                                    title="Explore our <?= htmlspecialchars($title) ?> to enhance your operations"
                                    aria-label="Explore <?= htmlspecialchars($title) ?> that drive automation and growth"
                                >
                                    Explore Our Services
                                    <span class="ml-1 inline-block translate-x-0 transition-transform duration-150 group-hover:translate-x-0.5">
                                        →
                                    </span>
                                </a>
                            </div>
                        <?php endif; ?>
                    </article>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>