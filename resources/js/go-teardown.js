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

    var FREE_MAIL = [
        "gmail.com", "yahoo.com", "yahoo.co.uk", "outlook.com", "hotmail.com",
        "live.com", "icloud.com", "aol.com", "proton.me", "protonmail.com",
        "gmx.com", "mail.com", "yandex.com"
    ];

    /* -------------------------------------------------------------------------
     * Pointer gate.
     *
     * Pressing a button blurs whichever field had focus, and blur is when we
     * validate. If that validation adds or removes a message, everything below
     * it moves — including the button being pressed. A click only fires when
     * mousedown and mouseup land on the same element, so the button slides out
     * from under the press and the tap does nothing at all.
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

    /*
     * Per-step validation. `errorId` points at a live region already in the
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
                name: "need",
                type: "radio",
                errorId: "gt-err-need",
                required: "Pick whichever is closest — you can change it later."
            }
        ],
        3: [
            {
                name: "email",
                errorId: "gt-err-email",
                required: "We need an email to send the teardown to.",
                check: function (value) {
                    if (!EMAIL_RE.test(value)) {
                        return "Enter a valid email like you@company.com";
                    }
                    return null;
                }
            },
            {
                name: "product_or_idea",
                errorId: "gt-err-note",
                required: "Add your product URL, or one line on the idea.",
                check: function (value) {
                    if (value.length < 4) {
                        return "A few more words, please — even one line is enough.";
                    }
                    return null;
                }
            }
        ]
    };

    var LAST_STEP = 3;
    var PROGRESS = { 1: "33%", 2: "66%", 3: "90%" };

    onReady(function () {
        var form = document.querySelector("[data-gt-form]");
        if (form) initForm(form);
        initMarquee();
        initWhatsApp();
    });

    /* ---------------------------------------------------------------------
     * Click-to-WhatsApp attribution.
     *
     * The Gulf page offers WhatsApp alongside the form, and a visitor who takes
     * that route leaves no trace: nothing posts, so no CRM record is created
     * and no conversion is reported. Without this the campaign looks like it
     * underperforms by exactly the number of people who chose the channel the
     * page pushes hardest.
     *
     * The links open in a new tab, so this page is never unloaded and the push
     * has time to be consumed — no beacon or unload handling needed. GTM boots
     * on first interaction and replays whatever was pushed before it loaded,
     * which is the same path generate_lead already relies on.
     *
     * A page with no WhatsApp links (the original campaign page) short-circuits.
     * ------------------------------------------------------------------ */
    function initWhatsApp() {
        var links = document.querySelectorAll("[data-gt-wa]");
        if (!links.length) return;

        var form = document.querySelector("[data-gt-form]");
        var campaign = (form && form.getAttribute("data-gt-campaign")) || "";

        Array.prototype.forEach.call(links, function (link) {
            link.addEventListener("click", function () {
                window.dataLayer = window.dataLayer || [];
                window.dataLayer.push({
                    event: "whatsapp_click",
                    form_name: campaign,
                    link_location: link.getAttribute("data-gt-wa") || "unknown",
                    page_path: window.location.pathname
                });
            });
        });
    }

    /* ---------------------------------------------------------------------
     * Marquee.
     *
     * The track is duplicated in the markup so the -50% keyframe loops with no
     * seam. Paused while off screen so a page scrolled past it is not paying
     * for an animation nobody can see.
     * ------------------------------------------------------------------ */
    function initMarquee() {
        var track = document.querySelector(".gt-marquee__track");
        if (!track || prefersReducedMotion) return;
        if (!("IntersectionObserver" in window)) return;

        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                track.style.animationPlayState = entry.isIntersecting ? "running" : "paused";
            });
        });

        io.observe(track);
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
        var progressBar = document.querySelector("[data-gt-progress-bar]");
        var backBtn = document.querySelector("[data-gt-back]");
        var successBlock = document.querySelector("[data-gt-success]");
        var globalError = form.querySelector("[data-gt-global-error]");
        var submitBtn = form.querySelector("[data-gt-submit]");
        var submitLabel = form.querySelector("[data-gt-submit-label]");

        var current = 1;
        var submitting = false;

        // Latched by the Meta Pixel Lead fire below, so a retry after a failed
        // attempt can never report the same lead twice.
        var leadTracked = false;

        // Hand validation over to us: with steps hidden, the browser cannot
        // focus an invalid field it is not showing, and submission silently
        // dies. Set only now, so a no-JS visitor keeps native validation.
        form.noValidate = true;

        if (stepLabel) stepLabel.hidden = false;
        if (progress) progress.hidden = false;

        captureAttribution(form);
        mirrorChoiceState(form);

        /*
         * A failed no-JS submit re-renders with server errors. Open on the
         * first step that has one, so the visitor is not dropped on step 1
         * with an invisible problem two steps down.
         */
        showStep(firstStepWithError(), false);

        /*
         * Steps 1 and 2: choosing an answer is the answer.
         *
         * Advancing has to fire for a tap and NOT for arrow keys. Arrow keys
         * move through a radio group by changing the selection, and Chrome
         * dispatches a synthetic `click` when they do — so neither `change` nor
         * `click` can tell the two apart on its own. Both would throw a
         * keyboard visitor forward on their first arrow press, before they had
         * seen the remaining options. Only a selection preceded by a real
         * pointer press advances; keyboard visitors pick freely and press
         * Enter, which submits the step natively.
         */
        [1, 2].forEach(function (stepNumber) {
            var stepEl = steps[String(stepNumber)];
            if (!stepEl) return;

            var pointerActivated = false;
            var pointerTimer = null;

            ["pointerdown", "mousedown", "touchstart"].forEach(function (type) {
                stepEl.addEventListener(type, function () {
                    pointerActivated = true;
                    window.clearTimeout(pointerTimer);
                    pointerTimer = window.setTimeout(function () {
                        pointerActivated = false;
                    }, 700);
                }, { passive: true });
            });

            var field = STEPS[stepNumber][0];
            Array.prototype.forEach.call(
                stepEl.querySelectorAll('input[type="radio"]'),
                function (input) {
                    input.addEventListener("change", function () {
                        clearFieldError(field);
                    });

                    /*
                     * Advance on `click`, not `change`. Coming Back and tapping
                     * the answer you already gave fires no change event at all,
                     * so a change-driven flow would simply sit there — the
                     * commonest thing to do after going back is to confirm the
                     * same answer.
                     *
                     * `click` catches both, and the pointer gate is what keeps
                     * it keyboard-safe: arrow-key selection dispatches a
                     * synthetic click with no pointer press before it.
                     */
                    input.addEventListener("click", function () {
                        if (!pointerActivated || !input.checked) return;
                        pointerActivated = false;

                        // A beat, so the selection is visibly registered before
                        // the step changes under the pointer.
                        window.setTimeout(function () {
                            if (current === stepNumber) showStep(stepNumber + 1, true);
                        }, 150);
                    });
                }
            );
        });

        if (backBtn) {
            backBtn.addEventListener("click", function () {
                // Values are never cleared going back (WCAG 3.3.7).
                showStep(current - 1, true);
            });
        }

        // Validate on blur, deferred past any pointer press.
        STEPS[LAST_STEP].forEach(function (field) {
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

            // The token has to be in the DOM before FormData reads the form.
            mintRecaptchaToken(function () {
                sendForm();
            });
        });

        /*
         * reCAPTCHA v3, minted per submit.
         *
         * Everything here fails open. api.js is 374 KB injected on first
         * interaction, corporate proxies block google.com outright, and
         * grecaptcha.execute can simply hang — none of which say anything about
         * whether the person filling this in is real. So a missing token sends
         * the lead anyway with the field empty, and the server decides what an
         * unverified lead is worth. The 4-second cap is there because a promise
         * that never settles would otherwise leave the button spinning forever.
         */
        function mintRecaptchaToken(done) {
            var field   = form.querySelector("[data-gt-recaptcha]");
            var siteKey = form.getAttribute("data-gt-recaptcha-key");

            if (!field || !siteKey || !window.grecaptcha ||
                typeof window.grecaptcha.ready !== "function") {
                done();
                return;
            }

            var settled = false;

            function finish() {
                if (settled) return;
                settled = true;
                done();
            }

            window.setTimeout(finish, 4000);

            try {
                window.grecaptcha.ready(function () {
                    window.grecaptcha
                        .execute(siteKey, { action: "saas_teardown" })
                        .then(function (token) {
                            field.value = token || "";
                            finish();
                        })
                        .catch(finish);
                });
            } catch (e) {
                finish();
            }
        }

        function sendForm() {
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
                        .catch(function () { return {}; })
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
        }

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
            current = n;

            Object.keys(steps).forEach(function (key) {
                steps[key].hidden = parseInt(key, 10) !== n;
            });

            if (stepLabel) stepLabel.textContent = "Step " + n + " of " + LAST_STEP;
            if (progressBar) progressBar.style.width = PROGRESS[n];
            if (backBtn) backBtn.hidden = n === 1;

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

            if (firstInvalid && !silent) focusField(firstInvalid);

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

            /*
             * Only scroll if the field is actually off screen. Scrolling to a
             * field the visitor is already looking at moves the page under
             * their thumb for no reason — and on a phone that is how a tap
             * meant for the button lands on whatever slid into its place.
             */
            var anchor = field.type === "radio" ? target.closest(".gt-step") : target;
            if (!anchor || !anchor.scrollIntoView) return;

            var rect = anchor.getBoundingClientRect();
            var viewportHeight = window.innerHeight || document.documentElement.clientHeight;
            if (rect.top >= 88 && rect.bottom <= viewportHeight - 24) return;

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
                if (submitLabel) submitLabel.textContent = "Send my teardown request";
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

            var head = document.querySelector(".gt-card__head");
            var note = document.querySelector(".gt-card__note");
            var foot = document.querySelector(".gt-card__foot");

            if (head) head.hidden = true;
            if (note) note.hidden = true;
            if (progress) progress.hidden = true;
            if (foot) foot.hidden = true;
            form.hidden = true;

            if (successBlock) {
                successBlock.hidden = false;
                var title = successBlock.querySelector("[data-gt-success-title]");
                if (title) title.focus();
            }

            /*
             * Conversion signal for GTM. gtag-layer.js defines dataLayer before
             * GTM loads and GTM replays anything pushed beforehand.
             *
             * Both values used to be hardcoded here, which was fine while this
             * file served one page. It now serves two, so every Gulf conversion
             * was reporting form_name "saas_teardown" against the other page's
             * path — the Gulf campaign looked like it converted nothing and the
             * original looked like it converted twice.
             *
             * page_path comes from the URL, which cannot be wrong. form_name
             * comes from the form, defaulting to the original page's value so a
             * cached copy of that page's HTML keeps pushing exactly what it
             * pushed before.
             */
            var formName = form.getAttribute("data-gt-campaign") || "saas_teardown";

            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({
                event: "generate_lead",
                form_name: formName,
                page_path: window.location.pathname
            });

            /*
             * Meta Pixel lead conversion. Scoped to the Gulf page because this
             * file serves both /go/ pages and only that one carries the base
             * pixel — the pixel is installed in the page, not through GTM, and
             * this deliberately stays out of GTM too.
             *
             * Reached only from the success branch of sendForm(), so it cannot
             * fire on a button click, a step change or a failed request. Both
             * guards matter: fbq is undefined when Consent Mode v2 has the
             * visitor declining cookies, and typeof is what keeps that a no-op
             * rather than a ReferenceError under "use strict".
             */
            if (!leadTracked && formName === "gulf_saas" && typeof fbq !== "undefined") {
                leadTracked = true;
                fbq("track", "Lead");
            }
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
