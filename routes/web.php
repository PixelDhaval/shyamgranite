<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');

Route::get('sitemap.xml', SitemapController::class)->name('sitemap');

// Catch-all for database pages; keep this last.
Route::get('{path}', PageController::class)
    ->where('path', '[a-z0-9\-]+(/[a-z0-9\-]+)*')
    ->name('page');
