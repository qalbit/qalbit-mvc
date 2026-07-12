// QalbIT: Home page interactions (services, industries, process, case studies)

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

        initServicesSection({ gsap, hasGsap, prefersReducedMotion });
        initIndustriesReveal({ gsap, hasGsap, prefersReducedMotion });
        initIndustriesMarquee({ gsap, hasGsap, prefersReducedMotion });
        initProcessSection({
            gsap,
            hasGsap,
            prefersReducedMotion,
            mqDesktop,
        });
        initCaseStudiesSection({ gsap, hasGsap, hasScrollTrigger });
        initReviewsSection({
            gsap,
            hasGsap,
            prefersReducedMotion,
            mqDesktop,
        });
        initTechnologiesSection({ gsap, hasGsap, prefersReducedMotion });
        initClientsSection({ gsap, hasGsap, prefersReducedMotion });
    });

    // --------------------------------------------------------
    // 1) Services – scroll reveal + 3D hover interactions
    // --------------------------------------------------------
    function initServicesSection(ctx) {
        const { gsap, hasGsap, prefersReducedMotion } = ctx;
        const section = document.querySelector("[data-services-section]");
        if (!section) return;

        const cards = Array.from(section.querySelectorAll("[data-service-card]"));
        if (!cards.length) return;

        const headerEls = section.querySelectorAll(
            "header span, header h2, header p"
        );

        // -----------------------------------------
        // A) Entrance animation (scroll into view)
        // -----------------------------------------
        if (hasGsap && !prefersReducedMotion) {
            let hasAnimated = false;

            function animateIn() {
                if (hasAnimated) return;
                hasAnimated = true;

                const icons = cards
                    .map((card) => card.querySelector("[data-service-icon]"))
                    .filter(Boolean);

                const tl = gsap.timeline({
                    defaults: { ease: "power3.out" },
                });

                if (headerEls.length) {
                    tl.from(headerEls, {
                        y: 24,
                        autoAlpha: 0,
                        duration: 0.6,
                        stagger: 0.1,
                    });
                }

                // Cards cascade in with a soft blur + rise for a premium,
                // restrained "enterprise" reveal (reading order, not center-out).
                tl.from(
                    cards,
                    {
                        y: 40,
                        autoAlpha: 0,
                        scale: 0.985,
                        filter: "blur(10px)",
                        duration: 0.8,
                        ease: "power3.out",
                        stagger: { each: 0.06, from: "start", grid: "auto" },
                        clearProps: "filter,transform,opacity",
                    },
                    headerEls.length ? "-=0.3" : 0
                );

                // Icons settle in just behind their cards with a subtle pop.
                if (icons.length) {
                    tl.from(
                        icons,
                        {
                            scale: 0.5,
                            autoAlpha: 0,
                            duration: 0.5,
                            ease: "back.out(1.7)",
                            stagger: { each: 0.06, from: "start" },
                            clearProps: "transform,opacity",
                        },
                        "<0.15"
                    );
                }
            }

            if ("IntersectionObserver" in window) {
                const observer = new IntersectionObserver(
                    (entries, obs) => {
                        entries.forEach((entry) => {
                            if (!entry.isIntersecting) return;
                            animateIn();
                            obs.unobserve(entry.target);
                        });
                    },
                    { threshold: 0.25 }
                );

                observer.observe(section);
            } else {
                // Fallback: animate immediately
                animateIn();
            }
        } else {
            // Reduced motion / no GSAP – make sure everything is visible
            cards.forEach((card) => {
                card.style.opacity = "";
                card.style.transform = "none";
            });
        }

        // -----------------------------------------
        // B) Clean, enterprise-level hover
        //    Smooth lift + icon highlight, no 3D tilt. Keyboard-accessible.
        // -----------------------------------------
        const REST_SHADOW = "0 4px 14px rgba(15,23,42,0.06)";
        const HOVER_SHADOW = "0 22px 45px -14px rgba(15,23,42,0.22)";

        cards.forEach((card) => {
            if (!hasGsap) return;

            const icon = card.querySelector("[data-service-icon]");

            const enter = () => {
                gsap.to(card, {
                    y: prefersReducedMotion ? 0 : -8,
                    boxShadow: HOVER_SHADOW,
                    duration: 0.35,
                    ease: "power3.out",
                });
                if (icon && !prefersReducedMotion) {
                    gsap.to(icon, {
                        scale: 1.08,
                        y: -2,
                        duration: 0.35,
                        ease: "power3.out",
                    });
                }
            };

            const leave = () => {
                gsap.to(card, {
                    y: 0,
                    boxShadow: REST_SHADOW,
                    duration: 0.45,
                    ease: "power3.out",
                });
                if (icon) {
                    gsap.to(icon, {
                        scale: 1,
                        y: 0,
                        duration: 0.45,
                        ease: "power3.out",
                    });
                }
            };

            card.addEventListener("mouseenter", enter);
            card.addEventListener("mouseleave", leave);
            // Mirror the hover on keyboard focus for accessibility.
            card.addEventListener("focusin", enter);
            card.addEventListener("focusout", leave);
        });
    }


    // --------------------------------------------------------
    // 2) Industries – self-running marquee (never hijacks page scroll)
    // --------------------------------------------------------
    function initIndustriesMarquee(ctx) {
        const { gsap, hasGsap, prefersReducedMotion } = ctx;
        const section = document.querySelector("[data-horizontal-industries]");
        if (!section || !hasGsap || prefersReducedMotion) return;

        const wrapper = section.querySelector("[data-horizontal-wrapper]");
        const track = section.querySelector("[data-horizontal-track]");
        if (!wrapper || !track) return;

        const mqDesktop = window.matchMedia
            ? window.matchMedia("(min-width: 1024px)")
            : null;
        const isDesktop = () =>
            mqDesktop ? mqDesktop.matches : window.innerWidth >= 1024;

        let tween = null;
        let clones = [];
        let inViewport = true;

        function build() {
            // Only on desktop (below lg the cards are a normal, wrapping grid).
            if (tween || !isDesktop()) return;

            const items = Array.from(track.children);
            if (!items.length) return;

            // Clone the set once so the loop is seamless.
            items.forEach((item) => {
                const clone = item.cloneNode(true);
                clone.setAttribute("aria-hidden", "true");
                clone.setAttribute("inert", ""); // clones must not be focusable
                clone.dataset.industryClone = "true";
                clone
                    .querySelectorAll("a")
                    .forEach((a) => a.setAttribute("tabindex", "-1"));
                track.appendChild(clone);
                clones.push(clone);
            });

            // Exact distance from track start to the first clone = one full set
            // plus its trailing gap → a jump-free repeat.
            const loopDistance = clones.length
                ? clones[0].offsetLeft
                : track.scrollWidth / 2;

            const duration = Math.max(24, loopDistance / 50); // ~50px/sec, calm

            tween = gsap.fromTo(
                track,
                { x: 0 },
                {
                    x: -loopDistance,
                    ease: "none",
                    duration,
                    repeat: -1,
                    onRepeat: () => gsap.set(track, { x: 0 }),
                }
            );

            if (!inViewport) tween.pause();
        }

        function teardown() {
            if (tween) {
                tween.kill();
                tween = null;
            }
            clones.forEach((clone) => clone.remove());
            clones = [];
            gsap.set(track, { x: 0 });
        }

        build();

        // Pause on hover / keyboard focus so cards stay readable and clickable.
        wrapper.addEventListener("mouseenter", () => tween && tween.pause());
        wrapper.addEventListener("mouseleave", () => {
            if (tween && inViewport) tween.resume();
        });
        wrapper.addEventListener("focusin", () => tween && tween.pause());
        wrapper.addEventListener("focusout", () => {
            if (tween && inViewport) tween.resume();
        });

        // Pause while the section is off-screen (perf + battery).
        if ("IntersectionObserver" in window) {
            const io = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (entry.target !== section) return;
                        inViewport = entry.isIntersecting;
                        if (tween) {
                            if (inViewport) tween.resume();
                            else tween.pause();
                        }
                    });
                },
                { threshold: 0.1 }
            );
            io.observe(section);
        }

        // Build / tear down cleanly across the desktop breakpoint.
        function handleBreakpoint() {
            if (isDesktop()) build();
            else teardown();
        }
        if (mqDesktop) {
            if (mqDesktop.addEventListener) {
                mqDesktop.addEventListener("change", handleBreakpoint);
            } else if (mqDesktop.addListener) {
                mqDesktop.addListener(handleBreakpoint);
            }
        }
        window.addEventListener("resize", () => {
            if (!isDesktop()) teardown();
        });
    }

    // --------------------------------------------------------
    // 2b) Industries – header entrance reveal
    //     (Cards animate via the marquee; the CSS border/ring handles hover,
    //      so per-card JS transforms are intentionally avoided here.)
    // --------------------------------------------------------
    function initIndustriesReveal(ctx) {
        const { gsap, hasGsap, prefersReducedMotion } = ctx;
        if (!hasGsap || prefersReducedMotion) return;

        const section = document.querySelector("[data-horizontal-industries]");
        if (!section) return;

        const headerEls = section.querySelectorAll(
            "header span, header h2, header p, header a"
        );
        if (!headerEls.length) return;

        function animateIn() {
            gsap.from(headerEls, {
                y: 24,
                autoAlpha: 0,
                duration: 0.6,
                ease: "power3.out",
                stagger: 0.08,
                clearProps: "transform,opacity",
            });
        }

        if ("IntersectionObserver" in window) {
            const observer = new IntersectionObserver(
                (entries, obs) => {
                    entries.forEach((entry) => {
                        if (!entry.isIntersecting) return;
                        animateIn();
                        obs.unobserve(entry.target);
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
    // 3) Process – stepper with GSAP bullets + autoplay on desktop
    // --------------------------------------------------------
    function initProcessSection(ctx) {
        const { gsap, hasGsap, prefersReducedMotion, mqDesktop } = ctx;

        const section = document.querySelector("[data-process-section]");
        if (!section) return;

        const tabs = Array.from(section.querySelectorAll("[data-process-tab]"));
        const panels = Array.from(
            section.querySelectorAll("[data-process-panel]")
        );
        const progressBars = Array.from(
            section.querySelectorAll("[data-process-progress]")
        );

        if (!tabs.length || !panels.length) return;

        const hasGsapAnim = hasGsap && !prefersReducedMotion;

        const STEP_DURATION = 7; // seconds
        let activeIndex = 0;
        let progressTween = null;
        let autoPlayEnabled = mqDesktop
            ? mqDesktop.matches
            : window.innerWidth >= 1024;

        function setActive(index, opts) {
            const options = Object.assign({ fromAuto: false }, opts || {});
            activeIndex = index;

            // Tabs state
            tabs.forEach((tab, i) => {
                const isActive = i === index;

                tab.classList.toggle("bg-slate-900/70", isActive);
                tab.classList.toggle("border-primary-400", isActive);
                tab.classList.toggle("shadow-soft", isActive);

                tab.setAttribute("aria-selected", isActive ? "true" : "false");
                tab.setAttribute("tabindex", isActive ? "0" : "-1");
            });

            // Panels
            panels.forEach((panel, i) => {
                const isActive = i === index;
                panel.classList.toggle("hidden", !isActive);
                panel.setAttribute("aria-hidden", isActive ? "false" : "true");

                if (isActive && hasGsapAnim) {
                    const bullets = panel.querySelectorAll(
                        "[data-process-bullet]"
                    );

                    gsap.fromTo(
                        panel,
                        { autoAlpha: 0, y: 16 },
                        {
                            autoAlpha: 1,
                            y: 0,
                            duration: 0.45,
                            ease: "power2.out",
                            overwrite: true,
                        }
                    );

                    if (bullets.length) {
                        gsap.fromTo(
                            bullets,
                            { autoAlpha: 0, x: -16 },
                            {
                                autoAlpha: 1,
                                x: 0,
                                duration: 0.45,
                                ease: "power2.out",
                                stagger: 0.06,
                                delay: 0.05,
                                overwrite: true,
                            }
                        );
                    }
                }
            });

            // Progress bars
            if (hasGsapAnim && progressBars.length === tabs.length) {
                if (progressTween) progressTween.kill();

                progressBars.forEach((bar) => {
                    gsap.set(bar, {
                        scaleX: 0,
                        transformOrigin: "left",
                    });
                });

                const bar = progressBars[index];
                if (bar && autoPlayEnabled) {
                    progressTween = gsap.fromTo(
                        bar,
                        { scaleX: 0 },
                        {
                            scaleX: 1,
                            duration: STEP_DURATION,
                            ease: "none",
                            onComplete: () => {
                                if (options.fromAuto && autoPlayEnabled) {
                                    goToNext(true);
                                }
                            },
                        }
                    );
                }
            }
        }

        function goToNext(fromAuto) {
            const nextIndex = (activeIndex + 1) % tabs.length;
            setActive(nextIndex, { fromAuto });
        }

        // Initial
        setActive(0, { fromAuto: true });

        // Tab events
        tabs.forEach((tab, index) => {
            tab.addEventListener("click", () => {
                setActive(index, { fromAuto: true });
            });

            tab.addEventListener("keydown", (evt) => {
                if (evt.key === "Enter" || evt.key === " ") {
                    evt.preventDefault();
                    tab.click();
                }
                if (evt.key === "ArrowRight") {
                    evt.preventDefault();
                    goToNext(false);
                }
                if (evt.key === "ArrowLeft") {
                    evt.preventDefault();
                    const prevIndex =
                        (activeIndex - 1 + tabs.length) % tabs.length;
                    setActive(prevIndex, { fromAuto: false });
                }
            });
        });

        // Pause/resume autoplay on hover
        if (hasGsapAnim) {
            section.addEventListener("mouseenter", () => {
                if (progressTween) progressTween.pause();
            });

            section.addEventListener("mouseleave", () => {
                if (progressTween && autoPlayEnabled) progressTween.resume();
            });
        }

        // Re-evaluate autoplay on resize
        window.addEventListener("resize", () => {
            const wasEnabled = autoPlayEnabled;
            autoPlayEnabled = mqDesktop
                ? mqDesktop.matches
                : window.innerWidth >= 1024;

            if (!autoPlayEnabled && progressTween) {
                progressTween.pause();
            } else if (autoPlayEnabled && !wasEnabled && progressTween) {
                progressTween.resume();
            }
        });
    }

    // --------------------------------------------------------
    // 4) Case Studies – one card at a time + swipe + autoplay
    // --------------------------------------------------------
    function initCaseStudiesSection(ctx) {
        const { gsap, hasGsap } = ctx;

        const section = document.querySelector("[data-case-studies]");
        if (!section) return;

        const listEl = section.querySelector("[data-case-list]");
        const cards = Array.from(section.querySelectorAll("[data-case-card]"));
        const progressBars = Array.from(
            section.querySelectorAll("[data-case-progress]")
        );
        const visual = section.querySelector("[data-case-visual]");
        const images = visual
            ? Array.from(visual.querySelectorAll("[data-case-image]"))
            : [];

        if (!cards.length) return;

        // Map images by data-case-index so we work even if some case studies
        // have no banner screenshot.
        const imageByIndex = {};
        images.forEach((img) => {
            const raw = img.getAttribute("data-case-index");
            const idx = raw != null ? parseInt(raw, 10) : NaN;
            if (!Number.isNaN(idx)) {
                imageByIndex[idx] = img;
            }
        });
        const hasImages = Object.keys(imageByIndex).length > 0;

        // ----- No GSAP: click to switch, keep images in sync -----
        if (!hasGsap) {
            let activeIndex = 0;

            function setActiveBasic(index) {
                const prevIndex = activeIndex;
                activeIndex = index;

                cards.forEach((card, i) =>
                    card.classList.toggle("is-active", i === index)
                );

                if (!hasImages) return;

                const prevImg = imageByIndex[prevIndex];
                const nextImg = imageByIndex[index];

                if (prevImg && prevImg !== nextImg) {
                    prevImg.classList.remove("is-active");
                }
                if (nextImg) {
                    nextImg.classList.add("is-active");
                }
            }

            setActiveBasic(0);
            cards.forEach((card, i) => {
                card.addEventListener("click", (event) => {
                    // Let clicks on the CTA link navigate normally
                    if (event.target.closest("[data-case-link]")) {
                        return;
                    }
                    setActiveBasic(i);
                });
            });
            return;
        }

        // ----- GSAP version -----
        let activeIndex = 0;
        let progressTween = null;
        let inViewport = false;
        let isInteracting = false;

        const STEP_DURATION = 6; // seconds per slide

        function updateListHeight(instant) {
            if (!listEl) return;
            const activeCard = cards[activeIndex];
            if (!activeCard) return;

            const h = activeCard.offsetHeight;
            if (!h) return;

            if (instant) {
                listEl.style.height = h + "px";
            } else {
                gsap.to(listEl, {
                    height: h,
                    duration: 0.35,
                    ease: "power2.out",
                });
            }
        }

        function setActive(index, opts) {
            const options = Object.assign(
                { animate: true, direction: null, force: false },
                opts || {}
            );
            const previousIndex = activeIndex;

            if (index === previousIndex && !options.force) return;

            activeIndex = index;

            // Toggle card visibility (only one .is-active at a time)
            cards.forEach((card, i) =>
                card.classList.toggle("is-active", i === index)
            );

            updateListHeight(!options.animate);

            const prevImg = imageByIndex[previousIndex];
            const nextImg = imageByIndex[index];

            // If we have no images at all, we are done.
            if (!hasImages) {
                if (!options.animate) return;

                // Still animate the card itself
                const card = cards[index];
                const offset = 40;
                gsap.fromTo(
                    card,
                    { x: offset, autoAlpha: 0 },
                    { x: 0, autoAlpha: 1, duration: 0.45, ease: "power3.out" }
                );
                return;
            }

            // Non-animated initial set (first render)
            if (!options.animate) {
                if (prevImg && prevImg !== nextImg) {
                    prevImg.classList.remove("is-active");
                }
                if (nextImg) {
                    nextImg.classList.add("is-active");
                }
                return;
            }

            // Decide direction for swipe animation
            let direction = options.direction;
            if (direction === null) {
                const total = cards.length;
                const forward =
                    (previousIndex === total - 1 && index === 0) ||
                    index > previousIndex;
                direction = forward ? 1 : -1;
            }
            const offset = 40 * direction;

            const card = cards[index];
            gsap.fromTo(
                card,
                { x: offset, autoAlpha: 0 },
                { x: 0, autoAlpha: 1, duration: 0.45, ease: "power3.out" }
            );

            // If there is no screenshot for this case, keep previous image visible.
            if (!nextImg) return;

            // Cross-fade / slide images
            if (prevImg && prevImg !== nextImg) {
                prevImg.classList.remove("is-active");
                gsap.to(prevImg, {
                    x: -offset * 0.4,
                    autoAlpha: 0,
                    scale: 0.97,
                    duration: 0.45,
                    ease: "power2.out",
                });
            }

            nextImg.classList.add("is-active");
            gsap.fromTo(
                nextImg,
                { x: offset, autoAlpha: 0, scale: 0.98 },
                {
                    x: 0,
                    autoAlpha: 1,
                    scale: 1,
                    duration: 0.6,
                    ease: "power3.out",
                }
            );
        }

        function startProgressFor(index) {
            if (!progressBars.length) return;

            if (progressTween) {
                progressTween.kill();
                progressTween = null;
            }

            progressBars.forEach((bar) =>
                gsap.set(bar, { scaleX: 0, transformOrigin: "left center" })
            );

            const bar = progressBars[index];
            if (!bar) return;

            progressTween = gsap.to(bar, {
                scaleX: 1,
                duration: STEP_DURATION,
                ease: "none",
                onComplete: () => {
                    progressTween = null;
                    if (inViewport && !isInteracting) {
                        goToNext(true);
                    }
                },
            });
        }

        function goToIndex(index, opts) {
            setActive(index, opts);
            if (inViewport && !isInteracting) {
                startProgressFor(index);
            } else if (progressTween) {
                progressTween.pause();
            }
        }

        function goToNext(fromAuto) {
            const nextIndex = (activeIndex + 1) % cards.length;
            goToIndex(nextIndex, { animate: true, direction: 1, fromAuto });
        }

        function goToPrev(fromAuto) {
            const prevIndex = (activeIndex - 1 + cards.length) % cards.length;
            goToIndex(prevIndex, { animate: true, direction: -1, fromAuto });
        }

        // Initial state
        setActive(0, { animate: false, force: true });
        updateListHeight(true);

        // ----- Autoplay only while section is visible -----
        if ("IntersectionObserver" in window) {
            const io = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (entry.target !== section) return;

                        if (entry.isIntersecting) {
                            inViewport = true;
                            if (isInteracting) return;

                            if (progressTween) {
                                progressTween.resume();
                            } else {
                                startProgressFor(activeIndex);
                            }
                        } else {
                            inViewport = false;
                            if (progressTween) progressTween.pause();
                        }
                    });
                },
                { threshold: 0.25 }
            );

            io.observe(section);
        } else {
            inViewport = true;
            startProgressFor(activeIndex);
        }

        // ----- Pause autoplay on hover over card or visual -----
        function attachHoverPause(el) {
            if (!el) return;

            el.addEventListener("mouseenter", () => {
                isInteracting = true;
                if (progressTween) progressTween.pause();
            });

            el.addEventListener("mouseleave", () => {
                isInteracting = false;
                if (!inViewport) return;

                if (progressTween) {
                    progressTween.resume();
                } else {
                    startProgressFor(activeIndex);
                }
            });
        }

        cards.forEach((card) => attachHoverPause(card));
        attachHoverPause(visual);

        // Click on card → focus that case and stop autoplay until mouse leaves
        cards.forEach((card, index) => {
            card.addEventListener("click", (event) => {
                // If click is on the CTA link, let the browser follow the href
                if (event.target.closest("[data-case-link]")) {
                    return;
                }

                isInteracting = true;
                goToIndex(index, { animate: true });
            });
        });

        // ----- Pointer swipe (mouse drag + touch) anywhere in the section -----
        let swipeStartX = null;

        function beginSwipe(event) {
            // Ignore swipes that start on the CTA link
            if (event.target && event.target.closest("[data-case-link]")) {
                return;
            }

            if (event.pointerType === "mouse" && event.button !== 0) return;

            swipeStartX = event.clientX;
            isInteracting = true;
            if (progressTween) progressTween.pause();

            if (section.setPointerCapture && event.pointerId != null) {
                section.setPointerCapture(event.pointerId);
            }
        }

        function endSwipe(event) {
            if (swipeStartX == null) return;

            const deltaX = event.clientX - swipeStartX;
            const threshold = 30;

            if (Math.abs(deltaX) > threshold) {
                if (deltaX < 0) {
                    goToNext(false);
                } else {
                    goToPrev(false);
                }
            }

            swipeStartX = null;
            isInteracting = false;

            if (!inViewport) return;

            if (progressTween) {
                progressTween.resume();
            } else {
                startProgressFor(activeIndex);
            }
        }

        function cancelSwipe() {
            swipeStartX = null;
            isInteracting = false;
        }

        if (window.PointerEvent) {
            section.addEventListener("pointerdown", beginSwipe);
            section.addEventListener("pointerup", endSwipe);
            section.addEventListener("pointercancel", cancelSwipe);
            section.addEventListener("pointerleave", cancelSwipe);
        } else {
            // Old touch fallback
            section.addEventListener(
                "touchstart",
                (event) => {
                    // Ignore touches that start on the CTA link
                    if (event.target && event.target.closest("[data-case-link]")) {
                        return;
                    }

                    if (!event.touches || event.touches.length !== 1) return;
                    swipeStartX = event.touches[0].clientX;
                    isInteracting = true;
                    if (progressTween) progressTween.pause();
                },
                { passive: true }
            );

            section.addEventListener(
                "touchend",
                (event) => {
                    if (swipeStartX == null) return;
                    const deltaX =
                        event.changedTouches[0].clientX - swipeStartX;
                    const threshold = 30;

                    if (Math.abs(deltaX) > threshold) {
                        if (deltaX < 0) {
                            goToNext(false);
                        } else {
                            goToPrev(false);
                        }
                    }

                    swipeStartX = null;
                    isInteracting = false;

                    if (!inViewport) return;

                    if (progressTween) {
                        progressTween.resume();
                    } else {
                        startProgressFor(activeIndex);
                    }
                },
                { passive: true }
            );
        }
    }


    // --------------------------------------------------------
    // 5) Reviews – 3-column vertical marquee (desktop) + video modal
    // --------------------------------------------------------
    function initReviewsSection(ctx) {
        const { gsap, hasGsap, prefersReducedMotion, mqDesktop } = ctx;

        const section = document.querySelector("[data-reviews-section]");
        if (!section) return;

        const tracks = Array.from(
            section.querySelectorAll("[data-reviews-track]")
        );

        // Helper: desktop vs mobile
        const isDesktop = () =>
            mqDesktop ? mqDesktop.matches : window.innerWidth >= 1024;

        const loops = [];
        let inViewport = true;
        let isModalOpen = false;

        // -----------------------------
        // A) Marquee animation (desktop)
        // -----------------------------
        const enableMarquee =
            hasGsap &&
            !prefersReducedMotion &&
            isDesktop() &&
            tracks.length > 0;

        if (enableMarquee) {
            tracks.forEach((track, index) => {
                const cards = Array.from(
                    track.querySelectorAll("[data-review-card]")
                );
                if (!cards.length) return;

                // Clone each card once for infinite loop
                cards.forEach((card) => {
                    const clone = card.cloneNode(true);
                    clone.setAttribute("aria-hidden", "true");
                    clone.setAttribute("inert", ""); // clones must not be focusable
                    clone.dataset.reviewClone = "true";
                    track.appendChild(clone);
                });

                const singleSetHeight = track.scrollHeight / 2;

                // Alternate directions: col 0 up, col 1 down, col 2 up, ...
                const direction = index % 2 === 0 ? 1 : -1;
                const fromY = direction === 1 ? 0 : -singleSetHeight;
                const toY = direction === 1 ? -singleSetHeight : 0;

                const baseDuration = 32; // seconds per loop
                const duration = baseDuration + index * 4; // subtle variation

                const tween = gsap.fromTo(
                    track,
                    { y: fromY },
                    {
                        y: toY,
                        ease: "none",
                        duration,
                        repeat: -1,
                        onRepeat: () => {
                            gsap.set(track, { y: fromY });
                        },
                    }
                );

                loops.push(tween);
            });

            // Pause/resume when section leaves/enters viewport
            if ("IntersectionObserver" in window && loops.length) {
                const io = new IntersectionObserver(
                    (entries) => {
                        entries.forEach((entry) => {
                            if (entry.target !== section) return;

                            if (entry.isIntersecting) {
                                inViewport = true;
                                if (!isModalOpen) {
                                    loops.forEach((tl) => tl.resume());
                                }
                            } else {
                                inViewport = false;
                                loops.forEach((tl) => tl.pause());
                            }
                        });
                    },
                    { threshold: 0.2 }
                );

                io.observe(section);
            }

            // Hover over columns → pause; leave → resume (if visible and no modal)
            const columnsArea = section.querySelector("[data-reviews-columns]");
            if (columnsArea && loops.length) {
                columnsArea.addEventListener("mouseenter", () => {
                    if (isModalOpen) return;
                    loops.forEach((tl) => tl.pause());
                });

                columnsArea.addEventListener("mouseleave", () => {
                    if (!inViewport || isModalOpen) return;
                    loops.forEach((tl) => tl.resume());
                });
            }

            // If viewport is resized from desktop → mobile, kill loops
            window.addEventListener("resize", () => {
                if (!isDesktop() && loops.length) {
                    loops.forEach((tl) => tl.kill());
                    loops.length = 0;
                }
            });
        }

        // -----------------------------
        // B) Video modal behaviour
        // -----------------------------
        const modal = section.querySelector("[data-review-modal]");
        const modalBody = modal
            ? modal.querySelector("[data-review-modal-body]")
            : null;
        const modalClose = modal
            ? modal.querySelector("[data-review-modal-close]")
            : null;

        const triggers = Array.from(
            section.querySelectorAll("[data-review-video-trigger]")
        );

        function pauseLoops() {
            if (!loops.length) return;
            loops.forEach((tl) => tl.pause());
        }

        function resumeLoops() {
            if (!loops.length || !inViewport) return;
            loops.forEach((tl) => tl.resume());
        }

        function openModal(videoSrc) {
            if (!modal || !modalBody || !videoSrc) return;

            isModalOpen = true;
            pauseLoops();

            modal.classList.remove("hidden");
            modal.classList.add("flex");
            modal.setAttribute("aria-hidden", "false");

            // Clear any previous iframe
            modalBody.innerHTML = "";

            // Autoplay param
            let src = videoSrc;
            if (src.indexOf("?") === -1) {
                src += "?autoplay=1";
            } else if (!/[\?&]autoplay=1/.test(src)) {
                src += "&autoplay=1";
            }

            const iframe = document.createElement("iframe");
            iframe.src = src;
            iframe.title = "Client testimonial video";
            iframe.className = "h-full w-full";
            iframe.frameBorder = "0";
            iframe.loading = "lazy";
            iframe.allow =
                "accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share";
            iframe.allowFullscreen = true;

            modalBody.appendChild(iframe);

            // Lock page scroll while modal open
            document.documentElement.classList.add("overflow-hidden");
        }

        function closeModal() {
            if (!modal || !modalBody) return;

            isModalOpen = false;

            modal.classList.add("hidden");
            modal.classList.remove("flex");
            modal.setAttribute("aria-hidden", "true");

            modalBody.innerHTML = "";

            document.documentElement.classList.remove("overflow-hidden");

            // Resume marquee if it exists and section is visible
            resumeLoops();
        }

        // Attach click handlers to video triggers
        if (triggers.length && modal && modalBody) {
            triggers.forEach((trigger) => {
                trigger.addEventListener("click", (event) => {
                    event.preventDefault();
                    const src = trigger.getAttribute("data-video-src");
                    openModal(src);
                });
            });
        }

        // Close button
        if (modal && modalClose) {
            modalClose.addEventListener("click", (event) => {
                event.preventDefault();
                closeModal();
            });

            // Click on backdrop closes modal
            modal.addEventListener("click", (event) => {
                if (event.target === modal) {
                    closeModal();
                }
            });
        }

        // ESC key closes modal
        document.addEventListener("keydown", (event) => {
            if (
                event.key === "Escape" &&
                modal &&
                !modal.classList.contains("hidden")
            ) {
                closeModal();
            }
        });
    }

    // --------------------------------------------------------
    // 6) Technologies – scroll reveal for stack cards
    // --------------------------------------------------------
    function initTechnologiesSection(ctx) {
        const { gsap, hasGsap, prefersReducedMotion } = ctx;

        const section = document.querySelector("[data-technologies-section]");
        if (!section) return;

        const cards = Array.from(section.querySelectorAll("[data-tech-card]"));
        if (!cards.length) return;

        // If GSAP is not present or user prefers reduced motion, keep static
        if (!hasGsap || prefersReducedMotion) {
            return;
        }

        const header = section.querySelector("[data-tech-header]");
        const headerEls = header
            ? header.querySelectorAll("span, h2, p, ul li")
            : null;

        function runAnimation() {
            const tl = gsap.timeline({
                defaults: { ease: "power3.out" },
            });

            if (headerEls && headerEls.length) {
                tl.from(headerEls, {
                    y: 24,
                    autoAlpha: 0,
                    duration: 0.6,
                    stagger: 0.06,
                });
            }

            tl.from(
                cards,
                {
                    y: 32,
                    autoAlpha: 0,
                    duration: 0.6,
                    stagger: 0.08,
                    clearProps: "transform,opacity",
                },
                headerEls && headerEls.length ? "-=0.25" : 0
            );
        }

        if ("IntersectionObserver" in window) {
            const observer = new IntersectionObserver(
                (entries, obs) => {
                    entries.forEach((entry) => {
                        if (!entry.isIntersecting) return;
                        runAnimation();
                        obs.unobserve(entry.target);
                    });
                },
                { threshold: 0.25 }
            );

            observer.observe(section);
        } else {
            runAnimation();
        }
    }

    // --------------------------------------------------------
    // 7) Clients – 2-row horizontal marquee of logos
    // --------------------------------------------------------
    function initClientsSection(ctx) {
        const { gsap, hasGsap, prefersReducedMotion } = ctx;

        const section = document.querySelector("[data-clients-section]");
        if (!section) return;

        const rows = Array.from(section.querySelectorAll("[data-clients-row]"));
        if (!rows.length) return;

        // Only animate when:
        // - GSAP exists
        // - Motion is allowed
        // - Desktop / tablet (mobile already shows static grid)
        const mqTablet = window.matchMedia
            ? window.matchMedia("(min-width: 640px)")
            : null;
        const isDesktopLike = () =>
            mqTablet ? mqTablet.matches : window.innerWidth >= 640;

        if (!hasGsap || prefersReducedMotion || !isDesktopLike()) {
            return;
        }

        const loops = [];

        rows.forEach((row, index) => {
            const track = row.querySelector("[data-clients-track]");
            if (!track) return;

            const items = Array.from(track.children);
            if (!items.length) return;

            // Duplicate each logo once for seamless looping
            items.forEach((item) => {
                const clone = item.cloneNode(true);
                clone.setAttribute("aria-hidden", "true");
                track.appendChild(clone);
            });

            // Total width of original set
            const singleSetWidth = track.scrollWidth / 2;

            // Alternate directions per row:
            // row 0 → left, row 1 → right, etc.
            const direction = index % 2 === 0 ? -1 : 1;
            const fromX = direction === -1 ? 0 : -singleSetWidth;
            const toX = direction === -1 ? -singleSetWidth : 0;

            const baseDuration = 38; // seconds
            const duration = baseDuration + index * 6; // slight variation

            const tween = gsap.fromTo(
                track,
                { x: fromX },
                {
                    x: toX,
                    ease: "none",
                    duration,
                    repeat: -1,
                    onRepeat: () => {
                        // Hard reset to keep the loop seamless
                        gsap.set(track, { x: fromX });
                    },
                }
            );

            loops.push(tween);
        });

        if (!loops.length) return;

        let inViewport = true;

        // Pause / resume when section leaves / enters viewport
        if ("IntersectionObserver" in window) {
            const io = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (entry.target !== section) return;

                        if (entry.isIntersecting) {
                            inViewport = true;
                            loops.forEach((tl) => tl.resume());
                        } else {
                            inViewport = false;
                            loops.forEach((tl) => tl.pause());
                        }
                    });
                },
                { threshold: 0.25 }
            );

            io.observe(section);
        }

        // Hover over marquee area → pause; leave → resume
        const marqueeArea = section.querySelector("[data-clients-marquee]");
        if (marqueeArea) {
            marqueeArea.addEventListener("mouseenter", () => {
                loops.forEach((tl) => tl.pause());
            });

            marqueeArea.addEventListener("mouseleave", () => {
                if (!inViewport) return;
                loops.forEach((tl) => tl.resume());
            });
        }

        // If viewport shrinks below tablet, kill animations and reset positions
        window.addEventListener("resize", () => {
            if (!isDesktopLike()) {
                loops.forEach((tl) => tl.kill());
                rows.forEach((row) => {
                    const track = row.querySelector("[data-clients-track]");
                    if (track) {
                        gsap.set(track, { x: 0 });
                    }
                });
            }
        });
    }
})();
