<section class="py-10 md:py-24 cursor-hero-brand bg-slate-50" aria-labelledby="hero-heading">
    <div class="max-w-6xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-8 items-center">
            <!-- HERO ILLUSTRATION -->
            <div class="order-1 md:order-2 md:col-span-1 lg:col-span-1 flex items-center justify-center">
                <?php if (!empty($heroImage)): ?>
                <img
                    class="w-80 md:w-full max-w-md lg:max-w-none hero-image-float"
                    src="<?= asset($heroImage) ?>"
                    alt="Custom software and mobile app development banner by QalbIT"
                    width="500"
                    height="500"
                    loading="eager"
                    decoding="async"
                    fetchpriority="high"
                    sizes="(max-width: 450px) 260px, (max-width: 800px) 350px, (max-width: 1024px) 390px, 500px"
                />
                <?php endif; ?>
            </div>

            <!-- HERO COPY -->
            <div class="order-2 md:order-1 md:col-span-1 lg:col-span-2 flex flex-col items-center md:items-start justify-center gap-4">
                <?php if (!empty($heroPill)): ?>
                <span class="inline-flex items-center rounded-pill border border-slate-200 bg-white/90 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-muted-foreground shadow-soft">
                    <?= htmlspecialchars($heroPill) ?>
                </span>
                <?php endif; ?>
                
                <?php if (!empty($heroHeading)) : ?>
                <h1 class="text-display-md sm:text-display-lg md:text-display-2xl font-bold text-center md:text-left">
                    <?= $heroHeading ?>
                </h1>
                <?php endif; ?>

                <?php if (!empty($heroDescription)) : ?>
                <p class="text-md font-medium text-slate-600 text-center md:text-left px-0 md:px-4 lg:px-2">
                    <?= htmlspecialchars($heroDescription) ?>
                </p>
                <?php endif; ?>

                <div class="flex flex-col md:flex-row items-stretch md:items-center justify-center md:justify-start gap-4 w-full md:w-auto">
                    <a href="<?= route_url('/contact-us/') ?>" 
                        class="btn btn-primary btn-radius-pill w-full md:w-auto text-center"
                        title="Get Your Free Estimation Now!"
                        aria-label="Get Your Free Estimation Now in 24 Hours!">
                        Get Your Free Estimate Now
                    </a>
                    <a href="<?= route_url('https://calendly.com/abidhusain-qalbit/discuss-project') ?>" 
                        class="btn btn-accent-outline btn-radius-pill w-full md:w-auto text-center"
                        target="_blank"
                        rel="noopener noreferrer"
                        title="Connect with Our CEO Now!"
                        aria-label="Schedule a Quick Call with our CEO Now!">
                        Schedule a Quick Call
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
