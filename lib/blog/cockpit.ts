import { env } from "@/lib/env";
import type { BlogPost } from "./types";

const PRODUCT = "qalbit-web";

type CockpitListResponse = {
  success: boolean;
  posts?: BlogPost[];
};

type CockpitShowResponse = {
  success: boolean;
  post?: BlogPost;
};

async function fetchCockpit<T>(path: string): Promise<T | null> {
  if (!env.COCKPIT_API_URL) return null;

  try {
    const url = new URL(path, env.COCKPIT_API_URL);
    const res = await fetch(url, {
      next: { revalidate: 3600 },
    });

    if (!res.ok) return null;

    return (await res.json()) as T;
  } catch (err) {
    console.error("[cockpit-blog] fetch failed:", err);
    return null;
  }
}

export async function fetchPostsFromCockpit(limit = 50): Promise<BlogPost[] | null> {
  const data = await fetchCockpit<CockpitListResponse>(
    `/api/v1/blog?product=${PRODUCT}&limit=${limit}`,
  );

  if (!data?.success || !data.posts) return null;

  return data.posts;
}

export async function fetchPostBySlugFromCockpit(slug: string): Promise<BlogPost | null> {
  const data = await fetchCockpit<CockpitShowResponse>(
    `/api/v1/blog/${encodeURIComponent(slug)}?product=${PRODUCT}`,
  );

  if (!data?.success || !data.post) return null;

  return data.post;
}

export function isCockpitBlogEnabled(): boolean {
  return Boolean(env.COCKPIT_API_URL);
}
