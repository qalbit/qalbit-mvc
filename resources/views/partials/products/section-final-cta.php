<?php
/**
 * Products — final CTA band.
 *
 * Expects:
 * - $sections (array) from config('products.page.sections')
 */

$sections = $sections ?? [];
$config   = $sections['final_cta'] ?? [];

$sectionId = $config['id']       ?? 'products-final-cta';
$title     = $config['title']    ?? 'Have a product idea of your own?';
$subtitle  = $config['subtitle'] ?? '';
$primary   = $config['primary_cta'] ?? [];
$ctaLabel  = $primary['label'] ?? 'Talk to our product team';
$ctaHref   = $primary['href']  ?? '/contact-us/';
?>

<section
    id="<?= htmlspecialchars($sectionId, ENT_QUOTES); ?>"
    class="bg-slate-900 text-slate-50 py-10 sm:py-12 lg:py-14"
    data-products-section="final-cta"
>
    <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8 text-center space-y-4">
        <h2 class="text-xl sm:text-2xl md:text-3xl font-bold">
            <?= htmlspecialchars($title, ENT_QUOTES); ?>
        </h2>
        <?php if (!empty($subtitle)): ?>
            <p class="mx-auto max-w-2xl text-sm sm:text-[15px] leading-relaxed text-slate-300">
                <?= htmlspecialchars($subtitle, ENT_QUOTES); ?>
            </p>
        <?php endif; ?>
        <div class="pt-2">
            <a href="<?= htmlspecialchars($ctaHref, ENT_QUOTES); ?>" class="btn btn-accent btn-radius-pill text-sm px-5 py-2.5">
                <?= htmlspecialchars($ctaLabel, ENT_QUOTES); ?>
            </a>
        </div>
    </div>
</section>
