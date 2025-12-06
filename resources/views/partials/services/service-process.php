<?php
/**
 * Generic Service Process (Section S4)
 *
 * Expects:
 * - $service (array)
 *
 * Recommended shape in config('services.php'):
 *
 * 'process' => [
 *     'id'      => 'saas-process', // optional section id
 *     'eyebrow' => 'How SaaS development works with QalbIT',
 *     'title'   => 'A practical SaaS development process from idea to stable product',
 *     'intro'   => '1–2 sentences about how you run this service.',
 *
 *     'items'   => [
 *         [
 *             'step'        => 1,  // will be auto if missing
 *             'title'       => 'Product discovery & SaaS fit',
 *             'description' => 'What happens in this step.',
 *             'duration'    => '1–2 weeks',   // optional
 *             'outcome'     => 'Discovery doc, system overview', // optional
 *             'icon'        => '/assets/services/saas/step-discovery.svg', // optional
 *         ],
 *         ...
 *     ],
 *
 *     'cta' => [
 *         'label' => 'Schedule a SaaS discovery call',
 *         'url'   => '/contact-us/?service=saas#discovery',
 *     ],
 * ]
 */

$service = $service ?? [];
$serviceName = $service['name'] ?? 'Service';

$process = $service['process'] ?? [];

$sectionId = $process['id']      ?? 'service-process';
$eyebrow   = $process['eyebrow'] ?? 'How we typically run this service';
$title     = $process['title']
    ?? ('How ' . $serviceName . ' works with QalbIT');
$intro     = $process['intro']
    ?? 'We break work into practical phases so you always know what is happening now, what is next and what is expected from your side.';

$items     = $process['items'] ?? [];
$cta       = $process['cta']   ?? null;

// Fallback if no config provided
if (empty($items)) {
    $items = [
        [
            'step'        => 1,
            'title'       => 'Discovery & planning',
            'description' => 'Clarify goals, users, scope and constraints before we commit to a detailed plan.',
            'duration'    => 'Up to 2 weeks',
            'outcome'     => 'Discovery notes, high-level backlog, initial estimates.',
        ],
        [
            'step'        => 2,
            'title'       => 'Design & architecture',
            'description' => 'Define UX flows, architecture and technical decisions to reduce risk before development.',
            'duration'    => '1–3 weeks',
            'outcome'     => 'User flows, screens and system design ready for implementation.',
        ],
        [
            'step'        => 3,
            'title'       => 'Build, test & launch',
            'description' => 'Iterative implementation, QA and deployment to your preferred environment.',
            'duration'    => 'Varies by scope',
            'outcome'     => 'Live product and a clear roadmap for next iterations.',
        ],
    ];
}
?>

<section
    id="<?= htmlspecialchars($sectionId, ENT_QUOTES); ?>"
    class="border-t border-slate-100 bg-slate-50 py-16 sm:py-20 lg:py-24"
    aria-labelledby="service-process-heading"
    data-section-service-process
    itemscope
    itemtype="https://schema.org/HowTo"
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
                id="service-process-heading"
                class="text-display-md sm:text-display-lg md:text-display-xl font-bold text-slate-900"
                itemprop="name"
            >
                <?= htmlspecialchars($title, ENT_QUOTES); ?>
            </h2>

            <p class="text-sm sm:text-base text-slate-600" itemprop="description">
                <?= htmlspecialchars($intro, ENT_QUOTES); ?>
            </p>
        </header>

        <!-- Process steps -->
        <?php if (!empty($items)): ?>
            <ol
                class="space-y-5 sm:space-y-6"
                data-service-process-steps
            >
                <?php
                    $position = 1;
                    foreach ($items as $item):
                        if (!is_array($item)) continue;

                        $step        = (int)($item['step'] ?? $position);
                        $titleStep   = trim($item['title']       ?? '');
                        $description = trim($item['description'] ?? '');
                        $duration    = trim($item['duration']    ?? '');
                        $outcome     = trim($item['outcome']     ?? '');
                        $icon        = $item['icon']             ?? null;

                        if ($titleStep === '' && $description === '') {
                            continue;
                        }
                ?>
                    <li
                        class="group rounded-2xl border border-slate-200 bg-white px-4 py-4 sm:px-6 sm:py-5 lg:px-7 lg:py-6 shadow-sm hover:border-sky-300 hover:shadow-md transition-colors"
                        data-service-process-step
                        itemprop="step"
                        itemscope
                        itemtype="https://schema.org/HowToStep"
                    >
                        <meta itemprop="position" content="<?= (int) $step; ?>">

                        <div class="flex items-start gap-4">
                            <!-- Step number -->
                            <div class="flex-none">
                                <div class="flex h-8 w-8 items-center justify-center rounded-full bg-sky-600 text-xs font-semibold text-white">
                                    <?= sprintf('%02d', $step); ?>
                                </div>
                            </div>

                            <div class="flex-1 space-y-2">
                                <div class="flex items-start justify-between gap-3">
                                    <div>
                                        <?php if ($titleStep !== ''): ?>
                                            <h3 class="text-sm sm:text-base font-semibold text-slate-900 group-hover:text-sky-700" itemprop="name">
                                                <?= htmlspecialchars($titleStep, ENT_QUOTES); ?>
                                            </h3>
                                        <?php endif; ?>

                                        <?php if ($duration !== ''): ?>
                                            <p class="mt-0.5 text-[11px] font-medium uppercase tracking-[0.16em] text-slate-500">
                                                <?= htmlspecialchars($duration, ENT_QUOTES); ?>
                                            </p>
                                        <?php endif; ?>
                                    </div>

                                    <?php if (!empty($icon)): ?>
                                        <div class="flex-none">
                                            <img
                                                src="<?= asset($icon); ?>"
                                                alt="<?= htmlspecialchars($titleStep !== '' ? $titleStep : 'Process step icon', ENT_QUOTES); ?>"
                                                loading="lazy"
                                                width="36"
                                                height="36"
                                                class="h-9 w-9 object-contain"
                                            >
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <?php if ($description !== ''): ?>
                                    <p class="text-xs sm:text-sm text-slate-700" itemprop="text">
                                        <?= htmlspecialchars($description, ENT_QUOTES); ?>
                                    </p>
                                <?php endif; ?>

                                <?php if ($outcome !== ''): ?>
                                    <p class="text-[11px] text-slate-500">
                                        <span class="font-semibold">Key outcome:</span>
                                        <?= htmlspecialchars($outcome, ENT_QUOTES); ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </li>
                <?php
                    $position++;
                    endforeach;
                ?>
            </ol>
        <?php else: ?>
            <p class="text-sm text-slate-600">
                We follow a simple discovery → design → build → launch process for this service.
                Please <a href="/contact-us/" class="text-sky-700 underline">contact us</a> if you would
                like to walk through how it would look for your product.
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
                    Want to see how this process applies to your current stage? Share a short brief and we will
                    respond with a tailored next step.
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
