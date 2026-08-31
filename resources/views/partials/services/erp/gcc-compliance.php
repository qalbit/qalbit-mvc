<?php
/**
 * ERP §10 — GCC compliance.
 *
 * Dates verified 31 August 2026 against primary sources. The Saudi block was
 * corrected: Wave 24's deadline had passed and Wave 25 (SAR 187,500, due
 * 1 February 2027) superseded it. See the note in config/erp_page.php for the
 * per-country findings. These are live regulatory deadlines — re-check before
 * each publish. Nothing about the rebuild below changes that: every date still
 * lives in config, never in this file.
 *
 * Rebuilt to the new editorial design. The bordered white panel is gone; the
 * countries are now a stacked list ruled by hairlines only — a 2px rule in
 * `--color-text` across the top, a 1px `--color-divider` under each row and a
 * 2px one under the last. Each row is a two-column grid: a fixed 320px country
 * column (marker + name + scheme pill) against a fluid prose column. The shape
 * still earns itself for the same reason the old table did:
 *
 *  1. The content is reference material — scheme names, deadlines, thresholds,
 *     penalties. A row per country reads the way the reader wants to use it.
 *  2. §9 above is a 2x2 hairline block and §11 below a dark datasheet. A third
 *     card grid here would blur three consecutive sections together.
 *
 * The row weight is keyed off array_key_last() rather than a hard-coded four
 * (or an index-vs-count comparison, which would miss the last row if the
 * countries array ever arrives with non-sequential keys — a filtered config
 * is all it would take), so a fifth country added to config takes the 2px
 * closing rule down with it.
 *
 * THE SCHEME PILL. Two variants, and which one a row gets is decided by config,
 * never by the country name. `scheme => null` IS the no-mandate flag — it is
 * the flag the previous build already keyed on, and Kuwait is the only row
 * carrying it today. A row with a scheme gets the accent-filled pill; a
 * no-mandate row gets the muted outline. An explicit `mandate` boolean in a
 * country row overrides the inference, so a no-mandate market can be given a
 * label without inheriting the accent fill.
 *
 * The design mocks Kuwait with a "No mandate yet" pill. That string is not in
 * config and copy is never written into a partial, so Kuwait renders with no
 * pill until someone adds one — `'scheme' => '…', 'mandate' => false` on that
 * row is all it takes, and the muted variant below picks it up. This is the one
 * place the rendered section deliberately differs from the mock.
 *
 * DELIBERATELY NOT DONE: the dates are not pulled out into headline chips.
 * Surfacing "1 January 2027" as the largest thing in a row would make a
 * time-sensitive figure the most prominent element on screen and would strip
 * the qualifying context the sentence around it carries. They stay in the
 * prose.
 *
 * MUST SURVIVE ANY EDIT:
 *  1. The section id comes from config — `#erp-gcc-compliance` is linked from
 *     the page's own jump list (config/erp_page.php, `ref`).
 *  2. `.erp-gcc-marker` on the marker span. It is the ONLY class left in this
 *     section and it carries no layout: the four commissioned market icons
 *     declare `width="48" height="48"` on the <svg> element itself, and a
 *     presentation attribute beats the parent's inline size, so the 36px render
 *     can only come from the `.erp-gcc-marker svg` rule in CSS. The inline size
 *     on the span is a floor, not the mechanism. Same trap as modules.php.
 *  3. `margin-top:0` on that span, inline. The old CSS lifts the marker by
 *     -0.44rem to sit it against a 1.3em heading line in the previous grid; the
 *     marker and the name are a centred flex pair now, so the lift has to be
 *     cancelled. Inline beats the class rule, which is why it is written here
 *     rather than left for the stylesheet.
 *  4. Namespaced variables. Every local is prefixed `$erpGcc` — the shared
 *     include scope already has an `$inlineCta` from other partials, and the
 *     previous `$gcc` / `$inlineCta` / `$erpCta` in this file were three
 *     collisions waiting to happen.
 *
 * `data-reveal` / `data-stack` / `data-hov` / `data-arrow` / `data-arrow-g` are
 * hooks for the page's existing CSS + JS (scroll reveal, the small-screen
 * collapse of the grids, the hover lift, the arrow nudge). They carry no
 * meaning here; leave them where the design put them.
 *
 * @var array $erp  config('erp_page')
 */
$erpGcc = $erp['gcc'] ?? [];
if (empty($erpGcc['countries'])) {
    return;
}
$erpGccCountries = $erpGcc['countries'];
$erpGccLastKey   = array_key_last($erpGccCountries);
$erpGccCta       = $erp['inline_ctas']['gcc_compliance'] ?? null;

/**
 * Read a market marker off disk for inlining. Markers are inlined rather than
 * referenced with <img> so CSS can size and tint them — see modules.php. The
 * path comes from config, but the realpath check confines it to the icons
 * directory so a future typo cannot read anything outside it. Do not weaken it.
 */
$erpGccInlineIcon = static function (?string $rel): ?string {
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

/* The two pill variants, kept side by side so the difference is legible. */
$erpGccPillMandate = 'display:inline-block;padding:4px 12px;background:var(--color-accent);color:#f3f2f2;font-size:10px;font-weight:600;letter-spacing:0.14em;text-transform:uppercase';
$erpGccPillNone    = 'display:inline-block;padding:4px 12px;border:1px solid color-mix(in srgb, var(--color-text) 45%, transparent);font-size:10px;font-weight:600;letter-spacing:0.14em;text-transform:uppercase;color:color-mix(in srgb, var(--color-text) 65%, transparent)';
?>

<section
    id="<?= htmlspecialchars($erpGcc['id'] ?? 'erp-gcc-compliance', ENT_QUOTES) ?>"
    aria-labelledby="erp-gcc-heading"
    data-section-erp-gcc
    style="scroll-margin-top:16px;padding:clamp(56px,6.5vw,104px) clamp(20px,4.5vw,72px)"
>
    <div data-stack data-reveal style="display:grid;grid-template-columns:minmax(0,1.25fr) minmax(0,0.75fr);gap:clamp(24px,3vw,56px);align-items:end">
        <div>
            <?php if (!empty($erpGcc['eyebrow'])): ?>
                <p style="display:flex;align-items:center;gap:12px;margin:0;font-size:11px;font-weight:600;letter-spacing:0.22em;text-transform:uppercase;color:var(--color-accent-700)"><span aria-hidden="true" style="display:block;width:32px;height:2px;background:var(--color-accent)"></span><?= htmlspecialchars($erpGcc['eyebrow'], ENT_QUOTES) ?></p>
            <?php endif; ?>

            <h2 id="erp-gcc-heading" style="margin:18px 0 0;font-size:clamp(30px,3.4vw,50px);line-height:1.04;letter-spacing:-0.035em;max-width:22ch">
                <?= htmlspecialchars($erpGcc['title'] ?? '', ENT_QUOTES) ?>
            </h2>
        </div>

        <?php if (!empty($erpGcc['intro'])): ?>
            <p style="margin:0;font-size:15.5px;line-height:1.6;color:color-mix(in srgb, var(--color-text) 70%, transparent)">
                <?= htmlspecialchars($erpGcc['intro'], ENT_QUOTES) ?>
            </p>
        <?php endif; ?>
    </div>

    <div data-reveal style="margin-top:clamp(36px,4vw,60px);border-top:2px solid var(--color-text)">
        <?php
        foreach ($erpGccCountries as $erpGccIndex => $erpGccRow):
            $erpGccMarker = $erpGccInlineIcon($erpGccRow['marker'] ?? null);
            $erpGccScheme = trim((string) ($erpGccRow['scheme'] ?? ''));

            /* A missing scheme is the no-mandate flag; `mandate` overrides it. */
            $erpGccHasMandate = array_key_exists('mandate', $erpGccRow)
                ? (bool) $erpGccRow['mandate']
                : ($erpGccScheme !== '');

            $erpGccIsLast = ($erpGccIndex === $erpGccLastKey);
        ?>
            <article
                data-hov
                data-stack
                style="display:grid;grid-template-columns:minmax(0,320px) minmax(0,1fr);gap:clamp(20px,3vw,48px);padding:28px 0;border-bottom:<?= $erpGccIsLast ? '2px' : '1px' ?> solid var(--color-divider)"
            >
                <div>
                    <?php /* Marker and name are a centred pair: a 36px icon has no
                             baseline to share with a clamped 22–30px heading. */ ?>
                    <div style="display:flex;align-items:center;gap:12px">
                        <?php if ($erpGccMarker !== null): ?>
                            <span class="erp-gcc-marker" aria-hidden="true" style="display:block;flex:0 0 auto;width:36px;height:36px;margin-top:0"><?= $erpGccMarker ?></span>
                        <?php elseif (!empty($erpGccRow['marker'])): ?>
                            <?php /* Marker file unreadable: the row survives, only the
                                     CSS tint is lost. */ ?>
                            <img
                                class="erp-gcc-marker"
                                src="<?= htmlspecialchars(asset($erpGccRow['marker']), ENT_QUOTES) ?>"
                                alt=""
                                aria-hidden="true"
                                width="36"
                                height="36"
                                loading="lazy"
                                decoding="async"
                                style="display:block;flex:0 0 auto;width:36px;height:36px;margin-top:0"
                            >
                        <?php endif; ?>

                        <h3 style="margin:0;font-size:clamp(22px,2.2vw,30px);letter-spacing:-0.025em;line-height:1.1">
                            <?= htmlspecialchars($erpGccRow['country'] ?? '', ENT_QUOTES) ?>
                        </h3>
                    </div>

                    <?php if ($erpGccScheme !== ''): ?>
                        <p style="margin:12px 0 0">
                            <span style="<?= $erpGccHasMandate ? $erpGccPillMandate : $erpGccPillNone ?>">
                                <?= htmlspecialchars($erpGccScheme, ENT_QUOTES) ?>
                            </span>
                        </p>
                    <?php endif; ?>
                </div>

                <p style="margin:0;font-size:15px;line-height:1.65;color:color-mix(in srgb, var(--color-text) 78%, transparent)">
                    <?= htmlspecialchars($erpGccRow['text'] ?? '', ENT_QUOTES) ?>
                </p>
            </article>
        <?php endforeach; ?>
    </div>

    <?php if (!empty($erpGcc['closing']) || !empty($erpGccCta['label'])): ?>
        <div data-stack style="display:grid;grid-template-columns:minmax(0,1fr) auto;gap:24px;align-items:start;margin-top:32px">
            <?php if (!empty($erpGcc['closing'])): ?>
                <p style="margin:0;max-width:70ch;font-size:16px;font-weight:600;line-height:1.6">
                    <?= htmlspecialchars($erpGcc['closing'], ENT_QUOTES) ?>
                </p>
            <?php endif; ?>

            <?php if (!empty($erpGccCta['label']) && !empty($erpGccCta['url'])): ?>
                <?php /* Written out here rather than include'd from cta-inline.php:
                         that partial is Tailwind-classed with a left accent rule,
                         which is a different object from the design's plain arrow
                         link. It keeps `data-erp-cta-inline`, the marker all seven
                         of the page's inline CTAs share. */ ?>
                <p data-erp-cta-inline style="margin:0;font-size:15px">
                    <a
                        data-arrow
                        href="<?= htmlspecialchars(route_url($erpGccCta['url']), ENT_QUOTES) ?>"
                        style="font-weight:600;color:var(--color-accent-700);text-decoration:none;border-bottom:1px solid color-mix(in srgb, var(--color-accent) 40%, transparent)"
                    >
                        <?= htmlspecialchars($erpGccCta['label'], ENT_QUOTES) ?>
                        <span data-arrow-g aria-hidden="true">&rarr;</span>
                    </a>
                </p>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</section>
