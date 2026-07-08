import { ErrorPageShell } from "./ErrorPageShell";
import type { NotFoundContentProps } from "@/lib/blocks/types";

const defaultLinks = [
  { label: "Services", href: "/services/" },
  { label: "Industries", href: "/industries/" },
  { label: "About QalbIT", href: "/about-us/" },
  { label: "Insights & blog", href: "/blog/" },
];

export function NotFoundContent({
  title = 'This page has moved or <span class="text-gradient-brand-animated">no longer exists.</span>',
  body = "The URL you tried to access is not available. It may have been updated, moved to a new location, or removed during a recent website refresh. You can head back to the homepage or explore one of the sections below.",
  primaryCta = { label: "Back to homepage", href: "/" },
  secondaryCta = { label: "Talk to our team", href: "/contact-us/" },
  links = defaultLinks,
}: NotFoundContentProps) {
  return (
    <ErrorPageShell
      variant="404"
      badge="404 – Page not found"
      title={title}
      body={body}
      primaryAction={
        <a
          href={primaryCta.href}
          className="btn btn-primary btn-radius-pill"
          aria-label={primaryCta.ariaLabel}
        >
          {primaryCta.label}
        </a>
      }
      secondaryCta={secondaryCta}
      links={links}
      panel={{
        eyebrow: "Need help finding something?",
        title: "Get hands-on support from QalbIT's engineering team.",
        body: "Share what you were trying to do and we will point you to the right product, case study or engagement model — or schedule a quick discovery call.",
        bullets: [
          "Clarify which service or solution best fits your roadmap.",
          "Review similar projects we've shipped for startups and teams like yours.",
          "Get a high-level technical approach or ballpark estimate.",
        ],
        primaryHref: "/contact-us/",
        primaryLabel: "Contact QalbIT",
        secondaryHref: "https://calendly.com/abidhusain-qalbit/discuss-project",
        secondaryLabel: "Book call",
      }}
      showExploreSection
    />
  );
}
