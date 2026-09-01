<?php
/**
 * /services/crm-development/
 *
 * Renders through the ERP page's component set. Not a copy of it — the same
 * files. `resources/views/partials/services/erp/*` are the design system for
 * both pages. Two sections do not use them: §3 (the seat-cost tier matrix) has
 * no ERP equivalent at all, and §4 was forked off the ERP ledger once the
 * design comp moved enough of its measurements that sharing would have meant
 * putting a page conditional in a shared file. Both live under
 * `partials/services/crm/`.
 *
 * HOW THE REUSE WORKS, AND WHY IT LOOKS ODD
 *
 * Those partials read their content from a variable called `$erp`. The ERP
 * template sets it to `config('erp_page')`; this one sets it to
 * `config('crm_page')`. That single line is the whole mechanism — no partial
 * was forked, and none contains a page conditional.
 *
 * Two consequences worth naming before someone "fixes" them:
 *
 *   1. THE WRAPPER CARRIES `erp-page`. Every rule in the page's design system
 *      is scoped `.erp-page …` — roughly 400 of them. `.erp-page` is the
 *      design system's scope, not a statement about which page you are on.
 *      Renaming it to something neutral is the right cleanup eventually, but
 *      it is a rewrite of the whole stylesheet against a live page, so it is
 *      not being done as a side effect of adding this one. `crm-page` sits
 *      alongside it and carries CRM-only rules (currently the §3 table
 *      reflow).
 *   2. VARIABLES ARE `$erp*` INSIDE THE PARTIALS. Same reason. `View::render()`
 *      uses `include` + `extract()`, so every partial shares ONE variable
 *      scope and the prefix is what stops them colliding with each other and
 *      with the shared service partials' generic `$title` / `$cta`.
 *
 * §10 AND §11 BOTH USED TO RENDER THROUGH erp/integrations.php. Neither does
 * now. That partial is a three-part light/dark/light CONTRAST with fixed slots
 * named `modern` / `legacy` / `everything_else`, and the darkness of the middle
 * slot is its argument. Migration is three equal vendors and Integrations is
 * three equally routine connection families; neither has a contrast to make, so
 * in both cases the slot names described nothing real and the content bent to
 * fit them. On the migration side that cost real accuracy — see
 * `partials/services/crm/migration.php`. `cta-band.php` still uses the
 * `$erpBand` handover for its three bands, which is the pattern that made the
 * shared version look reasonable in the first place.
 *
 * NO PHOTOGRAPH BAND. The ERP page breaks its text run with an operations
 * photograph. There is no CRM equivalent asset, and a generic stock image
 * beside this page's compliance and pricing claims would be decoration
 * pretending to be evidence. The section is simply not included.
 *
 * CONTENT SPLIT, same as the ERP page: bespoke sections read from
 * config/crm_page.php; sections that reuse a shared service partial (§5, §7,
 * §8, §12, §16) read from config/services.php under `crm_development`.
 *
 * @var array $service  config('services.crm_development')
 * @var array $faqs     config('faqs.service_crm_development')
 */
$service = $service ?? [];
$faqs    = $faqs    ?? [];
$erp     = config('crm_page', []);
?>

<div class="erp-page crm-page">

<?php /* §1 — Hero, inline form, snapshot strip.
         The form is the ERP form unchanged, by instruction — four fields, no
         selects. See the note in config/crm_page.php under `form` for what
         that drops and why it is recorded rather than silently different. */ ?>
<?php include __DIR__ . '/../../partials/services/erp/hero.php'; ?>

<?php /* §2 — What is custom CRM development (inline CTA: crm-fit-check) */ ?>
<?php include __DIR__ . '/../../partials/services/erp/definition.php'; ?>

<?php /* §3 — What a commercial CRM seat actually costs (inline CTA: crm-tco).
         The page's one bespoke component. */ ?>
<?php include __DIR__ . '/../../partials/services/crm/seat-costs.php'; ?>

<?php /* §4 — When you should buy instead. FORKED from the ERP ledger rather
         than shared: the comp moves the ground, the header ratio, the heading
         scale, the ledger rule and the whole ecosystem/closing arrangement.
         See that file's docblock for why props were the wrong answer. */ ?>
<?php include __DIR__ . '/../../partials/services/crm/build-vs-buy.php'; ?>

<?php /* CTA BAND 1 — build-vs-buy-crm */ ?>
<?php $erpBand = $erp['bands']['build_vs_buy'] ?? []; $erpBandVariant = 'poster'; include __DIR__ . '/../../partials/services/erp/cta-band.php'; ?>

<?php /* §5 — CRM modules (inline CTA: crm-module-scope). Content comes from
         config('services.crm_development.capabilities'), as on the ERP page.
         No dashboard still: there is no CRM screenshot asset, and the figure
         is skipped rather than framing a missing file. */ ?>
<?php include __DIR__ . '/../../partials/services/erp/modules.php'; ?>

<?php /* §6 — Cost (inline CTA: crm-estimate + calculator). Publishes no price
         for our own work, deliberately — that is the section's argument. */ ?>
<?php include __DIR__ . '/../../partials/services/erp/cost.php'; ?>

<?php /* §7 — Process, plus the adoption note published beneath the stages. */ ?>
<?php include __DIR__ . '/../../partials/services/erp/process.php'; ?>
<?php include __DIR__ . '/../../partials/services/erp/process-note.php'; ?>

<?php /* §8 — CRM projects we take on (inline CTA: crm-use-case) */ ?>
<?php include __DIR__ . '/../../partials/services/erp/use-cases.php'; ?>

<?php /* §9 — Verticals. THREE, not four: fintech was removed deliberately.
         No links, by design — none of these has a matching /industries/ page
         and a near-match is worse than none.

         $erpIndAfter nests "Where your data lives" INSIDE this section, which
         is where the design comp puts it: it is the evidence for the verticals
         argument, it needs this section's surface band under it, and its
         heading is an <h3> beneath this section's <h2>. industries.php unsets
         the variable on the way out. */ ?>
<?php $erpIndAfter = __DIR__ . '/../../partials/services/crm/data-residency.php'; ?>
<?php include __DIR__ . '/../../partials/services/erp/industries.php'; ?>

<?php /* CTA BAND 2 — crm-compliance */ ?>
<?php $erpBand = $erp['bands']['industry'] ?? []; $erpBandVariant = 'poster'; include __DIR__ . '/../../partials/services/erp/cta-band.php'; ?>

<?php /* §10 — Migration. FORKED off the integrations partial rather than
         rendered through it: that partial is a three-part light/dark/light
         CONTRAST, and forcing three equal vendors into its slots had put the
         HubSpot export caveat inside the Salesforce block and demoted Zoho to a
         closing line. See that file's docblock. */ ?>
<?php include __DIR__ . '/../../partials/services/crm/migration.php'; ?>

<?php /* §11 — Integrations. FORKED off the ERP partial for one reason: its
         middle block is a dark inset panel arguing that legacy interfaces are
         the hard half of that section. These three families are not a
         contrast. See that file's docblock. */ ?>
<?php include __DIR__ . '/../../partials/services/crm/integrations.php'; ?>

<?php /* §12 — Tech stack */ ?>
<?php include __DIR__ . '/../../partials/services/erp/tech-stack.php'; ?>

<?php /* §13 — Outcomes table + the Nucleus note. That note replaces a
         flattering statistic rather than adding one; do not "balance" it. */ ?>
<?php include __DIR__ . '/../../partials/services/erp/outcomes.php'; ?>

<?php /* §14 — Why QalbIT. LiftUp is OUR OWN PRODUCT throughout and carries the
         page's single outbound link. Never reframe it as client work. */ ?>
<?php include __DIR__ . '/../../partials/services/erp/why-us.php'; ?>

<?php /* §15 — FAQ, twelve items.
         Uses the ERP page's accordion rather than partials/faq/section.php,
         which is why this page carries none of that partial's shared default
         boilerplate ("FAQs · Custom software & teams" and the three ✓ bullets
         about SaaS and mobile apps). Nothing had to be deleted from the shared
         file to achieve that — the other ten service pages still use it and
         still need its defaults. */ ?>
<?php if (!empty($faqs)): ?>
    <?php
        $erpFaqTitle    = $service['faq_title']    ?? 'Frequently asked questions about custom CRM development';
        $erpFaqSubtitle = $service['faq_subtitle'] ?? '';
        $erpFaqEyebrow  = $service['faq_eyebrow']  ?? 'FAQs · Custom CRM development';
        $erpFaqCta      = [
            'title' => 'Have a question that is not listed here?',
            'body'  => 'Tell us what your team uses today, what it costs, and which part of your process the current tool cannot hold.',
            'label' => 'Talk to the team',
            'href'  => '/contact-us/?topic=crm-development',
            'aria'  => 'Talk to QalbIT about a custom CRM project',
        ];

        include __DIR__ . '/../../partials/services/erp/faq.php';
    ?>
<?php endif; ?>

<?php /* §16 — Related resources */ ?>
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

<?php /* CTA BAND 3 / §17 — final */ ?>
<?php $erpBand = $erp['bands']['final'] ?? []; $erpBandVariant = 'final'; include __DIR__ . '/../../partials/services/erp/cta-band.php'; ?>

</div>
