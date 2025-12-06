<?php

namespace App\Support;

class Portfolio
{
    private static function config(): array
    {
        return config('portfolio', []);
    }

    public static function all(): array
    {
        $config = self::config();
        $items = $config['items'] ?? [];

        // Filter enabled
        $items = array_filter($items, function (array $item): bool {
            if (array_key_exists('enabled', $item)) {
                return (bool) $item['enabled'];
            }
            return true;
        });

        // Sort by 'order'
        uasort($items, function (array $a, array $b): int {
            $orderA = $a['order'] ?? 999;
            $orderB = $b['order'] ?? 999;
            return $orderA <=> $orderB;
        });

        return $items;
    }

    public static function industries(): array
    {
        $config = self::config();
        return $config['industries'] ?? [];
    }

    public static function technologies(): array
    {
        $config = self::config();
        return $config['technologies'] ?? [];
    }

    /**
     * Filter portfolio items by optional industry and technology slugs.
     */
    public static function filter(?string $industry = null, ?string $technology = null): array
    {
        $items = self::all();

        if ($industry === null && $technology === null) {
            return $items;
        }

        $filtered = [];

        foreach ($items as $key => $item) {
            $itemIndustries   = $item['industries'] ?? [];
            $itemTechnologies = $item['technologies'] ?? [];

            if ($industry !== null && $industry !== '') {
                if (!in_array($industry, $itemIndustries, true)) {
                    continue;
                }
            }

            if ($technology !== null && $technology !== '') {
                if (!in_array($technology, $itemTechnologies, true)) {
                    continue;
                }
            }

            $filtered[$key] = $item;
        }

        return $filtered;
    }

    /**
     * Return featured portfolio items, sorted by "order".
     *
     * @param int|null $limit  Max number of items to return (null = no limit)
     * @return array
     */
    public static function featured(?int $limit = 6): array
    {
        // All items from config
        $config = config('portfolio', []);
        $items  = $config['items'] ?? [];

        // Keep only enabled + featured
        $featured = array_filter($items, function (array $item): bool {
            if (empty($item['enabled'])) {
                return false;
            }

            if (empty($item['featured'])) {
                return false;
            }

            return true;
        });

        // Sort by "order" ascending (fallback 999)
        uasort($featured, function (array $a, array $b): int {
            $orderA = $a['order'] ?? 999;
            $orderB = $b['order'] ?? 999;

            if ($orderA === $orderB) {
                // Stable-ish secondary sort by name
                return strcmp($a['name'] ?? '', $b['name'] ?? '');
            }

            return $orderA <=> $orderB;
        });

        if ($limit !== null && $limit > 0) {
            // Preserve keys, but usually you will iterate over values only
            $featured = array_slice($featured, 0, $limit, true);
        }

        return $featured;
    }
}
