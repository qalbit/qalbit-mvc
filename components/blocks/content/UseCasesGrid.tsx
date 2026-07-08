import type { UseCasesBlockProps } from "@/lib/blocks/types";
import { ButtonLink, Card, Container, Section, SectionHeader } from "@/components/ui";
import { cn } from "@/lib/utils";

export function UseCasesGrid({
  id = "use-cases",
  eyebrow,
  title,
  intro,
  items,
  cta,
  note,
  columns = 2,
  dataSection,
  dataAttributes,
  hookPrefix,
  mvpServiceCard,
  csSection,
}: UseCasesBlockProps) {
  const headingId = `${id}-heading`;
  const colClass =
    columns === 3 ? "sm:grid-cols-2 lg:grid-cols-3" : "sm:grid-cols-2";

  return (
    <Section
      id={id}
      className="bg-slate-50 py-14 sm:py-18 lg:py-20"
      ariaLabelledBy={headingId}
      dataSection={dataSection}
      dataAttributes={{
        ...dataAttributes,
        ...(csSection ? { "data-cs-section": csSection } : {}),
      }}
    >
      <Container>
        <SectionHeader eyebrow={eyebrow} title={title} subtitle={intro} id={headingId} />

        <div
          className={cn("mt-10 grid gap-6", colClass)}
          {...(hookPrefix ? { [`data-${hookPrefix}-use-cases-grid`]: "" } : {})}
        >
          {items.map((item, index) => {
            const label = item.label ?? item.title ?? `Use case ${index + 1}`;
            return (
              <article
                key={`${label}-${index}`}
                {...(mvpServiceCard ? { "data-mvp-service-card": "" } : {})}
                {...(csSection ? { "data-cs-el": "use-case-card" } : {})}
              >
              <Card>
                {item.badge && (
                  <span className="mb-2 inline-block text-[10px] font-semibold uppercase tracking-wide text-primary-700">
                    {item.badge}
                  </span>
                )}
                <h3 className="font-semibold text-slate-900">{label}</h3>
                {item.description && (
                  <p className="mt-2 text-sm text-muted-foreground">{item.description}</p>
                )}
                {item.audience && (
                  <p className="mt-2 text-xs text-muted-foreground">Audience: {item.audience}</p>
                )}
                {item.link && (item.link.url || item.link.href) && (
                  <ButtonLink
                    href={(item.link.url ?? item.link.href) as string}
                    variant="ghost"
                    className="mt-3"
                  >
                    {item.link.label ?? "Discuss this use case"}
                  </ButtonLink>
                )}
              </Card>
              </article>
            );
          })}
        </div>

        {note && <p className="mt-8 max-w-3xl text-sm text-muted-foreground">{note}</p>}

        {cta && (
          <div className="mt-8">
            <ButtonLink href={cta.href}>{cta.label}</ButtonLink>
          </div>
        )}
      </Container>
    </Section>
  );
}
