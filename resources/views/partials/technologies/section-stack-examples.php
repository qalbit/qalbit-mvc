<?php
/**
 * Technologies – Sample Tech Stack Combinations (T9)
 *
 * Standalone section listing example stacks by project type.
 */

$examples = [
    [
        'label'       => 'Stack 01',
        'project'     => 'B2B SaaS platform',
        'summary'     => 'Multi-tenant SaaS with subscriptions, admin backoffice and integrations.',
        'stack_line'  => 'React / Next.js · Nest.js or Laravel · PostgreSQL · Redis · AWS',
        'highlights'  => [
            'Multi-tenant architecture and role-based access',
            'Subscription billing, invoicing and reporting',
            'Admin portal + customer-facing app + APIs',
        ],
        'services_url' => '/services/saas-development/',   // adjust if needed
        'techs_url'    => '/technologies/',
    ],
    [
        'label'       => 'Stack 02',
        'project'     => 'Customer portal or marketplace',
        'summary'     => 'Self-service portal for customers, partners or vendors with workflows and payments.',
        'stack_line'  => 'Next.js · Node.js / Nest.js · PostgreSQL or MySQL · Redis · AWS',
        'highlights'  => [
            'Account creation, onboarding and KYC-style flows',
            'Listings, search and transactional workflows',
            'Integration with payment gateways and CRMs',
        ],
        'services_url' => '/services/custom-software-development/',
        'techs_url'    => '/technologies/',
    ],
    [
        'label'       => 'Stack 03',
        'project'     => 'Internal tools & analytics dashboards',
        'summary'     => 'Operational dashboards and internal tools replacing spreadsheets and ad-hoc scripts.',
        'stack_line'  => 'React.js · Laravel or Nest.js · PostgreSQL · BI / analytics tooling',
        'highlights'  => [
            'Role-based dashboards for teams and management',
            'Automations for repetitive internal processes',
            'Audit trails and reporting views for leadership',
        ],
        'services_url' => '/services/custom-software-development/',
        'techs_url'    => '/technologies/',
    ],
    [
        'label'       => 'Stack 04',
        'project'     => 'Content-led product & marketing site',
        'summary'     => 'Marketing site, blog and simple app flows sharing one stack.',
        'stack_line'  => 'Next.js or React.js · WordPress or headless CMS · REST / GraphQL APIs',
        'highlights'  => [
            'SEO-friendly landing pages and blog',
            'Headless or hybrid CMS powering multiple frontends',
            'Lead capture forms connected to CRM or email tools',
        ],
        'services_url' => '/services/web-development/',
        'techs_url'    => '/technologies/',
    ],
];
?>

<section
    id="tech-stacks"
    class="border-t border-slate-100 bg-white py-16 sm:py-20 lg:py-24"
    data-tech-stacks-section
    itemscope
    itemtype="https://schema.org/ItemList"
>
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <header
            class="mb-10 space-y-4 text-center md:text-left"
            data-tech-stacks-header
        >
            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-sky-600">
                Example stacks
            </p>
            <h2
                class="text-display-md sm:text-display-lg md:text-display-xl font-bold text-slate-900"
                itemprop="name"
            >
                Sample tech stacks for common project types
            </h2>
            <p class="text-sm sm:text-base text-slate-600 max-w-3xl">
                These examples show how we typically combine React/Next.js, Node/Nest.js, Laravel,
                Flutter, WordPress, PostgreSQL, MySQL and AWS into practical stacks. The exact mix
                is always adjusted to your product, team and constraints.
            </p>
        </header>

        <?php if (!empty($examples)): ?>
            <div
                class="grid gap-6 sm:gap-7 md:grid-cols-2"
                data-tech-stacks-grid
            >
                <?php
                    $position = 1;
                    foreach ($examples as $example):
                        $label       = $example['label'] ?? '';
                        $project     = $example['project'] ?? '';
                        $summary     = $example['summary'] ?? '';
                        $stackLine   = $example['stack_line'] ?? '';
                        $highlights  = $example['highlights'] ?? [];
                        $servicesUrl = $example['services_url'] ?? '/services/';
                        $techsUrl    = $example['techs_url'] ?? '/technologies/';
                ?>
                    <article
                        class="group relative flex flex-col rounded-2xl border border-slate-200 bg-slate-50 p-5 sm:p-6 lg:p-7 shadow-sm hover:border-sky-500/70 hover:bg-white hover:shadow-md hover:shadow-sky-100 transition-colors"
                        data-tech-stack-card
                        itemprop="itemListElement"
                        itemscope
                        itemtype="https://schema.org/Thing"
                    >
                        <meta itemprop="position" content="<?= (int) $position; ?>">

                        <div class="mb-4 flex items-start justify-between gap-3">
                            <div class="space-y-2">
                                <?php if ($label !== ''): ?>
                                    <p class="inline-flex items-center rounded-full bg-slate-100 px-2.5 py-0.5 text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-700">
                                        <span class="mr-1.5 h-1.5 w-1.5 rounded-full bg-sky-500"></span>
                                        <?= htmlspecialchars($label, ENT_QUOTES); ?>
                                    </p>
                                <?php endif; ?>

                                <?php if ($project !== ''): ?>
                                    <h3
                                        class="text-base sm:text-lg font-semibold text-slate-900 group-hover:text-sky-700"
                                        itemprop="name"
                                    >
                                        <?= htmlspecialchars($project, ENT_QUOTES); ?>
                                    </h3>
                                <?php endif; ?>

                                <?php if ($summary !== ''): ?>
                                    <p class="text-xs sm:text-sm text-slate-600">
                                        <?= htmlspecialchars($summary, ENT_QUOTES); ?>
                                    </p>
                                <?php endif; ?>
                            </div>

                            <div class="flex-none">
                                <div class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-slate-100 ring-1 ring-slate-200">
                                    <span class="text-[11px] font-semibold text-slate-700">
                                        <?= sprintf('%02d', $position); ?>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <?php if ($stackLine !== ''): ?>
                            <p class="mb-3 text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">
                                Typical stack
                            </p>
                            <p class="mb-4 text-xs sm:text-sm font-medium text-slate-900">
                                <?= htmlspecialchars($stackLine, ENT_QUOTES); ?>
                            </p>
                        <?php endif; ?>

                        <?php if (!empty($highlights)): ?>
                            <ul class="mb-4 flex-1 space-y-1.5 text-xs sm:text-sm text-slate-700">
                                <?php foreach ($highlights as $highlight): ?>
                                    <li class="flex gap-2">
                                        <span class="mt-1 h-1.5 w-1.5 flex-none rounded-full bg-sky-500"></span>
                                        <span><?= htmlspecialchars($highlight, ENT_QUOTES); ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                        <div class="mt-auto flex flex-wrap items-center justify-between gap-3 pt-3 border-t border-slate-200">
                            <div class="flex flex-wrap gap-2">
                                <a
                                    href="<?= htmlspecialchars($servicesUrl, ENT_QUOTES); ?>"
                                    class="inline-flex items-center text-[11px] font-semibold text-sky-700 hover:text-sky-600"
                                >
                                    View relevant services
                                    <span class="ml-1 inline-block translate-y-px">→</span>
                                </a>
                                <span class="hidden text-[11px] text-slate-400 sm:inline">
                                    ·
                                </span>
                                <a
                                    href="<?= htmlspecialchars($techsUrl, ENT_QUOTES); ?>#tech-frontend"
                                    class="inline-flex items-center text-[11px] font-semibold text-slate-600 hover:text-sky-700"
                                >
                                    Explore technologies
                                </a>
                            </div>
                            <span class="text-[10px] uppercase tracking-[0.18em] text-slate-400">
                                Example stack
                            </span>
                        </div>
                    </article>
                <?php
                    $position++;
                    endforeach;
                ?>
            </div>
        <?php endif; ?>
    </div>
</section>
