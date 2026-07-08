import type { BlogPost } from "@/lib/blog/types";

export function BlogTeaser({ posts }: { posts: BlogPost[] }) {
  if (!posts.length) return null;

  const subtitle = "Short articles about software development, SaaS and project decisions.";

  return (
    <section
      id="home-blog"
      className="py-16 bg-background text-foreground"
      aria-labelledby="home-blog-heading"
      data-blog-teaser
      itemScope
      itemType="https://schema.org/Blog"
    >
      <div className="mx-auto max-w-6xl px-4 space-y-10">
        <div className="flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
          <header className="space-y-3 max-w-3xl" data-blog-header>
            <span className="inline-flex items-center rounded-pill border border-slate-200 bg-white/90 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-muted-foreground shadow-soft">
              Latest <span className="mx-1 text-gradient-brand">market</span> trends
            </span>

            <h2
              id="home-blog-heading"
              className="text-display-sm sm:text-display-md font-bold"
              itemProp="name"
            >
              Our latest <span className="text-gradient-brand">insights</span>.
            </h2>

            <p className="text-sm md:text-base text-muted-foreground" itemProp="description">
              {subtitle}
            </p>
          </header>

          <div className="md:text-right" data-blog-cta>
            <a
              href="/blog/"
              className="inline-flex items-center rounded-full border border-slate-200 bg-white/90 px-4 py-2 text-[11px] font-semibold uppercase tracking-[0.16em] text-slate-700 hover:border-primary-500 hover:text-primary-700 hover:shadow-soft transition-colors"
              title="Learn more about our latest insights"
              aria-label="Learn more about our latest insights"
              itemProp="url"
            >
              Explore latest insights
              <span className="ml-2 text-[13px]">→</span>
            </a>
          </div>
        </div>

        <div className="grid gap-6 md:grid-cols-3" data-blog-list>
          {posts.map((post) => {
            const url = `/blog/${post.slug}/`;
            const image = post.featuredImage?.url;
            const dateRaw = new Date(post.date).toLocaleDateString("en-US", {
              year: "numeric",
              month: "short",
              day: "numeric",
            });

            return (
              <article
                key={post.id}
                className="blog-card group"
                data-blog-card
                itemScope
                itemType="https://schema.org/BlogPosting"
              >
                {image && (
                  <a href={url} className="blog-card-media" itemProp="mainEntityOfPage url">
                    <figure className="blog-card-media-inner">
                      <img
                        src={image}
                        alt={`Blog image of ${post.title}`}
                        loading="lazy"
                        decoding="async"
                        className="blog-card-image"
                        itemProp="image"
                      />
                    </figure>
                  </a>
                )}

                <div className="blog-card-body">
                  <div className="blog-card-meta">
                    <time
                      className="blog-card-date"
                      dateTime={post.date}
                      itemProp="datePublished"
                    >
                      {dateRaw}
                    </time>
                    <span className="blog-card-tag">Insight</span>
                  </div>

                  <h3 className="blog-card-title" itemProp="headline">
                    <a href={url} className="hover:underline" itemProp="url">
                      {post.title}
                    </a>
                  </h3>

                  {post.excerpt && (
                    <p className="blog-card-excerpt line-clamp-4" itemProp="description">
                      {post.excerpt.replace(/<[^>]+>/g, "")}
                    </p>
                  )}

                  <footer className="blog-card-footer">
                    <a href={url} className="blog-card-readmore" itemProp="url">
                      Read article
                      <span aria-hidden="true">→</span>
                    </a>
                  </footer>
                </div>
              </article>
            );
          })}
        </div>
      </div>
    </section>
  );
}
