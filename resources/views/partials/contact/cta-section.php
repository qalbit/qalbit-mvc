<?php
/**
 * Home – Contact CTA section
 *
 * Uses the reusable small contact form partial.
 */

$currentPath = $_SERVER['REQUEST_URI'] ?? '/';
$redirectTo  = $currentPath . '#section-contact-cta';
$leadFrom = $leadFrom ?? 'lead_contact_page';

$ctaPrimaryHref  = $ctaPrimaryHref  ?? '/contact-us/';
$ctaPrimaryLabel = $ctaPrimaryLabel ?? 'Get a project estimate';
$ctaPrimaryClass = $ctaPrimaryClass ?? 'inline-flex items-center justify-center rounded-xl bg-accent-600 px-4 py-2 text-xs font-semibold text-white hover:bg-accent-800 transition';

$ctaHref = function_exists('route_url') ? route_url($ctaPrimaryHref) : $ctaPrimaryHref;
?>

<section
    id="section-contact-cta"
    class="py-16 bg-slate-950 text-slate-50"
    data-contact-cta-section
>
    <div class="mx-auto max-w-6xl px-4">
        <div class="grid gap-10 lg:grid-cols-[minmax(0,1.15fr)_minmax(0,0.95fr)] lg:items-stretch">
            <!-- LEFT: Copy + stats + badge -->
            <div class="space-y-8" data-contact-cta-left>
                <header class="space-y-3 max-w-xl">
                    <span class="inline-flex items-center rounded-pill border border-slate-700/70 bg-slate-900/80 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-slate-300">
                        Contact <span class="mx-1 text-gradient-brand">Us</span>
                    </span>

                    <h2 class="text-display-sm sm:text-display-md font-bold">
                        Contact Us
                        <span class="block text-base font-normal text-slate-300">
                            for project discussion
                        </span>
                    </h2>

                    <a href="<?= htmlspecialchars($ctaHref, ENT_QUOTES); ?>"
                        class="<?= htmlspecialchars($ctaPrimaryClass, ENT_QUOTES); ?>">
                        <?= htmlspecialchars($ctaPrimaryLabel, ENT_QUOTES); ?>
                    </a>

                    <p class="text-sm md:text-base text-slate-300">
                        Once you submit the form, one of our dedicated sales representatives will reach out
                        to you within 24 hours. They are eager to discuss your needs and explore how we can
                        assist you further.
                    </p>
                </header>

                <!-- Stats grid -->
                <div class="contact-stat-grid">
                    <article class="contact-stat-card" data-contact-stat>
                        <div class="contact-stat-icon">
                            <img
                                src="<?= asset('/images/icons/experience.svg') ?>"
                                alt="11+ Years of Experience"
                                loading="lazy"
                                decoding="async"
                            />
                        </div>
                        <div class="contact-stat-text">
                            <h3 class="contact-stat-value">11+</h3>
                            <p class="contact-stat-label">Years of Experience</p>
                        </div>
                    </article>

                    <article class="contact-stat-card" data-contact-stat>
                        <div class="contact-stat-icon">
                            <img
                                src="<?= asset('/images/icons/satisfied-customers.svg') ?>"
                                alt="90+ Satisfied Customers"
                                loading="lazy"
                                decoding="async"
                            />
                        </div>
                        <div class="contact-stat-text">
                            <h3 class="contact-stat-value">90+</h3>
                            <p class="contact-stat-label">Satisfied Customers</p>
                        </div>
                    </article>

                    <article class="contact-stat-card" data-contact-stat>
                        <div class="contact-stat-icon">
                            <img
                                src="<?= asset('/images/icons/project-delivered.svg') ?>"
                                alt="120+ Project Delivered"
                                loading="lazy"
                                decoding="async"
                            />
                        </div>
                        <div class="contact-stat-text">
                            <h3 class="contact-stat-value">120+</h3>
                            <p class="contact-stat-label">Project Delivered</p>
                        </div>
                    </article>

                    <article class="contact-stat-card" data-contact-stat>
                        <div class="contact-stat-icon">
                            <img
                                src="<?= asset('/images/icons/job-success-score.svg') ?>"
                                alt="100% Job Success Store"
                                loading="lazy"
                                decoding="async"
                            />
                        </div>
                        <div class="contact-stat-text">
                            <h3 class="contact-stat-value">100%</h3>
                            <p class="contact-stat-label">Job Success Store</p>
                        </div>
                    </article>
                </div>

                <!-- Rankwatch badge (SEO trust) -->
                <div class="contact-badge">
                    <a
                        href="https://www.rankwatch.com/agency/company/qalbit/"
                        style="display:inline-block; border:0; height:auto;"
                        target="_blank"
                        rel="noopener"
                    >
                        <img
                            style="width:150px; display:block;"
                            width="150"
                            src="https://www.rankwatch.com/agency/wp-content/uploads/2017/01/QalbIT.png"
                            alt="Top Search Engine Optimization Agency in India"
                            loading="lazy"
                            decoding="async"
                        />
                    </a>
                </div>
            </div>

            <!-- RIGHT: Form card -->
            <div class="flex items-stretch" data-contact-cta-form>
                <?php
                    // Reuse the small form partial
                    $variant    = 'contact_cta';
                    $action     = '/contact-us/';
                    $redirectTo = $redirectTo;
                    $leadFrom   = $leadFrom;
                    include __DIR__ . '/form-small.php';
                ?>
            </div>
        </div>
    </div>
</section>
