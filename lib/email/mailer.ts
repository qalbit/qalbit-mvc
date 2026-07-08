import nodemailer from "nodemailer";
import { env } from "../env";
import { notifySlack } from "../slack";

export type MailType = "contact" | "career";

export interface SendMailOptions {
  type: MailType;
  subject: string;
  html: string;
  attachments?: nodemailer.SendMailOptions["attachments"];
}

export interface MailResult {
  success: boolean;
  transport: "smtp" | "smtp_failed";
  error?: string;
}

function getRecipient(type: MailType): string {
  return type === "career" ? env.EMAIL_TO_HR : env.EMAIL_TO_SALES;
}

export async function sendMail(options: SendMailOptions): Promise<MailResult> {
  if (!env.SMTP_HOST || !env.SMTP_USERNAME || !env.SMTP_PASSWORD) {
    const msg = `Email not sent (${options.type}): SMTP not configured`;
    await notifySlack(`🚨 QalbIT mail failure: ${msg}`);
    return { success: false, transport: "smtp_failed", error: "SMTP not configured" };
  }

  const transporter = nodemailer.createTransport({
    host: env.SMTP_HOST,
    port: env.SMTP_PORT,
    secure: env.SMTP_ENCRYPTION === "ssl",
    auth: {
      user: env.SMTP_USERNAME,
      pass: env.SMTP_PASSWORD,
    },
  });

  try {
    await transporter.sendMail({
      from: `"${env.EMAIL_FROM_NAME}" <${env.EMAIL_FROM}>`,
      to: getRecipient(options.type),
      bcc: env.EMAIL_TO_BCC,
      subject: options.subject,
      html: options.html,
      attachments: options.attachments,
    });

    return { success: true, transport: "smtp" };
  } catch (err) {
    const error = err instanceof Error ? err.message : "Unknown SMTP error";
    console.error("[mailer] SMTP failed:", error);
    await notifySlack(
      `🚨 QalbIT mail failure (${options.type}): SMTP error — ${error}`,
    );
    return { success: false, transport: "smtp_failed", error };
  }
}

export function contactEmailHtml(data: Record<string, string>): string {
  const rows = Object.entries(data)
    .map(
      ([k, v]) =>
        `<tr><td style="padding:8px;border:1px solid #e2e8f0;font-weight:600">${k}</td><td style="padding:8px;border:1px solid #e2e8f0">${v}</td></tr>`,
    )
    .join("");

  return `
    <h2>New contact enquiry from qalbit.com</h2>
    <table style="border-collapse:collapse;width:100%">${rows}</table>
  `;
}

export function careerEmailHtml(data: Record<string, string>): string {
  return contactEmailHtml(data).replace(
    "New contact enquiry",
    "New career application",
  );
}
