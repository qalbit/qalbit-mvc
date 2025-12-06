<?php
/**
 * Careers – Benefits & Growth (C4)
 *
 * Expects:
 * - $page     (array) from config('careers.page')
 * - $sections (array) from config('careers.sections')
 */

$page      = $page      ?? [];
$sections  = $sections  ?? [];
$config    = $sections['benefits'] ?? [];

$id       = $config['id']       ?? 'careers-benefits';
$title    = $config['title']    ?? 'How we support your growth at QalbIT';
$subtitle = $config['subtitle']
    ?? 'We keep benefits simple: a stable environment, real product work, and enough structure for you to grow – not just ship tickets.';

$intro = $config['intro']
    ?? 'Most candidates ask us the same three questions: What kind of work will I be doing day to day? Who will I learn from? And how stable is the environment? This section focuses on those answers, not just generic perks.';

// Optional groups config: array of [ 'label' => ..., 'items' => [ ... ] ]
$groups = $config['groups'] ?? [
    [
        'label' => 'Work you can be proud of',
        'items' => [
            'Real product and platform work (SaaS, booking systems, internal tools) used by customers in India, Europe and the Middle East.',
            'End-to-end exposure: APIs, DB design, frontend, deployment, debugging – not just a small slice of a huge legacy system.',
            'Small, focused teams where your decisions and suggestions are visible and appreciated.',
        ],
    ],
    [
        'label' => 'Learning & mentoring',
        'items' => [
            'Code reviews focused on fundamentals: clean code, readability, debugging and trade-offs – not just style nitpicks.',
            'Straightforward access to senior engineers and the founder for architecture, career and product discussions.',
            'Opportunities to work across stacks – Laravel / PHP, Node / Nest, React / Next.js, Flutter – based on your interests and project needs.',
        ],
    ],
    [
        'label' => 'Stability & way of working',
        'items' => [
            'Ahmedabad-based, product-focused studio with 11+ years of consulting and SaaS experience.',
            'Clear expectations, sprint planning and communication rituals – no random late-night “surprise” deadlines.',
            'Transparent discussions about roadmap, client expectations and how each project impacts the business.',
        ],
    ],
];

$meta = $config['meta']
    ?? 'If you are searching for software developer jobs in Ahmedabad where you can grow across backend, frontend and product thinking – this is the environment we are building.';
?>

<section
    id="<?= htmlspecialchars($id, ENT_QUOTES); ?>"
    class="relative bg-slate-50 text-slate-900 py-10 sm:py-12 lg:py-14 border-t border-slate-100"
    data-careers-section="benefits"
>
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 space-y-6 sm:space-y-8">
        <!-- Heading -->
        <header class="max-w-3xl space-y-2">
            <p class="inline-flex items-center rounded-full bg-sky-50 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.18em] text-sky-700 border border-sky-100">
                <span class="mr-2 h-1.5 w-1.5 rounded-full bg-sky-500"></span>
                Benefits & growth
            </p>

            <h2 class="text-display-md sm:text-display-lg md:text-display-xl font-bold tracking-tight">
                <?= htmlspecialchars($title, ENT_QUOTES); ?>
            </h2>

            <p class="text-sm text-slate-600">
                <?= htmlspecialchars($subtitle, ENT_QUOTES); ?>
            </p>

            <p class="text-[13px] text-slate-500">
                <?= htmlspecialchars($intro, ENT_QUOTES); ?>
            </p>
        </header>

        <!-- Benefits grid -->
        <div class="grid gap-4 sm:gap-5 md:grid-cols-3" data-careers-el="benefits-grid">
            <?php foreach ($groups as $group): ?>
                <?php
                    $label = $group['label'] ?? '';
                    $items = $group['items'] ?? [];
                    if ($label === '' && empty($items)) {
                        continue;
                    }
                ?>
                <article
                    class="flex flex-col rounded-2xl border border-slate-200 bg-white/80 p-4 sm:p-5 shadow-sm"
                    data-careers-el="benefit-card"
                >
                    <?php if ($label !== ''): ?>
                        <h3 class="mb-2 text-[13px] sm:text-sm font-semibold text-slate-900">
                            <?= htmlspecialchars($label, ENT_QUOTES); ?>
                        </h3>
                    <?php endif; ?>

                    <?php if (!empty($items)): ?>
                        <ul class="space-y-1.5 text-[12px] sm:text-[13px] text-slate-600">
                            <?php foreach ($items as $item): ?>
                                <?php if (!is_string($item) || trim($item) === '') continue; ?>
                                <li class="flex gap-2">
                                    <span class="mt-[6px] h-[3px] w-[3px] rounded-full bg-slate-400 flex-none"></span>
                                    <span><?= htmlspecialchars($item, ENT_QUOTES); ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </article>
            <?php endforeach; ?>
        </div>

        <?php if (!empty($meta)): ?>
            <p class="text-[11px] text-slate-500 max-w-3xl">
                <?= htmlspecialchars($meta, ENT_QUOTES); ?>
            </p>
        <?php endif; ?>
    </div>
</section>
