<?php

namespace App\Support;

class Reviews
{
    /**
     * Return all reviews from config.
     */
    public static function all(): array
    {
        return config('reviews', []);
    }

    /**
     * Find reviews by context (page), with optional industry / technology / limit filters.
     *
     * @param string      $context   e.g. "home", "service_custom_software", "products_urlcrop"
     * @param string|null $industry  e.g. "Healthcare / Wellness" or an internal slug you choose
     * @param string|null $technology e.g. "Laravel"
     * @param int|null    $limit     max number of reviews
     *
     * @return array
     */
    public static function find(
        string $context,
        ?string $industry = null,
        ?string $technology = null,
        ?int $limit = null
    ): array {
        $all = self::all();

        $filtered = array_filter($all, function (array $review) use ($context, $industry, $technology): bool {
            // 1) Context filter
            $contexts = $review['contexts'] ?? [];

            // If contexts are defined and context not in list → skip
            if (!empty($contexts) && !in_array($context, $contexts, true)) {
                return false;
            }

            // 2) Optional industry filter (simple string match for now)
            if ($industry !== null) {
                $reviewIndustry = $review['industry'] ?? '';
                if (stripos($reviewIndustry, $industry) === false) {
                    return false;
                }
            }

            // 3) Optional technology filter
            if ($technology !== null) {
                $techList = $review['technologies'] ?? [];
                // case-insensitive match
                $found = false;
                foreach ($techList as $tech) {
                    if (strcasecmp($tech, $technology) === 0) {
                        $found = true;
                        break;
                    }
                }
                if (!$found) {
                    return false;
                }
            }

            return true;
        });

        // We can sort featured ones first
        uasort($filtered, function (array $a, array $b): int {
            $aFeatured = !empty($a['featured']);
            $bFeatured = !empty($b['featured']);

            if ($aFeatured === $bFeatured) {
                return 0;
            }
            return $aFeatured ? -1 : 1;
        });

        if ($limit !== null && $limit > 0) {
            $filtered = array_slice($filtered, 0, $limit, true);
        }

        return $filtered;
    }

    public static function testimonials(
        string $context,
        ?string $industry = null,
        ?string $technology = null,
        ?int $limit = null
    ): array {
        // Reuse the existing filter logic
        $reviews = self::find($context, $industry, $technology, $limit);

        $items = [];

        foreach ($reviews as $review) {
            $quote = $review['quote'] ?? '';

            if ($quote === '') {
                continue;
            }

            $role = '';
            if (!empty($review['author_role'])) {
                $role = $review['author_role'];
            } elseif (!empty($review['author_name']) && !empty($review['company'])) {
                $role = $review['author_name'] . ', ' . $review['company'];
            } elseif (!empty($review['author_name'])) {
                $role = $review['author_name'];
            } elseif (!empty($review['company'])) {
                $role = $review['company'];
            }

            // Region – expect a "region" key in reviews config.
            // Fallbacks if you decide to store it differently later.
            $region = $review['region']
                ?? ($review['location'] ?? '');

            $items[] = [
                'quote'  => $quote,
                'role'   => $role,
                'region' => $region,
            ];
        }

        return $items;
    }
}
