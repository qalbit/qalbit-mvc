"use client";

import { ErrorPageShell } from "./ErrorPageShell";

export interface ServerErrorContentProps {
  onRetry?: () => void;
}

export function ServerErrorContent({ onRetry }: ServerErrorContentProps) {
  return (
    <ErrorPageShell
      variant="500"
      badge="500 – Something went wrong"
      title='Our servers hit an <span class="text-gradient-brand-animated">unexpected error.</span>'
      body="This one is on us. The page you tried to load failed due to an internal error. Our team is notified automatically. Try again or continue browsing the site."
      primaryAction={
        <button
          type="button"
          className="btn btn-primary btn-radius-pill"
          onClick={onRetry ?? (() => window.location.reload())}
        >
          Try again
        </button>
      }
      secondaryCta={{ label: "Back to homepage", href: "/" }}
      links={[
        { label: "Services", href: "/services/" },
        { label: "Industries", href: "/industries/" },
        { label: "Contact us", href: "/contact-us/" },
      ]}
      panel={{
        eyebrow: "QalbIT error monitor",
        title: "We track and respond to production issues quickly.",
        body: "Errors like this are logged with request details so our engineering team can investigate. If this blocks your work, share a short note and we will prioritise a fix.",
        bullets: [
          "Centralised logging and alerts on critical failures.",
          "Root-cause analysis for repeated errors and regressions.",
          "Transparent communication when an issue impacts clients or users.",
        ],
        primaryHref: "/contact-us/",
        primaryLabel: "Report this issue",
        secondaryHref: "https://calendly.com/abidhusain-qalbit/discuss-project",
        secondaryLabel: "Book a call",
      }}
      showExploreSection={false}
    />
  );
}
