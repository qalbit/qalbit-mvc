<?php
/** @var array $location */

$sections = $location['sections'] ?? [];
$why      = $sections['why'] ?? [];

$stateKey   = $location['state_key']   ?? '';
$stateLabel = $location['short_name']  ?? ($location['name'] ?? '');

$id      = $why['id']      ?? 'location-why';
$eyebrow = $why['eyebrow'] ?? '';
$title   = $why['title']   ?? '';
$intro   = $why['intro']   ?? '';

$reasons = isset($why['reasons']) && is_array($why['reasons'])
    ? $why['reasons']
    : [];
?>

<section
    id="<?= htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?>"
    class="bg-slate-950 text-slate-50"
    data-location-section="why"
    data-location-key="<?= htmlspecialchars($stateKey, ENT_QUOTES, 'UTF-8'); ?>"
>
    <div class="relative mx-auto max-w-6xl px-4 py-16 sm:px-6 lg:px-8 space-y-4 md:space-y-10 lg:py-20">
        <div class="max-w-3xl space-y-5" data-location-el="why-header">
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
                    Built around the expectations and pace of teams in
                    <?= htmlspecialchars($stateLabel, ENT_QUOTES, 'UTF-8'); ?>.
                </p>
            <?php endif; ?>
        </div>

        <?php if (!empty($reasons)): ?>
            <div
                class="mt-10 grid gap-6 md:grid-cols-2 lg:grid-cols-3"
                data-location-el="why-grid"
            >
                <?php foreach ($reasons as $reason): ?>
                    <?php
                    $label   = $reason['label'] ?? '';
                    $desc    = $reason['description'] ?? '';
                    $bullets = isset($reason['bullets']) && is_array($reason['bullets'])
                        ? $reason['bullets']
                        : [];
                    if (!$label && !$desc && empty($bullets)) {
                        continue;
                    }
                    ?>
                    <article
                        class="flex flex-col rounded-2xl border border-slate-800 bg-slate-900/60 p-5 text-sm shadow-sm"
                        data-location-el="why-card"
                    >
                        <?php if ($label): ?>
                            <h3 class="text-sm font-semibold text-slate-50">
                                <?= htmlspecialchars($label, ENT_QUOTES, 'UTF-8'); ?>
                            </h3>
                        <?php endif; ?>

                        <?php if ($desc): ?>
                            <p class="mt-2 text-xs text-slate-300">
                                <?= htmlspecialchars($desc, ENT_QUOTES, 'UTF-8'); ?>
                            </p>
                        <?php endif; ?>

                        <?php if (!empty($bullets)): ?>
                            <ul class="mt-3 space-y-1.5 text-xs text-slate-300">
                                <?php foreach ($bullets as $bullet): ?>
                                    <?php if (!$bullet) continue; ?>
                                    <li class="flex items-start gap-2" data-location-el="why-bullet">
                                        <span class="mt-1 inline-block h-1.5 w-1.5 flex-none rounded-full bg-sky-400"></span>
                                        <span><?= htmlspecialchars($bullet, ENT_QUOTES, 'UTF-8'); ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
