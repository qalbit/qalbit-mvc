import type { ConfigEntity, FaqItem } from "@/lib/data";
import {
  mapIndustryCapabilities,
  mapIndustryCta,
  mapIndustryFaq,
  mapIndustryHero,
  mapIndustryOverview,
  mapIndustryProcess,
  mapIndustryTechStack,
  mapIndustryUseCases,
} from "@/lib/blocks/industry-mappers";
import { FaqSection } from "@/components/blocks/faq/FaqSection";
import {
  IndustryCapabilitiesSection,
  IndustryCtaSection,
  IndustryHeroSection,
  IndustryOverviewSection,
  IndustryProcessSection,
  IndustryTechStackSection,
  IndustryUseCasesSection,
} from "@/components/blocks/industries/IndustryDetailSections";

interface IndustryDetailPageProps {
  entity: ConfigEntity;
  faqs: FaqItem[];
}

/**
 * Industry detail composite — mirrors resources/views/pages/industries/show.php.
 */
export function IndustryDetailPage({ entity, faqs }: IndustryDetailPageProps) {
  const hero = mapIndustryHero(entity);
  const overview = mapIndustryOverview(entity);
  const capabilities = mapIndustryCapabilities(entity);
  const process = mapIndustryProcess(entity);
  const useCases = mapIndustryUseCases(entity);
  const techStack = mapIndustryTechStack(entity);
  const faqBlock = mapIndustryFaq(entity, faqs);
  const cta = mapIndustryCta(entity);

  return (
    <>
      <IndustryHeroSection {...hero} />
      <IndustryOverviewSection {...overview} />
      <IndustryCapabilitiesSection {...capabilities} />
      <IndustryProcessSection {...process} />
      <IndustryUseCasesSection {...useCases} />
      <IndustryTechStackSection {...techStack} />
      {faqBlock && <FaqSection {...faqBlock} />}
      {cta && <IndustryCtaSection {...cta} />}
    </>
  );
}
