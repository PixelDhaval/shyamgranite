<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Response;

/**
 * sitemap.xml: the home page plus every published, indexable page,
 * with lastmod taken from the page's updated_at.
 */
class SitemapController extends Controller
{
    public function __invoke(): Response
    {
        $pages = Page::query()
            ->published()
            ->where('noindex', false)
            ->orderBy('path')
            ->get(['path', 'updated_at']);

        return response()
            ->view('sitemap', ['pages' => $pages])
            ->header('Content-Type', 'application/xml; charset=UTF-8');
    }
}
