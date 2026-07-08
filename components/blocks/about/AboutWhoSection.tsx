import type { AboutWhoSectionProps } from "@/lib/blocks/types";

export function AboutWhoSection({
  id = "about-who-we-are",
  headingId = "about-who-we-are-heading",
  eyebrow,
  title,
  intro,
  cards,
  snapshot,
}: AboutWhoSectionProps) {
  return (
    <section
      id={id}
      aria-labelledby={headingId}
      className="bg-white text-slate-900"
      data-about-section="a2"
    >
      <div className="mx-auto max-w-6xl px-4 py-12 sm:px-6 sm:py-16 lg:px-8 lg:py-20">
        <header className="max-w-3xl space-y-3">
          {eyebrow && (
            <span
              className="items-center rounded-pill border border-slate-200 bg-slate-50 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-slate-700 shadow-soft md:inline-flex"
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
          {cards.map((card, index) => (
            <article
              key={card.key ?? card.label}
              className={`flex flex-col rounded-2xl border border-slate-200 bg-slate-50 p-4 shadow-sm sm:p-5 ${
                index === cards.length - 1 ? "sm:col-span-2 lg:col-span-1" : ""
              }`}
              data-about-card={card.key}
            >
              <h3 className="mb-1.5 text-sm font-semibold text-slate-900">{card.label}</h3>
              {card.description && (
                <p className="text-xs leading-relaxed text-slate-600 sm:text-sm">{card.description}</p>
              )}
            </article>
          ))}
        </div>

        <dl className="mt-8 grid gap-6 text-xs text-slate-600 sm:grid-cols-3 sm:text-sm">
          {snapshot.map((row) => (
            <div key={row.label} className="space-y-1">
              <dt className="text-slate-500">{row.label}</dt>
              <dd className="font-medium text-slate-900">{row.value}</dd>
            </div>
          ))}
        </dl>
      </div>
    </section>
  );
}
