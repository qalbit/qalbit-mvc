import { CockpitSaasPage } from "@/components/blocks/layouts/CockpitSaasPage";
import { JsonLd } from "@/components/seo/JsonLd";
import { buildMetadata } from "@/lib/seo/metadata";
import { buildPageSchemas } from "@/lib/seo/schema";
import { absoluteUrl, REVALIDATE_DEFAULT } from "@/lib/site";

export const metadata = buildMetadata({
  title: "QalbIT Cockpit — Multi-tenant CRM & content ops",
  description:
    "Run leads, blog, analytics, and AI editorial for every product from one SaaS operations console. Free trial, plan tiers, and Stripe billing.",
  canonical: "/cockpit/",
});

export const revalidate = REVALIDATE_DEFAULT;

export default function CockpitMarketingPage() {
  const pageUrl = absoluteUrl("/cockpit/");
  const pageTitle = "QalbIT Cockpit — Multi-tenant CRM & content ops";

  const jsonLd = buildPageSchemas({
    pageUrl,
    pageTitle,
    breadcrumbs: [{ name: "Cockpit", url: "/cockpit/" }],
    includeOrg: true,
    includeWebsite: true,
  });

  return (
    <>
      <JsonLd data={jsonLd} />
      <CockpitSaasPage />
    </>
  );
}
