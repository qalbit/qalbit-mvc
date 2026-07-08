"use client";

import { useCallback, useEffect, useRef, useState } from "react";
import { ContactFormExitPopup } from "@/components/contact/ContactFormExitPopup";

const STORAGE_KEY = "qalbit_exit_popup_dismissed";
const TIME_TRIGGER_MS = 20000;
const SCROLL_TRIGGER_RATIO = 0.5;

const BULLETS = [
  "No spam — only one follow-up from the QalbIT team",
  "Best suited for SaaS, custom software, and AI projects",
  "You'll hear directly from the core team",
];

export function ExitIntentModal() {
  const [open, setOpen] = useState(false);
  const hasShownRef = useRef(false);

  const dismiss = useCallback(() => {
    setOpen(false);
    document.documentElement.classList.remove("overflow-hidden");
    document.body.classList.remove("overflow-hidden");
    try {
      sessionStorage.setItem(STORAGE_KEY, "1");
    } catch {
      // ignore
    }
  }, []);

  const openPopup = useCallback(() => {
    if (hasShownRef.current) return;
    hasShownRef.current = true;
    setOpen(true);
    document.documentElement.classList.add("overflow-hidden");
    document.body.classList.add("overflow-hidden");
    try {
      sessionStorage.setItem(STORAGE_KEY, "1");
    } catch {
      // ignore
    }
  }, []);

  useEffect(() => {
    try {
      if (sessionStorage.getItem(STORAGE_KEY) === "1") {
        hasShownRef.current = true;
        return;
      }
    } catch {
      // continue without session storage
    }

    const isDesktop = () => window.innerWidth >= 1024;

    const timer = window.setTimeout(() => {
      if (!hasShownRef.current) openPopup();
    }, TIME_TRIGGER_MS);

    function handleScroll() {
      if (hasShownRef.current) return;

      const doc = document.documentElement;
      const scrollTop = window.scrollY || doc.scrollTop || 0;
      const viewportHeight = window.innerHeight || doc.clientHeight || 0;
      const totalHeight = doc.scrollHeight || 0;
      if (!totalHeight) return;

      const scrollRatio = (scrollTop + viewportHeight) / totalHeight;
      if (scrollRatio >= SCROLL_TRIGGER_RATIO) openPopup();
    }

    function handleMouseOut(event: MouseEvent) {
      if (!isDesktop() || hasShownRef.current) return;

      const related = event.relatedTarget as Node | null;
      if (related) return;
      if (event.clientY <= 0) openPopup();
    }

    window.addEventListener("scroll", handleScroll, { passive: true });
    window.addEventListener("mouseout", handleMouseOut);

    return () => {
      window.clearTimeout(timer);
      window.removeEventListener("scroll", handleScroll);
      window.removeEventListener("mouseout", handleMouseOut);
      document.documentElement.classList.remove("overflow-hidden");
      document.body.classList.remove("overflow-hidden");
    };
  }, [openPopup]);

  if (!open) return null;

  return (
    <div
      className="fixed inset-0 z-[60] flex items-center justify-center bg-slate-950/70 p-4"
      data-exit-popup
      data-exit-popup-managed="react"
      aria-hidden="false"
      onClick={(e) => {
        if (e.target === e.currentTarget) dismiss();
      }}
    >
      <div
        className="relative w-full max-w-2xl overflow-hidden rounded-2xl bg-slate-900 text-slate-50 shadow-2xl ring-1 ring-slate-700/60"
        role="dialog"
        aria-modal="true"
        aria-labelledby="exit-popup-title"
      >
        <button
          type="button"
          className="absolute right-2 top-2 inline-flex h-8 w-8 items-center justify-center rounded-full bg-slate-800/80 text-xs text-slate-300 hover:bg-slate-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:ring-offset-2 focus:ring-offset-slate-900"
          data-exit-close
          aria-label="Close popup"
          onClick={dismiss}
        >
          ✕
        </button>

        <div className="grid gap-6 md:grid-cols-[1.1fr,1.2fr]">
          <div className="space-y-4 p-4 md:p-6">
            <div
              className="inline-flex items-center gap-2 rounded-full bg-emerald-500/10 px-3 py-1 text-[11px] font-medium text-emerald-300 ring-1 ring-emerald-500/30"
            >
              <span className="inline-flex h-1.5 w-1.5 rounded-full bg-emerald-400" />
              Quick project review in 24 hours
            </div>

            <div className="space-y-2">
              <h2 id="exit-popup-title" className="text-lg font-semibold tracking-tight text-white">
                Leaving already? Get a quick estimate before you go.
              </h2>
              <p className="text-xs leading-relaxed text-slate-300">
                Share your project idea, tech stack, or current challenge and we&apos;ll respond within{" "}
                <span className="font-semibold text-emerald-300">24 business hours</span> with next steps or a
                ballpark estimate.
              </p>
            </div>

            <ul className="space-y-1.5 text-[11px] text-slate-300">
              {BULLETS.map((text) => (
                <li key={text} className="flex items-start gap-2">
                  <span
                    className="mt-[3px] inline-flex h-4 w-4 items-center justify-center rounded-full bg-emerald-500/15 text-[9px] text-emerald-300"
                  >
                    ✓
                  </span>
                  <span>{text}</span>
                </li>
              ))}
            </ul>
          </div>

          <ContactFormExitPopup />
        </div>
      </div>
    </div>
  );
}
