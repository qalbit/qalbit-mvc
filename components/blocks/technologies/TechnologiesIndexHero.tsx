import Link from "next/link";
import { ButtonLink } from "@/components/ui";

export function TechnologiesIndexHero() {
  return (
    <section
      className="relative overflow-hidden bg-slate-50 py-8 text-slate-900 sm:py-20 lg:py-24"
      data-section-technologies
    >
      <div className="relative mx-auto max-w-6xl space-y-4 px-4 sm:px-6 md:space-y-10 lg:px-8">
        <nav className="text-xs font-medium text-slate-600" aria-label="Breadcrumb">
          <ol className="flex flex-wrap items-center gap-1">
            <li>
              <Link href="/" className="transition-colors hover:text-sky-300">Home</Link>
            </li>
            <li className="text-slate-900">/</li>
            <li aria-current="page" className="text-slate-900">Technologies</li>
          </ol>
        </nav>

        <div className="grid gap-10 lg:grid-cols-[minmax(0,3fr)_minmax(0,2fr)] lg:items-center">
          <div className="space-y-6" data-hero-el>
            <span
              className="hidden items-center rounded-pill border border-slate-200 bg-white/90 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-muted-foreground shadow-soft md:inline-flex"
            >
              Technologies
              <span className="ml-2 h-1 w-1 rounded-full bg-sky-400" />
              <span className="ml-2 opacity-80">Web, mobile, SaaS &amp; cloud tech stack</span>
            </span>

            <div className="flex justify-center md:hidden md:justify-start">
              <span
                className="inline-flex items-center rounded-pill border border-slate-200 bg-white/90 px-3 py-1 text-center text-[11px] font-semibold uppercase tracking-[0.14em] text-muted-foreground shadow-soft"
              >
                Web, mobile, SaaS &amp; cloud tech stack
              </span>
            </div>

            <h1 className="text-center text-display-md font-bold sm:text-display-lg md:text-left md:text-display-2xl">
              Technologies we use to build{" "}
              <span className="text-gradient-brand-animated">modern web, mobile &amp; SaaS products</span>.
            </h1>

            <p className="px-0 text-center text-md font-medium text-slate-600 md:px-4 md:text-left lg:px-2">
              From React.js frontends and Node.js / Laravel backends to Flutter apps and WordPress,
              QalbIT focuses on a practical, well-supported tech stack. That means your product is
              easier to scale, maintain and hand over to future teams.
            </p>

            <div className="flex flex-col items-center gap-2 md:items-start">
              <div className="flex w-full flex-col items-stretch gap-3 md:flex-row md:flex-wrap md:items-center">
                <ButtonLink href="/contact-us/" variant="dark">Discuss your tech stack</ButtonLink>
                <ButtonLink
                  href="https://calendly.com/abidhusain-qalbit/discuss-project"
                  variant="primary-outline"
                  external
                >
                  Book a 30-min tech stack call
                </ButtonLink>
              </div>
              <p className="text-[11px] text-slate-600">
                Typically responding within <span className="font-semibold">24–48 hours</span>.
                Share your current stack, challenges and timelines.
              </p>
            </div>
          </div>

          <div
            className="space-y-4 rounded-3xl border border-slate-300 bg-slate-100/70 p-5 backdrop-blur sm:p-6 lg:p-7"
            data-hero-el
          >
            <h2 className="text-xs font-semibold uppercase tracking-[0.18em] text-slate-600">
              Tech stack snapshot
            </h2>
            <dl className="grid grid-cols-2 gap-x-6 gap-y-4 text-xs sm:text-sm">
              <div className="space-y-1">
                <dt className="text-slate-500">Core focus</dt>
                <dd className="font-medium text-slate-900">Custom web, mobile &amp; SaaS products</dd>
              </div>
              <div className="space-y-1">
                <dt className="text-slate-500">Frontend</dt>
                <dd className="font-medium text-slate-900">React.js &amp; modern JavaScript</dd>
              </div>
              <div className="space-y-1">
                <dt className="text-slate-500">Backend &amp; APIs</dt>
                <dd className="font-medium text-slate-900">Node.js, Nest.js, Laravel</dd>
              </div>
              <div className="space-y-1">
                <dt className="text-slate-500">Mobile &amp; CMS</dt>
                <dd className="font-medium text-slate-900">Flutter, WordPress, headless CMS</dd>
              </div>
            </dl>
            <p className="text-[11px] text-slate-500">
              We start by reviewing your goals, constraints and any existing systems, then recommend
              a practical, future-proof tech stack rather than forcing a one-size-fits-all choice.
            </p>
          </div>
        </div>
      </div>
    </section>
  );
}
