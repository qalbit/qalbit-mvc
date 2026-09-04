<?php
/**
 * Riyadh §6 — remote partner vs local agency vs global consultancy.
 *
 * A NEW COMPONENT, not a fork, and the justification is that there was nothing
 * to fork. Both existing ledgers on this design system are cost models:
 *
 *   - erp/comparison.php drives a live seat slider into a five-year total. Its
 *     row shape is {entity, rate, model, price, five_year, source} and its
 *     third column header interpolates {users} from the slider.
 *   - crm/seat-costs.php is a 6x3 vendor tier matrix plus a four-row TCO model.
 *
 * This section has no prices in it, and the ABSENCE of prices is its own stated
 * argument — "Rates are deliberately absent … we will not pretend it is [a rate
 * comparison]". There is no `rate` to put in a `rate` slot. Bending nine
 * capability rows into a money model would have meant either inventing numbers
 * or leaving five of six fields empty on every row.
 *
 * So: a nine-row capability ledger across three vendor types, built from the
 * same instruments as the rest of the page and NOTHING ELSE — page tokens,
 * inline styles, hairline rules, no cards, no shadows, no radius, no new CSS
 * class. The only stylesheet dependencies are the page-wide `[data-stack]`
 * collapse, `[data-reveal]` scroll reveal and `[data-arrow]` hover, all of
 * which already exist for every other section.
 *
 * THREE THINGS THAT LOOK LIKE BUGS AND ARE NOT:
 *
 *  1. THE LAST COLUMN IS THE HIGHLIGHTED ONE and it is where we LOSE three of
 *     the nine rows. That is deliberate and footnote 01 says so on the page. A
 *     future edit that makes our column win every row destroys the section's
 *     only reason to exist.
 *
 *  2. THE HIGHLIGHT FOLLOWS THE LAST INDEX, not a literal 3, matching the
 *     convention in erp/definition.php — insert a fourth vendor column and the
 *     accent travels with it rather than stranding on the wrong one.
 *
 *  3. THE TABLE SCROLLS INSIDE ITSELF on a narrow viewport rather than
 *     collapsing to stacked cards. Nine rows x three vendors read as a matrix;
 *     stacked, the reader loses the comparison that is the whole point. The
 *     wrapper owns `overflow-x:auto`, so the PAGE never scrolls sideways —
 *     which is the 375px requirement — while the matrix stays a matrix.
 *     `min-width` on the table is what makes the wrapper's scroll meaningful.
 *
 * SEMANTICS. A real <table> with <th scope="col"> and <th scope="row">, because
 * it is real tabular data. The row-label column header is intentionally an
 * empty <th>, which is valid and is what a screen reader expects at the corner
 * of a matrix.
 *
 * SCOPE: `include`d into one shared variable scope. Every variable is prefixed
 * `riyCmp*` — NOT `erp*`, so that if this section ever moves next to a genuine
 * ERP partial the two cannot collide.
 *
 * @var array $erp  config('riyadh_page')
 */
$riyCmp = $erp['comparison'] ?? [];
if (empty($riyCmp['title']) || empty($riyCmp['rows'])) {
    return;
}

/** @var array<int,string> $riyCmpCols  [row-label header, vendor A, vendor B, ours] */
$riyCmpCols  = array_values($riyCmp['columns'] ?? []);
$riyCmpRows  = array_values($riyCmp['rows']);
$riyCmpNotes = array_values($riyCmp['notes'] ?? []);

// The vendor columns are every column after the row-label one. The last of them
// is ours and takes the accent.
$riyCmpVendorCount = max(1, count($riyCmpCols) - 1);
$riyCmpOursIndex   = $riyCmpVendorCount - 1;

$riyCmpRule      = '1px solid var(--color-divider)';
$riyCmpRuleHeavy = '2px solid var(--color-text)';
$riyCmpDimInk    = 'color-mix(in srgb, var(--color-text) 62%, transparent)';

// Shared cell geometry, written once so the header and body rows cannot drift.
$riyCmpCellPad   = 'padding:16px 18px';
$riyCmpLabelCell = 'text-align:left;font-size:14.5px;font-weight:600;line-height:1.45;' . $riyCmpCellPad . ';padding-left:0';
$riyCmpBodyCell  = 'text-align:left;font-size:14.5px;line-height:1.5;' . $riyCmpCellPad;

$riyCmpRelated = $riyCmp['related'] ?? null;
?>

<section
    id="<?= htmlspecialchars($riyCmp['id'] ?? 'riyadh-comparison', ENT_QUOTES) ?>"
    aria-labelledby="riyadh-comparison-heading"
    data-section-riyadh-comparison
    style="box-sizing:border-box;max-width:85rem;margin:0 auto;padding:clamp(56px,6.5vw,104px) 1rem;scroll-margin-top:16px;width:100%"
>
    <?php /* Header: heading left, the section's caveat right — the same two-column
             masthead every other section on this page opens with. */ ?>
    <div data-stack data-reveal style="display:grid;grid-template-columns:minmax(0,1.2fr) minmax(0,0.8fr);gap:clamp(24px,3vw,56px);align-items:end">
        <div>
            <?php if (!empty($riyCmp['eyebrow'])): ?>
                <p style="display:flex;align-items:center;gap:12px;margin:0;font-size:11px;font-weight:600;letter-spacing:0.22em;text-transform:uppercase;color:var(--color-accent-700)">
                    <span aria-hidden="true" style="display:block;width:32px;height:2px;background:var(--color-accent);flex:none"></span><?= htmlspecialchars($riyCmp['eyebrow'], ENT_QUOTES) ?>
                </p>
            <?php endif; ?>
            <h2 id="riyadh-comparison-heading" style="margin:18px 0 0;font-size:clamp(32px,3.6vw,52px);line-height:1.02;letter-spacing:-0.035em;max-width:18ch">
                <?= htmlspecialchars($riyCmp['title'], ENT_QUOTES) ?>
            </h2>
        </div>
        <?php if (!empty($riyCmp['intro'])): ?>
            <p style="margin:0;font-size:15.5px;line-height:1.6;color:color-mix(in srgb, var(--color-text) 70%, transparent)">
                <?= htmlspecialchars($riyCmp['intro'], ENT_QUOTES) ?>
            </p>
        <?php endif; ?>
    </div>

    <?php /* See trap 3 in the docblock: the WRAPPER scrolls, not the page. */ ?>
    <div data-reveal style="margin-top:clamp(36px,4vw,60px);overflow-x:auto;-webkit-overflow-scrolling:touch">
        <table style="width:100%;min-width:44rem;border-collapse:collapse;text-align:left">
            <caption class="sr-only"><?= htmlspecialchars($riyCmp['title'], ENT_QUOTES) ?></caption>
            <thead>
                <tr style="border-top:<?= $riyCmpRuleHeavy ?>;border-bottom:<?= $riyCmpRule ?>">
                    <?php foreach ($riyCmpCols as $riyCmpColIdx => $riyCmpCol): ?>
                        <?php
                        // Column 0 is the row-label corner: an empty th, no accent.
                        $riyCmpIsCorner = ($riyCmpColIdx === 0);
                        $riyCmpIsOurs   = (!$riyCmpIsCorner && ($riyCmpColIdx - 1) === $riyCmpOursIndex);
                        $riyCmpHeadCss  = 'vertical-align:bottom;font-size:11px;font-weight:600;letter-spacing:0.14em;text-transform:uppercase;'
                            . $riyCmpCellPad . ';padding-top:20px;padding-bottom:14px'
                            . ($riyCmpIsCorner ? ';padding-left:0' : '')
                            . ($riyCmpIsOurs
                                ? ';color:var(--color-accent-700);border-top:3px solid var(--color-accent)'
                                : ';color:' . $riyCmpDimInk);
                        ?>
                        <th scope="col" style="<?= $riyCmpHeadCss ?>">
                            <?= htmlspecialchars($riyCmpCol, ENT_QUOTES) ?>
                        </th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($riyCmpRows as $riyCmpRowIdx => $riyCmpRow): ?>
                    <?php
                    $riyCmpIsLastRow = ($riyCmpRowIdx === count($riyCmpRows) - 1);
                    $riyCmpRowRule   = $riyCmpIsLastRow ? '2px solid var(--color-divider)' : $riyCmpRule;
                    ?>
                    <tr style="border-bottom:<?= $riyCmpRowRule ?>">
                        <th scope="row" style="<?= $riyCmpLabelCell ?>">
                            <?= htmlspecialchars($riyCmpRow['label'] ?? '', ENT_QUOTES) ?>
                        </th>
                        <?php foreach (array_values($riyCmpRow['cells'] ?? []) as $riyCmpCellIdx => $riyCmpCell): ?>
                            <?php
                            $riyCmpIsOurs  = ($riyCmpCellIdx === $riyCmpOursIndex);
                            $riyCmpCellCss = $riyCmpBodyCell
                                . ($riyCmpIsOurs
                                    ? ';font-weight:600;color:var(--color-text);background:color-mix(in srgb, var(--color-accent) 7%, transparent)'
                                    : ';color:color-mix(in srgb, var(--color-text) 74%, transparent)');
                            ?>
                            <td style="<?= $riyCmpCellCss ?>">
                                <?= htmlspecialchars($riyCmpCell, ENT_QUOTES) ?>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php /* Numbered footnotes. Same instrument as the ERP comparison's notes —
             an accent numeral, a bold lead sentence, then the body — so the two
             pages read as one system. */ ?>
    <?php if ($riyCmpNotes): ?>
        <ol data-reveal style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,22rem),1fr));gap:0 clamp(24px,3vw,48px);margin:clamp(32px,3.5vw,48px) 0 0;padding:0;list-style:none">
            <?php foreach ($riyCmpNotes as $riyCmpNoteIdx => $riyCmpNote): ?>
                <li style="padding:22px 0;border-top:<?= $riyCmpRule ?>">
                    <span aria-hidden="true" style="font-family:var(--font-heading);font-weight:700;font-size:13px;letter-spacing:0.1em;color:var(--color-accent)">
                        <?= str_pad((string) ($riyCmpNoteIdx + 1), 2, '0', STR_PAD_LEFT) ?>
                    </span>
                    <p style="margin:10px 0 0;font-size:14.5px;line-height:1.6;color:color-mix(in srgb, var(--color-text) 76%, transparent)">
                        <?php if (!empty($riyCmpNote['lead'])): ?>
                            <strong style="color:var(--color-text)"><?= htmlspecialchars($riyCmpNote['lead'], ENT_QUOTES) ?></strong>
                        <?php endif; ?>
                        <?= htmlspecialchars($riyCmpNote['text'] ?? '', ENT_QUOTES) ?>
                    </p>
                </li>
            <?php endforeach; ?>
        </ol>
    <?php endif; ?>

    <?php if (!empty($riyCmp['closing']) || !empty($riyCmpRelated['label'])): ?>
        <div data-reveal style="margin-top:clamp(28px,3vw,44px);border-top:<?= $riyCmpRuleHeavy ?>;padding-top:26px">
            <div data-stack style="display:grid;grid-template-columns:minmax(0,1fr) auto;gap:24px;align-items:center">
                <p style="margin:0;font-size:clamp(16px,1.4vw,19px);font-weight:600;letter-spacing:-0.01em;max-width:52ch">
                    <?= htmlspecialchars($riyCmp['closing'] ?? '', ENT_QUOTES) ?>
                </p>
                <?php if (!empty($riyCmpRelated['label']) && !empty($riyCmpRelated['url'])): ?>
                    <p data-erp-cta-inline style="margin:0;font-size:14px">
                        <a
                            data-arrow
                            href="<?= htmlspecialchars(route_url($riyCmpRelated['url']), ENT_QUOTES) ?>"
                            style="font-weight:600;color:var(--color-accent-700);text-decoration:none;border-bottom:1px solid color-mix(in srgb, var(--color-accent) 40%, transparent)"
                        >
                            <?= htmlspecialchars($riyCmpRelated['label'], ENT_QUOTES) ?>
                            <span data-arrow-g aria-hidden="true">&rarr;</span>
                        </a>
                    </p>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
</section>
