import type { OverviewBlockProps } from "@/lib/blocks/types";
import { Container, Section, SectionHeader } from "@/components/ui";

export function OverviewSection({
  id = "overview",
  eyebrow,
  title,
  intro,
  leftTitle,
  leftItems = [],
  rightTitle,
  rightItems = [],
  note,
  dataSection,
  dataAttributes,
  hookPrefix,
  csSection,
}: OverviewBlockProps) {
  const headingId = `${id}-heading`;

  return (
    <Section
      id={id}
      className="border-t border-slate-100 bg-white py-14 sm:py-18 lg:py-20"
      ariaLabelledBy={headingId}
      dataSection={dataSection}
      dataAttributes={{
        ...dataAttributes,
        ...(csSection ? { "data-cs-section": csSection } : {}),
      }}
    >
      <Container>
        <div {...(csSection === "solution" ? { "data-cs-el": "solution-heading" } : {})}>
          <SectionHeader eyebrow={eyebrow} title={title} subtitle={intro} id={headingId} />
        </div>
        {csSection === "solution" && intro && (
          <p className="hidden" data-cs-el="solution-intro">{intro}</p>
        )}

        <div className="mt-10 grid gap-10 lg:grid-cols-2">
          <div {...(hookPrefix ? { [`data-${hookPrefix}-overview-left`]: "" } : {})}>
            {leftTitle && <h3 className="text-sm font-semibold text-slate-900">{leftTitle}</h3>}
            <ul className="mt-4 space-y-2 text-sm text-muted-foreground">
              {leftItems.map((item) => (
                <li
                  key={item}
                  className="flex gap-2"
                  {...(csSection === "solution" ? { "data-cs-el": "solution-highlight-item" } : {})}
                >
                  <span className="mt-1.5 h-1.5 w-1.5 shrink-0 rounded-full bg-primary" />
                  <span>{item}</span>
                </li>
              ))}
            </ul>
          </div>
          <div
            {...(hookPrefix ? { [`data-${hookPrefix}-overview-right`]: "" } : {})}
            {...(csSection === "solution" ? { "data-cs-el": "solution-body" } : {})}
          >
            {rightTitle && <h3 className="text-sm font-semibold text-slate-900">{rightTitle}</h3>}
            <ul className="mt-4 space-y-2 text-sm text-muted-foreground">
              {rightItems.map((item) => (
                <li key={item} className="flex gap-2">
                  <span className="mt-1.5 h-1.5 w-1.5 shrink-0 rounded-full bg-primary" />
                  <span>{item}</span>
                </li>
              ))}
            </ul>
          </div>
        </div>

        {note && (
          <p className="mt-8 text-sm text-muted-foreground border-t border-slate-100 pt-6">{note}</p>
        )}
      </Container>
    </Section>
  );
}
