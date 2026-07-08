import Link from "next/link";
import { getSitemapGroups } from "@/lib/data/sitemap-groups";
import { normalizePath } from "@/lib/site";

function normalizeHref(href: string): string {
  if (href.startsWith("http") || href.startsWith("#") || href.includes("?")) {
    return href;
  }
  return normalizePath(href);
}

function isCurrentPath(currentPath: string, href: string): boolean {
  if (href.startsWith("http") || href.startsWith("#") || href.includes("?")) {
    return false;
  }
  return normalizeHref(href) === normalizePath(currentPath);
}

export function SitemapContent({ currentPath = "/sitemap/" }: { currentPath?: string }) {
  const groups = getSitemapGroups();

  return (
    <section className="bg-white py-10 sm:py-14 lg:py-16">
      <div className="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <header className="mb-8 sm:mb-10">
          <nav className="mb-3 text-xs font-medium text-slate-500" aria-label="Breadcrumb">
            <ol className="flex flex-wrap items-center gap-1">
              <li>
                <Link href="/" className="transition-colors hover:text-sky-600">Home</Link>
              </li>
              <li className="text-slate-400">/</li>
              <li aria-current="page" className="text-slate-900">Sitemap</li>
            </ol>
          </nav>

          <h1 className="text-xl font-semibold tracking-tight text-slate-900 sm:text-2xl md:text-[26px]">
            Our Sitemap
          </h1>
          <p className="mt-2 max-w-2xl text-sm text-slate-600">
            Quick overview of all key pages on QalbIT – services, industries, technologies,
            portfolio, careers, insights and legal information.
          </p>
        </header>

        <div className="space-y-8 sm:space-y-10 lg:space-y-12">
          {groups.map((group) => (
            <section key={group.title} className="border-t border-slate-100 pt-6 sm:pt-7">
              <div className="flex flex-col gap-2 sm:flex-row sm:items-baseline sm:justify-between">
                <div>
                  <h2 className="text-xs font-semibold uppercase tracking-[0.16em] text-sky-700">
                    {group.title}
                  </h2>
                  {group.description && (
                    <p className="mt-1 max-w-xl text-[13px] text-slate-600">{group.description}</p>
                  )}
                </div>
              </div>

              <div className="mt-4 grid gap-6 text-sm sm:grid-cols-2 lg:grid-cols-3">
                {group.columns.map((column, columnIndex) => (
                  <ul key={columnIndex} className="space-y-1.5">
                    {column.map((link) => {
                      const current = isCurrentPath(currentPath, link.href);
                      return (
                        <li key={`${link.href}-${link.label}`}>
                          {current ? (
                            <span
                              className="inline-flex items-center text-[13px] font-semibold text-slate-900"
                              aria-current="page"
                            >
                              <span className="mr-2 h-[3px] w-[3px] rounded-full bg-sky-600" />
                              <span>{link.label}</span>
                            </span>
                          ) : link.href.startsWith("http") ? (
                            <a
                              href={link.href}
                              className="inline-flex items-center text-[13px] text-slate-700 transition-colors hover:text-sky-600"
                              target="_blank"
                              rel="noopener noreferrer"
                            >
                              <span className="mr-2 h-[3px] w-[3px] rounded-full bg-slate-300" />
                              <span>{link.label}</span>
                            </a>
                          ) : (
                            <Link
                              href={link.href}
                              className="inline-flex items-center text-[13px] text-slate-700 transition-colors hover:text-sky-600"
                            >
                              <span className="mr-2 h-[3px] w-[3px] rounded-full bg-slate-300" />
                              <span>{link.label}</span>
                            </Link>
                          )}
                        </li>
                      );
                    })}
                  </ul>
                ))}
              </div>
            </section>
          ))}
        </div>

        <section className="mt-10 rounded-2xl border border-slate-200 bg-gradient-to-br from-white to-slate-50 p-6 sm:mt-12 sm:p-8">
          <div className="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
              <p className="text-xs font-semibold uppercase tracking-[0.16em] text-sky-700">
                Ready to discuss your project?
              </p>
              <h2 className="mt-2 text-lg font-semibold tracking-tight text-slate-900 sm:text-xl">
                Get a project estimate in 24–48 hours
              </h2>
              <p className="mt-1 max-w-2xl text-sm text-slate-600">
                Share your requirements and we&apos;ll respond with a realistic plan, timeline,
                and cost range.
              </p>
            </div>

            <div className="flex flex-col gap-3 sm:flex-row sm:items-center">
              <Link
                href="/contact-us/"
                className="inline-flex items-center justify-center rounded-full bg-sky-600 px-5 py-2.5 text-sm font-semibold text-white transition-colors hover:bg-sky-700"
              >
                Get a project estimate
              </Link>
              <Link
                href="/portfolio/"
                className="inline-flex items-center justify-center rounded-full border border-slate-300 bg-white px-5 py-2.5 text-sm font-semibold text-slate-900 transition-colors hover:border-slate-400"
              >
                View case studies
              </Link>
            </div>
          </div>
        </section>
      </div>
    </section>
  );
}
