import Link from "next/link";
import { CareerApplyForm } from "./CareerApplyForm";

export interface CareerApplyViewProps {
  roleSlug?: string;
  roleTitle?: string;
  roleTeam?: string;
  roleLocation?: string;
  roleExperience?: string;
}

export function CareerApplyView({
  roleSlug,
  roleTitle,
  roleTeam,
  roleLocation,
  roleExperience,
}: CareerApplyViewProps) {
  const heading = roleTitle ? `Apply for ${roleTitle}` : "Apply for any suitable role";
  const hasSelectedRole = Boolean(roleSlug && roleTitle);

  return (
    <section
      id="careers-apply"
      className="relative bg-slate-50 py-10 text-slate-900 sm:py-14 lg:py-16"
      data-careers-section="apply"
    >
      <div className="mx-auto max-w-5xl space-y-6 px-4 sm:space-y-8 sm:px-6 lg:px-8">
        <nav className="text-xs font-medium text-slate-600" aria-label="Breadcrumb">
          <ol className="flex flex-wrap items-center gap-1">
            <li>
              <Link href="/" className="transition-colors hover:text-sky-500">Home</Link>
            </li>
            <li className="text-slate-400">/</li>
            <li>
              <Link href="/career/" className="transition-colors hover:text-sky-500">Careers</Link>
            </li>
            <li className="text-slate-400">/</li>
            <li aria-current="page" className="text-slate-900">Apply</li>
          </ol>
        </nav>

        <header className="space-y-3">
          <span className="inline-flex items-center rounded-full border border-slate-200 bg-white/80 px-3 py-0.5 text-[11px] font-semibold uppercase tracking-[0.16em] text-slate-600">
            Apply to QalbIT
          </span>

          <div className="space-y-2">
            <h1 className="text-xl font-semibold tracking-tight text-slate-900 sm:text-2xl md:text-[26px]">
              {heading}
            </h1>
            <p className="max-w-2xl text-sm text-slate-600">
              Share your experience, skills and context. We review every application and reach out
              when there is a strong match with current or upcoming roles.
            </p>
          </div>

          {hasSelectedRole ? (
            <div className="flex flex-wrap gap-2 text-[11px] text-slate-600">
              {roleTeam && (
                <span className="inline-flex items-center rounded-full border border-slate-200 bg-slate-100 px-2.5 py-0.5">
                  <span className="mr-1.5 h-1.5 w-1.5 rounded-full bg-sky-500" />
                  {roleTeam}
                </span>
              )}
              {roleLocation && (
                <span className="inline-flex items-center rounded-full border border-slate-200 bg-slate-100 px-2.5 py-0.5">
                  {roleLocation}
                </span>
              )}
              {roleExperience && (
                <span className="inline-flex items-center rounded-full border border-slate-200 bg-slate-100 px-2.5 py-0.5">
                  {roleExperience}
                </span>
              )}
              <Link
                href="/career/"
                className="ml-auto inline-flex items-center gap-1 text-[11px] font-medium text-sky-700 hover:text-sky-600"
              >
                View all openings
                <span aria-hidden="true">→</span>
              </Link>
            </div>
          ) : (
            <div className="flex flex-wrap items-center gap-2 text-[11px] text-slate-600">
              <span>No specific role selected.</span>
              <Link
                href="/career/"
                className="inline-flex items-center gap-1 text-[11px] font-medium text-sky-700 hover:text-sky-600"
              >
                Browse current openings
                <span aria-hidden="true">→</span>
              </Link>
            </div>
          )}
        </header>

        <div className="rounded-3xl border border-slate-200 bg-white/90 px-4 py-6 shadow-soft sm:px-6 sm:py-7 lg:px-7 lg:py-8">
          <CareerApplyForm roleSlug={roleSlug} roleTitle={roleTitle} />
        </div>
      </div>
    </section>
  );
}
