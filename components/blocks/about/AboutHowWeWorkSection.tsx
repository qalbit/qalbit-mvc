import Link from "next/link";
import type { AboutHowWeWorkSectionProps } from "@/lib/blocks/types";

export function AboutHowWeWorkSection({
  id = "about-process",
  headingId = "about-process-heading",
  eyebrow,
  title,
  intro,
  steps,
  reassurance,
  cta,
}: AboutHowWeWorkSectionProps) {
  return (
    <section
      id={id}
      aria-labelledby={headingId}
      className="bg-white text-slate-900"
      data-about-section="a8"
    >
      <div className="mx-auto max-w-6xl px-4 py-12 sm:px-6 sm:py-16 lg:px-8 lg:py-20">
        <header className="max-w-3xl space-y-3">
          <p className="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-slate-50 px-3 py-1 text-xs font-medium text-slate-700">
            <span className="h-1.5 w-1.5 rounded-full bg-accent-500" />
            <span>{eyebrow}</span>
          </p>
          <h2 id={headingId} className="text-display-md font-bold sm:text-display-lg md:text-display-xl">
            {title}
          </h2>
          {intro && <p className="text-sm leading-relaxed text-slate-600 sm:text-base">{intro}</p>}
        </header>

        <ol className="mt-8 grid gap-4 sm:mt-10 sm:grid-cols-2 lg:grid-cols-4" data-process-grid>
          {steps.map((step) => (
            <li
              key={step.step}
              className="relative flex flex-col rounded-2xl border border-slate-200 bg-slate-50 p-4 shadow-sm sm:p-5"
              data-process-step={step.step}
            >
              <div className="mb-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-accent-600 text-xs font-semibold text-white">
                {step.step}
              </div>
              <h3 className="text-sm font-semibold text-slate-900">{step.label}</h3>
              {step.description && (
                <p className="mt-1 text-xs leading-relaxed text-slate-600 sm:text-sm">{step.description}</p>
              )}
            </li>
          ))}
        </ol>

        <div className="mt-6 flex flex-wrap items-center justify-between gap-3 border-t border-slate-200 pt-4 text-xs text-slate-600 sm:text-sm">
          {reassurance && <p>{reassurance}</p>}
          {cta && (
            <Link
              href={cta.href}
              className="inline-flex items-center justify-center rounded-full border border-slate-300 bg-white px-4 py-2 text-xs font-medium text-slate-900 transition hover:border-accent-500 hover:text-accent-700 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-accent-600 focus-visible:ring-offset-2 focus-visible:ring-offset-white"
              data-process-cta
            >
              {cta.label}
            </Link>
          )}
        </div>
      </div>
    </section>
  );
}
