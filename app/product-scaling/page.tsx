import { createProcessPage } from "@/lib/pages/process-page";

const processPage = createProcessPage("product-scaling");

export const generateMetadata = processPage.generateMetadata;
export const revalidate = processPage.revalidate;
export default processPage.Page;
