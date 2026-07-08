import { expect, test } from "@playwright/test";

test.describe("page smoke", () => {
  test("home page loads", async ({ page }) => {
    await page.goto("/");
    await expect(page.locator("#main-content")).toBeVisible();
    await expect(page).toHaveTitle(/QalbIT/i);
  });

  test("service detail page loads", async ({ page }) => {
    await page.goto("/services/custom-software-development/");
    await expect(page.locator("h1")).toBeVisible();
    await expect(page.getByRole("link", { name: /contact/i }).first()).toBeVisible();
  });

  test("case study detail page loads", async ({ page }) => {
    await page.goto("/case-studies/snappystats/");
    await expect(page.locator("h1")).toBeVisible();
  });

  test("contact page has enquiry form", async ({ page }) => {
    await page.goto("/contact-us/");
    await expect(page.locator("form").first()).toBeVisible();
    await expect(page.getByLabel(/name/i).first()).toBeVisible();
  });

  test("career apply page has application form", async ({ page }) => {
    await page.goto("/career/apply/");
    await expect(page.getByLabel(/full name/i)).toBeVisible();
    await expect(page.getByLabel(/resume/i)).toBeVisible();
  });
});

test.describe("API smoke", () => {
  test("contact API rejects invalid payload", async ({ request }) => {
    const res = await request.post("/api/contact/", {
      data: { name: "x", email: "not-an-email", phone: "1", message: "short" },
    });
    expect(res.status()).toBe(400);
    const body = await res.json();
    expect(body.success).toBe(false);
  });

  test("contact honeypot accepts silently", async ({ request }) => {
    const res = await request.post("/api/contact/", {
      data: {
        name: "Bot",
        email: "bot@example.com",
        phone: "1234567890",
        message: "This should be ignored by the honeypot field.",
        website: "http://spam.test",
      },
    });
    expect(res.status()).toBe(200);
    const body = await res.json();
    expect(body.success).toBe(true);
  });

  test("career apply API rejects missing fields", async ({ request }) => {
    const res = await request.post("/api/career/apply/", {
      multipart: {
        full_name: "",
        email: "",
        phone: "",
        about: "",
      },
    });
    expect(res.status()).toBe(400);
    const body = await res.json();
    expect(body.success).toBe(false);
  });

  test("career apply honeypot accepts silently", async ({ request }) => {
    const res = await request.post("/api/career/apply/", {
      multipart: {
        website: "http://spam.test",
      },
    });
    expect(res.status()).toBe(200);
    const body = await res.json();
    expect(body.success).toBe(true);
  });
});

test.describe("redirects", () => {
  test("/apply/ redirects to career apply", async ({ page }) => {
    const res = await page.goto("/apply/");
    expect(res?.status()).toBe(200);
    expect(page.url()).toContain("/career/apply/");
  });

  test("/contact/ redirects to contact-us", async ({ page }) => {
    const res = await page.goto("/contact/");
    expect(res?.status()).toBe(200);
    expect(page.url()).toContain("/contact-us/");
  });
});
