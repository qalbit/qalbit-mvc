import type { ContactCtaSectionProps } from "@/lib/blocks/types";
import { ContactFormSmall } from "@/components/contact/ContactFormSmall";
import { Container, HtmlText, Section } from "@/components/ui";

export function ContactCtaSection({
  id = "section-contact-cta",
  eyebrow = "Contact Us",
  title = "Contact Us",
  subtitle = "for project discussion",
  primaryCta = { label: "Get a project estimate", href: "/contact-us/" },
  body = "Once you submit the form, one of our dedicated sales representatives will reach out to you within 24 hours.",
  stats,
  badgeHref = "https://www.rankwatch.com/agency/company/qalbit/",
  badgeImageSrc = "https://www.rankwatch.com/agency/wp-content/uploads/2017/01/QalbIT.png",
  badgeAlt = "Top Search Engine Optimization Agency in India",
  leadFrom = "lead_contact_page",
  redirectTo = "/#section-contact-cta",
}: ContactCtaSectionProps) {
  const headingId = `${id}-heading`;

  return (
    <Section
      id={id}
      className="bg-slate-950 py-16 text-slate-50"
      ariaLabelledBy={headingId}
      dataAttributes={{ "data-contact-cta-section": "", "data-contact-section": "" }}
    >
      <Container className="px-4 sm:px-4 lg:px-4">
        <div className="grid gap-10 lg:grid-cols-[minmax(0,1.15fr)_minmax(0,0.95fr)] lg:items-stretch">
          <div className="space-y-8" data-contact-cta-left>
            <header className="max-w-xl space-y-3">
              <span
                className="inline-flex items-center rounded-pill border border-slate-700/70 bg-slate-900/80 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-slate-300"
              >
                {eyebrow === "Contact Us" ? (
                  <>
                    Contact <span className="mx-1 text-gradient-brand">Us</span>
                  </>
                ) : (
                  eyebrow
                )}
              </span>

              <h2 id={headingId} className="text-display-sm font-bold sm:text-display-md">
                <HtmlText html={title} />
                {subtitle && (
                  <span className="block text-base font-normal text-slate-300">{subtitle}</span>
                )}
              </h2>

              <a
                href={primaryCta.href}
                className="inline-flex items-center justify-center rounded-xl bg-accent-600 px-4 py-2 text-xs font-semibold text-white transition hover:bg-accent-800"
                aria-label={primaryCta.ariaLabel}
              >
                {primaryCta.label}
              </a>

              {body && <p className="text-sm text-slate-300 md:text-base">{body}</p>}
            </header>

            {stats && stats.length > 0 && (
              <div className="contact-stat-grid">
                {stats.map((stat) => (
                  <article key={stat.label} className="contact-stat-card" data-contact-stat>
                    {stat.iconSrc && (
                      <div className="contact-stat-icon">
                        <img
                          src={stat.iconSrc}
                          alt={stat.iconAlt ?? stat.label}
                          loading="lazy"
                          decoding="async"
                        />
                      </div>
                    )}
                    <div className="contact-stat-text">
                      <h3 className="contact-stat-value">{stat.value}</h3>
                      <p className="contact-stat-label">{stat.label}</p>
                    </div>
                  </article>
                ))}
              </div>
            )}

            {badgeImageSrc && (
              <div className="contact-badge">
                <a
                  href={badgeHref}
                  target="_blank"
                  rel="noopener"
                  className="inline-block border-0"
                  style={{ display: "inline-block", border: 0, height: "auto" }}
                >
                  <img
                    src={badgeImageSrc}
                    alt={badgeAlt}
                    width={150}
                    loading="lazy"
                    decoding="async"
                    className="block w-[150px]"
                  />
                </a>
              </div>
            )}
          </div>

          <div className="flex items-stretch" data-contact-cta-form>
            <ContactFormSmall
              leadFrom={leadFrom}
              redirectTo={redirectTo}
              variant="contact_cta"
              className="w-full"
            />
          </div>
        </div>
      </Container>
    </Section>
  );
}
