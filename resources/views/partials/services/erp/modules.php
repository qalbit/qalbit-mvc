<?php
/**
 * ERP §5 — ERP modules we build.
 *
 * Replaces the shared `service-capabilities.php` for this page only. That
 * partial is shared with 12 service pages and 8 hire pages, so it could not be
 * restyled without touching all of them. Content still comes from the same
 * place — config('services.erp_development.capabilities') — so nothing was
 * duplicated.
 *
 * Rebuilt to the new page design: the section is the page's dark band
 * (`--color-text` ground, `#f3f2f2` type), the six modules sit in a 3-column
 * grid whose 1px gaps show the background through as hairlines, and the LAST
 * cell is filled `--color-accent` as the section's single accent. A dashboard
 * still frame sits under the grid, and the trailing outline button carries the
 * module-scope CTA.
 *
 * Layout is inline styles + design tokens, as the rest of the redesigned page
 * is. Two things still need CSS, and both are load-bearing:
 *
 *   1. Icons are INLINED rather than referenced with <img>. An <img> is an
 *      opaque document: external CSS cannot reach inside it, so the icons could
 *      not be recoloured for a dark ground without shipping a second set of
 *      files. Inlining lets one set serve both grounds. `.erp-mod-icon svg`
 *      remaps the files' `#0F172A` stroke to near-white and their `#0066FF`
 *      accent stroke to a lighter blue, and `.erp-mod-cell--accent` takes
 *      everything to solid white on the filled cell. Both class hooks are kept
 *      here for exactly that reason — they carry no layout any more.
 *   2. The icon files declare `width="48" height="48"` on the <svg> element
 *      itself, and a presentation attribute beats the parent's inline size. So
 *      the 36px render size can only come from a rule on `.erp-mod-icon svg`;
 *      the span's inline size below is a floor, not the mechanism.
 *
 * Falls back to <img> if an icon file is unreadable — the layout survives, only
 * the dark-ground recolour is lost.
 *
 * The design's figure carries a caption. There is no caption in config and copy
 * is never written into a partial, so it renders only once someone adds
 * `capabilities.dashboard_caption`; until then the frame stands on its own.
 *
 * THE FRAME RATIO TRACKS THE ASSET, it is not a clamped height. The comp used
 * `height:clamp(240px,30vw,520px)` and `object-fit:cover`, which crops — fine
 * for a photograph, wrong for a screenshot, which has no spare margin to lose.
 * A first 16:9 dashboard lost its whole metric row and had its panel titles
 * sliced through the middle, reading as broken rather than cropped.
 * The asset was re-shot at 2.56:1 so the picture IS the band, and the frame is
 * pinned to that same ratio, so nothing is cropped at any width. At 1440px this
 * lands at ~519px tall, which is the comp's intended proportion anyway.
 * REPLACING THE ASSET MEANS CHANGING THIS RATIO AND THE width/height
 * attributes together — all three describe the same picture.
 *
 * @var array $service  config('services.erp_development')
 * @var array $erp      config('erp_page')
 */
$erpModCaps = $service['capabilities'] ?? [];
if (empty($erpModCaps['items'])) {
    return;
}
$erpModItems   = $erpModCaps['items'];
$erpModCount   = count($erpModItems);
$erpModCta     = $erp['inline_ctas']['module_scope'] ?? null;
$erpModCaption = $erpModCaps['dashboard_caption'] ?? null;

/**
 * Read an icon off disk for inlining. Confined to the icons directory: the
 * path comes from config, but a realpath check keeps a future typo from
 * reading anything outside it.
 */
$erpInlineIcon = static function (?string $rel): ?string {
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

    // Drop the XML prolog and any comments; keep the <svg> element itself.
    $svg = preg_replace('/<\?xml.*?\?>|<!--.*?-->/s', '', $svg);

    return $cache[$rel] = trim($svg);
};
?>

<section
    id="<?= htmlspecialchars($erpModCaps['id'] ?? 'erp-modules', ENT_QUOTES) ?>"
    aria-labelledby="erp-modules-heading"
    data-section-erp-modules
    data-erp-bleed
    style="scroll-margin-top:16px;background:var(--color-text);color:#f3f2f2;padding:clamp(56px,6.5vw,104px) clamp(20px,4.5vw,72px)"
>
    <div data-erp-wrap>
    <div data-stack="" style="display:grid;grid-template-columns:minmax(0,1.2fr) minmax(0,0.8fr);gap:clamp(24px,3vw,56px);align-items:end">
        <div>
            <?php if (!empty($erpModCaps['eyebrow'])): ?>
                <p style="display:flex;align-items:center;gap:12px;margin:0;font-size:11px;font-weight:600;letter-spacing:0.22em;text-transform:uppercase;color:var(--color-accent-400)"><span style="display:block;width:32px;height:2px;background:var(--color-accent)"></span><?= htmlspecialchars($erpModCaps['eyebrow'], ENT_QUOTES) ?></p>
            <?php endif; ?>
            <h2 id="erp-modules-heading" style="margin:18px 0 0;font-size:clamp(34px,4vw,58px);line-height:1;letter-spacing:-0.04em;color:#f3f2f2">
                <?= htmlspecialchars($erpModCaps['title'] ?? '', ENT_QUOTES) ?>
            </h2>
        </div>
        <?php if (!empty($erpModCaps['intro'])): ?>
            <p style="margin:0;font-size:15.5px;line-height:1.6;color:color-mix(in srgb, #f3f2f2 70%, transparent)">
                <?= htmlspecialchars($erpModCaps['intro'], ENT_QUOTES) ?>
            </p>
        <?php endif; ?>
    </div>

    <?php /* gap:1px over a lit background is the hairline grid — no cell borders.
             The grid opens and closes without a rule; only the seams BETWEEN cells
             are drawn, so the block is not bracketed top and bottom. */ ?>
    <div data-stack="" data-stack-sm="" style="display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:1px;margin-top:clamp(36px,4vw,60px);background:color-mix(in srgb, #f3f2f2 22%, transparent)">
        <?php
        foreach ($erpModItems as $erpModIndex => $erpModItem):
            $erpModIsAccent = ($erpModIndex === $erpModCount - 1);
            $erpModIcon     = $erpInlineIcon($erpModItem['icon'] ?? null);
        ?>
            <article
                <?= $erpModIsAccent ? 'class="erp-mod-cell--accent" ' : '' ?>style="background:<?= $erpModIsAccent ? 'var(--color-accent)' : 'var(--color-text)' ?>;<?= $erpModIsAccent ? 'color:#f3f2f2;' : '' ?>padding:clamp(24px,2.4vw,34px)"
            >
                <?php /* The design's numeral row, widened to carry the commissioned icon.
                         align-items:center rather than the design's baseline: a 36px icon
                         has no baseline to share with a 13px numeral. */ ?>
                <div style="display:flex;align-items:center;justify-content:space-between;gap:12px;min-height:36px">
                    <?php if ($erpModIcon !== null): ?>
                        <span class="erp-mod-icon" aria-hidden="true" style="display:block;width:36px;height:36px"><?= $erpModIcon ?></span>
                    <?php elseif (!empty($erpModItem['icon'])): ?>
                        <img
                            class="erp-mod-icon"
                            src="<?= asset($erpModItem['icon']) ?>"
                            alt=""
                            aria-hidden="true"
                            width="36"
                            height="36"
                            loading="lazy"
                            decoding="async"
                            style="display:block;width:36px;height:36px"
                        >
                    <?php endif; ?>
                    <span aria-hidden="true" style="font-family:var(--font-heading);font-weight:700;font-size:13px;color:<?= $erpModIsAccent ? '#f3f2f2' : 'var(--color-accent)' ?>"><?= str_pad((string) ($erpModIndex + 1), 2, '0', STR_PAD_LEFT) ?></span>
                </div>

                <h3 style="margin:22px 0 12px;font-size:21px;letter-spacing:-0.02em;color:#f3f2f2">
                    <?= htmlspecialchars($erpModItem['label'] ?? '', ENT_QUOTES) ?>
                </h3>
                <p style="margin:0;font-size:14.5px;line-height:1.6<?= $erpModIsAccent ? '' : ';color:color-mix(in srgb, #f3f2f2 68%, transparent)' ?>">
                    <?= htmlspecialchars($erpModItem['description'] ?? '', ENT_QUOTES) ?>
                </p>
            </article>
        <?php endforeach; ?>
    </div>

    <figure style="margin:clamp(28px,3vw,44px) 0 0">
        <div style="position:relative;width:100%;aspect-ratio:1600/625;border:1px solid color-mix(in srgb, #f3f2f2 28%, transparent)">
            <img
                src="<?= asset('/images/services/erp-modules-dashboard.webp') ?>"
                alt=""
                aria-hidden="true"
                width="1600"
                height="625"
                loading="lazy"
                decoding="async"
                style="width:100%;height:100%;object-fit:cover;display:block"
            >
        </div>
        <?php if (!empty($erpModCaption)): ?>
            <figcaption style="margin-top:10px;font-size:11px;letter-spacing:0.14em;text-transform:uppercase;color:color-mix(in srgb, #f3f2f2 55%, transparent)">
                <?= htmlspecialchars($erpModCaption, ENT_QUOTES) ?>
            </figcaption>
        <?php endif; ?>
    </figure>

    <?php if (!empty($erpModCta['label']) && !empty($erpModCta['url'])): ?>
        <?php /* Outline button on the dark ground. `data-erp-cta-button` rather than
                 `data-erp-cta-inline`: the seven inline CTA paragraphs already carry
                 that one, and an unscoped querySelector in a test grabbed the wrong
                 element when this button shared it. */ ?>
        <div style="margin-top:36px">
            <a
                href="<?= htmlspecialchars(route_url($erpModCta['url']), ENT_QUOTES) ?>"
                class="erp-btn"
                data-erp-cta-button
                style="border-color:color-mix(in srgb, #f3f2f2 45%, transparent);color:#f3f2f2;padding:14px 20px;font-size:14px"
            >
                <?= htmlspecialchars($erpModCta['label'], ENT_QUOTES) ?>
            </a>
        </div>
    <?php endif; ?>
    </div>
</section>
