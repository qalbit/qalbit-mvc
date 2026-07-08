import Link from "next/link";
import { hireRoles } from "@/lib/data";

/** Hire developers index — mirrors pages/hire/index.php */
export function HireIndexSection() {
  return (
    <section className="py-16">
      <div className="mx-auto max-w-6xl space-y-8 px-4">
        <header className="max-w-3xl space-y-3">
          <p className="text-xs font-semibold uppercase tracking-wide text-slate-500">Hire Developers</p>
          <h1 className="text-3xl font-semibold md:text-4xl">Hire Dedicated Developers from QalbIT</h1>
          <p className="text-slate-600">
            Extend your team with dedicated backend and full-stack engineers who understand product, delivery and
            long-term maintainability. Start with a single developer or a small focused team.
          </p>
        </header>

        {hireRoles.length > 0 ? (
          <div className="grid gap-6 md:grid-cols-2">
            {hireRoles.map((role) => {
              const href = role.slug.endsWith("/") ? role.slug : `${role.slug}/`;
              return (
                <article key={role.slug} className="flex h-full flex-col rounded-xl border bg-white p-5 shadow-sm">
                  <div className="flex-1 space-y-2">
                    <h2 className="text-sm font-semibold text-slate-800">
                      <Link href={href} className="hover:text-slate-900 hover:underline">
                        {role.name}
                      </Link>
                    </h2>
                    {role.short_description && (
                      <p className="text-xs text-slate-600">{role.short_description}</p>
                    )}
                  </div>
                  <div className="mt-4 flex items-center justify-between text-xs">
                    <Link
                      href={href}
                      className="inline-flex items-center font-medium text-slate-900 hover:underline"
                    >
                      View profile
                      <span className="ml-1 text-[10px]">→</span>
                    </Link>
                  </div>
                </article>
              );
            })}
          </div>
        ) : (
          <p className="text-sm text-slate-600">
            We are updating our dedicated developer offerings. In the meantime, please{" "}
            <Link href="/contact-us/" className="text-slate-900 underline">contact us</Link> with your tech stack and
            hiring needs.
          </p>
        )}
      </div>
    </section>
  );
}
