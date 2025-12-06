<?php
/** @var array $role */
$service = $role ?? [];
$faqs = $faqs    ?? [];
?>

<?php include __DIR__ . '/../../partials/services/service-hero.php'; ?>

<?php include __DIR__ . '/../../partials/services/service-overview.php'; ?>

<?php include __DIR__ . '/../../partials/services/service-capabilities.php'; ?>

<?php include __DIR__ . '/../../partials/services/service-process.php'; ?>

<?php include __DIR__ . '/../../partials/services/service-use-cases.php'; ?>

<?php include __DIR__ . '/../../partials/services/service-tech-stack.php'; ?>

<?php if (!empty($faqs)): ?>
    <?php
        $title = $service['faq_title']
            ?? ('Frequently asked questions about ' . ($service['name'] ?? 'our services'));

        $subtitle = $service['faq_subtitle']
            ?? ('These are some of the questions we usually answer on early calls for '
                . strtolower($service['name'] ?? 'projects') . '.');

        $bullets = $service['faq_bullets'] ?? [];

        include __DIR__ . '/../../partials/faq/section.php';
    ?>
<?php endif; ?>

<?php include __DIR__ . '/../../partials/services/service-cta.php'; ?>