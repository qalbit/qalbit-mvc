import type { ProcessProofSectionProps } from "@/lib/blocks/types";

export function ProcessProofSection({
  id = "process-proof",
  eyebrow,
  title,
  intro,
  cases,
  summaryNote,
}: ProcessProofSectionProps) {
  const headingId = `${id}-heading`;

  return (
    <section id={id} data-mvp-section="s6" className="bg-slate-50">
      <div className="mx-auto max-w-6xl px-4 py-16 sm:px-6 lg:px-8 lg:py-20">
        <header className="max-w-3xl space-y-3">
          <h2
            id={headingId}
            className="text-display-md font-bold text-slate-900 sm:text-display-lg md:text-display-xl"
          >
            {title}
          </h2>
          {intro && <p className="text-sm text-slate-600 sm:text-base">{intro}</p>}
        </header>

        <div className="mt-8 grid gap-6 md:grid-cols-2 lg:mt-10 lg:grid-cols-3" data-mvp-logo-grid>
          {cases.map((caseItem) => (
            <article
              key={caseItem.key ?? caseItem.label}
              className="flex h-full flex-col rounded-2xl bg-white p-5 text-sm text-slate-600 shadow-sm ring-1 ring-slate-100"
              data-mvp-proof-card
            >
              <div className="flex items-center justify-between gap-3">
                <h3 className="text-md font-semibold text-slate-900">{caseItem.label}</h3>
                {caseItem.badge && (
                  <span className="inline-flex shrink-0 rounded-full bg-sky-200 px-3 py-1 text-[11px] font-medium text-sky-700">
                    {caseItem.badge}
                  </span>
                )}
              </div>

              {caseItem.description && <p className="mt-2 text-sm">{caseItem.description}</p>}

              <ul className="mt-3 space-y-1 text-xs text-slate-600">
                {caseItem.stack && <li>Stack: {caseItem.stack}</li>}
                {caseItem.outcome && <li>Outcome: {caseItem.outcome}</li>}
                {caseItem.impact && <li>Impact: {caseItem.impact}</li>}
              </ul>

              {caseItem.linkLabel && caseItem.linkHref && (
                <a
                  href={caseItem.linkHref}
                  className="mt-4 inline-flex text-sm font-medium text-sky-500 hover:underline"
                >
                  {caseItem.linkLabel}
                </a>
              )}
            </article>
          ))}

          {summaryNote && (
            <article
              className="flex h-full flex-col rounded-2xl bg-white p-5 text-sm text-slate-600 shadow-sm ring-1 ring-slate-100 md:col-span-2 lg:col-span-3"
              data-mvp-proof-card="summary"
            >
              <h3 className="text-base font-semibold text-slate-900">Other projects we have partnered on</h3>
              <p className="mt-2">{summaryNote}</p>
            </article>
          )}
        </div>
      </div>
    </section>
  );
}
