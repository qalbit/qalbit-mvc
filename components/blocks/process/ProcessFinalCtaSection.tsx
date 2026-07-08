import type { ProcessFinalCtaProps } from "@/lib/blocks/process-mappers";

export function ProcessFinalCtaSection({
  id = "mvp-final-cta",
  eyebrow,
  title,
  body,
  primary,
  secondary,
  meta,
}: ProcessFinalCtaProps) {
  return (
    <section id={id} data-mvp-section="s10" className="bg-slate-950">
      <div className="mx-auto max-w-6xl px-4 py-12 sm:px-6 lg:px-8">
        <div className="relative overflow-hidden rounded-3xl bg-gradient-to-r from-primary via-primary/90 to-sky-600 px-6 py-10 shadow-lg sm:px-10">
          <div
            className="absolute -right-24 -top-24 h-56 w-56 rounded-full bg-white/10 blur-3xl"
            aria-hidden="true"
          />

          <div className="relative flex flex-col items-start justify-between gap-6 md:flex-row md:items-center">
            <div className="max-w-2xl space-y-2 text-white">
              {eyebrow && (
                <p className="text-xs font-medium uppercase tracking-wide text-white/70">{eyebrow}</p>
              )}
              <h2 className="text-2xl font-semibold tracking-tight sm:text-3xl">{title}</h2>
              {body && <p className="text-sm leading-relaxed text-white/90 sm:text-base">{body}</p>}
              {meta && <p className="pt-1 text-xs text-white/70 sm:text-sm">{meta}</p>}
            </div>

            <div className="flex flex-col items-start gap-2 text-sm text-white md:items-end">
              <a
                href={primary.href}
                aria-label={primary.ariaLabel}
                className="inline-flex items-center justify-center rounded-full bg-white px-6 py-3 text-sm font-semibold text-primary shadow-md transition hover:bg-slate-50 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-2 focus-visible:ring-offset-primary"
                data-mvp-final-cta="primary"
                {...(primary.external ? { target: "_blank", rel: "noopener noreferrer" } : {})}
              >
                {primary.label}
              </a>
              {secondary && (
                <a
                  href={secondary.href}
                  aria-label={secondary.ariaLabel}
                  className="inline-flex items-center justify-center text-xs font-medium text-white/90 underline-offset-2 hover:underline"
                  data-mvp-final-cta="secondary"
                  {...(secondary.external ? { target: "_blank", rel: "noopener noreferrer" } : {})}
                >
                  {secondary.label}
                </a>
              )}
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
