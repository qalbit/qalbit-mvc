import { GeoDetailPage } from "@/components/blocks/layouts/GeoDetailPage";
import type { FaqItem } from "@/lib/data";
import type { GeoLocation } from "@/lib/data";

export function GeoDetailView({
  location,
  faqs,
}: {
  location: GeoLocation;
  faqs: FaqItem[];
}) {
  return <GeoDetailPage location={location} faqs={faqs} />;
}
