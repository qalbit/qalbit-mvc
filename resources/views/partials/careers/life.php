<?php
/**
 * Careers – Life at QalbIT / Inside the studio (C7)
 *
 * Expects:
 * - $page     (array) from config('careers.page')
 * - $sections (array) from config('careers.sections')
 *
 * Recommended config structure:
 *
 * 'life' => [
 *     'id'       => 'careers-life',
 *     'title'    => 'Life at QalbIT',
 *     'subtitle' => 'A compact team, real products and a calm environment to do your best work.',
 *     'intro'    => 'This is what your week actually looks like – beyond job titles and tech stacks.',
 *     'stories'  => [
 *         [
 *             'label' => 'Day in the life of a developer',
 *             'tag'   => 'Engineering',
 *             'points'=> [ ... ],
 *         ],
 *         ...
 *     ],
 * ]
 */

$page     = $page     ?? [];
$sections = $sections ?? [];

$config = $sections['life'] ?? [];

$id       = $config['id']       ?? 'careers-life';
$title    = $config['title']    ?? 'Life at QalbIT';
$subtitle = $config['subtitle']
    ?? 'A compact team, real products and a calm environment to do your best work.';
$intro = $config['intro']
    ?? 'Instead of “fun at work” buzzwords, here is a simple look at what your week actually feels like when you join QalbIT – the kind of projects, communication and ownership you can expect.';

$stories = $config['stories'] ?? [
    [
        'label' => 'Day in the life of a developer',
        'tag'   => 'Engineering',
        'points'=> [
            'Start your day with a short stand-up focused on blockers and priorities – not long status meetings.',
            'Deep-work blocks on actual product tasks: APIs, UI, refactors, debugging, tests.',
            'Regular check-ins with seniors or the founder when you are stuck or making an important decision.',
        ],
    ],
    [
        'label' => 'How we run code reviews',
        'tag'   => 'Quality & learning',
        'points'=> [
            'Reviews focus on correctness, clarity and long-term maintainability – not just code style.',
            'We leave specific, actionable comments and examples instead of just saying “improve this”.',
            'You see how seniors think through edge cases, naming and trade-offs, so you grow faster.',
        ],
    ],
    [
        'label' => 'How we work with clients',
        'tag'   => 'Collaboration',
        'points'=> [
            'Most projects are long-term relationships, not one-off gigs – so we care about stability.',
            'Clear requirements, documented decisions and sprint plans help avoid last-minute chaos.',
            'Developers join client calls when useful – to understand context, not to be blamed.',
        ],
    ],
    [
        'label' => 'Office, remote & timings',
        'tag'   => 'Environment',
        'points'=> [
            'Ahmedabad-based office with a quiet, focused environment – no constant noise or distractions.',
            'Hybrid-friendly mindset – we optimise for getting work done and communicating clearly.',
            'Reasonable working hours with rare exceptions, discussed in advance when deadlines are tight.',
        ],
    ],
];

?>

<section
    id="<?= htmlspecialchars($id, ENT_QUOTES); ?>"
    class="relative bg-slate-50 text-slate-900 py-10 sm:py-12 lg:py-14 border-t border-slate-100"
    data-careers-section="life"
>
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 space-y-6 sm:space-y-8">
        <!-- Header -->
        <header class="max-w-3xl space-y-2">
            <p class="inline-flex items-center rounded-full bg-sky-50 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.18em] text-sky-700 border border-sky-100">
                <span class="mr-2 h-1.5 w-1.5 rounded-full bg-sky-500"></span>
                Life at QalbIT
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

        <!-- Story cards -->
        <div
            class="grid gap-4 sm:gap-5 md:grid-cols-2 lg:grid-cols-4"
            data-careers-el="life-grid"
        >
            <?php foreach ($stories as $story): ?>
                <?php
                    $label = $story['label'] ?? '';
                    $tag   = $story['tag']   ?? '';
                    $points= $story['points'] ?? [];
                    if ($label === '' && empty($points)) {
                        continue;
                    }
                ?>
                <article
                    class="flex flex-col rounded-2xl border border-slate-200 bg-white/90 p-4 sm:p-5 shadow-sm"
                    data-careers-el="life-card"
                >
                    <?php if ($tag !== ''): ?>
                        <span class="mb-2 inline-flex items-center rounded-full bg-slate-100 px-2.5 py-0.5 text-[10px] font-medium uppercase tracking-[0.16em] text-slate-600">
                            <?= htmlspecialchars($tag, ENT_QUOTES); ?>
                        </span>
                    <?php endif; ?>

                    <?php if ($label !== ''): ?>
                        <h3 class="mb-2 text-[13px] sm:text-sm font-semibold text-slate-900">
                            <?= htmlspecialchars($label, ENT_QUOTES); ?>
                        </h3>
                    <?php endif; ?>

                    <?php if (!empty($points)): ?>
                        <ul class="space-y-1.5 text-[12px] sm:text-[13px] text-slate-600">
                            <?php foreach ($points as $point): ?>
                                <?php if (!is_string($point) || trim($point) === '') continue; ?>
                                <li class="flex gap-2">
                                    <span class="mt-[6px] h-[3px] w-[3px] rounded-full bg-slate-400 flex-none"></span>
                                    <span><?= htmlspecialchars($point, ENT_QUOTES); ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </article>
            <?php endforeach; ?>
        </div>

        <!-- Small closing line -->
        <p class="text-[11px] text-slate-500 max-w-3xl">
            If this way of working sounds right for you, explore the open roles above or share your profile for future positions.
        </p>
    </div>
</section>
