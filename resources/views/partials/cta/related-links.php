<?php
/**
 * Related links band – compact contextual internal links.
 *
 * Expects:
 *   $relatedGroups = [
 *       ['title' => 'Plan your project', 'links' => [
 *           ['label' => '...', 'href' => '/path/', 'title' => 'optional link title'],
 *       ]],
 *   ]
 */

$relatedGroups = $relatedGroups ?? [];
?>

<?php if (!empty($relatedGroups)): ?>
    <section
        aria-label="Related resources"
        class="border-t border-slate-100 bg-slate-50 py-10 sm:py-12"
    >
        <div class="mx-auto grid max-w-6xl gap-8 px-4 sm:grid-cols-2 sm:px-6 lg:px-8">
            <?php foreach ($relatedGroups as $group): ?>
                <div>
                    <h2 class="text-xs font-semibold uppercase tracking-[0.16em] text-slate-500">
                        <?= htmlspecialchars($group['title'] ?? '') ?>
                    </h2>
                    <ul class="mt-3 space-y-2">
                        <?php foreach ($group['links'] ?? [] as $link): ?>
                            <li>
                                <a
                                    href="<?= route_url($link['href'] ?? '/') ?>"
                                    <?php if (!empty($link['title'])): ?>title="<?= htmlspecialchars($link['title']) ?>"<?php endif; ?>
                                    class="inline-flex items-center text-sm font-medium text-slate-700 transition-colors hover:text-sky-700"
                                >
                                    <span class="mr-2 h-1 w-1 flex-none rounded-full bg-sky-500" aria-hidden="true"></span>
                                    <?= htmlspecialchars($link['label'] ?? '') ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
<?php endif; ?>
