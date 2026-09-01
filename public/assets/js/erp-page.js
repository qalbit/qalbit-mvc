/**
 * /services/erp-development/ and /services/crm-development/ — page behaviour.
 *
 * Loaded only when the rendered page carries `.erp-page` (see layouts/main.php),
 * which is the design system's scope, not a page name — both service pages
 * above render through it. Two features, both progressive enhancements: with
 * this file blocked the pages still render correctly and both cost tables still
 * show real numbers.
 *
 *   1. Scroll reveal for [data-reveal] blocks.
 *   2. The seat-count slider that recomputes licence costs. Two callers:
 *      the ERP comparison table (five-year totals) and the CRM seat model
 *      (per-row spans, one with a flat onboarding fee on top).
 *
 * No dependencies. The site loads GSAP globally, but pulling ScrollTrigger in
 * for six fade-ups would be heavier than the IntersectionObserver below.
 */
(function () {
    'use strict';

    var page = document.querySelector('.erp-page');
    if (!page) return;

    var reduced = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* ---------------------------------------------------------------
       1. Scroll reveal
       Only blocks that START below the fold are hidden. Anything already
       on screen at load is never touched, so there is no flash and no
       hidden-forever content if the observer never fires.
       --------------------------------------------------------------- */
    (function reveal() {
        if (reduced || !('IntersectionObserver' in window)) return;

        var blocks = Array.prototype.slice.call(page.querySelectorAll('[data-reveal]'));
        if (!blocks.length) return;

        var pending = blocks.filter(function (el) {
            return el.getBoundingClientRect().top > window.innerHeight * 0.92;
        });
        if (!pending.length) return;

        pending.forEach(function (el) { el.classList.add('is-hidden'); });

        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) return;
                entry.target.classList.remove('is-hidden');
                io.unobserve(entry.target);
            });
        }, { rootMargin: '0px 0px -8% 0px', threshold: 0.04 });

        pending.forEach(function (el) { io.observe(el); });
    }());

    /* ---------------------------------------------------------------
       2. Users slider — live licence cost
       Both callers render server-side at their config default, so these
       are already the correct numbers before this runs. We only re-render
       on input. One slider per page: the ERP page has the comparison
       table, the CRM page has the seat model, neither has both.
       --------------------------------------------------------------- */
    (function costModel() {
        var input = page.querySelector('[data-erp-users-input]');
        if (!input) return;

        var out    = page.querySelector('[data-erp-users-out]');
        var labels = Array.prototype.slice.call(page.querySelectorAll('[data-erp-users-label],[data-erp-users-template]'));
        var cells  = Array.prototype.slice.call(page.querySelectorAll('[data-erp-cost]'));

        // Match the server-side format exactly: whole dollars, thousands separated.
        var fmt;
        try {
            fmt = new Intl.NumberFormat('en-US', { maximumFractionDigits: 0 });
        } catch (e) {
            fmt = { format: function (n) { return String(Math.round(n)); } };
        }

        function paint() {
            var users = parseInt(input.value, 10);
            if (!isFinite(users) || users <= 0) return;

            if (out) out.textContent = fmt.format(users);

            labels.forEach(function (el) {
                // The template lives in data-erp-users-template; the marker
                // attribute itself may be valueless. Accept either so the
                // markup can carry it whichever way reads better.
                var tpl = el.getAttribute('data-erp-users-template')
                       || el.getAttribute('data-erp-users-label');
                if (tpl && tpl.indexOf('{users}') !== -1) {
                    el.textContent = tpl.replace('{users}', fmt.format(users));
                }
            });

            cells.forEach(function (el) {
                var rate = parseFloat(el.getAttribute('data-erp-cost'));
                if (!isFinite(rate)) return;
                // Keep the authored text around the amount ('~', 'at renewal
                // rate'). Dropping it would recompute the number out of the
                // sentence that qualifies it.
                var pre  = el.getAttribute('data-erp-cost-prefix') || '';
                var post = el.getAttribute('data-erp-cost-suffix') || '';

                // Span being priced, in months. The ERP comparison table is
                // always a five-year total so it omits the attribute and gets
                // 60; the CRM seat model prices a single year on some rows and
                // five on others, so it states the span per cell.
                var months = parseFloat(el.getAttribute('data-erp-cost-months'));
                if (!isFinite(months) || months <= 0) months = 60;

                // Flat one-off on top of the per-seat run rate -- HubSpot's
                // mandatory onboarding fee is the only current user. It is NOT
                // multiplied by seats or by months.
                var plus = parseFloat(el.getAttribute('data-erp-cost-plus'));
                if (!isFinite(plus)) plus = 0;

                el.textContent = pre + '$' + fmt.format(rate * months * users + plus) + post;
            });

            input.setAttribute('aria-valuetext', users + ' users');
        }

        input.addEventListener('input', paint);
        input.addEventListener('change', paint);
        paint();
    }());
}());

/**
 * Photograph band — reveal colour under the pointer.
 *
 * Writes the cursor position onto the colour layer as custom properties; the
 * radial mask in page CSS does the rest. Reads are cheap (offsetX/offsetY off
 * the event) and writes are coalesced into one rAF, so a fast sweep across the
 * band costs one style write per frame rather than one per event.
 *
 * Everything here is decoration: the figure is aria-hidden and there is nothing
 * to operate. With this file blocked the band stays grayscale, which is the
 * design's resting state anyway.
 */
(function () {
    var page = document.querySelector('.erp-page');
    if (!page) { return; }

    var figures = page.querySelectorAll('[data-erp-photo-reveal]');
    if (!figures.length) { return; }

    // Matches the @media (hover:none),(pointer:coarse) block that hides the
    // layer — no reason to attach listeners the CSS has already opted out of.
    if (window.matchMedia && window.matchMedia('(hover: none), (pointer: coarse)').matches) {
        return;
    }

    Array.prototype.forEach.call(figures, function (fig) {
        var layer = fig.querySelector('[data-erp-photo-colour]');
        if (!layer) { return; }

        var queued = false;
        var x = 0;
        var y = 0;

        function paint() {
            queued = false;
            layer.style.setProperty('--erp-photo-x', x + 'px');
            layer.style.setProperty('--erp-photo-y', y + 'px');
        }

        fig.addEventListener('pointermove', function (e) {
            var box = fig.getBoundingClientRect();
            x = e.clientX - box.left;
            y = e.clientY - box.top;
            if (!queued) {
                queued = true;
                window.requestAnimationFrame(paint);
            }
        });

        // Place the circle before the fade begins, so entering the band does not
        // reveal the previous position for a frame.
        fig.addEventListener('pointerenter', function (e) {
            var box = fig.getBoundingClientRect();
            x = e.clientX - box.left;
            y = e.clientY - box.top;
            paint();
        });
    });
}());

/**
 * FAQ accordion — single-open with an eased height transition.
 *
 * The markup is native <details name="erp-faq">, which already gives
 * single-open behaviour and works with this file blocked. What it cannot do is
 * ease: the browser snaps a panel open and slams the previous one shut. So the
 * summary click is intercepted and the height animated here instead, including
 * the sibling being closed.
 *
 * Because the click is preventDefault-ed, the native single-open never runs and
 * this function owns the whole interaction — `open` is set only by the code
 * below. The `is-closing` class carries the mark and question colour during a
 * collapse, since [open] is still present until the animation finishes.
 */
(function () {
    var page = document.querySelector('.erp-page');
    if (!page) { return; }

    var list = page.querySelector('[data-erp-faq-list]');
    if (!list) { return; }

    var items = Array.prototype.slice.call(list.querySelectorAll('details'));
    if (!items.length) { return; }

    var DURATION = 320;
    var EASING   = 'cubic-bezier(.2, .7, .3, 1)';

    var reduced = window.matchMedia
        && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    function panelOf(details) {
        return details.querySelector('[data-erp-faq-panel]');
    }

    // Web Animations is the gate: without it every path below falls back to an
    // instant toggle rather than leaving a panel stuck at height 0.
    function canAnimate(panel) {
        return !reduced && panel && typeof panel.animate === 'function';
    }

    function expand(details) {
        var panel = panelOf(details);
        details.classList.remove('is-closing');
        details.open = true;

        if (!canAnimate(panel)) { return; }

        panel.classList.add('is-animating');
        // Measured after overflow is clamped, so the child's bottom margin is
        // inside the box being measured rather than collapsing out of it.
        var target = panel.scrollHeight;

        panel.animate(
            [{ height: '0px', opacity: 0 }, { height: target + 'px', opacity: 1 }],
            { duration: DURATION, easing: EASING }
        ).onfinish = function () {
            panel.classList.remove('is-animating');
        };
    }

    function collapse(details) {
        var panel = panelOf(details);

        if (!canAnimate(panel)) {
            details.open = false;
            return;
        }

        panel.classList.add('is-animating');
        var start = panel.scrollHeight;
        details.classList.add('is-closing');

        panel.animate(
            [{ height: start + 'px', opacity: 1 }, { height: '0px', opacity: 0 }],
            { duration: DURATION, easing: EASING }
        ).onfinish = function () {
            details.open = false;
            details.classList.remove('is-closing');
            panel.classList.remove('is-animating');
        };
    }

    items.forEach(function (details) {
        var summary = details.querySelector('summary');
        if (!summary) { return; }

        summary.addEventListener('click', function (event) {
            event.preventDefault();

            if (details.open && !details.classList.contains('is-closing')) {
                collapse(details);
                return;
            }

            items.forEach(function (other) {
                if (other !== details && other.open) { collapse(other); }
            });

            expand(details);
        });
    });
}());
