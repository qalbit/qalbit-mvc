<?php
/** @var array $service */
$service = $service ?? [];
$faqs    = $faqs    ?? [];
?>

<?php include __DIR__ . '/../../partials/services/service-hero.php'; ?>

<?php include __DIR__ . '/../../partials/services/service-overview.php'; ?>

<?php include __DIR__ . '/../../partials/services/service-capabilities.php'; ?>

<?php include __DIR__ . '/../../partials/services/service-process.php'; ?>

<?php include __DIR__ . '/../../partials/services/service-use-cases.php'; ?>

<?php include __DIR__ . '/../../partials/services/service-tech-stack.php'; ?>

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
        'title' => 'Plan your project',
        'links' => [
            ['label' => 'Software Development Cost Calculator – free instant estimate', 'href' => '/tools/software-development-cost-calculator/', 'title' => 'Estimate your software development cost for free'],
            ['label' => 'Client case studies & outcomes',                               'href' => '/case-studies/',                               'title' => 'Case studies of software we have shipped'],
            ['label' => 'Our engagement models',                                        'href' => '/engagement-model/',                           'title' => 'Fixed price, dedicated team and hybrid engagement models'],
        ],
    ],
    [
        'title' => 'Build your team',
        'links' => [
            ['label' => 'Hire dedicated developers',  'href' => '/hire-developers/',  'title' => 'Hire dedicated developers in India – all profiles'],
            ['label' => 'Explore our portfolio',      'href' => '/portfolio/',        'title' => 'Selected projects from the QalbIT portfolio'],
            ['label' => 'Talk to our team',           'href' => '/contact-us/',       'title' => 'Contact QalbIT about your project'],
        ],
    ],
];

// Per-service further-reading links (e.g. cost guides and comparison articles).
if (!empty($service['resources']['links'])) {
    $relatedGroups[] = [
        'title'  => $service['resources']['title'] ?? 'Further reading',
        'accent' => true,
        'links'  => $service['resources']['links'],
    ];
}

include __DIR__ . '/../../partials/cta/related-links.php';
?>

<?php include __DIR__ . '/../../partials/services/service-cta.php'; ?>
