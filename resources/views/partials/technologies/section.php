<?php
/**
 * Home – Technologies / Stack Section
 *
 * @var array       $technologies
 * @var string|null $title
 * @var string|null $subtitle
 */

$title    = $title ?? 'Technologies we build and support';
$subtitle = $subtitle
    ?? 'From Laravel and Node.js backends to React.js, Next.js and Flutter frontends, we help teams build and support reliable web, mobile and SaaS products.';

if (empty($technologies)) {
    return;
}

/**
 * Filter enabled technologies and sort by "order"
 */
$enabled = array_filter($technologies, static function ($tech) {
    return !isset($tech['enabled']) || $tech['enabled'] === true;
});

usort($enabled, static function ($a, $b) {
    return ($a['order'] ?? 999) <=> ($b['order'] ?? 999);
});
?>

<section
    id="home-technologies"
    class="py-16 bg-background text-foreground"
    aria-labelledby="home-technologies-heading"
    data-technologies-section
>
    <div class="mx-auto max-w-6xl px-4">
        <div class="grid gap-10 lg:grid-cols-[minmax(0,1.1fr)_minmax(0,2fr)] lg:items-start">
            <!-- LEFT: Heading + SEO copy -->
            <header class="space-y-4 max-w-xl" data-tech-header>
                <span class="inline-flex items-center rounded-pill border border-slate-200 bg-white/90 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-muted-foreground shadow-soft">
                    Our stack · Technologies
                </span>

                <h2
                    id="home-technologies-heading"
                    class="text-display-sm sm:text-display-md font-bold"
                >
                    <?= htmlspecialchars($title) ?>
                </h2>

                <p class="text-sm md:text-base text-muted-foreground">
                    <?= htmlspecialchars($subtitle) ?>
                </p>

                <!-- Keyword-rich bullet points -->
                <ul class="mt-4 space-y-2 text-xs text-muted-foreground/90">
                    <li>
                        ✓ Full-stack JavaScript: React.js, Next.js, Node.js, Nest.js and TypeScript backends for modern web apps and SaaS products.
                    </li>
                    <li>
                        ✓ PHP frameworks for ERP and B2B platforms: Laravel and CodeIgniter development, maintenance and long-term support.
                    </li>
                    <li>
                        ✓ Cross-platform mobile and content platforms: Flutter app development and WordPress websites connected to custom APIs.
                    </li>
                </ul>

                <!-- Link to technologies base page -->
                <a
                    href="/technologies/"
                    class="inline-flex items-center text-xs font-semibold text-primary-700 hover:text-primary-800 mt-5"
                    aria-label="Open QalbIT technologies page listing all supported stacks"
                >
                    View all technologies
                    <span aria-hidden="true" class="ml-1">↗</span>
                </a>
            </header>

            <!-- RIGHT: Technology cards grid -->
            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                <?php foreach ($enabled as $key => $tech): ?>
                    <?php
                    $slug       = $tech['slug']       ?? '#';
                    $name       = $tech['name']       ?? '';
                    $shortName  = $tech['short_name'] ?? $name;
                    $tagline    = $tech['tagline']    ?? '';
                    $summary    = $tech['summary']    ?? '';
                    $useCases   = $tech['use_cases']  ?? [];
                    $benefits   = $tech['benefits']   ?? [];

                    // Icon path – uses optional 'icon' in config, otherwise falls back
                    $iconPath = !empty($tech['icon'])
                        ? asset($tech['icon'])
                        : asset('assets/images/technologies/' . $key . '.svg');

                    $iconAlt = $shortName
                        ? $shortName . ' development services icon'
                        : 'Technology icon';

                    // Build up to 3 bullet lines (2 use cases + 1 benefit)
                    $bulletLines = [];
                    if (is_array($useCases)) {
                        $bulletLines = array_slice($useCases, 0, 2);
                    }
                    if (is_array($benefits)) {
                        $bulletLines = array_merge(
                            $bulletLines,
                            array_slice($benefits, 0, 1)
                        );
                    }
                    ?>
                    <article
                        class="group relative flex h-full flex-col rounded-2xl border border-slate-200 bg-card px-4 py-5 shadow-soft transition-transform duration-200 hover:-translate-y-1 hover:border-primary-400 hover:shadow-elevated"
                        itemscope
                        itemtype="https://schema.org/Service"
                        data-tech-card
                    >
                        <div class="flex items-center justify-between gap-3">
                            <h3 class="text-sm font-semibold text-foreground" itemprop="name">
                                <?= htmlspecialchars($shortName) ?>
                            </h3>

                            <div class="flex h-9 w-9 flex-shrink-0 items-center justify-center overflow-hidden rounded-xl bg-muted">
                                <img
                                    src="<?= $iconPath ?>"
                                    alt="<?= htmlspecialchars($iconAlt) ?>"
                                    loading="lazy"
                                    decoding="async"
                                    class="h-full w-full object-contain"
                                />
                            </div>
                        </div>

                        <?php if ($tagline || $summary): ?>
                            <p class="mt-2 text-xs leading-relaxed text-muted-foreground">
                                <?= htmlspecialchars($tagline ?: $summary) ?>
                            </p>

                            <!-- SEO-friendly hidden description -->
                            <p class="sr-only" itemprop="description">
                                <?= htmlspecialchars($summary ?: $tagline) ?>
                            </p>
                        <?php endif; ?>

                        <?php if (!empty($bulletLines)): ?>
                            <ul class="mt-3 space-y-1.5 text-[11px] text-muted-foreground">
                                <?php foreach ($bulletLines as $line): ?>
                                    <li>• <?= htmlspecialchars($line) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                        <?php if (!empty($slug)): ?>
                            <meta itemprop="serviceType" content="<?= htmlspecialchars($name) ?>">
                            <a
                                href="<?= htmlspecialchars($slug) ?>"
                                class="mt-4 inline-flex items-center text-[11px] font-semibold text-primary-700 hover:text-primary-800"
                                aria-label="Read more about <?= htmlspecialchars($name) ?> at QalbIT"
                                itemprop="url"
                            >
                                Learn more
                                <span aria-hidden="true" class="ml-1">↗</span>
                            </a>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
