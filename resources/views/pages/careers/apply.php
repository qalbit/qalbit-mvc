<?php
/**
 * Careers – Apply Page
 *
 * Expects:
 * - $seo          (array)
 * - $selectedRole (array|null)
 * - $roleSlug     (string|null)
 * - $allRoles     (array)
 */

$selectedRole = $selectedRole ?? null;
$roleSlug     = $roleSlug ?? null;

$roleTitle = $selectedRole['title']
    ?? $selectedRole['name']
    ?? ($roleSlug ? ucfirst(str_replace('-', ' ', $roleSlug)) : 'Any suitable role');

$roleTeam = $selectedRole['team_label'] ?? ($selectedRole['team'] ?? null);
$roleLocation = $selectedRole['location_label'] ?? ($selectedRole['location'] ?? null);
$roleExperience = $selectedRole['experience_label'] ?? ($selectedRole['experience'] ?? null);

$formAction = '/apply/'; // or '/apply/submit' if you prefer a dedicated POST route
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

        <!-- Form card -->
        <div
            class="rounded-3xl border border-slate-200 bg-white/90 px-4 py-6 sm:px-6 sm:py-7 lg:px-7 lg:py-8 shadow-soft"
        >
            <form
                action="<?= htmlspecialchars($formAction, ENT_QUOTES); ?>"
                method="post"
                enctype="multipart/form-data"
                class="space-y-6"
            >
                <!-- Preserve selected role -->
                <input
                    type="hidden"
                    name="role_slug"
                    value="<?= htmlspecialchars($roleSlug ?? '', ENT_QUOTES); ?>"
                >

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
                            class="block w-full rounded-xl border border-slate-300 bg-white px-3 py-2 text-xs sm:text-sm text-slate-900 shadow-sm
                                   focus:border-sky-500 focus:ring-1 focus:ring-sky-500"
                        >
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
                            class="block w-full rounded-xl border border-slate-300 bg-white px-3 py-2 text-xs sm:text-sm text-slate-900 shadow-sm
                                   focus:border-sky-500 focus:ring-1 focus:ring-sky-500"
                        >
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
                            class="block w-full rounded-xl border border-slate-300 bg-white px-3 py-2 text-xs sm:text-sm text-slate-900 shadow-sm
                                   focus:border-sky-500 focus:ring-1 focus:ring-sky-500"
                        >
                    </div>

                    <!-- Location -->
                    <div class="space-y-1.5">
                        <label for="location" class="block text-xs font-medium text-slate-700">
                            Current city & country <span class="text-rose-500">*</span>
                        </label>
                        <input
                            type="text"
                            id="location"
                            name="location"
                            required
                            class="block w-full rounded-xl border border-slate-300 bg-white px-3 py-2 text-xs sm:text-sm text-slate-900 shadow-sm
                                   focus:border-sky-500 focus:ring-1 focus:ring-sky-500"
                        >
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
                            class="block w-full rounded-xl border border-slate-300 bg-white px-3 py-2 text-xs sm:text-sm text-slate-900 shadow-sm
                                   focus:border-sky-500 focus:ring-1 focus:ring-sky-500"
                        >
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
                            class="block w-full rounded-xl border border-slate-300 bg-white px-3 py-2 text-xs sm:text-sm text-slate-900 shadow-sm
                                   focus:border-sky-500 focus:ring-1 focus:ring-sky-500"
                        >
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
                            class="block w-full rounded-xl border border-slate-300 bg-white px-3 py-2 text-xs sm:text-sm text-slate-900 shadow-sm
                                   focus:border-sky-500 focus:ring-1 focus:ring-sky-500"
                        >
                    </div>
                </div>

                <div class="grid gap-4 sm:grid-cols-2">
                    <!-- LinkedIn / GitHub -->
                    <div class="space-y-1.5">
                        <label for="linkedin" class="block text-xs font-medium text-slate-700">
                            LinkedIn or portfolio URL
                        </label>
                        <input
                            type="url"
                            id="linkedin"
                            name="linkedin"
                            placeholder="https://"
                            class="block w-full rounded-xl border border-slate-300 bg-white px-3 py-2 text-xs sm:text-sm text-slate-900 shadow-sm
                                   focus:border-sky-500 focus:ring-1 focus:ring-sky-500"
                        >
                    </div>

                    <!-- GitHub / Code samples -->
                    <div class="space-y-1.5">
                        <label for="github" class="block text-xs font-medium text-slate-700">
                            GitHub / code samples
                        </label>
                        <input
                            type="url"
                            id="github"
                            name="github"
                            placeholder="https://"
                            class="block w-full rounded-xl border border-slate-300 bg-white px-3 py-2 text-xs sm:text-sm text-slate-900 shadow-sm
                                   focus:border-sky-500 focus:ring-1 focus:ring-sky-500"
                        >
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
                            class="block w-full rounded-xl border border-slate-300 bg-white px-3 py-2 text-xs sm:text-sm text-slate-900 shadow-sm
                                   focus:border-sky-500 focus:ring-1 focus:ring-sky-500"
                        >
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
                            class="block w-full rounded-xl border border-slate-300 bg-white px-3 py-2 text-xs sm:text-sm text-slate-900 shadow-sm
                                   focus:border-sky-500 focus:ring-1 focus:ring-sky-500"
                        >
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
                        class="block w-full rounded-xl border border-slate-300 bg-white px-3 py-2 text-xs sm:text-sm text-slate-900 shadow-sm
                               focus:border-sky-500 focus:ring-1 focus:ring-sky-500"
                        placeholder="A short note about what you are looking for, what you enjoy working on, and why you think QalbIT is a good fit."
                    ></textarea>
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
