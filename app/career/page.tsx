import { CareersPage } from "@/components/blocks/layouts/CareersPage";
import { JsonLd } from "@/components/seo/JsonLd";
import careersData from "@/lib/data/careers.json";
import { getFaqsForKey } from "@/lib/data";
import { buildMetadata } from "@/lib/seo/metadata";
import { buildPageSchemas } from "@/lib/seo/schema";
import { absoluteUrl, REVALIDATE_DEFAULT } from "@/lib/site";

const pageConfig = careersData.page;

export const metadata = buildMetadata({
  title: pageConfig.meta_title ?? "Software Developer Jobs in Ahmedabad – Careers at QalbIT",
  description:
    pageConfig.meta_description ??
    "Explore careers at QalbIT in Ahmedabad – engineering, frontend, mobile, QA and product roles.",
  canonical: "/career/",
});

export const revalidate = REVALIDATE_DEFAULT;

export default function CareerPage() {
  const faqs = getFaqsForKey(pageConfig.faq_key);
  const pageUrl = absoluteUrl("/career/");
  const pageTitle = pageConfig.meta_title ?? "Careers at QalbIT";

  const jsonLd = buildPageSchemas({
    faqs,
    pageUrl,
    pageTitle,
    breadcrumbs: [
      { name: "Home", url: "/" },
      { name: "Careers", url: "/career/" },
    ],
    includeOrg: true,
    includeWebsite: true,
  });

  return (
    <>
      <JsonLd data={jsonLd} />
      <CareersPage faqs={faqs} />
    </>
  );
}
