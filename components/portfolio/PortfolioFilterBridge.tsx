"use client";

import { useEffect } from "react";
import { usePathname, useSearchParams } from "next/navigation";

/**
 * Applies portfolio industry/tech filters from URL query params to the legacy
 * grid (all items are in the static HTML). Matches PHP server-side filtering
 * when users submit the GET filter form.
 */
export function PortfolioFilterBridge() {
  const pathname = usePathname();
  const searchParams = useSearchParams();

  useEffect(() => {
    const industry = searchParams.get("industry")?.trim() ?? "";
    const tech = searchParams.get("tech")?.trim() ?? "";

    const form = document.querySelector<HTMLFormElement>(
      "[data-portfolio-el=\"filters-form\"]",
    );
    if (form) {
      const industrySelect = form.querySelector<HTMLSelectElement>(
        "select[name=\"industry\"]",
      );
      const techSelect = form.querySelector<HTMLSelectElement>(
        "select[name=\"tech\"]",
      );
      if (industrySelect) industrySelect.value = industry;
      if (techSelect) techSelect.value = tech;
    }

    if (!industry && !tech) {
      const cards = document.querySelectorAll("[data-portfolio-el=\"grid-card\"]");
      cards.forEach((card) => {
        (card as HTMLElement).style.display = "";
      });
      const grid = document.querySelector("[data-portfolio-el=\"grid\"]");
      const emptyFiltered = document.querySelector(
        "[data-portfolio-el=\"grid-empty-filtered\"]",
      );
      if (grid) (grid as HTMLElement).style.display = "";
      if (emptyFiltered) emptyFiltered.classList.add("hidden");
      return;
    }

    const cards = document.querySelectorAll("[data-portfolio-el=\"grid-card\"]");
    let visibleCount = 0;

    cards.forEach((card) => {
      const industries =
        card.getAttribute("data-portfolio-industries")?.split(",").filter(Boolean) ?? [];
      const technologies =
        card.getAttribute("data-portfolio-technologies")?.split(",").filter(Boolean) ?? [];

      const matchesIndustry = !industry || industries.includes(industry);
      const matchesTech = !tech || technologies.includes(tech);
      const show = matchesIndustry && matchesTech;

      (card as HTMLElement).style.display = show ? "" : "none";
      if (show) visibleCount += 1;
    });

    const grid = document.querySelector("[data-portfolio-el=\"grid\"]");
    const emptyFiltered = document.querySelector(
      "[data-portfolio-el=\"grid-empty-filtered\"]",
    );

    if (visibleCount === 0) {
      if (grid) (grid as HTMLElement).style.display = "none";
      if (emptyFiltered) emptyFiltered.classList.remove("hidden");
    } else {
      if (grid) (grid as HTMLElement).style.display = "";
      if (emptyFiltered) emptyFiltered.classList.add("hidden");
    }
  }, [pathname, searchParams]);

  return null;
}
