import type { CockpitSaasHeroProps } from "@/lib/blocks/cockpit-mappers";
import { ButtonLink, Container, Section } from "@/components/ui";

export function CockpitSaasHero({
  eyebrow,
  title,
  subtitle,
  primaryCta,
  secondaryCta,
}: CockpitSaasHeroProps) {
  return (
    <Section className="relative overflow-hidden bg-slate-950 py-20 text-white">
      <Container>
        <div className="mx-auto max-w-3xl text-center">
          <p className="mb-4 text-xs font-semibold uppercase tracking-[0.2em] text-sky-400">{eyebrow}</p>
          <h1 className="text-display-md font-bold tracking-tight sm:text-display-lg">{title}</h1>
          <p className="mt-5 text-base text-slate-300 sm:text-lg">{subtitle}</p>
          <div className="mt-8 flex flex-wrap items-center justify-center gap-3">
            <ButtonLink href={primaryCta.href} variant="primary" external={primaryCta.href.startsWith("http")}>
              {primaryCta.label}
            </ButtonLink>
            <ButtonLink href={secondaryCta.href} variant="secondary">
              {secondaryCta.label}
            </ButtonLink>
          </div>
        </div>
      </Container>
    </Section>
  );
}
