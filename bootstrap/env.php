<?php

if (!function_exists('env')) {
    /**
     * Read an environment variable, with optional default.
     */
    function env(string $key, $default = null)
    {
        $value = $_ENV[$key] ?? $_SERVER[$key] ?? getenv($key);

        if ($value === false || $value === null) {
            return $default;
        }

        // Normalise some common string values
        $lower = strtolower($value);

        if (in_array($lower, ['true', '(true)'], true)) {
            return true;
        }

        if (in_array($lower, ['false', '(false)'], true)) {
            return false;
        }

        if (in_array($lower, ['null', '(null)'], true)) {
            return null;
        }

        return $value;
    }
}

/**
 * Very small .env loader.
 * Place your .env file in project root (next to composer.json / bootstrap).
 */
$envFile = dirname(__DIR__) . '/.env';

if (is_file($envFile) && is_readable($envFile)) {
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        $line = trim($line);

        // Skip comments
        if ($line === '' || str_starts_with($line, '#')) {
            continue;
        }

        // KEY=VALUE
        $parts = explode('=', $line, 2);
        if (count($parts) !== 2) {
            continue;
        }

        [$name, $value] = $parts;
        $name  = trim($name);
        $value = trim($value);

        // Strip optional surrounding quotes
        $value = trim($value, "\"'");

        if ($name === '') {
            continue;
        }

        // Do not overwrite explicitly set values
        if (!array_key_exists($name, $_ENV) && !array_key_exists($name, $_SERVER)) {
            $_ENV[$name] = $value;
            putenv($name . '=' . $value);
        }
    }
}
