import type { FaqItem } from "@/lib/data";
import {
  mapAboutCareer,
  mapAboutCaseStudies,
  mapAboutClients,
  mapAboutCulture,
  mapAboutFaq,
  mapAboutHero,
  mapAboutHowWeWork,
  mapAboutImpact,
  mapAboutLeader,
  mapAboutContactCta,
  mapAboutTechStack,
  mapAboutTrust,
  mapAboutWhatWeDo,
  mapAboutWho,
} from "@/lib/blocks/about-mappers";
import { AboutCareerSection } from "../about/AboutCareerSection";
import { AboutCaseStudiesSection } from "../about/AboutCaseStudiesSection";
import { AboutClientsSection } from "../about/AboutClientsSection";
import { AboutCultureSection } from "../about/AboutCultureSection";
import { AboutHowWeWorkSection } from "../about/AboutHowWeWorkSection";
import { AboutImpactSection } from "../about/AboutImpactSection";
import { AboutLeaderSection } from "../about/AboutLeaderSection";
import { AboutTechStackSection } from "../about/AboutTechStackSection";
import { AboutTrustSection } from "../about/AboutTrustSection";
import { AboutWhatWeDoSection } from "../about/AboutWhatWeDoSection";
import { AboutWhoSection } from "../about/AboutWhoSection";
import { ContactCtaSection } from "../cta/ContactCtaSection";
import { FaqSection } from "../faq/FaqSection";
import { AboutHero } from "../heroes/AboutHero";

export interface AboutPageProps {
  faqs: FaqItem[];
}

export function AboutPage({ faqs }: AboutPageProps) {
  const hero = mapAboutHero();
  const who = mapAboutWho();
  const whatWeDo = mapAboutWhatWeDo();
  const impact = mapAboutImpact();
  const clients = mapAboutClients();
  const leader = mapAboutLeader();
  const culture = mapAboutCulture();
  const howWeWork = mapAboutHowWeWork();
  const caseStudies = mapAboutCaseStudies();
  const techStack = mapAboutTechStack();
  const trust = mapAboutTrust();
  const career = mapAboutCareer();
  const faqBlock = mapAboutFaq(faqs);
  const contactCta = mapAboutContactCta();

  return (
    <>
      <AboutHero {...hero} />
      <AboutWhoSection {...who} />
      <AboutWhatWeDoSection {...whatWeDo} />
      <AboutImpactSection {...impact} />
      <AboutClientsSection {...clients} />
      <AboutLeaderSection {...leader} />
      <AboutCultureSection {...culture} />
      <AboutHowWeWorkSection {...howWeWork} />
      <AboutCaseStudiesSection {...caseStudies} />
      <AboutTechStackSection {...techStack} />
      <AboutTrustSection {...trust} />
      <AboutCareerSection {...career} />
      {faqBlock && <FaqSection {...faqBlock} />}
      <ContactCtaSection {...contactCta} />
    </>
  );
}
