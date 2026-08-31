<?php
/**
 * ERP §2 — What is custom ERP development?
 *
 * Rebuilt against the new editorial design. Two bands on the same 85rem grid
 * as the ERP hero rather than a narrow prose column:
 *
 *   Band 1 — eyebrow + heading + prose on the left; the snippet-shaped
 *            definition as an inverted (dark) quote card on the right. That
 *            block is the one most likely to be lifted whole into a search
 *            result or an AI answer, so it is given its own surface and its
 *            own contrast instead of being buried mid-paragraph.
 *   Band 2 — the three-term distinction as a ruled three-across row, closing
 *            on a plain statement of what we actually build plus the fit-check
 *            inline CTA.
 *
 * Layout notes / traps:
 *
 * - This section shares the hero's 85rem centred shell and 16px side gutter.
 *   Reading measure remains capped per paragraph in `ch`.
 * - The three terms are rendered from config, so the column count and the
 *   divider/padding rules are computed from the item count rather than
 *   hard-coded to three. The last term is the one we build, so it carries the
 *   accent rule and the accent numeral; that emphasis follows the LAST index,
 *   not a literal `2`, so the highlight cannot drift if a term is inserted.
 * - `data-reveal` / `data-stack` / `data-stack-sm` / `data-arrow` /
 *   `data-arrow-g` are hooks for the page's own CSS + JS (scroll reveal, the
 *   small-screen collapse of the grids, the arrow nudge). They carry no
 *   meaning here; leave them on the elements the design put them on.
 * - `data-erp-cta-inline` stays on the CTA paragraph: it is the shared marker
 *   every one of the page's seven inline CTAs carries.
 * - The CTA href is a site-relative path in config, so it goes through
 *   route_url() (as the design's absolute links do) rather than being echoed
 *   raw. Everything else is escaped with htmlspecialchars(..., ENT_QUOTES).
 *
 * SCOPE: partials are `include`d into one shared variable scope, so every
 * variable here is prefixed `erpDef*`.
 *
 * @var array $erp  config('erp_page')
 */
$erpDef = $erp['definition'] ?? [];
if (empty($erpDef['title'])) {
    return;
}

/** @var array<int,string> $erpDefBody */
$erpDefBody = $erpDef['body'] ?? [];
/** @var array<int,array{term:string,text:string}> $erpDefTerms */
$erpDefTerms = $erpDef['terms'] ?? [];
$erpDefLast  = count($erpDefTerms) - 1;
/** @var array{lead?:string,label:string,url:string}|null $erpDefCta */
$erpDefCta = $erp['inline_ctas']['fit_check'] ?? null;
?>

<section
    id="<?= htmlspecialchars($erpDef['id'], ENT_QUOTES) ?>"
    aria-labelledby="erp-definition-heading"
    data-section-erp-definition
    style="box-sizing:border-box;max-width:85rem;margin:0 auto;padding:clamp(56px,6.5vw,104px) 1rem;scroll-margin-top:16px;width:100%"
>
    <!-- Band 1 — heading + prose | snippet card -->
    <div data-stack data-reveal style="display:grid;grid-template-columns:minmax(0,1.05fr) minmax(0,0.95fr);gap:clamp(32px,4vw,64px);align-items:start">
        <div>
            <?php if (!empty($erpDef['eyebrow'])): ?>
                <p style="display:flex;align-items:center;gap:12px;margin:0;font-size:11px;font-weight:600;letter-spacing:0.22em;text-transform:uppercase;color:var(--color-accent-700)">
                    <span aria-hidden="true" style="display:block;width:32px;height:2px;background:var(--color-accent)"></span><?= htmlspecialchars($erpDef['eyebrow'], ENT_QUOTES) ?>
                </p>
            <?php endif; ?>

            <h2 id="erp-definition-heading" style="margin:18px 0 0;font-size:clamp(32px,3.6vw,52px);line-height:1.02;letter-spacing:-0.035em;max-width:16ch">
                <?= htmlspecialchars($erpDef['title'], ENT_QUOTES) ?>
            </h2>

            <?php /* First paragraph is the pivot line — set larger and heavier
                     on a shorter measure so it reads as a statement, not as the
                     opening of the body copy. */ ?>
            <?php foreach ($erpDefBody as $erpDefIndex => $erpDefPara): ?>
                <?php if ($erpDefIndex === 0): ?>
                    <p style="margin:28px 0 0;font-size:19px;font-weight:600;line-height:1.45;max-width:40ch">
                        <?= htmlspecialchars($erpDefPara, ENT_QUOTES) ?>
                    </p>
                <?php else: ?>
                    <p style="margin:<?= $erpDefIndex === 1 ? '18px' : '14px' ?> 0 0;font-size:15.5px;line-height:1.65;max-width:56ch;color:color-mix(in srgb, var(--color-text) 76%, transparent)">
                        <?= htmlspecialchars($erpDefPara, ENT_QUOTES) ?>
                    </p>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <?php if (!empty($erpDef['snippet'])): ?>
            <figure style="margin:0;background:var(--color-text);color:#f3f2f2;padding:clamp(28px,3vw,44px);position:relative">
                <span aria-hidden="true" style="display:block;font-family:var(--font-heading);font-weight:700;font-size:96px;line-height:0.6;color:var(--color-accent)">&ldquo;</span>
                <blockquote style="margin:20px 0 0;font-size:clamp(17px,1.55vw,21px);line-height:1.5;letter-spacing:-0.01em">
                    <?= htmlspecialchars($erpDef['snippet'], ENT_QUOTES) ?>
                </blockquote>
            </figure>
        <?php endif; ?>
    </div>

    <!-- Band 2 — the three-term distinction -->
    <?php if ($erpDefTerms): ?>
        <div data-reveal style="margin-top:clamp(48px,5vw,80px);border-top:2px solid var(--color-divider);padding-top:32px">
            <div data-stack style="display:grid;grid-template-columns:minmax(0,1.2fr) minmax(0,0.8fr);gap:24px;align-items:end">
                <h3 style="margin:0;font-size:clamp(22px,2.2vw,30px);letter-spacing:-0.02em;line-height:1.15">
                    <?= htmlspecialchars($erpDef['terms_title'] ?? '', ENT_QUOTES) ?>
                </h3>
                <p style="margin:0;font-size:14px;color:color-mix(in srgb, var(--color-text) 60%, transparent)">
                    <?= htmlspecialchars($erpDef['terms_intro'] ?? '', ENT_QUOTES) ?>
                </p>
            </div>

            <ol data-stack-sm style="display:grid;grid-template-columns:repeat(<?= count($erpDefTerms) ?>,minmax(0,1fr));gap:0;margin:36px 0 0;padding:0;list-style:none;border-top:1px solid var(--color-divider)">
                <?php foreach ($erpDefTerms as $erpDefIndex => $erpDefTerm): ?>
                    <?php
                    // First column bleeds to the left edge, last to the right;
                    // the dividers live on the right of every column but the last.
                    if ($erpDefIndex === 0) {
                        $erpDefPad = '26px 28px 26px 0';
                    } elseif ($erpDefIndex === $erpDefLast) {
                        $erpDefPad = '26px 0 26px 28px';
                    } else {
                        $erpDefPad = '26px 28px';
                    }
                    $erpDefIsOurs = ($erpDefIndex === $erpDefLast);
                    ?>
                    <li style="padding:<?= $erpDefPad ?>;<?= $erpDefIsOurs
                        ? 'border-top:3px solid var(--color-accent);margin-top:-1px'
                        : 'border-right:1px solid var(--color-divider)' ?>">
                        <span aria-hidden="true" style="font-family:var(--font-heading);font-weight:700;font-size:13px;letter-spacing:0.1em;color:<?= $erpDefIsOurs ? 'var(--color-accent)' : 'color-mix(in srgb, var(--color-text) 45%, transparent)' ?>">
                            <?= str_pad((string) ($erpDefIndex + 1), 2, '0', STR_PAD_LEFT) ?>
                        </span>
                        <h4 style="margin:14px 0 10px;font-size:19px;letter-spacing:-0.015em">
                            <?= htmlspecialchars($erpDefTerm['term'], ENT_QUOTES) ?>
                        </h4>
                        <p style="margin:0;font-size:14.5px;line-height:1.6;color:color-mix(in srgb, var(--color-text) 76%, transparent)">
                            <?= htmlspecialchars($erpDefTerm['text'], ENT_QUOTES) ?>
                        </p>
                    </li>
                <?php endforeach; ?>
            </ol>

            <div data-stack style="display:grid;grid-template-columns:minmax(0,1fr) auto;gap:24px;align-items:center;margin-top:36px;border-top:1px solid var(--color-divider);padding-top:28px">
                <p style="margin:0;font-size:clamp(17px,1.5vw,21px);font-weight:600;letter-spacing:-0.015em;max-width:44ch">
                    <?= htmlspecialchars($erpDef['closing'] ?? '', ENT_QUOTES) ?>
                </p>

                <?php if (!empty($erpDefCta['label']) && !empty($erpDefCta['url'])): ?>
                    <p data-erp-cta-inline style="margin:0;font-size:14px;color:color-mix(in srgb, var(--color-text) 65%, transparent)">
                        <?php if (!empty($erpDefCta['lead'])): ?>
                            <?= htmlspecialchars($erpDefCta['lead'], ENT_QUOTES) ?><br>
                        <?php endif; ?>
                        <a
                            data-arrow
                            href="<?= htmlspecialchars(route_url($erpDefCta['url']), ENT_QUOTES) ?>"
                            style="font-weight:600;color:var(--color-accent-700);text-decoration:none;border-bottom:1px solid color-mix(in srgb, var(--color-accent) 40%, transparent)"
                        >
                            <?= htmlspecialchars($erpDefCta['label'], ENT_QUOTES) ?>
                            <span data-arrow-g aria-hidden="true">&rarr;</span>
                        </a>
                    </p>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
</section>
