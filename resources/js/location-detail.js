(function () {
    "use strict";

    // ------------------------------------
    // Helpers
    // ------------------------------------
    function onReady(fn) {
        if (document.readyState === "loading") {
            document.addEventListener("DOMContentLoaded", fn, { once: true });
        } else {
            fn();
        }
    }

    function createOnceObserver(target, callback, options) {
        if (!("IntersectionObserver" in window)) {
            // Fallback: run immediately
            callback(target);
            return null;
        }

        const obs = new IntersectionObserver((entries, observer) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    observer.unobserve(entry.target);
                    callback(entry.target);
                }
            });
        }, options || { root: null, threshold: 0.2 });

        obs.observe(target);
        return obs;
    }

    // ------------------------------------
    // Boot
    // ------------------------------------
    onReady(function () {
        const body = document.body;
        if (!body || !body.classList.contains("page-location-detail")) {
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

        const ctx = { gsap, hasGsap, prefersReducedMotion };

        // Sections
        initLocationHeroSection(ctx);
        initLocationAboutSection(ctx);
        initLocationServicesSection(ctx);
        initLocationWhySection(ctx);
        initLocationProcessSection(ctx);
        initLocationEngagementsSection(ctx);
        initLocationTechSection(ctx);
        initLocationProofSection(ctx);
        initLocationFinalCtaSection(ctx);
    });

    // ==================================================
    // S1 – HERO
    // ==================================================
    function initLocationHeroSection(ctx) {
        const section = document.querySelector('[data-section-location-hero]');
        if (!section) return;
        
        const { hasGsap, gsap, prefersReducedMotion } = ctx;
        if (!hasGsap || prefersReducedMotion) return;
        const targets = section.querySelectorAll('[data-hero-el]');
        if (!targets.length) return;

        gsap.set(targets, { opacity: 0, y: 24 });

        createOnceObserver(section, function () {
            gsap.to(targets, {
                opacity: 1,
                y: 0,
                duration: 0.8,
                ease: "power2.out",
                stagger: 0.08,
            });
        });
    }

    // ==================================================
    // S2 – ABOUT
    // ==================================================
    function initLocationAboutSection(ctx) {
        const section = document.querySelector('[data-location-section-about]');
        if (!section) return;

        const { hasGsap, gsap, prefersReducedMotion } = ctx;
        if (!hasGsap || prefersReducedMotion) return;

        const header = section.querySelector('[data-location-el-header]');
        const cards = section.querySelectorAll('[data-location-el]');

        const targets = [];
        if (header) targets.push(header);
        cards.forEach((c) => targets.push(c));
        if (!targets.length) return;

        gsap.set(targets, { opacity: 0, y: 24 });

        createOnceObserver(section, function () {
            gsap.to(targets, {
                opacity: 1,
                y: 0,
                duration: 0.9,
                ease: "power2.out",
                stagger: 0.08,
            });
        });
    }

    // ==================================================
    // S3 – SERVICES
    // ==================================================
    function initLocationServicesSection(ctx) {
        const section = document.querySelector('[data-location-section-services]');
        if (!section) return;

        const { hasGsap, gsap, prefersReducedMotion } = ctx;
        if (!hasGsap || prefersReducedMotion) return;

        const header = section.querySelector('[data-location-el-header]');
        const cards  = section.querySelectorAll('[data-location-el-grid]');

        if (!header && !cards.length) return;

        if (header) {
            gsap.set(header, { opacity: 0, y: 20 });
        }

        gsap.set(cards, {
            opacity: 0,
            y: 32,
            rotateX: 6,
            transformOrigin: "center bottom",
        });

        createOnceObserver(section, function () {
            if (header) {
                gsap.to(header, {
                    opacity: 1,
                    y: 0,
                    duration: 0.6,
                    ease: "power2.out",
                });
            }

            if (cards.length) {
                gsap.to(cards, {
                    opacity: 1,
                    y: 0,
                    rotateX: 0,
                    duration: 0.8,
                    ease: "power2.out",
                    stagger: 0.08,
                });
            }
        });
    }

    // ==================================================
    // S4 – WHY
    // ==================================================
    function initLocationWhySection(ctx) {
        const section = document.querySelector('[data-location-section="why"]');
        if (!section) return;

        const { hasGsap, gsap, prefersReducedMotion } = ctx;
        if (!hasGsap || prefersReducedMotion) return;

        const header  = section.querySelector('[data-location-el="why-header"]');
        const cards   = section.querySelectorAll('[data-location-el="why-card"]');
        const bullets = section.querySelectorAll('[data-location-el="why-bullet"]');

        if (!header && !cards.length && !bullets.length) return;

        if (header) {
            gsap.set(header, { opacity: 0, y: 18 });
        }
        gsap.set(cards, {
            opacity: 0,
            y: 24,
            scale: 0.98,
            transformOrigin: "center center",
        });
        gsap.set(bullets, {
            opacity: 0,
            y: 12,
        });

        createOnceObserver(section, function () {
            if (header) {
                gsap.to(header, {
                    opacity: 1,
                    y: 0,
                    duration: 0.6,
                    ease: "power2.out",
                });
            }

            if (cards.length) {
                gsap.to(cards, {
                    opacity: 1,
                    y: 0,
                    scale: 1,
                    duration: 0.7,
                    ease: "power2.out",
                    stagger: 0.08,
                });
            }

            if (bullets.length) {
                gsap.to(bullets, {
                    opacity: 1,
                    y: 0,
                    duration: 0.5,
                    ease: "power2.out",
                    stagger: 0.03,
                    delay: 0.05,
                });
            }
        });
    }

    // ==================================================
    // S5 – PROCESS
    // ==================================================
    function initLocationProcessSection(ctx) {
        const section = document.querySelector('[data-location-section="process"]');
        if (!section) return;

        const { hasGsap, gsap, prefersReducedMotion } = ctx;
        if (!hasGsap || prefersReducedMotion) return;

        const header = section.querySelector('[data-location-el="process-header"]');
        const steps  = section.querySelectorAll('[data-location-el="process-step"]');

        if (!header && !steps.length) return;

        if (header) {
            gsap.set(header, { opacity: 0, y: 16 });
        }
        gsap.set(steps, {
            opacity: 0,
            y: 24,
            scale: 0.98,
            transformOrigin: "center center",
        });

        createOnceObserver(section, function () {
            if (header) {
                gsap.to(header, {
                    opacity: 1,
                    y: 0,
                    duration: 0.6,
                    ease: "power2.out",
                });
            }

            if (steps.length) {
                gsap.to(steps, {
                    opacity: 1,
                    y: 0,
                    scale: 1,
                    duration: 0.7,
                    ease: "power2.out",
                    stagger: 0.07,
                });
            }
        });
    }

    // ==================================================
    // S6 – ENGAGEMENTS
    // ==================================================
    function initLocationEngagementsSection(ctx) {
        const section = document.querySelector('[data-location-section="engagements"]');
        if (!section) return;

        const { hasGsap, gsap, prefersReducedMotion } = ctx;
        if (!hasGsap || prefersReducedMotion) return;

        const header = section.querySelector('[data-location-el="engagements-header"]');
        const cards  = section.querySelectorAll('[data-location-el="engagement-card"]');

        if (!header && !cards.length) return;

        if (header) {
            gsap.set(header, { opacity: 0, y: 18 });
        }
        gsap.set(cards, {
            opacity: 0,
            y: 28,
            transformOrigin: "center bottom",
        });

        createOnceObserver(section, function () {
            if (header) {
                gsap.to(header, {
                    opacity: 1,
                    y: 0,
                    duration: 0.6,
                    ease: "power2.out",
                });
            }

            if (cards.length) {
                gsap.to(cards, {
                    opacity: 1,
                    y: 0,
                    duration: 0.7,
                    ease: "power2.out",
                    stagger: 0.08,
                });
            }
        });
    }

    // ==================================================
    // S7 – TECH
    // ==================================================
    function initLocationTechSection(ctx) {
        const section = document.querySelector('[data-location-section="tech"]');
        if (!section) return;

        const { hasGsap, gsap, prefersReducedMotion } = ctx;
        if (!hasGsap || prefersReducedMotion) return;

        const header = section.querySelector('[data-location-el="tech-header"]');
        const grid   = section.querySelector('[data-location-el="tech-grid"]');
        const pills  = section.querySelectorAll('[data-location-el="tech-pill"]');

        if (!header && !grid && !pills.length) return;

        if (header) {
            gsap.set(header, { opacity: 0, y: 18 });
        }
        if (grid) {
            gsap.set(grid, { opacity: 0 });
        }
        gsap.set(pills, { opacity: 0, y: 16 });

        createOnceObserver(section, function () {
            if (header) {
                gsap.to(header, {
                    opacity: 1,
                    y: 0,
                    duration: 0.6,
                    ease: "power2.out",
                });
            }

            if (grid) {
                gsap.to(grid, {
                    opacity: 1,
                    duration: 0.6,
                    ease: "power2.out",
                    delay: 0.05,
                });
            }

            if (pills.length) {
                gsap.to(pills, {
                    opacity: 1,
                    y: 0,
                    duration: 0.6,
                    ease: "power2.out",
                    stagger: 0.02,
                    delay: 0.1,
                });
            }
        });
    }

    // ==================================================
    // S8 – PROOF
    // ==================================================
    function initLocationProofSection(ctx) {
        const section = document.querySelector('[data-location-section="proof"]');
        if (!section) return;

        const { hasGsap, gsap, prefersReducedMotion } = ctx;
        if (!hasGsap || prefersReducedMotion) return;

        const header = section.querySelector('[data-location-el="proof-header"]');
        const cases  = section.querySelectorAll('[data-location-el="case-card"]');
        const quotes = section.querySelectorAll(
            '[data-location-el="testimonials"] figure'
        );

        if (!header && !cases.length && !quotes.length) return;

        if (header) {
            gsap.set(header, { opacity: 0, y: 18 });
        }
        gsap.set(cases, {
            opacity: 0,
            y: 24,
            scale: 0.98,
        });
        gsap.set(quotes, { opacity: 0, y: 20 });

        createOnceObserver(section, function () {
            if (header) {
                gsap.to(header, {
                    opacity: 1,
                    y: 0,
                    duration: 0.6,
                    ease: "power2.out",
                });
            }

            if (cases.length) {
                gsap.to(cases, {
                    opacity: 1,
                    y: 0,
                    scale: 1,
                    duration: 0.7,
                    ease: "power2.out",
                    stagger: 0.08,
                });
            }

            if (quotes.length) {
                gsap.to(quotes, {
                    opacity: 1,
                    y: 0,
                    duration: 0.7,
                    ease: "power2.out",
                    delay: 0.1,
                });
            }
        });
    }

    // ==================================================
    // S10 – FINAL CTA
    // ==================================================
    function initLocationFinalCtaSection(ctx) {
        const section = document.querySelector('[data-location-section="final_cta"]');
        if (!section) return;

        const { hasGsap, gsap, prefersReducedMotion } = ctx;
        if (!hasGsap || prefersReducedMotion) return;

        const elements = section.querySelectorAll(
            '[data-location-el="final-cta-text"],' +
            '[data-location-el="final-cta-buttons"],' +
            '[data-location-el="final-cta-meta"]'
        );
        if (!elements.length) return;

        gsap.set(elements, { opacity: 0, y: 20 });

        createOnceObserver(section, function () {
            gsap.to(elements, {
                opacity: 1,
                y: 0,
                duration: 0.7,
                ease: "power2.out",
                stagger: 0.06,
            });
        });
    }
})();
