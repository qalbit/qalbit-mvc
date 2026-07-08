"use client";

import { ErrorPageShell } from "./ErrorPageShell";

export interface ServiceUnavailableContentProps {
  onRetry?: () => void;
}

export function ServiceUnavailableContent({ onRetry }: ServiceUnavailableContentProps) {
  return (
    <ErrorPageShell
      variant="503"
      badge="503 – Service unavailable"
      title='We&apos;re performing a quick <span class="text-gradient-brand-animated">maintenance update.</span>'
      body="QalbIT is temporarily unavailable while we deploy improvements or complete scheduled maintenance. This usually takes only a few minutes. Please try again shortly."
      primaryAction={
        onRetry ? (
          <button type="button" className="btn btn-primary btn-radius-pill" onClick={onRetry}>
            Try again
          </button>
        ) : (
          <button
            type="button"
            className="btn btn-primary btn-radius-pill"
            onClick={() => window.location.reload()}
          >
            Try again
          </button>
        )
      }
      secondaryCta={{ label: "Contact support", href: "/contact-us/" }}
      links={[
        { label: "Services", href: "/services/" },
        { label: "Contact us", href: "/contact-us/" },
        { label: "About QalbIT", href: "/about-us/" },
      ]}
      panel={{
        eyebrow: "Scheduled maintenance",
        title: "We will be back online shortly.",
        body: "Our team deploys updates with zero-downtime where possible. If you have an urgent enquiry, reach out directly and we will respond as soon as we are back.",
        bullets: [
          "Routine platform and security updates.",
          "Performance improvements to the public site.",
          "Transparent status updates for active client projects.",
        ],
        primaryHref: "mailto:sales@qalbit.com",
        primaryLabel: "Email sales@qalbit.com",
        secondaryHref: "https://calendly.com/abidhusain-qalbit/discuss-project",
        secondaryLabel: "Book call",
      }}
      showExploreSection={false}
    />
  );
}
