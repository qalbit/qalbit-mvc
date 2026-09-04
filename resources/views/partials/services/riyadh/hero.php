<?php
/**
 * Riyadh §1 — hero.
 *
 * A FORK OF partials/services/erp/hero.php, and the only reason it is a fork is
 * two hardcoded strings in the original. Everything else in this file is that
 * file, byte for byte, and it must stay that way: if the ERP hero's layout is
 * retuned, port the change here rather than letting the two drift.
 *
 * WHAT WAS CHANGED, AND WHY IT COULD NOT BE A PROP:
 *
 *   1. THE BREADCRUMB. The ERP hero hardcodes Home / Services / {label}, with
 *      `/services/` written into the markup. This page is not a service page.
 *      Rendering "Services" here would put a factually wrong trail on the page
 *      AND contradict the BreadcrumbList JSON-LD, which is Home > Riyadh — a
 *      two-level trail, because /saudi-arabia/ does not exist yet and pointing
 *      structured data at a 404 is worse than a short trail. The level is
 *      removed rather than made configurable.
 *
 *   2. THE ACCENT TOKEN. The ERP hero emphasises the literal string "ERP" via
 *      `preg_replace('/\bERP\b/', ...)`. This page's approved H1 accents
 *      "Riyadh". Worth recording: that regex is why the CRM page's H1 carries
 *      no accent at all — "Custom CRM Development Services" never matches, and
 *      nothing errors, so the emphasis is simply absent there. Here the token
 *      is read from `hero.accent_token` and matched with escape-first
 *      strpos/substr_replace rather than a regex, so a token containing regex
 *      metacharacters or an apostrophe cannot misfire. A miss leaves the
 *      headline unaccented, never fatal.
 *
 * TWO THINGS THIS FORK DELIBERATELY DOES NOT DO:
 *
 *   - It does not fork hero-form.php. That file owns the flash/validation state
 *     for the enquiry card and has no page-specific strings left in it that
 *     config cannot reach; it is included from ../erp/ and stays one file. One
 *     consequence is logged as open item #5: its `data-ga4-lead` attribute is
 *     the literal "erp_scoping_call" on every page that uses it. Lead
 *     attribution itself is correct — `lead_from` and `lead_topic` are config
 *     and carry riyadh values into the CRM — but the GA4 event name is shared.
 *
 *   - It does not touch the ERP file. `git diff` on partials/services/erp/ is
 *     empty for this whole rebuild, by design.
 *
 * SCOPE: `include`d into one shared variable scope, so every variable is
 * prefixed `erpHero*` — the same prefix the original uses, deliberately, since
 * only one of the two heroes is ever included on a given page.
 *
 * @var array $erp  config('riyadh_page')
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
$erpHeroAccentTok = (string) ($erpHeroCfg['accent_token'] ?? '');
$erpHeroH1Html    = htmlspecialchars($erpHeroH1, ENT_QUOTES);

if ($erpHeroAccentTok !== '') {
    // Escape BOTH sides before matching, so the needle and the haystack have
    // been through the same transform and an apostrophe or ampersand in the
    // token cannot miss. A miss is a normal outcome (someone reworded the H1)
    // and leaves the headline unaccented rather than fatal.
    $erpHeroAccentEsc = htmlspecialchars($erpHeroAccentTok, ENT_QUOTES);
    $erpHeroAccentAt  = strpos($erpHeroH1Html, $erpHeroAccentEsc);

    if ($erpHeroAccentAt !== false) {
        $erpHeroH1Html = substr_replace(
            $erpHeroH1Html,
            '<span style="color:var(--color-accent)">' . $erpHeroAccentEsc . '</span>',
            $erpHeroAccentAt,
            strlen($erpHeroAccentEsc)
        );
    }
}

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
<section id="riyadh-overview" data-section-riyadh-hero style="box-sizing:border-box;max-width:85rem;margin:0 auto;padding:clamp(28px,3vw,44px) 1rem 0;scroll-margin-top:16px;width:100%">

    <?php /* Breadcrumb stays an ordered list — it is a sequence, and screen
             readers announce the position. The design's flex row is applied to
             the <ol> itself so the semantics cost nothing visually. */ ?>
    <nav aria-label="Breadcrumb" style="font-size:11px;letter-spacing:0.08em;text-transform:uppercase;color:<?= $erpHeroDimInk ?>">
        <ol style="display:flex;flex-wrap:wrap;align-items:center;gap:10px;margin:0;padding:0;list-style:none">
            <li><a href="<?= htmlspecialchars(route_url('/'), ENT_QUOTES) ?>" style="color:inherit;text-decoration:none">Home</a></li>
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
                        <?php /* data-erp-hero-proof-col: the labels are one line
                                 at desktop and up to three on a phone, so the big
                                 numbers below them landed on three different
                                 baselines — a staircase. The integrator rule
                                 bottom-aligns the values instead. */ ?>
                        <div data-erp-hero-proof-col style="padding:<?= $erpHeroPad ?><?= $erpHeroLast ? '' : ';border-right:' . $erpHeroRule ?>">
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
        <?php include __DIR__ . '/../erp/hero-form.php'; ?>
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
                <?php /* data-erp-hero-snap-col: this strip collapses to one column at
                         [data-stack-sm], where the divider on each cell's right
                         edge and its one-sided padding stop describing a row.
                         The integrator rule unwinds both. */ ?>
                <div data-erp-hero-snap-col style="padding:<?= $erpHeroPad ?><?= $erpHeroLast ? '' : ';border-right:' . $erpHeroRule ?>">
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
