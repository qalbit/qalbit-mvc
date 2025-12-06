<?php

if (! function_exists('asset')) {
    function asset(string $path): string
    {
        // base URL from config, e.g. https://qalbit.com or http://qalbit.test
        $base = rtrim(config('app.url', ''), '/');

        // normalize leading slash
        $path = ltrim($path, '/');

        return $base . '/assets/' . $path;
    }
}

if (! function_exists('route_url')) {
    /**
     * Generate an absolute URL for an internal route, or pass through external URLs.
     *
     * Examples:
     *  route_url('/')                              -> https://qalbit.com/
     *  route_url('contact-us')                     -> https://qalbit.com/contact-us
     *  route_url('/services/ai-solutions')         -> https://qalbit.com/services/ai-solutions
     *  route_url('blog', ['page' => 2])            -> https://qalbit.com/blog?page=2
     *  route_url('https://google.com')             -> https://google.com
     *  route_url('https://x.com/qalb_it', ['ref'=>'qalbit'])
     *                                             -> https://x.com/qalb_it?ref=qalbit
     */
    function route_url(string $path = '/', array $params = []): string
    {
        // If already absolute URL, protocol-relative, or special scheme, return as-is.
        if (
            preg_match('#^https?://#i', $path) ||   // http:// or https://
            str_starts_with($path, '//') ||         // //example.com
            str_starts_with($path, 'mailto:') ||    // mailto:...
            str_starts_with($path, 'tel:') ||       // tel:...
            str_starts_with($path, '#')             // #anchor
        ) {
            $url = $path;
        } else {
            $base = rtrim(config('app.url', ''), '/');
            $path = '/' . ltrim($path, '/');
            $url  = $base . $path;
        }

        if (! empty($params)) {
            $query = http_build_query($params);
            $url  .= (str_contains($url, '?') ? '&' : '?') . $query;
        }

        return $url;
    }
}
