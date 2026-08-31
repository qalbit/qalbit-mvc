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

// max-snippet/-image-preview let search + AI answer engines extract full
// snippets and large previews (needed for AI Overviews / answer citations)
$robots  = $shouldNoindex
    ? 'noindex, nofollow'
    : 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1';

if ($shouldNoindex) {
    header('X-Robots-Tag: noindex, nofollow', true);
}

$gtmId   = config('analytics.gtm_container_id', null);

// Layout config – page can override these
$layoutConfig   = $layout ?? [];
$headerVariant  = $layoutConfig['header'] ?? 'default';
$footerVariant  = $layoutConfig['footer'] ?? 'default';

// intl-tel-input assets: load only when the rendered page content actually
// contains a phone field (e.g. via the contact CTA section or contact hero).
$needsPhoneInput = strpos($content ?? '', 'data-intl-tel-input') !== false;

// /services/erp-development/ ships its own design system (Archivo, a separate
// token set) and its own behaviour. Both are sniffed out of the rendered
// content rather than keyed off $pageId, because that page shares the
// 'service-detail' id with eleven others that must not pay for either.
$needsErpPage = strpos($content ?? '', 'class="erp-page"') !== false;

// JSON-LD passed from controllers
$jsonLd = $jsonLd ?? null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include __DIR__ . '/../partials/head.php'; ?>
    
    <?php if (isset($pageId) && $pageId === 'home'): ?>
        <link rel="stylesheet" href="<?= asset_v('/css/home.css') ?>">
    <?php endif; ?>

    <?php if ($needsPhoneInput): ?>
        <!-- Styles only apply to JS-built widget DOM, so async load is safe -->
        <link rel="preload" as="style" href="https://cdn.jsdelivr.net/npm/intl-tel-input@25.12.5/build/css/intlTelInput.css" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@25.12.5/build/css/intlTelInput.css"></noscript>
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

    <main id="main-content" tabindex="-1">
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

    <!-- GSAP core + ScrollTrigger: same version, same CDN (previously mixed
         3.13.0/3.12.5 across two CDNs — extra connection + API drift risk) -->
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js" defer></script>

    <?php if ($needsPhoneInput): ?>
        <!-- Intl. Phone Core (CDN) – deferred before main.js so it is defined when main.js initializes the widget -->
        <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@25.12.5/build/js/intlTelInput.min.js" defer></script>
    <?php endif; ?>

    <script src="<?= asset_v('/js/main.js') ?>" defer></script>

    <?php if (isset($pageId) && $pageId === 'home'): ?>
        <script src="<?= asset_v('/js/home.js') ?>" defer></script>
    <?php endif; ?>

    <?php if (isset($pageId) && $pageId === 'services'): ?>
        <script src="<?= asset_v('/js/services.js') ?>" defer></script>
    <?php endif; ?>

    <?php if (isset($pageId) && $pageId === 'service-detail'): ?>
        <script src="<?= asset_v('/js/service-detail.js') ?>" defer></script>
    <?php endif; ?>

    <?php if ($needsErpPage): ?>
        <script src="<?= asset_v('/js/erp-page.js') ?>" defer></script>
    <?php endif; ?>

    <?php if (isset($pageId) && $pageId === 'technologies'): ?>
        <script src="<?= asset_v('/js/technologies.js') ?>" defer></script>
    <?php endif; ?>

    <?php if (isset($pageId) && $pageId === 'technology-detail'): ?>
        <script src="<?= asset_v('/js/technology-detail.js') ?>" defer></script>
    <?php endif; ?>

    <?php if (isset($pageId) && $pageId === 'industries'): ?>
        <script src="<?= asset_v('/js/industries.js') ?>" defer></script>
    <?php endif; ?>
    
    <?php if (isset($pageId) && $pageId === 'industry-detail'): ?>
        <script src="<?= asset_v('/js/industry-detail.js') ?>" defer></script>
    <?php endif; ?>

    <?php if (isset($pageId) && $pageId === 'aboutus'): ?>
        <script src="<?= asset_v('/js/aboutus.js') ?>" defer></script>
    <?php endif; ?>

    <?php if (isset($pageId) && $pageId === 'contactus'): ?>
        <script src="<?= asset_v('/js/contactus.js') ?>" defer></script>
    <?php endif; ?>

    <?php if (isset($pageId) && $pageId === 'process-detail'): ?>
        <script src="<?= asset_v('/js/process-detail.js') ?>" defer></script>
    <?php endif; ?>

    <?php if (isset($pageId) && $pageId === 'location-detail'): ?>
        <script src="<?= asset_v('/js/location-detail.js') ?>" defer></script>
    <?php endif; ?>

    <?php if (isset($pageId) && $pageId === 'hire-developer'): ?>
        <script src="<?= asset_v('/js/hire-developer.js') ?>" defer></script>
    <?php endif; ?>

    <?php if (isset($pageId) && $pageId === 'casestudy-detail'): ?>
        <script src="<?= asset_v('/js/casestudy-detail.js') ?>" defer></script>
    <?php endif; ?>

    <?php if (isset($pageId) && $pageId === 'careers'): ?>
        <script src="<?= asset_v('/js/careers.js') ?>" defer></script>
    <?php endif; ?>

    <?php include __DIR__ . '/../common/floating-stack.php'; ?>
</body>
</html>
