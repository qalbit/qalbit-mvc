import type { DetailHeroProps } from "@/lib/blocks/types";
import { Breadcrumbs, ButtonLink, Container, HtmlText, Section } from "@/components/ui";

export function DetailHero({
  breadcrumbs,
  kickerPrefix,
  kickerLabel,
  kickerDetail,
  title,
  intro,
  bullets,
  primaryCta,
  secondaryCta,
  snapshotTitle,
  snapshot,
  imageSrc,
  imageAlt,
  dataSection,
  dataAttributes,
  heroElAttr = "data-hero-el",
}: DetailHeroProps) {
  const headingId = "detail-hero-heading";

  return (
    <Section
      className="bg-slate-50 py-16 sm:py-20"
      ariaLabelledBy={headingId}
      dataSection={dataSection}
      dataAttributes={{ ...dataAttributes, [heroElAttr]: "root" }}
    >
      <Container>
        <Breadcrumbs items={breadcrumbs} />

        <div className="grid gap-10 lg:grid-cols-[minmax(0,1.1fr)_minmax(0,0.9fr)] lg:items-center">
          <div className="space-y-6" {...{ [heroElAttr]: "content" }}>
            {(kickerPrefix || kickerLabel) && (
              <div className="flex flex-wrap items-center gap-2 text-label-sm font-semibold uppercase tracking-widest text-primary-700">
                {kickerPrefix && <span>{kickerPrefix}</span>}
                {kickerLabel && (
                  <span className="rounded-full border border-slate-200 bg-white px-3 py-1 text-[11px] text-slate-700">
                    {kickerLabel}
                  </span>
                )}
                {kickerDetail && (
                  <span className="text-muted-foreground normal-case tracking-normal">{kickerDetail}</span>
                )}
              </div>
            )}

            <h1 id={headingId} className="text-display-md font-bold tracking-tight sm:text-display-lg md:text-display-xl">
              <HtmlText html={title} />
            </h1>

            {intro && <p className="max-w-2xl text-base text-muted-foreground">{intro}</p>}

            {bullets && bullets.length > 0 && (
              <ul className="space-y-2 text-sm text-muted-foreground">
                {bullets.map((item) => (
                  <li key={item} className="flex gap-2">
                    <span className="text-primary-700">•</span>
                    <span>{item}</span>
                  </li>
                ))}
              </ul>
            )}

            <div className="flex flex-wrap gap-3">
              {primaryCta && (
                <ButtonLink href={primaryCta.href} ariaLabel={primaryCta.ariaLabel}>
                  {primaryCta.label}
                </ButtonLink>
              )}
              {secondaryCta && (
                <ButtonLink
                  href={secondaryCta.href}
                  variant="primary-outline"
                  external={secondaryCta.external}
                  ariaLabel={secondaryCta.ariaLabel}
                >
                  {secondaryCta.label}
                </ButtonLink>
              )}
            </div>
          </div>

          <div className="space-y-6">
            {imageSrc && (
              <div className="flex justify-center lg:justify-end" {...{ [heroElAttr]: "visual" }}>
                <img src={imageSrc} alt={imageAlt ?? ""} className="max-h-72 w-auto" />
              </div>
            )}

            {snapshot && snapshot.length > 0 && (
              <div
                className="rounded-2xl border border-slate-200 bg-white p-5 shadow-soft"
                {...{ [heroElAttr]: "snapshot" }}
              >
                {snapshotTitle && (
                  <p className="mb-4 text-xs font-semibold uppercase tracking-wide text-slate-500">
                    {snapshotTitle}
                  </p>
                )}
                <dl className="space-y-3">
                  {snapshot.map((row) => (
                    <div key={row.label} className="flex flex-col gap-0.5 sm:flex-row sm:justify-between sm:gap-4">
                      <dt className="text-xs text-muted-foreground">{row.label}</dt>
                      <dd className="text-sm font-medium text-slate-900">
                        {row.value}
                        {row.note && (
                          <span className="mt-0.5 block text-xs font-normal text-muted-foreground">{row.note}</span>
                        )}
                      </dd>
                    </div>
                  ))}
                </dl>
              </div>
            )}
          </div>
        </div>
      </Container>
    </Section>
  );
}
