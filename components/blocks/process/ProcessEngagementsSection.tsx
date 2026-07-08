import type { ProcessEngagementsProps } from "@/lib/blocks/process-mappers";

export function ProcessEngagementsSection({
  id = "mvp-engagements",
  title = "Engagement models and budget guidance",
  intro,
  models,
  note,
}: ProcessEngagementsProps) {
  return (
    <section id={id} data-mvp-section="s5" className="bg-white">
      <div className="mx-auto max-w-6xl px-4 py-16 sm:px-6 lg:px-8 lg:py-20">
        <header className="max-w-3xl space-y-3">
          <h2 className="text-display-md font-bold text-slate-900 sm:text-display-lg md:text-display-xl">
            {title}
          </h2>
          {intro && <p className="text-sm text-slate-600 sm:text-base">{intro}</p>}
        </header>

        <div className="mt-10 grid gap-6 md:grid-cols-2">
          {models.map((model) => (
            <article
              key={model.key ?? model.label}
              className="flex h-full flex-col rounded-2xl bg-slate-50 p-5 text-sm shadow-sm ring-1 ring-slate-100"
              data-mvp-engagement-card
            >
              <div className="flex items-center justify-between gap-3">
                <h3 className="text-base font-semibold text-slate-900">{model.label}</h3>
                {model.badge && (
                  <span className="inline-flex items-center rounded-full bg-accent-600/20 px-3 py-1 text-[11px] font-bold text-accent-600">
                    {model.badge}
                  </span>
                )}
              </div>

              {model.description && <p className="mt-2 text-slate-600">{model.description}</p>}

              <dl className="mt-4 space-y-1 text-xs text-slate-500">
                {model.bestFor && (
                  <div className="flex justify-between gap-4">
                    <dt className="flex-shrink-0 font-medium text-slate-600">Best for</dt>
                    <dd className="text-right">{model.bestFor}</dd>
                  </div>
                )}
                {model.budgetRange && (
                  <div className="flex justify-between gap-4">
                    <dt className="flex-shrink-0 font-medium text-slate-600">Typical budget</dt>
                    <dd className="text-right">{model.budgetRange}</dd>
                  </div>
                )}
              </dl>

              {model.deliverables && (
                <p className="mt-4 text-xs text-slate-500">Deliverables: {model.deliverables}</p>
              )}
            </article>
          ))}
        </div>

        {note && <p className="mt-8 max-w-3xl text-sm text-slate-500">{note}</p>}
      </div>
    </section>
  );
}
