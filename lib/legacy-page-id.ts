const GEO_COUNTRY_KEYS = new Set(["usa", "saudi-arabia", "india"]);

export function getLegacyPageId(pathname: string): string {
  const normalized = pathname.endsWith("/") ? pathname : `${pathname}/`;
  const parts = normalized.replace(/^\/|\/$/g, "").split("/").filter(Boolean);

  if (parts.length === 2 && GEO_COUNTRY_KEYS.has(parts[0])) {
    return "location-detail";
  }

  if (normalized === "/" || normalized === "") return "home";
  if (normalized.startsWith("/services/") && normalized !== "/services/") return "service-detail";
  if (normalized === "/services/") return "services";
  if (normalized.startsWith("/technologies/") && normalized !== "/technologies/") {
    return "technology-detail";
  }
  if (normalized === "/technologies/") return "technologies";
  if (normalized.startsWith("/industries/") && normalized !== "/industries/") {
    return "industry-detail";
  }
  if (normalized === "/industries/") return "industries";
  if (normalized === "/about-us/") return "aboutus";
  if (normalized === "/contact-us/" || normalized.startsWith("/contact-us/")) return "contactus";
  if (normalized.startsWith("/case-studies/") && normalized !== "/case-studies/") {
    return "casestudy-detail";
  }
  if (normalized === "/hire-developers/") return "hire-index";
  if (normalized.startsWith("/hire-")) return "hire-developer";
  if (normalized === "/career/" || normalized.startsWith("/career/")) return "careers";
  if (normalized === "/portfolio/") return "portfolio";
  if (normalized === "/start-up-mvp/") return "process-detail";
  if (normalized === "/product-scaling/") return "process-detail";
  if (normalized === "/digital-transformation/") return "process-detail";
  if (normalized === "/engagement-model/") return "process-detail";
  if (normalized === "/404/") return "not-found";
  return "page";
}

export const LEGACY_PAGE_SCRIPTS: Record<string, string[]> = {
  home: ["/assets/js/home.js"],
  services: ["/assets/js/services.js"],
  "service-detail": ["/assets/js/service-detail.js"],
  technologies: ["/assets/js/technologies.js"],
  "technology-detail": ["/assets/js/technology-detail.js"],
  industries: ["/assets/js/industries.js"],
  "industry-detail": ["/assets/js/industry-detail.js"],
  aboutus: ["/assets/js/aboutus.js"],
  contactus: ["/assets/js/contactus.js"],
  "process-detail": ["/assets/js/process-detail.js"],
  "location-detail": ["/assets/js/location-detail.js"],
  "hire-developer": ["/assets/js/hire-developer.js"],
  "casestudy-detail": ["/assets/js/casestudy-detail.js"],
  careers: ["/assets/js/careers.js"],
};

/** Inline script: set body page-* class before deferred legacy JS runs. */
export const LEGACY_BODY_CLASS_SCRIPT = `
(function () {
  var GEO = ["usa", "saudi-arabia", "india"];
  function getPageId(pathname) {
    var normalized = pathname.endsWith("/") ? pathname : pathname + "/";
    var parts = normalized.replace(/^\\/?|\\/?$/g, "").split("/").filter(Boolean);
    if (parts.length === 2 && GEO.indexOf(parts[0]) !== -1) return "location-detail";
    if (normalized === "/" || normalized === "") return "home";
    if (normalized.indexOf("/services/") === 0 && normalized !== "/services/") return "service-detail";
    if (normalized === "/services/") return "services";
    if (normalized.indexOf("/technologies/") === 0 && normalized !== "/technologies/") return "technology-detail";
    if (normalized === "/technologies/") return "technologies";
    if (normalized.indexOf("/industries/") === 0 && normalized !== "/industries/") return "industry-detail";
    if (normalized === "/industries/") return "industries";
    if (normalized === "/about-us/") return "aboutus";
    if (normalized === "/contact-us/" || normalized.indexOf("/contact-us/") === 0) return "contactus";
    if (normalized.indexOf("/case-studies/") === 0 && normalized !== "/case-studies/") return "casestudy-detail";
    if (normalized === "/hire-developers/") return "hire-index";
    if (normalized.indexOf("/hire-") === 0) return "hire-developer";
    if (normalized === "/career/" || normalized.indexOf("/career/") === 0) return "careers";
    if (normalized === "/portfolio/") return "portfolio";
    if (normalized === "/start-up-mvp/") return "process-detail";
    if (normalized === "/product-scaling/") return "process-detail";
    if (normalized === "/digital-transformation/") return "process-detail";
    if (normalized === "/engagement-model/") return "process-detail";
    if (normalized === "/404/") return "not-found";
    return "page";
  }
  var body = document.body;
  if (!body) return;
  body.classList.add("bg-background", "antialiased", "page-" + getPageId(location.pathname));
})();
`;
