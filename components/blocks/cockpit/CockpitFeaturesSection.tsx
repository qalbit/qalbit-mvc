import type { CockpitFeatureItem } from "@/lib/blocks/cockpit-mappers";
import { Card, Container, Section, SectionHeader } from "@/components/ui";

export function CockpitFeaturesSection({ items }: { items: CockpitFeatureItem[] }) {
  return (
    <Section className="py-16">
      <Container>
        <SectionHeader
          eyebrow="Platform"
          title="Everything ops teams need"
          subtitle="Built for agencies and product studios running multiple client sites."
          align="center"
          className="mb-10"
        />
        <div className="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
          {items.map((item) => (
            <Card key={item.title} className="p-6">
              <h3 className="text-lg font-semibold text-slate-900">{item.title}</h3>
              <p className="mt-2 text-sm text-muted-foreground">{item.description}</p>
            </Card>
          ))}
        </div>
      </Container>
    </Section>
  );
}
