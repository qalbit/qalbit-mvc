import type { AboutClientsSectionProps } from "@/lib/blocks/types";
import { asset } from "@/lib/site";

export function AboutClientsSection({
  id = "about-clients-industries",
  headingId = "about-clients-industries-heading",
  eyebrow,
  title,
  intro,
  logosLabel,
  logos,
  logosFootnote,
  industriesLabel,
  industries,
  industriesFootnote,
}: AboutClientsSectionProps) {
  return (
    <section
      id={id}
      aria-labelledby={headingId}
      className="bg-slate-50 text-slate-900"
      data-about-section="a5"
    >
      <div className="mx-auto max-w-6xl px-4 py-12 sm:px-6 sm:py-16 lg:px-8 lg:py-20">
        <header className="max-w-3xl space-y-3">
          {eyebrow && (
            <p className="inline-flex items-center gap-2 rounded-full border border-accent-200 bg-accent-50 px-3 py-1 text-xs font-medium text-accent-700">
              <span className="h-1.5 w-1.5 rounded-full bg-accent-500" />
              <span>{eyebrow}</span>
            </p>
          )}
          <h2 id={headingId} className="text-display-md font-bold sm:text-display-lg md:text-display-xl">
            {title}
          </h2>
          {intro && <p className="text-sm leading-relaxed text-slate-600 sm:text-base">{intro}</p>}
        </header>

        <div className="mt-8 space-y-6 sm:mt-10">
          {logosLabel && (
            <p className="text-xs font-medium uppercase tracking-wide text-slate-500">{logosLabel}</p>
          )}
          <ul className="grid gap-6 sm:grid-cols-3 lg:grid-cols-5" aria-label="Client logo grid" data-logo-grid>
            {logos.map((client) => (
              <li
                key={client.alt}
                className="flex h-20 w-auto items-center justify-center rounded-2xl border border-slate-200 bg-white px-6"
                data-logo
              >
                {client.url ? (
                  <a
                    href={client.url}
                    target="_blank"
                    rel="noreferrer noopener"
                    className="flex h-full w-full items-center justify-center"
                    title={client.industry ?? client.alt}
                  >
                    <img
                      src={asset(client.logo.replace(/^\//, ""))}
                      alt={client.alt}
                      className="block max-h-10 w-auto max-w-full object-contain grayscale transition hover:opacity-100 hover:grayscale-0"
                      loading="lazy"
                    />
                  </a>
                ) : (
                  <div
                    className="flex h-full w-full items-center justify-center"
                    title={client.industry ?? undefined}
                  >
                    <img
                      src={asset(client.logo.replace(/^\//, ""))}
                      alt={client.alt}
                      className="block max-h-10 w-auto max-w-full object-contain grayscale transition hover:opacity-100 hover:grayscale-0"
                      loading="lazy"
                    />
                  </div>
                )}
              </li>
            ))}
          </ul>
          {logosFootnote && <p className="text-xs text-slate-500 sm:text-sm">{logosFootnote}</p>}
        </div>

        <div className="mt-10 space-y-4">
          {industriesLabel && (
            <p className="text-xs font-medium uppercase tracking-wide text-slate-500">{industriesLabel}</p>
          )}
          <div className="flex flex-wrap gap-2" data-industries-list>
            {industries.map((industry) => (
              <span
                key={industry}
                className="inline-flex items-center rounded-full border border-slate-200 bg-white px-3 py-1 text-xs font-medium text-slate-800"
              >
                {industry}
              </span>
            ))}
          </div>
          {industriesFootnote && (
            <p className="text-xs text-slate-500 sm:text-sm">{industriesFootnote}</p>
          )}
        </div>
      </div>
    </section>
  );
}
