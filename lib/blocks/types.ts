import type { ReactNode } from "react";

/** Shared prop types for legacy PHP → React block migration. */

export interface BreadcrumbItem {
  label: string;
  href?: string;
}

export interface CtaLink {
  label: string;
  href: string;
  ariaLabel?: string;
  external?: boolean;
}

export interface SnapshotItem {
  label: string;
  value: string;
  note?: string | null;
}

export interface ListColumn {
  title?: string;
  items: string[];
}

export interface OverviewBlockProps {
  id?: string;
  eyebrow?: string;
  title: string;
  intro?: string;
  leftTitle?: string;
  leftItems?: string[];
  rightTitle?: string;
  rightItems?: string[];
  note?: string;
  dataSection?: string;
  dataAttributes?: Record<string, string>;
  hookPrefix?: string;
  csSection?: string;
}

export interface CapabilityItem {
  label?: string;
  title?: string;
  name?: string;
  description?: string;
  badge?: string;
  icon?: string;
  bullets?: string[];
  link?: { label?: string; url?: string; href?: string };
}

export interface CapabilitiesBlockProps {
  id?: string;
  eyebrow?: string;
  title: string;
  intro?: string;
  items: CapabilityItem[];
  cta?: CtaLink;
  note?: string;
  dataSection?: string;
  variant?: "default" | "dark";
  dataAttributes?: Record<string, string>;
  hookPrefix?: string;
  csSection?: string;
}

export interface ProcessStepItem {
  step?: number | string;
  title?: string;
  name?: string;
  label?: string;
  description?: string;
  duration?: string;
  outcome?: string;
  outputs?: string;
  icon?: string;
  kicker?: string;
  related?: string;
  relatedUrl?: string;
}

export interface ProcessBlockProps {
  id?: string;
  eyebrow?: string;
  title: string;
  intro?: string;
  steps: ProcessStepItem[];
  note?: string;
  cta?: CtaLink;
  dataSection?: string;
  dataAttributes?: Record<string, string>;
  hookPrefix?: string;
  mvpStepAttr?: boolean;
  csSection?: string;
}

export interface UseCaseItem {
  label?: string;
  title?: string;
  description?: string;
  audience?: string;
  badge?: string;
  link?: { label?: string; url?: string; href?: string };
}

export interface UseCasesBlockProps {
  id?: string;
  eyebrow?: string;
  title: string;
  intro?: string;
  items: UseCaseItem[];
  cta?: CtaLink;
  note?: string;
  columns?: 2 | 3;
  dataSection?: string;
  dataAttributes?: Record<string, string>;
  hookPrefix?: string;
  mvpServiceCard?: boolean;
  csSection?: string;
}

export interface TechCategory {
  name?: string;
  title?: string;
  description?: string;
  items?: string[];
}

export interface TechStackBlockProps {
  id?: string;
  eyebrow?: string;
  title: string;
  intro?: string;
  note?: string;
  categories?: TechCategory[];
  items?: CapabilityItem[];
  pills?: string[];
  dataSection?: string;
  dataAttributes?: Record<string, string>;
  hookPrefix?: string;
  mvpTechItem?: boolean;
  csSection?: string;
}

export interface DarkCtaBlockProps {
  enabled?: boolean;
  eyebrow?: string;
  title: string;
  body?: string;
  primary: CtaLink;
  secondary?: CtaLink;
  meta?: string;
  dataSection?: string;
  dataAttributes?: Record<string, string>;
  csSection?: string;
}

export interface DetailHeroProps {
  breadcrumbs: BreadcrumbItem[];
  kickerPrefix?: string;
  kickerLabel?: string;
  kickerDetail?: string;
  title: string;
  intro?: string;
  bullets?: string[];
  primaryCta?: CtaLink;
  secondaryCta?: CtaLink;
  snapshotTitle?: string;
  snapshot?: SnapshotItem[];
  imageSrc?: string;
  imageAlt?: string;
  dataSection?: string;
  dataAttributes?: Record<string, string>;
  heroElAttr?: string;
}

export interface FaqBlockProps {
  id?: string;
  title: string;
  subtitle?: string;
  bullets?: string[];
  faqs: Array<{ question: string; answer?: string; answer_html?: string }>;
  /** Adds data-mvp-section="s9" hooks for process-detail.js GSAP reveals */
  mvpHooks?: boolean;
  ctaCard?: {
    title?: string;
    body?: string;
    primary?: CtaLink;
    secondary?: CtaLink;
  };
}

export interface CardGridItem {
  title: string;
  description?: string;
  href?: string;
  badge?: string;
  meta?: string;
  icon?: string;
}

export interface CardGridBlockProps {
  id?: string;
  eyebrow?: string;
  title: string;
  subtitle?: string;
  items: CardGridItem[];
  columns?: 2 | 3 | 4;
  variant?: "default" | "bordered" | "dark";
  dataSection?: string;
  dataAttributes?: Record<string, string>;
  dataAnimate?: string;
  cardDataAttr?: string;
  cardsWrapperAttr?: string;
  hookPrefix?: string;
  csSection?: string;
}

export interface HomeServiceItem {
  name: string;
  short_description?: string;
  slug: string;
  href: string;
  icon?: string;
  iconAlt?: string;
}

export interface HomeServicesBlockProps {
  title: string;
  subtitle: string;
  items: HomeServiceItem[];
}

export interface HomeIndustryItem {
  name: string;
  summary?: string;
  slug: string;
  href: string;
  icon?: string;
}

export interface HomeIndustriesBlockProps {
  title: string;
  subtitle: string;
  items: HomeIndustryItem[];
}

export interface HomeProcessStep {
  tabId: string;
  panelId: string;
  tabLabel: string;
  panelTitle: string;
  panelDescription: string;
  ctaHref: string;
  ctaLabel: string;
  ctaAriaLabel: string;
  bullets: string[];
}

export interface HomeProcessBlockProps {
  eyebrow: string;
  title: string;
  seoTagline: string;
  intro: string;
  steps: HomeProcessStep[];
}

export interface HomeCaseStudyItem {
  slug: string;
  name: string;
  summary?: string;
  href: string;
  logo?: string;
  logoAlt?: string;
  banner?: string;
  bannerAlt?: string;
  tech_stack?: string[];
}

export interface HomeCaseStudiesBlockProps {
  title: string;
  subtitle: string;
  items: HomeCaseStudyItem[];
}

export interface HomeTechnologyItem {
  slug: string;
  name: string;
  short_name?: string;
  tagline?: string;
  summary?: string;
  href: string;
  icon?: string;
  bulletLines?: string[];
}

export interface HomeTechnologiesBlockProps {
  title: string;
  subtitle: string;
  items: HomeTechnologyItem[];
}

export interface MetricItem {
  label: string;
  value: string;
  note?: string;
}

export interface MetricsBlockProps {
  id?: string;
  title?: string;
  subtitle?: string;
  items: MetricItem[];
  dataSection?: string;
}

export interface ProseBlockProps {
  id?: string;
  title?: string;
  html?: string;
  children?: ReactNode;
  dataPage?: string;
}

export interface HomeHeroProps {
  pill?: string;
  title: string;
  description?: string;
  imageSrc?: string;
  imageAlt?: string;
  primaryCta?: CtaLink;
  secondaryCta?: CtaLink;
}

export interface IndexHeroProps extends Omit<DetailHeroProps, "breadcrumbs"> {
  breadcrumbs: BreadcrumbItem[];
  responseNote?: string;
  sectionWrapperData?: Record<string, string>;
}

export interface AboutHeroProps {
  eyebrow?: string;
  title: string;
  intro?: string;
  bullets?: string[];
  primaryCta?: CtaLink;
  secondaryCta?: CtaLink;
  snapshotTitle?: string;
  snapshot?: SnapshotItem[];
}

export interface AboutCardItem {
  key?: string;
  label: string;
  description?: string;
  bullets?: string[];
}

export interface AboutSnapshotRow {
  label: string;
  value: string;
}

export interface AboutWhoSectionProps {
  id?: string;
  headingId?: string;
  eyebrow?: string;
  title: string;
  intro?: string;
  cards: AboutCardItem[];
  snapshot: AboutSnapshotRow[];
}

export interface AboutWhatWeDoSectionProps {
  id?: string;
  headingId?: string;
  eyebrow?: string;
  title: string;
  intro?: string;
  items: AboutCardItem[];
}

export interface AboutMetricItem {
  value: string;
  target?: number;
  label: string;
  description?: string;
}

export interface AboutImpactSectionProps {
  id?: string;
  headingId?: string;
  eyebrow?: string;
  title: string;
  intro?: string;
  metrics: AboutMetricItem[];
  footnote?: string;
}

export interface AboutClientLogo {
  logo: string;
  alt: string;
  url?: string | null;
  industry?: string;
}

export interface AboutClientsSectionProps {
  id?: string;
  headingId?: string;
  eyebrow?: string;
  title: string;
  intro?: string;
  logosLabel?: string;
  logos: AboutClientLogo[];
  logosFootnote?: string;
  industriesLabel?: string;
  industries: string[];
  industriesFootnote?: string;
}

export interface AboutLeaderSectionProps {
  id?: string;
  headingId?: string;
  eyebrow?: string;
  title: string;
  intro?: string;
  founder: {
    key?: string;
    name: string;
    role: string;
    image: string;
    imageAlt: string;
    bio: string;
    bullets: string[];
  };
  howWeLead: {
    label: string;
    bullets: string[];
  };
}

export interface AboutCultureSectionProps {
  id?: string;
  headingId?: string;
  eyebrow?: string;
  title: string;
  intro?: string;
  dayToDay: { label: string; bullets: string[] };
  values: {
    label: string;
    items: Array<{ label: string; description: string }>;
  };
}

export interface AboutHowWeWorkSectionProps {
  id?: string;
  headingId?: string;
  eyebrow?: string;
  title: string;
  intro?: string;
  steps: Array<{ step: number; label: string; description?: string }>;
  reassurance?: string;
  cta?: CtaLink;
}

export interface AboutCaseStudyItem {
  key?: string;
  category?: string;
  badge?: string;
  title: string;
  description?: string;
  details?: Array<{ label: string; value: string }>;
  link?: CtaLink;
}

export interface AboutCaseStudiesSectionProps {
  id?: string;
  headingId?: string;
  eyebrow?: string;
  title: string;
  intro?: string;
  items: AboutCaseStudyItem[];
  footnote?: string;
}

export interface AboutTechStackSectionProps {
  id?: string;
  headingId?: string;
  eyebrow?: string;
  title: string;
  intro?: string;
  stack: { label: string; tags: string[] };
  practices: { label: string; bullets: string[] };
}

export interface AboutTrustSectionProps {
  id?: string;
  headingId?: string;
  eyebrow?: string;
  title: string;
  intro?: string;
  items: AboutCardItem[];
}

export interface AboutCareerSectionProps {
  id?: string;
  headingId?: string;
  eyebrow?: string;
  title: string;
  intro?: string;
  team: { label: string; bullets: string[] };
  cta: {
    title: string;
    description: string;
    primaryCta: CtaLink;
    secondaryCta?: CtaLink;
    footnote?: string;
  };
}

export interface ContactHeroTrustProps {
  title?: string;
  rating?: string;
  ratingNote?: string;
  regionNote?: string;
  replyNote?: string;
  email?: string;
}

export interface ContactHeroProps {
  eyebrow?: string;
  title: string;
  intro?: string;
  needsTitle?: string;
  needs?: string[];
  needsNote?: string;
  trust?: ContactHeroTrustProps;
  exploreLinks?: Array<{ label: string; href: string }>;
  formTitle?: string;
  formIntro?: string;
  leadFrom?: string;
  redirectTo?: string;
}

export interface ContactRequestCard {
  title: string;
  description: string;
  footnote?: string;
  footnoteLink?: { label: string; href: string };
}

export interface ContactMiniStep {
  step: number;
  title: string;
  description: string;
}

export interface ContactRequestsSectionProps {
  title: string;
  intro: string;
  cards: ContactRequestCard[];
  asideTitle: string;
  asideIntro: string;
  steps: ContactMiniStep[];
  asideFootnote?: string;
  asideFootnoteEmail?: string;
}

export interface ContactLocationCard {
  title: string;
  region: string;
  lines: string[];
  phone?: string;
  phoneNote?: string;
  timezone?: string;
}

export interface ContactLocationsSectionProps {
  title: string;
  intro: string;
  cards: ContactLocationCard[];
  directContact: {
    title: string;
    emails: Array<{ label: string; href: string; email: string }>;
    calendlyNote?: string;
    calendlyHref?: string;
  };
}

export interface ContactFinalCtaSectionProps {
  title: string;
  body: string;
  primary: CtaLink;
  email?: string;
}

export interface ContactStatItem {
  value: string;
  label: string;
  iconSrc?: string;
  iconAlt?: string;
}

export interface ContactCtaSectionProps {
  id?: string;
  eyebrow?: string;
  title: string;
  subtitle?: string;
  primaryCta?: CtaLink;
  body?: string;
  stats?: ContactStatItem[];
  badgeHref?: string;
  badgeImageSrc?: string;
  badgeAlt?: string;
  leadFrom?: string;
  redirectTo?: string;
}

export interface TeamCtaStep {
  step: number;
  iconSrc?: string;
  iconAlt?: string;
  title: string;
  body?: string;
  bullets?: string[];
}

export interface TeamCtaSectionProps {
  id?: string;
  eyebrow?: string;
  title: string;
  subtitle?: string;
  bullets?: string[];
  primaryCta?: CtaLink;
  secondaryCta?: CtaLink;
  steps: TeamCtaStep[];
}

export interface PortfolioFilterOption {
  value: string;
  label: string;
}

export interface PortfolioFiltersProps {
  id?: string;
  label?: string;
  industryLabel?: string;
  techLabel?: string;
  industryAllLabel?: string;
  techAllLabel?: string;
  allLabel?: string;
  submitLabel?: string;
  resetLabel?: string;
  hint?: string;
  industries: PortfolioFilterOption[];
  technologies: PortfolioFilterOption[];
  activeIndustry?: string | null;
  activeTechnology?: string | null;
  basePath?: string;
}

export interface PortfolioGridItem {
  name: string;
  slug?: string;
  href?: string;
  industry?: string;
  technology?: string;
  summary?: string;
  imageSrc?: string;
  imageAlt?: string;
  badge?: string;
  client?: string;
  industries?: string[];
  technologies?: string[];
  external?: boolean;
  linkLabel?: string;
}

export interface PortfolioGridProps {
  id?: string;
  title?: string;
  subtitle?: string;
  items: PortfolioGridItem[];
  emptyTitle?: string;
  emptyMessage?: string;
  industryLabels?: Record<string, string>;
  technologyLabels?: Record<string, string>;
}

export interface ReviewPlatformItem {
  name: string;
  platformLabel?: string;
  rating?: string;
  detail?: string;
  href?: string;
  logoSrc?: string;
  logoAlt?: string;
}

export interface ReviewStripProps {
  title?: string;
  items: ReviewPlatformItem[];
}

export interface ReviewItem {
  quote: string;
  name?: string;
  role?: string;
  company?: string;
  companyUrl?: string;
  industry?: string;
  rating?: number;
  type?: string;
  videoUrl?: string;
  videoSrc?: string;
  thumbnailSrc?: string;
}

export interface ReviewsSectionProps {
  id?: string;
  eyebrow?: string;
  title: string;
  subtitle?: string;
  bullets?: string[];
  reviews: ReviewItem[];
}

export interface ClientLogo {
  name: string;
  logoSrc?: string;
  logo?: string;
  alt?: string;
  href?: string;
}

export interface ClientMarqueeProps {
  id?: string;
  eyebrow?: string;
  title: string;
  subtitle?: string;
  bullets?: string[];
  clients: ClientLogo[];
}

export interface ChallengeSectionProps {
  id?: string;
  title?: string;
  beforeTitle?: string;
  beforeStory?: string;
  bulletsTitle?: string;
  challenges?: string[];
}

export interface GoalsSectionProps {
  id?: string;
  title?: string;
  businessGoalsTitle?: string;
  businessGoals?: string[];
  productGoalsTitle?: string;
  productGoals?: string[];
  note?: string;
}

export interface ResultsSectionProps {
  id?: string;
  title?: string;
  subtitle?: string;
  metrics?: MetricItem[];
  narrative?: string;
  testimonial?: { quote: string; name?: string; role?: string };
  inlineCta?: { text?: string; linkLabel?: string; href?: string };
}

export interface FitPersona {
  key?: string;
  label: string;
  situation?: string;
  help?: string;
}

export interface FitSectionProps {
  id?: string;
  eyebrow?: string;
  title?: string;
  intro?: string;
  personas: FitPersona[];
  problemsTitle?: string;
  problems?: string[];
}

export interface ProcessProofCase {
  key?: string;
  label: string;
  badge?: string;
  description?: string;
  stack?: string;
  outcome?: string;
  impact?: string;
  linkLabel?: string;
  linkHref?: string;
}

export interface ProcessProofSectionProps {
  id?: string;
  eyebrow?: string;
  title?: string;
  intro?: string;
  cases: ProcessProofCase[];
  summaryNote?: string;
}

export interface ProcessWhyReason {
  key?: string;
  label: string;
  description?: string;
  points?: string[];
}

export interface ProcessWhyTestimonial {
  quote: string;
  attribution?: string;
}

export interface ProcessWhySectionProps {
  id?: string;
  eyebrow?: string;
  title?: string;
  intro?: string;
  reasons: ProcessWhyReason[];
  testimonials?: ProcessWhyTestimonial[];
}

export interface EngagementModel {
  key?: string;
  label: string;
  badge?: string;
  duration?: string;
  description?: string;
  bestFor?: string;
  budgetRange?: string;
  deliverables?: string;
  href?: string;
}

export interface EngagementCardsProps {
  id?: string;
  eyebrow?: string;
  title?: string;
  intro?: string;
  models: EngagementModel[];
  note?: string;
  dataSection?: string;
  dataAttributes?: Record<string, string>;
  mvpEngagementCard?: boolean;
}

export interface GeoServiceItem {
  title: string;
  description?: string;
  href?: string;
  badge?: string;
}

export interface GeoServicesProps {
  id?: string;
  eyebrow?: string;
  title?: string;
  intro?: string;
  stateLabel?: string;
  stateKey?: string;
  items: GeoServiceItem[];
}

export interface GeoCaseItem {
  label?: string;
  industry?: string;
  region?: string;
  headline?: string;
  result?: string;
  href?: string;
}

export interface GeoTestimonial {
  quote: string;
  name?: string;
  role?: string;
  title?: string;
  region?: string;
}

export interface GeoWhySectionProps {
  id?: string;
  stateKey?: string;
  stateLabel?: string;
  eyebrow?: string;
  title?: string;
  intro?: string;
  items: CapabilityItem[];
}

export interface GeoProcessSectionProps {
  id?: string;
  stateKey?: string;
  stateLabel?: string;
  eyebrow?: string;
  title?: string;
  intro?: string;
  steps: ProcessStepItem[];
  links?: Array<{ label: string; href: string }>;
}

export interface GeoEngagementsSectionProps {
  id?: string;
  stateKey?: string;
  stateLabel?: string;
  eyebrow?: string;
  title?: string;
  intro?: string;
  models: EngagementModel[];
}

export interface GeoTechSectionProps {
  id?: string;
  stateKey?: string;
  stateLabel?: string;
  eyebrow?: string;
  title?: string;
  intro?: string;
  categories: TechCategory[];
  links?: Array<{ label: string; href: string }>;
}

export interface GeoFinalCtaSectionProps {
  id?: string;
  stateKey?: string;
  stateLabel?: string;
  eyebrow?: string;
  title: string;
  body?: string;
  primary: CtaLink;
  secondary?: CtaLink;
}

export interface GeoProofProps {
  id?: string;
  eyebrow?: string;
  title?: string;
  intro?: string;
  stateKey?: string;
  cases?: GeoCaseItem[];
  testimonials?: GeoTestimonial[];
}

export interface JobOpening {
  title: string;
  slug?: string;
  href?: string;
  team?: string;
  location?: string;
  experience?: string;
  employmentType?: string;
  summary?: string;
  highlights?: string[];
  badge?: string;
  updatedLabel?: string;
}

export interface OpeningsGridProps {
  id?: string;
  title?: string;
  subtitle?: string;
  roles: JobOpening[];
  evergreenRoles?: JobOpening[];
  totalCount?: number;
}

export interface BenefitsGroup {
  label: string;
  items: string[];
}

export interface BenefitsGridProps {
  id?: string;
  title?: string;
  subtitle?: string;
  intro?: string;
  groups: BenefitsGroup[];
  meta?: string;
}

export interface NotFoundContentProps {
  title?: string;
  body?: string;
  primaryCta?: CtaLink;
  secondaryCta?: CtaLink;
  links?: Array<{ label: string; href: string }>;
}

export type BlockStatus = "implemented" | "partial" | "planned";

export interface BlockRegistryEntry {
  id: string;
  name: string;
  phpPartial?: string;
  reactComponent: string;
  status: BlockStatus;
  pageTypes: string[];
  dataAttributes?: string[];
}
