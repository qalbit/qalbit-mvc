<?php

use App\Support\Router;

// Load Composer autoloader
require __DIR__ . '/../vendor/autoload.php';

// Additional Helper autoloader
require __DIR__ . '/../app/Support/helpers.php';

// Load config helper
function config(string $key, $default = null) {
    static $config = [];

    if (empty($config)) {
        // Load all config files
        foreach (glob(__DIR__ . '/../config/*.php') as $file) {
            $name = basename($file, '.php');
            $config[$name] = require $file;
        }
    }

    [$file, $path] = array_pad(explode('.', $key, 2), 2, null);

    if (!isset($config[$file])) {
        return $default;
    }

    if ($path === null) {
        return $config[$file];
    }

    $value = $config[$file];
    foreach (explode('.', $path) as $segment) {
        if (!is_array($value) || !array_key_exists($segment, $value)) {
            return $default;
        }
        $value = $value[$segment];
    }

    return $value;
}

// Basic error reporting based on env
$appEnv = config('app.env', 'local');
$appDebug = config('app.debug', false);

if ($appEnv !== 'production' && $appDebug) {
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
} else {
    error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
    ini_set('display_errors', '0');
}

date_default_timezone_set(config('app.timezone', 'UTC'));

// Instantiate Router (we'll create this class next)
$router = new Router();

return $router;