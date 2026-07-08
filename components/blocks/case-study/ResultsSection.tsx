import type { ResultsSectionProps } from "@/lib/blocks/types";
import { ButtonLink, Container, Section, SectionHeader } from "@/components/ui";

export function ResultsSection({
  id = "cs9-results",
  title = "Results & impact",
  subtitle,
  metrics,
  narrative,
  testimonial,
  inlineCta,
}: ResultsSectionProps) {
  const headingId = `${id}-heading`;

  return (
    <Section
      id={id}
      className="bg-white py-14 sm:py-18"
      ariaLabelledBy={headingId}
      dataAttributes={{ "data-cs-section": "results" }}
    >
      <Container>
        <div data-cs-el="results-heading">
          <SectionHeader title={title} subtitle={subtitle} id={headingId} />
        </div>
        {subtitle && <p className="hidden" data-cs-el="results-subtitle">{subtitle}</p>}

        {metrics && metrics.length > 0 && (
          <dl className="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            {metrics.map((metric) => (
              <div
                key={metric.label}
                className="rounded-2xl border border-slate-200 bg-slate-50 p-5"
                data-cs-el="metric-card"
              >
                <dt className="text-xs font-medium uppercase tracking-wide text-slate-500">
                  {metric.label}
                </dt>
                <dd className="mt-2 text-lg font-bold text-slate-900">{metric.value}</dd>
                {metric.note && <p className="mt-1 text-xs text-slate-500">{metric.note}</p>}
              </div>
            ))}
          </dl>
        )}

        {narrative && (
          <p className="mt-8 max-w-3xl text-sm text-slate-600 sm:text-base" data-cs-el="results-narrative">
            {narrative}
          </p>
        )}

        {testimonial && (
          <blockquote
            className="mt-8 max-w-2xl rounded-2xl border border-slate-200 bg-slate-50 p-6"
            data-cs-el="testimonial"
          >
            <p className="text-sm italic text-slate-700">{testimonial.quote}</p>
            {(testimonial.name || testimonial.role) && (
              <footer className="mt-3 text-xs text-slate-500">
                {testimonial.name && <span className="font-semibold text-slate-800">{testimonial.name}</span>}
                {testimonial.role && <span> · {testimonial.role}</span>}
              </footer>
            )}
          </blockquote>
        )}

        {inlineCta && (
          <div className="mt-8 flex flex-col gap-3 sm:flex-row sm:items-center" data-cs-el="inline-cta">
            {inlineCta.text && <p className="text-sm text-slate-600">{inlineCta.text}</p>}
            {inlineCta.href && inlineCta.linkLabel && (
              <ButtonLink href={inlineCta.href}>{inlineCta.linkLabel}</ButtonLink>
            )}
          </div>
        )}
      </Container>
    </Section>
  );
}
