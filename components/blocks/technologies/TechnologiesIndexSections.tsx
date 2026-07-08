import Image from "next/image";
import Link from "next/link";
import { technologies } from "@/lib/data";
import type { ConfigEntity, EntityBlockSection } from "@/lib/data/types";
import { asset } from "@/lib/site";

type TechnologyEntity = ConfigEntity & {
  category?: string;
  short_name?: string;
  tagline?: string;
};

// --- Static content from PHP partials ---

const FEATURED_LINKS_PRIMARY = [
  { label: "All services", href: "/services/", meta: "What we deliver" },
  { label: "See our portfolio", href: "/portfolio/", meta: "Case studies & proof" },
  { label: "Sitemap", href: "/sitemap/", meta: "Browse all key pages" },
  { label: "Our Insights", href: "/blog/", meta: "Read our latest blog posts" },
];

const FEATURED_LINKS_TECH = [
  { label: "Laravel", href: "/technologies/laravel/", meta: "Backend framework" },
  { label: "Node.js", href: "/technologies/nodejs/", meta: "APIs & real-time" },
  { label: "Next.js", href: "/technologies/nextjs/", meta: "SSR web apps" },
  { label: "React", href: "/technologies/reactjs/", meta: "Frontend engineering" },
  { label: "Flutter", href: "/technologies/flutter/", meta: "Cross-platform mobile" },
  { label: "AWS", href: "/technologies/aws/", meta: "Cloud & scaling" },
  { label: "PostgreSQL", href: "/technologies/postgresql/", meta: "Database engineering" },
  { label: "TypeScript", href: "/technologies/typescript/", meta: "Type-safe JS stack" },
];

const STACK_CATEGORIES = [
  {
    anchor: "#tech-frontend",
    name: "Frontend & UI layer",
    summary: "React-based frontends for web apps, dashboards and marketing sites.",
    layerLabel: "Frontend",
    bullets: [
      "React.js for SPAs, dashboards & portals",
      "Component-driven design systems",
      "Responsive, accessible UI patterns",
    ],
  },
  {
    anchor: "#tech-backend",
    name: "Backend & APIs",
    summary: "Node.js, Nest.js and Laravel powering secure, scalable APIs and business logic.",
    layerLabel: "Backend & APIs",
    bullets: [
      "API-first REST & GraphQL backends",
      "Multi-tenant SaaS architectures",
      "Queues, jobs & background processing",
    ],
  },
  {
    anchor: "#tech-mobile",
    name: "Mobile & cross-platform",
    summary: "Flutter apps that run smoothly on both iOS and Android from a single codebase.",
    layerLabel: "Mobile & cross-platform",
    bullets: [
      "Flutter for iOS & Android",
      "Shared UI & business logic",
      "Faster iteration and lower total cost",
    ],
  },
  {
    anchor: "#tech-cms",
    name: "CMS & content platforms",
    summary: "WordPress and headless setups for content-heavy and marketing experiences.",
    layerLabel: "CMS & content",
    bullets: [
      "Marketing websites & blogs",
      "Headless CMS with custom frontends",
      "Editorial workflows that stay simple",
    ],
  },
  {
    anchor: "#tech-legacy",
    name: "Legacy, integration & migration",
    summary: "Stabilise and gradually modernise existing systems like CodeIgniter or older stacks.",
    layerLabel: "Legacy & migration",
    bullets: [
      "Health checks for existing apps",
      "Step-by-step refactors instead of rewrites",
      "Integrations with new services & APIs",
    ],
  },
];

const PROCESS_STEPS = [
  {
    label: "Step 01",
    title: "Understand your product & constraints",
    description:
      "We start with your business model, users, internal team and current systems – not with a pre-selected framework.",
    bullets: [
      "Clarify goals, domain and key user journeys",
      "Map current stack, integrations and data sources",
      "Capture constraints: budget, timelines, hiring market",
    ],
  },
  {
    label: "Step 02",
    title: "Map architecture & integration needs",
    description:
      "We shape an architecture that fits how your product actually works today – and how it is likely to evolve.",
    bullets: [
      "Decide on API-first, monolith or modular approach",
      "Identify critical integrations and data flows",
      "Consider security, compliance and scalability needs",
    ],
  },
  {
    label: "Step 03",
    title: "Propose a pragmatic tech stack",
    description:
      "We recommend a stack based on proven tools we use daily – React/Next.js, Node/Nest.js, Laravel, Flutter, WordPress and more.",
    bullets: [
      "Select frontend, backend, mobile, DB and cloud pieces",
      "Prefer technologies with solid communities & support",
      "Avoid over-engineering for early-stage products",
    ],
  },
  {
    label: "Step 04",
    title: "Validate, iterate & plan handover",
    description:
      "We validate stack choices against your roadmap, risk profile and internal team capabilities.",
    bullets: [
      "Review trade-offs with you in plain language",
      "Align on roadmap, milestones and non-goals",
      "Plan future hiring and smooth handover from day one",
    ],
  },
];

const STACK_EXAMPLES = [
  {
    label: "Stack 01",
    project: "B2B SaaS platform",
    summary: "Multi-tenant SaaS with subscriptions, admin backoffice and integrations.",
    stackLine: "React / Next.js · Nest.js or Laravel · PostgreSQL · Redis · AWS",
    highlights: [
      "Multi-tenant architecture and role-based access",
      "Subscription billing, invoicing and reporting",
      "Admin portal + customer-facing app + APIs",
    ],
    servicesUrl: "/services/saas/",
    techsUrl: "/technologies/",
  },
  {
    label: "Stack 02",
    project: "Customer portal or marketplace",
    summary: "Self-service portal for customers, partners or vendors with workflows and payments.",
    stackLine: "Next.js · Node.js / Nest.js · PostgreSQL or MySQL · Redis · AWS",
    highlights: [
      "Account creation, onboarding and KYC-style flows",
      "Listings, search and transactional workflows",
      "Integration with payment gateways and CRMs",
    ],
    servicesUrl: "/services/custom-software-development/",
    techsUrl: "/technologies/",
  },
  {
    label: "Stack 03",
    project: "Internal tools & analytics dashboards",
    summary: "Operational dashboards and internal tools replacing spreadsheets and ad-hoc scripts.",
    stackLine: "React.js · Laravel or Nest.js · PostgreSQL · BI / analytics tooling",
    highlights: [
      "Role-based dashboards for teams and management",
      "Automations for repetitive internal processes",
      "Audit trails and reporting views for leadership",
    ],
    servicesUrl: "/services/custom-software-development/",
    techsUrl: "/technologies/",
  },
  {
    label: "Stack 04",
    project: "Content-led product & marketing site",
    summary: "Marketing site, blog and simple app flows sharing one stack.",
    stackLine: "Next.js or React.js · WordPress or headless CMS · REST / GraphQL APIs",
    highlights: [
      "SEO-friendly landing pages and blog",
      "Headless or hybrid CMS powering multiple frontends",
      "Lead capture forms connected to CRM or email tools",
    ],
    servicesUrl: "/services/custom-web-development/",
    techsUrl: "/technologies/",
  },
];

const CASE_STUDIES = [
  {
    label: "Case 01",
    title: "Plugin – Tennis club management web app",
    industry: "Sports clubs · Membership & bookings",
    summary:
      "Custom tennis club management & court booking web app that centralises courts, schedules, memberships, pricing and payments in one place.",
    stackLine: "CodeIgniter · PHP · MySQL · Stripe & PayPal · Responsive web UI",
    outcome:
      "Reduced double bookings, clearer view of courts and members, and faster reconciliation between bookings and payments.",
    url: "/case-studies/plugin/",
  },
  {
    label: "Case 02",
    title: "SnappyStats – Scheduling management web app",
    industry: "Sports academies · Training & education",
    summary:
      "Laravel-based scheduling management app that replaces spreadsheets with a centralised calendar for classes, coaches and shooting ranges.",
    stackLine: "Laravel · PHP · MySQL · REST APIs · Role-based access control",
    outcome:
      "80% fewer scheduling conflicts, real-time visibility into sessions and a single source of truth for bookings.",
    url: "/case-studies/snappystats/",
  },
  {
    label: "Case 03",
    title: "Hellory – Smart reminder mobile app",
    industry: "Consumer apps · Productivity",
    summary:
      "Cross-platform Flutter reminder app with recurring schedules, templates and secure notifications backed by a Node.js / MongoDB API.",
    stackLine: "Flutter · Dart · Node.js · MongoDB · REST APIs · Firebase Cloud Messaging",
    outcome:
      "Consistent Android & iOS UX from a single codebase and a reliable notification pipeline ready for future premium features.",
    url: "/case-studies/hellory/",
  },
];

// --- Helpers ---

function groupTechnologiesByCategory(): Record<string, TechnologyEntity[]> {
  const grouped: Record<string, TechnologyEntity[]> = {};

  for (const tech of technologies as TechnologyEntity[]) {
    const category = tech.category ?? "other";
    (grouped[category] ??= []).push(tech);
  }

  return grouped;
}

function getUseCaseLabels(tech: TechnologyEntity): string[] {
  const useCases = tech.use_cases as EntityBlockSection | string[] | undefined;
  if (!useCases) return [];

  if (Array.isArray(useCases)) {
    return useCases.slice(0, 3).map(String);
  }

  if (Array.isArray(useCases.items)) {
    return useCases.items
      .slice(0, 3)
      .map((item) => {
        if (typeof item === "string") return item;
        if (item && typeof item === "object" && "label" in item) {
          return String((item as { label: string }).label);
        }
        return "";
      })
      .filter(Boolean);
  }

  return [];
}

function BulletList({
  items,
  dotClass,
  listClassName = "text-slate-700",
}: {
  items: string[];
  dotClass: string;
  listClassName?: string;
}) {
  return (
    <ul className={`mb-4 flex-1 space-y-1.5 text-xs sm:text-sm ${listClassName}`}>
      {items.map((item) => (
        <li key={item} className="flex gap-2">
          <span className={`mt-1 h-1.5 w-1.5 flex-none rounded-full ${dotClass}`} />
          <span>{item}</span>
        </li>
      ))}
    </ul>
  );
}

// --- Section components ---

function TechnologiesFeaturedLinksSection() {
  const cardClass =
    "group relative rounded-full border border-slate-200 bg-white/90 pl-6 pr-4 py-3 shadow-soft transition hover:border-sky-300/70 hover:bg-white";
  const techCardClass =
    "group relative rounded-sm border border-slate-200 bg-white/90 px-4 py-3 shadow-soft transition hover:border-sky-300/70 hover:bg-white";
  const titleClass = "text-xs font-semibold text-slate-900 group-hover:text-sky-700 transition-colors";
  const metaClass = "mt-0.5 text-[11px] leading-2 text-slate-600";
  const dotClass = "mt-1 h-1.5 w-1.5 flex-none rounded-full bg-sky-400";

  return (
    <section className="bg-slate-50 pb-10 sm:pb-12" data-tech-featured-links>
      <div className="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <div className="border-t border-slate-200/70 pt-10">
          <div className="space-y-3">
            <span className="inline-flex items-center rounded-pill border border-slate-200 bg-white/90 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-muted-foreground shadow-soft">
              Featured links
              <span className="ml-2 h-1 w-1 rounded-full bg-sky-400" />
              <span className="ml-2 opacity-80">Quick navigation</span>
            </span>

            <h2 className="text-display-sm sm:text-display-md font-bold text-slate-900">
              Explore our stack, services, and proof
            </h2>

            <p className="text-xs sm:text-sm text-slate-600 max-w-2xl">
              Jump to the most important hubs and the core technologies we use to ship modern web,
              mobile and SaaS products.
            </p>
          </div>

          <div className="mt-6 grid gap-2 sm:grid-cols-2 lg:grid-cols-4">
            {FEATURED_LINKS_PRIMARY.map((item) => (
              <Link key={item.href} href={item.href} className={cardClass}>
                <div className="flex items-start justify-between gap-3">
                  <div>
                    <div className={titleClass}>{item.label}</div>
                    {item.meta && <div className={metaClass}>{item.meta}</div>}
                  </div>
                  <span className="inline-flex h-9 w-9 items-center justify-center rounded-2xl bg-slate-100 text-slate-400 group-hover:bg-sky-50 group-hover:text-sky-600 transition-colors">
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
              <p className="text-[12px] text-slate-500">
                These pages connect back to services and case studies.
              </p>
            </div>

            <div className="mt-4 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
              {FEATURED_LINKS_TECH.map((item) => (
                <Link key={item.href} href={item.href} className={techCardClass}>
                  <div className="flex items-start justify-between gap-3">
                    <div className="flex gap-2">
                      <span className={dotClass} />
                      <div>
                        <div className={titleClass}>{item.label}</div>
                        {item.meta && <div className={metaClass}>{item.meta}</div>}
                      </div>
                    </div>
                    <span className="text-slate-300 group-hover:text-sky-300 transition-colors">→</span>
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

function TechnologiesTechStackOverviewSection() {
  return (
    <section
      className="border-t border-slate-50 bg-slate-950 py-16 sm:py-20 lg:py-24"
      data-animate="tech-stack-overview"
      itemScope
      itemType="https://schema.org/ItemList"
    >
      <div className="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <div
          className="mb-10 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between"
          data-tech-stack-header
        >
          <div className="space-y-3 max-w-xl">
            <h2 className="text-display-md sm:text-display-lg md:text-display-xl font-bold text-center md:text-left text-slate-50">
              Our web, mobile &amp; cloud tech stack at a glance
            </h2>
            <p className="text-sm sm:text-base text-slate-300">
              We deliberately keep our stack focused around proven technologies like React.js,
              Node.js, Nest.js, Laravel, Flutter and WordPress – so your product is easier to
              scale, maintain and hire for in the long run.
            </p>
          </div>
          <p className="max-w-sm text-xs text-slate-400">
            Each layer below links to more detail and specific technologies. Combine them into a
            stack that fits your product: frontend, backend, mobile, CMS, cloud &amp; integrations
            – guided by one accountable team at QalbIT.
          </p>
        </div>

        <div className="grid gap-6 sm:gap-7 md:grid-cols-2 lg:grid-cols-3" data-tech-stack-cards>
          {STACK_CATEGORIES.map((item, index) => {
            const position = index + 1;
            return (
              <article
                key={item.anchor}
                className="group relative flex flex-col rounded-2xl border border-slate-800/80 bg-slate-900/70 p-5 sm:p-6 lg:p-7 shadow-sm shadow-black/20 hover:border-sky-500/60 hover:bg-slate-900/90 transition-colors"
                data-tech-stack-card
                itemScope
                itemProp="itemListElement"
                itemType="https://schema.org/Thing"
              >
                <meta itemProp="position" content={String(position)} />
                <meta itemProp="url" content={item.anchor} />

                <div className="mb-4 flex items-start justify-between gap-3">
                  <div className="space-y-1.5">
                    <h3
                      className="text-base sm:text-lg font-semibold text-slate-50 group-hover:text-sky-300"
                      itemProp="name"
                    >
                      <Link href={item.anchor} className="hover:underline decoration-sky-400/60">
                        {item.name}
                      </Link>
                    </h3>
                    <p className="text-xs sm:text-sm text-slate-300" itemProp="description">
                      {item.summary}
                    </p>
                    <p className="mt-1 inline-flex items-center rounded-full bg-slate-800/80 px-2.5 py-0.5 text-[11px] font-medium uppercase tracking-[0.18em] text-slate-300">
                      <span className="mr-1.5 h-1.5 w-1.5 rounded-full bg-sky-400" />
                      {item.layerLabel}
                    </p>
                  </div>
                  <div className="flex-none">
                    <div className="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-slate-800/80 ring-1 ring-slate-700/80">
                      <span className="text-[11px] font-semibold text-slate-200">
                        {String(position).padStart(2, "0")}
                      </span>
                    </div>
                  </div>
                </div>

                <BulletList items={item.bullets} dotClass="bg-sky-400" listClassName="text-slate-200" />

                <div className="mt-auto flex items-center justify-between gap-3 pt-3 border-t border-slate-800/80">
                  <Link
                    href={item.anchor}
                    className="inline-flex items-center text-xs font-semibold text-sky-300 hover:text-sky-200"
                  >
                    View related technologies
                    <span className="ml-1 inline-block translate-y-px">→</span>
                  </Link>
                  <span className="text-[10px] uppercase tracking-[0.18em] text-slate-500">Layer</span>
                </div>
              </article>
            );
          })}
        </div>
      </div>
    </section>
  );
}

interface TechCategoryConfig {
  id: string;
  sectionAttr: string;
  headerAttr: string;
  cardsAttr: string;
  cardAttr: string;
  bgClass: string;
  title: string;
  intro: string;
  aside: string;
  badgeLabel: string;
  badgeDotClass: string;
  bulletDotClass: string;
  hoverBorderClass: string;
  emptyMessage: string;
  footerNote?: string;
}

function TechnologiesCategorySection({
  config,
  items,
}: {
  config: TechCategoryConfig;
  items: TechnologyEntity[];
}) {
  return (
    <section
      id={config.id}
      className={`border-t border-slate-100 ${config.bgClass} py-16 sm:py-20 lg:py-24`}
      {...{ [config.sectionAttr]: "" }}
      itemScope
      itemType="https://schema.org/ItemList"
    >
      <div className="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <div
          className="mb-10 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between"
          {...{ [config.headerAttr]: "" }}
        >
          <div className="space-y-3 max-w-xl">
            <h2 className="text-display-md sm:text-display-lg md:text-display-xl font-bold text-center md:text-left text-slate-900">
              {config.title}
            </h2>
            <p className="text-sm sm:text-base text-slate-600">{config.intro}</p>
          </div>
          <p className="max-w-sm text-xs text-slate-500">{config.aside}</p>
        </div>

        {items.length > 0 ? (
          <div
            className="grid gap-6 sm:gap-7 md:grid-cols-2 lg:grid-cols-3"
            {...{ [config.cardsAttr]: "" }}
          >
            {items.map((tech, index) => {
              const position = index + 1;
              const slug = tech.slug ?? "#";
              const name = tech.name ?? "";
              const shortName = tech.short_name ?? name;
              const tagline = tech.tagline ?? tech.summary ?? "";
              const useCases = getUseCaseLabels(tech);
              const iconAlt = shortName || "Technology icon";

              return (
                <article
                  key={slug}
                  className={`group relative flex flex-col rounded-2xl border border-slate-200 bg-white p-5 sm:p-6 lg:p-7 shadow-sm ${config.hoverBorderClass} hover:shadow-md hover:shadow-sky-100 transition-colors`}
                  {...{ [config.cardAttr]: "" }}
                  itemScope
                  itemProp="itemListElement"
                  itemType="https://schema.org/Thing"
                >
                  <meta itemProp="position" content={String(position)} />
                  <meta itemProp="url" content={slug} />

                  <div className="mb-4 flex items-start justify-between gap-3">
                    <div className="space-y-1.5">
                      <h3
                        className="text-base sm:text-lg font-semibold text-slate-900 group-hover:text-sky-700"
                        itemProp="name"
                      >
                        <Link href={slug} className="hover:underline decoration-sky-400/60">
                          {name}
                        </Link>
                      </h3>
                      {tagline && (
                        <p className="text-xs sm:text-sm text-slate-600" itemProp="description">
                          {tagline}
                        </p>
                      )}
                      <p className="mt-1 inline-flex items-center rounded-full bg-slate-100 px-2.5 py-0.5 text-[11px] font-medium uppercase tracking-[0.18em] text-slate-600">
                        <span className={`mr-1.5 h-1.5 w-1.5 rounded-full ${config.badgeDotClass}`} />
                        {config.badgeLabel}
                      </p>
                    </div>
                    {tech.icon && (
                      <div className="flex-none">
                        <Image
                          src={asset(tech.icon)}
                          alt={iconAlt}
                          width={44}
                          height={44}
                          className="h-10 w-10 sm:h-11 sm:w-11 object-contain"
                        />
                      </div>
                    )}
                  </div>

                  {useCases.length > 0 && (
                    <BulletList items={useCases} dotClass={config.bulletDotClass} />
                  )}

                  <div
                    className={`mt-auto ${config.footerNote ? "space-y-2" : ""} pt-3 border-t border-slate-200`}
                  >
                    <div className="flex items-center justify-between gap-3">
                      <Link
                        href={slug}
                        className="inline-flex items-center text-xs font-semibold text-sky-700 hover:text-sky-600"
                      >
                        View {shortName} details
                        <span className="ml-1 inline-block translate-y-px">→</span>
                      </Link>
                      <span className="text-[10px] uppercase tracking-[0.18em] text-slate-400">
                        {String(position).padStart(2, "0")}
                      </span>
                    </div>
                    {config.footerNote && (
                      <p className="text-[11px] text-slate-500">{config.footerNote}</p>
                    )}
                  </div>
                </article>
              );
            })}
          </div>
        ) : (
          <p className="text-sm text-slate-600">
            {config.emptyMessage}{" "}
            <Link href="/contact-us/" className="text-sky-700 underline">
              contact us
            </Link>{" "}
            with your project details.
          </p>
        )}
      </div>
    </section>
  );
}

function TechnologiesProcessSection() {
  return (
    <section
      id="tech-process"
      className="border-t border-slate-900 bg-slate-950 py-16 sm:py-20 lg:py-24"
      data-tech-process-section
      itemScope
      itemType="https://schema.org/HowTo"
    >
      <div className="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <header className="mb-10 space-y-4 text-center md:text-left" data-tech-process-header>
          <p className="text-xs font-semibold uppercase tracking-[0.18em] text-sky-300">Approach</p>
          <h2
            className="text-display-md sm:text-display-lg md:text-display-xl font-bold text-slate-50"
            itemProp="name"
          >
            How we choose the right tech stack for your product
          </h2>
          <p className="text-sm sm:text-base text-slate-300 max-w-3xl">
            Instead of pushing a trendy framework, we match technologies to your domain, constraints
            and roadmap. The outcome is a stack that is realistic to build, maintain and hire for –
            not just something that looks good on a slide.
          </p>
        </header>

        <meta
          itemProp="tool"
          content="React, Next.js, Node.js, Nest.js, Laravel, Flutter, WordPress, PostgreSQL, MySQL, AWS"
        />

        <div className="grid gap-6 sm:gap-7 md:grid-cols-2" data-tech-process-steps>
          {PROCESS_STEPS.map((step, index) => {
            const position = index + 1;
            return (
              <article
                key={step.label}
                className="group relative flex flex-col rounded-2xl border border-slate-800/80 bg-slate-900/70 p-5 sm:p-6 lg:p-7 shadow-sm shadow-black/20 hover:border-sky-400/70 hover:bg-slate-900/90 transition-colors"
                data-tech-process-step
                itemProp="step"
                itemScope
                itemType="https://schema.org/HowToStep"
              >
                <meta itemProp="position" content={String(position)} />

                <div className="mb-4 flex items-start justify-between gap-3">
                  <div className="space-y-2">
                    <p className="inline-flex items-center rounded-full bg-slate-900 px-2.5 py-0.5 text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-300">
                      <span className="mr-1.5 h-1.5 w-1.5 rounded-full bg-sky-400" />
                      {step.label}
                    </p>
                    <h3
                      className="text-base sm:text-lg font-semibold text-slate-50 group-hover:text-sky-300"
                      itemProp="name"
                    >
                      {step.title}
                    </h3>
                    <p className="text-xs sm:text-sm text-slate-300" itemProp="text">
                      {step.description}
                    </p>
                  </div>
                  <div className="flex-none">
                    <div className="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-slate-800/80 ring-1 ring-slate-700/80">
                      <span className="text-[11px] font-semibold text-slate-200">
                        {String(position).padStart(2, "0")}
                      </span>
                    </div>
                  </div>
                </div>

                <BulletList items={step.bullets} dotClass="bg-sky-400" listClassName="text-slate-200" />

                <p className="mt-3 text-[11px] text-slate-500">
                  This step ensures we are aligning technology choices with your roadmap, risk
                  tolerance and team – not just with our internal preferences.
                </p>
              </article>
            );
          })}
        </div>
      </div>
    </section>
  );
}

function TechnologiesStackExamplesSection() {
  return (
    <section
      id="tech-stacks"
      className="border-t border-slate-100 bg-white py-16 sm:py-20 lg:py-24"
      data-tech-stacks-section
      itemScope
      itemType="https://schema.org/ItemList"
    >
      <div className="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <header className="mb-10 space-y-4 text-center md:text-left" data-tech-stacks-header>
          <p className="text-xs font-semibold uppercase tracking-[0.18em] text-sky-600">
            Example stacks
          </p>
          <h2
            className="text-display-md sm:text-display-lg md:text-display-xl font-bold text-slate-900"
            itemProp="name"
          >
            Sample tech stacks for common project types
          </h2>
          <p className="text-sm sm:text-base text-slate-600 max-w-3xl">
            These examples show how we typically combine React/Next.js, Node/Nest.js, Laravel,
            Flutter, WordPress, PostgreSQL, MySQL and AWS into practical stacks. The exact mix is
            always adjusted to your product, team and constraints.
          </p>
        </header>

        <div className="grid gap-6 sm:gap-7 md:grid-cols-2" data-tech-stacks-grid>
          {STACK_EXAMPLES.map((example, index) => {
            const position = index + 1;
            return (
              <article
                key={example.label}
                className="group relative flex flex-col rounded-2xl border border-slate-200 bg-slate-50 p-5 sm:p-6 lg:p-7 shadow-sm hover:border-sky-500/70 hover:bg-white hover:shadow-md hover:shadow-sky-100 transition-colors"
                data-tech-stack-card
                itemProp="itemListElement"
                itemScope
                itemType="https://schema.org/Thing"
              >
                <meta itemProp="position" content={String(position)} />

                <div className="mb-4 flex items-start justify-between gap-3">
                  <div className="space-y-2">
                    <p className="inline-flex items-center rounded-full bg-slate-100 px-2.5 py-0.5 text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-700">
                      <span className="mr-1.5 h-1.5 w-1.5 rounded-full bg-sky-500" />
                      {example.label}
                    </p>
                    <h3
                      className="text-base sm:text-lg font-semibold text-slate-900 group-hover:text-sky-700"
                      itemProp="name"
                    >
                      {example.project}
                    </h3>
                    <p className="text-xs sm:text-sm text-slate-600">{example.summary}</p>
                  </div>
                  <div className="flex-none">
                    <div className="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-slate-100 ring-1 ring-slate-200">
                      <span className="text-[11px] font-semibold text-slate-700">
                        {String(position).padStart(2, "0")}
                      </span>
                    </div>
                  </div>
                </div>

                <p className="mb-3 text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">
                  Typical stack
                </p>
                <p className="mb-4 text-xs sm:text-sm font-medium text-slate-900">{example.stackLine}</p>

                <BulletList items={example.highlights} dotClass="bg-sky-500" />

                <div className="mt-auto flex flex-wrap items-center justify-between gap-3 pt-3 border-t border-slate-200">
                  <div className="flex flex-wrap gap-2">
                    <Link
                      href={example.servicesUrl}
                      className="inline-flex items-center text-[11px] font-semibold text-sky-700 hover:text-sky-600"
                    >
                      View relevant services
                      <span className="ml-1 inline-block translate-y-px">→</span>
                    </Link>
                    <span className="hidden text-[11px] text-slate-400 sm:inline">·</span>
                    <Link
                      href={`${example.techsUrl}#tech-frontend`}
                      className="inline-flex items-center text-[11px] font-semibold text-slate-600 hover:text-sky-700"
                    >
                      Explore technologies
                    </Link>
                  </div>
                  <span className="text-[10px] uppercase tracking-[0.18em] text-slate-400">
                    Example stack
                  </span>
                </div>
              </article>
            );
          })}
        </div>
      </div>
    </section>
  );
}

function TechnologiesCaseStudiesSection() {
  return (
    <section
      id="tech-case-studies"
      className="border-t border-slate-100 bg-slate-50 py-16 sm:py-20 lg:py-24"
      data-tech-case-studies-section
      itemScope
      itemType="https://schema.org/ItemList"
    >
      <div className="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <header className="mb-10 space-y-4 text-center md:text-left" data-tech-case-studies-header>
          <p className="text-xs font-semibold uppercase tracking-[0.18em] text-sky-600">
            Recent work
          </p>
          <h2
            className="text-display-md sm:text-display-lg md:text-display-xl font-bold text-slate-900"
            itemProp="name"
          >
            Recent projects using these technologies
          </h2>
          <p className="text-sm sm:text-base text-slate-600 max-w-3xl">
            A few examples of how we have used CodeIgniter, Laravel and Flutter in real products.
            More detailed case studies can be shared under NDA if your domain is similar.
          </p>
        </header>

        <div className="grid gap-6 sm:gap-7 md:grid-cols-2" data-tech-case-studies-grid>
          {CASE_STUDIES.map((caseStudy, index) => {
            const position = index + 1;
            return (
              <article
                key={caseStudy.url}
                className="group relative flex flex-col rounded-2xl border border-slate-200 bg-white p-5 sm:p-6 lg:p-7 shadow-sm hover:border-sky-500/70 hover:shadow-md hover:shadow-sky-100 transition-colors"
                data-tech-case-study-card
                itemProp="itemListElement"
                itemScope
                itemType="https://schema.org/CaseStudy"
              >
                <meta itemProp="position" content={String(position)} />
                <meta itemProp="url" content={caseStudy.url} />

                <div className="mb-4 flex items-start justify-between gap-3">
                  <div className="space-y-2">
                    <p className="inline-flex items-center rounded-full bg-slate-100 px-2.5 py-0.5 text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-700">
                      <span className="mr-1.5 h-1.5 w-1.5 rounded-full bg-emerald-500" />
                      {caseStudy.label}
                    </p>
                    <h3
                      className="text-base sm:text-lg font-semibold text-slate-900 group-hover:text-sky-700"
                      itemProp="name"
                    >
                      <Link href={caseStudy.url} className="hover:underline decoration-sky-400/60">
                        {caseStudy.title}
                      </Link>
                    </h3>
                    <p className="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">
                      {caseStudy.industry}
                    </p>
                    <p className="text-xs sm:text-sm text-slate-600" itemProp="description">
                      {caseStudy.summary}
                    </p>
                  </div>
                  <div className="flex-none">
                    <div className="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-slate-50 ring-1 ring-slate-200">
                      <span className="text-[11px] font-semibold text-slate-700">
                        {String(position).padStart(2, "0")}
                      </span>
                    </div>
                  </div>
                </div>

                <p className="mb-2 text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">
                  Tech stack
                </p>
                <p className="mb-4 text-xs sm:text-sm font-medium text-slate-900">
                  {caseStudy.stackLine}
                </p>

                <p className="mb-4 text-xs sm:text-sm text-slate-700">
                  <span className="font-semibold text-slate-900">Outcome:</span> {caseStudy.outcome}
                </p>

                <div className="mt-auto flex items-center justify-between gap-3 pt-3 border-t border-slate-200">
                  <Link
                    href={caseStudy.url}
                    className="inline-flex items-center text-[11px] font-semibold text-sky-700 hover:text-sky-600"
                  >
                    Read case study
                    <span className="ml-1 inline-block translate-y-px">→</span>
                  </Link>
                  <span className="text-[10px] uppercase tracking-[0.18em] text-slate-400">
                    Real-world example
                  </span>
                </div>
              </article>
            );
          })}
        </div>
      </div>
    </section>
  );
}

const CATEGORY_CONFIGS: TechCategoryConfig[] = [
  {
    id: "tech-frontend",
    sectionAttr: "data-tech-frontend-section",
    headerAttr: "data-tech-frontend-header",
    cardsAttr: "data-tech-frontend-cards",
    cardAttr: "data-tech-frontend-card",
    bgClass: "bg-white",
    title: "Frontend technologies for modern web apps",
    intro:
      "We use React.js and a modern frontend toolchain to build fast, accessible interfaces for SaaS dashboards, internal tools and marketing sites. Component-driven UI makes it easier to iterate without breaking core flows.",
    aside:
      "Frontend work is typically paired with our backend and API development services, so UX, performance and data models stay aligned – from design system tokens to the API responses your UI consumes.",
    badgeLabel: "Frontend & UI",
    badgeDotClass: "bg-sky-400",
    bulletDotClass: "bg-sky-400",
    hoverBorderClass: "hover:border-sky-400/70",
    emptyMessage: "Our frontend technology list is currently being updated. Please check back soon or",
  },
  {
    id: "tech-backend",
    sectionAttr: "data-tech-backend-section",
    headerAttr: "data-tech-backend-header",
    cardsAttr: "data-tech-backend-cards",
    cardAttr: "data-tech-backend-card",
    bgClass: "bg-slate-50",
    title: "Backend & API technologies for scalable systems",
    intro:
      "We use Node.js, Nest.js, Laravel and related tools to design secure, API-first backends. From multi-tenant SaaS platforms to real-time integrations, the goal is predictable performance and clean domain models that are easy to evolve.",
    aside:
      "Backends are designed with testing, observability and deployment in mind. We align architecture with your product stage and traffic profile – instead of over-complicating things with patterns you do not need yet.",
    badgeLabel: "Backend & APIs",
    badgeDotClass: "bg-emerald-500",
    bulletDotClass: "bg-emerald-500",
    hoverBorderClass: "hover:border-sky-500/70",
    emptyMessage: "Our backend technology list is currently being updated. Please check back soon or",
    footerNote:
      "Typical patterns: REST/GraphQL APIs, background workers & queues, multi-tenant SaaS, integrations and reporting.",
  },
  {
    id: "tech-mobile",
    sectionAttr: "data-tech-mobile-section",
    headerAttr: "data-tech-mobile-header",
    cardsAttr: "data-tech-mobile-cards",
    cardAttr: "data-tech-mobile-card",
    bgClass: "bg-white",
    title: "Mobile app & cross-platform technologies",
    intro:
      "We use Flutter to ship high-quality mobile apps for iOS and Android from a single codebase. The goal: native-feeling experiences, predictable performance and a stack that is practical to maintain over the long term.",
    aside:
      "Mobile projects are typically connected to custom APIs, admin portals and analytics, so your app is not an isolated build. We keep the mobile layer aligned with backend, DevOps and product strategy from day one.",
    badgeLabel: "Mobile & cross-platform",
    badgeDotClass: "bg-purple-500",
    bulletDotClass: "bg-purple-500",
    hoverBorderClass: "hover:border-sky-500/70",
    emptyMessage: "Our mobile technology list is currently being updated. Please check back soon or",
    footerNote:
      "Typical use cases: MVPs, internal tools, customer apps and companion mobile experiences layered on top of your existing systems.",
  },
  {
    id: "tech-cms",
    sectionAttr: "data-tech-cms-section",
    headerAttr: "data-tech-cms-header",
    cardsAttr: "data-tech-cms-cards",
    cardAttr: "data-tech-cms-card",
    bgClass: "bg-slate-50",
    title: "CMS & content platforms we work with",
    intro:
      "From corporate sites and blogs to content hubs, we use WordPress and headless setups where they make sense – and pair them with custom frontends or backends when you need more than a basic theme.",
    aside:
      "We focus on practical CMS implementations: fast, secure and easy for non-technical teams to update. When your needs grow, we can extend your CMS with APIs, custom plugins or a separate React/Next.js frontend.",
    badgeLabel: "CMS & content",
    badgeDotClass: "bg-amber-500",
    bulletDotClass: "bg-amber-500",
    hoverBorderClass: "hover:border-sky-500/70",
    emptyMessage: "Our CMS technology list is currently being updated. Please check back soon or",
    footerNote:
      "Typical use cases: marketing sites, blogs, content hubs and landing pages connected to custom backends or SaaS products.",
  },
  {
    id: "tech-legacy",
    sectionAttr: "data-tech-legacy-section",
    headerAttr: "data-tech-legacy-header",
    cardsAttr: "data-tech-legacy-cards",
    cardAttr: "data-tech-legacy-card",
    bgClass: "bg-white",
    title: "Legacy, integration & supporting technologies",
    intro:
      "Beyond core frontend and backend frameworks, we also work with the underlying pieces that keep your product stable – databases, cloud platforms, typed JavaScript and older stacks that still run critical workflows.",
    aside:
      "We can stabilise existing applications (for example legacy PHP or CodeIgniter), plan gradual migrations to Laravel or modern Node/Nest.js, and at the same time look after your PostgreSQL/MySQL databases, AWS infrastructure and integrations.",
    badgeLabel: "Legacy & supporting stack",
    badgeDotClass: "bg-emerald-500",
    bulletDotClass: "bg-emerald-500",
    hoverBorderClass: "hover:border-sky-500/70",
    emptyMessage: "Our supporting technologies list is currently being updated. Please check back soon or",
    footerNote:
      "Typical scenarios: keeping critical legacy apps stable, planning migrations, tuning databases, and aligning AWS/cloud setups with how your product actually runs.",
  },
];

const CATEGORY_KEYS = ["frontend", "backend", "mobile", "cms", "other"] as const;

export function TechnologiesIndexSections() {
  const grouped = groupTechnologiesByCategory();

  return (
    <>
      <TechnologiesFeaturedLinksSection />
      <TechnologiesTechStackOverviewSection />
      {CATEGORY_CONFIGS.map((config, index) => (
        <TechnologiesCategorySection
          key={config.id}
          config={config}
          items={grouped[CATEGORY_KEYS[index]] ?? []}
        />
      ))}
      <TechnologiesProcessSection />
      <TechnologiesStackExamplesSection />
      <TechnologiesCaseStudiesSection />
    </>
  );
}
