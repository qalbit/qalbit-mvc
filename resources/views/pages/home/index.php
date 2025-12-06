<?php
    $heroPill = "Trusted By 50+ Clients";
    $heroHeading = "Drive Success with <span class='text-gradient-brand-animated'>Custom Software Development</span>.";
    $heroDescription = "Collaborate with expert developers who build scalable, high-performing
                    custom software — tailored to your goals and built to grow with your business.";
    $heroImage = "images/hero/custom-software-development.svg";
    include __DIR__ . '/../../partials/hero/default.php';

?>

<?php include __DIR__ . '/../../partials/home/review-strip.php'; ?>

<?php
    // Services block
    if (!empty($services)) {
        $title    = 'Custom <span class="bg-gradient-accent text-white px-2 rounded-xs">Software Development</span> services that power real-world growth.';
        $subtitle = 'Partner with our dedicated team of software professionals, mastering 100+ technologies to build scalable solutions that grow with your business.';
        include __DIR__ . '/../../partials/services/section.php';
    }
?>

<?php
    // Industries block
    if (!empty($industries)) {
        $title = 'Tailored <span class="bg-gradient-accent text-white px-2 rounded-xs">software solutions</span> built for your industry’s success.';
        $subtitle = 'QalbIT builds custom software, mobile apps and cloud platforms for e-commerce, entertainment, fintech, travel, food delivery, sports, healthcare, education, real estate, social networking and business operations.';
        include __DIR__ . '/../../partials/industries/section.php';
    }
?>

<?php
    // Process block
    include __DIR__ . '/../../partials/home/process.php';
?>

<?php
    // Case Studies block
    if (!empty($caseStudies)) {
        $title = 'Real products, <span class="bg-gradient-accent text-white px-1 rounded-xs">shipped with QalbIT</span>.';
        $subtitle = 'Explore how we’ve helped startups and businesses launch reminder apps, club management systems, shooting analytics tools, and hiring platforms with robust UI/UX, web, and mobile development.';
        include __DIR__ . '/../../partials/case-study/section.php';
    }
?>

<?php
    // Reviews block
    if (!empty($reviews)) {
        $title    = 'Teams who trusted QalbIT';
        $subtitle = 'Short feedback from clients and products we work on across web, mobile, SaaS and internal tools.';
        include __DIR__ . '/../../partials/reviews/section.php';
    }
?>

<?php
    // Technology block
    if (!empty($technologies)) {
        $title    = 'Technologies we build and support';
        $subtitle = 'From Laravel and Node.js backends to React.js, Next.js and Flutter frontends, we help teams build and support reliable web, mobile and SaaS products.';
        include __DIR__ . '/../../partials/technologies/section.php';
    }
?>

<?php
    // Clients block
    if (!empty($clients)) {
        $title    = 'Trusted by ambitious startups and global teams';
        $subtitle = 'A few of the SaaS products, marketplaces, agencies and enterprises that rely on QalbIT for web, mobile and platform development.';
        include __DIR__ . '/../../partials/clients/section.php';
    }
?>

<?php
    // CTA block
    include __DIR__ . '/../../partials/cta/team-cta.php';
?>

<?php
    if (!empty($faqs)) {
        $title    = 'Frequently asked questions about working with QalbIT';
        $subtitle = 'These are some of the questions we usually answer in first or second calls.';
        include __DIR__ . '/../../partials/faq/section.php';
    }
?>

<?php
    if (!empty($blogPosts)) {
        $title    = 'From the QalbIT blog';
        $subtitle = 'Short articles about software development, SaaS and project decisions.';
        $posts    = $blogPosts;
        include __DIR__ . '/../../partials/blog/teaser.php';
    }
?>

<?php
    // CTA block – pass contact flash state into the CTA + small form
    $errors  = $contactErrors  ?? [];
    $old     = $contactOld     ?? [];
    $success = $contactSuccess ?? null;
    $leadFrom= 'lead_home_page';

    include __DIR__ . '/../../partials/contact/cta-section.php';
?>