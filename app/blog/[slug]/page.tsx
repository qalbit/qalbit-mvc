import { notFound } from "next/navigation";
import { buildMetadata } from "@/lib/seo/metadata";
import { REVALIDATE_BLOG } from "@/lib/site";
import { fetchPostBySlug } from "@/lib/blog";

export const revalidate = REVALIDATE_BLOG;

export async function generateMetadata({
  params,
}: {
  params: { slug: string };
}) {
  const post = await fetchPostBySlug(params.slug);
  if (!post) return {};

  return buildMetadata({
    title: post.seo?.title ?? post.title,
    description: post.seo?.metaDesc ?? post.excerpt,
    canonical: `/blog/${post.slug}/`,
    noindex: post.seo?.noindex,
    ogImage: post.seo?.ogImage,
  });
}

export default async function BlogPostPage({
  params,
}: {
  params: { slug: string };
}) {
  const post = await fetchPostBySlug(params.slug);
  if (!post) notFound();

  return (
    <article className="py-16">
      <div className="mx-auto max-w-3xl px-4">
        <time className="text-sm text-muted-foreground">
          {new Date(post.date).toLocaleDateString("en-US", {
            year: "numeric",
            month: "long",
            day: "numeric",
          })}
        </time>
        <h1 className="mt-2 text-display-md font-bold">{post.title}</h1>
        {post.featuredImage?.url && (
          <img
            src={post.featuredImage.url}
            alt={post.featuredImage.alt ?? post.title}
            className="mt-6 rounded-lg w-full"
          />
        )}
        {post.content && (
          <div
            className="prose prose-slate mt-8 max-w-none"
            dangerouslySetInnerHTML={{ __html: post.content }}
          />
        )}
      </div>
    </article>
  );
}
