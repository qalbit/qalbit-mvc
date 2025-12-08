<?php
/**
 * Generic Case Study – Related Case Studies, Services & Final CTA (CS10)
 *
 * Reusable section for all case studies.
 *
 * Expects:
 * - $caseStudy (array) from config('case_studies')['key']
 *
 * Example structure:
 *
 * 'sections' => [
 *   'related' => [
 *       'id'       => 'cs10-related',
 *       'title'    => 'Related case studies & services',
 *       'subtitle' => 'Explore more custom software case studies and the services we used on this project.',
 *       'case_studies' => [
 *           [
 *               'slug'    => '/case-studies/biomind/',
 *               'name'    => 'Biomind – Healthcare data platform',
 *               'summary' => 'End-to-end data platform for clinical teams…',
 *           ],
 *           // …
 *       ],
 *       'services_used_title' => 'Services used in this project',
 *       'services_used' => [
 *           ['label' => 'Custom Software Development', 'href' => '/services/custom-software-development/'],
 *           ['label' => 'Start-up MVP',                'href' => '/start-up-mvp/'],
 *           ['label' => 'API Development',             'href' => '/services/api-development/'],
 *       ],
 *   ],
 *
 *   'final_cta' => [
 *       'id'      => 'cs10-final-cta',
 *       'eyebrow' => 'Have a similar challenge?',
 *       'title'   => 'Let’s design a scheduling platform that fits your operations – not the other way around.',
 *       'text'    => 'Whether you run a sports academy, training centre or operations-heavy business…',
 *       'primary_cta' => [
 *           'label' => 'Book a free consultation',
 *           'href'  => '/contact-us/?ref=cta-snappy-stats',
 *       ],
 *       'secondary_cta' => [
 *           'label' => 'Browse more case studies',
 *           'href'  => '/case-studies/',
 *       ],
 *   ],
 * ]
 */

$caseStudy = $caseStudy ?? [];

// Related block
$relatedConfig   = $caseStudy['sections']['related'] ?? [];
$relatedSectionId = $relatedConfig['id'] ?? 'cs10-related';

$relatedTitle = $relatedConfig['title']
    ?? 'Related case studies & services';

$relatedSubtitle = $relatedConfig['subtitle']
    ?? 'See similar work and the services we typically combine for projects like this.';

$relatedCases = $relatedConfig['case_studies'] ?? [];
$relatedCases = array_values(array_filter($relatedCases, function ($item) {
    if (!is_array($item)) {
        return false;
    }
    $name = trim((string)($item['name'] ?? ''));
    $slug = trim((string)($item['slug'] ?? ''));
    return $name !== '' && $slug !== '';
}));

// Services used
$servicesUsedTitle = $relatedConfig['services_used_title'] ?? 'Services used in this project';
$servicesUsed      = $relatedConfig['services_used'] ?? [];

// Fallback: try to derive from top-level "services" if specific links not provided
if (empty($servicesUsed) && !empty($caseStudy['services']) && is_array($caseStudy['services'])) {
    foreach ($caseStudy['services'] as $svc) {
        $label = trim((string)$svc);
        if ($label === '') {
            continue;
        }

        $href = null;
        // Basic mapping for QalbIT core services (safe fallback)
        if (stripos($label, 'Custom Software') !== false) {
            $href = '/services/custom-software-development/';
        } elseif (stripos($label, 'API Development') !== false) {
            $href = '/services/api-development/';
        } elseif (stripos($label, 'Start-up MVP') !== false || stripos($label, 'Startup MVP') !== false) {
            $href = '/start-up-mvp/';
        }

        $servicesUsed[] = [
            'label' => $label,
            'href'  => $href ?? '/services/',
        ];
    }
}

$servicesUsed = array_values(array_filter($servicesUsed, function ($item) {
    return !empty($item['label']) && !empty($item['href']);
}));

// Final CTA block
$finalCtaConfig = $caseStudy['sections']['final_cta'] ?? [];

$finalCtaId      = $finalCtaConfig['id']      ?? 'cs10-final-cta';
$finalCtaEyebrow = $finalCtaConfig['eyebrow'] ?? 'Have a similar challenge?';
$finalCtaTitle   = $finalCtaConfig['title']
    ?? 'Ready to explore a similar product for your organisation?';
$finalCtaText    = $finalCtaConfig['text']
    ?? 'If you’re dealing with similar operational or product challenges, we can help you design and ship a custom solution — from discovery and UX to architecture and delivery.';

// CTAs
$finalPrimaryCtaLabel = $finalCtaConfig['primary_cta']['label'] ?? 'Book a free consultation';
$finalPrimaryCtaHref  = $finalCtaConfig['primary_cta']['href']  ?? '/contact-us/';

$finalSecondaryCtaLabel = $finalCtaConfig['secondary_cta']['label'] ?? 'Book a quick discovery call';
$finalSecondaryCtaHref  = $finalCtaConfig['secondary_cta']['href']  ?? 'https://calendly.com/abidhusain-qalbit/discuss-project';
?>

<section
    id="<?= htmlspecialchars($relatedSectionId, ENT_QUOTES); ?>"
    class="relative bg-slate-950 text-slate-50 py-14 sm:py-18 lg:py-20"
    data-cs-section="related-final-cta"
>
    <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-sky-500/0 via-sky-500/40 to-emerald-400/0"></div>

    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 space-y-10">
        <!-- Related case studies & services -->
        <div class="space-y-6" data-cs-related-el="wrapper">
            <header class="space-y-3 max-w-3xl">
                <p class="text-[11px] font-semibold uppercase tracking-[0.16em] text-sky-400">
                    Related case studies & services
                </p>

                <h2 class="text-display-md sm:text-display-lg md:text-display-xl font-bold tracking-tight text-white">
                    <?= htmlspecialchars($relatedTitle, ENT_QUOTES); ?>
                </h2>

                <?php if (!empty($relatedSubtitle)): ?>
                    <p class="text-sm sm:text-base text-slate-300 leading-relaxed">
                        <?= htmlspecialchars($relatedSubtitle, ENT_QUOTES); ?>
                    </p>
                <?php endif; ?>
            </header>

            <div
                class="grid gap-8 lg:grid-cols-[minmax(0,3.1fr)_minmax(0,2.1fr)] lg:items-start"
                data-cs-related-el="layout"
            >
                <!-- Related case studies grid -->
                <div class="space-y-4" data-cs-related-el="case-studies">
                    <?php if (!empty($relatedCases)): ?>
                        <div class="grid gap-4 sm:grid-cols-2">
                            <?php foreach ($relatedCases as $related): ?>
                                <?php
                                    $csSlug    = trim((string)($related['slug'] ?? ''));
                                    $csName    = trim((string)($related['name'] ?? ''));
                                    $csSummary = trim((string)($related['summary'] ?? ''));
                                    if ($csSlug === '' || $csName === '') {
                                        continue;
                                    }
                                ?>
                                <a
                                    href="<?= htmlspecialchars($csSlug, ENT_QUOTES); ?>"
                                    class="group block rounded-3xl border border-slate-800 bg-slate-900/70 p-4 sm:p-5
                                           shadow-[0_18px_45px_rgba(15,23,42,0.85)]
                                           transition-transform duration-200 hover:-translate-y-1 hover:border-sky-400/70"
                                    data-cs-el="related-card"
                                >
                                    <div class="flex items-center justify-between gap-2 mb-2">
                                        <h3 class="text-sm sm:text-[15px] font-semibold text-slate-50 line-clamp-2">
                                            <?= htmlspecialchars($csName, ENT_QUOTES); ?>
                                        </h3>
                                        <span class="text-[10px] font-medium text-sky-700 absolute right-5 top-5 bg-white py-1.5 px-2 rounded-full opacity-0 group-hover:opacity-100 transition-opacity">
                                            View case study ↗
                                        </span>
                                    </div>

                                    <?php if ($csSummary !== ''): ?>
                                        <p class="text-xs sm:text-[13px] text-slate-300 leading-relaxed line-clamp-3">
                                            <?= htmlspecialchars($csSummary, ENT_QUOTES); ?>
                                        </p>
                                    <?php endif; ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <div class="rounded-3xl border border-slate-800 bg-slate-900/70 p-4 sm:p-5">
                            <p class="text-xs sm:text-sm text-slate-300 leading-relaxed">
                                We&apos;ll showcase related case studies here. For now, you can browse all projects in our
                                <a href="/portfolio/" class="text-sky-400 hover:text-sky-300 underline underline-offset-2">
                                    case studies gallery
                                </a>.
                            </p>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Services used -->
                <aside
                    class="space-y-4 rounded-3xl border border-slate-800 bg-slate-900/80 p-5 sm:p-6 lg:p-7
                           shadow-[0_18px_45px_rgba(15,23,42,0.9)]"
                    data-cs-related-el="services"
                >
                    <header class="space-y-1">
                        <h3 class="text-xs sm:text-sm font-semibold uppercase tracking-[0.18em] text-slate-300">
                            <?= htmlspecialchars($servicesUsedTitle, ENT_QUOTES); ?>
                        </h3>
                        <p class="text-[11px] sm:text-xs text-slate-500">
                            These are the main QalbIT capabilities we combined to deliver this project.
                        </p>
                    </header>

                    <?php if (!empty($servicesUsed)): ?>
                        <ul class="space-y-2 text-[11px] sm:text-xs">
                            <?php foreach ($servicesUsed as $service): ?>
                                <?php
                                    $svcLabel = trim((string)($service['label'] ?? ''));
                                    $svcHref  = trim((string)($service['href'] ?? ''));
                                    if ($svcLabel === '' || $svcHref === '') {
                                        continue;
                                    }
                                ?>
                                <li data-cs-el="service-used">
                                    <a
                                        href="<?= htmlspecialchars($svcHref, ENT_QUOTES); ?>"
                                        class="inline-flex w-full items-center justify-between gap-2 rounded-full border border-slate-700
                                               bg-slate-900 px-3 py-1.5 text-left text-slate-100 hover:border-sky-400
                                               hover:bg-slate-900/80 transition-colors"
                                    >
                                        <span class="font-medium">
                                            <?= htmlspecialchars($svcLabel, ENT_QUOTES); ?>
                                        </span>
                                        <span aria-hidden="true" class="text-[9px] text-slate-400">↗</span>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p class="text-[11px] sm:text-xs text-slate-500">
                            The specific services used for this project will be documented here – usually a mix of
                            discovery, UX, product engineering and ongoing support.
                        </p>
                    <?php endif; ?>

                    <p class="mt-2 text-[11px] sm:text-xs text-slate-500 leading-relaxed">
                        Not every project needs every service. We work with you to shape a scope that matches your
                        current stage, internal team and budget.
                    </p>
                </aside>
            </div>
        </div>

        <!-- Final CTA band -->
        <div
            id="<?= htmlspecialchars($finalCtaId, ENT_QUOTES); ?>"
            class="rounded-3xl border border-sky-500/40 bg-gradient-to-r from-sky-600 via-sky-500 to-sky-700
                   px-5 py-6 sm:px-7 sm:py-7 lg:px-9 lg:py-8 shadow-[0_24px_60px_rgba(8,47,73,0.9)]"
            data-cs-final-cta-el="band"
        >
            <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                <div class="space-y-2 max-w-2xl">
                    <p class="text-[11px] sm:text-xs font-semibold uppercase tracking-[0.18em] text-sky-100/80">
                        <?= htmlspecialchars($finalCtaEyebrow, ENT_QUOTES); ?>
                    </p>

                    <h3 class="text-lg sm:text-xl md:text-2xl font-bold text-white">
                        <?= htmlspecialchars($finalCtaTitle, ENT_QUOTES); ?>
                    </h3>

                    <?php if (!empty($finalCtaText)): ?>
                        <p class="text-[11px] sm:text-xs text-sky-100/90 leading-relaxed">
                            <?= htmlspecialchars($finalCtaText, ENT_QUOTES); ?>
                        </p>
                    <?php endif; ?>
                </div>

                <div class="flex flex-col gap-2 sm:items-center sm:justify-end">
                    <a
                        href="<?= htmlspecialchars($finalPrimaryCtaHref, ENT_QUOTES); ?>"
                        class="flex-shrink-0 inline-flex items-center justify-center rounded-full bg-white px-4 py-2
                               text-[11px] sm:text-xs font-semibold text-sky-700 shadow-soft-sm
                               hover:bg-sky-50 transition-colors"
                    >
                        <?= htmlspecialchars($finalPrimaryCtaLabel, ENT_QUOTES); ?>
                        <span aria-hidden="true" class="ml-1 text-[10px]">↗</span>
                    </a>

                    <a
                        href="<?= htmlspecialchars($finalSecondaryCtaHref, ENT_QUOTES); ?>"
                        class="flex-shrink-0 inline-flex items-center justify-center rounded-full border border-sky-100/80 px-4 py-2
                               text-[11px] sm:text-xs font-semibold text-sky-50 hover:bg-sky-600/60 transition-colors"
                    >
                        <?= htmlspecialchars($finalSecondaryCtaLabel, ENT_QUOTES); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
