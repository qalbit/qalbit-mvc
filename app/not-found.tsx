import { NotFoundContent } from "@/components/blocks/errors/NotFoundContent";
import { notFoundMetadata } from "@/lib/seo/not-found";

export const metadata = notFoundMetadata;

export default function NotFound() {
  return <NotFoundContent />;
}
