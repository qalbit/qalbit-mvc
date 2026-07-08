import type { ReactNode } from "react";
import { Badge, ButtonLink, Container, HtmlText, Section } from "@/components/ui";

export type ErrorPageVariant = "404" | "503" | "500";

export interface ErrorPageShellProps {
  variant: ErrorPageVariant;
  badge: string;
  title: string;
  body: string;
  primaryAction?: ReactNode;
  secondaryCta?: { label: string; href: string; ariaLabel?: string };
  links?: Array<{ label: string; href: string }>;
  panel: {
    eyebrow: string;
    title: string;
    body: string;
    bullets: string[];
    primaryHref: string;
    primaryLabel: string;
    secondaryHref?: string;
    secondaryLabel?: string;
  };
  showExploreSection?: boolean;
}

const exploreCards = [
  {
    href: "/services/",
    label: "Services",
    title: "Custom software & product engineering",
    description:
      "Web, mobile, SaaS and API development tailored to your roadmap, from idea to production.",
    cta: "View all services →",
  },
  {
    href: "/blog/",
    label: "Insights",
    title: "Product, architecture & engineering notes",
    description:
      "Articles and guides from QalbIT on building and scaling modern software products.",
    cta: "Read our latest posts →",
  },
];

const badgeDotClass: Record<ErrorPageVariant, string> = {
  "404": "bg-primary",
  "503": "bg-amber-500",
  "500": "bg-rose-500",
};

export function ErrorPageShell({
  variant,
  badge,
  title,
  body,
  primaryAction,
  secondaryCta,
  links = [],
  panel,
  showExploreSection = variant === "404",
}: ErrorPageShellProps) {
  const headingId = `error-${variant}-heading`;

  return (
    <>
      <Section
        id={`error-${variant}-hero`}
        className="relative overflow-hidden bg-slate-50 py-16 sm:py-20 lg:py-24"
        ariaLabelledBy={headingId}
      >
        <Container>
          <div className="grid gap-12 lg:grid-cols-[minmax(0,1.1fr)_minmax(0,0.9fr)] lg:items-center">
            <div className="space-y-8">
              <header className="space-y-4">
                <Badge variant="pill">
                  <span className={`inline-flex h-1.5 w-1.5 rounded-full ${badgeDotClass[variant]}`} />
                  {badge}
                </Badge>

                <h1
                  id={headingId}
                  className="text-center text-display-md font-bold text-slate-900 sm:text-display-lg md:text-left md:text-display-2xl"
                >
                  <HtmlText html={title} />
                </h1>

                <p className="max-w-xl text-sm leading-relaxed text-slate-600 sm:text-base">{body}</p>
              </header>

              <div className="flex flex-col gap-3 sm:flex-row sm:items-center">
                {primaryAction ?? (
                  <ButtonLink href="/" ariaLabel="Back to homepage">
                    Back to homepage
                  </ButtonLink>
                )}
                {secondaryCta && (
                  <ButtonLink
                    href={secondaryCta.href}
                    variant="primary-outline"
                    ariaLabel={secondaryCta.ariaLabel}
                  >
                    {secondaryCta.label}
                  </ButtonLink>
                )}
              </div>

              {links.length > 0 && (
                <div className="space-y-3">
                  <p className="text-xs font-semibold uppercase tracking-wide text-slate-500">
                    Or jump straight into:
                  </p>
                  <div className="flex flex-wrap gap-2">
                    {links.map((link) => (
                      <a
                        key={link.href}
                        href={link.href}
                        className="inline-flex items-center gap-1 rounded-full border border-slate-200 bg-white px-3 py-1 text-xs font-medium text-slate-800 hover:border-primary hover:text-primary"
                      >
                        {link.label}
                      </a>
                    ))}
                  </div>
                </div>
              )}
            </div>

            <div className="lg:pl-4 xl:pl-8">
              <div className="relative overflow-hidden rounded-3xl border border-slate-200 bg-gradient-to-b from-slate-900 via-slate-900 to-slate-950 p-6 shadow-2xl shadow-slate-900/40 sm:p-8">
                <div className="space-y-4">
                  <p className="text-xs font-semibold uppercase tracking-[0.16em] text-slate-400">
                    {panel.eyebrow}
                  </p>
                  <h2 className="text-lg font-semibold text-slate-50">{panel.title}</h2>
                  <p className="text-sm text-slate-300">{panel.body}</p>
                  <ul className="mt-3 space-y-2 text-xs text-slate-200">
                    {panel.bullets.map((bullet) => (
                      <li key={bullet} className="flex gap-2">
                        <span className="mt-1 inline-flex h-1.5 w-1.5 flex-none rounded-full bg-emerald-400" />
                        <span>{bullet}</span>
                      </li>
                    ))}
                  </ul>
                  <div className="mt-5 flex flex-col gap-2 sm:flex-row sm:items-center">
                    <ButtonLink href={panel.primaryHref} variant="dark" className="flex-1">
                      {panel.primaryLabel}
                    </ButtonLink>
                    {panel.secondaryHref && panel.secondaryLabel && (
                      <a
                        href={panel.secondaryHref}
                        className="inline-flex flex-1 items-center justify-center rounded-full border border-slate-600 bg-slate-900/40 px-4 py-2.5 text-sm font-semibold text-slate-100 shadow-sm hover:border-slate-400 hover:text-white"
                        rel="noopener noreferrer"
                        target="_blank"
                      >
                        {panel.secondaryLabel}
                      </a>
                    )}
                  </div>
                </div>
                <div
                  className="pointer-events-none absolute -right-6 -top-6 hidden h-32 w-32 items-center justify-center rounded-full bg-slate-800/70 text-4xl font-extrabold text-slate-500 ring-2 ring-slate-600/60 sm:flex"
                  aria-hidden="true"
                >
                  {variant}
                </div>
              </div>
            </div>
          </div>
        </Container>
      </Section>

      {showExploreSection && (
        <Section
          id={`error-${variant}-links`}
          className="bg-slate-950 py-14 sm:py-16 lg:py-20"
          ariaLabelledBy={`error-${variant}-links-heading`}
        >
          <Container>
            <header className="mb-8 space-y-2 text-center">
              <p className="text-[11px] font-semibold uppercase tracking-[0.16em] text-slate-400">
                Continue exploring
              </p>
              <h2
                id={`error-${variant}-links-heading`}
                className="text-lg font-semibold text-slate-50 sm:text-xl"
              >
                Popular destinations on the QalbIT website
              </h2>
              <p className="mx-auto max-w-2xl text-xs text-slate-400 sm:text-sm">
                These pages are a good starting point if you are exploring our services
                or looking for technical guidance.
              </p>
            </header>

            <div className="mx-auto grid max-w-3xl gap-4 sm:grid-cols-2">
              {exploreCards.map((card) => (
                <a
                  key={card.href}
                  href={card.href}
                  className="group flex flex-col justify-between rounded-2xl border border-slate-800 bg-slate-900/60 p-4 text-left shadow-lg shadow-slate-950/40 transition hover:border-primary/70 hover:bg-slate-900"
                >
                  <div className="space-y-2">
                    <p className="text-xs font-semibold uppercase tracking-wide text-slate-400">
                      {card.label}
                    </p>
                    <h3 className="text-sm font-semibold text-slate-50">{card.title}</h3>
                    <p className="text-xs text-slate-400">{card.description}</p>
                  </div>
                  <span className="mt-4 inline-flex text-xs font-medium text-primary group-hover:text-primary/90">
                    {card.cta}
                  </span>
                </a>
              ))}
            </div>
          </Container>
        </Section>
      )}
    </>
  );
}
