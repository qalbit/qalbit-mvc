(function () {
    "use strict";

    /**
     * Lead conversion reporting for the `.erp-page` design system.
     *
     * Ships on every page carrying the `erp-page` class — today
     * /services/erp-development/, /services/crm-development/ and
     * /saudi-arabia/riyadh/ — and reports two conversions to Google (GA4, via
     * the GTM dataLayer) and to Meta (the Pixel's fbq), following the pattern
     * established on the Gulf campaign page in resources/js/go-teardown.js:
     *
     *   1. CONTACT FORM — the shared hero enquiry card, on a CONFIRMED server
     *      success.
     *   2. BOOKING LINK — a click on a crm.qalbit.com booking link. All three
     *      pages carry two of them, in the mid-page and closing CTA bands.
     *
     * NOTHING HERE IS PAGE-SPECIFIC. The event name is read from the form's own
     * `data-ga4-lead` attribute, which the shared hero-form partial renders from
     * each page's config (`erp_scoping_call`, `crm_scoping_call`,
     * `riyadh_scoping_call`). A page added to this design system later is
     * measured correctly by setting `form.ga4_lead` in its config and nothing
     * else. This file was briefly Riyadh-only and patched those attributes onto
     * the DOM after load; the partial now emits them, so that hack is gone.
     *
     * WHY THIS FILE EXISTS RATHER THAN AN EDIT TO main.js.
     * main.js already fires the GA4 `generate_lead` for any form carrying
     * `data-ga4-lead`, from inside the `json.success` branch of its fetch
     * handler — the correct place. But main.js loads on every page on the site,
     * and most of them neither carry a Meta Pixel event nor want one. This file
     * is scoped to the design system instead.
     *
     * HOW FORM SUCCESS IS DETECTED WITHOUT TOUCHING main.js.
     * On a confirmed success main.js calls showGlobal("success", …), which
     * un-hides an element carrying `data-js-global-success` inside the form.
     * That element is only ever revealed on `json.success`, so watching it
     * become visible is exactly equivalent to hooking the success branch — and
     * it is unreachable by a validation failure, a network error or a server
     * error response, all of which route to the `data-js-global-error` box.
     *
     * Two alternatives were rejected. A `submit` listener fires before the
     * request resolves and would count every failed attempt. Wrapping
     * `dataLayer.push` to observe main.js's own event races GTM, which replaces
     * `push` when the container loads — whichever of us runs second wins, and
     * that order is not deterministic.
     *
     * GUARDS, both of which matter:
     *   - `typeof fbq !== "undefined"`. Consent Mode v2 leaves fbq undefined for
     *     a visitor who declines cookies, and a bare reference would throw a
     *     ReferenceError under "use strict".
     *   - A latch per conversion, so a retry after a failed attempt, or a click
     *     on the second booking button, cannot report the same lead twice.
     *
     * THE META PIXEL IS INSTALLED THROUGH GTM, NOT IN THE PAGE. Nothing in this
     * repository calls fbq("init"); the Gulf page's Lead works because the GTM
     * container fires the base pixel there. If that trigger is scoped to /go/
     * paths, `fbq` is undefined on these pages and the Meta half is a silent
     * no-op — the GA4 half still reports. Confirm the trigger covers these
     * paths before relying on the Meta numbers.
     */

    var FORM_SELECTOR = "form[data-contact-form][data-erp-hero-form]";
    var BOOKING_SELECTOR = 'a[href*="crm.qalbit.com/book"]';

    function onReady(fn) {
        if (document.readyState === "loading") {
            document.addEventListener("DOMContentLoaded", fn, { once: true });
        } else {
            fn();
        }
    }

    /** Push to the GTM dataLayer, creating it if the container has not loaded yet. */
    function pushDataLayer(payload) {
        window.dataLayer = window.dataLayer || [];
        if (typeof window.dataLayer.push === "function") {
            window.dataLayer.push(payload);
        }
    }

    /** Meta Pixel. No-op when the pixel is absent or consent was declined. */
    function trackMetaLead(params) {
        if (typeof fbq === "undefined") return;
        try {
            fbq("track", "Lead", params);
        } catch (e) {
            /* never let a pixel failure break the page */
        }
    }

    onReady(function () {
        var form = document.querySelector(FORM_SELECTOR);

        // The event name for BOTH conversions comes from the form, so a page
        // without the hero card reports its booking clicks under a neutral
        // name rather than inventing one or silently mislabelling them.
        var leadName = (form && form.getAttribute("data-ga4-lead")) || "scoping_call";

        if (form) trackFormLead(form, leadName);
        trackBookingClicks(leadName);
    });

    // ------------------------------------------------------------------
    // 1) Contact form — fires once, on a confirmed success only.
    // ------------------------------------------------------------------
    function trackFormLead(form, leadName) {
        var tracked = false;

        function successVisible() {
            var box = form.querySelector("[data-js-global-success]");
            return !!box && !box.classList.contains("hidden");
        }

        function fire() {
            if (tracked || !successVisible()) return;
            tracked = true;
            observer.disconnect();

            // GA4 is already pushed by main.js from the same success branch.
            // This is the Meta half only — pushing generate_lead again here
            // would double-count the conversion in Google.
            trackMetaLead({
                content_name: leadName,
                content_category: "contact_form",
                page_path: window.location.pathname
            });
        }

        // childList catches the box being created and prepended on the first
        // submit; attributes catches the `hidden` class coming off it on a
        // later one, when the element already exists from a failed attempt.
        var observer = new MutationObserver(fire);
        observer.observe(form, {
            childList: true,
            subtree: true,
            attributes: true,
            attributeFilter: ["class"]
        });

        // The box can already be visible on load: the no-JS path posts the form
        // and the server re-renders the page with a flash message.
        fire();
    }

    // ------------------------------------------------------------------
    // 2) Booking links — every page here has two, both to the same tool.
    // ------------------------------------------------------------------
    function trackBookingClicks(leadName) {
        var links = document.querySelectorAll(BOOKING_SELECTOR);
        if (!links.length) return;

        var tracked = false;
        var eventName = leadName + "_booking_click";

        Array.prototype.forEach.call(links, function (link) {
            link.addEventListener("click", function () {
                if (tracked) return;
                tracked = true;

                /*
                 * An INTENT signal, not a completed booking — the visitor is
                 * leaving for the booking tool and may never finish. It is
                 * reported as a Lead because that is the conversion these pages
                 * are optimised for, and it is tagged `booking_click` in both
                 * systems so the two sources stay separable in reporting.
                 * Meta's `Schedule` event is the stricter fit if the booking
                 * tool can ever fire its own confirmed event.
                 *
                 * Unlike the form, GA4 is pushed HERE as well as Meta: main.js
                 * knows nothing about these links, so nothing else reports them.
                 *
                 * No preventDefault and no navigation delay: the links are plain
                 * same-tab hrefs and both calls are synchronous fire-and-forget.
                 * Beacons that try to hold navigation open cost more clicks than
                 * they save.
                 */
                pushDataLayer({
                    event: "generate_lead",
                    form_name: eventName,
                    form_variant: "booking-link",
                    page_path: window.location.pathname
                });

                trackMetaLead({
                    content_name: eventName,
                    content_category: "booking_link",
                    page_path: window.location.pathname
                });
            });
        });
    }
})();
