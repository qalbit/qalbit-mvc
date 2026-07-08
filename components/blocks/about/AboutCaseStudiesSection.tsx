import Link from "next/link";
import type { AboutCaseStudiesSectionProps } from "@/lib/blocks/types";
import { AboutArrowIcon } from "./AboutArrowIcon";

export function AboutCaseStudiesSection({
  id = "about-case-studies",
  headingId = "about-case-studies-heading",
  eyebrow,
  title,
  intro,
  items,
  footnote,
}: AboutCaseStudiesSectionProps) {
  return (
    <section
      id={id}
      aria-labelledby={headingId}
      className="bg-slate-50 text-slate-900"
      data-about-section="a9"
    >
      <div className="mx-auto max-w-6xl px-4 py-12 sm:px-6 sm:py-16 lg:px-8 lg:py-20">
        <header className="max-w-3xl space-y-3">
          <p className="inline-flex items-center gap-2 rounded-full border border-accent-200 bg-accent-50 px-3 py-1 text-xs font-medium text-accent-700">
            <span className="h-1.5 w-1.5 rounded-full bg-accent-500" />
            <span>{eyebrow}</span>
          </p>
          <h2 id={headingId} className="text-xl font-semibold tracking-tight sm:text-2xl lg:text-3xl">
            {title}
          </h2>
          {intro && <p className="text-sm leading-relaxed text-slate-600 sm:text-base">{intro}</p>}
        </header>

        <div className="mt-8 grid gap-4 sm:mt-10 sm:grid-cols-2 lg:grid-cols-3" data-case-grid-about>
          {items.map((item) => (
            <article
              key={item.key ?? item.title}
              className="flex flex-col rounded-2xl border border-slate-200 bg-white p-4 text-sm shadow-sm sm:p-5"
              data-case-card-about
            >
              <div className="mb-2 flex items-center justify-between gap-2">
                {item.category && (
                  <p className="text-[11px] font-medium uppercase tracking-wide text-accent-700">
                    {item.category}
                  </p>
                )}
                {item.badge && (
                  <span className="flex-shrink-0 rounded-full bg-accent-50 px-2 py-0.5 text-[11px] font-medium text-accent-700">
                    {item.badge}
                  </span>
                )}
              </div>
              <h3 className="text-sm font-semibold text-slate-900">{item.title}</h3>
              {item.description && (
                <p className="mt-2 text-xs leading-relaxed text-slate-600 sm:text-sm">{item.description}</p>
              )}
              {item.details && item.details.length > 0 && (
                <dl className="mt-3 space-y-1.5 text-[11px] text-slate-500">
                  {item.details.map((detail) => (
                    <div key={detail.label} className="flex justify-between gap-2">
                      <dt>{detail.label}</dt>
                      <dd className="text-end font-medium text-slate-800">{detail.value}</dd>
                    </div>
                  ))}
                </dl>
              )}
              {item.link && (
                <Link
                  href={item.link.href}
                  className="mt-3 inline-flex items-center text-[11px] font-medium text-accent-700 hover:text-accent-800"
                >
                  {item.link.label ?? "View case study"}
                  <AboutArrowIcon className="ml-1 h-3 w-3" />
                </Link>
              )}
            </article>
          ))}
        </div>

        {footnote && <div className="mt-6 text-xs text-slate-500 sm:text-sm">{footnote}</div>}
      </div>
    </section>
  );
}
