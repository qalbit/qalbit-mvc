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
     * Observe a section once and run callback when it enters viewport.
     * Falls back to immediate execution if IntersectionObserver is not available.
     */
    function observeOnce(section, threshold, callback) {
        if (!section) return;

        if (!("IntersectionObserver" in window)) {
            callback();
            return;
        }

        const io = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.target !== section) return;
                    if (entry.isIntersecting) {
                        callback();
                        io.disconnect();
                    }
                });
            },
            { threshold: typeof threshold === "number" ? threshold : 0.25 }
        );

        io.observe(section);
    }

    // ------------------------------
    // Bootstrapping for About page
    // ------------------------------
    onReady(function () {
        const body = document.body;
        if (!body || !body.classList.contains("page-contactus")) {
            // Only run this script on the About page
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

        const ctx = {
            gsap,
            hasGsap,
            hasScrollTrigger,
            prefersReducedMotion,
            isDesktop,
        };

        // Sections
        initContactHeroSection(ctx);
        initContactRequestsSection(ctx);
        initContactProofSection(ctx);
        initContactLocationsSection(ctx);
        initContactFinalCtaSection(ctx);
    });

    // --------------------------------------------------------
    // A1) Hero Section
    // --------------------------------------------------------
    function initContactHeroSection(ctx) {
        const section = document.querySelector('[data-contact-section="c1"]');
        if (!section) return;

        const { gsap, hasGsap, prefersReducedMotion, ScrollTrigger } =
            ctx || {};
        if (!hasGsap || !gsap || prefersReducedMotion) return;

        const targets = section.querySelectorAll("[data-contact-hero-el]");
        if (!targets.length) return;

        // Initial state
        gsap.set(targets, {
            y: 32,
            opacity: 0,
            rotateX: 4,
            transformOrigin: "center bottom",
        });

        const animateIn = () => {
            gsap.to(targets, {
                y: 0,
                opacity: 1,
                rotateX: 0,
                duration: 0.9,
                ease: "power3.out",
                stagger: 0.08,
                overwrite: "auto",
            });
        };

        if (ScrollTrigger) {
            ScrollTrigger.create({
                trigger: section,
                start: "top 75%",
                toggleActions: "play none none none",
                onEnter: animateIn,
            });
        } else if ("IntersectionObserver" in window) {
            const observer = new IntersectionObserver(
                (entries, obs) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            animateIn();
                            obs.disconnect();
                        }
                    });
                },
                { threshold: 0.25 }
            );
            observer.observe(section);
        } else {
            // Fallback: no scroll gating, just run once
            animateIn();
        }
    }

    // --------------------------------------------------------
    // A2) Request Section
    // --------------------------------------------------------
    function initContactRequestsSection(ctx) {
        const section = document.querySelector('[data-contact-section="c2"]');
        if (!section) return;

        const { gsap, hasGsap, prefersReducedMotion, ScrollTrigger } =
            ctx || {};
        if (!hasGsap || !gsap || prefersReducedMotion) return;

        const cards = section.querySelectorAll("[data-request-card]");
        const steps = section.querySelectorAll("[data-contact-mini-step]");
        if (!cards.length && !steps.length) return;

        const allTargets = [...cards, ...steps];

        // Initial state
        gsap.set(cards, {
            y: 32,
            opacity: 0,
            rotateX: 6,
            transformOrigin: "center bottom",
        });

        gsap.set(steps, {
            x: 24,
            opacity: 0,
        });

        const animateIn = () => {
            const tl = gsap.timeline({
                defaults: { ease: "power3.out", overwrite: "auto" },
            });

            if (cards.length) {
                tl.to(cards, {
                    y: 0,
                    opacity: 1,
                    rotateX: 0,
                    duration: 0.9,
                    stagger: 0.06,
                });
            }

            if (steps.length) {
                tl.to(
                    steps,
                    {
                        x: 0,
                        opacity: 1,
                        duration: 0.7,
                        stagger: 0.05,
                    },
                    cards.length ? "-0.35" : 0
                );
            }

            return tl;
        };

        if (ScrollTrigger) {
            ScrollTrigger.create({
                trigger: section,
                start: "top 80%",
                toggleActions: "play none none none",
                onEnter: animateIn,
            });
        } else if ("IntersectionObserver" in window) {
            const observer = new IntersectionObserver(
                (entries, obs) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            animateIn();
                            obs.disconnect();
                        }
                    });
                },
                { threshold: 0.25 }
            );
            observer.observe(section);
        } else {
            animateIn();
        }

        // Safety: ensure visibility if something goes wrong
        // (e.g. GSAP interrupted)
        allTargets.forEach((el) => {
            el.style.willChange = "transform, opacity";
        });
    }

    // --------------------------------------------------------
    // A3) Proof Section
    // --------------------------------------------------------
    function initContactProofSection(ctx) {
        const section = document.querySelector('[data-contact-section="c3"]');
        if (!section) return;

        const { gsap, hasGsap, prefersReducedMotion, ScrollTrigger } =
            ctx || {};
        if (!hasGsap || !gsap || prefersReducedMotion) return;

        const logos = section.querySelectorAll("[data-contact-logo]");
        const cards = section.querySelectorAll("[data-proof-card]");

        if (!logos.length && !cards.length) return;

        // Initial state
        gsap.set(logos, {
            y: 20,
            opacity: 0,
            scale: 0.96,
        });

        gsap.set(cards, {
            y: 32,
            opacity: 0,
            rotateX: 4,
            transformOrigin: "center bottom",
        });

        const animateIn = () => {
            const tl = gsap.timeline({
                defaults: { ease: "power3.out", overwrite: "auto" },
            });

            if (logos.length) {
                tl.to(logos, {
                    y: 0,
                    opacity: 1,
                    scale: 1,
                    duration: 0.7,
                    stagger: {
                        each: 0.05,
                        from: "center",
                    },
                });
            }

            if (cards.length) {
                tl.to(
                    cards,
                    {
                        y: 0,
                        opacity: 1,
                        rotateX: 0,
                        duration: 0.9,
                        stagger: 0.08,
                    },
                    logos.length ? "-0.25" : 0
                );
            }

            return tl;
        };

        if (ScrollTrigger) {
            ScrollTrigger.create({
                trigger: section,
                start: "top 80%",
                toggleActions: "play none none none",
                onEnter: animateIn,
            });
        } else if ("IntersectionObserver" in window) {
            const observer = new IntersectionObserver(
                (entries, obs) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            animateIn();
                            obs.disconnect();
                        }
                    });
                },
                { threshold: 0.2 }
            );
            observer.observe(section);
        } else {
            animateIn();
        }
    }

    // --------------------------------------------------------
    // A4) Location Section
    // --------------------------------------------------------
    function initContactLocationsSection(ctx) {
        const section = document.querySelector('[data-contact-section="c4"]');
        if (!section) return;

        const { gsap, hasGsap, prefersReducedMotion, ScrollTrigger } =
            ctx || {};
        if (!hasGsap || !gsap || prefersReducedMotion) return;

        const cards = section.querySelectorAll("[data-location-card]");
        if (!cards.length) return;

        // Initial state
        gsap.set(cards, {
            y: 32,
            opacity: 0,
            scale: 0.96,
            transformOrigin: "center bottom",
        });

        const animateIn = () => {
            return gsap.to(cards, {
                y: 0,
                opacity: 1,
                scale: 1,
                duration: 0.9,
                ease: "power3.out",
                stagger: 0.08,
                overwrite: "auto",
            });
        };

        if (ScrollTrigger) {
            ScrollTrigger.create({
                trigger: section,
                start: "top 80%",
                toggleActions: "play none none none",
                onEnter: animateIn,
            });
        } else if ("IntersectionObserver" in window) {
            const observer = new IntersectionObserver(
                (entries, obs) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            animateIn();
                            obs.disconnect();
                        }
                    });
                },
                { threshold: 0.25 }
            );
            observer.observe(section);
        } else {
            animateIn();
        }

        // Optional: hint browsers for smoother animation
        cards.forEach((el) => {
            el.style.willChange = "transform, opacity";
        });
    }

    // --------------------------------------------------------
    // A6) CTA Section
    // --------------------------------------------------------
    function initContactFinalCtaSection(ctx) {
        const section = document.querySelector('[data-contact-section="c6"]');
        if (!section) return;

        const { gsap, hasGsap, prefersReducedMotion, ScrollTrigger } =
            ctx || {};
        if (!hasGsap || !gsap || prefersReducedMotion) return;

        const cta = section.querySelector("[data-final-cta]");
        if (!cta) return;

        // Initial state
        gsap.set(cta, {
            y: 40,
            opacity: 0,
            scale: 0.97,
            transformOrigin: "center center",
        });

        const animateIn = () => {
            return gsap.to(cta, {
                y: 0,
                opacity: 1,
                scale: 1,
                duration: 0.9,
                ease: "power3.out",
                overwrite: "auto",
            });
        };

        if (ScrollTrigger) {
            ScrollTrigger.create({
                trigger: section,
                start: "top 85%",
                toggleActions: "play none none none",
                onEnter: animateIn,
            });
        } else if ("IntersectionObserver" in window) {
            const observer = new IntersectionObserver(
                (entries, obs) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            animateIn();
                            obs.disconnect();
                        }
                    });
                },
                { threshold: 0.2 }
            );
            observer.observe(section);
        } else {
            animateIn();
        }

        // Hint for smoother animation
        cta.style.willChange = "transform, opacity";
    }
})();
