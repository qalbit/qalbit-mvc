<?php
/**
 * CRM §11 — What the CRM needs to talk to.
 *
 * Built to the approved design comp, on a white full-bleed band: one row per
 * integration family, a 240px label column against the detail.
 *
 * WHY THIS IS NOT erp/integrations.php, WHICH IT USED TO BE. The bones look the
 * same and the divergence is one decision: on the ERP page the middle block is
 * a DARK INSET PANEL, and that darkness is an argument — legacy interfaces are
 * the hard half of that section's contrast, and the panel is what makes the
 * contrast visible. This section has no contrast to make. Its three rows are
 * three families of connection, all equally routine, and the comp accordingly
 * keeps every row light and ruled the same way. Lifting the panel out would
 * have meant a flag deciding whether the middle block is dark — a page
 * conditional in a shared file. Same call as §4 and §10.
 *
 * What changed with it: the label column is a uniform 240px across all three
 * rows rather than the panel's own two-up header, and the definition terms are
 * `--color-accent-700` for a light ground instead of the `-400` the dark panel
 * needed.
 *
 * THE BAND IS WHITE, AND THAT IS WHY IT IS FULL-BLEED. `--color-raised` is a
 * step lighter than the page's own `--color-bg` off-white, so this section
 * lifts off the page between two neighbours that do not: §10 above is dark and
 * §12 below sits on the page ground. Painting a background means
 * `data-erp-bleed` is mandatory — without it the white would stop at the 85rem
 * content cap and the section would read as a floating card rather than a band.
 * `data-erp-wrap` puts the cap back on the content so the text keeps the page's
 * common left edge. Change one and you must change the other.
 *
 * No border-top: §10 above is a dark band, so the colour change is already a
 * hard boundary, and §12 below draws the next rule itself.
 *
 * ONE ROW SHAPE, THREE FILLS. A row is a title plus either `text` (a paragraph)
 * or the richer form: an optional `note` under the title, a `points` list
 * rendered as term/definition rows, and an optional `closing` pull-quote. Only
 * Communication uses the rich form, because it is the only family where the
 * specific channels are the substance rather than an example list. A fourth
 * family is a config edit and nothing else.
 *
 * `points` is a <dl>, not a styled list: the terms ARE the things being
 * defined, and each `text` completes the sentence its `term` starts. Read a row
 * aloud and it is one sentence — "Click-to-call with automatic logging, so the
 * activity record writes itself." Do not reword either half in isolation.
 *
 * Copy is config-only, from config('crm_page.integrations').
 *
 * @var array $erp  config('crm_page')
 */
$crmInt = $erp['integrations'] ?? [];
if (empty($crmInt['title']) || empty($crmInt['rows'])) {
    return;
}

$crmIntRows    = array_values($crmInt['rows']);
$crmIntLastKey = array_key_last($crmIntRows);

$crmIntLabel = 'minmax(0,240px) minmax(0,1fr)';
$crmIntProse = 'margin:0;max-width:82ch;font-size:15.5px;line-height:1.65;color:color-mix(in srgb, var(--color-text) 78%, transparent)';
?>

<section
    id="<?= htmlspecialchars($crmInt['id'] ?? 'crm-integrations', ENT_QUOTES) ?>"
    aria-labelledby="crm-integrations-heading"
    data-erp-bleed
    style="scroll-margin-top:16px;padding:clamp(56px,6.5vw,104px) clamp(20px,4.5vw,72px);background:var(--color-raised)"
>
    <div data-erp-wrap>
    <div data-stack data-reveal style="display:grid;grid-template-columns:minmax(0,1.2fr) minmax(0,0.8fr);gap:clamp(24px,3vw,56px);align-items:end">
        <div>
            <?php if (!empty($crmInt['eyebrow'])): ?>
                <p style="display:flex;align-items:center;gap:12px;margin:0;font-size:11px;font-weight:600;letter-spacing:0.22em;text-transform:uppercase;color:var(--color-accent-700)">
                    <span aria-hidden="true" style="display:block;width:32px;height:2px;background:var(--color-accent);flex:none"></span><?= htmlspecialchars($crmInt['eyebrow'], ENT_QUOTES) ?>
                </p>
            <?php endif; ?>
            <h2 id="crm-integrations-heading" style="margin:18px 0 0;font-size:clamp(32px,3.6vw,52px);line-height:1.02;letter-spacing:-0.035em;max-width:18ch">
                <?= htmlspecialchars($crmInt['title'], ENT_QUOTES) ?>
            </h2>
        </div>
        <?php if (!empty($crmInt['intro'])): ?>
            <p style="margin:0;font-size:15.5px;line-height:1.6;color:color-mix(in srgb, var(--color-text) 70%, transparent)">
                <?= htmlspecialchars($crmInt['intro'], ENT_QUOTES) ?>
            </p>
        <?php endif; ?>
    </div>

    <?php foreach ($crmIntRows as $crmIntIdx => $crmIntRow): ?>
        <?php
            // The stack opens on a heavy rule and closes on one, with hairlines
            // between — so it reads as a single ruled instrument rather than
            // three stacked blocks. The closing rule is keyed off
            // array_key_last, so a fourth family takes it down with it.
            $crmIntRule = $crmIntIdx === 0
                ? 'margin-top:clamp(36px,4vw,60px);border-top:2px solid var(--color-text);'
                : '';
            $crmIntRule .= $crmIntIdx === $crmIntLastKey
                ? 'border-bottom:2px solid var(--color-divider)'
                : 'border-bottom:1px solid var(--color-divider)';

            $crmIntPoints = $crmIntRow['points'] ?? [];
        ?>
        <div data-stack data-reveal style="display:grid;grid-template-columns:<?= $crmIntLabel ?>;gap:clamp(20px,3vw,48px);padding:26px 0;<?= $crmIntRule ?>">
            <?php if (!empty($crmIntRow['note'])): ?>
                <?php /* The note belongs in the LABEL column, under the title —
                         it qualifies the family, not any one of its channels. */ ?>
                <div>
                    <h3 style="margin:0;font-size:19px;letter-spacing:-0.02em"><?= htmlspecialchars($crmIntRow['title'] ?? '', ENT_QUOTES) ?></h3>
                    <p style="margin:10px 0 0;font-size:14px;line-height:1.6;color:color-mix(in srgb, var(--color-text) 65%, transparent)">
                        <?= htmlspecialchars($crmIntRow['note'], ENT_QUOTES) ?>
                    </p>
                </div>
            <?php else: ?>
                <h3 style="margin:0;font-size:19px;letter-spacing:-0.02em"><?= htmlspecialchars($crmIntRow['title'] ?? '', ENT_QUOTES) ?></h3>
            <?php endif; ?>

            <?php if ($crmIntPoints): ?>
                <div>
                    <dl style="margin:0;border-top:1px solid var(--color-divider)">
                        <?php foreach ($crmIntPoints as $crmIntPoint): ?>
                            <div data-stack-sm data-hov style="display:grid;grid-template-columns:minmax(0,220px) minmax(0,1fr);gap:16px;padding:16px 0;border-bottom:1px solid var(--color-divider)">
                                <dt style="font-family:var(--font-heading);font-weight:800;font-size:15px;color:var(--color-accent-700)">
                                    <?= htmlspecialchars($crmIntPoint['term'] ?? '', ENT_QUOTES) ?>
                                </dt>
                                <dd style="margin:0;font-size:15px;line-height:1.6;color:color-mix(in srgb, var(--color-text) 78%, transparent)">
                                    <?= htmlspecialchars($crmIntPoint['text'] ?? '', ENT_QUOTES) ?>
                                </dd>
                            </div>
                        <?php endforeach; ?>
                    </dl>
                    <?php if (!empty($crmIntRow['closing'])): ?>
                        <p style="margin:18px 0 0;font-size:16px;font-weight:600;line-height:1.5;border-left:4px solid var(--color-accent);padding-left:18px">
                            <?= htmlspecialchars($crmIntRow['closing'], ENT_QUOTES) ?>
                        </p>
                    <?php endif; ?>
                </div>
            <?php else: ?>
                <p style="<?= $crmIntProse ?>"><?= htmlspecialchars($crmIntRow['text'] ?? '', ENT_QUOTES) ?></p>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
    </div>
</section>
