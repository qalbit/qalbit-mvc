<?php
$appName     = config('app.name', 'QalbIT Infotech Pvt Ltd');
$currentYear = date('Y');
?>

<footer
    id="site-footer"
    class="bg-slate-950 text-slate-50"
    data-footer-section
>
    <div class="mx-auto max-w-6xl px-4 pt-10 pb-6 space-y-10">

        <div
            class="flex flex-col gap-6 border-b border-slate-800 pb-6 md:flex-row md:items-center md:justify-between"
            data-footer-top
        >
            <div class="flex items-center gap-3">
                <a href="/" class="inline-flex items-center">
                    <img
                        loading="lazy"
                        src="<?= asset('/images/brand/logo-light.svg') ?>"
                        alt="QalbIT Infotech Pvt Ltd"
                        class="h-8 w-auto"
                    />
                </a>
            </div>

            <div class="flex flex-col items-start gap-2 md:items-end">
                <span class="text-xs font-medium uppercase tracking-[0.18em] text-slate-400">
                    Follow Us
                </span>
                <ul class="flex flex-wrap items-center gap-3">
                    <li>
                        <a
                            href="https://www.linkedin.com/company/qalbit/"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="Follow us on LinkedIn"
                            class="inline-flex items-center justify-center rounded-full bg-slate-900/60 p-2 hover:bg-slate-800 transition"
                        >
                            <img
                                src="<?= asset('images/icons/linkedin-light.svg') ?>"
                                alt="Follow QalbIT on LinkedIn"
                                class="h-4 w-4"
                                loading="lazy"
                            />
                        </a>
                    </li>
                    <li>
                        <a
                            href="https://x.com/qalb_it"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="Follow us on Twitter"
                            class="inline-flex items-center justify-center rounded-full bg-slate-900/60 p-2 hover:bg-slate-800 transition"
                        >
                            <img
                                src="<?= asset('images/icons/twitter-light.svg') ?>"
                                alt="Follow QalbIT on Twitter"
                                class="h-4 w-4"
                                loading="lazy"
                            />
                        </a>
                    </li>
                    <li>
                        <a
                            href="https://www.facebook.com/qalbitinfotech/"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="Follow us on Facebook"
                            class="inline-flex items-center justify-center rounded-full bg-slate-900/60 p-2 hover:bg-slate-800 transition"
                        >
                            <img
                                src="<?= asset('images/icons/facebook-light.svg') ?>"
                                alt="Follow QalbIT on Facebook"
                                class="h-4 w-4"
                                loading="lazy"
                            />
                        </a>
                    </li>
                    <li>
                        <a
                            href="https://www.instagram.com/qalbitinfotech/"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="Follow us on Instagram"
                            class="inline-flex items-center justify-center rounded-full bg-slate-900/60 p-2 hover:bg-slate-800 transition"
                        >
                            <img
                                src="<?= asset('images/icons/instagram-light.svg') ?>"
                                alt="Follow QalbIT on Instagram"
                                class="h-4 w-4"
                                loading="lazy"
                            />
                        </a>
                    </li>
                    <li>
                        <a
                            href="https://github.com/qalbit/"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="Follow us on Github"
                            class="inline-flex items-center justify-center rounded-full bg-slate-900/60 p-2 hover:bg-slate-800 transition"
                        >
                            <img
                                src="<?= asset('images/icons/github-light.svg') ?>"
                                alt="Follow QalbIT on Github"
                                class="h-4 w-4"
                                loading="lazy"
                            />
                        </a>
                    </li>
                </ul>

            </div>
        </div>

        <!-- 2. Recognized by -->
        <div
            class="space-y-3 pb-6"
            data-footer-recognized
        >
            <div class="text-xs font-semibold uppercase tracking-[0.18em] text-slate-400">
                Recognized By
            </div>

            <div class="flex flex-wrap gap-4">
                <div class="flex items-center gap-3 rounded-xl border border-slate-800 bg-slate-900/60 px-4 py-3">
                    <img
                        loading="lazy"
                        src="<?= asset('/images/reviews/clutch-light.svg') ?>"
                        alt="Recognized by Clutch"
                        class="h-7 w-auto recognized-img"
                    />
                    <div class="flex items-center gap-2 text-xs text-slate-200 rating-container">
                        <span class="font-semibold">5.0</span>
                        <img
                            loading="lazy"
                            src="<?= asset('/images/icons/star-rating.svg') ?>"
                            alt="Five Star Rating on Clutch"
                            class="h-3 w-auto rating-img"
                        />
                    </div>
                </div>

                <div class="flex items-center gap-3 rounded-xl border border-slate-800 bg-slate-900/60 px-4 py-3">
                    <img
                        loading="lazy"
                        src="<?= asset('/images/reviews/google-light.svg') ?>"
                        alt="Recognized by Google"
                        class="h-7 w-auto recognized-img"
                    />
                    <div class="flex items-center gap-2 text-xs text-slate-200 rating-container">
                        <span class="font-semibold">4.9</span>
                        <img
                            loading="lazy"
                            src="<?= asset('/images/icons/star-rating.svg') ?>"
                            alt="Five Star Rating on Google"
                            class="h-3 w-auto rating-img"
                        />
                    </div>
                </div>

                <div class="flex items-center gap-3 rounded-xl border border-slate-800 bg-slate-900/60 px-4 py-3">
                    <img
                        loading="lazy"
                        src="<?= asset('/images/reviews/upwork-light.svg') ?>"
                        alt="Recognized by upwork"
                        class="h-7 w-auto recognized-img"
                    />
                    <div class="flex items-center gap-2 text-xs text-slate-200 rating-container">
                        <span class="font-semibold">Top Rated Plus</span>
                        <img
                            loading="lazy"
                            src="<?= asset('/images/icons/star-rating.svg') ?>"
                            alt="Top Rated Plus Developer on Upwork"
                            class="h-3 w-auto rating-img"
                        />
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. Connect (project / join / meet) -->
        <div
            class="grid gap-6 pb-6 md:grid-cols-3"
            data-footer-connect
        >
            <div class="space-y-2 connect-container connect-project-inquiry">
                <div class="text-xs font-semibold uppercase tracking-[0.18em] text-slate-400 container-heading">
                    Project Inquiry
                </div>
                <ul class="space-y-1 text-sm text-slate-200">
                    <li>
                        <a href="mailto:info@qalbit.com" target="_blank" rel="noopener noreferrer" class="hover:text-sky-400">
                            info@qalbit.com
                        </a>
                    </li>
                    <li>
                        <a href="mailto:sales@qalbit.com" target="_blank" rel="noopener noreferrer" class="hover:text-sky-400">
                            sales@qalbit.com
                        </a>
                    </li>
                    <li>
                        <a href="tel:+918511900440" target="_blank" rel="noopener noreferrer" class="hover:text-sky-400">
                            +91 85119 00440
                        </a>
                    </li>
                </ul>
            </div>

            <div class="space-y-2 connect-container connect-join-team">
                <div class="text-xs font-semibold uppercase tracking-[0.18em] text-slate-400 container-heading">
                    Join our team
                </div>
                <ul class="space-y-1 text-sm text-slate-200">
                    <li>
                        <a href="mailto:hr@qalbit.com" target="_blank" rel="noopener noreferrer" class="hover:text-sky-400">
                            hr@qalbit.com
                        </a>
                    </li>
                    <li>
                        <a href="tel:+918511900440" target="_blank" rel="noopener noreferrer" class="hover:text-sky-400">
                            +91 85119 00440
                        </a>
                    </li>
                </ul>
            </div>

            <div class="space-y-2 connect-container connect-meet-us">
                <div class="text-xs font-semibold uppercase tracking-[0.18em] text-slate-400 container-heading">
                    Meet Us In
                </div>
                <ul class="space-y-1 text-sm text-slate-200">
                    <li class="location">
                        <a
                            href="https://www.google.com/maps/place/QalbIT+Infotech+Pvt+Ltd/@22.9939346,72.4962177,999m/data=!3m2!1e3!4b1!4m6!3m5!1s0x395e9b4dcb551825:0xd2ca8b0aa98f5d41!8m2!3d22.9939346!4d72.4987926!16s%2Fg%2F11h4030jl3?entry=tts&g_ep=EgoyMDI1MDMwMi4wIPu8ASoASAFQAw%3D%3D"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="hover:text-sky-400"
                        >
                            C-109, Siddhi Vinayak Towers, Near Kataria Arcade, Opp. S.G. Highway,
                            Makarba, Ahmedabad, India - 380051.
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- 4. Navigation columns -->
        <nav
            class="grid gap-6 pb-6 md:grid-cols-5"
            aria-label="Footer navigation"
            data-footer-nav
        >
            <!-- Discover QalbIT -->
            <div class="space-y-2 links-container link-qalbit">
                <div class="text-xs font-semibold uppercase tracking-[0.18em] text-slate-400 container-heading">
                    Discover QalbIT
                </div>
                <ul class="space-y-1 text-sm text-slate-300">
                    <li>
                        <a title="Learn more about QalbIT" href="<?= route_url('/about-us/') ?>" class="hover:text-sky-400">
                            About Us
                        </a>
                    </li>
                    <li>
                        <a title="Explore the technologies we use" href="<?= route_url('/technologies/') ?>" class="hover:text-sky-400">
                            Technologies
                        </a>
                    </li>
                    <li>
                        <a title="View our services" href="<?= route_url('/services/') ?>" class="hover:text-sky-400">
                            Our Services
                        </a>
                    </li>
                    <li>
                        <a title="Explore the industry we serve" href="<?= route_url('/industries/') ?>" class="hover:text-sky-400">
                            Our Industries
                        </a>
                    </li>
                    <li>
                        <a title="Check out our work" href="<?= route_url('/portfolio/') ?>" class="hover:text-sky-400">
                            Our Work
                        </a>
                    </li>
                    <li>
                        <a title="Read detailed case studies of products we built" href="<?= route_url('/case-studies/') ?>" class="hover:text-sky-400">
                            Case Studies
                        </a>
                    </li>
                    <li>
                        <a title="Estimate your software development cost instantly" href="<?= route_url('/tools/software-development-cost-calculator/') ?>" class="hover:text-sky-400">
                            Cost Calculator
                        </a>
                    </li>
                    <li>
                        <a title="SaaS products we built and operate" href="<?= route_url('/products/') ?>" class="hover:text-sky-400">
                            Our Products
                        </a>
                    </li>
                    <li>
                        <a title="Contact us for more information" href="<?= route_url('/contact-us/') ?>" class="hover:text-sky-400">
                            Contact Us
                        </a>
                    </li>
                    <li>
                        <a title="Explore career opportunities with us" href="<?= route_url('/career/') ?>" class="hover:text-sky-400">
                            Job Opportunities
                        </a>
                    </li>
                    <li>
                        <a title="Read our latest blog posts" href="<?= route_url('/blog/') ?>" class="hover:text-sky-400">
                            Our Insights
                        </a>
                    </li>
                    <li>
                        <a title="View our full sitemap with all pages" href="<?= route_url('/sitemap/') ?>" class="hover:text-sky-400">
                            Sitemap
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Our Process -->
            <div class="space-y-2 links-container link-process">
                <div class="text-xs font-semibold uppercase tracking-[0.18em] text-slate-400 container-heading">
                    Our Process
                </div>
                <ul class="space-y-1 text-sm text-slate-300">
                    <li>
                        <a
                            title="Learn about our approach to creating Minimal Viable Products"
                            href="<?= route_url('/start-up-mvp/') ?>"
                            class="hover:text-sky-400"
                        >
                            Minimal Viable Product
                        </a>
                    </li>
                    <li>
                        <a
                            title="Discover how we scale products for growth"
                            href="<?= route_url('/product-scaling/') ?>"
                            class="hover:text-sky-400"
                        >
                            Product Scaling Team
                        </a>
                    </li>
                    <li>
                        <a
                            title="See how we help companies digitally transform"
                            href="<?= route_url('/digital-transformation/') ?>"
                            class="hover:text-sky-400"
                        >
                            Digital Transformation
                        </a>
                    </li>
                    <li>
                        <a
                            title="Understand our client engagement model"
                            href="<?= route_url('/engagement-model/') ?>"
                            class="hover:text-sky-400"
                        >
                            Engagement Model
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Services -->
            <div class="space-y-2 links-container link-services">
                <div class="text-xs font-semibold uppercase tracking-[0.18em] text-slate-400 container-heading">
                    Services
                </div>
                <ul class="space-y-1 text-sm text-slate-300">
                    <li>
                        <a title="AI Development Services" href="<?= route_url('/services/ai-solutions/') ?>" class="hover:text-sky-400">
                            AI Solutions
                        </a>
                    </li>
                    <li>
                        <a title="Custom Web Development Services" href="<?= route_url('/services/custom-web-development/') ?>" class="hover:text-sky-400">
                            Web Development
                        </a>
                    </li>
                    <li>
                        <a title="Mobile App Development Services" href="<?= route_url('/services/mobile-development/') ?>" class="hover:text-sky-400">
                            Mobile App Development
                        </a>
                    </li>
                    <li>
                        <a title="E-commerce Solutions for Your Business" href="<?= route_url('/services/e-commerce/') ?>" class="hover:text-sky-400">
                            E-commerce Solutions
                        </a>
                    </li>
                    <li>
                        <a title="Cloud-Based Solutions to Enhance Your Operations" href="<?= route_url('/services/cloud-based-solutions/') ?>" class="hover:text-sky-400">
                            Cloud-Based Solutions
                        </a>
                    </li>
                    <li>
                        <a title="Bespoke Software Development Tailored to Your Needs" href="<?= route_url('/services/custom-software-development/') ?>" class="hover:text-sky-400">
                            Software Development
                        </a>
                    </li>
                    <li>
                        <a title="UI/UX Design Services to Elevate User Experience" href="<?= route_url('/services/ui-ux-design-service/') ?>" class="hover:text-sky-400">
                            UI/UX Design Services
                        </a>
                    </li>
                    <li>
                        <a title="Backend & API Development Services for Seamless Integration" href="<?= route_url('/services/backend-development/') ?>" class="hover:text-sky-400">
                            Backend & API Development
                        </a>
                    </li>
                    <li>
                        <a title="SaaS Solutions to Empower Your Business" href="<?= route_url('/services/saas/') ?>" class="hover:text-sky-400">
                            SaaS Solutions
                        </a>
                    </li>
                    <li>
                        <a title="Custom CRM Development Tailored to Your Sales Process" href="<?= route_url('/services/crm-development/') ?>" class="hover:text-sky-400">
                            CRM Development
                        </a>
                    </li>
                    <li>
                        <a title="Custom ERP Software Development for Growing Operations" href="<?= route_url('/services/erp-development/') ?>" class="hover:text-sky-400">
                            ERP Development
                        </a>
                    </li>
                    <li>
                        <a title="MVP Development for Startups – Launch in Weeks" href="<?= route_url('/services/mvp-development/') ?>" class="hover:text-sky-400">
                            MVP Development
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Industry -->
            <div class="space-y-2 links-container link-industry">
                <div class="text-xs font-semibold uppercase tracking-[0.18em] text-slate-400 container-heading">
                    Industry
                </div>
                <ul class="space-y-1 text-sm text-slate-300">
                    <li>
                        <a title="Discover our solutions for the E-commerce industry" href="<?= route_url('/industries/e-commerce/') ?>" class="hover:text-sky-400">
                            E-Commerce
                        </a>
                    </li>
                    <li>
                        <a title="Explore our services for the Entertainment industry" href="<?= route_url('/industries/entertainment/') ?>" class="hover:text-sky-400">
                            Entertainment
                        </a>
                    </li>
                    <li>
                        <a title="Find out how we innovate in the Fintech sector" href="<?= route_url('/industries/fintech/') ?>" class="hover:text-sky-400">
                            Fintech
                        </a>
                    </li>
                    <li>
                        <a title="See our Travel industry solutions" href="<?= route_url('/industries/travel/') ?>" class="hover:text-sky-400">
                            Travel
                        </a>
                    </li>
                    <li>
                        <a title="Learn about our Food Delivery services" href="<?= route_url('/industries/food-delivery/') ?>" class="hover:text-sky-400">
                            Food Delivery
                        </a>
                    </li>
                    <li>
                        <a title="Check out our services for the Sports industry" href="<?= route_url('/industries/sports/') ?>" class="hover:text-sky-400">
                            Sports
                        </a>
                    </li>
                    <li>
                        <a title="Explore Healthcare solutions we offer" href="<?= route_url('/industries/healthcare/') ?>" class="hover:text-sky-400">
                            Healthcare
                        </a>
                    </li>
                    <li>
                        <a title="Discover our Educational services and solutions" href="<?= route_url('/industries/education/') ?>" class="hover:text-sky-400">
                            Education
                        </a>
                    </li>
                    <li>
                        <a title="Real Estate solutions to grow your business" href="<?= route_url('/industries/real-estate/') ?>" class="hover:text-sky-400">
                            Real Estate
                        </a>
                    </li>
                    <li>
                        <a title="Social Networking services to connect and engage" href="<?= route_url('/industries/social-networking/') ?>" class="hover:text-sky-400">
                            Social Networking
                        </a>
                    </li>
                    <li>
                        <a title="Business services for modern companies" href="<?= route_url('/industries/business/') ?>" class="hover:text-sky-400">
                            Business
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Hire Developers -->
            <div class="space-y-2 links-container link-hire">
                <div class="text-xs font-semibold uppercase tracking-[0.18em] text-slate-400 container-heading">
                    Hire Developers
                </div>
                <ul class="space-y-1 text-sm text-slate-300">
                    <li>
                        <a
                            title="Hire skilled Laravel developers for your projects"
                            href="<?= route_url('/hire-laravel-developers/') ?>"
                            class="hover:text-sky-400"
                        >
                            Hire Laravel Developers
                        </a>
                    </li>
                    <li>
                        <a
                            title="Engage our expert Node.js developers for your development needs"
                            href="<?= route_url('/hire-nodejs-developers/') ?>"
                            class="hover:text-sky-400"
                        >
                            Hire Node.js Developers
                        </a>
                    </li>
                    <li>
                        <a
                            title="Engage our expert Next.js developers for your development needs"
                            href="<?= route_url('/hire-nextjs-developers/') ?>"
                            class="hover:text-sky-400"
                        >
                            Hire Next.js Developers
                        </a>
                    </li>
                    <li>
                        <a
                            title="Engage our expert Flutter developers for your development needs"
                            href="<?= route_url('/hire-flutter-developers/') ?>"
                            class="hover:text-sky-400"
                        >
                            Hire Flutter Developers
                        </a>
                    </li>
                    <li>
                        <a
                            title="Hire skilled React.js developers for your frontend projects"
                            href="<?= route_url('/hire-reactjs-developers/') ?>"
                            class="hover:text-sky-400"
                        >
                            Hire React.js Developers
                        </a>
                    </li>
                    <li>
                        <a
                            title="Hire MVP developers to launch your startup faster"
                            href="<?= route_url('/hire-mvp-developers/') ?>"
                            class="hover:text-sky-400"
                        >
                            Hire MVP Developers
                        </a>
                    </li>
                    <li>
                        <a
                            title="Hire dedicated developers in India – all profiles"
                            href="<?= route_url('/hire-developers/') ?>"
                            class="hover:text-sky-400"
                        >
                            All Developer Profiles
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- 5. Locations we serve -->
        <?php
        $geoByCountry = [];
        foreach (config('geo', []) as $geoEntry) {
            if (empty($geoEntry['enabled']) || empty($geoEntry['slug']) || empty($geoEntry['name'])) {
                continue;
            }
            $nameParts = array_map('trim', explode(',', $geoEntry['name']));
            $geoCountry = count($nameParts) > 1 ? array_pop($nameParts) : 'Worldwide';
            $geoByCountry[$geoCountry][] = [
                'label' => implode(', ', $nameParts),
                'slug'  => $geoEntry['slug'],
                'name'  => $geoEntry['name'],
            ];
        }
        ?>
        <?php if (!empty($geoByCountry)): ?>
            <nav class="border-t border-slate-700/60 pt-5 pb-1" aria-label="Locations we serve">
                <p class="mb-3 text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-300">
                    Locations we serve
                </p>
                <div class="space-y-2.5">
                    <?php foreach ($geoByCountry as $countryLabel => $countryLocations): ?>
                        <div class="flex flex-wrap items-center gap-y-1.5">
                            <span class="mr-3 inline-flex items-center rounded-full bg-slate-800 px-2.5 py-0.5 text-[10px] font-semibold uppercase tracking-wide text-slate-300">
                                <?= htmlspecialchars($countryLabel) ?>
                            </span>
                            <?php foreach ($countryLocations as $i => $loc): ?>
                                <?php if ($i > 0): ?>
                                    <span class="mx-2 text-slate-600" aria-hidden="true">·</span>
                                <?php endif; ?>
                                <a
                                    title="Custom software development in <?= htmlspecialchars($loc['name']) ?>"
                                    href="<?= route_url($loc['slug']) ?>"
                                    class="text-xs text-slate-400 transition-colors hover:text-sky-400"
                                ><?= htmlspecialchars($loc['label']) ?></a>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </nav>
        <?php endif; ?>

        <!-- 6. Copyright + legal -->
        <div class="flex flex-col gap-3 pt-2 text-xs text-slate-400 md:flex-row md:items-center md:justify-between">
            <p class="copyright-text">
                © Copyright <?= $currentYear ?>. All rights reserved by QalbIT Infotech Pvt Ltd.
            </p>

            <ul class="flex flex-wrap items-center gap-4">
                <li>
                    <a href="https://qalbit.com/privacy-policy/" class="hover:text-sky-400">
                        Privacy Policy
                    </a>
                </li>
                <li>
                    <a href="https://qalbit.com/terms-and-condition/" class="hover:text-sky-400">
                        Terms of Service
                    </a>
                </li>
                <li>
                    <a
                        target="_blank"
                        rel="noopener noreferrer"
                        href="https://www.dmca.com/Protection/Status.aspx?ID=1369625d-1306-472c-afec-8d78bdacae4c"
                        title="DMCA.com Protection Status"
                        class="dmca-badge"
                    >
                        <img
                            src="https://images.dmca.com/Badges/dmca-badge-w200-5x1-10.png?ID=1369625d-1306-472c-afec-8d78bdacae4c"
                            width="200"
                            height="40"
                            loading="lazy"
                            decoding="async"
                            alt="DMCA.com Protection Status"
                        />
                    </a>
                    <script
                        src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js"
                        type="8dcc17a26e8b5444ae691aa4-text/javascript"
                    ></script>
                </li>
            </ul>
        </div>
    </div>
</footer>
