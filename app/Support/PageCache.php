<?php

namespace App\Support;

class PageCache
{
    // Default TTL: 15 minutes
    private const DEFAULT_TTL = 900; // seconds

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
     * Conditions when we should NOT serve cached HTML.
     * Adjust as needed (eg. admin session cookie).
     */
    public static function shouldBypass(): bool
    {
        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        if ($method !== 'GET') return true;

        // Don't cache pages with query parameters
        if (!empty($_GET)) return true;

        // Example: skip cache for logged-in admins
        if (!empty($_SESSION['admin_id'] ?? null)) return true;

        return false;
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
        if (!self::shouldBypass()) {
            $cached = self::get($key, $ttl);
            if ($cached !== null) {
                return $cached;
            }
        }

        $html = $callback();

        if (!self::shouldBypass()) {
            self::put($key, $html);
        }

        return $html;
    }
}