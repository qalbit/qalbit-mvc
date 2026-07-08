import Link from "next/link";
import type { HomeIndustriesBlockProps } from "@/lib/blocks/types";
import { asset } from "@/lib/site";

export function HomeIndustriesSection({ title, subtitle, items }: HomeIndustriesBlockProps) {
  if (!items.length) return null;

  return (
    <section
      className="py-16 bg-slate-950 text-slate-50"
      aria-labelledby="industries-heading"
      data-horizontal-industries
    >
      <div className="mx-auto max-w-6xl px-4">
        <header className="max-w-3xl space-y-3">
          <span
            className="rounded-pill border-2 border-slate-700/80 bg-slate-900/60 px-2.5 py-1.5 text-center text-[11px] font-medium uppercase text-slate-300 shadow-elevated md:text-left"
          >
            <span className="font-semibold">Industries</span> we serve
          </span>

          <h2 id="industries-heading" className="text-display-sm font-bold sm:text-display-md md:text-display-lg">
            {title}
          </h2>

          <p className="mt-2 text-sm text-slate-300 md:text-base">{subtitle}</p>

          <div className="mt-6">
            <Link
              href="/industries/"
              className="text-xs font-semibold text-slate-300 underline underline-offset-4 hover:text-primary-200 md:text-sm"
            >
              View all industries we serve
            </Link>
          </div>
        </header>

        <div
          className="mt-4 overflow-x-visible lg:mt-6 lg:overflow-x-hidden"
          data-horizontal-wrapper
        >
          <div
            className="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 md:gap-6 lg:flex lg:gap-6 lg:pb-2"
            data-horizontal-track
            role="list"
          >
            {items.map((industry) => {
              const industryName = industry.name;
              const summary = industry.summary ?? "";
              const href = industry.href;
              const icon = industry.icon;

              return (
                <article
                  key={industry.slug}
                  itemScope
                  itemType="https://schema.org/Service"
                  className="group relative flex flex-col justify-between rounded-2xl border border-slate-800/80 bg-slate-900/70 p-5 backdrop-blur-sm transition-colors duration-200 hover:border-primary-400/70 lg:min-w-[320px]"
                  role="listitem"
                >
                  <div className="mb-3 flex items-center gap-3">
                    {icon && (
                      <div
                        className="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-xl bg-slate-950/60 ring-1 ring-slate-700/80 group-hover:ring-primary-400/80"
                      >
                        <img
                          src={asset(icon)}
                          alt={`Icon representing ${industryName}`}
                          width={24}
                          height={24}
                          loading="lazy"
                          decoding="async"
                          className="industry-tile-icon h-5 w-5 flex-none"
                        />
                      </div>
                    )}

                    <h3
                      itemProp="name serviceType"
                      className="text-sm font-semibold text-slate-50 group-hover:text-primary-50 md:text-base"
                    >
                      {industryName}
                    </h3>
                  </div>

                  {summary && (
                    <p itemProp="description" className="text-xs text-slate-300 md:text-sm">
                      {summary}
                    </p>
                  )}

                  <div className="mt-4 flex items-center justify-between text-[11px] uppercase tracking-[0.16em] text-slate-400">
                    <span className="group-hover:text-primary-200">Industry focus</span>
                    <Link
                      itemProp="url"
                      href={href}
                      className="inline-flex items-center text-[11px] font-semibold text-slate-300 group-hover:text-primary-200"
                      title={`Explore software solutions for ${industryName}`}
                      aria-label={`Explore software solutions for ${industryName}`}
                    >
                      View solutions
                      <span
                        aria-hidden="true"
                        className="ml-1 transition-transform group-hover:translate-x-0.5"
                      >
                        →
                      </span>
                    </Link>
                  </div>
                </article>
              );
            })}
          </div>
        </div>
      </div>
    </section>
  );
}
