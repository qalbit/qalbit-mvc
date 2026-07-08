import Image from "next/image";
import Link from "next/link";
import { industries, technologies } from "@/lib/data";
import type { ConfigEntity } from "@/lib/data/types";
import { asset } from "@/lib/site";

type IndustryEntity = ConfigEntity & {
  short_name?: string;
  tagline?: string;
  summary?: string;
  category?: string;
  category_label?: string;
  icon_dark?: string;
  iconAlt?: string;
  bullets?: string[];
};
type TechnologyEntity = ConfigEntity & { short_name?: string };

const industryList = industries as IndustryEntity[];

const industryTags = industries as IndustryEntity[];
const technologyTags = technologies as TechnologyEntity[];

const INDUSTRY_OUTCOMES = [
  {
    label: "Home services & on-demand",
    headline: "Booking platform for local services",
    result: "+35–40% increase in completed jobs within 6 months",
    bullets: [
      "Online quote & booking flows instead of phone-only requests.",
      "Field team app for job status, photos and customer signatures.",
    ],
    ctaLabel: "See home services example",
    ctaHref: "/portfolio/?industry=home-services",
  },
  {
    label: "Travel & mobility",
    headline: "Trip request & scheduling platform",
    result: "Higher utilisation of vehicles and better customer communication",
    bullets: [
      "“Trip request solution” tuned to real-world routes and constraints.",
      "Driver, dispatcher and customer views from the same platform.",
    ],
    ctaLabel: "See travel example",
    ctaHref: "/portfolio/?industry=travel",
  },
  {
    label: "Sports, fitness & education",
    headline: "Sports academy & training management portal",
    result: "Cleaner schedules, payments and communication with parents/athletes",
    bullets: [
      "“Sports management software” for sessions, attendance and staff.",
      "Mobile-friendly views for coaches, players and guardians.",
    ],
    ctaLabel: "See sports & education example",
    ctaHref: "/portfolio/?industry=sports-fitness",
  },
] as const;

const PROCESS_STEPS = [
  {
    step: "Step 01 · Discovery",
    title: "Understand your industry, flows & constraints",
    description:
      "We map how your industry works today – roles, workflows, tools, compliance and edge cases – so we are not guessing based on generic “best practices”.",
    bullets: ["Stakeholder interviews & current-system review", "Clarify goals, risks and success metrics"],
  },
  {
    step: "Step 02 · Solution shape",
    title: "Design the right product & platform approach",
    description:
      "We propose a concrete product shape – web app, mobile app, portal, marketplace or a mix – plus integrations, data flows and phased releases that fit your budget.",
    bullets: ["Scoped feature set & user journeys", "Architecture & tech stack recommendations"],
  },
  {
    step: "Step 03 · Build & integrate",
    title: "Implement, integrate & prepare for real usage",
    description:
      "Our team designs, develops and integrates the solution – from core modules and dashboards to mobile apps, APIs and 3rd-party systems used in your industry.",
    bullets: ["Iterative releases with demo-ready builds", "Testing with real data & user feedback loops"],
  },
  {
    step: "Step 04 · Launch & evolve",
    title: "Launch, support & iterate with your team",
    description:
      "After launch, we stay involved for support, enhancements and new modules as your industry use case grows, or help your internal team take over cleanly.",
    bullets: ["Monitoring, fixes & small improvements", "Roadmap planning for new features & markets"],
  },
] as const;

const USE_CASE_CARDS = [
  {
    label: "On-demand & food delivery",
    title: "Food delivery & local on-demand platforms",
    description:
      "Online food delivery app solutions with order flows, delivery partner apps, real-time status updates, offers and loyalty – integrated with payments and, where possible, POS or kitchen systems.",
    bullets: [
      "“Food delivery app solution”, “online food ordering app development”",
      "Customer, rider and admin apps / dashboards",
      "Zone-based pricing, coupons and payouts",
    ],
  },
  {
    label: "Travel & mobility",
    title: "Travel & tourism app solutions",
    description:
      "Platforms for trip requests, multi-leg journeys and bookings – from simple travel portals to online platforms for multi-modal travel with pricing, routes and availability from different providers.",
    bullets: [
      "“Travel and tourism app solutions”, “trip request solution”",
      "Quoting, booking and itinerary management",
      "Driver / partner apps and live status tracking",
    ],
  },
  {
    label: "Sports, fitness & wellness",
    title: "Sports management & fitness applications",
    description:
      "Sports web software and mobile solutions for clubs, academies, gyms and leagues – including schedules, memberships, attendance, training plans and basic analytics.",
    bullets: [
      "“Sports management software solutions”, “fitness mobile application solutions”",
      "Coach, player and parent/athlete portals",
      "Booking slots, payments and progress tracking",
    ],
  },
  {
    label: "Fintech & payments",
    title: "Secure fintech app & platform solutions",
    description:
      "Fintech mobile application solutions for lending, wallets, pay-later flows or fee-based platforms – built with careful security, auditing and compliance in mind.",
    bullets: [
      "“Secure fintech solutions”, “fintech app solution provider”",
      "KYC flows, risk rules and ledger design",
      "Exportable reports for finance & compliance teams",
    ],
  },
  {
    label: "Ecommerce & marketplaces",
    title: "Multi-vendor ecommerce & B2B/B2C platforms",
    description:
      "Multi-vendor e-commerce solutions with catalogues, inventory, pricing rules, carts, checkout and order management for either consumer or B2B flows.",
    bullets: [
      "“Multi-vendor ecommerce web app”, “e-commerce web application development company”",
      "Vendor onboarding, commissions and payouts",
      "Integrations with payment and logistics partners",
    ],
  },
  {
    label: "Communities, education & portals",
    title: "Social, learning & management portals",
    description:
      "Social networking app solutions, online communities and educational portals where users join, consume content and interact – often combined with school or business management modules.",
    bullets: [
      "“Social networking app development company”, “online community app development”",
      "“Educational mobile app solutions”, “school management portal development”",
      "Roles, permissions and multi-tenant structures",
    ],
  },
] as const;

const TRUST_LOGOS = [
  { label: "Home services SaaS client", hint: "Field services & booking platform" },
  { label: "Fintech reporting portal", hint: "Finance & compliance dashboards" },
  { label: "Travel & mobility operator", hint: "Trip request & fleet scheduling" },
  { label: "Sports academy / education", hint: "Training & membership platform" },
  { label: "Healthcare & wellness group", hint: "Healthtech & appointment portal" },
  { label: "Ecommerce & marketplace brand", hint: "Multi-vendor commerce platform" },
] as const;

const TRUST_TESTIMONIALS = [
  {
    quote:
      "QalbIT successfully developed an app in a timely manner. Their team maximized their knowledge and skills to produce strong deliverables. They were hardworking, effective, and adaptive in the workflow.",
    role: "Head of Communications & ICT, Londonwide LMCs",
    region: "London, UK",
  },
  {
    quote:
      "QalbIT quickly integrated four platforms quickly. Square, Stripe, PayPal, and Coinbase were all successfully used. The vendor provided an active communication process, maintaining timely deadlines despite the research-heavy service. They also offered post-launch support.",
    role: "CTO, Contractor Plus, Inc.",
    region: "United States (remote collaboration)",
  },
] as const;

function TagDot() {
  return <span className="mr-2 h-1.5 w-1.5 rounded-full bg-sky-400" />;
}

function ExternalArrow() {
  return <span className="ml-1.5 translate-y-px text-base">↗</span>;
}

export function IndustriesGridSection() {
  return (
    <section
      id="industry-categories"
      className="border-t border-slate-200 bg-slate-50 py-16 sm:py-20 lg:py-24"
      data-animate="industries-grid"
      itemScope
      itemType="https://schema.org/ItemList"
    >
      <div className="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <div className="mb-10 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
          <div className="max-w-2xl space-y-3">
            <h2 className="text-display-md font-bold text-slate-900 sm:text-display-lg md:text-display-xl">
              Explore industries we build software for
            </h2>
            <p className="text-sm text-slate-700 sm:text-base">
              Each industry page goes deeper into typical challenges, solution patterns and QalbIT&apos;s
              approach to web, mobile and SaaS products in that space – from entertainment and social
              platforms to food delivery, fintech, real estate, healthcare and education.
            </p>
          </div>
          <p className="max-w-sm text-xs text-slate-600 sm:text-[13px]">
            Start with the industry that is closest to your current business model. If your idea spans
            multiple verticals – for example, a SaaS product for home services or a marketplace for
            travel experiences – we can blend patterns from several industries into one roadmap.
          </p>
        </div>

        {industryList.length > 0 ? (
          <div className="grid gap-6 sm:gap-7 md:grid-cols-2 lg:grid-cols-3" data-industry-cards>
            {industryList.map((industry, index) => {
              const slug = industry.slug ?? "#";
              const name = industry.name ?? "";
              const tagline = industry.tagline ?? "";
              const summary = industry.summary ?? "";
              const categoryLabel =
                industry.category_label ??
                (industry.category
                  ? industry.category.replace(/-/g, " ").replace(/\b\w/g, (c) => c.toUpperCase())
                  : "");
              const iconSrc = industry.icon_dark ? asset(industry.icon_dark.replace(/^\//, "")) : null;
              const position = index + 1;

              return (
                <article
                  key={slug}
                  className="group relative flex flex-col rounded-2xl border border-slate-200 bg-white/90 p-5 shadow-sm shadow-slate-200/80 transition-colors hover:border-sky-500/70 hover:bg-white sm:p-6 lg:p-7"
                  data-industry-card
                  itemScope
                  itemProp="itemListElement"
                  itemType="https://schema.org/Thing"
                >
                  <meta itemProp="position" content={String(position)} />
                  <meta itemProp="url" content={slug} />

                  <div className="mb-4 flex items-start justify-between gap-3">
                    <div className="space-y-1.5">
                      <h3
                        className="text-base font-semibold text-slate-900 group-hover:text-sky-700 sm:text-lg"
                        itemProp="name"
                      >
                        <Link href={slug} className="decoration-sky-400/70 hover:underline">{name}</Link>
                      </h3>
                      {tagline && (
                        <p className="text-xs font-medium text-slate-700 sm:text-sm">{tagline}</p>
                      )}
                      {categoryLabel && (
                        <p className="mt-1 inline-flex items-center rounded-full bg-slate-100 px-2.5 py-0.5 text-[11px] font-medium uppercase tracking-[0.18em] text-slate-700">
                          <span className="mr-1.5 h-1.5 w-1.5 rounded-full bg-sky-500" />
                          {categoryLabel}
                        </p>
                      )}
                    </div>
                    {iconSrc && (
                      <div className="flex-none">
                        <Image
                          src={iconSrc}
                          alt={industry.iconAlt ?? name}
                          width={44}
                          height={44}
                          className="h-10 w-10 object-contain sm:h-11 sm:w-11"
                        />
                      </div>
                    )}
                  </div>

                  {summary && (
                    <p
                      className="mb-3 text-xs leading-relaxed text-slate-700 sm:text-sm"
                      itemProp="description"
                    >
                      {summary}
                    </p>
                  )}

                  {industry.bullets && industry.bullets.length > 0 && (
                    <ul className="mb-4 flex-1 space-y-1.5 text-[11px] text-slate-600 sm:text-xs">
                      {industry.bullets.map((bullet) => (
                        <li key={bullet} className="flex gap-2">
                          <span className="mt-1 h-1.5 w-1.5 flex-none rounded-full bg-sky-500" />
                          <span>{bullet}</span>
                        </li>
                      ))}
                    </ul>
                  )}

                  <div className="mt-auto flex items-center justify-between gap-3 border-t border-slate-200 pt-3">
                    <Link
                      href={slug}
                      className="inline-flex items-center text-xs font-semibold text-sky-700 hover:text-sky-600"
                    >
                      View industry solution details
                      <span className="ml-1 inline-block translate-y-px">→</span>
                    </Link>
                    <span className="text-[10px] uppercase tracking-[0.18em] text-slate-500">
                      {String(position).padStart(2, "0")}
                    </span>
                  </div>
                </article>
              );
            })}
          </div>
        ) : (
          <p className="text-sm text-slate-600">
            Our industry pages are currently being updated. Please check back soon or{" "}
            <Link href="/contact-us/?topic=industries-enquiry" className="text-sky-700 underline">
              contact us
            </Link>
            with your industry, use case and project details.
          </p>
        )}
      </div>
    </section>
  );
}

export function IndustriesUsecaseMini() {
  return (
    <section
      id="industries-usecase-chips"
      className="bg-slate-950 py-16 sm:py-20 lg:py-24"
      data-animate="industries-tags"
    >
      <div className="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <div className="mb-8 max-w-2xl space-y-3">
          <h2 className="text-2xl font-bold tracking-tight text-slate-50 sm:text-3xl">
            Industries & use cases we work with
          </h2>
          <p className="text-sm text-slate-300 sm:text-base">
            We combine patterns from multiple domains – food delivery, travel, fintech, sports & fitness,
            healthcare, education and more – then adapt them to your specific operations, customers and
            compliance needs.
          </p>
        </div>

        <div className="flex flex-wrap gap-3 text-xs sm:text-sm" data-industry-tags>
          {industryTags.map((tag) => {
            const label = tag.short_name ?? "";
            const href = tag.slug ?? null;

            if (href) {
              return (
                <Link
                  key={href}
                  href={href}
                  className="inline-flex items-center rounded-full border border-slate-700 bg-slate-900/70 px-3 py-1 text-slate-100 transition-colors hover:border-sky-400 hover:bg-slate-900"
                >
                  <TagDot />
                  {label}
                </Link>
              );
            }

            return (
              <span
                key={label}
                className="inline-flex items-center rounded-full border border-slate-700 bg-slate-900/70 px-3 py-1 text-slate-100"
              >
                <TagDot />
                {label}
              </span>
            );
          })}
        </div>
      </div>
    </section>
  );
}

export function IndustriesOutcome() {
  return (
    <section
      id="industry-outcomes"
      className="border-t border-slate-200 bg-slate-900 py-16 sm:py-20 lg:py-24"
      data-animate="industries-outcomes"
    >
      <div className="mx-auto max-w-6xl space-y-8 px-4 sm:px-6 lg:px-8">
        <div className="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
          <div className="max-w-3xl space-y-3">
            <h2 className="text-2xl font-bold tracking-tight text-slate-50 sm:text-3xl">
              What industry projects look like in practice
            </h2>
            <p className="text-sm text-slate-300 sm:text-base">
              These are example outcomes from industry-specific web, mobile and SaaS projects. Exact
              numbers change per client, but the pattern is the same: clear scope, focused build and
              measurable impact on operations or revenue.
            </p>
          </div>
          <div className="max-w-sm space-y-2 text-xs text-slate-400">
            <p>
              We can walk you through similar stories in more detail on a call and share what would
              realistically apply to your business, stage and industry.
            </p>
            <Link
              href="/portfolio/"
              className="inline-flex items-center text-[11px] font-semibold uppercase tracking-[0.18em] text-sky-300 hover:text-sky-200"
            >
              Browse selected case studies
              <ExternalArrow />
            </Link>
          </div>
        </div>

        <div className="grid gap-5 sm:gap-6 md:grid-cols-2 lg:grid-cols-3">
          {INDUSTRY_OUTCOMES.map((outcome) => (
            <article
              key={outcome.label}
              className="flex flex-col rounded-2xl border border-slate-800 bg-slate-900/70 p-5 sm:p-6"
            >
              <p className="text-[11px] font-semibold uppercase tracking-[0.18em] text-sky-300">
                {outcome.label}
              </p>
              <h3 className="mt-2 text-sm font-semibold text-slate-50 sm:text-base">{outcome.headline}</h3>
              <p className="mt-2 text-xs font-medium text-emerald-300 sm:text-xs">{outcome.result}</p>
              <ul className="mt-3 space-y-1.5 text-[11px] text-slate-300 sm:text-xs">
                {outcome.bullets.map((bullet) => (
                  <li key={bullet} className="flex gap-2">
                    <span className="mt-1 h-1.5 w-1.5 flex-none rounded-full bg-sky-400" />
                    <span>{bullet}</span>
                  </li>
                ))}
              </ul>
              <div className="mt-4 border-t border-slate-800 pt-3">
                <Link
                  href={outcome.ctaHref}
                  className="inline-flex items-center text-[11px] font-semibold uppercase tracking-[0.18em] text-sky-300 hover:text-sky-200"
                >
                  {outcome.ctaLabel}
                  <ExternalArrow />
                </Link>
              </div>
            </article>
          ))}
        </div>

        <div className="mt-6 flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
          <p className="max-w-xl text-[11px] text-slate-400">
            Results like these depend on starting with a clear scope and focusing on the few flows that
            matter most – bookings, orders, payments, reporting or communication – instead of trying to
            build everything at once.
          </p>
          <Link
            href="/contact-us/?topic=industries-outcomes"
            className="mt-2 inline-flex items-center text-[11px] font-semibold uppercase tracking-[0.18em] text-sky-300 hover:text-sky-200"
          >
            Discuss what realistic outcomes look like for you
            <ExternalArrow />
          </Link>
        </div>
      </div>
    </section>
  );
}

export function IndustriesProcess() {
  return (
    <section
      id="industry-process"
      className="border-t border-slate-200 bg-slate-50 py-16 sm:py-20 lg:py-24"
      data-animate="industries-process"
    >
      <div className="mx-auto max-w-6xl space-y-8 px-4 sm:px-6 lg:px-8">
        <div className="max-w-3xl space-y-3">
          <h2 className="text-display-sm font-bold text-slate-900 sm:text-display-md md:text-display-lg">
            How we scope & deliver industry-specific projects
          </h2>
          <p className="text-sm text-slate-700 sm:text-base">
            Whether it is a food delivery app solution, a secure fintech platform, a sports management
            system or a healthcare portal, we follow a consistent process: understand your operations,
            design the right product shape, then build and support it with a tech stack that fits your
            stage and team.
          </p>
        </div>

        <div className="grid gap-5 sm:gap-6 md:grid-cols-2 lg:grid-cols-4">
          {PROCESS_STEPS.map((step) => (
            <div
              key={step.step}
              className="flex flex-col rounded-2xl border border-slate-200 bg-white p-5 shadow-sm shadow-slate-200/80 sm:p-6"
            >
              <p className="text-[11px] font-semibold uppercase tracking-[0.18em] text-sky-700">{step.step}</p>
              <h3 className="mt-2 text-sm font-semibold text-slate-900 sm:text-base">{step.title}</h3>
              <p className="mt-2 text-xs text-slate-700">{step.description}</p>
              <ul className="mt-3 space-y-1.5 text-[11px] text-slate-500">
                {step.bullets.map((bullet) => (
                  <li key={bullet}>{bullet}</li>
                ))}
              </ul>
            </div>
          ))}
        </div>

        <div className="mt-4 flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
          <p className="max-w-xl text-[11px] text-slate-600">
            This process stays the same whether you need a{" "}
            <span className="font-medium text-slate-900">food delivery app solution</span>, a{" "}
            <span className="font-medium text-slate-900">secure fintech platform</span>, a{" "}
            <span className="font-medium text-slate-900">sports management system</span> or a{" "}
            <span className="font-medium text-slate-900">healthtech portal</span>. The details change per
            industry, but the structure keeps projects predictable.
          </p>
          <Link
            href="/contact-us/?topic=industries-process"
            className="mt-2 inline-flex items-center text-[11px] font-semibold uppercase tracking-[0.18em] text-sky-700 hover:text-sky-600"
          >
            Talk through this process for your industry
            <ExternalArrow />
          </Link>
        </div>
      </div>
    </section>
  );
}

export function IndustriesTechstack() {
  return (
    <section
      id="industry-tech-stack"
      className="border-t border-slate-200 bg-white py-16 sm:py-20 lg:py-24"
      data-animate="industries-tech-stack"
    >
      <div className="mx-auto max-w-6xl space-y-8 px-4 sm:px-6 lg:px-8">
        <div className="max-w-3xl space-y-3">
          <h2 className="text-display-sm font-bold text-slate-900 sm:text-display-md md:text-display-lg">
            Technologies we use across industries
          </h2>
          <p className="text-sm text-slate-700 sm:text-base">
            Whether you need a food delivery app solution, a secure fintech platform, a travel and
            tourism app, a sports management system or a healthcare portal, we work with a modern,
            well-supported tech stack. That keeps your product easier to scale, maintain and hand
            over to future teams.
          </p>
        </div>

        <div className="grid gap-5 sm:gap-6 md:grid-cols-2 lg:grid-cols-3">
          <div className="flex flex-col rounded-2xl border border-slate-200 bg-slate-50 p-5 sm:p-6">
            <h3 className="text-sm font-semibold text-slate-900 sm:text-base">
              Frontend for dashboards & platforms
            </h3>
            <p className="mt-2 text-xs text-slate-700 sm:text-sm">
              Modern, component-based frontends for portals, admin panels and consumer apps.
            </p>
            <ul className="mt-3 space-y-1.5 text-[11px] text-slate-600 sm:text-xs">
              <li>
                <Link href="/technologies/reactjs/" className="font-medium text-sky-700 hover:text-sky-600">
                  React.js
                </Link>
                ,{" "}
                <Link href="/technologies/nextjs/" className="font-medium text-sky-700 hover:text-sky-600">
                  Next.js
                </Link>{" "}
                with{" "}
                <Link href="/technologies/typescript/" className="font-medium text-sky-700 hover:text-sky-600">
                  TypeScript
                </Link>{" "}
                and modern JavaScript
              </li>
              <li>
                <Link href="/technologies/tailwindcss/" className="font-medium text-sky-700 hover:text-sky-600">
                  Tailwind CSS
                </Link>{" "}
                and modular design systems
              </li>
              <li>SSR / SSG for SEO-driven platforms</li>
            </ul>
          </div>

          <div className="flex flex-col rounded-2xl border border-slate-200 bg-slate-50 p-5 sm:p-6">
            <h3 className="text-sm font-semibold text-slate-900 sm:text-base">
              Backend APIs & business logic
            </h3>
            <p className="mt-2 text-xs text-slate-700 sm:text-sm">
              Stable, well-structured APIs that encode your industry workflows and rules.
            </p>
            <ul className="mt-3 space-y-1.5 text-[11px] text-slate-600 sm:text-xs">
              <li>
                <Link href="/technologies/nodejs/" className="font-medium text-sky-700 hover:text-sky-600">
                  Node.js
                </Link>
                ,{" "}
                <Link href="/technologies/nestjs/" className="font-medium text-sky-700 hover:text-sky-600">
                  NestJS
                </Link>
                ,{" "}
                <Link href="/technologies/laravel/" className="font-medium text-sky-700 hover:text-sky-600">
                  Laravel
                </Link>{" "}
                / custom PHP MVC
              </li>
              <li>REST & JSON APIs, webhooks</li>
              <li>Auth, RBAC, multi-tenant setups</li>
            </ul>
          </div>

          <div className="flex flex-col rounded-2xl border border-slate-200 bg-slate-50 p-5 sm:p-6">
            <h3 className="text-sm font-semibold text-slate-900 sm:text-base">
              Mobile apps for on-the-go use
            </h3>
            <p className="mt-2 text-xs text-slate-700 sm:text-sm">
              Mobile application solutions for couriers, field teams, customers and managers.
            </p>
            <ul className="mt-3 space-y-1.5 text-[11px] text-slate-600 sm:text-xs">
              <li>
                <Link href="/technologies/flutter/" className="font-medium text-sky-700 hover:text-sky-600">
                  Flutter
                </Link>{" "}
                for iOS & Android
              </li>
              <li>Offline-first patterns where needed</li>
              <li>Push notifications & background jobs</li>
            </ul>
          </div>

          <div className="flex flex-col rounded-2xl border border-slate-200 bg-slate-50 p-5 sm:p-6">
            <h3 className="text-sm font-semibold text-slate-900 sm:text-base">
              Data, storage & analytics
            </h3>
            <p className="mt-2 text-xs text-slate-700 sm:text-sm">
              Data models tuned to your industry – from bookings and orders to ledgers and claims.
            </p>
            <ul className="mt-3 space-y-1.5 text-[11px] text-slate-600 sm:text-xs">
              <li>
                <Link href="/technologies/mysql/" className="font-medium text-sky-700 hover:text-sky-600">
                  MySQL
                </Link>
                ,{" "}
                <Link href="/technologies/postgresql/" className="font-medium text-sky-700 hover:text-sky-600">
                  PostgreSQL
                </Link>
                , Redis
              </li>
              <li>Structured audit trails & logs</li>
              <li>Reporting and analytics dashboards</li>
              <li>Exports for finance & operations teams</li>
            </ul>
          </div>

          <div className="flex flex-col rounded-2xl border border-slate-200 bg-slate-50 p-5 sm:p-6">
            <h3 className="text-sm font-semibold text-slate-900 sm:text-base">
              Cloud infrastructure & DevOps
            </h3>
            <p className="mt-2 text-xs text-slate-700 sm:text-sm">
              Practical deployments that match your traffic, budget and compliance needs.
            </p>
            <ul className="mt-3 space-y-1.5 text-[11px] text-slate-600 sm:text-xs">
              <li>
                <Link href="/technologies/aws/" className="font-medium text-sky-700 hover:text-sky-600">
                  AWS
                </Link>
                , DigitalOcean, managed VPS
              </li>
              <li>CI/CD pipelines, zero-downtime deploys</li>
              <li>Backups, monitoring & alerts</li>
              <li>Staging environments for safe testing</li>
            </ul>
          </div>

          <div className="flex flex-col rounded-2xl border border-slate-200 bg-slate-50 p-5 sm:p-6">
            <h3 className="text-sm font-semibold text-slate-900 sm:text-base">
              Payments, messaging & 3rd-party integrations
            </h3>
            <p className="mt-2 text-xs text-slate-700 sm:text-sm">
              Connect your app to the tools your industry already depends on.
            </p>
            <ul className="mt-3 space-y-1.5 text-[11px] text-slate-600 sm:text-xs">
              <li>Razorpay, Stripe, PayPal & payment gateways</li>
              <li>SMS, WhatsApp, email & push providers</li>
              <li>Maps, logistics & tracking APIs</li>
              <li>POS, CRM and ERP integrations where available</li>
            </ul>
          </div>
        </div>

        <div className="mt-4 flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
          <p className="max-w-xl text-[11px] text-slate-600">
            You do not have to decide the stack upfront. We start from your industry requirements,
            compliance needs and internal team capacity, then recommend a{" "}
            <span className="font-semibold text-slate-900">practical tech stack</span> – often combining your
            existing systems with new web, mobile or SaaS components.
          </p>
          <Link
            href="/technologies/"
            className="mt-2 inline-flex items-center text-[11px] font-semibold uppercase tracking-[0.18em] text-sky-700 hover:text-sky-600"
          >
            Explore our technologies in more detail
            <ExternalArrow />
          </Link>
        </div>
      </div>
    </section>
  );
}

export function IndustriesTechstackMini() {
  return (
    <section
      id="industries-tech-chips"
      className="bg-slate-950 py-16 sm:py-20 lg:py-24"
      data-animate="industries-tech-tags"
    >
      <div className="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <div className="mb-8 max-w-2xl space-y-3">
          <h2 className="text-2xl font-bold tracking-tight text-slate-50 sm:text-3xl">
            Technologies we use in industry projects
          </h2>
          <p className="text-sm text-slate-300 sm:text-base">
            These are some of the technologies we most often use for industry-specific app development –
            from mobile entertainment solutions and food delivery apps to secure fintech platforms and
            healthcare portals.
          </p>
        </div>

        <div className="flex flex-wrap gap-3 text-xs sm:text-sm" data-tech-tags>
          {technologyTags.map((tech) => {
            const label = tech.short_name ?? "";
            const slug = tech.slug ?? "#";

            return (
              <Link
                key={slug}
                href={slug}
                className="inline-flex items-center rounded-full border border-slate-700 bg-slate-900/70 px-3 py-1 text-slate-100 transition-colors hover:border-sky-400 hover:bg-slate-900"
              >
                <TagDot />
                {label}
              </Link>
            );
          })}
        </div>
      </div>
    </section>
  );
}

export function IndustriesUsecase() {
  return (
    <section
      id="industry-use-cases"
      className="bg-slate-50 py-16 sm:py-20 lg:py-24"
      data-animate="industries-use-cases"
    >
      <div className="mx-auto max-w-6xl space-y-8 px-4 sm:px-6 lg:px-8">
        <div className="max-w-3xl space-y-3">
          <h2 className="text-display-sm font-bold text-slate-900 sm:text-display-md md:text-display-lg">
            Common use cases we see across industries
          </h2>
          <p className="text-sm text-slate-700 sm:text-base">
            Many projects share the same core patterns: bookings, orders, payments, memberships,
            content, analytics and workflows – even if the industry label changes. Below are
            example use cases we regularly implement for entertainment, social, travel, sports &
            fitness, food delivery, ecommerce, fintech, real estate, healthcare and education.
          </p>
        </div>

        <div className="grid gap-5 sm:gap-6 md:grid-cols-2 lg:grid-cols-3">
          {USE_CASE_CARDS.map((card) => (
            <div
              key={card.label}
              className="flex flex-col rounded-2xl border border-slate-200 bg-white p-5 sm:p-6"
            >
              <p className="text-[11px] font-semibold uppercase tracking-[0.18em] text-sky-700">
                {card.label}
              </p>
              <h3 className="mt-2 text-sm font-semibold text-slate-900 sm:text-base">{card.title}</h3>
              <p className="mt-2 text-xs text-slate-700 sm:text-sm">{card.description}</p>
              <ul className="mt-3 space-y-1.5 text-[11px] text-slate-600 sm:text-xs">
                {card.bullets.map((bullet) => (
                  <li key={bullet}>{bullet}</li>
                ))}
              </ul>
            </div>
          ))}
        </div>

        <div className="mt-4 flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
          <p className="max-w-xl text-[11px] text-slate-600">
            If your idea does not fit neatly into one of these boxes, that is normal. Many of our
            projects blend{" "}
            <span className="font-semibold text-slate-900">
              ecommerce, content, bookings and SaaS-style subscriptions
            </span>
            . The important part is mapping your workflows so we can design a solution that fits how you
            actually operate.
          </p>
          <Link
            href="/contact-us/?topic=industries-use-cases"
            className="mt-2 inline-flex items-center text-[11px] font-semibold uppercase tracking-[0.18em] text-sky-700 hover:text-sky-600"
          >
            Discuss your specific use case
          </Link>
        </div>
      </div>
    </section>
  );
}

export function IndustriesTrust() {
  return (
    <section
      id="industry-social-proof"
      className="bg-white py-16 sm:py-20 lg:py-24"
      data-animate="industries-social-proof"
    >
      <div className="mx-auto max-w-6xl space-y-10 px-4 sm:px-6 lg:px-8">
        <div className="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
          <div className="max-w-3xl space-y-3">
            <h2 className="text-display-sm font-bold text-slate-900 sm:text-display-md md:text-display-lg">
              Trusted by teams across different industries
            </h2>
            <p className="text-sm text-slate-700 sm:text-base">
              We work with founders, product teams and operational leaders in home services,
              travel, fintech, ecommerce, sports & fitness, healthcare, education and more.
              The details of each platform change, but the expectations around reliability,
              clarity and support stay the same.
            </p>
          </div>
          <div className="max-w-sm text-xs text-slate-600">
            <p>
              On a call we can share anonymised examples that are closest to your context,
              and walk through what worked, what did not and how we adjusted over time.
            </p>
          </div>
        </div>

        <div className="grid gap-4 sm:grid-cols-3 sm:gap-5 lg:grid-cols-6">
          {TRUST_LOGOS.map((logo) => (
            <div
              key={logo.label}
              className="flex flex-col items-start rounded-xl border border-slate-200 bg-slate-50 px-3 py-3"
            >
              <span className="mb-2 flex h-7 w-7 items-center justify-center rounded-full bg-slate-200 text-[11px] text-slate-500">
                ★
              </span>
              <p className="text-[11px] font-semibold text-slate-900">{logo.label}</p>
              <p className="mt-0.5 text-[10px] text-slate-500">{logo.hint}</p>
            </div>
          ))}
        </div>

        <div className="grid gap-5 sm:gap-6 md:grid-cols-2">
          {TRUST_TESTIMONIALS.map((testimonial) => (
            <figure
              key={testimonial.role}
              className="flex flex-col rounded-2xl border border-slate-200 bg-slate-50 p-5 sm:p-6"
            >
              <blockquote className="text-sm leading-relaxed text-slate-800 sm:text-base">
                “{testimonial.quote}”
              </blockquote>
              <figcaption className="mt-3 text-[11px] text-slate-600">
                <span className="font-semibold text-slate-900">{testimonial.role}</span>
                <span className="mx-1">·</span>
                <span>{testimonial.region}</span>
              </figcaption>
            </figure>
          ))}
        </div>

        <div className="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
          <Link
            href="/portfolio/"
            className="inline-flex items-center text-[11px] font-semibold uppercase tracking-[0.18em] text-sky-700 hover:text-sky-600"
          >
            View more case studies & examples
            <ExternalArrow />
          </Link>
          <p className="max-w-xl text-[11px] text-slate-600">
            If you share a bit about your industry and current systems, we can point to the most
            relevant examples instead of generic success stories.
          </p>
        </div>
      </div>
    </section>
  );
}
