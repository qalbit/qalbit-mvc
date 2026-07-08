import Link from "next/link";
import { services } from "@/lib/data";
import type { ConfigEntity } from "@/lib/data";
import { asset } from "@/lib/site";

type ServiceEntity = ConfigEntity & {
  category?: string;
  listing?: { bullets?: string[] };
};

const PRIMARY_LINKS = [
  { label: "Engagement Models", href: "/engagement-model/", meta: "Delivery options" },
  { label: "Technologies we use", href: "/technologies/", meta: "Our tech stack" },
  { label: "Industry solutions", href: "/industries/", meta: "Use cases" },
  { label: "View case studies", href: "/portfolio/", meta: "Proof & outcomes" },
  { label: "Get free estimation", href: "/contact-us/", meta: "Talk to us" },
  { label: "Start-Up MVP", href: "/start-up-mvp/", meta: "Launch roadmap" },
] as const;

const POPULAR_SERVICES = [
  { label: "Custom Software Development", href: "/services/custom-software-development/", meta: "Web, mobile & cloud systems" },
  { label: "Custom Web Development", href: "/services/custom-web-development/", meta: "Web apps & platforms" },
  { label: "Mobile App Development", href: "/services/mobile-development/", meta: "iOS & Android apps" },
  { label: "SaaS Application Development", href: "/services/saas/", meta: "Multi-tenant SaaS builds" },
  { label: "E-Commerce Solutions", href: "/services/e-commerce/", meta: "Stores & marketplaces" },
  { label: "API Development", href: "/services/api-development/", meta: "Secure scalable APIs" },
  { label: "Cloud-based Solutions", href: "/services/cloud-based-solutions/", meta: "Cloud infra & scaling" },
  { label: "Payment Gateway Services", href: "/services/payment-gateway-services/", meta: "Integrations & compliance" },
] as const;

const CATEGORY_MAP: Record<string, string> = {
  core: "Core service",
  support: "Support service",
  ai: "AI & automation",
};

const ENGAGEMENT_MODELS = [
  {
    title: "Fixed-scope projects",
    intro: "Best when requirements are clear and we can estimate precisely.",
    bullets: [
      "Clearly defined scope, milestones and deliverables.",
      "Predictable budget with upfront estimates.",
      "Ideal for MVPs and discrete feature releases.",
    ],
    note: "Works well when we have good documentation, visual references or can run a short discovery to lock requirements.",
  },
  {
    title: "Dedicated product squad",
    intro: "A cross-functional team that behaves like your in-house product team.",
    bullets: [
      "Stable team for long-term ownership and roadmaps.",
      "Capacity planned monthly with clear velocity.",
      "Founder involvement on architecture and key decisions.",
    ],
    note: "Ideal when software is core to your business and you need a reliable, senior team without adding full-time headcount immediately.",
  },
  {
    title: "Time & material / Agile",
    intro: "Ideal for ongoing iterations, R&D and integrations.",
    bullets: [
      "Pay for actual engineering and design time used.",
      "Flexible backlog and scope, prioritised every sprint.",
      "Perfect for experiments and proof-of-concepts.",
    ],
    note: "Works well once we have an established relationship and steady flow of work where agility matters more than fixed scope.",
  },
] as const;

const PROCESS_STEPS = [
  {
    step: "Step 01",
    title: "Discover & align",
    description:
      "We understand your goals, users, constraints and existing systems so we solve the right problem.",
  },
  {
    step: "Step 02",
    title: "Plan architecture & UX",
    description:
      "We design flows, choose the stack and outline technical approach, timelines and responsibilities.",
  },
  {
    step: "Step 03",
    title: "Build & iterate",
    description:
      "We ship in small increments, review frequently and keep you involved via demos and async updates.",
  },
  {
    step: "Step 04",
    title: "Test, harden & launch",
    description: "We test, fix edge cases, harden security and support you through rollout and handover.",
  },
  {
    step: "Step 05",
    title: "Support & grow",
    description:
      "We monitor, maintain and evolve your product with new features and performance improvements.",
  },
] as const;

const INDUSTRY_TAGS = [
  "SaaS & B2B platforms",
  "Startups & scale-ups",
  "Healthcare & wellness",
  "E-commerce & marketplaces",
  "FinTech & payment flows",
  "Logistics & on-demand services",
  "Agencies & IT partners",
  "Education & training",
] as const;

const CASE_TEASERS = [
  {
    title: "Multi-tenant SaaS for distributed operations",
    description:
      "Designed and built a SaaS platform to manage multi-location operations, billing and reporting under one secure, centralised system.",
    result: "Result: reduced manual work, better visibility and faster onboarding for new locations.",
  },
  {
    title: "Booking & quoting app for service businesses",
    description:
      "Built a mobile-first booking and quotation platform that automates scheduling, reminders and payments for on-site services.",
    result: "Result: more online bookings, fewer no-shows and clearer visibility into daily operations.",
  },
  {
    title: "Custom dashboards & ERP extensions",
    description:
      "Extended existing ERP with custom modules and dashboards tailored to a trading and distribution business.",
    result: "Result: better decision-making with real-time data and reduced spreadsheet chaos.",
  },
] as const;

function entityHref(slug: string): string {
  const normalized = slug.startsWith("/") ? slug : `/${slug}`;
  return normalized.endsWith("/") ? normalized : `${normalized}/`;
}

function getEnabledServices(): ServiceEntity[] {
  return (services as ServiceEntity[])
    .filter((s) => s.enabled)
    .sort((a, b) => (a.order ?? 999) - (b.order ?? 999));
}

export function ServicesFeaturedLinks() {
  const hubCardClass =
    "group relative rounded-full border border-slate-200 bg-white/90 py-3 pl-6 pr-4 shadow-soft transition hover:border-sky-300/70 hover:bg-white";
  const serviceCardClass =
    "group relative rounded-sm border border-slate-200 bg-white/90 px-4 py-3 shadow-soft transition hover:border-sky-300/70 hover:bg-white";

  return (
    <section className="bg-slate-50 pb-10 sm:pb-12" data-services-featured-links>
      <div className="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <div className="border-t border-slate-200/70 pt-10">
          <div className="space-y-3">
            <span
              className="inline-flex items-center rounded-pill border border-slate-200 bg-white/90 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-muted-foreground shadow-soft"
            >
              Featured links
              <span className="ml-2 h-1 w-1 rounded-full bg-sky-400" />
              <span className="ml-2 opacity-80">Quick navigation</span>
            </span>

            <h2 className="text-display-sm font-bold text-slate-900 sm:text-display-md">
              Explore our services, tech stack, and results
            </h2>

            <p className="max-w-2xl text-xs text-slate-600 sm:text-sm">
              Jump to key hubs, see proof in our case studies, or open a quick discussion for an estimate.
            </p>
          </div>

          <div className="mt-6 grid gap-2 sm:grid-cols-2 lg:grid-cols-4">
            {PRIMARY_LINKS.map((item) => (
              <Link key={item.href} href={item.href} className={hubCardClass}>
                <div className="flex items-start justify-between gap-3">
                  <div>
                    <div className="text-xs font-semibold text-slate-900 transition-colors group-hover:text-sky-700">
                      {item.label}
                    </div>
                    <div className="mt-0.5 text-[11px] leading-2 text-slate-600">{item.meta}</div>
                  </div>
                  <span
                    className="inline-flex h-9 w-9 items-center justify-center rounded-2xl bg-slate-100 text-slate-400 transition-colors group-hover:bg-sky-50 group-hover:text-sky-600"
                  >
                    →
                  </span>
                </div>
              </Link>
            ))}
          </div>

          <div className="mt-8">
            <div className="flex items-center justify-between gap-4">
              <h3 className="text-xs font-semibold uppercase tracking-[0.16em] text-slate-700">
                Popular technologies
              </h3>
              <p className="text-[12px] text-slate-500">These pages connect back to services and case studies.</p>
            </div>

            <div className="mt-4 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
              {POPULAR_SERVICES.map((item) => (
                <Link key={item.href} href={item.href} className={serviceCardClass}>
                  <div className="flex items-start justify-between gap-3">
                    <div className="flex gap-2">
                      <span className="mt-1 h-1.5 w-1.5 flex-none rounded-full bg-sky-400" />
                      <div>
                        <div className="text-xs font-semibold text-slate-900 transition-colors group-hover:text-sky-700">
                          {item.label}
                        </div>
                        <div className="mt-0.5 text-[11px] leading-2 text-slate-600">{item.meta}</div>
                      </div>
                    </div>
                    <span className="text-slate-300 transition-colors group-hover:text-sky-300">→</span>
                  </div>
                </Link>
              ))}
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}

export function ServicesGridSection() {
  const serviceList = getEnabledServices();

  return (
    <section
      className="border-t border-slate-50 bg-slate-950 py-16 sm:py-20 lg:py-24"
      data-animate="services-grid"
      itemScope
      itemType="https://schema.org/ItemList"
    >
      <meta itemProp="name" content="Software development services at a glance" />
      <meta itemProp="itemListOrder" content="https://schema.org/ItemListOrderAscending" />

      <div className="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <div className="mb-10 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
          <div className="max-w-xl space-y-3">
            <h2 className="text-center text-display-md font-bold text-slate-50 sm:text-display-lg md:text-left md:text-display-xl">
              Software development services at a glance
            </h2>
            <p className="text-sm text-slate-300 sm:text-base">
              From MVPs to long-term platforms, combine our core and specialised services to design, build
              and grow products that match how your business really works.
            </p>
          </div>
          <p className="max-w-sm text-xs text-slate-400">
            Each service can be engaged standalone or bundled into a roadmap – with one team responsible
            end-to-end across web, mobile, cloud and integrations.
          </p>
        </div>

        {serviceList.length > 0 ? (
          <div className="grid gap-6 sm:gap-7 md:grid-cols-2 lg:grid-cols-3" data-service-cards>
            {serviceList.map((service, index) => {
              const href = entityHref(service.slug);
              const categoryLabel = service.category ? CATEGORY_MAP[service.category] ?? service.category : "";
              const bullets = service.listing?.bullets ?? [];
              const iconSrc = service.icon ? asset(service.icon.replace(/^\//, "")) : null;

              return (
                <article
                  key={service.slug}
                  className="group relative flex flex-col rounded-2xl border border-slate-800/80 bg-slate-900/70 p-5 shadow-sm shadow-black/20 transition-colors hover:border-sky-500/60 hover:bg-slate-900/90 sm:p-6 lg:p-7"
                  data-service-card
                  itemScope
                  itemProp="itemListElement"
                  itemType="https://schema.org/ListItem"
                >
                  <meta itemProp="position" content={String(index + 1)} />

                  <div
                    itemScope
                    itemProp="item"
                    itemType="https://schema.org/Service"
                    className="flex h-full flex-col justify-between gap-2"
                  >
                    <div className="mb-4 flex items-start justify-between gap-3">
                      <div className="space-y-2">
                        <h3 className="text-base font-semibold text-slate-50 group-hover:text-sky-300 sm:text-lg">
                          <Link
                            href={href}
                            className="decoration-sky-400/60 hover:underline"
                            itemProp="url"
                            aria-label={service.name}
                          >
                            <span itemProp="name">{service.name}</span>
                          </Link>
                        </h3>

                        {service.short_description && (
                          <p className="text-xs text-slate-300 sm:text-sm">{service.short_description}</p>
                        )}

                        {categoryLabel && (
                          <p className="mt-2 inline-flex items-center rounded-full bg-slate-800/80 px-2.5 py-0.5 text-[11px] font-medium uppercase tracking-[0.18em] text-slate-300">
                            <span className="mr-1.5 h-1.5 w-1.5 rounded-full bg-sky-400" />
                            {categoryLabel}
                          </p>
                        )}
                      </div>

                      {iconSrc && (
                        <div className="flex-none">
                          <img
                            src={iconSrc}
                            alt={service.iconAlt ?? service.name}
                            loading="lazy"
                            width={44}
                            height={44}
                            className="h-10 w-10 object-contain sm:h-11 sm:w-11"
                          />
                        </div>
                      )}
                    </div>

                    {bullets.length > 0 && (
                      <ul className="mb-4 flex-1 space-y-1.5 text-xs text-slate-200 sm:text-sm">
                        {bullets.map((bullet) => (
                          <li key={bullet} className="flex gap-2">
                            <span className="mt-1 h-1.5 w-1.5 flex-none rounded-full bg-sky-400" />
                            <span>{bullet}</span>
                          </li>
                        ))}
                      </ul>
                    )}

                    <div className="mt-auto flex items-center justify-between gap-3 border-t border-slate-800/80 pt-3">
                      <Link
                        href={href}
                        className="inline-flex items-center text-xs font-semibold text-sky-300 hover:text-sky-200"
                      >
                        View service details
                        <span className="ml-1 inline-block translate-y-px">→</span>
                      </Link>
                      <span className="text-[10px] uppercase tracking-[0.18em] text-slate-500">
                        {String(index + 1).padStart(2, "0")}
                      </span>
                    </div>
                  </div>
                </article>
              );
            })}
          </div>
        ) : (
          <p className="text-sm text-slate-300">
            Our services are currently being updated. Please check back soon or{" "}
            <Link href="/contact-us/" className="text-sky-300 underline">contact us</Link> with your project
            details.
          </p>
        )}
      </div>
    </section>
  );
}

export function ServicesEngagementModels() {
  return (
    <section className="relative bg-slate-50 py-16 sm:py-20 lg:py-24" data-animate="engagement-models">
      <div className="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <div className="mb-10 max-w-2xl space-y-3">
          <h2 className="text-center text-display-md font-bold text-black sm:text-display-lg md:text-left md:text-display-xl">
            Flexible engagement models
          </h2>
          <p className="text-sm text-slate-600 sm:text-base">
            Choose how you want to work with us based on where your product is today. We can help you
            validate, ship and then scale without forcing you into a one-size-fits-all model.
          </p>
        </div>

        <div className="grid gap-6 md:grid-cols-3" data-engagement-cards>
          {ENGAGEMENT_MODELS.map((model) => (
            <article
              key={model.title}
              className="flex flex-col rounded-2xl border border-primary-700 bg-primary-700/5 p-5 sm:p-6"
              data-engagement-card
            >
              <h2 className="mb-2 text-base font-semibold text-primary-700 sm:text-lg">{model.title}</h2>
              <p className="mb-3 text-xs text-slate-500 sm:text-sm">{model.intro}</p>
              <ul className="mb-4 space-y-1.5 text-xs text-slate-800 sm:text-sm">
                {model.bullets.map((bullet) => (
                  <li key={bullet} className="flex gap-2">
                    <span className="mt-2 h-1.5 w-1.5 rounded-full bg-primary-700" />
                    <span className="flex-1">{bullet}</span>
                  </li>
                ))}
              </ul>
              <p className="mt-auto text-[11px] text-slate-500">{model.note}</p>
            </article>
          ))}
        </div>
      </div>
    </section>
  );
}

export function ServicesProcessSection() {
  return (
    <section className="relative bg-slate-50 py-16 sm:py-20 lg:py-24" data-animate="process">
      <div className="pointer-events-none absolute inset-0 opacity-50 blur-3xl">
        <div className="h-full w-full bg-gradient-to-br from-white via-primary/5 to-accent/40" />
      </div>

      <div className="relative mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <div className="mb-10 max-w-2xl space-y-3">
          <h2 className="text-center text-display-md font-bold text-black sm:text-display-lg md:text-left md:text-display-xl">
            How we deliver your project
          </h2>
          <p className="text-sm text-slate-600 sm:text-base">
            Clear stages, visible progress and honest communication. No black boxes, no vague timelines.
          </p>
        </div>

        <ol className="grid gap-6 text-xs text-slate-800 sm:text-sm md:grid-cols-5" data-process-steps>
          {PROCESS_STEPS.map((step) => (
            <li
              key={step.step}
              className="flex flex-col gap-2 rounded-2xl border border-primary-700 bg-primary-700/5 p-4"
              data-process-step
            >
              <span className="text-[10px] uppercase tracking-[0.18em] text-slate-600">{step.step}</span>
              <h2 className="text-sm font-semibold text-primary-700">{step.title}</h2>
              <p className="text-xs text-slate-800">{step.description}</p>
            </li>
          ))}
        </ol>
      </div>
    </section>
  );
}

export function ServicesIndustriesBand() {
  return (
    <section className="bg-slate-950 py-16 sm:py-20 lg:py-24" data-animate="industries">
      <div className="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <div className="mb-8 max-w-2xl space-y-3">
          <h2 className="text-2xl font-bold tracking-tight text-slate-50 sm:text-3xl">
            Industries &amp; use cases we work with
          </h2>
          <p className="text-sm text-slate-300 sm:text-base">
            We bring patterns from multiple domains, but always adapt them to your specific context,
            constraints and users.
          </p>
        </div>

        <div className="flex flex-wrap gap-3 text-xs sm:text-sm" data-industry-tags>
          {INDUSTRY_TAGS.map((industry) => (
            <span
              key={industry}
              className="inline-flex items-center rounded-full border border-slate-700 bg-slate-900/70 px-3 py-1 text-slate-100"
            >
              <span className="mr-2 h-1.5 w-1.5 rounded-full bg-sky-400" />
              {industry}
            </span>
          ))}
        </div>
      </div>
    </section>
  );
}

export function ServicesCaseTeasers() {
  return (
    <section className="relative bg-slate-50 py-16 sm:py-20 lg:py-24" data-animate="case-teasers">
      <div className="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <div className="mb-8 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
          <div className="max-w-2xl space-y-3">
            <h2 className="text-2xl font-bold tracking-tight text-black sm:text-3xl">Recent work &amp; outcomes</h2>
            <p className="text-sm text-slate-600 sm:text-base">
              A few examples of how we&apos;ve helped teams turn ideas into working products and platforms.
            </p>
          </div>
          <Link href="/portfolio/" className="text-xs font-semibold text-primary-700 hover:text-primary-800">
            See our work →
          </Link>
        </div>

        <div className="grid gap-6 md:grid-cols-3" data-case-cards>
          {CASE_TEASERS.map((item) => (
            <article
              key={item.title}
              className="rounded-2xl border border-primary-700 bg-primary-700/5 p-5"
              data-case-card
            >
              <h2 className="mb-2 text-sm font-semibold text-primary-700 sm:text-base">{item.title}</h2>
              <p className="mb-3 text-xs text-slate-800 sm:text-sm">{item.description}</p>
              <p className="text-[11px] text-slate-500">{item.result}</p>
            </article>
          ))}
        </div>
      </div>
    </section>
  );
}
