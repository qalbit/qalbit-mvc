<?php

namespace App\Support;

class View
{
    public static function render(string $template, array $data = [])
    {
        $viewFile = __DIR__ . '/../../resources/views/' . $template . '.php';

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