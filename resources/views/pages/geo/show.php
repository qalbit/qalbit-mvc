<?php
/** @var array $location */
$location = $location ?? [];
$faqs    = $faqs    ?? [];
?>

<?php include __DIR__ . '/../../partials/geo/geo-hero.php'; ?>

<?php include __DIR__ . '/../../partials/geo/geo-about.php'; ?>

<?php include __DIR__ . '/../../partials/geo/geo-services.php'; ?>

<?php include __DIR__ . '/../../partials/geo/geo-why.php'; ?>

<?php include __DIR__ . '/../../partials/geo/geo-process.php'; ?>

<?php include __DIR__ . '/../../partials/geo/geo-engagements.php'; ?>

<?php include __DIR__ . '/../../partials/geo/geo-tech.php'; ?>

<?php include __DIR__ . '/../../partials/geo/geo-proof.php'; ?>

<?php if (!empty($faqs)): ?>
    <?php
        $title = $location['faq_title']
            ?? ('Frequently asked questions about ' . ($location['name'] ?? 'our services'));

        $subtitle = $location['faq_subtitle']
            ?? ('These are some of the questions we usually answer on early calls for '
                . strtolower($location['name'] ?? 'projects') . '.');

        $bullets = $location['faq_bullets'] ?? [];

        include __DIR__ . '/../../partials/faq/section.php';
    ?>
<?php endif; ?>

<?php include __DIR__ . '/../../partials/geo/geo-cta.php'; ?>