import type { ContactHeroProps } from "@/lib/blocks/types";
import { ContactFormPage } from "@/components/contact/ContactFormPage";
import { Badge, Container, HtmlText, Section } from "@/components/ui";

export function ContactHero({
  eyebrow = "Let's build your next software release",
  title,
  intro,
  needsTitle = "Typical requests we handle",
  needs,
  needsNote,
  trust,
  exploreLinks,
  formTitle = "Tell us about your project",
  formIntro = "Share a few details and we will follow up with questions, ballpark estimates or the next best step.",
  leadFrom = "lead_contact_page",
  redirectTo = "/contact-us/",
}: ContactHeroProps) {
  const headingId = "contact-hero-heading";

  return (
    <Section
      id="contact-hero"
      className="relative overflow-hidden bg-slate-50 py-16 sm:py-20 lg:py-24"
      dataSection="c1"
      dataAttributes={{ "data-contact-section": "c1" }}
    >
      <Container>
        <div className="grid gap-12 lg:grid-cols-[minmax(0,1.1fr)_minmax(0,1fr)] lg:items-start">
          <div className="space-y-8" data-contact-hero-el>
            <header className="space-y-4">
              <Badge variant="pill">{eyebrow}</Badge>
              <h1
                id={headingId}
                className="text-center text-display-md font-bold sm:text-display-lg md:text-left md:text-display-2xl"
              >
                <HtmlText html={title} />
              </h1>
              {intro && (
                <p className="max-w-xl text-sm leading-relaxed text-slate-600 sm:text-base">{intro}</p>
              )}
            </header>

            {(needs || trust) && (
              <div className="grid gap-6 sm:grid-cols-2" data-contact-hero-el>
                {needs && needs.length > 0 && (
                  <div className="space-y-3">
                    <h2 className="text-xs font-semibold uppercase tracking-wide text-slate-500">{needsTitle}</h2>
                    <ul className="space-y-2 text-xs text-slate-800">
                      {needs.map((item) => (
                        <li key={item} className="flex gap-2">
                          <span className="mt-2 inline-flex h-1.5 w-1.5 flex-none rounded-full bg-primary" />
                          <span>{item}</span>
                        </li>
                      ))}
                    </ul>
                    {needsNote && <p className="pt-1 text-xs text-slate-500">{needsNote}</p>}
                  </div>
                )}

                {trust && (
                  <div className="space-y-3 rounded-2xl border border-slate-200 bg-white p-4 shadow-lg shadow-slate-200/60">
                    <h2 className="text-xs font-semibold uppercase tracking-wide text-slate-500">
                      {trust.title ?? "Trusted engineering partner"}
                    </h2>
                    {trust.rating && (
                      <div className="flex flex-wrap items-center gap-x-4 gap-y-4 text-sm text-slate-800">
                        <span className="inline-flex items-center gap-0.5 rounded-full bg-slate-50 px-2 py-0.5 text-xs font-medium text-slate-900 ring-1 ring-slate-200">
                          <span aria-hidden="true">★★★★★</span>
                          <span className="ml-1">{trust.rating}</span>
                        </span>
                        {trust.ratingNote && <span className="text-xs text-slate-600">{trust.ratingNote}</span>}
                      </div>
                    )}
                    {trust.regionNote && <p className="text-xs text-slate-600">{trust.regionNote}</p>}
                    <div className="mt-1 flex flex-wrap items-center gap-x-4 gap-y-4 text-xs text-slate-500">
                      {trust.replyNote && (
                        <p>
                          We usually reply within{" "}
                          <span className="font-semibold text-slate-900">{trust.replyNote}</span>.
                        </p>
                      )}
                      {trust.email && (
                        <p>
                          Prefer email? Contact us at{" "}
                          <a
                            href={`mailto:${trust.email}`}
                            className="font-medium text-primary underline underline-offset-4 hover:text-primary/80"
                          >
                            {trust.email}
                          </a>.
                        </p>
                      )}
                    </div>
                  </div>
                )}
              </div>
            )}

            {exploreLinks && exploreLinks.length > 0 && (
              <nav className="flex flex-col gap-3 text-xs text-slate-500" aria-label="Popular pages">
                <span className="text-slate-500">Explore more about QalbIT:</span>
                <div className="inline-flex flex-wrap gap-2">
                  {exploreLinks.map((link) => (
                    <a
                      key={link.href}
                      href={link.href}
                      className="inline-flex items-center gap-1 rounded-full border border-slate-200 px-3 py-1 hover:border-primary hover:text-primary"
                    >
                      {link.label}
                    </a>
                  ))}
                </div>
              </nav>
            )}
          </div>

          <div className="lg:pl-4 xl:pl-8" data-contact-hero-el>
            <div className="rounded-2xl border border-slate-200 bg-white p-5 shadow-xl shadow-slate-200/80 backdrop-blur sm:p-6 lg:p-7">
              <h2 className="text-base font-semibold text-slate-900 sm:text-lg">{formTitle}</h2>
              {formIntro && <p className="mt-1 text-xs text-slate-600 sm:text-sm">{formIntro}</p>}
              <ContactFormPage leadFrom={leadFrom} redirectTo={redirectTo} className="mt-6" />
            </div>
          </div>
        </div>
      </Container>
    </Section>
  );
}
