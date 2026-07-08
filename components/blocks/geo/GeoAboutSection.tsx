import type { GeoAboutBlockProps } from "@/lib/blocks/geo-mappers";

export function GeoAboutSection({
  id = "location-about",
  stateKey,
  eyebrow,
  title,
  intro,
  stateLabel,
  highlights,
}: GeoAboutBlockProps) {
  return (
    <section
      id={id}
      className="bg-slate-950 text-slate-50"
      data-location-section-about
      data-location-key={stateKey ?? undefined}
    >
      <div className="relative mx-auto max-w-6xl space-y-4 px-4 py-16 sm:px-6 md:space-y-10 lg:px-8 lg:py-20">
        <div className="grid gap-12 lg:grid-cols-[minmax(0,1.1fr)_minmax(0,1fr)] lg:items-start">
          <div className="space-y-6" data-location-el>
            {eyebrow && (
              <p className="text-xs font-semibold uppercase tracking-[0.2em] text-sky-400">{eyebrow}</p>
            )}
            {title && (
              <h2 className="text-display-md font-bold sm:text-display-lg md:text-display-xl">{title}</h2>
            )}
            {intro && <p className="max-w-2xl text-sm sm:text-base text-slate-300">{intro}</p>}
            {stateLabel && (
              <p className="text-xs font-medium uppercase tracking-[0.18em] text-slate-400">
                Serving teams across {stateLabel} and the wider US.
              </p>
            )}
          </div>

          {highlights && highlights.length > 0 && (
            <div className="lg:justify-self-end" data-location-el-header>
              <div className="grid gap-4 sm:grid-cols-2" data-location-el>
                {highlights.map((highlight) => (
                  <div
                    key={highlight.label}
                    className="rounded-2xl border border-slate-800 bg-slate-900/60 p-4 shadow-sm"
                  >
                    <p className="text-sm font-semibold text-slate-50">{highlight.label}</p>
                    {highlight.description && (
                      <p className="mt-2 text-xs text-slate-300">{highlight.description}</p>
                    )}
                  </div>
                ))}
              </div>
            </div>
          )}
        </div>
      </div>
    </section>
  );
}
