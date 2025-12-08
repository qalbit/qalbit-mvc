<?php
/**
 * Portfolio Hero – Compact
 *
 * Expects:
 * - $page (array)        from config('portfolio.page')
 * - $sections (array)    from config('portfolio.page.sections')
 */

$page       = $page       ?? [];
$sections   = $sections   ?? [];
$heroConfig = $sections['hero'] ?? [];

$eyebrow  = $heroConfig['eyebrow']  ?? 'Our work · Portfolio';
$title    = $heroConfig['title']    ?? ($page['h1'] ?? 'Selected projects and case studies.');
$subtitle = $heroConfig['subtitle'] ?? ($page['summary'] ?? '');

$primaryCta   = $heroConfig['primary_cta']   ?? [];
$secondaryCta = $heroConfig['secondary_cta'] ?? [];

$primaryCtaLabel   = $primaryCta['label'] ?? 'Discuss your project';
$primaryCtaHref    = $primaryCta['href']  ?? '/contact-us/?ref=portfolio-hero';
$secondaryCtaLabel = $secondaryCta['label'] ?? 'Browse our recent work';
$secondaryCtaHref  = $secondaryCta['href']  ?? '/portfolio/';
?>

<section
    id="<?= htmlspecialchars($heroConfig['id'] ?? 'portfolio-hero', ENT_QUOTES); ?>"
    class="relative overflow-hidden bg-slate-50 text-slate-900 py-4 sm:py-5 lg:py-6"
    data-portfolio-section="hero"
>
    <div class="relative mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 space-y-3 md:space-y-4">

        <!-- Breadcrumbs -->
        <nav class="text-[11px] font-medium text-slate-600" aria-label="Breadcrumb">
            <ol class="flex flex-wrap items-center gap-1">
                <li>
                    <a href="/" class="hover:text-sky-500 transition-colors">Home</a>
                </li>
                <li class="text-slate-400">/</li>
                <li aria-current="page" class="text-slate-900">
                    Portfolio
                </li>
            </ol>
        </nav>

        <div class="grid gap-4 lg:grid-cols-[minmax(0,3fr)_minmax(0,2fr)] lg:items-start">
            <!-- Left: main copy -->
            <div class="space-y-3" data-portfolio-el="hero-copy">
                <!-- Eyebrow -->
                <?php if (!empty($eyebrow)): ?>
                    <span
                        class="inline-flex items-center rounded-full border border-slate-200 bg-white/90 px-2.5 py-0.5
                               text-[10px] font-semibold uppercase tracking-[0.16em] text-slate-600"
                    >
                        <?= htmlspecialchars($eyebrow, ENT_QUOTES); ?>
                    </span>
                <?php endif; ?>

                <!-- Title -->
                <h1 class="text-balance text-xl sm:text-2xl md:text-4xl font-bold leading-snug">
                    <?= $title ?>
                </h1>

                <!-- Subtitle / intro -->
                <?php if (!empty($subtitle)): ?>
                    <p class="max-w-2xl text-xs sm:text-[13px] leading-relaxed text-slate-600">
                        <?= htmlspecialchars($subtitle, ENT_QUOTES); ?>
                    </p>
                <?php endif; ?>

                <!-- CTAs -->
                <div class="flex flex-col items-start gap-2">
                    <div class="flex flex-col sm:flex-row sm:flex-wrap items-stretch sm:items-center gap-2.5">
                        <a
                            href="<?= htmlspecialchars($primaryCtaHref, ENT_QUOTES); ?>"
                            class="btn btn-accent btn-radius-pill text-xs sm:text-[13px] px-4 py-2"
                            data-portfolio-el="hero-primary-cta"
                        >
                            <?= htmlspecialchars($primaryCtaLabel, ENT_QUOTES); ?>
                        </a>

                        <a
                            href="<?= htmlspecialchars($secondaryCtaHref, ENT_QUOTES); ?>"
                            class="btn btn-primary-outline btn-radius-pill text-xs sm:text-[13px] px-4 py-2"
                            data-portfolio-el="hero-secondary-cta"
                        >
                            <?= htmlspecialchars($secondaryCtaLabel, ENT_QUOTES); ?>
                        </a>
                    </div>

                    <p class="text-[10px] sm:text-[11px] text-slate-600">
                        Share your industry, current product stage and tech stack – we’ll respond with relevant examples
                        and a practical way to move forward.
                    </p>
                </div>
            </div>

            <!-- Right: snapshot / context -->
            <aside
                class="space-y-3 rounded-2xl border border-slate-200 bg-white/80 p-3.5 sm:p-4 lg:p-4 shadow-soft backdrop-blur
                       text-[11px] sm:text-xs"
                data-portfolio-el="hero-aside"
            >
                <h2 class="text-[10px] font-semibold uppercase tracking-[0.16em] text-slate-600">
                    Portfolio snapshot
                </h2>

                <p class="text-[11px] sm:text-xs text-slate-600 leading-relaxed">
                    From scheduling platforms and HR tech portals to ISP systems and consumer apps, we focus on building
                    production-ready software for long-term teams.
                </p>

                <dl class="grid grid-cols-2 gap-x-3 gap-y-2">
                    <div class="space-y-0.5">
                        <dt class="text-[10px] text-slate-500">Typical work</dt>
                        <dd class="text-xs font-medium text-slate-900">
                            SaaS products, booking platforms, internal tools
                        </dd>
                    </div>
                    <div class="space-y-0.5">
                        <dt class="text-[10px] text-slate-500">Engagements</dt>
                        <dd class="text-xs font-medium text-slate-900">
                            MVP builds, rebuilds, product teams
                        </dd>
                    </div>
                    <div class="space-y-0.5">
                        <dt class="text-[10px] text-slate-500">Tech stacks</dt>
                        <dd class="text-xs font-medium text-slate-900">
                            Laravel, Node.js, React / Next.js, Flutter
                        </dd>
                    </div>
                    <div class="space-y-0.5">
                        <dt class="text-[10px] text-slate-500">Collaboration</dt>
                        <dd class="text-xs font-medium text-slate-900">
                            Remote-first, transparent, product-focused
                        </dd>
                    </div>
                </dl>

                <p class="text-[10px] text-slate-500 leading-relaxed">
                    Looking for something specific? Use the filters below or
                    <a
                        href="/contact-us/?ref=portfolio-hero-shortlist"
                        class="text-sky-600 hover:text-sky-500 font-medium"
                    >
                        tell us what you’re building
                    </a>
                    and we’ll shortlist the most relevant examples.
                </p>
            </aside>
        </div>
    </div>
</section>
