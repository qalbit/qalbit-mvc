import { ContactThankYouContent } from "@/components/contact/ContactThankYouContent";
import { buildMetadata } from "@/lib/seo/metadata";

export const metadata = buildMetadata({
  title: "Thank You – QalbIT",
  description:
    "Thank you for contacting QalbIT. We have received your enquiry and will respond within 24 business hours.",
  canonical: "/contact-us/thank-you/",
});

export default function ThankYouPage() {
  return <ContactThankYouContent />;
}
