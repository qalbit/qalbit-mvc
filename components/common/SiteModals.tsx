import { CookieConsent } from "./CookieConsent";
import { ExitIntentModal } from "./ExitIntentModal";
import { FloatingStack } from "./FloatingStack";
import { TawkChat } from "./TawkChat";

/** Global site chrome: cookie banner, scroll-to-top, exit-intent popup, live chat. */
export function SiteModals() {
  return (
    <>
      <CookieConsent />
      <FloatingStack />
      <ExitIntentModal />
      <TawkChat />
    </>
  );
}
