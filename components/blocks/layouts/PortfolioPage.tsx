import type { FaqItem, PortfolioItem } from "@/lib/data";
import {
  filterPortfolioItems,
  mapPortfolioFeatured,
  mapPortfolioFilters,
  mapPortfolioFinalCta,
  mapPortfolioFaq,
  mapPortfolioGrid,
  mapPortfolioHero,
} from "@/lib/blocks/portfolio-mappers";
import { PortfolioFeaturedSection } from "../portfolio/PortfolioFeaturedSection";
import { PortfolioFinalCtaSection } from "../portfolio/PortfolioFinalCtaSection";
import { PortfolioFilters } from "../portfolio/PortfolioFilters";
import { PortfolioGrid } from "../portfolio/PortfolioGrid";
import { PortfolioIndexHero } from "../portfolio/PortfolioIndexHero";
import { FaqSection } from "../faq/FaqSection";
import { PortfolioFilterBridge } from "@/components/portfolio/PortfolioFilterBridge";

export interface PortfolioPageProps {
  items: PortfolioItem[];
  faqs: FaqItem[];
  activeIndustry?: string | null;
  activeTechnology?: string | null;
}

export function PortfolioPage({
  items,
  faqs,
  activeIndustry,
  activeTechnology,
}: PortfolioPageProps) {
  const hero = mapPortfolioHero();
  const filters = mapPortfolioFilters(activeIndustry, activeTechnology);
  const featured = mapPortfolioFeatured(items);
  const filtered = filterPortfolioItems(items, activeIndustry, activeTechnology);
  const grid = mapPortfolioGrid(filtered);
  const faqBlock = mapPortfolioFaq(faqs);
  const finalCta = mapPortfolioFinalCta();

  return (
    <>
      <PortfolioFilterBridge />
      <PortfolioIndexHero {...hero} />
      <PortfolioFilters {...filters} />
      {featured && <PortfolioFeaturedSection {...featured} />}
      <PortfolioGrid {...grid} />
      {faqBlock && <FaqSection {...faqBlock} />}
      {finalCta && <PortfolioFinalCtaSection {...finalCta} />}
    </>
  );
}
