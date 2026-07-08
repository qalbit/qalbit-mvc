"use client";

import Link from "next/link";
import { FormEvent, useState } from "react";

const inputClass =
  "block w-full rounded border border-slate-300 px-3 py-2 text-xs text-slate-900 focus:border-slate-500 focus:outline-none focus:ring-1 focus:ring-slate-500";

export function ContactFormExitPopup() {
  const [status, setStatus] = useState<"idle" | "loading" | "success" | "error">("idle");
  const [error, setError] = useState<string | null>(null);
  const [fieldErrors, setFieldErrors] = useState<Record<string, string>>({});

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

    if (fd.get("website")) return;

    const recaptchaToken = await getRecaptchaToken();

    const payload = {
      name: fd.get("name") as string,
      email: fd.get("email") as string,
      phone: "",
      message: fd.get("message") as string,
      lead_from: "lead_contact_page",
      lead_source: "exit_popup",
      lead_topic: "exit_popup",
      recaptcha_token: recaptchaToken,
    };

    try {
      const res = await fetch("/api/contact/", {
        method: "POST",
        headers: { "Content-Type": "application/json", Accept: "application/json" },
        body: JSON.stringify(payload),
      });

      const data = (await res.json()) as {
        success?: boolean;
        message?: string;
        errors?: Record<string, string>;
      };

      if (!res.ok || !data.success) {
        setStatus("error");
        if (data.errors) setFieldErrors(data.errors);
        setError(data.message ?? "Something went wrong. Please try again.");
        return;
      }

      if (typeof window !== "undefined" && window.dataLayer) {
        window.dataLayer.push({ event: "form_submit", form_name: "exit_popup" });
      }

      setStatus("success");
      form.reset();
    } catch {
      setStatus("error");
      setError("Network error. Please try again.");
    }
  }

  function fieldBorder(field: string) {
    return fieldErrors[field] ? "border-red-400" : "border-slate-300";
  }

  return (
    <div className="bg-white p-5 shadow-sm">
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

      {status !== "success" && (
        <>
          <div className="mb-4 space-y-0">
            <h3 className="font-semibold text-slate-900">
              <span className="text-sm">Tell us briefly </span>
              <span className="text-md">About your project</span>
            </h3>
          </div>

          <form
            data-contact-form
            data-track="contact-form"
            data-variant="exit_popup"
            onSubmit={onSubmit}
            className="space-y-3"
            noValidate
          >
            <input
              type="text"
              name="website"
              className="hidden"
              tabIndex={-1}
              autoComplete="off"
              aria-hidden="true"
            />

            <div className="space-y-1">
              <label className="text-xs font-medium text-slate-700">Name</label>
              <input
                name="name"
                type="text"
                required
                className={`${inputClass} ${fieldBorder("name")}`}
                placeholder="Your name"
              />
              {fieldErrors.name && (
                <p className="mt-1 text-[11px] text-red-600">{fieldErrors.name}</p>
              )}
            </div>

            <div className="space-y-1">
              <label className="text-xs font-medium text-slate-700">Email</label>
              <input
                name="email"
                type="email"
                required
                className={`${inputClass} ${fieldBorder("email")}`}
                placeholder="you@example.com"
              />
              {fieldErrors.email && (
                <p className="mt-1 text-[11px] text-red-600">{fieldErrors.email}</p>
              )}
            </div>

            <div className="space-y-1">
              <label className="text-xs font-medium text-slate-700">Short project overview</label>
              <textarea
                name="message"
                rows={3}
                required
                className={`${inputClass} ${fieldBorder("message")}`}
                placeholder="Timeline, budget range or main challenge"
              />
              {fieldErrors.message && (
                <p className="mt-1 text-[11px] text-red-600">{fieldErrors.message}</p>
              )}
            </div>

            <button
              type="submit"
              className="inline-flex items-center justify-center rounded bg-slate-900 px-4 py-2 text-xs font-medium text-white hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-slate-900/80 focus:ring-offset-2 focus:ring-offset-white disabled:opacity-70"
              disabled={status === "loading"}
            >
              {status === "loading" ? "Sending…" : "Send message"}
            </button>

            <p className="mt-2 text-[11px] leading-snug text-slate-500">
              We&apos;ll only use your details to follow up on this inquiry. No newsletters, no third-party
              sharing. Read our{" "}
              <Link href="/privacy-policy/" className="underline">Privacy Policy</Link>.
            </p>
          </form>
        </>
      )}
    </div>
  );
}

declare global {
  interface Window {
    dataLayer?: Record<string, unknown>[];
  }
}
