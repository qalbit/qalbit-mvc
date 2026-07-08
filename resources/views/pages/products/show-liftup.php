<?php
/**
 * Bespoke case-study page for LiftUp (flagship product).
 * Uses the QalbIT theme palette (primary blue + accent purple).
 *
 * @var array $product
 */

$product     = $product ?? [];
$externalUrl = $product['externalUrl'] ?? 'https://www.liftup.sh';
$related     = $product['related_service'] ?? ['label' => 'SaaS Product Development', 'href' => '/services/saas/'];
?>

<!-- ============================ HERO ============================ -->
<section class="relative overflow-hidden bg-slate-950">
    <!-- decorative glows -->
    <div class="pointer-events-none absolute -left-24 -top-24 h-80 w-80 rounded-full bg-primary-600/30 blur-3xl"></div>
    <div class="pointer-events-none absolute right-0 top-24 h-80 w-80 rounded-full bg-accent-600/30 blur-3xl"></div>
    <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(60%_50%_at_50%_0%,rgba(30,154,255,0.12),transparent)]"></div>

    <div class="relative mx-auto max-w-6xl px-4 py-10 sm:px-6 lg:px-8 lg:py-16">
        <!-- breadcrumb -->
        <nav class="text-[11px] font-medium text-slate-400" aria-label="Breadcrumb">
            <ol class="flex flex-wrap items-center gap-1">
                <li><a href="/" class="hover:text-primary-300">Home</a></li>
                <li class="text-slate-600">/</li>
                <li><a href="/products/" class="hover:text-primary-300">Products</a></li>
                <li class="text-slate-600">/</li>
                <li aria-current="page" class="text-slate-200">LiftUp</li>
            </ol>
        </nav>

        <div class="mt-6 grid items-center gap-10 lg:grid-cols-[minmax(0,1fr)_minmax(0,1.1fr)]">
            <!-- left: copy -->
            <div>
                <div class="flex flex-wrap items-center gap-2">
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-white/10 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-primary-200 ring-1 ring-white/15">
                        <span class="relative flex h-2 w-2">
                            <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-primary-400 opacity-75"></span>
                            <span class="relative inline-flex h-2 w-2 rounded-full bg-primary-400"></span>
                        </span>
                        Live · Flagship QalbIT Product
                    </span>
                    <span class="inline-flex items-center rounded-full bg-gradient-to-r from-primary-500 to-accent-500 px-3 py-1 text-[11px] font-semibold text-white">Multi-tenant SaaS</span>
                </div>

                <h1 class="mt-5 text-4xl font-extrabold leading-[1.05] tracking-tight text-white sm:text-5xl">
                    The ops console for
                    <span class="bg-gradient-to-r from-primary-400 via-primary-300 to-accent-300 bg-clip-text text-transparent">every product you ship</span>.
                </h1>

                <p class="mt-5 max-w-xl text-base leading-relaxed text-slate-300">
                    LiftUp unifies CRM, content, AI editorial and analytics into one multi-tenant workspace —
                    replacing four disconnected tools with a single login and one bill. We designed, built and operate it.
                </p>

                <div class="mt-7 flex flex-col gap-3 sm:flex-row sm:items-center">
                    <a href="<?= htmlspecialchars($externalUrl, ENT_QUOTES) ?>" target="_blank" rel="noopener noreferrer"
                       class="inline-flex items-center justify-center gap-2 rounded-full bg-primary-600 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-primary-600/30 transition hover:bg-primary-500">
                        Visit liftup.sh
                        <span aria-hidden="true">↗</span>
                    </a>
                    <a href="/contact-us/?topic=product-studio"
                       class="inline-flex items-center justify-center gap-2 rounded-full border border-white/20 bg-white/5 px-6 py-3 text-sm font-semibold text-white transition hover:bg-white/10">
                        Build something like this
                    </a>
                </div>

                <div class="mt-8 flex flex-wrap items-center gap-x-6 gap-y-2 text-xs text-slate-400">
                    <span class="inline-flex items-center gap-1.5"><span class="text-primary-400">✓</span> Lead scoring 0–100</span>
                    <span class="inline-flex items-center gap-1.5"><span class="text-primary-400">✓</span> AI editorial</span>
                    <span class="inline-flex items-center gap-1.5"><span class="text-primary-400">✓</span> GA4 + Search Console</span>
                    <span class="inline-flex items-center gap-1.5"><span class="text-primary-400">✓</span> 99.9% uptime target</span>
                </div>
            </div>

            <!-- right: SaaS console mockup -->
            <div class="relative">
                <div class="absolute -inset-4 -z-10 rounded-[2rem] bg-gradient-to-tr from-primary-500/25 to-accent-500/25 blur-2xl"></div>
                <div class="overflow-hidden rounded-2xl border border-white/10 bg-white shadow-2xl">
                    <!-- browser chrome -->
                    <div class="flex items-center gap-2 border-b border-slate-100 bg-slate-50 px-4 py-2.5">
                        <span class="h-3 w-3 rounded-full bg-red-400"></span>
                        <span class="h-3 w-3 rounded-full bg-amber-400"></span>
                        <span class="h-3 w-3 rounded-full bg-primary-400"></span>
                        <div class="ml-3 flex-1 rounded-md border border-slate-200 bg-white px-3 py-1 text-[11px] text-slate-400">app.liftup.sh/console</div>
                    </div>
                    <!-- console body: sidebar + main -->
                    <div class="flex">
                        <!-- sidebar -->
                        <aside class="hidden w-36 shrink-0 space-y-1 border-r border-slate-100 bg-slate-50 p-3 sm:block">
                            <div class="mb-2 flex items-center gap-1.5 px-1">
                                <span class="flex h-5 w-5 items-center justify-center rounded bg-gradient-to-br from-primary-500 to-accent-500 text-[10px] font-bold text-white">L</span>
                                <span class="text-xs font-bold text-slate-800">LiftUp</span>
                            </div>
                            <?php
                            $nav = [['Products',false],['CRM',true],['Content',false],['Analytics',false],['Team',false]];
                            foreach ($nav as [$label,$active]): ?>
                                <div class="flex items-center gap-2 rounded-lg px-2 py-1.5 text-[11px] font-medium <?= $active ? 'bg-primary-600 text-white' : 'text-slate-500' ?>">
                                    <span class="h-1.5 w-1.5 rounded-full <?= $active ? 'bg-white' : 'bg-slate-300' ?>"></span>
                                    <?= $label ?>
                                </div>
                            <?php endforeach; ?>
                        </aside>
                        <!-- main -->
                        <div class="flex-1 space-y-3 p-4">
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-semibold text-slate-800">Lead inbox · All products</span>
                                <span class="rounded-full bg-primary-50 px-2 py-0.5 text-[10px] font-semibold text-primary-700">12 new</span>
                            </div>
                            <?php
                            $leads = [
                                ['n' => 'Acme Corp', 's' => 'urlcrop.com', 'score' => 92, 'tone' => 'hot'],
                                ['n' => 'Meridian Labs', 's' => 'pocketgst.com', 'score' => 74, 'tone' => 'warm'],
                                ['n' => 'Northwind', 's' => 'liftup.sh', 'score' => 51, 'tone' => 'cool'],
                            ];
                            foreach ($leads as $l):
                                $badge = $l['tone'] === 'hot' ? 'bg-primary-600 text-white' : ($l['tone'] === 'warm' ? 'bg-primary-100 text-primary-700' : 'bg-slate-100 text-slate-500');
                            ?>
                                <div class="flex items-center justify-between rounded-xl border border-slate-200 px-3 py-2">
                                    <div>
                                        <div class="text-xs font-semibold text-slate-800"><?= $l['n'] ?></div>
                                        <div class="text-[10px] text-slate-400"><?= $l['s'] ?></div>
                                    </div>
                                    <span class="rounded-full px-2 py-0.5 text-[10px] font-bold <?= $badge ?>"><?= $l['score'] ?></span>
                                </div>
                            <?php endforeach; ?>
                            <!-- mini pipeline -->
                            <div class="grid grid-cols-4 gap-1.5 pt-1">
                                <?php foreach (['New','Working','Won','—'] as $i => $col): ?>
                                    <div class="rounded-lg bg-slate-50 p-1.5 text-center">
                                        <div class="text-[8px] uppercase tracking-wide text-slate-400"><?= $col ?></div>
                                        <div class="mt-1 h-1.5 rounded-full <?= $i < 3 ? 'bg-gradient-to-r from-primary-400 to-accent-400' : 'bg-slate-200' ?>"></div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- floating chips -->
                <div class="absolute -left-5 bottom-10 hidden rounded-xl border border-slate-200 bg-white px-3 py-2 shadow-xl sm:block">
                    <div class="text-[10px] uppercase tracking-wide text-slate-400">AI editorial</div>
                    <div class="text-sm font-bold text-accent-700">Draft ready ✨</div>
                </div>
                <div class="absolute -right-4 -top-4 hidden rounded-xl border border-slate-200 bg-white px-3 py-2 shadow-xl sm:block">
                    <div class="text-[10px] uppercase tracking-wide text-slate-400">Lead score</div>
                    <div class="text-sm font-bold text-primary-600">92 · Hot 🔥</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==================== ONE CONSOLE, FOUR TOOLS ==================== -->
<section class="border-b border-slate-100 bg-white py-14 lg:py-20">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <span class="text-xs font-semibold uppercase tracking-[0.18em] text-primary-600">One login. One bill.</span>
            <h2 class="mt-3 text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">One console replaces four tools</h2>
            <p class="mt-3 text-sm leading-relaxed text-slate-600">
                Most teams stitch together a CRM, a CMS, an AI writer and an analytics stack. LiftUp collapses them into
                a single multi-tenant workspace where revenue, content and growth data stay connected.
            </p>
        </div>

        <div class="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            <?php
            $tools = [
                ['icon' => '👥', 'cat' => 'CRM',            'repl' => 'Freshsales · Zoho · Pipedrive'],
                ['icon' => '📝', 'cat' => 'Content CMS',    'repl' => 'WordPress · Headless CMS'],
                ['icon' => '✨', 'cat' => 'AI writing',     'repl' => 'Jasper · Copy.ai'],
                ['icon' => '📊', 'cat' => 'Analytics / SEO','repl' => 'GA4 · Search Console'],
            ];
            foreach ($tools as $t): ?>
                <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5 transition hover:border-primary-200 hover:bg-white hover:shadow-md">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-white text-lg ring-1 ring-slate-200"><?= $t['icon'] ?></div>
                    <h3 class="mt-3 text-sm font-bold text-slate-900"><?= htmlspecialchars($t['cat']) ?></h3>
                    <p class="mt-1 text-[11px] font-medium uppercase tracking-wide text-slate-400">Replaces</p>
                    <p class="text-xs text-slate-600"><?= htmlspecialchars($t['repl']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ========================= FEATURE PILLARS ========================= -->
<section class="bg-slate-50 py-14 lg:py-20">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <span class="text-xs font-semibold uppercase tracking-[0.18em] text-primary-600">What we built</span>
            <h2 class="mt-3 text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">A revenue engine, not just contact storage</h2>
        </div>

        <div class="mt-12 space-y-10">
            <?php
            $pillars = [
                [
                    'kicker' => 'CRM',
                    'title'  => 'Every lead, every site, one inbox.',
                    'text'   => 'Leads from all your products flow into a shared inbox, auto-scored 0–100 on source, page and intent signals, then routed through a Kanban pipeline with SLA timers and deal tracking.',
                    'points' => ['Unified lead inbox', 'Rules-based scoring 0–100', 'Kanban pipeline & deal tracking', 'Gmail integration & email sequences'],
                    'flip'   => false,
                    'visual' => 'crm',
                ],
                [
                    'kicker' => 'Content + AI editorial',
                    'title'  => 'Write, publish and syndicate — with AI in the loop.',
                    'text'   => 'A blog CMS with AI-assisted drafting publishes to any front-end over an API. Content teams draft, refine and ship inside the same workspace as the leads it generates.',
                    'points' => ['AI-assisted drafting', 'Headless publishing via API', 'SEO fields built in', 'Per-product content registry'],
                    'flip'   => true,
                    'visual' => 'content',
                ],
                [
                    'kicker' => 'Analytics & attribution',
                    'title'  => 'Growth data tied back to the same products.',
                    'text'   => 'Connect Google Analytics and Search Console per product, so traffic, content and closed revenue line up in one place — attribution without a separate reporting stack.',
                    'points' => ['GA4 + Search Console connected', 'Per-product attribution', 'Content-to-revenue reporting'],
                    'flip'   => false,
                    'visual' => 'analytics',
                ],
            ];
            foreach ($pillars as $p): ?>
                <div class="grid items-center gap-8 rounded-3xl border border-slate-200 bg-white p-6 shadow-sm lg:grid-cols-2 lg:p-10">
                    <div class="<?= $p['flip'] ? 'lg:order-2' : '' ?>">
                        <span class="text-xs font-semibold uppercase tracking-[0.16em] text-primary-600"><?= htmlspecialchars($p['kicker']) ?></span>
                        <h3 class="mt-2 text-xl font-bold text-slate-900 sm:text-2xl"><?= htmlspecialchars($p['title']) ?></h3>
                        <p class="mt-3 text-sm leading-relaxed text-slate-600"><?= htmlspecialchars($p['text']) ?></p>
                        <ul class="mt-4 grid gap-2 sm:grid-cols-2">
                            <?php foreach ($p['points'] as $pt): ?>
                                <li class="flex items-center gap-2 text-sm text-slate-700">
                                    <span class="flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-primary-100 text-[11px] text-primary-700">✓</span>
                                    <?= htmlspecialchars($pt) ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="<?= $p['flip'] ? 'lg:order-1' : '' ?>">
                        <div class="rounded-2xl bg-gradient-to-br from-primary-50 via-white to-accent-50 p-5 ring-1 ring-primary-100">
                            <?php if ($p['visual'] === 'crm'): ?>
                                <div class="space-y-2">
                                    <?php foreach ([['Acme Corp',92,'bg-primary-600 text-white'],['Meridian Labs',74,'bg-primary-100 text-primary-700'],['Northwind',51,'bg-slate-100 text-slate-500']] as $r): ?>
                                        <div class="flex items-center justify-between rounded-xl border border-slate-200 bg-white px-3 py-2">
                                            <span class="text-xs font-semibold text-slate-800"><?= $r[0] ?></span>
                                            <span class="rounded-full px-2 py-0.5 text-[10px] font-bold <?= $r[2] ?>"><?= $r[1] ?></span>
                                        </div>
                                    <?php endforeach; ?>
                                    <div class="grid grid-cols-4 gap-1.5 pt-1">
                                        <?php foreach (['New','Work','Won','Rep'] as $i => $c): ?>
                                            <div class="rounded-lg bg-white p-1.5 text-center ring-1 ring-slate-200">
                                                <div class="text-[8px] uppercase text-slate-400"><?= $c ?></div>
                                                <div class="mt-1 h-1.5 rounded-full <?= $i<3 ? 'bg-gradient-to-r from-primary-400 to-accent-400' : 'bg-slate-200' ?>"></div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php elseif ($p['visual'] === 'content'): ?>
                                <div class="rounded-xl border border-slate-200 bg-white p-4">
                                    <div class="flex items-center justify-between">
                                        <span class="text-xs font-semibold text-slate-700">Draft · Spring launch post</span>
                                        <span class="inline-flex items-center gap-1 rounded-full bg-accent-100 px-2 py-0.5 text-[10px] font-semibold text-accent-700">✨ AI</span>
                                    </div>
                                    <div class="mt-3 space-y-1.5">
                                        <div class="h-2 w-5/6 rounded bg-slate-200"></div>
                                        <div class="h-2 w-full rounded bg-slate-100"></div>
                                        <div class="h-2 w-4/6 rounded bg-slate-100"></div>
                                        <div class="h-2 w-11/12 rounded bg-primary-100"></div>
                                        <div class="h-2 w-3/6 rounded bg-slate-100"></div>
                                    </div>
                                    <div class="mt-3 flex items-center gap-2">
                                        <span class="rounded-lg bg-gradient-to-r from-primary-600 to-accent-600 px-3 py-1.5 text-[11px] font-semibold text-white">Generate draft</span>
                                        <span class="rounded-lg border border-slate-200 px-3 py-1.5 text-[11px] font-medium text-slate-600">Publish via API</span>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="rounded-xl border border-slate-200 bg-white p-4">
                                    <div class="flex items-center justify-between text-xs text-slate-500">
                                        <span>Sessions · GA4</span><span class="font-semibold text-primary-600">+27%</span>
                                    </div>
                                    <div class="mt-3 flex h-24 items-end gap-2">
                                        <?php foreach ([44,58,50,70,64,86,78] as $h): ?>
                                            <div class="flex-1 rounded-t bg-gradient-to-t from-primary-200 to-primary-500" style="height: <?= $h ?>%"></div>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="mt-3 grid grid-cols-2 gap-2">
                                        <div class="rounded-lg bg-primary-50 px-2 py-1.5 text-center text-[10px] font-semibold text-primary-700">GA4 · connected</div>
                                        <div class="rounded-lg bg-accent-50 px-2 py-1.5 text-center text-[10px] font-semibold text-accent-700">Search Console · connected</div>
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

<!-- ===================== PIPELINE / HOW IT WORKS ===================== -->
<section class="bg-white py-14 lg:py-20">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <span class="text-xs font-semibold uppercase tracking-[0.18em] text-primary-600">The lifecycle</span>
            <h2 class="mt-3 text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">From first capture to won deal</h2>
        </div>
        <div class="relative mt-12 grid gap-6 sm:grid-cols-4">
            <div class="absolute left-0 right-0 top-6 hidden h-px bg-gradient-to-r from-primary-200 via-accent-300 to-primary-200 sm:block"></div>
            <?php
            $steps = [
                ['n'=>'1','t'=>'Captured','d'=>'Embed forms on any site; leads land in the unified inbox, tagged by product.'],
                ['n'=>'2','t'=>'Scored & routed','d'=>'Rules score each lead 0–100 and route it to the right owner with an SLA timer.'],
                ['n'=>'3','t'=>'Worked','d'=>'Drag through the pipeline, reply via Gmail, and enrol in email sequences.'],
                ['n'=>'4','t'=>'Closed & reported','d'=>'Track deal revenue and tie it back to the content and traffic that drove it.'],
            ];
            foreach ($steps as $s): ?>
                <div class="relative text-center">
                    <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-gradient-to-br from-primary-600 to-accent-600 text-lg font-bold text-white shadow-lg shadow-primary-600/25 ring-4 ring-white"><?= $s['n'] ?></div>
                    <h3 class="mt-4 text-base font-bold text-slate-900"><?= htmlspecialchars($s['t']) ?></h3>
                    <p class="mt-2 text-sm leading-relaxed text-slate-600"><?= htmlspecialchars($s['d']) ?></p>
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
            <h2 class="mt-3 text-2xl font-bold tracking-tight sm:text-3xl">Multi-tenant by design, operated in production</h2>
            <p class="mt-4 text-sm leading-relaxed text-slate-300">
                LiftUp is a true multi-tenant SaaS: every customer, product and team is cleanly isolated on shared
                infrastructure, with an AI editorial layer and first-class integrations — all built and run by QalbIT.
            </p>
        </div>

        <div class="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            <?php
            $arch = [
                ['t'=>'Multi-tenant architecture','d'=>'Per-tenant, per-product and per-team isolation baked into the data model and request lifecycle on shared infrastructure.'],
                ['t'=>'Next.js 14 + React 18','d'=>'A modern App Router console and marketing site with a typed component system and Tailwind design tokens.'],
                ['t'=>'AI editorial layer','d'=>'An AI writing assistant wired into the CMS so content teams draft and refine inside the same workspace.'],
                ['t'=>'First-class integrations','d'=>'Gmail API for lead email, GA4 and Search Console for analytics, plus a public API for headless publishing.'],
                ['t'=>'Enterprise-grade security','d'=>'2FA enforced, plan-based access control and a 99.9% uptime target — operated under PM2 in production.'],
                ['t'=>'External product sync','d'=>'The registry supports external products (e.g. PocketGST) with read-only health sync alongside native ones.'],
            ];
            foreach ($arch as $a): ?>
                <div class="rounded-2xl border border-white/10 bg-white/5 p-5">
                    <h3 class="text-sm font-semibold text-primary-300"><?= htmlspecialchars($a['t']) ?></h3>
                    <p class="mt-2 text-[13px] leading-relaxed text-slate-300"><?= htmlspecialchars($a['d']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="mt-8 flex flex-wrap gap-2">
            <?php foreach (['Next.js 14','React 18','TypeScript','Tailwind CSS','Multi-tenant','AI editorial','Gmail API','GA4','Search Console','PM2'] as $tech): ?>
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
                <h2 class="mt-3 text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">A complete, multi-module SaaS</h2>
                <ul class="mt-6 grid gap-3 sm:grid-cols-2">
                    <?php foreach ([
                        'Unified lead inbox & scoring','Kanban pipeline & deal tracking',
                        'Gmail integration & email sequences','Blog CMS with AI editorial',
                        'Headless publishing API','GA4 + Search Console analytics',
                        'Multi-product registry','Plan-based pricing & billing',
                    ] as $item): ?>
                        <li class="flex items-start gap-2 text-sm text-slate-700">
                            <span class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-primary-100 text-[11px] text-primary-700">✓</span>
                            <?= htmlspecialchars($item) ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div>
                <span class="text-xs font-semibold uppercase tracking-[0.18em] text-primary-600">Outcomes</span>
                <h2 class="mt-3 text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">Our strongest engineering proof</h2>
                <div class="mt-6 space-y-4">
                    <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5">
                        <div class="text-sm font-semibold text-slate-900">Flagship, self-operated SaaS</div>
                        <p class="mt-1 text-sm text-slate-600">LiftUp runs in production and powers QalbIT's own marketing site as the first native product.</p>
                    </div>
                    <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5">
                        <div class="text-sm font-semibold text-slate-900">Multi-tenant + AI, end to end</div>
                        <p class="mt-1 text-sm text-slate-600">The clearest signal of our ability to design, build and operate the SaaS products we build for clients.</p>
                    </div>
                    <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5">
                        <div class="text-sm font-semibold text-slate-900">A platform, not a project</div>
                        <p class="mt-1 text-sm text-slate-600">Extensible enough to host external products like PocketGST alongside native ones.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================ CTA ============================ -->
<section class="relative overflow-hidden bg-gradient-to-br from-primary-700 via-primary-800 to-accent-900 py-16 text-white">
    <div class="pointer-events-none absolute -right-16 -top-16 h-64 w-64 rounded-full bg-white/10 blur-3xl"></div>
    <div class="pointer-events-none absolute -bottom-20 -left-10 h-64 w-64 rounded-full bg-accent-400/20 blur-3xl"></div>
    <div class="relative mx-auto max-w-3xl px-4 text-center sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold tracking-tight sm:text-3xl">Want a multi-tenant SaaS like LiftUp?</h2>
        <p class="mx-auto mt-3 max-w-xl text-sm leading-relaxed text-primary-100">
            We designed, built and operate LiftUp ourselves — multi-tenancy, AI and all. That's exactly the SaaS
            product engineering we bring to client work. Tell us what you want to launch.
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
