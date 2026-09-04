<?php

/**
 * Bespoke content for /saudi-arabia/riyadh/.
 *
 * Same mechanism as config/erp_page.php and config/crm_page.php: the page
 * template assigns `$erp = config('riyadh_page')` and every shared partial
 * under resources/views/partials/services/erp/ reads its copy from that one
 * variable. No ERP partial was edited, forked or given a page conditional to
 * make this page exist. Read the docblock at the top of
 * resources/views/pages/services/crm-development.php for why the variable and
 * the `.erp-page` wrapper class both still carry the ERP name — `.erp-page` is
 * the design system's scope, not a claim about which page you are on.
 *
 * The `service` key at the bottom is the second half of that contract: four
 * shared partials (modules, process, tech-stack, use-cases) read `$service`
 * rather than `$erp`, because on the two service pages that array is the
 * service's own entry in config/services.php. This page has no entry there —
 * it is not a service — so the template hands them this sub-array instead.
 *
 * EVERY STRING HERE IS APPROVED COPY FROM THE RIYADH COPY DECK AND IS NOT TO BE
 * REWRITTEN IN PASSING. Two rules travel with it:
 *
 *   1. NO NUMBER GOES ON THIS PAGE THAT IS NOT IN THE DECK'S CLAIMS REGISTER.
 *      The regulatory figures below (Wave 25, SAR 187,500, 1 February 2027,
 *      Royal Decree M/19, 14 September 2024) are live and dated. Re-verify
 *      against ZATCA and SDAIA before each publish, exactly as the ERP page's
 *      gcc block warns.
 *   2. THE PAGE STATES THAT QALBIT HAS NO SAUDI OFFICE AND NO SAUDI ENTITY, in
 *      six separate places. That is the page's whole position and the reason it
 *      can make the compliance argument at all. Do not soften any of them, and
 *      do not add a Saudi address, phone number or LocalBusiness schema.
 *
 * Apostrophes are the typographic U+2019 throughout, matching the rest of the
 * site. The deck's straight quotes are a markdown artefact. This matters beyond
 * house style: RiyadhController builds the FAQPage JSON-LD from the SAME
 * strings the FAQ partial prints, so the two match character for character by
 * construction rather than by proofreading.
 */

return [

    // ---------------------------------------------------------------
    // §1 — Hero. Rendered by partials/services/riyadh/hero.php, which is a
    // fork of the ERP hero for two hardcoded reasons documented in that file.
    // `sub_copy[1]` is the deck's pull-quote: the hero partial draws every
    // paragraph after the first with the accent left border, so the quote is
    // not a separate key.
    // ---------------------------------------------------------------
    'hero' => [
        'breadcrumb_label' => 'Riyadh',
        'kicker_label'     => 'Custom software development · Riyadh',
        'h1'               => 'Custom Software Development Company for Riyadh',
        // Emphasised in the headline. Presentation only: the string is
        // escaped before it is located and wrapped, so nothing typed here
        // can inject markup. A token absent from the H1 is a no-op.
        'accent_token'     => 'Riyadh',

        'sub_copy' => [
            'We build CRM, ERP and custom backend systems for companies in Riyadh, Jeddah and across the Kingdom. We work remotely from Ahmedabad, India, on Saudi hours. There is no QalbIT office in Riyadh, and this page explains exactly what that changes — including the two things Saudi law requires you to check before hiring any vendor outside the Kingdom.',
            'Most vendor pages selling into Saudi Arabia name ZATCA and PDPL and stop there. This one shows the mechanics.',
        ],

        // Matches the live ERP page's record exactly. See open item #1 in the
        // build report: config/business.php still declares foundingDate 2018,
        // which contradicts "11+ years". That contradiction is site-wide and
        // was deliberately left alone here rather than fixed on one page.
        'proof_stats' => [
            ['label' => 'Years building software', 'value' => '11+'],
            ['label' => 'Projects delivered',      'value' => '120+'],
            ['label' => 'Clients served',          'value' => '90+'],
            ['label' => 'Clutch rating',           'value' => '5.0', 'accent' => true],
        ],

        'snapshot' => [
            ['label' => 'Core focus',     'value' => 'Custom software, CRM, ERP, backends and APIs'],
            ['label' => 'Engagements',    'value' => 'First builds · legacy rebuilds · module extensions · integrations'],
            ['label' => 'Delivery',       'value' => 'Remote from India on Riyadh hours, Sunday–Thursday overlap'],
            ['label' => 'Saudi position', 'value' => 'No local entity. Processor outside the Kingdom under PDPL'],
        ],
    ],

    // ---------------------------------------------------------------
    // §1 — Hero enquiry card. Rendered by the UNFORKED ERP hero-form partial.
    // Field labels other than the message are hardcoded there and already match
    // the deck. The deck's "+966 default" needs no setting: main.js initialises
    // intl-tel-input with `initialCountry: "auto"`, so a visitor in the Kingdom
    // gets +966 from geo-IP and a visitor elsewhere is not lied to.
    // ---------------------------------------------------------------
    'form' => [
        'heading'             => 'Get a Riyadh project scoping call',
        'sub_line'            => 'Tell us what your team runs on today and where the process breaks. We come back within 24–48 hours with a scope, a realistic first-phase estimate, and a straight answer on whether you should hire locally instead.',
        'message_label'       => 'What are you trying to build?',
        'message_placeholder' => 'What does your team run on today, and where does the process break?',
        // The partial appends the arrow glyph itself.
        'button'              => 'Request a scoping call',
        'micro'               => 'No sales sequence. One reply from the team that would do the work.',
        // Measurement labels; see the note in the shared hero-form partial.
        // These now come from config rather than being patched onto the DOM
        // by JavaScript after load, which is how this page did it before the
        // partial gained the keys.
        'ga4_lead'            => 'riyadh_scoping_call',
        'variant'             => 'riyadh-hero',
        'aria_label'          => 'Riyadh project scoping call enquiry form',
        'lead_from'           => 'lead_riyadh_hero',
        'lead_topic'          => 'riyadh-software-development',
        'redirect'            => '/saudi-arabia/riyadh/',
    ],

    // ---------------------------------------------------------------
    // §2 + §3 — Definition, and the three-way disambiguation.
    //
    // ONE include covers both deck sections. erp/definition.php renders two
    // bands: prose + dark answer card (§2), then a `terms` row (§3) whose
    // column count is computed from the array and whose LAST entry takes the
    // accent rule. The deck's §3 highlights "Remote engineering partner", which
    // is its third and last item, so the two conventions agree without a flag.
    //
    // `body[0]` is the deck's sub-heading: the partial sets the first paragraph
    // larger and heavier as the section's pivot line, which is exactly the job
    // that sentence does.
    // ---------------------------------------------------------------
    'definition' => [
        'id'      => 'riyadh-remote-partner',
        'eyebrow' => 'Definition',
        'title'   => 'What a remote software partner actually does for a Riyadh company',

        'body' => [
            'The distinction that matters isn’t technical. It’s legal and operational.',
            'A local Riyadh agency sits inside the Kingdom. Your data stays put, your contract is Saudi law, and someone can be in your office by Tuesday. A remote partner sits outside it. That changes three things: how personal data moves, how the working week lines up, and who carries the compliance obligation.',
            'None of those three is automatically a problem. All three have known answers. What matters is whether your vendor tells you about them before the contract or after the first audit.',
            'We are the second kind of vendor and we are saying so on the page.',
        ],

        // The block most likely to be lifted whole into an AI answer or a
        // featured snippet. It carries the page's two load-bearing facts —
        // the ZATCA threshold and the PDPL transfer article — and the
        // no-local-firm statement, in that order, on purpose.
        'snippet' => 'QalbIT builds custom software for Riyadh companies as a remote engineering partner, not a local firm. Saudi buyers face two hard constraints: ZATCA Phase 2 e-invoicing, whose Wave 25 threshold of SAR 187,500 reaches almost every VAT-registered business by 1 February 2027, and PDPL Article 29, which governs moving personal data outside the Kingdom. QalbIT designs to both. Delivery is remote from Ahmedabad, India, on Riyadh working hours.',

        'terms_title' => 'Local agency vs global consultancy vs remote engineering partner',
        'terms_intro' => 'Three options that get compared on price when they should be compared on fit.',

        'terms' => [
            [
                'term' => 'Local Riyadh agency',
                'text' => 'Registered in the Kingdom, Arabic-first, someone on site. Your data never leaves. Best when the work is continuous, stakeholder-heavy, or touches government procurement through Etimad.',
            ],
            [
                'term' => 'Global consultancy',
                'text' => 'Programme-scale delivery with an in-Kingdom presence and a rate card to match. Best when the project is a multi-year transformation with a board-level sponsor.',
            ],
            // Last entry — takes the accent rule and the accent numeral.
            [
                'term' => 'Remote engineering partner',
                'text' => 'A small senior team building a defined system, working your hours from outside the Kingdom. No local entity, so the data-transfer question is real and has to be answered in the contract. Best when you want the software built properly and you already know what it must do.',
            ],
        ],

        'closing' => 'We are the third. We will say plainly when one of the first two is the better call for you.',
    ],

    // ---------------------------------------------------------------
    // §4 — When a remote partner is right, and when it isn't.
    //
    // erp/build-vs-buy.php, unchanged. Its two columns are named `build` and
    // `buy` after the ERP page's argument; here they carry "hire us" and "hire
    // someone else". The slot names describe a two-column numbered ledger, which
    // is what both pages need, so the names are the only thing that is ERP about
    // it.
    // ---------------------------------------------------------------
    'build_vs_buy' => [
        'id'      => 'riyadh-fit',
        'eyebrow' => 'Fit',
        'title'   => 'When a remote partner is the right call — and when it isn’t',
        'intro'   => 'Most vendor pages selling into Saudi Arabia only argue one side. Here is the honest version.',

        'build_title' => 'Hire a remote partner when',
        'build_items' => [
            'You need a specific system built well, and you can describe what it has to do.',
            'Your internal team can own decisions, so a two-and-a-half hour time offset costs you nothing.',
            'The work is a defined build or a defined rebuild, not an open-ended programme.',
            'You want the source code and the roadmap in your own hands afterwards.',
            'Your data-protection position is manageable: business data, controlled personal data, or personal data your legal team is willing to cover with the required safeguards.',
        ],

        'buy_title' => 'Hire locally instead when',
        'buy_items' => [
            'The system will hold sensitive personal data as PDPL defines it — health data, biometric or genetic data, criminal records. Keep that inside the Kingdom.',
            'You are bidding for government work through Etimad where in-Kingdom delivery is a condition.',
            'Day-to-day delivery has to run in Arabic across your whole stakeholder group, not just at the interface layer.',
            'You need people physically present through a floor rollout or a plant cutover.',
            'Your procurement rules require a Saudi commercial registration from the contracting party.',
        ],

        'closing' => 'We turn down Saudi projects that fall in the second list. A remote build where a local firm was the right answer is an expensive route to the same destination — and in the first case, a legal problem as well.',
    ],

    // ---------------------------------------------------------------
    // §5 / §13 / §21 — the three CTA bands. erp/cta-band.php, unchanged.
    // `$erpBandVariant` picks the treatment: 'poster' is the accent-filled
    // block, 'final' the dark closing one. The template sets it before each
    // include.
    // ---------------------------------------------------------------
    'bands' => [

        // §5 — after the fit section.
        'fit' => [
            'id'              => 'riyadh-fit-band',
            'title'           => 'Not sure whether to hire locally?',
            'body'            => 'Send us what the system needs to do and what data it will hold. We will tell you honestly which side of that line you are on — including when the answer is “hire someone in Riyadh.”',
            'primary_label'   => 'Get a fit assessment',
            'primary_url'     => '/contact-us/?topic=riyadh-fit-assessment',
            'secondary_label' => 'Book a 30-minute call',
            'secondary_url'   => 'https://crm.qalbit.com/book/discuss-project',
        ],

        // §13 — after industries.
        'process' => [
            'id'              => 'riyadh-process-band',
            'title'           => 'Your process is the reason the standard product doesn’t fit.',
            'body'            => 'That is usually why a custom build gets considered at all. Tell us what that process is and we will tell you whether it justifies the project.',
            'primary_label'   => 'Describe your process',
            'primary_url'     => '/contact-us/?topic=riyadh-custom-build',
            'secondary_label' => 'See our work',
            'secondary_url'   => '/case-studies/',
        ],

        // §21 — the dark closing block.
        'final' => [
            'id'              => 'riyadh-final-cta',
            'title'           => 'Let’s scope the first system.',
            'body'            => 'Tell us how work moves through your business today. We will map the process, identify which system earns its place first, and give you an honest estimate with a phased plan.',
            'body_2'          => 'If a Riyadh firm is the better answer, we will tell you that instead.',
            'primary_label'   => 'Book a scoping call',
            'primary_url'     => 'https://crm.qalbit.com/book/discuss-project',
            'secondary_label' => 'Send your requirements',
            'secondary_url'   => '/contact-us/?topic=riyadh-software-development',
            'meta'            => 'Typically a reply within 24–48 hours, with questions rather than a brochure.',
        ],
    ],

    // ---------------------------------------------------------------
    // §6 — Comparison ledger. Rendered by partials/services/riyadh/comparison.php.
    //
    // NOT erp/comparison.php. That partial is a cost MODEL — a live seat slider
    // driving a five-year total, with `rate`, `price`, `five_year` and `source`
    // per row. This section is a nine-row capability ledger across three vendor
    // types with no prices in it at all, and the absence of prices is the
    // section's own stated argument. There is nothing to bend into the ERP
    // shape; see the docblock in the new partial.
    //
    // The `notes` shape below IS the ERP one, deliberately, so the numbered
    // footnotes render the same way they do on the ERP page.
    //
    // THREE OF THE NINE ROWS ARE LOSSES. That is the section's point and the
    // reason footnote 01 exists. Do not "fix" the No rows.
    // ---------------------------------------------------------------
    'comparison' => [
        'id'      => 'riyadh-comparison',
        'eyebrow' => 'Comparison',
        'title'   => 'Remote partner vs local agency vs global consultancy',
        'intro'   => 'Every row below is a real difference, including the ones we lose. Rates are deliberately absent — the decision is not a rate comparison and we will not pretend it is.',

        // First cell is the row-label column header and is intentionally blank.
        'columns' => ['', 'Local Riyadh agency', 'Global consultancy', 'QalbIT (remote partner)'],

        'rows' => [
            ['label' => 'Physical Riyadh office',      'cells' => ['Yes', 'Usually', 'No']],
            ['label' => 'Arabic-first delivery',       'cells' => ['Yes', 'Varies', 'No — English delivery, Arabic in the product']],
            ['label' => 'PDPL role',                   'cells' => ['Controller or processor, in-Kingdom', 'Processor, usually in-Kingdom', 'Processor outside the Kingdom — safeguards required']],
            ['label' => 'Data residency',              'cells' => ['In-Kingdom by default', 'In-Kingdom available', 'In-Kingdom hosting, remote engineering']],
            ['label' => 'ZATCA Fatoora integration',   'cells' => ['Common', 'Common', 'Yes']],
            ['label' => 'Working-week overlap',        'cells' => ['Full', 'Full', 'Sunday–Thursday, 2.5-hour offset from India']],
            ['label' => 'Etimad government bids',      'cells' => ['Eligible', 'Usually eligible', 'Not eligible without a local entity']],
            ['label' => 'Source code ownership',       'cells' => ['Varies', 'Varies', 'Yours, full repository']],
            ['label' => 'Team size on your account',   'cells' => ['Varies', 'Large, layered', 'Small and senior, founder-accessible']],
        ],

        'notes' => [
            ['lead' => 'The “No” rows are the point.',                                     'text' => 'A comparison table where one vendor wins every row is marketing. Three of the rows above are reasons to hire someone else, and we would rather you find them here than in month four.'],
            ['lead' => 'Data residency and delivery location are different questions.', 'text' => 'Your system can run on in-Kingdom infrastructure while the engineers sit elsewhere. That distinction does most of the work in a PDPL conversation, and a lot of vendors blur it.'],
            ['lead' => 'The time offset is smaller than it looks.',                     'text' => 'Riyadh runs UTC+3, we run UTC+5:30. That is two and a half hours, and the Saudi Sunday–Thursday week overlaps ours on four days out of five.'],
            ['lead' => 'Etimad eligibility is binary.',                                 'text' => 'If your procurement runs through the government portal and requires a Saudi commercial registration, no amount of engineering quality substitutes for it. Ask us early and we will tell you immediately.'],
        ],

        'closing' => 'We will run this against your actual scope and data profile.',
        'related' => ['label' => 'Request a fit assessment', 'url' => '/contact-us/?topic=riyadh-fit-assessment'],
    ],

    // ---------------------------------------------------------------
    // §8 — Cost. erp/cost.php, unchanged.
    // `positioning[0]` is the pull-quote, [1] the left body, [2] the right body.
    // ---------------------------------------------------------------
    'cost' => [
        'id'      => 'riyadh-cost',
        'eyebrow' => 'Cost',
        'title'   => 'How much does custom software development cost in Saudi Arabia?',

        'snippet' => 'Custom software development cost in Saudi Arabia is driven by scope, integration count and compliance requirements rather than by headcount or hourly rates. A ZATCA-integrated invoicing layer, a PDPL-compliant data architecture and a legacy migration are each separate cost drivers. We scope before quoting and estimate phase one on a fixed basis.',

        'positioning' => [
            'We don’t publish a price range, and we’d suggest treating any firm that does with some caution.',
            'Search this and you will find ranges spanning $10,000 to $500,000. That spread is not information. A two-module CRM for a Riyadh distributor and a multi-entity ERP with Fatoora clearance are not the same project, and no range covers both honestly.',
            'What we do instead is a scoping call, a process map, and a fixed-scope estimate for phase one before you commit to anything beyond discovery. Below is exactly what moves that number, so you can sanity-check any quote you receive — ours included.',
        ],

        'drivers' => [
            ['title' => 'Scope of phase one',             'text' => 'The largest single driver. One system built properly beats three built thinly. Most first phases cover two connected modules.'],
            ['title' => 'Integration count and quality',  'text' => 'Each connected system adds scope, and not equally. A modern REST API with OAuth is straightforward. A legacy system with no event support needs a middleware and reconciliation layer.'],
            ['title' => 'ZATCA integration depth',        'text' => 'Reporting simplified invoices is not the same job as clearing standard invoices. Clearance means CSID onboarding, XAdES signing, hash chaining and a failure-handling path. Price it as its own workstream.'],
            ['title' => 'Data protection architecture',   'text' => 'Where personal data lives, what crosses the border, and what has to be tokenised at the boundary. Near-free to design at the start. Expensive to retrofit.'],
            ['title' => 'Arabic in the product',          'text' => 'Bilingual interface, right-to-left layout, Arabic-correct invoice output and sorting. Real engineering, frequently underestimated.'],
            ['title' => 'Data migration depth',           'text' => 'Migrating masters and opening balances is routine. Migrating years of transactional history with reconciliation against the old system is a project in its own right.'],
        ],

        'related' => ['label' => 'Custom software development cost in Saudi Arabia', 'url' => '/tools/software-development-cost-calculator/'],
    ],

    // ---------------------------------------------------------------
    // §9 — the sourced callout under the process timeline.
    // erp/process-note.php. No `citation` key: the deck's callout carries its
    // sourcing inside the sentence, and an empty cite line would render an
    // empty element.
    // ---------------------------------------------------------------
    'process_note' => [
        'text' => 'The Saudi working week runs Sunday to Thursday. Riyadh is UTC+3 and our team is UTC+5:30 — a two-and-a-half hour offset, with four of your five working days fully overlapping ours. Thursday afternoon and Friday–Saturday are handled asynchronously with written updates rather than pretended away.',
    ],

    // ---------------------------------------------------------------
    // §12 — Industries. erp/industries.php, unchanged.
    // ---------------------------------------------------------------
    'industries' => [
        'id'      => 'riyadh-industries',
        'eyebrow' => 'Industries',
        'title'   => 'Sectors we build for in Riyadh and across the Kingdom',
        'intro'   => 'Operational software is industry-shaped. These are the sectors where the process knowledge transfers.',

        'items' => [
            [
                'title' => 'Trading and distribution',
                'icon'  => '/images/icons/erp-industry-logistics.svg',
                'text'  => 'Multi-location stock, transfers and allocation, dispatch planning, proof of delivery, consignment. The complexity is rarely in any single warehouse — it is in reconciling stock across all of them in real time.',
            ],
            [
                'title' => 'Manufacturing and processing',
                'icon'  => '/images/icons/erp-industry-manufacturing.svg',
                'text'  => 'Bills of materials, work orders, job work, wastage and batch costing. Multi-stage production where the cost of a finished unit depends on decisions made three steps earlier.',
            ],
            [
                'title' => 'Professional services and contracting',
                'icon'  => '/images/icons/erp-industry-accounting.svg',
                'text'  => 'Project billing, milestone tracking, retention, subcontractor management and the approval chains that go with them.',
            ],
            [
                'title' => 'Retail and hospitality',
                'icon'  => '/images/icons/erp-industry-pharmaceutical.svg',
                'text'  => 'Multi-branch operations, high B2C invoice volume, and simplified-invoice reporting to ZATCA within the required window.',
            ],
        ],
    ],

    // ---------------------------------------------------------------
    // §14 — Saudi compliance. THE differentiator section, and the reason this
    // page exists: the live page mentions neither ZATCA nor PDPL nor SDAIA.
    //
    // Rendered by partials/services/riyadh/compliance.php. NOT
    // erp/gcc-compliance.php, whose row shape is a single `text` string. Each
    // row here carries two paragraphs, a failure-mode caveat and a dated source
    // line, and the sources are not decoration — the page's own §17 callout
    // stakes its credibility on "where we cite a number, the source and date are
    // next to it". Flattening four fields into one would have deleted that.
    //
    // REGULATORY CONTENT. Re-verify before every publish. Deck claims register
    // flags the SAR 5,000–50,000 penalty range as secondary-sourced.
    // ---------------------------------------------------------------
    'compliance' => [
        'id'      => 'riyadh-compliance',
        'eyebrow' => 'Saudi compliance',
        'title'   => 'Building software for Saudi Arabia — ZATCA, PDPL and data residency',
        'intro'   => 'These are the two regulations that decide whether a system is usable in the Kingdom, and the two questions a foreign vendor has to answer before you sign anything.',

        'rows' => [
            [
                'heading' => 'ZATCA e-invoicing (Fatoora)',
                'tag'     => 'Phase 2 · Wave 25',
                'marker'  => '/images/icons/erp-market-sa.svg',
                'paragraphs' => [
                    'Phase 2 requires your system to connect directly to ZATCA’s Fatoora platform. Standard B2B and B2G invoices are cleared before you send them to the customer; simplified B2C invoices are reported afterwards. Invoices must be UBL 2.1 XML carrying a UUID, a cryptographic stamp and a QR code.',
                    'Wave 25, announced on 24 July 2026, covers taxpayers whose VAT-subject revenue exceeded SAR 187,500 in any of 2022, 2023, 2024 or 2025, with integration required by 1 February 2027. That threshold is half of Wave 24’s SAR 375,000 and matches Saudi Arabia’s voluntary VAT registration floor — which makes Wave 25 effectively the bottom of the ladder. Penalties for non-compliance run from SAR 5,000 to SAR 50,000.',
                ],
                'caveat'  => 'Where integrations fail: CSID onboarding, XAdES signature validity, and the previous-invoice-hash chain breaking after a rejected clearance — which silently invalidates everything downstream.',
                'sources' => 'ZATCA announcement 24 July 2026 · KPMG TaxNewsFlash, 29 July 2026',
            ],
            [
                'heading' => 'PDPL and cross-border data',
                'tag'     => 'Royal Decree M/19',
                'marker'  => '/images/icons/pdpl-cross-border-data.svg',
                'paragraphs' => [
                    'Saudi Arabia’s Personal Data Protection Law was enacted by Royal Decree M/19, amended by M/148, and became fully enforceable on 14 September 2024. It applies extraterritorially: an organisation outside the Kingdom that processes personal data of people inside it is in scope. That includes us.',
                    'Article 29 governs transferring personal data outside the Kingdom. SDAIA’s Regulation on Personal Data Transfer Outside the Kingdom, issued August 2024, permits it under approved safeguards including Saudi Standard Contractual Clauses, with a risk assessment where those apply. Sensitive data — health, biometric, genetic, criminal records — carries tighter restrictions.',
                ],
                'caveat'  => 'In practice you are the controller and we are the processor. The transfer has to be justified, documented and contracted, not assumed.',
                'sources' => 'SDAIA Regulations and Policies · King & Spalding, November 2025',
            ],
            [
                // No `tag`: the compliance partial reads a missing tag as the
                // no-mandate flag and draws the muted outline pill instead of
                // the accent one, the same convention erp/gcc-compliance.php
                // uses for a country with no e-invoicing scheme. This row is
                // market context, not a regulation.
                'heading' => 'Vision 2030 context',
                'tag'     => null,
                'marker'  => '/images/icons/vision-2030-growth.svg',
                'paragraphs' => [
                    'Saudi Arabia’s digital economy reached approximately SAR 495 billion, contributing 15% of national GDP, with the ICT market surpassing SAR 180 billion by 2024. The Kingdom ranked first globally in the ITU’s 2025 ICT Development Index.',
                ],
                'sources' => 'Ministry of Communications and Information Technology · Communications, Space and Technology Commission',
            ],
        ],

        'closing' => 'We build systems that emit compliant output natively rather than bolting a compliance module onto software that resists it. If a Wave 25 notification is driving your timeline, that date is where we start planning backwards from.',
    ],

    // ---------------------------------------------------------------
    // §15 — Hiring a vendor outside the Kingdom, the honest version.
    //
    // erp/integrations.php, unchanged. That partial renders a three-part
    // light / DARK / light contrast, and the darkness of the middle panel is
    // its argument. This section has exactly that shape: four exposures nobody
    // else publishes, as a dark datasheet of label/detail rows, closing on the
    // accent-ruled callout that the `legacy.closing` slot draws.
    //
    // `modern` IS DELIBERATELY ABSENT. The deck supplies no light opening row
    // and inventing one was not an option. The partial's row closure returns
    // early on a missing title, so the section opens straight onto the dark
    // panel.
    // ---------------------------------------------------------------
    'integrations' => [
        'id'      => 'riyadh-honest-version',
        'eyebrow' => 'Working with us',
        'title'   => 'Hiring a vendor outside the Kingdom — the honest version',
        'intro'   => 'Every foreign vendor selling into Saudi Arabia has the same four exposures. Most of them do not put the list on their website. Here it is.',

        'legacy' => [
            'title' => 'The four exposures',
            'points' => [
                ['lead' => 'Data transfer',          'text' => 'You are the controller. Every transfer of personal data to us needs a lawful basis under Article 29 and documented safeguards. This is contract work, done once, before the build.'],
                ['lead' => 'Sensitive data',         'text' => 'Health, biometric, genetic and criminal-record data carries tighter restrictions. If your system holds it, plan for in-Kingdom processing regardless of who writes the code.'],
                ['lead' => 'Government procurement', 'text' => 'Etimad tenders frequently require a Saudi commercial registration from the contracting party. We do not have one.'],
                ['lead' => 'Physical presence',      'text' => 'Nobody from our team will be in your office on Tuesday. Floor rollouts and plant cutovers need local hands, and we will say so before you sign.'],
            ],
            'closing' => 'None of that is a reason to avoid a remote partner. It is a reason to handle the contract properly at the start rather than assuming it away. We say this before the estimate, not after.',
        ],

        'everything_else' => [
            'title' => 'Everything else',
            'text'  => 'Payment gateways, e-invoicing service providers, accounting products, logistics providers, banking APIs, BI tools.',
        ],
    ],

    // ---------------------------------------------------------------
    // §17 — Outcomes. erp/outcomes.php, unchanged.
    //
    // `note` is the ARRAY shape (`eyebrow` + `body[]`) the partial actually
    // reads. config/erp_page.php still declares it as a plain string, which the
    // partial cannot render — see open item #2 in the build report. That is a
    // live ERP-page defect and fixing it would have changed the ERP page, so it
    // was left alone.
    //
    // No `figure`: the deck's callout is an argument against quoting an
    // unsourced number, so putting a number in it would invert it.
    // ---------------------------------------------------------------
    'outcomes' => [
        'id'      => 'riyadh-outcomes',
        'eyebrow' => 'Outcomes',
        'title'   => 'What the project should actually change',
        'intro'   => 'Not projections. These are the operational changes the build is meant to produce, and how you would know whether yours did.',

        'columns' => ['What changes', 'How you’d measure it'],

        'rows' => [
            ['change' => 'One source of truth across branches and systems', 'measure' => 'Variance between system records and physical count'],
            ['change' => 'Compliance output is generated, not assembled',   'measure' => 'Hours per filing period'],
            ['change' => 'Invoices clear ZATCA first time',                 'measure' => 'Rejected-clearance rate and hash-chain breaks'],
            ['change' => 'Approvals are enforced, not remembered',          'measure' => 'Share of transactions with a complete audit trail'],
            ['change' => 'Arabic output is correct without manual fixing',  'measure' => 'Documents requiring rework before sending'],
            ['change' => 'Owners see position without asking anyone',       'measure' => 'Time from question to answer'],
        ],

        'note' => [
            'eyebrow' => 'A note on sourcing',
            'body'    => [
                'We don’t quote a headline failure rate for software projects. The widely circulated figures attributing 55–75% failure to Gartner have no traceable primary source, and we won’t repeat them to make a point. Where we cite a number on this page, the source and date are next to it.',
            ],
        ],
    ],

    // ---------------------------------------------------------------
    // §18 — Why work with us. erp/why-us.php, unchanged.
    //
    // HEADING LEVELS SHIFT BY ONE HERE, and it is deliberate. The partial wants
    // an eyebrow, a section h2, a lead row (h3 left + evidence prose right),
    // N middle columns and a closing band. The deck supplies a kicker, ONE
    // heading and an intro paragraph — one heading short. Rather than invent a
    // string or ship an empty <h3>, the deck's kicker becomes the h2 and the
    // deck's h2 becomes the lead's h3. Every word is the deck's; only the level
    // moved. See open item #3.
    //
    // items[0] is the lead, items[1..3] the three columns, items[4] the band.
    // ---------------------------------------------------------------
    'why_us' => [
        'id'    => 'riyadh-why-us',
        'title' => 'Why work with us',

        'items' => [
            [
                'title' => 'Eleven years building operational software',
                'text'  => '120+ projects delivered across web, mobile and platform work, with 90+ clients. Clutch 5.0, Google 4.9, Upwork Top Rated Plus. We deliver into the GCC today as a white-label engineering partner to a regional agency, and our Saudi-facing work is built on that same operational-software experience.',
            ],
            [
                'title' => 'We say what we are',
                'text'  => 'No Riyadh office, no local entity, no implied presence. The compliance section above exists because we would rather lose a deal at the scoping call than at the audit.',
            ],
            [
                'title' => 'You own the code',
                'text'  => 'Full source ownership, documented, in your repository. No licence, no per-seat fee, no restriction on hiring a different team later.',
            ],
            [
                'title' => 'Senior team, founder-led',
                'text'  => 'A small senior team with direct access to the people writing the code. You won’t be handed to an account manager who relays questions to engineers you never meet.',
            ],
            [
                'title' => 'We’ll tell you to hire locally',
                'text'  => 'When a Riyadh firm is genuinely the better answer, we say so on the first call. It costs us a project and saves you a year.',
            ],
        ],
    ],

    // ---------------------------------------------------------------
    // Inline CTAs. Each shared partial looks its own up by key; a missing key
    // renders no CTA rather than erroring, so the set is deliberately smaller
    // than the ERP page's seven.
    // ---------------------------------------------------------------
    'inline_ctas' => [
        // §3, under the three-way disambiguation.
        'fit_check' => [
            'lead'  => 'Not sure which of the three fits?',
            'label' => 'Describe your operation in two lines',
            'url'   => '/contact-us/?topic=riyadh-fit-assessment',
        ],
        // §7, under the six service cards.
        'module_scope' => [
            'label' => 'Discuss which system to build first',
            'url'   => '/contact-us/?topic=riyadh-software-development',
        ],
        // §8, under the cost drivers.
        'estimate' => [
            'lead'            => 'Every project is scoped before it is quoted.',
            'label'           => 'Get a phase-one estimate',
            'url'             => '/contact-us/?topic=riyadh-estimate',
            'secondary_label' => 'Try the cost calculator',
            'secondary_url'   => '/tools/software-development-cost-calculator/',
        ],
        // §11, under the project-type cards.
        'use_case' => [
            'label' => 'Tell us which of these sounds like you',
            'url'   => '/contact-us/?topic=riyadh-software-development',
        ],
        // §14, under the compliance rows.
        'gcc_compliance' => [
            'label' => 'Talk to us about a compliance-driven timeline',
            'url'   => '/contact-us/?topic=riyadh-compliance',
        ],
    ],

    // ===============================================================
    // $service — the second half of the reuse contract.
    //
    // Four shared partials read `$service` rather than `$erp`, because on the
    // ERP and CRM pages that array is the service's own entry in
    // config/services.php. This page is a location, not a service, so it has no
    // entry there and pages/geo/riyadh.php hands them this sub-array instead.
    // Nothing else reads it and nothing else should.
    // ===============================================================
    'service' => [

        // -----------------------------------------------------------
        // §7 — What we build. erp/modules.php, unchanged. Dark card grid.
        //
        // THE ACCENT CELL LANDS ON CARD 06, NOT CARD 01. modules.php hardcodes
        // the accent to the LAST card (`$erpModIndex === $erpModCount - 1`),
        // matching the "last one is ours" convention definition.php uses. The
        // deck annotates card 01 as the highlighted one. Card order is copy and
        // is preserved exactly as the deck has it; the highlight is emphasis and
        // it moved. Reordering would have renumbered the deck's cards, and a
        // fork of a 241-line partial to change one integer was not worth it.
        // See open item #4 — moving the highlight is a one-line fork if wanted.
        // -----------------------------------------------------------
        'capabilities' => [
            'id'      => 'riyadh-what-we-build',
            'eyebrow' => 'What we build',
            'title'   => 'Custom software we build for Saudi companies',
            'intro'   => 'Systems that talk to each other, so an order moves through sales, stock, finance and compliance without anyone re-keying it.',

            // NULL, DELIBERATELY. erp/modules.php defaults this to the ERP
            // page's own dashboard screenshot whenever the key is ABSENT, so
            // omitting it is not the same as declining it — the section would
            // have shipped an ERP product still on a location page. The deck
            // asks for no image here, the screenshot is not of a Saudi build,
            // and a decorative product shot sitting beside this page's
            // compliance claims is decoration pretending to be evidence. The
            // partial documents null as the way to skip the figure entirely.
            'dashboard_image' => null,

            'items' => [
                [
                    'label'       => 'Custom CRM development',
                    'badge'       => 'CRM',
                    'icon'        => '/images/icons/crm.svg',
                    'icon_alt'    => '',
                    'description' => 'Pipelines built around how your team actually sells, not a vendor’s template. Arabic and English field support, role-scoped access, and clean handoff into invoicing where the CRM touches billing.',
                ],
                [
                    'label'       => 'Custom ERP modules and extensions',
                    'badge'       => 'ERP',
                    'icon'        => '/images/icons/erp.svg',
                    'icon_alt'    => '',
                    'description' => 'Inventory, purchase, production and finance as connected modules. Most Saudi work starts as an extension to what you already run rather than a replacement.',
                ],
                [
                    'label'       => 'B2B portals and customer portals',
                    'badge'       => 'Portals',
                    'icon'        => '/images/icons/b2b.svg',
                    'icon_alt'    => '',
                    'description' => 'Supplier, dealer and customer portals that sit on top of the system you already own, with permissions that survive an audit.',
                ],
                [
                    'label'       => 'Internal tools and reporting',
                    'badge'       => 'Reporting',
                    'icon'        => '/images/icons/dashboard.svg',
                    'icon_alt'    => '',
                    'description' => 'Operational dashboards and reporting layers for owners and managers who currently ask someone to pull a number.',
                ],
                [
                    'label'       => 'Custom backends and APIs',
                    'badge'       => 'Backend',
                    // api.svg, not backend.svg — §16's first stack column
                    // already uses backend.svg, and the icon helper INLINES
                    // these SVGs, so the same file twice on one page emits its
                    // internal clipPath id twice and the document ends up with
                    // a duplicate id. api.svg carries a different id and reads
                    // at least as well against "backends and APIs".
                    'icon'        => '/images/icons/api.svg',
                    'icon_alt'    => '',
                    'description' => 'Laravel, Node.js and NestJS services, integrations, queues and scheduled jobs. The layer that makes the rest possible.',
                ],
                [
                    'label'       => 'SaaS platforms and MVPs',
                    'badge'       => 'SaaS',
                    'icon'        => '/images/icons/platform.svg',
                    'icon_alt'    => '',
                    'description' => 'Multi-tenant products for Saudi founders and for established companies productising something they already run internally.',
                ],
            ],
        ],

        // -----------------------------------------------------------
        // §9 — Process. erp/process.php, unchanged. Five steps, each with a
        // duration tag and a key deliverable. process-note.php follows it.
        // -----------------------------------------------------------
        'process' => [
            'id'      => 'riyadh-process',
            'eyebrow' => 'How we work with Riyadh teams',
            'title'   => 'A delivery process built around a 2.5-hour offset',
            'intro'   => 'The offset is small. The working week is not the same. We plan around both instead of pretending neither exists.',

            'items' => [
                [
                    'step'        => 1,
                    'title'       => 'Discovery and process mapping',
                    'duration'    => '1–2 weeks',
                    'icon'        => '/images/icons/discovery.svg',
                    'icon_alt'    => '',
                    'description' => 'Walk through how work moves through your business today, who touches it, and where it breaks. Identify the highest-pain system for phase one and the data-protection profile for the whole build.',
                    'outcome'     => 'Process map, system roadmap, realistic phase-one estimate, and a written data-transfer position.',
                ],
                [
                    'step'        => 2,
                    'title'       => 'Architecture and data design',
                    'duration'    => '2–3 weeks',
                    'icon'        => '/images/icons/architecture-design.svg',
                    'icon_alt'    => '',
                    'description' => 'Design the data model, screens and integration contracts. Decide what is hosted in-Kingdom, what crosses the border, and what never leaves.',
                    'outcome'     => 'Approved data model, screen designs, integration plan, hosting and residency decision.',
                ],
                [
                    'step'        => 3,
                    'title'       => 'Build phase one',
                    'duration'    => '6–14 weeks, scope-dependent',
                    'icon'        => '/images/icons/core-modules.svg',
                    'icon_alt'    => '',
                    'description' => 'Develop in weekly increments, demoing with your real records, parties and documents — not dummy data. Demos land in your Sunday–Thursday week.',
                    'outcome'     => 'Working modules validated against real operational scenarios.',
                ],
                [
                    'step'        => 4,
                    'title'       => 'Migration, training and parallel run',
                    'duration'    => '2–4 weeks',
                    'icon'        => '/images/icons/launch.svg',
                    'icon_alt'    => '',
                    'description' => 'Migrate masters and opening balances, train supervisors, and run the new system alongside the existing one until the numbers reconcile.',
                    'outcome'     => 'Confident go-live with reconciled data and trained users.',
                ],
                [
                    'step'        => 5,
                    'title'       => 'Stabilise, extend, roll out next',
                    'duration'    => 'Ongoing, month-to-month',
                    'icon'        => '/images/icons/scale.svg',
                    'icon_alt'    => '',
                    'description' => 'Tune performance, add reports and automations, then build the next system on the roadmap as adoption settles.',
                    'outcome'     => 'A system that grows with your operation rather than a one-time delivery.',
                ],
            ],
        ],

        // -----------------------------------------------------------
        // §11 — Projects we take on. erp/use-cases.php, unchanged.
        // `badge` is the deck's [TAG] chip, `audience` its FOR … line.
        // -----------------------------------------------------------
        'use_cases' => [
            'id'      => 'riyadh-project-types',
            'eyebrow' => 'Where we fit best',
            'title'   => 'Saudi projects we take on',
            'intro'   => 'These are the engagements that work well remotely. The ones that don’t are listed higher up the page.',

            'items' => [
                [
                    'label'       => 'Replacing spreadsheets with a real system',
                    'badge'       => 'First build',
                    'icon'        => '/images/icons/erp-project-first-build.svg',
                    'icon_alt'    => '',
                    'description' => 'Companies running operations on spreadsheets and disconnected tools who need core CRM, inventory or purchase workflows built properly the first time.',
                    'audience'    => 'For trading, distribution and services businesses',
                ],
                [
                    'label'       => 'Rebuilding software you have outgrown',
                    'badge'       => 'Modernisation',
                    'icon'        => '/images/icons/erp-project-legacy.svg',
                    'icon_alt'    => '',
                    'description' => 'Old desktop or early web systems rebuilt as modern web applications without losing years of data or retraining everyone overnight.',
                    'audience'    => 'For companies stuck on unsupported systems',
                ],
                [
                    'label'       => 'ZATCA and PDPL retrofit',
                    'badge'       => 'Compliance',
                    'icon'        => '/images/icons/compliance.svg',
                    'icon_alt'    => '',
                    'description' => 'Bringing an existing system to Fatoora clearance and restructuring where personal data sits. Often the deadline is what starts the project.',
                    'audience'    => 'For companies with a Wave 25 notification',
                ],
                [
                    // The white-label partner and its end client are NOT named
                    // here and must not be. The deck's wording — "a trading and
                    // distribution business" — is the approved description.
                    'label'       => 'Extending systems you already own',
                    'badge'       => 'Integration',
                    'icon'        => '/images/icons/erp-project-integrations.svg',
                    'icon_alt'    => '',
                    'description' => 'Custom modules, portals and dashboards on top of an existing ERP or accounting product. This is where most of our operational-software work sits today — including custom modules and dashboards built for a trading and distribution business, connecting tools that were never designed to talk to each other.',
                    'audience'    => 'For companies extending what they already run',
                ],
            ],
        ],

        // -----------------------------------------------------------
        // §16 — Tech stack. erp/tech-stack.php, unchanged.
        // `accent => true` on column 02 per the deck. This one IS a config
        // flag, unlike the modules grid's hardcoded last-cell accent.
        // No per-column `description`: the deck supplies none and the partial
        // treats it as optional.
        // -----------------------------------------------------------
        'stack' => [
            'id'      => 'riyadh-tech-stack',
            'eyebrow' => 'Tech stack',
            'title'   => 'Technology we use for Saudi builds',
            'intro'   => 'Business systems live for a decade. We choose proven technology your future team — internal or external — can maintain.',
            'note'    => 'Running an existing ERP, an accounting product, or spreadsheets-plus-email today? We can integrate and extend before we replace — the migration path is part of the plan, not an afterthought.',

            'categories' => [
                [
                    'name'     => 'Backend and business logic',
                    'icon'     => '/images/icons/backend.svg',
                    'icon_alt' => '',
                    'items'    => [
                        'Laravel (PHP 8.x) for modular business systems with strong audit trails.',
                        'NestJS (TypeScript) where event-driven flows and heavy integrations dominate.',
                        'Queues and schedulers for syncs, alerts and report generation.',
                    ],
                ],
                [
                    'name'     => 'Frontend and usability',
                    'accent'   => true,
                    'icon'     => '/images/icons/ux.svg',
                    'icon_alt' => '',
                    'items'    => [
                        'Next.js and React with keyboard-first data entry and fast text views.',
                        'Bilingual Arabic and English interfaces with correct right-to-left layout.',
                        'Role-based dashboards for owners, managers and operators.',
                    ],
                ],
                [
                    'name'     => 'Data and integrations',
                    'icon'     => '/images/icons/integrations.svg',
                    'icon_alt' => '',
                    'items'    => [
                        'PostgreSQL and MySQL with strict constraints for financial integrity.',
                        'ZATCA Fatoora clearance and reporting APIs.',
                        'Integrations with accounting products, payment gateways and logistics providers.',
                    ],
                ],
                [
                    'name'     => 'Security and residency',
                    'icon'     => '/images/icons/security.svg',
                    'icon_alt' => '',
                    'items'    => [
                        'Role- and location-based permissions with full audit logging.',
                        'In-Kingdom hosting options where residency is required.',
                        'Automated backups, staged deployments, monitoring and alerting.',
                    ],
                ],
            ],
        ],
    ],
];
