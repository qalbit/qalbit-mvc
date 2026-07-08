import type { ProseBlockProps } from "@/lib/blocks/types";
import { Container, Section } from "@/components/ui";

export function ProseSection({ id, title, html, children, dataPage }: ProseBlockProps) {
  return (
    <Section
      id={id}
      className="py-12 sm:py-16"
      dataAttributes={dataPage ? { "data-page": dataPage } : undefined}
    >
      <Container size="narrow">
        {title && <h1 className="text-display-md font-bold tracking-tight">{title}</h1>}
        {html && (
          <div
            className="prose prose-slate mt-8 max-w-none prose-headings:font-semibold prose-a:text-primary-700"
            dangerouslySetInnerHTML={{ __html: html }}
          />
        )}
        {children}
      </Container>
    </Section>
  );
}
