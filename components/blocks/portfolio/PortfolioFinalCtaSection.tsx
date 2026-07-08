import Link from "next/link";
import type { PortfolioFinalCtaProps } from "@/lib/blocks/portfolio-mappers";

export function PortfolioFinalCtaSection({
  id = "portfolio-cta",
  eyebrow,
  title,
  body,
  primary,
  secondary,
  meta,
}: PortfolioFinalCtaProps) {
  return (
    <section
      id={id}
      className="relative overflow-hidden bg-slate-950 py-14 sm:py-16 lg:py-18"
      data-portfolio-section="cta"
    >
      <div
        className="pointer-events-none absolute inset-x-0 -top-40 h-72 bg-gradient-to-b from-sky-500/15 via-sky-500/0 to-transparent"
        aria-hidden="true"
      />

      <div className="relative mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <div
          className="relative flex flex-col gap-6 rounded-[32px] bg-gradient-to-r from-sky-600 via-sky-500 to-sky-600 px-6 py-7 shadow-[0_30px_80px_rgba(15,23,42,0.7)] sm:px-10 sm:py-9 lg:flex-row lg:items-center lg:justify-between lg:px-12 lg:py-10"
        >
          <div
            className="pointer-events-none absolute inset-0 rounded-[32px] bg-gradient-to-br from-white/10 via-transparent to-sky-900/20 mix-blend-soft-light"
            aria-hidden="true"
          />

          <div className="relative max-w-2xl space-y-3 lg:space-y-4">
            {eyebrow && (
              <p className="text-[11px] font-semibold uppercase tracking-[0.18em] text-sky-100/90">{eyebrow}</p>
            )}
            <h2 className="text-lg font-bold leading-snug text-white sm:text-xl md:text-2xl lg:text-[26px]">
              {title}
            </h2>
            {body && (
              <p className="text-xs leading-relaxed text-sky-50/90 sm:text-sm md:text-[13px]">{body}</p>
            )}
            {meta && <p className="pt-1 text-[11px] text-sky-100/80">{meta}</p>}
          </div>

          <div className="relative flex flex-col items-stretch gap-3 sm:flex-row sm:items-center lg:flex-col lg:items-end lg:gap-3">
            <Link
              href={primary.href}
              aria-label={primary.ariaLabel}
              className="inline-flex items-center justify-center rounded-full bg-white px-5 py-2.5 text-[12px] font-semibold text-sky-700 shadow-sm transition-colors hover:bg-slate-50 hover:text-sky-800"
            >
              {primary.label}
              <span className="ml-1.5 text-xs">↗</span>
            </Link>
            {secondary && (
              <Link
                href={secondary.href}
                aria-label={secondary.ariaLabel}
                className="inline-flex items-center justify-center rounded-full border border-white/70 bg-transparent px-5 py-2.5 text-[12px] font-semibold text-sky-50 transition-colors hover:border-white hover:bg-white/10"
              >
                {secondary.label}
              </Link>
            )}
          </div>
        </div>
      </div>
    </section>
  );
}
