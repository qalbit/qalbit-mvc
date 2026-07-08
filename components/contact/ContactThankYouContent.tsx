import Link from "next/link";
import { Container, Section } from "@/components/ui";

export function ContactThankYouContent() {
  return (
    <Section
      id="contact-thank-you"
      className="relative overflow-hidden bg-slate-50 py-16 sm:py-20 lg:py-24"
      dataAttributes={{ "data-contact-section": "thank-you" }}
    >
      <Container>
        <nav className="mb-8 text-xs font-medium text-slate-500" aria-label="Breadcrumb">
          <ol className="flex flex-wrap items-center gap-1">
            <li>
              <Link href="/" className="transition-colors hover:text-primary">Home</Link>
            </li>
            <li className="text-slate-400">/</li>
            <li>
              <Link href="/contact-us/" className="transition-colors hover:text-primary">Contact</Link>
            </li>
            <li className="text-slate-400">/</li>
            <li aria-current="page" className="text-slate-900">Thank you</li>
          </ol>
        </nav>

        <div className="mx-auto max-w-xl">
          <div className="rounded-2xl border border-slate-200 bg-white p-6 text-center shadow-xl shadow-slate-200/80 sm:p-8 lg:p-10">
            <span className="inline-flex items-center rounded-full border border-emerald-200 bg-emerald-50 px-3 py-1 text-[11px] font-semibold uppercase tracking-wide text-emerald-700 shadow-soft">
              Enquiry received
            </span>

            <div className="mx-auto mt-6 flex h-14 w-14 items-center justify-center rounded-full bg-emerald-50 ring-1 ring-emerald-200">
              <svg className="h-7 w-7 text-emerald-600" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                <path
                  d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                  stroke="currentColor"
                  strokeWidth="1.5"
                  strokeLinecap="round"
                  strokeLinejoin="round"
                />
              </svg>
            </div>

            <h1 className="mt-6 text-display-md font-bold text-slate-900 sm:text-display-lg">
              Thank you for contacting <span className="text-gradient-brand">QalbIT</span>
            </h1>

            <p className="mt-4 text-sm leading-relaxed text-slate-600 sm:text-base">
              Thank you. We have received your enquiry and will respond within 24 hours (business
              days).
            </p>

            <p className="mt-3 text-xs text-slate-500">
              If your request is urgent, email{" "}
              <a
                href="mailto:sales@qalbit.com"
                className="font-medium text-primary underline underline-offset-4 hover:text-primary"
              >
                sales@qalbit.com
              </a>
              {" "}or call{" "}
              <a
                href="tel:+918511900440"
                className="font-medium text-primary underline underline-offset-4 hover:text-primary"
              >
                +91 85119 00440
              </a>.
            </p>

            <div className="mt-8 flex flex-col gap-3 sm:flex-row sm:justify-center">
              <Link
                href="/"
                className="inline-flex items-center justify-center rounded-md bg-primary px-5 py-3 text-sm font-semibold text-white shadow-lg transition hover:bg-primary/90 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2"
              >
                Back to home
              </Link>
              <Link
                href="/portfolio/"
                className="inline-flex items-center justify-center rounded-md border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-900 transition hover:border-slate-400 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-slate-300 focus-visible:ring-offset-2"
              >
                View our work
              </Link>
            </div>

            <p className="mt-6 text-[11px] text-slate-500">
              Prefer to schedule directly?{" "}
              <a
                href="https://calendly.com/abidhusain-qalbit/discuss-project"
                className="font-medium text-primary underline underline-offset-4 hover:text-primary"
                target="_blank"
                rel="noopener noreferrer"
              >
                Book a discovery call
              </a>
            </p>
          </div>
        </div>
      </Container>
    </Section>
  );
}
