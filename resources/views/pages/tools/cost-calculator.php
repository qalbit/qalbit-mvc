<?php
/**
 * Software Development Cost Calculator – /tools/software-development-cost-calculator/
 * Client-side estimator; lead capture via the standard contact form below.
 *
 * @var array $faqs
 */

$faqs = $faqs ?? [];
?>

<!-- Hero -->
<section class="bg-slate-50 py-10 sm:py-14">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 space-y-5">
        <nav class="text-xs font-medium text-slate-600" aria-label="Breadcrumb">
            <ol class="flex flex-wrap items-center gap-1">
                <li><a href="/" class="hover:text-sky-500 transition-colors">Home</a></li>
                <li aria-hidden="true">/</li>
                <li aria-current="page">Cost Calculator</li>
            </ol>
        </nav>

        <div class="max-w-3xl space-y-4">
            <span class="inline-flex items-center rounded-pill border border-slate-200 bg-white/90 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-muted-foreground shadow-soft">
                Free estimation tool
                <span class="ml-2 h-1 w-1 rounded-full bg-sky-400"></span>
                <span class="ml-2 opacity-80">No email required for the estimate</span>
            </span>

            <h1 class="text-display-md sm:text-display-lg font-bold text-slate-900">
                Software Development <span class="text-gradient-brand-animated">Cost Calculator</span>
            </h1>

            <p class="text-md font-medium text-slate-600">
                Answer five quick questions and get a realistic 2026 cost and timeline range for your
                MVP, CRM, ERP, SaaS, web or mobile project — based on rates from 120+ projects
                delivered by our India-based senior team using AI-accelerated development workflows.
            </p>
        </div>
    </div>
</section>

<!-- Calculator -->
<section class="bg-white py-10 sm:py-14" aria-label="Cost calculator">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-8 lg:grid-cols-[minmax(0,1.6fr)_minmax(0,1fr)] lg:items-start">

            <!-- LEFT: questions -->
            <form id="cc-form" class="space-y-9" onsubmit="return false;">

                <!-- Q1: project type -->
                <fieldset>
                    <legend class="text-sm font-bold uppercase tracking-wide text-slate-500">
                        1 · What are you building?
                    </legend>
                    <div class="mt-3 grid gap-3 sm:grid-cols-2">
                        <?php
                        $types = [
                            ['mvp',       'Startup MVP',              'First version to validate an idea'],
                            ['custom',    'Custom business software', 'Internal tools, portals, workflows'],
                            ['crm',       'CRM system',               'Sales, pipeline & customer 360'],
                            ['erp',       'ERP system',               'Inventory, purchase, production, finance'],
                            ['saas',      'SaaS product',             'Multi-tenant subscription product'],
                            ['ecommerce', 'E-commerce',               'Store, B2B portal or marketplace'],
                            ['mobile',    'Mobile app',               'iOS & Android via cross-platform'],
                        ];
                        foreach ($types as $i => [$val, $label, $hint]): ?>
                            <label class="cc-card flex cursor-pointer items-start gap-3 rounded-2xl border border-slate-200 bg-white p-4 transition-all hover:border-slate-300 has-[:checked]:border-primary-400 has-[:checked]:bg-primary-50/50 has-[:checked]:ring-1 has-[:checked]:ring-primary-300">
                                <input type="radio" name="cc-type" value="<?= $val ?>" <?= $i === 0 ? 'checked' : '' ?> class="mt-1 h-4 w-4 accent-[#1d4ed8]">
                                <span>
                                    <span class="block text-sm font-semibold text-slate-900"><?= $label ?></span>
                                    <span class="mt-0.5 block text-[12px] text-slate-500"><?= $hint ?></span>
                                </span>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </fieldset>

                <!-- Q2: platforms -->
                <fieldset>
                    <legend class="text-sm font-bold uppercase tracking-wide text-slate-500">
                        2 · Which platforms?
                    </legend>
                    <div class="mt-3 grid gap-3 sm:grid-cols-3">
                        <?php
                        $platforms = [
                            ['web',    'Web application',  'Browser-based, responsive', true],
                            ['mobile', 'Mobile app',       'iOS + Android',             false],
                            ['both',   'Web + Mobile',     'One backend, both fronts',  false],
                        ];
                        foreach ($platforms as [$val, $label, $hint, $checked]): ?>
                            <label class="cc-card flex cursor-pointer items-start gap-3 rounded-2xl border border-slate-200 bg-white p-4 transition-all hover:border-slate-300 has-[:checked]:border-primary-400 has-[:checked]:bg-primary-50/50 has-[:checked]:ring-1 has-[:checked]:ring-primary-300">
                                <input type="radio" name="cc-platform" value="<?= $val ?>" <?= $checked ? 'checked' : '' ?> class="mt-1 h-4 w-4 accent-[#1d4ed8]">
                                <span>
                                    <span class="block text-sm font-semibold text-slate-900"><?= $label ?></span>
                                    <span class="mt-0.5 block text-[12px] text-slate-500"><?= $hint ?></span>
                                </span>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </fieldset>

                <!-- Q3: complexity -->
                <fieldset>
                    <legend class="text-sm font-bold uppercase tracking-wide text-slate-500">
                        3 · How big is the first release?
                    </legend>
                    <div class="mt-3 grid gap-3 sm:grid-cols-3">
                        <?php
                        $sizes = [
                            ['lean',     'Lean',        'Core journey only – test fast',        false],
                            ['standard', 'Standard',    'Typical first release, most projects', true],
                            ['complex',  'Complex',     'Many roles, modules or heavy scale',   false],
                        ];
                        foreach ($sizes as [$val, $label, $hint, $checked]): ?>
                            <label class="cc-card flex cursor-pointer items-start gap-3 rounded-2xl border border-slate-200 bg-white p-4 transition-all hover:border-slate-300 has-[:checked]:border-primary-400 has-[:checked]:bg-primary-50/50 has-[:checked]:ring-1 has-[:checked]:ring-primary-300">
                                <input type="radio" name="cc-size" value="<?= $val ?>" <?= $checked ? 'checked' : '' ?> class="mt-1 h-4 w-4 accent-[#1d4ed8]">
                                <span>
                                    <span class="block text-sm font-semibold text-slate-900"><?= $label ?></span>
                                    <span class="mt-0.5 block text-[12px] text-slate-500"><?= $hint ?></span>
                                </span>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </fieldset>

                <!-- Q4: features -->
                <fieldset>
                    <legend class="text-sm font-bold uppercase tracking-wide text-slate-500">
                        4 · Which features do you need? <span class="font-normal normal-case text-slate-400">(user accounts &amp; admin basics are always included)</span>
                    </legend>
                    <div class="mt-3 grid gap-3 sm:grid-cols-2">
                        <?php
                        $features = [
                            ['payments',     'Online payments / subscriptions', 'Stripe, Razorpay, billing'],
                            ['dashboards',   'Dashboards & reporting',          'KPIs, charts, exports'],
                            ['integrations', 'Third-party integrations',        'ERP, Tally, CRM, APIs'],
                            ['realtime',     'Real-time features',              'Chat, live updates, notifications'],
                            ['ai',           'AI features',                     'Assistants, summaries, automation'],
                            ['multilang',    'Multi-language / RTL',            'Including Arabic support'],
                        ];
                        foreach ($features as [$val, $label, $hint]): ?>
                            <label class="cc-card flex cursor-pointer items-start gap-3 rounded-2xl border border-slate-200 bg-white p-4 transition-all hover:border-slate-300 has-[:checked]:border-primary-400 has-[:checked]:bg-primary-50/50 has-[:checked]:ring-1 has-[:checked]:ring-primary-300">
                                <input type="checkbox" name="cc-feature" value="<?= $val ?>" class="mt-1 h-4 w-4 accent-[#1d4ed8]">
                                <span>
                                    <span class="block text-sm font-semibold text-slate-900"><?= $label ?></span>
                                    <span class="mt-0.5 block text-[12px] text-slate-500"><?= $hint ?></span>
                                </span>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </fieldset>

                <!-- Q5: design -->
                <fieldset>
                    <legend class="text-sm font-bold uppercase tracking-wide text-slate-500">
                        5 · Design level
                    </legend>
                    <div class="mt-3 grid gap-3 sm:grid-cols-2">
                        <label class="cc-card flex cursor-pointer items-start gap-3 rounded-2xl border border-slate-200 bg-white p-4 transition-all hover:border-slate-300 has-[:checked]:border-primary-400 has-[:checked]:bg-primary-50/50 has-[:checked]:ring-1 has-[:checked]:ring-primary-300">
                            <input type="radio" name="cc-design" value="standard" checked class="mt-1 h-4 w-4 accent-[#1d4ed8]">
                            <span>
                                <span class="block text-sm font-semibold text-slate-900">Clean & professional</span>
                                <span class="mt-0.5 block text-[12px] text-slate-500">Proven UI patterns, your brand colours</span>
                            </span>
                        </label>
                        <label class="cc-card flex cursor-pointer items-start gap-3 rounded-2xl border border-slate-200 bg-white p-4 transition-all hover:border-slate-300 has-[:checked]:border-primary-400 has-[:checked]:bg-primary-50/50 has-[:checked]:ring-1 has-[:checked]:ring-primary-300">
                            <input type="radio" name="cc-design" value="custom" class="mt-1 h-4 w-4 accent-[#1d4ed8]">
                            <span>
                                <span class="block text-sm font-semibold text-slate-900">Fully custom UX</span>
                                <span class="mt-0.5 block text-[12px] text-slate-500">Bespoke design system & interactions</span>
                            </span>
                        </label>
                    </div>
                </fieldset>
            </form>

            <!-- RIGHT: live estimate (sticky) -->
            <aside class="lg:sticky lg:top-24">
                <div class="rounded-3xl border border-slate-300 bg-slate-50 p-6 shadow-soft space-y-5" aria-live="polite">
                    <p class="text-[11px] font-semibold uppercase tracking-[0.16em] text-slate-500">
                        Your instant estimate
                    </p>

                    <div>
                        <p id="cc-cost" class="text-3xl font-bold text-slate-900">$6,500 – $12,500</p>
                        <p class="mt-1 text-[12px] text-slate-500">Estimated investment (USD)</p>
                    </div>

                    <div class="flex items-center gap-6 border-t border-slate-200 pt-4">
                        <div>
                            <p id="cc-weeks" class="text-xl font-bold text-slate-900">6–10 weeks</p>
                            <p class="text-[12px] text-slate-500">Timeline to launch</p>
                        </div>
                        <div>
                            <p class="text-xl font-bold text-slate-900">50–70%</p>
                            <p class="text-[12px] text-slate-500">vs US/UK agency rates</p>
                        </div>
                    </div>

                    <ul class="space-y-1.5 border-t border-slate-200 pt-4 text-[12px] text-slate-600">
                        <li class="flex gap-2"><span class="text-emerald-600">✓</span> Senior engineers + tech-lead oversight</li>
                        <li class="flex gap-2"><span class="text-emerald-600">✓</span> AI-accelerated delivery — ~20% faster builds</li>
                        <li class="flex gap-2"><span class="text-emerald-600">✓</span> UI design, QA and project management included</li>
                        <li class="flex gap-2"><span class="text-emerald-600">✓</span> You own all code and IP</li>
                    </ul>

                    <button type="button" id="cc-lead"
                            class="btn btn-accent btn-radius-pill w-full justify-center cursor-pointer">
                        Get an architect-reviewed estimate
                    </button>
                    <p class="text-center text-[11px] text-slate-500">
                        Free · Response within 24–48 hours · NDA on request
                    </p>
                </div>

                <p class="mt-3 px-2 text-[11px] leading-relaxed text-slate-400">
                    Ranges are indicative, based on QalbIT delivery data and 2026 market rates. Final quotes
                    follow a short discovery call and depend on exact scope and integrations.
                </p>
            </aside>
        </div>
    </div>
</section>

<!-- Benchmarks -->
<section class="bg-slate-50 py-14 sm:py-16" aria-labelledby="cc-benchmarks-heading">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 space-y-8">
        <header class="max-w-3xl space-y-3">
            <h2 id="cc-benchmarks-heading" class="text-display-sm font-bold text-slate-900">
                Software development cost benchmarks for 2026
            </h2>
            <p class="text-slate-600">
                Typical first-release ranges when working with QalbIT’s India-based senior team. US and
                Western European agencies commonly quote 2–3× these figures for comparable scope.
            </p>
        </header>

        <div class="overflow-x-auto rounded-2xl border border-slate-200 bg-white">
            <table class="w-full min-w-[640px] text-left text-sm">
                <thead>
                    <tr class="border-b border-slate-200 bg-slate-50 text-[12px] uppercase tracking-wide text-slate-500">
                        <th class="px-5 py-3 font-semibold">Project type</th>
                        <th class="px-5 py-3 font-semibold">Typical range (USD)</th>
                        <th class="px-5 py-3 font-semibold">Timeline</th>
                        <th class="px-5 py-3 font-semibold">Details</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-700">
                    <tr>
                        <td class="px-5 py-3.5 font-semibold text-slate-900">Startup MVP</td>
                        <td class="px-5 py-3.5">$6,500 – $20,000</td>
                        <td class="px-5 py-3.5">6–10 weeks</td>
                        <td class="px-5 py-3.5"><a href="<?= route_url('/services/mvp-development/') ?>" class="font-medium text-primary-700 hover:underline">MVP development →</a></td>
                    </tr>
                    <tr>
                        <td class="px-5 py-3.5 font-semibold text-slate-900">Custom business software</td>
                        <td class="px-5 py-3.5">$10,000 – $36,000</td>
                        <td class="px-5 py-3.5">9–14 weeks</td>
                        <td class="px-5 py-3.5"><a href="<?= route_url('/services/custom-software-development/') ?>" class="font-medium text-primary-700 hover:underline">Custom software →</a></td>
                    </tr>
                    <tr>
                        <td class="px-5 py-3.5 font-semibold text-slate-900">Custom CRM</td>
                        <td class="px-5 py-3.5">$12,500 – $44,000</td>
                        <td class="px-5 py-3.5">9–14 weeks</td>
                        <td class="px-5 py-3.5"><a href="<?= route_url('/services/crm-development/') ?>" class="font-medium text-primary-700 hover:underline">CRM development →</a></td>
                    </tr>
                    <tr>
                        <td class="px-5 py-3.5 font-semibold text-slate-900">Custom ERP (phase one)</td>
                        <td class="px-5 py-3.5">$20,000 – $75,000</td>
                        <td class="px-5 py-3.5">12–22 weeks</td>
                        <td class="px-5 py-3.5"><a href="<?= route_url('/services/erp-development/') ?>" class="font-medium text-primary-700 hover:underline">ERP development →</a></td>
                    </tr>
                    <tr>
                        <td class="px-5 py-3.5 font-semibold text-slate-900">SaaS product</td>
                        <td class="px-5 py-3.5">$16,000 – $60,000</td>
                        <td class="px-5 py-3.5">10–18 weeks</td>
                        <td class="px-5 py-3.5"><a href="<?= route_url('/services/saas/') ?>" class="font-medium text-primary-700 hover:underline">SaaS development →</a></td>
                    </tr>
                    <tr>
                        <td class="px-5 py-3.5 font-semibold text-slate-900">E-commerce platform</td>
                        <td class="px-5 py-3.5">$8,500 – $32,000</td>
                        <td class="px-5 py-3.5">7–12 weeks</td>
                        <td class="px-5 py-3.5"><a href="<?= route_url('/services/e-commerce/') ?>" class="font-medium text-primary-700 hover:underline">E-commerce →</a></td>
                    </tr>
                    <tr>
                        <td class="px-5 py-3.5 font-semibold text-slate-900">Mobile app</td>
                        <td class="px-5 py-3.5">$10,000 – $36,000</td>
                        <td class="px-5 py-3.5">9–14 weeks</td>
                        <td class="px-5 py-3.5"><a href="<?= route_url('/services/mobile-development/') ?>" class="font-medium text-primary-700 hover:underline">Mobile development →</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- What drives cost -->
<section class="bg-white py-14 sm:py-16">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 grid gap-8 lg:grid-cols-3">
        <div class="space-y-2">
            <h2 class="text-base font-bold text-slate-900">What affects software development cost most</h2>
            <p class="text-[13px] leading-relaxed text-slate-600">
                Scope beats everything: the number of user roles, screens and workflows drives 60–70% of
                any quote. Integrations come second — every external system (ERP, Tally, payment gateways,
                telephony) adds design, build and testing time. Platform count and custom design round out
                the big four.
            </p>
        </div>
        <div class="space-y-2">
            <h2 class="text-base font-bold text-slate-900">Why our 2026 rates are lower than you expect</h2>
            <p class="text-[13px] leading-relaxed text-slate-600">
                Two compounding advantages: senior engineers in India cost a fraction of US/UK/GCC salaries
                without a quality gap — and our teams work with AI-assisted development tooling that cuts
                build time on boilerplate, tests and integrations by roughly 20%. Those savings are passed
                through in these estimates, while discovery, architecture and QA keep their human hours.
            </p>
        </div>
        <div class="space-y-2">
            <h2 class="text-base font-bold text-slate-900">How to keep your budget under control</h2>
            <p class="text-[13px] leading-relaxed text-slate-600">
                Phase the build: launch a lean first release around the core journey, then extend with real
                user feedback. Fixed-scope phases with agreed budgets — the way QalbIT structures projects —
                prevent the open-ended hourly drift that inflates most software budgets.
            </p>
        </div>
    </div>
</section>

<?php if (!empty($faqs)): ?>
    <?php
        $title    = 'Software development cost – frequently asked questions';
        $subtitle = 'Honest answers about pricing, what drives costs up or down, and how to budget your project in 2026.';
        $bullets  = [
            '✓ Realistic 2026 ranges for MVP, CRM, ERP, SaaS, web and mobile projects.',
            '✓ How fixed-scope phases keep budgets predictable.',
            '✓ Written for founders, owners and managers planning a build.',
        ];
        include __DIR__ . '/../../partials/faq/section.php';
    ?>
<?php endif; ?>

<?php
// Lead capture – standard contact CTA with form
$errors   = $errors  ?? [];
$old      = $old     ?? [];
$success  = $success ?? null;
$leadFrom = 'lead_cost_calculator';

include __DIR__ . '/../../partials/contact/cta-section.php';
?>

<script>
(function () {
    'use strict';

    // ---- Pricing model (USD; standard complexity, web platform baselines) ----
    // Rates reflect AI-accelerated delivery: senior engineers working with
    // AI-assisted tooling, cutting build time ~20% vs traditional estimates.
    var BASE = {
        mvp:       { cost: [6500, 12500],  weeks: [6, 10],  label: 'Startup MVP' },
        custom:    { cost: [10000, 20000], weeks: [9, 14],  label: 'Custom business software' },
        crm:       { cost: [12500, 25000], weeks: [9, 14],  label: 'CRM system' },
        erp:       { cost: [20000, 42000], weeks: [12, 22], label: 'ERP system' },
        saas:      { cost: [16000, 33000], weeks: [10, 18], label: 'SaaS product' },
        ecommerce: { cost: [8500, 18000],  weeks: [7, 12],  label: 'E-commerce' },
        mobile:    { cost: [10000, 20000], weeks: [9, 14],  label: 'Mobile app' }
    };
    var SIZE     = { lean: 0.6, standard: 1, complex: 1.9 };
    var SIZE_W   = { lean: 0.7, standard: 1, complex: 1.5 };
    var PLATFORM = { web: 1, mobile: 1.05, both: 1.4 };
    var PLAT_W   = { web: 1, mobile: 1.05, both: 1.25 };
    var FEATURE  = { payments: 0.08, dashboards: 0.08, integrations: 0.10, realtime: 0.10, ai: 0.12, multilang: 0.05 };
    var DESIGN   = { standard: 0, custom: 0.12 };

    var LABELS = {
        platform: { web: 'Web application', mobile: 'Mobile app (iOS + Android)', both: 'Web + Mobile' },
        size:     { lean: 'Lean first release', standard: 'Standard first release', complex: 'Complex / enterprise' },
        design:   { standard: 'Clean & professional design', custom: 'Fully custom UX' },
        feature:  { payments: 'Payments/subscriptions', dashboards: 'Dashboards & reporting', integrations: 'Third-party integrations', realtime: 'Real-time features', ai: 'AI features', multilang: 'Multi-language/RTL' }
    };

    function val(name) {
        var el = document.querySelector('input[name="' + name + '"]:checked');
        return el ? el.value : null;
    }
    function feats() {
        return Array.prototype.map.call(
            document.querySelectorAll('input[name="cc-feature"]:checked'),
            function (el) { return el.value; }
        );
    }
    function round500(n) { return Math.round(n / 500) * 500; }
    function money(n) { return '$' + n.toLocaleString('en-US'); }

    function estimate() {
        var type = val('cc-type') || 'mvp';
        var platform = val('cc-platform') || 'web';
        var size = val('cc-size') || 'standard';
        var design = val('cc-design') || 'standard';
        var selected = feats();

        var featurePct = selected.reduce(function (sum, f) { return sum + (FEATURE[f] || 0); }, 0);
        var multiplier = SIZE[size] * PLATFORM[platform] * (1 + featurePct + DESIGN[design]);

        var base = BASE[type];
        var lo = round500(base.cost[0] * multiplier);
        var hi = round500(base.cost[1] * multiplier);

        var extraWeeks = Math.ceil(selected.length / 2) + (design === 'custom' ? 1 : 0);
        var wLo = Math.max(4, Math.round(base.weeks[0] * SIZE_W[size] * PLAT_W[platform]) + extraWeeks);
        var wHi = Math.round(base.weeks[1] * SIZE_W[size] * PLAT_W[platform]) + extraWeeks;

        document.getElementById('cc-cost').textContent  = money(lo) + ' – ' + money(hi);
        document.getElementById('cc-weeks').textContent = wLo + '–' + wHi + ' weeks';

        return { type: type, platform: platform, size: size, design: design, features: selected, lo: lo, hi: hi, wLo: wLo, wHi: wHi };
    }

    document.getElementById('cc-form').addEventListener('change', estimate);
    estimate();

    // ---- Lead handoff: prefill the contact form with the estimate summary ----
    document.getElementById('cc-lead').addEventListener('click', function () {
        var e = estimate();
        var featureText = e.features.length
            ? e.features.map(function (f) { return LABELS.feature[f]; }).join(', ')
            : 'Core features only';

        var summary =
            'Cost calculator estimate request\n' +
            '--------------------------------\n' +
            'Project: ' + BASE[e.type].label + '\n' +
            'Platforms: ' + LABELS.platform[e.platform] + '\n' +
            'Size: ' + LABELS.size[e.size] + '\n' +
            'Features: ' + featureText + '\n' +
            'Design: ' + LABELS.design[e.design] + '\n' +
            'Calculator estimate: ' + money(e.lo) + ' – ' + money(e.hi) + ' · ' + e.wLo + '–' + e.wHi + ' weeks\n\n' +
            'Please review my requirements and send a detailed estimate.';

        var msg = document.getElementById('contact-message');
        if (msg) {
            msg.value = summary;
            msg.dispatchEvent(new Event('input', { bubbles: true }));
        }

        var target = document.getElementById('section-contact-cta');
        if (target) {
            target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            var name = document.getElementById('contact-name');
            if (name) { setTimeout(function () { name.focus(); }, 600); }
        }
    });
})();
</script>
