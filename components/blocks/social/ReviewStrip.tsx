import type { ReviewStripProps } from "@/lib/blocks/types";
import { Container, Section } from "@/components/ui";

export function ReviewStrip({
  title = "Reviewed & trusted by teams on leading platforms",
  items,
}: ReviewStripProps) {
  const headingId = "review-strip-heading";

  return (
    <Section
      className="bg-gradient-to-r from-accent-50 via-primary-50/40 to-accent-50 py-8"
      ariaLabelledBy={headingId}
    >
      <Container>
        <div className="flex flex-col gap-4">
          <h2
            id={headingId}
            className="text-center text-[11px] font-semibold uppercase tracking-[0.2em] text-slate-500 md:text-left"
          >
            {title}
          </h2>

          <div className="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-4">
            {items.map((item) => (
              <article
                key={item.name}
                className="flex items-center gap-3 rounded-md bg-white px-4 py-3 shadow-soft"
              >
                {item.logoSrc && (
                  <a
                    href={item.href}
                    target="_blank"
                    rel="noopener noreferrer nofollow"
                    className="shrink-0"
                  >
                    <img
                      src={item.logoSrc}
                      alt={item.logoAlt ?? `${item.name} reviews for QalbIT`}
                      className="h-8 w-auto"
                      loading="lazy"
                      decoding="async"
                    />
                  </a>
                )}
                <div className="space-y-0.5">
                  {item.platformLabel && (
                    <p className="text-[11px] font-medium text-slate-500">{item.platformLabel}</p>
                  )}
                  <p className="text-sm font-semibold text-slate-900">{item.name}</p>
                  {item.rating && (
                    <p className="text-[11px] text-slate-600">
                      {item.rating}
                      {item.detail && <span className="text-slate-500"> · {item.detail}</span>}
                    </p>
                  )}
                </div>
              </article>
            ))}
          </div>
        </div>
      </Container>
    </Section>
  );
}
