<?php
// =======================================
// S8 – Why QalbIT for your Startup MVP
// =======================================

$why = $process['why'] ?? [];

$id      = $why['id']      ?? 'mvp-why';
$eyebrow = $why['eyebrow'] ?? 'Why QalbIT';
$title   = $why['title']   ?? 'Why QalbIT for your Startup MVP';
$intro   = $why['intro']
    ?? 'You are not just buying engineering hours – you are partnering with a founder-led team that has designed, built and scaled real SaaS and product MVPs.';

$reasons = $why['reasons'] ?? [];
$testimonials = $why['testimonials'] ?? [];

if (!is_array($reasons) || count($reasons) === 0) {
    $reasons = [
        [
            'label'       => 'Product-first, not just code-first',
            'description' => 'We think in terms of activation, retention, revenue and ops impact – not only tickets and pull requests.',
            'points'      => [
                'We help prioritise your MVP scope by impact and risk, not by wish-list.',
                'We recommend the simplest architecture that can prove your thesis.',
            ],
        ],
    ];
}

if (!is_array($testimonials) || count($testimonials) === 0) {
    $testimonials = [
        [
            'quote'       => 'QalbIT behaved like an internal product team, not an outsourced vendor. They challenged our ideas, simplified scope and shipped the MVP on the timeline we needed.',
            'attribution' => 'Founder, SaaS startup (UK)',
        ],
    ];
}
?>

<section
    id="<?= htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?>"
    data-mvp-section="s8"
    class="bg-slate-900"
>
    <div class="mx-auto max-w-6xl px-4 py-16 text-slate-100 sm:px-6 lg:px-8 lg:py-20">
        <header class="max-w-3xl space-y-3">
            <h2 class="text-display-md sm:text-display-lg md:text-display-xl font-bold text-white">
                <?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?>
            </h2>
            <p class="text-sm sm:text-base text-slate-300">
                <?= htmlspecialchars($intro, ENT_QUOTES, 'UTF-8'); ?>
            </p>
        </header>

        <!-- Reasons -->
        <div class="mt-10 grid gap-6 md:grid-cols-2">
            <?php foreach ($reasons as $reason): ?>
                <?php
                $label       = $reason['label']       ?? 'Reason to choose QalbIT';
                $description = $reason['description'] ?? '';
                $points      = $reason['points']      ?? [];
                ?>
                <article
                    class="flex h-full flex-col rounded-2xl bg-slate-800/80 p-5 text-sm shadow-sm ring-1 ring-slate-700"
                    data-mvp-why-card
                >
                    <h3 class="text-base font-semibold text-white">
                        <?= htmlspecialchars($label, ENT_QUOTES, 'UTF-8'); ?>
                    </h3>
                    <?php if ($description !== ''): ?>
                        <p class="mt-2 text-slate-300">
                            <?= htmlspecialchars($description, ENT_QUOTES, 'UTF-8'); ?>
                        </p>
                    <?php endif; ?>

                    <?php if (is_array($points) && count($points) > 0): ?>
                        <ul class="mt-3 space-y-1 text-xs text-slate-400">
                            <?php foreach ($points as $point): ?>
                                <li><?= htmlspecialchars($point, ENT_QUOTES, 'UTF-8'); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </article>
            <?php endforeach; ?>
        </div>

        <!-- Testimonials -->
        <?php if (!empty($testimonials)): ?>
            <div class="mt-10 grid gap-6 md:grid-cols-3">
                <?php foreach ($testimonials as $testimonial): ?>
                    <?php
                    $quote       = $testimonial['quote']       ?? '';
                    $attribution = $testimonial['attribution'] ?? '';
                    ?>
                    <figure class="flex h-full flex-col justify-between rounded-2xl bg-slate-950/80 p-5 text-sm shadow-sm ring-1 ring-slate-950">
                        <?php if ($quote !== ''): ?>
                            <blockquote class="text-slate-300">
                                “<?= htmlspecialchars($quote, ENT_QUOTES, 'UTF-8'); ?>”
                            </blockquote>
                        <?php endif; ?>
                        <?php if ($attribution !== ''): ?>
                            <figcaption class="mt-4 text-xs text-slate-400">
                                <p class="font-medium text-slate-100"><?= htmlspecialchars($attribution, ENT_QUOTES, 'UTF-8'); ?></p>
                            </figcaption>
                        <?php endif; ?>
                    </figure>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>