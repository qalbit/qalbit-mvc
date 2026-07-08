import Link from "next/link";
import type { ContactRequestsSectionProps } from "@/lib/blocks/types";
import { Container, HtmlText, Section } from "@/components/ui";

export function ContactRequestsSection({
  title,
  intro,
  cards,
  asideTitle,
  asideIntro,
  steps,
  asideFootnote,
  asideFootnoteEmail,
}: ContactRequestsSectionProps) {
  const headingId = "contact-requests-heading";

  return (
    <Section
      id="contact-requests"
      className="bg-slate-950 py-14 sm:py-16 lg:py-20"
      ariaLabelledBy={headingId}
      dataAttributes={{ "data-contact-section": "c2" }}
    >
      <Container>
        <div className="grid gap-12 lg:grid-cols-[minmax(0,1.3fr)_minmax(0,0.9fr)] lg:items-start">
          <div className="space-y-6">
            <header className="max-w-2xl space-y-3">
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

            <div className="grid gap-4 sm:grid-cols-2">
              {cards.map((card) => (
                <article
                  key={card.title}
                  className="group rounded-xl border border-slate-800 bg-slate-900/60 p-4 shadow-sm shadow-slate-950/40 transition hover:border-sky-400/70 hover:bg-slate-900"
                  data-request-card
                >
                  <h3 className="text-sm font-semibold text-white">{card.title}</h3>
                  <p className="mt-2 text-xs text-slate-300">{card.description}</p>
                  {card.footnote && (
                    <p className="mt-3 text-[11px] text-slate-400">
                      {card.footnote}
                      {card.footnoteLink && (
                        <>
                          {" "}
                          <Link
                            href={card.footnoteLink.href}
                            className="font-medium text-sky-300 underline underline-offset-4 hover:text-sky-200"
                          >
                            {card.footnoteLink.label}
                          </Link>
                          .
                        </>
                      )}
                    </p>
                  )}
                </article>
              ))}
            </div>
          </div>

          <aside
            className="space-y-4 rounded-2xl border border-slate-800 bg-slate-900/60 p-5 shadow-lg shadow-slate-950/40 sm:p-6 lg:p-7"
            aria-label="How our engagement process works"
          >
            <h3 className="text-sm font-semibold tracking-tight text-white sm:text-base">{asideTitle}</h3>
            <p className="text-xs text-slate-300 sm:text-sm">{asideIntro}</p>

            <ol className="space-y-4">
              {steps.map((step) => (
                <li
                  key={step.step}
                  className="flex gap-3 rounded-xl border border-slate-800 bg-slate-950/60 p-4"
                  data-contact-mini-step={step.step}
                >
                  <div
                    className="mt-0.5 flex h-6 w-6 flex-none items-center justify-center rounded-full bg-sky-500/10 text-[11px] font-semibold text-sky-300 ring-1 ring-sky-500/40"
                  >
                    {step.step}
                  </div>
                  <div className="space-y-1">
                    <p className="text-xs font-semibold text-slate-100">{step.title}</p>
                    <p className="text-[11px] leading-snug text-slate-400">{step.description}</p>
                  </div>
                </li>
              ))}
            </ol>

            {asideFootnote && (
              <p className="pt-1 text-[11px] text-slate-400">
                {asideFootnote}
                {asideFootnoteEmail && (
                  <>
                    {" "}
                    <a
                      href={`mailto:${asideFootnoteEmail}`}
                      className="font-medium text-sky-300 underline underline-offset-4 hover:text-sky-200"
                    >
                      {asideFootnoteEmail}
                    </a>
                    {" "}
                    and we will respond with specific questions and next steps.
                  </>
                )}
              </p>
            )}
          </aside>
        </div>
      </Container>
    </Section>
  );
}
