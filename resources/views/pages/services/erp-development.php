<?php
/**
 * /services/erp-development/
 *
 * This page renders through its own template rather than pages/services/show.php
 * because most of its seventeen sections have no equivalent in the shared
 * service partials. Sections that DO map cleanly to an existing partial reuse
 * it unchanged (§5, §7, §8, §12, §15, §16, §17) and read their content from
 * config/services.php as every other service page does.
 *
 * Bespoke section content lives in config/erp_page.php.
 *
 * SCOPE WARNING: these are `include`s, so every partial shares one variable
 * scope. New variables introduced here are prefixed `erp*` to avoid colliding
 * with the generic $title / $eyebrow / $sectionId / $cta that the shared
 * service partials assign.
 *
 * The three CTA bands share one partial. `$erpBandVariant` selects its
 * treatment: 'poster' is the accent-filled block used mid-page, 'final' is the
 * dark closing block. The variable is set immediately before each include.
 *
 * @var array $service  config('services.erp_development')
 * @var array $faqs     config('faqs.service_erp_development')
 */
$service = $service ?? [];
$faqs    = $faqs    ?? [];
$erp     = config('erp_page', []);
?>

<?php /* Page-scoped width. Every section on this page — including the reused
         shared partials, which hardcode max-w-6xl — widens to the site's own
         2xl container token (1320px) via one rule on this wrapper, so the
         whole page stays on a single alignment grid. No shared partial is
         touched and no other page is affected. */ ?>
<div class="erp-page">

<?php /* §1 — Hero, inline form, snapshot strip */ ?>
<?php include __DIR__ . '/../../partials/services/erp/hero.php'; ?>

<?php /* §2 — What is custom ERP development (inline CTA: erp-fit-check) */ ?>
<?php include __DIR__ . '/../../partials/services/erp/definition.php'; ?>

<?php /* §3 — When to build, and when not to */ ?>
<?php include __DIR__ . '/../../partials/services/erp/build-vs-buy.php'; ?>

<?php /* CTA BAND 1 — build-vs-buy */ ?>
<?php $erpBand = $erp['bands']['build_vs_buy'] ?? []; $erpBandVariant = 'poster'; include __DIR__ . '/../../partials/services/erp/cta-band.php'; ?>

<?php /* §4 — Comparison table (inline CTA: erp-tco) */ ?>
<?php include __DIR__ . '/../../partials/services/erp/comparison.php'; ?>

<?php /* §5 — Modules. Own partial rather than the shared capabilities one,
         which renders dark and is shared with 20 pages. Content still comes
         from config('services.erp_development.capabilities'). */ ?>
<?php include __DIR__ . '/../../partials/services/erp/modules.php'; ?>

<?php /* §6 — Cost (inline CTA: erp-estimate + calculator) */ ?>
<?php include __DIR__ . '/../../partials/services/erp/cost.php'; ?>

<?php /* §7 — Process (shared partial; its own button CTA is unset in config
         because the CTA map places no CTA here). The sourced Panorama note
         follows, rendered separately so the shared partial stays untouched. */ ?>
<?php include __DIR__ . '/../../partials/services/erp/process.php'; ?>
<?php include __DIR__ . '/../../partials/services/erp/process-note.php'; ?>

<?php /* Photograph band — a visual beat after four dense text sections. No copy. */ ?>
<?php include __DIR__ . '/../../partials/services/erp/photo-band.php'; ?>

<?php /* §8 — Project types (own partial; inline CTA rendered inside it) */ ?>
<?php include __DIR__ . '/../../partials/services/erp/use-cases.php'; ?>
<?php /* §9 — Industries (no links, by design) */ ?>
<?php include __DIR__ . '/../../partials/services/erp/industries.php'; ?>

<?php /* CTA BAND 2 — industry */ ?>
<?php $erpBand = $erp['bands']['industry'] ?? []; $erpBandVariant = 'poster'; include __DIR__ . '/../../partials/services/erp/cta-band.php'; ?>

<?php /* §10 — GCC compliance (inline CTA: erp-gcc-compliance) */ ?>
<?php include __DIR__ . '/../../partials/services/erp/gcc-compliance.php'; ?>

<?php /* §11 — Integrations */ ?>
<?php include __DIR__ . '/../../partials/services/erp/integrations.php'; ?>

<?php /* §12 — Tech stack (reuses the shared stack partial) */ ?>
<?php include __DIR__ . '/../../partials/services/erp/tech-stack.php'; ?>

<?php /* §13 — Outcomes table + sourced note */ ?>
<?php include __DIR__ . '/../../partials/services/erp/outcomes.php'; ?>

<?php /* §14 — Why QalbIT */ ?>
<?php include __DIR__ . '/../../partials/services/erp/why-us.php'; ?>

<?php /* §15 — FAQ. Own component: open answers, no accordion, no JS.
         Variables are prefixed `erpFaq` — the generic `$title`/`$subtitle`
         this block used to set leaked into the shared include scope. */ ?>
<?php if (!empty($faqs)): ?>
    <?php
        $erpFaqTitle    = $service['faq_title']    ?? 'Frequently asked questions about custom ERP development';
        $erpFaqSubtitle = $service['faq_subtitle'] ?? '';
        $erpFaqEyebrow  = $service['faq_eyebrow']  ?? 'FAQs · Custom ERP development';
        $erpFaqCta      = [
            'title' => 'Have a question that is not listed here?',
            'body'  => 'Tell us how orders, stock and purchasing move through your business today.',
            'label' => 'Talk to the team',
            'href'  => '/contact-us/?topic=erp-development',
            'aria'  => 'Talk to QalbIT about a custom ERP project',
        ];

        include __DIR__ . '/../../partials/services/erp/faq.php';
    ?>
<?php endif; ?>

<?php /* §16 — Related resources (own component; shared partial left for the other three templates) */ ?>
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

if (!empty($service['resources']['links'])) {
    $relatedGroups[] = [
        'title'  => $service['resources']['title'] ?? 'Further reading',
        'accent' => true,
        'links'  => $service['resources']['links'],
    ];
}

include __DIR__ . '/../../partials/services/erp/related.php';
?>

<?php /* CTA BAND 3 / §17 — final. Uses the ERP band rather than the shared
         service-cta partial so the copy matches the content document. */ ?>
<?php $erpBand = $erp['bands']['final'] ?? []; $erpBandVariant = 'final'; include __DIR__ . '/../../partials/services/erp/cta-band.php'; ?>

</div>
