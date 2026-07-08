import {
  fetchPostBySlugFromCockpit,
  fetchPostsFromCockpit,
  isCockpitBlogEnabled,
} from "./cockpit";
import type { BlogPost } from "./types";
import {
  fetchAllPosts as fetchAllFromWordpress,
  fetchPostBySlug as fetchBySlugFromWordpress,
  fetchRecentPosts as fetchRecentFromWordpress,
} from "@/lib/wordpress/client";

export type { BlogPost } from "./types";

export async function fetchRecentPosts(count = 3): Promise<BlogPost[]> {
  if (isCockpitBlogEnabled()) {
    const posts = await fetchPostsFromCockpit(count);
    if (posts !== null) return posts;
  }

  return fetchRecentFromWordpress(count);
}

export async function fetchAllPosts(limit = 50): Promise<BlogPost[]> {
  if (isCockpitBlogEnabled()) {
    const posts = await fetchPostsFromCockpit(limit);
    if (posts !== null) return posts;
  }

  return fetchAllFromWordpress(limit);
}

export async function fetchPostBySlug(slug: string): Promise<BlogPost | null> {
  if (isCockpitBlogEnabled()) {
    const post = await fetchPostBySlugFromCockpit(slug);
    if (post !== null) return post;
  }

  return fetchBySlugFromWordpress(slug);
}
