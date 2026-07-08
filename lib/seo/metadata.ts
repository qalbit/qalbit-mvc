import type { Metadata } from "next";
import { env } from "../env";
import {
  DEFAULT_OG_IMAGE,
  INDEXING_ENABLED,
  SITE_NAME,
  SITE_URL,
  absoluteUrl,
} from "../site";

export interface PageSeoInput {
  title: string;
  description?: string;
  canonical?: string;
  noindex?: boolean;
  ogImage?: string;
}

const DEFAULT_DESCRIPTION =
  "QalbIT is a custom software development company building secure web, mobile and cloud applications for startups and enterprises.";

export function buildMetadata(input: PageSeoInput): Metadata {
  const title = input.title;
  const description = input.description?.trim() || DEFAULT_DESCRIPTION;
  const canonicalPath = input.canonical ?? "/";
  const canonical = absoluteUrl(canonicalPath);
  const noindex = input.noindex ?? !INDEXING_ENABLED;
  const ogImage = input.ogImage ?? DEFAULT_OG_IMAGE;

  const metadata: Metadata = {
    title,
    description,
    alternates: { canonical },
    openGraph: {
      title,
      description,
      url: canonical,
      siteName: SITE_NAME,
      type: "website",
      images: [{ url: ogImage, width: 1200, height: 630, alt: SITE_NAME }],
    },
    twitter: {
      card: "summary_large_image",
      site: "@qalb_it",
      title,
      description,
      images: [ogImage],
    },
    robots: noindex
      ? { index: false, follow: false }
      : { index: true, follow: true },
  };

  if (env.GSC_VERIFICATION) {
    metadata.verification = { google: env.GSC_VERIFICATION };
  }

  return metadata;
}

export function mergeJsonLd(...schemas: Record<string, unknown>[]): Record<string, unknown>[] {
  return schemas.filter(Boolean);
}
