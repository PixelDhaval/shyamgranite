<?php

use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');

Route::get('sitemap.xml', SitemapController::class)->name('sitemap');

Route::post('enquiries', [EnquiryController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('enquiries.store');

// Catch-all for database pages; keep this last.
Route::get('{path}', PageController::class)
    ->where('path', '[a-z0-9\-]+(/[a-z0-9\-]+)*')
    ->name('page');
