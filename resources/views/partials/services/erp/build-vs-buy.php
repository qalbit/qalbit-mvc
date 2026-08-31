<?php
/**
 * ERP §3 — When to build, and when not to.
 *
 * Rebuilt onto the new editorial design system: a full-bleed ground with its
 * content aligned to the hero's centred shell,
 * page-wide tokens, inline styles. No Tailwind, no `erp-bvb-*` class hooks —
 * everything this section needs to look right is in the markup itself, so the
 * only stylesheet it still depends on is the page-wide `[data-stack]` collapse.
 *
 * Still ONE split panel, not two cards. A single 2px rule runs across the top
 * of both lists and a single hairline runs between them; the two columns are
 * the same grid cell repeated, so the ledger reads as one instrument with two
 * sides rather than as a pros box and a cons box.
 *
 * STRUCTURAL EQUAL WEIGHT IS STILL A HARD REQUIREMENT. Both columns get the
 * same heading level, the same type scale, the same 18px row rhythm, the same
 * `<ol>` markup and the same numbering. What the new design does add is a
 * *state* distinction rather than a quality one: the build list is marked in
 * accent (filled square, accent numerals) because it is the section this page
 * is about, and the buy list is marked in outline (hollow square, 45%-muted
 * numerals) because it is the path we hand off. That is the design's call and
 * it is carried in the marker treatment only. Do not push it further — do not
 * shrink the buy heading, drop its numbering, fill one side's background, or
 * add a "recommended" badge. The closing line does the persuading; the columns
 * are supposed to read as a straight ledger, which is the whole credibility
 * move of this section.
 *
 * The trap worth naming: the columns carry their divider as `border-right` on
 * the first one plus asymmetric 40px padding (right on the first, left on the
 * second). Inline styles cannot unwind that at the `[data-stack]` breakpoint,
 * so each column carries `data-erp-bvb-col` for the integrator's stacked-view
 * rule to reset against — the same hook §10 (`data-erp-ind-col`), Why QalbIT
 * (`data-erp-why-col`) and Resources (`data-erp-rel-col`) hang theirs off. At
 * ≤900px that rule has to drop the `border-right` and flatten the padding to a
 * symmetric block, or the second column keeps a 40px left indent it has not
 * earned once the columns have become rows. Do not "fix" it by dropping the
 * border here, which would break the panel at desktop where it matters.
 *
 * Copy is config-only. The design comp has these exact sentences hard-coded;
 * they are read from `erp_page.build_vs_buy` at runtime regardless, so an edit
 * to the config is the only way this section's words change.
 *
 * @var array $erp  config('erp_page')
 */
$erpBvb = $erp['build_vs_buy'] ?? [];
if (empty($erpBvb['title'])) {
    return;
}

/**
 * Both sides described as data so the row loop is written once. `marker` and
 * `index` are style fragments, not colour names: they are emitted verbatim
 * into inline `style` attributes and contain no user input.
 *
 * @var array<int,array{title:string,items:array<int,string>,pad:string,marker:string,index:string}> $erpBvbColumns
 */
$erpBvbColumns = [
    [
        'title'  => $erpBvb['build_title'] ?? '',
        'items'  => $erpBvb['build_items'] ?? [],
        'pad'    => 'padding:28px 40px 28px 0;border-right:1px solid var(--color-divider)',
        'marker' => 'width:12px;height:12px;background:var(--color-accent);display:block',
        'index'  => 'color:var(--color-accent)',
    ],
    [
        'title'  => $erpBvb['buy_title'] ?? '',
        'items'  => $erpBvb['buy_items'] ?? [],
        'pad'    => 'padding:28px 0 28px 40px',
        'marker' => 'width:12px;height:12px;border:2px solid var(--color-text);display:block',
        'index'  => 'color:color-mix(in srgb, var(--color-text) 45%, transparent)',
    ],
];
?>

<section
    id="<?= htmlspecialchars($erpBvb['id'], ENT_QUOTES) ?>"
    aria-labelledby="erp-build-vs-buy-heading"
    data-section-erp-build-vs-buy
    data-erp-bleed
    style="scroll-margin-top:16px;padding:clamp(56px,6.5vw,104px) 0;border-top:2px solid var(--color-divider);background:var(--color-surface)"
>
    <div data-erp-wrap>
    <div data-stack data-reveal style="display:grid;grid-template-columns:minmax(0,1.3fr) minmax(0,0.7fr);gap:clamp(24px,3vw,56px);align-items:end">
        <div>
            <p style="display:flex;align-items:center;gap:12px;margin:0;font-size:11px;font-weight:600;letter-spacing:0.22em;text-transform:uppercase;color:var(--color-accent-700)">
                <span aria-hidden="true" style="display:block;width:32px;height:2px;background:var(--color-accent);flex:none"></span><?= htmlspecialchars($erpBvb['eyebrow'], ENT_QUOTES) ?>
            </p>
            <h2 id="erp-build-vs-buy-heading" style="margin:18px 0 0;font-size:clamp(32px,3.6vw,52px);line-height:1.02;letter-spacing:-0.035em;max-width:20ch">
                <?= htmlspecialchars($erpBvb['title'], ENT_QUOTES) ?>
            </h2>
        </div>
        <p style="margin:0;font-size:15.5px;line-height:1.6;color:color-mix(in srgb, var(--color-text) 70%, transparent)">
            <?= htmlspecialchars($erpBvb['intro'], ENT_QUOTES) ?>
        </p>
    </div>

    <div data-stack data-reveal style="display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:0;margin-top:clamp(36px,4vw,60px);border-top:2px solid var(--color-divider)">
        <?php foreach ($erpBvbColumns as $erpBvbCol): ?>
            <?php if (empty($erpBvbCol['items'])) { continue; } ?>
            <?php $erpBvbLast = array_key_last($erpBvbCol['items']); ?>
            <section data-erp-bvb-col aria-label="<?= htmlspecialchars($erpBvbCol['title'], ENT_QUOTES) ?>" style="<?= $erpBvbCol['pad'] ?>">
                <h3 style="display:flex;align-items:center;gap:12px;margin:0 0 8px;font-size:15px;letter-spacing:0.06em;text-transform:uppercase">
                    <span aria-hidden="true" style="<?= $erpBvbCol['marker'] ?>;flex:none"></span><?= htmlspecialchars($erpBvbCol['title'], ENT_QUOTES) ?>
                </h3>
                <ol style="margin:0;padding:0;list-style:none">
                    <?php foreach ($erpBvbCol['items'] as $erpBvbIndex => $erpBvbItem): ?>
                        <li style="display:grid;grid-template-columns:34px minmax(0,1fr);gap:14px;padding:18px 0<?= $erpBvbIndex === $erpBvbLast ? '' : ';border-bottom:1px solid var(--color-divider)' ?>">
                            <span aria-hidden="true" style="font-family:var(--font-heading);font-weight:700;font-size:13px;<?= $erpBvbCol['index'] ?>"><?= str_pad((string) ((int) $erpBvbIndex + 1), 2, '0', STR_PAD_LEFT) ?></span>
                            <span style="font-size:15px;line-height:1.6"><?= htmlspecialchars($erpBvbItem, ENT_QUOTES) ?></span>
                        </li>
                    <?php endforeach; ?>
                </ol>
            </section>
        <?php endforeach; ?>
    </div>

    <p data-reveal style="margin:36px 0 0;max-width:70ch;border-top:2px solid var(--color-text);padding-top:20px;font-size:clamp(16px,1.4vw,19px);font-weight:600;line-height:1.5;letter-spacing:-0.015em">
        <?= htmlspecialchars($erpBvb['closing'], ENT_QUOTES) ?>
    </p>
    </div>
</section>
