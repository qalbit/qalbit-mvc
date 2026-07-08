import type { HomeHeroProps } from "@/lib/blocks/types";
import { Badge, ButtonLink, Container, HtmlText, Section } from "@/components/ui";

export function HomeHero({
  pill,
  title,
  description,
  imageSrc,
  imageAlt = "Custom software and mobile app development banner by QalbIT",
  primaryCta = { label: "Get Your Free Estimate Now", href: "/contact-us/" },
  secondaryCta = {
    label: "Schedule a Quick Call",
    href: "https://calendly.com/abidhusain-qalbit/discuss-project",
    external: true,
  },
}: HomeHeroProps) {
  const headingId = "hero-heading";

  return (
    <Section
      className="cursor-hero-brand bg-slate-50 py-10 md:py-24"
      ariaLabelledBy={headingId}
      dataAttributes={{ "data-hero-el": "home" }}
    >
      <Container>
        <div className="grid grid-cols-1 items-center gap-4 md:grid-cols-2 md:gap-8 lg:grid-cols-3">
          {imageSrc && (
            <div className="order-1 flex items-center justify-center md:order-2 md:col-span-1 lg:col-span-1">
              <img
                className="hero-image-float w-80 max-w-md md:w-full lg:max-w-none"
                src={imageSrc}
                alt={imageAlt}
                width={500}
                height={500}
                loading="eager"
                decoding="async"
                fetchPriority="high"
              />
            </div>
          )}

          <div className="order-2 flex flex-col items-center justify-center gap-4 md:order-1 md:col-span-1 lg:col-span-2 md:items-start">
            {pill && <Badge>{pill}</Badge>}

            <h1
              id={headingId}
              className="text-center text-display-md font-bold md:text-left sm:text-display-lg md:text-display-2xl"
            >
              <HtmlText html={title} />
            </h1>

            {description && (
              <p className="text-md px-0 text-center font-medium text-slate-600 md:px-4 md:text-left lg:px-2">
                {description}
              </p>
            )}

            <div className="flex w-full flex-col items-stretch justify-center gap-4 md:w-auto md:flex-row md:items-center md:justify-start">
              <ButtonLink href={primaryCta.href} className="w-full md:w-auto text-center" ariaLabel={primaryCta.ariaLabel}>
                {primaryCta.label}
              </ButtonLink>
              {secondaryCta && (
                <ButtonLink
                  href={secondaryCta.href}
                  variant="primary-outline"
                  external={secondaryCta.external}
                  className="w-full md:w-auto text-center"
                  ariaLabel={secondaryCta.ariaLabel}
                >
                  {secondaryCta.label}
                </ButtonLink>
              )}
            </div>
          </div>
        </div>
      </Container>
    </Section>
  );
}
