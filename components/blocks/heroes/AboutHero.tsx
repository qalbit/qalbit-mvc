import Link from "next/link";
import type { AboutHeroProps } from "@/lib/blocks/types";
import { HtmlText } from "@/components/ui";
import { AboutArrowIcon } from "../about/AboutArrowIcon";

export function AboutHero({
  eyebrow = "About QalbIT",
  title,
  intro,
  bullets,
  primaryCta = { label: "Discuss your project", href: "/contact-us/" },
  secondaryCta = { label: "View our recent work", href: "/portfolio/" },
  snapshotTitle = "Quick snapshot",
  snapshot,
}: AboutHeroProps) {
  const headingId = "about-hero-heading";

  return (
    <section
      id="about-hero"
      aria-labelledby={headingId}
      className="bg-slate-50 text-slate-900"
      data-about-hero
    >
      <div className="mx-auto max-w-6xl px-4 py-14 sm:px-6 sm:py-18 lg:px-8 lg:py-20">
        <div className="grid gap-10 lg:grid-cols-[minmax(0,1.4fr)_minmax(0,1fr)] lg:items-center">
          <div className="space-y-6">
            <span
              className="items-center rounded-pill border border-slate-200 bg-white/90 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-muted-foreground shadow-soft md:inline-flex"
            >
              <span>{eyebrow}</span>
            </span>

            <h1
              id={headingId}
              className="text-center text-display-md font-bold sm:text-display-lg md:text-left md:text-display-2xl"
            >
              <HtmlText html={title} />
            </h1>

            {intro && (
              <p className="max-w-xl text-sm leading-relaxed text-slate-600 sm:text-base">
                <HtmlText html={intro} />
              </p>
            )}

            {bullets && bullets.length > 0 && (
              <ul className="space-y-2 text-sm text-slate-700 sm:text-base">
                {bullets.map((item) => (
                  <li key={item} className="flex items-center gap-2">
                    <span className="h-1.5 w-1.5 flex-shrink-0 rounded-full bg-accent-600" />
                    <span>{item}</span>
                  </li>
                ))}
              </ul>
            )}

            <div className="flex flex-wrap gap-3 pt-2">
              {primaryCta && (
                <Link
                  href={primaryCta.href}
                  className="inline-flex items-center justify-center rounded-full bg-accent-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-accent-700 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-accent-600 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-50"
                >
                  {primaryCta.label}
                  <AboutArrowIcon className="ml-2 h-4 w-4" />
                </Link>
              )}
              {secondaryCta && (
                <Link
                  href={secondaryCta.href}
                  className="inline-flex items-center justify-center rounded-full border border-slate-300 bg-white px-4 py-2.5 text-sm font-medium text-slate-900 transition hover:border-slate-400 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-accent-600 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-50"
                >
                  {secondaryCta.label}
                </Link>
              )}
            </div>
          </div>

          {snapshot && snapshot.length > 0 && (
            <div className="lg:pl-6">
              <div
                className="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6"
                data-about-hero-card
              >
                <p className="text-xs font-semibold uppercase tracking-wide text-slate-500">{snapshotTitle}</p>
                <dl className="mt-3 grid gap-4 text-sm text-slate-800 sm:grid-cols-2">
                  {snapshot.map((row) => (
                    <div key={row.label}>
                      <dt className="text-xs text-slate-500">{row.label}</dt>
                      <dd className="font-medium">{row.value}</dd>
                    </div>
                  ))}
                </dl>
              </div>
            </div>
          )}
        </div>
      </div>
    </section>
  );
}
