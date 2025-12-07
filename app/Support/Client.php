<?php

namespace App\Support;

class Client
{
    private static function config(): array
    {
        return config('clients', []);
    }

    /**
     * Get all enabled clients, sorted by `order`.
     */
    public static function all(): array
    {
        $config = self::config();
        $items  = $config ?? [];

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

    /**
     * Generic helper to retrieve logos for any section (Contact, About, etc.).
     *
     * - If $ids is provided → returns only those clients, in the same order as $ids.
     * - If $ids is empty/null → returns the first $limit clients from the global list.
     *
     * @param string[]|null $ids   Client IDs e.g. ['snappystats', 'bloomford']
     * @param int|null      $limit Max number of items to return
     */
    public static function logos(?array $ids = null, ?int $limit = null): array
    {
        $all = self::all();

        // If specific IDs are provided, pick those in given order
        if (is_array($ids) && !empty($ids)) {
            $selected = [];

            foreach ($ids as $id) {
                if (isset($all[$id])) {
                    $selected[$id] = $all[$id];
                }
            }
        } else {
            // Otherwise start from the full sorted list
            $selected = $all;
        }

        if ($limit !== null && $limit > 0) {
            $selected = array_slice($selected, 0, $limit, true);
        }

        return $selected;
    }
}
