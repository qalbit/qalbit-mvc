import { describe, expect, it } from "vitest";
import { getProcessBySlug } from "@/lib/data";
import { mapProcessHero, mapProcessTimeline } from "./process-mappers";

describe("process-mappers", () => {
  const entity = getProcessBySlug("start-up-mvp");

  it("loads start-up MVP process page", () => {
    expect(entity).toBeDefined();
    expect(entity?.slug).toContain("start-up-mvp");
  });

  it("mapProcessHero returns hero props", () => {
    expect(entity).toBeDefined();
    const hero = mapProcessHero(entity!);
    expect(hero).not.toBeNull();
    expect(hero?.title).toBeTruthy();
    expect(hero?.primaryCta?.href).toBeTruthy();
  });

  it("mapProcessTimeline maps delivery steps when present", () => {
    expect(entity).toBeDefined();
    const timeline = mapProcessTimeline(entity!);
    if (timeline) {
      expect(timeline.steps.length).toBeGreaterThan(0);
      expect(timeline.steps[0].title).toBeTruthy();
    } else {
      expect(entity?.process ?? entity?.sections).toBeDefined();
    }
  });
});
