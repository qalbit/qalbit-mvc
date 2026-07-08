/** Matches PHP `head.php` / `gtag-layer.js` / `main.js` cookie consent storage. */
export const COOKIE_CONSENT_KEY = "cookie-consent";

export const DEFAULT_COOKIE_CONSENT = {
  ad_storage: "granted",
  analytics_storage: "granted",
  personalization_storage: "granted",
  functionality_storage: "granted",
  security_storage: "granted",
} as const;

export type CookieConsentState = typeof DEFAULT_COOKIE_CONSENT;

export function readCookieConsent(): CookieConsentState | null {
  try {
    const raw = localStorage.getItem(COOKIE_CONSENT_KEY);
    if (!raw) return null;
    return JSON.parse(raw) as CookieConsentState;
  } catch {
    return null;
  }
}

export function hasCookieConsent(): boolean {
  return readCookieConsent() !== null;
}

export function acceptCookieConsent(): void {
  const consent = { ...DEFAULT_COOKIE_CONSENT };

  try {
    localStorage.setItem(COOKIE_CONSENT_KEY, JSON.stringify(consent));
  } catch {
    // ignore private mode / blocked storage
  }

  if (typeof window !== "undefined" && window.dataLayer) {
    window.dataLayer.push({ event: "cookie_consent_accepted" });
  }

  const gtag = (window as Window & { gtag?: (...args: unknown[]) => void }).gtag;
  if (typeof gtag === "function") {
    gtag("consent", "update", consent);
  }
}
