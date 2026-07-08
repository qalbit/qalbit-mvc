import { ServiceDetailPage } from "@/components/services/ServiceDetailPage";
import { createDetailPageHandlers } from "@/lib/pages/create-detail-page";
import {
  getServiceCanonical,
  getServiceEntityBySlug,
  getServiceStaticParams,
} from "@/lib/pages/service-page";

const handlers = createDetailPageHandlers({
  find: getServiceEntityBySlug,
  getStaticParams: getServiceStaticParams,
  getCanonical: (slug) => getServiceCanonical(slug),
  breadcrumbPrefix: { name: "Services", url: "/services/" },
  sectionPrefix: "service",
  PageComponent: ServiceDetailPage,
});

export const generateStaticParams = handlers.generateStaticParams;
export const generateMetadata = handlers.generateMetadata;
export const revalidate = handlers.revalidate;
export default handlers.Page;
