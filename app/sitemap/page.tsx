import { SitemapContent } from "@/components/sitemap/SitemapContent";
import { buildMetadata } from "@/lib/seo/metadata";
import { REVALIDATE_DEFAULT } from "@/lib/site";

export const metadata = buildMetadata({
  title: "Sitemap | QalbIT Infotech Pvt Ltd",
  description:
    "Browse a structured overview of all key QalbIT pages – services, industries, technologies, portfolio, careers, insights and legal information.",
  canonical: "/sitemap/",
});

export const revalidate = REVALIDATE_DEFAULT;

export default function HtmlSitemapPage() {
  return <SitemapContent />;
}
