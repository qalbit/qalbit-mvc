import type { FaqItem } from "@/lib/data";
import type {
  ContactFinalCtaSectionProps,
  ContactHeroProps,
  ContactLocationsSectionProps,
  ContactRequestsSectionProps,
  FaqBlockProps,
} from "./types";

export function mapContactHero(): ContactHeroProps {
  return {
    eyebrow: "Let's build your next software release",
    title:
      "Discuss your SaaS or custom software project with <span class=\"text-gradient-brand-animated\">QalbIT</span>",
    intro:
      "Share a bit about your product, and we will come back with the right mix of strategy, architecture and engineering support to move it forward.",
    needsTitle: "Typical requests we handle",
    needs: [
      "Design and build a new SaaS or web platform from scratch.",
      "Modernise an existing web or mobile app without breaking production.",
      "Set up a dedicated product engineering team that feels in-house.",
      "Integrate third-party APIs, automate workflows or refactor legacy code.",
    ],
    needsNote:
      "Not sure where to start? Send whatever you have – links, rough notes, screenshots or a deck.",
    trust: {
      title: "Trusted engineering partner",
      rating: "5.0",
      ratingNote: "On Clutch, Google & Upwork",
      regionNote: "Trusted by teams in India, the UK, Europe and the Middle East.",
      replyNote: "24 business hours",
      email: "sales@qalbit.com",
    },
    exploreLinks: [
      { label: "Explore our services", href: "/services/" },
      { label: "View case studies", href: "/portfolio/" },
      { label: "About QalbIT", href: "/about-us/" },
    ],
    formTitle: "Tell us about your project",
    formIntro:
      "Share a few details and we will follow up with questions, ballpark estimates or the next best step.",
    leadFrom: "lead_contact_page",
    redirectTo: "/contact-us/thank-you/",
  };
}

export function mapContactRequests(): ContactRequestsSectionProps {
  return {
    title: "How we can help your product and engineering roadmap",
    intro:
      "Whether you are validating an MVP, scaling a SaaS platform or untangling legacy systems, QalbIT can step in as your <span class=\"font-medium text-slate-100\">long-term product engineering partner</span>. Tell us what you are trying to achieve and we will suggest the right engagement model.",
    cards: [
      {
        title: "Build a new SaaS or web product",
        description:
          "End-to-end product design, architecture and development for B2B/B2C SaaS, internal tools and customer-facing platforms.",
        footnote: "Common stacks: Laravel, Node.js, React, Next.js, Flutter. View our",
        footnoteLink: { label: "development services", href: "/services/" },
      },
      {
        title: "Modernise an existing web or mobile app",
        description:
          "Gradual rewrites, UI/UX refresh, performance, security and infrastructure improvements without risky big-bang migrations.",
        footnote: "Often combined with architecture reviews and refactor strategy. Explore how we work in our",
        footnoteLink: { label: "About", href: "/about-us/" },
      },
      {
        title: "Set up a dedicated product team",
        description:
          "Cross-functional pods with backend, frontend, mobile, QA and a product-focused lead, integrated into your existing workflows.",
        footnote:
          "Ideal for long-term roadmaps and continuous delivery. Ask about retainer / dedicated squad models.",
      },
      {
        title: "Integrate APIs or automate workflows",
        description:
          "Connect CRMs, payment gateways, communications, analytics and internal systems; reduce manual work with robust automation.",
        footnote:
          "Examples: payment flows, booking engines, ERP/CRM integrations, reporting dashboards and AI-assisted workflows.",
      },
      {
        title: "Architecture reviews, audits & refactors",
        description:
          "Clear technical assessments, risk lists and refactor plans for legacy systems or fast-growing products nearing scale.",
        footnote:
          "Useful before fundraising, major releases or vendor transitions. We can also support your in-house team as advisors.",
      },
      {
        title: "Ongoing maintenance & feature development",
        description:
          "Monthly retainers for bug fixes, small features, optimisations and production support with agreed response windows.",
        footnote: "Often paired with a quarterly roadmap and regular demos. See examples in our",
        footnoteLink: { label: "portfolios", href: "/portfolio/" },
      },
    ],
    asideTitle: "What happens after you contact us?",
    asideIntro:
      "We keep the process lightweight, transparent and focused on whether we are the right fit for your product stage and budget.",
    steps: [
      {
        step: 1,
        title: "Review your brief",
        description:
          "We read your message, links and attachments, then clarify open questions via email or a quick chat if needed.",
      },
      {
        step: 2,
        title: "Short discovery call",
        description:
          "A 30–45 minute video call to understand goals, constraints, tech stack, timelines and how you prefer to work.",
      },
      {
        step: 3,
        title: "Proposal with scope & estimates",
        description:
          "We send a structured proposal with recommended approach, phases, ballpark budget and timelines for review.",
      },
      {
        step: 4,
        title: "Kickoff & regular demos",
        description:
          "Once the proposal is approved, we onboard your team, set up channels and start delivery with weekly or bi-weekly demos.",
      },
    ],
    asideFootnote: "Already have an RFP or detailed scope? Email it to",
    asideFootnoteEmail: "sales@qalbit.com",
  };
}

export function mapContactLocations(): ContactLocationsSectionProps {
  return {
    title: "Global delivery from Ahmedabad, serving teams across the UK, Europe & Middle East",
    intro:
      "QalbIT is a <span class=\"font-medium text-slate-100\">custom software development company based in Ahmedabad, India</span>, working with clients in the UK, Europe and the Middle East on SaaS products, web applications and mobile solutions. You can reach us via email, phone or WhatsApp – we are used to collaborating across time zones.",
    cards: [
      {
        title: "India – Headquarters",
        region: "Ahmedabad, Gujarat",
        lines: [
          "QalbIT Infotech Pvt Ltd",
          "C109, Siddhi Vinayak Towers",
          "Near Kataria Arcade, Opp. S.G. Highway",
          "Makarba, Ahmedabad – 380051",
          "Gujarat, India",
        ],
        phone: "+91-8511900440",
        timezone: "IST (UTC+05:30)",
      },
      {
        title: "United Kingdom – Client delivery",
        region: "UK & Northern Europe",
        lines: [
          "Remote delivery team aligned with <span class=\"font-medium text-slate-100\">GMT / BST</span> for product, engineering and stakeholder calls.",
          "Ideal for SaaS founders and product teams looking for an engineering partner with overlapping UK working hours.",
        ],
        phone: "+91-8511900440",
        phoneNote: "(global line)",
        timezone: "UK business hours (GMT / BST)",
      },
      {
        title: "Spain & Europe – Product partnerships",
        region: "Spain & wider EU",
        lines: [
          "We collaborate with founders and teams across Spain and Europe on custom software, SaaS and integration projects.",
          "Engagements are coordinated in <span class=\"font-medium text-slate-100\">CET / CEST</span> with shared Slack / Teams channels, regular demos and written updates.",
        ],
        phone: "+91-8511900440",
        phoneNote: "(global line)",
        timezone: "CET / CEST (Europe)",
      },
    ],
    directContact: {
      title: "Direct contact",
      emails: [
        { label: "Project enquiries", href: "mailto:sales@qalbit.com", email: "sales@qalbit.com" },
        { label: "General queries", href: "mailto:info@qalbit.com", email: "info@qalbit.com" },
        { label: "Careers & hiring", href: "mailto:hr@qalbit.com", email: "hr@qalbit.com" },
      ],
      calendlyNote:
        "For RFPs, detailed scopes or procurement processes, you can also book a call directly via our",
      calendlyHref: "https://calendly.com/abidhusain-qalbit/discuss-project",
    },
  };
}

export function mapContactFinalCta(): ContactFinalCtaSectionProps {
  return {
    title: "Ready to discuss your software project?",
    body:
      "Share where you are today and where you want to be – we will suggest a practical path, timeline and the right engagement model for your SaaS or custom software roadmap.",
    primary: {
      label: "Schedule a discovery call",
      href: "https://calendly.com/abidhusain-qalbit/discuss-project",
      external: true,
    },
    email: "sales@qalbit.com",
  };
}

export function mapContactFaq(faqs: FaqItem[]): FaqBlockProps | null {
  if (!faqs.length) return null;

  return {
    id: "contact-faqs",
    title: "Pre-sales FAQs about working with QalbIT",
    subtitle:
      "Answers to common questions about budgets, timelines, engagement models and security so you can decide whether QalbIT is the right engineering partner for your SaaS or custom software project.",
    bullets: [
      "✓ Get clarity on minimum engagement sizes, budget ranges and how we price different types of projects.",
      "✓ Understand how we start new engagements – from first call and discovery to proposal, kickoff and regular demos.",
      "✓ See how we handle NDAs, security, time zones and communication, so collaboration feels predictable and low risk.",
    ],
    faqs,
  };
}
