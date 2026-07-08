import type { ProcessTechProps } from "@/lib/blocks/process-mappers";

export function ProcessTechSection({
  id = "mvp-tech",
  title = "Tech stack & delivery capabilities",
  intro,
  categories,
  note,
}: ProcessTechProps) {
  return (
    <section id={id} data-mvp-section="s7" className="bg-white">
      <div className="mx-auto max-w-6xl px-4 py-16 sm:px-6 lg:px-8 lg:py-20">
        <header className="max-w-3xl space-y-3">
          <h2 className="text-display-md font-bold text-slate-900 sm:text-display-lg md:text-display-xl">
            {title}
          </h2>
          {intro && <p className="text-sm text-slate-600 sm:text-base">{intro}</p>}
        </header>

        <div className="mt-8 grid gap-6 md:grid-cols-2 lg:mt-10 lg:grid-cols-4">
          {categories.map((category) => (
            <div
              key={category.key ?? category.label}
              className="flex h-full flex-col rounded-2xl bg-slate-50 p-5 text-sm shadow-sm ring-1 ring-slate-100"
              data-mvp-tech-item={category.key ?? category.label}
            >
              <h3 className="text-sm font-semibold text-slate-900">{category.label}</h3>
              {category.description && (
                <p className="mt-2 text-xs text-slate-600">{category.description}</p>
              )}
              {category.items && category.items.length > 0 && (
                <div className="mt-3 flex flex-wrap gap-2 text-[11px]">
                  {category.items.map((item) => (
                    <span
                      key={item}
                      className="rounded-full bg-accent-200 px-1.5 py-1 text-slate-800 ring-1 ring-slate-200"
                    >
                      {item}
                    </span>
                  ))}
                </div>
              )}
            </div>
          ))}
        </div>

        {note && (
          <p className="mt-6 max-w-3xl text-sm text-slate-500">
            {note}
            <a href="/technologies/" className="font-medium text-accent-600 hover:underline">
              Technology stack
            </a>
            <span className="text-slate-400"> · </span>
            <a href="/services/" className="font-medium text-accent-600 hover:underline">Services</a>
          </p>
        )}
      </div>
    </section>
  );
}
