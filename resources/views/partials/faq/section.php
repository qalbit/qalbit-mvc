<?php
/**
 * Shared FAQ section.
 *
 * Rendered by 16 templates (services, hire, geo, industries, technologies,
 * process, home, about, contact, careers, portfolio, tools). Every variable
 * below is optional and falls back to the long-standing default, so callers
 * that pass nothing keep their existing output byte-for-byte.
 *
 * @var array|null  $faqs        // expected: config('faqs.<context>')
 * @var string|null $title
 * @var string|null $subtitle
 * @var array|null  $bullets       // per-page supporting points
 * @var string|null $faqEyebrow    // per-page pill label above the heading
 * @var string|null $faqSectionId  // per-page DOM id / aria target
 * @var array|null  $faqCta        // ['title' =>, 'body' =>, 'label' =>, 'href' =>, 'aria' =>]
 *
 * The new overrides are deliberately prefixed `faq*`. Callers include this
 * partial with `include`, which shares one variable scope, and the service
 * partials rendered just before it already assign generic `$eyebrow` and
 * `$sectionId`. Unprefixed names would silently inherit those values.
 *
 * Markup note: each item is a native <details>/<summary>. Answers are in the
 * DOM on first paint and the accordion works with JavaScript disabled or
 * failed; main.js only layers animation and single-open behaviour on top.
 */

if (empty($faqs) || !is_array($faqs)) {
    return;
}

$title    = $title ?? 'Frequently asked questions about working with QalbIT';
$subtitle = $subtitle
    ?? 'Short, practical answers to common questions about custom software development, timelines, costs, quality, IP ownership and security.';

$bullets = $bullets ?? [
    '✓ Covers custom software development, SaaS platforms, mobile apps and integrations.',
    '✓ Answers about pricing, engagement models, NDAs, IP ownership and quality assurance.',
    '✓ Written for founders, CTOs and product teams hiring a remote development partner.'
];

$faqEyebrow   = $faqEyebrow   ?? 'FAQs · Custom software & teams';
$faqSectionId = $faqSectionId ?? 'home-faqs';

$faqCta = ($faqCta ?? []) + [
    'title' => 'Have a question that is not listed here?',
    'body'  => 'Share your roadmap or idea and we’ll help you pick the right engagement model, tech stack and starting point.',
    'label' => 'Contact our experts',
    'href'  => '/contact-us/',
    'aria'  => 'Talk to QalbIT about your custom software requirements',
];

$faqHeadingId = $faqSectionId . '-heading';
?>

<section
    id="<?= htmlspecialchars($faqSectionId, ENT_QUOTES) ?>"
    class="py-16 bg-slate-50 text-foreground"
    aria-labelledby="<?= htmlspecialchars($faqHeadingId, ENT_QUOTES) ?>"
    data-faq-section
>
    <div class="mx-auto max-w-6xl px-4">
        <div class="grid gap-10 lg:grid-cols-[minmax(0,1.05fr)_minmax(0,1.6fr)] lg:items-start">
            <!-- LEFT: Heading + context + CTA -->
            <header class="space-y-4 max-w-xl" data-faq-header>
                <?php if (!empty($faqEyebrow)): ?>
                    <span class="inline-flex items-center rounded-full border border-slate-200 bg-white/90 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-muted-foreground shadow-soft">
                        <?= htmlspecialchars($faqEyebrow) ?>
                    </span>
                <?php endif; ?>

                <h2
                    id="<?= htmlspecialchars($faqHeadingId, ENT_QUOTES) ?>"
                    class="text-display-sm sm:text-display-md font-bold tracking-tight"
                >
                    <?= htmlspecialchars($title) ?>
                </h2>

                <p class="text-sm md:text-base text-muted-foreground">
                    <?= htmlspecialchars($subtitle) ?>
                </p>

                <?php if (!empty($bullets)): ?>
                    <ul class="mt-4 space-y-2 text-xs md:text-sm text-muted-foreground/95">
                        <?php foreach($bullets as $bullet): ?>
                            <li><?= htmlspecialchars($bullet); ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <div class="mt-6 rounded-2xl border border-slate-200 bg-white/90 p-4 shadow-soft text-xs md:text-sm faq-cta-card">
                    <p class="font-semibold text-foreground mb-1">
                        <?= htmlspecialchars($faqCta['title']) ?>
                    </p>
                    <p class="text-muted-foreground mb-3">
                        <?= htmlspecialchars($faqCta['body']) ?>
                    </p>
                    <a
                        href="<?= route_url($faqCta['href']) ?>"
                        class="inline-flex items-center gap-2 text-xs font-semibold text-primary-700 hover:text-primary-900"
                        title="<?= htmlspecialchars($faqCta['aria'], ENT_QUOTES) ?>"
                        aria-label="<?= htmlspecialchars($faqCta['aria'], ENT_QUOTES) ?>"
                    >
                        <?= htmlspecialchars($faqCta['label']) ?>
                        <span aria-hidden="true">→</span>
                    </a>
                </div>
            </header>

            <!-- RIGHT: Accordion list – native <details>, answers always in the DOM -->
            <div data-faq-list class="space-y-3">
                <?php foreach ($faqs as $index => $faq): ?>
                    <?php
                    $question   = $faq['question'] ?? '';
                    $answer     = $faq['answer']   ?? '';
                    $answerHtml = $faq['answer_html'] ?? null;

                    if ($question === '' || ($answer === '' && $answerHtml === null)) {
                        continue;
                    }

                    $faqId   = 'faq-' . ($index + 1);
                    $panelId = 'faq-panel-' . $faqId;
                    $isFirst = $index === 0;
                    ?>
                    <details
                        class="faq-item"
                        data-faq-item
                        data-faq-id="<?= htmlspecialchars($faqId) ?>"
                        <?= $isFirst ? 'open' : '' ?>
                    >
                        <summary
                            class="faq-trigger"
                            data-faq-trigger
                            data-faq-target="<?= htmlspecialchars($faqId) ?>"
                        >
                            <h3 class="faq-trigger-label">
                                <?= htmlspecialchars($question) ?>
                            </h3>
                            <span class="faq-trigger-icon" aria-hidden="true"></span>
                        </summary>

                        <div
                            id="<?= $panelId ?>"
                            class="faq-panel"
                            data-faq-panel
                            data-faq-id="<?= htmlspecialchars($faqId) ?>"
                        >
                           <div class="faq-panel-inner">
                                <?php if ($answerHtml !== null): ?>
                                    <?= $answerHtml ?>
                                <?php else: ?>
                                    <p><?= nl2br(htmlspecialchars($answer)) ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </details>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
