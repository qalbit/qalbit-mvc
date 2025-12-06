<?php
/**
 * Generic Service Tech Stack & Tooling (Section S6)
 *
 * Expects:
 * - $service (array)
 *
 * Recommended shape in config('services.php'):
 *
 * 'stack' => [
 *     'id'      => 'saas-tech-stack',
 *     'eyebrow' => 'Tech stack & platforms',
 *     'title'   => 'Modern SaaS stack we typically use',
 *     'intro'   => 'We choose stack per-project, but these are our defaults for most SaaS builds.',
 *
 *     'note'    => 'We can also work with your existing stack if it is a good long-term fit.',
 *
 *     'categories' => [
 *         [
 *             'name'        => 'Backend & APIs',
 *             'description' => 'For core application logic, multi-tenant architecture and integrations.',
 *             'items'       => [
 *                 'Laravel 10/11/12 (PHP 8.x)',
 *                 'NestJS (TypeScript, Node.js 20+)',
 *                 'REST, GraphQL & webhooks',
 *             ],
 *         ],
 *         [
 *             'name'        => 'Frontend & dashboards',
 *             'description' => 'For responsive SaaS dashboards and marketing sites.',
 *             'items'       => [
 *                 'Next.js (React, App Router)',
 *                 'Blade / Tailwind CSS',
 *                 'SPA-style interactions where it makes sense',
 *             ],
 *         ],
 *         // ...
 *     ],
 * ]
 */

$service     = $service ?? [];
$serviceName = $service['name'] ?? 'Service';

$stack = $service['stack'] ?? [];

$sectionId = $stack['id']      ?? 'service-tech-stack';
$eyebrow   = $stack['eyebrow'] ?? 'Tech stack & tooling';
$title     = $stack['title']
    ?? ('Stack we commonly use for ' . $serviceName);
$intro     = $stack['intro']
    ?? 'We do not force a single stack everywhere. Instead, we pick technologies that match your product, team and constraints. These are the tools we reach for most often.';
$note = $stack['note']
    ?? 'If you already have a live product, we will review your current stack and keep what makes sense before suggesting any changes.';

$categories = $stack['categories'] ?? [];

/**
 * Fallback categories if none configured.
 */
if (empty($categories)) {
    $categories = [
        [
            'name'        => 'Backend & APIs',
            'description' => 'Core application logic, authentication, multi-tenancy and integrations.',
            'items'       => [
                'Laravel (PHP 8.x) for opinionated, secure SaaS backends',
                'NestJS (TypeScript) for API-first and microservice-style projects',
                'REST, webhooks and background jobs for integrations',
            ],
        ],
        [
            'name'        => 'Frontend & dashboards',
            'description' => 'Responsive interfaces for admin, customer and partner portals.',
            'items'       => [
                'Next.js / React for rich SaaS dashboards',
                'Blade + Tailwind CSS for marketing and content pages',
                'Component libraries tailored per-project (no heavy, bloated UI kits)',
            ],
        ],
        [
            'name'        => 'Data & infrastructure',
            'description' => 'Storage, performance and reliability for your product data.',
            'items'       => [
                'MySQL / PostgreSQL for relational data',
                'Redis for caching and queues',
                'AWS / DigitalOcean / managed cloud for hosting and scalability',
            ],
        ],
        [
            'name'        => 'Payments, auth & observability',
            'description' => 'The parts around the product that keep it safe and monetised.',
            'items'       => [
                'Stripe, Paddle, Razorpay for billing and subscriptions',
                'OAuth, SSO and JWT-based auth flows',
                'Monitoring, logging and error tracking baked into delivery',
            ],
        ],
    ];
}
?>

<section
    id="<?= htmlspecialchars($sectionId, ENT_QUOTES); ?>"
    class="border-t border-slate-100 bg-slate-950 py-16 sm:py-20 lg:py-24 text-slate-50"
    aria-labelledby="service-tech-stack-heading"
    data-section-service-tech-stack
    itemscope
    itemtype="https://schema.org/ItemList"
>
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <!-- Heading -->
        <header class="mb-10 max-w-3xl space-y-3">
            <?php if (!empty($eyebrow)): ?>
                <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-sky-300">
                    <?= htmlspecialchars($eyebrow, ENT_QUOTES); ?>
                </p>
            <?php endif; ?>

            <h2
                id="service-tech-stack-heading"
                class="text-display-md sm:text-display-lg md:text-display-xl font-bold text-slate-50"
                itemprop="name"
            >
                <?= htmlspecialchars($title, ENT_QUOTES); ?>
            </h2>

            <p class="text-sm sm:text-base text-slate-300">
                <?= htmlspecialchars($intro, ENT_QUOTES); ?>
            </p>
        </header>

        <!-- Categories grid -->
        <?php if (!empty($categories)): ?>
            <div
                class="grid gap-6 md:grid-cols-2"
                data-service-tech-stack-grid
            >
                <?php
                    $position = 1;
                    foreach ($categories as $category):
                        if (!is_array($category)) continue;

                        $name        = trim($category['name']        ?? '');
                        $description = trim($category['description'] ?? '');
                        $items       = $category['items']            ?? [];

                        // Normalize items: allow both list of strings or list of [label => ...]
                        $normalizedItems = [];
                        if (is_array($items)) {
                            foreach ($items as $item) {
                                if (is_array($item)) {
                                    $label = trim($item['label'] ?? '');
                                    if ($label !== '') {
                                        $normalizedItems[] = $label;
                                    }
                                } else {
                                    $label = trim((string) $item);
                                    if ($label !== '') {
                                        $normalizedItems[] = $label;
                                    }
                                }
                            }
                        }

                        if ($name === '' && $description === '' && empty($normalizedItems)) {
                            continue;
                        }
                ?>
                    <article
                        class="flex flex-col rounded-2xl border border-slate-800 bg-slate-900/70 px-4 py-4 sm:px-6 sm:py-5 lg:px-7 lg:py-6 shadow-sm shadow-black/30"
                        itemprop="itemListElement"
                        itemscope
                        itemtype="https://schema.org/Thing"
                    >
                        <meta itemprop="position" content="<?= (int) $position; ?>">

                        <?php if ($name !== ''): ?>
                            <h3 class="mb-2 text-sm sm:text-base font-semibold text-slate-50" itemprop="name">
                                <?= htmlspecialchars($name, ENT_QUOTES); ?>
                            </h3>
                        <?php endif; ?>

                        <?php if ($description !== ''): ?>
                            <p class="mb-3 text-xs sm:text-sm text-slate-300" itemprop="description">
                                <?= htmlspecialchars($description, ENT_QUOTES); ?>
                            </p>
                        <?php endif; ?>

                        <?php if (!empty($normalizedItems)): ?>
                            <ul class="space-y-1.5 text-xs sm:text-sm text-slate-200">
                                <?php foreach ($normalizedItems as $tool): ?>
                                    <li class="flex gap-2">
                                        <span class="mt-2 h-1.5 w-1.5 rounded-full bg-sky-400 flex-none"></span>
                                        <span><?= htmlspecialchars($tool, ENT_QUOTES); ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </article>
                <?php
                    $position++;
                    endforeach;
                ?>
            </div>
        <?php else: ?>
            <p class="text-sm text-slate-300">
                We are comfortable with most modern web stacks across PHP, TypeScript, Node.js and common cloud
                providers. Share your current setup or preferences and we will propose a stack that is realistic for
                your team, budget and time-to-market.
            </p>
        <?php endif; ?>

        <!-- Note under grid -->
        <?php if (!empty($note)): ?>
            <p class="mt-8 text-[11px] text-slate-400 max-w-3xl">
                <?= htmlspecialchars($note, ENT_QUOTES); ?>
            </p>
        <?php endif; ?>
    </div>
</section>
