import type { FaqItem, Review } from "@/lib/data";
import {
  mapHomeCaseStudies,
  mapHomeClients,
  mapHomeContactCta,
  mapHomeFaq,
  mapHomeHero,
  mapHomeIndustries,
  mapHomeProcess,
  mapHomeReviewStrip,
  mapHomeReviews,
  mapHomeServices,
  mapHomeTeamCta,
  mapHomeTechnologies,
} from "@/lib/blocks/home-mappers";
import { HomeCaseStudiesSection } from "../content/HomeCaseStudiesSection";
import { HomeIndustriesSection } from "../content/HomeIndustriesSection";
import { HomeProcessSection } from "../content/HomeProcessSection";
import { HomeServicesSection } from "../content/HomeServicesSection";
import { HomeTechnologiesSection } from "../content/HomeTechnologiesSection";
import { ContactCtaSection } from "../cta/ContactCtaSection";
import { TeamCtaSection } from "../cta/TeamCtaSection";
import { FaqSection } from "../faq/FaqSection";
import { HomeHero } from "../heroes/HomeHero";
import { ClientMarquee } from "../social/ClientMarquee";
import { ReviewStrip } from "../social/ReviewStrip";
import { ReviewsSection } from "../social/ReviewsSection";

export interface HomePageProps {
  faqs: FaqItem[];
  reviews: Review[];
}

export function HomePage({ faqs, reviews }: HomePageProps) {
  const hero = mapHomeHero();
  const reviewStrip = mapHomeReviewStrip();
  const services = mapHomeServices();
  const industries = mapHomeIndustries();
  const process = mapHomeProcess();
  const caseStudies = mapHomeCaseStudies();
  const reviewsBlock = mapHomeReviews(reviews);
  const technologies = mapHomeTechnologies();
  const clients = mapHomeClients();
  const teamCta = mapHomeTeamCta();
  const faqBlock = mapHomeFaq(faqs);
  const contactCta = mapHomeContactCta();

  return (
    <>
      <HomeHero {...hero} />
      <ReviewStrip {...reviewStrip} />
      <HomeServicesSection {...services} />
      <HomeIndustriesSection {...industries} />
      <HomeProcessSection {...process} />
      <HomeCaseStudiesSection {...caseStudies} />
      <ReviewsSection {...reviewsBlock} />
      <HomeTechnologiesSection {...technologies} />
      <ClientMarquee {...clients} />
      <TeamCtaSection {...teamCta} />
      {faqBlock && <FaqSection {...faqBlock} />}
      <ContactCtaSection {...contactCta} />
    </>
  );
}
