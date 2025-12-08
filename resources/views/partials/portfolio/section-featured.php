<?php
/**
 * Portfolio Featured Band (P3) – Dark Variant
 *
 * Expects:
 * - $sections        (array) from config('portfolio.page.sections')
 * - $featuredItems   (array) filtered/collected in controller
 * - $allIndustries   (array) from config('portfolio.industries')
 * - $allTechnologies (array) from config('portfolio.technologies')
 */

$sections        = $sections        ?? [];
$featuredItems   = $featuredItems   ?? [];
$allIndustries   = $allIndustries   ?? [];
$allTechnologies = $allTechnologies ?? [];

if (empty($featuredItems)) {
    // Nothing to render
    return;
}

$config    = $sections['featured'] ?? [];
$sectionId = $config['id']       ?? 'portfolio-featured';
$eyebrow   = $config['eyebrow']  ?? 'Highlights';
$title     = $config['title']    ?? 'Featured projects';
$subtitle  = $config['subtitle'] ?? 'A few representative projects across industries and technology stacks.';
?>

<section
    id="<?= htmlspecialchars($sectionId, ENT_QUOTES); ?>"
    class="border-t border-slate-800 bg-slate-950 text-slate-50 py-8 sm:py-10 lg:py-12"
    data-portfolio-section="featured"
>
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 space-y-5 sm:space-y-6">
        <header class="space-y-2 max-w-3xl">
            <p class="text-[11px] sm:text-xs font-semibold uppercase tracking-[0.16em] text-sky-400">
                <?= htmlspecialchars($eyebrow, ENT_QUOTES); ?>
            </p>
            <h2 class="text-lg sm:text-xl md:text-2xl font-semibold text-slate-50">
                <?= htmlspecialchars($title, ENT_QUOTES); ?>
            </h2>
            <?php if (!empty($subtitle)): ?>
                <p class="text-xs sm:text-sm text-slate-300">
                    <?= htmlspecialchars($subtitle, ENT_QUOTES); ?>
                </p>
            <?php endif; ?>
        </header>

        <div
            class="grid gap-4 sm:gap-5 md:grid-cols-2 lg:grid-cols-3"
            data-portfolio-el="featured-grid"
        >
            <?php foreach ($featuredItems as $item): ?>
                <?php
                    $name        = $item['name']        ?? 'Project';
                    $client      = $item['client']      ?? null;
                    $summary     = $item['summary']     ?? '';
                    $type        = $item['type']        ?? ($item['kind'] ?? null);
                    $industries  = $item['industries']  ?? [];
                    $technologies= $item['technologies']?? [];

                    $caseStudyUrl = $item['case_study_url'] ?? null;
                    $externalUrl  = $item['external_url']   ?? null;

                    $href = $caseStudyUrl ?: ($externalUrl ?: '#');
                    $isExternal = $externalUrl && !$caseStudyUrl;

                    $targetAttr = $isExternal ? ' target="_blank" rel="noopener noreferrer"' : '';

                    // Image support: either 'image' => ['src','alt'] or legacy 'thumbnail'
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
                    class="group flex flex-col justify-between rounded-2xl border border-slate-800 bg-slate-900/70 p-4 sm:p-5 shadow-soft hover:shadow-md hover:border-sky-500/60 transition"
                    data-portfolio-el="featured-card"
                >
                    <div class="space-y-3">
                        <div class="flex items-center justify-between gap-2">
                            <span class="inline-flex items-center rounded-full bg-slate-800 px-2 py-0.5 text-[10px] font-medium text-slate-200">
                                <?= htmlspecialchars($typeLabel, ENT_QUOTES); ?>
                            </span>
                            <?php if ($client): ?>
                                <span class="text-[10px] text-slate-400">
                                    Client: <span class="font-medium text-slate-100">
                                        <?= htmlspecialchars($client, ENT_QUOTES); ?>
                                    </span>
                                </span>
                            <?php endif; ?>
                        </div>

                        <div class="space-y-1">
                            <h3 class="text-sm sm:text-[15px] font-semibold leading-snug">
                                <a
                                    href="<?= htmlspecialchars($href, ENT_QUOTES); ?>"
                                    class="hover:text-sky-300 focus:outline-none focus-visible:ring-2 focus-visible:ring-sky-500"
                                    <?= $targetAttr; ?>
                                >
                                    <?= htmlspecialchars($name, ENT_QUOTES); ?>
                                </a>
                            </h3>
                            <?php if (!empty($summary)): ?>
                                <p class="text-xs sm:text-[13px] text-slate-300 line-clamp-3">
                                    <?= htmlspecialchars($summary, ENT_QUOTES); ?>
                                </p>
                            <?php endif; ?>
                        </div>

                        <?php if (!empty($image) && !empty($image['src'])): ?>
                            <div class="overflow-hidden rounded-xl border border-slate-800 bg-slate-900">
                                <img
                                    src="<?= asset(htmlspecialchars($image['src'], ENT_QUOTES)); ?>"
                                    alt="<?= htmlspecialchars($image['alt'] ?? ($name . ' UI'), ENT_QUOTES); ?>"
                                    class="h-36 w-full object-cover object-top transition-transform duration-300 group-hover:scale-[1.02]"
                                    loading="lazy"
                                >
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mt-4 space-y-2">
                        <?php if (!empty($industries)): ?>
                            <div class="flex flex-wrap gap-1.5">
                                <?php foreach ($industries as $indKey): ?>
                                    <?php if (!isset($allIndustries[$indKey])) continue; ?>
                                    <span class="inline-flex items-center rounded-full bg-slate-800 px-2 py-0.5 text-[10px] text-slate-200">
                                        <?= htmlspecialchars($allIndustries[$indKey], ENT_QUOTES); ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($technologies)): ?>
                            <div class="flex flex-wrap gap-1">
                                <?php foreach ($technologies as $techKey): ?>
                                    <?php if (!isset($allTechnologies[$techKey])) continue; ?>
                                    <span class="inline-flex items-center rounded-full border border-slate-700 bg-slate-900 px-2 py-0.5 text-[10px] text-slate-300">
                                        <?= htmlspecialchars($allTechnologies[$techKey], ENT_QUOTES); ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <div class="pt-1">
                            <a
                                href="<?= htmlspecialchars($href, ENT_QUOTES); ?>"
                                class="inline-flex items-center gap-1 text-[11px] font-medium text-sky-300 hover:text-sky-200"
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
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
