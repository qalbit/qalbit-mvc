import { TechnologyDetailPage } from "@/components/technologies/TechnologyDetailPage";
import { createDetailPageHandlers } from "@/lib/pages/create-detail-page";
import {
  getTechnologyCanonical,
  getTechnologyEntityBySlug,
  getTechnologyStaticParams,
} from "@/lib/pages/technology-page";

const handlers = createDetailPageHandlers({
  find: getTechnologyEntityBySlug,
  getStaticParams: getTechnologyStaticParams,
  getCanonical: (slug) => getTechnologyCanonical(slug),
  breadcrumbPrefix: { name: "Technologies", url: "/technologies/" },
  sectionPrefix: "technology",
  PageComponent: TechnologyDetailPage,
});

export const generateStaticParams = handlers.generateStaticParams;
export const generateMetadata = handlers.generateMetadata;
export const revalidate = handlers.revalidate;
export default handlers.Page;
