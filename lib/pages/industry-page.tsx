import industriesJson from "@/lib/data/industries.json";
import { getIndustryByKey } from "@/lib/data";
import { pathSegmentFromSlug } from "@/lib/site";

export function findIndustryKeyBySlug(slug: string): string | undefined {
  const normalized = slug.trim().replace(/^\/|\/$/g, "");

  const entry = Object.entries(
    industriesJson as Record<string, { slug?: string; enabled?: boolean }>,
  ).find(([, industry]) => {
    if (industry.enabled === false) {
      return false;
    }
    const parts = (industry.slug ?? "").replace(/^\/|\/$/g, "").split("/");
    return parts[parts.length - 1] === normalized;
  });

  return entry?.[0];
}

export function getIndustryStaticParams(): { slug: string }[] {
  return Object.values(
    industriesJson as Record<string, { enabled?: boolean; slug?: string }>,
  )
    .filter((industry) => industry.enabled !== false)
    .map((industry) => ({
      slug: pathSegmentFromSlug(industry.slug ?? ""),
    }));
}

export function getIndustryEntityBySlug(slug: string) {
  const key = findIndustryKeyBySlug(slug);
  if (!key) {
    return undefined;
  }
  return getIndustryByKey(key);
}

function industryCanonical(slug: string): string {
  const normalized = slug.startsWith("/") ? slug : `/${slug}`;
  return normalized.endsWith("/") ? normalized : `${normalized}/`;
}

export function getIndustryCanonical(slug: string): string {
  const entity = getIndustryEntityBySlug(slug);
  if (!entity) {
    return `/industries/${slug}/`;
  }
  return industryCanonical(entity.slug);
}
