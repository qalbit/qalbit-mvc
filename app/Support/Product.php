<?php

namespace App\Support;

class Product
{
    private static function config(): array
    {
        return config('products', []);
    }

    /**
     * All enabled products, sorted by "order".
     */
    public static function all(): array
    {
        $config = self::config();
        $items  = $config['items'] ?? [];

        $items = array_filter($items, function (array $item): bool {
            if (array_key_exists('enabled', $item)) {
                return (bool) $item['enabled'];
            }
            return true;
        });

        uasort($items, function (array $a, array $b): int {
            $orderA = $a['order'] ?? 999;
            $orderB = $b['order'] ?? 999;
            if ($orderA === $orderB) {
                return strcmp($a['name'] ?? '', $b['name'] ?? '');
            }
            return $orderA <=> $orderB;
        });

        return $items;
    }

    /**
     * Find a single enabled product by its slug segment.
     */
    public static function find(string $slug): ?array
    {
        $slug = trim($slug, '/');

        foreach (self::all() as $item) {
            if (($item['slug'] ?? null) === $slug) {
                return $item;
            }
        }

        return null;
    }

    /**
     * Page-level config for the /products/ index.
     */
    public static function page(): array
    {
        $config = self::config();
        return $config['page'] ?? [];
    }
}
