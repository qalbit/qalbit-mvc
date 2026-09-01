<?php

/**
 * Bespoke content for /services/crm-development/.
 *
 * Mirrors config/erp_page.php exactly in shape, because the CRM page renders
 * through the SAME partials as the ERP page. The page template sets
 * `$erp = config('crm_page')`, so every `resources/views/partials/services/erp/*`
 * partial reads its content from this file without modification. That is the
 * whole reuse mechanism — see the docblock in pages/services/crm-development.php.
 *
 * Sections that reuse a SHARED service partial (§5 modules, §7 process,
 * §8 project types, §12 stack, §16 resources) keep their content in
 * config/services.php under `crm_development`, as on the ERP page.
 *
 * Copy is transcribed verbatim from qalbit-crm-page-content-v2.md (2.0 FINAL,
 * 31 Aug 2026). Do not edit without a corresponding change to that document.
 *
 * TWO STANDING CONSTRAINTS carried from that document:
 *   - No price is published for QalbIT's own services. §6 argues why.
 *   - No delivered client CRM project is claimed anywhere. LiftUp is our own
 *     product and the copy says so plainly. Do not "strengthen" it.
 */

return [

    // ------------------------------------------------------------------
    // §1 — HERO (two columns: copy left, form card right) + snapshot strip
    // ------------------------------------------------------------------
    'hero' => [
        'breadcrumb_label' => 'CRM development',
        'kicker_prefix'    => 'Services',
        'kicker_label'     => 'Custom CRM software development',

        'h1' => 'Custom CRM Development Services',

        'sub_copy' => [
            'Salesforce Sales Cloud Enterprise lists at $175 per user per month. HubSpot charges a mandatory $1,500 onboarding fee on Sales Pro before your team logs in once. Both numbers are from the vendors’ own pricing pages, and both went up last year.',
            'We build CRM software you own outright. Your pipeline, your fields, your customer data, on infrastructure you control. No per-seat tax, no feature tiers, no renewal negotiation every January.',
        ],

        'trust_line' => '11 years building operational software · 120+ projects · We built and run our own CRM · Clutch 5.0',

        // Three cells, not four. The hero's proof grid is count-driven
        // (`repeat($n, minmax(0,1fr))`), so three sit correctly.
        //
        // The ERP page runs four because its trust line carries four numeric
        // claims. This document's trust line carries three numbers and one
        // statement — "We built and run our own CRM" — which is a sentence, not
        // a stat, and a text value in a numeral cell is what broke this grid on
        // the ERP build. That claim is not dropped: it leads §14, which is where
        // the document puts the weight anyway.
        'proof_stats' => [
            ['value' => '11+',  'label' => 'Years operational software'],
            ['value' => '120+', 'label' => 'Projects delivered'],
            ['value' => '5.0',  'label' => 'Clutch rating', 'accent' => true],
        ],

        'snapshot' => [
            ['label' => 'Core focus',  'value' => 'Custom CRMs for sales, service and operations'],
            ['label' => 'Engagements', 'value' => 'First CRM builds · migrations off commercial CRM · CRM–ERP integration'],
            ['label' => 'Delivery',    'value' => 'Fixed-scope first release, then module by module'],
            ['label' => 'Markets',     'value' => 'US · UK · EU · GCC · Australia'],
        ],
    ],

    // Hero form card.
    //
    // FIELD SET IS THE ERP PAGE'S, BY EXPLICIT INSTRUCTION. The content
    // document specifies eight fields, two of them required selects (Current
    // CRM, and seat count) which it argues "qualify a lead in seconds". Those,
    // plus Company and Country of operation, are NOT built here: the decision
    // was to reuse the ERP form exactly, unchanged.
    //
    // Consequence, recorded so it is not rediscovered as a bug: there is no
    // <select> on this page, and current-CRM and seat count arrive as free text
    // in the message box or not at all. The sub-line below is the document's
    // own, and still asks for both. Re-adding the fields is a config + markup
    // change to hero-form.php only.
    'form' => [
        'heading'  => 'Get a CRM scoping call',
        'sub_line' => 'Tell us what your team uses today and what it costs. We’ll come back within 24–48 hours with a scoped first release and a straight comparison against your current licence spend.',
        'button'   => 'Request CRM scoping call',
        'micro'    => 'One reply from the people who’d build it. No sequence.',

        // The message field, in this page's own language. Same field, same
        // count — the ERP default asks about "orders, stock and purchasing",
        // which is nonsense next to a CRM heading. Both strings are the
        // approved comp's wording for this field.
        'message_label'       => 'What’s not working today?',
        'message_placeholder' => 'Which part of your process can the current tool not hold?',

        // Lead routing. These two differ from the ERP form and must: leaving
        // them at the ERP values files every CRM enquiry as an ERP lead.
        'lead_from'  => 'lead_crm_hero',
        'lead_topic' => 'crm-development',
        'redirect'   => '/services/crm-development/',
    ],

    // ------------------------------------------------------------------
    // §2 — WHAT IS CUSTOM CRM DEVELOPMENT
    //
    // No `terms` block. The ERP page carries a three-term distinction
    // (implementation / customisation / custom development) because those
    // words are genuinely confused in ERP buying. This document has no
    // equivalent, so the block is omitted — definition.php guards it.
    // ------------------------------------------------------------------
    'definition' => [
        'id'      => 'what-is-custom-crm-development',
        'eyebrow' => 'Definition',
        'title'   => 'What is custom CRM development?',

        'snippet' => 'Custom CRM development means building a customer relationship management system around one company’s sales process, data model and reporting needs instead of configuring a commercial product. The business owns the source code and the database outright, and pays no per-seat licence fee.',

        'body' => [
            'The difference isn’t really technical. Salesforce, HubSpot and Zoho are good software. Millions of companies run on them and most of those companies made the right call.',
            'The difference is who absorbs the mismatch. Configure a commercial CRM and your process bends toward the product’s assumptions about how selling works. Some of that bending is healthy. Some of it ends with your team keeping a shadow spreadsheet because the CRM can’t hold the one field the business actually runs on.',
            'The second difference is the shape of the cost. Commercial CRM is a subscription that scales with headcount and never ends. A custom build is weighted toward a one-time cost with a support retainer after. Neither is automatically cheaper. Which one wins depends almost entirely on how many people will use it and for how long.',
        ],
    ],

    // ------------------------------------------------------------------
    // §3 — WHAT A COMMERCIAL CRM SEAT ACTUALLY COSTS
    //
    // The page's centrepiece, and the one section with no ERP equivalent.
    // The ERP comparison table is a COST MODEL — a user-count slider,
    // rate x 12 x 5 x users computed in PHP, cells rewritten by JS. This is a
    // static 6x3 tier matrix with no arithmetic, so it gets its own partial
    // (partials/services/crm/seat-costs.php) rather than a flag on that one.
    //
    // EVERY FIGURE IS A VENDOR'S OWN PUBLISHED PRICE. None is ours, and none
    // is an estimate. `approx => true` renders the document's "~", which marks
    // the figures it flags as cross-checked but not fetched from the vendor
    // page — see the RE-VERIFY row in the document's source table.
    //
    // PIPEDRIVE IS DELIBERATELY ABSENT. 2026 sources conflict and a page whose
    // credibility rests on accurate pricing cannot carry one guessed number.
    // Do not add it. NO VENDOR LOGOS — trademark terms restrict use in
    // comparative contexts and this section is explicitly comparative.
    // ------------------------------------------------------------------
    'seat_costs' => [
        'id'      => 'commercial-crm-seat-cost',
        'eyebrow' => 'What a seat costs',
        'title'   => 'What a commercial CRM seat actually costs',

        'intro' => [
            'Credit where it’s due — unlike the ERP vendors, the CRM companies publish their prices. Salesforce lists every edition on a public page. So do HubSpot, Zoho and Microsoft. You can check all of it yourself, which is exactly what we’d suggest doing before signing anything.',
            'Here’s what they publish.',
        ],

        'table_note' => 'Per user per month, billed annually, US pricing, accessed August 2026.',
        'columns'    => ['Entry', 'Mid', 'Top'],

        // Screen-reader caption. Never rendered visually; it exists because the
        // visible <h2> does not say what the columns hold.
        'table_caption' => 'Published per-user monthly pricing for Salesforce Sales Cloud, HubSpot Sales Hub, Microsoft Dynamics 365 Sales, Zoho CRM, Freshsales and monday CRM, by entry, mid and top edition.',

        // Each tier cell is a list of products so a two-product cell
        // (Salesforce Mid, Salesforce Top, Zoho Mid) renders as two stacked
        // lines rather than one wrapping run.
        'rows' => [
            [
                'vendor' => 'Salesforce Sales Cloud',
                'vendor_lines' => ['Salesforce', 'Sales Cloud'],
                'tiers'  => [
                    [['name' => 'Starter Suite', 'price' => '$25']],
                    [['name' => 'Pro Suite', 'price' => '$100'], ['name' => 'Enterprise', 'price' => '$175']],
                    [['name' => 'Unlimited', 'price' => '$350'], ['name' => 'Agentforce 1 Sales', 'price' => '$550']],
                ],
            ],
            [
                'vendor' => 'HubSpot Sales Hub',
                'vendor_lines' => ['HubSpot', 'Sales Hub'],
                'tiers'  => [
                    [['name' => 'Starter', 'price' => '$15', 'approx' => true]],
                    [['name' => 'Professional', 'price' => '$90']],
                    [['name' => 'Enterprise', 'price' => '$150', 'approx' => true]],
                ],
            ],
            [
                'vendor' => 'Microsoft Dynamics 365 Sales',
                'vendor_lines' => ['Microsoft', 'Dynamics 365 Sales'],
                'tiers'  => [
                    [['name' => 'Professional', 'price' => '$65']],
                    [['name' => 'Enterprise', 'price' => '$105']],
                    [['name' => 'Premium', 'price' => '$150', 'note' => '10-user min']],
                ],
            ],
            [
                'vendor' => 'Zoho CRM',
                'tiers'  => [
                    [['name' => 'Standard', 'price' => '$14']],
                    [['name' => 'Professional', 'price' => '$23'], ['name' => 'Enterprise', 'price' => '$40']],
                    [['name' => 'Ultimate', 'price' => '$52']],
                ],
            ],
            [
                'vendor' => 'Freshsales',
                'tiers'  => [
                    [['name' => 'Growth', 'price' => '$9', 'approx' => true]],
                    [['name' => 'Pro', 'price' => '$39', 'approx' => true]],
                    [['name' => 'Enterprise', 'price' => '$59', 'approx' => true]],
                ],
            ],
            [
                'vendor' => 'monday CRM',
                'tiers'  => [
                    [['name' => 'Basic', 'price' => '$12']],
                    [['name' => 'Standard', 'price' => '$17']],
                    [['name' => 'Pro', 'price' => '$28']],
                ],
            ],
        ],

        // Body copy beneath the table, at reading size. Not a footnote.
        'sources' => 'Sources: salesforce.com/sales/pricing, HubSpot pricing documentation, Microsoft Dynamics 365 pricing, Zoho, Freshworks, monday.com. Accessed August 2026. Prices change — check before you budget.',

        'hidden_title' => 'Four things that table doesn’t show',

        // Prose with bold lead-ins, not cards.
        'hidden' => [
            [
                'lead' => 'The API can be an add-on.',
                'text' => 'On Salesforce Pro Suite, Web Services API access costs an extra $25 per user per month. It’s included from Enterprise up. If your CRM needs to talk to anything else — and it will — that’s a line item most buyers don’t see until they’re committed.',
            ],
            [
                'lead' => 'Sandboxes are a tier gate.',
                'text' => 'A full sandbox is included at Unlimited, which is $350 per user per month. On Enterprise it’s available for purchase. That’s the cost of testing a change before it hits your live pipeline. On Pro Suite, Flow Builder caps at five flows per org.',
            ],
            [
                'lead' => 'Onboarding is mandatory.',
                'text' => 'HubSpot charges a one-time $1,500 fee on Sales Hub Professional and $3,500 on Enterprise. It lands on the first invoice. Paying annually up front doesn’t waive it.',
            ],
            [
                'lead' => 'The price goes up.',
                'text' => 'Salesforce announced on its own newsroom that list prices rose an average of 6% on 1 August 2025, hitting Enterprise and Unlimited editions of Sales Cloud, Service Cloud and Field Service. That followed a 9% increase in 2023. Separately, annual uplift clauses in enterprise order forms commonly compound at renewal — contract-specific rather than published, so read yours.',
            ],
        ],

        // ------------------------------------------------------------------
        // The seat model. Was three static paragraphs carrying fixed worked
        // examples (5 seats on HubSpot, 25 on Salesforce); it is now a live
        // slider so the reader checks their OWN seat count against the
        // published rates in the table above.
        //
        // `rate` is the vendor's published per-seat MONTHLY price, taken from
        // the table above and nowhere else. `months` is the span being priced
        // (12 = a year, 60 = five years) and `plus` is a flat one-off on top.
        // Nothing here is an estimate of ours — every input is a vendor list
        // price, which is the only reason this section can carry numbers at
        // all. Do not add a row whose rate is not in the table.
        //
        // Rendered server-side at `seats_now`, then recomputed by the shared
        // slider in public/assets/js/erp-page.js. Correct before JS runs.
        // ------------------------------------------------------------------
        'arithmetic' => [
            'title'       => 'Run the arithmetic yourself',
            'seats_label' => 'Seats on the licence',
            'seats_unit'  => 'people',
            'seats_min'   => 3,
            'seats_max'   => 100,
            'seats_now'   => 25,
            'seats_hint'  => 'Drag to check the maths against the published rates above. Nothing here is an estimate of our own — it is the vendors’ list pricing multiplied out.',

            'rows' => [
                [
                    'label'  => 'HubSpot Sales Professional, year one',
                    'sub'    => '$90 per seat plus the $1,500 onboarding fee',
                    'rate'   => 90,
                    'months' => 12,
                    'plus'   => 1500,
                ],
                [
                    'label'  => 'Salesforce Enterprise, every year',
                    'sub'    => '$175 per seat per month',
                    'rate'   => 175,
                    'months' => 12,
                    'accent' => true,
                ],
                [
                    'label'  => 'Salesforce Enterprise across five years',
                    'sub'    => 'before any uplift at renewal',
                    'rate'   => 175,
                    'months' => 60,
                    'accent' => true,
                ],
                [
                    'label'  => 'Zoho CRM Standard, every year',
                    'sub'    => '$14 per seat per month — the one you probably shouldn’t beat',
                    'rate'   => 14,
                    'months' => 12,
                ],
            ],

            'closing' => 'Neither figure is a scandal. Both are what the vendors publish. The question is whether year five still looks acceptable, because year five is when the subscription model gets tested.',
        ],
    ],

    // ------------------------------------------------------------------
    // §4 — WHEN BUYING IS THE RIGHT ANSWER
    //
    // Rendered by the ERP build-vs-buy ledger: two equal columns, buy on one
    // side, build on the other. The document writes these as prose rather than
    // as two lists, but they decompose into one cleanly and every sentence
    // below is verbatim — the "Custom wins at scale…" closing paragraph IS the
    // build column, split at its own sentence boundaries.
    //
    // The one thing that does not fit a ledger is the ecosystem block, which is
    // an argument rather than a list. It renders after the columns through an
    // OPTIONAL `ecosystem` prop added to build-vs-buy.php for this page; the
    // ERP page omits the key and is unaffected.
    // ------------------------------------------------------------------
    'build_vs_buy' => [
        'id'      => 'when-to-buy-a-crm',
        'eyebrow' => 'Build vs buy',
        'title'   => 'When you should buy instead',
        'intro'   => 'Zoho CRM Standard is $14 per user per month. Ten salespeople running an ordinary pipeline costs $1,680 a year. You are not going to beat that with a custom build, and we won’t pretend you can.',

        // Column order and marker treatment are fixed in
        // partials/services/crm/build-vs-buy.php, not configurable: buy leads
        // because the heading argues the buy case, but custom keeps the accent.
        // See that file's docblock — the mismatch is deliberate.

        'buy_title' => 'Buy commercial when',
        'buy_items' => [
            'Buy commercial when your sales process is conventional. Lead, qualify, demo, propose, close. If your pipeline looks like everyone else’s, a product built for everyone’s pipeline will fit.',
            'Buy when you’re under roughly 25 users with no steep growth curve. The per-seat maths only turns against you at scale.',
            'Buy when you need to be running next month. Discovery, design and a first release take weeks. A Zoho trial takes an afternoon.',
            'And buy when nobody internally will own the system. Custom software needs a person who cares about it. If that person doesn’t exist, buy something with a support contract attached.',
        ],

        'build_title' => 'Custom wins when',
        'build_items' => [
            'Custom wins at scale, where the per-seat tax compounds into real money.',
            'It wins when your process is genuinely unusual and the workaround is costing you deals.',
            'It wins when data can’t leave a jurisdiction.',
            'And it wins when you’d rather hold an asset than a renewal date.',
        ],

        'ecosystem' => [
            'title' => 'What commercial CRM gives you that a custom build won’t match',
            'body'  => [
                'Being straight about this matters more than the pitch.',
                'Salesforce’s AppExchange holds thousands of pre-built integrations. Building an equivalent connection library from scratch isn’t a project anyone should attempt. Mobile apps with offline sync, refined across a decade of field-sales feedback, are genuinely hard to replicate. AI features get updated continuously without you funding the development. Compliance certifications arrive pre-audited. And when something breaks at 2am, there’s an SLA behind it.',
            ],
        ],

        'closing' => 'A custom CRM gets you exactly what you specify. It does not get you an ecosystem.',
    ],

    // ------------------------------------------------------------------
    // §6 — COST
    //
    // NO PRICE, NO RANGE, NO HOURLY RATE. That is the section's argument, not
    // an omission. See the document's "Do not publish" list.
    // ------------------------------------------------------------------
    'cost' => [
        'id'      => 'custom-crm-development-cost',
        'eyebrow' => 'Cost',
        'title'   => 'How much does custom CRM development cost?',

        'snippet' => 'Custom CRM development cost is driven by module count, integration complexity and data migration depth rather than user numbers. There is no per-seat licence, so the cost is weighted toward a one-time build with an optional support retainer.',

        'positioning' => [
            'We don’t publish a price range, and the reason is worth explaining.',
            'Search this and you’ll find guides quoting $20,000 to $360,000. That spread isn’t an answer. It’s a way of appearing to answer while committing to nothing. A pipeline-and-contacts CRM for a twelve-person agency and a multi-region system with ERP sync and residency requirements are not the same project.',
            'What we do instead: a scoping call, a workflow map, and a fixed-scope estimate for the first release before you commit to anything beyond discovery.',
            // Marked `lead` so it carries the band's emphasis: it heads the
            // second column and is the argument the section turns on. See the
            // band 2 note in partials/services/erp/cost.php.
            [
                'text' => 'The comparison that matters isn’t build cost against zero. It’s build cost against what you’ll pay in licences over the same period. Bring your current invoice.',
                'lead' => true,
            ],
            // Sits directly beneath it, at the foot of the second column, so it
            // reads into the numbered driver index below rather than floating.
            'Here’s what moves the number.',
        ],

        'drivers' => [
            [
                'title' => 'Modules in the first release',
                'text'  => 'Leads, pipeline and a customer 360 view is a different build from that plus quoting, renewals and a service desk. Most first releases we scope cover three to four connected modules.',
            ],
            [
                'title' => 'Integration count, and what you’re integrating with',
                'text'  => 'Not all integrations cost the same. A modern REST API with OAuth and webhooks is straightforward. Telephony, WhatsApp Business and older ERPs need middleware and reconciliation logic. What you’re connecting to matters more than how many.',
                'ref'      => '#crm-integrations',
                'ref_text' => 'Integrations',
            ],
            [
                'title' => 'Migration depth',
                'text'  => 'Contacts and companies are routine. Deal history, email threads, call recordings and attachments are not — and some of it may not be exportable at all, depending on what you’re leaving.',
                'ref'      => '#crm-migration',
                'ref_text' => 'Migration',
            ],
            [
                'title' => 'Roles and permission complexity',
                'text'  => 'Field-level permissions, territory rules and multi-step approvals are engineering, not configuration.',
            ],
            [
                'title' => 'Compliance requirements',
                'text'  => 'HIPAA, GDPR erasure workflows or data residency change the architecture rather than adding a feature. Scope them at the start or pay for them twice.',
            ],
            [
                'title' => 'Whether you need a mobile app',
                'text'  => 'A responsive web CRM covers most teams. Field sales with offline capture is a second product. Decide early.',
            ],
        ],

        'related' => [
            'label' => 'Custom CRM development cost in 2026',
            'url'   => '/blog/crm-development-cost-2026/',
        ],
    ],

    // ------------------------------------------------------------------
    // §9 — VERTICALS
    //
    // THREE, NOT FOUR. Fintech was removed deliberately; do not pad this back
    // to four for visual balance. industries.php sets its grid from the item
    // count, so three need no layout change.
    //
    // NO LINKS. Same rule as the ERP industries section — none of these has a
    // matching /industries/ page and a near-match is worse than no link.
    // ------------------------------------------------------------------
    'industries' => [
        'id'      => 'crm-verticals',
        'eyebrow' => 'Verticals',
        'title'   => 'Where the standard CRMs run out of road',
        'intro'   => 'Sometimes the reason for a custom CRM isn’t workflow fit. It’s that the compliance requirement sits behind a pricing tier.',

        'items' => [
            [
                'title' => 'Healthcare',
                'icon'  => '/images/icons/erp-industry-pharmaceutical.svg',
                'text'  => 'HubSpot will sign a Business Associate Agreement, but only on Enterprise editions with sensitive data enabled — a capability that became generally available in September 2024. Patient data held on lower tiers before that isn’t retroactively covered. Salesforce signs BAAs too, but coverage is product-specific rather than blanket, with Health Cloud as the HIPAA-eligible product. AppExchange apps count as separate business associates and need their own agreements.',
            ],
            [
                'title' => 'Real estate',
                'icon'  => '/images/icons/erp-industry-logistics.svg',
                'text'  => 'Property inventory, site-visit scheduling, broker splits and commission structures. Standard CRMs model a deal as one object with a value and a close date. Real estate deals aren’t shaped like that, which is why so many agencies end up running a CRM alongside a parallel spreadsheet.',
            ],
            [
                'title' => 'Professional services',
                'icon'  => '/images/icons/erp-industry-accounting.svg',
                'text'  => 'Retainers, project-linked billing, and renewals where one client relationship runs for years. Pipeline software built around one-time transactions handles recurring relationships badly.',
            ],
        ],

        // Rendered beneath the three verticals, before the CTA band.
        'closing' => 'The practical version: the compliance you need may force you into the tier you didn’t budget for. A CRM on infrastructure you control removes the gate entirely.',
    ],

    // ------------------------------------------------------------------
    // §9 (continued) — WHERE YOUR DATA LIVES
    //
    // Rendered by gcc-compliance.php, which is structurally a
    // "jurisdiction → regulation → what it forces you to do" block. That fits.
    // The NAME does not: this content is GDPR (EU) plus UAE PDPL, and filing
    // GDPR under "GCC compliance" would be wrong. The section id, eyebrow and
    // title below are therefore data-residency's, not the ERP page's.
    // ------------------------------------------------------------------
    'gcc' => [
        'id'      => 'crm-data-residency',
        'eyebrow' => 'Data residency',
        'title'   => 'Where your data lives',

        // NOTE: this block has no `intro`. The design comp's label column is
        // just the eyebrow and the heading, so the sentence that used to sit
        // there ("For EU customer data, GDPR Article 17 gives…") now opens the
        // European Union row instead. Not one word was cut — it was moved, and
        // it reads better against the jurisdiction it describes than floating
        // above both of them.
        'countries' => [
            [
                'country' => 'European Union',
                // `marker` is read by nothing on this page — the comp has no
                // flag icons in this block. Kept for shape only.
                'marker'  => null,
                'scheme'  => 'GDPR Articles 17, 19 and 83(5)',
                'text'    => 'For EU customer data, GDPR Article 17 gives individuals a right to erasure with a one-month response window, and Article 19 requires passing that request to anyone you shared the data with. Penalties under Article 83(5) reach €20 million or 4% of worldwide annual turnover, whichever is higher. Building erasure and export as native workflows is more straightforward than assembling them from a vendor’s toolset.',
            ],
            [
                'country' => 'United Arab Emirates',
                'marker'  => '/images/icons/erp-market-ae.svg',
                'scheme'  => 'Federal Decree-Law No. 45 of 2021',
                'text'    => 'Salesforce has offered UAE in-country residency through Hyperforce since December 2023 — worth knowing that region assignment is a contractual item on the order form, not a setting you toggle.',
            ],
        ],

        'closing' => 'A custom build can be hosted wherever the requirement says, including markets where the major vendors have no local region at all.',
    ],

    // ------------------------------------------------------------------
    // §10 — MIGRATION
    //
    // Uses integrations.php, which reads whichever array the template assigns
    // to $erpInt immediately before the include — the same handover
    // cta-band.php already uses for its three bands. See the template.
    // ------------------------------------------------------------------
    'migration' => [
        'id'      => 'crm-migration',
        'eyebrow' => 'Migration',
        'title'   => 'Getting your data out of a commercial CRM',
        'intro'   => 'Worth checking before you sign, not after you decide to leave. Export capability varies more than people expect, and the gaps are rarely where you’d look for them.',

        // ------------------------------------------------------------------
        // ONE ROW PER VENDOR. This used to be shaped as `modern` / `legacy` /
        // `everything_else` so it could render through the integrations
        // partial's three-part contrast. That shape had nowhere to put a third
        // vendor and nowhere to put a per-vendor caveat, and the copy paid for
        // it twice: the HubSpot note about workflow configs not exporting was
        // filed inside the SALESFORCE block (retitled "HubSpot workflows" so it
        // still made sense there, where a reader would have taken it as a
        // Salesforce limit), and Zoho was demoted to the Salesforce block's
        // closing line. Both are back where they belong.
        //
        // A `body` entry is a plain paragraph, or ['lead' => …, 'text' => …]
        // for one with a bold lead-in. `limits` is optional and only Salesforce
        // carries it, because it is the only one of the three publishing hard
        // numbers.
        //
        // These are vendor behaviours with a shelf life. Re-check before each
        // publish; nothing here is ours.
        // ------------------------------------------------------------------
        'vendors' => [
            [
                'name' => 'HubSpot',
                'body' => [
                    'The Exports API allows up to 30 exports in a rolling 24-hour window, processed one at a time, and each download URL expires five minutes after the export completes. Contacts, companies, deals, activities, form submissions and inbox data all come out. Export is available on every plan, including the free CRM.',
                    [
                        'lead' => 'What doesn’t come out as a file:',
                        'text' => 'workflow configurations, sequence definitions and some dashboard settings. Those get documented and rebuilt. Budget for it — it’s usually the part that surprises people.',
                    ],
                ],
            ],
            [
                'name' => 'Salesforce',
                'body' => [
                    'The Data Export Service plus the Bulk API handle full extraction, including activity history and attachments. Salesforce publishes its limits:',
                ],
                'limits' => [
                    ['term' => 'Enterprise Edition', 'text' => 'gets 100,000 API requests per 24 hours as a base, plus 1,000 per user licence.'],
                    ['term' => 'Large migrations',   'text' => 'get planned around that ceiling rather than run in one pass.'],
                ],
            ],
            [
                'name' => 'Zoho',
                'body' => [
                    'Native export handles high record volumes. Attachments migrate separately and hit limits that can require multiple runs.',
                ],
            ],
        ],

        'closing' => [
            'title' => 'The point',
            'text'  => 'Migration is planned at the start of a project, not near the end. We map fields, de-duplicate, run verification reports your team can check, and keep the old system live in parallel until the numbers reconcile.',
        ],
    ],

    // ------------------------------------------------------------------
    // §11 — INTEGRATIONS
    // ------------------------------------------------------------------
    'integrations' => [
        'id'      => 'crm-integrations',
        'eyebrow' => 'Integrations',
        'title'   => 'What the CRM needs to talk to',
        'intro'   => 'Integration is the most common reason clients end up choosing custom. Not because commercial CRMs can’t integrate, but because the specific connection they need sits behind a tier, an add-on, or a middleware subscription.',

        // ------------------------------------------------------------------
        // ONE ROW PER INTEGRATION FAMILY. This used to be shaped as
        // `modern` / `legacy` / `everything_else` so it could render through
        // the ERP integrations partial, whose middle slot is a DARK panel
        // arguing that legacy interfaces are the hard half of that section.
        // These three families are not a contrast — they are three equally
        // routine kinds of connection — so the comp keeps every row light and
        // ruled the same way, and the slot names described nothing real.
        //
        // A row is a `title` plus either `text`, or the richer form: an
        // optional `note` under the title, a `points` term/definition list, and
        // an optional `closing` pull-quote. Only Communication needs the rich
        // form.
        //
        // `points` terms and texts are ONE SENTENCE EACH, split at the term:
        // "Click-to-call with automatic logging, so the activity record writes
        // itself." Do not reword either half on its own.
        // ------------------------------------------------------------------
        'rows' => [
            [
                'title' => 'Accounting and ERP',
                'text'  => 'QuickBooks Online, Xero, Zoho Books and NetSuite expose modern REST APIs with OAuth and webhooks. Two-way sync of customers, invoices and payment status is achievable and maintainable. Older ERPs need a middleware layer, which we scope explicitly rather than assume.',
            ],
            [
                'title' => 'Communication',
                // The note used to open "Telephony with click-to-call and
                // automatic logging, WhatsApp Business, email threading." —
                // which is a list of the three `points` directly beneath it,
                // said twice. The comp drops that half and keeps the claim.
                'note'  => 'This is where CRM adoption is won or lost.',
                'points' => [
                    ['term' => 'Click-to-call',     'text' => 'with automatic logging, so the activity record writes itself.'],
                    ['term' => 'WhatsApp Business', 'text' => 'as a first-class channel rather than a screenshot pasted into a note.'],
                    ['term' => 'Email threading',   'text' => 'against the account and the deal, not just the contact.'],
                ],
                'closing' => 'If logging a call takes three clicks, reps stop logging calls.',
            ],
            [
                'title' => 'Everything else',
                'text'  => 'Marketing platforms, e-signature, payment gateways, customer portals, BI tools.',
            ],
        ],
    ],

    // §7 — published beneath the five process stages.
    'process_note' => [
        'text'     => 'A CRM nobody updates is a spreadsheet with a login page. The first release goes to a small group of real users with real data rather than to everyone at once, because the friction shows up in week two and it’s cheaper to fix then.',
        'citation' => '',
    ],

    // ------------------------------------------------------------------
    // §13 — OUTCOMES
    // ------------------------------------------------------------------
    'outcomes' => [
        'id'      => 'crm-outcomes',
        'eyebrow' => 'Outcomes',
        'title'   => 'What should be different six months after go-live',
        'intro'   => 'Not projections. These are the things a CRM project is supposed to change, and how you’d check whether yours did.',

        'columns' => ['What changes', 'How you’d measure it'],

        'rows' => [
            ['change' => 'Reps update the CRM without being chased',        'measure' => 'Share of deals with activity in the last 7 days'],
            ['change' => 'One record per customer, not one per system',     'measure' => 'Duplicate rate after de-duplication'],
            ['change' => 'Forecast reflects reality',                       'measure' => 'Variance between forecast and actual close'],
            ['change' => 'Handovers stop losing context',                   'measure' => 'Time for a new owner to get up to speed on an account'],
            ['change' => 'Leadership stops asking for reports',             'measure' => 'Time from question to answer'],
            ['change' => 'Licence spend stops growing with headcount',      'measure' => 'Cost per user, year three vs year one'],
        ],

        // ------------------------------------------------------------------
        // Published deliberately, and it REPLACES a flattering number rather
        // than adding one. "$8.71 returned per dollar" is on the document's
        // do-not-publish list precisely because this supersedes it — which is
        // why the string appears here twice, in `figure_sub` and in the first
        // body paragraph, both times as the number being retired. A guardrail
        // scan will flag it; this block is the reason it is allowed to.
        //
        // The array form gives it the display treatment in outcomes.php: the
        // two numbers ARE the argument, so the figure earns the column. The ERP
        // page's note stays a plain string and keeps the accent aside. Every
        // word below was already in that string — it is split at the sentence
        // boundary the comp splits at, nothing added or cut.
        // ------------------------------------------------------------------
        'note' => [
            'eyebrow'    => 'A note worth publishing',
            'figure'     => '$3.10',
            'figure_sub' => 'not $8.71',
            'body' => [
                'You’ll see “$8.71 returned for every dollar spent on CRM” quoted right across this industry. It comes from Nucleus Research — in 2014. Nucleus’s current figure is $3.10, and their analyst Cameron Marsh describes it as a 37% decline over the decade.',
                'We’re pointing at that because the honest number is more useful than the flattering one. CRM returns have fallen as the market matured and licence costs climbed. That’s the environment you’re actually buying in.',
            ],
        ],
    ],

    // ------------------------------------------------------------------
    // §14 — WHY QALBIT
    //
    // LiftUp is OUR OWN PRODUCT and every sentence here says so. It is not a
    // client project and must never be reframed as one. The liftup.sh link is
    // the page's single outbound proof link — do not add more.
    // ------------------------------------------------------------------
    'why_us' => [
        'id'      => 'why-qalbit-crm',
        'eyebrow' => 'Why QalbIT',
        'title'   => 'Why work with us on CRM',

        'items' => [
            // The lead. Split into three paragraphs at the comp's own sentence
            // boundaries — nothing added or cut from the single string this
            // used to be. The third is marked `quote`, which closes the block
            // on an accent left rule: it is the sentence that says why any of
            // the preceding detail is relevant to the reader's project.
            //
            // LiftUp is OUR OWN PRODUCT. Every sentence here says so and none
            // of it may be reframed as client work. The `link` is this page's
            // single outbound proof link — why-us.php injects it into the first
            // paragraph containing the label and then stops.
            [
                'title' => 'We built a CRM that doesn’t charge per seat',
                'text'  => [
                    'LiftUp (liftup.sh) is our own multi-tenant CRM and operations console. It’s live, it has paying customers, and it starts at $149 a month billed per workspace — not per user.',
                    'Four modules share one product registry: CRM, content, AI editorial and analytics. Every registered site gets its own scoped everything, with a rotatable lead API key, leads scoped to the site that captured them, permission scoping so a team member sees only what they’re assigned to, and GA4 and Search Console pulled into the same view rather than a separate tab.',
                    [
                        'text'  => 'We mention it because the architecture questions you’re weighing on a custom CRM — multi-tenancy, permission scoping, lead capture APIs, analytics that actually connect — are ones we’ve already solved in production and live with every day.',
                        'quote' => true,
                    ],
                ],
                'link'  => ['url' => 'https://liftup.sh', 'label' => 'liftup.sh', 'external' => true],

                // A real screenshot of LiftUp's CRM Overview, cropped from the
                // TOP of the capture. That is deliberate: this slot is a fixed
                // height with object-fit:cover (~2.4:1 at desktop) and the raw
                // capture is 1.99:1, so a centre crop would have eaten the top
                // bar and taken the LiftUp wordmark with it.
                //
                // It is first-party evidence — our own product — which is the
                // whole reason this slot exists here and stays empty on the ERP
                // page. See the docblock in partials/services/erp/why-us.php.
                //
                // THE NUMBERS IN IT ARE REAL AND THE WORKSPACE IS OURS
                // ("QalbIT Web"), not a client's. If this is ever re-shot, check
                // both again: an earlier capture had every metric at zero, which
                // read as a fresh install directly beside the sentence "it has
                // paying customers".
                'image' => [
                    'src' => '/images/services/crm-liftup-console.webp',
                    'w'   => 1200,
                    'h'   => 496,
                ],
            ],
            [
                'title' => 'And if LiftUp fits, we’ll sell you LiftUp',
                'text'  => 'Fair question to ask: if we have our own CRM, why would we build you a different one? Because LiftUp fits a specific shape. Agencies running multiple client sites, founders shipping several products, teams who want lead capture, content and analytics in one console. It doesn’t fit a manufacturer with territory-based commission splits, or a clinic that needs patient data on its own infrastructure with a signed BAA. Those need a build. Three honest answers exist to “what CRM should we use,” and we can give you all three: buy commercial, buy LiftUp, or build custom.',
            ],
            [
                'title' => 'We’ll model it against your current bill',
                'text'  => 'Not against zero. Bring your last invoice to the scoping call and we’ll compare five years honestly, including the outcome where staying put wins.',
            ],
            [
                'title' => 'You own the code and the data',
                'text'  => 'Full source ownership in your repository, documented, hosted where you need it. No per-seat fee, no tier gates, no export limits when you want your own data back.',
            ],
            [
                'title' => 'We publish our sources',
                'text'  => 'Every vendor price on this page comes from the vendor’s own page, with the date we checked it. If we won’t guess about Salesforce’s pricing, we won’t guess about your project either.',
            ],
        ],
    ],

    // ------------------------------------------------------------------
    // CTAs — three full-width bands and five inline links.
    // Placement follows the CTA map in the content document exactly.
    // ------------------------------------------------------------------
    'bands' => [
        // After §4
        'build_vs_buy' => [
            'title' => 'We’ll tell you to stay on Zoho if that’s the answer.',
            'body'  => 'Send your seat count, your current CRM and what it costs. If a commercial product fits, you’ll hear it on the first call — not after a proposal.',
            'primary_label'   => 'Get a build-vs-buy assessment',
            'primary_url'     => '/contact-us/?topic=build-vs-buy-crm',
            'secondary_label' => 'Book a 30-minute call',
            'secondary_url'   => 'https://crm.qalbit.com/book/discuss-project',
        ],

        // After §9
        'industry' => [
            'title' => 'If compliance is driving this, start from the deadline.',
            'body'  => 'Tell us the requirement — HIPAA, GDPR erasure, data residency — and we’ll work backwards from it instead of bolting it on at the end.',
            'primary_label'   => 'Talk through your compliance requirement',
            'primary_url'     => '/contact-us/?topic=crm-compliance',
            'secondary_label' => 'See our work',
            'secondary_url'   => '/portfolio/',
        ],

        // §17 — final band
        'final' => [
            'id'     => 'crm-final-cta',
            'title'  => 'Bring your current CRM invoice to the call.',
            // Colours "CRM invoice" inside the heading. The band's ground is
            // --color-deep, so cta-band.php uses --color-accent-400 rather than
            // the raw accent, which measures ~3.3:1 there. See that file.
            'title_accent' => 'CRM invoice',
            'body'   => 'Tell us how many people would use the system, what you pay today, and which part of your process the current tool can’t hold. We’ll map it, scope a first release, and compare five years of ownership against five years of licences.',
            'body_2' => 'If the honest answer is that you should stay where you are, we’ll say so.',
            'primary_label'   => 'Book a CRM scoping call',
            'primary_url'     => 'https://crm.qalbit.com/book/discuss-project',
            'secondary_label' => 'Send your requirements',
            'secondary_url'   => '/contact-us/?topic=crm-development',
            'meta'   => 'Reply within 24–48 hours, with questions rather than a brochure.',
        ],
    ],

    'inline_ctas' => [
        // After §2
        'fit_check' => [
            'lead'  => 'Not sure which side you’re on?',
            'label' => 'Tell us your seat count and what you pay now',
            'url'   => '/contact-us/?topic=crm-fit-check',
        ],
        // After §3
        'tco' => [
            'lead'  => 'Send your seat count and current spend.',
            'label' => 'We’ll model five years against a build',
            'url'   => '/contact-us/?topic=crm-tco',
        ],
        // After §5
        'module_scope' => [
            'label' => 'Discuss which module comes first',
            'url'   => '/contact-us/?topic=crm-module-scope',
        ],
        // After §6
        'estimate' => [
            'label'           => 'Get a scoped first-release estimate',
            'url'             => '/contact-us/?topic=crm-estimate',
            'secondary_label' => 'Try the cost calculator',
            'secondary_url'   => '/tools/software-development-cost-calculator/',
        ],
        // After §8
        'use_case' => [
            'label' => 'Tell us which one sounds like you',
            'url'   => '/contact-us/?topic=crm-use-case',
        ],
    ],
];
