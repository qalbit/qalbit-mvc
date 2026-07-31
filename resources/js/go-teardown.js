/**
 * /go/saas-product-development/ — landing page behaviour.
 *
 * Everything here is an enhancement. The page ships a working form without it:
 * all three steps render, the browser validates, and the form posts normally.
 * This script turns that into a one-question-at-a-time flow, captures campaign
 * attribution, and submits over fetch so the visitor never leaves the page.
 *
 * No dependencies, no framework, no storage APIs — form state lives in the DOM.
 */
(function () {
    "use strict";

    function onReady(fn) {
        if (document.readyState === "loading") {
            document.addEventListener("DOMContentLoaded", fn, { once: true });
        } else {
            fn();
        }
    }

    var prefersReducedMotion =
        typeof window.matchMedia === "function" &&
        window.matchMedia("(prefers-reduced-motion: reduce)").matches;

    var EMAIL_RE = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;

    /* -------------------------------------------------------------------------
     * Pointer gate.
     *
     * Pressing "Continue" blurs whichever field had focus, and blur is when we
     * validate. If that validation adds or removes a message, everything below
     * it moves — including the button being pressed. A click only fires when
     * mousedown and mouseup land on the same element, so the button slides out
     * from under the press and the tap does nothing at all. The visitor presses
     * again; on a phone it reads as a dead button.
     *
     * So work that changes layout waits until the pointer is up. The flush is
     * scheduled rather than run inline because pointerup precedes mouseup and
     * click — a task boundary puts it safely after the whole sequence.
     * ---------------------------------------------------------------------- */
    var pointerIsDown = false;
    var pendingWork = null;

    function markPointerDown() {
        pointerIsDown = true;
    }

    function markPointerUp() {
        pointerIsDown = false;
        if (!pendingWork) return;

        var work = pendingWork;
        pendingWork = null;
        window.setTimeout(work, 0);
    }

    ["pointerdown", "mousedown", "touchstart"].forEach(function (type) {
        document.addEventListener(type, markPointerDown, { capture: true, passive: true });
    });

    ["pointerup", "pointercancel", "mouseup", "touchend", "touchcancel"].forEach(function (type) {
        document.addEventListener(type, markPointerUp, { capture: true, passive: true });
    });

    function whenPointerReleased(work) {
        if (!pointerIsDown) {
            work();
            return;
        }
        pendingWork = work;
    }

    var FREE_MAIL = [
        "gmail.com", "yahoo.com", "yahoo.co.uk", "outlook.com", "hotmail.com",
        "live.com", "icloud.com", "aol.com", "proton.me", "protonmail.com",
        "gmx.com", "mail.com", "yandex.com"
    ];

    /*
     * Per-step validation. `errorId` points at the live region already in the
     * markup, so a message never has to be injected into a new element the
     * screen reader has not been told about.
     */
    var STEPS = {
        1: [
            {
                name: "stage",
                type: "radio",
                errorId: "gt-err-stage",
                required: "Pick the option that fits best — it only takes one click."
            }
        ],
        2: [
            {
                name: "name",
                errorId: "gt-err-name",
                required: "Please enter your name.",
                check: function (value) {
                    if (value.length < 2) {
                        return "Please enter your full name — at least 2 characters.";
                    }
                    return null;
                }
            },
            {
                name: "email",
                errorId: "gt-err-email",
                required: "Please enter your email address.",
                check: function (value) {
                    if (!EMAIL_RE.test(value)) {
                        return "Enter a valid work email like you@company.com";
                    }
                    return null;
                }
            }
        ],
        3: [
            {
                name: "product_or_idea",
                errorId: "gt-err-product",
                required: "Add your product URL, or one line on the idea.",
                check: function (value) {
                    if (value.length < 4) {
                        return "A few more words, please — even one line is enough.";
                    }
                    return null;
                }
            },
            {
                name: "budget",
                type: "radio",
                errorId: "gt-err-budget",
                required: "Pick the band closest to your budget."
            },
            {
                name: "timeline",
                type: "radio",
                errorId: "gt-err-timeline",
                required: "Let us know roughly when you want to start."
            }
        ]
    };

    var LAST_STEP = 3;

    onReady(function () {
        initReveal();
        initSmoothScroll();

        var form = document.querySelector("[data-gt-form]");
        if (form) {
            initForm(form);
        }

        initStickyCta();
    });

    /* ---------------------------------------------------------------------
     * Scroll reveal
     *
     * The hero carries no reveal class: its H1 is the LCP element and has to
     * paint on the first frame. Without IntersectionObserver everything is
     * simply shown.
     * ------------------------------------------------------------------ */
    function initReveal() {
        var targets = document.querySelectorAll(".gt-reveal");
        if (!targets.length) return;

        if (prefersReducedMotion || !("IntersectionObserver" in window)) {
            Array.prototype.forEach.call(targets, function (el) {
                el.classList.add("is-visible");
            });
            return;
        }

        var io = new IntersectionObserver(
            function (entries) {
                entries.forEach(function (entry) {
                    if (!entry.isIntersecting) return;
                    entry.target.classList.add("is-visible");
                    io.unobserve(entry.target);
                });
            },
            { threshold: 0.15 }
        );

        Array.prototype.forEach.call(targets, function (el) {
            io.observe(el);
        });
    }

    /* ---------------------------------------------------------------------
     * Smooth scroll to the form. Reduced motion gets an instant jump.
     * ------------------------------------------------------------------ */
    function initSmoothScroll() {
        document.addEventListener("click", function (event) {
            var trigger = event.target.closest
                ? event.target.closest("[data-gt-scroll]")
                : null;
            if (!trigger) return;

            var target = document.querySelector(
                trigger.getAttribute("href") || "#lead-form"
            );
            if (!target) return;

            event.preventDefault();
            target.scrollIntoView({
                behavior: prefersReducedMotion ? "auto" : "smooth",
                block: "start"
            });

            // Move focus with the viewport, or a keyboard user's next Tab
            // resumes from wherever the button was.
            var focusable = target.querySelector("input, textarea, button, a");
            if (focusable) {
                window.setTimeout(
                    function () {
                        focusable.focus({ preventScroll: true });
                    },
                    prefersReducedMotion ? 0 : 350
                );
            }
        });
    }

    /* ---------------------------------------------------------------------
     * Sticky mobile CTA — shown only while the form is off screen.
     * ------------------------------------------------------------------ */
    function initStickyCta() {
        var bar = document.querySelector("[data-gt-sticky]");
        var panel = document.querySelector("[data-gt-panel]");
        if (!bar || !panel) return;

        if (!("IntersectionObserver" in window)) return; // no bar rather than a stuck one

        bar.hidden = false;

        var io = new IntersectionObserver(
            function (entries) {
                entries.forEach(function (entry) {
                    bar.classList.toggle("is-visible", !entry.isIntersecting);
                });
            },
            { threshold: 0 }
        );

        io.observe(panel);

        // Once the lead is captured there is nothing left to call to action.
        bar.addEventListener("gt:submitted", function () {
            io.disconnect();
            bar.classList.remove("is-visible");
        });
    }

    /* ---------------------------------------------------------------------
     * The form
     * ------------------------------------------------------------------ */
    function initForm(form) {
        var steps = {};
        Array.prototype.forEach.call(
            form.querySelectorAll("[data-gt-step]"),
            function (el) {
                steps[el.getAttribute("data-gt-step")] = el;
            }
        );

        var stepLabel = document.querySelector("[data-gt-step-label]");
        var progress = document.querySelector("[data-gt-progress]");
        var progressSegments = progress
            ? progress.querySelectorAll("li")
            : [];
        var successBlock = document.querySelector("[data-gt-success]");
        var globalError = form.querySelector("[data-gt-global-error]");
        var submitBtn = form.querySelector("[data-gt-submit]");
        var submitLabel = form.querySelector("[data-gt-submit-label]");
        var stickyBar = document.querySelector("[data-gt-sticky]");

        var current = 1;
        var submitting = false;

        // Hand validation over to us: with steps hidden, the browser cannot
        // focus an invalid field it is not showing, and submission silently
        // dies. Set only now, so a no-JS visitor keeps native validation.
        form.noValidate = true;

        // Reveal the JS-only chrome.
        if (stepLabel) stepLabel.hidden = false;
        if (progress) progress.hidden = false;
        Array.prototype.forEach.call(
            form.querySelectorAll("[data-gt-nav], [data-gt-back]"),
            function (el) {
                el.hidden = false;
            }
        );

        captureAttribution(form);
        mirrorChoiceState(form);

        /*
         * A failed no-JS submit re-renders with server errors. Open on the
         * first step that has one, so the visitor is not dropped on step 1
         * with an invisible problem three steps down.
         */
        var firstErrored = firstStepWithError();
        showStep(firstErrored, false);

        /*
         * Step 1: choosing an answer is the answer.
         *
         * Auto-advance has to fire for a tap and NOT for arrow keys. Arrow keys
         * move through a radio group by changing the selection, and Chrome
         * dispatches a synthetic `click` when they do — so neither `change` nor
         * `click` can tell the two apart on its own. Both would throw a
         * keyboard visitor to step 2 on their first arrow press, before they
         * had seen the remaining options.
         *
         * So: only a selection preceded by a real pointer press advances.
         * Keyboard visitors pick freely and confirm with Continue.
         */
        var stageStep = steps["1"];
        var pointerActivated = false;
        var pointerTimer = null;

        function markPointer() {
            pointerActivated = true;
            window.clearTimeout(pointerTimer);
            pointerTimer = window.setTimeout(function () {
                pointerActivated = false;
            }, 700);
        }

        if (stageStep) {
            ["pointerdown", "mousedown", "touchstart"].forEach(function (type) {
                stageStep.addEventListener(type, markPointer, { passive: true });
            });
        }

        var stageInputs = form.querySelectorAll('input[name="stage"]');
        Array.prototype.forEach.call(stageInputs, function (input) {
            input.addEventListener("change", function () {
                clearFieldError(STEPS[1][0]);

                if (!pointerActivated || !input.checked) return;
                pointerActivated = false;

                // A beat, so the selection is visibly registered before the
                // step changes under the pointer.
                window.setTimeout(function () {
                    if (current === 1) showStep(2, true);
                }, 150);
            });
        });

        // --- Continue / Back ----------------------------------------------
        Array.prototype.forEach.call(
            form.querySelectorAll("[data-gt-next]"),
            function (btn) {
                btn.addEventListener("click", function () {
                    var from = parseInt(btn.getAttribute("data-gt-next"), 10);
                    if (!validateStep(from)) return;
                    showStep(from + 1, true);
                });
            }
        );

        Array.prototype.forEach.call(
            form.querySelectorAll("[data-gt-back]"),
            function (btn) {
                btn.addEventListener("click", function () {
                    var from = parseInt(btn.getAttribute("data-gt-back"), 10);
                    // Values are never cleared going back (WCAG 3.3.7).
                    showStep(from - 1, true);
                });
            }
        );

        // --- Validate on blur ---------------------------------------------
        [2, 3].forEach(function (stepNumber) {
            STEPS[stepNumber].forEach(function (field) {
                if (field.type === "radio") return;
                var input = form.elements[field.name];
                if (!input) return;

                input.addEventListener("blur", function () {
                    if (input.value.trim() === "") return; // don't scold an untouched field

                    whenPointerReleased(function () {
                        validateField(field);
                        if (field.name === "email") softHintFreeMail(input);
                    });
                });
            });
        });

        // Radio choices in step 3 clear their own error as soon as they answer it.
        ["budget", "timeline"].forEach(function (name) {
            Array.prototype.forEach.call(
                form.querySelectorAll('input[name="' + name + '"]'),
                function (input) {
                    input.addEventListener("change", function () {
                        var field = STEPS[3].filter(function (f) {
                            return f.name === name;
                        })[0];
                        if (field) clearFieldError(field);
                    });
                }
            );
        });

        // --- Submit --------------------------------------------------------
        form.addEventListener("submit", function (event) {
            event.preventDefault();
            if (submitting) return;

            if (!validateStep(LAST_STEP)) return;

            // Earlier steps are validated too: a visitor can reach step 3 and
            // then empty a field by going back.
            var blockedAt = 0;
            [1, 2].forEach(function (n) {
                if (!blockedAt && !validateStep(n, true)) blockedAt = n;
            });
            if (blockedAt) {
                showStep(blockedAt, false);
                validateStep(blockedAt);
                return;
            }

            setSubmitting(true);
            hideGlobalError();

            var payload = new URLSearchParams(new FormData(form));

            window
                .fetch(form.action, {
                    method: "POST",
                    headers: {
                        Accept: "application/json",
                        "X-Requested-With": "XMLHttpRequest",
                        "Content-Type": "application/x-www-form-urlencoded;charset=UTF-8"
                    },
                    body: payload.toString(),
                    credentials: "same-origin"
                })
                .then(function (response) {
                    return response
                        .json()
                        .catch(function () {
                            return {};
                        })
                        .then(function (data) {
                            return { ok: response.ok, data: data };
                        });
                })
                .then(function (result) {
                    if (result.ok && result.data && result.data.ok) {
                        onSuccess();
                        return;
                    }

                    setSubmitting(false);

                    var errors = (result.data && result.data.errors) || {};
                    var fieldNames = Object.keys(errors).filter(function (key) {
                        return key !== "global";
                    });

                    if (fieldNames.length) {
                        applyServerErrors(errors);
                        return;
                    }

                    showGlobalError(
                        errors.global ||
                            "Something went wrong sending that — please try again, or email sales@qalbit.com."
                    );
                })
                .catch(function () {
                    // Network failure. Every entered value is still in the DOM.
                    setSubmitting(false);
                    showGlobalError(
                        "Something went wrong sending that — please try again, or email sales@qalbit.com."
                    );
                });
        });

        /* ----------------------------------------------------------------- */

        function firstStepWithError() {
            for (var n = 1; n <= LAST_STEP; n++) {
                var hasError = STEPS[n].some(function (field) {
                    var el = document.getElementById(field.errorId);
                    return el && el.textContent.trim() !== "";
                });
                if (hasError) return n;
            }
            return 1;
        }

        function showStep(n, moveFocus) {
            if (n < 1) n = 1;
            if (n > LAST_STEP) n = LAST_STEP;

            var isTransition = current !== n;
            current = n;

            Object.keys(steps).forEach(function (key) {
                steps[key].hidden = parseInt(key, 10) !== n;
            });

            // The slide-in belongs to the transition, not to page load.
            if (isTransition && steps[n] && !prefersReducedMotion) {
                steps[n].classList.remove("is-entering");
                void steps[n].offsetWidth; // restart the animation
                steps[n].classList.add("is-entering");
            }

            if (stepLabel) {
                stepLabel.textContent = "Step " + n + " of " + LAST_STEP;
            }

            Array.prototype.forEach.call(progressSegments, function (seg, i) {
                seg.classList.toggle("is-filled", i < n);
            });

            if (moveFocus) {
                var heading = steps[n]
                    ? steps[n].querySelector("[data-gt-step-heading]")
                    : null;
                if (heading) heading.focus();
            }
        }

        function validateStep(stepNumber, silent) {
            var firstInvalid = null;

            STEPS[stepNumber].forEach(function (field) {
                var message = fieldError(field);

                if (!silent) setFieldError(field, message);

                if (message && !firstInvalid) firstInvalid = field;
            });

            if (firstInvalid && !silent) {
                focusField(firstInvalid);
            }

            return !firstInvalid;
        }

        function validateField(field) {
            var message = fieldError(field);
            setFieldError(field, message);
            return !message;
        }

        function fieldError(field) {
            if (field.type === "radio") {
                var checked = form.querySelector(
                    'input[name="' + field.name + '"]:checked'
                );
                return checked ? null : field.required;
            }

            var input = form.elements[field.name];
            if (!input) return null;

            var value = input.value.trim();
            if (value === "") return field.required;

            return field.check ? field.check(value) : null;
        }

        function setFieldError(field, message) {
            var errorEl = document.getElementById(field.errorId);
            if (errorEl) errorEl.textContent = message || "";

            if (field.type === "radio") return;

            var input = form.elements[field.name];
            if (!input) return;

            if (message) {
                input.setAttribute("aria-invalid", "true");
            } else {
                input.removeAttribute("aria-invalid");
            }
        }

        function clearFieldError(field) {
            setFieldError(field, null);
        }

        function focusField(field) {
            var target =
                field.type === "radio"
                    ? form.querySelector('input[name="' + field.name + '"]')
                    : form.elements[field.name];

            if (!target) return;

            target.focus({ preventScroll: true });

            // Visually hidden radios: bring the choice group itself into view.
            var anchor = field.type === "radio" ? target.closest(".gt-fieldset") : target;
            if (!anchor || !anchor.scrollIntoView) return;

            /*
             * Only scroll if the field is actually off screen. Scrolling to a
             * field the visitor is already looking at moves the page under
             * their thumb for no reason — and on a phone that is how a tap
             * meant for "Continue" lands on whatever slid into its place.
             */
            var rect = anchor.getBoundingClientRect();
            var viewportHeight = window.innerHeight || document.documentElement.clientHeight;
            var margin = 24;

            if (rect.top >= margin && rect.bottom <= viewportHeight - margin) return;

            anchor.scrollIntoView({
                behavior: prefersReducedMotion ? "auto" : "smooth",
                block: "center"
            });
        }

        function applyServerErrors(errors) {
            var target = 0;

            [1, 2, 3].forEach(function (n) {
                STEPS[n].forEach(function (field) {
                    if (!errors[field.name]) return;
                    setFieldError(field, errors[field.name]);
                    if (!target) target = n;
                });
            });

            if (errors.global) showGlobalError(errors.global);

            if (target) {
                showStep(target, false);
                var field = STEPS[target].filter(function (f) {
                    return !!errors[f.name];
                })[0];
                if (field) focusField(field);
            }
        }

        function setSubmitting(state) {
            submitting = state;
            if (!submitBtn) return;

            submitBtn.disabled = state;

            if (state) {
                submitBtn.setAttribute("aria-busy", "true");
                if (submitLabel) submitLabel.textContent = "Sending…";
                if (!submitBtn.querySelector(".gt-spinner")) {
                    var spinner = document.createElement("span");
                    spinner.className = "gt-spinner";
                    spinner.setAttribute("aria-hidden", "true");
                    submitBtn.insertBefore(spinner, submitBtn.firstChild);
                }
            } else {
                submitBtn.removeAttribute("aria-busy");
                if (submitLabel) submitLabel.textContent = "Get my free teardown";
                var existing = submitBtn.querySelector(".gt-spinner");
                if (existing) existing.remove();
            }
        }

        function showGlobalError(message) {
            if (!globalError) return;
            globalError.textContent = message;
            globalError.hidden = false;
        }

        function hideGlobalError() {
            if (!globalError) return;
            globalError.textContent = "";
            globalError.hidden = true;
        }

        function onSuccess() {
            submitting = false;

            var head = document.querySelector(".gt-panel__head");
            if (head) head.hidden = true;
            form.hidden = true;

            if (successBlock) {
                successBlock.hidden = false;
                var title = successBlock.querySelector("[data-gt-success-title]");
                if (title) title.focus();
            }

            if (stickyBar) {
                stickyBar.dispatchEvent(new CustomEvent("gt:submitted"));
            }

            // Conversion signal for GTM. gtag-layer.js defines dataLayer before
            // GTM loads and GTM replays anything pushed beforehand.
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({
                event: "generate_lead",
                form_name: "saas_teardown",
                page_path: "/go/saas-product-development/"
            });
        }

        function softHintFreeMail(input) {
            var hint = document.querySelector("[data-gt-email-hint]");
            if (!hint) return;

            var value = input.value.trim().toLowerCase();
            var at = value.lastIndexOf("@");
            var domain = at === -1 ? "" : value.slice(at + 1);

            // A hint, never a block — plenty of founders are on a personal address.
            hint.textContent =
                domain && FREE_MAIL.indexOf(domain) !== -1
                    ? "A work address usually reaches you faster, but this is fine too."
                    : "";
        }
    }

    /* ---------------------------------------------------------------------
     * Campaign attribution.
     *
     * Read once from the URL and document.referrer into hidden inputs, so the
     * values survive every step without any storage API. A parameter that is
     * absent stays empty and is sent as null — nothing is inferred.
     * ------------------------------------------------------------------ */
    function captureAttribution(form) {
        var params;
        try {
            params = new URLSearchParams(window.location.search);
        } catch (e) {
            return;
        }

        Array.prototype.forEach.call(
            form.querySelectorAll("[data-gt-utm]"),
            function (input) {
                var value = params.get(input.getAttribute("data-gt-utm"));
                if (value) input.value = value.slice(0, 200);
            }
        );

        var referrerInput = form.querySelector("[data-gt-referrer]");
        if (referrerInput && document.referrer) {
            referrerInput.value = document.referrer.slice(0, 500);
        }
    }

    /* ---------------------------------------------------------------------
     * Mirror :checked onto the label as a class.
     *
     * CSS handles this with :has(), which is everywhere we care about — this
     * keeps the selected state legible anywhere that lacks it.
     * ------------------------------------------------------------------ */
    function mirrorChoiceState(form) {
        Array.prototype.forEach.call(
            form.querySelectorAll("[data-gt-choices]"),
            function (group) {
                group.addEventListener("change", function () {
                    Array.prototype.forEach.call(
                        group.querySelectorAll(".gt-choice"),
                        function (label) {
                            var input = label.querySelector("input");
                            label.classList.toggle("is-checked", !!(input && input.checked));
                        }
                    );
                });
            }
        );
    }
})();
