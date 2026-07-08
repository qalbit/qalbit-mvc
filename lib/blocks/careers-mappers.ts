import careersJson from "@/lib/data/careers.json";
import type { FaqItem } from "@/lib/data";
import {
  normalizeCareerApplyHref,
  type CareerRole,
} from "@/lib/careers-data";
import type {
  BenefitsGridProps,
  FaqBlockProps,
  JobOpening,
  OpeningsGridProps,
} from "./types";

type CareersData = typeof careersJson;
type CareerSections = CareersData["sections"];

const DEFAULT_WHY_POINTS = [
  {
    label: "Real product work, not just slices of a giant system",
    body: "You work on full features – from API to UI – for SaaS, marketplaces and internal tools, often talking directly with founders or product owners.",
  },
  {
    label: "Modern stacks with room to grow",
    body: "Laravel / PHP, Node / Nest, React / Next.js, Flutter, Tailwind and cloud-native deployments – with guidance on architecture and trade-offs.",
  },
  {
    label: "Strong fundamentals and mentoring",
    body: "We focus on clean code, Git discipline, reviews, debugging and communication. You ship, learn and improve with feedback – not just follow tickets.",
  },
  {
    label: "Ahmedabad-based team with global clients",
    body: "Most roles are Ahmedabad / hybrid, working with clients in Europe, the Middle East and beyond – giving you exposure to international product work.",
  },
];

const DEFAULT_BENEFIT_GROUPS = [
  {
    label: "Work you can be proud of",
    items: [
      "Real product and platform work (SaaS, booking systems, internal tools) used by customers in India, Europe and the Middle East.",
      "End-to-end exposure: APIs, DB design, frontend, deployment, debugging – not just a small slice of a huge legacy system.",
      "Small, focused teams where your decisions and suggestions are visible and appreciated.",
    ],
  },
  {
    label: "Learning & mentoring",
    items: [
      "Code reviews focused on fundamentals: clean code, readability, debugging and trade-offs – not just style nitpicks.",
      "Straightforward access to senior engineers and the founder for architecture, career and product discussions.",
      "Opportunities to work across stacks – Laravel / PHP, Node / Nest, React / Next.js, Flutter – based on your interests and project needs.",
    ],
  },
  {
    label: "Stability & way of working",
    items: [
      "Ahmedabad-based, product-focused studio with 11+ years of consulting and SaaS experience.",
      "Clear expectations, sprint planning and communication rituals – no random late-night “surprise” deadlines.",
      "Transparent discussions about roadmap, client expectations and how each project impacts the business.",
    ],
  },
];

const DEFAULT_LIFE_STORIES = [
  {
    label: "Day in the life of a developer",
    tag: "Engineering",
    points: [
      "Start your day with a short stand-up focused on blockers and priorities – not long status meetings.",
      "Deep-work blocks on actual product tasks: APIs, UI, refactors, debugging, tests.",
      "Regular check-ins with seniors or the founder when you are stuck or making an important decision.",
    ],
  },
  {
    label: "How we run code reviews",
    tag: "Quality & learning",
    points: [
      "Reviews focus on correctness, clarity and long-term maintainability – not just code style.",
      "We leave specific, actionable comments and examples instead of just saying “improve this”.",
      "You see how seniors think through edge cases, naming and trade-offs, so you grow faster.",
    ],
  },
  {
    label: "How we work with clients",
    tag: "Collaboration",
    points: [
      "Most projects are long-term relationships, not one-off gigs – so we care about stability.",
      "Clear requirements, documented decisions and sprint plans help avoid last-minute chaos.",
      "Developers join client calls when useful – to understand context, not to be blamed.",
    ],
  },
  {
    label: "Office, remote & timings",
    tag: "Environment",
    points: [
      "Ahmedabad-based office with a quiet, focused environment – no constant noise or distractions.",
      "Hybrid-friendly mindset – we optimise for getting work done and communicating clearly.",
      "Reasonable working hours with rare exceptions, discussed in advance when deadlines are tight.",
    ],
  },
];

export interface CareersHeroProps {
  id?: string;
  eyebrow?: string;
  title: string;
  subtitle?: string;
  badges: string[];
  primaryCta?: { label: string; href: string };
  secondaryCta?: { label: string; href: string };
  heroImage?: { src: string; alt: string };
}

export interface CareersWhyProps {
  id?: string;
  title: string;
  subtitle?: string;
  intro?: string;
  meta?: string;
  points: Array<{ label: string; body: string }>;
}

export interface CareersLifeProps {
  id?: string;
  title: string;
  subtitle?: string;
  intro?: string;
  stories: Array<{ label: string; tag?: string; points: string[] }>;
}

export interface CareersFinalCtaProps {
  id?: string;
  eyebrow?: string;
  title: string;
  body?: string;
  secondary?: { label: string; href: string; ariaLabel?: string };
  meta?: string;
}

function mapRoleToOpening(role: CareerRole, filters: CareersData["filters"]): JobOpening {
  const teams = filters.teams as Record<string, string>;
  const locations = filters.locations as Record<string, string>;
  const experience = filters.experience_levels as Record<string, string>;
  const employment = filters.employment_types as Record<string, string>;

  return {
    title: role.title,
    slug: role.slug,
    href: normalizeCareerApplyHref(role.apply_url, role.slug),
    team: teams[role.team] ?? role.team,
    location: locations[role.location] ?? role.mode ?? role.location,
    experience: experience[role.experience] ?? role.experience,
    employmentType: employment[role.employment_type] ?? role.employment_type,
    summary: role.summary,
    highlights: role.highlights,
  };
}

export function mapCareersHero(sections: CareerSections): CareersHeroProps {
  const hero = sections.hero;
  const page = careersJson.page;

  return {
    id: hero.id ?? "careers-hero",
    eyebrow: hero.eyebrow,
    title: hero.title ?? page.h1,
    subtitle: hero.subtitle ?? page.summary,
    badges: [
      "11+ years shipping software",
      "120+ projects",
      "Product-focused small team",
    ],
    primaryCta: hero.primary_cta,
    secondaryCta: hero.secondary_cta
      ? {
          ...hero.secondary_cta,
          href: normalizeCareerApplyHref(hero.secondary_cta.href),
        }
      : undefined,
    heroImage: {
      src: "/assets/images/careers/hero-illustration.avif",
      alt: "Developers collaborating on product UI at QalbIT",
    },
  };
}

export function mapCareersWhy(sections: CareerSections): CareersWhyProps {
  const why = sections.why as CareerSections["why"] & {
    subtitle?: string;
    meta?: string;
    points?: Array<{ label: string; body: string }>;
  };

  const points =
    why.points && why.points.length > 0 ? why.points : DEFAULT_WHY_POINTS;

  return {
    id: why.id,
    title: why.title,
    subtitle:
      why.subtitle ??
      "Small, product-focused teams, modern stacks and direct impact on real products – not endless ticket factories.",
    intro: why.intro,
    meta:
      why.meta ??
      "If you are looking for software developer jobs in Ahmedabad where you can actually shape products and talk to real users, QalbIT is built for that.",
    points: points.length > 0 ? points : DEFAULT_WHY_POINTS,
  };
}

export function mapCareersOpenings(data: CareersData): OpeningsGridProps {
  const sections = data.sections;
  const openSection = sections.open_positions;

  const openRoles = Object.values(data.roles as Record<string, CareerRole>).filter(
    (r) => r.is_open,
  );

  const evergreen = (data.evergreen_roles ?? []).map((r) => ({
    title: r.label,
    href: normalizeCareerApplyHref(r.href),
    summary: r.description,
  })) as JobOpening[];

  return {
    id: "careers-openings",
    title: openSection.title,
    subtitle: openSection.intro,
    roles: openRoles.map((r) => mapRoleToOpening(r, data.filters)),
    evergreenRoles: evergreen,
    totalCount: openRoles.length,
  };
}

export function mapCareersBenefits(sections: CareerSections): BenefitsGridProps {
  const benefits = sections.benefits as CareerSections["benefits"] & {
    subtitle?: string;
    meta?: string;
    groups?: Array<{ label: string; items: string[] }>;
  };

  const groups =
    benefits.groups && benefits.groups.length > 0
      ? benefits.groups
      : benefits.work_style && benefits.benefits_list
        ? [
            { label: "How we work", items: benefits.work_style },
            { label: "Benefits", items: benefits.benefits_list },
          ]
        : DEFAULT_BENEFIT_GROUPS;

  return {
    id: benefits.id,
    title: benefits.title,
    subtitle:
      benefits.subtitle ??
      "We keep benefits simple: a stable environment, real product work, and enough structure for you to grow – not just ship tickets.",
    intro:
      benefits.intro ??
      "Most candidates ask us the same three questions: What kind of work will I be doing day to day? Who will I learn from? And how stable is the environment? This section focuses on those answers, not just generic perks.",
    groups,
    meta:
      benefits.meta ??
      "If you are searching for software developer jobs in Ahmedabad where you can grow across backend, frontend and product thinking – this is the environment we are building.",
  };
}

export function mapCareersLife(sections: CareerSections): CareersLifeProps {
  const life = sections.life as CareerSections["life"] & {
    subtitle?: string;
    stories?: Array<{ label: string; tag?: string; points: string[] }>;
  };

  const stories =
    life.stories && life.stories.length > 0 ? life.stories : DEFAULT_LIFE_STORIES;

  return {
    id: life.id,
    title: life.title,
    subtitle:
      life.subtitle ?? "A compact team, real products and a calm environment to do your best work.",
    intro:
      life.intro ??
      "Instead of “fun at work” buzzwords, here is a simple look at what your week actually feels like when you join QalbIT – the kind of projects, communication and ownership you can expect.",
    stories,
  };
}

export function mapCareersFaq(page: CareersData["page"], faqs: FaqItem[]): FaqBlockProps | null {
  if (!faqs.length) return null;

  return {
    id: "careers-faqs",
    title: page.faq_title ?? "Frequently asked questions about careers at QalbIT",
    subtitle: page.faq_subtitle,
    bullets: page.faq_bullets,
    faqs,
  };
}

export function mapCareersFinalCta(sections: CareerSections): CareersFinalCtaProps {
  const cta = sections.cta;

  const secondaryHref = cta.secondary_url
    ? normalizeCareerApplyHref(cta.secondary_url)
  : "/career/apply/";

  return {
    id: cta.id,
    eyebrow: cta.eyebrow,
    title: cta.title,
    body: cta.body,
    secondary: {
      label: cta.secondary_label ?? "Share your profile",
      href: secondaryHref,
      ariaLabel: "Share your profile with QalbIT for future roles",
    },
    meta: cta.meta,
  };
}
