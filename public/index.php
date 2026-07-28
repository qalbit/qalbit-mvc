<?php

/*
 * Canonical host.
 *
 * qalbit.com serves the site; www.qalbit.com must not. Without this the whole
 * site answers 200 on both hosts, so every page is crawled twice. rel=canonical
 * stops the duplicate being *indexed*, but not being *crawled* — the 28 Jul
 * audit found ~567 flagged rows that were simply the www copy of a row already
 * counted on the apex.
 *
 * Runs before session_start() so a redirect never sets a session cookie, and
 * carries its own Cache-Control so the CDN can answer repeats without touching
 * origin. /blog/ (WordPress) already redirects itself.
 */
$requestHost = strtolower($_SERVER['HTTP_HOST'] ?? '');
if (str_starts_with($requestHost, 'www.')) {
    header('Location: https://' . substr($requestHost, 4) . ($_SERVER['REQUEST_URI'] ?? '/'), true, 301);
    header('Cache-Control: public, max-age=86400');
    exit;
}

$originalMethod = strtoupper($_SERVER['REQUEST_METHOD'] ?? 'GET');

/*
 * Sessions, only when a session is actually needed.
 *
 * The only thing this app keeps in a session is form flash data: the contact
 * and career POST handlers write it, and the GET that follows the redirect
 * reads it back once. Nothing else touches $_SESSION.
 *
 * Starting one unconditionally cost the whole site its cacheability. PHP's
 * session cache limiter stamps "Cache-Control: no-store, no-cache,
 * must-revalidate" on every response it touches, and the PHPSESSID cookie
 * independently disqualifies a response from Cloudflare's cache. Between them
 * every HTML response sitewide came back cf-cache-status: DYNAMIC, so an
 * anonymous visitor in another country waited on the Hostinger origin for a
 * page whose HTML had not changed in fifteen minutes.
 *
 * So: start a session for anything that is not a plain read, and for a reader
 * who already carries a session cookie (they may have flash data waiting).
 * Everyone else - which is every crawler and every first-time visitor - gets
 * no session, no cookie, and a response the edge is allowed to keep.
 */
$sessionCookieParams = [
    'lifetime'  => 0,
    'path'      => '/',
    'domain'    => 'qalbit.com',
    'secure'    => true,
    'httponly'  => true,
    'samesite'  => 'Lax',
];

$isReadRequest = in_array($originalMethod, ['GET', 'HEAD'], true);
$needsSession  = !$isReadRequest || isset($_COOKIE[session_name()]);

if ($needsSession) {
    session_set_cookie_params($sessionCookieParams);
    session_start();

    /*
     * Self-healing: a cookie that outlived its session data would otherwise
     * pin that visitor to uncacheable responses forever. If a reader arrives
     * with a cookie and the session holds nothing, drop both.
     */
    if ($isReadRequest && empty($_SESSION)) {
        session_destroy();
        setcookie(session_name(), '', [
            // setcookie() takes 'expires', not session's 'lifetime'.
            'expires'  => time() - 3600,
            'path'     => $sessionCookieParams['path'],
            'domain'   => $sessionCookieParams['domain'],
            'secure'   => $sessionCookieParams['secure'],
            'httponly' => $sessionCookieParams['httponly'],
            'samesite' => $sessionCookieParams['samesite'],
        ]);
        $_SESSION = [];
    }
} else {
    // Keep the superglobal defined so Session:: reads stay harmless.
    $_SESSION = [];
}

if ($originalMethod === 'HEAD') {
    $_SERVER['REQUEST_METHOD'] = 'GET';
}


// LOAD ENV FIRST
require __DIR__ . '/../bootstrap/env.php';

// FRONT CONTROLLER
$router = require __DIR__ . '/../bootstrap/app.php';

use App\Controllers\AboutController;
use App\Controllers\CareerController;
use App\Controllers\ContactController;
use App\Controllers\ErrorController;
use App\Controllers\GeoController;
use App\Controllers\HireController;
use App\Controllers\IndustryController;
use App\Controllers\PageController;
use App\Controllers\ServiceController;
use App\Controllers\SeoController;
use App\Controllers\HealthController;
use App\Controllers\CaseStudyController;
use App\Controllers\HomeController;
use App\Controllers\LegalController;
use App\Controllers\PortfolioController;
use App\Controllers\ProcessController;
use App\Controllers\ProductController;
use App\Controllers\TechnologyController;

// Error handlers
$router->setNotFoundHandler([ErrorController::class, 'notFound']);
$router->setErrorHandler([ErrorController::class, 'serverError']);

// Register routes
$router->get('/', [HomeController::class, 'index']);
$router->get('/about-us/', [AboutController::class, 'index']);
$router->get('/portfolio/', [PortfolioController::class, 'index']);

$router->get('/career/', [CareerController::class, 'index']);
$router->get('/career/apply/', [CareerController::class, 'apply']);
$router->post('/career/apply/', [CareerController::class, 'submit']);

// 301: old site's careers URL (still in Google's index / external links)
$router->redirect('/career-opportunities/', '/career/');

// 301 redirects for other old-site URLs still crawled by Google (GSC 404 report).
// Each points at its closest living successor; retired pages with no
// successor (old foreign geo pages, one-off campaigns) intentionally 404.
$router->redirect('/index.php', '/');
$router->redirect('/our-team/', '/about-us/');
$router->redirect('/hiring-solutions/', '/hire-developers/');
$router->redirect('/engagement-models/', '/engagement-model/');
$router->redirect('/custom-software-development-usa/', '/services/custom-software-development/');
$router->redirect('/technologies/vuejs/', '/technologies/');
$router->redirect('/industries/fitness/', '/industries/sports/');
$router->redirect('/images/favicon/site.webmanifest', '/assets/site.webmanifest');
// Old "Hire Us" page. The one internal link (a blog FAQ answer) now points at
// /hire-developers/ directly; this covers external links still on the old URL.
$router->redirect('/estimation/', '/hire-developers/');

// Hire developers
$router->get('/hire-developers/', [HireController::class, 'index']);
$router->get('/hire-nodejs-developers/', [HireController::class, 'nodejs']);
$router->get('/hire-laravel-developers/', [HireController::class, 'laravel']);
$router->get('/hire-php-developers/', [HireController::class, 'php']);
$router->get('/hire-reactjs-developers/', [HireController::class, 'reactjs']);
$router->get('/hire-nextjs-developers/', [HireController::class, 'nextjs']);
$router->get('/hire-flutter-developers/', [HireController::class, 'flutter']);
$router->get('/hire-mvp-developers/', [HireController::class, 'mvp']);
$router->get('/hire-full-stack-javascript-developers/', [HireController::class, 'fullstack']);

// Services
$router->get('/services/', [ServiceController::class, 'index']);

// 301 redirects for retired / merged service pages (SEO restructure, Jul 2026)
$router->redirect('/services/web-applications/', '/services/custom-web-development/');
$router->redirect('/services/payment-gateway-services/', '/services/e-commerce/');
$router->redirect('/services/mobile-app-backend/', '/services/backend-development/');
$router->redirect('/services/api-development/', '/services/backend-development/');

$router->get('/services/{slug}/', [ServiceController::class, 'show']);

// Industries
$router->get('/industries/', [IndustryController::class, 'index']);
$router->get('/industries/{slug}/', [IndustryController::class, 'show']);

// Case studies
$router->get('/case-studies/', [CaseStudyController::class, 'index']);
$router->get('/case-studies/{slug}/', [CaseStudyController::class, 'show']);

// Products (owned SaaS)
$router->get('/products/', [ProductController::class, 'index']);
$router->get('/products/{slug}/', [ProductController::class, 'show']);

// Technologies
$router->get('/technologies/', [TechnologyController::class, 'index']);
$router->get('/technologies/{slug}/', [TechnologyController::class, 'show']);

// Our Process Pages
$router->get('/start-up-mvp/', [ProcessController::class, 'startUpMvp']);
$router->get('/product-scaling/', [ProcessController::class, 'productScaling']);
$router->get('/digital-transformation/', [ProcessController::class, 'digitalTransformation']);
$router->get('/engagement-model/', [ProcessController::class, 'engagementModel']);

// Contact
$router->get('/contact-us/', [ContactController::class, 'index']);
$router->post('/contact-us/', [ContactController::class, 'submit']);

// Policy Pages
$router->get('/privacy-policy/', [LegalController::class, 'privacy']);
$router->get('/terms-and-condition/', [LegalController::class, 'terms']);
$router->get('/cookie-policy/', [LegalController::class, 'cookies']);

// Sitemap Page
$router->get('/sitemap/', [PageController::class, 'sitemap']);

// Developer micro-tools
$router->get('/tools/json-formatter/', [PageController::class, 'jsonFormatter']);
$router->get('/tools/software-development-cost-calculator/', [PageController::class, 'costCalculator']);

// SEO: sitemap
$router->get('/sitemap.xml', [SeoController::class, 'sitemap']);

// SEO: robots
$router->get('/robots.txt', [SeoController::class, 'robots']);

// Health endpoint polled by the LiftUp CRM product sync
$router->get('/v1/health/', [HealthController::class, 'show']);

// SEO: llms.txt – curated site overview for AI assistants (llmstxt.org)
$router->get('/llms.txt', [SeoController::class, 'llms']);

// Geolocations 
$router->get('/{country}/{state}/', [GeoController::class, 'show']);

// Dispatch current request
$router->dispatch();