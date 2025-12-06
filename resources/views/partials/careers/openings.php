<?php
/**
 * Careers – Open Positions (C3, simplified – no filters)
 *
 * Expects:
 * - $page           (array) from config('careers.page')
 * - $sections       (array) from config('careers.sections')
 * - $filters        (array) from config('careers.filters') – used only for labels
 * - $openRoles      (array) all open roles
 * - $evergreenRoles (array) from config('careers.evergreen_roles')
 */

$page           = $page           ?? [];
$sections       = $sections       ?? [];
$filters        = $filters        ?? [];
$openRoles      = $openRoles      ?? [];
$evergreenRoles = $evergreenRoles ?? [];

$openingsConfig = $sections['openings'] ?? [];

$id       = $openingsConfig['id']       ?? 'careers-openings';
$title    = $openingsConfig['title']    ?? 'Open positions at QalbIT';
$subtitle = $openingsConfig['subtitle']
    ?? 'Roles where you can work on real products – SaaS, platforms, internal tools – with modern stacks and direct business impact.';

$teams            = $filters['teams']             ?? [];
$experienceLevels = $filters['experience_levels'] ?? [];
$locations        = $filters['locations']         ?? [];
$employmentTypes  = $filters['employment_types']  ?? [];

$basePath = $page['slug'] ?? '/career/';

$totalOpenCount = count($openRoles);
?>

<section
    id="<?= htmlspecialchars($id, ENT_QUOTES); ?>"
    class="relative bg-white text-slate-900 py-10 sm:py-12 lg:py-14 border-t border-slate-100"
    data-careers-section="openings"
>
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 space-y-6 sm:space-y-7">
        <!-- Header + summary -->
        <header class="flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
            <div class="space-y-2 max-w-2xl">
                <h2 class="text-display-md sm:text-display-lg md:text-display-xl font-bold tracking-tight">
                    <?= htmlspecialchars($title, ENT_QUOTES); ?>
                </h2>
                <p class="text-sm text-slate-600">
                    <?= htmlspecialchars($subtitle, ENT_QUOTES); ?>
                </p>
            </div>

            <div class="flex flex-col items-start sm:items-end gap-0.5 text-[11px] text-slate-500">
                <span>
                    Currently
                    <span class="font-semibold text-slate-900"><?= $totalOpenCount; ?></span>
                    open position<?= $totalOpenCount === 1 ? '' : 's'; ?>
                </span>
                <span class="text-[11px] text-slate-400">
                    We focus on a small number of roles at a time so we can give candidates proper attention.
                </span>
            </div>
        </header>

        <!-- Open roles grid -->
        <div class="space-y-6">
            <?php if ($totalOpenCount > 0): ?>
                <div
                    class="grid gap-4 sm:gap-5 sm:grid-cols-1 lg:grid-cols-2"
                    data-careers-el="openings-grid"
                >
                    <?php foreach ($openRoles as $roleId => $role): ?>
                        <?php
                            $title       = $role['title']        ?? 'Role';
                            $teamKey     = $role['team']         ?? null;
                            $teamLabel   = $teams[$teamKey]      ?? null;
                            $locationKey = $role['location']     ?? null;
                            $locLabel    = $locations[$locationKey] ?? null;
                            $expKey      = $role['experience']   ?? null;
                            $expLabel    = $experienceLevels[$expKey] ?? null;
                            $typeKey     = $role['employment_type'] ?? null;
                            $typeLabel   = $employmentTypes[$typeKey] ?? null;
                            $slug        = $role['apply_url']         ?? null;
                            $href        = $slug ? ($basePath . ltrim($slug, '/')) : '#careers-apply';
                            $badge       = $role['badge']        ?? null;
                        ?>
                        <article
                            class="group flex flex-col rounded-2xl border border-slate-200 bg-slate-50/70 p-4 sm:p-5 hover:border-sky-300 hover:bg-white transition-colors"
                            data-careers-el="open-role-card"
                        >
                            <div class="flex items-start justify-between gap-2">
                                <h3 class="text-[15px] sm:text-sm md:text-[15px] font-semibold text-slate-900">
                                    <?= htmlspecialchars($title, ENT_QUOTES); ?>
                                </h3>
                                <?php if ($badge): ?>
                                    <span class="inline-flex items-center rounded-full bg-emerald-50 px-2.5 py-0.5 text-[10px] font-semibold text-emerald-700 border border-emerald-100">
                                        <?= htmlspecialchars($badge, ENT_QUOTES); ?>
                                    </span>
                                <?php endif; ?>
                            </div>

                            <dl class="mt-2 space-y-1.5 text-[11px] text-slate-600">
                                <?php if ($teamLabel): ?>
                                    <div class="flex items-center gap-1.5">
                                        <dt class="text-slate-500">Team:</dt>
                                        <dd class="font-medium text-slate-700"><?= htmlspecialchars($teamLabel, ENT_QUOTES); ?></dd>
                                    </div>
                                <?php endif; ?>
                                <?php if ($locLabel): ?>
                                    <div class="flex items-center gap-1.5">
                                        <dt class="text-slate-500">Location:</dt>
                                        <dd class="font-medium text-slate-700"><?= htmlspecialchars($locLabel, ENT_QUOTES); ?></dd>
                                    </div>
                                <?php endif; ?>
                                <?php if ($expLabel): ?>
                                    <div class="flex items-center gap-1.5">
                                        <dt class="text-slate-500">Experience:</dt>
                                        <dd class="font-medium text-slate-700"><?= htmlspecialchars($expLabel, ENT_QUOTES); ?></dd>
                                    </div>
                                <?php endif; ?>
                                <?php if ($typeLabel): ?>
                                    <div class="flex items-center gap-1.5">
                                        <dt class="text-slate-500">Type:</dt>
                                        <dd class="font-medium text-slate-700"><?= htmlspecialchars($typeLabel, ENT_QUOTES); ?></dd>
                                    </div>
                                <?php endif; ?>
                            </dl>

                            <?php if (!empty($role['highlights']) && is_array($role['highlights'])): ?>
                                <ul class="mt-3 space-y-1.5 text-[11px] text-slate-600">
                                    <?php foreach (array_slice($role['highlights'], 0, 3) as $line): ?>
                                        <li class="flex gap-1.5">
                                            <span class="mt-[6px] h-[3px] w-[3px] rounded-full bg-slate-400 flex-none"></span>
                                            <span><?= htmlspecialchars($line, ENT_QUOTES); ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>

                            <div class="mt-4 flex items-center justify-between text-[11px]">
                                <a
                                    href="<?= htmlspecialchars($href, ENT_QUOTES); ?>"
                                    class="inline-flex items-center gap-1 font-semibold text-sky-700 hover:text-sky-600"
                                >
                                    View details & apply
                                    <span aria-hidden="true">→</span>
                                </a>
                                <?php if (!empty($role['updated_label'])): ?>
                                    <span class="text-[10px] text-slate-400">
                                        <?= htmlspecialchars($role['updated_label'], ENT_QUOTES); ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="rounded-2xl border border-dashed border-slate-200 bg-slate-50/80 px-4 py-6 sm:px-5 sm:py-8 text-center text-sm text-slate-600">
                    <p class="font-medium text-slate-800 mb-1">
                        We don’t have active openings listed right now.
                    </p>
                    <p class="text-[13px] text-slate-600 mb-3">
                        We are always happy to hear from strong engineers, designers and product-minded people. You can still send us your profile for future roles.
                    </p>
                    <a
                        href="/contact-us/?ref=careers-general-application"
                        class="inline-flex items-center justify-center rounded-full border border-slate-300 bg-white px-4 py-1.5 text-[12px] font-medium text-slate-800 hover:border-sky-300 hover:text-sky-800"
                    >
                        Share your profile for future opportunities
                    </a>
                </div>
            <?php endif; ?>
        </div>

        <!-- Evergreen roles (optional band) -->
        <?php if (!empty($evergreenRoles)): ?>
            <div class="rounded-2xl border border-amber-100 bg-amber-50/80 px-4 py-4 sm:px-5 sm:py-5">
                <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
                    <div class="space-y-1 max-w-xl">
                        <p class="text-[11px] font-semibold uppercase tracking-[0.16em] text-amber-700">
                            Evergreen roles we’re always open to
                        </p>
                        <p class="text-[13px] text-amber-900">
                            Even when there’s no active listing, we regularly speak with strong profiles for these roles.
                        </p>
                    </div>
                    <div class="mt-2 grid gap-2 sm:mt-0 sm:grid-cols-2">
                        <?php foreach ($evergreenRoles as $roleId => $role): ?>
                            <?php $titleEvergreen = $role['label'] ?? 'Evergreen role'; ?>
                            <div class="flex items-center gap-2 rounded-full border border-amber-200 bg-amber-50 px-3 py-1.5 text-[11px] text-amber-900">
                                <span class="h-1.5 w-1.5 rounded-full bg-amber-500 flex-none"></span>
                                <span class="font-medium"><?= htmlspecialchars($titleEvergreen, ENT_QUOTES); ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
