import type { ChallengeSectionProps } from "@/lib/blocks/types";
import { Container, Section, SectionHeader } from "@/components/ui";

export function ChallengeSection({
  id = "cs3-challenge",
  title = "The challenge",
  beforeTitle = "Before the product existed",
  beforeStory,
  bulletsTitle = "Key challenges we uncovered",
  challenges,
}: ChallengeSectionProps) {
  const headingId = `${id}-heading`;

  return (
    <Section
      id={id}
      className="bg-white py-14 sm:py-18"
      ariaLabelledBy={headingId}
      dataAttributes={{ "data-cs-section": "challenge" }}
    >
      <Container>
        <div data-cs-el="challenge-heading">
          <SectionHeader title={title} id={headingId} />
        </div>

        <div className="mt-10 grid gap-8 lg:grid-cols-2">
          {(beforeStory || beforeTitle) && (
            <div className="space-y-3 rounded-2xl border border-slate-200 bg-slate-50 p-6" data-cs-el="challenge-story">
              <h3 className="text-sm font-semibold text-slate-900">{beforeTitle}</h3>
              {beforeStory && <p className="text-sm text-slate-600">{beforeStory}</p>}
            </div>
          )}

          {challenges && challenges.length > 0 && (
            <div className="space-y-4" data-cs-el="challenge-list">
              <h3 className="text-sm font-semibold text-slate-900">{bulletsTitle}</h3>
              <ul className="space-y-2 text-sm text-slate-600">
                {challenges.map((item) => (
                  <li key={item} className="flex gap-2" data-cs-el="challenge-item">
                    <span className="mt-2 h-1.5 w-1.5 flex-none rounded-full bg-primary" />
                    <span>{item}</span>
                  </li>
                ))}
              </ul>
            </div>
          )}
        </div>
      </Container>
    </Section>
  );
}
