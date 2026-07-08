import type { BlockRegistryEntry } from "./types";

/**
 * Master catalog — every reusable UI block from PHP partials.
 * Status: implemented = React component exists; partial = legacy HTML or incomplete; planned = tracked only.
 */
export const BLOCK_REGISTRY: BlockRegistryEntry[] = [
  // Layout chrome
  { id: "header", name: "Site header", phpPartial: "partials/header/default.php", reactComponent: "layout/Header", status: "implemented", pageTypes: ["all"] },
  { id: "footer", name: "Site footer", phpPartial: "partials/footer/default.php", reactComponent: "layout/Footer", status: "implemented", pageTypes: ["all"] },
  { id: "cookie-banner", name: "Cookie banner", phpPartial: "common/cookie.popup.php", reactComponent: "common/CookieConsent", status: "implemented", pageTypes: ["all"], dataAttributes: ["data-cookie-banner"] },
  { id: "exit-popup", name: "Exit intent popup", phpPartial: "common/exit-intent.popup.php", reactComponent: "common/ExitIntentModal", status: "implemented", pageTypes: ["all"], dataAttributes: ["data-exit-popup"] },
  { id: "floating-stack", name: "Floating scroll-to-top", phpPartial: "common/floating-stack.php", reactComponent: "common/FloatingStack", status: "implemented", pageTypes: ["all"], dataAttributes: ["data-floating-stack", "data-scroll-top-trigger"] },

  // Heroes
  { id: "hero-home", name: "Home hero", phpPartial: "partials/hero/default.php", reactComponent: "blocks/heroes/HomeHero", status: "implemented", pageTypes: ["home"] },
  { id: "hero-index", name: "Index listing hero", phpPartial: "partials/hero/service.php", reactComponent: "blocks/heroes/IndexHero", status: "implemented", pageTypes: ["services", "industries", "technologies"] },
  { id: "hero-detail", name: "Detail hero + snapshot", phpPartial: "partials/services/service-hero.php", reactComponent: "blocks/heroes/DetailHero", status: "implemented", pageTypes: ["service-detail", "industry-detail", "technology-detail", "hire-detail", "geo-detail", "portfolio", "careers", "process-detail", "case-study-detail"] },
  { id: "hero-about", name: "About hero", phpPartial: "partials/hero/about.php", reactComponent: "blocks/heroes/AboutHero", status: "implemented", pageTypes: ["about"] },
  { id: "hero-contact", name: "Contact hero + form", phpPartial: "partials/hero/contact.php", reactComponent: "blocks/heroes/ContactHero", status: "implemented", pageTypes: ["contact"], dataAttributes: ["data-contact-section", "data-contact-hero-el", "data-contact-form"] },

  // Detail template (S2–S7)
  { id: "overview", name: "Two-column overview", phpPartial: "partials/services/service-overview.php", reactComponent: "blocks/content/OverviewSection", status: "implemented", pageTypes: ["service-detail", "industry-detail", "technology-detail", "hire-detail"], dataAttributes: ["data-section-*-overview"] },
  { id: "capabilities", name: "Capabilities grid", phpPartial: "partials/services/service-capabilities.php", reactComponent: "blocks/content/CapabilitiesGrid", status: "implemented", pageTypes: ["service-detail", "industry-detail", "technology-detail", "hire-detail"] },
  { id: "process-steps", name: "Process steps", phpPartial: "partials/services/service-process.php", reactComponent: "blocks/content/ProcessSteps", status: "implemented", pageTypes: ["service-detail", "industry-detail", "technology-detail", "hire-detail", "about", "geo-detail", "case-study-detail"] },
  { id: "use-cases", name: "Use cases grid", phpPartial: "partials/services/service-use-cases.php", reactComponent: "blocks/content/UseCasesGrid", status: "implemented", pageTypes: ["service-detail", "industry-detail", "technology-detail", "hire-detail"] },
  { id: "tech-stack", name: "Tech stack section", phpPartial: "partials/services/service-tech-stack.php", reactComponent: "blocks/content/TechStackSection", status: "implemented", pageTypes: ["service-detail", "industry-detail", "technology-detail", "hire-detail", "about", "geo-detail", "case-study-detail"] },

  // FAQ & CTA
  { id: "faq", name: "FAQ accordion", phpPartial: "partials/faq/section.php", reactComponent: "blocks/faq/FaqSection", status: "implemented", pageTypes: ["home", "about", "services", "industries", "technologies", "portfolio", "contact", "geo", "process", "careers", "detail-pages"], dataAttributes: ["data-faq-section", "data-faq-item", "data-faq-trigger", "data-faq-panel"] },
  { id: "dark-cta", name: "Dark CTA band", phpPartial: "partials/services/service-cta.php", reactComponent: "blocks/cta/DarkCtaBand", status: "implemented", pageTypes: ["service-detail", "industry-detail", "technology-detail", "hire-detail", "geo-detail", "process-detail", "portfolio", "careers"] },
  { id: "contact-cta", name: "Contact CTA + form", phpPartial: "partials/contact/cta-section.php", reactComponent: "blocks/cta/ContactCtaSection", status: "implemented", pageTypes: ["home", "about", "services-index", "industries-index", "technologies-index"], dataAttributes: ["data-contact-cta-section", "data-contact-stat"] },
  { id: "team-cta", name: "3-step team CTA", phpPartial: "partials/cta/team-cta.php", reactComponent: "blocks/cta/TeamCtaSection", status: "implemented", pageTypes: ["home"], dataAttributes: ["data-cta-section", "data-cta-step", "data-cta-connector"] },

  // Grids & listings
  { id: "card-grid", name: "Card grid / listing", phpPartial: "partials/services/services.php", reactComponent: "blocks/content/CardGrid", status: "implemented", pageTypes: ["services-index", "hire-index", "case-studies-index", "geo-index"] },
  { id: "portfolio-filters", name: "Portfolio filters", phpPartial: "partials/portfolio/section-filters.php", reactComponent: "blocks/portfolio/PortfolioFilters", status: "implemented", pageTypes: ["portfolio"], dataAttributes: ["data-portfolio-section", "data-portfolio-el"] },
  { id: "portfolio-grid", name: "Portfolio grid", phpPartial: "partials/portfolio/section-grid.php", reactComponent: "blocks/portfolio/PortfolioGrid", status: "implemented", pageTypes: ["portfolio"], dataAttributes: ["data-portfolio-section", "data-portfolio-el"] },

  // Social proof
  { id: "review-strip", name: "Review platform strip", phpPartial: "partials/home/review-strip.php", reactComponent: "blocks/social/ReviewStrip", status: "implemented", pageTypes: ["home"] },
  { id: "reviews-masonry", name: "Video reviews", phpPartial: "partials/reviews/section.php", reactComponent: "blocks/social/ReviewsSection", status: "implemented", pageTypes: ["home"], dataAttributes: ["data-reviews-section", "data-review-card", "data-reviews-track", "data-review-modal"] },
  { id: "client-marquee", name: "Client logo marquee", phpPartial: "partials/clients/section.php", reactComponent: "blocks/social/ClientMarquee", status: "implemented", pageTypes: ["home"], dataAttributes: ["data-clients-section", "data-clients-row", "data-clients-track"] },
  { id: "metrics", name: "Metrics / outcomes strip", phpPartial: "partials/about/section-impact.php", reactComponent: "blocks/content/MetricsStrip", status: "implemented", pageTypes: ["about", "industries-index", "case-study-detail"] },

  // Case study blocks
  { id: "cs-challenge", name: "Case study challenge", phpPartial: "partials/case-study/cs-challenge.php", reactComponent: "blocks/case-study/ChallengeSection", status: "implemented", pageTypes: ["case-study-detail"], dataAttributes: ["data-cs-section"] },
  { id: "cs-goals", name: "Case study goals", phpPartial: "partials/case-study/cs-goals.php", reactComponent: "blocks/case-study/GoalsSection", status: "implemented", pageTypes: ["case-study-detail"] },
  { id: "cs-results", name: "Case study results", phpPartial: "partials/case-study/cs-results.php", reactComponent: "blocks/case-study/ResultsSection", status: "implemented", pageTypes: ["case-study-detail"] },
  { id: "cs-hero", name: "Case study hero", phpPartial: "partials/case-study/cs-hero.php", reactComponent: "blocks/heroes/DetailHero", status: "implemented", pageTypes: ["case-study-detail"] },
  { id: "cs-solution", name: "Case study solution", phpPartial: "partials/case-study/cs-solution.php", reactComponent: "blocks/content/OverviewSection", status: "implemented", pageTypes: ["case-study-detail"] },
  { id: "cs-stack", name: "Case study tech stack", phpPartial: "partials/case-study/cs-stack.php", reactComponent: "blocks/content/TechStackSection", status: "implemented", pageTypes: ["case-study-detail"] },
  { id: "cs-about", name: "Case study about client", phpPartial: "partials/case-study/cs-about.php", reactComponent: "blocks/content/OverviewSection", status: "implemented", pageTypes: ["case-study-detail"] },
  { id: "cs-features", name: "Case study features", phpPartial: "partials/case-study/cs-features.php", reactComponent: "blocks/content/CapabilitiesGrid", status: "implemented", pageTypes: ["case-study-detail"] },

  // Process / MVP page blocks
  { id: "process-fit", name: "Fit personas", phpPartial: "partials/process/section-fit-process.php", reactComponent: "blocks/process/FitSection", status: "implemented", pageTypes: ["process-detail"], dataAttributes: ["data-mvp-section", "data-mvp-persona"] },
  { id: "process-engagements", name: "Engagement model cards", phpPartial: "partials/process/section-engagements-process.php", reactComponent: "blocks/process/EngagementCards", status: "implemented", pageTypes: ["process-detail", "services-index", "geo-detail"], dataAttributes: ["data-mvp-section", "data-engagement-model"] },
  { id: "process-hero", name: "Process page hero", phpPartial: "partials/process/section-hero-process.php", reactComponent: "blocks/heroes/DetailHero", status: "implemented", pageTypes: ["process-detail"] },
  { id: "process-proof", name: "Process proof section", phpPartial: "partials/process/section-proof-process.php", reactComponent: "blocks/process/ProcessProofSection", status: "implemented", pageTypes: ["process-detail"] },
  { id: "process-why", name: "Process why section", phpPartial: "partials/process/section-why-process.php", reactComponent: "blocks/process/ProcessWhySection", status: "implemented", pageTypes: ["process-detail"] },
  { id: "process-service", name: "Process service steps", phpPartial: "partials/process/section-service-process.php", reactComponent: "blocks/content/ProcessSteps", status: "implemented", pageTypes: ["process-detail"] },
  { id: "process-cta", name: "Process CTA", phpPartial: "partials/process/section-cta-process.php", reactComponent: "blocks/cta/DarkCtaBand", status: "implemented", pageTypes: ["process-detail"] },

  // Geo blocks
  { id: "geo-services", name: "Geo services cards", phpPartial: "partials/geo/geo-services.php", reactComponent: "blocks/geo/GeoServices", status: "implemented", pageTypes: ["geo-detail"], dataAttributes: ["data-location-section-services", "data-location-key"] },
  { id: "geo-proof", name: "Geo proof / testimonials", phpPartial: "partials/geo/geo-proof.php", reactComponent: "blocks/geo/GeoProof", status: "implemented", pageTypes: ["geo-detail"], dataAttributes: ["data-location-section", "data-location-el"] },
  { id: "geo-hero", name: "Geo hero", phpPartial: "partials/geo/geo-hero.php", reactComponent: "blocks/heroes/DetailHero", status: "implemented", pageTypes: ["geo-detail"] },
  { id: "geo-about", name: "Geo about section", phpPartial: "partials/geo/geo-about.php", reactComponent: "blocks/content/OverviewSection", status: "implemented", pageTypes: ["geo-detail"] },
  { id: "geo-why", name: "Geo why section", phpPartial: "partials/geo/geo-why.php", reactComponent: "blocks/content/OverviewSection", status: "implemented", pageTypes: ["geo-detail"] },
  { id: "geo-cta", name: "Geo CTA", phpPartial: "partials/geo/geo-cta.php", reactComponent: "blocks/cta/DarkCtaBand", status: "implemented", pageTypes: ["geo-detail"] },

  // Careers
  { id: "careers-openings", name: "Job openings grid", phpPartial: "partials/careers/openings.php", reactComponent: "blocks/careers/OpeningsGrid", status: "implemented", pageTypes: ["careers"], dataAttributes: ["data-careers-section", "data-careers-el"] },
  { id: "careers-benefits", name: "Benefits grid", phpPartial: "partials/careers/benefits.php", reactComponent: "blocks/careers/BenefitsGrid", status: "implemented", pageTypes: ["careers"] },
  { id: "careers-hero", name: "Careers hero", phpPartial: "partials/careers/hero.php", reactComponent: "blocks/heroes/DetailHero", status: "implemented", pageTypes: ["careers"] },
  { id: "careers-why", name: "Why QalbIT", phpPartial: "partials/careers/why-qalbit.php", reactComponent: "blocks/content/OverviewSection", status: "implemented", pageTypes: ["careers"] },
  { id: "careers-final-cta", name: "Careers final CTA", phpPartial: "partials/careers/final-cta.php", reactComponent: "blocks/cta/DarkCtaBand", status: "implemented", pageTypes: ["careers"] },

  // About page sections (reuse content blocks)
  { id: "about-who", name: "About who we are", phpPartial: "partials/about/section-who.php", reactComponent: "blocks/content/OverviewSection", status: "implemented", pageTypes: ["about"] },
  { id: "about-whatwedo", name: "About what we do", phpPartial: "partials/about/section-whatwedo.php", reactComponent: "blocks/content/CapabilitiesGrid", status: "implemented", pageTypes: ["about"] },
  { id: "about-howwework", name: "About how we work", phpPartial: "partials/about/section-howwework.php", reactComponent: "blocks/content/ProcessSteps", status: "implemented", pageTypes: ["about"] },
  { id: "about-culture", name: "About culture", phpPartial: "partials/about/section-culture.php", reactComponent: "blocks/content/OverviewSection", status: "implemented", pageTypes: ["about"] },
  { id: "about-leader", name: "About leadership", phpPartial: "partials/about/section-leader.php", reactComponent: "blocks/content/OverviewSection", status: "implemented", pageTypes: ["about"] },
  { id: "about-trust", name: "About trust", phpPartial: "partials/about/section-trust.php", reactComponent: "blocks/social/ReviewStrip", status: "implemented", pageTypes: ["about"] },
  { id: "about-casestudy", name: "About case study teaser", phpPartial: "partials/about/section-casestudy.php", reactComponent: "blocks/content/CardGrid", status: "implemented", pageTypes: ["about"] },
  { id: "about-career", name: "About careers CTA", phpPartial: "partials/about/section-career.php", reactComponent: "blocks/cta/DarkCtaBand", status: "implemented", pageTypes: ["about"] },

  // Contact page sections
  { id: "contact-request", name: "Contact request section", phpPartial: "partials/contact/section-request.php", reactComponent: "blocks/heroes/ContactHero", status: "implemented", pageTypes: ["contact"] },
  { id: "contact-location", name: "Contact location", phpPartial: "partials/contact/section-location.php", reactComponent: "blocks/content/OverviewSection", status: "implemented", pageTypes: ["contact"] },
  { id: "contact-page-cta", name: "Contact page CTA", phpPartial: "partials/contact/section-cta.php", reactComponent: "blocks/cta/DarkCtaBand", status: "implemented", pageTypes: ["contact"] },

  // Home page sections
  { id: "home-process", name: "Home process strip", phpPartial: "partials/home/process.php", reactComponent: "blocks/content/ProcessSteps", status: "implemented", pageTypes: ["home"] },
  { id: "home-services", name: "Home services grid", phpPartial: "partials/services/section.php", reactComponent: "blocks/content/HomeServicesSection", status: "implemented", pageTypes: ["home"], dataAttributes: ["data-services-section", "data-service-card", "data-service-icon"] },
  { id: "home-industries", name: "Home industries horizontal strip", phpPartial: "partials/industries/section.php", reactComponent: "blocks/content/HomeIndustriesSection", status: "implemented", pageTypes: ["home"], dataAttributes: ["data-horizontal-industries", "data-horizontal-wrapper", "data-horizontal-track"] },
  { id: "home-process", name: "Home process stepper", phpPartial: "partials/home/process.php", reactComponent: "blocks/content/HomeProcessSection", status: "implemented", pageTypes: ["home"], dataAttributes: ["data-process-section", "data-process-tab", "data-process-panel", "data-process-progress", "data-process-bullet"] },
  { id: "home-case-studies", name: "Home case studies slider", phpPartial: "partials/case-study/section.php", reactComponent: "blocks/content/HomeCaseStudiesSection", status: "implemented", pageTypes: ["home"], dataAttributes: ["data-case-studies", "data-case-card", "data-case-progress", "data-case-image"] },
  { id: "home-technologies", name: "Home technologies grid", phpPartial: "partials/technologies/section.php", reactComponent: "blocks/content/HomeTechnologiesSection", status: "implemented", pageTypes: ["home"], dataAttributes: ["data-technologies-section", "data-tech-card", "data-tech-header"] },

  // Portfolio extras
  { id: "portfolio-hero", name: "Portfolio hero", phpPartial: "partials/portfolio/section-hero.php", reactComponent: "blocks/heroes/DetailHero", status: "implemented", pageTypes: ["portfolio"] },
  { id: "portfolio-featured", name: "Portfolio featured", phpPartial: "partials/portfolio/section-featured.php", reactComponent: "blocks/content/CardGrid", status: "implemented", pageTypes: ["portfolio"] },

  // Industries / technologies index variants
  { id: "industries-section", name: "Industries listing", phpPartial: "partials/industries/section.php", reactComponent: "blocks/content/CardGrid", status: "implemented", pageTypes: ["industries-index"] },
  { id: "technologies-section", name: "Technologies listing", phpPartial: "partials/technologies/section.php", reactComponent: "blocks/content/CardGrid", status: "implemented", pageTypes: ["technologies-index"] },

  // Legal & errors
  { id: "prose-legal", name: "Legal prose page", phpPartial: "pages/legal/*.php", reactComponent: "blocks/content/ProseSection", status: "implemented", pageTypes: ["legal"] },
  { id: "error-404", name: "404 page", phpPartial: "errors/404.php", reactComponent: "blocks/errors/NotFoundContent", status: "implemented", pageTypes: ["errors"] },

  // Blog
  { id: "blog-teaser", name: "Blog teaser", phpPartial: "partials/blog/teaser.php", reactComponent: "blog/BlogTeaser", status: "implemented", pageTypes: ["home"] },

  // Composite templates
  { id: "detail-entity-page", name: "Service/Industry/Tech/Hire detail", phpPartial: "pages/services/show.php", reactComponent: "blocks/layouts/DetailEntityPage", status: "implemented", pageTypes: ["service-detail", "industry-detail", "technology-detail", "hire-detail"] },
  { id: "case-study-page", name: "Case study detail composite", phpPartial: "partials/case-study/section.php", reactComponent: "blocks/layouts/CaseStudyPage", status: "implemented", pageTypes: ["case-study-detail"] },
  { id: "home-page", name: "Home page composite", phpPartial: "pages/home/index.php", reactComponent: "blocks/layouts/HomePage", status: "implemented", pageTypes: ["home"] },
  { id: "about-page", name: "About page composite", phpPartial: "pages/about/index.php", reactComponent: "blocks/layouts/AboutPage", status: "implemented", pageTypes: ["about"] },
  { id: "contact-page", name: "Contact page composite", phpPartial: "pages/contact/index.php", reactComponent: "blocks/layouts/ContactPage", status: "implemented", pageTypes: ["contact"] },
  { id: "portfolio-page", name: "Portfolio page composite", phpPartial: "pages/portfolio/index.php", reactComponent: "blocks/layouts/PortfolioPage", status: "implemented", pageTypes: ["portfolio"] },
  { id: "careers-page", name: "Careers page composite", phpPartial: "pages/careers/index.php", reactComponent: "blocks/layouts/CareersPage", status: "implemented", pageTypes: ["careers"] },
  { id: "services-index-page", name: "Services index composite", phpPartial: "pages/services/index.php", reactComponent: "blocks/layouts/ServicesIndexPage", status: "implemented", pageTypes: ["services-index"] },
  { id: "industries-index-page", name: "Industries index composite", phpPartial: "pages/industries/index.php", reactComponent: "blocks/layouts/IndustriesIndexPage", status: "implemented", pageTypes: ["industries-index"] },
  { id: "technologies-index-page", name: "Technologies index composite", phpPartial: "pages/technologies/index.php", reactComponent: "blocks/layouts/TechnologiesIndexPage", status: "implemented", pageTypes: ["technologies-index"] },
  { id: "hire-index-page", name: "Hire index composite", phpPartial: "pages/hire/index.php", reactComponent: "blocks/layouts/HireIndexPage", status: "implemented", pageTypes: ["hire-index"] },
  { id: "case-studies-index-page", name: "Case studies index composite", phpPartial: "pages/case-studies/index.php", reactComponent: "blocks/layouts/CaseStudiesIndexPage", status: "implemented", pageTypes: ["case-studies-index"] },
  { id: "process-detail-page", name: "Process detail composite", phpPartial: "pages/process/show.php", reactComponent: "blocks/layouts/ProcessDetailPage", status: "implemented", pageTypes: ["process-detail"] },
  { id: "geo-country-index-page", name: "Geo country index composite", phpPartial: "pages/geo/country.php", reactComponent: "blocks/layouts/GeoCountryIndexPage", status: "implemented", pageTypes: ["geo-index"] },
];

export function getBlocksByStatus(status: BlockRegistryEntry["status"]) {
  return BLOCK_REGISTRY.filter((b) => b.status === status);
}

export function getBlockById(id: string) {
  return BLOCK_REGISTRY.find((b) => b.id === id);
}

export function getRegistryCoverage() {
  const total = BLOCK_REGISTRY.length;
  const implemented = BLOCK_REGISTRY.filter((b) => b.status === "implemented").length;
  const partial = BLOCK_REGISTRY.filter((b) => b.status === "partial").length;
  const planned = BLOCK_REGISTRY.filter((b) => b.status === "planned").length;
  return { total, implemented, partial, planned };
}
