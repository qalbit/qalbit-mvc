import Link from "next/link";
import { cn } from "@/lib/utils";

type ButtonVariant = "primary" | "primary-outline" | "secondary" | "ghost" | "dark";

const variantClasses: Record<ButtonVariant, string> = {
  primary: "btn btn-primary btn-radius-pill",
  "primary-outline": "btn btn-accent-outline btn-radius-pill",
  secondary:
    "inline-flex items-center justify-center rounded-full border border-slate-600 bg-slate-900/40 px-6 py-3 text-sm font-semibold text-slate-100 transition hover:border-slate-400 hover:text-white",
  ghost: "inline-flex items-center justify-center text-sm font-medium text-primary hover:text-primary/90",
  dark: "btn btn-accent btn-radius-pill",
};

interface ButtonLinkProps {
  href: string;
  children: React.ReactNode;
  variant?: ButtonVariant;
  className?: string;
  ariaLabel?: string;
  external?: boolean;
}

export function ButtonLink({
  href,
  children,
  variant = "primary",
  className,
  ariaLabel,
  external,
}: ButtonLinkProps) {
  const classes = cn(variantClasses[variant], className);
  const isExternal = external ?? href.startsWith("http");

  if (isExternal) {
    return (
      <a href={href} className={classes} aria-label={ariaLabel} rel="noopener noreferrer" target="_blank">
        {children}
      </a>
    );
  }

  return (
    <Link href={href} className={classes} aria-label={ariaLabel}>
      {children}
    </Link>
  );
}
