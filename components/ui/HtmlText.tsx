import { cn } from "@/lib/utils";

/** Renders config HTML (titles with gradient spans). Source is trusted JSON export. */
export function HtmlText({
  html,
  as: Tag = "span",
  className,
}: {
  html: string;
  as?: "span" | "h1" | "h2" | "h3" | "p" | "div";
  className?: string;
}) {
  if (!html.includes("<")) {
    return <Tag className={className}>{html}</Tag>;
  }

  return (
    <Tag className={cn(className)} dangerouslySetInnerHTML={{ __html: html }} />
  );
}
