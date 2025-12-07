<section
    id="contact-proof"
    data-contact-section="c3"
    class="bg-white py-14 sm:py-16 lg:py-20 border-t border-slate-900"
>
    <div class="container mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 space-y-10">
        <!-- Heading -->
        <header class="max-w-3xl space-y-3">
            <h2 class="text-display-md sm:text-display-lg md:text-display-xl font-bold text-slate-900">
                Teams trust QalbIT to ship reliable SaaS and custom software
            </h2>
            <p class="text-sm sm:text-base text-slate-600">
                From early-stage startups to growing product teams, we help design, build and scale
                <span class="font-medium text-slate-900">production-grade web, mobile and SaaS platforms</span>.
                Here are a few examples of the kind of outcomes we focus on.
            </p>
        </header>

        <div class="grid gap-10 grid-cols-1">
            <!-- Logo grid -->
            <div class="space-y-4">
                <h3 class="text-xs font-semibold tracking-wide text-slate-900 uppercase">
                    Product and business teams we have worked with
                </h3>

                <div
                    class="grid gap-3 grid-cols-2 sm:grid-cols-3 md:grid-cols-6"
                    data-contact-logo-grid
                    aria-label="Selected client and product logos"
                >
                    <?php foreach ($clients as $client): ?>
                        <?php
                            $name = $client['name'] ?? '';
                            $logo = $client['logo'] ?? '';
                            $alt  = $client['alt']  ?? $name;
                            $url  = $client['url']  ?? null;
                        ?>
                        <div
                            class="flex items-center justify-center rounded-lg border border-slate-200 bg-white/80 px-2 py-2 shadow-sm shadow-slate-950/5"
                            data-contact-logo
                        >
                            <?php if (!empty($url)): ?>
                                <a
                                    href="<?= htmlspecialchars($url, ENT_QUOTES); ?>"
                                    target="_blank"
                                    rel="noopener"
                                    class="inline-flex items-center justify-center"
                                >
                            <?php endif; ?>

                                <img
                                    src="<?= asset(htmlspecialchars($logo, ENT_QUOTES)); ?>"
                                    alt="<?= htmlspecialchars($alt, ENT_QUOTES); ?>"
                                    loading="lazy"
                                    class="max-h-8 w-auto object-contain"
                                />
                                <span class="sr-only"><?= htmlspecialchars($name, ENT_QUOTES); ?></span>

                            <?php if (!empty($url)): ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>

                <p class="text-[11px] text-slate-600">
                    Looking for something similar? Share a short brief on the contact form and we can share
                    relevant case studies, architecture and implementation details under NDA.
                </p>
            </div>

            <!-- Micro outcome cards -->
            <div class="space-y-4">
                <h3 class="text-xs font-semibold tracking-wide text-slate-900 uppercase">
                    Snapshot outcomes from recent projects
                </h3>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                    <!-- Card 1 – Snappy Stats -->
                    <article
                        class="group relative overflow-hidden rounded-2xl border border-slate-200 bg-white p-4 shadow-sm shadow-slate-100 transition-transform transition-shadow hover:-translate-y-1 hover:border-primary-500/80 hover:shadow-md hover:shadow-primary-100 focus-within:ring-2 focus-within:ring-primary-500/70 focus-within:ring-offset-2 focus-within:ring-offset-slate-50"
                        data-proof-card
                    >
                        <div
                            class="pointer-events-none absolute inset-x-0 -top-px h-px bg-gradient-to-r from-transparent via-primary-300/80 to-transparent"
                            aria-hidden="true"
                        ></div>

                        <p class="inline-flex items-center rounded-full bg-primary-50 px-2.5 py-0.5 text-[11px] font-medium text-primary-700">
                            Sports &amp; Club Management
                        </p>

                        <h4 class="mt-2 text-sm font-semibold text-slate-950">
                            Snappy Stats – events, members &amp; club management for shooting ranges
                        </h4>
                        <p class="mt-2 text-xs sm:text-sm text-slate-600">
                            QalbIT built a club management web app that centralises bookings, events, lanes and
                            instructors for a European shooting academy.
                        </p>
                        <p class="mt-1 text-[11px] text-slate-500">
                            Result: smoother operations, clearer occupancy visibility and a better experience for staff and members.
                        </p>
                        <a
                            href="<?= route_url('/case-studies/snappy-stats/') ?>"
                            class="mt-3 inline-flex items-center text-[11px] font-medium text-primary-700 underline underline-offset-4 hover:text-primary-900"
                        >
                            View Snappy Stats case study
                            <svg
                                class="ml-1 h-3 w-3"
                                viewBox="0 0 16 16"
                                aria-hidden="true"
                            >
                                <path
                                    d="M5.25 3.5h7.25m0 0v7.25m0-7.25L5 11.25"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.4"
                                />
                            </svg>
                        </a>
                    </article>

                    <!-- Card 2 – Bloomford -->
                    <article
                        class="group relative overflow-hidden rounded-2xl border border-slate-200 bg-white p-4 shadow-sm shadow-slate-100 transition-transform transition-shadow hover:-translate-y-1 hover:border-primary-500/80 hover:shadow-md hover:shadow-primary-100 focus-within:ring-2 focus-within:ring-primary-500/70 focus-within:ring-offset-2 focus-within:ring-offset-slate-50"
                        data-proof-card
                    >
                        <div
                            class="pointer-events-none absolute inset-x-0 -top-px h-px bg-gradient-to-r from-transparent via-primary-300/80 to-transparent"
                            aria-hidden="true"
                        ></div>

                        <p class="inline-flex items-center rounded-full bg-primary-50 px-2.5 py-0.5 text-[11px] font-medium text-primary-700">
                            HR Tech &amp; Recruitment
                        </p>

                        <h4 class="mt-2 text-sm font-semibold text-slate-950">
                            Bloomford – hiring portal &amp; lightweight ATS for executive search
                        </h4>
                        <p class="mt-2 text-xs sm:text-sm text-slate-600">
                            Recruitment portal that centralises vacancies, candidates, video interviews and test
                            assessments so consultants manage everything in one place.
                        </p>
                        <p class="mt-1 text-[11px] text-slate-500">
                            Result: less time in email and spreadsheets, faster shortlisting and clearer candidate progress.
                        </p>
                        <a
                            href="<?= route_url('/case-studies/bloomford/') ?>"
                            class="mt-3 inline-flex items-center text-[11px] font-medium text-primary-700 underline underline-offset-4 hover:text-primary-900"
                        >
                            View Bloomford case study
                            <svg
                                class="ml-1 h-3 w-3"
                                viewBox="0 0 16 16"
                                aria-hidden="true"
                            >
                                <path
                                    d="M5.25 3.5h7.25m0 0v7.25m0-7.25L5 11.25"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.4"
                                />
                            </svg>
                        </a>
                    </article>

                    <!-- Card 3 – Hellory -->
                    <article
                        class="group relative overflow-hidden rounded-2xl border border-slate-200 bg-white p-4 shadow-sm shadow-slate-100 transition-transform transition-shadow hover:-translate-y-1 hover:border-primary-500/80 hover:shadow-md hover:shadow-primary-100 focus-within:ring-2 focus-within:ring-primary-500/70 focus-within:ring-offset-2 focus-within:ring-offset-slate-50"
                        data-proof-card
                    >
                        <div
                            class="pointer-events-none absolute inset-x-0 -top-px h-px bg-gradient-to-r from-transparent via-primary-300/80 to-transparent"
                            aria-hidden="true"
                        ></div>

                        <p class="inline-flex items-center rounded-full bg-primary-50 px-2.5 py-0.5 text-[11px] font-medium text-primary-700">
                            Productivity &amp; Communication
                        </p>

                        <h4 class="mt-2 text-sm font-semibold text-slate-950">
                            Hellory Reminder – multi-channel productivity &amp; communication app
                        </h4>
                        <p class="mt-2 text-xs sm:text-sm text-slate-600">
                            Cross-platform reminder and communication product with Flutter apps and a Node.js/MongoDB
                            backend to keep users on top of their busy lives.
                        </p>
                        <p class="mt-1 text-[11px] text-slate-500">
                            Result: reliable notifications, stronger engagement and a foundation for future iterations.
                        </p>
                        <a
                            href="<?= route_url('/case-studies/hellory/') ?>"
                            class="mt-3 inline-flex items-center text-[11px] font-medium text-primary-700 underline underline-offset-4 hover:text-primary-900"
                        >
                            View Hellory case study
                            <svg
                                class="ml-1 h-3 w-3"
                                viewBox="0 0 16 16"
                                aria-hidden="true"
                            >
                                <path
                                    d="M5.25 3.5h7.25m0 0v7.25m0-7.25L5 11.25"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.4"
                                />
                            </svg>
                        </a>
                    </article>
                </div>
            </div>
        </div>
    </div>
</section>