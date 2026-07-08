import careersJson from "@/lib/data/careers.json";

type CareersData = typeof careersJson;

export type CareerRole = CareersData["roles"][keyof CareersData["roles"]];

export function normalizeCareerApplyHref(href?: string, slug?: string): string {
  if (href) {
    if (href.startsWith("/apply/") || href.startsWith("/apply?")) {
      return `/career${href}`;
    }
    return href;
  }
  return slug ? `/career/apply/?role=${encodeURIComponent(slug)}` : "/career/apply/";
}

export function findCareerRoleBySlug(slug: string): CareerRole | undefined {
  const roles = careersJson.roles as Record<string, CareerRole & { slug?: string }>;
  for (const [id, role] of Object.entries(roles)) {
    if ((role.slug ?? id) === slug) {
      return role;
    }
  }
  return undefined;
}

export function getCareerRoleLabels(role: CareerRole) {
  const filters = careersJson.filters;
  const teams = filters.teams as Record<string, string>;
  const locations = filters.locations as Record<string, string>;
  const experience = filters.experience_levels as Record<string, string>;

  return {
    team: teams[role.team] ?? role.team,
    location: locations[role.location] ?? role.mode ?? role.location,
    experience: experience[role.experience] ?? role.experience,
  };
}
