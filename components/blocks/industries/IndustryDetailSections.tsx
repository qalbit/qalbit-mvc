import Link from "next/link";
import { ButtonLink, HtmlText } from "@/components/ui";
import { asset } from "@/lib/site";
import type {
  IndustryCapabilitiesProps,
  IndustryCtaProps,
  IndustryHeroProps,
  IndustryOverviewProps,
  IndustryProcessProps,
  IndustryTechStackProps,
  IndustryUseCasesProps,
} from "@/lib/blocks/industry-mappers";

export function IndustryHeroSection(props: IndustryHeroProps) {
  const {
    breadcrumbLabel,
    kickerPrefix,
    kickerLabel,
    kickerDetail,
    title,
    intro,
    primaryCta,
    secondaryCta,
    snapshotTitle,
    snapshot,
  } = props;

  return (
    <section
      className="relative overflow-hidden bg-slate-50 py-8 text-slate-900 sm:py-20 lg:py-24"
      data-section-industry-hero
    >
      <div className="relative mx-auto max-w-6xl space-y-4 px-4 sm:px-6 md:space-y-10 lg:px-8">
        <nav className="text-xs font-medium text-slate-600" aria-label="Breadcrumb">
          <ol className="flex flex-wrap items-center gap-1">
            <li>
              <Link href="/" className="transition-colors hover:text-sky-500">Home</Link>
            </li>
            <li className="text-slate-400">/</li>
            <li>
              <Link href="/industries/" className="transition-colors hover:text-sky-500">Industries</Link>
            </li>
            <li className="text-slate-400">/</li>
            <li aria-current="page" className="text-slate-900">{breadcrumbLabel}</li>
          </ol>
        </nav>

        <div className="grid gap-10 lg:grid-cols-[minmax(0,3fr)_minmax(0,2fr)] lg:items-center">
          <div className="space-y-6" data-hero-el>
            <span
              className="hidden items-center rounded-pill border border-slate-200 bg-white/90 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-muted-foreground shadow-soft md:inline-flex"
            >
              <span className="inline-flex items-center gap-2">
                <span>{kickerPrefix}</span>
                <span className="h-1 w-1 rounded-full bg-sky-400" />
                <span className="opacity-80">{kickerLabel}</span>
              </span>
            </span>

            <div className="flex justify-center md:hidden md:justify-start">
              <span
                className="inline-flex items-center rounded-pill border border-slate-200 bg-white/90 px-3 py-1 text-center text-[11px] font-semibold uppercase tracking-[0.14em] text-muted-foreground shadow-soft"
              >
                {kickerLabel}
              </span>
            </div>

            <h1 className="text-center text-display-md font-bold sm:text-display-lg md:text-left md:text-display-2xl">
              <HtmlText html={title} />
            </h1>

            <p className="px-0 text-center text-md font-medium text-slate-600 md:px-4 md:text-left lg:px-2">
              {intro}
            </p>

            {kickerDetail && (
              <p className="text-center text-xs text-slate-500 md:text-left">{kickerDetail}</p>
            )}

            <div className="flex flex-col items-center gap-2 md:items-start">
              <div className="flex w-full flex-col items-stretch gap-3 md:flex-row md:flex-wrap md:items-center">
                <ButtonLink href={primaryCta.href} variant="dark">{primaryCta.label}</ButtonLink>
                <ButtonLink
                  href={secondaryCta.href}
                  variant="primary-outline"
                  external={secondaryCta.external}
                >
                  {secondaryCta.label}
                </ButtonLink>
              </div>
              <p className="mt-1 text-[11px] text-slate-600">
                Typically responding within <span className="font-semibold">24–48 hours</span>.
                Share your current tech stack, product stage and timelines.
              </p>
            </div>
          </div>

          <aside
            className="space-y-4 rounded-3xl border border-slate-300 bg-slate-100/70 p-5 backdrop-blur sm:p-6 lg:p-7"
            data-hero-el
          >
            <h2 className="text-xs font-semibold uppercase tracking-[0.18em] text-slate-600">
              {snapshotTitle}
            </h2>
            <dl className="grid grid-cols-2 gap-x-6 gap-y-4 text-xs sm:text-sm">
              {snapshot.map((row) => (
                <div key={row.label} className="space-y-1">
                  <dt className="text-slate-500">{row.label}</dt>
                  <dd className="font-medium text-slate-900">{row.value}</dd>
                </div>
              ))}
            </dl>
            <p className="text-[11px] text-slate-500">
              We start with a short review of your goals, constraints and existing systems, then recommend
              a practical, future-proof tech stack rather than a one-size-fits-all choice.
            </p>
          </aside>
        </div>
      </div>
    </section>
  );
}

export function IndustryOverviewSection({
  id,
  eyebrow,
  title,
  intro,
  leftTitle,
  leftItems,
  rightTitle,
  rightItems,
  note,
}: IndustryOverviewProps) {
  return (
    <section
      id={id}
      className="border-t border-slate-100 bg-white py-14 sm:py-18 lg:py-20"
      aria-labelledby="industry-overview-heading"
      data-section-industry-overview
    >
      <div className="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <header className="mb-10 max-w-3xl space-y-3">
          <p className="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">{eyebrow}</p>
          <h2
            id="industry-overview-heading"
            className="text-display-md font-bold text-slate-900 sm:text-display-lg md:text-display-xl"
          >
            {title}
          </h2>
          <p className="text-sm text-slate-600 sm:text-base">{intro}</p>
        </header>

        <div className="grid gap-8 md:grid-cols-2" data-industry-overview-columns>
          <article className="space-y-3" data-industry-overview-left>
            <h3 className="text-sm font-semibold text-slate-900 sm:text-base">{leftTitle}</h3>
            <ul className="space-y-2 text-xs text-slate-700 sm:text-sm">
              {leftItems.map((item) => (
                <li key={item} className="flex gap-2">
                  <span className="mt-1 h-1.5 w-1.5 flex-none rounded-full bg-sky-500" />
                  <span>{item}</span>
                </li>
              ))}
            </ul>
          </article>

          <article className="space-y-3" data-industry-overview-right>
            <h3 className="text-sm font-semibold text-slate-900 sm:text-base">{rightTitle}</h3>
            <ul className="space-y-2 text-xs text-slate-700 sm:text-sm">
              {rightItems.map((item) => (
                <li key={item} className="flex gap-2">
                  <span className="mt-1 h-1.5 w-1.5 flex-none rounded-full bg-emerald-500" />
                  <span>{item}</span>
                </li>
              ))}
            </ul>
          </article>
        </div>

        {note && <p className="mt-8 max-w-3xl text-[11px] text-slate-500">{note}</p>}
      </div>
    </section>
  );
}

export function IndustryCapabilitiesSection({
  id,
  eyebrow,
  title,
  intro,
  items,
  cta,
}: IndustryCapabilitiesProps) {
  return (
    <section
      id={id}
      className="border-t border-slate-100 bg-slate-950 py-16 sm:py-20 lg:py-24"
      aria-labelledby="industry-capabilities-heading"
      data-section-industry-capabilities
    >
      <div className="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <header className="mb-10 max-w-3xl space-y-3">
          <p className="text-[11px] font-semibold uppercase tracking-[0.18em] text-sky-300">{eyebrow}</p>
          <h2
            id="industry-capabilities-heading"
            className="text-display-md font-bold text-slate-50 sm:text-display-lg md:text-display-xl"
          >
            {title}
          </h2>
          <p className="text-sm text-slate-300 sm:text-base">{intro}</p>
        </header>

        <div className="grid gap-6 sm:gap-7 md:grid-cols-2 lg:grid-cols-3" data-industry-capabilities-grid>
          {items.map((item) => {
            const iconSrc = item.icon ? asset(item.icon.replace(/^\//, "")) : null;
            return (
              <article
                key={item.label}
                className="group relative flex flex-col rounded-2xl border border-slate-800/80 bg-slate-900/70 p-5 shadow-sm shadow-black/20 transition-colors hover:border-sky-500/60 hover:bg-slate-900/90 sm:p-6 lg:p-7"
                data-industry-capability-card
              >
                <div className="mb-4 flex items-start justify-between gap-3">
                  <div className="space-y-1.5">
                    <h3 className="text-sm font-semibold text-slate-50 group-hover:text-sky-300 sm:text-base">
                      {item.label}
                    </h3>
                    {item.badge && (
                      <p className="inline-flex items-center rounded-full bg-slate-800/80 px-2.5 py-0.5 text-[11px] font-medium uppercase tracking-[0.18em] text-slate-300">
                        <span className="mr-1.5 h-1.5 w-1.5 rounded-full bg-sky-400" />
                        {item.badge}
                      </p>
                    )}
                  </div>
                  {iconSrc && (
                    <div className="flex-none">
                      <img
                        src={iconSrc}
                        alt={item.label}
                        loading="lazy"
                        width={40}
                        height={40}
                        className="h-10 w-10 object-contain sm:h-11 sm:w-11"
                      />
                    </div>
                  )}
                </div>
                {item.description && (
                  <p className="flex-1 text-xs text-slate-200 sm:text-sm">{item.description}</p>
                )}
              </article>
            );
          })}
        </div>

        {cta && (
          <div className="mt-10 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <p className="max-w-md text-[11px] text-slate-400">
              Want to see how these capabilities map to your product? Share a quick overview and we will
              respond with a practical next step.
            </p>
            <Link
              href={cta.href}
              className="inline-flex items-center justify-center rounded-full border border-sky-400/70 bg-sky-500/10 px-4 py-2 text-xs font-semibold text-sky-100 transition-colors hover:bg-sky-500/20"
            >
              {cta.label}
              <span className="ml-1.5 inline-block translate-y-px">→</span>
            </Link>
          </div>
        )}
      </div>
    </section>
  );
}

export function IndustryProcessSection({
  id,
  eyebrow,
  title,
  intro,
  steps,
  cta,
}: IndustryProcessProps) {
  return (
    <section
      id={id}
      className="border-t border-slate-100 bg-slate-50 py-16 sm:py-20 lg:py-24"
      aria-labelledby="industry-process-heading"
      data-section-industry-process
      itemScope
      itemType="https://schema.org/HowTo"
    >
      <div className="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <header className="mb-10 max-w-3xl space-y-3">
          <p className="text-[11px] font-semibold uppercase tracking-[0.18em] text-sky-700">{eyebrow}</p>
          <h2
            id="industry-process-heading"
            className="text-display-md font-bold text-slate-900 sm:text-display-lg md:text-display-xl"
            itemProp="name"
          >
            {title}
          </h2>
          <p className="text-sm text-slate-600 sm:text-base" itemProp="description">{intro}</p>
        </header>

        <ol className="space-y-5 sm:space-y-6" data-industry-process-steps>
          {steps.map((step) => {
            const iconSrc = step.icon ? asset(step.icon.replace(/^\//, "")) : null;
            return (
              <li
                key={step.step}
                className="group rounded-2xl border border-slate-200 bg-white px-4 py-4 shadow-sm transition-colors hover:border-sky-300 hover:shadow-md sm:px-6 sm:py-5 lg:px-7 lg:py-6"
                data-industry-process-step
                itemScope
                itemProp="step"
                itemType="https://schema.org/HowToStep"
              >
                <meta itemProp="position" content={String(step.step)} />
                <div className="flex items-start gap-4">
                  <div className="flex-none">
                    <div className="flex h-8 w-8 items-center justify-center rounded-full bg-sky-600 text-xs font-semibold text-white">
                      {String(step.step).padStart(2, "0")}
                    </div>
                  </div>
                  <div className="flex-1 space-y-2">
                    <div className="flex items-start justify-between gap-3">
                      <div>
                        <h3
                          className="text-sm font-semibold text-slate-900 group-hover:text-sky-700 sm:text-base"
                          itemProp="name"
                        >
                          {step.title}
                        </h3>
                        {step.duration && (
                          <p className="mt-0.5 text-[11px] font-medium uppercase tracking-[0.16em] text-slate-500">
                            {step.duration}
                          </p>
                        )}
                      </div>
                      {iconSrc && (
                        <div className="flex-none">
                          <img
                            src={iconSrc}
                            alt={step.title}
                            loading="lazy"
                            width={36}
                            height={36}
                            className="h-9 w-9 object-contain"
                          />
                        </div>
                      )}
                    </div>
                    {step.description && (
                      <p className="text-xs text-slate-700 sm:text-sm" itemProp="text">{step.description}</p>
                    )}
                    {step.outcome && (
                      <p className="text-[11px] text-slate-500">
                        <span className="font-semibold">Key outcome:</span> {step.outcome}
                      </p>
                    )}
                  </div>
                </div>
              </li>
            );
          })}
        </ol>

        {cta && (
          <div className="mt-10 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <p className="max-w-md text-[11px] text-slate-500">
              Want to see how this process applies to your current stage? Share a short brief and we will
              respond with a tailored next step.
            </p>
            <Link
              href={cta.href}
              className="inline-flex items-center justify-center rounded-full border border-sky-600/80 bg-sky-600 px-4 py-2 text-xs font-semibold text-white transition-colors hover:bg-sky-700"
            >
              {cta.label}
              <span className="ml-1.5 inline-block translate-y-px">→</span>
            </Link>
          </div>
        )}
      </div>
    </section>
  );
}

export function IndustryUseCasesSection({
  id,
  eyebrow,
  title,
  intro,
  items,
  cta,
}: IndustryUseCasesProps) {
  return (
    <section
      id={id}
      className="border-t border-slate-100 bg-white py-16 sm:py-20 lg:py-24"
      aria-labelledby="industry-use-cases-heading"
      data-section-industry-use-cases
      itemScope
      itemType="https://schema.org/ItemList"
    >
      <div className="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <header className="mb-10 max-w-3xl space-y-3">
          <p className="text-[11px] font-semibold uppercase tracking-[0.18em] text-sky-700">{eyebrow}</p>
          <h2
            id="industry-use-cases-heading"
            className="text-display-md font-bold text-slate-900 sm:text-display-lg md:text-display-xl"
            itemProp="name"
          >
            {title}
          </h2>
          <p className="text-sm text-slate-600 sm:text-base">{intro}</p>
        </header>

        <div className="grid gap-6 md:grid-cols-2" data-industry-use-cases-grid>
          {items.map((item, index) => (
            <article
              key={item.label}
              className="group flex flex-col rounded-2xl border border-slate-200 bg-slate-50 px-4 py-4 shadow-sm transition-colors hover:border-sky-300 hover:bg-white hover:shadow-md sm:px-6 sm:py-5 lg:px-7 lg:py-6"
              itemScope
              itemProp="itemListElement"
              itemType="https://schema.org/Thing"
            >
              <meta itemProp="position" content={String(index + 1)} />
              <div className="mb-3 flex items-start justify-between gap-3">
                <div>
                  <h3
                    className="text-sm font-semibold text-slate-900 group-hover:text-sky-700 sm:text-base"
                    itemProp="name"
                  >
                    {item.label}
                  </h3>
                  {item.audience && (
                    <p className="mt-0.5 text-[11px] font-medium uppercase tracking-[0.16em] text-slate-500">
                      For {item.audience}
                    </p>
                  )}
                </div>
                {item.badge && (
                  <span className="inline-flex items-center whitespace-nowrap rounded-full border border-sky-100 bg-sky-50 px-2 py-0.5 text-[11px] font-semibold text-sky-700">
                    {item.badge}
                  </span>
                )}
              </div>
              {item.description && (
                <p className="mb-3 text-xs text-slate-700 sm:text-sm" itemProp="description">
                  {item.description}
                </p>
              )}
              {item.link && (
                <div className="mt-auto pt-2">
                  <Link
                    href={item.link.href}
                    className="inline-flex items-center text-xs font-semibold text-sky-700 hover:text-sky-600"
                  >
                    {item.link.label}
                    <span className="ml-1 inline-block translate-y-px">→</span>
                  </Link>
                </div>
              )}
            </article>
          ))}
        </div>

        {cta && (
          <div className="mt-10 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <p className="max-w-md text-[11px] text-slate-500">
              Not sure if your idea or system belongs here? Send us a short description and we will tell
              you honestly whether we are the right team for it.
            </p>
            <Link
              href={cta.href}
              className="inline-flex items-center justify-center rounded-full border border-sky-600/80 bg-sky-600 px-4 py-2 text-xs font-semibold text-white transition-colors hover:bg-sky-700"
            >
              {cta.label}
              <span className="ml-1.5 inline-block translate-y-px">→</span>
            </Link>
          </div>
        )}
      </div>
    </section>
  );
}

export function IndustryTechStackSection({
  id,
  eyebrow,
  title,
  intro,
  note,
  categories,
}: IndustryTechStackProps) {
  return (
    <section
      id={id}
      className="border-t border-slate-100 bg-slate-950 py-16 text-slate-50 sm:py-20 lg:py-24"
      aria-labelledby="industry-tech-stack-heading"
      data-section-industry-tech-stack
      itemScope
      itemType="https://schema.org/ItemList"
    >
      <div className="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <header className="mb-10 max-w-3xl space-y-3">
          <p className="text-[11px] font-semibold uppercase tracking-[0.18em] text-sky-300">{eyebrow}</p>
          <h2
            id="industry-tech-stack-heading"
            className="text-display-md font-bold text-slate-50 sm:text-display-lg md:text-display-xl"
            itemProp="name"
          >
            {title}
          </h2>
          <p className="text-sm text-slate-300 sm:text-base">{intro}</p>
        </header>

        <div className="grid gap-6 md:grid-cols-2" data-industry-tech-stack-grid>
          {categories.map((category, index) => (
            <article
              key={category.name}
              className="flex flex-col rounded-2xl border border-slate-800 bg-slate-900/70 px-4 py-4 shadow-sm shadow-black/30 sm:px-6 sm:py-5 lg:px-7 lg:py-6"
              itemScope
              itemProp="itemListElement"
              itemType="https://schema.org/Thing"
            >
              <meta itemProp="position" content={String(index + 1)} />
              <h3 className="mb-2 text-sm font-semibold text-slate-50 sm:text-base" itemProp="name">
                {category.name}
              </h3>
              {category.description && (
                <p className="mb-3 text-xs text-slate-300 sm:text-sm" itemProp="description">
                  {category.description}
                </p>
              )}
              {category.items.length > 0 && (
                <ul className="space-y-1.5 text-xs text-slate-200 sm:text-sm">
                  {category.items.map((tool) => (
                    <li key={tool} className="flex gap-2">
                      <span className="mt-2 h-1.5 w-1.5 flex-none rounded-full bg-sky-400" />
                      <span>{tool}</span>
                    </li>
                  ))}
                </ul>
              )}
            </article>
          ))}
        </div>

        {note && <p className="mt-8 max-w-3xl text-[11px] text-slate-400">{note}</p>}
      </div>
    </section>
  );
}

export function IndustryCtaSection({ eyebrow, title, body, primary, secondary, meta }: IndustryCtaProps) {
  return (
    <section className="relative overflow-hidden bg-slate-950 py-16 sm:py-20 lg:py-24" data-section="industry-cta">
      <div
        className="pointer-events-none absolute inset-x-0 -top-32 h-64 bg-gradient-to-b from-sky-500/10 via-sky-500/0 to-transparent"
        aria-hidden="true"
      />

      <div className="relative mx-auto max-w-5xl px-4 text-center sm:px-6 lg:px-8">
        <p className="mb-3 inline-flex items-center rounded-full border border-sky-500/30 bg-sky-500/5 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.18em] text-sky-300">
          <span className="mr-2 h-1.5 w-1.5 rounded-full bg-sky-400" />
          {eyebrow}
        </p>

        <h2 className="mb-4 text-display-md font-bold text-slate-50 sm:text-display-lg md:text-display-xl">
          {title}
        </h2>

        <p className="mx-auto mb-8 max-w-2xl text-sm text-slate-300 sm:text-base">{body}</p>

        <div className="flex flex-col items-center justify-center gap-3 sm:flex-row sm:gap-4">
          <ButtonLink href={primary.href} variant="dark" ariaLabel={primary.ariaLabel}>
            {primary.label}
          </ButtonLink>
          {secondary && (
            <ButtonLink
              href={secondary.href}
              variant="primary-outline"
              ariaLabel={secondary.ariaLabel}
              className="text-sky-200 border-sky-500/50 hover:bg-slate-900"
            >
              {secondary.label}
            </ButtonLink>
          )}
        </div>

        {meta && <p className="mt-4 text-[11px] text-slate-400">{meta}</p>}
      </div>
    </section>
  );
}
