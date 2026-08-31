<?php
/**
 * ERP §8 — Where custom ERPs fit best.
 *
 * Replaces the shared `service-use-cases.php` for this page only. That partial
 * is shared with `services/show` and `hire/show`, so it could not be restyled
 * in place. Content still comes from the same place —
 * config('services.erp_development.use_cases') — so nothing is duplicated.
 *
 * Rebuilt against the new editorial design. The card chrome is gone: the four
 * items are a 2x2 block ruled by hairlines only — a heavy rule across the top,
 * a 1px vertical between the columns, 1px under the first row and 2px under the
 * last. No borders, no surfaces, no shadows. Because the separators ARE the
 * grid, the padding is asymmetric per column (left column pads right, right
 * column pads left) so the copy sits off the shared rule rather than on it.
 *
 * Both the column side and the row weight are computed from the item index
 * against the rendered count, not hard-coded to four, so a fifth item added to
 * config lands in the left column of a new last row and moves the 2px rule down
 * with it. The odd-item-out case is handled too: a lone left-column card in the
 * final row drops its vertical rule instead of ruling against nothing.
 *
 * These four items carry two fields no other section has, `badge` and
 * `audience`. The badge is the design's uppercase pill (first one accent-filled
 * as the section's single spot of colour, the rest outlined) and the audience
 * the small uppercase "For …" line that closes each card. The design pins that
 * line to the bottom of a fixed-height card; here it simply flows, because
 * without card chrome there is no box edge for four unequal cards to line up
 * against — item 4 runs roughly three times the length of the others and the
 * hairline grid absorbs that without the ragged whitespace a pinned footer
 * would have left above it.
 *
 * MUST SURVIVE ANY EDIT:
 *  1. schema.org/ItemList microdata — the section is an ItemList and each card
 *     an itemListElement/Thing with name and description.
 *  2. Namespaced variables. The shared partial assigned generic `$eyebrow`,
 *     `$title`, `$intro`, `$items`, `$cta` and `$sectionId` into the shared
 *     include scope. Everything here is prefixed `$uc`.
 *  3. `.erp-uc-icon` on the icon span. It is the ONLY class left in this
 *     section and it carries no layout — the icon files declare
 *     `width="48" height="48"` on the <svg> element itself, and a presentation
 *     attribute beats the parent's inline size, so the 36px render can only
 *     come from the `.erp-uc-icon svg` rule in CSS. The inline size on the span
 *     is a floor, not the mechanism. Same trap as modules.php.
 *
 * The inline CTA is written out here rather than `include`d from
 * `cta-inline.php`: that partial is Tailwind-classed with a left accent rule,
 * which is a different object from the design's plain arrow link. It still
 * carries `data-erp-cta-inline`, the marker all seven of the page's inline CTAs
 * share, and it still reads its copy from erp_page.inline_ctas.use_case.
 *
 * `data-reveal` / `data-stack` / `data-stack-sm` / `data-arrow` /
 * `data-arrow-g` are hooks for the page's existing CSS + JS (scroll reveal, the
 * small-screen collapse of the grids, the hover lift, the arrow nudge). They
 * carry no meaning here; leave them where the design put them.
 *
 * @var array $service  config('services.erp_development')
 * @var array $erp      config('erp_page')
 */
$uc = $service['use_cases'] ?? [];

$ucItems = $uc['items'] ?? [];
if (empty($ucItems)) {
    return;
}

$ucId      = $uc['id']      ?? 'erp-project-types';
$ucEyebrow = $uc['eyebrow'] ?? '';
$ucTitle   = $uc['title']   ?? '';
$ucIntro   = $uc['intro']   ?? '';
/** @var array{lead?:string,label:string,url:string}|null $ucCta */
$ucCta = $erp['inline_ctas']['use_case'] ?? null;

/** Icons are inlined so CSS can tint them — see modules.php. */
$ucInlineIcon = static function (?string $rel): ?string {
    static $cache = [];

    if (!$rel || !str_ends_with($rel, '.svg')) {
        return null;
    }
    if (array_key_exists($rel, $cache)) {
        return $cache[$rel];
    }

    $root = realpath(__DIR__ . '/../../../../../public/assets/images/icons');
    $file = realpath(__DIR__ . '/../../../../../public/assets' . $rel);

    if ($root === false || $file === false || !str_starts_with($file, $root . DIRECTORY_SEPARATOR)) {
        return $cache[$rel] = null;
    }

    $svg = file_get_contents($file);
    if ($svg === false || !str_contains($svg, '<svg')) {
        return $cache[$rel] = null;
    }

    return $cache[$rel] = trim(preg_replace('/<\?xml.*?\?>|<!--.*?-->/s', '', $svg));
};

/**
 * Normalise first, render second. The hairline grid needs to know how many
 * cards actually survive the guards before it can decide which of them sit in
 * the final row, so the skip rules cannot live inside the render loop the way
 * they did when every card was an identical bordered box.
 *
 * @var array<int,array{label:string,description:string,audience:string,badge:string,icon:?string,icon_src:?string}> $ucCards
 */
$ucCards = [];
foreach ($ucItems as $ucItem) {
    if (!is_array($ucItem)) {
        continue;
    }

    $ucLabel = trim($ucItem['label']       ?? '');
    $ucDesc  = trim($ucItem['description'] ?? '');

    if ($ucLabel === '' && $ucDesc === '') {
        continue;
    }

    $ucCards[] = [
        'label'       => $ucLabel,
        'description' => $ucDesc,
        'audience'    => trim($ucItem['audience'] ?? ''),
        'badge'       => trim($ucItem['badge']    ?? ''),
        'icon'        => $ucInlineIcon($ucItem['icon'] ?? null),
        'icon_src'    => $ucItem['icon'] ?? null,
    ];
}

if ($ucCards === []) {
    return;
}

$ucCount   = count($ucCards);
$ucLastRow = intdiv($ucCount - 1, 2);
?>

<section
    id="<?= htmlspecialchars($ucId, ENT_QUOTES) ?>"
    aria-labelledby="erp-use-cases-heading"
    data-section-erp-use-cases
    itemscope
    itemtype="https://schema.org/ItemList"
    data-erp-bleed
    style="scroll-margin-top:16px;padding:clamp(56px,6.5vw,104px) clamp(20px,4.5vw,72px);border-top:2px solid var(--color-divider)"
>
    <div data-erp-wrap>
    <div data-stack data-reveal style="display:grid;grid-template-columns:minmax(0,1.2fr) minmax(0,0.8fr);gap:clamp(24px,3vw,56px);align-items:end">
        <div>
            <?php if ($ucEyebrow !== ''): ?>
                <p style="display:flex;align-items:center;gap:12px;margin:0;font-size:11px;font-weight:600;letter-spacing:0.22em;text-transform:uppercase;color:var(--color-accent-700)">
                    <span aria-hidden="true" style="display:block;width:32px;height:2px;background:var(--color-accent)"></span><?= htmlspecialchars($ucEyebrow, ENT_QUOTES) ?>
                </p>
            <?php endif; ?>

            <h2
                id="erp-use-cases-heading"
                itemprop="name"
                style="margin:18px 0 0;font-size:clamp(32px,3.6vw,52px);line-height:1.02;letter-spacing:-0.035em"
            >
                <?= htmlspecialchars($ucTitle, ENT_QUOTES) ?>
            </h2>
        </div>

        <?php if ($ucIntro !== ''): ?>
            <p style="margin:0;font-size:15.5px;line-height:1.6;color:color-mix(in srgb, var(--color-text) 70%, transparent)">
                <?= htmlspecialchars($ucIntro, ENT_QUOTES) ?>
            </p>
        <?php endif; ?>
    </div>

    <?php /* gap:0 — the rules below are the grid, so a gap would double them. */ ?>
    <div data-stack-sm data-reveal style="display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:0;margin-top:clamp(36px,4vw,60px)">
        <?php
        foreach ($ucCards as $ucIndex => $ucCard):
            $ucIsLeft    = ($ucIndex % 2 === 0);
            $ucIsLastRow = (intdiv($ucIndex, 2) === $ucLastRow);
            // A left-column card with nothing beside it has no seam to rule.
            $ucHasNeighbour = $ucIsLeft && isset($ucCards[$ucIndex + 1]);

            $ucCardStyle = 'padding:' . ($ucIsLeft ? '30px 36px 30px 0' : '30px 0 30px 36px') . ';'
                . ($ucHasNeighbour ? 'border-right:1px solid var(--color-divider);' : '')
                // The grid opens and closes without a rule; only the seam
                // between rows is drawn, so the last row carries no bottom.
                . ($ucIsLastRow ? '' : 'border-bottom:1px solid var(--color-divider)');
        ?>
            <article
                data-erp-uc-card
                itemprop="itemListElement"
                itemscope
                itemtype="https://schema.org/Thing"
                style="<?= $ucCardStyle ?>"
            >
                <?php /* The design's pill row, widened to carry the commissioned icon.
                         align-items:center rather than baseline: a 36px icon has no
                         baseline to share with a 10px pill. min-height holds the row
                         open on a card that has one but not the other. */ ?>
                <?php if ($ucCard['badge'] !== '' || $ucCard['icon'] !== null || !empty($ucCard['icon_src'])): ?>
                    <div style="display:flex;align-items:center;justify-content:space-between;gap:12px;min-height:36px">
                        <?php if ($ucCard['badge'] !== ''): ?>
                            <span style="display:inline-block;padding:4px 12px;font-size:10px;font-weight:600;letter-spacing:0.16em;text-transform:uppercase;<?= $ucIndex === 0 ? 'background:var(--color-accent);color:#f3f2f2' : 'border:1px solid var(--color-text)' ?>">
                                <?= htmlspecialchars($ucCard['badge'], ENT_QUOTES) ?>
                            </span>
                        <?php endif; ?>

                        <?php if ($ucCard['icon'] !== null): ?>
                            <span class="erp-uc-icon" aria-hidden="true" style="display:block;width:36px;height:36px;margin-left:auto"><?= $ucCard['icon'] ?></span>
                        <?php elseif (!empty($ucCard['icon_src'])): ?>
                            <?php /* Icon file unreadable: the layout survives, only the
                                     CSS tint is lost. */ ?>
                            <img
                                class="erp-uc-icon"
                                src="<?= htmlspecialchars(asset($ucCard['icon_src']), ENT_QUOTES) ?>"
                                alt=""
                                aria-hidden="true"
                                width="36"
                                height="36"
                                loading="lazy"
                                decoding="async"
                                style="display:block;width:36px;height:36px;margin-left:auto"
                            >
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php if ($ucCard['label'] !== ''): ?>
                    <h3 itemprop="name" data-erp-uc-title style="margin:20px 0 12px;font-size:clamp(21px,1.9vw,26px);letter-spacing:-0.025em">
                        <?= htmlspecialchars($ucCard['label'], ENT_QUOTES) ?>
                    </h3>
                <?php endif; ?>

                <?php if ($ucCard['description'] !== ''): ?>
                    <p itemprop="description" style="margin:0 0 16px;font-size:15px;line-height:1.6;color:color-mix(in srgb, var(--color-text) 76%, transparent)">
                        <?= htmlspecialchars($ucCard['description'], ENT_QUOTES) ?>
                    </p>
                <?php endif; ?>

                <?php if ($ucCard['audience'] !== ''): ?>
                    <?php /* "For" is the section's own label word, not config copy —
                             config stores the audience alone. It was hard-coded in the
                             previous build for the same reason; keep it that way. */ ?>
                    <p style="margin:0;font-size:12px;font-weight:600;letter-spacing:0.06em;text-transform:uppercase;color:color-mix(in srgb, var(--color-text) 55%, transparent)">
                        For <?= htmlspecialchars($ucCard['audience'], ENT_QUOTES) ?>
                    </p>
                <?php endif; ?>
            </article>
        <?php endforeach; ?>
    </div>

    <?php if (!empty($ucCta['label']) && !empty($ucCta['url'])): ?>
        <p data-erp-cta-inline style="margin:28px 0 0;font-size:15.5px">
            <?php if (!empty($ucCta['lead'])): ?>
                <span style="color:color-mix(in srgb, var(--color-text) 65%, transparent)"><?= htmlspecialchars($ucCta['lead'], ENT_QUOTES) ?></span>
            <?php endif; ?>

            <a
                data-arrow
                href="<?= htmlspecialchars(route_url($ucCta['url']), ENT_QUOTES) ?>"
                style="font-weight:600;color:var(--color-accent-700);text-decoration:none;border-bottom:1px solid color-mix(in srgb, var(--color-accent) 40%, transparent)"
            >
                <?= htmlspecialchars($ucCta['label'], ENT_QUOTES) ?>
                <span data-arrow-g aria-hidden="true">&rarr;</span>
            </a>
        </p>
    <?php endif; ?>
    </div>
</section>
