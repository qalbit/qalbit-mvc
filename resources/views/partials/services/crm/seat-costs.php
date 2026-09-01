<?php
/**
 * CRM §3 — What a commercial CRM seat actually costs.
 *
 * Built to the approved design comp for this section. The section sits on
 * `--color-surface`, EDGE TO EDGE, so it separates from the plain-ground
 * sections either side of it without a filled accent block; it carries the
 * page's only dark panel outside the CTA bands. See the data-erp-bleed note
 * above the <section> for how the tint escapes the shared content cap.
 *
 * WHY THIS IS NOT partials/services/erp/comparison.php. That file is a cost
 * MODEL for one specific table: fixed five-year totals, one rate per row,
 * headers driven by the slider. This section needs a static 6x3 tier matrix AND
 * a separate four-row model with per-row spans and a flat fee. Bolting both
 * onto that file would have made the ERP table conditional on flags it never
 * sets. What IS shared is the slider engine in public/assets/js/erp-page.js —
 * see the seat-model note below.
 *
 * THE TABLE SCROLLS, IT DOES NOT REFLOW TO CARDS. This reverses an earlier
 * build. Four columns of tier names and prices do not fit 375px at a readable
 * size, and the reflow that solved that turned every price into its own labelled
 * row — which is exactly the comparison the reader came for, taken apart. The
 * comp makes the same call the ERP comparison table does: `overflow-x:auto` on a
 * wrapper, `min-width` on the table, reader swipes, columns stay columns.
 *
 * That reversal is why there are no role="table"/"row"/"cell" attributes here
 * any more. They were load-bearing ONLY because the old reflow set
 * `display:block`, which strips a table's implicit semantics. Nothing changes
 * `display` now, so the native semantics hold and the explicit roles would be
 * redundant ARIA. The matching reflow rules were removed from app.css with them.
 *
 * NO VENDOR LOGOS, TEXT ONLY. Salesforce, HubSpot, Zoho, Microsoft, Freshworks
 * and monday are trademarks whose usage terms restrict comparative contexts,
 * and this section is explicitly comparative. Same rule the ERP page follows.
 *
 * PIPEDRIVE IS ABSENT DELIBERATELY. 2026 sources conflict, and a section whose
 * entire credibility rests on accurate published pricing cannot carry one
 * guessed number. Do not add it back without a vendor-page citation.
 *
 * Every figure here is a vendor's own published price. None is ours — this page
 * publishes no price for QalbIT's services, by decision, and §6 argues why.
 *
 * Copy is config-only, from config('crm_page.seat_costs').
 *
 * @var array $erp  config('crm_page')
 */
$crmSeat = $erp['seat_costs'] ?? [];
if (empty($crmSeat['title']) || empty($crmSeat['rows'])) {
    return;
}

$crmSeatCols   = $crmSeat['columns'] ?? [];
$crmSeatRows   = array_values($crmSeat['rows'] ?? []);
$crmSeatCta    = $erp['inline_ctas']['tco'] ?? null;
$crmSeatArith  = $crmSeat['arithmetic'] ?? [];
$crmSeatLastCol = count($crmSeatCols) - 1;

// Style fragments, emitted verbatim into inline `style` attributes. No user
// input reaches any of them.
$crmSeatHeadCell = 'font-size:10px;font-weight:600;letter-spacing:0.16em;text-transform:uppercase';
$crmSeatTierName = 'display:block;font-size:11px;letter-spacing:0.1em;text-transform:uppercase;color:color-mix(in srgb, var(--color-text) 55%, transparent)';
$crmSeatPrice    = 'display:block;margin-top:4px;font-family:var(--font-heading);font-weight:800;font-size:26px;letter-spacing:-0.03em;font-variant-numeric:tabular-nums';

/**
 * One tier cell: a list of products, because Salesforce Mid and Top and Zoho Mid
 * each carry two. Stacked lines rather than one wrapping run.
 *
 * `$crmSeatIsTop` tints the prices accent. The comp accents the whole Top
 * column — header, rule and figures — so the eye lands on the number the
 * section is arguing about rather than on the cheapest one.
 */
$crmSeatCell = static function (array $crmSeatProducts, bool $crmSeatIsTop) use ($crmSeatTierName, $crmSeatPrice): void {
    foreach ($crmSeatProducts as $crmSeatIdx => $crmSeatProduct) {
        $crmSeatName  = $crmSeatProduct['name'] ?? '';
        $crmSeatValue = (!empty($crmSeatProduct['approx']) ? '~' : '') . ($crmSeatProduct['price'] ?? '');
        $crmSeatNote  = $crmSeatProduct['note'] ?? null;
        ?>
        <span style="<?= $crmSeatTierName ?><?= $crmSeatIdx > 0 ? ';margin-top:12px' : '' ?>"><?= htmlspecialchars($crmSeatName, ENT_QUOTES) ?></span>
        <span style="<?= $crmSeatPrice ?><?= $crmSeatIsTop ? ';color:var(--color-accent)' : '' ?>"><?= htmlspecialchars($crmSeatValue, ENT_QUOTES) ?></span>
        <?php if ($crmSeatNote): ?>
            <span style="display:block;margin-top:6px;font-size:11.5px;color:color-mix(in srgb, var(--color-text) 60%, transparent)"><?= htmlspecialchars($crmSeatNote, ENT_QUOTES) ?></span>
        <?php endif;
    }
};
?>

<?php /* data-erp-bleed + data-erp-wrap: this section paints its own background,
         so it opts out of the 85rem cap that .erp-page > section applies and
         the cap moves inward to the wrapper. Without the pair the tint would
         stop at the content column instead of reaching both viewport edges.
         The wrapper reproduces the SAME content box the capped sections get,
         so the text still lines up with §2 above and §4 below. */ ?>
<section
    id="<?= htmlspecialchars($crmSeat['id'] ?? 'commercial-crm-seat-cost', ENT_QUOTES) ?>"
    aria-labelledby="crm-seat-heading"
    data-erp-bleed
    style="scroll-margin-top:16px;padding:clamp(56px,6.5vw,104px) clamp(20px,4.5vw,72px);border-top:2px solid var(--color-divider);background:var(--color-surface)"
>
    <div data-erp-wrap>
    <div data-stack="" data-reveal="" style="display:grid;grid-template-columns:minmax(0,1.15fr) minmax(0,0.85fr);gap:clamp(24px,3vw,56px);align-items:end">
        <div>
            <?php if (!empty($crmSeat['eyebrow'])): ?>
                <p style="display:flex;align-items:center;gap:12px;margin:0;font-size:11px;font-weight:600;letter-spacing:0.22em;text-transform:uppercase;color:var(--color-accent-700)">
                    <span aria-hidden="true" style="display:block;width:32px;height:2px;background:var(--color-accent);flex:none"></span><?= htmlspecialchars($crmSeat['eyebrow'], ENT_QUOTES) ?>
                </p>
            <?php endif; ?>
            <h2 id="crm-seat-heading" style="margin:18px 0 0;font-size:clamp(32px,3.8vw,56px);line-height:1;letter-spacing:-0.038em;max-width:18ch">
                <?= htmlspecialchars($crmSeat['title'], ENT_QUOTES) ?>
            </h2>
        </div>
        <?php if (!empty($crmSeat['intro'])): ?>
            <?php /* The comp sets the LAST intro paragraph as a bold lead-out
                     into the table ("Here's what they publish.") and the rest as
                     body copy. That is a rendering decision about position, not
                     about the sentence, so it is derived from the index rather
                     than flagged in config. */ ?>
            <?php $crmSeatIntro = array_values($crmSeat['intro']); $crmSeatIntroLast = count($crmSeatIntro) - 1; ?>
            <div>
                <?php foreach ($crmSeatIntro as $crmSeatIntroIdx => $crmSeatIntroPara): ?>
                    <?php if ($crmSeatIntroIdx === $crmSeatIntroLast && $crmSeatIntroLast > 0): ?>
                        <p style="margin:12px 0 0;font-size:16px;font-weight:600"><?= htmlspecialchars($crmSeatIntroPara, ENT_QUOTES) ?></p>
                    <?php else: ?>
                        <p style="margin:<?= $crmSeatIntroIdx > 0 ? '12px' : '0' ?> 0 0;font-size:15px;line-height:1.6;color:color-mix(in srgb, var(--color-text) 72%, transparent)">
                            <?= htmlspecialchars($crmSeatIntroPara, ENT_QUOTES) ?>
                        </p>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <?php if (!empty($crmSeat['table_note'])): ?>
        <p data-reveal style="margin:clamp(28px,3vw,44px) 0 0;font-size:11px;font-weight:600;letter-spacing:0.16em;text-transform:uppercase;color:color-mix(in srgb, var(--color-text) 55%, transparent)">
            <?= htmlspecialchars($crmSeat['table_note'], ENT_QUOTES) ?>
        </p>
    <?php endif; ?>

    <?php /* Scroll wrapper, not a reflow. See the docblock before changing it —
             the roles this table no longer carries were tied to the reflow. */ ?>
    <?php /* --erp-scroller-ground is set explicitly here because this section
             sits on --color-surface, not the page ground the rule defaults to.
             Get it wrong and the fade reads as a stripe. */ ?>
    <div data-erp-scroller data-reveal style="--erp-scroller-ground:var(--color-surface);overflow-x:auto;margin-top:14px">
        <table style="width:100%;border-collapse:collapse;text-align:left;min-width:860px">
            <caption class="sr-only"><?= htmlspecialchars($crmSeat['table_caption'] ?? $crmSeat['title'], ENT_QUOTES) ?></caption>
            <thead>
                <tr>
                    <th scope="col" style="<?= $crmSeatHeadCell ?>;padding:14px 20px 12px 0;width:22%;color:color-mix(in srgb, var(--color-text) 60%, transparent);border-bottom:2px solid var(--color-text)">Vendor</th>
                    <?php foreach ($crmSeatCols as $crmSeatColIdx => $crmSeatCol): ?>
                        <?php $crmSeatIsTop = $crmSeatColIdx === $crmSeatLastCol; ?>
                        <th
                            scope="col"
                            style="<?= $crmSeatHeadCell ?>;padding:14px <?= $crmSeatIsTop ? '0 12px 20px' : '20px 12px' ?>;<?= $crmSeatIsTop
                                ? 'color:var(--color-accent-700);border-bottom:2px solid var(--color-accent)'
                                : 'color:color-mix(in srgb, var(--color-text) 60%, transparent);border-bottom:2px solid var(--color-text)' ?>"
                        ><?= htmlspecialchars($crmSeatCol, ENT_QUOTES) ?></th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($crmSeatRows as $crmSeatRowIdx => $crmSeatRow): ?>
                    <?php
                        // The last row closes the table on the same 2px rule the
                        // header opens it with, so the matrix reads as one block.
                        $crmSeatRule = $crmSeatRowIdx === count($crmSeatRows) - 1
                            ? 'border-bottom:2px solid var(--color-text)'
                            : 'border-bottom:1px solid var(--color-divider)';

                        // Two-part vendor names break onto two lines in the comp.
                        // Same words as `vendor`; only the line break differs.
                        $crmSeatLines = $crmSeatRow['vendor_lines'] ?? [$crmSeatRow['vendor'] ?? ''];
                    ?>
                    <tr data-hov="">
                        <th scope="row" style="padding:20px 20px 20px 0;<?= $crmSeatRule ?>;text-align:left;vertical-align:top;font-family:var(--font-heading);font-weight:800;font-size:17px;letter-spacing:-0.015em;line-height:1.2">
                            <?= implode('<br>', array_map(static fn ($crmSeatLine) => htmlspecialchars((string) $crmSeatLine, ENT_QUOTES), $crmSeatLines)) ?>
                        </th>
                        <?php foreach (($crmSeatRow['tiers'] ?? []) as $crmSeatTierIdx => $crmSeatTier): ?>
                            <?php $crmSeatIsTop = $crmSeatTierIdx === $crmSeatLastCol; ?>
                            <td style="padding:20px <?= $crmSeatIsTop ? '0 20px 20px' : '20px' ?>;<?= $crmSeatRule ?>;vertical-align:top">
                                <?php $crmSeatCell($crmSeatTier, $crmSeatIsTop); ?>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php if (!empty($crmSeat['sources'])): ?>
        <p data-reveal style="margin:16px 0 0;max-width:100ch;font-size:12.5px;line-height:1.55;color:color-mix(in srgb, var(--color-text) 58%, transparent)">
            <?= htmlspecialchars($crmSeat['sources'], ENT_QUOTES) ?>
        </p>
    <?php endif; ?>

    <?php /* The four hidden costs: a numbered two-up ledger, not prose. The
             numerals are decoration over an <ol> that already numbers itself,
             hence aria-hidden — a screen reader announces "1." either way. */ ?>
    <?php if (!empty($crmSeat['hidden'])): ?>
        <?php $crmSeatHidden = array_values($crmSeat['hidden']); $crmSeatHiddenCount = count($crmSeatHidden); ?>
        <?php if (!empty($crmSeat['hidden_title'])): ?>
            <h3 data-reveal style="margin:clamp(40px,4.5vw,68px) 0 0;font-size:clamp(22px,2.2vw,30px);letter-spacing:-0.025em">
                <?= htmlspecialchars($crmSeat['hidden_title'], ENT_QUOTES) ?>
            </h3>
        <?php endif; ?>
        <ol data-stack-sm="" data-reveal="" style="display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:0;margin:28px 0 0;padding:0;list-style:none;border-top:2px solid var(--color-text)">
            <?php foreach ($crmSeatHidden as $crmSeatHiddenIdx => $crmSeatItem): ?>
                <?php
                    $crmSeatIsLeft   = $crmSeatHiddenIdx % 2 === 0;
                    // Bottom row closes on the heavier rule; the divider between
                    // the two rows stays hairline.
                    $crmSeatIsBottom = $crmSeatHiddenIdx >= $crmSeatHiddenCount - 2;
                ?>
                <li
                    data-crm-seat-hidden-col
                    style="display:grid;grid-template-columns:40px minmax(0,1fr);gap:16px;padding:24px <?= $crmSeatIsLeft ? '32px 24px 0' : '0 24px 32px' ?>;<?= $crmSeatIsLeft ? 'border-right:1px solid var(--color-divider);' : '' ?>border-bottom:<?= $crmSeatIsBottom ? '2px' : '1px' ?> solid var(--color-divider)"
                >
                    <span aria-hidden="true" style="font-family:var(--font-heading);font-weight:800;font-size:14px;color:var(--color-accent)"><?= str_pad((string) ($crmSeatHiddenIdx + 1), 2, '0', STR_PAD_LEFT) ?></span>
                    <p style="margin:0;font-size:14.5px;line-height:1.62;color:color-mix(in srgb, var(--color-text) 78%, transparent)">
                        <strong style="color:var(--color-text)"><?= htmlspecialchars($crmSeatItem['lead'] ?? '', ENT_QUOTES) ?></strong>
                        <?= htmlspecialchars(' ' . ($crmSeatItem['text'] ?? ''), ENT_QUOTES) ?>
                    </p>
                </li>
            <?php endforeach; ?>
        </ol>
    <?php endif; ?>

    <?php /* ------------------------------------------------------------------
             The seat model. Dark panel, and the page's strongest numbers.
             Rendered here at the config default seat count, so the figures are
             already correct with JS blocked; the slider in erp-page.js only
             re-renders them. `data-erp-cost` carries the vendor's published
             per-seat monthly rate, `-months` the span and `-plus` a flat
             one-off. That contract is shared with the ERP comparison table,
             which omits the last two and gets 60 months and no fee.
             ------------------------------------------------------------------ */ ?>
    <?php if (!empty($crmSeatArith['rows'])): ?>
        <?php
            $crmSeatSeats = (int) ($crmSeatArith['seats_now'] ?? 25);
            $crmSeatDark  = 'color-mix(in srgb, #f3f2f2 %d%%, transparent)';
        ?>
        <div data-reveal style="margin-top:clamp(40px,4.5vw,68px);background:var(--color-text);color:#f3f2f2;padding:clamp(28px,3vw,44px)">
            <div data-stack="" style="display:grid;grid-template-columns:minmax(0,0.9fr) minmax(0,1.1fr);gap:clamp(24px,3vw,52px);align-items:start">
                <div>
                    <?php if (!empty($crmSeatArith['title'])): ?>
                        <h3 style="margin:0;font-size:clamp(24px,2.6vw,36px);letter-spacing:-0.03em;line-height:1.05;color:#f3f2f2">
                            <?= htmlspecialchars($crmSeatArith['title'], ENT_QUOTES) ?>
                        </h3>
                    <?php endif; ?>

                    <label data-crm-seat-slider style="display:block;margin-top:26px">
                        <span style="display:block;font-size:10px;font-weight:600;letter-spacing:0.18em;text-transform:uppercase;color:var(--color-accent-400)">
                            <?= htmlspecialchars($crmSeatArith['seats_label'] ?? 'Seats on the licence', ENT_QUOTES) ?>
                        </span>
                        <span style="display:flex;align-items:baseline;gap:10px;margin-top:8px">
                            <span data-erp-users-out style="font-family:var(--font-heading);font-weight:800;font-size:clamp(44px,5vw,72px);line-height:1;letter-spacing:-0.045em;font-variant-numeric:tabular-nums"><?= htmlspecialchars(number_format($crmSeatSeats), ENT_QUOTES) ?></span>
                            <span style="font-size:13px;font-weight:600;letter-spacing:0.08em;text-transform:uppercase;color:<?= sprintf($crmSeatDark, 60) ?>">
                                <?= htmlspecialchars($crmSeatArith['seats_unit'] ?? 'people', ENT_QUOTES) ?>
                            </span>
                        </span>
                        <input
                            type="range"
                            data-erp-users-input
                            min="<?= (int) ($crmSeatArith['seats_min'] ?? 3) ?>"
                            max="<?= (int) ($crmSeatArith['seats_max'] ?? 100) ?>"
                            step="1"
                            value="<?= $crmSeatSeats ?>"
                            aria-label="Number of CRM seats"
                            aria-valuetext="<?= $crmSeatSeats ?> users"
                            style="width:100%;margin-top:18px"
                        >
                    </label>

                    <?php if (!empty($crmSeatArith['seats_hint'])): ?>
                        <p style="margin:14px 0 0;font-size:12.5px;line-height:1.55;color:<?= sprintf($crmSeatDark, 55) ?>">
                            <?= htmlspecialchars($crmSeatArith['seats_hint'], ENT_QUOTES) ?>
                        </p>
                    <?php endif; ?>
                </div>

                <div>
                    <dl style="margin:0;border-top:1px solid <?= sprintf($crmSeatDark, 30) ?>">
                        <?php $crmSeatModelRows = array_values($crmSeatArith['rows']); ?>
                        <?php foreach ($crmSeatModelRows as $crmSeatModelIdx => $crmSeatModel): ?>
                            <?php
                                $crmSeatRate   = (float) ($crmSeatModel['rate'] ?? 0);
                                $crmSeatMonths = (int) ($crmSeatModel['months'] ?? 60);
                                $crmSeatPlus   = (float) ($crmSeatModel['plus'] ?? 0);
                                $crmSeatTotal  = $crmSeatRate * $crmSeatMonths * $crmSeatSeats + $crmSeatPlus;
                                $crmSeatIsLast = $crmSeatModelIdx === count($crmSeatModelRows) - 1;
                            ?>
                            <div data-stack-sm="" style="display:grid;grid-template-columns:minmax(0,1fr) auto;gap:16px;align-items:baseline;padding:18px 0;border-bottom:1px solid <?= sprintf($crmSeatDark, $crmSeatIsLast ? 30 : 20) ?>">
                                <dt style="font-size:14px;line-height:1.5;color:<?= sprintf($crmSeatDark, 78) ?>">
                                    <?= htmlspecialchars($crmSeatModel['label'] ?? '', ENT_QUOTES) ?>
                                    <?php if (!empty($crmSeatModel['sub'])): ?>
                                        <br><span style="font-size:12px;color:<?= sprintf($crmSeatDark, 50) ?>"><?= htmlspecialchars($crmSeatModel['sub'], ENT_QUOTES) ?></span>
                                    <?php endif; ?>
                                </dt>
                                <dd
                                    data-erp-cost="<?= htmlspecialchars(number_format($crmSeatRate, 2, '.', ''), ENT_QUOTES) ?>"
                                    data-erp-cost-months="<?= $crmSeatMonths ?>"
                                    data-erp-cost-plus="<?= htmlspecialchars(number_format($crmSeatPlus, 2, '.', ''), ENT_QUOTES) ?>"
                                    style="margin:0;font-family:var(--font-heading);font-weight:800;font-size:clamp(24px,2.4vw,34px);letter-spacing:-0.035em;font-variant-numeric:tabular-nums<?= !empty($crmSeatModel['accent']) ? ';color:var(--color-accent-400)' : '' ?>"
                                >$<?= htmlspecialchars(number_format($crmSeatTotal), ENT_QUOTES) ?></dd>
                            </div>
                        <?php endforeach; ?>
                    </dl>

                    <?php if (!empty($crmSeatArith['closing'])): ?>
                        <p style="margin:22px 0 0;font-size:15.5px;font-weight:600;line-height:1.55;border-left:4px solid var(--color-accent);padding-left:18px">
                            <?= htmlspecialchars($crmSeatArith['closing'], ENT_QUOTES) ?>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if (!empty($crmSeatCta['label']) && !empty($crmSeatCta['url'])): ?>
        <p data-erp-cta-inline data-reveal style="margin:28px 0 0;font-size:16px">
            <?php if (!empty($crmSeatCta['lead'])): ?>
                <span style="font-weight:600"><?= htmlspecialchars($crmSeatCta['lead'], ENT_QUOTES) ?></span>
            <?php endif; ?>
            <a data-arrow href="<?= htmlspecialchars(route_url($crmSeatCta['url']), ENT_QUOTES) ?>" style="font-weight:600;color:var(--color-accent-700);text-decoration:none;border-bottom:1px solid color-mix(in srgb, var(--color-accent) 40%, transparent)">
                <?= htmlspecialchars($crmSeatCta['label'], ENT_QUOTES) ?> <span data-arrow-g aria-hidden="true">&rarr;</span>
            </a>
        </p>
    <?php endif; ?>
    </div>
</section>
