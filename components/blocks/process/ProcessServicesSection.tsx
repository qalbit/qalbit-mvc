import type { ProcessServicesProps } from "@/lib/blocks/process-mappers";

export function ProcessServicesSection({
  id = "mvp-services",
  eyebrow,
  title,
  intro,
  items,
  note,
}: ProcessServicesProps) {
  return (
    <section id={id} data-mvp-section="s3" className="bg-slate-50">
      <div className="mx-auto max-w-6xl px-4 py-16 sm:px-6 lg:px-8 lg:py-20">
        <header className="max-w-3xl space-y-3">
          {eyebrow && (
            <p className="text-xs font-medium uppercase tracking-wide text-primary">{eyebrow}</p>
          )}
          <h2 className="text-display-md font-bold text-slate-900 sm:text-display-lg md:text-display-xl">
            {title}
          </h2>
          {intro && <p className="text-sm text-slate-600 sm:text-base">{intro}</p>}
        </header>

        <div className="mt-10 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
          {items.map((item) => (
            <article
              key={item.key ?? item.label}
              className="flex h-full flex-col rounded-2xl bg-white p-6 text-sm text-slate-600 shadow-sm ring-1 ring-slate-100"
              data-mvp-service-card
            >
              <h3 className="text-base font-semibold text-slate-900">{item.label}</h3>
                    {item.description && <p className="mt-2">{item.description}</p>}
                    {item.models && item.models.length > 0 && (
                      <div className="mt-3 flex flex-wrap gap-1.5 text-[11px]">
                        {item.models.map((model) => (
                          <span
                            key={model}
                            className="rounded-full bg-accent-200 px-2 py-0.5 text-slate-800 ring-1 ring-slate-200"
                          >
                            {model.replace(/&amp;/g, "&")}
                          </span>
                        ))}
                      </div>
                    )}
                    {item.note && <p className="mt-3 text-xs text-slate-500">{item.note}</p>}
              {item.linkLabel && item.linkHref && (
                <a
                  href={item.linkHref}
                  className="mt-4 inline-flex text-xs font-medium text-primary hover:underline"
                >
                  {item.linkLabel}
                </a>
              )}
            </article>
          ))}
        </div>

        {note && <p className="mt-8 max-w-3xl text-sm text-slate-500">{note}</p>}
      </div>
    </section>
  );
}
