<?php
/**
 * ERP §15 — FAQ. A component built for this page only.
 *
 * REBUILT AS A NATIVE <details> ACCORDION. The previous version of this file
 * argued at length for keeping every answer open, so the reversal is worth
 * recording: the new editorial design puts the twelve questions on a ruled
 * index with a numeral, the question and a rotating `+`, and twelve fully
 * expanded answers would run the section past three screens on a page that
 * already carries fifteen sections above it. The design wins.
 *
 * Nothing the old note worried about is actually lost:
 *
 *  - The answers stay in the DOM on first paint. A closed <details> is hidden
 *    by the user agent, not removed, so there is no client-rendered subtree for
 *    a fetcher to miss.
 *  - FAQ JSON-LD is unaffected either way: ServiceController builds it from
 *    $faqs via Schema::faq(), independent of any partial. That block is the
 *    canonical machine-readable copy of these twelve answers, and it is why the
 *    questions and answers here must keep coming from $faqs verbatim — the two
 *    have to match.
 *  - Still no JavaScript. <details> is native, so the accordion works with JS
 *    disabled or failed. The `+` rotate and the accent question colour on open
 *    are pure CSS (`details[open] [data-plus]`, `details[open] [data-q]`) —
 *    which is the whole reason those two attributes must stay on their spans.
 *
 * DELIBERATELY STILL NOT USING the `data-faq-*` hooks. main.js binds single-open
 * accordion behaviour and a GSAP reveal to `[data-faq-section]`; without those
 * attributes it returns early and leaves this section alone. Adding them now
 * would hand the same open/close state two owners — the browser and main.js —
 * and the first item's `open` would fight the script on load.
 *
 * Markup notes / traps:
 *
 * - The question is an <h3> INSIDE the <summary>, as the shared FAQ partial
 *   does. summary's content model allows heading content, and it keeps the
 *   twelve questions in the document outline where they have always been.
 * - Setting `display:grid` on a <summary> drops the default disclosure triangle
 *   in WebKit/Blink, which is why the design supplies its own `+`. The
 *   `list-style:none` / `::-webkit-details-marker` reset lives in page CSS.
 * - The numerals are computed from the RENDERED list, not from the config key.
 *   An entry missing a question or an answer is skipped, and numbering off the
 *   raw index would then skip a number. Same reason the closing 2px rule is
 *   computed from the last rendered item instead of being hard-coded to 12.
 * - `answer_html`, where a config entry carries it, is still echoed raw — that
 *   behaviour is inherited from the shared partial and must not be tightened
 *   here. It gets a wrapper <div> because the design's answer styling lives on
 *   the <p>, which config-authored HTML supplies for itself. Plain answers keep
 *   nl2br() over the escaped string.
 * - `data-reveal` / `data-stack` are hooks for the page's own CSS + JS (scroll
 *   reveal, the small-screen collapse of the two grids). They carry no meaning
 *   here; leave them on the elements the design put them on.
 * - The CTA href now goes through htmlspecialchars() as well as route_url(),
 *   matching the rest of the rebuilt sections. Output is unchanged for the
 *   current `/contact-us/?topic=erp-development` — nothing in it is escapable —
 *   but a config edit that adds a second query parameter would need the `&`.
 *
 * SCOPE: partials are `include`d into one shared variable scope, so every
 * variable here is prefixed `erpFaq*`.
 *
 * @var array       $faqs           config('faqs.service_erp_development')
 * @var string      $erpFaqTitle
 * @var string|null $erpFaqSubtitle
 * @var string|null $erpFaqEyebrow
 * @var array|null  $erpFaqCta      ['title','body','label','href','aria']
 */
if (empty($faqs) || !is_array($faqs)) {
    return;
}

$erpFaqEyebrow  = $erpFaqEyebrow  ?? '';
$erpFaqTitle    = $erpFaqTitle    ?? '';
$erpFaqSubtitle = $erpFaqSubtitle ?? '';
$erpFaqCta      = $erpFaqCta      ?? [];

/**
 * Filter before rendering, not while rendering: the numeral and the closing
 * rule both depend on the position of an item in the FINAL list.
 *
 * @var array<int,array{question:string,answer:string,answer_html:string|null}> $erpFaqItems
 */
$erpFaqItems = [];
foreach ($faqs as $erpFaqRow) {
    $erpFaqQuestion   = $erpFaqRow['question']    ?? '';
    $erpFaqAnswer     = $erpFaqRow['answer']      ?? '';
    $erpFaqAnswerHtml = $erpFaqRow['answer_html'] ?? null;

    if ($erpFaqQuestion === '' || ($erpFaqAnswer === '' && $erpFaqAnswerHtml === null)) {
        continue;
    }

    $erpFaqItems[] = [
        'question'    => $erpFaqQuestion,
        'answer'      => $erpFaqAnswer,
        'answer_html' => $erpFaqAnswerHtml,
    ];
}

if (!$erpFaqItems) {
    return;
}

$erpFaqLast = count($erpFaqItems) - 1;

/** Shared inline style for an answer body, applied to the <p> or its wrapper. */
$erpFaqAnswerStyle = 'margin:0 0 24px;padding-left:64px;max-width:82ch;font-size:15.5px;line-height:1.65;color:color-mix(in srgb, var(--color-text) 78%, transparent)';
?>

<section
    id="erp-faqs"
    aria-labelledby="erp-faq-heading"
    data-section-erp-faq
    data-erp-bleed
    style="scroll-margin-top:16px;padding:clamp(56px,6.5vw,104px) clamp(20px,4.5vw,72px);border-top:2px solid var(--color-divider);background:var(--color-surface)"
>
    <div data-erp-wrap>
    <!-- Header — eyebrow + heading on the left, the framing paragraph on the right -->
    <div data-stack data-reveal style="display:grid;grid-template-columns:minmax(0,1.2fr) minmax(0,0.8fr);gap:clamp(24px,3vw,56px);align-items:end">
        <div>
            <?php if ($erpFaqEyebrow !== ''): ?>
                <p style="display:flex;align-items:center;gap:12px;margin:0;font-size:11px;font-weight:600;letter-spacing:0.22em;text-transform:uppercase;color:var(--color-accent-700)">
                    <span aria-hidden="true" style="display:block;width:32px;height:2px;background:var(--color-accent)"></span><?= htmlspecialchars($erpFaqEyebrow, ENT_QUOTES) ?>
                </p>
            <?php endif; ?>

            <h2 id="erp-faq-heading" style="margin:18px 0 0;font-size:clamp(32px,3.6vw,52px);line-height:1.02;letter-spacing:-0.035em;max-width:18ch">
                <?= htmlspecialchars($erpFaqTitle, ENT_QUOTES) ?>
            </h2>
        </div>

        <?php if ($erpFaqSubtitle !== ''): ?>
            <p style="margin:0;font-size:15.5px;line-height:1.6;color:color-mix(in srgb, var(--color-text) 70%, transparent)">
                <?= htmlspecialchars($erpFaqSubtitle, ENT_QUOTES) ?>
            </p>
        <?php endif; ?>
    </div>

    <!-- The index. Native <details>: first open, the rest closed, no JS anywhere -->
    <div data-reveal data-erp-faq-list style="margin-top:clamp(36px,4vw,60px);border-top:2px solid var(--color-text)">
        <?php foreach ($erpFaqItems as $erpFaqIndex => $erpFaqItem): ?>
            <?php
            /* The list closes on the same 2px rule it opens with, so the block
               reads as one closed table rather than a list that ran out. */
            $erpFaqRule = ($erpFaqIndex === $erpFaqLast)
                ? '2px solid var(--color-text)'
                : '1px solid var(--color-divider)';
            ?>
            <details name="erp-faq"<?= $erpFaqIndex === 0 ? ' open' : '' ?> style="border-bottom:<?= $erpFaqRule ?>">
                <summary style="display:grid;grid-template-columns:48px minmax(0,1fr) 22px;gap:16px;align-items:baseline;padding:22px 0">
                    <span aria-hidden="true" style="font-family:var(--font-heading);font-weight:700;font-size:13px;color:var(--color-accent)">
                        <?= str_pad((string) ($erpFaqIndex + 1), 2, '0', STR_PAD_LEFT) ?>
                    </span>
                    <h3 data-q style="margin:0;font-family:var(--font-heading);font-weight:700;font-size:clamp(17px,1.5vw,21px);letter-spacing:-0.02em;line-height:1.3">
                        <?= htmlspecialchars($erpFaqItem['question'], ENT_QUOTES) ?>
                    </h3>
                    <span data-plus aria-hidden="true" style="justify-self:end;align-self:center;display:block;width:22px;height:22px;color:var(--color-accent)">
                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" aria-hidden="true" focusable="false">
                            <path d="M11 3V19" stroke="currentColor" stroke-width="2" stroke-linecap="square"/>
                            <path d="M3 11H19" stroke="currentColor" stroke-width="2" stroke-linecap="square"/>
                        </svg>
                    </span>
                </summary>

                <?php /* One wrapper per answer: the script animates this box's height,
                         and it must carry no margin of its own or the inner
                         margin collapses through it and the closed height never
                         reaches zero. All spacing stays on the answer itself. */ ?>
                <div data-erp-faq-panel>
                    <?php if ($erpFaqItem['answer_html'] !== null): ?>
                        <div style="<?= $erpFaqAnswerStyle ?>">
                            <?= $erpFaqItem['answer_html'] ?>
                        </div>
                    <?php else: ?>
                        <p style="<?= $erpFaqAnswerStyle ?>">
                            <?= nl2br(htmlspecialchars($erpFaqItem['answer'], ENT_QUOTES)) ?>
                        </p>
                    <?php endif; ?>
                </div>
            </details>
        <?php endforeach; ?>
    </div>

    <!-- Closing row — the question the twelve above did not answer -->
    <?php if (!empty($erpFaqCta['label']) && !empty($erpFaqCta['href'])): ?>
        <div data-stack style="display:grid;grid-template-columns:minmax(0,1fr) auto;gap:24px;align-items:center;margin-top:32px">
            <div>
                <?php if (!empty($erpFaqCta['title'])): ?>
                    <p style="margin:0 0 6px;font-size:clamp(18px,1.7vw,24px);font-family:var(--font-heading);font-weight:700;letter-spacing:-0.02em">
                        <?= htmlspecialchars($erpFaqCta['title'], ENT_QUOTES) ?>
                    </p>
                <?php endif; ?>
                <?php if (!empty($erpFaqCta['body'])): ?>
                    <p style="margin:0;font-size:15px;color:color-mix(in srgb, var(--color-text) 70%, transparent)">
                        <?= htmlspecialchars($erpFaqCta['body'], ENT_QUOTES) ?>
                    </p>
                <?php endif; ?>
            </div>

            <a
                href="<?= htmlspecialchars(route_url($erpFaqCta['href']), ENT_QUOTES) ?>"
                class="erp-btn erp-btn-primary"
                <?php if (!empty($erpFaqCta['aria'])): ?>
                    title="<?= htmlspecialchars($erpFaqCta['aria'], ENT_QUOTES) ?>"
                    aria-label="<?= htmlspecialchars($erpFaqCta['aria'], ENT_QUOTES) ?>"
                <?php endif; ?>
                data-erp-cta-button
                style="padding:16px 22px;font-size:15px"
            >
                <?= htmlspecialchars($erpFaqCta['label'], ENT_QUOTES) ?>
            </a>
        </div>
    <?php endif; ?>
    </div>
</section>
