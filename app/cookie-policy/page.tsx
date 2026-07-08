import { LegalProsePage } from "@/components/legal/LegalProsePage";
import { buildMetadata } from "@/lib/seo/metadata";
import { REVALIDATE_DEFAULT } from "@/lib/site";

export const metadata = buildMetadata({
  title: "Cookie Policy | QalbIT Infotech Pvt Ltd",
  description:
    "Learn how QalbIT uses cookies and similar technologies on qalbit.com, including what we collect and how you can control your preferences.",
  canonical: "/cookie-policy/",
});

export const revalidate = REVALIDATE_DEFAULT;

export default function CookiePolicyPage() {
  return <LegalProsePage page="cookie-policy" />;
}
