(function () {
    "use strict";

    // ------------------------------
    // Helpers
    // ------------------------------
    function onReady(fn) {
        if (document.readyState === "loading") {
            document.addEventListener("DOMContentLoaded", fn, { once: true });
        } else {
            fn();
        }
    }

    onReady(function () {
        const body = document.body;
        if (!body || !body.classList.contains("page-services")) {
            // Only run this script on the Services page
            return;
        }

        const hasMatchMedia = typeof window.matchMedia === "function";

        const mqReducedMotion = hasMatchMedia
            ? window.matchMedia("(prefers-reduced-motion: reduce)")
            : null;
        const prefersReducedMotion = !!(
            mqReducedMotion && mqReducedMotion.matches
        );

        const mqDesktop = hasMatchMedia
            ? window.matchMedia("(min-width: 1024px)")
            : null;
        const isDesktop = () =>
            mqDesktop ? mqDesktop.matches : window.innerWidth >= 1024;

        const hasGsap = typeof window.gsap !== "undefined";
        const gsap = hasGsap ? window.gsap : null;
        const hasScrollTrigger =
            hasGsap && typeof window.ScrollTrigger !== "undefined";

        if (hasScrollTrigger) {
            gsap.registerPlugin(window.ScrollTrigger);
        }

        initServicesHeroSection({ gsap, hasGsap, prefersReducedMotion, isDesktop });
        initServicesGridSection({ gsap, hasGsap, prefersReducedMotion });
        initEngagementModelsSection({ gsap, hasGsap, prefersReducedMotion });
        initServicesProcessSection({ gsap, hasGsap, prefersReducedMotion });
        initServicesIndustriesSection({ gsap, hasGsap, prefersReducedMotion });
        initServicesCaseTeasersSection({ gsap, hasGsap, prefersReducedMotion });
        initServicesContactSection({ gsap, hasGsap, prefersReducedMotion });
    });

    // --------------------------------------------------------
    // 1) Hero – subtle entrance animation
    // --------------------------------------------------------
    function initServicesHeroSection(ctx) {
        const { gsap, hasGsap, prefersReducedMotion } = ctx;
        const section = document.querySelector("[data-section-services]");
        if (!section) return;

        const heroEls = Array.from(section.querySelectorAll("[data-hero-el]"));
        if (!heroEls.length) return;

        // If GSAP missing or user prefers reduced motion → keep static
        if (!hasGsap || prefersReducedMotion) {
            return;
        }

        // Use gsap.from so elements are visible by default if animation never runs
        let hasAnimated = false;

        function animateIn() {
            if (hasAnimated) return;
            hasAnimated = true;

            gsap.from(heroEls, {
                y: 26,
                autoAlpha: 0,
                duration: 0.7,
                ease: "power3.out",
                stagger: 0.12,
            });
        }

        if ("IntersectionObserver" in window) {
            const io = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (entry.target !== section) return;
                        if (entry.isIntersecting) {
                            animateIn();
                            io.disconnect();
                        }
                    });
                },
                { threshold: 0.25 }
            );

            io.observe(section);
        } else {
            animateIn();
        }
    }

    // --------------------------------------------------------
    // 2) Services grid – cards fade & lift on scroll (FIXED)
    // --------------------------------------------------------
    function initServicesGridSection(ctx) {
        const { gsap, hasGsap, prefersReducedMotion } = ctx;
        const section = document.querySelector('[data-animate="services-grid"]');
        if (!section) return;

        const cards = Array.from(section.querySelectorAll("[data-service-card]"));
        if (!cards.length) return;

        // If no GSAP or reduced motion → leave cards as-is (visible, no animation)
        if (!hasGsap || prefersReducedMotion) {
            return;
        }

        // IMPORTANT:
        // We use gsap.from (not gsap.set + gsap.to),
        // so if the animation never fires, cards stay visible.
        let hasAnimated = false;

        function animateIn() {
            if (hasAnimated) return;
            hasAnimated = true;

            gsap.from(cards, {
                y: 30,
                autoAlpha: 0,
                duration: 0.65,
                ease: "power3.out",
                stagger: 0.08,
            });
        }

        if ("IntersectionObserver" in window) {
            const io = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (entry.target !== section) return;
                        if (entry.isIntersecting) {
                            animateIn();
                            io.disconnect();
                        }
                    });
                },
                { threshold: 0.25 }
            );

            io.observe(section);
        } else {
            // Fallback: animate immediately
            animateIn();
        }
    }

    // --------------------------------------------------------
    // 3) Engagement models – slide-in cards
    // --------------------------------------------------------
    function initEngagementModelsSection(ctx) {
        const { gsap, hasGsap, prefersReducedMotion } = ctx;
        const section = document.querySelector(
            '[data-animate="engagement-models"]'
        );
        if (!section) return;

        const cards = Array.from(
            section.querySelectorAll("[data-engagement-card]")
        );
        if (!cards.length) return;

        if (!hasGsap || prefersReducedMotion) {
            return;
        }

        let hasAnimated = false;

        function animateIn() {
            if (hasAnimated) return;
            hasAnimated = true;

            gsap.from(cards, {
                x: -22,
                autoAlpha: 0,
                duration: 0.65,
                ease: "power3.out",
                stagger: 0.1,
            });
        }

        if ("IntersectionObserver" in window) {
            const io = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (entry.target !== section) return;
                        if (entry.isIntersecting) {
                            animateIn();
                            io.disconnect();
                        }
                    });
                },
                { threshold: 0.25 }
            );

            io.observe(section);
        } else {
            animateIn();
        }
    }

    // --------------------------------------------------------
    // 4) Process steps – staggered reveal
    // --------------------------------------------------------
    function initServicesProcessSection(ctx) {
        const { gsap, hasGsap, prefersReducedMotion } = ctx;
        const section = document.querySelector('[data-animate="process"]');
        if (!section) return;

        const steps = Array.from(
            section.querySelectorAll("[data-process-step]")
        );
        if (!steps.length) return;

        if (!hasGsap || prefersReducedMotion) {
            return;
        }

        let hasAnimated = false;

        function animateIn() {
            if (hasAnimated) return;
            hasAnimated = true;

            gsap.from(steps, {
                y: 24,
                autoAlpha: 0,
                duration: 0.6,
                ease: "power2.out",
                stagger: 0.08,
            });
        }

        if ("IntersectionObserver" in window) {
            const io = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (entry.target !== section) return;
                        if (entry.isIntersecting) {
                            animateIn();
                            io.disconnect();
                        }
                    });
                },
                { threshold: 0.25 }
            );

            io.observe(section);
        } else {
            animateIn();
        }
    }

    // --------------------------------------------------------
    // 5) Industries & use cases – chips fade in
    // --------------------------------------------------------
    function initServicesIndustriesSection(ctx) {
        const { gsap, hasGsap, prefersReducedMotion } = ctx;
        const section = document.querySelector('[data-animate="industries"]');
        if (!section) return;

        const container = section.querySelector("[data-industry-tags]");
        if (!container) return;

        const tags = Array.from(container.children);
        if (!tags.length) return;

        if (!hasGsap || prefersReducedMotion) {
            return;
        }

        let hasAnimated = false;

        function animateIn() {
            if (hasAnimated) return;
            hasAnimated = true;

            gsap.from(tags, {
                y: 18,
                autoAlpha: 0,
                duration: 0.5,
                ease: "power2.out",
                stagger: 0.06,
            });
        }

        if ("IntersectionObserver" in window) {
            const io = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (entry.target !== section) return;
                        if (entry.isIntersecting) {
                            animateIn();
                            io.disconnect();
                        }
                    });
                },
                { threshold: 0.2 }
            );

            io.observe(section);
        } else {
            animateIn();
        }
    }

    // --------------------------------------------------------
    // 6) Case teasers – cards stagger in
    // --------------------------------------------------------
    function initServicesCaseTeasersSection(ctx) {
        const { gsap, hasGsap, prefersReducedMotion } = ctx;
        const section = document.querySelector('[data-animate="case-teasers"]');
        if (!section) return;

        const cards = Array.from(section.querySelectorAll("[data-case-card]"));
        if (!cards.length) return;

        if (!hasGsap || prefersReducedMotion) {
            return;
        }

        let hasAnimated = false;

        function animateIn() {
            if (hasAnimated) return;
            hasAnimated = true;

            gsap.from(cards, {
                y: 24,
                autoAlpha: 0,
                duration: 0.6,
                ease: "power3.out",
                stagger: 0.1,
            });
        }

        if ("IntersectionObserver" in window) {
            const io = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (entry.target !== section) return;
                        if (entry.isIntersecting) {
                            animateIn();
                            io.disconnect();
                        }
                    });
                },
                { threshold: 0.25 }
            );

            io.observe(section);
        } else {
            animateIn();
        }
    }

    // --------------------------------------------------------
    // 7) Contact section – header + form entrance
    // --------------------------------------------------------
    function initServicesContactSection(ctx) {
        const { gsap, hasGsap, prefersReducedMotion } = ctx;
        const section = document.querySelector("[data-contact-section]");
        if (!section) return;

        const wrapper = section.querySelector(".mx-auto");
        if (!wrapper) return;

        const blocks = Array.from(wrapper.children); // header + form container
        if (!blocks.length) return;

        if (!hasGsap || prefersReducedMotion) {
            return;
        }

        let hasAnimated = false;

        function animateIn() {
            if (hasAnimated) return;
            hasAnimated = true;

            gsap.from(blocks, {
                y: 26,
                autoAlpha: 0,
                duration: 0.65,
                ease: "power3.out",
                stagger: 0.12,
            });
        }

        if ("IntersectionObserver" in window) {
            const io = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (entry.target !== section) return;
                        if (entry.isIntersecting) {
                            animateIn();
                            io.disconnect();
                        }
                    });
                },
                { threshold: 0.25 }
            );

            io.observe(section);
        } else {
            animateIn();
        }
    }
})();
