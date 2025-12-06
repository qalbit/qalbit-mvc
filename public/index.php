<?php

session_start();

// FRONT CONTROLLER

$router = require __DIR__ . '/../bootstrap/app.php';

use App\Controllers\CareersController;
use App\Controllers\ContactController;
use App\Controllers\ErrorController;
use App\Controllers\GeoController;
use App\Controllers\HireController;
use App\Controllers\IndustryController;
use App\Controllers\PageController;
use App\Controllers\ServiceController;
use App\Controllers\SeoController;
use App\Controllers\CaseStudyController;
use App\Controllers\ProcessController;
use App\Controllers\TechnologyController;

// Error handlers
$router->setNotFoundHandler([ErrorController::class, 'notFound']);
$router->setErrorHandler([ErrorController::class, 'serverError']);

// Register routes
$router->get('/', [PageController::class, 'home']);

$router->get('/about-us/', [PageController::class, 'about']);
$router->get('/portfolio/', [PageController::class, 'portfolio']);
$router->get('/career/', [PageController::class, 'careers']);
$router->get('/career/apply/', [CareersController::class, 'apply']);

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
$router->get('/case-studies/', [CaseStudyController::class, 'index']);
$router->get('/case-studies/{slug}/', [CaseStudyController::class, 'show']);

// Technologies
$router->get('/technologies/', [TechnologyController::class, 'index']);
$router->get('/technologies/{slug}/', [TechnologyController::class, 'show']);

// Our Process Pages
$router->get('/{slug}/', [ProcessController::class, 'show']);

// Policy Pages
$router->get('/privacy-policy/', [PageController::class, 'privacyPolicy']);
$router->get('/terms-and-condition/', [PageController::class, 'termsOfService']);
$router->get('/cookie-policy/', [PageController::class, 'cookiePolicy']);
$router->get('/sitemap/', [PageController::class, 'sitemap']);

// Contact
$router->get('/contact-us/', [ContactController::class, 'showForm']);
$router->post('/contact-us/', [ContactController::class, 'submit']);

// SEO: sitemap
$router->get('/sitemap.xml', [SeoController::class, 'sitemap']);

// Geolocations 
$router->get('/{country}/', [GeoController::class, 'indexCountry']);
$router->get('/{country}/{state}/', [GeoController::class, 'show']);

// Dispatch current request
$router->dispatch();