import type { MetadataRoute } from "next";
import { getSitemapPaths } from "@/lib/seo/sitemap-urls";
import { absoluteUrl } from "@/lib/site";

export default async function sitemap(): Promise<MetadataRoute.Sitemap> {
  const paths = await getSitemapPaths();
  const lastModified = new Date();

  return paths.map((path) => ({
    url: absoluteUrl(path),
    lastModified,
    changeFrequency: "weekly",
    priority: path === "/" ? 1 : 0.7,
  }));
}
