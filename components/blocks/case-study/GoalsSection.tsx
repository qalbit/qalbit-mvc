import type { GoalsSectionProps } from "@/lib/blocks/types";
import { Container, Section, SectionHeader } from "@/components/ui";

export function GoalsSection({
  id = "cs4-goals",
  title = "Project goals & success criteria",
  businessGoalsTitle = "Business goals",
  businessGoals,
  productGoalsTitle = "Product & technical goals",
  productGoals,
  note,
}: GoalsSectionProps) {
  const headingId = `${id}-heading`;

  return (
    <Section
      id={id}
      className="bg-slate-50 py-14 sm:py-18"
      ariaLabelledBy={headingId}
      dataAttributes={{ "data-cs-section": "goals" }}
    >
      <Container>
        <div data-cs-el="goals-heading">
          <SectionHeader title={title} id={headingId} />
        </div>

        <div className="mt-10 grid gap-8 lg:grid-cols-2">
          {businessGoals && businessGoals.length > 0 && (
            <div className="space-y-4" data-cs-el="goals-business">
              <h3 className="text-sm font-semibold text-slate-900">{businessGoalsTitle}</h3>
              <ul className="space-y-2 text-sm text-slate-600">
                {businessGoals.map((item) => (
                  <li key={item} className="flex gap-2" data-cs-el="business-goal">
                    <span className="text-primary">✓</span>
                    <span>{item}</span>
                  </li>
                ))}
              </ul>
            </div>
          )}

          {productGoals && productGoals.length > 0 && (
            <div className="space-y-4" data-cs-el="goals-product">
              <h3 className="text-sm font-semibold text-slate-900">{productGoalsTitle}</h3>
              <ul className="space-y-2 text-sm text-slate-600">
                {productGoals.map((item) => (
                  <li key={item} className="flex gap-2" data-cs-el="product-goal">
                    <span className="text-primary">✓</span>
                    <span>{item}</span>
                  </li>
                ))}
              </ul>
            </div>
          )}
        </div>

        {note && (
          <p className="mt-8 text-sm italic text-slate-600" data-cs-el="goals-note">{note}</p>
        )}
      </Container>
    </Section>
  );
}
