# Ahrefs Site Audit Remediation — Crawl of 28 Jul 2026

Living document. Every task below carries a status that is updated as the work lands.
Source data: `~/Downloads/CHROME-DOWNLOADS/Ahrefs/{Error,Warning,Notice}` (37 CSVs, UTF-16 TSV).

**Status legend:** `TODO` · `IN PROGRESS` · `DONE` (committed + deployed + verified) · `DEFERRED` (user decision) · `NO ACTION` (not a defect)

---

## 1. Executive summary

The crawl reports **≈2,873 flagged rows**. That number is misleading — it is not 2,873 problems.
Grouped by root cause, it is **11 causes**, and three of them account for 63% of every row on the report.

| # | Root cause | Rows | Real defect? | Phase |
|---|---|---:|---|---|
| RC-1 | Crawl-time rate limiting — origin returned 429/503 to the crawler | 609 | No — all verified `200` live | 2 |
| RC-2 | `alt=""` on decorative icons in the global header | 602 | Partly — Ahrefs counts empty alt as missing | 3 |
| RC-3 | `www.qalbit.com` serves `200` — the whole site is crawled twice | 567 | **Yes** | 1 |
| RC-4 | Unconditional `session_start()` → `no-store` → zero edge caching | 394 | **Yes** | 4 |
| RC-5 | Query-param URL explosion (`?topic=`, `?source=`, `?industry=`) | 411 | Partly — canonicals correct, crawl budget wasted | 4 |
| RC-6 | `crm.qalbit.com` inside audit scope | 55 | Out of scope | 7 |
| RC-7 | Blog: `page/1/` links, in-content links to redirects, hardcoded `www` | 313 | **Yes** | 1 |
| RC-8 | Blog schema.org validation errors | 191 | Unconfirmed | 6 |
| RC-9 | LiteSpeed stale/oversized CSS + 108 KB `app.css` | 32 | **Yes** | 4 |
| RC-10 | Change-detection notices caused by our own Phase-0 work | 243 | No | 7 |
| RC-11 | Assorted small defects (404, sitemap gaps, long titles, 3xx) | 56 | **Yes** | 1, 5 |

**Total development time: 22–30 hours across 6 active phases.**

### The three findings that matter most

**1. `www.qalbit.com` returns `200`, not a redirect.** Verified live:

```
https://www.qalbit.com/          → HTTP 200, canonical → https://qalbit.com/
https://www.qalbit.com/services/ → HTTP 200, canonical → https://qalbit.com/services/
https://www.qalbit.com/blog/     → HTTP 301 → https://qalbit.com/blog/     ← only the blog redirects
```

`public/.htaccess` has no host canonicalisation rule. WordPress redirects itself; the MVC app does not.
Every page therefore exists on two hosts. The `rel=canonical` prevents an indexing disaster, but Ahrefs
(and Googlebot) still crawl both — 204 of 411 `one-dofollow` rows, 281 of 602 `missing-alt` rows and 81 of
394 `slow-page` rows are the www duplicates of rows already counted on the apex. **One `.htaccess` rule
removes ~567 rows and halves the crawl surface.**

**2. HTML is never cached at the edge.** Response headers on `/`:

```
set-cookie:    PHPSESSID=…
cache-control: no-store, no-cache, must-revalidate
cf-cache-status: DYNAMIC
```

[`public/index.php:11`](../public/index.php#L11) calls `session_start()` unconditionally on every request,
including anonymous crawler hits. PHP's session cache limiter then stamps `no-store` on the response, and the
`PHPSESSID` cookie independently disqualifies it from Cloudflare's cache. The result is `cf-cache-status:
DYNAMIC` on every HTML response sitewide — Cloudflare is in front of the site but is caching **nothing**,
so every request travels to the Hostinger origin.

Compounding it, [`PageCache::shouldBypass()`](../app/Support/PageCache.php#L44) returns `true` for *any*
query string, so the 157 `/contact-us/?topic=…` variants and every `/portfolio/?industry=…` filter skip the
disk cache too and render from scratch on each hit.

Reported median TTFB is 1,142 ms and p90 is 2,185 ms. This is the single largest performance lever available
and it is a two-file change.

**3. 609 "broken image" and "5xx" rows are crawl artifacts, not defects.** The 6 "broken" images returned
**429 Too Many Requests** — a rate-limit response, not a 404 — and each of the 594 `page-has-broken-image`
rows lists the same global logo/icon set. Likewise the 3 blog 503s (which also produced the 3
`5xx-page-in-sitemap` and 3 `indexable-page-became-non-indexable` rows). Re-tested live, including a
12-request burst as `AhrefsBot`:

```
200  /assets/images/brand/logo-primary.svg
200  /assets/images/icons/star-rating.svg
200  /blog/key-factors-in-project-success-…/
200  /blog/nurturing-patient-engagement-…/
200  /blog/digital-reservations-…/
```

No code fix applies. The work is to identify which layer throttled the crawler (Cloudflare, LiteSpeed, or
Hostinger) and stop it happening on the next crawl.

---

## 2. Phase plan

### Phase 1 — Crawl integrity ✅ COMPLETE `~3 h actual` (est. 4–5 h)
Highest leverage per hour and lowest risk. Cleared ~880 rows.

| ID | Task | Rows | Where | Status |
|---|---|---:|---|---|
| 1.1 | 301 `www.qalbit.com` → apex, all paths, query preserved | ~567 | `public/index.php` | **DONE** `404e2ba` |
| 1.2 | Repoint 4 dead `www` canonicals in config at the apex | 0 | `config/{case_studies,products,portfolio}.php` | **DONE** `404e2ba` |
| 1.3 | Retire the `/estimation/` 404 — repoint the link, 301 the URL | 3 | WP postmeta + `public/index.php` | **DONE** `e372112` |
| 1.4 | Repoint blog links aimed at redirect targets | 8 | WP `search-replace` | **DONE** (WP only) |
| 1.5 | Stop WP pagination emitting `page/1/` links | 23 | blog theme | **DONE** (WP only) |
| 1.6 | ~~Hardcoded `www.qalbit.com/blog/` link in blog theme~~ | 282 | — | **NO ACTION** — see below |
| 1.7 | `/career/apply/` added to sitemap | 1 | `SeoController` | **DONE** `83d8c9d` |
| 1.7b | Blog pagination + `/blog/` in two sitemaps | 33 | — | **NO ACTION** — see below |

**Two corrections to this plan, found during the work.**

**1.6 was wrong.** I recorded it as a hardcoded `https://www.qalbit.com/blog/` link in the blog theme. There
is no such link — the nav link is relative (`href="/blog/"`). All 282 source pages were themselves on
`www.qalbit.com`, so Ahrefs resolved the relative link against the www host and counted a redirect. **Task
1.1 removes all 282 rows on its own**; there was never separate work to do here.

**1.7 splits.** `/career/apply/` was a genuine gap — indexable, carries organic traffic, linked from
`/career/`, absent from the sitemap. Added. The other 33 rows are not defects:

- **22 blog pagination URLs** (`/blog/page/N/`, `/blog/{cat}/page/N/`). Paginated archives are meant to be
  crawlable but *not* listed in a sitemap — a sitemap advertises primary content. Adding them would be
  worse practice than the notice they clear.
- **`/blog/` in two sitemaps.** Yoast lists the posts page in both `page-sitemap.xml` and `post-sitemap.xml`.
  Google explicitly permits a URL in multiple sitemaps. A Yoast filter to suppress one risks breaking sitemap
  generation for a single cosmetic notice.

**Note on 1.4** — the `/estimation/` link was not in post content but in a **serialized** FAQ array in
`wp_postmeta`, which is why a content search found nothing. All replacements went through
`wp search-replace --precise` (serialization-aware); a raw SQL `REPLACE` would have corrupted the `s:NNN:`
length prefixes. The array was re-validated as intact after each run.

### Phase 2 — Crawl rate limiting `2–3 h`
No code change expected; this is diagnosis and configuration.

| ID | Task | Rows | Where | Est | Status |
|---|---|---:|---|---:|---|
| 2.1 | Identify the 429 source — Cloudflare rate-limit/bot-fight rules, LiteSpeed, or Hostinger throttle | 600 | Cloudflare + hPanel | 90 m | TODO |
| 2.2 | Allow verified `AhrefsBot` at the identified layer; keep protection for unverified traffic | — | Cloudflare | 30 m | TODO |
| 2.3 | Check WP error logs for the 3 blog 503s to rule out a genuine PHP fault | 9 | server | 30 m | TODO |

> **Access, agreed 28 Jul 2026:** a scoped Cloudflare API token. Read-only first (`Zone`, `Zone Settings`,
> `Firewall Services`, `Cache Rules`, `Page Rules`, `Analytics` — all Read; zone `qalbit.com`; short TTL) so
> 2.1 is pure diagnosis. Edit scopes are issued separately only once we know what needs changing — WAF and
> rate-limit rules sit in front of all production traffic. Token is read from a file, never pasted into chat.
>
> Note for Phase 4.2: Cloudflare will not cache HTML at the edge on origin `Cache-Control` alone. It needs an
> explicit Cache Rule, which means `Cache Rules → Edit` and `Cache Purge → Purge` when we get there.

### Phase 3 — Image accessibility `2–3 h`

| ID | Task | Rows | Where | Est | Status |
|---|---|---:|---|---:|---|
| 3.1 | Resolve 38 `alt=""` icons rendered on ~590 pages (mega-menu + related-links) | 602 | `partials/header/default.php`, `partials/cta/related-links.php` | 2 h | TODO |

**Approach: (b), approved 28 Jul 2026.** `alt=""` on an icon that sits beside its own visible text label is
*correct* accessibility practice — the icon is decorative and a screen reader should skip it. Ahrefs flags it
anyway. The two options were:

- **(a) Descriptive `alt`** — clears Ahrefs immediately; makes screen readers announce every icon, so the
  menu is read twice. Worse for real users, better for the report.
- **(b) Render decorative icons as CSS `background-image` or inline `<svg aria-hidden="true">`** — removes
  them from Ahrefs' image inventory entirely *and* is the textbook-correct answer. ← **chosen**

### Phase 4 — Performance `8–10 h`
The largest user-facing win in the whole plan, and it also clears 426 rows.

| ID | Task | Rows | Where | Est | Status |
|---|---|---:|---|---:|---|
| 4.1 | Start sessions only when needed (POST, flash data present, or admin cookie); set `session_cache_limiter('')` | 394 | `public/index.php` | 2 h | TODO |
| 4.2 | Send cacheable `Cache-Control: public, s-maxage=…` on anonymous GET so Cloudflare can serve HTML from edge | — | `public/index.php` / `PageCache` | 90 m | TODO |
| 4.3 | Cache param variants — normalise a whitelist (`topic`, `source`, `industry`) into the cache key instead of bypassing | 411 | `app/Support/PageCache.php` | 2 h | TODO |
| 4.4 | `app.css` is 108,532 B — audit the Tailwind purge list, split above-the-fold CSS | 2 | `sass/` + build | 2 h | TODO |
| 4.5 | Blog: 2 stale LiteSpeed CSS files 404; combined CSS reaches 97 KB. Purge, then review combine/UCSS settings | 32 | LiteSpeed plugin | 90 m | TODO |

**Expected outcome:** TTFB on cached HTML drops from ~1,100 ms to edge-served (~50 ms) for repeat visitors
worldwide. Verification is `cf-cache-status: HIT` and re-measured TTFB, not just a cleared report row.

> 4.1 is the one genuinely risky task in this plan — sessions back the contact-form flash messages. It needs
> the contact/career form flows retested by hand after deploy, not just a cache warm.

### Phase 5 — Metadata `1–2 h`

| ID | Task | Rows | Where | Est | Status |
|---|---|---:|---|---:|---|
| 5.1 | Shorten 2 career-apply titles (86 and 80 chars) | 2 | `CareerController` | 45 m | TODO |
| 5.2 | `/blog/an-in-depth-look-at-websockets-and-server-sent-events/` — page title vs SERP title mismatch | 1 | WP/Yoast | 30 m | TODO |

The other 3 SERP-title rows (`/`, `/services/`, `/blog/business-and-industry/`) are the pages we rewrote in
Phase 0. Ahrefs compares against Google's *stored* SERP title, so they persist until Google recrawls.
Expected, not actionable — see §4.

### Phase 6 — Structured data `3–4 h`

| ID | Task | Rows | Where | Est | Status |
|---|---|---:|---|---:|---|
| 6.1 | Re-investigate the 191 blog schema errors (was ~130 last crawl) | 191 | blog | 2 h | TODO |
| 6.2 | Blog theme `<section itemscope class="faqs">` has no `itemtype` — 10 itemprops resolve to `qalbit.com/*` | — | blog theme | 60 m | TODO |

**Caveat, carried forward from last cycle:** every blog page type I put through `validator.schema.org` returned
**0 severe errors and 0 warnings**. Ahrefs reports a bare `"Schema.org validation error"` with no field, no
type and no message, so there is nothing to act on yet. The count rising from ~130 to 191 tracks blog posts
crawled, not a regression. I will not guess at a fix — 6.1 is time-boxed to reproducing the error against
Ahrefs' own validator. **If it stays unreproducible I will report that and change nothing.**

### Phase 7 — Deferred and no-action

| ID | Item | Rows | Status | Note |
|---|---|---:|---|---|
| 7.1 | `crm.qalbit.com` — missing meta description, OG tags, X card, no outgoing links, 9 uncanonicalised param duplicates | 55 | DEFERRED | Your call: "ignore for now" |
| 7.2 | 17 blog posts whose `og:title` is the raw URL slug | 17 | TODO (unapproved) | Offered previously, never approved |
| 7.3 | `title-tag-changed` (66), `meta-description-changed` (39), `h1-tag-changed` (13), `pages-to-submit-to-index` (125) | 243 | NO ACTION | These *are* our Phase-0 edits. Optional: submit via IndexNow/GSC |
| 7.4 | `http://…` → `https://…` redirects (2) | 2 | NO ACTION | Correct behaviour |
| 7.5 | `config/geo.php` still carries `– QalbIT` title suffixes | 0 | TODO (unapproved) | Not flagged this crawl; same pattern we fixed elsewhere |

---

## 3. Delivery process

Unchanged from the previous cycle, one task or tight group per commit:

1. Apply the change locally.
2. Verify locally where possible.
3. `git commit` — Conventional Commits, **no trailer, no AI attribution**.
4. `git push origin staging`.
5. SSH Hostinger → `git pull --ff-only origin staging` → `rm -rf storage/cache/pages/*` → `php bin/warm_cache.php`.
6. Verify live with `curl` and record the evidence.
7. Update this file's Status column.

WordPress-side changes (Phases 1.3–1.6, 4.5, 6.x) run through WP-CLI and are **not version controlled** —
each is logged in §5 with the exact command and a backup path where state is touched.

---

## 4. What this will *not* fix

Stated up front so the next crawl holds no surprises.

- **The 4 SERP-title rows will not clear on the next crawl.** Ahrefs compares against Google's stored SERP
  title. Those clear when Google recrawls and re-evaluates — days to weeks, and outside our control.
- **`pages-to-submit-to-index` (125) will grow, not shrink.** Every page we touch in Phases 1–5 lands there.
  That is the report working correctly.
- **The 191 schema rows may not move**, for the reason in Phase 6.
- **The 429/503 rows depend on crawler behaviour**, not code. Phase 2 improves the odds; it cannot guarantee
  Ahrefs won't throttle again.
- **Row count is not the goal.** Phase 4 is worth more to the business than Phases 1+3 combined despite
  clearing fewer rows, because it changes what real visitors experience. Phases are ordered by leverage and
  risk, not by row count.

---

## 5. Change log

| Date | Task | Commit | Verified live |
|---|---|---|---|
| 28 Jul | 1.1 www → apex 301; 1.2 config canonicals | `404e2ba` | `www.qalbit.com/{,services/,portfolio/?industry=…}` all 301 with query preserved and **no** `Set-Cookie`; apex still 200 |
| 28 Jul | 1.3 `/estimation/` link + 301 | `e372112` | `/estimation/` → 301 `/hire-developers/`; 0 `estimation` refs left on the source post |
| 28 Jul | 1.4 blog links → redirect targets | WP only | 24 replacements across `wp_posts` + `wp_postmeta`; 8 affected posts render clean |
| 28 Jul | 1.5 pagination `page/1/` | WP only | 0 `page/1/` links across 6 paginated archives; page-1 link now `https://qalbit.com/blog/` |
| 28 Jul | 1.7 `/career/apply/` in sitemap | `83d8c9d` | present in `sitemap.xml` |

### WordPress-side changes (not version controlled)

| Task | Command | Backup |
|---|---|---|
| 1.3 | `wp search-replace 'https://qalbit.com/estimation/' 'https://qalbit.com/hire-developers/' wp_postmeta --precise` | `~/backups/postmeta-estimation-backup-20260728.tsv` |
| 1.4 | 5 × `wp search-replace … wp_posts wp_postmeta --precise` (see `/tmp/fix-redirect-links.sh`) | `~/backups/blog-redirect-links-backup-20260728-{posts,meta}.tsv` |
| 1.5 | Removed `base`/`format` overrides from `qalbit_pagination()` in `wp-content/themes/qalbit/inc/template-helpers.php` | `~/backups/template-helpers-20260728.php` |

> The blog theme and DB are outside git. Every change above is reversible from the listed backup. **1.5 lives
> in a theme file — a theme update would revert it.** If that becomes a risk, move it to a child theme or an
> mu-plugin filter.
