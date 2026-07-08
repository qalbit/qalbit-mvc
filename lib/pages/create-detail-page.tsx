import type { ComponentType } from "react";
import { notFound } from "next/navigation";
import { DetailEntityPage } from "@/components/blocks";
import { JsonLd } from "@/components/seo/JsonLd";
import type { ConfigEntity, FaqItem } from "@/lib/data";
import { getFaqs } from "@/lib/data";
import { buildMetadata } from "@/lib/seo/metadata";
import { buildPageSchemas } from "@/lib/seo/schema";
import { REVALIDATE_DEFAULT, absoluteUrl } from "@/lib/site";

export interface DetailPageConfig {
  find: (slug: string) => ConfigEntity | undefined;
  getStaticParams: () => { slug: string }[];
  getCanonical?: (slug: string, entity: ConfigEntity) => string;
  breadcrumbPrefix: { name: string; url: string };
  sectionPrefix: string;
  includeWebsite?: boolean;
  /** Override default DetailEntityPage composite (e.g. ServiceDetailPage). */
  PageComponent?: ComponentType<{ entity: ConfigEntity; faqs: FaqItem[] }>;
}

function resolveCanonical(
  slug: string,
  entity: ConfigEntity,
  getCanonical?: DetailPageConfig["getCanonical"],
): string {
  if (getCanonical) return getCanonical(slug, entity);
  const normalized = entity.slug.startsWith("/") ? entity.slug : `/${entity.slug}`;
  return normalized.endsWith("/") ? normalized : `${normalized}/`;
}

export function createDetailPageHandlers(config: DetailPageConfig) {
  async function generateStaticParams() {
    return config.getStaticParams();
  }

  async function generateMetadata({ params }: { params: { slug: string } }) {
    const entity = config.find(params.slug);
    if (!entity) return {};

    return buildMetadata({
      title: (entity.meta_title as string) ?? entity.name,
      description: entity.meta_description as string,
      canonical: resolveCanonical(params.slug, entity, config.getCanonical),
    });
  }

  async function Page({ params }: { params: { slug: string } }) {
    const entity = config.find(params.slug);
    if (!entity) notFound();

    const canonical = resolveCanonical(params.slug, entity, config.getCanonical);
    const faqs = getFaqs((entity.faq_key as string) ?? "");
    const pageUrl = absoluteUrl(canonical);
    const pageTitle = (entity.meta_title as string) ?? entity.name;
    const prefix = config.breadcrumbPrefix;

    const breadcrumbs = [
      { label: "Home", href: "/" },
      { label: prefix.name, href: prefix.url },
      { label: entity.name },
    ];

    const crumbs = [
      { name: prefix.name, url: prefix.url },
      { name: entity.name, url: canonical },
    ];

    const jsonLd = buildPageSchemas({
      faqs,
      pageUrl,
      pageTitle,
      breadcrumbs: crumbs,
      includeOrg: true,
      includeWebsite: config.includeWebsite ?? false,
    });

    const CustomPage = config.PageComponent;

    return (
      <>
        <JsonLd data={jsonLd} />
        {CustomPage ? (
          <CustomPage entity={entity} faqs={faqs} />
        ) : (
          <DetailEntityPage
            entity={entity}
            faqs={faqs}
            breadcrumbs={breadcrumbs}
            sectionPrefix={config.sectionPrefix}
          />
        )}
      </>
    );
  }

  return {
    generateStaticParams,
    generateMetadata,
    Page,
    revalidate: REVALIDATE_DEFAULT,
  };
}
