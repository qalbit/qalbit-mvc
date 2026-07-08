"use client";

import { FormEvent, useState } from "react";

interface CareerApplyFormProps {
  roleSlug?: string;
  roleTitle?: string;
}

export function CareerApplyForm({ roleSlug = "", roleTitle }: CareerApplyFormProps) {
  const [status, setStatus] = useState<"idle" | "loading" | "success" | "error">("idle");
  const [error, setError] = useState<string | null>(null);

  async function getRecaptchaToken(): Promise<string> {
    const siteKey = process.env.NEXT_PUBLIC_RECAPTCHA_SITE_KEY;
    if (!siteKey || typeof window === "undefined") return "";

    const grecaptcha = (
      window as Window & {
        grecaptcha?: { execute: (key: string, opts: { action: string }) => Promise<string> };
      }
    ).grecaptcha;
    if (!grecaptcha) return "";

    try {
      return await grecaptcha.execute(siteKey, { action: "career" });
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
      return;
    }

    const recaptchaToken = await getRecaptchaToken();
    if (recaptchaToken) {
      fd.set("recaptcha_token", recaptchaToken);
    }

    try {
      const res = await fetch("/api/career/apply/", {
        method: "POST",
        body: fd,
      });

      const data = (await res.json()) as { success?: boolean; message?: string };

      if (!res.ok || !data.success) {
        setStatus("error");
        setError(data.message ?? "Submission failed. Please try again.");
        return;
      }

      if (typeof window !== "undefined" && window.dataLayer) {
        window.dataLayer.push({ event: "form_submit", form_name: "career_apply" });
      }

      form.reset();
      setStatus("success");
    } catch {
      setStatus("error");
      setError("Network error. Please try again.");
    }
  }

  const inputClass =
    "block w-full rounded-xl border border-slate-300 bg-white px-3 py-2 text-xs text-slate-900 shadow-sm focus:border-sky-500 focus:ring-1 focus:ring-sky-500 sm:text-sm";

  if (status === "success") {
    return (
      <div
        className="rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800"
        data-career-form-success
      >
        Thank you — your application has been submitted. We will review it and get back to you if
        there is a strong fit.
      </div>
    );
  }

  return (
    <form
      onSubmit={onSubmit}
      className="space-y-6"
      noValidate
      aria-label={`Apply for ${roleTitle ?? "a role at QalbIT"}`}
      data-contact-form
      data-track="contact-form"
    >
      <input type="text" name="website" className="hidden" tabIndex={-1} autoComplete="off" aria-hidden="true" />
      <input type="hidden" name="role_slug" value={roleSlug} />

      <div className="grid gap-4 sm:grid-cols-2">
        <div className="space-y-1.5">
          <label htmlFor="full_name" className="block text-xs font-medium text-slate-700">
            Full name <span className="text-rose-500">*</span>
          </label>
          <input id="full_name" name="full_name" type="text" required autoComplete="name" className={inputClass} />
        </div>
        <div className="space-y-1.5">
          <label htmlFor="email" className="block text-xs font-medium text-slate-700">
            Email <span className="text-rose-500">*</span>
          </label>
          <input id="email" name="email" type="email" required autoComplete="email" className={inputClass} />
        </div>
        <div className="space-y-1.5">
          <label htmlFor="phone" className="block text-xs font-medium text-slate-700">
            Phone / WhatsApp <span className="text-rose-500">*</span>
          </label>
          <input id="phone" name="phone" type="tel" required autoComplete="tel" className={inputClass} />
        </div>
        <div className="space-y-1.5">
          <label htmlFor="location" className="block text-xs font-medium text-slate-700">
            Current city & country <span className="text-rose-500">*</span>
          </label>
          <input id="location" name="location" type="text" required className={inputClass} />
        </div>
      </div>

      <div className="grid gap-4 sm:grid-cols-3">
        <div className="space-y-1.5">
          <label htmlFor="experience" className="block text-xs font-medium text-slate-700">
            Total experience (years) <span className="text-rose-500">*</span>
          </label>
          <input
            id="experience"
            name="experience"
            type="number"
            min={0}
            step={0.5}
            required
            className={inputClass}
          />
        </div>
        <div className="space-y-1.5">
          <label htmlFor="current_role" className="block text-xs font-medium text-slate-700">
            Current / last role
          </label>
          <input id="current_role" name="current_role" type="text" className={inputClass} />
        </div>
        <div className="space-y-1.5">
          <label htmlFor="notice_period" className="block text-xs font-medium text-slate-700">
            Notice period
          </label>
          <input
            id="notice_period"
            name="notice_period"
            type="text"
            placeholder="e.g. Immediate / 30 days"
            className={inputClass}
          />
        </div>
      </div>

      <div className="grid gap-4 sm:grid-cols-2">
        <div className="space-y-1.5">
          <label htmlFor="linkedin" className="block text-xs font-medium text-slate-700">
            LinkedIn or portfolio URL
          </label>
          <input id="linkedin" name="linkedin" type="url" placeholder="https://" className={inputClass} />
        </div>
        <div className="space-y-1.5">
          <label htmlFor="github" className="block text-xs font-medium text-slate-700">
            GitHub / code samples
          </label>
          <input id="github" name="github" type="url" placeholder="https://" className={inputClass} />
        </div>
      </div>

      <div className="grid gap-4 sm:grid-cols-2">
        <div className="space-y-1.5">
          <label htmlFor="current_ctc" className="block text-xs font-medium text-slate-700">
            Current CTC (optional)
          </label>
          <input id="current_ctc" name="current_ctc" type="text" placeholder="e.g. 6 LPA" className={inputClass} />
        </div>
        <div className="space-y-1.5">
          <label htmlFor="expected_ctc" className="block text-xs font-medium text-slate-700">
            Expected CTC (optional)
          </label>
          <input id="expected_ctc" name="expected_ctc" type="text" placeholder="e.g. 8.5 LPA" className={inputClass} />
        </div>
      </div>

      <div className="space-y-1.5">
        <label htmlFor="about" className="block text-xs font-medium text-slate-700">
          Why do you want to work at QalbIT? <span className="text-rose-500">*</span>
        </label>
        <textarea
          id="about"
          name="about"
          required
          rows={4}
          className={`${inputClass} min-h-[6rem]`}
          placeholder="A short note about what you are looking for, what you enjoy working on, and why you think QalbIT is a good fit."
        />
      </div>

      <div className="space-y-1.5">
        <label htmlFor="resume" className="block text-xs font-medium text-slate-700">
          Resume / CV <span className="text-rose-500">*</span>
        </label>
        <input
          id="resume"
          name="resume"
          type="file"
          required
          accept=".pdf,.doc,.docx"
          className="block w-full text-xs text-slate-700 file:mr-3 file:rounded-full file:border-0 file:bg-sky-600 file:px-3 file:py-1.5 file:text-[11px] file:font-semibold file:uppercase file:tracking-wide file:text-slate-50 hover:file:bg-sky-500"
        />
        <p className="mt-1 text-[11px] text-slate-500">
          Upload a PDF or DOC/DOCX file. Keep the filename simple (e.g. yourname-resume.pdf).
        </p>
      </div>

      {error && (
        <div
          className="rounded-md border border-red-200 bg-red-50 px-3 py-2 text-xs text-red-800"
          data-career-form-error
        >
          {error}
        </div>
      )}

      <div className="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <p className="max-w-md text-[11px] text-slate-500">
          By submitting this form, you agree that we can store your details and contact you about
          current or future opportunities at QalbIT.
        </p>
        <button
          type="submit"
          disabled={status === "loading"}
          className="inline-flex items-center justify-center rounded-full bg-sky-600 px-5 py-2.5 text-[12px] font-semibold uppercase tracking-wide text-slate-50 shadow-sm hover:bg-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-1 disabled:opacity-60"
        >
          {status === "loading" ? "Submitting…" : "Submit application"}
        </button>
      </div>
    </form>
  );
}

declare global {
  interface Window {
    dataLayer?: Record<string, unknown>[];
  }
}
