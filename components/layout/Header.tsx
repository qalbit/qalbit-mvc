"use client";

import Link from "next/link";
import { usePathname } from "next/navigation";
import { useCallback, useEffect, useState } from "react";
import { navigation } from "@/lib/data";
import { asset } from "@/lib/site";
import { cn } from "@/lib/utils";

type NavItem = {
  label: string;
  url?: string;
  title?: string;
  child?: NavItem[];
};

function normalizePath(path: string): string {
  if (path !== "/" && path.endsWith("/")) return path.slice(0, -1);
  return path;
}

function activeClass(currentPath: string, itemUrl: string): string {
  const current = normalizePath(currentPath);
  const target = normalizePath(itemUrl);

  if (target === "/") {
    return current === "/" ? "text-primary-900" : "text-slate-600";
  }
  if (target === "") {
    return "text-slate-600";
  }

  return current.startsWith(target) ? "text-primary-700" : "text-slate-600";
}

function DesktopChevron() {
  return (
    <svg
      xmlns="http://www.w3.org/2000/svg"
      fill="none"
      viewBox="0 0 24 24"
      strokeWidth={2}
      stroke="currentColor"
      className="h-4 w-4 text-slate-600 transition-transform group-hover:rotate-180 group-hover:text-primary-900"
      aria-hidden="true"
    >
      <path strokeLinecap="round" strokeLinejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
    </svg>
  );
}

export function Header() {
  const pathname = usePathname();
  const mainNav = (navigation.main ?? []) as NavItem[];

  const [mobileOpen, setMobileOpen] = useState(false);
  const [expandedSubmenus, setExpandedSubmenus] = useState<Set<number>>(() => new Set());

  const closeMobile = useCallback(() => {
    setMobileOpen(false);
    setExpandedSubmenus(new Set());
  }, []);

  const openMobile = useCallback(() => {
    setMobileOpen(true);
  }, []);

  const toggleSubmenu = useCallback((index: number) => {
    setExpandedSubmenus((prev) => {
      const next = new Set(prev);
      if (next.has(index)) {
        next.delete(index);
      } else {
        next.add(index);
      }
      return next;
    });
  }, []);

  useEffect(() => {
    if (!mobileOpen) return;

    const previousOverflow = document.body.style.overflow;
    document.body.style.overflow = "hidden";

    const onKeyDown = (event: KeyboardEvent) => {
      if (event.key === "Escape") closeMobile();
    };

    document.addEventListener("keydown", onKeyDown);
    return () => {
      document.body.style.overflow = previousOverflow;
      document.removeEventListener("keydown", onKeyDown);
    };
  }, [mobileOpen, closeMobile]);

  return (
    <header
      className="site-header sticky top-0 z-50 overflow-visible bg-slate-50"
      role="banner"
      data-site-header="react"
    >
      <a
        href="#main-content"
        className="sr-only focus:not-sr-only focus:absolute focus:left-4 focus:top-3 focus:z-50 focus:rounded-md focus:bg-primary-600 focus:px-3 focus:py-2 focus:text-xs focus:font-semibold focus:text-white"
      >
        Skip to main content
      </a>

      <div className="site-header-bar mx-auto flex h-16 max-w-6xl items-center justify-between overflow-visible px-4">
        <Link href="/" className="flex h-full shrink-0 items-center gap-2" aria-label="QalbIT home">
          <img
            src={asset("images/brand/logo-primary.svg")}
            alt="QalbIT Infotech Pvt Ltd logo"
            height={34}
            width={139}
          />
        </Link>

        {mainNav.length > 0 && (
          <nav
            className="hidden h-full shrink-0 items-center overflow-visible text-sm lg:flex"
            aria-label="Primary navigation"
          >
            {mainNav.map((item) => {
              const itemUrl = item.url ?? "/";
              const hasLink = Boolean(item.url);
              const children = item.child ?? [];
              const hasChildren = children.length > 0;
              const textColor = activeClass(pathname, itemUrl);
              const itemTitle = item.title ?? item.label;

              if (hasChildren) {
                return (
                  <div
                    key={item.label}
                    className="nav-item-has-dropdown group relative flex h-full items-stretch"
                  >
                    {hasLink ? (
                      <Link
                        href={itemUrl}
                        className={cn(
                          "flex h-full items-center justify-center gap-1 px-3 font-medium transition-colors hover:text-primary-900",
                          textColor,
                        )}
                        title={itemTitle}
                        aria-haspopup="true"
                        aria-expanded="false"
                      >
                        {item.label}
                        <DesktopChevron />
                      </Link>
                    ) : (
                      <button
                        type="button"
                        className={cn(
                          "flex h-full cursor-pointer items-center gap-1 px-3 font-medium transition-colors hover:text-primary-900",
                          textColor,
                        )}
                        aria-haspopup="true"
                        aria-expanded="false"
                      >
                        {item.label}
                        <DesktopChevron />
                      </button>
                    )}

                    <div
                      className="nav-dropdown pointer-events-none absolute left-1/2 top-full z-[100] w-60 -translate-x-1/2 bg-white opacity-0 shadow-soft transition-all duration-150 ease-out group-hover:pointer-events-auto group-hover:opacity-100 group-focus-within:pointer-events-auto group-focus-within:opacity-100"
                      role="menu"
                      aria-label={`${item.label} sub menu`}
                    >
                      <div className="h-1 w-full bg-gradient-to-r from-primary-300 via-primary-700 to-accent-500" />

                      <ul>
                        {children.map((child) => {
                          const childUrl = child.url ?? "#";
                          const childLabel = child.label ?? "";
                          const childTitle = child.title ?? childLabel;

                          return (
                            <li key={childUrl}>
                              <Link
                                href={childUrl}
                                className="block px-4 py-2.5 text-sm font-medium text-slate-600 transition-colors hover:bg-primary-50 hover:text-primary-950"
                                title={childTitle}
                                role="menuitem"
                              >
                                {childLabel}
                              </Link>
                            </li>
                          );
                        })}
                      </ul>
                    </div>
                  </div>
                );
              }

              if (hasLink) {
                return (
                  <Link
                    key={item.label}
                    href={itemUrl}
                    className={cn(
                      "flex h-full items-center px-3 font-medium transition-colors hover:text-primary-900",
                      textColor,
                    )}
                    title={itemTitle}
                  >
                    {item.label}
                  </Link>
                );
              }

              return (
                <div
                  key={item.label}
                  className={cn(
                    "flex h-full items-center px-3 font-medium transition-colors hover:text-primary-900",
                    textColor,
                  )}
                >
                  {item.label}
                </div>
              );
            })}

            <Link
              href="/contact-us/"
              className="btn btn-primary btn-radius-pill ml-3 shrink-0 whitespace-nowrap"
              title="Get Free Estimate"
            >
              Get Free Estimation
            </Link>
          </nav>
        )}

        <button
          type="button"
          id="mobile-menu-toggle"
          className="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-xs hover:bg-primary-50 lg:hidden"
          aria-label="Open navigation menu"
          aria-controls="mobile-menu"
          aria-expanded={mobileOpen}
          onClick={openMobile}
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            strokeWidth={1.5}
            stroke="currentColor"
            className="size-6"
            aria-hidden="true"
          >
            <path strokeLinecap="round" strokeLinejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5M12 17.25h8.25" />
          </svg>
        </button>
      </div>

      <div
        id="mobile-menu"
        className={cn(
          "fixed inset-0 z-50 bg-slate-950/40 transition-opacity duration-200 lg:hidden",
          mobileOpen ? "pointer-events-auto opacity-100" : "pointer-events-none opacity-0",
        )}
        aria-hidden={!mobileOpen}
        role="dialog"
        aria-modal="true"
        aria-label="Mobile navigation"
        onClick={(event) => {
          if (event.target === event.currentTarget) closeMobile();
        }}
      >
        <div
          id="mobile-menu-panel"
          className={cn(
            "ml-auto flex h-full w-full max-w-xs flex-col bg-white shadow-xl transition-transform duration-200",
            mobileOpen ? "translate-x-0" : "translate-x-full",
          )}
        >
          <div className="flex h-16 items-center justify-between border-b border-slate-200 px-4">
            <span className="text-sm font-semibold text-slate-900">Menu</span>
            <button
              type="button"
              id="mobile-menu-close"
              className="inline-flex h-9 w-9 items-center justify-center rounded-xs hover:bg-primary-50"
              aria-label="Close navigation menu"
              onClick={closeMobile}
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                strokeWidth={1.5}
                stroke="currentColor"
                className="size-5"
                aria-hidden="true"
              >
                <path strokeLinecap="round" strokeLinejoin="round" d="M6 18 18 6M6 6l12 12" />
              </svg>
            </button>
          </div>

          <nav className="flex-1 overflow-y-auto px-4 py-4 text-sm" aria-label="Mobile primary navigation">
            {mainNav.map((item, index) => {
              const itemUrl = item.url ?? "/";
              const hasLink = Boolean(item.url);
              const children = item.child ?? [];
              const hasChildren = children.length > 0;
              const submenuId = `mobile-submenu-${index}`;
              const itemTitle = item.title ?? item.label;
              const submenuOpen = expandedSubmenus.has(index);

              if (hasChildren) {
                return (
                  <div key={item.label} className="mb-2 border-b border-slate-100 pb-2">
                    <button
                      type="button"
                      className="flex w-full items-center justify-between py-2 text-sm font-semibold text-slate-900"
                      data-submenu-toggle={submenuId}
                      aria-expanded={submenuOpen}
                      aria-controls={submenuId}
                      onClick={() => toggleSubmenu(index)}
                    >
                      <span>{item.label}</span>
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        strokeWidth={2}
                        stroke="currentColor"
                        className={cn(
                          "h-4 w-4 text-slate-500 transition-transform",
                          submenuOpen && "rotate-180",
                        )}
                        data-submenu-chevron={submenuId}
                        aria-hidden="true"
                      >
                        <path strokeLinecap="round" strokeLinejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                      </svg>
                    </button>

                    <div
                      id={submenuId}
                      className={cn(
                        "mt-1 space-y-1 border-l border-slate-100 pl-3",
                        !submenuOpen && "hidden",
                      )}
                    >
                      {hasLink && (
                        <Link
                          href={itemUrl}
                          className="block py-1 text-sm font-semibold text-slate-900"
                          title={itemTitle}
                          onClick={closeMobile}
                        >
                          {item.label} overview
                        </Link>
                      )}

                      {children.map((child) => {
                        const childUrl = child.url ?? "#";
                        const childLabel = child.label ?? "";
                        const childTitle = child.title ?? childLabel;

                        return (
                          <Link
                            key={childUrl}
                            href={childUrl}
                            className="block py-2 text-sm text-slate-700 hover:text-primary-900"
                            title={childTitle}
                            onClick={closeMobile}
                          >
                            {childLabel}
                          </Link>
                        );
                      })}
                    </div>
                  </div>
                );
              }

              return (
                <Link
                  key={item.label}
                  href={itemUrl}
                  className="mb-2 block border-b border-slate-100 py-2 pb-4 text-sm font-semibold text-slate-900 hover:text-primary-900"
                  title={itemTitle}
                  onClick={closeMobile}
                >
                  {item.label}
                </Link>
              );
            })}
          </nav>

          <div className="border-t border-slate-100 px-4 py-4">
            <Link
              href="/contact-us/"
              className="btn btn-primary btn-radius-pill w-full justify-center"
              title="Get Free Estimate"
              onClick={closeMobile}
            >
              Get Free Estimation
            </Link>
          </div>
        </div>
      </div>
    </header>
  );
}
