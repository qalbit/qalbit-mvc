<section
    id="industry-outcomes"
    class="border-t border-slate-200 bg-slate-900 py-16 sm:py-20 lg:py-24"
    data-animate="industries-outcomes"
>
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 space-y-8">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div class="space-y-3 max-w-3xl">
                <h2 class="text-2xl sm:text-3xl font-bold tracking-tight text-slate-50">
                    What industry projects look like in practice
                </h2>
                <p class="text-sm sm:text-base text-slate-300">
                    These are example outcomes from industry-specific web, mobile and SaaS projects. Exact
                    numbers change per client, but the pattern is the same: clear scope, focused build and
                    measurable impact on operations or revenue.
                </p>
            </div>
            <div class="max-w-sm space-y-2 text-xs text-slate-400">
                <p>
                    We can walk you through similar stories in more detail on a call and share what would
                    realistically apply to your business, stage and industry.
                </p>
                <a
                    href="/case-studies/"
                    class="inline-flex items-center text-[11px] font-semibold uppercase tracking-[0.18em] text-sky-300 hover:text-sky-200"
                >
                    Browse selected case studies
                    <span class="ml-1.5 translate-y-px text-base">↗</span>
                </a>
            </div>
        </div>

        <?php
            // You can later wire each of these to a real case study URL.
            $industryOutcomes = [
                [
                    'label'       => 'Home services & on-demand',
                    'headline'    => 'Booking platform for local services',
                    'result'      => '+35–40% increase in completed jobs within 6 months',
                    'bullets'     => [
                        'Online quote & booking flows instead of phone-only requests.',
                        'Field team app for job status, photos and customer signatures.',
                    ],
                    'cta_label'   => 'See home services example',
                    'cta_href'    => '/case-studies/?industry=home-services',
                ],
                [
                    'label'       => 'Travel & mobility',
                    'headline'    => 'Trip request & scheduling platform',
                    'result'      => 'Higher utilisation of vehicles and better customer communication',
                    'bullets'     => [
                        '“Trip request solution” tuned to real-world routes and constraints.',
                        'Driver, dispatcher and customer views from the same platform.',
                    ],
                    'cta_label'   => 'See travel example',
                    'cta_href'    => '/case-studies/?industry=travel',
                ],
                [
                    'label'       => 'Sports, fitness & education',
                    'headline'    => 'Sports academy & training management portal',
                    'result'      => 'Cleaner schedules, payments and communication with parents/athletes',
                    'bullets'     => [
                        '“Sports management software” for sessions, attendance and staff.',
                        'Mobile-friendly views for coaches, players and guardians.',
                    ],
                    'cta_label'   => 'See sports & education example',
                    'cta_href'    => '/case-studies/?industry=sports-fitness',
                ],
            ];
        ?>

        <div class="grid gap-5 sm:gap-6 md:grid-cols-2 lg:grid-cols-3">
            <?php foreach ($industryOutcomes as $outcome): ?>
                <article class="flex flex-col rounded-2xl border border-slate-800 bg-slate-900/70 p-5 sm:p-6">
                    <?php if (!empty($outcome['label'])): ?>
                        <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-sky-300">
                            <?= htmlspecialchars($outcome['label'], ENT_QUOTES); ?>
                        </p>
                    <?php endif; ?>

                    <?php if (!empty($outcome['headline'])): ?>
                        <h3 class="mt-2 text-sm sm:text-base font-semibold text-slate-50">
                            <?= htmlspecialchars($outcome['headline'], ENT_QUOTES); ?>
                        </h3>
                    <?php endif; ?>

                    <?php if (!empty($outcome['result'])): ?>
                        <p class="mt-2 text-xs sm:text-xs font-medium text-emerald-300">
                            <?= htmlspecialchars($outcome['result'], ENT_QUOTES); ?>
                        </p>
                    <?php endif; ?>

                    <?php if (!empty($outcome['bullets']) && is_array($outcome['bullets'])): ?>
                        <ul class="mt-3 space-y-1.5 text-[11px] sm:text-xs text-slate-300">
                            <?php foreach ($outcome['bullets'] as $bullet): ?>
                                <li class="flex gap-2">
                                    <span class="mt-1 h-1.5 w-1.5 flex-none rounded-full bg-sky-400"></span>
                                    <span><?= htmlspecialchars($bullet, ENT_QUOTES); ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <?php if (!empty($outcome['cta_label']) && !empty($outcome['cta_href'])): ?>
                        <div class="mt-4 pt-3 border-t border-slate-800">
                            <a
                                href="<?= htmlspecialchars($outcome['cta_href'], ENT_QUOTES); ?>"
                                class="inline-flex items-center text-[11px] font-semibold uppercase tracking-[0.18em] text-sky-300 hover:text-sky-200"
                            >
                                <?= htmlspecialchars($outcome['cta_label'], ENT_QUOTES); ?>
                                <span class="ml-1.5 translate-y-px text-base">↗</span>
                            </a>
                        </div>
                    <?php endif; ?>
                </article>
            <?php endforeach; ?>
        </div>

        <div class="mt-6 flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
            <p class="text-[11px] text-slate-400 max-w-xl">
                Results like these depend on starting with a clear scope and focusing on the few flows that
                matter most – bookings, orders, payments, reporting or communication – instead of trying to
                build everything at once.
            </p>
            <a
                href="/contact-us/?topic=industries-outcomes"
                class="mt-2 inline-flex items-center text-[11px] font-semibold uppercase tracking-[0.18em] text-sky-300 hover:text-sky-200"
            >
                Discuss what realistic outcomes look like for you
                <span class="ml-1.5 translate-y-px text-base">↗</span>
            </a>
        </div>
    </div>
</section>
