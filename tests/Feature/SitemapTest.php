<?php

use App\Models\Page;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('lists the home page and published indexable pages only', function () {
    Page::factory()->create(['path' => 'marble']);
    Page::factory()->create(['path' => 'gallery', 'noindex' => true]);
    Page::factory()->unpublished()->create(['path' => 'draft']);

    $response = $this->get(route('sitemap'))
        ->assertOk()
        ->assertHeader('Content-Type', 'application/xml; charset=UTF-8');

    $locations = [];

    foreach (simplexml_load_string($response->getContent())->url as $entry) {
        $locations[] = (string) $entry->loc;
    }

    expect($locations)->toBe([url('/'), url('marble')]);
});
