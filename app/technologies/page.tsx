import { TechnologiesIndexPage } from "@/components/blocks/layouts/TechnologiesIndexPage";
import { JsonLd } from "@/components/seo/JsonLd";
import { getFaqs } from "@/lib/data";
import { buildMetadata } from "@/lib/seo/metadata";
import { buildPageSchemas } from "@/lib/seo/schema";
import { absoluteUrl, REVALIDATE_DEFAULT } from "@/lib/site";

const canonical = "/technologies/";
const pageTitle = "Technologies We Use – React, Node.js, Laravel, Flutter & More | QalbIT";

export const metadata = buildMetadata({
  title: pageTitle,
  description:
    "Explore the core technologies QalbIT uses to build web, mobile and SaaS products: React, Node.js, Nest.js, Laravel, Flutter, WordPress and more.",
  canonical,
});

export const revalidate = REVALIDATE_DEFAULT;

export default function TechnologiesIndexRoutePage() {
  const faqs = getFaqs("faq_technology");
  const pageUrl = absoluteUrl(canonical);

  const jsonLd = buildPageSchemas({
    faqs,
    pageUrl,
    pageTitle,
    breadcrumbs: [{ name: "Technologies", url: canonical }],
    includeOrg: true,
  });

  return (
    <>
      <JsonLd data={jsonLd} />
      <TechnologiesIndexPage faqs={faqs} />
    </>
  );
}
