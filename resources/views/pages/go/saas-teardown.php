<?php

/**
 * /go/saas-product-development/ — cold-traffic lead capture for the free
 * "SaaS Teardown" offer.
 *
 * Ported from the approved prototype. Two deliberate differences from it:
 *
 *   1. The prototype drew striped placeholders where artwork belongs. Real
 *      assets are wired in wherever a file exists; the stripe pattern remains
 *      as the fallback, labelled with the exact path it wants, so a missing
 *      file reads as outstanding work rather than a broken image.
 *   2. The prototype's form was React state only. This one is a real form that
 *      posts to the same URL: all three steps render without JavaScript and it
 *      submits normally. go-teardown.js is what turns it into one question at
 *      a time.
 *
 * Expects: $page (config('landing.saas_teardown')), $errors, $old, $success.
 */

$page    = $page    ?? config('landing.saas_teardown', []);
$errors  = $errors  ?? [];
$old     = $old     ?? [];
$success = $success ?? null;

$formPath   = $page['path'];
$stages     = $page['stages'];
$needs      = $page['needs'];
$bookingUrl = $page['booking_url'];
$pricingUrl = $page['pricing_url'];
$senderMail = $page['sender_email'];
$replyMail  = $page['reply_email'];

$oldValue = static function (string $key) use ($old): string {
    return htmlspecialchars((string) ($old[$key] ?? ''), ENT_QUOTES);
};

$wasChosen = static function (string $key, string $value) use ($old): bool {
    return ($old[$key] ?? null) === $value;
};

$fieldError = static function (string $key) use ($errors): string {
    return isset($errors[$key]) ? htmlspecialchars((string) $errors[$key]) : '';
};

/* `required` on the first radio makes the whole group required to the browser,
   which is what enforces it on the no-JS path. With JS the script sets
   form.noValidate, so a hidden step can never block a submit. */
$radioRequired = static function (int $index): string {
    return $index === 0 ? ' required aria-required="true"' : '';
};

/** Does an asset exist under /public/assets? */
$assetExists = static function (string $path): bool {
    return is_file(__DIR__ . '/../../../../public/assets/' . ltrim($path, '/'));
};

$photoPath = $page['founder_photo'];
$hasPhoto  = $assetExists($photoPath);

/*
 * The brand lockup. Falls back to the wordmark-and-square from the prototype
 * if the SVG ever goes missing from a deploy — a text wordmark reads as
 * intentional where a broken image does not.
 */
$logoPath = $page['logo'];
$hasLogo  = $assetExists($logoPath);

$brand = static function () use ($hasLogo, $logoPath, $page): string {
    if ($hasLogo) {
        return '<img class="gt-brand__logo" src="' . htmlspecialchars(asset_v($logoPath), ENT_QUOTES) . '"'
            . ' alt="' . htmlspecialchars($page['logo_alt'] ?? 'QalbIT Infotech Pvt Ltd', ENT_QUOTES) . '"'
            . ' width="' . (int) ($page['logo_width'] ?? 139) . '"'
            . ' height="' . (int) ($page['logo_height'] ?? 34) . '">';
    }

    return '<span class="gt-brand__mark">Qalbit</span>'
        . '<span class="gt-brand__dot" aria-hidden="true"></span>';
};
?>

<a class="gt-skip-link" href="#main-content">Skip to content</a>

<!-- ==========================================================================
     Header. Anchors only — no route away from the page.
     ======================================================================= -->
<header class="gt-header">
    <div class="gt-brand"><?= $brand() ?></div>

    <nav class="gt-nav" aria-label="Section navigation">
        <a class="gt-nav__link" href="#work">Work</a>
        <a class="gt-nav__link" href="#process">Process</a>
        <a class="gt-nav__link" href="#price">Price</a>
        <a class="gt-nav__link" href="#faq">FAQ</a>
        <a class="gt-nav__cta" href="#teardown">Free teardown</a>
    </nav>
</header>

<main id="main-content" tabindex="-1">

    <!-- ======================================================================
         Hero + form
         =================================================================== -->
    <section class="gt-hero" id="teardown" aria-labelledby="gt-hero-title">
        <div class="gt-wrap gt-hero__grid">

            <div>
                <p class="gt-kicker">SaaS product development</p>

                <h1 class="gt-h1" id="gt-hero-title">
                    Get a real build plan<br>for your SaaS.<br>
                    <span class="gt-h1__hl">In 48 hours.</span>
                    <span class="gt-h1__dim">Free.</span>
                </h1>

                <p class="gt-hero__lede">
                    Send us your idea or your live product. You get back a recorded
                    walkthrough — the architecture we'd use, the modules that actually
                    matter for v1, a realistic timeline, and a price range. No call
                    needed to get it.
                </p>

                <p class="gt-hero__claim">
                    From a team that builds and runs four of its own SaaS products.
                </p>

                <div class="gt-byline">
                    <?php if ($hasPhoto): ?>
                        <img class="gt-byline__photo" src="<?= asset_v($photoPath) ?>"
                            alt="<?= htmlspecialchars($page['founder_photo_alt']) ?>"
                            width="52" height="52" loading="lazy" decoding="async">
                    <?php else: ?>
                        <span class="gt-byline__photo" aria-hidden="true"></span>
                    <?php endif; ?>
                    <div>
                        <div class="gt-byline__name">Abidhusain Chidi — Founder, Qalbit Infotech</div>
                        <div class="gt-byline__role">I record these myself</div>
                    </div>
                </div>
            </div>

            <!-- ---------------------------------------------------------------
                 Lead form. Three steps with JS, one long form without it.
                 ------------------------------------------------------------ -->
            <div class="gt-card" data-gt-panel>

                <?php if ($success): ?>
                    <?php /* No-JS success: the POST redirected back with a flash. */ ?>
                    <div role="status">
                        <span class="gt-sent__mark" aria-hidden="true">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        </span>
                        <h2 class="gt-sent__title" tabindex="-1">Queued. You'll have it within 48 hours.</h2>
                        <p class="gt-sent__body">
                            We record in order of arrival. It comes from <?= htmlspecialchars($senderMail) ?> —
                            it may land in Promotions, so keep an eye out. Nothing else lands in
                            your inbox unless you reply.
                        </p>
                        <a class="gt-sent__link" href="<?= htmlspecialchars($bookingUrl) ?>"
                            target="_blank" rel="noopener">Prefer to talk sooner? Book a call →</a>
                    </div>
                <?php else: ?>

                <div class="gt-card__head">
                    <h2 class="gt-card__title">Get your free teardown</h2>
                    <span class="gt-card__step" data-gt-step-label hidden>Step 1 of 3</span>
                </div>
                <p class="gt-card__note">Three quick questions. No phone number, no sales call.</p>

                <div class="gt-progress" data-gt-progress hidden aria-hidden="true">
                    <div class="gt-progress__bar" data-gt-progress-bar style="width:33%"></div>
                </div>

                <?php
                $recaptchaCfg     = config('recaptcha', []);
                $recaptchaSiteKey = !empty($recaptchaCfg['enabled']) ? (string) ($recaptchaCfg['site_key'] ?? '') : '';
                ?>
                <form class="gt-form" method="post" action="<?= htmlspecialchars($formPath) ?>" data-gt-form data-gt-campaign="saas_teardown"
                    <?php if ($recaptchaSiteKey !== ''): ?>data-gt-recaptcha-key="<?= htmlspecialchars($recaptchaSiteKey, ENT_QUOTES) ?>"<?php endif; ?>>

                    <!-- Honeypot. A value here means a bot; the submission is dropped. -->
                    <div class="gt-honeypot" aria-hidden="true">
                        <label for="gt-website">Website</label>
                        <input type="text" id="gt-website" name="website" tabindex="-1" autocomplete="off">
                    </div>

                    <?php if ($recaptchaSiteKey !== ''): ?>
                        <?php /* Filled by go-teardown.js immediately before the fetch. It
                                 stays empty on a no-JS submit, and the controller treats an
                                 empty token as unverified rather than as a bot — this page
                                 is built to work without JavaScript and a dropped lead here
                                 is a paid click thrown away. */ ?>
                        <input type="hidden" name="recaptcha_token" value="" data-gt-recaptcha>
                    <?php endif; ?>

                    <!-- Attribution, filled by JS. Absent means absent, never guessed. -->
                    <input type="hidden" name="utm_source" value="" data-gt-utm="utm_source">
                    <input type="hidden" name="utm_medium" value="" data-gt-utm="utm_medium">
                    <input type="hidden" name="utm_campaign" value="" data-gt-utm="utm_campaign">
                    <input type="hidden" name="utm_content" value="" data-gt-utm="utm_content">
                    <input type="hidden" name="utm_term" value="" data-gt-utm="utm_term">
                    <input type="hidden" name="referrer" value="" data-gt-referrer>
                    <input type="hidden" name="redirect_to" value="<?= htmlspecialchars($formPath) ?>">

                    <?php if (!empty($errors['global'])): ?>
                        <p class="gt-error" style="margin-bottom:14px"><?= htmlspecialchars($errors['global']) ?></p>
                    <?php endif; ?>

                    <!-- Step 1 -->
                    <div class="gt-step" data-gt-step="1">
                        <fieldset style="margin:0;padding:0;border:0">
                            <legend class="gt-q" tabindex="-1" data-gt-step-heading>Where is your SaaS today?</legend>
                            <div class="gt-choices" data-gt-choices>
                                <?php foreach (array_keys($stages) as $i => $value): ?>
                                    <label class="gt-choice<?= $wasChosen('stage', $value) ? ' is-checked' : '' ?>">
                                        <input type="radio" name="stage" value="<?= htmlspecialchars($value) ?>"
                                            <?= $wasChosen('stage', $value) ? 'checked' : '' ?><?= $radioRequired($i) ?>
                                            aria-describedby="gt-err-stage">
                                        <?= htmlspecialchars($stages[$value]) ?>
                                    </label>
                                <?php endforeach; ?>
                            </div>
                            <p class="gt-error" id="gt-err-stage" aria-live="polite"><?= $fieldError('stage') ?></p>
                        </fieldset>
                    </div>

                    <!-- Step 2 -->
                    <div class="gt-step" data-gt-step="2">
                        <fieldset style="margin:0;padding:0;border:0">
                            <legend class="gt-q" tabindex="-1" data-gt-step-heading>What do you need from us?</legend>
                            <div class="gt-choices" data-gt-choices>
                                <?php foreach (array_keys($needs) as $i => $value): ?>
                                    <label class="gt-choice<?= $wasChosen('need', $value) ? ' is-checked' : '' ?>">
                                        <input type="radio" name="need" value="<?= htmlspecialchars($value) ?>"
                                            <?= $wasChosen('need', $value) ? 'checked' : '' ?><?= $radioRequired($i) ?>
                                            aria-describedby="gt-err-need">
                                        <?= htmlspecialchars($needs[$value]) ?>
                                    </label>
                                <?php endforeach; ?>
                            </div>
                            <p class="gt-error" id="gt-err-need" aria-live="polite"><?= $fieldError('need') ?></p>
                        </fieldset>
                    </div>

                    <!-- Step 3 -->
                    <div class="gt-step" data-gt-step="3">
                        <h3 class="gt-q" tabindex="-1" data-gt-step-heading>Where should the teardown go?</h3>
                        <div class="gt-field">
                            <label class="gt-visually-hidden" for="gt-email">Work email</label>
                            <input class="gt-input" type="email" id="gt-email" name="email"
                                placeholder="you@company.com" autocomplete="email" inputmode="email"
                                required aria-required="true"
                                aria-describedby="gt-err-email gt-hint-email"
                                value="<?= $oldValue('email') ?>">
                            <p class="gt-error" id="gt-err-email" aria-live="polite"><?= $fieldError('email') ?></p>
                            <p class="gt-hint" id="gt-hint-email" aria-live="polite" data-gt-email-hint></p>

                            <label class="gt-visually-hidden" for="gt-note">Product URL or one line about the idea</label>
                            <input class="gt-input" type="text" id="gt-note" name="product_or_idea"
                                placeholder="Product URL or one line about the idea"
                                required aria-required="true" aria-describedby="gt-err-note"
                                value="<?= $oldValue('product_or_idea') ?>">
                            <p class="gt-error" id="gt-err-note" aria-live="polite"><?= $fieldError('product_or_idea') ?></p>

                            <button type="submit" class="gt-submit" data-gt-submit>
                                <span data-gt-submit-label>Send my teardown request</span>
                            </button>
                        </div>
                        <p class="gt-error" data-gt-global-error role="alert" hidden style="margin-top:12px"></p>
                    </div>
                </form>

                <!-- Success state, swapped in place of the form. -->
                <div hidden data-gt-success role="status" aria-live="polite">
                    <span class="gt-sent__mark" aria-hidden="true">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                    </span>
                    <h2 class="gt-sent__title" tabindex="-1" data-gt-success-title>Queued. You'll have it within 48 hours.</h2>
                    <p class="gt-sent__body">
                        We record in order of arrival. It comes from <?= htmlspecialchars($senderMail) ?> —
                        it may land in Promotions, so keep an eye out. Nothing else lands in
                        your inbox unless you reply.
                    </p>
                    <a class="gt-sent__link" href="<?= htmlspecialchars($bookingUrl) ?>"
                        target="_blank" rel="noopener">Prefer to talk sooner? Book a call →</a>
                </div>

                <div class="gt-card__foot">
                    <span>No phone number required</span>
                    <button type="button" class="gt-back" data-gt-back hidden>← Back</button>
                </div>

                <?php endif; ?>
            </div>

        </div>
    </section>

    <!-- ======================================================================
         Credentials marquee
         =================================================================== -->
    <?php
    $marquee = [
        'Clutch 5.0 ★', '◆', 'Google 4.9 ★', '◆', 'Upwork top rated plus', '◆',
        '11 years shipping', '◆', '4 live SaaS products', '◆', '8 people, no bench', '◆',
    ];
    ?>
    <div class="gt-marquee" role="group" aria-label="Credentials">
        <div class="gt-marquee__track">
            <?php /* Rendered twice so the -50% keyframe loops seamlessly. The
                     duplicate is hidden from assistive tech. */ ?>
            <?php foreach ($marquee as $item): ?>
                <span><?= $item ?></span>
            <?php endforeach; ?>
            <?php foreach ($marquee as $item): ?>
                <span aria-hidden="true"><?= $item ?></span>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- ======================================================================
         01 — Who you're hiring
         =================================================================== -->
    <section class="gt-section gt-paper" aria-labelledby="gt-operator-title">
        <div class="gt-wrap">
            <p class="gt-eyebrow">01 — Who you're hiring</p>

            <div class="gt-split">
                <h2 class="gt-h2" id="gt-operator-title">We don't just build SaaS — we operate it.</h2>
                <p class="gt-split__lede">
                    Almost no offshore dev shop can say this: we build, ship, and pay the
                    hosting bill for four of our own live SaaS products. We've felt
                    multi-tenancy, billing, and infrastructure cost shocks first-hand — so
                    your build benefits from real operating experience, not just delivery.
                </p>
            </div>

            <div class="gt-grid">
                <?php foreach ($page['products'] as $product): ?>
                    <?php
                    $img    = '/images/products/' . $product['slug'] . '.webp';
                    $hasImg = $assetExists($img);
                    ?>
                    <article class="gt-product">
                        <?php if ($hasImg): ?>
                            <img class="gt-product__media" src="<?= asset_v($img) ?>"
                                alt="<?= htmlspecialchars($product['alt']) ?>"
                                width="640" height="400" loading="lazy" decoding="async">
                        <?php else: ?>
                            <div class="gt-product__media gt-product__media--empty">
                                <span>product shot — <?= htmlspecialchars($product['slug']) ?></span>
                            </div>
                        <?php endif; ?>

                        <div class="gt-product__head">
                            <h3 class="gt-product__name"><?= htmlspecialchars($product['name']) ?></h3>
                            <span class="gt-product__dot" aria-hidden="true"></span>
                        </div>
                        <p class="gt-product__desc"><?= htmlspecialchars($product['desc']) ?></p>
                        <p class="gt-product__stack"><?= htmlspecialchars($product['stack']) ?></p>
                    </article>
                <?php endforeach; ?>
            </div>

            <p class="gt-closer">
                We use Razorpay and Stripe in production. We know what breaks at scale
                because it broke for us first.
            </p>
        </div>
    </section>

    <!-- ======================================================================
         02 — The process
         =================================================================== -->
    <section class="gt-section" id="process" aria-labelledby="gt-how-title">
        <div class="gt-wrap">
            <p class="gt-eyebrow">02 — The process</p>
            <h2 class="gt-h2 gt-section-head" id="gt-how-title">What happens next</h2>

            <?php
            $steps = [
                [
                    'n' => '01', 'meta' => 'You · about a minute', 'title' => 'You send it',
                    'body' => 'Share your idea or your live product URL in the form. Takes about a minute.',
                ],
                [
                    'n' => '02', 'meta' => 'Us · within 48 hours', 'title' => 'We record a walkthrough',
                    'body' => "A 15–30 minute recording covering the architecture we'd use, the v1 modules that matter, a realistic timeline, and a price range.",
                    'key' => true,
                ],
                [
                    'n' => '03', 'meta' => 'You · your own time', 'title' => 'You decide',
                    'body' => "Watch it whenever. Book a call only if it's useful. No pressure, no follow-up sequence.",
                ],
            ];
            ?>
            <ol class="gt-steps">
                <?php foreach ($steps as $step): ?>
                    <li class="gt-stepcard<?= !empty($step['key']) ? ' gt-stepcard--key' : '' ?>">
                        <div class="gt-stepcard__num" aria-hidden="true"><?= $step['n'] ?></div>
                        <p class="gt-stepcard__meta"><?= htmlspecialchars($step['meta']) ?></p>
                        <h3 class="gt-stepcard__title"><?= htmlspecialchars($step['title']) ?></h3>
                        <p class="gt-stepcard__body"><?= htmlspecialchars($step['body']) ?></p>
                    </li>
                <?php endforeach; ?>
            </ol>
        </div>
    </section>

    <!-- ======================================================================
         03 — Price
         =================================================================== -->
    <section class="gt-section gt-paper" id="price" aria-labelledby="gt-price-title">
        <div class="gt-wrap">
            <p class="gt-eyebrow">03 — Price</p>

            <div class="gt-price">
                <div>
                    <p class="gt-price__label"><?= htmlspecialchars($page['price_from_label']) ?></p>
                    <p class="gt-price__amount"><?= htmlspecialchars($page['price_from']) ?></p>
                </div>
                <div>
                    <h2 class="gt-price__claim" id="gt-price-title">Most SaaS builds we take on start here.</h2>
                    <p class="gt-price__free">
                        <span class="gt-tick" aria-hidden="true">
                            <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        </span>
                        The teardown is free either way.
                    </p>
                    <?php /* PLACEHOLDER: pricing link — config('landing.saas_teardown.pricing_url') */ ?>
                    <a class="gt-btn-outline" href="<?= htmlspecialchars($pricingUrl) ?>">See how we price →</a>
                </div>
            </div>
        </div>
    </section>

    <!-- ======================================================================
         04 — Recent work
         =================================================================== -->
    <section class="gt-section gt-paper" id="work" style="padding-top:0" aria-labelledby="gt-cases-title">
        <div class="gt-wrap">
            <p class="gt-eyebrow">04 — Recent work</p>
            <h2 class="gt-h2 gt-section-head" id="gt-cases-title">Two things we've built recently</h2>

            <div class="gt-cases">
                <?php foreach ($page['case_studies'] as $case): ?>
                    <?php
                    $csImg    = '/images/case-studies/go/' . $case['slug'] . '.webp';
                    $hasCsImg = $assetExists($csImg);
                    $metric   = $case['metric'];
                    ?>
                    <article class="gt-case">
                        <?php if ($hasCsImg): ?>
                            <img class="gt-case__media" src="<?= asset_v($csImg) ?>"
                                alt="<?= htmlspecialchars($case['name'] . ' — ' . $case['kicker']) ?>"
                                width="640" height="400" loading="lazy" decoding="async">
                        <?php else: ?>
                            <div class="gt-case__media gt-case__media--empty">
                                <span>case shot — <?= htmlspecialchars($case['slug']) ?></span>
                            </div>
                        <?php endif; ?>

                        <div class="gt-case__body">
                            <p class="gt-case__kicker"><?= htmlspecialchars($case['kicker']) ?></p>
                            <h3 class="gt-case__name"><?= htmlspecialchars($case['name']) ?></h3>
                            <p class="gt-case__desc"><?= htmlspecialchars($case['summary']) ?></p>
                            <p class="gt-case__stack"><?= htmlspecialchars($case['stack']) ?></p>

                            <?php if (!empty($metric['value'])): ?>
                                <?php /* A published figure — CyberFind states these on its own site. */ ?>
                                <div class="gt-metric">
                                    <span class="gt-metric__value"><?= htmlspecialchars($metric['value']) ?></span>
                                    <span class="gt-metric__label"><?= htmlspecialchars($metric['label']) ?></span>
                                </div>
                            <?php elseif (!empty($metric['outcome'])): ?>
                                <?php /* No hard number was ever recorded for this build, so the
                                         outcome is stated in words. Inventing a percentage here
                                         would be the easiest lie on the page to tell. */ ?>
                                <div class="gt-outcome">
                                    <span class="gt-outcome__mark" aria-hidden="true">
                                        <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    </span>
                                    <span class="gt-outcome__text"><?= htmlspecialchars($metric['outcome']) ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ======================================================================
         05 — Honesty
         =================================================================== -->
    <section class="gt-section" aria-labelledby="gt-fit-title">
        <div class="gt-wrap">
            <p class="gt-eyebrow">05 — Honesty</p>

            <?php
            $disqualifiers = [
                "We won't be the cheapest quote you get.",
                "We're fully remote — no on-site, ever.",
                "We're a poor fit if your requirements are locked and can't change.",
                "We're eight people, not ten-plus engineers you can spin up next month.",
            ];
            $fitImg    = '/images/go/not-a-fit.webp';
            $hasFitImg = $assetExists($fitImg);
            ?>
            <div class="gt-fit">
                <div>
                    <h2 class="gt-h2" id="gt-fit-title">When we're not a fit</h2>
                    <ul class="gt-fit__list">
                        <?php foreach ($disqualifiers as $i => $line): ?>
                            <li class="gt-fit__item">
                                <span class="gt-fit__num" aria-hidden="true"><?= sprintf('%02d', $i + 1) ?></span>
                                <?= htmlspecialchars($line) ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <?php if ($hasFitImg): ?>
                    <?php /* Decorative: the meaning is carried entirely by the list
                             beside it, so an empty alt keeps a screen reader from
                             having a photograph described at it for no reason. */ ?>
                    <img class="gt-fit__media" src="<?= asset_v($fitImg) ?>" alt=""
                        width="1024" height="1024" loading="lazy" decoding="async">
                <?php else: ?>
                    <div class="gt-fit__media gt-fit__media--empty">
                        <span>team photo — desk, laptop, coffee</span>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- ======================================================================
         06 — Questions. Native <details>: accessible, keyboard-operable, zero JS.
         =================================================================== -->
    <section class="gt-section gt-paper" id="faq" aria-labelledby="gt-faq-title">
        <div class="gt-wrap">
            <p class="gt-eyebrow">06 — Questions</p>

            <?php
            $faqs = [
                [
                    'q' => 'Who owns the code and IP?',
                    'a' => "You do, from day one. The repository lives in your account and you get commit access from week one. There's no lock-in and nothing is held hostage.",
                    'open' => true,
                ],
                [
                    'q' => "What's the catch on a free teardown?",
                    'a' => "None. It costs us half a day and it's the fastest way to show how we think. Roughly one in four people who get one hire us; the rest keep the plan.",
                ],
                [
                    'q' => 'How does timezone and communication work?',
                    'a' => "We're in Ahmedabad (IST) and hold a four-hour overlap with European mornings and US mornings on request. Written updates land daily; calls are weekly and optional.",
                ],
                [
                    'q' => 'What if the build runs over?',
                    'a' => 'Scope we agreed and mis-estimated is on us. Scope you add is quoted before we start it, in writing, so the number never moves quietly.',
                ],
            ];
            ?>
            <div class="gt-faq">
                <h2 class="gt-h2" id="gt-faq-title">Questions people ask before sending</h2>

                <div class="gt-faq__list">
                    <?php foreach ($faqs as $faq): ?>
                        <details class="gt-faq__item"<?= !empty($faq['open']) ? ' open' : '' ?>>
                            <summary class="gt-faq__q">
                                <span><?= htmlspecialchars($faq['q']) ?></span>
                                <span class="gt-faq__sign" aria-hidden="true"></span>
                            </summary>
                            <p class="gt-faq__a"><?= htmlspecialchars($faq['a']) ?></p>
                        </details>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- ======================================================================
         07 — Next step
         =================================================================== -->
    <section class="gt-final gt-lime" aria-labelledby="gt-final-title">
        <div class="gt-wrap">
            <p class="gt-eyebrow">07 — Next step</p>
            <div class="gt-final__grid">
                <h2 class="gt-final__title" id="gt-final-title">Send us your SaaS. Get your teardown in 48 hours.</h2>
                <p class="gt-final__sub">Free, and no call required to get it. Most people who send one never book a call — they just take the plan.</p>
            </div>
        </div>

        <?php /* Outside .gt-wrap on purpose: this bar is full-bleed, so it
                 cancels the section gutter rather than sitting inside the
                 1320px container like everything above it. */ ?>
        <a class="gt-final__cta" href="#teardown">
            Get my free teardown
            <span class="gt-final__arrow" aria-hidden="true">→</span>
        </a>
    </section>
</main>

<!-- ==========================================================================
     Footer
     ======================================================================= -->
<footer class="gt-footer">
    <div class="gt-wrap">
        <div class="gt-footer__top">
            <div>
                <div class="gt-brand"><?= $brand() ?></div>
                <p class="gt-footer__legal">QalbIT Infotech Pvt Ltd</p>
            </div>
            <div>
                <p class="gt-footer__label">Office</p>
                <p class="gt-footer__value">C-109, Siddhi Vinayak Towers,<br>Makarba, Ahmedabad 380051, India</p>
            </div>
            <div>
                <p class="gt-footer__label">Enquiries</p>
                <p class="gt-footer__value">
                    <a href="mailto:<?= htmlspecialchars($replyMail) ?>"><?= htmlspecialchars($replyMail) ?></a>
                </p>
            </div>
        </div>

        <?php /* aria-hidden: the legal name is stated above it, and this instance
                 is graphic, not information. */ ?>
        <div class="gt-footer__wordmark" aria-hidden="true">QALBIT</div>

        <p class="gt-footer__copyright">&copy; <?= date('Y') ?> Qalbit Infotech Pvt Ltd. All rights reserved.</p>
    </div>
</footer>
