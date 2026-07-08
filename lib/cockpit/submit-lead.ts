/**
 * Submit a lead to QalbIT Cockpit (apps/cockpit).
 * When COCKPIT_API_URL + COCKPIT_API_KEY are set, the website never sends SMTP directly.
 */

export interface SubmitLeadPayload {
  type?: "contact" | "career" | "hire" | "other";
  name: string;
  email: string;
  phone?: string;
  message?: string;
  source_page?: string;
  lead_from?: string;
  lead_source?: string;
  lead_topic?: string;
  recaptcha_token?: string;
  website?: string;
  metadata?: Record<string, unknown>;
}

export interface SubmitLeadResult {
  success: boolean;
  message?: string;
  leadId?: number;
}

function cockpitConfigured(): boolean {
  return Boolean(process.env.COCKPIT_API_URL?.trim() && process.env.COCKPIT_API_KEY?.trim());
}

export function isCockpitLeadRoutingEnabled(): boolean {
  return cockpitConfigured();
}

export async function submitLeadToCockpit(
  payload: SubmitLeadPayload,
): Promise<SubmitLeadResult> {
  const baseUrl = process.env.COCKPIT_API_URL?.trim();
  const apiKey = process.env.COCKPIT_API_KEY?.trim();

  if (!baseUrl || !apiKey) {
    return { success: false, message: "Cockpit API not configured" };
  }

  const url = `${baseUrl.replace(/\/$/, "")}/api/v1/leads`;

  try {
    const response = await fetch(url, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        Authorization: `Bearer ${apiKey}`,
      },
      body: JSON.stringify(payload),
    });

    const data = (await response.json()) as {
      success?: boolean;
      message?: string;
      lead_id?: number;
    };

    if (!response.ok || !data.success) {
      return {
        success: false,
        message: data.message ?? "Unable to submit enquiry",
      };
    }

    return {
      success: true,
      leadId: data.lead_id,
    };
  } catch {
    return { success: false, message: "Cockpit API unreachable" };
  }
}

export interface SubmitCareerPayload {
  full_name: string;
  email: string;
  phone: string;
  about: string;
  role_slug?: string;
  location?: string;
  experience?: string;
  current_role?: string;
  notice_period?: string;
  linkedin?: string;
  github?: string;
  current_ctc?: string;
  expected_ctc?: string;
  source_page?: string;
  recaptcha_token?: string;
  website?: string;
  resume: File;
}

export async function submitCareerToCockpit(
  payload: SubmitCareerPayload,
): Promise<SubmitLeadResult> {
  const baseUrl = process.env.COCKPIT_API_URL?.trim();
  const apiKey = process.env.COCKPIT_API_KEY?.trim();

  if (!baseUrl || !apiKey) {
    return { success: false, message: "Cockpit API not configured" };
  }

  const url = `${baseUrl.replace(/\/$/, "")}/api/v1/leads/career`;
  const form = new FormData();

  form.append("full_name", payload.full_name);
  form.append("email", payload.email);
  form.append("phone", payload.phone);
  form.append("about", payload.about);
  form.append("resume", payload.resume);

  const optionalFields: (keyof SubmitCareerPayload)[] = [
    "role_slug",
    "location",
    "experience",
    "current_role",
    "notice_period",
    "linkedin",
    "github",
    "current_ctc",
    "expected_ctc",
    "source_page",
    "recaptcha_token",
    "website",
  ];

  for (const key of optionalFields) {
    const value = payload[key];
    if (typeof value === "string" && value.trim()) {
      form.append(key, value);
    }
  }

  try {
    const response = await fetch(url, {
      method: "POST",
      headers: {
        Authorization: `Bearer ${apiKey}`,
      },
      body: form,
    });

    const data = (await response.json()) as {
      success?: boolean;
      message?: string;
      lead_id?: number;
    };

    if (!response.ok || !data.success) {
      return {
        success: false,
        message: data.message ?? "Unable to submit application",
      };
    }

    return { success: true, leadId: data.lead_id };
  } catch {
    return { success: false, message: "Cockpit API unreachable" };
  }
}
