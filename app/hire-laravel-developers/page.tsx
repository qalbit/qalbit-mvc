import { createHirePage } from "@/lib/pages/hire-page";

const hirePage = createHirePage("laravel");

export const generateMetadata = hirePage.generateMetadata;
export const revalidate = hirePage.revalidate;
export default hirePage.Page;
