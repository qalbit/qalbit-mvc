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

                <ul class="mt-5 space-y-2.5 text-xs md:text-sm text-slate-300">
                    <li class="flex items-start gap-2.5">
                        <svg class="mt-0.5 h-4 w-4 flex-none text-emerald-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z" clip-rule="evenodd"/>
                        </svg>
                        <span itemprop="supply">Custom software development, SaaS platforms and mobile apps.</span>
                    </li>
                    <li class="flex items-start gap-2.5">
                        <svg class="mt-0.5 h-4 w-4 flex-none text-emerald-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z" clip-rule="evenodd"/>
                        </svg>
                        <span>Dedicated engineering pods for product companies, agencies and enterprises.</span>
                    </li>
                    <li class="flex items-start gap-2.5">
                        <svg class="mt-0.5 h-4 w-4 flex-none text-emerald-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z" clip-rule="evenodd"/>
                        </svg>
                        <span>Clear milestones, transparent pricing and ongoing delivery reporting.</span>
                    </li>
                </ul>

                <div class="mt-7 flex flex-wrap items-center gap-3">
                    <a
                        href="<?= route_url('/contact-us/') ?? 'https://qalbit.com/contact-us/' ?>"
                        class="btn btn-primary btn-radius-pill"
                        title="Schedule a discovery call with QalbIT"
                        aria-label="Schedule a discovery call to discuss your custom software project"
                        itemprop="url"
                    >
                        Schedule a discovery call
                    </a>

                    <a
                        href="mailto:sales@qalbit.com?subject=Project%20enquiry%20via%20website"
                        class="inline-flex items-center text-xs md:text-sm font-medium text-slate-200 hover:text-white/90 underline-offset-2 hover:underline"
                    >
                        Or email your requirements
                    </a>
                </div>

                <p class="mt-5 flex flex-wrap items-center gap-x-2 gap-y-1 text-[11px] text-slate-400">
                    <span>Typical kickoff within 1–2 weeks</span>
                    <span aria-hidden="true">·</span>
                    <span>NDA-friendly</span>
                    <span aria-hidden="true">·</span>
                    <span>IST–EST time-zone overlap</span>
                </p>
            </header>

            <!-- RIGHT: vertical step timeline -->
            <div class="relative lg:pl-6">
                <ol class="relative space-y-8" data-cta-steps>
                    <!-- Vertical rail connecting the step numbers -->
                    <div
                        class="pointer-events-none absolute bottom-8 left-[1.375rem] top-8 w-px bg-gradient-to-b from-sky-400/50 via-slate-600/50 to-slate-800"
                        aria-hidden="true"
                    ></div>

                    <!-- STEP 1 -->
                    <li
                        class="cta-step-card flex items-start gap-4 sm:gap-6"
                        data-cta-step
                        data-cta-step-index="0"
                        itemscope
                        itemprop="step"
                        itemtype="https://schema.org/HowToStep"
                    >
                        <meta itemprop="position" content="1">
                        <div class="step-node" aria-hidden="true">01</div>
                        <div class="min-w-0 flex-1 pt-1.5">
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
                        </div>
                    </li>

                    <!-- STEP 2 -->
                    <li
                        class="cta-step-card flex items-start gap-4 sm:gap-6"
                        data-cta-step
                        data-cta-step-index="1"
                        itemscope
                        itemprop="step"
                        itemtype="https://schema.org/HowToStep"
                    >
                        <meta itemprop="position" content="2">
                        <div class="step-node" aria-hidden="true">02</div>
                        <div class="min-w-0 flex-1 pt-1.5">
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
                        </div>
                    </li>

                    <!-- STEP 3 -->
                    <li
                        class="cta-step-card flex items-start gap-4 sm:gap-6"
                        data-cta-step
                        data-cta-step-index="2"
                        itemscope
                        itemprop="step"
                        itemtype="https://schema.org/HowToStep"
                    >
                        <meta itemprop="position" content="3">
                        <div class="step-node" aria-hidden="true">03</div>
                        <div class="min-w-0 flex-1 pt-1.5">
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
                        </div>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</section>
