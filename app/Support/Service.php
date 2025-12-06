<?php

namespace App\Support;

class Service
{
    private static function config(): array
    {
        return config('services', []);
    }

    public static function all(): array
    {
        $config = self::config();
        $items = $config ?? [];

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
}