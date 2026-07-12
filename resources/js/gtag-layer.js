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
    // 2) Consent defaults + stored consent from localStorage
    // ------------------------------------------------------
    var defaultConsent = {
        ad_storage: 'granted',
        analytics_storage: 'granted',
        personalization_storage: 'granted',
        functionality_storage: 'granted',
        security_storage: 'granted'
    };

    var storedConsent = null;

    try {
        if (window.localStorage) {
            storedConsent = localStorage.getItem('cookie-consent');
        }
    } catch (e) {
        storedConsent = null;
    }

    if (storedConsent === null) {
        // No stored user choice → use default
        gtag('consent', 'default', defaultConsent);
    } else {
        try {
            var parsed = JSON.parse(storedConsent);
            gtag('consent', 'default', parsed);
        } catch (e) {
            // Fallback if invalid JSON
            gtag('consent', 'default', defaultConsent);
        }
    }

    // ------------------------------------------------------
    // 3) Load Google Tag Manager on first interaction (or idle)
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
