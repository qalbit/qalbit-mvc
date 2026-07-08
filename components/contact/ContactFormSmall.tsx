"use client";

import { FormEvent, useState } from "react";
import { cn } from "@/lib/utils";

type ContactFormVariant = "page" | "footer" | "popup" | "contact_cta";

interface ContactFormSmallProps {
  leadFrom?: string;
  redirectTo?: string;
  variant?: ContactFormVariant;
  className?: string;
}

const inputClass =
  "block w-full rounded-md border border-slate-300 bg-white px-3 py-3 text-sm text-slate-900 placeholder:text-slate-400 shadow-inner focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary";

export function ContactFormSmall({
  leadFrom = "lead_contact_page",
  redirectTo = "/contact-us/thank-you/",
  variant = "page",
  className,
}: ContactFormSmallProps) {
  const [status, setStatus] = useState<"idle" | "loading" | "success" | "error">("idle");
  const [error, setError] = useState<string | null>(null);
  const [fieldErrors, setFieldErrors] = useState<Record<string, string>>({});

  const phoneId = variant === "contact_cta" ? "contact-phone-inline" : "contact-phone";
  const showCard = variant !== "popup" && variant !== "footer";
  const inlineSuccess =
    variant === "contact_cta" || variant === "popup" || redirectTo.includes("#");

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
    setFieldErrors({});

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
        window.dataLayer.push({ event: "form_submit", form_name: "contact" });
      }

      if (inlineSuccess) {
        setStatus("success");
        form.reset();
        return;
      }

      window.location.href = redirectTo;
    } catch {
      setStatus("error");
      setError("Network error. Please try again.");
    }
  }

  function fieldBorder(field: string) {
    return fieldErrors[field] ? "border-red-400" : "border-slate-300";
  }

  const form = (
    <form
      data-contact-form
      data-track="contact-form"
      data-variant={variant}
      onSubmit={onSubmit}
      className={cn("space-y-3", className)}
      noValidate
      aria-label="Project enquiry form"
    >
      <input type="text" name="website" className="hidden" tabIndex={-1} autoComplete="off" aria-hidden="true" />
      <input type="hidden" name="redirect_to" value={redirectTo} />

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
          className={cn(inputClass, fieldBorder("name"))}
          placeholder="Your full name"
          aria-required="true"
        />
        {fieldErrors.name && <p className="text-[11px] text-red-600">{fieldErrors.name}</p>}
      </div>

      <div className="space-y-1.5 text-black">
        <label htmlFor={phoneId} className="block text-xs font-medium text-slate-800">
          Phone / WhatsApp <span className="text-red-500">*</span>
        </label>
        <input
          id={phoneId}
          name="phone"
          type="tel"
          required
          inputMode="tel"
          autoComplete="tel"
          data-intl-tel-input
          className={cn(inputClass, fieldBorder("phone"))}
          placeholder="e.g. +1 415 555 1234"
          aria-describedby="contact-phone-help"
        />
        {fieldErrors.phone && <p className="text-[11px] text-red-600">{fieldErrors.phone}</p>}
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
          className={cn(inputClass, fieldBorder("email"))}
          placeholder="you@company.com"
          aria-required="true"
        />
        {fieldErrors.email && <p className="text-[11px] text-red-600">{fieldErrors.email}</p>}
      </div>

      <div className="space-y-1.5">
        <label htmlFor="contact-message" className="block text-xs font-medium text-slate-800">
          Short project overview <span className="text-red-500">*</span>
        </label>
        <textarea
          id="contact-message"
          name="message"
          rows={4}
          required
          className={cn(inputClass, fieldBorder("message"))}
          placeholder="Tell us about your product, current challenges, tech stack and what success would look like for you."
          aria-required="true"
        />
        {fieldErrors.message && <p className="text-[11px] text-red-600">{fieldErrors.message}</p>}
      </div>

      <input type="hidden" name="lead_from" value={leadFrom} />
      <input type="hidden" name="lead_source" value="general" />
      <input type="hidden" name="lead_topic" value="general" />

      <button
        type="submit"
        className="inline-flex w-full items-center justify-center rounded-full bg-slate-900 px-4 py-3.5 text-sm font-medium text-white hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-slate-900 focus:ring-offset-2 focus:ring-offset-white disabled:opacity-70"
        disabled={status === "loading"}
      >
        {status === "loading" ? "Sending…" : "Send message"}
      </button>

      <p className="pt-1 text-[12px] leading-snug text-slate-400">
        By submitting, you agree to be contacted by QalbIT regarding this enquiry. We do not sell or
        share your details with third parties.
      </p>
    </form>
  );

  if (!showCard) {
    return (
      <div className="bg-white p-5 shadow-sm">
        {status === "success" && (
          <div className="mb-4 rounded-md border border-green-200 bg-green-50 px-4 py-3 text-xs text-green-800">
            Thank you. We have received your enquiry and will respond within 24 hours (business
            days).
          </div>
        )}
        {error && (
          <div className="mb-4 rounded-md border border-red-200 bg-red-50 px-4 py-3 text-xs text-red-800">
            {error}
          </div>
        )}
        {status !== "success" && form}
      </div>
    );
  }

  return (
    <div className="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
      <div className="mb-4 space-y-1">
        <h3 className="flex flex-col font-semibold">
          <span className="text-md text-slate-800">Tell us briefly</span>
          <span className="text-2xl font-bold text-primary-950">About your project</span>
        </h3>
      </div>

      {status === "success" && (
        <div className="mb-4 rounded-md border border-green-200 bg-green-50 px-4 py-3 text-xs text-green-800">
          Thank you. We have received your enquiry and will respond within 24 hours (business days).
        </div>
      )}

      {error && (
        <div className="mb-4 rounded-md border border-red-200 bg-red-50 px-4 py-3 text-xs text-red-800">
          {error}
        </div>
      )}

      {status !== "success" && form}
    </div>
  );
}

declare global {
  interface Window {
    dataLayer?: Record<string, unknown>[];
  }
}
