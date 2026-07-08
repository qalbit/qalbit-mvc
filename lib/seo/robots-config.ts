import type { MetadataRoute } from "next";
import { INDEXING_ENABLED, SITE_URL } from "@/lib/site";

/** Disallow rules aligned with production `public/robots.txt` (PHP + WordPress blog). */
const DISALLOW_WHEN_INDEXING = [
  "/emailtemplates/",
  "/vendor/",
  "/sass/",
  "/tmp/",
  "/logs/",
  "*/feed/",
  "/blog/wp-admin/",
  "/blog/wp-includes/",
  "/blog/wp-content/plugins/",
  "/blog/wp-content/themes/",
  "/blog-inner.php",
  "/blog/tag/",
  "/blog/wp-json/",
  "/?estimate=*",
  "/?ref=*",
  "/?selected=*",
  "/?s=*",
  "/constant.php",
  "/z-token.php",
  "/formHandler.php",
  "/structuredDataMarkup.php",
  "/mail.php",
  "/helper.php",
  "/*?ref=",
  "/*?estimate",
  "/api/",
];

export function getRobotsConfig(): MetadataRoute.Robots {
  const sitemaps = [
    `${SITE_URL}/sitemap.xml`,
    `${SITE_URL}/blog/sitemap_index.xml`,
  ];

  if (!INDEXING_ENABLED) {
    return {
      rules: {
        userAgent: "*",
        disallow: "/",
      },
      sitemap: sitemaps,
    };
  }

  return {
    rules: {
      userAgent: "*",
      allow: "/",
      disallow: DISALLOW_WHEN_INDEXING,
      crawlDelay: 5,
    },
    sitemap: sitemaps,
  };
}
