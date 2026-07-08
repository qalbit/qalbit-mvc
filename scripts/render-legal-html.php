<?php
/**
 * Renders legal pages to static HTML for Next.js import.
 * Run from apps/web: php scripts/render-legal-html.php
 */
declare(strict_types=1);

$ROOT = dirname(__DIR__, 3);
chdir($ROOT);
require $ROOT . '/bootstrap/env.php';

function render(string $view, array $vars = []): string {
    global $ROOT;
    extract($vars);
    ob_start();
    include $ROOT . '/resources/views/' . $view;
    return ob_get_clean();
}

$outDir = __DIR__ . '/../components/legacy-html/legal';
if (!is_dir($outDir)) {
    mkdir($outDir, 0755, true);
}

$pages = [
    'cookie-policy' => 'pages/legal/cookie-policy.php',
    'privacy-policy' => 'pages/legal/privacy-policy.php',
    'terms-and-condition' => 'pages/legal/terms-of-service.php',
];

foreach ($pages as $name => $view) {
    $html = render($view, []);
    $file = $outDir . '/' . $name . '.html';
    file_put_contents($file, $html);
    echo "Written $file (" . strlen($html) . " bytes)\n";
}

echo "Done.\n";
