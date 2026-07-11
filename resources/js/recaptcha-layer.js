// public/assets/js/recaptcha-layer.js
(function () {
    function attachRecaptchaHandlers(siteKey) {
        if (!siteKey) return;

        var forms = document.querySelectorAll('form[data-track="contact-form"]');
        if (!forms.length) return;

        forms.forEach(function (form) {
            form.addEventListener('submit', function (e) {
                // main.js owns this form (AJAX submit + own token) — stay out
                if (form.hasAttribute('data-js-ajax')) {
                    return;
                }

                var tokenInput = form.querySelector('input[name="recaptcha_token"]');
                if (!tokenInput) {
                    // If no token field, fall back to normal submit
                    return;
                }

                e.preventDefault();

                // form.submit() bypasses validation handlers, so never re-submit
                // a form main.js flagged as invalid.
                function submitIfValid() {
                    if (form.dataset.jsInvalid === '1') return;
                    form.submit();
                }

                if (!window.grecaptcha || typeof window.grecaptcha.ready !== 'function') {
                    // If grecaptcha is not ready, just submit without token (fails closed server-side)
                    submitIfValid();
                    return;
                }

                window.grecaptcha.ready(function () {
                    window.grecaptcha
                        .execute(siteKey, { action: 'contact' })
                        .then(function (token) {
                            tokenInput.value = token;

                            // GTM event
                            if (window.dataLayer && typeof window.dataLayer.push === 'function') {
                                window.dataLayer.push({
                                    event: 'contact_form_submit',
                                    form_variant: form.getAttribute('data-variant') || 'unknown',
                                    form_location: window.location.pathname
                                });
                            }

                            submitIfValid();
                        })
                        .catch(function () {
                            // On error, submit anyway — the server fails closed
                            submitIfValid();
                        });
                });
            });
        });
    }

    function waitForRecaptchaAndAttach(siteKey) {
        var attempts = 0;
        var maxAttempts = 50; // ~10s at 200ms

        function tryInit() {
            if (window.grecaptcha && typeof window.grecaptcha.ready === 'function') {
                attachRecaptchaHandlers(siteKey);
            } else if (attempts++ < maxAttempts) {
                setTimeout(tryInit, 200);
            } else {
                // Give up silently if reCAPTCHA never loads
            }
        }

        tryInit();
    }

    function bootstrap() {
        // Get the <script> tag that loaded this file
        var currentScript = document.currentScript || (function () {
            var scripts = document.getElementsByTagName('script');
            return scripts[scripts.length - 1] || null;
        })();

        if (!currentScript) return;

        var siteKey = currentScript.getAttribute('data-recaptcha-site-key');
        if (!siteKey) return;

        // Ensure DOM is ready before querying forms
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', function () {
                waitForRecaptchaAndAttach(siteKey);
            });
        } else {
            waitForRecaptchaAndAttach(siteKey);
        }
    }

    bootstrap();
})();
