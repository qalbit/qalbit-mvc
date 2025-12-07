<section
    id="about-case-studies"
    aria-labelledby="about-case-studies-heading"
    class="bg-slate-50 text-slate-900"
    data-about-section="a9"
>
    <div class="mx-auto max-w-6xl px-4 py-12 sm:px-6 sm:py-16 lg:px-8 lg:py-20">
        <!-- Heading + intro -->
        <header class="max-w-3xl space-y-3">
            <p class="inline-flex items-center gap-2 rounded-full border border-accent-200 bg-accent-50 px-3 py-1 text-xs font-medium text-accent-700">
                <span class="h-1.5 w-1.5 rounded-full bg-accent-500"></span>
                <span>Case studies</span>
            </p>

            <h2
                id="about-case-studies-heading"
                class="text-xl font-semibold tracking-tight sm:text-2xl lg:text-3xl"
            >
                Selected case studies &amp; product outcomes.
            </h2>

            <p class="text-sm leading-relaxed text-slate-600 sm:text-base">
                A few examples of how QalbIT helps teams ship and scale SaaS and custom software products.
            </p>
        </header>

        <!-- Case study cards -->
        <div
            class="mt-8 grid gap-4 sm:mt-10 sm:grid-cols-2 lg:grid-cols-3"
            data-case-grid-about
        >
            <!-- Case 1 – Snappy Stats -->
            <article
                class="flex flex-col rounded-2xl border border-slate-200 bg-white p-4 text-sm shadow-sm sm:p-5"
                data-case-card-about
            >
                <div class="mb-2 flex items-center justify-between gap-2">
                    <p class="text-[11px] font-medium uppercase tracking-wide text-accent-700">
                        Case Study · Sports & Training
                    </p>
                    <span class="rounded-full flex-shrink-0 bg-accent-50 px-2 py-0.5 text-[11px] font-medium text-accent-700">
                        Scheduling platform
                    </span>
                </div>

                <h3 class="text-sm font-semibold text-slate-900">
                    Snappy Stats – scheduling management web app for a growing shooting academy.
                </h3>

                <p class="mt-2 text-xs leading-relaxed text-slate-600 sm:text-sm">
                    We replaced spreadsheets and manual coordination with a Laravel-based scheduling platform that
                    centralises bookings, coaches and lanes – dramatically reducing double bookings and admin fire-fighting.
                </p>

                <dl class="mt-3 space-y-1.5 text-[11px] text-slate-500">
                    <div class="flex justify-between gap-2">
                        <dt>Type</dt>
                        <dd class="font-medium text-end text-slate-800">Custom scheduling web application</dd>
                    </div>
                    <div class="flex justify-between gap-2">
                        <dt>Outcome</dt>
                        <dd class="font-medium text-end text-slate-800">Single source of truth for classes & lanes</dd>
                    </div>
                </dl>

                <a
                    href="<?= route_url('/case-studies/snappystats/') ?>"
                    class="mt-3 inline-flex items-center text-[11px] font-medium text-accent-700 hover:text-accent-800"
                >
                    View case study
                    <svg
                        class="ml-1 h-3 w-3"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                        aria-hidden="true"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M5.22 4.22a.75.75 0 0 1 1.06 0L13 10.94V7a.75.75 0 0 1 1.5 0v6.25a.75.75 0 0 1-.75.75H7.5a.75.75 0 0 1 0-1.5h3.94L4.22 5.28a.75.75 0 0 1 0-1.06Z"
                            clip-rule="evenodd"
                        />
                    </svg>
                </a>
            </article>

            <!-- Case 2 – Bloomford -->
            <article
                class="flex flex-col rounded-2xl border border-slate-200 bg-white p-4 text-sm shadow-sm sm:p-5"
                data-case-card-about
            >
                <div class="mb-2 flex items-center justify-between gap-2">
                    <p class="text-[11px] flex-shrink-0 font-medium uppercase tracking-wide text-accent-700">
                        Case Study · Recruitment & HR Tech
                    </p>
                    <span class="rounded-full flex-shrink-0 bg-accent-50 px-2 py-0.5 text-[11px] font-medium text-accent-700">
                        Hiring portal
                    </span>
                </div>

                <h3 class="text-sm font-semibold text-slate-900">
                    Bloomford – hiring portal and candidate management platform for HR professionals.
                </h3>

                <p class="mt-2 text-xs leading-relaxed text-slate-600 sm:text-sm">
                    We designed and built a PHP/MySQL recruitment portal that centralises employers, vacancies and candidates,
                    turning scattered CVs and inboxes into one searchable talent pipeline for HR teams in Belgium.
                </p>

                <dl class="mt-3 space-y-1.5 text-[11px] text-slate-500">
                    <div class="flex justify-between gap-2">
                        <dt>Scope</dt>
                        <dd class="font-medium text-end text-slate-800">Recruitment portal & ATS-style workflows</dd>
                    </div>
                    <div class="flex justify-between gap-2">
                        <dt>Outcome</dt>
                        <dd class="font-medium text-end text-slate-800">Structured, searchable candidate pool & pipelines</dd>
                    </div>
                </dl>

                <a
                    href="<?= route_url('/case-studies/bloomford/') ?>"
                    class="mt-3 inline-flex items-center text-[11px] font-medium text-accent-700 hover:text-accent-800"
                >
                    View case study
                    <svg
                        class="ml-1 h-3 w-3"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                        aria-hidden="true"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M5.22 4.22a.75.75 0 0 1 1.06 0L13 10.94V7a.75.75 0 0 1 1.5 0v6.25a.75.75 0 0 1-.75.75H7.5a.75.75 0 0 1 0-1.5h3.94L4.22 5.28a.75.75 0 0 1 0-1.06Z"
                            clip-rule="evenodd"
                        />
                    </svg>
                </a>
            </article>

            <!-- Case 3 – Hellory -->
            <article
                class="flex flex-col rounded-2xl border border-slate-200 bg-white p-4 text-sm shadow-sm sm:p-5"
                data-case-card-about
            >
                <div class="mb-2 flex items-center justify-between gap-2">
                    <p class="text-[11px] font-medium uppercase tracking-wide text-accent-700">
                        Case Study · Mobile & Consumer Apps
                    </p>
                    <span class="rounded-full flex-shrink-0 bg-accent-50 px-2 py-0.5 text-[11px] font-medium text-accent-700">
                        Reminder app
                    </span>
                </div>

                <h3 class="text-sm font-semibold text-slate-900">
                    Hellory – smart reminder app for busy lives on Android &amp; iOS.
                </h3>

                <p class="mt-2 text-xs leading-relaxed text-slate-600 sm:text-sm">
                    We partnered with the Hellory team to build a cross-platform Flutter app and Node.js API that power recurring
                    reminders, templates and reliable notifications for users managing bills, events and daily routines.
                </p>

                <dl class="mt-3 space-y-1.5 text-[11px] text-slate-500">
                    <div class="flex justify-between gap-2">
                        <dt>Focus</dt>
                        <dd class="font-medium text-end text-slate-800">Recurring reminders, templates & push notifications</dd>
                    </div>
                    <div class="flex justify-between gap-2">
                        <dt>Engagement</dt>
                        <dd class="font-medium text-end text-slate-800">Concept → UX → Mobile app + API</dd>
                    </div>
                </dl>

                <a
                    href="<?= route_url('/case-studies/hellory/') ?>"
                    class="mt-3 inline-flex items-center text-[11px] font-medium text-accent-700 hover:text-accent-800"
                >
                    View case study
                    <svg
                        class="ml-1 h-3 w-3"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                        aria-hidden="true"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M5.22 4.22a.75.75 0 0 1 1.06 0L13 10.94V7a.75.75 0 0 1 1.5 0v6.25a.75.75 0 0 1-.75.75H7.5a.75.75 0 0 1 0-1.5h3.94L4.22 5.28a.75.75 0 0 1 0-1.06Z"
                            clip-rule="evenodd"
                        />
                    </svg>
                </a>
            </article>
        </div>


        <div class="mt-6 text-xs text-slate-500 sm:text-sm">
            We can share more detailed case studies, metrics, and references once we understand your product and requirements.
        </div>
    </div>
</section>