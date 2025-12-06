<?php
/**
 * Careers – Why QalbIT / Culture Intro (C2)
 *
 * Expects:
 * - $page     (array) from config('careers.page')
 * - $sections (array) from config('careers.sections')
 */

$page       = $page       ?? [];
$sections   = $sections   ?? [];
$whyConfig  = $sections['why'] ?? [];

$id       = $whyConfig['id']       ?? 'careers-why-qalbit';
$title    = $whyConfig['title']    ?? 'Why build your career at QalbIT?';
$subtitle = $whyConfig['subtitle']
    ?? 'Small, product-focused teams, modern stacks and direct impact on real products – not endless ticket factories.';

$intro = $whyConfig['intro']
    ?? 'At QalbIT, you work directly on SaaS products, booking platforms and internal tools used by real customers across the world. You see how your code ships to production, how it impacts users and how the business side works behind the scenes.';

$points = $whyConfig['points'] ?? [
    [
        'label' => 'Real product work, not just slices of a giant system',
        'body'  => 'You work on full features – from API to UI – for SaaS, marketplaces and internal tools, often talking directly with founders or product owners.',
    ],
    [
        'label' => 'Modern stacks with room to grow',
        'body'  => 'Laravel / PHP, Node / Nest, React / Next.js, Flutter, Tailwind and cloud-native deployments – with guidance on architecture and trade-offs.',
    ],
    [
        'label' => 'Strong fundamentals and mentoring',
        'body'  => 'We focus on clean code, Git discipline, reviews, debugging and communication. You ship, learn and improve with feedback – not just follow tickets.',
    ],
    [
        'label' => 'Ahmedabad-based team with global clients',
        'body'  => 'Most roles are Ahmedabad / hybrid, working with clients in Europe, the Middle East and beyond – giving you exposure to international product work.',
    ],
];

$meta = $whyConfig['meta']
    ?? 'If you are looking for software developer jobs in Ahmedabad where you can actually shape products and talk to real users, QalbIT is built for that.';
?>

<section
    id="<?= htmlspecialchars($id, ENT_QUOTES); ?>"
    class="relative overflow-hidden bg-slate-950 text-slate-50 py-10 sm:py-14 lg:py-16"
    data-careers-section="why"
>
    <!-- subtle top glow -->
    <div class="pointer-events-none absolute inset-x-0 -top-32 h-40 bg-gradient-to-b from-sky-500/20 via-sky-500/0 to-transparent"></div>

    <div class="relative mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-10 lg:grid-cols-[minmax(0,2.2fr)_minmax(0,3fr)] lg:items-center">
            <!-- Left: heading + intro -->
            <div class="space-y-4" data-careers-el="why-copy">
                <p class="inline-flex items-center rounded-full border border-sky-500/30 bg-sky-500/10 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.18em] text-sky-200">
                    <span class="mr-2 h-1.5 w-1.5 rounded-full bg-sky-400"></span>
                    Life & growth at QalbIT
                </p>

                <h2 class="text-display-md sm:text-display-lg md:text-display-xl font-bold tracking-tight">
                    <?= htmlspecialchars($title, ENT_QUOTES); ?>
                </h2>

                <p class="max-w-xl text-sm sm:text-[15px] text-slate-200/90 leading-relaxed">
                    <?= htmlspecialchars($subtitle, ENT_QUOTES); ?>
                </p>

                <p class="max-w-xl text-[13px] sm:text-sm text-slate-400 leading-relaxed">
                    <?= htmlspecialchars($intro, ENT_QUOTES); ?>
                </p>

                <p class="text-[11px] text-slate-500/90">
                    <?= htmlspecialchars($meta, ENT_QUOTES); ?>
                </p>
            </div>

            <!-- Right: reasons grid -->
            <div class="grid gap-4 sm:gap-5 sm:grid-cols-2" data-careers-el="why-grid">
                <?php foreach ($points as $point): ?>
                    <?php
                        $label = $point['label'] ?? '';
                        $body  = $point['body']  ?? '';
                        if ($label === '' && $body === '') {
                            continue;
                        }
                    ?>
                    <article
                        class="group relative flex flex-col justify-between rounded-2xl border border-slate-800 bg-slate-900/70 p-4 sm:p-5 shadow-[0_18px_45px_rgba(15,23,42,0.9)]/30"
                        data-careers-el="why-card"
                    >
                        <div class="absolute inset-0 rounded-2xl bg-gradient-to-br from-sky-500/0 via-sky-500/0 to-sky-500/0 opacity-0 transition-opacity duration-200 group-hover:opacity-10"></div>

                        <div class="relative space-y-2">
                            <?php if ($label !== ''): ?>
                                <h3 class="text-[13px] sm:text-sm font-semibold text-slate-50">
                                    <?= htmlspecialchars($label, ENT_QUOTES); ?>
                                </h3>
                            <?php endif; ?>

                            <?php if ($body !== ''): ?>
                                <p class="text-[12px] sm:text-[13px] text-slate-300 leading-relaxed">
                                    <?= htmlspecialchars($body, ENT_QUOTES); ?>
                                </p>
                            <?php endif; ?>
                        </div>

                        <div class="relative mt-3 flex items-center text-[11px] font-medium text-sky-300/80">
                            <span class="mr-2 inline-flex h-1.5 w-1.5 rounded-full bg-sky-400"></span>
                            Growth-focused, not just output-focused.
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
