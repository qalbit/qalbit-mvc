import { notFound } from "next/navigation";
import { HireDetailPage } from "@/components/hire/HireDetailPage";
import { JsonLd } from "@/components/seo/JsonLd";
import { getFaqsForKey, getHireByKey } from "@/lib/data";
import { buildMetadata } from "@/lib/seo/metadata";
import { buildPageSchemas } from "@/lib/seo/schema";
import { REVALIDATE_DEFAULT, absoluteUrl } from "@/lib/site";

function hireCanonical(slug: string): string {
  const normalized = slug.startsWith("/") ? slug : `/${slug}`;
  return normalized.endsWith("/") ? normalized : `${normalized}/`;
}

export function createHirePage(roleKey: string) {
  async function Page() {
    const entity = getHireByKey(roleKey);
    if (!entity) notFound();

    const canonical = hireCanonical(entity.slug);
    const faqs = getFaqsForKey(entity.faq_key as string | undefined);
    const pageUrl = absoluteUrl(canonical);
    const pageTitle = (entity.meta_title as string) ?? entity.name;

    const jsonLd = buildPageSchemas({
      faqs,
      pageUrl,
      pageTitle,
      breadcrumbs: [
        { name: "Hire Developers", url: "/hire-developers/" },
        { name: entity.name, url: canonical },
      ],
      includeOrg: true,
    });

    return (
      <>
        <JsonLd data={jsonLd} />
        <HireDetailPage entity={entity} faqs={faqs} />
      </>
    );
  }

  async function generateMetadata() {
    const entity = getHireByKey(roleKey);
    if (!entity) return {};

    return buildMetadata({
      title: (entity.meta_title as string) ?? entity.name,
      description: entity.meta_description as string,
      canonical: hireCanonical(entity.slug),
    });
  }

  return { Page, generateMetadata, revalidate: REVALIDATE_DEFAULT };
}
