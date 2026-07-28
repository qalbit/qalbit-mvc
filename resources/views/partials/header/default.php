<?php
$mainNav = config('navigation.main', []);
$currentPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';

$appName = config('app.name', 'QalbIT');

// Helper to decide if a nav item is active
$activeClass = function (string $itemUrl) use ($currentPath): string {
    $normalize = function (string $path): string {
        if ($path !== '/' && str_ends_with($path, '/')) {
            return rtrim($path, '/');
        }
        return $path;
    };

    $current = $normalize($currentPath);
    $target  = $normalize($itemUrl);

    if ($target === '/') {
        return $current === '/' ? 'text-primary-900' : 'text-slate-600';
    }
    if ($target === '') {
        return 'text-slate-600';
    }

    $isActive = str_starts_with($current, $target);

    return $isActive ? 'text-primary-700' : 'text-slate-600';
};
?>

<header class="sticky top-0 z-40 bg-slate-50" role="banner">
    <!-- Skip link for keyboard / screen readers -->
    <a
        href="#main-content"
        class="sr-only focus:not-sr-only focus:absolute focus:left-4 focus:top-3 focus:z-50 focus:rounded-md focus:bg-primary-600 focus:px-3 focus:py-2 focus:text-xs focus:font-semibold focus:text-white"
    >
        Skip to main content
    </a>

    <div class="max-w-7xl mx-auto flex h-16 items-center justify-between px-4">
        <!-- Brand -->
        <a
            href="/"
            class="flex h-full items-center gap-2"
            aria-label="<?= htmlspecialchars($appName) ?> home"
        >
            <img
                src="<?= asset('images/brand/logo-primary.svg') ?>"
                alt="QalbIT Infotech Pvt Ltd logo"
                height="34"
                width="139"
            />
        </a>

        <?php if (!empty($mainNav)): ?>
            <!-- Desktop navigation (only from lg and up) -->
            <nav
                class="relative hidden lg:flex h-full items-center text-[13px] xl:text-sm"
                aria-label="Primary navigation"
            >
                <?php foreach ($mainNav as $item): ?>
                    <?php
                        $itemUrl        = $item['url'] ?? '/';
                        $hasLink        = !empty($item['url']);
                        $childNavItems  = !empty($item['child']) ? $item['child'] : [];
                        $hasChildren    = !empty($childNavItems);
                        $textColorClass = $activeClass($itemUrl);
                        $itemTitle      = !empty($item['title'])
                            ? $item['title']
                            : ($item['label'] ?? '');
                    ?>

                    <?php if ($hasChildren): ?>
                        <!-- Parent with mega menu (panel anchors to the <nav>) -->
                        <div class="flex h-full items-stretch group">
                            <?php if ($hasLink): ?>
                                <a
                                    href="<?= htmlspecialchars($itemUrl) ?>"
                                    class="flex h-full items-center justify-center px-2 xl:px-3 font-medium <?= $textColorClass ?> hover:text-primary-900 transition-colors whitespace-nowrap"
                                    title="<?= htmlspecialchars($itemTitle) ?>"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    <?= htmlspecialchars($item['label']) ?>
                                </a>
                            <?php else: ?>
                                <button
                                    type="button"
                                    class="cursor-pointer flex h-full items-center px-2 xl:px-3 font-medium <?= $textColorClass ?> hover:text-primary-900 transition-colors whitespace-nowrap"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    <?= htmlspecialchars($item['label']) ?>
                                </button>
                            <?php endif; ?>

                            <!-- Full-width mega-menu (full-bleed panel flush under the sticky header) -->
                            <?php
                                $featured  = $item['featured'] ?? null;
                                $bareIcons = !empty($item['bare_icons']);
                            ?>

                            <!-- Dimming backdrop -->
                            <div
                                class="pointer-events-none fixed inset-x-0 bottom-0 top-16 z-30 bg-slate-950/30 opacity-0 backdrop-blur-[1px] transition-opacity duration-200 ease-out group-hover:opacity-100"
                                aria-hidden="true"
                            ></div>

                            <!-- Panel -->
                            <div
                                class="invisible pointer-events-none fixed inset-x-0 top-16 z-30 -translate-y-3 opacity-0 transition-[opacity,transform] duration-200 ease-out
                                       group-hover:visible group-hover:pointer-events-auto group-hover:translate-y-0 group-hover:opacity-100"
                                role="menu"
                                aria-label="<?= htmlspecialchars($item['label']) ?> mega menu"
                            >
                                <div class="border-t border-slate-200 bg-white shadow-2xl">
                                    <!-- Brand accent line -->
                                    <div class="h-0.5 w-full bg-gradient-to-r from-primary-400 via-primary-700 to-accent-500"></div>

                                    <div class="mx-auto max-w-7xl px-6 py-8 lg:px-10 lg:py-10">
                                        <!-- Header row -->
                                        <div class="mb-4 flex items-center justify-between border-b border-slate-100 pb-3">
                                            <span class="text-[11px] font-semibold uppercase tracking-[0.16em] text-slate-400">
                                                Explore <?= htmlspecialchars($item['label']) ?>
                                            </span>
                                            <?php if ($hasLink): ?>
                                                <a href="<?= htmlspecialchars($itemUrl) ?>" class="inline-flex items-center gap-1 text-xs font-semibold text-primary-700 transition-colors hover:text-primary-900">
                                                    View all <?= htmlspecialchars($item['label']) ?>
                                                    <span aria-hidden="true">→</span>
                                                </a>
                                            <?php endif; ?>
                                        </div>

                                        <!-- Items grid (full width) -->
                                        <ul class="grid grid-cols-1 gap-x-6 gap-y-0.5 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                                            <?php foreach ($childNavItems as $child): ?>
                                                <?php
                                                    $childUrl   = $child['url'] ?? '#';
                                                    $childLabel = $child['label'] ?? '';
                                                    $childTitle = $child['title'] ?? $childLabel;
                                                    $meta       = nav_meta($childUrl);
                                                    $childIcon  = $child['icon'] ?? $meta['icon'];
                                                    $childDesc  = $child['desc'] ?? $meta['desc'];
                                                ?>
                                                <li>
                                                    <a
                                                        href="<?= htmlspecialchars($childUrl) ?>"
                                                        class="group/item flex items-start gap-4 rounded-xl p-3 transition-colors hover:bg-slate-50"
                                                        title="<?= htmlspecialchars($childTitle) ?>"
                                                        role="menuitem"
                                                    >
                                                        <?php if (!empty($childIcon)): ?>
                                                            <?php
                                                                // Decorative: each icon sits beside its own visible label.
                                                                // Drawn as a background so it carries no image semantics
                                                                // and is not fetched until the menu is opened. See
                                                                // .nav-icon in resources/css/app.css.
                                                                $childIconUrl = asset(ltrim($childIcon, '/'));
                                                                $childIconVar = "--nav-icon:url('" . htmlspecialchars($childIconUrl, ENT_QUOTES) . "')";
                                                            ?>
                                                            <?php if ($bareIcons): ?>
                                                                <span class="nav-icon nav-icon--bare mt-0.5 block h-11 w-11 shrink-0" style="<?= $childIconVar ?>" aria-hidden="true"></span>
                                                            <?php else: ?>
                                                                <span class="nav-icon mt-0.5 block h-11 w-11 shrink-0 rounded-xl bg-slate-50 ring-1 ring-slate-100 transition-all group-hover/item:bg-white group-hover/item:shadow-sm group-hover/item:ring-primary-200" style="<?= $childIconVar ?>" aria-hidden="true"></span>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                        <span class="min-w-0">
                                                            <span class="block text-[15px] font-semibold text-slate-900 transition-colors group-hover/item:text-primary-800">
                                                                <?= htmlspecialchars($childLabel) ?>
                                                            </span>
                                                            <?php if (!empty($childDesc)): ?>
                                                                <span class="mt-0.5 text-[13px] leading-snug text-slate-500 line-clamp-2">
                                                                    <?= htmlspecialchars($childDesc) ?>
                                                                </span>
                                                            <?php endif; ?>
                                                        </span>
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>

                                        <!-- Bottom CTA stripe -->
                                        <?php if (!empty($featured)): ?>
                                            <div class="relative mt-6 flex flex-col gap-3 overflow-hidden rounded-2xl bg-gradient-to-r from-primary-800 via-primary-900 to-slate-950 px-6 py-4 text-white sm:flex-row sm:items-center sm:justify-between">
                                                <div class="pointer-events-none absolute -right-10 -top-10 h-32 w-32 rounded-full bg-primary-500/30 blur-3xl"></div>
                                                <div class="relative min-w-0">
                                                    <?php if (!empty($featured['eyebrow'])): ?>
                                                        <span class="text-[10px] font-semibold uppercase tracking-[0.18em] text-primary-200">
                                                            <?= htmlspecialchars($featured['eyebrow']) ?>
                                                        </span>
                                                    <?php endif; ?>
                                                    <p class="mt-0.5 text-sm font-bold sm:text-base">
                                                        <?= htmlspecialchars($featured['title'] ?? '') ?><?php if (!empty($featured['text'])): ?><span class="font-normal text-slate-300"> — <?= htmlspecialchars($featured['text']) ?></span><?php endif; ?>
                                                    </p>
                                                </div>
                                                <?php if (!empty($featured['cta_label'])): ?>
                                                    <a
                                                        href="<?= htmlspecialchars($featured['cta_href'] ?? '/contact-us/') ?>"
                                                        class="relative inline-flex w-fit shrink-0 items-center gap-1.5 rounded-full bg-white px-4 py-2 text-xs font-semibold text-primary-900 transition-colors hover:bg-primary-50"
                                                    >
                                                        <?= htmlspecialchars($featured['cta_label']) ?>
                                                        <span aria-hidden="true">→</span>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <!-- Simple item without dropdown -->
                        <?php if ($hasLink): ?>
                            <a
                                href="<?= htmlspecialchars($itemUrl) ?>"
                                class="flex h-full items-center px-2 xl:px-3 font-medium <?= $textColorClass ?> hover:text-primary-900 transition-colors whitespace-nowrap"
                                title="<?= htmlspecialchars($itemTitle) ?>"
                            >
                                <?= htmlspecialchars($item['label']) ?>
                            </a>
                        <?php else: ?>
                            <div
                                class="flex h-full items-center px-2 xl:px-3 font-medium <?= $textColorClass ?> hover:text-primary-900 transition-colors whitespace-nowrap"
                            >
                                <?= htmlspecialchars($item['label']) ?>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; ?>

                <!-- CTA visible only on lg+; prevents crowding -->
                <a
                    href="/contact-us/"
                    class="btn btn-primary btn-radius-pill ml-2 xl:ml-3 whitespace-nowrap"
                    title="Get Free Estimate"
                >
                    Get Free Estimation
                </a>
            </nav>
        <?php endif; ?>

        <!-- Mobile / tablet menu toggle (up to lg) -->
        <button
            type="button"
            id="mobile-menu-toggle"
            class="inline-flex items-center justify-center rounded-xs w-10 h-10 hover:bg-primary-50 lg:hidden"
            aria-label="Open navigation menu"
            aria-controls="mobile-menu"
            aria-expanded="false"
        >
            <svg xmlns="https://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                 class="size-6" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M3.75 6.75h16.5M3.75 12h16.5M12 17.25h8.25" />
            </svg>
        </button>
    </div>

    <!-- Mobile drawer: inert while closed so the hidden links are neither
         focusable nor exposed to assistive tech / AI agents -->
    <div
        id="mobile-menu"
        class="fixed inset-0 z-50 bg-slate-950/40 opacity-0 pointer-events-none transition-opacity duration-200 lg:hidden"
        aria-hidden="true"
        inert
        role="dialog"
        aria-modal="true"
        aria-label="Mobile navigation"
    >
        <div
            id="mobile-menu-panel"
            class="ml-auto flex h-full w-full max-w-xs translate-x-full flex-col bg-white shadow-xl transition-transform duration-200"
        >
            <!-- Drawer header -->
            <div class="flex items-center justify-between px-4 h-16 border-b border-slate-200">
                <span class="text-sm font-semibold text-slate-900">
                    Menu
                </span>
                <button
                    type="button"
                    id="mobile-menu-close"
                    class="inline-flex items-center justify-center rounded-xs w-9 h-9 hover:bg-primary-50"
                    aria-label="Close navigation menu"
                >
                    <svg xmlns="https://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                         class="size-5" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Drawer nav -->
            <nav class="flex-1 overflow-y-auto px-4 py-4 text-sm" aria-label="Mobile primary navigation">
                <?php foreach ($mainNav as $index => $item): ?>
                    <?php
                        $itemUrl        = $item['url'] ?? '/';
                        $hasLink        = !empty($item['url']);
                        $childNavItems  = !empty($item['child']) ? $item['child'] : [];
                        $hasChildren    = !empty($childNavItems);
                        $textColorClass = $activeClass($itemUrl);
                        $submenuId      = 'mobile-submenu-' . $index;
                        $itemTitle      = !empty($item['title'])
                            ? $item['title']
                            : ($item['label'] ?? '');
                    ?>

                    <?php if ($hasChildren): ?>
                        <div class="mb-2 border-b border-slate-100 pb-2">
                            <!-- Toggle row -->
                            <button
                                type="button"
                                class="flex w-full items-center justify-between py-2 text-sm font-semibold text-slate-900"
                                data-submenu-toggle="<?= $submenuId ?>"
                                aria-expanded="false"
                                aria-controls="<?= $submenuId ?>"
                            >
                                <span><?= htmlspecialchars($item['label']) ?></span>
                                <svg xmlns="https://www.w3.org/2000/svg"
                                     fill="none" viewBox="0 0 24 24" stroke-width="2"
                                     stroke="currentColor"
                                     class="h-4 w-4 text-slate-500 transition-transform"
                                     data-submenu-chevron="<?= $submenuId ?>"
                                     aria-hidden="true"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                </svg>
                            </button>

                            <!-- Collapsible panel -->
                            <div
                                id="<?= $submenuId ?>"
                                class="mt-1 hidden space-y-1 border-l border-slate-100 pl-3"
                            >
                                <?php if ($hasLink): ?>
                                    <!-- Parent link (overview) -->
                                    <a
                                        href="<?= htmlspecialchars($itemUrl) ?>"
                                        class="block py-1 text-sm font-semibold text-slate-900"
                                        title="<?= htmlspecialchars($itemTitle) ?>"
                                    >
                                        <?= htmlspecialchars($item['label']) ?> overview
                                    </a>
                                <?php endif; ?>

                                <?php foreach ($childNavItems as $child): ?>
                                    <?php
                                        $childUrl   = $child['url'] ?? '#';
                                        $childLabel = $child['label'] ?? '';
                                        $childTitle = $child['title'] ?? $childLabel;
                                    ?>
                                    <a
                                        href="<?= htmlspecialchars($childUrl) ?>"
                                        class="block py-2 text-sm text-slate-700 hover:text-primary-900"
                                        title="<?= htmlspecialchars($childTitle) ?>"
                                    >
                                        <?= htmlspecialchars($childLabel) ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php else: ?>
                        <a
                            href="<?= htmlspecialchars($itemUrl) ?>"
                            class="block py-2 text-sm font-semibold text-slate-900 hover:text-primary-900 mb-2 border-b border-slate-100 pb-4"
                            title="<?= htmlspecialchars($itemTitle) ?>"
                        >
                            <?= htmlspecialchars($item['label']) ?>
                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </nav>

            <!-- Drawer footer CTA -->
            <div class="border-t border-slate-100 px-4 py-4">
                <a
                    href="/contact-us/"
                    class="btn btn-primary btn-radius-pill w-full justify-center"
                    title="Get Free Estimate"
                >
                    Get Free Estimation
                </a>
            </div>
        </div>
    </div>
</header>
