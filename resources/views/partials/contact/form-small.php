<?php
// Reusable small contact form (page block, footer, popup).
// Expected variables:
// - $variant   : 'page', 'footer', 'popup' (for CSS tweaks / GTM label)
// - $action    : form action URL (default /contact-us/)
// - $redirectTo: where to go after submit (default current URL)

$variant    = $variant    ?? 'page';
$action     = $action     ?? '/contact-us/';
$redirectTo = $redirectTo ?? ($_SERVER['REQUEST_URI'] ?? '/');
$leadFrom   = $leadFrom   ?? 'lead_contact_page';

$errors  = $errors  ?? \App\Support\Session::getFlash('contact_errors', []);
$old     = $old     ?? \App\Support\Session::getFlash('contact_old', []);
$success = $success ?? \App\Support\Session::getFlash('contact_success');
?>

<div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
    <!-- Header / reassurance copy -->
    <div class="mb-4 space-y-1">
        <h3 class="flex flex-col font-semibold">
            <span class="text-md text-slate-800">
                Tell us briefly
            </span>
            <span class="text-2xl font-bold text-primary-950">
                About your project
            </span>
        </h3>
    </div>

    <?php if ($success): ?>
        <div class="mb-4 rounded-md border border-green-200 bg-green-50 px-4 py-3 text-xs text-green-800">
            <?= htmlspecialchars($success) ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($errors['global'])): ?>
        <div class="mb-4 rounded-md border border-red-200 bg-red-50 px-4 py-3 text-xs text-red-800">
            <?= htmlspecialchars($errors['global']) ?>
        </div>
    <?php endif; ?>

    <form
        data-contact-form
        data-track="contact-form"
        method="post"
        action="<?= htmlspecialchars($action) ?>"
        class="space-y-3"
        novalidate
        aria-label="Project enquiry form"
        data-variant="<?= htmlspecialchars($variant) ?>"
    >
        <input type="hidden" name="redirect_to" value="<?= htmlspecialchars($redirectTo) ?>">
        
        <!-- Full name -->
        <div class="space-y-1.5">
            <label
                for="contact-name"
                class="block text-xs font-medium text-slate-800"
            >
                Full name <span class="text-red-500">*</span>
            </label>
            <input
                type="text"
                id="contact-name"
                name="name"
                required
                autocomplete="name"
                class="block w-full rounded-md border <?php echo !empty($errors['name']) ? 'border-red-400' : 'border-slate-300'; ?> bg-white px-3 py-3 text-sm text-slate-900 placeholder:text-slate-400 shadow-inner focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary"
                placeholder="Your full name"
                aria-required="true"
                value="<?= htmlspecialchars($old['name'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
            >
            <?php if (!empty($errors['name'])): ?>
                <p class="text-[11px] text-red-600">
                    <?= htmlspecialchars($errors['name'], ENT_QUOTES, 'UTF-8') ?>
                </p>
            <?php endif; ?>
        </div>

        <!-- Phone -->
        <div class="space-y-1.5 text-black">
            <label
                for="contact-phone-inline"
                class="block text-xs font-medium text-slate-800"
            >
                Phone / WhatsApp <span class="text-red-500">*</span>
            </label>
            <input
                type="tel"
                id="contact-phone-inline"
                name="phone"
                inputmode="tel"
                autocomplete="tel"
                data-intl-tel-input
                class="block w-full rounded-md border <?php echo !empty($errors['phone']) ? 'border-red-400' : 'border-slate-300'; ?> bg-white px-3 py-3 text-sm text-slate-900 placeholder:text-slate-400 shadow-inner focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary"
                placeholder="e.g. +1 415 555 1234"
                aria-describedby="contact-phone-help"
                value="<?= htmlspecialchars($old['phone'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
            >
            <?php if (!empty($errors['phone'])): ?>
                <p class="text-[11px] text-red-600">
                    <?= htmlspecialchars($errors['phone'], ENT_QUOTES, 'UTF-8') ?>
                </p>
            <?php endif; ?>
        </div>

        <!-- Email -->
        <div class="space-y-1.5">
            <label
                for="contact-email"
                class="block text-xs font-medium text-slate-800"
            >
                Work email <span class="text-red-500">*</span>
            </label>
            <input
                type="email"
                id="contact-email"
                name="email"
                required
                autocomplete="email"
                class="block w-full rounded-md border <?php echo !empty($errors['email']) ? 'border-red-400' : 'border-slate-300'; ?> bg-white px-3 py-3 text-sm text-slate-900 placeholder:text-slate-400 shadow-inner focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary"
                placeholder="you@company.com"
                aria-required="true"
                value="<?= htmlspecialchars($old['email'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
            >
            <?php if (!empty($errors['email'])): ?>
                <p class="text-[11px] text-red-600">
                    <?= htmlspecialchars($errors['email'], ENT_QUOTES, 'UTF-8') ?>
                </p>
            <?php endif; ?>
        </div>

        <!-- Project details -->
        <div class="space-y-1.5">
            <label
                for="contact-message"
                class="block text-xs font-medium text-slate-800"
            >
                Short project overview <span class="text-red-500">*</span>
            </label>
            <textarea
                id="contact-message"
                name="message"
                rows="4"
                required
                class="block w-full rounded-md border <?php echo !empty($errors['message']) ? 'border-red-400' : 'border-slate-300'; ?> bg-white px-3 py-3 text-sm text-slate-900 placeholder:text-slate-400 shadow-inner focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary"
                placeholder="Tell us about your product, current challenges, tech stack and what success would look like for you."
                aria-required="true"
            ><?= htmlspecialchars($old['message'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
            <?php if (!empty($errors['message'])): ?>
                <p class="text-[11px] text-red-600">
                    <?= htmlspecialchars($errors['message'], ENT_QUOTES, 'UTF-8') ?>
                </p>
            <?php endif; ?>
        </div>
        
        <input type="hidden" name="recaptcha_token" id="recaptcha_token" value="">
        <input type="hidden" name="lead_from" id="lead_from" value="<?= $leadFrom ?>">
        <input type="hidden" name="lead_source" id="lead_source" value="<?= $_GET['source'] ?? 'general' ?>">
        <input type="hidden" name="lead_topic" id="lead_topic" value="<?= $_GET['topic'] ?? 'general' ?>">
        
        <button
            type="submit"
            class="inline-flex w-full items-center justify-center rounded-full bg-slate-900 px-4 py-3.5 text-sm font-medium text-white hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-slate-900 focus:ring-offset-2 focus:ring-offset-white"
        >
            Send message
        </button>

        <p class="pt-1 text-[12px] leading-snug text-slate-400">
            By submitting, you agree to be contacted by QalbIT regarding this enquiry.
            We do not sell or share your details with third parties.
        </p>
    </form>
</div>
