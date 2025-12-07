<?php

session_start();

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
use App\Controllers\CaseStudyController;
use App\Controllers\HomeController;
use App\Controllers\LegalController;
use App\Controllers\PortfolioController;
use App\Controllers\ProcessController;
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

// Hire developers
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
$router->get('/services/{slug}/', [ServiceController::class, 'show']);

// Industries
$router->get('/industries/', [IndustryController::class, 'index']);
$router->get('/industries/{slug}/', [IndustryController::class, 'show']);

// Case studies
$router->get('/case-studies/{slug}/', [CaseStudyController::class, 'show']);

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

// SEO: sitemap
$router->get('/sitemap.xml', [SeoController::class, 'sitemap']);

// Geolocations 
$router->get('/{country}/{state}/', [GeoController::class, 'show']);

// Dispatch current request
$router->dispatch();