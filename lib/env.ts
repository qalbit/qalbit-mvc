import { z } from "zod";

/** Treat empty env values as unset — `.env.local` often has `KEY=` placeholders. */
function optionalString() {
  return z
    .string()
    .optional()
    .transform((v) => (v?.trim() ? v.trim() : undefined));
}

function optionalUrl() {
  return z
    .string()
    .optional()
    .transform((v) => (v?.trim() ? v.trim() : undefined))
    .pipe(z.string().url().optional());
}

const envSchema = z.object({
  SITE_URL: z
    .string()
    .optional()
    .transform((v) => (v?.trim() ? v.trim() : "https://qalbit.com"))
    .pipe(z.string().url()),
  NEXT_PUBLIC_SITE_URL: optionalUrl(),
  INDEXING_ENABLED: z
    .string()
    .optional()
    .transform((v) => v === "true" || v === "1"),
  NEXT_PUBLIC_GTM_ID: optionalString(),
  GSC_VERIFICATION: optionalString(),
  NEXT_PUBLIC_GA4_ID: optionalString(),
  NEXT_PUBLIC_RECAPTCHA_SITE_KEY: optionalString(),
  RECAPTCHA_SECRET_KEY: optionalString(),
  RECAPTCHA_MIN_SCORE: z
    .string()
    .optional()
    .transform((v) => (v ? parseFloat(v) : 0.5)),
  SMTP_HOST: optionalString(),
  SMTP_PORT: z
    .string()
    .optional()
    .transform((v) => (v?.trim() ? parseInt(v, 10) : 587)),
  SMTP_USERNAME: optionalString(),
  SMTP_PASSWORD: optionalString(),
  SMTP_ENCRYPTION: z
    .enum(["tls", "ssl"])
    .optional()
    .transform((v) => v ?? "tls"),
  EMAIL_FROM: z
    .string()
    .optional()
    .transform((v) => (v?.trim() ? v.trim() : "info@qalbit.com")),
  EMAIL_FROM_NAME: z
    .string()
    .optional()
    .transform((v) => (v?.trim() ? v.trim() : "QalbIT")),
  EMAIL_TO_SALES: z
    .string()
    .optional()
    .transform((v) => (v?.trim() ? v.trim() : "sales@qalbit.com")),
  EMAIL_TO_HR: z
    .string()
    .optional()
    .transform((v) => (v?.trim() ? v.trim() : "hr@qalbit.com")),
  EMAIL_TO_BCC: optionalString(),
  SLACK_WEBHOOK_URL: optionalUrl(),
  WP_GRAPHQL_URL: optionalUrl(),
  WP_GRAPHQL_AUTH: optionalString(),
  COCKPIT_API_URL: optionalUrl(),
  COCKPIT_API_KEY: optionalString(),
  REVALIDATE_SECRET: optionalString(),
  TAWK_PROPERTY_ID: optionalString(),
  TAWK_WIDGET_ID: optionalString(),
  DEDUPE_WINDOW_MS: z
    .string()
    .optional()
    .transform((v) => (v ? parseInt(v, 10) : 300000)),
  NODE_ENV: z.enum(["development", "production", "test"]).optional(),
});

export type Env = z.infer<typeof envSchema>;

function parseEnv(): Env {
  const parsed = envSchema.safeParse(process.env);
  if (!parsed.success) {
    console.error("Invalid environment variables:", parsed.error.flatten().fieldErrors);
    throw new Error("Invalid environment variables");
  }

  const env = parsed.data;

  if (
    env.NODE_ENV === "production" &&
    env.SITE_URL.includes("localhost")
  ) {
    throw new Error("SITE_URL must not be localhost in production");
  }

  return env;
}

export const env = parseEnv();
