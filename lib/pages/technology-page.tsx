import technologiesJson from "@/lib/data/technologies.json";
import { getTechnologyByKey } from "@/lib/data";
import { pathSegmentFromSlug } from "@/lib/site";

export function findTechnologyKeyBySlug(slug: string): string | undefined {
  const normalized = slug.trim().replace(/^\/|\/$/g, "");

  const entry = Object.entries(
    technologiesJson as Record<string, { slug?: string; enabled?: boolean }>,
  ).find(([, technology]) => {
    if (technology.enabled === false) {
      return false;
    }
    const parts = (technology.slug ?? "").replace(/^\/|\/$/g, "").split("/");
    return parts[parts.length - 1] === normalized;
  });

  return entry?.[0];
}

export function getTechnologyStaticParams(): { slug: string }[] {
  return Object.values(
    technologiesJson as Record<string, { enabled?: boolean; slug?: string }>,
  )
    .filter((technology) => technology.enabled !== false)
    .map((technology) => ({
      slug: pathSegmentFromSlug(technology.slug ?? ""),
    }));
}

export function getTechnologyEntityBySlug(slug: string) {
  const key = findTechnologyKeyBySlug(slug);
  if (!key) {
    return undefined;
  }
  return getTechnologyByKey(key);
}

function technologyCanonical(slug: string): string {
  const normalized = slug.startsWith("/") ? slug : `/${slug}`;
  return normalized.endsWith("/") ? normalized : `${normalized}/`;
}

export function getTechnologyCanonical(slug: string): string {
  const entity = getTechnologyEntityBySlug(slug);
  if (!entity) {
    return `/technologies/${slug}/`;
  }
  return technologyCanonical(entity.slug);
}
