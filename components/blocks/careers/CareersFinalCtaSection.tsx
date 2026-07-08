import type { CareersFinalCtaProps } from "@/lib/blocks/careers-mappers";

export function CareersFinalCtaSection({
  id = "careers-final-cta",
  eyebrow,
  title,
  body,
  secondary,
  meta,
}: CareersFinalCtaProps) {
  return (
    <section
      id={id}
      className="relative overflow-hidden bg-slate-950 py-12 sm:py-14 lg:py-16"
      data-careers-section="final-cta"
    >
      <div className="pointer-events-none absolute inset-x-0 -top-32 h-40 bg-gradient-to-b from-sky-500/20 via-sky-500/0 to-transparent" />

      <div className="relative mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
        <div
          className="relative overflow-hidden rounded-3xl border border-sky-500/30 bg-gradient-to-br from-slate-950 via-slate-950 to-slate-900 px-5 py-7 shadow-[0_18px_50px_rgba(15,23,42,0.75)] sm:px-7 sm:py-8 lg:px-10 lg:py-9"
          data-careers-el="final-cta-card"
        >
          <div className="pointer-events-none absolute -right-10 -top-10 h-40 w-40 rounded-full bg-sky-500/10 blur-3xl" />

          <div className="relative flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
            <div className="max-w-xl space-y-3">
              {eyebrow && (
                <p className="inline-flex items-center rounded-full border border-sky-500/40 bg-sky-500/10 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.18em] text-sky-200">
                  <span className="mr-2 h-1.5 w-1.5 rounded-full bg-sky-400" />
                  {eyebrow}
                </p>
              )}

              <h2 className="text-[18px] font-semibold tracking-tight text-slate-50 sm:text-[20px] md:text-[22px]">
                {title}
              </h2>

              {body && (
                <p className="text-[13px] text-slate-300 sm:text-[14px]">{body}</p>
              )}

              {meta && <p className="text-[11px] text-slate-400">{meta}</p>}
            </div>

            {secondary && (
              <div className="flex flex-col items-stretch justify-center gap-3 sm:flex-row sm:items-center lg:flex-col lg:items-end">
                <a
                  href={secondary.href}
                  className="inline-flex items-center justify-center rounded-full border border-slate-600 bg-slate-900/60 px-4 py-2 text-[12px] font-medium text-slate-100 transition hover:border-sky-400 hover:bg-slate-900 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-sky-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-950"
                  aria-label={secondary.ariaLabel}
                  data-careers-el="final-cta-secondary"
                >
                  {secondary.label}
                </a>
              </div>
            )}
          </div>
        </div>
      </div>
    </section>
  );
}
