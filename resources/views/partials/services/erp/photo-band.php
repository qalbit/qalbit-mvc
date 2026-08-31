<?php
/**
 * ERP — full-bleed photograph band.
 *
 * A pure visual beat between the process timeline and the project-type grid,
 * where the page has run through four dense text sections in a row. It carries
 * no copy, so there is nothing here to keep in sync with the content document.
 *
 * Decorative: the surrounding sections already say everything this image would,
 * so it takes alt="" and aria-hidden rather than inventing a description a
 * screen-reader user gains nothing from.
 *
 * Desaturated (erp-gray) like the other two photographs on the page, so the
 * brand blue stays the only colour event in the layout AT REST.
 *
 * On hover a colour copy is revealed through a radial mask that follows the
 * pointer, so only the area under the cursor shows colour. It is decoration on
 * decoration: the figure is aria-hidden, the effect is pointer-only, and with
 * JavaScript off or on a touch device the band simply stays grayscale.
 *
 * The asset is a real photograph at 1600x640. Keep that intrinsic size if it is
 * ever swapped, or update the height here and the width/height attributes
 * together, else CLS returns.
 *
 * The subject sits in the centre third ON PURPOSE. `object-fit:cover` means the
 * visible crop tightens from 3.40:1 at 1920px to 1.38:1 at 375px, where only the
 * middle ~55% of the width survives — the two supporting workers in the outer
 * thirds are expected to be cropped away on a phone, the scanner is not. A
 * replacement that centres on something else will lose its subject on mobile.
 */
?>
<figure
    style="margin:0;position:relative;overflow:hidden;width:100%;height:clamp(260px,34vw,560px);border-top:2px solid var(--color-divider)"
    data-section-erp-photo
    data-erp-photo-reveal
>
    <?php /* The grayscale base. `erp-gray` moved from the <figure> to the <img>
             so the colour layer below is NOT desaturated with it. */ ?>
    <img
        class="erp-gray"
        src="<?= asset('/images/services/erp-operations-photo.webp') ?>"
        alt=""
        aria-hidden="true"
        width="1600"
        height="640"
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
        style="background-image:url('<?= asset('/images/services/erp-operations-photo.webp') ?>')"
    ></span>
</figure>
