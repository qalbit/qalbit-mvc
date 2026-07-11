<?php
/**
 * Home – compact strip linking our own product pages.
 * Driven by config/products.php so new products appear automatically.
 */

$productItems = array_filter(
    config('products.items', []),
    static fn (array $p): bool => !empty($p['enabled']) && !empty($p['slug'])
);

uasort($productItems, static fn (array $a, array $b): int => ($a['order'] ?? 999) <=> ($b['order'] ?? 999));
?>

<?php if (!empty($productItems)): ?>
    <section
        aria-labelledby="home-products-heading"
        class="border-t border-slate-100 bg-white py-10 sm:py-12"
    >
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <div class="max-w-xl">
                    <h2
                        id="home-products-heading"
                        class="text-sm font-semibold uppercase tracking-[0.16em] text-slate-500"
                    >
                        Products built &amp; run by QalbIT
                    </h2>
                    <p class="mt-2 text-xs sm:text-sm text-slate-600">
                        We don’t just build for clients – we ship and operate our own SaaS products too.
                    </p>
                </div>

                <a
                    href="<?= route_url('/products/') ?>"
                    class="inline-flex items-center text-sm font-medium text-sky-700 hover:text-sky-600"
                    title="Explore all QalbIT products"
                >
                    Explore all products
                    <span class="ml-1 inline-block translate-y-px" aria-hidden="true">→</span>
                </a>
            </div>

            <ul class="mt-5 grid gap-3 sm:grid-cols-2 lg:grid-cols-4">
                <?php foreach ($productItems as $product): ?>
                    <li>
                        <a
                            href="<?= route_url('/products/' . trim($product['slug'], '/') . '/') ?>"
                            title="<?= htmlspecialchars(($product['name'] ?? 'Product') . ' – ' . ($product['tagline'] ?? 'QalbIT product')) ?>"
                            class="group flex flex-col rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 transition-colors hover:border-sky-300 hover:bg-sky-50"
                        >
                            <span class="text-sm font-semibold text-slate-900 group-hover:text-sky-700">
                                <?= htmlspecialchars($product['name'] ?? '') ?>
                            </span>
                            <span class="mt-0.5 text-xs text-slate-500">
                                <?= htmlspecialchars($product['tagline'] ?? '') ?>
                            </span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>
<?php endif; ?>
