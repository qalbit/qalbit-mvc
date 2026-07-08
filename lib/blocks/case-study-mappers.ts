import type { FaqItem } from "@/lib/data";
import { asset } from "@/lib/site";
import type {
  BreadcrumbItem,
  CapabilityItem,
  CtaLink,
  MetricItem,
  ProcessStepItem,
  SnapshotItem,
} from "./types";

type JsonRecord = Record<string, unknown>;

function asRecord(value: unknown): JsonRecord {
  return value && typeof value === "object" && !Array.isArray(value) ? (value as JsonRecord) : {};
}

function asArray<T = unknown>(value: unknown): T[] {
  return Array.isArray(value) ? (value as T[]) : [];
}

function mapCta(raw: JsonRecord): CtaLink | undefined {
  const href = (raw.href ?? raw.url) as string | undefined;
  if (!href) return undefined;
  return {
    label: (raw.label as string) ?? "Contact us",
    href,
    external: href.startsWith("http"),
  };
}

export interface CaseStudyRecord {
  slug: string;
  name: string;
  sections?: JsonRecord;
  faq_key?: string;
  industry?: string;
  location?: string;
  banner?: string;
  bannerAlt?: string;
  h1?: string;
  summary?: string;
  services?: string[];
}

export interface CaseStudyHeroProps {
  breadcrumbLabel: string;
  eyebrow: string;
  industry?: string;
  title: string;
  subtitle?: string;
  snapshotCards: SnapshotItem[];
  primaryCta?: CtaLink;
  secondaryCta?: CtaLink;
  mediaSrc?: string;
  mediaAlt?: string;
  location?: string;
  caseStudyName: string;
}

export interface CaseStudyAboutProps {
  id: string;
  title: string;
  intro?: string;
  clientStory?: string;
  atAGlanceTitle: string;
  atAGlance: Array<{ label: string; value: string }>;
  industry?: string;
  location?: string;
}

export interface CaseStudyRelatedCtaProps {
  id: string;
  title: string;
  subtitle?: string;
  relatedCases: Array<{ name: string; summary?: string; href: string }>;
  servicesUsedTitle: string;
  servicesUsed: Array<{ label: string; href: string }>;
  finalCta?: {
    id: string;
    eyebrow?: string;
    title: string;
    text?: string;
    primary: CtaLink;
    secondary?: CtaLink;
  };
}

export function mapCaseStudyHero(caseStudy: CaseStudyRecord): CaseStudyHeroProps {
  const hero = asRecord(caseStudy.sections?.hero);
  const snapshot = asArray<JsonRecord>(hero.snapshot_cards).map((row) => ({
    label: (row.label as string) ?? "",
    value: (row.value as string) ?? "",
    note: (row.note as string) ?? undefined,
  })) as SnapshotItem[];

  const defaultSnapshot: SnapshotItem[] = [];
  if (caseStudy.industry) defaultSnapshot.push({ label: "Industry", value: caseStudy.industry });
  if (caseStudy.location) defaultSnapshot.push({ label: "Region", value: caseStudy.location });

  const media = asRecord(hero.hero_media);
  const mediaSrcRaw = (media.src as string) ?? caseStudy.banner;
  const mediaSrc = mediaSrcRaw ? asset(mediaSrcRaw.replace(/^\//, "")) : undefined;

  return {
    breadcrumbLabel: caseStudy.name,
    eyebrow: (hero.eyebrow as string) ?? "Case Study",
    industry: caseStudy.industry,
    title: (hero.title as string) ?? caseStudy.h1 ?? caseStudy.name,
    subtitle: (hero.subtitle as string) ?? caseStudy.summary,
    snapshotCards: snapshot.length > 0 ? snapshot : defaultSnapshot,
    primaryCta: mapCta(asRecord(hero.primary_cta)),
    secondaryCta: mapCta(asRecord(hero.secondary_cta)),
    mediaSrc,
    mediaAlt: (media.alt as string) ?? caseStudy.bannerAlt ?? caseStudy.name,
    location: caseStudy.location,
    caseStudyName: caseStudy.name,
  };
}

export function mapCaseStudyAbout(caseStudy: CaseStudyRecord): CaseStudyAboutProps | null {
  const about = asRecord(caseStudy.sections?.about);
  if (!about.title && !about.intro) return null;

  const glance = asArray<JsonRecord>(about.at_a_glance);
  const defaultGlance = [
    caseStudy.industry ? { label: "Industry", value: caseStudy.industry } : null,
    caseStudy.location ? { label: "Location", value: caseStudy.location } : null,
  ].filter(Boolean) as Array<{ label: string; value: string }>;

  const atAGlance =
    glance.length > 0
      ? glance.map((row) => ({
          label: (row.label as string) ?? "",
          value: (row.value as string) ?? "",
        }))
      : defaultGlance;

  return {
    id: (about.id as string) ?? "cs2-about",
    title: (about.title as string) ?? "About the client",
    intro: about.intro as string | undefined,
    clientStory: about.client_story as string | undefined,
    atAGlanceTitle: (about.at_a_glance_title as string) ?? "Client at a glance",
    atAGlance,
    industry: caseStudy.industry,
    location: caseStudy.location,
  };
}

export function mapCaseStudyChallenge(caseStudy: CaseStudyRecord) {
  const challenge = asRecord(caseStudy.sections?.challenge);
  if (!challenge.title && !challenge.challenges) return null;

  return {
    id: (challenge.id as string) ?? "cs3-challenge",
    title: challenge.title as string | undefined,
    beforeTitle: challenge.before_title as string | undefined,
    beforeStory: challenge.before_story as string | undefined,
    bulletsTitle: challenge.bullets_title as string | undefined,
    challenges: asArray<string>(challenge.challenges),
  };
}

export function mapCaseStudyGoals(caseStudy: CaseStudyRecord) {
  const goals = asRecord(caseStudy.sections?.goals);
  if (!goals.title && !goals.business_goals) return null;

  return {
    id: (goals.id as string) ?? "cs4-goals",
    title: goals.title as string | undefined,
    businessGoalsTitle: goals.business_goals_title as string | undefined,
    businessGoals: asArray<string>(goals.business_goals),
    productGoalsTitle: goals.product_goals_title as string | undefined,
    productGoals: asArray<string>(goals.product_goals),
    note: goals.note as string | undefined,
  };
}

export function mapCaseStudySolution(caseStudy: CaseStudyRecord) {
  const solution = asRecord(caseStudy.sections?.solution);
  if (!solution.title && !solution.body) return null;

  const highlights = asArray<string>(solution.highlight_strip);

  return {
    id: (solution.id as string) ?? "cs5-solution",
    title: (solution.title as string) ?? "Our solution",
    intro: solution.intro as string | undefined,
    leftTitle: highlights.length > 0 ? "Highlights" : undefined,
    leftItems: highlights,
    rightTitle: solution.body ? "Approach" : undefined,
    rightItems: solution.body ? [solution.body as string] : undefined,
    csSection: "solution",
  };
}

export function mapCaseStudyFeatures(caseStudy: CaseStudyRecord) {
  const features = asRecord(caseStudy.sections?.features);
  const items = asArray<JsonRecord>(features.items);
  if (!items.length && !features.title) return null;

  return {
    id: (features.id as string) ?? "cs6-features",
    eyebrow: features.subtitle as string | undefined,
    title: (features.title as string) ?? "Key features",
    items: items.map((item) => ({
      title: (item.name as string) ?? (item.title as string) ?? "",
      description: item.description as string | undefined,
    })) as CapabilityItem[],
    csSection: "features",
  };
}

export function mapCaseStudyStack(caseStudy: CaseStudyRecord) {
  const stack = asRecord(caseStudy.sections?.stack);
  if (!stack.title) return null;

  const backend = asArray<string>(stack.backend);
  const frontend = asArray<string>(stack.frontend);
  const categories: Array<{ title?: string; items?: string[] }> = [];
  if (backend.length > 0) {
    categories.push({ title: (stack.backend_title as string) ?? "Backend", items: backend });
  }
  if (frontend.length > 0) {
    categories.push({ title: (stack.frontend_title as string) ?? "Frontend", items: frontend });
  }

  return {
    id: (stack.id as string) ?? "cs7-stack",
    title: stack.title as string,
    categories,
    pills: asArray<string>(stack.tech_pills),
    csSection: "stack",
  };
}

export function mapCaseStudyProcess(caseStudy: CaseStudyRecord) {
  const process = asRecord(caseStudy.sections?.process);
  const steps = asArray<JsonRecord>(process.steps);
  if (!steps.length && !process.title) return null;

  return {
    id: (process.id as string) ?? "cs8-process",
    title: (process.title as string) ?? "Delivery process",
    steps: steps.map((step) => ({
      step: step.step as string | number | undefined,
      title: (step.name as string) ?? (step.title as string),
      description: step.description as string | undefined,
      duration: step.duration as string | undefined,
    })) as ProcessStepItem[],
    csSection: "process",
  };
}

export function mapCaseStudyResults(caseStudy: CaseStudyRecord) {
  const results = asRecord(caseStudy.sections?.results);
  if (!results.title && !results.metrics) return null;

  const testimonial = asRecord(results.testimonial);
  const inlineCta = asRecord(results.inline_cta);

  return {
    id: (results.id as string) ?? "cs9-results",
    title: results.title as string | undefined,
    subtitle: results.subtitle as string | undefined,
    metrics: asArray<JsonRecord>(results.metrics).map((m) => ({
      label: (m.label as string) ?? "",
      value: (m.value as string) ?? "",
      note: m.note as string | undefined,
    })) as MetricItem[],
    narrative: results.narrative as string | undefined,
    testimonial: testimonial.quote
      ? {
          quote: testimonial.quote as string,
          name: testimonial.name as string | undefined,
          role: testimonial.role as string | undefined,
        }
      : undefined,
    inlineCta: inlineCta.href
      ? {
          text: inlineCta.text as string | undefined,
          linkLabel: inlineCta.link_label as string | undefined,
          href: inlineCta.href as string,
        }
      : undefined,
  };
}

function mapServicesUsed(caseStudy: CaseStudyRecord, related: JsonRecord): Array<{ label: string; href: string }> {
  const servicesUsed = asArray<JsonRecord>(related.services_used);
  if (servicesUsed.length > 0) {
    return servicesUsed
      .map((svc) => ({
        label: (svc.label as string) ?? "",
        href: (svc.href as string) ?? "",
      }))
      .filter((svc) => svc.label && svc.href);
  }

  const topLevel = caseStudy.services ?? [];
  return topLevel.map((label) => {
    let href = "/services/";
    if (label.toLowerCase().includes("custom software")) href = "/services/custom-software-development/";
    else if (label.toLowerCase().includes("api")) href = "/services/api-development/";
    else if (label.toLowerCase().includes("mvp")) href = "/start-up-mvp/";
    return { label, href };
  });
}

export function mapCaseStudyRelatedCta(caseStudy: CaseStudyRecord): CaseStudyRelatedCtaProps | null {
  const related = asRecord(caseStudy.sections?.related);
  const finalCta = asRecord(caseStudy.sections?.final_cta);
  const relatedCases = asArray<JsonRecord>(related.case_studies)
    .map((cs) => ({
      name: (cs.name as string) ?? "",
      summary: cs.summary as string | undefined,
      href: (cs.slug as string) ?? "",
    }))
    .filter((cs) => cs.name && cs.href);

  const hasFinalCta = Boolean(finalCta.title);
  if (!relatedCases.length && !hasFinalCta && !mapServicesUsed(caseStudy, related).length) {
    return null;
  }

  const primary = mapCta(asRecord(finalCta.primary_cta));
  const secondary = mapCta(asRecord(finalCta.secondary_cta));

  return {
    id: (related.id as string) ?? "cs10-related",
    title: (related.title as string) ?? "Related case studies & services",
    subtitle:
      (related.subtitle as string) ??
      "See similar work and the services we typically combine for projects like this.",
    relatedCases,
    servicesUsedTitle: (related.services_used_title as string) ?? "Services used in this project",
    servicesUsed: mapServicesUsed(caseStudy, related),
    finalCta: hasFinalCta
      ? {
          id: (finalCta.id as string) ?? "cs10-final-cta",
          eyebrow: finalCta.eyebrow as string | undefined,
          title: finalCta.title as string,
          text: finalCta.text as string | undefined,
          primary: primary ?? { label: "Book a free consultation", href: "/contact-us/" },
          secondary,
        }
      : undefined,
  };
}

export function mapCaseStudyFaq(caseStudy: CaseStudyRecord, faqs: FaqItem[]) {
  if (!faqs.length) return null;
  return {
    title: "Frequently asked questions",
    faqs,
  };
}
