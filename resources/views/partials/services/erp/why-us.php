<?php
/**
 * ERP §16 — Why work with us on ERP.
 *
 * Five prose blocks. Every claim is first-party and adjacent: no delivered
 * full-ERP implementation is asserted. Do not "strengthen" this copy.
 *
 * Composed as lead → body → punchline rather than five equal cards, because
 * the five items are not equal in kind. The redesign keeps that split and
 * gives each part its own geometry:
 *
 *   1    credentials, plus the honest caveat about what our ERP work has been
 *        so far. Longest, and the only one carrying evidence — it leads, in a
 *        two-column row (heading / paragraph) hung off a 2px rule, at larger
 *        type than the rest.
 *   2-4  how we work. Three columns, hairline-separated, no card chrome.
 *   5    "We'll tell you not to build." The most distinctive claim on the page
 *        and the one a reader remembers, so it closes the section as a filled
 *        accent block instead of being the fifth card in a grid.
 *
 * The split is positional, not keyed: config('erp_page.why_us.items') is a flat
 * list and the first/last entries are the lead and the punchline BY ORDER.
 * Reordering that array silently re-casts the section. It degrades safely —
 * with fewer than three items the punchline is not pulled out at all (see
 * $erpWhyClose below), which is the old behaviour and is deliberate.
 *
 * NO BORDER-TOP AND NO BACKGROUND ON THE <section>. Every other section on this
 * page opens with a 2px rule; this one does not, because §15 (Outcomes) above
 * is a full dark slab and its bottom edge already is the boundary. Adding one
 * here draws a hairline against black. The design omits it for the same reason.
 *
 * THE LEAD ROW'S IMAGE IS OPTIONAL AND THE ERP PAGE HAS NONE. That is a
 * decision about what each page can honestly show, not a layout preference.
 *
 * The ERP lead used to open with a 240px team photo. The slot was removed
 * rather than filled: the only honest thing to put there is a real photograph
 * of this team, and there wasn't a current one. A generated stand-in would have
 * been fabricated people presented as our staff, next to the credential claims
 * in that very paragraph. Do not fill it with a stock or generated crowd.
 *
 * The CRM lead is a different case entirely: its subject is LiftUp, our own
 * product, so a screenshot of it is first-party evidence rather than
 * decoration. It sits UNDER the heading in the same column, as `image` on the
 * lead item — `placeholder => true` frames the slot empty until the asset
 * exists, `src`/`w`/`h` renders it. Same contract as modules.php.
 *
 * Unlike the modules dashboard, this frame is a FIXED HEIGHT with object-fit:
 * cover, per the comp — a wide crop in a narrow column, not a screenshot that
 * has to survive whole. The hint text says so, because a tall source dropped in
 * here will lose its top and bottom.
 *
 * THE FIXED HEIGHT IS A DESKTOP-ONLY IDEA, and forgetting that is how the old
 * team photo broke. At [data-stack] the row becomes one column, so this box
 * spans the full measure while keeping its height clamp — 721x180 at 768px,
 * which is 4:1. A 2.4:1 screenshot in a 4:1 box loses ~40% of its height to
 * cover, top and bottom, which is precisely where a product screenshot keeps
 * its logo and its header. So the box also carries an inline `aspect-ratio`
 * from the asset's own w/h, inert while an explicit height is set, and
 * `data-erp-why-shot` lets the stacked-view rule in app.css drop that height so
 * the ratio takes over. Both halves are load-bearing: remove the attribute and
 * the picture is sliced at 768; remove the aspect-ratio and it collapses.
 *
 * A LEAD'S `text` MAY BE A LIST OF PARAGRAPHS, and one of them may be marked
 * `quote => true` to close the block on an accent left rule. A plain string
 * renders as one paragraph, which is what the ERP page still passes. The link
 * injection below runs against the FIRST paragraph that contains the label and
 * then stops — one outbound proof link per page, not one per paragraph.
 *
 * CONTRAST ON THE ACCENT BLOCK — the one place this file departs from the
 * design comp. The comp paints on-accent type in #f3f2f2 (the page ground),
 * which measures 4.32:1 against #06f. That clears AA for the heading, which is
 * large text needing 3:1, but not for the 16.5px paragraph, which needs 4.5:1.
 * The paragraph is therefore #fff (4.83:1) and the heading is left exactly as
 * drawn. Nothing dimmer than pure white passes at that size, so no opacity or
 * color-mix is used on that line — do not "harmonise" it back to #f3f2f2.
 *
 * NOT DONE: the numbers in item 1 (120+, 90+, Clutch 5.0) are left inside the
 * sentence. Pulling them into stat chips would both re-author approved copy and
 * duplicate the hero's proof grid, which already carries those figures.
 *
 * NO ICONS HERE. This section is not one of the six that were given bespoke
 * icons, and the columns carry no numerals either — the design leads them with
 * the heading alone, and inventing a mark for three prose blocks would compete
 * with §9/§10 immediately above.
 *
 * Copy is config-only. The design comp has these exact sentences hard-coded;
 * they are read from `erp_page.why_us` at runtime regardless, so an edit to the
 * config is the only way this section's words change.
 *
 * @var array $erp  config('erp_page')
 */
$erpWhy = $erp['why_us'] ?? [];
if (empty($erpWhy['items'])) {
    return;
}

/** @var array<int,array{title:string,text:string}> $erpWhyItems */
$erpWhyItems = array_values($erpWhy['items']);
$erpWhyLead  = array_shift($erpWhyItems);                              // item 1
$erpWhyClose = count($erpWhyItems) > 1 ? array_pop($erpWhyItems) : null; // item 5
$erpWhyMiddle = $erpWhyItems;                                          // items 2-4

$erpWhyCount = count($erpWhyMiddle);
$erpWhyLast  = $erpWhyCount - 1;

/**
 * Render an item's prose, optionally turning ONE phrase inside it into a link.
 *
 * The CRM page needs `liftup.sh` linked where the sentence already says it —
 * that product is this page's primary proof asset — without breaking the rule
 * that copy is never written into a partial. So the config carries
 * `link => ['url','label','external']` and the label is matched against the
 * sentence the document already wrote.
 *
 * ESCAPE FIRST, THEN INJECT. The text is escaped as a whole and only then is
 * the (also escaped) label swapped for known-good anchor markup, so no config
 * value can introduce markup. `str_replace` with a count of 1 — if the label
 * appears twice, only the first is linked, which is the intent: this page gets
 * ONE outbound proof link, not one per mention.
 */
$erpWhyProse = static function (string $erpWhyRaw, ?array &$erpWhyLink): string {
    $erpWhyText = htmlspecialchars($erpWhyRaw, ENT_QUOTES);

    if (empty($erpWhyLink['url']) || empty($erpWhyLink['label'])) {
        return $erpWhyText;
    }

    $erpWhyLabel = htmlspecialchars($erpWhyLink['label'], ENT_QUOTES);

    if (!str_contains($erpWhyText, $erpWhyLabel)) {
        return $erpWhyText;
    }

    $erpWhyRel  = !empty($erpWhyLink['external']) ? ' target="_blank" rel="noopener"' : '';
    $erpWhyHref = htmlspecialchars($erpWhyLink['url'], ENT_QUOTES);
    $erpWhyTag  = '<a href="' . $erpWhyHref . '"' . $erpWhyRel
        . ' style="color:var(--color-accent-700);text-decoration:none;border-bottom:1px solid color-mix(in srgb, var(--color-accent) 45%, transparent)">'
        . $erpWhyLabel . '</a>';

    $erpWhyPos = strpos($erpWhyText, $erpWhyLabel);

    // Spent. Null it so a later paragraph in the same item does not link the
    // same label again — this page gets ONE outbound proof link.
    $erpWhyLink = null;

    return substr_replace($erpWhyText, $erpWhyTag, $erpWhyPos, strlen($erpWhyLabel));
};

/**
 * Normalise an item's `text` into a list of paragraph descriptors. A plain
 * string is one paragraph; a list may mix strings with
 * `['text' => …, 'quote' => true]` for the accent-ruled closing line.
 *
 * @return array<int,array{text:string,quote:bool}>
 */
$erpWhyParas = static function (array $erpWhyItem): array {
    $erpWhyRawText = $erpWhyItem['text'] ?? '';
    $erpWhyList    = is_array($erpWhyRawText) ? array_values($erpWhyRawText) : [$erpWhyRawText];

    return array_map(
        static fn ($erpWhyPara): array => is_array($erpWhyPara)
            ? ['text' => (string) ($erpWhyPara['text'] ?? ''), 'quote' => !empty($erpWhyPara['quote'])]
            : ['text' => (string) $erpWhyPara, 'quote' => false],
        $erpWhyList
    );
};
?>

<section
    id="<?= htmlspecialchars($erpWhy['id'] ?? 'why-qalbit-erp', ENT_QUOTES) ?>"
    aria-labelledby="erp-why-heading"
    data-section-erp-why
    style="scroll-margin-top:16px;padding:clamp(56px,6.5vw,104px) clamp(20px,4.5vw,72px)"
>
    <div data-reveal>
        <?php if (!empty($erpWhy['eyebrow'])): ?>
            <p style="display:flex;align-items:center;gap:12px;margin:0;font-size:11px;font-weight:600;letter-spacing:0.22em;text-transform:uppercase;color:var(--color-accent-700)">
                <span aria-hidden="true" style="display:block;width:32px;height:2px;background:var(--color-accent);flex:none"></span><?= htmlspecialchars($erpWhy['eyebrow'], ENT_QUOTES) ?>
            </p>
        <?php endif; ?>
        <h2 id="erp-why-heading" style="margin:18px 0 0;font-size:clamp(32px,3.6vw,52px);line-height:1.02;letter-spacing:-0.035em">
            <?= htmlspecialchars($erpWhy['title'] ?? '', ENT_QUOTES) ?>
        </h2>
    </div>

    <?php if ($erpWhyLead): ?>
        <?php /* Lead: the only item carrying evidence. Heading and paragraph are
                 two columns of one row rather than a heading above a body, so
                 the 2px rule reads as a masthead for both. align-items:start
                 keeps them hanging from the rule when the paragraph runs long. */ ?>
        <?php
            $erpWhyLeadImg  = $erpWhyLead['image'] ?? null;
            $erpWhyLeadLink = $erpWhyLead['link']  ?? null;   // consumed by reference, once
        ?>
        <div data-stack data-reveal style="display:grid;grid-template-columns:minmax(0,0.8fr) minmax(0,1fr);gap:clamp(24px,3vw,48px);align-items:start;margin-top:clamp(32px,3.5vw,52px);border-top:2px solid var(--color-text);padding-top:28px">
            <?php if ($erpWhyLeadImg): ?>
                <div>
                    <h3 style="margin:0;font-size:clamp(24px,2.6vw,36px);letter-spacing:-0.03em;line-height:1.08">
                        <?= htmlspecialchars($erpWhyLead['title'] ?? '', ENT_QUOTES) ?>
                    </h3>
                    <?php /* Fixed height + cover, per the comp: a wide crop in a
                             narrow column, not a screenshot that must survive
                             whole. See the docblock before swapping either. */ ?>
                    <?php if (!empty($erpWhyLeadImg['placeholder'])): ?>
                        <?php /* 12/5 is the slot's design ratio, a layout
                                 constant like the clamp beside it — a real
                                 asset overrides it with its own below. */ ?>
                        <div data-erp-why-shot aria-hidden="true" style="width:100%;height:clamp(180px,16vw,240px);aspect-ratio:12/5;margin-top:24px;border:1px dashed color-mix(in srgb, var(--color-text) 40%, transparent);display:flex;align-items:center;justify-content:center;text-align:center;padding:20px">
                            <?php if (!empty($erpWhyLeadImg['hint'])): ?>
                                <span style="font-size:11px;font-weight:600;letter-spacing:0.16em;text-transform:uppercase;line-height:1.7;color:color-mix(in srgb, var(--color-text) 55%, transparent)">
                                    <?= htmlspecialchars($erpWhyLeadImg['hint'], ENT_QUOTES) ?>
                                </span>
                            <?php endif; ?>
                        </div>
                    <?php elseif (!empty($erpWhyLeadImg['src'])): ?>
                        <?php /* `erp-gray`, not Tailwind's `.grayscale` — that
                                 name is owned by Tailwind on this site. */ ?>
                        <div data-erp-why-shot class="erp-gray" style="width:100%;height:clamp(180px,16vw,240px);aspect-ratio:<?= (int) ($erpWhyLeadImg['w'] ?? 12) ?>/<?= (int) ($erpWhyLeadImg['h'] ?? 5) ?>;margin-top:24px">
                            <img
                                src="<?= asset($erpWhyLeadImg['src']) ?>"
                                alt=""
                                aria-hidden="true"
                                width="<?= (int) ($erpWhyLeadImg['w'] ?? 0) ?>"
                                height="<?= (int) ($erpWhyLeadImg['h'] ?? 0) ?>"
                                loading="lazy"
                                decoding="async"
                                style="width:100%;height:100%;object-fit:cover;display:block"
                            >
                        </div>
                    <?php endif; ?>
                </div>
            <?php else: ?>
                <h3 style="margin:0;font-size:clamp(24px,2.6vw,36px);letter-spacing:-0.03em;line-height:1.08">
                    <?= htmlspecialchars($erpWhyLead['title'] ?? '', ENT_QUOTES) ?>
                </h3>
            <?php endif; ?>

            <div>
                <?php foreach ($erpWhyParas($erpWhyLead) as $erpWhyPIdx => $erpWhyPara): ?>
                    <?php if ($erpWhyPara['quote']): ?>
                        <p style="margin:18px 0 0;font-size:16px;font-weight:600;line-height:1.55;border-left:4px solid var(--color-accent);padding-left:18px">
                            <?= $erpWhyProse($erpWhyPara['text'], $erpWhyLeadLink) ?>
                        </p>
                    <?php else: ?>
                        <?php /* First paragraph carries the row's opening weight;
                                 the rest step down half a size, per the comp. */ ?>
                        <p style="margin:<?= $erpWhyPIdx === 0 ? '0' : '14px' ?> 0 0;font-size:<?= $erpWhyPIdx === 0 ? '16px' : '15.5px' ?>;line-height:1.65;color:color-mix(in srgb, var(--color-text) <?= $erpWhyPIdx === 0 ? '80' : '78' ?>%, transparent)">
                            <?= $erpWhyProse($erpWhyPara['text'], $erpWhyLeadLink) ?>
                        </p>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($erpWhyMiddle): ?>
        <?php /* How we work: hairline-separated columns, no card chrome and no
                 hover — nothing here is a link, and a panel would say it was.
                 The column count follows the item count so the asymmetric
                 padding below always describes a single row; today that is the
                 design's three. */ ?>
        <div data-stack data-stack-sm data-reveal style="display:grid;grid-template-columns:repeat(<?= $erpWhyCount ?>,minmax(0,1fr));gap:0;margin-top:clamp(32px,3.5vw,52px);border-top:1px solid var(--color-divider)">
            <?php foreach ($erpWhyMiddle as $erpWhyIndex => $erpWhyItem): ?>
                <?php
                // First column bleeds to the left edge, last to the right; the
                // dividers live on the right of every column but the last. A
                // lone column keeps neither inset — it spans the full measure.
                if ($erpWhyCount === 1) {
                    $erpWhyPad = '28px 0';
                } elseif ($erpWhyIndex === 0) {
                    $erpWhyPad = '28px 32px 28px 0';
                } elseif ($erpWhyIndex === $erpWhyLast) {
                    $erpWhyPad = '28px 0 28px 32px';
                } else {
                    $erpWhyPad = '28px 32px';
                }
                ?>
                <?php /* data-erp-why-col: inline styles cannot unwind the
                         border-right and the asymmetric padding at the
                         [data-stack] breakpoint, where the columns become rows.
                         Same trap as §3 and §10 — the integrator's stacked-view
                         rule hangs off this attribute. Do not "fix" it by
                         dropping the border, which breaks the row at desktop
                         where it is doing the work. */ ?>
                <article data-erp-why-col style="padding:<?= $erpWhyPad ?><?= $erpWhyIndex === $erpWhyLast ? '' : ';border-right:1px solid var(--color-divider)' ?>">
                    <h3 style="margin:0 0 12px;font-size:19px;letter-spacing:-0.02em;line-height:1.2">
                        <?= htmlspecialchars($erpWhyItem['title'] ?? '', ENT_QUOTES) ?>
                    </h3>
                    <?php $erpWhyItemLink = $erpWhyItem['link'] ?? null; ?>
                    <?php foreach ($erpWhyParas($erpWhyItem) as $erpWhyColIdx => $erpWhyColPara): ?>
                        <p style="margin:<?= $erpWhyColIdx === 0 ? '0' : '12px' ?> 0 0;font-size:14.5px;line-height:1.62;color:color-mix(in srgb, var(--color-text) 76%, transparent)">
                            <?= $erpWhyProse($erpWhyColPara['text'], $erpWhyItemLink) ?>
                        </p>
                    <?php endforeach; ?>
                </article>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if ($erpWhyClose): ?>
        <?php /* Punchline. See the contrast note in the file docblock before
                 touching either colour on this block. */ ?>
        <div data-stack data-reveal style="display:grid;grid-template-columns:minmax(0,0.9fr) minmax(0,1.1fr);gap:clamp(20px,3vw,48px);align-items:center;margin-top:clamp(32px,3.5vw,52px);background:var(--color-accent);color:#f3f2f2;padding:clamp(28px,3vw,44px)">
            <h3 style="margin:0;font-size:clamp(28px,3.2vw,46px);letter-spacing:-0.035em;line-height:1;color:#f3f2f2">
                <?= htmlspecialchars($erpWhyClose['title'] ?? '', ENT_QUOTES) ?>
            </h3>
            <p style="margin:0;font-size:16.5px;line-height:1.55;color:#fff">
                <?= htmlspecialchars($erpWhyClose['text'] ?? '', ENT_QUOTES) ?>
            </p>
        </div>
    <?php endif; ?>
</section>
