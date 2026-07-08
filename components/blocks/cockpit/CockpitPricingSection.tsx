"use client";

import { useMemo, useState } from "react";
import type { CockpitPricingTier } from "@/lib/blocks/cockpit-mappers";
import { Card, Container, Section, SectionHeader } from "@/components/ui";

type Currency = "usd" | "inr";
type Interval = "monthly" | "yearly";

function formatPrice(tier: CockpitPricingTier, currency: Currency, interval: Interval): string {
  const monthly = currency === "inr" ? tier.monthlyInr : tier.monthlyUsd;
  const yearly = currency === "inr" ? tier.yearlyInr : tier.yearlyUsd;
  const amount = interval === "yearly" ? yearly : monthly;

  if (amount <= 0) {
    return currency === "inr" ? "₹0" : "$0";
  }

  if (currency === "inr") {
    return `₹${amount.toLocaleString("en-IN")}`;
  }

  return `$${amount.toLocaleString("en-US")}`;
}

export function CockpitPricingSection({ tiers }: { tiers: CockpitPricingTier[] }) {
  const [currency, setCurrency] = useState<Currency>("usd");
  const [interval, setInterval] = useState<Interval>("monthly");

  const registerUrl =
    process.env.NEXT_PUBLIC_COCKPIT_REGISTER_URL ?? "https://liftup.sh/register";

  const subtext = useMemo(() => {
    if (interval === "yearly") {
      return currency === "inr" ? "per year · 2 months free · +18% GST" : "per year · 2 months free";
    }
    return currency === "inr" ? "per month · +18% GST" : "per month";
  }, [currency, interval]);

  return (
    <Section className="bg-slate-50 py-16" id="pricing">
      <Container>
        <SectionHeader
          eyebrow="Pricing"
          title="Simple tiers that scale with you"
          subtitle="Flat org pricing — replace a CRM, AI writer, and SEO tool with one login."
          align="center"
          className="mb-8"
        />

        <div className="mb-8 flex flex-wrap items-center justify-center gap-3">
          <div className="inline-flex rounded-xl border border-slate-200 bg-white p-1 shadow-sm">
            <button
              type="button"
              onClick={() => setInterval("monthly")}
              className={`rounded-lg px-3 py-1.5 text-sm font-medium ${interval === "monthly" ? "bg-sky-600 text-white" : "text-slate-600"}`}
            >
              Monthly
            </button>
            <button
              type="button"
              onClick={() => setInterval("yearly")}
              className={`rounded-lg px-3 py-1.5 text-sm font-medium ${interval === "yearly" ? "bg-sky-600 text-white" : "text-slate-600"}`}
            >
              Yearly <span className="ml-1 text-[10px] uppercase opacity-80">2 mo free</span>
            </button>
          </div>
          <div className="inline-flex rounded-xl border border-slate-200 bg-white p-1 shadow-sm">
            <button
              type="button"
              onClick={() => setCurrency("usd")}
              className={`rounded-lg px-3 py-1.5 text-sm font-medium ${currency === "usd" ? "bg-sky-600 text-white" : "text-slate-600"}`}
            >
              USD
            </button>
            <button
              type="button"
              onClick={() => setCurrency("inr")}
              className={`rounded-lg px-3 py-1.5 text-sm font-medium ${currency === "inr" ? "bg-sky-600 text-white" : "text-slate-600"}`}
            >
              INR
            </button>
          </div>
        </div>

        {currency === "inr" && (
          <p className="mb-8 text-center text-sm text-slate-600">
            Prices exclude 18% GST. UPI AutoPay subscriptions via Razorpay at checkout.
          </p>
        )}

        <div className="grid gap-6 lg:grid-cols-2 xl:grid-cols-4">
          {tiers.map((tier) => (
            <Card
              key={tier.key}
              className={`relative flex flex-col p-6 ${tier.recommended ? "ring-2 ring-sky-600" : ""}`}
            >
              {tier.recommended && (
                <span className="absolute right-4 top-4 rounded-full bg-sky-600 px-2 py-0.5 text-[10px] font-semibold uppercase tracking-wide text-white">
                  Most popular
                </span>
              )}
              <p className="text-sm font-semibold uppercase tracking-wide text-sky-600">{tier.name}</p>
              <p className="mt-1 text-sm text-slate-600">{tier.tagline}</p>
              <p className="mt-4 text-3xl font-bold text-slate-900">
                {formatPrice(tier, currency, interval)}
                <span className="mt-1 block text-sm font-normal text-slate-500">{subtext}</span>
              </p>
              <ul className="mt-6 flex-1 space-y-2 text-sm text-slate-700">
                {tier.highlights.map((line) => (
                  <li key={line}>· {line}</li>
                ))}
              </ul>
              {tier.enterprise ? (
                <a
                  href="mailto:hello@qalbit.com?subject=LiftUp%20Enterprise"
                  className="mt-6 inline-flex justify-center rounded-lg border border-slate-300 px-4 py-2 text-sm font-medium text-slate-800 hover:bg-slate-50"
                >
                  Contact sales
                </a>
              ) : (
                <a
                  href={registerUrl}
                  className={`mt-6 inline-flex justify-center rounded-lg px-4 py-2 text-sm font-medium text-white ${tier.recommended ? "bg-sky-600 hover:bg-sky-700" : "bg-slate-800 hover:bg-slate-900"}`}
                >
                  {tier.key === "free" ? "Get started free" : "Start free trial"}
                </a>
              )}
            </Card>
          ))}
        </div>
      </Container>
    </Section>
  );
}
