<?php

namespace App\Controllers;

use App\Support\PageCache;
use App\Support\Product;
use App\Support\Schema;
use App\Support\View;

class ProductController
{
    private const CACHE_TTL        = 900; // 15 minutes
    private const CACHE_KEY_INDEX  = 'page_products';
    private const CACHE_KEY_PREFIX = 'page_product_';

    /**
     * Products index: /products/
     */
    public function index(): string
    {
        return PageCache::remember(
            self::CACHE_KEY_INDEX,
            self::CACHE_TTL,
            fn (): string => $this->renderIndexPage()
        );
    }

    /**
     * Individual product case study: /products/{slug}/
     */
    public function show(string $slug): string
    {
        $product = Product::find($slug);

        if (!$product) {
            http_response_code(404);
            return (new ErrorController())->notFound();
        }

        $cacheKey = self::CACHE_KEY_PREFIX . trim((string) $product['slug'], '/');

        return PageCache::remember(
            $cacheKey,
            self::CACHE_TTL,
            fn (): string => $this->renderShowPage($product)
        );
    }

    private function renderIndexPage(): string
    {
        $baseUrl = rtrim(config('app.url', 'https://qalbit.com'), '/');

        $page     = Product::page();
        $sections = $page['sections'] ?? [];
        $items    = Product::all();

        $seo = [
            'title'       => $page['meta_title']       ?? 'Products by QalbIT',
            'description' => $page['meta_description'] ?? '',
            'canonical'   => $baseUrl . '/products/',
            'image'       => og_image_url('/products/'),
        ];

        $jsonLd = array_values(array_filter([
            Schema::organization(),
            Schema::website(),
            Schema::breadcrumbs([
                ['name' => 'Home', 'url' => '/'],
                ['name' => 'Products', 'url' => '/products/'],
            ]),
        ]));

        $content = View::render('pages/products/index', [
            'seo'      => $seo,
            'page'     => $page,
            'sections' => $sections,
            'items'    => $items,
        ]);

        return View::render('layouts/main', [
            'seo'     => $seo,
            'content' => $content,
            'jsonLd'  => $jsonLd,
            'pageId'  => 'products',
        ]);
    }

    private function renderShowPage(array $product): string
    {
        $baseUrl = rtrim(config('app.url', 'https://qalbit.com'), '/');

        $slug          = trim((string) $product['slug'], '/');
        $canonicalPath = '/products/' . $slug . '/';
        $canonical     = $baseUrl . $canonicalPath;

        $seo = [
            'title'       => $product['meta_title']       ?? (($product['name'] ?? 'Product') . ' – Case Study | QalbIT'),
            'description' => $product['meta_description'] ?? '',
            'canonical'   => $canonical,
            'image'       => og_image_url($canonicalPath),
        ];

        $jsonLd = array_values(array_filter([
            Schema::organization(),
            Schema::website(),
            Schema::breadcrumbs([
                ['name' => 'Home', 'url' => '/'],
                ['name' => 'Products', 'url' => '/products/'],
                ['name' => $product['name'] ?? 'Product', 'url' => $canonicalPath],
            ]),
            Schema::softwareApplication($product, $canonical),
        ]));

        // Prefer a bespoke per-product view (e.g. pages/products/show-urlcrop.php)
        // and fall back to the shared template.
        $slugView = 'pages/products/show-' . trim((string) $product['slug'], '/');
        $viewFile = __DIR__ . '/../../resources/views/' . $slugView . '.php';
        $template = is_file($viewFile) ? $slugView : 'pages/products/show';

        $content = View::render($template, [
            'seo'     => $seo,
            'product' => $product,
        ]);

        return View::render('layouts/main', [
            'seo'     => $seo,
            'content' => $content,
            'jsonLd'  => $jsonLd,
            'pageId'  => 'product-detail',
        ]);
    }
}
