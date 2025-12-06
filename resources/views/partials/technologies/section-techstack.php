<?php
/**
 * Technologies – Tech Stack Overview (T2)
 *
 * High-level layers of the stack with links to deeper sections.
 */

$stackCategories = [
    [
        'anchor'       => '#tech-frontend',
        'name'         => 'Frontend & UI layer',
        'summary'      => 'React-based frontends for web apps, dashboards and marketing sites.',
        'layer_label'  => 'Frontend',
        'bullets'      => [
            'React.js for SPAs, dashboards & portals',
            'Component-driven design systems',
            'Responsive, accessible UI patterns',
        ],
    ],
    [
        'anchor'       => '#tech-backend',
        'name'         => 'Backend & APIs',
        'summary'      => 'Node.js, Nest.js and Laravel powering secure, scalable APIs and business logic.',
        'layer_label'  => 'Backend & APIs',
        'bullets'      => [
            'API-first REST & GraphQL backends',
            'Multi-tenant SaaS architectures',
            'Queues, jobs & background processing',
        ],
    ],
    [
        'anchor'       => '#tech-mobile',
        'name'         => 'Mobile & cross-platform',
        'summary'      => 'Flutter apps that run smoothly on both iOS and Android from a single codebase.',
        'layer_label'  => 'Mobile & cross-platform',
        'bullets'      => [
            'Flutter for iOS & Android',
            'Shared UI & business logic',
            'Faster iteration and lower total cost',
        ],
    ],
    [
        'anchor'       => '#tech-cms',
        'name'         => 'CMS & content platforms',
        'summary'      => 'WordPress and headless setups for content-heavy and marketing experiences.',
        'layer_label'  => 'CMS & content',
        'bullets'      => [
            'Marketing websites & blogs',
            'Headless CMS with custom frontends',
            'Editorial workflows that stay simple',
        ],
    ],
    [
        'anchor'       => '#tech-legacy',
        'name'         => 'Legacy, integration & migration',
        'summary'      => 'Stabilise and gradually modernise existing systems like CodeIgniter or older stacks.',
        'layer_label'  => 'Legacy & migration',
        'bullets'      => [
            'Health checks for existing apps',
            'Step-by-step refactors instead of rewrites',
            'Integrations with new services & APIs',
        ],
    ],
];
?>

<section
    class="border-t border-slate-50 bg-slate-950 py-16 sm:py-20 lg:py-24"
    data-animate="tech-stack-overview"
    itemscope
    itemtype="https://schema.org/ItemList"
>
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <div
            class="mb-10 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between"
            data-tech-stack-header
        >
            <div class="space-y-3 max-w-xl">
                <h2 class="text-display-md sm:text-display-lg md:text-display-xl font-bold text-center md:text-left text-slate-50">
                    Our web, mobile &amp; cloud tech stack at a glance
                </h2>
                <p class="text-sm sm:text-base text-slate-300">
                    We deliberately keep our stack focused around proven technologies like React.js,
                    Node.js, Nest.js, Laravel, Flutter and WordPress – so your product is easier to
                    scale, maintain and hire for in the long run.
                </p>
            </div>
            <p class="max-w-sm text-xs text-slate-400">
                Each layer below links to more detail and specific technologies.
                Combine them into a stack that fits your product: frontend, backend, mobile, CMS,
                cloud &amp; integrations – guided by one accountable team at QalbIT.
            </p>
        </div>

        <div
            class="grid gap-6 sm:gap-7 md:grid-cols-2 lg:grid-cols-3"
            data-tech-stack-cards
        >
            <?php
                $position = 1;
                foreach ($stackCategories as $item):
                    $anchor      = $item['anchor'] ?? '#';
                    $name        = $item['name'] ?? '';
                    $summary     = $item['summary'] ?? '';
                    $layerLabel  = $item['layer_label'] ?? '';
                    $bullets     = $item['bullets'] ?? [];
            ?>
                <article
                    class="group relative flex flex-col rounded-2xl border border-slate-800/80 bg-slate-900/70 p-5 sm:p-6 lg:p-7 shadow-sm shadow-black/20 hover:border-sky-500/60 hover:bg-slate-900/90 transition-colors"
                    data-tech-stack-card
                    itemscope
                    itemprop="itemListElement"
                    itemtype="https://schema.org/Thing"
                >
                    <meta itemprop="position" content="<?= (int) $position; ?>">
                    <meta itemprop="url" content="<?= htmlspecialchars($anchor, ENT_QUOTES); ?>">

                    <div class="mb-4 flex items-start justify-between gap-3">
                        <div class="space-y-1.5">
                            <h3
                                class="text-base sm:text-lg font-semibold text-slate-50 group-hover:text-sky-300"
                                itemprop="name"
                            >
                                <a
                                    href="<?= htmlspecialchars($anchor, ENT_QUOTES); ?>"
                                    class="hover:underline decoration-sky-400/60"
                                >
                                    <?= htmlspecialchars($name, ENT_QUOTES); ?>
                                </a>
                            </h3>

                            <?php if (!empty($summary)): ?>
                                <p
                                    class="text-xs sm:text-sm text-slate-300"
                                    itemprop="description"
                                >
                                    <?= htmlspecialchars($summary, ENT_QUOTES); ?>
                                </p>
                            <?php endif; ?>

                            <?php if (!empty($layerLabel)): ?>
                                <p class="mt-1 inline-flex items-center rounded-full bg-slate-800/80 px-2.5 py-0.5 text-[11px] font-medium uppercase tracking-[0.18em] text-slate-300">
                                    <span class="mr-1.5 h-1.5 w-1.5 rounded-full bg-sky-400"></span>
                                    <?= htmlspecialchars($layerLabel, ENT_QUOTES); ?>
                                </p>
                            <?php endif; ?>
                        </div>

                        <!-- Small decorative badge -->
                        <div class="flex-none">
                            <div class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-slate-800/80 ring-1 ring-slate-700/80">
                                <span class="text-[11px] font-semibold text-slate-200">
                                    <?= sprintf('%02d', $position); ?>
                                </span>
                            </div>
                        </div>
                    </div>

                    <?php if (!empty($bullets) && is_array($bullets)): ?>
                        <ul class="mb-4 flex-1 space-y-1.5 text-xs sm:text-sm text-slate-200">
                            <?php foreach ($bullets as $bullet): ?>
                                <li class="flex gap-2">
                                    <span class="mt-1 h-1.5 w-1.5 flex-none rounded-full bg-sky-400"></span>
                                    <span><?= htmlspecialchars($bullet, ENT_QUOTES); ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <div class="mt-auto flex items-center justify-between gap-3 pt-3 border-t border-slate-800/80">
                        <a
                            href="<?= htmlspecialchars($anchor, ENT_QUOTES); ?>"
                            class="inline-flex items-center text-xs font-semibold text-sky-300 hover:text-sky-200"
                        >
                            View related technologies
                            <span class="ml-1 inline-block translate-y-px">→</span>
                        </a>
                        <span class="text-[10px] uppercase tracking-[0.18em] text-slate-500">
                            Layer
                        </span>
                    </div>
                </article>
            <?php
                $position++;
                endforeach;
            ?>
        </div>
    </div>
</section>
