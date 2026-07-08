type PortfolioArrowLinkProps = {
  href: string;
  label: string;
  external?: boolean;
  variant?: "featured" | "grid";
};

/** Portfolio card CTA — matches partials/portfolio section-featured.php & section-grid.php */
export function PortfolioArrowLink({
  href,
  label,
  external,
  variant = "featured",
}: PortfolioArrowLinkProps) {
  const className =
    variant === "grid"
      ? "inline-flex items-center gap-1 text-[11px] font-medium text-sky-700 hover:text-sky-600"
      : "inline-flex items-center gap-1 text-[11px] font-medium text-sky-300 hover:text-sky-200";

  const isExternal = external || href.startsWith("http");

  return (
    <a
      href={href}
      className={className}
      {...(isExternal ? { target: "_blank", rel: "noopener noreferrer" } : {})}
    >
      <span>{label}</span>
      <span aria-hidden="true">↗</span>
    </a>
  );
}
