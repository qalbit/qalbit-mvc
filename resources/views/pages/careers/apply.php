<?php
/**
 * Careers – Apply Page
 *
 * Expects:
 * - $seo          (array)
 * - $selectedRole (array|null)
 * - $roleSlug     (string|null)
 * - $allRoles     (array)
 * - $errors       (array) – optional
 * - $old          (array) – optional
 * - $success      (string|null) – optional
 */

$selectedRole = $selectedRole ?? null;
$roleSlug     = $roleSlug ?? null;
$errors       = $errors ?? [];
$old          = $old ?? [];
$success      = $success ?? null;

$roleTitle = $selectedRole['title']
    ?? $selectedRole['name']
    ?? ($roleSlug ? ucfirst(str_replace('-', ' ', $roleSlug)) : 'Any suitable role');

$roleTeam       = $selectedRole['team_label']       ?? ($selectedRole['team'] ?? null);
$roleLocation   = $selectedRole['location_label']   ?? ($selectedRole['location'] ?? null);
$roleExperience = $selectedRole['experience_label'] ?? ($selectedRole['experience'] ?? null);

$formAction = '/career/apply/';

// Redirect URL (preserves role query)
$redirectTo = '/career/apply/';
if ($roleSlug) {
    $redirectTo .= '?role=' . urlencode($roleSlug);
}

// Base classes for inputs
$baseInputClasses = 'block w-full rounded-xl border bg-white px-3 py-2 text-xs sm:text-sm text-slate-900 shadow-sm focus:ring-1 ';
?>

<section
    id="careers-apply"
    class="relative bg-slate-50 text-slate-900 py-10 sm:py-14 lg:py-16"
    data-careers-section="apply"
>
    <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8 space-y-6 sm:space-y-8">
        <!-- Breadcrumbs -->
        <nav class="text-xs font-medium text-slate-600" aria-label="Breadcrumb">
            <ol class="flex flex-wrap items-center gap-1">
                <li>
                    <a href="/" class="hover:text-sky-500 transition-colors">Home</a>
                </li>
                <li class="text-slate-400">/</li>
                <li>
                    <a href="/career/" class="hover:text-sky-500 transition-colors">Careers</a>
                </li>
                <li class="text-slate-400">/</li>
                <li aria-current="page" class="text-slate-900">
                    Apply
                </li>
            </ol>
        </nav>

        <!-- Heading + role summary -->
        <header class="space-y-3">
            <span
                class="inline-flex items-center rounded-full border border-slate-200 bg-white/80 px-3 py-0.5
                       text-[11px] font-semibold uppercase tracking-[0.16em] text-slate-600"
            >
                Apply to QalbIT
            </span>

            <div class="space-y-2">
                <h1 class="text-xl sm:text-2xl md:text-[26px] font-semibold tracking-tight text-slate-900">
                    <?= htmlspecialchars('Apply for ' . $roleTitle, ENT_QUOTES); ?>
                </h1>

                <p class="max-w-2xl text-sm text-slate-600">
                    Share your experience, skills and context. We review every application and reach out when there is a strong match with current or upcoming roles.
                </p>
            </div>

            <?php if ($selectedRole): ?>
                <div class="flex flex-wrap gap-2 text-[11px] text-slate-600">
                    <?php if ($roleTeam): ?>
                        <span class="inline-flex items-center rounded-full bg-slate-100 px-2.5 py-0.5 border border-slate-200">
                            <span class="h-1.5 w-1.5 rounded-full bg-sky-500 mr-1.5"></span>
                            <?= htmlspecialchars($roleTeam, ENT_QUOTES); ?>
                        </span>
                    <?php endif; ?>
                    <?php if ($roleLocation): ?>
                        <span class="inline-flex items-center rounded-full bg-slate-100 px-2.5 py-0.5 border border-slate-200">
                            <?= htmlspecialchars($roleLocation, ENT_QUOTES); ?>
                        </span>
                    <?php endif; ?>
                    <?php if ($roleExperience): ?>
                        <span class="inline-flex items-center rounded-full bg-slate-100 px-2.5 py-0.5 border border-slate-200">
                            <?= htmlspecialchars($roleExperience, ENT_QUOTES); ?>
                        </span>
                    <?php endif; ?>
                    <a
                        href="/career/"
                        class="inline-flex items-center gap-1 text-[11px] font-medium text-sky-700 hover:text-sky-600 ml-auto"
                    >
                        View all openings
                        <span aria-hidden="true">→</span>
                    </a>
                </div>
            <?php else: ?>
                <div class="flex flex-wrap items-center gap-2 text-[11px] text-slate-600">
                    <span>No specific role selected.</span>
                    <a
                        href="/career/"
                        class="inline-flex items-center gap-1 text-[11px] font-medium text-sky-700 hover:text-sky-600"
                    >
                        Browse current openings
                        <span aria-hidden="true">→</span>
                    </a>
                </div>
            <?php endif; ?>
        </header>

        <!-- Global success / error messages -->
        <?php if (!empty($success)): ?>
            <div class="rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-xs text-emerald-800">
                <?= htmlspecialchars($success, ENT_QUOTES); ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($errors)): ?>
            <div class="rounded-2xl border border-rose-200 bg-rose-50 px-4 py-3 text-xs text-rose-800">
                <p class="font-semibold">There were some problems with your application.</p>
                <?php if (!empty($errors['global'])): ?>
                    <p class="mt-1">
                        <?= htmlspecialchars($errors['global'], ENT_QUOTES); ?>
                    </p>
                <?php else: ?>
                    <p class="mt-1">
                        Please review the highlighted fields below and try again.
                    </p>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <!-- Form card -->
        <div
            class="rounded-3xl border border-slate-200 bg-white/90 px-4 py-6 sm:px-6 sm:py-7 lg:px-7 lg:py-8 shadow-soft"
        >
            <form
                action="<?= htmlspecialchars($formAction, ENT_QUOTES); ?>"
                method="post"
                enctype="multipart/form-data"
                class="space-y-6"
                data-contact-form
                data-track="contact-form"
            >
                <!-- Preserve selected role -->
                <input
                    type="hidden"
                    name="role_slug"
                    value="<?= htmlspecialchars($roleSlug ?? '', ENT_QUOTES); ?>"
                >

                <!-- Redirect back to the same apply URL (with role param if present) -->
                <input type="hidden" name="redirect_to" value="<?= htmlspecialchars($redirectTo, ENT_QUOTES); ?>">

                <input type="hidden" name="recaptcha_token" id="recaptcha_token" value="">

                <div class="grid gap-4 sm:grid-cols-2">
                    <!-- Full name -->
                    <div class="space-y-1.5">
                        <label for="full_name" class="block text-xs font-medium text-slate-700">
                            Full name <span class="text-rose-500">*</span>
                        </label>
                        <input
                            type="text"
                            id="full_name"
                            name="full_name"
                            required
                            autocomplete="name"
                            value="<?= htmlspecialchars($old['full_name'] ?? '', ENT_QUOTES); ?>"
                            class="<?= $baseInputClasses . (!empty($errors['full_name'])
                                ? 'border-rose-400 focus:border-rose-500 focus:ring-rose-500'
                                : 'border-slate-300 focus:border-sky-500 focus:ring-sky-500'); ?>"
                        >
                        <?php if (!empty($errors['full_name'])): ?>
                            <p class="mt-1 text-[11px] text-rose-600">
                                <?= htmlspecialchars($errors['full_name'], ENT_QUOTES); ?>
                            </p>
                        <?php endif; ?>
                    </div>

                    <!-- Email -->
                    <div class="space-y-1.5">
                        <label for="email" class="block text-xs font-medium text-slate-700">
                            Email <span class="text-rose-500">*</span>
                        </label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            required
                            autocomplete="email"
                            value="<?= htmlspecialchars($old['email'] ?? '', ENT_QUOTES); ?>"
                            class="<?= $baseInputClasses . (!empty($errors['email'])
                                ? 'border-rose-400 focus:border-rose-500 focus:ring-rose-500'
                                : 'border-slate-300 focus:border-sky-500 focus:ring-sky-500'); ?>"
                        >
                        <?php if (!empty($errors['email'])): ?>
                            <p class="mt-1 text-[11px] text-rose-600">
                                <?= htmlspecialchars($errors['email'], ENT_QUOTES); ?>
                            </p>
                        <?php endif; ?>
                    </div>

                    <!-- Phone -->
                    <div class="space-y-1.5">
                        <label for="phone" class="block text-xs font-medium text-slate-700">
                            Phone / WhatsApp <span class="text-rose-500">*</span>
                        </label>
                        <input
                            type="tel"
                            id="phone"
                            name="phone"
                            required
                            autocomplete="tel"
                            value="<?= htmlspecialchars($old['phone'] ?? '', ENT_QUOTES); ?>"
                            class="<?= $baseInputClasses . (!empty($errors['phone'])
                                ? 'border-rose-400 focus:border-rose-500 focus:ring-rose-500'
                                : 'border-slate-300 focus:border-sky-500 focus:ring-sky-500'); ?>"
                        >
                        <?php if (!empty($errors['phone'])): ?>
                            <p class="mt-1 text-[11px] text-rose-600">
                                <?= htmlspecialchars($errors['phone'], ENT_QUOTES); ?>
                            </p>
                        <?php endif; ?>
                    </div>

                    <!-- Location -->
                    <div class="space-y-1.5">
                        <label for="location" class="block text-xs font-medium text-slate-700">
                            Current city &amp; country <span class="text-rose-500">*</span>
                        </label>
                        <input
                            type="text"
                            id="location"
                            name="location"
                            required
                            value="<?= htmlspecialchars($old['location'] ?? '', ENT_QUOTES); ?>"
                            class="<?= $baseInputClasses . (!empty($errors['location'])
                                ? 'border-rose-400 focus:border-rose-500 focus:ring-rose-500'
                                : 'border-slate-300 focus:border-sky-500 focus:ring-sky-500'); ?>"
                        >
                        <?php if (!empty($errors['location'])): ?>
                            <p class="mt-1 text-[11px] text-rose-600">
                                <?= htmlspecialchars($errors['location'], ENT_QUOTES); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="grid gap-4 sm:grid-cols-3">
                    <!-- Experience -->
                    <div class="space-y-1.5">
                        <label for="experience" class="block text-xs font-medium text-slate-700">
                            Total experience (years) <span class="text-rose-500">*</span>
                        </label>
                        <input
                            type="number"
                            min="0"
                            step="0.5"
                            id="experience"
                            name="experience"
                            required
                            value="<?= htmlspecialchars($old['experience'] ?? '', ENT_QUOTES); ?>"
                            class="<?= $baseInputClasses . (!empty($errors['experience'])
                                ? 'border-rose-400 focus:border-rose-500 focus:ring-rose-500'
                                : 'border-slate-300 focus:border-sky-500 focus:ring-sky-500'); ?>"
                        >
                        <?php if (!empty($errors['experience'])): ?>
                            <p class="mt-1 text-[11px] text-rose-600">
                                <?= htmlspecialchars($errors['experience'], ENT_QUOTES); ?>
                            </p>
                        <?php endif; ?>
                    </div>

                    <!-- Current / last role -->
                    <div class="space-y-1.5">
                        <label for="current_role" class="block text-xs font-medium text-slate-700">
                            Current / last role
                        </label>
                        <input
                            type="text"
                            id="current_role"
                            name="current_role"
                            value="<?= htmlspecialchars($old['current_role'] ?? '', ENT_QUOTES); ?>"
                            class="<?= $baseInputClasses . (!empty($errors['current_role'])
                                ? 'border-rose-400 focus:border-rose-500 focus:ring-rose-500'
                                : 'border-slate-300 focus:border-sky-500 focus:ring-sky-500'); ?>"
                        >
                        <?php if (!empty($errors['current_role'])): ?>
                            <p class="mt-1 text-[11px] text-rose-600">
                                <?= htmlspecialchars($errors['current_role'], ENT_QUOTES); ?>
                            </p>
                        <?php endif; ?>
                    </div>

                    <!-- Notice period -->
                    <div class="space-y-1.5">
                        <label for="notice_period" class="block text-xs font-medium text-slate-700">
                            Notice period
                        </label>
                        <input
                            type="text"
                            id="notice_period"
                            name="notice_period"
                            placeholder="e.g. Immediate / 30 days"
                            value="<?= htmlspecialchars($old['notice_period'] ?? '', ENT_QUOTES); ?>"
                            class="<?= $baseInputClasses . (!empty($errors['notice_period'])
                                ? 'border-rose-400 focus:border-rose-500 focus:ring-rose-500'
                                : 'border-slate-300 focus:border-sky-500 focus:ring-sky-500'); ?>"
                        >
                        <?php if (!empty($errors['notice_period'])): ?>
                            <p class="mt-1 text-[11px] text-rose-600">
                                <?= htmlspecialchars($errors['notice_period'], ENT_QUOTES); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="grid gap-4 sm:grid-cols-2">
                    <!-- LinkedIn / portfolio -->
                    <div class="space-y-1.5">
                        <label for="linkedin" class="block text-xs font-medium text-slate-700">
                            LinkedIn or portfolio URL
                        </label>
                        <input
                            type="url"
                            id="linkedin"
                            name="linkedin"
                            placeholder="https://"
                            value="<?= htmlspecialchars($old['linkedin'] ?? '', ENT_QUOTES); ?>"
                            class="<?= $baseInputClasses . (!empty($errors['linkedin'])
                                ? 'border-rose-400 focus:border-rose-500 focus:ring-rose-500'
                                : 'border-slate-300 focus:border-sky-500 focus:ring-sky-500'); ?>"
                        >
                        <?php if (!empty($errors['linkedin'])): ?>
                            <p class="mt-1 text-[11px] text-rose-600">
                                <?= htmlspecialchars($errors['linkedin'], ENT_QUOTES); ?>
                            </p>
                        <?php endif; ?>
                    </div>

                    <!-- GitHub / code samples -->
                    <div class="space-y-1.5">
                        <label for="github" class="block text-xs font-medium text-slate-700">
                            GitHub / code samples
                        </label>
                        <input
                            type="url"
                            id="github"
                            name="github"
                            placeholder="https://"
                            value="<?= htmlspecialchars($old['github'] ?? '', ENT_QUOTES); ?>"
                            class="<?= $baseInputClasses . (!empty($errors['github'])
                                ? 'border-rose-400 focus:border-rose-500 focus:ring-rose-500'
                                : 'border-slate-300 focus:border-sky-500 focus:ring-sky-500'); ?>"
                        >
                        <?php if (!empty($errors['github'])): ?>
                            <p class="mt-1 text-[11px] text-rose-600">
                                <?= htmlspecialchars($errors['github'], ENT_QUOTES); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Expected compensation -->
                <div class="grid gap-4 sm:grid-cols-2">
                    <div class="space-y-1.5">
                        <label for="current_ctc" class="block text-xs font-medium text-slate-700">
                            Current CTC (optional)
                        </label>
                        <input
                            type="text"
                            id="current_ctc"
                            name="current_ctc"
                            placeholder="e.g. 6 LPA"
                            value="<?= htmlspecialchars($old['current_ctc'] ?? '', ENT_QUOTES); ?>"
                            class="<?= $baseInputClasses . (!empty($errors['current_ctc'])
                                ? 'border-rose-400 focus:border-rose-500 focus:ring-rose-500'
                                : 'border-slate-300 focus:border-sky-500 focus:ring-sky-500'); ?>"
                        >
                        <?php if (!empty($errors['current_ctc'])): ?>
                            <p class="mt-1 text-[11px] text-rose-600">
                                <?= htmlspecialchars($errors['current_ctc'], ENT_QUOTES); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                    <div class="space-y-1.5">
                        <label for="expected_ctc" class="block text-xs font-medium text-slate-700">
                            Expected CTC (optional)
                        </label>
                        <input
                            type="text"
                            id="expected_ctc"
                            name="expected_ctc"
                            placeholder="e.g. 8.5 LPA"
                            value="<?= htmlspecialchars($old['expected_ctc'] ?? '', ENT_QUOTES); ?>"
                            class="<?= $baseInputClasses . (!empty($errors['expected_ctc'])
                                ? 'border-rose-400 focus:border-rose-500 focus:ring-rose-500'
                                : 'border-slate-300 focus:border-sky-500 focus:ring-sky-500'); ?>"
                        >
                        <?php if (!empty($errors['expected_ctc'])): ?>
                            <p class="mt-1 text-[11px] text-rose-600">
                                <?= htmlspecialchars($errors['expected_ctc'], ENT_QUOTES); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Why QalbIT / cover -->
                <div class="space-y-1.5">
                    <label for="about" class="block text-xs font-medium text-slate-700">
                        Why do you want to work at QalbIT? <span class="text-rose-500">*</span>
                    </label>
                    <textarea
                        id="about"
                        name="about"
                        required
                        rows="4"
                        class="<?= $baseInputClasses . 'min-h-[6rem] ' . (!empty($errors['about'])
                            ? 'border-rose-400 focus:border-rose-500 focus:ring-rose-500'
                            : 'border-slate-300 focus:border-sky-500 focus:ring-sky-500'); ?>"
                        placeholder="A short note about what you are looking for, what you enjoy working on, and why you think QalbIT is a good fit."
                    ><?= htmlspecialchars($old['about'] ?? '', ENT_QUOTES); ?></textarea>
                    <?php if (!empty($errors['about'])): ?>
                        <p class="mt-1 text-[11px] text-rose-600">
                            <?= htmlspecialchars($errors['about'], ENT_QUOTES); ?>
                        </p>
                    <?php endif; ?>
                </div>

                <!-- Resume upload -->
                <div class="space-y-1.5">
                    <label for="resume" class="block text-xs font-medium text-slate-700">
                        Resume / CV <span class="text-rose-500">*</span>
                    </label>
                    <input
                        type="file"
                        id="resume"
                        name="resume"
                        required
                        accept=".pdf,.doc,.docx"
                        class="block w-full text-xs text-slate-700 file:mr-3 file:rounded-full file:border-0 file:bg-sky-600 file:px-3 file:py-1.5 file:text-[11px] file:font-semibold file:uppercase file:tracking-[0.16em] file:text-slate-50 hover:file:bg-sky-500"
                    >
                    <p class="mt-1 text-[11px] text-slate-500">
                        Upload a PDF or DOC/DOCX file. Keep the filename simple (e.g. <strong>yourname-resume.pdf</strong>).
                    </p>
                    <?php if (!empty($errors['resume'])): ?>
                        <p class="mt-1 text-[11px] text-rose-600">
                            <?= htmlspecialchars($errors['resume'], ENT_QUOTES); ?>
                        </p>
                    <?php endif; ?>
                </div>

                <!-- Consent / submit -->
                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <p class="max-w-md text-[11px] text-slate-500">
                        By submitting this form, you agree that we can store your details and contact you about current or future opportunities at QalbIT.
                    </p>

                    <button
                        type="submit"
                        class="inline-flex items-center justify-center rounded-full bg-sky-600 px-5 py-2.5 text-[12px] font-semibold uppercase tracking-[0.16em] text-slate-50 shadow-sm hover:bg-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-1 focus:ring-offset-slate-50"
                    >
                        Submit application
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
