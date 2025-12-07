<?php

$indexingEnabled = config('app.indexing.enabled', true);

$pageId = $pageId ?? 'home';
$seo = $seo ?? [];

$siteName    = config('app.name', 'QalbIT');
$baseUrl     = rtrim(config('app.url', 'https://qalbit.com'), '/');
$requestPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';

$title = $seo['title'] ?? $siteName;
$description = $seo['description']
    ?? 'QalbIT is a custom software development company building web, mobile, SaaS and cloud solutions for startups and businesses.';

if (!empty($seo['canonical'])) {
    $canonical = $seo['canonical'];
} else {
    $canonical = $baseUrl . $requestPath;
}

$defaultOgImage = $baseUrl . '/assets/images/og/qalbit-default-og.jpg';
// Allow page-level override via $seo['image']
$ogImage        = !empty($seo['image']) ? $seo['image'] : $defaultOgImage;

// --- GLOBAL + PAGE-WISE INDEXING ------------------------------
$pageNoindex = !empty($seo['noindex']);
$globalNoindex = !$indexingEnabled;

$shouldNoindex = $globalNoindex || $pageNoindex;

$robots  = $shouldNoindex ? 'noindex, nofollow' : 'index, follow';

if ($shouldNoindex) {
    header('X-Robots-Tag: noindex, nofollow', true);
}

$gtmId   = config('analytics.gtm_container_id', null);

// Layout config – page can override these
$layoutConfig   = $layout ?? [];
$headerVariant  = $layoutConfig['header'] ?? 'default';
$footerVariant  = $layoutConfig['footer'] ?? 'default';

// JSON-LD passed from controllers
$jsonLd = $jsonLd ?? null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include __DIR__ . '/../partials/head.php'; ?>
    
    <?php if (isset($pageId) && $pageId === 'home'): ?>
        <link rel="stylesheet" href="<?= asset('/css/home.css') ?>">
    <?php endif; ?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@25.12.5/build/css/intlTelInput.css">
</head>
<body class="bg-background antialiased <?= isset($pageId) ? 'page-' . $pageId : '' ?>">
    <?php if ($gtmId): ?>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?= htmlspecialchars($gtmId) ?>"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <?php endif; ?>

    <?php
    // --- Header variant include ---
    $headerFile = __DIR__ . '/../partials/header/' . $headerVariant . '.php';
    if (!is_file($headerFile)) {
        $headerFile = __DIR__ . '/../partials/header/default.php';
    }
    include $headerFile;
    ?>

    <main>
        <?= $content ?? '' ?>
    </main>

    <?php include __DIR__ . '/../common/cookie.popup.php'; ?>
    <?php include __DIR__ . '/../common/exit-intent.popup.php'; ?>

    <?php
    $footerFile = __DIR__ . '/../partials/footer/' . $footerVariant . '.php';
    if (!is_file($footerFile)) {
        $footerFile = __DIR__ . '/../partials/footer/default.php';
    }
    include $footerFile;
    ?>

    <?php include __DIR__ . '/../partials/tawk.php'; ?>

    <!-- GSAP core (CDN) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.13.0/gsap.min.js" integrity="sha512-NcZdtrT77bJr4STcmsGAESr06BYGE8woZdSdEgqnpyqac7sugNO+Tr4bGwGF3MsnEkGKhU2KL2xh6Ec+BqsaHA==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js" defer></script>
    <script src="<?= asset('/js/main.js') ?>" defer></script>

    <!-- Intl. Phone Core (CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@25.12.5/build/js/intlTelInput.min.js"></script>

    <?php if (isset($pageId) && $pageId === 'home'): ?>
        <script src="<?= asset('/js/home.js') ?>" defer></script>
    <?php endif; ?>

    <?php if (isset($pageId) && $pageId === 'services'): ?>
        <script src="<?= asset('/js/services.js') ?>" defer></script>
    <?php endif; ?>

    <?php if (isset($pageId) && $pageId === 'service-detail'): ?>
        <script src="<?= asset('/js/service-detail.js') ?>" defer></script>
    <?php endif; ?>

    <?php if (isset($pageId) && $pageId === 'technologies'): ?>
        <script src="<?= asset('/js/technologies.js') ?>" defer></script>
    <?php endif; ?>

    <?php if (isset($pageId) && $pageId === 'technology-detail'): ?>
        <script src="<?= asset('/js/technology-detail.js') ?>" defer></script>
    <?php endif; ?>

    <?php if (isset($pageId) && $pageId === 'industries'): ?>
        <script src="<?= asset('/js/industries.js') ?>" defer></script>
    <?php endif; ?>
    
    <?php if (isset($pageId) && $pageId === 'industry-detail'): ?>
        <script src="<?= asset('/js/industry-detail.js') ?>" defer></script>
    <?php endif; ?>

    <?php if (isset($pageId) && $pageId === 'aboutus'): ?>
        <script src="<?= asset('/js/aboutus.js') ?>" defer></script>
    <?php endif; ?>

    <?php if (isset($pageId) && $pageId === 'contactus'): ?>
        <script src="<?= asset('/js/contactus.js') ?>" defer></script>
    <?php endif; ?>

    <?php if (isset($pageId) && $pageId === 'process-detail'): ?>
        <script src="<?= asset('/js/process-detail.js') ?>" defer></script>
    <?php endif; ?>

    <?php if (isset($pageId) && $pageId === 'location-detail'): ?>
        <script src="<?= asset('/js/location-detail.js') ?>" defer></script>
    <?php endif; ?>

    <?php if (isset($pageId) && $pageId === 'hire-developer'): ?>
        <script src="<?= asset('/js/hire-developer.js') ?>" defer></script>
    <?php endif; ?>

    <?php if (isset($pageId) && $pageId === 'casestudy-detail'): ?>
        <script src="<?= asset('/js/casestudy-detail.js') ?>" defer></script>
    <?php endif; ?>

    <?php if (isset($pageId) && $pageId === 'careers'): ?>
        <script src="<?= asset('/js/careers.js') ?>" defer></script>
    <?php endif; ?>

    <?php include __DIR__ . '/../common/floating-stack.php'; ?>
</body>
</html>
