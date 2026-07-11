<?php
/**
 * Geo – other locations we serve (cross-links between location pages).
 *
 * Expects: $location (current geo entry, used to exclude itself).
 */

$currentSlug = $location['slug'] ?? '';

$otherLocations = [];
foreach (config('geo', []) as $geoEntry) {
    if (empty($geoEntry['enabled']) || empty($geoEntry['slug']) || empty($geoEntry['name'])) {
        continue;
    }
    if (trim($geoEntry['slug'], '/') === trim($currentSlug, '/')) {
        continue;
    }
    $otherLocations[] = $geoEntry;
}
?>

<?php if (!empty($otherLocations)): ?>
    <section
        id="geo-locations"
        aria-labelledby="geo-locations-heading"
        class="border-t border-slate-100 bg-white py-10 sm:py-12"
    >
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <h2
                id="geo-locations-heading"
                class="text-sm font-semibold uppercase tracking-[0.16em] text-slate-500"
            >
                Other locations we serve
            </h2>

            <ul class="mt-4 flex flex-wrap gap-2">
                <?php foreach ($otherLocations as $geoEntry): ?>
                    <li>
                        <a
                            title="Custom software development in <?= htmlspecialchars($geoEntry['name']) ?>"
                            href="<?= route_url($geoEntry['slug']) ?>"
                            class="inline-flex items-center rounded-full border border-slate-200 bg-slate-50 px-3 py-1 text-xs font-medium text-slate-600 transition-colors hover:border-sky-300 hover:bg-sky-50 hover:text-sky-700"
                        >
                            <?= htmlspecialchars($geoEntry['name']) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>

            <p class="mt-5 text-xs sm:text-sm text-slate-500">
                Planning a project? Get an instant ballpark with our free
                <a
                    href="<?= route_url('/tools/software-development-cost-calculator/') ?>"
                    class="font-medium text-sky-700 underline underline-offset-4 hover:text-sky-600"
                >software development cost calculator</a>,
                or explore
                <a
                    href="<?= route_url('/hire-developers/') ?>"
                    class="font-medium text-sky-700 underline underline-offset-4 hover:text-sky-600"
                >dedicated developer profiles</a>
                for your team.
            </p>
        </div>
    </section>
<?php endif; ?>
