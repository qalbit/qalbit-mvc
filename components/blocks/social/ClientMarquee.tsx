import type { ClientMarqueeProps } from "@/lib/blocks/types";
import { asset } from "@/lib/site";

const DEFAULT_BULLETS = [
  "Product engineering partner for SaaS startups, scale-ups and agencies across Europe, the Middle East, the US and India.",
  "Custom software development for healthcare, logistics, hospitality, fintech, recruitment, travel and retail businesses.",
  "Long-term collaboration with founders, CTOs and product teams on web apps, mobile apps and cloud-based platforms.",
];

export function ClientMarquee({
  id = "home-clients",
  eyebrow = "Our clients · Global footprint",
  subtitle,
  bullets = DEFAULT_BULLETS,
  clients,
}: ClientMarqueeProps) {
  const headingId = "home-clients-heading";
  const rows: typeof clients[] = [[], []];
  clients.forEach((client, index) => {
    rows[index % 2].push(client);
  });

  return (
    <section
      id={id}
      className="relative overflow-x-hidden bg-background py-16 text-foreground"
      aria-labelledby={headingId}
      data-clients-section
    >
      <div className="mx-auto max-w-6xl px-4">
        <div className="grid gap-10 lg:grid-cols-[minmax(0,1.3fr)_minmax(0,2fr)] lg:items-center">
          <header className="max-w-xl space-y-4" data-clients-header>
            <span
              className="inline-flex items-center rounded-pill border border-slate-200 bg-white/90 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-muted-foreground shadow-soft"
            >
              {eyebrow}
            </span>

            <h2 id={headingId} className="text-display-sm font-bold sm:text-display-md">
              Trusted by ambitious startups and global enterprises
            </h2>

            {subtitle && <p className="text-sm text-muted-foreground md:text-base">{subtitle}</p>}

            {bullets.length > 0 && (
              <ul className="mt-4 space-y-2 text-xs text-muted-foreground/90">
                {bullets.map((item) => (
                  <li key={item}>✓ {item}</li>
                ))}
              </ul>
            )}
          </header>

          <div className="relative max-w-full overflow-hidden lg:pl-6" data-clients-marquee>
            <div className="hidden flex-col gap-5 sm:flex">
              {rows.map((rowClients, rowIndex) => {
                if (!rowClients.length) return null;

                return (
                  <div
                    key={rowIndex}
                    className="relative w-full overflow-hidden"
                    data-clients-row
                    data-clients-row-index={String(rowIndex)}
                  >
                    <div className="flex max-w-none items-center gap-6" data-clients-track>
                      {rowClients.map((client) => {
                        const logo = client.logo ?? client.logoSrc;
                        if (!logo) return null;
                        const alt = client.alt ?? (client.name ? `${client.name} logo` : "Client logo");

                        return (
                          <figure
                            key={client.name}
                            className="client-logo-card flex h-20 min-w-[9.5rem] items-center justify-center"
                            itemScope
                            itemType="https://schema.org/Organization"
                          >
                            <img
                              src={logo.startsWith("/assets") ? logo : asset(logo)}
                              alt={alt}
                              loading="lazy"
                              decoding="async"
                              width={160}
                              height={80}
                              className="h-fit w-fit object-contain"
                              itemProp="logo"
                            />
                            {client.name && <meta itemProp="name" content={client.name} />}
                          </figure>
                        );
                      })}
                    </div>
                  </div>
                );
              })}
            </div>

            <div className="mt-6 grid grid-cols-2 gap-4 sm:hidden">
              {clients.map((client) => {
                const logo = client.logo ?? client.logoSrc;
                if (!logo) return null;
                const alt = client.alt ?? (client.name ? `${client.name} logo` : "Client logo");

                return (
                  <figure
                    key={`mobile-${client.name}`}
                    className="client-logo-card flex h-20 items-center justify-center"
                    itemScope
                    itemType="https://schema.org/Organization"
                  >
                    <img
                      src={logo.startsWith("/assets") ? logo : asset(logo)}
                      alt={alt}
                      loading="lazy"
                      decoding="async"
                      width={160}
                      height={80}
                      className="max-h-12 w-auto object-contain"
                      itemProp="logo"
                    />
                    {client.name && <meta itemProp="name" content={client.name} />}
                  </figure>
                );
              })}
            </div>

            <div className="pointer-events-none absolute inset-y-0 left-0 hidden w-10 bg-gradient-to-r from-background via-background/80 to-transparent sm:block" />
            <div className="pointer-events-none absolute inset-y-0 right-0 hidden w-10 bg-gradient-to-l from-background via-background/80 to-transparent sm:block" />
          </div>
        </div>
      </div>
    </section>
  );
}
