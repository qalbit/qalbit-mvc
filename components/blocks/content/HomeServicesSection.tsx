import Link from "next/link";
import type { HomeServicesBlockProps } from "@/lib/blocks/types";
import { asset } from "@/lib/site";

export function HomeServicesSection({ title, subtitle, items }: HomeServicesBlockProps) {
  if (!items.length) return null;

  return (
    <section
      id="home-services"
      className="py-18 bg-slate-50"
      aria-labelledby="home-services-heading"
      data-services-section
    >
      <div className="mx-auto max-w-6xl px-4">
        <header className="max-w-3xl space-y-3">
          <span
            className="inline-flex items-center rounded-pill border border-slate-200 bg-white/90 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-muted-foreground shadow-soft"
          >
            What makes us <span className="pl-1 font-semibold">unique</span>
          </span>

          <h2 id="home-services-heading" className="text-display-sm font-bold sm:text-display-md md:text-display-lg">
            {title}
          </h2>

          <p className="text-md font-medium text-slate-600">{subtitle}</p>
        </header>

        <div className="mt-8 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
          {items.map((service) => {
            const serviceTitle = service.name;
            const description = service.short_description ?? "";
            const href = service.href;
            const icon = service.icon;
            const iconAlt = service.iconAlt ?? serviceTitle;

            if (!serviceTitle) return null;

            return (
              <article
                key={service.slug}
                itemScope
                itemType="https://schema.org/Service"
                className="service-card group flex flex-col rounded-2xl border border-slate-200 bg-white p-6 shadow-soft transition-transform duration-200 hover:-translate-y-1.5 hover:shadow-lg"
                data-service-card
              >
                {icon && (
                  <div className="mb-4 flex h-10 w-10 items-center justify-center rounded-lg border border-accent-100 bg-accent-50">
                    <img
                      loading="lazy"
                      decoding="async"
                      src={asset(icon)}
                      alt={iconAlt}
                      className="h-6 w-6"
                      itemProp="image"
                      data-service-icon
                    />
                  </div>
                )}

                <h3 itemProp="serviceType" className="text-lg font-semibold text-slate-900">
                  {serviceTitle}
                </h3>

                {description && (
                  <p itemProp="description" className="mt-2 text-sm text-slate-600">
                    {description}
                  </p>
                )}

                {href && (
                  <div className="mt-4">
                    <Link
                      itemProp="url"
                      href={href}
                      className="inline-flex items-center text-sm font-semibold text-primary-800 hover:text-primary-900"
                      title={`Explore our ${serviceTitle} to enhance your operations`}
                      aria-label={`Explore ${serviceTitle} that drive automation and growth`}
                    >
                      Explore Our Services
                      <span className="ml-1 inline-block translate-x-0 transition-transform duration-150 group-hover:translate-x-0.5">
                        →
                      </span>
                    </Link>
                  </div>
                )}
              </article>
            );
          })}
        </div>
      </div>
    </section>
  );
}
