import type { ConfigEntity, FaqItem } from "@/lib/data";
import type { BreadcrumbItem } from "@/lib/blocks/types";
import {
  mapCapabilities,
  mapDarkCta,
  mapDetailHero,
  mapFaqBlock,
  mapOverview,
  mapProcess,
  mapTechStack,
  mapUseCases,
} from "@/lib/blocks/entity-mappers";
import { CapabilitiesGrid } from "../content/CapabilitiesGrid";
import { OverviewSection } from "../content/OverviewSection";
import { ProcessSteps } from "../content/ProcessSteps";
import { TechStackSection } from "../content/TechStackSection";
import { UseCasesGrid } from "../content/UseCasesGrid";
import { DarkCtaBand } from "../cta/DarkCtaBand";
import { FaqSection } from "../faq/FaqSection";
import { DetailHero } from "../heroes/DetailHero";

export interface DetailEntityPageProps {
  entity: ConfigEntity;
  faqs: FaqItem[];
  breadcrumbs: BreadcrumbItem[];
  /** Prefix for data-section attributes, e.g. "service", "industry", "technology" */
  sectionPrefix: string;
}

/**
 * Composite template for service, industry, technology, and hire detail pages.
 * Mirrors PHP show.php section order: hero → overview → capabilities → process → use cases → stack → FAQ → CTA.
 */
export function DetailEntityPage({
  entity,
  faqs,
  breadcrumbs,
  sectionPrefix,
}: DetailEntityPageProps) {
  const hero = mapDetailHero(entity, breadcrumbs, `${sectionPrefix}-hero`);
  const overview = mapOverview(entity, `${sectionPrefix}-overview`);
  const capabilities = mapCapabilities(entity, `${sectionPrefix}-capabilities`);
  const process = mapProcess(entity, `${sectionPrefix}-process`);
  const useCases = mapUseCases(entity, `${sectionPrefix}-use-cases`);
  const techStack = mapTechStack(entity, `${sectionPrefix}-tech-stack`);
  const faqBlock = mapFaqBlock(entity, faqs);
  const cta = mapDarkCta(entity, `${sectionPrefix}-cta`);

  return (
    <>
      <DetailHero {...hero} />
      {overview && <OverviewSection {...overview} hookPrefix={sectionPrefix} />}
      {capabilities && <CapabilitiesGrid {...capabilities} hookPrefix={sectionPrefix} />}
      {process && <ProcessSteps {...process} hookPrefix={sectionPrefix} />}
      {useCases && <UseCasesGrid {...useCases} hookPrefix={sectionPrefix} />}
      {techStack && <TechStackSection {...techStack} hookPrefix={sectionPrefix} />}
      {faqBlock && <FaqSection {...faqBlock} />}
      {cta && <DarkCtaBand {...cta} />}
    </>
  );
}
