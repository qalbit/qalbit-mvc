<?php
/**
 * ERP §16 — Related resources & guides. A component for this page only.
 *
 * Rebuilt onto the new editorial design system: full-bleed section padding,
 * page-wide tokens, inline styles. The `erp-rel-*` class hooks this partial
 * used to depend on are gone from the markup — every rule the section needs
 * now travels with it, so the only stylesheet dependencies left are the
 * page-wide `[data-stack]` collapse, `[data-arrow]` hover and `.erp-gray`
 * desaturation. (Those `.erp-rel-*` rules in app.css are now dead; removing
 * them is the integrator's call, not this file's.)
 *
 * Why it still is not the shared `partials/cta/related-links.php`: that partial
 * serves four templates and is built from rounded cards, pill badges,
 * gradients, drop shadows and sky-500 accents, none of which exist anywhere on
 * this page. It is left untouched for the other three templates.
 *
 * This is a typographic index instead. Three columns hanging off one heavy 2px
 * rule, divided by hairlines, each link a ruled row with a trailing accent
 * arrow. No cards, no shadows, no radius.
 *
 * The column padding is asymmetric on purpose and is computed, not hard-coded:
 * the first column loses its left padding and the last loses its right, so the
 * outer columns align flush with the section's own text edges and only the
 * inner gutters are padded. The hairline is a `border-right` on every column
 * but the last, for the same reason. Both fall out of the index, so the
 * section survives the config growing or losing a group — the grid's
 * `repeat(N, ...)` is counted from the data too.
 *
 * The group flagged `accent` (the ERP guides, appended by the page template
 * from `services.erp_development.resources`) takes the brand colour on its
 * label rather than a tinted card, so it reads as the editorial group without
 * introducing a second visual system.
 *
 * Link rows come in two shapes, as the comp does. A link carrying an `img` or
 * a `desc` gets the rich shape — 110×62 thumbnail, label, sub-label, arrow,
 * aligned to the top. Everything else gets the plain shape: one line, the
 * arrow pushed to the far edge on the baseline. The branch is on the data, not
 * on the group, so a plain group that later gains a `desc` renders correctly
 * instead of dropping it.
 *
 * The thumbnails are real content images from config (`img` / `img_alt`), not
 * page furniture, so unlike every other image on this page they are NOT
 * `aria-hidden` decoration. They keep a real alt — `img_alt`, falling back to
 * the label, exactly as the shared partial did. Sized 110×62 to match the comp
 * (they were 96×54 before); the source files are 768×432, so the intrinsic
 * ratio is unchanged and `object-fit:cover` has nothing to crop.
 *
 * Trap worth naming: the columns grid carries `data-stack`, so below 900px it
 * collapses to one column and the horizontal padding/hairline described above
 * becomes wrong — a stacked column would keep a 32px indent and a rule down
 * its right-hand side. Inline styles cannot express a media query, so each
 * column carries `data-erp-rel-col` for the stylesheet to reset against. See
 * the note handed to the integrator.
 *
 * Copy is config-only. The comp has these exact sentences hard-coded; they are
 * read at runtime regardless, so editing config is the only way this section's
 * words change. The three header strings have kept the same defaults they had
 * before — the page template does not set them today.
 *
 * One deliberate change from the previous version: link hrefs now go through
 * htmlspecialchars() as well as route_url(), matching every other rebuilt ERP
 * partial. The old version echoed route_url() raw. Nothing in config carries a
 * query string today, so the rendered markup is byte-identical; it is here so
 * an `&` in a future href is escaped rather than emitted as a bare ampersand.
 *
 * @var array       $relatedGroups  built in pages/services/erp-development.php
 * @var string|null $erpRelEyebrow
 * @var string|null $erpRelTitle
 * @var string|null $erpRelIntro
 */
$erpRelGroups = array_values(array_filter($relatedGroups ?? [], static function ($erpRelG) {
    return !empty($erpRelG['links']);
}));

if (empty($erpRelGroups)) {
    return;
}

$erpRelEyebrow = $erpRelEyebrow ?? 'Keep exploring';
$erpRelTitle   = $erpRelTitle   ?? 'Related resources & guides';
$erpRelIntro   = $erpRelIntro   ?? 'Estimate your build, compare your options, and see how we deliver.';

/** @var int $erpRelLastCol  index of the final column, for the flush edge + hairline */
$erpRelLastCol = count($erpRelGroups) - 1;
?>

<section
    id="erp-related"
    aria-labelledby="erp-related-heading"
    data-section-erp-related
    data-erp-bleed
    style="scroll-margin-top:16px;padding:clamp(56px,6.5vw,104px) clamp(20px,4.5vw,72px);border-top:2px solid var(--color-divider)"
>
    <div data-erp-wrap>
    <div data-stack data-reveal style="display:grid;grid-template-columns:minmax(0,1.2fr) minmax(0,0.8fr);gap:clamp(24px,3vw,56px);align-items:end">
        <div>
            <p style="display:flex;align-items:center;gap:12px;margin:0;font-size:11px;font-weight:600;letter-spacing:0.22em;text-transform:uppercase;color:var(--color-accent-700)">
                <span aria-hidden="true" style="display:block;width:32px;height:2px;background:var(--color-accent);flex:none"></span><?= htmlspecialchars($erpRelEyebrow, ENT_QUOTES) ?>
            </p>
            <h2 id="erp-related-heading" style="margin:18px 0 0;font-size:clamp(28px,3vw,42px);line-height:1.05;letter-spacing:-0.03em">
                <?= htmlspecialchars($erpRelTitle, ENT_QUOTES) ?>
            </h2>
        </div>
        <p style="margin:0;font-size:15.5px;line-height:1.6;color:color-mix(in srgb, var(--color-text) 70%, transparent)">
            <?= htmlspecialchars($erpRelIntro, ENT_QUOTES) ?>
        </p>
    </div>

    <div data-stack data-stack-sm data-reveal style="display:grid;grid-template-columns:repeat(<?= count($erpRelGroups) ?>,minmax(0,1fr));gap:0;margin-top:clamp(32px,3.5vw,52px);border-top:2px solid var(--color-text)">
        <?php foreach ($erpRelGroups as $erpRelIndex => $erpRelGroup): ?>
            <?php
            // Flush outer edges, padded inner gutters, hairline on every column
            // but the last. Both derived from the index so the count can change.
            $erpRelIsFirst  = $erpRelIndex === 0;
            $erpRelIsLast   = $erpRelIndex === $erpRelLastCol;
            $erpRelColStyle = 'padding:26px ' . ($erpRelIsLast ? '0' : '32px')
                            . ' 26px ' . ($erpRelIsFirst ? '0' : '32px')
                            . ($erpRelIsLast ? '' : ';border-right:1px solid var(--color-divider)');

            // The editorial group takes the brand colour on its label instead of
            // a tinted panel; every other group stays in muted body text.
            $erpRelAccent = !empty($erpRelGroup['accent'])
                ? 'var(--color-accent-700)'
                : 'color-mix(in srgb, var(--color-text) 55%, transparent)';

            $erpRelLinks    = array_values($erpRelGroup['links'] ?? []);
            $erpRelLastLink = count($erpRelLinks) - 1;
            ?>
            <nav
                data-erp-rel-col
                aria-label="<?= htmlspecialchars($erpRelGroup['title'] ?? 'Related links', ENT_QUOTES) ?>"
                style="<?= $erpRelColStyle ?>"
            >
                <h3 style="margin:0 0 8px;font-size:12px;font-weight:600;letter-spacing:0.16em;text-transform:uppercase;color:<?= $erpRelAccent ?>">
                    <?= htmlspecialchars($erpRelGroup['title'] ?? '', ENT_QUOTES) ?>
                </h3>

                <?php if (!empty($erpRelGroup['description'])): ?>
                    <?php // Not used by the current config, kept so a group description is never silently dropped. ?>
                    <p style="margin:0 0 6px;font-size:13px;line-height:1.5;color:color-mix(in srgb, var(--color-text) 60%, transparent)">
                        <?= htmlspecialchars($erpRelGroup['description'], ENT_QUOTES) ?>
                    </p>
                <?php endif; ?>

                <ul style="margin:0;padding:0;list-style:none">
                    <?php foreach ($erpRelLinks as $erpRelLinkIndex => $erpRelLink): ?>
                        <?php
                        // Last row in a column closes on the column's own padding,
                        // not on a rule — the hairline would otherwise dangle.
                        $erpRelRowRule = $erpRelLinkIndex === $erpRelLastLink
                            ? ''
                            : 'border-bottom:1px solid var(--color-divider);';

                        // Rich shape as soon as the data carries a thumbnail or a
                        // sub-label; plain single-line shape otherwise.
                        $erpRelHasThumb = !empty($erpRelLink['img']);
                        $erpRelIsRich   = $erpRelHasThumb || !empty($erpRelLink['desc']);
                        ?>
                        <li>
                            <?php if ($erpRelIsRich): ?>
                                <a
                                    data-arrow
                                    href="<?= htmlspecialchars(route_url($erpRelLink['href'] ?? '/'), ENT_QUOTES) ?>"
                                    <?php if (!empty($erpRelLink['title'])): ?>title="<?= htmlspecialchars($erpRelLink['title'], ENT_QUOTES) ?>"<?php endif; ?>
                                    style="display:flex;align-items:flex-start;gap:14px;padding:14px 0;<?= $erpRelRowRule ?>color:inherit;text-decoration:none"
                                >
                                    <?php if ($erpRelHasThumb): ?>
                                        <?php
                                        // Content image for the article being linked, so it keeps a
                                        // real alt — the shared partial's rule: img_alt, else label.
                                        $erpRelAlt = trim((string) ($erpRelLink['img_alt'] ?? ''));
                                        if ($erpRelAlt === '') {
                                            $erpRelAlt = trim((string) ($erpRelLink['label'] ?? ''));
                                        }
                                        ?>
                                        <span class="erp-gray" style="position:relative;display:block;flex:none;width:110px;height:62px">
                                            <img
                                                src="<?= htmlspecialchars($erpRelLink['img'], ENT_QUOTES) ?>"
                                                alt="<?= htmlspecialchars($erpRelAlt, ENT_QUOTES) ?>"
                                                width="110"
                                                height="62"
                                                loading="lazy"
                                                decoding="async"
                                                style="width:100%;height:100%;object-fit:cover;display:block"
                                            >
                                        </span>
                                    <?php endif; ?>

                                    <span style="flex:1;min-width:0">
                                        <span style="display:block;font-size:15px;font-weight:600"><?= htmlspecialchars($erpRelLink['label'] ?? '', ENT_QUOTES) ?></span>
                                        <?php if (!empty($erpRelLink['desc'])): ?>
                                            <span style="display:block;margin-top:2px;font-size:13px;color:color-mix(in srgb, var(--color-text) 60%, transparent)">
                                                <?= htmlspecialchars($erpRelLink['desc'], ENT_QUOTES) ?>
                                            </span>
                                        <?php endif; ?>
                                    </span>

                                    <span data-arrow-g aria-hidden="true" style="color:var(--color-accent)">&rarr;</span>
                                </a>
                            <?php else: ?>
                                <a
                                    data-arrow
                                    href="<?= htmlspecialchars(route_url($erpRelLink['href'] ?? '/'), ENT_QUOTES) ?>"
                                    <?php if (!empty($erpRelLink['title'])): ?>title="<?= htmlspecialchars($erpRelLink['title'], ENT_QUOTES) ?>"<?php endif; ?>
                                    style="display:flex;align-items:baseline;justify-content:space-between;gap:16px;padding:14px 0;<?= $erpRelRowRule ?>font-size:15px;font-weight:600;color:inherit;text-decoration:none"
                                ><?= htmlspecialchars($erpRelLink['label'] ?? '', ENT_QUOTES) ?><span data-arrow-g aria-hidden="true" style="color:var(--color-accent)">&rarr;</span></a>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        <?php endforeach; ?>
    </div>
    </div>
</section>
