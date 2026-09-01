<?php
/**
 * CRM §9 (continued) — Where your data lives.
 *
 * NOT A SECTION. This renders INSIDE the verticals section, after its closing
 * line, which is where the design comp puts it and where it belongs: the
 * verticals argument is "compliance sits behind a pricing tier" and this is the
 * evidence for it. Two consequences that are load-bearing:
 *
 *   1. NO <section> AND NO <h2>. The heading is an <h3> under the verticals
 *      <h2>, and each jurisdiction is an <h4>. Promoting either level would
 *      claim this is a peer of §9 rather than part of it.
 *   2. IT INHERITS THE SURFACE BAND. industries.php is a full-bleed
 *      `--color-surface` section. Rendered as its own section this block would
 *      land on plain ground and read as detached from the argument it supports.
 *      That is the whole reason it is included through a slot rather than added
 *      to the page template as a sibling.
 *
 * WHY IT IS NOT erp/gcc-compliance.php. That file is built for a different job:
 * four GCC markets with commissioned flag markers inlined from disk, two scheme
 * pill variants keyed off a `mandate` flag, live e-invoicing deadlines, and its
 * own H2 section with an intro column and a trailing CTA row. This block has
 * two jurisdictions, no markers, one badge treatment, no deadlines and no CTA.
 * Sharing them would have meant making the marker pipeline, the pill variants,
 * the section wrapper and the heading level all conditional — a page
 * conditional in a shared file, which is the thing the CRM template's docblock
 * promises none of these partials contain. Same call as §4.
 *
 * `countries[].marker` in config is therefore READ BY NOTHING here. It is left
 * in place because it is the shared shape and costs nothing; the comp has no
 * flag icons in this block and adding them would give two jurisdictions a
 * visual weight the copy does not claim.
 *
 * The dates and article numbers are regulatory facts with a shelf life. They
 * live in config, never here, and want re-checking before each publish.
 *
 * Copy is config-only, from config('crm_page.gcc').
 *
 * @var array $erp  config('crm_page')
 */
$crmRes = $erp['gcc'] ?? [];
if (empty($crmRes['countries'])) {
    return;
}

$crmResRows    = array_values($crmRes['countries']);
$crmResLastKey = array_key_last($crmResRows);

/* One badge treatment, unlike the ERP page's mandate/no-mandate pair — every
   row here names a regulation, so there is no second state to distinguish. */
$crmResBadge = 'display:inline-block;padding:4px 10px;background:var(--color-accent-100);color:var(--color-accent-800);font-size:10.5px;font-weight:600;letter-spacing:0.1em;text-transform:uppercase';
?>

<div data-stack data-reveal style="display:grid;grid-template-columns:minmax(0,300px) minmax(0,1fr);gap:clamp(24px,3vw,52px);align-items:start;margin-top:clamp(40px,4.5vw,68px);border-top:2px solid var(--color-divider);padding-top:30px">
    <div>
        <?php /* No accent dash on this eyebrow, unlike every other one on the
                 page. It is a sub-heading inside a section, not the opening of
                 one, and the dash is what marks a section opening. */ ?>
        <?php if (!empty($crmRes['eyebrow'])): ?>
            <p style="margin:0;font-size:11px;font-weight:600;letter-spacing:0.22em;text-transform:uppercase;color:var(--color-accent-700)">
                <?= htmlspecialchars($crmRes['eyebrow'], ENT_QUOTES) ?>
            </p>
        <?php endif; ?>
        <?php if (!empty($crmRes['title'])): ?>
            <h3 style="margin:14px 0 0;font-size:clamp(24px,2.4vw,34px);letter-spacing:-0.03em;line-height:1.05">
                <?= htmlspecialchars($crmRes['title'], ENT_QUOTES) ?>
            </h3>
        <?php endif; ?>
    </div>

    <div>
        <?php foreach ($crmResRows as $crmResIdx => $crmResRow): ?>
            <?php /* Every row opens on a hairline; the last also closes the
                     stack on a 2px rule, so the block reads as bounded rather
                     than as running into the closing line beneath it. Keyed off
                     array_key_last so a third jurisdiction takes the closing
                     rule with it. */ ?>
            <article data-hov style="border-top:1px solid var(--color-divider);<?= $crmResIdx === $crmResLastKey ? 'border-bottom:2px solid var(--color-divider);' : '' ?>padding:22px 0">
                <div style="display:flex;flex-wrap:wrap;align-items:baseline;gap:14px">
                    <h4 style="margin:0;font-size:20px;letter-spacing:-0.02em">
                        <?= htmlspecialchars($crmResRow['country'] ?? '', ENT_QUOTES) ?>
                    </h4>
                    <?php if (!empty($crmResRow['scheme'])): ?>
                        <span style="<?= $crmResBadge ?>"><?= htmlspecialchars($crmResRow['scheme'], ENT_QUOTES) ?></span>
                    <?php endif; ?>
                </div>
                <p style="margin:14px 0 0;max-width:82ch;font-size:15px;line-height:1.65;color:color-mix(in srgb, var(--color-text) 78%, transparent)">
                    <?= htmlspecialchars($crmResRow['text'] ?? '', ENT_QUOTES) ?>
                </p>
            </article>
        <?php endforeach; ?>

        <?php if (!empty($crmRes['closing'])): ?>
            <p style="margin:22px 0 0;font-size:16px;font-weight:600;line-height:1.55;border-left:4px solid var(--color-accent);padding-left:18px">
                <?= htmlspecialchars($crmRes['closing'], ENT_QUOTES) ?>
            </p>
        <?php endif; ?>
    </div>
</div>
