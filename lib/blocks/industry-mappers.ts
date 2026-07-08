import type { ConfigEntity, FaqItem } from "@/lib/data";
import type { BreadcrumbItem, FaqBlockProps } from "./types";

type JsonRecord = Record<string, unknown>;

function asRecord(value: unknown): JsonRecord {
  return value && typeof value === "object" && !Array.isArray(value) ? (value as JsonRecord) : {};
}

function asArray<T = unknown>(value: unknown): T[] {
  return Array.isArray(value) ? (value as T[]) : [];
}

function slugBreadcrumbLabel(slug: string): string {
  const path = slug.replace(/^\/|\/$/g, "");
  const last = path.split("/").pop() ?? "industry";
  return last.replace(/-/g, " ").replace(/\b\w/g, (c) => c.toUpperCase());
}

export interface IndustryHeroProps {
  breadcrumbLabel: string;
  kickerPrefix: string;
  kickerLabel: string;
  kickerDetail?: string;
  title: string;
  intro: string;
  primaryCta: { label: string; href: string };
  secondaryCta: { label: string; href: string; external?: boolean };
  snapshotTitle: string;
  snapshot: Array<{ label: string; value: string }>;
}

export interface IndustryOverviewProps {
  id: string;
  eyebrow: string;
  title: string;
  intro: string;
  leftTitle: string;
  leftItems: string[];
  rightTitle: string;
  rightItems: string[];
  note: string;
}

export interface IndustryCapabilityItem {
  label: string;
  description?: string;
  badge?: string;
  icon?: string;
}

export interface IndustryCapabilitiesProps {
  id: string;
  eyebrow: string;
  title: string;
  intro: string;
  items: IndustryCapabilityItem[];
  cta?: { label: string; href: string };
}

export interface IndustryProcessStep {
  step: number;
  title: string;
  description?: string;
  duration?: string;
  outcome?: string;
  icon?: string;
}

export interface IndustryProcessProps {
  id: string;
  eyebrow: string;
  title: string;
  intro: string;
  steps: IndustryProcessStep[];
  cta?: { label: string; href: string };
}

export interface IndustryUseCaseItem {
  label: string;
  description?: string;
  audience?: string;
  badge?: string;
  link?: { label: string; href: string };
}

export interface IndustryUseCasesProps {
  id: string;
  eyebrow: string;
  title: string;
  intro: string;
  items: IndustryUseCaseItem[];
  cta?: { label: string; href: string };
}

export interface IndustryStackCategory {
  name: string;
  description?: string;
  items: string[];
}

export interface IndustryTechStackProps {
  id: string;
  eyebrow: string;
  title: string;
  intro: string;
  note: string;
  categories: IndustryStackCategory[];
}

export interface IndustryCtaProps {
  eyebrow: string;
  title: string;
  body: string;
  primary: { label: string; href: string; ariaLabel?: string };
  secondary?: { label: string; href: string; ariaLabel?: string };
  meta?: string;
}

const DEFAULT_OVERVIEW_LEFT = [
  "You want to ship a first version (MVP) with a clear scope.",
  "You have an existing product that needs refactoring or new modules.",
  "You need a partner who can work end-to-end rather than just coding to tickets.",
];

const DEFAULT_OVERVIEW_RIGHT = [
  "Clear scope and priorities aligned with business outcomes.",
  "Predictable delivery with frequent, frictionless releases.",
  "Codebase and architecture that are easier to extend over time.",
];

const DEFAULT_CAPABILITIES: IndustryCapabilityItem[] = [
  {
    label: "Discovery and solution design",
    description: "Clarify goals, constraints and architecture before committing to long builds.",
    badge: "Discovery",
  },
  {
    label: "End-to-end implementation",
    description: "Frontend, backend, APIs and integrations implemented by one aligned team.",
    badge: "Delivery",
  },
  {
    label: "Long-term support & growth",
    description: "Stabilise, monitor and extend your product with an ongoing roadmap.",
    badge: "Growth",
  },
];

const DEFAULT_PROCESS_STEPS: IndustryProcessStep[] = [
  {
    step: 1,
    title: "Discovery & planning",
    description: "Clarify goals, users, scope and constraints before we commit to a detailed plan.",
    duration: "Up to 2 weeks",
    outcome: "Discovery notes, high-level backlog, initial estimates.",
  },
  {
    step: 2,
    title: "Design & architecture",
    description: "Define UX flows, architecture and technical decisions to reduce risk before development.",
    duration: "1–3 weeks",
    outcome: "User flows, screens and system design ready for implementation.",
  },
  {
    step: 3,
    title: "Build, test & launch",
    description: "Iterative implementation, QA and deployment to your preferred environment.",
    duration: "Varies by scope",
    outcome: "Live product and a clear roadmap for next iterations.",
  },
];

const DEFAULT_USE_CASES: IndustryUseCaseItem[] = [
  {
    label: "You are planning a new digital product",
    description:
      "You have a clear problem to solve and want a partner to design and build the first reliable version, not just a quick prototype.",
    audience: "Founders, product teams",
  },
  {
    label: "You want to modernise or rebuild an existing system",
    description:
      "Your current tool is slow, fragile or expensive to maintain, and you want a cleaner, modern stack with room for growth.",
    audience: "SMBs, growing companies",
  },
  {
    label: "You need a long-term product partner",
    description:
      "You want a small, senior team that understands your domain and can own roadmaps, releases and technical decisions with you.",
    audience: "Businesses where software is core",
  },
];

const DEFAULT_STACK_CATEGORIES: IndustryStackCategory[] = [
  {
    name: "Backend & APIs",
    description: "Core application logic, authentication, multi-tenancy and integrations.",
    items: [
      "Laravel (PHP 8.x) for opinionated, secure SaaS backends",
      "NestJS (TypeScript) for API-first and microservice-style projects",
      "REST, webhooks and background jobs for integrations",
    ],
  },
  {
    name: "Frontend & dashboards",
    description: "Responsive interfaces for admin, customer and partner portals.",
    items: [
      "Next.js / React for rich SaaS dashboards",
      "Blade + Tailwind CSS for marketing and content pages",
      "Component libraries tailored per-project (no heavy, bloated UI kits)",
    ],
  },
  {
    name: "Data & infrastructure",
    description: "Storage, performance and reliability for your product data.",
    items: [
      "MySQL / PostgreSQL for relational data",
      "Redis for caching and queues",
      "AWS / DigitalOcean / managed cloud for hosting and scalability",
    ],
  },
  {
    name: "Payments, auth & observability",
    description: "The parts around the product that keep it safe and monetised.",
    items: [
      "Stripe, Paddle, Razorpay for billing and subscriptions",
      "OAuth, SSO and JWT-based auth flows",
      "Monitoring, logging and error tracking baked into delivery",
    ],
  },
];

export function mapIndustryBreadcrumbs(entity: ConfigEntity): BreadcrumbItem[] {
  const hero = asRecord(entity.hero);
  const label = (hero.breadcrumb_label as string) ?? slugBreadcrumbLabel(entity.slug);
  return [{ label: "Home", href: "/" }, { label: "Industries", href: "/industries/" }, { label }];
}

export function mapIndustryHero(entity: ConfigEntity): IndustryHeroProps {
  const hero = asRecord(entity.hero);
  const snapshot = asArray<{ label: string; value: string }>(hero.snapshot);

  const primaryHref = (hero.primary_cta_href as string) ?? "/contact-us/";
  const secondaryHref = (hero.secondary_cta_href as string) ?? "#industry-categories";

  return {
    breadcrumbLabel: (hero.breadcrumb_label as string) ?? slugBreadcrumbLabel(entity.slug),
    kickerPrefix: (hero.kicker_prefix as string) ?? "Industries",
    kickerLabel: (hero.kicker_label as string) ?? entity.name,
    kickerDetail: hero.kicker_detail as string | undefined,
    title:
      (hero.title as string) ??
      `Industry-specific software for <span class="text-gradient-brand-animated">${entity.name}</span>.`,
    intro:
      (hero.intro as string) ??
      "QalbIT designs and builds industry-specific web, mobile and SaaS solutions around your real workflows, compliance needs and growth goals – not generic templates.",
    primaryCta: {
      label: (hero.primary_cta_label as string) ?? "Discuss your industry use case",
      href: primaryHref,
    },
    secondaryCta: {
      label: (hero.secondary_cta_label as string) ?? "View industries by category",
      href: secondaryHref,
      external: secondaryHref.startsWith("http"),
    },
    snapshotTitle: (hero.snapshot_title as string) ?? "Industry snapshot",
    snapshot:
      snapshot.length > 0
        ? snapshot
        : [
            { label: "Core focus", value: entity.name },
            { label: "Typical project types", value: "Platforms, portals, mobile apps" },
            { label: "Engagements", value: "Discovery, MVP, modernisation & support" },
            { label: "Delivery model", value: "Founder-led, senior engineers" },
          ],
  };
}

export function mapIndustryOverview(entity: ConfigEntity): IndustryOverviewProps {
  const overview = asRecord(entity.overview);
  const leftItems = asArray<string>(overview.left_items);
  const rightItems = asArray<string>(overview.right_items);

  return {
    id: (overview.id as string) ?? "industry-overview",
    eyebrow: (overview.eyebrow as string) ?? "Overview",
    title: (overview.title as string) ?? `${entity.name} – where it fits and what we deliver`,
    intro:
      (overview.intro as string) ??
      "Here is how this industry fits into your product roadmap, and the kind of outcomes we typically focus on.",
    leftTitle: (overview.left_title as string) ?? "Where this industry fits best",
    leftItems: leftItems.length ? leftItems : DEFAULT_OVERVIEW_LEFT,
    rightTitle: (overview.right_title as string) ?? "Typical outcomes we aim for",
    rightItems: rightItems.length ? rightItems : DEFAULT_OVERVIEW_RIGHT,
    note:
      (overview.note as string) ??
      "We adjust the approach based on your product stage, team capacity and budgets.",
  };
}

function mapCtaLink(raw: JsonRecord): { label: string; href: string } | undefined {
  const href = (raw.url ?? raw.href) as string | undefined;
  if (!href) return undefined;
  return { label: (raw.label as string) ?? "Contact us", href };
}

export function mapIndustryCapabilities(entity: ConfigEntity): IndustryCapabilitiesProps {
  const cap = asRecord(entity.capabilities);
  const rawItems = asArray<JsonRecord>(cap.items);

  const items: IndustryCapabilityItem[] =
    rawItems.length > 0
      ? rawItems.map((item) => ({
          label: (item.label as string) ?? "",
          description: item.description as string | undefined,
          badge: item.badge as string | undefined,
          icon: item.icon as string | undefined,
        }))
      : DEFAULT_CAPABILITIES;

  return {
    id: (cap.id as string) ?? "industry-capabilities",
    eyebrow: (cap.eyebrow as string) ?? "What we can build for you",
    title: (cap.title as string) ?? `${entity.name} capabilities we usually take ownership of`,
    intro:
      (cap.intro as string) ??
      "Here are the typical modules, flows and responsibilities we take on for this industry.",
    items,
    cta: mapCtaLink(asRecord(cap.cta)),
  };
}

export function mapIndustryProcess(entity: ConfigEntity): IndustryProcessProps {
  const process = asRecord(entity.process);
  const rawSteps = asArray<JsonRecord>(process.items ?? process.steps);

  const steps: IndustryProcessStep[] =
    rawSteps.length > 0
      ? rawSteps.map((item, index) => ({
          step: Number(item.step ?? index + 1),
          title: (item.title as string) ?? "",
          description: item.description as string | undefined,
          duration: item.duration as string | undefined,
          outcome: item.outcome as string | undefined,
          icon: item.icon as string | undefined,
        }))
      : DEFAULT_PROCESS_STEPS;

  return {
    id: (process.id as string) ?? "industry-process",
    eyebrow: (process.eyebrow as string) ?? "How we typically run this industry",
    title: (process.title as string) ?? `How ${entity.name} works with QalbIT`,
    intro:
      (process.intro as string) ??
      "We break work into practical phases so you always know what is happening now, what is next and what is expected from your side.",
    steps,
    cta: mapCtaLink(asRecord(process.cta)),
  };
}

export function mapIndustryUseCases(entity: ConfigEntity): IndustryUseCasesProps {
  const useCases = asRecord(entity.use_cases);
  const rawItems = asArray<JsonRecord>(useCases.items);

  const items: IndustryUseCaseItem[] =
    rawItems.length > 0
      ? rawItems.map((item) => {
          const link = asRecord(item.link);
          const linkHref = (link.url ?? link.href) as string | undefined;
          return {
            label: (item.label as string) ?? "",
            description: item.description as string | undefined,
            audience: item.audience as string | undefined,
            badge: item.badge as string | undefined,
            link:
              linkHref
                ? { label: (link.label as string) ?? "Learn more", href: linkHref }
                : undefined,
          };
        })
      : DEFAULT_USE_CASES;

  return {
    id: (useCases.id as string) ?? "industry-use-cases",
    eyebrow: (useCases.eyebrow as string) ?? "Where this industry fits best",
    title: (useCases.title as string) ?? `When to choose ${entity.name} with QalbIT`,
    intro:
      (useCases.intro as string) ??
      "Here are typical scenarios where this industry is the right fit, based on projects we run most often.",
    items,
    cta: mapCtaLink(asRecord(useCases.cta)),
  };
}

export function mapIndustryTechStack(entity: ConfigEntity): IndustryTechStackProps {
  const stack = asRecord(entity.stack);
  const rawCategories = asArray<JsonRecord>(stack.categories);

  const categories: IndustryStackCategory[] =
    rawCategories.length > 0
      ? rawCategories.map((cat) => ({
          name: (cat.name ?? cat.title) as string,
          description: cat.description as string | undefined,
          items: asArray<string>(cat.items),
        }))
      : DEFAULT_STACK_CATEGORIES;

  return {
    id: (stack.id as string) ?? "industry-tech-stack",
    eyebrow: (stack.eyebrow as string) ?? "Tech stack & tooling",
    title: (stack.title as string) ?? `Stack we commonly use for ${entity.name}`,
    intro:
      (stack.intro as string) ??
      "We do not force a single stack everywhere. Instead, we pick technologies that match your product, team and constraints. These are the tools we reach for most often.",
    note:
      (stack.note as string) ??
      "If you already have a live product, we will review your current stack and keep what makes sense before suggesting any changes.",
    categories,
  };
}

export function mapIndustryCta(entity: ConfigEntity): IndustryCtaProps | null {
  const cta = asRecord(entity.cta);
  if (cta.enabled === false) return null;

  const primaryUrl = (cta.primary_url as string) ?? "/contact-us/";
  const secondaryUrl = cta.secondary_url as string | undefined;

  return {
    eyebrow: (cta.eyebrow as string) ?? "Ready to get started?",
    title:
      (cta.title as string) ?? `Discuss your ${entity.name.toLowerCase()} roadmap with QalbIT.`,
    body:
      (cta.body as string) ??
      `Tell us about your goals, timelines and constraints and we will suggest a practical way to move your ${entity.name.toLowerCase()} forward.`,
    primary: {
      label: (cta.primary_label as string) ?? "Book a consultation",
      href: primaryUrl,
      ariaLabel: cta.primary_aria as string | undefined,
    },
    secondary: secondaryUrl
      ? {
          label: (cta.secondary_label as string) ?? "Learn more",
          href: secondaryUrl,
          ariaLabel: cta.secondary_aria as string | undefined,
        }
      : undefined,
    meta: (cta.meta as string) ?? "Typically we respond within 24–48 hours.",
  };
}

export function mapIndustryFaq(entity: ConfigEntity, faqs: FaqItem[]): FaqBlockProps | null {
  if (!faqs.length) return null;

  return {
    id: "faqs",
    title:
      (entity.faq_title as string) ??
      `Frequently asked questions about ${entity.name.toLowerCase()} with QalbIT`,
    subtitle:
      (entity.faq_subtitle as string) ??
      `These are some of the questions we usually answer on early calls for ${entity.name.toLowerCase()}.`,
    bullets: asArray<string>(entity.faq_bullets),
    faqs,
  };
}
