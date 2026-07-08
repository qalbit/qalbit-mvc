import Link from "next/link";
import { caseStudies } from "@/lib/data";

export function CaseStudiesIndexSections() {
  const items = caseStudies.filter((cs) => cs.enabled !== false);

  return (
    <section className="py-16">
      <div className="mx-auto max-w-6xl space-y-8 px-4">
        <header className="max-w-3xl space-y-3">
          <p className="text-xs font-semibold uppercase tracking-wide text-slate-500">Case Studies</p>
          <h1 className="text-3xl font-semibold md:text-4xl">Selected Projects & Case Studies</h1>
          <p className="text-sm text-slate-600">
            A sample of projects delivered by QalbIT across SaaS, custom software and digital products.
            These snapshots show how we think about architecture, delivery and long-term maintainability.
          </p>
        </header>

        {items.length > 0 ? (
          <div className="grid gap-6 md:grid-cols-3">
            {items.map((cs) => (
              <article key={cs.slug} className="flex h-full flex-col rounded-xl border bg-white p-5 shadow-sm">
                <div className="flex-1 space-y-2">
                  <h2 className="text-sm font-semibold text-slate-800">
                    <Link href={cs.slug} className="hover:text-slate-900 hover:underline">{cs.name}</Link>
                  </h2>
                  {cs.summary && <p className="text-xs text-slate-600">{cs.summary}</p>}
                  <dl className="mt-2 space-y-1 text-[11px] text-slate-500">
                    {cs.industry && (
                      <div className="flex gap-1">
                        <dt className="font-medium">Industry:</dt>
                        <dd>{cs.industry}</dd>
                      </div>
                    )}
                    {cs.services && Array.isArray(cs.services) && cs.services.length > 0 && (
                      <div className="flex gap-1">
                        <dt className="font-medium">Services:</dt>
                        <dd>{cs.services.join(", ")}</dd>
                      </div>
                    )}
                  </dl>
                </div>
                <div className="mt-4">
                  <Link
                    href={cs.slug}
                    className="inline-flex items-center text-xs font-medium text-slate-900 hover:underline"
                  >
                    View case study
                    <span className="ml-1 text-[10px]">→</span>
                  </Link>
                </div>
              </article>
            ))}
          </div>
        ) : (
          <p className="text-sm text-slate-600">
            We are curating case studies for this section. In the meantime, please{" "}
            <Link href="/contact-us/" className="text-slate-900 underline">contact us</Link> for examples
            relevant to your use case.
          </p>
        )}
      </div>
    </section>
  );
}
