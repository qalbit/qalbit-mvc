import { mkdir, writeFile } from "node:fs/promises";
import path from "node:path";
import { NextRequest, NextResponse } from "next/server";
import {
  isCockpitLeadRoutingEnabled,
  submitCareerToCockpit,
} from "@/lib/cockpit/submit-lead";
import { careerEmailHtml, sendMail } from "@/lib/email/mailer";
import { verifyRecaptcha } from "@/lib/recaptcha";
import { sanitizeText } from "@/lib/utils";

const MAX_FILE_SIZE = 5 * 1024 * 1024;
const ALLOWED_TYPES = [
  "application/pdf",
  "application/msword",
  "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
];

export async function POST(request: NextRequest) {
  try {
    const form = await request.formData();

    if (form.get("website")) {
      return NextResponse.json({ success: true });
    }

    const fullName = sanitizeText(String(form.get("full_name") ?? ""));
    const email = String(form.get("email") ?? "").trim();
    const phone = sanitizeText(String(form.get("phone") ?? ""));
    const about = sanitizeText(String(form.get("about") ?? ""), 5000);
    const roleSlug = sanitizeText(String(form.get("role_slug") ?? ""));
    const resume = form.get("resume") as File | null;
    const recaptchaToken = String(form.get("recaptcha_token") ?? "");

    if (!fullName || !email || !phone || !about || !resume) {
      return NextResponse.json(
        { success: false, message: "Missing required fields" },
        { status: 400 },
      );
    }

    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
      return NextResponse.json(
        { success: false, message: "Invalid email" },
        { status: 400 },
      );
    }

    const recaptcha = await verifyRecaptcha(recaptchaToken, "career");
    if (!recaptcha.success && process.env.NODE_ENV === "production") {
      return NextResponse.json(
        { success: false, message: "reCAPTCHA verification failed" },
        { status: 400 },
      );
    }

    if (resume.size > MAX_FILE_SIZE || !ALLOWED_TYPES.includes(resume.type)) {
      return NextResponse.json(
        { success: false, message: "Invalid resume file" },
        { status: 400 },
      );
    }

    if (isCockpitLeadRoutingEnabled()) {
      const cockpit = await submitCareerToCockpit({
        full_name: fullName,
        email,
        phone,
        about,
        role_slug: roleSlug,
        location: sanitizeText(String(form.get("location") ?? "")),
        experience: sanitizeText(String(form.get("experience") ?? "")),
        current_role: sanitizeText(String(form.get("current_role") ?? "")),
        notice_period: sanitizeText(String(form.get("notice_period") ?? "")),
        linkedin: sanitizeText(String(form.get("linkedin") ?? "")),
        github: sanitizeText(String(form.get("github") ?? "")),
        current_ctc: sanitizeText(String(form.get("current_ctc") ?? "")),
        expected_ctc: sanitizeText(String(form.get("expected_ctc") ?? "")),
        source_page: "/career/apply",
        recaptcha_token: recaptchaToken,
        resume,
      });

      if (!cockpit.success) {
        return NextResponse.json(
          { success: false, message: cockpit.message ?? "Unable to submit application" },
          { status: 500 },
        );
      }

      return NextResponse.json({ success: true });
    }

    const safeName = resume.name.replace(/[^a-zA-Z0-9._-]/g, "_");
    const uploadDir = path.join(process.cwd(), "storage", "upload", "jobs");
    await mkdir(uploadDir, { recursive: true });

    const filename = `${Date.now()}-${safeName}`;
    const filePath = path.join(uploadDir, filename);
    const buffer = Buffer.from(await resume.arrayBuffer());
    await writeFile(filePath, buffer);

    const emailData: Record<string, string> = {
      Name: fullName,
      Email: email,
      Phone: phone,
      Role: roleSlug || "General application",
      About: about,
      Location: sanitizeText(String(form.get("location") ?? "")),
      Experience: sanitizeText(String(form.get("experience") ?? "")),
      "Current role": sanitizeText(String(form.get("current_role") ?? "")),
      "Notice period": sanitizeText(String(form.get("notice_period") ?? "")),
      LinkedIn: sanitizeText(String(form.get("linkedin") ?? "")),
      GitHub: sanitizeText(String(form.get("github") ?? "")),
      "Current CTC": sanitizeText(String(form.get("current_ctc") ?? "")),
      "Expected CTC": sanitizeText(String(form.get("expected_ctc") ?? "")),
      "Resume file": filename,
    };

    const result = await sendMail({
      type: "career",
      subject: `Career application – ${fullName}`,
      html: careerEmailHtml(emailData),
      attachments: [
        {
          filename: safeName,
          content: buffer,
          contentType: resume.type,
        },
      ],
    });

    if (!result.success) {
      return NextResponse.json(
        { success: false, message: "Unable to submit application" },
        { status: 500 },
      );
    }

    return NextResponse.json({ success: true });
  } catch (err) {
    console.error("[career] apply error:", err);
    return NextResponse.json(
      { success: false, message: "Server error" },
      { status: 500 },
    );
  }
}
