<?php

/**
 * Products index — enterprise portfolio page.
 * Self-contained (uses the QalbIT theme: primary blue + accent purple).
 *
 * @var array $page      config('products.page')
 * @var array $sections  config('products.page.sections')
 * @var array $items     App\Support\Product::all()
 */

$page     = $page     ?? [];
$sections = $sections ?? [];
$items    = $items    ?? [];

$hero      = $sections['hero'] ?? [];
$finalCta  = $sections['final_cta'] ?? [];

// Per-product accent gradient (theme-safe: primary/accent) so the grid reads
// like a real portfolio while staying on-brand.
$accents = [
    'urlcrop'   => 'from-primary-500 to-primary-700',
    'liftup'    => 'from-primary-600 to-accent-600',
    'pocketgst' => 'from-primary-700 to-accent-700',
    'emplyft'   => 'from-accent-500 to-accent-700',
];

$domains = [
    ['label' => 'Link management & infra', 'icon' => '🔗', 'text' => 'Fast, privacy-friendly link infrastructure with clean analytics.'],
    ['label' => 'Multi-tenant SaaS & AI',  'icon' => '⚙️', 'text' => 'Isolated tenants, AI editorial and connected growth data.'],
    ['label' => 'Fintech & tax compliance','icon' => '🧾', 'text' => 'Regulated, offline-first tooling built for real compliance.'],
    ['label' => 'HR & people tech',        'icon' => '👥', 'text' => 'People operations that automate the busywork.'],
];
?>

<!-- ============================ HERO ============================ -->
<section class="relative overflow-hidden bg-slate-950 text-white">
    <div class="pointer-events-none absolute -left-24 -top-24 h-80 w-80 rounded-full bg-primary-600/30 blur-3xl"></div>
    <div class="pointer-events-none absolute right-0 top-16 h-80 w-80 rounded-full bg-accent-600/30 blur-3xl"></div>
    <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(60%_50%_at_50%_0%,rgba(30,154,255,0.12),transparent)]"></div>

    <div class="relative mx-auto max-w-6xl px-4 py-12 sm:px-6 lg:px-8 lg:py-20">
        <!-- breadcrumb -->
        <nav class="text-[11px] font-medium text-slate-400" aria-label="Breadcrumb">
            <ol class="flex flex-wrap items-center gap-1">
                <li><a href="/" class="hover:text-primary-300">Home</a></li>
                <li class="text-slate-600">/</li>
                <li aria-current="page" class="text-slate-200">Products</li>
            </ol>
        </nav>

        <div class="mt-6 max-w-3xl">
            <span class="inline-flex items-center gap-1.5 rounded-full bg-white/10 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.16em] text-primary-200 ring-1 ring-white/15">
                <?= htmlspecialchars($hero['eyebrow'] ?? 'QalbIT Product Studio') ?>
            </span>

            <h1 class="mt-5 text-balance text-4xl font-extrabold leading-[1.05] tracking-tight sm:text-5xl md:text-[3.4rem]">
                Software products we
                <span class="bg-gradient-to-r from-primary-400 via-primary-300 to-accent-300 bg-clip-text text-transparent">designed, built &amp; run</span>.
            </h1>

            <p class="mt-5 max-w-2xl text-base leading-relaxed text-slate-300">
                Every product here was conceived, engineered and is operated by the QalbIT team — the same team that
                ships software for our clients. They're how we prove, not just promise, that we can take an idea from
                zero to a live, scaling product.
            </p>

            <div class="mt-8 flex flex-col gap-3 sm:flex-row sm:items-center">
                <a href="<?= htmlspecialchars($hero['primary_cta']['href'] ?? '/contact-us/?topic=product-studio') ?>"
                   class="inline-flex items-center justify-center gap-2 rounded-full bg-primary-600 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-primary-600/30 transition hover:bg-primary-500">
                    <?= htmlspecialchars($hero['primary_cta']['label'] ?? 'Build your product with us') ?>
                </a>
                <a href="<?= htmlspecialchars($hero['secondary_cta']['href'] ?? '/services/') ?>"
                   class="inline-flex items-center justify-center gap-2 rounded-full border border-white/20 bg-white/5 px-6 py-3 text-sm font-semibold text-white transition hover:bg-white/10">
                    <?= htmlspecialchars($hero['secondary_cta']['label'] ?? 'Explore our services') ?>
                </a>
            </div>
        </div>

        <!-- credibility band -->
        <dl class="mt-12 grid grid-cols-2 gap-6 border-t border-white/10 pt-8 sm:grid-cols-4">
            <?php
            $stats = [
                ['v' => (string) count($items), 'l' => 'Live &amp; in-build products'],
                ['v' => '4', 'l' => 'Distinct domains'],
                ['v' => 'Design→Ship', 'l' => 'We own the full lifecycle'],
                ['v' => 'Operated', 'l' => 'Run by us in production'],
            ];
            foreach ($stats as $s): ?>
                <div>
                    <dt class="text-2xl font-extrabold text-white sm:text-3xl"><?= $s['v'] ?></dt>
                    <dd class="mt-1 text-xs font-medium text-slate-400"><?= $s['l'] ?></dd>
                </div>
            <?php endforeach; ?>
        </dl>
    </div>
</section>

<!-- ============================ GRID ============================ -->
<section class="bg-slate-50 py-14 lg:py-20" data-products-section="grid">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <header class="mx-auto max-w-2xl text-center">
            <span class="text-xs font-semibold uppercase tracking-[0.18em] text-primary-600">The portfolio</span>
            <h2 class="mt-3 text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">Products we own and operate</h2>
            <p class="mt-3 text-sm leading-relaxed text-slate-600">
                A deliberately broad surface — link infrastructure, multi-tenant SaaS, regulated fintech and HR — that
                shows range across domains, compliance regimes and technologies.
            </p>
        </header>

        <div class="mt-10 grid gap-6 md:grid-cols-2">
            <?php foreach ($items as $product): ?>
                <?php
                    $slug        = trim((string) ($product['slug'] ?? ''), '/');
                    $name        = $product['name']        ?? '';
                    $tagline     = $product['tagline']     ?? '';
                    $valueProp   = $product['valueProp']   ?? '';
                    $audienceTag = $product['audienceTag'] ?? '';
                    $domain      = $product['domain']      ?? '';
                    $status      = $product['status']      ?? 'live';
                    $externalUrl = $product['externalUrl'] ?? null;
                    $techStack   = $product['tech_stack']  ?? [];
                    $storyHref   = '/products/' . $slug . '/';
                    $isLive      = ($status === 'live') && !empty($externalUrl);
                    $accent      = $accents[$slug] ?? 'from-primary-600 to-accent-600';
                    $isFlagship  = $slug === 'liftup';
                ?>
                <article
                    class="group flex flex-col overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-soft transition duration-200 hover:-translate-y-1 hover:border-slate-300 hover:shadow-xl"
                    data-products-el="card"
                    data-product-slug="<?= htmlspecialchars($slug, ENT_QUOTES); ?>"
                >
                    <!-- branded header -->
                    <div class="relative overflow-hidden bg-gradient-to-br <?= $accent ?> p-6 text-white">
                        <div class="pointer-events-none absolute -right-8 -top-10 h-28 w-28 rounded-full bg-white/15 blur-2xl"></div>
                        <div class="relative flex items-start justify-between gap-3">
                            <div>
                                <div class="flex items-center gap-2">
                                    <span class="text-2xl font-extrabold tracking-tight"><?= htmlspecialchars($name) ?></span>
                                    <?php if ($isFlagship): ?>
                                        <span class="rounded-full bg-white/20 px-2 py-0.5 text-[9px] font-bold uppercase tracking-[0.12em] text-white ring-1 ring-white/30">Flagship</span>
                                    <?php endif; ?>
                                </div>
                                <?php if (!empty($tagline)): ?>
                                    <p class="mt-1 text-sm font-medium text-white/85"><?= htmlspecialchars($tagline) ?></p>
                                <?php endif; ?>
                            </div>
                            <?php if ($isLive): ?>
                                <span class="inline-flex shrink-0 items-center gap-1 rounded-full bg-white/15 px-2.5 py-1 text-[10px] font-semibold uppercase tracking-[0.1em] text-white ring-1 ring-white/25">
                                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-300"></span> Live
                                </span>
                            <?php else: ?>
                                <span class="inline-flex shrink-0 items-center rounded-full bg-white/15 px-2.5 py-1 text-[10px] font-semibold uppercase tracking-[0.1em] text-white ring-1 ring-white/25">Coming soon</span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- body -->
                    <div class="flex flex-1 flex-col p-6">
                        <?php if (!empty($valueProp)): ?>
                            <p class="text-sm leading-relaxed text-slate-600"><?= htmlspecialchars($valueProp) ?></p>
                        <?php endif; ?>

                        <div class="mt-4 flex flex-wrap gap-1.5">
                            <?php if (!empty($audienceTag)): ?>
                                <span class="inline-flex items-center gap-1 rounded-full border border-slate-200 bg-slate-50 px-2.5 py-0.5 text-[10px] font-medium text-slate-600">
                                    <span class="text-primary-500">◆</span> <?= htmlspecialchars($audienceTag) ?>
                                </span>
                            <?php endif; ?>
                            <?php if (!empty($domain)): ?>
                                <span class="inline-flex items-center rounded-full border border-slate-200 bg-slate-50 px-2.5 py-0.5 text-[10px] font-medium text-slate-600"><?= htmlspecialchars($domain) ?></span>
                            <?php endif; ?>
                        </div>

                        <?php if (!empty($techStack)): ?>
                            <ul class="mt-3 flex flex-wrap gap-1.5">
                                <?php foreach (array_slice($techStack, 0, 4) as $tech): ?>
                                    <li class="rounded-md bg-slate-100 px-2 py-0.5 text-[10px] font-medium text-slate-500"><?= htmlspecialchars($tech) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                        <!-- dual CTAs -->
                        <div class="mt-auto flex flex-wrap items-center gap-2.5 pt-6">
                            <a href="<?= htmlspecialchars($storyHref, ENT_QUOTES) ?>"
                               class="inline-flex items-center gap-1.5 rounded-full bg-slate-900 px-4 py-2 text-xs font-semibold text-white transition hover:bg-slate-800">
                                Read the story
                                <span class="transition-transform group-hover:translate-x-0.5" aria-hidden="true">→</span>
                            </a>
                            <?php if ($isLive): ?>
                                <a href="<?= htmlspecialchars($externalUrl, ENT_QUOTES) ?>" target="_blank" rel="noopener noreferrer"
                                   class="inline-flex items-center gap-1.5 rounded-full border border-slate-300 px-4 py-2 text-xs font-semibold text-slate-700 transition hover:border-slate-400 hover:bg-slate-50">
                                    Visit site <span aria-hidden="true">↗</span>
                                </a>
                            <?php else: ?>
                                <span class="inline-flex cursor-not-allowed items-center rounded-full border border-slate-200 bg-slate-50 px-4 py-2 text-xs font-medium text-slate-400" aria-disabled="true">Coming soon</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ===================== PROOF ACROSS DOMAINS ===================== -->
<section class="bg-white py-14 lg:py-20">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-10 lg:grid-cols-[minmax(0,0.9fr)_minmax(0,1.1fr)] lg:items-center">
            <div>
                <span class="text-xs font-semibold uppercase tracking-[0.18em] text-primary-600">Why it matters</span>
                <h2 class="mt-3 text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">Proof across four very different domains</h2>
                <p class="mt-4 text-sm leading-relaxed text-slate-600">
                    Building and operating our own products keeps our engineering honest. It's also the strongest signal
                    for a services buyer: the same team handles link infrastructure, multi-tenant SaaS with AI, regulated
                    fintech and HR — across web and mobile, with real compliance and scale.
                </p>
                <a href="/services/" class="mt-6 inline-flex items-center gap-1.5 text-sm font-semibold text-primary-700 hover:text-primary-900">
                    See the services behind them <span aria-hidden="true">→</span>
                </a>
            </div>
            <div class="grid gap-4 sm:grid-cols-2">
                <?php foreach ($domains as $d): ?>
                    <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5 transition hover:border-primary-200 hover:bg-white hover:shadow-md">
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-white text-lg ring-1 ring-slate-200"><?= $d['icon'] ?></div>
                        <h3 class="mt-3 text-sm font-bold text-slate-900"><?= htmlspecialchars($d['label']) ?></h3>
                        <p class="mt-1 text-xs leading-relaxed text-slate-600"><?= htmlspecialchars($d['text']) ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- ============================ CTA ============================ -->
<section class="relative overflow-hidden bg-gradient-to-br from-primary-700 via-primary-800 to-accent-900 py-16 text-white">
    <div class="pointer-events-none absolute -right-16 -top-16 h-64 w-64 rounded-full bg-white/10 blur-3xl"></div>
    <div class="pointer-events-none absolute -bottom-20 -left-10 h-64 w-64 rounded-full bg-accent-400/20 blur-3xl"></div>
    <div class="relative mx-auto max-w-3xl px-4 text-center sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold tracking-tight sm:text-3xl">
            <?= htmlspecialchars($finalCta['title'] ?? 'Have a product idea of your own?') ?>
        </h2>
        <p class="mx-auto mt-3 max-w-xl text-sm leading-relaxed text-primary-100">
            <?= htmlspecialchars($finalCta['subtitle'] ?? 'We build our own products the same way we build yours — with product thinking, clean architecture and a team that operates what it ships.') ?>
        </p>
        <div class="mt-7 flex flex-col items-center justify-center gap-3 sm:flex-row">
            <a href="<?= htmlspecialchars($finalCta['primary_cta']['href'] ?? '/contact-us/?topic=product-studio') ?>"
               class="inline-flex items-center justify-center gap-2 rounded-full bg-white px-6 py-3 text-sm font-semibold text-primary-800 shadow-lg transition hover:bg-primary-50">
                <?= htmlspecialchars($finalCta['primary_cta']['label'] ?? 'Talk to our product team') ?>
            </a>
            <a href="/services/saas/"
               class="inline-flex items-center justify-center gap-2 rounded-full border border-white/40 px-6 py-3 text-sm font-semibold text-white transition hover:bg-white/10">
                SaaS Product Development
            </a>
        </div>
    </div>
</section>
