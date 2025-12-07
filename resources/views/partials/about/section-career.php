<section
    id="about-careers"
    aria-labelledby="about-careers-heading"
    class="bg-slate-50 text-slate-900"
    data-about-section="a12"
>
    <div class="mx-auto max-w-6xl px-4 py-12 sm:px-6 sm:py-16 lg:px-8 lg:py-20">
        <!-- Heading + intro -->
        <header class="max-w-3xl space-y-3">
            <p class="inline-flex items-center gap-2 rounded-full border border-accent-200 bg-accent-50 px-3 py-1 text-xs font-medium text-accent-700">
                <span class="h-1.5 w-1.5 rounded-full bg-accent-500"></span>
                <span>Careers at QalbIT</span>
            </p>

            <h2
                id="about-careers-heading"
                class="text-display-md sm:text-display-lg md:text-display-xl font-bold"
            >
                A place for engineers and designers who care about products.
            </h2>

            <p class="text-sm leading-relaxed text-slate-600 sm:text-base">
                We stay intentionally lean and look for people who enjoy understanding the business problem
                as much as writing code or designing interfaces.
            </p>
        </header>

        <div class="mt-8 grid gap-8 lg:grid-cols-[minmax(0,1.3fr)_minmax(0,0.9fr)] lg:items-start">
            <!-- What it’s like to work here -->
            <div class="space-y-3">
                <p class="text-xs font-medium uppercase tracking-wide text-slate-500">
                    How we think about our team
                </p>
                <ul class="space-y-2 text-sm text-slate-700 sm:text-base">
                    <li class="flex gap-2">
                        <span class="mt-1 h-1.5 w-1.5 flex-shrink-0 rounded-full bg-accent-500"></span>
                        <span>Small, focused teams working closely with clients and real products.</span>
                    </li>
                    <li class="flex gap-2">
                        <span class="mt-1 h-1.5 w-1.5 flex-shrink-0 rounded-full bg-accent-500"></span>
                        <span>Opportunities to work across the stack – from architecture to UX details.</span>
                    </li>
                    <li class="flex gap-2">
                        <span class="mt-1 h-1.5 w-1.5 flex-shrink-0 rounded-full bg-accent-500"></span>
                        <span>Space for learning, experimenting, and growing with guidance from the founder.</span>
                    </li>
                </ul>
            </div>

            <!-- CTA to careers -->
            <div
                class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6"
                data-careers-card
            >
                <p class="text-sm font-semibold text-slate-900">
                    Interested in joining QalbIT?
                </p>
                <p class="mt-2 text-xs leading-relaxed text-slate-600 sm:text-sm">
                    We occasionally open roles for backend, frontend, full-stack, and QA profiles. If you care
                    about product quality and collaboration, we’d like to hear from you.
                </p>

                <div class="mt-4 flex flex-wrap gap-3">
                    <a
                        href="<?= route_url('/career/') ?>"
                        class="inline-flex items-center justify-center rounded-full bg-accent-600 px-4 py-2 text-xs font-semibold text-white shadow-sm transition hover:bg-accent-700 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-accent-600 focus-visible:ring-offset-2 focus-visible:ring-offset-white"
                    >
                        View open roles
                    </a>
                    <a
                        href="mailto:hr@qalbit.com"
                        class="inline-flex items-center justify-center rounded-full border border-slate-300 bg-white px-4 py-2 text-xs font-medium text-slate-900 transition hover:border-slate-400 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-accent-600 focus-visible:ring-offset-2 focus-visible:ring-offset-white"
                    >
                        Share your profile
                    </a>
                </div>

                <p class="mt-3 text-[11px] text-slate-500">
                    We welcome applications from across India. Remote or hybrid options can be discussed based
                    on role and project needs.
                </p>
            </div>
        </div>
    </div>
</section>