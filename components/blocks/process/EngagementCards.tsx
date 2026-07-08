import type { EngagementCardsProps } from "@/lib/blocks/types";
import { Container, Section, SectionHeader } from "@/components/ui";

export function EngagementCards({
  id = "mvp-engagements",
  eyebrow = "Engagement models",
  title = "Engagement models and budget guidance",
  intro,
  models,
  note,
  dataSection,
  dataAttributes,
  mvpEngagementCard,
}: EngagementCardsProps) {
  const headingId = `${id}-heading`;

  return (
    <Section
      id={id}
      className="bg-white py-14 sm:py-18"
      ariaLabelledBy={headingId}
      dataSection={dataSection}
      dataAttributes={dataAttributes ?? { "data-mvp-section": "s5" }}
    >
      <Container>
        <SectionHeader eyebrow={eyebrow} title={title} subtitle={intro} id={headingId} />

        <div className="mt-10 grid gap-6 sm:grid-cols-2">
          {models.map((model) => (
            <article
              key={model.key ?? model.label}
              className="rounded-2xl border border-slate-200 p-5 shadow-sm"
              data-engagement-model={model.key}
              data-engagement-card=""
              {...(mvpEngagementCard ? { "data-mvp-engagement-card": "" } : {})}
            >
              <div className="flex items-start justify-between gap-3">
                <h3 className="font-semibold text-slate-900">{model.label}</h3>
                {model.badge && (
                  <span className="rounded-full bg-slate-100 px-2 py-0.5 text-[10px] font-semibold text-slate-600">
                    {model.badge}
                  </span>
                )}
              </div>
              {model.description && (
                <p className="mt-2 text-sm text-slate-600">{model.description}</p>
              )}
              {model.bestFor && (
                <p className="mt-3 text-xs text-slate-500">
                  <span className="font-semibold text-slate-700">Best for: </span>
                  {model.bestFor}
                </p>
              )}
              {model.budgetRange && (
                <p className="mt-1 text-xs text-slate-500">
                  <span className="font-semibold text-slate-700">Budget: </span>
                  {model.budgetRange}
                </p>
              )}
              {model.deliverables && (
                <p className="mt-1 text-xs text-slate-500">
                  <span className="font-semibold text-slate-700">Deliverables: </span>
                  {model.deliverables}
                </p>
              )}
            </article>
          ))}
        </div>

        {note && (
          <p className="mt-8 text-sm text-slate-600">{note}</p>
        )}
      </Container>
    </Section>
  );
}
