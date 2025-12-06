<?php
/** @var array $location */

$sections  = $location['sections'] ?? [];
$services  = $sections['services'] ?? [];

$stateKey   = $location['state_key']   ?? '';
$stateLabel = $location['short_name']  ?? ($location['name'] ?? '');

$id      = $services['id']      ?? 'location-services';
$eyebrow = $services['eyebrow'] ?? '';
$title   = $services['title']   ?? '';
$intro   = $services['intro']   ?? '';

$items = isset($services['items']) && is_array($services['items'])
    ? $services['items']
    : [];
?>

<section
    id="<?= htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?>"
    class="bg-slate-50 text-slate-900"
    data-location-section-services
    data-location-key="<?= htmlspecialchars($stateKey, ENT_QUOTES, 'UTF-8'); ?>"
>
    <div class="relative mx-auto max-w-6xl px-4 py-16 sm:px-6 lg:px-8 space-y-4 md:space-y-10 lg:py-20">
        <div class="flex flex-col gap-4 lg:flex-row lg:items-start lg:justify-between">

            <!-- Section header -->
            <div class="max-w-lg space-y-5" data-location-el-header>
                <?php if ($eyebrow): ?>
                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-sky-600">
                        <?= htmlspecialchars($eyebrow, ENT_QUOTES, 'UTF-8'); ?>
                    </p>
                <?php endif; ?>

                <?php if ($title): ?>
                    <h2 class="text-display-md sm:text-display-lg md:text-display-xl font-bold">
                        <?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?>
                    </h2>
                <?php endif; ?>

                <?php if ($intro): ?>
                    <p class="text-sm sm:text-base text-slate-600">
                        <?= nl2br(htmlspecialchars($intro, ENT_QUOTES, 'UTF-8')); ?>
                    </p>
                <?php endif; ?>

                <?php if ($stateLabel): ?>
                    <p class="text-xs text-slate-500">
                        Focused on the needs of startups, scale-ups and enterprises across
                        <?= htmlspecialchars($stateLabel, ENT_QUOTES, 'UTF-8'); ?>.
                    </p>
                <?php endif; ?>
            </div>

            <!-- Services grid -->
            <?php if (!empty($items)): ?>
                <div
                    class="grid flex-1 gap-4 sm:grid-cols-2 lg:grid-cols-3"
                    data-location-el-grid
                >
                    <?php foreach ($items as $item): ?>
                        <?php
                        $label = $item['label'] ?? '';
                        $desc  = $item['description'] ?? '';
                        $url   = $item['url'] ?? '';
                        if (!$label && !$desc) {
                            continue;
                        }
                        ?>
                        <article
                            class="group flex flex-col rounded-2xl border border-slate-200 bg-white p-5 text-sm shadow-sm transition hover:-translate-y-0.5 hover:border-sky-400 hover:shadow-md"
                            data-location-el-card
                        >
                            <div class="flex-1 space-y-2">
                                <?php if ($label): ?>
                                    <h3 class="text-sm font-semibold text-slate-900">
                                        <?= htmlspecialchars($label, ENT_QUOTES, 'UTF-8'); ?>
                                    </h3>
                                <?php endif; ?>

                                <?php if ($desc): ?>
                                    <p class="text-xs text-slate-600">
                                        <?= htmlspecialchars($desc, ENT_QUOTES, 'UTF-8'); ?>
                                    </p>
                                <?php endif; ?>
                            </div>

                            <?php if ($url): ?>
                                <div class="mt-4">
                                    <a
                                        href="<?= htmlspecialchars($url, ENT_QUOTES, 'UTF-8'); ?>"
                                        class="inline-flex items-center text-xs font-semibold text-sky-600 transition group-hover:text-sky-500"
                                    >
                                        Learn more
                                        <span class="ml-1 inline-block translate-y-px transition group-hover:translate-x-0.5">
                                            →
                                        </span>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>
