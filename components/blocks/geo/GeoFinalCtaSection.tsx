import type { GeoFinalCtaSectionProps } from "@/lib/blocks/types";

export function GeoFinalCtaSection({
  id = "location-final-cta",
  stateKey,
  stateLabel,
  eyebrow,
  title,
  body,
  primary,
  secondary,
}: GeoFinalCtaSectionProps) {
  return (
    <section
      id={id}
      className="bg-slate-50 text-slate-900"
      data-location-section="final_cta"
      data-location-key={stateKey ?? undefined}
    >
      <div className="relative mx-auto max-w-6xl space-y-4 px-4 py-16 sm:px-6 md:space-y-10 lg:px-8 lg:py-20">
        <div className="rounded-3xl bg-slate-950 px-6 py-10 text-slate-50 sm:px-10 lg:px-12 lg:py-12">
          <div className="grid gap-8 lg:grid-cols-[minmax(0,1.4fr)_minmax(0,1fr)] lg:items-center">
            <div className="space-y-4" data-location-el="final-cta-text">
              {eyebrow && (
                <p className="text-xs font-semibold uppercase tracking-[0.2em] text-sky-400">{eyebrow}</p>
              )}
              <h2 className="text-2xl font-semibold tracking-tight sm:text-3xl">{title}</h2>
              {body && <p className="text-sm sm:text-base text-slate-200">{body}</p>}
              {stateLabel && (
                <p className="text-xs text-slate-400">
                  We typically respond to {stateLabel} enquiries within one business day.
                </p>
              )}
              <div className="mt-4 flex flex-wrap gap-4" data-location-el="final-cta-buttons">
                <a
                  href={primary.href}
                  className="inline-flex items-center justify-center rounded-full bg-sky-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-sky-700 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-sky-500 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-950"
                >
                  {primary.label}
                </a>
                {secondary && (
                  <a
                    href={secondary.href}
                    className="inline-flex items-center justify-center rounded-full border border-slate-600 px-5 py-2.5 text-sm font-semibold text-slate-50 transition hover:border-sky-400 hover:text-sky-100 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-sky-500 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-950"
                  >
                    {secondary.label}
                  </a>
                )}
              </div>
            </div>

            <div className="space-y-3 text-xs text-slate-300" data-location-el="final-cta-meta">
              <div className="rounded-2xl border border-slate-800 bg-slate-900/60 p-4">
                <p className="font-semibold text-slate-50">What to expect after you contact us</p>
                <ol className="mt-2 list-inside list-decimal space-y-1.5">
                  <li>We review your message and, if needed, ask a few clarifying questions.</li>
                  <li>We propose next steps: a short call, ballpark estimate or small discovery.</li>
                  <li>You decide whether and how you would like to move forward.</li>
                </ol>
              </div>
              <p>
                No spam, no aggressive follow-ups – just an honest conversation about whether QalbIT is
                the right fit for your {stateLabel ?? "next"} project.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
