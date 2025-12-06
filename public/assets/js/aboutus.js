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
        if (!body || !body.classList.contains("page-aboutus")) {
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

        // A1–A14
        initAboutHeroSection(ctx); // A1
        initAboutSnapshotSection(ctx); // A2 – Who we are
        initAboutWhatWeDoSection(ctx); // A3 – What we do
        initAboutImpactSection(ctx); // A4 – Impact in numbers
        initAboutClientsSection(ctx); // A5 – Global clients & industries
        initAboutLeadershipSection(ctx); // A6 – Founder
        initAboutCultureSection(ctx); // A7 – Culture & values
        initAboutProcessSection(ctx); // A8 – How we work with you
        initAboutCaseStudiesSection(ctx); // A9 – Selected case studies
        initAboutTechStackSection(ctx); // A10 – Tech & engineering practices
        initAboutTrustSection(ctx); // A11 – Certifications, reviews, partnerships
        initAboutCareersSection(ctx); // A12 – Careers
    });

    // --------------------------------------------------------
    // A1) Hero – headline + content + snapshot card
    // --------------------------------------------------------
    function initAboutHeroSection(ctx) {
        const { gsap, hasGsap, prefersReducedMotion } = ctx;

        // Match your actual section markup
        const section = document.querySelector("[data-about-hero]");
        if (!section) return;

        // LEFT column (headline, text, bullets, CTAs)
        const leftColumn = section.querySelector(".space-y-6");
        const leftItems = leftColumn ? Array.from(leftColumn.children) : [];

        // RIGHT column snapshot card
        const rightCard = section.querySelector("[data-about-hero-card]");

        // All elements we want to animate
        const heroEls = [
            ...leftItems, // label, h1, paragraph, list, CTAs
            rightCard || null, // snapshot card
        ].filter(Boolean);

        if (!heroEls.length) return;

        // Respect reduced motion
        if (!hasGsap || prefersReducedMotion) {
            return;
        }

        let hasAnimated = false;

        function animateIn() {
            if (hasAnimated) return;
            hasAnimated = true;

            const tl = gsap.timeline();

            // Animate left stack
            if (leftItems.length) {
                tl.from(leftItems, {
                    y: 28,
                    autoAlpha: 0,
                    duration: 0.75,
                    ease: "power3.out",
                    stagger: 0.1,
                });
            }

            // Animate snapshot card slightly offset
            if (rightCard) {
                tl.from(
                    rightCard,
                    {
                        y: 24,
                        x: 16,
                        autoAlpha: 0,
                        scale: 0.98,
                        duration: 0.7,
                        ease: "power3.out",
                    },
                    leftItems.length ? "-=0.25" : 0 // overlap with left
                );
            }
        }

        // Trigger once when hero enters viewport
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
    // A2) Who we are / snapshot section
    // --------------------------------------------------------
    function initAboutSnapshotSection(ctx) {
        const { gsap, hasGsap, prefersReducedMotion } = ctx;

        const section = document.querySelector('[data-about-section="a2"]');
        if (!section) return;

        const header = section.querySelector("header");
        const headerEls = header ? Array.from(header.children) : [];

        const cards = Array.from(section.querySelectorAll("[data-about-card]"));

        const snapshotDl = section.querySelector("dl");
        const snapshotItems = snapshotDl
            ? Array.from(snapshotDl.querySelectorAll("div"))
            : [];

        const hasAnything =
            headerEls.length || cards.length || snapshotItems.length;
        if (!hasAnything) return;

        if (!hasGsap || prefersReducedMotion) {
            return;
        }

        let hasAnimated = false;

        function animateIn() {
            if (hasAnimated) return;
            hasAnimated = true;

            const tl = gsap.timeline();

            // 1) Header: label + h2 + paragraph
            if (headerEls.length) {
                tl.from(headerEls, {
                    y: 24,
                    autoAlpha: 0,
                    duration: 0.6,
                    ease: "power2.out",
                    stagger: 0.08,
                });
            }

            // 2) Identity cards – slight lift + fade
            if (cards.length) {
                tl.from(
                    cards,
                    {
                        y: 26,
                        autoAlpha: 0,
                        duration: 0.6,
                        ease: "power3.out",
                        stagger: 0.08,
                    },
                    headerEls.length ? "-=0.2" : 0
                );
            }

            // 3) Snapshot row – subtle fade-in afterwards
            if (snapshotItems.length) {
                tl.from(
                    snapshotItems,
                    {
                        y: 18,
                        autoAlpha: 0,
                        duration: 0.5,
                        ease: "power2.out",
                        stagger: 0.06,
                    },
                    headerEls.length || cards.length ? "-=0.15" : 0
                );
            }
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
    // A3) What we do – capability grid
    // --------------------------------------------------------
    function initAboutWhatWeDoSection(ctx) {
        const { gsap, hasGsap, prefersReducedMotion } = ctx;

        const section = document.querySelector('[data-about-section="a3"]');
        if (!section) return;

        const header = section.querySelector("header");
        const headerEls = header ? Array.from(header.children) : [];

        const cards = Array.from(section.querySelectorAll("[data-capability]"));
        if (!headerEls.length && !cards.length) return;

        // Respect reduced-motion and GSAP availability
        if (!hasGsap || prefersReducedMotion) {
            return;
        }

        let hasAnimated = false;

        function animateIn() {
            if (hasAnimated) return;
            hasAnimated = true;

            const tl = gsap.timeline();

            // 1) Heading block – label + title + paragraph
            if (headerEls.length) {
                tl.from(headerEls, {
                    y: 24,
                    autoAlpha: 0,
                    duration: 0.6,
                    ease: "power2.out",
                    stagger: 0.08,
                });
            }

            // 2) Capability cards – subtle lift + scale
            if (cards.length) {
                tl.from(
                    cards,
                    {
                        y: 30,
                        autoAlpha: 0,
                        scale: 0.97,
                        duration: 0.65,
                        ease: "power3.out",
                        stagger: 0.08,
                    },
                    headerEls.length ? "-=0.2" : 0
                );
            }
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
            // Fallback if IO is not supported
            animateIn();
        }
    }

    // --------------------------------------------------------
    // A4) Impact in numbers – metrics with count-up
    // --------------------------------------------------------
    function initAboutImpactSection(ctx) {
        const { gsap, hasGsap, prefersReducedMotion } = ctx;

        const section = document.querySelector('[data-about-section="a4"]');
        if (!section) return;

        const header = section.querySelector("header");
        const headerEls = header ? Array.from(header.children) : [];

        const metricsGrid = section.querySelector("[data-metrics-grid]");
        const metricCards = metricsGrid
            ? Array.from(metricsGrid.querySelectorAll("[data-metric]"))
            : [];
        const metricValues = metricsGrid
            ? Array.from(metricsGrid.querySelectorAll("[data-metric-value]"))
            : [];

        if (!headerEls.length && !metricCards.length) return;

        // If GSAP is not available or user prefers reduced motion,
        // keep everything static but sync numbers to their targets.
        if (!hasGsap || prefersReducedMotion) {
            metricValues.forEach((el) => {
                const targetAttr = el.getAttribute("data-metric-target");
                if (!targetAttr) return;

                const target = parseFloat(targetAttr);
                if (isNaN(target)) return;

                const initialText = el.textContent.trim();
                const suffix = initialText.replace(String(target), "") || "";
                el.textContent = String(target) + suffix;
            });
            return;
        }

        let hasAnimated = false;

        function startMetricCounters() {
            metricValues.forEach((el) => {
                const targetAttr = el.getAttribute("data-metric-target");
                if (!targetAttr) return;

                const target = parseFloat(targetAttr);
                if (isNaN(target)) return;

                const initialText = el.textContent.trim();
                const suffix = initialText.replace(String(target), "") || "";
                const counter = { value: 0 };

                gsap.fromTo(
                    counter,
                    { value: 0 },
                    {
                        value: target,
                        duration: 1.4,
                        ease: "power2.out",
                        onUpdate: () => {
                            const current = Math.round(counter.value);
                            el.textContent = current + suffix;
                        },
                    }
                );
            });
        }

        function animateIn() {
            if (hasAnimated) return;
            hasAnimated = true;

            const tl = gsap.timeline({ defaults: { ease: "power2.out" } });

            // 1) Heading block
            if (headerEls.length) {
                tl.from(headerEls, {
                    y: 24,
                    autoAlpha: 0,
                    duration: 0.6,
                    stagger: 0.08,
                });
            }

            // 2) Metric cards – lift + fade
            if (metricCards.length) {
                tl.from(
                    metricCards,
                    {
                        y: 26,
                        autoAlpha: 0,
                        scale: 0.97,
                        duration: 0.7,
                        ease: "power3.out",
                        stagger: 0.08,
                    },
                    headerEls.length ? "-=0.2" : 0
                );
            }

            // 3) Number counters – start while cards are animating in
            if (metricValues.length) {
                tl.add(startMetricCounters, headerEls.length ? "-=0.35" : 0);
            }
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
                { threshold: 0.3 }
            );

            io.observe(section);
        } else {
            // Fallback if IntersectionObserver is not supported
            animateIn();
        }
    }

    // --------------------------------------------------------
    // A5) Clients & industries – logos + industry chips
    // --------------------------------------------------------
    function initAboutClientsSection(ctx) {
        const { gsap, hasGsap, prefersReducedMotion } = ctx;

        const section = document.querySelector('[data-about-section="a5"]');
        if (!section) return;

        const header = section.querySelector("header");
        const headerEls = header ? Array.from(header.children) : [];

        const logoGrid = section.querySelector("[data-logo-grid]");
        const logos = logoGrid
            ? Array.from(logoGrid.querySelectorAll("[data-logo]"))
            : [];

        const industriesList = section.querySelector("[data-industries-list]");
        const industries = industriesList
            ? Array.from(industriesList.querySelectorAll("span"))
            : [];

        // If nothing to animate, bail out
        if (!headerEls.length && !logos.length && !industries.length) return;

        // If GSAP is not available or user prefers reduced motion → keep static
        if (!hasGsap || prefersReducedMotion) {
            return;
        }

        let hasAnimated = false;

        function animateIn() {
            if (hasAnimated) return;
            hasAnimated = true;

            const tl = gsap.timeline({ defaults: { ease: "power2.out" } });

            // 1) Heading block
            if (headerEls.length) {
                tl.from(headerEls, {
                    y: 22,
                    autoAlpha: 0,
                    duration: 0.6,
                    stagger: 0.08,
                });
            }

            // 2) Logo cards – lift, fade, slight scale
            if (logos.length) {
                tl.from(
                    logos,
                    {
                        y: 24,
                        autoAlpha: 0,
                        scale: 0.97,
                        duration: 0.7,
                        ease: "power3.out",
                        stagger: 0.07,
                    },
                    headerEls.length ? "-=0.2" : 0
                );
            }

            // 3) Industry chips – softer stagger
            if (industries.length) {
                tl.from(
                    industries,
                    {
                        y: 16,
                        autoAlpha: 0,
                        duration: 0.5,
                        ease: "power2.out",
                        stagger: 0.05,
                    },
                    logos.length ? "-=0.25" : headerEls.length ? "-=0.1" : 0
                );
            }
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
                { threshold: 0.3 }
            );

            io.observe(section);
        } else {
            // Fallback if IntersectionObserver is not supported
            animateIn();
        }
    }

    // --------------------------------------------------------
    // A6) Leadership – founder highlight + how we lead
    // --------------------------------------------------------
    function initAboutLeadershipSection(ctx) {
        const { gsap, hasGsap, prefersReducedMotion } = ctx;

        const section = document.querySelector('[data-about-section="a6"]');
        if (!section) return;

        const header = section.querySelector("header");
        const headerEls = header ? Array.from(header.children) : [];

        const founderCard = section.querySelector('[data-leader="founder"]');

        const aside = section.querySelector("aside");
        const asideItems = aside
            ? Array.from(aside.querySelectorAll("li"))
            : [];

        // Nothing to animate → bail out
        if (!headerEls.length && !founderCard && !asideItems.length) return;

        // Respect reduced motion & missing GSAP
        if (!hasGsap || prefersReducedMotion) {
            return;
        }

        let hasAnimated = false;

        function animateIn() {
            if (hasAnimated) return;
            hasAnimated = true;

            const tl = gsap.timeline({ defaults: { ease: "power2.out" } });

            // 1) Heading block
            if (headerEls.length) {
                tl.from(headerEls, {
                    y: 22,
                    autoAlpha: 0,
                    duration: 0.6,
                    stagger: 0.08,
                });
            }

            // 2) Founder card – lift, fade, slight scale
            if (founderCard) {
                tl.from(
                    founderCard,
                    {
                        y: 26,
                        autoAlpha: 0,
                        scale: 0.98,
                        duration: 0.7,
                        ease: "power3.out",
                    },
                    headerEls.length ? "-=0.2" : 0
                );
            }

            // 3) Aside list – stagger in bullets
            if (asideItems.length) {
                tl.from(
                    asideItems,
                    {
                        y: 14,
                        autoAlpha: 0,
                        duration: 0.5,
                        stagger: 0.06,
                    },
                    founderCard ? "-=0.25" : headerEls.length ? "-=0.1" : 0
                );
            }
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
                { threshold: 0.3 }
            );

            io.observe(section);
        } else {
            // Fallback for older browsers
            animateIn();
        }
    }

    // --------------------------------------------------------
    // A7) Culture & values – how we work + value cards
    // --------------------------------------------------------
    function initAboutCultureSection(ctx) {
        const { gsap, hasGsap, prefersReducedMotion } = ctx;

        const section = document.querySelector('[data-about-section="a7"]');
        if (!section) return;

        const header = section.querySelector("header");
        const headerEls = header ? Array.from(header.children) : [];

        // "How we work day-to-day" list items
        const workList = section.querySelector(
            "div.space-y-4:first-of-type ul"
        );
        const workItems = workList
            ? Array.from(workList.querySelectorAll("li"))
            : [];

        // Core values cards
        const valuesGrid = section.querySelector("[data-values-grid]");
        const valueCards = valuesGrid
            ? Array.from(valuesGrid.querySelectorAll("[data-value-card]"))
            : [];

        // Nothing to animate → bail
        if (!headerEls.length && !workItems.length && !valueCards.length)
            return;

        // Respect reduced motion / missing GSAP
        if (!hasGsap || prefersReducedMotion) {
            return;
        }

        let hasAnimated = false;

        function animateIn() {
            if (hasAnimated) return;
            hasAnimated = true;

            const tl = gsap.timeline({ defaults: { ease: "power2.out" } });

            // 1) Heading block
            if (headerEls.length) {
                tl.from(headerEls, {
                    y: 22,
                    autoAlpha: 0,
                    duration: 0.6,
                    stagger: 0.08,
                });
            }

            // 2) "How we work" list
            if (workItems.length) {
                tl.from(
                    workItems,
                    {
                        y: 14,
                        autoAlpha: 0,
                        duration: 0.5,
                        stagger: 0.06,
                    },
                    headerEls.length ? "-=0.2" : 0
                );
            }

            // 3) Value cards
            if (valueCards.length) {
                tl.from(
                    valueCards,
                    {
                        y: 20,
                        autoAlpha: 0,
                        scale: 0.98,
                        duration: 0.6,
                        ease: "power3.out",
                        stagger: 0.08,
                    },
                    headerEls.length || workItems.length ? "-=0.25" : 0
                );
            }
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
                { threshold: 0.35 }
            );

            io.observe(section);
        } else {
            // Fallback for older browsers
            animateIn();
        }
    }

    // --------------------------------------------------------
    // A8) Process – steps grid & reassurance strip
    // --------------------------------------------------------
    function initAboutProcessSection(ctx) {
        const { gsap, hasGsap, prefersReducedMotion } = ctx;

        const section = document.querySelector('[data-about-section="a8"]');
        if (!section) return;

        const header = section.querySelector("header");
        const headerEls = header ? Array.from(header.children) : [];

        const processGrid = section.querySelector("[data-process-grid]");
        const steps = processGrid
            ? Array.from(processGrid.querySelectorAll("[data-process-step]"))
            : [];

        // Small reassurance strip at the bottom (text + CTA)
        const reassurance = section.querySelector("[data-process-cta]");
        
        // Nothing to animate → bail
        if (!headerEls.length && !steps.length && !reassurance.length)
            return;

        // Respect reduced motion / missing GSAP
        if (!hasGsap || prefersReducedMotion) {
            return;
        }

        let hasAnimated = false;

        function animateIn() {
            if (hasAnimated) return;
            hasAnimated = true;

            const tl = gsap.timeline({ defaults: { ease: "power2.out" } });

            // 1) Heading block
            if (headerEls.length) {
                tl.from(headerEls, {
                    y: 24,
                    autoAlpha: 0,
                    duration: 0.6,
                    stagger: 0.08,
                });
            }

            // 2) Process steps
            if (steps.length) {
                tl.from(
                    steps,
                    {
                        y: 26,
                        autoAlpha: 0,
                        duration: 0.7,
                        ease: "power3.out",
                        stagger: 0.09,
                    },
                    headerEls.length ? "-=0.2" : 0
                );
            }

            // 3) Reassurance strip (text + CTA button)
            if (reassurance.length) {
                tl.from(
                    reassurance,
                    {
                        y: 14,
                        autoAlpha: 0,
                        duration: 0.5,
                        stagger: 0.08,
                    },
                    headerEls.length || steps.length ? "-=0.25" : 0
                );
            }
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
                { threshold: 0.35 }
            );

            io.observe(section);
        } else {
            // Fallback for older browsers
            animateIn();
        }
    }

    // --------------------------------------------------------
    // A9) Case studies – cards grid
    // --------------------------------------------------------
    function initAboutCaseStudiesSection(ctx) {
        const { gsap, hasGsap, prefersReducedMotion } = ctx;

        const section = document.querySelector('[data-about-section="a9"]');
        if (!section) return;

        const header = section.querySelector("header");
        const headerEls = header ? Array.from(header.children) : [];

        const caseGrid = section.querySelector("[data-case-grid-about]");
        const caseCards = caseGrid
            ? Array.from(caseGrid.querySelectorAll("[data-case-card-about]"))
            : [];

        const note = section.querySelector("div.mt-6");

        if (!headerEls.length && !caseCards.length && !note) return;

        if (!hasGsap || prefersReducedMotion) {
            return;
        }

        let hasAnimated = false;

        function animateIn() {
            if (hasAnimated) return;
            hasAnimated = true;

            const tl = gsap.timeline({ defaults: { ease: "power2.out" } });

            // 1) Heading
            if (headerEls.length) {
                tl.from(headerEls, {
                    y: 24,
                    autoAlpha: 0,
                    duration: 0.6,
                    stagger: 0.08,
                });
            }

            // 2) Case cards grid
            if (caseCards.length) {
                tl.from(
                    caseCards,
                    {
                        y: 26,
                        autoAlpha: 0,
                        duration: 0.7,
                        ease: "power3.out",
                        stagger: 0.09,
                    },
                    headerEls.length ? "-=0.25" : 0
                );
            }

            // 3) Supporting note
            if (note) {
                tl.from(
                    note,
                    {
                        y: 14,
                        autoAlpha: 0,
                        duration: 0.5,
                    },
                    headerEls.length || caseCards.length ? "-=0.25" : 0
                );
            }
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
                { threshold: 0.35 }
            );

            io.observe(section);
        } else {
            animateIn();
        }
    }

    // --------------------------------------------------------
    // A10) Tech stack & practices
    // --------------------------------------------------------
    function initAboutTechStackSection(ctx) {
        const { gsap, hasGsap, prefersReducedMotion } = ctx;

        const section = document.querySelector('[data-about-section="a10"]');
        if (!section) return;

        const header = section.querySelector("header");
        const headerEls = header ? Array.from(header.children) : [];

        const tagsContainer = section.querySelector("[data-tech-tags]");
        const techTags = tagsContainer
            ? Array.from(tagsContainer.children)
            : [];

        const practicesList = section.querySelector(
            "[data-engineering-practices]"
        );
        const practiceItems = practicesList
            ? Array.from(practicesList.querySelectorAll("li"))
            : [];

        if (!headerEls.length && !techTags.length && !practiceItems.length)
            return;

        if (!hasGsap || prefersReducedMotion) {
            return;
        }

        let hasAnimated = false;

        function animateIn() {
            if (hasAnimated) return;
            hasAnimated = true;

            const tl = gsap.timeline({ defaults: { ease: "power2.out" } });

            // 1) Heading
            if (headerEls.length) {
                tl.from(headerEls, {
                    y: 28,
                    autoAlpha: 0,
                    duration: 0.6,
                    stagger: 0.08,
                });
            }

            // 2) Tech tags – pill stagger with slight depth
            if (techTags.length) {
                tl.from(
                    techTags,
                    {
                        y: 18,
                        autoAlpha: 0,
                        duration: 0.65,
                        ease: "power3.out",
                        stagger: 0.05,
                        rotateX: 8,
                        transformOrigin: "center bottom",
                    },
                    headerEls.length ? "-=0.25" : 0
                );
            }

            // 3) Engineering practices list
            if (practiceItems.length) {
                tl.from(
                    practiceItems,
                    {
                        x: 18,
                        autoAlpha: 0,
                        duration: 0.55,
                        ease: "power2.out",
                        stagger: 0.07,
                    },
                    headerEls.length || techTags.length ? "-=0.2" : 0
                );
            }
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
                { threshold: 0.35 }
            );

            io.observe(section);
        } else {
            animateIn();
        }
    }

    // --------------------------------------------------------
    // A11) Quality, security & trust
    // --------------------------------------------------------
    function initAboutTrustSection(ctx) {
        const { gsap, hasGsap, prefersReducedMotion } = ctx;

        const section = document.querySelector('[data-about-section="a11"]');
        if (!section) return;

        const header = section.querySelector("header");
        const headerEls = header ? Array.from(header.children) : [];

        const trustGrid = section.querySelector("[data-trust-grid]");
        const trustCards = trustGrid
            ? Array.from(trustGrid.querySelectorAll("[data-trust-card]"))
            : [];

        if (!headerEls.length && !trustCards.length) return;

        if (!hasGsap || prefersReducedMotion) {
            return;
        }

        let hasAnimated = false;

        function animateIn() {
            if (hasAnimated) return;
            hasAnimated = true;

            const tl = gsap.timeline({ defaults: { ease: "power2.out" } });

            // 1) Heading
            if (headerEls.length) {
                tl.from(headerEls, {
                    y: 24,
                    autoAlpha: 0,
                    duration: 0.6,
                    stagger: 0.08,
                });
            }

            // 2) Trust cards
            if (trustCards.length) {
                tl.from(
                    trustCards,
                    {
                        y: 26,
                        autoAlpha: 0,
                        duration: 0.7,
                        ease: "power3.out",
                        stagger: 0.09,
                    },
                    headerEls.length ? "-=0.25" : 0
                );
            }
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
                { threshold: 0.3 }
            );

            io.observe(section);
        } else {
            animateIn();
        }
    }

    // --------------------------------------------------------
    // A12) Careers
    // --------------------------------------------------------
    function initAboutCareersSection(ctx) {
        const { gsap, hasGsap, prefersReducedMotion } = ctx;

        const section = document.querySelector('[data-about-section="a12"]');
        if (!section) return;

        const header = section.querySelector("header");
        const headerEls = header ? Array.from(header.children) : [];

        // Left column: team / how we think about our team
        const teamBlock = section.querySelector(".mt-8 .space-y-3");
        const teamList = teamBlock ? teamBlock.querySelector("ul") : null;
        const teamItems = teamList
            ? Array.from(teamList.querySelectorAll("li"))
            : [];

        // Right column: careers card
        const careersCard = section.querySelector("[data-careers-card]");

        if (!headerEls.length && !teamItems.length && !careersCard) return;

        if (!hasGsap || prefersReducedMotion) {
            return;
        }

        let hasAnimated = false;

        function animateIn() {
            if (hasAnimated) return;
            hasAnimated = true;

            const tl = gsap.timeline({ defaults: { ease: "power2.out" } });

            // 1) Heading
            if (headerEls.length) {
                tl.from(headerEls, {
                    y: 26,
                    autoAlpha: 0,
                    duration: 0.6,
                    stagger: 0.08,
                });
            }

            // 2) Team bullets (left)
            if (teamItems.length) {
                tl.from(
                    teamItems,
                    {
                        x: 18,
                        autoAlpha: 0,
                        duration: 0.55,
                        ease: "power2.out",
                        stagger: 0.07,
                    },
                    headerEls.length ? "-=0.2" : 0
                );
            }

            // 3) Careers card (right)
            if (careersCard) {
                tl.from(
                    careersCard,
                    {
                        y: 24,
                        autoAlpha: 0,
                        duration: 0.6,
                        ease: "power3.out",
                    },
                    headerEls.length || teamItems.length ? "-=0.25" : 0
                );
            }
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
                { threshold: 0.35 }
            );

            io.observe(section);
        } else {
            animateIn();
        }
    }
})();
