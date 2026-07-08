export interface CockpitSaasHeroProps {
  eyebrow: string;
  title: string;
  subtitle: string;
  primaryCta: { label: string; href: string };
  secondaryCta: { label: string; href: string };
}

export interface CockpitFeatureItem {
  title: string;
  description: string;
}

export interface CockpitPricingTier {
  key: string;
  name: string;
  tagline: string;
  monthlyUsd: number;
  yearlyUsd: number;
  monthlyInr: number;
  yearlyInr: number;
  highlights: string[];
  recommended?: boolean;
  enterprise?: boolean;
}

export function mapCockpitSaasHero(): CockpitSaasHeroProps {
  const registerUrl =
    process.env.NEXT_PUBLIC_COCKPIT_REGISTER_URL ?? "https://liftup.sh/register";

  return {
    eyebrow: "LiftUp",
    title: "CRM, content & insights for every product you ship",
    subtitle:
      "Multi-tenant operations console — leads, blog, analytics, AI editorial, and integrations in one enterprise workspace.",
    primaryCta: { label: "Start 14-day Growth trial", href: registerUrl },
    secondaryCta: { label: "View pricing", href: "/pricing/" },
  };
}

export function mapCockpitFeatures(): CockpitFeatureItem[] {
  return [
    {
      title: "Unified lead inbox",
      description: "Contact, hire, and career leads with SLA scoring, assignments, and webhooks.",
    },
    {
      title: "Content & AI editorial",
      description: "Blog workflow, corpus style, image AI, and SEO tooling scoped per product.",
    },
    {
      title: "Insights & attribution",
      description: "GA4, Search Console, funnel views, and weekly digests for growth teams.",
    },
    {
      title: "Per-tenant integrations",
      description: "Bring your own OpenAI key, SMTP, Slack, and Google OAuth — isolated by organization.",
    },
    {
      title: "Embed forms",
      description: "Drop an iframe contact form on any site without exposing API keys client-side.",
    },
    {
      title: "Plan gating & AI metering",
      description: "Free, Starter, Growth, and Enterprise tiers with token caps and usage dashboards.",
    },
  ];
}

export function mapCockpitPricing(): CockpitPricingTier[] {
  return [
    {
      key: "free",
      name: "Free",
      tagline: "Run your first site",
      monthlyUsd: 0,
      yearlyUsd: 0,
      monthlyInr: 0,
      yearlyInr: 0,
      highlights: [
        "2 team members · 1 product",
        "100 leads / month",
        "CRM inbox & basic blog",
        "API key + embed form",
      ],
    },
    {
      key: "starter",
      name: "Starter",
      tagline: "Everything to capture & convert",
      monthlyUsd: 49,
      yearlyUsd: 490,
      monthlyInr: 2499,
      yearlyInr: 24990,
      highlights: [
        "5 users · 3 products · 1K leads/mo",
        "Insights (GA4 + GSC)",
        "Content AI · 50K tokens/mo",
        "Webhooks & custom fields",
      ],
    },
    {
      key: "pro",
      name: "Growth",
      tagline: "The full revenue engine",
      monthlyUsd: 149,
      yearlyUsd: 1490,
      monthlyInr: 7999,
      yearlyInr: 79990,
      recommended: true,
      highlights: [
        "20 users · 10 products · 10K leads/mo",
        "Image AI · editorial calendar · DAM",
        "Gmail · sequences · full API",
        "500K AI tokens / month",
      ],
    },
    {
      key: "enterprise",
      name: "Enterprise",
      tagline: "White-label & unlimited scale",
      monthlyUsd: 499,
      yearlyUsd: 4990,
      monthlyInr: 24999,
      yearlyInr: 249990,
      enterprise: true,
      highlights: [
        "Unlimited users, products & leads",
        "White-label branding & custom domain",
        "SSO · dedicated support · SLA",
        "Unlimited AI (fair use)",
      ],
    },
  ];
}

export function mapCockpitCta() {
  const registerUrl =
    process.env.NEXT_PUBLIC_COCKPIT_REGISTER_URL ?? "https://liftup.sh/register";

  return {
    title: "Ready to run ops from one cockpit?",
    body: "14-day Growth trial · no credit card · USD via Stripe · INR via Razorpay UPI.",
    primaryCta: { label: "Create your workspace", href: registerUrl },
  };
}
