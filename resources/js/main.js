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
        // initExitIntentPopup({ isDesktop });
        initContactForms();
        initCookieBanner();
        initContactInputSection();
        initScrollToTop();
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
    //     Popup form is submitted via AJAX → JSON
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

        // ----------------------------------------------------
        // AJAX submit for popup form (uses /contact-us/ JSON)
        // ----------------------------------------------------
        if (form) {
            const submitButton = form.querySelector('button[type="submit"]');

            function setSubmitting(isSubmitting) {
                if (!submitButton) return;
                if (isSubmitting) {
                    if (!submitButton.dataset.originalLabel) {
                        submitButton.dataset.originalLabel =
                            submitButton.textContent || "Send message";
                    }
                    submitButton.disabled = true;
                    submitButton.textContent = "Sending...";
                } else {
                    submitButton.disabled = false;
                    if (submitButton.dataset.originalLabel) {
                        submitButton.textContent =
                            submitButton.dataset.originalLabel;
                    }
                }
            }

            function ensureErrorPlaceholders() {
                // Global error (created once)
                let globalError = form.querySelector("[data-js-global-error]");
                if (!globalError) {
                    globalError = document.createElement("div");
                    globalError.setAttribute("data-js-global-error", "true");
                    globalError.className =
                        "mb-3 hidden rounded-md border border-red-200 bg-red-50 px-4 py-3 text-xs text-red-800";
                    form.prepend(globalError);
                }

                // Global success (created once)
                let globalSuccess = form.querySelector(
                    "[data-js-global-success]"
                );
                if (!globalSuccess) {
                    globalSuccess = document.createElement("div");
                    globalSuccess.setAttribute("data-js-global-success", "true");
                    globalSuccess.className =
                        "mb-3 hidden rounded-md border border-green-200 bg-green-50 px-4 py-3 text-xs text-green-800";
                    form.prepend(globalSuccess);
                }

                // Field-level errors
                ["name", "email", "message"].forEach(function (fieldName) {
                    const input = form.querySelector(
                        `[name="${fieldName}"]`
                    );
                    if (!input) return;

                    let errorEl = form.querySelector(
                        `[data-js-error-for="${fieldName}"]`
                    );
                    if (!errorEl) {
                        errorEl = document.createElement("p");
                        errorEl.setAttribute(
                            "data-js-error-for",
                            fieldName
                        );
                        errorEl.className =
                            "mt-1 hidden text-[11px] text-red-600";
                        input.insertAdjacentElement("afterend", errorEl);
                    }
                });
            }

            function clearErrors() {
                const globalError = form.querySelector(
                    "[data-js-global-error]"
                );
                if (globalError) {
                    globalError.textContent = "";
                    globalError.classList.add("hidden");
                }

                const globalSuccess = form.querySelector(
                    "[data-js-global-success]"
                );
                if (globalSuccess) {
                    globalSuccess.textContent = "";
                    globalSuccess.classList.add("hidden");
                }

                ["name", "email", "message"].forEach(function (fieldName) {
                    const input = form.querySelector(
                        `[name="${fieldName}"]`
                    );
                    if (input) {
                        input.classList.remove("border-red-400");
                        input.classList.add("border-slate-300");
                    }

                    const errorEl = form.querySelector(
                        `[data-js-error-for="${fieldName}"]`
                    );
                    if (errorEl) {
                        errorEl.textContent = "";
                        errorEl.classList.add("hidden");
                    }
                });
            }

            function showErrors(errors) {
                ensureErrorPlaceholders();
                clearErrors();

                if (!errors) return;

                const globalError = form.querySelector(
                    "[data-js-global-error]"
                );
                if (errors.global && globalError) {
                    globalError.textContent = errors.global;
                    globalError.classList.remove("hidden");
                }

                ["name", "email", "message"].forEach(function (fieldName) {
                    const message = errors[fieldName];
                    if (!message) return;

                    const input = form.querySelector(
                        `[name="${fieldName}"]`
                    );
                    if (input) {
                        input.classList.remove("border-slate-300");
                        input.classList.add("border-red-400");
                    }

                    const errorEl = form.querySelector(
                        `[data-js-error-for="${fieldName}"]`
                    );
                    if (errorEl) {
                        errorEl.textContent = message;
                        errorEl.classList.remove("hidden");
                    }
                });
            }

            function showSuccess(message) {
                ensureErrorPlaceholders();
                clearErrors();

                const globalSuccess = form.querySelector(
                    "[data-js-global-success]"
                );
                if (globalSuccess) {
                    globalSuccess.textContent =
                        message ||
                        "Thank you. We have received your enquiry and will respond within 24 hours (business days).";
                    globalSuccess.classList.remove("hidden");
                }
            }

            form.addEventListener("submit", function (event) {
                event.preventDefault();

                ensureErrorPlaceholders();
                clearErrors();
                setSubmitting(true);

                const formData = new FormData(form);

                formData.set("ajax", "1");

                // reCAPTCHA v3 (same as /contact-us/)
                const siteKeyMeta = document.querySelector(
                    'meta[name="recaptcha-site-key"]'
                );
                const siteKey = siteKeyMeta
                    ? siteKeyMeta.getAttribute("content")
                    : "";
                const hasRecaptcha =
                    typeof window.grecaptcha !== "undefined" && siteKey;

                const doRequest = function (token) {
                    if (token) {
                        formData.set("recaptcha_token", token);
                    }

                    fetch(form.action, {
                        method: "POST",
                        headers: {
                            "X-Requested-With": "XMLHttpRequest",
                            Accept: "application/json",
                        },
                        body: formData,
                    })
                        .then(function (response) {
                            return response
                                .json()
                                .catch(function () {
                                    return null;
                                });
                        })
                        .then(function (json) {
                            setSubmitting(false);

                            if (!json) {
                                showErrors({
                                    global:
                                        "Something went wrong. Please try again later.",
                                });
                                return;
                            }

                            if (json.success) {
                                // Only on SUCCESS we mark dismissed and stop triggers
                                showSuccess(json.message);
                                form.reset();

                                markDismissed();
                                cleanupListeners();
                            } else {
                                showErrors(json.errors || {});
                            }
                        })
                        .catch(function () {
                            setSubmitting(false);
                            showErrors({
                                global:
                                    "We could not send your message right now. Please try again later.",
                            });
                        });
                };

                if (hasRecaptcha) {
                    window.grecaptcha.ready(function () {
                        window.grecaptcha
                            .execute(siteKey, { action: "contact" })
                            .then(function (token) {
                                doRequest(token);
                            })
                            .catch(function () {
                                setSubmitting(false);
                                showErrors({
                                    global:
                                        "We could not verify that you are a human. Please try again.",
                                });
                            });
                    });
                } else {
                    doRequest(null);
                }
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
            const scrollTop =
                window.scrollY || doc.scrollTop || 0;
            const viewportHeight =
                window.innerHeight || doc.clientHeight || 0;
            const totalHeight = doc.scrollHeight || 0;

            if (!totalHeight) return;

            const scrollRatio =
                (scrollTop + viewportHeight) / totalHeight;

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

            const toElement =
                event.relatedTarget || event.toElement;
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

    // --------------------------------------------------------
    // HELPER) Input Contact Field Picker
    // --------------------------------------------------------
    function initContactInputSection() {
        if (typeof window.intlTelInput !== "function") {
            console.warn("[intlTelInput] Library not available");
            return;
        }

        var inputs = document.querySelectorAll("[data-intl-tel-input]");
        if (!inputs.length) return;
        inputs.forEach(function (input) {
            if (input.__itiInstance) {
                return;
            }
            var form = input.form || null;
            var iti = window.intlTelInput(input, {
                initialCountry: "auto",
                geoIpLookup: (success, failure) => {
                    fetch("https://ipapi.co/json")
                    .then((res) => res.json())
                    .then((data) => success(data.country_code))
                    .catch(() => failure());
                },
                hiddenInput: (_) => ({
                    phone: "phone_full",
                    country: "country_code"
                }),
                separateDialCode: true,
                nationalMode: false,
                autoHideDialCode: false,
                utilsScript:
                    "https://cdn.jsdelivr.net/npm/intl-tel-input@25.12.5/build/js/utils.min.js",
            });

            input.__itiInstance = iti;

            if (!form) return;

            // On submit, normalize the value to full international (E.164)
            form.addEventListener("submit", function () {
                try {
                    if (iti.isValidNumber()) {
                        // Replace value with fully qualified international number
                        input.value = iti.getNumber(); // e.g. +14155551234
                    }
                } catch (e) {
                    console.warn("[intlTelInput] Failed to normalize phone:", e);
                }
            });
        });
    }

    // ----------------------------------------------------------
    // Scroll-to-top button (bottom-left stack)
    // ----------------------------------------------------------
    function initScrollToTop() {
        var stack = document.querySelector('[data-floating-stack="bottom-left"]');
        if (!stack) return;

        var button = stack.querySelector("[data-scroll-top-trigger]");
        if (!button) return;

        var showOffset = 400; // px from top after which button appears
        var hideOffset = 80;  // px from top where button hides again
        var isVisible = false;

        function showButton() {
            if (isVisible) return;
            isVisible = true;
            button.classList.remove(
                "opacity-0",
                "pointer-events-none",
                "translate-y-2"
            );
            button.classList.add(
                "opacity-100",
                "pointer-events-auto",
                "translate-y-0"
            );
        }

        function hideButton() {
            if (!isVisible) return;
            isVisible = false;
            button.classList.add(
                "opacity-0",
                "pointer-events-none",
                "translate-y-2"
            );
            button.classList.remove(
                "opacity-100",
                "pointer-events-auto",
                "translate-y-0"
            );
        }

        // Show/hide on scroll
        window.addEventListener(
            "scroll",
            function () {
                var y =
                    window.pageYOffset ||
                    document.documentElement.scrollTop ||
                    0;

                if (y > showOffset) {
                    showButton();
                } else if (y < hideOffset) {
                    hideButton();
                }
            },
            { passive: true }
        );

        // Scroll smoothly to top on click
        button.addEventListener("click", function () {
            try {
                window.scrollTo({
                    top: 0,
                    behavior: "smooth",
                });
            } catch (err) {
                // Fallback for very old browsers
                window.scrollTo(0, 0);
            }
        });
    }

})();
