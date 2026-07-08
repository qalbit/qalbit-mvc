import type { ConfigEntity, FaqItem } from "@/lib/data";
import {
  mapServiceCapabilities,
  mapServiceCta,
  mapServiceFaq,
  mapServiceHero,
  mapServiceOverview,
  mapServiceProcess,
  mapServiceTechStack,
  mapServiceUseCases,
} from "@/lib/blocks/service-mappers";
import { FaqSection } from "@/components/blocks/faq/FaqSection";
import {
  ServiceCapabilitiesSection,
  ServiceCtaSection,
  ServiceHeroSection,
  ServiceOverviewSection,
  ServiceProcessSection,
  ServiceTechStackSection,
  ServiceUseCasesSection,
} from "@/components/blocks/services/ServiceDetailSections";

interface ServiceDetailPageProps {
  entity: ConfigEntity;
  faqs: FaqItem[];
}

/**
 * Service detail composite — mirrors resources/views/pages/services/show.php.
 */
export function ServiceDetailPage({ entity, faqs }: ServiceDetailPageProps) {
  const hero = mapServiceHero(entity);
  const overview = mapServiceOverview(entity);
  const capabilities = mapServiceCapabilities(entity);
  const process = mapServiceProcess(entity);
  const useCases = mapServiceUseCases(entity);
  const techStack = mapServiceTechStack(entity);
  const faqBlock = mapServiceFaq(entity, faqs);
  const cta = mapServiceCta(entity);

  return (
    <>
      <ServiceHeroSection {...hero} />
      <ServiceOverviewSection {...overview} />
      <ServiceCapabilitiesSection {...capabilities} />
      <ServiceProcessSection {...process} />
      <ServiceUseCasesSection {...useCases} />
      <ServiceTechStackSection {...techStack} />
      {faqBlock && <FaqSection {...faqBlock} />}
      {cta && <ServiceCtaSection {...cta} />}
    </>
  );
}
