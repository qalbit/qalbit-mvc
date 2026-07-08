import type { ReviewsSectionProps } from "@/lib/blocks/types";

const DEFAULT_BULLETS = [
  "Testimonials from long-term custom software development and SaaS product clients.",
  "Covers ERP systems, B2B marketplaces, booking platforms, and web & mobile app development projects.",
  "Real text and video reviews from founders, CTOs, and product teams who partnered with QalbIT for delivery.",
];

export function ReviewsSection({
  id = "home-reviews",
  eyebrow = "Our clients · Reviews",
  title,
  subtitle,
  bullets = DEFAULT_BULLETS,
  reviews,
}: ReviewsSectionProps) {
  if (!reviews.length) return null;

  const headingId = "home-reviews-heading";
  const columnsCount = 3;
  const perColumn = Math.ceil(reviews.length / columnsCount);
  const columns: typeof reviews[] = [];
  for (let i = 0; i < columnsCount; i++) {
    columns.push(reviews.slice(i * perColumn, (i + 1) * perColumn));
  }

  return (
    <section
      id={id}
      className="bg-muted py-16 text-foreground"
      aria-labelledby={headingId}
      data-reviews-section
    >
      <div className="mx-auto max-w-6xl px-4">
        <div className="grid gap-10 lg:grid-cols-[minmax(0,1.05fr)_minmax(0,2.15fr)] lg:items-start">
          <header className="max-w-xl space-y-4">
            <span
              className="inline-flex items-center rounded-pill border border-slate-200 bg-white/90 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-muted-foreground shadow-soft"
            >
              {eyebrow}
            </span>

            <h2 id={headingId} className="text-display-sm font-bold sm:text-display-md">{title}</h2>

            {subtitle && <p className="text-sm text-muted-foreground md:text-base">{subtitle}</p>}

            {bullets.length > 0 && (
              <ul className="mt-4 space-y-2 text-xs text-muted-foreground/90">
                {bullets.map((item) => (
                  <li key={item}>✓ {item}</li>
                ))}
              </ul>
            )}
          </header>

          <div className="relative lg:pl-6" data-reviews-columns>
            <div className="grid w-full grid-cols-1 gap-5 sm:grid-cols-2 lg:h-[26rem] lg:grid-cols-3 lg:overflow-hidden">
              {columns.map((column, colIndex) => (
                <div
                  key={colIndex}
                  className="relative lg:h-full lg:overflow-hidden"
                  data-reviews-column
                  data-reviews-column-index={String(colIndex)}
                >
                  <div className="flex flex-col gap-4" data-reviews-track>
                    {column.map((review, index) => {
                      const isVideo =
                        review.type === "video" && (review.videoUrl || review.videoSrc);
                      const videoUrl = review.videoUrl ?? review.videoSrc;
                      const rating = review.rating;

                      return (
                        <article key={`${review.quote}-${index}`} className="review-card" data-review-card>
                          {isVideo && videoUrl && (
                            <button
                              type="button"
                              className="mb-3 group relative flex aspect-video w-full items-center justify-center overflow-hidden rounded-xl border border-slate-200 bg-slate-100 shadow-inner focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2 focus-visible:ring-offset-muted"
                              data-review-video-trigger
                              data-video-src={videoUrl}
                              aria-label="Play client video testimonial"
                            >
                              <div
                                className="pointer-events-none absolute inset-0 bg-gradient-to-br from-slate-900/5 via-transparent to-primary-100/40 transition-colors duration-300 group-hover:from-primary-50 group-hover:to-primary-100/70"
                              />
                              <div
                                className="relative flex h-14 w-14 items-center justify-center rounded-full bg-white/95 text-primary-700 shadow-soft transition-colors duration-300 group-hover:bg-primary group-hover:text-white group-hover:shadow-elevated"
                              >
                                <span
                                  className="ml-0.5 inline-block border-y-[7px] border-l-[10px] border-y-transparent border-l-current"
                                />
                              </div>
                              <span className="sr-only">Play client testimonial video</span>
                            </button>
                          )}

                          {rating && rating > 0 && (
                            <div
                              className="mb-2 flex items-center gap-1 text-[10px] text-amber-500"
                              aria-label={`Rated ${rating} out of 5`}
                            >
                              {Array.from({ length: rating }).map((_, starIndex) => (
                                <span key={starIndex} aria-hidden="true">★</span>
                              ))}
                            </div>
                          )}

                          <p className="mb-3 text-sm leading-relaxed text-foreground/90">“{review.quote}”</p>

                          <footer className="border-t border-slate-200/80 pt-2 text-[11px] text-muted-foreground">
                            {review.name && <p className="font-semibold text-foreground">{review.name}</p>}
                            {review.role && <p>{review.role}</p>}
                            {review.company && (
                              <p className="mt-1">
                                {review.companyUrl ? (
                                  <a
                                    href={review.companyUrl}
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    className="font-medium text-primary-700 hover:underline"
                                  >
                                    {review.company}
                                  </a>
                                ) : (
                                  <span>{review.company}</span>
                                )}
                              </p>
                            )}
                            {review.industry && (
                              <p className="mt-1 text-[10px] uppercase tracking-[0.14em] text-slate-400">
                                {review.industry}
                              </p>
                            )}
                          </footer>
                        </article>
                      );
                    })}
                  </div>
                </div>
              ))}
            </div>

            <div className="pointer-events-none absolute inset-x-0 top-0 hidden h-10 bg-gradient-to-b from-muted via-muted/60 to-transparent lg:block" />
            <div className="pointer-events-none absolute inset-x-0 bottom-0 hidden h-10 bg-gradient-to-t from-muted via-muted/60 to-transparent lg:block" />
          </div>
        </div>
      </div>

      <div
        className="fixed inset-0 z-40 hidden items-center justify-center bg-black/70 p-4"
        data-review-modal
        aria-hidden="true"
      >
        <div className="relative w-full max-w-3xl rounded-2xl bg-slate-950/95 p-3 shadow-elevated">
          <button
            type="button"
            className="absolute right-3 top-3 inline-flex h-8 w-8 items-center justify-center rounded-full bg-slate-800/90 text-slate-100 hover:bg-slate-700 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2 focus-visible:ring-offset-slate-950"
            data-review-modal-close
            aria-label="Close video testimonial"
          >
            <span aria-hidden="true">&times;</span>
          </button>

          <div className="aspect-video overflow-hidden rounded-xl bg-black" data-review-modal-body />
        </div>
      </div>
    </section>
  );
}
