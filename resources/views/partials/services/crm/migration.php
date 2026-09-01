<?php
/**
 * CRM §10 — Getting your data out of a commercial CRM.
 *
 * Built to the approved design comp. A dark full-bleed band of vendor rows:
 * a 220px name column against prose, hairline-ruled, closing on "The point".
 *
 * WHY THIS IS NOT erp/integrations.php, WHICH IT USED TO BE. That partial
 * renders a three-part CONTRAST — a light row, a dark inset panel, a light row
 * — and the dark panel is the argument. This section has no contrast to make:
 * three vendors, each documented the same way, all equally the point. Rendering
 * it through the contrast partial meant bending the content to fit the slots,
 * and the content lost:
 *
 *   - HubSpot filled the `modern` slot and Salesforce the `legacy` panel, so
 *     the HubSpot caveat about workflow configs not exporting had to be filed
 *     as a bullet INSIDE the Salesforce block, retitled "HubSpot workflows" to
 *     survive the move. A reader would have taken it as a Salesforce limit.
 *   - Zoho had no slot at all and became the legacy panel's closing line, so
 *     the third vendor read as a footnote to the second.
 *
 * Both are fixed here by giving each vendor a row of its own, which is what the
 * comp does. The copy moved back with them — see the config note.
 *
 * ONE ROW SHAPE, THREE FILLS. A row is a name plus body copy. Body entries are
 * either a plain paragraph or `['lead' => …, 'text' => …]` for a paragraph with
 * a bold lead-in. A row may also carry `limits`, a term/definition list, which
 * only Salesforce uses because it is the only vendor publishing hard numbers.
 * Adding a fourth vendor is a config edit and nothing else.
 *
 * THE BAND IS DARK AND FULL-BLEED. `data-erp-bleed` opts it out of the shared
 * 85rem cap so the ground reaches both viewport edges, and `data-erp-wrap`
 * puts the cap back on the content so the text keeps the page's common left
 * edge. Change one and you must change the other. Every colour inside is mixed
 * from `#f3f2f2` rather than from `--color-text`, because a rule mixed from
 * `--color-text` is invisible on a `--color-text` ground.
 *
 * The export limits below are vendor behaviour, not ours, and they change.
 * They live in config, never here, and want re-checking before each publish.
 *
 * Copy is config-only, from config('crm_page.migration').
 *
 * @var array $erp  config('crm_page')
 */
$crmMig = $erp['migration'] ?? [];
if (empty($crmMig['title']) || empty($crmMig['vendors'])) {
    return;
}

$crmMigVendors = array_values($crmMig['vendors']);
$crmMigLastKey = array_key_last($crmMigVendors);
$crmMigClosing = $crmMig['closing'] ?? [];

/* Ink mixed from the band's own light, not from --color-text. See the docblock. */
$crmMigInk    = static fn (int $pct): string => 'color-mix(in srgb, #f3f2f2 ' . $pct . '%, transparent)';
$crmMigLabel  = 'minmax(0,220px) minmax(0,1fr)';
$crmMigProse  = 'margin:0;max-width:84ch;font-size:15px;line-height:1.65;color:' . $crmMigInk(78);
?>

<section
    id="<?= htmlspecialchars($crmMig['id'] ?? 'crm-migration', ENT_QUOTES) ?>"
    aria-labelledby="crm-migration-heading"
    data-erp-bleed
    style="scroll-margin-top:16px;padding:clamp(56px,6.5vw,104px) clamp(20px,4.5vw,72px);background:var(--color-text);color:#f3f2f2"
>
    <div data-erp-wrap>
    <div data-stack data-reveal style="display:grid;grid-template-columns:minmax(0,1.2fr) minmax(0,0.8fr);gap:clamp(24px,3vw,56px);align-items:end">
        <div>
            <?php if (!empty($crmMig['eyebrow'])): ?>
                <p style="display:flex;align-items:center;gap:12px;margin:0;font-size:11px;font-weight:600;letter-spacing:0.22em;text-transform:uppercase;color:var(--color-accent-400)">
                    <span aria-hidden="true" style="display:block;width:32px;height:2px;background:var(--color-accent);flex:none"></span><?= htmlspecialchars($crmMig['eyebrow'], ENT_QUOTES) ?>
                </p>
            <?php endif; ?>
            <h2 id="crm-migration-heading" style="margin:18px 0 0;font-size:clamp(32px,3.8vw,54px);line-height:1;letter-spacing:-0.038em;color:#f3f2f2;max-width:20ch">
                <?= htmlspecialchars($crmMig['title'], ENT_QUOTES) ?>
            </h2>
        </div>
        <?php if (!empty($crmMig['intro'])): ?>
            <p style="margin:0;font-size:15.5px;line-height:1.6;color:<?= $crmMigInk(70) ?>">
                <?= htmlspecialchars($crmMig['intro'], ENT_QUOTES) ?>
            </p>
        <?php endif; ?>
    </div>

    <div data-reveal style="margin-top:clamp(36px,4vw,60px);border-top:2px solid <?= $crmMigInk(45) ?>">
        <?php foreach ($crmMigVendors as $crmMigIdx => $crmMigVendor): ?>
            <?php
                // The last row closes the stack on the same 2px rule it opens
                // with. Keyed off array_key_last, so a fourth vendor takes the
                // closing rule down with it rather than leaving it stranded.
                $crmMigRule = $crmMigIdx === $crmMigLastKey ? '2px solid ' . $crmMigInk(45) : '1px solid ' . $crmMigInk(22);
                $crmMigBody = array_values($crmMigVendor['body'] ?? []);
            ?>
            <article data-stack style="display:grid;grid-template-columns:<?= $crmMigLabel ?>;gap:clamp(20px,3vw,48px);padding:26px 0;border-bottom:<?= $crmMigRule ?>">
                <h3 style="margin:0;font-size:clamp(22px,2.2vw,30px);letter-spacing:-0.028em;line-height:1.05;color:#f3f2f2">
                    <?= htmlspecialchars($crmMigVendor['name'] ?? '', ENT_QUOTES) ?>
                </h3>
                <div>
                    <?php foreach ($crmMigBody as $crmMigParaIdx => $crmMigPara): ?>
                        <p style="<?= $crmMigProse ?><?= $crmMigParaIdx > 0 ? ';margin-top:14px' : '' ?>">
                            <?php if (is_array($crmMigPara)): ?>
                                <?php /* Bold lead-in. It carries an explicit colour
                                         because the surrounding copy is muted to 78%
                                         and weight alone does not separate from it on
                                         a dark ground. */ ?>
                                <strong style="color:#f3f2f2"><?= htmlspecialchars($crmMigPara['lead'] ?? '', ENT_QUOTES) ?></strong>
                                <?= htmlspecialchars(' ' . ($crmMigPara['text'] ?? ''), ENT_QUOTES) ?>
                            <?php else: ?>
                                <?= htmlspecialchars((string) $crmMigPara, ENT_QUOTES) ?>
                            <?php endif; ?>
                        </p>
                    <?php endforeach; ?>

                    <?php /* Published limits as a definition list — the terms are
                             the things being limited, so dt/dd is the honest
                             markup, not a styling choice. */ ?>
                    <?php if (!empty($crmMigVendor['limits'])): ?>
                        <dl style="margin:18px 0 0">
                            <?php foreach ($crmMigVendor['limits'] as $crmMigLimit): ?>
                                <div data-stack-sm style="display:grid;grid-template-columns:<?= $crmMigLabel ?>;gap:16px;padding:14px 0;border-top:1px solid <?= $crmMigInk(20) ?>">
                                    <dt style="font-family:var(--font-heading);font-weight:800;font-size:15px;color:var(--color-accent-400)">
                                        <?= htmlspecialchars($crmMigLimit['term'] ?? '', ENT_QUOTES) ?>
                                    </dt>
                                    <dd style="margin:0;font-size:15px;line-height:1.6;color:<?= $crmMigInk(78) ?>">
                                        <?= htmlspecialchars($crmMigLimit['text'] ?? '', ENT_QUOTES) ?>
                                    </dd>
                                </div>
                            <?php endforeach; ?>
                        </dl>
                    <?php endif; ?>
                </div>
            </article>
        <?php endforeach; ?>
    </div>

    <?php /* The closing sits on the SAME 220px column as the vendor rows, so it
             reads as the last line of the same instrument rather than as a new
             block bolted underneath. */ ?>
    <?php if (!empty($crmMigClosing['text'])): ?>
        <div data-stack data-reveal style="display:grid;grid-template-columns:<?= $crmMigLabel ?>;gap:clamp(20px,3vw,48px);margin-top:28px">
            <?php if (!empty($crmMigClosing['title'])): ?>
                <h3 style="margin:0;font-size:clamp(20px,1.9vw,26px);letter-spacing:-0.025em;color:#f3f2f2">
                    <?= htmlspecialchars($crmMigClosing['title'], ENT_QUOTES) ?>
                </h3>
            <?php endif; ?>
            <p style="margin:0;max-width:84ch;font-size:16px;font-weight:600;line-height:1.6;border-left:4px solid var(--color-accent);padding-left:18px">
                <?= htmlspecialchars($crmMigClosing['text'], ENT_QUOTES) ?>
            </p>
        </div>
    <?php endif; ?>
    </div>
</section>
