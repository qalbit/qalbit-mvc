import Link from "next/link";
import type { GeoProofProps } from "@/lib/blocks/types";

export function GeoProof({
  id = "location-proof",
  eyebrow,
  title,
  intro,
  stateKey,
  cases,
  testimonials,
}: GeoProofProps) {
  return (
    <section
      id={id}
      className="bg-slate-950 text-slate-50"
      data-location-section="proof"
      data-location-key={stateKey ?? undefined}
    >
      <div className="relative mx-auto max-w-6xl space-y-4 px-4 py-16 sm:px-6 md:space-y-10 lg:px-8 lg:py-20">
        <div className="max-w-3xl space-y-5" data-location-el="proof-header">
          {eyebrow && (
            <p className="text-xs font-semibold uppercase tracking-[0.2em] text-sky-400">{eyebrow}</p>
          )}
          {title && (
            <h2 className="text-display-md font-bold sm:text-display-lg md:text-display-xl">{title}</h2>
          )}
          {intro && <p className="text-sm sm:text-base text-slate-300">{intro}</p>}
        </div>

        {cases && cases.length > 0 && (
          <div className="mt-10 grid gap-6 md:grid-cols-2" data-location-el="case-grid">
            {cases.map((caseItem) => {
              const key = caseItem.label ?? caseItem.headline ?? caseItem.industry ?? "case";
              if (!caseItem.label && !caseItem.headline && !caseItem.result) return null;

              return (
                <article
                  key={key}
                  className="flex flex-col rounded-2xl border border-slate-800 bg-slate-900/60 p-5 text-sm shadow-sm"
                  data-location-el="case-card"
                >
                  {caseItem.label && (
                    <h3 className="text-sm font-semibold text-slate-50">{caseItem.label}</h3>
                  )}
                  {(caseItem.industry || caseItem.region) && (
                    <p className="mt-1 text-[11px] text-slate-400">
                      {caseItem.industry && <span>{caseItem.industry}</span>}
                      {caseItem.industry && caseItem.region && <span className="mx-1">•</span>}
                      {caseItem.region && <span>{caseItem.region}</span>}
                    </p>
                  )}
                  {caseItem.headline && (
                    <p className="mt-3 text-xs font-medium text-slate-200">{caseItem.headline}</p>
                  )}
                  {caseItem.result && (
                    <p className="mt-2 text-xs text-slate-300">{caseItem.result}</p>
                  )}
                  {caseItem.href && (
                    <div className="mt-4 pt-1">
                      <Link
                        href={caseItem.href}
                        className="inline-flex items-center text-xs font-semibold text-sky-400 transition hover:text-sky-300"
                      >
                        View more details
                        <span className="ml-1 inline-block translate-y-px">↗</span>
                      </Link>
                    </div>
                  )}
                </article>
              );
            })}
          </div>
        )}

        {testimonials && testimonials.length > 0 && (
          <div className="mt-12 grid gap-6 md:grid-cols-2" data-location-el="testimonials">
            {testimonials.map((t, i) => {
              if (!t.quote) return null;
              const figcaptionParts = [t.name, t.title ?? t.role, t.region].filter(Boolean);

              return (
                <figure
                  key={`${t.name ?? i}`}
                  className="rounded-2xl border border-slate-800 bg-slate-900/60 p-5 text-sm shadow-sm"
                >
                  <blockquote className="text-sm text-slate-200">“{t.quote}”</blockquote>
                  {figcaptionParts.length > 0 && (
                    <figcaption className="mt-3 text-xs text-slate-400">
                      {t.name && <span className="font-semibold text-slate-200">{t.name}</span>}
                      {(t.title ?? t.role) && (
                        <span>
                          {t.name ? " · " : ""}
                          {t.title ?? t.role}
                        </span>
                      )}
                      {t.region && <span> · {t.region}</span>}
                    </figcaption>
                  )}
                </figure>
              );
            })}
          </div>
        )}
      </div>
    </section>
  );
}
