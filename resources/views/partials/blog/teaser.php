<?php
/**
 * Home – Blog teaser / latest posts
 *
 * @var array       $posts
 * @var string|null $title
 * @var string|null $subtitle
 */

if (empty($posts)) {
    return;
}

$title    = $title ?? 'Our latest insights';
$subtitle = $subtitle ?? 'Stay up-to-date with the most recent trends from around the world.';
?>

<section
    id="home-blog"
    class="py-16 bg-background text-foreground"
    aria-labelledby="home-blog-heading"
    data-blog-teaser
    itemscope
    itemtype="https://schema.org/Blog"
>
    <div class="mx-auto max-w-6xl px-4 space-y-10">
        <!-- Header + CTA -->
        <div class="flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
            <header class="space-y-3 max-w-3xl" data-blog-header>
                <span class="inline-flex items-center rounded-pill border border-slate-200 bg-white/90 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-muted-foreground shadow-soft">
                    Latest <span class="mx-1 text-gradient-brand">market</span> trends
                </span>

                <h2
                    id="home-blog-heading"
                    class="text-display-sm sm:text-display-md font-bold"
                    itemprop="name"
                >
                    Our latest <span class="text-gradient-brand">insights</span>.
                </h2>

                <p class="text-sm md:text-base text-muted-foreground" itemprop="description">
                    <?= htmlspecialchars($subtitle) ?>
                </p>
            </header>

            <div class="md:text-right" data-blog-cta>
                <a
                    href="/blog/"
                    class="inline-flex items-center rounded-full border border-slate-200 bg-white/90 px-4 py-2 text-[11px] font-semibold uppercase tracking-[0.16em] text-slate-700 hover:border-primary-500 hover:text-primary-700 hover:shadow-soft transition-colors"
                    title="Learn more about our latest insights"
                    aria-label="Learn more about our latest insights"
                    itemprop="url"
                >
                    Explore latest insights
                    <span class="ml-2 text-[13px]">→</span>
                </a>
            </div>
        </div>

        <!-- Blog cards -->
        <div
            class="grid gap-6 md:grid-cols-3"
            data-blog-list
        >
            <?php foreach ($posts as $post): ?>
                <?php
                $url          = $post['url']             ?? '#';
                $titlePost    = $post['title']           ?? 'Blog article';
                $image        = $post['featured_image']  ?? null;
                $excerpt      = $post['excerpt']         ?? null;
                $authorName   = $post['author_name']     ?? null;
                $authorAvatar = $post['author_avatar']   ?? null;
                $authorUrl    = $post['author_url']      ?? null;
                $dateRaw      = $post['date']            ?? null; // whatever format WP client sends
                ?>
                <article
                    class="blog-card group"
                    data-blog-card
                    itemscope
                    itemtype="https://schema.org/BlogPosting"
                >
                    <?php if (!empty($image)): ?>
                        <a
                            href="<?= htmlspecialchars($url) ?>"
                            class="blog-card-media"
                            itemprop="mainEntityOfPage url"
                        >
                            <figure class="blog-card-media-inner">
                                <img
                                    src="<?= htmlspecialchars($image) ?>"
                                    alt="Blog image of <?= htmlspecialchars($titlePost) ?>"
                                    loading="lazy"
                                    decoding="async"
                                    class="blog-card-image"
                                    itemprop="image"
                                />
                            </figure>
                        </a>
                    <?php endif; ?>

                    <div class="blog-card-body">
                        <!-- Meta row: date + badge -->
                        <div class="blog-card-meta">
                            <?php if (!empty($dateRaw)): ?>
                                <time
                                    class="blog-card-date"
                                    datetime="<?= htmlspecialchars($dateRaw) ?>"
                                    itemprop="datePublished"
                                >
                                    <?= htmlspecialchars($dateRaw) ?>
                                </time>
                            <?php endif; ?>

                            <span class="blog-card-tag">
                                Insight
                            </span>
                        </div>

                        <h3 class="blog-card-title" itemprop="headline">
                            <a
                                href="<?= htmlspecialchars($url) ?>"
                                class="hover:underline"
                                itemprop="url"
                            >
                                <?= htmlspecialchars($titlePost) ?>
                            </a>
                        </h3>

                        <?php if (!empty($excerpt)): ?>
                            <p
                                class="blog-card-excerpt line-clamp-4"
                                itemprop="description"
                            >
                                <?= htmlspecialchars($excerpt) ?>
                            </p>
                        <?php endif; ?>

                        <footer class="blog-card-footer">
                            <div class="blog-card-author">
                                <?php if (!empty($authorAvatar)): ?>
                                    <span class="blog-card-author-avatar-wrap">
                                        <img
                                            src="<?= htmlspecialchars($authorAvatar) ?>"
                                            alt="Author <?= htmlspecialchars($authorName ?? '') ?>"
                                            loading="lazy"
                                            decoding="async"
                                            class="blog-card-author-avatar"
                                        />
                                    </span>
                                <?php endif; ?>

                                <?php if (!empty($authorName)): ?>
                                    <p class="blog-card-author-name" itemprop="author">
                                        <?php if (!empty($authorUrl)): ?>
                                            <a
                                                href="<?= htmlspecialchars($authorUrl) ?>"
                                                target="_blank"
                                                rel="noopener noreferrer"
                                                class="hover:underline"
                                            >
                                                <?= htmlspecialchars($authorName) ?>
                                            </a>
                                        <?php else: ?>
                                            <?= htmlspecialchars($authorName) ?>
                                        <?php endif; ?>
                                    </p>
                                <?php endif; ?>
                            </div>

                            <a
                                href="<?= htmlspecialchars($url) ?>"
                                class="blog-card-readmore"
                                itemprop="url"
                            >
                                Read article
                                <span aria-hidden="true">→</span>
                            </a>
                        </footer>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
