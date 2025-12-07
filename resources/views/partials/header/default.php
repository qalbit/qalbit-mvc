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

    <div class="max-w-6xl mx-auto flex h-16 items-center justify-between px-4">
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
                class="hidden lg:flex h-full items-center text-sm"
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
                        <!-- Parent with dropdown -->
                        <div class="relative flex h-full items-stretch group">
                            <?php if ($hasLink): ?>
                                <a
                                    href="<?= htmlspecialchars($itemUrl) ?>"
                                    class="flex h-full items-center justify-center gap-1 px-3 font-medium <?= $textColorClass ?> hover:text-primary-900 transition-colors"
                                    title="<?= htmlspecialchars($itemTitle) ?>"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    <?= htmlspecialchars($item['label']) ?>
                                    <svg xmlns="https://www.w3.org/2000/svg"
                                         fill="none" viewBox="0 0 24 24" stroke-width="2"
                                         stroke="currentColor"
                                         class="w-4 h-4 text-slate-600 group-hover:text-primary-900 transition-transform group-hover:rotate-180"
                                         aria-hidden="true"
                                    >
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </a>
                            <?php else: ?>
                                <button
                                    type="button"
                                    class="cursor-pointer flex h-full items-center gap-1 px-3 font-medium <?= $textColorClass ?> hover:text-primary-900 transition-colors"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    <?= htmlspecialchars($item['label']) ?>
                                    <svg xmlns="https://www.w3.org/2000/svg"
                                         fill="none" viewBox="0 0 24 24" stroke-width="2"
                                         stroke="currentColor"
                                         class="w-4 h-4 text-slate-600 group-hover:text-primary-900 transition-transform group-hover:rotate-180"
                                         aria-hidden="true"
                                    >
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </button>
                            <?php endif; ?>

                            <!-- Desktop dropdown panel -->
                            <div
                                class="pointer-events-none absolute left-1/2 top-full z-40 w-60 -translate-x-1/2
                                       bg-white shadow-soft
                                       opacity-0 transition-all duration-150 ease-out
                                       group-hover:pointer-events-auto group-hover:opacity-100"
                                role="menu"
                                aria-label="<?= htmlspecialchars($item['label']) ?> sub menu"
                            >
                                <div class="h-1 w-full bg-gradient-to-r from-primary-300 via-primary-700 to-accent-500"></div>

                                <ul>
                                    <?php foreach ($childNavItems as $child): ?>
                                        <?php
                                            $childUrl   = $child['url'] ?? '#';
                                            $childLabel = $child['label'] ?? '';
                                            $childTitle = $child['title'] ?? $childLabel;
                                        ?>
                                        <li>
                                            <a
                                                href="<?= htmlspecialchars($childUrl) ?>"
                                                class="block px-4 py-2.5 text-sm font-medium text-slate-600 hover:bg-primary-50 hover:text-primary-950 transition-colors"
                                                title="<?= htmlspecialchars($childTitle) ?>"
                                                role="menuitem"
                                            >
                                                <?= htmlspecialchars($childLabel) ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    <?php else: ?>
                        <!-- Simple item without dropdown -->
                        <?php if ($hasLink): ?>
                            <a
                                href="<?= htmlspecialchars($itemUrl) ?>"
                                class="flex h-full items-center px-3 font-medium <?= $textColorClass ?> hover:text-primary-900 transition-colors"
                                title="<?= htmlspecialchars($itemTitle) ?>"
                            >
                                <?= htmlspecialchars($item['label']) ?>
                            </a>
                        <?php else: ?>
                            <div
                                class="flex h-full items-center px-3 font-medium <?= $textColorClass ?> hover:text-primary-900 transition-colors"
                            >
                                <?= htmlspecialchars($item['label']) ?>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; ?>

                <!-- CTA visible only on lg+; prevents crowding -->
                <a
                    href="/contact-us/"
                    class="btn btn-primary btn-radius-pill ml-3 whitespace-nowrap"
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

    <!-- Mobile drawer -->
    <div
        id="mobile-menu"
        class="fixed inset-0 z-50 bg-slate-950/40 opacity-0 pointer-events-none transition-opacity duration-200 lg:hidden"
        aria-hidden="true"
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

    <!-- Tiny vanilla JS to handle open/close + accordions -->
    <script>
        (function () {
            const overlay  = document.getElementById('mobile-menu');
            const panel    = document.getElementById('mobile-menu-panel');
            const openBtn  = document.getElementById('mobile-menu-toggle');
            const closeBtn = document.getElementById('mobile-menu-close');

            if (!overlay || !panel || !openBtn || !closeBtn) return;

            function openMenu() {
                overlay.classList.remove('pointer-events-none', 'opacity-0');
                overlay.classList.add('pointer-events-auto', 'opacity-100');
                panel.classList.remove('translate-x-full');
                panel.classList.add('translate-x-0');
                overlay.setAttribute('aria-hidden', 'false');
                openBtn.setAttribute('aria-expanded', 'true');
            }

            function closeMenu() {
                overlay.classList.add('pointer-events-none', 'opacity-0');
                overlay.classList.remove('pointer-events-auto', 'opacity-100');
                panel.classList.add('translate-x-full');
                panel.classList.remove('translate-x-0');
                overlay.setAttribute('aria-hidden', 'true');
                openBtn.setAttribute('aria-expanded', 'false');
            }

            openBtn.addEventListener('click', openMenu);
            closeBtn.addEventListener('click', closeMenu);

            // Close when clicking backdrop
            overlay.addEventListener('click', function (event) {
                if (event.target === overlay) {
                    closeMenu();
                }
            });

            // Close on Escape for accessibility
            document.addEventListener('keydown', function (event) {
                if (event.key === 'Escape') {
                    closeMenu();
                }
            });

            // Submenu accordions
            document.querySelectorAll('[data-submenu-toggle]').forEach(function (button) {
                const id = button.getAttribute('data-submenu-toggle');
                const panel = document.getElementById(id);
                const chevron = document.querySelector('[data-submenu-chevron="' + id + '"]');
                if (!panel) return;

                button.addEventListener('click', function () {
                    const isHidden = panel.classList.contains('hidden');
                    if (isHidden) {
                        panel.classList.remove('hidden');
                        if (chevron) chevron.classList.add('rotate-180');
                        button.setAttribute('aria-expanded', 'true');
                    } else {
                        panel.classList.add('hidden');
                        if (chevron) chevron.classList.remove('rotate-180');
                        button.setAttribute('aria-expanded', 'false');
                    }
                });
            });
        })();
    </script>
</header>
