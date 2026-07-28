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

### Phase 2 — Crawl rate limiting ✅ DIAGNOSED `~1 h`

| ID | Task | Rows | Status |
|---|---|---:|---|
| 2.1 | Identify the 429 source | 600 | **DONE** — Cloudflare edge, see below |
| 2.2 | Allow verified `AhrefsBot` | — | **SUPERSEDED** — not the right fix, see below |
| 2.3 | Blog 503s | 9 | **DONE** — origin, crawl-load correlated |

**2.1 — the 429s come from Cloudflare itself, not from the origin.** Cloudflare's GraphQL analytics for the
last 23 h, filtered to `edgeResponseStatus: 429`:

```
count  origin  cache  country  path
   32     0     hit     US     /assets/images/services/icon-ui-ux-design-service.svg
   26     0     hit     US     /assets/images/technologies/laravel.svg
   24     0     hit     US     /assets/images/industries/icon-sports-dark.svg
   22     0     hit     US     /assets/images/industries/icon-food-delivery-dark.svg
   …every single row is /assets/images/*.svg
```

`originResponseStatus: 0` means the request never reached Hostinger, and `cacheStatus: hit` means the file
was already in edge cache. **Cloudflare generated the 429 on its own.** The zone is on the Free plan with
`advanced_ddos: on` and no configurable rate-limit rules; this is its built-in abuse protection reacting to
the same handful of SVGs being fetched tens of thousands of times in a short window — a few hundred crawled
pages × ~38 icons each.

This is also **not a one-off crawl artifact**, which is what I assumed when writing the plan. It is
continuous — 320 / 71 / 318 / 78 / 125 / 586 / 269 / 371 per day over 21–28 Jul.

**2.2 — a WAF allowlist is the wrong fix, so it is dropped.** The Free plan has no configurable rate limiting
to exempt anything *from*; the throttle is built in. What actually reduces it is sending fewer image requests
per page — which is exactly **Phase 3(b)**. Converting the 38 decorative icons from `<img>` to inline SVG
removes ~38 HTTP requests per page render. **Phase 3 and Phase 2 turn out to be the same fix.** Secondary
lever, free and instant: lower the crawl speed in Ahrefs Site Audit settings.

**2.3 — the 503s are origin-side and load-correlated.** 503s ran 3–63/day all week and spiked to **223 on
28 Jul**, the crawl day — consistent with PHP workers saturating under crawl load rather than a code fault.
Phase 4 addresses the cause directly: at a 21% cache ratio almost every crawler request currently reaches PHP.

**Two findings outside the audit, worth knowing:**

- **~2,000 origin 403s per day are hostile vulnerability scans being correctly blocked** — `/.env.production`,
  `/core/.env`, `/.hermes/config.yaml`, `/sixxis.php`, `/aa2.php`, `/yup.php`, `//wp-includes/…`. The
  `.htaccess` hardening rules are doing their job. No action; this is the system working.
- **`525` (CF↔origin TLS handshake failure) runs 144–340/day.** Also ~95% scanner traffic, but one real
  victim shows up: `/blog/wp-json/wp/v2/posts`, which is the homepage's own blog-posts fetch via
  `WordPressClient`. Worth a look if the homepage ever renders without blog cards.
- **Cache ratio is 21%** (3,693 cached of 17,292 requests on 28 Jul), which independently confirms the
  Phase 4 diagnosis.

> **Access, agreed 28 Jul 2026:** a scoped Cloudflare API token. Read-only first (`Zone`, `Zone Settings`,
> `Firewall Services`, `Cache Rules`, `Page Rules`, `Analytics` — all Read; zone `qalbit.com`; short TTL) so
> 2.1 is pure diagnosis. Edit scopes are issued separately only once we know what needs changing — WAF and
> rate-limit rules sit in front of all production traffic. Token is read from a file, never pasted into chat.
>
> Note for Phase 4.2: Cloudflare will not cache HTML at the edge on origin `Cache-Control` alone. It needs an
> explicit Cache Rule, which means `Cache Rules → Edit` and `Cache Purge → Purge` when we get there.

### Phase 3 — Image accessibility ✅ COMPLETE `~1.5 h` (est. 2–3 h)

| ID | Task | Rows | Status |
|---|---|---:|---|
| 3.1 | Mega-menu icons → CSS background, deferred to hover | ~590 | **DONE** `45880de` |
| 3.2 | Related-links thumbnails → descriptive `alt` | 13 | **DONE** `45880de` |
| 3.3 | LiftUp admin avatar on `crm.qalbit.com` | 9 | **DEFERRED** — see 7.1 |

**Attribution was exact.** Of 22 distinct alt-less images, **14 were mega-menu icons repeated on 590–592
pages each** — 98% of the actionable total. The remaining 13 were related-links thumbnails and 9 were on
`crm.qalbit.com`.

**The two got different treatments, deliberately.**

- **Mega-menu icons — CSS background (`.nav-icon`), gated on `.group:hover`.** These are decoration: each sits
  beside its own visible text label. Drawing them as backgrounds means they carry no image semantics at all,
  which is a better answer than bolting on alt text a screen reader would have to read twice.
- **Related-links thumbnails — kept as `<img>` with a real `alt`.** These are *content* images for the article
  being linked, not chrome. Converting them would have cost native `loading="lazy"` for no benefit. Alt falls
  back through `img_alt` → `label`.

**Phase 3 did Phase 2's job as predicted.** The panel hides behind `invisible`, not `display:none`, so all 38
icons were fetched on **every page view** for a menu most visitors never open. Verified with a Chrome netlog
against the live site, no hover:

```
distinct qalbit SVG asset URLs requested on load: 15
   brand 2   icons 10   reviews 3
   → zero services/*, technologies/*, industries/*
```

All 38 mega-menu requests now defer until the menu is opened. That is the per-page SVG flood that was
tripping Cloudflare's rate limiter into 429ing those files during crawls.

**Verification**

| Check | Result |
|---|---|
| `<img>` count on `/about-us/` | 68 → **30** |
| Empty or missing `alt` on `/`, `/about-us/`, `/services/`, `/technologies/`, `/contact-us/` | **0** on all five |
| `.nav-icon` spans per page | 38, with `--nav-icon` custom property set |
| Rendered appearance | Screenshot against the **live** stylesheet: boxed variant 24 px icon centred in the 44 px rounded box, bare variant 36 px — both identical to before |
| Asset requests on load | 15 SVGs, none from the mega menu |

**Two caveats worth recording.**

1. **Hover-gating is safe here but only here.** The mega menu is `hidden lg:flex` and already opens only on
   `group-hover`; the mobile menu renders no icons at all. The icon appears exactly when the panel does.
2. **The mega menu was already keyboard-inaccessible** — it opens on `group-hover` alone, with no focus or
   click path. This change neither causes nor worsens that, but it is a real accessibility gap and is worth
   fixing on its own merits. Out of scope for this audit; flagged rather than silently absorbed.

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
| 4.0 | **Reflected XSS in `?topic=` / `?source=`** — found while scoping 4.3 | — | `partials/{contact/form-small,hero/contact}.php`, `helpers.php` | — | **DONE** `0dbc401` |
| 4.1 | Start sessions only when one is needed | 394 | `public/index.php` | 2 h | **DONE** `6b1e8b2`, `3ccaa62` |
| 4.2 | Cloudflare Cache Rule so HTML is cached at the edge | — | Cloudflare | 90 m | **DONE** — ruleset v20 |
| 4.3 | Cache param variants instead of bypassing | 411 | `app/Support/PageCache.php` | 2 h | **DONE** `37862dd` |
| 4.4 | `app.css` raw size | 2 | build | 2 h | **NO ACTION** — see below |
| 4.5a | 2 stale LiteSpeed CSS 404s | 4 | LiteSpeed | — | **RESOLVED** — transient, now 200 |
| 4.5b | Blog CSS weight | 28 | LiteSpeed | — | **DONE** — 449 KB → 226 KB raw, 102 KB → 66 KB gz |

#### 4.3 — variant caching

Parameters now fall into three groups: campaign tags (`utm_*`, `gclid`, `fbclid`, `ref` …) are dropped from
the key so every campaign variant shares one render; parameters that genuinely change the HTML (contact
prefill, portfolio and career filters) are folded into the key; anything else still bypasses, including
`?ajax=1`, which returns JSON.

Verified live — variant files exist on the server and each renders its own prefill, so there is no
cross-contamination:

```
page_contact_index__topic-fintech-brief.html
page_contact_index__topic-fintech-brief_source-industries-page.html
page_contact_index__topic-hire-laravel-developers.html
page_portfolio__industry-sports-fitness.html
```

Variant values arrive from the URL, so they are accepted only as short slugs and the directory is capped at
400 entries; on hitting the ceiling it sweeps expired entries first, so a bot cycling junk filter values
cannot lock genuine variants out. Clean-URL keys are byte-identical to before, so nothing the warmer writes
changed.

#### 4.4 — `app.css` is not actually a problem

| | |
|---|---|
| Raw | 108,728 B |
| **Over the wire (brotli)** | **17,584 B** |

Ahrefs measures the uncompressed file. 17.6 KB for the *entire* site stylesheet is healthy, and the rule
breakdown (1,430 rules, ordinary Tailwind utility distribution) shows no sign of a purge failure. Only
`app.css` is linked — there is one stylesheet, not several. Splitting or hand-pruning this would be
busy-work with a real risk of breaking styles, so it is deliberately left alone.

#### 4.5a — the CSS 404s were transient

Both files Ahrefs reported as 404 now return **200**, and the pages reference `?ver=30055` where the audit
saw `?ver=9755b`. This is the LiteSpeed combine race: HTML cached with a reference to a combined-CSS hash
that a later purge regenerated. It self-heals, and it recurs whenever CSS is purged while HTML is still
cached — including when we purge during this work. Not worth a settings change on its own.

#### 4.5b — the blog was shipping a whole icon library for three icons

| | Raw | Compressed |
|---|---:|---:|
| Blog CSS **before** | 449 KB | 102 KB |
| Blog CSS **after** | **226 KB** | **66 KB** |

The suspicion in the plan was UCSS silently failing and falling back to plain concatenation. The real cause
was narrower and easier to fix. A signature scan of the combined bundle showed **2,566 Font Awesome
matches**, traced to `wp-user-profile-avatar`, which registers the full library
(`assets/lib/fontawesome/all.css`, 140 KB, 2,538 icon classes) on `wp_enqueue_scripts` for *every*
front-end page.

The blog uses **four glyphs**: `fa-chevron-up` (scroll-to-top), `fa-angle-left` / `fa-angle-right`
(pagination), and `fa-envelope-square` (the author box's mailto link).

- The theme's three are now inline SVG — a few hundred bytes, and they inherit colour through
  `currentColor` exactly as the icon font did.
- The fourth is markup the plugin emits and the theme cannot edit, so it is drawn with a CSS mask that also
  keeps `currentColor`.
- An mu-plugin dequeues the library on the front end only, leaving it registered for wp-admin where the
  plugin's own screens use it.

**The webfont downloads go too**, which the CSS figures above do not capture: a Chrome netlog on a post
page now shows zero Font Awesome requests and no webfont requests at all.

Verified: pagination arrows and the envelope render correctly against the live stylesheet, and the
scroll-to-top button stays hidden until scrolled, as before.

Combine/UCSS settings were left alone. There was no need to touch them once the actual payload was gone,
and they were the risky option.

#### 4.0 — reflected XSS (unplanned, shipped first)

Scoping 4.3 meant finding every consumer of `$_GET`. Two partials echoed lead-tracking params into a hidden
input with no escaping:

```php
<input type="hidden" name="lead_topic" value="<?= $_GET['topic'] ?? 'general' ?>">
```

Confirmed live before the fix — a probe containing a double quote came back as `value="QA_PROBE"_x"`, so
`?topic=x" onfocus=… autofocus="` breaks out of the attribute. The partial renders on `/contact-us/` and in
the exit-intent popup, and ~400 internal links point at these URLs with a `topic` or `source` attached.

**This is why it had to ship before any cache work**: caching those URLs at the edge or on disk would have
promoted a reflected XSS into a stored one served to every visitor. `lead_param()` normalises to a slug and
falls back to `general` for anything else — which also bounds the value space, so 4.3 can cache these URLs
rather than bypass one attacker-chosen value at a time.

#### 4.1 — conditional sessions

Verified live, full cycle: anonymous GET → no cookie, `Cache-Control: public, max-age=3600`; POST → 302 with
`Set-Cookie` and `no-store`; GET with cookie → flash renders; revisit → cookie expired; next request → back
on the cacheable path.

**A bug in my own first attempt, caught by walking that cycle.** The self-healing branch never fired:
`getFlash()` unset the flash key but left an empty `_flash` container, so `$_SESSION` was never `empty()` and
the cookie was never dropped — a visitor who submitted one form would have stayed pinned to `no-store`
responses indefinitely, the exact thing the safeguard existed to prevent. Fixed at both ends (`3ccaa62`).

#### 4.2 — HTML now cached at the edge

Appended to the zone cache ruleset (v17 → v20; the 3 existing rules are untouched, backup in
`scratchpad/cache-ruleset-backup-20260728.json`):

```
description: Cache HTML for anonymous visitors
action:      set_cache_settings
expression:  (http.request.method in {"GET" "HEAD"})
             and (ends_with(http.request.uri.path, "/"))
             and (not starts_with(http.request.uri.path, "/blog/"))
             and (not http.cookie contains "PHPSESSID")
params:      cache: true, edge_ttl: respect_origin, browser_ttl: respect_origin
```

`respect_origin` is deliberate: after 4.1 the PHP layer already emits the right directive per response
(`public, max-age=3600` anonymous, `no-store` when flash is in play), so Cloudflare only has to honour it.
The cookie clause is a second, independent guard. `/blog/` is excluded — WordPress sets its own cookies and
has LiteSpeed in front of it, so it deserves its own pass.

**A wrong diagnosis on the way, worth recording.** The rule read `DYNAMIC` after being added, and I put that
down to `http.request.uri.path.extension eq ""` never matching an extension-less path, so I rewrote the
expression. That was not the cause. **My test was wrong: `curl -I` sends `HEAD`, and the rule required
`GET`.** The original expression may well have worked. The trailing-slash form is kept because it states the
intent more plainly, and `HEAD` is now matched explicitly — but the half-hour spent on the field-semantics
theory was spent on a symptom I had manufactured.

**Verification — caching**

| Check | Result |
|---|---|
| `/`, `/about-us/`, `/services/`, `/portfolio/`, `/technologies/` | `MISS` → **`HIT`** |
| Param variants (`?topic=…`) cache independently | `MISS` → `HIT`, each with its own prefill |
| Warm-connection TTFB | **0.124 – 0.155 s** (was ~0.77 s, and 1,142 ms median in the audit) |

**Verification — safety.** This is the change that could have leaked one visitor's form errors to everyone,
so it was tested from that angle first:

| Check | Result |
|---|---|
| Visitor holding `PHPSESSID` | `cf-cache-status: DYNAMIC`, `no-store` — never edge-cached |
| That visitor still sees their own flash | yes |
| Anonymous visitor sees that flash | **no**, across repeated requests |
| `/blog/` | `DYNAMIC` — excluded as intended |
| Variant URLs cross-served | no — each renders its own `lead_topic` |

**New operational requirement:** edge entries outlive a deploy. Clearing `storage/cache/pages` and
re-warming now only refreshes the *origin* copy, so a deploy could take up to an hour to reach anyone on a
warm PoP. [`bin/purge_edge.sh`](../bin/purge_edge.sh) closes that, and the deploy sequence gains a fourth
step — see §3.

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
| 7.1 | `crm.qalbit.com` booking pages — description, OG, X card, canonical | 55 | **DONE** — [PR #9](https://github.com/qalbit/app.liftup.sh/pull/9) | Fixed in `app.liftup.sh`, awaiting merge |
| 7.2 | Blog posts whose `og:title` was the raw URL slug | 17 | **DONE** (WP only) | 36 overrides across 18 posts |
| 7.3 | `title-tag-changed` (66), `meta-description-changed` (39), `h1-tag-changed` (13), `pages-to-submit-to-index` (125) | 243 | NO ACTION | These *are* our Phase-0 edits. Optional: submit via IndexNow/GSC |
| 7.4 | `http://…` → `https://…` redirects (2) | 2 | NO ACTION | Correct behaviour |
| 7.5 | `config/geo.php` `– QalbIT` title suffixes | 0 | **DONE** `655f606` | 19 locations, all 43–55 chars after stripping |

#### 7.2 — slug `og:title` values

Found by shape rather than from a hand-kept list: no spaces, at least three hyphen-separated words. That
caught the 17 raw slugs **and** one hyphenated variant (`The-digital-reservations-revolution-…`) I would
have missed, across both `og:title` and `twitter:title` — 36 overrides on 18 posts.

The overrides were **deleted** rather than rewritten. With none set, Yoast renders its social template,
which resolves to the SEO title each post already has. Writing 18 new social headlines would have been
worse copy and more to maintain.

One post carried `%%title%%` as its override. Checking the rendered page first showed Yoast substitutes it
correctly, so it was left alone — it looked broken and was not.

#### 7.1 — LiftUp booking pages

The page is served by `app.liftup.sh` (Laravel), not by this repo, and every registered host has their own
`/book/{slug}`. It shipped a `<title>` and nothing else.

The canonical is the part that mattered most: hosts hand out the same link with `?utm_*`/`?ref=` attached
per campaign, and with nothing folding them back together each variant registered as its own duplicate —
the 9 rows in this audit. `url()->current()` carries no query string, so they all resolve to one URL.

Descriptions are built per host rather than from a fixed string, since every tenant's page is a different
person, meeting and duration. The manage page — a signed link from a confirmation email showing one guest's
details — got `noindex, nofollow`.

**No `og:image`, deliberately:** the only organisation logo route sits behind `cockpit.auth` so a social
scraper cannot fetch it, and the bundled brand assets are SVG, which the major platforms will not render.
Either would give a *broken* card rather than no card. Worth revisiting if a public raster asset is added.

Three tests added; full suite **977 passed, 4103 assertions**. Delivered as a PR rather than merged: that
repo deploys to production from CI on `master`.

---

## 3. Delivery process

Unchanged from the previous cycle, one task or tight group per commit:

1. Apply the change locally.
2. Verify locally where possible.
3. `git commit` — Conventional Commits, **no trailer, no AI attribution**.
4. `git push origin staging`.
5. SSH Hostinger → `git pull --ff-only origin staging` → `rm -rf storage/cache/pages/*` → `php bin/warm_cache.php`.
6. **`bin/purge_edge.sh`** — since 4.2, HTML lives at the Cloudflare edge for up to an hour. Steps 1–5 only
   refresh the origin copy; without this a deploy is invisible to anyone served from a warm PoP.
7. Verify live with `curl` — and use `curl -sS -o /dev/null -D -`, **not `curl -I`**. `-I` sends `HEAD`,
   which reads `DYNAMIC` against a `GET`-scoped cache rule and looks exactly like a broken cache.
8. Update this file's Status column.

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
| B.1 | `theme/header.php` — favicons pointed at `/images/favicon/*`, which has never existed (3 × 404 per blog page). Repointed at the `/assets/` set the main site uses | `~/backups/theme-header-20260728.php` |
| B.2 | `theme/footer.php` — DMCA badge was written `<img src ="…">` with a space. LiteSpeed's lazy-loader did not recognise it, so it *added* its own `src` placeholder and left the original: two `src` attributes, browser takes the first, badge never loaded. Now `src=` and LiteSpeed rewrites it correctly to `data-src` | `~/backups/theme-footer-20260728.php` |
| B.3 | `.htaccess` CSP widened for MailerLite (`blob:`, `assets.mailerlite.com`) and LinkedIn (`px.` → `*.ads.linkedin.com`). **Applied by the user** — the write was refused here, correctly, as it weakens a security policy | `~/backups/htaccess-csp-20260728` |
| B.4 | `theme/template-parts/banner/home-hero.php` — hero right-hand card restructured; newsletter heading now rendered by the theme | `~/backups/home-hero-20260728.php` |
| B.5 | `theme/assets/blog-modern.css` — section 8 appended: newsletter block + MailerLite embed restyling | `~/backups/blog-modern-20260728.css` |

### Blog hero rebuild (28 Jul)

**Problem.** The MailerLite embed was dropped straight into the hero card after the guides list with a 10 px
gap. It brings its own heading, card and margins, so its title landed on top of the "Get a free instant
estimate" button and the whole thing read as two unrelated widgets sharing a box.

**Change.** The newsletter heading and supporting line are rendered by the **theme**, not by MailerLite.
Space is reserved for the embed (`min-height: 112px`) so the hero does not jump when the widget paints. The
intro line was rewritten from generic filler to what the blog actually publishes.

**Then, on request: the "Start here" block was removed entirely** — the card now holds the newsletter alone.
Its divider is scoped to `.blog-head-right > .hero-subscribe:first-child`, so the top border and padding
vanish while it is the only section and return by themselves if anything is ever placed above it again.

**Where the "500+" lived.** Not in the theme and not in the WordPress database — it is inside MailerLite's
hosted form definition (account `1436867`, form `1QvGRf`), painted client-side. That means it was invisible
to crawlers and uneditable from this repo. The theme now renders **"Join 1,000+ smart readers"** itself and
hides MailerLite's own title block, so the copy is version-controlled and server-rendered.

**Verification limit — read this before trusting the styling.** MailerLite refuses to render in headless
Chrome (tried twice, including with a real user-agent string and a 30 s budget), so the embed's own markup
could not be captured and **the CSS targeting its internals is unverified**. What *was* verified: the card
layout, divider, section headings, reserved space, that the new CSS reaches the served LiteSpeed bundle, and
that mobile stacks correctly. The embed's input, button and consent row need a human eye.

The selector hiding MailerLite's title is deliberately scoped to `.ml-form-embedBody > .ml-form-embedContent`
— a direct child only. An unscoped version would also have matched any nested content block, which risks
hiding the consent and privacy text. That is a compliance question, not a cosmetic one, so it is worth
keeping scoped if this CSS is ever revisited.

**Pre-existing issue, not introduced here:** at a 390 px viewport the blog clips content at the right edge.
A control screenshot of `/blog/crm-development-cost-2026/` — untouched by this work — clips identically, so
it predates the rebuild. Worth a look on a real device.

#### Subscribe button opened a new tab and hung

Pressing Subscribe opened `assets.mailerlite.com/jsonp/1436867/forms/.../subscribe` in a new tab instead of
submitting in place.

MailerLite's embedded form ships with `target="_blank"` and a real `action` URL as its no-JavaScript
fallback. The script meant to intercept that submit and send it as JSONP is `webforms.min.js` — and it is
served from **`groot.mailerlite.com` / `static.mailerlite.com`**, neither of which the CSP allowed. Only
`assets.mailerlite.com` was permitted, which is enough to *render* the form but not to *submit* it, so the
browser fell through to a plain form post.

Confirmed before changing anything:

```
groot.mailerlite.com/js/w/webforms.min.js   200
static.mailerlite.com/js/w/webforms.min.js  200
assets.mailerlite.com/js/w/webforms.min.js  404
```

and `webforms.min.js` contains `preventDefault` plus `createElement("script")` and a `jsonp` path — i.e. it
is the interceptor. MailerLite spreads one integration across assets / groot / static / track, so the CSP
entry was collapsed to a single `https://*.mailerlite.com` rather than enumerating hosts and finding the
next one only when something else quietly broke.

#### Sidebar newsletter showed the old count

Blog detail pages embed the *same* form (`1QvGRf`) through a block widget, so the hero-scoped CSS never
reached it and MailerLite's own "Join 500+ Smart Readers" heading was still rendering there. The widget now
carries the same theme-rendered heading, with a `--bare` modifier that drops the hero's top rule — that rule
exists to separate the block from the card section above it and would only draw a stray line in a sidebar.

Written through `update_option()` rather than SQL: `widget_block` is a serialized array, and a raw `REPLACE`
would leave the `s:NN:` length prefix pointing at the wrong byte count. The array was read back and
re-validated afterwards (4 entries, intact). Backup: `~/backups/widget_block-20260728.txt`.

#### Two buttons on submit — a bug in this CSS, not MailerLite's

Pressing Subscribe left the button in place and drew a second, spinner button underneath it.

Cause was the styling added above. MailerLite ships **two** buttons inside `.ml-form-embedSubmit` — the
primary one and a spinner — and swaps them with an inline `style="display:…"`. The rule here declared
`display: inline-flex !important` on *every* button in that container, and `!important` outranks an inline
style, so the primary button could never be hidden and both showed at once.

Fixed by not declaring `display` at all and centring the label with `text-align`, which a `<button>` honours
natively. Visibility is MailerLite's business again. The companion rule that hid `button.loading` went too —
it was written to paper over this and would have suppressed the loading state entirely.

Worth remembering when overriding a third-party widget: `!important` does not just win a specificity
argument, it takes the element away from the script that owns its behaviour.

#### Sidebar form ran into the widget edge

In the hero the block takes its spacing from the card around it; as a standalone widget it had none, so the
copy and inputs sat flush against the border while the neighbouring widget was comfortably padded. Now
`20 px` (`16 px` under 768 px). Backup: `~/backups/blog-modern-20260728-pre-uifix.css`.

> The blog theme and DB are outside git. Every change above is reversible from the listed backup. **1.5 lives
> in a theme file — a theme update would revert it.** If that becomes a risk, move it to a child theme or an
> mu-plugin filter.

---

## 6. WordPress-side changes, second batch (28 Jul)

| Task | What | Backup |
|---|---|---|
| 7.2 | Deleted 36 slug-shaped `_yoast_wpseo_opengraph-title` / `_yoast_wpseo_twitter-title` overrides across 18 posts | `~/backups/social-titles-20260728.tsv` |
| 4.5b | mu-plugin `qalbit-drop-fontawesome.php` dequeues the `fontawesome` handle on the front end | — (new file) |
| 4.5b | `home-hero.php` + `inc/template-helpers.php` — 4 `<i class="fa…">` replaced with inline SVG | `~/backups/{home-hero,template-helpers}-20260728-pre-fa.php` |
| 4.5b | `blog-modern.css` section 9 — CSS-mask stand-ins for the plugin-rendered envelope icon | `~/backups/blog-modern-20260728-pre-fa.css` |
