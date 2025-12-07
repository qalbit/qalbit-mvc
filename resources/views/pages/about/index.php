<?php include __DIR__ . '/../../partials/hero/about.php'; ?>

<?php include __DIR__ . '/../../partials/about/section-who.php'; ?>

<?php include __DIR__ . '/../../partials/about/section-whatwedo.php'; ?>

<?php include __DIR__ . '/../../partials/about/section-impact.php'; ?>

<?php include __DIR__ . '/../../partials/about/section-clients.php'; ?>

<?php include __DIR__ . '/../../partials/about/section-leader.php'; ?>

<?php include __DIR__ . '/../../partials/about/section-culture.php'; ?>

<?php include __DIR__ . '/../../partials/about/section-howwework.php'; ?>

<?php include __DIR__ . '/../../partials/about/section-casestudy.php'; ?>

<?php include __DIR__ . '/../../partials/about/section-techstack.php'; ?>

<?php include __DIR__ . '/../../partials/about/section-trust.php'; ?>

<?php include __DIR__ . '/../../partials/about/section-career.php'; ?>

<?php if (!empty($faqs)): ?>
    <?php
        $title    = 'Frequently asked questions about working with QalbIT';
        $subtitle = 'Straightforward answers for SaaS founders and teams evaluating QalbIT as their product engineering partner.';
        include __DIR__ . '/../../partials/faq/section.php';
    ?>
<?php endif; ?>

<?php
    // CTA block – pass contact flash state into the CTA + small form
    $errors  = $contactErrors  ?? [];
    $old     = $contactOld     ?? [];
    $success = $contactSuccess ?? null;
    $leadFrom= 'lead_about_page';

    include __DIR__ . '/../../partials/contact/cta-section.php';
?>