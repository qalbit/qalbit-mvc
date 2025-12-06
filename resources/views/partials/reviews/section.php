<?php
/**
 * Home – Reviews / Testimonials Section
 *
 * @var array       $reviews   // already filtered by context in controller
 * @var string|null $title
 * @var string|null $subtitle
 */

$title    = $title ?? 'Teams who trusted QalbIT';
$subtitle = $subtitle ?? 'Short feedback from clients and products we work on across web, mobile, SaaS and internal tools.';

if (empty($reviews)) {
    return;
}

// Distribute reviews into ~3 equal columns
$columnsCount = 3;
$perColumn    = (int) ceil(count($reviews) / $columnsCount);
$columns      = array_chunk($reviews, $perColumn);
?>

<section
    id="home-reviews"
    class="py-16 bg-muted text-foreground"
    aria-labelledby="home-reviews-heading"
    data-reviews-section
>
    <div class="mx-auto max-w-6xl px-4">
        <!-- Layout: left copy, right animated columns -->
        <div class="grid gap-10 lg:grid-cols-[minmax(0,1.05fr)_minmax(0,2.15fr)] lg:items-start">
            <!-- LEFT: Heading + context -->
            <header class="space-y-4 max-w-xl">
                <span class="inline-flex items-center rounded-pill border border-slate-200 bg-white/90 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-muted-foreground shadow-soft">
                    Our clients · Reviews
                </span>

                <h2
                    id="home-reviews-heading"
                    class="text-display-sm sm:text-display-md font-bold"
                >
                    <?= htmlspecialchars($title) ?>
                </h2>

                <p class="text-sm md:text-base text-muted-foreground">
                    <?= htmlspecialchars($subtitle) ?>
                </p>

                <ul class="mt-4 space-y-2 text-xs text-muted-foreground/90">
                    <li>✓ Testimonials from long-term custom software development and SaaS product clients.</li>
                    <li>✓ Covers ERP systems, B2B marketplaces, booking platforms, and web & mobile app development projects.</li>
                    <li>✓ Real text and video reviews from founders, CTOs, and product teams who partnered with QalbIT for delivery.</li>
                </ul>
            </header>

            <!-- RIGHT: Vertical marquee columns (desktop) / static grid (mobile) -->
            <div class="relative lg:pl-6" data-reviews-columns>
                <div
                    class="grid w-full grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5
                           lg:h-[26rem] lg:overflow-hidden"
                >
                    <?php foreach ($columns as $colIndex => $columnReviews): ?>
                        <div
                            class="relative lg:h-full lg:overflow-hidden"
                            data-reviews-column
                            data-reviews-column-index="<?= $colIndex ?>"
                        >
                            <div class="flex flex-col gap-4" data-reviews-track>
                                <?php foreach ($columnReviews as $review): ?>
                                    <?php
                                    $isVideo  = !empty($review['type']) && $review['type'] === 'video' && !empty($review['video_url']);
                                    $videoUrl = $isVideo ? ($review['video_url'] ?? null) : null;
                                    $rating   = isset($review['rating']) ? (int) $review['rating'] : null;
                                    ?>
                                    <article
                                        class="review-card"
                                        data-review-card
                                        itemscope
                                        itemtype="https://schema.org/Review"
                                    >
                                        <?php if ($isVideo && !empty($videoUrl)): ?>
                                            <!-- Clickable video teaser – real iframe is injected into modal -->
                                            <button
                                                type="button"
                                                class="mb-3 group relative flex aspect-video w-full items-center justify-center overflow-hidden rounded-xl border border-slate-200 bg-slate-100 shadow-inner focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2 focus-visible:ring-offset-muted"
                                                data-review-video-trigger
                                                data-video-src="<?= htmlspecialchars($videoUrl) ?>"
                                                aria-label="Play client video testimonial"
                                            >
                                                <div class="pointer-events-none absolute inset-0 bg-gradient-to-br from-slate-900/5 via-transparent to-primary-100/40 group-hover:from-primary-50 group-hover:to-primary-100/70 transition-colors duration-300"></div>

                                                <div class="relative flex h-14 w-14 items-center justify-center rounded-full bg-white/95 text-primary-700 shadow-soft transition-colors duration-300 group-hover:bg-primary group-hover:text-white group-hover:shadow-elevated">
                                                    <span class="ml-0.5 inline-block border-l-[10px] border-l-current border-y-[7px] border-y-transparent"></span>
                                                </div>

                                                <span class="sr-only">Play client testimonial video</span>
                                            </button>
                                        <?php endif; ?>

                                        <?php if ($rating): ?>
                                            <div class="mb-2 flex items-center gap-1 text-[10px] text-amber-500" aria-label="Rated <?= $rating ?> out of 5">
                                                <?php for ($i = 0; $i < $rating; $i++): ?>
                                                    <span aria-hidden="true">★</span>
                                                <?php endfor; ?>
                                            </div>
                                        <?php endif; ?>

                                        <?php if (!empty($review['quote'])): ?>
                                            <p
                                                class="mb-3 text-sm leading-relaxed text-foreground/90"
                                                itemprop="reviewBody"
                                            >
                                                “<?= htmlspecialchars($review['quote']) ?>”
                                            </p>
                                        <?php endif; ?>

                                        <footer class="pt-2 border-t border-slate-200/80 text-[11px] text-muted-foreground">
                                            <?php if (!empty($review['author_name'])): ?>
                                                <p class="font-semibold text-foreground" itemprop="author">
                                                    <?= htmlspecialchars($review['author_name']) ?>
                                                </p>
                                            <?php endif; ?>

                                            <?php if (!empty($review['author_role'])): ?>
                                                <p><?= htmlspecialchars($review['author_role']) ?></p>
                                            <?php endif; ?>

                                            <?php if (!empty($review['company'])): ?>
                                                <p class="mt-1">
                                                    <?php if (!empty($review['company_url'])): ?>
                                                        <a
                                                            href="<?= htmlspecialchars($review['company_url']) ?>"
                                                            target="_blank"
                                                            rel="noopener noreferrer"
                                                            class="font-medium text-primary-700 hover:underline"
                                                            itemprop="itemReviewed"
                                                        >
                                                            <?= htmlspecialchars($review['company']) ?>
                                                        </a>
                                                    <?php else: ?>
                                                        <span itemprop="itemReviewed">
                                                            <?= htmlspecialchars($review['company']) ?>
                                                        </span>
                                                    <?php endif; ?>
                                                </p>
                                            <?php endif; ?>

                                            <?php if (!empty($review['industry'])): ?>
                                                <p class="mt-1 text-[10px] uppercase tracking-[0.14em] text-slate-400">
                                                    <?= htmlspecialchars($review['industry']) ?>
                                                </p>
                                            <?php endif; ?>
                                        </footer>
                                    </article>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Top / bottom gradient fades (desktop only) -->
                <div class="pointer-events-none absolute inset-x-0 top-0 h-10 bg-gradient-to-b from-muted via-muted/60 to-transparent hidden lg:block"></div>
                <div class="pointer-events-none absolute inset-x-0 bottom-0 h-10 bg-gradient-to-t from-muted via-muted/60 to-transparent hidden lg:block"></div>
            </div>
        </div>
    </div>

    <!-- Video modal – injected iframe, pauses marquee while open -->
    <div
        class="fixed inset-0 z-40 hidden items-center justify-center bg-black/70 p-4"
        data-review-modal
        aria-hidden="true"
    >
        <div class="relative w-full max-w-3xl rounded-2xl bg-slate-950/95 p-3 shadow-elevated">
            <button
                type="button"
                class="absolute right-3 top-3 inline-flex h-8 w-8 items-center justify-center rounded-full bg-slate-800/90 text-slate-100 hover:bg-slate-700 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2 focus-visible:ring-offset-slate-950"
                data-review-modal-close
                aria-label="Close video testimonial"
            >
                <span aria-hidden="true">&times;</span>
            </button>

            <div
                class="aspect-video overflow-hidden rounded-xl bg-black"
                data-review-modal-body
            >
                <!-- iframe injected by JS -->
            </div>
        </div>
    </div>
</section>
