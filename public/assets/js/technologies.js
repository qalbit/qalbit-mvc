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
        if (!body || !body.classList.contains("page-technologies")) {
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
            prefersReducedMotion,
            isDesktop,
        };

        initTechnologiesHeroSection(ctx);
        initTechStackOverviewSection(ctx);
        initTechFrontendSection(ctx);
        initTechBackendSection(ctx);
        initTechMobileSection(ctx);
        initTechCmsSection(ctx);
        initTechLegacySection(ctx);
        initTechProcessSection(ctx);
        initTechStacksSection(ctx);
        initTechCaseStudiesSection(ctx);

        // Smooth scroll for #tech-* anchors (e.g. #tech-frontend)
        initTechAnchorScroll({
            prefersReducedMotion,
        });
    });

    // --------------------------------------------------------
    // 1) Hero – subtle entrance animation
    // --------------------------------------------------------
    function initTechnologiesHeroSection(ctx) {
        const { gsap, hasGsap, prefersReducedMotion } = ctx;
        const section = document.querySelector("[data-section-technologies]");
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
    // 2) Tech Stack – subtle entrance animation
    // --------------------------------------------------------
    function initTechStackOverviewSection(ctx) {
        const { gsap, hasGsap, prefersReducedMotion } = ctx;
        const section = document.querySelector(
            '[data-animate="tech-stack-overview"]'
        );
        if (!section) return;

        const cards = Array.from(
            section.querySelectorAll("[data-tech-stack-card]")
        );
        const headerEls = section.querySelectorAll(
            "[data-tech-stack-header] h2, [data-tech-stack-header] p"
        );

        if (!cards.length) return;
        if (!hasGsap || prefersReducedMotion) return;

        // Initial state
        if (headerEls.length) {
            gsap.set(headerEls, {
                y: 24,
                opacity: 0,
            });
        }

        gsap.set(cards, {
            y: 60,
            opacity: 0,
            rotateX: 8,
            scale: 0.96,
            transformOrigin: "top center",
        });

        const runAnimation = () => {
            const tl = gsap.timeline({
                defaults: {
                    duration: 0.55,
                    ease: "power2.out",
                },
            });

            if (headerEls.length) {
                tl.to(headerEls, {
                    y: 0,
                    opacity: 1,
                    stagger: 0.08,
                });
            }

            tl.to(
                cards,
                {
                    y: 0,
                    opacity: 1,
                    rotateX: 0,
                    scale: 1,
                    stagger: 0.07,
                },
                headerEls.length ? "-=0.25" : 0
            );
        };

        const observer = new IntersectionObserver(
            (entries, obs) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        runAnimation();
                        obs.unobserve(entry.target);
                    }
                });
            },
            {
                root: null,
                threshold: 0.3,
            }
        );

        observer.observe(section);
    }

    // --------------------------------------------------------
    // 3) Frontend Stack – subtle entrance animation
    // --------------------------------------------------------
    function initTechFrontendSection(ctx) {
        const { gsap, hasGsap, prefersReducedMotion } = ctx;
        const section = document.querySelector("[data-tech-frontend-section]");
        if (!section) return;

        const cards = Array.from(
            section.querySelectorAll("[data-tech-frontend-card]")
        );
        const headerEls = section.querySelectorAll(
            "[data-tech-frontend-header] h2, [data-tech-frontend-header] p"
        );

        if (!cards.length) return;
        if (!hasGsap || prefersReducedMotion) return;

        // Initial states
        if (headerEls.length) {
            gsap.set(headerEls, {
                y: 24,
                opacity: 0,
            });
        }

        gsap.set(cards, {
            y: 50,
            opacity: 0,
            rotateX: 6,
            scale: 0.97,
            transformOrigin: "top center",
        });

        const runAnimation = () => {
            const tl = gsap.timeline({
                defaults: {
                    duration: 0.55,
                    ease: "power2.out",
                },
            });

            if (headerEls.length) {
                tl.to(headerEls, {
                    y: 0,
                    opacity: 1,
                    stagger: 0.08,
                });
            }

            tl.to(
                cards,
                {
                    y: 0,
                    opacity: 1,
                    rotateX: 0,
                    scale: 1,
                    stagger: 0.07,
                },
                headerEls.length ? "-=0.25" : 0
            );
        };

        // Prefer IntersectionObserver, but fall back gracefully
        if (typeof IntersectionObserver === "undefined") {
            runAnimation();
            return;
        }

        const observer = new IntersectionObserver(
            (entries, obs) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        runAnimation();
                        obs.unobserve(entry.target);
                    }
                });
            },
            {
                root: null,
                threshold: 0.3,
            }
        );

        observer.observe(section);
    }

    // --------------------------------------------------------
    // 4) Backend Stack – subtle entrance animation
    // --------------------------------------------------------
    function initTechBackendSection(ctx) {
        const { gsap, hasGsap, prefersReducedMotion } = ctx;
        const section = document.querySelector("[data-tech-backend-section]");
        if (!section) return;

        const cards = Array.from(
            section.querySelectorAll("[data-tech-backend-card]")
        );
        const headerEls = section.querySelectorAll(
            "[data-tech-backend-header] h2, [data-tech-backend-header] p"
        );

        if (!cards.length) return;
        if (!hasGsap || prefersReducedMotion) return;

        // Initial states
        if (headerEls.length) {
            gsap.set(headerEls, {
                y: 24,
                opacity: 0,
            });
        }

        gsap.set(cards, {
            y: 60,
            opacity: 0,
            rotateX: 5,
            scale: 0.97,
            transformOrigin: "top center",
        });

        const runAnimation = () => {
            const tl = gsap.timeline({
                defaults: {
                    duration: 0.55,
                    ease: "power2.out",
                },
            });

            if (headerEls.length) {
                tl.to(headerEls, {
                    y: 0,
                    opacity: 1,
                    stagger: 0.08,
                });
            }

            tl.to(
                cards,
                {
                    y: 0,
                    opacity: 1,
                    rotateX: 0,
                    scale: 1,
                    stagger: 0.07,
                },
                headerEls.length ? "-=0.25" : 0
            );
        };

        // Prefer IntersectionObserver, but fall back gracefully
        if (typeof IntersectionObserver === "undefined") {
            runAnimation();
            return;
        }

        const observer = new IntersectionObserver(
            (entries, obs) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        runAnimation();
                        obs.unobserve(entry.target);
                    }
                });
            },
            {
                root: null,
                threshold: 0.3,
            }
        );

        observer.observe(section);
    }

    // --------------------------------------------------------
    // 5) Mobile Stack – subtle entrance animation
    // --------------------------------------------------------
    function initTechMobileSection(ctx) {
        const { gsap, hasGsap, prefersReducedMotion } = ctx;
        const section = document.querySelector("[data-tech-mobile-section]");
        if (!section) return;

        const cards = Array.from(
            section.querySelectorAll("[data-tech-mobile-card]")
        );
        const headerEls = section.querySelectorAll(
            "[data-tech-mobile-header] h2, [data-tech-mobile-header] p"
        );

        if (!cards.length) return;
        if (!hasGsap || prefersReducedMotion) return;

        // Initial states
        if (headerEls.length) {
            gsap.set(headerEls, {
                y: 24,
                opacity: 0,
            });
        }

        gsap.set(cards, {
            y: 60,
            opacity: 0,
            rotateX: 6,
            scale: 0.97,
            transformOrigin: "top center",
        });

        const runAnimation = () => {
            const tl = gsap.timeline({
                defaults: {
                    duration: 0.55,
                    ease: "power2.out",
                },
            });

            if (headerEls.length) {
                tl.to(headerEls, {
                    y: 0,
                    opacity: 1,
                    stagger: 0.08,
                });
            }

            tl.to(
                cards,
                {
                    y: 0,
                    opacity: 1,
                    rotateX: 0,
                    scale: 1,
                    stagger: 0.07,
                },
                headerEls.length ? "-=0.25" : 0
            );
        };

        if (typeof IntersectionObserver === "undefined") {
            runAnimation();
            return;
        }

        const observer = new IntersectionObserver(
            (entries, obs) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        runAnimation();
                        obs.unobserve(entry.target);
                    }
                });
            },
            {
                root: null,
                threshold: 0.3,
            }
        );

        observer.observe(section);
    }

    // --------------------------------------------------------
    // 6) CMS Stack – subtle entrance animation
    // --------------------------------------------------------
    function initTechCmsSection(ctx) {
        const { gsap, hasGsap, prefersReducedMotion } = ctx;
        const section = document.querySelector("[data-tech-cms-section]");
        if (!section) return;

        const cards = Array.from(
            section.querySelectorAll("[data-tech-cms-card]")
        );
        const headerEls = section.querySelectorAll(
            "[data-tech-cms-header] h2, [data-tech-cms-header] p"
        );

        if (!cards.length) return;
        if (!hasGsap || prefersReducedMotion) return;

        // Initial state
        if (headerEls.length) {
            gsap.set(headerEls, {
                y: 24,
                opacity: 0,
            });
        }

        gsap.set(cards, {
            y: 60,
            opacity: 0,
            rotateX: 6,
            scale: 0.97,
            transformOrigin: "top center",
        });

        const runAnimation = () => {
            const tl = gsap.timeline({
                defaults: {
                    duration: 0.55,
                    ease: "power2.out",
                },
            });

            if (headerEls.length) {
                tl.to(headerEls, {
                    y: 0,
                    opacity: 1,
                    stagger: 0.08,
                });
            }

            tl.to(
                cards,
                {
                    y: 0,
                    opacity: 1,
                    rotateX: 0,
                    scale: 1,
                    stagger: 0.07,
                },
                headerEls.length ? "-=0.25" : 0
            );
        };

        // IntersectionObserver guard
        if (typeof IntersectionObserver === "undefined") {
            runAnimation();
            return;
        }

        const observer = new IntersectionObserver(
            (entries, obs) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        runAnimation();
                        obs.unobserve(entry.target);
                    }
                });
            },
            {
                root: null,
                threshold: 0.3,
            }
        );

        observer.observe(section);
    }

    // --------------------------------------------------------
    // 7) Legacy Stack – subtle entrance animation
    // --------------------------------------------------------
    function initTechLegacySection(ctx) {
        const { gsap, hasGsap, prefersReducedMotion } = ctx;
        const section = document.querySelector("[data-tech-legacy-section]");
        if (!section) return;

        const cards = Array.from(
            section.querySelectorAll("[data-tech-legacy-card]")
        );
        const headerEls = section.querySelectorAll(
            "[data-tech-legacy-header] h2, [data-tech-legacy-header] p"
        );

        if (!cards.length) return;
        if (!hasGsap || prefersReducedMotion) return;

        // Initial state
        if (headerEls.length) {
            gsap.set(headerEls, {
                y: 24,
                opacity: 0,
            });
        }

        gsap.set(cards, {
            y: 60,
            opacity: 0,
            rotateX: 5,
            scale: 0.97,
            transformOrigin: "top center",
        });

        const runAnimation = () => {
            const tl = gsap.timeline({
                defaults: {
                    duration: 0.55,
                    ease: "power2.out",
                },
            });

            if (headerEls.length) {
                tl.to(headerEls, {
                    y: 0,
                    opacity: 1,
                    stagger: 0.08,
                });
            }

            tl.to(
                cards,
                {
                    y: 0,
                    opacity: 1,
                    rotateX: 0,
                    scale: 1,
                    stagger: 0.07,
                },
                headerEls.length ? "-=0.25" : 0
            );
        };

        if (typeof IntersectionObserver === "undefined") {
            runAnimation();
            return;
        }

        const observer = new IntersectionObserver(
            (entries, obs) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        runAnimation();
                        obs.unobserve(entry.target);
                    }
                });
            },
            {
                root: null,
                threshold: 0.3,
            }
        );

        observer.observe(section);
    }

    // --------------------------------------------------------
    // 8) Tech Process – subtle entrance animation
    // --------------------------------------------------------
    function initTechProcessSection(ctx) {
        const { gsap, hasGsap, prefersReducedMotion } = ctx;
        const section = document.querySelector("[data-tech-process-section]");
        if (!section) return;

        const steps = Array.from(
            section.querySelectorAll("[data-tech-process-step]")
        );
        const headerEls = section.querySelectorAll(
            "[data-tech-process-header] p, [data-tech-process-header] h2"
        );

        if (!steps.length) return;
        if (!hasGsap || prefersReducedMotion) return;

        // Initial state
        if (headerEls.length) {
            gsap.set(headerEls, {
                y: 24,
                opacity: 0,
            });
        }

        gsap.set(steps, {
            y: 60,
            opacity: 0,
            rotateX: 8,
            scale: 0.96,
            transformOrigin: "top center",
        });

        const runAnimation = () => {
            const tl = gsap.timeline({
                defaults: {
                    duration: 0.55,
                    ease: "power2.out",
                },
            });

            if (headerEls.length) {
                tl.to(headerEls, {
                    y: 0,
                    opacity: 1,
                    stagger: 0.08,
                });
            }

            tl.to(
                steps,
                {
                    y: 0,
                    opacity: 1,
                    rotateX: 0,
                    scale: 1,
                    stagger: 0.09,
                },
                headerEls.length ? "-=0.25" : 0
            );
        };

        // Fallback if IntersectionObserver is not available
        if (typeof IntersectionObserver === "undefined") {
            runAnimation();
            return;
        }

        const observer = new IntersectionObserver(
            (entries, obs) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        runAnimation();
                        obs.unobserve(entry.target);
                    }
                });
            },
            {
                root: null,
                threshold: 0.3,
            }
        );

        observer.observe(section);
    }

    // --------------------------------------------------------
    // 9) Tech Stack Example – subtle entrance animation
    // --------------------------------------------------------
    function initTechStacksSection(ctx) {
        const { gsap, hasGsap, prefersReducedMotion } = ctx;
        const section = document.querySelector("[data-tech-stacks-section]");
        if (!section) return;

        const cards = Array.from(
            section.querySelectorAll("[data-tech-stack-card]")
        );
        const headerEls = section.querySelectorAll(
            "[data-tech-stacks-header] p, [data-tech-stacks-header] h2"
        );

        if (!cards.length) return;
        if (!hasGsap || prefersReducedMotion) return;

        // Initial states
        if (headerEls.length) {
            gsap.set(headerEls, {
                y: 24,
                opacity: 0,
            });
        }

        gsap.set(cards, {
            y: 60,
            opacity: 0,
            rotateX: 6,
            scale: 0.97,
            transformOrigin: "top center",
        });

        const runAnimation = () => {
            const tl = gsap.timeline({
                defaults: {
                    duration: 0.55,
                    ease: "power2.out",
                },
            });

            if (headerEls.length) {
                tl.to(headerEls, {
                    y: 0,
                    opacity: 1,
                    stagger: 0.08,
                });
            }

            tl.to(
                cards,
                {
                    y: 0,
                    opacity: 1,
                    rotateX: 0,
                    scale: 1,
                    stagger: 0.08,
                },
                headerEls.length ? "-=0.25" : 0
            );
        };

        // IntersectionObserver guard
        if (typeof IntersectionObserver === "undefined") {
            runAnimation();
            return;
        }

        const observer = new IntersectionObserver(
            (entries, obs) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        runAnimation();
                        obs.unobserve(entry.target);
                    }
                });
            },
            {
                root: null,
                threshold: 0.3,
            }
        );

        observer.observe(section);
    }

    // --------------------------------------------------------
    // 10) Case Studies – subtle entrance animation
    // --------------------------------------------------------
    function initTechCaseStudiesSection(ctx) {
        const { gsap, hasGsap, prefersReducedMotion } = ctx;
        const section = document.querySelector(
            "[data-tech-case-studies-section]"
        );
        if (!section) return;

        const cards = Array.from(
            section.querySelectorAll("[data-tech-case-study-card]")
        );
        const headerEls = section.querySelectorAll(
            "[data-tech-case-studies-header] p, [data-tech-case-studies-header] h2"
        );

        if (!cards.length) return;
        if (!hasGsap || prefersReducedMotion) return;

        // Initial state
        if (headerEls.length) {
            gsap.set(headerEls, {
                y: 24,
                opacity: 0,
            });
        }

        gsap.set(cards, {
            y: 60,
            opacity: 0,
            rotateX: 6,
            scale: 0.97,
            transformOrigin: "top center",
        });

        const runAnimation = () => {
            const tl = gsap.timeline({
                defaults: {
                    duration: 0.55,
                    ease: "power2.out",
                },
            });

            if (headerEls.length) {
                tl.to(headerEls, {
                    y: 0,
                    opacity: 1,
                    stagger: 0.08,
                });
            }

            tl.to(
                cards,
                {
                    y: 0,
                    opacity: 1,
                    rotateX: 0,
                    scale: 1,
                    stagger: 0.08,
                },
                headerEls.length ? "-=0.25" : 0
            );
        };

        // IntersectionObserver fallback
        if (typeof IntersectionObserver === "undefined") {
            runAnimation();
            return;
        }

        const observer = new IntersectionObserver(
            (entries, obs) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        runAnimation();
                        obs.unobserve(entry.target);
                    }
                });
            },
            {
                root: null,
                threshold: 0.3,
            }
        );

        observer.observe(section);
    }

    // --------------------------------------------------------
    // 11) Smooth scroll to hash anchors (e.g. #tech-frontend) without showing hash
    // --------------------------------------------------------
    function initTechAnchorScroll(ctx) {
        var prefersReducedMotion = !!ctx.prefersReducedMotion;
        var HEADER_OFFSET = 64; // adjust to match your sticky header height

        function getTargetElement(hash) {
            if (!hash || hash === "#") return null;

            // hash comes like "#tech-frontend" – use directly as selector
            try {
                return document.querySelector(hash);
            } catch (e) {
                return null;
            }
        }

        function smoothScrollToElement(el) {
            if (!el) return;

            var rect = el.getBoundingClientRect();
            var targetY = rect.top + window.pageYOffset - HEADER_OFFSET;

            window.scrollTo({
                top: targetY,
                behavior: prefersReducedMotion ? "auto" : "smooth",
            });
        }

        function stripHashFromUrl() {
            if (!window.location.hash) return;
            if (
                window.history &&
                typeof window.history.replaceState === "function"
            ) {
                window.history.replaceState(
                    null,
                    "",
                    window.location.pathname + window.location.search
                );
            }
        }

        // Initial load: e.g. /technologies/#tech-frontend
        var initialHash = window.location.hash;
        if (initialHash) {
            var initialTarget = getTargetElement(initialHash);

            // Remove hash from URL first
            stripHashFromUrl();

            if (initialTarget) {
                // Wait a tick so layout is ready
                setTimeout(function () {
                    smoothScrollToElement(initialTarget);
                }, 50);
            }
        }

        // In-page clicks: <a href="#something">
        document.addEventListener("click", function (event) {
            var link = event.target.closest('a[href^="#"]');
            if (!link) return;

            var hash = link.getAttribute("href");
            if (!hash || hash === "#") return;

            var target = getTargetElement(hash);
            if (!target) return;

            event.preventDefault();
            smoothScrollToElement(target);
            stripHashFromUrl(); // keep URL clean
        });

        // Manual hash changes / browser back-forward including a hash
        window.addEventListener("hashchange", function () {
            var hash = window.location.hash;
            if (!hash || hash === "#") return;

            var target = getTargetElement(hash);
            stripHashFromUrl();
            if (target) {
                smoothScrollToElement(target);
            }
        });
    }
})();
