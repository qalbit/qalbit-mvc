// public/assets/js/gtag-layer.js
(function () {
    // Get the <script> tag that loaded this file
    var currentScript = document.currentScript || (function () {
        // Fallback for very old browsers
        var scripts = document.getElementsByTagName('script');
        return scripts[scripts.length - 1] || null;
    })();

    if (!currentScript) {
        return;
    }

    // Read GTM ID from data attribute
    var gtmId = currentScript.getAttribute('data-gtm-id');
    if (!gtmId) {
        return;
    }

    // ------------------------------------------------------
    // 1) Define dataLayer + gtag wrapper BEFORE GTM loads
    // ------------------------------------------------------
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        window.dataLayer.push(arguments);
    }

    // Expose gtag globally (optional but useful)
    window.gtag = gtag;

    // ------------------------------------------------------
    // 2) Shared consent contract
    //
    // qalbit.com and the WordPress blog at /blog/ share a domain,
    // and therefore share this localStorage key. The stored shape
    // MUST stay identical in both codebases: a flat object holding
    // all seven Consent Mode v2 signals, each 'granted' or 'denied'.
    // ------------------------------------------------------
    var CONSENT_KEY = 'cookie-consent';

    var CONSENT_SIGNALS = [
        'ad_storage',
        'ad_user_data',
        'ad_personalization',
        'analytics_storage',
        'personalization_storage',
        'functionality_storage',
        'security_storage'
    ];

    var CONSENT_GRANTED = {
        ad_storage: 'granted',
        ad_user_data: 'granted',
        ad_personalization: 'granted',
        analytics_storage: 'granted',
        personalization_storage: 'granted',
        functionality_storage: 'granted',
        security_storage: 'granted'
    };

    var CONSENT_DENIED = {
        ad_storage: 'denied',
        ad_user_data: 'denied',
        ad_personalization: 'denied',
        analytics_storage: 'denied',
        personalization_storage: 'denied',
        functionality_storage: 'granted',
        security_storage: 'granted'
    };

    // Returns the stored consent state, or null when nothing usable
    // is stored. Anything that is not a well-formed seven-signal
    // object is treated as absent — that covers the legacy "true" /
    // "false" strings and the older five-signal objects, neither of
    // which can express the Consent Mode v2 ad signals. Callers then
    // fall through to the region-scoped defaults and re-prompt.
    function readConsent() {
        var raw = null;

        try {
            if (window.localStorage) {
                raw = localStorage.getItem(CONSENT_KEY);
            }
        } catch (e) {
            return null;
        }

        if (!raw) {
            return null;
        }

        var parsed;

        try {
            parsed = JSON.parse(raw);
        } catch (e) {
            return null;
        }

        if (!parsed || typeof parsed !== 'object' || Array.isArray(parsed)) {
            return null;
        }

        for (var i = 0; i < CONSENT_SIGNALS.length; i++) {
            var value = parsed[CONSENT_SIGNALS[i]];
            if (value !== 'granted' && value !== 'denied') {
                return null;
            }
        }

        return parsed;
    }

    function writeConsent(state) {
        try {
            if (window.localStorage) {
                localStorage.setItem(CONSENT_KEY, JSON.stringify(state));
                return true;
            }
        } catch (e) {
        }

        return false;
    }

    window.qalbitConsent = {
        KEY: CONSENT_KEY,
        SIGNALS: CONSENT_SIGNALS,
        GRANTED: CONSENT_GRANTED,
        DENIED: CONSENT_DENIED,
        read: readConsent,
        write: writeConsent
    };

    // ------------------------------------------------------
    // 3) Consent defaults — MUST fire before the GTM snippet
    // ------------------------------------------------------
    var storedConsent = readConsent();

    if (storedConsent) {
        gtag('consent', 'default', storedConsent);
    } else {
        // EEA, UK and Switzerland: denied until the visitor opts in
        gtag('consent', 'default', {
            ad_storage: 'denied',
            ad_user_data: 'denied',
            ad_personalization: 'denied',
            analytics_storage: 'denied',
            personalization_storage: 'denied',
            functionality_storage: 'granted',
            security_storage: 'granted',
            region: ['AT', 'BE', 'BG', 'HR', 'CY', 'CZ', 'DK', 'EE', 'FI', 'FR', 'DE', 'GR', 'HU', 'IE', 'IT', 'LV', 'LT', 'LU', 'MT', 'NL', 'PL', 'PT', 'RO', 'SK', 'SI', 'ES', 'SE', 'IS', 'LI', 'NO', 'GB', 'CH'],
            wait_for_update: 500
        });

        // Everywhere else: granted
        gtag('consent', 'default', CONSENT_GRANTED);
    }

    // ------------------------------------------------------
    // 4) Load Google Tag Manager on first interaction (or idle)
    //
    // GTM pulls in gtag + the Facebook/LinkedIn pixels (~600 KB,
    // ~400 ms of mobile main-thread). Deferring it until the user
    // interacts keeps all of that out of the critical rendering
    // window; a timeout fallback still records page views for
    // visitors who never touch the page. Events pushed to the
    // dataLayer before GTM boots are replayed by GTM on load.
    // ------------------------------------------------------
    var gtmLoaded = false;

    function loadGtm() {
        if (gtmLoaded) return;
        gtmLoaded = true;

        (function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });

            var f = d.getElementsByTagName(s)[0];
            var j = d.createElement(s);
            var dl = l !== 'dataLayer' ? '&l=' + l : '';

            j.async = true;
            j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', gtmId);
    }

    var interactionEvents = ['pointerdown', 'touchstart', 'keydown', 'scroll'];

    function onFirstInteraction() {
        interactionEvents.forEach(function (ev) {
            window.removeEventListener(ev, onFirstInteraction, true);
        });
        loadGtm();
    }

    interactionEvents.forEach(function (ev) {
        window.addEventListener(ev, onFirstInteraction, { capture: true, passive: true });
    });

    // Fallback for completely passive visitors.
    window.setTimeout(loadGtm, 4000);
})();
