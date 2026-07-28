<?php

namespace App\Support;

class PageCache
{
    // Default TTL: 15 minutes
    private const DEFAULT_TTL = 900; // seconds

    /**
     * Query parameters that describe where a visitor came from but change
     * nothing about the page. They are dropped from the cache key entirely, so
     * every campaign variant of a URL shares one cached render.
     */
    private const TRACKING_PARAMS = [
        'utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content',
        'gclid', 'fbclid', 'msclkid', 'mc_cid', 'mc_eid', '_gl', 'ref',
    ];

    /**
     * Query parameters that genuinely change the rendered HTML — portfolio and
     * career filters, and the lead-tracking pair the contact partials render
     * into hidden inputs. These become part of the cache key so each variant
     * gets its own entry instead of the whole URL bypassing the cache.
     */
    private const VARIANT_PARAMS = [
        'topic', 'source',                                  // contact form prefill
        'industry', 'tech',                                 // portfolio filters
        'team', 'experience', 'location', 'type', 'role',   // career filters
    ];

    /** Longest accepted variant value. */
    private const VARIANT_MAX_LEN = 64;

    /**
     * Ceiling on cached files. Variant values are attacker-supplied, so
     * without a cap a bot could mint unlimited distinct keys and fill the
     * disk. Past the cap we render fresh rather than cache.
     */
    private const MAX_CACHE_FILES = 400;

    /** Directory where cached HTML files are stored. */
    private static ?string $cacheDir = null;
    
    public static function init(?string $dir = null): void
    {
        if (self::$cacheDir !== null) return;

        // Adjust path to your project structure
        self::$cacheDir = $dir ?: dirname(__DIR__, 2) . '/storage/cache/pages';

        if (!is_dir(self::$cacheDir)) {
            @mkdir(self::$cacheDir, 0775, true);
        }
    }

    private static function fileForKey(string $key): string
    {
        self::init();

        // Make sure key is filesystem-safe
        $safeKey = preg_replace('~[^a-zA-Z0-9_\-]+~', '_', $key);

        return self::$cacheDir . '/' . $safeKey . '.html';
    }

    /**
     * Is this query parameter value safe to put in a cache key?
     *
     * Deliberately strict. These values reach us from the URL, so anything
     * that is not a short slug is treated as unknown and sends the request
     * down the uncached path rather than being sanitised into a key.
     */
    private static function isCacheableValue($value): bool
    {
        return is_string($value)
            && $value !== ''
            && strlen($value) <= self::VARIANT_MAX_LEN
            && preg_match('/^[A-Za-z0-9_-]+$/', $value) === 1;
    }

    /**
     * Conditions when we should NOT serve cached HTML.
     *
     * This used to bypass the cache for *any* query string, which meant the
     * ~400 /contact-us/?topic=… and /portfolio/?industry=… URLs rendered from
     * scratch on every single hit — they dominated the slow-page report in the
     * 28 Jul audit. Now only genuinely unknown input bypasses.
     */
    public static function shouldBypass(): bool
    {
        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        if ($method !== 'GET') return true;

        // Logged-in admins always see a fresh render.
        if (!empty($_SESSION['admin_id'] ?? null)) return true;

        foreach ($_GET as $key => $value) {
            // Campaign tags change nothing on the page.
            if (in_array($key, self::TRACKING_PARAMS, true)) {
                continue;
            }

            // Anything we have not accounted for might change the response in
            // a way this key scheme cannot express — including ?ajax=1, which
            // returns JSON. Bypass rather than guess.
            if (!in_array($key, self::VARIANT_PARAMS, true)) {
                return true;
            }

            if (!self::isCacheableValue($value)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Cache-key suffix for the variant-producing parameters on this request.
     *
     * Built from a fixed parameter order, so ?topic=a&source=b and
     * ?source=b&topic=a resolve to the same entry. Empty for a clean URL,
     * which keeps existing keys byte-identical to before this change.
     */
    public static function variantSuffix(): string
    {
        $parts = [];

        foreach (self::VARIANT_PARAMS as $param) {
            $value = $_GET[$param] ?? null;

            if (self::isCacheableValue($value)) {
                $parts[] = $param . '-' . $value;
            }
        }

        return $parts === [] ? '' : '__' . implode('_', $parts);
    }

    /**
     * Is there room for another variant entry?
     *
     * Only consulted when writing a variant key, so the scan costs nothing on
     * the clean-URL path. On hitting the ceiling it sweeps expired entries
     * first — otherwise one bot cycling junk filter values could fill the
     * directory and lock genuine variants out of the cache until every entry
     * happened to be re-read.
     */
    private static function hasRoomForVariant(int $ttl): bool
    {
        self::init();

        $files = glob(self::$cacheDir . '/*.html') ?: [];

        if (count($files) < self::MAX_CACHE_FILES) {
            return true;
        }

        $cutoff = time() - $ttl;
        $live   = 0;

        foreach ($files as $file) {
            if (filemtime($file) < $cutoff) {
                @unlink($file);
                continue;
            }
            $live++;
        }

        return $live < self::MAX_CACHE_FILES;
    }

    public static function get(string $key, int $ttl = self::DEFAULT_TTL): ?string
    {
        $file = self::fileForKey($key);

        if (!is_file($file)) return null;

        if (filemtime($file) + $ttl < time()) {
            @unlink($file);
            return null;
        }

        $html = file_get_contents($file);

        return ($html === false) ? null : $html;
    }

    public static function put(string $key, string $html): void
    {
        $file = self::fileForKey($key);

        // Minify HTML before saving to cache
        $content = HtmlMinifier::minify($html, true);

        file_put_contents($file, $content, LOCK_EX);
    }

    /**
     * Convenience wrapper: return cached HTML if fresh, otherwise
     * render via callback and cache the result.
     */
    public static function remember(string $key, int $ttl, callable $callback): string
    {
        $bypass   = self::shouldBypass();
        $cacheKey = $key . self::variantSuffix();

        if (!$bypass) {
            $cached = self::get($cacheKey, $ttl);
            if ($cached !== null) {
                return $cached;
            }
        }

        $html = $callback();

        if (!$bypass) {
            // A variant entry is only worth writing while there is room for it.
            // Clean URLs keep their slot regardless: they are a fixed, known set
            // and are what the cache warmer populates.
            $isVariant = $cacheKey !== $key;

            if (!$isVariant || self::hasRoomForVariant($ttl)) {
                self::put($cacheKey, $html);
            }
        }

        return $html;
    }
}