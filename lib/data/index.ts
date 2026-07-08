import businessJson from "./business.json";
import careersJson from "./careers.json";
import caseStudiesJson from "./case_studies.json";
import clientsJson from "./clients.json";
import faqsJson from "./faqs.json";
import geoJson from "./geo.json";
import hireJson from "./hire.json";
import industriesJson from "./industries.json";
import navigationJson from "./navigation.json";
import portfolioJson from "./portfolio.json";
import processJson from "./process.json";
import reviewsJson from "./reviews.json";
import servicesJson from "./services.json";
import technologiesJson from "./technologies.json";
import type {
  CaseStudy,
  Client,
  ConfigEntity,
  FaqItem,
  GeoLocation,
  PortfolioItem,
  Review,
} from "./types";

export type {
  CaseStudy,
  Client,
  ConfigEntity,
  EntityBlockSection,
  FaqItem,
  GeoLocation,
  GeoSeo,
  PortfolioItem,
  Review,
} from "./types";

function asList<T extends { enabled?: boolean; order?: number }>(
  record: Record<string, T>,
): T[] {
  return Object.values(record)
    .filter((item) => item.enabled !== false)
    .sort((a, b) => (a.order ?? 0) - (b.order ?? 0));
}

export const business = businessJson;
export const navigation = navigationJson;
export const faqs = faqsJson as Record<string, FaqItem[]>;
export const clients = asList(clientsJson as unknown as Record<string, Client>);
export const reviews = asList(reviewsJson as unknown as Record<string, Review>);
export const services = asList(servicesJson as unknown as Record<string, ConfigEntity>);
export const industries = asList(industriesJson as unknown as Record<string, ConfigEntity>);
export const technologies = asList(technologiesJson as unknown as Record<string, ConfigEntity>);
export const hireRoles = asList(hireJson as unknown as Record<string, ConfigEntity>);
export const caseStudies = asList(caseStudiesJson as unknown as Record<string, CaseStudy>);
export const processPages = asList(processJson as unknown as Record<string, ConfigEntity>);
export const geoLocations = asList(geoJson as unknown as Record<string, GeoLocation>);
export const portfolio = portfolioJson as unknown as {
  page?: Record<string, unknown>;
  items?: Record<string, PortfolioItem>;
  taxonomies?: Record<string, unknown>;
};
export const careers = careersJson as Record<string, unknown>;

export function getFaqs(key: string): FaqItem[] {
  return faqs[key] ?? [];
}

export function getFaqsForKey(key: string | undefined): FaqItem[] {
  if (!key) return [];
  return getFaqs(key);
}

/** Logo IDs shown on the contact page proof section (matches ContactController). */
const CONTACT_PAGE_LOGO_IDS = [
  "snappystats",
  "bloomford",
  "contractor-plus",
  "plugin",
  "de-ruwenberg",
  "lmc",
] as const;

export function getContactPageClients(): Client[] {
  const byId = new Map(clients.map((client) => [client.id, client]));
  return CONTACT_PAGE_LOGO_IDS.map((id) => byId.get(id)).filter(
    (client): client is Client => client !== undefined,
  );
}

export function urlSlugSegment(slugPath: string): string {
  const normalized = slugPath.replace(/^\/|\/$/g, "");
  const parts = normalized.split("/");
  return parts[parts.length - 1] ?? "";
}

export function findBySlugPath(
  items: ConfigEntity[],
  slugPath: string,
): ConfigEntity | undefined {
  const normalized = slugPath.startsWith("/") ? slugPath : `/${slugPath}`;
  const withSlash = normalized.endsWith("/") ? normalized : `${normalized}/`;
  return items.find((item) => item.slug === withSlash);
}

export function findByUrlSegment(
  items: ConfigEntity[],
  segment: string,
): ConfigEntity | undefined {
  return items.find((item) => urlSlugSegment(item.slug) === segment.replace(/^\/|\/$/g, ""));
}

export function getServiceByKey(key: string): ConfigEntity | undefined {
  const record = (servicesJson as Record<string, ConfigEntity>)[key];
  if (!record || record.enabled === false) {
    return undefined;
  }
  return record;
}

export function getServiceBySlug(slug: string): ConfigEntity | undefined {
  const normalized = slug.trim().replace(/^\/|\/$/g, "");

  for (const item of services) {
    if (urlSlugSegment(item.slug) === normalized) {
      return item;
    }
  }

  return undefined;
}

export function getIndustryByKey(key: string): ConfigEntity | undefined {
  const record = (industriesJson as Record<string, ConfigEntity>)[key];
  if (!record || record.enabled === false) {
    return undefined;
  }
  return record;
}

export function getIndustryBySlug(slug: string): ConfigEntity | undefined {
  const normalized = slug.trim().replace(/^\/|\/$/g, "");

  for (const item of industries) {
    if (urlSlugSegment(item.slug) === normalized) {
      return item;
    }
  }

  return undefined;
}

export function getTechnologyByKey(key: string): ConfigEntity | undefined {
  const record = (technologiesJson as Record<string, ConfigEntity>)[key];
  if (!record || record.enabled === false) {
    return undefined;
  }
  return record;
}

export function getTechnologyBySlug(slug: string): ConfigEntity | undefined {
  const normalized = slug.trim().replace(/^\/|\/$/g, "");

  for (const item of technologies) {
    if (urlSlugSegment(item.slug) === normalized) {
      return item;
    }
  }

  return undefined;
}

export function getHireByKey(key: string): ConfigEntity | undefined {
  const record = (hireJson as Record<string, ConfigEntity>)[key];
  if (!record || record.enabled === false) {
    return undefined;
  }
  return record;
}

export function getHireBySlug(slug: string): ConfigEntity | undefined {
  const normalized = slug.trim().replace(/^\/|\/$/g, "");

  for (const item of hireRoles) {
    const segment = urlSlugSegment(item.slug);

    if (segment === normalized) {
      return item;
    }

    const match = segment.match(/^hire-([a-z0-9-]+)-developers$/i);
    if (match && match[1] === normalized) {
      return item;
    }
  }

  return undefined;
}

export function caseStudySlugSegment(slugPath: string): string {
  return urlSlugSegment(slugPath);
}

export function getCaseStudyBySlug(slug: string): CaseStudy | undefined {
  const segment = slug.replace(/^\/|\/$/g, "").split("/").pop() ?? slug;
  return caseStudies.find((cs) => caseStudySlugSegment(cs.slug) === segment);
}

export function getCaseStudyFaqs(caseStudy: CaseStudy): FaqItem[] {
  return getFaqsForKey(caseStudy.faq_key);
}

/** Legacy HTML export filename for case study partials. */
export function caseStudyHtmlFileName(slug: string): string {
  return caseStudySlugSegment(slug);
}

export function getProcessBySlug(slug: string): ConfigEntity | undefined {
  return findByUrlSegment(processPages, slug);
}

export function getGeoByCountryState(country: string, state: string): GeoLocation | undefined {
  return geoLocations.find((g) => g.country_key === country && g.state_key === state);
}

export function getLocationsByCountry(countryKey: string): GeoLocation[] {
  return geoLocations
    .filter((g) => g.country_key === countryKey)
    .sort((a, b) => (a.order ?? 0) - (b.order ?? 0));
}

export function getCountryMeta(countryKey: string): { countryKey: string; countryName: string } | null {
  const first = geoLocations.find((g) => g.country_key === countryKey);
  if (!first) return null;
  return { countryKey, countryName: first.country_name };
}

export function getGeoFaqs(location: GeoLocation): FaqItem[] {
  return getFaqsForKey(location.faq_key ?? location.seo?.faq_key);
}

/** Legacy HTML export filename for geo partials. */
export function geoHtmlFileName(country: string, state: string): string {
  return `${country}-${state}`;
}

export function getPortfolioItems(): PortfolioItem[] {
  const items = portfolio.items ?? {};
  return Object.values(items).sort((a, b) => (a.order ?? 0) - (b.order ?? 0));
}

export function getHomeTechnologies(): ConfigEntity[] {
  return technologies.filter((t) => t.show_home === true || t.show_home === 1);
}

export function getHomeServices(): ConfigEntity[] {
  return services.slice(0, 8);
}

export function getFeaturedCaseStudies(): CaseStudy[] {
  return caseStudies.slice(0, 4);
}

export function getFeaturedReviews(): Review[] {
  return reviews.filter((r) => r.featured).slice(0, 6);
}
