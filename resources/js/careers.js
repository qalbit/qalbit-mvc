// public/assets/js/careers.js
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

    /**
     * Generic reveal-on-scroll helper using GSAP + ScrollTrigger when available,
     * falling back to IntersectionObserver when not.
     */
    function revealOnScroll(section, targets, ctx, options) {
        const { gsap, hasGsap, hasScrollTrigger, prefersReducedMotion } = ctx;

        const elements = Array.from(
            typeof targets === "string" ? section.querySelectorAll(targets) : targets
        ).filter(Boolean);

        if (!elements.length) return;

        const initialY = options && typeof options.y === "number" ? options.y : 32;
        const stagger = options && typeof options.stagger === "number" ? options.stagger : 0.08;
        const start   = (options && options.start) || "top 80%";
        const duration = (options && options.duration) || 0.7;

        // No GSAP or reduced motion: just fade-in on intersection using classes
        if (!hasGsap || prefersReducedMotion) {
            const observer = new IntersectionObserver(
                (entries, obs) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add("is-visible");
                            obs.unobserve(entry.target);
                        }
                    });
                },
                { threshold: 0.2 }
            );

            elements.forEach((el) => {
                el.classList.add("will-reveal");
                observer.observe(el);
            });

            return;
        }

        // GSAP path
        gsap.set(elements, {
            opacity: 0,
            y: initialY,
            ...((options && options.initial) || {}),
        });

        if (hasScrollTrigger) {
            // Ensure plugin is registered
            if (typeof window.ScrollTrigger !== "undefined") {
                gsap.registerPlugin(window.ScrollTrigger);
            }

            gsap.to(elements, {
                opacity: 1,
                y: 0,
                duration,
                ease: "power3.out",
                stagger,
                scrollTrigger: {
                    trigger: section,
                    start,
                    toggleActions: "play none none reverse",
                },
            });
        } else {
            const io = new IntersectionObserver(
                (entries, obs) => {
                    entries.forEach((entry) => {
                        if (!entry.isIntersecting) return;

                        gsap.to(entry.target, {
                            opacity: 1,
                            y: 0,
                            duration,
                            ease: "power3.out",
                        });

                        obs.unobserve(entry.target);
                    });
                },
                { threshold: 0.2 }
            );

            elements.forEach((el) => io.observe(el));
        }
    }

    // ------------------------------
    // Section inits
    // ------------------------------

    // C1 – Hero
    function initCareersHeroSection(ctx) {
        const { gsap, hasGsap, prefersReducedMotion } = ctx;
        const section = document.querySelector('[data-careers-section="hero"]');
        if (!section) return;

        const copyEls = section.querySelectorAll(
            '[data-careers-el], h1, h2, p, a, [data-hero-meta]'
        );
        if (!copyEls.length) return;

        if (!hasGsap || prefersReducedMotion) {
            copyEls.forEach((el) => {
                el.classList.add("is-visible");
            });
            return;
        }

        // Subtle entrance on page load (no scroll trigger)
        gsap.set(copyEls, {
            opacity: 0,
            y: 32,
            rotateX: 6,
            transformOrigin: "center bottom",
        });

        gsap.to(copyEls, {
            opacity: 1,
            y: 0,
            rotateX: 0,
            duration: 0.9,
            ease: "power3.out",
            stagger: 0.08,
            delay: 0.1,
        });
    }

    // C2 – Why QalbIT
    function initCareersWhySection(ctx) {
        const section = document.querySelector('[data-careers-section="why"]');
        if (!section) return;

        const targets = section.querySelectorAll(
            '[data-careers-el], h2, h3, p, li'
        );
        if (!targets.length) return;

        revealOnScroll(section, targets, ctx, {
            y: 28,
            stagger: 0.06,
            start: "top 80%",
            duration: 0.7,
        });
    }

    // C3 – Openings
    function initCareersOpeningsSection(ctx) {
        const section = document.querySelector('[data-careers-section="openings"]');
        if (!section) return;

        const cards = section.querySelectorAll('[data-careers-el="open-role-card"]');
        if (!cards.length) return;

        revealOnScroll(section, cards, ctx, {
            y: 24,
            stagger: 0.05,
            duration: 0.65,
        });
    }

    // C4 – Benefits
    function initCareersBenefitsSection(ctx) {
        const section = document.querySelector('[data-careers-section="benefits"]');
        if (!section) return;

        const cards = section.querySelectorAll(
            '[data-careers-el="benefit-card"], [data-careers-el="benefits-card"], article, li'
        );
        if (!cards.length) return;

        revealOnScroll(section, cards, ctx, {
            y: 24,
            stagger: 0.05,
            start: "top 82%",
        });
    }

    // C5 – Life at QalbIT
    function initCareersLifeSection(ctx) {
        const section = document.querySelector('[data-careers-section="life"]');
        if (!section) return;

        const blocks = section.querySelectorAll(
            '[data-careers-el="life-block"], [data-careers-el="life-media"], article, li'
        );
        if (!blocks.length) return;

        revealOnScroll(section, blocks, ctx, {
            y: 30,
            stagger: 0.06,
            start: "top 85%",
        });
    }

    // C7 - Final CTA
    function initCareersCtaSection(ctx) {
        const section = document.querySelector('[data-careers-section="final-cta"]');
        if (!section) return;

        // Main content block (heading, text, buttons)
        const content = section.querySelectorAll(
            '[data-careers-el="cta-content"], h2, p, a, [data-cta-meta]'
        );
        if (!content.length) return;

        revealOnScroll(section, content, ctx, {
            y: 24,
            stagger: 0.05,
            start: "top 88%",
            duration: 0.7,
        });

        // Optional background accent if you added something like data-careers-el="cta-bg"
        const bg = section.querySelector('[data-careers-el="cta-bg"]');
        if (bg && ctx.hasGsap && !ctx.prefersReducedMotion) {
            const gsap = ctx.gsap;
            const hasScrollTrigger = ctx.hasScrollTrigger;

            gsap.set(bg, {
                opacity: 0,
                scale: 0.95,
            });

            if (hasScrollTrigger && typeof window.ScrollTrigger !== "undefined") {
                gsap.registerPlugin(window.ScrollTrigger);

                gsap.to(bg, {
                    opacity: 1,
                    scale: 1,
                    duration: 0.9,
                    ease: "power3.out",
                    scrollTrigger: {
                        trigger: section,
                        start: "top 90%",
                        toggleActions: "play none none reverse",
                    },
                });
            } else {
                const io = new IntersectionObserver(
                    (entries, obs) => {
                        entries.forEach((entry) => {
                            if (!entry.isIntersecting) return;

                            gsap.to(bg, {
                                opacity: 1,
                                scale: 1,
                                duration: 0.9,
                                ease: "power3.out",
                            });

                            obs.unobserve(entry.target);
                        });
                    },
                    { threshold: 0.2 }
                );

                io.observe(bg);
            }
        }
    }

    // ------------------------------
    // Bootstrapping for careers page
    // ------------------------------
    onReady(function () {
        const body = document.body;
        if (!body || !body.classList.contains("page-careers")) {
            return;
        }
        
        const hasMatchMedia = typeof window.matchMedia === "function";

        const mqReducedMotion = hasMatchMedia
            ? window.matchMedia("(prefers-reduced-motion: reduce)")
            : null;
        const prefersReducedMotion = !!(mqReducedMotion && mqReducedMotion.matches);

        const hasGsap = typeof window.gsap !== "undefined";
        const gsap = hasGsap ? window.gsap : null;
        const hasScrollTrigger = hasGsap && typeof window.ScrollTrigger !== "undefined";

        if (hasScrollTrigger) {
            gsap.registerPlugin(window.ScrollTrigger);
        }

        const ctx = {
            gsap,
            hasGsap,
            hasScrollTrigger,
            prefersReducedMotion,
        };

        initCareersHeroSection(ctx);
        initCareersWhySection(ctx);
        initCareersOpeningsSection(ctx);
        initCareersBenefitsSection(ctx);
        initCareersLifeSection(ctx);
        initCareersCtaSection(ctx);
    });
})();
