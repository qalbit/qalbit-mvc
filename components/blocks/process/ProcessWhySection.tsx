import type { ProcessWhySectionProps } from "@/lib/blocks/types";

export function ProcessWhySection({
  id = "mvp-why",
  title = "Why QalbIT for your Startup MVP",
  intro,
  reasons,
  testimonials,
}: ProcessWhySectionProps) {
  return (
    <section id={id} data-mvp-section="s8" className="bg-slate-900">
      <div className="mx-auto max-w-6xl px-4 py-16 text-slate-100 sm:px-6 lg:px-8 lg:py-20">
        <header className="max-w-3xl space-y-3">
          <h2 className="text-display-md font-bold text-white sm:text-display-lg md:text-display-xl">
            {title}
          </h2>
          {intro && <p className="text-sm text-slate-300 sm:text-base">{intro}</p>}
        </header>

        <div className="mt-10 grid gap-6 md:grid-cols-2">
          {reasons.map((reason) => (
            <article
              key={reason.key ?? reason.label}
              className="flex h-full flex-col rounded-2xl bg-slate-800/80 p-5 text-sm shadow-sm ring-1 ring-slate-700"
              data-mvp-why-card
            >
              <h3 className="text-base font-semibold text-white">{reason.label}</h3>
              {reason.description && <p className="mt-2 text-slate-300">{reason.description}</p>}
              {reason.points && reason.points.length > 0 && (
                <ul className="mt-3 space-y-1 text-xs text-slate-400">
                  {reason.points.map((point) => (
                    <li key={point}>{point}</li>
                  ))}
                </ul>
              )}
            </article>
          ))}
        </div>

        {testimonials && testimonials.length > 0 && (
          <div className="mt-10 grid gap-6 md:grid-cols-3">
            {testimonials.map((testimonial, index) => (
              <figure
                key={`${testimonial.attribution ?? index}`}
                className="flex h-full flex-col justify-between rounded-2xl bg-slate-950/80 p-5 text-sm shadow-sm ring-1 ring-slate-950"
              >
                {testimonial.quote && (
                  <blockquote className="text-slate-300">“{testimonial.quote}”</blockquote>
                )}
                {testimonial.attribution && (
                  <figcaption className="mt-4 text-xs text-slate-400">
                    <p className="font-medium text-slate-100">{testimonial.attribution}</p>
                  </figcaption>
                )}
              </figure>
            ))}
          </div>
        )}
      </div>
    </section>
  );
}
