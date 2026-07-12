<?php
/**
 * Home – Case Studies Section
 *
 * Featured case study spotlight + supporting grid. All content is visible
 * (no carousel) so every case study is readable and crawlable.
 *
 * @var array       $caseStudies
 * @var string|null $title
 * @var string|null $subtitle
 */

$sectionTitle    = $title ?? 'Real products, shipped with QalbIT.';
$sectionSubtitle = $subtitle ?? 'Explore how we’ve helped startups and businesses launch SaaS platforms, club management systems, analytics tools and hiring platforms with robust UI/UX, web, and mobile development.';

$caseList = array_values($caseStudies ?? []);
$featured = $caseList[0] ?? null;
$others   = array_slice($caseList, 1);
?>

<?php if (!empty($caseList)): ?>
<section
    id="home-case-studies"
    class="py-16 bg-gray-50"
    aria-labelledby="case-studies-heading"
    itemscope
    itemtype="https://schema.org/ItemList"
>
    <div class="max-w-6xl mx-auto px-4">
        <!-- Header -->
        <header class="flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
            <div class="max-w-2xl space-y-3">
                <span class="inline-flex items-center rounded-pill border border-slate-200 bg-white/80 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-muted-foreground shadow-soft">
                    Recent work &amp; case studies
                </span>

                <h2
                    id="case-studies-heading"
                    class="text-display-sm sm:text-display-md md:text-display-lg font-bold"
                    itemprop="name"
                >
                    <?= $sectionTitle ?>
                </h2>

                <p class="text-sm md:text-base text-muted-foreground">
                    <?= htmlspecialchars($sectionSubtitle) ?>
                </p>
            </div>

            <a
                href="<?= route_url('/case-studies/') ?>"
                class="btn btn-primary-outline btn-radius-pill hidden flex-none md:inline-flex"
                title="Browse all QalbIT case studies"
            >
                View all case studies
            </a>
        </header>

        <?php if ($featured): ?>
            <?php
            $fName      = $featured['name']       ?? '';
            $fSummary   = $featured['summary']    ?? '';
            $fLogo      = $featured['logo']       ?? '';
            $fLogoAlt   = $featured['logoAlt']    ?? ($fName . ' logo');
            $fBanner    = $featured['featured_banner'] ?? $featured['banner'] ?? '';
            $fBannerAlt = $featured['bannerAlt']  ?? ($fName ? $fName . ' UI preview' : 'Case study visual');
            $fIndustry  = $featured['industry']   ?? '';
            $fSlug      = $featured['slug']       ?? '';
            $fStacks    = array_slice($featured['tech_stack'] ?? [], 0, 4);
            $fMetrics   = array_slice($featured['sections']['results']['metrics'] ?? [], 0, 3);
            ?>
            <!-- Featured case study -->
            <article
                class="mt-10 overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-soft transition-shadow hover:shadow-elevated"
                itemprop="itemListElement"
                itemscope
                itemtype="https://schema.org/CreativeWork"
            >
                <meta itemprop="position" content="1">
                <div class="grid lg:grid-cols-[minmax(0,1.1fr)_minmax(0,1fr)]">
                    <!-- Copy -->
                    <div class="flex flex-col p-6 sm:p-8 lg:p-10">
                        <div class="flex flex-wrap items-center gap-2">
                            <span class="inline-flex items-center rounded-full bg-primary-50 px-2.5 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-primary-800">
                                Featured case study
                            </span>
                            <?php if ($fIndustry !== ''): ?>
                                <span class="text-[11px] font-medium uppercase tracking-[0.14em] text-slate-500">
                                    <?= htmlspecialchars($fIndustry) ?>
                                </span>
                            <?php endif; ?>
                        </div>

                        <?php if (!empty($fLogo)): ?>
                            <img
                                src="<?= asset($fLogo) ?>"
                                alt="<?= htmlspecialchars($fLogoAlt) ?>"
                                loading="lazy"
                                decoding="async"
                                class="mt-5 h-8 w-auto self-start object-contain"
                                itemprop="image"
                            />
                        <?php endif; ?>

                        <h3 class="mt-4 text-xl font-bold text-foreground md:text-2xl" itemprop="name">
                            <?= htmlspecialchars($fName) ?>
                        </h3>

                        <p class="mt-3 text-sm text-muted-foreground md:text-base" itemprop="description">
                            <?= htmlspecialchars($fSummary) ?>
                        </p>

                        <?php if (!empty($fMetrics)): ?>
                            <dl class="mt-6 grid grid-cols-3 gap-4 border-t border-slate-100 pt-5">
                                <?php foreach ($fMetrics as $metric): ?>
                                    <div>
                                        <dd class="text-sm font-bold text-slate-900 sm:text-base">
                                            <?= htmlspecialchars($metric['value'] ?? '') ?>
                                        </dd>
                                        <dt class="mt-1 text-[11px] font-medium uppercase tracking-wide text-slate-500">
                                            <?= htmlspecialchars($metric['label'] ?? '') ?>
                                        </dt>
                                    </div>
                                <?php endforeach; ?>
                            </dl>
                        <?php endif; ?>

                        <?php if (!empty($fStacks)): ?>
                            <ul class="mt-5 flex flex-wrap gap-1.5" aria-label="Technology stack">
                                <?php foreach ($fStacks as $stack): ?>
                                    <li class="rounded-full bg-slate-100 px-2.5 py-1 text-[11px] font-medium text-slate-600">
                                        <?= htmlspecialchars($stack) ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                        <?php if (!empty($fSlug)): ?>
                            <div class="mt-auto pt-7">
                                <a
                                    itemprop="url"
                                    href="<?= route_url($fSlug) ?>"
                                    class="btn btn-primary btn-radius-pill"
                                    title="Read the <?= htmlspecialchars($fName) ?> case study"
                                >
                                    Read the full case study
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Visual: fills the panel width; vertical gaps blend into the
                         screenshot's own #18202b background so it reads as one surface -->
                    <?php if (!empty($fBanner)): ?>
                        <div class="relative flex min-h-[260px] items-center overflow-hidden bg-[#18202b] lg:min-h-0">
                            <img
                                src="<?= asset($fBanner) ?>"
                                alt="<?= htmlspecialchars($fBannerAlt) ?>"
                                loading="lazy"
                                decoding="async"
                                class="h-auto w-full"
                            />
                        </div>
                    <?php endif; ?>
                </div>
            </article>
        <?php endif; ?>

        <?php if (!empty($others)): ?>
            <!-- Supporting case studies -->
            <div class="mt-6 grid gap-5 sm:grid-cols-2">
                <?php $position = 2; foreach ($others as $caseStudy): ?>
                    <?php
                    $name      = $caseStudy['name']      ?? '';
                    $summary   = $caseStudy['summary']   ?? '';
                    $logo      = $caseStudy['logo']      ?? '';
                    $logoAlt   = $caseStudy['logoAlt']   ?? ($name . ' logo');
                    $industry  = $caseStudy['industry']  ?? '';
                    $slug      = $caseStudy['slug']      ?? '';
                    $stacks    = array_slice($caseStudy['tech_stack'] ?? [], 0, 3);
                    ?>
                    <article
                        class="group relative flex flex-col rounded-2xl border border-slate-200 bg-white p-5 shadow-soft transition-all duration-200 hover:-translate-y-0.5 hover:border-primary-400 hover:shadow-elevated sm:p-6"
                        itemprop="itemListElement"
                        itemscope
                        itemtype="https://schema.org/CreativeWork"
                    >
                        <meta itemprop="position" content="<?= (int) $position ?>">

                        <div class="flex items-center justify-between gap-3">
                            <?php if (!empty($logo)): ?>
                                <img
                                    src="<?= asset($logo) ?>"
                                    alt="<?= htmlspecialchars($logoAlt) ?>"
                                    loading="lazy"
                                    decoding="async"
                                    class="h-6 w-auto object-contain"
                                    itemprop="image"
                                />
                            <?php endif; ?>
                            <?php if ($industry !== ''): ?>
                                <span class="text-[10px] font-medium uppercase tracking-[0.14em] text-slate-500">
                                    <?= htmlspecialchars($industry) ?>
                                </span>
                            <?php endif; ?>
                        </div>

                        <h3 class="mt-4 text-base font-semibold text-foreground transition-colors group-hover:text-primary-700" itemprop="name">
                            <?php if (!empty($slug)): ?>
                                <a
                                    itemprop="url"
                                    href="<?= route_url($slug) ?>"
                                    class="after:absolute after:inset-0"
                                    title="Read the <?= htmlspecialchars($name) ?> case study"
                                >
                                    <?= htmlspecialchars($name) ?>
                                </a>
                            <?php else: ?>
                                <?= htmlspecialchars($name) ?>
                            <?php endif; ?>
                        </h3>

                        <p class="mt-2 text-sm text-muted-foreground line-clamp-2" itemprop="description">
                            <?= htmlspecialchars($summary) ?>
                        </p>

                        <div class="mt-auto flex items-center justify-between gap-3 border-t border-slate-100 pt-4">
                            <?php if (!empty($stacks)): ?>
                                <p class="text-[11px] font-medium uppercase tracking-[0.14em] text-primary-700">
                                    <?= htmlspecialchars(implode(' · ', $stacks)) ?>
                                </p>
                            <?php endif; ?>
                            <span class="ml-auto inline-flex flex-none items-center text-xs font-semibold text-primary-700" aria-hidden="true">
                                Read case study
                                <span class="ml-1 inline-block transition-transform group-hover:translate-x-0.5">→</span>
                            </span>
                        </div>
                    </article>
                <?php $position++; endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- Mobile: view all -->
        <div class="mt-8 text-center md:hidden">
            <a
                href="<?= route_url('/case-studies/') ?>"
                class="btn btn-primary-outline btn-radius-pill"
                title="Browse all QalbIT case studies"
            >
                View all case studies
            </a>
        </div>
    </div>
</section>
<?php endif; ?>
