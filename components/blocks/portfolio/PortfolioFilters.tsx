import type { PortfolioFiltersProps } from "@/lib/blocks/types";

export function PortfolioFilters({
  id = "portfolio-filters",
  label = "Filter by",
  industryLabel = "Industry",
  techLabel = "Tech stack",
  industryAllLabel = "All",
  techAllLabel = "All",
  submitLabel = "Apply",
  resetLabel = "Clear filters",
  hint = "Combine industry and tech stack, or use either one on its own.",
  industries,
  technologies,
  activeIndustry,
  activeTechnology,
  basePath = "/portfolio/",
}: PortfolioFiltersProps) {
  const hasActiveFilters = Boolean(activeIndustry || activeTechnology);

  return (
    <section
      id={id}
      className="bg-slate-100 py-3 text-slate-900 sm:py-3.5"
      data-portfolio-section="filters"
    >
      <div className="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <form
          method="get"
          action={basePath}
          className="flex flex-col gap-2.5 text-[11px] sm:flex-row sm:items-center sm:justify-between sm:text-xs"
          data-portfolio-el="filters-form"
        >
          <div className="max-w-xl space-y-0.5">
            <div className="flex items-center gap-2">
              <span className="font-semibold text-slate-800">{label}</span>
              {hasActiveFilters && (
                <span className="inline-flex items-center rounded-full bg-slate-100 px-2 py-0.5 text-[10px] text-slate-600">
                  Active
                  {activeIndustry && " · Industry"}
                  {activeTechnology && " · Tech"}
                </span>
              )}
            </div>
            {hint && (
              <p className="hidden text-[10px] text-slate-500 sm:block">{hint}</p>
            )}
          </div>

          <div className="flex flex-wrap items-center gap-2.5 sm:justify-end">
            <label className="inline-flex items-center gap-1 text-[10px] text-slate-600">
              <span>{industryLabel}</span>
              <select
                name="industry"
                className="min-w-[140px] cursor-pointer appearance-none rounded-full border border-slate-200 bg-white px-2.5 py-1 text-[11px] text-slate-800 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"
                defaultValue={activeIndustry ?? ""}
              >
                <option value="">{industryAllLabel}</option>
                {industries.map((opt) => (
                  <option key={opt.value} value={opt.value}>{opt.label}</option>
                ))}
              </select>
            </label>

            <label className="inline-flex items-center gap-1 text-[10px] text-slate-600">
              <span>{techLabel}</span>
              <select
                name="tech"
                className="min-w-[140px] cursor-pointer appearance-none rounded-full border border-slate-200 bg-white px-2.5 py-1 text-[11px] text-slate-800 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"
                defaultValue={activeTechnology ?? ""}
              >
                <option value="">{techAllLabel}</option>
                {technologies.map((opt) => (
                  <option key={opt.value} value={opt.value}>{opt.label}</option>
                ))}
              </select>
            </label>

            <div className="flex items-center gap-1.5">
              <button
                type="submit"
                className="inline-flex items-center rounded-full border-0 bg-slate-900 px-3 py-1.5 text-[11px] font-medium text-slate-50 hover:bg-slate-800 focus:outline-none focus:ring-1 focus:ring-slate-900"
              >
                {submitLabel}
              </button>

              {hasActiveFilters && (
                <a
                  href={basePath}
                  className="inline-flex items-center rounded-full border border-slate-300 bg-white px-2.5 py-1.5 text-[11px] font-medium text-slate-600 no-underline hover:bg-slate-100"
                >
                  {resetLabel}
                </a>
              )}
            </div>
          </div>
        </form>
      </div>
    </section>
  );
}
