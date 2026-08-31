<?php

namespace App\Support;

class View
{
    /**
     * Absolute path of a template, without asserting that it exists.
     */
    private static function path(string $template): string
    {
        return __DIR__ . '/../../resources/views/' . $template . '.php';
    }

    /**
     * Whether a template file is present. Lets callers fall back to a shared
     * template instead of throwing when an optional one is not there.
     */
    public static function exists(string $template): bool
    {
        return is_file(self::path($template));
    }

    public static function render(string $template, array $data = [])
    {
        $viewFile = self::path($template);

        if (!file_exists($viewFile)) {
            throw new \RuntimeException("View [{$template}] not found.");
        }

        // Extract data into variables
        extract($data, EXTR_SKIP);

        // Start output buffering
        ob_start();

        include $viewFile;

        // Get buffered content
        return ob_get_clean();
    }
}