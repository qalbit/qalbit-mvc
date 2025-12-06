<?php
// Expected:
// - $locations: enabled entries for a single country
// - $countryKey
// - $countryName
?>

<section class="py-16">
    <div class="max-w-6xl mx-auto px-4 space-y-8">
        <header class="space-y-3 max-w-3xl">
            <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">
                <?= htmlspecialchars(strtoupper($countryKey)) ?> · Locations
            </p>
            <h1 class="text-3xl md:text-4xl font-semibold">
                Custom Software Development in <?= htmlspecialchars($countryName) ?>
            </h1>
            <p class="text-slate-600">
                QalbIT works with startups and businesses across <?= htmlspecialchars($countryName) ?>
                through remote-first collaboration, with focused pages for key states where we often work
                with clients.
            </p>
        </header>

        <?php if (!empty($locations)): ?>
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                <?php foreach ($locations as $location): ?>
                    <article class="flex h-full flex-col rounded-xl border bg-white p-5 shadow-sm">
                        <div class="flex-1 space-y-2">
                            <h2 class="text-sm font-semibold text-slate-800">
                                <a
                                    href="<?= htmlspecialchars($location['slug']) ?>"
                                    class="hover:text-slate-900 hover:underline"
                                >
                                    <?= htmlspecialchars($location['name']) ?>
                                </a>
                            </h2>

                            <?php if (!empty($location['short_description'])): ?>
                                <p class="text-xs text-slate-600">
                                    <?= htmlspecialchars($location['short_description']) ?>
                                </p>
                            <?php endif; ?>
                        </div>

                        <div class="mt-4">
                            <a
                                href="<?= htmlspecialchars($location['slug']) ?>"
                                class="inline-flex items-center text-xs font-medium text-slate-900 hover:underline"
                            >
                                View state-specific page
                                <span class="ml-1 text-[10px]">→</span>
                            </a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="text-sm text-slate-600">
                We are still adding <?= htmlspecialchars($countryName) ?>-specific pages. For now,
                <a href="/contact-us/" class="text-slate-900 underline">contact us</a> with your location
                and project details.
            </p>
        <?php endif; ?>
    </div>
</section>
