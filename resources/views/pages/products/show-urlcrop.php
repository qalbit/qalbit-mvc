<?php
/**
 * Bespoke case-study page for URLCrop.
 * Uses the QalbIT theme palette (primary blue + accent purple) for on-brand
 * consistency across the site.
 *
 * @var array $product
 */

$product     = $product ?? [];
$externalUrl = $product['externalUrl'] ?? 'https://urlcrop.com';
$related     = $product['related_service'] ?? ['label' => 'Web Application Development', 'href' => '/services/custom-web-development/'];
?>

<!-- ============================ HERO ============================ -->
<section class="relative overflow-hidden bg-white">
    <!-- decorative glows -->
    <div class="pointer-events-none absolute -left-24 -top-24 h-72 w-72 rounded-full bg-primary-300/40 blur-3xl"></div>
    <div class="pointer-events-none absolute right-0 top-32 h-72 w-72 rounded-full bg-accent-300/40 blur-3xl"></div>

    <div class="relative mx-auto max-w-6xl px-4 py-10 sm:px-6 lg:px-8 lg:py-16">
        <!-- breadcrumb -->
        <nav class="text-[11px] font-medium text-slate-500" aria-label="Breadcrumb">
            <ol class="flex flex-wrap items-center gap-1">
                <li><a href="/" class="hover:text-primary-600">Home</a></li>
                <li class="text-slate-300">/</li>
                <li><a href="/products/" class="hover:text-primary-600">Products</a></li>
                <li class="text-slate-300">/</li>
                <li aria-current="page" class="text-slate-700">URLCrop</li>
            </ol>
        </nav>

        <div class="mt-6 grid items-center gap-10 lg:grid-cols-[minmax(0,1fr)_minmax(0,1.05fr)]">
            <!-- left: copy -->
            <div>
                <div class="flex flex-wrap items-center gap-2">
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-primary-50 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-primary-800 ring-1 ring-primary-200">
                        <span class="relative flex h-2 w-2">
                            <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-primary-400 opacity-75"></span>
                            <span class="relative inline-flex h-2 w-2 rounded-full bg-primary-500"></span>
                        </span>
                        Live · QalbIT Product
                    </span>
                    <span class="inline-flex items-center rounded-full bg-slate-900 px-3 py-1 text-[11px] font-semibold text-white">Bitly alternative</span>
                </div>

                <h1 class="mt-5 text-4xl font-extrabold leading-[1.05] tracking-tight text-slate-900 sm:text-5xl">
                    Every link is a
                    <span class="bg-gradient-to-r from-primary-500 via-primary-600 to-primary-700 bg-clip-text text-transparent">growth lever</span>.
                </h1>

                <p class="mt-5 max-w-xl text-base leading-relaxed text-slate-600">
                    URLCrop shortens, brands and tracks every URL in real time — with analytics, dynamic QR codes,
                    custom domains and team collaboration. We designed, built and operate it end&#8209;to&#8209;end.
                </p>

                <div class="mt-7 flex flex-col gap-3 sm:flex-row sm:items-center">
                    <a href="<?= htmlspecialchars($externalUrl, ENT_QUOTES) ?>" target="_blank" rel="noopener noreferrer"
                       class="inline-flex items-center justify-center gap-2 rounded-full bg-primary-600 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-primary-600/25 transition hover:bg-primary-700">
                        Visit urlcrop.com
                        <span aria-hidden="true">↗</span>
                    </a>
                    <a href="/contact-us/?topic=product-studio"
                       class="inline-flex items-center justify-center gap-2 rounded-full border border-slate-300 bg-white px-6 py-3 text-sm font-semibold text-slate-800 transition hover:border-slate-400 hover:bg-slate-50">
                        Build something like this
                    </a>
                </div>

                <div class="mt-8 flex flex-wrap items-center gap-x-6 gap-y-2 text-xs text-slate-500">
                    <span class="inline-flex items-center gap-1.5"><span class="text-primary-500">✓</span> Real-time analytics</span>
                    <span class="inline-flex items-center gap-1.5"><span class="text-primary-500">✓</span> Branded domains</span>
                    <span class="inline-flex items-center gap-1.5"><span class="text-primary-500">✓</span> Editable QR codes</span>
                    <span class="inline-flex items-center gap-1.5"><span class="text-primary-500">✓</span> Free to start</span>
                </div>
            </div>

            <!-- right: product mockup -->
            <div class="relative">
                <div class="absolute -inset-4 -z-10 rounded-[2rem] bg-gradient-to-tr from-primary-500/20 to-accent-400/20 blur-2xl"></div>
                <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-2xl">
                    <!-- browser chrome -->
                    <div class="flex items-center gap-2 border-b border-slate-100 bg-slate-50 px-4 py-3">
                        <span class="h-3 w-3 rounded-full bg-red-400"></span>
                        <span class="h-3 w-3 rounded-full bg-amber-400"></span>
                        <span class="h-3 w-3 rounded-full bg-primary-400"></span>
                        <div class="ml-3 flex-1 rounded-md border border-slate-200 bg-white px-3 py-1 text-[11px] text-slate-400">app.urlcrop.com/dashboard</div>
                    </div>
                    <!-- body -->
                    <div class="space-y-4 p-5">
                        <!-- shorten input -->
                        <div class="flex items-center gap-2 rounded-xl border border-slate-200 bg-slate-50 p-2">
                            <div class="flex-1 truncate px-2 text-sm text-slate-500">https://example.com/spring/campaign?utm_source=…</div>
                            <span class="rounded-lg bg-primary-600 px-3 py-1.5 text-xs font-semibold text-white">Shorten</span>
                        </div>
                        <!-- shortened result -->
                        <div class="flex items-center justify-between rounded-xl border border-primary-200 bg-primary-50 px-3 py-2.5">
                            <span class="text-sm font-bold text-primary-700">urlcrop.com/spring</span>
                            <span class="inline-flex items-center gap-1 text-[11px] font-medium text-primary-600"><span>✓</span> Copied</span>
                        </div>
                        <!-- analytics card -->
                        <div class="rounded-xl border border-slate-200 p-3">
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-medium text-slate-500">Clicks this week</span>
                                <span class="inline-flex items-center gap-1 rounded-full bg-primary-50 px-2 py-0.5 text-[11px] font-semibold text-primary-800">▲ 38%</span>
                            </div>
                            <div class="mt-3 flex h-24 items-end gap-1.5">
                                <?php foreach ([35,52,44,68,58,82,73] as $h): ?>
                                    <div class="flex-1 rounded-t bg-gradient-to-t from-primary-200 to-primary-500" style="height: <?= $h ?>%"></div>
                                <?php endforeach; ?>
                            </div>
                            <div class="mt-2 flex justify-between text-[10px] text-slate-400">
                                <span>Mon</span><span>Tue</span><span>Wed</span><span>Thu</span><span>Fri</span><span>Sat</span><span>Sun</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- floating stat chips -->
                <div class="absolute -left-5 bottom-8 hidden rounded-xl border border-slate-200 bg-white px-3 py-2 shadow-xl sm:block">
                    <div class="text-[10px] uppercase tracking-wide text-slate-400">Top country</div>
                    <div class="text-sm font-bold text-slate-900">🇺🇸 United States</div>
                </div>
                <div class="absolute -right-4 -top-4 hidden rounded-xl border border-slate-200 bg-white px-3 py-2 shadow-xl sm:block">
                    <div class="text-[10px] uppercase tracking-wide text-slate-400">Scans</div>
                    <div class="text-sm font-bold text-primary-600">QR · Live</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ======================= LIVE METRICS STRIP ======================= -->
<section class="border-y border-slate-100 bg-primary-950">
    <div class="mx-auto grid max-w-6xl grid-cols-1 gap-6 px-4 py-8 sm:grid-cols-3 sm:px-6 lg:px-8">
        <?php
        $metrics = [
            ['label' => 'Users and growing',   'value' => 'Growing',    'sub' => 'signing up every week'],
            ['label' => 'Short links created', 'value' => 'Thousands',  'sub' => 'across marketing teams'],
            ['label' => 'Link visits tracked', 'value' => 'Real-time',  'sub' => 'analytics on every click'],
        ];
        foreach ($metrics as $m): ?>
            <div class="text-center sm:text-left">
                <div class="text-2xl font-extrabold text-white sm:text-3xl"><?= htmlspecialchars($m['value']) ?></div>
                <div class="mt-1 text-sm font-semibold text-primary-300"><?= htmlspecialchars($m['label']) ?></div>
                <div class="text-xs text-primary-100/60"><?= htmlspecialchars($m['sub']) ?></div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- ========================= THE CHALLENGE ========================= -->
<section class="bg-white py-14 lg:py-20">
    <div class="mx-auto max-w-4xl px-4 text-center sm:px-6 lg:px-8">
        <span class="text-xs font-semibold uppercase tracking-[0.18em] text-primary-600">The opportunity</span>
        <h2 class="mt-3 text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">
            Teams share links everywhere — and lose track of every one.
        </h2>
        <p class="mt-4 text-base leading-relaxed text-slate-600">
            Campaigns, docs, socials, QR codes on print — links go out constantly, but the data comes back scattered
            or locked behind expensive tiers. URLCrop set out to make link management fast, branded and privacy-friendly,
            with analytics that are actually readable. Our job: design and engineer it as a real, operable product.
        </p>
    </div>
</section>

<!-- ========================= FEATURE PILLARS ========================= -->
<section class="bg-slate-50 py-14 lg:py-20">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <span class="text-xs font-semibold uppercase tracking-[0.18em] text-primary-600">What we built</span>
            <h2 class="mt-3 text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">Three pillars, one growth loop</h2>
        </div>

        <div class="mt-12 space-y-10">
            <?php
            $pillars = [
                [
                    'kicker' => 'Analytics',
                    'title'  => 'See exactly what every link does.',
                    'text'   => 'Real-time clicks, top countries, devices and referrers on every short link — a dashboard readable at a glance, not a spreadsheet dump.',
                    'points' => ['Real-time click stream', 'Geo, device & referrer breakdown', 'Privacy-friendly by design'],
                    'flip'   => false,
                    'visual' => 'analytics',
                ],
                [
                    'kicker' => 'Branded links',
                    'title'  => 'Put your name on every link.',
                    'text'   => 'Custom domains and branded slugs so every shared URL builds trust and recognition instead of leaking to a generic shortener.',
                    'points' => ['Custom domains', 'Branded, editable slugs', 'Higher click-through & trust'],
                    'flip'   => true,
                    'visual' => 'branded',
                ],
                [
                    'kicker' => 'Dynamic QR',
                    'title'  => 'QR codes you can edit after printing.',
                    'text'   => 'Generate dynamic QR codes tied to a short link, then change the destination any time — even after it is on a poster or packaging.',
                    'points' => ['Dynamic destinations', 'Scan analytics', 'No reprints needed'],
                    'flip'   => false,
                    'visual' => 'qr',
                ],
            ];
            foreach ($pillars as $p): ?>
                <div class="grid items-center gap-8 rounded-3xl border border-slate-200 bg-white p-6 shadow-sm lg:grid-cols-2 lg:p-10">
                    <!-- text -->
                    <div class="<?= $p['flip'] ? 'lg:order-2' : '' ?>">
                        <span class="text-xs font-semibold uppercase tracking-[0.16em] text-primary-600"><?= htmlspecialchars($p['kicker']) ?></span>
                        <h3 class="mt-2 text-xl font-bold text-slate-900 sm:text-2xl"><?= htmlspecialchars($p['title']) ?></h3>
                        <p class="mt-3 text-sm leading-relaxed text-slate-600"><?= htmlspecialchars($p['text']) ?></p>
                        <ul class="mt-4 space-y-2">
                            <?php foreach ($p['points'] as $pt): ?>
                                <li class="flex items-center gap-2 text-sm text-slate-700">
                                    <span class="flex h-5 w-5 items-center justify-center rounded-full bg-primary-100 text-[11px] text-primary-700">✓</span>
                                    <?= htmlspecialchars($pt) ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <!-- visual -->
                    <div class="<?= $p['flip'] ? 'lg:order-1' : '' ?>">
                        <div class="rounded-2xl bg-gradient-to-br from-primary-50 to-white p-5 ring-1 ring-primary-100">
                            <?php if ($p['visual'] === 'analytics'): ?>
                                <div class="rounded-xl border border-slate-200 bg-white p-4">
                                    <div class="flex items-center justify-between text-xs text-slate-500">
                                        <span>Clicks</span><span class="font-semibold text-primary-600">1,284</span>
                                    </div>
                                    <div class="mt-3 flex h-28 items-end gap-2">
                                        <?php foreach ([40,60,48,72,66,90,80,58] as $h): ?>
                                            <div class="flex-1 rounded-t bg-gradient-to-t from-primary-200 to-primary-500" style="height: <?= $h ?>%"></div>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="mt-3 grid grid-cols-3 gap-2 text-center">
                                        <div class="rounded-lg bg-primary-50 py-1.5 text-[11px] font-semibold text-primary-800">🇺🇸 42%</div>
                                        <div class="rounded-lg bg-primary-50 py-1.5 text-[11px] font-semibold text-primary-800">📱 61%</div>
                                        <div class="rounded-lg bg-primary-50 py-1.5 text-[11px] font-semibold text-primary-800">🔗 X</div>
                                    </div>
                                </div>
                            <?php elseif ($p['visual'] === 'branded'): ?>
                                <div class="space-y-3">
                                    <div class="flex items-center justify-between rounded-xl border border-slate-200 bg-white px-4 py-3">
                                        <span class="text-sm text-slate-400 line-through">bit.ly/3xKp9Za</span>
                                        <span class="text-[10px] font-semibold text-slate-400">GENERIC</span>
                                    </div>
                                    <div class="flex items-center justify-center text-primary-500">↓</div>
                                    <div class="flex items-center justify-between rounded-xl border-2 border-primary-300 bg-primary-50 px-4 py-3">
                                        <span class="text-sm font-bold text-primary-700">go.yourbrand.com/launch</span>
                                        <span class="rounded-full bg-primary-600 px-2 py-0.5 text-[10px] font-semibold text-white">BRANDED</span>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="flex items-center gap-5">
                                    <!-- QR grid -->
                                    <div class="grid shrink-0 grid-cols-5 gap-1 rounded-xl bg-white p-3 shadow ring-1 ring-slate-200">
                                        <?php
                                        $qr = [1,1,1,0,1, 1,0,1,0,1, 1,1,0,1,1, 0,1,1,0,1, 1,0,1,1,1];
                                        foreach ($qr as $cell): ?>
                                            <span class="h-3 w-3 rounded-[2px] <?= $cell ? 'bg-primary-700' : 'bg-transparent' ?>"></span>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="space-y-2">
                                        <div class="rounded-lg bg-white px-3 py-2 text-xs text-slate-600 ring-1 ring-slate-200">Destination: <span class="font-semibold text-slate-900">/spring-sale</span></div>
                                        <div class="rounded-lg bg-primary-50 px-3 py-2 text-xs font-semibold text-primary-800 ring-1 ring-primary-200">Edit → /summer-sale ✓</div>
                                        <div class="text-[11px] text-slate-400">Same QR, new destination — no reprint.</div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ========================= HOW IT WORKS ========================= -->
<section class="bg-white py-14 lg:py-20">
    <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <span class="text-xs font-semibold uppercase tracking-[0.18em] text-primary-600">How it works</span>
            <h2 class="mt-3 text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">Three steps to a smarter link</h2>
        </div>

        <div class="relative mt-12 grid gap-8 sm:grid-cols-3">
            <!-- connecting line -->
            <div class="absolute left-0 right-0 top-6 hidden h-px bg-gradient-to-r from-primary-200 via-primary-400 to-primary-200 sm:block"></div>
            <?php
            $steps = [
                ['n' => '1', 'title' => 'Paste your link', 'text' => 'Drop in any long URL. URLCrop shortens it instantly with a clean, branded slug.'],
                ['n' => '2', 'title' => 'Share it anywhere', 'text' => 'Post it, print the QR, add it to a campaign — the link works everywhere, tracked from click one.'],
                ['n' => '3', 'title' => 'Watch it grow', 'text' => 'See real-time clicks, geography and devices, and optimise what is working.'],
            ];
            foreach ($steps as $s): ?>
                <div class="relative text-center">
                    <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-primary-600 text-lg font-bold text-white shadow-lg shadow-primary-600/25 ring-4 ring-white">
                        <?= htmlspecialchars($s['n']) ?>
                    </div>
                    <h3 class="mt-4 text-base font-bold text-slate-900"><?= htmlspecialchars($s['title']) ?></h3>
                    <p class="mt-2 text-sm leading-relaxed text-slate-600"><?= htmlspecialchars($s['text']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ===================== ARCHITECTURE & STACK ===================== -->
<section class="bg-slate-900 py-14 text-white lg:py-20">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl">
            <span class="text-xs font-semibold uppercase tracking-[0.18em] text-primary-400">Under the hood</span>
            <h2 class="mt-3 text-2xl font-bold tracking-tight sm:text-3xl">Engineered to be fast, and easy to operate</h2>
            <p class="mt-4 text-sm leading-relaxed text-slate-300">
                URLCrop pairs a modern Next.js front end with a decoupled, headless content pipeline — so redirects
                stay fast, marketing ships content without touching the app, and the whole thing runs on
                reproducible, containerised infrastructure.
            </p>
        </div>

        <div class="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            <?php
            $arch = [
                ['t' => 'Next.js front end', 'd' => 'A React 19 / Next.js 16 app renders fast, SEO-friendly pages and the link dashboard with instant navigation.'],
                ['t' => 'Headless WordPress + WPGraphQL', 'd' => 'Content runs on WordPress (PHP 8.3) with WPGraphQL and Yoast SEO, kept noindex and consumed over GraphQL — content velocity without coupling the app to a CMS.'],
                ['t' => 'Containerised infra', 'd' => 'CMS, MariaDB and services run via Docker Compose with version-controlled config and webhook-driven revalidation on publish.'],
            ];
            foreach ($arch as $a): ?>
                <div class="rounded-2xl border border-white/10 bg-white/5 p-5">
                    <h3 class="text-sm font-semibold text-primary-300"><?= htmlspecialchars($a['t']) ?></h3>
                    <p class="mt-2 text-[13px] leading-relaxed text-slate-300"><?= htmlspecialchars($a['d']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="mt-8 flex flex-wrap gap-2">
            <?php foreach (['Next.js 16','React 19','TypeScript','Headless WordPress','WPGraphQL','MariaDB','Docker','Yoast SEO'] as $tech): ?>
                <span class="rounded-lg border border-white/10 bg-white/5 px-3 py-1.5 text-xs font-medium text-slate-200"><?= htmlspecialchars($tech) ?></span>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ===================== DELIVERED / OUTCOMES ===================== -->
<section class="bg-white py-14 lg:py-20">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-10 lg:grid-cols-2">
            <div>
                <span class="text-xs font-semibold uppercase tracking-[0.18em] text-primary-600">What shipped</span>
                <h2 class="mt-3 text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">A complete, live product</h2>
                <ul class="mt-6 space-y-3">
                    <?php foreach ([
                        'Short-link creation with branded, editable slugs',
                        'Real-time click analytics with geo, device & referrer',
                        'Dynamic, editable QR codes with scan tracking',
                        'Custom domains and team collaboration',
                        'Headless content/blog pipeline with on-publish revalidation',
                        'SEO-optimised marketing site',
                    ] as $item): ?>
                        <li class="flex items-start gap-3 text-sm text-slate-700">
                            <span class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-primary-100 text-[11px] text-primary-700">✓</span>
                            <?= htmlspecialchars($item) ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div>
                <span class="text-xs font-semibold uppercase tracking-[0.18em] text-primary-600">Outcomes</span>
                <h2 class="mt-3 text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">Design + build + operate</h2>
                <div class="mt-6 space-y-4">
                    <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5">
                        <div class="text-sm font-semibold text-slate-900">Live and self-operated</div>
                        <p class="mt-1 text-sm text-slate-600">URLCrop runs in production as a self-funded QalbIT product — not a demo.</p>
                    </div>
                    <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5">
                        <div class="text-sm font-semibold text-slate-900">Decoupled content pipeline</div>
                        <p class="mt-1 text-sm text-slate-600">Marketing ships content without engineering, thanks to the headless CMS layer.</p>
                    </div>
                    <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5">
                        <div class="text-sm font-semibold text-slate-900">Proof of range</div>
                        <p class="mt-1 text-sm text-slate-600">Demonstrates our web-infrastructure, analytics and headless-CMS competence end to end.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================ CTA ============================ -->
<section class="relative overflow-hidden bg-gradient-to-br from-primary-600 via-primary-700 to-primary-900 py-16 text-white">
    <div class="pointer-events-none absolute -right-16 -top-16 h-64 w-64 rounded-full bg-white/10 blur-3xl"></div>
    <div class="pointer-events-none absolute -bottom-20 -left-10 h-64 w-64 rounded-full bg-accent-400/20 blur-3xl"></div>
    <div class="relative mx-auto max-w-3xl px-4 text-center sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold tracking-tight sm:text-3xl">Want to build a product like URLCrop?</h2>
        <p class="mx-auto mt-3 max-w-xl text-sm leading-relaxed text-primary-50">
            We designed, built and operate URLCrop ourselves — the same way we build software for our clients.
            Tell us what you want to launch.
        </p>
        <div class="mt-7 flex flex-col items-center justify-center gap-3 sm:flex-row">
            <a href="/contact-us/?topic=product-studio"
               class="inline-flex items-center justify-center gap-2 rounded-full bg-white px-6 py-3 text-sm font-semibold text-primary-800 shadow-lg transition hover:bg-primary-50">
                Build your product with us
            </a>
            <a href="<?= route_url($related['href']) ?>"
               class="inline-flex items-center justify-center gap-2 rounded-full border border-white/40 px-6 py-3 text-sm font-semibold text-white transition hover:bg-white/10">
                <?= htmlspecialchars($related['label']) ?>
            </a>
        </div>
    </div>
</section>
