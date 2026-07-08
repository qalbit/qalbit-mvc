import { buildMetadata } from "@/lib/seo/metadata";

export const serviceUnavailableMetadata = buildMetadata({
  title: "Service Unavailable – QalbIT",
  description:
    "QalbIT is temporarily unavailable due to scheduled maintenance. Please try again in a few minutes.",
  canonical: "/503/",
  noindex: true,
});
