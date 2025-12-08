<section
    id="error-500-hero"
    class="relative overflow-hidden bg-slate-50 py-16 sm:py-20 lg:py-24"
    aria-labelledby="error-500-heading"
>
    <div class="container mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-[minmax(0,1.1fr)_minmax(0,0.9fr)] lg:items-center">
            <!-- Left: Message + CTAs -->
            <div class="space-y-8">
                <header class="space-y-4">
                    <span
                        class="inline-flex items-center gap-2 rounded-pill border border-slate-200 bg-primary/5 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-primary shadow-soft ring-1 ring-primary/20"
                    >
                        <span class="inline-flex h-1.5 w-1.5 rounded-full bg-primary"></span>
                        <span>500 – Something went wrong</span>
                    </span>

                    <h1
                        id="error-500-heading"
                        class="text-center text-display-md font-bold text-slate-900 sm:text-display-lg md:text-left md:text-display-2xl"
                    >
                        Our servers hit an
                        <span class="text-gradient-brand-animated">unexpected error.</span>
                    </h1>

                    <p class="max-w-xl text-sm leading-relaxed text-slate-600 sm:text-base">
                        This one is on us. The page you tried to load failed due to an internal error.
                        Our team is automatically notified and will look into it. In the meantime,
                        you can try again or continue browsing the site.
                    </p>
                </header>

                <!-- Primary & secondary actions -->
                <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
                    <button
                        type="button"
                        data-js="reload-page"
                        class="inline-flex items-center justify-center rounded-full bg-primary px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-primary/30 transition hover:bg-primary/90 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2 focus-visible:ring-offset-slate-50"
                    >
                        Try reloading the page
                    </button>

                    <a
                        href="/"
                        class="inline-flex items-center justify-center rounded-full border border-slate-200 bg-white px-6 py-3 text-sm font-semibold text-slate-900 shadow-sm hover:border-primary hover:text-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2 focus-visible:ring-offset-slate-50"
                    >
                        Back to homepage
                    </a>
                </div>

                <!-- Quick links -->
                <div class="space-y-3">
                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">
                        Or jump straight into:
                    </p>
                    <div class="flex flex-wrap gap-2">
                        <a
                            href="/services/"
                            class="inline-flex items-center gap-1 rounded-full border border-slate-200 bg-white px-3 py-1 text-xs font-medium text-slate-800 hover:border-primary hover:text-primary"
                        >
                            Services
                        </a>
                        <a
                            href="/industries/"
                            class="inline-flex items-center gap-1 rounded-full border border-slate-200 bg-white px-3 py-1 text-xs font-medium text-slate-800 hover:border-primary hover:text-primary"
                        >
                            Industries
                        </a>
                        <a
                            href="/about-us/"
                            class="inline-flex items-center gap-1 rounded-full border border-slate-200 bg-white px-3 py-1 text-xs font-medium text-slate-800 hover:border-primary hover:text-primary"
                        >
                            About QalbIT
                        </a>
                        <a
                            href="/contact-us/"
                            class="inline-flex items-center gap-1 rounded-full border border-slate-200 bg-white px-3 py-1 text-xs font-medium text-slate-800 hover:border-primary hover:text-primary"
                        >
                            Contact us
                        </a>
                    </div>
                </div>
            </div>

            <!-- Right: Incident / support card -->
            <div class="lg:pl-4 xl:pl-8">
                <div class="relative overflow-hidden rounded-3xl border border-slate-200 bg-gradient-to-b from-slate-900 via-slate-900 to-slate-950 p-6 sm:p-8 shadow-2xl shadow-slate-900/40">
                    <div class="space-y-4">
                        <p class="text-xs font-semibold uppercase tracking-[0.16em] text-slate-400">
                            QalbIT error monitor
                        </p>
                        <h2 class="text-lg font-semibold text-slate-50">
                            We track and respond to production issues quickly.
                        </h2>
                        <p class="text-sm text-slate-300">
                            Errors like this are logged with request details so our engineering team
                            can investigate. If this blocks your work, share a short note and we will
                            prioritise a fix.
                        </p>

                        <ul class="mt-3 space-y-2 text-xs text-slate-200">
                            <li class="flex gap-2">
                                <span class="mt-1 inline-flex h-1.5 w-1.5 flex-none rounded-full bg-emerald-400"></span>
                                <span>Centralised logging and alerts on critical failures.</span>
                            </li>
                            <li class="flex gap-2">
                                <span class="mt-1 inline-flex h-1.5 w-1.5 flex-none rounded-full bg-emerald-400"></span>
                                <span>Root-cause analysis for repeated errors and regressions.</span>
                            </li>
                            <li class="flex gap-2">
                                <span class="mt-1 inline-flex h-1.5 w-1.5 flex-none rounded-full bg-emerald-400"></span>
                                <span>Transparent communication when an issue impacts clients or users.</span>
                            </li>
                        </ul>

                        <div class="mt-5 flex flex-col gap-2 sm:flex-row sm:items-center">
                            <a
                                href="/contact-us/"
                                class="inline-flex flex-1 items-center justify-center rounded-full bg-primary px-4 py-2.5 text-sm font-semibold text-white shadow-lg shadow-primary/40 transition hover:bg-primary/90 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-sky-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900"
                            >
                                Report this issue
                            </a>
                            <a
                                href="https://calendly.com/abidhusain-qalbit/discuss-project"
                                class="inline-flex flex-1 items-center justify-center rounded-full border border-slate-600 bg-slate-900/40 px-4 py-2.5 text-sm font-semibold text-slate-100 shadow-sm hover:border-slate-400 hover:text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-sky-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900"
                            >
                                Book a call with us
                            </a>
                        </div>
                    </div>

                    <!-- Decorative 500 badge -->
                    <div class="pointer-events-none absolute -top-6 -right-6 hidden h-32 w-32 items-center justify-center rounded-full bg-slate-800/70 text-4xl font-extrabold text-slate-500 ring-2 ring-slate-600/60 sm:flex">
                        500
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
