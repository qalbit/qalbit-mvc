<?php
/** @var array $location */

$sections  = $location['sections'] ?? [];
$about     = $sections['about'] ?? [];

$stateKey   = $location['state_key']   ?? '';
$stateLabel = $location['short_name']  ?? ($location['name'] ?? '');

$id      = $about['id']      ?? 'location-about';
$eyebrow = $about['eyebrow'] ?? '';
$title   = $about['title']   ?? '';
$intro   = $about['intro']   ?? '';

$highlights = isset($about['highlights']) && is_array($about['highlights'])
    ? $about['highlights']
    : [];
?>

<section
    id="<?= htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?>"
    class="bg-slate-950 text-slate-50"
    data-location-section-about
    data-location-key="<?= htmlspecialchars($stateKey, ENT_QUOTES, 'UTF-8'); ?>"
>
    <div class="relative mx-auto max-w-6xl px-4 py-16 sm:px-6 lg:px-8 space-y-4 md:space-y-10 lg:py-20">
        <div class="grid gap-12 lg:grid-cols-[minmax(0,1.1fr)_minmax(0,1fr)] lg:items-start">

            <!-- Text / narrative -->
            <div class="space-y-6" data-location-el>
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
                    <p class="max-w-2xl text-sm sm:text-base text-slate-300">
                        <?= nl2br(htmlspecialchars($intro, ENT_QUOTES, 'UTF-8')); ?>
                    </p>
                <?php endif; ?>

                <?php if ($stateLabel): ?>
                    <p class="text-xs font-medium uppercase tracking-[0.18em] text-slate-400">
                        Serving teams across <?= htmlspecialchars($stateLabel, ENT_QUOTES, 'UTF-8'); ?> and the wider US.
                    </p>
                <?php endif; ?>
            </div>

            <!-- Highlights / facts -->
            <?php if (!empty($highlights)): ?>
                <div class="lg:justify-self-end" data-location-el-header>
                    <div class="grid gap-4 sm:grid-cols-2" data-location-el>
                        <?php foreach ($highlights as $highlight): ?>
                            <?php
                            $label = $highlight['label'] ?? '';
                            $desc  = $highlight['description'] ?? '';
                            if (!$label) {
                                continue;
                            }
                            ?>
                            <div class="rounded-2xl border border-slate-800 bg-slate-900/60 p-4 shadow-sm">
                                <p class="text-sm font-semibold text-slate-50">
                                    <?= htmlspecialchars($label, ENT_QUOTES, 'UTF-8'); ?>
                                </p>
                                <?php if ($desc): ?>
                                    <p class="mt-2 text-xs text-slate-300">
                                        <?= htmlspecialchars($desc, ENT_QUOTES, 'UTF-8'); ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>
