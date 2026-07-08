import type { FaqItem } from "@/lib/data";
import { mapIndustriesFaq, mapIndexContactCta } from "@/lib/blocks/index-mappers";
import { IndustriesIndexHero } from "../industries/IndustriesIndexHero";
import {
  IndustriesGridSection,
  IndustriesOutcome,
  IndustriesProcess,
  IndustriesTechstack,
  IndustriesTechstackMini,
  IndustriesTrust,
  IndustriesUsecase,
  IndustriesUsecaseMini,
} from "../industries/IndustriesIndexSections";
import { ContactCtaSection } from "../cta/ContactCtaSection";
import { FaqSection } from "../faq/FaqSection";

export interface IndustriesIndexPageProps {
  faqs: FaqItem[];
}

export function IndustriesIndexPage({ faqs }: IndustriesIndexPageProps) {
  const faqBlock = mapIndustriesFaq(faqs);
  const contactCta = mapIndexContactCta("lead_industries_page");

  return (
    <>
      <IndustriesIndexHero />
      <IndustriesUsecaseMini />
      <IndustriesGridSection />
      <IndustriesOutcome />
      <IndustriesProcess />
      <IndustriesTechstack />
      <IndustriesTechstackMini />
      <IndustriesUsecase />
      <IndustriesTrust />
      {faqBlock && <FaqSection {...faqBlock} />}
      <ContactCtaSection {...contactCta} />
    </>
  );
}
