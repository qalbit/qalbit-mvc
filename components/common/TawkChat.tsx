import Script from "next/script";
import { env } from "@/lib/env";

/** Loads Tawk.to live chat when TAWK_PROPERTY_ID is configured. */
export function TawkChat() {
  const propertyId = env.TAWK_PROPERTY_ID;
  if (!propertyId) return null;

  return (
    <Script
      id="tawk-layer"
      src="/assets/js/tawk-layer.js"
      data-tawk-property-id={propertyId}
      data-tawk-widget-id={env.TAWK_WIDGET_ID ?? "default"}
      strategy="lazyOnload"
    />
  );
}
