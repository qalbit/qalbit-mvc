import type { GeoWhySectionProps } from "@/lib/blocks/types";

export function GeoWhySection({
  id = "location-why",
  stateKey,
  stateLabel,
  eyebrow,
  title,
  intro,
  items,
}: GeoWhySectionProps) {
  return (
    <section
      id={id}
      className="bg-slate-950 text-slate-50"
      data-location-section="why"
      data-location-key={stateKey ?? undefined}
    >
      <div className="relative mx-auto max-w-6xl space-y-4 px-4 py-16 sm:px-6 md:space-y-10 lg:px-8 lg:py-20">
        <div className="max-w-3xl space-y-5" data-location-el="why-header">
          {eyebrow && (
            <p className="text-xs font-semibold uppercase tracking-[0.2em] text-sky-400">{eyebrow}</p>
          )}
          {title && (
            <h2 className="text-display-md font-bold sm:text-display-lg md:text-display-xl">{title}</h2>
          )}
          {intro && <p className="text-sm sm:text-base text-slate-300">{intro}</p>}
          {stateLabel && (
            <p className="text-xs text-slate-400">
              Built around the expectations and pace of teams in {stateLabel}.
            </p>
          )}
        </div>

        {items.length > 0 && (
          <div className="mt-10 grid gap-6 md:grid-cols-2 lg:grid-cols-3" data-location-el="why-grid">
            {items.map((item) => {
              const label = item.label ?? item.title ?? "";
              if (!label && !item.description && !item.bullets?.length) return null;

              return (
                <article
                  key={label}
                  className="flex flex-col rounded-2xl border border-slate-800 bg-slate-900/60 p-5 text-sm shadow-sm"
                  data-location-el="why-card"
                >
                  {label && <h3 className="text-sm font-semibold text-slate-50">{label}</h3>}
                  {item.description && (
                    <p className="mt-2 text-xs text-slate-300">{item.description}</p>
                  )}
                  {item.bullets && item.bullets.length > 0 && (
                    <ul className="mt-3 space-y-1.5 text-xs text-slate-300">
                      {item.bullets.map((bullet) => (
                        <li key={bullet} className="flex items-start gap-2" data-location-el="why-bullet">
                          <span className="mt-1 inline-block h-1.5 w-1.5 flex-none rounded-full bg-sky-400" />
                          <span>{bullet}</span>
                        </li>
                      ))}
                    </ul>
                  )}
                </article>
              );
            })}
          </div>
        )}
      </div>
    </section>
  );
}
