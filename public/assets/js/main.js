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

        initCtaSection({ gsap, hasGsap, prefersReducedMotion });
        initFaqSection({ gsap, hasGsap, prefersReducedMotion });
        initBlogTeaserSection({ gsap, hasGsap, prefersReducedMotion });
        initContactCtaSection({ gsap, hasGsap, prefersReducedMotion });
        initExitIntentPopup({ isDesktop });
        initContactForms();
        initCookieBanner();
    });

    // --------------------------------------------------------
    // 1) CTA – 3-step process animation
    // --------------------------------------------------------
    function initCtaSection(ctx) {
        const { gsap, hasGsap, prefersReducedMotion } = ctx;
        const section = document.querySelector("[data-cta-section]");
        if (!section) return;

        // If GSAP missing or user prefers reduced motion, keep static.
        if (!hasGsap || prefersReducedMotion) {
            const cards = section.querySelectorAll("[data-cta-step]");
            cards.forEach((card) => {
                card.style.opacity = "1";
                card.style.transform = "none";
            });
            const connector = section.querySelector("[data-cta-connector]");
            if (connector) {
                connector.style.transform = "scaleX(1)";
            }
            return;
        }

        const cards = Array.from(section.querySelectorAll("[data-cta-step]"));
        if (!cards.length) return;

        const connector = section.querySelector("[data-cta-connector]");
        let hasPlayed = false;

        function playAnimation() {
            if (hasPlayed) return;
            hasPlayed = true;

            const tl = gsap.timeline();

            if (connector) {
                tl.fromTo(
                    connector,
                    { scaleX: 0, autoAlpha: 0 },
                    {
                        scaleX: 1,
                        autoAlpha: 1,
                        duration: 0.6,
                        ease: "power2.out",
                    }
                );
            }

            tl.fromTo(
                cards,
                { y: 32, autoAlpha: 0 },
                {
                    y: 0,
                    autoAlpha: 1,
                    duration: 0.6,
                    ease: "power3.out",
                    stagger: 0.18,
                },
                connector ? "-=0.25" : 0
            );
        }

        if ("IntersectionObserver" in window) {
            const io = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (entry.target !== section) return;
                        if (entry.isIntersecting) {
                            playAnimation();
                        }
                    });
                },
                { threshold: 0.35 }
            );

            io.observe(section);
        } else {
            // Fallback: play immediately
            playAnimation();
        }
    }

    // --------------------------------------------------------
    // 2) FAQ – entrance reveal + smooth accordion
    // --------------------------------------------------------
    function initFaqSection(ctx) {
        const { gsap, hasGsap, prefersReducedMotion } = ctx;

        const section = document.querySelector("[data-faq-section]");
        if (!section) return;

        const items = Array.from(section.querySelectorAll("[data-faq-item]"));
        const triggers = Array.from(
            section.querySelectorAll("[data-faq-trigger]")
        );

        if (!items.length || !triggers.length) return;

        // -----------------------------
        // A) Entrance reveal (once)
        // -----------------------------
        if (hasGsap && !prefersReducedMotion) {
            const header = section.querySelector("[data-faq-header]");
            const tl = gsap.timeline({ paused: true });

            if (header) {
                tl.from(header, {
                    y: 24,
                    autoAlpha: 0,
                    duration: 0.35,
                    ease: "power2.out",
                });
            }

            tl.from(
                items,
                {
                    y: 24,
                    autoAlpha: 0,
                    duration: 0.35,
                    ease: "power2.out",
                    stagger: 0.05,
                },
                header ? "-=0.1" : 0
            );

            if ("IntersectionObserver" in window) {
                const io = new IntersectionObserver(
                    (entries) => {
                        entries.forEach((entry) => {
                            if (entry.target !== section) return;
                            if (entry.isIntersecting) {
                                tl.play();
                                io.disconnect(); // play only once
                            }
                        });
                    },
                    { threshold: 0.2 }
                );
                io.observe(section);
            } else {
                tl.play();
            }
        }

        // -----------------------------
        // B) Accordion behaviour
        // -----------------------------
        const panelTweens = new WeakMap();

        function setItemOpen(item, shouldOpen) {
            const panel = item.querySelector("[data-faq-panel]");
            const trigger = item.querySelector("[data-faq-trigger]");
            if (!panel || !trigger) return;

            // Kill any running tween on this panel
            const existingTween = panelTweens.get(panel);
            if (existingTween) existingTween.kill();

            item.classList.toggle("is-open", shouldOpen);
            trigger.setAttribute(
                "aria-expanded",
                shouldOpen ? "true" : "false"
            );
            panel.hidden = false; // needed to measure

            // No GSAP or reduced-motion → simple fallback (no jerk)
            if (!hasGsap || prefersReducedMotion) {
                const targetMax = shouldOpen
                    ? panel.scrollHeight + "px"
                    : "0px";
                panel.style.maxHeight = targetMax;

                if (!shouldOpen) {
                    // hide after CSS transition
                    setTimeout(() => {
                        panel.hidden = true;
                    }, 260);
                }
                return;
            }

            const startH = panel.offsetHeight;
            const targetH = shouldOpen ? panel.scrollHeight : 0;

            const tween = gsap.fromTo(
                panel,
                { height: startH },
                {
                    height: targetH,
                    duration: 0.28,
                    ease: "power2.out",
                    onComplete: () => {
                        panel.style.height = "";
                        if (!shouldOpen) {
                            panel.hidden = true;
                        }
                    },
                }
            );

            panelTweens.set(panel, tween);
        }

        function toggleItem(clickedItem) {
            const isOpen = clickedItem.classList.contains("is-open");

            // Close all others to keep things tidy
            items.forEach((item) => {
                if (
                    item !== clickedItem &&
                    item.classList.contains("is-open")
                ) {
                    setItemOpen(item, false);
                }
            });

            setItemOpen(clickedItem, !isOpen);
        }

        // Initial state: first FAQ open, rest closed
        items.forEach((item, index) => {
            const panel = item.querySelector("[data-faq-panel]");
            const trigger = item.querySelector("[data-faq-trigger]");
            if (!panel || !trigger) return;

            // Make sure we never fight with CSS transitions on height
            panel.style.overflow = "hidden";
            panel.style.maxHeight = "none"; // we control via JS

            const isFirst = index === 0;
            item.classList.toggle("is-open", isFirst);
            trigger.setAttribute("aria-expanded", isFirst ? "true" : "false");

            if (isFirst) {
                panel.hidden = false;
                panel.style.height = "auto";
            } else {
                panel.hidden = true;
                panel.style.height = "0";
            }

            trigger.addEventListener("click", () => toggleItem(item));
        });
    }

    // --------------------------------------------------------
    // 3) Blog – teaser cards (fade + stagger on scroll)
    // --------------------------------------------------------
    function initBlogTeaserSection(ctx) {
        const { gsap, hasGsap, prefersReducedMotion } = ctx;

        const section = document.querySelector("[data-blog-teaser]");
        if (!section) return;

        const header = section.querySelector("[data-blog-header]");
        const cta = section.querySelector("[data-blog-cta]");
        const cards = Array.from(section.querySelectorAll("[data-blog-card]"));

        // If no GSAP or user prefers reduced motion → keep static
        if (!hasGsap || prefersReducedMotion || !cards.length) {
            return;
        }

        // Initial state
        if (header) {
            gsap.set(header, { y: 18, autoAlpha: 0 });
        }
        if (cta) {
            gsap.set(cta, { y: 18, autoAlpha: 0 });
        }
        gsap.set(cards, { y: 26, autoAlpha: 0 });

        let hasAnimated = false;

        function animateIn() {
            if (hasAnimated) return;
            hasAnimated = true;

            const tl = gsap.timeline({
                defaults: { duration: 0.6, ease: "power3.out" },
            });

            if (header) {
                tl.to(header, { y: 0, autoAlpha: 1 }, 0);
            }

            if (cta) {
                tl.to(cta, { y: 0, autoAlpha: 1 }, 0.05);
            }

            tl.to(
                cards,
                {
                    y: 0,
                    autoAlpha: 1,
                    stagger: 0.12,
                },
                0.1
            );
        }

        // Trigger when section enters viewport
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
            // Fallback – animate immediately
            animateIn();
        }
    }

    // --------------------------------------------------------
    // 4) Contact CTA – stats + form entrance animation
    // --------------------------------------------------------
    function initContactCtaSection(ctx) {
        const { gsap, hasGsap, prefersReducedMotion } = ctx;
        const section = document.querySelector("[data-contact-cta-section]");
        if (!section) return;

        const left = section.querySelector("[data-contact-cta-left]");
        const stats = Array.from(
            section.querySelectorAll("[data-contact-stat]")
        );
        const form = section.querySelector("[data-contact-cta-form]");

        // If no GSAP or user prefers reduced motion → keep static
        if (!hasGsap || prefersReducedMotion) {
            return;
        }

        // Initial states
        if (left) gsap.set(left, { autoAlpha: 0, y: 26 });
        if (form) gsap.set(form, { autoAlpha: 0, y: 26 });
        if (stats.length) gsap.set(stats, { autoAlpha: 0, y: 26 });

        let hasAnimated = false;

        function animateIn() {
            if (hasAnimated) return;
            hasAnimated = true;

            const tl = gsap.timeline({
                defaults: { duration: 0.65, ease: "power3.out" },
            });

            if (left) {
                tl.to(left, { autoAlpha: 1, y: 0 }, 0);
            }

            if (form) {
                tl.to(form, { autoAlpha: 1, y: 0 }, 0.08);
            }

            if (stats.length) {
                tl.to(
                    stats,
                    {
                        autoAlpha: 1,
                        y: 0,
                        stagger: 0.1,
                    },
                    0.12
                );
            }
        }

        // Trigger on scroll into view
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
            // Fallback
            animateIn();
        }
    }

    // --------------------------------------------------------
    // 5) Exit-intent popup (session-based)
    //     Triggers:
    //       - Desktop exit intent (mouse leaves top of viewport)
    //       - OR after N seconds on page
    //       - OR after 50% scroll
    // --------------------------------------------------------
    function initExitIntentPopup(ctx) {
        const { isDesktop } = ctx;
        const popup = document.querySelector("[data-exit-popup]");
        if (!popup) return;

        const storageKey = "qalbit_exit_popup_dismissed";

        const supportsSessionStorage = (function () {
            try {
                const testKey = "__exit_test";
                window.sessionStorage.setItem(testKey, "1");
                window.sessionStorage.removeItem(testKey);
                return true;
            } catch (e) {
                return false;
            }
        })();

        // If already dismissed in this session, do nothing
        if (
            supportsSessionStorage &&
            sessionStorage.getItem(storageKey) === "1"
        ) {
            return;
        }

        const closeButtons = popup.querySelectorAll("[data-exit-close]");
        const form = popup.querySelector("form");

        // Configurable triggers
        const timeTriggerMs = 20000; // N seconds → 20s; adjust as needed
        const scrollTriggerRatio = 0.5; // 50% of page height

        let hasShown = false;

        function markDismissed() {
            if (supportsSessionStorage) {
                sessionStorage.setItem(storageKey, "1");
            }
        }

        function openPopup() {
            popup.classList.remove("hidden");
            popup.setAttribute("aria-hidden", "false");

            // Lock background scroll
            document.documentElement.classList.add("overflow-hidden");
            document.body.classList.add("overflow-hidden");
        }

        function closePopup() {
            if (!hasShown) {
                // If user closes before it auto-opens (edge cases), still mark dismissed
                hasShown = true;
            }

            popup.classList.add("hidden");
            popup.setAttribute("aria-hidden", "true");

            document.documentElement.classList.remove("overflow-hidden");
            document.body.classList.remove("overflow-hidden");

            markDismissed();
            cleanupListeners();
        }

        function cleanupListeners() {
            window.removeEventListener("mouseout", handleMouseOut);
            window.removeEventListener("scroll", handleScroll, {
                passive: true,
            });
        }

        function tryOpenPopup(reason) {
            if (hasShown) return;
            hasShown = true;
            cleanupListeners();
            openPopup();
            // If you want, you can later log `reason` (timer/scroll/exit) to analytics
        }

        closeButtons.forEach(function (btn) {
            btn.addEventListener("click", function (event) {
                event.preventDefault();
                closePopup();
            });
        });

        // Close when clicking on backdrop
        popup.addEventListener("click", function (event) {
            if (event.target === popup) {
                closePopup();
            }
        });

        // Mark dismissed on form submit (no need to wait for response)
        if (form) {
            form.addEventListener("submit", function () {
                markDismissed();
                cleanupListeners();
            });
        }

        // ------- Trigger 1: Time-based (all devices) -------
        window.setTimeout(function () {
            if (
                !hasShown &&
                (!supportsSessionStorage ||
                    sessionStorage.getItem(storageKey) !== "1")
            ) {
                tryOpenPopup("timer");
            }
        }, timeTriggerMs);

        // ------- Trigger 2: Scroll-based (50% scroll, all devices) -------
        function handleScroll() {
            if (hasShown) {
                window.removeEventListener("scroll", handleScroll, {
                    passive: true,
                });
                return;
            }

            const doc = document.documentElement;
            const scrollTop = window.scrollY || doc.scrollTop || 0;
            const viewportHeight = window.innerHeight || doc.clientHeight || 0;
            const totalHeight = doc.scrollHeight || 0;

            if (!totalHeight) return;

            const scrollRatio = (scrollTop + viewportHeight) / totalHeight;

            if (scrollRatio >= scrollTriggerRatio) {
                tryOpenPopup("scroll");
            }
        }

        window.addEventListener("scroll", handleScroll, { passive: true });

        // ------- Trigger 3: Desktop exit-intent (mouse leaves at top) -------
        const isDesktopFn =
            typeof isDesktop === "function"
                ? isDesktop
                : function () {
                      return window.innerWidth >= 1024;
                  };

        function handleMouseOut(event) {
            if (!isDesktopFn() || hasShown) return;

            const toElement = event.relatedTarget || event.toElement;
            // Only when leaving the window, not hovering other elements
            if (toElement) return;

            if (event.clientY <= 0) {
                tryOpenPopup("exit-intent");
            }
        }

        if (isDesktopFn()) {
            window.addEventListener("mouseout", handleMouseOut);
        }
    }

    // --------------------------------------------------------
    // 6) Contact forms – lightweight client-side validation
    // --------------------------------------------------------
    function initContactForms() {
        var forms = document.querySelectorAll(
            'form[data-track="contact-form"]'
        );
        if (!forms.length) return;

        forms.forEach(function (form) {
            var nameInput = form.querySelector('input[name="name"]');
            var emailInput = form.querySelector('input[name="email"]');
            var messageInput = form.querySelector('textarea[name="message"]');

            if (!nameInput || !emailInput || !messageInput) return;

            function isValidEmail(value) {
                var trimmed = value.trim();
                if (!trimmed) return false;
                // Simple, good-enough pattern
                return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(trimmed);
            }

            function clearFieldError(inputEl) {
                if (!inputEl) return;

                inputEl.classList.remove("border-red-400");
                if (!inputEl.classList.contains("border-slate-300")) {
                    inputEl.classList.add("border-slate-300");
                }

                var wrapper =
                    inputEl.closest(".space-y-1") || inputEl.parentElement;
                if (!wrapper) return;

                var err = wrapper.querySelector("[data-field-error]");
                if (err) {
                    err.remove();
                }
            }

            function showFieldError(inputEl, message) {
                if (!inputEl) return;

                inputEl.classList.remove("border-slate-300");
                inputEl.classList.add("border-red-400");

                var wrapper =
                    inputEl.closest(".space-y-1") || inputEl.parentElement;
                if (!wrapper) return;

                var err = wrapper.querySelector("[data-field-error]");
                if (!err) {
                    err = document.createElement("p");
                    err.setAttribute("data-field-error", "true");
                    err.className = "mt-1 text-[11px] text-red-600";
                    wrapper.appendChild(err);
                }
                err.textContent = message;
            }

            function validateForm() {
                var hasError = false;
                clearFieldError(nameInput);
                clearFieldError(emailInput);
                clearFieldError(messageInput);

                var nameVal = nameInput.value.trim();
                var emailVal = emailInput.value.trim();
                var msgVal = messageInput.value.trim();

                if (!nameVal) {
                    showFieldError(nameInput, "Please enter your name.");
                    hasError = true;
                }

                if (!emailVal) {
                    showFieldError(emailInput, "Please enter your email.");
                    hasError = true;
                } else if (!isValidEmail(emailVal)) {
                    showFieldError(
                        emailInput,
                        "Please enter a valid email address."
                    );
                    hasError = true;
                }

                if (!msgVal || msgVal.length < 20) {
                    showFieldError(
                        messageInput,
                        "Please add a few more details (at least 20 characters)."
                    );
                    hasError = true;
                }

                return !hasError;
            }

            form.addEventListener("submit", function (event) {
                if (!validateForm()) {
                    event.preventDefault();
                    // Scroll first error into view (useful inside popup)
                    var firstError = form.querySelector("[data-field-error]");
                    if (
                        firstError &&
                        typeof firstError.scrollIntoView === "function"
                    ) {
                        firstError.scrollIntoView({ block: "nearest" });
                    }
                }
            });

            // Live clear errors when typing
            [nameInput, emailInput, messageInput].forEach(function (field) {
                field.addEventListener("input", function () {
                    clearFieldError(field);
                });
            });
        });
    }

    // --------------------------------------------------------
    // 7) Cookie banner – simple localStorage-based consent
    // --------------------------------------------------------
    function initCookieBanner() {
        var banner = document.querySelector("[data-cookie-banner]");
        if (!banner) return;

        var consentKey = "qalbit_cookie_consent_v1";

        // If already accepted, do nothing
        try {
            if (
                window.localStorage &&
                localStorage.getItem(consentKey) === "accepted"
            ) {
                return;
            }
        } catch (e) {
            // localStorage might be disabled – in that case, just show the banner each time.
        }

        // Show banner
        banner.classList.remove("hidden");

        var acceptBtn = banner.querySelector("[data-cookie-accept]");

        function acceptCookies() {
            try {
                if (window.localStorage) {
                    localStorage.setItem(consentKey, "accepted");
                }
            } catch (e) {
                // ignore if localStorage is blocked
            }

            banner.classList.add("hidden");

            // Optional GTM event
            if (window.dataLayer && Array.isArray(window.dataLayer)) {
                window.dataLayer.push({ event: "cookie_consent_accepted" });
            }
        }

        if (acceptBtn) {
            acceptBtn.addEventListener("click", function (event) {
                event.preventDefault();
                acceptCookies();
            });
        }
    }
})();
