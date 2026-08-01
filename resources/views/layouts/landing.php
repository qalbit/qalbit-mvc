<?php

/**
 * Standalone layout for campaign landing pages under /go/.
 *
 * Deliberately NOT layouts/main.php. Cold ad traffic lands here with one
 * decision to make, so this layout ships none of the site chrome: no nav, no
 * mega-menu, no footer link farm, no chat widget, no exit-intent popup, no
 * GSAP. It also does not load app.css — each landing page brings its own
 * stylesheet, so its design system and the marketing site's cannot collide.
 *
 * Indexing is forced off structurally rather than per page: everything served
 * through this layout is paid traffic, and a noindex you can forget to set is
 * a noindex that eventually gets forgotten.
 *
 * Expected data:
 *   $seo      ['title', 'description', 'canonical', 'image']
 *   $content  rendered page HTML
 *   $pageId   body class suffix, e.g. 'go-saas-teardown'
 *   $pageCss  asset path, e.g. '/css/go-teardown.css'
 *   $pageJs   asset path, e.g. '/js/go-teardown.js'
 *   $fonts    Google Fonts css2 family string (optional)
 */

$seo     = $seo ?? [];
$pageId  = $pageId ?? 'landing';
$pageCss = $pageCss ?? null;
$pageJs  = $pageJs ?? null;

$siteName = config('app.name', 'QalbIT');
$baseUrl  = rtrim(config('app.url', 'https://qalbit.com'), '/');

$requestPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';

$title       = $seo['title'] ?? $siteName;
$description = $seo['description'] ?? '';
$canonical   = $seo['canonical'] ?? ($baseUrl . $requestPath);
$ogImage     = $seo['image'] ?? null;

// Landing pages are never indexed. Belt (meta) and braces (header), because a
// meta tag alone does nothing for a page fetched as a non-HTML resource.
header('X-Robots-Tag: noindex, nofollow', true);

$gtmId = config('analytics.gtm_container_id', null);

// Space Grotesk carries the page, JetBrains Mono the labels — the campaign
// page runs its own type stack, deliberately not the marketing site's Poppins.
// Loaded render-blocking on purpose: the same trade partials/head.php makes,
// where an async swap cost the hero 0.11 CLS on every load.
$fontsCssUrl = $fonts ?? 'https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;700&display=swap';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= htmlspecialchars($title) ?></title>

    <meta name="robots" content="noindex, nofollow">

    <?php if ($description !== ''): ?>
        <meta name="description" content="<?= htmlspecialchars($description) ?>">
    <?php endif; ?>

    <link rel="canonical" href="<?= htmlspecialchars($canonical) ?>">

    <link rel="icon" type="image/png" href="<?= asset('/favicon-96x96.png') ?>" sizes="96x96">
    <link rel="icon" type="image/svg+xml" href="<?= asset('/favicon.svg') ?>">
    <link rel="shortcut icon" href="<?= asset('/favicon.ico') ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= asset('/apple-touch-icon.png') ?>">

    <!-- Open Graph: shared into Slack/LinkedIn by prospects, so it still matters
         on a noindex page. -->
    <meta property="og:site_name" content="<?= htmlspecialchars($siteName) ?>">
    <meta property="og:title" content="<?= htmlspecialchars($title) ?>">
    <?php if ($description !== ''): ?>
        <meta property="og:description" content="<?= htmlspecialchars($description) ?>">
    <?php endif; ?>
    <meta property="og:url" content="<?= htmlspecialchars($canonical) ?>">
    <meta property="og:type" content="website">
    <?php if (!empty($ogImage)): ?>
        <meta property="og:image" content="<?= htmlspecialchars($ogImage) ?>">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="630">
    <?php endif; ?>

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= htmlspecialchars($title) ?>">
    <?php if ($description !== ''): ?>
        <meta name="twitter:description" content="<?= htmlspecialchars($description) ?>">
    <?php endif; ?>
    <?php if (!empty($ogImage)): ?>
        <meta name="twitter:image" content="<?= htmlspecialchars($ogImage) ?>">
    <?php endif; ?>

    <?php if ($gtmId): ?>
        <!-- Consent Mode + GTM. Kept on a paid-traffic page: without it the
             campaign that pays for this page cannot be measured. GTM itself is
             deferred to first interaction by gtag-layer.js. -->
        <script src="<?= asset_v('/js/gtag-layer.js') ?>" data-gtm-id="<?= htmlspecialchars($gtmId) ?>"></script>
    <?php endif; ?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php /* Space Grotesk is a variable font served as one file per subset, so
             there is a single face to preload rather than one per weight. The
             hero H1 is the LCP element, so it should be on the wire
             immediately; if Google revs the version this degrades to a
             harmless no-op. */ ?>
    <link rel="preload" as="style" href="<?= htmlspecialchars($fontsCssUrl) ?>">
    <link rel="stylesheet" href="<?= htmlspecialchars($fontsCssUrl) ?>">

    <?php if ($pageCss): ?>
        <link rel="stylesheet" href="<?= asset_v($pageCss) ?>">
    <?php endif; ?>

    <!-- Marks that JS is alive before first paint, so the scroll-reveal styles
         only ever apply when something exists to un-apply them. -->
    <script>document.documentElement.className += " gt-js";</script>
</head>
<body class="page-<?= htmlspecialchars($pageId) ?>">
    <?php if ($gtmId): ?>
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?= htmlspecialchars($gtmId) ?>"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <?php endif; ?>

    <?= $content ?? '' ?>

    <?php if ($pageJs): ?>
        <script src="<?= asset_v($pageJs) ?>" defer></script>
    <?php endif; ?>
</body>
</html>
