import { cn } from "@/lib/utils";

export function Badge({
  children,
  className,
  variant = "default",
}: {
  children: React.ReactNode;
  className?: string;
  variant?: "default" | "pill" | "dark" | "sky";
}) {
  const variants = {
    default:
      "inline-flex items-center rounded-full border border-slate-200 bg-white/90 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-muted-foreground shadow-soft",
    pill:
      "inline-flex items-center gap-2 rounded-pill border border-slate-200 bg-primary/5 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-primary shadow-soft ring-1 ring-primary/20",
    dark:
      "inline-flex items-center rounded-pill border border-slate-700/70 bg-slate-900/80 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-slate-300",
    sky:
      "inline-flex items-center rounded-full border border-sky-500/30 bg-sky-500/5 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.18em] text-sky-300",
  };

  return <span className={cn(variants[variant], className)}>{children}</span>;
}
