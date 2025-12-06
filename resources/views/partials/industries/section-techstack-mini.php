<section
    id="industries-tech-chips"
    class="bg-slate-950 py-16 sm:py-20 lg:py-24"
    data-animate="industries-tech-tags"
>
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <div class="mb-8 max-w-2xl space-y-3">
            <h2 class="text-2xl sm:text-3xl font-bold tracking-tight text-slate-50">
                Technologies we use in industry projects
            </h2>
            <p class="text-sm sm:text-base text-slate-300">
                These are some of the technologies we most often use for industry-specific app development –
                from mobile entertainment solutions and food delivery apps to secure fintech platforms and
                healthcare portals.
            </p>
        </div>

        <div class="flex flex-wrap gap-3 text-xs sm:text-sm" data-tech-tags>
            <?php
                // Adjust slugs/labels to match your actual technology pages.
                $technologies = App\Support\Technology::all();
                
                foreach ($technologies as $tech):
                    $label = $tech['short_name'] ?? '';
                    $slug  = $tech['slug']  ?? '#';
            ?>
                <a
                    href="<?= htmlspecialchars($slug, ENT_QUOTES); ?>"
                    class="inline-flex items-center rounded-full border border-slate-700 bg-slate-900/70 px-3 py-1 text-slate-100 hover:border-sky-400 hover:bg-slate-900 transition-colors"
                >
                    <span class="mr-2 h-1.5 w-1.5 rounded-full bg-sky-400"></span>
                    <?= htmlspecialchars($label, ENT_QUOTES); ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>