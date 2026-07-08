import Link from "next/link";
import { HtmlText } from "@/components/ui";
import type { PortfolioHeroProps } from "@/lib/blocks/portfolio-mappers";

export function PortfolioIndexHero(props: PortfolioHeroProps) {
  const { eyebrow, title, subtitle, primaryCta, secondaryCta } = props;

  return (
    <section
      id="portfolio-hero"
      className="relative overflow-hidden bg-slate-50 py-4 text-slate-900 sm:py-5 lg:py-6"
      data-portfolio-section="hero"
    >
      <div className="relative mx-auto max-w-6xl space-y-3 px-4 sm:px-6 md:space-y-4 lg:px-8">
        <nav className="text-[11px] font-medium text-slate-600" aria-label="Breadcrumb">
          <ol className="flex flex-wrap items-center gap-1">
            <li>
              <Link href="/" className="transition-colors hover:text-sky-500">Home</Link>
            </li>
            <li className="text-slate-400">/</li>
            <li aria-current="page" className="text-slate-900">Portfolio</li>
          </ol>
        </nav>

        <div className="grid gap-4 lg:grid-cols-[minmax(0,3fr)_minmax(0,2fr)] lg:items-start">
          <div className="space-y-3" data-portfolio-el="hero-copy">
            {eyebrow && (
              <span
                className="inline-flex items-center rounded-full border border-slate-200 bg-white/90 px-2.5 py-0.5 text-[10px] font-semibold uppercase tracking-[0.16em] text-slate-600"
              >
                {eyebrow}
              </span>
            )}

            <h1 className="text-balance text-xl font-bold leading-snug sm:text-2xl md:text-4xl">
              <HtmlText html={title} />
            </h1>

            {subtitle && (
              <p className="max-w-2xl text-xs leading-relaxed text-slate-600 sm:text-[13px]">{subtitle}</p>
            )}

            <div className="flex flex-col items-start gap-2">
              <div className="flex flex-col items-stretch gap-2.5 sm:flex-row sm:flex-wrap sm:items-center">
                <Link
                  href={primaryCta.href}
                  className="btn btn-accent btn-radius-pill px-4 py-2 text-xs sm:text-[13px]"
                  data-portfolio-el="hero-primary-cta"
                >
                  {primaryCta.label}
                </Link>
                <a
                  href={secondaryCta.href}
                  className="btn btn-primary-outline btn-radius-pill px-4 py-2 text-xs sm:text-[13px]"
                  data-portfolio-el="hero-secondary-cta"
                  {...(secondaryCta.external
                    ? { target: "_blank", rel: "noopener noreferrer" }
                    : {})}
                >
                  {secondaryCta.label}
                </a>
              </div>
              <p className="text-[10px] text-slate-600 sm:text-[11px]">
                Share your industry, current product stage and tech stack – we&apos;ll respond with relevant
                examples and a practical way to move forward.
              </p>
            </div>
          </div>

          <aside
            className="space-y-3 rounded-2xl border border-slate-200 bg-white/80 p-3.5 text-[11px] shadow-soft backdrop-blur sm:p-4 sm:text-xs lg:p-4"
            data-portfolio-el="hero-aside"
          >
            <h2 className="text-[10px] font-semibold uppercase tracking-[0.16em] text-slate-600">
              Portfolio snapshot
            </h2>
            <p className="text-[11px] leading-relaxed text-slate-600 sm:text-xs">
              From scheduling platforms and HR tech portals to ISP systems and consumer apps, we focus on building
              production-ready software for long-term teams.
            </p>
            <dl className="grid grid-cols-2 gap-x-3 gap-y-2">
              <div className="space-y-0.5">
                <dt className="text-[10px] text-slate-500">Typical work</dt>
                <dd className="text-xs font-medium text-slate-900">SaaS products, booking platforms, internal tools</dd>
              </div>
              <div className="space-y-0.5">
                <dt className="text-[10px] text-slate-500">Engagements</dt>
                <dd className="text-xs font-medium text-slate-900">MVP builds, rebuilds, product teams</dd>
              </div>
              <div className="space-y-0.5">
                <dt className="text-[10px] text-slate-500">Tech stacks</dt>
                <dd className="text-xs font-medium text-slate-900">Laravel, Node.js, React / Next.js, Flutter</dd>
              </div>
              <div className="space-y-0.5">
                <dt className="text-[10px] text-slate-500">Collaboration</dt>
                <dd className="text-xs font-medium text-slate-900">Remote-first, transparent, product-focused</dd>
              </div>
            </dl>
            <p className="text-[10px] leading-relaxed text-slate-500">
              Looking for something specific? Use the filters below or{" "}
              <Link
                href="/contact-us/?ref=portfolio-hero-shortlist"
                className="font-medium text-sky-600 hover:text-sky-500"
              >
                tell us what you&apos;re building
              </Link>
              and we&apos;ll shortlist the most relevant examples.
            </p>
          </aside>
        </div>
      </div>
    </section>
  );
}
