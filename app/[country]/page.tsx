import { notFound } from "next/navigation";
import { GeoCountryIndexPage } from "@/components/blocks/layouts/GeoCountryIndexPage";
import {
  geoLocations,
  getCountryMeta,
  getLocationsByCountry,
} from "@/lib/data";
import { buildMetadata } from "@/lib/seo/metadata";
import { REVALIDATE_DEFAULT } from "@/lib/site";

export const revalidate = REVALIDATE_DEFAULT;

export function generateStaticParams() {
  const keys = new Set(geoLocations.map((g) => g.country_key));
  return Array.from(keys).map((country) => ({ country }));
}

export async function generateMetadata({
  params,
}: {
  params: { country: string };
}) {
  const meta = getCountryMeta(params.country);
  if (!meta) return {};

  return buildMetadata({
    title: `Custom Software Development in ${meta.countryName} – QalbIT`,
    description: `QalbIT works with startups and businesses across ${meta.countryName}. Explore location-specific custom software, web and mobile development pages.`,
    canonical: `/${params.country}/`,
  });
}

export default function GeoCountryPage({
  params,
}: {
  params: { country: string };
}) {
  const meta = getCountryMeta(params.country);
  const locations = getLocationsByCountry(params.country);
  if (!meta || locations.length === 0) notFound();

  return (
    <GeoCountryIndexPage
      countryKey={meta.countryKey}
      countryName={meta.countryName}
      locations={locations}
    />
  );
}
