<?php

namespace App\Controllers;

use App\Support\View;

class ErrorController
{
    public function notFound(): string
    {
        http_response_code(404);

        $seo = [
            'title'       => 'Page Not Found – QalbIT',
            'description' => 'The page you are looking for does not exist or may have been moved.',
            'noindex'     => true,
        ];

        $content = View::render('errors/404', [
            'seo' => $seo,
        ]);

        return View::render('layouts/main', [
            'seo'     => $seo,
            'content' => $content,
        ]);
    }

    public function serverError(\Throwable $e): string
    {
        http_response_code(500);

        $seo = [
            'title'       => 'Something Went Wrong – QalbIT',
            'description' => 'An unexpected error occurred. Please try again or contact us if the issue persists.',
            'noindex'     => true,
        ];

        $content = View::render('errors/500', [
            'seo' => $seo,
        ]);

        return View::render('layouts/main', [
            'seo'     => $seo,
            'content' => $content,
        ]);
    }
}
