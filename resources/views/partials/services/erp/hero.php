<?php
/**
 * ERP §1 — hero.
 *
 * Rebuilt on the new editorial system: flat ground, hairline rules, no cards,
 * no shadows. Everything is inline styles driving the page-wide tokens
 * (--color-text, --color-accent*, --color-divider, --font-heading) so this
 * section carries its own layout and cannot drift when the shared Tailwind
 * utilities are retuned for the other twenty service pages.
 *
 * Shape: breadcrumb, then a two-column grid — headline column left, the dark
 * enquiry card right (rendered by hero-form.php, kept a separate file because
 * it owns the flash/validation state and nothing else on the page needs it) —
 * and a four-cell snapshot rule closing the section.
 *
 * Copy notes:
 *  - The H1 stays the single approved string from config. The accent on the
 *    "ERP" token is styling applied AFTER escaping, so the rendered text is
 *    byte-identical to config; the design's hard line breaks are deliberately
 *    NOT hard-coded (see max-width below) because they would mean editing copy
 *    from a template.
 *  - `trust_line` is intentionally not rendered: `proof_stats` is the same
 *    claim split into the four-cell rule the design asks for, and printing both
 *    would state the record twice. The version of this partial before the
 *    rebuild read `trust_line` into a variable and never echoed it either, so
 *    no copy is lost here.
 *
 * The `id="erp-overview"` on the section is NEW — the pre-rebuild hero carried
 * no id, and nothing on the site links to `#erp-overview` yet. It is kept
 * because the design specifies it and because it is the only anchor that can
 * mean "top of the page content"; it collides with nothing (grep the repo — this
 * is the sole occurrence). Do not rename it without grepping again.
 *
 * SCOPE: this file is `include`d into the shared page scope, so every variable
 * below is prefixed `$erpHero*`. hero-form.php uses `$erpForm*` for the same
 * reason — do not introduce bare names here.
 *
 * @var array $erp  config('erp_page')
 */
$erpHeroCfg = $erp['hero'] ?? [];

$erpHeroH1       = $erpHeroCfg['h1'] ?? 'Custom ERP Development Services';
$erpHeroSubCopy  = $erpHeroCfg['sub_copy'] ?? [];
$erpHeroProof    = $erpHeroCfg['proof_stats'] ?? [];
$erpHeroSnapshot = $erpHeroCfg['snapshot'] ?? [];
$erpHeroCrumb    = $erpHeroCfg['breadcrumb_label'] ?? 'ERP development';
$erpHeroKicker   = $erpHeroCfg['kicker_label'] ?? 'Custom ERP software development';

// Emphasising the "ERP" token is presentation, not a copy change: the source
// string is escaped first and only then wrapped, once, so nothing a copywriter
// types in config can inject markup here.
$erpHeroH1Html = preg_replace(
    '/\bERP\b/',
    '<span style="color:var(--color-accent)">ERP</span>',
    htmlspecialchars($erpHeroH1, ENT_QUOTES),
    1
);

// Shared cell rules. The design draws the divider on every cell except the
// last, and pulls the first/last cells flush with the section padding, so the
// rule lines up with the type above it instead of floating inside it.
$erpHeroRule    = '1px solid var(--color-divider)';
$erpHeroDimInk  = 'color-mix(in srgb, var(--color-text) 55%, transparent)';
$erpHeroProofN  = max(1, count($erpHeroProof));
$erpHeroSnapN   = max(1, count($erpHeroSnapshot));
?>

<?php /* The hero is deliberately a little wider than the site header: 85rem
         / 1360px gives its editorial layout more room while retaining the
         header's 16px gutter at smaller widths. */ ?>
<section id="erp-overview" data-section-erp-hero style="box-sizing:border-box;max-width:85rem;margin:0 auto;padding:clamp(28px,3vw,44px) 1rem 0;scroll-margin-top:16px;width:100%">

    <?php /* Breadcrumb stays an ordered list — it is a sequence, and screen
             readers announce the position. The design's flex row is applied to
             the <ol> itself so the semantics cost nothing visually. */ ?>
    <nav aria-label="Breadcrumb" style="font-size:11px;letter-spacing:0.08em;text-transform:uppercase;color:<?= $erpHeroDimInk ?>">
        <ol style="display:flex;flex-wrap:wrap;align-items:center;gap:10px;margin:0;padding:0;list-style:none">
            <li><a href="<?= htmlspecialchars(route_url('/'), ENT_QUOTES) ?>" style="color:inherit;text-decoration:none">Home</a></li>
            <li aria-hidden="true">/</li>
            <li><a href="<?= htmlspecialchars(route_url('/services/'), ENT_QUOTES) ?>" style="color:inherit;text-decoration:none">Services</a></li>
            <li aria-hidden="true">/</li>
            <li aria-current="page" style="color:var(--color-text)"><?= htmlspecialchars($erpHeroCrumb, ENT_QUOTES) ?></li>
        </ol>
    </nav>

    <div data-stack="" style="display:grid;grid-template-columns:minmax(0,1.35fr) minmax(0,26rem);gap:clamp(32px,4vw,64px);align-items:start;margin-top:clamp(28px,3.5vw,52px)">

        <!-- LEFT: headline column -->
        <div>
            <p style="display:flex;align-items:center;gap:12px;margin:0;font-size:11px;font-weight:600;letter-spacing:0.22em;text-transform:uppercase;color:var(--color-accent-700)">
                <span aria-hidden="true" style="display:block;width:32px;height:2px;background:var(--color-accent)"></span><?= htmlspecialchars($erpHeroKicker, ENT_QUOTES) ?>
            </p>

            <?php /* max-width is in `ch`, not hard <br>s: it lands the approved
                     string on the same three lines as the design at every clamp
                     step, without a template deciding where the copy breaks. */ ?>
            <h1 style="margin:20px 0 0;max-width:13ch;font-size:clamp(46px,7vw,104px);line-height:0.92;letter-spacing:-0.045em;text-wrap:balance">
                <?= $erpHeroH1Html ?>
            </h1>

            <?php foreach ($erpHeroSubCopy as $erpHeroI => $erpHeroPara): ?>
                <?php /* First paragraph is the lede; every following one is the
                         accented pull-line the design puts under it. */ ?>
                <p style="<?= $erpHeroI === 0
                    ? 'margin:28px 0 0;max-width:46ch;font-size:clamp(16px,1.3vw,19px);line-height:1.55;color:color-mix(in srgb, var(--color-text) 76%, transparent)'
                    : 'margin:22px 0 0;max-width:44ch;border-left:4px solid var(--color-accent);padding-left:16px;font-size:16px;font-weight:600;line-height:1.45' ?>">
                    <?= htmlspecialchars($erpHeroPara, ENT_QUOTES) ?>
                </p>
            <?php endforeach; ?>

            <?php if (!empty($erpHeroProof)): ?>
                <?php /* dt before dd, label above value — the order the spec
                         wants and the order the design draws, so no CSS `order`
                         trick is needed and nothing is announced twice. */ ?>
                <dl aria-label="Track record" style="display:grid;grid-template-columns:repeat(<?= $erpHeroProofN ?>,minmax(0,1fr));gap:0;margin:clamp(36px,4vw,56px) 0 0;border-top:2px solid var(--color-divider)">
                    <?php foreach ($erpHeroProof as $erpHeroI => $erpHeroStat): ?>
                        <?php
                        $erpHeroLast   = ($erpHeroI === $erpHeroProofN - 1);
                        $erpHeroAccent = !empty($erpHeroStat['accent']);

                        if ($erpHeroI === 0) {
                            $erpHeroPad = '18px 16px 0 0';
                        } elseif ($erpHeroLast) {
                            $erpHeroPad = '18px 0 0 16px';
                        } else {
                            $erpHeroPad = '18px 16px 0';
                        }
                        ?>
                        <div style="padding:<?= $erpHeroPad ?><?= $erpHeroLast ? '' : ';border-right:' . $erpHeroRule ?>">
                            <dt style="font-size:10px;font-weight:600;letter-spacing:0.16em;text-transform:uppercase;color:<?= $erpHeroAccent ? 'var(--color-accent-700)' : $erpHeroDimInk ?>">
                                <?= htmlspecialchars($erpHeroStat['label'] ?? '', ENT_QUOTES) ?>
                            </dt>
                            <dd style="margin:8px 0 0;font-family:var(--font-heading);font-weight:700;font-size:clamp(34px,4vw,52px);line-height:1;letter-spacing:-0.04em<?= $erpHeroAccent ? ';color:var(--color-accent)' : '' ?>">
                                <?= htmlspecialchars($erpHeroStat['value'] ?? '', ENT_QUOTES) ?>
                            </dd>
                        </div>
                    <?php endforeach; ?>
                </dl>
            <?php endif; ?>
        </div>

        <!-- RIGHT: dark enquiry card. Falls below the copy under 900px via
             [data-stack]. The card element itself is the grid child, so
             hero-form.php owns it end to end. -->
        <?php include __DIR__ . '/hero-form.php'; ?>
    </div>

    <?php if (!empty($erpHeroSnapshot)): ?>
        <?php /* Snapshot rule: what we do, who we do it for, how we ship it.
                 Ruled top and bottom so it reads as the seam between the hero
                 and §2 rather than as a fifth block of copy. */ ?>
        <dl data-stack-sm="" style="display:grid;grid-template-columns:repeat(<?= $erpHeroSnapN ?>,minmax(0,1fr));gap:0;margin:clamp(40px,4.5vw,72px) 0 0;border-top:2px solid var(--color-divider);border-bottom:2px solid var(--color-divider)">
            <?php foreach ($erpHeroSnapshot as $erpHeroI => $erpHeroItem): ?>
                <?php
                $erpHeroLast = ($erpHeroI === $erpHeroSnapN - 1);

                if ($erpHeroI === 0) {
                    $erpHeroPad = '20px 20px 22px 0';
                } elseif ($erpHeroLast) {
                    $erpHeroPad = '20px 0 22px 20px';
                } else {
                    $erpHeroPad = '20px';
                }
                ?>
                <div style="padding:<?= $erpHeroPad ?><?= $erpHeroLast ? '' : ';border-right:' . $erpHeroRule ?>">
                    <dt style="font-size:10px;font-weight:600;letter-spacing:0.18em;text-transform:uppercase;color:var(--color-accent-700)">
                        <?= htmlspecialchars($erpHeroItem['label'] ?? '', ENT_QUOTES) ?>
                    </dt>
                    <dd style="margin:10px 0 0;font-size:14px;font-weight:600;line-height:1.45">
                        <?= htmlspecialchars($erpHeroItem['value'] ?? '', ENT_QUOTES) ?>
                    </dd>
                </div>
            <?php endforeach; ?>
        </dl>
    <?php endif; ?>
</section>
