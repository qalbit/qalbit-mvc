import { HireIndexPage } from "@/components/blocks/layouts/HireIndexPage";
import { JsonLd } from "@/components/seo/JsonLd";
import { buildMetadata } from "@/lib/seo/metadata";
import { buildPageSchemas } from "@/lib/seo/schema";
import { absoluteUrl, REVALIDATE_DEFAULT } from "@/lib/site";

const canonical = "/hire-developers/";
const pageTitle = "Hire Dedicated Developers – QalbIT";

export const metadata = buildMetadata({
  title: pageTitle,
  description:
    "Hire dedicated Node.js, Laravel, React, Next.js, Flutter and full-stack developers from QalbIT to extend your team and ship reliable web, mobile and SaaS products.",
  canonical,
});

export const revalidate = REVALIDATE_DEFAULT;

export default function HireDevelopersPage() {
  const pageUrl = absoluteUrl(canonical);

  const jsonLd = buildPageSchemas({
    faqs: [],
    pageUrl,
    pageTitle,
    breadcrumbs: [{ name: "Hire Developers", url: canonical }],
    includeOrg: true,
  });

  return (
    <>
      <JsonLd data={jsonLd} />
      <HireIndexPage />
    </>
  );
}
