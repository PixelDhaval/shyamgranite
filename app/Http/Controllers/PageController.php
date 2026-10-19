<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Contracts\View\View;

/**
 * Renders any published page by its URL path using the page's template.
 */
class PageController extends Controller
{
    public function __invoke(string $path): View
    {
        $page = Page::query()
            ->published()
            ->with('parent.parent.parent')
            ->where('path', trim($path, '/'))
            ->firstOrFail();

        return view("pages.templates.{$page->template}", ['page' => $page]);
    }
}
