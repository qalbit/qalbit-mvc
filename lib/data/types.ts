/** Shared JSON block shape used across entity section fields. */
export interface EntityBlockSection {
  id?: string;
  title?: string;
  intro?: string;
  eyebrow?: string;
  subtitle?: string;
  body?: string;
  text?: string;
  bullets?: string[];
  bullets_title?: string;
  steps?: unknown[];
  items?: unknown[];
  primary_cta?: { label?: string; href?: string; url?: string };
  secondary_cta?: { label?: string; href?: string; url?: string };
  [key: string]: unknown;
}

export interface ConfigEntity {
  slug: string;
  name: string;
  h1?: string;
  enabled?: boolean;
  order?: number;
  meta_title?: string;
  meta_description?: string;
  short_description?: string;
  summary?: string;
  faq_key?: string;
  faq_title?: string;
  faq_subtitle?: string;
  faq_bullets?: string[];
  show_home?: boolean | number;
  icon?: string;
  iconAlt?: string;
  hero?: EntityBlockSection;
  overview?: EntityBlockSection;
  capabilities?: EntityBlockSection;
  process?: EntityBlockSection;
  use_cases?: EntityBlockSection;
  stack?: EntityBlockSection;
  cta?: EntityBlockSection;
  /** Process-page blocks (start-up-mvp, engagement-model, etc.) */
  fit?: EntityBlockSection;
  services?: EntityBlockSection | unknown[];
  engagements?: EntityBlockSection;
  proof?: EntityBlockSection;
  tech?: EntityBlockSection;
  why?: EntityBlockSection;
  final_cta?: EntityBlockSection;
  sections?: Record<string, EntityBlockSection>;
}

export interface FaqItem {
  question: string;
  answer: string;
  answer_html?: string;
}

export interface GeoSeo {
  h1?: string;
  meta_title?: string;
  meta_description?: string;
  canonical?: string;
  faq_key?: string;
  breadcrumbs?: Array<{ label: string; url: string }>;
}

export interface GeoLocation {
  slug: string;
  country_key: string;
  country_name: string;
  state_key: string;
  name: string;
  short_name?: string;
  enabled?: boolean;
  order?: number;
  meta_title?: string;
  meta_description?: string;
  headline?: string;
  short_description?: string;
  faq_key?: string;
  faq_title?: string;
  faq_subtitle?: string;
  faq_bullets?: string[];
  seo?: GeoSeo;
  sections?: Record<string, EntityBlockSection>;
  summary?: Record<string, unknown>;
}

export interface CaseStudy {
  slug: string;
  name: string;
  h1?: string;
  enabled?: boolean;
  order?: number;
  meta_title?: string;
  meta_description?: string;
  short_description?: string;
  summary?: string;
  faq_key?: string;
  industry?: string;
  services?: string[];
  client?: string;
  location?: string;
  banner?: string;
  bannerAlt?: string;
  logo?: string;
  logoAlt?: string;
  tech_stack?: string[];
  seo?: Record<string, unknown>;
  sections?: Record<string, EntityBlockSection>;
}

export interface Client {
  id: string;
  name: string;
  logo: string;
  alt?: string;
  url?: string | null;
  order?: number;
  enabled?: boolean;
}

export interface Review {
  id: string;
  quote: string;
  author: string;
  contexts?: string[];
  featured?: boolean;
  enabled?: boolean;
  order?: number;
  video_url?: string;
  thumbnail?: string;
}

export interface PortfolioItem {
  slug?: string;
  name?: string;
  title?: string;
  type?: string;
  industries?: string[];
  technologies?: string[];
  featured?: boolean;
  thumbnail?: string;
  summary?: string;
  order?: number;
  enabled?: boolean;
  href?: string;
  client?: string;
  case_study_url?: string;
  external_url?: string;
}
