import { env } from "./env";

export interface RecaptchaResult {
  success: boolean;
  score?: number;
  action?: string;
  error?: string;
}

export async function verifyRecaptcha(
  token: string,
  expectedAction?: string,
): Promise<RecaptchaResult> {
  if (!env.RECAPTCHA_SECRET_KEY) {
    if (process.env.NODE_ENV === "development") {
      return { success: true, score: 1, action: expectedAction };
    }
    return { success: false, error: "reCAPTCHA not configured" };
  }

  if (!token) {
    return { success: false, error: "Missing reCAPTCHA token" };
  }

  const res = await fetch("https://www.google.com/recaptcha/api/siteverify", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: new URLSearchParams({
      secret: env.RECAPTCHA_SECRET_KEY,
      response: token,
    }),
  });

  const data = (await res.json()) as {
    success: boolean;
    score?: number;
    action?: string;
    "error-codes"?: string[];
  };

  if (!data.success) {
    return {
      success: false,
      error: data["error-codes"]?.join(", ") ?? "reCAPTCHA failed",
    };
  }

  const score = data.score ?? 0;
  if (score < env.RECAPTCHA_MIN_SCORE) {
    return { success: false, score, error: "Low reCAPTCHA score" };
  }

  if (expectedAction && data.action && data.action !== expectedAction) {
    return { success: false, score, action: data.action, error: "Action mismatch" };
  }

  return { success: true, score, action: data.action };
}
