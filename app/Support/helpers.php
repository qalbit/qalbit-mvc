<?php

if (! function_exists('asset')) {
    function asset(string $path): string
    {
        // base URL from config, e.g. https://qalbit.com or http://qalbit.test
        $base = rtrim(config('app.url', ''), '/');

        // normalize leading slash
        $path = ltrim($path, '/');

        return $base . '/assets/' . $path;
    }
}

if (! function_exists('route_url')) {
    /**
     * Generate an absolute URL for an internal route, or pass through external URLs.
     *
     * Examples:
     *  route_url('/')                              -> https://qalbit.com/
     *  route_url('contact-us')                     -> https://qalbit.com/contact-us
     *  route_url('/services/ai-solutions')         -> https://qalbit.com/services/ai-solutions
     *  route_url('blog', ['page' => 2])            -> https://qalbit.com/blog?page=2
     *  route_url('https://google.com')             -> https://google.com
     *  route_url('https://x.com/qalb_it', ['ref'=>'qalbit'])
     *                                             -> https://x.com/qalb_it?ref=qalbit
     */
    function route_url(string $path = '/', array $params = []): string
    {
        // If already absolute URL, protocol-relative, or special scheme, return as-is.
        if (
            preg_match('#^https?://#i', $path) ||   // http:// or https://
            str_starts_with($path, '//') ||         // //example.com
            str_starts_with($path, 'mailto:') ||    // mailto:...
            str_starts_with($path, 'tel:') ||       // tel:...
            str_starts_with($path, '#')             // #anchor
        ) {
            $url = $path;
        } else {
            $base = rtrim(config('app.url', ''), '/');
            $path = '/' . ltrim($path, '/');
            $url  = $base . $path;
        }

        if (! empty($params)) {
            $query = http_build_query($params);
            $url  .= (str_contains($url, '?') ? '&' : '?') . $query;
        }

        return $url;
    }
}

if (! function_exists('nav_meta')) {
    /**
     * Resolve icon + short description for a navigation child link by looking up
     * its source config (single source of truth), so mega-menu panels stay in
     * sync with the services/technologies/industries/products configs.
     *
     * Returns ['icon' => string|null, 'desc' => string].
     */
    function nav_meta(string $url): array
    {
        static $cache = [];

        $path = '/' . trim(parse_url($url, PHP_URL_PATH) ?: $url, '/') . '/';

        if (array_key_exists($path, $cache)) {
            return $cache[$path];
        }

        // Map URL prefix -> [config key, description field]
        $map = [
            '/services/'     => ['services', 'short_description'],
            '/technologies/' => ['technologies', 'tagline'],
            '/industries/'   => ['industries', 'meta_description'],
            '/products/'     => ['products', 'valueProp'],
        ];

        $meta = ['icon' => null, 'desc' => ''];

        foreach ($map as $prefix => [$configKey, $descField]) {
            if (!str_starts_with($path, $prefix)) {
                continue;
            }

            // products config nests items under 'items'
            $items = $configKey === 'products'
                ? (config('products.items', []) ?? [])
                : (config($configKey, []) ?? []);

            foreach ($items as $key => $row) {
                if (!is_array($row)) {
                    continue;
                }

                // Normalise the entry's own slug/path for comparison.
                $entrySlug = $row['slug'] ?? $key;
                if ($configKey === 'products') {
                    $entryPath = '/products/' . trim((string) $entrySlug, '/') . '/';
                } else {
                    $entryPath = '/' . trim((string) $entrySlug, '/') . '/';
                }

                if ($entryPath !== $path) {
                    continue;
                }

                $desc = trim((string) ($row[$descField] ?? ($row['tagline'] ?? ($row['summary'] ?? ''))));
                // Trim to a whole-word boundary; CSS line-clamp handles the final visual clamp.
                if (mb_strlen($desc) > 120) {
                    $cut = mb_substr($desc, 0, 120);
                    $lastSpace = mb_strrpos($cut, ' ');
                    if ($lastSpace !== false && $lastSpace > 80) {
                        $cut = mb_substr($cut, 0, $lastSpace);
                    }
                    $desc = rtrim($cut, " ,.;:–-") . '…';
                }

                $icon = !empty($row['icon']) ? $row['icon'] : null;

                // Some icon sets (industries) ship a white variant for dark
                // backgrounds; on the light mega-menu prefer the coloured
                // "-dark" sibling when it exists on disk.
                if ($icon && !str_contains($icon, '-dark') && str_ends_with($icon, '.svg')) {
                    $darkVariant = substr($icon, 0, -4) . '-dark.svg';
                    $diskPath    = __DIR__ . '/../../public/assets/' . ltrim($darkVariant, '/');
                    if (is_file($diskPath)) {
                        $icon = $darkVariant;
                    }
                }

                $meta = [
                    'icon' => $icon,
                    'desc' => $desc,
                ];
                break 2;
            }

            break;
        }

        return $cache[$path] = $meta;
    }
}
