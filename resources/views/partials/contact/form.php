<div class="rounded-xl border bg-white p-6 shadow-sm">
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
        action="/contact-us/"
        method="post"
        class="space-y-4"
        novalidate
        data-track="contact-form"
    >
        <input type="hidden" name="_token" value="<?= htmlspecialchars($csrfToken) ?>">

        <div class="space-y-1">
            <label for="name" class="text-sm font-medium text-slate-700">Full Name</label>
            <input
                id="name"
                name="name"
                type="text"
                class="block w-full rounded-md border <?= !empty($errors['name']) ? 'border-red-400' : 'border-slate-300' ?> px-3 py-2 text-sm text-slate-900 focus:border-slate-500 focus:outline-none focus:ring-1 focus:ring-slate-500"
                placeholder="Your name"
                value="<?= htmlspecialchars($old['name'] ?? '') ?>"
            >
            <?php if (!empty($errors['name'])): ?>
                <p class="mt-1 text-xs text-red-600">
                    <?= htmlspecialchars($errors['name']) ?>
                </p>
            <?php endif; ?>
        </div>

        <div class="space-y-1">
            <label for="email" class="text-sm font-medium text-slate-700">Email</label>
            <input
                id="email"
                name="email"
                type="email"
                class="block w-full rounded-md border <?= !empty($errors['email']) ? 'border-red-400' : 'border-slate-300' ?> px-3 py-2 text-sm text-slate-900 focus:border-slate-500 focus:outline-none focus:ring-1 focus:ring-slate-500"
                placeholder="you@example.com"
                value="<?= htmlspecialchars($old['email'] ?? '') ?>"
            >
            <?php if (!empty($errors['email'])): ?>
                <p class="mt-1 text-xs text-red-600">
                    <?= htmlspecialchars($errors['email']) ?>
                </p>
            <?php endif; ?>
        </div>

        <div class="space-y-1">
            <label for="budget" class="text-sm font-medium text-slate-700">Approx. Budget (optional)</label>
            <input
                id="budget"
                name="budget"
                type="text"
                class="block w-full rounded-md border border-slate-300 px-3 py-2 text-sm text-slate-900 focus:border-slate-500 focus:outline-none focus:ring-1 focus:ring-slate-500"
                placeholder="e.g. $10k–$25k"
                value="<?= htmlspecialchars($old['budget'] ?? '') ?>"
            >
        </div>

        <div class="space-y-1">
            <label for="message" class="text-sm font-medium text-slate-700">Project Details</label>
            <textarea
                id="message"
                name="message"
                rows="5"
                class="block w-full rounded-md border <?= !empty($errors['message']) ? 'border-red-400' : 'border-slate-300' ?> px-3 py-2 text-sm text-slate-900 focus:border-slate-500 focus:outline-none focus:ring-1 focus:ring-slate-500"
                placeholder="Short description of your idea, timeline and goals."
            ><?= htmlspecialchars($old['message'] ?? '') ?></textarea>
            <?php if (!empty($errors['message'])): ?>
                <p class="mt-1 text-xs text-red-600">
                    <?= htmlspecialchars($errors['message']) ?>
                </p>
            <?php endif; ?>
        </div>

        <button
            type="submit"
            class="inline-flex items-center justify-center rounded-md bg-slate-900 px-4 py-2.5 text-sm font-medium text-white hover:bg-slate-800"
        >
            Submit Enquiry
        </button>
    </form>
</div>
<?php if (config('analytics.ga4_measurement_id')): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var form = document.querySelector('form[data-track="contact-form"]');
            if (!form) return;

            form.addEventListener('submit', function () {
                if (typeof gtag === 'function') {
                    gtag('event', 'contact_form_submit', {
                        event_category: 'Contact',
                        event_label: window.location.pathname
                    });
                }
            });
        });
    </script>
<?php endif; ?>