import type { Metadata } from "next";
import { Poppins } from "next/font/google";
import "./globals.css";
import { SiteModals } from "@/components/common/SiteModals";
import { Footer } from "@/components/layout/Footer";
import { Header } from "@/components/layout/Header";
import { LegacyAssets } from "@/components/layout/LegacyAssets";
import { GtmNoScript, HeadScripts } from "@/components/seo/HeadScripts";
import { LEGACY_BODY_CLASS_SCRIPT } from "@/lib/legacy-page-id";
import { buildMetadata } from "@/lib/seo/metadata";

const poppins = Poppins({
  subsets: ["latin"],
  weight: ["400", "500", "600", "700"],
  display: "swap",
  variable: "--font-poppins",
});

export const metadata: Metadata = buildMetadata({
  title: "QalbIT – Custom Software Development Company",
  description:
    "QalbIT builds custom software, web applications, mobile apps and SaaS platforms for startups and enterprises worldwide.",
  canonical: "/",
});

export default function RootLayout({ children }: { children: React.ReactNode }) {
  return (
    <html lang="en" className={poppins.variable}>
      <head>
        <meta name="next-app" content="1" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossOrigin="anonymous" />
        <link rel="icon" href="/assets/favicon.ico" sizes="any" />
        <link rel="icon" href="/assets/favicon.svg" type="image/svg+xml" />
        <link rel="apple-touch-icon" href="/assets/apple-touch-icon.png" />
        <HeadScripts />
        {process.env.NEXT_PUBLIC_RECAPTCHA_SITE_KEY && (
          <script
            src={`https://www.google.com/recaptcha/api.js?render=${process.env.NEXT_PUBLIC_RECAPTCHA_SITE_KEY}`}
            async
            defer
          />
        )}
      </head>
      <body className={`${poppins.className} min-h-screen bg-background text-foreground antialiased`}>
        <script dangerouslySetInnerHTML={{ __html: LEGACY_BODY_CLASS_SCRIPT }} />
        <GtmNoScript />
        <Header />
        <main id="main-content">{children}</main>
        <Footer />
        <SiteModals />
        <LegacyAssets />
      </body>
    </html>
  );
}
