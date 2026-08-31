<?php
/**
 * ERP §11 — Accounting and business system integrations.
 *
 * Rebuilt onto the new editorial design system: full-bleed section padding,
 * page-wide tokens, inline styles. The old `erp-int-*` class hooks are gone —
 * every rule this section needs now travels in the markup, so the only
 * stylesheet dependency left is the page-wide `[data-stack]` collapse.
 *
 * The section still argues a contrast, and the layout is what argues it:
 *
 *   Modern APIs      → a light definition row, on a 2px rule
 *   Legacy / Tally   → a DARK inset panel, the centre of the section
 *   Everything else  → a light definition row, closing the stack out
 *
 * Dark for the legacy block is doing semantic work, not decoration: it is the
 * hard half of the contrast, and the term/definition rows inside it read as
 * documentation, which is this section's whole claim. Do not lighten it to
 * "match" its neighbours, and do not promote either light row into a card —
 * they are deliberately the same instrument printed twice, so the dark panel
 * is the only thing that stands up off the page.
 *
 * The four Tally points are NOT all rendered alike, because they are not
 * alike. Three name an actual interface (XML over HTTP, ODBC, TDL) and become
 * term/definition rows: `lead` is the interface, `text` completes the sentence
 * about it. The fourth is flagged `inline` in config because its emphasis sits
 * mid-sentence — it is an operational caveat, not an interface — so it renders
 * as a full-width note below the list. Forcing it into a `dt`/`dd` row would
 * print "active company only" twice.
 *
 * The trap, carried over from the previous build and worth naming again: that
 * note's emphasis is applied by locating the ESCAPED lead inside the ESCAPED
 * body and wrapping it. Escape first, search second — searching the raw text
 * and escaping afterwards would either escape our own `<strong>` away or, if
 * the config copy ever grows an apostrophe inside the lead, silently miss the
 * match. `strpos` returning false is a normal outcome (an editor reworded the
 * sentence), and the fallback is simply the unemphasised sentence, never a
 * fatal. The `<strong>` we emit carries an inline colour because on the dark
 * panel the surrounding copy is muted and bold alone does not read.
 *
 * Copy is config-only. The design comp has these exact sentences hard-coded;
 * they are read from `erp_page.integrations` at runtime regardless, so an edit
 * to the config is the only way this section's words change.
 *
 * @var array $erp  config('erp_page')
 */
$erpInt = $erp['integrations'] ?? [];
if (empty($erpInt['title'])) {
    return;
}

/** @var array $erpIntLegacy  the dark panel's copy: title, intro, points, closing */
$erpIntLegacy = $erpInt['legacy'] ?? [];

/**
 * Split the legacy points into the two shapes the panel renders.
 *
 * @var array<int,array{lead:string,text:string}> $erpIntSpecRows   interfaces → dt/dd
 * @var array<int,array{lead:string,text:string}> $erpIntSpecNotes  caveats → full-width note
 */
$erpIntSpecRows  = [];
$erpIntSpecNotes = [];
foreach (($erpIntLegacy['points'] ?? []) as $erpIntPoint) {
    if (!empty($erpIntPoint['inline'])) {
        $erpIntSpecNotes[] = $erpIntPoint;
    } else {
        $erpIntSpecRows[] = $erpIntPoint;
    }
}

/**
 * The two light rows are the same instrument printed twice, but they sit on
 * either side of the dark panel, so they cannot be a loop. They are a closure
 * instead, which keeps the markup written once and keeps the two of them from
 * drifting apart under later edits.
 *
 * `$erpIntRule` is a style fragment emitted verbatim into an inline `style`
 * attribute and contains no user input — it is the row's own rules, not copy:
 * the first row opens on the heavy 2px rule that starts the stack, the last
 * closes it on another. Only the second row is missing `data-reveal`, per the
 * comp, so the flag is a parameter rather than baked in.
 *
 * @var callable(array,string,bool):void $erpIntRenderRow
 */
$erpIntRenderRow = static function (array $erpIntBlock, string $erpIntRule, bool $erpIntReveal): void {
    if (empty($erpIntBlock['title'])) {
        return;
    }
    ?>
    <div data-stack<?= $erpIntReveal ? ' data-reveal' : '' ?> style="display:grid;grid-template-columns:minmax(0,240px) minmax(0,1fr);gap:clamp(20px,3vw,48px);padding:26px 0;<?= $erpIntRule ?>">
        <h3 style="margin:0;font-size:18px;letter-spacing:-0.015em"><?= htmlspecialchars($erpIntBlock['title'], ENT_QUOTES) ?></h3>
        <p style="margin:0;font-size:15.5px;line-height:1.65;max-width:70ch"><?= htmlspecialchars($erpIntBlock['text'] ?? '', ENT_QUOTES) ?></p>
    </div>
    <?php
};
?>

<section
    id="<?= htmlspecialchars($erpInt['id'], ENT_QUOTES) ?>"
    aria-labelledby="erp-integrations-heading"
    data-section-erp-integrations
    data-erp-bleed
    style="scroll-margin-top:16px;padding:clamp(56px,6.5vw,104px) clamp(20px,4.5vw,72px);border-top:2px solid var(--color-divider);background:var(--color-surface)"
>
    <div data-erp-wrap>
    <div data-stack data-reveal style="display:grid;grid-template-columns:minmax(0,1.2fr) minmax(0,0.8fr);gap:clamp(24px,3vw,56px);align-items:end">
        <div>
            <p style="display:flex;align-items:center;gap:12px;margin:0;font-size:11px;font-weight:600;letter-spacing:0.22em;text-transform:uppercase;color:var(--color-accent-700)">
                <span aria-hidden="true" style="display:block;width:32px;height:2px;background:var(--color-accent);flex:none"></span><?= htmlspecialchars($erpInt['eyebrow'], ENT_QUOTES) ?>
            </p>
            <h2 id="erp-integrations-heading" style="margin:18px 0 0;font-size:clamp(32px,3.6vw,52px);line-height:1.02;letter-spacing:-0.035em;max-width:18ch">
                <?= htmlspecialchars($erpInt['title'], ENT_QUOTES) ?>
            </h2>
        </div>
        <p style="margin:0;font-size:15.5px;line-height:1.6;color:color-mix(in srgb, var(--color-text) 70%, transparent)">
            <?= htmlspecialchars($erpInt['intro'], ENT_QUOTES) ?>
        </p>
    </div>

    <?php // Modern APIs — the easy half, opening the stack on the heavy rule. ?>
    <?php $erpIntRenderRow(
        $erpInt['modern'] ?? [],
        'margin-top:clamp(36px,4vw,60px);border-top:2px solid var(--color-text);border-bottom:1px solid var(--color-divider)',
        true
    ); ?>

    <?php // Legacy — the hard half, as a dark datasheet. ?>
    <?php if (!empty($erpIntLegacy['title'])): ?>
        <div data-reveal style="background:var(--color-text);color:#f3f2f2;padding:clamp(28px,3vw,44px);margin-top:28px">
            <div data-stack style="display:grid;grid-template-columns:minmax(0,1fr) minmax(0,1fr);gap:clamp(20px,3vw,48px);align-items:start">
                <h3 style="margin:0;font-size:clamp(24px,2.4vw,34px);letter-spacing:-0.03em;line-height:1.1;color:#f3f2f2">
                    <?= htmlspecialchars($erpIntLegacy['title'], ENT_QUOTES) ?>
                </h3>
                <?php if (!empty($erpIntLegacy['intro'])): ?>
                    <p style="margin:0;font-size:15px;line-height:1.65;color:color-mix(in srgb, #f3f2f2 72%, transparent)">
                        <?= htmlspecialchars($erpIntLegacy['intro'], ENT_QUOTES) ?>
                    </p>
                <?php endif; ?>
            </div>

            <?php if ($erpIntSpecRows): ?>
                <dl style="margin:32px 0 0;border-top:1px solid color-mix(in srgb, #f3f2f2 28%, transparent)">
                    <?php foreach ($erpIntSpecRows as $erpIntSpec): ?>
                        <div data-stack style="display:grid;grid-template-columns:minmax(0,200px) minmax(0,1fr);gap:clamp(16px,2vw,32px);padding:18px 0;border-bottom:1px solid color-mix(in srgb, #f3f2f2 20%, transparent)">
                            <dt style="font-family:var(--font-heading);font-weight:700;font-size:16px;color:var(--color-accent-400)">
                                <?= htmlspecialchars($erpIntSpec['lead'], ENT_QUOTES) ?>
                            </dt>
                            <dd style="margin:0;font-size:15px;line-height:1.6;color:color-mix(in srgb, #f3f2f2 78%, transparent)">
                                <?= htmlspecialchars($erpIntSpec['text'], ENT_QUOTES) ?>
                            </dd>
                        </div>
                    <?php endforeach; ?>
                </dl>
            <?php endif; ?>

            <?php foreach ($erpIntSpecNotes as $erpIntNote): ?>
                <p style="margin:22px 0 0;font-size:15px;line-height:1.6;color:color-mix(in srgb, #f3f2f2 78%, transparent)">
                    <?php
                    // Escape first, then locate the lead inside the escaped body: both
                    // strings go through the same transform, so entities line up. A
                    // miss (false) just prints the sentence unemphasised.
                    $erpIntNoteLead = htmlspecialchars($erpIntNote['lead'], ENT_QUOTES);
                    $erpIntNoteBody = htmlspecialchars($erpIntNote['text'], ENT_QUOTES);
                    $erpIntNoteAt   = strpos($erpIntNoteBody, $erpIntNoteLead);
                    echo $erpIntNoteAt === false
                        ? $erpIntNoteBody
                        : substr_replace(
                            $erpIntNoteBody,
                            '<strong style="color:#f3f2f2">' . $erpIntNoteLead . '</strong>',
                            $erpIntNoteAt,
                            strlen($erpIntNoteLead)
                        );
                    ?>
                </p>
            <?php endforeach; ?>

            <?php if (!empty($erpIntLegacy['closing'])): ?>
                <p style="margin:20px 0 0;max-width:76ch;font-size:16px;font-weight:600;line-height:1.6;border-left:4px solid var(--color-accent);padding-left:18px">
                    <?= htmlspecialchars($erpIntLegacy['closing'], ENT_QUOTES) ?>
                </p>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <?php // Everything else — closing the stack out. No data-reveal, per the comp. ?>
    <?php $erpIntRenderRow(
        $erpInt['everything_else'] ?? [],
        'margin-top:28px;border-top:1px solid var(--color-divider);border-bottom:2px solid var(--color-divider)',
        false
    ); ?>
    </div>
</section>
