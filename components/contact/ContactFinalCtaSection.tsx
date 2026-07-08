import type { ContactFinalCtaSectionProps } from "@/lib/blocks/types";

export function ContactFinalCtaSection({ title, body, primary, email }: ContactFinalCtaSectionProps) {
  return (
    <section id="contact-final-cta" data-contact-section="c6" className="bg-slate-950 py-10 sm:py-12">
      <div className="container mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <div
          className="relative overflow-hidden rounded-2xl border border-slate-800 bg-gradient-to-r from-sky-500/15 via-slate-900 to-slate-900 px-5 py-6 shadow-lg shadow-slate-950/40 sm:px-8 sm:py-7"
          data-final-cta
        >
          <div className="pointer-events-none absolute inset-y-0 right-0">
            <div className="h-full w-32 translate-x-8 bg-gradient-to-l from-sky-500/20 to-transparent opacity-70 blur-2xl" />
          </div>

          <div className="relative flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div className="space-y-1.5">
              <h2 className="text-base font-semibold tracking-tight text-white sm:text-lg">{title}</h2>
              <p className="max-w-xl text-xs text-slate-200 sm:text-sm">{body}</p>
            </div>

            <div className="flex flex-col items-start gap-2 text-xs sm:items-end sm:text-sm">
              <a
                href={primary.href}
                className="inline-flex items-center justify-center rounded-lg bg-sky-500 px-4 py-2 text-sm font-semibold text-slate-950 shadow-md shadow-sky-500/30 transition hover:bg-sky-400 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-sky-300 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-950"
                target={primary.external ? "_blank" : undefined}
                rel={primary.external ? "noopener noreferrer" : undefined}
                aria-label={primary.ariaLabel}
              >
                {primary.label}
              </a>
              {email && (
                <p className="text-[11px] text-slate-200">
                  Prefer email?{" "}
                  <a
                    href={`mailto:${email}`}
                    className="font-medium text-sky-200 underline underline-offset-4 hover:text-sky-100"
                  >
                    {email}
                  </a>
                </p>
              )}
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
