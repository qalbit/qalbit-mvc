import { notFound } from "next/navigation";
import { CaseStudyDetailPage as CaseStudyDetailView } from "@/components/case-studies/CaseStudyDetailPage";
import { JsonLd } from "@/components/seo/JsonLd";
import type { CaseStudyRecord } from "@/lib/blocks/case-study-mappers";
import {
  caseStudies,
  caseStudySlugSegment,
  getCaseStudyBySlug,
  getCaseStudyFaqs,
} from "@/lib/data";
import { buildMetadata } from "@/lib/seo/metadata";
import { buildPageSchemas } from "@/lib/seo/schema";
import { REVALIDATE_DEFAULT, absoluteUrl } from "@/lib/site";

export const revalidate = REVALIDATE_DEFAULT;

export function generateStaticParams() {
  return caseStudies.map((cs) => ({
    slug: caseStudySlugSegment(cs.slug),
  }));
}

export async function generateMetadata({
  params,
}: {
  params: { slug: string };
}) {
  const entity = getCaseStudyBySlug(params.slug);
  if (!entity) return {};

  return buildMetadata({
    title: entity.meta_title ?? `${entity.name} – Case Study | QalbIT`,
    description: entity.meta_description ?? entity.summary ?? entity.short_description,
    canonical: entity.slug,
  });
}

export default function CaseStudyDetailPage({
  params,
}: {
  params: { slug: string };
}) {
  const entity = getCaseStudyBySlug(params.slug);
  if (!entity) notFound();

  const faqs = getCaseStudyFaqs(entity);
  const pageUrl = absoluteUrl(entity.slug);
  const pageTitle = entity.meta_title ?? `${entity.name} – Case Study | QalbIT`;

  const jsonLd = buildPageSchemas({
    faqs,
    pageUrl,
    pageTitle,
    breadcrumbs: [
      { name: "Case Studies", url: "/case-studies/" },
      { name: entity.name, url: entity.slug },
    ],
    includeOrg: true,
  });

  return (
    <>
      <JsonLd data={jsonLd} />
      <CaseStudyDetailView
        caseStudy={entity as CaseStudyRecord}
        faqs={faqs}
      />
    </>
  );
}
