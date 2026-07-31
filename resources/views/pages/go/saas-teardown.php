<?php

/**
 * /go/saas-product-development/ — cold-traffic lead capture for the free
 * "SaaS Teardown" offer.
 *
 * Expects: $page (config('landing.saas_teardown')), $errors, $old, $success.
 *
 * The form works without JavaScript: all three steps render at once and the
 * form posts normally to the same URL. go-teardown.js is what turns it into a
 * one-question-at-a-time flow. Nothing on this page invents a number — every
 * missing metric renders as a visible "client to supply" box.
 */

// View::render() extracts these; the fallbacks keep the file readable on its
// own and mean a caller that forgets one gets an empty page, not a fatal.
$page    = $page    ?? config('landing.saas_teardown', []);
$errors  = $errors  ?? [];
$old     = $old     ?? [];
$success = $success ?? null;

$formPath   = $page['path'];
$stages     = $page['stages'];
$budgets    = $page['budgets'];
$timelines  = $page['timelines'];
$bookingUrl = $page['booking_url'];
$pricingUrl = $page['pricing_url'];
$senderMail = $page['sender_email'];
$replyMail  = $page['reply_email'];

/** Escape a previously submitted value for re-display. */
$oldValue = static function (string $key) use ($old): string {
    return htmlspecialchars((string) ($old[$key] ?? ''), ENT_QUOTES);
};

/** Was this field selected on the last (failed) submit? */
$wasChosen = static function (string $key, string $value) use ($old): bool {
    return ($old[$key] ?? null) === $value;
};

$fieldError = static function (string $key) use ($errors): string {
    return isset($errors[$key]) ? htmlspecialchars((string) $errors[$key]) : '';
};

/*
 * `required` on the first radio of a group makes the whole group required to
 * the browser, which is what enforces these on the no-JS path. With JS the
 * script sets form.noValidate, so a hidden step's required field can never
 * block a submit the browser cannot show the visitor.
 */
$radioRequired = static function (int $index): string {
    return $index === 0 ? ' required aria-required="true"' : '';
};

$logoPath   = $page['logo'];
$photoPath  = $page['founder_photo'];
$logoFile   = __DIR__ . '/../../../../public/assets/' . ltrim($logoPath, '/');
$photoFile  = __DIR__ . '/../../../../public/assets/' . ltrim($photoPath, '/');
$hasLogo    = is_file($logoFile);
$hasPhoto   = is_file($photoFile);
?>

<a class="gt-skip-link" href="#main-content">Skip to content</a>

<!-- ==========================================================================
     1 — Header. Logo only: there is nowhere else to go from a landing page.
     ======================================================================= -->
<header class="gt-header">
    <div class="gt-container gt-header__inner">
        <?php if ($hasLogo): ?>
            <img class="gt-header__logo" src="<?= asset_v($logoPath) ?>" alt="QalbIT Infotech"
                width="132" height="32" fetchpriority="high">
        <?php else: ?>
            <?php /* PLACEHOLDER: QalbIT logo SVG → /public/assets/images/brand/qalbit-logo.svg
                     Until the file exists the wordmark renders as text, which is
                     correct-looking rather than a broken image. */ ?>
            <span class="gt-header__logo gt-h4">QalbIT</span>
        <?php endif; ?>
    </div>
</header>

<main id="main-content" tabindex="-1">

    <!-- ======================================================================
         2 — Hero + form
         =================================================================== -->
    <section class="gt-hero" aria-labelledby="gt-hero-title">
        <div class="gt-container gt-hero__inner">

            <div class="gt-hero__copy">
                <p class="gt-eyebrow">SAAS PRODUCT DEVELOPMENT</p>

                <h1 class="gt-h1 gt-hero__title" id="gt-hero-title">
                    Get a real build plan for your SaaS. In 48 hours. Free.
                </h1>

                <p class="gt-lead gt-hero__sub">
                    Send us your idea or your live product. You'll get back a recorded
                    walkthrough — the architecture we'd use, the modules that actually
                    matter for v1, a realistic timeline, and a price range. No call
                    needed to get it.
                </p>

                <p class="gt-hero__diff">
                    From a team that builds and runs four of its own SaaS products.
                </p>

            </div>

            <?php /* Its own grid item, not part of the copy block: on mobile it
                     reorders below the form so the form itself stays near the
                     fold. On desktop it sits back under the copy. */ ?>
            <div class="gt-byline">
                <?php if ($hasPhoto): ?>
                    <img class="gt-byline__photo" src="<?= asset_v($photoPath) ?>"
                        alt="Abid Chidi" width="44" height="44" loading="lazy" decoding="async">
                <?php else: ?>
                    <?php /* PLACEHOLDER: founder photo → /public/assets/images/team/abid-chidi.jpg
                             Space is reserved either way, so dropping the file in
                             causes no layout shift. */ ?>
                    <span class="gt-byline__photo" aria-hidden="true"></span>
                <?php endif; ?>
                <p class="gt-byline__text">
                    <strong>Abid Chidi — Founder, QalbIT Infotech</strong>
                    I record these myself.
                </p>
            </div>

            <!-- ---------------------------------------------------------------
                 Lead form. Three steps with JS, one long form without it.
                 ------------------------------------------------------------ -->
            <div class="gt-panel" id="lead-form" data-gt-panel>

                <?php if ($success): ?>
                    <?php /* No-JS success: the POST redirected back here with a flash. */ ?>
                    <div class="gt-success" role="status">
                        <span class="gt-success__mark" aria-hidden="true">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        </span>
                        <h2 class="gt-h3 gt-success__title" tabindex="-1">Got it. Check your inbox in 48 hours.</h2>
                        <p class="gt-body gt-success__body">
                            Your teardown will come from <?= htmlspecialchars($senderMail) ?> — it may land in
                            Promotions or spam, so keep an eye out.
                        </p>
                        <a class="gt-link gt-success__link" href="<?= htmlspecialchars($bookingUrl) ?>"
                            target="_blank" rel="noopener">Prefer to talk sooner? Book a call →</a>
                    </div>
                <?php else: ?>

                <div class="gt-panel__head">
                    <?php /* An h2 so the step headings below can be h3s — the form
                             sits inside the hero, which owns the only h1. */ ?>
                    <h2 class="gt-panel__title">Get your free teardown</h2>
                    <p class="gt-panel__note">Three quick questions. No phone number, no sales call.</p>
                    <p class="gt-eyebrow gt-panel__step" data-gt-step-label hidden>Step 1 of 3</p>
                    <ol class="gt-progress" data-gt-progress aria-hidden="true" hidden>
                        <li class="is-filled"></li>
                        <li></li>
                        <li></li>
                    </ol>
                </div>

                <form class="gt-form" method="post" action="<?= htmlspecialchars($formPath) ?>" data-gt-form>

                    <!-- Honeypot. Off-screen, untabbable, hidden from AT: a value
                         here means a bot, and the submission is dropped. -->
                    <div class="gt-honeypot" aria-hidden="true">
                        <label for="gt-website">Website</label>
                        <input type="text" id="gt-website" name="website" tabindex="-1" autocomplete="off">
                    </div>

                    <!-- Attribution. Filled by JS from the query string and
                         document.referrer; empty means empty, never guessed. -->
                    <input type="hidden" name="utm_source" value="" data-gt-utm="utm_source">
                    <input type="hidden" name="utm_medium" value="" data-gt-utm="utm_medium">
                    <input type="hidden" name="utm_campaign" value="" data-gt-utm="utm_campaign">
                    <input type="hidden" name="utm_content" value="" data-gt-utm="utm_content">
                    <input type="hidden" name="utm_term" value="" data-gt-utm="utm_term">
                    <input type="hidden" name="referrer" value="" data-gt-referrer>
                    <input type="hidden" name="redirect_to" value="<?= htmlspecialchars($formPath) ?>">

                    <?php if (!empty($errors['global'])): ?>
                        <p class="gt-form__alert"><?= htmlspecialchars($errors['global']) ?></p>
                    <?php endif; ?>

                    <!-- Step 1 — one click, no typing -->
                    <div class="gt-step" data-gt-step="1">
                        <fieldset class="gt-fieldset">
                            <legend class="gt-legend" tabindex="-1" data-gt-step-heading>Where is your SaaS today?</legend>
                            <div class="gt-choices" data-gt-choices>
                                <?php foreach (array_keys($stages) as $i => $value): $label = $stages[$value]; ?>
                                    <label class="gt-choice<?= $wasChosen('stage', $value) ? ' is-checked' : '' ?>">
                                        <input type="radio" name="stage" value="<?= htmlspecialchars($value) ?>"
                                            <?= $wasChosen('stage', $value) ? 'checked' : '' ?><?= $radioRequired($i) ?>
                                            aria-describedby="gt-err-stage">
                                        <span class="gt-choice__dot" aria-hidden="true"></span>
                                        <span><?= htmlspecialchars($label) ?></span>
                                    </label>
                                <?php endforeach; ?>
                            </div>
                            <p class="gt-error" id="gt-err-stage" aria-live="polite"><?= $fieldError('stage') ?></p>
                        </fieldset>

                        <div class="gt-actions" hidden data-gt-nav>
                            <button type="button" class="gt-btn gt-btn--primary" data-gt-next="1">Continue</button>
                        </div>
                    </div>

                    <!-- Step 2 — who you are -->
                    <div class="gt-step" data-gt-step="2">
                        <h3 class="gt-legend" tabindex="-1" data-gt-step-heading>Where should we send it?</h3>

                        <div class="gt-field">
                            <label class="gt-label" for="gt-name">Name</label>
                            <input class="gt-input" type="text" id="gt-name" name="name" autocomplete="name"
                                required aria-required="true" aria-describedby="gt-err-name"
                                value="<?= $oldValue('name') ?>">
                            <p class="gt-error" id="gt-err-name" aria-live="polite"><?= $fieldError('name') ?></p>
                        </div>

                        <div class="gt-field">
                            <label class="gt-label" for="gt-email">Work email</label>
                            <input class="gt-input" type="email" id="gt-email" name="email" autocomplete="email"
                                inputmode="email" required aria-required="true"
                                aria-describedby="gt-err-email gt-hint-email"
                                value="<?= $oldValue('email') ?>">
                            <p class="gt-error" id="gt-err-email" aria-live="polite"><?= $fieldError('email') ?></p>
                            <p class="gt-hint" id="gt-hint-email" aria-live="polite" data-gt-email-hint></p>
                        </div>

                        <div class="gt-actions" hidden data-gt-nav>
                            <button type="button" class="gt-btn gt-btn--primary" data-gt-next="2">Continue</button>
                            <button type="button" class="gt-btn gt-btn--quiet" data-gt-back="2">Back</button>
                        </div>
                    </div>

                    <!-- Step 3 — the brief -->
                    <div class="gt-step" data-gt-step="3">
                        <h3 class="gt-legend" tabindex="-1" data-gt-step-heading>What should we look at?</h3>

                        <div class="gt-field">
                            <label class="gt-label" for="gt-product">Your product URL — or one line on the idea</label>
                            <textarea class="gt-textarea" id="gt-product" name="product_or_idea" rows="3"
                                required aria-required="true" aria-describedby="gt-err-product"><?= $oldValue('product_or_idea') ?></textarea>
                            <p class="gt-error" id="gt-err-product" aria-live="polite"><?= $fieldError('product_or_idea') ?></p>
                        </div>

                        <fieldset class="gt-fieldset gt-field">
                            <legend class="gt-label">Budget band</legend>
                            <div class="gt-choices gt-choices--inline" data-gt-choices>
                                <?php foreach (array_keys($budgets) as $i => $value): $label = $budgets[$value]; ?>
                                    <label class="gt-choice<?= $wasChosen('budget', $value) ? ' is-checked' : '' ?>">
                                        <input type="radio" name="budget" value="<?= htmlspecialchars($value) ?>"
                                            <?= $wasChosen('budget', $value) ? 'checked' : '' ?><?= $radioRequired($i) ?>
                                            aria-describedby="gt-err-budget">
                                        <span class="gt-choice__dot" aria-hidden="true"></span>
                                        <span><?= htmlspecialchars($label) ?></span>
                                    </label>
                                <?php endforeach; ?>
                            </div>
                            <p class="gt-error" id="gt-err-budget" aria-live="polite"><?= $fieldError('budget') ?></p>
                        </fieldset>

                        <fieldset class="gt-fieldset gt-field">
                            <legend class="gt-label">Timeline</legend>
                            <div class="gt-choices gt-choices--inline" data-gt-choices>
                                <?php foreach (array_keys($timelines) as $i => $value): $label = $timelines[$value]; ?>
                                    <label class="gt-choice<?= $wasChosen('timeline', $value) ? ' is-checked' : '' ?>">
                                        <input type="radio" name="timeline" value="<?= htmlspecialchars($value) ?>"
                                            <?= $wasChosen('timeline', $value) ? 'checked' : '' ?><?= $radioRequired($i) ?>
                                            aria-describedby="gt-err-timeline">
                                        <span class="gt-choice__dot" aria-hidden="true"></span>
                                        <span><?= htmlspecialchars($label) ?></span>
                                    </label>
                                <?php endforeach; ?>
                            </div>
                            <p class="gt-error" id="gt-err-timeline" aria-live="polite"><?= $fieldError('timeline') ?></p>
                        </fieldset>

                        <div class="gt-actions">
                            <button type="submit" class="gt-btn gt-btn--primary" data-gt-submit>
                                <span data-gt-submit-label>Get my free teardown</span>
                            </button>
                            <button type="button" class="gt-btn gt-btn--quiet" hidden data-gt-back="3">Back</button>
                        </div>

                        <p class="gt-form__alert" hidden data-gt-global-error role="alert"></p>
                    </div>
                </form>

                <!-- Success state. Swapped in place of the form; JS moves focus
                     to the heading so a screen-reader user lands on the answer. -->
                <div class="gt-success" hidden data-gt-success role="status" aria-live="polite">
                    <span class="gt-success__mark" aria-hidden="true">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                    </span>
                    <h2 class="gt-h3 gt-success__title" tabindex="-1" data-gt-success-title>Got it. Check your inbox in 48 hours.</h2>
                    <p class="gt-body gt-success__body">
                        Your teardown will come from <?= htmlspecialchars($senderMail) ?> — it may land in
                        Promotions or spam, so keep an eye out.
                    </p>
                    <a class="gt-link gt-success__link" href="<?= htmlspecialchars($bookingUrl) ?>"
                        target="_blank" rel="noopener">Prefer to talk sooner? Book a call →</a>
                </div>

                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- ======================================================================
         3 — Proof strip. Static by design: proof that scrolls past cannot be
         read, and a marquee reads as decoration rather than evidence.
         =================================================================== -->
    <section class="gt-section gt-section--tight" aria-label="Credentials">
        <div class="gt-container">
            <ul class="gt-proof">
                <li class="gt-proof__item">
                    <span class="gt-proof__icon" aria-hidden="true">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l2.9 6.3 6.9.8-5.1 4.7 1.4 6.8L12 17.3 5.9 20.6l1.4-6.8L2.2 9.1l6.9-.8z"/></svg>
                    </span>
                    Clutch 5.0
                </li>
                <li class="gt-proof__item">
                    <span class="gt-proof__icon" aria-hidden="true">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l2.9 6.3 6.9.8-5.1 4.7 1.4 6.8L12 17.3 5.9 20.6l1.4-6.8L2.2 9.1l6.9-.8z"/></svg>
                    </span>
                    Google 4.9
                </li>
                <li class="gt-proof__item">
                    <span class="gt-proof__icon" aria-hidden="true">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                    </span>
                    Upwork &ldquo;Top Rated Plus&rdquo;
                </li>
                <li class="gt-proof__item">11 years</li>
                <li class="gt-proof__item">4 live SaaS products</li>
            </ul>
        </div>
    </section>

    <!-- ======================================================================
         4 — Operator proof
         =================================================================== -->
    <section class="gt-section gt-section--surface" aria-labelledby="gt-operator-title">
        <div class="gt-container">
            <div class="gt-reveal">
                <p class="gt-eyebrow gt-eyebrow--accent">01 / WHO YOU'RE HIRING</p>
                <h2 class="gt-h2" id="gt-operator-title">We don't just build SaaS — we operate it.</h2>
                <p class="gt-lead gt-measure gt-section__intro">
                    Almost no offshore dev shop can say this: we build, ship, and pay the
                    hosting bills for four of our own live SaaS products. We've felt
                    multi-tenancy, billing, and infrastructure cost shocks first-hand — so
                    your build benefits from real operating experience, not just delivery.
                </p>
            </div>

            <div class="gt-grid gt-grid--2 gt-reveal gt-section__grid">
                <article class="gt-card">
                    <h3 class="gt-h4">LiftUp</h3>
                    <p class="gt-body gt-card__desc">Multi-tenant CRM + CMS with AI editorial and analytics.</p>
                    <p class="gt-card__tag"><span class="gt-tag">Laravel 12 · liftup.sh</span></p>
                </article>
                <article class="gt-card">
                    <h3 class="gt-h4">PocketGST</h3>
                    <p class="gt-body gt-card__desc">Offline-first mobile GST invoicing for India.</p>
                    <p class="gt-card__tag"><span class="gt-tag">Mobile · offline-first</span></p>
                </article>
                <article class="gt-card">
                    <h3 class="gt-h4">URLCrop</h3>
                    <p class="gt-body gt-card__desc">Link management and analytics.</p>
                    <p class="gt-card__tag"><span class="gt-tag">Links · analytics</span></p>
                </article>
                <article class="gt-card">
                    <h3 class="gt-h4">Emplyft</h3>
                    <p class="gt-body gt-card__desc">HR management.</p>
                    <p class="gt-card__tag"><span class="gt-tag">HR</span></p>
                </article>
            </div>

            <p class="gt-body gt-measure gt-reveal gt-section__note">
                We use Razorpay and Stripe in production. We know what breaks at scale
                because it broke for us first.
            </p>
        </div>
    </section>

    <!-- ======================================================================
         5 — What happens next
         =================================================================== -->
    <section class="gt-section" aria-labelledby="gt-how-title">
        <div class="gt-container">
            <div class="gt-reveal">
                <p class="gt-eyebrow gt-eyebrow--accent">02 / THE PROCESS</p>
                <h2 class="gt-h2" id="gt-how-title">What happens next</h2>
            </div>

            <ol class="gt-grid gt-grid--3 gt-steps gt-reveal">
                <li class="gt-steps__item">
                    <span class="gt-steps__index">01</span>
                    <h3 class="gt-h4 gt-steps__title">You send it</h3>
                    <p class="gt-body gt-steps__body">
                        Share your idea or your live product URL in the form. Takes about a minute.
                    </p>
                </li>
                <li class="gt-steps__item">
                    <span class="gt-steps__index">02</span>
                    <h3 class="gt-h4 gt-steps__title">We record a walkthrough — within 48 hours</h3>
                    <p class="gt-body gt-steps__body">
                        A 15–20 minute Loom covering the architecture we'd use, the v1 modules
                        that matter, a realistic timeline, and a price range.
                    </p>
                </li>
                <li class="gt-steps__item">
                    <span class="gt-steps__index">03</span>
                    <h3 class="gt-h4 gt-steps__title">You decide</h3>
                    <p class="gt-body gt-steps__body">
                        Watch it on your own time. Book a call only if it's useful. No pressure,
                        no follow-up sequence.
                    </p>
                </li>
            </ol>
        </div>
    </section>

    <!-- ======================================================================
         6 — Price anchor
         =================================================================== -->
    <section class="gt-section gt-section--tight gt-section--surface" aria-labelledby="gt-price-title">
        <div class="gt-container gt-price gt-reveal">
            <p class="gt-eyebrow gt-eyebrow--accent">03 / PRICE</p>
            <h2 class="gt-h3 gt-price__line" id="gt-price-title">
                Most SaaS builds we take on start at $22,000. The teardown is free either way.
            </h2>
            <?php /* PLACEHOLDER: pricing link — config('landing.saas_teardown.pricing_url') */ ?>
            <a class="gt-link gt-price__link" href="<?= htmlspecialchars($pricingUrl) ?>">See how we price →</a>
        </div>
    </section>

    <!-- ======================================================================
         7 — Case studies
         =================================================================== -->
    <section class="gt-section" aria-labelledby="gt-cases-title">
        <div class="gt-container">
            <div class="gt-reveal">
                <p class="gt-eyebrow gt-eyebrow--accent">04 / RECENT WORK</p>
                <h2 class="gt-h2" id="gt-cases-title">Two things we've built recently</h2>
            </div>

            <div class="gt-grid gt-grid--cases gt-reveal gt-section__grid">
                <?php foreach ($page['case_studies'] as $index => $case): ?>
                    <article class="gt-card gt-case">
                        <div class="gt-case__body">
                            <h3 class="gt-h4"><?= htmlspecialchars($case['name']) ?></h3>
                            <p class="gt-body gt-card__desc"><?= htmlspecialchars($case['summary']) ?></p>
                            <p class="gt-card__tag"><span class="gt-tag"><?= htmlspecialchars($case['stack']) ?></span></p>
                        </div>

                        <?php if (!empty($case['metric']['value'])): ?>
                            <div class="gt-metric">
                                <p class="gt-h2 gt-metric__value"><?= htmlspecialchars($case['metric']['value']) ?></p>
                                <p class="gt-small gt-metric__label"><?= htmlspecialchars($case['metric']['label'] ?? '') ?></p>
                            </div>
                        <?php else: ?>
                            <?php /* PLACEHOLDER_METRIC_<?= $index + 1 ?>: outcome metric + label.
                                     Set value/label in config/landing.php and this box becomes a
                                     real metric. Rendered dashed and labelled so it can never be
                                     mistaken for a number we actually measured. */ ?>
                            <div class="gt-metric-placeholder">
                                <p class="gt-metric-placeholder__value">Metric — client to supply</p>
                                <p class="gt-metric-placeholder__label">
                                    config/landing.php → case_studies.<?= $index ?>.metric
                                </p>
                            </div>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ======================================================================
         8 — When we're not a fit. Calm, on canvas, no card: honesty presented
         as a feature reads as a sales trick.
         =================================================================== -->
    <section class="gt-section gt-section--surface" aria-labelledby="gt-fit-title">
        <div class="gt-container gt-reveal">
            <p class="gt-eyebrow gt-eyebrow--accent">05 / HONESTY</p>
            <h2 class="gt-h2" id="gt-fit-title">When we're not a fit</h2>

            <ul class="gt-disqualifiers">
                <li>We won't be the cheapest quote you get.</li>
                <li>We're fully remote — no on-site, ever.</li>
                <li>We're a poor fit if your requirements are locked and can't change.</li>
                <li>We're eight people, not ten-plus engineers you can spin up next month.</li>
            </ul>
        </div>
    </section>

    <!-- ======================================================================
         9 — FAQ. Native <details>: accessible and interactive with zero JS.
         =================================================================== -->
    <section class="gt-section" aria-labelledby="gt-faq-title">
        <div class="gt-container gt-reveal">
            <p class="gt-eyebrow gt-eyebrow--accent">06 / QUESTIONS</p>
            <h2 class="gt-h2" id="gt-faq-title">Questions people ask before sending</h2>

            <div class="gt-faq">
                <details class="gt-faq__item">
                    <summary class="gt-faq__q">
                        Who owns the code and IP?
                        <span class="gt-faq__chevron" aria-hidden="true">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </span>
                    </summary>
                    <p class="gt-body gt-faq__a">
                        You do, from day one. The repository lives in your account and you get
                        commit access from week one. There's no lock-in and nothing is held hostage.
                    </p>
                </details>

                <details class="gt-faq__item">
                    <summary class="gt-faq__q">
                        What's the catch on a free teardown?
                        <span class="gt-faq__chevron" aria-hidden="true">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </span>
                    </summary>
                    <p class="gt-body gt-faq__a">
                        Honestly: roughly one in five teardown recipients ends up hiring us, and
                        the rest don't. That's fine — the teardown is genuinely useful either way,
                        and it's how we show what working with us is like instead of just claiming it.
                    </p>
                </details>

                <details class="gt-faq__item">
                    <summary class="gt-faq__q">
                        How does timezone and communication work?
                        <span class="gt-faq__chevron" aria-hidden="true">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </span>
                    </summary>
                    <p class="gt-body gt-faq__a">
                        We keep daily overlap hours with your working day and send daily written
                        updates. You'll always know what's happening without chasing us.
                    </p>
                </details>

                <details class="gt-faq__item">
                    <summary class="gt-faq__q">
                        What if the build runs over?
                        <span class="gt-faq__chevron" aria-hidden="true">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </span>
                    </summary>
                    <p class="gt-body gt-faq__a">
                        We run an Architecture Sprint first, so build quotes are made after design —
                        not guessed up front. Any scope change is priced and agreed before work
                        starts, so there are no silent overruns.
                    </p>
                </details>
            </div>
        </div>
    </section>

    <!-- ======================================================================
         10 — Closing CTA
         =================================================================== -->
    <section class="gt-section gt-section--surface" aria-labelledby="gt-closing-title">
        <div class="gt-container gt-closing gt-reveal">
            <p class="gt-eyebrow gt-eyebrow--accent">07 / NEXT STEP</p>
            <h2 class="gt-h2 gt-closing__title" id="gt-closing-title">
                Send us your SaaS. Get your teardown in 48 hours.
            </h2>
            <p class="gt-lead gt-closing__sub">Free, and no call required to get it.</p>
            <p class="gt-closing__cta">
                <a class="gt-btn gt-btn--primary" href="#lead-form" data-gt-scroll>Get my free teardown</a>
            </p>
        </div>
    </section>
</main>

<!-- ==========================================================================
     11 — Footer
     ======================================================================= -->
<footer class="gt-footer">
    <div class="gt-container">
        <p><strong class="gt-footer__name">QalbIT Infotech Pvt Ltd</strong></p>
        <p>C-109, Siddhi Vinayak Towers, Makarba, Ahmedabad 380051, India</p>
        <p><a href="mailto:<?= htmlspecialchars($replyMail) ?>"><?= htmlspecialchars($replyMail) ?></a></p>
    </div>
</footer>

<!-- Sticky mobile CTA. Revealed once the form scrolls out of view and hidden
     again whenever it is back on screen. -->
<div class="gt-sticky" data-gt-sticky hidden>
    <a class="gt-btn gt-btn--primary gt-btn--block" href="#lead-form" data-gt-scroll>Get my free teardown</a>
</div>
