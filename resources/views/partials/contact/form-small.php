<?php
// Reusable small contact form (page block, footer, popup).
// Expected variables:
// - $variant   : 'page', 'footer', 'popup' (for CSS tweaks / GTM label)
// - $action    : form action URL (default /contact-us/)
// - $redirectTo: where to go after submit (default current URL)

$variant    = $variant    ?? 'page';
$action     = $action     ?? '/contact-us/';
$redirectTo = $redirectTo ?? ($_SERVER['REQUEST_URI'] ?? '/');

$errors  = $errors  ?? \App\Support\Session::getFlash('contact_errors', []);
$old     = $old     ?? \App\Support\Session::getFlash('contact_old', []);
$success = $success ?? \App\Support\Session::getFlash('contact_success');

$recaptchaConfig   = config('recaptcha', []);
$recaptchaSiteKey  = $recaptchaConfig['site_key'] ?? '';
$formIdPrefix      = 'contact-' . preg_replace('/[^a-z0-9_-]/i', '', $variant);
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
        action="<?= htmlspecialchars($action) ?>"
        method="post"
        class="space-y-3"
        data-track="contact-form"
        data-variant="<?= htmlspecialchars($variant) ?>"
        data-contact-form
        novalidate
    >
        <input type="hidden" name="redirect_to" value="<?= htmlspecialchars($redirectTo) ?>">
        <input type="hidden" name="source" value="<?= htmlspecialchars($variant) ?>">
        <input type="hidden" name="recaptcha_token" value="">

        <div class="space-y-1">
            <label class="text-sm font-medium text-slate-700">Name</label>
            <input
                name="name"
                type="text"
                class="block w-full rounded border <?= !empty($errors['name']) ? 'border-red-400' : 'border-slate-300' ?> px-3 py-3.5 text-md text-slate-900 focus:border-slate-500 focus:outline-none focus:ring-1 focus:ring-slate-500"
                placeholder="Your name"
                value="<?= htmlspecialchars($old['name'] ?? '') ?>"
            >
            <?php if (!empty($errors['name'])): ?>
                <p class="mt-1 text-[11px] text-red-600"><?= htmlspecialchars($errors['name']) ?></p>
            <?php endif; ?>
        </div>

        <div class="space-y-1">
            <label class="text-sm font-medium text-slate-700">Email</label>
            <input
                name="email"
                type="email"
                class="block w-full rounded border <?= !empty($errors['email']) ? 'border-red-400' : 'border-slate-300' ?> px-3 py-3.5 text-md text-slate-900 focus:border-slate-500 focus:outline-none focus:ring-1 focus:ring-slate-500"
                placeholder="you@example.com"
                value="<?= htmlspecialchars($old['email'] ?? '') ?>"
            >
            <?php if (!empty($errors['email'])): ?>
                <p class="mt-1 text-[11px] text-red-600"><?= htmlspecialchars($errors['email']) ?></p>
            <?php endif; ?>
        </div>

        <div class="space-y-1">
            <label class="text-sm font-medium text-slate-700">Short project overview</label>
            <textarea
                name="message"
                rows="3"
                class="block w-full rounded border <?= !empty($errors['message']) ? 'border-red-400' : 'border-slate-300' ?> px-3 py-3.5 text-md text-slate-900 focus:border-slate-500 focus:outline-none focus:ring-1 focus:ring-slate-500"
                placeholder="Timeline, budget range or main challenge"
            ><?= htmlspecialchars($old['message'] ?? '') ?></textarea>
            <?php if (!empty($errors['message'])): ?>
                <p class="mt-1 text-[11px] text-red-600"><?= htmlspecialchars($errors['message']) ?></p>
            <?php endif; ?>
        </div>

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
