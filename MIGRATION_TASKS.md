# apps/web — Migration status

**Audited:** June 2026 · **Scope:** PHP MVC → Next.js 14 (`apps/web`)

The original T-01–T-43 task list is **complete**. This file tracks what remains before production cutover and optional follow-ups.

---

## Summary

| Area | Status |
|------|--------|
| Public routes (37 `page.tsx`) | ✅ React composites wired |
| Layout (header, footer, modals) | ✅ React |
| Forms (contact, career apply) | ✅ React + API routes |
| Data layer (`lib/data`) | ✅ JSON + typed helpers |
| Block registry (`lib/blocks/registry.ts`) | ✅ 100% `implemented` (0 partial / 0 planned) |
| CI (typecheck, lint, test, build, E2E) | ✅ `.github/workflows/web.yml` |
| Legacy HTML on disk | ✅ Only `components/legacy-html/legal/` (3 files) |
| Visual QA vs PHP | ⬜ Not executed — see `VISUAL_QA_CHECKLIST.md` |
| Production cutover | ⬜ Next app not yet sole production entry |

---

## Status key

| Symbol | Meaning |
|--------|---------|
| ✅ | Done — matches migration intent |
| 🔶 | Partial — works but missing PHP parity or tech debt |
| ⬜ | Not started |
| ❓ | Needs product / ops decision |

---

## Pre-launch (required)

| ID | Task | Status | Notes |
|----|------|--------|-------|
| L-01 | Execute visual QA | ⬜ | Walk `VISUAL_QA_CHECKLIST.md`; compare React vs PHP or staging |
| L-02 | Staging environment | ⬜ | `.env.production`: `SITE_URL`, SMTP, reCAPTCHA, Slack, `INDEXING_ENABLED` |
| L-03 | WordPress / blog | 🔶 | Routes exist; needs `WP_GRAPHQL_URL` (+ auth) in staging/prod |
| L-04 | Production cutover | ⬜ | nginx → Node (see `deploy/nginx-qalbit.conf.sample`); retire PHP front controller |
| L-05 | Post-cutover smoke | ⬜ | Contact + career real submit, forms email delivery, sitemap, redirects |

---

## PHP parity gaps (code — partial)

| ID | Task | Status | Notes |
|----|------|--------|-------|
| G-01 | Contact proof section | ✅ | `ContactProofSection` wired in `ContactPage` |
| G-02 | Blog index + post layout | 🔶 | Minimal article layout; no dedicated blocks / hero vs PHP blog templates |
| G-03 | Legal page content | 🔶 | `LegalProsePage` reads exported HTML; run `php scripts/render-legal-html.php` after PHP legal edits |
| G-04 | Tawk.to live chat | ⬜ | `TAWK_*` in `lib/env.ts`; `tawk-layer.js` exists but not loaded in `layout.tsx` |
| G-05 | Legacy JS (`LegacyAssets`) | 🔶 | GSAP, `main.js`, intl-tel-input, per-page scripts (`home.js`, etc.) still on every page |
| G-06 | Home `BlogTeaser` | 🔶 | Rendered in `app/page.tsx` outside `HomePage` composite (functional, not structural parity) |

---

## Cleanup & polish (optional)

| ID | Task | Status | Notes |
|----|------|--------|-------|
| C-01 | Remove `GeoDetailView` wrapper | ⬜ | Thin pass-through to `GeoDetailPage`; route can import composite directly |
| C-02 | Migrate legal to Markdown/JSON | ⬜ | Drop `legacy-html/legal/` + `render-legal-html.php` |
| C-03 | Replace legacy JS with React | ⬜ | Audit `public/assets/js/main.js` behaviors; remove `LegacyAssets` when redundant |
| C-04 | ESLint warning cleanup | ⬜ | Unused imports in mappers; `@next/next/no-css-tags` on `LegacyAssets` |
| C-05 | `package-lock.json` | ⬜ | Commit lockfile in `apps/web` for reproducible `npm ci` in CI |
| C-06 | E2E: full form submit | 🔶 | Smoke tests cover honeypot + validation; not end-to-end email delivery |

---

## Done (reference — no action needed)

<details>
<summary>Completed migration phases (collapsed)</summary>

**P0** — Service, industry, technology, hire, case study detail pages; `createDetailPageHandlers`; 404; legal prose routes.

**P1** — Geo (state + country index), process pages, home, about, contact, portfolio, careers, index listings.

**P2** — React header/footer, `SiteModals`, `CareerApplyForm`, thank-you page; bridges removed.

**P3** — `lib/data` consolidation, `types.ts`, `.env.example`.

**P4** — `VISUAL_QA_CHECKLIST.md`, legacy HTML decommission (legal only), React sitemap, `render-legal-html.php` only.

**P5** — ESLint, CI workflow, Vitest mapper tests, Playwright smoke tests, `middleware.ts`, branded `global-error.tsx`.

</details>

---

## Route coverage (all ✅ React)

| Route pattern | Composite / component |
|---------------|----------------------|
| `/` | `HomePage` + `BlogTeaser` |
| `/about-us/` | `AboutPage` |
| `/contact-us/`, `/contact-us/thank-you/` | `ContactPage`, `ContactThankYouContent` |
| `/services/`, `/services/[slug]/` | `ServicesIndexPage`, `ServiceDetailPage` |
| `/industries/`, `/industries/[slug]/` | `IndustriesIndexPage`, `IndustryDetailPage` |
| `/technologies/`, `/technologies/[slug]/` | `TechnologiesIndexPage`, `TechnologyDetailPage` |
| `/hire-developers/`, `/hire-*-developers/` | `HireIndexPage`, `HireDetailPage` |
| `/portfolio/` | `PortfolioPage` |
| `/case-studies/`, `/case-studies/[slug]/` | `CaseStudiesIndexPage`, `CaseStudyDetailPage` |
| `/career/`, `/career/apply/` | `CareersPage`, `CareerApplyView` |
| Process pages (4) | `ProcessDetailPage` |
| `/[country]/`, `/[country]/[state]/` | `GeoCountryIndexPage`, `GeoDetailPage` |
| `/blog/`, `/blog/[slug]/` | Inline pages (minimal) |
| Legal (3), `/sitemap/`, `/404/` | `LegalProsePage`, `SitemapContent`, `NotFoundContent` |

---

## How to assign work

Examples:

- `Do L-01 and L-04` — QA + cutover
- `Fix G-01 contact proof section`
- `C-03 — audit legacy JS and plan removal`
