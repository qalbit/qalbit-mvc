<?php
/**
 * Portfolio Grid (P4) – Light Variant, 3-column
 *
 * Expects:
 * - $sections        (array) from config('portfolio.page.sections')
 * - $items           (array) filtered list of portfolio items
 * - $allIndustries   (array) from config('portfolio.industries')
 * - $allTechnologies (array) from config('portfolio.technologies')
 */

$sections        = $sections        ?? [];
$items           = $items           ?? [];
$allIndustries   = $allIndustries   ?? [];
$allTechnologies = $allTechnologies ?? [];

$config       = $sections['grid'] ?? [];
$sectionId    = $config['id']       ?? 'portfolio-grid';
$title        = $config['title']    ?? 'All projects & case studies';
$subtitle     = $config['subtitle'] ?? 'Browse selected work across industries and technology stacks, or refine the list using filters above.';
$emptyTitle   = $config['empty_title']   ?? 'No projects match these filters yet.';
$emptyMessage = $config['empty_message'] ?? 'Try adjusting the industry or tech stack filters, or contact us with your requirements and we’ll share relevant examples.';
?>

<section
    id="<?= htmlspecialchars($sectionId, ENT_QUOTES); ?>"
    class="bg-slate-50 text-slate-900 py-8 sm:py-10 lg:py-12"
    data-portfolio-section="grid"
>
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 space-y-5 sm:space-y-6">

        <header class="flex flex-col gap-1 sm:flex-row sm:items-end sm:justify-between">
            <div class="space-y-1">
                <h2 class="text-base sm:text-lg md:text-xl font-semibold text-slate-900">
                    <?= htmlspecialchars($title, ENT_QUOTES); ?>
                </h2>
                <?php if (!empty($subtitle)): ?>
                    <p class="max-w-2xl text-xs sm:text-sm text-slate-600">
                        <?= htmlspecialchars($subtitle, ENT_QUOTES); ?>
                    </p>
                <?php endif; ?>
            </div>
        </header>

        <?php if (empty($items)): ?>
            <!-- Empty state -->
            <div
                class="mt-3 rounded-2xl border border-dashed border-slate-300 bg-white px-4 py-6 sm:px-6 sm:py-8 text-center"
                data-portfolio-el="grid-empty"
            >
                <h3 class="text-sm sm:text-base font-semibold text-slate-900">
                    <?= htmlspecialchars($emptyTitle, ENT_QUOTES); ?>
                </h3>
                <p class="mt-1 text-xs sm:text-sm text-slate-600">
                    <?= htmlspecialchars($emptyMessage, ENT_QUOTES); ?>
                </p>
                <div class="mt-3 flex flex-wrap items-center justify-center gap-2">
                    <a
                        href="<?= route_url('/portfolio/') ?>"
                        class="inline-flex items-center rounded-full border border-slate-300 bg-white px-3 py-1.5 text-[11px] font-medium text-slate-700 hover:bg-slate-100"
                    >
                        Reset filters
                    </a>
                    <a
                        href="<?= route_url('/contact-us/') ?>"
                        class="inline-flex items-center rounded-full bg-slate-900 px-3 py-1.5 text-[11px] font-medium text-slate-50 hover:bg-slate-800"
                    >
                        Share your requirements
                    </a>
                </div>
            </div>
        <?php else: ?>
            <!-- Grid: 1 column mobile, 2 columns small, 3 columns large -->
            <div
                class="grid gap-4 sm:gap-5 sm:grid-cols-2 lg:grid-cols-3"
                data-portfolio-el="grid"
            >
                <?php foreach ($items as $item): ?>
                    <?php
                        $name        = $item['name']        ?? 'Project';
                        $client      = $item['client']      ?? null;
                        $summary     = $item['summary']     ?? '';
                        $type        = $item['type']        ?? ($item['kind'] ?? null);
                        $industries  = $item['industries']  ?? [];
                        $technologies= $item['technologies']?? [];

                        $caseStudyUrl = $item['case_study_url'] ?? null;
                        $externalUrl  = $item['external_url']   ?? null;

                        $href       = $caseStudyUrl ?: ($externalUrl ?: '');
                        $isExternal = $externalUrl && !$caseStudyUrl;
                        $targetAttr = $isExternal ? ' target="_blank" rel="noreferrer"' : '';

                        $image = $item['image'] ?? null;
                        if (!$image && !empty($item['thumbnail'])) {
                            $image = [
                                'src' => $item['thumbnail'],
                                'alt' => $item['thumbnail_alt'] ?? ($name . ' UI'),
                            ];
                        }

                        $typeLabel = 'Project';
                        if ($type === 'case-study') {
                            $typeLabel = 'Case study';
                        } elseif ($type === 'product') {
                            $typeLabel = 'Product';
                        }
                    ?>
                    <article
                        class="group flex flex-col justify-between rounded-2xl border border-slate-200 bg-white p-4 sm:p-5 shadow-sm hover:shadow-md hover:border-sky-200 transition"
                        data-portfolio-el="grid-card"
                    >
                        <div class="space-y-3">
                            <?php if (!empty($image) && !empty($image['src'])): ?>
                                <div class="overflow-hidden rounded-xl border border-slate-100 bg-slate-100/60">
                                    <img
                                        src="<?= asset(htmlspecialchars($image['src'], ENT_QUOTES)); ?>"
                                        alt="<?= htmlspecialchars($image['alt'] ?? ($name . ' UI'), ENT_QUOTES); ?>"
                                        class="h-36 w-full object-cover object-top transition-transform duration-300 group-hover:scale-[1.02]"
                                        loading="lazy"
                                    >
                                </div>
                            <?php endif; ?>

                            <div class="flex items-start justify-between gap-2">
                                <div class="space-y-1">
                                    <h3 class="text-sm sm:text-[15px] font-semibold leading-snug text-slate-900">
                                        <a
                                            href="<?= htmlspecialchars($href, ENT_QUOTES); ?>"
                                            class="hover:text-sky-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-sky-500"
                                            <?= $targetAttr; ?>
                                        >
                                            <?= htmlspecialchars($name, ENT_QUOTES); ?>
                                        </a>
                                    </h3>
                                    <?php if ($client): ?>
                                        <p class="text-[11px] text-slate-500">
                                            Client: <span class="font-medium text-slate-700">
                                                <?= htmlspecialchars($client, ENT_QUOTES); ?>
                                            </span>
                                        </p>
                                    <?php endif; ?>
                                </div>

                                <span class="inline-flex items-center rounded-full bg-slate-100 px-2 py-0.5 text-[10px] font-medium text-slate-700">
                                    <?= htmlspecialchars($typeLabel, ENT_QUOTES); ?>
                                </span>
                            </div>

                            <?php if (!empty($summary)): ?>
                                <p class="text-xs sm:text-[13px] text-slate-600 line-clamp-3">
                                    <?= htmlspecialchars($summary, ENT_QUOTES); ?>
                                </p>
                            <?php endif; ?>
                        </div>

                        <div class="mt-4 space-y-2">
                            <?php if (!empty($industries)): ?>
                                <div class="flex flex-wrap gap-1.5">
                                    <?php foreach ($industries as $indKey): ?>
                                        <?php if (!isset($allIndustries[$indKey])) continue; ?>
                                        <span class="inline-flex items-center rounded-full bg-slate-100 px-2 py-0.5 text-[10px] text-slate-700">
                                            <?= htmlspecialchars($allIndustries[$indKey], ENT_QUOTES); ?>
                                        </span>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($technologies)): ?>
                                <div class="flex flex-wrap gap-1">
                                    <?php foreach ($technologies as $techKey): ?>
                                        <?php if (!isset($allTechnologies[$techKey])) continue; ?>
                                        <span class="inline-flex items-center rounded-full border border-slate-200 bg-slate-50 px-2 py-0.5 text-[10px] text-slate-600">
                                            <?= htmlspecialchars($allTechnologies[$techKey], ENT_QUOTES); ?>
                                        </span>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($href)): ?>
                            <div class="pt-1">
                                <a
                                    href="<?= htmlspecialchars($href, ENT_QUOTES); ?>"
                                    class="inline-flex items-center gap-1 text-[11px] font-medium text-sky-700 hover:text-sky-600"
                                    <?= $targetAttr; ?>
                                >
                                    <span>
                                        <?= $caseStudyUrl
                                            ? 'View detailed case study'
                                            : ($isExternal ? 'Visit live product' : 'View project'); ?>
                                    </span>
                                    <span aria-hidden="true">↗</span>
                                </a>
                            </div>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
