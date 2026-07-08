import { createHirePage } from "@/lib/pages/hire-page";

const hirePage = createHirePage("mvp");

export const generateMetadata = hirePage.generateMetadata;
export const revalidate = hirePage.revalidate;
export default hirePage.Page;
