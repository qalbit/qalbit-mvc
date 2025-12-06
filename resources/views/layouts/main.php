<?php

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

$noindex = !empty($seo['noindex']);
$robots  = $noindex ? 'noindex, nofollow' : 'index, follow';

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
        <link rel="stylesheet" href="<?= asset('/css/home.css?v=1.0.0.1') ?>">
    <?php endif; ?>
    
    <?php if (isset($pageId) && $pageId === 'services'): ?>
        <link rel="stylesheet" href="<?= asset('/css/services.css?v=1.0.0.1') ?>">
    <?php endif; ?>
    
    <?php if (isset($pageId) && $pageId === 'technologies'): ?>
        <link rel="stylesheet" href="<?= asset('/css/technologies.css?v=1.0.0.1') ?>">
    <?php endif; ?>

    <?php if (isset($pageId) && $pageId === 'industries'): ?>
        <link rel="stylesheet" href="<?= asset('/css/industries.css?v=1.0.0.1') ?>">
    <?php endif; ?>
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
    <script src="<?= asset('/js/main.js?v=1.0.0.1') ?>" defer></script>

    <?php if (isset($pageId) && $pageId === 'home'): ?>
        <script src="<?= asset('/js/home.js?v=1.0.0.1') ?>" defer></script>
    <?php endif; ?>

    <?php if (isset($pageId) && $pageId === 'services'): ?>
        <script src="<?= asset('/js/services.js?v=1.0.0.1') ?>" defer></script>
    <?php endif; ?>

    <?php if (isset($pageId) && $pageId === 'service-detail'): ?>
        <script src="<?= asset('/js/service-detail.js?v=1.0.0.1') ?>" defer></script>
    <?php endif; ?>

    <?php if (isset($pageId) && $pageId === 'technologies'): ?>
        <script src="<?= asset('/js/technologies.js?v=1.0.0.1') ?>" defer></script>
    <?php endif; ?>

    <?php if (isset($pageId) && $pageId === 'technology-detail'): ?>
        <script src="<?= asset('/js/technology-detail.js?v=1.0.0.1') ?>" defer></script>
    <?php endif; ?>

    <?php if (isset($pageId) && $pageId === 'industries'): ?>
        <script src="<?= asset('/js/industries.js?v=1.0.0.1') ?>" defer></script>
    <?php endif; ?>
    
    <?php if (isset($pageId) && $pageId === 'industry-detail'): ?>
        <script src="<?= asset('/js/industry-detail.js?v=1.0.0.1') ?>" defer></script>
    <?php endif; ?>

    <?php if (isset($pageId) && $pageId === 'aboutus'): ?>
        <script src="<?= asset('/js/aboutus.js?v=1.0.0.1') ?>" defer></script>
    <?php endif; ?>

    <?php if (isset($pageId) && $pageId === 'contactus'): ?>
        <script src="<?= asset('/js/contactus.js?v=1.0.0.1') ?>" defer></script>
    <?php endif; ?>

    <?php if (isset($pageId) && $pageId === 'process-detail'): ?>
        <script src="<?= asset('/js/process-detail.js?v=1.0.0.1') ?>" defer></script>
    <?php endif; ?>

    <?php if (isset($pageId) && $pageId === 'location-detail'): ?>
        <script src="<?= asset('/js/location-detail.js?v=1.0.0.1') ?>" defer></script>
    <?php endif; ?>

    <?php if (isset($pageId) && $pageId === 'hire-developer'): ?>
        <script src="<?= asset('/js/hire-developer.js?v=1.0.0.1') ?>" defer></script>
    <?php endif; ?>

    <?php if (isset($pageId) && $pageId === 'casestudy-detail'): ?>
        <script src="<?= asset('/js/casestudy-detail.js?v=1.0.0.1') ?>" defer></script>
    <?php endif; ?>

    <?php if (isset($pageId) && $pageId === 'careers'): ?>
        <script src="<?= asset('/js/careers.js?v=1.0.0.1') ?>" defer></script>
    <?php endif; ?>
</body>
</html>
