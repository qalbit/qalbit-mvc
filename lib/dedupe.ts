import { env } from "./env";

const cache = new Map<string, number>();

export function isDuplicateSubmission(key: string): boolean {
  const now = Date.now();
  const windowMs = env.DEDUPE_WINDOW_MS;
  const existing = cache.get(key);

  if (existing && now - existing < windowMs) {
    return true;
  }

  cache.set(key, now);

  // Cleanup old entries periodically
  if (cache.size > 1000) {
    Array.from(cache.entries()).forEach(([k, ts]) => {
      if (now - ts > windowMs) cache.delete(k);
    });
  }

  return false;
}

export function dedupeKey(email: string, message: string, ip?: string): string {
  const normalized = `${email.trim().toLowerCase()}|${message.trim().slice(0, 200)}|${ip ?? ""}`;
  return normalized;
}
