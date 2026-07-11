<?php
/**
 * Case studies index – /case-studies/
 *
 * @var array $caseStudies Enabled case studies from config/case_studies.php
 */

$caseStudies = $caseStudies ?? [];
?>

<!-- Hero -->
<section class="bg-slate-50 py-10 sm:py-16">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 space-y-5">
        <nav class="text-xs font-medium text-slate-600" aria-label="Breadcrumb">
            <ol class="flex flex-wrap items-center gap-1">
                <li><a href="/" class="hover:text-sky-500 transition-colors">Home</a></li>
                <li aria-hidden="true">/</li>
                <li aria-current="page">Case Studies</li>
            </ol>
        </nav>

        <div class="max-w-3xl space-y-4">
            <span class="inline-flex items-center rounded-pill border border-slate-200 bg-white/90 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-muted-foreground shadow-soft">
                Case studies
                <span class="ml-2 h-1 w-1 rounded-full bg-sky-400"></span>
                <span class="ml-2 opacity-80">Real products, real outcomes</span>
            </span>

            <h1 class="text-display-md sm:text-display-lg font-bold text-slate-900">
                Software We Built, and What It
                <span class="text-gradient-brand-animated">Changed for Clients</span>.
            </h1>

            <p class="text-md font-medium text-slate-600">
                Deep dives into custom web apps, SaaS platforms, portals and mobile products QalbIT
                designed, built and shipped — including the problems they solved and the results
                they delivered.
            </p>
        </div>
    </div>
</section>

<!-- Cards -->
<section class="bg-white py-14 sm:py-16" aria-label="Case study list">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <?php if (!empty($caseStudies)): ?>
            <div class="grid gap-6 md:grid-cols-2">
                <?php foreach ($caseStudies as $cs): ?>
                    <?php
                        $slug     = $cs['slug'] ?? '#';
                        $name     = $cs['name'] ?? 'Case study';
                        $summary  = $cs['summary'] ?? '';
                        $industry = $cs['industry'] ?? '';
                    ?>
                    <article class="group relative flex h-full flex-col rounded-3xl border border-slate-200 bg-white p-7 transition-all duration-200 hover:border-slate-300 hover:shadow-lg">
                        <?php if ($industry !== ''): ?>
                            <span class="mb-3 inline-flex w-fit items-center rounded-pill border border-slate-200 bg-slate-50 px-2.5 py-1 text-[11px] font-medium text-slate-600">
                                <?= htmlspecialchars($industry) ?>
                            </span>
                        <?php endif; ?>

                        <h2 class="text-lg font-bold text-slate-900">
                            <a href="<?= htmlspecialchars($slug) ?>" class="focus:outline-none">
                                <span class="absolute inset-0" aria-hidden="true"></span>
                                <?= htmlspecialchars($name) ?>
                            </a>
                        </h2>

                        <?php if ($summary !== ''): ?>
                            <p class="mt-3 flex-1 text-[13px] leading-relaxed text-slate-600 line-clamp-4">
                                <?= htmlspecialchars($summary) ?>
                            </p>
                        <?php endif; ?>

                        <span class="mt-5 inline-flex items-center gap-1.5 text-[13px] font-semibold text-primary-700 transition-colors group-hover:text-primary-900">
                            Read the full case study
                            <svg class="h-3.5 w-3.5 transition-transform group-hover:translate-x-0.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" /></svg>
                        </span>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="text-sm text-slate-600">
                Case studies are being updated. Meanwhile, explore our
                <a href="<?= route_url('/portfolio/') ?>" class="font-semibold text-primary-700 underline-offset-2 hover:underline">portfolio</a>.
            </p>
        <?php endif; ?>
    </div>
</section>

<!-- CTA -->
<section class="bg-slate-50 py-12">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col gap-4 rounded-3xl border border-slate-200 bg-white p-7 sm:flex-row sm:items-center sm:justify-between">
            <div class="max-w-2xl space-y-1">
                <h2 class="text-lg font-bold text-slate-900">Want results like these for your product?</h2>
                <p class="text-[13px] text-slate-600">
                    Tell us about your project — we’ll walk you through how we’d approach it, with
                    honest estimates and a clear first phase.
                </p>
            </div>
            <div class="flex shrink-0 flex-wrap gap-3">
                <a href="<?= route_url('/contact-us/?topic=case-studies') ?>" class="btn btn-accent btn-radius-pill whitespace-nowrap">Discuss your project</a>
                <a href="<?= route_url('/portfolio/') ?>" class="btn btn-primary-outline btn-radius-pill whitespace-nowrap">See full portfolio</a>
            </div>
        </div>
    </div>
</section>
