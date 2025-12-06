// public/assets/js/industries.js
(function () {
    "use strict";

    // ------------------------------
    // Helpers
    // ------------------------------

    /**
     * Run a callback when DOM is ready (without jQuery).
     */
    function onReady(fn) {
        if (document.readyState === "loading") {
            document.addEventListener("DOMContentLoaded", fn, { once: true });
        } else {
            fn();
        }
    }

    /**
     * Observe a single element and fire handler once when it enters the viewport.
     * Falls back to immediate execution if IntersectionObserver is unavailable.
     *
     * @param {Element|null} target
     * @param {(entry: IntersectionObserverEntry|null, obs: IntersectionObserver|null) => void} onEnter
     * @param {IntersectionObserverInit} [options]
     * @returns {IntersectionObserver|null}
     */
    function observeOnce(target, onEnter, options) {
        if (!target || typeof onEnter !== "function") {
            return null;
        }

        // Fallback: no IntersectionObserver support → run immediately
        if (typeof window.IntersectionObserver === "undefined") {
            onEnter(null, null);
            return null;
        }

        var observer = new IntersectionObserver(
            function (entries, obs) {
                entries.forEach(function (entry) {
                    if (!entry.isIntersecting || entry.target !== target)
                        return;

                    onEnter(entry, obs);
                    obs.unobserve(entry.target);
                    obs.disconnect();
                });
            },
            Object.assign(
                {
                    root: null,
                    threshold: 0.25,
                },
                options || {}
            )
        );

        observer.observe(target);
        return observer;
    }

    // ------------------------------
    // Bootstrap for /industries/ page
    // ------------------------------

    onReady(function () {
        var body = document.body;
        if (!body || !body.classList.contains("page-industries")) {
            // Exit early if we are not on the industries page.
            return;
        }

        // Feature detection
        var hasMatchMedia = typeof window.matchMedia === "function";

        // Reduced motion preference
        var mqReducedMotion = hasMatchMedia
            ? window.matchMedia("(prefers-reduced-motion: reduce)")
            : null;

        var prefersReducedMotion = !!(
            mqReducedMotion && mqReducedMotion.matches
        );

        // Keep reduced motion value in sync if user changes OS setting
        if (mqReducedMotion) {
            if (typeof mqReducedMotion.addEventListener === "function") {
                mqReducedMotion.addEventListener("change", function (event) {
                    prefersReducedMotion = !!event.matches;
                });
            } else if (typeof mqReducedMotion.addListener === "function") {
                // Older Safari
                mqReducedMotion.addListener(function (event) {
                    prefersReducedMotion = !!event.matches;
                });
            }
        }

        // Desktop media query helper
        var mqDesktop = hasMatchMedia
            ? window.matchMedia("(min-width: 1024px)")
            : null;

        function isDesktop() {
            return mqDesktop ? mqDesktop.matches : window.innerWidth >= 1024;
        }

        // GSAP + ScrollTrigger (if available globally)
        var hasGsap = typeof window.gsap !== "undefined";
        var gsap = hasGsap ? window.gsap : null;
        var hasScrollTrigger =
            hasGsap && typeof window.ScrollTrigger !== "undefined";

        if (hasScrollTrigger) {
            gsap.registerPlugin(window.ScrollTrigger);

            // Slightly more robust defaults for this page
            window.ScrollTrigger.defaults({
                // Animations start when section is ~70% into viewport by default
                start: "top 80%",
                toggleActions: "play none none none",
            });

            // Refresh ScrollTrigger on breakpoint changes
            if (mqDesktop) {
                var handler = function () {
                    window.ScrollTrigger.refresh();
                };

                if (typeof mqDesktop.addEventListener === "function") {
                    mqDesktop.addEventListener("change", handler);
                } else if (typeof mqDesktop.addListener === "function") {
                    mqDesktop.addListener(handler);
                }
            }
        }

        // Shared context passed to all section initializers
        var ctx = {
            // GSAP
            gsap: gsap,
            hasGsap: hasGsap,
            hasScrollTrigger: hasScrollTrigger,

            // Motion / layout
            prefersReducedMotion: function () {
                return !!prefersReducedMotion;
            },
            isDesktop: isDesktop,

            // Helpers
            observeOnce: observeOnce,
        };

        // Expose for debugging in dev tools (safe no-op in production)
        window.__qalbitIndustriesCtx = ctx;

        // --------------------------------------------------------------------
        // Section initializers (to be implemented in subsequent tasks)
        // --------------------------------------------------------------------
        initIndustriesHeroSection(ctx);
        initIndustriesTagsSection(ctx);
        initIndustriesGridSection(ctx);
        initIndustriesOutcomesSection(ctx);
        initIndustriesProcessSection(ctx);
        initIndustriesTechStackSection(ctx);
        initIndustriesTechTagsSection(ctx);
        initIndustriesUseCasesSection(ctx);
        initIndustriesSocialProofSection(ctx);
    });

    // ----------------------------------------------
    // 1) Industries Hero section animation
    // ----------------------------------------------
    function initIndustriesHeroSection(ctx) {
        if (!ctx || !ctx.hasGsap) return;
        if (ctx.prefersReducedMotion && ctx.prefersReducedMotion()) return;

        var gsap = ctx.gsap;
        if (!gsap) return;

        var section = document.querySelector("[data-section-industries]");
        if (!section) return;

        var observeOnce =
            ctx.observeOnce ||
            function (target, fn) {
                // Fallback: run immediately if helper not present
                if (typeof fn === "function") fn(null, null);
                return null;
            };

        // Elements
        var breadcrumb = section.querySelector('nav[aria-label="Breadcrumb"]');
        var heroEls = Array.prototype.slice.call(
            section.querySelectorAll("[data-hero-el]")
        );

        var leftBlock = heroEls[0] || null;
        var rightBlock = heroEls[1] || null;

        // Left block internal pieces
        var leftPills = leftBlock
            ? leftBlock.querySelectorAll(".rounded-pill")
            : null;

        var leftHeading = leftBlock ? leftBlock.querySelector("h1") : null;

        var leftIntro = leftBlock ? leftBlock.querySelector("p.text-md") : null;

        var leftBullets = leftBlock
            ? leftBlock.querySelectorAll("ul li")
            : null;

        // CTA buttons (primary + secondary) inside left block
        var leftCtas = leftBlock
            ? leftBlock.querySelectorAll("a.btn, button.btn")
            : null;

        // Safety: if nothing interesting found, bail
        if (!breadcrumb && !leftBlock && !rightBlock) return;

        // Initial states
        if (breadcrumb) {
            gsap.set(breadcrumb, {
                y: -12,
                autoAlpha: 0,
            });
        }

        var introGroup = [];

        if (leftPills && leftPills.length) {
            introGroup = introGroup.concat(
                Array.prototype.slice.call(leftPills)
            );
        }
        if (leftHeading) introGroup.push(leftHeading);
        if (leftIntro) introGroup.push(leftIntro);
        if (leftBullets && leftBullets.length) {
            introGroup = introGroup.concat(
                Array.prototype.slice.call(leftBullets)
            );
        }

        if (introGroup.length) {
            gsap.set(introGroup, {
                y: 32,
                autoAlpha: 0,
            });
        }

        if (leftCtas && leftCtas.length) {
            gsap.set(leftCtas, {
                y: 40,
                autoAlpha: 0,
                scale: 0.98,
            });
        }

        if (rightBlock) {
            gsap.set(rightBlock, {
                y: 40,
                autoAlpha: 0,
                scale: 0.95,
                rotateX: 6,
                transformOrigin: "center center",
            });
        }

        // Animate once the hero enters viewport
        observeOnce(section, function () {
            var tl = gsap.timeline({
                defaults: {
                    duration: 0.7,
                    ease: "power3.out",
                },
            });

            if (breadcrumb) {
                tl.to(
                    breadcrumb,
                    {
                        y: 0,
                        autoAlpha: 1,
                    },
                    0
                );
            }

            if (introGroup.length) {
                tl.to(
                    introGroup,
                    {
                        y: 0,
                        autoAlpha: 1,
                        stagger: 0.08,
                    },
                    breadcrumb ? "<+0.05" : 0
                );
            }

            if (leftCtas && leftCtas.length) {
                tl.to(
                    leftCtas,
                    {
                        y: 0,
                        autoAlpha: 1,
                        scale: 1,
                        stagger: 0.06,
                    },
                    "-=0.3"
                );
            }

            if (rightBlock) {
                tl.to(
                    rightBlock,
                    {
                        y: 0,
                        autoAlpha: 1,
                        scale: 1,
                        rotateX: 0,
                    },
                    "-=0.25"
                );
            }
        });
    }

    // ----------------------------------------------
    // 2) Industries Tag section animation
    // ----------------------------------------------
    function initIndustriesTagsSection(ctx) {
        if (!ctx || !ctx.hasGsap) return;
        if (ctx.prefersReducedMotion && ctx.prefersReducedMotion()) return;

        var gsap = ctx.gsap;
        if (!gsap) return;

        // Dark section with chips:
        // <section data-animate="industries-tags" ...>
        var section = document.querySelector(
            '[data-animate="industries-tags"]'
        );
        if (!section) return;

        var observeOnce =
            ctx.observeOnce ||
            function (target, fn) {
                if (typeof fn === "function") fn(null, null);
                return null;
            };

        // Header elements
        var heading = section.querySelector("h2");
        var intro = section.querySelector("p");

        var headerEls = [];
        if (heading) headerEls.push(heading);
        if (intro) headerEls.push(intro);

        // Tags wrapper + individual chips
        var tagsWrapper = section.querySelector("[data-industry-tags]");
        if (!tagsWrapper) return;

        var chipsNodeList = tagsWrapper.querySelectorAll("a");
        var chips =
            chipsNodeList && chipsNodeList.length
                ? Array.prototype.slice.call(chipsNodeList)
                : [];

        if (!headerEls.length && !chips.length) return;

        // ------------------------------
        // Initial states
        // ------------------------------

        if (headerEls.length) {
            gsap.set(headerEls, {
                y: 26,
                autoAlpha: 0,
            });
        }

        if (chips.length) {
            // Slightly varied offsets for a more organic entrance
            chips.forEach(function (chip, index) {
                var baseOffset = 34;
                var jitter = (index % 3) * 4; // 0, 4, 8
                gsap.set(chip, {
                    y: baseOffset + jitter,
                    autoAlpha: 0,
                    scale: 0.96,
                });
            });
        }

        // ------------------------------
        // Animate when section enters viewport
        // ------------------------------
        observeOnce(section, function () {
            var tl = gsap.timeline({
                defaults: {
                    duration: 0.65,
                    ease: "power3.out",
                },
            });

            if (headerEls.length) {
                tl.to(
                    headerEls,
                    {
                        y: 0,
                        autoAlpha: 1,
                        stagger: 0.08,
                    },
                    0
                );
            }

            if (chips.length) {
                tl.to(
                    chips,
                    {
                        y: 0,
                        autoAlpha: 1,
                        scale: 1,
                        stagger: {
                            each: 0.05,
                            from: "random", // modern GSAP stagger – more natural feel
                        },
                    },
                    headerEls.length ? "-=0.25" : 0
                );
            }

            // Optional: very subtle breathing effect on the whole chip cloud
            if (!ctx.prefersReducedMotion || !ctx.prefersReducedMotion()) {
                tl.add(function () {
                    gsap.to(tagsWrapper, {
                        y: "+=4",
                        duration: 3,
                        ease: "sine.inOut",
                        yoyo: true,
                        repeat: -1,
                    });
                });
            }
        });
    }

    // ----------------------------------------------
    // 3) Industries Grid section animation
    // ----------------------------------------------
    function initIndustriesGridSection(ctx) {
        if (!ctx || !ctx.hasGsap) return;
        if (ctx.prefersReducedMotion && ctx.prefersReducedMotion()) return;

        var gsap = ctx.gsap;
        if (!gsap) return;

        // Section: <section data-animate="industries-grid" ...>
        var section = document.querySelector(
            '[data-animate="industries-grid"]'
        );
        if (!section) return;

        var observeOnce =
            ctx.observeOnce ||
            function (target, fn) {
                if (typeof fn === "function") fn(null, null);
                return null;
            };

        // ------------------------------
        // Elements
        // ------------------------------

        // Header block (title + copy)
        var headerContainer = section.querySelector(".mb-10");
        var headerEls = [];

        if (headerContainer) {
            var mainTitle = headerContainer.querySelector("h2");
            var mainIntro = headerContainer.querySelector("p");
            var sideCopy = headerContainer.querySelector("p + p"); // second <p> in the flex row

            if (mainTitle) headerEls.push(mainTitle);
            if (mainIntro) headerEls.push(mainIntro);
            if (sideCopy && sideCopy !== mainIntro) headerEls.push(sideCopy);
        }

        // Cards wrapper + cards
        var cardsWrapper = section.querySelector("[data-industry-cards]");
        var cards = cardsWrapper
            ? Array.prototype.slice.call(
                  cardsWrapper.querySelectorAll("[data-industry-card]")
              )
            : [];

        if (!headerEls.length && !cards.length) return;

        // ------------------------------
        // Initial states
        // ------------------------------

        if (headerEls.length) {
            gsap.set(headerEls, {
                y: 30,
                autoAlpha: 0,
            });
        }

        if (cards.length) {
            gsap.set(cards, {
                y: 42,
                autoAlpha: 0,
                scale: 0.96,
                rotateX: 4,
                transformOrigin: "top center",
            });
        }

        // ------------------------------
        // Reveal on scroll
        // ------------------------------

        observeOnce(section, function () {
            var tl = gsap.timeline({
                defaults: {
                    duration: 0.6,
                    ease: "power2.out",
                },
            });

            if (headerEls.length) {
                tl.to(
                    headerEls,
                    {
                        y: 0,
                        autoAlpha: 1,
                        stagger: 0.08,
                    },
                    0
                );
            }

            if (cards.length) {
                tl.to(
                    cards,
                    {
                        y: 0,
                        autoAlpha: 1,
                        scale: 1,
                        rotateX: 0,
                        stagger: {
                            each: 0.07,
                            from: "edges", // more modern GSAP stagger – reveals from outer cards inward
                        },
                    },
                    headerEls.length ? "-=0.25" : 0
                );
            }
        });

        // ------------------------------
        // Micro-interactions on hover
        // ------------------------------
        if (!cards.length) return;

        cards.forEach(function (card) {
            // Skip if card is missing
            if (!card || !card.addEventListener) return;

            card.addEventListener("mouseenter", function () {
                gsap.to(card, {
                    duration: 0.2,
                    y: -6,
                    scale: 1.02,
                    ease: "power2.out",
                });
            });

            card.addEventListener("mouseleave", function () {
                gsap.to(card, {
                    duration: 0.2,
                    y: 0,
                    scale: 1,
                    ease: "power2.inOut",
                });
            });
        });
    }

    // ----------------------------------------------
    // 4) Industries Outcomes section animation
    // ----------------------------------------------
    function initIndustriesOutcomesSection(ctx) {
        if (!ctx || !ctx.hasGsap) return;
        if (ctx.prefersReducedMotion && ctx.prefersReducedMotion()) return;

        var gsap = ctx.gsap;
        if (!gsap) return;

        // Section: <section data-animate="industries-outcomes" id="industry-outcomes">
        var section = document.querySelector(
            '[data-animate="industries-outcomes"]'
        );
        if (!section) return;

        var observeOnce =
            ctx.observeOnce ||
            function (target, fn) {
                if (typeof fn === "function") fn(null, null);
                return null;
            };

        // ------------------------------
        // Elements
        // ------------------------------

        // Top flex row: left (title + intro) + right (helper copy + CTA)
        var headerRow = section.querySelector(
            ".flex.flex-col.gap-4.sm\\:flex-row"
        );

        var headerEls = [];
        if (headerRow) {
            var leftCol = headerRow.querySelector(".max-w-3xl");
            var rightCol = headerRow.querySelector(".max-w-sm");

            if (leftCol) {
                var h2 = leftCol.querySelector("h2");
                var intro = leftCol.querySelector("p");
                if (h2) headerEls.push(h2);
                if (intro) headerEls.push(intro);
            }

            if (rightCol) {
                var helperCopy = rightCol.querySelector("p");
                var ctaLink = rightCol.querySelector("a[href]");
                if (helperCopy) headerEls.push(helperCopy);
                if (ctaLink) headerEls.push(ctaLink);
            }
        }

        // Outcomes cards grid
        var cardsGrid = section.querySelector(".grid");
        var cards =
            cardsGrid && cardsGrid.querySelectorAll
                ? Array.prototype.slice.call(
                      cardsGrid.querySelectorAll("article")
                  )
                : [];

        if (!headerEls.length && !cards.length) return;

        // ------------------------------
        // Initial states
        // ------------------------------

        if (headerEls.length) {
            gsap.set(headerEls, {
                y: 26,
                autoAlpha: 0,
            });
        }

        if (cards.length) {
            gsap.set(cards, {
                y: 40,
                autoAlpha: 0,
                scale: 0.95,
                rotateX: 5,
                transformOrigin: "top center",
            });

            // Optional: slight accent on the green KPI line inside each card
            cards.forEach(function (card) {
                var kpi = card.querySelector(
                    "p.text-emerald-300, p.text-emerald-400"
                );
                if (kpi) {
                    gsap.set(kpi, {
                        autoAlpha: 0,
                        y: 10,
                    });
                }
            });
        }

        // ------------------------------
        // Reveal on scroll
        // ------------------------------
        observeOnce(section, function () {
            var tl = gsap.timeline({
                defaults: {
                    duration: 0.65,
                    ease: "power3.out",
                },
            });

            if (headerEls.length) {
                tl.to(
                    headerEls,
                    {
                        y: 0,
                        autoAlpha: 1,
                        stagger: 0.08,
                    },
                    0
                );
            }

            if (cards.length) {
                tl.to(
                    cards,
                    {
                        y: 0,
                        autoAlpha: 1,
                        scale: 1,
                        rotateX: 0,
                        stagger: {
                            each: 0.08,
                            from: "center",
                        },
                    },
                    headerEls.length ? "-=0.25" : 0
                );

                // Bring KPIs in slightly after the card bodies
                cards.forEach(function (card, index) {
                    var kpi = card.querySelector(
                        "p.text-emerald-300, p.text-emerald-400"
                    );
                    if (!kpi) return;

                    tl.to(
                        kpi,
                        {
                            autoAlpha: 1,
                            y: 0,
                            duration: 0.4,
                            ease: "power2.out",
                        },
                        "-=0.45" + index * 0.01 // tiny offset per card
                    );
                });
            }
        });

        // ------------------------------
        // Micro-interactions on hover
        // ------------------------------
        if (!cards.length) return;

        cards.forEach(function (card) {
            if (!card || !card.addEventListener) return;

            var kpi = card.querySelector(
                "p.text-emerald-300, p.text-emerald-400"
            );

            card.addEventListener("mouseenter", function () {
                gsap.to(card, {
                    duration: 0.22,
                    y: -6,
                    scale: 1.02,
                    boxShadow: "0 18px 45px rgba(15, 23, 42, 0.55)", // subtle shadow in dark section
                    ease: "power2.out",
                });

                if (kpi) {
                    gsap.to(kpi, {
                        duration: 0.25,
                        y: -2,
                        ease: "power1.out",
                    });
                }
            });

            card.addEventListener("mouseleave", function () {
                gsap.to(card, {
                    duration: 0.22,
                    y: 0,
                    scale: 1,
                    boxShadow: "0 0 0 rgba(0,0,0,0)",
                    ease: "power2.inOut",
                });

                if (kpi) {
                    gsap.to(kpi, {
                        duration: 0.25,
                        y: 0,
                        ease: "power1.inOut",
                    });
                }
            });
        });
    }

    // ----------------------------------------------
    // 5) Industries Process section animation
    // ----------------------------------------------
    function initIndustriesProcessSection(ctx) {
        if (!ctx || !ctx.hasGsap) return;
        if (ctx.prefersReducedMotion && ctx.prefersReducedMotion()) return;

        var gsap = ctx.gsap;
        if (!gsap) return;

        // Section: <section data-animate="industries-process" id="industry-process">
        var section = document.querySelector(
            '[data-animate="industries-process"]'
        );
        if (!section) return;

        var observeOnce =
            ctx.observeOnce ||
            function (target, fn) {
                if (typeof fn === "function") fn(null, null);
                return null;
            };

        // ------------------------------
        // Elements
        // ------------------------------

        // Outer wrapper container
        var wrapper =
            section.querySelector(".mx-auto.max-w-6xl.px-4") ||
            section.querySelector(".mx-auto.max-w-6xl");

        if (!wrapper) return;

        // Header block: title + intro
        var headerBlock = wrapper.querySelector(".space-y-3.max-w-3xl") || null;

        var headerEls = [];
        if (headerBlock) {
            var headerTitle = headerBlock.querySelector("h2");
            var headerIntro = headerBlock.querySelector("p");

            if (headerTitle) headerEls.push(headerTitle);
            if (headerIntro) headerEls.push(headerIntro);
        }

        // Steps grid (4 cards)
        var stepsGrid = wrapper.querySelector(".grid");
        var stepCards = stepsGrid
            ? Array.prototype.slice.call(stepsGrid.children)
            : [];

        // Bottom row: explanatory text + CTA link
        var bottomRow =
            wrapper.querySelector(".mt-4.flex.flex-col") ||
            wrapper.querySelector(".mt-4");

        var bottomEls = [];
        if (bottomRow) {
            var bottomText = bottomRow.querySelector("p");
            var bottomLink = bottomRow.querySelector("a[href]");

            if (bottomText) bottomEls.push(bottomText);
            if (bottomLink) bottomEls.push(bottomLink);
        }

        if (!headerEls.length && !stepCards.length && !bottomEls.length) return;

        // ------------------------------
        // Initial states
        // ------------------------------

        if (headerEls.length) {
            gsap.set(headerEls, {
                y: 26,
                autoAlpha: 0,
            });
        }

        if (stepCards.length) {
            gsap.set(stepCards, {
                y: 42,
                autoAlpha: 0,
                scale: 0.96,
                rotateX: 5,
                transformOrigin: "top center",
            });

            stepCards.forEach(function (card) {
                var bullets = card.querySelectorAll("ul li");
                if (bullets && bullets.length) {
                    gsap.set(bullets, {
                        y: 10,
                        autoAlpha: 0,
                    });
                }
            });
        }

        if (bottomEls.length) {
            gsap.set(bottomEls, {
                y: 20,
                autoAlpha: 0,
            });
        }

        // ------------------------------
        // Reveal on scroll
        // ------------------------------
        observeOnce(section, function () {
            var tl = gsap.timeline({
                defaults: {
                    duration: 0.65,
                    ease: "power3.out",
                },
            });

            if (headerEls.length) {
                tl.to(
                    headerEls,
                    {
                        y: 0,
                        autoAlpha: 1,
                        stagger: 0.08,
                    },
                    0
                );
            }

            if (stepCards.length) {
                // Bring in cards first
                tl.to(
                    stepCards,
                    {
                        y: 0,
                        autoAlpha: 1,
                        scale: 1,
                        rotateX: 0,
                        stagger: {
                            each: 0.08,
                            from: "start",
                        },
                    },
                    headerEls.length ? "-=0.2" : 0
                );

                // Then animate labels + bullet lists inside each card
                stepCards.forEach(function (card, index) {
                    var bullets = card.querySelectorAll("ul li");

                    if (bullets && bullets.length) {
                        tl.to(
                            bullets,
                            {
                                autoAlpha: 1,
                                y: 0,
                                stagger: 0.04,
                                duration: 0.35,
                            },
                            "-=0.4" + index * 0.02
                        );
                    }
                });
            }

            if (bottomEls.length) {
                tl.to(
                    bottomEls,
                    {
                        y: 0,
                        autoAlpha: 1,
                        stagger: 0.06,
                    },
                    "-=0.25"
                );
            }
        });

        // ------------------------------
        // Micro-interactions on hover
        // ------------------------------
        if (!stepCards.length) return;

        stepCards.forEach(function (card) {
            if (!card || !card.addEventListener) return;

            card.addEventListener("mouseenter", function () {
                gsap.to(card, {
                    duration: 0.22,
                    y: -6,
                    scale: 1.02,
                    boxShadow: "0 18px 40px rgba(15, 23, 42, 0.18)",
                    borderColor: "rgba(56, 189, 248, 0.7)", // sky-ish accent
                    ease: "power2.out",
                });
            });

            card.addEventListener("mouseleave", function () {
                gsap.to(card, {
                    duration: 0.22,
                    y: 0,
                    scale: 1,
                    boxShadow: "0 0 0 rgba(0,0,0,0)",
                    borderColor: "", // back to Tailwind default
                    ease: "power2.inOut",
                });
            });
        });
    }

    // --------------------------------------------------------
    // 6) Tech stack section
    // --------------------------------------------------------
    function initIndustriesTechStackSection(ctx) {
        if (!ctx || !ctx.hasGsap) return;
        if (ctx.prefersReducedMotion && ctx.prefersReducedMotion()) return;

        var gsap = ctx.gsap;
        if (!gsap) return;

        // Section: <section id="industry-tech-stack" data-animate="industries-tech-stack">
        var section = document.querySelector(
            '[data-animate="industries-tech-stack"]'
        );
        if (!section) return;

        var observeOnce =
            ctx.observeOnce ||
            function (target, fn) {
                if (typeof fn === "function") fn(null, null);
                return null;
            };

        // ------------------------------
        // Elements
        // ------------------------------

        // Header block: title + intro
        var headerBlock =
            section.querySelector(".space-y-3.max-w-3xl") ||
            section.querySelector(".space-y-3");

        var headerEls = [];
        if (headerBlock) {
            var headerTitle = headerBlock.querySelector("h2");
            var headerIntro = headerBlock.querySelector("p");

            if (headerTitle) headerEls.push(headerTitle);
            if (headerIntro) headerEls.push(headerIntro);
        }

        // Cards grid
        var cardsGrid = section.querySelector(".grid");
        var cards =
            cardsGrid && cardsGrid.children
                ? Array.prototype.slice.call(cardsGrid.children)
                : [];

        if (!headerEls.length && !cards.length) return;

        // ------------------------------
        // Initial states
        // ------------------------------

        if (headerEls.length) {
            gsap.set(headerEls, {
                y: 26,
                autoAlpha: 0,
            });
        }

        if (cards.length) {
            gsap.set(cards, {
                y: 42,
                autoAlpha: 0,
                scale: 0.96,
                rotateX: 4,
                transformOrigin: "top center",
            });

            // Prep inner content for nicer stagger
            cards.forEach(function (card) {
                var title = card.querySelector("h3");
                var intro = card.querySelector("p");
                var bullets = card.querySelectorAll("ul li");

                if (title) {
                    gsap.set(title, {
                        y: 16,
                        autoAlpha: 0,
                    });
                }

                if (intro) {
                    gsap.set(intro, {
                        y: 18,
                        autoAlpha: 0,
                    });
                }

                if (bullets && bullets.length) {
                    gsap.set(bullets, {
                        y: 10,
                        autoAlpha: 0,
                    });
                }
            });
        }

        // ------------------------------
        // Reveal on scroll
        // ------------------------------
        observeOnce(section, function () {
            var tl = gsap.timeline({
                defaults: {
                    duration: 0.6,
                    ease: "power2.out",
                },
            });

            if (headerEls.length) {
                tl.to(
                    headerEls,
                    {
                        y: 0,
                        autoAlpha: 1,
                        stagger: 0.08,
                    },
                    0
                );
            }

            if (cards.length) {
                // Bring cards in first
                tl.to(
                    cards,
                    {
                        y: 0,
                        autoAlpha: 1,
                        scale: 1,
                        rotateX: 0,
                        stagger: {
                            each: 0.07,
                            from: "center", // center-out reveal
                        },
                    },
                    headerEls.length ? "-=0.2" : 0
                );

                // Then animate card internals (title, intro, bullets)
                cards.forEach(function (card, index) {
                    var title = card.querySelector("h3");
                    var intro = card.querySelector("p");
                    var bullets = card.querySelectorAll("ul li");

                    var baseOffset = "-=0.45" + index * 0.02;

                    if (title) {
                        tl.to(
                            title,
                            {
                                y: 0,
                                autoAlpha: 1,
                                duration: 0.4,
                            },
                            baseOffset
                        );
                    }

                    if (intro) {
                        tl.to(
                            intro,
                            {
                                y: 0,
                                autoAlpha: 1,
                                duration: 0.4,
                            },
                            baseOffset
                        );
                    }

                    if (bullets && bullets.length) {
                        tl.to(
                            bullets,
                            {
                                y: 0,
                                autoAlpha: 1,
                                stagger: 0.035,
                                duration: 0.35,
                            },
                            baseOffset
                        );
                    }
                });
            }
        });

        // ------------------------------
        // Micro-interactions on hover
        // ------------------------------
        if (!cards.length) return;

        cards.forEach(function (card) {
            if (!card || !card.addEventListener) return;

            card.addEventListener("mouseenter", function () {
                gsap.to(card, {
                    duration: 0.2,
                    y: -5,
                    scale: 1.02,
                    boxShadow: "0 16px 35px rgba(15, 23, 42, 0.12)",
                    borderColor: "rgba(56, 189, 248, 0.7)", // subtle sky accent
                    ease: "power2.out",
                });
            });

            card.addEventListener("mouseleave", function () {
                gsap.to(card, {
                    duration: 0.2,
                    y: 0,
                    scale: 1,
                    boxShadow: "0 0 0 rgba(0,0,0,0)",
                    borderColor: "",
                    ease: "power2.inOut",
                });
            });
        });
    }

    // --------------------------------------------------------
    // 7) Tech tags cloud
    // --------------------------------------------------------
    function initIndustriesTechTagsSection(ctx) {
        if (!ctx || !ctx.hasGsap) return;
        if (ctx.prefersReducedMotion && ctx.prefersReducedMotion()) return;

        var gsap = ctx.gsap;
        if (!gsap) return;

        // Section: <section data-animate="industries-tech-tags">
        var section = document.querySelector(
            '[data-animate="industries-tech-tags"]'
        );
        if (!section) return;

        var observeOnce =
            ctx.observeOnce ||
            function (target, fn) {
                if (typeof fn === "function") fn(null, null);
                return null;
            };

        // ------------------------------
        // Elements
        // ------------------------------

        // Header: h2 + intro paragraph
        var headerBlock =
            section.querySelector(".mb-8.max-w-2xl.space-y-3") ||
            section.querySelector(".mb-8");

        var headerEls = [];
        if (headerBlock) {
            var heading = headerBlock.querySelector("h2");
            var intro = headerBlock.querySelector("p");

            if (heading) headerEls.push(heading);
            if (intro) headerEls.push(intro);
        }

        // Tags wrapper + chips
        var tagsWrapper = section.querySelector("[data-tech-tags]");
        var chips =
            tagsWrapper && tagsWrapper.querySelectorAll
                ? Array.prototype.slice.call(tagsWrapper.querySelectorAll("a"))
                : [];

        if (!headerEls.length && !chips.length) return;

        // ------------------------------
        // Initial states
        // ------------------------------

        if (headerEls.length) {
            gsap.set(headerEls, {
                y: 26,
                autoAlpha: 0,
            });
        }

        if (chips.length) {
            chips.forEach(function (chip, index) {
                // Slight variation to avoid all chips moving identically
                var baseOffset = 34;
                var jitter = (index % 4) * 3; // 0, 3, 6, 9

                gsap.set(chip, {
                    y: baseOffset + jitter,
                    autoAlpha: 0,
                    scale: 0.94,
                });
            });
        }

        // ------------------------------
        // Reveal on scroll
        // ------------------------------
        observeOnce(section, function () {
            var tl = gsap.timeline({
                defaults: {
                    duration: 0.6,
                    ease: "power3.out",
                },
            });

            if (headerEls.length) {
                tl.to(
                    headerEls,
                    {
                        y: 0,
                        autoAlpha: 1,
                        stagger: 0.08,
                    },
                    0
                );
            }

            if (chips.length) {
                tl.to(
                    chips,
                    {
                        y: 0,
                        autoAlpha: 1,
                        scale: 1,
                        stagger: {
                            each: 0.045,
                            from: "random", // organic-feeling entrance
                        },
                    },
                    headerEls.length ? "-=0.25" : 0
                );
            }

            // Subtle breathing motion for the whole chips cloud (if motion allowed)
            if (!ctx.prefersReducedMotion || !ctx.prefersReducedMotion()) {
                tl.add(function () {
                    gsap.to(tagsWrapper, {
                        y: "+=4",
                        duration: 3,
                        ease: "sine.inOut",
                        yoyo: true,
                        repeat: -1,
                    });
                });
            }
        });

        // ------------------------------
        // Micro-interactions on hover
        // ------------------------------
        if (!chips.length) return;

        chips.forEach(function (chip) {
            if (!chip || !chip.addEventListener) return;

            chip.addEventListener("mouseenter", function () {
                gsap.to(chip, {
                    duration: 0.18,
                    y: -3,
                    scale: 1.04,
                    ease: "power2.out",
                });
            });

            chip.addEventListener("mouseleave", function () {
                gsap.to(chip, {
                    duration: 0.18,
                    y: 0,
                    scale: 1,
                    ease: "power2.inOut",
                });
            });
        });
    }

    // --------------------------------------------------------
    // 8) Common use cases section (multi-column white cards)
    // --------------------------------------------------------
    function initIndustriesUseCasesSection(ctx) {
        if (!ctx || !ctx.hasGsap) return;
        if (ctx.prefersReducedMotion && ctx.prefersReducedMotion()) return;

        var gsap = ctx.gsap;
        if (!gsap) return;

        // Section: <section class="..." data-animate="industries-use-cases">
        var section = document.querySelector(
            '[data-animate="industries-use-cases"]'
        );
        if (!section) return;

        var observeOnce =
            ctx.observeOnce ||
            function (target, fn) {
                if (typeof fn === "function") fn(null, null);
                return null;
            };

        // ------------------------------
        // Elements
        // ------------------------------

        // Header block: title + intro
        var headerBlock =
            section.querySelector(".space-y-3.max-w-3xl") ||
            section.querySelector(".space-y-3");

        var headerEls = [];
        if (headerBlock) {
            var heading = headerBlock.querySelector("h2");
            var intro = headerBlock.querySelector("p");

            if (heading) headerEls.push(heading);
            if (intro) headerEls.push(intro);
        }

        // Cards grid
        var grid = section.querySelector(".grid");
        var cards = [];

        if (grid && grid.children && grid.children.length) {
            cards = Array.prototype.slice.call(grid.children);
        }

        if (!headerEls.length && !cards.length) return;

        // ------------------------------
        // Initial states
        // ------------------------------

        if (headerEls.length) {
            gsap.set(headerEls, {
                y: 26,
                autoAlpha: 0,
            });
        }

        if (cards.length) {
            // Base transform for each card
            gsap.set(cards, {
                y: 48,
                autoAlpha: 0,
                scale: 0.96,
                rotateX: 4,
                transformOrigin: "top center",
            });

            // Prepare internal elements for more detailed stagger
            cards.forEach(function (card) {
                // Title
                var title = card.querySelector("h3");
                // Description paragraph (first normal body <p> after title)
                var paragraphs = card.querySelectorAll("p");
                var body = null;
                if (paragraphs && paragraphs.length > 1) {
                    // Heuristic: body is usually the second or third <p>
                    body = paragraphs[1] || paragraphs[paragraphs.length - 1];
                }
                // Bullets
                var bullets = card.querySelectorAll("ul li");

                if (title) {
                    gsap.set(title, {
                        y: 16,
                        autoAlpha: 0,
                    });
                }
                if (body) {
                    gsap.set(body, {
                        y: 18,
                        autoAlpha: 0,
                    });
                }
                if (bullets && bullets.length) {
                    gsap.set(bullets, {
                        y: 10,
                        autoAlpha: 0,
                    });
                }
            });
        }

        // ------------------------------
        // Reveal on scroll
        // ------------------------------
        observeOnce(section, function () {
            var tl = gsap.timeline({
                defaults: {
                    duration: 0.6,
                    ease: "power2.out",
                },
            });

            if (headerEls.length) {
                tl.to(
                    headerEls,
                    {
                        y: 0,
                        autoAlpha: 1,
                        stagger: 0.08,
                    },
                    0
                );
            }

            if (cards.length) {
                // Bring cards in first, with a center-out stagger
                tl.to(
                    cards,
                    {
                        y: 0,
                        autoAlpha: 1,
                        scale: 1,
                        rotateX: 0,
                        stagger: {
                            each: 0.07,
                            from: "center",
                        },
                    },
                    headerEls.length ? "-=0.2" : 0
                );

                // Then animate internal content per card
                cards.forEach(function (card, index) {
                    var title = card.querySelector("h3");
                    var paragraphs = card.querySelectorAll("p");
                    var body = null;
                    if (paragraphs && paragraphs.length > 1) {
                        body =
                            paragraphs[1] || paragraphs[paragraphs.length - 1];
                    }
                    var bullets = card.querySelectorAll("ul li");

                    var baseOffset = "-=0.45" + index * 0.02;

                    if (title) {
                        tl.to(
                            title,
                            {
                                y: 0,
                                autoAlpha: 1,
                                duration: 0.38,
                            },
                            baseOffset
                        );
                    }

                    if (body) {
                        tl.to(
                            body,
                            {
                                y: 0,
                                autoAlpha: 1,
                                duration: 0.4,
                            },
                            baseOffset
                        );
                    }

                    if (bullets && bullets.length) {
                        tl.to(
                            bullets,
                            {
                                y: 0,
                                autoAlpha: 1,
                                stagger: 0.04,
                                duration: 0.35,
                            },
                            baseOffset
                        );
                    }
                });
            }
        });

        // ------------------------------
        // Micro-interactions on hover
        // ------------------------------
        if (!cards.length) return;

        cards.forEach(function (card) {
            if (!card || !card.addEventListener) return;

            card.addEventListener("mouseenter", function () {
                gsap.to(card, {
                    duration: 0.2,
                    y: -6,
                    scale: 1.02,
                    boxShadow: "0 18px 40px rgba(15, 23, 42, 0.12)",
                    borderColor: "rgba(56, 189, 248, 0.7)", // subtle sky accent
                    ease: "power2.out",
                });
            });

            card.addEventListener("mouseleave", function () {
                gsap.to(card, {
                    duration: 0.2,
                    y: 0,
                    scale: 1,
                    boxShadow: "0 0 0 rgba(0,0,0,0)",
                    borderColor: "",
                    ease: "power2.inOut",
                });
            });
        });
    }

    // --------------------------------------------------------
    // 9) Social proof / client types section
    // --------------------------------------------------------
    function initIndustriesSocialProofSection(ctx) {
        if (!ctx || !ctx.hasGsap) return;
        if (ctx.prefersReducedMotion && ctx.prefersReducedMotion()) return;

        var gsap = ctx.gsap;
        if (!gsap) return;

        // Section: <section id="industry-social-proof" data-animate="industries-social-proof">
        var section = document.querySelector(
            '[data-animate="industries-social-proof"]'
        );
        if (!section) return;

        var observeOnce =
            ctx.observeOnce ||
            function (target, fn) {
                if (typeof fn === "function") fn(null, null);
                return null;
            };

        // ------------------------------
        // Elements
        // ------------------------------

        // Top row: left (title + paragraph), right (small explanatory copy)
        var headerRow = section.querySelector(
            ".flex.flex-col.gap-4.sm\\:flex-row"
        );

        var headerEls = [];
        if (headerRow) {
            var leftBlock =
                headerRow.querySelector(".space-y-3.max-w-3xl") ||
                headerRow.firstElementChild;

            var rightBlock =
                headerRow.querySelector(".max-w-sm.text-xs") ||
                headerRow.lastElementChild;

            if (leftBlock) {
                var h2 = leftBlock.querySelector("h2");
                var intro = leftBlock.querySelector("p");
                if (h2) headerEls.push(h2);
                if (intro) headerEls.push(intro);
            }

            if (rightBlock) {
                var rightPs = rightBlock.querySelectorAll("p");
                if (rightPs && rightPs.length) {
                    headerEls = headerEls.concat(
                        Array.prototype.slice.call(rightPs)
                    );
                }
            }
        }

        // Grid of client types / logos
        var grid = section.querySelector(".grid");
        var cards =
            grid && grid.children && grid.children.length
                ? Array.prototype.slice.call(grid.children)
                : [];

        if (!headerEls.length && !cards.length) return;

        // ------------------------------
        // Initial states
        // ------------------------------

        if (headerEls.length) {
            gsap.set(headerEls, {
                y: 26,
                autoAlpha: 0,
            });
        }

        if (cards.length) {
            gsap.set(cards, {
                y: 40,
                autoAlpha: 0,
                scale: 0.96,
                rotateX: 4,
                transformOrigin: "top center",
            });

            // Prepare internal elements: badge + labels
            cards.forEach(function (card) {
                var badge = card.querySelector("span");
                var labels = card.querySelectorAll("p");

                if (badge) {
                    gsap.set(badge, {
                        scale: 0,
                        autoAlpha: 0,
                        rotation: -20,
                        transformOrigin: "center center",
                    });
                }

                if (labels && labels.length) {
                    gsap.set(labels, {
                        y: 14,
                        autoAlpha: 0,
                    });
                }
            });
        }

        // ------------------------------
        // Reveal on scroll
        // ------------------------------
        observeOnce(section, function () {
            var tl = gsap.timeline({
                defaults: {
                    duration: 0.6,
                    ease: "power2.out",
                },
            });

            if (headerEls.length) {
                tl.to(
                    headerEls,
                    {
                        y: 0,
                        autoAlpha: 1,
                        stagger: 0.08,
                    },
                    0
                );
            }

            if (cards.length) {
                // Bring cards in first with a from-edges stagger (outer cards first)
                tl.to(
                    cards,
                    {
                        y: 0,
                        autoAlpha: 1,
                        scale: 1,
                        rotateX: 0,
                        stagger: {
                            each: 0.07,
                            from: "edges",
                        },
                    },
                    headerEls.length ? "-=0.2" : 0
                );

                // Then animate badge + labels within each card
                cards.forEach(function (card, index) {
                    var badge = card.querySelector("span");
                    var labels = card.querySelectorAll("p");
                    var baseOffset = "-=0.45" + index * 0.02;

                    if (badge) {
                        tl.to(
                            badge,
                            {
                                scale: 1,
                                autoAlpha: 1,
                                rotation: 0,
                                duration: 0.35,
                                ease: "back.out(1.7)",
                            },
                            baseOffset
                        );
                    }

                    if (labels && labels.length) {
                        tl.to(
                            labels,
                            {
                                y: 0,
                                autoAlpha: 1,
                                stagger: 0.04,
                                duration: 0.35,
                            },
                            baseOffset
                        );
                    }
                });
            }
        });

        // ------------------------------
        // Micro-interactions on hover
        // ------------------------------
        if (!cards.length) return;

        cards.forEach(function (card) {
            if (!card || !card.addEventListener) return;

            var badge = card.querySelector("span");

            card.addEventListener("mouseenter", function () {
                gsap.to(card, {
                    duration: 0.2,
                    y: -5,
                    scale: 1.02,
                    boxShadow: "0 16px 35px rgba(15, 23, 42, 0.12)",
                    borderColor: "rgba(56, 189, 248, 0.7)",
                    ease: "power2.out",
                });

                if (badge) {
                    gsap.to(badge, {
                        duration: 0.25,
                        rotation: 10,
                        scale: 1.05,
                        ease: "power2.out",
                    });
                }
            });

            card.addEventListener("mouseleave", function () {
                gsap.to(card, {
                    duration: 0.2,
                    y: 0,
                    scale: 1,
                    boxShadow: "0 0 0 rgba(0,0,0,0)",
                    borderColor: "",
                    ease: "power2.inOut",
                });

                if (badge) {
                    gsap.to(badge, {
                        duration: 0.25,
                        rotation: 0,
                        scale: 1,
                        ease: "power2.inOut",
                    });
                }
            });
        });
    }
})();
