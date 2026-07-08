import type { AboutTechStackSectionProps } from "@/lib/blocks/types";

export function AboutTechStackSection({
  id = "about-tech-stack",
  headingId = "about-tech-stack-heading",
  eyebrow,
  title,
  intro,
  stack,
  practices,
}: AboutTechStackSectionProps) {
  return (
    <section
      id={id}
      aria-labelledby={headingId}
      className="bg-slate-950 text-slate-50"
      data-about-section="a10"
    >
      <div className="mx-auto max-w-6xl px-4 py-12 sm:px-6 sm:py-16 lg:px-8 lg:py-20">
        <header className="max-w-3xl space-y-3">
          <p className="inline-flex items-center gap-2 rounded-full border border-accent-500/60 bg-accent-500/10 px-3 py-1 text-xs font-medium text-accent-200">
            <span className="h-1.5 w-1.5 rounded-full bg-accent-400" />
            <span>{eyebrow}</span>
          </p>
          <h2 id={headingId} className="text-display-md font-bold sm:text-display-lg md:text-display-xl">
            {title}
          </h2>
          {intro && <p className="text-sm leading-relaxed text-slate-300 sm:text-base">{intro}</p>}
        </header>

        <div className="mt-8 grid gap-8 lg:grid-cols-[minmax(0,1.1fr)_minmax(0,1fr)] lg:items-start">
          <div className="space-y-4">
            <p className="text-xs font-medium uppercase tracking-wide text-slate-400">{stack.label}</p>
            <div className="flex flex-wrap gap-2 text-xs" data-tech-tags>
              {stack.tags.map((tag) => (
                <span
                  key={tag}
                  className="inline-flex items-center rounded-full border border-slate-700 bg-slate-900 px-3 py-1 font-medium text-slate-50"
                >
                  {tag}
                </span>
              ))}
            </div>
          </div>

          <div className="space-y-4">
            <p className="text-xs font-medium uppercase tracking-wide text-slate-400">{practices.label}</p>
            <ul className="space-y-2 text-sm text-slate-200 sm:text-base" data-engineering-practices>
              {practices.bullets.map((bullet) => (
                <li key={bullet} className="flex gap-2">
                  <span className="mt-1 h-1.5 w-1.5 flex-shrink-0 rounded-full bg-accent-400" />
                  <span>{bullet}</span>
                </li>
              ))}
            </ul>
          </div>
        </div>
      </div>
    </section>
  );
}
