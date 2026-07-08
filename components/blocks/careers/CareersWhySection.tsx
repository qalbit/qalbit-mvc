import type { CareersWhyProps } from "@/lib/blocks/careers-mappers";

export function CareersWhySection({
  id = "careers-why-qalbit",
  title,
  subtitle,
  intro,
  meta,
  points,
}: CareersWhyProps) {
  return (
    <section
      id={id}
      className="relative overflow-hidden bg-slate-950 py-10 text-slate-50 sm:py-14 lg:py-16"
      data-careers-section="why"
    >
      <div className="pointer-events-none absolute inset-x-0 -top-32 h-40 bg-gradient-to-b from-sky-500/20 via-sky-500/0 to-transparent" />

      <div className="relative mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <div className="grid gap-10 lg:grid-cols-[minmax(0,2.2fr)_minmax(0,3fr)] lg:items-center">
          <div className="space-y-4" data-careers-el="why-copy">
            <p className="inline-flex items-center rounded-full border border-sky-500/30 bg-sky-500/10 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.18em] text-sky-200">
              <span className="mr-2 h-1.5 w-1.5 rounded-full bg-sky-400" />
              Life & growth at QalbIT
            </p>

            <h2 className="text-display-md font-bold tracking-tight sm:text-display-lg md:text-display-xl">
              {title}
            </h2>

            {subtitle && (
              <p className="max-w-xl text-sm leading-relaxed text-slate-200/90 sm:text-[15px]">
                {subtitle}
              </p>
            )}

            {intro && (
              <p className="max-w-xl text-[13px] leading-relaxed text-slate-400 sm:text-sm">
                {intro}
              </p>
            )}

            {meta && <p className="text-[11px] text-slate-500/90">{meta}</p>}
          </div>

          <div className="grid gap-4 sm:grid-cols-2 sm:gap-5" data-careers-el="why-grid">
            {points.map((point) => (
              <article
                key={point.label}
                className="group relative flex flex-col justify-between rounded-2xl border border-slate-800 bg-slate-900/70 p-4 shadow-[0_18px_45px_rgba(15,23,42,0.9)]/30 sm:p-5"
                data-careers-el="why-card"
              >
                <div className="absolute inset-0 rounded-2xl bg-gradient-to-br from-sky-500/0 via-sky-500/0 to-sky-500/0 opacity-0 transition-opacity duration-200 group-hover:opacity-10" />

                <div className="relative space-y-2">
                  {point.label && (
                    <h3 className="text-[13px] font-semibold text-slate-50 sm:text-sm">
                      {point.label}
                    </h3>
                  )}
                  {point.body && (
                    <p className="text-[12px] leading-relaxed text-slate-300 sm:text-[13px]">
                      {point.body}
                    </p>
                  )}
                </div>

                <div className="relative mt-3 flex items-center text-[11px] font-medium text-sky-300/80">
                  <span className="mr-2 inline-flex h-1.5 w-1.5 rounded-full bg-sky-400" />
                  Growth-focused, not just output-focused.
                </div>
              </article>
            ))}
          </div>
        </div>
      </div>
    </section>
  );
}
