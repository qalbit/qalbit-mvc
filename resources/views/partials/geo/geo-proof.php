<?php
/** @var array $location */

$sections = $location['sections'] ?? [];
$proof    = $sections['proof'] ?? [];

$stateKey   = $location['state_key']   ?? '';
$stateLabel = $location['short_name']  ?? ($location['name'] ?? '');

$id      = $proof['id']      ?? 'location-proof';
$eyebrow = $proof['eyebrow'] ?? '';
$title   = $proof['title']   ?? '';
$intro   = $proof['intro']   ?? '';

$cases        = isset($proof['cases']) && is_array($proof['cases']) ? $proof['cases'] : [];
$testimonials = isset($proof['testimonials']) && is_array($proof['testimonials']) ? $proof['testimonials'] : [];
?>

<section
    id="<?= htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?>"
    class="bg-slate-950 text-slate-50"
    data-location-section="proof"
    data-location-key="<?= htmlspecialchars($stateKey, ENT_QUOTES, 'UTF-8'); ?>"
>
    <div class="relative mx-auto max-w-6xl px-4 py-16 sm:px-6 lg:px-8 space-y-4 md:space-y-10 lg:py-20">
        <div class="max-w-3xl space-y-5" data-location-el="proof-header">
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
        </div>

        <?php if (!empty($cases)): ?>
            <div
                class="mt-10 grid gap-6 md:grid-cols-2"
                data-location-el="case-grid"
            >
                <?php foreach ($cases as $case): ?>
                    <?php
                    $label    = $case['label'] ?? '';
                    $industry = $case['industry'] ?? '';
                    $region   = $case['region'] ?? '';
                    $headline = $case['headline'] ?? '';
                    $result   = $case['result'] ?? '';
                    $url      = $case['url'] ?? '';
                    if (!$label && !$headline && !$result) {
                        continue;
                    }
                    ?>
                    <article
                        class="flex flex-col rounded-2xl border border-slate-800 bg-slate-900/60 p-5 text-sm shadow-sm"
                        data-location-el="case-card"
                    >
                        <?php if ($label): ?>
                            <h3 class="text-sm font-semibold text-slate-50">
                                <?= htmlspecialchars($label, ENT_QUOTES, 'UTF-8'); ?>
                            </h3>
                        <?php endif; ?>

                        <?php if ($industry || $region): ?>
                            <p class="mt-1 text-[11px] text-slate-400">
                                <?php if ($industry): ?>
                                    <span><?= htmlspecialchars($industry, ENT_QUOTES, 'UTF-8'); ?></span>
                                <?php endif; ?>
                                <?php if ($industry && $region): ?>
                                    <span class="mx-1">•</span>
                                <?php endif; ?>
                                <?php if ($region): ?>
                                    <span><?= htmlspecialchars($region, ENT_QUOTES, 'UTF-8'); ?></span>
                                <?php endif; ?>
                            </p>
                        <?php endif; ?>

                        <?php if ($headline): ?>
                            <p class="mt-3 text-xs font-medium text-slate-200">
                                <?= htmlspecialchars($headline, ENT_QUOTES, 'UTF-8'); ?>
                            </p>
                        <?php endif; ?>

                        <?php if ($result): ?>
                            <p class="mt-2 text-xs text-slate-300">
                                <?= htmlspecialchars($result, ENT_QUOTES, 'UTF-8'); ?>
                            </p>
                        <?php endif; ?>

                        <?php if ($url): ?>
                            <div class="mt-4 pt-1">
                                <a
                                    href="<?= htmlspecialchars($url, ENT_QUOTES, 'UTF-8'); ?>"
                                    class="inline-flex items-center text-xs font-semibold text-sky-400 transition hover:text-sky-300"
                                >
                                    View more details
                                    <span class="ml-1 inline-block translate-y-px">↗</span>
                                </a>
                            </div>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($testimonials)): ?>
            <div class="mt-12 grid gap-6 md:grid-cols-2" data-location-el="testimonials">
                <?php foreach ($testimonials as $testimonial): ?>
                    <?php
                    $quote  = $testimonial['quote'] ?? '';
                    $name   = $testimonial['name'] ?? '';
                    $title  = $testimonial['title'] ?? '';
                    $region = $testimonial['region'] ?? '';
                    if (!$quote) {
                        continue;
                    }
                    ?>
                    <figure class="rounded-2xl border border-slate-800 bg-slate-900/60 p-5 text-sm shadow-sm">
                        <blockquote class="text-sm text-slate-200">
                            “<?= htmlspecialchars($quote, ENT_QUOTES, 'UTF-8'); ?>”
                        </blockquote>
                        <figcaption class="mt-3 text-xs text-slate-400">
                            <?php if ($name): ?>
                                <span class="font-semibold text-slate-200">
                                    <?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>
                                </span>
                            <?php endif; ?>
                            <?php if ($title): ?>
                                <span> · <?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></span>
                            <?php endif; ?>
                            <?php if ($region): ?>
                                <span> · <?= htmlspecialchars($region, ENT_QUOTES, 'UTF-8'); ?></span>
                            <?php endif; ?>
                        </figcaption>
                    </figure>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
