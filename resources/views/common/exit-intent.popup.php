<div
    class="fixed inset-0 z-[60] hidden flex items-center justify-center bg-slate-950/70"
    data-exit-popup
    aria-hidden="true"
>
    <div
        class="relative w-full max-w-2xl overflow-hidden rounded-2xl bg-slate-900 text-slate-50 shadow-2xl ring-1 ring-slate-700/60"
        role="dialog"
        aria-modal="true"
        aria-labelledby="exit-popup-title"
    >

        <!-- Close button -->
        <button
            type="button"
            class="absolute right-2 top-2 inline-flex h-8 w-8 items-center justify-center rounded-full bg-slate-800/80 text-xs text-slate-300 hover:bg-slate-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:ring-offset-2 focus:ring-offset-slate-900"
            data-exit-close
            aria-label="Close popup"
        >
            ✕
        </button>

        <div class="grid gap-6 md:grid-cols-[1.1fr,1.2fr]">
            <!-- Left: message -->
            <div class="space-y-4 p-4 md:p-6">
                <div class="inline-flex items-center gap-2 rounded-full bg-emerald-500/10 px-3 py-1 text-[11px] font-medium text-emerald-300 ring-1 ring-emerald-500/30">
                    <span class="inline-flex h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                    Quick project review in 24 hours
                </div>

                <div class="space-y-2">
                    <h2
                        id="exit-popup-title"
                        class="text-lg font-semibold tracking-tight text-white"
                    >
                        Leaving already? Get a quick estimate before you go.
                    </h2>
                    <p class="text-xs leading-relaxed text-slate-300">
                        Share your project idea, tech stack, or current challenge and we’ll respond
                        within <span class="font-semibold text-emerald-300">24 business hours</span>
                        with next steps or a ballpark estimate.
                    </p>
                </div>

                <ul class="space-y-1.5 text-[11px] text-slate-300">
                    <li class="flex items-start gap-2">
                        <span class="mt-[3px] inline-flex h-4 w-4 items-center justify-center rounded-full bg-emerald-500/15 text-[9px] text-emerald-300">
                            ✓
                        </span>
                        <span>No spam — only one follow-up from the QalbIT team</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="mt-[3px] inline-flex h-4 w-4 items-center justify-center rounded-full bg-emerald-500/15 text-[9px] text-emerald-300">
                            ✓
                        </span>
                        <span>Best suited for SaaS, custom software, and AI projects</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="mt-[3px] inline-flex h-4 w-4 items-center justify-center rounded-full bg-emerald-500/15 text-[9px] text-emerald-300">
                            ✓
                        </span>
                        <span>You’ll hear directly from the core team</span>
                    </li>
                </ul>
            </div>

            <!-- Right: compact form -->
            <?php
                $variant    = 'exit_popup';
                $redirectTo = $_SERVER['REQUEST_URI'] ?? '/';
                include __DIR__ . '/../partials/contact/form-exit-popup.php';
            ?>
        </div>
    </div>
</div>