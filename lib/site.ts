import { env } from "./env";

export const SITE_URL = env.SITE_URL.replace(/\/$/, "");
export const PUBLIC_SITE_URL =
  (env.NEXT_PUBLIC_SITE_URL ?? env.SITE_URL).replace(/\/$/, "");
export const INDEXING_ENABLED =
  env.INDEXING_ENABLED === undefined ? true : env.INDEXING_ENABLED;
export const DEFAULT_OG_IMAGE = `${SITE_URL}/assets/images/og/qalbit-default-og.jpg`;
export const SITE_NAME = "QalbIT Infotech Pvt Ltd";
export const REVALIDATE_DEFAULT = 900;
export const REVALIDATE_BLOG = 3600;

export function asset(path: string): string {
  const clean = path.replace(/^\//, "");
  if (clean.startsWith("assets/")) {
    return `/${clean}`;
  }
  return `/assets/${clean}`;
}

export function absoluteUrl(path: string): string {
  if (/^https?:\/\//i.test(path)) {
    return path;
  }
  const normalized = path.startsWith("/") ? path : `/${path}`;
  const withSlash =
    normalized !== "/" && !normalized.endsWith("/")
      ? `${normalized}/`
      : normalized;
  return `${SITE_URL}${withSlash}`;
}

export function normalizePath(path: string): string {
  if (path === "" || path === "/") return "/";
  let p = path.startsWith("/") ? path : `/${path}`;
  if (!p.endsWith("/")) p += "/";
  return p;
}

export function slugFromPath(slug: string): string {
  return slug.replace(/^\/|\/$/g, "");
}

export function pathSegmentFromSlug(slug: string): string {
  const trimmed = slug.replace(/^\/|\/$/g, "");
  const parts = trimmed.split("/");
  return parts[parts.length - 1] ?? trimmed;
}
