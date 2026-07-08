import type { AboutCultureSectionProps } from "@/lib/blocks/types";

export function AboutCultureSection({
  id = "about-culture-values",
  headingId = "about-culture-values-heading",
  eyebrow,
  title,
  intro,
  dayToDay,
  values,
}: AboutCultureSectionProps) {
  return (
    <section
      id={id}
      aria-labelledby={headingId}
      className="bg-slate-50 text-slate-900"
      data-about-section="a7"
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

        <div className="mt-8 grid gap-8 lg:grid-cols-[minmax(0,1.2fr)_minmax(0,1fr)] lg:items-start">
          <div className="space-y-4">
            <p className="text-xs font-medium uppercase tracking-wide text-slate-500">{dayToDay.label}</p>
            <ul className="space-y-2 text-sm text-slate-700 sm:text-base">
              {dayToDay.bullets.map((bullet) => (
                <li key={bullet} className="flex gap-2">
                  <span className="mt-2 h-1.5 w-1.5 flex-shrink-0 rounded-full bg-accent-500" />
                  <span>{bullet}</span>
                </li>
              ))}
            </ul>
          </div>

          <div className="space-y-4">
            <p className="text-xs font-medium uppercase tracking-wide text-slate-500">{values.label}</p>
            <div className="grid gap-4 sm:grid-cols-2" data-values-grid>
              {values.items.map((value) => (
                <article
                  key={value.label}
                  className="rounded-2xl border border-slate-200 bg-white p-4 text-sm shadow-sm"
                  data-value-card
                >
                  <h3 className="text-sm font-semibold text-slate-900">{value.label}</h3>
                  <p className="mt-1 text-xs leading-relaxed text-slate-600">{value.description}</p>
                </article>
              ))}
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
