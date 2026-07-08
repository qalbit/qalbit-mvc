import type { ConfigEntity, FaqItem } from "@/lib/data";
import {
  mapProcessEngagements,
  mapProcessFit,
  mapProcessFinalCta,
  mapProcessFaq,
  mapProcessHero,
  mapProcessProof,
  mapProcessServices,
  mapProcessTech,
  mapProcessTimeline,
  mapProcessWhy,
} from "@/lib/blocks/process-mappers";
import { FaqSection } from "../faq/FaqSection";
import { FitSection } from "../process/FitSection";
import { ProcessEngagementsSection } from "../process/ProcessEngagementsSection";
import { ProcessFinalCtaSection } from "../process/ProcessFinalCtaSection";
import { ProcessHeroSection } from "../process/ProcessHeroSection";
import { ProcessProofSection } from "../process/ProcessProofSection";
import { ProcessServicesSection } from "../process/ProcessServicesSection";
import { ProcessTechSection } from "../process/ProcessTechSection";
import { ProcessTimelineSection } from "../process/ProcessTimelineSection";
import { ProcessWhySection } from "../process/ProcessWhySection";

export interface ProcessDetailPageProps {
  entity: ConfigEntity;
  faqs: FaqItem[];
}

/** Composite template for process pages — mirrors pages/process/show.php */
export function ProcessDetailPage({ entity, faqs }: ProcessDetailPageProps) {
  const hero = mapProcessHero(entity);
  const fit = mapProcessFit(entity);
  const services = mapProcessServices(entity);
  const timeline = mapProcessTimeline(entity);
  const engagements = mapProcessEngagements(entity);
  const proof = mapProcessProof(entity);
  const tech = mapProcessTech(entity);
  const why = mapProcessWhy(entity);
  const faqBlock = mapProcessFaq(entity, faqs);
  const finalCta = mapProcessFinalCta(entity);

  return (
    <>
      {hero && <ProcessHeroSection {...hero} />}
      {fit && <FitSection {...fit} />}
      {services && <ProcessServicesSection {...services} />}
      {timeline && <ProcessTimelineSection {...timeline} />}
      {engagements && <ProcessEngagementsSection {...engagements} />}
      {proof && <ProcessProofSection {...proof} />}
      {tech && <ProcessTechSection {...tech} />}
      {why && <ProcessWhySection {...why} />}
      {faqBlock && <FaqSection {...faqBlock} />}
      {finalCta && <ProcessFinalCtaSection {...finalCta} />}
    </>
  );
}
