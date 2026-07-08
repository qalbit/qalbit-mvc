import { buildMetadata } from "@/lib/seo/metadata";

export const notFoundMetadata = buildMetadata({
  title: "Page Not Found – QalbIT",
  description: "The page you are looking for does not exist or may have been moved.",
  canonical: "/404/",
  noindex: true,
});
