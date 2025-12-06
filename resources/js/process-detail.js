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

    function createIntersectionObserver(options) {
        if (typeof window.IntersectionObserver !== "function") return null;
        return new IntersectionObserver(function (entries, observer) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) return;
                var el = entry.target;
                el.classList.add("is-visible");
                el.style.opacity = "";
                el.style.transform = "";
                observer.unobserve(el);
            });
        }, options || { rootMargin: "0px 0px -10% 0px", threshold: 0.1 });
    }

    // ------------------------------
    // Bootstrap
    // ------------------------------
    onReady(function () {
        const body = document.body;
        if (!body || !body.classList.contains("page-process-detail")) {
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

        var ctx = {
            body: body,
            hasGsap: hasGsap,
            gsap: gsap,
            hasScrollTrigger: hasScrollTrigger,
            ScrollTrigger: hasScrollTrigger ? window.ScrollTrigger : null,
            prefersReducedMotion: prefersReducedMotion,
            isDesktop: isDesktop,
        };

        initMvpHeroSection({ gsap, hasGsap, prefersReducedMotion, isDesktop });
        initMvpFitSection({ gsap, hasGsap, prefersReducedMotion });
        initMvpServicesSection({ gsap, hasGsap, prefersReducedMotion });
        initMvpProcessSection({ gsap, hasGsap, prefersReducedMotion });
        initMvpEngagementsSection({ gsap, hasGsap, prefersReducedMotion });
        initMvpProofSection({ gsap, hasGsap, prefersReducedMotion });
        initMvpTechSection({ gsap, hasGsap, prefersReducedMotion });
        initMvpWhySection({ gsap, hasGsap, prefersReducedMotion });
        initMvpFaqSection({ gsap, hasGsap, prefersReducedMotion });
        initMvpFinalCtaSection({ gsap, hasGsap, prefersReducedMotion });
    });

    // ------------------------------
    // Section initialisers
    // ------------------------------

    function initMvpHeroSection(ctx) {
        const { gsap, hasGsap, prefersReducedMotion } = ctx;

        const section = document.querySelector("[data-mvp-section]");
        if (!section) return;

        const heroEls = Array.from(
            section.querySelectorAll("[data-mvp-hero-el]")
        );
        if (!heroEls.length) return;

        // If GSAP missing or user prefers reduced motion → keep static
        if (!hasGsap || prefersReducedMotion) {
            return;
        }

        // Run once
        let hasAnimated = false;

        function animateIn() {
            if (hasAnimated) return;
            hasAnimated = true;

            // Base hero reveal
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

    function initMvpFitSection(ctx) {
        var section = document.querySelector('#mvp-fit[data-mvp-section="s2"]');
        if (!section) return;

        var hasGsap = ctx.hasGsap;
        var gsap = ctx.gsap;
        var prefersReducedMotion = ctx.prefersReducedMotion;

        var cards = section.querySelectorAll("article");
        var problemsBox = section.querySelector(".bg-slate-900");

        if (!cards.length && !problemsBox) return;

        if (prefersReducedMotion) {
            cards.forEach(function (card) {
                card.style.opacity = "";
                card.style.transform = "";
            });
            if (problemsBox) {
                problemsBox.style.opacity = "";
                problemsBox.style.transform = "";
            }
            return;
        }

        // GSAP path
        if (hasGsap && gsap) {
            if (cards.length) {
                gsap.set(cards, {
                    autoAlpha: 0,
                    y: 24,
                });

                cards.forEach(function (card) {
                    gsap.to(card, {
                        autoAlpha: 1,
                        y: 0,
                        duration: 0.6,
                        ease: "power2.out",
                        scrollTrigger: {
                            trigger: card,
                            start: "top 80%",
                            toggleActions: "play none none reverse",
                        },
                    });
                });
            }

            if (problemsBox && ctx.hasScrollTrigger && ctx.ScrollTrigger) {
                gsap.set(problemsBox, {
                    autoAlpha: 0,
                    y: 24,
                });

                gsap.to(problemsBox, {
                    autoAlpha: 1,
                    y: 0,
                    duration: 0.6,
                    ease: "power2.out",
                    scrollTrigger: {
                        trigger: problemsBox,
                        start: "top 80%",
                        toggleActions: "play none none reverse",
                    },
                });
            }

            return;
        }

        // Fallback: IntersectionObserver reveal
        var revealTargets = Array.prototype.slice.call(cards);
        if (problemsBox) revealTargets.push(problemsBox);

        revealTargets.forEach(function (el) {
            el.style.opacity = "0";
            el.style.transform = "translateY(18px)";
            el.style.transition =
                "opacity 360ms ease-out, transform 360ms ease-out";
        });

        var observer = createIntersectionObserver();
        if (!observer) {
            revealTargets.forEach(function (el) {
                el.style.opacity = "";
                el.style.transform = "";
            });
            return;
        }

        revealTargets.forEach(function (el) {
            observer.observe(el);
        });
    }

    function initMvpServicesSection(ctx) {
        var section = document.querySelector(
            '#mvp-services[data-mvp-section="s3"]'
        );
        if (!section) return;

        var hasGsap = ctx.hasGsap;
        var gsap = ctx.gsap;
        var prefersReducedMotion = ctx.prefersReducedMotion;

        var headerEls = section.querySelectorAll("header h2, header p");
        var cards = section.querySelectorAll("[data-mvp-service-card]");
        var note = section.querySelector("p.text-sm.text-slate-500");

        if (!cards.length && !headerEls.length) return;

        if (prefersReducedMotion) {
            headerEls.forEach(function (el) {
                el.style.opacity = "";
                el.style.transform = "";
            });
            cards.forEach(function (card) {
                card.style.opacity = "";
                card.style.transform = "";
            });
            if (note) {
                note.style.opacity = "";
                note.style.transform = "";
            }
            return;
        }

        // GSAP path
        if (hasGsap && gsap) {
            if (headerEls.length) {
                gsap.set(headerEls, {
                    autoAlpha: 0,
                    y: 16,
                });

                gsap.to(headerEls, {
                    autoAlpha: 1,
                    y: 0,
                    duration: 0.5,
                    ease: "power2.out",
                    stagger: 0.05,
                    scrollTrigger: {
                        trigger: section,
                        start: "top 80%",
                        toggleActions: "play none none reverse",
                    },
                });
            }

            if (cards.length) {
                gsap.set(cards, {
                    autoAlpha: 0,
                    y: 30,
                    rotateX: 6,
                    transformOrigin: "center bottom",
                });

                gsap.to(cards, {
                    autoAlpha: 1,
                    y: 0,
                    rotateX: 0,
                    duration: 0.6,
                    ease: "power2.out",
                    stagger: 0.06,
                    scrollTrigger: {
                        trigger: section,
                        start: "top 70%",
                        toggleActions: "play none none reverse",
                    },
                });
            }

            if (note) {
                gsap.set(note, {
                    autoAlpha: 0,
                    y: 16,
                });

                gsap.to(note, {
                    autoAlpha: 1,
                    y: 0,
                    duration: 0.5,
                    ease: "power2.out",
                    scrollTrigger: {
                        trigger: note,
                        start: "top 85%",
                        toggleActions: "play none none reverse",
                    },
                });
            }

            return;
        }

        // Fallback: IntersectionObserver reveal
        var revealTargets = []
            .concat(Array.prototype.slice.call(headerEls))
            .concat(Array.prototype.slice.call(cards));

        if (note) revealTargets.push(note);

        revealTargets.forEach(function (el) {
            el.style.opacity = "0";
            el.style.transform = "translateY(16px)";
            el.style.transition =
                "opacity 360ms ease-out, transform 360ms ease-out";
        });

        var observer = createIntersectionObserver();
        if (!observer) {
            revealTargets.forEach(function (el) {
                el.style.opacity = "";
                el.style.transform = "";
            });
            return;
        }

        revealTargets.forEach(function (el) {
            observer.observe(el);
        });
    }

    // Additional MVP section initialisers for Startup MVP page.
    // Assumes the same `ctx` shape and `createIntersectionObserver` helper
    // as used for Hero / Fit / Services sections.

    // S4 – MVP Process
    function initMvpProcessSection(ctx) {
        var section = document.querySelector('[data-mvp-section="s4"]');
        if (!section) return;

        var hasGsap = ctx.hasGsap;
        var gsap = ctx.gsap;
        var ScrollTrigger = ctx.ScrollTrigger;
        var hasScrollTrigger = ctx.hasScrollTrigger;
        var prefersReducedMotion = ctx.prefersReducedMotion;

        var headerEls = section.querySelectorAll(
            "header p, header h2, header div"
        );
        var steps = section.querySelectorAll("[data-mvp-step]");

        if (!headerEls.length && !steps.length) return;

        if (prefersReducedMotion) {
            headerEls.forEach(function (el) {
                el.style.opacity = "";
                el.style.transform = "";
            });
            steps.forEach(function (el) {
                el.style.opacity = "";
                el.style.transform = "";
            });
            return;
        }

        if (hasGsap && gsap) {
            if (headerEls.length && hasScrollTrigger && ScrollTrigger) {
                gsap.set(headerEls, {
                    autoAlpha: 0,
                    y: 18,
                });

                gsap.to(headerEls, {
                    autoAlpha: 1,
                    y: 0,
                    duration: 0.6,
                    ease: "power2.out",
                    stagger: 0.06,
                    scrollTrigger: {
                        trigger: section,
                        start: "top 80%",
                        toggleActions: "play none none reverse",
                    },
                });
            }

            if (steps.length && hasScrollTrigger && ScrollTrigger) {
                gsap.set(steps, {
                    autoAlpha: 0,
                    x: -18,
                });

                gsap.to(steps, {
                    autoAlpha: 1,
                    x: 0,
                    duration: 0.5,
                    ease: "power2.out",
                    stagger: 0.08,
                    scrollTrigger: {
                        trigger: section,
                        start: "top 70%",
                        toggleActions: "play none none reverse",
                    },
                });
            }

            return;
        }

        // Fallback: IntersectionObserver
        var revealTargets = []
            .concat(Array.prototype.slice.call(headerEls))
            .concat(Array.prototype.slice.call(steps));

        revealTargets.forEach(function (el) {
            el.style.opacity = "0";
            el.style.transform = "translateY(14px)";
            el.style.transition =
                "opacity 340ms ease-out, transform 340ms ease-out";
        });

        var observer = createIntersectionObserver();
        if (!observer) {
            revealTargets.forEach(function (el) {
                el.style.opacity = "";
                el.style.transform = "";
            });
            return;
        }

        revealTargets.forEach(function (el) {
            observer.observe(el);
        });
    }

    // S5 – Engagement Models & Budget Guidance
    function initMvpEngagementsSection(ctx) {
        var section = document.querySelector('[data-mvp-section="s5"]');
        if (!section) return;

        var hasGsap = ctx.hasGsap;
        var gsap = ctx.gsap;
        var ScrollTrigger = ctx.ScrollTrigger;
        var hasScrollTrigger = ctx.hasScrollTrigger;
        var prefersReducedMotion = ctx.prefersReducedMotion;

        var headerEls = section.querySelectorAll("header h2, header p");
        var cards = section.querySelectorAll("[data-mvp-engagement-card]");
        var note = section.querySelector("p.text-sm.text-slate-500");

        if (!headerEls.length && !cards.length) return;

        if (prefersReducedMotion) {
            headerEls.forEach(function (el) {
                el.style.opacity = "";
                el.style.transform = "";
            });
            cards.forEach(function (card) {
                card.style.opacity = "";
                card.style.transform = "";
            });
            if (note) {
                note.style.opacity = "";
                note.style.transform = "";
            }
            return;
        }

        if (hasGsap && gsap && hasScrollTrigger && ScrollTrigger) {
            if (headerEls.length) {
                gsap.set(headerEls, {
                    autoAlpha: 0,
                    y: 16,
                });

                gsap.to(headerEls, {
                    autoAlpha: 1,
                    y: 0,
                    duration: 0.5,
                    ease: "power2.out",
                    stagger: 0.05,
                    scrollTrigger: {
                        trigger: section,
                        start: "top 80%",
                        toggleActions: "play none none reverse",
                    },
                });
            }

            if (cards.length) {
                gsap.set(cards, {
                    autoAlpha: 0,
                    y: 26,
                    scale: 0.98,
                    transformOrigin: "center bottom",
                });

                gsap.to(cards, {
                    autoAlpha: 1,
                    y: 0,
                    scale: 1,
                    duration: 0.6,
                    ease: "power2.out",
                    stagger: 0.06,
                    scrollTrigger: {
                        trigger: section,
                        start: "top 72%",
                        toggleActions: "play none none reverse",
                    },
                });
            }

            if (note) {
                gsap.set(note, {
                    autoAlpha: 0,
                    y: 14,
                });

                gsap.to(note, {
                    autoAlpha: 1,
                    y: 0,
                    duration: 0.45,
                    ease: "power2.out",
                    scrollTrigger: {
                        trigger: note,
                        start: "top 85%",
                        toggleActions: "play none none reverse",
                    },
                });
            }

            return;
        }

        // Fallback: IntersectionObserver
        var revealTargets = []
            .concat(Array.prototype.slice.call(headerEls))
            .concat(Array.prototype.slice.call(cards));

        if (note) revealTargets.push(note);

        revealTargets.forEach(function (el) {
            el.style.opacity = "0";
            el.style.transform = "translateY(16px)";
            el.style.transition =
                "opacity 360ms ease-out, transform 360ms ease-out";
        });

        var observer = createIntersectionObserver();
        if (!observer) {
            revealTargets.forEach(function (el) {
                el.style.opacity = "";
                el.style.transform = "";
            });
            return;
        }

        revealTargets.forEach(function (el) {
            observer.observe(el);
        });
    }

    // S6 – MVP Case Studies & Outcomes
    function initMvpProofSection(ctx) {
        var section = document.querySelector('[data-mvp-section="s6"]');
        if (!section) return;

        var hasGsap = ctx.hasGsap;
        var gsap = ctx.gsap;
        var ScrollTrigger = ctx.ScrollTrigger;
        var hasScrollTrigger = ctx.hasScrollTrigger;
        var prefersReducedMotion = ctx.prefersReducedMotion;

        var headerEls = section.querySelectorAll("header h2, header p");
        var cards = section.querySelectorAll("[data-mvp-proof-card]");

        if (!headerEls.length && !cards.length) return;

        if (prefersReducedMotion) {
            headerEls.forEach(function (el) {
                el.style.opacity = "";
                el.style.transform = "";
            });
            cards.forEach(function (card) {
                card.style.opacity = "";
                card.style.transform = "";
            });
            return;
        }

        if (hasGsap && gsap && hasScrollTrigger && ScrollTrigger) {
            if (headerEls.length) {
                gsap.set(headerEls, {
                    autoAlpha: 0,
                    y: 18,
                });

                gsap.to(headerEls, {
                    autoAlpha: 1,
                    y: 0,
                    duration: 0.5,
                    ease: "power2.out",
                    stagger: 0.06,
                    scrollTrigger: {
                        trigger: section,
                        start: "top 80%",
                        toggleActions: "play none none reverse",
                    },
                });
            }

            if (cards.length) {
                gsap.set(cards, {
                    autoAlpha: 0,
                    y: 30,
                });

                gsap.to(cards, {
                    autoAlpha: 1,
                    y: 0,
                    duration: 0.6,
                    ease: "power2.out",
                    stagger: 0.07,
                    scrollTrigger: {
                        trigger: section,
                        start: "top 72%",
                        toggleActions: "play none none reverse",
                    },
                });
            }

            return;
        }

        // Fallback: IntersectionObserver
        var revealTargets = []
            .concat(Array.prototype.slice.call(headerEls))
            .concat(Array.prototype.slice.call(cards));

        revealTargets.forEach(function (el) {
            el.style.opacity = "0";
            el.style.transform = "translateY(18px)";
            el.style.transition =
                "opacity 360ms ease-out, transform 360ms ease-out";
        });

        var observer = createIntersectionObserver();
        if (!observer) {
            revealTargets.forEach(function (el) {
                el.style.opacity = "";
                el.style.transform = "";
            });
            return;
        }

        revealTargets.forEach(function (el) {
            observer.observe(el);
        });
    }

    // S7 – Tech Stack & Delivery Capabilities
    function initMvpTechSection(ctx) {
        var section = document.querySelector('[data-mvp-section="s7"]');
        if (!section) return;

        var hasGsap = ctx.hasGsap;
        var gsap = ctx.gsap;
        var ScrollTrigger = ctx.ScrollTrigger;
        var hasScrollTrigger = ctx.hasScrollTrigger;
        var prefersReducedMotion = ctx.prefersReducedMotion;

        var headerEls = section.querySelectorAll("header h2, header p");
        var techItems = section.querySelectorAll("[data-mvp-tech-item]");
        var note = section.querySelector("p.text-sm.text-slate-500");

        if (!headerEls.length && !techItems.length) return;

        if (prefersReducedMotion) {
            headerEls.forEach(function (el) {
                el.style.opacity = "";
                el.style.transform = "";
            });
            techItems.forEach(function (el) {
                el.style.opacity = "";
                el.style.transform = "";
            });
            if (note) {
                note.style.opacity = "";
                note.style.transform = "";
            }
            return;
        }

        if (hasGsap && gsap && hasScrollTrigger && ScrollTrigger) {
            if (headerEls.length) {
                gsap.set(headerEls, {
                    autoAlpha: 0,
                    y: 18,
                });

                gsap.to(headerEls, {
                    autoAlpha: 1,
                    y: 0,
                    duration: 0.5,
                    ease: "power2.out",
                    stagger: 0.05,
                    scrollTrigger: {
                        trigger: section,
                        start: "top 80%",
                        toggleActions: "play none none reverse",
                    },
                });
            }

            if (techItems.length) {
                gsap.set(techItems, {
                    autoAlpha: 0,
                    y: 24,
                    scale: 0.97,
                });

                gsap.to(techItems, {
                    autoAlpha: 1,
                    y: 0,
                    scale: 1,
                    duration: 0.5,
                    ease: "power2.out",
                    stagger: 0.05,
                    scrollTrigger: {
                        trigger: section,
                        start: "top 75%",
                        toggleActions: "play none none reverse",
                    },
                });
            }

            if (note) {
                gsap.set(note, {
                    autoAlpha: 0,
                    y: 16,
                });

                gsap.to(note, {
                    autoAlpha: 1,
                    y: 0,
                    duration: 0.45,
                    ease: "power2.out",
                    scrollTrigger: {
                        trigger: note,
                        start: "top 85%",
                        toggleActions: "play none none reverse",
                    },
                });
            }

            return;
        }

        // Fallback: IntersectionObserver
        var revealTargets = []
            .concat(Array.prototype.slice.call(headerEls))
            .concat(Array.prototype.slice.call(techItems));

        if (note) revealTargets.push(note);

        revealTargets.forEach(function (el) {
            el.style.opacity = "0";
            el.style.transform = "translateY(16px)";
            el.style.transition =
                "opacity 340ms ease-out, transform 340ms ease-out";
        });

        var observer = createIntersectionObserver();
        if (!observer) {
            revealTargets.forEach(function (el) {
                el.style.opacity = "";
                el.style.transform = "";
            });
            return;
        }

        revealTargets.forEach(function (el) {
            observer.observe(el);
        });
    }

    // S8 – Why QalbIT (Differentiators + Testimonials)
    function initMvpWhySection(ctx) {
        var section = document.querySelector('[data-mvp-section="s8"]');
        if (!section) return;

        var hasGsap = ctx.hasGsap;
        var gsap = ctx.gsap;
        var ScrollTrigger = ctx.ScrollTrigger;
        var hasScrollTrigger = ctx.hasScrollTrigger;
        var prefersReducedMotion = ctx.prefersReducedMotion;

        var headerEls = section.querySelectorAll("header h2, header p");
        var reasons = section.querySelectorAll("[data-mvp-why-card]");
        var testimonials = section.querySelectorAll("figure");

        if (!headerEls.length && !reasons.length && !testimonials.length)
            return;

        if (prefersReducedMotion) {
            headerEls.forEach(function (el) {
                el.style.opacity = "";
                el.style.transform = "";
            });
            reasons.forEach(function (card) {
                card.style.opacity = "";
                card.style.transform = "";
            });
            testimonials.forEach(function (card) {
                card.style.opacity = "";
                card.style.transform = "";
            });
            return;
        }

        if (hasGsap && gsap && hasScrollTrigger && ScrollTrigger) {
            if (headerEls.length) {
                gsap.set(headerEls, {
                    autoAlpha: 0,
                    y: 18,
                });

                gsap.to(headerEls, {
                    autoAlpha: 1,
                    y: 0,
                    duration: 0.5,
                    ease: "power2.out",
                    stagger: 0.06,
                    scrollTrigger: {
                        trigger: section,
                        start: "top 80%",
                        toggleActions: "play none none reverse",
                    },
                });
            }

            if (reasons.length) {
                gsap.set(reasons, {
                    autoAlpha: 0,
                    y: 26,
                });

                gsap.to(reasons, {
                    autoAlpha: 1,
                    y: 0,
                    duration: 0.5,
                    ease: "power2.out",
                    stagger: 0.06,
                    scrollTrigger: {
                        trigger: section,
                        start: "top 75%",
                        toggleActions: "play none none reverse",
                    },
                });
            }

            if (testimonials.length) {
                gsap.set(testimonials, {
                    autoAlpha: 0,
                    y: 22,
                });

                gsap.to(testimonials, {
                    autoAlpha: 1,
                    y: 0,
                    duration: 0.5,
                    ease: "power2.out",
                    stagger: 0.06,
                    scrollTrigger: {
                        trigger: section,
                        start: "top 78%",
                        toggleActions: "play none none reverse",
                    },
                });
            }

            return;
        }

        // Fallback: IntersectionObserver
        var revealTargets = []
            .concat(Array.prototype.slice.call(headerEls))
            .concat(Array.prototype.slice.call(reasons))
            .concat(Array.prototype.slice.call(testimonials));

        revealTargets.forEach(function (el) {
            el.style.opacity = "0";
            el.style.transform = "translateY(18px)";
            el.style.transition =
                "opacity 360ms ease-out, transform 360ms ease-out";
        });

        var observer = createIntersectionObserver();
        if (!observer) {
            revealTargets.forEach(function (el) {
                el.style.opacity = "";
                el.style.transform = "";
            });
            return;
        }

        revealTargets.forEach(function (el) {
            observer.observe(el);
        });
    }

    // S9 – MVP FAQ (accordion + reveal)
    function initMvpFaqSection(ctx) {
        var section = document.querySelector('[data-mvp-section="s9"]');
        if (!section) return;

        var hasGsap = ctx.hasGsap;
        var gsap = ctx.gsap;
        var ScrollTrigger = ctx.ScrollTrigger;
        var hasScrollTrigger = ctx.hasScrollTrigger;
        var prefersReducedMotion = ctx.prefersReducedMotion;

        var headerEls = section.querySelectorAll("header h2, header p");
        var items = section.querySelectorAll("[data-mvp-faq-item]");

        // Reveal animations
        if (!prefersReducedMotion) {
            if (hasGsap && gsap && hasScrollTrigger && ScrollTrigger) {
                if (headerEls.length) {
                    gsap.set(headerEls, {
                        autoAlpha: 0,
                        y: 16,
                    });

                    gsap.to(headerEls, {
                        autoAlpha: 1,
                        y: 0,
                        duration: 0.5,
                        ease: "power2.out",
                        stagger: 0.05,
                        scrollTrigger: {
                            trigger: section,
                            start: "top 80%",
                            toggleActions: "play none none reverse",
                        },
                    });
                }

                if (items.length) {
                    gsap.set(items, {
                        autoAlpha: 0,
                        y: 18,
                    });

                    gsap.to(items, {
                        autoAlpha: 1,
                        y: 0,
                        duration: 0.45,
                        ease: "power2.out",
                        stagger: 0.05,
                        scrollTrigger: {
                            trigger: section,
                            start: "top 78%",
                            toggleActions: "play none none reverse",
                        },
                    });
                }
            } else {
                var revealTargets = []
                    .concat(Array.prototype.slice.call(headerEls))
                    .concat(Array.prototype.slice.call(items));

                revealTargets.forEach(function (el) {
                    el.style.opacity = "0";
                    el.style.transform = "translateY(16px)";
                    el.style.transition =
                        "opacity 320ms ease-out, transform 320ms ease-out";
                });

                var observer = createIntersectionObserver();
                if (!observer) {
                    revealTargets.forEach(function (el) {
                        el.style.opacity = "";
                        el.style.transform = "";
                    });
                } else {
                    revealTargets.forEach(function (el) {
                        observer.observe(el);
                    });
                }
            }
        } else {
            headerEls.forEach(function (el) {
                el.style.opacity = "";
                el.style.transform = "";
            });
            items.forEach(function (el) {
                el.style.opacity = "";
                el.style.transform = "";
            });
        }

        // Accordion behaviour
        if (!items.length) return;

        items.forEach(function (item) {
            var trigger =
                item.querySelector("[data-mvp-faq-trigger]") ||
                item.querySelector("button[aria-expanded]") ||
                item.querySelector("button");

            var panel =
                item.querySelector("[data-mvp-faq-panel]") ||
                item.querySelector("[data-faq-panel]") ||
                item.querySelector('[role="region"]');

            if (!trigger || !panel) return;

            // Ensure closed by default if not marked open
            if (trigger.getAttribute("aria-expanded") !== "true") {
                panel.style.maxHeight = "0px";
                panel.style.overflow = "hidden";
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            }

            trigger.addEventListener("click", function () {
                var isOpen = trigger.getAttribute("aria-expanded") === "true";

                // Allow multiple open; do not close others by default
                trigger.setAttribute(
                    "aria-expanded",
                    isOpen ? "false" : "true"
                );

                if (!isOpen) {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                } else {
                    panel.style.maxHeight = "0px";
                }
            });
        });
    }

    // S10 – Final CTA band
    function initMvpFinalCtaSection(ctx) {
        var section = document.querySelector('[data-mvp-section="s10"]');
        if (!section) return;

        var hasGsap = ctx.hasGsap;
        var gsap = ctx.gsap;
        var ScrollTrigger = ctx.ScrollTrigger;
        var hasScrollTrigger = ctx.hasScrollTrigger;
        var prefersReducedMotion = ctx.prefersReducedMotion;

        var card = section.querySelector(".rounded-3xl");
        if (!card) return;

        if (prefersReducedMotion) {
            card.style.opacity = "";
            card.style.transform = "";
            return;
        }

        if (hasGsap && gsap && hasScrollTrigger && ScrollTrigger) {
            gsap.set(card, {
                autoAlpha: 0,
                y: 28,
                scale: 0.97,
            });

            gsap.to(card, {
                autoAlpha: 1,
                y: 0,
                scale: 1,
                duration: 0.6,
                ease: "power2.out",
                scrollTrigger: {
                    trigger: section,
                    start: "top 80%",
                    toggleActions: "play none none reverse",
                },
            });

            return;
        }

        // Fallback: IntersectionObserver
        card.style.opacity = "0";
        card.style.transform = "translateY(20px) scale(0.98)";
        card.style.transition =
            "opacity 380ms ease-out, transform 380ms ease-out";

        var observer = createIntersectionObserver();
        if (!observer) {
            card.style.opacity = "";
            card.style.transform = "";
            return;
        }

        observer.observe(card);
    }
})();
