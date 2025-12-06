<?php
/**
 * Generic Service Use Cases (Section S5)
 *
 * Expects:
 * - $service (array)
 *
 * Recommended shape in config('services.php'):
 *
 * 'use_cases' => [
 *     'id'      => 'saas-use-cases', // optional section id
 *     'eyebrow' => 'Where SaaS development fits best',
 *     'title'   => 'SaaS products and business models we typically build',
 *     'intro'   => 'Short intro sentence or two.',
 *
 *     'items'   => [
 *         [
 *             'label'       => 'Subscription-based SaaS platforms',
 *             'description' => 'Membership, recurring billing, free trials, coupons and metered usage.',
 *             'audience'    => 'B2B, B2C, prosumer', // optional
 *             'badge'       => 'New build',          // optional
 *             'link'        => [                     // optional
 *                 'label' => 'See a similar case study',
 *                 'url'   => '/case-studies/urlcrop-saas-link-management/',
 *             ],
 *         ],
 *         ...
 *     ],
 *
 *     'cta' => [
 *         'label' => 'Check if your SaaS idea fits here',
 *         'url'   => '/contact-us/?service=saas&topic=use-cases',
 *     ],
 * ]
 */

$service     = $service ?? [];
$serviceName = $service['name'] ?? 'Service';

$useCases = $service['use_cases'] ?? [];

$sectionId = $useCases['id']      ?? 'service-use-cases';
$eyebrow   = $useCases['eyebrow'] ?? 'Where this service fits best';
$title     = $useCases['title']
    ?? ('When to choose ' . $serviceName . ' with QalbIT');
$intro     = $useCases['intro']
    ?? 'Here are typical scenarios where this service is the right fit, based on projects we run most often.';

$items = $useCases['items'] ?? [];
$cta   = $useCases['cta']   ?? null;

// Fallback if nothing configured
if (empty($items)) {
    $items = [
        [
            'label'       => 'You are planning a new digital product',
            'description' => 'You have a clear problem to solve and want a partner to design and build the first reliable version, not just a quick prototype.',
            'audience'    => 'Founders, product teams',
        ],
        [
            'label'       => 'You want to modernise or rebuild an existing system',
            'description' => 'Your current tool is slow, fragile or expensive to maintain, and you want a cleaner, modern stack with room for growth.',
            'audience'    => 'SMBs, growing companies',
        ],
        [
            'label'       => 'You need a long-term product partner',
            'description' => 'You want a small, senior team that understands your domain and can own roadmaps, releases and technical decisions with you.',
            'audience'    => 'Businesses where software is core',
        ],
    ];
}
?>

<section
    id="<?= htmlspecialchars($sectionId, ENT_QUOTES); ?>"
    class="border-t border-slate-100 bg-white py-16 sm:py-20 lg:py-24"
    aria-labelledby="service-use-cases-heading"
    data-section-service-use-cases
    itemscope
    itemtype="https://schema.org/ItemList"
>
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <!-- Heading -->
        <header class="mb-10 max-w-3xl space-y-3">
            <?php if (!empty($eyebrow)): ?>
                <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-sky-700">
                    <?= htmlspecialchars($eyebrow, ENT_QUOTES); ?>
                </p>
            <?php endif; ?>

            <h2
                id="service-use-cases-heading"
                class="text-display-md sm:text-display-lg md:text-display-xl font-bold text-slate-900"
                itemprop="name"
            >
                <?= htmlspecialchars($title, ENT_QUOTES); ?>
            </h2>

            <p class="text-sm sm:text-base text-slate-600">
                <?= htmlspecialchars($intro, ENT_QUOTES); ?>
            </p>
        </header>

        <!-- Use case list -->
        <?php if (!empty($items)): ?>
            <div
                class="grid gap-6 md:grid-cols-2"
                data-service-use-cases-grid
            >
                <?php
                    $position = 1;
                    foreach ($items as $item):
                        if (!is_array($item)) continue;

                        $label       = trim($item['label']       ?? '');
                        $description = trim($item['description'] ?? '');
                        $audience    = trim($item['audience']    ?? '');
                        $badge       = trim($item['badge']       ?? '');
                        $link        = $item['link']             ?? null;

                        if ($label === '' && $description === '') {
                            continue;
                        }

                        $linkLabel = '';
                        $linkUrl   = '';

                        if (is_array($link)) {
                            $linkLabel = trim($link['label'] ?? '');
                            $linkUrl   = trim($link['url']   ?? '');
                        }
                ?>
                    <article
                        class="group flex flex-col rounded-2xl border border-slate-200 bg-slate-50 px-4 py-4 sm:px-6 sm:py-5 lg:px-7 lg:py-6 shadow-sm hover:border-sky-300 hover:bg-white hover:shadow-md transition-colors"
                        itemprop="itemListElement"
                        itemscope
                        itemtype="https://schema.org/Thing"
                    >
                        <meta itemprop="position" content="<?= (int) $position; ?>">

                        <div class="mb-3 flex items-start justify-between gap-3">
                            <div>
                                <?php if ($label !== ''): ?>
                                    <h3 class="text-sm sm:text-base font-semibold text-slate-900 group-hover:text-sky-700" itemprop="name">
                                        <?= htmlspecialchars($label, ENT_QUOTES); ?>
                                    </h3>
                                <?php endif; ?>

                                <?php if ($audience !== ''): ?>
                                    <p class="mt-0.5 text-[11px] font-medium uppercase tracking-[0.16em] text-slate-500">
                                        For <?= htmlspecialchars($audience, ENT_QUOTES); ?>
                                    </p>
                                <?php endif; ?>
                            </div>

                            <?php if ($badge !== ''): ?>
                                <span class="inline-flex items-center whitespace-nowrap rounded-full bg-sky-50 px-2 py-0.5 text-[11px] font-semibold text-sky-700 border border-sky-100">
                                    <?= htmlspecialchars($badge, ENT_QUOTES); ?>
                                </span>
                            <?php endif; ?>
                        </div>

                        <?php if ($description !== ''): ?>
                            <p class="mb-3 text-xs sm:text-sm text-slate-700" itemprop="description">
                                <?= htmlspecialchars($description, ENT_QUOTES); ?>
                            </p>
                        <?php endif; ?>

                        <?php if ($linkLabel !== '' && $linkUrl !== ''): ?>
                            <div class="mt-auto pt-2">
                                <a
                                    href="<?= htmlspecialchars($linkUrl, ENT_QUOTES); ?>"
                                    class="inline-flex items-center text-xs font-semibold text-sky-700 hover:text-sky-600"
                                >
                                    <?= htmlspecialchars($linkLabel, ENT_QUOTES); ?>
                                    <span class="ml-1 inline-block translate-y-px">→</span>
                                </a>
                            </div>
                        <?php endif; ?>
                    </article>
                <?php
                    $position++;
                    endforeach;
                ?>
            </div>
        <?php else: ?>
            <p class="text-sm text-slate-600">
                This service is usually a good fit when software is directly tied to revenue, operations
                or customer experience. If you are unsure, share a short brief and we can confirm fit in a
                20–30 minute call.
            </p>
        <?php endif; ?>

        <!-- Optional CTA -->
        <?php
            $ctaLabel = is_array($cta) ? trim($cta['label'] ?? '') : '';
            $ctaUrl   = is_array($cta) ? trim($cta['url']   ?? '') : '';
        ?>

        <?php if ($ctaLabel !== '' && $ctaUrl !== ''): ?>
            <div class="mt-10 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <p class="text-[11px] text-slate-500 max-w-md">
                    Not sure if your idea or system belongs here? Send us a short description and we will
                    tell you honestly whether we are the right team for it.
                </p>
                <a
                    href="<?= htmlspecialchars($ctaUrl, ENT_QUOTES); ?>"
                    class="inline-flex items-center justify-center rounded-full border border-sky-600/80
                           bg-sky-600 px-4 py-2 text-xs font-semibold text-white hover:bg-sky-700
                           transition-colors"
                >
                    <?= htmlspecialchars($ctaLabel, ENT_QUOTES); ?>
                    <span class="ml-1.5 inline-block translate-y-px">→</span>
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>
