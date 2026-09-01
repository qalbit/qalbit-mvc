<?php
/**
 * CRM §4 — When you should buy instead.
 *
 * Built to the approved design comp for this section.
 *
 * WHY THIS IS A FORK OF erp/build-vs-buy.php AND NOT MORE PROPS ON IT.
 * It was props, briefly: `order` to lead with the buy column and `ecosystem`
 * for the trailing argument. The comp then moved almost every measurement this
 * section has — the header column ratio and heading scale, the ledger's top
 * rule from divider to text, the ground from a full-bleed surface band to plain
 * page ground, the ecosystem from a one-column block to a two-column row, and
 * the closing line from a standalone paragraph into that row as a pull-quote.
 *
 * Expressing that through optional props would have meant roughly eight more
 * flags, or one `variant` flag — which is a page conditional in a shared
 * partial, the one thing the CRM page's template docblock promises none of
 * these files contain. Forking one file was the smaller cost, and it let
 * erp/build-vs-buy.php go back to exactly what it was before the CRM page
 * existed. If you are tempted to re-merge them, read that file's docblock
 * first: the ERP section is still a full-bleed surface band and still leads
 * with the build column, and neither is negotiable there.
 *
 * WHAT THE TWO FILES STILL AGREE ON, and what you must not break here:
 *
 *   ONE SPLIT PANEL, NOT TWO CARDS. A single 2px rule runs across the top of
 *   both lists and a single hairline runs between them, so the ledger reads as
 *   one instrument with two sides rather than a pros box and a cons box.
 *
 *   STRUCTURAL EQUAL WEIGHT IS A HARD REQUIREMENT. Both columns get the same
 *   heading level, type scale, 18px row rhythm, `<ol>` markup and numbering.
 *   The only distinction is the marker treatment, and it is a *state*
 *   distinction, not a quality one. Do not shrink one heading, drop one side's
 *   numbering, fill a background or add a "recommended" badge. The columns read
 *   as a straight ledger; that is the whole credibility move of the section.
 *
 * WHERE THE ACCENT SITS, AND WHY IT IS NOT WHERE THE ERP PAGE PUTS IT.
 * The ERP ledger leads with build and marks build in accent. Here the comp
 * leads with BUY — the heading is "When you should buy instead", so leading
 * with "Custom wins when" would read against it — but keeps the accent marker
 * and accent numerals on CUSTOM, and gives buy the outline square and 45%-muted
 * numerals. An earlier build swapped the markers along with the columns; that
 * was wrong. Position carries the argument, the accent carries the side of the
 * business we are on, and the section is honest precisely because those two
 * point in opposite directions. Do not "fix" the mismatch.
 *
 * The divider trap is the same one the ERP file names: the columns carry it as
 * `border-right` on the first plus asymmetric 40px padding. Inline styles
 * cannot unwind that at the `[data-stack]` breakpoint, so both columns carry
 * `data-erp-bvb-col` for the integrator rule in app.css to reset against.
 *
 * Copy is config-only, from config('crm_page.build_vs_buy').
 *
 * @var array $erp  config('crm_page')
 */
$crmBvb = $erp['build_vs_buy'] ?? [];
if (empty($crmBvb['title'])) {
    return;
}

/**
 * Both sides described as data so the row loop is written once. `marker` and
 * `index` are style fragments, not colour names: they are emitted verbatim into
 * inline `style` attributes and contain no user input.
 *
 * Order is fixed here rather than read from config — see the accent note above.
 * Buy occupies the first slot (bleeds left, carries the divider) and keeps the
 * outline marker; custom occupies the second and keeps the accent.
 */
$crmBvbColumns = [
    [
        'title'  => $crmBvb['buy_title'] ?? '',
        'items'  => $crmBvb['buy_items'] ?? [],
        'pad'    => 'padding:28px 40px 28px 0;border-right:1px solid var(--color-divider)',
        'marker' => 'width:12px;height:12px;border:2px solid var(--color-text);display:block',
        'index'  => 'color:color-mix(in srgb, var(--color-text) 45%, transparent)',
    ],
    [
        'title'  => $crmBvb['build_title'] ?? '',
        'items'  => $crmBvb['build_items'] ?? [],
        'pad'    => 'padding:28px 0 28px 40px',
        'marker' => 'width:12px;height:12px;background:var(--color-accent);display:block',
        'index'  => 'color:var(--color-accent)',
    ],
];

$crmBvbEco     = $crmBvb['ecosystem'] ?? [];
$crmBvbEcoBody = array_values($crmBvbEco['body'] ?? []);
?>

<?php /* No background and no data-erp-bleed, unlike the ERP section. §3 above
         is a full-bleed surface band, so its bottom edge is already the rule
         between the two; adding a border-top here would double it. */ ?>
<section
    id="<?= htmlspecialchars($crmBvb['id'] ?? 'when-to-buy-a-crm', ENT_QUOTES) ?>"
    aria-labelledby="crm-build-vs-buy-heading"
    style="scroll-margin-top:16px;padding:clamp(56px,6.5vw,104px) clamp(20px,4.5vw,72px)"
>
    <div data-stack data-reveal style="display:grid;grid-template-columns:minmax(0,1.25fr) minmax(0,0.75fr);gap:clamp(24px,3vw,56px);align-items:end">
        <div>
            <?php if (!empty($crmBvb['eyebrow'])): ?>
                <p style="display:flex;align-items:center;gap:12px;margin:0;font-size:11px;font-weight:600;letter-spacing:0.22em;text-transform:uppercase;color:var(--color-accent-700)">
                    <span aria-hidden="true" style="display:block;width:32px;height:2px;background:var(--color-accent);flex:none"></span><?= htmlspecialchars($crmBvb['eyebrow'], ENT_QUOTES) ?>
                </p>
            <?php endif; ?>
            <h2 id="crm-build-vs-buy-heading" style="margin:18px 0 0;font-size:clamp(32px,3.8vw,56px);line-height:1;letter-spacing:-0.038em;max-width:16ch">
                <?= htmlspecialchars($crmBvb['title'], ENT_QUOTES) ?>
            </h2>
        </div>
        <?php if (!empty($crmBvb['intro'])): ?>
            <p style="margin:0;font-size:15.5px;line-height:1.6;color:color-mix(in srgb, var(--color-text) 72%, transparent)">
                <?= htmlspecialchars($crmBvb['intro'], ENT_QUOTES) ?>
            </p>
        <?php endif; ?>
    </div>

    <div data-stack data-reveal style="display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:0;margin-top:clamp(36px,4vw,60px);border-top:2px solid var(--color-text)">
        <?php foreach ($crmBvbColumns as $crmBvbCol): ?>
            <?php if (empty($crmBvbCol['items'])) { continue; } ?>
            <?php $crmBvbLast = array_key_last($crmBvbCol['items']); ?>
            <section data-erp-bvb-col aria-label="<?= htmlspecialchars($crmBvbCol['title'], ENT_QUOTES) ?>" style="<?= $crmBvbCol['pad'] ?>">
                <h3 style="display:flex;align-items:center;gap:12px;margin:0 0 4px;font-size:15px;letter-spacing:0.06em;text-transform:uppercase">
                    <span aria-hidden="true" style="<?= $crmBvbCol['marker'] ?>;flex:none"></span><?= htmlspecialchars($crmBvbCol['title'], ENT_QUOTES) ?>
                </h3>
                <ol style="margin:0;padding:0;list-style:none">
                    <?php foreach ($crmBvbCol['items'] as $crmBvbIndex => $crmBvbItem): ?>
                        <li style="display:grid;grid-template-columns:34px minmax(0,1fr);gap:14px;padding:18px 0<?= $crmBvbIndex === $crmBvbLast ? '' : ';border-bottom:1px solid var(--color-divider)' ?>">
                            <span aria-hidden="true" style="font-family:var(--font-heading);font-weight:800;font-size:13px;<?= $crmBvbCol['index'] ?>"><?= str_pad((string) ((int) $crmBvbIndex + 1), 2, '0', STR_PAD_LEFT) ?></span>
                            <span style="font-size:15px;line-height:1.6"><?= htmlspecialchars($crmBvbItem, ENT_QUOTES) ?></span>
                        </li>
                    <?php endforeach; ?>
                </ol>
            </section>
        <?php endforeach; ?>
    </div>

    <?php /* The case FOR the commercial ecosystem — the most credibility-carrying
             copy in this section precisely because it argues against us. The
             comp sets it as a two-column row: the concession as a heading on the
             left, the substance on the right, and the closing line as a
             pull-quote at the foot of that column rather than as its own block.

             The first ecosystem paragraph is the accent lead-in and the rest is
             body. That is a decision about position, not about the sentence, so
             it is derived from the index rather than flagged in config — same
             handling as the §3 intro. */ ?>
    <?php if (!empty($crmBvbEco['title'])): ?>
        <div data-stack data-reveal style="display:grid;grid-template-columns:minmax(0,0.85fr) minmax(0,1.15fr);gap:clamp(24px,3vw,52px);align-items:start;margin-top:clamp(32px,3.5vw,52px);border-top:2px solid var(--color-divider);padding-top:30px">
            <h3 style="margin:0;font-size:clamp(22px,2.3vw,32px);letter-spacing:-0.028em;line-height:1.08">
                <?= htmlspecialchars($crmBvbEco['title'], ENT_QUOTES) ?>
            </h3>
            <div>
                <?php foreach ($crmBvbEcoBody as $crmBvbEcoIdx => $crmBvbEcoPara): ?>
                    <?php if ($crmBvbEcoIdx === 0): ?>
                        <p style="margin:0;font-size:14px;font-weight:600;letter-spacing:0.02em;color:var(--color-accent-700)">
                            <?= htmlspecialchars($crmBvbEcoPara, ENT_QUOTES) ?>
                        </p>
                    <?php else: ?>
                        <p style="margin:14px 0 0;font-size:15.5px;line-height:1.65;color:color-mix(in srgb, var(--color-text) 78%, transparent)">
                            <?= htmlspecialchars($crmBvbEcoPara, ENT_QUOTES) ?>
                        </p>
                    <?php endif; ?>
                <?php endforeach; ?>

                <?php if (!empty($crmBvb['closing'])): ?>
                    <p style="margin:20px 0 0;font-size:clamp(17px,1.5vw,21px);font-weight:600;line-height:1.45;letter-spacing:-0.015em;border-left:4px solid var(--color-accent);padding-left:18px">
                        <?= htmlspecialchars($crmBvb['closing'], ENT_QUOTES) ?>
                    </p>
                <?php endif; ?>
            </div>
        </div>
    <?php elseif (!empty($crmBvb['closing'])): ?>
        <p data-reveal style="margin:36px 0 0;max-width:70ch;border-top:2px solid var(--color-text);padding-top:20px;font-size:clamp(16px,1.4vw,19px);font-weight:600;line-height:1.5;letter-spacing:-0.015em">
            <?= htmlspecialchars($crmBvb['closing'], ENT_QUOTES) ?>
        </p>
    <?php endif; ?>
</section>
