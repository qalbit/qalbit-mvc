#!/usr/bin/env php
<?php
declare(strict_types=1);

use App\Controllers\AboutController;
use App\Controllers\CareerController;
use App\Controllers\CaseStudyController;
use App\Controllers\ContactController;
use App\Controllers\GeoController;
use App\Controllers\HireController;
use App\Controllers\HomeController;
use App\Controllers\IndustryController;
use App\Controllers\LegalController;
use App\Controllers\PageController;
use App\Controllers\PortfolioController;
use App\Controllers\ProcessController;
use App\Controllers\ServiceController;
use App\Controllers\SeoController;
use App\Controllers\TechnologyController;

require __DIR__ . '/../vendor/autoload.php';

// Bootstrap application (same as public/index.php does)
session_start();
require __DIR__ . '/../bootstrap/env.php';
$router = require __DIR__ . '/../bootstrap/app.php';

// Ensure cache rules treat this like a normal GET page view
$_SERVER['REQUEST_METHOD'] = 'GET';
$_GET    = [];
// Make sure we are not seen as an admin
unset($_SESSION['admin_id']);

/**
 * Small helper to safely warm one page.
 *
 * @param string   $label
 * @param callable $callback
 */
function warm(string $label, callable $callback): void
{
    try {
        $html = $callback();
        // You can comment this out in production if you don’t want logs
        $len  = is_string($html) ? strlen($html) : 0;
        echo "[OK] {$label} ({$len} bytes)\n";
    } catch (\Throwable $e) {
        // Log to STDERR
        fwrite(STDERR, "[ERROR] {$label}: " . $e->getMessage() . "\n");
    }
}

// ---------------------------------------------------------
// Instantiate controllers (no DI container, simple usage)
// ---------------------------------------------------------
$homeController       = new HomeController();
$aboutController      = new AboutController();
$portfolioController  = new PortfolioController();
$careerController     = new CareerController();
$hireController       = new HireController();
$serviceController    = new ServiceController();
$industryController   = new IndustryController();
$caseStudyController  = new CaseStudyController();
$technologyController = new TechnologyController();
$processController    = new ProcessController();
$contactController    = new ContactController();
$legalController      = new LegalController();
$pageController       = new PageController();
$seoController        = new SeoController();
$geoController        = new GeoController();

// ---------------------------------------------------------
// Core static pages
// ---------------------------------------------------------
warm('Home /', fn() => $homeController->index());
warm('About /about-us/', fn() => $aboutController->index());
warm('Portfolio /portfolio/', fn() => $portfolioController->index());

warm('Careers index /career/', fn() => $careerController->index());
// We generally do NOT warm /career/apply/ because it’s more user-flow driven.

// Contact blank state (cached version, no flash messages)
warm('Contact /contact-us/', fn() => $contactController->index());

// Legal pages
warm('Privacy Policy /privacy-policy/', fn() => $legalController->privacy());
warm('Terms /terms-and-condition/', fn() => $legalController->terms());
warm('Cookies /cookie-policy/', fn() => $legalController->cookies());

// Sitemap HTML page (if you want it cached)
warm('Sitemap page /sitemap/', fn() => $pageController->sitemap());

// XML sitemap (not using PageCache, but good to hit once)
warm('Sitemap XML /sitemap.xml', fn() => $seoController->sitemap());

// ---------------------------------------------------------
// Services (index + all enabled service detail pages)
// ---------------------------------------------------------
warm('Services index /services/', fn() => $serviceController->index());

$services = config('services', []);
foreach ($services as $service) {
    if (empty($service['enabled'] ?? false)) {
        continue;
    }

    if (empty($service['slug'])) {
        continue; // skip badly configured entries
    }

    $normalized = trim((string) $service['slug'], '/'); // e.g. "services/custom-software-development"
    $parts      = explode('/', $normalized);
    $slug       = end($parts); // "custom-software-development"

    if (!$slug) {
        continue;
    }

    warm("Service detail /services/{$slug}/", fn() => $serviceController->show($slug));
}

// ---------------------------------------------------------
// Industries (index + all enabled industry pages)
// ---------------------------------------------------------
warm('Industries index /industries/', fn() => $industryController->index());

$industries = config('industries', []);
foreach ($industries as $industry) {
    if (empty($industry['enabled'] ?? false)) {
        continue;
    }

    if (empty($industry['slug'])) {
        continue;
    }

    $normalized = trim((string) $industry['slug'], '/'); // "industries/fintech"
    $parts      = explode('/', $normalized);
    $slug       = end($parts); // "fintech"

    if (!$slug) {
        continue;
    }

    warm("Industry detail /industries/{$slug}/", fn() => $industryController->show($slug));
}

// ---------------------------------------------------------
// Technologies (index + all enabled technology pages)
// ---------------------------------------------------------
warm('Technologies index /technologies/', fn() => $technologyController->index());

$technologies = config('technologies', []);
foreach ($technologies as $technology) {
    if (empty($technology['enabled'] ?? false)) {
        continue;
    }

    if (empty($technology['slug'])) {
        continue;
    }

    $normalized = trim((string) $technology['slug'], '/'); // "technologies/reactjs"
    $parts      = explode('/', $normalized);
    $slug       = end($parts); // "reactjs"

    if (!$slug) {
        continue;
    }

    warm("Technology detail /technologies/{$slug}/", fn() => $technologyController->show($slug));
}

// ---------------------------------------------------------
// Case studies (all enabled case study pages)
// ---------------------------------------------------------
$caseStudies = config('case_studies', []);
foreach ($caseStudies as $cs) {
    if (empty($cs['enabled'] ?? true) === false) {
        // if you have enabled flag, adjust here – for now assume enabled if not false
    }

    if (empty($cs['slug'])) {
        continue;
    }

    $normalized = trim((string) $cs['slug'], '/'); // "case-studies/snappystats"
    $parts      = explode('/', $normalized);
    $slug       = end($parts); // "snappystats"

    if (!$slug) {
        continue;
    }

    warm("Case study /case-studies/{$slug}/", fn() => $caseStudyController->show($slug));
}

// ---------------------------------------------------------
// Hire developers (index + each dedicated role page)
// ---------------------------------------------------------
warm('Hire index /hire-developers/', fn() => $hireController->index ?? null);

// Individual roles via dedicated routes
warm('Hire Node.js /hire-nodejs-developers/', fn() => $hireController->nodejs());
warm('Hire Laravel /hire-laravel-developers/', fn() => $hireController->laravel());
warm('Hire PHP /hire-php-developers/', fn() => $hireController->php());
warm('Hire ReactJS /hire-reactjs-developers/', fn() => $hireController->reactjs());
warm('Hire Next.js /hire-nextjs-developers/', fn() => $hireController->nextjs());
warm('Hire Flutter /hire-flutter-developers/', fn() => $hireController->flutter());
warm('Hire MVP /hire-mvp-developers/', fn() => $hireController->mvp());
warm('Hire Full-stack JS /hire-full-stack-javascript-developers/', fn() => $hireController->fullstack());

// ---------------------------------------------------------
// Process pages (start-up MVP, product scaling, etc.)
// ---------------------------------------------------------
warm('Process – Startup MVP /start-up-mvp/', fn() => $processController->startUpMvp());
warm('Process – Product scaling /product-scaling/', fn() => $processController->productScaling());
warm('Process – Digital transformation /digital-transformation/', fn() => $processController->digitalTransformation());
warm('Process – Engagement model /engagement-model/', fn() => $processController->engagementModel());

// ---------------------------------------------------------
// Geo-location pages (all enabled locations in config/geo.php)
// ---------------------------------------------------------
$locations = config('geo', []);
foreach ($locations as $location) {
    if (empty($location['enabled'] ?? false)) {
        continue;
    }

    $country = $location['country_key'] ?? null;
    $state   = $location['state_key']   ?? null;

    if (!$country || !$state) {
        continue;
    }

    warm("Geo /{$country}/{$state}/", fn() => $geoController->show($country, $state));
}

echo "Warm-up complete.\n";
