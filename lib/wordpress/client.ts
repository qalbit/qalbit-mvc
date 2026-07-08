import { env } from "../env";

export interface WpPost {
  id: string;
  slug: string;
  title: string;
  excerpt: string;
  content?: string;
  date: string;
  featuredImage?: { url: string; alt?: string };
  seo?: {
    title?: string;
    metaDesc?: string;
    canonical?: string;
    noindex?: boolean;
    ogImage?: string;
  };
}

const GET_POSTS = `
  query GetPosts($first: Int!) {
    posts(first: $first, where: { status: PUBLISH }) {
      nodes {
        id
        slug
        title
        date
        excerpt
        featuredImage {
          node {
            sourceUrl
            altText
          }
        }
      }
    }
  }
`;

const GET_POST_BY_SLUG = `
  query GetPostBySlug($slug: ID!) {
    post(id: $slug, idType: SLUG) {
      id
      slug
      title
      date
      excerpt
      content
      featuredImage {
        node {
          sourceUrl
          altText
        }
      }
    }
  }
`;

async function graphql<T>(
  query: string,
  variables?: Record<string, unknown>,
): Promise<T | null> {
  if (!env.WP_GRAPHQL_URL) return null;

  const headers: Record<string, string> = {
    "Content-Type": "application/json",
  };

  if (env.WP_GRAPHQL_AUTH) {
    headers.Authorization = `Basic ${env.WP_GRAPHQL_AUTH}`;
  }

  try {
    const res = await fetch(env.WP_GRAPHQL_URL, {
      method: "POST",
      headers,
      body: JSON.stringify({ query, variables }),
      next: { revalidate: 3600 },
    });

    if (!res.ok) return null;
    const json = (await res.json()) as { data?: T; errors?: unknown[] };
    if (json.errors?.length) {
      console.error("[wordpress] GraphQL errors:", json.errors);
      return null;
    }
    return json.data ?? null;
  } catch (err) {
    console.error("[wordpress] fetch failed:", err);
    return null;
  }
}

function mapPost(node: {
  id: string;
  slug: string;
  title: string;
  date: string;
  excerpt?: string;
  content?: string;
  featuredImage?: { node?: { sourceUrl?: string; altText?: string } };
}): WpPost {
  return {
    id: node.id,
    slug: node.slug,
    title: node.title,
    date: node.date,
    excerpt: stripTags(node.excerpt ?? ""),
    content: node.content,
    featuredImage: node.featuredImage?.node?.sourceUrl
      ? {
          url: node.featuredImage.node.sourceUrl,
          alt: node.featuredImage.node.altText,
        }
      : undefined,
  };
}

function stripTags(html: string): string {
  return html.replace(/<[^>]*>/g, "").trim();
}

export async function fetchRecentPosts(count = 3): Promise<WpPost[]> {
  const data = await graphql<{
    posts?: { nodes?: Array<Parameters<typeof mapPost>[0]> };
  }>(GET_POSTS, { first: count });

  return (data?.posts?.nodes ?? []).map(mapPost);
}

export async function fetchAllPosts(first = 50): Promise<WpPost[]> {
  return fetchRecentPosts(first);
}

export async function fetchPostBySlug(slug: string): Promise<WpPost | null> {
  const data = await graphql<{
    post?: Parameters<typeof mapPost>[0] | null;
  }>(GET_POST_BY_SLUG, { slug });

  if (!data?.post) return null;
  return mapPost(data.post);
}
