import businessData from "../data/business.json";
import { SITE_URL } from "../site";

export interface FaqItem {
  question: string;
  answer: string;
}

export interface BreadcrumbItem {
  name: string;
  url: string;
}

type Business = typeof businessData;

export function organizationSchema(): Record<string, unknown> {
  const business = businessData as Business;
  const url = business.website ?? SITE_URL;
  const orgId = `${url}#organization`;

  const schema: Record<string, unknown> = {
    "@context": "https://schema.org",
    "@type": "Organization",
    "@id": orgId,
    name: business.legal_name,
    url,
  };

  if (business.logo_url) {
    schema.logo = business.logo_url;
  }

  const sameAs = Object.values(business.social_profiles ?? {}).filter(
    (v) => typeof v === "string" && /^https?:\/\//i.test(v),
  );
  if (sameAs.length) schema.sameAs = sameAs;

  if (business.schema_address) {
    schema.address = {
      "@type": "PostalAddress",
      ...business.schema_address,
    };
  }

  const contactPoints: Record<string, unknown>[] = [];
  const contactTypeMap: Record<string, string> = {
    sales: "sales",
    support: "customer support",
    careers: "human resources",
    partnerships: "business",
  };

  for (const channel of Object.values(business.channels ?? {})) {
    if (!channel.email && !channel.phone) continue;
    contactPoints.push({
      "@type": "ContactPoint",
      contactType: contactTypeMap[channel.id] ?? "customer support",
      ...(channel.phone && { telephone: channel.phone }),
      ...(channel.email && { email: channel.email }),
      areaServed: "Worldwide",
      availableLanguage: ["en"],
    });
  }

  if (contactPoints.length) schema.contactPoint = contactPoints;

  return schema;
}

export function websiteSchema(): Record<string, unknown> {
  const business = businessData as Business;
  const name = business.short_name ?? business.legal_name;
  const orgId = `${SITE_URL}#organization`;

  return {
    "@context": "https://schema.org",
    "@type": "WebSite",
    url: SITE_URL,
    name,
    publisher: { "@id": orgId },
  };
}

export function faqSchema(
  faqs: FaqItem[],
  pageUrl: string,
  pageTitle?: string,
): Record<string, unknown> | null {
  const items = faqs
    .filter((f) => f.question?.trim() && f.answer?.trim())
    .map((f) => ({
      "@type": "Question",
      name: f.question.trim(),
      acceptedAnswer: {
        "@type": "Answer",
        text: f.answer.trim(),
      },
    }));

  if (!items.length) return null;

  const schema: Record<string, unknown> = {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    mainEntity: items,
    url: pageUrl,
  };

  if (pageTitle) schema.name = pageTitle;
  return schema;
}

export function breadcrumbSchema(crumbs: BreadcrumbItem[]): Record<string, unknown> | null {
  const items: Record<string, unknown>[] = [];
  let position = 1;

  for (const crumb of crumbs) {
    const name = crumb.name?.trim();
    if (!name || !crumb.url) continue;

    const itemUrl = /^https?:\/\//i.test(crumb.url)
      ? crumb.url
      : `${SITE_URL}/${crumb.url.replace(/^\/+/, "")}`;

    items.push({
      "@type": "ListItem",
      position,
      name,
      item: itemUrl.endsWith("/") ? itemUrl : `${itemUrl}/`,
    });
    position += 1;
  }

  if (!items.length) return null;

  return {
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    itemListElement: items,
  };
}

export function buildPageSchemas(options: {
  faqs?: FaqItem[];
  pageUrl: string;
  pageTitle?: string;
  breadcrumbs?: BreadcrumbItem[];
  includeOrg?: boolean;
  includeWebsite?: boolean;
}): Record<string, unknown>[] {
  const schemas: Record<string, unknown>[] = [];

  if (options.includeOrg) schemas.push(organizationSchema());
  if (options.includeWebsite) schemas.push(websiteSchema());

  const breadcrumb = options.breadcrumbs
    ? breadcrumbSchema(options.breadcrumbs)
    : null;
  if (breadcrumb) schemas.push(breadcrumb);

  if (options.faqs?.length) {
    const faq = faqSchema(options.faqs, options.pageUrl, options.pageTitle);
    if (faq) schemas.push(faq);
  }

  return schemas;
}
