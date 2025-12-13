<?php
    /** @var array $services */
    /** @var array $faqs */

    $services = $services ?? [];
    $faqs     = $faqs ?? [];
?>

<?php include __DIR__ . '/../../partials/hero/service.php'; ?>

<?php include __DIR__ . '/../../partials/services/section-featured-links.php'; ?>

<?php include __DIR__ . '/../../partials/services/services.php'; ?>

<?php include __DIR__ . '/../../partials/services/models.php'; ?>

<?php include __DIR__ . '/../../partials/services/steps.php'; ?>

<?php include __DIR__ . '/../../partials/services/industries.php'; ?>

<?php include __DIR__ . '/../../partials/services/case-study.php'; ?>

<?php if (!empty($faqs)): ?>
    <?php
        $title    = 'Frequently asked questions about software development with QalbIT';
        $subtitle = 'These are some of the questions we usually answer on early calls for custom software, SaaS and product development.';
        include __DIR__ . '/../../partials/faq/section.php';
    ?>
<?php endif; ?>

<?php
    // CTA block – pass contact flash state into the CTA + small form
    $errors  = $contactErrors  ?? [];
    $old     = $contactOld     ?? [];
    $success = $contactSuccess ?? null;
    $leadFrom= 'lead_service_page';

    include __DIR__ . '/../../partials/contact/cta-section.php';
?>