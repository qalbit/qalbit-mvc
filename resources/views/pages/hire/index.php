<?php
/**
 * Hire Developers hub – /hire-developers/
 *
 * Expected:
 *   @var array $roles  Enabled hire roles from config/hire.php (sorted by order)
 *   @var array $faqs   FAQs for the hub page (optional)
 */

$roles = $roles ?? [];
$faqs  = $faqs ?? [];

// Roles we want to visually prioritise (core expertise)
$featuredSlugs = [
    '/hire-laravel-developers/',
    '/hire-nodejs-developers/',
    '/hire-nextjs-developers/',
];

// Inline SVG icon per role slug (Heroicons outline, 24x24, stroke 1.5)
$roleIcons = [
    'laravel'    => 'M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5',
    'nodejs'     => 'M5.25 14.25h13.5m-13.5 0a3 3 0 0 1-3-3m3 3a3 3 0 1 0 0 6h13.5a3 3 0 1 0 0-6m-16.5-3a3 3 0 0 1 3-3h13.5a3 3 0 0 1 3 3m-19.5 0a4.5 4.5 0 0 1 .9-2.7L5.737 5.1a3.375 3.375 0 0 1 2.7-1.35h7.126c1.062 0 2.062.5 2.7 1.35l2.587 3.45a4.5 4.5 0 0 1 .9 2.7m0 0a3 3 0 0 1-3 3m0 3h.008v.008h-.008v-.008Zm0-6h.008v.008h-.008v-.008Zm-3 6h.008v.008h-.008v-.008Zm0-6h.008v.008h-.008v-.008Z',
    'nextjs'     => 'm3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z',
    'reactjs'    => 'M8.25 3v1.5M4.5 8.25H3m18 0h-1.5M4.5 12H3m18 0h-1.5m-15 3.75H3m18 0h-1.5M8.25 19.5V21M12 3v1.5m0 15V21m3.75-18v1.5m0 15V21m-9-1.5h10.5a2.25 2.25 0 0 0 2.25-2.25V6.75a2.25 2.25 0 0 0-2.25-2.25H6.75A2.25 2.25 0 0 0 4.5 6.75v10.5a2.25 2.25 0 0 0 2.25 2.25Zm.75-12h9v9h-9v-9Z',
    'php'        => 'm6.75 7.5 3 2.25-3 2.25m4.5 0h3m-9 8.25h13.5A2.25 2.25 0 0 0 21 18V6a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 6v12a2.25 2.25 0 0 0 2.25 2.25Z',
    'flutter'    => 'M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3',
    'mvp'        => 'M15.59 14.37a6 6 0 0 1-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 0 0 6.16-12.12A14.98 14.98 0 0 0 9.631 8.41m5.96 5.96a14.926 14.926 0 0 1-5.841 2.58m-.119-8.54a6 6 0 0 0-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 0 0-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 0 1-2.448-2.448 14.9 14.9 0 0 1 .06-.312m-2.24 2.39a4.493 4.493 0 0 0-1.757 4.306 4.493 4.493 0 0 0 4.306-1.758M16.5 9a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z',
    'full-stack' => 'M6.429 9.75 2.25 12l4.179 2.25m0-4.5 5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0 4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0-5.571 3-5.571-3',
];

$iconFor = function (string $slug) use ($roleIcons): string {
    foreach ($roleIcons as $key => $path) {
        if (str_contains($slug, $key)) {
            return $path;
        }
    }
    return $roleIcons['full-stack'];
};
?>

<!-- S1 · Hero -->
<section class="relative overflow-hidden bg-slate-50 text-slate-900 py-8 sm:py-20 lg:py-24">
    <div class="relative mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 space-y-4 md:space-y-10">

        <!-- Breadcrumbs -->
        <nav class="text-xs font-medium text-slate-600" aria-label="Breadcrumb">
            <ol class="flex flex-wrap items-center gap-1">
                <li><a href="/" class="hover:text-sky-500 transition-colors">Home</a></li>
                <li aria-hidden="true">/</li>
                <li aria-current="page">Hire Developers</li>
            </ol>
        </nav>

        <div class="grid gap-10 lg:grid-cols-[minmax(0,3fr)_minmax(0,2fr)] lg:items-center">
            <!-- Left: copy -->
            <div class="space-y-6">
                <span class="hidden items-center rounded-pill border border-slate-200 bg-white/90 px-3 py-1
                            text-[11px] font-semibold uppercase tracking-[0.14em] text-muted-foreground shadow-soft
                            md:inline-flex">
                    Hire developers
                    <span class="ml-2 h-1 w-1 rounded-full bg-sky-400"></span>
                    <span class="ml-2 opacity-80">Dedicated · Remote · India</span>
                </span>

                <div class="flex justify-center md:hidden">
                    <span class="inline-flex items-center rounded-pill border border-slate-200 bg-white/90 px-3 py-1
                                text-[11px] font-semibold uppercase tracking-[0.14em] text-muted-foreground shadow-soft text-center">
                        Dedicated · Remote · India
                    </span>
                </div>

                <h1 class="text-display-md sm:text-display-lg md:text-display-2xl font-bold text-center md:text-left">
                    Hire Dedicated Developers Who Work Like
                    <span class="text-gradient-brand-animated">Your Own Team</span>.
                </h1>

                <p class="text-md font-medium text-slate-600 text-center md:text-left">
                    Extend your product team with senior Laravel, Node.js, Next.js, React and Flutter
                    engineers from QalbIT. Interview first, onboard in 1–2 weeks, scale up or down monthly —
                    with a technical lead, QA support and a replacement guarantee behind every developer.
                </p>

                <div class="flex flex-col items-center md:items-start gap-2">
                    <div class="flex flex-col w-full md:flex-row md:flex-wrap items-stretch md:items-center gap-3">
                        <a href="<?= route_url('/contact-us/?topic=hire-developers') ?>" class="btn btn-accent btn-radius-pill">
                            Request developer profiles
                        </a>
                        <a href="https://crm.qalbit.com/book/discuss-project?utm_source=qalbit-site&amp;utm_medium=hero-cta&amp;utm_campaign=hire-developers-hub"
                           class="btn btn-primary-outline btn-radius-pill">
                            Book a quick intro call
                        </a>
                    </div>
                    <p class="text-[11px] text-slate-600">
                        Shortlisted profiles typically shared within <span class="font-semibold">24–48 hours</span>. NDAs welcome.
                    </p>
                </div>
            </div>

            <!-- Right: trust snapshot -->
            <div class="space-y-5 rounded-3xl border border-slate-300 bg-slate-100/70 p-5 sm:p-6 lg:p-7 backdrop-blur">
                <p class="text-[11px] font-semibold uppercase tracking-[0.16em] text-slate-500">
                    Why teams hire through QalbIT
                </p>

                <dl class="grid grid-cols-2 gap-4">
                    <div class="rounded-2xl border border-slate-200 bg-white p-4">
                        <dt class="text-[11px] font-medium uppercase tracking-wide text-slate-500">Onboarding</dt>
                        <dd class="mt-1 text-2xl font-bold text-slate-900">1–2 <span class="text-sm font-semibold text-slate-500">weeks</span></dd>
                    </div>
                    <div class="rounded-2xl border border-slate-200 bg-white p-4">
                        <dt class="text-[11px] font-medium uppercase tracking-wide text-slate-500">Cost advantage</dt>
                        <dd class="mt-1 text-2xl font-bold text-slate-900">50–70<span class="text-sm font-semibold text-slate-500">%</span></dd>
                    </div>
                    <div class="rounded-2xl border border-slate-200 bg-white p-4">
                        <dt class="text-[11px] font-medium uppercase tracking-wide text-slate-500">Time-zone overlap</dt>
                        <dd class="mt-1 text-2xl font-bold text-slate-900">US · UK · GCC</dd>
                    </div>
                    <div class="rounded-2xl border border-slate-200 bg-white p-4">
                        <dt class="text-[11px] font-medium uppercase tracking-wide text-slate-500">Recruitment fees</dt>
                        <dd class="mt-1 text-2xl font-bold text-slate-900">Zero</dd>
                    </div>
                </dl>

                <ul class="space-y-2 text-[13px] text-slate-600">
                    <li class="flex items-start gap-2">
                        <svg class="mt-0.5 h-4 w-4 shrink-0 text-emerald-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" /></svg>
                        Interview every developer before you commit.
                    </li>
                    <li class="flex items-start gap-2">
                        <svg class="mt-0.5 h-4 w-4 shrink-0 text-emerald-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" /></svg>
                        Free replacement if a developer isn’t the right fit.
                    </li>
                    <li class="flex items-start gap-2">
                        <svg class="mt-0.5 h-4 w-4 shrink-0 text-emerald-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" /></svg>
                        You own all code, repositories and IP from day one.
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- S2 · Role cards -->
<section class="py-16 sm:py-20 bg-white" aria-labelledby="hire-roles-heading">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 space-y-10">
        <header class="max-w-3xl space-y-3">
            <span class="inline-flex items-center rounded-pill border border-slate-200 bg-slate-50 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-slate-500">
                Developer profiles
            </span>
            <h2 id="hire-roles-heading" class="text-display-sm sm:text-display-md font-bold text-slate-900">
                Pick the expertise your roadmap needs
            </h2>
            <p class="text-slate-600">
                Every profile is a senior, product-minded engineer backed by our delivery team —
                not a solo contractor. Start with one developer or assemble a full squad.
            </p>
        </header>

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <?php foreach ($roles as $role): ?>
                <?php
                    $slug       = $role['slug'] ?? '#';
                    $name       = $role['name'] ?? '';
                    $desc       = $role['short_description'] ?? '';
                    $kicker     = $role['hero']['kicker_detail'] ?? '';
                    $tags       = $kicker !== '' ? array_map('trim', explode('·', $kicker)) : [];
                    $isFeatured = in_array($slug, $featuredSlugs, true);
                ?>
                <article class="group relative flex h-full flex-col rounded-3xl border p-6 transition-all duration-200 hover:shadow-lg
                                <?= $isFeatured
                                    ? 'border-primary-200 bg-gradient-to-b from-primary-50/60 to-white shadow-soft hover:border-primary-300'
                                    : 'border-slate-200 bg-white hover:border-slate-300' ?>">

                    <?php if ($isFeatured): ?>
                        <span class="absolute right-5 top-5 inline-flex items-center gap-1 rounded-pill bg-primary-700 px-2.5 py-1 text-[10px] font-semibold uppercase tracking-wide text-white">
                            <svg class="h-3 w-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" /></svg>
                            Core expertise
                        </span>
                    <?php endif; ?>

                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl
                                <?= $isFeatured ? 'bg-primary-700 text-white' : 'bg-slate-100 text-slate-700' ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="<?= $iconFor($slug) ?>" />
                        </svg>
                    </div>

                    <h3 class="mt-4 text-lg font-bold text-slate-900">
                        <a href="<?= htmlspecialchars($slug) ?>" class="focus:outline-none">
                            <span class="absolute inset-0" aria-hidden="true"></span>
                            <?= htmlspecialchars($name) ?>
                        </a>
                    </h3>

                    <?php if ($desc !== ''): ?>
                        <p class="mt-2 flex-1 text-[13px] leading-relaxed text-slate-600 line-clamp-3">
                            <?= htmlspecialchars($desc) ?>
                        </p>
                    <?php endif; ?>

                    <?php if (!empty($tags)): ?>
                        <ul class="mt-4 flex flex-wrap gap-1.5">
                            <?php foreach (array_slice($tags, 0, 3) as $tag): ?>
                                <li class="rounded-pill border border-slate-200 bg-slate-50 px-2.5 py-0.5 text-[11px] font-medium text-slate-600">
                                    <?= htmlspecialchars($tag) ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <span class="mt-5 inline-flex items-center gap-1.5 text-[13px] font-semibold
                                 <?= $isFeatured ? 'text-primary-800' : 'text-primary-700' ?> transition-colors group-hover:text-primary-900">
                        View profile &amp; engagement options
                        <svg class="h-3.5 w-3.5 transition-transform group-hover:translate-x-0.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" /></svg>
                    </span>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- S3 · Why QalbIT (dark trust band) -->
<section class="bg-slate-950 py-16 sm:py-20 text-slate-50" aria-labelledby="hire-why-heading">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 space-y-10">
        <header class="max-w-3xl space-y-3">
            <span class="inline-flex items-center rounded-pill border border-slate-700/70 bg-slate-900/80 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-slate-300">
                Built for reliability
            </span>
            <h2 id="hire-why-heading" class="text-display-sm sm:text-display-md font-bold">
                Freelancer flexibility. <span class="text-gradient-brand">Company-level accountability.</span>
            </h2>
            <p class="text-slate-300">
                Every dedicated developer works inside QalbIT’s delivery system — the same one behind
                our own SaaS products and 120+ client projects.
            </p>
        </header>

        <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
            <?php
            $whyItems = [
                ['title' => 'Tech-lead oversight',      'desc' => 'A senior technical lead reviews architecture and every pull request — quality never depends on one person.', 'icon' => 'M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z'],
                ['title' => 'Replacement guarantee',    'desc' => 'If a developer is not the right fit, we replace them quickly at no extra recruitment cost.', 'icon' => 'M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99'],
                ['title' => 'Your IP, your repos',      'desc' => 'Work happens in your repositories under NDA. Code, documentation and infrastructure are yours from day one.', 'icon' => 'M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z'],
                ['title' => 'Transparent delivery',     'desc' => 'Sprints, demos and written updates in your tools — Jira, Linear, Slack or Teams. You always know what shipped.', 'icon' => 'M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z'],
                ['title' => 'Scale monthly',            'desc' => 'Add a developer when the roadmap grows, scale down when it doesn’t. No long lock-ins or notice-period drama.', 'icon' => 'M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941'],
                ['title' => 'QA & DevOps on tap',       'desc' => 'Testing, CI/CD and infrastructure support are available when needed — without hiring for every specialism.', 'icon' => 'M11.42 15.17 17.25 21A2.652 2.652 0 0 0 21 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 1 1-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 0 0 4.486-6.336l-3.276 3.277a3.004 3.004 0 0 1-2.25-2.25l3.276-3.276a4.5 4.5 0 0 0-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085'],
            ];
            ?>
            <?php foreach ($whyItems as $item): ?>
                <div class="rounded-3xl border border-slate-800 bg-slate-900/60 p-6 transition-colors hover:border-slate-700">
                    <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-slate-800 text-sky-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="<?= $item['icon'] ?>" />
                        </svg>
                    </div>
                    <h3 class="mt-4 text-base font-semibold text-white"><?= htmlspecialchars($item['title']) ?></h3>
                    <p class="mt-2 text-[13px] leading-relaxed text-slate-400"><?= htmlspecialchars($item['desc']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- S4 · How it works -->
<section class="bg-slate-50 py-16 sm:py-20" aria-labelledby="hire-process-heading">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 space-y-10">
        <header class="max-w-3xl space-y-3">
            <span class="inline-flex items-center rounded-pill border border-slate-200 bg-white px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-slate-500">
                How it works
            </span>
            <h2 id="hire-process-heading" class="text-display-sm sm:text-display-md font-bold text-slate-900">
                From first call to first commit in about two weeks
            </h2>
        </header>

        <ol class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <?php
            $steps = [
                ['n' => '01', 'title' => 'Share your requirements', 'desc' => 'Tell us the stack, seniority and roadmap. We respond within 24–48 hours with matched profiles.'],
                ['n' => '02', 'title' => 'Interview the developers', 'desc' => 'Review CVs and code samples, then interview shortlisted engineers — technical rounds welcome.'],
                ['n' => '03', 'title' => 'Start with a pilot sprint', 'desc' => 'Begin with a low-risk paid sprint. See real output, communication and velocity before committing.'],
                ['n' => '04', 'title' => 'Scale with confidence',    'desc' => 'Convert to a monthly engagement. Add developers, QA or DevOps as your roadmap grows.'],
            ];
            ?>
            <?php foreach ($steps as $step): ?>
                <li class="relative rounded-3xl border border-slate-200 bg-white p-6">
                    <span class="text-3xl font-bold text-slate-200"><?= $step['n'] ?></span>
                    <h3 class="mt-3 text-base font-semibold text-slate-900"><?= htmlspecialchars($step['title']) ?></h3>
                    <p class="mt-2 text-[13px] leading-relaxed text-slate-600"><?= htmlspecialchars($step['desc']) ?></p>
                </li>
            <?php endforeach; ?>
        </ol>
    </div>
</section>

<!-- S5 · Engagement models -->
<section class="bg-white py-16 sm:py-20" aria-labelledby="hire-models-heading">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 space-y-10">
        <header class="max-w-3xl space-y-3">
            <span class="inline-flex items-center rounded-pill border border-slate-200 bg-slate-50 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-slate-500">
                Engagement models
            </span>
            <h2 id="hire-models-heading" class="text-display-sm sm:text-display-md font-bold text-slate-900">
                Three simple ways to work together
            </h2>
        </header>

        <div class="grid gap-6 lg:grid-cols-3">
            <?php
            $models = [
                [
                    'title' => 'Dedicated developer',
                    'desc'  => 'One senior engineer, full-time on your product, managed by you day to day with QalbIT quality oversight.',
                    'for'   => 'Ongoing roadmaps that need consistent velocity.',
                    'highlight' => false,
                ],
                [
                    'title' => 'Dedicated squad',
                    'desc'  => 'A cross-functional team — developers, QA and a technical lead — running your delivery end to end.',
                    'for'   => 'Products that need a complete engineering unit.',
                    'highlight' => true,
                ],
                [
                    'title' => 'Fixed-scope pilot',
                    'desc'  => 'A clearly bounded module or sprint with agreed cost and timeline. The lowest-risk way to evaluate us.',
                    'for'   => 'First-time engagements and well-defined scopes.',
                    'highlight' => false,
                ],
            ];
            ?>
            <?php foreach ($models as $model): ?>
                <div class="flex h-full flex-col rounded-3xl border p-7
                            <?= $model['highlight']
                                ? 'border-primary-300 bg-gradient-to-b from-primary-50/70 to-white shadow-soft'
                                : 'border-slate-200 bg-white' ?>">
                    <?php if ($model['highlight']): ?>
                        <span class="mb-3 inline-flex w-fit items-center rounded-pill bg-primary-700 px-2.5 py-1 text-[10px] font-semibold uppercase tracking-wide text-white">
                            Most popular
                        </span>
                    <?php endif; ?>
                    <h3 class="text-lg font-bold text-slate-900"><?= htmlspecialchars($model['title']) ?></h3>
                    <p class="mt-2 flex-1 text-[13px] leading-relaxed text-slate-600"><?= htmlspecialchars($model['desc']) ?></p>
                    <p class="mt-4 border-t border-slate-100 pt-4 text-[12px] text-slate-500">
                        <span class="font-semibold text-slate-700">Best for:</span>
                        <?= htmlspecialchars($model['for']) ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>

        <p class="text-[13px] text-slate-500">
            Not sure which fits? <a href="<?= route_url('/engagement-model/') ?>" class="font-semibold text-primary-700 hover:text-primary-900 underline-offset-2 hover:underline">Compare engagement models</a>
            or <a href="<?= route_url('/contact-us/?topic=hire-developers') ?>" class="font-semibold text-primary-700 hover:text-primary-900 underline-offset-2 hover:underline">ask us — we’ll recommend one honestly</a>.
        </p>
    </div>
</section>

<?php if (!empty($faqs)): ?>
    <?php
        $title    = 'Frequently asked questions about hiring dedicated developers';
        $subtitle = 'Straight answers about cost, onboarding speed, time zones, replacements and IP ownership when you hire developers through QalbIT.';
        $bullets  = [
            '✓ Covers pricing, onboarding, communication and scaling for dedicated teams.',
            '✓ Applies to Laravel, Node.js, Next.js, React, Flutter and full-stack engagements.',
            '✓ Written for founders, CTOs and engineering managers extending their teams.',
        ];
        include __DIR__ . '/../../partials/faq/section.php';
    ?>
<?php endif; ?>

<?php
// Final CTA with lead form
$errors   = $errors  ?? [];
$old      = $old     ?? [];
$success  = $success ?? null;
$leadFrom = 'lead_hire_developers_hub';

include __DIR__ . '/../../partials/contact/cta-section.php';
?>
