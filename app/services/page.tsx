import { ServicesIndexPage } from "@/components/blocks/layouts/ServicesIndexPage";
import { JsonLd } from "@/components/seo/JsonLd";
import { getFaqs } from "@/lib/data";
import { buildMetadata } from "@/lib/seo/metadata";
import { buildPageSchemas } from "@/lib/seo/schema";
import { absoluteUrl, REVALIDATE_DEFAULT } from "@/lib/site";

const canonical = "/services/";
const pageTitle = "Custom Software Development Services – QalbIT";

export const metadata = buildMetadata({
  title: pageTitle,
  description:
    "Explore QalbIT's custom software, web, mobile, e-commerce, SaaS, API, cloud and AI development services for startups and modern businesses.",
  canonical,
});

export const revalidate = REVALIDATE_DEFAULT;

export default function ServicesIndexRoutePage() {
  const faqs = getFaqs("faq_service");
  const pageUrl = absoluteUrl(canonical);

  const jsonLd = buildPageSchemas({
    faqs,
    pageUrl,
    pageTitle,
    breadcrumbs: [{ name: "Services", url: canonical }],
    includeOrg: true,
  });

  return (
    <>
      <JsonLd data={jsonLd} />
      <ServicesIndexPage faqs={faqs} />
    </>
  );
}
