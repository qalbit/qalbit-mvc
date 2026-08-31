<?php
/**
 * ERP §4 — Custom ERP vs Odoo, SAP, Dynamics 365 and NetSuite.
 *
 * Rebuilt against the new page design: inline styles + page-wide tokens, no
 * Tailwind, no `.erp-compare` classes. Three things about this section are
 * non-obvious enough to write down.
 *
 * 1. THE TABLE NOW SCROLLS INSTEAD OF REFLOWING.
 *    The previous build carried `data-label` on every cell and let CSS turn
 *    each row into a labelled card below 767px, because a five-column scroll
 *    on a 375px screen defeats the point of a comparison. The new design makes
 *    the opposite call: one `overflow-x:auto` wrapper and `min-width:840px` on
 *    the table, so the columns stay aligned and the reader swipes. The
 *    `data-label` attributes are kept anyway — they cost nothing, they are the
 *    only hook the card reflow needs, and they keep that option open. The
 *    matching `.erp-compare*` rules in app.css are now dead; see the report.
 *
 *    Because nothing changes `display` any more, the explicit ARIA roles the
 *    old markup carried (role="table"/"row"/"cell"…) are gone. They existed
 *    solely to restore semantics the mobile `display:block` stripped. On a
 *    native table that is not being re-laid-out they are redundant, and
 *    redundant ARIA is a liability, not a safety net. `scope`, the caption and
 *    `aria-labelledby` — the parts that were doing real work — stay.
 *
 * 2. THE USER-COUNT SLIDER IS PROGRESSIVE ENHANCEMENT, NOT A WIDGET.
 *    Every five-year figure is computed in PHP at the config default (40) and
 *    printed into the cell, so the table is correct and complete with JS off,
 *    for a crawler, and in the HTML source. The page JS only rewrites text
 *    that is already there. It finds its targets by data attribute:
 *
 *      [data-erp-users-input]  the range control
 *      [data-erp-users-out]    the big number beside "Model it at"
 *      [data-erp-users-label]  the cost column header (carries the raw
 *                              "{users}" template in data-erp-users-template)
 *      [data-erp-cost="31.10"] a computed cell; the value is the published
 *                              monthly per-user rate
 *
 *    Five-year cost is rate x 12 x 5 x users, rounded to whole dollars with
 *    thousands separators. The JS must use the same formula and the same
 *    formatting or the numbers will jump on first drag.
 *
 *    Rows with no `rate` — SAP and NetSuite publish none, and the custom build
 *    has no seat price to multiply — get NO `data-erp-cost` and keep their
 *    authored `five_year` string. `rate` is read defensively (`?? null` +
 *    is_numeric) so a config that predates the key still renders.
 *
 * 3. WE STILL PUBLISH NO PRICE OF OUR OWN.
 *    The accent row says "Build cost, then support only" and that is the whole
 *    claim. Nothing here quotes a QalbIT figure, and the slider deliberately
 *    cannot produce one.
 *
 * 4. EVERY LOCAL IN HERE IS `$erpCmp`-PREFIXED, THE LOOP VARIABLE INCLUDED.
 *    View::render() extract()s one array into one scope and include()s every
 *    partial into that same scope, so a bare `$cmp`, `$cols`, `$row` or
 *    `$inlineCta` does not stay local — it leaks sideways into whatever runs
 *    next. That is not hypothetical: outcomes.php and gcc-compliance.php each
 *    carry a comment naming this section as the file that was writing `$cols`
 *    and `$inlineCta` out from under them. Nothing here is bare any more.
 *
 * The visually hidden <caption> stays hard-coded, on the same reasoning
 * outcomes.php records: it describes the shape of the table for a screen reader,
 * it is not page copy, and there is no config key for it. Same for the "Option"
 * column label and the "Related:" prefix, both carried over verbatim from the
 * previous build.
 *
 * NOT YET IN CONFIG: `comparison.users` supplies min/max/step/default but not
 * `lead`, `unit`, `aria` or `hint`. So the control's three labels still render
 * from the fallback literals below, and the design's hint sentence renders as
 * nothing at all. Add those four keys and the last hard-coded strings in this
 * section go away.
 *
 * The "Not published" cells are a finding, not a gap — hence the accent pill
 * rather than an em dash, and the muted entity name on those two rows.
 *
 * @var array $erp  config('erp_page')
 */
$erpCmp = $erp['comparison'] ?? [];
if (empty($erpCmp['rows'])) {
    return;
}

$erpCmpCols      = $erpCmp['columns'] ?? [];
$erpCmpInlineCta = $erp['inline_ctas']['tco'] ?? null;

// ---------------------------------------------------------------------------
// Slider bounds. All four come from config so the integrator can retune the
// model without touching markup; the fallbacks are the design's own numbers so
// a config that predates the `users` key still renders a working control.
// ---------------------------------------------------------------------------
$erpCmpUsers     = $erpCmp['users'] ?? [];
$erpCmpUsersMin  = (int) ($erpCmpUsers['min'] ?? 10);
$erpCmpUsersMax  = (int) ($erpCmpUsers['max'] ?? 250);
$erpCmpUsersStep = max(1, (int) ($erpCmpUsers['step'] ?? 5));
$erpCmpUsersNow  = (int) ($erpCmpUsers['default'] ?? 40);
$erpCmpUsersNow  = max($erpCmpUsersMin, min($erpCmpUsersMax, $erpCmpUsersNow));

// Control chrome. Labels are overridable from config; the hint sentence has no
// fallback on purpose — an absent key renders no paragraph rather than copy
// nobody approved.
$erpCmpUsersLead = $erpCmpUsers['lead'] ?? 'Model it at';
$erpCmpUsersUnit = $erpCmpUsers['unit'] ?? 'users';
$erpCmpUsersAria = $erpCmpUsers['aria'] ?? 'Number of users';
$erpCmpUsersHint = $erpCmpUsers['hint'] ?? '';

// The cost column header is authored with a {users} token so the JS and the
// server render the same string. A config without the token passes through
// untouched.
$erpCmpCostHead = str_replace('{users}', (string) $erpCmpUsersNow, (string) ($erpCmpCols[2] ?? ''));

/**
 * Five-year licence spend at the published renewal rate.
 * Keep in lockstep with the page JS: '$' + Math.round(rate * 60 * users) with
 * en-US grouping.
 */
$erpCmpFiveYear = static function (float $erpCmpRate, int $erpCmpSeats): string {
    return '$' . number_format(round($erpCmpRate * 12 * 5 * $erpCmpSeats));
};

/**
 * Split an authored five-year figure into the text around its amount, so a
 * recomputed number can be dropped back INTO the approved sentence instead of
 * replacing it. "~$146,400 at renewal rate" yields ['~', ' at renewal rate'].
 *
 * Without this the slider silently discarded both the '~' approximation marker
 * and the 'at renewal rate' qualifier on the two Odoo rows — the qualifier is
 * the only thing on the row saying the figure uses the renewal price rather
 * than a discounted first year, so losing it overstates how firm the number is.
 * The words still come from config; this only decides where the digits go.
 */
$erpCmpAffixes = static function (?string $erpCmpAuthored): array {
    if (!$erpCmpAuthored || !preg_match('/^(.*?)\$[\d,]+(.*)$/', $erpCmpAuthored, $erpCmpParts)) {
        return ['', ''];
    }

    return [$erpCmpParts[1], $erpCmpParts[2]];
};

// Repeated inline styles, hoisted so the table below stays readable.
$erpCmpHeadCell   = 'font-size:10px;font-weight:600;letter-spacing:0.16em;text-transform:uppercase;';
$erpCmpHeadMuted  = 'color:color-mix(in srgb, var(--color-text) 60%, transparent);border-bottom:2px solid var(--color-divider)';
$erpCmpRule       = 'border-bottom:1px solid var(--color-divider)';
$erpCmpMutedSmall = 'color:color-mix(in srgb, var(--color-text) 55%, transparent)';
$erpCmpLinkStyle  = 'color:var(--color-accent-700);text-decoration:none;border-bottom:1px solid color-mix(in srgb, var(--color-accent) 40%, transparent)';
?>

<section
    id="<?= htmlspecialchars($erpCmp['id'], ENT_QUOTES) ?>"
    aria-labelledby="erp-comparison-heading"
    data-section-erp-comparison
    style="scroll-margin-top:16px;padding:clamp(56px,6.5vw,104px) clamp(20px,4.5vw,72px)"
>
    <div data-stack="" data-reveal="" style="display:grid;grid-template-columns:minmax(0,1.15fr) minmax(0,0.85fr);gap:clamp(24px,3vw,56px);align-items:end">
        <div>
            <p style="display:flex;align-items:center;gap:12px;margin:0;font-size:11px;font-weight:600;letter-spacing:0.22em;text-transform:uppercase;color:var(--color-accent-700)">
                <span style="display:block;width:32px;height:2px;background:var(--color-accent)"></span><?= htmlspecialchars($erpCmp['eyebrow'], ENT_QUOTES) ?>
            </p>
            <h2 id="erp-comparison-heading" style="margin:18px 0 0;font-size:clamp(32px,3.6vw,52px);line-height:1.02;letter-spacing:-0.035em;max-width:18ch">
                <?= htmlspecialchars($erpCmp['title'], ENT_QUOTES) ?>
            </h2>
        </div>
        <p style="margin:0;font-size:15px;line-height:1.6;color:color-mix(in srgb, var(--color-text) 70%, transparent)">
            <?= htmlspecialchars($erpCmp['intro'], ENT_QUOTES) ?>
        </p>
    </div>

    <!-- Model-it-at control. Rendered at the config default; JS updates the
         number, the column header and every [data-erp-cost] cell in place. -->
    <div data-reveal="" style="margin-top:clamp(32px,3.5vw,52px);border-top:2px solid var(--color-text);border-bottom:1px solid var(--color-divider);padding:22px 0;display:flex;flex-wrap:wrap;align-items:center;gap:clamp(20px,3vw,48px)">
        <div style="display:flex;align-items:baseline;gap:12px">
            <span style="font-size:10px;font-weight:600;letter-spacing:0.18em;text-transform:uppercase;color:var(--color-accent-700)"><?= htmlspecialchars($erpCmpUsersLead, ENT_QUOTES) ?></span>
            <span data-erp-users-out style="font-family:var(--font-heading);font-weight:700;font-size:clamp(38px,4vw,56px);line-height:1;letter-spacing:-0.04em;font-variant-numeric:tabular-nums"><?= htmlspecialchars((string) $erpCmpUsersNow, ENT_QUOTES) ?></span>
            <span style="font-size:13px;font-weight:600;letter-spacing:0.08em;text-transform:uppercase"><?= htmlspecialchars($erpCmpUsersUnit, ENT_QUOTES) ?></span>
        </div>

        <label style="flex:1;min-width:240px;display:flex;align-items:center;gap:14px">
            <span style="font-size:11px;color:color-mix(in srgb, var(--color-text) 50%, transparent)"><?= htmlspecialchars((string) $erpCmpUsersMin, ENT_QUOTES) ?></span>
            <input
                type="range"
                min="<?= htmlspecialchars((string) $erpCmpUsersMin, ENT_QUOTES) ?>"
                max="<?= htmlspecialchars((string) $erpCmpUsersMax, ENT_QUOTES) ?>"
                step="<?= htmlspecialchars((string) $erpCmpUsersStep, ENT_QUOTES) ?>"
                value="<?= htmlspecialchars((string) $erpCmpUsersNow, ENT_QUOTES) ?>"
                aria-label="<?= htmlspecialchars($erpCmpUsersAria, ENT_QUOTES) ?>"
                data-erp-users-input
                style="flex:1;min-width:0"
            >
            <span style="font-size:11px;color:color-mix(in srgb, var(--color-text) 50%, transparent)"><?= htmlspecialchars((string) $erpCmpUsersMax, ENT_QUOTES) ?></span>
        </label>

        <?php if ($erpCmpUsersHint !== ''): ?>
            <p style="margin:0;max-width:32ch;font-size:12.5px;line-height:1.5;color:color-mix(in srgb, var(--color-text) 60%, transparent)">
                <?= htmlspecialchars($erpCmpUsersHint, ENT_QUOTES) ?>
            </p>
        <?php endif; ?>
    </div>

    <div style="overflow-x:auto">
        <table data-reveal="" style="width:100%;border-collapse:collapse;text-align:left;min-width:840px">
            <caption style="position:absolute;width:1px;height:1px;overflow:hidden;clip:rect(0 0 0 0)">
                Published licence pricing for Odoo, Microsoft Dynamics 365 Business Central,
                SAP Business One and Oracle NetSuite compared with a custom build,
                including five-year cost and the source of each figure.
            </caption>

            <thead>
                <tr>
                    <th scope="col" style="padding:14px 16px 12px 0;<?= $erpCmpHeadCell . $erpCmpHeadMuted ?>">Option</th>

                    <th scope="col" style="padding:14px 16px 12px;<?= $erpCmpHeadCell . $erpCmpHeadMuted ?>">
                        <?= htmlspecialchars($erpCmpCols[0] ?? '', ENT_QUOTES) ?>
                    </th>

                    <th scope="col" style="padding:14px 16px 12px;<?= $erpCmpHeadCell . $erpCmpHeadMuted ?>">
                        <?= htmlspecialchars($erpCmpCols[1] ?? '', ENT_QUOTES) ?>
                    </th>

                    <th
                        scope="col"
                        data-erp-users-label
                        data-erp-users-template="<?= htmlspecialchars((string) ($erpCmpCols[2] ?? ''), ENT_QUOTES) ?>"
                        style="padding:14px 16px 12px;<?= $erpCmpHeadCell ?>color:var(--color-accent-700);border-bottom:2px solid var(--color-accent)"
                    >
                        <?= htmlspecialchars($erpCmpCostHead, ENT_QUOTES) ?>
                    </th>

                    <th scope="col" style="padding:14px 0 12px 16px;<?= $erpCmpHeadCell . $erpCmpHeadMuted ?>">
                        <?= htmlspecialchars($erpCmpCols[3] ?? '', ENT_QUOTES) ?>
                    </th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($erpCmp['rows'] as $erpCmpRow): ?>
                    <?php
                        $erpCmpIsCustom      = !empty($erpCmpRow['is_custom']);
                        $erpCmpIsUnpublished = !empty($erpCmpRow['unpublished']);

                        // Only a published per-seat rate drives a live figure.
                        $erpCmpRate    = $erpCmpRow['rate'] ?? null;
                        [$erpCmpPre, $erpCmpPost] = $erpCmpAffixes($erpCmpRow['five_year'] ?? null);
                        $erpCmpHasRate = !$erpCmpIsCustom
                            && !$erpCmpIsUnpublished
                            && is_numeric($erpCmpRate);

                        // The custom-build row is a solid accent band: bigger
                        // padding, no divider, its own text colour.
                        $erpCmpEntityStyle = $erpCmpIsCustom
                            ? 'padding:22px 16px 22px 18px;font-size:18px;font-weight:700;font-family:var(--font-heading);text-align:left'
                            : 'padding:18px 16px 18px 0;font-size:16px;font-weight:700;font-family:var(--font-heading);' . $erpCmpRule . ';text-align:left'
                                . ($erpCmpIsUnpublished ? ';color:color-mix(in srgb, var(--color-text) 65%, transparent)' : '');

                        $erpCmpModelStyle = $erpCmpIsCustom
                            ? 'padding:22px 16px;font-size:14px;font-weight:600'
                            : 'padding:18px 16px;font-size:14px;' . $erpCmpRule . ';color:color-mix(in srgb, var(--color-text) 76%, transparent)';

                        $erpCmpPriceStyle = $erpCmpIsCustom
                            ? 'padding:22px 16px;font-size:14px'
                            : 'padding:18px 16px;font-size:14px;' . $erpCmpRule;

                        if ($erpCmpIsCustom) {
                            $erpCmpCostStyle = 'padding:22px 16px;font-size:16px;font-weight:700;font-family:var(--font-heading)';
                        } elseif ($erpCmpIsUnpublished) {
                            $erpCmpCostStyle = 'padding:18px 16px;font-size:13px;' . $erpCmpRule . ';' . $erpCmpMutedSmall;
                        } else {
                            $erpCmpCostStyle = 'padding:18px 16px;font-size:16px;font-weight:700;font-family:var(--font-heading);font-variant-numeric:tabular-nums;' . $erpCmpRule;
                        }

                        $erpCmpSourceStyle = $erpCmpIsCustom
                            ? 'padding:22px 18px 22px 16px;font-size:12.5px'
                            : 'padding:18px 0 18px 16px;font-size:12.5px;' . $erpCmpRule . ';' . $erpCmpMutedSmall;
                    ?>
                    <?php if ($erpCmpIsCustom): ?>
                        <tr style="background:var(--color-accent);color:#f3f2f2">
                    <?php else: ?>
                        <tr data-hov="">
                    <?php endif; ?>

                        <th scope="row" style="<?= $erpCmpEntityStyle ?>">
                            <?= htmlspecialchars($erpCmpRow['entity'], ENT_QUOTES) ?>
                        </th>

                        <td data-label="<?= htmlspecialchars($erpCmpCols[0] ?? '', ENT_QUOTES) ?>" style="<?= $erpCmpModelStyle ?>">
                            <?= htmlspecialchars($erpCmpRow['model'], ENT_QUOTES) ?>
                        </td>

                        <td data-label="<?= htmlspecialchars($erpCmpCols[1] ?? '', ENT_QUOTES) ?>" style="<?= $erpCmpPriceStyle ?>">
                            <?php if ($erpCmpIsUnpublished): ?>
                                <span style="display:inline-block;padding:3px 10px;background:var(--color-accent-100);color:var(--color-accent-800);font-size:11px;letter-spacing:0.04em;text-transform:uppercase;font-weight:600"><?= htmlspecialchars($erpCmpRow['price'], ENT_QUOTES) ?></span>
                            <?php else: ?>
                                <?= $erpCmpRow['price'] // trusted: authored in config, contains only <strong> ?>
                            <?php endif; ?>
                        </td>

                        <?php if ($erpCmpHasRate): ?>
                            <td
                                data-label="<?= htmlspecialchars($erpCmpCostHead, ENT_QUOTES) ?>"
                                data-erp-cost="<?= htmlspecialchars(number_format((float) $erpCmpRate, 2, '.', ''), ENT_QUOTES) ?>"
                                data-erp-cost-prefix="<?= htmlspecialchars($erpCmpPre, ENT_QUOTES) ?>"
                                data-erp-cost-suffix="<?= htmlspecialchars($erpCmpPost, ENT_QUOTES) ?>"
                                style="<?= $erpCmpCostStyle ?>"
                            >
                                <?= htmlspecialchars($erpCmpPre . $erpCmpFiveYear((float) $erpCmpRate, $erpCmpUsersNow) . $erpCmpPost, ENT_QUOTES) ?>
                            </td>
                        <?php else: ?>
                            <td data-label="<?= htmlspecialchars($erpCmpCostHead, ENT_QUOTES) ?>" style="<?= $erpCmpCostStyle ?>">
                                <?= htmlspecialchars($erpCmpRow['five_year'], ENT_QUOTES) ?>
                            </td>
                        <?php endif; ?>

                        <td data-label="<?= htmlspecialchars($erpCmpCols[3] ?? '', ENT_QUOTES) ?>" style="<?= $erpCmpSourceStyle ?>">
                            <?= htmlspecialchars($erpCmpRow['source'], ENT_QUOTES) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Notes are body copy, not footnotes: same reading size as the section.
         Two columns; the left one carries the vertical rule. -->
    <ol data-stack-sm="" data-reveal="" style="display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:0;margin:clamp(32px,3.5vw,52px) 0 0;padding:0;list-style:none">
        <?php foreach (($erpCmp['notes'] ?? []) as $erpCmpNoteIndex => $erpCmpNote): ?>
            <?php
                $erpCmpNoteStyle = 'display:grid;grid-template-columns:38px minmax(0,1fr);gap:14px;'
                    . ($erpCmpNoteIndex % 2 === 0
                        ? 'padding:22px 32px 22px 0;border-top:1px solid var(--color-divider);border-right:1px solid var(--color-divider)'
                        : 'padding:22px 0 22px 32px;border-top:1px solid var(--color-divider)');
            ?>
            <li style="<?= $erpCmpNoteStyle ?>">
                <span aria-hidden="true" style="font-family:var(--font-heading);font-weight:700;font-size:13px;color:var(--color-accent)"><?= str_pad((string) ($erpCmpNoteIndex + 1), 2, '0', STR_PAD_LEFT) ?></span>
                <p style="margin:0;font-size:14.5px;line-height:1.6;color:color-mix(in srgb, var(--color-text) 78%, transparent)">
                    <strong style="color:var(--color-text)"><?= htmlspecialchars($erpCmpNote['lead'], ENT_QUOTES) ?></strong>
                    <?= htmlspecialchars($erpCmpNote['text'], ENT_QUOTES) ?>
                </p>
            </li>
        <?php endforeach; ?>
    </ol>

    <div data-stack="" style="display:grid;grid-template-columns:minmax(0,1fr) auto;gap:24px;align-items:center;margin-top:32px;border-top:2px solid var(--color-divider);padding-top:26px">
        <?php if ($erpCmpInlineCta): ?>
            <p data-erp-cta-inline style="margin:0;font-size:15.5px;color:color-mix(in srgb, var(--color-text) 78%, transparent)">
                <?php if (!empty($erpCmpInlineCta['lead'])): ?>
                    <?= htmlspecialchars($erpCmpInlineCta['lead'], ENT_QUOTES) ?>
                <?php endif; ?>
                <a data-arrow="" href="<?= htmlspecialchars(route_url($erpCmpInlineCta['url']), ENT_QUOTES) ?>" style="font-weight:600;<?= $erpCmpLinkStyle ?>">
                    <?= htmlspecialchars($erpCmpInlineCta['label'], ENT_QUOTES) ?>
                    <span data-arrow-g="" aria-hidden="true">&rarr;</span>
                </a>
            </p>
        <?php endif; ?>

        <?php if (!empty($erpCmp['related'])): ?>
            <p style="margin:0;font-size:13.5px;color:color-mix(in srgb, var(--color-text) 60%, transparent)">
                <strong style="color:var(--color-text)">Related:</strong>
                <a href="<?= htmlspecialchars(route_url($erpCmp['related']['url']), ENT_QUOTES) ?>" style="<?= $erpCmpLinkStyle ?>">
                    <?= htmlspecialchars($erpCmp['related']['label'], ENT_QUOTES) ?>
                </a>
            </p>
        <?php endif; ?>
    </div>
</section>
