import { PortfolioPage as PortfolioPageView } from "@/components/blocks/layouts/PortfolioPage";
import { JsonLd } from "@/components/seo/JsonLd";
import { getFaqs, getPortfolioItems } from "@/lib/data";
import { buildMetadata } from "@/lib/seo/metadata";
import { buildPageSchemas } from "@/lib/seo/schema";
import { absoluteUrl, REVALIDATE_DEFAULT } from "@/lib/site";

const canonical = "/portfolio/";
const pageTitle = "Custom Software & SaaS Development Portfolio | QalbIT";

export const metadata = buildMetadata({
  title: pageTitle,
  description:
    "Browse selected projects and case studies from QalbIT – custom software platforms, SaaS products and mobile apps built for clients across sports, healthcare, HR tech, telecom, e-commerce and more.",
  canonical,
});

export const revalidate = REVALIDATE_DEFAULT;

export default function PortfolioRoutePage({
  searchParams,
}: {
  searchParams: { industry?: string; tech?: string };
}) {
  const faqs = getFaqs("portfolio");
  const pageUrl = absoluteUrl(canonical);
  const items = getPortfolioItems().filter((item) => item.enabled !== false);

  const jsonLd = buildPageSchemas({
    faqs,
    pageUrl,
    pageTitle,
    breadcrumbs: [{ name: "Portfolio", url: canonical }],
    includeOrg: true,
  });

  const activeIndustry = searchParams.industry?.trim() || null;
  const activeTechnology = searchParams.tech?.trim() || null;

  return (
    <>
      <JsonLd data={jsonLd} />
      <PortfolioPageView
        items={items}
        faqs={faqs}
        activeIndustry={activeIndustry}
        activeTechnology={activeTechnology}
      />
    </>
  );
}
