import { CareerApplyView } from "@/components/careers/CareerApplyView";
import { findCareerRoleBySlug, getCareerRoleLabels } from "@/lib/careers-data";
import { buildMetadata } from "@/lib/seo/metadata";

export function generateMetadata({
  searchParams,
}: {
  searchParams: { role?: string };
}) {
  const roleSlug = searchParams.role?.trim() ?? "";
  const selected = roleSlug ? findCareerRoleBySlug(roleSlug) : undefined;

  if (selected) {
    const roleTitle = selected.title ?? roleSlug.replace(/-/g, " ");
    return buildMetadata({
      title: `Apply – ${roleTitle} | Careers at QalbIT`,
      description: `Apply for the ${roleTitle} role at QalbIT. Share your experience, projects and resume.`,
      canonical: `/career/apply/?role=${encodeURIComponent(roleSlug)}`,
    });
  }

  return buildMetadata({
    title: "Apply for a role at QalbIT",
    description:
      "Submit your profile, experience and resume to apply for current or future roles at QalbIT.",
    canonical: "/career/apply/",
  });
}

export default function CareerApplyPage({
  searchParams,
}: {
  searchParams: { role?: string };
}) {
  const roleSlug = searchParams.role?.trim() ?? "";
  const selected = roleSlug ? findCareerRoleBySlug(roleSlug) : undefined;

  const roleTitle = selected
    ? (selected.title ?? roleSlug.replace(/-/g, " "))
    : undefined;

  const roleLabels = selected ? getCareerRoleLabels(selected) : undefined;

  return (
    <CareerApplyView
      roleSlug={roleSlug}
      roleTitle={roleTitle}
      roleTeam={roleLabels?.team}
      roleLocation={roleLabels?.location}
      roleExperience={roleLabels?.experience}
    />
  );
}
