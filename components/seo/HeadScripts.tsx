import Script from "next/script";
import { env } from "@/lib/env";

export function HeadScripts() {
  const gtmId = env.NEXT_PUBLIC_GTM_ID;

  if (!gtmId) return null;

  return (
    <Script
      id="gtag-layer"
      src="/assets/js/gtag-layer.js"
      data-gtm-id={gtmId}
      strategy="beforeInteractive"
    />
  );
}

export function GtmNoScript() {
  const gtmId = env.NEXT_PUBLIC_GTM_ID;
  if (!gtmId) return null;

  return (
    <noscript>
      <iframe
        src={`https://www.googletagmanager.com/ns.html?id=${gtmId}`}
        height="0"
        width="0"
        style={{ display: "none", visibility: "hidden" }}
        title="Google Tag Manager"
      />
    </noscript>
  );
}
