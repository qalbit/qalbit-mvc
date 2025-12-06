<?php
$mainNav = config('navigation.main', []);
$currentPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';

$appName = config('app.name', 'QalbIT');

// Helper to decide if a nav item is active
$activeClass = function (string $itemUrl) use ($currentPath): string {
    // Normalize trailing slashes
    $normalize = function (string $path): string {
        if ($path !== '/' && str_ends_with($path, '/')) {
            return rtrim($path, '/');
        }
        return $path;
    };

    $current = $normalize($currentPath);
    $target  = $normalize($itemUrl);

    if ($target === '/') {
        return $current === '/' ? 'text-slate-900' : 'text-slate-600';
    }

    $isActive = str_starts_with($current, $target);

    return $isActive ? 'text-slate-900' : 'text-slate-600';
};
?>

<header class="border-b bg-white">
    <div class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between">
        <!-- Brand -->
        <a href="/" class="flex items-center gap-2">
            <span class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-slate-900 text-white text-sm font-semibold">
                Q
            </span>
            <span class="font-semibold text-lg tracking-tight">
                <?= htmlspecialchars($appName) ?>
            </span>
        </a>

        <!-- Desktop navigation -->
        <?php if (!empty($mainNav)): ?>
            <nav class="hidden md:flex items-center gap-6 text-sm">
                <?php foreach ($mainNav as $item): ?>
                    <a
                        href="<?= htmlspecialchars($item['url']) ?>"
                        class="font-medium <?= $activeClass($item['url']) ?> hover:text-slate-900 transition-colors"
                    >
                        <?= htmlspecialchars($item['label']) ?>
                    </a>
                <?php endforeach; ?>
            </nav>
        <?php endif; ?>

        <!-- Simple placeholder for mobile menu toggle (implement JS later) -->
        <button
            type="button"
            class="md:hidden inline-flex items-center justify-center rounded-md border border-slate-300 px-2.5 py-1.5 text-xs font-medium text-slate-700"
            aria-label="Open navigation"
        >
            Menu
        </button>
    </div>
</header>
