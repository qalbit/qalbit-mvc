<section
    id="industries-usecase-chips"
    class="bg-slate-950 py-16 sm:py-20 lg:py-24"
    data-animate="industries-tags"
>
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <div class="mb-8 max-w-2xl space-y-3">
            <h2 class="text-2xl sm:text-3xl font-bold tracking-tight text-slate-50">
                Industries &amp; use cases we work with
            </h2>
            <p class="text-sm sm:text-base text-slate-300">
                We combine patterns from multiple domains – food delivery, travel, fintech, sports &amp; fitness,
                healthcare, education and more – then adapt them to your specific operations, customers and
                compliance needs.
            </p>
        </div>

        <div class="flex flex-wrap gap-3 text-xs sm:text-sm" data-industry-tags>
            <?php
                foreach ($industries as $tag):
                    $label = $tag['short_name'] ?? '';
                    $href  = $tag['slug']  ?? null;
            ?>

                <?php if (!empty($href)): ?>
                    <a
                        href="<?= htmlspecialchars($href, ENT_QUOTES); ?>"
                        class="inline-flex items-center rounded-full border border-slate-700 bg-slate-900/70 px-3 py-1 text-slate-100 hover:border-sky-400 hover:bg-slate-900 transition-colors"
                    >
                        <span class="mr-2 h-1.5 w-1.5 rounded-full bg-sky-400"></span>
                        <?= htmlspecialchars($label, ENT_QUOTES); ?>
                    </a>
                <?php else: ?>
                    <span class="inline-flex items-center rounded-full border border-slate-700 bg-slate-900/70 px-3 py-1 text-slate-100">
                        <span class="mr-2 h-1.5 w-1.5 rounded-full bg-sky-400"></span>
                        <?= htmlspecialchars($label, ENT_QUOTES); ?>
                    </span>
                <?php endif; ?>

            <?php endforeach; ?>
        </div>
    </div>
</section>