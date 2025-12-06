<?php

namespace App\Support;

class Faqs
{
    /**
     * Get FAQs for a given context key.
     *
     * @param string $key e.g. "home", "service_custom_software"
     * @return array
     */
    public static function for(string $key): array
    {
        $all = config('faqs', []);
        return $all[$key] ?? [];
    }
}
