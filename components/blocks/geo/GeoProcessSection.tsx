import Link from "next/link";
import type { GeoProcessSectionProps } from "@/lib/blocks/types";

export function GeoProcessSection({
  id = "location-process",
  stateKey,
  stateLabel,
  eyebrow,
  title,
  intro,
  steps,
  links,
}: GeoProcessSectionProps) {
  return (
    <section
      id={id}
      className="bg-slate-50 text-slate-900"
      data-location-section="process"
      data-location-key={stateKey ?? undefined}
    >
      <div className="relative mx-auto max-w-6xl space-y-4 px-4 py-16 sm:px-6 md:space-y-10 lg:px-8 lg:py-20">
        <div className="max-w-3xl space-y-5" data-location-el="process-header">
          {eyebrow && (
            <p className="text-xs font-semibold uppercase tracking-[0.2em] text-sky-600">{eyebrow}</p>
          )}
          {title && (
            <h2 className="text-display-md font-bold sm:text-display-lg md:text-display-xl">{title}</h2>
          )}
          {intro && <p className="text-sm sm:text-base text-slate-600">{intro}</p>}
          {stateLabel && (
            <p className="text-xs text-slate-500">
              Designed to keep stakeholders in {stateLabel} aligned and confident at every stage.
            </p>
          )}
        </div>

        {steps.length > 0 && (
          <ol className="mt-10 grid gap-6 md:grid-cols-2 lg:grid-cols-3" data-location-el="process-steps">
            {steps.map((step, index) => {
              const label = step.label ?? step.title ?? "";
              if (!label && !step.description) return null;

              return (
                <li
                  key={`${label}-${index}`}
                  className="flex flex-col rounded-2xl border border-slate-200 bg-white p-5 text-sm shadow-sm transition hover:-translate-y-0.5 hover:border-sky-400 hover:shadow-md"
                  data-location-el="process-step"
                >
                  <div className="flex items-center gap-3">
                    <span className="flex h-7 w-7 items-center justify-center rounded-full bg-sky-600 text-xs font-semibold text-white">
                      {String(index + 1).padStart(2, "0")}
                    </span>
                    {label && <h3 className="text-sm font-semibold text-slate-900">{label}</h3>}
                  </div>
                  {step.description && (
                    <p className="mt-3 text-xs text-slate-600">{step.description}</p>
                  )}
                  {step.relatedUrl && (
                    <div className="mt-3">
                      <Link
                        href={step.relatedUrl}
                        className="inline-flex items-center text-xs font-semibold text-sky-600 transition hover:text-sky-500"
                      >
                        View related process
                        <span className="ml-1 inline-block translate-y-px">→</span>
                      </Link>
                    </div>
                  )}
                </li>
              );
            })}
          </ol>
        )}

        {links && links.length > 0 && (
          <div className="mt-8 flex flex-wrap gap-4 text-xs" data-location-el="process-links">
            {links.map((link) => (
              <Link
                key={link.href}
                href={link.href}
                className="inline-flex items-center rounded-full border border-slate-300 px-3 py-1.5 text-slate-700 transition hover:border-sky-400 hover:text-sky-700"
              >
                {link.label}
                <span className="ml-1 inline-block translate-y-px">↗</span>
              </Link>
            ))}
          </div>
        )}
      </div>
    </section>
  );
}
