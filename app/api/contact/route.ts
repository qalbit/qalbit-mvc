import { NextRequest, NextResponse } from "next/server";
import { z } from "zod";
import { isCockpitLeadRoutingEnabled, submitLeadToCockpit } from "@/lib/cockpit/submit-lead";
import { dedupeKey, isDuplicateSubmission } from "@/lib/dedupe";
import { contactEmailHtml, sendMail } from "@/lib/email/mailer";
import { verifyRecaptcha } from "@/lib/recaptcha";
import { sanitizeText } from "@/lib/utils";

const contactSchema = z.object({
  name: z.string().min(2).max(200),
  email: z.string().email().max(200),
  phone: z.string().max(50).optional().default(""),
  message: z.string().min(10).max(5000),
  recaptcha_token: z.string().optional(),
  lead_from: z.string().max(100).optional(),
  lead_source: z.string().max(200).optional(),
  lead_topic: z.string().max(200).optional(),
  website: z.string().optional(),
});

export async function POST(request: NextRequest) {
  try {
    const body = await request.json();
    const parsed = contactSchema.safeParse(body);

    if (!parsed.success) {
      return NextResponse.json(
        { success: false, message: "Invalid form data" },
        { status: 400 },
      );
    }

    const data = parsed.data;

    if (data.website) {
      return NextResponse.json({ success: true });
    }

    const ip = request.headers.get("x-forwarded-for") ?? "unknown";
    const dedupe = dedupeKey(data.email, data.message, ip);
    if (isDuplicateSubmission(dedupe)) {
      return NextResponse.json({ success: true });
    }

    const recaptcha = await verifyRecaptcha(data.recaptcha_token ?? "", "contact");
    if (!recaptcha.success) {
      return NextResponse.json(
        { success: false, message: "reCAPTCHA verification failed" },
        { status: 400 },
      );
    }

    const emailData = {
      Name: sanitizeText(data.name),
      Email: data.email,
      Phone: sanitizeText(data.phone || "Not provided"),
      Message: sanitizeText(data.message, 5000),
      "Lead from": sanitizeText(data.lead_from ?? "website"),
      Source: sanitizeText(data.lead_source ?? ""),
      Topic: sanitizeText(data.lead_topic ?? ""),
    };

    if (isCockpitLeadRoutingEnabled()) {
      const cockpit = await submitLeadToCockpit({
        type: "contact",
        name: emailData.Name,
        email: data.email,
        phone: emailData.Phone,
        message: emailData.Message,
        source_page: data.lead_source ?? undefined,
        lead_from: emailData["Lead from"],
        lead_source: emailData.Source,
        lead_topic: emailData.Topic,
        recaptcha_token: data.recaptcha_token,
      });

      if (!cockpit.success) {
        return NextResponse.json(
          { success: false, message: cockpit.message ?? "Unable to send message" },
          { status: 500 },
        );
      }

      return NextResponse.json({ success: true });
    }

    const result = await sendMail({
      type: "contact",
      subject: `New enquiry from ${data.name}`,
      html: contactEmailHtml(emailData),
    });

    if (!result.success) {
      return NextResponse.json(
        { success: false, message: "Unable to send message. Please email us directly." },
        { status: 500 },
      );
    }

    if (process.env.NODE_ENV === "development") {
      console.log("[contact] transport:", result.transport);
    }

    return NextResponse.json({ success: true });
  } catch {
    return NextResponse.json(
      { success: false, message: "Server error" },
      { status: 500 },
    );
  }
}
