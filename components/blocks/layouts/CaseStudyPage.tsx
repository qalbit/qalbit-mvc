import type { FaqItem } from "@/lib/data";
import {
  mapCaseStudyAbout,
  mapCaseStudyChallenge,
  mapCaseStudyFeatures,
  mapCaseStudyFaq,
  mapCaseStudyGoals,
  mapCaseStudyHero,
  mapCaseStudyProcess,
  mapCaseStudyRelatedCta,
  mapCaseStudyResults,
  mapCaseStudySolution,
  mapCaseStudyStack,
  type CaseStudyRecord,
} from "@/lib/blocks/case-study-mappers";
import {
  CaseStudyAboutSection,
  CaseStudyHeroSection,
  CaseStudyRelatedCtaSection,
} from "../case-studies/CaseStudyDetailSections";
import { ChallengeSection } from "../case-study/ChallengeSection";
import { GoalsSection } from "../case-study/GoalsSection";
import { ResultsSection } from "../case-study/ResultsSection";
import { CapabilitiesGrid } from "../content/CapabilitiesGrid";
import { OverviewSection } from "../content/OverviewSection";
import { ProcessSteps } from "../content/ProcessSteps";
import { TechStackSection } from "../content/TechStackSection";
import { FaqSection } from "../faq/FaqSection";

export interface CaseStudyPageProps {
  caseStudy: CaseStudyRecord;
  faqs: FaqItem[];
}

/**
 * Composite template for case study detail pages.
 * Mirrors resources/views/pages/case-studies/show.php.
 */
export function CaseStudyPage({ caseStudy, faqs }: CaseStudyPageProps) {
  const hero = mapCaseStudyHero(caseStudy);
  const about = mapCaseStudyAbout(caseStudy);
  const challenge = mapCaseStudyChallenge(caseStudy);
  const goals = mapCaseStudyGoals(caseStudy);
  const solution = mapCaseStudySolution(caseStudy);
  const features = mapCaseStudyFeatures(caseStudy);
  const stack = mapCaseStudyStack(caseStudy);
  const process = mapCaseStudyProcess(caseStudy);
  const results = mapCaseStudyResults(caseStudy);
  const relatedCta = mapCaseStudyRelatedCta(caseStudy);
  const faqBlock = mapCaseStudyFaq(caseStudy, faqs);

  return (
    <>
      <CaseStudyHeroSection {...hero} />
      {about && <CaseStudyAboutSection {...about} />}
      {challenge && <ChallengeSection {...challenge} />}
      {goals && <GoalsSection {...goals} />}
      {solution && <OverviewSection {...solution} />}
      {features && <CapabilitiesGrid {...features} />}
      {stack && <TechStackSection {...stack} />}
      {process && <ProcessSteps {...process} />}
      {results && <ResultsSection {...results} />}
      {relatedCta && <CaseStudyRelatedCtaSection {...relatedCta} />}
      {faqBlock && <FaqSection {...faqBlock} />}
    </>
  );
}
