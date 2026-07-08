import type { FaqItem } from "@/lib/data";
import { mapIndexContactCta, mapTechnologiesFaq } from "@/lib/blocks/index-mappers";
import { TechnologiesIndexHero } from "../technologies/TechnologiesIndexHero";
import { TechnologiesIndexSections } from "../technologies/TechnologiesIndexSections";
import { ContactCtaSection } from "../cta/ContactCtaSection";
import { FaqSection } from "../faq/FaqSection";

export interface TechnologiesIndexPageProps {
  faqs: FaqItem[];
}

export function TechnologiesIndexPage({ faqs }: TechnologiesIndexPageProps) {
  const faqBlock = mapTechnologiesFaq(faqs);
  const contactCta = mapIndexContactCta("lead_technologies_page");

  return (
    <>
      <TechnologiesIndexHero />
      <TechnologiesIndexSections />
      {faqBlock && <FaqSection {...faqBlock} />}
      <ContactCtaSection {...contactCta} />
    </>
  );
}
