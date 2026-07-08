import { env } from "./env";

export async function notifySlack(message: string): Promise<void> {
  if (!env.SLACK_WEBHOOK_URL) {
    console.error("[slack] SLACK_WEBHOOK_URL not configured:", message);
    return;
  }

  try {
    await fetch(env.SLACK_WEBHOOK_URL, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ text: message }),
    });
  } catch (err) {
    console.error("[slack] Failed to send notification", err);
  }
}
