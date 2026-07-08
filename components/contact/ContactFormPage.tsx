"use client";

import { FormEvent, useState } from "react";

interface ContactFormPageProps {
  leadFrom?: string;
  redirectTo?: string;
  className?: string;
}

export function ContactFormPage({
  leadFrom = "lead_contact_page",
  redirectTo = "/contact-us/",
  className,
}: ContactFormPageProps) {
  const [status, setStatus] = useState<"idle" | "loading" | "error">("idle");
  const [error, setError] = useState<string | null>(null);

  async function getRecaptchaToken(): Promise<string> {
    const siteKey = process.env.NEXT_PUBLIC_RECAPTCHA_SITE_KEY;
    if (!siteKey || typeof window === "undefined") return "";

    const grecaptcha = (window as Window & {
      grecaptcha?: { execute: (key: string, opts: { action: string }) => Promise<string> };
    }).grecaptcha;
    if (!grecaptcha) return "";

    try {
      return await grecaptcha.execute(siteKey, { action: "contact" });
    } catch {
      return "";
    }
  }

  async function onSubmit(e: FormEvent<HTMLFormElement>) {
    e.preventDefault();
    setStatus("loading");
    setError(null);

    const form = e.currentTarget;
    const fd = new FormData(form);

    if (fd.get("website")) {
      window.location.href = redirectTo;
      return;
    }

    const recaptchaToken = await getRecaptchaToken();

    const payload = {
      name: fd.get("name") as string,
      email: fd.get("email") as string,
      phone: fd.get("phone") as string,
      message: fd.get("message") as string,
      lead_from: leadFrom,
      lead_source: (fd.get("lead_source") as string) || "general",
      lead_topic: (fd.get("lead_topic") as string) || "general",
      recaptcha_token: recaptchaToken,
    };

    try {
      const res = await fetch("/api/contact/", {
        method: "POST",
        headers: { "Content-Type": "application/json", Accept: "application/json" },
        body: JSON.stringify(payload),
      });

      const data = (await res.json()) as { success?: boolean; message?: string };

      if (!res.ok || !data.success) {
        setStatus("error");
        setError(data.message ?? "Something went wrong. Please try again.");
        return;
      }

      if (typeof window !== "undefined" && window.dataLayer) {
        window.dataLayer.push({ event: "form_submit", form_name: "contact_page" });
      }

      window.location.href = "/contact-us/thank-you/";
    } catch {
      setStatus("error");
      setError("Network error. Please try again.");
    }
  }

  const inputClass =
    "block w-full rounded-md border border-slate-300 bg-white px-3 py-3 text-sm text-slate-900 placeholder:text-slate-400 shadow-inner focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary";

  return (
    <form
      data-contact-form
      data-track="contact-form"
      onSubmit={onSubmit}
      className={className}
      noValidate
      aria-label="Project enquiry form"
    >
      <input type="text" name="website" className="hidden" tabIndex={-1} autoComplete="off" aria-hidden="true" />
      <input type="hidden" name="redirect_to" value={redirectTo} />

      <div className="space-y-5">
        <div className="space-y-1.5">
          <label htmlFor="contact-name" className="block text-xs font-medium text-slate-800">
            Full name <span className="text-red-500">*</span>
          </label>
          <input
            id="contact-name"
            name="name"
            type="text"
            required
            autoComplete="name"
            className={inputClass}
            placeholder="Your full name"
            aria-required="true"
          />
        </div>

        <div className="space-y-1.5">
          <label htmlFor="contact-phone" className="block text-xs font-medium text-slate-800">
            Phone / WhatsApp <span className="text-red-500">*</span>
          </label>
          <input
            id="contact-phone"
            name="phone"
            type="tel"
            required
            inputMode="tel"
            autoComplete="tel"
            data-intl-tel-input
            className={inputClass}
            placeholder="e.g. +1 415 555 1234"
            aria-describedby="contact-phone-help"
          />
          <p id="contact-phone-help" className="text-[11px] text-slate-500">
            Helps us follow up faster by call or WhatsApp.
          </p>
        </div>

        <div className="space-y-1.5">
          <label htmlFor="contact-email" className="block text-xs font-medium text-slate-800">
            Work email <span className="text-red-500">*</span>
          </label>
          <input
            id="contact-email"
            name="email"
            type="email"
            required
            autoComplete="email"
            className={inputClass}
            placeholder="you@company.com"
            aria-required="true"
          />
          <p className="text-[11px] text-slate-500">We do not share your email with third parties.</p>
        </div>

        <div className="space-y-1.5">
          <label htmlFor="contact-message" className="block text-xs font-medium text-slate-800">
            Project details <span className="text-red-500">*</span>
          </label>
          <textarea
            id="contact-message"
            name="message"
            rows={4}
            required
            className={inputClass}
            placeholder="Tell us about your product, current challenges, tech stack and what success would look like for you."
            aria-required="true"
          />
        </div>

        <input type="hidden" name="lead_from" value={leadFrom} />
        <input type="hidden" name="lead_source" value="general" />
        <input type="hidden" name="lead_topic" value="general" />
      </div>

      {error && (
        <div className="mt-4 rounded-md border border-red-200 bg-red-50 px-3 py-2 text-xs text-red-800">
          {error}
        </div>
      )}

      <div className="space-y-3 pt-1">
        <button
          type="submit"
          className="inline-flex w-full items-center justify-center rounded-md bg-primary px-4 py-3 text-sm font-semibold text-white shadow-lg shadow-primary/30 transition hover:bg-primary/90 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2"
          disabled={status === "loading"}
          data-contact-hero-el
        >
          {status === "loading" ? "Sending…" : "Submit enquiry"}
        </button>
        <p className="text-[11px] text-slate-500">
          Prefer to schedule directly? You can also{" "}
          <a
            href="https://calendly.com/abidhusain-qalbit/discuss-project"
            className="font-medium text-primary underline underline-offset-4 hover:text-primary/80"
          >
            book a discovery call
          </a>.
        </p>
      </div>
    </form>
  );
}

declare global {
  interface Window {
    dataLayer?: Record<string, unknown>[];
  }
}
