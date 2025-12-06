<?php
/**
 * @var array       $industries
 * @var string|null $title
 * @var string|null $subtitle
 */

// Default SEO-friendly heading + subtitle.
// You can override $title / $subtitle from the caller when needed.
$title    = $title ?? 'Tailored <span class="text-gradient-brand">software solutions for your industry</span>.';
$subtitle = $subtitle
    ?? 'QalbIT builds custom software, mobile apps and cloud solutions for e-commerce, fintech, healthcare, education, travel, business and other growth-focused industries.';
?>

<?php if (!empty($industries)): ?>
<section
    class="py-16 bg-slate-950 text-slate-50"
    aria-labelledby="industries-heading"
    data-horizontal-industries
>
    <div class="max-w-6xl mx-auto px-4">
        <!-- Header -->
        <header class="max-w-3xl space-y-3">
            <span class="border-2 shadow-elevated rounded-pill px-2.5 py-1.5 text-[11px] font-medium uppercase border-slate-700/80 bg-slate-900/60 text-slate-300 text-center md:text-left">
                <span class="font-semibold">Industries</span> we serve
            </span>

            <h2
                id="industries-heading"
                class="text-display-sm sm:text-display-md md:text-display-lg font-bold"
            >
                <?= $title // trusted HTML (span for gradient) ?>
            </h2>

            <p class="mt-2 text-sm md:text-base text-slate-300">
                <?= htmlspecialchars($subtitle) ?>
            </p>
            <div class="mt-6">
                <a
                    href="<?= route_url('/industries/') ?>"
                    class="text-xs md:text-sm font-semibold text-slate-300 hover:text-primary-200 underline underline-offset-4"
                >
                    View all industries we serve
                </a>
            </div>
        </header>

        <div
            class="mt-4 lg:mt-6 overflow-x-visible lg:overflow-x-hidden"
            data-horizontal-wrapper
        >
            <div
                class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 md:gap-6 lg:flex lg:gap-6 lg:pb-2"
                data-horizontal-track
                role="list"
            >
                <?php foreach ($industries as $industry): ?>
                    <article
                        itemscope
                        itemtype="https://schema.org/Service"
                        class="group relative flex flex-col justify-between rounded-2xl border border-slate-800/80 bg-slate-900/70 p-5 backdrop-blur-sm transition-colors duration-200 hover:border-primary-400/70 lg:min-w-[320px]"
                        role="listitem"
                    >
                        <div class="flex items-center gap-3 mb-3">
                            <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-xl bg-slate-950/60 ring-1 ring-slate-700/80 group-hover:ring-primary-400/80">
                                <img
                                    src="<?= asset($industry['icon']) ?>"
                                    alt="Icon representing <?= htmlspecialchars($industry['name']) ?>"
                                    width="24"
                                    height="24"
                                    loading="lazy"
                                    decoding="async"
                                    class="h-5 w-5 flex-0 industry-tile-icon"
                                />
                            </div>

                            <h3
                                itemprop="name serviceType"
                                class="text-sm md:text-base font-semibold text-slate-50 group-hover:text-primary-50"
                            >
                                <?= htmlspecialchars($industry['name']) ?>
                            </h3>
                        </div>

                        <p
                            itemprop="description"
                            class="text-xs md:text-sm text-slate-300"
                        >
                            <?= htmlspecialchars($industry['summary']) ?>
                        </p>

                        <div class="mt-4 flex items-center justify-between text-[11px] uppercase tracking-[0.16em] text-slate-400">
                            <span class="group-hover:text-primary-200">
                                Industry focus
                            </span>
                            <a
                                itemprop="url"
                                href="<?= route_url($industry['slug']) ?>"
                                class="inline-flex items-center text-[11px] font-semibold text-slate-300 group-hover:text-primary-200"
                                title="Explore software solutions for <?= htmlspecialchars($industry['name']) ?>"
                                aria-label="Explore software solutions for <?= htmlspecialchars($industry['name']) ?>"
                            >
                                View solutions
                                <span
                                    aria-hidden="true"
                                    class="ml-1 transition-transform group-hover:translate-x-0.5"
                                >
                                    →
                                </span>
                            </a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
