<?php
// Expected: $caseStudies = enabled case studies from config/case_studies.php
?>

<section class="py-16">
    <div class="max-w-6xl mx-auto px-4 space-y-8">
        <header class="space-y-3 max-w-3xl">
            <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">
                Case Studies
            </p>
            <h1 class="text-3xl md:text-4xl font-semibold">
                Selected Projects & Case Studies
            </h1>
            <p class="text-slate-600 text-sm">
                A sample of projects delivered by QalbIT across SaaS, custom software and digital products.
                These snapshots show how we think about architecture, delivery and long-term maintainability.
            </p>
        </header>

        <?php if (!empty($caseStudies)): ?>
            <div class="grid gap-6 md:grid-cols-3">
                <?php foreach ($caseStudies as $cs): ?>
                    <article class="flex h-full flex-col rounded-xl border bg-white p-5 shadow-sm">
                        <div class="flex-1 space-y-2">
                            <h2 class="text-sm font-semibold text-slate-800">
                                <a
                                    href="<?= htmlspecialchars($cs['slug']) ?>"
                                    class="hover:text-slate-900 hover:underline"
                                >
                                    <?= htmlspecialchars($cs['name']) ?>
                                </a>
                            </h2>

                            <?php if (!empty($cs['summary'])): ?>
                                <p class="text-xs text-slate-600">
                                    <?= htmlspecialchars($cs['summary']) ?>
                                </p>
                            <?php endif; ?>

                            <dl class="mt-2 space-y-1 text-[11px] text-slate-500">
                                <?php if (!empty($cs['industry'])): ?>
                                    <div class="flex gap-1">
                                        <dt class="font-medium">Industry:</dt>
                                        <dd><?= htmlspecialchars($cs['industry']) ?></dd>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($cs['services'])): ?>
                                    <div class="flex gap-1">
                                        <dt class="font-medium">Services:</dt>
                                        <dd><?= htmlspecialchars(implode(', ', $cs['services'])) ?></dd>
                                    </div>
                                <?php endif; ?>
                            </dl>
                        </div>

                        <div class="mt-4">
                            <a
                                href="<?= htmlspecialchars($cs['slug']) ?>"
                                class="inline-flex items-center text-xs font-medium text-slate-900 hover:underline"
                            >
                                View case study
                                <span class="ml-1 text-[10px]">→</span>
                            </a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="text-sm text-slate-600">
                We are curating case studies for this section. In the meantime, please
                <a href="/contact-us/" class="text-slate-900 underline">contact us</a> for examples relevant to your use case.
            </p>
        <?php endif; ?>
    </div>
</section>
