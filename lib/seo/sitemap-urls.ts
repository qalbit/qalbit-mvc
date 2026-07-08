import {
  caseStudies,
  geoLocations,
  hireRoles,
  industries,
  processPages,
  services,
  technologies,
} from "@/lib/data";
import { fetchAllPosts } from "@/lib/blog";
import { normalizePath } from "@/lib/site";

/** Static routes mirrored from PHP `SeoController::sitemap()` plus Next routes. */
const CORE_PATHS = [
  "/",
  "/about-us/",
  "/services/",
  "/industries/",
  "/portfolio/",
  "/technologies/",
  "/contact-us/",
  "/career/",
  "/hire-developers/",
  "/case-studies/",
  "/privacy-policy/",
  "/terms-and-condition/",
  "/cookie-policy/",
  "/sitemap/",
  "/blog/",
  "/start-up-mvp/",
  "/product-scaling/",
  "/digital-transformation/",
  "/engagement-model/",
] as const;

function pathFromSlug(slug: string): string {
  return normalizePath(slug);
}

function collectConfigPaths(): string[] {
  const dynamic = [
    ...services.map((item) => pathFromSlug(item.slug)),
    ...processPages.map((item) => pathFromSlug(item.slug)),
    ...industries.map((item) => pathFromSlug(item.slug)),
    ...technologies.map((item) => pathFromSlug(item.slug)),
    ...geoLocations.map((item) => pathFromSlug(item.slug)),
    ...hireRoles.map((item) => pathFromSlug(item.slug)),
    ...caseStudies.map((item) => pathFromSlug(item.slug)),
  ];

  return [...CORE_PATHS, ...dynamic];
}

async function collectBlogPaths(): Promise<string[]> {
  const posts = await fetchAllPosts(200);
  return posts.map((post) => normalizePath(`/blog/${post.slug}/`));
}

/** All indexable site paths (relative, trailing slash). */
export async function getSitemapPaths(): Promise<string[]> {
  const paths = collectConfigPaths();

  try {
    const blogPaths = await collectBlogPaths();
    paths.push(...blogPaths);
  } catch {
    // Blog sitemap is listed separately in robots.txt when WP is unavailable.
  }

  const unique = Array.from(new Set(paths));
  unique.sort((a, b) => {
    if (a === "/") return -1;
    if (b === "/") return 1;
    return a.localeCompare(b);
  });

  return unique;
}
