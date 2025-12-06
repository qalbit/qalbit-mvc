<?php
/** @var array $location */

$sections = $location['sections'] ?? [];
$tech     = $sections['tech'] ?? [];

$stateKey   = $location['state_key']   ?? '';
$stateLabel = $location['short_name']  ?? ($location['name'] ?? '');

$id      = $tech['id']      ?? 'location-tech';
$eyebrow = $tech['eyebrow'] ?? '';
$title   = $tech['title']   ?? '';
$intro   = $tech['intro']   ?? '';

$categories = isset($tech['categories']) && is_array($tech['categories'])
    ? $tech['categories']
    : [];

$links = isset($tech['links']) && is_array($tech['links'])
    ? $tech['links']
    : [];
?>

<section
    id="<?= htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?>"
    class="bg-slate-50 text-slate-900"
    data-location-section="tech"
    data-location-key="<?= htmlspecialchars($stateKey, ENT_QUOTES, 'UTF-8'); ?>"
>
    <div class="relative mx-auto max-w-6xl px-4 py-16 sm:px-6 lg:px-8 space-y-4 md:space-y-10 lg:py-20">
        <div class="max-w-3xl space-y-5" data-location-el="tech-header">
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
                    Selected to support how teams in <?= htmlspecialchars($stateLabel, ENT_QUOTES, 'UTF-8'); ?>
                    expect their software to scale and perform.
                </p>
            <?php endif; ?>
        </div>

        <?php if (!empty($categories)): ?>
            <div
                class="mt-10 grid gap-6 md:grid-cols-2 lg:grid-cols-4"
                data-location-el="tech-grid"
            >
                <?php foreach ($categories as $category): ?>
                    <?php
                    $label = $category['label'] ?? '';
                    $items = isset($category['items']) && is_array($category['items'])
                        ? $category['items']
                        : [];
                    if (!$label && empty($items)) {
                        continue;
                    }
                    ?>
                    <div
                        class="rounded-2xl border border-slate-200 bg-white p-5 text-sm shadow-sm"
                    >
                        <?php if ($label): ?>
                            <h3 class="text-xs font-semibold uppercase tracking-[0.16em] text-slate-500">
                                <?= htmlspecialchars($label, ENT_QUOTES, 'UTF-8'); ?>
                            </h3>
                        <?php endif; ?>

                        <?php if (!empty($items)): ?>
                            <div class="mt-3 flex flex-wrap gap-2 text-[11px] text-slate-800">
                                <?php foreach ($items as $item): ?>
                                    <?php if (!$item) continue; ?>
                                    <span
                                        class="inline-flex items-center rounded-full border border-slate-200 bg-slate-100 px-2 py-1"
                                        data-location-el="tech-pill"
                                    >
                                        <?= htmlspecialchars($item, ENT_QUOTES, 'UTF-8'); ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($links)): ?>
            <div class="mt-8 flex flex-wrap gap-4 text-xs" data-location-el="tech-links">
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
                        class="inline-flex items-center text-sky-600 transition hover:text-sky-500"
                    >
                        <?= htmlspecialchars($label, ENT_QUOTES, 'UTF-8'); ?>
                        <span class="ml-1 inline-block translate-y-px">↗</span>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
