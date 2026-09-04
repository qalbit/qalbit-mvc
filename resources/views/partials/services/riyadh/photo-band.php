<?php
/**
 * Riyadh §10 — full-bleed photograph band.
 *
 * A FORK OF partials/services/erp/photo-band.php for one reason: that file
 * hardcodes its asset path and intrinsic dimensions in the markup and exposes
 * no config hook at all (it is the only section partial on this design system
 * that reads neither $erp nor $service). Pointing it at a different photograph
 * was not possible without editing a file the ERP and service pages render.
 * Everything below is that file byte for byte apart from the asset path, the
 * width/height pair, and the section marker.
 *
 * THE PHOTOGRAPH. /assets/images/services/riyadh-warehouse-operations.webp —
 * a real Saudi distribution floor: Arabic and English rack signage, Vision 2030
 * wall graphics, "Made in Saudi Arabia" cartons, the Riyadh skyline through the
 * loading door. It replaces the ERP page's generic operations photograph, which
 * this page was borrowing and which showed nothing Saudi at all.
 *
 * INTRINSIC SIZE IS 1983x793, NOT 1600x640. The ERP asset's numbers are wrong
 * for this file and would have reintroduced the CLS the width/height pair
 * exists to prevent. The aspect ratio is 2.50:1 either way — the same ratio the
 * band was designed around — so the clamp height and the object-fit crop
 * behave exactly as they do on the ERP page. If this asset is ever swapped,
 * change the file, the two width/height attributes and this note together.
 *
 * STILL DECORATIVE: alt="" and aria-hidden="true". The band carries no copy and
 * states nothing the sections around it do not already say, so a screen-reader
 * user gains nothing from a description of it. That was a deliberate call for
 * this band and it did not change when the asset did — the deck's §10 alt text
 * ("Operations team reviewing order and stock records on a warehouse floor")
 * is the string to use if it is ever promoted to informative content.
 *
 * The subject sits in the centre third ON PURPOSE, as on the ERP page:
 * object-fit:cover tightens the visible crop from 3.40:1 at 1920px to 1.38:1 at
 * 375px, where only the middle ~55% of the width survives. The scanning worker
 * is centred and survives that crop; the women at the left and right edges are
 * expected to be cropped away on a phone. A replacement centred on something
 * else will lose its subject on mobile.
 *
 * On hover a colour copy is revealed through a radial mask following the
 * pointer, so only the area under the cursor shows colour. Decoration on
 * decoration: the figure is aria-hidden, the effect is pointer-only, and with
 * JavaScript off or on a touch device the band simply stays grayscale. Both
 * layers MUST reference the same file — erp-page.js aligns the colour layer to
 * the <img> by assuming identical cover geometry.
 */
?>
<figure
    style="margin:0;position:relative;overflow:hidden;width:100%;height:clamp(260px,34vw,560px);border-top:2px solid var(--color-divider)"
    data-section-riyadh-photo
    data-erp-photo-reveal
>
    <?php /* The grayscale base. `erp-gray` moved from the <figure> to the <img>
             so the colour layer below is NOT desaturated with it. */ ?>
    <img
        class="erp-gray"
        src="<?= asset('/images/services/riyadh-warehouse-operations.webp') ?>"
        alt=""
        aria-hidden="true"
        width="1983"
        height="793"
        loading="lazy"
        decoding="async"
        style="width:100%;height:100%;object-fit:cover;display:block"
    >
    <?php /* Colour layer, revealed only under the pointer. Same file, so it is
             one download served twice from cache. background-size:cover +
             centre position reproduces the <img>'s object-fit:cover exactly —
             if either changes the two layers drift apart and the spotlight
             stops lining up with what is under it. Sized and masked in page
             CSS; erp-page.js feeds it the cursor position. */ ?>
    <span
        data-erp-photo-colour
        aria-hidden="true"
        style="background-image:url('<?= asset('/images/services/riyadh-warehouse-operations.webp') ?>')"
    ></span>
</figure>
