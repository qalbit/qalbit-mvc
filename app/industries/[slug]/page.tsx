import { IndustryDetailPage } from "@/components/industries/IndustryDetailPage";
import { createDetailPageHandlers } from "@/lib/pages/create-detail-page";
import {
  getIndustryCanonical,
  getIndustryEntityBySlug,
  getIndustryStaticParams,
} from "@/lib/pages/industry-page";

const handlers = createDetailPageHandlers({
  find: getIndustryEntityBySlug,
  getStaticParams: getIndustryStaticParams,
  getCanonical: (slug) => getIndustryCanonical(slug),
  breadcrumbPrefix: { name: "Industries", url: "/industries/" },
  sectionPrefix: "industry",
  PageComponent: IndustryDetailPage,
});

export const generateStaticParams = handlers.generateStaticParams;
export const generateMetadata = handlers.generateMetadata;
export const revalidate = handlers.revalidate;
export default handlers.Page;
