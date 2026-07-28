<?php

namespace App\Support;

class Session
{
    public static function put(string $key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    public static function get(string $key, $default = null)
    {
        return $_SESSION[$key] ?? $default;
    }

    public static function forget(string $key): void
    {
        unset($_SESSION[$key]);
    }

    /**
     * Flash data for the next request only.
     */
    public static function flash(string $key, $value): void
    {
        if (!isset($_SESSION['_flash']) || !is_array($_SESSION['_flash'])) {
            $_SESSION['_flash'] = [];
        }

        $_SESSION['_flash'][$key] = $value;
    }

    public static function getFlash(string $key, $default = null)
    {
        if (!empty($_SESSION['_flash'][$key])) {
            $value = $_SESSION['_flash'][$key];
            unset($_SESSION['_flash'][$key]);

            // Drop the container once the last item leaves, so a consumed
            // session reads as genuinely empty. The front controller uses that
            // to expire the cookie and put the visitor back on the cacheable
            // path; an empty '_flash' array left lying around would keep them
            // on no-store responses indefinitely.
            if (empty($_SESSION['_flash'])) {
                unset($_SESSION['_flash']);
            }

            return $value;
        }

        return $default;
    }
}
