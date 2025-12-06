(function () {
    "use strict";

    // ------------------------------
    // Small helper for DOM ready
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
        if (!body || !body.classList.contains("page-hire-developer")) {
            // Only run on service detail pages
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

        const ctx = { gsap, prefersReducedMotion };

        initServiceHero(ctx);           // S1
        initServiceOverview(ctx);       // S2
        initServiceCapabilities(ctx);   // S3
        initServiceProcess(ctx);        // S4
        initServiceUseCases(ctx);       // S5
        initServiceTechStack(ctx);      // S6
        initServiceCta(ctx);            // S8 (S7 FAQ can be added later)
    });

    // Utility: run animation once on first intersection
    function animateOnScrollOnce(target, options, callback) {
        if (!("IntersectionObserver" in window)) {
            callback();
            return;
        }

        const io = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.target !== target) return;
                    if (entry.isIntersecting) {
                        callback();
                        io.disconnect();
                    }
                });
            },
            options || { threshold: 0.25 }
        );

        io.observe(target);
    }

    // ========================================================
    // S1 – HERO (data-section-service-hero, [data-hero-el])
    // ========================================================
    function initServiceHero(ctx) {
        const { gsap, prefersReducedMotion } = ctx;
        const section = document.querySelector("[data-section-service-hero]");
        if (!section || prefersReducedMotion) return;

        const heroEls = Array.from(section.querySelectorAll("[data-hero-el]"));
        if (!heroEls.length) return;

        const snapshot = section.querySelector("aside[data-hero-el]");

        animateOnScrollOnce(section, { threshold: 0.2 }, function () {
            gsap.from(heroEls, {
                y: 32,
                autoAlpha: 0,
                duration: 0.8,
                ease: "power3.out",
                stagger: 0.16
            });
        });
    }

    // ========================================================
    // S2 – OVERVIEW (data-section-service-overview)
    // ========================================================
    function initServiceOverview(ctx) {
        const { gsap, prefersReducedMotion } = ctx;
        const section = document.querySelector("[data-section-service-overview]");
        if (!section || prefersReducedMotion) return;

        const header = section.querySelector("header");
        const left   = section.querySelector("[data-service-overview-left]");
        const right  = section.querySelector("[data-service-overview-right]");

        if (!header && !left && !right) return;

        animateOnScrollOnce(section, { threshold: 0.25 }, function () {
            const tl = gsap.timeline({ defaults: { ease: "power3.out" } });

            if (header) {
                tl.from(header, {
                    y: 24,
                    autoAlpha: 0,
                    duration: 0.6
                });
            }

            if (left) {
                tl.from(
                    left,
                    {
                        x: -26,
                        autoAlpha: 0,
                        duration: 0.6
                    },
                    "-=0.25"
                );
            }

            if (right) {
                tl.from(
                    right,
                    {
                        x: 26,
                        autoAlpha: 0,
                        duration: 0.6
                    },
                    "-=0.45"
                );
            }
        });
    }

    // ========================================================
    // S3 – CAPABILITIES (data-section-service-capabilities)
    // ========================================================
    function initServiceCapabilities(ctx) {
        const { gsap, prefersReducedMotion } = ctx;
        const section = document.querySelector("[data-section-service-capabilities]");
        if (!section || prefersReducedMotion) return;

        const header = section.querySelector("header");
        const cards  = Array.from(
            section.querySelectorAll("[data-service-capability-card]")
        );

        if (!header && !cards.length) return;

        animateOnScrollOnce(section, { threshold: 0.25 }, function () {
            const tl = gsap.timeline({ defaults: { ease: "power2.out" } });

            if (header) {
                tl.from(header, {
                    y: 22,
                    autoAlpha: 0,
                    duration: 0.55
                });
            }

            if (cards.length) {
                tl.from(
                    cards,
                    {
                        y: 30,
                        autoAlpha: 0,
                        scale: 0.96,
                        duration: 0.6,
                        stagger: 0.09
                    },
                    "-=0.2"
                );
            }
        });
    }

    // ========================================================
    // S4 – PROCESS (data-section-service-process)
    // ========================================================
    function initServiceProcess(ctx) {
        const { gsap, prefersReducedMotion } = ctx;
        const section = document.querySelector("[data-section-service-process]");
        if (!section || prefersReducedMotion) return;

        const header = section.querySelector("header");
        const steps  = Array.from(
            section.querySelectorAll("[data-service-process-step]")
        );

        if (!header && !steps.length) return;

        animateOnScrollOnce(section, { threshold: 0.25 }, function () {
            const tl = gsap.timeline({ defaults: { ease: "power2.out" } });

            if (header) {
                tl.from(header, {
                    y: 20,
                    autoAlpha: 0,
                    duration: 0.55
                });
            }

            if (steps.length) {
                tl.from(
                    steps,
                    {
                        y: 26,
                        autoAlpha: 0,
                        duration: 0.55,
                        stagger: 0.08
                    },
                    "-=0.2"
                );
            }
        });
    }

    // ========================================================
    // S5 – USE CASES (data-section-service-use-cases)
    // ========================================================
    function initServiceUseCases(ctx) {
        const { gsap, prefersReducedMotion } = ctx;
        const section = document.querySelector("[data-section-service-use-cases]");
        if (!section || prefersReducedMotion) return;

        const header = section.querySelector("header");
        const grid   = section.querySelector("[data-service-use-cases-grid]");
        const cards  = grid
            ? Array.from(grid.querySelectorAll("article"))
            : [];

        if (!header && !cards.length) return;

        animateOnScrollOnce(section, { threshold: 0.25 }, function () {
            const tl = gsap.timeline({ defaults: { ease: "power2.out" } });

            if (header) {
                tl.from(header, {
                    y: 20,
                    autoAlpha: 0,
                    duration: 0.55
                });
            }

            if (cards.length) {
                tl.from(
                    cards,
                    {
                        y: 22,
                        autoAlpha: 0,
                        duration: 0.55,
                        stagger: 0.09
                    },
                    "-=0.2"
                );
            }
        });
    }

    // ========================================================
    // S6 – TECH STACK (data-section-service-tech-stack)
    // ========================================================
    function initServiceTechStack(ctx) {
        const { gsap, prefersReducedMotion } = ctx;
        const section = document.querySelector("[data-section-service-tech-stack]");
        if (!section || prefersReducedMotion) return;

        const header = section.querySelector("header");
        const grid   = section.querySelector("[data-service-tech-stack-grid]");
        const cards  = grid
            ? Array.from(grid.querySelectorAll("article"))
            : [];

        if (!header && !cards.length) return;

        animateOnScrollOnce(section, { threshold: 0.25 }, function () {
            const tl = gsap.timeline({ defaults: { ease: "power2.out" } });

            if (header) {
                tl.from(header, {
                    y: 18,
                    autoAlpha: 0,
                    duration: 0.55
                });
            }

            if (cards.length) {
                tl.from(
                    cards,
                    {
                        y: 22,
                        autoAlpha: 0,
                        duration: 0.55,
                        stagger: 0.08
                    },
                    "-=0.2"
                );
            }
        });
    }

    // ========================================================
    // S8 – CTA (data-section="service-cta")
    // ========================================================
    function initServiceCta(ctx) {
        const { gsap, prefersReducedMotion } = ctx;
        const section = document.querySelector('[data-section="service-cta"]');
        if (!section || prefersReducedMotion) return;

        const elements = [
            section.querySelector("p"),
            section.querySelector("h2"),
            section.querySelector("div > div"), // button group container
        ].filter(Boolean);

        animateOnScrollOnce(section, { threshold: 0.25 }, function () {
            gsap.from(elements, {
                y: 28,
                autoAlpha: 0,
                scale: 0.98,
                duration: 0.7,
                ease: "power3.out",
                stagger: 0.12
            });
        });
    }
})();
