import type { AboutTrustSectionProps } from "@/lib/blocks/types";

export function AboutTrustSection({
  id = "about-certifications",
  headingId = "about-certifications-heading",
  eyebrow,
  title,
  intro,
  items,
}: AboutTrustSectionProps) {
  return (
    <section
      id={id}
      aria-labelledby={headingId}
      className="bg-white text-slate-900"
      data-about-section="a11"
    >
      <div className="mx-auto max-w-6xl px-4 py-12 sm:px-6 sm:py-16 lg:px-8 lg:py-20">
        <header className="max-w-3xl space-y-3">
          <p className="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-slate-50 px-3 py-1 text-xs font-medium text-slate-700">
            <span className="h-1.5 w-1.5 rounded-full bg-accent-500" />
            <span>{eyebrow}</span>
          </p>
          <h2 id={headingId} className="text-display-md font-bold sm:text-display-lg md:text-display-xl">
            {title}
          </h2>
          {intro && <p className="text-sm leading-relaxed text-slate-600 sm:text-base">{intro}</p>}
        </header>

        <div className="mt-8 grid gap-4 sm:mt-10 sm:grid-cols-3" data-trust-grid>
          {items.map((item) => (
            <article
              key={item.label}
              className="flex flex-col rounded-2xl border border-slate-200 bg-slate-50 p-4 text-sm shadow-sm sm:p-5"
              data-trust-card
            >
              <h3 className="text-sm font-semibold text-slate-900">{item.label}</h3>
              {item.description && (
                <p className="mt-2 text-xs leading-relaxed text-slate-600 sm:text-sm">{item.description}</p>
              )}
              {item.bullets && item.bullets.length > 0 && (
                <ul className="mt-2 space-y-1.5 text-[11px] text-slate-600">
                  {item.bullets.map((bullet) => (
                    <li key={bullet} className="flex gap-2">
                      <span className="mt-1 h-1 w-1 flex-shrink-0 rounded-full bg-accent-500" />
                      <span>{bullet}</span>
                    </li>
                  ))}
                </ul>
              )}
            </article>
          ))}
        </div>
      </div>
    </section>
  );
}
