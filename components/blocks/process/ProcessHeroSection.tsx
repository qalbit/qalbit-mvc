import type { ProcessHeroProps } from "@/lib/blocks/process-mappers";
import { HtmlText } from "@/components/ui";

const DEFAULT_INTERNAL_LINKS = [
  { label: "Explore our services", href: "/services/" },
  { label: "View our work", href: "/portfolio/" },
  { label: "Contact our team", href: "/contact-us/" },
];

const DEFAULT_SNAPSHOT_ITEMS = [
  { label: "Time to MVP", value: "10–12", note: "weeks avg." },
  { label: "Launch success", value: "96%", note: "go live on time" },
  { label: "Stack", value: "Laravel · React · Flutter", note: null },
  {
    label: "Engagement model",
    value: "Prototype sprint → MVP build → Scale-up squad",
    note: "Designed for startup budgets with clear milestones and ownership.",
  },
];

export function ProcessHeroSection({
  id = "mvp-hero",
  breadcrumbLabel,
  kickerPrefix,
  kickerDetail,
  title,
  intro,
  bullets,
  primaryCta,
  secondaryCta,
  internalLinks,
  trust,
  snapshotTitle,
  snapshotItems,
}: ProcessHeroProps) {
  const items =
    snapshotItems.length >= 4 ? snapshotItems.slice(0, 4) : DEFAULT_SNAPSHOT_ITEMS;
  const [metric1, metric2, metric3, engage] = items;
  const links = internalLinks.length ? internalLinks : DEFAULT_INTERNAL_LINKS;

  const ratingLabel = trust?.ratingLabel ?? "5.0/5";
  const ratingText = trust?.ratingText ?? "rating from startup founders";
  const trustSources = trust?.sources ?? ["Clutch", "Upwork", "Google Reviews"];
  const trustLocation =
    trust?.location ??
    "Based in Ahmedabad, India, working with founders in the UK, Europe, Middle East and beyond.";

  return (
    <section
      id={id}
      data-mvp-section="s1"
      className="relative overflow-hidden bg-slate-50 py-8 text-slate-900 sm:py-16 lg:py-20"
    >
      <div className="relative mx-auto max-w-6xl space-y-4 px-4 sm:px-6 md:space-y-10 lg:px-8">
        <nav className="text-xs font-medium text-slate-600" aria-label="Breadcrumb">
          <ol className="flex flex-wrap items-center gap-1">
            <li>
              <a href="/" className="transition-colors hover:text-sky-300">Home</a>
            </li>
            <li className="text-slate-900">/</li>
            <li aria-current="page" className="text-slate-900">{breadcrumbLabel}</li>
          </ol>
        </nav>

        <div className="grid gap-10 lg:grid-cols-[minmax(0,3fr)_minmax(0,2fr)] lg:items-center">
          <div className="space-y-6" data-mvp-hero-el="copy">
            {kickerPrefix && (
              <span
                className="hidden items-center rounded-pill border border-slate-200 bg-white/90 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-muted-foreground shadow-soft md:inline-flex"
              >
                {kickerPrefix}
                {kickerDetail && (
                  <>
                    <span className="ml-2 h-1 w-1 rounded-full bg-sky-400" />
                    <span className="ml-2 opacity-80">{kickerDetail}</span>
                  </>
                )}
              </span>
            )}

            {kickerDetail && (
              <div className="flex justify-center md:hidden md:justify-start">
                <span
                  className="inline-flex items-center rounded-pill border border-slate-200 bg-white/90 px-3 py-1 text-center text-[11px] font-semibold uppercase tracking-[0.14em] text-muted-foreground shadow-soft"
                >
                  {kickerDetail}
                </span>
              </div>
            )}

            <div className="space-y-4">
              <h1 className="text-center text-display-md font-bold md:text-left sm:text-display-lg md:text-display-2xl">
                <HtmlText html={title} />
              </h1>

              {intro && (
                <p className="px-0 text-md font-medium text-slate-600 text-center md:px-4 md:text-left lg:px-2">
                  {intro}
                </p>
              )}

              {bullets.length > 0 && (
                <ul className="space-y-1 text-sm text-slate-600">
                  {bullets.map((bullet) => (
                    <li key={bullet} className="flex gap-2">
                      <span className="mt-1.5 inline-flex h-1.5 w-1.5 flex-none rounded-full bg-primary" />
                      <span>{bullet}</span>
                    </li>
                  ))}
                </ul>
              )}
            </div>

            <div className="flex flex-col items-center gap-2 md:items-start">
              <div className="flex w-full flex-col items-stretch gap-3 md:flex-row md:flex-wrap md:items-center">
                <a
                  href={primaryCta.href}
                  className="btn btn-accent btn-radius-pill"
                  data-mvp-cta="primary"
                  {...(primaryCta.ariaLabel ? { "aria-label": primaryCta.ariaLabel } : {})}
                >
                  {primaryCta.label}
                </a>
                {secondaryCta && (
                  <a
                    href={secondaryCta.href}
                    className="btn btn-primary-outline btn-radius-pill"
                    data-mvp-cta="secondary"
                    {...(secondaryCta.external
                      ? { target: "_blank", rel: "noopener noreferrer" }
                      : {})}
                    {...(secondaryCta.ariaLabel ? { "aria-label": secondaryCta.ariaLabel } : {})}
                  >
                    {secondaryCta.label}
                  </a>
                )}
              </div>
              <p className="text-[11px] text-slate-600">
                Typically responding within <span className="font-semibold">24–48 hours</span>.
              </p>
            </div>

            <p className="pt-1 text-xs text-slate-500 sm:text-sm">
              Looking for something specific?
              {links.map((link, index) => (
                <span key={link.href}>
                  {index > 0 ? ", " : " "}
                  <a href={link.href} className="font-medium text-primary hover:underline">
                    {link.label}
                  </a>
                </span>
              ))}
              .
            </p>

            <div
              className="mt-4 flex flex-wrap items-center gap-4 rounded-2xl bg-white/80 p-4 text-xs text-slate-600 shadow-sm ring-1 ring-slate-200 sm:text-sm"
              data-mvp-hero-el="trust"
            >
              <div className="flex items-center gap-2">
                <div className="flex items-center gap-0.5 text-amber-400" aria-hidden="true">
                  <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                </div>
                <p>
                  <span className="font-semibold text-slate-900">{ratingLabel}</span>
                  <span className="text-slate-500"> {ratingText}</span>
                </p>
              </div>

              <div className="flex flex-wrap items-center gap-3">
                <p className="text-slate-500">
                  Trusted on{" "}
                  {trustSources.map((source, i) => (
                    <span key={source}>
                      <span className="font-medium text-slate-800">{source}</span>
                      {i < trustSources.length - 1 ? "," : "."}
                    </span>
                  ))}
                </p>
              </div>

              <p className="text-xs text-slate-600">{trustLocation}</p>
            </div>
          </div>

          <div
            className="space-y-4 rounded-3xl border border-slate-300 bg-slate-100/70 p-5 backdrop-blur sm:p-6 lg:p-7"
            data-mvp-hero-el="visual"
          >
            <h2 className="text-xs font-semibold uppercase tracking-[0.18em] text-slate-600">
              {snapshotTitle}
            </h2>
            <dl className="grid grid-cols-2 gap-x-6 gap-y-4 text-xs sm:text-sm">
              <div className="space-y-1">
                <dt className="text-slate-500">{metric1.label}</dt>
                <dd className="font-medium text-slate-900">
                  {metric1.value}
                  {metric1.note && (
                    <span className="ml-1 text-[11px] text-slate-500">{metric1.note}</span>
                  )}
                </dd>
              </div>
              <div className="space-y-1">
                <dt className="text-slate-500">{metric2.label}</dt>
                <dd className="font-semibold text-accent-800">
                  {metric2.value}
                  {metric2.note && (
                    <span className="ml-1 text-[11px] text-slate-500">{metric2.note}</span>
                  )}
                </dd>
              </div>
              <div className="space-y-1">
                <dt className="text-slate-500">{metric3.label}</dt>
                <dd className="font-medium text-slate-900">{metric3.value}</dd>
              </div>
              <div className="space-y-1">
                <dt className="text-slate-500">{engage.label}</dt>
                <dd className="font-medium text-slate-900">{engage.value}</dd>
              </div>
            </dl>
            <p className="text-[11px] text-slate-500">
              {engage.note ??
                "Designed for startup budgets with clear milestones, ownership and a clean path from MVP to product scaling."}
            </p>
          </div>
        </div>
      </div>
    </section>
  );
}
