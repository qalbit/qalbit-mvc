<?php
/**
 * Careers index page
 *
 * Expects:
 * - $page          (array) from config('careers.page')
 * - $sections      (array) from config('careers.sections')
 * - $openings      (array) from Careers::allOpenings()
 * - $featuredRoles (array) from Careers::featured()
 * - $faqs          (array) from Faqs::for($page['faq_key'])
 */

$page          = $page          ?? [];
$sections      = $sections      ?? [];
$openings      = $openings      ?? [];
$featuredRoles = $featuredRoles ?? [];
$faqs          = $faqs          ?? [];
?>

<?php
include __DIR__ . '/../../partials/careers/hero.php';

include __DIR__ . '/../../partials/careers/why-qalbit.php';

include __DIR__ . '/../../partials/careers/openings.php';

include __DIR__ . '/../../partials/careers/benefits.php';

include __DIR__ . '/../../partials/careers/life.php';

if (!empty($faqs)) {
    $title    = $page['faq_title']
        ?? 'Frequently asked questions about careers at QalbIT';
    $subtitle = $page['faq_subtitle']
        ?? 'These are the questions developers, designers and product folks usually ask before applying.';

    include __DIR__ . '/../../partials/faq/section.php';
}

include __DIR__ . '/../../partials/careers/final-cta.php';
