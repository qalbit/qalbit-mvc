<div
    class="fixed bottom-6 left-4 z-40 flex flex-col-reverse items-start gap-3"
    aria-label="Floating actions"
    data-floating-stack="bottom-left"
>
    <!-- Scroll-to-top button (always last visually because of flex-col-reverse) -->
    <button
        type="button"
        class="group inline-flex h-11 w-11 items-center justify-center rounded-full border border-slate-700 bg-slate-900/80 text-slate-50 shadow-lg backdrop-blur-sm opacity-0 pointer-events-none translate-y-2 transition duration-200 ease-out"
        aria-label="Scroll back to top"
        data-scroll-top-trigger
    >
        <svg
            xmlns="https://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            aria-hidden="true"
            class="h-5 w-5 transition-transform duration-200 group-hover:-translate-y-0.5"
        >
            <path
                fill="currentColor"
                d="M12 4l-7 7h4v7h6v-7h4z"
            />
        </svg>
    </button>

    <!--
        Future: any popup/CTA you add inside this container will stack
        ABOVE the arrow automatically, thanks to flex-col-reverse.
    -->
</div>