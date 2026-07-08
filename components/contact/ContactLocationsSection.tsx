import type { ContactLocationsSectionProps } from "@/lib/blocks/types";
import { Container, HtmlText, Section } from "@/components/ui";

export function ContactLocationsSection({
  title,
  intro,
  cards,
  directContact,
}: ContactLocationsSectionProps) {
  const headingId = "contact-locations-heading";

  return (
    <Section
      id="contact-locations"
      className="bg-slate-950 py-14 sm:py-16 lg:py-20"
      ariaLabelledBy={headingId}
      dataAttributes={{ "data-contact-section": "c4" }}
    >
      <Container className="space-y-10">
        <header className="max-w-3xl space-y-3">
          <h2
            id={headingId}
            className="text-center text-display-md font-bold text-slate-50 sm:text-display-lg md:text-left md:text-display-xl"
          >
            {title}
          </h2>
          <p className="text-sm text-slate-300 sm:text-base">
            <HtmlText html={intro} />
          </p>
        </header>

        <div className="grid gap-6 md:grid-cols-3">
          {cards.map((card) => (
            <article
              key={card.title}
              className="flex h-full flex-col justify-between rounded-2xl border border-slate-800 bg-slate-900/60 p-5 shadow-sm shadow-slate-950/40"
              data-location-card
            >
              <div className="space-y-3">
                <h3 className="text-sm font-semibold text-white">{card.title}</h3>
                <p className="text-xs font-medium uppercase tracking-wide text-slate-400">{card.region}</p>
                <div className="space-y-1 text-xs text-slate-300">
                  {card.lines.map((line) => (
                    <p key={line}>
                      <HtmlText html={line} />
                    </p>
                  ))}
                </div>
              </div>

              {(card.phone || card.timezone) && (
                <dl className="mt-4 space-y-1 text-xs text-slate-300">
                  {card.phone && (
                    <div className="flex gap-2">
                      <dt className="text-slate-500">Phone / WhatsApp:</dt>
                      <dd>
                        <a href="tel:+918511900440" className="font-medium text-sky-300 hover:text-sky-200">
                          {card.phone}
                        </a>
                        {card.phoneNote && <span className="text-slate-500"> {card.phoneNote}</span>}
                      </dd>
                    </div>
                  )}
                  {card.timezone && (
                    <div className="flex gap-2">
                      <dt className="text-slate-500">Time zone:</dt>
                      <dd>{card.timezone}</dd>
                    </div>
                  )}
                </dl>
              )}
            </article>
          ))}
        </div>

        <div className="mt-4 space-y-3 rounded-2xl border border-slate-800 bg-slate-900/60 p-5 text-xs text-slate-200 sm:text-sm">
          <h3 className="text-xs font-semibold uppercase tracking-wide text-slate-400">
            {directContact.title}
          </h3>
          <div className="flex flex-col gap-4 sm:flex-row sm:flex-wrap sm:items-center sm:gap-x-6">
            {directContact.emails.map((item) => (
              <p key={item.email}>
                <span className="text-slate-400">{item.label}:</span>
                <a
                  href={item.href}
                  className="ml-1 font-medium text-sky-300 underline underline-offset-4 hover:text-sky-200"
                >
                  {item.email}
                </a>
              </p>
            ))}
          </div>
          {directContact.calendlyNote && directContact.calendlyHref && (
            <p className="text-[11px] text-slate-400">
              {directContact.calendlyNote}{" "}
              <a
                href={directContact.calendlyHref}
                className="font-medium text-sky-300 underline underline-offset-4 hover:text-sky-200"
                target="_blank"
                rel="noopener noreferrer"
              >
                Calendly link
              </a>
              .
            </p>
          )}
        </div>
      </Container>
    </Section>
  );
}
