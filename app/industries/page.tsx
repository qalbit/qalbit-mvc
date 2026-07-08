import { IndustriesIndexPage } from "@/components/blocks/layouts/IndustriesIndexPage";
import { JsonLd } from "@/components/seo/JsonLd";
import { getFaqs } from "@/lib/data";
import { buildMetadata } from "@/lib/seo/metadata";
import { buildPageSchemas } from "@/lib/seo/schema";
import { absoluteUrl, REVALIDATE_DEFAULT } from "@/lib/site";

const canonical = "/industries/";
const pageTitle = "Industries We Serve – QalbIT";

export const metadata = buildMetadata({
  title: pageTitle,
  description:
    "QalbIT delivers custom software solutions for e-commerce, fintech, healthcare, education, travel, business operations and more.",
  canonical,
});

export const revalidate = REVALIDATE_DEFAULT;

export default function IndustriesIndexRoutePage() {
  const faqs = getFaqs("faq_industries");
  const pageUrl = absoluteUrl(canonical);

  const jsonLd = buildPageSchemas({
    faqs,
    pageUrl,
    pageTitle,
    breadcrumbs: [{ name: "Industries", url: canonical }],
    includeOrg: true,
  });

  return (
    <>
      <JsonLd data={jsonLd} />
      <IndustriesIndexPage faqs={faqs} />
    </>
  );
}
