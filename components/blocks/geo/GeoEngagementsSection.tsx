import Link from "next/link";
import type { GeoEngagementsSectionProps } from "@/lib/blocks/types";

export function GeoEngagementsSection({
  id = "location-engagements",
  stateKey,
  stateLabel,
  eyebrow,
  title,
  intro,
  models,
}: GeoEngagementsSectionProps) {
  return (
    <section
      id={id}
      className="bg-slate-950 text-slate-50"
      data-location-section="engagements"
      data-location-key={stateKey ?? undefined}
    >
      <div className="relative mx-auto max-w-6xl space-y-4 px-4 py-16 sm:px-6 md:space-y-10 lg:px-8 lg:py-20">
        <div className="max-w-3xl space-y-5" data-location-el="engagements-header">
          {eyebrow && (
            <p className="text-xs font-semibold uppercase tracking-[0.2em] text-sky-400">{eyebrow}</p>
          )}
          {title && (
            <h2 className="text-display-md font-bold sm:text-display-lg md:text-display-xl">{title}</h2>
          )}
          {intro && <p className="text-sm sm:text-base text-slate-300">{intro}</p>}
          {stateLabel && (
            <p className="text-xs text-slate-400">
              Flexible enough for teams across {stateLabel} at different stages of growth.
            </p>
          )}
        </div>

        {models.length > 0 && (
          <div className="mt-10 grid gap-6 md:grid-cols-3" data-location-el="engagements-grid">
            {models.map((model) => (
              <article
                key={model.key ?? model.label}
                className="flex flex-col rounded-2xl border border-slate-800 bg-slate-900/60 p-5 text-sm shadow-sm"
                data-location-el="engagement-card"
              >
                <h3 className="text-sm font-semibold text-slate-50">{model.label}</h3>
                {model.description && (
                  <p className="mt-2 text-xs text-slate-300">{model.description}</p>
                )}
                {model.bestFor && (
                  <p className="mt-3 text-[11px] font-medium text-sky-300">Best for: {model.bestFor}</p>
                )}
                {model.href && (
                  <div className="mt-4 pt-1">
                    <Link
                      href={model.href}
                      className="inline-flex items-center text-xs font-semibold text-sky-400 transition hover:text-sky-300"
                    >
                      Learn more about this model
                      <span className="ml-1 inline-block translate-y-px">↗</span>
                    </Link>
                  </div>
                )}
              </article>
            ))}
          </div>
        )}
      </div>
    </section>
  );
}
