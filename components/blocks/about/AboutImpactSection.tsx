import type { AboutImpactSectionProps } from "@/lib/blocks/types";

export function AboutImpactSection({
  id = "about-impact",
  headingId = "about-impact-heading",
  eyebrow,
  title,
  intro,
  metrics,
  footnote,
}: AboutImpactSectionProps) {
  return (
    <section
      id={id}
      aria-labelledby={headingId}
      className="bg-white text-slate-900"
      data-about-section="a4"
    >
      <div className="mx-auto max-w-6xl px-4 py-12 sm:px-6 sm:py-16 lg:px-8 lg:py-20">
        <header className="max-w-3xl">
          {eyebrow && (
            <p className="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-slate-50 px-3 py-1 text-xs font-medium text-slate-700">
              <span className="h-1.5 w-1.5 rounded-full bg-accent-400" />
              <span>{eyebrow}</span>
            </p>
          )}
          <h2
            id={headingId}
            className="mt-3 text-display-md font-bold sm:text-display-lg md:text-display-xl"
          >
            {title}
          </h2>
          {intro && (
            <p className="mt-3 text-sm leading-relaxed text-slate-600 sm:text-base">{intro}</p>
          )}
        </header>

        <dl className="mt-8 grid gap-6 text-slate-900 sm:grid-cols-2 lg:grid-cols-4" data-metrics-grid>
          {metrics.map((metric) => (
            <div
              key={metric.label}
              className="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-5 text-center shadow-sm"
              data-metric
            >
              <dd
                className="text-3xl font-bold tracking-tight text-accent-600 sm:text-4xl"
                data-metric-value
                data-metric-target={metric.target ?? undefined}
              >
                {metric.value}
              </dd>
              <dt className="mt-1 text-xs font-medium uppercase tracking-wide text-slate-500">
                {metric.label}
              </dt>
              {metric.description && (
                <p className="mt-2 text-xs leading-relaxed text-slate-600">{metric.description}</p>
              )}
            </div>
          ))}
        </dl>

        {footnote && <p className="mt-6 text-xs text-slate-500 sm:text-sm">{footnote}</p>}
      </div>
    </section>
  );
}
