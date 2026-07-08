import type { BenefitsGridProps } from "@/lib/blocks/types";

export function BenefitsGrid({
  id = "careers-benefits",
  title = "How we support your growth at QalbIT",
  subtitle,
  intro,
  groups,
  meta,
}: BenefitsGridProps) {
  return (
    <section
      id={id}
      className="relative border-t border-slate-100 bg-slate-50 py-10 text-slate-900 sm:py-12 lg:py-14"
      data-careers-section="benefits"
    >
      <div className="mx-auto max-w-6xl space-y-6 px-4 sm:space-y-8 sm:px-6 lg:px-8">
        <header className="max-w-3xl space-y-2">
          <p className="inline-flex items-center rounded-full border border-sky-100 bg-sky-50 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.18em] text-sky-700">
            <span className="mr-2 h-1.5 w-1.5 rounded-full bg-sky-500" />
            Benefits & growth
          </p>

          <h2 className="text-display-md font-bold tracking-tight sm:text-display-lg md:text-display-xl">
            {title}
          </h2>

          {subtitle && <p className="text-sm text-slate-600">{subtitle}</p>}
          {intro && <p className="text-[13px] text-slate-500">{intro}</p>}
        </header>

        <div className="grid gap-4 sm:gap-5 md:grid-cols-3" data-careers-el="benefits-grid">
          {groups.map((group) => (
            <article
              key={group.label}
              className="flex flex-col rounded-2xl border border-slate-200 bg-white/80 p-4 shadow-sm sm:p-5"
              data-careers-el="benefit-card"
            >
              {group.label && (
                <h3 className="mb-2 text-[13px] font-semibold text-slate-900 sm:text-sm">
                  {group.label}
                </h3>
              )}

              {group.items.length > 0 && (
                <ul className="space-y-1.5 text-[12px] text-slate-600 sm:text-[13px]">
                  {group.items.map((item) => (
                    <li key={item} className="flex gap-2">
                      <span className="mt-[6px] h-[3px] w-[3px] flex-none rounded-full bg-slate-400" />
                      <span>{item}</span>
                    </li>
                  ))}
                </ul>
              )}
            </article>
          ))}
        </div>

        {meta && <p className="max-w-3xl text-[11px] text-slate-500">{meta}</p>}
      </div>
    </section>
  );
}
