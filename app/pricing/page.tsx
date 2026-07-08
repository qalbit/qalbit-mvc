import { CockpitSaasPage } from "@/components/blocks/layouts/CockpitSaasPage";
import { JsonLd } from "@/components/seo/JsonLd";
import { buildMetadata } from "@/lib/seo/metadata";
import { buildPageSchemas } from "@/lib/seo/schema";
import { absoluteUrl, REVALIDATE_DEFAULT } from "@/lib/site";

export const metadata = buildMetadata({
  title: "LiftUp Pricing — CRM, content & insights plans",
  description:
    "Free, Starter, Growth, and Enterprise plans in USD and INR. 14-day Growth trial, flat org pricing, AI token caps, Stripe and Razorpay checkout.",
  canonical: "/pricing/",
});

export const revalidate = REVALIDATE_DEFAULT;

export default function PricingPage() {
  const pageUrl = absoluteUrl("/pricing/");
  const pageTitle = "LiftUp Pricing — CRM, content & insights plans";

  const jsonLd = buildPageSchemas({
    pageUrl,
    pageTitle,
    breadcrumbs: [
      { name: "Home", url: "/" },
      { name: "Pricing", url: "/pricing/" },
    ],
    includeOrg: true,
    includeWebsite: true,
  });

  return (
    <>
      <JsonLd data={jsonLd} />
      <CockpitSaasPage showHero={false} pricingOnly />
    </>
  );
}
