<?php
// ================================
// S7 – Tech stack & capabilities
// ================================

$tech = $process['tech'] ?? [];

$id      = $tech['id']      ?? 'mvp-tech';
$eyebrow = $tech['eyebrow'] ?? 'Tech stack';
$title   = $tech['title']   ?? 'Tech stack & delivery capabilities';
$intro   = $tech['intro']
    ?? 'We combine a modern, battle-tested technology stack with pragmatic engineering practices so your MVP ships quickly without blocking future scale.';

$categories = $tech['categories'] ?? [];
$note       = $tech['note']
    ?? 'Headquartered in Ahmedabad, India, we deliver MVPs for founders across India, the UK, Europe and the Middle East. Explore our full technology stack and services to see how we can support your roadmap.';

if (!is_array($categories) || count($categories) === 0) {
    $categories = [
        [
            'key'         => 'backend',
            'label'       => 'Backend & APIs',
            'description' => 'Robust, secure backends and APIs powering your SaaS, web and mobile MVPs.',
            'items'       => ['PHP', 'Laravel', 'Node.js', 'REST', 'GraphQL'],
        ],
        [
            'key'         => 'frontend',
            'label'       => 'Web frontends',
            'description' => 'Fast, accessible interfaces with component libraries aligned to your brand.',
            'items'       => ['React', 'Next.js', 'Vue', 'Tailwind CSS'],
        ],
        [
            'key'         => 'mobile',
            'label'       => 'Mobile apps',
            'description' => 'Cross-platform mobile MVPs with shared code and native-feeling experiences.',
            'items'       => ['Flutter', 'Android', 'iOS'],
        ],
        [
            'key'         => 'infra',
            'label'       => 'Infrastructure & data',
            'description' => 'Deployments, observability and storage tuned for the MVP stage and beyond.',
            'items'       => ['MySQL', 'PostgreSQL', 'Redis', 'AWS', 'DigitalOcean'],
        ],
    ];
}
?>

<section
    id="<?= htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?>"
    data-mvp-section="s7"
    class="bg-white"
>
    <div class="mx-auto max-w-6xl px-4 py-16 sm:px-6 lg:px-8 lg:py-20">
        <header class="max-w-3xl space-y-3">
            <h2 class="text-display-md sm:text-display-lg md:text-display-xl font-bold text-slate-900">
                <?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?>
            </h2>
            <p class="text-sm sm:text-base text-slate-600">
                <?= htmlspecialchars($intro, ENT_QUOTES, 'UTF-8'); ?>
            </p>
        </header>

        <div class="mt-8 grid gap-6 md:grid-cols-2 lg:mt-10 lg:grid-cols-4">
            <?php foreach ($categories as $category): ?>
                <?php
                $key         = $category['key']         ?? 'stack';
                $label       = $category['label']       ?? 'Capability';
                $description = $category['description'] ?? '';
                $items       = $category['items']       ?? [];
                ?>
                <div
                    class="flex h-full flex-col rounded-2xl bg-slate-50 p-5 text-sm shadow-sm ring-1 ring-slate-100"
                    data-mvp-tech-item="<?= htmlspecialchars($key, ENT_QUOTES, 'UTF-8'); ?>"
                >
                    <h3 class="text-sm font-semibold text-slate-900">
                        <?= htmlspecialchars($label, ENT_QUOTES, 'UTF-8'); ?>
                    </h3>
                    <?php if ($description !== ''): ?>
                        <p class="mt-2 text-xs text-slate-600">
                            <?= htmlspecialchars($description, ENT_QUOTES, 'UTF-8'); ?>
                        </p>
                    <?php endif; ?>

                    <?php if (is_array($items) && count($items) > 0): ?>
                        <div class="mt-3 flex flex-wrap gap-2 text-[11px]">
                            <?php foreach ($items as $item): ?>
                                <span class="rounded-full bg-accent-200 px-1.5 py-1 text-slate-800 ring-1 ring-slate-200">
                                    <?= htmlspecialchars($item, ENT_QUOTES, 'UTF-8'); ?>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>

        <p class="mt-6 max-w-3xl text-sm text-slate-500">
            <?= htmlspecialchars($note, ENT_QUOTES, 'UTF-8'); ?>
            <a href="/technologies/" class="font-medium text-accent-600 hover:underline">Technology stack</a>
            <span class="text-slate-400"> · </span>
            <a href="/services/" class="font-medium text-accent-600 hover:underline">Services</a>
        </p>
    </div>
</section>