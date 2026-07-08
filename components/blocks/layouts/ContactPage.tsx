import type { FaqItem } from "@/lib/data";
import {
  mapContactFaq,
  mapContactFinalCta,
  mapContactHero,
  mapContactLocations,
  mapContactRequests,
} from "@/lib/blocks/contact-mappers";
import { ContactFinalCtaSection } from "@/components/contact/ContactFinalCtaSection";
import { ContactLocationsSection } from "@/components/contact/ContactLocationsSection";
import { ContactProofSection } from "@/components/contact/ContactProofSection";
import { ContactRequestsSection } from "@/components/contact/ContactRequestsSection";
import { FaqSection } from "../faq/FaqSection";
import { ContactHero } from "../heroes/ContactHero";

export interface ContactPageProps {
  faqs: FaqItem[];
}

/** Composite template for contact page — mirrors pages/contact/index.php */
export function ContactPage({ faqs }: ContactPageProps) {
  const hero = mapContactHero();
  const requests = mapContactRequests();
  const locations = mapContactLocations();
  const finalCta = mapContactFinalCta();
  const faqBlock = mapContactFaq(faqs);

  return (
    <>
      <ContactHero {...hero} />
      <ContactRequestsSection {...requests} />
      <ContactProofSection />
      <ContactLocationsSection {...locations} />
      {faqBlock && <FaqSection {...faqBlock} />}
      <ContactFinalCtaSection {...finalCta} />
    </>
  );
}
