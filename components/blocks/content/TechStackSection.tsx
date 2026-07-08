import type { TechStackBlockProps } from "@/lib/blocks/types";
import { Container, Section, SectionHeader } from "@/components/ui";

export function TechStackSection({
  id = "tech-stack",
  eyebrow,
  title,
  intro,
  note,
  categories = [],
  items = [],
  pills = [],
  dataSection,
  dataAttributes,
  hookPrefix,
  mvpTechItem,
  csSection,
}: TechStackBlockProps) {
  const headingId = `${id}-heading`;

  return (
    <Section
      id={id}
      className="py-14 sm:py-18 lg:py-20"
      ariaLabelledBy={headingId}
      dataSection={dataSection}
      dataAttributes={{
        ...dataAttributes,
        ...(csSection ? { "data-cs-section": csSection } : {}),
      }}
    >
      <Container>
        <div {...(csSection ? { "data-cs-el": "stack-heading" } : {})}>
          <SectionHeader eyebrow={eyebrow} title={title} subtitle={intro} id={headingId} />
        </div>

        {categories.length > 0 && (
          <div className="mt-10 grid gap-8 sm:grid-cols-2">
            {categories.map((cat) => (
              <div
                key={cat.name ?? cat.title}
                className="rounded-2xl border border-slate-200 bg-white p-5 shadow-soft"
                {...(mvpTechItem ? { "data-mvp-tech-item": (cat.name ?? cat.title ?? "") } : {})}
                {...(csSection ? { "data-cs-el": "stack-column" } : {})}
              >
                <h3 className="font-semibold text-slate-900">{cat.name ?? cat.title}</h3>
                {cat.description && (
                  <p className="mt-1 text-sm text-muted-foreground">{cat.description}</p>
                )}
                {cat.items && (
                  <ul className="mt-4 space-y-1.5 text-sm text-muted-foreground">
                    {cat.items.map((line) => (
                      <li key={line}>{line}</li>
                    ))}
                  </ul>
                )}
              </div>
            ))}
          </div>
        )}

        {items.length > 0 && (
          <div
            className="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3"
            {...(hookPrefix ? { [`data-${hookPrefix}-tech-stack-grid`]: "" } : {})}
          >
            {items.map((item, index) => (
              <div
                key={`${item.label}-${index}`}
                className="rounded-lg border border-slate-200 bg-slate-50 p-4"
                {...(mvpTechItem ? { "data-mvp-tech-item": String(index) } : {})}
                {...(csSection ? { "data-cs-el": "stack-item" } : {})}
              >
                <h4 className="font-medium text-slate-900">{item.label ?? item.title}</h4>
                {item.description && (
                  <p className="mt-1 text-sm text-muted-foreground">{item.description}</p>
                )}
              </div>
            ))}
          </div>
        )}

        {pills.length > 0 && (
          <div className="mt-8 flex flex-wrap gap-2">
            {pills.map((pill) => (
              <span
                key={pill}
                className="rounded-full border border-slate-200 bg-white px-3 py-1 text-xs font-medium text-slate-700"
                {...(csSection ? { "data-cs-el": "stack-pill" } : {})}
              >
                {pill}
              </span>
            ))}
          </div>
        )}

        {note && <p className="mt-8 text-sm text-muted-foreground">{note}</p>}
      </Container>
    </Section>
  );
}
