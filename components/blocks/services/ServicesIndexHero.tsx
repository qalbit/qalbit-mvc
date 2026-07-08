import Link from "next/link";
import { ButtonLink } from "@/components/ui";

export function ServicesIndexHero() {
  return (
    <section
      className="relative overflow-hidden bg-slate-50 py-8 text-slate-900 sm:py-20 lg:py-24"
      data-section-services
    >
      <div className="relative mx-auto max-w-6xl space-y-4 px-4 sm:px-6 md:space-y-10 lg:px-8">
        <nav className="text-xs font-medium text-slate-600" aria-label="Breadcrumb">
          <ol className="flex flex-wrap items-center gap-1">
            <li>
              <Link href="/" className="transition-colors hover:text-sky-300">Home</Link>
            </li>
            <li className="text-slate-900">/</li>
            <li aria-current="page" className="text-slate-900">Services</li>
          </ol>
        </nav>

        <div className="grid gap-10 lg:grid-cols-[minmax(0,3fr)_minmax(0,2fr)] lg:items-center">
          <div className="space-y-6" data-hero-el>
            <span
              className="hidden items-center rounded-pill border border-slate-200 bg-white/90 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-muted-foreground shadow-soft md:inline-flex"
            >
              Services
              <span className="ml-2 h-1 w-1 rounded-full bg-sky-400" />
              <span className="ml-2 opacity-80">Custom software, web, mobile, SaaS &amp; AI</span>
            </span>

            <div className="flex justify-center md:hidden md:justify-start">
              <span
                className="inline-flex items-center rounded-pill border border-slate-200 bg-white/90 px-3 py-1 text-center text-[11px] font-semibold uppercase tracking-[0.14em] text-muted-foreground shadow-soft"
              >
                Custom software, web, mobile, SaaS &amp; AI
              </span>
            </div>

            <h1 className="text-center text-display-md font-bold sm:text-display-lg md:text-left md:text-display-2xl">
              Custom Software Development Services for{" "}
              <span className="text-gradient-brand-animated">Web, Mobile &amp; Cloud</span>.
            </h1>

            <p className="px-0 text-center text-md font-medium text-slate-600 md:px-4 md:text-left lg:px-2">
              QalbIT helps you plan, design, build and maintain secure, scalable software across web,
              mobile, SaaS, APIs, cloud and AI. Explore our core and specialised services tailored for
              startups and modern businesses.
            </p>

            <div className="flex flex-col items-center gap-2 md:items-start">
              <div className="flex w-full flex-col items-stretch gap-3 md:flex-row md:flex-wrap md:items-center">
                <ButtonLink href="/contact-us/" variant="dark">Book a free consultation</ButtonLink>
                <ButtonLink
                  href="https://calendly.com/abidhusain-qalbit/discuss-project"
                  variant="primary-outline"
                  external
                >
                  Schedule a discovery call
                </ButtonLink>
              </div>
              <p className="text-[11px] text-slate-600">
                Typically responding within <span className="font-semibold">24–48 hours</span>.
              </p>
            </div>
          </div>

          <div
            className="space-y-4 rounded-3xl border border-slate-300 bg-slate-100/70 p-5 backdrop-blur sm:p-6 lg:p-7"
            data-hero-el
          >
            <h2 className="text-xs font-semibold uppercase tracking-[0.18em] text-slate-600">Snapshot</h2>
            <dl className="grid grid-cols-2 gap-x-6 gap-y-4 text-xs sm:text-sm">
              <div className="space-y-1">
                <dt className="text-slate-500">Core focus</dt>
                <dd className="font-medium text-slate-900">Custom software &amp; SaaS</dd>
              </div>
              <div className="space-y-1">
                <dt className="text-slate-500">Engagements</dt>
                <dd className="font-medium text-slate-900">Fixed scope, retainers, T&amp;M</dd>
              </div>
              <div className="space-y-1">
                <dt className="text-slate-500">Typical starting budget</dt>
                <dd className="font-semibold text-accent-800">Mid 4-figure to low 5-figure USD</dd>
              </div>
              <div className="space-y-1">
                <dt className="text-slate-500">Delivery model</dt>
                <dd className="font-medium text-slate-900">Founder-led, senior engineers</dd>
              </div>
            </dl>
            <p className="text-[11px] text-slate-500">
              Every engagement starts with a short discovery call to understand your goals, constraints
              and existing stack, so we can propose the right approach.
            </p>
          </div>
        </div>
      </div>
    </section>
  );
}
