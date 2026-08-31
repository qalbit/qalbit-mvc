<?php

/**
 * Bespoke content for /services/erp-development/.
 *
 * The ERP page renders through its own template (pages/services/erp-development)
 * rather than the shared service layout, because most of its sections have no
 * equivalent in the generic partials. Sections that DO reuse a shared partial
 * (§5 modules, §7 process, §12 stack, §16 resources, §17 CTA) keep their content
 * in config/services.php under `erp_development` — only the new sections live here.
 *
 * Copy is transcribed verbatim from qalbit-erp-page-content-v2.md (2.0 FINAL,
 * 31 Aug 2026). Do not edit without a corresponding change to that document.
 */

return [

    // ------------------------------------------------------------------
    // §1 — HERO (two columns: copy left, form card right) + snapshot strip
    // ------------------------------------------------------------------
    'hero' => [
        'breadcrumb_label' => 'ERP development',
        'kicker_prefix'    => 'Services',
        'kicker_label'     => 'Custom ERP software development',

        'h1' => 'Custom ERP Development Services',

        'sub_copy' => [
            'Packaged ERP suites charge per seat, forever, and expect your business to work the way they do. We build ERP software around your actual operations – inventory, purchase, production, finance – module by module, so you own the system and the roadmap.',
            'Start with the process costing you the most. Add the rest when it earns its place.',
        ],

        'trust_line' => '11 years building operational software · 120+ projects delivered · Clutch 5.0 · Upwork Top Rated Plus',

        // Proof grid. Four numeric stats with short labels, matching the
        // reference design's pattern — a text value in the fourth cell broke
        // it. Every figure comes from the content document's first-party proof
        // line: "11 years operational software · 120+ projects · 90+ clients ·
        // Clutch 5.0 · Google 4.9 · Upwork Top Rated Plus".
        //
        // The reference's "100% Job Success Score" is deliberately NOT used —
        // it appears nowhere in the document and would be a new claim.
        'proof_stats' => [
            ['value' => '11+',  'label' => 'Years operational software'],
            ['value' => '120+', 'label' => 'Projects delivered'],
            ['value' => '90+',  'label' => 'Clients served'],
            ['value' => '5.0',  'label' => 'Clutch rating', 'accent' => true],
        ],

        // Rendered as the full-bleed bar closing the hero.
        'snapshot' => [
            ['label' => 'Core focus',  'value' => 'Modular ERPs – inventory, purchase, production, finance, HR'],
            ['label' => 'Engagements', 'value' => 'First ERP builds · legacy rebuilds · module extensions · integrations'],
            ['label' => 'Delivery',    'value' => 'Module-by-module rollout, fixed-scope first phase, parallel run'],
            ['label' => 'Markets',     'value' => 'US · UK · EU · GCC · Australia'],
        ],
    ],

    // Hero form card. Fields are rendered by partials/services/erp/hero-form.php
    // and post to the existing ContactController endpoint.
    //
    // Deliberately four fields — name, email, phone, message. The content
    // document specified seven (adding Company, Country of operation and
    // Current system), but those were dropped on request to cut friction:
    // a long form in the hero was judged more costly than the extra
    // segmentation. `Current system` in particular was the highest-value
    // field for splitting build-vs-migrate leads; that now gets asked on the
    // scoping call instead. Re-adding it is a config + markup change only.
    'form' => [
        'heading'  => 'Get an ERP scoping call',
        'sub_line' => 'Tell us how orders, stock and purchasing move through your business today. We’ll come back within 24–48 hours with a phased approach and a realistic first-module estimate.',
        'button'   => 'Request ERP scoping call',
        'micro'    => 'No sales sequence. One reply from the team that would build it.',
    ],

    // ------------------------------------------------------------------
    // §2 — WHAT IS CUSTOM ERP DEVELOPMENT
    // ------------------------------------------------------------------
    'definition' => [
        'id'      => 'what-is-custom-erp-development',
        'eyebrow' => 'Definition',
        'title'   => 'What is custom ERP development?',

        // Snippet-shaped opening, rendered as a lead paragraph.
        'snippet' => 'Custom ERP development is the process of building an enterprise resource planning system around a specific company’s workflows rather than configuring a packaged suite. It typically covers inventory, purchase, sales, production, finance and HR as connected modules, and the business owns the source code outright.',

        'body' => [
            'The distinction that matters isn’t technical. It’s about who bends.',
            'With a packaged suite, your processes get reshaped to fit the software’s assumptions, and you pay a per-seat licence every year for the privilege. With a custom build, the software is shaped to fit operations that already work, and cost is weighted toward a one-time build rather than a permanent subscription.',
            'Neither is automatically better. Packaged ERP wins when your processes are genuinely standard and you want to be live in weeks. Custom wins when the thing making your business competitive is exactly the thing the suite handles badly.',
        ],

        'terms_title' => 'Custom ERP vs ERP customisation vs ERP implementation',
        'terms_intro' => 'Three terms used interchangeably that shouldn’t be:',

        'terms' => [
            [
                'term' => 'ERP implementation',
                'text' => 'deploying and configuring an existing product such as SAP Business One, Odoo or NetSuite. You buy a licence and pay someone to set it up.',
            ],
            [
                'term' => 'ERP customisation',
                'text' => 'extending that product with custom modules, fields and reports. You still hold a licence, and now you also own custom code that must survive every vendor upgrade.',
            ],
            [
                'term' => 'Custom ERP development',
                'text' => 'building the system itself. No licence, no per-seat fee, no upgrade fragility. Higher upfront cost, full ownership.',
            ],
        ],

        'closing' => 'We build the third. We’ll say plainly when one of the first two is the better call for you.',
    ],

    // ------------------------------------------------------------------
    // §3 — WHEN TO BUILD, AND WHEN NOT TO
    // ------------------------------------------------------------------
    'build_vs_buy' => [
        'id'      => 'when-to-build-a-custom-erp',
        'eyebrow' => 'Build vs buy',
        'title'   => 'When a custom ERP is the right call – and when it isn’t',
        'intro'   => 'Most ERP content is written by people who only sell one answer. Here’s the honest version.',

        'build_title' => 'Build custom when',
        'build_items' => [
            'Operations have outgrown spreadsheets, but packaged suites would force you to change how you work rather than support it.',
            'Your competitive edge lives in a non-standard process – job work, batch genealogy, multi-location stock allocation, project billing, consignment.',
            'Per-seat licensing has stopped scaling. Past roughly 40 users, subscription maths starts working against you.',
            'You’ve customised a packaged ERP so heavily that every vendor upgrade has become a retesting project.',
            'You need to own the system, because of an acquisition, an audit requirement, or because the software is the business.',
        ],

        'buy_title' => 'Buy packaged instead when',
        'buy_items' => [
            'Your processes are genuinely standard and you need to be live in eight weeks.',
            'You’re under fifteen users with no unusual workflows.',
            'You have no internal owner for the system and no appetite for one.',
            'What you actually need is accounting plus light inventory. That’s a bookkeeping product, not an ERP.',
        ],

        'closing' => 'We turn down ERP projects that fall in the second list. A custom build where a packaged product would have worked is an expensive route to the same destination.',
    ],

    // ------------------------------------------------------------------
    // §4 — COMPARISON TABLE
    // Published vendor pricing only. Every figure carries its source and the
    // date it was checked; the two "Not published" rows are a finding, not a gap.
    // ------------------------------------------------------------------
    'comparison' => [
        'id'      => 'custom-erp-vs-odoo-sap-netsuite',
        'eyebrow' => 'Build vs buy costs',
        'title'   => 'Custom ERP vs Odoo, SAP, Dynamics 365 and NetSuite',
        'intro'   => 'Most build-vs-buy comparisons online use invented numbers. Below is published vendor pricing taken from official pricing pages, with the date we checked it. Where a vendor doesn’t publish pricing at all, we say so – because that’s a real factor in the decision.',

        // Bounds for the user-count slider above the table. 40 is the figure the
        // approved column header was written against, so it stays the default.
        'users'   => ['min' => 10, 'max' => 250, 'step' => 5, 'default' => 40],

        'columns' => [
            'Licence model',
            'Published price',
            '5-year cost, {users} users', // {users} is substituted with the slider value
            'Source',
        ],

        'rows' => [
            [
                'entity'    => 'Odoo Standard',
                // Published per-user monthly renewal rate. Drives the live 5-year
                // figure in the comparison table; rows without it print their
                // static `five_year` string instead (SAP and NetSuite publish none).
                'rate'      => 31.10,
                'model'     => 'Per user, all apps',
                'price'     => '$24.90/user/mo promo → <strong>$31.10 renewal</strong>',
                'five_year' => '~$74,640 at renewal rate',
                'source'    => 'odoo.com/pricing, Aug 2026',
            ],
            [
                'entity'    => 'Odoo Custom',
                // Published per-user monthly renewal rate. Drives the live 5-year
                // figure in the comparison table; rows without it print their
                // static `five_year` string instead (SAP and NetSuite publish none).
                'rate'      => 61.00,
                'model'     => 'Per user + Studio, API, on-prem',
                'price'     => '$49.00/user/mo promo → <strong>~$61.00 renewal</strong>',
                'five_year' => '~$146,400 at renewal rate',
                'source'    => 'odoo.com/pricing, Aug 2026',
            ],
            [
                'entity'    => 'Dynamics 365 BC Essentials',
                // Published per-user monthly renewal rate. Drives the live 5-year
                // figure in the comparison table; rows without it print their
                // static `five_year` string instead (SAP and NetSuite publish none).
                'rate'      => 80.00,
                'model'     => 'Per user',
                'price'     => '<strong>$80/user/mo</strong>',
                'five_year' => '~$192,000',
                'source'    => 'Microsoft list, eff. Oct 2025',
            ],
            [
                'entity'    => 'Dynamics 365 BC Premium',
                // Published per-user monthly renewal rate. Drives the live 5-year
                // figure in the comparison table; rows without it print their
                // static `five_year` string instead (SAP and NetSuite publish none).
                'rate'      => 110.00,
                'model'     => 'Per user',
                'price'     => '<strong>$110/user/mo</strong>',
                'five_year' => '~$264,000',
                'source'    => 'Microsoft list, eff. Oct 2025',
            ],
            [
                'entity'      => 'SAP Business One',
                'model'       => 'Named user, via reseller only',
                'price'       => 'Not published',
                'five_year'   => 'Cannot be calculated publicly',
                'source'      => 'Sold exclusively through VARs',
                'unpublished' => true,
            ],
            [
                'entity'      => 'Oracle NetSuite',
                'model'       => 'Base platform + named user',
                'price'       => 'Not published',
                'five_year'   => 'Cannot be calculated publicly',
                'source'      => 'Every contract negotiated',
                'unpublished' => true,
            ],
            [
                'entity'    => 'Custom build',
                'model'     => 'You own it. No seat fee.',
                'price'     => 'One-time build + optional retainer',
                'five_year' => 'Build cost, then support only',
                'source'    => '–',
                'is_custom' => true,
            ],
        ],

        // Body copy beneath the table — not footnotes, rendered at reading size.
        'notes' => [
            ['lead' => 'Promotional rates expire.', 'text' => 'Odoo’s discount applies to the first 12 months on initial users. Model your business case on the renewal rate. Vendors quote the sign-up number; your CFO lives with the second one.'],
            ['lead' => 'Two of these won’t tell you the price.', 'text' => 'SAP Business One sells exclusively through resellers and Oracle negotiates every NetSuite contract. Any figure you’ve seen online for either is a partner estimate, not list pricing. That opacity is itself worth weighing.'],
            ['lead' => 'Licence is not implementation.', 'text' => 'None of the above includes configuration, migration, training or integration. Microsoft, SAP and Oracle leave that to partners, and none publish those fees.'],
            ['lead' => 'Per-seat cost compounds.', 'text' => 'The point where custom becomes cheaper across five years usually falls between 30 and 50 users, depending on the tier you’d need. Below that, packaged usually wins on cost alone – and we’ll say so.'],
        ],

        'related' => [
            'label' => 'Custom ERP vs Odoo vs SAP – full comparison',
            'url'   => '/blog/custom-erp-vs-odoo-vs-sap/',
        ],
    ],

    // ------------------------------------------------------------------
    // §6 — COST
    // No price band is published here. That is a commercial decision, not an
    // oversight: see the positioning statement below.
    // ------------------------------------------------------------------
    'cost' => [
        'id'      => 'custom-erp-development-cost',
        'eyebrow' => 'Cost',
        'title'   => 'How much does custom ERP development cost?',

        'snippet' => 'Custom ERP development cost is driven by module count, integration complexity and data migration scope rather than user numbers. Unlike packaged ERP there is no per-seat licence, so cost is weighted toward a one-time build with an optional support retainer afterwards.',

        'positioning' => [
            'We don’t publish a price range for custom ERP, and we’d suggest treating any firm that does with some caution.',
            'Search this topic and you’ll find ranges spanning $10,000 to $1.5 million. That spread isn’t useful information – it’s a way of appearing to answer the question without answering it. A two-module inventory and purchase build for a single-location distributor and a multi-plant manufacturing system with batch genealogy are not the same project, and no range covers both honestly.',
            'What we do instead: a scoping call, a process map, and a fixed-scope estimate for phase one before you commit to anything beyond discovery. Below is exactly what moves that number, so you can sanity-check any quote you receive – ours included.',
        ],

        'drivers' => [
            [
                'title' => 'Number of modules in phase one',
                'text'  => 'The largest single driver. One module built properly beats four built thinly. Most first phases cover two to three connected modules.',
            ],
            [
                'title' => 'Integration count and quality',
                'text'  => 'Each connected system adds scope, and not equally. A modern REST API with OAuth and webhooks is straightforward. A legacy system with an XML-over-HTTP interface and no event support needs a middleware and reconciliation layer. See Integrations for the honest technical picture.',
                'ref'   => '#erp-integrations',
                'ref_text' => 'Integrations',
            ],
            [
                'title' => 'Data migration depth',
                'text'  => 'Migrating current masters and opening balances is routine. Migrating eight years of transactional history with reconciliation against the old system is a project in its own right. Audit your data before anyone scopes this.',
            ],
            [
                'title' => 'Process complexity, not company size',
                'text'  => 'A 20-person manufacturer with job work, batch tracking and multi-stage costing is a larger build than a 200-person distributor running straightforward buy-and-sell.',
            ],
            [
                'title' => 'Roles, permissions and approval chains',
                'text'  => 'Not a licence cost but a build cost. Six role types with location-scoped permissions and multi-step approvals is real engineering.',
            ],
            [
                'title' => 'Compliance and reporting requirements',
                'text'  => 'E-invoicing, VAT, audit trails and statutory formats add scope. Across the GCC this is frequently the reason for the project rather than a side requirement – see GCC compliance.',
                'ref'   => '#erp-gcc-compliance',
                'ref_text' => 'GCC compliance',
            ],
        ],

        'related' => [
            'label' => 'Custom ERP development cost in 2026',
            'url'   => '/blog/erp-development-cost-2026/',
        ],
    ],

    // ------------------------------------------------------------------
    // §9 — INDUSTRIES
    // Four blocks with paragraph-length copy. Deliberately NOT linked: none of
    // these four has a matching /industries/ page, and pointing them at a
    // near-match is worse than no link at all.
    // ------------------------------------------------------------------
    'industries' => [
        'id'      => 'erp-industries',
        'eyebrow' => 'Industries',
        'title'   => 'Industries we build ERP systems for',
        'intro'   => 'Operational software is industry-shaped. These are the sectors where the process knowledge transfers, and where a generic suite tends to struggle most.',

        'items' => [
            [
                'title' => 'Manufacturing',
                'icon'  => '/images/icons/erp-industry-manufacturing.svg',
                'text'  => 'Bills of materials, work orders, job work, wastage and batch costing. Multi-stage production where the cost of a finished unit depends on decisions made three steps earlier. Generic suites handle assembly reasonably and process manufacturing poorly.',
            ],
            [
                'title' => 'Pharmaceutical & life sciences',
                'icon'  => '/images/icons/erp-industry-pharmaceutical.svg',
                'text'  => 'Batch genealogy, expiry and shelf-life tracking, lot recall traceability, and validated audit trails. Regulatory reporting is a build requirement here rather than a reporting afterthought, which is why off-the-shelf configuration so often runs out of road.',
            ],
            [
                'title' => 'Logistics & distribution',
                'icon'  => '/images/icons/erp-industry-logistics.svg',
                'text'  => 'Multi-location stock, transfers and allocation, dispatch planning, proof of delivery, and consignment or third-party inventory. The complexity is rarely in any single warehouse – it’s in reconciling stock across all of them in real time.',
            ],
            [
                'title' => 'Accounting & finance operations',
                'icon'  => '/images/icons/erp-industry-accounting.svg',
                'text'  => 'Month-end close, multi-entity consolidation, receivables and payables workflows, approval chains and audit trails. Usually built alongside an existing accounting product rather than replacing it.',
            ],
        ],
    ],

    // ------------------------------------------------------------------
    // §10 — GCC COMPLIANCE
    //
    // ✅  DATES VERIFIED 31 August 2026 against primary and specialist sources.
    //
    //     Saudi Arabia — CORRECTED. Wave 24's deadline (30 June 2026) had
    //       passed. ZATCA announced Wave 25 on 24 July 2026: threshold halved
    //       to SAR 187,500 on revenues in any of 2022–2025, integration due
    //       1 February 2027. Source: zatca.gov.sa Wave 25 criteria page.
    //       Waves, UBL 2.1 signed XML, QR, cryptographic stamp, Fatoora API
    //       and the SAR 5,000–50,000 penalty range all verified correct.
    //     UAE — verified correct as written. Pilot 1 July 2026; mandatory
    //       1 Jan 2027 at AED 50m+, 1 July 2027 below that, 1 Oct 2027 for
    //       government entities; Peppol five-corner, PINT AE, ASPs; 9%
    //       corporate tax in effect.
    //       NOT STATED HERE (available if wanted): the ASP appointment
    //       deadlines fall earlier — 30 Oct 2026 for AED 50m+, 31 Mar 2027
    //       for the rest, AED 5,000/month penalty for missing them.
    //     Oman — verified correct. OTA approved as a Peppol Authority
    //       7 Jan 2026; pilot launched 1 Aug 2026 with ~100 large VAT-
    //       registered companies; phased mandatory Feb 2027 and Aug 2027.
    //       "Third GCC state" holds: Bahrain has no published mandate and
    //       Qatar only a draft law (May 2026).
    //     Kuwait — verified correct. No VAT, no confirmed e-invoicing
    //       mandate, 15% Business Profits Tax, advance payments from 2026,
    //       broader application 1 Jan 2027, KWD 1.5m exemption.
    //
    //     RE-CHECK BEFORE EACH PUBLISH: these are live regulatory deadlines.
    //     Wave 26 had not been announced as of 31 Aug 2026.
    // ------------------------------------------------------------------
    'gcc' => [
        'id'      => 'erp-gcc-compliance',
        'eyebrow' => 'GCC compliance',
        'title'   => 'ERP compliance for GCC operations – e-invoicing, VAT and corporate tax',
        'intro'   => 'Across the Gulf, e-invoicing mandates are now the most common trigger for an ERP project. If your system can’t produce compliant output, the deadline sets your timeline.',

        'countries' => [
            [
                'country' => 'Saudi Arabia',
                'marker'  => '/images/icons/erp-market-sa.svg',
                'scheme'  => 'ZATCA Fatoora Phase 2',
                'text'    => 'Rolled out in turnover-based waves, each with its own integration deadline. Compliance requires signed XML in UBL 2.1 format, a QR code, a cryptographic stamp and direct API integration with the Fatoora platform. Penalties run from SAR 5,000 to SAR 50,000. Thresholds have fallen with each wave – Wave 25 halved the threshold to SAR 187,500 in VAT-taxable revenue, with integration due by 1 February 2027.',
            ],
            [
                'country' => 'United Arab Emirates',
                'marker'  => '/images/icons/erp-market-ae.svg',
                'scheme'  => 'mandatory e-invoicing from 2027',
                'text'    => 'A voluntary pilot opened in July 2026. Mandatory adoption begins 1 January 2027 for businesses at or above AED 50 million annual revenue, extending to smaller businesses from 1 July 2027 and government entities from 1 October 2027. Peppol-based five-corner model in PINT AE format via Accredited Service Providers, running alongside the 9% corporate tax already in effect.',
            ],
            [
                'country' => 'Oman',
                'marker'  => '/images/icons/erp-market-om.svg',
                'scheme'  => 'Fawtara',
                'text'    => 'The Oman Tax Authority became a Peppol Authority in January 2026. A pilot began with large taxpayers in August 2026, with phased mandatory rollout from 2027. Oman is the third GCC state to mandate e-invoicing.',
            ],
            [
                'country' => 'Kuwait',
                'marker'  => '/images/icons/erp-market-kw.svg',
                'scheme'  => null,
                'text'    => 'No VAT and no confirmed e-invoicing mandate. A 15% Business Profits Tax is phasing in, with advance payments from 2026 and broader application from 2027. Businesses under KWD 1.5 million turnover are initially exempt.',
            ],
        ],

        'closing' => 'We build systems that emit compliant output natively rather than bolting a compliance module onto software that resists it. If a deadline is driving your project, that date is where we start planning backwards from.',
    ],

    // ------------------------------------------------------------------
    // §11 — INTEGRATIONS
    // ------------------------------------------------------------------
    'integrations' => [
        'id'      => 'erp-integrations',
        'eyebrow' => 'Integrations',
        'title'   => 'Accounting and business system integrations',
        'intro'   => 'Most ERP projects don’t replace the accounting system. The finance team trusts it, the auditors accept it, and removing it adds risk for no gain. We connect to it instead.',

        'modern' => [
            'title' => 'Modern APIs',
            'text'  => 'QuickBooks Online, Xero, Zoho Books and NetSuite all expose REST APIs with OAuth 2.0, JSON and webhooks. Real-time bidirectional sync is achievable and maintainable.',
        ],

        'legacy' => [
            'title' => 'Legacy systems – the honest version',
            'intro' => 'Tally remains widely used across GCC trading and distribution businesses, and integrating with it is a different exercise. TallyPrime has no REST API; anything advertising one is a wrapper over Tally’s XML layer. The realities:',
            'points' => [
                ['lead' => 'XML over HTTP',   'text' => 'on port 9000 for posting vouchers and pulling masters. Synchronous, no webhook support.'],
                ['lead' => 'ODBC',            'text' => 'is read-only, suitable for BI and reporting, and formally deprecated from TallyPrime 4.0 onward.'],
                ['lead' => 'TDL',             'text' => 'enables deeper customisation but can break across major version upgrades.'],
                ['lead' => 'active company only', 'text' => 'Tally operates on the active company only, so multi-company setups need instance switching or separate ports.', 'inline' => true],
            ],
            'closing' => 'None of that is a reason to avoid Tally. It’s a reason to budget for a proper middleware and reconciliation layer rather than assuming a two-week connector. We say this before the estimate, not after.',
        ],

        'everything_else' => [
            'title' => 'Everything else',
            'text'  => 'Payment gateways, shipping and logistics providers, e-commerce platforms, banking APIs, e-invoicing service providers, BI tools.',
        ],
    ],

    // §7 — citation published beneath the existing five process stages.
    'process_note' => [
        'text'     => 'Panorama Consulting’s 2026 ERP Report, covering 170 organisations, found the most common cause of schedule overrun was organisational rather than technical – governance, resistance to change, process redesign. The parallel-run stage exists because of that finding, not despite it.',
        'citation' => 'Panorama Consulting Group, The 2026 ERP Report, n=170, data collected Jan 2025–Jan 2026.',
    ],

    // ------------------------------------------------------------------
    // §13 — OUTCOMES
    // ------------------------------------------------------------------
    'outcomes' => [
        'id'      => 'erp-outcomes',
        'eyebrow' => 'Outcomes',
        'title'   => 'What an ERP project should actually change',
        'intro'   => 'Not projections. These are the operational changes an ERP build is meant to produce, and how you’d know whether yours did.',

        'columns' => ['What changes', 'How you’d measure it'],

        'rows' => [
            ['change' => 'One source of truth for stock across locations',      'measure' => 'Cycle-count variance between system and physical'],
            ['change' => 'Month-end close stops being a reconciliation project', 'measure' => 'Days from period close to reported numbers'],
            ['change' => 'Purchase decisions use live stock and pending orders', 'measure' => 'Frequency of emergency purchases and stockouts'],
            ['change' => 'Approvals are enforced, not remembered',               'measure' => 'Share of transactions with a complete audit trail'],
            ['change' => 'Owners see position without asking anyone',            'measure' => 'Time from question to answer'],
            ['change' => 'Compliance output is generated, not assembled',        'measure' => 'Hours per filing period'],
        ],

        // Published deliberately. The document forbids quoting a headline ERP
        // failure rate; this note is what replaces one.
        'note' => 'We don’t quote a headline ERP failure rate. The widely-circulated figures attributing 55–75% failure rates to Gartner have no traceable primary source. What is documented: Panorama Consulting’s 2026 report found more than a quarter of projects ran over budget and almost a quarter over schedule, across 170 organisations with a median nine-month timeline.',
    ],

    // ------------------------------------------------------------------
    // §14 — WHY QALBIT
    // Every claim here is first-party and adjacent. No delivered full-ERP
    // implementation is asserted anywhere — see the honesty constraints.
    // ------------------------------------------------------------------
    'why_us' => [
        'id'      => 'why-qalbit-erp',
        'eyebrow' => 'Why QalbIT',
        'title'   => 'Why work with us on ERP',

        'items' => [
            [
                'title' => 'Eleven years inside operational software',
                'text'  => '120+ projects delivered across web, mobile and platform work, with 90+ clients. Clutch 5.0, Google 4.9, Upwork Top Rated Plus. Our ERP work to date has centred on extending and integrating existing systems – custom modules and dashboards for a trading and distribution business, connecting tools that weren’t built to talk to each other.',
            ],
            [
                'title' => 'Phased rollout, parallel run, no big bang',
                'text'  => 'The most common cause of ERP schedule overrun is organisational, not technical. We roll out module by module and run in parallel with your existing tools until the numbers reconcile. Slower on paper, considerably less likely to stop your operations.',
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
                'title' => 'We’ll tell you not to build',
                'text'  => 'When a packaged product genuinely fits, we say so on the first call. It costs us a project and saves you a year.',
            ],
        ],
    ],

    // ------------------------------------------------------------------
    // CTAs — three full-width bands and seven inline links.
    // Placement follows the CTA map in the content document exactly.
    // ------------------------------------------------------------------
    'bands' => [
        // After §3
        'build_vs_buy' => [
            'title' => 'Not sure whether to build or buy?',
            'body'  => 'Send your process map, or just describe how an order moves through your business today. We’ll tell you honestly which side of that line you’re on – including when the answer is “buy Odoo.”',
            'primary_label' => 'Get a build-vs-buy assessment',
            'primary_url'   => '/contact-us/?topic=build-vs-buy',
            'secondary_label' => 'Book a 30-minute call',
            'secondary_url'   => 'https://crm.qalbit.com/book/discuss-project',
        ],

        // After §9
        'industry' => [
            'title' => 'Your industry has a process the standard suites handle badly.',
            'body'  => 'That’s usually the reason a custom build gets considered at all. Tell us what it is, and we’ll tell you whether it justifies the project.',
            'primary_label' => 'Describe your process',
            'primary_url'   => '/contact-us/?topic=erp-industry',
            'secondary_label' => 'See our work',
            'secondary_url'   => '/portfolio/',
        ],

        // §17 — final band
        'final' => [
            'id'     => 'erp-final-cta',
            'title'  => 'Let’s scope the first module.',
            'body'   => 'Tell us how orders, stock and purchasing move through your business today. We’ll map the process, identify which module earns its place first, and give you an honest estimate with a phased rollout plan.',
            'body_2' => 'If a packaged product is the better answer, we’ll tell you that instead.',
            'primary_label' => 'Book an ERP scoping call',
            'primary_url'   => 'https://crm.qalbit.com/book/discuss-project',
            'secondary_label' => 'Send your requirements',
            'secondary_url'   => '/contact-us/?topic=erp-development',
            'meta'   => 'Typically a reply within 24–48 hours, with questions rather than a brochure.',
        ],
    ],

    'inline_ctas' => [
        // After §2
        'fit_check' => [
            'lead'  => 'Not sure which of the three you need?',
            'label' => 'Send a two-line description of your operations',
            'url'   => '/contact-us/?topic=erp-fit-check',
        ],
        // After §4
        'tco' => [
            'lead'  => 'We’ll run this against your actual user count and module list.',
            'label' => 'Request a build-vs-buy cost model',
            'url'   => '/contact-us/?topic=erp-tco',
        ],
        // After §5
        'module_scope' => [
            'label' => 'Discuss which module to build first',
            'url'   => '/contact-us/?topic=erp-module-scope',
        ],
        // After §6
        'estimate' => [
            'label'           => 'Get a phase-one estimate for your scope',
            'url'             => '/contact-us/?topic=erp-estimate',
            'secondary_label' => 'Try the cost calculator',
            'secondary_url'   => '/tools/software-development-cost-calculator/',
        ],
        // After §8
        'use_case' => [
            'label' => 'Tell us which of these sounds like you',
            'url'   => '/contact-us/?topic=erp-use-case',
        ],
        // After §10
        'gcc_compliance' => [
            'label' => 'Talk to us about a compliance-driven ERP timeline',
            'url'   => '/contact-us/?topic=erp-gcc-compliance',
        ],
    ],
];
