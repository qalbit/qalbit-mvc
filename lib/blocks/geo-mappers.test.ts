import { describe, expect, it } from "vitest";
import { getGeoByCountryState } from "@/lib/data";
import { mapGeoBreadcrumbs, mapGeoHero } from "./geo-mappers";

describe("geo-mappers", () => {
  const location = getGeoByCountryState("usa", "california");

  it("loads a known geo location", () => {
    expect(location).toBeDefined();
    expect(location?.country_key).toBe("usa");
    expect(location?.state_key).toBe("california");
  });

  it("mapGeoBreadcrumbs includes country and state", () => {
    expect(location).toBeDefined();
    const crumbs = mapGeoBreadcrumbs(location!);
    expect(crumbs.length).toBeGreaterThanOrEqual(2);
    expect(crumbs[0].label).toBe("Home");
    expect(crumbs.some((c) => c.label === location!.name || c.label.includes("California"))).toBe(
      true,
    );
  });

  it("mapGeoHero returns title and CTAs", () => {
    expect(location).toBeDefined();
    const crumbs = mapGeoBreadcrumbs(location!);
    const hero = mapGeoHero(location!, crumbs);
    expect(hero).not.toBeNull();
    expect(hero?.title).toBeTruthy();
    expect(hero?.primaryCta?.href).toBeTruthy();
  });
});
