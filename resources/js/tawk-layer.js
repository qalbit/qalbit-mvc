// public/assets/js/tawk-layer.js
(function () {
    // Find the <script> tag that loaded this file
    var currentScript = document.currentScript || (function () {
        var scripts = document.getElementsByTagName('script');
        return scripts[scripts.length - 1] || null;
    })();

    if (!currentScript) return;

    var propertyId = currentScript.getAttribute('data-tawk-property-id');
    var widgetId   = currentScript.getAttribute('data-tawk-widget-id') || 'default';

    if (!propertyId) return;

    // Preserve existing globals if any
    window.Tawk_API = window.Tawk_API || {};
    window.Tawk_LoadStart = new Date();

    // Dynamically inject the Tawk script
    (function () {
        var s1 = document.createElement('script');
        var s0 = document.getElementsByTagName('script')[0];

        s1.async = true;
        s1.src   = 'https://embed.tawk.to/' + propertyId + '/' + widgetId;
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');

        if (s0 && s0.parentNode) {
            s0.parentNode.insertBefore(s1, s0);
        } else {
            document.head.appendChild(s1);
        }
    })();
})();
