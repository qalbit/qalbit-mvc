<?php
// Expected: $roles = enabled hire roles from config/hire.php
?>

<section class="py-16">
    <div class="max-w-6xl mx-auto px-4 space-y-8">
        <header class="space-y-3 max-w-3xl">
            <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">
                Hire Developers
            </p>
            <h1 class="text-3xl md:text-4xl font-semibold">
                Hire Dedicated Developers from QalbIT
            </h1>
            <p class="text-slate-600">
                Extend your team with dedicated backend and full-stack engineers who understand product, delivery
                and long-term maintainability. Start with a single developer or a small focused team.
            </p>
        </header>

        <?php if (!empty($roles)): ?>
            <div class="grid gap-6 md:grid-cols-2">
                <?php foreach ($roles as $role): ?>
                    <article class="flex h-full flex-col rounded-xl border bg-white p-5 shadow-sm">
                        <div class="flex-1 space-y-2">
                            <h2 class="text-sm font-semibold text-slate-800">
                                <a
                                    href="<?= htmlspecialchars($role['slug']) ?>"
                                    class="hover:text-slate-900 hover:underline"
                                >
                                    <?= htmlspecialchars($role['name']) ?>
                                </a>
                            </h2>

                            <?php if (!empty($role['short_description'])): ?>
                                <p class="text-xs text-slate-600">
                                    <?= htmlspecialchars($role['short_description']) ?>
                                </p>
                            <?php endif; ?>
                        </div>

                        <div class="mt-4 flex items-center justify-between text-xs">
                            <a
                                href="<?= htmlspecialchars($role['slug']) ?>"
                                class="inline-flex items-center font-medium text-slate-900 hover:underline"
                            >
                                View profile
                                <span class="ml-1 text-[10px]">→</span>
                            </a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="text-sm text-slate-600">
                We are updating our dedicated developer offerings. In the meantime, please
                <a href="/contact-us/" class="text-slate-900 underline">contact us</a> with your tech stack and hiring needs.
            </p>
        <?php endif; ?>
    </div>
</section>
