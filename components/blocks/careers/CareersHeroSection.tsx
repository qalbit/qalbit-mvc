import type { CareersHeroProps } from "@/lib/blocks/careers-mappers";

export function CareersHeroSection({
  id = "careers-hero",
  eyebrow,
  title,
  subtitle,
  badges,
  primaryCta,
  secondaryCta,
  heroImage,
}: CareersHeroProps) {
  return (
    <section
      id={id}
      className="relative overflow-hidden bg-slate-50 py-8 text-slate-900 sm:py-10 lg:py-12"
      data-careers-section="hero"
    >
      <div className="relative mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <div className="grid gap-8 lg:grid-cols-[minmax(0,3fr)_minmax(0,2.4fr)] lg:items-center">
          <div className="space-y-4" data-careers-el="hero-copy">
            {eyebrow && (
              <p className="inline-flex items-center rounded-full border border-sky-100 bg-sky-50 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.18em] text-sky-700">
                <span className="mr-2 h-1.5 w-1.5 rounded-full bg-sky-400" />
                {eyebrow}
              </p>
            )}

            <h1 className="text-balance text-2xl font-bold leading-tight sm:text-3xl md:text-4xl">
              {title}
            </h1>

            {subtitle && (
              <p className="max-w-xl text-sm leading-relaxed text-slate-600 sm:text-[15px]">
                {subtitle}
              </p>
            )}

            {badges.length > 0 && (
              <div className="flex flex-wrap gap-2 pt-1">
                {badges.map((badge) => (
                  <span
                    key={badge}
                    className="inline-flex items-center rounded-full bg-slate-100 px-3 py-1 text-[11px] font-medium text-slate-700"
                  >
                    {badge}
                  </span>
                ))}
              </div>
            )}

            <div className="flex flex-col items-start gap-3 pt-3 sm:flex-row sm:flex-wrap">
              {primaryCta && (
                <a
                  href={primaryCta.href}
                  className="btn btn-accent btn-radius-pill px-5 py-2.5 text-sm"
                  data-careers-el="hero-primary-cta"
                >
                  {primaryCta.label}
                </a>
              )}
              {secondaryCta && (
                <a
                  href={secondaryCta.href}
                  className="btn btn-primary-outline btn-radius-pill px-5 py-2.5 text-sm"
                  data-careers-el="hero-secondary-cta"
                >
                  {secondaryCta.label}
                </a>
              )}
            </div>

            <p className="pt-1 text-[11px] text-slate-500">
              Share your GitHub, recent projects and the kind of work you want to do – we reply to
              most relevant profiles within{" "}
              <span className="font-semibold">2–4 working days</span>.
            </p>
          </div>

          {heroImage && (
            <div className="relative flex justify-center lg:justify-end" data-careers-el="hero-media">
              <div className="relative w-full max-w-md">
                <div className="absolute -inset-6 rounded-[2.5rem] bg-sky-500/10 blur-2xl" />
                <div className="relative overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-soft">
                  <img
                    src={heroImage.src}
                    alt={heroImage.alt}
                    className="block h-auto w-full object-cover"
                    loading="lazy"
                  />
                </div>
              </div>
            </div>
          )}
        </div>
      </div>
    </section>
  );
}
