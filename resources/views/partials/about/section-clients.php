<section
    id="about-clients-industries"
    aria-labelledby="about-clients-industries-heading"
    class="bg-slate-50 text-slate-900"
    data-about-section="a5"
>
    <div class="mx-auto max-w-6xl px-4 py-12 sm:px-6 sm:py-16 lg:px-8 lg:py-20">
        <!-- Heading + intro -->
        <header class="max-w-3xl space-y-3">
            <p class="inline-flex items-center gap-2 rounded-full border border-accent-200 bg-accent-50 px-3 py-1 text-xs font-medium text-accent-700">
                <span class="h-1.5 w-1.5 rounded-full bg-accent-500"></span>
                <span>Global clients &amp; industries</span>
            </p>

            <h2
                id="about-clients-industries-heading"
                class="text-display-md sm:text-display-lg md:text-display-xl font-bold"
            >
                Partnering with teams across regions and industries.
            </h2>

            <p class="text-sm leading-relaxed text-slate-600 sm:text-base">
                QalbIT works with SaaS founders, SMEs, and enterprises across India, the Middle East,
                Europe, and North America – building and scaling products used by their customers every day.
            </p>
        </header>

        <!-- Logos -->
        <div class="mt-8 space-y-6 sm:mt-10">
            <p class="text-xs font-medium uppercase tracking-wide text-slate-500">
                Selected clients (representative)
            </p>

            <ul
                class="grid gap-6 sm:grid-cols-3 lg:grid-cols-5"
                aria-label="Client logo grid"
                data-logo-grid
            >
                <?php if (!empty($clients)): ?>
                    <?php foreach ($clients as $client): ?>
                        <?php
                            $src      = $client['logo'] ?? '';
                            $alt      = $client['alt'] ?? $client['name'] ?? '';
                            $url      = $client['url'] ?? null;
                            $industry = $client['industry'] ?? null;
                        ?>
                        <li
                            class="flex items-center justify-center h-20 w-auto rounded-2xl bg-white border border-slate-200 px-6"
                            data-logo
                        >
                            <?php if (!empty($url)): ?>
                                <a
                                    href="<?= htmlspecialchars($url, ENT_QUOTES, 'UTF-8') ?>"
                                    target="_blank"
                                    rel="noreferrer noopener"
                                    class="flex h-full w-full items-center justify-center"
                                    title="<?= htmlspecialchars($industry ?: $alt, ENT_QUOTES, 'UTF-8') ?>"
                                >
                            <?php else: ?>
                                <div
                                    class="flex h-full w-full items-center justify-center"
                                    <?php if ($industry): ?>
                                        title="<?= htmlspecialchars($industry, ENT_QUOTES, 'UTF-8') ?>"
                                    <?php endif; ?>
                                >
                            <?php endif; ?>

                                <img
                                    src="<?= asset($src) ?>"
                                    alt="<?= htmlspecialchars($alt, ENT_QUOTES, 'UTF-8') ?>"
                                    class="block max-h-10 w-auto max-w-full object-contain grayscale transition hover:opacity-100 hover:grayscale-0"
                                    loading="lazy"
                                />

                            <?php if (!empty($url)): ?>
                                </a>
                            <?php else: ?>
                                </div>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>


            <p class="text-xs text-slate-500 sm:text-sm">
                Logos are indicative; a more detailed list of case studies and references can be shared during discovery calls.
            </p>
        </div>

        <!-- Industries list -->
        <div class="mt-10 space-y-4">
            <p class="text-xs font-medium uppercase tracking-wide text-slate-500">
                Industries we often work with
            </p>

            <div
                class="flex flex-wrap gap-2"
                data-industries-list
            >
                <span class="inline-flex items-center rounded-full border border-slate-200 bg-white px-3 py-1 text-xs font-medium text-slate-800">
                    SaaS &amp; B2B software
                </span>
                <span class="inline-flex items-center rounded-full border border-slate-200 bg-white px-3 py-1 text-xs font-medium text-slate-800">
                    IT services &amp; agencies
                </span>
                <span class="inline-flex items-center rounded-full border border-slate-200 bg-white px-3 py-1 text-xs font-medium text-slate-800">
                    Finance &amp; investment tools
                </span>
                <span class="inline-flex items-center rounded-full border border-slate-200 bg-white px-3 py-1 text-xs font-medium text-slate-800">
                    Healthcare &amp; wellness
                </span>
                <span class="inline-flex items-center rounded-full border border-slate-200 bg-white px-3 py-1 text-xs font-medium text-slate-800">
                    Logistics &amp; transportation
                </span>
                <span class="inline-flex items-center rounded-full border border-slate-200 bg-white px-3 py-1 text-xs font-medium text-slate-800">
                    Retail, eCommerce &amp; local services
                </span>
            </div>

            <p class="text-xs text-slate-500 sm:text-sm">
                Even if your industry is not listed here, we can usually adapt quickly if the problem is
                product and workflow driven.
            </p>
        </div>
    </div>
</section>