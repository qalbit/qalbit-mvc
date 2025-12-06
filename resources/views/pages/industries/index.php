<?php
    /** @var array $industries */
    /** @var array $faqs */

    $industries = $industries ?? [];
    $faqs     = $faqs ?? [];
?>

<?php include __DIR__ . '/../../partials/hero/industries.php'; ?>

<?php include __DIR__ . '/../../partials/industries/section-usecase-mini.php'; ?>

<?php include __DIR__ . '/../../partials/industries/section-grid.php'; ?>

<?php include __DIR__ . '/../../partials/industries/section-outcome.php'; ?>

<?php include __DIR__ . '/../../partials/industries/section-process.php'; ?>

<?php include __DIR__ . '/../../partials/industries/section-techstack.php'; ?>

<?php include __DIR__ . '/../../partials/industries/section-techstack-mini.php'; ?>

<?php include __DIR__ . '/../../partials/industries/section-usecase.php'; ?>

<?php include __DIR__ . '/../../partials/industries/section-trust.php'; ?>

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
    $leadFrom= 'lead_industry_page';

    include __DIR__ . '/../../partials/contact/cta-section.php';
?>