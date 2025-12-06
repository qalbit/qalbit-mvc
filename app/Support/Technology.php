<?php

namespace App\Support;

class Technology
{
    private static function config(): array
    {
        return config('technologies', []);
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

    public static function allForHome(): array
    {
        $config = self::config();
        $items = $config ?? [];

        // Filter enabled
        $items = array_filter($items, function (array $item): bool {
            if (array_key_exists('enabled', $item)) {
                if (array_key_exists('show_home', $item)) {
                    return (bool) $item['show_home'];
                }
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