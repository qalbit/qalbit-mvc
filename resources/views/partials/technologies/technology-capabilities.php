<?php
/**
 * Generic Technology Capabilities (Section S3)
 *
 * Expects:
 * - $technology (array)
 *
 * Recommended shape in config('technologies.php'):
 *
 * 'capabilities' => [
 *     'id'      => 'saas-capabilities',                 // optional section id
 *     'eyebrow' => 'What we build for SaaS teams',      // small label above h2
 *     'title'   => 'SaaS capabilities we usually take ownership of',
 *     'intro'   => '1–2 lines explaining what kind of modules / flows this technology covers.',
 *
 *     'items'   => [
 *         [
 *             'label'       => 'Multi-tenant SaaS architecture',
 *             'description' => 'Design tenant models, user roles, permissions and data isolation.',
 *             'badge'       => 'Architecture',          // optional
 *             'icon'        => '/assets/icons/tenant.svg', // optional
 *         ],
 *         ...
 *     ],
 *
 *     'cta' => [
 *         'label' => 'Talk through your SaaS roadmap',
 *         'url'   => '/contact-us/?technology=saas',       // optional CTA below grid
 *     ],
 * ]
 */

$technology = $technology ?? [];
$serviceName = $technology['name'] ?? 'Technology';

$capabilities = $technology['capabilities'] ?? [];

$sectionId = $capabilities['id']      ?? 'technology-capabilities';
$eyebrow   = $capabilities['eyebrow'] ?? 'What we can build for you';
$title     = $capabilities['title']
    ?? ($serviceName . ' capabilities we usually take ownership of');
$intro     = $capabilities['intro']
    ?? 'Here are the typical modules, flows and responsibilities we take on for this technology.';

$items     = $capabilities['items'] ?? [];
$cta       = $capabilities['cta']   ?? null;

// Fallback items so section never renders completely empty
if (empty($items)) {
    $items = [
        [
            'label'       => 'Discovery and solution design',
            'description' => 'Clarify goals, constraints and architecture before committing to long builds.',
            'badge'       => 'Discovery',
        ],
        [
            'label'       => 'End-to-end implementation',
            'description' => 'Frontend, backend, APIs and integrations implemented by one aligned team.',
            'badge'       => 'Delivery',
        ],
        [
            'label'       => 'Long-term support & growth',
            'description' => 'Stabilise, monitor and extend your product with an ongoing roadmap.',
            'badge'       => 'Growth',
        ],
    ];
}
?>

<section
    id="<?= htmlspecialchars($sectionId, ENT_QUOTES); ?>"
    class="border-t border-slate-100 bg-slate-950 py-16 sm:py-20 lg:py-24"
    aria-labelledby="technology-capabilities-heading"
    data-section-technology-capabilities
>
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <!-- Heading -->
        <header class="mb-10 max-w-3xl space-y-3">
            <?php if (!empty($eyebrow)): ?>
                <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-sky-300">
                    <?= htmlspecialchars($eyebrow, ENT_QUOTES); ?>
                </p>
            <?php endif; ?>

            <h2
                id="technology-capabilities-heading"
                class="text-display-md sm:text-display-lg md:text-display-xl font-bold text-slate-50"
            >
                <?= htmlspecialchars($title, ENT_QUOTES); ?>
            </h2>

            <p class="text-sm sm:text-base text-slate-300">
                <?= htmlspecialchars($intro, ENT_QUOTES); ?>
            </p>
        </header>

        <!-- Capabilities grid -->
        <?php if (!empty($items)): ?>
            <div
                class="grid gap-6 sm:gap-7 md:grid-cols-2 lg:grid-cols-3"
                data-technology-capabilities-grid
            >
                <?php foreach ($items as $item): ?>
                    <?php
                        if (!is_array($item)) continue;

                        $label       = trim($item['label']       ?? '');
                        $description = trim($item['description'] ?? '');
                        $badge       = trim($item['badge']       ?? '');
                        $icon        = $item['icon']             ?? null;

                        if ($label === '' && $description === '') {
                            continue;
                        }
                    ?>
                    <article
                        class="group relative flex flex-col rounded-2xl border border-slate-800/80
                               bg-slate-900/70 p-5 sm:p-6 lg:p-7 shadow-sm shadow-black/20
                               hover:border-sky-500/60 hover:bg-slate-900/90 transition-colors"
                        data-technology-capability-card
                    >
                        <div class="mb-4 flex items-start justify-between gap-3">
                            <div class="space-y-1.5">
                                <?php if ($label !== ''): ?>
                                    <h3 class="text-sm sm:text-base font-semibold text-slate-50 group-hover:text-sky-300">
                                        <?= htmlspecialchars($label, ENT_QUOTES); ?>
                                    </h3>
                                <?php endif; ?>

                                <?php if ($badge !== ''): ?>
                                    <p class="inline-flex items-center rounded-full bg-slate-800/80 px-2.5 py-0.5
                                              text-[11px] font-medium uppercase tracking-[0.18em] text-slate-300">
                                        <span class="mr-1.5 h-1.5 w-1.5 rounded-full bg-sky-400"></span>
                                        <?= htmlspecialchars($badge, ENT_QUOTES); ?>
                                    </p>
                                <?php endif; ?>
                            </div>

                            <?php if (!empty($icon)): ?>
                                <div class="flex-none">
                                    <img
                                        src="<?= asset($icon); ?>"
                                        alt="<?= htmlspecialchars($label !== '' ? $label : 'Capability icon', ENT_QUOTES); ?>"
                                        loading="lazy"
                                        width="40"
                                        height="40"
                                        class="h-10 w-10 sm:h-11 sm:w-11 object-contain"
                                    >
                                </div>
                            <?php endif; ?>
                        </div>

                        <?php if ($description !== ''): ?>
                            <p class="text-xs sm:text-sm text-slate-200 flex-1">
                                <?= htmlspecialchars($description, ENT_QUOTES); ?>
                            </p>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="text-sm text-slate-300">
                We are refining this section. In the meantime, please
                <a href="/contact-us/" class="text-sky-300 underline">contact us</a>
                to discuss your requirements.
            </p>
        <?php endif; ?>

        <!-- Optional CTA below grid -->
        <?php
            $ctaLabel = is_array($cta) ? trim($cta['label'] ?? '') : '';
            $ctaUrl   = is_array($cta) ? trim($cta['url']   ?? '') : '';
        ?>

        <?php if ($ctaLabel !== '' && $ctaUrl !== ''): ?>
            <div class="mt-10 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <p class="text-[11px] text-slate-400 max-w-md">
                    Want to see how these capabilities map to your product? Share a quick overview and we will
                    respond with a practical next step.
                </p>
                <a
                    href="<?= htmlspecialchars($ctaUrl, ENT_QUOTES); ?>"
                    class="inline-flex items-center justify-center rounded-full border border-sky-400/70
                           bg-sky-500/10 px-4 py-2 text-xs font-semibold text-sky-100 hover:bg-sky-500/20
                           transition-colors"
                >
                    <?= htmlspecialchars($ctaLabel, ENT_QUOTES); ?>
                    <span class="ml-1.5 inline-block translate-y-px">→</span>
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>
