<?php
/**
 * ERP §7 — How ERP projects work.
 *
 * Replaces the shared `service-process.php` for this page only. That partial
 * renders five stacked rounded cards and is shared with four other templates,
 * so it could not be restyled without touching all of them. Content still comes
 * from the same place — config('services.erp_development.process') — so nothing
 * is duplicated.
 *
 * Rebuilt to the new page design. The stages are no longer a vertical timeline
 * with a rail; they are five columns divided by vertical hairlines, each led by
 * a square accent marker + numeral, then a 3px rule, heading, duration, body and
 * a "Key outcome" footer sitting under its own hairline. The LAST column's 3px
 * rule is accent-coloured — the section's single colour event, and the visual
 * full stop on a sequence that ends in "ongoing".
 *
 * Layout is inline styles + design tokens, as the rest of the redesigned page
 * is. Four things are worth knowing before editing:
 *
 *   1. schema.org/HowTo microdata MUST SURVIVE. The section is a HowTo, the h2
 *      its `name`, the intro its `description`, and each <li> a HowToStep with
 *      position/name/text. That is live structured data; it is reproduced here
 *      exactly as the previous build had it, only re-hung on the new markup.
 *   2. Namespaced variables. Templates are `include`d into one shared scope.
 *      The shared partial assigned generic `$eyebrow`, `$title`, `$intro`,
 *      `$items` and `$cta`, which is how the FAQ section once inherited another
 *      section's heading. The previous build here narrowed that to `$proc*` but
 *      still leaked bare `$stepNo` / `$stepTitle` / `$stepDesc` into the shared
 *      scope. Everything is now prefixed `$erpProc`, including the icon helper —
 *      modules.php defines its own `$erpInlineIcon` and this must not shadow it.
 *   3. Column chrome is per-item and inline: the first column pads right only,
 *      the middle ones both sides, the last pads left only, and every column but
 *      the last carries the divider on its right edge. Computed from the item's
 *      index so a sixth stage in config needs no edit here. Because those are
 *      inline styles, the stacked layout below 900px can only undo them from
 *      CSS — hence `class="erp-proc-col"`, which carries no desktop styling and
 *      exists purely as that override hook.
 *   4. The icon files declare `width="64" height="64"` on the <svg> element
 *      itself, and a presentation attribute beats the parent's inline size, so
 *      the 36px render size can only come from a rule on `.erp-proc-icon svg`.
 *      The span's inline size below is a floor, not the mechanism — same trap
 *      documented in modules.php. Falls back to <img> if a file is unreadable.
 *      Unlike the module set these need no recolour: this section sits on
 *      `--color-surface`, which the icons' dark stroke was drawn for.
 *
 * Bottom padding is deliberately short. The sourced Panorama note that closes
 * this section lives in its own partial (process-note.php) so the 20 pages
 * sharing service-process.php stay untouched; it repeats this section's ground
 * and carries the rest of the bottom padding, so the two read as one block. The
 * `clamp(36px,4vw,60px)` here is the design's margin above that note. Change one
 * and change the other.
 *
 * @var array $service  config('services.erp_development')
 */
$erpProc = $service['process'] ?? [];

$erpProcItems = $erpProc['items'] ?? [];
if (empty($erpProcItems)) {
    return;
}

/*
 * Unrenderable stages are dropped HERE, before anything is measured, not with
 * a `continue` inside the loop. Three things downstream read this array rather
 * than the rendered output: the grid's column count, the first-column padding
 * and the last-column accent rule. Filtering in the loop left a dead grid
 * column and hung the divider and the accent on the wrong stage whenever a
 * malformed item sat at either end. array_values() reindexes so the loop can
 * compare against 0 and count-1 instead of array_key_first/last.
 */
$erpProcItems = array_values(array_filter(
    $erpProcItems,
    static fn ($erpProcCandidate): bool => is_array($erpProcCandidate)
        && (trim($erpProcCandidate['title'] ?? '') !== ''
            || trim($erpProcCandidate['description'] ?? '') !== '')
));
if (empty($erpProcItems)) {
    return;
}

$erpProcId      = $erpProc['id']      ?? 'erp-development-process';
$erpProcEyebrow = $erpProc['eyebrow'] ?? '';
$erpProcTitle   = $erpProc['title']   ?? '';
$erpProcIntro   = $erpProc['intro']   ?? '';
$erpProcCta     = $erpProc['cta']     ?? null;
$erpProcCount   = count($erpProcItems);

/**
 * Read an icon off disk for inlining. Confined to the icons directory: the
 * path comes from config, but a realpath check keeps a future typo from
 * reading anything outside it. Do not weaken the guard.
 */
$erpProcInlineIcon = static function (?string $rel): ?string {
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
?>

<section
    id="<?= htmlspecialchars($erpProcId, ENT_QUOTES) ?>"
    aria-labelledby="erp-process-heading"
    data-section-erp-process
    itemscope
    itemtype="https://schema.org/HowTo"
    data-erp-bleed
    style="scroll-margin-top:16px;padding:clamp(56px,6.5vw,104px) clamp(20px,4.5vw,72px) clamp(36px,4vw,60px);border-top:2px solid var(--color-divider);background:var(--color-surface)"
>
    <div data-erp-wrap>
    <div data-stack="" data-reveal="" style="display:grid;grid-template-columns:minmax(0,1.2fr) minmax(0,0.8fr);gap:clamp(24px,3vw,56px);align-items:end">
        <div>
            <?php if ($erpProcEyebrow !== ''): ?>
                <p style="display:flex;align-items:center;gap:12px;margin:0;font-size:11px;font-weight:600;letter-spacing:0.22em;text-transform:uppercase;color:var(--color-accent-700)"><span aria-hidden="true" style="display:block;width:32px;height:2px;background:var(--color-accent)"></span><?= htmlspecialchars($erpProcEyebrow, ENT_QUOTES) ?></p>
            <?php endif; ?>
            <h2 id="erp-process-heading" itemprop="name" style="margin:18px 0 0;font-size:clamp(32px,3.6vw,52px);line-height:1.02;letter-spacing:-0.035em;max-width:20ch">
                <?= htmlspecialchars($erpProcTitle, ENT_QUOTES) ?>
            </h2>
        </div>
        <?php if ($erpProcIntro !== ''): ?>
            <p itemprop="description" style="margin:0;font-size:15.5px;line-height:1.6;color:color-mix(in srgb, var(--color-text) 70%, transparent)">
                <?= htmlspecialchars($erpProcIntro, ENT_QUOTES) ?>
            </p>
        <?php endif; ?>
    </div>

    <?php /* Column count follows config rather than a hardcoded 5, so the grid
             and the "is this the last one" accent stay in step if a stage is
             added or removed. */ ?>
    <?php
    // Desktop column count. Five steps wrap 3 + 2; the padding and divider
    // logic in the loop is driven off this, so changing it re-flows the grid
    // without further edits. Declared here because the <ol> below reads it.
    $erpProcCols = 3;
    $erpProcRows = (int) ceil($erpProcCount / $erpProcCols);
    $erpProcGap  = 'clamp(24px,2.6vw,34px)';
    ?>
    <ol
        data-stack=""
        data-stack-sm=""
        data-reveal=""
        data-erp-process-steps
        style="display:grid;grid-template-columns:repeat(<?= $erpProcCols ?>,minmax(0,1fr));gap:0;margin:clamp(40px,4.5vw,68px) 0 0;padding:0;list-style:none"
    >
        <?php
        $erpProcPos = 1;
        foreach ($erpProcItems as $erpProcIndex => $erpProcItem):
            $erpProcStepNo = (int) ($erpProcItem['step'] ?? $erpProcPos);
            $erpProcName   = trim($erpProcItem['title']       ?? '');
            $erpProcText   = trim($erpProcItem['description'] ?? '');
            $erpProcDur    = trim($erpProcItem['duration']    ?? '');
            $erpProcOut    = trim($erpProcItem['outcome']     ?? '');
            $erpProcIcon   = $erpProcInlineIcon($erpProcItem['icon'] ?? null);

            $erpProcIsLast = ($erpProcIndex === $erpProcCount - 1);

            // Position within the grid, not within the list: with five steps in
            // three columns the row edges fall at 3 and 5, not at 1 and 5.
            $erpProcCol      = $erpProcIndex % $erpProcCols;
            $erpProcRow      = intdiv($erpProcIndex, $erpProcCols);
            $erpProcIsRowEnd = ($erpProcCol === $erpProcCols - 1);

            // Row 1 bleeds to the left edge, the row's last cell to the right;
            // the vertical gap is split either side of the between-rows rule so
            // it sits centred in the space rather than hard against row two.
            $erpProcPad = sprintf(
                '%s %s %s %s',
                $erpProcRow > 0 ? $erpProcGap : '0',
                $erpProcIsRowEnd ? '0' : '22px',
                $erpProcRow < $erpProcRows - 1 ? $erpProcGap : '0',
                $erpProcCol === 0 ? '0' : '22px'
            );

            // No divider on a row's last cell, and none after the final step —
            // otherwise the rule dangles into the row's empty trailing cell.
            $erpProcHasRule = !$erpProcIsRowEnd && !$erpProcIsLast;
        ?>
            <li
                class="erp-proc-col"
                data-erp-process-step
                itemprop="step"
                itemscope
                itemtype="https://schema.org/HowToStep"
                style="padding:<?= $erpProcPad ?><?= $erpProcHasRule ? ';border-right:1px solid var(--color-divider)' : '' ?><?= $erpProcRow > 0 ? ';border-top:1px solid var(--color-divider)' : '' ?>"
            >
                <meta itemprop="position" content="<?= $erpProcStepNo ?>">

                <?php /* Marker row: the design's accent square + numeral, widened to
                         carry the commissioned icon at the far end. The whole row is
                         decorative — the numeral only restates the list position, and
                         the icon is a label mark — so it is hidden from assistive
                         tech rather than read out twice. */ ?>
                <div aria-hidden="true" style="display:flex;align-items:center;gap:10px;min-height:36px">
                    <span style="width:14px;height:14px;background:var(--color-accent);display:block;flex:none"></span>
                    <span style="font-family:var(--font-heading);font-weight:700;font-size:13px;letter-spacing:0.08em"><?= sprintf('%02d', $erpProcStepNo) ?></span>
                    <?php if ($erpProcIcon !== null): ?>
                        <span class="erp-proc-icon" style="display:block;width:36px;height:36px;flex:none;margin-left:auto"><?= $erpProcIcon ?></span>
                    <?php elseif (!empty($erpProcItem['icon'])): ?>
                        <img
                            class="erp-proc-icon"
                            src="<?= asset($erpProcItem['icon']) ?>"
                            alt=""
                            width="36"
                            height="36"
                            loading="lazy"
                            decoding="async"
                            style="display:block;width:36px;height:36px;flex:none;margin-left:auto"
                        >
                    <?php endif; ?>
                </div>

                <?php /* Accent on the final stage only. */ ?>
                <?php /* Stage rule. Painted as a light track with the stage's own
                         colour riding on top as a ::after fill that wipes in on
                         hover — so the geometry is inline but the paint, the
                         transition and the hover state have to live in page CSS.
                         [data-accent] marks the closing stage, whose fill is the
                         brand blue rather than the text colour. */ ?>
                <div aria-hidden="true" data-erp-proc-rule<?= $erpProcIsLast ? ' data-accent' : '' ?>></div>

                <?php if ($erpProcName !== ''): ?>
                    <h3 itemprop="name" style="margin:20px 0 8px;font-size:19px;letter-spacing:-0.02em;line-height:1.2">
                        <?= htmlspecialchars($erpProcName, ENT_QUOTES) ?>
                    </h3>
                <?php endif; ?>

                <?php if ($erpProcDur !== ''): ?>
                    <p style="margin:0 0 16px;font-size:11px;font-weight:600;letter-spacing:0.14em;text-transform:uppercase;color:var(--color-accent-700)">
                        <?= htmlspecialchars($erpProcDur, ENT_QUOTES) ?>
                    </p>
                <?php endif; ?>

                <?php if ($erpProcText !== ''): ?>
                    <p itemprop="text" style="margin:0 0 16px;font-size:14px;line-height:1.6;color:color-mix(in srgb, var(--color-text) 76%, transparent)">
                        <?= htmlspecialchars($erpProcText, ENT_QUOTES) ?>
                    </p>
                <?php endif; ?>

                <?php /* "Key outcome" is a UI label, not config copy — it was hardcoded
                         in the previous build too. It loses its colon here because the
                         design promotes it from an inline lead-in to a block label. */ ?>
                <?php if ($erpProcOut !== ''): ?>
                    <p style="margin:0;font-size:13.5px;line-height:1.55;border-top:1px solid var(--color-divider);padding-top:12px"><span style="display:block;font-size:10px;font-weight:600;letter-spacing:0.14em;text-transform:uppercase;color:color-mix(in srgb, var(--color-text) 50%, transparent);margin-bottom:4px">Key outcome</span><?= htmlspecialchars($erpProcOut, ENT_QUOTES) ?></p>
                <?php endif; ?>
            </li>
        <?php
            $erpProcPos++;
        endforeach;
        ?>
    </ol>

    <?php
    /* The CTA map places no CTA in this section, so `process.cta` is unset in
       config and the design shows no button. The render is kept — defensively,
       and unchanged from the previous build — so adding the key later is a
       config edit rather than a template edit. */
    $erpProcCtaLabel = is_array($erpProcCta) ? trim($erpProcCta['label'] ?? '') : '';
    $erpProcCtaUrl   = is_array($erpProcCta) ? trim($erpProcCta['url']   ?? '') : '';
    ?>
    <?php if ($erpProcCtaLabel !== '' && $erpProcCtaUrl !== ''): ?>
        <div data-reveal="" style="margin-top:clamp(28px,3vw,44px)">
            <a
                href="<?= htmlspecialchars($erpProcCtaUrl, ENT_QUOTES) ?>"
                class="erp-btn erp-btn-primary"
                data-erp-cta-button
                style="padding:14px 20px;font-size:14px"
            >
                <?= htmlspecialchars($erpProcCtaLabel, ENT_QUOTES) ?>
            </a>
        </div>
    <?php endif; ?>
    </div>
</section>
