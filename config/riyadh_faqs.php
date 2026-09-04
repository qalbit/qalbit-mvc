<?php

/**
 * FAQs for /saudi-arabia/riyadh/ — §19 of the copy deck.
 *
 * A FILE OF ITS OWN, not a new key in config/faqs.php. That file is read by
 * eighteen other location pages and every service page through Faqs::for();
 * appending here keeps the Riyadh rebuild out of its diff entirely. `config()`
 * globs config/*.php, so `config('riyadh_faqs')` resolves with no registration.
 *
 * PLAIN `answer` STRINGS ONLY — NO `answer_html`.
 *
 * partials/services/erp/faq.php will render `answer_html` in preference to
 * `answer` when it is present. RiyadhController builds the FAQPage JSON-LD from
 * `answer`. If the two ever diverge, the structured data stops matching the
 * visible copy, which is a rich-result violation and the kind of thing that
 * gets a page's FAQ rich results dropped silently. Keeping every answer to one
 * plain string means the visible text and the schema text are the same bytes,
 * enforced by construction rather than by review. Do not add markup here.
 *
 * Question 04 deliberately tells the reader not to rely on this page for their
 * own deadline. Leave that in.
 */

return [

    [
        'question' => 'Do you have an office in Riyadh?',
        'answer'   => 'No. QalbIT has no office or legal entity in Saudi Arabia. Delivery runs remotely from Ahmedabad, India, on Riyadh working hours. We state this plainly because the alternative — implying a local presence — creates a problem for both of us the first time it is checked.',
    ],
    [
        'question' => 'Can a company outside Saudi Arabia legally build our system?',
        'answer'   => 'Yes, with the data-protection position handled properly. Under PDPL you are the controller and we are the processor. Transferring personal data outside the Kingdom is permitted under Article 29 with approved safeguards, including Saudi Standard Contractual Clauses. That is contract work done once, before the build starts.',
    ],
    [
        'question' => 'Can you build ZATCA-compliant e-invoicing?',
        'answer'   => 'Yes. Phase 2 requires direct integration with the Fatoora platform: UBL 2.1 XML, UUID, cryptographic stamp and QR code, with standard invoices cleared before sending and simplified invoices reported afterwards. Note that non-resident vendors are exempt from issuing Saudi e-invoices themselves — but systems built for resident clients must still clear Fatoora.',
    ],
    [
        'question' => 'We received a Wave 25 notification. What’s the deadline?',
        'answer'   => 'Wave 25 covers VAT-subject revenue above SAR 187,500 in any of 2022–2025, with integration required by 1 February 2027. Treat the notification you received from ZATCA as authoritative for your own date, and confirm your status directly rather than relying on any article, this one included.',
    ],
    [
        'question' => 'Where will our data be hosted?',
        'answer'   => 'Wherever your compliance position requires. Hosting location and engineering location are separate decisions — your system can run on in-Kingdom infrastructure while the team building it sits elsewhere. We make that call during architecture, in writing.',
    ],
    [
        'question' => 'How do you handle the time difference and the Saudi working week?',
        'answer'   => 'Riyadh is UTC+3 and we are UTC+5:30 — a two-and-a-half hour offset. Your Sunday–Thursday week overlaps ours on four days out of five. Demos and decision calls are scheduled in your hours; Thursday afternoon through Saturday runs on written updates.',
    ],
    [
        'question' => 'Do you deliver in Arabic?',
        'answer'   => 'The product can be fully bilingual with correct right-to-left layout, Arabic invoice output and Arabic sorting. Project delivery — calls, documentation, written updates — runs in English. If your stakeholder group needs Arabic-language delivery throughout, a local agency is the better fit and we will say so.',
    ],
    [
        'question' => 'Can you bid for government work through Etimad?',
        'answer'   => 'Not directly. Etimad tenders commonly require a Saudi commercial registration from the contracting party, and we do not have one. If your procurement runs through Etimad, tell us at the first call and we will tell you immediately whether there is a workable structure.',
    ],
    [
        'question' => 'How much does custom software development cost in Saudi Arabia?',
        'answer'   => 'We don’t publish a range because the honest ones are too wide to be useful. Cost is driven by scope, integration count, ZATCA depth and data-migration depth rather than by headcount. We scope first and give a fixed-scope estimate for phase one.',
    ],
    [
        'question' => 'Who owns the source code?',
        'answer'   => 'Your organisation, in full, in your own repository, once project payments are complete. No licence, no per-seat fee, no restriction on hiring another team afterwards.',
    ],
    [
        'question' => 'Can you extend our existing ERP instead of replacing it?',
        'answer'   => 'Usually yes, and it is often the better call. Most of our operational-software work today is extending and integrating systems companies already own — custom modules, portals and dashboards on top of an existing product.',
    ],
    [
        // The white-label partner and its end client stay unnamed. This answer
        // is the page's reason for not naming them; do not "improve" it by
        // adding a client name or a Saudi case study.
        'question' => 'Do you have Saudi clients we can speak to?',
        'answer'   => 'Our current GCC delivery is a white-label engagement, so we cannot name the end client. We can share detailed case studies from comparable builds in Europe and India, and we would rather tell you that than manufacture a Saudi reference.',
    ],
];
