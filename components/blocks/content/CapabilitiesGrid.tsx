import type { CapabilitiesBlockProps } from "@/lib/blocks/types";
import { asset } from "@/lib/site";
import { ButtonLink, Card, Container, Section, SectionHeader } from "@/components/ui";
import { cn } from "@/lib/utils";

export function CapabilitiesGrid({
  id = "capabilities",
  eyebrow,
  title,
  intro,
  items,
  note,
  cta,
  dataSection,
  variant = "default",
  dataAttributes,
  hookPrefix,
  csSection,
}: CapabilitiesBlockProps) {
  const headingId = `${id}-heading`;
  const dark = variant === "dark";

  return (
    <Section
      id={id}
      className={cn("py-14 sm:py-18 lg:py-20", dark ? "bg-slate-950 text-slate-50" : "bg-slate-50")}
      ariaLabelledBy={headingId}
      dataSection={dataSection}
      dataAttributes={{
        ...dataAttributes,
        ...(csSection ? { "data-cs-section": csSection } : {}),
      }}
    >
      <Container>
        <div {...(csSection === "features" ? { "data-cs-el": "features-heading" } : {})}>
          <SectionHeader
            eyebrow={eyebrow}
            title={title}
            subtitle={intro}
            id={headingId}
            dark={dark}
          />
        </div>
        {csSection === "features" && intro && (
          <p className="hidden" data-cs-el="features-subtitle">{intro}</p>
        )}

        <div className="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
          {items.map((item, index) => {
            const label = item.label ?? item.title ?? item.name ?? `Capability ${index + 1}`;
            return (
              <article
                key={`${label}-${index}`}
                {...(hookPrefix ? { [`data-${hookPrefix}-capability-card`]: "" } : {})}
                {...(csSection ? { "data-cs-el": "feature-card" } : {})}
              >
              <Card variant={dark ? "dark" : "bordered"}>
                {item.badge && (
                  <span className="mb-2 inline-block text-[10px] font-semibold uppercase tracking-wide text-primary-700">
                    {item.badge}
                  </span>
                )}
                {item.icon && (
                  <img
                    src={asset(item.icon.replace(/^\//, ""))}
                    alt=""
                    className="mb-3 h-8 w-8"
                    aria-hidden="true"
                  />
                )}
                <h3 className={cn("font-semibold", dark ? "text-slate-50" : "text-slate-900")}>
                  {label}
                </h3>
                {item.description && (
                  <p className={cn("mt-2 text-sm", dark ? "text-slate-400" : "text-muted-foreground")}>
                    {item.description}
                  </p>
                )}
                {item.link && (item.link.url || item.link.href) && (
                  <ButtonLink
                    href={(item.link.url ?? item.link.href) as string}
                    variant="ghost"
                    className="mt-3"
                  >
                    {item.link.label ?? "Learn more"}
                  </ButtonLink>
                )}
              </Card>
              </article>
            );
          })}
        </div>

        {note && <p className="mt-8 text-sm text-muted-foreground">{note}</p>}
        {cta && (
          <div className="mt-8">
            <ButtonLink href={cta.href}>{cta.label}</ButtonLink>
          </div>
        )}
      </Container>
    </Section>
  );
}
