/**
 * case-studies.js
 *
 * Reusable scroll/entrance animations for case study pages.
 * Applies to all projects (Snappy Stats, Bloomford, Hellory, Plugn, etc.).
 */

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
     * Generic helper to animate a section when it enters the viewport.
     *
     * @param {Object} ctx
     * @param {string} sectionSelector - e.g. '[data-cs-section="hero"]'
     * @param {Object} options
     *   - elementsSelector {string} (optional) – subset within the section to animate
     *   - from {Object} (optional) – gsap.set() vars
     *   - to {Object}   (optional) – gsap.to()   vars
     *   - threshold {number} (optional) – intersection threshold
     */
    function revealSectionOnScroll(ctx, sectionSelector, options) {
        const {
            hasGsap,
            gsap,
            prefersReducedMotion,
            supportsIntersectionObserver,
        } = ctx;

        const section = document.querySelector(sectionSelector);
        if (!section) return;

        const threshold = options && typeof options.threshold === "number"
            ? options.threshold
            : 0.25;

        let elements;

        if (options && options.elementsSelector) {
            elements = section.querySelectorAll(options.elementsSelector);
        } else {
            // Prefer explicit hooks; otherwise fall back to direct children
            const hooked = section.querySelectorAll("[data-cs-el], [data-cs-animate]");
            elements = hooked.length ? hooked : section.children;
        }

        elements = Array.prototype.slice.call(elements || []);
        if (!elements.length) return;

        // Fallback: no GSAP or motion reduced or no IntersectionObserver
        if (!hasGsap || prefersReducedMotion || !supportsIntersectionObserver) {
            elements.forEach(function (el) {
                el.style.opacity = "";
                el.style.transform = "";
            });
            return;
        }

        const fromVars = Object.assign(
            {
                opacity: 0,
                y: 32,
                rotateX: 0,
            },
            (options && options.from) || {}
        );

        const toVars = Object.assign(
            {
                opacity: 1,
                y: 0,
                duration: 0.8,
                ease: "power2.out",
                stagger: {
                    each: 0.06,
                    from: "start",
                },
                clearProps: "transform,opacity",
            },
            (options && options.to) || {}
        );

        gsap.set(elements, fromVars);

        const observer = new IntersectionObserver(
            function (entries, obs) {
                entries.forEach(function (entry) {
                    if (!entry.isIntersecting) return;

                    obs.unobserve(entry.target);
                    gsap.to(elements, toVars);
                });
            },
            {
                root: null,
                rootMargin: "0px 0px -10% 0px",
                threshold: threshold,
            }
        );

        observer.observe(section);
    }

    /**
     * Optional subtle parallax for hero media when ScrollTrigger is available.
     */
    function initHeroParallax(ctx) {
        const { hasGsap, gsap, prefersReducedMotion, hasScrollTrigger } = ctx;
        if (!hasGsap || !hasScrollTrigger || prefersReducedMotion) return;

        const media = document.querySelector(
            '[data-cs-section="hero"] [data-cs-el="hero-media"]'
        );
        if (!media) return;

        try {
            gsap.fromTo(
                media,
                { y: 0 },
                {
                    y: -40,
                    ease: "none",
                    scrollTrigger: {
                        trigger: media,
                        start: "top bottom",
                        end: "bottom top",
                        scrub: true,
                    },
                }
            );
        } catch (e) {
            // Silent fail if ScrollTrigger is not registered correctly
        }
    }

    // ------------------------------
    // Section initialisers
    // ------------------------------
    function initCaseStudyHeroSection(ctx) {
        const { hasGsap, gsap, prefersReducedMotion } = ctx;

        const section = document.querySelector('[data-cs-section="hero"]');
        if (!section) return;

        // Collect hero elements; fall back to section children if hooks missing
        let elements = section.querySelectorAll(
            [
                '[data-cs-el="hero-kicker"]',
                '[data-cs-el="hero-title"]',
                '[data-cs-el="hero-subtitle"]',
                '[data-cs-el="hero-cta"]',
                '[data-cs-el="snapshot-card"]',
                '[data-cs-el="hero-media"]',
            ].join(", ")
        );

        if (!elements.length) {
            elements = section.children;
        }
        elements = Array.prototype.slice.call(elements || []);
        if (!elements.length) return;

        // If no GSAP or user prefers reduced motion → show everything immediately
        if (!hasGsap || prefersReducedMotion) {
            elements.forEach(function (el) {
                el.style.opacity = "";
                el.style.transform = "";
            });
            return;
        }

        // Initial state
        gsap.set(elements, {
            opacity: 0,
            y: 32,
        });

        // Timeline on page load
        const tl = gsap.timeline({
            defaults: {
                ease: "power3.out",
                duration: 0.75,
            },
        });

        tl.to(elements, {
            opacity: 1,
            y: 0,
            stagger: {
                each: 0.07,
                from: "start",
            },
            clearProps: "transform,opacity",
        });

        // Optional parallax on scroll
        initHeroParallax(ctx);
    }

    function initCaseStudyAboutSection(ctx) {
        revealSectionOnScroll(ctx, '[data-cs-section="about"]', {
            elementsSelector:
                '[data-cs-el="about-heading"], [data-cs-el="about-copy"], [data-cs-el="about-glance"], [data-cs-el="about-glance-item"]',
        });
    }

    function initCaseStudyChallengeSection(ctx) {
        revealSectionOnScroll(ctx, '[data-cs-section="challenge"]', {
            elementsSelector:
                '[data-cs-el="challenge-heading"], [data-cs-el="challenge-story"], [data-cs-el="challenge-list"], [data-cs-el="challenge-item"]',
            from: {
                opacity: 0,
                y: 40,
            },
        });
    }

    function initCaseStudyGoalsSection(ctx) {
        revealSectionOnScroll(ctx, '[data-cs-section="goals"]', {
            elementsSelector:
                '[data-cs-el="goals-heading"], [data-cs-el="goals-business"], [data-cs-el="goals-product"], [data-cs-el="goals-note"], [data-cs-el="goals-item"]',
            from: {
                opacity: 0,
                y: 36,
            },
        });
    }

    function initCaseStudySolutionSection(ctx) {
        revealSectionOnScroll(ctx, '[data-cs-section="solution"]', {
            elementsSelector:
                '[data-cs-el="solution-heading"], [data-cs-el="solution-intro"], [data-cs-el="solution-body"], [data-cs-el="solution-highlight"], [data-cs-el="solution-highlight-item"]',
            from: {
                opacity: 0,
                y: 32,
            },
        });
    }

    function initCaseStudyFeaturesSection(ctx) {
        revealSectionOnScroll(ctx, '[data-cs-section="features"]', {
            elementsSelector:
                '[data-cs-el="features-heading"], [data-cs-el="features-subtitle"], [data-cs-el="feature-card"], [data-cs-el="features-screenshot"]',
            from: {
                opacity: 0,
                y: 30,
            },
            to: {
                opacity: 1,
                y: 0,
                duration: 0.9,
                ease: "power2.out",
                stagger: {
                    each: 0.05,
                    from: "start",
                },
            },
        });
    }

    function initCaseStudyStackSection(ctx) {
        revealSectionOnScroll(ctx, '[data-cs-section="stack"]', {
            elementsSelector:
                '[data-cs-el="stack-heading"], [data-cs-el="stack-column"], [data-cs-el="stack-pill"]',
            from: {
                opacity: 0,
                y: 28,
            },
        });
    }

    function initCaseStudyProcessSection(ctx) {
        revealSectionOnScroll(ctx, '[data-cs-section="process"]', {
            elementsSelector:
                '[data-cs-el="process-heading"], [data-cs-el="process-steps"], [data-cs-el="process-step"], [data-cs-el="engagement-box"]',
            from: {
                opacity: 0,
                y: 36,
            },
        });
    }

    function initCaseStudyResultsSection(ctx) {
        revealSectionOnScroll(ctx, '[data-cs-section="results"]', {
            elementsSelector:
                '[data-cs-el="results-heading"], [data-cs-el="results-subtitle"], [data-cs-el="metric-card"], [data-cs-el="results-narrative"], [data-cs-el="testimonial"], [data-cs-el="inline-cta"]',
            from: {
                opacity: 0,
                y: 32,
            },
        });
    }

    function initCaseStudyRelatedSection(ctx) {
        revealSectionOnScroll(ctx, '[data-cs-section="related"]', {
            elementsSelector:
                '[data-cs-el="related-heading"], [data-cs-el="related-subtitle"], [data-cs-el="related-card"], [data-cs-el="services-used-heading"], [data-cs-el="service-link"]',
            from: {
                opacity: 0,
                y: 28,
            },
        });
    }

    function initCaseStudyFinalCtaSection(ctx) {
        // If your final CTA lives inside the same section as related,
        // you can keep this as a no-op or adjust the selector below.
        revealSectionOnScroll(ctx, '[data-cs-section="final-cta"]', {
            elementsSelector:
                '[data-cs-el="final-cta-eyebrow"], [data-cs-el="final-cta-title"], [data-cs-el="final-cta-text"], [data-cs-el="final-cta-primary"], [data-cs-el="final-cta-secondary"]',
            from: {
                opacity: 0,
                y: 30,
            },
        });
    }

    // ------------------------------
    // Bootstrap
    // ------------------------------

    onReady(function () {
        const body = document.body;
        if (!body || !body.classList.contains("page-casestudy-detail")) {
            return;
        }

        const hasGsap = typeof window.gsap !== "undefined";
        if (!hasGsap) return;

        const gsap = window.gsap;
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
        const isDesktop = function () {
            return mqDesktop ? mqDesktop.matches : window.innerWidth >= 1024;
        };

        const hasScrollTrigger =
            typeof window.ScrollTrigger !== "undefined" &&
            window.ScrollTrigger;

        const supportsIntersectionObserver =
            typeof window.IntersectionObserver === "function";

        const ctx = {
            hasGsap,
            gsap,
            prefersReducedMotion,
            isDesktop,
            hasScrollTrigger: !!hasScrollTrigger,
            supportsIntersectionObserver: supportsIntersectionObserver,
        };

        // Initialise all sections
        initCaseStudyHeroSection(ctx);
        initCaseStudyAboutSection(ctx);
        initCaseStudyChallengeSection(ctx);
        initCaseStudyGoalsSection(ctx);
        initCaseStudySolutionSection(ctx);
        initCaseStudyFeaturesSection(ctx);
        initCaseStudyStackSection(ctx);
        initCaseStudyProcessSection(ctx);
        initCaseStudyResultsSection(ctx);
        initCaseStudyRelatedSection(ctx);
        initCaseStudyFinalCtaSection(ctx);
    });
})();
