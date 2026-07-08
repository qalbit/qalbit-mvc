import { CaseStudyPage } from "@/components/blocks/layouts/CaseStudyPage";
import type { CaseStudyRecord } from "@/lib/blocks/case-study-mappers";
import type { FaqItem } from "@/lib/data";

interface CaseStudyDetailPageProps {
  caseStudy: CaseStudyRecord;
  faqs: FaqItem[];
}

export function CaseStudyDetailPage({ caseStudy, faqs }: CaseStudyDetailPageProps) {
  return <CaseStudyPage caseStudy={caseStudy} faqs={faqs} />;
}
