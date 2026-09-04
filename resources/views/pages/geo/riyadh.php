<?php
/**
 * /saudi-arabia/riyadh/
 *
 * A STANDALONE PAGE. It does not go through pages/geo/show.php and it shares no
 * partial with the other eighteen location pages. Those pages are live and this
 * rebuild leaves every file they touch — GeoController, geo/show.php, all ten
 * partials/geo/*, config/geo.php — byte-identical. Riyadh is decoupled by a
 * static route registered above the /{country}/{state}/ catch-all in
 * public/index.php; the router matches static routes before dynamic ones, so
 * the route shadows GeoController without any change to it. The Riyadh entry in
 * config/geo.php is deliberately left enabled and untouched so the sitemap and
 * the footer's locations list keep working.
 *
 * WHY IT LOOKS LIKE A SERVICE PAGE. It renders on the ERP page's design system,
 * the same way /services/crm-development/ does: the wrapper carries `erp-page`
 * (the design system's SCOPE, not a claim about which page you are on — see the
 * long note at the top of pages/services/crm-development.php), and the shared
 * partials under partials/services/erp/ read their copy from `$erp`, which this
 * template points at config('riyadh_page'). That one assignment is the whole
 * mechanism. No ERP partial was edited, forked or given a page conditional.
 *
 * layouts/main.php sniffs the `erp-page` class out of the rendered content as a
 * TOKEN, so this page gets the design system's stylesheet scope and erp-page.js
 * (scroll reveal, the FAQ accordion, the photo spotlight) automatically. It
 * does NOT get location-detail.js, because its $pageId is 'riyadh' rather than
 * 'location-detail' — that 479-line file drives the geo partials this page does
 * not use.
 *
 * THREE SECTIONS USE PARTIALS UNDER partials/services/riyadh/ INSTEAD. Each one
 * is justified in its own docblock and none of them was a preference:
 *   §1  hero        — the ERP hero hardcodes a /services/ breadcrumb level and
 *                     a /\bERP\b/ accent regex.
 *   §6  comparison  — both existing ledgers on this system are cost models; this
 *                     section has no prices in it by argument.
 *   §14 compliance  — the ERP row shape is one string; these rows need two
 *                     paragraphs, a caveat and a dated source line.
 *
 * SCOPE WARNING: these are `include`s, so every partial shares ONE variable
 * scope. Variables introduced here are prefixed `riy*`; the shared partials use
 * `$erp*` and the two new ones use `$riyCmp*` / `$riyCmpl*`.
 *
 * @var array $seo
 * @var array $faqs  config('riyadh_faqs')
 */
$faqs = $faqs ?? [];

// The two halves of the reuse contract. `$erp` feeds the bespoke sections;
// `$service` feeds the four shared partials (modules, process, tech-stack,
// use-cases) that read a service's own config entry on the two service pages.
// This page is a location and has no entry in config/services.php, so it hands
// them the sub-array instead.
$erp     = config('riyadh_page', []);
$service = $erp['service'] ?? [];
?>

<div class="erp-page riyadh-page">

<?php /* §1 — Hero: kicker, accented H1, intro, pull-quote, dark enquiry card,
         stats rule and meta rule. Forked hero; unforked enquiry card. */ ?>
<?php include __DIR__ . '/../../partials/services/riyadh/hero.php'; ?>

<?php /* §2 + §3 — Definition, then the three-way disambiguation. ONE partial:
         erp/definition.php renders prose + dark answer card, then the `terms`
         row whose LAST entry takes the accent — which is the deck's third
         option, "remote engineering partner". */ ?>
<?php include __DIR__ . '/../../partials/services/erp/definition.php'; ?>

<?php /* §4 — When a remote partner is right, and when it is not. */ ?>
<?php include __DIR__ . '/../../partials/services/erp/build-vs-buy.php'; ?>

<?php /* §5 — CTA band 1. */ ?>
<?php $erpBand = $erp['bands']['fit'] ?? []; $erpBandVariant = 'poster'; include __DIR__ . '/../../partials/services/erp/cta-band.php'; ?>

<?php /* §6 — Comparison ledger (new component; see its docblock). */ ?>
<?php include __DIR__ . '/../../partials/services/riyadh/comparison.php'; ?>

<?php /* §7 — What we build. Dark card grid; the accent cell lands on the LAST
         card, which the partial hardcodes. See open item #4. */ ?>
<?php include __DIR__ . '/../../partials/services/erp/modules.php'; ?>

<?php /* §8 — Cost. */ ?>
<?php include __DIR__ . '/../../partials/services/erp/cost.php'; ?>

<?php /* §9 — Process, then the sourced working-week callout. */ ?>
<?php include __DIR__ . '/../../partials/services/erp/process.php'; ?>
<?php include __DIR__ . '/../../partials/services/erp/process-note.php'; ?>

<?php /* §10 — Photograph band. Decorative by decision: alt="" and aria-hidden.
         Its own partial, because erp/photo-band.php hardcodes the asset path
         and dimensions and takes no config. The photograph is a real Saudi
         distribution floor — Arabic rack signage, Vision 2030 graphics, the
         Riyadh skyline — replacing the generic ERP operations shot this page
         was borrowing. */ ?>
<?php include __DIR__ . '/../../partials/services/riyadh/photo-band.php'; ?>

<?php /* §11 — Projects we take on. */ ?>
<?php include __DIR__ . '/../../partials/services/erp/use-cases.php'; ?>

<?php /* §12 — Industries. */ ?>
<?php include __DIR__ . '/../../partials/services/erp/industries.php'; ?>

<?php /* §13 — CTA band 2. */ ?>
<?php $erpBand = $erp['bands']['process'] ?? []; $erpBandVariant = 'poster'; include __DIR__ . '/../../partials/services/erp/cta-band.php'; ?>

<?php /* §14 — ZATCA, PDPL and data residency (new component; see its docblock).
         The section the live page was missing entirely. */ ?>
<?php include __DIR__ . '/../../partials/services/riyadh/compliance.php'; ?>

<?php /* §15 — The honest version. erp/integrations.php renders a light/DARK/light
         contrast; the four exposures are the dark datasheet and the deck's blue
         callout is that panel's `closing` slot. No `modern` row — the deck
         supplies no light opening block and the partial skips a titleless one. */ ?>
<?php include __DIR__ . '/../../partials/services/erp/integrations.php'; ?>

<?php /* §16 — Tech stack. Column 02 accented via config. */ ?>
<?php include __DIR__ . '/../../partials/services/erp/tech-stack.php'; ?>

<?php /* §17 — Outcomes table + the sourcing callout. */ ?>
<?php include __DIR__ . '/../../partials/services/erp/outcomes.php'; ?>

<?php /* §18 — Why work with us. Heading levels shift by one against the deck;
         see the note in config/riyadh_page.php and open item #3. */ ?>
<?php include __DIR__ . '/../../partials/services/erp/why-us.php'; ?>

<?php /* §19 — FAQ. Native <details> accordion, no JS. The answers here and the
         FAQPage JSON-LD RiyadhController emits come from the same config
         strings, so they match character for character by construction. */ ?>
<?php if (!empty($faqs)): ?>
    <?php
        $erpFaqEyebrow  = 'FAQs · Custom software development in Saudi Arabia';
        $erpFaqTitle    = 'Frequently asked questions from Saudi teams';
        $erpFaqSubtitle = 'These are the questions founders, operations heads and finance teams actually ask when they compare a remote partner with a local agency.';
        $erpFaqCta      = [
            'title' => 'Have a question that is not listed here?',
            'body'  => 'Tell us how work moves through your business today.',
            'label' => 'Talk to the team',
            'href'  => '/contact-us/?topic=riyadh-software-development',
            // MUST CONTAIN THE VISIBLE LABEL VERBATIM. WCAG 2.5.3 (Label in
            // Name) requires the accessible name to include the visible text,
            // so that someone saying "talk to the team" to a voice control
            // actually activates this link. An aria-label that replaces the
            // label rather than extending it fails the check — which is what
            // "Talk to QalbIT about …" did here.
            'aria'  => 'Talk to the team about a software project in Saudi Arabia',
        ];

        include __DIR__ . '/../../partials/services/erp/faq.php';
    ?>
<?php endif; ?>

<?php /* §20 — Related resources.
         The third group is Saudi-specific. Two of the deck's three entries in
         it are marked [TODO: create] / [TODO: target] and are NOT linked here:
         a link to a page that does not exist is a 404, and the brief is
         explicit that we do not ship those. They are listed in the build report
         so someone can wire them when the pages land. */ ?>
<?php
$relatedGroups = [
    [
        'title' => 'Plan your project',
        'links' => [
            ['label' => 'Software Development Cost Calculator – free instant estimate', 'href' => '/tools/software-development-cost-calculator/', 'title' => 'Estimate your software development cost for free'],
            ['label' => 'Client case studies & outcomes',                               'href' => '/case-studies/',                                'title' => 'Case studies of software we have shipped'],
            ['label' => 'Our engagement models',                                        'href' => '/engagement-model/',                            'title' => 'Fixed price, dedicated team and hybrid engagement models'],
        ],
    ],
    [
        'title' => 'Build your team',
        'links' => [
            ['label' => 'Hire dedicated developers', 'href' => '/hire-developers/', 'title' => 'Hire dedicated developers in India – all profiles'],
            ['label' => 'Explore our portfolio',     'href' => '/portfolio/',       'title' => 'Selected projects from the QalbIT portfolio'],
            ['label' => 'Talk to our team',          'href' => '/contact-us/',      'title' => 'Contact QalbIT about your project'],
        ],
    ],
    [
        'title'  => 'Saudi guides & comparisons',
        'accent' => true,
        'links'  => [
            ['label' => 'Custom ERP development services', 'href' => '/services/erp-development/', 'title' => 'Custom ERP development services from QalbIT'],
            ['label' => 'Custom CRM development services', 'href' => '/services/crm-development/', 'title' => 'Custom CRM development services from QalbIT'],
        ],
    ],
];

include __DIR__ . '/../../partials/services/erp/related.php';
?>

<?php /* §21 — Final CTA, dark. */ ?>
<?php $erpBand = $erp['bands']['final'] ?? []; $erpBandVariant = 'final'; include __DIR__ . '/../../partials/services/erp/cta-band.php'; ?>

</div>
