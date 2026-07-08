import Link from "next/link";
import type { AboutCareerSectionProps } from "@/lib/blocks/types";

export function AboutCareerSection({
  id = "about-careers",
  headingId = "about-careers-heading",
  eyebrow,
  title,
  intro,
  team,
  cta,
}: AboutCareerSectionProps) {
  return (
    <section
      id={id}
      aria-labelledby={headingId}
      className="bg-slate-50 text-slate-900"
      data-about-section="a12"
    >
      <div className="mx-auto max-w-6xl px-4 py-12 sm:px-6 sm:py-16 lg:px-8 lg:py-20">
        <header className="max-w-3xl space-y-3">
          <p className="inline-flex items-center gap-2 rounded-full border border-accent-200 bg-accent-50 px-3 py-1 text-xs font-medium text-accent-700">
            <span className="h-1.5 w-1.5 rounded-full bg-accent-500" />
            <span>{eyebrow}</span>
          </p>
          <h2 id={headingId} className="text-display-md font-bold sm:text-display-lg md:text-display-xl">
            {title}
          </h2>
          {intro && <p className="text-sm leading-relaxed text-slate-600 sm:text-base">{intro}</p>}
        </header>

        <div className="mt-8 grid gap-8 lg:grid-cols-[minmax(0,1.3fr)_minmax(0,0.9fr)] lg:items-start">
          <div className="space-y-3">
            <p className="text-xs font-medium uppercase tracking-wide text-slate-500">{team.label}</p>
            <ul className="space-y-2 text-sm text-slate-700 sm:text-base">
              {team.bullets.map((bullet) => (
                <li key={bullet} className="flex gap-2">
                  <span className="mt-1 h-1.5 w-1.5 flex-shrink-0 rounded-full bg-accent-500" />
                  <span>{bullet}</span>
                </li>
              ))}
            </ul>
          </div>

          <div className="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6" data-careers-card>
            <p className="text-sm font-semibold text-slate-900">{cta.title}</p>
            <p className="mt-2 text-xs leading-relaxed text-slate-600 sm:text-sm">{cta.description}</p>
            <div className="mt-4 flex flex-wrap gap-3">
              <Link
                href={cta.primaryCta.href}
                className="inline-flex items-center justify-center rounded-full bg-accent-600 px-4 py-2 text-xs font-semibold text-white shadow-sm transition hover:bg-accent-700 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-accent-600 focus-visible:ring-offset-2 focus-visible:ring-offset-white"
              >
                {cta.primaryCta.label}
              </Link>
              {cta.secondaryCta && (
                <a
                  href={cta.secondaryCta.href}
                  className="inline-flex items-center justify-center rounded-full border border-slate-300 bg-white px-4 py-2 text-xs font-medium text-slate-900 transition hover:border-slate-400 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-accent-600 focus-visible:ring-offset-2 focus-visible:ring-offset-white"
                >
                  {cta.secondaryCta.label}
                </a>
              )}
            </div>
            {cta.footnote && <p className="mt-3 text-[11px] text-slate-500">{cta.footnote}</p>}
          </div>
        </div>
      </div>
    </section>
  );
}
