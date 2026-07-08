import type { FitSectionProps } from "@/lib/blocks/types";

export function FitSection({
  id = "mvp-fit",
  title = "Built for founders and product teams who need to move fast",
  intro,
  personas,
  problemsTitle = "Common problems we solve for startup MVPs",
  problems,
}: FitSectionProps) {
  const mid = problems ? Math.ceil(problems.length / 2) : 0;
  const problemsLeft = problems?.slice(0, mid) ?? [];
  const problemsRight = problems?.slice(mid) ?? [];

  return (
    <section id={id} data-mvp-section="s2" className="bg-white">
      <div className="mx-auto max-w-6xl px-4 py-16 sm:px-6 lg:px-8 lg:py-20">
        <header className="max-w-3xl space-y-3">
          <h2 className="text-display-md font-bold text-slate-900 sm:text-display-lg md:text-display-xl">
            {title}
          </h2>
          {intro && <p className="text-sm text-slate-600 sm:text-base">{intro}</p>}
        </header>

        {personas.length > 0 && (
          <div className="mt-10 grid gap-6 md:grid-cols-2">
            {personas.map((persona) => (
              <article
                key={persona.key ?? persona.label}
                className="flex h-full flex-col rounded-2xl bg-slate-50 p-5 shadow-sm ring-1 ring-slate-100"
              >
                <h3 className="text-sm font-semibold uppercase tracking-wide text-primary">
                  {persona.label}
                </h3>
                {persona.situation && (
                  <p className="mt-2 text-sm text-slate-600">{persona.situation}</p>
                )}
                {persona.help && (
                  <>
                    <p className="mt-3 text-xs font-medium uppercase text-slate-900">How we help</p>
                    <p className="mt-1 text-xs text-slate-600">{persona.help}</p>
                  </>
                )}
              </article>
            ))}
          </div>
        )}

        {problems && problems.length > 0 && (
          <div className="mt-10 max-w-4xl rounded-2xl bg-slate-900 px-6 py-6 text-sm text-slate-100 sm:px-8">
            <h3 className="text-base font-semibold text-white">{problemsTitle}</h3>
            <div className="mt-3 grid gap-3 md:grid-cols-2">
              <ul className="space-y-2">
                {problemsLeft.map((item) => (
                  <li key={item} className="flex gap-2">
                    <span className="mt-1.5 inline-flex h-1.5 w-1.5 flex-none rounded-full bg-emerald-400" />
                    <span>{item}</span>
                  </li>
                ))}
              </ul>
              <ul className="space-y-2">
                {problemsRight.map((item) => (
                  <li key={item} className="flex gap-2">
                    <span className="mt-1.5 inline-flex h-1.5 w-1.5 flex-none rounded-full bg-emerald-400" />
                    <span>{item}</span>
                  </li>
                ))}
              </ul>
            </div>
          </div>
        )}
      </div>
    </section>
  );
}
