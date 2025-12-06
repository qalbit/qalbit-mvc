<?php

namespace App\Controllers;

use App\Support\View;

class PageController 
{

    public function sitemap(): string
    {
        $baseUrl = rtrim(config('app.url', 'https://qalbit.com'), '/');

        $seo = [
            'title'       => 'Sitemap | QalbIT Infotech Pvt Ltd',
            'description' => 'Browse a structured overview of all key QalbIT pages – services, industries, technologies, portfolio, careers, insights and legal information.',
            'canonical'   => $baseUrl . '/sitemap/',
            'noindex'     => false,
        ];

        $content = View::render('pages/sitemap/index', [
            'seo' => $seo,
        ]);

        return View::render('layouts/main', [
            'seo'     => $seo,
            'content' => $content,
        ]);
    }

}