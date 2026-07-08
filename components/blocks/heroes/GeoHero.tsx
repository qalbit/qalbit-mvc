import Link from "next/link";
import { Fragment } from "react";
import type { GeoHeroBlockProps } from "@/lib/blocks/geo-mappers";

export function GeoHero({
  id = "location-hero",
  stateKey,
  breadcrumbs,
  eyebrow,
  stateLabel,
  title,
  subtitle,
  body,
  primaryCta,
  secondaryCta,
  trustLabel,
  trustItems,
  countryName,
  highlights,
}: GeoHeroBlockProps) {
  const headingId = `${id}-heading`;

  return (
    <section
      id={id}
      className="relative overflow-hidden bg-slate-50 py-8 text-slate-900 sm:py-20 lg:py-24"
      aria-labelledby={headingId}
      data-section-location-hero
      data-location-key={stateKey ?? undefined}
    >
      <div className="relative mx-auto max-w-6xl space-y-4 px-4 sm:px-6 md:space-y-10 lg:px-8">
        {breadcrumbs.length > 0 && (
          <nav className="text-xs font-medium text-slate-600" aria-label="Breadcrumb" data-hero-el>
            <ol className="flex flex-wrap items-center gap-1">
              {breadcrumbs.map((crumb, index) => {
                const isLast = index === breadcrumbs.length - 1;
                return (
                  <Fragment key={`${crumb.label}-${index}`}>
                    {index > 0 && <li className="text-slate-400">/</li>}
                    <li {...(isLast ? { "aria-current": "page" as const } : {})}>
                      {crumb.href && !isLast ? (
                        <Link href={crumb.href} className="transition-colors hover:text-sky-500">
                          {crumb.label}
                        </Link>
                      ) : (
                        <span className={isLast ? "text-slate-900" : "text-slate-600"}>
                          {crumb.label}
                        </span>
                      )}
                    </li>
                  </Fragment>
                );
              })}
            </ol>
          </nav>
        )}

        <div className="grid gap-12 lg:grid-cols-2 lg:items-center">
          <div className="space-y-8">
            {(eyebrow || stateLabel) && (
              <div
                className="flex flex-wrap items-center gap-3 text-[11px] font-medium text-sky-700"
                data-hero-el
              >
                {eyebrow && (
                  <span className="inline-flex items-center rounded-full bg-sky-100 px-3 py-1">
                    {eyebrow}
                  </span>
                )}
                {stateLabel && (
                  <span className="inline-flex items-center rounded-full border border-sky-200 px-3 py-1 text-[11px] uppercase tracking-wide text-sky-800">
                    {stateLabel}
                  </span>
                )}
              </div>
            )}

            <h1
              id={headingId}
              className="text-center text-display-md font-bold sm:text-display-lg md:text-left md:text-display-2xl"
              data-hero-el
            >
              {title}
            </h1>

            {subtitle && (
              <p
                className="text-md px-0 text-center font-medium text-slate-600 md:px-4 md:text-left lg:px-2"
                data-hero-el
              >
                {subtitle}
              </p>
            )}

            {body && (
              <p
                className="text-md px-0 text-center font-medium text-slate-500 md:px-4 md:text-left lg:px-2"
                data-hero-el
              >
                {body}
              </p>
            )}

            {(primaryCta || secondaryCta) && (
              <div className="flex flex-wrap items-center gap-4" data-hero-el>
                {primaryCta && (
                  <CtaAnchor
                    href={primaryCta.href}
                    external={primaryCta.external}
                    className="inline-flex items-center justify-center rounded-full bg-sky-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-sky-700 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-sky-500 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-50"
                  >
                    {primaryCta.label}
                  </CtaAnchor>
                )}
                {secondaryCta && (
                  <CtaAnchor
                    href={secondaryCta.href}
                    external={secondaryCta.external}
                    className="inline-flex items-center justify-center rounded-full border border-slate-300 px-5 py-2.5 text-sm font-semibold text-slate-900 transition hover:border-sky-400 hover:text-sky-900 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-sky-500 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-50"
                  >
                    {secondaryCta.label}
                  </CtaAnchor>
                )}
              </div>
            )}

            {(trustLabel || trustItems?.length) && (
              <div className="space-y-3 pt-4" data-hero-el>
                {trustLabel && (
                  <p className="text-xs font-semibold uppercase tracking-wide text-slate-500">
                    {trustLabel}
                  </p>
                )}
                {trustItems && trustItems.length > 0 && (
                  <div className="flex flex-wrap gap-x-6 gap-y-2 text-sm text-slate-600">
                    {trustItems.map((item) => (
                      <div key={item} className="inline-flex items-center gap-2">
                        <span className="inline-block h-1.5 w-1.5 rounded-full bg-sky-500" />
                        <span>{item}</span>
                      </div>
                    ))}
                  </div>
                )}
              </div>
            )}
          </div>

          <div className="relative lg:justify-self-end" data-hero-el>
            <div className="mx-auto max-w-md">
              <div className="relative overflow-hidden rounded-3xl border border-slate-200 bg-slate-900 text-slate-50 shadow-xl">
                <div
                  className="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_top,_rgba(56,189,248,0.18),_transparent_55%),_radial-gradient(circle_at_bottom,_rgba(129,140,248,0.22),_transparent_55%)]"
                  aria-hidden="true"
                />
                <div className="relative flex flex-col gap-6 px-6 py-6 sm:px-8 sm:py-8">
                  <div className="space-y-2">
                    <p className="text-xs font-semibold uppercase tracking-[0.18em] text-sky-300" data-hero-el>
                      Remote partner · {countryName ?? "United States"}
                    </p>
                    <h2 className="text-lg font-semibold" data-hero-el>
                      Building software for {stateLabel ?? "US-based"} teams
                    </h2>
                    <p className="text-sm text-slate-200/80" data-hero-el>
                      We align with your time zone, roadmap and stakeholders while leveraging a senior
                      offshore squad for execution.
                    </p>
                  </div>

                  {highlights && highlights.length > 0 && (
                    <dl className="grid grid-cols-1 gap-3 text-sm sm:grid-cols-2" data-hero-el>
                      {highlights.map((highlight) => (
                        <div key={highlight.label} className="flex items-start gap-2">
                          <span className="mt-1.5 inline-block h-1.5 w-1.5 flex-shrink-0 rounded-full bg-sky-400" />
                          <div className="space-y-0.5">
                            <dt className="font-medium text-slate-50">{highlight.label}</dt>
                            {highlight.description && (
                              <dd className="text-xs text-slate-200/75">{highlight.description}</dd>
                            )}
                          </div>
                        </div>
                      ))}
                    </dl>
                  )}

                  <div className="flex items-center justify-between pt-1 text-xs text-slate-400" data-hero-el>
                    <span>12+ years in custom software</span>
                    <span>US-friendly collaboration</span>
                  </div>
                </div>
              </div>

              <p className="mt-3 text-xs text-slate-500" data-hero-el>
                Planning a project in {stateLabel ?? "the US"}? Let us plug in as your remote product
                team from day one.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}

function CtaAnchor({
  href,
  external,
  className,
  children,
}: {
  href: string;
  external?: boolean;
  className: string;
  children: React.ReactNode;
}) {
  if (external || href.startsWith("http")) {
    return (
      <a href={href} className={className} target="_blank" rel="noopener noreferrer">
        {children}
      </a>
    );
  }

  return (
    <Link href={href} className={className}>
      {children}
    </Link>
  );
}
