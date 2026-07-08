# Visual QA checklist (React vs legacy PHP)

Compare the Next.js app (`npm run dev`) against the PHP site or staging after CSS/layout fixes (June 2026).

**Status key:** `[ ]` not checked · `[x]` OK · `[!]` issue noted

---

## Layout (every page)

| Route | Check | Status |
|-------|-------|--------|
| All | Header nav, logo, desktop CTA, mobile drawer | `[x]` |
| All | Footer columns, social links, copyright | `[x]` |
| All | Cookie banner (dark bottom bar, Accept & continue) | `[x]` |
| All | Scroll-to-top (bottom-left, dark pill) | `[x]` |
| All | Exit-intent modal (desktop, first session) | `[ ]` |

---

## Core pages

| Route | Focus areas | Status |
|-------|-------------|--------|
| `/` | Hero float animation, gradient title, pill buttons, sections | `[x]` |
| `/about-us/` | Hero, story, metrics, process, tech, FAQ, CTA | `[ ]` |
| `/contact-us/` | Hero form, proof section, location, FAQ, CTA | `[x]` |
| `/contact-us/thank-you/` | Success message, gradient brand text, links | `[x]` |
| `/portfolio/` | Filters (industry/tech), grid cards | `[ ]` |
| `/career/` | Openings grid, benefits, why, FAQ, CTA | `[ ]` |
| `/career/apply/` | Form fields, file upload, success state | `[ ]` |
| `/sitemap/` | Grouped link columns, CTA band | `[x]` |

---

## Index listings

| Route | Status |
|-------|--------|
| `/services/` | `[ ]` |
| `/industries/` | `[ ]` |
| `/technologies/` | `[ ]` |
| `/hire-developers/` | `[ ]` |
| `/case-studies/` | `[ ]` |

---

## Detail pages (spot-check 1–2 per vertical)

| Vertical | Example route | Status |
|----------|---------------|--------|
| Service | `/services/custom-software-development/` | `[ ]` |
| Industry | `/industries/fintech/` | `[ ]` |
| Technology | `/technologies/laravel/` | `[ ]` |
| Hire | `/hire-laravel-developers/` | `[ ]` |
| Case study | `/case-studies/snappystats/` | `[ ]` |
| Process | `/start-up-mvp/` | `[ ]` |
| Geo state | `/usa/california/` | `[ ]` |
| Geo country | `/usa/` | `[ ]` |

---

## Legal & errors

| Route | Status |
|-------|--------|
| `/privacy-policy/` | `[ ]` |
| `/terms-and-condition/` | `[ ]` |
| `/cookie-policy/` | `[ ]` |
| `/404` or unknown URL | `[x]` |

---

## Blog (if WP configured)

| Route | Status |
|-------|--------|
| `/blog/` | `[ ]` |
| `/blog/[slug]/` | `[ ]` |

---

## Forms (functional smoke)

| Flow | Status |
|------|--------|
| Contact page form → thank-you redirect | `[ ]` |
| Home / CTA small form | `[ ]` |
| Career apply with resume upload | `[ ]` |
| reCAPTCHA + email delivery (staging) | `[ ]` |

---

## Responsive breakpoints

Test at **375px**, **768px**, and **1280px** for home, one detail page, and contact.

| Breakpoint | Status |
|------------|--------|
| Mobile | `[ ]` |
| Tablet | `[ ]` |
| Desktop | `[ ]` |

---

## Fixes applied (June 2026)

- **CSS pipeline:** `app/globals.css` imported in layout (Next Tailwind build for all React classes); removed stale static `app.css` link.
- **Typography:** Poppins applied via `next/font` on `<body>`.
- **Buttons:** `ButtonLink` uses PHP `btn btn-primary` / `btn-accent-outline` pill styles.
- **Gradients:** Added `.text-gradient-brand` utility (blog teaser, thank-you, CTA badge).
- **Header:** Desktop “Get Free Estimation” CTA + mobile slide-out drawer with CTA.
- **Cookie banner:** Dark full-width bar matching PHP.
- **Scroll-to-top:** Bottom-left dark button matching PHP.
- **Contact page:** Restored proof section (client logos + outcome cards).

---

## Notes

Record new issues with route, screenshot path, and brief description:

```
-
```
