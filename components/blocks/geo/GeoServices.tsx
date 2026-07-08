import Link from "next/link";
import type { GeoServicesProps } from "@/lib/blocks/types";

export function GeoServices({
  id = "location-services",
  eyebrow,
  title,
  intro,
  stateLabel,
  stateKey,
  items,
}: GeoServicesProps) {
  return (
    <section
      id={id}
      className="bg-slate-50 text-slate-900"
      data-location-section-services
      data-location-key={stateKey ?? undefined}
    >
      <div className="relative mx-auto max-w-6xl space-y-4 px-4 py-16 sm:px-6 md:space-y-10 lg:px-8 lg:py-20">
        <div className="flex flex-col gap-4 lg:flex-row lg:items-start lg:justify-between">
          <div className="max-w-lg space-y-5" data-location-el-header>
            {eyebrow && (
              <p className="text-xs font-semibold uppercase tracking-[0.2em] text-sky-600">{eyebrow}</p>
            )}
            {title && (
              <h2 className="text-display-md font-bold sm:text-display-lg md:text-display-xl">{title}</h2>
            )}
            {intro && <p className="text-sm sm:text-base text-slate-600">{intro}</p>}
            {stateLabel && (
              <p className="text-xs text-slate-500">
                Focused on the needs of startups, scale-ups and enterprises across {stateLabel}.
              </p>
            )}
          </div>

          {items.length > 0 && (
            <div className="grid flex-1 gap-4 sm:grid-cols-2 lg:grid-cols-3" data-location-el-grid>
              {items.map((item) => {
                if (!item.title && !item.description) return null;

                return (
                  <article
                    key={item.title}
                    className="group flex flex-col rounded-2xl border border-slate-200 bg-white p-5 text-sm shadow-sm transition hover:-translate-y-0.5 hover:border-sky-400 hover:shadow-md"
                    data-location-el-card
                  >
                    <div className="flex-1 space-y-2">
                      <h3 className="text-sm font-semibold text-slate-900">{item.title}</h3>
                      {item.description && (
                        <p className="text-xs text-slate-600">{item.description}</p>
                      )}
                    </div>
                    {item.href && (
                      <div className="mt-4">
                        <Link
                          href={item.href}
                          className="inline-flex items-center text-xs font-semibold text-sky-600 transition group-hover:text-sky-500"
                        >
                          Learn more
                          <span className="ml-1 inline-block translate-y-px transition group-hover:translate-x-0.5">
                            →
                          </span>
                        </Link>
                      </div>
                    )}
                  </article>
                );
              })}
            </div>
          )}
        </div>
      </div>
    </section>
  );
}
