import Link from "next/link";
import { cn } from "@/lib/utils";

export function Card({
  children,
  className,
  href,
  variant = "default",
}: {
  children: React.ReactNode;
  className?: string;
  href?: string;
  variant?: "default" | "bordered" | "dark";
}) {
  const variants = {
    default: "rounded-lg border border-slate-200 bg-white p-5 shadow-soft",
    bordered: "rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:border-primary/70",
    dark: "rounded-2xl border border-slate-800 bg-slate-900/60 p-4 shadow-lg shadow-slate-950/40 transition hover:border-primary/70 hover:bg-slate-900",
  };

  const classes = cn(variants[variant], className);

  if (href) {
    return (
      <Link href={href} className={cn(classes, "block")}>
        {children}
      </Link>
    );
  }

  return <div className={classes}>{children}</div>;
}
