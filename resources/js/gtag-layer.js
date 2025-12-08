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
    // 3) Load the Google Tag Manager script
    // ------------------------------------------------------
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
})();
