import Link from "next/link";
import type { GeoTechSectionProps } from "@/lib/blocks/types";

export function GeoTechSection({
  id = "location-tech",
  stateKey,
  stateLabel,
  eyebrow,
  title,
  intro,
  categories,
  links,
}: GeoTechSectionProps) {
  return (
    <section
      id={id}
      className="bg-slate-50 text-slate-900"
      data-location-section="tech"
      data-location-key={stateKey ?? undefined}
    >
      <div className="relative mx-auto max-w-6xl space-y-4 px-4 py-16 sm:px-6 md:space-y-10 lg:px-8 lg:py-20">
        <div className="max-w-3xl space-y-5" data-location-el="tech-header">
          {eyebrow && (
            <p className="text-xs font-semibold uppercase tracking-[0.2em] text-sky-600">{eyebrow}</p>
          )}
          {title && (
            <h2 className="text-display-md font-bold sm:text-display-lg md:text-display-xl">{title}</h2>
          )}
          {intro && <p className="text-sm sm:text-base text-slate-600">{intro}</p>}
          {stateLabel && (
            <p className="text-xs text-slate-500">
              Selected to support how teams in {stateLabel} expect their software to scale and perform.
            </p>
          )}
        </div>

        {categories.length > 0 && (
          <div className="mt-10 grid gap-6 md:grid-cols-2 lg:grid-cols-4" data-location-el="tech-grid">
            {categories.map((category) => {
              const name = category.name ?? category.title ?? "";
              const items = category.items ?? [];
              if (!name && items.length === 0) return null;

              return (
                <div key={name} className="rounded-2xl border border-slate-200 bg-white p-5 text-sm shadow-sm">
                  {name && (
                    <h3 className="text-xs font-semibold uppercase tracking-[0.16em] text-slate-500">{name}</h3>
                  )}
                  {items.length > 0 && (
                    <div className="mt-3 flex flex-wrap gap-2 text-[11px] text-slate-800">
                      {items.map((item) => (
                        <span
                          key={item}
                          className="inline-flex items-center rounded-full border border-slate-200 bg-slate-100 px-2 py-1"
                          data-location-el="tech-pill"
                        >
                          {item}
                        </span>
                      ))}
                    </div>
                  )}
                </div>
              );
            })}
          </div>
        )}

        {links && links.length > 0 && (
          <div className="mt-8 flex flex-wrap gap-4 text-xs" data-location-el="tech-links">
            {links.map((link) => (
              <Link
                key={link.href}
                href={link.href}
                className="inline-flex items-center text-sky-600 transition hover:text-sky-500"
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
