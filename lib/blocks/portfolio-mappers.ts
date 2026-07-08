import type { FaqItem, PortfolioItem } from "@/lib/data";
import { portfolio } from "@/lib/data";
import { asset } from "@/lib/site";
import type { FaqBlockProps, PortfolioFiltersProps, PortfolioGridProps } from "./types";

type PortfolioPage = Record<string, unknown>;
type PortfolioSections = Record<string, JsonRecord>;
type JsonRecord = Record<string, unknown>;

function asRecord(value: unknown): JsonRecord {
  return value && typeof value === "object" && !Array.isArray(value) ? (value as JsonRecord) : {};
}

function entityHref(slug: string): string {
  const normalized = slug.startsWith("/") ? slug : `/${slug}`;
  return normalized.endsWith("/") ? normalized : `${normalized}/`;
}

function getLabelMap(key: "industries" | "technologies"): Record<string, string> {
  const portfolioData = portfolio as { industries?: Record<string, string>; technologies?: Record<string, string> };
  const raw = portfolioData[key] ?? {};
  return typeof raw === "object" && !Array.isArray(raw) ? raw : {};
}

export interface PortfolioHeroProps {
  eyebrow: string;
  title: string;
  subtitle?: string;
  primaryCta: { label: string; href: string };
  secondaryCta: { label: string; href: string; external?: boolean };
}

export interface PortfolioFeaturedItem {
  name: string;
  client?: string;
  summary?: string;
  href: string;
  external?: boolean;
  typeLabel: string;
  linkLabel: string;
  imageSrc?: string;
  imageAlt?: string;
  industries: string[];
  technologies: string[];
}

export interface PortfolioFeaturedProps {
  id?: string;
  eyebrow?: string;
  title: string;
  subtitle?: string;
  items: PortfolioFeaturedItem[];
  industryLabels: Record<string, string>;
  technologyLabels: Record<string, string>;
}

export interface PortfolioFinalCtaProps {
  id?: string;
  eyebrow?: string;
  title: string;
  body?: string;
  primary: { label: string; href: string; ariaLabel?: string };
  secondary?: { label: string; href: string; ariaLabel?: string };
  meta?: string;
}

export function mapPortfolioHero(): PortfolioHeroProps {
  const page = (portfolio.page ?? {}) as PortfolioPage;
  const sections = asRecord(page.sections) as PortfolioSections;
  const hero = asRecord(sections.hero);
  const primary = asRecord(hero.primary_cta);
  const secondary = asRecord(hero.secondary_cta);

  const primaryHref = (primary.href as string) ?? "/contact-us/?ref=portfolio-hero";
  const secondaryHref = (secondary.href as string) ?? "/portfolio/";

  return {
    eyebrow: (hero.eyebrow as string) ?? "Our work · Portfolio",
    title:
      (hero.title as string) ??
      (page.h1 as string) ??
      "Selected projects and case studies in custom software & SaaS development.",
    subtitle: (hero.subtitle as string) ?? (page.summary as string) ?? undefined,
    primaryCta: {
      label: (primary.label as string) ?? "Discuss your project",
      href: primaryHref,
    },
    secondaryCta: {
      label: (secondary.label as string) ?? "Browse our recent work",
      href: secondaryHref,
      external: secondaryHref.startsWith("http"),
    },
  };
}

export function mapPortfolioFilters(
  activeIndustry?: string | null,
  activeTechnology?: string | null,
): PortfolioFiltersProps {
  const page = (portfolio.page ?? {}) as PortfolioPage;
  const sections = asRecord(page.sections) as PortfolioSections;
  const filtersConfig = asRecord(sections.filters);

  const industryLabels = getLabelMap("industries");
  const technologyLabels = getLabelMap("technologies");

  return {
    id: (filtersConfig.id as string) ?? "portfolio-filters",
    label: (filtersConfig.label as string) ?? "Filter by",
    industryLabel: (filtersConfig.industry_label as string) ?? "Industry",
    techLabel: (filtersConfig.tech_label as string) ?? "Tech stack",
    industryAllLabel: (filtersConfig.all_label as string) ?? "All",
    techAllLabel: (filtersConfig.all_label as string) ?? "All",
    submitLabel: (filtersConfig.submit_label as string) ?? "Apply",
    resetLabel: (filtersConfig.reset_label as string) ?? "Clear filters",
    hint:
      (filtersConfig.hint as string) ??
      "Combine industry and tech stack, or use either one on its own.",
    industries: Object.entries(industryLabels).map(([value, label]) => ({ value, label })),
    technologies: Object.entries(technologyLabels).map(([value, label]) => ({ value, label })),
    activeIndustry,
    activeTechnology,
  };
}

function mapPortfolioFeaturedItem(item: PortfolioItem): PortfolioFeaturedItem {
  const caseStudyUrl = item.case_study_url as string | undefined;
  const externalUrl = item.external_url as string | undefined;
  const href = caseStudyUrl
    ? entityHref(String(caseStudyUrl).replace(/^\//, "").replace(/\/$/, ""))
    : externalUrl
      ? String(externalUrl)
      : item.slug
        ? `/case-studies/${item.slug}/`
        : "#";
  const isExternal = Boolean(externalUrl && !caseStudyUrl);
  const type = (item.type as string) ?? null;
  const typeLabel =
    type === "case-study" ? "Case study" : type === "product" ? "Product" : "Project";
  const thumb = item.thumbnail as string | undefined;

  return {
    name: (item.name as string) ?? (item.title as string) ?? "Project",
    client: item.client as string | undefined,
    summary: item.summary as string | undefined,
    href,
    external: isExternal,
    typeLabel,
    linkLabel: caseStudyUrl
      ? "View detailed case study"
      : isExternal
        ? "Visit live product"
        : "View project",
    imageSrc: thumb ? asset(thumb.replace(/^\//, "")) : undefined,
    imageAlt: ((item as JsonRecord).thumbnail_alt as string | undefined) ?? `${item.name} UI`,
    industries: (item.industries as string[]) ?? [],
    technologies: (item.technologies as string[]) ?? [],
  };
}

function mapPortfolioGridItem(item: PortfolioItem): PortfolioGridProps["items"][number] {
  const featured = mapPortfolioFeaturedItem(item);
  return {
    name: featured.name,
    slug: item.slug as string | undefined,
    href: featured.href,
    summary: featured.summary,
    imageSrc: featured.imageSrc,
    imageAlt: featured.imageAlt,
    industry: featured.industries[0],
    technology: featured.technologies[0],
    badge: featured.typeLabel,
    client: featured.client,
    industries: featured.industries,
    technologies: featured.technologies,
    external: featured.external,
    linkLabel: featured.linkLabel,
  };
}

export function filterPortfolioItems(
  items: PortfolioItem[],
  industry?: string | null,
  technology?: string | null,
): PortfolioItem[] {
  return items.filter((item) => {
    const industries = (item.industries as string[]) ?? [];
    const technologies = (item.technologies as string[]) ?? [];
    const matchesIndustry = !industry || industries.includes(industry);
    const matchesTech = !technology || technologies.includes(technology);
    return matchesIndustry && matchesTech;
  });
}

export function mapPortfolioFeatured(items: PortfolioItem[]): PortfolioFeaturedProps | null {
  const page = (portfolio.page ?? {}) as PortfolioPage;
  const sections = asRecord(page.sections) as PortfolioSections;
  const featuredConfig = asRecord(sections.featured);

  const featured = items.filter((i) => i.featured);
  if (!featured.length) return null;

  return {
    id: (featuredConfig.id as string) ?? "portfolio-featured",
    eyebrow: (featuredConfig.eyebrow as string) ?? "Highlights",
    title: (featuredConfig.title as string) ?? "Featured projects",
    subtitle:
      (featuredConfig.subtitle as string) ??
      "A few representative projects across industries and technology stacks.",
    items: featured.slice(0, 3).map(mapPortfolioFeaturedItem),
    industryLabels: getLabelMap("industries"),
    technologyLabels: getLabelMap("technologies"),
  };
}

export function mapPortfolioGrid(items: PortfolioItem[]): PortfolioGridProps {
  const page = (portfolio.page ?? {}) as PortfolioPage;
  const sections = asRecord(page.sections) as PortfolioSections;
  const gridConfig = asRecord(sections.grid);
  const emptyState = asRecord(gridConfig.empty_state);

  return {
    id: (gridConfig.id as string) ?? "portfolio-grid",
    title: (gridConfig.title as string) ?? "All projects & case studies",
    subtitle:
      (gridConfig.subtitle as string) ??
      "Browse by industry or technology stack, or view the full list.",
    emptyTitle: (emptyState.title as string) ?? "No projects match these filters yet.",
    emptyMessage:
      (emptyState.text as string) ??
      "Try adjusting the industry or tech stack filters, or contact us with your requirements.",
    items: items.map(mapPortfolioGridItem),
    industryLabels: getLabelMap("industries"),
    technologyLabels: getLabelMap("technologies"),
  };
}

export function mapPortfolioFinalCta(): PortfolioFinalCtaProps | null {
  const page = (portfolio.page ?? {}) as PortfolioPage;
  const sections = asRecord(page.sections) as PortfolioSections;
  const cta = asRecord(sections.final_cta ?? sections.cta);

  if (cta.enabled === false) return null;

  const primaryUrl = (cta.primary_cta as JsonRecord)?.href as string ?? (cta.primary_url as string) ?? "/contact-us/?ref=portfolio-cta";
  const secondaryRaw = (cta.secondary_cta as JsonRecord) ?? {};
  const secondaryUrl = secondaryRaw.href as string | undefined ?? (cta.secondary_url as string | undefined);

  return {
    id: (cta.id as string) ?? "portfolio-cta",
    eyebrow: (cta.eyebrow as string) ?? "Have a similar project in mind?",
    title: (cta.title as string) ?? "Let’s design the next project that belongs in this portfolio.",
    body:
      (cta.text as string) ??
      (cta.body as string) ??
      "Whether you need a new SaaS product, a scheduling platform or an internal tool, QalbIT can help you move from scattered workflows to a production-ready solution.",
    primary: {
      label: ((cta.primary_cta as JsonRecord)?.label as string) ?? (cta.primary_label as string) ?? "Book a free consultation",
      href: primaryUrl,
      ariaLabel: cta.primary_aria as string | undefined,
    },
    secondary: secondaryUrl
      ? {
          label: (secondaryRaw.label as string) ?? (cta.secondary_label as string) ?? "Browse our recent work",
          href: secondaryUrl,
          ariaLabel: cta.secondary_aria as string | undefined,
        }
      : undefined,
    meta: (cta.meta as string) ?? "Typically we respond within 24–48 hours.",
  };
}

export function mapPortfolioFaq(faqs: FaqItem[]): FaqBlockProps | null {
  const page = (portfolio.page ?? {}) as PortfolioPage;
  if (!faqs.length) return null;

  return {
    id: "portfolio-faqs",
    title: (page.faq_title as string) ?? "Frequently asked questions about our portfolio",
    subtitle: page.faq_subtitle as string | undefined,
    bullets: page.faq_bullets as string[] | undefined,
    faqs,
  };
}
