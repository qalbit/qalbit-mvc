<?php
/**
 * ERP §16 — Why work with us on ERP.
 *
 * Five prose blocks. Every claim is first-party and adjacent: no delivered
 * full-ERP implementation is asserted. Do not "strengthen" this copy.
 *
 * Composed as lead → body → punchline rather than five equal cards, because
 * the five items are not equal in kind. The redesign keeps that split and
 * gives each part its own geometry:
 *
 *   1    credentials, plus the honest caveat about what our ERP work has been
 *        so far. Longest, and the only one carrying evidence — it leads, in a
 *        two-column row (heading / paragraph) hung off a 2px rule, at larger
 *        type than the rest.
 *   2-4  how we work. Three columns, hairline-separated, no card chrome.
 *   5    "We'll tell you not to build." The most distinctive claim on the page
 *        and the one a reader remembers, so it closes the section as a filled
 *        accent block instead of being the fifth card in a grid.
 *
 * The split is positional, not keyed: config('erp_page.why_us.items') is a flat
 * list and the first/last entries are the lead and the punchline BY ORDER.
 * Reordering that array silently re-casts the section. It degrades safely —
 * with fewer than three items the punchline is not pulled out at all (see
 * $erpWhyClose below), which is the old behaviour and is deliberate.
 *
 * NO BORDER-TOP AND NO BACKGROUND ON THE <section>. Every other section on this
 * page opens with a 2px rule; this one does not, because §15 (Outcomes) above
 * is a full dark slab and its bottom edge already is the boundary. Adding one
 * here draws a hairline against black. The design omits it for the same reason.
 *
 * THE LEAD ROW HAS NO PHOTOGRAPH, deliberately. It used to open with a 240px
 * team photo. That slot was removed rather than filled: the only honest thing
 * to put there is a real photograph of this team, and there wasn't a current
 * one. A generated stand-in would have been fabricated people presented as our
 * staff, next to the credential claims in this very paragraph — an assertion
 * the page cannot back, and a different thing entirely from the generic
 * operations photograph in the middle of the page.
 *
 * It cost the layout nothing. The image rendered 240x260 at desktop, was
 * desaturated to grey, and carried alt="" + aria-hidden — decoration, not
 * evidence. It also swung to 3.60:1 at the 768px breakpoint, where a square
 * source keeps only the middle quarter of its height, so any group shot was
 * being cropped through the faces anyway.
 *
 * If a real photograph is taken later, restore a third column at
 * minmax(0,240px) and put it FIRST; do not fill this slot with a stock or
 * generated crowd.
 *
 * CONTRAST ON THE ACCENT BLOCK — the one place this file departs from the
 * design comp. The comp paints on-accent type in #f3f2f2 (the page ground),
 * which measures 4.32:1 against #06f. That clears AA for the heading, which is
 * large text needing 3:1, but not for the 16.5px paragraph, which needs 4.5:1.
 * The paragraph is therefore #fff (4.83:1) and the heading is left exactly as
 * drawn. Nothing dimmer than pure white passes at that size, so no opacity or
 * color-mix is used on that line — do not "harmonise" it back to #f3f2f2.
 *
 * NOT DONE: the numbers in item 1 (120+, 90+, Clutch 5.0) are left inside the
 * sentence. Pulling them into stat chips would both re-author approved copy and
 * duplicate the hero's proof grid, which already carries those figures.
 *
 * NO ICONS HERE. This section is not one of the six that were given bespoke
 * icons, and the columns carry no numerals either — the design leads them with
 * the heading alone, and inventing a mark for three prose blocks would compete
 * with §9/§10 immediately above.
 *
 * Copy is config-only. The design comp has these exact sentences hard-coded;
 * they are read from `erp_page.why_us` at runtime regardless, so an edit to the
 * config is the only way this section's words change.
 *
 * @var array $erp  config('erp_page')
 */
$erpWhy = $erp['why_us'] ?? [];
if (empty($erpWhy['items'])) {
    return;
}

/** @var array<int,array{title:string,text:string}> $erpWhyItems */
$erpWhyItems = array_values($erpWhy['items']);
$erpWhyLead  = array_shift($erpWhyItems);                              // item 1
$erpWhyClose = count($erpWhyItems) > 1 ? array_pop($erpWhyItems) : null; // item 5
$erpWhyMiddle = $erpWhyItems;                                          // items 2-4

$erpWhyCount = count($erpWhyMiddle);
$erpWhyLast  = $erpWhyCount - 1;
?>

<section
    id="<?= htmlspecialchars($erpWhy['id'] ?? 'why-qalbit-erp', ENT_QUOTES) ?>"
    aria-labelledby="erp-why-heading"
    data-section-erp-why
    style="scroll-margin-top:16px;padding:clamp(56px,6.5vw,104px) clamp(20px,4.5vw,72px)"
>
    <div data-reveal>
        <?php if (!empty($erpWhy['eyebrow'])): ?>
            <p style="display:flex;align-items:center;gap:12px;margin:0;font-size:11px;font-weight:600;letter-spacing:0.22em;text-transform:uppercase;color:var(--color-accent-700)">
                <span aria-hidden="true" style="display:block;width:32px;height:2px;background:var(--color-accent);flex:none"></span><?= htmlspecialchars($erpWhy['eyebrow'], ENT_QUOTES) ?>
            </p>
        <?php endif; ?>
        <h2 id="erp-why-heading" style="margin:18px 0 0;font-size:clamp(32px,3.6vw,52px);line-height:1.02;letter-spacing:-0.035em">
            <?= htmlspecialchars($erpWhy['title'] ?? '', ENT_QUOTES) ?>
        </h2>
    </div>

    <?php if ($erpWhyLead): ?>
        <?php /* Lead: the only item carrying evidence. Heading and paragraph are
                 two columns of one row rather than a heading above a body, so
                 the 2px rule reads as a masthead for both. align-items:start
                 keeps them hanging from the rule when the paragraph runs long. */ ?>
        <div data-stack data-reveal style="display:grid;grid-template-columns:minmax(0,0.8fr) minmax(0,1fr);gap:clamp(24px,3vw,48px);align-items:start;margin-top:clamp(32px,3.5vw,52px);border-top:2px solid var(--color-text);padding-top:28px">
            <h3 style="margin:0;font-size:clamp(24px,2.6vw,36px);letter-spacing:-0.03em;line-height:1.08">
                <?= htmlspecialchars($erpWhyLead['title'] ?? '', ENT_QUOTES) ?>
            </h3>
            <p style="margin:0;font-size:16px;line-height:1.65;color:color-mix(in srgb, var(--color-text) 80%, transparent)">
                <?= htmlspecialchars($erpWhyLead['text'] ?? '', ENT_QUOTES) ?>
            </p>
        </div>
    <?php endif; ?>

    <?php if ($erpWhyMiddle): ?>
        <?php /* How we work: hairline-separated columns, no card chrome and no
                 hover — nothing here is a link, and a panel would say it was.
                 The column count follows the item count so the asymmetric
                 padding below always describes a single row; today that is the
                 design's three. */ ?>
        <div data-stack data-stack-sm data-reveal style="display:grid;grid-template-columns:repeat(<?= $erpWhyCount ?>,minmax(0,1fr));gap:0;margin-top:clamp(32px,3.5vw,52px);border-top:1px solid var(--color-divider)">
            <?php foreach ($erpWhyMiddle as $erpWhyIndex => $erpWhyItem): ?>
                <?php
                // First column bleeds to the left edge, last to the right; the
                // dividers live on the right of every column but the last. A
                // lone column keeps neither inset — it spans the full measure.
                if ($erpWhyCount === 1) {
                    $erpWhyPad = '28px 0';
                } elseif ($erpWhyIndex === 0) {
                    $erpWhyPad = '28px 32px 28px 0';
                } elseif ($erpWhyIndex === $erpWhyLast) {
                    $erpWhyPad = '28px 0 28px 32px';
                } else {
                    $erpWhyPad = '28px 32px';
                }
                ?>
                <?php /* data-erp-why-col: inline styles cannot unwind the
                         border-right and the asymmetric padding at the
                         [data-stack] breakpoint, where the columns become rows.
                         Same trap as §3 and §10 — the integrator's stacked-view
                         rule hangs off this attribute. Do not "fix" it by
                         dropping the border, which breaks the row at desktop
                         where it is doing the work. */ ?>
                <article data-erp-why-col style="padding:<?= $erpWhyPad ?><?= $erpWhyIndex === $erpWhyLast ? '' : ';border-right:1px solid var(--color-divider)' ?>">
                    <h3 style="margin:0 0 12px;font-size:19px;letter-spacing:-0.02em;line-height:1.2">
                        <?= htmlspecialchars($erpWhyItem['title'] ?? '', ENT_QUOTES) ?>
                    </h3>
                    <p style="margin:0;font-size:14.5px;line-height:1.62;color:color-mix(in srgb, var(--color-text) 76%, transparent)">
                        <?= htmlspecialchars($erpWhyItem['text'] ?? '', ENT_QUOTES) ?>
                    </p>
                </article>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if ($erpWhyClose): ?>
        <?php /* Punchline. See the contrast note in the file docblock before
                 touching either colour on this block. */ ?>
        <div data-stack data-reveal style="display:grid;grid-template-columns:minmax(0,0.9fr) minmax(0,1.1fr);gap:clamp(20px,3vw,48px);align-items:center;margin-top:clamp(32px,3.5vw,52px);background:var(--color-accent);color:#f3f2f2;padding:clamp(28px,3vw,44px)">
            <h3 style="margin:0;font-size:clamp(28px,3.2vw,46px);letter-spacing:-0.035em;line-height:1;color:#f3f2f2">
                <?= htmlspecialchars($erpWhyClose['title'] ?? '', ENT_QUOTES) ?>
            </h3>
            <p style="margin:0;font-size:16.5px;line-height:1.55;color:#fff">
                <?= htmlspecialchars($erpWhyClose['text'] ?? '', ENT_QUOTES) ?>
            </p>
        </div>
    <?php endif; ?>
</section>
