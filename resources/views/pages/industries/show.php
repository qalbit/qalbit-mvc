<?php
/** @var array $industry */
$industry = $industry ?? [];
$faqs     = $faqs     ?? [];
?>

<?php include __DIR__ . '/../../partials/industries/industry-hero.php' ?>

<?php include __DIR__ . '/../../partials/industries/industry-overview.php' ?>

<?php include __DIR__ . '/../../partials/industries/industry-capabilities.php' ?>

<?php include __DIR__ . '/../../partials/industries/industry-process.php' ?>

<?php include __DIR__ . '/../../partials/industries/industry-use-cases.php' ?>

<?php include __DIR__ . '/../../partials/industries/industry-tech-stack.php' ?>

<?php if (!empty($faqs)): ?>
    <?php
        $title = $service['faq_title']
            ?? ('Frequently asked questions about ' . ($service['name'] ?? 'our services'));

        $subtitle = $service['faq_subtitle']
            ?? ('These are some of the questions we usually answer on early calls for '
                . strtolower($service['name'] ?? 'projects') . '.');

        include __DIR__ . '/../../partials/faq/section.php';
    ?>
<?php endif; ?>

<?php
$relatedGroups = [
    [
        'title' => 'Services for this industry',
        'links' => [
            ['label' => 'Custom Software Development', 'href' => '/services/custom-software-development/', 'title' => 'Custom software development services'],
            ['label' => 'CRM Development',             'href' => '/services/crm-development/',             'title' => 'Custom CRM development services'],
            ['label' => 'ERP Development',             'href' => '/services/erp-development/',             'title' => 'Custom ERP development services'],
            ['label' => 'MVP Development',             'href' => '/services/mvp-development/',             'title' => 'MVP development for startups'],
            ['label' => 'Mobile App Development',      'href' => '/services/mobile-development/',          'title' => 'Mobile app development services'],
        ],
    ],
    [
        'title' => 'See our work & plan yours',
        'links' => [
            ['label' => 'Client case studies & outcomes',                               'href' => '/case-studies/',                               'title' => 'Case studies of software we have shipped'],
            ['label' => 'Explore our portfolio',                                        'href' => '/portfolio/',                                  'title' => 'Selected projects from the QalbIT portfolio'],
            ['label' => 'Software Development Cost Calculator – free instant estimate', 'href' => '/tools/software-development-cost-calculator/', 'title' => 'Estimate your software development cost for free'],
            ['label' => 'Hire dedicated developers',                                    'href' => '/hire-developers/',                            'title' => 'Hire dedicated developers in India – all profiles'],
        ],
    ],
];
include __DIR__ . '/../../partials/cta/related-links.php';
?>

<?php include __DIR__ . '/../../partials/industries/industry-cta.php'; ?>