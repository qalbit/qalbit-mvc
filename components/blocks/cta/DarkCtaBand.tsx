import type { DarkCtaBlockProps } from "@/lib/blocks/types";
import { ButtonLink, Container, Section } from "@/components/ui";

export function DarkCtaBand({
  eyebrow,
  title,
  body,
  primary,
  secondary,
  meta,
  dataSection,
  dataAttributes,
  csSection,
}: DarkCtaBlockProps) {
  return (
    <Section
      className="relative overflow-hidden bg-slate-950 py-16 sm:py-20 lg:py-24"
      dataSection={dataSection}
      dataAttributes={{
        ...dataAttributes,
        ...(csSection ? { "data-cs-section": csSection } : {}),
      }}
    >
      <div
        className="pointer-events-none absolute inset-x-0 -top-32 h-64 bg-gradient-to-b from-sky-500/10 via-sky-500/0 to-transparent"
        aria-hidden="true"
      />

      <Container size="narrow" className="relative text-center">
        {eyebrow && (
          <p className="mb-3 inline-flex items-center rounded-full border border-sky-500/30 bg-sky-500/5 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.18em] text-sky-300">
            <span className="mr-2 h-1.5 w-1.5 rounded-full bg-sky-400" />
            {eyebrow}
          </p>
        )}

        <h2 className="text-display-sm font-bold tracking-tight text-white sm:text-display-md">{title}</h2>

        {body && <p className="mx-auto mt-4 max-w-2xl text-sm text-slate-300 sm:text-base">{body}</p>}

        <div className="mt-8 flex flex-col items-center justify-center gap-3 sm:flex-row">
          <ButtonLink href={primary.href} variant="dark" ariaLabel={primary.ariaLabel}>
            {primary.label}
          </ButtonLink>
          {secondary && (
            <ButtonLink
              href={secondary.href}
              variant="secondary"
              ariaLabel={secondary.ariaLabel}
              external={secondary.external}
            >
              {secondary.label}
            </ButtonLink>
          )}
        </div>

        {meta && <p className="mt-6 text-xs text-slate-400">{meta}</p>}
      </Container>
    </Section>
  );
}
