<?php

namespace App\Controllers;

use App\Support\PageCache;
use App\Support\Schema;
use App\Support\Session;
use App\Support\View;

/**
 * /saudi-arabia/riyadh/
 *
 * A CONTROLLER OF ITS OWN, so that GeoController — which renders the other
 * eighteen location pages — needs no edit at all to decouple this one. The
 * route is registered as a STATIC route in public/index.php above the
 * /{country}/{state}/ catch-all; Router::dispatch() consults the static table
 * before the dynamic one, so this wins regardless of registration order and
 * GeoController never sees the request.
 *
 * The Riyadh entry in config/geo.php is deliberately left enabled and
 * untouched. SeoController builds the sitemap from that config and the footer
 * builds its locations list from it; removing the entry would drop the URL from
 * both. The route simply shadows it.
 *
 * WHY THE SCHEMA IS BUILT HERE RATHER THAN FROM Schema::*.
 * GeoController emits four disconnected top-level blocks (Organization,
 * WebSite, BreadcrumbList, FAQPage). This page emits ONE @graph whose nodes
 * reference each other by @id, which is what lets a crawler resolve "this page
 * is about this service, provided by this organization, serving this country"
 * as a single statement rather than four unrelated ones. Schema::organization()
 * is still reused verbatim — it is the site-wide entity and must not fork.
 *
 * THERE IS NO LocalBusiness NODE, AND THERE MUST NOT BE.
 * QalbIT has no office, no legal entity and no address in Saudi Arabia. A
 * LocalBusiness node here would assert a physical presence that does not exist:
 * it is false, it is a spam signal, and it contradicts the page's own copy,
 * which says so plainly six times. Schema::localBusiness() exists and is
 * correctly gated to Ahmedabad in GeoController; it is not called here. For the
 * same reason there is no Saudi postalAddress, no Saudi telephone, no
 * geo.position and no map embed anywhere on this page.
 */
class RiyadhController
{
    private const CACHE_TTL = 900; // 15 minutes

    /**
     * Cache key is NOT the geo one.
     *
     * GeoController caches this URL under 'page_geo_saudi-arabia-riyadh'. If
     * this controller reused that key it would collide with whatever that
     * controller last wrote, and — worse — a warm entry written before the
     * route was added would keep serving the OLD page for up to fifteen minutes
     * after deploy, from a controller no longer handling the URL. A distinct
     * key means the two can never alias. The stale geo entry is flushed
     * explicitly at deploy; see the build report.
     */
    private const CACHE_KEY = 'page_riyadh';

    /**
     * Last substantive content review, ISO 8601.
     *
     * BUMP THIS WHEN THE COPY CHANGES — particularly the regulatory figures in
     * config/riyadh_page.php, which carry live deadlines. It feeds
     * WebPage.dateModified in the JSON-LD. Deliberately a constant rather than
     * filemtime(): a deploy rewrites mtimes and would silently re-date the page
     * without anyone having read a word of it.
     *
     * It used to feed a visible "Last updated" line at the foot of the page as
     * well; that line was removed on request. The date is therefore now
     * machine-readable only — if the visible line ever comes back, render it
     * from THIS constant so a reader and a crawler cannot be told two
     * different dates.
     */
    private const CONTENT_REVIEWED = '2026-09-04';

    public function show(): string
    {
        // A pending contact flash must never meet a cached page — the hero
        // enquiry card posts to /contact-us/ and redirects back here, and a
        // warm cache entry would swallow the confirmation. Same guard
        // ServiceController::show() carries, for the same reason.
        if (Session::hasFlash('contact_success', 'contact_errors', 'contact_old')) {
            return $this->render();
        }

        return PageCache::remember(
            self::CACHE_KEY,
            self::CACHE_TTL,
            fn (): string => $this->render()
        );
    }

    private function render(): string
    {
        $baseUrl       = rtrim(config('app.url', 'https://qalbit.com'), '/');
        $canonicalPath = '/saudi-arabia/riyadh/';
        $canonical     = $baseUrl . $canonicalPath;

        // Deck meta: Title 2 and Description 1 — the recommended pair, and the
        // only one carrying a differentiator no competitor's snippet carries.
        // The previous title targeted "Saudi Arabia" while the URL targets
        // Riyadh, which is the mismatch this rebuild exists to fix.
        $seo = [
            'title'       => 'Riyadh Custom Software Development – ZATCA & PDPL Ready',
            'description' => 'Remote engineering partner building custom software, CRM and ERP for Riyadh companies. ZATCA Phase 2 and PDPL Article 29 handled in the architecture.',
            'canonical'   => $canonical,
            'image'       => og_image_url($canonicalPath),

            // Self-referencing en + x-default. No ar-SA: there is no Arabic
            // page, and declaring one that does not exist is worse than
            // declaring nothing. head.php renders this only when it is set, so
            // every other page on the site is unaffected.
            'hreflang'    => [
                'en'        => $canonical,
                'x-default' => $canonical,
            ],
        ];

        $faqs = config('riyadh_faqs', []);

        $content = View::render('pages/geo/riyadh', [
            'seo'  => $seo,
            'faqs' => $faqs,
        ]);

        return View::render('layouts/main', [
            'seo'     => $seo,
            'content' => $content,
            'jsonLd'  => [$this->graph($canonical, $faqs)],

            // NOT 'location-detail'. That id ships location-detail.js, which
            // drives the geo partials this page does not render.
            'pageId'  => 'riyadh',
        ]);
    }

    /**
     * One connected @graph. Every node carries an @id and references the others
     * by @id rather than by nesting a duplicate copy of the entity.
     *
     * @param array<int,array{question:string,answer:string}> $faqs
     */
    private function graph(string $canonical, array $faqs): array
    {
        $baseUrl = rtrim(config('app.url', 'https://qalbit.com'), '/');
        $siteId    = $baseUrl . '#website';
        $pageId    = $canonical . '#webpage';
        $serviceId = $canonical . '#service';

        // Site-wide entity, reused verbatim. foundingDate stays whatever
        // config/business.php declares — see open item #1 in the build report:
        // it says 2018 while this page says "11+ years". That contradiction is
        // site-wide and was deliberately NOT resolved by editing one page's
        // schema, which would have made the site disagree with itself in a
        // second place instead of one.
        $organization = Schema::organization();
        unset($organization['@context']); // nodes inside a @graph share the outer one

        // Take the Organization's @id FROM THE NODE, never rebuild it here.
        // Schema::organization() derives it from config('business.website');
        // this controller's $baseUrl comes from config('app.url'). Those two
        // agree in production and did NOT agree locally, which left `provider`
        // and `publisher` pointing at an @id no node in the graph carried — a
        // silently broken graph that still validates as JSON. Reading it back
        // means the references cannot drift from the node again whatever the
        // two config keys say.
        $orgId = $organization['@id'] ?? ($baseUrl . '#organization');

        // areaServed already lists Saudi Arabia in config/business.php; this
        // guard means the node stays correct if that list is ever trimmed.
        $areaServed = $organization['areaServed'] ?? [];
        if (!in_array('Saudi Arabia', $areaServed, true)) {
            $areaServed[]                = 'Saudi Arabia';
            $organization['areaServed']  = $areaServed;
        }

        $website = [
            '@type'     => 'WebSite',
            '@id'       => $siteId,
            'url'       => $baseUrl,
            'name'      => config('business.short_name', 'QalbIT'),
            'publisher' => ['@id' => $orgId],
            'inLanguage' => 'en',
        ];

        $webPage = [
            '@type'        => 'WebPage',
            '@id'          => $pageId,
            'url'          => $canonical,
            'name'         => 'Riyadh Custom Software Development – ZATCA & PDPL Ready',
            'description'  => 'Remote engineering partner building custom software, CRM and ERP for Riyadh companies. ZATCA Phase 2 and PDPL Article 29 handled in the architecture.',
            'inLanguage'   => 'en',
            'isPartOf'     => ['@id' => $siteId],
            'about'        => ['@id' => $serviceId],
            'dateModified' => self::CONTENT_REVIEWED,
            'breadcrumb'   => ['@id' => $canonical . '#breadcrumb'],
        ];

        // OfferCatalog mirrors §7 of the page, read from the same config the
        // section renders from so the two cannot drift.
        $catalogItems = [];
        foreach ((config('riyadh_page.service.capabilities.items', []) ?: []) as $item) {
            if (empty($item['label'])) {
                continue;
            }
            $catalogItems[] = [
                '@type' => 'Offer',
                'itemOffered' => [
                    '@type'       => 'Service',
                    'name'        => $item['label'],
                    'description' => $item['description'] ?? '',
                ],
            ];
        }

        $service = [
            '@type'       => 'Service',
            '@id'         => $serviceId,
            'serviceType' => 'Custom Software Development',
            'name'        => 'Custom software development for companies in Riyadh, Saudi Arabia',
            'provider'    => ['@id' => $orgId],
            'areaServed'  => [
                '@type' => 'Country',
                'name'  => 'Saudi Arabia',
            ],
        ];

        if ($catalogItems) {
            $service['hasOfferCatalog'] = [
                '@type'           => 'OfferCatalog',
                'name'            => 'Custom software we build for Saudi companies',
                'itemListElement' => $catalogItems,
            ];
        }

        // TWO LEVELS, NOT THREE. /saudi-arabia/ does not exist — the only geo
        // route is /{country}/{state}/, which needs two segments, so the hub
        // 404s. Pointing item 2 of a BreadcrumbList at a 404 is worse than a
        // shorter trail. Add the third level when the hub ships; the visible
        // breadcrumb in the hero matches this exactly and must be changed with
        // it.
        $breadcrumb = [
            '@type'           => 'BreadcrumbList',
            '@id'             => $canonical . '#breadcrumb',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',   'item' => $baseUrl . '/'],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Riyadh', 'item' => $canonical],
            ],
        ];

        $graph = [$organization, $website, $webPage, $service, $breadcrumb];

        // FAQPage. Built from the SAME strings partials/services/erp/faq.php
        // prints, so the structured data matches the visible copy character for
        // character. config/riyadh_faqs.php carries no answer_html for exactly
        // this reason — see the warning in that file before adding any.
        $questions = [];
        foreach ($faqs as $faq) {
            $q = trim($faq['question'] ?? '');
            $a = trim($faq['answer'] ?? '');
            if ($q === '' || $a === '') {
                continue;
            }
            $questions[] = [
                '@type'          => 'Question',
                'name'           => $q,
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => $a],
            ];
        }

        if ($questions) {
            $graph[] = [
                '@type'      => 'FAQPage',
                '@id'        => $canonical . '#faq',
                'url'        => $canonical,
                'isPartOf'   => ['@id' => $pageId],
                'mainEntity' => $questions,
            ];
        }

        return [
            '@context' => 'https://schema.org',
            '@graph'   => $graph,
        ];
    }
}
