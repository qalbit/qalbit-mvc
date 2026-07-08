import { LegalProsePage } from "@/components/legal/LegalProsePage";
import { buildMetadata } from "@/lib/seo/metadata";
import { REVALIDATE_DEFAULT } from "@/lib/site";

export const metadata = buildMetadata({
  title: "Privacy Policy | QalbIT Infotech Pvt Ltd",
  description:
    "Read how QalbIT Infotech Pvt Ltd collects, uses and protects your personal data when you interact with qalbit.com and our services.",
  canonical: "/privacy-policy/",
});

export const revalidate = REVALIDATE_DEFAULT;

export default function PrivacyPolicyPage() {
  return <LegalProsePage page="privacy-policy" />;
}
