"use client";

import { ServerErrorContent } from "@/components/blocks/errors/ServerErrorContent";

export default function Error({
  reset,
}: {
  error: Error & { digest?: string };
  reset: () => void;
}) {
  return <ServerErrorContent onRetry={reset} />;
}
