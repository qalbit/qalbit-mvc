<?php

/*
 * Campaign landing pages under /go/.
 *
 * Only the parts that must not drift live here: the form's option sets (the
 * view renders them, the controller validates against them, and a mismatch
 * would silently reject real leads), the outbound links, and the placeholders
 * the client still owes. Section copy stays in the view, where it is readable
 * next to the markup it belongs to.
 */

/*
 * NOT named $config.
 *
 * config() in bootstrap/app.php accumulates into a `static $config` and loads
 * each file with `require`, which executes it in that function's scope — so a
 * variable called $config in here overwrites the loader's own accumulator and
 * silently wipes every config file that sorts before "landing" (app, business,
 * case_studies, faqs, geo, hire, industries...). The visible symptom is
 * config('app.url') going null: every canonical, og:url and asset URL sitewide
 * turns relative. Any variable used in a config file must be uniquely named.
 */
$landing = [

    'saas_teardown' => [

        'path' => '/go/saas-product-development/',

        // CRM form token key — resolved through config('crm.forms').
        'crm_form_key' => 'saas_teardown',

        // Tagged on every lead so CRM reporting can separate campaign traffic
        // from the site's own contact form.
        'lead_from'  => 'lead_go_saas_teardown',
        'lead_topic' => 'saas_teardown',

        /*
         * Question 1 — value => label. Order is the render order.
         */
        'stages' => [
            'idea'    => 'Just an idea',
            'spec'    => 'Spec, nothing built',
            'built'   => 'Built, not launched',
            'stalled' => 'Live but stalled',
            'growing' => 'Live and growing',
        ],

        /*
         * Question 2 — what the visitor actually wants building.
         *
         * This replaced the old budget/timeline pair. Asking a stranger for a
         * budget band before they have seen anything from us was the highest
         * friction question on the page and the least useful answer: the number
         * people guess before a teardown is rarely the number they agree after
         * one. What they need built is both easier to answer and more use when
         * the walkthrough gets recorded.
         */
        'needs' => [
            'new-product'    => 'A new product from scratch',
            'rebuild'        => 'A rebuild of what exists',
            'module'         => 'One major module added',
            'not-sure'       => 'Not sure yet — tell me',
        ],

        // Free-mail domains get a soft hint in the form, never a block — a
        // founder on a personal address is still a lead.
        'free_mail_domains' => [
            'gmail.com', 'yahoo.com', 'yahoo.co.uk', 'outlook.com',
            'hotmail.com', 'live.com', 'icloud.com', 'aol.com', 'proton.me',
            'protonmail.com', 'gmx.com', 'mail.com', 'yandex.com',
        ],

        // Where the teardown itself is sent from.
        'sender_email' => 'abidhusain@qalbit.com',

        'reply_email' => 'sales@qalbit.com',

        // PLACEHOLDER: confirm this booking link is still current before the
        // first campaign goes live.
        'booking_url' => 'https://crm.qalbit.com/book/discuss-project',

        // PLACEHOLDER: client to supply the "See how we price →" destination.
        'pricing_url' => '#',

        /*
         * The price anchor.
         *
         * NOTE: this floor still sits below the market rate for a custom SaaS
         * build (see the research on file), and the page's own "we won't be the
         * cheapest quote you get" line pulls the other way. Changing it is a
         * one-line edit here.
         */
        'price_from'       => '$5,000',
        'price_from_label' => 'Scoped builds start from',

        // Founder byline, cropped for avatar duty. Regenerate with:
        //   magick abidhusain-chidi.png -crop 690x690+250+95 +repage \
        //          -resize 128x128 -strip -quality 84 abidhusain-chidi-avatar-128.webp
        'founder_photo'     => '/images/team/abidhusain-chidi-avatar-128.webp',
        'founder_photo_alt' => 'Portrait of Abidhusain Chidi, Founder & CEO of QalbIT',

        /*
         * The header and footer both sit on near-black, so this is the white
         * variant. logo-dark.svg is invisible there, and logo-primary.svg —
         * the blue one — measures 3.91:1 against #111110: fine for a logo,
         * which only needs 3:1 as a non-text graphic, but dim at 30px and it
         * competes with the accent CTA a few centimetres to its right.
         * Swapping to logo-primary.svg is a one-line change here.
         */
        'logo'        => '/images/brand/logo-light.svg',
        'logo_alt'    => 'QalbIT Infotech Pvt Ltd',
        'logo_width'  => 139,
        'logo_height' => 34,

        /*
         * The four products we build and run ourselves. Artwork is found by
         * convention at /public/assets/images/products/<slug>.webp, so a slug
         * and its image can never drift apart.
         */
        'products' => [
            [
                'slug'  => 'liftup',
                'name'  => 'LiftUp',
                'desc'  => 'Multi-tenant CRM + CMS with AI editorial and analytics.',
                'stack' => 'Laravel 12 · liftup.sh',
                'alt'   => 'LiftUp — stacked multi-tenant workspaces feeding a single analytics view',
            ],
            [
                'slug'  => 'pocketgst',
                'name'  => 'PocketGST',
                'desc'  => 'Offline-first mobile GST invoicing for India.',
                'stack' => 'Mobile · offline-first',
                'alt'   => 'PocketGST — an invoice created on a phone with no connection, queued to sync',
            ],
            [
                'slug'  => 'urlcrop',
                'name'  => 'URLCrop',
                'desc'  => 'Link management and analytics at scale.',
                'stack' => 'Links · analytics',
                'alt'   => 'URLCrop — a long link collapsing into a short one, with click analytics',
            ],
            [
                'slug'  => 'emplyft',
                'name'  => 'Emplyft',
                'desc'  => 'HR management for distributed teams.',
                'stack' => 'HR · payroll',
                'alt'   => 'Emplyft — an org chart of connected employee records',
            ],
        ],

        /*
         * Case studies. Every field is taken from config/case_studies.php, the
         * source of truth behind the live /case-studies/ pages.
         *
         * A metric is either a real number or an honest sentence — never a
         * number we wish we had. CyberFind publishes its figures on its own
         * site; Plugin's recorded outcomes are qualitative, so it says so in
         * words. CyberFind leads: stacked on a phone the first card is the only
         * one many readers see.
         */
        'case_studies' => [
            [
                'slug'    => 'cyberfind',
                'name'    => 'CyberFind',
                'kicker'  => 'Vendor decision engine for CISOs',
                'summary' => 'A decision-support platform where verified security leaders review and compare vendors, with structured peer reviews, outcome metrics and side-by-side comparisons.',
                'stack'   => 'Next.js · Node.js · Python · PostgreSQL',
                'metric'  => [
                    'value'   => '500+',
                    'label'   => 'verified CISOs',
                    'outcome' => null,
                ],
            ],
            [
                'slug'    => 'plugin',
                'name'    => 'Plugin',
                'kicker'  => 'Tennis club management',
                'summary' => 'A tennis club replaced manual court charts and scattered member data with one platform for schedules, memberships, variable pricing and online payments.',
                'stack'   => 'PHP (CodeIgniter) · MySQL · Stripe & PayPal',
                'metric'  => [
                    'value'   => null,
                    'label'   => null,
                    'outcome' => 'Double bookings became rare once every court, coach and payment ran through one schedule.',
                ],
            ],
        ],
    ],
];

/*
 * Campaign landing page /go/gulf-saas-development/ — the Gulf/GCC Google Ads
 * clone of the page above.
 *
 * Built with array_replace over saas_teardown rather than as a second literal,
 * so the parts that must NOT diverge cannot: the form's option sets, the
 * products, the case studies and the free-mail list are the same arrays, and a
 * fix to one page is a fix to both. Only the keys listed here differ.
 *
 * Note what is deliberately NOT overridden: 'crm_form_key'. Both pages carry
 * the same CRM form token, so a Gulf lead lands in exactly the same place as a
 * lead from the original page. The two are told apart by 'lead_from',
 * 'lead_topic' and the 'campaign' value recorded in lead metadata — all
 * free-text fields the CRM already stores, so this needs no CRM-side change.
 */
$landing['gulf_saas'] = array_replace($landing['saas_teardown'], [

    'path' => '/go/gulf-saas-development/',

    'lead_from'  => 'lead_go_gulf_saas',
    'lead_topic' => 'gulf_saas',

    // Written to lead metadata so Gulf ad traffic is separable in CRM
    // reporting even when a visitor arrives with no UTM tagging at all.
    'campaign' => 'gulf-google-ads',

    // Click-to-WhatsApp. A plain link, so the page-scoped CSP in
    // layouts/landing.php does not apply — that policy governs fetches and
    // subresources, not navigation.
    'whatsapp_url'  => 'https://wa.me/918511900440?text=Hello%2C%20I%27d%20like%20a%20SaaS%20teardown%20for%20our%20product',

    /*
     * PLACEHOLDER — same class of claim as 'gulf_hours' below: a response-time
     * commitment nothing in this repo can verify. Confirm someone actually
     * watches that number during Gulf hours before the campaign runs, or cut
     * the line; an unanswered WhatsApp is worse than no WhatsApp note.
     */
    'whatsapp_note' => 'Usually answered within a few hours during Gulf business hours.',

    /*
     * A band, not a single figure.
     *
     * Keeps the original page's $5,000 entry point — the same door a cost-led
     * enquiry already walks through — and puts a ceiling on it, so the range
     * does the qualifying that one number could not. Set by the client.
     *
     * USD only, deliberately. This page serves several GCC markets, so a
     * single national currency would be wrong for most readers of it.
     */
    'price_from_label' => 'Typical v1 SaaS builds',
    'price_from'       => '$5,000–$15,000',
    'price_note'       => 'Figures in USD. Your exact number lands in the teardown, not before it.',

    /*
     * PLACEHOLDER — operational commitment, not a fact this repo can verify.
     * Confirm the working week actually is Sun–Thu before the campaign runs;
     * the delivery team is in Ahmedabad, where the default week is Mon–Fri.
     */
    'gulf_hours' => 'We work Sun–Thu to overlap with Gulf business hours.',

    /*
     * Deliberately modest. No certification, no named regulation (PDPL, DIFC,
     * NDMO or otherwise) and no hosting location is claimed, because none of
     * those are confirmed. Anything stronger than this line needs sign-off.
     */
    'gulf_compliance' => 'Built with Gulf data-handling and compliance requirements in mind.',
]);

return $landing;
