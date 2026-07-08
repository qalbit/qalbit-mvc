import careersJson from "@/lib/data/careers.json";
import type { FaqItem } from "@/lib/data";
import {
  mapCareersBenefits,
  mapCareersFinalCta,
  mapCareersFaq,
  mapCareersHero,
  mapCareersLife,
  mapCareersOpenings,
  mapCareersWhy,
} from "@/lib/blocks/careers-mappers";
import { BenefitsGrid } from "../careers/BenefitsGrid";
import { CareersFinalCtaSection } from "../careers/CareersFinalCtaSection";
import { CareersHeroSection } from "../careers/CareersHeroSection";
import { CareersLifeSection } from "../careers/CareersLifeSection";
import { CareersWhySection } from "../careers/CareersWhySection";
import { OpeningsGrid } from "../careers/OpeningsGrid";
import { FaqSection } from "../faq/FaqSection";

export interface CareersPageProps {
  faqs: FaqItem[];
}

export function CareersPage({ faqs }: CareersPageProps) {
  const data = careersJson;
  const sections = data.sections;

  const hero = mapCareersHero(sections);
  const why = mapCareersWhy(sections);
  const openings = mapCareersOpenings(data);
  const benefits = mapCareersBenefits(sections);
  const life = mapCareersLife(sections);
  const faqBlock = mapCareersFaq(data.page, faqs);
  const finalCta = mapCareersFinalCta(sections);

  return (
    <>
      <CareersHeroSection {...hero} />
      <CareersWhySection {...why} />
      <OpeningsGrid {...openings} />
      <BenefitsGrid {...benefits} />
      <CareersLifeSection {...life} />
      {faqBlock && <FaqSection {...faqBlock} />}
      <CareersFinalCtaSection {...finalCta} />
    </>
  );
}
