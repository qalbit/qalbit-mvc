<?php
// Expecting $process to contain the Start-up MVP config (e.g. config('process.start-up-mvp')).

$services = $process['services'] ?? [];

// Basic meta
$id      = $services['id']      ?? 'mvp-services';
$eyebrow = $services['eyebrow'] ?? 'What we build';
$title   = $services['title']   ?? 'MVP development services we offer';
$intro   = $services['intro']
    ?? 'From first prototype to launch and early traction, we design and build focused MVPs that validate your riskiest assumptions while keeping the codebase ready for the next phase of growth.';

// Default items (fallbacks)
$defaultItems = [
    [
        'key'         => 'saas-mvp',
        'label'       => 'SaaS MVP development',
        'description' => 'Multi-tenant web apps, subscriptions, roles and permissions, billing and admin dashboards built with Laravel, React or Next.js and modern infrastructure.',
        'link_label'  => 'Learn about our custom software services',
        'link_href'   => '/services/custom-software-development/',
    ],
    [
        'key'         => 'web-app-mvp',
        'label'       => 'Web app MVPs',
        'description' => 'Browser-based products and internal tools with responsive UI, authentication, reporting and integrations into CRMs, ERPs or third-party APIs.',
        'link_label'  => 'Explore web application development',
        'link_href'   => '/services/web-application-development/',
    ],
    [
        'key'         => 'mobile-app-mvp',
        'label'       => 'Mobile app MVP (Flutter)',
        'description' => 'Cross-platform mobile MVPs using Flutter with shared codebase, backend APIs and analytics so you can iterate quickly on iOS and Android.',
        'link_label'  => 'View mobile app development services',
        'link_href'   => '/services/mobile-development/',
    ],
    [
        'key'         => 'internal-tools',
        'label'       => 'Internal tools & dashboards',
        'description' => 'Operational MVPs for sales, support, logistics, finance and operations teams, replacing spreadsheets with reliable, role-based applications.',
        'link_label'  => 'See how we support different industries',
        'link_href'   => '/industries/',
    ],
    [
        'key'         => 'prototyping-ux',
        'label'       => 'Prototyping & clickable UX flows',
        'description' => 'Low-fidelity and high-fidelity prototypes, user journeys and interface designs to validate ideas with users and investors before writing full production code.',
        'link_label'  => 'Learn more about our UX design',
        'link_href'   => '/services/ux-design-services/',
    ],
    [
        'key'         => 'api-backend',
        'label'       => 'API & back-end for existing front-ends',
        'description' => 'Secure, well-documented REST and GraphQL APIs, authentication, payment integrations and data pipelines powering your existing web or mobile front-ends.',
        'link_label'  => 'Browse our technology stack',
        'link_href'   => '/technologies/',
    ],
    [
        'key'         => 'rescue-modernise',
        'label'       => 'Modernising or rescuing half-built MVPs',
        'description' => 'If you are stuck with a half-finished MVP or legacy code, we audit the existing product, stabilise what can be saved and plan a phased roadmap to get you to a reliable production release.',
        'note'        => 'Many clients switch to QalbIT after struggling to hire MVP developers who can take ownership of both the technical and product sides of the build.',
    ],
];

// Items from config or fallbacks
$items = $services['items'] ?? $defaultItems;
if (!is_array($items) || count($items) === 0) {
    $items = $defaultItems;
}

// Where-we-operate / note line
$note = $services['note']
    ?? 'We deliver MVP development services from Ahmedabad, India, partnering with founders and product teams in India, the UK, Europe, the Middle East and beyond.';
?>

<section
    id="<?= htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?>"
    data-mvp-section="s3"
    class="bg-slate-50"
>
    <div class="mx-auto max-w-6xl px-4 py-16 sm:px-6 lg:px-8 lg:py-20">
        <header class="max-w-3xl space-y-3">
            <p class="text-xs font-medium uppercase tracking-wide text-primary">
                <?= htmlspecialchars($eyebrow, ENT_QUOTES, 'UTF-8'); ?>
            </p>
            <h2 class="text-display-md sm:text-display-lg md:text-display-xl font-bold text-slate-900">
                <?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?>
            </h2>
            <p class="text-sm sm:text-base text-slate-600">
                <?= htmlspecialchars($intro, ENT_QUOTES, 'UTF-8'); ?>
            </p>
        </header>

        <div class="mt-10 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            <?php foreach ($items as $item): ?>
                <?php
                $label       = $item['label']       ?? 'MVP development service';
                $description = $item['description'] ?? '';
                $linkLabel   = $item['link_label']  ?? null;
                $linkHref    = $item['link_href']   ?? null;
                $itemNote    = $item['note']        ?? null;
                ?>
                <article
                    class="flex h-full flex-col rounded-2xl bg-white p-6 text-sm text-slate-600 shadow-sm ring-1 ring-slate-100"
                    data-mvp-service-card
                >
                    <h3 class="text-base font-semibold text-slate-900">
                        <?= htmlspecialchars($label, ENT_QUOTES, 'UTF-8'); ?>
                    </h3>

                    <?php if ($description !== ''): ?>
                        <p class="mt-2">
                            <?= htmlspecialchars($description, ENT_QUOTES, 'UTF-8'); ?>
                        </p>
                    <?php endif; ?>

                    <?php if ($itemNote !== null && $itemNote !== ''): ?>
                        <p class="mt-3 text-xs text-slate-500">
                            <?= htmlspecialchars($itemNote, ENT_QUOTES, 'UTF-8'); ?>
                        </p>
                    <?php endif; ?>

                    <?php if ($linkLabel !== null && $linkLabel !== '' && $linkHref !== null && $linkHref !== ''): ?>
                        <a
                            href="<?= htmlspecialchars($linkHref, ENT_QUOTES, 'UTF-8'); ?>"
                            class="mt-4 inline-flex text-xs font-medium text-primary hover:underline"
                        >
                            <?= htmlspecialchars($linkLabel, ENT_QUOTES, 'UTF-8'); ?>
                        </a>
                    <?php endif; ?>
                </article>
            <?php endforeach; ?>
        </div>

        <p class="mt-8 max-w-3xl text-sm text-slate-500">
            <?= htmlspecialchars($note, ENT_QUOTES, 'UTF-8'); ?>
        </p>
    </div>
</section>
