import type { FaqItem } from "@/lib/data";
import type { GeoLocation } from "@/lib/data";
import {
  mapGeoAbout,
  mapGeoBreadcrumbs,
  mapGeoEngagements,
  mapGeoFinalCta,
  mapGeoFaq,
  mapGeoHero,
  mapGeoProcess,
  mapGeoProof,
  mapGeoServices,
  mapGeoTech,
  mapGeoWhy,
} from "@/lib/blocks/geo-mappers";
import { FaqSection } from "../faq/FaqSection";
import { GeoAboutSection } from "../geo/GeoAboutSection";
import { GeoEngagementsSection } from "../geo/GeoEngagementsSection";
import { GeoFinalCtaSection } from "../geo/GeoFinalCtaSection";
import { GeoProcessSection } from "../geo/GeoProcessSection";
import { GeoProof } from "../geo/GeoProof";
import { GeoServices } from "../geo/GeoServices";
import { GeoTechSection } from "../geo/GeoTechSection";
import { GeoWhySection } from "../geo/GeoWhySection";
import { GeoHero } from "../heroes/GeoHero";

export interface GeoDetailPageProps {
  location: GeoLocation;
  faqs: FaqItem[];
}

/**
 * Composite template for geo / location detail pages.
 * Mirrors PHP pages/geo/show.php section order.
 */
export function GeoDetailPage({ location, faqs }: GeoDetailPageProps) {
  const breadcrumbs = mapGeoBreadcrumbs(location);
  const hero = mapGeoHero(location, breadcrumbs);
  const about = mapGeoAbout(location);
  const services = mapGeoServices(location);
  const why = mapGeoWhy(location);
  const process = mapGeoProcess(location);
  const engagements = mapGeoEngagements(location);
  const tech = mapGeoTech(location);
  const proof = mapGeoProof(location);
  const faqBlock = mapGeoFaq(location, faqs);
  const finalCta = mapGeoFinalCta(location);

  return (
    <>
      {hero && <GeoHero {...hero} />}
      {about && <GeoAboutSection {...about} />}
      {services && <GeoServices {...services} />}
      {why && <GeoWhySection {...why} />}
      {process && <GeoProcessSection {...process} />}
      {engagements && <GeoEngagementsSection {...engagements} />}
      {tech && <GeoTechSection {...tech} />}
      {proof && <GeoProof {...proof} />}
      {faqBlock && <FaqSection {...faqBlock} />}
      {finalCta && <GeoFinalCtaSection {...finalCta} />}
    </>
  );
}
