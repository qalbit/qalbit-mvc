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
            '/career/',
            '/privacy-policy/',
            '/terms-and-condition/',
            '/cookie-policy/',
            '/sitemap/',
            '/tools/json-formatter/',
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

        // Case studies
        $caseStudies = config('case_studies', []);
        foreach ($caseStudies as $cs) {
            if (!empty($cs['enabled']) && !empty($cs['slug'])) {
                $urls[] = $makeUrl($cs['slug']);
            }
        }

        // Deduplicate
        $urls = array_values(array_unique($urls));

        // Build XML
        $lastmod = date('Y-m-d');

        $xml = [];
        $xml[] = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml[] = '<urlset xmlns="https://www.sitemaps.org/schemas/sitemap/0.9">';

        foreach ($urls as $loc) {
            $xml[] = '  <url>';
            $xml[] = '    <loc>' . htmlspecialchars($loc, ENT_XML1) . '</loc>';
            $xml[] = '    <lastmod>' . $lastmod . '</lastmod>';
            $xml[] = '    <changefreq>weekly</changefreq>';
            $xml[] = '    <priority>' . ($loc === $baseUrl . '/' ? '1.0' : '0.7') . '</priority>';
            $xml[] = '  </url>';
        }

        $xml[] = '</urlset>';

        $content = implode("\n", $xml);

        header('Content-Type: application/xml; charset=utf-8');

        return $content;
    }
}
