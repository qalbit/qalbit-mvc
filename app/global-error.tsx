"use client";

import Link from "next/link";

export default function GlobalError({
  reset,
}: {
  error: Error & { digest?: string };
  reset: () => void;
}) {
  return (
    <html lang="en">
      <head>
        <meta charSet="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Something went wrong | QalbIT</title>
        <link rel="stylesheet" href="/assets/css/app.css" />
      </head>
      <body className="min-h-screen bg-background font-sans antialiased">
        <section
          className="relative overflow-hidden bg-slate-50 py-16 sm:py-20 lg:py-24"
          aria-labelledby="global-error-heading"
        >
          <div className="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
            <header className="space-y-4 text-center sm:text-left">
              <span className="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white px-3 py-1 text-[11px] font-semibold uppercase tracking-wide text-slate-600 shadow-soft">
                <span className="inline-flex h-1.5 w-1.5 rounded-full bg-rose-500" />
                Application error
              </span>

              <h1
                id="global-error-heading"
                className="text-display-md font-bold text-slate-900 sm:text-display-lg"
              >
                Something went wrong on our side
              </h1>

              <p className="max-w-xl text-sm leading-relaxed text-slate-600 sm:text-base">
                An unexpected error occurred while loading this page. You can try again, return
                to the homepage, or contact our team if the problem persists.
              </p>
            </header>

            <div className="mt-8 flex flex-col gap-3 sm:flex-row sm:items-center">
              <button
                type="button"
                onClick={reset}
                className="inline-flex items-center justify-center rounded-md bg-primary px-5 py-3 text-sm font-semibold text-white shadow-lg transition hover:bg-primary/90 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2"
              >
                Try again
              </button>
              <Link
                href="/"
                className="inline-flex items-center justify-center rounded-md border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-900 transition hover:border-slate-400 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-slate-300 focus-visible:ring-offset-2"
              >
                Back to homepage
              </Link>
              <Link
                href="/contact-us/"
                className="inline-flex items-center justify-center rounded-md border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-900 transition hover:border-slate-400 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-slate-300 focus-visible:ring-offset-2"
              >
                Contact support
              </Link>
            </div>

            <p className="mt-8 text-xs text-slate-500">
              If this keeps happening, email{" "}
              <a
                href="mailto:sales@qalbit.com"
                className="font-medium text-primary underline underline-offset-4 hover:text-primary"
              >
                sales@qalbit.com
              </a>
              {" "}with the page you were visiting.
            </p>
          </div>
        </section>
      </body>
    </html>
  );
}
