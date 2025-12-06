<?php
/**
 * Home – 3-step CTA / Hiring Process
 *
 * @var string|null $title
 * @var string|null $subtitle
 */

$title    = $title ?? 'Build your custom software team in three simple steps';
$subtitle = $subtitle
    ?? 'A short, predictable process to go from idea or backlog to a dedicated QalbIT team working on your product.';

?>

<section
    id="home-cta"
    class="py-16 bg-slate-950 text-slate-50"
    aria-labelledby="home-cta-heading"
    data-cta-section
    itemscope
    itemtype="https://schema.org/HowTo"
>
    <meta itemprop="name" content="How to hire a custom software development team with QalbIT">
    <meta itemprop="description" content="Three simple steps to schedule a discovery call, confirm your team structure and start building your custom software product with QalbIT.">

    <div class="mx-auto max-w-6xl px-4">
        <!-- Top layout: copy on the left, steps on the right -->
        <div class="grid gap-10 lg:grid-cols-[minmax(0,1.1fr)_minmax(0,1.6fr)] lg:items-center">
            <!-- LEFT: Heading + bullets + CTA -->
            <header class="space-y-4 max-w-xl">
                <span class="inline-flex items-center rounded-full border border-slate-700 bg-slate-900/80 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-slate-300 shadow-soft">
                    Assemble your team
                </span>

                <h2
                    id="home-cta-heading"
                    class="text-display-sm sm:text-display-md font-bold tracking-tight"
                    itemprop="name"
                >
                    <?= htmlspecialchars($title) ?>
                </h2>

                <p class="text-sm md:text-base text-slate-300">
                    <?= htmlspecialchars($subtitle) ?>
                </p>

                <ul class="mt-4 space-y-2 text-xs md:text-sm text-slate-300/95">
                    <li>
                        ✓ <span itemprop="supply">Custom software development, SaaS platforms and mobile apps.</span>
                    </li>
                    <li>
                        ✓ Dedicated engineering pods for product companies, agencies and enterprises.
                    </li>
                    <li>
                        ✓ Clear milestones, transparent pricing and ongoing delivery reporting.
                    </li>
                </ul>

                <div class="mt-6 flex flex-wrap items-center gap-3">
                    <a
                        href="<?= route_url('contact') ?? 'https://qalbit.com/contact-us/' ?>"
                        class="btn btn-primary btn-radius-pill"
                        title="Schedule a discovery call with QalbIT"
                        aria-label="Schedule a discovery call to discuss your custom software project"
                        itemprop="url"
                    >
                        Schedule a discovery call
                    </a>

                    <a
                        href="mailto:hello@qalbit.com?subject=Project%20enquiry%20via%20website"
                        class="inline-flex items-center text-xs md:text-sm font-medium text-slate-200 hover:text-white/90 underline-offset-2 hover:underline"
                    >
                        Or email your requirements
                    </a>
                </div>
            </header>

            <!-- RIGHT: 3 animated step cards + connector line -->
            <div class="relative lg:pl-4">
                <!-- Horizontal connector line (desktop only) -->
                <div
                    class="pointer-events-none absolute inset-x-4 top-7 hidden md:block"
                    aria-hidden="true"
                >
                    <div
                        class="h-px w-full bg-gradient-to-r from-slate-700 via-slate-500 to-slate-700 origin-left scale-x-0"
                        data-cta-connector
                    ></div>
                </div>

                <ol
                    class="relative grid gap-5 md:grid-cols-3"
                    data-cta-steps
                >
                    <!-- STEP 1 -->
                    <li
                        class="cta-step-card"
                        data-cta-step
                        data-cta-step-index="0"
                        itemscope
                        itemprop="step"
                        itemtype="https://schema.org/HowToStep"
                    >
                        <meta itemprop="position" content="1">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="step-icon-wrapper">
                                <img
                                    src="<?= asset('/images/icons/step-call.svg') ?>"
                                    alt="Icon of discovery and exploration call"
                                    loading="lazy"
                                    decoding="async"
                                    class="h-9 w-9 object-contain"
                                />
                            </div>
                            <span class="step-badge">Step 1</span>
                        </div>

                        <h3 class="step-title" itemprop="name">
                            Share your product and hiring needs.
                        </h3>
                        <p class="step-text" itemprop="text">
                            Join a short discovery call to walk us through your product, tech stack, timelines, budget and required skills.
                        </p>
                        <ul class="step-list">
                            <li>Clarify scope for web, mobile or SaaS.</li>
                            <li>Align on success metrics and constraints.</li>
                            <li>Decide if you need a full team or extra capacity.</li>
                        </ul>
                    </li>

                    <!-- STEP 2 -->
                    <li
                        class="cta-step-card"
                        data-cta-step
                        data-cta-step-index="1"
                        itemscope
                        itemprop="step"
                        itemtype="https://schema.org/HowToStep"
                    >
                        <meta itemprop="position" content="2">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="step-icon-wrapper">
                                <img
                                    src="<?= asset('/images/icons/step-team.svg') ?>"
                                    alt="Icon of software development team structure"
                                    loading="lazy"
                                    decoding="async"
                                    class="h-9 w-9 object-contain"
                                />
                            </div>
                            <span class="step-badge">Step 2</span>
                        </div>

                        <h3 class="step-title" itemprop="name">
                            Finalise solution, engagement model and team.
                        </h3>
                        <p class="step-text" itemprop="text">
                            Within a few days we propose architecture options, team composition and an engagement model that fits your roadmap.
                        </p>
                        <ul class="step-list">
                            <li>Choose between fixed-scope or dedicated team.</li>
                            <li>Lock in seniority mix and availability.</li>
                            <li>Agree on milestones, reporting and tools.</li>
                        </ul>
                    </li>

                    <!-- STEP 3 -->
                    <li
                        class="cta-step-card"
                        data-cta-step
                        data-cta-step-index="2"
                        itemscope
                        itemprop="step"
                        itemtype="https://schema.org/HowToStep"
                    >
                        <meta itemprop="position" content="3">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="step-icon-wrapper">
                                <img
                                    src="<?= asset('/images/icons/step-started.svg') ?>"
                                    alt="Icon of project kickoff and delivery tracking"
                                    loading="lazy"
                                    decoding="async"
                                    class="h-9 w-9 object-contain"
                                />
                            </div>
                            <span class="step-badge">Step 3</span>
                        </div>

                        <h3 class="step-title" itemprop="name">
                            Kick off delivery and track progress in sprints.
                        </h3>
                        <p class="step-text" itemprop="text">
                            We start with an agreed kickoff date, ship the first sprint quickly and keep you updated with demos, metrics and burn-down.
                        </p>
                        <ul class="step-list">
                            <li>Regular demos, stand-ups and status reports.</li>
                            <li>Transparent velocity and change management.</li>
                            <li>Option to scale the team up or down as you grow.</li>
                        </ul>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</section>
