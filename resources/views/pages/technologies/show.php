<?php
/** @var array $technology */
$technology = $technology ?? [];
$faqs    = $faqs    ?? [];
?>

<?php include __DIR__ . '/../../partials/technologies/technology-hero.php'; ?>

<?php include __DIR__ . '/../../partials/technologies/technology-overview.php'; ?>

<?php include __DIR__ . '/../../partials/technologies/technology-capabilities.php'; ?>

<?php include __DIR__ . '/../../partials/technologies/technology-process.php'; ?>

<?php include __DIR__ . '/../../partials/technologies/technology-use-cases.php'; ?>

<?php include __DIR__ . '/../../partials/technologies/technology-tech-stack.php'; ?>

<?php if (!empty($faqs)): ?>
    <?php
        $title = $technology['faq_title']
            ?? ('Frequently asked questions about ' . ($technology['name'] ?? 'our technologies'));

        $subtitle = $technology['faq_subtitle']
            ?? ('These are some of the questions we usually answer on early calls for '
                . strtolower($technology['name'] ?? 'projects') . '.');

        include __DIR__ . '/../../partials/faq/section.php';
    ?>
<?php endif; ?>

<?php include __DIR__ . '/../../partials/technologies/technology-cta.php'; ?>
