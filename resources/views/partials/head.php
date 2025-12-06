<?php
// resources/views/partials/head.php

$siteName = $siteName ?? config('app.name', 'QalbIT');
$gscVerification = config('analytics.gsc_verification', null);

// CSS versioning
$cssPath   = '/assets/css/app.css';
$cssHref   = $cssPath;
$projectRoot = dirname(__DIR__, 3);
$cssFile   = $projectRoot . '/public' . $cssPath;

if (is_file($cssFile)) {
    $version = filemtime($cssFile);
    $cssHref = $cssPath . '?v=' . $version;
}

// GTM
$gtmId = config('analytics.gtm_container_id', null);

// reCAPTCHA v3
$recaptchaConfig  = config('recaptcha', []);
$recaptchaEnabled = !empty($recaptchaConfig['enabled']) && !empty($recaptchaConfig['site_key']);
$recaptchaSiteKey = $recaptchaConfig['site_key'] ?? '';

// JSON-LD (if provided by controller)
$jsonLd = $jsonLd ?? null;
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title><?= htmlspecialchars($title) ?></title>

<link rel="icon" type="image/png" href="<?= asset('/../favicon-96x96.png') ?>" sizes="96x96" />
<link rel="icon" type="image/svg+xml" href="<?= asset('/../favicon.svg') ?>" />
<link rel="shortcut icon" href="<?= asset('/../favicon.ico') ?>" />
<link rel="apple-touch-icon" sizes="180x180" href="<?= asset('/../apple-touch-icon.png') ?>" />
<meta name="apple-mobile-web-app-title" content="QalbIT" />
<link rel="manifest" href="<?= asset('/../site.webmanifest') ?>" />

<?php if (!empty($description)): ?>
    <meta name="description" content="<?= htmlspecialchars($description) ?>">
<?php endif; ?>

<meta name="robots" content="<?= htmlspecialchars($robots) ?>">

<?php if (!empty($canonical)): ?>
    <link rel="canonical" href="<?= htmlspecialchars($canonical) ?>">
<?php endif; ?>

<?php if (!empty($gscVerification)): ?>
    <meta name="google-site-verification" content="<?= htmlspecialchars($gscVerification) ?>">
<?php endif; ?>

<!-- Open Graph -->
<meta property="og:site_name" content="<?= htmlspecialchars($siteName) ?>">
<meta property="og:title" content="<?= htmlspecialchars($title) ?>">
<?php if (!empty($description)): ?>
    <meta property="og:description" content="<?= htmlspecialchars($description) ?>">
<?php endif; ?>
<?php if (!empty($canonical)): ?>
    <meta property="og:url" content="<?= htmlspecialchars($canonical) ?>">
<?php endif; ?>
<meta property="og:type" content="website">

<!-- Twitter -->
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="<?= htmlspecialchars($title) ?>">
<?php if (!empty($description)): ?>
    <meta name="twitter:description" content="<?= htmlspecialchars($description) ?>">
<?php endif; ?>

<?php if ($gtmId): ?>
    <!-- Google Tag Manager -->
    <script>
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','<?= htmlspecialchars($gtmId) ?>');
    </script>
<?php endif; ?>

<?php if ($recaptchaEnabled): ?>
    <script src="https://www.google.com/recaptcha/api.js?render=<?= htmlspecialchars($recaptchaSiteKey) ?>"></script>
<?php endif; ?>

<!-- Shared JS: reCAPTCHA + contact form GTM events + cookie popup hooks -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    // reCAPTCHA v3 for all contact forms
    <?php if ($recaptchaEnabled): ?>
    var forms = document.querySelectorAll('form[data-track="contact-form"]');
    forms.forEach(function (form) {
        form.addEventListener('submit', function (e) {
            var tokenInput = form.querySelector('input[name="recaptcha_token"]');
            if (!tokenInput) return;

            e.preventDefault();

            grecaptcha.ready(function () {
                grecaptcha.execute('<?= htmlspecialchars($recaptchaSiteKey) ?>', {action: 'contact'}).then(function (token) {
                    tokenInput.value = token;

                    // GTM event
                    if (window.dataLayer && typeof window.dataLayer.push === 'function') {
                        window.dataLayer.push({
                            event: 'contact_form_submit',
                            form_variant: form.getAttribute('data-variant') || 'unknown',
                            form_location: window.location.pathname
                        });
                    }

                    form.submit();
                });
            });
        });
    });
    <?php endif; ?>
});
</script>

<?php if (!empty($jsonLd)): ?>
    <?php
    // Allow either a single schema array or an array of multiple schemas
    $schemas = $jsonLd;

    if (!is_array($schemas) || !isset($schemas[0])) {
        // Single schema → wrap into array
        $schemas = [$schemas];
    }
    ?>
    <?php foreach ($schemas as $schema): ?>
        <?php if (is_array($schema) && !empty($schema['@context'])): ?>
            <script type="application/ld+json">
                <?= json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) ?>
            </script>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap">

<!-- Styles -->
<link rel="stylesheet" href="<?= htmlspecialchars($cssHref) ?>">
