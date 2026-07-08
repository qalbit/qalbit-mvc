import { ServiceUnavailableContent } from "@/components/blocks/errors/ServiceUnavailableContent";
import { serviceUnavailableMetadata } from "@/lib/seo/service-unavailable";

export const metadata = serviceUnavailableMetadata;

export default function ServiceUnavailablePage() {
  return <ServiceUnavailableContent />;
}
