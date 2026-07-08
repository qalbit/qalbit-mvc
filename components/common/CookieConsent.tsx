"use client";

import Link from "next/link";
import { useEffect, useState } from "react";
import { acceptCookieConsent, hasCookieConsent } from "@/lib/cookie-consent";

export function CookieConsent() {
  const [visible, setVisible] = useState(false);

  useEffect(() => {
    if (!hasCookieConsent()) {
      setVisible(true);
    }
  }, []);

  function accept() {
    acceptCookieConsent();
    setVisible(false);
  }

  if (!visible) return null;

  return (
    <div
      className="fixed inset-x-0 bottom-0 z-40 bg-slate-950/95 text-xs text-slate-50"
      data-cookie-banner
      data-cookie-managed="react"
      role="region"
      aria-label="Cookie consent"
    >
      <div className="mx-auto flex max-w-6xl flex-wrap items-center gap-3 px-4 py-3 md:flex-nowrap md:py-4">
        <div className="flex items-center gap-3">
          <div className="mt-0.5 hidden h-7 w-7 flex-shrink-0 items-center justify-center rounded-full bg-slate-900/80 md:flex">
            <span className="text-2xl" aria-hidden="true">🍪</span>
          </div>
          <div className="space-y-1">
            <p className="text-[11px] font-semibold uppercase tracking-wide text-slate-400">
              We value your privacy
            </p>
            <p className="text-[11px] text-slate-100 md:text-xs">
              We use cookies to improve your experience, analyze traffic, and support our marketing. You can change
              your browser cookie settings at any time.
            </p>
            <div className="mt-1 flex flex-wrap gap-2 md:hidden">
              <Link href="/privacy-policy/" className="underline underline-offset-2">Privacy Policy</Link>
              <Link href="/cookie-policy/" className="underline underline-offset-2">Cookie Policy</Link>
            </div>
          </div>
        </div>

        <div className="flex flex-shrink-0 items-center gap-2">
          <div className="hidden items-center gap-2 md:flex">
            <Link href="/privacy-policy/" className="text-[11px] underline underline-offset-2">
              Privacy Policy
            </Link>
            <Link href="/cookie-policy/" className="text-[11px] underline underline-offset-2">
              Cookie Policy
            </Link>
          </div>
          <button
            type="button"
            className="inline-flex items-center justify-center rounded-full bg-white px-3.5 py-1.5 text-[11px] font-medium text-slate-900 shadow-sm hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-slate-100 focus:ring-offset-2 focus:ring-offset-slate-950"
            data-cookie-accept
            onClick={accept}
          >
            Accept & continue
          </button>
        </div>
      </div>
    </div>
  );
}
