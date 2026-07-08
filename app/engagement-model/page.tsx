import { createProcessPage } from "@/lib/pages/process-page";

const processPage = createProcessPage("engagement-model");

export const generateMetadata = processPage.generateMetadata;
export const revalidate = processPage.revalidate;
export default processPage.Page;
