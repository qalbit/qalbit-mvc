<?php

namespace App\Controllers;

class SeoController
{
    public function sitemap(): string
    {
        $baseUrl = rtrim(config('app.url', 'https://qalbit.com'), '/');

        $urls = [];

        $makeUrl = function (string $path) use ($baseUrl): string {
            $path = trim($path);

            // Root
            if ($path === '' || $path === '/') {
                return $baseUrl . '/';
            }

            // Ensure leading slash, strip any extra leading/trailing slashes in input
            $path = '/' . trim($path, '/');

            // Ensure trailing slash
            if (substr($path, -1) !== '/') {
                $path .= '/';
            }

            return $baseUrl . $path;
        };

        // Core pages
        $corePaths = [
            '/',
            '/about-us/',
            '/services/',
            '/industries/',
            '/portfolio/',
            '/technologies/',
            '/contact-us/',
            '/hire-developers/',
            '/case-studies/',
            '/career/',
            '/career/apply/',
            '/privacy-policy/',
            '/terms-and-condition/',
            '/cookie-policy/',
            '/sitemap/',
            '/tools/json-formatter/',
            '/tools/software-development-cost-calculator/',
        ];

        foreach ($corePaths as $path) {
            $urls[] = $makeUrl($path);
        }

        // Services
        $services = config('services', []);
        foreach ($services as $service) {
            if (!empty($service['enabled']) && !empty($service['slug'])) {
                // slug can be "services/custom-software-development" or "/services/custom-software-development/"
                $urls[] = $makeUrl($service['slug']);
            }
        }

        // Our Process child pages
        $processPages = config('process', []);
        foreach ($processPages as $page) {
            // Adjust condition if your config doesn't use 'enabled'
            if (!empty($page['slug'])) {
                // slug can be "start-up-mvp" or "/start-up-mvp/"
                $urls[] = $makeUrl($page['slug']);
            }
        }

        // Industries
        $industries = config('industries', []);
        foreach ($industries as $industry) {
            if (!empty($industry['enabled']) && !empty($industry['slug'])) {
                $urls[] = $makeUrl($industry['slug']);
            }
        }

        // Technologies
        $technologies = config('technologies', []);
        foreach ($technologies as $tech) {
            if (!empty($tech['enabled']) && !empty($tech['slug'])) {
                $urls[] = $makeUrl($tech['slug']);
            }
        }

        // Geo (country/state)
        $geo = config('geo', []);
        foreach ($geo as $location) {
            if (!empty($location['enabled']) && !empty($location['slug'])) {
                $urls[] = $makeUrl($location['slug']);
            }
        }

        // Hire pages
        $hire = config('hire', []);
        foreach ($hire as $role) {
            if (!empty($role['enabled']) && !empty($role['slug'])) {
                $urls[] = $makeUrl($role['slug']);
            }
        }

        // Products (index + detail pages)
        if (!empty(config('products.page.enabled'))) {
            $urls[] = $makeUrl(config('products.page.slug', '/products/'));
        }
        foreach (config('products.items', []) as $product) {
            if (!empty($product['enabled']) && !empty($product['slug'])) {
                $urls[] = $makeUrl('/products/' . trim($product['slug'], '/') . '/');
            }
        }

        // Case studies
        $caseStudies = config('case_studies', []);
        foreach ($caseStudies as $cs) {
            if (!empty($cs['enabled']) && !empty($cs['slug'])) {
                $urls[] = $makeUrl($cs['slug']);
            }
        }

        // Deduplicate
        $urls = array_values(array_unique($urls));

        // Build XML.
        // No <lastmod>: we don't track real modification dates per page, and a
        // fake always-today value teaches crawlers to distrust the sitemap.
        // changefreq/priority are ignored by Google, so they're omitted too.
        $xml = [];
        $xml[] = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml[] = '<urlset xmlns="https://www.sitemaps.org/schemas/sitemap/0.9">';

        foreach ($urls as $loc) {
            $xml[] = '  <url>';
            $xml[] = '    <loc>' . htmlspecialchars($loc, ENT_XML1) . '</loc>';
            $xml[] = '  </url>';
        }

        $xml[] = '</urlset>';

        $content = implode("\n", $xml);

        header('Content-Type: application/xml; charset=utf-8');

        return $content;
    }

    public function robots(): string
    {
        header('Content-Type: text/plain; charset=UTF-8');
        http_response_code(200);

        // Single source of truth: the static file (served directly by Apache
        // in production; this route is the fallback for router-based serving).
        $file = __DIR__ . '/../../public/robots.txt';

        if (is_file($file)) {
            return (string) file_get_contents($file);
        }

        return "User-agent: *\nAllow: /\n\nSitemap: https://qalbit.com/sitemap.xml\n";
    }

    /**
     * /llms.txt – curated, markdown site overview for AI assistants and agents
     * (llmstxt.org convention). Generated from the same configs as the site,
     * so it never drifts from the real pages.
     */
    public function llms(): string
    {
        header('Content-Type: text/markdown; charset=UTF-8');
        http_response_code(200);

        // No PageCache here: it minifies via HtmlMinifier, which strips the
        // newlines markdown depends on. The render is cheap (config loops only).
        return $this->renderLlmsTxt();
    }

    private function renderLlmsTxt(): string
    {
        $baseUrl  = rtrim(config('app.url', 'https://qalbit.com'), '/');
        $business = config('business', []);

        $lines   = [];
        $lines[] = '# ' . ($business['legal_name'] ?? 'QalbIT Infotech Pvt Ltd');
        $lines[] = '';
        $lines[] = '> ' . ($business['description'] ?? 'Custom software development company in Ahmedabad, India.');
        $lines[] = '';
        $lines[] = 'Founded in ' . ($business['founding_date'] ?? '2018') . '. Headquarters: Ahmedabad, Gujarat, India. '
                 . 'Contact: ' . ($business['primary_email'] ?? 'info@qalbit.com') . ' / ' . ($business['primary_phone'] ?? '+91-8511900440') . '. '
                 . 'Engagement models: fixed-scope projects, dedicated developers/teams (monthly), and hybrid. '
                 . 'Free instant estimates: ' . $baseUrl . '/tools/software-development-cost-calculator/';
        $lines[] = '';

        $lines[] = '## Services';
        $lines[] = '';
        $services = array_filter(config('services', []), static fn ($s) => is_array($s) && !empty($s['enabled']) && !empty($s['slug']));
        uasort($services, static fn ($a, $b) => ($a['order'] ?? 999) <=> ($b['order'] ?? 999));
        foreach ($services as $service) {
            $lines[] = '- [' . ($service['name'] ?? 'Service') . '](' . $baseUrl . $service['slug'] . '): '
                     . ($service['meta_description'] ?? '');
        }
        $lines[] = '';

        $lines[] = '## Hire Dedicated Developers';
        $lines[] = '';
        $lines[] = '- [All developer profiles](' . $baseUrl . '/hire-developers/): Hire dedicated Laravel, Node.js, Next.js, React, Flutter and full-stack developers in India with 1–2 week onboarding.';
        $roles = array_filter(config('hire', []), static fn ($r) => is_array($r) && !empty($r['enabled']) && !empty($r['slug']));
        uasort($roles, static fn ($a, $b) => ($a['order'] ?? 999) <=> ($b['order'] ?? 999));
        foreach ($roles as $role) {
            $lines[] = '- [' . ($role['name'] ?? 'Developers') . '](' . $baseUrl . $role['slug'] . '): '
                     . ($role['meta_description'] ?? '');
        }
        $lines[] = '';

        $lines[] = '## Industries';
        $lines[] = '';
        $industries = array_filter(config('industries', []), static fn ($i) => is_array($i) && !empty($i['enabled']) && !empty($i['slug']));
        uasort($industries, static fn ($a, $b) => ($a['order'] ?? 999) <=> ($b['order'] ?? 999));
        foreach ($industries as $industry) {
            $lines[] = '- [' . ($industry['name'] ?? 'Industry') . '](' . $baseUrl . $industry['slug'] . '): '
                     . ($industry['meta_description'] ?? '');
        }
        $lines[] = '';

        $lines[] = '## Case Studies';
        $lines[] = '';
        $caseStudies = array_filter(config('case_studies', []), static fn ($c) => is_array($c) && !empty($c['enabled']) && !empty($c['slug']));
        uasort($caseStudies, static fn ($a, $b) => ($a['order'] ?? 999) <=> ($b['order'] ?? 999));
        foreach ($caseStudies as $caseStudy) {
            $lines[] = '- [' . ($caseStudy['name'] ?? 'Case study') . '](' . $baseUrl . $caseStudy['slug'] . '): '
                     . ($caseStudy['summary'] ?? '');
        }
        $lines[] = '';

        $lines[] = '## Products Built & Run by QalbIT';
        $lines[] = '';
        $products = array_filter(config('products.items', []), static fn ($p) => is_array($p) && !empty($p['enabled']) && !empty($p['slug']));
        uasort($products, static fn ($a, $b) => ($a['order'] ?? 999) <=> ($b['order'] ?? 999));
        foreach ($products as $product) {
            $lines[] = '- [' . ($product['name'] ?? 'Product') . '](' . $baseUrl . '/products/' . trim($product['slug'], '/') . '/): '
                     . ($product['tagline'] ?? '');
        }
        $lines[] = '';

        $lines[] = '## Free Tools';
        $lines[] = '';
        $lines[] = '- [Software Development Cost Calculator](' . $baseUrl . '/tools/software-development-cost-calculator/): Instant 2026 cost and timeline estimates for MVPs, CRM, ERP, SaaS, web and mobile apps.';
        $lines[] = '- [JSON Formatter & Minifier](' . $baseUrl . '/tools/json-formatter/): Free browser-based JSON formatting, validation and minification.';
        $lines[] = '';

        $lines[] = '## Locations Served';
        $lines[] = '';
        $locations = array_filter(config('geo', []), static fn ($g) => is_array($g) && !empty($g['enabled']) && !empty($g['slug']));
        foreach ($locations as $location) {
            $lines[] = '- [' . ($location['name'] ?? 'Location') . '](' . $baseUrl . $location['slug'] . ')';
        }
        $lines[] = '';

        $lines[] = '## Company';
        $lines[] = '';
        $lines[] = '- [About QalbIT](' . $baseUrl . '/about-us/)';
        $lines[] = '- [Portfolio](' . $baseUrl . '/portfolio/)';
        $lines[] = '- [Engagement Models](' . $baseUrl . '/engagement-model/)';
        $lines[] = '- [Contact](' . $baseUrl . '/contact-us/)';
        $lines[] = '- [Blog](' . $baseUrl . '/blog/)';
        $lines[] = '';

        return implode("\n", $lines);
    }
}
