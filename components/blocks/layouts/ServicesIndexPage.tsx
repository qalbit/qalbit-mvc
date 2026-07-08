import type { FaqItem } from "@/lib/data";
import { mapServicesContactCta, mapServicesFaq } from "@/lib/blocks/index-mappers";
import { ContactCtaSection } from "../cta/ContactCtaSection";
import { FaqSection } from "../faq/FaqSection";
import { ServicesIndexHero } from "../services/ServicesIndexHero";
import {
  ServicesCaseTeasers,
  ServicesEngagementModels,
  ServicesFeaturedLinks,
  ServicesGridSection,
  ServicesIndustriesBand,
  ServicesProcessSection,
} from "../services/ServicesIndexSections";

export interface ServicesIndexPageProps {
  faqs: FaqItem[];
}

/**
 * Services index — mirrors resources/views/pages/services/index.php section order.
 */
export function ServicesIndexPage({ faqs }: ServicesIndexPageProps) {
  const faqBlock = mapServicesFaq(faqs);
  const contactCta = mapServicesContactCta();

  return (
    <>
      <ServicesIndexHero />
      <ServicesFeaturedLinks />
      <ServicesGridSection />
      <ServicesEngagementModels />
      <ServicesProcessSection />
      <ServicesIndustriesBand />
      <ServicesCaseTeasers />
      {faqBlock && <FaqSection {...faqBlock} />}
      <ContactCtaSection {...contactCta} />
    </>
  );
}
