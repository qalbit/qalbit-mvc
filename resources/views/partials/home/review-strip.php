<section
    class="bg-gradient-to-r from-accent-50 via-primary-50/40 to-accent-50 py-8"
    aria-labelledby="review-strip-heading"
>
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex flex-col gap-4">
            <!-- Section heading (better semantics than <p>) -->
            <h2
                id="review-strip-heading"
                class="text-[11px] font-semibold tracking-[0.2em] uppercase text-slate-500 text-center md:text-left"
            >
                Reviewed & trusted by teams on leading platforms
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                <!-- Clutch -->
                <article class="flex items-center gap-3 rounded-md bg-white px-4 py-3 shadow-soft">
                    <a
                        href="https://clutch.co/profile/qalbit-infotech#highlights"
                        target="_blank"
                        rel="noopener noreferrer nofollow"
                        class="shrink-0"
                    >
                        <img
                            src="<?= asset('images/reviews/clutch-logo.svg') ?>"
                            alt="Clutch reviews for QalbIT"
                            class="h-8 w-auto"
                            loading="lazy"
                            decoding="async"
                        />
                    </a>
                    <div class="space-y-0.5">
                        <p class="text-[11px] font-medium text-slate-500">Reviewed on</p>
                        <p class="text-sm font-semibold text-slate-900">Clutch</p>
                        <p class="text-[11px] text-slate-600">
                            ⭐⭐⭐⭐⭐ <span class="font-semibold">5.0 rating</span>
                            <span class="text-slate-500">· 7 client reviews</span>
                        </p>
                    </div>
                </article>

                <!-- Google -->
                <article class="flex items-center gap-3 rounded-md bg-white px-4 py-3 shadow-soft">
                    <a
                        href="https://www.google.com/search?q=qalbit+infotech#lrd=0x395e9b4dcb551825:0xd2ca8b0aa98f5d41,1"
                        target="_blank"
                        rel="noopener noreferrer nofollow"
                        class="shrink-0"
                    >
                        <img
                            src="<?= asset('images/reviews/google-logo.svg') ?>"
                            alt="Google reviews for QalbIT"
                            class="h-8 w-auto"
                            loading="lazy"
                            decoding="async"
                        />
                    </a>
                    <div class="space-y-0.5">
                        <p class="text-[11px] font-medium text-slate-500">Rated on</p>
                        <p class="text-sm font-semibold text-slate-900">Google</p>
                        <p class="text-[11px] text-slate-600">
                            ⭐⭐⭐⭐⭐ <span class="font-semibold">4.9 rating</span>
                            <span class="text-slate-500">· 18 reviews</span>
                        </p>
                    </div>
                </article>

                <!-- Upwork -->
                <article class="flex items-center gap-3 rounded-md bg-white px-4 py-3 shadow-soft">
                    <a
                        href="https://www.upwork.com/ag/qalbit/"
                        target="_blank"
                        rel="noopener noreferrer nofollow"
                        class="shrink-0"
                    >
                        <img
                            src="<?= asset('images/reviews/upwork-logo.svg') ?>"
                            alt="Upwork reviews for QalbIT"
                            class="h-8 w-auto"
                            loading="lazy"
                            decoding="async"
                        />
                    </a>
                    <div class="space-y-0.5">
                        <p class="text-[11px] font-medium text-slate-500">Top-rated on</p>
                        <p class="text-sm font-semibold text-slate-900">Upwork</p>
                        <p class="text-[11px] text-slate-600">
                            ⭐⭐⭐⭐⭐ <span class="font-semibold">100+ reviews</span>
                            <span class="text-slate-500">· 5K+ hours worked</span>
                        </p>
                    </div>
                </article>

                <!-- TopTracker -->
                <article class="flex items-center gap-3 rounded-md bg-white px-4 py-3 shadow-soft">
                    <img
                        src="<?= asset('images/reviews/toptracker-logo.svg') ?>"
                        alt="TopTracker hours worked with QalbIT"
                        class="h-8 w-auto shrink-0"
                        loading="lazy"
                        decoding="async"
                    />
                    <div class="space-y-0.5">
                        <p class="text-[11px] font-medium text-slate-500">Verified hours on</p>
                        <p class="text-sm font-semibold text-slate-900">TopTracker</p>
                        <p class="text-[11px] text-slate-600">
                            <span class="font-semibold">7K+ hours</span>
                            <span class="text-slate-500">tracked with clients</span>
                        </p>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>
