<?php
/**
 * Bespoke case-study page for Emplyft (HR SaaS — coming soon).
 * Uses the QalbIT theme palette (primary blue + accent purple).
 * externalUrl is null in config → "Coming soon" state, no outbound link.
 *
 * @var array $product
 */

$product     = $product ?? [];
$externalUrl = $product['externalUrl'] ?? null;               // null => coming soon
$isLive      = ($product['status'] ?? 'coming_soon') === 'live' && !empty($externalUrl);
$related     = $product['related_service'] ?? ['label' => 'SaaS Product Development', 'href' => '/services/saas/'];
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
                <li aria-current="page" class="text-slate-700">Emplyft</li>
            </ol>
        </nav>

        <div class="mt-6 grid items-center gap-10 lg:grid-cols-[minmax(0,1fr)_minmax(0,1.05fr)]">
            <!-- left: copy -->
            <div>
                <div class="flex flex-wrap items-center gap-2">
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-50 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-amber-700 ring-1 ring-amber-200">
                        <span class="h-2 w-2 rounded-full bg-amber-400"></span>
                        Coming soon
                    </span>
                    <span class="inline-flex items-center rounded-full bg-primary-50 px-3 py-1 text-[11px] font-semibold text-primary-700 ring-1 ring-primary-200">QalbIT Product · HR SaaS</span>
                </div>

                <h1 class="mt-5 text-4xl font-extrabold leading-[1.05] tracking-tight text-slate-900 sm:text-5xl">
                    Grow your team.
                    <span class="bg-gradient-to-r from-primary-500 via-primary-600 to-accent-600 bg-clip-text text-transparent">Not your paperwork.</span>
                </h1>

                <p class="mt-5 max-w-xl text-base leading-relaxed text-slate-600">
                    Emplyft is smart HR software for small and growing teams — automating payroll, leave, WFH and salary
                    slips in one clean dashboard. The product is already in use; the public launch is on the way.
                </p>

                <div class="mt-7 flex flex-col gap-3 sm:flex-row sm:items-center">
                    <?php if ($isLive): ?>
                        <a href="<?= htmlspecialchars($externalUrl, ENT_QUOTES) ?>" target="_blank" rel="noopener noreferrer"
                           class="inline-flex items-center justify-center gap-2 rounded-full bg-primary-600 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-primary-600/25 transition hover:bg-primary-700">
                            Visit emplyft.com <span aria-hidden="true">↗</span>
                        </a>
                    <?php else: ?>
                        <span class="inline-flex cursor-not-allowed items-center justify-center gap-2 rounded-full border border-slate-200 bg-slate-50 px-6 py-3 text-sm font-semibold text-slate-400">
                            <span class="h-2 w-2 rounded-full bg-amber-400"></span> Launching soon
                        </span>
                    <?php endif; ?>
                    <a href="/contact-us/?topic=product-studio"
                       class="inline-flex items-center justify-center gap-2 rounded-full border border-slate-300 bg-white px-6 py-3 text-sm font-semibold text-slate-800 transition hover:border-slate-400 hover:bg-slate-50">
                        Build something like this
                    </a>
                </div>

                <div class="mt-8 flex flex-wrap items-center gap-x-6 gap-y-2 text-xs text-slate-500">
                    <span class="inline-flex items-center gap-1.5"><span class="text-primary-500">✓</span> Payroll & salary slips</span>
                    <span class="inline-flex items-center gap-1.5"><span class="text-primary-500">✓</span> Leave & WFH tracking</span>
                    <span class="inline-flex items-center gap-1.5"><span class="text-primary-500">✓</span> Employee records</span>
                    <span class="inline-flex items-center gap-1.5"><span class="text-primary-500">✓</span> Free up to 15 employees</span>
                </div>
            </div>

            <!-- right: HR dashboard mockup -->
            <div class="relative">
                <div class="absolute -inset-4 -z-10 rounded-[2rem] bg-gradient-to-tr from-primary-500/20 to-accent-400/20 blur-2xl"></div>
                <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-2xl">
                    <!-- browser chrome -->
                    <div class="flex items-center gap-2 border-b border-slate-100 bg-slate-50 px-4 py-2.5">
                        <span class="h-3 w-3 rounded-full bg-red-400"></span>
                        <span class="h-3 w-3 rounded-full bg-amber-400"></span>
                        <span class="h-3 w-3 rounded-full bg-primary-400"></span>
                        <div class="ml-3 flex-1 rounded-md border border-slate-200 bg-white px-3 py-1 text-[11px] text-slate-400">app.emplyft.com/dashboard</div>
                    </div>
                    <div class="space-y-3 p-4">
                        <!-- summary tiles -->
                        <div class="grid grid-cols-3 gap-2">
                            <div class="rounded-xl bg-primary-50 p-2.5 text-center">
                                <div class="text-lg font-extrabold text-primary-700">24</div>
                                <div class="text-[10px] text-slate-500">Employees</div>
                            </div>
                            <div class="rounded-xl bg-accent-50 p-2.5 text-center">
                                <div class="text-lg font-extrabold text-accent-700">3</div>
                                <div class="text-[10px] text-slate-500">On leave</div>
                            </div>
                            <div class="rounded-xl bg-slate-50 p-2.5 text-center">
                                <div class="text-lg font-extrabold text-slate-700">5</div>
                                <div class="text-[10px] text-slate-500">WFH today</div>
                            </div>
                        </div>
                        <!-- employee rows -->
                        <?php
                        $rows = [
                            ['i' => 'AS', 'n' => 'Aisha Sharma', 'r' => 'Design',      'st' => 'Present', 'tone' => 'primary'],
                            ['i' => 'RK', 'n' => 'Ravi Kumar',   'r' => 'Engineering', 'st' => 'WFH',     'tone' => 'accent'],
                            ['i' => 'ML', 'n' => 'Meera Lal',    'r' => 'Sales',       'st' => 'On leave','tone' => 'amber'],
                        ];
                        foreach ($rows as $r):
                            $pill = $r['tone'] === 'primary' ? 'bg-primary-100 text-primary-700' : ($r['tone'] === 'accent' ? 'bg-accent-100 text-accent-700' : 'bg-amber-100 text-amber-700');
                            $av   = $r['tone'] === 'primary' ? 'bg-primary-600' : ($r['tone'] === 'accent' ? 'bg-accent-600' : 'bg-amber-500');
                        ?>
                            <div class="flex items-center justify-between rounded-xl border border-slate-200 px-3 py-2">
                                <div class="flex items-center gap-2.5">
                                    <span class="flex h-7 w-7 items-center justify-center rounded-full <?= $av ?> text-[10px] font-bold text-white"><?= $r['i'] ?></span>
                                    <div>
                                        <div class="text-xs font-semibold text-slate-800"><?= $r['n'] ?></div>
                                        <div class="text-[10px] text-slate-400"><?= $r['r'] ?></div>
                                    </div>
                                </div>
                                <span class="rounded-full px-2 py-0.5 text-[10px] font-semibold <?= $pill ?>"><?= $r['st'] ?></span>
                            </div>
                        <?php endforeach; ?>
                        <!-- payroll bar -->
                        <div class="flex items-center justify-between rounded-xl bg-gradient-to-r from-primary-600 to-accent-600 px-3 py-2.5 text-white">
                            <span class="text-xs font-semibold">Payroll · June</span>
                            <span class="text-[11px] font-medium">Salary slips generated ✓</span>
                        </div>
                    </div>
                </div>
                <!-- floating chips -->
                <div class="absolute -left-5 bottom-10 hidden rounded-xl border border-slate-200 bg-white px-3 py-2 shadow-xl sm:block">
                    <div class="text-[10px] uppercase tracking-wide text-slate-400">Setup time</div>
                    <div class="text-sm font-bold text-primary-600">5 minutes</div>
                </div>
                <div class="absolute -right-4 -top-4 hidden rounded-xl border border-slate-200 bg-white px-3 py-2 shadow-xl sm:block">
                    <div class="text-[10px] uppercase tracking-wide text-slate-400">Leave request</div>
                    <div class="text-sm font-bold text-accent-700">Approved ✓</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========================= THE CHALLENGE ========================= -->
<section class="border-y border-slate-100 bg-slate-50 py-14 lg:py-20">
    <div class="mx-auto max-w-4xl px-4 text-center sm:px-6 lg:px-8">
        <span class="text-xs font-semibold uppercase tracking-[0.18em] text-primary-600">The opportunity</span>
        <h2 class="mt-3 text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">
            Growing teams outgrow spreadsheets for HR — fast.
        </h2>
        <p class="mt-4 text-base leading-relaxed text-slate-600">
            Payroll, leave, WFH and employee records get scattered across spreadsheets, email and chat. It drains hours,
            causes costly mistakes and frustrates people. Emplyft automates the busywork so small businesses stay
            organised without hiring an HR team — our job was to design and build it as a real, operable product.
        </p>
    </div>
</section>

<!-- ========================= FEATURE PILLARS ========================= -->
<section class="bg-white py-14 lg:py-20">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <span class="text-xs font-semibold uppercase tracking-[0.18em] text-primary-600">What we built</span>
            <h2 class="mt-3 text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">One dashboard for your whole team</h2>
        </div>

        <div class="mt-12 space-y-10">
            <?php
            $pillars = [
                [
                    'kicker' => 'People & records',
                    'title'  => 'Centralised employee management.',
                    'text'   => 'Keep every employee\'s personal info, documents and salary details organised and accessible in seconds — no more manual tracking across files.',
                    'points' => ['Employee directory & profiles', 'Documents & salary details', 'Role-based access'],
                    'flip'   => false,
                    'visual' => 'people',
                ],
                [
                    'kicker' => 'Payroll',
                    'title'  => 'Effortless payroll automation.',
                    'text'   => 'Auto-generate monthly salary slips, manage payment records and stay compliant — saving hours and eliminating human error every pay cycle.',
                    'points' => ['Auto salary slips', 'Payment records', 'Compliance-friendly'],
                    'flip'   => true,
                    'visual' => 'payroll',
                ],
                [
                    'kicker' => 'Time off & WFH',
                    'title'  => 'Smart leave and WFH tracking.',
                    'text'   => 'Track employee leaves, remote-work days and approvals in real time, with clear visibility for managers and happier teams.',
                    'points' => ['Leave requests & approvals', 'WFH / remote tracking', 'Real-time visibility'],
                    'flip'   => false,
                    'visual' => 'leave',
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
                            <?php if ($p['visual'] === 'people'): ?>
                                <div class="space-y-2">
                                    <?php foreach ([['AS','Aisha Sharma','Design','bg-primary-600'],['RK','Ravi Kumar','Engineering','bg-accent-600'],['ML','Meera Lal','Sales','bg-slate-500']] as $r): ?>
                                        <div class="flex items-center gap-2.5 rounded-xl border border-slate-200 bg-white px-3 py-2">
                                            <span class="flex h-7 w-7 items-center justify-center rounded-full <?= $r[3] ?> text-[10px] font-bold text-white"><?= $r[0] ?></span>
                                            <div class="flex-1">
                                                <div class="text-xs font-semibold text-slate-800"><?= $r[1] ?></div>
                                                <div class="text-[10px] text-slate-400"><?= $r[2] ?></div>
                                            </div>
                                            <span class="text-[10px] text-primary-600">View</span>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php elseif ($p['visual'] === 'payroll'): ?>
                                <div class="rounded-xl border border-slate-200 bg-white p-4">
                                    <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                                        <span class="text-sm font-bold text-slate-800">Salary slip · June</span>
                                        <span class="rounded-full bg-primary-100 px-2 py-0.5 text-[10px] font-semibold text-primary-700">Generated</span>
                                    </div>
                                    <div class="mt-3 space-y-2 text-xs">
                                        <div class="flex justify-between text-slate-600"><span>Gross</span><span class="font-semibold text-slate-900">₹ 82,000</span></div>
                                        <div class="flex justify-between text-slate-600"><span>Deductions</span><span>− ₹ 9,400</span></div>
                                        <div class="flex justify-between border-t border-slate-100 pt-2 text-slate-900"><span class="font-semibold">Net pay</span><span class="font-bold text-primary-700">₹ 72,600</span></div>
                                    </div>
                                    <div class="mt-3 flex gap-2">
                                        <span class="rounded-lg bg-gradient-to-r from-primary-600 to-accent-600 px-3 py-1.5 text-[11px] font-semibold text-white">Download PDF</span>
                                        <span class="rounded-lg border border-slate-200 px-3 py-1.5 text-[11px] font-medium text-slate-600">Email to employee</span>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="rounded-xl border border-slate-200 bg-white p-4">
                                    <div class="mb-3 flex items-center justify-between">
                                        <span class="text-sm font-bold text-slate-800">Leave requests</span>
                                        <span class="rounded-full bg-accent-100 px-2 py-0.5 text-[10px] font-semibold text-accent-700">2 pending</span>
                                    </div>
                                    <div class="space-y-2">
                                        <div class="flex items-center justify-between rounded-lg bg-slate-50 px-3 py-2 text-xs">
                                            <span class="text-slate-700">Meera · 12–14 Jun</span>
                                            <span class="rounded-full bg-primary-600 px-2 py-0.5 text-[10px] font-semibold text-white">Approve</span>
                                        </div>
                                        <div class="flex items-center justify-between rounded-lg bg-slate-50 px-3 py-2 text-xs">
                                            <span class="text-slate-700">Ravi · WFH Fri</span>
                                            <span class="rounded-full bg-primary-100 px-2 py-0.5 text-[10px] font-semibold text-primary-700">Approved ✓</span>
                                        </div>
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
<section class="bg-slate-50 py-14 lg:py-20">
    <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <span class="text-xs font-semibold uppercase tracking-[0.18em] text-primary-600">Who it's for</span>
            <h2 class="mt-3 text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">Built for lean, growing teams</h2>
        </div>
        <div class="mt-10 grid gap-4 sm:grid-cols-3">
            <?php
            $fors = [
                ['icon' => '🧑‍💼', 't' => 'HR teams', 'd' => 'Automate the repetitive admin so people teams focus on people, not paperwork.'],
                ['icon' => '🏢', 't' => 'Small businesses', 'd' => 'Stay organised and compliant without hiring a dedicated HR department.'],
                ['icon' => '🌍', 't' => 'Remote-ready teams', 'd' => 'Track attendance, leave and WFH from anywhere, with full visibility.'],
            ];
            foreach ($fors as $f): ?>
                <div class="rounded-2xl border border-slate-200 bg-white p-6 text-center shadow-sm">
                    <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-primary-50 to-accent-50 text-2xl ring-1 ring-primary-100"><?= $f['icon'] ?></div>
                    <h3 class="mt-3 text-base font-bold text-slate-900"><?= htmlspecialchars($f['t']) ?></h3>
                    <p class="mt-1.5 text-sm leading-relaxed text-slate-600"><?= htmlspecialchars($f['d']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ===================== STATUS / OUTCOMES ===================== -->
<section class="bg-white py-14 lg:py-20">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-10 lg:grid-cols-2">
            <div>
                <span class="text-xs font-semibold uppercase tracking-[0.18em] text-primary-600">What shipped</span>
                <h2 class="mt-3 text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">A working HR product</h2>
                <ul class="mt-6 space-y-3">
                    <?php foreach ([
                        'Centralised employee records & documents',
                        'Automated payroll and salary slips',
                        'Leave and WFH tracking with approvals',
                        'One clean dashboard for the whole team',
                        'Free tier for up to 15 employees',
                    ] as $item): ?>
                        <li class="flex items-start gap-3 text-sm text-slate-700">
                            <span class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-primary-100 text-[11px] text-primary-700">✓</span>
                            <?= htmlspecialchars($item) ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div>
                <span class="text-xs font-semibold uppercase tracking-[0.18em] text-primary-600">Status &amp; outcomes</span>
                <h2 class="mt-3 text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">Live in use, launching publicly soon</h2>
                <div class="mt-6 space-y-4">
                    <div class="rounded-2xl border border-amber-200 bg-amber-50 p-5">
                        <div class="flex items-center gap-2 text-sm font-semibold text-amber-800"><span class="h-2 w-2 rounded-full bg-amber-400"></span> Coming soon</div>
                        <p class="mt-1 text-sm text-amber-800/80">The product is already in use by real teams; the public rollout is being finalised.</p>
                    </div>
                    <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5">
                        <div class="text-sm font-semibold text-slate-900">Rounds out our SaaS range</div>
                        <p class="mt-1 text-sm text-slate-600">Emplyft extends our owned-product portfolio into HR / people tech.</p>
                    </div>
                    <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5">
                        <div class="text-sm font-semibold text-slate-900">Design + build + operate</div>
                        <p class="mt-1 text-sm text-slate-600">Built on the same SaaS foundations we bring to client product engineering.</p>
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
        <h2 class="text-2xl font-bold tracking-tight sm:text-3xl">Want to build an HR or SaaS product like Emplyft?</h2>
        <p class="mx-auto mt-3 max-w-xl text-sm leading-relaxed text-primary-100">
            We design, build and operate our own products — the same way we build software for our clients.
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
