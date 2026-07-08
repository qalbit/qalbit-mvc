import Link from "next/link";
import { buildMetadata } from "@/lib/seo/metadata";
import { REVALIDATE_BLOG } from "@/lib/site";
import { fetchAllPosts } from "@/lib/blog";

export const metadata = buildMetadata({
  title: "Blog – QalbIT",
  description: "Articles on software development, product engineering and technology.",
  canonical: "/blog/",
});

export const revalidate = REVALIDATE_BLOG;

export default async function BlogIndexPage() {
  const posts = await fetchAllPosts(50);

  return (
    <section className="py-16">
      <div className="mx-auto max-w-6xl px-4">
        <h1 className="text-display-md font-bold">Blog</h1>
        <p className="mt-4 text-muted-foreground">Insights from the QalbIT team.</p>

        {posts.length === 0 ? (
          <p className="mt-8 text-muted-foreground">
            Blog posts will appear here once Cockpit or WordPress GraphQL is configured.
          </p>
        ) : (
          <div className="mt-10 space-y-6">
            {posts.map((post) => (
              <article key={post.id} className="rounded-lg border bg-white p-6 shadow-soft">
                <time className="text-xs text-muted-foreground">
                  {new Date(post.date).toLocaleDateString()}
                </time>
                <h2 className="mt-2 text-lg font-semibold">
                  <Link href={`/blog/${post.slug}/`} className="hover:text-primary-700">
                    {post.title}
                  </Link>
                </h2>
                <p className="mt-2 text-sm text-muted-foreground">{post.excerpt}</p>
              </article>
            ))}
          </div>
        )}
      </div>
    </section>
  );
}
