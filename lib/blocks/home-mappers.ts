import type { ConfigEntity, FaqItem, Review } from "@/lib/data";
import {
  clients,
  getFeaturedCaseStudies,
  getFeaturedReviews,
  getHomeServices,
  getHomeTechnologies,
  industries,
} from "@/lib/data";
import { asset } from "@/lib/site";
import type {
  ClientMarqueeProps,
  ContactCtaSectionProps,
  FaqBlockProps,
  HomeCaseStudiesBlockProps,
  HomeHeroProps,
  HomeIndustriesBlockProps,
  HomeProcessBlockProps,
  HomeServicesBlockProps,
  HomeTechnologiesBlockProps,
  ReviewStripProps,
  ReviewsSectionProps,
  TeamCtaSectionProps,
} from "./types";
import type { ConfigEntity } from "@/lib/data/types";

function entityHref(slug: string): string {
  const normalized = slug.startsWith("/") ? slug : `/${slug}`;
  return normalized.endsWith("/") ? normalized : `${normalized}/`;
}

function technologyBulletLines(tech: ConfigEntity & { use_cases?: unknown; benefits?: unknown }): string[] {
  const lines: string[] = [];
  const useCases = tech.use_cases;

  if (Array.isArray(useCases)) {
    lines.push(...useCases.slice(0, 2));
  } else if (useCases && typeof useCases === "object" && "items" in useCases) {
    const items = (useCases as { items?: Array<{ label?: string; description?: string }> }).items ?? [];
    lines.push(...items.slice(0, 2).map((item) => item.label ?? item.description ?? "").filter(Boolean));
  }

  const benefits = tech.benefits;
  if (Array.isArray(benefits)) {
    lines.push(...benefits.slice(0, 1));
  }

  return lines.slice(0, 3);
}

export function mapHomeHero(): HomeHeroProps {
  return {
    pill: "Trusted By 50+ Clients",
    title:
      "Drive Success with <span class='text-gradient-brand-animated'>Custom Software Development</span>.",
    description:
      "Collaborate with expert developers who build scalable, high-performing custom software — tailored to your goals and built to grow with your business.",
    imageSrc: asset("images/hero/custom-software-development.svg"),
    primaryCta: { label: "Get Your Free Estimate Now", href: "/contact-us/" },
    secondaryCta: {
      label: "Schedule a Quick Call",
      href: "https://calendly.com/abidhusain-qalbit/discuss-project",
      external: true,
    },
  };
}

export function mapHomeReviewStrip(): ReviewStripProps {
  return {
    title: "Reviewed & trusted by teams on leading platforms",
    items: [
      {
        name: "Clutch",
        platformLabel: "Reviewed on",
        rating: "5.0 rating · 7 client reviews",
        href: "https://clutch.co/profile/qalbit-infotech#highlights",
        logoSrc: asset("images/reviews/clutch-logo.svg"),
        logoAlt: "Clutch reviews for QalbIT",
      },
      {
        name: "Google",
        platformLabel: "Rated on",
        rating: "4.9 rating · 18 reviews",
        href: "https://www.google.com/search?q=qalbit+infotech#lrd=0x395e9b4dcb551825:0xd2ca8b0aa98f5d41,1",
        logoSrc: asset("images/reviews/google-logo.svg"),
        logoAlt: "Google reviews for QalbIT",
      },
      {
        name: "Upwork",
        platformLabel: "Top-rated on",
        rating: "100+ reviews · 5K+ hours worked",
        href: "https://www.upwork.com/ag/qalbit/",
        logoSrc: asset("images/reviews/upwork-logo.svg"),
        logoAlt: "Upwork reviews for QalbIT",
      },
      {
        name: "TopTracker",
        platformLabel: "Verified hours on",
        rating: "7K+ hours tracked with clients",
        logoSrc: asset("images/reviews/toptracker-logo.svg"),
        logoAlt: "TopTracker hours worked with QalbIT",
      },
    ],
  };
}

export function mapHomeServices(): HomeServicesBlockProps {
  const items = getHomeServices();

  return {
    title: "Custom Software Development services that power real-world growth.",
    subtitle:
      "Partner with our dedicated team of software professionals, mastering 100+ technologies to build scalable solutions that grow with your business.",
    items: items.map((s) => ({
      name: s.name,
      short_description: s.short_description,
      slug: s.slug,
      href: entityHref(s.slug),
      icon: s.icon,
      iconAlt: s.iconAlt,
    })),
  };
}

export function mapHomeIndustries(): HomeIndustriesBlockProps {
  return {
    title: "Tailored software solutions built for your industry's success.",
    subtitle:
      "QalbIT builds custom software, mobile apps and cloud platforms for e-commerce, entertainment, fintech, travel, food delivery, sports, healthcare, education, real estate, social networking and business operations.",
    items: industries.map((ind) => ({
      name: ind.name,
      summary: ind.summary,
      slug: ind.slug,
      href: entityHref(ind.slug),
      icon: ind.icon,
    })),
  };
}

export function mapHomeProcess(): HomeProcessBlockProps {
  return {
    eyebrow: "How we build your product",
    title: "Our Proven Process for Seamless Custom Product Development.",
    seoTagline: "Our precise processes for enabling custom web development",
    intro:
      "We combine discovery, product strategy, development, and engagement models into a repeatable process – so you always know what happens next, from MVP to long-term scale.",
    steps: [
      {
        tabId: "process-tab-mvp",
        panelId: "process-panel-mvp",
        tabLabel: "Minimal Viable Product",
        panelTitle: "From idea to MVP that's ready for business fit review.",
        panelDescription:
          "Our team will take the ideation, dissect it, and reunite it into an MVP ready for business fit review and enable product features.",
        ctaHref: "/start-up-mvp/",
        ctaLabel: "View Startup MVP",
        ctaAriaLabel: "View Startup MVP process",
        bullets: [
          "Tell us about your idea",
          "Discovery workshops",
          "User experience and user interface design",
          "Web development",
          "Client inputs and feedback",
          "Application introduction and launch",
        ],
      },
      {
        tabId: "process-tab-scaling",
        panelId: "process-panel-scaling",
        tabLabel: "Product Scaling Team",
        panelTitle: "Scale your product with a dedicated, high-performing team.",
        panelDescription:
          "We offer product development services and enable product management by scaling your teams with the best web development practices.",
        ctaHref: "/product-scaling/",
        ctaLabel: "View Product Scaling",
        ctaAriaLabel: "View Product Scaling",
        bullets: [
          "Gathering requirements",
          "Discovery workshops",
          "Pair programming",
          "Personality check",
          "Final interview",
        ],
      },
      {
        tabId: "process-tab-digital",
        panelId: "process-panel-digital",
        tabLabel: "Digital Transformation",
        panelTitle: "Digital transformation and long-term product sustenance.",
        panelDescription:
          "We provide software development services clubbed with digital transformation solutions and product sustenance.",
        ctaHref: "/digital-transformation/",
        ctaLabel: "View Digital Transformation",
        ctaAriaLabel: "View Digital Transformation",
        bullets: [
          "Ideation towards digital transformation",
          "Product strategy and design workshop",
          "User experience and user interface design",
          "Proof of concept development",
          "Client input and stakeholder feedback",
          "Application introduction and launch",
          "Integration and maintenance",
        ],
      },
      {
        tabId: "process-tab-engagement",
        panelId: "process-panel-engagement",
        tabLabel: "Engagement Model",
        panelTitle: "Engagement models that fit your budget and risk profile.",
        panelDescription:
          "Our engagement model inspires clients for a long-lasting relationship and facilitate fixed cost, time & material or hire dedicated resources model.",
        ctaHref: "/engagement-model/",
        ctaLabel: "View Engagement Model",
        ctaAriaLabel: "View Engagement Model",
        bullets: ["Fixed Cost Model", "Time & Material Model", "Hire Dedicated Model", "Hybrid Model"],
      },
    ],
  };
}

export function mapHomeCaseStudies(): HomeCaseStudiesBlockProps {
  const items = getFeaturedCaseStudies();

  return {
    title: "Real products, shipped with QalbIT.",
    subtitle:
      "Explore how we've helped startups and businesses launch reminder apps, club management systems, shooting analytics tools, and hiring platforms with robust UI/UX, web, and mobile development.",
    items: items.map((cs) => ({
      slug: cs.slug,
      name: cs.name,
      summary: cs.summary ?? cs.short_description,
      href: entityHref(cs.slug),
      logo: cs.logo,
      logoAlt: cs.logoAlt,
      banner: cs.banner,
      bannerAlt: cs.bannerAlt,
      tech_stack: cs.tech_stack,
    })),
  };
}

export function mapHomeReviews(reviews: Review[]): ReviewsSectionProps {
  return {
    id: "home-reviews",
    eyebrow: "Our clients · Reviews",
    title: "Teams who trusted QalbIT",
    subtitle:
      "Short feedback from clients and products we work on across web, mobile, SaaS and internal tools.",
    reviews: reviews.map((r) => {
      const extended = r as Review & {
        author_name?: string;
        author_role?: string;
        company?: string;
        company_url?: string;
        industry?: string;
        rating?: number;
        type?: string;
        video_url?: string;
      };

      return {
        quote: r.quote,
        name: extended.author_name ?? r.author,
        role: extended.author_role,
        company: extended.company,
        companyUrl: extended.company_url,
        industry: extended.industry,
        rating: extended.rating,
        type: extended.type,
        videoUrl: extended.video_url ?? r.video_url,
      };
    }),
  };
}

export function mapHomeTechnologies(): HomeTechnologiesBlockProps {
  const items = getHomeTechnologies();

  return {
    title: "Technologies we build and support",
    subtitle:
      "From Laravel and Node.js backends to React.js, Next.js and Flutter frontends, we help teams build and support reliable web, mobile and SaaS products.",
    items: items.map((t) => {
      const tech = t as ConfigEntity & { short_name?: string; tagline?: string };
      return {
        slug: t.slug,
        name: t.name,
        short_name: tech.short_name,
        tagline: tech.tagline,
        summary: t.summary,
        href: entityHref(t.slug),
        icon: t.icon,
        bulletLines: technologyBulletLines(tech),
      };
    }),
  };
}

export function mapHomeClients(): ClientMarqueeProps {
  return {
    id: "home-clients",
    eyebrow: "Our clients · Global footprint",
    title: "Trusted by ambitious startups and global teams",
    subtitle:
      "A few of the SaaS products, marketplaces, agencies and enterprises that rely on QalbIT for web, mobile and platform development.",
    clients: clients.map((c) => ({
      name: c.name,
      logo: c.logo,
      alt: c.alt ?? c.name,
      href: c.url ?? undefined,
    })),
  };
}

export function mapHomeTeamCta(): TeamCtaSectionProps {
  return {
    id: "home-cta",
    eyebrow: "Assemble your team",
    title: "Build your custom software team in three simple steps",
    subtitle:
      "A short, predictable process to go from idea or backlog to a dedicated QalbIT team working on your product.",
    bullets: [
      "Custom software development, SaaS platforms and mobile apps.",
      "Dedicated engineering pods for product companies, agencies and enterprises.",
      "Clear milestones, transparent pricing and ongoing delivery reporting.",
    ],
    primaryCta: {
      label: "Schedule a discovery call",
      href: "/contact-us/",
      ariaLabel: "Schedule a discovery call to discuss your custom software project",
    },
    secondaryCta: {
      label: "Or email your requirements",
      href: "mailto:sales@qalbit.com?subject=Project%20enquiry%20via%20website",
    },
    steps: [
      {
        step: 1,
        iconSrc: asset("images/icons/step-call.svg"),
        iconAlt: "Discovery call icon",
        title: "Share your product and hiring needs.",
        body: "Join a short discovery call to walk us through your product, tech stack, timelines, budget and required skills.",
        bullets: [
          "Clarify scope for web, mobile or SaaS.",
          "Align on success metrics and constraints.",
          "Decide if you need a full team or extra capacity.",
        ],
      },
      {
        step: 2,
        iconSrc: asset("images/icons/step-team.svg"),
        iconAlt: "Icon of software development team structure",
        title: "Finalise solution, engagement model and team.",
        body: "Within a few days we propose architecture options, team composition and an engagement model that fits your roadmap.",
        bullets: [
          "Choose between fixed-scope or dedicated team.",
          "Lock in seniority mix and availability.",
          "Agree on milestones, reporting and tools.",
        ],
      },
      {
        step: 3,
        iconSrc: asset("images/icons/step-started.svg"),
        iconAlt: "Icon of project kickoff and delivery tracking",
        title: "Kick off delivery and track progress in sprints.",
        body: "We start with an agreed kickoff date, ship the first sprint quickly and keep you updated with demos, metrics and burn-down.",
        bullets: [
          "Regular demos, stand-ups and status reports.",
          "Transparent velocity and change management.",
          "Option to scale the team up or down as you grow.",
        ],
      },
    ],
  };
}

export function mapHomeFaq(faqs: FaqItem[]): FaqBlockProps | null {
  if (!faqs.length) return null;

  return {
    id: "home-faqs",
    title: "Frequently asked questions about working with QalbIT",
    subtitle:
      "Short, practical answers to common questions about custom software development, timelines, costs, quality, IP ownership and security.",
    faqs,
  };
}

export function mapHomeContactCta(): ContactCtaSectionProps {
  return {
    id: "section-contact-cta",
    eyebrow: "Contact Us",
    title: "Contact Us",
    subtitle: "for project discussion",
    primaryCta: { label: "Get a project estimate", href: "/contact-us/" },
    body:
      "Once you submit the form, one of our dedicated sales representatives will reach out to you within 24 hours. They are eager to discuss your needs and explore how we can assist you further.",
    leadFrom: "lead_home_page",
    redirectTo: "/#section-contact-cta",
    stats: [
      {
        value: "11+",
        label: "Years of Experience",
        iconSrc: asset("images/icons/experience.svg"),
        iconAlt: "11+ Years of Experience",
      },
      {
        value: "90+",
        label: "Satisfied Customers",
        iconSrc: asset("images/icons/satisfied-customers.svg"),
        iconAlt: "90+ Satisfied Customers",
      },
      {
        value: "120+",
        label: "Project Delivered",
        iconSrc: asset("images/icons/project-delivered.svg"),
        iconAlt: "120+ Project Delivered",
      },
      {
        value: "100%",
        label: "Job Success Store",
        iconSrc: asset("images/icons/job-success-score.svg"),
        iconAlt: "100% Job Success Store",
      },
    ],
  };
}
