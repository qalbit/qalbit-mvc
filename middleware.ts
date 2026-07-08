import type { NextRequest } from "next/server";
import { NextResponse } from "next/server";

const SECURITY_HEADERS: Record<string, string> = {
  "X-Frame-Options": "DENY",
  "X-Content-Type-Options": "nosniff",
  "Referrer-Policy": "strict-origin-when-cross-origin",
  "X-DNS-Prefetch-Control": "on",
  "Permissions-Policy": "camera=(), microphone=(), geolocation=()",
};

export function middleware(request: NextRequest) {
  const { pathname } = request.nextUrl;

  // Legacy path aliases (parity with old bookmarks and marketing links).
  if (pathname === "/apply" || pathname === "/apply/") {
    const url = request.nextUrl.clone();
    url.pathname = "/career/apply/";
    return NextResponse.redirect(url, 308);
  }

  if (pathname === "/contact" || pathname === "/contact/") {
    const url = request.nextUrl.clone();
    url.pathname = "/contact-us/";
    return NextResponse.redirect(url, 308);
  }

  const response = NextResponse.next();

  for (const [key, value] of Object.entries(SECURITY_HEADERS)) {
    response.headers.set(key, value);
  }

  if (process.env.NODE_ENV === "production") {
    response.headers.set(
      "Strict-Transport-Security",
      "max-age=63072000; includeSubDomains; preload",
    );
  }

  return response;
}

export const config = {
  matcher: [
    "/((?!_next/static|_next/image|favicon.ico|assets/).*)",
  ],
};
