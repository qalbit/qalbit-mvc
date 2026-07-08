import { ContactPage } from "@/components/blocks/layouts/ContactPage";
import { JsonLd } from "@/components/seo/JsonLd";
import { getFaqs } from "@/lib/data";
import { buildMetadata } from "@/lib/seo/metadata";
import { buildPageSchemas } from "@/lib/seo/schema";
import { absoluteUrl, REVALIDATE_DEFAULT } from "@/lib/site";

export const metadata = buildMetadata({
  title: "Contact QalbIT – Start Your Custom Software Project",
  description:
    "Get in touch with QalbIT to discuss your custom software, web, mobile, or SaaS project. Share your requirements and we will get back within 24 hours.",
  canonical: "/contact-us/",
});

export const revalidate = REVALIDATE_DEFAULT;

export default function ContactUsPage() {
  const faqs = getFaqs("faq_contactus");
  const pageUrl = absoluteUrl("/contact-us/");
  const pageTitle = "Contact QalbIT – Start Your Custom Software Project";

  const jsonLd = buildPageSchemas({
    faqs,
    pageUrl,
    pageTitle,
    breadcrumbs: [{ name: "Contact Us", url: "/contact-us/" }],
    includeOrg: true,
  });

  return (
    <>
      <JsonLd data={jsonLd} />
      <ContactPage faqs={faqs} />
    </>
  );
}
