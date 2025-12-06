<?php
/** @var array $process */
$process = $process ?? [];
$faqs    = $faqs    ?? [];
?>

<?php include __DIR__ . '/../../partials/process/section-hero-process.php'; ?>

<?php include __DIR__ . '/../../partials/process/section-fit-process.php'; ?>

<?php include __DIR__ . '/../../partials/process/section-service-process.php'; ?>

<?php include __DIR__ . '/../../partials/process/section-process-process.php'; ?>

<?php include __DIR__ . '/../../partials/process/section-engagements-process.php'; ?>

<?php include __DIR__ . '/../../partials/process/section-proof-process.php'; ?>

<?php include __DIR__ . '/../../partials/process/section-tech-process.php'; ?>

<?php include __DIR__ . '/../../partials/process/section-why-process.php'; ?>

<?php if (!empty($faqs)): ?>
    <?php
        $title = $process['faq_title']
            ?? ('Frequently asked questions about ' . ($process['name'] ?? 'our process'));

        $subtitle = $process['faq_subtitle']
            ?? ('These are some of the questions we usually answer on early calls for '
                . strtolower($process['name'] ?? 'projects') . '.');

        $bullets = $process['faq_bullets'] ?? [];

        include __DIR__ . '/../../partials/faq/section.php';
    ?>
<?php endif; ?>

<?php include __DIR__ . '/../../partials/process/section-cta-process.php'; ?>