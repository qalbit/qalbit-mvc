import type { OpeningsGridProps } from "@/lib/blocks/types";

export function OpeningsGrid({
  id = "careers-openings",
  title = "Open positions at QalbIT",
  subtitle,
  roles,
  evergreenRoles,
  totalCount,
}: OpeningsGridProps) {
  const count = totalCount ?? roles.length;

  return (
    <section
      id={id}
      className="relative border-t border-slate-100 bg-white py-10 text-slate-900 sm:py-12 lg:py-14"
      data-careers-section="openings"
    >
      <div className="mx-auto max-w-6xl space-y-6 px-4 sm:space-y-7 sm:px-6 lg:px-8">
        <header className="flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
          <div className="max-w-2xl space-y-2">
            <h2 className="text-display-md font-bold tracking-tight sm:text-display-lg md:text-display-xl">
              {title}
            </h2>
            {subtitle && <p className="text-sm text-slate-600">{subtitle}</p>}
          </div>

          <div className="flex flex-col items-start gap-0.5 text-[11px] text-slate-500 sm:items-end">
            <span>
              Currently <span className="font-semibold text-slate-900">{count}</span> open position
              {count === 1 ? "" : "s"}
            </span>
            <span className="text-[11px] text-slate-400">
              We focus on a small number of roles at a time so we can give candidates proper
              attention.
            </span>
          </div>
        </header>

        <div className="space-y-6">
          {roles.length > 0 ? (
            <div
              className="grid gap-4 sm:grid-cols-1 sm:gap-5 lg:grid-cols-2"
              data-careers-el="openings-grid"
            >
              {roles.map((role) => {
                const href = role.href ?? (role.slug ? `/career/apply/?role=${role.slug}` : "#");

                return (
                  <article
                    key={role.slug ?? role.title}
                    className="group flex flex-col rounded-2xl border border-slate-200 bg-slate-50/70 p-4 transition-colors hover:border-sky-300 hover:bg-white sm:p-5"
                    data-careers-el="open-role-card"
                  >
                    <div className="flex items-start justify-between gap-2">
                      <h3 className="text-[15px] font-semibold text-slate-900 sm:text-sm md:text-[15px]">
                        {role.title}
                      </h3>
                      {role.badge && (
                        <span className="inline-flex items-center rounded-full border border-emerald-100 bg-emerald-50 px-2.5 py-0.5 text-[10px] font-semibold text-emerald-700">
                          {role.badge}
                        </span>
                      )}
                    </div>

                    <dl className="mt-2 space-y-1.5 text-[11px] text-slate-600">
                      {role.team && (
                        <div className="flex items-center gap-1.5">
                          <dt className="text-slate-500">Team:</dt>
                          <dd className="font-medium text-slate-700">{role.team}</dd>
                        </div>
                      )}
                      {role.location && (
                        <div className="flex items-center gap-1.5">
                          <dt className="text-slate-500">Location:</dt>
                          <dd className="font-medium text-slate-700">{role.location}</dd>
                        </div>
                      )}
                      {role.experience && (
                        <div className="flex items-center gap-1.5">
                          <dt className="text-slate-500">Experience:</dt>
                          <dd className="font-medium text-slate-700">{role.experience}</dd>
                        </div>
                      )}
                      {role.employmentType && (
                        <div className="flex items-center gap-1.5">
                          <dt className="text-slate-500">Type:</dt>
                          <dd className="font-medium text-slate-700">{role.employmentType}</dd>
                        </div>
                      )}
                    </dl>

                    {role.highlights && role.highlights.length > 0 && (
                      <ul className="mt-3 space-y-1.5 text-[11px] text-slate-600">
                        {role.highlights.slice(0, 3).map((line) => (
                          <li key={line} className="flex gap-1.5">
                            <span className="mt-[6px] h-[3px] w-[3px] flex-none rounded-full bg-slate-400" />
                            <span>{line}</span>
                          </li>
                        ))}
                      </ul>
                    )}

                    <div className="mt-4 flex items-center justify-between text-[11px]">
                      <a
                        href={href}
                        className="inline-flex items-center gap-1 font-semibold text-sky-700 hover:text-sky-600"
                      >
                        View details & apply
                        <span aria-hidden="true">→</span>
                      </a>
                      {role.updatedLabel && (
                        <span className="text-[10px] text-slate-400">{role.updatedLabel}</span>
                      )}
                    </div>
                  </article>
                );
              })}
            </div>
          ) : (
            <div className="rounded-2xl border border-dashed border-slate-200 bg-slate-50/80 px-4 py-6 text-center text-sm text-slate-600 sm:px-5 sm:py-8">
              <p className="mb-1 font-medium text-slate-800">
                We don&apos;t have active openings listed right now.
              </p>
              <p className="mb-3 text-[13px] text-slate-600">
                We are always happy to hear from strong engineers, designers and product-minded
                people. You can still send us your profile for future roles.
              </p>
              <a
                href="/contact-us/?ref=careers-general-application"
                className="inline-flex items-center justify-center rounded-full border border-slate-300 bg-white px-4 py-1.5 text-[12px] font-medium text-slate-800 hover:border-sky-300 hover:text-sky-800"
              >
                Share your profile for future opportunities
              </a>
            </div>
          )}
        </div>

        {evergreenRoles && evergreenRoles.length > 0 && (
          <div className="rounded-2xl border border-amber-100 bg-amber-50/80 px-4 py-4 sm:px-5 sm:py-5">
            <div className="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
              <div className="max-w-xl space-y-1">
                <p className="text-[11px] font-semibold uppercase tracking-[0.16em] text-amber-700">
                  Evergreen roles we&apos;re always open to
                </p>
                <p className="text-[13px] text-amber-900">
                  Even when there&apos;s no active listing, we regularly speak with strong profiles
                  for these roles.
                </p>
              </div>
              <div className="mt-2 grid gap-2 sm:mt-0 sm:grid-cols-2">
                {evergreenRoles.map((role) => (
                  <div
                    key={role.title}
                    className="flex items-center gap-2 rounded-full border border-amber-200 bg-amber-50 px-3 py-1.5 text-[11px] text-amber-900"
                  >
                    <span className="h-1.5 w-1.5 flex-none rounded-full bg-amber-500" />
                    <span className="font-medium">{role.title}</span>
                  </div>
                ))}
              </div>
            </div>
          </div>
        )}
      </div>
    </section>
  );
}
