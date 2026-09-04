<?php
/**
 * Riyadh §14 — ZATCA, PDPL and data residency.
 *
 * THE section on this page. The live page it replaces mentions neither ZATCA nor
 * PDPL nor SDAIA anywhere, which is the single biggest reason it ranked at
 * position 15 and converted nothing.
 *
 * A NEW COMPONENT, closely modelled on erp/gcc-compliance.php — same 2px
 * opening rule, same hairline row dividers, same fixed label column against
 * fluid prose, same two pill variants — but with a row shape that partial
 * cannot express. Its rows carry ONE `text` string. These rows carry:
 *
 *   paragraphs[]  two paragraphs, because the regulation and the deadline that
 *                 triggers it are separate thoughts and the deck writes them so
 *   caveat        the failure mode, set apart — this is the sentence a reader
 *                 who already knows the regulation is actually here for
 *   sources       a DATED attribution line
 *
 * The sources line is why this is not a config-shape compromise. §17 of this
 * page stakes the whole document's credibility on "where we cite a number on
 * this page, the source and date are next to it". Folding four fields into one
 * string would have deleted the thing that sentence promises, on the one
 * section carrying every regulatory number the page makes.
 *
 * THE PILL IS DRIVEN BY `tag`, NEVER BY THE HEADING. A row with a tag gets the
 * accent-filled pill; `tag => null` is the no-mandate flag and gets the muted
 * outline, exactly as `scheme => null` does on the ERP page. The Vision 2030
 * row is market context rather than a regulation, and that is the only reason
 * it renders differently — do not give it a pill to make the section look tidy.
 *
 * REGULATORY CONTENT WITH LIVE DEADLINES. Every date and threshold lives in
 * config/riyadh_page.php, never in this file, and must be re-verified against
 * ZATCA and SDAIA before each publish.
 *
 * HEADING LEVELS: the section is an <h2> and each row an <h3>. There is no <h4>
 * — the caveat and the sources are paragraphs, not headings.
 *
 * SCOPE: `include`d into one shared variable scope; variables are prefixed
 * `riyCmpl*`.
 *
 * @var array $erp  config('riyadh_page')
 */
$riyCmpl = $erp['compliance'] ?? [];
if (empty($riyCmpl['title']) || empty($riyCmpl['rows'])) {
    return;
}

$riyCmplRows    = array_values($riyCmpl['rows']);
$riyCmplLastKey = array_key_last($riyCmplRows);
$riyCmplCta     = $erp['inline_ctas']['gcc_compliance'] ?? null;

$riyCmplRule    = '1px solid var(--color-divider)';
$riyCmplDimInk  = 'color-mix(in srgb, var(--color-text) 78%, transparent)';

// The two pill variants, written side by side so the difference is legible.
$riyCmplPillBase = 'display:inline-block;margin-top:12px;padding:5px 10px;font-size:10px;font-weight:600;letter-spacing:0.14em;text-transform:uppercase;line-height:1.2';
$riyCmplPillOn   = $riyCmplPillBase . ';background:var(--color-accent);color:#f3f2f2';
$riyCmplPillOff  = $riyCmplPillBase . ';border:1px solid color-mix(in srgb, var(--color-text) 30%, transparent);color:color-mix(in srgb, var(--color-text) 60%, transparent)';
?>

<section
    id="<?= htmlspecialchars($riyCmpl['id'] ?? 'riyadh-compliance', ENT_QUOTES) ?>"
    aria-labelledby="riyadh-compliance-heading"
    data-section-riyadh-compliance
    data-erp-bleed
    style="scroll-margin-top:16px;padding:clamp(56px,6.5vw,104px) clamp(20px,4.5vw,72px);border-top:2px solid var(--color-divider);background:var(--color-surface)"
>
    <div data-erp-wrap>

        <div data-stack data-reveal style="display:grid;grid-template-columns:minmax(0,1.2fr) minmax(0,0.8fr);gap:clamp(24px,3vw,56px);align-items:end">
            <div>
                <?php if (!empty($riyCmpl['eyebrow'])): ?>
                    <p style="display:flex;align-items:center;gap:12px;margin:0;font-size:11px;font-weight:600;letter-spacing:0.22em;text-transform:uppercase;color:var(--color-accent-700)">
                        <span aria-hidden="true" style="display:block;width:32px;height:2px;background:var(--color-accent);flex:none"></span><?= htmlspecialchars($riyCmpl['eyebrow'], ENT_QUOTES) ?>
                    </p>
                <?php endif; ?>
                <h2 id="riyadh-compliance-heading" style="margin:18px 0 0;font-size:clamp(32px,3.6vw,52px);line-height:1.02;letter-spacing:-0.035em;max-width:18ch">
                    <?= htmlspecialchars($riyCmpl['title'], ENT_QUOTES) ?>
                </h2>
            </div>
            <?php if (!empty($riyCmpl['intro'])): ?>
                <p style="margin:0;font-size:15.5px;line-height:1.6;color:color-mix(in srgb, var(--color-text) 70%, transparent)">
                    <?= htmlspecialchars($riyCmpl['intro'], ENT_QUOTES) ?>
                </p>
            <?php endif; ?>
        </div>

        <div data-reveal style="margin-top:clamp(36px,4vw,60px);border-top:2px solid var(--color-text)">
            <?php foreach ($riyCmplRows as $riyCmplIdx => $riyCmplRow): ?>
                <?php
                $riyCmplIsLast = ($riyCmplIdx === $riyCmplLastKey);
                $riyCmplTag    = trim((string) ($riyCmplRow['tag'] ?? ''));
                ?>
                <div data-stack style="display:grid;grid-template-columns:minmax(0,320px) minmax(0,1fr);gap:clamp(20px,3vw,48px);padding:28px 0;border-bottom:<?= $riyCmplIsLast ? '2px solid var(--color-divider)' : $riyCmplRule ?>">

                    <?php /* Label column: icon, heading, pill. */ ?>
                    <div>
                        <?php if (!empty($riyCmplRow['marker'])): ?>
                            <?php /* Decorative — the heading beside it already
                                     names the regulation, so an alt would be the
                                     same words twice. Intrinsic size is declared
                                     because every image on this page must carry
                                     width/height; 28x28 is the drawn size. */ ?>
                            <img
                                src="<?= htmlspecialchars(asset($riyCmplRow['marker']), ENT_QUOTES) ?>"
                                alt=""
                                aria-hidden="true"
                                width="28"
                                height="28"
                                loading="lazy"
                                decoding="async"
                                style="display:block;width:28px;height:28px;margin-bottom:14px"
                            >
                        <?php endif; ?>

                        <h3 style="margin:0;font-size:clamp(22px,2.2vw,30px);letter-spacing:-0.025em;line-height:1.1">
                            <?= htmlspecialchars($riyCmplRow['heading'] ?? '', ENT_QUOTES) ?>
                        </h3>

                        <?php /* A missing tag renders NO pill. The ERP page's
                                 equivalent draws a muted "no mandate" outline
                                 there, but that variant needs a label and the
                                 deck supplies no copy for one — and inventing a
                                 caption for a compliance chip is exactly the
                                 kind of thing this page must not do. The pill
                                 variables above keep both treatments defined so
                                 the outline is one config string away if
                                 approved copy ever arrives. */ ?>
                        <?php if ($riyCmplTag !== ''): ?>
                            <p style="margin:0">
                                <span style="<?= $riyCmplPillOn ?>"><?= htmlspecialchars($riyCmplTag, ENT_QUOTES) ?></span>
                            </p>
                        <?php endif; ?>
                    </div>

                    <?php /* Prose column: paragraphs, then the caveat, then the
                             dated sources line. */ ?>
                    <div>
                        <?php foreach (array_values($riyCmplRow['paragraphs'] ?? []) as $riyCmplPIdx => $riyCmplPara): ?>
                            <p style="margin:<?= $riyCmplPIdx === 0 ? '0' : '14px' ?> 0 0;font-size:15px;line-height:1.65;max-width:76ch;color:<?= $riyCmplDimInk ?>">
                                <?= htmlspecialchars($riyCmplPara, ENT_QUOTES) ?>
                            </p>
                        <?php endforeach; ?>

                        <?php if (!empty($riyCmplRow['caveat'])): ?>
                            <p style="margin:18px 0 0;max-width:76ch;font-size:15px;font-weight:600;line-height:1.6;border-left:4px solid var(--color-accent);padding-left:18px">
                                <?= htmlspecialchars($riyCmplRow['caveat'], ENT_QUOTES) ?>
                            </p>
                        <?php endif; ?>

                        <?php if (!empty($riyCmplRow['sources'])): ?>
                            <p style="margin:16px 0 0;font-size:12px;line-height:1.5;color:color-mix(in srgb, var(--color-text) 55%, transparent)">
                                <span style="font-weight:600;letter-spacing:0.1em;text-transform:uppercase">Sources</span>
                                <cite style="font-style:normal"><?= htmlspecialchars($riyCmplRow['sources'], ENT_QUOTES) ?></cite>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <?php if (!empty($riyCmpl['closing']) || !empty($riyCmplCta['label'])): ?>
            <div data-reveal data-stack style="display:grid;grid-template-columns:minmax(0,1fr) auto;gap:24px;align-items:center;margin-top:clamp(28px,3vw,44px)">
                <p style="margin:0;max-width:76ch;font-size:16px;font-weight:600;line-height:1.6">
                    <?= htmlspecialchars($riyCmpl['closing'] ?? '', ENT_QUOTES) ?>
                </p>
                <?php if (!empty($riyCmplCta['label']) && !empty($riyCmplCta['url'])): ?>
                    <p data-erp-cta-inline style="margin:0;font-size:15px">
                        <a
                            data-arrow
                            href="<?= htmlspecialchars(route_url($riyCmplCta['url']), ENT_QUOTES) ?>"
                            style="font-weight:600;color:var(--color-accent-700);text-decoration:none;border-bottom:1px solid color-mix(in srgb, var(--color-accent) 40%, transparent)"
                        >
                            <?= htmlspecialchars($riyCmplCta['label'], ENT_QUOTES) ?>
                            <span data-arrow-g aria-hidden="true">&rarr;</span>
                        </a>
                    </p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
