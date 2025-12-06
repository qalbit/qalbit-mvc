<?php
/** @var array $location */

$sections = $location['sections'] ?? [];
$process  = $sections['process'] ?? [];

$stateKey   = $location['state_key']   ?? '';
$stateLabel = $location['short_name']  ?? ($location['name'] ?? '');

$id      = $process['id']      ?? 'location-process';
$eyebrow = $process['eyebrow'] ?? '';
$title   = $process['title']   ?? '';
$intro   = $process['intro']   ?? '';

$steps = isset($process['steps']) && is_array($process['steps'])
    ? $process['steps']
    : [];

$links = isset($process['links']) && is_array($process['links'])
    ? $process['links']
    : [];
?>

<section
    id="<?= htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?>"
    class="bg-slate-50 text-slate-900"
    data-location-section="process"
    data-location-key="<?= htmlspecialchars($stateKey, ENT_QUOTES, 'UTF-8'); ?>"
>
    <div class="relative mx-auto max-w-6xl px-4 py-16 sm:px-6 lg:px-8 space-y-4 md:space-y-10 lg:py-20">
        <div class="max-w-3xl space-y-5" data-location-el="process-header">
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
                    Designed to keep stakeholders in <?= htmlspecialchars($stateLabel, ENT_QUOTES, 'UTF-8'); ?>
                    aligned and confident at every stage.
                </p>
            <?php endif; ?>
        </div>

        <?php if (!empty($steps)): ?>
            <ol
                class="mt-10 grid gap-6 md:grid-cols-2 lg:grid-cols-3"
                data-location-el="process-steps"
            >
                <?php foreach ($steps as $index => $step): ?>
                    <?php
                    $label       = $step['label'] ?? '';
                    $description = $step['description'] ?? '';
                    $related     = $step['related'] ?? null;
                    $relatedUrl  = $related ? '/process/' . trim($related, '/') . '/' : null;

                    if (!$label && !$description) {
                        continue;
                    }
                    ?>
                    <li
                        class="flex flex-col rounded-2xl border border-slate-200 bg-white p-5 text-sm shadow-sm transition hover:-translate-y-0.5 hover:border-sky-400 hover:shadow-md"
                        data-location-el="process-step"
                    >
                        <div class="flex items-center gap-3">
                            <span class="flex h-7 w-7 items-center justify-center rounded-full bg-sky-600 text-xs font-semibold text-white">
                                <?= sprintf('%02d', $index + 1); ?>
                            </span>
                            <?php if ($label): ?>
                                <h3 class="text-sm font-semibold text-slate-900">
                                    <?= htmlspecialchars($label, ENT_QUOTES, 'UTF-8'); ?>
                                </h3>
                            <?php endif; ?>
                        </div>

                        <?php if ($description): ?>
                            <p class="mt-3 text-xs text-slate-600">
                                <?= htmlspecialchars($description, ENT_QUOTES, 'UTF-8'); ?>
                            </p>
                        <?php endif; ?>

                        <?php if ($relatedUrl): ?>
                            <div class="mt-3">
                                <a
                                    href="<?= htmlspecialchars($relatedUrl, ENT_QUOTES, 'UTF-8'); ?>"
                                    class="inline-flex items-center text-xs font-semibold text-sky-600 transition hover:text-sky-500"
                                >
                                    View related process
                                    <span class="ml-1 inline-block translate-y-px">→</span>
                                </a>
                            </div>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ol>
        <?php endif; ?>

        <?php if (!empty($links)): ?>
            <div class="mt-8 flex flex-wrap gap-4 text-xs" data-location-el="process-links">
                <?php foreach ($links as $link): ?>
                    <?php
                    $label = $link['label'] ?? '';
                    $url   = $link['url'] ?? '';
                    if (!$label || !$url) {
                        continue;
                    }
                    ?>
                    <a
                        href="<?= htmlspecialchars($url, ENT_QUOTES, 'UTF-8'); ?>"
                        class="inline-flex items-center rounded-full border border-slate-300 px-3 py-1.5 text-slate-700 transition hover:border-sky-400 hover:text-sky-700"
                    >
                        <?= htmlspecialchars($label, ENT_QUOTES, 'UTF-8'); ?>
                        <span class="ml-1 inline-block translate-y-px">↗</span>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
