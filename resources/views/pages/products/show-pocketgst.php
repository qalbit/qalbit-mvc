<?php
/**
 * Bespoke case-study page for PocketGST (offline GST calculator & invoice app for India).
 * Uses the QalbIT theme palette (primary blue + accent purple).
 *
 * @var array $product
 */

$product     = $product ?? [];
$externalUrl = $product['externalUrl'] ?? 'https://www.pocketgst.com';
$related     = $product['related_service'] ?? ['label' => 'Mobile App Development', 'href' => '/services/mobile-development/'];
?>

<!-- ============================ HERO ============================ -->
<section class="relative overflow-hidden bg-white">
    <div class="pointer-events-none absolute -left-24 -top-24 h-72 w-72 rounded-full bg-primary-300/40 blur-3xl"></div>
    <div class="pointer-events-none absolute right-0 top-28 h-72 w-72 rounded-full bg-accent-300/40 blur-3xl"></div>

    <div class="relative mx-auto max-w-6xl px-4 py-10 sm:px-6 lg:px-8 lg:py-16">
        <!-- breadcrumb -->
        <nav class="text-[11px] font-medium text-slate-500" aria-label="Breadcrumb">
            <ol class="flex flex-wrap items-center gap-1">
                <li><a href="/" class="hover:text-primary-600">Home</a></li>
                <li class="text-slate-300">/</li>
                <li><a href="/products/" class="hover:text-primary-600">Products</a></li>
                <li class="text-slate-300">/</li>
                <li aria-current="page" class="text-slate-700">PocketGST</li>
            </ol>
        </nav>

        <div class="mt-6 grid items-center gap-10 lg:grid-cols-[minmax(0,1.1fr)_minmax(0,0.9fr)]">
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
                    <span class="inline-flex items-center rounded-full bg-slate-900 px-3 py-1 text-[11px] font-semibold text-white">🇮🇳 Made in India · Android</span>
                </div>

                <h1 class="mt-5 text-4xl font-extrabold leading-[1.08] tracking-tight text-slate-900 sm:text-5xl">
                    GST maths &amp; invoices,
                    <span class="bg-gradient-to-r from-primary-500 via-primary-600 to-accent-600 bg-clip-text text-transparent">100% offline</span>.
                </h1>

                <p class="mt-5 max-w-xl text-base leading-relaxed text-slate-600">
                    PocketGST is an offline GST calculator and invoice app for Indian shops, freelancers and traders —
                    instant CGST/SGST splits and professional invoices with no signup and no internet. We designed, built and ship it.
                </p>

                <div class="mt-7 flex flex-col gap-3 sm:flex-row sm:items-center">
                    <a href="<?= htmlspecialchars($externalUrl, ENT_QUOTES) ?>" target="_blank" rel="noopener noreferrer"
                       class="inline-flex items-center justify-center gap-2 rounded-full bg-primary-600 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-primary-600/25 transition hover:bg-primary-700">
                        Visit pocketgst.com <span aria-hidden="true">↗</span>
                    </a>
                    <a href="/contact-us/?topic=product-studio"
                       class="inline-flex items-center justify-center gap-2 rounded-full border border-slate-300 bg-white px-6 py-3 text-sm font-semibold text-slate-800 transition hover:border-slate-400 hover:bg-slate-50">
                        Build something like this
                    </a>
                </div>

                <div class="mt-8 flex flex-wrap items-center gap-x-6 gap-y-2 text-xs text-slate-500">
                    <span class="inline-flex items-center gap-1.5"><span class="text-primary-500">✓</span> 100% offline</span>
                    <span class="inline-flex items-center gap-1.5"><span class="text-primary-500">✓</span> No signup</span>
                    <span class="inline-flex items-center gap-1.5"><span class="text-primary-500">✓</span> 12 Indian languages</span>
                    <span class="inline-flex items-center gap-1.5"><span class="text-primary-500">✓</span> 15 free invoices/mo</span>
                </div>
            </div>

            <!-- right: phone mockup -->
            <div class="relative mx-auto w-full max-w-[300px]">
                <div class="absolute -inset-6 -z-10 rounded-[3rem] bg-gradient-to-tr from-primary-500/20 to-accent-400/20 blur-2xl"></div>
                <div class="rounded-[2.6rem] border-[10px] border-slate-900 bg-slate-900 shadow-2xl">
                    <div class="overflow-hidden rounded-[2rem] bg-white">
                        <!-- app header -->
                        <div class="relative bg-gradient-to-b from-primary-600 to-primary-700 px-4 pb-4 pt-3 text-white">
                            <div class="mx-auto mb-3 h-1 w-14 rounded-full bg-white/40"></div>
                            <div class="flex items-center justify-between">
                                <div>
                                    <div class="text-sm font-bold">PocketGST</div>
                                    <div class="text-[10px] text-white/70">GST Calculator</div>
                                </div>
                                <span class="rounded-full bg-white/15 px-2 py-0.5 text-[9px] font-semibold">Offline</span>
                            </div>
                        </div>
                        <!-- calculator body -->
                        <div class="space-y-3 p-4">
                            <div class="rounded-xl border border-slate-200 bg-slate-50 p-3">
                                <div class="text-[10px] text-slate-400">Amount</div>
                                <div class="text-2xl font-extrabold text-slate-900">₹ 10,000</div>
                            </div>
                            <div class="flex gap-1.5">
                                <?php foreach (['5%','12%','18%','28%'] as $i => $rate): ?>
                                    <span class="flex-1 rounded-lg py-1.5 text-center text-[11px] font-semibold <?= $i === 2 ? 'bg-primary-600 text-white' : 'bg-slate-100 text-slate-500' ?>"><?= $rate ?></span>
                                <?php endforeach; ?>
                            </div>
                            <div class="grid grid-cols-2 gap-2">
                                <div class="rounded-xl bg-primary-50 p-2.5 text-center">
                                    <div class="text-[10px] text-slate-500">CGST 9%</div>
                                    <div class="text-sm font-bold text-primary-700">₹ 900</div>
                                </div>
                                <div class="rounded-xl bg-accent-50 p-2.5 text-center">
                                    <div class="text-[10px] text-slate-500">SGST 9%</div>
                                    <div class="text-sm font-bold text-accent-700">₹ 900</div>
                                </div>
                            </div>
                            <div class="flex items-center justify-between rounded-xl bg-slate-900 px-3 py-2.5 text-white">
                                <span class="text-[11px] text-white/70">Total</span>
                                <span class="text-base font-extrabold">₹ 11,800</span>
                            </div>
                            <div class="flex items-center justify-center gap-2 rounded-xl border border-primary-200 bg-primary-50 py-2 text-[11px] font-semibold text-primary-800">
                                📄 Create invoice · Share on WhatsApp
                            </div>
                        </div>
                    </div>
                </div>
                <!-- floating chips -->
                <div class="absolute -left-8 top-16 hidden rounded-xl border border-slate-200 bg-white px-3 py-2 shadow-xl sm:block">
                    <div class="text-[10px] uppercase tracking-wide text-slate-400">Play Store</div>
                    <div class="text-sm font-bold text-primary-600">4.6★ · 700+</div>
                </div>
                <div class="absolute -right-6 bottom-20 hidden rounded-xl border border-slate-200 bg-white px-3 py-2 shadow-xl sm:block">
                    <div class="text-[10px] uppercase tracking-wide text-slate-400">Privacy</div>
                    <div class="text-sm font-bold text-accent-700">No cloud upload</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ======================= TRUST STRIP ======================= -->
<section class="border-y border-slate-100 bg-slate-900">
    <div class="mx-auto grid max-w-6xl grid-cols-2 gap-6 px-4 py-8 sm:grid-cols-4 sm:px-6 lg:px-8">
        <?php
        $stats = [
            ['v' => '700+',  'l' => 'Play Store downloads'],
            ['v' => '4.6★',  'l' => 'Average rating'],
            ['v' => '12',    'l' => 'Indian languages'],
            ['v' => '100%',  'l' => 'Offline core'],
        ];
        foreach ($stats as $s): ?>
            <div class="text-center">
                <div class="text-2xl font-extrabold text-white sm:text-3xl"><?= htmlspecialchars($s['v']) ?></div>
                <div class="mt-1 text-xs font-medium text-primary-300"><?= htmlspecialchars($s['l']) ?></div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- ========================= THE CHALLENGE ========================= -->
<section class="bg-white py-14 lg:py-20">
    <div class="mx-auto max-w-4xl px-4 text-center sm:px-6 lg:px-8">
        <span class="text-xs font-semibold uppercase tracking-[0.18em] text-primary-600">The opportunity</span>
        <h2 class="mt-3 text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">
            GST is daily maths for millions of small businesses.
        </h2>
        <p class="mt-4 text-base leading-relaxed text-slate-600">
            Kirana shops, freelancers and traders across India do GST calculations and invoices every day — but most
            tools demand a signup, a subscription and a steady internet connection. PocketGST set out to make GST maths
            and invoicing instant, offline and free to start. Our job: design and build it as a fast, private mobile app.
        </p>
    </div>
</section>

<!-- ========================= FEATURE PILLARS ========================= -->
<section class="bg-slate-50 py-14 lg:py-20">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <span class="text-xs font-semibold uppercase tracking-[0.18em] text-primary-600">What we built</span>
            <h2 class="mt-3 text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">From calculation to invoice in 30 seconds</h2>
        </div>

        <div class="mt-12 space-y-10">
            <?php
            $pillars = [
                [
                    'kicker' => 'GST calculator',
                    'title'  => 'Instant CGST / SGST split as you type.',
                    'text'   => 'Enter an amount, pick a GST rate, and PocketGST splits CGST and SGST instantly for intra-state supplies — no formulas, no errors, updated live as you type.',
                    'points' => ['Live CGST / SGST / IGST split', 'All standard GST slabs', 'Works fully offline'],
                    'flip'   => false,
                    'visual' => 'calc',
                ],
                [
                    'kicker' => 'Invoicing',
                    'title'  => 'Professional GST invoices, shared on WhatsApp.',
                    'text'   => 'Generate clean, GST-ready invoices with HSN codes on line items and professional templates, then share a PDF straight to WhatsApp — no cloud lock-in.',
                    'points' => ['Multi-item bills with HSN', 'Professional PDF templates', 'One-tap WhatsApp sharing'],
                    'flip'   => true,
                    'visual' => 'invoice',
                ],
                [
                    'kicker' => 'Offline & private',
                    'title'  => 'No signup, no cloud, no internet needed.',
                    'text'   => 'Everything runs on-device — DPDP-aligned and privacy-first, in 12 Indian languages — so billing at the counter never waits on a network or an account.',
                    'points' => ['100% offline, on-device data', 'DPDP-aligned, no cloud upload', '12 languages incl. Hindi & Tamil'],
                    'flip'   => false,
                    'visual' => 'offline',
                ],
            ];
            foreach ($pillars as $p): ?>
                <div class="grid items-center gap-8 rounded-3xl border border-slate-200 bg-white p-6 shadow-sm lg:grid-cols-2 lg:p-10">
                    <div class="<?= $p['flip'] ? 'lg:order-2' : '' ?>">
                        <span class="text-xs font-semibold uppercase tracking-[0.16em] text-primary-600"><?= htmlspecialchars($p['kicker']) ?></span>
                        <h3 class="mt-2 text-xl font-bold text-slate-900 sm:text-2xl"><?= htmlspecialchars($p['title']) ?></h3>
                        <p class="mt-3 text-sm leading-relaxed text-slate-600"><?= htmlspecialchars($p['text']) ?></p>
                        <ul class="mt-4 space-y-2">
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
                            <?php if ($p['visual'] === 'calc'): ?>
                                <div class="mx-auto max-w-xs rounded-xl border border-slate-200 bg-white p-4">
                                    <div class="rounded-lg bg-slate-50 p-2.5">
                                        <div class="text-[10px] text-slate-400">Amount</div>
                                        <div class="text-xl font-extrabold text-slate-900">₹ 10,000</div>
                                    </div>
                                    <div class="mt-2 flex gap-1.5">
                                        <?php foreach (['5%','12%','18%','28%'] as $i => $r): ?>
                                            <span class="flex-1 rounded-lg py-1 text-center text-[10px] font-semibold <?= $i===2 ? 'bg-primary-600 text-white' : 'bg-slate-100 text-slate-500' ?>"><?= $r ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="mt-2 grid grid-cols-2 gap-2">
                                        <div class="rounded-lg bg-primary-50 py-1.5 text-center text-[11px] font-bold text-primary-800">CGST ₹900</div>
                                        <div class="rounded-lg bg-accent-50 py-1.5 text-center text-[11px] font-bold text-accent-700">SGST ₹900</div>
                                    </div>
                                </div>
                            <?php elseif ($p['visual'] === 'invoice'): ?>
                                <div class="mx-auto max-w-xs rounded-xl border border-slate-200 bg-white p-4">
                                    <div class="flex items-center justify-between border-b border-slate-100 pb-2">
                                        <span class="text-xs font-bold text-slate-800">Tax Invoice</span>
                                        <span class="rounded-full bg-primary-100 px-2 py-0.5 text-[9px] font-semibold text-primary-700">GST</span>
                                    </div>
                                    <div class="mt-2 space-y-1.5 text-[11px]">
                                        <div class="flex justify-between text-slate-600"><span>Item · HSN 8471</span><span>₹ 6,000</span></div>
                                        <div class="flex justify-between text-slate-600"><span>Item · HSN 4820</span><span>₹ 4,000</span></div>
                                        <div class="flex justify-between border-t border-slate-100 pt-1.5 font-bold text-slate-900"><span>Total (incl. GST)</span><span class="text-primary-700">₹ 11,800</span></div>
                                    </div>
                                    <div class="mt-3 flex items-center justify-center gap-1.5 rounded-lg bg-primary-600 py-1.5 text-[11px] font-semibold text-white">Share PDF on WhatsApp</div>
                                </div>
                            <?php else: ?>
                                <div class="grid grid-cols-2 gap-3">
                                    <div class="rounded-xl border border-slate-200 bg-white p-4 text-center">
                                        <div class="text-2xl">📴</div>
                                        <div class="mt-1 text-xs font-semibold text-slate-800">100% Offline</div>
                                        <div class="text-[10px] text-slate-400">No internet needed</div>
                                    </div>
                                    <div class="rounded-xl border border-slate-200 bg-white p-4 text-center">
                                        <div class="text-2xl">🔒</div>
                                        <div class="mt-1 text-xs font-semibold text-slate-800">No cloud upload</div>
                                        <div class="text-[10px] text-slate-400">DPDP-aligned</div>
                                    </div>
                                    <div class="rounded-xl border border-slate-200 bg-white p-4 text-center">
                                        <div class="text-2xl">🗣️</div>
                                        <div class="mt-1 text-xs font-semibold text-slate-800">12 languages</div>
                                        <div class="text-[10px] text-slate-400">Hindi, Tamil +10</div>
                                    </div>
                                    <div class="rounded-xl border border-slate-200 bg-white p-4 text-center">
                                        <div class="text-2xl">⚡</div>
                                        <div class="mt-1 text-xs font-semibold text-slate-800">No signup</div>
                                        <div class="text-[10px] text-slate-400">Open &amp; go</div>
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

<!-- ========================= BUILT FOR ========================= -->
<section class="bg-white py-14 lg:py-20">
    <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <span class="text-xs font-semibold uppercase tracking-[0.18em] text-primary-600">Who it's for</span>
            <h2 class="mt-3 text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">Built for Indian shops, freelancers &amp; traders</h2>
        </div>
        <div class="mt-10 grid gap-4 sm:grid-cols-3">
            <?php
            $fors = [
                ['icon' => '🛒', 't' => 'Retail & kirana', 'd' => 'Fast billing at the counter with CGST/SGST split and WhatsApp PDF sharing.'],
                ['icon' => '💼', 't' => 'Services & freelancers', 'd' => 'Quotes, GST invoices and professional templates without cloud lock-in.'],
                ['icon' => '📦', 't' => 'Wholesale & trade', 'd' => 'Multi-item bills, HSN on lines, and GSTR helpers when filing season hits.'],
            ];
            foreach ($fors as $f): ?>
                <div class="rounded-2xl border border-slate-200 bg-slate-50 p-6 text-center">
                    <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-2xl bg-white text-2xl ring-1 ring-slate-200"><?= $f['icon'] ?></div>
                    <h3 class="mt-3 text-base font-bold text-slate-900"><?= htmlspecialchars($f['t']) ?></h3>
                    <p class="mt-1.5 text-sm leading-relaxed text-slate-600"><?= htmlspecialchars($f['d']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ========================= HOW IT WORKS ========================= -->
<section class="bg-slate-50 py-14 lg:py-20">
    <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <span class="text-xs font-semibold uppercase tracking-[0.18em] text-primary-600">How it works</span>
            <h2 class="mt-3 text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">Three steps to GST</h2>
        </div>
        <div class="relative mt-12 grid gap-8 sm:grid-cols-3">
            <div class="absolute left-0 right-0 top-6 hidden h-px bg-gradient-to-r from-primary-200 via-accent-300 to-primary-200 sm:block"></div>
            <?php
            $steps = [
                ['n'=>'1','t'=>'Download','d'=>'Get PocketGST from the Play Store and open it — no account, no permissions drama.'],
                ['n'=>'2','t'=>'Calculate','d'=>'Enter an amount, pick a GST rate. Instant CGST/SGST split for intra-state supplies.'],
                ['n'=>'3','t'=>'Save & share','d'=>'Turn it into a GST invoice and share the PDF on WhatsApp in seconds.'],
            ];
            foreach ($steps as $s): ?>
                <div class="relative text-center">
                    <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-gradient-to-br from-primary-600 to-accent-600 text-lg font-bold text-white shadow-lg shadow-primary-600/25 ring-4 ring-slate-50"><?= $s['n'] ?></div>
                    <h3 class="mt-4 text-base font-bold text-slate-900"><?= htmlspecialchars($s['t']) ?></h3>
                    <p class="mt-2 text-sm leading-relaxed text-slate-600"><?= htmlspecialchars($s['d']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ===================== ENGINEERING / OUTCOMES ===================== -->
<section class="bg-slate-900 py-14 text-white lg:py-20">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl">
            <span class="text-xs font-semibold uppercase tracking-[0.18em] text-primary-400">Under the hood</span>
            <h2 class="mt-3 text-2xl font-bold tracking-tight sm:text-3xl">Offline-first, privacy-first, built for Bharat</h2>
            <p class="mt-4 text-sm leading-relaxed text-slate-300">
                PocketGST is engineered to work with zero connectivity — the GST logic, invoicing and storage all run
                on-device, so it stays fast and private even at a counter with no signal, in the user's own language.
            </p>
        </div>
        <div class="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            <?php
            $arch = [
                ['t'=>'Offline-first Android app','d'=>'GST calculation, invoicing and data all run on-device — the core works with no internet at all.'],
                ['t'=>'Privacy by design','d'=>'DPDP-aligned with no cloud upload and no signup — data stays on the user\'s phone.'],
                ['t'=>'Built-in GST rules','d'=>'Standard slabs and CGST/SGST/IGST logic encoded so users get correct maths without formulas.'],
                ['t'=>'Multilingual UX','d'=>'12 Indian languages including Hindi and Tamil, for real accessibility across the country.'],
                ['t'=>'Invoicing & sharing','d'=>'Professional PDF templates with HSN on line items and one-tap WhatsApp sharing.'],
                ['t'=>'Freemium model','d'=>'15 free invoices a month with a Pro tier from ₹999/year — accessible to the smallest business.'],
            ];
            foreach ($arch as $a): ?>
                <div class="rounded-2xl border border-white/10 bg-white/5 p-5">
                    <h3 class="text-sm font-semibold text-primary-300"><?= htmlspecialchars($a['t']) ?></h3>
                    <p class="mt-2 text-[13px] leading-relaxed text-slate-300"><?= htmlspecialchars($a['d']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="mt-8 flex flex-wrap gap-2">
            <?php foreach (['Android','Offline-first','On-device storage','GST rules engine','PDF invoicing','12 languages','DPDP-aligned','Play Store'] as $tech): ?>
                <span class="rounded-lg border border-white/10 bg-white/5 px-3 py-1.5 text-xs font-medium text-slate-200"><?= htmlspecialchars($tech) ?></span>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================ CTA ============================ -->
<section class="relative overflow-hidden bg-gradient-to-br from-primary-700 via-primary-800 to-accent-900 py-16 text-white">
    <div class="pointer-events-none absolute -right-16 -top-16 h-64 w-64 rounded-full bg-white/10 blur-3xl"></div>
    <div class="pointer-events-none absolute -bottom-20 -left-10 h-64 w-64 rounded-full bg-accent-400/20 blur-3xl"></div>
    <div class="relative mx-auto max-w-3xl px-4 text-center sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold tracking-tight sm:text-3xl">Want a mobile product like PocketGST?</h2>
        <p class="mx-auto mt-3 max-w-xl text-sm leading-relaxed text-primary-100">
            We designed, built and ship PocketGST ourselves — offline-first, multilingual and privacy-first. That's the
            same mobile and product engineering we bring to client work. Tell us what you want to launch.
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
