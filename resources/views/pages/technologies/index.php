<?php
    /** @var array $technologies */
    /** @var array $faqs */

    $technologies = $technologies ?? [];
    $faqs         = $faqs ?? [];
?>

<?php include __DIR__ . '/../../partials/hero/technologies.php'; ?>

<?php include __DIR__ . '/../../partials/technologies/section-featured-links.php'; ?>

<?php include __DIR__ . '/../../partials/technologies/section-techstack.php'; ?>

<?php
    $frontendItems = $grouped['frontend'] ?? [];
    include __DIR__ . '/../../partials/technologies/section-frontend.php';
?>

<?php
    $backendItems = $grouped['backend'] ?? [];
    include __DIR__ . '/../../partials/technologies/section-backend.php';
?>

<?php
    $mobileItems = $grouped['mobile'] ?? [];
    include __DIR__ . '/../../partials/technologies/section-mobile.php';
?>

<?php
    $cmsItems = $grouped['cms'] ?? [];
    include __DIR__ . '/../../partials/technologies/section-cms.php';
?>

<?php
    $otherItems = $grouped['other'] ?? [];
    include __DIR__ . '/../../partials/technologies/section-legacy.php';
?>

<?php include __DIR__ . '/../../partials/technologies/section-process.php'; ?>

<?php include __DIR__ . '/../../partials/technologies/section-stack-examples.php'; ?>

<?php include __DIR__ . '/../../partials/technologies/section-case-studies.php'; ?>

<?php if (!empty($faqs)): ?>
    <?php
        $title    = 'Frequently asked questions about our technology stack';
        $subtitle = 'These are some of the questions we usually answer when clients review React/Next.js, Laravel, Node/Nest.js, Flutter and related technologies with QalbIT.';
        include __DIR__ . '/../../partials/faq/section.php';
    ?>
<?php endif; ?>

<section class="sr-only" aria-hidden="false">
    <a href="/contact-us/">Get a project estimate</a>
</section>

<?php
    // CTA block – pass contact flash state into the CTA + small form
    $errors  = $contactErrors  ?? [];
    $old     = $contactOld     ?? [];
    $success = $contactSuccess ?? null;
    $leadFrom= 'lead_technology_page';

    include __DIR__ . '/../../partials/contact/cta-section.php';
?>