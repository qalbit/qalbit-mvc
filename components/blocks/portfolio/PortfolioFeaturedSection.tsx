import type { PortfolioFeaturedProps } from "@/lib/blocks/portfolio-mappers";
import { PortfolioArrowLink } from "./PortfolioArrowLink";
import { PortfolioCardLink } from "./PortfolioCardLink";

export function PortfolioFeaturedSection({
  id = "portfolio-featured",
  eyebrow = "Highlights",
  title,
  subtitle,
  items,
  industryLabels,
  technologyLabels,
}: PortfolioFeaturedProps) {
  if (!items.length) return null;

  return (
    <section
      id={id}
      className="border-t border-slate-800 bg-slate-950 py-8 text-slate-50 sm:py-10 lg:py-12"
      data-portfolio-section="featured"
    >
      <div className="mx-auto max-w-6xl space-y-5 px-4 sm:space-y-6 sm:px-6 lg:px-8">
        <header className="max-w-3xl space-y-2">
          <p className="text-[11px] font-semibold uppercase tracking-[0.16em] text-sky-400 sm:text-xs">
            {eyebrow}
          </p>
          <h2 className="text-lg font-semibold text-slate-50 sm:text-xl md:text-2xl">{title}</h2>
          {subtitle && <p className="text-xs text-slate-300 sm:text-sm">{subtitle}</p>}
        </header>

        <div className="grid gap-4 sm:grid-cols-2 sm:gap-5 md:grid-cols-2 lg:grid-cols-3" data-portfolio-el="featured-grid">
          {items.map((item) => (
              <article
                key={item.name}
                className="group flex flex-col justify-between rounded-2xl border border-slate-800 bg-slate-900/70 p-4 shadow-soft transition hover:border-sky-500/60 hover:shadow-md sm:p-5"
                data-portfolio-el="featured-card"
              >
                <div className="space-y-3">
                  <div className="flex items-center justify-between gap-2">
                    <span className="inline-flex items-center rounded-full bg-slate-800 px-2 py-0.5 text-[10px] font-medium text-slate-200">
                      {item.typeLabel}
                    </span>
                    {item.client && (
                      <span className="text-[10px] text-slate-400">
                        Client: <span className="font-medium text-slate-100">{item.client}</span>
                      </span>
                    )}
                  </div>

                  <div className="space-y-1">
                    <h3 className="text-sm font-semibold leading-snug sm:text-[15px]">
                      <PortfolioCardLink
                        href={item.href}
                        external={item.external}
                        className="hover:text-sky-300 focus:outline-none focus-visible:ring-2 focus-visible:ring-sky-500"
                      >
                        {item.name}
                      </PortfolioCardLink>
                    </h3>
                    {item.summary && (
                      <p className="line-clamp-3 text-xs text-slate-300 sm:text-[13px]">{item.summary}</p>
                    )}
                  </div>

                  {item.imageSrc && (
                    <div className="overflow-hidden rounded-xl border border-slate-800 bg-slate-900">
                      <img
                        src={item.imageSrc}
                        alt={item.imageAlt ?? item.name}
                        className="h-36 w-full object-cover object-top transition-transform duration-300 group-hover:scale-[1.02]"
                        loading="lazy"
                      />
                    </div>
                  )}
                </div>

                <div className="mt-4 space-y-2">
                  {item.industries.length > 0 && (
                    <div className="flex flex-wrap gap-1.5">
                      {item.industries.map((key) => (
                        <span
                          key={key}
                          className="inline-flex items-center rounded-full bg-slate-800 px-2 py-0.5 text-[10px] text-slate-200"
                        >
                          {industryLabels[key] ?? key}
                        </span>
                      ))}
                    </div>
                  )}
                  {item.technologies.length > 0 && (
                    <div className="flex flex-wrap gap-1">
                      {item.technologies.map((key) => (
                        <span
                          key={key}
                          className="inline-flex items-center rounded-full border border-slate-700 bg-slate-900 px-2 py-0.5 text-[10px] text-slate-300"
                        >
                          {technologyLabels[key] ?? key}
                        </span>
                      ))}
                    </div>
                  )}
                  <div className="pt-1">
                    <PortfolioArrowLink
                      href={item.href}
                      label={item.linkLabel}
                      external={item.external}
                      variant="featured"
                    />
                  </div>
                </div>
              </article>
          ))}
        </div>
      </div>
    </section>
  );
}
