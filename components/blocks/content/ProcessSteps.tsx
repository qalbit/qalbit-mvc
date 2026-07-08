import type { ProcessBlockProps } from "@/lib/blocks/types";
import { asset } from "@/lib/site";
import { ButtonLink, Container, Section, SectionHeader } from "@/components/ui";

export function ProcessSteps({
  id = "process",
  eyebrow,
  title,
  intro,
  steps,
  note,
  cta,
  dataSection,
  dataAttributes,
  hookPrefix,
  mvpStepAttr,
  csSection,
}: ProcessBlockProps) {
  const headingId = `${id}-heading`;

  return (
    <Section
      id={id}
      className="py-14 sm:py-18 lg:py-20"
      ariaLabelledBy={headingId}
      dataSection={dataSection}
      dataAttributes={{
        ...dataAttributes,
        ...(csSection ? { "data-cs-section": csSection } : {}),
      }}
    >
      <Container>
        <div {...(csSection ? { "data-cs-el": "process-heading" } : {})}>
          <SectionHeader eyebrow={eyebrow} title={title} subtitle={intro} id={headingId} />
        </div>

        <ol className="mt-10 space-y-8" {...(csSection ? { "data-cs-el": "process-steps" } : {})}>
          {steps.map((step, index) => {
            const stepNum = step.step ?? index + 1;
            const stepTitle = step.title ?? step.name ?? `Step ${stepNum}`;
            return (
              <li
                key={`${stepTitle}-${index}`}
                className="flex gap-4 sm:gap-6"
                data-process-step={String(stepNum)}
                {...(hookPrefix ? { [`data-${hookPrefix}-process-step`]: "" } : {})}
                {...(mvpStepAttr ? { "data-mvp-step": "" } : {})}
                {...(csSection ? { "data-cs-el": "process-step" } : {})}
              >
                <div className="flex flex-col items-center">
                  <span
                    className="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-primary text-sm font-bold text-white"
                  >
                    {stepNum}
                  </span>
                </div>
                <div className="flex-1 pb-2">
                  {step.kicker && (
                    <p className="text-[11px] font-semibold uppercase tracking-wide text-primary-700">
                      {step.kicker}
                    </p>
                  )}
                  <h3 className="text-base font-semibold text-slate-900">{stepTitle}</h3>
                  {step.description && (
                    <p className="mt-2 text-sm text-muted-foreground">{step.description}</p>
                  )}
                  {step.outputs && (
                    <p className="mt-3 text-xs text-muted-foreground">
                      <span className="font-medium text-slate-700">Outputs: </span>
                      {step.outputs}
                    </p>
                  )}
                  {(step.duration || step.outcome) && (
                    <div className="mt-3 flex flex-wrap gap-4 text-xs text-muted-foreground">
                      {step.duration && <span>Duration: {step.duration}</span>}
                      {step.outcome && <span>Outcome: {step.outcome}</span>}
                    </div>
                  )}
                  {step.icon && (
                    <img
                      src={asset(step.icon.replace(/^\//, ""))}
                      alt=""
                      className="mt-3 h-6 w-6 opacity-60"
                      aria-hidden="true"
                    />
                  )}
                </div>
              </li>
            );
          })}
        </ol>

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
