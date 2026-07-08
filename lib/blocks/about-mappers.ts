import aboutJson from "@/lib/data/about.json";
import clientsJson from "@/lib/data/clients.json";
import type { FaqItem } from "@/lib/data";
import type { Client } from "@/lib/data/types";
import { asset } from "@/lib/site";
import type {
  AboutCareerSectionProps,
  AboutCaseStudiesSectionProps,
  AboutClientsSectionProps,
  AboutCultureSectionProps,
  AboutHeroProps,
  AboutHowWeWorkSectionProps,
  AboutImpactSectionProps,
  AboutLeaderSectionProps,
  AboutTechStackSectionProps,
  AboutTrustSectionProps,
  AboutWhatWeDoSectionProps,
  AboutWhoSectionProps,
  ContactCtaSectionProps,
  FaqBlockProps,
} from "./types";

const clientsRecord = clientsJson as Record<string, Client & { industry?: string }>;

function resolveClientLogos(clientIds: string[], limit: number) {
  return clientIds
    .map((id) => clientsRecord[id])
    .filter((client) => client && client.enabled !== false)
    .slice(0, limit)
    .map((client) => ({
      logo: client.logo.startsWith("/") ? client.logo : `/${client.logo}`,
      alt: client.alt ?? client.name,
      url: client.url,
      industry: client.industry,
    }));
}

export function mapAboutHero(): AboutHeroProps {
  const hero = aboutJson.hero;
  return {
    eyebrow: hero.eyebrow,
    title: hero.title,
    intro: hero.intro,
    bullets: hero.bullets,
    primaryCta: hero.primaryCta,
    secondaryCta: hero.secondaryCta,
    snapshotTitle: hero.snapshot.title,
    snapshot: hero.snapshot.items,
  };
}

export function mapAboutWho(): AboutWhoSectionProps {
  const who = aboutJson.who;
  return {
    id: who.id,
    headingId: who.headingId,
    eyebrow: who.eyebrow,
    title: who.title,
    intro: who.intro,
    cards: who.cards,
    snapshot: who.snapshot,
  };
}

export function mapAboutWhatWeDo(): AboutWhatWeDoSectionProps {
  const section = aboutJson.whatwedo;
  return {
    id: section.id,
    headingId: section.headingId,
    eyebrow: section.eyebrow,
    title: section.title,
    intro: section.intro,
    items: section.items,
  };
}

export function mapAboutImpact(): AboutImpactSectionProps {
  const impact = aboutJson.impact;
  return {
    id: impact.id,
    headingId: impact.headingId,
    eyebrow: impact.eyebrow,
    title: impact.title,
    intro: impact.intro,
    metrics: impact.metrics,
    footnote: impact.footnote,
  };
}

export function mapAboutClients(): AboutClientsSectionProps {
  const section = aboutJson.clients;
  return {
    id: section.id,
    headingId: section.headingId,
    eyebrow: section.eyebrow,
    title: section.title,
    intro: section.intro,
    logosLabel: section.logos.label,
    logos: resolveClientLogos(section.logos.clientIds, section.logos.limit ?? 10),
    logosFootnote: section.logos.footnote,
    industriesLabel: section.industries.label,
    industries: section.industries.items,
    industriesFootnote: section.industries.footnote,
  };
}

export function mapAboutLeader(): AboutLeaderSectionProps {
  const leader = aboutJson.leader;
  return {
    id: leader.id,
    headingId: leader.headingId,
    eyebrow: leader.eyebrow,
    title: leader.title,
    intro: leader.intro,
    founder: {
      ...leader.founder,
      image: leader.founder.image,
    },
    howWeLead: leader.howWeLead,
  };
}

export function mapAboutCulture(): AboutCultureSectionProps {
  const culture = aboutJson.culture;
  return {
    id: culture.id,
    headingId: culture.headingId,
    eyebrow: culture.eyebrow,
    title: culture.title,
    intro: culture.intro,
    dayToDay: culture.dayToDay,
    values: culture.values,
  };
}

export function mapAboutHowWeWork(): AboutHowWeWorkSectionProps {
  const section = aboutJson.howwework;
  return {
    id: section.id,
    headingId: section.headingId,
    eyebrow: section.eyebrow,
    title: section.title,
    intro: section.intro,
    steps: section.steps,
    reassurance: section.reassurance,
    cta: section.cta,
  };
}

export function mapAboutCaseStudies(): AboutCaseStudiesSectionProps {
  const section = aboutJson.casestudy;
  return {
    id: section.id,
    headingId: section.headingId,
    eyebrow: section.eyebrow,
    title: section.title,
    intro: section.intro,
    items: section.items,
    footnote: section.footnote,
  };
}

export function mapAboutTechStack(): AboutTechStackSectionProps {
  const section = aboutJson.techstack;
  return {
    id: section.id,
    headingId: section.headingId,
    eyebrow: section.eyebrow,
    title: section.title,
    intro: section.intro,
    stack: section.stack,
    practices: section.practices,
  };
}

export function mapAboutTrust(): AboutTrustSectionProps {
  const trust = aboutJson.trust;
  return {
    id: trust.id,
    headingId: trust.headingId,
    eyebrow: trust.eyebrow,
    title: trust.title,
    intro: trust.intro,
    items: trust.items,
  };
}

export function mapAboutCareer(): AboutCareerSectionProps {
  const career = aboutJson.career;
  return {
    id: career.id,
    headingId: career.headingId,
    eyebrow: career.eyebrow,
    title: career.title,
    intro: career.intro,
    team: career.team,
    cta: career.cta,
  };
}

export function mapAboutFaq(faqs: FaqItem[]): FaqBlockProps | null {
  if (!faqs.length) return null;

  return {
    id: "about-faqs",
    title: "Frequently asked questions about working with QalbIT",
    subtitle:
      "Straightforward answers for SaaS founders and teams evaluating QalbIT as their product engineering partner.",
    bullets: [
      "✓ Covers custom software development, SaaS platforms, mobile apps and integrations.",
      "✓ Answers about pricing, engagement models, NDAs, IP ownership and quality assurance.",
      "✓ Written for founders, CTOs and product teams hiring a remote development partner.",
    ],
    faqs,
  };
}

export function mapAboutContactCta(): ContactCtaSectionProps {
  return {
    id: "section-contact-cta",
    eyebrow: "Contact Us",
    title: "Contact Us",
    subtitle: "for project discussion",
    primaryCta: { label: "Get a project estimate", href: "/contact-us/" },
    body:
      "Once you submit the form, one of our dedicated sales representatives will reach out to you within 24 hours. They are eager to discuss your needs and explore how we can assist you further.",
    leadFrom: "lead_about_page",
    redirectTo: "/about-us/#section-contact-cta",
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
