<?php

namespace App\Support;

class WordPressClient
{
    private string $apiBase;
    private int $timeout;

    public function __construct(?string $apiBase = null, ?int $timeout = null)
    {
        $config       = config('wordpress', []);
        $this->apiBase = $apiBase ?: rtrim($config['api_base'] ?? '', '/');
        $this->timeout = $timeout ?? (int)($config['timeout'] ?? 3);
    }

    /**
     * Fetch recent posts from WordPress.
     *
     * @param int      $limit       Number of posts to fetch.
     * @param int|null $categoryId  Optional WP category ID to filter by.
     *
     * @return array Simplified posts: [id, title, excerpt, url, date, featured_image]
     */
    public function fetchRecentPosts(int $limit = 3, ?int $categoryId = null): array
    {
        if (empty($this->apiBase)) {
            return [];
        }

        $params = [
            'per_page' => max(1, min($limit, 10)),
            '_embed'   => 1,
        ];

        if ($categoryId !== null) {
            $params['categories'] = $categoryId;
        }

        $url = $this->apiBase . '/posts?' . http_build_query($params);

        $context = stream_context_create([
            'http' => [
                'method'  => 'GET',
                'timeout' => $this->timeout,
                'header'  => "Accept: application/json\r\n",
            ]
        ]);

        try {
            $response = @file_get_contents($url, false, $context);
            if ($response === false) {
                return [];
            }

            $data = json_decode($response, true);
            if (!is_array($data)) {
                return [];
            }

            $posts = [];
            foreach ($data as $item) {
                $posts[] = $this->mapPost($item);
            }

            return $posts;
        } catch (\Throwable $e) {
            // Fail silently for now – page should still load
            return [];
        }
    }

    /**
     * Map raw WP post into a simple array we use in views.
     */
    private function mapPost(array $item): array
    {
        $titleRendered   = $item['title']['rendered'] ?? '';
        $excerptRendered = $item['excerpt']['rendered'] ?? '';
        $link            = $item['link'] ?? '';

        // Strip HTML tags from excerpt for listing
        $excerptText = trim(strip_tags($excerptRendered));

        // Try to get featured image URL from _embedded
        $featuredImage = null;
        if (!empty($item['_embedded']['wp:featuredmedia'][0]['source_url'])) {
            $featuredImage = $item['_embedded']['wp:featuredmedia'][0]['source_url'];
        }

        return [
            'id'              => $item['id'] ?? null,
            'title'           => html_entity_decode(strip_tags($titleRendered), ENT_QUOTES | ENT_HTML5, 'UTF-8'),
            'excerpt'         => $excerptText,
            'url'             => $link,
            'date'            => $item['date'] ?? null,
            'featured_image'  => $featuredImage,
        ];
    }
}
