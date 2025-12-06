<?php
/**
 * @var array $locations
 * @var array $channels
 */
?>

<section class="space-y-8">
    <!-- Locations / offices -->
    <?php if (!empty($locations)): ?>
        <div class="space-y-3">
            <h2 class="text-sm font-semibold text-slate-900">
                Our offices & primary locations
            </h2>
            <div class="grid gap-4 md:grid-cols-2">
                <?php foreach ($locations as $location): ?>
                    <?php
                    $label   = $location['label'] ?? '';
                    $company = $location['company'] ?? '';
                    $address = $location['address'] ?? [];
                    $phone   = $location['phone'] ?? null;
                    $email   = $location['email'] ?? null;
                    $hours   = $location['hours'] ?? null;
                    ?>
                    <div class="rounded-xl border bg-white p-4 text-xs text-slate-700 shadow-sm">
                        <?php if ($label): ?>
                            <p class="text-[11px] font-semibold uppercase tracking-wide text-slate-500">
                                <?= htmlspecialchars($label) ?>
                            </p>
                        <?php endif; ?>

                        <?php if ($company): ?>
                            <p class="mt-1 text-sm font-semibold text-slate-900">
                                <?= htmlspecialchars($company) ?>
                            </p>
                        <?php endif; ?>

                        <?php if (!empty($address)): ?>
                            <p class="mt-1 whitespace-pre-line text-xs text-slate-700">
                                <?= htmlspecialchars(implode("\n", $address)) ?>
                            </p>
                        <?php endif; ?>

                        <div class="mt-2 space-y-1 text-xs text-slate-700">
                            <?php if ($phone): ?>
                                <p>
                                    <span class="font-medium">Phone:</span>
                                    <a href="tel:<?= htmlspecialchars($phone) ?>" class="hover:underline">
                                        <?= htmlspecialchars($phone) ?>
                                    </a>
                                </p>
                            <?php endif; ?>

                            <?php if ($email): ?>
                                <p>
                                    <span class="font-medium">Email:</span>
                                    <a href="mailto:<?= htmlspecialchars($email) ?>" class="hover:underline">
                                        <?= htmlspecialchars($email) ?>
                                    </a>
                                </p>
                            <?php endif; ?>

                            <?php if ($hours): ?>
                                <p>
                                    <span class="font-medium">Hours:</span>
                                    <?= htmlspecialchars($hours) ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

    <!-- Contact channels -->
    <?php if (!empty($channels)): ?>
        <div class="space-y-3">
            <h2 class="text-sm font-semibold text-slate-900">
                Direct contacts by topic
            </h2>
            <div class="grid gap-4 md:grid-cols-2">
                <?php foreach ($channels as $channel): ?>
                    <?php
                    $label   = $channel['label'] ?? '';
                    $summary = $channel['summary'] ?? '';
                    $email   = $channel['email'] ?? null;
                    $phone   = $channel['phone'] ?? null;
                    $cta     = $channel['cta'] ?? null;
                    ?>
                    <div class="rounded-xl border bg-slate-50 p-4 text-xs text-slate-700">
                        <?php if ($label): ?>
                            <p class="text-[11px] font-semibold uppercase tracking-wide text-slate-500">
                                <?= htmlspecialchars($label) ?>
                            </p>
                        <?php endif; ?>

                        <?php if ($summary): ?>
                            <p class="mt-1 text-xs text-slate-700">
                                <?= htmlspecialchars($summary) ?>
                            </p>
                        <?php endif; ?>

                        <div class="mt-2 space-y-1">
                            <?php if ($email): ?>
                                <p>
                                    <span class="font-medium">Email:</span>
                                    <a href="mailto:<?= htmlspecialchars($email) ?>" class="hover:underline">
                                        <?= htmlspecialchars($email) ?>
                                    </a>
                                </p>
                            <?php endif; ?>

                            <?php if ($phone): ?>
                                <p>
                                    <span class="font-medium">Phone:</span>
                                    <a href="tel:<?= htmlspecialchars($phone) ?>" class="hover:underline">
                                        <?= htmlspecialchars($phone) ?>
                                    </a>
                                </p>
                            <?php endif; ?>
                        </div>

                        <?php if ($cta): ?>
                            <p class="mt-2 text-[11px] text-slate-500">
                                <?= htmlspecialchars($cta) ?>
                            </p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
</section>
