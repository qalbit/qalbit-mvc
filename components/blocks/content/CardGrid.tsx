import type { CardGridBlockProps } from "@/lib/blocks/types";
import { Container, Section, SectionHeader, Card } from "@/components/ui";
import { cn } from "@/lib/utils";

export function CardGrid({
  id,
  eyebrow,
  title,
  subtitle,
  items,
  columns = 3,
  variant = "default",
  dataSection,
  dataAttributes,
  dataAnimate,
  cardDataAttr,
  cardsWrapperAttr,
  csSection,
}: CardGridBlockProps) {
  const headingId = id ? `${id}-heading` : undefined;
  const colClass =
    columns === 2 ? "sm:grid-cols-2" : columns === 4 ? "sm:grid-cols-2 lg:grid-cols-4" : "sm:grid-cols-2 lg:grid-cols-3";

  return (
    <Section
      id={id}
      className={cn("py-14 sm:py-18 lg:py-20", variant === "dark" && "bg-slate-950")}
      ariaLabelledBy={headingId}
      dataSection={dataSection}
      dataAttributes={{
        ...dataAttributes,
        ...(dataAnimate ? { "data-animate": dataAnimate } : {}),
        ...(csSection ? { "data-cs-section": csSection } : {}),
      }}
    >
      <Container>
        <SectionHeader
          eyebrow={eyebrow}
          title={title}
          subtitle={subtitle}
          id={headingId}
          dark={variant === "dark"}
          align={variant === "dark" ? "center" : "left"}
        />

        <div
          className={cn("mt-10 grid gap-6", colClass)}
          {...(cardsWrapperAttr ? { [cardsWrapperAttr]: "" } : {})}
        >
          {items.map((item) => (
            <article
              key={item.title}
              {...(cardDataAttr ? { [cardDataAttr]: "" } : {})}
              {...(csSection ? { "data-cs-el": "related-card" } : {})}
            >
            <Card href={item.href} variant={variant === "dark" ? "dark" : "bordered"}>
              {item.badge && (
                <span className="mb-2 inline-block text-[10px] font-semibold uppercase tracking-wide text-primary">
                  {item.badge}
                </span>
              )}
              <h3 className={cn("font-semibold", variant === "dark" ? "text-slate-50" : "text-slate-900")}>
                {item.title}
              </h3>
              {item.description && (
                <p className={cn("mt-2 text-sm", variant === "dark" ? "text-slate-400" : "text-muted-foreground")}>
                  {item.description}
                </p>
              )}
              {item.meta && (
                <p className="mt-3 text-xs font-medium text-primary">{item.meta}</p>
              )}
            </Card>
            </article>
          ))}
        </div>
      </Container>
    </Section>
  );
}
