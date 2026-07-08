import type { ConfigEntity, FaqItem } from "@/lib/data";
import { asset } from "@/lib/site";
import type {
  CapabilityItem,
  CapabilitiesBlockProps,
  DarkCtaBlockProps,
  DetailHeroProps,
  FaqBlockProps,
  OverviewBlockProps,
  ProcessBlockProps,
  ProcessStepItem,
  TechCategory,
  TechStackBlockProps,
  UseCaseItem,
  UseCasesBlockProps,
} from "./types";

function asRecord(value: unknown): Record<string, unknown> {
  return value && typeof value === "object" && !Array.isArray(value)
    ? (value as Record<string, unknown>)
    : {};
}

function asArray<T>(value: unknown): T[] {
  return Array.isArray(value) ? (value as T[]) : [];
}

export function mapDetailHero(
  entity: ConfigEntity,
  breadcrumbs: DetailHeroProps["breadcrumbs"],
  dataSection?: string,
): DetailHeroProps {
  const hero = asRecord(entity.hero);
  const snapshot = asArray<{ label: string; value: string; note?: string | null }>(hero.snapshot);

  return {
    breadcrumbs,
    kickerPrefix: (hero.kicker_prefix as string) ?? undefined,
    kickerLabel: (hero.kicker_label as string) ?? undefined,
    kickerDetail: (hero.kicker_detail as string) ?? undefined,
    title: (hero.title as string) ?? entity.h1 ?? entity.name,
    intro: (hero.intro as string) ?? entity.short_description ?? undefined,
    bullets: asArray<string>(hero.bullets),
    primaryCta: hero.primary_cta_href
      ? {
          label: (hero.primary_cta_label as string) ?? "Contact us",
          href: hero.primary_cta_href as string,
        }
      : { label: "Book a free consultation", href: "/contact-us/" },
    secondaryCta:
      hero.secondary_cta_href
        ? {
            label: (hero.secondary_cta_label as string) ?? "Learn more",
            href: hero.secondary_cta_href as string,
            external: String(hero.secondary_cta_href).startsWith("http"),
          }
        : undefined,
    snapshotTitle: (hero.snapshot_title as string) ?? undefined,
    snapshot: snapshot.length ? snapshot : undefined,
    imageSrc: typeof entity.icon === "string" && entity.icon ? asset(entity.icon) : undefined,
    imageAlt: (entity.iconAlt as string) ?? entity.name,
    dataSection,
  };
}

export function mapOverview(entity: ConfigEntity, dataSection?: string): OverviewBlockProps | null {
  const overview = asRecord(entity.overview);
  if (!overview.title && !overview.intro) return null;

  return {
    id: (overview.id as string) ?? undefined,
    eyebrow: (overview.eyebrow as string) ?? "Overview",
    title: (overview.title as string) ?? entity.name,
    intro: (overview.intro as string) ?? undefined,
    leftTitle: (overview.left_title as string) ?? undefined,
    leftItems: asArray<string>(overview.left_items),
    rightTitle: (overview.right_title as string) ?? undefined,
    rightItems: asArray<string>(overview.right_items),
    note: (overview.note as string) ?? undefined,
    dataSection,
  };
}

export function mapCapabilities(
  entity: ConfigEntity,
  dataSection?: string,
): CapabilitiesBlockProps | null {
  const cap = asRecord(entity.capabilities);
  const items = asArray(cap.items);
  if (!items.length && !cap.title) return null;

  const ctaRaw = asRecord(cap.cta);
  return {
    id: (cap.id as string) ?? undefined,
    eyebrow: (cap.eyebrow as string) ?? undefined,
    title: (cap.title as string) ?? "Capabilities",
    intro: (cap.intro as string) ?? undefined,
    items: items as CapabilityItem[],
    note: (cap.note as string) ?? undefined,
    cta: ctaRaw.url || ctaRaw.href
      ? { label: (ctaRaw.label as string) ?? "Contact us", href: (ctaRaw.url ?? ctaRaw.href) as string }
      : undefined,
    dataSection,
  };
}

export function mapProcess(entity: ConfigEntity, dataSection?: string): ProcessBlockProps | null {
  const process = asRecord(entity.process);
  const steps = asArray(process.items ?? process.steps);
  if (!steps.length && !process.title) return null;

  const ctaRaw = asRecord(process.cta);
  return {
    id: (process.id as string) ?? undefined,
    eyebrow: (process.eyebrow as string) ?? undefined,
    title: (process.title as string) ?? "Our process",
    intro: (process.intro as string) ?? undefined,
    steps: steps as ProcessStepItem[],
    note: (process.note as string) ?? (process.timeline_note as string) ?? undefined,
    cta: ctaRaw.url || ctaRaw.href
      ? { label: (ctaRaw.label as string) ?? "Contact us", href: (ctaRaw.url ?? ctaRaw.href) as string }
      : undefined,
    dataSection,
  };
}

export function mapUseCases(entity: ConfigEntity, dataSection?: string): UseCasesBlockProps | null {
  const useCases = asRecord(entity.use_cases);
  const items = asArray(useCases.items);
  if (!items.length && !useCases.title) return null;

  const ctaRaw = asRecord(useCases.cta);
  return {
    id: (useCases.id as string) ?? undefined,
    eyebrow: (useCases.eyebrow as string) ?? undefined,
    title: (useCases.title as string) ?? "Use cases",
    intro: (useCases.intro as string) ?? undefined,
    items: items as UseCaseItem[],
    cta: ctaRaw.url || ctaRaw.href
      ? { label: (ctaRaw.label as string) ?? "Contact us", href: (ctaRaw.url ?? ctaRaw.href) as string }
      : undefined,
    dataSection,
  };
}

export function mapTechStack(entity: ConfigEntity, dataSection?: string): TechStackBlockProps | null {
  const stack = asRecord(entity.stack);
  const categories = asArray(stack.categories);
  const items = asArray(stack.items);
  if (!categories.length && !items.length && !stack.title) return null;

  return {
    id: (stack.id as string) ?? undefined,
    eyebrow: (stack.eyebrow as string) ?? undefined,
    title: (stack.title as string) ?? "Tech stack",
    intro: (stack.intro as string) ?? undefined,
    note: (stack.note as string) ?? undefined,
    categories: categories as TechCategory[],
    items: items as CapabilityItem[],
    pills: asArray<string>(stack.tech_pills ?? stack.pills),
    dataSection,
  };
}

export function mapDarkCta(entity: ConfigEntity, dataSection?: string): DarkCtaBlockProps | null {
  const cta = asRecord(entity.cta);
  if (cta.enabled === false) return null;

  return {
    enabled: true,
    eyebrow: (cta.eyebrow as string) ?? undefined,
    title: (cta.title as string) ?? "Ready to get started?",
    body: (cta.body as string) ?? undefined,
    primary: {
      label: (cta.primary_label as string) ?? "Book a consultation",
      href: (cta.primary_url as string) ?? "/contact-us/",
      ariaLabel: (cta.primary_aria as string) ?? undefined,
    },
    secondary:
      cta.secondary_url
        ? {
            label: (cta.secondary_label as string) ?? "Learn more",
            href: cta.secondary_url as string,
            ariaLabel: (cta.secondary_aria as string) ?? undefined,
          }
        : undefined,
    meta: (cta.meta as string) ?? undefined,
    dataSection,
  };
}

export function mapFaqBlock(entity: ConfigEntity, faqs: FaqItem[]): FaqBlockProps | null {
  if (!faqs.length) return null;

  return {
    id: "faqs",
    title: (entity.faq_title as string) ?? "Frequently asked questions",
    subtitle: (entity.faq_subtitle as string) ?? undefined,
    bullets: asArray<string>(entity.faq_bullets),
    faqs,
  };
}
