import type { ConfigEntity, FaqItem } from "@/lib/data";
import {
  mapTechnologyCapabilities,
  mapTechnologyCta,
  mapTechnologyFaq,
  mapTechnologyHero,
  mapTechnologyOverview,
  mapTechnologyProcess,
  mapTechnologyTechStack,
  mapTechnologyUseCases,
} from "@/lib/blocks/technology-mappers";
import { FaqSection } from "@/components/blocks/faq/FaqSection";
import {
  TechnologyCapabilitiesSection,
  TechnologyCtaSection,
  TechnologyHeroSection,
  TechnologyOverviewSection,
  TechnologyProcessSection,
  TechnologyTechStackSection,
  TechnologyUseCasesSection,
} from "@/components/blocks/technologies/TechnologyDetailSections";

interface TechnologyDetailPageProps {
  entity: ConfigEntity;
  faqs: FaqItem[];
}

/**
 * Technology detail composite — mirrors resources/views/pages/technologies/show.php.
 */
export function TechnologyDetailPage({ entity, faqs }: TechnologyDetailPageProps) {
  const hero = mapTechnologyHero(entity);
  const overview = mapTechnologyOverview(entity);
  const capabilities = mapTechnologyCapabilities(entity);
  const process = mapTechnologyProcess(entity);
  const useCases = mapTechnologyUseCases(entity);
  const techStack = mapTechnologyTechStack(entity);
  const faqBlock = mapTechnologyFaq(entity, faqs);
  const cta = mapTechnologyCta(entity);

  return (
    <>
      <TechnologyHeroSection {...hero} />
      <TechnologyOverviewSection {...overview} />
      <TechnologyCapabilitiesSection {...capabilities} />
      <TechnologyProcessSection {...process} />
      <TechnologyUseCasesSection {...useCases} />
      <TechnologyTechStackSection {...techStack} />
      {faqBlock && <FaqSection {...faqBlock} />}
      {cta && <TechnologyCtaSection {...cta} />}
    </>
  );
}
