import Link from "next/link";
import type { GeoLocation } from "@/lib/data";

export interface GeoCountryIndexPageProps {
  countryKey: string;
  countryName: string;
  locations: GeoLocation[];
}

/**
 * Composite template for geo country index pages.
 * Mirrors PHP pages/geo/index.php.
 */
export function GeoCountryIndexPage({
  countryKey,
  countryName,
  locations,
}: GeoCountryIndexPageProps) {
  return (
    <section className="py-16">
      <div className="mx-auto max-w-6xl space-y-8 px-4">
        <header className="max-w-3xl space-y-3">
          <p className="text-xs font-semibold uppercase tracking-wide text-slate-500">
            {countryKey.toUpperCase()} · Locations
          </p>
          <h1 className="text-3xl font-semibold md:text-4xl">
            Custom Software Development in {countryName}
          </h1>
          <p className="text-slate-600">
            QalbIT works with startups and businesses across {countryName} through remote-first
            collaboration, with focused pages for key states where we often work with clients.
          </p>
        </header>

        {locations.length > 0 ? (
          <div className="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            {locations.map((location) => (
              <article
                key={location.slug}
                className="flex h-full flex-col rounded-xl border bg-white p-5 shadow-sm"
              >
                <div className="flex-1 space-y-2">
                  <h2 className="text-sm font-semibold text-slate-800">
                    <Link
                      href={`/${countryKey}/${location.state_key}/`}
                      className="hover:text-slate-900 hover:underline"
                    >
                      {location.name}
                    </Link>
                  </h2>
                  {location.short_description && (
                    <p className="text-xs text-slate-600">{location.short_description}</p>
                  )}
                </div>
                <div className="mt-4">
                  <Link
                    href={`/${countryKey}/${location.state_key}/`}
                    className="inline-flex items-center text-xs font-medium text-slate-900 hover:underline"
                  >
                    View state-specific page
                    <span className="ml-1 text-[10px]">→</span>
                  </Link>
                </div>
              </article>
            ))}
          </div>
        ) : (
          <p className="text-sm text-slate-600">
            We are still adding {countryName}-specific pages. For now,{" "}
            <Link href="/contact-us/" className="text-slate-900 underline">contact us</Link> with your
            location and project details.
          </p>
        )}
      </div>
    </section>
  );
}
