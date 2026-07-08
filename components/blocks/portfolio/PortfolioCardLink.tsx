import type { ReactNode } from "react";

type PortfolioCardLinkProps = {
  href: string;
  external?: boolean;
  className: string;
  children: ReactNode;
};

/** Portfolio card title links — native `<a>` to match live PHP markup. */
export function PortfolioCardLink({ href, external, className, children }: PortfolioCardLinkProps) {
  const isExternal = external || href.startsWith("http");

  return (
    <a
      href={href}
      className={className}
      {...(isExternal ? { target: "_blank", rel: "noopener noreferrer" } : {})}
    >
      {children}
    </a>
  );
}
