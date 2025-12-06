<?php
/**
 * @var array $items
 * @var array $industriesMeta
 * @var array $technologiesMeta
 */
?>

<?php if (empty($items)): ?>
    <p class="text-sm text-slate-600">
        No projects match the selected filters yet. You can clear the filters or contact us to discuss similar work.
    </p>
<?php else: ?>
    <section class="space-y-4">
        <div class="grid gap-6 md:grid-cols-2">
            <?php foreach ($items as $item): ?>
                <?php
                $name         = $item['name'] ?? '';
                $client       = $item['client'] ?? '';
                $summary      = $item['summary'] ?? '';
                $industries   = $item['industries'] ?? [];
                $technologies = $item['technologies'] ?? [];
                $caseUrl      = $item['case_study_url'] ?? null;
                $externalUrl  = $item['external_url'] ?? null;
                $thumbnail    = $item['thumbnail'] ?? null;
                $type         = $item['type'] ?? null;
                ?>
                <article class="flex h-full flex-col overflow-hidden rounded-xl border bg-white text-xs text-slate-700 shadow-sm">
                    <?php if ($thumbnail): ?>
                        <div class="h-40 w-full overflow-hidden bg-slate-100">
                            <img
                                src="<?= htmlspecialchars($thumbnail) ?>"
                                alt="<?= htmlspecialchars($name) ?>"
                                class="h-full w-full object-cover"
                                loading="lazy"
                            >
                        </div>
                    <?php endif; ?>

                    <div class="flex flex-1 flex-col gap-3 p-4">
                        <header class="space-y-1">
                            <p class="text-[10px] font-semibold uppercase tracking-wide text-slate-500">
                                <?= $type === 'product' ? 'Product' : 'Client project' ?>
                                <?php if ($client): ?>
                                    · <?= htmlspecialchars($client) ?>
                                <?php endif; ?>
                            </p>
                            <h2 class="text-base font-semibold text-slate-900">
                                <?= htmlspecialchars($name) ?>
                            </h2>
                        </header>

                        <?php if ($summary): ?>
                            <p class="text-sm text-slate-600">
                                <?= htmlspecialchars($summary) ?>
                            </p>
                        <?php endif; ?>

                        <?php if (!empty($industries) || !empty($technologies)): ?>
                            <div class="mt-1 flex flex-wrap gap-2 text-[10px]">
                                <?php foreach ($industries as $key): ?>
                                    <span class="rounded-full bg-slate-100 px-2 py-0.5 text-slate-700">
                                        <?= htmlspecialchars($industriesMeta[$key] ?? $key) ?>
                                    </span>
                                <?php endforeach; ?>

                                <?php foreach ($technologies as $key): ?>
                                    <span class="rounded-full border border-slate-200 px-2 py-0.5 text-slate-600">
                                        <?= htmlspecialchars($technologiesMeta[$key] ?? $key) ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <div class="mt-3 flex flex-wrap items-center gap-3 text-[11px] font-medium">
                            <?php if ($caseUrl): ?>
                                <a href="<?= htmlspecialchars($caseUrl) ?>" class="inline-flex items-center hover:underline">
                                    View case study
                                    <span class="ml-1 text-[10px]">→</span>
                                </a>
                            <?php endif; ?>

                            <?php if ($externalUrl): ?>
                                <a
                                    href="<?= htmlspecialchars($externalUrl) ?>"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="inline-flex items-center text-sky-700 hover:underline"
                                >
                                    Open live project
                                    <span class="ml-1 text-[10px]">↗</span>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
<?php endif; ?>
