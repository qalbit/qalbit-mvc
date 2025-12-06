<?php
/**
 * QalbIT – Home Process Section
 *
 * NOTE: All existing copy is preserved to avoid SEO loss.
 */
?>
<section
    id="home-process"
    class="py-16 bg-slate-950 text-slate-50"
    aria-labelledby="process-heading"
    data-process-section
>
    <div class="max-w-6xl mx-auto px-4">
        <!-- Header -->
        <header class="max-w-3xl space-y-3">
            <span class="border-2 shadow-elevated rounded-pill px-2.5 py-1.5 text-[11px] font-medium uppercase border-slate-700/80 bg-slate-900/60 text-slate-300">
                How we build your product
            </span>

            <h2
                id="process-heading"
                class="text-display-sm sm:text-display-md md:text-display-lg font-bold"
            >
                Our Proven Process for Seamless <span class="bg-gradient-accent text-white px-2 rounded-xs">Custom Product Development</span>.
            </h2>

            <!-- Keep old tagline for SEO, but visually subtle -->
            <p class="mt-1 text-[11px] uppercase tracking-[0.16em] text-slate-500">
                Our precise processes for enabling custom web development
            </p>

            <p class="mt-2 text-sm md:text-base text-slate-300">
                We combine discovery, product strategy, development, and engagement models into
                a repeatable process – so you always know what happens next, from MVP to long-term scale.
            </p>
        </header>

        <!-- DESKTOP / TABLET: Stepper with GSAP (md and up) -->
        <div class="mt-8 space-y-8 hidden md:block" data-process-desktop>
            <div
                class="grid grid-cols-4 gap-0"
                role="tablist"
                aria-label="Custom product development process"
                data-process-tablist
            >
                <!-- STEP 1 -->
                <button
                    type="button"
                    id="process-tab-mvp"
                    role="tab"
                    aria-selected="true"
                    aria-controls="process-panel-mvp"
                    data-process-tab
                    data-process-index="0"
                    class="group flex flex-col px-4 py-3 text-left transition-all duration-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary-400"
                >
                    <span class="mt-0.5 text-sm md:text-base font-semibold text-slate-50">
                        Minimal Viable Product
                    </span>
                    <span class="mt-2 block h-[2px] rounded-full bg-slate-700/80 overflow-hidden">
                        <span
                            class="block h-full w-full origin-left scale-x-0 bg-primary-400"
                            data-process-progress
                        ></span>
                    </span>
                </button>

                <!-- STEP 2 -->
                <button
                    type="button"
                    id="process-tab-scaling"
                    role="tab"
                    aria-selected="false"
                    aria-controls="process-panel-scaling"
                    tabindex="-1"
                    data-process-tab
                    data-process-index="1"
                    class="group flex flex-col px-4 py-3 text-left transition-all duration-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary-400"
                >
                    <span class="mt-0.5 text-sm md:text-base font-semibold text-slate-50">
                        Product Scaling Team
                    </span>
                    <span class="mt-2 block h-[2px] rounded-full bg-slate-700/80 overflow-hidden">
                        <span
                            class="block h-full w-full origin-left scale-x-0 bg-primary-400"
                            data-process-progress
                        ></span>
                    </span>
                </button>

                <!-- STEP 3 -->
                <button
                    type="button"
                    id="process-tab-digital"
                    role="tab"
                    aria-selected="false"
                    aria-controls="process-panel-digital"
                    tabindex="-1"
                    data-process-tab
                    data-process-index="2"
                    class="group flex flex-col px-4 py-3 text-left transition-all duration-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary-400"
                >
                    <span class="mt-0.5 text-sm md:text-base font-semibold text-slate-50">
                        Digital Transformation
                    </span>
                    <span class="mt-2 block h-[2px] rounded-full bg-slate-700/80 overflow-hidden">
                        <span
                            class="block h-full w-full origin-left scale-x-0 bg-primary-400"
                            data-process-progress
                        ></span>
                    </span>
                </button>

                <!-- STEP 4 -->
                <button
                    type="button"
                    id="process-tab-engagement"
                    role="tab"
                    aria-selected="false"
                    aria-controls="process-panel-engagement"
                    tabindex="-1"
                    data-process-tab
                    data-process-index="3"
                    class="group flex flex-col px-4 py-3 text-left transition-all duration-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary-400"
                >
                    <span class="mt-0.5 text-sm md:text-base font-semibold text-slate-50">
                        Engagement Model
                    </span>
                    <span class="mt-2 block h-[2px] rounded-full bg-slate-700/80 overflow-hidden">
                        <span
                            class="block h-full w-full origin-left scale-x-0 bg-primary-400"
                            data-process-progress
                        ></span>
                    </span>
                </button>
            </div>

            <!-- Panels -->
            <div
                class="rounded-3xl border border-slate-800 bg-slate-900/80 p-6 md:p-8 lg:p-10"
                data-process-panels
            >
                <!-- PANEL 1 – MVP -->
                <article
                    id="process-panel-mvp"
                    role="tabpanel"
                    aria-labelledby="process-tab-mvp"
                    data-process-panel
                    data-process-index="0"
                    class="process-panel"
                >
                    <div class="grid gap-8 md:grid-cols-[minmax(0,1.8fr)_minmax(0,2fr)] items-start">
                        <div>
                            <h3 class="text-xl md:text-2xl font-semibold text-slate-50">
                                From idea to MVP that’s ready for business fit review.
                            </h3>
                            <p class="mt-3 text-sm md:text-base text-slate-300">
                                Our team will take the ideation, dissect it, and reunite it into an MVP
                                ready for business fit review and enable product features.
                            </p>

                            <a
                                href="<?= route_url('/start-up-mvp/') ?>"
                                class="btn btn-primary btn-radius-pill mt-5"
                                aria-label="View Startup MVP process"
                            >
                                View Startup MVP
                            </a>
                        </div>

                        <div>
                            <ul class="space-y-2.5 text-sm md:text-base text-slate-100">
                                <li class="flex gap-2" data-process-bullet>
                                    <span class="mt-2 h-1.5 w-1.5 rounded-full bg-primary-400"></span>
                                    <span>Tell us about your idea</span>
                                </li>
                                <li class="flex gap-2" data-process-bullet>
                                    <span class="mt-2 h-1.5 w-1.5 rounded-full bg-primary-400"></span>
                                    <span>Discovery workshops</span>
                                </li>
                                <li class="flex gap-2" data-process-bullet>
                                    <span class="mt-2 h-1.5 w-1.5 rounded-full bg-primary-400"></span>
                                    <span>User experience and user interface design</span>
                                </li>
                                <li class="flex gap-2" data-process-bullet>
                                    <span class="mt-2 h-1.5 w-1.5 rounded-full bg-primary-400"></span>
                                    <span>Web development</span>
                                </li>
                                <li class="flex gap-2" data-process-bullet>
                                    <span class="mt-2 h-1.5 w-1.5 rounded-full bg-primary-400"></span>
                                    <span>Client inputs and feedback</span>
                                </li>
                                <li class="flex gap-2" data-process-bullet>
                                    <span class="mt-2 h-1.5 w-1.5 rounded-full bg-primary-400"></span>
                                    <span>Application introduction and launch</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </article>

                <!-- PANEL 2 – Product Scaling -->
                <article
                    id="process-panel-scaling"
                    role="tabpanel"
                    aria-labelledby="process-tab-scaling"
                    data-process-panel
                    data-process-index="1"
                    class="process-panel hidden"
                >
                    <div class="grid gap-8 md:grid-cols-[minmax(0,1.8fr)_minmax(0,2fr)] items-start">
                        <div>
                            <h3 class="text-xl md:text-2xl font-semibold text-slate-50">
                                Scale your product with a dedicated, high-performing team.
                            </h3>
                            <p class="mt-3 text-sm md:text-base text-slate-300">
                                We offer product development services and enable product management by
                                scaling your teams with the best web development practices.
                            </p>

                            <a
                                href="<?= route_url('/product-scaling/') ?>"
                                class="btn btn-primary btn-radius-pill mt-5"
                                aria-label="View Product Scaling"
                            >
                                View Product Scaling
                            </a>
                        </div>

                        <div>
                            <ul class="space-y-2.5 text-sm md:text-base text-slate-100">
                                <li class="flex gap-2" data-process-bullet>
                                    <span class="mt-2 h-1.5 w-1.5 rounded-full bg-primary-400"></span>
                                    <span>Gathering requirements</span>
                                </li>
                                <li class="flex gap-2" data-process-bullet>
                                    <span class="mt-2 h-1.5 w-1.5 rounded-full bg-primary-400"></span>
                                    <span>Discovery workshops</span>
                                </li>
                                <li class="flex gap-2" data-process-bullet>
                                    <span class="mt-2 h-1.5 w-1.5 rounded-full bg-primary-400"></span>
                                    <span>Pair programming</span>
                                </li>
                                <li class="flex gap-2" data-process-bullet>
                                    <span class="mt-2 h-1.5 w-1.5 rounded-full bg-primary-400"></span>
                                    <span>Personality check</span>
                                </li>
                                <li class="flex gap-2" data-process-bullet>
                                    <span class="mt-2 h-1.5 w-1.5 rounded-full bg-primary-400"></span>
                                    <span>Final interview</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </article>

                <!-- PANEL 3 – Digital Transformation -->
                <article
                    id="process-panel-digital"
                    role="tabpanel"
                    aria-labelledby="process-tab-digital"
                    data-process-panel
                    data-process-index="2"
                    class="process-panel hidden"
                >
                    <div class="grid gap-8 md:grid-cols-[minmax(0,1.8fr)_minmax(0,2fr)] items-start">
                        <div>
                            <h3 class="text-xl md:text-2xl font-semibold text-slate-50">
                                Digital transformation and long-term product sustenance.
                            </h3>
                            <p class="mt-3 text-sm md:text-base text-slate-300">
                                We provide software development services clubbed with digital transformation
                                solutions and product sustenance.
                            </p>

                            <a
                                href="<?= route_url('/digital-transformation/') ?>"
                                class="btn btn-primary btn-radius-pill mt-5"
                                aria-label="View Digital Transformation"
                            >
                                View Digital Transformation
                            </a>
                        </div>

                        <div>
                            <ul class="space-y-2.5 text-sm md:text-base text-slate-100">
                                <li class="flex gap-2" data-process-bullet>
                                    <span class="mt-2 h-1.5 w-1.5 rounded-full bg-primary-400"></span>
                                    <span>Ideation towards digital transformation</span>
                                </li>
                                <li class="flex gap-2" data-process-bullet>
                                    <span class="mt-2 h-1.5 w-1.5 rounded-full bg-primary-400"></span>
                                    <span>Product strategy and design workshop</span>
                                </li>
                                <li class="flex gap-2" data-process-bullet>
                                    <span class="mt-2 h-1.5 w-1.5 rounded-full bg-primary-400"></span>
                                    <span>User experience and user interface design</span>
                                </li>
                                <li class="flex gap-2" data-process-bullet>
                                    <span class="mt-2 h-1.5 w-1.5 rounded-full bg-primary-400"></span>
                                    <span>Proof of concept development</span>
                                </li>
                                <li class="flex gap-2" data-process-bullet>
                                    <span class="mt-2 h-1.5 w-1.5 rounded-full bg-primary-400"></span>
                                    <span>Client input and stakeholder feedback</span>
                                </li>
                                <li class="flex gap-2" data-process-bullet>
                                    <span class="mt-2 h-1.5 w-1.5 rounded-full bg-primary-400"></span>
                                    <span>Application introduction and launch</span>
                                </li>
                                <li class="flex gap-2" data-process-bullet>
                                    <span class="mt-2 h-1.5 w-1.5 rounded-full bg-primary-400"></span>
                                    <span>Integration and maintenance</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </article>

                <!-- PANEL 4 – Engagement Model -->
                <article
                    id="process-panel-engagement"
                    role="tabpanel"
                    aria-labelledby="process-tab-engagement"
                    data-process-panel
                    data-process-index="3"
                    class="process-panel hidden"
                >
                    <div class="grid gap-8 md:grid-cols-[minmax(0,1.8fr)_minmax(0,2fr)] items-start">
                        <div>
                            <h3 class="text-xl md:text-2xl font-semibold text-slate-50">
                                Engagement models that fit your budget and risk profile.
                            </h3>
                            <p class="mt-3 text-sm md:text-base text-slate-300">
                                Our engagement model inspires clients for a long-lasting relationship and
                                facilitate fixed cost, time &amp; material or hire dedicated resources model.
                            </p>

                            <a
                                href="<?= route_url('/engagement-model/') ?>"
                                class="btn btn-primary btn-radius-pill mt-5"
                                aria-label="View Engagement Model"
                            >
                                View Engagement Model
                            </a>
                        </div>

                        <div>
                            <ul class="space-y-2.5 text-sm md:text-base text-slate-100">
                                <li class="flex gap-2" data-process-bullet>
                                    <span class="mt-2 h-1.5 w-1.5 rounded-full bg-primary-400"></span>
                                    <span>Fixed Cost Model</span>
                                </li>
                                <li class="flex gap-2" data-process-bullet>
                                    <span class="mt-2 h-1.5 w-1.5 rounded-full bg-primary-400"></span>
                                    <span>Time &amp; Material Model</span>
                                </li>
                                <li class="flex gap-2" data-process-bullet>
                                    <span class="mt-2 h-1.5 w-1.5 rounded-full bg-primary-400"></span>
                                    <span>Hire Dedicated Model</span>
                                </li>
                                <li class="flex gap-2" data-process-bullet>
                                    <span class="mt-2 h-1.5 w-1.5 rounded-full bg-primary-400"></span>
                                    <span>Hybrid Model</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </article>
            </div>
        </div>

        <!-- MOBILE: simple stacked blocks, no steps/JS -->
        <div class="mt-8 space-y-6 md:hidden">
            <!-- MVP -->
            <article class="rounded-2xl border border-slate-800 bg-slate-900/80 p-5">
                <h3 class="text-lg font-semibold text-slate-50">
                    Minimal Viable Product
                </h3>
                <p class="mt-2 text-sm text-slate-300">
                    Our team will take the ideation, dissect it, and reunite it into an MVP
                    ready for business fit review and enable product features.
                </p>
                <ul class="mt-3 space-y-2 text-sm text-slate-100">
                    <li class="flex gap-2">
                        <span class="mt-2 h-1.5 w-1.5 rounded-full bg-primary-400"></span>
                        <span>Tell us about your idea</span>
                    </li>
                    <li class="flex gap-2">
                        <span class="mt-2 h-1.5 w-1.5 rounded-full bg-primary-400"></span>
                        <span>Discovery workshops</span>
                    </li>
                    <li class="flex gap-2">
                        <span class="mt-2 h-1.5 w-1.5 rounded-full bg-primary-400"></span>
                        <span>User experience and user interface design</span>
                    </li>
                    <li class="flex gap-2">
                        <span class="mt-2 h-1.5 w-1.5 rounded-full bg-primary-400"></span>
                        <span>Web development</span>
                    </li>
                    <li class="flex gap-2">
                        <span class="mt-2 h-1.5 w-1.5 rounded-full bg-primary-400"></span>
                        <span>Client inputs and feedback</span>
                    </li>
                    <li class="flex gap-2">
                        <span class="mt-2 h-1.5 w-1.5 rounded-full bg-primary-400"></span>
                        <span>Application introduction and launch</span>
                    </li>
                </ul>
                <a
                    href="<?= route_url('/start-up-mvp/') ?>"
                    class="btn btn-primary btn-radius-pill mt-4"
                    aria-label="View Startup MVP process"
                >
                    View Startup MVP
                </a>
            </article>

            <!-- Product Scaling -->
            <article class="rounded-2xl border border-slate-800 bg-slate-900/80 p-5">
                <h3 class="text-lg font-semibold text-slate-50">
                    Product Scaling Team
                </h3>
                <p class="mt-2 text-sm text-slate-300">
                    We offer product development services and enable product management by
                    scaling your teams with the best web development practices.
                </p>
                <ul class="mt-3 space-y-2 text-sm text-slate-100">
                    <li class="flex gap-2">
                        <span class="mt-2 h-1.5 w-1.5 rounded-full bg-primary-400"></span>
                        <span>Gathering requirements</span>
                    </li>
                    <li class="flex gap-2">
                        <span class="mt-2 h-1.5 w-1.5 rounded-full bg-primary-400"></span>
                        <span>Discovery workshops</span>
                    </li>
                    <li class="flex gap-2">
                        <span class="mt-2 h-1.5 w-1.5 rounded-full bg-primary-400"></span>
                        <span>Pair programming</span>
                    </li>
                    <li class="flex gap-2">
                        <span class="mt-2 h-1.5 w-1.5 rounded-full bg-primary-400"></span>
                        <span>Personality check</span>
                    </li>
                    <li class="flex gap-2">
                        <span class="mt-2 h-1.5 w-1.5 rounded-full bg-primary-400"></span>
                        <span>Final interview</span>
                    </li>
                </ul>
                <a
                    href="<?= route_url('/product-scaling/') ?>"
                    class="btn btn-primary btn-radius-pill mt-4"
                    aria-label="View Product Scaling"
                >
                    View Product Scaling
                </a>
            </article>

            <!-- Digital Transformation -->
            <article class="rounded-2xl border border-slate-800 bg-slate-900/80 p-5">
                <h3 class="text-lg font-semibold text-slate-50">
                    Digital Transformation
                </h3>
                <p class="mt-2 text-sm text-slate-300">
                    We provide software development services clubbed with digital transformation
                    solutions and product sustenance.
                </p>
                <ul class="mt-3 space-y-2 text-sm text-slate-100">
                    <li class="flex gap-2">
                        <span class="mt-2 h-1.5 w-1.5 rounded-full bg-primary-400"></span>
                        <span>Ideation towards digital transformation</span>
                    </li>
                    <li class="flex gap-2">
                        <span class="mt-2 h-1.5 w-1.5 rounded-full bg-primary-400"></span>
                        <span>Product strategy and design workshop</span>
                    </li>
                    <li class="flex gap-2">
                        <span class="mt-2 h-1.5 w-1.5 rounded-full bg-primary-400"></span>
                        <span>User experience and user interface design</span>
                    </li>
                    <li class="flex gap-2">
                        <span class="mt-2 h-1.5 w-1.5 rounded-full bg-primary-400"></span>
                        <span>Proof of concept development</span>
                    </li>
                    <li class="flex gap-2">
                        <span class="mt-2 h-1.5 w-1.5 rounded-full bg-primary-400"></span>
                        <span>Client input and stakeholder feedback</span>
                    </li>
                    <li class="flex gap-2">
                        <span class="mt-2 h-1.5 w-1.5 rounded-full bg-primary-400"></span>
                        <span>Application introduction and launch</span>
                    </li>
                    <li class="flex gap-2">
                        <span class="mt-2 h-1.5 w-1.5 rounded-full bg-primary-400"></span>
                        <span>Integration and maintenance</span>
                    </li>
                </ul>
                <a
                    href="<?= route_url('/digital-transformation/') ?>"
                    class="btn btn-primary btn-radius-pill mt-4"
                    aria-label="View Digital Transformation"
                >
                    View Digital Transformation
                </a>
            </article>

            <!-- Engagement Model -->
            <article class="rounded-2xl border border-slate-800 bg-slate-900/80 p-5">
                <h3 class="text-lg font-semibold text-slate-50">
                    Engagement Model
                </h3>
                <p class="mt-2 text-sm text-slate-300">
                    Our engagement model inspires clients for a long-lasting relationship and
                    facilitate fixed cost, time &amp; material or hire dedicated resources model.
                </p>
                <ul class="mt-3 space-y-2 text-sm text-slate-100">
                    <li class="flex gap-2">
                        <span class="mt-2 h-1.5 w-1.5 rounded-full bg-primary-400"></span>
                        <span>Fixed Cost Model</span>
                    </li>
                    <li class="flex gap-2">
                        <span class="mt-2 h-1.5 w-1.5 rounded-full bg-primary-400"></span>
                        <span>Time &amp; Material Model</span>
                    </li>
                    <li class="flex gap-2">
                        <span class="mt-2 h-1.5 w-1.5 rounded-full bg-primary-400"></span>
                        <span>Hire Dedicated Model</span>
                    </li>
                    <li class="flex gap-2">
                        <span class="mt-2 h-1.5 w-1.5 rounded-full bg-primary-400"></span>
                        <span>Hybrid Model</span>
                    </li>
                </ul>
                <a
                    href="<?= route_url('/engagement-model/') ?>"
                    class="btn btn-primary btn-radius-pill mt-4"
                    aria-label="View Engagement Model"
                >
                    View Engagement Model
                </a>
            </article>
        </div>
    </div>
</section>
