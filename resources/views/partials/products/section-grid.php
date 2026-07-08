<?php
/**
 * Products Grid — dual-CTA cards.
 *
 * Expects:
 * - $sections (array) from config('products.page.sections')
 * - $items    (array) from App\Support\Product::all()
 *
 * The dual-CTA pattern is the load-bearing decision:
 *  - "Visit site"     -> outward traffic to the live product (null externalUrl => "Coming soon")
 *  - "Read the story" -> inward to the /products/{slug}/ engineering case study
 */

$sections  = $sections  ?? [];
$items     = $items      ?? [];

$config    = $sections['grid'] ?? [];
$sectionId = $config['id']       ?? 'products-grid';
$title     = $config['title']    ?? 'Products we own and operate';
$subtitle  = $config['subtitle'] ?? '';
?>

<section
    id="<?= htmlspecialchars($sectionId, ENT_QUOTES); ?>"
    class="bg-white text-slate-900 py-8 sm:py-10 lg:py-12"
    data-products-section="grid"
>
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 space-y-6">

        <header class="space-y-1">
            <h2 class="text-lg sm:text-xl md:text-2xl font-semibold text-slate-900">
                <?= htmlspecialchars($title, ENT_QUOTES); ?>
            </h2>
            <?php if (!empty($subtitle)): ?>
                <p class="max-w-3xl text-xs sm:text-sm text-slate-600">
                    <?= htmlspecialchars($subtitle, ENT_QUOTES); ?>
                </p>
            <?php endif; ?>
        </header>

        <div class="grid gap-4 sm:gap-5 md:grid-cols-2">
            <?php foreach ($items as $product): ?>
                <?php
                    $slug        = trim((string) ($product['slug'] ?? ''), '/');
                    $name        = $product['name']        ?? '';
                    $tagline     = $product['tagline']     ?? '';
                    $valueProp   = $product['valueProp']   ?? '';
                    $audienceTag = $product['audienceTag'] ?? '';
                    $status      = $product['status']      ?? 'live';
                    $externalUrl = $product['externalUrl'] ?? null;
                    $logo        = $product['logo']        ?? null;
                    $logoAlt     = $product['logoAlt']     ?? ($name . ' logo');
                    $techStack   = $product['tech_stack']  ?? [];
                    $storyHref   = '/products/' . $slug . '/';
                    $isLive      = ($status === 'live') && !empty($externalUrl);
                ?>
                <article
                    class="flex h-full flex-col rounded-2xl border border-slate-200 bg-white p-5 sm:p-6 shadow-soft transition hover:border-slate-300 hover:shadow-md"
                    data-products-el="card"
                    data-product-slug="<?= htmlspecialchars($slug, ENT_QUOTES); ?>"
                >
                    <div class="flex items-start justify-between gap-3">
                        <!-- Wordmark / logo -->
                        <?php if (!empty($logo)): ?>
                            <img src="<?= asset($logo) ?>" alt="<?= htmlspecialchars($logoAlt, ENT_QUOTES); ?>" class="h-8 w-auto" />
                        <?php else: ?>
                            <span class="text-xl sm:text-2xl font-bold tracking-tight text-slate-900">
                                <?= htmlspecialchars($name, ENT_QUOTES); ?>
                            </span>
                        <?php endif; ?>

                        <!-- Status pill -->
                        <?php if ($isLive): ?>
                            <span class="inline-flex items-center gap-1 rounded-full bg-emerald-50 px-2 py-0.5 text-[10px] font-semibold uppercase tracking-[0.12em] text-emerald-700">
                                <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span> Live
                            </span>
                        <?php else: ?>
                            <span class="inline-flex items-center rounded-full bg-amber-50 px-2 py-0.5 text-[10px] font-semibold uppercase tracking-[0.12em] text-amber-700">
                                Coming soon
                            </span>
                        <?php endif; ?>
                    </div>

                    <?php if (!empty($tagline)): ?>
                        <p class="mt-3 text-sm font-medium text-slate-900"><?= htmlspecialchars($tagline, ENT_QUOTES); ?></p>
                    <?php endif; ?>

                    <?php if (!empty($valueProp)): ?>
                        <p class="mt-1.5 text-xs sm:text-sm leading-relaxed text-slate-600"><?= htmlspecialchars($valueProp, ENT_QUOTES); ?></p>
                    <?php endif; ?>

                    <?php if (!empty($audienceTag)): ?>
                        <div class="mt-3">
                            <span class="inline-flex items-center rounded-full border border-slate-200 bg-slate-50 px-2.5 py-0.5 text-[10px] font-medium text-slate-600">
                                <?= htmlspecialchars($audienceTag, ENT_QUOTES); ?>
                            </span>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($techStack)): ?>
                        <ul class="mt-3 flex flex-wrap gap-1.5">
                            <?php foreach (array_slice($techStack, 0, 4) as $tech): ?>
                                <li class="rounded-md bg-slate-100 px-2 py-0.5 text-[10px] font-medium text-slate-600">
                                    <?= htmlspecialchars($tech, ENT_QUOTES); ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <!-- Dual CTAs -->
                    <div class="mt-auto flex flex-wrap items-center gap-2.5 pt-5">
                        <?php if ($isLive): ?>
                            <a
                                href="<?= htmlspecialchars($externalUrl, ENT_QUOTES); ?>"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="btn btn-accent btn-radius-pill text-xs px-3.5 py-1.5"
                                data-products-el="visit-cta"
                            >
                                Visit site ↗
                            </a>
                        <?php else: ?>
                            <span
                                class="inline-flex cursor-not-allowed items-center rounded-full border border-slate-200 bg-slate-50 px-3.5 py-1.5 text-xs font-medium text-slate-400"
                                aria-disabled="true"
                            >
                                Coming soon
                            </span>
                        <?php endif; ?>

                        <a
                            href="<?= htmlspecialchars($storyHref, ENT_QUOTES); ?>"
                            class="btn btn-primary-outline btn-radius-pill text-xs px-3.5 py-1.5"
                            data-products-el="story-cta"
                        >
                            Read the story →
                        </a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
