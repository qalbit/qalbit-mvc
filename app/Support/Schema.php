<?php

namespace App\Support;

class Schema
{
    /**
     * Build FAQPage JSON-LD from a list of FAQs.
     *
     * @param array       $faqs      Array of ['question' => ..., 'answer' => ...]
     * @param string      $pageUrl   Canonical URL of the page
     * @param string|null $pageTitle Optional name for the FAQPage
     *
     * @return array|null JSON-LD array or null if no valid FAQs
     */
    public static function faq(array $faqs, string $pageUrl, ?string $pageTitle = null): ?array
    {
        if (empty($faqs)) {
            return null;
        }

        $items = [];

        foreach ($faqs as $faq) {
            $q = trim($faq['question'] ?? '');
            $a = trim($faq['answer'] ?? '');

            if ($q === '' || $a === '') {
                continue;
            }

            $items[] = [
                '@type'          => 'Question',
                'name'           => $q,
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text'  => $a,
                ],
            ];
        }

        if (empty($items)) {
            return null;
        }

        $schema = [
            '@context'   => 'https://schema.org',
            '@type'      => 'FAQPage',
            'mainEntity' => $items,
            'url'        => $pageUrl,
        ];

        if ($pageTitle) {
            $schema['name'] = $pageTitle;
        }

        return $schema;
    }

    /**
     * Global Organization schema, using config/business.php.
     */
    public static function organization(): array
    {
        $business = config('business', []);
        $appUrl   = rtrim(config('app.url', $business['website'] ?? ''), '/');

        $name     = $business['legal_name'] ?? 'QalbIT Infotech Pvt Ltd';
        $url      = $business['website'] ?? $appUrl;
        $logo     = $business['logo_url'] ?? null;
        $sameAs   = $business['social_profiles'] ?? [];
        $addr     = $business['schema_address'] ?? null;
        $channels = $business['channels'] ?? [];

        $orgId = $url ? $url . '#organization' : null;

        $schema = [
            '@context' => 'https://schema.org',
            '@type'    => 'Organization',
            '@id'      => $orgId,
            'name'     => $name,
            'url'      => $url,
        ];

        if ($logo) {
            $schema['logo'] = $logo;
        }

        if (!empty($sameAs)) {
            // Only keep valid-looking URLs
            $schema['sameAs'] = array_values(array_filter($sameAs, function ($value) {
                return is_string($value) && preg_match('~^https?://~i', $value);
            }));
        }

        if (is_array($addr)) {
            $schema['address'] = array_merge([
                '@type' => 'PostalAddress',
            ], $addr);
        }

        // Build contactPoint from channels where we have a phone or email
        $contactPoints = [];

        foreach ($channels as $channel) {
            $id    = $channel['id'] ?? '';
            $email = $channel['email'] ?? null;
            $phone = $channel['phone'] ?? null;

            if (!$email && !$phone) {
                continue;
            }

            // Map channel id to schema.org contactType
            $contactType = null;
            switch ($id) {
                case 'sales':
                    $contactType = 'sales';
                    break;
                case 'support':
                    $contactType = 'customer support';
                    break;
                case 'careers':
                    $contactType = 'human resources';
                    break;
                case 'partnerships':
                    $contactType = 'business';
                    break;
                default:
                    $contactType = 'customer support';
                    break;
            }

            $contact = [
                '@type'       => 'ContactPoint',
                'contactType' => $contactType,
            ];

            if ($phone) {
                $contact['telephone'] = $phone;
            }

            if ($email) {
                $contact['email'] = $email;
            }

            // Optional extras
            $contact['areaServed']       = 'Worldwide';
            $contact['availableLanguage'] = ['en'];

            $contactPoints[] = $contact;
        }

        if (!empty($contactPoints)) {
            $schema['contactPoint'] = $contactPoints;
        }

        return $schema;
    }

    /**
     * WebSite schema for qalbit.com (typically used on home page).
     */
    public static function website(): array
    {
        $business = config('business', []);
        $appUrl   = rtrim(config('app.url', $business['website'] ?? ''), '/');

        $name = $business['short_name'] ?? ($business['legal_name'] ?? 'QalbIT');

        $orgId = $appUrl ? $appUrl . '#organization' : null;

        $schema = [
            '@context' => 'https://schema.org',
            '@type'    => 'WebSite',
            'url'      => $appUrl,
            'name'     => $name,
        ];

        if ($orgId) {
            $schema['publisher'] = [
                '@id' => $orgId,
            ];
        }

        // If you later add on-site search, you can add a SearchAction here.

        return $schema;
    }

    /**
     * BreadcrumbList schema for a page.
     *
     * @param array $crumbs Each item: ['name' => 'Services', 'url' => '/services/'].
     */
    public static function breadcrumbs(array $crumbs): ?array
    {
        if (empty($crumbs)) {
            return null;
        }

        $appUrl = rtrim(config('app.url', ''), '/');

        $items    = [];
        $position = 1;

        foreach ($crumbs as $crumb) {
            $name = trim($crumb['name'] ?? '');
            $url  = $crumb['url'] ?? null;

            if ($name === '' || $url === null) {
                continue;
            }

            // If URL is relative, prefix with app URL
            if (is_string($url) && preg_match('~^https?://~i', $url)) {
                $itemUrl = $url;
            } else {
                $itemUrl = $appUrl . '/' . ltrim((string) $url, '/');
            }

            $items[] = [
                '@type'    => 'ListItem',
                'position' => $position++,
                'name'     => $name,
                'item'     => $itemUrl,
            ];
        }

        if (empty($items)) {
            return null;
        }

        return [
            '@context'       => 'https://schema.org',
            '@type'          => 'BreadcrumbList',
            'itemListElement'=> $items,
        ];
    }

    /**
     * BreadcrumbList schema for a location page.
     *
     * @param array $crumbs Each item: ['name' => 'Services', 'url' => '/services/']
     *                      or: ['label' => 'Services', 'url' => '/services/'].
     */
    public static function breadcrumbsLocation(array $crumbs): ?array
    {
        if (empty($crumbs)) {
            return null;
        }

        $appUrl = rtrim(config('app.url', ''), '/');

        $items    = [];
        $position = 1;

        foreach ($crumbs as $crumb) {
            // Accept both 'name' and 'label'
            $name = trim($crumb['name'] ?? $crumb['label'] ?? '');
            $url  = $crumb['url'] ?? null;

            if ($name === '' || $url === null) {
                continue;
            }

            // If URL is relative, prefix with app URL
            if (is_string($url) && preg_match('~^https?://~i', $url)) {
                $itemUrl = $url;
            } else {
                $itemUrl = $appUrl . '/' . ltrim((string) $url, '/');
            }

            $items[] = [
                '@type'    => 'ListItem',
                'position' => $position++,
                'name'     => $name,
                'item'     => $itemUrl,
            ];
        }

        if (empty($items)) {
            return null;
        }

        return [
            '@context'        => 'https://schema.org',
            '@type'           => 'BreadcrumbList',
            'itemListElement' => $items,
        ];
    }

}
