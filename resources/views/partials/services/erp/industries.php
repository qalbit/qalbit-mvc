<?php
/**
 * ERP §9 — Industries we build ERP systems for.
 *
 * NO LINKS. None of these four sectors has a matching /industries/ page, and
 * the content document is explicit that pointing them at a near-match (Pharma
 * → /industries/healthcare/) is worse than leaving them unlinked. Do not add
 * links here without the corresponding spoke pages existing first. The new
 * design does not add any either — this section is the one place on the page
 * with no outbound anything, deliberately.
 *
 * Because of that rule the columns deliberately carry **no card chrome and no
 * hover state**. An earlier version used bordered, shadowed panels that lift on
 * hover, which reads as clickable — an affordance this section must not offer.
 * The redesign makes that easier rather than harder: the columns are separated
 * by hairlines only, so there is no panel to mistake for a target.
 *
 * Four columns rather than a 2x2: the copy is ~250 characters per item, which
 * sets to seven or eight lines in a quarter-width column, so a four-up grid
 * fits the page width and roughly halves the section's height. §8 directly
 * above is already a 2x2, so repeating that shape here would have read as one
 * long undifferentiated block.
 *
 * ICONS, NOT ILLUSTRATIONS. This section once reserved four 480x360 4:3
 * illustrations carrying descriptive alt text. They were dropped in favour of
 * icons from the same bespoke family as §5, §8 and §10, because four credible
 * enterprise illustrations are a design commission rather than something the
 * icon contract can specify, and a second visual language here would undercut
 * the most domain-specific copy on the page. The four `image_alt` strings went
 * with them — an icon cannot depict "a multi-stage production line with work
 * orders and batch costing at each stage", so these are decorative. That cost
 * approved copy and was signed off before the change.
 *
 * Inlined rather than <img> for consistency with the other three bespoke sets,
 * and so a future dark treatment of this section needs no second icon set.
 *
 * Three things about this layout are load-bearing and easy to undo by accident:
 *
 *   1. THE ICONS RENDER AT 64px, AND ONLY CSS CAN SAY SO. The icon files
 *      declare `width="48" height="48"` on the <svg> element itself, and a
 *      presentation attribute beats the parent's inline size — so the 64px
 *      render can only come from the `.erp-ind-icon svg` rule in page CSS. The
 *      span's inline 64px below is a floor, not the mechanism. That is also why
 *      the class hook survives an otherwise class-free rebuild. 64px, not the
 *      36px used in §5/§8/§10: there those icons are label marks beside a
 *      heading, here they stand in for the artwork this section gave up and
 *      lead each column.
 *   2. THE HEADING RESERVES TWO LINES. "Accounting & finance operations" wraps
 *      where the other three do not, which drops its accent rule and paragraph
 *      a line below its neighbours' and visibly breaks the row. `min-height`
 *      is set inline at `calc(2 * 1.2em)` to match the inline `line-height:1.2`
 *      — keep the two in step if either changes. The rule is its own element
 *      rather than an ::after on the heading for the same reason: inside the
 *      heading it sat directly under the text, so reserving two lines moved the
 *      heading's box but not the rule.
 *      That reservation is only wanted while the four columns share a row. The
 *      previous version got that free by scoping the rule to `min-width:640px`;
 *      an inline style cannot carry a media query, so the heading also carries
 *      `data-erp-ind-name` for the integrator to unwind it (`min-height:0`) at
 *      the same breakpoint `[data-stack]` stacks at — otherwise every stacked
 *      heading reserves a second line it never uses. Same handover as (3).
 *   3. The columns carry their divider as `border-right` on every column but
 *      the last, plus asymmetric padding so the first bleeds to the left edge
 *      and the last to the right. Inline styles cannot unwind that at the
 *      `[data-stack]` breakpoint, so each column carries `data-erp-ind-col` for
 *      the integrator's stacked-view rule (see the note handed over with this
 *      file). Same trap as §3 — do not "fix" it by dropping the border, which
 *      breaks the row at desktop where it matters.
 *
 * Column count follows the item count so the geometry above always describes a
 * single row; the first/last padding logic is only correct for one row.
 *
 * Copy is config-only. The design comp has these exact sentences hard-coded;
 * they are read from `erp_page.industries` at runtime regardless, so an edit to
 * the config is the only way this section's words change.
 *
 * @var array $erp  config('erp_page')
 */
$erpInd = $erp['industries'] ?? [];
if (empty($erpInd['items'])) {
    return;
}

/** @var array<int,array{title:string,text:string,icon?:string}> $erpIndItems */
$erpIndItems = $erpInd['items'];
$erpIndLast  = count($erpIndItems) - 1;

/**
 * Read an icon off disk for inlining. Confined to the icons directory: the
 * path comes from config, but a realpath check keeps a future typo from
 * reading anything outside it.
 */
$erpInlineIcon = static function (?string $rel): ?string {
    static $cache = [];

    if (!$rel || !str_ends_with($rel, '.svg')) {
        return null;
    }
    if (array_key_exists($rel, $cache)) {
        return $cache[$rel];
    }

    $root = realpath(__DIR__ . '/../../../../../public/assets/images/icons');
    $file = realpath(__DIR__ . '/../../../../../public/assets' . $rel);

    if ($root === false || $file === false || !str_starts_with($file, $root . DIRECTORY_SEPARATOR)) {
        return $cache[$rel] = null;
    }

    $svg = file_get_contents($file);

    if ($svg === false || !str_contains($svg, '<svg')) {
        return $cache[$rel] = null;
    }

    // Drop the XML prolog and any comments; keep the <svg> element itself.
    $svg = preg_replace('/<\?xml.*?\?>|<!--.*?-->/s', '', $svg);

    return $cache[$rel] = trim($svg);
};
?>

<section
    id="<?= htmlspecialchars($erpInd['id'] ?? 'erp-industries', ENT_QUOTES) ?>"
    aria-labelledby="erp-industries-heading"
    data-section-erp-industries
    data-erp-bleed
    style="scroll-margin-top:16px;padding:clamp(56px,6.5vw,104px) clamp(20px,4.5vw,72px);border-top:2px solid var(--color-divider);background:var(--color-surface)"
>
    <div data-erp-wrap>
    <div data-stack data-reveal style="display:grid;grid-template-columns:minmax(0,1.2fr) minmax(0,0.8fr);gap:clamp(24px,3vw,56px);align-items:end">
        <div>
            <?php if (!empty($erpInd['eyebrow'])): ?>
                <p style="display:flex;align-items:center;gap:12px;margin:0;font-size:11px;font-weight:600;letter-spacing:0.22em;text-transform:uppercase;color:var(--color-accent-700)">
                    <span aria-hidden="true" style="display:block;width:32px;height:2px;background:var(--color-accent);flex:none"></span><?= htmlspecialchars($erpInd['eyebrow'], ENT_QUOTES) ?>
                </p>
            <?php endif; ?>
            <h2 id="erp-industries-heading" style="margin:18px 0 0;font-size:clamp(32px,3.6vw,52px);line-height:1.02;letter-spacing:-0.035em">
                <?= htmlspecialchars($erpInd['title'] ?? '', ENT_QUOTES) ?>
            </h2>
        </div>
        <?php if (!empty($erpInd['intro'])): ?>
            <p style="margin:0;font-size:15.5px;line-height:1.6;color:color-mix(in srgb, var(--color-text) 70%, transparent)">
                <?= htmlspecialchars($erpInd['intro'], ENT_QUOTES) ?>
            </p>
        <?php endif; ?>
    </div>

    <div data-stack data-stack-sm data-reveal style="display:grid;grid-template-columns:repeat(<?= count($erpIndItems) ?>,minmax(0,1fr));gap:0;margin-top:clamp(36px,4vw,60px);border-top:2px solid var(--color-text)">
        <?php foreach ($erpIndItems as $erpIndIndex => $erpIndItem): ?>
            <?php
            // First column bleeds to the left edge, last to the right; the
            // dividers live on the right of every column but the last.
            if ($erpIndIndex === 0) {
                $erpIndPad = '28px 26px 28px 0';
            } elseif ($erpIndIndex === $erpIndLast) {
                $erpIndPad = '28px 0 28px 26px';
            } else {
                $erpIndPad = '28px 26px';
            }

            $erpIndIcon = $erpInlineIcon($erpIndItem['icon'] ?? null);
            ?>
            <article data-erp-ind-col style="padding:<?= $erpIndPad ?><?= $erpIndIndex === $erpIndLast ? '' : ';border-right:1px solid var(--color-divider)' ?>">
                <?php /* The design's numeral row, widened to carry the commissioned
                         icon. align-items:center rather than baseline: a 64px icon
                         has no baseline to share with a 12px numeral. The numeral is
                         kept — it is the only thing tying this section's rhythm to
                         §2 and §5, and at 12px it costs the icon nothing. */ ?>
                <div style="display:flex;align-items:center;justify-content:space-between;gap:12px;min-height:64px">
                    <?php if ($erpIndIcon !== null): ?>
                        <span class="erp-ind-icon" aria-hidden="true" style="display:block;width:64px;height:64px;flex:none"><?= $erpIndIcon ?></span>
                    <?php elseif (!empty($erpIndItem['icon'])): ?>
                        <img
                            class="erp-ind-icon"
                            src="<?= asset($erpIndItem['icon']) ?>"
                            alt=""
                            aria-hidden="true"
                            width="64"
                            height="64"
                            loading="lazy"
                            decoding="async"
                            style="display:block;width:64px;height:64px;flex:none"
                        >
                    <?php endif; ?>
                    <span aria-hidden="true" style="font-family:var(--font-heading);font-weight:700;font-size:12px;letter-spacing:0.1em;color:var(--color-accent)">
                        <?= str_pad((string) ($erpIndIndex + 1), 2, '0', STR_PAD_LEFT) ?>
                    </span>
                </div>

                <h3 data-erp-ind-name style="margin:16px 0 0;font-size:20px;letter-spacing:-0.02em;line-height:1.2;min-height:calc(2 * 1.2em)">
                    <?= htmlspecialchars($erpIndItem['title'] ?? '', ENT_QUOTES) ?>
                </h3>
                <span aria-hidden="true" style="display:block;width:44px;height:2px;background:var(--color-accent);margin:14px 0"></span>
                <p style="margin:0;font-size:14.5px;line-height:1.62;color:color-mix(in srgb, var(--color-text) 76%, transparent)">
                    <?= htmlspecialchars($erpIndItem['text'] ?? '', ENT_QUOTES) ?>
                </p>
            </article>
        <?php endforeach; ?>
    </div>
    </div>
</section>
