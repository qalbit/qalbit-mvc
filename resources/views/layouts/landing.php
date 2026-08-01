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

$recaptchaConfig  = config('recaptcha', []);
$recaptchaEnabled = !empty($recaptchaConfig['enabled']) && !empty($recaptchaConfig['site_key']);
$recaptchaSiteKey = (string) ($recaptchaConfig['site_key'] ?? '');

/*
 * Page-scoped Content-Security-Policy.
 *
 * The site-wide policy is set at the Cloudflare edge, not in this repo, and it
 * allows tawk.to because every other page wants the chat widget. This one does
 * not: the GTM container fires Tawk on all pages, and a campaign page with one
 * decision on it should not grow a chat bubble.
 *
 * A <meta> CSP is enforced as the INTERSECTION of itself and any header policy,
 * so this can only ever tighten — it cannot accidentally grant something the
 * edge policy forbids. Blocking at the CSP layer rather than with a script
 * guard is what stops the request being made at all; a MutationObserver only
 * ever gets to remove the element after the fetch has already started.
 *
 * Kept, because the campaign needs them: GA/GTM, the Meta, LinkedIn, Apollo,
 * Google Ads and Cloudflare pixels, and reCAPTCHA. Dropped: tawk.to, plus
 * MailerLite and the CDNs, which this standalone layout provably never loads.
 *
 * www.linkedin.com is listed in img-src, but listing it here does NOT unblock
 * it — intersection cuts both ways, and the edge policy allows only
 * *.ads.linkedin.com, so LinkedIn's li_sync pixel stays blocked and its ad
 * attribution keeps silently not working. Verified against production: the
 * request still fails with net::ERR_BLOCKED_BY_CSP. Only widening the
 * Cloudflare response-header rule can fix that, on this page or any other. It
 * is kept in this list so the page stops being a second obstacle once the edge
 * policy is corrected.
 */
$csp = [
    "default-src 'self'",
    "script-src 'self' 'unsafe-inline' blob: https://www.googletagmanager.com https://www.google-analytics.com https://www.google.com https://www.gstatic.com https://static.cloudflareinsights.com https://connect.facebook.net https://snap.licdn.com https://assets.apollo.io https://www.googleadservices.com https://googleads.g.doubleclick.net",
    "style-src 'self' 'unsafe-inline' https://fonts.googleapis.com",
    "font-src 'self' data: https://fonts.gstatic.com",
    "img-src 'self' data: https://www.google-analytics.com https://www.googletagmanager.com https://www.google.com https://www.google.co.in https://www.gstatic.com https://www.facebook.com https://www.googleadservices.com https://googleads.g.doubleclick.net https://ad.doubleclick.net https://*.ads.linkedin.com https://www.linkedin.com https://aplo-evnt.com",
    "connect-src 'self' https://www.google-analytics.com https://www.googletagmanager.com https://www.google.com https://www.gstatic.com https://static.cloudflareinsights.com https://connect.facebook.net https://snap.licdn.com https://assets.apollo.io https://www.googleadservices.com https://googleads.g.doubleclick.net https://ad.doubleclick.net https://*.ads.linkedin.com https://www.facebook.com https://aplo-evnt.com",
    "frame-src 'self' https://www.google.com https://recaptcha.google.com https://www.googletagmanager.com https://www.facebook.com",
    "object-src 'none'",
    "base-uri 'self'",
    "form-action 'self'",
];
// frame-ancestors and upgrade-insecure-requests are ignored in <meta> (and warn
// in the console when present) — the edge policy already carries both.

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

    <?php /* First, so it governs everything below it. */ ?>
    <meta http-equiv="Content-Security-Policy" content="<?= htmlspecialchars(implode('; ', $csp), ENT_QUOTES) ?>">

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
        <?php /* Pushed before the container boots so GTM can read it on the very
                 first evaluation. The CSP above already blocks the chat widget
                 outright; this is the lever for switching it off properly at
                 source — in GTM, add a Data Layer Variable on page_type and give
                 the Tawk tag an exception trigger where page_type equals
                 landing. Tags fired by the same trigger stay unaffected. */ ?>
        <script>
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({ page_type: "landing", page_campaign: "saas_teardown", chat_enabled: false });
        </script>
        <script src="<?= asset_v('/js/gtag-layer.js') ?>" data-gtm-id="<?= htmlspecialchars($gtmId) ?>"></script>
    <?php endif; ?>

    <?php if ($recaptchaEnabled): ?>
        <?php /* Included only for its lazy loader: this file injects Google's
                 374KB api.js on first interaction, and its submit handler binds
                 to form[data-track="contact-form"], which this page has none of.
                 The token itself is minted by go-teardown.js at submit time. */ ?>
        <script src="<?= asset_v('/js/recaptcha-layer.js') ?>"
            data-recaptcha-site-key="<?= htmlspecialchars($recaptchaSiteKey, ENT_QUOTES) ?>" defer></script>
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
