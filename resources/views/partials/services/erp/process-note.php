<?php
/**
 * ERP §7 — sourced note published beneath the five process stages.
 *
 * Kept as its own partial rather than folded into process.php: it is the one
 * piece of §7 whose copy lives in config/erp_page.php instead of
 * config/services.php, and splitting it is what let the 20 pages sharing
 * service-process.php stay untouched when this page grew its own note. That
 * reason still holds, so the split survives the redesign.
 *
 * The sample size is part of the citation and must stay visible: the document
 * is explicit that a headline "ERP failure rate" must never be published.
 *
 * In the new design this is the accent-bordered block that closes the process
 * section, so it has to look like part of that section rather than a new one.
 * Three things do that, and all three are load-bearing:
 *
 *   1. It repeats §7's ground (`--color-surface`) and its horizontal padding
 *      token, so there is no seam where the <section> above actually ends.
 *   2. It carries NO top rule and NO top padding. A hairline here read as a
 *      stray line between two blocks of the same colour.
 *   3. It carries the section's remaining bottom padding. process.php stops at
 *      `clamp(36px,4vw,60px)` — the design's gap above this note — and the full
 *      `clamp(56px,6.5vw,104px)` lands here. Edit one and edit the other; if
 *      this partial ever returns early, §7 closes on the shorter padding.
 *
 * `<cite>` is un-italicised inline rather than by class: this block has no other
 * CSS of its own and adding a class for one declaration would have been the
 * only rule in the file's stylesheet neighbourhood.
 *
 * @var array $erp  config('erp_page')
 */
$erpNote = $erp['process_note'] ?? [];
if (empty($erpNote['text'])) {
    return;
}
?>
<div data-erp-process-note data-erp-bleed style="background:var(--color-surface);padding:0 clamp(20px,4.5vw,72px) clamp(56px,6.5vw,104px)">
    <div data-erp-wrap>
    <div data-reveal="" style="max-width:76ch;border-left:4px solid var(--color-accent);padding-left:22px">
        <p style="margin:0;font-size:15.5px;line-height:1.65">
            <?= htmlspecialchars($erpNote['text'], ENT_QUOTES) ?>
        </p>
        <?php if (!empty($erpNote['citation'])): ?>
            <p style="margin:12px 0 0;font-size:12px;color:color-mix(in srgb, var(--color-text) 55%, transparent)">
                <cite style="font-style:normal"><?= htmlspecialchars($erpNote['citation'], ENT_QUOTES) ?></cite>
            </p>
        <?php endif; ?>
        </div>
    </div>
</div>
