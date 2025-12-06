<?php
$errors    = $errors    ?? [];
$old       = $old       ?? [];
$success   = $success   ?? null;
?>

<?php include __DIR__ . '/../../partials/hero/contact.php'; ?>

<?php include __DIR__ . '/../../partials/contact/section-request.php'; ?>

<?php include __DIR__ . '/../../partials/contact/section-proof.php'; ?>

<?php include __DIR__ . '/../../partials/contact/section-location.php'; ?>

<?php if (!empty($faqs)): ?>
    <?php
        $title    = 'Pre-sales FAQs about working with QalbIT';
        $subtitle = 'Answers to common questions about budgets, timelines, engagement models and security so you can decide whether QalbIT is the right engineering partner for your SaaS or custom software project.';
        $bullets = [
            '✓ Get clarity on minimum engagement sizes, budget ranges and how we price different types of projects.',
            '✓ Understand how we start new engagements – from first call and discovery to proposal, kickoff and regular demos.',
            '✓ See how we handle NDAs, security, time zones and communication, so collaboration feels predictable and low risk.'
        ];
        include __DIR__ . '/../../partials/faq/section.php';
    ?>
<?php endif; ?>

<?php include __DIR__ . '/../../partials/contact/section-cta.php'; ?>