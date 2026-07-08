import Link from "next/link";
import type { PortfolioGridProps } from "@/lib/blocks/types";
import { PortfolioArrowLink } from "./PortfolioArrowLink";
import { PortfolioCardLink } from "./PortfolioCardLink";

export function PortfolioGrid({
  id = "portfolio-grid",
  title = "All projects & case studies",
  subtitle,
  items,
  emptyTitle = "No projects match these filters yet.",
  emptyMessage = "Try adjusting the industry or tech stack filters, or contact us with your requirements.",
  industryLabels = {},
  technologyLabels = {},
}: PortfolioGridProps) {
  const headingId = `${id}-heading`;

  return (
    <section
      id={id}
      className="bg-slate-50 py-8 text-slate-900 sm:py-10 lg:py-12"
      aria-labelledby={headingId}
      data-portfolio-section="grid"
    >
      <div className="mx-auto max-w-6xl space-y-5 px-4 sm:space-y-6 sm:px-6 lg:px-8">
        <header className="flex flex-col gap-1 sm:flex-row sm:items-end sm:justify-between">
          <div className="space-y-1">
            <h2 id={headingId} className="text-base font-semibold text-slate-900 sm:text-lg md:text-xl">
              {title}
            </h2>
            {subtitle && <p className="max-w-2xl text-xs text-slate-600 sm:text-sm">{subtitle}</p>}
          </div>
        </header>

        {items.length === 0 ? (
          <div
            className="mt-3 rounded-2xl border border-dashed border-slate-300 bg-white px-4 py-6 text-center sm:px-6 sm:py-8"
            data-portfolio-el="grid-empty"
          >
            <h3 className="text-sm font-semibold text-slate-900 sm:text-base">{emptyTitle}</h3>
            <p className="mt-1 text-xs text-slate-600 sm:text-sm">{emptyMessage}</p>
            <div className="mt-3 flex flex-wrap items-center justify-center gap-2">
              <Link
                href="/portfolio/"
                className="inline-flex items-center rounded-full border border-slate-300 bg-white px-3 py-1.5 text-[11px] font-medium text-slate-700 no-underline hover:bg-slate-100"
              >
                Reset filters
              </Link>
              <Link
                href="/contact-us/"
                className="inline-flex items-center rounded-full bg-slate-900 px-3 py-1.5 text-[11px] font-medium text-slate-50 no-underline hover:bg-slate-800"
              >
                Share your requirements
              </Link>
            </div>
          </div>
        ) : (
          <>
          <div className="grid gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-3" data-portfolio-el="grid">
            {items.map((item) => {
              const href = item.href ?? (item.slug ? `/case-studies/${item.slug}/` : undefined);
              const industries = item.industries ?? (item.industry ? [item.industry] : []);
              const technologies = item.technologies ?? (item.technology ? [item.technology] : []);
              const linkLabel = item.linkLabel ?? "View project";
              const external = item.external;

              return (
                <article
                  key={item.name}
                  className="group flex flex-col justify-between rounded-2xl border border-slate-200 bg-white p-4 shadow-sm transition hover:border-sky-200 hover:shadow-md sm:p-5"
                  data-portfolio-el="grid-card"
                  data-portfolio-industries={industries.join(",")}
                  data-portfolio-technologies={technologies.join(",")}
                >
                  <div className="space-y-3">
                    {item.imageSrc && (
                      <div className="overflow-hidden rounded-xl border border-slate-100 bg-slate-100/60">
                        <img
                          src={item.imageSrc}
                          alt={item.imageAlt ?? item.name}
                          className="h-36 w-full object-cover object-top transition-transform duration-300 group-hover:scale-[1.02]"
                          loading="lazy"
                        />
                      </div>
                    )}

                    <div className="flex items-start justify-between gap-2">
                      <div className="space-y-1">
                        <h3 className="text-sm font-semibold leading-snug text-slate-900 sm:text-[15px]">
                          {href ? (
                            <PortfolioCardLink
                              href={href}
                              external={external}
                              className="hover:text-sky-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-sky-500"
                            >
                              {item.name}
                            </PortfolioCardLink>
                          ) : (
                            item.name
                          )}
                        </h3>
                        {item.client && (
                          <p className="text-[11px] text-slate-500">
                            Client: <span className="font-medium text-slate-700">{item.client}</span>
                          </p>
                        )}
                      </div>
                      {item.badge && (
                        <span className="inline-flex items-center rounded-full bg-slate-100 px-2 py-0.5 text-[10px] font-medium text-slate-700">
                          {item.badge}
                        </span>
                      )}
                    </div>

                    {item.summary && (
                      <p className="line-clamp-3 text-xs text-slate-600 sm:text-[13px]">{item.summary}</p>
                    )}
                  </div>

                  <div className="mt-4 space-y-2">
                    {industries.length > 0 && (
                      <div className="flex flex-wrap gap-1.5">
                        {industries.map((key) => (
                          <span
                            key={key}
                            className="inline-flex items-center rounded-full bg-slate-100 px-2 py-0.5 text-[10px] text-slate-700"
                          >
                            {industryLabels[key] ?? key}
                          </span>
                        ))}
                      </div>
                    )}
                    {technologies.length > 0 && (
                      <div className="flex flex-wrap gap-1">
                        {technologies.map((key) => (
                          <span
                            key={key}
                            className="inline-flex items-center rounded-full border border-slate-200 bg-slate-50 px-2 py-0.5 text-[10px] text-slate-600"
                          >
                            {technologyLabels[key] ?? key}
                          </span>
                        ))}
                      </div>
                    )}
                    {href && (
                      <div className="pt-1">
                        <PortfolioArrowLink
                          href={href}
                          label={linkLabel}
                          external={external}
                          variant="grid"
                        />
                      </div>
                    )}
                  </div>
                </article>
              );
            })}
          </div>

          <div
            className="mt-3 hidden rounded-2xl border border-dashed border-slate-300 bg-white px-4 py-6 text-center sm:px-6 sm:py-8"
            data-portfolio-el="grid-empty-filtered"
          >
            <h3 className="text-sm font-semibold text-slate-900 sm:text-base">{emptyTitle}</h3>
            <p className="mt-1 text-xs text-slate-600 sm:text-sm">{emptyMessage}</p>
            <div className="mt-3 flex flex-wrap items-center justify-center gap-2">
              <Link
                href="/portfolio/"
                className="inline-flex items-center rounded-full border border-slate-300 bg-white px-3 py-1.5 text-[11px] font-medium text-slate-700 no-underline hover:bg-slate-100"
              >
                Reset filters
              </Link>
              <Link
                href="/contact-us/"
                className="inline-flex items-center rounded-full bg-slate-900 px-3 py-1.5 text-[11px] font-medium text-slate-50 no-underline hover:bg-slate-800"
              >
                Share your requirements
              </Link>
            </div>
          </div>
          </>
        )}
      </div>
    </section>
  );
}
