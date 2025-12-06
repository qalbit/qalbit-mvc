<?php
/**
 * Home – Clients / Logos Section
 *
 * @var array|null  $clients  // optional override from controller
 * @var string|null $title
 * @var string|null $subtitle
 */

// If still empty, nothing to render
if (empty($clients) || !is_array($clients)) {
    return;
}

$clients = array_values($clients);

// 2) Heading / copy
$title    = $title ?? 'Trusted by ambitious startups and global teams';
$subtitle = $subtitle
    ?? 'A few of the SaaS products, marketplaces, agencies and enterprises that rely on QalbIT for web, mobile and platform development.';

// 3) Split clients into 2 rows for marquee (even / odd)
$rows = [[], []];
foreach ($clients as $index => $client) {
    $rowIndex         = $index % 2;
    $rows[$rowIndex][] = $client;
}
?>

<section
    id="home-clients"
    class="relative py-16 bg-background text-foreground overflow-x-hidden"
    aria-labelledby="home-clients-heading"
    data-clients-section
>
    <div class="mx-auto max-w-6xl px-4">
        <div class="grid gap-10 lg:grid-cols-[minmax(0,1.3fr)_minmax(0,2fr)] lg:items-center">
            <!-- LEFT: Heading + SEO copy -->
            <header class="space-y-4 max-w-xl" data-clients-header>
                <span class="inline-flex items-center rounded-pill border border-slate-200 bg-white/90 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-muted-foreground shadow-soft">
                    Our clients · Global footprint
                </span>

                <h2
                    id="home-clients-heading"
                    class="text-display-sm sm:text-display-md font-bold"
                >
                    Trusted by ambitious startups and global enterprises
                </h2>

                <p class="text-sm md:text-base text-muted-foreground">
                    <?= htmlspecialchars($subtitle) ?>
                </p>

                <!-- Keyword-rich bullets -->
                <ul class="mt-4 space-y-2 text-xs text-muted-foreground/90">
                    <li>
                        ✓ Product engineering partner for SaaS startups, scale-ups and agencies across Europe, the Middle East, the US and India.
                    </li>
                    <li>
                        ✓ Custom software development for healthcare, logistics, hospitality, fintech, recruitment, travel and retail businesses.
                    </li>
                    <li>
                        ✓ Long-term collaboration with founders, CTOs and product teams on web apps, mobile apps and cloud-based platforms.
                    </li>
                </ul>
            </header>

            <!-- RIGHT: Logo marquee on desktop, static grid on mobile -->
            <div class="relative lg:pl-6 overflow-hidden max-w-full" data-clients-marquee>
                <!-- Desktop / tablet: 2-row marquee -->
                <div class="hidden sm:flex flex-col gap-5">
                    <?php foreach ($rows as $rowIndex => $rowClients): ?>
                        <?php if (empty($rowClients)) continue; ?>

                        <div
                            class="relative w-full overflow-hidden"
                            data-clients-row
                            data-clients-row-index="<?= $rowIndex ?>"
                        >
                            <div
                                class="flex items-center gap-6 max-w-none"
                                data-clients-track
                            >
                                <?php foreach ($rowClients as $client): ?>
                                    <?php
                                    $name = $client['name'] ?? '';
                                    $logo = $client['logo'] ?? '';
                                    $alt  = $client['alt']  ?? ($name ? $name . ' logo' : 'Client logo');
                                    ?>
                                    <?php if (!$logo) continue; ?>

                                    <figure
                                        class="client-logo-card flex h-20 min-w-[9.5rem] items-center justify-center"
                                        itemscope
                                        itemtype="https://schema.org/Organization"
                                    >
                                        <img
                                            src="<?= asset(htmlspecialchars($logo)) ?>"
                                            alt="<?= htmlspecialchars($alt) ?>"
                                            loading="lazy"
                                            decoding="async"
                                            width="160"
                                            height="80"
                                            class="w-fit h-fit object-contain"
                                            itemprop="logo"
                                        />
                                        <?php if (!empty($name)): ?>
                                            <meta itemprop="name" content="<?= htmlspecialchars($name) ?>">
                                        <?php endif; ?>
                                    </figure>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Mobile: simple logo grid, no animation -->
                <div class="mt-6 grid grid-cols-2 gap-4 sm:hidden">
                    <?php foreach ($clients as $client): ?>
                        <?php
                        $name = $client['name'] ?? '';
                        $logo = $client['logo'] ?? '';
                        $alt  = $client['alt']  ?? ($name ? $name . ' logo' : 'Client logo');
                        ?>
                        <?php if (!$logo) continue; ?>

                        <figure
                            class="client-logo-card flex h-20 items-center justify-center"
                            itemscope
                            itemtype="https://schema.org/Organization"
                        >
                            <img
                                src="<?= asset(htmlspecialchars($logo)) ?>"
                                alt="<?= htmlspecialchars($alt) ?>"
                                loading="lazy"
                                decoding="async"
                                width="160"
                                height="80"
                                class="max-h-12 w-auto object-contain"
                                itemprop="logo"
                            />
                            <?php if (!empty($name)): ?>
                                <meta itemprop="name" content="<?= htmlspecialchars($name) ?>">
                            <?php endif; ?>
                        </figure>
                    <?php endforeach; ?>
                </div>

                <!-- Left / right fade masks for marquee -->
                <div class="pointer-events-none absolute inset-y-0 left-0 w-10 bg-gradient-to-r from-background via-background/80 to-transparent hidden sm:block"></div>
                <div class="pointer-events-none absolute inset-y-0 right-0 w-10 bg-gradient-to-l from-background via-background/80 to-transparent hidden sm:block"></div>
            </div>
        </div>
    </div>
</section>
