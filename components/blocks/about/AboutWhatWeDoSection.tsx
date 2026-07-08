import type { AboutWhatWeDoSectionProps } from "@/lib/blocks/types";

export function AboutWhatWeDoSection({
  id = "about-what-we-do",
  headingId = "about-what-we-do-heading",
  eyebrow,
  title,
  intro,
  items,
}: AboutWhatWeDoSectionProps) {
  return (
    <section
      id={id}
      aria-labelledby={headingId}
      className="bg-slate-50 text-slate-900"
      data-about-section="a3"
    >
      <div className="mx-auto max-w-6xl px-4 py-12 sm:px-6 sm:py-16 lg:px-8 lg:py-20">
        <header className="max-w-3xl space-y-3">
          {eyebrow && (
            <span
              className="items-center rounded-pill border border-slate-200 bg-white/90 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-muted-foreground shadow-soft md:inline-flex"
            >
              <span>{eyebrow}</span>
            </span>
          )}
          <h2 id={headingId} className="text-display-md font-bold sm:text-display-lg md:text-display-xl">
            {title}
          </h2>
          {intro && <p className="text-sm leading-relaxed text-slate-600 sm:text-base">{intro}</p>}
        </header>

        <div className="mt-8 grid gap-4 sm:mt-10 sm:grid-cols-2 lg:grid-cols-3">
          {items.map((item) => (
            <article
              key={item.key ?? item.label}
              className="flex flex-col rounded-2xl border border-slate-200 bg-white p-4 shadow-sm sm:p-5"
              data-capability={item.key}
            >
              <h3 className="mb-1.5 text-sm font-semibold text-slate-900">{item.label}</h3>
              {item.description && (
                <p className="text-xs leading-relaxed text-slate-600 sm:text-sm">{item.description}</p>
              )}
              {item.bullets && item.bullets.length > 0 && (
                <ul className="mt-3 space-y-1.5 text-xs text-slate-600">
                  {item.bullets.map((bullet) => (
                    <li key={bullet} className="flex gap-2">
                      <span className="mt-1 h-1 w-1 flex-shrink-0 rounded-full bg-accent-500" />
                      <span>{bullet}</span>
                    </li>
                  ))}
                </ul>
              )}
            </article>
          ))}
        </div>
      </div>
    </section>
  );
}
