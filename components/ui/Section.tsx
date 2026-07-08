import { resolveSectionDataProps, type SectionDataMode } from "@/lib/section-data";
import { cn } from "@/lib/utils";

export function Section({
  id,
  children,
  className,
  ariaLabelledBy,
  dataSection,
  dataSectionMode,
  dataAttributes,
}: {
  id?: string;
  children: React.ReactNode;
  className?: string;
  ariaLabelledBy?: string;
  dataSection?: string;
  dataSectionMode?: SectionDataMode;
  dataAttributes?: Record<string, string>;
}) {
  return (
    <section
      id={id}
      className={cn(className)}
      aria-labelledby={ariaLabelledBy}
      {...resolveSectionDataProps(dataSection, dataSectionMode, dataAttributes)}
    >
      {children}
    </section>
  );
}
