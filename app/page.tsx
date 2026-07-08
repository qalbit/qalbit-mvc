import { BlogTeaser } from "@/components/blog/BlogTeaser";
import { HomePage } from "@/components/blocks/layouts/HomePage";
import { JsonLd } from "@/components/seo/JsonLd";
import { getFaqs, getFeaturedReviews } from "@/lib/data";
import { buildPageSchemas } from "@/lib/seo/schema";
import { absoluteUrl, REVALIDATE_DEFAULT } from "@/lib/site";
import { fetchRecentPosts } from "@/lib/blog";

export const revalidate = REVALIDATE_DEFAULT;

export default async function Page() {
  const faqs = getFaqs("home");
  const reviews = getFeaturedReviews();
  const pageUrl = absoluteUrl("/");
  const jsonLd = buildPageSchemas({
    faqs,
    pageUrl,
    pageTitle: "QalbIT – Custom Software Development Company",
    includeOrg: true,
    includeWebsite: true,
  });

  const blogPosts = await fetchRecentPosts(3);

  return (
    <>
      <JsonLd data={jsonLd} />
      <HomePage faqs={faqs} reviews={reviews} />
      <BlogTeaser posts={blogPosts} />
    </>
  );
}
