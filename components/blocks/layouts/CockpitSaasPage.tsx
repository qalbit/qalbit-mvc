import {
  mapCockpitCta,
  mapCockpitFeatures,
  mapCockpitPricing,
  mapCockpitSaasHero,
} from "@/lib/blocks/cockpit-mappers";
import { CockpitFeaturesSection } from "../cockpit/CockpitFeaturesSection";
import { CockpitPricingSection } from "../cockpit/CockpitPricingSection";
import { CockpitSaasHero } from "../cockpit/CockpitSaasHero";
import { ContactCtaSection } from "../cta/ContactCtaSection";

type CockpitSaasPageProps = {
  showHero?: boolean;
  pricingOnly?: boolean;
};

export function CockpitSaasPage({ showHero = true, pricingOnly = false }: CockpitSaasPageProps) {
  const hero = mapCockpitSaasHero();
  const features = mapCockpitFeatures();
  const pricing = mapCockpitPricing();
  const cta = mapCockpitCta();

  return (
    <>
      {showHero && <CockpitSaasHero {...hero} />}
      {!pricingOnly && <CockpitFeaturesSection items={features} />}
      <CockpitPricingSection tiers={pricing} />
      {!pricingOnly && (
        <ContactCtaSection
          id="section-cockpit-cta"
          eyebrow="Get started"
          title={cta.title}
          body={cta.body}
          primaryCta={cta.primaryCta}
          leadFrom="cockpit_saas_page"
        />
      )}
    </>
  );
}
