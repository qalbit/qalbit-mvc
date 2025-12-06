<?php
/** @var array $location */

$sections    = $location['sections'] ?? [];
$engagements = $sections['engagements'] ?? [];

$stateKey   = $location['state_key']   ?? '';
$stateLabel = $location['short_name']  ?? ($location['name'] ?? '');

$id      = $engagements['id']      ?? 'location-engagements';
$eyebrow = $engagements['eyebrow'] ?? '';
$title   = $engagements['title']   ?? '';
$intro   = $engagements['intro']   ?? '';

$models = isset($engagements['models']) && is_array($engagements['models'])
    ? $engagements['models']
    : [];
?>

<section
    id="<?= htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?>"
    class="bg-slate-950 text-slate-50"
    data-location-section="engagements"
    data-location-key="<?= htmlspecialchars($stateKey, ENT_QUOTES, 'UTF-8'); ?>"
>
    <div class="relative mx-auto max-w-6xl px-4 py-16 sm:px-6 lg:px-8 space-y-4 md:space-y-10 lg:py-20">
        <div class="max-w-3xl space-y-5" data-location-el="engagements-header">
            <?php if ($eyebrow): ?>
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-sky-400">
                    <?= htmlspecialchars($eyebrow, ENT_QUOTES, 'UTF-8'); ?>
                </p>
            <?php endif; ?>

            <?php if ($title): ?>
                <h2 class="text-display-md sm:text-display-lg md:text-display-xl font-bold">
                    <?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?>
                </h2>
            <?php endif; ?>

            <?php if ($intro): ?>
                <p class="text-sm sm:text-base text-slate-300">
                    <?= nl2br(htmlspecialchars($intro, ENT_QUOTES, 'UTF-8')); ?>
                </p>
            <?php endif; ?>

            <?php if ($stateLabel): ?>
                <p class="text-xs text-slate-400">
                    Flexible enough for teams across <?= htmlspecialchars($stateLabel, ENT_QUOTES, 'UTF-8'); ?>
                    at different stages of growth.
                </p>
            <?php endif; ?>
        </div>

        <?php if (!empty($models)): ?>
            <div
                class="mt-10 grid gap-6 md:grid-cols-3"
                data-location-el="engagements-grid"
            >
                <?php foreach ($models as $model): ?>
                    <?php
                    $label       = $model['label'] ?? '';
                    $description = $model['description'] ?? '';
                    $bestFor     = $model['best_for'] ?? '';
                    $url         = $model['link'] ?? '';
                    if (!$label && !$description && !$bestFor) {
                        continue;
                    }
                    ?>
                    <article
                        class="flex flex-col rounded-2xl border border-slate-800 bg-slate-900/60 p-5 text-sm shadow-sm"
                        data-location-el="engagement-card"
                    >
                        <?php if ($label): ?>
                            <h3 class="text-sm font-semibold text-slate-50">
                                <?= htmlspecialchars($label, ENT_QUOTES, 'UTF-8'); ?>
                            </h3>
                        <?php endif; ?>

                        <?php if ($description): ?>
                            <p class="mt-2 text-xs text-slate-300">
                                <?= htmlspecialchars($description, ENT_QUOTES, 'UTF-8'); ?>
                            </p>
                        <?php endif; ?>

                        <?php if ($bestFor): ?>
                            <p class="mt-3 text-[11px] font-medium text-sky-300">
                                Best for: <?= htmlspecialchars($bestFor, ENT_QUOTES, 'UTF-8'); ?>
                            </p>
                        <?php endif; ?>

                        <?php if ($url): ?>
                            <div class="mt-4 pt-1">
                                <a
                                    href="<?= htmlspecialchars($url, ENT_QUOTES, 'UTF-8'); ?>"
                                    class="inline-flex items-center text-xs font-semibold text-sky-400 transition hover:text-sky-300"
                                >
                                    Learn more about this model
                                    <span class="ml-1 inline-block translate-y-px">↗</span>
                                </a>
                            </div>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
