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

const HIRE_BREADCRUMB_PARENT = { label: "Hire developers", href: "/hire-developers/" };

interface HireDetailPageProps {
  entity: ConfigEntity;
  faqs: FaqItem[];
}

/**
 * Hire role detail — mirrors pages/hire/show.php (same sections as service detail).
 */
export function HireDetailPage({ entity, faqs }: HireDetailPageProps) {
  const hero = mapServiceHero(entity, { breadcrumbParent: HIRE_BREADCRUMB_PARENT });
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
