/** Unified blog post shape (Cockpit API + WordPress fallback). */
export interface BlogPost {
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
