<?php
/**
 * Home – Case Studies Section
 *
 * @var array       $caseStudies
 * @var string|null $title
 * @var string|null $subtitle
 */

$sectionTitle    = $title ?? 'Real products, <span class="bg-gradient-accent text-white px-2 rounded-xs">shipped with QalbIT</span>.';
$sectionSubtitle = $subtitle ?? 'Explore how we’ve helped startups and businesses launch reminder apps, club management systems, shooting analytics tools, and hiring platforms with robust UI/UX, web, and mobile development.';
?>

<?php if (!empty($caseStudies)): ?>
<section
    id="home-case-studies"
    class="py-16 bg-gray-50"
    aria-labelledby="case-studies-heading"
    data-case-studies
>
    <div class="max-w-6xl mx-auto px-4">
        <!-- Header -->
        <header class="max-w-3xl space-y-3" data-case-header>
            <span class="inline-flex items-center rounded-pill border border-slate-200 bg-white/80 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-muted-foreground shadow-soft">
                Recent work &amp; case studies
            </span>

            <h2
                id="case-studies-heading"
                class="text-display-sm sm:text-display-md md:text-display-lg font-bold"
            >
                <?= $sectionTitle ?>
            </h2>

            <p class="text-sm md:text-base text-muted-foreground">
                <?= htmlspecialchars($sectionSubtitle) ?>
            </p>
        </header>

        <!-- Layout: stacked cards + visual -->
        <div class="mt-10 grid gap-8 lg:grid-cols-[minmax(0,1.7fr)_minmax(0,1.3fr)] items-center">
            <!-- LEFT: Case study cards -->
            <div class="relative flex flex-col justify-center" data-case-list>
                <?php $i = 0; foreach ($caseStudies as $caseStudy): $i++; ?>
                    <?php
                    $logo        = $caseStudy['logo']       ?? '';
                    $logoAlt     = $caseStudy['logoAlt']    ?? (($caseStudy['name'] ?? '') . ' logo');
                    $caseTitle   = $caseStudy['name']       ?? '';
                    $description = $caseStudy['summary']    ?? '';
                    $techStacks  = $caseStudy['tech_stack'] ?? [];
                    $slug        = $caseStudy['slug']       ?? '';
                    $banner      = $caseStudy['banner']     ?? '';
                    $bannerAlt   = $caseStudy['bannerAlt']  ?? ($caseTitle ? $caseTitle . ' UI preview' : 'Case study visual');

                    $indexZero  = $i - 1;
                    $indexLabel = str_pad((string) $i, 2, '0', STR_PAD_LEFT);
                    ?>
                    <article
                        class="group relative rounded-2xl border border-slate-200 bg-card p-5 shadow-soft transition-all duration-200 hover:border-primary-400 hover:shadow-elevated <?= $i === 1 ? 'is-active' : '' ?>"
                        data-case-card
                        data-case-index="<?= $indexZero ?>"
                        itemscope
                        itemtype="https://schema.org/CreativeWork"
                    >
                        <!-- Top row: count + logo -->
                        <div class="flex items-center justify-between gap-3">
                            <p class="text-[11px] font-mono tracking-[0.18em] uppercase text-muted-foreground">
                                <span class="text-primary-700" itemprop="position"><?= $indexLabel ?></span>
                                <span class="mx-1">·</span>
                                Case Study
                            </p>

                            <?php if (!empty($logo)): ?>
                                <div class="h-7">
                                    <img
                                        src="<?= asset($logo) ?>"
                                        alt="<?= htmlspecialchars($logoAlt) ?>"
                                        loading="lazy"
                                        decoding="async"
                                        class="h-7 w-auto object-contain"
                                        itemprop="image"
                                    />
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Main content -->
                        <div class="mt-3 space-y-2">
                            <?php if (!empty($caseTitle)): ?>
                                <h3
                                    class="text-lg md:text-xl font-semibold text-foreground"
                                    itemprop="name"
                                >
                                    <?= htmlspecialchars($caseTitle) ?>
                                </h3>
                            <?php endif; ?>

                            <?php if (!empty($description)): ?>
                                <p
                                    class="text-sm text-muted-foreground"
                                    itemprop="description"
                                >
                                    <?= htmlspecialchars($description) ?>
                                </p>
                            <?php endif; ?>

                            <?php if (!empty($techStacks)): ?>
                                <p class="text-xs font-medium uppercase tracking-[0.16em] text-primary-700">
                                    <?php foreach ($techStacks as $stack): ?>
                                        <?= htmlspecialchars($stack) ?> ·
                                    <?php endforeach; ?>
                                </p>
                            <?php endif; ?>
                        </div>

                        <!-- Mobile visual (screenshot) -->
                        <?php if (!empty($banner)): ?>
                            <figure class="mt-4 rounded-xl overflow-hidden shadow-soft lg:hidden">
                                <img
                                    src="<?= asset($banner) ?>"
                                    alt="<?= htmlspecialchars($bannerAlt) ?>"
                                    loading="lazy"
                                    decoding="async"
                                    class="w-full h-48 object-cover md:h-56"
                                />
                            </figure>
                        <?php endif; ?>

                        <!-- Progress + CTA -->
                        <?php if (!empty($slug)): ?>
                            <div class="mt-4 flex items-center justify-between gap-3">
                                <div class="flex-1 h-[2px] rounded-full bg-slate-200 overflow-hidden">
                                    <span
                                        class="block h-full w-full origin-left scale-x-0 bg-primary-600"
                                        data-case-progress
                                    ></span>
                                </div>
                                <a
                                    itemprop="url"
                                    href="<?= route_url($slug) ?>"
                                    class="btn btn-primary-outline btn-radius-pill btn-sm whitespace-nowrap"
                                    aria-label="View <?= htmlspecialchars($caseTitle) ?> case study"
                                    title="View <?= htmlspecialchars($caseTitle) ?> case study"
                                    data-case-link
                                >
                                    View Case Study
                                </a>
                            </div>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>

            <!-- RIGHT: Large animated visual (desktop only) -->
            <div
                class="relative hidden w-full max-w-xl mx-auto lg:block lg:mx-0 aspect-[4/3]"
                data-case-visual
            >
                <!-- Soft brand gradient frame -->
                <div class="absolute inset-0 rounded-3xl bg-gradient-to-br from-white via-primary-50 to-accent-50 shadow-2xl"></div>

                <?php $idx = 0; foreach ($caseStudies as $caseStudy): ?>
                    <?php
                    $caseTitle = $caseStudy['name']      ?? '';
                    $banner    = $caseStudy['banner']    ?? '';
                    $bannerAlt = $caseStudy['bannerAlt'] ?? ($caseTitle ? $caseTitle . ' UI preview' : 'Case study visual');
                    ?>
                    <?php if (!empty($banner)): ?>
                        <figure
                            class="absolute inset-4 rounded-2xl overflow-hidden shadow-elevated <?= $idx === 0 ? 'is-active' : '' ?>"
                            data-case-image
                            data-case-index="<?= $idx ?>"
                        >
                            <img
                                src="<?= asset($banner) ?>"
                                alt="<?= htmlspecialchars($bannerAlt) ?>"
                                loading="lazy"
                                decoding="async"
                                class="h-full w-full object-cover"
                            />
                        </figure>
                    <?php endif; ?>
                    <?php $idx++; endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
