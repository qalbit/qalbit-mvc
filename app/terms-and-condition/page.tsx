import { LegalProsePage } from "@/components/legal/LegalProsePage";
import { buildMetadata } from "@/lib/seo/metadata";
import { REVALIDATE_DEFAULT } from "@/lib/site";

export const metadata = buildMetadata({
  title: "Terms & Conditions | QalbIT Infotech Pvt Ltd",
  description:
    "Review the terms and conditions that apply when you use qalbit.com, our content and our software development services.",
  canonical: "/terms-and-condition/",
});

export const revalidate = REVALIDATE_DEFAULT;

export default function TermsPage() {
  return <LegalProsePage page="terms-and-condition" />;
}
