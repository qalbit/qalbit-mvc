<?php
/** @var array $industry */
$industry = $industry ?? [];
$faqs     = $faqs     ?? [];
?>

<?php include __DIR__ . '/../../partials/industries/industry-hero.php' ?>

<?php include __DIR__ . '/../../partials/industries/industry-overview.php' ?>

<?php include __DIR__ . '/../../partials/industries/industry-capabilities.php' ?>

<?php include __DIR__ . '/../../partials/industries/industry-process.php' ?>

<?php include __DIR__ . '/../../partials/industries/industry-use-cases.php' ?>

<?php include __DIR__ . '/../../partials/industries/industry-tech-stack.php' ?>

<?php if (!empty($faqs)): ?>
    <?php
        $title = $service['faq_title']
            ?? ('Frequently asked questions about ' . ($service['name'] ?? 'our services'));

        $subtitle = $service['faq_subtitle']
            ?? ('These are some of the questions we usually answer on early calls for '
                . strtolower($service['name'] ?? 'projects') . '.');

        include __DIR__ . '/../../partials/faq/section.php';
    ?>
<?php endif; ?>

<?php include __DIR__ . '/../../partials/industries/industry-cta.php'; ?>