import { Badge } from "./Badge";
import { HtmlText } from "./HtmlText";
import { cn } from "@/lib/utils";

export function SectionHeader({
  eyebrow,
  title,
  subtitle,
  align = "left",
  dark = false,
  id,
  className,
}: {
  eyebrow?: string;
  title: string;
  subtitle?: string;
  align?: "left" | "center";
  dark?: boolean;
  id?: string;
  className?: string;
}) {
  return (
    <header
      className={cn(
        align === "center" && "mx-auto max-w-2xl text-center",
        align === "left" && "max-w-2xl",
        className,
      )}
    >
      {eyebrow && (
        <Badge variant={dark ? "sky" : "default"} className="mb-4">
          {eyebrow}
        </Badge>
      )}
      <h2
        id={id}
        className={cn(
          "text-display-sm font-bold tracking-tight sm:text-display-md",
          dark && "text-white",
        )}
      >
        <HtmlText html={title} />
      </h2>
      {subtitle && (
        <p className={cn("mt-3 text-sm md:text-base", dark ? "text-slate-300" : "text-muted-foreground")}>
          {subtitle}
        </p>
      )}
    </header>
  );
}
