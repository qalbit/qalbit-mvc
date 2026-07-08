import type { ProcessTimelineProps } from "@/lib/blocks/process-mappers";

export function ProcessTimelineSection({
  id = "mvp-process",
  eyebrow,
  title,
  intro,
  timelineNote,
  steps,
}: ProcessTimelineProps) {
  return (
    <section id={id} data-mvp-section="s4" className="bg-white">
      <div className="mx-auto max-w-6xl px-4 py-16 sm:px-6 lg:px-8 lg:py-20">
        <div className="grid gap-10 lg:grid-cols-[minmax(0,1.1fr)_minmax(0,1.4fr)] lg:items-start">
          <header className="max-w-xl space-y-4">
            {eyebrow && (
              <p className="text-xs font-medium uppercase tracking-wide text-primary">{eyebrow}</p>
            )}
            <h2 className="text-display-md font-bold text-slate-900 sm:text-display-lg md:text-display-xl">
              {title}
            </h2>
            {intro && <p className="text-sm text-slate-600 sm:text-base">{intro}</p>}
            {timelineNote && (
              <div className="mt-4 rounded-xl bg-slate-50 px-4 py-4 text-xs text-slate-600 ring-1 ring-slate-200">
                <p>{timelineNote}</p>
              </div>
            )}
          </header>

          <ol className="space-y-4" aria-label="Process steps">
            {steps.map((step, index) => {
              const number = step.step ?? index + 1;
              return (
                <li
                  key={`${step.title}-${number}`}
                  className="relative flex gap-4 rounded-2xl bg-slate-50 p-5 text-sm text-slate-600 shadow-sm ring-1 ring-slate-100"
                  data-mvp-step
                >
                  <div
                    className="absolute inset-y-0 left-9 hidden w-px bg-slate-200 lg:block"
                    aria-hidden="true"
                  />
                  <div className="relative z-10 mt-0.5 flex flex-none items-center justify-center">
                    <div className="inline-flex h-8 w-8 items-center justify-center rounded-full bg-slate-900 text-xs font-semibold text-slate-50 shadow-sm">
                      {number}
                    </div>
                  </div>
                  <div className="space-y-2">
                    {step.kicker && (
                      <p className="text-[11px] font-semibold uppercase tracking-wide text-primary">
                        {step.kicker}
                      </p>
                    )}
                    <h3 className="text-base font-semibold text-slate-900">{step.title}</h3>
                    {step.description && <p className="text-sm text-slate-600">{step.description}</p>}
                    {step.outputs && (
                      <p className="text-xs font-medium text-slate-600">
                        <span className="uppercase tracking-wide text-slate-400">Key outputs:&nbsp;</span>
                        <span>{step.outputs}</span>
                      </p>
                    )}
                  </div>
                </li>
              );
            })}
          </ol>
        </div>
      </div>
    </section>
  );
}
