import type { MetricsBlockProps } from "@/lib/blocks/types";
import { Container, Section, SectionHeader } from "@/components/ui";

export function MetricsStrip({
  id = "metrics",
  title,
  subtitle,
  items,
  dataSection,
}: MetricsBlockProps) {
  const headingId = title ? `${id}-heading` : undefined;

  return (
    <Section
      id={id}
      className="bg-slate-950 py-14 text-white sm:py-16"
      ariaLabelledBy={headingId}
      dataSection={dataSection}
    >
      <Container>
        {title && (
          <SectionHeader title={title} subtitle={subtitle} id={headingId} align="center" dark />
        )}

        <dl className="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
          {items.map((metric) => (
            <div key={metric.label} className="rounded-2xl border border-slate-800 bg-slate-900/60 p-5" data-metric>
              <dt className="text-xs font-semibold uppercase tracking-wide text-slate-400">{metric.label}</dt>
              <dd className="mt-2 text-2xl font-bold text-white" data-metric-target>{metric.value}</dd>
              {metric.note && <p className="mt-2 text-xs text-slate-400">{metric.note}</p>}
            </div>
          ))}
        </dl>
      </Container>
    </Section>
  );
}
