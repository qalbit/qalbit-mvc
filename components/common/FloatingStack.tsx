"use client";

import { useEffect, useState } from "react";

export function FloatingStack() {
  const [show, setShow] = useState(false);

  useEffect(() => {
    function onScroll() {
      setShow(window.scrollY > 400);
    }
    onScroll();
    window.addEventListener("scroll", onScroll, { passive: true });
    return () => window.removeEventListener("scroll", onScroll);
  }, []);

  return (
    <div
      className="fixed bottom-6 left-4 z-40 flex flex-col-reverse items-start gap-3"
      aria-label="Floating actions"
      data-floating-stack="bottom-left"
      data-floating-stack-managed="react"
    >
      <button
        type="button"
        className={`group inline-flex h-11 w-11 items-center justify-center rounded-full border border-slate-700 bg-slate-900/80 text-slate-50 shadow-lg backdrop-blur-sm transition duration-200 ease-out hover:bg-slate-800 ${
          show
            ? "pointer-events-auto translate-y-0 opacity-100"
            : "pointer-events-none translate-y-2 opacity-0"
        }`}
        aria-label="Scroll back to top"
        data-scroll-top-trigger
        onClick={() => window.scrollTo({ top: 0, behavior: "smooth" })}
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 24 24"
          aria-hidden="true"
          className="h-5 w-5 transition-transform duration-200 group-hover:-translate-y-0.5"
        >
          <path fill="currentColor" d="M12 4l-7 7h4v7h6v-7h4z" />
        </svg>
      </button>
    </div>
  );
}
