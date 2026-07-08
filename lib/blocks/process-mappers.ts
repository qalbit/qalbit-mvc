import type { ConfigEntity, FaqItem } from "@/lib/data";
import { getFaqsForKey } from "@/lib/data";
import type {
  EngagementModel,
  FaqBlockProps,
  FitSectionProps,
  ProcessProofSectionProps,
  ProcessStepItem,
  ProcessWhySectionProps,
  SnapshotItem,
} from "./types";

type JsonRecord = Record<string, unknown>;

export interface ProcessHeroProps {
  id?: string;
  breadcrumbLabel: string;
  kickerPrefix?: string;
  kickerDetail?: string;
  title: string;
  intro?: string;
  bullets: string[];
  primaryCta: { label: string; href: string; ariaLabel?: string };
  secondaryCta?: { label: string; href: string; external?: boolean; ariaLabel?: string };
  internalLinks: Array<{ label: string; href: string }>;
  trust?: {
    ratingLabel?: string;
    ratingText?: string;
    sources?: string[];
    location?: string;
  };
  snapshotTitle: string;
  snapshotItems: SnapshotItem[];
}

export interface ProcessServiceItem {
  key?: string;
  label: string;
  description?: string;
  note?: string;
  linkLabel?: string;
  linkHref?: string;
  models?: string[];
}

export interface ProcessServicesProps {
  id?: string;
  eyebrow?: string;
  title: string;
  intro?: string;
  items: ProcessServiceItem[];
  note?: string;
}

export interface ProcessTimelineProps {
  id?: string;
  eyebrow?: string;
  title: string;
  intro?: string;
  timelineNote?: string;
  steps: ProcessStepItem[];
}

export interface ProcessEngagementsProps {
  id?: string;
  title: string;
  intro?: string;
  models: EngagementModel[];
  note?: string;
}

export interface ProcessTechCategory {
  key?: string;
  label: string;
  description?: string;
  items?: string[];
}

export interface ProcessTechProps {
  id?: string;
  title: string;
  intro?: string;
  categories: ProcessTechCategory[];
  note?: string;
}

export interface ProcessFinalCtaProps {
  id?: string;
  eyebrow?: string;
  title: string;
  body?: string;
  primary: { label: string; href: string; external?: boolean; ariaLabel?: string };
  secondary?: { label: string; href: string; external?: boolean; ariaLabel?: string };
  meta?: string;
}

function asRecord(value: unknown): JsonRecord {
  return value && typeof value === "object" && !Array.isArray(value) ? (value as JsonRecord) : {};
}

function asArray<T = unknown>(value: unknown): T[] {
  return Array.isArray(value) ? (value as T[]) : [];
}

function mapCta(raw: JsonRecord) {
  const href = (raw.url ?? raw.href) as string | undefined;
  if (!href) return undefined;
  return {
    label: (raw.label as string) ?? "Contact us",
    href,
    external: href.startsWith("http") || href.startsWith("mailto:"),
    ariaLabel: (raw.aria as string) ?? (raw.aria_label as string) ?? undefined,
  };
}

export function mapProcessHero(entity: ConfigEntity): ProcessHeroProps | null {
  const hero = asRecord(entity.hero);
  const title = (hero.title as string) ?? entity.h1 ?? entity.name;
  if (!title) return null;

  const snapshot = asRecord(hero.snapshot);
  const snapshotItems = asArray<SnapshotItem>(snapshot.items);
  const trust = asRecord(hero.trust);

  const primary = mapCta(asRecord(hero.primary_cta));
  const secondary = mapCta(asRecord(hero.secondary_cta));

  return {
    id: (hero.id as string) ?? "mvp-hero",
    breadcrumbLabel:
      (hero.breadcrumb_label as string) ?? (hero.breadcrumb as string) ?? entity.name,
    kickerPrefix: (hero.kicker_prefix as string) ?? undefined,
    kickerDetail: (hero.kicker_detail as string) ?? undefined,
    title,
    intro: (hero.intro as string) ?? (entity.short_description as string) ?? undefined,
    bullets: asArray<string>(hero.bullets),
    primaryCta: primary ?? { label: "Discuss your MVP", href: "#mvp-final-cta" },
    secondaryCta: secondary,
    internalLinks: asArray<{ label: string; href: string }>(hero.internal_links),
    trust: {
      ratingLabel: trust.rating_label as string | undefined,
      ratingText: trust.rating_text as string | undefined,
      sources: asArray<string>(trust.sources),
      location: trust.location as string | undefined,
    },
    snapshotTitle: (snapshot.title as string) ?? "MVP dashboard snapshot",
    snapshotItems,
  };
}

export function mapProcessFit(entity: ConfigEntity): FitSectionProps | null {
  const fit = asRecord(entity.fit);
  const personas = asArray<JsonRecord>(fit.personas);
  if (!personas.length && !fit.title) return null;

  return {
    id: (fit.id as string) ?? "mvp-fit",
    title: (fit.title as string) ?? "Built for founders and product teams who need to move fast",
    intro: fit.intro as string | undefined,
    personas: personas.map((p) => ({
      key: p.key as string | undefined,
      label: (p.label as string) ?? "",
      situation: p.situation as string | undefined,
      help: p.help as string | undefined,
    })),
    problemsTitle:
      (fit.problems_title as string) ?? "Common problems we solve for startup MVPs",
    problems: asArray<string>(fit.problems),
  };
}

export function mapProcessServices(entity: ConfigEntity): ProcessServicesProps | null {
  const services = asRecord(entity.services);
  const items = asArray<JsonRecord>(services.items);
  if (!items.length && !services.title) return null;

  return {
    id: (services.id as string) ?? "mvp-services",
    eyebrow: services.eyebrow as string | undefined,
    title: (services.title as string) ?? "MVP development services we offer",
    intro: services.intro as string | undefined,
    items: items.map((item) => ({
      key: item.key as string | undefined,
      label: (item.label as string) ?? (item.title as string) ?? "",
      description: item.description as string | undefined,
      note: item.note as string | undefined,
      linkLabel: item.link_label as string | undefined,
      linkHref: item.link_href as string | undefined,
      models: asArray<string>(item.models),
    })),
    note: services.note as string | undefined,
  };
}

export function mapProcessTimeline(entity: ConfigEntity): ProcessTimelineProps | null {
  const process = asRecord(entity.process);
  const steps = asArray<JsonRecord>(process.steps);
  if (!steps.length && !process.title) return null;

  return {
    id: (process.id as string) ?? "mvp-process",
    eyebrow: process.eyebrow as string | undefined,
    title: (process.title as string) ?? "Our proven MVP development process",
    intro: process.intro as string | undefined,
    timelineNote: (process.timeline_note as string) ?? undefined,
    steps: steps.map((step, index) => ({
      step: (step.step as number | string) ?? index + 1,
      kicker: step.kicker as string | undefined,
      title: (step.title as string) ?? (step.label as string) ?? "Process step",
      description: step.description as string | undefined,
      outputs: step.outputs as string | undefined,
    })) as ProcessStepItem[],
  };
}

export function mapProcessEngagements(entity: ConfigEntity): ProcessEngagementsProps | null {
  const engagements = asRecord(entity.engagements);
  const models = asArray<JsonRecord>(engagements.models);
  if (!models.length && !engagements.title) return null;

  return {
    id: (engagements.id as string) ?? "mvp-engagements",
    title: (engagements.title as string) ?? "Engagement models and budget guidance",
    intro: engagements.intro as string | undefined,
    models: models.map((m) => ({
      key: m.key as string | undefined,
      label: (m.label as string) ?? "",
      badge: m.badge as string | undefined,
      duration: m.duration as string | undefined,
      description: m.description as string | undefined,
      bestFor: m.best_for as string | undefined,
      budgetRange: m.budget_range as string | undefined,
      deliverables: m.deliverables as string | undefined,
    })) as EngagementModel[],
    note: engagements.note as string | undefined,
  };
}

export function mapProcessProof(entity: ConfigEntity): ProcessProofSectionProps | null {
  const proof = asRecord(entity.proof);
  const cases = asArray<JsonRecord>(proof.cases);
  if (!proof.title && !cases.length) return null;

  return {
    id: (proof.id as string) ?? "process-proof",
    eyebrow: proof.eyebrow as string | undefined,
    title: proof.title as string | undefined,
    intro: proof.intro as string | undefined,
    cases: cases.map((c) => ({
      key: c.key as string | undefined,
      label: (c.label as string) ?? "Case study",
      badge: c.badge as string | undefined,
      description: c.description as string | undefined,
      stack: c.stack as string | undefined,
      outcome: c.outcome as string | undefined,
      impact: c.impact as string | undefined,
      linkLabel: c.link_label as string | undefined,
      linkHref: c.link_href as string | undefined,
    })),
    summaryNote: proof.summary_note as string | undefined,
  };
}

export function mapProcessTech(entity: ConfigEntity): ProcessTechProps | null {
  const tech = asRecord(entity.tech);
  const categories = asArray<JsonRecord>(tech.categories);
  if (!categories.length && !tech.title) return null;

  return {
    id: (tech.id as string) ?? "mvp-tech",
    title: (tech.title as string) ?? "Tech stack & delivery capabilities",
    intro: tech.intro as string | undefined,
    note: tech.note as string | undefined,
    categories: categories.map((cat) => ({
      key: (cat.key as string) ?? (cat.label as string) ?? (cat.name as string),
      label: (cat.label as string) ?? (cat.name as string) ?? "Capability",
      description: cat.description as string | undefined,
      items: asArray<string>(cat.items),
    })),
  };
}

export function mapProcessWhy(entity: ConfigEntity): ProcessWhySectionProps | null {
  const why = asRecord(entity.why);
  const reasons = asArray<JsonRecord>(why.reasons);
  if (!reasons.length && !why.title) return null;

  const testimonials = asArray<JsonRecord>(why.testimonials);

  return {
    id: (why.id as string) ?? "mvp-why",
    title: (why.title as string) ?? "Why QalbIT for your Startup MVP",
    intro: why.intro as string | undefined,
    reasons: reasons.map((r) => ({
      key: r.key as string | undefined,
      label: (r.label as string) ?? "",
      description: r.description as string | undefined,
      points: asArray<string>(r.points),
    })),
    testimonials: testimonials.map((t) => ({
      quote: (t.quote as string) ?? "",
      attribution: (t.attribution as string) ?? undefined,
    })),
  };
}

export function mapProcessFaq(entity: ConfigEntity, faqs: FaqItem[]): FaqBlockProps | null {
  const resolvedFaqs =
    faqs.length > 0 ? faqs : getFaqsForKey(entity.faq_key as string | undefined);
  if (!resolvedFaqs.length) return null;

  return {
    id: "faqs",
    title: (entity.faq_title as string) ?? `Frequently asked questions about ${entity.name}`,
    subtitle: (entity.faq_subtitle as string) ?? undefined,
    bullets: asArray<string>(entity.faq_bullets),
    faqs: resolvedFaqs,
    mvpHooks: true,
  };
}

export function mapProcessFinalCta(entity: ConfigEntity): ProcessFinalCtaProps | null {
  const cta = asRecord(entity.final_cta);
  if (!cta.title) return null;

  const primaryHref = (cta.primary_url ?? cta.primary_href) as string | undefined;
  if (!primaryHref) return null;

  const secondaryHref = (cta.secondary_url ?? cta.secondary_href) as string | undefined;

  return {
    id: (cta.id as string) ?? "mvp-final-cta",
    eyebrow: cta.eyebrow as string | undefined,
    title: cta.title as string,
    body: (cta.body as string) ?? undefined,
    primary: {
      label: (cta.primary_label as string) ?? "Contact us",
      href: primaryHref,
      external: primaryHref.startsWith("http"),
      ariaLabel: cta.primary_aria as string | undefined,
    },
    secondary: secondaryHref
      ? {
          label: (cta.secondary_label as string) ?? "Learn more",
          href: secondaryHref,
          external: secondaryHref.startsWith("http") || secondaryHref.startsWith("mailto:"),
          ariaLabel: cta.secondary_aria as string | undefined,
        }
      : undefined,
    meta: cta.meta as string | undefined,
  };
}
