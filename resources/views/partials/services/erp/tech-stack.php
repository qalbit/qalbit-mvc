<?php
/**
 * ERP §12 — Tech stack & platforms.
 *
 * Replaces the shared `service-tech-stack.php` for this page only. That partial
 * is shared with `services/show` and `hire/show`, so it could not be restyled
 * in place. Content still comes from the same place —
 * config('services.erp_development.stack') — so nothing is duplicated.
 *
 * Rebuilt to the new page design. The previous build was a white card panel
 * with a slate border; this one drops the card entirely. The four layers are
 * columns of one hairline-ruled grid hanging off a 2px rule, each led by a big
 * accent numeral and the layer's site icon, and each item sits in its own band
 * between hairlines rather than behind a bullet. §11 above is `--color-surface`
 * and §13 below is the dark outcomes band, so this section takes the plain page
 * ground and separates on a `--color-divider` rule alone.
 *
 * Layout is inline styles + design tokens, as the rest of the redesigned page
 * is. Five things are worth knowing before editing:
 *
 *   1. schema.org/ItemList microdata MUST SURVIVE. The section is an ItemList,
 *      the h2 its `name`, and each column an itemListElement/Thing carrying
 *      `name` and `description`. That is live structured data, reproduced here
 *      exactly as the previous build had it, only re-hung on the new markup.
 *   2. THE ACCENT COLUMN IS DRIVEN BY THE CONFIG FLAG, NOT BY ITS POSITION.
 *      `categories[N].accent` is currently true on the second layer, which is
 *      why the design shows the fill there — but move the flag in config and
 *      the fill moves with it, no template edit. Everything the fill implies
 *      (type on `#f3f2f2`, hairlines at 40% of it instead of `--color-divider`,
 *      a pale numeral instead of a blue one) is computed from that one flag.
 *   3. Column chrome is per-position and inline: the first column pads right
 *      only so its type sits on the section's left edge, the last pads left
 *      only for the same reason on the right, and every column but the last
 *      carries the divider on its right edge. An accent column is the one
 *      exception — a filled block gets padding on all four sides wherever it
 *      lands, otherwise the fill would bleed flush against the section padding
 *      and read as a mistake. Because those are inline styles, the stacked
 *      layout under 900px can only undo them from CSS — hence
 *      `class="erp-stk-cell"`, which carries no desktop styling and exists
 *      purely as that override hook.
 *   4. The icon files declare `width="64" height="64"` on the <svg> element
 *      itself, and a presentation attribute beats the parent's inline size, so
 *      the 32px render size can only come from a rule on `.erp-stk-icon svg`;
 *      the span's inline size below is a floor, not the mechanism. Same trap
 *      documented in modules.php. That rule already exists at the right size —
 *      which is the only reason the old class name is kept on the icon span.
 *   5. `erp-stk-col--accent` is likewise kept verbatim from the previous build,
 *      and ONLY for its icon rule: these are the generic fill-based site icons
 *      (#B0D3F0/#0284C7), not the bespoke stroke-based ERP set, and on the blue
 *      fill they need their fills remapped to white — something no inline style
 *      can reach. The old class's other declarations either restate the inline
 *      fill or hang off descendant class names this build no longer emits, so
 *      they are inert. The base column deliberately does NOT reuse the old
 *      `erp-stk-col`: that name still carries the old card's padding, borders
 *      and a `grid-row: span 4` subgrid rule that would wreck this grid.
 *
 * Falls back to <img> if an icon file is unreadable — the layout survives, only
 * the accent column's recolour is lost.
 *
 * Columns are normalised into `$erpStkCols` before anything renders, because
 * the grid's `grid-template-columns` and the first/last chrome have to count
 * the columns that actually survive the empty-entry filter, not the raw config
 * rows. Every variable is prefixed `$erpStk` — the shared partial assigned
 * generic `$eyebrow`, `$title`, `$intro`, `$items` and `$sectionId` into the
 * shared include scope, and this partial is the original source of the FAQ
 * heading leak that had to be fixed earlier. The previous build narrowed those
 * to `$stk*` but still leaked bare `$cat`, `$catName`, `$catItems` and `$label`;
 * those are gone. The icon closure is `$erpStkInlineIcon`, not the
 * `$erpInlineIcon` modules.php defines — it must not shadow it.
 *
 * @var array $service  config('services.erp_development')
 */
$erpStk = $service['stack'] ?? [];

$erpStkCategories = $erpStk['categories'] ?? [];
if (empty($erpStkCategories)) {
    return;
}

$erpStkId      = $erpStk['id']      ?? 'erp-development-tech-stack';
$erpStkEyebrow = $erpStk['eyebrow'] ?? '';
$erpStkTitle   = $erpStk['title']   ?? '';
$erpStkIntro   = $erpStk['intro']   ?? '';
$erpStkNote    = $erpStk['note']    ?? '';

/**
 * Read an icon off disk for inlining. Confined to the icons directory: the
 * path comes from config, but a realpath check keeps a future typo from
 * reading anything outside it. Do not weaken the guard.
 */
$erpStkInlineIcon = static function (?string $rel): ?string {
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

    return $cache[$rel] = trim(preg_replace('/<\?xml.*?\?>|<!--.*?-->/s', '', $svg));
};

/* Normalise first, render second — see the docblock. Items may be plain
   strings or ['label' => ...]; both shapes have shipped, keep both. */
$erpStkCols = [];

foreach ($erpStkCategories as $erpStkRow) {
    if (!is_array($erpStkRow)) {
        continue;
    }

    $erpStkRowItems = [];
    foreach (($erpStkRow['items'] ?? []) as $erpStkRowItem) {
        $erpStkLabel = is_array($erpStkRowItem)
            ? trim((string) ($erpStkRowItem['label'] ?? ''))
            : trim((string) $erpStkRowItem);

        if ($erpStkLabel !== '') {
            $erpStkRowItems[] = $erpStkLabel;
        }
    }

    $erpStkRowName = trim((string) ($erpStkRow['name']        ?? ''));
    $erpStkRowDesc = trim((string) ($erpStkRow['description'] ?? ''));

    if ($erpStkRowName === '' && $erpStkRowDesc === '' && empty($erpStkRowItems)) {
        continue;
    }

    $erpStkRowIcon = is_string($erpStkRow['icon'] ?? null) ? $erpStkRow['icon'] : '';

    $erpStkCols[] = [
        'name'     => $erpStkRowName,
        'desc'     => $erpStkRowDesc,
        'items'    => $erpStkRowItems,
        'accent'   => !empty($erpStkRow['accent']),
        'icon'     => $erpStkInlineIcon($erpStkRowIcon !== '' ? $erpStkRowIcon : null),
        'icon_src' => $erpStkRowIcon,
    ];
}

if (empty($erpStkCols)) {
    return;
}

$erpStkCount = count($erpStkCols);
?>

<section
    id="<?= htmlspecialchars($erpStkId, ENT_QUOTES) ?>"
    aria-labelledby="erp-stack-heading"
    data-section-erp-stack
    itemscope
    itemtype="https://schema.org/ItemList"
    data-erp-bleed
    style="scroll-margin-top:16px;padding:clamp(56px,6.5vw,104px) clamp(20px,4.5vw,72px);border-top:2px solid var(--color-divider)"
>
    <div data-erp-wrap>
    <div data-stack="" data-reveal="" style="display:grid;grid-template-columns:minmax(0,1.2fr) minmax(0,0.8fr);gap:clamp(24px,3vw,56px);align-items:end">
        <div>
            <?php if ($erpStkEyebrow !== ''): ?>
                <p style="display:flex;align-items:center;gap:12px;margin:0;font-size:11px;font-weight:600;letter-spacing:0.22em;text-transform:uppercase;color:var(--color-accent-700)"><span aria-hidden="true" style="display:block;width:32px;height:2px;background:var(--color-accent)"></span><?= htmlspecialchars($erpStkEyebrow, ENT_QUOTES) ?></p>
            <?php endif; ?>
            <h2 id="erp-stack-heading" itemprop="name" style="margin:18px 0 0;font-size:clamp(32px,3.6vw,52px);line-height:1.02;letter-spacing:-0.035em;max-width:20ch">
                <?= htmlspecialchars($erpStkTitle, ENT_QUOTES) ?>
            </h2>
        </div>
        <?php if ($erpStkIntro !== ''): ?>
            <p style="margin:0;font-size:15.5px;line-height:1.6;color:color-mix(in srgb, var(--color-text) 70%, transparent)">
                <?= htmlspecialchars($erpStkIntro, ENT_QUOTES) ?>
            </p>
        <?php endif; ?>
    </div>

    <?php /* Column count follows config rather than a hardcoded 4, so the grid
             and the first/last column chrome stay in step if a fifth layer is
             added or one is removed. */ ?>
    <div
        data-stack=""
        data-stack-sm=""
        data-reveal=""
        style="display:grid;grid-template-columns:repeat(<?= (int) $erpStkCount ?>,minmax(0,1fr));gap:0;margin-top:clamp(36px,4vw,60px)"
    >
        <?php foreach ($erpStkCols as $erpStkIndex => $erpStkCol): ?>
            <?php
            $erpStkIsFirst = ($erpStkIndex === 0);
            $erpStkIsLast  = ($erpStkIndex === $erpStkCount - 1);
            $erpStkAccent  = $erpStkCol['accent'];

            // A filled column keeps its padding on every side; an edge column
            // otherwise drops the padding on the side facing the page margin.
            $erpStkPadL = ($erpStkIsFirst && !$erpStkAccent) ? '0' : '26px';
            $erpStkPadR = ($erpStkIsLast  && !$erpStkAccent) ? '0' : '26px';

            // Hairlines inside the fill are struck from the fill's own type
            // colour; `--color-divider` is mixed for the light ground and
            // disappears on blue.
            $erpStkRule = $erpStkAccent
                ? 'color-mix(in srgb, #f3f2f2 40%, transparent)'
                : 'var(--color-divider)';

            $erpStkColStyle = 'padding:28px ' . $erpStkPadR . ' 28px ' . $erpStkPadL;
            if (!$erpStkIsLast) {
                $erpStkColStyle .= ';border-right:1px solid var(--color-divider)';
            }
            if ($erpStkAccent) {
                $erpStkColStyle .= ';background:var(--color-accent);color:#f3f2f2';
            }

            $erpStkNumber = str_pad((string) ($erpStkIndex + 1), 2, '0', STR_PAD_LEFT);
            ?>
            <article
                class="erp-stk-cell<?= $erpStkAccent ? ' erp-stk-col--accent' : '' ?>"
                itemprop="itemListElement"
                itemscope
                itemtype="https://schema.org/Thing"
                style="<?= $erpStkColStyle ?>"
            >
                <?php /* Marker row: the design's numeral, widened to carry the
                         layer's site icon at the far end. Both are decorative —
                         the numeral only restates the column's position and the
                         icon is a label mark — so the row is hidden from
                         assistive tech rather than read out twice. */ ?>
                <div aria-hidden="true" style="display:flex;align-items:center;gap:12px;min-height:32px">
                    <span style="font-family:var(--font-heading);font-weight:700;font-size:clamp(28px,2.6vw,38px);line-height:1;letter-spacing:-0.04em;color:<?= $erpStkAccent ? '#f3f2f2' : 'var(--color-accent)' ?>"><?= $erpStkNumber ?></span>
                    <?php if ($erpStkCol['icon'] !== null): ?>
                        <span class="erp-stk-icon" style="display:block;width:32px;height:32px;flex:none;margin-left:auto"><?= $erpStkCol['icon'] ?></span>
                    <?php elseif ($erpStkCol['icon_src'] !== ''): ?>
                        <img
                            class="erp-stk-icon"
                            src="<?= htmlspecialchars(asset($erpStkCol['icon_src']), ENT_QUOTES) ?>"
                            alt=""
                            width="32"
                            height="32"
                            loading="lazy"
                            decoding="async"
                            style="display:block;width:32px;height:32px;flex:none;margin-left:auto"
                        >
                    <?php endif; ?>
                </div>

                <?php if ($erpStkCol['name'] !== ''): ?>
                    <h3 itemprop="name" style="margin:18px 0 8px;font-size:19px;letter-spacing:-0.02em;line-height:1.2<?= $erpStkAccent ? ';color:#f3f2f2' : '' ?>">
                        <?= htmlspecialchars($erpStkCol['name'], ENT_QUOTES) ?>
                    </h3>
                <?php endif; ?>

                <?php if ($erpStkCol['desc'] !== ''): ?>
                    <p itemprop="description" style="margin:0 0 16px;font-size:14px;line-height:1.55<?= $erpStkAccent ? '' : ';color:color-mix(in srgb, var(--color-text) 70%, transparent)' ?>">
                        <?= htmlspecialchars($erpStkCol['desc'], ENT_QUOTES) ?>
                    </p>
                <?php endif; ?>

                <?php if (!empty($erpStkCol['items'])): ?>
                    <ul style="margin:0;padding:0;list-style:none;border-top:1px solid <?= $erpStkRule ?>">
                        <?php
                        $erpStkLastItem = count($erpStkCol['items']) - 1;
                        foreach ($erpStkCol['items'] as $erpStkItemIndex => $erpStkItem):
                        ?>
                            <li style="padding:12px 0;font-size:14px;line-height:1.5<?= $erpStkItemIndex === $erpStkLastItem ? '' : ';border-bottom:1px solid ' . $erpStkRule ?>">
                                <?= htmlspecialchars($erpStkItem, ENT_QUOTES) ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </article>
        <?php endforeach; ?>
    </div>

    <?php if ($erpStkNote !== ''): ?>
        <p data-reveal="" style="margin:32px 0 0;max-width:78ch;border-top:2px solid var(--color-divider);padding-top:22px;font-size:16px;font-weight:600;line-height:1.6">
            <?= htmlspecialchars($erpStkNote, ENT_QUOTES) ?>
        </p>
    <?php endif; ?>
    </div>
</section>
