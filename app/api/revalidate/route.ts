import { revalidatePath } from "next/cache";
import { NextResponse } from "next/server";

export async function POST(request: Request) {
  const secret = process.env.REVALIDATE_SECRET?.trim();

  if (!secret) {
    return NextResponse.json({ ok: false, message: "Revalidation not configured" }, { status: 503 });
  }

  let body: { secret?: string; type?: string; slug?: string };

  try {
    body = await request.json();
  } catch {
    return NextResponse.json({ ok: false, message: "Invalid JSON" }, { status: 400 });
  }

  if (body.secret !== secret) {
    return NextResponse.json({ ok: false, message: "Unauthorized" }, { status: 401 });
  }

  if (body.type === "blog") {
    revalidatePath("/");
    revalidatePath("/blog");
    if (body.slug) {
      revalidatePath(`/blog/${body.slug}`);
    }
  }

  return NextResponse.json({ ok: true, revalidated: true, type: body.type ?? null });
}
