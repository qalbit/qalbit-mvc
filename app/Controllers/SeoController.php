<?php

namespace App\Controllers;

class SeoController
{
    public function sitemap(): string
    {
        $baseUrl = rtrim(config('app.url', 'https://qalbit.com'), '/');

        $urls = [];

        // Core pages
        $corePaths = [
            '/',
            '/about-us/',
            '/services/',
            '/industries/',
            '/portfolio/',
            '/case-studies/',
            '/technologies/',
            '/contact-us/',
            '/privacy-policy/',
            '/terms-of-service/',
            '/cookie-policy/',
        ];

        foreach ($corePaths as $path) {
            $urls[] = $baseUrl . $path;
        }

        // Services
        $services = config('services', []);
        foreach ($services as $service) {
            if (!empty($service['enabled']) && !empty($service['slug'])) {
                $urls[] = rtrim($baseUrl, '/') . $service['slug'];
            }
        }

        // Our Process child pages
        $processPages = config('process', []);
        foreach ($processPages as $slug => $page) {
            $paths[] = '/our-process/' . $slug . '/';
        }

        // Industries
        $industries = config('industries', []);
        foreach ($industries as $industry) {
            if (!empty($industry['enabled']) && !empty($industry['slug'])) {
                $urls[] = rtrim($baseUrl, '/') . $industry['slug'];
            }
        }

        // Technologies
        $technologies = config('technologies', []);
        foreach ($technologies as $tech) {
            if (!empty($tech['enabled']) && !empty($tech['slug'])) {
                $urls[] = rtrim($baseUrl, '/') . $tech['slug'];
            }
        }


        // Geo (country/state)
        $geo = config('geo', []);
        foreach ($geo as $location) {
            if (!empty($location['enabled']) && !empty($location['slug'])) {
                $urls[] = rtrim($baseUrl, '/') . $location['slug'];
            }
        }

        // Hire pages
        $hire = config('hire', []);
        foreach ($hire as $role) {
            if (!empty($role['enabled']) && !empty($role['slug'])) {
                $urls[] = rtrim($baseUrl, '/') . $role['slug'];
            }
        }

        // Case studies
        $caseStudies = config('case_studies', []);
        foreach ($caseStudies as $cs) {
            if (!empty($cs['enabled']) && !empty($cs['slug'])) {
                $urls[] = rtrim($baseUrl, '/') . $cs['slug'];
            }
        }

        // Deduplicate
        $urls = array_values(array_unique($urls));

        // Build XML
        $lastmod = date('Y-m-d');

        $xml = [];
        $xml[] = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml[] = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

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
