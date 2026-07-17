<?php
/**
 * Related links band – contextual internal links, card-based.
 *
 * Expects:
 *   $relatedGroups = [
 *       [
 *           'title'       => 'Plan your project',
 *           'description' => 'optional one-line group intro',
 *           'accent'      => false,   // optional: highlight an editorial/featured group
 *           'links' => [
 *               ['label' => '...', 'href' => '/path/', 'title' => 'optional', 'desc' => 'optional one-liner'],
 *           ],
 *       ],
 *   ]
 *
 * Layout adapts to the number of groups so 2- and 3-group pages both stay balanced.
 */

$relatedGroups = array_values(array_filter($relatedGroups ?? [], static function ($g) {
    return !empty($g['links']);
}));
$groupCount = count($relatedGroups);

$gridCols = 'sm:grid-cols-2';
if ($groupCount >= 3)  { $gridCols = 'sm:grid-cols-2 lg:grid-cols-3'; }
if ($groupCount === 4) { $gridCols = 'sm:grid-cols-2 lg:grid-cols-4'; }
?>

<?php if (!empty($relatedGroups)): ?>
    <section
        aria-label="Related resources"
        class="border-t border-slate-200/70 bg-slate-50 py-14 sm:py-16"
    >
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">

            <div class="max-w-2xl">
                <span class="inline-flex items-center rounded-pill border border-slate-200 bg-white px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-slate-500 shadow-soft">
                    Keep exploring
                    <span class="ml-2 h-1 w-1 rounded-full bg-sky-400"></span>
                </span>
                <h2 class="mt-4 text-display-sm font-bold text-slate-900">
                    Related resources &amp; guides
                </h2>
                <p class="mt-2 text-sm text-slate-600">
                    Estimate your build, compare your options, and see how we deliver.
                </p>
            </div>

            <div class="mt-8 grid gap-4 <?= $gridCols ?>">
                <?php foreach ($relatedGroups as $group): ?>
                    <?php
                        $isAccent = !empty($group['accent']);
                        $cardClass = $isAccent
                            ? 'group/card relative flex flex-col rounded-2xl border border-sky-200 bg-gradient-to-b from-sky-50/70 to-white p-6 shadow-soft ring-1 ring-sky-100/70'
                            : 'group/card relative flex flex-col rounded-2xl border border-slate-200 bg-white p-6 shadow-soft transition-colors hover:border-slate-300';
                        $barClass   = $isAccent ? 'bg-sky-500' : 'bg-slate-300';
                        $titleClass = $isAccent ? 'text-sky-700' : 'text-slate-500';
                    ?>
                    <div class="<?= $cardClass ?>">
                        <div class="flex items-center gap-2.5">
                            <span class="h-4 w-1 flex-none rounded-full <?= $barClass ?>" aria-hidden="true"></span>
                            <h3 class="text-xs font-semibold uppercase tracking-[0.16em] <?= $titleClass ?>">
                                <?= htmlspecialchars($group['title'] ?? '') ?>
                            </h3>
                        </div>

                        <?php if (!empty($group['description'])): ?>
                            <p class="mt-2 text-xs text-slate-500">
                                <?= htmlspecialchars($group['description']) ?>
                            </p>
                        <?php endif; ?>

                        <ul class="mt-3 -mx-2 divide-y divide-slate-100">
                            <?php foreach ($group['links'] ?? [] as $link): ?>
                                <li>
                                    <a
                                        href="<?= route_url($link['href'] ?? '/') ?>"
                                        <?php if (!empty($link['title'])): ?>title="<?= htmlspecialchars($link['title']) ?>"<?php endif; ?>
                                        class="group/link flex items-center gap-3 rounded-lg px-2 py-3 transition-colors hover:bg-white/70 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-sky-500/60"
                                    >
                                        <?php if (!empty($link['img'])): ?>
                                            <span class="relative block aspect-video w-24 flex-none overflow-hidden rounded-lg border border-slate-200 bg-slate-100">
                                                <img
                                                    src="<?= htmlspecialchars($link['img']) ?>"
                                                    alt=""
                                                    width="96" height="54"
                                                    loading="lazy" decoding="async"
                                                    class="h-full w-full object-cover transition-transform duration-300 group-hover/link:scale-105"
                                                />
                                            </span>
                                        <?php endif; ?>
                                        <span class="min-w-0 flex-1">
                                            <span class="block text-sm font-medium text-slate-800 transition-colors group-hover/link:text-sky-700">
                                                <?= htmlspecialchars($link['label'] ?? '') ?>
                                            </span>
                                            <?php if (!empty($link['desc'])): ?>
                                                <span class="mt-0.5 block text-xs leading-snug text-slate-500">
                                                    <?= htmlspecialchars($link['desc']) ?>
                                                </span>
                                            <?php endif; ?>
                                        </span>
                                        <svg
                                            class="h-4 w-4 flex-none text-slate-300 transition-all duration-200 group-hover/link:translate-x-0.5 group-hover/link:text-sky-500"
                                            viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"
                                        >
                                            <path d="M7 4l6 6-6 6" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </section>
<?php endif; ?>
