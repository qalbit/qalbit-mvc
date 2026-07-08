import { notFound } from "next/navigation";
import { GeoDetailView } from "@/components/geo/GeoDetailView";
import { JsonLd } from "@/components/seo/JsonLd";
import {
  geoLocations,
  getGeoByCountryState,
  getGeoFaqs,
} from "@/lib/data";
import { buildMetadata } from "@/lib/seo/metadata";
import { buildPageSchemas } from "@/lib/seo/schema";
import { REVALIDATE_DEFAULT, absoluteUrl } from "@/lib/site";

export const revalidate = REVALIDATE_DEFAULT;

export function generateStaticParams() {
  return geoLocations.map((g) => ({
    country: g.country_key,
    state: g.state_key,
  }));
}

export async function generateMetadata({
  params,
}: {
  params: { country: string; state: string };
}) {
  const entity = getGeoByCountryState(params.country, params.state);
  if (!entity) return {};

  return buildMetadata({
    title: entity.meta_title ?? entity.seo?.meta_title ?? entity.name,
    description: entity.meta_description ?? entity.seo?.meta_description,
    canonical: entity.slug,
  });
}

export default function GeoStatePage({
  params,
}: {
  params: { country: string; state: string };
}) {
  const entity = getGeoByCountryState(params.country, params.state);
  if (!entity) notFound();

  const faqs = getGeoFaqs(entity);
  const pageUrl = absoluteUrl(entity.slug);
  const pageTitle = entity.meta_title ?? entity.seo?.meta_title ?? entity.name;

  const jsonLd = buildPageSchemas({
    faqs,
    pageUrl,
    pageTitle,
    breadcrumbs: [
      {
        name: entity.country_name ?? params.country,
        url: `/${params.country}/`,
      },
      { name: entity.name, url: entity.slug },
    ],
    includeOrg: true,
  });

  return (
    <>
      <JsonLd data={jsonLd} />
      <GeoDetailView location={entity} faqs={faqs} />
    </>
  );
}
