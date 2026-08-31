<?php
/**
 * ERP §13 — What an ERP project should actually change.
 *
 * Rebuilt onto the new editorial design system: full-bleed section padding,
 * page-wide tokens, inline styles. No Tailwind and no `.erp-outcomes*` class
 * hooks — everything this section needs is in the markup, so the only page CSS
 * it still leans on is the `[data-stack]` grid collapse and `[data-reveal]`.
 * The `.erp-outcomes*` block in app.css is now unreferenced; see the report.
 *
 * DARK SECTION. It sits between two lit ones, and the ink is written as
 * `#f3f2f2` literals rather than `var(--color-bg)` because that is what the
 * design comp and the other dark partials (§6 modules, §16 CTA band) do — the
 * value happens to equal `--color-bg`, but on this ground it is a foreground,
 * and mixing the two roles in one file is how a later token retune breaks it.
 * Every muted tone is a `color-mix` off that same literal so the whole section
 * has one ink, not five greys.
 *
 * STILL A REAL <table>. This is genuinely tabular — two column headers, a row
 * header per row, and every row is a pair. The pairing is the point, so the
 * two cells are styled as different kinds of thing rather than as two columns
 * of prose: the change is set in heading type as a statement, the measure in
 * muted body type as a metric. §10's reference panel and §12's stack panel are
 * both bordered boxes, so this one stays an open ruled list.
 *
 * TWO THINGS CHANGED FROM THE PREVIOUS BUILD, DELIBERATELY.
 *
 * 1. No mobile reflow. The old build turned each row into a labelled card
 *    below 767px via `display:block`, which is why it carried explicit ARIA
 *    roles (role="table"/"row"/"rowheader"/"cell") — they existed only to
 *    restore the semantics that `display:block` strips. §4 abandoned that same
 *    reflow in its rebuild, and a two-column table wraps perfectly well at
 *    375px, so the roles go with it: redundant ARIA on a native table that is
 *    not being re-laid-out is a liability, not a safety net. `scope`, the
 *    caption and `aria-labelledby` — the parts doing real work — stay.
 *    `data-label` on the measure cell is kept anyway, exactly as §4 kept its
 *    own: it costs nothing and it is the only hook a reflow rule would need if
 *    the integrator ever wants one back. Restore the roles if that happens.
 *
 * 2. The last row's rule is 2px, not 0. The old CSS zeroed the final border so
 *    the list faded out; the design closes the table with the same heavy rule
 *    it opened with, which is what makes it read as an instrument rather than
 *    a list that ran out. Hence `$erpOutLast` rather than `:last-child`.
 *
 * The caption stays visually hidden and stays hard-coded: it is not page copy,
 * it is the table's description for screen-reader users, and there is no
 * config key for it. It is the one string in this file that is not read from
 * config, and that is intentional.
 *
 * The closing note is given real presence rather than a footnote's — a
 * left-bordered accent aside, full body size, immediately under the table. It
 * is the section's credibility move: the content document forbids quoting a
 * headline ERP failure rate, and this note is what replaces one. Burying it
 * undercuts it.
 *
 * Copy is config-only. The design comp has these exact sentences hard-coded;
 * they are read from `erp_page.outcomes` at runtime regardless, so an edit to
 * the config is the only way this section's words change.
 *
 * Note on naming: the previous build used `$out` and `$cols`. Both are bare
 * enough to collide in the shared partial scope (`View::render` extracts once
 * and includes every partial into it — §4 also writes `$cols`), so everything
 * here is now `$erpOut*`.
 *
 * @var array $erp  config('erp_page')
 */
$erpOut = $erp['outcomes'] ?? [];
if (empty($erpOut['rows'])) {
    return;
}

/** @var array<int,string> $erpOutColumns  Column headers; design fallbacks only. */
$erpOutColumns = $erpOut['columns'] ?? ['What changes', 'How you’d measure it'];

/** @var int|string $erpOutLast  Key of the final row, which closes on a heavy rule. */
$erpOutLast = array_key_last($erpOut['rows']);

// ---------------------------------------------------------------------------
// Style fragments. These are markup, not content: they carry no user input and
// are echoed unescaped into `style` attributes. Named so the row loop reads as
// structure rather than as a wall of declarations.
// ---------------------------------------------------------------------------
$erpOutRule       = 'color-mix(in srgb, #f3f2f2 22%, transparent)'; // row hairline
$erpOutRuleHeavy  = 'color-mix(in srgb, #f3f2f2 40%, transparent)'; // table open/close
$erpOutHeadType   = 'font-size:10px;font-weight:600;letter-spacing:0.16em;text-transform:uppercase;border-bottom:2px solid ' . $erpOutRuleHeavy;
$erpOutChangeType = 'text-align:left;font-family:var(--font-heading);font-weight:700;font-size:clamp(17px,1.6vw,22px);letter-spacing:-0.02em';
$erpOutMeasureInk = 'color:color-mix(in srgb, #f3f2f2 74%, transparent)';
?>

<section
    id="<?= htmlspecialchars($erpOut['id'] ?? 'erp-outcomes', ENT_QUOTES) ?>"
    aria-labelledby="erp-outcomes-heading"
    data-section-erp-outcomes
    data-erp-bleed
    style="scroll-margin-top:16px;padding:clamp(56px,6.5vw,104px) clamp(20px,4.5vw,72px);border-top:2px solid var(--color-divider);background:var(--color-text);color:#f3f2f2"
>
    <div data-erp-wrap>
    <div data-stack="" data-reveal="" style="display:grid;grid-template-columns:minmax(0,1.2fr) minmax(0,0.8fr);gap:clamp(24px,3vw,56px);align-items:end">
        <div>
            <?php if (!empty($erpOut['eyebrow'])): ?>
                <p style="display:flex;align-items:center;gap:12px;margin:0;font-size:11px;font-weight:600;letter-spacing:0.22em;text-transform:uppercase;color:var(--color-accent-400)">
                    <span aria-hidden="true" style="display:block;width:32px;height:2px;background:var(--color-accent);flex:none"></span><?= htmlspecialchars($erpOut['eyebrow'], ENT_QUOTES) ?>
                </p>
            <?php endif; ?>
            <h2 id="erp-outcomes-heading" style="margin:18px 0 0;font-size:clamp(32px,3.8vw,54px);line-height:1.02;letter-spacing:-0.038em;color:#f3f2f2;max-width:18ch">
                <?= htmlspecialchars($erpOut['title'] ?? '', ENT_QUOTES) ?>
            </h2>
        </div>
        <?php if (!empty($erpOut['intro'])): ?>
            <p style="margin:0;font-size:15.5px;line-height:1.6;color:color-mix(in srgb, #f3f2f2 70%, transparent)">
                <?= htmlspecialchars($erpOut['intro'], ENT_QUOTES) ?>
            </p>
        <?php endif; ?>
    </div>

    <table data-reveal="" style="width:100%;border-collapse:collapse;text-align:left;margin-top:clamp(36px,4vw,60px)">
        <caption style="position:absolute;width:1px;height:1px;overflow:hidden;clip:rect(0 0 0 0)">
            Operational changes a custom ERP build is meant to produce, paired with
            the measure that would show whether it did.
        </caption>

        <thead>
            <tr>
                <th scope="col" style="padding:0 16px 12px 0;<?= $erpOutHeadType ?>;color:color-mix(in srgb, #f3f2f2 55%, transparent)">
                    <?= htmlspecialchars($erpOutColumns[0] ?? '', ENT_QUOTES) ?>
                </th>
                <?php /* The measure column is the accent one: it is what the section asks you to go and check. */ ?>
                <th scope="col" style="padding:0 0 12px 16px;<?= $erpOutHeadType ?>;color:var(--color-accent-400)">
                    <?= htmlspecialchars($erpOutColumns[1] ?? '', ENT_QUOTES) ?>
                </th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($erpOut['rows'] as $erpOutKey => $erpOutRow): ?>
                <?php $erpOutBottom = 'border-bottom:' . ($erpOutKey === $erpOutLast ? '2px solid ' . $erpOutRuleHeavy : '1px solid ' . $erpOutRule); ?>
                <tr>
                    <th scope="row" style="padding:20px 16px 20px 0;<?= $erpOutChangeType ?>;<?= $erpOutBottom ?>">
                        <?= htmlspecialchars($erpOutRow['change'] ?? '', ENT_QUOTES) ?>
                    </th>
                    <td
                        data-label="<?= htmlspecialchars($erpOutColumns[1] ?? '', ENT_QUOTES) ?>"
                        style="padding:20px 0 20px 16px;font-size:15px;<?= $erpOutBottom ?>;<?= $erpOutMeasureInk ?>"
                    >
                        <?= htmlspecialchars($erpOutRow['measure'] ?? '', ENT_QUOTES) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php if (!empty($erpOut['note'])): ?>
        <aside style="margin-top:32px;max-width:82ch;border-left:4px solid var(--color-accent);padding-left:22px">
            <p style="margin:0;font-size:15px;line-height:1.65;color:color-mix(in srgb, #f3f2f2 80%, transparent)">
                <?= htmlspecialchars($erpOut['note'], ENT_QUOTES) ?>
            </p>
        </aside>
    <?php endif; ?>
    </div>
</section>
