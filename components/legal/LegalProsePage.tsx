import { ProseSection } from "@/components/blocks/content/ProseSection";
import { readLegalHtml } from "@/lib/legal-content";

export function LegalProsePage({ page }: { page: string }) {
  const html = readLegalHtml(page);
  if (!html) return null;

  return <ProseSection dataPage={page} html={html} />;
}
