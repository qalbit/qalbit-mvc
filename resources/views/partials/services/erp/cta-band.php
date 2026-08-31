<?php
/**
 * ERP page – full-width CTA band. Two variants, one partial.
 *
 * Included three times by pages/services/erp-development.php: after §3
 * (build_vs_buy), after §9 (industry) and as §17 (final). The first two are the
 * accent "poster" — a flat --color-accent slab carrying `data-poster`, the hook
 * the page script uses to repaint every poster in one pass if the accent-poster
 * treatment is ever switched to the dark one. The third is the dark closing
 * band: same grid, but bigger type, two paragraphs and a trailing meta line.
 *
 * The closing band grounds on --color-deep, the footer's colour, NOT on
 * --color-text like the other dark sections: it is the last thing above the
 * footer and the two are meant to read as a single block with no seam.
 *
 * WHICH VARIANT: the template sets $erpBandVariant ('poster' | 'final')
 * immediately before each include; anything else, including "not set at all",
 * renders the poster. That variable is CONSUMED here (unset at the end of the
 * read) rather than left standing, because these are `include`s sharing one
 * variable scope — a leftover 'final' from band 3 would silently turn a band
 * added below it into a dark slab. The variant is NOT inferred from the band's
 * shape: `meta`/`body_2` are optional content keys, not layout switches, and a
 * poster that later gains a second line of copy must stay a poster.
 *
 * HEADING SIZE ON POSTERS: the design draws the two posters at slightly
 * different sizes — 64px/16ch for the short build-vs-buy question, 60px/18ch
 * for the much longer industry sentence — so both land on three lines against
 * the button column. That is a function of title length, not of which band it
 * is (the partial has no way to know the config key it was handed), so it is
 * expressed as a length threshold that reproduces the design exactly for both
 * of today's posters and degrades sensibly for any third one.
 *
 * The final band's heading is rendered WHOLE. The design hand-splits it across
 * two lines with an accent-coloured second phrase; our title is a single config
 * string and splitting it here would mean deciding, in a template, where a
 * sentence breaks — so the grid column does the wrapping instead.
 *
 * All copy comes from config('erp_page.bands.*'). Nothing here is hard-coded.
 *
 * @var array       $erpBand         config('erp_page.bands.<key>') —
 *                                   ['title','body','primary_label','primary_url',
 *                                    'secondary_label','secondary_url',
 *                                    'id'?,'body_2'?,'meta'?]
 * @var string|null $erpBandVariant  'poster' (default) | 'final'
 */
$erpBand = $erpBand ?? [];
if (empty($erpBand['title'])) {
    return;
}

$erpBandIsFinal = ($erpBandVariant ?? 'poster') === 'final';
unset($erpBandVariant); // see WHICH VARIANT above — do not let it leak forward.

// Only the final band carries an id (#erp-final-cta), and it is an in-page
// anchor target: no section links to it today, but the id is published, so
// treat it as load-bearing. Take it from config exactly as the previous
// version did; never synthesise one for the posters.
$erpBandId = $erpBand['id'] ?? null;

// Posters: long titles step down a notch and get a wider measure.
$erpBandTitleIsLong = mb_strlen($erpBand['title']) > 45;
$erpBandPosterHeading = $erpBandTitleIsLong
    ? 'font-size:clamp(32px,4.2vw,60px);letter-spacing:-0.04em;max-width:18ch'
    : 'font-size:clamp(34px,4.4vw,64px);letter-spacing:-0.04em;max-width:16ch';

// Final band: the first paragraph sits tight under the second when there is
// one, and takes the full pre-button gap when there is not.
$erpBandBodyGap = !empty($erpBand['body_2']) ? '14px' : '26px';

// Muted foreground on the dark band, matching the design's two mixes.
$erpBandDim  = 'color-mix(in srgb, #f3f2f2 78%, transparent)';
$erpBandFine = 'color-mix(in srgb, #f3f2f2 55%, transparent)';
?>

<?php if ($erpBandIsFinal): ?>

    <section
        <?= $erpBandId ? 'id="' . htmlspecialchars($erpBandId, ENT_QUOTES) . '"' : '' ?>
        data-erp-cta-band
        data-erp-bleed
        style="background:var(--color-deep);color:#f3f2f2;padding:clamp(60px,7vw,116px) clamp(20px,4.5vw,72px)"
    >
        <div data-erp-wrap data-stack style="display:grid;grid-template-columns:minmax(0,1.15fr) minmax(0,0.85fr);gap:clamp(28px,3.5vw,64px);align-items:end">
            <h2 style="margin:0;font-size:clamp(40px,6vw,88px);line-height:0.95;letter-spacing:-0.045em;color:#f3f2f2">
                <?= htmlspecialchars($erpBand['title'], ENT_QUOTES) ?>
            </h2>

            <div>
                <?php if (!empty($erpBand['body'])): ?>
                    <p style="margin:0 0 <?= $erpBandBodyGap ?>;font-size:16px;line-height:1.6;color:<?= $erpBandDim ?>">
                        <?= htmlspecialchars($erpBand['body'], ENT_QUOTES) ?>
                    </p>
                <?php endif; ?>

                <?php if (!empty($erpBand['body_2'])): ?>
                    <p style="margin:0 0 26px;font-size:16px;line-height:1.6;color:<?= $erpBandDim ?>">
                        <?= htmlspecialchars($erpBand['body_2'], ENT_QUOTES) ?>
                    </p>
                <?php endif; ?>

                <div style="display:flex;flex-wrap:wrap;gap:12px">
                    <?php if (!empty($erpBand['primary_label']) && !empty($erpBand['primary_url'])): ?>
                        <a
                            href="<?= htmlspecialchars(route_url($erpBand['primary_url']), ENT_QUOTES) ?>"
                            class="erp-btn erp-btn-primary"
                            style="padding:16px 22px;font-size:15px"
                        >
                            <?= htmlspecialchars($erpBand['primary_label'], ENT_QUOTES) ?>
                        </a>
                    <?php endif; ?>

                    <?php if (!empty($erpBand['secondary_label']) && !empty($erpBand['secondary_url'])): ?>
                        <a
                            href="<?= htmlspecialchars(route_url($erpBand['secondary_url']), ENT_QUOTES) ?>"
                            class="erp-btn"
                            style="border-color:color-mix(in srgb, #f3f2f2 45%, transparent);color:#f3f2f2;padding:16px 22px;font-size:15px"
                        >
                            <?= htmlspecialchars($erpBand['secondary_label'], ENT_QUOTES) ?>
                        </a>
                    <?php endif; ?>
                </div>

                <?php if (!empty($erpBand['meta'])): ?>
                    <p style="margin:20px 0 0;font-size:12.5px;color:<?= $erpBandFine ?>">
                        <?= htmlspecialchars($erpBand['meta'], ENT_QUOTES) ?>
                    </p>
                <?php endif; ?>
            </div>
        </div>
    </section>

<?php else: ?>

    <section
        <?= $erpBandId ? 'id="' . htmlspecialchars($erpBandId, ENT_QUOTES) . '"' : '' ?>
        data-poster
        data-erp-cta-band
        data-erp-bleed
        style="background:var(--color-accent);color:#f3f2f2;padding:clamp(52px,6vw,92px) clamp(20px,4.5vw,72px)"
    >
        <div data-erp-wrap data-stack style="display:grid;grid-template-columns:minmax(0,1.25fr) minmax(0,0.75fr);gap:clamp(28px,3.5vw,56px);align-items:end">
            <h2 style="margin:0;line-height:1;<?= $erpBandPosterHeading ?>">
                <?= htmlspecialchars($erpBand['title'], ENT_QUOTES) ?>
            </h2>

            <div>
                <?php if (!empty($erpBand['body'])): ?>
                    <p style="margin:0 0 24px;font-size:15.5px;line-height:1.6">
                        <?= htmlspecialchars($erpBand['body'], ENT_QUOTES) ?>
                    </p>
                <?php endif; ?>

                <div style="display:flex;flex-wrap:wrap;gap:12px">
                    <?php if (!empty($erpBand['primary_label']) && !empty($erpBand['primary_url'])): ?>
                        <a
                            href="<?= htmlspecialchars(route_url($erpBand['primary_url']), ENT_QUOTES) ?>"
                            class="erp-btn"
                            style="background:#f3f2f2;color:var(--color-text);padding:14px 20px;font-size:14px"
                        >
                            <?= htmlspecialchars($erpBand['primary_label'], ENT_QUOTES) ?>
                        </a>
                    <?php endif; ?>

                    <?php if (!empty($erpBand['secondary_label']) && !empty($erpBand['secondary_url'])): ?>
                        <a
                            href="<?= htmlspecialchars(route_url($erpBand['secondary_url']), ENT_QUOTES) ?>"
                            class="erp-btn"
                            style="border-color:#f3f2f2;color:#f3f2f2;padding:14px 20px;font-size:14px"
                        >
                            <?= htmlspecialchars($erpBand['secondary_label'], ENT_QUOTES) ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

<?php endif; ?>
