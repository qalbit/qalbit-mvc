import Link from "next/link";
import type { HomeCaseStudiesBlockProps } from "@/lib/blocks/types";
import { asset } from "@/lib/site";
import { cn } from "@/lib/utils";

export function HomeCaseStudiesSection({ title, subtitle, items }: HomeCaseStudiesBlockProps) {
  if (!items.length) return null;

  return (
    <section
      id="home-case-studies"
      className="bg-gray-50 py-16"
      aria-labelledby="case-studies-heading"
      data-case-studies
    >
      <div className="mx-auto max-w-6xl px-4">
        <header className="max-w-3xl space-y-3" data-case-header>
          <span
            className="inline-flex items-center rounded-pill border border-slate-200 bg-white/80 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-muted-foreground shadow-soft"
          >
            Recent work &amp; case studies
          </span>

          <h2 id="case-studies-heading" className="text-display-sm font-bold sm:text-display-md md:text-display-lg">
            {title}
          </h2>

          <p className="text-sm text-muted-foreground md:text-base">{subtitle}</p>
        </header>

        <div className="mt-10 grid items-center gap-8 lg:grid-cols-[minmax(0,1.7fr)_minmax(0,1.3fr)]">
          <div className="relative flex flex-col justify-center" data-case-list>
            {items.map((caseStudy, index) => {
              const indexLabel = String(index + 1).padStart(2, "0");
              const isActive = index === 0;

              return (
                <article
                  key={caseStudy.slug}
                  className={cn(
                    "group relative rounded-2xl border border-slate-200 bg-card p-5 shadow-soft transition-all duration-200 hover:border-primary-400 hover:shadow-elevated",
                    isActive && "is-active",
                  )}
                  data-case-card
                  data-case-index={String(index)}
                  itemScope
                  itemType="https://schema.org/CreativeWork"
                >
                  <div className="flex items-center justify-between gap-3">
                    <p className="font-mono text-[11px] uppercase tracking-[0.18em] text-muted-foreground">
                      <span className="text-primary-700" itemProp="position">{indexLabel}</span>
                      <span className="mx-1">·</span>
                      Case Study
                    </p>

                    {caseStudy.logo && (
                      <div className="h-7">
                        <img
                          src={asset(caseStudy.logo)}
                          alt={caseStudy.logoAlt ?? `${caseStudy.name} logo`}
                          loading="lazy"
                          decoding="async"
                          className="h-7 w-auto object-contain"
                          itemProp="image"
                        />
                      </div>
                    )}
                  </div>

                  <div className="mt-3 space-y-2">
                    <h3 className="text-lg font-semibold text-foreground md:text-xl" itemProp="name">
                      {caseStudy.name}
                    </h3>

                    {caseStudy.summary && (
                      <p className="text-sm text-muted-foreground" itemProp="description">
                        {caseStudy.summary}
                      </p>
                    )}

                    {caseStudy.tech_stack && caseStudy.tech_stack.length > 0 && (
                      <p className="text-xs font-medium uppercase tracking-[0.16em] text-primary-700">
                        {caseStudy.tech_stack.map((stack, i) => (
                          <span key={stack}>
                            {stack}
                            {i < caseStudy.tech_stack!.length - 1 ? " · " : ""}
                          </span>
                        ))}
                      </p>
                    )}
                  </div>

                  {caseStudy.banner && (
                    <figure className="mt-4 overflow-hidden rounded-xl shadow-soft lg:hidden">
                      <img
                        src={asset(caseStudy.banner)}
                        alt={caseStudy.bannerAlt ?? `${caseStudy.name} UI preview`}
                        loading="lazy"
                        decoding="async"
                        className="h-48 w-full object-cover md:h-56"
                      />
                    </figure>
                  )}

                  <div className="mt-4 flex items-center justify-between gap-3">
                    <div className="h-[2px] flex-1 overflow-hidden rounded-full bg-slate-200">
                      <span
                        className="block h-full w-full origin-left scale-x-0 bg-primary-600"
                        data-case-progress
                      />
                    </div>
                    <Link
                      itemProp="url"
                      href={caseStudy.href}
                      className="btn btn-primary-outline btn-radius-pill btn-sm whitespace-nowrap"
                      aria-label={`View ${caseStudy.name} case study`}
                      title={`View ${caseStudy.name} case study`}
                      data-case-link
                    >
                      View Case Study
                    </Link>
                  </div>
                </article>
              );
            })}
          </div>

          <div
            className="relative mx-auto hidden aspect-[4/3] w-full max-w-xl lg:mx-0 lg:block"
            data-case-visual
          >
            <div className="absolute inset-0 rounded-3xl bg-gradient-to-br from-white via-primary-50 to-accent-50 shadow-2xl" />

            {items.map((caseStudy, index) => {
              if (!caseStudy.banner) return null;

              return (
                <figure
                  key={`visual-${caseStudy.slug}`}
                  className={cn(
                    "absolute inset-4 overflow-hidden rounded-2xl shadow-elevated",
                    index === 0 && "is-active",
                  )}
                  data-case-image
                  data-case-index={String(index)}
                >
                  <img
                    src={asset(caseStudy.banner)}
                    alt={caseStudy.bannerAlt ?? `${caseStudy.name} UI preview`}
                    loading="lazy"
                    decoding="async"
                    className="h-full w-full object-cover"
                  />
                </figure>
              );
            })}
          </div>
        </div>
      </div>
    </section>
  );
}
