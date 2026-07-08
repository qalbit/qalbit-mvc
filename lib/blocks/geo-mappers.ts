import type { FaqItem } from "@/lib/data";
import type { GeoLocation } from "@/lib/data";
import type {
  BreadcrumbItem,
  CapabilityItem,
  CardGridBlockProps,
  EngagementModel,
  FaqBlockProps,
  ProcessStepItem,
  TechCategory,
} from "./types";

type JsonRecord = Record<string, unknown>;

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
    external: href.startsWith("http"),
  };
}

export interface GeoHeroBlockProps {
  id?: string;
  stateKey?: string;
  breadcrumbs: BreadcrumbItem[];
  eyebrow?: string;
  stateLabel?: string;
  title: string;
  subtitle?: string;
  body?: string;
  primaryCta?: { label: string; href: string; external?: boolean };
  secondaryCta?: { label: string; href: string; external?: boolean };
  trustLabel?: string;
  trustItems?: string[];
  countryName?: string;
  highlights?: Array<{ label: string; description?: string }>;
}

export interface GeoAboutBlockProps {
  id?: string;
  stateKey?: string;
  eyebrow?: string;
  title?: string;
  intro?: string;
  stateLabel?: string;
  highlights?: Array<{ label: string; description?: string }>;
}

export function mapGeoBreadcrumbs(location: GeoLocation): BreadcrumbItem[] {
  const crumbs = location.seo?.breadcrumbs;
  if (crumbs?.length) {
    return crumbs.map((c) => ({
      label: c.label,
      href: c.url !== location.slug ? c.url : undefined,
    }));
  }

  return [
    { label: "Home", href: "/" },
    { label: location.country_name, href: `/${location.country_key}/` },
    { label: location.name },
  ];
}

export function mapGeoHero(location: GeoLocation, breadcrumbs: BreadcrumbItem[]): GeoHeroBlockProps | null {
  const sections = asRecord(location.sections);
  const hero = asRecord(sections.hero);
  const summary = asRecord(location.summary);
  const seo = location.seo ?? {};

  const title =
    (hero.title as string) ??
    seo.h1 ??
    location.headline ??
    location.name;

  if (!title) return null;

  const trust = asRecord(hero.trust);
  const trustItems = asArray<JsonRecord>(trust.items)
    .map((item) => item.label as string)
    .filter(Boolean);

  const about = asRecord(sections.about);
  const highlights = asArray<JsonRecord>(about.highlights)
    .filter((h) => h.label)
    .slice(0, 3)
    .map((h) => ({
      label: h.label as string,
      description: h.description as string | undefined,
    }));

  return {
    id: (hero.id as string) ?? "location-hero",
    stateKey: location.state_key,
    breadcrumbs,
    eyebrow: (hero.eyebrow as string) ?? (summary.eyebrow as string) ?? undefined,
    stateLabel: location.short_name ?? location.name,
    title,
    subtitle: (hero.subtitle as string) ?? undefined,
    body: (hero.body as string) ?? undefined,
    primaryCta: mapCta(asRecord(hero.primary_cta)),
    secondaryCta: mapCta(asRecord(hero.secondary_cta)),
    trustLabel: trust.label as string | undefined,
    trustItems,
    countryName: location.country_name,
    highlights,
  };
}

export function mapGeoAbout(location: GeoLocation): GeoAboutBlockProps | null {
  const about = asRecord(asRecord(location.sections).about);
  if (!about.title && !about.intro) return null;

  const highlights = asArray<JsonRecord>(about.highlights)
    .filter((h) => h.label)
    .map((h) => ({
      label: h.label as string,
      description: h.description as string | undefined,
    }));

  return {
    id: (about.id as string) ?? "location-about",
    stateKey: location.state_key,
    eyebrow: about.eyebrow as string | undefined,
    title: about.title as string | undefined,
    intro: about.intro as string | undefined,
    stateLabel: location.short_name ?? location.name,
    highlights,
  };
}

export function mapGeoServices(location: GeoLocation) {
  const services = asRecord(asRecord(location.sections).services);
  const items = asArray<JsonRecord>(services.items);
  if (!items.length && !services.title) return null;

  return {
    id: (services.id as string) ?? "location-services",
    eyebrow: services.eyebrow as string | undefined,
    title: services.title as string | undefined,
    intro: services.intro as string | undefined,
    stateLabel: location.short_name ?? location.name,
    stateKey: location.state_key,
    items: items.map((item) => ({
      title: (item.label as string) ?? (item.title as string) ?? "",
      description: item.description as string | undefined,
      href: (item.url as string) ?? undefined,
      badge: item.key as string | undefined,
    })),
  };
}

export function mapGeoWhy(location: GeoLocation) {
  const why = asRecord(asRecord(location.sections).why);
  const reasons = asArray<JsonRecord>(why.reasons);
  if (!reasons.length && !why.title) return null;

  return {
    id: (why.id as string) ?? "location-why",
    stateKey: location.state_key,
    stateLabel: location.short_name ?? location.name,
    eyebrow: why.eyebrow as string | undefined,
    title: (why.title as string) ?? "Why QalbIT",
    intro: why.intro as string | undefined,
    items: reasons.map((r) => ({
      label: (r.label as string) ?? "",
      description: r.description as string | undefined,
      bullets: asArray<string>(r.bullets).filter(Boolean),
    })) as CapabilityItem[],
  };
}

export function mapGeoProcess(location: GeoLocation) {
  const process = asRecord(asRecord(location.sections).process);
  const steps = asArray<JsonRecord>(process.steps);
  if (!steps.length && !process.title) return null;

  const links = asArray<JsonRecord>(process.links)
    .filter((link) => link.label && link.url)
    .map((link) => ({
      label: link.label as string,
      href: link.url as string,
    }));

  return {
    id: (process.id as string) ?? "location-process",
    stateKey: location.state_key,
    stateLabel: location.short_name ?? location.name,
    eyebrow: process.eyebrow as string | undefined,
    title: (process.title as string) ?? "Our process",
    intro: process.intro as string | undefined,
    steps: steps.map((step, index) => {
      const related = step.related as string | undefined;
      return {
        step: index + 1,
        label: (step.label as string) ?? (step.title as string),
        description: step.description as string | undefined,
        related,
        relatedUrl: related ? `/${related.replace(/^\/|\/$/g, "")}/` : undefined,
      };
    }) as ProcessStepItem[],
    links,
  };
}

export function mapGeoEngagements(location: GeoLocation) {
  const engagements = asRecord(asRecord(location.sections).engagements);
  const models = asArray<JsonRecord>(engagements.models);
  if (!models.length && !engagements.title) return null;

  return {
    id: (engagements.id as string) ?? "location-engagements",
    stateKey: location.state_key,
    stateLabel: location.short_name ?? location.name,
    eyebrow: engagements.eyebrow as string | undefined,
    title: engagements.title as string | undefined,
    intro: engagements.intro as string | undefined,
    models: models.map((m) => ({
      key: m.key as string | undefined,
      label: (m.label as string) ?? "",
      description: m.description as string | undefined,
      bestFor: m.best_for as string | undefined,
      href: (m.link as string) ?? undefined,
    })) as EngagementModel[],
  };
}

export function mapGeoTech(location: GeoLocation) {
  const tech = asRecord(asRecord(location.sections).tech);
  const categories = asArray<JsonRecord>(tech.categories);
  if (!categories.length && !tech.title) return null;

  const links = asArray<JsonRecord>(tech.links)
    .filter((link) => link.label && link.url)
    .map((link) => ({
      label: link.label as string,
      href: link.url as string,
    }));

  return {
    id: (tech.id as string) ?? "location-tech",
    stateKey: location.state_key,
    stateLabel: location.short_name ?? location.name,
    eyebrow: tech.eyebrow as string | undefined,
    title: (tech.title as string) ?? "Tech stack",
    intro: tech.intro as string | undefined,
    categories: categories.map((cat) => ({
      name: (cat.label as string) ?? (cat.name as string),
      items: asArray<string>(cat.items),
    })) as TechCategory[],
    links,
  };
}

export function mapGeoProof(location: GeoLocation) {
  const proof = asRecord(asRecord(location.sections).proof);
  const cases = asArray<JsonRecord>(proof.cases);
  const testimonials = asArray<JsonRecord>(proof.testimonials);
  if (!proof.title && !cases.length) return null;

  return {
    id: (proof.id as string) ?? "location-proof",
    eyebrow: proof.eyebrow as string | undefined,
    title: proof.title as string | undefined,
    intro: proof.intro as string | undefined,
    stateKey: location.state_key,
    cases: cases.map((c) => ({
      label: c.label as string | undefined,
      industry: c.industry as string | undefined,
      region: c.region as string | undefined,
      headline: c.headline as string | undefined,
      result: c.result as string | undefined,
      href: c.url as string | undefined,
    })),
    testimonials: testimonials.map((t) => ({
      quote: (t.quote as string) ?? "",
      name: t.name as string | undefined,
      role: t.role as string | undefined,
      title: t.title as string | undefined,
      region: t.region as string | undefined,
    })),
  };
}

export function mapGeoFaq(location: GeoLocation, faqs: FaqItem[]): FaqBlockProps | null {
  if (!faqs.length) return null;

  return {
    id: "faqs",
    title:
      location.faq_title ??
      `Frequently asked questions about ${location.name}`,
    subtitle: location.faq_subtitle ?? undefined,
    bullets: location.faq_bullets ?? undefined,
    faqs,
  };
}

export function mapGeoCountryIndex(
  countryKey: string,
  countryName: string,
  locations: GeoLocation[],
): CardGridBlockProps {
  const eyebrow = `${countryName.toUpperCase()} · Locations`;

  return {
    id: `${countryKey}-locations`,
    eyebrow,
    title: `Custom Software Development in ${countryName}`,
    subtitle: `QalbIT works with startups and businesses across ${countryName} through remote-first collaboration, with focused pages for key states where we often work with clients.`,
    items: locations.map((location) => ({
      title: location.name,
      description: location.short_description,
      href: `/${countryKey}/${location.state_key}/`,
      meta: "View state-specific page →",
    })),
    columns: 3,
    dataSection: "geo-country-index",
  };
}

export function mapGeoFinalCta(location: GeoLocation) {
  const cta = asRecord(asRecord(location.sections).final_cta);
  if (!cta.title) return null;

  const primary = mapCta(asRecord(cta.primary_cta));
  if (!primary) return null;

  return {
    id: (cta.id as string) ?? "location-final-cta",
    stateKey: location.state_key,
    stateLabel: location.short_name ?? location.name,
    eyebrow: cta.eyebrow as string | undefined,
    title: cta.title as string,
    body: (cta.body as string) ?? undefined,
    primary,
    secondary: mapCta(asRecord(cta.secondary_cta)),
  };
}
