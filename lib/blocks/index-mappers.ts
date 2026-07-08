import type { ConfigEntity, FaqItem } from "@/lib/data";
import {
  caseStudies,
  hireRoles,
  industries,
  technologies,
} from "@/lib/data";
import type {
  CardGridBlockProps,
  ContactCtaSectionProps,
  FaqBlockProps,
  IndexHeroProps,
} from "./types";

function entityHref(slug: string): string {
  const normalized = slug.startsWith("/") ? slug : `/${slug}`;
  return normalized.endsWith("/") ? normalized : `${normalized}/`;
}

function mapEntitiesToCardGrid(
  entities: ConfigEntity[],
  config: {
    id: string;
    eyebrow?: string;
    title: string;
    subtitle?: string;
    columns?: 2 | 3;
    metaLabel?: string;
  },
): CardGridBlockProps {
  return {
    id: config.id,
    eyebrow: config.eyebrow,
    title: config.title,
    subtitle: config.subtitle,
    columns: config.columns ?? 3,
    items: entities.map((entity) => ({
      title: entity.name,
      description: entity.short_description,
      href: entityHref(entity.slug),
      meta: config.metaLabel,
    })),
    dataSection: config.id,
  };
}

export function mapServicesFaq(faqs: FaqItem[]): FaqBlockProps | null {
  if (!faqs.length) return null;
  return {
    id: "services-faqs",
    title: "Frequently asked questions about software development with QalbIT",
    subtitle:
      "These are some of the questions we usually answer on early calls for custom software, SaaS and product development.",
    faqs,
  };
}

export function mapServicesContactCta(): ContactCtaSectionProps {
  return {
    leadFrom: "lead_service_page",
    eyebrow: "Contact Us",
    title: "Contact Us",
    subtitle: "for project discussion",
    primaryCta: { label: "Get a project estimate", href: "/contact-us/" },
    body: "Once you submit the form, one of our dedicated sales representatives will reach out to you within 24 hours.",
  };
}

export function mapIndustriesIndexHero(): IndexHeroProps {
  return {
    breadcrumbs: [{ label: "Home", href: "/" }, { label: "Industries" }],
    kickerPrefix: "Industries",
    kickerDetail: "Home services, SaaS, travel, fintech, healthcare & more",
    title:
      "Industry-specific software for <span class=\"text-gradient-brand-animated\">modern web, mobile & SaaS products</span>.",
    intro:
      "We build custom software, mobile apps and SaaS platforms tailored to the workflows, compliance needs and growth goals of your industry.",
    primaryCta: { label: "Discuss your industry use case", href: "/contact-us/" },
    dataSection: "industries-index-hero",
    sectionWrapperData: { "data-section-industries": "" },
  };
}

export function mapIndustriesIndexGrid(): CardGridBlockProps {
  const grid = mapEntitiesToCardGrid(industries, {
    id: "industry-categories",
    title: "Explore industries we build software for",
    subtitle:
      "Each industry page goes deeper into typical challenges, solution patterns and QalbIT’s approach to web, mobile and SaaS products in that space.",
    columns: 3,
    metaLabel: "View industry page →",
  });
  return {
    ...grid,
    dataAnimate: "industries-grid",
    cardDataAttr: "data-industry-card",
    cardsWrapperAttr: "data-industry-cards",
  };
}

export function mapIndustriesFaq(faqs: FaqItem[]): FaqBlockProps | null {
  if (!faqs.length) return null;
  return {
    id: "industries-faqs",
    title: "Frequently asked questions about industry-specific software with QalbIT",
    faqs,
  };
}

export function mapTechnologiesIndexHero(): IndexHeroProps {
  return {
    breadcrumbs: [{ label: "Home", href: "/" }, { label: "Technologies" }],
    kickerPrefix: "Technologies",
    kickerDetail: "React, Node.js, Laravel, Flutter & more",
    title:
      "Technologies we use to build <span class=\"text-gradient-brand-animated\">reliable web, mobile & SaaS products</span>.",
    intro:
      "Explore the core technologies QalbIT uses to build web, mobile and SaaS products – from Laravel and Node.js backends to React, Next.js and Flutter frontends.",
    primaryCta: { label: "Discuss your tech stack", href: "/contact-us/" },
    dataSection: "technologies-index-hero",
    sectionWrapperData: { "data-section-technologies": "" },
  };
}

export function mapTechnologiesIndexGrid(): CardGridBlockProps {
  return mapEntitiesToCardGrid(technologies, {
    id: "technologies-grid",
    eyebrow: "Technologies",
    title: "Technologies we build and support",
    columns: 3,
    metaLabel: "View technology page →",
  });
}

export function mapTechnologiesFaq(faqs: FaqItem[]): FaqBlockProps | null {
  if (!faqs.length) return null;
  return {
    id: "technologies-faqs",
    title: "Frequently asked questions about our technology expertise",
    faqs,
  };
}

export function mapHireIndexPage(): CardGridBlockProps {
  return mapEntitiesToCardGrid(hireRoles, {
    id: "hire-developers-grid",
    eyebrow: "Hire Developers",
    title: "Hire Dedicated Developers from QalbIT",
    subtitle:
      "Extend your team with dedicated backend and full-stack engineers who understand product, delivery and long-term maintainability. Start with a single developer or a small focused team.",
    columns: 2,
    metaLabel: "View profile →",
  });
}

export function mapCaseStudiesIndexPage(): CardGridBlockProps {
  return {
    id: "case-studies-grid",
    eyebrow: "Case Studies",
    title: "Selected Projects & Case Studies",
    subtitle:
      "A sample of projects delivered by QalbIT across SaaS, custom software and digital products. These snapshots show how we think about architecture, delivery and long-term maintainability.",
    columns: 3,
    items: caseStudies.map((cs) => ({
      title: cs.name,
      description: cs.short_description,
      href: entityHref(cs.slug),
      meta: "View case study →",
    })),
    dataSection: "case-studies-index",
  };
}

export function mapIndexContactCta(leadFrom: string): ContactCtaSectionProps {
  return {
    leadFrom,
    eyebrow: "Contact Us",
    title: "Contact Us",
    subtitle: "for project discussion",
    primaryCta: { label: "Get a project estimate", href: "/contact-us/" },
    body: "Once you submit the form, one of our dedicated sales representatives will reach out to you within 24 hours.",
  };
}
