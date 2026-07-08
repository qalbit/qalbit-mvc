"use client";

import Script from "next/script";
import { usePathname } from "next/navigation";
import { useEffect, useState } from "react";
import { getLegacyPageId, LEGACY_PAGE_SCRIPTS } from "@/lib/legacy-page-id";

export function LegacyAssets() {
  const pathname = usePathname() ?? "/";
  const normalized = pathname.endsWith("/") ? pathname : `${pathname}/`;
  const pageId = getLegacyPageId(normalized);
  const extraScripts = LEGACY_PAGE_SCRIPTS[pageId] ?? [];

  const [gsapReady, setGsapReady] = useState(false);
  const [scrollTriggerReady, setScrollTriggerReady] = useState(false);
  const [mainReady, setMainReady] = useState(false);
  const [pageScriptsReady, setPageScriptsReady] = useState(false);

  useEffect(() => {
    const body = document.body;
    body.classList.add("bg-background", "antialiased");

    const pageClasses = Array.from(body.classList).filter((c) => c.startsWith("page-"));
    pageClasses.forEach((c) => body.classList.remove(c));
    body.classList.add(`page-${pageId}`);
    setPageScriptsReady(true);

    return () => {
      body.classList.remove(`page-${pageId}`);
      setPageScriptsReady(false);
    };
  }, [pageId]);

  return (
    <>
      {pageId === "home" && <link rel="stylesheet" href="/assets/css/home.css" />}
      <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/intl-tel-input@25.12.5/build/css/intlTelInput.css"
      />

      <Script
        src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.13.0/gsap.min.js"
        strategy="afterInteractive"
        crossOrigin="anonymous"
        onLoad={() => setGsapReady(true)}
      />

      {gsapReady && (
        <Script
          src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"
          strategy="afterInteractive"
          onLoad={() => setScrollTriggerReady(true)}
        />
      )}

      {gsapReady && (
        <Script
          src="/assets/js/main.js"
          strategy="afterInteractive"
          onLoad={() => setMainReady(true)}
        />
      )}

      {mainReady && (
        <Script
          src="https://cdn.jsdelivr.net/npm/intl-tel-input@25.12.5/build/js/intlTelInput.min.js"
          strategy="afterInteractive"
        />
      )}

      {gsapReady &&
        mainReady &&
        pageScriptsReady &&
        extraScripts.map((src) => (
          <Script key={`${pageId}-${src}`} src={src} strategy="afterInteractive" />
        ))}
    </>
  );
}
