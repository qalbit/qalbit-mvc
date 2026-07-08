import type { IndexHeroProps } from "@/lib/blocks/types";
import { DetailHero } from "./DetailHero";

/** Index listing hero (services, industries, technologies) — snapshot card layout from PHP `hero/service.php`. */
export function IndexHero(props: IndexHeroProps) {
  const { responseNote, sectionWrapperData = { "data-section-services": "" }, ...heroProps } = props;

  return (
    <div {...sectionWrapperData}>
      <DetailHero {...heroProps} dataSection={heroProps.dataSection ?? "index-hero"} />
      {responseNote && (
        <p className="mx-auto max-w-6xl px-4 pb-4 text-center text-[11px] text-slate-600 md:text-left">
          {responseNote}
        </p>
      )}
    </div>
  );
}
