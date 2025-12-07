<?php
/**
 * Home – FAQs Section
 *
 * @var array|null  $faqs     // expected: config('faqs.<context>')
 * @var string|null $title
 * @var string|null $subtitle
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
?>

<section
    id="home-faqs"
    class="py-16 bg-slate-50 text-foreground"
    aria-labelledby="home-faqs-heading"
    data-faq-section
    itemscope
    itemtype="https://schema.org/FAQPage"
>
    <div class="mx-auto max-w-6xl px-4">
        <div class="grid gap-10 lg:grid-cols-[minmax(0,1.05fr)_minmax(0,1.6fr)] lg:items-start">
            <!-- LEFT: Heading + context + CTA -->
            <header class="space-y-4 max-w-xl" data-faq-header>
                <span class="inline-flex items-center rounded-full border border-slate-200 bg-white/90 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-muted-foreground shadow-soft">
                    FAQs · Custom software & teams
                </span>

                <h2
                    id="home-faqs-heading"
                    class="text-display-sm sm:text-display-md font-bold tracking-tight"
                    itemprop="name"
                >
                    <?= htmlspecialchars($title) ?>
                </h2>

                <p class="text-sm md:text-base text-muted-foreground" itemprop="description">
                    <?= htmlspecialchars($subtitle) ?>
                </p>

                <ul class="mt-4 space-y-2 text-xs md:text-sm text-muted-foreground/95">
                    <?php foreach($bullets as $bullet): ?>
                        <li><?= htmlspecialchars($bullet); ?></li>
                    <?php endforeach; ?>
                </ul>

                <div class="mt-6 rounded-2xl border border-slate-200 bg-white/90 p-4 shadow-soft text-xs md:text-sm faq-cta-card">
                    <p class="font-semibold text-foreground mb-1">
                        Have a question that is not listed here?
                    </p>
                    <p class="text-muted-foreground mb-3">
                        Share your roadmap or idea and we’ll help you pick the right engagement model, tech stack and starting point.
                    </p>
                    <a
                        href="<?= route_url('/contact-us/') ?>"
                        class="inline-flex items-center gap-2 text-xs font-semibold text-primary-700 hover:text-primary-900"
                        title="Talk to QalbIT about your custom software requirements"
                        aria-label="Talk to QalbIT about your custom software requirements"
                    >
                        Contact our experts
                        <span aria-hidden="true">→</span>
                    </a>
                </div>
            </header>

            <!-- RIGHT: Accordion list -->
            <div data-faq-list class="space-y-3">
                <?php foreach ($faqs as $index => $faq): ?>
                    <?php
                    $question   = $faq['question'] ?? '';
                    $answer     = $faq['answer']   ?? '';
                    $answerHtml = $faq['answer_html'] ?? null;

                    if ($question === '' || ($answer === '' && $answerHtml === null)) {
                        continue;
                    }

                    $faqId    = 'faq-' . ($index + 1);
                    $buttonId = 'faq-trigger-' . $faqId;
                    $panelId  = 'faq-panel-' . $faqId;
                    $isFirst  = $index === 0;
                    ?>
                    <article
                        class="faq-item"
                        data-faq-item
                        data-faq-id="<?= htmlspecialchars($faqId) ?>"
                        itemscope
                        itemprop="mainEntity"
                        itemtype="https://schema.org/Question"
                    >
                        <h3 class="sr-only"><?= htmlspecialchars($question) ?></h3>

                        <button
                            type="button"
                            class="faq-trigger"
                            id="<?= $buttonId ?>"
                            aria-expanded="<?= $isFirst ? 'true' : 'false' ?>"
                            aria-controls="<?= $panelId ?>"
                            data-faq-trigger
                            data-faq-target="<?= htmlspecialchars($faqId) ?>"
                        >
                            <span class="faq-trigger-label" itemprop="name">
                                <?= htmlspecialchars($question) ?>
                            </span>
                            <span class="faq-trigger-icon" aria-hidden="true"></span>
                        </button>

                        <div
                            id="<?= $panelId ?>"
                            class="faq-panel<?= $isFirst ? ' is-open' : '' ?>"
                            data-faq-panel
                            data-faq-id="<?= htmlspecialchars($faqId) ?>"
                            role="region"
                            aria-labelledby="<?= $buttonId ?>"
                            <?= $isFirst ? '' : 'hidden' ?>
                            itemscope
                            itemprop="acceptedAnswer"
                            itemtype="https://schema.org/Answer"
                        >
                           <div class="faq-panel-inner" itemprop="text">
                                <?php if ($answerHtml !== null): ?>
                                    <?= $answerHtml ?>
                                <?php else: ?>
                                    <p><?= nl2br(htmlspecialchars($answer)) ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
