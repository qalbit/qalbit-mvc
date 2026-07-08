import Link from "next/link";
import { HtmlText } from "@/components/ui";
import { asset } from "@/lib/site";
import type {
  CaseStudyAboutProps,
  CaseStudyHeroProps,
  CaseStudyRelatedCtaProps,
} from "@/lib/blocks/case-study-mappers";

export function CaseStudyHeroSection({
  breadcrumbLabel,
  eyebrow,
  industry,
  title,
  subtitle,
  snapshotCards,
  primaryCta,
  secondaryCta,
  mediaSrc,
  mediaAlt,
  location,
  caseStudyName,
}: CaseStudyHeroProps) {
  return (
    <section
      className="relative overflow-hidden bg-slate-50 py-6 text-slate-900 sm:py-10 lg:py-14"
      data-cs-section="hero"
    >
      <div className="relative mx-auto max-w-6xl space-y-6 px-4 sm:px-6 md:space-y-10 lg:px-8">
        <nav className="text-[11px] font-medium text-slate-600 sm:text-xs" aria-label="Breadcrumb">
          <ol className="flex flex-wrap items-center gap-1">
            <li>
              <Link href="/" className="transition-colors hover:text-sky-500">Home</Link>
            </li>
            <li className="text-slate-400">/</li>
            <li aria-current="page" className="text-slate-900">{breadcrumbLabel}</li>
          </ol>
        </nav>

        <div className="grid gap-6 lg:grid-cols-[minmax(0,3fr)_minmax(0,2.4fr)] lg:items-center">
          <div className="space-y-4" data-cs-hero-el="copy">
            <div className="flex flex-wrap items-center gap-2">
              <span
                className="inline-flex items-center rounded-pill border border-slate-200 bg-white/80 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-slate-600 shadow-soft"
                data-cs-el="hero-kicker"
              >
                {eyebrow}
              </span>
              {industry && <span className="hidden text-xs text-slate-500 sm:inline-flex">{industry}</span>}
            </div>

            <h1
              className="text-center text-display-sm font-bold sm:text-display-md md:text-left md:text-display-lg"
              data-cs-el="hero-title"
              data-cs-hero-el="title"
            >
              <HtmlText html={title} />
            </h1>

            {subtitle && (
              <p
                className="max-w-2xl text-pretty text-sm font-medium text-slate-600 sm:text-md"
                data-cs-el="hero-subtitle"
                data-cs-hero-el="subtitle"
              >
                {subtitle}
              </p>
            )}

            {snapshotCards.length > 0 && (
              <div className="mt-2 grid gap-4 sm:grid-cols-2" data-cs-hero-el="snapshot-inline">
                {snapshotCards.map((card) => (
                  <div
                    key={card.label}
                    className="rounded-md border border-slate-200 bg-white/70 p-2 shadow-soft-sm sm:p-4"
                    data-cs-el="snapshot-card"
                  >
                    <div className="text-[10px] font-semibold uppercase tracking-[0.16em] text-slate-500">
                      {card.label}
                    </div>
                    <div className="mt-0.5 text-xs font-semibold text-slate-900">{card.value}</div>
                  </div>
                ))}
              </div>
            )}

            {(primaryCta || secondaryCta) && (
              <div className="space-y-2 pt-2" data-cs-el="hero-cta" data-cs-hero-el="ctas">
                <div className="flex flex-col gap-3 sm:flex-row sm:flex-wrap sm:items-center">
                  {primaryCta && (
                    <Link href={primaryCta.href} className="btn btn-accent btn-radius-pill">
                      {primaryCta.label}
                    </Link>
                  )}
                  {secondaryCta && (
                    <Link href={secondaryCta.href} className="btn btn-primary-outline btn-radius-pill">
                      {secondaryCta.label}
                    </Link>
                  )}
                </div>
                <p className="text-[11px] text-slate-500">
                  Share your current scheduling, operations or product challenges and we&apos;ll respond
                  within <span className="font-semibold">24–48 hours</span> with practical next steps.
                </p>
              </div>
            )}
          </div>

          <div className="relative" data-cs-hero-el="media" data-cs-el="hero-media">
            <div className="relative overflow-hidden rounded-3xl border border-slate-200 bg-slate-900/95 shadow-xl shadow-slate-900/20">
              {mediaSrc ? (
                <img
                  src={mediaSrc}
                  alt={mediaAlt ?? caseStudyName}
                  className="block h-full w-full object-cover"
                  loading="lazy"
                />
              ) : (
                <div className="flex aspect-video items-center justify-center bg-slate-800 text-xs text-slate-400">
                  Case study hero visual
                </div>
              )}
              <div
                className="pointer-events-none absolute inset-x-4 bottom-4 flex items-center justify-between rounded-sm bg-slate-900/80 px-2 py-2.5 text-[10px] text-slate-100 backdrop-blur"
              >
                <span className="font-medium">{caseStudyName}</span>
                {location && <span className="hidden text-end text-slate-300 sm:inline">{location}</span>}
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}

export function CaseStudyAboutSection({
  id,
  title,
  intro,
  clientStory,
  atAGlanceTitle,
  atAGlance,
  industry,
  location,
}: CaseStudyAboutProps) {
  return (
    <section
      id={id}
      className="relative bg-slate-950 py-14 text-slate-50 sm:py-18 lg:py-20"
      data-cs-section="about"
    >
      <div className="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-sky-500/0 via-sky-500/40 to-sky-500/0" />

      <div className="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <div className="grid gap-10 lg:grid-cols-[minmax(0,3fr)_minmax(0,2.2fr)] lg:items-start">
          <div className="space-y-5" data-cs-about-el="narrative">
            <header className="space-y-3" data-cs-el="about-heading">
              <p className="text-[11px] font-semibold uppercase tracking-[0.16em] text-sky-400">
                About the client & context
              </p>
              <h2 className="text-display-md font-bold tracking-tight text-white sm:text-display-lg md:text-display-xl">
                {title}
              </h2>
            </header>

            {intro && (
              <p className="text-sm leading-relaxed text-slate-300 sm:text-base" data-cs-el="about-copy">
                {intro}
              </p>
            )}

            {clientStory && (
              <div className="space-y-3 text-sm leading-relaxed text-slate-300 sm:text-base">
                <p>{clientStory}</p>
              </div>
            )}

            {(industry || location) && (
              <div className="mt-4 flex flex-wrap gap-3 text-[11px] text-slate-400 sm:text-xs">
                {industry && (
                  <span className="inline-flex items-center gap-1 rounded-full border border-slate-800 bg-slate-900/60 px-3 py-1">
                    <span className="h-1.5 w-1.5 rounded-full bg-sky-400" />
                    <span className="font-medium">{industry}</span>
                  </span>
                )}
                {location && (
                  <span className="inline-flex items-center gap-1 rounded-full border border-slate-800 bg-slate-900/60 px-3 py-1">
                    <span className="h-1.5 w-1.5 rounded-full bg-emerald-400" />
                    <span className="font-medium">{location}</span>
                  </span>
                )}
              </div>
            )}
          </div>

          <aside
            className="rounded-3xl border border-slate-800 bg-slate-900/70 p-5 shadow-[0_18px_45px_rgba(15,23,42,0.8)] sm:p-6 lg:p-7"
            data-cs-about-el="at-a-glance"
            data-cs-el="about-glance"
          >
            <div className="mb-6 flex flex-col items-start gap-1">
              <h3 className="text-xs font-bold uppercase tracking-[0.18em] text-slate-300 sm:text-sm">
                {atAGlanceTitle}
              </h3>
              <span className="text-[11px] font-medium text-slate-500">
                Snapshot of the organisation we built for
              </span>
            </div>
            <dl className="space-y-4 text-xs sm:text-sm">
              {atAGlance.map((row) => (
                <div key={row.label} className="space-y-0.5" data-cs-el="about-glance-item">
                  <dt className="text-[10px] font-semibold uppercase tracking-[0.16em] text-slate-500">
                    {row.label}
                  </dt>
                  <dd className="font-medium text-slate-100">{row.value}</dd>
                </div>
              ))}
            </dl>
          </aside>
        </div>
      </div>
    </section>
  );
}

export function CaseStudyRelatedCtaSection({
  id,
  title,
  subtitle,
  relatedCases,
  servicesUsedTitle,
  servicesUsed,
  finalCta,
}: CaseStudyRelatedCtaProps) {
  return (
    <section
      id={id}
      className="relative bg-slate-950 py-14 text-slate-50 sm:py-18 lg:py-20"
      data-cs-section="related"
    >
      <div className="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-sky-500/0 via-emerald-400/50 to-sky-500/0" />

      <div className="mx-auto max-w-6xl space-y-10 px-4 sm:px-6 lg:px-8">
        <div className="space-y-6" data-cs-related-el="wrapper">
          <header className="max-w-3xl space-y-3" data-cs-el="related-heading">
            <p className="text-[11px] font-semibold uppercase tracking-[0.16em] text-sky-400">
              Related case studies & services
            </p>
            <h2 className="text-display-md font-bold tracking-tight text-white sm:text-display-lg md:text-display-xl">
              {title}
            </h2>
            {subtitle && (
              <p className="text-sm leading-relaxed text-slate-300 sm:text-base" data-cs-el="related-subtitle">
                {subtitle}
              </p>
            )}
          </header>

          <div
            className="grid gap-8 lg:grid-cols-[minmax(0,3.1fr)_minmax(0,2.1fr)] lg:items-start"
            data-cs-related-el="layout"
          >
            <div className="space-y-4" data-cs-related-el="case-studies">
              {relatedCases.length > 0 ? (
                <div className="grid gap-4 sm:grid-cols-2">
                  {relatedCases.map((cs) => (
                    <Link
                      key={cs.href}
                      href={cs.href}
                      className="group relative block rounded-3xl border border-slate-800 bg-slate-900/70 p-4 shadow-[0_18px_45px_rgba(15,23,42,0.85)] transition-transform duration-200 hover:-translate-y-1 hover:border-sky-400/70 sm:p-5"
                      data-cs-el="related-card"
                    >
                      <h3 className="line-clamp-2 text-sm font-semibold text-slate-50 sm:text-[15px]">
                        {cs.name}
                      </h3>
                      {cs.summary && (
                        <p className="mt-2 line-clamp-3 text-xs leading-relaxed text-slate-300 sm:text-[13px]">
                          {cs.summary}
                        </p>
                      )}
                    </Link>
                  ))}
                </div>
              ) : (
                <div className="rounded-3xl border border-slate-800 bg-slate-900/70 p-4 sm:p-5">
                  <p className="text-xs leading-relaxed text-slate-300 sm:text-sm">
                    Browse all projects in our{" "}
                    <Link href="/portfolio/" className="text-sky-400 underline underline-offset-2 hover:text-sky-300">
                      case studies gallery
                    </Link>.
                  </p>
                </div>
              )}
            </div>

            <aside
              className="space-y-4 rounded-3xl border border-slate-800 bg-slate-900/80 p-5 shadow-[0_18px_45px_rgba(15,23,42,0.9)] sm:p-6 lg:p-7"
              data-cs-related-el="services"
            >
              <header className="space-y-1" data-cs-el="services-used-heading">
                <h3 className="text-xs font-semibold uppercase tracking-[0.18em] text-slate-300 sm:text-sm">
                  {servicesUsedTitle}
                </h3>
                <p className="text-[11px] text-slate-500 sm:text-xs">
                  These are the main QalbIT capabilities we combined to deliver this project.
                </p>
              </header>

              {servicesUsed.length > 0 ? (
                <ul className="space-y-2 text-[11px] sm:text-xs">
                  {servicesUsed.map((svc) => (
                    <li key={svc.href} data-cs-el="service-used">
                      <Link
                        href={svc.href}
                        className="inline-flex w-full items-center justify-between gap-2 rounded-full border border-slate-700 bg-slate-900 px-3 py-1.5 text-left text-slate-100 transition-colors hover:border-sky-400 hover:bg-slate-900/80"
                        data-cs-el="service-link"
                      >
                        <span className="font-medium">{svc.label}</span>
                        <span aria-hidden="true" className="text-[9px] text-slate-400">↗</span>
                      </Link>
                    </li>
                  ))}
                </ul>
              ) : (
                <p className="text-[11px] text-slate-500 sm:text-xs">
                  The specific services used for this project will be documented here.
                </p>
              )}
            </aside>
          </div>
        </div>

        {finalCta && (
          <div
            id={finalCta.id}
            className="rounded-3xl border border-sky-500/40 bg-gradient-to-r from-sky-600 via-sky-500 to-sky-700 px-5 py-6 shadow-[0_24px_60px_rgba(8,47,73,0.9)] sm:px-7 sm:py-7 lg:px-9 lg:py-8"
            data-cs-section="final-cta"
            data-cs-final-cta-el="band"
          >
            <div className="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
              <div className="max-w-2xl space-y-2">
                {finalCta.eyebrow && (
                  <p className="text-[11px] font-semibold uppercase tracking-[0.18em] text-sky-100/80 sm:text-xs">
                    {finalCta.eyebrow}
                  </p>
                )}
                <h3 className="text-lg font-bold text-white sm:text-xl md:text-2xl">{finalCta.title}</h3>
                {finalCta.text && (
                  <p className="text-[11px] leading-relaxed text-sky-100/90 sm:text-xs">{finalCta.text}</p>
                )}
              </div>
              <div className="flex flex-col gap-2 sm:items-center sm:justify-end">
                <Link
                  href={finalCta.primary.href}
                  className="inline-flex flex-shrink-0 items-center justify-center rounded-full bg-white px-4 py-2 text-[11px] font-semibold text-sky-700 shadow-soft-sm transition-colors hover:bg-sky-50 sm:text-xs"
                >
                  {finalCta.primary.label}
                  <span aria-hidden="true" className="ml-1 text-[10px]">↗</span>
                </Link>
                {finalCta.secondary && (
                  <Link
                    href={finalCta.secondary.href}
                    className="inline-flex flex-shrink-0 items-center justify-center rounded-full border border-sky-100/80 px-4 py-2 text-[11px] font-semibold text-sky-50 transition-colors hover:bg-sky-600/60 sm:text-xs"
                  >
                    {finalCta.secondary.label}
                  </Link>
                )}
              </div>
            </div>
          </div>
        )}
      </div>
    </section>
  );
}
