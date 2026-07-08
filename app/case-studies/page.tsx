import { CaseStudiesIndexPage } from "@/components/blocks/layouts/CaseStudiesIndexPage";
import { buildMetadata } from "@/lib/seo/metadata";
import { REVALIDATE_DEFAULT } from "@/lib/site";

export const metadata = buildMetadata({
  title: "Case Studies – QalbIT",
  description:
    "A sample of projects delivered by QalbIT across SaaS, custom software and digital products.",
  canonical: "/case-studies/",
});

export const revalidate = REVALIDATE_DEFAULT;

export default function CaseStudiesIndexRoutePage() {
  return <CaseStudiesIndexPage />;
}
