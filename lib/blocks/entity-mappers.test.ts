import { describe, expect, it } from "vitest";
import { getServiceBySlug } from "@/lib/data";
import { mapCapabilities, mapDetailHero, mapFaqBlock, mapOverview } from "./entity-mappers";

describe("entity-mappers", () => {
  const entity = getServiceBySlug("custom-software-development");

  it("loads a known service entity", () => {
    expect(entity).toBeDefined();
    expect(entity?.slug).toContain("custom-software");
  });

  it("mapDetailHero uses entity name and default CTA", () => {
    expect(entity).toBeDefined();
    const hero = mapDetailHero(entity!, [{ label: "Services", href: "/services/" }]);
    expect(hero.title).toBeTruthy();
    expect(hero.primaryCta.href).toContain("/contact-us/");
    expect(hero.breadcrumbs?.[0]?.label).toBe("Services");
  });

  it("mapOverview returns block when overview exists", () => {
    expect(entity).toBeDefined();
    const overview = mapOverview(entity!);
    expect(overview).not.toBeNull();
    expect(overview?.title).toBeTruthy();
  });

  it("mapCapabilities maps capability items", () => {
    expect(entity).toBeDefined();
    const capabilities = mapCapabilities(entity!);
    expect(capabilities).not.toBeNull();
    expect(capabilities?.items.length).toBeGreaterThan(0);
  });

  it("mapFaqBlock builds FAQ section from faq fields", () => {
    expect(entity).toBeDefined();
    const faq = mapFaqBlock(entity!, [
      { question: "Test?", answer: "Yes." },
    ]);
    expect(faq).not.toBeNull();
    expect(faq?.faqs).toHaveLength(1);
    expect(faq?.faqs[0].question).toBe("Test?");
  });
});
