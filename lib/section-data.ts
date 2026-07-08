export type SectionDataMode = "boolean" | "value";

/**
 * Maps `dataSection` to legacy PHP/GSAP hook attributes.
 * Most sections use boolean `data-section-{name}`; CTA bands use `data-section="{name}"`.
 */
export function resolveSectionDataProps(
  dataSection?: string,
  mode?: SectionDataMode,
  extra?: Record<string, string | undefined>,
): Record<string, string> {
  const result: Record<string, string> = {};

  if (extra) {
    for (const [key, value] of Object.entries(extra)) {
      if (value !== undefined) result[key] = value;
    }
  }

  if (!dataSection) return result;

  const useValue = mode === "value" || dataSection.endsWith("-cta");
  if (useValue) {
    result["data-section"] = dataSection;
  } else {
    result[`data-section-${dataSection}`] = "";
  }

  return result;
}

export function entityHookAttr(prefix: string, suffix: string): string {
  return `data-${prefix}-${suffix}`;
}
