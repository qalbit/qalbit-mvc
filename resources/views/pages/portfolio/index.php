<?php

/** @var array $page */
/** @var array $sections */
/** @var array $items */
/** @var array $featuredItems */
/** @var array $allIndustries */
/** @var array $allTechnologies */
/** @var string|null $activeIndustry */
/** @var string|null $activeTechnology */

$page             = $page             ?? [];
$sections         = $sections         ?? [];
$items            = $items            ?? [];
$featuredItems    = $featuredItems    ?? [];
$allIndustries    = $allIndustries    ?? [];
$allTechnologies  = $allTechnologies  ?? [];
$activeIndustry   = $activeIndustry   ?? null;
$activeTechnology = $activeTechnology ?? null;
?>

<?php include __DIR__ . '/../../partials/portfolio/section-hero.php'; ?>

<?php include __DIR__ . '/../../partials/portfolio/section-filters.php'; ?>

<?php include __DIR__ . '/../../partials/portfolio/section-featured.php'; ?>

<?php include __DIR__ . '/../../partials/portfolio/section-grid.php'; ?>

<?php if (!empty($faqs)): ?>
    <?php
        $title = $page['faq_title']
            ?? ('Frequently asked questions about ' . ($page['name'] ?? 'our services'));

        $subtitle = $page['faq_subtitle']
            ?? ('These are some of the questions we usually answer on early calls for '
                . strtolower($page['name'] ?? 'projects') . '.');

        $bullets = $page['faq_bullets'] ?? [];

        include __DIR__ . '/../../partials/faq/section.php';
    ?>
<?php endif; ?>

<?php include __DIR__ . '/../../partials/portfolio/section-final-cta.php'; ?>