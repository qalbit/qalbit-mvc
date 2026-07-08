import Link from "next/link";
import type { TeamCtaSectionProps } from "@/lib/blocks/types";

export function TeamCtaSection({
  id = "home-cta",
  eyebrow = "Assemble your team",
  title,
  subtitle,
  bullets,
  primaryCta = { label: "Schedule a discovery call", href: "/contact-us/" },
  secondaryCta,
  steps,
}: TeamCtaSectionProps) {
  const headingId = "home-cta-heading";

  return (
    <section
      id={id}
      className="bg-slate-950 py-16 text-slate-50"
      aria-labelledby={headingId}
      data-cta-section
      itemScope
      itemType="https://schema.org/HowTo"
    >
      <meta itemProp="name" content="How to hire a custom software development team with QalbIT" />
      <meta
        itemProp="description"
        content="Three simple steps to schedule a discovery call, confirm your team structure and start building your custom software product with QalbIT."
      />

      <div className="mx-auto max-w-6xl px-4">
        <div className="grid gap-10 lg:grid-cols-[minmax(0,1.1fr)_minmax(0,1.6fr)] lg:items-center">
          <header className="max-w-xl space-y-4">
            <span
              className="inline-flex items-center rounded-full border border-slate-700 bg-slate-900/80 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-slate-300 shadow-soft"
            >
              {eyebrow}
            </span>
            <h2
              id={headingId}
              className="text-display-sm font-bold tracking-tight sm:text-display-md"
              itemProp="name"
            >
              {title}
            </h2>
            {subtitle && <p className="text-sm text-slate-300 md:text-base">{subtitle}</p>}
            {bullets && bullets.length > 0 && (
              <ul className="mt-4 space-y-2 text-xs text-slate-300/95 md:text-sm">
                {bullets.map((item, index) => (
                  <li key={item}>
                    ✓ {index === 0 ? <span itemProp="supply">{item}</span> : item}
                  </li>
                ))}
              </ul>
            )}
            <div className="mt-6 flex flex-wrap items-center gap-3">
              <Link
                href={primaryCta.href}
                className="btn btn-primary btn-radius-pill"
                title="Schedule a discovery call with QalbIT"
                aria-label={primaryCta.ariaLabel ?? primaryCta.label}
                itemProp="url"
              >
                {primaryCta.label}
              </Link>
              {secondaryCta && (
                <a
                  href={secondaryCta.href}
                  className="inline-flex items-center text-xs font-medium text-slate-200 underline-offset-2 hover:text-white/90 hover:underline md:text-sm"
                >
                  {secondaryCta.label}
                </a>
              )}
            </div>
          </header>

          <div className="relative lg:pl-4">
            <div
              className="pointer-events-none absolute inset-x-4 top-7 hidden md:block"
              aria-hidden="true"
            >
              <div
                className="h-px w-full origin-left scale-x-0 bg-gradient-to-r from-slate-700 via-slate-500 to-slate-700"
                data-cta-connector
              />
            </div>

            <ol className="relative grid gap-5 md:grid-cols-3" data-cta-steps>
              {steps.map((step, index) => (
                <li
                  key={step.step}
                  className="cta-step-card"
                  data-cta-step
                  data-cta-step-index={String(index)}
                  itemScope
                  itemProp="step"
                  itemType="https://schema.org/HowToStep"
                >
                  <meta itemProp="position" content={String(step.step)} />
                  <div className="mb-3 flex items-center gap-3">
                    {step.iconSrc && (
                      <div className="step-icon-wrapper">
                        <img
                          src={step.iconSrc}
                          alt={step.iconAlt ?? ""}
                          loading="lazy"
                          decoding="async"
                          className="h-9 w-9 object-contain"
                        />
                      </div>
                    )}
                    <span className="step-badge">Step {step.step}</span>
                  </div>
                  <h3 className="step-title" itemProp="name">{step.title}</h3>
                  {step.body && (
                    <p className="step-text" itemProp="text">{step.body}</p>
                  )}
                  {step.bullets && step.bullets.length > 0 && (
                    <ul className="step-list">
                      {step.bullets.map((item) => (
                        <li key={item}>{item}</li>
                      ))}
                    </ul>
                  )}
                </li>
              ))}
            </ol>
          </div>
        </div>
      </div>
    </section>
  );
}
