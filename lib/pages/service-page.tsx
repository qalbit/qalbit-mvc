import servicesJson from "@/lib/data/services.json";
import { getServiceByKey } from "@/lib/data";
import { pathSegmentFromSlug } from "@/lib/site";

export function findServiceKeyBySlug(slug: string): string | undefined {
  const normalized = slug.trim().replace(/^\/|\/$/g, "");

  const entry = Object.entries(
    servicesJson as Record<string, { slug?: string; enabled?: boolean }>,
  ).find(([, service]) => {
    if (service.enabled === false) {
      return false;
    }
    const parts = (service.slug ?? "").replace(/^\/|\/$/g, "").split("/");
    return parts[parts.length - 1] === normalized;
  });

  return entry?.[0];
}

export function getServiceStaticParams(): { slug: string }[] {
  return Object.values(
    servicesJson as Record<string, { enabled?: boolean; slug?: string }>,
  )
    .filter((service) => service.enabled !== false)
    .map((service) => ({
      slug: pathSegmentFromSlug(service.slug ?? ""),
    }));
}

export function getServiceEntityBySlug(slug: string) {
  const key = findServiceKeyBySlug(slug);
  if (!key) {
    return undefined;
  }
  return getServiceByKey(key);
}

function serviceCanonical(slug: string): string {
  const normalized = slug.startsWith("/") ? slug : `/${slug}`;
  return normalized.endsWith("/") ? normalized : `${normalized}/`;
}

export function getServiceCanonical(slug: string): string {
  const entity = getServiceEntityBySlug(slug);
  if (!entity) {
    return `/services/${slug}/`;
  }
  return serviceCanonical(entity.slug);
}
