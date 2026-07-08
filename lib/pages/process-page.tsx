import { notFound } from "next/navigation";
import { ProcessDetailPage } from "@/components/blocks/layouts/ProcessDetailPage";
import { JsonLd } from "@/components/seo/JsonLd";
import { getFaqsForKey, getProcessBySlug } from "@/lib/data";
import { buildMetadata } from "@/lib/seo/metadata";
import { buildPageSchemas } from "@/lib/seo/schema";
import { REVALIDATE_DEFAULT, absoluteUrl } from "@/lib/site";

function processCanonical(slug: string): string {
  const normalized = slug.startsWith("/") ? slug : `/${slug}`;
  return normalized.endsWith("/") ? normalized : `${normalized}/`;
}

export function createProcessPage(slug: string) {
  async function Page() {
    const entity = getProcessBySlug(slug);
    if (!entity) notFound();

    const canonical = processCanonical(slug);
    const faqs = getFaqsForKey(entity.faq_key as string | undefined);
    const pageUrl = absoluteUrl(canonical);
    const pageTitle = (entity.meta_title as string) ?? entity.name;

    const jsonLd = buildPageSchemas({
      faqs,
      pageUrl,
      pageTitle,
      breadcrumbs: [
        { name: "Our Process", url: "/start-up-mvp/" },
        { name: entity.name, url: canonical },
      ],
      includeOrg: true,
    });

    return (
      <>
        <JsonLd data={jsonLd} />
        <ProcessDetailPage entity={entity} faqs={faqs} />
      </>
    );
  }

  async function generateMetadata() {
    const entity = getProcessBySlug(slug);
    if (!entity) return {};

    return buildMetadata({
      title: (entity.meta_title as string) ?? entity.name,
      description: entity.meta_description as string,
      canonical: processCanonical(slug),
    });
  }

  return { Page, generateMetadata, revalidate: REVALIDATE_DEFAULT };
}
