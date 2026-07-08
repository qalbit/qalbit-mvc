import { AboutPage } from "@/components/blocks/layouts/AboutPage";
import { JsonLd } from "@/components/seo/JsonLd";
import { getFaqs } from "@/lib/data";
import { buildMetadata } from "@/lib/seo/metadata";
import { buildPageSchemas } from "@/lib/seo/schema";
import { absoluteUrl, REVALIDATE_DEFAULT } from "@/lib/site";

export const metadata = buildMetadata({
  title: "About QalbIT – Custom Software Development Company",
  description:
    "Learn about QalbIT Infotech, a custom software development company helping startups and businesses build reliable web, mobile, and cloud solutions since 2018.",
  canonical: "/about-us/",
});

export const revalidate = REVALIDATE_DEFAULT;

export default function AboutUsPage() {
  const faqs = getFaqs("faq_aboutus");
  const pageUrl = absoluteUrl("/about-us/");
  const pageTitle = "About QalbIT – Custom Software Development Company";

  const jsonLd = buildPageSchemas({
    faqs,
    pageUrl,
    pageTitle,
    breadcrumbs: [{ name: "About Us", url: "/about-us/" }],
    includeOrg: true,
    includeWebsite: true,
  });

  return (
    <>
      <JsonLd data={jsonLd} />
      <AboutPage faqs={faqs} />
    </>
  );
}
