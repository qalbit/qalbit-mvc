import { describe, expect, it } from "vitest";
import { getCaseStudyBySlug } from "@/lib/data";
import { mapCaseStudyChallenge, mapCaseStudyHero } from "./case-study-mappers";

describe("case-study-mappers", () => {
  const caseStudy = getCaseStudyBySlug("snappystats");

  it("loads Snappy Stats case study", () => {
    expect(caseStudy).toBeDefined();
    expect(caseStudy?.slug).toContain("snappystats");
  });

  it("mapCaseStudyHero includes title and CTAs", () => {
    expect(caseStudy).toBeDefined();
    const hero = mapCaseStudyHero(caseStudy!);
    expect(hero.title).toBeTruthy();
    expect(hero.breadcrumbLabel).toBe(caseStudy!.name);
    expect(hero.primaryCta?.href).toBeTruthy();
  });

  it("mapCaseStudyChallenge maps challenge bullets", () => {
    expect(caseStudy).toBeDefined();
    const challenge = mapCaseStudyChallenge(caseStudy!);
    if (challenge) {
      expect(challenge.challenges.length).toBeGreaterThan(0);
    } else {
      expect(caseStudy?.sections).toBeDefined();
    }
  });
});
