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

        initHeaderMobileMenu();
        initCtaSection({ gsap, hasGsap, prefersReducedMotion });
        initFaqSection({ gsap, hasGsap, prefersReducedMotion });
        initBlogTeaserSection({ gsap, hasGsap, prefersReducedMotion });
        initContactCtaSection({ gsap, hasGsap, prefersReducedMotion });
        // initExitIntentPopup({ isDesktop });
        initContactForms();
        initCookieBanner();
        initContactInputSection();
        initScrollToTop();
        initReloadButtons();
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
    // 6) Contact forms – full validation + AJAX submit
    //
    // Forms posting to /contact-us/ are submitted via fetch with
    // inline errors/success (works on every page, no reload).
    // Other forms (careers apply) get validation only and keep
    // their native submit through recaptcha-layer.js.
    // --------------------------------------------------------
    function initContactForms() {
        var forms = document.querySelectorAll(
            'form[data-contact-form], form[data-track="contact-form"]'
        );
        if (!forms.length) return;

        forms.forEach(function (form) {
            if (form.dataset.jsValidated === "1") return;
            form.dataset.jsValidated = "1";

            var action = form.getAttribute("action") || "";
            var isContactEndpoint = /\/contact-us\/?(?:[?#]|$)/.test(action);

            bindContactForm(form, isContactEndpoint);
        });
    }

    function bindContactForm(form, useAjax) {
        var nameInput = form.querySelector('input[name="name"]');
        var emailInput = form.querySelector('input[name="email"]');
        var phoneInput = form.querySelector('input[name="phone"]');
        var messageInput = form.querySelector('textarea[name="message"]');
        var submitButton = form.querySelector('button[type="submit"]');

        if (!nameInput || !emailInput) return;

        if (useAjax) {
            // recaptcha-layer.js checks this and leaves the form to us
            form.setAttribute("data-js-ajax", "1");
        }

        // ---------- field error UI ----------
        function fieldAnchor(input) {
            // intl-tel-input wraps the phone field; anchor errors to the wrapper
            var iti = input.closest(".iti");
            return iti || input;
        }

        function errorElFor(input, create) {
            var el = form.querySelector(
                '[data-js-error-for="' + input.name + '"]'
            );
            if (!el && create) {
                el = document.createElement("p");
                el.setAttribute("data-js-error-for", input.name);
                el.className = "mt-1 hidden text-[11px] text-red-600";
                fieldAnchor(input).insertAdjacentElement("afterend", el);
            }
            return el;
        }

        function showFieldError(input, message) {
            input.classList.remove("border-slate-300");
            input.classList.add("border-red-400");

            var el = errorElFor(input, true);
            el.textContent = message;
            el.classList.remove("hidden");
        }

        function clearFieldError(input) {
            input.classList.remove("border-red-400");
            if (!input.classList.contains("border-slate-300")) {
                input.classList.add("border-slate-300");
            }

            var el = errorElFor(input, false);
            if (el) {
                el.textContent = "";
                el.classList.add("hidden");
            }
        }

        function globalBox(kind) {
            var attr = "data-js-global-" + kind;
            var el = form.querySelector("[" + attr + "]");
            if (!el) {
                el = document.createElement("div");
                el.setAttribute(attr, "true");
                el.className =
                    kind === "error"
                        ? "mb-3 hidden rounded-md border border-red-200 bg-red-50 px-4 py-3 text-xs text-red-800"
                        : "mb-3 hidden rounded-md border border-green-200 bg-green-50 px-4 py-3 text-xs text-green-800";
                form.prepend(el);
            }
            return el;
        }

        function hideGlobalBoxes() {
            ["error", "success"].forEach(function (kind) {
                var el = form.querySelector("[data-js-global-" + kind + "]");
                if (el) {
                    el.textContent = "";
                    el.classList.add("hidden");
                }
            });
        }

        function showGlobal(kind, message) {
            var el = globalBox(kind);
            el.textContent = message;
            el.classList.remove("hidden");
            if (typeof el.scrollIntoView === "function") {
                el.scrollIntoView({ block: "nearest", behavior: "smooth" });
            }
        }

        // ---------- validators ----------
        function validateName() {
            var v = nameInput.value.trim();
            if (!v) return "Please enter your name.";
            if (v.length < 2) return "Name must be at least 2 characters.";
            if (v.length > 100) return "Name must be 100 characters or fewer.";
            if (!/[A-Za-z\u00C0-\uFFFF]/.test(v))
                return "Please enter a valid name.";
            return "";
        }

        function validateEmail() {
            var v = emailInput.value.trim();
            if (!v) return "Please enter your email address.";
            if (v.length > 200)
                return "Email must be 200 characters or fewer.";
            if (!/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(v))
                return "Please enter a valid email address.";
            return "";
        }

        function validatePhone() {
            if (!phoneInput) return "";
            var v = phoneInput.value.trim();
            if (!v) return "Please enter your phone number.";

            // Prefer intl-tel-input's country-aware validation when loaded
            var iti = phoneInput.__itiInstance;
            if (iti && typeof iti.isValidNumber === "function") {
                try {
                    var valid = iti.isValidNumber();
                    if (valid === true) return "";
                    if (valid === false)
                        return "Please enter a valid phone number for the selected country.";
                } catch (e) {
                    /* utils not ready – fall through to pattern check */
                }
            }

            var digits = v.replace(/[\s().-]/g, "");
            if (!/^\+?\d{7,15}$/.test(digits))
                return "Please enter a valid phone number (7–15 digits).";
            return "";
        }

        function validateMessage() {
            if (!messageInput) return "";
            var v = messageInput.value.trim();
            if (!v) return "Please tell us a bit about your project.";
            if (v.length < 10)
                return "Please add a few more details (at least 10 characters).";
            if (v.length > 5000)
                return "Message must be 5000 characters or fewer.";
            return "";
        }

        var validators = [
            [nameInput, validateName],
            [emailInput, validateEmail],
            [phoneInput, validatePhone],
            [messageInput, validateMessage],
        ].filter(function (pair) {
            return !!pair[0];
        });

        function validateField(pair) {
            var message = pair[1]();
            if (message) {
                showFieldError(pair[0], message);
            } else {
                clearFieldError(pair[0]);
            }
            return !message;
        }

        function validateAll() {
            var firstInvalid = null;
            validators.forEach(function (pair) {
                if (!validateField(pair) && !firstInvalid) {
                    firstInvalid = pair[0];
                }
            });
            return firstInvalid;
        }

        // Validate on blur, clear while typing
        validators.forEach(function (pair) {
            pair[0].addEventListener("blur", function () {
                if (pair[0].value.trim() !== "") validateField(pair);
            });
            pair[0].addEventListener("input", function () {
                clearFieldError(pair[0]);
            });
        });

        // ---------- submit ----------
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

        function recaptchaSiteKey() {
            var el = document.querySelector("script[data-recaptcha-site-key]");
            return el ? el.getAttribute("data-recaptcha-site-key") : "";
        }

        function showServerErrors(errors) {
            if (!errors) return;

            if (errors.global) {
                showGlobal("error", errors.global);
            }

            validators.forEach(function (pair) {
                var message = errors[pair[0].name];
                if (message) showFieldError(pair[0], message);
            });
        }

        form.addEventListener("submit", function (event) {
            hideGlobalBoxes();

            var firstInvalid = validateAll();

            // recaptcha-layer.js consults this before its native re-submit
            form.dataset.jsInvalid = firstInvalid ? "1" : "";

            if (firstInvalid) {
                event.preventDefault();
                firstInvalid.focus({ preventScroll: true });
                var anchor = fieldAnchor(firstInvalid);
                if (typeof anchor.scrollIntoView === "function") {
                    anchor.scrollIntoView({
                        block: "center",
                        behavior: "smooth",
                    });
                }
                return;
            }

            if (!useAjax) {
                // Valid: let recaptcha-layer.js token + native submit proceed
                return;
            }

            event.preventDefault();

            // Normalize phone to full international format for the payload
            if (phoneInput && phoneInput.__itiInstance) {
                try {
                    if (phoneInput.__itiInstance.isValidNumber()) {
                        phoneInput.value = phoneInput.__itiInstance.getNumber();
                    }
                } catch (e) {
                    /* keep typed value */
                }
            }

            setSubmitting(true);

            var formData = new FormData(form);
            formData.set("ajax", "1");

            if (phoneInput && phoneInput.__itiInstance) {
                try {
                    var full = phoneInput.__itiInstance.getNumber();
                    if (full) formData.set("phone_full", full);
                } catch (e) {
                    /* hidden input from the widget already covers it */
                }
            }

            var sendRequest = function (token) {
                if (token) formData.set("recaptcha_token", token);

                // GTM event (parity with the native recaptcha-layer flow)
                if (
                    window.dataLayer &&
                    typeof window.dataLayer.push === "function"
                ) {
                    window.dataLayer.push({
                        event: "contact_form_submit",
                        form_variant:
                            form.getAttribute("data-variant") || "unknown",
                        form_location: window.location.pathname,
                    });
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
                        return response.json().catch(function () {
                            return null;
                        });
                    })
                    .then(function (json) {
                        setSubmitting(false);

                        if (!json) {
                            showGlobal(
                                "error",
                                "Something went wrong. Please try again later."
                            );
                            return;
                        }

                        if (json.success) {
                            showGlobal(
                                "success",
                                json.message ||
                                    "Thank you. We have received your enquiry and will respond within 24 hours (business days)."
                            );
                            form.reset();
                            validators.forEach(function (pair) {
                                clearFieldError(pair[0]);
                            });
                        } else {
                            showServerErrors(json.errors || {});
                        }
                    })
                    .catch(function () {
                        setSubmitting(false);
                        showGlobal(
                            "error",
                            "We could not send your message right now. Please try again later."
                        );
                    });
            };

            var siteKey = recaptchaSiteKey();
            if (
                siteKey &&
                window.grecaptcha &&
                typeof window.grecaptcha.ready === "function"
            ) {
                window.grecaptcha.ready(function () {
                    window.grecaptcha
                        .execute(siteKey, { action: "contact" })
                        .then(sendRequest)
                        .catch(function () {
                            sendRequest(null); // server fails closed
                        });
                });
            } else {
                sendRequest(null);
            }
        });
    }

    // --------------------------------------------------------
    // 7) Cookie banner – localStorage-based consent + GA4/GTM
    // --------------------------------------------------------
    function initCookieBanner() {
        var banner = document.querySelector("[data-cookie-banner]");
        if (!banner) return;

        // MUST match the key used in head.php consent snippet
        var consentKey = "cookie-consent";

        var defaultConsent = {
            ad_storage: "granted",
            analytics_storage: "granted",
            personalization_storage: "granted",
            functionality_storage: "granted",
            security_storage: "granted"
        };

        var hasConsent = false;

        try {
            if (window.localStorage && localStorage.getItem(consentKey)) {
                hasConsent = true;
            }
        } catch (e) {
            hasConsent = false;
        }

        if (hasConsent) {
            return;
        }

        banner.classList.remove("hidden");

        var acceptBtn = banner.querySelector("[data-cookie-accept]");

        function acceptCookies() {
            try {
                if (window.localStorage) {
                    localStorage.setItem(consentKey, JSON.stringify(defaultConsent));
                }
            } catch (e) {
            }

            banner.classList.add("hidden");

            if (window.dataLayer && Array.isArray(window.dataLayer)) {
                window.dataLayer.push({ event: "cookie_consent_accepted" });
            }

            if (typeof gtag === "function") {
                gtag("consent", "update", defaultConsent);
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
        var inputs = document.querySelectorAll("[data-intl-tel-input]");
        if (!inputs.length) return;

        if (typeof window.intlTelInput !== "function") {
            console.warn("[intlTelInput] Library not available");
            return;
        }
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

    // ----------------------------------------------------------
    // 500 Page Reload Button
    // ----------------------------------------------------------
    function initReloadButtons() {
        document.querySelectorAll('[data-js="reload-page"]').forEach(function (btn) {
            btn.addEventListener('click', function() {
                window.location.reload();
            });
        });
    }
    
    // ----------------------------------------------------------
    // Mobile Navigation for Default Header
    // ----------------------------------------------------------
    function initHeaderMobileMenu() {
        const overlay  = document.getElementById('mobile-menu');
        const panel    = document.getElementById('mobile-menu-panel');
        const openBtn  = document.getElementById('mobile-menu-toggle');
        const closeBtn = document.getElementById('mobile-menu-close');

        if (!overlay || !panel || !openBtn || !closeBtn) return;

        function openMenu() {
            overlay.classList.remove('pointer-events-none', 'opacity-0');
            overlay.classList.add('pointer-events-auto', 'opacity-100');
            panel.classList.remove('translate-x-full');
            panel.classList.add('translate-x-0');
            overlay.setAttribute('aria-hidden', 'false');
            openBtn.setAttribute('aria-expanded', 'true');
        }

        function closeMenu() {
            overlay.classList.add('pointer-events-none', 'opacity-0');
            overlay.classList.remove('pointer-events-auto', 'opacity-100');
            panel.classList.add('translate-x-full');
            panel.classList.remove('translate-x-0');
            overlay.setAttribute('aria-hidden', 'true');
            openBtn.setAttribute('aria-expanded', 'false');
        }

        openBtn.addEventListener('click', openMenu);
        closeBtn.addEventListener('click', closeMenu);

        // Close when clicking backdrop
        overlay.addEventListener('click', function (event) {
            if (event.target === overlay) {
                closeMenu();
            }
        });

        // Close on Escape
        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                closeMenu();
            }
        });

        // Submenu accordions
        document.querySelectorAll('[data-submenu-toggle]').forEach(function (button) {
            const id = button.getAttribute('data-submenu-toggle');
            const subPanel = document.getElementById(id);
            const chevron = document.querySelector('[data-submenu-chevron="' + id + '"]');
            if (!subPanel) return;

            button.addEventListener('click', function () {
                const isHidden = subPanel.classList.contains('hidden');
                if (isHidden) {
                    subPanel.classList.remove('hidden');
                    if (chevron) chevron.classList.add('rotate-180');
                    button.setAttribute('aria-expanded', 'true');
                } else {
                    subPanel.classList.add('hidden');
                    if (chevron) chevron.classList.remove('rotate-180');
                    button.setAttribute('aria-expanded', 'false');
                }
            });
        });
    }

})();
