<section
    id="industry-social-proof"
    class="bg-white py-16 sm:py-20 lg:py-24"
    data-animate="industries-social-proof"
>
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 space-y-10">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div class="space-y-3 max-w-3xl">
                <h2 class="text-display-sm sm:text-display-md md:text-display-lg font-bold text-slate-900">
                    Trusted by teams across different industries
                </h2>
                <p class="text-sm sm:text-base text-slate-700">
                    We work with founders, product teams and operational leaders in home services,
                    travel, fintech, ecommerce, sports &amp; fitness, healthcare, education and more.
                    The details of each platform change, but the expectations around reliability,
                    clarity and support stay the same.
                </p>
            </div>
            <div class="max-w-sm text-xs text-slate-600">
                <p>
                    On a call we can share anonymised examples that are closest to your context,
                    and walk through what worked, what did not and how we adjusted over time.
                </p>
            </div>
        </div>

        <?php
            // Replace with real logos / names when available.
            $logos = [
                [ 'label' => 'Home services SaaS client',     'hint' => 'Field services & booking platform' ],
                [ 'label' => 'Fintech reporting portal',      'hint' => 'Finance & compliance dashboards' ],
                [ 'label' => 'Travel & mobility operator',    'hint' => 'Trip request & fleet scheduling' ],
                [ 'label' => 'Sports academy / education',    'hint' => 'Training & membership platform' ],
                [ 'label' => 'Healthcare & wellness group',   'hint' => 'Healthtech & appointment portal' ],
                [ 'label' => 'Ecommerce & marketplace brand', 'hint' => 'Multi-vendor commerce platform' ],
            ];
        ?>

        <!-- Logos / client types -->
        <div class="grid gap-4 sm:gap-5 sm:grid-cols-3 lg:grid-cols-6">
            <?php foreach ($logos as $logo): ?>
                <div class="flex flex-col items-start rounded-xl border border-slate-200 bg-slate-50 px-3 py-3">
                    <span class="mb-2 h-7 w-7 rounded-full bg-slate-200 flex items-center justify-center text-[11px] text-slate-500">
                        ★
                    </span>
                    <p class="text-[11px] font-semibold text-slate-900">
                        <?= htmlspecialchars($logo['label'], ENT_QUOTES); ?>
                    </p>
                    <?php if (!empty($logo['hint'])): ?>
                        <p class="mt-0.5 text-[10px] text-slate-500">
                            <?= htmlspecialchars($logo['hint'], ENT_QUOTES); ?>
                        </p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Short testimonials -->
        <div class="grid gap-5 sm:gap-6 md:grid-cols-2">
            <?php foreach ($testimonials as $testimonial): ?>
                <figure class="flex flex-col rounded-2xl border border-slate-200 bg-slate-50 p-5 sm:p-6">
                    <blockquote class="text-sm sm:text-base text-slate-800 leading-relaxed">
                        “<?= nl2br(htmlspecialchars(trim($testimonial['quote']), ENT_QUOTES)); ?>”
                    </blockquote>
                    <figcaption class="mt-3 text-[11px] text-slate-600">
                        <span class="font-semibold text-slate-900">
                            <?= htmlspecialchars($testimonial['role'], ENT_QUOTES); ?>
                        </span>
                        <?php if (!empty($testimonial['region'])): ?>
                            <span class="mx-1">·</span>
                            <span><?= htmlspecialchars($testimonial['region'], ENT_QUOTES); ?></span>
                        <?php endif; ?>
                    </figcaption>
                </figure>
            <?php endforeach; ?>
        </div>

        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
            <a
                href="<?= route_url('/portfolio/') ?>"
                class="inline-flex items-center text-[11px] font-semibold uppercase tracking-[0.18em] text-sky-700 hover:text-sky-600"
            >
                View more case studies &amp; examples
                <span class="ml-1.5 translate-y-px text-base">↗</span>
            </a>
            <p class="text-[11px] text-slate-600 max-w-xl">
                If you share a bit about your industry and current systems, we can point to the most
                relevant examples instead of generic success stories.
            </p>
        </div>
    </div>
</section>