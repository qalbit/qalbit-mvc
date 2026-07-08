import type { AboutLeaderSectionProps } from "@/lib/blocks/types";
import { asset } from "@/lib/site";

export function AboutLeaderSection({
  id = "about-leadership",
  headingId = "about-leadership-heading",
  eyebrow,
  title,
  intro,
  founder,
  howWeLead,
}: AboutLeaderSectionProps) {
  return (
    <section
      id={id}
      aria-labelledby={headingId}
      className="bg-white text-slate-900"
      data-about-section="a6"
    >
      <div className="mx-auto max-w-6xl px-4 py-12 sm:px-6 sm:py-16 lg:px-8 lg:py-20">
        <header className="max-w-3xl space-y-3">
          <p className="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-slate-50 px-3 py-1 text-xs font-medium text-slate-700">
            <span className="h-1.5 w-1.5 rounded-full bg-accent-500" />
            <span>{eyebrow}</span>
          </p>
          <h2 id={headingId} className="text-display-md font-bold sm:text-display-lg md:text-display-xl">
            {title}
          </h2>
          {intro && <p className="text-sm leading-relaxed text-slate-600 sm:text-base">{intro}</p>}
        </header>

        <div className="mt-8 grid gap-6 lg:grid-cols-[minmax(0,1.4fr)_minmax(0,1fr)] lg:items-start">
          <article
            className="flex flex-col gap-4 rounded-2xl border border-slate-200 bg-slate-50 p-5 shadow-sm sm:flex-row sm:items-center sm:p-6"
            data-leader={founder.key ?? "founder"}
          >
            <div className="flex-shrink-0">
              <div className="h-20 w-20 overflow-hidden rounded-full bg-slate-200">
                <img
                  src={asset(founder.image.replace(/^\//, ""))}
                  alt={founder.imageAlt}
                  className="h-full w-full object-cover"
                  loading="lazy"
                />
              </div>
            </div>
            <div className="space-y-2">
              <div>
                <h3 className="text-base font-semibold text-slate-900">{founder.name}</h3>
                <p className="text-xs font-medium uppercase tracking-wide text-accent-700">{founder.role}</p>
              </div>
              <p className="text-xs leading-relaxed text-slate-600 sm:text-sm">{founder.bio}</p>
              <ul className="mt-2 space-y-1.5 text-xs text-slate-600">
                {founder.bullets.map((bullet) => (
                  <li key={bullet} className="flex items-center gap-2">
                    <span className="h-1 w-1 flex-shrink-0 rounded-full bg-accent-500" />
                    <span>{bullet}</span>
                  </li>
                ))}
              </ul>
            </div>
          </article>

          <aside className="space-y-3 lg:pl-2" aria-label="How leadership works with clients">
            <p className="text-xs font-medium uppercase tracking-wide text-slate-500">{howWeLead.label}</p>
            <ul className="space-y-2 text-xs text-slate-600 sm:text-sm">
              {howWeLead.bullets.map((bullet) => (
                <li key={bullet} className="flex items-center gap-2">
                  <span className="h-1 w-1 flex-shrink-0 rounded-full bg-accent-500" />
                  <span>{bullet}</span>
                </li>
              ))}
            </ul>
          </aside>
        </div>
      </div>
    </section>
  );
}
