import Link from "next/link";
import type { HomeProcessBlockProps } from "@/lib/blocks/types";
import { cn } from "@/lib/utils";

export function HomeProcessSection({ eyebrow, title, seoTagline, intro, steps }: HomeProcessBlockProps) {
  if (!steps.length) return null;

  return (
    <section
      id="home-process"
      className="py-16 bg-slate-950 text-slate-50"
      aria-labelledby="process-heading"
      data-process-section
    >
      <div className="mx-auto max-w-6xl px-4">
        <header className="max-w-3xl space-y-3">
          <span
            className="rounded-pill border-2 border-slate-700/80 bg-slate-900/60 px-2.5 py-1.5 text-[11px] font-medium uppercase text-slate-300 shadow-elevated"
          >
            {eyebrow}
          </span>

          <h2 id="process-heading" className="text-display-sm font-bold sm:text-display-md md:text-display-lg">
            {title}
          </h2>

          <p className="mt-1 text-[11px] uppercase tracking-[0.16em] text-slate-500">{seoTagline}</p>

          <p className="mt-2 text-sm text-slate-300 md:text-base">{intro}</p>
        </header>

        <div className="mt-8 hidden space-y-8 md:block" data-process-desktop>
          <div
            className="grid grid-cols-4 gap-0"
            role="tablist"
            aria-label="Custom product development process"
            data-process-tablist
          >
            {steps.map((step, index) => (
              <button
                key={step.tabId}
                type="button"
                id={step.tabId}
                role="tab"
                aria-selected={index === 0}
                aria-controls={step.panelId}
                tabIndex={index === 0 ? 0 : -1}
                data-process-tab
                data-process-index={String(index)}
                className="group flex flex-col px-4 py-3 text-left transition-all duration-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary-400"
              >
                <span className="mt-0.5 text-sm font-semibold text-slate-50 md:text-base">{step.tabLabel}</span>
                <span className="mt-2 block h-[2px] overflow-hidden rounded-full bg-slate-700/80">
                  <span
                    className="block h-full w-full origin-left scale-x-0 bg-primary-400"
                    data-process-progress
                  />
                </span>
              </button>
            ))}
          </div>

          <div
            className="rounded-3xl border border-slate-800 bg-slate-900/80 p-6 md:p-8 lg:p-10"
            data-process-panels
          >
            {steps.map((step, index) => (
              <article
                key={step.panelId}
                id={step.panelId}
                role="tabpanel"
                aria-labelledby={step.tabId}
                data-process-panel
                data-process-index={String(index)}
                className={cn("process-panel", index > 0 && "hidden")}
              >
                <div className="grid items-start gap-8 md:grid-cols-[minmax(0,1.8fr)_minmax(0,2fr)]">
                  <div>
                    <h3 className="text-xl font-semibold text-slate-50 md:text-2xl">{step.panelTitle}</h3>
                    <p className="mt-3 text-sm text-slate-300 md:text-base">{step.panelDescription}</p>

                    <Link
                      href={step.ctaHref}
                      className="btn btn-primary btn-radius-pill mt-5"
                      aria-label={step.ctaAriaLabel}
                    >
                      {step.ctaLabel}
                    </Link>
                  </div>

                  <div>
                    <ul className="space-y-2.5 text-sm text-slate-100 md:text-base">
                      {step.bullets.map((bullet) => (
                        <li key={bullet} className="flex gap-2" data-process-bullet>
                          <span className="mt-2 h-1.5 w-1.5 rounded-full bg-primary-400" />
                          <span>{bullet}</span>
                        </li>
                      ))}
                    </ul>
                  </div>
                </div>
              </article>
            ))}
          </div>
        </div>

        <div className="mt-8 space-y-6 md:hidden">
          {steps.map((step) => (
            <article key={`mobile-${step.panelId}`} className="rounded-2xl border border-slate-800 bg-slate-900/80 p-5">
              <h3 className="text-lg font-semibold text-slate-50">{step.tabLabel}</h3>
              <p className="mt-2 text-sm text-slate-300">{step.panelDescription}</p>
              <ul className="mt-3 space-y-2 text-sm text-slate-100">
                {step.bullets.map((bullet) => (
                  <li key={bullet} className="flex gap-2">
                    <span className="mt-2 h-1.5 w-1.5 rounded-full bg-primary-400" />
                    <span>{bullet}</span>
                  </li>
                ))}
              </ul>
              <Link
                href={step.ctaHref}
                className="btn btn-primary btn-radius-pill mt-4"
                aria-label={step.ctaAriaLabel}
              >
                {step.ctaLabel}
              </Link>
            </article>
          ))}
        </div>
      </div>
    </section>
  );
}
