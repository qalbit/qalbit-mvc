<?php

/** @var array $product */

$product = $product ?? [];

$name        = $product['name']        ?? 'Product';
$tagline     = $product['tagline']     ?? '';
$valueProp   = $product['valueProp']   ?? '';
$status      = $product['status']      ?? 'live';
$externalUrl = $product['externalUrl'] ?? null;
$role        = $product['role']        ?? 'Design + Build + Operate';
$domain      = $product['domain']      ?? '';
$audienceTag = $product['audienceTag'] ?? '';
$techStack   = $product['tech_stack']  ?? [];
$related     = $product['related_service'] ?? [];

$sections     = $product['sections'] ?? [];
$problem      = $sections['problem']      ?? '';
$built        = $sections['built']        ?? '';
$architecture = $sections['architecture'] ?? [];
$shipped      = $sections['shipped']      ?? [];
$outcomes     = $sections['outcomes']     ?? [];

$isLive = ($status === 'live') && !empty($externalUrl);
?>

<!-- Header -->
<section class="relative overflow-hidden bg-slate-50 text-slate-900 py-6 sm:py-8 lg:py-10">
    <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8 space-y-4">

        <!-- Breadcrumbs -->
        <nav class="text-[11px] font-medium text-slate-600" aria-label="Breadcrumb">
            <ol class="flex flex-wrap items-center gap-1">
                <li><a href="/" class="hover:text-sky-500 transition-colors">Home</a></li>
                <li class="text-slate-400">/</li>
                <li><a href="/products/" class="hover:text-sky-500 transition-colors">Products</a></li>
                <li class="text-slate-400">/</li>
                <li aria-current="page" class="text-slate-900"><?= htmlspecialchars($name, ENT_QUOTES); ?></li>
            </ol>
        </nav>

        <div class="flex flex-wrap items-center gap-2">
            <?php if ($isLive): ?>
                <span class="inline-flex items-center gap-1 rounded-full bg-emerald-50 px-2.5 py-0.5 text-[10px] font-semibold uppercase tracking-[0.12em] text-emerald-700">
                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span> Live
                </span>
            <?php else: ?>
                <span class="inline-flex items-center rounded-full bg-amber-50 px-2.5 py-0.5 text-[10px] font-semibold uppercase tracking-[0.12em] text-amber-700">Coming soon</span>
            <?php endif; ?>
            <span class="inline-flex items-center rounded-full border border-slate-200 bg-white px-2.5 py-0.5 text-[10px] font-medium text-slate-600"><?= htmlspecialchars($role, ENT_QUOTES); ?></span>
            <?php if (!empty($domain)): ?>
                <span class="inline-flex items-center rounded-full border border-slate-200 bg-white px-2.5 py-0.5 text-[10px] font-medium text-slate-600"><?= htmlspecialchars($domain, ENT_QUOTES); ?></span>
            <?php endif; ?>
        </div>

        <h1 class="text-3xl sm:text-4xl font-bold tracking-tight text-slate-900"><?= htmlspecialchars($name, ENT_QUOTES); ?></h1>

        <?php if (!empty($tagline)): ?>
            <p class="text-lg font-medium text-slate-700"><?= htmlspecialchars($tagline, ENT_QUOTES); ?></p>
        <?php endif; ?>
        <?php if (!empty($valueProp)): ?>
            <p class="max-w-2xl text-sm sm:text-[15px] leading-relaxed text-slate-600"><?= htmlspecialchars($valueProp, ENT_QUOTES); ?></p>
        <?php endif; ?>

        <div class="flex flex-col sm:flex-row sm:flex-wrap items-stretch sm:items-center gap-2.5 pt-1">
            <?php if ($isLive): ?>
                <a href="<?= htmlspecialchars($externalUrl, ENT_QUOTES); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-accent btn-radius-pill text-xs sm:text-[13px] px-4 py-2">
                    Visit site ↗
                </a>
            <?php endif; ?>
            <a href="<?= route_url('/contact-us/?topic=product-studio') ?>" class="btn btn-primary-outline btn-radius-pill text-xs sm:text-[13px] px-4 py-2">
                Talk to us about building something like this
            </a>
        </div>
    </div>
</section>

<!-- Body -->
<section class="bg-white text-slate-900 py-8 sm:py-10 lg:py-12">
    <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8 space-y-8">

        <?php if (!empty($problem)): ?>
            <div class="space-y-2">
                <h2 class="text-xl font-semibold text-slate-900">The problem &amp; opportunity</h2>
                <p class="text-sm sm:text-[15px] leading-relaxed text-slate-600"><?= htmlspecialchars($problem, ENT_QUOTES); ?></p>
            </div>
        <?php endif; ?>

        <?php if (!empty($built)): ?>
            <div class="space-y-2">
                <h2 class="text-xl font-semibold text-slate-900">What we built</h2>
                <p class="text-sm sm:text-[15px] leading-relaxed text-slate-600"><?= htmlspecialchars($built, ENT_QUOTES); ?></p>
            </div>
        <?php endif; ?>

        <?php if (!empty($architecture)): ?>
            <div class="space-y-3">
                <h2 class="text-xl font-semibold text-slate-900">Architecture &amp; stack</h2>
                <?php if (!empty($techStack)): ?>
                    <ul class="flex flex-wrap gap-1.5">
                        <?php foreach ($techStack as $tech): ?>
                            <li class="rounded-md bg-slate-100 px-2.5 py-1 text-[11px] font-medium text-slate-700"><?= htmlspecialchars($tech, ENT_QUOTES); ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <div class="grid gap-3 sm:grid-cols-2 pt-1">
                    <?php foreach ($architecture as $block): ?>
                        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                            <h3 class="text-sm font-semibold text-slate-900"><?= htmlspecialchars($block['title'] ?? '', ENT_QUOTES); ?></h3>
                            <p class="mt-1 text-xs sm:text-sm leading-relaxed text-slate-600"><?= htmlspecialchars($block['text'] ?? '', ENT_QUOTES); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="grid gap-6 sm:grid-cols-2">
            <?php if (!empty($shipped)): ?>
                <div class="space-y-2">
                    <h2 class="text-xl font-semibold text-slate-900">What shipped</h2>
                    <ul class="space-y-1.5">
                        <?php foreach ($shipped as $item): ?>
                            <li class="flex gap-2 text-sm text-slate-600">
                                <span class="mt-0.5 text-emerald-500">✓</span>
                                <span><?= htmlspecialchars($item, ENT_QUOTES); ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if (!empty($outcomes)): ?>
                <div class="space-y-2">
                    <h2 class="text-xl font-semibold text-slate-900">Outcomes</h2>
                    <ul class="space-y-1.5">
                        <?php foreach ($outcomes as $item): ?>
                            <li class="flex gap-2 text-sm text-slate-600">
                                <span class="mt-0.5 text-sky-500">→</span>
                                <span><?= htmlspecialchars($item, ENT_QUOTES); ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Related service + CTA band -->
<section class="bg-slate-900 text-slate-50 py-10 sm:py-12">
    <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8 text-center space-y-4">
        <h2 class="text-xl sm:text-2xl font-bold">Want to build your own product?</h2>
        <p class="mx-auto max-w-2xl text-sm sm:text-[15px] leading-relaxed text-slate-300">
            We designed, built and operate <?= htmlspecialchars($name, ENT_QUOTES); ?> ourselves — the same way we build software for our clients.
        </p>
        <div class="flex flex-wrap items-center justify-center gap-2.5 pt-1">
            <a href="<?= route_url('/contact-us/?topic=product-studio') ?>" class="btn btn-accent btn-radius-pill text-sm px-5 py-2.5">
                Build your product with us
            </a>
            <?php if (!empty($related['href'])): ?>
                <a href="<?= route_url($related['href']) ?>" class="btn btn-primary-outline btn-radius-pill text-sm px-5 py-2.5">
                    <?= htmlspecialchars($related['label'] ?? 'Related service', ENT_QUOTES); ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>
