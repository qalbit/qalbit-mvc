<?php
/**
 * Generic Case Study – Key Product Features & UX (CS6)
 *
 * Reusable section for all case studies.
 *
 * Expects:
 * - $caseStudy (array) from config('case_studies')['key']
 *
 * Example structure:
 *
 * 'sections' => [
 *   'features' => [
 *       'id'       => 'cs6-features',
 *       'title'    => 'Key product features & UX highlights',
 *       'subtitle' => 'Everything the team needs to keep operations aligned – in one place.',
 *       'items' => [
 *           [
 *               'name'        => 'Central schedule board',
 *               'description' => 'Calendar-style board showing all sessions, lanes and instructors.',
 *           ],
 *           // …
 *       ],
 *       'screenshot' => [
 *           'src' => '/images/case-studies/snappystat-schedule-board.png',
 *           'alt' => 'Schedule board UI with sessions and instructors',
 *       ],
 *   ],
 * ]
 */

$caseStudy = $caseStudy ?? [];

$featuresConfig = $caseStudy['sections']['features'] ?? [];

$sectionId = $featuresConfig['id'] ?? 'cs6-features';

$title = $featuresConfig['title']
    ?? 'Key product features & UX highlights';

$subtitle = $featuresConfig['subtitle']
    ?? 'A focused set of features that solve the day-to-day problems the team actually faces, instead of a long list of rarely-used options.';

// Feature items
$items = $featuresConfig['items'] ?? [
    [
        'name'        => 'Central operations dashboard',
        'description' => 'One place to see what is happening today, what is coming next and where attention is needed.',
    ],
    [
        'name'        => 'Role-based views',
        'description' => 'Tailored views for different roles, so each person sees the information they need without noise.',
    ],
    [
        'name'        => 'Smart validations',
        'description' => 'Validation rules that match real-world constraints, reducing the risk of operational mistakes.',
    ],
    [
        'name'        => 'Reusable templates',
        'description' => 'Templates for common workflows to speed up repeat activities and keep data consistent.',
    ],
];

// Clean out empty items
$items = array_values(array_filter($items, function ($item) {
    if (!is_array($item)) {
        return false;
    }
    $name = trim((string)($item['name'] ?? ''));
    $description = trim((string)($item['description'] ?? ''));
    return $name !== '' || $description !== '';
}));

// Screenshot / media
$screenshotConfig = $featuresConfig['screenshot'] ?? [];
$screenshotSrc = $screenshotConfig['src'] ?? ($caseStudy['banner'] ?? null);
$screenshotAlt = $screenshotConfig['alt'] ?? (($caseStudy['name'] ?? 'Case study') . ' product UI preview');
?>

<section
    id="<?= htmlspecialchars($sectionId, ENT_QUOTES); ?>"
    class="relative bg-slate-950 text-slate-50 py-14 sm:py-18 lg:py-20"
    data-cs-section="features"
>
    <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-sky-500/0 via-sky-500/40 to-emerald-400/0"></div>

    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 space-y-8">
        <!-- Header -->
        <header
            class="max-w-3xl space-y-3"
            data-cs-features-el="header"
        >
            <p class="text-[11px] font-semibold uppercase tracking-[0.16em] text-sky-400">
                Product features & UX
            </p>

            <h2 class="text-display-md sm:text-display-lg md:text-display-xl font-bold tracking-tight text-white">
                <?= htmlspecialchars($title, ENT_QUOTES); ?>
            </h2>

            <?php if (!empty($subtitle)): ?>
                <p class="text-sm sm:text-base text-slate-300 leading-relaxed">
                    <?= htmlspecialchars($subtitle, ENT_QUOTES); ?>
                </p>
            <?php endif; ?>
        </header>

        <!-- Layout: Features grid + Screenshot -->
        <div
            class="grid gap-8 lg:grid-cols-[minmax(0,3.1fr)_minmax(0,2.1fr)] lg:items-start"
            data-cs-features-el="layout"
        >
            <!-- Features grid -->
            <div class="space-y-4" data-cs-features-el="grid">
                <?php if (!empty($items)): ?>
                    <div class="grid gap-4 sm:gap-5 sm:grid-cols-2">
                        <?php foreach ($items as $item): ?>
                            <?php
                                $name = trim((string)($item['name'] ?? ''));
                                $description = trim((string)($item['description'] ?? ''));
                                if ($name === '' && $description === '') {
                                    continue;
                                }
                            ?>
                            <article
                                class="group relative flex flex-col rounded-3xl border border-slate-800 bg-slate-900/70
                                       p-4 sm:p-5 lg:p-6 shadow-[0_18px_45px_rgba(15,23,42,0.65)]
                                       transition-transform duration-200 hover:-translate-y-1 hover:border-sky-400/60"
                                data-cs-el="feature-card"
                            >
                                <div class="flex items-start gap-3">
                                    <div class="mt-0.5 flex h-7 w-7 flex-none items-center justify-center rounded-2xl bg-sky-500/15">
                                        <span class="h-2.5 w-2.5 rounded-full bg-sky-400/90"></span>
                                    </div>

                                    <div class="space-y-1">
                                        <?php if ($name !== ''): ?>
                                            <h3 class="text-sm sm:text-[15px] font-semibold text-slate-50">
                                                <?= htmlspecialchars($name, ENT_QUOTES); ?>
                                            </h3>
                                        <?php endif; ?>

                                        <?php if ($description !== ''): ?>
                                            <p class="text-xs sm:text-[13px] text-slate-300 leading-relaxed">
                                                <?= htmlspecialchars($description, ENT_QUOTES); ?>
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <p class="text-xs sm:text-sm text-slate-400">
                        Detailed feature breakdown for this case study will be added soon. Typically this section covers
                        the core modules and UX decisions that make the product effective for day-to-day use.
                    </p>
                <?php endif; ?>

                <p class="text-[11px] sm:text-xs text-slate-500 leading-relaxed">
                    Each feature is designed to slot into the team&apos;s existing workflows – with just enough structure
                    to reduce errors, but not so much friction that adoption becomes a struggle.
                </p>
            </div>

            <!-- Screenshot / product preview -->
            <aside
                class="lg:sticky lg:top-24"
                data-cs-features-el="screenshot"
            >
                <div
                    class="relative overflow-hidden rounded-3xl border border-slate-800 bg-gradient-to-b
                           from-slate-900 via-slate-950 to-slate-950 shadow-[0_24px_60px_rgba(15,23,42,0.9)]"
                >
                    <?php if (!empty($screenshotSrc)): ?>
                        <div class="aspect-[4/5] sm:aspect-[3/4]">
                            <img
                                src="<?= asset(htmlspecialchars($screenshotSrc, ENT_QUOTES)); ?>"
                                alt="<?= htmlspecialchars($screenshotAlt, ENT_QUOTES); ?>"
                                class="h-full w-full object-cover bg-white object-top"
                                loading="lazy"
                            />
                        </div>
                    <?php else: ?>
                        <div class="aspect-[4/5] sm:aspect-[3/4] flex items-center justify-center text-xs text-slate-500">
                            Product UI preview placeholder
                        </div>
                    <?php endif; ?>

                    <div
                        class="pointer-events-none absolute inset-x-4 bottom-4 flex items-center justify-between
                               rounded-2xl bg-slate-900/85 px-3 py-2 text-[11px] text-slate-100 backdrop-blur"
                    >
                        <span class="font-medium line-clamp-1">
                            Product UI in daily use
                        </span>
                        <span class="hidden sm:inline text-slate-300">
                            Designed for operational clarity
                        </span>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>
