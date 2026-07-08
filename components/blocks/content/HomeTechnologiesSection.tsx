import Link from "next/link";
import type { HomeTechnologiesBlockProps } from "@/lib/blocks/types";
import { asset } from "@/lib/site";

export function HomeTechnologiesSection({ title, subtitle, items }: HomeTechnologiesBlockProps) {
  if (!items.length) return null;

  return (
    <section
      id="home-technologies"
      className="bg-background py-16 text-foreground"
      aria-labelledby="home-technologies-heading"
      data-technologies-section
    >
      <div className="mx-auto max-w-6xl px-4">
        <div className="grid gap-10 lg:grid-cols-[minmax(0,1.1fr)_minmax(0,2fr)] lg:items-start">
          <header className="max-w-xl space-y-4" data-tech-header>
            <span
              className="inline-flex items-center rounded-pill border border-slate-200 bg-white/90 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-muted-foreground shadow-soft"
            >
              Our stack · Technologies
            </span>

            <h2 id="home-technologies-heading" className="text-display-sm font-bold sm:text-display-md">
              {title}
            </h2>

            <p className="text-sm text-muted-foreground md:text-base">{subtitle}</p>

            <ul className="mt-4 space-y-2 text-xs text-muted-foreground/90">
              <li>
                ✓ Full-stack JavaScript: React.js, Next.js, Node.js, Nest.js and TypeScript backends for modern web
                apps and SaaS products.
              </li>
              <li>
                ✓ PHP frameworks for ERP and B2B platforms: Laravel and CodeIgniter development, maintenance and
                long-term support.
              </li>
              <li>
                ✓ Cross-platform mobile and content platforms: Flutter app development and WordPress websites connected
                to custom APIs.
              </li>
            </ul>

            <Link
              href="/technologies/"
              className="mt-5 inline-flex items-center text-xs font-semibold text-primary-700 hover:text-primary-800"
              aria-label="Open QalbIT technologies page listing all supported stacks"
            >
              View all technologies
              <span aria-hidden="true" className="ml-1">↗</span>
            </Link>
          </header>

          <div className="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            {items.map((tech) => {
              const shortName = tech.short_name ?? tech.name;
              const iconAlt = shortName ? `${shortName} development services icon` : "Technology icon";
              const displayText = tech.tagline || tech.summary;

              return (
                <article
                  key={tech.slug}
                  className="group relative flex h-full flex-col rounded-2xl border border-slate-200 bg-card px-4 py-5 shadow-soft transition-transform duration-200 hover:-translate-y-1 hover:border-primary-400 hover:shadow-elevated"
                  itemScope
                  itemType="https://schema.org/Service"
                  data-tech-card
                >
                  <div className="flex items-center justify-between gap-3">
                    <h3 className="text-sm font-semibold text-foreground" itemProp="name">{shortName}</h3>

                    {tech.icon && (
                      <div className="flex h-9 w-9 flex-shrink-0 items-center justify-center overflow-hidden rounded-xl bg-muted">
                        <img
                          src={asset(tech.icon)}
                          alt={iconAlt}
                          loading="lazy"
                          decoding="async"
                          className="h-full w-full object-contain"
                        />
                      </div>
                    )}
                  </div>

                  {displayText && (
                    <>
                      <p className="mt-2 text-xs leading-relaxed text-muted-foreground">{displayText}</p>
                      <p className="sr-only" itemProp="description">{tech.summary ?? tech.tagline}</p>
                    </>
                  )}

                  {tech.bulletLines && tech.bulletLines.length > 0 && (
                    <ul className="mt-3 space-y-1.5 text-[11px] text-muted-foreground">
                      {tech.bulletLines.map((line) => (
                        <li key={line}>• {line}</li>
                      ))}
                    </ul>
                  )}

                  <meta itemProp="serviceType" content={tech.name} />
                  <Link
                    href={tech.href}
                    className="mt-4 inline-flex items-center text-[11px] font-semibold text-primary-700 hover:text-primary-800"
                    aria-label={`Read more about ${tech.name} at QalbIT`}
                    itemProp="url"
                  >
                    Learn more
                    <span aria-hidden="true" className="ml-1">↗</span>
                  </Link>
                </article>
              );
            })}
          </div>
        </div>
      </div>
    </section>
  );
}
