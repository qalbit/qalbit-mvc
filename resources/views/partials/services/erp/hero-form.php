<?php
/**
 * ERP hero form card (§1).
 *
 * Restyled onto the new system as the one dark object in the hero — near-black
 * ground, hairline underline fields, no boxes. Nothing about the CONTRACT
 * changed and nothing here may change without a server-side change too:
 *
 *  - `method`/`action` stay `post` + `/contact-us/`, so the form keeps
 *    ContactController's honeypot, reCAPTCHA, CRM push and email fallback.
 *  - Field names (name, email, phone, message) and ids (erp-*) are what the CRM
 *    maps and what main.js's validator queries by name.
 *  - `data-intl-tel-input` on the phone field is load-bearing twice over: it is
 *    the widget hook, and layouts/main.php sniffs the rendered HTML for that
 *    exact string to decide whether to ship the intl-tel-input CSS/JS at all.
 *    Renaming it silently drops the country picker from the page.
 *
 * Four fields only, deliberately: the hero form is a scoping request, not an
 * intake questionnaire.
 *
 * TWO THINGS THE PAGE CSS STILL OWES THIS CARD (both are consequences of the
 * card turning dark, and neither can be fixed from inside this file):
 *
 *  1. main.js signals field errors by toggling the Tailwind classes
 *     `border-red-400`/`border-slate-300` on the input. Those classes cannot
 *     beat the inline border below, so the JS error state needs one scoped
 *     `!important` rule in the page CSS. The server-rendered error path (below)
 *     colours its own underline and does not depend on that.
 *  2. intl-tel-input builds its widget DOM at runtime and sets no `color` of
 *     its own, so the country list inherits one. The card is dark and this
 *     wrapper hands down #f3f2f2 — on the dropdown's white ground that is
 *     white-on-white. The previous, light version of this card guarded against
 *     exactly this with a `text-black` class on the phone field's wrapper; that
 *     trick no longer works here, because main.js runs the widget with
 *     `separateDialCode: true` and the dial code it prints sits ON the dark
 *     card, so one inherited colour cannot serve both. The page CSS needs a
 *     scoped rule giving `.iti__dropdown-content` (and its search input) a dark
 *     ink or a dark ground. Until it lands, the country picker opens unreadable.
 *
 * SCOPE: included into the shared page scope — every variable is `$erpForm*`.
 *
 * @var array $erp  config('erp_page')
 */
$erpForm = $erp['form'] ?? [];

$erpFormHeading = $erpForm['heading']  ?? 'Get an ERP scoping call';
$erpFormSubLine = $erpForm['sub_line'] ?? '';
$erpFormButton  = $erpForm['button']   ?? 'Request ERP scoping call';
$erpFormMicro   = $erpForm['micro']    ?? '';

/*
 * Prefer what the controller already extracted; only read the flash directly if
 * it is not in scope.
 *
 * ServiceController reads these flashes BEFORE rendering, because it needs to
 * know whether any exist to decide against serving the page from PageCache.
 * Session::getFlash() unsets on read, so a second unconditional call here found
 * nothing and the form silently never confirmed a submission. This is the same
 * `$x ?? getFlash()` shape the shared contact partials use, for the same
 * reason — do not turn these back into bare getFlash() calls.
 */
$erpFormErrors  = $errors  ?? \App\Support\Session::getFlash('contact_errors', []);
$erpFormOld     = $old     ?? \App\Support\Session::getFlash('contact_old', []);
$erpFormSuccess = $success ?? \App\Support\Session::getFlash('contact_success');

// Card palette. #f3f2f2 is the page ground used as ink on the dark card — the
// same pairing the design uses for its inverted blocks.
//
// The invalid state borrows the accent ramp rather than importing a red: this
// page's palette ships no red (--color-accent is the brand blue #0066ff) and
// the design draws no error state at all, so a hand-picked red would be the one
// colour on the page that answers to nothing. Going through the tokens means
// the state follows the palette if the accent is ever retuned. Hue is NOT the
// signal either way — every invalid field also carries aria-invalid and a
// visible message, which is what WCAG 1.4.1 actually requires. Success is a
// neutral panel with an accent rule for the same reason: the design has no
// green.
$erpFormInk     = '#f3f2f2';
$erpFormLine    = 'color-mix(in srgb, #f3f2f2 35%, transparent)';
$erpFormErrLine = 'var(--color-accent-500)';
$erpFormErrInk  = 'var(--color-accent-300)';

$erpFormLabelCss = 'display:block;font-size:10px;font-weight:600;letter-spacing:0.16em;text-transform:uppercase;color:color-mix(in srgb, #f3f2f2 60%, transparent);margin-bottom:7px';
$erpFormErrCss   = 'margin:7px 0 0;font-size:11px;line-height:1.4;color:' . $erpFormErrInk;
$erpFormNoteCss  = 'margin:20px 0 0;padding:10px 12px;font-size:12px;line-height:1.5';

/**
 * Field styling. Only the underline colour changes between states, so the
 * error state is a one-argument switch rather than four near-identical strings.
 */
$erpFormFieldCss = static function (bool $hasError, bool $isTextarea = false) use ($erpFormInk, $erpFormLine, $erpFormErrLine): string {
    return 'width:100%;background:transparent;border:0;border-bottom:1px solid '
        . ($hasError ? $erpFormErrLine : $erpFormLine)
        . ';color:' . $erpFormInk . ';font:inherit;font-size:15px;padding:6px 0;outline:none'
        . ($isTextarea ? ';resize:vertical' : '');
};
?>

<div data-erp-form-card style="background:var(--color-text);color:<?= $erpFormInk ?>;padding:clamp(24px,2.4vw,32px)">
    <h2 style="margin:0;font-size:24px;letter-spacing:-0.02em;color:<?= $erpFormInk ?>">
        <?= htmlspecialchars($erpFormHeading, ENT_QUOTES) ?>
    </h2>

    <?php if ($erpFormSubLine !== ''): ?>
        <p style="margin:12px 0 0;font-size:13px;line-height:1.6;color:color-mix(in srgb, #f3f2f2 68%, transparent)">
            <?= htmlspecialchars($erpFormSubLine, ENT_QUOTES) ?>
        </p>
    <?php endif; ?>

    <?php /* Server-rendered outcomes (no-JS / full page POST path). The AJAX
             path in main.js prepends its own boxes inside the form. */ ?>
    <?php if ($erpFormSuccess): ?>
        <div role="status" style="<?= $erpFormNoteCss ?>;border-left:3px solid var(--color-accent);background:color-mix(in srgb, #f3f2f2 8%, transparent);color:<?= $erpFormInk ?>">
            <?= htmlspecialchars($erpFormSuccess) ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($erpFormErrors['global'])): ?>
        <div role="alert" style="<?= $erpFormNoteCss ?>;border-left:3px solid <?= $erpFormErrLine ?>;background:color-mix(in srgb, <?= $erpFormErrLine ?> 16%, transparent);color:<?= $erpFormErrInk ?>">
            <?= htmlspecialchars($erpFormErrors['global']) ?>
        </div>
    <?php endif; ?>

    <form
        data-contact-form
        data-erp-hero-form
        data-ga4-lead="erp_scoping_call"
        data-track="erp-hero-form"
        method="post"
        action="/contact-us/"
        novalidate
        aria-label="ERP scoping call enquiry form"
        data-variant="erp-hero"
        style="display:flex;flex-direction:column;gap:16px;margin-top:26px"
    >
        <input type="hidden" name="redirect_to" value="<?= htmlspecialchars($_SERVER['REQUEST_URI'] ?? '/services/erp-development/', ENT_QUOTES) ?>">

        <!-- Full name -->
        <div>
            <label for="erp-name" style="<?= $erpFormLabelCss ?>">
                Full name <span style="color:var(--color-accent-400)" aria-hidden="true">*</span>
            </label>
            <input
                type="text" id="erp-name" name="name" required maxlength="100" autocomplete="name"
                style="<?= $erpFormFieldCss(!empty($erpFormErrors['name'])) ?>"
                placeholder="Your full name" aria-required="true"
                <?= !empty($erpFormErrors['name']) ? 'aria-invalid="true" aria-describedby="erp-name-err"' : '' ?>
                value="<?= htmlspecialchars($erpFormOld['name'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
            >
            <?php if (!empty($erpFormErrors['name'])): ?>
                <p id="erp-name-err" style="<?= $erpFormErrCss ?>"><?= htmlspecialchars($erpFormErrors['name'], ENT_QUOTES) ?></p>
            <?php endif; ?>
        </div>

        <!-- Work email -->
        <div>
            <label for="erp-email" style="<?= $erpFormLabelCss ?>">
                Work email <span style="color:var(--color-accent-400)" aria-hidden="true">*</span>
            </label>
            <input
                type="email" id="erp-email" name="email" required maxlength="200" autocomplete="email"
                style="<?= $erpFormFieldCss(!empty($erpFormErrors['email'])) ?>"
                placeholder="you@company.com" aria-required="true"
                <?= !empty($erpFormErrors['email']) ? 'aria-invalid="true" aria-describedby="erp-email-err"' : '' ?>
                value="<?= htmlspecialchars($erpFormOld['email'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
            >
            <?php if (!empty($erpFormErrors['email'])): ?>
                <p id="erp-email-err" style="<?= $erpFormErrCss ?>"><?= htmlspecialchars($erpFormErrors['email'], ENT_QUOTES) ?></p>
            <?php endif; ?>
        </div>

        <?php /* Phone / WhatsApp. The design mocks a static "+91" prefix; we do
                 not render one — intl-tel-input injects a real country selector
                 into this field, and a hard-coded dial code would sit next to it
                 and lie to every visitor outside India. See note 2 in the file
                 docblock for the CSS this widget needs on a dark card. */ ?>
        <div>
            <label for="erp-phone" style="<?= $erpFormLabelCss ?>">
                Phone / WhatsApp <span style="color:var(--color-accent-400)" aria-hidden="true">*</span>
            </label>
            <input
                type="tel" id="erp-phone" name="phone" required inputmode="tel" maxlength="20"
                autocomplete="tel" data-intl-tel-input
                style="<?= $erpFormFieldCss(!empty($erpFormErrors['phone'])) ?>"
                placeholder="e.g. +971 50 555 1234" aria-required="true"
                <?= !empty($erpFormErrors['phone']) ? 'aria-invalid="true" aria-describedby="erp-phone-err"' : '' ?>
                value="<?= htmlspecialchars($erpFormOld['phone'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
            >
            <?php if (!empty($erpFormErrors['phone'])): ?>
                <p id="erp-phone-err" style="<?= $erpFormErrCss ?>"><?= htmlspecialchars($erpFormErrors['phone'], ENT_QUOTES) ?></p>
            <?php endif; ?>
        </div>

        <!-- What's breaking today? -->
        <div>
            <label for="erp-message" style="<?= $erpFormLabelCss ?>">
                What’s breaking today? <span style="color:var(--color-accent-400)" aria-hidden="true">*</span>
            </label>
            <textarea
                id="erp-message" name="message" rows="3" required maxlength="5000"
                style="<?= $erpFormFieldCss(!empty($erpFormErrors['message']), true) ?>"
                placeholder="How do orders, stock and purchasing move through your business today?"
                aria-required="true"
                <?= !empty($erpFormErrors['message']) ? 'aria-invalid="true" aria-describedby="erp-message-err"' : '' ?>
            ><?= htmlspecialchars($erpFormOld['message'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
            <?php if (!empty($erpFormErrors['message'])): ?>
                <p id="erp-message-err" style="<?= $erpFormErrCss ?>"><?= htmlspecialchars($erpFormErrors['message'], ENT_QUOTES) ?></p>
            <?php endif; ?>
        </div>

        <!-- Honeypot: bots fill this, humans never see it -->
        <input type="text" name="website" value="" tabindex="-1" autocomplete="off" aria-hidden="true" style="position:absolute;left:-9999px;width:1px;height:1px;overflow:hidden">
        <input type="hidden" name="recaptcha_token" value="">
        <input type="hidden" name="lead_from" value="lead_erp_hero">
        <input type="hidden" name="lead_source" value="<?= htmlspecialchars(lead_param('source'), ENT_QUOTES) ?>">
        <input type="hidden" name="lead_topic" value="<?= htmlspecialchars(lead_param('topic') ?: 'erp-development', ENT_QUOTES) ?>">

        <button type="submit" class="erp-btn erp-btn-primary" style="width:100%;justify-content:space-between;font-size:15px;padding:16px 18px;margin-top:6px">
            <?= htmlspecialchars($erpFormButton, ENT_QUOTES) ?> <span aria-hidden="true">→</span>
        </button>

        <?php if ($erpFormMicro !== ''): ?>
            <p style="margin:0;font-size:11px;line-height:1.5;color:color-mix(in srgb, #f3f2f2 55%, transparent)">
                <?= htmlspecialchars($erpFormMicro, ENT_QUOTES) ?>
            </p>
        <?php endif; ?>
    </form>
</div>
