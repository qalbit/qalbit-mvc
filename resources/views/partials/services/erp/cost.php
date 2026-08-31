<?php
/**
 * ERP §6 — How much does custom ERP development cost?
 *
 * Deliberately publishes NO price band. The positioning statement explaining
 * why is the substance of this section and must not be truncated; the six
 * drivers follow it.
 *
 * Rebuilt against the new editorial design. The section is an argument — "we
 * won't quote a range, here is why, here is what actually moves the number" —
 * so it stays an editorial page rather than another card grid:
 *
 *   Band 1 — eyebrow + heading + the refusal on the left; the snippet-shaped
 *            answer as a surface panel with an accent top rule on the right.
 *            That paragraph is the block most likely to be lifted whole into a
 *            search result or an AI answer, so it gets its own surface. The
 *            refusal itself is set at display size against an accent left rule:
 *            it is a claim, not body copy, and it must read as one.
 *   Band 2 — the two supporting paragraphs in two columns under a hairline.
 *   Band 3 — the drivers as a ruled index with hanging numerals. No outer
 *            panel and no cards, so it cannot read as a restatement of §5.
 *   Band 4 — the closing CTA row plus the related-article pointer.
 *
 * Layout notes / traps:
 *
 * - The claim sits in the LEFT column rather than below the row: with only the
 *   heading there, the column emptied out under it and left a gap the width of
 *   the page. Both columns are top-aligned, because bottom-aligning pushed the
 *   taller answer panel up against the header.
 * - The driver list is an <ol>: the numerals are semantic order, so they are
 *   rendered as aria-hidden decoration and the list element carries the meaning
 *   for anyone not seeing the numerals.
 * - The final row of the index closes on the same 2px rule the index opens
 *   with, so the block reads as a closed table. That border is computed from
 *   the LAST index rather than hard-coded to 5, so it cannot drift if a driver
 *   is added to config.
 * - Cross-references in the driver copy ("See Integrations", "see GCC
 *   compliance") are section pointers. They are kept verbatim and linked to the
 *   anchor in config so they actually navigate — the anchors are NOT hard-coded
 *   here, they come from each driver's `ref` / `ref_text` pair. Trap: the link
 *   is spliced into the ALREADY-escaped string, so the offset maths has to run
 *   against the escaped copy, not the raw copy.
 * - No rule above the closing row: the ruled driver index already ends on a
 *   boundary and a second line read as a double divider.
 * - `data-reveal` / `data-stack` / `data-stack-sm` / `data-hov` are hooks for
 *   the page's own CSS + JS (scroll reveal, the small-screen collapse of the
 *   grids, the row hover tint). They carry no meaning here; leave them on the
 *   elements the design put them on.
 * - `data-erp-cta-inline` / `data-erp-cta-button` stay on the CTA: they are the
 *   shared markers every one of the page's inline CTAs carries.
 * - Site-relative hrefs from config go through route_url() (as the design's
 *   absolute links do). The driver refs are bare `#anchor` fragments and are
 *   echoed as-is. Everything else is escaped with htmlspecialchars(ENT_QUOTES).
 *
 * SCOPE: partials are `include`d into one shared variable scope, so every
 * variable here is prefixed `erpCost*`.
 *
 * @var array $erp  config('erp_page')
 */
$erpCost = $erp['cost'] ?? [];
if (empty($erpCost['title'])) {
    return;
}

/** @var array<int,string> $erpCostPositioning */
$erpCostPositioning = $erpCost['positioning'] ?? [];
/** @var array<int,array{title:string,text:string,ref?:string,ref_text?:string}> $erpCostDrivers */
$erpCostDrivers = $erpCost['drivers'] ?? [];
// Keyed, not counted: if a driver is ever unset() or array_filter()ed out of
// config the keys stop being 0..n-1, and a count()-based "last" would silently
// stop matching — taking the closing 2px rule off the bottom of the index.
$erpCostFirst   = array_key_first($erpCostDrivers);
$erpCostLast    = array_key_last($erpCostDrivers);
/** @var array{lead?:string,label:string,url:string,secondary_label?:string,secondary_url?:string}|null $erpCostCta */
$erpCostCta = $erp['inline_ctas']['estimate'] ?? null;
/** @var array{label:string,url:string}|null $erpCostRelated */
$erpCostRelated = $erpCost['related'] ?? null;

/** Shared inline style for every in-copy link in this section. */
$erpCostRefStyle = 'color:var(--color-accent-700);text-decoration:none;border-bottom:1px solid color-mix(in srgb, var(--color-accent) 40%, transparent)';

/**
 * Link the cross-reference label inside a driver's copy to its anchor.
 * Returns HTML — the caller must echo it raw, so the escaping happens here.
 */
$erpCostLinkRef = static function (string $text, array $driver) use ($erpCostRefStyle): string {
    $safe = htmlspecialchars($text, ENT_QUOTES);
    if (empty($driver['ref']) || empty($driver['ref_text'])) {
        return $safe;
    }
    $label = htmlspecialchars($driver['ref_text'], ENT_QUOTES);
    $href  = htmlspecialchars($driver['ref'], ENT_QUOTES);

    // First occurrence only: str_replace would link every match, and these
    // labels are ordinary words that can recur in the sentence around them.
    $at = strpos($safe, $label);
    if ($at === false) {
        return $safe;
    }

    return substr_replace(
        $safe,
        '<a href="' . $href . '" style="' . $erpCostRefStyle . '">' . $label . '</a>',
        $at,
        strlen($label)
    );
};
?>

<section
    id="<?= htmlspecialchars($erpCost['id'], ENT_QUOTES) ?>"
    aria-labelledby="erp-cost-heading"
    data-section-erp-cost
    style="scroll-margin-top:16px;padding:clamp(56px,6.5vw,104px) clamp(20px,4.5vw,72px)"
>
    <!-- Band 1 — heading + the refusal | the snippet-shaped answer -->
    <div data-stack data-reveal style="display:grid;grid-template-columns:minmax(0,1.12fr) minmax(0,0.88fr);gap:clamp(28px,3.5vw,64px);align-items:start">
        <div>
            <?php if (!empty($erpCost['eyebrow'])): ?>
                <p style="display:flex;align-items:center;gap:12px;margin:0;font-size:11px;font-weight:600;letter-spacing:0.22em;text-transform:uppercase;color:var(--color-accent-700)">
                    <span aria-hidden="true" style="display:block;width:32px;height:2px;background:var(--color-accent)"></span><?= htmlspecialchars($erpCost['eyebrow'], ENT_QUOTES) ?>
                </p>
            <?php endif; ?>

            <h2 id="erp-cost-heading" style="margin:18px 0 0;font-size:clamp(32px,3.6vw,52px);line-height:1.02;letter-spacing:-0.035em;max-width:16ch">
                <?= htmlspecialchars($erpCost['title'], ENT_QUOTES) ?>
            </h2>

            <?php if (isset($erpCostPositioning[0])): ?>
                <p style="margin:32px 0 0;max-width:34ch;font-size:clamp(19px,1.8vw,26px);font-weight:700;font-family:var(--font-heading);line-height:1.25;letter-spacing:-0.025em;border-left:4px solid var(--color-accent);padding-left:20px">
                    <?= htmlspecialchars($erpCostPositioning[0], ENT_QUOTES) ?>
                </p>
            <?php endif; ?>
        </div>

        <?php if (!empty($erpCost['snippet'])): ?>
            <aside style="background:var(--color-surface);border-top:3px solid var(--color-accent);padding:clamp(24px,2.6vw,36px)">
                <p style="margin:0;font-size:16px;line-height:1.62">
                    <?= htmlspecialchars($erpCost['snippet'], ENT_QUOTES) ?>
                </p>
            </aside>
        <?php endif; ?>
    </div>

    <!-- Band 2 — the reasoning behind the refusal -->
    <?php $erpCostRest = array_slice($erpCostPositioning, 1); ?>
    <?php if ($erpCostRest): ?>
        <div data-stack data-reveal style="display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:clamp(24px,3vw,56px);margin-top:clamp(32px,3.5vw,52px);border-top:1px solid var(--color-divider);padding-top:28px">
            <?php foreach ($erpCostRest as $erpCostPara): ?>
                <p style="margin:0;font-size:14.5px;line-height:1.65;color:color-mix(in srgb, var(--color-text) 76%, transparent)">
                    <?= htmlspecialchars($erpCostPara, ENT_QUOTES) ?>
                </p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <!-- Band 3 — what moves the number: a ruled index, not a card grid -->
    <?php if ($erpCostDrivers): ?>
        <ol data-reveal style="margin:clamp(36px,4vw,60px) 0 0;padding:0;list-style:none;border-top:2px solid var(--color-text)">
            <?php foreach ($erpCostDrivers as $erpCostIndex => $erpCostDriver): ?>
                <?php
                /* 01 carries the accent because the copy itself calls it "The
                   largest single driver" — the emphasis is the content's, not
                   the layout's. */
                $erpCostIsLead = ($erpCostIndex === $erpCostFirst);
                $erpCostRule   = ($erpCostIndex === $erpCostLast)
                    ? '2px solid var(--color-text)'
                    : '1px solid var(--color-divider)';
                ?>
                <li data-hov data-stack-sm style="display:grid;grid-template-columns:96px minmax(0,22ch) minmax(0,1fr);gap:clamp(16px,2vw,32px);align-items:start;padding:26px 0;border-bottom:<?= $erpCostRule ?>">
                    <span aria-hidden="true" style="font-family:var(--font-heading);font-weight:700;font-size:clamp(30px,3vw,44px);line-height:0.9;letter-spacing:-0.04em;color:<?= $erpCostIsLead ? 'var(--color-accent)' : 'color-mix(in srgb, var(--color-text) 30%, transparent)' ?>">
                        <?= str_pad((string) ($erpCostIndex + 1), 2, '0', STR_PAD_LEFT) ?>
                    </span>
                    <h3 style="margin:0;font-size:19px;letter-spacing:-0.02em;line-height:1.25">
                        <?= htmlspecialchars($erpCostDriver['title'], ENT_QUOTES) ?>
                    </h3>
                    <p style="margin:0;font-size:15px;line-height:1.6;color:color-mix(in srgb, var(--color-text) 76%, transparent)">
                        <?= $erpCostLinkRef($erpCostDriver['text'], $erpCostDriver) ?>
                    </p>
                </li>
            <?php endforeach; ?>
        </ol>
    <?php endif; ?>

    <!-- Band 4 — closing row -->
    <div data-stack style="display:grid;grid-template-columns:minmax(0,1fr) auto;gap:24px;align-items:center;margin-top:36px">
        <?php if (!empty($erpCostCta['label']) && !empty($erpCostCta['url'])): ?>
            <div data-erp-cta-inline style="display:flex;flex-wrap:wrap;align-items:center;gap:24px">
                <?php if (!empty($erpCostCta['lead'])): ?>
                    <span style="font-size:15px;color:color-mix(in srgb, var(--color-text) 65%, transparent)">
                        <?= htmlspecialchars($erpCostCta['lead'], ENT_QUOTES) ?>
                    </span>
                <?php endif; ?>

                <a
                    href="<?= htmlspecialchars(route_url($erpCostCta['url']), ENT_QUOTES) ?>"
                    class="erp-btn erp-btn-primary"
                    data-erp-cta-button
                    style="padding:16px 22px;font-size:15px"
                >
                    <?= htmlspecialchars($erpCostCta['label'], ENT_QUOTES) ?>
                </a>

                <?php /* Secondary was dropped when this row was first written by
                         hand; it is approved copy and belongs here. */ ?>
                <?php if (!empty($erpCostCta['secondary_label']) && !empty($erpCostCta['secondary_url'])): ?>
                    <a
                        href="<?= htmlspecialchars(route_url($erpCostCta['secondary_url']), ENT_QUOTES) ?>"
                        style="font-size:15px;font-weight:600;<?= $erpCostRefStyle ?>"
                    >
                        <?= htmlspecialchars($erpCostCta['secondary_label'], ENT_QUOTES) ?>
                    </a>
                <?php endif; ?>
            </div>
        <?php elseif (!empty($erpCostRelated['url'])): ?>
            <?php /* Spacer only: the related pointer belongs in the right-hand
                     `auto` track, so without a CTA it would otherwise slide
                     into column one and stretch across the row. */ ?>
            <div></div>
        <?php endif; ?>

        <?php if (!empty($erpCostRelated['label']) && !empty($erpCostRelated['url'])): ?>
            <p style="margin:0;font-size:13.5px;color:color-mix(in srgb, var(--color-text) 60%, transparent)">
                <strong style="color:var(--color-text)">Related:</strong>
                <a href="<?= htmlspecialchars(route_url($erpCostRelated['url']), ENT_QUOTES) ?>" style="<?= $erpCostRefStyle ?>">
                    <?= htmlspecialchars($erpCostRelated['label'], ENT_QUOTES) ?>
                </a>
            </p>
        <?php endif; ?>
    </div>
</section>
